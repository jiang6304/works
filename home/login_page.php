<?php
// 开启Session并生成CSRF Token
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$csrf_token = $_SESSION['csrf_token'] ?? bin2hex(random_bytes(32));
$_SESSION['csrf_token'] = $csrf_token;
?>
<!DOCTYPE html>
<html lang="zh-CN">

<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
    <meta name="csrf-token" content="<?php echo htmlspecialchars($csrf_token, ENT_QUOTES, 'UTF-8'); ?>">
    <title>登录注册 - 闲云野鹤</title>
    <link rel="stylesheet" href="css/login.css">
    <style>
        .captcha-box {
            display: flex;
            align-items: center;
            width: 70%;
            margin: 8px 0;
        }

        .captcha-box input {
            flex: 1;
            margin: 0;
        }

        .captcha-box img {
            width: 100px;
            height: 35px;
            margin-left: 10px;
            cursor: pointer;
            border-radius: 3px;
            border: 1px solid rgba(255,255,255,0.4);
        }

        .remember-box {
            display: flex;
            align-items: center;
            width: 70%;
            margin: 5px 0 15px 0;
        }

        .remember-box input[type="checkbox"] {
            width: auto;
            margin-right: 8px;
            cursor: pointer;
        }

        .remember-box label {
            color: rgba(255,255,255,0.8);
            font-size: 13px;
            cursor: pointer;
        }

        .error-msg {
            color: #ff6b6b;
            font-size: 12px;
            margin-top: -5px;
            margin-bottom: 10px;
            display: none;
        }

        .input-group {
            position: relative;
            width: 70%;
        }

        .input-group .toggle-password {
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            color: rgba(255,255,255,0.6);
            cursor: pointer;
            font-size: 12px;
        }

        .input-group .toggle-password:hover {
            color: #fff;
        }

        .success-msg {
            text-align: center;
            color: #4CAF50;
            font-size: 14px;
            margin-bottom: 15px;
            display: none;
        }

        .loading {
            display: none;
            text-align: center;
            color: #fff;
            font-size: 14px;
            margin-top: 10px;
        }

        .loading::after {
            content: '';
            animation: dots 1.5s infinite;
        }

        @keyframes dots {
            0%, 20% { content: '.'; }
            40% { content: '..'; }
            60%, 100% { content: '...'; }
        }
    </style>
</head>

<body>
    <div class="container">

        <div class="form-box">
            <!-- 注册 -->
            <form action="regi.php" method="post" id="registerForm">
                <div class="register-box hidden">
                    <h1>register</h1>
                    <input type="text" name="uid" placeholder="账号" required minlength="3" maxlength="20">
                    <input type="text" name="username" placeholder="用户名" required>
                    <input type="tel" name="tell" placeholder="手机号" required pattern="^1[3-9]\d{9}$">
                    <div class="input-group">
                        <input type="password" name="passwd" placeholder="请输入6位数及以上密码" required minlength="6" id="reg_passwd">
                        <span class="toggle-password" onclick="togglePassword('reg_passwd', this)">显示</span>
                    </div>
                    <div class="input-group">
                        <input type="password" name="repasswd" placeholder="确认密码" required minlength="6" id="reg_repasswd">
                        <span class="toggle-password" onclick="togglePassword('reg_repasswd', this)">显示</span>
                    </div>
                    <input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars($csrf_token, ENT_QUOTES, 'UTF-8'); ?>">
                    <button type="submit">注册</button>
                </div>
            </form>
            <!-- 登录 -->
            <form action="login.php" method="post" id="loginForm">
                <div class="login-box">
                    <h1>login</h1>
                    <div class="success-msg" id="successMsg"></div>
                    <input type="text" name="uid" placeholder="账号" required>
                    <div class="input-group">
                        <input type="password" name="passwd" placeholder="密码" required minlength="6" id="login_passwd">
                        <span class="toggle-password" onclick="togglePassword('login_passwd', this)">显示</span>
                    </div>
                    <div class="captcha-box">
                        <input type="text" name="captcha" placeholder="验证码" required maxlength="4" autocomplete="off">
                        <img src="captcha.php" alt="验证码" id="captchaImg" title="点击刷新验证码" onclick="refreshCaptcha()">
                    </div>
                    <div class="remember-box">
                        <input type="checkbox" name="remember" id="remember">
                        <label for="remember">记住我（7天内自动登录）</label>
                    </div>
                    <input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars($csrf_token, ENT_QUOTES, 'UTF-8'); ?>">
                    <button type="submit">登录</button>
                    <div class="loading" id="loading">登录中</div>
                </div>
            </form>
        </div>
        <div class="con-box left">
            <h2>欢迎来到<span>闲云野鹤</span></h2>
            <p>快来开启<span>手工之旅</span>吧</p>
            <img src="img/登录1.png" alt="">
            <p>已有账号</p>
            <button id="login">去登录</button>
        </div>
        <div class="con-box right">
            <h2>欢迎来到<span>闲云野鹤</span></h2>
            <p>快来开启<span>手工之旅</span>吧</p>
            <img src="img/登录2.png" alt="">
            <p>没有账号？</p>
            <button id="register">去注册</button>
        </div>
    </div>
    <script>
        // 要操作到的元素
        let login = document.getElementById('login');
        let register = document.getElementById('register');
        let form_box = document.getElementsByClassName('form-box')[0];
        let register_box = document.getElementsByClassName('register-box')[0];
        let login_box = document.getElementsByClassName('login-box')[0];
        let captchaImg = document.getElementById('captchaImg');
        let loginForm = document.getElementById('loginForm');
        let loading = document.getElementById('loading');

        // 刷新验证码
        function refreshCaptcha() {
            captchaImg.src = 'captcha.php?t=' + new Date().getTime();
        }

        // 切换密码显示/隐藏
        function togglePassword(inputId, toggleBtn) {
            const input = document.getElementById(inputId);
            if (input.type === 'password') {
                input.type = 'text';
                toggleBtn.textContent = '隐藏';
            } else {
                input.type = 'password';
                toggleBtn.textContent = '显示';
            }
        }

        // 去注册按钮点击事件
        register.addEventListener('click', () => {
            form_box.style.transform = 'translateX(80%)';
            login_box.classList.add('hidden');
            register_box.classList.remove('hidden');
        })

        // 去登录按钮点击事件
        login.addEventListener('click', () => {
            form_box.style.transform = 'translateX(0%)';
            register_box.classList.add('hidden');
            login_box.classList.remove('hidden');
            refreshCaptcha(); // 切换到登录时刷新验证码
        })

        // 表单提交时显示加载状态
        loginForm.addEventListener('submit', function() {
            loading.style.display = 'block';
        });

        // 页面加载时刷新验证码
        window.onload = function() {
            refreshCaptcha();
        };

        // 检查URL参数中是否有消息
        const urlParams = new URLSearchParams(window.location.search);
        const msg = urlParams.get('msg');
        if (msg) {
            const successMsg = document.getElementById('successMsg');
            successMsg.textContent = decodeURIComponent(msg);
            successMsg.style.display = 'block';
        }
    </script>

</body>

</html>

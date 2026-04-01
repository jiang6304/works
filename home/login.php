<?php
header('content-type:text/html;charset=utf-8');
// 引入数据库配置
include '../public/common/config.php';

// 开启Session
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// 获取客户端IP
function getClientIP() {
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        return $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        return $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
        return $_SERVER['REMOTE_ADDR'];
    }
}

$ip = getClientIP();

// 检查登录失败次数
$max_attempts = 5;
$lockout_time = 15 * 60; // 15分钟锁定

if (!isset($_SESSION['login_attempts'])) {
    $_SESSION['login_attempts'] = [];
}

// 清理过期的锁定记录
foreach ($_SESSION['login_attempts'] as $key => $attempt) {
    if (time() - $attempt['time'] > $lockout_time) {
        unset($_SESSION['login_attempts'][$key]);
    }
}

// 检查是否被锁定
$locked = false;
$remaining_time = 0;
foreach ($_SESSION['login_attempts'] as $attempt) {
    if ($attempt['ip'] == $ip && $attempt['count'] >= $max_attempts) {
        $elapsed = time() - $attempt['time'];
        if ($elapsed < $lockout_time) {
            $locked = true;
            $remaining_time = ceil(($lockout_time - $elapsed) / 60);
        }
        break;
    }
}

// 处理登录请求
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // 检查是否被锁定
    if ($locked) {
        echo "<script>alert('登录失败次数过多，请{$remaining_time}分钟后再试');</script>";
        echo "<script>setTimeout(function(){window.location.href='login_page.php';},1500);</script>";
        exit;
    }

    // 验证CSRF Token
    if (!isset($_POST['csrf_token']) || !isset($_SESSION['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        echo "<script>alert('安全验证失败，请刷新页面重试');</script>";
        echo "<script>setTimeout(function(){window.location.href='login_page.php';},1500);</script>";
        exit;
    }

    $uid = isset($_POST["uid"]) ? trim($_POST["uid"]) : '';
    $passwd = isset($_POST["passwd"]) ? $_POST["passwd"] : '';
    $remember = isset($_POST["remember"]) ? true : false;
    $captcha = isset($_POST["captcha"]) ? trim($_POST["captcha"]) : '';

    // 验证验证码
    if (empty($captcha) || strtolower($captcha) !== strtolower($_SESSION['captcha'] ?? '')) {
        echo "<script>alert('验证码错误');</script>";
        echo "<script>setTimeout(function(){window.location.href='login_page.php';},1500);</script>";
        exit;
    }

    if (empty($uid)) {
        echo "<script>alert('账号为空'); </script>";
        echo "<script>setTimeout(function(){window.location.href='login_page.php';},1500);</script>";
        exit;
    }

    if (empty($passwd)) {
        echo "<script>alert('密码为空'); </script>";
        echo "<script>setTimeout(function(){window.location.href='login_page.php';},1500);</script>";
        exit;
    }

    // 密码长度验证
    if (strlen($passwd) < 6) {
        echo "<script>alert('密码长度不能少于6位'); </script>";
        echo "<script>setTimeout(function(){window.location.href='login_page.php';},1500);</script>";
        exit;
    }

    $passwd_md5 = md5($passwd);

    // 使用预处理语句防止SQL注入
    $stmt = $conn->prepare("SELECT * FROM users WHERE uid = ?");
    $stmt->bind_param("s", $uid);
    $stmt->execute();
    $result = $stmt->get_result();
    $row0 = $result->fetch_assoc();

    if ($row0) {
        if ($passwd_md5 == $row0['passwd']) {
            // 登录成功，清除失败记录
            foreach ($_SESSION['login_attempts'] as $key => $attempt) {
                if ($attempt['ip'] == $ip) {
                    unset($_SESSION['login_attempts'][$key]);
                }
            }

            // 记住我功能
            if ($remember) {
                $token = bin2hex(random_bytes(32));
                $expire = time() + 60 * 60 * 24 * 7; // 7天

                // 存储到数据库（需要确保user_tokens表存在）
                $stmt_token = $conn->prepare("INSERT INTO user_tokens (uid, token, expire) VALUES (?, ?, ?) ON DUPLICATE KEY UPDATE token = ?, expire = ?");
                $stmt_token->bind_param("ssiss", $uid, $token, $expire, $token, $expire);
                $stmt_token->execute();
                $stmt_token->close();

                // 设置cookie
                setcookie('remember_uid', $uid, $expire, '/', '', false, true);
                setcookie('remember_token', $token, $expire, '/', '', false, true);
            }

            // 检查是否是管理员
            $stmt1 = $conn->prepare("SELECT * FROM users WHERE uid = ? AND passwd = ? AND isadmin = 1");
            $stmt1->bind_param("ss", $uid, $passwd_md5);
            $stmt1->execute();
            $rst1 = $stmt1->get_result();
            $row1 = $rst1->fetch_assoc();

            if ($row1) {
                $_SESSION['admin_uid'] = $row1['uid'];
                $_SESSION['admin_username'] = $row1['username'];
                $_SESSION['last_activity'] = time();
                // 清除CSRF Token
                unset($_SESSION['csrf_token']);
                echo "<script>alert('欢迎管理员');</script>";
                echo "<script>location='../后台界面/index.php'</script>";
            } else {
                $_SESSION['home_uid'] = $row0['uid'];
                $_SESSION['home_username'] = $row0['username'];
                $_SESSION['last_activity'] = time();
                // 清除CSRF Token
                unset($_SESSION['csrf_token']);
                echo "<script>{window.alert('登录成功,确认后将为您跳转网站首页');location.href='../home/首页.php'} </script>";
            }
        } else {
            // 密码错误，记录失败次数
            $found = false;
            foreach ($_SESSION['login_attempts'] as &$attempt) {
                if ($attempt['ip'] == $ip) {
                    $attempt['count']++;
                    $attempt['time'] = time();
                    $found = true;
                    break;
                }
            }
            if (!$found) {
                $_SESSION['login_attempts'][] = [
                    'ip' => $ip,
                    'count' => 1,
                    'time' => time()
                ];
            }

            $remaining = $max_attempts - ($_SESSION['login_attempts'][array_key_last($_SESSION['login_attempts'])]['count'] ?? 0);
            $msg = $remaining > 0 ? "密码错误，剩余{$remaining}次尝试机会" : "密码错误";
            echo "<script>alert('{$msg}');</script>";
            echo "<script>setTimeout(function(){window.location.href='login_page.php';},1500);</script>";
        }
    } else {
        echo "<script>alert('未注册,即将为您自动跳转注册页面');</script>";
        echo "<script>setTimeout(function(){window.location.href='register.html';},1500);</script>";
    }
    $stmt->close();
} else {
    // 非POST请求，生成CSRF Token（用于显示在登录页面）
    if (empty($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }
    // 重定向到登录页面
    header('Location: login_page.php');
    exit;
}
?>

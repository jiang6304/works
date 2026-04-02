<?php
include '../../public/common/config.php';
include '../../public/common/navbar.php';

$sql1 = "SELECT * FROM contact";
$rst1 = mysqli_query($conn, $sql1);
?>
<!DOCTYPE html>
<html lang="zh-CN">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../favicon.ico" />
    <title>意向加盟 - 闲云野鹤手工体验馆</title>
    <link rel="stylesheet" href="../留言/留言.css" />
    <link rel="stylesheet" href="../css/base.css" />
    <link rel="stylesheet" href="../css/common.css" />
    <link rel="stylesheet" href="../css/互动.css" />
    <style>
        input {
            background-color: transparent;
            width: 70%;
            color: #2F4F4F;
            border: none;
            border-bottom: 1px solid #2F4F4F;
            padding: 10px 0;
            text-indent: 10px;
            margin: 8px 0;
            font-size: 16px;
            letter-spacing: 2px;
        }

        input::placeholder {
            color: #2F4F4F;
        }

        input:focus::placeholder {
            color: #2F4F4F;
            opacity: 0.5;
        }

        textarea:focus::placeholder {
            color: #2F4F4F;
            opacity: 0.5;
        }

        textarea::placeholder {
            color: rgb(72, 152, 139);
            font-size: 16px;
        }
    </style>
</head>

<body>
    <a id="留言" href="#" class="link"></a>
    <?php echo getNavbarJoin('join'); ?>
    <div align="center" style="background-color: rgb(95, 158, 160, 0.3);padding-bottom: 20px;padding-top:30px;">
        <div class="contexta2" style="margin-bottom: 10px;">
            <div class="context2">
                <font size="5px" face="bookman old style" color="#2F4F4F">
                    <div class="titlea">Please submit an interest form to join</div>
                </font>
                <div class="line"></div>
                <font size="5px" face="宋体" color="#2F4F4F">
                    <div class="titlea">请提交加盟意向表</div>
                </font>
            </div>
        </div>
        <div class="middle4">
            <form action="insert.php" method="post">
                <div class="register-box" style="margin-top: 30px;">
                    <h1>JOIN US</h1>
                    <div style="width:900px;height:440px;margin:10px auto;font-size:20px;margin-top:5px;">
                        <input type="text" name="name" placeholder="请输入您的姓名">
                        <input name="tell" placeholder="请输入手机号">
                        <input type="text" name="address" placeholder="您的加盟地区">
                        <input type="text" name="budget" placeholder="您的大概预算">
                        <textarea class="post" align="center" name="content" rows="9" color="#2F4F4F" placeholder="更多留言和问题" style="width:600px; padding: 15px;font-size: 16px;"></textarea>
                    </div>
                </div>

                <input type="submit" value="提交" class="btn" style="width: 300px;height:50px;margin:20px auto;font-size:20px;margin-top: 20px;">
            </form>
        </div>
    </div>
    <div align="center" style="background-color: rgb(95, 158, 160, 0.6);">
        <div class="bottom" style="margin:0;">
            <img src="../img/QQ图片20220506135349.png" width="150px" height="100px" />
            <font face="楷体" size="3" color="#2F4F4F">
                <div style="text-align:left;"><b>联系我们：</b></div>
                <div>
                    <?php
                    while ($row1 = mysqli_fetch_assoc($rst1)) {
                        echo "<div style='text-align: left;float:left;margin-right:40px;'><p>" . htmlspecialchars($row1['name'], ENT_QUOTES, 'UTF-8') . "</p>";
                        echo "<p>电话：" . htmlspecialchars($row1['tell'], ENT_QUOTES, 'UTF-8') . "</p>";
                        echo "<p>地址：" . htmlspecialchars($row1['address'], ENT_QUOTES, 'UTF-8') . "</p>";
                        echo "<p>微信：" . htmlspecialchars($row1['wechat'], ENT_QUOTES, 'UTF-8') . "</p></div>";
                    }
                    ?>
                </div>
                <div style="margin-top:10px;">©2023 Mingjing Jiang</div>
            </font>
        </div>
    </div>
</body>

</html>

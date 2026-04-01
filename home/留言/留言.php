<?php
session_start();
include '../../public/common/config.php';
include '../../public/common/navbar.php';
$sql = "SELECT * FROM comment";
$rst = mysqli_query($conn, $sql);
$sql1 = "SELECT * FROM contact";
$rst1 = mysqli_query($conn, $sql1);
?>
<!DOCTYPE html>
<html lang="zh-CN">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>留言板 - 闲云野鹤手工体验馆</title>
    <link rel="stylesheet" href="../css/base.css" />
    <link rel="stylesheet" href="../css/common.css" />
    <link rel="stylesheet" href="../css/互动.css" />
    <link rel="stylesheet" href="留言.css" />
</head>

<body>
    <a id="留言" href="#" class="link"></a>
    <?php echo getNavbarSub('message'); ?>
    <div class="box">
        <div class="conetnt clearfix">
            <div class="footer"></div>
        </div>
        <div align="center" style="background-color: rgb(95, 158, 160, 0.3);padding-bottom: 20px;padding-top:30px;">
            <div class="contexta2">
                <div class="context2">
                    <font size="5px" face="bookman old style" color="#2F4F4F">
                        <div class="titlea">User message board</div>
                    </font>
                    <div class="line"></div>
                    <font size="5px" face="宋体" color="#2F4F4F">
                        <div class="titlea">用户留言板</div>
                    </font>
                </div>
            </div>
            <div class="middle">
                <div class="comment1">
                    <h1 style="margin-top: 20px;">留言列表</h1>
                    <?php
                    while ($row = mysqli_fetch_assoc($rst)) {
                        echo "
                                <div class='messege'>
                                <div class='user'>
                                <div class='userlogo'>
                                    <img src='../img/userlogo.jpg ' width='32px ' height='36px ' />
                                </div>
                                    <h5>" . htmlspecialchars($row['username'], ENT_QUOTES, 'UTF-8') . "</h5>
                                </div>";
                        echo "
                                <div class='comment'>
                                <h4>" . htmlspecialchars($row['content'], ENT_QUOTES, 'UTF-8') . "</h4>
                                <h6>{$row['time']}</h6>
                                </div></div>";
                    }
                    ?>
                </div>
                <div class="comment2">
                    <div class="profile" style="margin-top: 20px;">
                        <h1>快来</h1>
                        <h1>留下你的评论吧</h1>
                    </div>
                    <input type="button" value="发布" onclick='window.open("echo.php")' class="btn" style="width: 120px;height:40px;margin:10px auto;font-size:20px;margin-top: 20px;">
                </div>
            </div>
        </div>
    </div>

    <div align="center" style="background-color: rgb(95, 158, 160, 0.6);">
        <div class="bottom">
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

<?php
session_start();
include '../../public/common/config.php';
include '../../public/common/navbar.php';

if (!isset($_SESSION['home_uid'])) {
    echo "<script> alert('请您先登录');location.href='../login_page.php'</script>";
    exit;
}
$uid = $_SESSION['home_uid'];
$sql = "SELECT * FROM users WHERE uid={$uid}";
$rst = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($rst);
$sql1 = "SELECT * FROM contact";
$rst1 = mysqli_query($conn, $sql1);
?>
<!DOCTYPE html>
<html lang="zh-CN">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>发表留言 - 闲云野鹤手工体验馆</title>
    <link rel="stylesheet" href="留言.css" />
    <link rel="stylesheet" href="../css/base.css" />
    <link rel="stylesheet" href="../css/common.css" />
    <link rel="stylesheet" href="../css/互动.css" />
</head>

<body>
    <a id="留言" href="#" class="link"></a>
    <?php echo getNavbarSub('post'); ?>
    <div align="center" style="background-color: rgb(95, 158, 160, 0.3);padding-bottom: 20px;padding-top:30px;">
        <div class="contexta2" style="margin-bottom: 10px;">
            <div class="context2">
                <font size="5px" face="bookman old style" color="#2F4F4F">
                    <div class="titlea">WRITE DOWN YOUR COMMENT</div>
                </font>
                <div class="line"></div>
                <font size="5px" face="宋体" color="#2F4F4F">
                    <div class="titlea">留下你的评论吧</div>
                </font>
            </div>
        </div>
        <div class="middle4">
            <form action="insert.php" method="post">
                <input type="hidden" name="uid" value='<?php echo $row['uid'] ?>'>
                <input type="hidden" name="username" value='<?php echo htmlspecialchars($row['username'], ENT_QUOTES, 'UTF-8') ?>'>
                <table style="width:900px;height:500px;margin-top: 15px;" align="center">
                    <tr align="center" style="margin-top: 15px;">
                        <td><textarea class="post" align="center" name="content" rows="23" cols="40" placeholder="请输入评论内容" style="padding: 15px;font-size: 16px;"></textarea>
                        </td>
                    </tr>
                </table>
                <input type="submit" value="发布" class="btn" style="width: 300px;height:50px;margin:10px auto;font-size:20px;margin-top: 20px;">
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

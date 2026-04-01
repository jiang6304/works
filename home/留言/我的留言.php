<?php
include '../../public/common/config.php';

if(empty($_SESSION['home_uid'])){
    echo "<script>location='/biyesheji/home/login.html'</script>";
    exit;
}
$uid = $_SESSION['home_uid'];

// 使用预处理语句防止SQL注入
$stmt = $conn->prepare("SELECT * FROM comment WHERE uid = ?");
$stmt->bind_param("s", $uid);
$stmt->execute();
$rst = $stmt->get_result();
?>
<!DOCTYPE html>
<html>

<head>
    <title>我的留言板</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link rel="stylesheet" href='../css/基础.css' />
    <link rel="stylesheet" href='../css/base.css' />
    <link rel="stylesheet" href="../css/common.css" />
    <link rel="stylesheet" href="../css/互动.css" />
    <link rel="stylesheet" href='留言.css' />

</head>

<body>
    <a id="留言" href="#" class="link"></a>
    <div class="shortcut">
        <div class="w" style="font: '微软雅黑';">
            <div class="fl" style="height: 40px; " align="center">
                <ul>
                    <li>
                        <img src="../img/ming.png" width="133px" height="40px" />
                    </li>
                    <li>
                        <a class="active" href="../首页.php">首页</a>
                    </li>

                    <li>
                        <a href="../主营项目.php">主营项目</a>
                    </li>
                    <li>
                        <a class="" href="../门店设计.php">门店设计</a>
                    </li>
                    <li>
                        <a class="active" href="留言.php">留言评论</a>
                    </li>
                    <li>
						<a class="active" href="发布留言.php">发表留言</a>
					</li>

						<li>
							<a class="active" href="../加盟/加盟.php">意向加盟</a>
						</li>
                </ul>
            </div>
            <div class="fr">
                <ul>
                    <li>
                        <a href="../login.html">请登录</a>
                    </li>
                    <li>
                        <a href="../register.html">免费注册</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="box">
        <div class="conetnt clearfix">

            <div class="footer">

            </div>
        </div>
        <div align="center" style="background-color: rgba(95, 158, 160, 0.3);padding-bottom: 20px;padding-top:30px;">
            <div class=" contexta2 ">
                <div class="context2 ">
                    <font size="5px " face="bookman old style " color="#2F4F4F">
                        <div class="titlea ">MY COMMENT BOARD</div>
                    </font>
                    <div class="line "></div>
                    <font size="5px " face="宋体 " color="#2F4F4F">
                        <div class="titlea ">我的留言</div>
                    </font>
                </div>
            </div>
            <div class="middle">
            <div class="comment1">
                <?php
                            while($row = $rst->fetch_assoc()){
                                echo "
                                <div class='messege'>
								<h5>用户名".htmlspecialchars($row['username'], ENT_QUOTES, 'UTF-8')."</h5>";
                                echo "
                                <div class='comment'>
                                <h4>".htmlspecialchars($row['content'], ENT_QUOTES, 'UTF-8')."</h4>
                                <h6>".htmlspecialchars($row['time'], ENT_QUOTES, 'UTF-8')."</h6>
                                </div></div>";
                            }
                        ?>


            </div>
                <div class="comment2">
                    <div class="profile" style="margin-top: 20px;">
                        <h1>快来</h1>
                        <h1>留下你的评论吧</h1>
                    </div>
                    <input type="button" value="再次留言" onclick='window.open("发布留言.php")' class="btn"
                    style="width: 120px;height:40px;margin:10px auto;font-size:20px;margin-top: 20px;">
                </div>

            </div>

        </div>
    </div>


    <div align="center" style="background-color: rgba(95, 158, 160, 0.6) ;margin: 0;">
        <div class="bottom " style="margin: 0;">
            <img src="../img/QQ图片20220506135349.png " width="150px " height="100px " />
            <font face="楷体" size="3" color="#2F4F4F">
                <b>
                    联系我们：
                </b>
                <p>
                    电话:00000000000
                </p>
                <p>
                    QQ:00000000000
                </p>
                <p>
                    微信：00000000000
                </p>
                <p>
                    微博:00000000000
                </p>
                ©2022 Mingjing Jiang
            </font>
        </div>
    </div>
</body>

</html>

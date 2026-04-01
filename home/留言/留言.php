<?php 
session_start();
include '../../public/common/config.php';
$sql = "SELECT * FROM comment";
$rst = mysqli_query($conn, $sql);
$sql1 = "SELECT * FROM contact";
$rst1= mysqli_query($conn, $sql1);
?>
<!DOCTYPE html>
<html>

<head>
    <title>用户留言板</title>
    <meta http-equiv=”Content-Type” content=”text/html; charset=utf-8″><!-- 声明网页使用的是UTF-8编码 -->
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
                        <a class="#active" href="../首页.php">首页</a>
                    </li>

                    <li>
                        <a href="../主营项目.php">主营项目</a>
                    </li>
                    <li>
                        <a class="" href="../门店设计.php">门店设计</a>
                    </li>
                    <li>
                        <a class="active" href="留言.php">留言板</a>
                    </li>
							<li>
								<a class="#active" href="echo.php" >发表留言</a>
							</li>
                    
							<li>
								<a class="#active" href="../加盟/加盟.php">意向加盟</a>
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
        <div align="center" style="background-color: rgb(95, 158, 160, 0.3);padding-bottom: 20px;padding-top:30px;">
            <div class=" contexta2 ">
                <div class="context2 ">
                    <font size="5px " face="bookman old style " color="#2F4F4F">
                        <div class="titlea ">User message board</div>
                    </font>
                    <div class="line "></div>
                    <font size="5px " face="宋体 " color="#2F4F4F">
                        <div class="titlea ">用户留言板</div>
                    </font>
                </div>
            </div>
            <div class="middle">
                <div class="comment1">
                    <h1 style="margin-top: 20px;">留言列表</h1>
                        <?php 
                            while($row=mysqli_fetch_assoc($rst)){
                                echo "
                                <div class='messege'>
                                <div class='user'>
                                <div class='userlogo'>
                                    <img src='../img/userlogo.jpg ' width='32px ' height='36px ' />
                                </div>
                                    <h5>{$row['username']}</h5>
                                </div>";
                                echo "
                                <div class='comment'>
                                <h4>{$row['content']}</h4>
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
                    <input type="button" value="发布" onclick='window.open("echo.php")' class="btn"
                    style="width: 120px;height:40px;margin:10px auto;font-size:20px;margin-top: 20px;">
                </div>

            </div>

        </div>
    </div>

    <div align="center" style="background-color: rgb(95, 158, 160, 0.6) ;">
				<div class="bottom ">
					<img src="../img/QQ图片20220506135349.png " width="150px " height="100px " />
					<font face="楷体" size="3" color="#2F4F4F">
					<div style="text-align:left;"><b>
						联系我们：
					</b></div>
					<div >
					<?php 
                            while($row1=mysqli_fetch_assoc($rst1)){
                                echo "<div style=' 
								text-align: left;float:left;margin-right:40px;'><p>{$row1['name']}</p>";
                                echo "<p>电话：{$row1['tell']}</p>";
                                echo "<p>地址：{$row1['address']}</p>";
                                echo "<p>微信：{$row1['wechat']}</p></div>";
                            }
                        ?>
					</div>
					<div style="margin-top:10px;">
						©2023 Mingjing Jiang
						</div>
					</font>
				</div>
				
			</div>
</body>

</html>
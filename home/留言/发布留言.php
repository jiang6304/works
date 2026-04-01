<?php
 session_start();
 include '../../public/common/config.php';
 
 if (!$_SESSION['home_uid']){
	echo "<script> alert('请您先登录');location='/biyesheji/home/login.html'</script>";
	exit;
 }
$uid=$_SESSION['home_uid'];
$sql="select * from users where uid={$uid}";
$rst=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($rst);
$sql1 = "SELECT * FROM contact";
$rst1= mysqli_query($conn, $sql1);
?>
<!DOCTYPE html>
<html >

<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
<title>我的留言板</title>
    <link rel="stylesheet" href='留言.css' />
    <link rel="stylesheet" href='../css/基础.css' />
    <link rel="stylesheet" href='../css/base.css' />
    <link rel="stylesheet" href="../css/互动.css" />
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
                        <a class="#active" href="留言.php">留言板</a>
                    </li>
							<li>
								<a class="active" href="发布留言.php">发表留言</a>
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
    <div align="center" style="background-color: rgb(95, 158, 160, 0.3);padding-bottom: 20px;padding-top:30px;">
        <div class=" contexta2 " style="margin-bottom: 10px;">
            <div class="context2 ">
                <font size="5px " face="bookman old style " color="#2F4F4F">
                    <div class="titlea ">WRITE DOWN YOUR COMMENT</div>
                </font>
                <div class="line "></div>
                <font size="5px " face="宋体 " color="#2F4F4F">
                    <div class="titlea ">留下你的评论吧</div>
                </font>
            </div>
        </div>
        <div class="middle4">
            <form action="insert.php" method="post">
            <input type="hidden" name="uid" value='<?php echo $row['uid']?>'>	
            <input type="hidden" name="username" value='<?php echo $row['username']?>'>	
                <table style="width:900px;height:500px;margin-top: 15px; " align="center">
                    <tr align="center" style="margin-top: 15px;">
                        <td><textarea class="post" align="center" name="content" rows="23" cols="40"
                                placeholder="请输入评论内容" style="padding: 15px;font-size: 16px;"></textarea>
                        </td>
                        <!--这里有几个name注意一点和数据库当中的命名一一对应-->
                    </tr>
                </table>
                <input type="submit" value="发布" class="btn"
                    style="width: 300px;height:50px;margin:10px auto;font-size:20px;margin-top: 20px;">
            </form>
        </div>
    </div>
    <div align="center" style="background-color: rgb(95, 158, 160, 0.6) ;">
				<div class="bottom " style="margin:0;">
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
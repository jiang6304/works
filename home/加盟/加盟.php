<?php
 include '../../public/common/config.php';

$sql1 = "SELECT * FROM contact";
$rst1= mysqli_query($conn, $sql1);
?>
<!DOCTYPE html>
<html >

<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
<title>意向加盟</title>
    <link rel="stylesheet" href='../留言/留言.css' />
    <link rel="stylesheet" href='../css/基础.css' />
    <link rel="stylesheet" href='../css/base.css' />
    <link rel="stylesheet" href="../css/互动.css" />
<style>
    input{
    background-color: transparent;
    width: 70%;
    color: #2F4F4F;
    border: none;
    /* 下边框样式 */
    border-bottom: 1px solid #2F4F4F;
    padding: 10px 0;
    text-indent: 10px;
    margin: 8px 0;
    font-size: 16px;
    letter-spacing: 2px;
}
input::placeholder{
    color: #2F4F4F;
}
input:focus::placeholder{
    color: #2F4F4F;
    opacity: 0.5;
}
textarea:focus::placeholder{
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
                        <a class="#active" href="../留言/留言.php">留言板</a>
                    </li>
							<li>
								<a class="#active" href="../留言/发布留言.php" >发表留言</a>
							</li>
                    
							<li>
								<a class="active" href="加盟.php">意向加盟</a>
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
                    <div class="titlea ">Please submit an interest form to join</div>
                </font>
                <div class="line "></div>
                <font size="5px " face="宋体 " color="#2F4F4F">
                    <div class="titlea ">请提交加盟意向表</div>
                </font>
            </div>
        </div>
        <div class="middle4">
            <form action="insert.php" method="post">
                <div class="register-box "  style="margin-top: 30px;" >
                    <h1>JOIN US</h1>
                    <div style="width:900px;height:440px;margin:10px auto;font-size:20px;margin-top:5px;">
                    <input type="text" name="name" placeholder="请输入您的姓名">
                    <input  name="tell" placeholder="请输入手机号">
                    <input type="text" name="address" placeholder="您的加盟地区">
                    <input type="text" name="budget" placeholder="您的大概预算">
                    <textarea class="post" align="center" name="content" rows="9" color="#2F4F4F"
                    placeholder="更多留言和问题" style="width:600px; padding: 15px;font-size: 16px;"></textarea>
                    </div>
                </div>
            
                <input type="submit" value="提交" class="btn"
                    style="width: 300px;height:50px;margin:20px auto;font-size:20px;margin-top: 20px;">
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
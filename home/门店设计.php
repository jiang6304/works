<?php 

include '../public/common/config.php';
$sql = "SELECT * FROM contact";
$rst= mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html lang="zh">

<head>
	<meta charset="UTF-8">
	<meta name="description" content="闲云野鹤手工体验馆-手工馆简介以及成品购买网站，给你呈现最详细的店铺介绍以及最优手工品购买体验！" />
	<meta name="keywords" content="手工馆，陶艺馆，手工体验，闲云野鹤手工体验馆" />
	<link rel="shortcut icon" href="favicon.ico" />
	<link rel="stylesheet" href="css/base.css" />
	<link rel="stylesheet" href="css/common.css" />
	<title>门店设计</title>
</head>
<style>
	body {
		background-image: url(../img/背景1.png);
		background-position: center center;
		background-size: cover;
		background-attachment: fixed;
		background-color: rgb(255, 255, 255, 0.7)
	}

	.headera1 {
		background-color: #F5F5F5;
		margin: 0px;
		padding: 0;
		display: flex;
		justify-content: center;
	}

	.headera2 {
		height: 50px;
		background-color: rgb(95, 158, 160, 0.8);
		display: flex;
		justify-content: center;
		margin-bottom: 8px;
		position: fixed;
		top: 0;
		width: 100%;
		z-index: 999;
	}

	.headera21 {
		height: 45px;
		z-index: 999;
	}

	.header2 {
		height: 46px;
		width: 1200px;
	}

	.header21 {
		height: 49px;
		width: 1200px;
		text-align: center;
	}

	.header {
		width: 1200px;
		height: 470px;
		display: flex;
		justify-content: center;
		align-content: center;
		box-shadow: 10px 10px 5px #6666;
	}

	.headera {
		width: 1200px;
		height: 470px;
		display: flex;
		margin: 0 auto;
		justify-content: center;
		align-content: center;
	}

	.middle2 {
		width: 1200px;
		height: 3000px;
		background: rgba(95, 158, 160, 0.3);
		margin: 10px auto;
		/*前面的是上下,后是左右*/
		display: flex;
		align-items: center;
		justify-content: center;
	}

	.bottom {
		height: 200px;
		width: 1200px;
		display: flex;
		justify-content: center;
		align-items: center;
		margin-top: 140px;
	}

	.middle {
		width: 1200px;
		height: 150px;
		margin: 0 auto;
		opacity: 1;
		/*前面的是上下,后是左右*/
	}

	.middle1 {
		height: 290px;
		width: 1600px;
		margin: 10px auto;
		/*前面的是上下,后是左右*/
	}


	h2 {
		color: #5F9EA0;
		font-size: 100px;
	}

	h2 a {
		text-decoration: none;
		color: aliceblue;
	}

	h2 span {
		transition: 0.5s;
	}

	h2:hover span:nth-child(1) {
		margin-right: 10px;
	}

	h2:hover span:nth-child(2) {
		margin-left: 30px;
	}

	h2 span:nth-child(1)::after {
		opacity: 0;
		transition: 2s;
	}

	h2:hover span:nth-child(1)::after {
		content: "#国潮#";
		opacity: 1;
	}

	h2:hover span {
		color: white;
		text-shadow: 0 0 10px #008B8B, 0 0 20px #F0F8FF, 0 0 40px #F0F8FF, 0 0 80px #F0F8FF;
	}

	.headera3 {
		height: 240px;
		width: 1200px;
		padding: 0;
		border: 0;
		margin-bottom: 30px;
		display: flex;
		align-items: center;
		justify-content: center;
	}

	.middle11 {
		height: 100vh;
		overflow-x: hidden;
		perspective: 3px;
		background: rgba(95, 158, 160, 0.3);
	}

	.middle11 div {
		position: relative;
		display: flex;
		justify-content: center;
		align-items: center;
		font-style: 30px;
		letter-spacing: 2px;
	}

	.image {
		transform: translateZ(-1px) scale(1.6);
		background-size: cover;
		height: 100vh;
		z-index: -1;
	}

	.text {
		height: 50vh;
		background-color: #fff;
	}

	.text h1 {
		color: #5F9EA0;
		font-size: 90px;
		font-family: "楷体";
	}

	.heading {
		z-index: 1;
		transform: translateY(-40vh) translateZ(1px);
		color: #fff;
		font-size: 45px;
		font-family: "楷体";
	}

	.active {
		background-color: #008B8B;
	}
</style>
</head>

<body>
	<div class="shortcut">
		<div class="w" style="font: '微软雅黑';">
			<div class="fl" style="height: 40px; " align="center">
				<ul>
					<li>
						<img src="img/ming.png" width="133px" height="40px" />
					</li>
					<li>
						<a class="#active" href="首页.php">首页</a>
					</li>

					<li>
						<a href="主营项目.php">主营项目</a>
					</li>
					<li>
						<a class="active" href="门店设计.php">门店设计</a>
					</li>
					<li>
						<a class="#active" href="留言/留言.php">留言板</a>
					</li>
							<li>
								<a class="#active" href="留言/发布留言.php">发表留言</a>
							</li>
					
							<li>
								<a class="#active" href="加盟/加盟.php">意向加盟</a>
							</li>
				</ul>
			</div>
			<div class="fr">
				<ul>
					<li>
						<a href="login.html">请登录</a>
					</li>
					<li>
						<a href="register.html">请注册</a>
					</li>
				</ul>
			</div>
		</div>
	</div>

	<div align="center">
		<div class="middle11">
			<div class="image" style="background-image: url('./11.png');"></div>
			<div class="heading">
				<h1>超大展览墙</h1>
			</div>
			<div class="text">
				<h1>虚位翘首，留待嘉宾</h1>
			</div>
			<div class="image" style="background-image: url('./12.jpg');"></div>
			<div class="heading">
				<h1>座落商场</h1>
			</div>
			<div class="text">
				<h1>休闲娱乐双倍乐<br />亲情友情多份情</h1>
			</div>
			<div class="image" style="background-image: url('./13.jpg');"></div>
			<div class="heading">
				<h1>清雅油纸伞展厅</h1>
			</div>
			<div class="text">
				<h1>一笔一划皆是情，淡妆浓抹总相宜</h1>
			</div>
			<div class="image" style="background-image: url('./14.jpg');"></div>
			<div class="heading">
				<h1>中式设计，写意传统</h1>
			</div>
			</div>
	</div>
			<div align="center" style="background-color: rgb(95, 158, 160, 0.6) ;">
				<div class="bottom " style="margin-top:0px;">
					<img src="img/QQ图片20220506135349.png " width="150px " height="100px " />
					<font face="楷体" size="3" color="#2F4F4F">
					<div style="text-align:left;"><b>
						联系我们：
					</b></div>
					<div >
					<?php 
                            while($row=mysqli_fetch_assoc($rst)){
                                echo "<div style=' 
								text-align: left;float:left;margin-right:40px;'><p>{$row['name']}</p>";
                                echo "<p>电话：{$row['tell']}</p>";
                                echo "<p>地址：{$row['address']}</p>";
                                echo "<p>微信：{$row['wechat']}</p></div>";
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
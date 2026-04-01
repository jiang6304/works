<?php
include 'lock.php';
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>left</title>
	<style>
		*{
			font-family: 微软雅黑;
			text-decoration:none;
		}
		body{
			background-color: rgba(95, 158, 160, 0.4);
		}
		h4{
			cursor: pointer;
			background: rgba(95, 158, 160, 0.8);
			border-radius:3px;
			padding: 8px;
			text-align: center;
			color:#fff;
		}

		h4:hover{
			color:#008B8B;
			background:#fff;
		}

		div{
			display: none;
		}

		p{
			padding-left:15px;
			background: rgb(91, 136, 137);
			border-radius:5px;
		}

		p a{
			color:#fff;
		}

		p :hover{
			color:#e4eeef;
		}
	</style>
	<script src='public/js/jquery.js'></script>
</head>
<body>
	<h4>用户管理</h4>
	<div>
		<p><a href='user/index.php' target='right'>|-查看用户</a></p>
		<p><a href='user/add.php' target='right'>|-添加用户</a></p>
	</div>
	<h4>管理员管理</h4>
	<div>
		<p><a href='admin/index.php' target='right'>|-查看管理员</a></p>
		<p><a href='admin/add.php' target='right'>|-添加管理员</a></p>
	</div>
	<h4>店铺联系方式管理</h4>
	<div>
		<p><a href='contact/index.php' target='right'>|-查看店铺信息</a></p>
		<p><a href='contact/add.php' target='right'>|-添加店铺信息</a></p>
	</div>
	<h4>评论管理</h4>
	<div>
		<p><a href='comment/index.php' target='right'>|-查看评论</a></p>
	</div>
	<h4>加盟表管理</h4>
	<div>
		<p><a href='ally/index.php' target='right'>|-查看加盟意向表</a></p>
	</div>
	<h4>系统管理</h4>
	<div>
		<p><a href="logout.php" target='_top' onclick="return confirm('您确认退出系统吗？')">|-退出系统</a></p>
		<p><a href="../home/首页.php" target='_blank'>|-网站首页</a></p>
	</div>
</body>
<script>
$('h4').click(function(){
	$(this).next().toggle();
	$('div').not($(this).next()).hide();
});
</script>
</html>
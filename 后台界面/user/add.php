<?php
include '../lock.php';
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>index</title>
	<link rel="stylesheet" href="../public/css/index.css">
</head>
<body>
	<div class="main">
		<form action="insert.php" method='post'>
		<p>账号:</p>
			<p><input type="number" name='uid'></p>
			<p>用户名:</p>
			<p><input type="text" name='username'></p>
			<p>手机号:</p>
			<p><input type="number" name='tell'></p>
			<p>密码:</p>
			<p><input type="password" name='passwd'></p>

			<p><input type="submit" value="添加"></p>
		</form>		
	</div>
	
</body>
</html>
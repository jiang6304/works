<?php
include '../lock.php';
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>index</title>
		<link rel="icon" href="../../home/favicon.ico">
	<link rel="stylesheet" href="../public/css/index.css">
</head>
<body>
	<div class="main">
		<form action="insert.php" method='post'>
			<p>店名:</p>
			<p><input type="text" name='name'></p>
			<p>电话:</p>
			<p><input type="number" name='tell'></p>
			<p>地址:</p>
			<p><input type="text" name='address'></p>
			<p>微信:</p>
			<p><input type="text" name='wechat'></p>

			<p><input type="submit" value="添加"></p>
		</form>			
	</div>
	
</body>
</html>
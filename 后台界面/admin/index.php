<?php 
include '../../public/common/config.php';
include '../lock.php';
$sql = "SELECT * FROM users where isadmin=1";
$rst = mysqli_query($conn, $sql);
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>index</title>
		<link rel="icon" href="../../home/favicon.ico">
	<link rel="stylesheet" href="../public/css/index.css">
	<style>
	a{
	text-decoration: none;
	background: rgb(60, 105, 103);
	color:#fff;
	border-radius:5px;
	padding:5px;
}
	</style>
</head>
<body>
	<div class="main">
		<table>
			<tr>
				<th>编号</th>
				<th>用户名</th>
				<th>修改</th>
			</tr>	
			<?php 
				while($row=mysqli_fetch_assoc($rst)){
					echo "<tr>";
					echo "<td>{$row['uid']}</td>";
					echo "<td>{$row['username']}</td>";
					echo "<td><a href='edit.php?uid={$row['uid']}'>修改</a></td>";
					echo "</tr>";
				}
			?>
		</table>
	</div>
	
</body>
</html>
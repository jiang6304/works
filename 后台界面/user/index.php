<?php
include '../lock.php';
include '../../public/common/config.php';
$sql = "SELECT * FROM users where isadmin=0";
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
				<th>删除</th>
			</tr>
			<?php
				while($row=mysqli_fetch_assoc($rst)){
					echo "<tr>";
					echo "<td>" . htmlspecialchars($row['uid'], ENT_QUOTES, 'UTF-8') . "</td>";
					echo "<td>" . htmlspecialchars($row['username'], ENT_QUOTES, 'UTF-8') . "</td>";
					echo "<td><a href='edit.php?uid=" . htmlspecialchars($row['uid'], ENT_QUOTES, 'UTF-8') . "'>修改</a></td>";
					echo "<td><a href='delete.php?uid=" . htmlspecialchars($row['uid'], ENT_QUOTES, 'UTF-8') . "'>删除</a></td>";
					echo "</tr>";
				}
			?>
		</table>
	</div>
</body>
</html>

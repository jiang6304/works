<?php 
include '../../public/common/config.php';
include '../lock.php';
$sql = "SELECT * FROM ally";
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
				<th>加盟人</th>
				<th>电话</th>
				<th>地址</th>
				<th>预算</th>
				<th>留言</th>
				<th>修改</th>
				<th>删除</th>
			</tr>	
			<?php 
				while($row=mysqli_fetch_assoc($rst)){
					echo "<tr>";
					echo "<td>{$row['id']}</td>";
					echo "<td>{$row['name']}</td>";
					echo "<td>{$row['tell']}</td>";
					echo "<td>{$row['address']}</td>";
					echo "<td>{$row['budget']}</td>";
					echo "<td>{$row['content']}</td>";
					echo "<td><a href='edit.php?id={$row['id']}'>修改</a></td>";
					echo "<td><a href='delete.php?id={$row['id']}'>删除</a></td>";
					echo "</tr>";
				}
			?>
		</table>
	</div>
	
</body>
</html>
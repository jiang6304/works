<?php
include '../../public/common/config.php';
include '../lock.php';
$uid = isset($_GET['uid']) ? intval($_GET['uid']) : 0;

// 使用预处理语句防止SQL注入
$stmt = $conn->prepare("SELECT * FROM users WHERE uid = ?");
$stmt->bind_param("i", $uid);
$stmt->execute();
$rst = $stmt->get_result();
$row = $rst->fetch_assoc();
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
		<form action="update.php" method='post'>
			<p>用户名:</p>
			<p><input type="text" name='username' value='<?php echo htmlspecialchars($row['username'], ENT_QUOTES, 'UTF-8'); ?>'></p>

			<p>密码:</p>
			<p><input type="password" name='passwd'></p>

			<input type="hidden" name="uid" value='<?php echo htmlspecialchars($row['uid'], ENT_QUOTES, 'UTF-8'); ?>'>

			<p><input type="submit" value="修改"></p>
		</form>
	</div>

</body>
</html>

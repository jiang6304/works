<?php
include '../../public/common/config.php';
include '../lock.php';
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// 使用预处理语句防止SQL注入
$stmt = $conn->prepare("SELECT * FROM ally WHERE id = ?");
$stmt->bind_param("i", $id);
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
			<p>加盟人:</p>
			<p><input type="text" name='name' value='<?php echo htmlspecialchars($row['name'], ENT_QUOTES, 'UTF-8'); ?>'></p>
			<p>电话:</p>
			<p><input type="tell" name='tell' value='<?php echo htmlspecialchars($row['tell'], ENT_QUOTES, 'UTF-8'); ?>'></p>
			<p>地址:</p>
			<p><input type="text" name='address' value='<?php echo htmlspecialchars($row['address'], ENT_QUOTES, 'UTF-8'); ?>'></p>
			<p>预算:</p>
			<p><input type="text" name='budget' value='<?php echo htmlspecialchars($row['budget'], ENT_QUOTES, 'UTF-8'); ?>'></p>
			<p>留言:</p>
			<p><input type="text" name='content' value='<?php echo htmlspecialchars($row['content'], ENT_QUOTES, 'UTF-8'); ?>'></p>
			<input type="hidden" name="id" value='<?php echo htmlspecialchars($row['id'], ENT_QUOTES, 'UTF-8'); ?>'>

			<p><input type="submit" value="修改"></p>
		</form>
	</div>

</body>
</html>

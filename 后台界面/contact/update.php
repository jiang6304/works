<?php
include '../../public/common/config.php';
include '../lock.php';

$id = isset($_POST['id']) ? intval($_POST['id']) : 0;
$name = isset($_POST['name']) ? trim($_POST['name']) : '';
$tell = isset($_POST['tell']) ? trim($_POST['tell']) : '';
$address = isset($_POST['address']) ? trim($_POST['address']) : '';
$wechat = isset($_POST['wechat']) ? trim($_POST['wechat']) : '';

// 使用预处理语句防止SQL注入
$stmt = $conn->prepare("UPDATE contact SET name = ?, tell = ?, address = ?, wechat = ? WHERE id = ?");
$stmt->bind_param("ssssi", $name, $tell, $address, $wechat, $id);

if($stmt->execute()){
    echo '<script>location="index.php"</script>';
}else{
    echo '<script>alert("修改失败");location="index.php"</script>';
}
$stmt->close();
?>

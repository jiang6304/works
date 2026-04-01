<?php
include '../../public/common/config.php';
include '../lock.php';

$name = isset($_POST['name']) ? trim($_POST['name']) : '';
$tell = isset($_POST['tell']) ? trim($_POST['tell']) : '';
$address = isset($_POST['address']) ? trim($_POST['address']) : '';
$wechat = isset($_POST['wechat']) ? trim($_POST['wechat']) : '';

// 使用预处理语句防止SQL注入
$stmt = $conn->prepare("INSERT INTO contact (name, tell, address, wechat) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssss", $name, $tell, $address, $wechat);

if($stmt->execute()){
    echo '<script>alert("添加成功");location="index.php"</script>';
}else{
    echo '<script>alert("添加失败");location="index.php"</script>';
}
$stmt->close();
?>

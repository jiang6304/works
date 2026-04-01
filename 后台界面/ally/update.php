<?php
include '../../public/common/config.php';
include '../lock.php';

$id = isset($_POST['id']) ? intval($_POST['id']) : 0;
$name = isset($_POST["name"]) ? trim($_POST["name"]) : '';
$address = isset($_POST["address"]) ? trim($_POST["address"]) : '';
$tell = isset($_POST["tell"]) ? trim($_POST["tell"]) : '';
$budget = isset($_POST["budget"]) ? trim($_POST["budget"]) : '';
$content = isset($_POST["content"]) ? trim($_POST["content"]) : '';

// 使用预处理语句防止SQL注入
$stmt = $conn->prepare("UPDATE ally SET name = ?, tell = ?, address = ?, budget = ?, content = ? WHERE id = ?");
$stmt->bind_param("sssssi", $name, $tell, $address, $budget, $content, $id);

if($stmt->execute()){
    echo '<script>location="index.php"</script>';
}else{
    echo '<script>alert("修改失败");location="index.php"</script>';
}
$stmt->close();
?>

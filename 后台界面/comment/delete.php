<?php
include '../../public/common/config.php';
include '../lock.php';
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// 使用预处理语句防止SQL注入
$stmt = $conn->prepare("DELETE FROM comment WHERE id = ?");
$stmt->bind_param("i", $id);

if($stmt->execute()){
    echo '<script>location="index.php"</script>';
}else{
    echo '<script>alert("删除失败");location="index.php"</script>';
}
$stmt->close();
?>

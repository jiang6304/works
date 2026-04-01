<?php
include '../../public/common/config.php';
include '../lock.php';
$uid = isset($_GET['uid']) ? intval($_GET['uid']) : 0;

if($uid <= 0){
    echo '<script>alert("参数错误");location="index.php"</script>';
    exit;
}

// 使用预处理语句防止SQL注入
$stmt = $conn->prepare("DELETE FROM users WHERE uid = ?");
$stmt->bind_param("i", $uid);

if($stmt->execute()){
    echo '<script>location="index.php"</script>';
}else{
    echo '<script>alert("删除失败");location="index.php"</script>';
}
$stmt->close();
?>

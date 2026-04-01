<?php
include '../../public/common/config.php';
include '../lock.php';

$uid = isset($_POST["uid"]) ? trim($_POST["uid"]) : '';
$username = isset($_POST["username"]) ? trim($_POST["username"]) : '';
$tell = isset($_POST["tell"]) ? trim($_POST["tell"]) : '';
$passwd = isset($_POST["passwd"]) ? $_POST["passwd"] : '';

if(empty($uid)){
    echo"<script>alert('账号为空'); </script>";
    echo "<script>setTimeout(function(){window.location.href='add.php';},1000);</script>";
    exit;
}
if(empty($passwd)){
    echo"<script>alert('密码为空'); </script>";
    echo "<script>setTimeout(function(){window.location.href='add.php';},1000);</script>";
    exit;
}

// 检查账号是否存在
$stmt = $conn->prepare("SELECT * FROM users WHERE uid = ?");
$stmt->bind_param("s", $uid);
$stmt->execute();
$result = $stmt->get_result();
$row0 = $result->fetch_assoc();

if($row0){
    echo"<script>alert('该账号已存在，请更换账号'); </script>";
    echo "<script>setTimeout(function(){window.location.href='add.php';},1000);</script>";
    exit;
}

// 插入新管理员
$passwd_md5 = md5($passwd);
$isadmin = 1;
$stmt1 = $conn->prepare("INSERT INTO users (uid, username, tell, passwd, isadmin) VALUES (?, ?, ?, ?, ?)");
$stmt1->bind_param("ssssi", $uid, $username, $tell, $passwd_md5, $isadmin);

if($stmt1->execute()){
    echo '<script>location="index.php"</script>';
}else{
    echo '<script>alert("添加失败");location="index.php"</script>';
}
$stmt1->close();
$stmt->close();
?>

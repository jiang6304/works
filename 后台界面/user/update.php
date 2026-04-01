<?php
include '../../public/common/config.php';
include '../lock.php';

$username = isset($_POST['username']) ? trim($_POST['username']) : '';
$passwd = isset($_POST['passwd']) ? $_POST['passwd'] : '';
$uid = isset($_POST['uid']) ? $_POST['uid'] : '';

if(empty($username) || empty($uid)){
    echo '<script>alert("参数错误");location="index.php"</script>';
    exit;
}

if(!empty($passwd)){
    // 有密码则更新密码
    $passwd_md5 = md5($passwd);
    $stmt = $conn->prepare("UPDATE users SET username = ?, passwd = ? WHERE uid = ?");
    $stmt->bind_param("ssi", $username, $passwd_md5, $uid);
}else{
    // 无密码则只更新用户名
    $stmt = $conn->prepare("UPDATE users SET username = ? WHERE uid = ?");
    $stmt->bind_param("si", $username, $uid);
}

if($stmt->execute()){
    echo '<script>location="index.php"</script>';
}else{
    echo '<script>alert("修改失败");location="index.php"</script>';
}
$stmt->close();
?>

<?php
header('content-type:text/html;charset=utf-8');
// 引入数据库配置
include '../public/common/config.php';

$username = isset($_POST["username"]) ? trim($_POST["username"]) : '';
$passwd = isset($_POST["passwd"]) ? $_POST["passwd"] : '';
$tell = isset($_POST["tell"]) ? trim($_POST["tell"]) : '';
$uid = isset($_POST["uid"]) ? trim($_POST["uid"]) : '';
$repasswd = isset($_POST["repasswd"]) ? $_POST["repasswd"] : '';

if(empty($uid)){
    echo"<script>alert('账号为空'); </script>";
    echo "<script>setTimeout(function(){window.location.href='register.html';},1000);</script>";
    exit;
}
if(empty($passwd)){
    echo"<script>alert('密码为空'); </script>";
    echo "<script>setTimeout(function(){window.location.href='register.html';},1000);</script>";
    exit;
}
if(empty($repasswd)){
    echo"<script>alert('请填写确认密码'); </script>";
    echo "<script>setTimeout(function(){window.location.href='register.html';},1000);</script>";
    exit;
}

// 使用预处理语句检查账号是否存在
$stmt = $conn->prepare("SELECT * FROM users WHERE uid = ?");
$stmt->bind_param("s", $uid);
$stmt->execute();
$result = $stmt->get_result();
$row0 = $result->fetch_assoc();

if($row0){
    echo"<script>alert('该账号已存在，请更换账号'); </script>";
    echo "<script>setTimeout(function(){window.location.href='register.html';},1000);</script>";
    exit;
}

// 用户注册，插入新数据
if($passwd == $repasswd){
    $passwd_md5 = md5($passwd);
    $stmt1 = $conn->prepare("INSERT INTO users (uid, username, tell, passwd) VALUES (?, ?, ?, ?)");
    $stmt1->bind_param("ssss", $uid, $username, $tell, $passwd_md5);

    if ($stmt1->execute()) {
        echo "<script>alert('注册成功'); </script>";
        echo "<script>location='login_page.php'</script>";
    } else {
        echo "注册失败: " . $stmt1->error;
    }
    $stmt1->close();
}
else{
    echo"<script>alert('输入的两次密码不相同');</script>";
    echo "<script>location='register.html'</script>";
}
$stmt->close();
?>

<?php
header('content-type:text/html;charset=utf-8');
// 引入数据库配置
include '../public/common/config.php';

$uid = isset($_POST["uid"]) ? trim($_POST["uid"]) : '';
$passwd = isset($_POST["passwd"]) ? $_POST["passwd"] : '';

if(empty($uid)){
    echo"<script>alert('账号为空'); </script>";
    echo "<script>setTimeout(function(){window.location.href='login.html';},1000);</script>";
    exit;
}

if(empty($passwd)){
    echo"<script>alert('密码为空'); </script>";
    echo "<script>setTimeout(function(){window.location.href='login.html';},1000);</script>";
    exit;
}

$passwd_md5 = md5($passwd);

// 使用预处理语句防止SQL注入
$stmt = $conn->prepare("SELECT * FROM users WHERE uid = ?");
$stmt->bind_param("s", $uid);
$stmt->execute();
$result = $stmt->get_result();
$row0 = $result->fetch_assoc();

if($row0){
    if ($passwd_md5 == $row0['passwd'])
    {
        // 检查是否是管理员
        $stmt1 = $conn->prepare("SELECT * FROM users WHERE uid = ? AND passwd = ? AND isadmin = 1");
        $stmt1->bind_param("ss", $uid, $passwd_md5);
        $stmt1->execute();
        $rst1 = $stmt1->get_result();
        $row1 = $rst1->fetch_assoc();

        if($row1){
            $_SESSION['admin_uid'] = $row1['uid'];
            echo"<script>alert('欢迎管理员');</script>";
            echo "<script>location='../后台界面/index.php'</script>";
        }
        else{
            $_SESSION['home_uid'] = $row0['uid'];
            $_SESSION['home_username'] = $row0['username'];
            echo "<script> {window.alert('登录成功,确认后将为您跳转网站首页');
                location.href='../home/首页.php'} </script>";
        }
    }else{
        echo "<script>alert('密码错误');</script>";
        echo "<script>setTimeout(function(){window.location.href='login.html';},1000);</script>";
    }
}
else{
    echo "<script>alert('未注册,即将为您自动跳转注册页面');</script>";
    echo "<script>setTimeout(function(){window.location.href='register.html';},1000);</script>";
}
$stmt->close();
?>

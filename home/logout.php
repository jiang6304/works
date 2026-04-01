<?php
/**
 * 退出登录脚本
 */
header('content-type:text/html;charset=utf-8');
include '../public/common/config.php';

// 开启Session
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// 清除记住我Token（从数据库）
if (isset($_SESSION['home_uid'])) {
    $uid = $_SESSION['home_uid'];
    $stmt = $conn->prepare("DELETE FROM user_tokens WHERE uid = ?");
    $stmt->bind_param("s", $uid);
    $stmt->execute();
    $stmt->close();
}

if (isset($_SESSION['admin_uid'])) {
    $uid = $_SESSION['admin_uid'];
    $stmt = $conn->prepare("DELETE FROM user_tokens WHERE uid = ?");
    $stmt->bind_param("s", $uid);
    $stmt->execute();
    $stmt->close();
}

// 清除Cookie
setcookie('remember_uid', '', time() - 3600, '/', '', false, true);
setcookie('remember_token', '', time() - 3600, '/', '', false, true);

// 销毁Session
$_SESSION = array();
session_destroy();

// 跳转到登录页面
echo "<script>alert('已成功退出登录');location.href='login_page.php';</script>";
?>

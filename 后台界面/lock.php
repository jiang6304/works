<?php
// 检查Session是否已启动，避免重复启动
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['admin_uid']) || empty($_SESSION['admin_uid'])) {
    echo "<script>location.href='/biyesheji/home/login_page.php'</script>";
    exit;
}
?>

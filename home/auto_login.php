<?php
/**
 * 自动登录检查脚本
 * 在需要登录验证的页面引入此文件
 * 使用方法: include 'auto_login.php';
 */

header('content-type:text/html;charset=utf-8');
include '../public/common/config.php';

// 开启Session
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// 如果已经登录，直接返回
if (isset($_SESSION['home_uid']) || isset($_SESSION['admin_uid'])) {
    return;
}

// 检查记住我Cookie
if (isset($_COOKIE['remember_uid']) && isset($_COOKIE['remember_token'])) {
    $uid = $_COOKIE['remember_uid'];
    $token = $_COOKIE['remember_token'];

    // 验证Token
    $stmt = $conn->prepare("SELECT t.*, u.username, u.isadmin FROM user_tokens t
                           JOIN users u ON t.uid = u.uid
                           WHERE t.uid = ? AND t.token = ? AND t.expire > ?");
    $current_time = time();
    $stmt->bind_param("ssi", $uid, $token, $current_time);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($row = $result->fetch_assoc()) {
        // Token有效，自动登录
        if ($row['isadmin'] == 1) {
            $_SESSION['admin_uid'] = $row['uid'];
            $_SESSION['admin_username'] = $row['username'];
        } else {
            $_SESSION['home_uid'] = $row['uid'];
            $_SESSION['home_username'] = $row['username'];
        }
        $_SESSION['last_activity'] = time();

        // 更新Token（延长有效期）
        $new_token = bin2hex(random_bytes(32));
        $new_expire = time() + 60 * 60 * 24 * 7; // 7天
        $stmt_update = $conn->prepare("UPDATE user_tokens SET token = ?, expire = ? WHERE uid = ?");
        $stmt_update->bind_param("sis", $new_token, $new_expire, $uid);
        $stmt_update->execute();
        $stmt_update->close();

        // 更新Cookie
        setcookie('remember_uid', $uid, $new_expire, '/', '', false, true);
        setcookie('remember_token', $new_token, $new_expire, '/', '', false, true);
    } else {
        // Token无效，清除Cookie
        setcookie('remember_uid', '', time() - 3600, '/', '', false, true);
        setcookie('remember_token', '', time() - 3600, '/', '', false, true);
    }
    $stmt->close();
}
?>

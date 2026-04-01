<?php
// 数据库配置文件
$servername = "localhost";
$username = "root";
$password = "120042";
$dbname = "mydb";

// 开启Session
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// 创建mysqli连接
$conn = new mysqli($servername, $username, $password, $dbname);
// 检查连接
if ($conn->connect_error) {
    die("连接失败: " . $conn->connect_error);
}
// 设置字符集
$conn->set_charset('utf8');
?>
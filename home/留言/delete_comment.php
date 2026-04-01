<?php
header('Content-Type: application/json; charset=utf-8');

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

include '../../public/common/config.php';

// 检查用户是否登录
if (empty($_SESSION['home_uid'])) {
    echo json_encode(['success' => false, 'message' => '请先登录']);
    exit;
}

// 检查请求方法
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['success' => false, 'message' => '非法请求']);
    exit;
}

// 获取参数
$id = isset($_POST['id']) ? intval($_POST['id']) : 0;
$uid = $_SESSION['home_uid'];

// 验证参数
if ($id <= 0) {
    echo json_encode(['success' => false, 'message' => '留言ID无效']);
    exit;
}

// 验证留言是否属于当前用户
$stmt = $conn->prepare("SELECT uid FROM comment WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$comment = $result->fetch_assoc();

if (!$comment) {
    echo json_encode(['success' => false, 'message' => '留言不存在']);
    exit;
}

if ($comment['uid'] != $uid) {
    echo json_encode(['success' => false, 'message' => '无权删除此留言']);
    exit;
}

// 删除留言
$stmt = $conn->prepare("DELETE FROM comment WHERE id = ?");
$stmt->bind_param("i", $id);

if ($stmt->execute()) {
    echo json_encode(['success' => true, 'message' => '删除成功']);
} else {
    echo json_encode(['success' => false, 'message' => '删除失败，请重试']);
}

$stmt->close();
$conn->close();
?>

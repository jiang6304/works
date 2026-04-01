<?php
header('Content-Type: application/json; charset=utf-8');

include '../../public/common/config.php';
include '../lock.php';

// 检查请求方法
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['success' => false, 'message' => '非法请求']);
    exit;
}

// 获取参数
$id = isset($_POST['id']) ? intval($_POST['id']) : 0;
$content = isset($_POST['content']) ? trim($_POST['content']) : '';

// 验证参数
if ($id <= 0) {
    echo json_encode(['success' => false, 'message' => '评论ID无效']);
    exit;
}

if (empty($content)) {
    echo json_encode(['success' => false, 'message' => '评论内容不能为空']);
    exit;
}

if (mb_strlen($content) > 500) {
    echo json_encode(['success' => false, 'message' => '评论内容不能超过500字']);
    exit;
}

// 验证评论是否存在
$stmt = $conn->prepare("SELECT id FROM comment WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    echo json_encode(['success' => false, 'message' => '评论不存在']);
    exit;
}

// 更新评论
$stmt = $conn->prepare("UPDATE comment SET content = ? WHERE id = ?");
$stmt->bind_param("si", $content, $id);

if ($stmt->execute()) {
    echo json_encode(['success' => true, 'message' => '修改成功']);
} else {
    echo json_encode(['success' => false, 'message' => '修改失败，请重试']);
}

$stmt->close();
$conn->close();
?>

<?php
include '../../public/common/config.php';
$content = isset($_POST['content']) ? trim($_POST['content']) : '';
$username = isset($_POST['username']) ? trim($_POST['username']) : '';
$uid = isset($_POST['uid']) ? $_POST['uid'] : '';
$time = date('Y-m-d H:i:s');

if(empty($content)){
    echo "<script>alert('评论不能为空');location='发布留言.php'</script>";
    exit;
}

// 使用预处理语句防止SQL注入
$stmt = $conn->prepare("INSERT INTO comment(username, content, time, uid) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssss", $username, $content, $time, $uid);

if($stmt->execute()){
    echo "<script>alert('发布成功');location='留言.php'</script>";
}
else{
    echo "<script>alert('发布失败');location='发布留言.php'</script>";
}
$stmt->close();
?>

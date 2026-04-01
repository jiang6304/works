<?php
header('content-type:text/html;charset=utf-8');
include '../../public/common/config.php';

$name = isset($_POST["name"]) ? trim($_POST["name"]) : '';
$address = isset($_POST["address"]) ? trim($_POST["address"]) : '';
$tell = isset($_POST["tell"]) ? trim($_POST["tell"]) : '';
$budget = isset($_POST["budget"]) ? trim($_POST["budget"]) : '';
$content = isset($_POST["content"]) ? trim($_POST["content"]) : '';

if(empty($name)){
    echo"<script>alert('姓名为空'); </script>";
    echo "<script>setTimeout(function(){window.location.href='加盟.php';},1000);</script>";
    exit;
}
if(empty($tell)){
    echo"<script>alert('电话为空'); </script>";
    echo "<script>setTimeout(function(){window.location.href='加盟.php';},1000);</script>";
    exit;
}
if(empty($address)){
    echo"<script>alert('地址为空'); </script>";
    echo "<script>setTimeout(function(){window.location.href='加盟.php';},1000);</script>";
    exit;
}
if(empty($budget)){
    echo"<script>alert('预算为空'); </script>";
    echo "<script>setTimeout(function(){window.location.href='加盟.php';},1000);</script>";
    exit;
}

// 使用预处理语句插入数据
$stmt = $conn->prepare("INSERT INTO ally (name, tell, address, budget, content) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("sssss", $name, $tell, $address, $budget, $content);

if ($stmt->execute()) {
    echo "<script>alert('提交成功'); </script>";
    echo "<script>setTimeout(function(){window.location.href='加盟.php';},1000);</script>";
}else{
    echo "<script>alert('提交失败'); </script>";
    echo "<script>setTimeout(function(){window.location.href='加盟.php';},1000);</script>";
}
$stmt->close();
?>

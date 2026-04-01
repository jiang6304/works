<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (empty($_SESSION['home_uid'])) {
    echo "<script> {window.alert('请您先登录,确认后将为您跳转登录页面');
        location.href='../login_page.php'} </script>";
    exit;
} else {
    echo "<script>location='发布留言.php'</script>";
    exit;
}
?>

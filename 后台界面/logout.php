<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$_SESSION = array();

session_destroy();

setcookie('PHPSESSID', '', time() - 3600, '/');

echo '<script>location="../home/login_page.php"</script>';
?>

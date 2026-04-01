<?php
 session_start();

 if (!$_SESSION['admin_uid']){
	echo "<script>location.href='/biyesheji/home/login.html'</script>";
	exit;
 }
?>
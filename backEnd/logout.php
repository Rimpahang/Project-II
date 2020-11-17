<?php
if(empty($_SESSION)){
	session_start();
}
unset($_SESSION['username']);
unset($_SESSION['u_id']);
unset($_COOKIE['member_login']);
session_destroy();
header("Location: ../home.php");
exit;
?>
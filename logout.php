<?php
// set the expiration date to one hour ago
@session_start();
setcookie("username", "", time() - 3600);
echo "Cookie 'username' is deleted.";
session_unset();
header('location: index.php');
?>
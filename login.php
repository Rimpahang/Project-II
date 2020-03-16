<?php
error_reporting(0);
if (isset($_POST['sub'])) {
	$user = $_POST['uname'];
	$pass = md5($_POST['pwd']);

$sql = "SELECT * FROM `kpa_user` WHERE `username` = '$user' AND `password` = '$pass'";
require_once("backEnd/includes/DBconnect.php");
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
	echo "Login succesfully!";
	header('location: index.php');
}
else
	echo "Username or passowrd incorrect!";

}
mysqli_close($conn);
?>


<!DOCTYPE html>
<html>
<head>
	<title>Login - Khwopa Project Archive</title>
	<?php include('includes/head.php'); ?>
</head>
<body>
	<div class="container-fluid col-md-5 col-sm-12 bg-success">
		<h2 style="text-align: center;">Khwopa Project Arhive - User Login</h2>
		<form method="POST" name="user-login">
			<div class="form-group">
				<label for="uname">Username or Email :</label>
				<input type="text" class="form-control" name="uname" id="uname" value="rimpahang" required="required" autofocus="true">
			</div>
			<div class="form-group">
				<label for="pwd">Password :</label>
				<input type="password" name="pwd" id="pwd" value="meow" class="form-control" required="required">
			</div>
			<div class="form-check form-group">
				<label class="form-check-label">
				<input type="checkbox" class="form-check-input" name="check"> Remember me</label>
			</div>
			<input type="submit" name="sub" class="btn btn-primary" value="Login">
		</form>
	</div>

</body>
</html>
<?php 
if (isset($_POST['sub'])) {
	$name = $_POST['name'];
	$uname = $_POST['uname'];
	$email = $_POST['email'];
	$pass = md5($_POST['pwd']);
	$repass = md5($_POST['re-pwd']);

require_once('backEnd/includes/DBconnect.php');
$signup_sql = "INSERT INTO `user` (`name`, `username`, `email`, `password`) VALUES ('$name','$uname', '$email', md5('$fpass'))";

if(mysqli_query($conn, $signup_sql)) {
	echo "Account created succesfully!";
}
else
echo "Error:" . mysqli_error($conn);

}


?>


<!DOCTYPE html>
<html>
<head>
	<title>Sign Up - Khwopa Project Archive</title>
	<?php include('includes/head.php'); ?>
</head>
<body>
	<div class="container-fluid col-md-5 col-sm-12 bg-success">
		<h2 style="text-align: center;">Khwopa Project Archive - User SignUp</h2>
		<form method="POST" name="user-signup">
			<div class="form-group" name="user">
				<label for="name">Name:</label>
				<input type="text" name="name" class="form-control" placeholder="Full Name" required="required">
			</div>
			<div class="form-group">
				<label for="uname">Username:</label>
				<input type="text" name="uname" class="form-control" placeholder="Username" required="required">
			</div>
			<div class="form-group">
				<label for="email">Email:</label>
				<input type="email" name="email" class="form-control" placeholder="example@gmail.com" required="required">
			</div>
			<div class="form-group">
				<label for="pwd">New Password:</label>
				<input type="password" name="pwd" class="form-control" id="pwd" placeholder="Password" required="required">
			</div>
			<div class="form-group">
				<label for="re-pwd">Re-Enter Password:</label>
				<input type="password" name="re-pwd" class="form-control" id="newpwd" placeholder="Re-Enter Password" required="required">
			</div>
			<div id="passmatch"></div>
			<input type="submit" name="sub" class="btn btn-primary" value="Sign Up">
		</form>
	</div>
</body>
</html>

<!-- password match check jquery -->
<script>
function checkPasswordMatch() {
    var password = $("#pwd").val();
    var confirmPassword = $("#newpwd").val();

    if (password != confirmPassword || password == '')
        $("#passmatch").html("Passwords do not match!").css('color','red');
    else
        $("#passmatch").html("Passwords match.").css('color','blue');
}

$(document).ready(function () {
   $("#pwd, #newpwd").keyup(checkPasswordMatch);
});
</script>
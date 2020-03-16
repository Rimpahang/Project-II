<?php
$id = @$_GET['id'];
if (isset($_POST['sub'])) {
    $pass = md5($_POST['pwd']);
    $repass = md5($_POST['re-pwd']);

    require_once('includes/DBconnect.php');

    $get_email_sql = "SELECT * FROM `kpa_pwd_reset` WHERE `id` = '$id'";
    $pwd_reset_data = mysqli_query($conn, $get_email_sql);
    $data = mysqli_fetch_assoc($pwd_reset_data);

    $pwd_reset_sql = "UPDATE `kpa_user` SET `password` = md5('$pass') WHERE `email` = '$data[email]'";

    if(mysqli_query($conn, $pwd_reset_sql)) {
        echo "New Password changed succesfully!";
    }
    else
        echo "Error:" . mysqli_error($conn);

}


?>


<!DOCTYPE html>
<html>
<head>
    <title>Password Reset - Khwopa Project Archive</title>
    <?php include('includes/head.php'); ?>
</head>
<body>
<div class="container-fluid col-md-5 col-sm-12 bg-success">
    <h2 style="text-align: center;">Password Reset</h2>
    <form method="POST" name="new-pwd">
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
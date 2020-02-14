<?php
$email = @$_GET['email'];
if (isset($_POST['sub'])) {
    $key = $_POST['key'];
    date_default_timezone_set('Asia/Kathmandu');
    $date_now = strtotime(date('Y-m-d H:i:s'));

    require_once('includes/DBconnect.php');
    $pwd_reset_key_verify_sql = "SELECT * FROM `pwd_reset` WHERE `email` = '$email' AND `reset_key`= '$key'";
    $result = mysqli_query($conn, $pwd_reset_key_verify_sql);
    if(mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $date_then = $row['sent_time'];
        if($date_now - $date_then <= 600000){      //for testing time is set to 60s
            header("location: set_new_pwd.php?email=$email");
        }
        else {
            echo('Key Expired');
            $expire_sql = "UPDATE `pwd_reset` SET `status` = 0 WHERE `email` = $email";
        }
    }
    else
        echo "No data found to reset password:" . mysqli_error($conn);

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
        <div class="form-group" name="pwd_reset_key">
            <label for="key">Name:</label>
            <input type="text" name="key" class="form-control" placeholder="Enter password reset key" required="required">
        </div>
        <div id="passmatch"></div>
        <input type="submit" name="sub" class="btn btn-primary" value="Sign Up">
    </form>
</div>
</body>
</html>
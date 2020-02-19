<?php
$id = @$_GET['id'];
if (isset($_POST['sub'])) {
    $key = $_POST['key'];

    require_once('includes/DBconnect.php');

    $get_email_sql = "SELECT * FROM `kpa_pwd_reset` WHERE `id` = '$id'";
    $pwd_reset_data = mysqli_query($conn, $get_email_sql);
    $data = mysqli_fetch_assoc($pwd_reset_data);

    date_default_timezone_set('Asia/Kathmandu');
    $date_now = strtotime(date('Y-m-d H:i:s'));

    $expire_key_sql = "UPDATE `kpa_pwd_reset` SET `status` = 0 WHERE `email` = '$data[email]' AND `reset_key` = '$key'";
    $pwd_reset_key_verify_sql = "SELECT * FROM `kpa_pwd_reset` WHERE `email` = '$data[email]' AND `reset_key`= '$key'";

    $result = mysqli_query($conn, $pwd_reset_key_verify_sql);
    if(mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $date_then = $row['sent_time'];
        if($date_now - $date_then <= 5000){      //reset key expire time in second
            mysqli_query($conn, $expire_key_sql);

            header("location: set_new_pwd.php?id=$id");
        }
        else {
//          echo('Key Expired');
            if(mysqli_query($conn, $expire_key_sql)){
                echo 'status updated';
            }
        }
    }
    else
        echo "No data found to reset password:" . mysqli_error($conn);

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
    <h2 style="text-align: center;">Enter Password Reset Key</h2>
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
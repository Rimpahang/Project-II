<?php session_start(); ?>
<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
if (isset($_POST['sub1'])) {
    $email = $_POST['email1'];

require_once('backEnd/includes/DBconnect.php');
$validate_email_sql = "SELECT * FROM `kpa_user` WHERE `email` = '$email' AND `status` = '1'";
$result = mysqli_query($conn, $validate_email_sql);
if (mysqli_num_rows($result) > 0) {
//generate recovery key
    $rekey = rand(100000, 999999);
    date_default_timezone_set('Asia/Kathmandu');
    $sent_date = strtotime(date('Y-m-d H:i:s'));

    $pwd_recovery_key_sql = "INSERT INTO `kpa_pwd_reset` (`email`, `reset_key`,`sent_time`) VALUES ('$email', '$rekey', '$sent_date')";

    if (mysqli_query($conn, $pwd_recovery_key_sql)) {
// Load Composer's autoloader
        require 'backEnd/phpmailer/vendor/autoload.php';

// Instantiation and passing `true` enables exceptions
        $mail = new PHPMailer(true);

        try {
            //Server settings
            $mail->SMTPDebug = 0;                      // Enable verbose debug output
            $mail->isSMTP();                                            // Send using SMTP
            $mail->Host = 'smtp.gmail.com';                    // Set the SMTP server to send through
            $mail->SMTPAuth = true;                                   // Enable SMTP authentication
            $mail->Username = 'khwopaprojectarchive@gmail.com';                     // SMTP username
            $mail->Password = 'acdckanxoace';                               // SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
            $mail->Port = 587;                                    // TCP port to connect to

            //Recipients
            $mail->setFrom('khwopaprojectarchive@gmail.com', 'Khwopa Project Archive');
            $mail->addAddress($email, 'User');     // Add a recipient
            // $mail->addAddress('ellen@example.com');               // Name is optional
            // $mail->addReplyTo('info@example.com', 'Information');
            // $mail->addCC('cc@example.com');
            // $mail->addBCC('bcc@example.com');

            // Attachments
            // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
            // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

            // Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = 'Password Reset';
            $mail->Body = 'Dear, User your password reset key is:<br><b>' . $rekey . '</b><br>Please do not share this key with anyone.';
            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            $mail->send();
            echo 'Message has been sent';

            //getting id from db to sent to another page
            $get_id_sql = "SELECT * FROM `kpa_pwd_reset` WHERE `email` = '$email' AND `status` = 1";
            $pwd_reset_data = mysqli_query($conn, $get_id_sql);
            $data = mysqli_fetch_assoc($pwd_reset_data);
            header("location: backEnd/verify_pwd_reset_key.php?id=$data[id]");
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    } else
        die("Error") . mysqli_error();
}else
    echo("No such email is registered to us!");
}
?>

<?php
require_once("backEnd/includes/DBconnect.php");
$get_data_sql = "SELECT * FROM `kpa_project_list`";
$result_data = mysqli_query($conn, $get_data_sql);
if (mysqli_num_rows($result_data) > 0) {
    $json_array = array();
    while ($row = mysqli_fetch_assoc($result_data)) {
        $json_array[] = $row;

    }
}
 $jencode = json_encode($json_array);

file_put_contents('search_json'.'.json',$jencode);
?>

<?php
error_reporting(0);
// if(isset($_COOKIE["member_login"]))
// { 
//   $_SESSION['username'] = $_COOKIE["member_login"];
//   echo "<script>window.location='home.php';</script>";
//   exit;
// }
// if(isset($_SESSION['username']))
// {
//   echo "<script>window.location='backEnd/dashboard.php';</script>"; 
//   exit;
// }
if (isset($_POST['sub'])) {

  $user = $_POST['username'];
  $pass = md5($_POST['password']);

$sql = "SELECT * FROM `kpa_user` WHERE `username` = '$user' AND `password` = '$pass'";
require_once("backEnd/includes/DBconnect.php");
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
 if(empty($_SESSION)) // if the session not yet started
        session_start();
    $_SESSION['username'] = $user;
    $row = mysqli_fetch_assoc($result);
    $_SESSION['u_id'] = $row['id'];
    if(!empty($_POST["remember_me"])) {
        setcookie ("member_login",$_POST["username"],time()+(60 * 60)); /* expire in 1 hour */
      } else {
        if(isset($_COOKIE["member_login"])) {
          setcookie ("member_login","");
        }
      }
    $activeuser = $_SESSION['username'];
    $sql_1 = "SELECT * FROM `kpa_user` WHERE `username`='$activeuser'";
    $result_1 = mysqli_query($conn,$sql_1);
    $row_1 = mysqli_fetch_assoc($result_1);
    if ($row_1['is_verified']==1)
    {
      if ($row_1['user_type']=="admin" || $row_1['user_type']=="super_admin")
        { echo "<script>window.location='backEnd/dashboard.php';</script>"; exit;}
      else
        { echo "<script>window.location='home.php';</script>"; exit;}
    }
    else
    {  echo "<script>alert('User is yet to be verified. Please wait!');</script>";session_destroy();
    echo "<script>window.location='home.php';</script>";
    exit;
    }         
}
else{
    echo "<script>alert('Username or Password Incorrect!');</script>";
    echo "<script>window.location='home.php';</script>";
    exit;
  }
}
mysqli_close($conn);
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <title>KPA-Projects Collection</title>
    <link rel="icon" type="image/icon"  href="images/1.png">
  <!-- <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>  -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="js/jquery.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <link href="https://fonts.googleapis.com/css?family=Ubuntu&display=swap" rel="stylesheet">
  <script src="bootstrap/js/jquery.1.js"></script>
  <script src="bootstrap/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.9.2/parsley.min.js"></script>
 <link rel="stylesheet" type="text/css" href="fontawesome-free-5.15.1-web/css/all.css"> 

  <script src="js/bootstrap.min.js"></script>
  <script src="ckeditor5-build-classic/ckeditor.js"></script>
  <script src="https://cdn.ckeditor.com/ckeditor5/16.0.0/classic/ckeditor.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.9.2/parsley.min.js"></script>


     <script type="text/javascript">
$('#Login-Form').parsley();
$('#Signin-Form').parsley();
$('#Forgot-Password-Form').parsley();
window.Parsley.addValidator('maxFileSize', {
  validateString: function(_value, maxSize, parsleyInstance) {
   
    var files = parsleyInstance.$element[0].files;
    return files.length != 1  || files[0].size <= maxSize * 1024;
  },
  requirementType: 'integer',
  messages: {
    en: 'This file should not be larger than %s Kb'
  }
});
</script>
  <style type="text/css">
  .fakeimg {
      height: 200px;
      background: #aaa;
    }
    .jumbotron{
      height: 3%;
      padding-top: 20px;
      padding-bottom: 5px;
    }
    .navbar{
      /*height: 60px;*/
      text-transform: uppercase;
      font-weight: 700;
      font-size: .9rem;
      letter-spacing: .1rem;
      /*background: rgba(0, 0, 0, .1)!important;*/
    }
    .dropdown:hover>.dropdown-menu{
      display: block;
      background: #e3e3e3;
    }
    .container1{
      margin: 4% ;
    }
    #icon
    {
      max-width: 200px;
      margin: 5% auto;
    }
    .zoom{
      transition:transform .2s;
    }
    .zoom:hover{
      transform: scale(1.1); /* IE 9 */
      transform: scale(1.1); /* Safari 3-8 */
      transform: scale(1.1); 
    }
    .zoom1{
      transition:transform .5s;
    }
    .zoom1:hover{
      transform: scale(1.4); /* IE 9 */
      transform: scale(1.4); /* Safari 3-8 */
      transform: scale(1.4); 
    }


   @import url("https://fonts.googleapis.com/css?family=Montserrat:400,600,700&display=swap");


.overlay {
  position: fixed;
  display: none;
  align-items: center;
  justify-content: center;
  background: rgba(0, 0, 0, 0.2);
  z-index: 100;
}

.overlay.open {
  display: flex;
  animation: show-overlay 0.5s;
  margin-left: 400px;
  margin-top: -200px;
}

@keyframes show-overlay {
  0% {
    opacity: 0;
  }
  100% {
    opacity: 1;
  }
}

.login {
  padding: 50px 25px;
  background: lightgray;
  border-radius: 10px;
}

.header1 {
  position: relative;

}


.header1 h3 {
  text-align: center;
  text-transform: uppercase;
  color: #000051;
  padding-bottom: 7px;
  border-bottom: 2px solid #000051;
  width: 100%;
}

.header1 i {
  position: absolute;
  top: 0;
  right: 0;
  font-size: 20px;
  color: #000051;
  margin-top: -30px;
}

.body1 .form1 input {
  display: block;
  padding: 10px;
  margin: 25px 10px;
  outline: none;
  border: solid #000051 1px;
  color: #fff;
  transition: 0.4s;
  background: #425A33;
  margin-left: 40px;
  width: 80%;
}


.body1 .form1 input:focus {
  border-color: #534bae;
}

.footer {
  position: relative;
  height: 40px;
  width: 100%;
}




* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  list-style: none;
}



.container {
  background: #9DB091;
   
}

.wrapper .title {
  text-align: center;
  font-weight: 700;
  font-size: 32px;
  color: green;
}

.wrapper .search_box {
  max-width: 1000px;
  background: #fff;
  
  border-radius: 3px;
}

.wrapper .search_box input {
  border: 0;
  border-bottom: 2px solid #e5edfa;
  width: 100%;
  outline: none;
  padding: 10px;
  background: transparent;
  color: black;
  font-size: 16px;
  
}

::placeholder {
  color: #9DB091;
}

.wrapper .search_box input:focus {
  border-bottom: 2px solid green;
}

.table_wrap {
  width: 1000px;
  margin: 50px auto 0;
}

.table_wrap ul li .item {
  display: flex;
  align-items: center;
  background: #fff;
  padding: 15px 0;
  height: 50px;
}

.table_wrap ul li .item .projects,
.table_wrap ul li .item .faculty {
  width: 20%;
  padding: 0 15px;
}

/*.table_wrap ul li .item .status {
  width: 15%;
  padding: 0 15px;
}*/

.table_wrap ul li .item .sem-year {
  width: 45%;
  padding: 0 15px;
}

.table_wrap ul li .item .sem-year span,
.table_wrap ul li .item .projects span {
  width: 90%;
  display: inline-block;
  white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis;
}

.table_header ul li .item {
  border-bottom: 2px solid #eaeaea;
  font-weight: 600;
}

.table_body {
  height: 300px;
  overflow: auto;
}

.table_body ul li .item {
  border-bottom: 1px solid #efefef;
}

/*.table_body ul li .item .status span {
  padding: 5px 20px;
  border-radius: 25px;
  max-width: 115px;
  display: inline-block;
}
*/
/*.table_body ul li .item .open {
  background: #e5edfa;
  color: #5a8ee4;
}

.table_body ul li .item .fixed {
  background: #cff1f0;
  color: #0dbeb6;
}

.table_body ul li .item .closed {
  background: #fedfe5;
  color: #ff89a0;
}

.table_body ul li .item .hold {
  background: #fff0db;
  color: #f59d39;
}

.table_body ul li .item .reopened {
  background: #d6f2ff;
  color: #29a5d8;
}

.table_body ul li .item .canceled {
  background: #ffdbd6;
  color: #e87060;
}*/
 
 footer{
      width: 100%;
      background-color: rgba(120,120,120);
      padding: 1%;
      color: #fff;
    }
    .fab{
      padding: 5px;
      font-size: 25px;
      color: #fff;
    }
    .fab:hover{
      color: rgb(60, 60, 200);
      text-decoration: none;
    }
    @media(max-width: 900px){
      .fab{
        font-size: 20px;
        padding: 10px;
      }
    }
      .fas{
      color: #D9533E;
    }
    .fas:hover{
      color: #3ED9C1;
      text-decoration: none;
    }
    
        #reg-cross:hover{
            cursor: pointer;
        }
        *{ margin:0; padding: 0; box-sizing:border-box; }
       /*---Signup---*/
    .modal-header, .modal-body, .modal-footer{
  padding: 25px;
}
.modal-backdrop{
          z-index:-1;
        }
.modal-footer{
  text-align: center;
}
#signup-modal-content, #forgot-password-modal-content{
  display: none;
}
 
/** validation */
  
input.parsley-error{    
  border-color:#843534;
  box-shadow: none;
}
input.parsley-error:focus{    
  border-color:#843534;
  box-shadow:inset 0 1px 1px rgba(0,0,0,.075),0 0 6px #ce8483
}
.parsley-errors-list.filled {
  opacity: 1;
  color: #a94442;
  display: none;
} 

  </style>
  </head>
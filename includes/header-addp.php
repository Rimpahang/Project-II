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
  <title>KPA-Add Project</title>
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
    .site-content{
      background-image: linear-gradient(rgba(0,168,255,0.3),rgba(0,168,255,0.3)), url('images/sm2.jpg');
      background-attachment: fixed;
      clip-path: polygon(100% 0%, 100% 75%, 50% 100%, 0 75%, 0 0);
      background-size: cover;
    }
    .site-title, .site-desc{
      color: white;
      font-family: 'Righteous' ;

    }
    .site-title{
      margin-top: 20%;
      margin-bottom: 6%;
      font-size: 50px; 
      color: #ff4000; 
    }
    .site-desc{
      font-size: 14px;
      padding-left: 15%;
    }
    .site-btn1{
      margin-left: 28%;
      background-color: black;
      color: white;
      margin-top: 5%;
      margin-bottom: 10%;
    }
    #icon
    {
        max-width: 200px;
        margin: 5% auto;
    }
    .container1{
display: flex;
justify-content: center;
align-items: center;
min-height: 100vh
background: linear-gradient(#0f4675, #0f4675 50%,#fff 50%, #fff 100%);
    }
    .service{
      width: 1100px;
      display: flex;
      justify-content: space-between;
      flex-wrap: wrap;
    }
    .service .box{
      position: relative;
      width: 320px;
      background: #fff;
      padding: 100px 40px 60px;
      box-shadow: 0 15px 45px rgba(0,0,0,.1);
    }
    .service .box:before{
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: #ff226d;
      transform: scaleY(0);
      transform-origin: top;
      transition: transform 0.5s;
    }
    .service .box:hover:before{
      transform: scaleY(1);
      transform-origin: bottom;
      transition: transform 0.5s;
    }
    .service .box h2{
      position: absolute;
      left: 40px;
      top: 60px;
      font-size: 4em;
      font-weight: 800;
      z-index: 1;
      opacity: 0.1;
      transition: 0.5s;
    }
    .service .box:hover h2{
      opacity: 1;
      color: #fff;
      transform: translateY(-40px);
    }
    .service .box h3{
      position: relative;
      font-size: 1.5rem;
      z-index: 2;
      color: #333;
      transition: 0.5s;
    }
     .service .box p{
      position: relative;
      z-index: 2;
      color: #555;
      transition: 0.5s;
    }
        .service .box:hover h3,
        .service .box:hover p{
      color: #fff;
    }
     /* <!---Signup--->*/
      .modal-backdrop
      {z-index:-1;
        }
    /*---Signup---*/
    .modal-header, .modal-body, .modal-footer{
  padding: 25px;
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
   /* <!---Add Project--->*/
   .container2{
    background-image: url('images/robot.jpg');
    background-size: cover;
    background-attachment: fixed;
    font-family: new time roman;
    height: 1050px;
   }
   .h1{
    font-size: 40px;
    color: white;
    margin-top: 230px;
    margin-left: 70px;
   }
   .zoom1{
      transition:transform .5s;
    }
    .zoom1:hover{
      transform: scale(1.4); /* IE 9 */
      transform: scale(1.4); /* Safari 3-8 */
      transform: scale(1.4); 
    }
   p{
    font-size: 17px;
    color: white;
    margin-left: 30px;

   }
   h3{
    font-size: 25px;
    color: white;
   }
   .glyphicon-pencil{
    font-size: 35px;
    color:white;
    float: right;
    margin-top: 20px;
   }
   .col-md-5{
    margin-top: -310px;
    margin-left: 630px;
    box-shadow: -1px 1px 60px 10px black;
    background: rgba(0,0,0,0.4);
   }
   .label{
    font-weight: normal;
    margin-top: 25px;
    color: white;
    font-size: 19px
    margin-left: 35px;
   }
   .form-control1{
    background: transparent;
    border-radius: 0px;
    border: 0px;
    border-bottom: 1px solid white;
    font-size: 18px;
    margin-top: 15px;
    height: 60px;
    color: white;
    width: 360px;

   }
   
   input[type="checkbox"]{
    margin-top: 15px;
    width: 15px;
    height: 15px;
   }
   small{
    font-size: 18px;
    color: white;
   }
   input[type="radio"]{
    margin-top: 22px;
   }
   option{
    color: grey;
   }
   .btn-info{
    margin-top: 20px;
    font-size: 18px;
    width: 90px;
    margin-bottom: 20px;
    margin-left: 20px;

   }
   .btn-warning{
    margin-top: -83px;
    font-size: 18px;
    width: 90px;
    margin-bottom: 20px;
    margin-left: 340px;
   }
    *{ margin:0; padding: 0; box-sizing:border-box; }
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

     /* <!---Upload button--->*/  
     #custom-button {
  padding: 1px;
  color: white;
  background-color: #009578;
  border: 1px solid #000;
  border-radius: 5px;
  cursor: pointer;
  margin-left: 30px;
}

#custom-button:hover {
  background-color: #00b28f;
}

#custom-text {
  margin-left: 10px;
  font-family: sans-serif;
  color: #aaa;
}
 
  /*  .fab
    {text-align: center;
      padding: 10px;

    }
    .fab:hover{
      opacity: 0.7;
    }
    .fa-facebook
    {
      background: #3B5998;
      color: white;
      }*/
  /*.navbar-nav li{padding-right: .7rem;}
  .navbar-dark .navbar-nav .nav-link{color:white;padding-top:.8rem;}
  .navbar-dark .navbar-nav .navbar-link.avtive,
  .navbar-dark ,navbar-nav .nav-link:hover{color:#1ebba3;}*/
</style>
</head>
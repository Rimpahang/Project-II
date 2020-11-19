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
<html>
<head>
    <title>KPA-Projects</title>
    <link rel="icon" type="image/icon"  href="images/1.png">

     <meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="stylesheet" type="text/css" href="fontawesome-free-5.15.1-web/css/all.css"> 
  <link rel="stylesheet" href="css/bootstrap.min.css">
<script src="js/jquery.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <link href="https://fonts.googleapis.com/css?family=Ubuntu&display=swap" rel="stylesheet">
  <script src="bootstrap/js/jquery.1.js"></script>
  <!-- <script src="bootstrap/js/bootstrap.min.js"></script> -->
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
<style>
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
    /*<!-- Project Description -->*/
    .gap10
    {
        padding: 80px 0px;
    }
 /* h2{
        font-size: 40px;
        color: #181174;
        text-transform: uppercase;
        margin-bottom: 20px;
    }*/
    .zoom1{
      transition:transform .5s;
    }
    .zoom1:hover{
      transform: scale(1.4); /* IE 9 */
      transform: scale(1.4); /* Safari 3-8 */
      transform: scale(1.4); 
    }
    /*****service offered ******/
    p{
        font-size: 0.9rem;
        line-height: 1.6;
        font-weight: 400;
        color: #606060;
    }
    .serviceoffers{
        background: #f7f7f9;
        padding: 50px 0;
        margin-bottom: 50px;
    }
    .headings{
        margin-bottom: 50px;
    }
    .headings h1{
        font-size: 1.5rem;
        font-weight: 600;
        text-transform: uppercase;
    }
    .names h1{
        color: #2e2e2e;
        font-size: 0.9rem;
        text-transform: uppercase;
        font-weight: bold;
    }
    .service-icons{
        display: flex;
        justify-content: center;
        align-items: center;

    }
    .servicediv h2{
        font-size: 0.9rem;
        margin: 20px 0 15px 0;
        font-weight: bold;
        line-height: 1.1;
        word-spacing: 4px;
    }
    .progress{
        height: 0.6rem!important;
        margin-bottom: 25px!important;
        background: #606060;
    }
    i{
        color: #2fccd0; 
    }
    #icon
    {
        max-width: 200px;
        margin: 5% auto;
    }
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
        .modal-backdrop{
          z-index:-1;
        }
    /**{ margin:0; padding: 0; box-sizing:border-box; }*/
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
/*Four columns features*/


/*.col-md-3.feature{
  background-color: #F3E8D6;
}*/
.container1{
  width: 100%;
  margin-top: 1%;
  font-family: sans-serif;
  letter-spacing: 1px;
}
/*.container1 h2
{
  background: #76CF5A ;
  color: #fff;
  width: 200px;
  font-size: 24px;
  padding: 5px;
  height: 40px;
}
.container1 h2::after
{
  content: '';
  border-top: 40px solid #76CF5A ;
  border-right: 40px solid transparent;
  position: relative;
  left: 93.2px;
  top: 35px;
}*/
.equal-height-columns{
  display: -webkit-box;
  display: -webkit-flex;
  display: -ms-flexbox;
  display: flex;
  flex-wrap: wrap;
}
.columnicon{
  color: indigo;
}
/*.equal-column-content{
  height:100%;
}*/
/*.col-md-3{
  border: 1px solid #eee;
}*/
@media(max-width: 575px){


}
  .line:hover {
      color: #2481f2;
    }
  hr.hr1{
      border: 1px light green;
    }

/*project glimpses*/
.gallery{
  margin: 10px 50px;
}
.gallery img{
  width: 230px;
  padding: 5px;
  filter: grayscale(100%);
  transition: 1s;
}
.gallery img:hover{
  filter: grayscale(0);
  transform: scale(1.1);
}
#reg-cross:hover{
            cursor: pointer;
        }
        *{ margin:0; padding: 0; box-sizing:border-box; }

/**Star Rating */

.container2{
  position: relative;
  width: 370px;
  background: #A1DFF2 ;
  padding: 1px 5px;
  border: 1px solid #444;
  border-radius: 5px;
  display: flex;
  align-items: center;
  justify-content: center;
  flex-direction: column; 
}
.container2 .post{
  display: none;
}
.container2 .text1{
  font-size: 25px;
  color: #666;
  font-weight: 500;
}
.container2 .edit{
  position: absolute;
  right: 10px;
  top: 5px;
  font-size: 16px;
  color: #666;
  font-weight: 500;
  cursor: pointer;
}
.container2 .edit:hover{
  text-decoration: underline;
}
.container2 .star-widget input{
  display: none;
}
.star-widget label{
  font-size: 40px;
  color: #444;
  padding: 5px;
  float: right;
  transition: all 0.2s ease;
}
input:not(:checked) ~ label:hover,
input:not(:checked) ~ label:hover ~ label{
  color: #fd4;
}
input:checked ~ label{
  color: #fd4;
}
input#rate-5:checked ~ label{
  color: #fe7;
  text-shadow: 0 0 20px #952;
}
#rate-1:checked ~ form header:before{
  content: "Looks very poor 😢";
}
#rate-2:checked ~ form header:before{
  content: "Not so good enough 😒";
}
#rate-3:checked ~ form header:before{
  content: "This is good 😄";
}
#rate-4:checked ~ form header:before{
  content: "This is the best 😎";
}
#rate-5:checked ~ form header:before{
  content: "This is awesome 😍";
}
.container2 form{
  display: none;
}
input:checked ~ form{
  display: block;
}
form header{
  width: 100%;
  font-size: 25px;
  color: #fe7;
  font-weight: 500;
  margin: 5px 0 20px 0;
  text-align: center;
  transition: all 0.2s ease;
}
form .textarea{
  height: 100px;
  width: 100%;
  overflow: hidden;
}
form .textarea textarea{
  height: 100%;
  width: 100%;
  outline: none;
  color: #eee;
  border: 1px solid #333;
  background: #222;
  padding: 10px;
  font-size: 17px;
  resize: none;
}
.textarea textarea:focus{
  border-color: #444;
}
form .btn{
  height: 45px;
  width: 100%;
  margin: 15px 0;
}
form .btn button{
  height: 100%;
  width: 100%;
  border: 1px solid #444;
  outline: none;
  background: #222;
  color: #999;
  font-size: 17px;
  font-weight: 500;
  text-transform: uppercase;
  cursor: pointer;
  transition: all 0.3s ease;
}
form .btn button:hover{
  background: #1b1b1b;
}

</style>
</head>
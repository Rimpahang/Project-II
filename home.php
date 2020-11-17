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
  <title>Khwopa Project Archive</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="fontawesome-free-5.12.0-web/css/all.css"> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <script src="bootstrap/js/jquery.min.js"></script>
  <script src="bootstrap/js/bootstrap.min.js"></script>
  <script src="ckeditor5-build-classic/ckeditor.js"></script>
  <script src="https://cdn.ckeditor.com/ckeditor5/16.0.0/classic/ckeditor.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.9.2/parsley.min.js"></script>
<script type="text/javascript">
$('#Login-Form').parsley();
$('#Signin-Form').parsley();
$('#Forgot-Password-Form').parsley();
</script>
  <style>
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
    hr.hr1{
      border: 1px light green;
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
      color: #fff;
    }
    .fas:hover{
      color: yellow;
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

<body data-spy="scroll" data-target="#navbarResponsive">
    <!--  Project Title  -->
  <!-- Navigation bar-->
  <nav class="navbar navbar-expand-md bg-light navbar-light sticky-top mt-1">
<!-- <button  type="button" data-toggle="collapse" data-target="#navbarResponsive">
      <span class="navbar-toggler-icon"></span> 
    </button> -->
    <div class="container-fluid">
      <!-- <a class="navbar-brand" href="#" data-target="#model" data-toggle="modal">Login</a> --><!-- <img src="images/khwopa.png"> --> 
      <div id="login-signup-modal" class="modal fade" tabindex="-1" role="dialog">
   <div class="modal-dialog" role="document">

    
     <!-- login modal content -->
        <div class="modal-content" id="login-modal-content">
        
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title"><span class="glyphicon glyphicon-lock"></span> Login Now!</h4>
          </div>
          <div class="modal-body">
          <form method="post" id="Login-Form" role="form" >
            <div class="form-group">
                <div class="input-group">
                <div class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></div>
                <input name="username"  class="form-control input-lg" placeholder="Enter Username" required data-parsley-type="" >
                </div>                      
            </div>
            <div class="form-group">
                <div class="input-group">
                <div class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></div>
                <input name="password" id="login-password" type="password" class="form-control input-lg" placeholder="Enter Password" required data-parsley-length="[6, 10]" data-parsley-trigger="keyup">
                 </div>                      
            </div>
            <div class="checkbox">
              <label><input type="checkbox" name="remember_me" <?php if(isset($_COOKIE["member_login"])) { ?> checked <?php } ?> />Remember me</label>
            </div>
              <button type="submit" name="sub" class="btn btn-success btn-block btn-lg">LOGIN</button>
          </form>
        </div>
        
        <div class="modal-footer">
          <p>
          <a id="FPModal" href="javascript:void(0)" data-target="#forgot-password-modal-content">Forgot Password?</a> | 
          <a id="signupModal" href="javascript:void(0)" data-toggle="modal" data-target="#signup-modal-content">Register Here!</a>
          </p>
        </div>
        
       </div>
        <!-- login modal content -->
        
        <!-- signup modal content -->
        <div class="modal-content" id="signup-modal-content">
        
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title"><span class="glyphicon glyphicon-lock"></span> Signup Now!</h4>
        </div>
                
        <div class="modal-body">
          <form method="post" id="Signin-Form" role="form">
            <div class="form-group">
                <div class="input-group">
                <div class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></div>
                <input name="email" id="email2" type="email" class="form-control input-lg" placeholder="Enter Email" required data-parsley-type="email">
                </div>                     
            </div>
            <div class="form-group">
                <div class="input-group">
                <div class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></div>
                <input name="password" id="passwd" type="password" class="form-control input-lg" placeholder="Enter Password" required data-parsley-length="[6, 10]" data-parsley-trigger="keyup">
                </div>                      
            </div>
            <div class="form-group">
                <div class="input-group">
                <div class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></div>
                <input name="password" id="confirm-passwd" type="password" class="form-control input-lg" placeholder="Retype Password" required data-parsley-equalto="#passwd" data-parsley-trigger="keyup">
                </div>                      
            </div>
            <button type="submit" class="btn btn-success btn-block btn-lg">CREATE ACCOUNT!</button>
          </form>
        </div>
        <div class="modal-footer">
          <p>Already a Member ? <a id="loginModal" href="javascript:void(0)">Login Here!</a></p>
        </div>
       </div>
       <!-- signup modal content -->
        
       <!-- forgot password content -->
       <div class="modal-content" id="forgot-password-modal-content">
        
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title"><span class="glyphicon glyphicon-lock"></span> Recover Password!</h4>
        </div>




       
        
       </div>        
       <!-- forgot password content -->
  
  </div>
</div>
  
         <!-- Navbar toggler-->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
               <img src="images/logo/logo.png" style="height: 80px;width: 80px; margin-left: 80px">
            <!--  Navbar links  -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link " href="#">Home</a>
                </li>
                
                <li class="nav-item dropdown">
                    <a class="nav-link text-success dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Categories</a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="categories.html">Management System</a>
                        <a class="dropdown-item" href="categories.html">Commerce</a>
                        <a class="dropdown-item" href="categories.html">Robotics</a>
                        <a class="dropdown-item" href="categories.html">Games</a>
                        <a class="dropdown-item" href="categories.html">ML and AI</a>
                        <a class="dropdown-item" href="categories.html">Others</a>
                     </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-success" href="addp.html">Add Projects</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-success" href="#">Top Projects</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-success" href="#">Project Titles</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-success" href="notice.html">Notice</a>
                </li> </ul>
              
            <?php if(isset($_SESSION['username']))
      {     ?><?php echo "hi"; ?>
            <div class="btn-group">
  <button class="btn btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">     <?php   echo  strtoupper($_SESSION['username']);} ?>  </button> 
    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
    <a class="dropdown-item" href="#">Profile</a>
    <a class="dropdown-item" href="#">Requests</a>
    <a class="dropdown-item" href="backEnd/logout.php">Logout</a>
  </div>
</div>  
<?php if(!isset($_SESSION['username']))
      {     ?>
<ul class="navbar-nav ml-auto"> <li class="nav-item">
                <a  class="nav-link text-success" href="" data-toggle="modal" data-target="#login-signup-modal">Login</a></li></ul><?php }?>

        </div>
  </nav>  

        <!-- Registration Request -->
      <div class="container-fluid fixed-bottom reg">
        <div class="container-fluid fixed-bottom reg jumbotron d-md-flex justify-content-center align-items-center position-relative bg-info">
          <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 col-xl-10">
            <p class="para">Want to become member? Click the button and be our friend rather than guest.</p>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2 col-xl-2 d-inline-block">
                        <a href="#"><button type="button" class="btn btn-outline-success btn-light">Register</button></a>
                    </div>
                    <div class="fa fa-times position-absolute" id="reg-cross" style="color: black; right: 20px; top: 3px;">
                    </div>
                </div>
            </div>
            <div class="row"  style="background-color: #666666"><div class="col-8">
  <img src="images/image2.png" style="height: 100%; width: 90%;">
              </div>
            <div class="col-4" style="color: white" >
              <h1 style="margin-top: 5px;color: black">Welcome to Khwopa Project Archive</h1>
              <p style="font-size: 16px; text-align: justify;margin-right: 10px; margin-top: 25px;">Are you starting to do a project for the first time? Do you need help on how to start? You have come to right place. Khwopa Project Archive is where you can find many project done by students of Khwopa Engineering College. It is an archive of all kinds of project you can view and get ideas from and get your own project started. This website is the platform to showcase project samples for you to get ideas from and develop your own project.<p><button type="button" class="btn btn-info" >Lets get started!</button></p></p>
            </div>
  </div>
        <!---Welcome Section--->
       
        <div class="container1 text-center">
            <h2>How good Project is made?</h2><br>
            <div class="row">
              <div class="col-sm-3">
                <div class="zoom">
                <img src="images/design.png" class="rounded-circle" id="icon" style="height: 160px;" >
                <h4>Design</h4>
              </div>
              </div>
              <div class="col-sm-3">
                <div class="zoom">
                <img src="images/develop.jpg" class="rounded-circle" id="icon" style="height: 160px;">
                <h4>Develop</h4>
              </div>
              </div>
              <div class="col-sm-3">
                  <div class="zoom">
                <img src="images/analyze.jpg" class="rounded-circle" id="icon" style="height: 160px;">
                <h4>Analyze</h4>
                </div>
              </div>
                <div class="col-sm-3">
                  <div class="zoom">
                  <img src="images/evaluate.png" class="rounded-circle" id="icon" style="height: 160px;">
                  <h4>Evaluate</h4>
                </div>
                </div>
              </div>
            </div>
         
            <hr class="hr1">
          
        <!--Three column section-->
        <div class="container padding">
          <div class="row padding">
            <div class="col-xs-4 col-sm-4 col-md-4">
              <h3 class="text-info">To start a project</h3>
              <p> The first step to start a project is to choose a topic of your interest. So, start by exploring some of the potential project titles.<br><a class="btn btn-primary btn-md" href="#" role="button">EXPLORE »</a></p>
            </div>
            <div class="col-xs-4 col-sm-4 col-md-4">
              <h3 class="text-info">Explore available projects</h3>
              <p> After looking at some project titles, lets view some projects of your likings.<br><br><a class="btn btn-primary btn-md" href="#" role="button">EXPLORE »</a></p>
            </div>
            <div class="col-xs-4 col-sm-4 col-md-4">
              <h3 class="text-info">Guidelines</h3>
              <p> The following link provides the files containg college provided guidelines. <br> <br><a class="btn btn-primary btn-md" href="#" role="button">DOWNLOAD</a></p>
            </div>
            
          </div>
          <hr class="my-4">
        </div>
       
        
                <!---Accordion-->
                <div class="container">
 <h2 style="text-align: center;">Be KPA's Member For:</h2>
  <p>As you <strong>register in KPA</strong> and <strong>become member</strong> you come across with various facilities which would enrich your surfing experience on KPA.</p>
  <div id="accordion">
    <div class="card">
      <div class="card-header">
        <a class="collapsed card-link" data-toggle="collapse" href="#collapseOne" >
          <p class="text-success">Project Discussion</p>
        </a>
      </div>
      <div id="collapseOne" class="collapse show" data-parent="#accordion">
        <div class="card-body">
          This website is a platform where members of a project group can find various range of projects to choose from or to use as a reference. Since this site was made just to overcome the difficulties faced by the students conducting the project for the first time, it should be easy to begin a project discussing available projects as a member of KPA. You get access by requesting samples of project as well and discuss it among ur group.
        </div>
      </div>
    </div>
    <div class="card">
      <div class="card-header">
        <a class="collapsed card-link" data-toggle="collapse" href="#collapseTwo">
        <p class="text-success">Project Supervision</p>
      </a>
      </div>
      <div id="collapseTwo" class="collapse" data-parent="#accordion">
        <div class="card-body">
          Since this site is accessible to both the teachers and students, both party can communicate making KPA a medium. This will allow smooth transitioning of the project throughout its whole phases.
        </div>
      </div>
    </div>
    <div class="card">
      <div class="card-header">
        <a class="collapsed card-link" data-toggle="collapse" href="#collapseThree">
         <p class="text-success"> Uploading/Downloading Files</p>
     </a>
      </div>
      <div id="collapseThree" class="collapse" data-parent="#accordion">
        <div class="card-body">
          All the members of KPA can download the sample project if their request for that project gets accepted. They can also upload their projects which will serve as a reference to the future visitors as well.
        </div>
      </div>
    </div>
  </div>
</div><br><br>

<!-- Comment using Ckeditor5 -->
    <form action="/receive_feedback.php">
      <center><label for="editor">
        <h4 class="font-weight-bolder" style="text-align: center;">Leave Feedback</h4>
        </label></center><br>
        <div class="form-group">
            <div class="justify-content-center d-flex col-sm-12">
                <div class="col-md-8" style="min-height: 200px;">
                    <textarea id="editor" placeholder="Please leave your feedback here!">
                    </textarea>
                    <div class="text-right mt-2">
                        <button type="submit" class="btn btn-primary sub">Submit</button>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </form>

<!--- Footer-->
<footer class="container-fluid text-center" style="background-color:  #04091e">
  <div class="row">
    <div class="col-sm-3">
      <h3>Meet the Team</h3>
      <h5>Our address and contact info here</h45>
    </div>
    <div class="col-sm-3">
      <h3>Contact Us</h3>
      
      <br>
      <h4>Our address and contact info here</h4>
    </div>
    <div class="col-sm-3">
      <h3>Connect</h3>
      <a href="#" class="fab fa-facebook-square" title="facebook" style="font-size: 30px"></a>
      <a href="#" class="fab fa-twitter-square" title="twitter" style="font-size: 30px"></a>
      <a href="#" class="fab fa-google" title="google" style="font-size: 30px"></a>
      <!-- <a href="#" class="fab fa-youtube-square" title="youtube" style="font-size: 30px; background: grey; "></a> -->
    </div>
    <!---KPA info at footer--->
    <div class="col-sm-3">
      <img src="images/kpa.jpg" class="icon" alt="KPA"><br><br>
      <a href="#" class="fas fa-home" title="Home" style="font-size: 17px;margin-right: 10px;"></a>||
      <a href="#" class="fas fa-id-card-alt" title="Contact" style="font-size: 17px;margin-left: 10px;margin-right: 10px;"></a>||
      <a href="#" class="fas fa-comment-dots" title="Feedback" style="font-size: 17px;margin-left: 10px;margin-right: 10px;"></a>||
        <a href="#" class="fas fa-question" title="FAQs" style="font-size: 17px;margin-left: 10px;"></a>
    </div>
  </div>

</footer>
  <div class="col-xs-12" style="background: #04091e; height: 22px;">
    <h5 style="text-align: center; color: white; font-size: 15px;"><i class="fa fa-copyright" style="font-size:16px;margin-top: 3px;">  2020 KPA</i></h5>
  </div>

</body>
</html>

<!--Query for ckeditor-->
<script>
    ClassicEditor
        .create( document.querySelector( '#editor' ) )
        .catch( error => {
            console.error( error );
        } );</script>
<script>
    //jquery for registration request fadeout
    $(document).ready(function () {
        $("#reg-cross").click(function () {
        $(".reg").fadeOut();
        });
    });
  </script>
  <script>
    //parsely validation
    
$(document).ready(function(){


    $('#signupModal').click(function(){
     $('#login-modal-content').fadeOut('fast', function(){
        $('#signup-modal-content').fadeIn('fast');
     });
    });

    $('#loginModal').click(function(){
     $('#signup-modal-content').fadeOut('fast', function(){
        $('#login-modal-content').fadeIn('fast');
     });
    });

    $('#FPModal').click(function(){
     $('#login-modal-content').fadeOut('fast', function(){
        $('#forgot-password-modal-content').fadeIn('fast');
        });
    });

    $('#loginModal1').click(function(){
     $('#forgot-password-modal-content').fadeOut('fast', function(){
        $('#login-modal-content').fadeIn('fast');
     });
    });


    $('#Login-Form').parsley();
    $('#Signin-Form').parsley();
    $('#Forgot-Password-Form').parsley();
});

</script>

<script>
// live search using JSON and JQuery AJAX

$(document).ready(function(){
    $.ajaxSetup({ cache: false })
    $('#navBarSearch').keyup(function(){
        $('#sResult').html('');
        var sText = $('#navBarSearch').val();
        if (sText != ''){
            var expression = new RegExp(sText, "i");
            $.getJSON('search_json.json', function(data) {
                $.each(data, function(key, value){
                    if (value.project_title.search(expression) != -1 || value.semester.search(expression) != -1) {
                        $('#sResult').append('<li class="list-group-item link-class" height="50" width="50">' + value.project_title + ' | <span class="text-muted">' + value.semester + '</span></li>');
                    }
                });
            });
        }
    });
});
  
</script>
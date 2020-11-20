<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


// require 'phpmailer/src/Exception.php';
// require 'phpmailer/src/PHPMailer.php';
// require 'phpmailer/src/SMTP.php';
if (isset($_POST['sub'])) {
    $ntopic = $_POST['notice_topic'];
    $ndesc = $_POST['notice_description'];

require_once('includes/DBconnect.php');
$get_user_sql = "SELECT * FROM `kpa_user` WHERE `status` = '1'";
$result = mysqli_query($conn, $get_user_sql);
if (mysqli_num_rows($result) > 0) {

        $notice_save_sql = "INSERT INTO `kpa_notice` (`notice_topic`, `notice_text`) VALUES ('$ntopic', '$ndesc')";

        if (mysqli_query($conn, $notice_save_sql)) {

            while ($user_data = mysqli_fetch_assoc($result)) {

// Load Composer's autoloader
                require 'phpmailer/vendor/autoload.php';

// Instantiation and passing `true` enables exceptions
                $mail = new PHPMailer(true);

                try {
                    //Server settings
                    $mail->SMTPDebug =  SMTP::DEBUG_SERVER;                       // Enable verbose debug output
                    $mail->isSMTP();                                            // Send using SMTP
                    $mail->Host = 'smtp.gmail.com';                    // Set the SMTP server to send through
                    $mail->SMTPAuth = true;                                   // Enable SMTP authentication
                    $mail->Username = 'valorant740323@gmail.com';                     // SMTP username
                    $mail->Password = 'abhiroka';                               // SMTP password
                    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
                    $mail->Port = 587;                                    // TCP port to connect to

                    //Recipients
                    $mail->setFrom('khwopaprojectarchive@gmail.com', 'Khwopa Project Archive');
                    $mail->addAddress($user_data['email'], 'User');     // Add a recipient
                    // $mail->addAddress('ellen@example.com');               // Name is optional
                    // $mail->addReplyTo('info@example.com', 'Information');
                    // $mail->addCC('cc@example.com');
                    // $mail->addBCC('bcc@example.com');

                    // Attachments
                    // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
                    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

                    // Content
                    $mail->isHTML(true);                                  // Set email format to HTML
                    $mail->Subject = $ntopic;
                    $mail->Body = $ndesc;
                    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

                    $mail->send();
                    echo 'Message has been sent';

                    header("location: ../notice.php");
                } catch (Exception $e) {
                    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                }
            }
        } else
            die("Error saving notice!");
}else
    echo("No users have registered to us!");
}
?>

<?php include_once('includes/header.php');?>
<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="" data-active-color="success">
      <div class="logo">
        <a href="#" class="simple-text logo-mini">
          <div class="logo-image-small">
            <img src="img/default-avatar.png">
          </div>
        </a>
       <a href="dashboard.php" class="simple-text logo-normal">
<?=($_SESSION['username']);?>        </a>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="active">
            <a href="dashboard.php">
              <i class="nc-icon nc-bank"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <li>
            <a href="users.php">
                    <i class="fa fa-users"></i>                  
              <p>Users</p>
            </a>
          </li>
          <li class="">
            <a href="addproject.php">
              <i class="nc-icon nc-single-copy-04"></i>
              <p>Projects</p>
            </a>
          </li>
          <!-- <li>
            <a href="notifications.php">
              <i class="nc-icon nc-bell-55"></i>
              <p>Notifications</p>
            </a>
          </li> -->
          <li>
            <a href="user.php">
              <i class="nc-icon nc-single-02"></i>
              <p>User Profile</p>
            </a>
          </li>
          <li class="">
            <a href="upload.php">
              <i class="nc-icon nc-caps-small"></i>
              <p>Upload Files</p>
            </a>
          </li>
          <li class="">
            <a href="../home.php">
              <i class="nc-icon nc-caps-small"></i>
              <p>Back to Homepage</p>
            </a>
          </li>
        </ul>
      </div>
    </div>
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-absolute fixed-top navbar-transparent">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="navbar-toggle">
              <button type="button" class="navbar-toggler">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </button>
            </div>
            <a class="navbar-brand" href="#pablo">Dashboard</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navigation">
           <ul class="navbar-nav">
              <!-- <li class="nav-item">
                <a class="nav-link btn-magnify" href="#pablo">
                  <i class="nc-icon nc-layout-11"></i>
                  <p>
                    <span class="d-lg-none d-md-block">Stats</span>
                  </p>
                </a>
              </li>
              <li class="nav-item btn-rotate dropdown">
                <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="nc-icon nc-bell-55"></i>
                  <p>
                    <span class="d-lg-none d-md-block">Some Actions</span>
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="#">Action</a>
                  <a class="dropdown-item" href="#">Another action</a>
                  <a class="dropdown-item" href="#">Something else here</a>
                </div>
            </li> -->
              <li class="nav-item">
                <a class="nav-link btn-rotate" href="logout.php">
                    <a href="logout.php"><i class="fa fa-sign-out" alt='logout'></i></a>
                  <p>
                      <span class="d-lg-none d-md-block">Logout</span>
                  </p>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->
     
      <div class="content">
       <div class="container-fluid col-md-5 bg-success">
        <form method="POST" name="precovery" action="">
            <div class="form-group">
                <label for="notice_topic">Notice Topic:</label>
                <input type="text" name="notice_topic" required="required">
            </div>
            <div class="form-group">
                <label for="notice_content">Notice Description:</label>
                <textarea type="text" name="notice_description" rows="10" cols="60" required="required" style="resize: none;"></textarea>
            </div>
            <input type="submit" name="sub" value="Publish Notice">
        </form>
    </div>
       
      </div>
      <?php include_once('includes/footer.php');?>
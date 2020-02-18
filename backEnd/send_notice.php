<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
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

<!DOCTYPE html>
<html>
<head>
    <title>New Notice - Khwopa Project Archive</title>
    <?php include('includes/head.php'); ?>
</head>
<body>
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

</body>
</html>
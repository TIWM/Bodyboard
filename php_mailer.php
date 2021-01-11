<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use phpmailer\phpmailer\PHPMailer;
use phpmailer\phpmailer\SMTP;
use phpmailer\phpmailer\Exception;

require 'phpmailer\phpmailer\src\PHPMailer.php';
require 'phpmailer\phpmailer\src\SMTP.php';
require 'phpmailer\phpmailer\src\Exception.php';

// Load Composer's autoloader
require 'vendor/autoload.php';

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'bodyboard.ismai@gmail.com';                     // SMTP username
    $mail->Password   = 'Admin123=';                               // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('bodyboard.ismai@gmail.com');
    $mail->addAddress('bodyboard.ismai@gmail.com');     // Add a recipient
    $mail->addAddress('bodyboard.ismai@gmail.com');               // Name is optional

    // Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
   // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

	
    // Content
	$mail->isHTML(true);     
    $content= $_POST['textarea'];                             // Set email format to HTML
    $mail->Subject = 'mensagem';
    $mail->Body    = $content;
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent.";
}
?>
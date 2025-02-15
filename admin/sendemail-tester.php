<?php
// Include the PHPMailer class files
require '../lib/PHPMailer-master/src/PHPMailer.php';
require '../lib/PHPMailer-master/src/SMTP.php';
require '../lib/PHPMailer-master/src/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Create an instance of PHPMailer
$mail = new PHPMailer(true);

try {
    // Server settings
    $mail->isSMTP();
    $mail->Host = 'smtp.mailtrap.io'; // Your SMTP server
    $mail->SMTPAuth = true;
    $mail->Username = 'your_smtp_username'; // Your SMTP username
    $mail->Password = 'your_smtp_password'; // Your SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    // Recipients
    $mail->setFrom('sender@example.com', 'Mailer');
    $mail->addAddress('recipient@example.com', 'Joe User');

    // Content
    $mail->isHTML(true);
    $mail->Subject = 'Test Email';
    $mail->Body    = 'This is a <b>test</b> email sent via PHPMailer!';
    $mail->AltBody = 'This is a plain-text message body for non-HTML email clients';

    // Send the email
    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>

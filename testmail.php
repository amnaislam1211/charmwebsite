<?php
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';
require 'phpmailer/src/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer(true);

try {
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'amnaislam1211@gmail.com';  // your Gmail
    $mail->Password = 'YOUR_APP_PASSWORD';        // Gmail App Password
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;

    $mail->setFrom('amnaislam1211@gmail.com', 'Pixiwish Test');
    $mail->addAddress('amnaislam1211@gmail.com', 'Your Name');

    $mail->isHTML(true);
    $mail->Subject = 'Test Email';
    $mail->Body    = 'This is a test email using PHPMailer SMTP!';

    $mail->send();
    echo "Mail sent!";
} catch (Exception $e) {
    echo "Mail FAILED: {$mail->ErrorInfo}";
}
?>

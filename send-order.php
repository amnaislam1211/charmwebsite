<?php
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';
require 'phpmailer/src/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $recipient = $_POST['recipient'];
    $number = $_POST['number'];
    $address = $_POST['address'];
    $messageText = $_POST['message'] ?? '';
    $template = $_POST['template'];
    $email = $_POST['email'];

    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'amnaislam1211@gmail.com';   // your Gmail
        $mail->Password = 'hinataislam/1';         // Gmail App Password
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        $mail->setFrom($email, $recipient);
        $mail->addAddress('amnaislam1211@gmail.com', 'Pixiwish Orders');

        if(!empty($_FILES['photo']['tmp_name'])) {
            $mail->addAttachment($_FILES['photo']['tmp_name'], $_FILES['photo']['name']);
        }

        $mail->isHTML(false);
        $mail->Subject = 'New Charm Order';
        $mail->Body = "
Recipient: $recipient
Contact Number: $number
Email: $email
Address: $address
Message: $messageText
Style: $template
";

        $mail->send();
        echo "<p style='color:green; font-weight:bold;'>Order sent successfully! 🎀</p>";

    } catch (Exception $e) {
        echo "<p style='color:red; font-weight:bold;'>Error sending order: {$mail->ErrorInfo}</p>";
    }

} else {
    echo "Invalid request.";
}
?>

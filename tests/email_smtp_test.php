<?php
require '../vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer(true);

try {
    // Configure PHPMailer to use SMTP
    $mail->isSMTP();
    $mail->Host = 'smtp.zoho.eu'; // Replace with your SMTP host
    $mail->SMTPAuth = true;
    $mail->Username = 'info@salabahter.eu'; // Replace with your SMTP username
    $mail->Password = 'R3Kk+x~me33tg5VT2={t'; // Replace with your SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587; // Replace with your SMTP port

    // Set the sender's email address and name
    $mail->setFrom('info@salabahter.eu', 'Šalabahter');
    // Add a recipient
    $mail->addAddress('toncoivanovic@gmail.com', 'Recipient'); // Replace with the recipient's email address

    // Set email format to HTML
    $mail->isHTML(true);
    $mail->Subject = 'Test Email';
    $mail->Body    = 'This is a test email.';

    // Send the email
    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
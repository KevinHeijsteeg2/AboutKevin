<?php
// Start with PHPMailer class
use PHPMailer\PHPMailer\PHPMailer;
require_once 'C:\Users\Kevin\vendor\autoload.php';
// create a new object
$mail = new PHPMailer();
// configure an SMTP
// Looking to send emails in production? Check out our Email API/SMTP product!
$phpmailer = new PHPMailer();

$phpmailer->isSMTP();
$phpmailer->Host = 'live.smtp.mailtrap.io';
$phpmailer->SMTPAuth = true;
$phpmailer->Port = 587;
$phpmailer->Username = 'api';
$phpmailer->Password = 'd15399d750612270cec8e8f150da07f0';

$mail->setFrom('confirmation@registered-domain', 'Your Hotel');
$mail->addAddress('receiver@gmail.com');
$mail->Subject = 'Thanks for choosing Our Hotel!';
// Set HTML 
$mail->isHTML(TRUE);
$mail->Body = '<html>Hi there, we are happy to <br>confirm your booking.</br> Please check the document in the attachment.</html>';
$mail->AltBody = 'Hi there, we are happy to confirm your booking. Please check the document in the attachment.';
// add attachment 
// just add the '/path/to/file.pdf'
$attachmentPath = './confirmations/yourbooking.pdf';
if (file_exists($attachmentPath)) {
    $mail->addAttachment($attachmentPath, 'yourbooking.pdf');
}

// send the message
if(!$mail->send()){
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
}
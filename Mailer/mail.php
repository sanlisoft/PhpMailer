<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'src/Exception.php';
require 'src/PHPMailer.php';
require 'src/SMTP.php';


$name=$_POST['name'];
$senderMail=$_POST['mail'];
$subject=$_POST['subject'];
$content=$_POST['content'];


$mail = new PHPMailer(true);

try {

    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'sanlisoftware@gmail.com';
    $mail->Password   = 'yazilimlondon#';
    $mail->SMTPSecure = 'tls';
    $mail->Port       = 587;
    $mail->CharSet    = 'UTF-8';
    //Recipients

    $mail->setFrom('sanlisoftware@gmail.com');
    $mail->addAddress('ensanli58@gmail.com');
    $mail->addReplyTo('en.sanli@hotmail.com');




    // Content
    $mail->isHTML(true);
    $mail->Subject = $subject;
    $mail->Body    = $content;


    $mail->send();
    echo json_encode('Mail Gönderildi...', true);
} catch (Exception $e) {
    echo json_encode("Mail Gönderilirken bir hata ile karşılaştık: {$mail->ErrorInfo}", true);
}

<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require __DIR__ . "/vendor/autoload.php";

$mail = new PHPMailer(true);

$name = $_POST["name"];
$email = $_POST["email"];
$subject = $_POST["subject"];
$message = $_POST["message"];

try {
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Username = 'medtun200@gmail.com';
    $mail->Password = 'tdbl donc blkx nsmq';
    $mail->Port = 587;

    $mail->setFrom('medtun200@gmail.com', $email); 
    $mail->addAddress('medtun200@gmail.com');  

    // Ajouter l'e-mail de l'expéditeur pour la réponse
    $mail->addReplyTo($email, $name);

    // Contenu de l'e-mail
    $mail->isHTML(true);
    $mail->Subject = $subject;
    $mail->Body = $message;
    
    $mail->send();
} catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}

?>

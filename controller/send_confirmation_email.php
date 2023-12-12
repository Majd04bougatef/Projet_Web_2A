<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../PHPMailer/src/Exception.php';
require '../PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
include_once '../view/events.php';

// Supposez que vous avez déjà récupéré les informations de l'utilisateur et de l'événement
$nomUtilisateur = "John Doe";
$emailUtilisateur = "meriambelghith3@gmail.com";
$titreEvenement = "Nom de l'événement";
$dateEvenement = "Date de l'événement";

try {
    // Création d'une instance de PHPMailer
    $mail = new PHPMailer(true);

    // Paramètres du serveur SMTP
    $mail->isSMTP();
    $mail->Host = 'smtp.example.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'votre@email.com';
    $mail->Password = 'votre_mot_de_passe';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    // Destinataire
    $mail->setFrom('votre@email.com', 'Votre Organisation');
    $mail->addAddress($emailUtilisateur, $nomUtilisateur);

    // Contenu de l'e-mail
    $mail->isHTML(false);
    $mail->Subject = "Confirmation d'inscription à l'événement : $titreEvenement";
    $mail->Body = "Bonjour $nomUtilisateur,\n\nMerci de vous être inscrit à l'événement \"$titreEvenement\" qui aura lieu le $dateEvenement.\nNous sommes ravis de vous compter parmi les participants !\n\nCordialement,\nVotre Organisation";

    // Envoi de l'e-mail
    $mail->send();
    echo 'E-mail envoyé avec succès !';
} catch (Exception $e) {
    echo "Erreur lors de l'envoi de l'e-mail : {$mail->ErrorInfo}";
}
?>

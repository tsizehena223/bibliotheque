<?php

use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

require_once 'mail/src/Exception.php';
require_once 'mail/src/PHPMailer.php';
require_once 'mail/src/SMTP.php';

function sendMail($receiver, $token)
{
    $mail = new PHPMailer();

    // Configuration
    // $mail->SMTPDebug = SMTP::DEBUG_SERVER;

    // Configuration SMTP
    $mail->isSMTP();
    $mail->Host = "smtp.gmail.com";
    $mail->SMTPAuth = true;
    $mail->Username = "tsizehena223@gmail.com";
    $mail->Password = "mldwauxwfzlludhw";
    $mail->Port = 465;
    $mail->SMTPSecure = "ssl";

    $mail->IsHTML(true);

    // Charset
    $mail->CharSet = "utf-8";

    // Destinataire
    $mail->addAddress($receiver);
    // $mail->addCC("copie");
    // $mail->addBCC("copieCahe")

    // Sender
    $mail->setFrom("tsizehena223@gmail.com");

    // Content
    $mail->Subject = "Confirmation d'inscription sur la page \"Bibliothèque\" de l'OMAPI";
    $mail->Body = 'Afin de valider votre inscription sur la page "Bibliothèque" de l\'OMAPI, veuillez cliquer <a href="http://localhost:30/heyhey/omapi/Biblio2.0/controllers/verification_email.php?email=' . $receiver . '&token=' . $token . '"><b>ici</></a>';

    // Sending
    if ($mail->send()) {
        $_SESSION['flash']['success'] = "Veuillez valider votre inscription en cliquant sur le lien envoyé à " . $receiver;
    } else {
        $_SESSION['flash']['error'] = "Erreur d'envoi de mail";
    }
}

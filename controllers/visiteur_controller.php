<?php

use App\Visiteur;

require '../vendor/autoload.php';

if (isset($_POST['visiter'])) {
    $nom = htmlspecialchars($_POST['name']);

    $visiteur = new Visiteur();
    $visiteur->set_name($nom);

    $visiteur->insert_visiteur("omapi_book", "visiteurs", $visiteur->get_name());

    if ($visiteur) {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        $_SESSION['flash']['success'] = "Votre visite a été bien marquée !";
        header('location: ../liste-livres');
    }
}

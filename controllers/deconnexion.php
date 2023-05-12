<?php

session_start();

if (isset($_SESSION['auth'])) {
    unset($_SESSION['auth']);
    $_SESSION['flash']['success'] = "Déconnexion avec succès!";
} else {
    $_SESSION['flash']['error'] = "Vous n'êtes pas connectés!";
}
header("Location: ../connexion");

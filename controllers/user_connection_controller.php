<?php

use App\Users;

require '../App/User.php';
// require '../vendor/autoload.php'; // MBOLA TSY MANDE

if (session_status() == PHP_SESSION_NONE) session_start();

if (isset($_POST['connexion'])) {
    if (isset($_POST['name_or_email']) && isset($_POST['psw'])) {
        $name_or_email = htmlspecialchars($_POST['name_or_email']);
        $psw = $_POST['psw'];

        $user = new Users();
        $is_name_or_email_exist = $user->getUserByNameOrEmail($name_or_email);

        if ($is_name_or_email_exist) {
            // TEST SI LE MOT DE PASSE EST VRAI
            $is_password_ok = password_verify($_POST['psw'], $is_name_or_email_exist['mot_de_passe']);
            if ($is_password_ok) {
                // MOT DE PASSE OK
                // Vérifions si le token et le valid sont ok
                $is_token_and_valid_ok = $user->verifyTokenAndValid($name_or_email); // By email
                $is_token_and_valid_ok_name = $user->verifyTokenAndValidByName($name_or_email); // By name
                if ($is_token_and_valid_ok || $is_token_and_valid_ok_name) {
                    // EVERYTHING IS OK
                    $_SESSION['auth'] = $name_or_email;
                    $_SESSION['flash']['success'] = "Vous êtes connectés!";
                    header('location: ../liste-livres');
                } else {
                    $_SESSION['flash']['error'] = "Adresse email pas encore validé!";
                    $_SESSION['flash']['info'] = "Veuillez vérifier votre boite email.";
                    header('location: ../connexion');
                    exit;
                }
            } else {
                $_SESSION['flash']['error'] = "Mot de passe incorrect! ";
                header('location: ../connexion');
                exit;
            }
        } else {
            $_SESSION['flash']['error'] = "Cet identifiant n'a aucun compte!";
            header('location: ../connexion');
            exit;
        }
    } else {
        $_SESSION['flash']['error'] = "Veuillez remplir tous les champs correctement!";
        header('location: ../connexion');
    }
} else {
    $_SESSION['flash']['error'] = "e404";
    header('location: ../e404');
}

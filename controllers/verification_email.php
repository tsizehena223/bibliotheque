<?php

use App\Users;

require '../App/User.php';

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (isset($_GET['email']) && isset($_GET['token'])) {
    $email = $_GET['email'];
    $token = $_GET['token'];

    if (!empty($email) && !empty($token)) {
        $user = new Users();
        $is_user_email_exist = $user->getUserByEmail($email);
        $is_user_token_exist = $user->getUserByToken($token);

        if ($is_user_email_exist && $is_user_token_exist) {
            // Màj de l'user
            $update_user_info = $user->updateUserInfo($email);

            $is_update_ok = $user->verifyTokenAndValid($email);

            if ($is_update_ok) {
                $_SESSION['flash']['success'] = "Adresse email bien confirmée!";
                header('location: ../connexion');
                exit;
            } else {
                $_SESSION['flash']['error'] = "Adresse email non confirmée!";
                header('location: ../connexion');
                exit;
            }
        } else {
            $_SESSION['flash']['error'] = "Adresse email ou token non valide!";
            header('location: ../inscription');
            exit;
        }
    }
} else {
    header('location: ../e404');
}

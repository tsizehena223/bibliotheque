<?php

use App\Users;

require '../App/User.php';

if (session_status() == PHP_SESSION_NONE) session_start();


if (isset($_POST['inscription'])) {
    if (empty($_POST['name']) || !preg_match('/[a-zA-Z0-9]+/', $_POST['name'])) {
        $_SESSION['flash']['error'] = "Nom non valide";
        header('location: ../inscription');
        exit;
    } elseif (empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $_SESSION['flash']['error'] = "Email non valide";
        header('location: ../inscription');
        exit;
    } elseif (empty($_POST['psw']) || empty($_POST['psw2'])) {
        $_SESSION['flash']['error'] = "Mot de passe non valide";
        header('location: ../inscription');
        exit;
    } elseif ($_POST['psw'] != $_POST['psw2']) {
        $_SESSION['flash']['error'] = "Les mots de passe ne se correspondent pas!";
        header('location: ../inscription');
        exit;
    } elseif (strlen($_POST['psw']) < 4) {
        $_SESSION['flash']['error'] = "Mot de passe trop court!";
        header('location: ../inscription');
        exit;
    } elseif (!preg_match('#^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W)#', $_POST['psw'])) {
        $_SESSION['flash']['error'] = "Mot de passe non sécurisé. <br> Veuillez entrer un mot de passe contenant au moins un chiffre, un caractère spécial, un majuscule et un minuscule";
        header('location: ../inscription');
        exit;
    } else {
        $user = new Users();

        // VERIFY IF THE NAME IS ALREADY TOKEN
        $is_user_name_exist = $user->getUserByName($_POST['name']);
        if ($is_user_name_exist) {
            $_SESSION['flash']['error'] = "Ce nom existe déjà";
            header('location: ../inscription');
            exit;
        }
        // VERIFY IF THE EMAIL ADRESS IS ALREADY TOKEN
        $is_user_email_exist = $user->getUserByEmail($_POST['email']);
        if ($is_user_email_exist) {
            $_SESSION['flash']['error'] = "Cette adresse appartient déjà à un compte";
            header('location: ../inscription');
            exit;
        }

        // GENERATE A TOKEN 
        require 'generateToken.php';
        $token = token_random_string(7);

        // THE DATA TO INSERT
        $name = htmlspecialchars($_POST['name']);
        $email = $_POST['email'];
        $psw = password_hash($_POST['psw'], PASSWORD_BCRYPT);

        // INSERTION TO THE DATABASE noty
        $user->insertUser($name, $email, $psw, $token);

        $_SESSION['flash']['success'] = "Utilisateur enregistré ave succès!";

        // ENVOIE D'UN MAIL DE CONFIRMATION
        require 'sendMail.php';
        sendMail($_POST['email'], $token);
        // sendMail($_POST['email'], $token);

        // REDIRECTION VERS LA PAGE LOGIN
        header('location: ../inscription');
    }
} else {
    header('location: ../inscription');
}

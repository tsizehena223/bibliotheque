<?php

// define('BIBLIO', dirname(__DIR__));
// define('DS', DIRECTORY_SEPARATOR);
// define('RACINE', dirname(dirname($_SERVER['SCRIPT_NAME'])));

$uri = $_SERVER['REQUEST_URI'];
// $path_trim = str_replace('/view/', '', $uri);
$path_trim = str_replace('/heyhey/omapi/Biblio2.0/', '', $uri);
$path = explode('?', $path_trim)[0];
$page = explode('/', $path)[0];


if (!$page) {
    $page = "accueil";
}

$fichier = $page . ".php";

include '../includes/header.php';

if (file_exists($fichier)) {
    include $fichier;
} else {
    include 'e404.php';
}

include '../includes/footer.php';

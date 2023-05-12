<?php

define('DS', DIRECTORY_SEPARATOR);
define('BASE_URL', dirname(dirname(dirname($_SERVER['SCRIPT_NAME']))));

// die(BASE_URL);

session_start();

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="<?= BASE_URL ?>/view/includes/css/css/bootstrap.min.css">
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="<?= BASE_URL ?>/view/includes/css/js/bootstrap.js">
    </script>
    <link rel="shortcut icon" href="includes/img/globe_omapi.png" type="image/x-icon">
    <title><?= isset($title) ? "OMAPI | " . $title : "OMAPI | Bibliothèque" ?></title>
</head>

<style>
    * {
        margin: 0;
        font-family: Arial, Helvetica, sans-serif;
    }

    .navibar {
        margin: 0;
        margin-bottom: 2em;
        padding: 1%;
        background: #00798C;
        position: relative;
        z-index: 100;
    }

    .navibar img {
        height: 3.5em;
    }

    .dropdown-item {
        background-color: #00798C;
        color: aliceblue;
    }

    .dropdown button {
        width: 12em;
    }
</style>

<body style="background-color: #d0d4d8">
    <div class="navibar">
        <nav class="navbar navbar-expand-lg navbar-dark">
            <div class="container-fluid m-lg-auto">
                <a href="accueil"><img src="includes/img/logo_omapi_blac_texte.png"></a>
                &nbsp; &nbsp;
                <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav ms-auto">
                        <ul class="navbar-nav form-group">
                            <div class="dropdown">
                                <a href="liste-livres"><button type="button" class="btn btn-outline-light">Liste des livres</button></a>
                            </div> &nbsp; &nbsp;

                            <div class="dropdown">
                                <a href="ajouter-un-livre"><button type="button" class="btn btn-outline-light">Ajouter un livre</button></a>
                            </div> &nbsp; &nbsp;

                            <div class="dropdown">
                                <a href="liste-visiteurs"><button type="button" class="btn btn-outline-light">Liste des visiteurs</button></a>
                            </div> &nbsp; &nbsp;

                            <div class="dropdown">
                                <?php if (!isset($_SESSION['auth'])) : ?>
                                    <a href="connexion"><button type="button" class="btn btn-warning">Se connecter</button></a>
                                <?php else : ?>
                                    <a href="controllers/deconnexion.php"><button type="button" class="btn btn-danger">Se déconnecter</button></a>
                                <?php endif; ?>
                            </div> &nbsp; &nbsp;

                        </ul>
                    </div>
                </div>

            </div>
        </nav>
    </div>
<?php

use App\Database;

require '../../vendor/autoload.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $articles = new Database();
    $article = $articles->get_article("omapi_book", "bibliotheque", $id);
    if (!$article) {
        include 'e404.php';
    } else {
?>

        <style>
            .accueil {
                width: 50vw;
                color: black;
                margin-right: 3rem;
            }

            .img img {
                width: 30vw;
            }

            .rowf {
                margin: 3rem;
                display: flex;
                padding: 3rem;
            }

            .titre {
                display: flex;
                align-items: center;
                justify-content: center;
            }
        </style>

        <div class="titre">
            <?php include '../includes/session_flash.php' ?> <br><br><br>
            <h1>Titre : <?= $article['titre'] ?></h1>
        </div>
        <div class="rowf">
            <div class="accueil">
                <table class="table table-bordered table-responsive">
                    <thead>
                        <tr>
                            <th class="table-active">
                                <center>Mot Clé</center>
                            </th>
                            <th class="table-active">
                                <center>Contenu</center>
                            </th>
                        </tr>
                    </thead>
                    <tr>
                        <td class="table table-light w-25 p-3">Numéro</td>
                        <td class="table table-light w-75 p-3"><?= $article['numero'] ?></td>
                    </tr>
                    <tr>
                        <td class="table table-light w-25 p-3">Titre</td>
                        <td class="table table-light w-75 p-3"><?= $article['titre'] ?></td>
                    </tr>
                    <tr>
                        <td class="table table-light w-25 p-3">Type d'ouvrage</td>
                        <td class="table table-light w-75 p-3"><?= $article['type_ouvrage'] ?></td>
                    </tr>
                    <tr>
                        <td class="table table-light w-25 p-3">Matière</td>
                        <td class="table table-light w-75 p-3"><?= $article['matiere'] ?></td>
                    </tr>
                    <tr>
                        <td class="table table-light w-25 p-3">Version</td>
                        <td class="table table-light w-75 p-3"><?= $article['version'] ?></td>
                    </tr>
                    <tr>
                        <td class="table table-light w-25 p-3">N° publication</td>
                        <td class="table table-light w-75 p-3"><?= $article['numero_publication'] ?></td>
                    </tr>
                    <tr>
                        <td class="table table-light w-25 p-3">Date de parution</td>
                        <td class="table table-light w-75 p-3"><?= $article['date_parution'] ?></td>
                    </tr>
                    <tr>
                        <td class="table table-light w-25 p-3">Auteur</td>
                        <td class="table table-light w-75 p-3"><?= $article['auteur'] ?></td>
                    </tr>
                    <tr>
                        <td class="table table-light w-25 p-3">Exemplaie</td>
                        <td class="table table-light w-75 p-3"><?= $article['exemplaire'] ?></td>
                    </tr>
                </table>
            </div>
            <div class="img">
                <img src="controllers/export_image.php?id=<?= $article['id'] ?>">
            </div>
        </div>
<?php }
}

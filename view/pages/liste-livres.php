<?php

use App\Database;

require '../../vendor/autoload.php';


// Barre recherche 

@$keywords = $_GET["keywords"]; // Mot clé à chercher
@$valider = $_GET["valider"];
$afficher = false;

if (isset($valider) && !empty(trim($keywords))) {
    $words = explode(" ", trim($keywords));

    for ($i = 0; $i < count($words); $i++) {
        $kw[$i] = "titre LIKE '%" . $words[$i] . "%'";
    }

    $bdd = new PDO("mysql:host=localhost; dbname=omapi_book", "root", "Tsizehena,223");
    $res = $bdd->prepare("SELECT * FROM bibliotheque WHERE " . implode(" OR ", $kw));
    $res->setFetchMode(PDO::FETCH_ASSOC);
    $res->execute();
    $tab = $res->fetchAll();
    if (!empty($keywords)) {
        $afficher = "oui";
    }
}

?>

<style>
    .resultats {
        display: block;
    }

    .nbr-res {
        color: #00798C;
        text-decoration: solid underline;
    }

    .lists {
        display: flex;
        align-items: center;
        text-align: left;
        justify-content: center;
    }

    .lists ol a {
        text-decoration: none;
        color: #00798C;
        font-size: large;
    }
</style>

<div class="container">
    <div class="row align-items-center">
        <div class="col-md-12 order-2 order-md-1 text-center text-md-left">
            <center>
                <br>
                <h2>Listes des livres</h2>
                <form action="" method="get">
                    <input type="text" name="keywords" value="<?= isset($keywords) ? $keywords : ''; ?>" placeholder="Titre" maxlength="40">
                    <input type="submit" value="Search" name="valider" class="btn btn-sm btn-warning">
                    <br> <br>
                </form>
            </center>
            <?php if (@$afficher == "oui") : ?>
                <div class="card p-3 resultats">
                    <div class="nbr-res">
                        <h4>
                            <?= "Il y a " . count($tab) . " livre" . (count($tab) > 1 ? "s"  : "") ?>
                        </h4>
                    </div>
                    <div class="lists">
                        <ol>
                            <?php for ($i = 0; $i < count($tab); $i++) : ?>
                                <li><a href="afficher-un-article?id=<?= $tab[$i]['id'] ?>"> <?= $tab[$i]["titre"] ?> </a></li>
                            <?php endfor ?>
                        </ol>
                    </div>
                </div> <br><br>
            <?php endif ?>
            <?php require '../includes/session_flash.php' ?>

            <?php
            $articles = new Database();
            if ($articles->get_articles("omapi_book", "bibliotheque") == null) : ?>
                <div class="alert alert-danger">
                    <h4>Il n'y a aucun livre pour le moment</h4>
                </div>
                <a href="ajouter-un-livre" class="btn btn-sm btn-info">Ajouter un livre ?</a> <br><br>
            <?php else : ?>
                <table class="table table-bordered" style="display: <?= ($afficher == "oui") ? 'none' : '' ?>">
                    <tr>
                        <th class="table-active">Titre</th>
                        <th class="table-active">Auteur</th>
                        <th class="table-active">Date</th>
                        <th class="table-active">Détails</th>
                    </tr>
                    <?php
                    foreach ($articles->get_articles("omapi_book", "bibliotheque") as $article) : ?>
                        <tr id="<?= $article['id'] ?>" style="font-size: large">
                            <td class="table-<?= ($article['id'] % 2 == 0) ? 'light' : 'secondary' ?>"><small><?= $article['titre'] ?></small></td>
                            <td class="table-<?= ($article['id'] % 2 == 0) ? 'light' : 'secondary' ?>"><small><?= $article['auteur'] ?></small></td>
                            <td class="table-<?= ($article['id'] % 2 == 0) ? 'light' : 'secondary' ?>"><small><?= $article['date_parution'] ?></small></td>
                            <td class="table-<?= ($article['id'] % 2 == 0) ? 'light' : 'secondary' ?>"><a class="btn btn-sm btn-outline-danger" href="afficher-un-article?id=<?= $article['id'] ?>">Voir plus ...</a></td>
                        </tr>
                    <?php endforeach; ?>
                </table>

            <?php endif ?>
        </div>
    </div>
</div>
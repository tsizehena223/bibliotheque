<?php

use App\Book;

require '../../vendor/autoload.php';
require '../../controllers/is_connected.php';
$session = Book::s_start();

?>

<style>
    body {
        background-color: #c8c8c8;
    }

    .insertion {
        margin-top: 2%;
        margin-left: 5em;
        margin-right: 5em;
    }

    .insertion form label {
        color: #00798C !important;
    }

    .label-file {
        cursor: pointer;
        color: #00798C;
        /* font-weight: bold; */
        border: 1px transparent grey;
    }

    .label-file:hover {
        background-color: #00798C;
        color: aliceblue;
    }

    label {
        font-weight: bold;
    }

    input:hover {
        background-color: #00798C;
        color: aliceblue;
    }
</style>

<div class="insertion">
    <center>
        <h2>Enregistrement des Ouvrages</h2>
        <p>Ce formulaire est utilisé pour enregistrer les livres</p>
        <?php require '../includes/session_flash.php' ?>
    </center>
    <div style="display: flex; align-items: center; justify-content: center">
        <form action="controllers/insertion_book.php" method="post" enctype="multipart/form-data" class="col-md-6">
            <label for="numero">Numéro : </label>
            <input type="number" id="numero" name="numero" class="form-control" required> <br>

            <label for="titre">Titre: </label>
            <input type="text" name="titre" id="titre" class="form-control" required> <br>

            <label for="type">Type d'Ouvrage: </label>
            <select name="type" id="type" class="form-control" required>
                <option value="Non spécifié" style="background-color: grey;">Séléctionner</option>
                <option value="Magazine_sur_la_PI">Magazine sur la PI</option>
                <option value="GOPI">GOPI</option>
                <option value="Rapport_d_activite">Rapport d'Activité</option>
                <option value="Documents">Documents</option>
                <option value="Traite">Traité</option>
                <option value="Bulletin_d_information">Bulletin d'Information</option>
                <option value="Revue">Revue</option>
                <option value="Gazette">Gazette</option>
                <option value="Magazine">Magazine</option>
                <option value="Guides">Guides</option>
            </select> <br>

            <label for="matiere">Matières : </label>
            <select name="matiere" id="matiere" class="form-control" required>
                <option value="Non spécifié" style="background-color: grey;">Séléctionner</option>
                <option value="Brevet_d_invention">Brevet d'Invention</option>
                <option value="Dessin_et_modele_industriel">Dessin et Modèle industriel</option>
                <option value="Marque_de_fabrique_ou_service">Marque de fabrique ou service</option>
                <option value="Droit_d_auteur">Droit d'auteur</option>
                <option value="Noms_commerciaux">Noms commerciaux</option>
                <option value="Economie">Economie</option>
                <option value="Propriete_intelectuell">Propriété Intelectuelle</option>
                <option value="Propriete_industriellle">Propriété Industrielle</option>
            </select> <br>

            <label for="version">Version : </label>
            <select name="version" id="version" class="form-control" required>
                <option value="Non spécifié" style="background-color: grey;">Séléctionner</option>
                <option value="Anglais">Anglais</option>
                <option value="Français">Français</option>
                <option value="Arabe">Arabe</option>
                <option value="AN/FR">AN/FR</option>
            </select> <br>

            <label for="num_pub">Numéro de publication : </label>
            <input type="number" name="num_pub" id="num_pub" class="form-control" required> <br>

            <label for="date_parution">Date de parution : </label>
            <input type="date" name="date_parution" id="date_parution" class="form-control" required> <br>

            <label for="auteur">Auteur du livre : </label>
            <input type="text" name="auteur" id="auteur" class="form-control" required> <br>

            <label for="exemplaire">Exemplaire : </label>
            <input type="text" name="exemplaire" id="exemplaire" value="Pas d'exemplaire" class="form-control" required> <br>

            <label for="photo" class="label">Ajouter ici l'image de couverture du Livre (scané) : </label>
            <div class="label-file form-control">
                <!-- <input type="hidden" name="MAX_FILE_SIZE" value="25000000" /> -->
                <input type="file" class="input-file" name="photo" id="photo" class="form-control" required> <br>
            </div>

            <center>
                <button type="submit" class="btn btn-primary" name="envoyer" style="margin: 5%;">Envoyer</button> &nbsp; &nbsp; &nbsp; &nbsp;
                <a href="ajouter-un-livre" class="btn btn-sm btn-danger">Effacer le formulaire</a>
            </center> <br> <br>
        </form>
    </div>
</div>
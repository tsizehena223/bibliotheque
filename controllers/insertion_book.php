<?php

// SI LA PERSONNE A CLIQUER LE BOUTTON ENVOYER

require '../vendor/autoload.php';

use App\Book;
use App\Database;

if (isset($_POST['envoyer'])) {
    $numero = $_POST['numero'];
    $titre = $_POST['titre'];
    $type = $_POST['type'];
    $matiere = $_POST['matiere'];
    $version = $_POST['version'];
    $num_pub = $_POST['num_pub'];
    $date_parution = $_POST['date_parution'];
    $auteur = $_POST['auteur'];
    $exemplaire = $_POST['exemplaire'];

    // BOOK 

    $book = new Book();

    $book->set_auteur($auteur);
    $book->set_date_parution($date_parution);
    $book->set_exemplaire($exemplaire);
    $book->set_matiere($matiere);
    $book->set_version($version);
    $book->set_numero($numero);
    $book->set_titre($titre);
    $book->set_type($type);
    $book->set_num_pub($num_pub);

    $insert = new Database();
    $insert->insert_article( // INSERTION BOOK
        "omapi_book",
        "bibliotheque",
        $book->get_titre(),
        $book->get_numero(),
        $book->get_type(),
        $book->get_matiere(),
        $book->get_version(),
        $book->get_num_pub(),
        $book->get_date_parution(),
        $book->get_auteur(),
        $book->get_exemplaire()
    );

    // INSERTION IMAGE

    // L'IMAGE
    $img_name = $_FILES['photo']['name'];
    $img_size = $_FILES['photo']['size'];
    $img_type = $_FILES['photo']['type'];
    $img_bin = file_get_contents($_FILES['photo']['tmp_name']);
    $livre_id = $insert->getIdByTitle("omapi_book", "bibliotheque", $book->get_titre())['id'];

    $insert->insert_image($img_name, $img_size, $img_type, $img_bin, $livre_id);

    session_start();

    if ($insert) {
        $_SESSION['flash']['success'] = "Envoyé avec succès";
    } else {
        $_SESSION['flash']['error'] = "Il y a une errreur";
    }
    header('location: ../ajouter-un-livre');
}

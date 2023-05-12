<?php

namespace App;

use \PDO;

class Database
{
    // private $pdo;
    // private $req;

    /**
     * @method : Permet de se connecter à la base de donées
     * @var db_name : Nom de la base de données
     */
    private function get_pdo($db_name)
    {
        $pdo = new PDO("mysql:hostname=localhost; dbname=" . $db_name . "", "root", "Tsizehena,223");
        return $pdo;
    }

    /**
     * @method Permet d'insérer informations tapées sur le formulaire dans la base de données
     */
    public function insert_article($db_name, $table, $titre, $numero, $type_ouvrage, $matiere, $version, $numero_pub, $date_parution, $auteur, $exemplaire)
    {
        $req = $this->get_pdo($db_name)->prepare("INSERT INTO " . $db_name . "." . $table . " (titre, numero, type_ouvrage, matiere, version, numero_publication, date_parution, auteur, exemplaire)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $req->execute([$titre, $numero, $type_ouvrage, $matiere, $version, $numero_pub, $date_parution, $auteur, $exemplaire]);
    }

    /**
     * @method : Permet de récupérer les articles dans une table
     * @var db_name : Nom de la base de données
     * @var table : Nom de la table dans laquelle on prend les valeurs
     */
    public function get_articles($db_name, $table)
    {
        $req = $this->get_pdo($db_name)->prepare("SELECT * FROM " . $db_name . "." . $table);
        $req->execute();
        $req->setFetchMode(PDO::FETCH_ASSOC);
        $liste_article = $req->fetchAll();
        $req->closeCursor();
        return $liste_article;
    }

    /**
     * @method Permet de récupérer une seule article
     * @var table : Nom de la table
     * @var dbname : Nom de la bd
     * @var id : Id de l'article à récupérer
     */
    public function get_article($db_name, $table, $id)
    {
        $req = $this->get_pdo($db_name)->prepare("SELECT * FROM " . $db_name . "." . $table . " WHERE id = ?");
        $req->execute([$id]);
        $req->setFetchMode(PDO::FETCH_ASSOC);
        $article = $req->fetch();
        return $article;
    }

    /**
     * @method : Permet d'insérer l'image
     * @param name-size-type-bin : description de l'image dans la base de données
     */
    public function insert_image($name, $size, $type, $bin, $livre_id)
    {
        $req = $this->get_pdo("omapi_book")->prepare("INSERT INTO omapi_book.livre_images (name, size, `type`, `bin`, livre_id) VALUES (?, ?, ?, ?, ?)");
        $req->execute([$name, $size, $type, $bin, $livre_id]);
    }

    public function getIdByTitle($db_name, $table, $title)
    {
        $req = $this->get_pdo($db_name)->prepare("SELECT * FROM " . $db_name . "." . $table . " WHERE titre = ? GROUP BY id DESC");
        $req->execute([$title]);
        $req->setFetchMode(PDO::FETCH_ASSOC);
        $article = $req->fetch();
        return $article;
    }
}

<?php

namespace App;

use PDO;

class Visiteur
{
    private $name;

    public function set_name($name)
    {
        $this->name = $name;
    }

    public function get_name()
    {
        return $this->name;
    }

    private function get_pdo($dbname)
    {
        $pdo = new PDO("mysql:host=localhost; dbname=" . $dbname . "", "root", "Tsizehena,223");
        return $pdo;
    }

    public function insert_visiteur($dbname, $table, $name)
    {
        $sql = "INSERT INTO " . $dbname . "." . $table . " (name, date_visite) VALUES (?, NOW())";
        $req = $this->get_pdo($dbname)->prepare($sql);
        $req->execute([$name]);
    }

    public function get_visiteurs($dbname)
    {
        $sql = "SELECT * FROM " . $dbname . ".visiteurs";
        $req = $this->get_pdo($dbname)->prepare($sql);
        $req->execute();
        $req->setFetchMode(PDO::FETCH_ASSOC);
        $visiteurs = $req->fetchAll();
        return $visiteurs;
    }
}

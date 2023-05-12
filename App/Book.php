<?php

namespace App;

class Book
{
    private $numero;
    private $titre;
    private $type;
    private $matiere;
    private $version;
    private $num_pub;
    private $date_parution;
    private $auteur;
    private $exemplaire;

    //SETTERS

    public function set_titre($titre)
    {
        $this->titre = $titre;
    }

    public function set_numero($numero)
    {
        $this->numero = $numero;
    }

    public function set_type($type)
    {
        $this->type = $type;
    }

    public function set_matiere($matiere)
    {
        $this->matiere = $matiere;
    }

    public function set_version($version)
    {
        $this->version = $version;
    }

    public function set_num_pub($num_pub)
    {
        $this->num_pub = $num_pub;
    }

    public function set_date_parution($date_parution)
    {
        $this->date_parution = $date_parution;
    }

    public function set_auteur($auteur)
    {
        $this->auteur = $auteur;
    }

    public function set_exemplaire($exemplaire)
    {
        $this->exemplaire = $exemplaire;
    }


    //GETTERS

    public function get_titre()
    {
        return $this->titre;
    }

    public function get_numero()
    {
        return $this->numero;
    }

    public function get_type()
    {
        return $this->type;
    }

    public function get_matiere()
    {
        return $this->matiere;
    }

    public function get_version()
    {
        return $this->version;
    }

    public function get_num_pub()
    {
        return $this->num_pub;
    }

    public function get_date_parution()
    {
        return $this->date_parution;
    }

    public function get_auteur()
    {
        return $this->auteur;
    }

    public function get_exemplaire()
    {
        return $this->exemplaire;
    }

    // session_start
    public static function s_start()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }
}

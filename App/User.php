<?php

namespace App;

use \PDO;

class Users
{
    private $name;
    private $psw;
    private $email;
    private $token;
    private $valid;

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setPsw($psw)
    {
        $this->psw = $psw;
    }

    public function getPsw()
    {
        return $this->psw;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setToken($token)
    {
        $this->token = $token;
    }

    public function getToken()
    {
        return $this->token;
    }

    public function setValid($valid)
    {
        $this->valid = $valid;
    }

    public function getValid()
    {
        return $this->valid;
    }

    /**
     * @method pdo : Permet de se connecter à la Base de Données
     */
    private function getPDO()
    {
        $pdo = new PDO("mysql:hostname=localhost; dbname=omapi_book; charset=utf8", "root", "Tsizehena,223");
        return $pdo;
    }

    public function getUserByName($name)
    {
        $req = $this->getPDO()->prepare("SELECT * FROM users WHERE name = ?");
        $req->execute([$name]);
        $req->setFetchMode(PDO::FETCH_ASSOC);
        $user = $req->fetch();
        return $user;
    }

    public function getUserByEmail($email)
    {
        $req = $this->getPDO()->prepare("SELECT * FROM users WHERE email = ?");
        $req->execute([$email]);
        $req->setFetchMode(PDO::FETCH_ASSOC);
        $user = $req->fetch();
        return $user;
    }

    public function getUserByNameOrEmail($name_or_email)
    {
        $req = $this->getPDO()->prepare("SELECT * FROM users WHERE email = ? OR name = ?");
        $req->execute([$name_or_email, $name_or_email]);
        $req->setFetchMode(PDO::FETCH_ASSOC);
        $user = $req->fetch();
        return $user;
    }

    public function getUserByToken($token)
    {
        $req = $this->getPDO()->prepare("SELECT * FROM users WHERE token = ?");
        $req->execute([$token]);
        $req->setFetchMode(PDO::FETCH_ASSOC);
        $user = $req->fetch();
        return $user;
    }

    public function verifyTokenAndValid($email)
    {
        $req = $this->getPDO()->prepare("SELECT * FROM users WHERE email = ? AND token = ? AND valid = ?");
        $req->execute([$email, "Valid", 1]);
        $req->setFetchMode(PDO::FETCH_ASSOC);
        $user = $req->fetch();
        return $user;
    }

    public function verifyTokenAndValidByName($name)
    {
        $req = $this->getPDO()->prepare("SELECT * FROM users WHERE name = ? AND token = ? AND valid = ?");
        $req->execute([$name, "Valid", 1]);
        $req->setFetchMode(PDO::FETCH_ASSOC);
        $user = $req->fetch();
        return $user;
    }

    public function updateUserInfo($email)
    {
        $req = $this->getPDO()->prepare("UPDATE users SET valid = ?, token = ? WHERE email = ?");
        $req->execute([1, "Valid", $email]);
    }

    public function insertUser($name, $email, $psw, $token)
    {
        $req = $this->getPDO()->prepare("INSERT INTO users (name, email, mot_de_passe, token) VALUES (?, ?, ?, ?)");
        $req->execute([$name, $email, $psw, $token]);
    }
}

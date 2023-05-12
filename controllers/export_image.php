<?php

$pdo = new PDO("mysql:host=localhost; dbname=omapi_book", "root", "Tsizehena,223");
$req = $pdo->prepare("SELECT * FROM livre_images WHERE livre_id = ? LIMIT 1");
$req->setFetchMode(PDO::FETCH_ASSOC);
$req->execute([$_GET['id']]);
$tab = $req->fetchAll();
echo $tab[0]["bin"];

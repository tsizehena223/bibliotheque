<?php

use App\Visiteur;

require '../../vendor/autoload.php';

?>

<div class="container">
    <div class="row align-items-center">
        <div class="col-md-12 order-2 order-md-1 text-center text-md-left">
            <center>
                <br>
                <h2>Listes des visiteurs</h2>
                <br>
            </center>
            <?php require '../includes/session_flash.php' ?>
            <?php
            $visiteurs = new Visiteur();
            if ($visiteurs->get_visiteurs("omapi_book") == null) : ?>
                <div class="alert alert-danger">
                    <h4>Il n'y a aucun visiteur pour le moment</h4>
                </div>
            <?php else : ?>
                <table class="table">
                    <tr>
                        <th class="table-active">Id</th>
                        <th class="table-active">Nom</th>
                        <th class="table-active">Date de visite</th>
                    </tr>
                    <?php
                    foreach ($visiteurs->get_visiteurs('omapi_book') as $visiteur) : ?>
                        <tr id="<?= $visiteur['id'] ?>">
                            <td class="table-<?= ($visiteur['id'] % 2 == 0) ? 'light' : 'secondary' ?>"><small><?= $visiteur['id'] ?></small></td>
                            <td class="table-<?= ($visiteur['id'] % 2 == 0) ? 'light' : 'secondary' ?>"><small><?= $visiteur['name'] ?></small></td>
                            <td class="table-<?= ($visiteur['id'] % 2 == 0) ? 'light' : 'secondary' ?>"><small><?= $visiteur['date_visite'] ?></small></td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            <?php endif ?>
        </div>
    </div>
</div>
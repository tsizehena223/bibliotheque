<div class="container">
    <div class="main">
        <center>
            <?php require '../includes/session_flash.php' ?>
            <h2>Visiteur</h2>
            <p><i>Veuillez marquer votre visite chez nous !</i></p>
        </center>
        <div style="display: flex; align-items: center; justify-content: center">
            <form action="controllers/visiteur_controller.php" method="post" class="col-md-4">
                <label for="name">Nom : </label>
                <input type="text" name="name" id="name" class="form-control" placeholder="Votre nom" required> <br>
                <center>
                    <button type="submit" class="btn btn-success" name="visiter" style="margin: 5%;">Visiter</button>
                    <a href="connexion" class="btn btn-sm btn-danger">Se connecter en tant que personnel</a>
                </center> <br> <br>
            </form>
        </div>
    </div>
</div>
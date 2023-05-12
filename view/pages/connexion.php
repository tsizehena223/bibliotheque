<div class="container">
    <div class="main">
        <center>
            <?php require '../includes/session_flash.php' ?>
            <h2>Connexion</h2>
            <p><i>Pour pouvoir insérer un livre, veuillez vous connecter d'abord!</i></p>
        </center>
        <div style="display: flex; align-items: center; justify-content: center">
            <form action="controllers/user_connection_controller.php" method="post" class="col-md-6">
                <label for="name">Nom or Email: </label>
                <input type="text" name="name_or_email" id="name" class="form-control" placeholder="Nom ou email" required> <br>

                <label for="psw">Mot de passe : </label>
                <input type="password" name="psw" id="psw" class="form-control" placeholder="Mot de passe" required> <br>
                <center>
                    <button type="submit" class="btn btn-success" name="connexion" style="margin: 5%;">Se connecter</button>
                    <a href="inscription" class="btn btn-sm btn-danger">S'inscrire</a>
                </center> <br> <br>
            </form>
        </div>
    </div>
</div>
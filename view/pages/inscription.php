<div class="container">
    <div class="main">
        <?php require '../includes/session_flash.php' ?>
        <center>
            <h2>Inscription</h2>
        </center>
        <div style="display: flex; align-items: center; justify-content: center">
            <form action="controllers/user_inscription_controller.php" method="post" class="col-md-6">
                <label for="name">Nom : </label>
                <input type="text" name="name" id="name" class="form-control" placeholder="Votre nom" required> <br>

                <label for="email">Email : </label>
                <input type="email" name="email" id="email" class="form-control" placeholder="Votre email" required> <br>

                <label for="psw">Mot de passe : </label>
                <input type="password" name="psw" id="psw" class="form-control" placeholder="Mot de passe" required> <br>

                <label for="psw2">Confirmer le mot de passe : </label>
                <input type="password" name="psw2" id="psw2" class="form-control" placeholder="Confirmer le mot de passe" required> <br>

                <center>
                    <button type="submit" class="btn btn-success" name="inscription" style="margin: 5%;">S'inscrire</button>
                    <a href="connexion" class="btn btn-sm btn-danger">Se connecter</a>
                </center> <br> <br>
            </form>
        </div>
    </div>
</div>
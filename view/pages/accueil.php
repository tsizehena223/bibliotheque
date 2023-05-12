
<style>
    .accueil {
        margin-top: -7%;
        height: 35em;
        background-image:
            linear-gradient(to bottom, rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.6)),
            url('includes/img/book.jpg');
    }

    .accueil h1 {
        position: relative;
        font-size: 3em;
        top: 3em;
        color: #2f80ff;
    }

    .accueil p {
        position: relative;
        color: #3ccbff;
        display: none;
        font-size: 3em;
        top: 3em;
    }

    .accueil .link {
        position: relative;
        bottom: -15em;
    }
</style>
<div class="accueil">
    <?php require '../includes/session_flash.php' ?>
    <center>
        <h1>Bienvenue dans la </h1>
        <p>"bibliothèque de l'OMAPI"</p>
        <div class="link">
            <a href="visiter" class="btn btn-primary"><i class="fa fa-list"></i> Liste des livres</a> &nbsp; &nbsp;
            <a href="ajouter-un-livre" class="btn btn-warning"><i class="fa fa-plus"></i> Ajouter un livre</a> <br><br>
        </div>
    </center>
</div>

<script>
    function typeEffect(element, speed) {
        var text = element.innerHTML;
        element.innerHTML = "";

        var i = 0;
        var timer = setInterval(function() {
            if (i < text.length) {
                element.append(text.charAt(i));
                i++;
            } else {
                clearInterval(timer);
            }
        }, speed);
    }

    // application
    var speed = 100;
    var h1 = document.querySelector('h1');
    var p = document.querySelector('p');
    var delay = h1.innerHTML.length * speed + speed;

    // type affect to header
    typeEffect(h1, speed);

    // type affect to body
    setTimeout(function() {
        p.style.display = "inline-block";
        typeEffect(p, speed);
    }, delay);
</script>

<?php

if (!isset($_SESSION['auth'])) {
    $_SESSION['flash']['error'] = "Vous n'êtes pas encore connectés!";
?>
    <script>
        location.replace("connexion");
    </script>
<?php }

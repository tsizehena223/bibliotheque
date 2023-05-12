<?php if (isset($_SESSION['flash']['error'])) : ?>
    <div class="alert alert-danger"><?= $_SESSION['flash']['error'] ?></div>
<?php unset($_SESSION['flash']['error']);
endif; ?>
<?php if (isset($_SESSION['flash']['success'])) : ?>
    <div class="alert alert-success"><?= $_SESSION['flash']['success'] ?></div>
<?php unset($_SESSION['flash']['success']);
endif; ?>
<?php

include_once __DIR__ . '/Includes/header.php';

?>

<div class="login-container">
    <h2>Inscription</h2>
    <?php if (isset($_GET['error'])): ?>
        <div class="alert alert-danger"><?php echo $_GET['error']; ?></div>
    <?php endif; ?>
    <?php if (isset($_GET['success'])): ?>
        <div class="alert alert-success"><?php echo $_GET['success']; ?></div>
    <?php endif; ?>

    <form action="<?= HOME_URL . 'inscription' ?>" method="post">
        <div>
            <label for="Pseudonym">Pseudonyme:</label>
            <input type="text" id="Pseudonym" placeholder="Entrez un pseudonyme" name="pseudonym">
        </div>
        <div>
            <label for="email">Email:</label>
            <input type="email" id="email" placeholder="Email" name="email" required>
        </div>

        <div>
            <label for="password">Mot de passe:</label>
            <input type="password" id="password" placeholder="Entrez votre mot de passe" name="password">
        </div>

        <div>
            <input type="submit" value="S'inscrire">
        </div>
    </form>
</div>
<?php

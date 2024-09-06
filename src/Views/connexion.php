<?php

include_once __DIR__ . '/Includes/header.php';
?>




<div class="login-container">
    <h2>Connexion</h2>

    <?php if (isset($_GET['error'])): ?>
        <div class="alert alert-danger"><?php echo $_GET['error']; ?></div>
    <?php endif; ?>
    <?php if (isset($_GET['success'])): ?>
        <div class="alert alert-success"><?php echo $_GET['success']; ?></div>
    <?php endif; ?>

    <form action="<?= HOME_URL . 'connexion' ?>"  method="post">
        <div>
            <label for="email">Email:</label>
            <input type="text" id="email" name="email">
        </div>

        <div>
            <label for="password">Mot de passe:</label>
            <input type="password" id="password" name="password">
        </div>

        <div>
            <a href="<?= HOME_URL . 'inscription' ?>">je n'ai pas de compte</a>
        </div>

        <div>
            <input type="submit" value="Se connecter">
        </div>
    </form>
</div>
<?php

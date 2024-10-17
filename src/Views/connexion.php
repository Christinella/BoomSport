<?php
include_once __DIR__ . '/Includes/navbar.php';

?>
<?php


?>
<div class="login-container">
    <h2>Connexion</h2>


    <?php if (isset($_GET['error'])): ?>
        <div class="alert alert-danger"><?php echo $_GET['error']; ?></div>
    <?php endif; ?>
    <?php if (isset($_GET['success'])): ?>
        <div class="alert alert-success"><?php echo $_GET['success']; ?></div>
    <?php endif; ?>

    <form action="<?= HOME_URL . 'connexion' ?>" method="post" class="w-50 mx-auto"> <!-- Centrer le formulaire avec une largeur de 50% -->
    <div class="mb-3"> <!-- Ajoute un espacement entre les éléments -->
        <label for="email" class="form-label">Email:</label>
        <input type="text" id="email" name="email" class="form-control"> <!-- Champ de même taille -->
    </div>

    <div class="mb-3">
        <label for="password" class="form-label">Mot de passe:</label>
        <input type="password" id="password" name="password" class="form-control"> <!-- Champ de même taille -->
    </div>

    <div class="mb-3">
        <a href="<?= HOME_URL . 'inscription' ?>">Je n'ai pas de compte</a>
    </div>

    <div>
        <input type="submit" value="Se connecter" class="btn btn-primary w-100"> <!-- Bouton de la même taille -->
    </div>
</form>


</div>
<?php include_once __DIR__ . "/Includes/footer.php"; ?>

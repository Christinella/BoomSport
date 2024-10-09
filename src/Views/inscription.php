<?php
include_once __DIR__ . '/Includes/navbar.php';
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

    <form action="<?= HOME_URL . 'inscription' ?>" method="post" class="w-50 mx-auto"> <!-- Formulaire centré -->
    <div class="mb-3">
        <label for="Pseudonym" class="form-label">Pseudonyme:</label>
        <input type="text" id="Pseudonym" placeholder="Entrez un pseudonyme" name="pseudonym" class="form-control"> <!-- Champs de même taille -->
    </div>

    <div class="mb-3">
        <label for="email" class="form-label">Email:</label>
        <input type="email" id="email" placeholder="Email" name="email" required class="form-control"> <!-- Champs de même taille -->
    </div>

    <div class="mb-3">
        <label for="password" class="form-label">Mot de passe:</label>
        <input type="password" id="password" placeholder="Entrez votre mot de passe" name="password" class="form-control"> <!-- Champs de même taille -->
    </div>

    <div class="mb-3">
        <input type="submit" value="S'inscrire" class="btn btn-primary w-100"> <!-- Bouton de la même taille -->
    </div>
</form>

</div>
<?php include_once __DIR__ . "/Includes/footer.php"; ?>

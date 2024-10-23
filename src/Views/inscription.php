<?php
include_once __DIR__ . '/Includes/navbar.php';


?>

<div class="login-container">
    <h2>Inscription</h2>

  

    <form action="<?= HOME_URL . 'inscription' ?>" method="post" class="w-50 mx-auto"> 
        <div class="mb-3">
            <label for="Pseudonym" class="form-label">Pseudonyme:</label>
            <input type="text" id="Pseudonym" placeholder="Entrez un pseudonyme" name="pseudonym" class="form-control"> 
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email:</label>
            <input type="email" id="email" placeholder="Email" name="email" required class="form-control"> 
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Mot de passe:</label>
            <div class="input-group">
                <input type="password" id="password" placeholder="Entrez votre mot de passe" name="password" class="form-control">
                <span class="input-group-text" id="togglePassword" style="cursor: pointer;">
                    <i class="fa fa-eye" id="eyeIcon"></i>
                </span>
            </div>
        </div>

        <div class="mb-3">
            <input type="submit" value="S'inscrire" class="btn btn-primary w-100">
        </div>
    </form>
</div>

<?php include_once __DIR__ . "/Includes/footer.php"; ?>




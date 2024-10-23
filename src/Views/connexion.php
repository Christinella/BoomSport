<?php
include_once __DIR__ . '/Includes/navbar.php';
?>

<div class="login-container">
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">connexion</h1>

        <?php if (isset($_GET['error'])): ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <?php echo htmlspecialchars($_GET['error']); ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>

        <?php if (isset($_GET['success'])): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?php echo htmlspecialchars($_GET['success']); ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>
    </div>

    <form action="<?= HOME_URL . 'connexion' ?>" method="post" class="w-100"> 
        <div class="mb-3"> 
            <label for="email" class="form-label">Email:</label>
            <input type="email" id="email" name="email" class="form-control" required> 
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Mot de passe:</label>
            <div class="input-group">
                <input type="password" id="password" placeholder="Entrez votre mot de passe" name="password" class="form-control" required>
                <span class="input-group-text" id="togglePassword">
                    <i class="fa fa-eye" id="eyeIcon"></i>
                </span>
            </div>
        </div>

        <div class="mb-3">
            <a href="<?= HOME_URL . 'inscription' ?>">Je n'ai pas de compte</a>
        </div>

        <div>
            <input type="submit" value="Se connecter" class="btn btn-primary w-100"> 
        </div>
    </form>
</div>
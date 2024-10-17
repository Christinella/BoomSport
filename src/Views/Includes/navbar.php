
<?php
include_once __DIR__ . '/header.php';

?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="<?= HOME_URL ?>">BoomSport</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                <?php if (!isset($_SESSION['adminConnecte'])) : ?>

                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="<?= HOME_URL ?>">Accueil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/sport">Sport</a>
                    </li>
                   
                    <li class="nav-item">
                        <a class="nav-link" href="<?= HOME_URL . 'apropos' ?>">À propos</a>
                    </li>
                    <?php endif; ?>

                    <?php if (isset($_SESSION['connecte']) && $_SESSION['connecte'] === true): ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= HOME_URL . 'dashboard' ?>">Mon compte</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= HOME_URL . 'createWeek' ?>">
                                <span data-feather="calendar"></span>
                                Créer ta semaine
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= HOME_URL . 'deconnexion' ?>">Déconnexion</a>
                        </li>
                    <?php elseif (isset($_SESSION['adminConnecte']) && $_SESSION['adminConnecte'] === true): ?>
                        <li class="nav-item">
    <a class="nav-link" href="<?= HOME_URL . 'admin' ?>">Mon compte</a>
</li>
<li class="nav-item">
    <a class="nav-link" href="<?= HOME_URL . 'admin/allsports' ?>">Sports</a>
</li>
<li class="nav-item">
    <a class="nav-link" href="<?= HOME_URL . 'admin/allprograms' ?>">Programmes</a>
</li>
<li class="nav-item">
    <a class="nav-link" href="<?= HOME_URL . 'admin/allexercises' ?>">Exercices</a>
</li>
<li class="nav-item">
    <a class="nav-link" href="<?= HOME_URL . 'deconnexion' ?>">Déconnexion</a>
</li>

                    <?php else: ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= HOME_URL . 'connexion' ?>">Connexion</a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>

 

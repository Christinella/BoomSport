<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BoomSport</title>

    <link rel="stylesheet" href="<?= HOME_URL ?>assets/css/sport.css">
    <link rel="stylesheet" href="<?= HOME_URL ?>assets/css/main.css">
    <link rel="stylesheet" href="<?= HOME_URL ?>assets/css/User/createWeek.css">
    <script src="<?= HOME_URL ?>assets/js/home.js" defer></script>
    <script src="<?= HOME_URL ?>assets/js/User/createWeek.js" defer></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>

<body>
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="<?= HOME_URL ?>">BoomSport</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="<?= HOME_URL ?>">Accueil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/sport">Sport</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/Alimentation">Alimentation</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= HOME_URL . 'apropos' ?>">À propos</a>
                    </li>

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
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="adminDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Mon compte
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="adminDropdown">
                                <li>
                                    <a class="dropdown-item" href="<?= HOME_URL . 'admin' ?>">Mon compte</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="<?= HOME_URL . 'admin/allsports' ?>">Sports</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="<?= HOME_URL . 'admin/allprograms' ?>">Programmes</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="<?= HOME_URL . 'admin/allexercises' ?>">Exercices</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="<?= HOME_URL . 'deconnexion' ?>">Déconnexion</a>
                                </li>
                            </ul>
                        </li>
                    <?php else: ?>
                        <!-- Optionnel : Ajoutez des liens pour les utilisateurs non connectés -->
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Contenu principal ici -->
    
</body>

</html>

<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>BoomSport</title>
  <link rel="stylesheet" href="<?= HOME_URL ?>assets/css/main.css">
  <link rel="stylesheet" href="<?= HOME_URL ?>assets/css/User/createWeek.css">
  <script src="<?= HOME_URL ?>assets/js/home.js" defer></script>
  <script src="<?= HOME_URL ?>assets/js/User/createWeek.js" defer></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
        <a class="navbar-brand" href="#">
             <?php echo isset($_SESSION['pseudonyme']) ? $_SESSION['pseudonyme'] : 'Users'; ?>
        </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="<?= HOME_URL.'dashboard' ?>">Accueil</a>
                    </li>
                
                    <li class="nav-item">
                        <a class="nav-link" href="<?= HOME_URL  ?>">Déconnexion</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
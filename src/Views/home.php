<?php

include_once __DIR__ . "/Includes/header.php";
?>

<body>
<div id="bousportCarousel" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="https://images.unsplash.com/photo-1541534741688-6078c6bfb5c5?q=80&w=2069&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" class="d-block w-100" alt="Remise en forme" style="height: 300px; object-fit: cover;">
            <div class="carousel-caption d-none d-md-block">
                <h5>Remise en forme</h5>
                <p>Atteignez vos objectifs de remise en forme avec nos programmes personnalisés.</p>
            </div>
        </div>
        <div class="carousel-item">
            <img src="https://images.unsplash.com/photo-1494390248081-4e521a5940db?q=80&w=2006&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" class="d-block w-100" alt="Nutrition" style="height: 300px; object-fit: cover;">
            <div class="carousel-caption d-none d-md-block">
                <h5>Nutrition</h5>
                <p>Adoptez une alimentation équilibrée pour accompagner votre entraînement.</p>
            </div>
        </div>
        <div class="carousel-item">
            <img src="https://images.unsplash.com/photo-1535231540604-72e8fbaf8cdb?q=80&w=2074&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" class="d-block w-100" alt="Dynamisme" style="height: 300px; object-fit: cover;">
            <div class="carousel-caption d-none d-md-block">
                <h5>Dynamisme</h5>
                <p>Transformez-vous, pour devenir quelqu'un de meilleur.</p>
            </div>
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#bousportCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Précédent</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#bousportCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Suivant</span>
    </button>
</div>


<section class="features">
    <h2>Présentation des Fonctionnalités</h2>
    <div class="features-container">
        <div class="feature">
        <a href="<?= HOME_URL . 'sport' ?>" class="connexion-link">
            <i class="fas fa-pencil-alt"></i> <!-- Icône pour la création de programmes -->
            <h3>Sport</h3>
            <p>Naviguez dans le site, en découvrant les différents sports, les programmes et les exercices associés.</p>
        </div>
        <div class="feature">
        <a href="<?= HOME_URL . 'nutrition' ?>" class="connexion-link">
            <i class="fas fa-utensils"></i> <!-- Icône pour la gestion des repas -->
            <h3>Gestion des repas (nutrition)</h3>
            <p>Planifiez vos repas pour une nutrition optimale et équilibrée.</p>
        </div>
        <div class="feature">
        <a href="<?= HOME_URL . 'apropos' ?>" class="connexion-link">
            <i class="fas fa-chart-line"></i> <!-- Icône pour le suivi des performances -->
            <h3>À propos</h3>
            <p>Découvrez mon histoire pour connaître le début de ce site.</p>
        </div>
        <div class="feature">
            <a href="<?= HOME_URL . 'connexion' ?>" class="connexion-link">
                <i class="fas fa-user-friends"></i> <!-- Icône pour l'interface utilisateur intuitive -->
                <h3>Connexion</h3>
                <p>Créez des programmes d'entraînement adaptés à vos objectifs personnels dans votre espace personnel.</p>
            </a>
        </div>
    </div>
</section>



</body>


<?php include_once __DIR__ . "/Includes/footer.php"; ?>
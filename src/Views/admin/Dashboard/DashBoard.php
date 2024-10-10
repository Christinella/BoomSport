<?php
include_once __DIR__ . "/../../Includes/navbar.php";

?>

<body>
    <div class="container-fluid">
        <div class="row">

            <!-- Contenu principal -->
            <?php
// Vérifier si la session est démarrée
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Vérifier si l'utilisateur est connecté
if (isset($_SESSION['Pseudonym']) && isset($_SESSION['Email'])) {
    $pseudonym = $_SESSION['Pseudonym'];
    $email = $_SESSION['Email'];
} else {
    $pseudonym = 'Invité';
    $email = 'Email inconnu';
}
?>

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <h1>Bonjour, <?= htmlspecialchars($pseudonym) ?> !</h1>

    <div>
        <p><strong>Pseudonyme :</strong> <?= htmlspecialchars($pseudonym) ?></p>
        <p><strong>Email :</strong> <?= htmlspecialchars($email) ?></p>
       
    </div>
</main>



        </div>
    </div>

    <!-- Bootstrap JS et Feather Icons -->

</body>
</html>

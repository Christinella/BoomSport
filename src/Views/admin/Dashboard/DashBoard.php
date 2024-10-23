<?php
include_once __DIR__ . "/../../Includes/navbar.php";
?>

<body style="background-color: #f8f9fa;">
    <div class="container-fluid">
        <div class="row">
            <?php
            if (session_status() === PHP_SESSION_NONE) {
                session_start();
            }

            if (isset($_SESSION['Pseudonym']) && isset($_SESSION['Email'])) {
                $pseudonym = $_SESSION['Pseudonym'];
                $email = $_SESSION['Email'];
            } else {
                $pseudonym = 'Invité';
                $email = 'Email inconnu';
            }
            ?>

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            
                <div class="jumbotron text-white p-4 mb-4" style="background-color: #6c757d; border-radius: 8px;">
                    <h1 class="display-4">Bonjour, <?= htmlspecialchars($pseudonym) ?> !</h1>
                    <p class="lead">Bienvenue sur ton tableau de bord administrateur.</p>
                </div>

              
                <div class="row">
                    <div class="col-md-6 mb-4">
                        <div class="card shadow-sm" style="border-radius: 10px;">
                            <div class="card-body">
                                <h5 class="card-title">
                                    <i class="fas fa-user" style="color: #007bff;"></i> Pseudonyme
                                </h5>
                                <p class="card-text">
                                    <?= htmlspecialchars($pseudonym) ?>
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-4">
                        <div class="card shadow-sm" style="border-radius: 10px;">
                            <div class="card-body">
                                <h5 class="card-title">
                                    <i class="fas fa-envelope" style="color: #007bff;"></i> Email
                                </h5>
                                <p class="card-text">
                                    <?= htmlspecialchars($email) ?>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

               
                <div class="d-flex justify-content-end mb-4">
                
                    <a href="<?= HOME_URL . 'deconnexion' ?>"class="btn btn-danger">
                        <i class="fas fa-sign-out-alt"></i> Déconnexion
                    </a>
                </div>
            </main>
        </div>
    </div>

    <!-- Bootstrap & FontAwesome Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

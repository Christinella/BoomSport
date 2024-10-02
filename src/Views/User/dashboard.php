
<?php

include_once __DIR__ . "/../Includes/navbarUser.php";
?>

<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <nav id="sidebar" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
                <div class="position-sticky pt-3">
                    <ul class="nav flex-column">
                
                       
                        <li class="nav-item">
                            <a class="nav-link" href="<?= HOME_URL .'personnelle' ?> ">
                                <span data-feather="activity"></span>
                                Donnée personnelle
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= HOME_URL .'createWeek' ?> ">
                                <span data-feather="calendar"></span>
                               Créer ta semaine
                            </a>
                        </li>
                       
                    </ul>
                </div>
            </nav>

            <!-- Main Content -->
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Tableau de bord</h1>
                </div>

               


    </div>

    <!-- Bootstrap JS et Feather Icons -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/feather-icons"></script>
    <script>
        feather.replace(); // Pour activer les icônes
    </script>
</body>
</html>

</form>
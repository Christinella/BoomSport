
<?php

include_once __DIR__ . "/../../Includes/navbarAdmin.php";
?>

<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <nav id="sidebar" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
                <div class="position-sticky pt-3">
                    <ul class="nav flex-column">
                
                       
                        <li class="nav-item">
                            <a class="nav-link" href="<?= HOME_URL .'admin/allsports' ?> ">
                                <span data-feather="activity"></span>
                                Sports
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="allprogram">
                                <span data-feather="calendar"></span>
                                Programmes
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="allexercice">
                                <span data-feather="list"></span>
                                Exercices
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

                <!-- Stats Cards -->
                <div class="row">
                    <div class="col-md-3">
                        <div class="card text-white bg-primary mb-3">
                            <div class="card-body">
                                <h5 class="card-title">Utilisateurs</h5>
                                
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card text-white bg-success mb-3">
                            <div class="card-body">
                                <h5 class="card-title">Sports</h5>
                                <span class="badge bg-light text-dark">En construction</span>
                             
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card text-white bg-warning mb-3">
                            <div class="card-body">
                                <h5 class="card-title">Programmes</h5>
                                <span class="badge bg-light text-dark">En construction</span>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card text-white bg-danger mb-3">
                            <div class="card-body">
                                <h5 class="card-title">Exercices</h5>
                                <span class="badge bg-light text-dark">En construction</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Utilisateurs Table -->
                <h2>Utilisateurs</h2>
                <div class="table-responsive">
                    <table class="table table-striped table-sm">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>psudonyme </th>
                                <th>Email</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td {users.id_users}></td>
                                <td {users.pseudonym}></td>
                                <td {users.email}></td>
                                <td>
                                    <button class="btn btn-sm btn-warning">Modifier</button>
                                    <button class="btn btn-sm btn-danger">Supprimer</button>
                                </td>
                            </tr>
                            <!-- Ajouter plus de lignes d'utilisateurs ici -->
                        </tbody>
                    </table>
                </div>

                <!-- Ajouter les sections Sports, Programmes et Exercices ici -->
            </main>
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
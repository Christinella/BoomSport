<?php
include_once __DIR__ . "/../Includes/navbar.php";
use src\Repositories\CalendarRepository;


?>

<body>
    <div class="container-fluid">
        <div class="row">
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Tableau de bord</h1>
                </div>

                <?php
          
                if (isset($_SESSION['Pseudonym']) && isset($_SESSION['Email']) && isset($_SESSION['ID_User'])) {
                    $pseudonym = $_SESSION['Pseudonym'];
                    $email = $_SESSION['Email'];
                    $userId = $_SESSION['ID_User']; 

                    echo "<h1>Bonjour, " . htmlspecialchars($pseudonym) . " !</h1>";
                    echo "<p><strong>Pseudonyme :</strong> " . htmlspecialchars($pseudonym) . "</p>";
                    echo "<p><strong>Email :</strong> " . htmlspecialchars($email) . "</p>";

               
                    if (isset($_SESSION['message'])) {
                        echo "<div class='alert alert-info'>" . $_SESSION['message'] . "</div>";
                        unset($_SESSION['message']); 
                    }

                    $calendarRepository = new CalendarRepository();
                    $userPrograms = $calendarRepository->getUserCalendarPrograms($userId);

                    if (!empty($userPrograms)) {
                        echo "<h2>Vos programmes :</h2>";
                        echo "<table class='table table-striped'>";
                        echo "<thead><tr><th>Programme</th><th>Jour</th></tr></thead><tbody>";

                        foreach ($userPrograms as $program) {
                            echo "<tr>";
                            echo "<td>" . htmlspecialchars($program['program_name']) . "</td>";
                            echo "<td>" . htmlspecialchars($program['Days']) . "</td>";
                            echo "</tr>";
                        }

                        echo "</tbody></table>";
                    } else {
                        echo "<p>Aucun programme trouvé.</p>";
                    }
                } else {
                    echo "<p>Utilisateur non connecté.</p>";
                }
                ?>
            </main>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/feather-icons"></script>
    <script>
        feather.replace(); // Pour activer les icônes
    </script>
</body>
</html>

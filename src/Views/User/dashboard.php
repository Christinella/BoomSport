<?php
include_once __DIR__ . "/../Includes/navbar.php";
use src\Repositories\CalendarRepository;
?>

<body style="background-color: #eef1f5; font-family: 'Arial', sans-serif;">
    <div class="container-fluid">
        <div class="row">
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2" style="color: #3a3b3c;">Tableau de bord</h1>
                </div>

                <?php
                if (isset($_SESSION['Pseudonym']) && isset($_SESSION['Email']) && isset($_SESSION['ID_User'])) {
                    $pseudonym = $_SESSION['Pseudonym'];
                    $email = $_SESSION['Email'];
                    $userId = $_SESSION['ID_User']; 

                    echo '
                    <div class="welcome-box mb-4 p-4 text-center bg-white shadow-sm" style="border-radius: 12px;">
                        <h1 style="font-size: 2.5rem; color: #5a6268;">Bonjour, ' . htmlspecialchars($pseudonym) . ' !</h1>
                        <p style="font-size: 1.2rem;"><strong>Email :</strong> ' . htmlspecialchars($email) . '</p>
                    </div>';

                    $calendarRepository = new CalendarRepository();
                    $userPrograms = $calendarRepository->getUserCalendarPrograms($userId);

                    if (!empty($userPrograms)) {
                        echo "<h2 class='mb-4' style='color: #3a3b3c;'>Vos programmes :</h2>";
                        
                        echo '<div class="row">';

                        foreach ($userPrograms as $program) {
                            echo '
                                <div class="col-md-4 mb-4">
                                    <div class="card program-card shadow-lg" style="border-radius: 12px; transition: transform 0.3s; background-color: #fff;">
                                        <div class="card-header text-white" style="background-color: #333; border-radius: 12px 12px 0 0; padding: 1rem;">
                                            <h5 style="margin: 0;">Jour: ' . htmlspecialchars($program['days']) . '</h5>
                                        </div>
                                        <div class="card-body" style="background-color: #f8d7da;">
                                            <h5 class="card-title" style="color: #5a6268; font-size: 1.25rem;">Programme: ' . htmlspecialchars($program['program_name']) . '</h5>
                                        </div>
                                    </div>
                                </div>';
                        }

                        echo '</div>';
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
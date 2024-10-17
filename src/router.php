<?php

use src\Controllers\HomeController;
use src\Controllers\AdminController;

use src\Controllers\SportController;
use src\Controllers\UsersController;
use src\Controllers\ProgramController;
use src\Controllers\CalendarController;
use src\Controllers\ExerciseController;

$homeController = new HomeController;
$userController = new UsersController;
$adminController = new AdminController;
$sportController = new SportController;
$programController = new ProgramController;
$exerciseController = new ExerciseController;
$calendarController = new CalendarController;


$route = $_SERVER['REDIRECT_URL'];
$methode = $_SERVER['REQUEST_METHOD'];

switch ($route) {
    case HOME_URL:
        $homeController->displayHome();
        break;
    case HOME_URL . 'connexion':
        if ($methode === 'POST') {
            $userController->login();
        } else {
            $homeController->connexion();
        }
        break;
    case HOME_URL . 'inscription':
        if ($methode === 'POST') {
            $userController->createUser();
        } else {
            $homeController->inscription();
        }
        break;
    case HOME_URL . 'apropos':
        $homeController->displayApropos();
        break;
    case HOME_URL . 'sport':
        $sportController->showAllSport();
        break;

    case HOME_URL . 'program':
        $programController->showAllProgram();
        break;
    case HOME_URL . 'admin':
        if (isset($_SESSION['adminConnecte']) && $_SESSION['adminConnecte'] == true) {
            $adminController->displayHomeAdmin();
        } else {
            $homeController->connexion();
        }
        break;


        // Page Sport admin
    case HOME_URL . 'admin/allsports':
        $adminController->allSport();
        break;
    case HOME_URL . 'admin/addsport':
        if ($methode === 'POST') {
            $sportController->addSport();
        } else {
            $sportController->displayFormAddSport();
        }
    case HOME_URL . 'admin/editsport':
        // Récupérer l'ID du sport depuis les paramètres de la requête

        if (isset($_SESSION['adminConnecte']) && $_SESSION['adminConnecte'] === true && isset($_GET['ID_Sport'])) {
            $ID_Sport = $_GET['ID_Sport'];

            if ($methode === 'POST') {
                $sportController->updateSport($ID_Sport);
            } else {

                $sportController->displayFormUpdateSport($ID_Sport);
            }
        } else {
            $homeController->connexion();
        }
        break;
    case HOME_URL . 'admin/allsports/delete':
        if ($methode === 'POST' && isset($_POST['ID_Sport']) && $_SESSION['adminConnecte'] === true) {
            $sportController->deleteSport((int)$_POST['ID_Sport']);
        } else {
            $homeController->connexion();
        }
        break;



        // Page Programme admin
    case HOME_URL . 'admin/allprograms':
        $adminController->allProgram();
        break;
    case HOME_URL . 'admin/addprogram':
        if ($methode === 'POST') {
            $programController->addProgram();
        } else {
            $programController->displayFormAddProgram();
        }
        break;
        case HOME_URL . 'admin/allprograms/delete':
            if ($methode === 'POST' && isset($_POST['ID_Program']) && $_SESSION['adminConnecte'] === true) {
                $programController->deleteProgram((int)$_POST['ID_Program']);
            } else {
                $homeController->connexion();
            }
            break;
        // Page Exercise admin 
    case HOME_URL . 'admin/allexercises':
        $exerciseController->displayAllexercises();
        break;
    case HOME_URL . 'admin/addexercise':
        if ($methode === 'POST') {
            $exerciseController->addExercise();
        } else {
            $exerciseController->displayFormAddExercice();
        }
        break;
        case HOME_URL . 'admin/allexercises/delete':
            if ($methode === 'POST' && isset($_POST['ID_Exercise']) && $_SESSION['adminConnecte'] === true) {
                $exerciseController->deleteExercise((int)$_POST['ID_Exercise']);
            } else {
                $homeController->connexion();
            }
            break;
    case HOME_URL . 'dashboard':
        if (isset($_SESSION['connecte']) && $_SESSION['connecte'] === true) {
            $userController->displayHomeUser();
        } else {
            $homeController->connexion();
        }
        break;
    case HOME_URL . 'createWeek':
        if (isset($_SESSION['connecte']) && $_SESSION['connecte'] === true) {
            if (!empty($_POST)) {
                $calendarController->addCalendar();
            } else {
                $userController->createWeek();
            }
        } else {
            $homeController->connexion();
        }

        break;


    case HOME_URL . 'deconnexion':
        $homeController->logout();
        break;
    default:
        echo "Page non trouvée.";
        break;
}

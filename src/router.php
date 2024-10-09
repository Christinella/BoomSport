<?php

use src\Controllers\HomeController;
use src\Controllers\AdminController;
use src\Controllers\ExerciseController;
use src\Controllers\SportController;
use src\Controllers\UsersController;
use src\Controllers\ProgramController;



$homeController = new HomeController;
$userController = new UsersController;
$adminController = new AdminController;
$sportController = new SportController;
$programController = new ProgramController;
$exerciseController = new ExerciseController;

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
        $homeController->displayAllSport();
        break;
    case HOME_URL . 'admin':
        if(isset($_SESSION['adminconnecte']) && $_SESSION['adminconnecte'] === true) {
            $adminController->displayHomeAdmin();
        }else{
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
            $name = isset($_GET['name']) ? $_GET['name'] : null; // Récupérer le nom du sport depuis l'URL
        
            if ($methode === 'POST') {
                // Appeler la méthode pour mettre à jour le sport
                $sportController->updateSport();
            } else {
                // Vérifier si le nom du sport est présent
                if ($name !== null) {
                    $sportController->displayFormUpdateSport($name); // Passer le nom pour afficher le bon sport
                } else {
                    echo "Nom du sport manquant."; // Gestion d'erreur simple
                }
            }
            break;
            case HOME_URL . 'admin/deleteSport':
                $id_sport = isset($_GET['id']) ? $_GET['id'] : null; // Utilisez l'ID du sport
                if ($id_sport !== null) {
                    $sportController->deleteSport($id_sport); // Appeler la méthode pour supprimer le sport
                } else {
                    echo "ID du sport manquant."; // Gestion d'erreur
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
        case HOME_URL . 'dashboard':
            if(isset($_SESSION['connecte']) && $_SESSION['connecte']=== true) {
                $userController->displayHomeUser();
            }else{
                $homeController->connexion();
            }
            break;
            case HOME_URL . 'createWeek':
                $userController->createWeek();
                break;

    case HOME_URL . 'deconnexion':
        $homeController->logout();
        header('Location: ' . HOME_URL);
        break;
    default:
        # code...
        break;
}

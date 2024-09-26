<?php

use src\Controllers\HomeController;
use src\Controllers\AdminController;
use src\Controllers\SportController;
use src\Controllers\UsersController;
use src\Controllers\ProgramController;
use src\Controllers\ExerciseController;


$homeController = new HomeController;
$userController = new UsersController;
$adminController = new AdminController;
$sportController = new SportController;
$programController = new ProgramController;
// $exerciseController = new ExerciseController;


$route = $_SERVER['REDIRECT_URL'];
$methode = $_SERVER['REQUEST_METHOD'];
// var_dump($_SERVER);die();
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
    case HOME_URL . 'admin':
        $adminController->displayHomeAdmin();
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
    // case HOME_URL . 'admin/allexercises':
    //     $adminController->allexercises();
    //     break;
    // case HOME_URL . 'admin/addexercise':
    //     if ($methode === 'POST') {
    //     $exerciseController->addExercise();
    //     } else {
    //     $exerciseController->displayFormAddExercice()();
    //     }
    //     break;

    case HOME_URL . 'deconnexion':
        $homeController->logout();
        header('Location: ' . HOME_URL);
        break;
    default:
        # code...
        break;
}

<?php

use src\Controllers\HomeController;
use src\Controllers\UsersController;

$homeController = new HomeController;
$userController = new UsersController;

$route = $_SERVER['REDIRECT_URL'];
$methode = $_SERVER['REQUEST_METHOD'];
// var_dump($_SERVER);die();
switch ($route) {
    case HOME_URL:
        $homeController->displayHome();
        break;
    case HOME_URL .'connexion':
        if($methode === 'POST'){
        $userController->login();
        } else {
            $homeController->connexion();
        }
        break;
    case HOME_URL.'inscription':
        if($methode === 'POST'){
        $userController->createUser();
        } else {
            $homeController->inscription();
        }
        break;
        case HOME_URL.'apropos':
            $homeController->displayApropos();
            break;
        case HOME_URL.'admin':
            $userController->login();
            break;

        case HOME_URL.'deconnexion':
            $homeController->logout();
        header('Location: '.HOME_URL);
        break;  
    default:
        # code...
        break;
}

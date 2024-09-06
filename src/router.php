<?php

use src\Controllers\HomeController;
use src\Controllers\UsersController;

$homeController = new HomeController;
$userController = new UsersController;

$route = $_SERVER['REDIRECT_URL'];
$methode = $_SERVER['REQUEST_METHOD'];

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


        case HOME_URL.'deconnexion':
            $homeController->logout();
        header('Location: '.HOME_URL);
        break;  
    default:
        # code...
        break;
}

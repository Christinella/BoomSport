<?php

use src\Controllers\HomeController;

$homeController = new HomeController;

$route = $_SERVER['REDIRECT_URL'];
$methode = $_SERVER['REQUEST_METHOD'];

switch ($route) {
    case HOME_URL:
        $homeController->afficherPageDacceuil();
        break;
    
    default:
        # code...
        break;
}

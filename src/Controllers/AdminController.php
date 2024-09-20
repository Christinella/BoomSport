<?php

namespace src\Controllers;

use src\Repositories\SportRepository;


class AdminController
{
    public function allSport()
    {
        $sportRepository = new SportRepository(); // Correctly instantiate the repository
        $sports = $sportRepository->getAllSports(); // Use $sportRepository directly
       
        require_once __DIR__ . '/../Views/admin/sports/all_sports.php';
    }
    public function addSport()
    {
        require_once __DIR__. '/../Views/admin/sports/add_sports.php';
    }
    public function displayHomeAdmin()
    {
         include_once __DIR__ . '/../Views/admin/Dashboard/DashBoard.php' ;
    }
    
}
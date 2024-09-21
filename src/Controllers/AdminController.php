<?php

namespace src\Controllers;

use src\Repositories\ProgramRepository;
use src\Repositories\SportRepository;
use src\Repositories\ProgramsRepository;

class AdminController
{
    public function allSport()
    {
        $sportRepository = new SportRepository(); // Instancier SportRepository
        $sports = $sportRepository->getAllSports(); // Récupérer les sports
        
        require_once __DIR__ . '/../Views/admin/sports/all_sports.php';
    }

   

    public function addSport()
    {
        require_once __DIR__ . '/../Views/admin/sports/add_sports.php';
    }
    public function allProgram()
    {
        $programRepository = new ProgramRepository(); // Instancier SportRepository
        $programs =  $programRepository->getAllProgram(); // Récupérer les sports
        
        require_once __DIR__ . '/../Views/admin/programs/all_programs.php';
    }

    public function displayHomeAdmin()
    {
        include_once __DIR__ . '/../Views/admin/Dashboard/DashBoard.php';
    }
}

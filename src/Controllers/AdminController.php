<?php

namespace src\Controllers;

use src\Repositories\SportRepository;
use src\Repositories\UsersRepository;
use src\Repositories\ProgramRepository;




class AdminController
{
    public function allSport()
    {
        $sportRepository = new SportRepository(); 
        $sports = $sportRepository->getAllSports(); 
        
        require_once __DIR__ . '/../Views/admin/sports/all_sports.php';
    }

   

    public function addSport()
    {
        require_once __DIR__ . '/../Views/admin/sports/add_sports.php';
    }
    public function allProgram()
    {
        $programRepository = new ProgramRepository(); 
        $programs =  $programRepository->getAllProgram(); 
       
        require_once __DIR__ . '/../Views/admin/programs/all_programs.php';
    }
    public function allexercises(){
        require_once __DIR__ . '/../Views/admin/exercises/all_exercises.php';
    }
    

    public function displayHomeAdmin()
    {
        
        if (isset($_SESSION['adminConnecte']) && $_SESSION['adminConnecte'] === true) 
      {
        
        

        
            include_once __DIR__ . '/../Views/admin/Dashboard/DashBoard.php';
        } else {
       
            header('Location: ' . HOME_URL . 'connexion');
            exit;
        }
    }
}

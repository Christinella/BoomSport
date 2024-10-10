<?php

namespace src\Controllers;

use src\Repositories\SportRepository;
use src\Repositories\UsersRepository;
use src\Repositories\ProgramRepository;




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
    public function allexercises(){
        require_once __DIR__ . '/../Views/admin/exercises/all_exercises.php';
    }
    

    public function displayHomeAdmin()
    {
        // Vérifier si l'utilisateur est connecté et est admin
        if (isset($_SESSION['adminConnecte']) && $_SESSION['adminConnecte'] === true) 
      {
        
            // Optionnel : récupérer les informations utilisateur si nécessaire
            // $userId = $_SESSION['user_id'];
            // $userRepository = new UsersRepository();
            // $user = $userRepository->getUserById($userId);

            // Inclure la vue du tableau de bord
            include_once __DIR__ . '/../Views/admin/Dashboard/DashBoard.php';
        } else {
            // Si non connecté, rediriger vers la page de connexion
            header('Location: ' . HOME_URL . 'connexion');
            exit;
        }
    }
}

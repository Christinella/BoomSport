<?php

namespace src\Controllers;

use Exception;
use src\Models\Users;
use src\Repositories\SportRepository;
use src\Repositories\UsersRepository;
use src\Repositories\ProgramRepository;
use src\Repositories\ExerciseRepository;


class UsersController
{
    public function createWeek(){
        $sportRepository = new SportRepository();
        $sports = $sportRepository->getAllSports();
        $programRepository = new ProgramRepository();
        $programs = $programRepository->getAllProgram();
        $exerciseRepository = new ExerciseRepository();
        $exercises = $exerciseRepository-> getAllExercises();
        
       
        require_once __DIR__ . '/../Views/User/createWeek/createWeek.php';
    }

    public function createUser(){
        try{
            $users = new Users();
            $users->setPseudonym(isset($_POST['pseudonym']) ? htmlspecialchars($_POST['pseudonym']) : null);
            $users->setEmail(isset($_POST['email']) ? htmlspecialchars($_POST['email']) : null);
            $users->setPassword(isset($_POST['password']) ? htmlspecialchars($_POST['password']) : null);
            $isAdmin = false;

          

            if (empty($users->getPseudonym()) ||empty($users->getEmail()) || empty($users->getPassword())) {
                throw new \Exception('Tous les champs sont obligatoires.');
            }
            if(strlen($users->getPseudonym()) < 3 || strlen(($users->getPseudonym())) > 20){
                throw new \Exception('Le pseudonyme doit contenir entre 3 et 20 caractères.');
            }
        

        
           $userRepository = new UsersRepository();
            $userRepository->createUser($users , $isAdmin);

 
            $success = "Votre compte a bien été créé.";
            include __DIR__ . '/../Views/connexion.php';
            exit;
        } catch (Exception $e) {
            $error = $e->getMessage();
            include __DIR__ . '/../Views/inscription.php';
            exit;
        }
    }


    public function login()
{
    try {
        $user = new Users();
    
        $userEmail = isset($_POST['email']) ? htmlspecialchars($_POST['email']) : null;
        $userPassword = isset($_POST['password']) ? htmlspecialchars($_POST['password']) : null;
        
        if (empty(trim($userEmail)) || empty(trim($userPassword))) {
            throw new \Exception('Tous les champs sont obligatoires.');
        }
        
        $userRepository =new UsersRepository;
        $userBDD = $userRepository->getUserByEmail($userEmail);
      
        if (!$userBDD || !$userBDD instanceof Users) {
            throw new \Exception('Email ou mot de passe incorrect.');
        }

        if (!password_verify($userPassword, $userBDD->getPassword())) {
            throw new \Exception("Le mail ou le mot de passe est incorrect.");
        }

        
        $_SESSION['ID_User'] = $userBDD->getID_User();  
        $_SESSION['Pseudonym'] = $userBDD->getPseudonym();  
        $_SESSION['Email'] = $userBDD->getEmail();
        $_SESSION['isAdmin'] = $userBDD->getisAdmin();
   

   
        if ($userBDD->getisAdmin() == true) {  
            $_SESSION['adminConnecte'] = true;
            include __DIR__ . '/../Views/admin/Dashboard/DashBoard.php';
        } elseif ($userBDD->getisAdmin() == false){
            $_SESSION['connecte'] = true;
            include __DIR__ . '/../Views/User/dashboard.php';
        }
        exit();  
    } catch (\Exception $e) {

        $error = $e->getMessage();
        include __DIR__ . '/../Views/connexion.php';
        exit();
    }
}
    
public function displayHomeUser()
{
    include_once __DIR__ . '/../Views/User/dashboard.php';
}

}
   
    
    
         

  

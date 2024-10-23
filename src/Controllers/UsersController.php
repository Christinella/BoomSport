<?php

namespace src\Controllers;

use Exception;
use src\Models\Users;
use src\Models\Calendar;
use src\Repositories\SportRepository;
use src\Repositories\UsersRepository;
use src\Repositories\ProgramRepository;
use src\Repositories\ExerciseRepository;
use src\Repositories\CalendarRepository; // Ajoutez cette ligne pour l'importation

class UsersController
{
   

    public function createWeek(){
        $sportRepository = new SportRepository();
        $sports = $sportRepository->getAllSports();
        $programRepository = new ProgramRepository();
        $programs = $programRepository->getAllProgram();
        $exerciseRepository = new ExerciseRepository();
        $exercises = $exerciseRepository->getAllExercises();
        
        require_once __DIR__ . '/../Views/User/createWeek/createWeek.php';
    }

    public function createUser() {
        try {
            $users = new Users();

            $pseudonym = isset($_POST['pseudonym']) ? htmlspecialchars($_POST['pseudonym']) : null;
            $email = isset($_POST['email']) ? htmlspecialchars($_POST['email']) : null;
            $password = isset($_POST['password']) ? htmlspecialchars($_POST['password']) : null;

            if (empty($pseudonym) || empty($email) || empty($password)) {
                throw new Exception('Tous les champs sont obligatoires.');
            }
            if (strlen($pseudonym) < 3 || strlen($pseudonym) > 20) {
                throw new Exception('Le pseudonyme doit contenir entre 3 et 20 caractères.');
            }

            $users->setPseudonym($pseudonym);
            $users->setEmail($email);

         
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            $users->setPassword($hashedPassword);

            $isAdmin = 0; 
            $users->setisAdmin($isAdmin);
            
          
            $userRepository = new UsersRepository();
            $userRepository->createUser($users);

        
            $_SESSION['ID_User'] = $users->getID_User();
            $_SESSION['Pseudonym'] = $users->getPseudonym();
            $_SESSION['Email'] = $users->getEmail();
            $_SESSION['isAdmin'] = $users->getisAdmin();

            $success = "Votre compte a bien été créé.";
            include __DIR__ . '/../Views/connexion.php';  
            exit;

        } catch (Exception $e) {
            $error = $e->getMessage();
            include __DIR__ . '/../Views/inscription.php';
            exit;
        }
    }

    public function login() {
        try {
            $user = new Users();
        
            $userEmail = isset($_POST['email']) ? htmlspecialchars($_POST['email']) : null;
            $userPassword = isset($_POST['password']) ? htmlspecialchars($_POST['password']) : null;
            
            if (empty(trim($userEmail)) || empty(trim($userPassword))) {
                throw new Exception('Tous les champs sont obligatoires.');
            }
            
            $userRepository = new UsersRepository();
            $userBDD = $userRepository->getUserByEmail($userEmail);
          
            if (!$userBDD || !$userBDD instanceof Users) {
                throw new Exception('Email ou mot de passe incorrect.');
            }

            if (!password_verify($userPassword, $userBDD->getPassword())) {
                throw new Exception("Le mail ou le mot de passe est incorrect.");
            }

            $_SESSION['ID_User'] = $userBDD->getID_User();  
            $_SESSION['Pseudonym'] = $userBDD->getPseudonym();  
            $_SESSION['Email'] = $userBDD->getEmail();
            $_SESSION['isAdmin'] = $userBDD->getisAdmin();

            if ($_SESSION['isAdmin'] == 1) {  
                $_SESSION['connecte'] = false;        
                $_SESSION['adminConnecte'] = true; 

                header('Location: '.HOME_URL.'admin?success=connexionréussie!');
            } else {
                $_SESSION['adminConnecte'] = false; 
                $_SESSION['connecte'] = true;        
                header('Location: '.HOME_URL.'dashboard?success=connexion réussie!');
            }
            exit(); 
        } catch (Exception $e) {
            $error = $e->getMessage();
            header('Location: '.HOME_URL.'connexion?error='.urlencode($error));
            exit();
        }
    }

    public function displayHomeUser() {
        include_once __DIR__ . '/../Views/User/dashboard.php';
    }

   
}

<?php

namespace src\Controllers;

USE FFI\Exception;
// use Exception;
use src\Models\Users;
use src\Repositories\UsersRepository;


class UsersController
{

    public function createUser(){
        try{
            $users = new Users();
            $users->setPseudonym(isset($_POST['pseudonym']) ? htmlspecialchars($_POST['pseudonym']) : null);
            $users->setEmail(isset($_POST['email']) ? htmlspecialchars($_POST['email']) : null);
            $users->setPassword(isset($_POST['password']) ? htmlspecialchars($_POST['password']) : null);
            $isAdmin = false;

            // Vérification des données entrées

            // Hashage du mot de passe

            if (empty($users->getPseudonym()) ||empty($users->getEmail()) || empty($users->getPassword())) {
                throw new \Exception('Tous les champs sont obligatoires.');
            }
            if(strlen($users->getPseudonym()) < 3 || strlen(($users->getPseudonym())) > 20){
                throw new \Exception('Le pseudonyme doit contenir entre 3 et 20 caractères.');
            }
        

            // Insertion des données dans la base de données
            //...
           $userRepository = new UsersRepository();
            $userRepository->createUser($users , $isAdmin);

            // Redirection vers la page de connexion
            $success = "Votre compte a bien été créé.";
            include __DIR__ . '/../Views/connexion.php';
            exit;
        } catch (Exception $e) {
            $error = $e->getMessage();
            include __DIR__ . '/../Views/inscription.php';
            exit;
        }
    }

    // public function login()
    // {
    //     try{
    //         $user = new Users();
    //         $user->setEmail(isset($_POST['email']) ? htmlspecialchars($_POST['email']) : null);
    //         $user->setPassword(isset($_POST['password']) ? htmlspecialchars($_POST['password']) : null);  
        
    //         if (empty($user->getEmail()) || empty($user->getPassword())) {
    //             throw new \Exception('Tous les champs sont obligatoires.');
    //         }
    //         $userBDD = $this->userRepository->getUserByEmail($user->getEmail());
    
    //         if ($userBDD){
    //             throw new \Exception('Email ou mot de passe incorrect.');
    //         }
            
    //         if (!password_verify($utilisateur->getPassword(), $userBDD->getPassword())) {
    //             throw new Exception("Le mail ou le mot de passe est incorrect.");
    //         }
    // //         $_SESSION['ID_User'] = $user->getID_User();
    // //         $_SESSION['Pseudonym'] = $user->getPseudonym();
    // //         $_SESSION['Email'] = $user->getEmail();
    // //         $_SESSION['isAdmin'] = $user->getisAdmin();
    // //         $_SESSION['connecte'] = true;

    // //     if ($user['isAdmin'] ===1){
    // //         $_SESSION['adminConnecte'] = true;
    // //         header('Location: '.HOME_URL.'admin?sucess=' . urlencode('Vous êtes connectée'));
    // //     }else{
    // //         header('Location: '.HOME_URL.'sport');
    // //         exit();
    // //     } catch (Exception $e) {
    // //     header('Location:' . HOME_URL . 'connexion?error=' . urlencode($e->getMessage()));
    // //     exit();
    // //     }
    // // }
    //     }
    // }
}
<?php

namespace src\Controllers;

use src\Repositories\UsersRepository;


class UsersController
{

    public function createUser()
    {
        try {

            $pseudonym = $_POST['pseudonym'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $isAdmin = false;

            // Vérification des données entrées

            // Hashage du mot de passe

            if (empty($pseudonym) || empty($email) || empty($password)) {
                throw new \Exception('Tous les champs sont obligatoires.');
            }
            if (strlen($pseudonym) < 3 || strlen($pseudonym) > 20) {
                throw new \Exception('Le pseudonyme doit contenir entre 3 et 20 caractères.');
            }

            // Insertion des données dans la base de données
            //...
            $userRepository = new UsersRepository;
            $userRepository->createUser($pseudonym, $email, $password, $isAdmin);

            // Redirection vers la page de connexion
            header('Location: ' . HOME_URL . 'connexion?success=Utilisateur créé avec succès!');
            exit();
        } catch (\Exception $e) {
            header('Location: ' . HOME_URL . 'inscription?success=' . $e->getMessage());
        }
    }

    public function login()
    {

        $email = htmlspecialchars($_POST['email']);
        $password = htmlspecialchars($_POST['password']);


        if (empty($email) || empty($password)) {
            throw new \Exception('Tous les champs sont obligatoires.');
        }

        $userRepository = new UsersRepository;
        try {
            $userRepository = new UsersRepository;
            $user = $userRepository->getUserByEmail($email);
            if (!$user) {
                throw new \Exception('Email ou mot de passe incorrect.');
            }

            if ($user) {
                var_dump($user);
                die;
                // Création de la session
                $_SESSION['ID_User'] = $user['ID_User'];
                $_SESSION['pseudonym'] = $user['pseudonym'];
                $_SESSION['email'] = $user['email'];
                $_SESSION['connecte'] = true;
                if ($user['isAdmin'] == 1) {
                    // Redirection vers la page admin
                    $_SESSION['admin'] = true;
                    header('Location: ' . HOME_URL . 'homeAdmin');
                    exit();
                } elseif ($user['isAdmin'] == 0) {
                    // Redirection vers la page utilisateur

                    $_SESSION['user'] = true;

                    header('Location: ' . HOME_URL . 'sport');
                    exit();
                } else {
                    // Redirection vers la page utilisateur
                    header('Location: ' . HOME_URL . 'home');
                    exit();
                }
            }
        } catch (\Exception $e) {
            header('Location: ' . HOME_URL . 'connexion?error=' . $e->getMessage());
        }
    }
}

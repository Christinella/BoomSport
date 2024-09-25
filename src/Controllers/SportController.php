<?php

namespace src\Controllers;

use src\Models\Sport;
use src\Repositories\SportRepository;

class SportController
{
    public function displayFormAddSport()
    {
        require_once __DIR__ . '/../Views/admin/sports/add_sport.php';
    }

    public function displayFormEditSport()
    {
        require_once __DIR__ . '/../Views/admin/sports/edit_sport.php';
    }

    public function addSport()
    {
        try {
            // Create a new Sport object
            $sport = new Sport();
            
            // Set properties from POST data
            $sport->setName(isset($_POST['name']) ? htmlspecialchars($_POST['name']) : null);
            $sport->setDescription(isset($_POST['description']) ? htmlspecialchars($_POST['description']) : null);
            $sport->setImage(isset($_POST['image']) ? htmlspecialchars($_POST['image']) : null);

            // Validate the input data
            if (empty($sport->getName()) || empty($sport->getDescription()) || empty($sport->getImage())) {
                throw new \Exception('Tous les champs sont obligatoires.');
            }

            if (strlen($sport->getName()) < 3 || strlen($sport->getName()) > 20) {
                throw new \Exception('Le nom du sport doit contenir entre 3 et 20 caractères.');
            }

            // Verify if the input image is a valid URL
            if (!filter_var($sport->getImage(), FILTER_VALIDATE_URL)) {
                throw new \Exception('L\'image doit être une URL valide.');
            }

            // Create a new instance of SportRepository
            $sportRepository = new SportRepository();
            
            // Pass the whole Sport object to createSport()
            $sportRepository->createSport($sport);

            // Redirect to success page
            header('Location: ' . HOME_URL . 'admin/allsports?success=' . urlencode('Le sport a bien été ajouté.'));
            exit();
        } catch (\Exception $e) {
            // Redirect to the form with an error message
            header('Location: ' . HOME_URL . 'admin/addsport?error=' . urlencode($e->getMessage()));
            exit();
        }
    }


    }
    // public function editSport()
    // {
    //     try {
    //         $name = htmlspecialchars($_POST['name']);
    //         $description = htmlspecialchars($_POST['description']); // Sécuriser la description
    //         $image = $_POST['image'];
    
    //         // Vérifier si tous les champs sont remplis
    //         if (empty($name) || empty($description) || empty($image)) {
    //             throw new \Exception('Tous les champs sont obligatoires.');
    //         }
    
    //         // Vérifier la longueur du nom
    //         if (strlen($name) < 3 || strlen($name) > 20) {
    //             throw new \Exception('Le nom du sport doit contenir entre 3 et 20 caractères.');
    //         }
    
    //         // Vérifier si l'image est une URL valide
    //         if (!filter_var($image, FILTER_VALIDATE_URL)) {
    //             throw new \Exception('L\'image doit être une URL valide.');
    //         }
    
    //         // Sauvegarder les informations du sport
    //         $sportRepository = new SportRepository();
    //         $sportRepository->createSport($name, $image, $description);
    
    //         // Redirection en cas de succès
    //         header('Location: ' . HOME_URL . 'admin/allsports?success=Le sport a bien été modifié.');
    //         exit; // Terminer le script après redirection
    //     } catch (\Exception $e) {
    //         // Redirection en cas d'erreur
    //         header('Location: ' . HOME_URL . 'admin/editsport?error=' . urlencode($e->getMessage()));
    //         exit; // Terminer le script après redirection
    //     }
    // }
    


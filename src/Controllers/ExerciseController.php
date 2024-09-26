<?php

namespace src\Controllers;

use src\Models\Exercise;
use src\Repositories\ExerciseRepository;

class ExerciseController{
    
    public function displayFormAddExercice(){
        require_once __DIR__.'/../Views/admin/Exercises/add_exercise.php';
    }
    // public function addExercise()
    // {
    //     try {
    //         // Create a new Program object
    //         $exercise = new Exercise();
    //         $exercise->setName(isset($_POST['name']) ? htmlspecialchars($_POST['name']) : null);
    //         $exercise->setID_Program(isset($_POST['ID_Program']) ? intval($_POST['ID_Program']) : null);
    //         $exercise->setImage(isset($_POST['image']) ? htmlspecialchars($_POST['image']) : null);
    //         $exercise->setDescription(isset($_POST['description']) ? htmlspecialchars($_POST['description']) : null);
    //         $exercise->setSerie(isset($_POST['serie']) ? htmlspecialchars($_POST['serie']) : null);
            
    //         // Ensure required fields are provided
    //         if (empty($exercise->getName()) || empty($exercise->getImage()) || empty($exercise->getID_Program())) {
    //             throw new \Exception('Tous les champs sont obligatoires.');
    //         }

    //         // Validate program name length
    //         if (strlen($exercise->getName()) < 3 || strlen($exercise>getName()) > 20) {
    //             throw new \Exception('Le nom du programme doit contenir entre 3 et 20 caractères.');
    //         }

    //         // Validate the image URL format
    //         if (!filter_var($exercise->getImage(), FILTER_VALIDATE_URL)) {
    //             throw new \Exception('L\'image doit être une URL valide.');
    //         }

    //         // Call repository to create the program
    //         $exerciseRepository = new ExerciseRepository();
    //         $exerciseRepository->createExercise($exercise);

    //         // Redirect on success
    //         header('Location: ' . HOME_URL . 'admin/allprograms?success=Le programme a bien été ajouté.');
    //         exit();
    //     } catch (\Exception $e) {
    //         // Redirect on error with the error message
    //         header('Location: ' . HOME_URL . 'admin/addprograms?error=' . urlencode($e->getMessage()));
    //         exit();
    //     }
    // }
}



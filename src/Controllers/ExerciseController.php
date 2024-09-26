<?php

namespace src\Controllers;
use src\Repositories\ProgramRepository;

class ExercieController{
    
    public function displayFormAddExercice(){
        $programRepository = new ProgramRepository();
         // Get all programs and get program name and id
         $programs = $programRepository->getAllProgram();
       

        require_once __DIR__.'/../Views/admin/programs/add_exercise.php';
    }
    // public function addExercise()
    // {
    //     try {
    //         $name = htmlspecialchars($_POST['name']);
    //         $image = htmlspecialchars($_POST['image']);
    //         $ID_Program = htmlspecialchars($_POST['ID_program']);
    //         $description = htmlspecialchars($_POST['description']);
    //         $serie = htmlspecialchars($_POST['serie']);
    //         // Ensure required fields are provided
    //         if (empty($name) || empty($image) || empty($ID_Sport)) {
    //             throw new \Exception('Tous les champs sont obligatoires.');
    //         }
    
    //         // Validate program name length
    //         if (strlen($name) < 3 || strlen($name) > 20) {
    //             throw new \Exception('Le nom du programme doit contenir entre 3 et 20 caractères.');
    //         }
    
    //         // Validate the image URL format
    //         if (!filter_var($image, FILTER_VALIDATE_URL)) {
    //             throw new \Exception('L\'image doit être une URL valide.');
    //         }
    
    //         // Call repository to create the program
    //         $programRepository = new ProgramRepository();
    //         $programRepository->createProgram($name, $image, $ID_Sport);
    
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



<?php

namespace src\Controllers;

use Exception;
use src\Repositories\SportRepository;
use src\Repositories\ProgramRepository;
use src\Models\Program; // Import the Program model

class ProgramController
{
    public function displayFormAddProgram()
    {
        $sportRepository = new SportRepository();
        
        // Get all sports to display in the form (names and IDs)
        $sports = $sportRepository->getAllSports();
        require_once __DIR__ . '/../Views/admin/programs/add_program.php';
    }


    public function addProgram()
    {  
        try {
            // Create a new Program object
            $program = new Program();
            $program->setName(isset($_POST['name']) ? htmlspecialchars($_POST['name']) : null);
            $program->setID_Sport(isset($_POST['ID_sport']) ? intval($_POST['ID_sport']) : null);
            $program->setImage(isset($_POST['image']) ? htmlspecialchars($_POST['image']) : null);

            // Ensure required fields are provided
            if (empty($program->getName()) || empty($program->getImage()) || empty($program->getID_Sport())) {
               
                throw new \Exception('Tous les champs sont obligatoires.');
            }

            // Validate program name length
            if (strlen($program->getName()) < 3 || strlen($program->getName()) > 20) {
                throw new \Exception('Le nom du programme doit contenir entre 3 et 20 caractères.');
            }

            // Validate the image URL format
            if (!filter_var($program->getImage(), FILTER_VALIDATE_URL)) {
                throw new \Exception('L\'image doit être une URL valide.');
            }

            // Call repository to create the program
            $programRepository = new ProgramRepository();
            $programRepository->createProgram($program); // Pass the Program object to the repository

            // Redirect on success
            header('Location: ' . HOME_URL . 'admin/allprograms?success=Le programme a bien été ajouté.');
            exit();
        } catch (\Exception $e) {
            // Redirect on error with the error message
            header('Location: ' . HOME_URL . 'admin/addprograms?error=' . urlencode($e->getMessage()));
            exit();
        }
       
    }
    public function deleteProgram() {
        try{
             $ID_Program = $_POST['ID_Program'] ?? null;
 
             if (!$ID_Program) {
                 // $_SESSION['message'] = "ID du sport manquant.";
                 header('Location: ' . HOME_URL . 'admin/allprograms?error=ID du programme manquant.');
                 exit();
             }
 
             $programRepository = new ProgramRepository();
             if ($programRepository->deleteProgram($ID_Program)) {
                 $_SESSION['message'] = "Program supprimé avec succès.";
             } else {
                 $_SESSION['message'] = "Erreur lors de la suppression du program.";
             }
 
             header('Location: ' . HOME_URL . 'admin/allprograms');
             exit();
         } 
         catch (Exception $e) {
             // $_SESSION['message'] = $e->getMessage();
             header('Location: ' . HOME_URL . 'admin/allprograms?error='. urlencode($e->getMessage()));
             exit();
         }
    
 }
    public function showAllProgram() {
        // Récupérer tous les programmes à l'aide du repository
        $programRepository = new ProgramRepository();
        $programs = $programRepository->getAllProgram();
     
        // Afficher la liste des sports dans la vue
        require_once __DIR__. '/../Views/program.php';

}
}
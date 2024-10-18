<?php

namespace src\Controllers;

use Exception;
use src\Models\Exercise;
use src\Repositories\ProgramRepository;
use src\Repositories\ExerciseRepository;


class ExerciseController{
    private $exerciseRepository;
    private $programRepository;
    
    public function __construct()
    {
        $this->exerciseRepository = new ExerciseRepository();
    }
    public function displayFormAddExercice(){
        
        $programRepository = new ProgramRepository();
        
        $programs = $programRepository->getAllProgram(); // Get all programs to display in the form (names and IDs)
        require_once __DIR__.'/../Views/admin/Exercises/add_exercises.php';
    }
    public function displayFormUpdateExercise($ID_Exercise)
    {
        try {

            $ID_Exercise = $_GET['ID_Exercise'];

            $exercise = $this->exerciseRepository->getByID($ID_Exercise);


            if (!$exercise) {
                throw new Exception('Programme non trouvé.');
            }
            $this->programRepository = new ProgramRepository();
            $sports = $this->programRepository->getAllProgram();
            include __DIR__ . '/../Views/admin/Exercises/edit_exercise.php';
        } catch (Exception $e) {

            $error = $e->getMessage();
            include __DIR__ . '/../Views/admin/Exercises/edit_exercise.php';
            exit;
        }
    }
    public function addExercise()
    {
        try {
            // Create a new Exercise object
            $exercise = new Exercise();
          
            // Set properties from POST data
            $exerciseName = isset($_POST['name']) ? htmlspecialchars($_POST['name']) : null;
            $exerciseDescription = isset($_POST['description']) ? htmlspecialchars($_POST['description']) : null; // Should use htmlspecialchars here, not intval
            $exerciseImage = isset($_POST['image']) ? htmlspecialchars($_POST['image']) : null;
            $exerciseSerie = isset($_POST['serie']) ? htmlspecialchars($_POST['serie']) : null;
            $exerciseIDProgram = isset($_POST['ID_Program']) ? htmlspecialchars($_POST['ID_Program']) : null;
           
            // Ensure required fields are provided
            if (empty($exerciseName) || empty($exerciseDescription) || empty($exerciseImage) || empty($exerciseSerie) || empty($exerciseIDProgram)) {
                throw new \Exception('Tous les champs sont obligatoires.');
            }
            
            // Set properties on the Exercise object
            $exercise->setName($exerciseName);
            $exercise->setDescription($exerciseDescription);
            $exercise->setImage($exerciseImage);
            $exercise->setSerie($exerciseSerie);
            $exercise->setID_Program($exerciseIDProgram);
           
            // Validate exercise name length
            if (strlen($exercise->getName()) < 3 || strlen($exercise->getName()) > 20) {
                throw new \Exception('Le nom de l\'exercice doit contenir entre 3 et 20 caractères.');
            }
            
            // Validate the image URL format
            if (!filter_var($exercise->getImage(), FILTER_VALIDATE_URL)) {
                throw new \Exception('L\'image doit être une URL valide.');
            }
    
            // Call repository to create the exercise 
            $exerciseRepository = new ExerciseRepository();
            $exercices = $exerciseRepository->createExercise($exercise); // Pass the Exercise object to the repository
    
            // Redirect on success
            header('Location: ' . HOME_URL . 'admin/allexercises?success=L\'exercice a bien été ajouté.');
            exit();
        } catch (\Exception $e) {
            // Redirect on error with the error message
            header('Location: ' . HOME_URL . 'admin/addexercise?error=' . urlencode($e->getMessage())); // Updated redirection URL
            exit();
        }
    }
    public function updateExercise($ID_Exercise)
    {
        try {
            $name = $_POST['name'];
            $image = $_POST['image'];
            $ID_Program = $_POST['ID_Program'];

            $exercise = new Exercise();

            // Attention ici, le nom de la méthode est `setID_Program`
            $exercise->setID_Exercise(intval($ID_Exercise)); // Correct ici

            $exercise->setName(htmlspecialchars($name)); // Protection contre XSS
            $exercise->setImage(htmlspecialchars($image));
            $exercise->setID_Program(intval($ID_Program));

            $exerciseRepository = new ExerciseRepository();
            $isUpdated = $exerciseRepository->updateExercise($exercise);

            if ($isUpdated) {
                header('Location: ' . HOME_URL . 'admin/allprograms?success=' . urlencode('Le programme a bien été modifié.'));
                exit();
            } else {
                throw new Exception('La mise à jour a échoué.');
            }
        } catch (Exception $e) {
            header('Location: ' . HOME_URL . 'admin/editprogram?ID_Program=' . $_POST['ID_Program'] . '&error=' . urlencode($e->getMessage()));
            exit();
        }
    }
    public function displayAllexercises(){
          // Call repository to create the exercise 
          $exerciseRepository = new ExerciseRepository();
          $exercices = $exerciseRepository->getAllExercises(); // Pass the Exercise object to the repository
        //   var_dump($exercices);
        //   die();
  
          // Redirect on success
        require_once __DIR__ . '/../Views/admin/exercises/all_exercises.php';

          exit();
    }
    public function deleteExercise() {
        try{
             $ID_Exercise = $_POST['ID_Exercise'] ?? null;
 
             if (!$ID_Exercise) {
                 // $_SESSION['message'] = "ID du sport manquant.";
                 header('Location: ' . HOME_URL . 'admin/allexercises?error=ID du programme manquant.');
                 exit();
             }
 
            $exerciseRepository = new ExerciseRepository();
    
             if ($exerciseRepository->deleteExercise($ID_Exercise)) {
                 $_SESSION['message'] = "Program supprimé avec succès.";
             } else {
                 $_SESSION['message'] = "Erreur lors de la suppression du program.";
             }
 
             header('Location: ' . HOME_URL . 'admin/allexercises');
             exit();
         } 
         catch (Exception $e) {
             // $_SESSION['message'] = $e->getMessage();
             header('Location: ' . HOME_URL . 'admin/allexercises?error='. urlencode($e->getMessage()));
             exit();
         }
    
 }
    
}



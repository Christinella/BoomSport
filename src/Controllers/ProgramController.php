<?php

namespace src\Controllers;

use Exception;
use src\Repositories\SportRepository;
use src\Repositories\ProgramRepository;
use src\Models\Program; 

class ProgramController
{
    private  $ProgramRepository;
    private  $SportRepository;
    public function __construct()
    {
        $this->ProgramRepository = new ProgramRepository();
    }
    public function displayFormAddProgram()
    {
        $sportRepository = new SportRepository();

        $sports = $sportRepository->getAllSports();
        require_once __DIR__ . '/../Views/admin/programs/add_program.php';
    }
   
    public function addProgram()
    {
        try {
           
            $program = new Program();
            $program->setName(isset($_POST['name']) ? htmlspecialchars($_POST['name']) : null);
            $program->setID_Sport(isset($_POST['ID_sport']) ? intval($_POST['ID_sport']) : null);
            $program->setImage(isset($_POST['image']) ? htmlspecialchars($_POST['image']) : null);

           
            if (empty($program->getName()) || empty($program->getImage()) || empty($program->getID_Sport())) {

                throw new \Exception('Tous les champs sont obligatoires.');
            }

            
            if (strlen($program->getName()) < 3 || strlen($program->getName()) > 20) {
                throw new \Exception('Le nom du programme doit contenir entre 3 et 20 caractères.');
            }

            
            if (!filter_var($program->getImage(), FILTER_VALIDATE_URL)) {
                throw new \Exception('L\'image doit être une URL valide.');
            }

          
            $programRepository = new ProgramRepository();
            $programRepository->createProgram($program); 

          
            header('Location: ' . HOME_URL . 'admin/allprograms?success=Le programme a bien été ajouté.');
            exit();
        } catch (\Exception $e) {
          
            header('Location: ' . HOME_URL . 'admin/addprogram?error=' . urlencode($e->getMessage()));
            exit();
        }
    }
    public function displayFormUpdateProgram($ID_Program)
    {
        try {

            $ID_Program = $_GET['ID_Program'];

            $program = $this->ProgramRepository->getByID($ID_Program);


            if (!$program) {
                throw new Exception('Sport non trouvé.');
            }
            $this->SportRepository = new SportRepository();
            $sports = $this->SportRepository->getAllSports();
            include __DIR__ . '/../Views/admin/programs/edit_program.php';
        } catch (Exception $e) {

            $error = $e->getMessage();
            include __DIR__ . '/../Views/admin/programs/edit_program.php';
            exit;
        }
    }

    public function updateProgram($ID_Program)
    {
        try {
            $name = $_POST['name'];
            $image = $_POST['image'];
            $ID_Sport = $_POST['ID_sport'];

            $program = new Program();

          
            $program->setID_Program(intval($ID_Program));

            $program->setName(htmlspecialchars($name)); 
            $program->setImage(htmlspecialchars($image));
            $program->setID_Sport(intval($ID_Sport));

            $programRepository = new ProgramRepository();
            $isUpdated = $programRepository->updateProgram($program);

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

    public function deleteProgram()
    {
        try {
            $ID_Program = $_POST['ID_Program'] ?? null;

            if (!$ID_Program) {
             
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
        } catch (Exception $e) {
           
            header('Location: ' . HOME_URL . 'admin/allprograms?error=' . urlencode($e->getMessage()));
            exit();
        }
    }

    public function showAllProgramForThisSport()
    {
        try {
            $ID_Sport = $_GET['ID_Sport'] ?? null;
            if (!$ID_Sport) {
                throw new Exception('ID du sport manquant.');
            }

            $programRepository = new ProgramRepository();
            $programs = $programRepository->getAllProgramForThisSport($ID_Sport);

         
            require_once __DIR__ . '/../Views/program.php';
        } catch (Exception $e) {
           
            $_SESSION['error'] = $e->getMessage();
            header('Location: ' . HOME_URL . 'sports');
            exit();
        }
    }
}

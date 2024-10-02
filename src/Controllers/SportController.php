<?php

namespace src\Controllers;

use Exception;
use src\Models\Sport;
use src\Repositories\SportRepository;

class SportController
{
    public function displayFormAddSport()
    {
        require_once __DIR__ . '/../Views/admin/sports/add_sport.php';
    }

    public function displayFormUptadeSport()
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

           
            $sportRepository = new SportRepository();
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

    public function updateSport()
    {
        try {
           
            if (isset($_POST['id']) && isset($_POST['name']) && isset($_POST['description']) && isset($_POST['image'])) {
             
                $sport = new Sport();
           
                $sport->setID_Sport(intval($_POST['ID_Sport'])); // Assurez-vous que l'ID est bien un entier
                $sport->setName(htmlspecialchars($_POST['name'])); // Protection contre XSS
                $sport->setDescription(htmlspecialchars($_POST['description']));
                $sport->setImage(htmlspecialchars($_POST['image']));
                
                
                $sportRepository = new SportRepository();
                
              
                $isUpdated = $sportRepository->updateSport($sport);
                
                if ($isUpdated) {
               
                    header('Location: ' . HOME_URL . 'admin/allsports?success=' . urlencode('Le sport a bien été modifié.'));
                    exit();
                } else {
                    throw new Exception('La mise à jour a échoué.');
                }
            } else {
                throw new Exception('Tous les champs sont obligatoires.');
            }
        } catch (Exception $e) {
          
            header('Location: ' . HOME_URL . 'admin/editsport?id=' . $_POST['id'] . '&error=' . urlencode($e->getMessage()));
            exit();
        }
    }
}
function deleteSport($id) {
    $sportRepository = new SportRepository();
    $sportRepository->deleteSport($id);
    header('Location: ' . HOME_URL. 'admin/allsports?success=' . urlencode('Le sport a bien été supprimé.'));
    exit();
}

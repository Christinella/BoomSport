<?php

namespace src\Controllers;

use Exception;
use src\Models\Sport;
use src\Repositories\SportRepository;

class SportController
{
    private  $SportRepository;
    
    public function __construct()
    {
        $this->SportRepository = new SportRepository();
    }
    public function displayFormAddSport()
    {
        require_once __DIR__ . '/../Views/admin/sports/add_sport.php';
    }

  public function displayFormUpdateSport($ID_Sport)
{
    try {
       
        $ID_Sport = $_GET['ID_Sport'] ;
        // Récupérer le sport en utilisant son nom
        $sport = $this->SportRepository->getById($ID_Sport);

        // Vérifier si le sport a été trouvé
        if (!$sport) {
            throw new Exception('Sport non trouvé.');
        }

        // Inclure la vue pour afficher le formulaire de mise à jour du sport
        include __DIR__ . '/../Views/admin/sports/edit_sport.php';

    } catch (Exception $e) {
        // En cas d'exception, afficher l'erreur dans la vue
        $error = $e->getMessage();
        include __DIR__ . '/../Views/admin/sports/edit_sport.php';
        exit;
    }
}

    

    public function addSport()
    {
        try {
      
            $sport = new Sport();
            

            $sport->setName(isset($_POST['name']) ? htmlspecialchars($_POST['name']) : null);
            $sport->setDescription(isset($_POST['description']) ? htmlspecialchars($_POST['description']) : null);
            $sport->setImage(isset($_POST['image']) ? htmlspecialchars($_POST['image']) : null);

  
            if (empty($sport->getName()) || empty($sport->getDescription()) || empty($sport->getImage())) {
                throw new \Exception('Tous les champs sont obligatoires.');
            }

            if (strlen($sport->getName()) < 3 || strlen($sport->getName()) > 20) {
                throw new \Exception('Le nom du sport doit contenir entre 3 et 20 caractères.');
            }

      
            if (!filter_var($sport->getImage(), FILTER_VALIDATE_URL)) {
                throw new \Exception('L\'image doit être une URL valide.');
            }

           
            $sportRepository = new SportRepository();
            $sportRepository->createSport($sport);

 
            header('Location: ' . HOME_URL . 'admin/allsports?success=' . urlencode('Le sport a bien été ajouté.'));
            exit();
        } catch (\Exception $e) {
          
            header('Location: ' . HOME_URL . 'admin/addsport?error=' . urlencode($e->getMessage()));
            exit();
        }
    }

    public function updateSport($ID_Sport)
    {
        try {
           
         
             $name = $_POST['name'];
             $description = $_POST['description'];
             $image = $_POST['image'];


                $sport = new Sport();
           
                $sport->setID_Sport(intval($ID_Sport));
                
                $sport->setName(htmlspecialchars($name)); 
                $sport->setDescription(htmlspecialchars($description));
                $sport->setImage(htmlspecialchars($image));
                
                
                $sportRepository = new SportRepository();
                
              
                $isUpdated = $sportRepository->updateSport($sport);
                
                if ($isUpdated) {
               
                    header('Location: ' . HOME_URL . 'admin/allsports?success=' . urlencode('Le sport a bien été modifié.'));
                    exit();
                } else {
                    throw new Exception('La mise à jour a échoué.');
                }
            
        } catch (Exception $e) {
          
            header('Location: ' . HOME_URL . 'admin/editsport?id=' . $_POST['ID_Sport'] . '&error=' . urlencode($e->getMessage()));
            exit();
        }
    }
    public function showAllSport() {
          
            $sports = $this->SportRepository->getAllSports();
            require_once __DIR__. '/../Views/sport.php';
    
    }
    
    
    public function deleteSport() {
        try {
            $ID_Sport = $_POST['ID_Sport'] ?? null;
    
            if (!$ID_Sport) {
                echo json_encode(['error' => 'ID du sport manquant.']);
                exit();
            }
    
            $sportRepository = new SportRepository();
            if ($sportRepository->deleteSport($ID_Sport)) {
                echo json_encode(['success' => 'Sport supprimé avec succès.']);
            } else {
                echo json_encode(['error' => 'Erreur lors de la suppression du sport.']);
            }
        } catch (Exception $e) {
            echo json_encode(['error' => $e->getMessage()]);
        }
    }
    
}
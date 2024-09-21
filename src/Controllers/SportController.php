<?php

namespace src\Controllers;


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

            $name = htmlspecialchars($_POST['name']);
            $description = htmlspecialchars($_POST['description']);
            $image = htmlspecialchars($_POST['image']);

            // if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
            //     $target_dir = "uploads/";
            //     $target_file = $target_dir . basename($_FILES["image"]["name"]);


            //     if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            //         $image = $target_file; 
            //     } else {
            //         throw new \Exception('Erreur lors du téléchargement de l\'image.');
            //     }
            // } else {
            //     throw new \Exception('Image non valide.');
            // }


            if (empty($name) || empty($description) || empty($image)) {
                throw new \Exception('Tous les champs sont obligatoires.');
            }

            if (strlen($name) < 3 || strlen($name) > 20) {
                throw new \Exception('Le nom du sport doit contenir entre 3 et 20 caractères.');
            }
            // verify if the input image is a link or not
            if (!filter_var($image, FILTER_VALIDATE_URL)) {
                throw new \Exception('L\'image doit être une URL valide.');
            }

            $sportRepository = new SportRepository;
            $sportRepository->createSport($name, $image, $description);

            header('Location: ' . HOME_URL . 'admin/allsports?success=Le sport a bien été ajouté.');
        } catch (\Exception $e) {
            header('Location: ' . HOME_URL.'admin/addsport?error='. urlencode($e->getMessage()));
        }
    }
    public function editSport()
    {
        try {
            $name = htmlspecialchars($_POST['name']);
            $description = htmlspecialchars($_POST['description']); // Sécuriser la description
            $image = $_POST['image'];
    
            // Vérifier si tous les champs sont remplis
            if (empty($name) || empty($description) || empty($image)) {
                throw new \Exception('Tous les champs sont obligatoires.');
            }
    
            // Vérifier la longueur du nom
            if (strlen($name) < 3 || strlen($name) > 20) {
                throw new \Exception('Le nom du sport doit contenir entre 3 et 20 caractères.');
            }
    
            // Vérifier si l'image est une URL valide
            if (!filter_var($image, FILTER_VALIDATE_URL)) {
                throw new \Exception('L\'image doit être une URL valide.');
            }
    
            // Sauvegarder les informations du sport
            $sportRepository = new SportRepository();
            $sportRepository->createSport($name, $image, $description);
    
            // Redirection en cas de succès
            header('Location: ' . HOME_URL . 'admin/allsports?success=Le sport a bien été modifié.');
            exit; // Terminer le script après redirection
        } catch (\Exception $e) {
            // Redirection en cas d'erreur
            header('Location: ' . HOME_URL . 'admin/editsport?error=' . urlencode($e->getMessage()));
            exit; // Terminer le script après redirection
        }
    }
    
}


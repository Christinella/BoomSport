{# <?php

namespace src\Controllers;

use src\Repositories\SportRepository;


class SportController
{

    public function createSport()
    {
        try {

            $name = $_POST['name'];
            $image = $_POST['image'];
            $description = $_POST['description'];


            // Vérification des données entrées
            if (empty($name) || empty($image) || empty($description)) {
                throw new \Exception('Tous les champs doivent être remplis.');
            }
            if (strlen($name) < 3 || strlen($name) > 20) {
                throw new \Exception('Le nom du sport doit contenir entre 3 et 20 caractères.');
            }


        //     // Insertion des données dans la base de données
        //     //...
        //     $sportRepository = new SportRepository;
        //     // Vérification de l'unicité du nom du sport
        //     if ($sportRepository->checkSportExists($name)) {
        //         throw new \Exception('Ce nom de sport existe déjà.');
        //     }
        //     $sportRepository->createSport($name, $image);
        //     // Redirection vers la page de connexion
        //     header('Location: ' . HOME_URL . 'connexion?success=Utilisateur créé avec succès!');
        // } catch (\Exception $e) {
        //     header('Location: ' . HOME_URL . 'inscription?error=' . $e->getMessage());
        // }
    }
}
} #}
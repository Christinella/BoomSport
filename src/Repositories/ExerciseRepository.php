<?php
namespace src\Repositories;

use PDO;
use PDOException;
use src\Models\Sport;
use src\Models\Database;


class SportRepository
{
    private $DB;

    public function __construct()
    {
        $database = new Database;
        $this->DB = $database->getDB();

        require_once __DIR__ . '/../../config.php';
    }
    public function createExercise($name, $image, $description, $serie, $ID_Program)
{
    try {
        // Préparer la requête d'insertion
        $stmt = $this->DB->prepare('INSERT INTO sport (name, image, description) VALUES (:name, :image, :description)');
        $stmt->execute(array(
            'name' => $name,
            'image' => $image,
            'description' => $description,
            'ID_Program' => $ID_Program,
           'serie' => $serie,
        ));
        return true;
    } catch (PDOException $e) {
        echo "Error : " . $e->getMessage();
        return false;
    }   
}


public function getAllExercise(){
    try {
        $stmt = $this->DB->query('SELECT * FROM program');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "Error : ". $e->getMessage();
    }
}
}
<?php
namespace src\Repositories;

use PDO;
use PDOException;
use src\Models\Sport;
use src\Models\Database;
use src\Models\Exercise;

class SportRepository
{
    private $DB;

    public function __construct()
    {
        $database = new Database;
        $this->DB = $database->getDB();

        require_once __DIR__ . '/../../config.php';
    }
    
    public function createExercise(exercise $exercise) : Exercise
    {
        try {
        // Préparer la requête d'insertion
        $sql = "INSERT INTO exericse (name, image, description, serie, ID_Program) 
        VALUES (:name, :image, :ID_Program, :serie, :description);";
        
        $statement = $this->DB->prepare($sql);
        
        $statement->execute([
            ':name'               => $exercise->getName(),
            ':image'              => $exercise->getImage(),
            ':ID_Program'         => $exercise->getID_Program(),
            ':serie'              => $exercise->getSerie(),
            ':description'        => $exercise->getDescription(),
          
        ]);
        return $this->DB->lastInsertId();
    } catch (PDOException $e) {
        echo $e->getMessage();
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

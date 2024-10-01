<?php
namespace src\Repositories;

use PDO;
use PDOException;

use src\Models\Database;
use src\Models\Exercise;

class ExerciseRepository
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
        $sql = "INSERT INTO exercise (name, image, description, serie, ID_Program) 
        VALUES (:name, :image, :description, :serie, :ID_Program);";
        
        $statement = $this->DB->prepare($sql);
        
        $statement->execute([
            ':name'               => $exercise->getName(),
            ':image'              => $exercise->getImage(),
            ':description'        => $exercise->getDescription(),
            ':serie'              => $exercise->getSerie(),
            ':ID_Program'         => $exercise->getID_Program(),
          
        ]);
        $id_exercice = $this->DB->lastInsertId();
        $exercise->setID_Exercise($id_exercice);
      
        return $exercise;
    }



    public function getAllExercises(){
    try {
        $stmt = $this->DB->query('SELECT * FROM exercise');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "Error : ". $e->getMessage();
    }
}
}

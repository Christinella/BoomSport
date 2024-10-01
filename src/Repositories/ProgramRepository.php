<?php

namespace src\Repositories;

use PDO;
use PDOException;
use src\Models\Program;
use src\Models\Database;

class ProgramRepository
{
    private $DB;

    public function __construct(){
        $database = new Database;
        $this->DB = $database->getDB();
    
        require_once __DIR__ . '/../../config.php';
    }
    public function createProgram(program $program) : Program
    {
      
            // Préparer la requête d'insertion
            $sql = "INSERT INTO program (name, image, ID_Sport) 
        VALUES (:name, :image, :ID_Sport);";
            
            $statement = $this->DB->prepare($sql);

            $statement->execute([
                ':name'               => $program->getName(),
                ':image'              => $program->getImage(),
                ':ID_Sport'            => $program->getID_Sport(),
              
            ]);
            $id_program = $this->DB->lastInsertId();
            $program->setID_Program($id_program);
          
            return $program;
    }
    public function getAllProgram(){
        try {
            $stmt = $this->DB->query('SELECT * FROM program');
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Error : ". $e->getMessage();
            }
        }
}

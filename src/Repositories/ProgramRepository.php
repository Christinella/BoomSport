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
        public function getAllPrograms(){
            try {
                // Requête SQL modifiée pour inclure le nom du sport
                $sql = "
                    SELECT P.ID_Program, P.name AS program_name, S.name AS sport_name 
                    FROM program P
                    JOIN Sport S ON P.ID_Sport = S.ID_Sport";
                
                $stmt = $this->DB->query($sql);
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            } catch (PDOException $e) {
                echo "Error : ". $e->getMessage();
            }
        }
        public function deleteProgram($ID_Program): bool
    {
        $sql = "DELETE FROM program WHERE ID_Program = :ID_Program"; 
        $statement = $this->DB->prepare($sql);
        return $statement->execute([':ID_Program' => $ID_Program]); 
    }
    //   public function getProgramByName($name){
    //     try {
    //         $stmt = $this->DB->prepare('SELECT * FROM program WHERE name = :name');
    //         $stmt->execute(array('name' => $name));
    //         $stmt->setFetchMode(PDO::FETCH_CLASS, Program::class);
    //         $program = $stmt->fetch();
    //         return $program;
    //     } catch (PDOException $e) {
    //         echo "Error : ". $e->getMessage();
    //     }
    //   }
    //   public function getSportNameByProgramId(int $programId): ?string {
    //     // SQL pour récupérer le nom du sport associé à un programme
    //     $sql = "SELECT S.name AS sport_name
    //             FROM program P
    //             JOIN Sport S ON P.ID_Sport = S.ID_Sport
    //             WHERE P.ID_Program = :program_id";
    
    //     // Préparation de la requête
    //     $stmt = $this->DB->prepare($sql);
    
    //     try {
    //         // Exécution de la requête avec le paramètre
    //         $stmt->execute([':program_id' => $programId]);
    
    //         // Récupération du résultat
    //         $result = $stmt->fetch(PDO::FETCH_ASSOC);
    
    //         // Retourner le nom du sport ou null si aucun résultat
    //         return $result ? $result['sport_name'] : null; 
    //     } catch (PDOException $e) {
    //         echo "Erreur lors de la récupération du nom du sport: " . $e->getMessage();
    //         return null; // Retourne null en cas d'erreur
    //     }
    // }
    // public function getProgramById($id) {
    //     $stmt = $this->DB->prepare('SELECT * FROM program WHERE ID_Program = :id');
    //     $stmt->execute(['id' => $id]);
    //     return $stmt->fetch(PDO::FETCH_ASSOC);
    // }
    
    
        }


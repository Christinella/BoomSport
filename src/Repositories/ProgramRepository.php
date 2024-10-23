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
   
        public function getAllProgramForThisSport($ID_Sport)
        {
            try {
                $stmt = $this->DB->prepare('SELECT * FROM program WHERE ID_Sport = :ID_Sport');
                $stmt->execute([':ID_Sport' => $ID_Sport]);
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            } catch (PDOException $e) {
                echo "Error : ". $e->getMessage();
            }
        }
        public function getAllPrograms(){
            try {
              
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
        public function updateProgram(Program $program){
            try {
                $sql = "UPDATE program 
                SET name = :name, 
                image = :image, 
                ID_Sport = :ID_Sport 
                WHERE ID_Program = :ID_Program";
                
                $statement = $this->DB->prepare($sql);

                $statement->execute([
                    ':name'               => $program->getName(),
                    ':image'              => $program->getImage(),
                    ':ID_Sport'            => $program->getID_Sport(),
                    ':ID_Program'          => $program->getID_Program(),
                ]);
                return true;
            } catch (PDOException $e) {
                echo "Error : ". $e->getMessage();
                return false;
            }
        }
        public function getByID($ID_Program){
          {
                $sql = "SELECT * FROM program WHERE ID_Program = :ID_Program";
                $statement = $this->DB->prepare($sql);
                $statement->execute([':ID_Program' => $ID_Program]);
                $statement->setFetchMode(PDO::FETCH_CLASS, Program::class);
                return $statement->fetch();
            }
        }
        public function deleteProgram($ID_Program): bool
    {
        $sql = "DELETE FROM program WHERE ID_Program = :ID_Program"; 
        $statement = $this->DB->prepare($sql);
        return $statement->execute([':ID_Program' => $ID_Program]); 
    }
       public function getProgramByName($name){
         try {
             $stmt = $this->DB->prepare('SELECT * FROM program WHERE name = :name');
             $stmt->execute(array('name' => $name));
             $stmt->setFetchMode(PDO::FETCH_CLASS, Program::class);
             $program = $stmt->fetch();
             return $program;
         } catch (PDOException $e) {
             echo "Error : ". $e->getMessage();
         }
       }
   

      

    
    
        }


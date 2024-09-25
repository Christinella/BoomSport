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
    public function createSport(Sport $Sport) : Sport
    {
        $sql = "INSERT INTO sport (name, image, description) 
        VALUES (:name, :image, :description);";

        $statement = $this->DB->prepare($sql);
        
        $statement->execute([
            ':name'               => $Sport->getName(),
            ':image'              => $Sport->getImage(),
            ':description'        => $Sport->getDescription(),
          
        ]);

        $idSport = $this->DB->lastInsertId();
        $Sport->setID_Sport($idSport);
    
        return $Sport;



    }
  



public function getAllSports(){
    try {
        $stmt = $this->DB->query('SELECT * FROM sport');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "Error : ". $e->getMessage();
    }
}

// public function getUserByEmail($email){
//   try {
//     $stmt = $this->DB->prepare('SELECT * FROM users WHERE email = :email');
//     $stmt->execute(array('email' => $email));
//     return $stmt->fetch(PDO::FETCH_ASSOC);
//   } catch (PDOException $e) {
//     echo "Error : ". $e->getMessage();
//   }
// }
}
  
  
   


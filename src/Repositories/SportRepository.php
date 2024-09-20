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
    public function createSport($name, $image, $description)
{
    try {
        // Préparer la requête d'insertion
        $stmt = $this->DB->prepare('INSERT INTO sport (name, image, description) VALUES (:name, :image, :description)');
        $stmt->execute(array(
            'name' => $name,
            'image' => $image,
            'description' => $description,
        ));
        return true;
    } catch (PDOException $e) {
        echo "Error : " . $e->getMessage();
        return false;
    }   
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
  
  
   


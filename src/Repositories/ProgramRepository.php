<?php

namespace src\Repositories;

use PDO;
use PDOException;
use src\Models\Sport;
use src\Models\Database;

class ProgramRepository
{
    private $DB;

    public function __construct(){
        $database = new Database;
        $this->DB = $database->getDB();
    
        require_once __DIR__ . '/../../config.php';
    }
    public function createProgram($name, $image, $ID_Sport)
    {
        try {
            // Préparer la requête d'insertion
            $stmt = $this->DB->prepare('INSERT INTO program (name, image, ID_Sport) VALUES (:name, :image, :ID_Sport)');
            $stmt->execute(array(
                'name' => $name,
                'image' => $image,
                'ID_Sport' => $ID_Sport,
            ));
            return $this->DB->lastInsertId();
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
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
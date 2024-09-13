<?php

namespace src\Repositories;

use PDO;
use src\Models\Database;
use src\Models\Sport;

class SportRepository
{
    private $DB;

    public function __construct()
    {
        $database = new Database;
        $this->DB = $database->getDB();

        require_once __DIR__ . '/../../config.php';
    }

    public function getAllSport(){
        $sql ="SELECT * FROM ".PREFIXE."sport";   
        $result = $this->DB->query($sql);
        $sport = $result->fetchAll(PDO::FETCH_CLASS, Sport::class);
        return $sport;
    
    }
    public function createSport($nom, $image){
        $sql = "INSERT INTO ".PREFIXE."sport (Name, Image) VALUES (:name, :image)";
        $stmt = $this->DB->prepare($sql);
        $stmt->execute(array('name' => $nom, 'image' => $image));
    }
    public function deleteSport($id){
        $sql = "DELETE FROM ".PREFIXE."sport WHERE ID_Sport = :id";
        $stmt = $this->DB->prepare($sql);
        $stmt->execute(array('id' => $id));
    }
    public function updateSport($id, $nom, $image){
        $sql = "UPDATE ".PREFIXE."sport SET Name = :name, Image = :image WHERE ID_Sport = :id";
        $stmt = $this->DB->prepare($sql);
        $stmt->execute(array('name' => $nom, 'image' => $image, 'id' => $id));
    }
    public function getSportById($id){
        $sql = "SELECT * FROM ".PREFIXE."sport WHERE ID_Sport = :id";
        $stmt = $this->DB->prepare($sql);
        $stmt->execute(array('id' => $id));
        return $stmt->fetch(PDO::FETCH_OBJ);
    }
    


   
}

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
}

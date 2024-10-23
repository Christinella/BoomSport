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
            ':name'        => $Sport->getName(),
            ':image'       => $Sport->getImage(),
            ':description' => $Sport->getDescription(),
        ]);

        $idSport = $this->DB->lastInsertId();
        $Sport->setID_Sport($idSport);

        return $Sport;
    }

    public function updateSport(Sport $sport) 
    {
        $sql = "UPDATE sport 
                SET name = :name, 
                    description = :description, 
                    image = :image 
                WHERE ID_Sport = :ID_Sport";

        $statement = $this->DB->prepare($sql);

        return $statement->execute([
            ':name'        => $sport->getName(),
            ':description' => $sport->getDescription(),
            ':image'       => $sport->getImage(),
            ':ID_Sport'    => $sport->getID_Sport()
        ]);
    }

    public function getById($id_sport) 
    {
        $sql = "SELECT * FROM sport WHERE id_sport = :id_sport";
        $statement = $this->DB->prepare($sql);
        $statement->execute([':id_sport' => $id_sport]);
        $statement->setFetchMode(PDO::FETCH_CLASS, Sport::class);
        return $statement->fetch();
    }

    public function deleteSport($ID_Sport): bool
    {
        $sql = "DELETE FROM sport WHERE ID_Sport = :ID_Sport"; 
        $statement = $this->DB->prepare($sql);
        return $statement->execute([':ID_Sport' => $ID_Sport]); 
    }

    public function getAllSports()
    {
        try {
            $stmt = $this->DB->query('SELECT * FROM sport');
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return [];
        }
    }
}

  
  
   
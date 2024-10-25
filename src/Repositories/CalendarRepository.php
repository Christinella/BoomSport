<?php
namespace src\Repositories;

use PDO;
use PDOException;
use src\Models\Calendar;
use src\Models\Database;

class CalendarRepository {
    private $DB;

    public function __construct()
    {
      $database = new Database;
      $this->DB = $database->getDB();
  
      require_once __DIR__ . '/../../config.php';
    }

    public function addCalendar(Calendar $calendar) {
        $sql = "INSERT INTO user_has_day_has_program (ID_User, ID_Program, days)
                VALUES (:ID_User, :ID_Program, :days);";
    
        $statement = $this->DB->prepare($sql);
        try { 
            $result = $statement->execute([
                ':ID_User' => $calendar->getID_User(),
                ':ID_Program' => $calendar->getID_Program(),
                ':days' => $calendar->getDays(), 
            ]);
    
          
            if ($result) {
                return true;
            } else {
                return false; 
            }
        } catch (PDOException $e) {
            
            error_log("Erreur lors de l'ajout au calendrier : " . $e->getMessage());
            return false;
        }
    }
    
    public function getUserCalendarPrograms($userId) {
        try {
            $stmt = $this->DB->prepare('
                SELECT udp.ID_Program, udp.days, p.name AS program_name 
                FROM user_has_day_has_program udp
                JOIN program p ON udp.ID_Program = p.ID_Program 
                WHERE udp.ID_User = :userId
            ');
            $stmt->execute(['userId' => $userId]);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Error : " . $e->getMessage();
            return [];
        }
    }
    public function getProgramById($programId) {
        try {
            $stmt = $this->DB->prepare('SELECT * FROM user_has_day_has_program WHERE ID_Program = :programId');
            $stmt->execute(['programId' => $programId]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return null;
        }
    }

    
    
    }
    
    
    
      
 
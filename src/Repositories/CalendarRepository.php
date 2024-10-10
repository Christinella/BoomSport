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

        $sql = "INSERT INTO User_has_day_has_program (ID_User, ID_Program, days)
            VALUES (:ID_User, :ID_Program, :days,);";

        $statement = $this->DB->prepare($sql);
        try { 
        return $statement->execute([
            ':ID_User' => $calendar->getID_User(),
            ':ID_Program' => $calendar->getID_Program(),
            ':days' => $calendar->getDays()
        ]);
        } catch (PDOException $e) {
            echo "Erreur : ". $e->getMessage();
            return false;
    
      
    }
}
}
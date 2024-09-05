<?php
namespace src\Repositories;

use PDO;
use src\Models\Users;
use src\Models\Database;


class EmployeRepository {
  private $DB;

  public function __construct()
  {
    $database = new Database;
    $this->DB = $database->getDB();

    require_once __DIR__ . '/../../config.php';
  }

  // Exemple d'une requête avec query :
  // il n'y a pas de risques, car aucun paramètre venant de l'extérieur n'est demandé dans le sql.
  public function getAllUsers()
  {
    $sql = "SELECT * FROM " . PREFIXE . "Users;";

    return  $this->DB->query($sql)->fetchAll(PDO::FETCH_CLASS, Users::class);
  }

  public function getThisUserById(int $ID_User): Users {
    $sql = 'SELECT * FROM '. PREFIXE . 'Users WHERE $ID_User = :ID_User;';

    $statement = $this->DB->prepare($sql);
    $statement->bindValue(':$ID_User', $ID_User);
    $statement->execute();
    $statement->setFetchMode(PDO::FETCH_CLASS, Users::class);
    return $statement->fetch();
  }

  public function getThisUserByMail($Email): Users {
    $sql = "SELECT * FROM ".PREFIXE."Users WHERE EMAIL LIKE :EMAIL";

    $statement = $this->DB->prepare($sql);
    
    $statement->execute([':EMAIL'=> "%".$Email."%"]);
    $statement->setFetchMode(PDO::FETCH_CLASS, Users::class);
    return $statement->fetch();
  }
}
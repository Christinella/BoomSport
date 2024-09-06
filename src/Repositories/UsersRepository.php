<?php

namespace src\Repositories;

use PDO;
use PDOException;
use src\Models\Users;
use src\Models\Database;


class UsersRepository
{
  private $DB;

  public function __construct()
  {
    $database = new Database;
    $this->DB = $database->getDB();

    require_once __DIR__ . '/../../config.php';
  }

  public function createUser($pseudonym, $email, $password, $isAdmin = false)
  {
    try {

      $stmt = $this->DB->prepare('INSERT INTO users (pseudonym, email, password, isAdmin) VALUES (:pseudonym, :email, :password, :isAdmin)');
      $stmt->execute(array(
        'pseudonym' => $pseudonym,
        'email' => $email,
        'password' => password_hash($password, PASSWORD_DEFAULT),
        'isAdmin' => $isAdmin
      ));
      return true;

      echo 'Utilisateur créé avec succès!';
    } catch (PDOException $e) {
      echo "Error : " . $e->getMessage();
    }
  }
 
  public function getUserByEmail($email){
    try {
      $stmt = $this->DB->prepare('SELECT * FROM users WHERE email = :email');
      $stmt->execute(array('email' => $email));
      return $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
      echo "Error : ". $e->getMessage();
    }
  }
}

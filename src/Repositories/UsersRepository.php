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


public function createUser(Users $Users)
{
  $sql = "INSERT INTO " . "users (pseudonym, email, password, isAdmin) 
  VALUES (:pseudonym, :email, :password, :isAdmin);";

  $statement = $this->DB->prepare($sql);

  $statement->execute([
    ':pseudonym'                => $Users->getPseudonym(),
    ':email'                    => $Users->getEmail(),
    ':password'                 => $Users->getPassword(),
    ':isAdmin'                  => $Users->getisAdmin()
  ]);
  $id_users = $this->DB->lastInsertId();
  $Users->setID_User($id_users);

  return $Users;
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

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
    $sql = "INSERT INTO users (pseudonym, email, password, isAdmin) 
            VALUES (:pseudonym, :email, :password, :isAdmin);";

    $statement = $this->DB->prepare($sql);

    try {
        $statement->execute([
            ':pseudonym' => $Users->getPseudonym(),
            ':email' => $Users->getEmail(),
            ':password' => $Users->getPassword(),
            ':isAdmin' => $Users->getisAdmin()
        ]);
        
        // Récupération de l'ID de l'utilisateur nouvellement créé
        $id_users = $this->DB->lastInsertId();
        $Users->setID_User($id_users);

        return $Users;

    } catch (\PDOException $e) {
        die("Erreur lors de l'insertion dans la base de données : " . $e->getMessage());
    }
}


public function getUserById($id_user){
  try {
    $stmt = $this->DB->prepare('SELECT * FROM users WHERE id_user = :id_user');
    $stmt->execute(array('id_user' => $id_user));
    $stmt->setFetchMode(PDO::FETCH_CLASS, Users::class);
    $user = $stmt->fetch();
   
  return $user;
  } catch (PDOException $e) {
    echo "Error : ". $e->getMessage();
  }
}

public function getUserByEmail($email){
  try {
    $stmt = $this->DB->prepare('SELECT * FROM users WHERE email = :email');
    $stmt->execute(array('email' => $email));
    $stmt->setFetchMode(PDO::FETCH_CLASS, Users::class);
    $user = $stmt->fetch();
   
  return $user;
  } catch (PDOException $e) {
    echo "Error : ". $e->getMessage();
  }
}

}

<?php

namespace src\Models;


use PDO;
use PDOException;

// final class Database
// {
//     private $DB;
//     private $config;
  
//     public function __construct(){
//       $this->config = __DIR__ ."/../../config.php";
//       require_once $this->config;
//       $this->connexionDB();
//     }
    
//     private function connexionDB(){
//       try{
//         $dsn = "mysql:host=".DB_HOST.";dbname=".DB_NAME;
//         $this->DB = new PDO($dsn, DB_USER, DB_PWD);
//       }catch(PDOException $e){
//         echo "connexion à la BDD échouée :" . $e->getMessage();
//       }
//     }
//     public function getDB(): mixed
// 	{
// 		return $this->DB;
// 	}
//     // public function initializeDB(): mixed {
//     //     if($this->testIfTableFilmsExists()){
//     //       echo "La base de données semble déjà remplie.";
//     //       die;
//     //     }else {
//     //       // Télécharger le(s) fichier(s) sql d'initialisation dans la BDD
//     //       // Et effectuer les différentes migrations
//     //       try {
//     //         $i = 0;
//     //         $migrationExistante = TRUE;
//     //         while ($migrationExistante === TRUE) {
//     //           $migration = __DIR__ . "/../Migrations/migration$i.sql";
//     //           if (file_exists($migration)) {
//     //             $sql = file_get_contents($migration);
//     //             $this->DB->query($sql);
//     //             $i++;
//     //           }else {
//     //             $migrationExistante = FALSE;
//     //           }
//     //         }
//     //       $this->DB->query($sql);
//     //       $this->UpdateConfig();
    
//     //       }catch(PDOException $e){
//     //         echo "Une erreur est survenue lors de l'installation de la Base de données". $e->getMessage();
//     //       }
//     //     }
//     //   }


// }

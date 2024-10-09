<?php

namespace src\Controllers;


class HomeController
{
    // private $DB;

    // public function __construct()
    // {
    //     $database= new Database;
    //     $this->DB = $database->getDB();
    // }
    public function displayHome()
    {
            // var_dump($_SESSION);
            // die();
        include_once __DIR__ . '/../Views/home.php' ;
    }
    public function connexion()
    {
        include_once __DIR__ . '/../Views/connexion.php' ;
    }
    public function inscription()
    {
        include_once __DIR__ . '/../Views/inscription.php' ;
    }
    public function logout()
    {
        session_destroy();
       

        header('Location: '.HOME_URL.'?success=Déconnexion réussie! ') ;
    }
    public function displayApropos()
    {
        include_once __DIR__ . '/../Views/aPropos.php' ;
    }
    public function displayAllSport(){
        include_once __DIR__ . '/../Views/sport.php';
    }
}
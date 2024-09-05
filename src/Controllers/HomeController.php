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
        include_once __DIR__ . '/../Views/home.php' ;
    }
}
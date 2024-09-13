<?php

namespace src\Controllers;


class AdminController
{
    // private $DB;

    // public function __construct()
    // {
    //     $database= new Database;
    //     $this->DB = $database->getDB();
    // }
    public function displayHomeAdmin()
    {
        include_once __DIR__ . '/../Views/admin/home.php' ;
    }
    public function sport()
    {
        include_once __DIR__ . '/../Views/admin/sport.php' ;
    }
}
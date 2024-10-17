<?php

namespace src\Controllers;

use src\Models\Calendar; // Import the Program model
use src\Repositories\CalendarRepository; // Import the Calendar model class
use src\Repositories\ProgramRepository;

class CalendarController{
    public function addCalendar() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $day = $_POST['day'];
            $programId = $_POST['program'];
            $ID_User = $_SESSION['ID_User'];
    
            $calendar = new Calendar();
            $calendar->setID_User($ID_User);
            $calendar->setID_Program($programId);
            $calendar->setDays($day);
    
            $calendarRepository = new CalendarRepository();
            $result = $calendarRepository->addCalendar($calendar);
    
            if ($result) {
                $_SESSION['message'] = "Vous avez choisi le programme : <strong>" . htmlspecialchars($programId) . "</strong> pour le jour : <strong>" . htmlspecialchars($day) . "</strong>";
            
            } else {
                $_SESSION['message'] = "Erreur lors de l'ajout du programme.";
            }
            header('Location: ' . HOME_URL . 'dashboard');
            exit();
        } else {
            header('Location: ' . HOME_URL . 'createWeek'); // Remplacez par le bon chemin
            exit();
        }   
    }
    
    
}
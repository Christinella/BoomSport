<?php

namespace src\Controllers;

use src\Models\Calendar; 
use src\Repositories\CalendarRepository; 
use src\Repositories\ProgramRepository;

class CalendarController{
    public function addCalendar() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
         
            if (isset($_POST['days'], $_POST['program'])) {
                $days = $_POST['days'];
                $programId = $_POST['program'];
                $ID_User = $_SESSION['ID_User'];
                
                $calendar = new Calendar();
                $calendar->setID_User($ID_User);
                $calendar->setID_Program($programId);
                $calendar->setDays($days);
                
                
    
                $calendarRepository = new CalendarRepository();
                $result = $calendarRepository->addCalendar($calendar);
            
                if ($result) {
                    header('Location: ' . HOME_URL . 'dashboard');
                    exit();
                } else {
                 
                }
            } else {
              
                header('Location: ' . HOME_URL . 'createWeek'); 
                exit();
            }
        } else {
            header('Location: ' . HOME_URL . 'createWeek'); 
            exit();
        }   
    }
    
    
    
}
<?php

namespace src\Controllers;

use Exception;
use src\Models\Program;
use src\Models\Calendar;
use src\Repositories\ProgramRepository;
use src\Repositories\CalendarRepository;


class CalendarController {
    
    public function addCalendar() {
        try {
           
            $program = new ProgramRepository();
            $calendar = new Calendar();
            $calendar->setID_User($_SESSION['ID_User']);

            // repo->getByName('dos')
            
            $calendar->setID_Program(isset($_POST['ID_Program']) ? intval($_POST['ID_Program']) : null);


            $calendar->setDays(isset($_POST['days']) ?array($_POST['days']) : null);
            
// var_dump($_POST, $calendar);
            // Ensure required fields are provided
            if (empty($calendar->getID_User()) || empty($calendar->getID_Program()) || empty($calendar->getDays())) {
               
                throw new \Exception('Tous les champs sont obligatoires.');
            }

           

           

            // Call repository to create the program
            $calendarRepository = new CalendarRepository();
            $calendarRepository->addCalendar($calendar); // Pass the Program object to the repository

            echo json_encode(['message' => 'enregistrement réussi']);
            // Redirect on success
            // header('Location: ' . HOME_URL . 'admin/allprograms?success=Le programme a bien été ajouté.');
            exit();
        } catch (\Exception $e) {
            // Redirect on error with the error message
            http_response_code(422);
            echo json_encode(['message' =>$e->getMessage()]);
            // header('Location: ' . HOME_URL . 'admin/addprograms?error=' . urlencode($e->getMessage()));
            exit();
        }
    }

  
}


<?php

namespace src\Controllers;

use Exception;
use src\Models\Calendar;
use src\Repositories\CalendarRepository;


class CalendarController {
    private $calendarRepository;

    public function __construct(CalendarRepository $calendarRepository) {
        $this->calendarRepository = $calendarRepository;
    }


    public function addCalendar() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $userId = $_SESSION['ID_User'];
            $programId = $_POST['ID_program'];
            $day = $_POST['day']; // Assurez-vous que cela correspond à votre champ dans le formulaire

            if (!empty($userId) && !empty($programId) && !empty($day)) {
                // Créer une instance de Calendar
                $calendar = new Calendar();
                $calendar->setID_User($userId);
                $calendar->setID_Program($programId);
                $calendar->setDays($day);

                // Ajouter à la base de données
                if ($this->calendarRepository->addCalendar($calendar)) {
                    header("Location: " . HOME_URL . "createWeek?success=Programme ajouté avec succès.");
                } else {
                    header("Location: " . HOME_URL . "createWeek?error=Erreur lors de l'ajout du programme.");
                }
                exit();
            } else {
                header("Location: " . HOME_URL . "createWeek?error=Veuillez remplir tous les champs.");
                exit();
            }
        }
    }
}


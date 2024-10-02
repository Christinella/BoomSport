const modal = document.getElementById("modal");
const closeButton = document.querySelector(".close-button");
const modalDayElement = document.getElementById("modal-day");
const dayInput = document.getElementById("day");

document.querySelectorAll(".add-button").forEach(button => {
    button.addEventListener("click", (event) => {
        const day = event.target.getAttribute("data-day");
        modalDayElement.textContent = day;
        dayInput.value = day;
        modal.style.display = "block";
    });
});

closeButton.addEventListener("click", () => {
    modal.style.display = "none";
});

document.addEventListener('DOMContentLoaded', function() {
    const activityForm = document.getElementById('activity-form');
    const dayInput = document.getElementById('day');

    activityForm.addEventListener('submit', function(event) {
        event.preventDefault(); 

        // Récupération des éléments de sélection
        const sportSelect = document.getElementById('ID_sport');
        const programSelect = document.getElementById('ID_program');
        const exerciseSelect = document.getElementById('ID_Exercise');

        // Récupération des valeurs sélectionnées
        const sport = sportSelect.options[sportSelect.selectedIndex].text; // Récupère le texte de l'option sélectionnée
        const program = programSelect.options[programSelect.selectedIndex].text; // Récupère le texte de l'option sélectionnée
        const exercise = exerciseSelect.options[exerciseSelect.selectedIndex].text; // Récupère le texte de l'option sélectionnée
        const day = dayInput.value;

        // Créer une chaîne avec les informations
        const message = `Vous avez enregistré:\nJour: ${day}\nSport: ${sport}\nProgramme: ${program}\nExercice: ${exercise}`;

        // Afficher les informations
        alert(message);

        // Optionnel: Vous pouvez également masquer la modale après l'enregistrement
        document.getElementById('modal').style.display = 'none';
    });

    // Gestionnaire pour fermer la modale
    document.querySelector('.close-button').addEventListener('click', function() {
        document.getElementById('modal').style.display = 'none';
    });
});


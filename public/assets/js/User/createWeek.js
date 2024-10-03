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

        const sportSelect = document.getElementById('ID_sport');
        const programSelect = document.getElementById('ID_program');
        const exerciseSelect = document.getElementById('ID_Exercise');

        const sport = sportSelect.options[sportSelect.selectedIndex].text; 
        const program = programSelect.options[programSelect.selectedIndex].text; 
        const exercise = exerciseSelect.options[exerciseSelect.selectedIndex].text; 
        const day = dayInput.value;

        const message = `Vous avez enregistré:\nJour: ${day}\nSport: ${sport}\nProgramme: ${program}\nExercice: ${exercise}`;

        alert(message);

        document.getElementById('modal').style.display = 'none';
    });


    document.querySelector('.close-button').addEventListener('click', function() {
        document.getElementById('modal').style.display = 'none';
    });
});


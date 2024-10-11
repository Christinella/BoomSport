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

       
        const programSelect = document.getElementById('ID_program');
      
        const program = programSelect.options[programSelect.selectedIndex].text; 
        const day = dayInput.value;

        const message = `Vous avez enregistré:\nJour: ${day}\nProgramme: ${program}`;

        alert(message);
        fetch('/createWeek', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
            },
            body: "days="+day+"&ID_Program="+program
        }).then(response => {
            if (!response.ok) {
                throw new Error(`erreur de connexion serveur`);
            }
            return response.json();
        }).then(data => {
            alert(data.message);

            // Mettre à jour la liste des activités affichée dans la page
        }).catch(error => {
            alert('Erreur lors de l\'enregistrement');
        });

        document.getElementById('modal').style.display = 'none';
    });


    document.querySelector('.close-button').addEventListener('click', function() {
        document.getElementById('modal').style.display = 'none';
    });
});
document.querySelectorAll('.add-button').forEach(button => {
    button.addEventListener('click', function() {
        const day = this.getAttribute('data-day');
        document.getElementById('modal-day').textContent = day;
        document.getElementById('day').value = day;
        document.getElementById('modal').style.display = 'block';
    });
});

document.querySelector('.close-button').addEventListener('click', function() {
    document.getElementById('modal').style.display = 'none';
});




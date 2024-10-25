        document.addEventListener('DOMContentLoaded', function() {
            
            const deleteForms = document.querySelectorAll('form[action*="allsports/delete"]');
            
            deleteForms.forEach(form => {
                form.addEventListener('submit', function(e) {
                    e.preventDefault(); 
                    
                    if (confirm('Êtes-vous sûr de vouloir supprimer ce sport ?')) {
                        const formData = new FormData(this);
                        const sportId = formData.get('ID_Sport');
                        
                        fetch(this.action, {
                            method: 'POST',
                            body: formData
                        })
                        .then(response => response.json()) 
                        .then(data => {
                            if (data.success) {
                              
                                document.querySelector(`#sport-card-${sportId}`).remove();

                             
                                displayMessage(data.success, 'success');
                            } else if (data.error) {
                              $
                                displayMessage(data.error, 'danger');
                            }
                        })
                        .catch(error => {
                            console.error('Erreur:', error);
                            displayMessage("Une erreur s'est produite.", 'danger');
                        });
                    }
                });
            });

          
            function displayMessage(message, type) {
                const messageContainer = document.getElementById('message-container');
                messageContainer.innerHTML = `
                    <div class="alert alert-${type} alert-dismissible fade show" role="alert">
                        ${message}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                `;
            }
        });
       
    document.getElementById('togglePassword').addEventListener('click', function () {
        const passwordInput = document.getElementById('password');
        const eyeIcon = document.getElementById('eyeIcon');

       
        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            eyeIcon.classList.remove('fa-eye');
            eyeIcon.classList.add('fa-eye-slash');
        } else {
            passwordInput.type = 'password';
            eyeIcon.classList.remove('fa-eye-slash');
            eyeIcon.classList.add('fa-eye');
        }
    });
    feather.replace();

    document.querySelectorAll('.program-card').forEach(card => {
        card.addEventListener('mouseover', () => {
            card.style.transform = 'scale(1.05)';
        });
        card.addEventListener('mouseout', () => {
            card.style.transform = 'scale(1)';
        });
    });
    const selectedDays = [];

    document.getElementById('day').addEventListener('change', function() {
        const selectedValue = this.value;
        if (selectedValue) {
            selectedDays.push(selectedValue);
            updateDayOptions();
        }
    });
    
   
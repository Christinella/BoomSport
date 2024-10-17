        document.addEventListener('DOMContentLoaded', function() {
            // Sélectionne tous les formulaires de suppression
            const deleteForms = document.querySelectorAll('form[action*="allsports/delete"]');
            
            deleteForms.forEach(form => {
                form.addEventListener('submit', function(e) {
                    e.preventDefault(); // Empêche l'envoi traditionnel du formulaire
                    
                    if (confirm('Êtes-vous sûr de vouloir supprimer ce sport ?')) {
                        const formData = new FormData(this);
                        const sportId = formData.get('ID_Sport');
                        
                        fetch(this.action, {
                            method: 'POST',
                            body: formData
                        })
                        .then(response => response.json()) // On attend une réponse en JSON
                        .then(data => {
                            if (data.success) {
                                // Suppression réussie, on retire le sport de l'affichage
                                document.querySelector(`#sport-card-${sportId}`).remove();

                                // Afficher un message de succès
                                displayMessage(data.success, 'success');
                            } else if (data.error) {
                                // Afficher un message d'erreur
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

            // Fonction pour afficher un message
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

        // Alterner entre le type de mot de passe et le type de texte
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

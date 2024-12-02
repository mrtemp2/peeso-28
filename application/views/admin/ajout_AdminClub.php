<?php $etabs = $this->model_etablissement->getAllActiveEtabs();
    ?>
<link href="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.snow.css" rel="stylesheet" />

<div class="col-xl-9 col-lg-9 col-md-12">
    <div class="dashboard__content__wraper">
        <div class="dashboard__section__title" style="display: flex;align-items:center;justify-content:space-between;">
            <h4>Ajouter Administrateur Club</h4>
        </div>

        
        <hr class="mt-40"> 
        <div class="col-xl-12">
            <form class="form-horizontal" enctype="multipart/form-data" id="addNewsForm">
                <div class="row">
                        <div class="col-xl-12">
                            <div class="contact__input__wraper">
                                <label for="ajout_nom_fr">Nom :</label>
                                <input type="text" id="ajout_nom_fr" name="ajout_nom_fr" placeholder='nom utilisateur'>
                            </div>
                        </div>
                        <div class="col-xl-12">
                            <div class="contact__input__wraper">
                                <label for="ajout_pwd_fr">Mot de passe :</label>
                                <input type="password" id="ajout_pwd_fr" name="ajout_pwd_fr" placeholder='mot de passe'>
                            </div>
                        </div>
                        

                        
                        


                    </div>
                <div class="messages"></div>
                <center>
                <button type="submit" class="btn btn-primary">Soumettre</button>
                </center>
            </form>
        </div>
    </div>
</div>
<!-- Include the Quill library -->
<script src="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const form = document.getElementById('addNewsForm');
        const messageContainer = document.querySelector('.messages');

        // Function to display messages
        function afficherMessage(success, message) {
            const messageDiv = document.createElement('div');
            messageDiv.className = success ? 'alert alert-success' : 'alert alert-danger';
            messageDiv.textContent = message;
            messageContainer.innerHTML = ''; // Clear previous messages
            messageContainer.appendChild(messageDiv);
        }

        form.addEventListener('submit', function (event) {
            event.preventDefault();

            // Validate form fields
            const nom = document.getElementById('ajout_nom_fr').value.trim();
            const pwd = document.getElementById('ajout_pwd_fr').value.trim();

            if (!nom || !pwd ) {
                afficherMessage(false, 'Tous les champs sont obligatoires.');
                return;
            }

            // Prepare form data
            const formData = new FormData(form);

            // Send AJAX request
            $.ajax({
                url: 'Users/add_ClubUsers',
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function (data) {
                    if (data.success) {
                        afficherMessage(true, data.message);
                        if (data.redirect) {
                            window.location.href = data.redirect;
                        }
                    } else {
                        afficherMessage(false, data.message);
                    }
                },
                error: function () {
                    afficherMessage(false, 'Une erreur s\'est produite lors de la soumission.');
                }
            });
        });
    });
</script>

    
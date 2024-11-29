<link href="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.snow.css" rel="stylesheet" />

<div class="col-xl-9 col-lg-9 col-md-12">
    <div class="dashboard__content__wraper">
        <div class="dashboard__section__title" style="display: flex;align-items:center;justify-content:space-between;">
            <h4>Ajouter Actualité</h4>
        </div>

        
        <hr class="mt-40"> 
        <div class="col-xl-12">
            <form class="form-horizontal" enctype="multipart/form-data" id="addNewsForm">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="contact__input__wraper">
                            <input type="text" id="titre-fr" name="titre-fr" placeholder="Titre de l'actualité">
                        </div>
                    </div>
                    <div class="col-xl-12">
                        
                        <div class="contact__input__wraper">
                        <label class="form-control-label" for="real-file">Photo de l'actualité: </label>
                            <div style="
                                border: 0.1px solid #dddddd;
                                margin: 0 0 30px 0;
                                border-radius: 5px;
                                padding: 20px;
                            ">
                                <div class="course-thumbnail-upload-area">
                                    <div class="thumbnail-area" style="height:100px">
                                        <img id="compétiton-photo" style="max-height:100%" src="<?= base_url()."public/new/images/dashboard/05.png" ?>" alt="appel">
                                    </div>
                                    <div class="information">
                                        <span>Size: 700 X 430 Pixels</span> <br>
                                        <span>File Support: PNG, JPG, JPEG</span>
                                        <div class="input-file-type-btn">
                                            <input type="file" id="real-file" name="image"  hidden />
                                            <button type="button" class="btn btn-primary" id="custom-button">Choisir Un Fichier</button>
                                            <span id="custom-text">Aucun fichier choisit</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-12">
                        <div class="contact__input__wraper">
                            <textarea name="content-fr" id="content-fr" cols="30" rows="10" placeholder="Contenu de l'actualité"></textarea>
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
    document.addEventListener('DOMContentLoaded', function() {

        // Initialize the first Quill editor
        const quillFr = new Quill('#editor-fr', {
            placeholder: 'Ecrire Le Contenu en Français...',
            theme: 'snow'
        });

        // Initialize the second Quill editor
        // const quillEn = new Quill('#editor-en', {
        //     placeholder: 'Ecrire Le Contenu en Anglais...',
        //     theme: 'snow'
        // });

        // Get the form and message container
        const form = document.getElementById('addNewsForm');
        const messageContainer = document.getElementById('messageContainer');


        // Function to display messages
        function afficherMessage(success, message) {
            const messageDiv = document.createElement('div');
            messageDiv.className = success ? 'alert alert-success' : 'alert alert-danger';
            messageDiv.textContent = message;
            messageContainer.innerHTML = ''; // Clear previous messages
            messageContainer.appendChild(messageDiv);
        }



        form.addEventListener('submit', function(event) {

            event.preventDefault();

            // Set the content of the hidden input to the Quill editor content
            document.getElementById('content-fr').value = quillFr.root.innerHTML;
            // document.getElementById('content-en').value = quillEn.root.innerHTML;

            const formData = new FormData(form);

            // Check if the file extension is allowed before submitting the form


            fetch('news/add_news', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                afficherMessage(data.success, data.message);
                if (data.redirect) {
                    // Rediriger vers la page list_soumission
                    window.location.href = data.redirect;
                }
            })
            
            .catch(error => {
                console.error('Erreur lors de la soumission du formulaire:', error);
                afficherMessage(false, 'Une erreur s\'est produite lors de la soumission.');
            });

        });
    });

    document.addEventListener("DOMContentLoaded", function () {
        const realFileInput = document.getElementById("real-file");
        const customButton = document.getElementById("custom-button");
        const customText = document.getElementById("custom-text");

        // Open file input when custom button is clicked
        customButton.addEventListener("click", function () {
            realFileInput.click();
        });

        // Update the text when a file is selected
        realFileInput.addEventListener("change", function () {
            if (realFileInput.files.length > 0) {
                customText.textContent = realFileInput.files[0].name; // Show the selected file name
            } else {
                customText.textContent = "Aucun fichier choisi";
            }
        });
    });
</script>
    
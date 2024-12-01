<div class="col-xl-9 col-lg-9 col-md-12">
    <div class="dashboard__content__wraper">
        <div class="dashboard__section__title" style="display: flex;align-items:center;justify-content:space-between;">
            <h4>Ajouter Compétition</h4>
        </div>

        
        <hr class="mt-40"> 
        <div class="col-xl-12">
        <form class="form-horizontal" enctype="multipart/form-data" id="addComptForm">
                <div class="row">
                    <div class="col-xl-6">
                        <div class="contact__input__wraper">
                            <input type="text" name="nom" id="nom" placeholder="Nom Compétition">
                        </div>
                    </div>
                    <div class="col-xl-12">
                        
                        <div class="contact__input__wraper">
                        <label class="form-control-label" for="real-file">Photo de la compétition: </label>
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
                                        <span>Size: 700 X 430 Pixels</span>
                                        <span>File Support: PNG, JPG, JPEG</span>
                                        <div class="input-file-type-btn">
                                            <input type="file" id="real-file" name="photo"  hidden />
                                            <button type="button" class="btn btn-primary" id="custom-button">Choisir Un Fichier</button>
                                            <span id="custom-text">Aucun fichier choisit</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="contact__input__wraper">
                            <label class="form-control-label" for="date_debut">Date début: </label>
                            <input type="date" name="date_debut" id="date_debut">
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="contact__input__wraper">
                            <label class="form-control-label" for="date_fin">Date fin: </label>
                            <input type="date" name="date_fin" id="date_fin">
                        </div>
                    </div>
                    <div class="col-xl-12">
                        <div class="contact__input__wraper">
                            <textarea name="description" id="description" cols="30" rows="10" placeholder="Entrez votre description de la compétition ici"></textarea>
                        </div>
                    </div>
                </div>
                <div id ="messageContainer" class="messages"></div>
                <center>
                <button type="submit" class="btn btn-primary">Soumettre</button>
                </center>
            </form>
        </div>
    </div>
</div>
    <script>
       
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
        document.addEventListener('DOMContentLoaded', function () {
    // Initialize Quill editor
    const quillFr = new Quill('#editor-fr', {
        placeholder: 'Écrire le contenu en Français...',
        theme: 'snow'
    });

    // File selection custom button logic
    const realFileBtn = document.getElementById('real-file');
    const customBtn = document.getElementById('custom-button');
    const customTxt = document.getElementById('custom-text');

    customBtn.addEventListener('click', () => {
        realFileBtn.click();
    });

    realFileBtn.addEventListener('change', function () {
        if (this.files && this.files[0]) {
            customTxt.textContent = this.files[0].name;

            // Preview image
            const reader = new FileReader();
            reader.onload = function (e) {
                document.getElementById('compétiton-photo').src = e.target.result;
            };
            reader.readAsDataURL(this.files[0]);
        } else {
            customTxt.textContent = 'Aucun fichier choisi';
        }
    });

    // Handle form submission
    document.getElementById("addNewsForm").addEventListener("submit", function (event) {
        event.preventDefault(); // Prevent the default form submission

        // Update the hidden input with Quill content
        document.getElementById('content-fr').value = quillFr.root.innerHTML;

        const formData = new FormData(this); // Gather form data, including the file

        // Make an AJAX request using jQuery
        $.ajax({
            url: '<?= base_url() ?>news/add_newsDept', // Your endpoint to handle the request
            type: 'POST',
            data: formData,
            contentType: false,  // Don't set content type for FormData
            processData: false,  // Don't process the data
            success: function (response) {
                afficherMessage(response.success, response.message);
                if (response.success && response.redirect) {
                    window.location.href = response.redirect;
                }
            },
            error: function (xhr, status, error) {
                console.error('Erreur:', error);
                afficherMessage(false, 'Une erreur s\'est produite lors de la soumission.');
            }
        });
    });

    // Function to display messages
    function afficherMessage(success, message) {
        const messageContainer = document.getElementById("messageContainer");
        const messageDiv = document.createElement('div');
        messageDiv.className = success ? 'alert alert-success' : 'alert alert-danger';
        messageDiv.textContent = message;
        messageContainer.innerHTML = ''; // Clear previous messages
        messageContainer.appendChild(messageDiv);

        // Optional: Auto-hide message after 5 seconds
        if (success) {
            setTimeout(() => {
                messageContainer.innerHTML = '';
                // Reset form
                document.getElementById("addNewsForm").reset();
                // Clear Quill editor
                quillFr.root.innerHTML = '';
                document.getElementById('compétiton-photo').src = ''; // Clear the preview image
            }, 5000);
        }
    }
});


    

 
    </script>
    
<style>
    .select2-container--default .select2-selection--multiple {
        border: 1px solid #ddd;
        height: 60px;
    }
</style>
<div class="col-xl-9 col-lg-9 col-md-12">
    <div class="dashboard__content__wraper">
        <div class="dashboard__section__title" style="display: flex;align-items:center;justify-content:space-between;">
            <h4>Ajouter Appel À Candidature</h4>
        </div>

        
        <hr class="mt-40"> 
        <div class="col-xl-12">
            <form class="form-horizontal" action="<?= base_url() ?>appel_candidature/createNewAppelcandidatureDept" enctype="multipart/form-data" method="post" id="getAttendanceForm">
                <div class="row">
                    <div class="col-xl-6">
                        <div class="contact__input__wraper">
                            <input type="text" name="nom" id="nom" placeholder="Nom Appel à Candidature">
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="contact__input__wraper">
                            <input type="text" name="sujet" id="sujet" placeholder="Sujet Appel à Candidature">
                        </div>
                    </div>
                    <div class="col-xl-12">
                        <div class="contact__input__wraper">
                            <label class="form-control-label" for="domaine">Domaines: </label>
                            <div>
                            <select class="js-example-basic-multiple" name="domaine[]" id="domaine" multiple="multiple">
                                <?php foreach ($domaine as $value): ?>
                                    <option value="<?= $value['id'] ?>"><?= $value['nom'] ?></option>
                                <?php endforeach; ?>
                            </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-12">
                        <div class="contact__input__wraper">
                            <div style="
                                border: 0.1px solid #dddddd;
                                margin: 30px 0 30px 0;
                                border-radius: 5px;
                                padding: 20px;
                            ">
                                <div class="course-thumbnail-upload-area">
                                    <div class="thumbnail-area" style="height:100px">
                                        <img id="appel-photo" style="max-height:100%" src="<?= base_url()."public/new/images/dashboard/05.png" ?>" alt="appel">
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
                            <textarea name="description" id="description" cols="30" rows="10" placeholder="Entrez votre description de l'appel à candidature ici"></textarea>
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.js-example-basic-multiple').select2({
                width: '100%'
            });
    
        });
    </script>
    <script>
        $("#getAttendanceForm").unbind('submit').bind('submit', function(event) {
            event.preventDefault();
            $(".messages").html(''); // Clear any previous messages

            var form = $(this);
            var url = form.attr('action');
            var type = form.attr('method');
            var formData = new FormData(form[0]);

            fetch(url, {
                method: type,
                body: formData,
                cache: 'no-cache'
            })
            .then(response => response.json()) // Parse JSON response
            .then(response => {
                if (response.success) {
                    // Display success message
                    $(".messages").html(
                        '<div class="alert alert-success alert-dismissible" role="alert">' +
                        response.messages +
                        '</div>'
                    );

                    // Reset the form
                    $("#getAttendanceForm")[0].reset();
                } else {
                    // Display error or validation messages
                    $(".messages").html(
                        '<div class="alert alert-danger alert-dismissible" role="alert">' +
                        response.messages +
                        '</div>'
                    );
                }
            })
            .catch(error => {
                console.error("Error submitting the form:", error);
                $(".messages").html(
                    '<div class="alert alert-danger alert-dismissible" role="alert">' +
                    'Une erreur est survenue lors de la soumission' +
                    '</div>'
                );
            });

            return false;
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
    
<style>
    .modal{
        --bs-modal-width: 800px !important;
    }
    .select2-container--default .select2-selection--multiple {
        border: 1px solid #ddd;
        height: 60px;
    }
</style>
<div class="col-xl-9 col-lg-9 col-md-12">
                            <div class="dashboard__content__wraper">
                                <div class="dashboard__section__title" style="display: flex;align-items:center;justify-content:space-between;">
                                    <h4>Liste Des Appels À Candidature</h4>
                                    <a class="default__button" href="<?= base_url('appel_a_candidature') ?>">Ajouter Un Appel</a>
                                </div>

                                
                                <hr class="mt-40">
                              <div class="row">
                                
                                <div class="col-xl-12">
                                    <div class="dashboard__table table-responsive">
                                        <table id="manageModuleTable">
                                            <thead>
                                                <tr>
                                                    <th>Appel à Candidature</th>
                                                   
                                                    <th>Date début d'inscription</th>
                                                    <th>Date fin d'inscription</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                      </table>
                                    </div>
                                </div>
                              </div>
                            </div>

                    
                        </div>

    <div class="modal fade" id="updateSubjectModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog login-page-form-area" role="document">
            <div class="modal-content" style="border:none !important;">
                <div class="modal-header" style="border-bottom:none !important;">
                <h5 class="modal-title" id="exampleModalLabel">Modifier Appel à candidature</h5>
            
                </div>
                <div class="modal-body">
                <form id="updateAppelForm" enctype="multipart/form-data">
                    <div class="row">
                    <div class="col-xl-6">
                        <div class="contact__input__wraper">
                            <label class="form-control-label" for="editnom">Nom: </label>
                            <input type="text" name="editnom" id="editnom" placeholder="Nom Appel">
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="contact__input__wraper">
                            <label class="form-control-label" for="editsujet">Sujet: </label>
                            <input type="text" name="editsujet" id="editsujet" placeholder="Nom Appel">
                        </div>
                    </div>
                    <div class="col-xl-12">
                        <div class="contact__input__wraper">
                            <label class="form-control-label" for="editdomaine">Domaines: </label>
                            <div>
                                <select class="js-example-basic-multiple" name="editdomaine[]" id="editdomaine" multiple="multiple">
                                    <?php foreach ($domaines as $domaine): ?>
                                        <option value="<?= $domaine->id ?>"
                                            <?= in_array($domaine->id, $appel_domaines) ? 'selected' : '' ?>>
                                            <?= $domaine->name ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-12">
                        <div class="contact__input__wraper">
                            <div style="
                                border: 0.1px solid #6cd6fa;
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
                                            <input type="file" id="editphoto" name="editphoto"  hidden />
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
                            <label class="form-control-label" for="editdate_debut">Date début: </label>
                            <input type="date" name="editdate_debut" id="editdate_debut" placeholder="Nom Appel">
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="contact__input__wraper">
                            <label class="form-control-label" for="editdate_fin">Date fin: </label>
                            <input type="date" name="editdate_fin" id="editdate_fin" placeholder="Nom Appel">
                        </div>
                    </div>
                    <div class="col-xl-12">
                        <div class="contact__input__wraper">
                        <label class="form-control-label" for="editdescription">Description: </label>
                            <textarea name="editdescription" id="editdescription" cols="30" rows="10" placeholder="Entrez votre message ici*"></textarea>
                        </div>
                    </div>


                    </div>
                    <div id="add-module-messages_update"></div>
                    <center> <button type="submit" class="btn btn-primary">Modifier</button></center>
                </form>
                </div>
                <div class="modal-footer">
                <button type="button" style="color: white;" class="btn btn-secondary tx-11 tx-uppercase pd-y-12 pd-x-25 tx-mont tx-medium mg-b-20" data-bs-dismiss="modal" aria-label="Close">Fermer</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal login-pupup-modal fade" id="exampleModal-login" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" style="transform: none;">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" style="transform: none;">
                    <div class="blog-listing-content">
                            <div class="user-info" style="
                                    display: flex;
                                    align-items: center;
                                    margin-bottom: 15px;
                                    flex-wrap: wrap;
                                    ">
                                <!-- single info -->
                                <!-- single infoe end -->
                                <!-- single info -->
                                <!-- <div class="single">
                                    <i class="far fa-clock"></i>
                                    <span>Date début : </span><span id="date_debut"></span>
                                </div> -->
                                <div class="single">
                                    <i class="far fa-clock"></i>
                                    <span>Date fin : </span><span id="date_fin"></span> <span> à 23:59:59</span>
                                </div>
                                <!-- single infoe end -->
                                <!-- single info -->
                                
                                <!-- single infoe end -->
                            </div>
                            <div class="thumbnail" style="display:flex;justify-content: center;;height:100%;">
                                <img id="photo" alt="appel_image" style="height: 200px;  max-width: 100%;max-height: 100%;object-fit: cover;">
                            </div>
                            <h3 class="title animated fadeIn" id="nom" style="text-align:center;"></h3>
                            
                            <p style="text-align:center">
                                <label for="domaines">Domaine : </label>&nbsp; <span id="domaines" style="text-align:center"></span>
                            </p>
                            <p style="text-align:center">
                                <label for="sujet">Sujet : </label>&nbsp;<span class="disc" id="sujet"></span>
                            </p>
                           <p class="disc" id="description" style="text-align:center">
                                 
                            </p>
                            <!-- quote area start -->
                            
                            <!-- quote area end -->

                        </div>
                        
                </div>
                <div class="modal-footer">
                </div>
            </div>
        </div>
    </div>


 <script>
             var manageModuleTable;
    
window.addEventListener('load',function() {

   
    manageModuleTable = $("#manageModuleTable").DataTable({
        columns: [{ width: '25%' },{ width: '25%' }, { width: '25%' },{ width: '25%' }],
        'ajax': 'appel_candidature/getAppelcandidature',
        "bLengthChange" : false, //thought this line could hide the LengthMenu
        "bInfo":false,  
       
        dom: 
            "<'row'<'col-sm-12 col-md-6'l>>" +
            "<'calender-and-tab-btn-between'<'nav nav-tabs'B><''f>>" +
            "<'row'<'col-sm-12'tr>>" +
            "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
                language: {
            searchPlaceholder: 'Recherche...',
            sSearch: '',
            Processing: "Traitement en cours...",
            sLengthMenu: "Afficher _MENU_ éléments",
            sInfo: "Affichage de l'élément _START_ à _END_ sur _TOTAL_ éléments",
            sInfoEmpty: "Affichage de l'élément 0 à 0 sur 0 élément",
            sInfoFiltered: "(filtré de _MAX_ éléments au total)",
            sInfoPostFix: "",
            sLoadingRecords: "Chargement en cours...",
            sZeroRecords: "Aucun élément à afficher",
            sEmptyTable: "Aucune donnée disponible dans le tableau",
            oPaginate: {
                "sFirst": "<i class='icofont-double-right'></i>",
                "sPrevious": "<i class='icofont-rounded-left'></i>",
                "sNext": "<i class='icofont-rounded-right'></i>",
                "sLast": "<i class='icofont-double-left'></i>"
            },
            
            oAria: {
                "sSortAscending": ": activer pour trier la colonne par ordre croissant",
                "sSortDescending": ": activer pour trier la colonne par ordre décroissant"
            },
          
        }
    });
});
    function updateSubject(module_id = null) {
        let allDomaines = <?php echo json_encode($domaine); ?>; // Encode the PHP array to JSON

        // Show the modal
        $("#updateSubjectModal").modal('show');
        $("#add-module-messages_update").html("");

        // Fetch the data of the subject (appel)
        fetch(`appel_candidature/getAppels/${module_id}`, {
            method: 'POST'
        })
        .then(response => response.json())
        .then(jsonObject => {
            if (jsonObject.success === true) {
                const appel = jsonObject.data;

                $('#editnom').val(appel.nom);
                $('#editsujet').val(appel.sujet);
                $('#appel-photo').attr('src', appel.photo ? appel.photo : '<?= base_url()."public/new/images/dashboard/05.png" ?>');
                $('#editdate_debut').val(appel.date_debut);
                $('#editdate_fin').val(appel.date_fin);
                $('#editdescription').val(appel.description);
                 // Clear and populate the select2 with all available domaines
                 $('#editdomaine').empty();
                allDomaines.forEach(function(domaine) {
                    let newOption = new Option(domaine.nom, domaine.id, false, false);
                    $('#editdomaine').append(newOption).trigger('change');
                });

                // Populate the select2 for domaines
                const selectedDomaines = appel.domaines; // Assuming this is an array of domaine IDs
                $('#editdomaine').val(selectedDomaines).trigger('change'); // Set selected values and trigger update
                console.log('selected domaines',selectedDomaines)
                // Initialize select2 if it's not initialized already
                $('.js-example-basic-multiple').select2({
                    dropdownParent: $('#updateSubjectModal'),
                    width: '100%'
                });
            } else {
                $("#add-module-messages_update").html(`
                    <div class="alert alert-warning alert-dismissible" role="alert">
                        ${jsonObject.message}
                    </div>
                `);
            }
        })
        .catch(error => console.error('Error fetching data:', error));

        // Handle form submission
        $("#updateAppelForm").unbind('submit').bind('submit', function(event) {
            event.preventDefault();

            const form = this;
            const formData = new FormData(form); // Collect the form data, including the file

            fetch(`appel_candidature/updateAppelData/${module_id}`, {
                method: 'POST',
                body: formData,  // Use FormData for proper file handling
            })
            .then(response => response.json())
            .then(response => {
                if (response.success === true) {
                    $("#add-module-messages_update").html(`
                        <div class="alert alert-success alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            ${response.messages}
                        </div>
                    `);
                    manageModuleTable.ajax.reload(null, false);
                    $("#updateAppelForm")[0].reset();
                } else {
                    $("#add-module-messages_update").html(`
                        <div class="alert alert-danger alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            ${response.messages}
                        </div>
                    `);
                }
            })
            .catch(error => {
                console.error('Error submitting form:', error);
            });
        });
    }

    function ViewSubject(appel_id) {
        // Show the modal
        $("#exampleModal-login").modal('show');

        // Fetch data using fetch API
        fetch(`appel_candidature/getAppels/${appel_id}`, {
            method: 'GET',
            cache: 'no-cache',
        })
        .then(response => response.json()) // Parse the response as JSON
        .then(data => {
            if (data.success) {
                const {nom, sujet, date_debut, date_fin, domaines_names, description,photo } = data.data;
                console.log(data)
                // Set the button's onclick to pass the ID correctly
                // $('#updateDomaineBtn').attr('onclick', `updateDomaine(${appel_id})`);
                
                // Update the HTML elements with the retrieved data
                $('#nom').html(nom);
                $('#sujet').html(sujet);
                $('#date_debut').html(date_debut);
                $('#date_fin').html(date_fin);
                $('#domaines').html(domaines_names);
                $('#description').html(description);
                $('#photo').attr('src',photo)
            }

            // Reload the DataTable
            manageModuleTable.ajax.reload(null, false);
        })
        .catch(error => {
            console.error("Error fetching data: ", error);
        });
    }

    document.addEventListener("DOMContentLoaded", function () {
        const realFileInput = document.getElementById("editphoto");
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
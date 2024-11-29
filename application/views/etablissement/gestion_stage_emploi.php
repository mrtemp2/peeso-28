<style>
    .modal{
        --bs-modal-width: 800px !important;
    }
</style>
<div class="col-xl-9 col-lg-9 col-md-12">
                            <div class="dashboard__content__wraper">
                                <div class="dashboard__section__title" style="display: flex;align-items:center;justify-content:space-between;">
                                    <h4>Liste des offres de stage & emploi</h4>
                                    <button class="default__button" style="margin-bottom: 20px;" data-toggle="modal" data-target="#addOffre" id="addOffreModelBtn" > Ajouter Une Offre </button>                                </div>

                                
                                <hr class="mt-40">
                              <div class="row">
                                <select id="offerTypeFilter" class="form-control">
                                    <option value="">Filtrez par types d'offre(emploi / stage / PFE)</option>
                                    <option value="stage">Stage</option>
                                    <option value="emploi">Emploi</option>
                                    <option value="PFE">PFE</option>
                                </select>
                                <div class="col-xl-12">
                                    <div class="dashboard__table table-responsive">
                                        <table id="manageModuleTable">
                                            <thead>
                                                <tr>
                                                    <th>Entreprise</th>
                                                    <th>Titre</th>
                                                    <th>Adresse</th>
                                                    <th>Date Publication</th>
                                                    <th>Plus de Fonctionnalités</th>
                                                </tr>
                                            </thead>
                                      </table>
                                    </div>
                                </div>
                              </div>
                            </div>

                    
                        </div>

        <!-- add modal start -->
        <div id="addOffre" class="modal fade">
            <div class="modal-dialog modal-lg login-page-form-area" role="document">
              <div class="modal-content bd-0 tx-14" style="border:none !important;">
              
                
                <div class="modal-header pd-y-20 pd-x-25" style="border-bottom:none !important;">
                  <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Ajouter une Offre</h6>
                  
                </div>
               
                  <form method="post" id="createOffreForm" action="emploiStage/createOffre" enctype="multipart/form-data" accept-charset="utf-8">
                 
                      <div class="row" style="margin:auto;">
                        <div class="col-xl-12">
                            <div class="contact__input__wraper">
                                <label for="titre">Titre de l'Offre : </label>
                                <input type="text" id="titre" name="titre"  placeholder="titre">
                            </div>
                            <div class="form-error" id="titre-error"> </div>
                        </div>
                        <div class="col-xl-12">
                            <div class="contact__input__wraper">
                                <label for="type">Type de l'Offre : </label>
                                <select name="type" id="type">
                                    <option value="stage">Offre de Stage</option>
                                    <option value="emploi">Offre d'Emploi</option>
                                    <option value="PFE">Offre de PFE</option>
                                </select>
                            </div>
                            <div class="form-error" id="type-error"> </div>
                        </div>
                        <div class="col-xl-12">
                            <div class="contact__input__wraper">
                                <label for="entreprise">Entreprise : </label>
                                <input type="text" id="entreprise" name="entreprise"  placeholder="entreprise">
                            </div>
                            <div class="form-error" id="entreprise-error"> </div>
                        </div>
                        <div class="col-xl-12">
                            <div class="contact__input__wraper">
                                <label for="adresse">Adresse : </label>
                                <input type="text" id="adresse" name="adresse"  placeholder="adresse">
                            </div>
                            <div class="form-error" id="adresse-error"> </div>
                        </div>
                        <div class="col-xl-12">
                            <div class="contact__input__wraper">
                                <label for="description">Description : </label>
                                <input type="text" id="description" name="description"  placeholder="description">
                            </div>
                            <div class="form-error" id="description-error"> </div>
                        </div>
                          
                      </div>
                        <center><button class="btn btn-primary" style="margin:15px;">Sauvegarder</button></center>
                      
                  </form> 
                  <div id="messages_add"></div>
                <div class="modal-footer">
                  <button type="button" class="btn  btn-secondary tx-11 tx-uppercase pd-y-12 pd-x-25 tx-mont tx-medium mg-b-20" data-bs-dismiss="modal" aria-label="Close">Fermer</button>
                </div>
              </div>
            </div>
          </div>
        <!-- add modal end -->

                <!-- update modal start -->
    <div class="modal fade" id="updateSubjectModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog login-page-form-area" role="document">
            <div class="modal-content" style="border:none !important;">
                <div class="modal-header" style="border-bottom:none !important;">
                <h5 class="modal-title" id="exampleModalLabel">Modifier l'Offre</h5>
            
                </div>
                <div class="modal-body">
                <form action="emploiStage/updateOffreData" method="post" id="updateOffreForm" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="contact__input__wraper">
                                <label for="edit_titre">Titre de l'Offre : </label>
                                <input type="text" id="edit_titre" name="edit_titre"  placeholder="titre">
                            </div>
                            <div class="form-error" id="edit_titre-error"> </div>
                        </div>
                        <div class="col-xl-12">
                            <div class="contact__input__wraper">
                                <label for="edit_type">Type de l'Offre : </label>
                                <select name="edit_type" id="edit_type">
                                    <option value="stage">Offre de Stage</option>
                                    <option value="emploi">Offre d'Emploi</option>
                                    <option value="PFE">Offre de PFE</option>
                                </select>
                            </div>
                            <div class="form-error" id="edit_type-error"> </div>
                        </div>
                        <div class="col-xl-12">
                            <div class="contact__input__wraper">
                                <label for="edit_entreprise">Entreprise : </label>
                                <input type="text" id="edit_entreprise" name="edit_entreprise"  placeholder="entreprise">
                            </div>
                            <div class="form-error" id="edit_entreprise-error"> </div>
                        </div>
                        <div class="col-xl-12">
                            <div class="contact__input__wraper">
                                <label for="edit_adresse">Adresse : </label>
                                <input type="text" id="edit_adresse" name="edit_adresse"  placeholder="adresse">
                            </div>
                            <div class="form-error" id="edit_adresse-error"> </div>
                        </div>
                        <div class="col-xl-12">
                            <div class="contact__input__wraper">
                                <label for="edit_description">Description : </label>
                                <input type="text" id="edit_description" name="edit_description"  placeholder="description">
                            </div>
                            <div class="form-error" id="edit_description-error"> </div>
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
    <!-- update modal end -->

    <!-- delete modal start -->
    <div id="removeSubjectModal" class="modal fade">
        <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content tx-size-sm">
            <div class="modal-body tx-center pd-y-20 pd-x-20">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <div id="messages"></div>
            <i class="icon icon ion-ios-close-outline tx-100 tx-danger lh-1 mg-t-20 d-inline-block"></i>
            <h4 class="tx-danger  tx-semibold mg-b-20">Supprimer l'Offre</h4>
            <p class="mg-b-20 mg-x-20">Voulez-vous vraiment supprimer ?</p>
            </div>
            <div class="modal-footer">
            <button type="submit" class="btn btn-danger tx-11 tx-uppercase pd-y-12 pd-x-25 tx-mont tx-medium mg-b-20" id="removeSubjectBtn">
                Supprimer</button>
            <button type="button" class="btn  btn-secondary tx-11 tx-uppercase pd-y-12 pd-x-25 tx-mont tx-medium mg-b-20" data-bs-dismiss="modal" aria-label="Close">Fermer</button>
            </div>
        </div>
        </div>
    </div>
    <!-- delete modal end -->
    
    <!-- view modal start -->
    <div class="modal login-pupup-modal fade" id="ViewSubjectModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" style="transform: none; width: 850px;">
                <div class="modal-header">
                    
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" style="transform: none;">  
                    <div id="result1"></div>
                        <div class="modal-footer">
                            <button type="button" style="color:white;" class="btn  btn-secondary tx-11 tx-uppercase pd-y-12 pd-x-25 tx-mont tx-medium mg-b-20" data-bs-dismiss="modal" aria-label="Close">Fermer</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- view modal end -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
             var manageModuleTable;
    
window.addEventListener('load',function() {

   
    manageModuleTable = $("#manageModuleTable").DataTable({
        columns: [{ width: '20%' },{ width: '20%' },{ width: '20%' },{ width: '20%' },{ width: '20%' }],
        'ajax': {
            'url':'emploiStage/fetchOffreData',
            'data':function(d){
                d.offre_type = $('#offerTypeFilter').val();
            }
        },
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

    $('#offerTypeFilter').on('change', function() {
        manageModuleTable.ajax.reload();
    });
});
$("#addOffreModelBtn").on('click', function() {
            $("#addOffre").modal('show');
            $("#createOffreForm")[0].reset();
        $(".form-group").removeClass('has-error').removeClass('has-success');
        $("#messages_add").html('');
        $('.text-danger').remove();
        $("#createOffreForm").unbind("submit").bind("submit", function (event) {
                event.preventDefault();
                var form = $(this)[0];
                var formData = new FormData(form); // Collect form data, including files
                var url = $(this).attr("action");
                var type = $(this).attr("method");

                $.ajax({
                    url: url,
                    type: type,
                    data: formData,
                    processData: false, // Do not process data
                    contentType: false, // Do not set content type, let the browser set it
                    dataType: "json",
                    success: function (response) {
                        console.log(response); // Check the response data
                        if (response.success === true) {
                            $("#messages_add").html(
                                '<div class="alert alert-success alert-dismissible" role="alert">' +
                                    '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' +
                                    response.messages +
                                    "</div>"
                            );
                            manageModuleTable.ajax.reload(null, false);
                            $("#createOffreForm")[0].reset();
                            $(".form-group").removeClass("has-error").removeClass("has-success");
                            $(".text-danger").remove();
                        } else {
                            document.querySelectorAll(".form-error").forEach((s) => {
                                s.innerHTML = "";
                            });
                            $.each(response.messages, function (index, value) {
                                if (value.length > 0) {
                                    console.log(value);
                                    let key = document.querySelector(`#${index}-error`);
                                    key.innerHTML = value;
                                }
                            });
                        }
                    },
                });
            });
            // /create class form submit
        }); 

        function ViewSubject(module_id = null) {
            // Show the modal
            $("#ViewSubjectModal").modal('show');

            // Use fetch instead of $.post to get the data
            fetch(`emploiStage/getOffre/${module_id}`, {
                method: 'POST'
            })
            .then(response => response.json()) // Parse the JSON response
            .then(jsonObject => {
                // Build the result HTML string
                let result = "<h6 style='color:#40a4dd; text-align: center;'>Informations de l'Offre</h6>";
                result += "<br><br>";
                result += `<table id="datatable-buttons" class="table table-striped dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">`;

                if (jsonObject.titre) {
                    result += `<tr class="sonata-ba-view-container"><th style="color:#E91E63">Titre :</th><td>${jsonObject.titre}</td></tr>`;
                }
                if (jsonObject.type) {
                    result += `<tr class="sonata-ba-view-container"><th style="color:#E91E63">Type de l'Offre :</th><td>${jsonObject.type}</td></tr>`;
                }
                if (jsonObject.entreprise) {
                    result += `<tr class="sonata-ba-view-container"><th style="color:#E91E63">Entreprise :</th><td>${jsonObject.entreprise}</td></tr>`;
                }
                if (jsonObject.date_publication) {
                    result += `<tr class="sonata-ba-view-container"><th style="color:#E91E63">Date Publication :</th><td>${jsonObject.date_publication}</td></tr>`;
                }
                if (jsonObject.adresse) {
                    result += `<tr class="sonata-ba-view-container"><th style="color:#E91E63">Adresse :</th><td>${jsonObject.adresse}</td></tr>`;
                }
                if (jsonObject.description) {
                    result += `<tr class="sonata-ba-view-container"><th style="color:#E91E63">Description :</th><td>${jsonObject.description}</td></tr>`;
                }
                // Close the table tag
                result += "</table>";

                // Insert the result HTML into the #result1 element
                $("#result1").html(result);
            })
            .catch(error => {
                console.error("Error fetching tuteur data:", error);
                // Optionally, display an error message
                $("#result1").html("<p style='color:red;'>Erreur lors de la récupération des données.</p>");
            });
        }

        function removeSubject(subjectId = null) {
            // Clear previous messages and show the modal
            $("#messages").html('');
            $("#removeSubjectModal").modal('show');

            if (subjectId) {
                // Unbind any previous click events to avoid multiple bindings
                $("#removeSubjectBtn").unbind('click').bind('click', function() {
                    // Use fetch instead of $.ajax to send the request
                    fetch(`emploiStage/removeOffre/${subjectId}`, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json'
                        }
                    })
                    .then(response => response.json()) // Parse the JSON response
                    .then(response => {
                        if (response.success === true) {
                            // Display success message
                            $("#messages").html(`
                                <div class="alert alert-success alert-dismissible" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    ${response.messages}
                                </div>
                            `);
                            // Reload the DataTable without refreshing the page
                            manageModuleTable.ajax.reload(null, false);
                        } else {
                            // Display warning message
                            $("#remove-messages").html(`
                                <div class="alert alert-warning alert-dismissible" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    ${response.messages}
                                </div>
                            `);
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        // Optionally handle the error case here
                    });
                    return false;
                });
            }
        }


        function updateSubject(module_id = null) {
    // Show the modal
    $("#updateSubjectModal").modal("show");
    $("#add-module-messages_update").html("");

    // Fetch the data of the subject (tuteur)
    fetch(`emploiStage/getOffre/${module_id}`, {
        method: "POST",
    })
        .then((response) => response.json()) // Parse JSON response
        .then((jsonObject) => {
            // Populate the form fields with the fetched data
            $("#edit_titre").val(jsonObject.titre);
            $('#edit_entreprise').val(jsonObject.entreprise);
            $('#edit_adresse').val(jsonObject.adresse);
            $('#edit_description').val(jsonObject.description);
            $('#edit_type').val(jsonObject.type);
        })
        .catch((error) => console.error("Error fetching data:", error));

    // Handle form submission
    $("#updateOffreForm")
        .unbind("submit")
        .bind("submit", function (event) {
            event.preventDefault(); // Prevent default form submission

            const form = $(this);
            const url = form.attr("action");
            const formData = new FormData(this); // Create FormData to handle file upload

            console.log(`${url}/${module_id}`);

            // Use fetch to submit the form data
            fetch(`${url}/${module_id}`, {
                method: "POST", // Using POST to include form data
                body: formData, // Pass FormData directly
            })
                .then((response) => response.json()) // Parse JSON response
                .then((response) => {
                    if (response.success === true) {
                        // Display success message
                        $("#add-module-messages_update").html(`
                            <div class="alert alert-success alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                ${response.messages}
                            </div>
                        `);
                        // Reload the DataTable and reset the form
                        manageModuleTable.ajax.reload(null, false);
                        $("#updateOffreForm")[0].reset();
                        $(".form-group").removeClass("has-error has-success");
                        $(".text-danger").remove();
                    } else {
                        // Handle form validation errors
                        console.log("Form submission failed:", response);
                        document
                            .querySelectorAll(".form-error")
                            .forEach((s) => (s.innerHTML = ""));
                        $.each(response.messages, function (index, value) {
                            if (value.length > 0) {
                                let key = document.querySelector(
                                    `#${index}-error`
                                );
                                key.innerHTML = value;
                            }
                        });
                    }
                })
                .catch((error) => {
                    console.error("Error submitting form:", error);
                });

            return false;
        });
}

  
 </script>                       
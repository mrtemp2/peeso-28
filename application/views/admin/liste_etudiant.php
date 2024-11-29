
<div class="col-xl-9 col-lg-9 col-md-12">
                            <div class="dashboard__content__wraper">
                                <div class="dashboard__section__title" style="display: flex;align-items:center;justify-content:space-between;">
                                    <h4>Liste Des Étudiants/Diplômés</h4>
                                </div>

                                
                                <hr class="mt-40">
                              <div class="row">
                                
                                <div class="col-xl-12">
                                    <div class="dashboard__table table-responsive">
                                        <table id="manageModuleTable">
                                            <thead>
                                                <tr>
                                                    <th>Nom et Prénom</th>
                                                    <th>Email</th>
                                                    <th>Plus de Foncionnalités</th>
                                                </tr>
                                            </thead>
                                      </table>
                                    </div>
                                </div>
                              </div>
                            </div>

                    
                        </div>
 
    <!-- update modal start -->
    <div id="updateSubjectModal" class="modal fade">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content bd-0 tx-14 loginarea__wraper" style="border:none !important;">
            <div class="modal-header login__heading">
                <h5 class="login__title">Modifier Étudiant/Diplômé</h5>
            </div>
            <form action="fiche_etudiant/updateEtudiantData" method="post" id="updateEtudiantForm" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-xl-6">
                        <div class="login__form">
                            <label  class="form__label" for="editnom">Nom: </label>
                            <input class="common__login__input" type="text"  name="editnom" id="editnom">
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="login__form">
                            <label  class="form__label" for="editprenom">Prénom: </label>
                            <input class="common__login__input" type="text"  name="editprenom" id="editprenom">
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="login__form">
                            <label  class="form__label" for="editcin">Cin: </label>
                            <input class="common__login__input" type="number" name="editcin" id="editcin" maxlength="8">
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="login__form">
                            <label  class="form__label" for="editphone">Téléphone: </label>
                            <input class="common__login__input" type="number" name="editphone" id="editphone" maxlength="8">
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="login__form">
                            <label  class="form__label" for="editemail">Email: </label>
                            <input class="common__login__input" type="email"  name="editemail" id="editemail">
                        </div>
                    </div>
                    
                    <div class="col-xl-6">
                        <div class="login__form">
                            <label  class="form__label" for="editville">Ville: </label>
                            <input class="common__login__input" type="text" class="form-control" id="editville" name="editville">
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="login__form">
                            <label  class="form__label" for="editadresse">Adresse: </label>
                            <input class="common__login__input" type="text" class="form-control" id="editadresse" name="editadresse">
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="login__form">
                        <label  class="form__label" for="editcodepostal">Code postale: </label>
                        <input class="common__login__input" type="text" class="form-control" id="editcodepostal" name="editcodepostal">
                        </div>
                    </div>
                    <div class="col-xl-12">
                        <div class="login__form">
                            <label  class="form__label" for="editetab">Établissement : </label>
                            <select id="editetab" name="editetab">
                                <?php foreach($etablissements as $etab){ ?>
                                    <option value="<?= $etab['id']?>"><?= $etab['nom']?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="login__form">
                            <label  class="form__label" for="editniveau">Niveau: </label>
                            <input class="common__login__input" type="text" class="form-control" id="editniveau" name="editniveau">
                        </div>
                    </div>

                    <div class="col-xl-12">
                        <div class="login__form">
                            <label  class="form__label" for="editusername">Username :</label>
                            <input class="common__login__input" type="text" id="editusername" name="editusername">
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="login__form">
                            <label   class="form__label" for="editpassword">Mot de passe : </label>
                            <input class="common__login__input" type="text" name="editpassword" id="editpassword" required>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="login__form">
                            <label   class="form__label" for="editconfirmpassword">Confirmez le mot de passe : </label>
                            <input class="common__login__input" type="text"  name="editconfirmpassword" id="editconfirmpassword">
                        </div>
                    </div>
                </div>
                <div class="login__button" style="margin-bottom: 10px;">
                <div id="add-module-messages_update"></div>
                <center> <button type="submit" class="btn btn-primary">Modifier</button></center>
                </div>
            </form> 
            <div class="modal-footer">
                <button type="button" style="color: white;" class="btn btn-secondary tx-11 tx-uppercase pd-y-12 pd-x-25 tx-mont tx-medium mg-b-20" data-bs-dismiss="modal" aria-label="Close">Fermer</button>
            </div>
        </div>
      </div>
    </div>
    <!-- update modal end -->

    <!-- remove modal start -->
    <div id="removeSubjectModal" class="modal fade">
        <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content tx-size-sm">
            <div class="modal-body tx-center pd-y-20 pd-x-20">
            <div id="messages"></div>
            <i class="icon icon ion-ios-close-outline tx-100 tx-danger lh-1 mg-t-20 d-inline-block"></i>
            <h4 class="tx-danger  tx-semibold mg-b-20">Supprimer compte</h4>
            <p class="mg-b-20 mg-x-20">Voulez-vous vraiment supprimer ?</p>
            </div>
            <div class="modal-footer">
            <button type="submit" class="btn btn-danger tx-11 tx-uppercase pd-y-12 pd-x-25 tx-mont tx-medium mg-b-20" id="removeSubjectBtn">
                Supprimer</button>
            <button type="button" class="btn btn-secondary tx-11 tx-uppercase pd-y-12 pd-x-25 tx-mont tx-medium mg-b-20" data-bs-dismiss="modal" aria-label="Close">Fermer</button>
            </div>
        </div>
        </div>
    </div>
    <!-- remove modal end -->
     
    <!-- view modal start -->
    <div class="modal login-pupup-modal fade" id="ViewSubjectModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" style="transform: none; width: 850px;">
                <div class="modal-header">
                    
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


 <script>
             var manageModuleTable;
    
window.addEventListener('load',function() {

    manageModuleTable = $("#manageModuleTable").DataTable({
        columns: [{ width: '30%' },{ width: '40%' }, { width: '30%' }],
        'ajax': 'fiche_etudiant/fetchEtudiantData',
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

function ViewSubject(module_id = null) {
            // Show the modal
            $("#ViewSubjectModal").modal('show');

            // Use fetch instead of $.post to get the data
            fetch(`fiche_etudiant/getEtudiant/${module_id}`, {
                method: 'POST'
            })
            .then(response => response.json()) // Parse the JSON response
            .then(jsonObject => {
                // Build the result HTML string
                let result = "<h6 style='color:#40a4dd; text-align: center;'>Informations de l'Étudiant Entrepreneur</h6>";
                result += "<br><br>";
                result += `<table id="datatable-buttons" class="table table-striped dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">`;

                if (jsonObject.nom) {
                    result += `<tr class="sonata-ba-view-container"><th style="color:#E91E63">Nom :</th><td>${jsonObject.nom}</td></tr>`;
                }
                if (jsonObject.prenom) {
                    result += `<tr class="sonata-ba-view-container"><th style="color:#E91E63">Prénom :</th><td>${jsonObject.prenom}</td></tr>`;
                }
                if (jsonObject.cin) {
                    result += `<tr class="sonata-ba-view-container"><th style="color:#E91E63">Cin :</th><td>${jsonObject.cin}</td></tr>`;
                }
                if (jsonObject.phone) {
                    result += `<tr class="sonata-ba-view-container"><th style="color:#E91E63">Téléphone :</th><td>${jsonObject.phone}</td></tr>`;
                }
                if (jsonObject.email) {
                    result += `<tr class="sonata-ba-view-container"><th style="color:#E91E63">Email :</th><td>${jsonObject.email}</td></tr>`;
                }
                if (jsonObject.ville) {
                    result += `<tr class="sonata-ba-view-container"><th style="color:#E91E63">Ville :</th><td>${jsonObject.ville}</td></tr>`;
                }
                if (jsonObject.adresse) {
                    result += `<tr class="sonata-ba-view-container"><th style="color:#E91E63">Adresse :</th><td>${jsonObject.adresse}</td></tr>`;
                }
                if (jsonObject.code_postal) {
                    result += `<tr class="sonata-ba-view-container"><th style="color:#E91E63">Code postal :</th><td>${jsonObject.code_postal}</td></tr>`;
                }
                if (jsonObject.nom_etab) {
                    result += `<tr class="sonata-ba-view-container"><th style="color:#E91E63">établissement :</th><td>${jsonObject.nom_etab}</td></tr>`;
                }
                if (jsonObject.niveau) {
                    result += `<tr class="sonata-ba-view-container"><th style="color:#E91E63">Niveau :</th><td>${jsonObject.niveau}</td></tr>`;
                }
                if (jsonObject.username) {
                    result += `<tr class="sonata-ba-view-container"><th style="color:#E91E63">Nom d'utilisateur :</th><td>${jsonObject.username}</td></tr>`;
                }
                if (jsonObject.password) {
                    result += `<tr class="sonata-ba-view-container"><th style="color:#E91E63">Mot de passe :</th><td>${jsonObject.password}</td></tr>`;
                }

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
                    fetch(`fiche_etudiant/removeEtudiant/${subjectId}`, {
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
            let allDomaines = <?php echo json_encode($domaine); ?>; // Encode the PHP array to JSON
            console.log(allDomaines);
            // Show the modal
            $("#updateSubjectModal").modal('show');
            $("#add-module-messages_update").html("");

            // Fetch the data of the subject (tuteur)
            fetch(`fiche_etudiant/getEtudiant/${module_id}`, {
                method: 'POST'
            })
            .then(response => response.json()) // Parse JSON response
            .then(jsonObject => {
                console.log(jsonObject);
                // Populate the form fields with the fetched data
                $('#editnom').val(jsonObject.nom);
                $('#editprenom').val(jsonObject.prenom);
                $('#editcin').val(jsonObject.cin);
                $('#editphone').val(jsonObject.phone);
                $('#editemail').val(jsonObject.email);
                $('#editville').val(jsonObject.ville);
                $('#editadresse').val(jsonObject.adresse);
                $('#editcodepostal').val(jsonObject.code_postal);
                $('#editniveau').val(jsonObject.niveau);
                $('#editusername').val(jsonObject.username);
                $('#editpassword').val(jsonObject.password);
                $('#editconfirmpassword').val(jsonObject.password);
                
                $('#editetab').val(jsonObject.id_etab).trigger('change'); // Trigger update for role select

              
            })
            .catch(error => console.error('Error fetching data:', error));

            // Handle form submission
            $("#updateEtudiantForm").unbind('submit').bind('submit', function(event) {
                event.preventDefault(); // Prevent default form submission

                const form = $(this);
                const url = form.attr('action');
                const type = form.attr('method');
                const formData = new URLSearchParams(new FormData(form[0])); // Serialize form data

                console.log(`${url}/${module_id}`);

                // Use fetch to submit the form data
                fetch(`${url}/${module_id}`, {
                    method: type,
                    body: formData,
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded' // Set the content type for form submission
                    }
                })
                .then(response => response.json()) // Parse JSON response
                .then(response => {
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
                        $("#updateEtudiantForm")[0].reset();
                        $(".form-group").removeClass('has-error has-success');
                        $(".text-danger").remove();
                    } else {
                        // Handle form validation errors (if any)
                        console.log("Form submission failed:", response);
                    }
                })
                .catch(error => {
                    console.error('Error submitting form:', error);
                });

                return false;
            });
        }

 </script>                       
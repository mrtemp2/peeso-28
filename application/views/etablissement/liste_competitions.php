<style>
    .modal{
        --bs-modal-width: 800px !important;
    }
    #ViewSubscribersModal {
        z-index: 1050; /* Default z-index for modals */
    }

    #ViewSubModal {
        z-index: 1060; /* Higher z-index to appear on top */
    }
    #accepteSubjectModal {
        z-index: 1070; /* Higher z-index to appear on top */
    }
    #refuseSubjectModal {
        z-index: 1070; /* Higher z-index to appear on top */
    }
    .modal-backdrop.show {
        z-index: 1040; /* Ensure backdrop is layered below the top modal */
    }



</style>
<div class="col-xl-9 col-lg-9 col-md-12">
                            <div class="dashboard__content__wraper">
                                <div class="dashboard__section__title" style="display: flex;align-items:center;justify-content:space-between;">
                                    <h4>Liste Des Compétitions</h4>
                                    <a class="default__button" href="<?= base_url('ajout_competition') ?>">Ajouter Une Compétition</a>
                                </div>

                                
                                <hr class="mt-40">
                              <div class="row">
                                
                                <div class="col-xl-12">
                                    <div class="dashboard__table table-responsive">
                                        <table id="manageModuleTable">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                   
                                                    <th>Nom</th>
                                                    <th>Afficher les inscrits</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                      </table>
                                    </div>
                                </div>
                              </div>
                            </div>

                    
                        </div>
                <!-- update modal start -->
    <div class="modal fade" id="updateSubjectModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog login-page-form-area" role="document">
            <div class="modal-content" style="border:none !important;">
                <div class="modal-header" style="border-bottom:none !important;">
                <h5 class="modal-title" id="exampleModalLabel">Modifier Compétition</h5>
            
                </div>
                <div class="modal-body">
                <form id="updateAppelForm" enctype="multipart/form-data">
                    <div class="row">
                    <div class="col-xl-6">
                        <div class="contact__input__wraper">
                        <label for="edit_nom">Nom :</label>
                        <input type="text" id="edit_nom" name="edit_nom" placeholder='Ecrire Le Titre En Français'>
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
                                        <img id="user-photo" style="max-height:100%" src="<?= base_url()."public/new/images/dashboard/05.png" ?>" alt="competition_photo">
                                    </div>
                                    <div class="information">
                                        <span>Size: 700 X 430 Pixels</span><br>
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
                            <label for="edit_date_debut">Date début :</label>
                            <input type="date" id="edit_date_debut" name="edit_date_debut">
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="contact__input__wraper">
                            <label for="edit_date_fin">Date fin :</label>
                    <input type="date" id="edit_date_fin" name="edit_date_fin">
                        </div>
                    </div>
                    <div class="col-xl-12">
                        <div class="contact__input__wraper">
                        <label class="form-control-label" for="edit_description">Description: </label>
                            <textarea name="edit_description" id="edit_description" cols="30" rows="10" placeholder="Entrez votre message ici*"></textarea>
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
    <!-- update modal end -->

    <!-- delete modal start -->
    <div id="removeSubjectModal" class="modal fade">
        <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content tx-size-sm">
            <div class="modal-body tx-center pd-y-20 pd-x-20">
            
            <div id="messages"></div>
            <i class="icon icon ion-ios-close-outline tx-100 tx-danger lh-1 mg-t-20 d-inline-block"></i>
            <h4 class="tx-danger  tx-semibold mg-b-20">Supprimer Compétition</h4>
            <p class="mg-b-20 mg-x-20">Voulez-vous vraiment le supprimer ?</p>
            </div><!-- modal-body -->
            <div class="modal-footer">
            <button type="submit" style="color:white" class="btn btn-danger" id="removeSubjectBtn">
                Supprimer</button>
            </div>
        </div>
        </div>
    </div>
    <!-- delete modal end -->
    
    <!-- view modal start -->
    <div class="modal login-pupup-modal fade" id="ViewSubjectModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                <div class="single">
                                    <i class="far fa-clock"></i>
                                    <span>De </span> <span id="date_debut"></span> <span>à </span> <span id="date_fin"></span>
                                    
                                </div>
                            </div>
                            <div class="thumbnail" style="display:flex;justify-content: center;;height:100%;">
                                <img id="image" alt="image de l'actualité" style="height: 200px;  max-width: 100%;max-height: 100%;object-fit: cover;">
                            </div>
                            <h3 class="title animated fadeIn" id="title" style="text-align:center"></h3>
                            
                            <p class="disc" id="extract" style="text-align:center">
                                
                            </p>
                        </div>  
                </div>
            </div>
        </div>
    </div>
    <!-- view modal end -->

    <!-- accept modal start -->
    <div id="accepteSubjectModal" class="modal fade">
        <div class="modal-dialog modal-dialog-centered" role="document" style="
            justify-content: center;
            align-items: center;
        ">
        <div class="modal-content tx-size-sm" style="
            width: 400px;
            display: flex;
            position: relative;
            align-items: center;
            background-color: aquamarine;
        ">
            <div class="modal-body tx-center pd-y-20 pd-x-20">
            
            <div id="accepte-messages"></div>
            <i class="icon icon ion-ios-close-outline tx-100 tx-danger lh-1 mg-t-20 d-inline-block"></i>
            <h4 class="tx-danger  tx-semibold mg-b-20">Accepter Inscrit</h4>
            <p class="mg-b-20 mg-x-20">Voulez-vous vraiment accepter ?</p>
            </div>
            <div class="modal-footer">
            <button type="submit" style="color:white" class="btn btn-success" id="accepteSubjectBtn">
                Oui</button>
            </div>
        </div>
        </div>
    </div>
    <!-- accept modal end -->

    <!-- refuse modal start -->
    <div id="refuseSubjectModal" class="modal fade">
        <div class="modal-dialog modal-dialog-centered" role="document" style="
            justify-content: center;
            align-items: center;
        ">
        <div class="modal-content tx-size-sm" style="
            width: 400px;
            display: flex;
            position: relative;
            align-items: center;
            background-color: #e9d0c7;
        ">
            <div class="modal-body tx-center pd-y-20 pd-x-20">
            
            <div id="refuse-messages"></div>
            <i class="icon icon ion-ios-close-outline tx-100 tx-danger lh-1 mg-t-20 d-inline-block"></i>
            <h4 class="tx-danger  tx-semibold mg-b-20">Refuser Inscrit</h4>
            <p class="mg-b-20 mg-x-20">Voulez-vous vraiment refuser ?</p>
            </div>
            <div class="modal-footer">
            <button type="submit" style="color:white" class="btn btn-danger" id="refuseSubjectBtn">
                Oui</button>
            </div>
        </div>
        </div>
    </div>
    <!-- refuse modal end -->

    <!-- viewSub modal start -->
    <div class="modal login-pupup-modal fade" id="ViewSubModal" tabindex="1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                <h3 class="title animated fadeIn" id="nom_subsc" style="text-align:center"></h3>
                            </div>
                            <div>
                                <span>Email : </span> <span id="email_subsc"></span> <br>
                                <span>Paragraphe Sur Son Projet : </span> <span id="para_subsc"></span> <br>
                                <span>CV  : </span> <a href="#" id="cv_subsc" target="_blank"><i class="fas fa-eye"></i></a> <br>
                                <span> Etat : </span><span id="is_accepted"></span> <br>
                            </div>
                            <div style="display:flex;justify-content: right;height:50px;">
                                <img id="signature_sub" alt="signature de l'inscrit" style="height: auto;  max-width: 100%;max-height: 100%;object-fit: cover;">
                            </div>
                            </p>

                            <button class="btn btn-success" style="font-size: 14px; float:right; width:100px" id="showAccept">Accepter</button>
                            <button class="btn btn-danger" style="font-size: 14px; float:left; width:100px" id="showRefuse">Refuser</button>
                        </div>
                </div>
            </div>
        </div>
    </div>
    <!-- viewSub modal end -->

    <!-- viewSubscribers modal start -->
    <div class="modal login-pupup-modal fade" id="ViewSubscribersModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" style="transform: none;">
                <div class="modal-header">
                    
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            
                            <div style="display: flex;
                                    align-items: center;
                                    justify-content: space-between;
                                ">
                                <h5 class="title">Liste Des Inscrits Pour Cette Compétition</h5>
                            </div>
                            
                            <table id="manageTable" class="table-reviews quiz mb--0" width="100%">
                            
                            </table>
                        </div>
                    </div>
                        
                </div>
            </div>
        </div>
    </div>
    <!-- viewSubscribers modal end -->
 <script>
             var manageModuleTable;
    
window.addEventListener('load',function() {

   
    manageModuleTable = $("#manageModuleTable").DataTable({
        columns: [{ width: '10%' },{ width: '50%' }, { width: '20%' },{ width: '20%' }],
        'ajax': 'news/fetchDataCompetitons',
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

        // Fetch the event data
        fetch(`news/getCompetition/${module_id}`, {
            method: 'POST'
        })
        .then(response => response.json()) // Parse JSON response
        .then(data => {
            if (data.success) {
                const { nom, description, date_debut, date_fin, photo } = data.data;

                // Update the modal with the fetched data
                $('#title').html(nom);
                $('#date_debut').html(date_debut);
                $('#date_fin').html(date_fin);
                $('#extract').html(description);
                $('#image').attr('src', photo);
            } else {
                console.error('Error:', data.message);
                // Optionally show an error message in the modal
                $('#title').html('Error');
                $('#extract').html(data.message);
            }
        })

        .catch(error => console.error('Error fetching data:', error)); // Handle errors
    }

    function ViewSubscribers(module_id = null) {
        // Show the modal
        $("#ViewSubscribersModal").modal('show');

        // Fetch subscriber data using `fetch`
        fetch(`news/fetchCompetitionSubscribers/${module_id}`)
            .then(response => response.json())
            .then(data => {
                // Initialize DataTable with the fetched data
                $("#manageTable").DataTable({
                    data: data, // Pass the fetched data here
                    dom: "<'row'<'col-sm-12 col-md-6'l>>"
                        + "<'calender-and-tab-btn-between'<'nav nav-tabs'B><''f>>"
                        + "<'row'<'col-sm-12'tr>>"
                        + "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
                    responsive: true,
                    columns: [
                        { title: "Nom et Prénom", data: "nom_prenom" },
                        { title: "Email", data: "email" },
                        { title: "Message de l'inscrit", data: "message" },
                        { 
                            title: "Afficher", 
                            data: null, 
                            render: function (data, type, row) {
                                return `<button 
                                            class="action-button" 
                                            style="background-color: #29d629; border:1px solid #29d629;" 
                                            onclick="showDetails(${row.id})"
                                        >
                                            <i class="icofont-info"></i>
                                        </button>`;
                            }
                        }
                        // Add other columns here according to your data structure
                    ],
                    language: {
                        searchPlaceholder: 'Recherche...',
                        sSearch: '',
                        Processing: "Traitement en cours...",
                        sLengthMenu: "Afficher _MENU_ &eacute;l&eacute;ments",
                        sInfo: "Affichage de l'&eacute;l&eacute;ment _START_ &agrave; _END_ sur _TOTAL_ &eacute;l&eacute;ments",
                        sInfoEmpty: "Affichage de l'&eacute;l&eacute;ment 0 &agrave; 0 sur 0 &eacute;l&eacute;ment",
                        sInfoFiltered: "(filtr&eacute; de _MAX_ &eacute;l&eacute;ments au total)",
                        sLoadingRecords: "Chargement en cours...",
                        sZeroRecords: "Aucun &eacute;l&eacute;ment &agrave; afficher",
                        sEmptyTable: "Aucune donn&eacute;e disponible dans le tableau",
                        oPaginate: {
                            "sFirst": "<i class='fas fa-step-backward'></i>",
                            "sPrevious": "<i class='fas fa-chevron-left'></i>",
                            "sNext": "<i class='fas fa-chevron-right'></i>",
                            "sLast": "<i class='fas fa-step-forward'></i>"
                        },
                        oAria: {
                            "sSortAscending": ": activer pour trier la colonne par ordre croissant",
                            "sSortDescending": ": activer pour trier la colonne par ordre d&eacute;croissant"
                        },
                        select: {
                            "rows": {
                                _: "%d lignes séléctionnées",
                                0: "Aucune ligne séléctionnée",
                                1: "1 ligne séléctionnée"
                            }
                        }
                    },
                    destroy: true, // Ensure it reinitializes the DataTable each time
                });
            })
            .catch(error => console.error('Error fetching subscribers:', error));
    }

    function showDetails(subscriberId) {
        // Show the top modal
        $("#ViewSubModal").modal('show');

        // Fetch the event data
        fetch(`news/getsubscriber/${subscriberId}`, {
            method: 'POST'
        })
        .then(response => response.json())
        .then(data => {
            const { id,nom_prenom, email, message, cv, signature, is_accepted } = data;

            // Populate the modal fields with the fetched data
            $('#nom_subsc').html(nom_prenom);
            $('#email_subsc').html(email);
            $('#para_subsc').html(message);
            $('#cv_subsc').attr('href', cv); // Set CV as a link to the file
            $('#signature_sub').attr('src', signature);

            // Update is_accepted status
            $('#is_accepted').html(is_accepted === 'en_attente' ? '<span class="btn btn-primary">En Attente</span>' : 
                is_accepted === 'oui' ? '<span class="btn btn-success">Accepté</span>' : 
                '<span class="btn btn-danger">Refusé</span>');

            // Set up the Accept button to trigger acceptInscrit
            $('#showAccept').off('click').on('click', function() {
                acceptInscrit(id);
            });
            $('#showRefuse').off('click').on('click', function() {
                refuseInscrit(id);
            });
        })
        .catch(error => console.error('Error fetching data:', error));
    }
    function acceptInscrit(subId) {
        $("#accepteSubjectModal").modal('show');
        $("#accepteSubjectBtn").unbind('click').bind('click', function() {
            fetch(`news/accepteSub/${subId}`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                }
            })
            .then(response => response.text())  // Change this to text() to log raw response
            .then(text => {
                console.log('Raw response:', text);  // Log the raw response
                return JSON.parse(text);  // Parse it as JSON
            })
            .then(data => {
                if (data.success === true) {
                    setTimeout(function() {
                        $("#accepteSubjectModal").modal('hide');
                        $("#ViewSubModal").modal('hide');
                    }, 1000); // hide modals after a second


                    
                    // Optional: show a success message
                    $("#accepte-messages").html(`
                        <div class="alert alert-success alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            ${data.messages}
                        </div>
                    `);
                } else {
                    // Display warning message if there's an issue
                    $("#accepte-messages").html(`
                        <div class="alert alert-warning alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            ${data.messages}
                        </div>
                    `);
                }
            })
            .catch(error => console.error('Error:', error));
            
            return false;
        }); 
    }

    function refuseInscrit(subId) {
        $("#refuseSubjectModal").modal('show');
        $("#refuseSubjectBtn").unbind('click').bind('click', function() {
            fetch(`news/refuseSub/${subId}`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success === true) {
                    setTimeout(function() {
                        $("#refuseSubjectModal").modal('hide');
                        $("#ViewSubModal").modal('hide');
                    }, 1000); // Hide modals after a second
                    
                    

                    // Optional: show a success message
                    $("#refuse-messages").html(`
                        <div class="alert alert-success alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            ${data.messages}
                        </div>
                    `);
                } else {
                    // Display warning message if there's an issue
                    $("#refuse-messages").html(`
                        <div class="alert alert-warning alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            ${data.messages}
                        </div>
                    `);
                }
            })
            .catch(error => console.error('Error:', error));
            
            return false;
        }); 
    }

     function removeSubject(subjectId = null)
     {

     $("#messages").html('');
     $("#removeSubjectModal").modal('show');

       if (subjectId) {
         $("#removeSubjectBtn").unbind('click').bind('click', function() {
           $.ajax({
            url: 'news/removeCompetitions/' + subjectId,
             type: 'post',
             dataType: 'json',
             success: function(response) {
               if (response.success === true) {
                 $("#messages").html('<div class="alert alert-success alert-dismissible" role="alert">' +
                   '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' +
                   response.messages +
                   '</div>');
                 manageModuleTable.ajax.reload(null, false);
               } else {
                 $("#remove-messages").html('<div class="alert alert-warning alert-dismissible" role="alert">' +
                   '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' +
                   response.messages +
                   '</div>');
               }
             } // /success
           }); // /ajax
           return false;
         }); // /remove section btn clicked
       }
     }
     function editSubject(module_id = null) {
        // Show the modal
        $("#updateSubjectModal").modal('show');
        $("#add-module-messages_update").html("");

        // Fetch event data to populate the form
        fetch(`news/getCompetition/${module_id}`, {
            method: 'POST'
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                const {nom, date_debut, date_fin, description, photo} = data.data
                    // Populate form fields with fetched data
                    $("#edit_nom").val(nom);
                    $("#edit_date_debut").val(date_debut);
                    $("#edit_date_fin").val(date_fin);
                    $("#edit_description").val(description);
                    document.querySelector('#user-photo').setAttribute('src', photo);
            } else {
                console.error('Error:', data.message);
                // Optionally show an error message in the modal
                $('#edit_nom').html('Error');
                $('#edit_description').html(data.message);
            }
        })

        .catch(error => console.error('Error loading event data:', error));

        // Handle form submission using fetch
        $("#createStudentForm").unbind('submit').bind('submit', function(event) {
            event.preventDefault(); // Prevent default form submission

            // Create FormData from the form
            let formData = new FormData(this);

            fetch(`news/update_competitions/${module_id}`, {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(response => {
                if (response.success) {
                    // Display success message
                    $("#add-module-messages_update").html(`
                        <div class="alert alert-success alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            Modifé avec succès
                        </div>
                    `);

                    // Reload DataTable, reset form, and clear error styling
                    manageModuleTable.ajax.reload(null, false);
                    $("#createStudentForm")[0].reset();
                    $(".form-group").removeClass('has-error').removeClass('has-success');
                    $(".text-danger").remove();
                } else {
                    // Display error messages for each form field
                    $.each(response.messages, (index, value) => {
                        const key = $(`#${index}`);
                        key.closest('.form-group')
                            .removeClass('has-error')
                            .removeClass('has-success')
                            .addClass(value.length > 0 ? 'has-error' : 'has-success')
                            .find('.text-danger').remove();
                        key.after(value);
                    });
                }
            })
            .catch(error => {
                console.error('Error updating event:', error);
                $("#add-module-messages_update").html(`
                    <div class="alert alert-danger alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        An error occurred during the update.
                    </div>
                `);
            });
        });
    }

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
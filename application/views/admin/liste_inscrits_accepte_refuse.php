<style>
    .modal{
        --bs-modal-width: 800px !important;
    }
    #ViewSubscribersAcceptedModal {
        z-index: 1050; /* Default z-index for modals */
    }
    #ViewSubscribersRefusedModal {
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
                                    <h4>Liste Des Inscrits Acceptés/Refusés</h4>
                                </div>

                                
                                <hr class="mt-40">
                              <div class="row">
                                
                                <div class="col-xl-12">
                                    <div class="dashboard__table table-responsive">
                                        <table id="manageModuleTable">
                                            <thead>
                                                <tr>
                                                    <th style="width:100%">Nom</th>
                                                    <th>Afficher les inscrits acceptés</th>
                                                    <th>Afficher les inscrits refusés</th>
                                                    <th>Plus d'info sur la compétition</th>
                                                </tr>
                                            </thead>
                                      </table>
                                    </div>
                                </div>
                              </div>
                            </div>

                    
                        </div>
               
    <!-- viewSubject modal start -->
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
                                <!-- single info -->
                                
                                <!-- single infoe end -->
                                <!-- single info -->
                                <div class="single">
                                    <i class="far fa-clock"></i>
                                    <span>De </span> <span id="date_debut"></span> <span>à </span> <span id="date_fin"></span>
                                    
                                </div>
                                <!-- single infoe end -->
                                <!-- single info -->
                                
                                <!-- single infoe end -->
                            </div>
                            <div class="thumbnail" style="display:flex;justify-content: center;;height:100%;">
                                <img id="image" alt="image de l'actualité" style="height: 200px;  max-width: 100%;max-height: 100%;object-fit: cover;">
                            </div>
                            <h3 class="title animated fadeIn" id="title" style="text-align:center"></h3>
                            
                            <p class="disc" id="extract" style="text-align:center">
                                
                            </p>
                            <!-- quote area start -->
                            
                            <!-- quote area end -->

                            

                            

                            
                            
                            
                            
                            
                            
                            
                        </div>
                        
                </div>
            </div>
        </div>
    </div>
    <!-- viewSubject modal end -->

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

                            
                            <!-- quote area start -->
                            
                            <!-- quote area end -->

                            

                            

                            
                            
                            
                            
                            
                            
                            
                        </div>
                        
                </div>
            </div>
        </div>
    </div>
    <!-- viewSub modal end -->

    <!-- ViewSubscribersAcceptedModal modal start -->
    <div class="modal login-pupup-modal fade" id="ViewSubscribersAcceptedModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                <h5 class="title">Liste Des Inscrits Acceptés Pour Cette Compétition</h5>
                            </div>
                            
                            <table id="manageAcceptedTable" class="table-reviews quiz mb--0" width="100%">
                            
                            </table>
                        </div>
                    </div>
                        
                </div>
            </div>
        </div>
    </div>
    <!-- ViewSubscribersAcceptedModal modal end -->

    <!-- ViewSubscribersRefusedModal modal start -->
    <div class="modal login-pupup-modal fade" id="ViewSubscribersRefusedModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                <h5 class="title">Liste Des Inscrits Refusés Pour Cette Compétition</h5>
                            </div>
                            
                            <table id="manageRefusedTable" class="table-reviews quiz mb--0" width="100%">
                            
                            </table>
                        </div>
                    </div>
                        
                </div>
            </div>
        </div>
    </div>
    <!-- ViewSubscribersRefusedModal modal end -->
 <script>
             var manageModuleTable;
    
window.addEventListener('load',function() {

   
    manageModuleTable = $("#manageModuleTable").DataTable({
        columns: [{ width: '70%' },{ width: '10%' }, { width: '10%' },{ width: '10%' }],
        'ajax': 'news/fetchDataInscrits',
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

    function ViewSubscribersAccepted(module_id = null) {
        // Show the modal
        $("#ViewSubscribersAcceptedModal").modal('show');

        // Fetch subscriber data using `fetch`
        fetch(`news/fetchCompetitionSubscribersAccepted/${module_id}`)
            .then(response => response.json())
            .then(data => {
                // Initialize DataTable with the fetched data
                $("#manageAcceptedTable").DataTable({
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
                                return `<button class="action-button" 
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

    function ViewSubscribersRefused(module_id = null) {
        // Show the modal
        $("#ViewSubscribersRefusedModal").modal('show');

        // Fetch subscriber data using `fetch`
        fetch(`news/fetchCompetitionSubscribersRefused/${module_id}`)
            .then(response => response.json())
            .then(data => {
                // Initialize DataTable with the fetched data
                $("#manageRefusedTable").DataTable({
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
                                return `<button class="action-button" 
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

        })
        .catch(error => console.error('Error fetching data:', error));
    }

    </script>                       
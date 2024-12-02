<style>
                      .course-thumbnail-upload-area {
        display: flex;
        align-items: center;
        gap: 30px;
    }
    .course-thumbnail-upload-area .inClub .input-file-type-btn {
    position: relative;
    margin-top: 10px;
    }
    .course-thumbnail-upload-area .inClub input {
        position: absolute;
        width: 100%;
        height: 100%;
        opacity: 0;
        left: 0;
        top: 0;
        cursor: pointer;
    }
    .course-thumbnail-upload-area .inClub button {
        padding: 13px 25px;
    }
     
</style>
<div class="col-xl-9 col-lg-9 col-md-12">
                            <div class="dashboard__content__wraper">
                                <div class="dashboard__section__title" style="display: flex;align-items:center;justify-content:space-between;">
                                    <h4>Liste Des Clubs</h4>
                                    
                                </div>

                                
                                <hr class="mt-40">
                              <div class="row">
                                
                                <div class="col-xl-12">
                                    <div class="dashboard__table table-responsive">
                                        <table id="manageModuleTable">
                                            <thead>
                                                <tr>
                                                    <th>Club</th>
                                                    <th>activites</th>
                                                   
                                                    <th>nombre_de_membres</th>
                                                    <th>type</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                      </table>
                                    </div>
                                </div>
                              </div>
                            </div>

                    
                        </div>
                        <div class="modal login-pupup-modal fade" id="ViewClubModal" tabindex="-1" aria-labelledby="clubModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content" style="width: 850px;">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="clubModalLabel">Détails du Club</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <!-- Thumbnail -->
                                                <img id="club-thumbnail" src="" alt="Club Thumbnail" class="img-fluid mb-3" style="max-height: 250px; object-fit: cover;">
                                            </div>
                                            <div class="col-md-8">
                                                <table class="table table-bordered">
                                                    <tbody>
                                                        <tr>
                                                            <th>Nom du Club</th>
                                                            <td id="club-nom"></td>
                                                        </tr>
                                                        <tr>
                                                            <th>Activités</th>
                                                            <td id="club-activites"></td>
                                                        </tr>
                                                        <tr>
                                                            <th>Nombre de Membres</th>
                                                            <td id="club-membres"></td>
                                                        </tr>
                                                        <tr>
                                                            <th>Adresse Complète</th>
                                                            <td id="club-adresse"></td>
                                                        </tr>
                                                        <tr>
                                                            <th>Téléphone</th>
                                                            <td id="club-telephone"></td>
                                                        </tr>
                                                        <tr>
                                                            <th>Adresse Email</th>
                                                            <td id="club-email"></td>
                                                        </tr>
                                                        <tr>
                                                            <th>Type de Club</th>
                                                            <td id="club-type"></td>
                                                        </tr>
                                                        <tr>
                                                            <th>Date de Création</th>
                                                            <td id="club-date-creation"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary tx-11 tx-uppercase pd-y-12 pd-x-25 tx-mont tx-medium" data-bs-dismiss="modal">Fermer</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        

<div id="removeClubModal" class="modal fade">
        <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content tx-size-sm">
            <div class="modal-body tx-center pd-y-20 pd-x-20">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <div id="messages"></div>
            <i class="icon icon ion-ios-close-outline tx-100 tx-danger lh-1 mg-t-20 d-inline-block"></i>
            <h4 class="tx-danger  tx-semibold mg-b-20">Supprimer Club</h4>
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
    <div id="createClub" class="modal fade">
      <div class="modal-dialog modal-lg" id="createClubContent" role="document">
      </div>
    </div>
    
    


 <script>
             var manageModuleTable;
 
window.addEventListener('load',function() {
  
    
    manageModuleTable = $("#manageModuleTable").DataTable({
        columns: [{ width: '17%' },{ width: '18%' },{ width: '20%' }, { width: '20%' },{ width: '25%' }],
        'ajax': 'clubs/fetchClubDataAdmin',
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
function ViewSubject(club_id = null) {
    if (club_id === null) {
        console.error("Club ID is required");
        return;
    }

    // Show the modal
    $("#ViewClubModal").modal('show');

    // Fetch club details using the provided ID
    fetch(`clubs/getClubDetails/${club_id}`, {
        method: 'POST', // Adjust to 'GET' if the server expects a GET request
        headers: {
            'Content-Type': 'application/json',
        },
    })
    .then(response => response.json()) // Parse the JSON response
    .then(data => {
        // Populate modal fields with data
        $("#club-thumbnail").attr("src", data.logo_du_club ? "<?= base_url().'assets/assets/images/' ?>" + data.logo_du_club : "<?= base_url().'assets/assets/images/default-thumbnail.jpg' ?>");

        $("#club-nom").text(data.nom_du_club || "N/A");
        $("#club-activites").text(data.activites || "N/A");
        $("#club-membres").text(data.nombre_de_membres || "N/A");
        $("#club-adresse").text(data.adresse_complete || "N/A");
        $("#club-telephone").text(data.telephone || "N/A");
        $("#club-email").text(data.adresse_email || "N/A");
        $("#club-type").text(data.type || "N/A");
        $("#club-date-creation").text(data.created_at || "N/A");
    })
    .catch(error => {
        console.error("Error fetching club details:", error);

        // Optionally, show an error message in the modal
        $("#clubModalLabel").text("Erreur");
        $(".modal-body").html("<p style='color:red;'>Erreur lors de la récupération des données du club.</p>");
    });
}





 </script>                       
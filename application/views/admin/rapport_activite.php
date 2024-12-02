<?php 
$adder_id = $this->session->userdata['logged']['id'];
$clubs = $this->model_clubs->get_clubs_by_user($adder_id) ;

    ?>
<style>
    .modal{
        --bs-modal-width: 800px !important;
    }
</style>
<div class="col-xl-9 col-lg-9 col-md-12">
                            <div class="dashboard__content__wraper">
                                <div class="dashboard__section__title" style="display: flex;align-items:center;justify-content:space-between;">
                                    <h4>Liste Des Activités</h4>
                                    <a class="default__button" href="<?= base_url('ajout_activite') ?>">Ajouter Une Activité</a>
                                </div>

                                
                                <hr class="mt-40">
                              <div class="row">
                                
                                <div class="col-xl-12">
                                    <div class="dashboard__table table-responsive">
                                        <table id="manageModuleTable">
                                            <thead>
                                                <tr>
                                                    <th>Titre</th>
                                                    <th>annee</th>
                                                    <th>club</th>
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
    <div class="modal fade" id="ViewSubjectModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Détails de l'Activité</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="blog-listing-content">
                    <div class="user-info d-flex align-items-center flex-wrap mb-3">
                        <div class="single me-2">
                            <i class="far fa-clock"></i>
                            <span id="created_at"></span>
                        </div>
                        <span>/</span>
                        <div class="single ms-2">
                            <i class="far fa-clock"></i>
                            <span id="club"></span>
                        </div>
                    </div>
                    <div class="thumbnail" style="display: flex; justify-content: center; height: 100%;">
                        <a id="pdf-link" href="#" target="_blank" style="text-decoration: none;">
                            <img id="image" 
                                src="<?php echo base_url('public/new/images/pdf.png'); ?>" 
                                alt="Image de l'Activité" 
                                class="img-fluid" 
                                style="max-height: 200px; object-fit: cover;">
                        </a>
                    </div>
                    <h3 class="title text-center my-3" id="title"></h3>
                    <p class="disc text-center" id="extract"></p>
                </div>
            </div>
        </div>
    </div>
</div>


    <!-- view modal end -->
<script >
var manageModuleTable;

window.addEventListener('load', function() {


manageModuleTable = $("#manageModuleTable").DataTable({
        ajax: 'rapport_activite/fetchDataNewsactiviteAdmin',
        columns: [{
                width: '10%'
            }, // Titre
            {
                width: '70%'
            }, // Année
            {
                width: '20%'
            }, // Club
            {
                width: '10%'
            } // Actions
        ],
        columnDefs: [{
            targets: -1, // Last column (Actions)
            orderable: false // Disable sorting on Actions column
        }],
        bLengthChange: false,
        bInfo: false,
        dom: "<'row'<'col-sm-12 col-md-6'l>>" +
            "<'calender-and-tab-btn-between'<'nav nav-tabs'B><''f>>" +
            "<'row'<'col-sm-12'tr>>" +
            "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
        language: {
            searchPlaceholder: 'Recherche...',
            sSearch: '',
            sZeroRecords: "Aucun élément à afficher",
            sEmptyTable: "Aucune donnée disponible dans le tableau",
        }
    });

});

function ViewSubject(module_id = null) {
    // Show the modal
    $("#ViewSubjectModal").modal('show');

    // Clear existing content to avoid confusion while loading new data
    $('#title').html('Chargement...');
    $('#created_at').html('');
    $('#extract').html('');
    $('#club').html('');
    $('#image').attr('src', "<?php echo base_url('public/new/images/dashboard/pdf.png'); ?>");
    $('#pdf-link').attr('href', '#');

    // Fetch data using AJAX
    $.post(`rapport_activite/get_activite_club/${module_id}`)
        .done(function(response) {
            try {
                // Parse JSON response
                const data = JSON.parse(response);

                // Destructure response data
                const {
                    nom,
                    description,
                    date_creation,
                    pdf,
                    nom_du_club
                } = data;

                // Update modal content
                $('#title').html(nom || 'Titre non disponible');
                $('#created_at').html(date_creation || 'Date non disponible');
                $('#extract').html(description || 'Contenu non disponible');
                $('#club').html(nom_du_club || 'Club non disponible');

                // Update PDF link
                const base_url = "<?php echo base_url('/assets/assets/images'); ?>"; // Update to correct base URL for files
                if (pdf) {
                    $('#pdf-link').attr('href', `${base_url}/${pdf}`).attr('target', '_blank');
                } else {
                    $('#pdf-link').attr('href', '#').attr('target', '_self');
                }
            } catch (error) {
                console.error("Error parsing response:", error);
                $('#title').html('Erreur lors du chargement des données');
            }
        })
        .fail(function() {
            // Handle AJAX failure
            $('#title').html('Erreur lors de la récupération des données');
            $('#created_at').html('');
            $('#extract').html('Veuillez réessayer plus tard.');
            $('#club').html('');
            $('#pdf-link').attr('href', '#').attr('target', '_self');
        });
}

document.addEventListener("DOMContentLoaded", function() {
    const realFileInput = document.getElementById("real-file");
    const customButton = document.getElementById("custom-button");
    const customText = document.getElementById("custom-text");

    // Open file input when custom button is clicked
    customButton.addEventListener("click", function() {
        realFileInput.click();
    });

    // Update the text when a file is selected
    realFileInput.addEventListener("change", function() {
        if (realFileInput.files.length > 0) {
            customText.textContent = realFileInput.files[0].name; // Show the selected file name
        } else {
            customText.textContent = "Aucun fichier choisi";
        }
    });
}); </script>                       
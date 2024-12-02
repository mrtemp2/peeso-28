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
                <div class="modal fade" id="updateSubjectModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog login-page-form-area" role="document">
            <div class="modal-content" style="border:none !important;">
                <div class="modal-header" style="border-bottom:none !important;">
                <h5 class="modal-title" id="exampleModalLabel">Modifier Activité</h5>
            
                </div>
                <div class="modal-body">
                <form action="rapport_activite/update_activite" method="post" id="createStudentForm" enctype="multipart/form-data">
                    <div class="row">
                    <div class="col-xl-12">
                        <div class="contact__input__wraper">
                        <label for="edit_titre_fr">Nom :</label>
                        <input type="text" id="edit_titre_fr" name="edit_titre_fr" placeholder='Ecrire Le Titre En Français'>
                        </div>
                    </div>
                    <!-- <div class="col-xl-6">
                        <div class="contact__input__wraper">
                        <label for="edit_titre_en">Titre en Anglais :</label>
                        <input type="text" id="edit_titre_en" name="edit_titre_en" placeholder='Ecrire Le Titre En Anglais'>
                        </div>
                    </div> -->
                    <div class="col-xl-12">
                        <div class="contact__input__wraper">
                            <label for="edit_titre_en">PDF :</label>
                            <div style="
                                border: 0.1px solid #dddddd;
                                margin: 0 0 30px 0;
                                border-radius: 5px;
                                padding: 20px;
                            ">
                                <div class="course-thumbnail-upload-area">
                                    <div class="thumbnail-area" style="height:100px">
                                        <img id="user-photo" style="max-height:100%" src="<?= base_url()."public/new/images/dashboard/pdf.png" ?>" alt="competition_photo">
                                    </div>
                                    <div class="information">
                                        <span>File Support: PDF</span>
                                        <div class="input-file-type-btn">
                                            <input type="file" id="real-file" name="edit_image"  hidden />
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
                            <input type="number" id="annee" name="annee" placeholder="annee de l'activité">
                        </div>
                    </div>
                    <div class="contact__input__wraper">
                                <label class="form-control-label" for="edit_content_fr">Club : </label>
                                <select name="club_id" id="club_id" required>
                                    <option value="">-- Select an Club --</option>
                                    <?php foreach ($clubs as $club): ?>
                                        <option value="<?php echo htmlspecialchars($club['id']); ?>">
                                            <?php echo htmlspecialchars($club['nom_du_club']); ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>                           
                             </div>
                    <div class="col-xl-12">
                        <div class="contact__input__wraper">
                        <label class="form-control-label" for="edit_content_fr">Description : </label>
                            <textarea name="edit_content_fr" id="edit_content_fr" cols="30" rows="10" placeholder="Entrez votre Contenu En Français ici*"></textarea>
                        </div>
                    </div>
                    <!-- <div class="col-xl-12">
                        <div class="contact__input__wraper">
                        <label class="form-control-label" for="edit_content_en">Contenu En Anglais: </label>
                            <textarea name="edit_content_en" id="edit_content_en" cols="30" rows="10" placeholder="Entrez votre Contenu En Anglais ici*"></textarea>
                        </div>
                    </div> -->


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
            <h4 class="tx-danger  tx-semibold mg-b-20">Supprimer Activité</h4>
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
        ajax: 'rapport_activite/fetchDataNewsactivite',
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

function removeSubject(subjectId = null) {

    $("#messages").html('');
    $("#removeSubjectModal").modal('show');

    if (subjectId) {
        $("#removeSubjectBtn").unbind('click').bind('click', function() {
            $.ajax({
                url: 'rapport_activite/removeActiviteClub/' + subjectId,
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


    $("#updateSubjectModal").modal('show');
    $("#add-module-messages_update").html("");

    // Fetch data using POST request
    $.post("rapport_activite/get_activite_club/" + module_id)
        .done(function(data) {
            // Parse the JSON response
            var jsonObject = JSON.parse(data);

            // Populate the modal fields with received data
            $("#edit_titre_fr").val(jsonObject['nom']); // Assuming 'nom' is the title of the activity
           
            $('#edit_content_fr').html(jsonObject['description']); // Set the description content
            $('#club_id').val(jsonObject['id_club']); // Set the club ID in the dropdown
            $('#annee').val(jsonObject['annee']); // Set the year
            $('#id_club').val(jsonObject['club_id']);
        });

    $("#createStudentForm").unbind('submit').bind('submit', function(event) {
        event.preventDefault(); // Prevent the default form submission

        var form = $(this);
        var url = form.attr('action');
        var type = form.attr('method');
        var formData = new FormData($(this)[0]);

        $.ajax({
            url: `${url}/${module_id}`,
            type: type,
            data: formData,
            dataType: 'json',
            cache: false,
            contentType: false,
            processData: false,
            async: false,
            success: function(response) {
                if (response.success) {
                    $('#extract').html("")
                    $("#add-module-messages_update").html('<div class="alert alert-success alert-dismissible" role="alert">' +
                        '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' +
                        "Modifé avec succès" +
                        '</div>');

                    manageModuleTable.ajax.reload(null, false);
                    $("#createStudentForm")[0].reset();
                    $(".form-group").removeClass('has-error').removeClass('has-success');
                    $(".text-danger").remove();
                } else {
                    $.each(response.messages, function(index, value) {
                        var key = $("#" + index);
                        key.closest('.form-group')
                            .removeClass('has-error')
                            .removeClass('has-success')
                            .addClass(value.length > 0 ? 'has-error' : 'has-success')
                            .find('.text-danger').remove();
                        key.after(value);
                    });
                }
            },
            error: function(xhr, ajaxOptions, thrownError) {
                // Handle errors, if any
                console.log(xhr.responseText);
                $("#add-module-messages_update").html('<div class="alert alert-success alert-dismissible" role="alert">' +
                    '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' +
                    "Modifé avec succès" +
                    '</div>');
            }
        });




        return false;
    });

} // /if


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
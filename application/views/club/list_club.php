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
                                    <button class="default__button" onclick="ajouterClub()" href="#">Ajouter club</button>
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
                        <div class="modal fade" id="updateSubjectModal" tabindex="-1" role="dialog" aria-labelledby="updateClubModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg login-page-form-area" role="document">
                                    <div class="modal-content" style="border:none !important;">
                                        <div class="modal-header" style="border-bottom:none !important;">
                                            <h5 class="modal-title" id="updateClubModalLabel">Modifier Club</h5>
                                        </div>
                                        <div class="modal-body">
                                            <form id="updateClubForm" enctype="multipart/form-data">
                                                <div class="row">
                                                    <!-- Club Name -->
                                                    <div class="col-xl-12">
                                                        <div class="contact__input__wraper">
                                                            <label for="edit_club_nom">Nom du Club :</label>
                                                            <input type="text" id="edit_club_nom" name="edit_club_nom" placeholder="Nom du Club">
                                                        </div>
                                                    </div>
                                                     <!-- Club Name -->
                                                     <div class="col-xl-12">
                                                        <div class="contact__input__wraper">
                                                            <label for="edit_club_nom">Activités:</label>
                                                            <input type="text" id="edit_club_activite" name="edit_club_activite" placeholder="activite">
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-12">
                                                        <div class="contact__input__wraper">
                                                            <label for="edit_club_nom">Nombre de membres:</label>
                                                            <input type="text" id="edit_nombre_de_membres" name="edit_nombre_de_membres" placeholder="nombre_de_membres">
                                                        </div>
                                                    </div>
                                                    <!-- Club Thumbnail -->
                                                    <div class="col-xl-12">
                                                        <div class="contact__input__wraper">
                                                            <div style="
                                                                border: 0.1px solid #dddddd;
                                                                margin: 30px 0;
                                                                border-radius: 5px;
                                                                padding: 20px;
                                                            ">
                                                                <div class="course-thumbnail-upload-area">
                                                                    <div class="thumbnail-area" style="height:100px">
                                                                        <img id="club-thumbnail-preview" style="max-height:100%" src="<?= base_url()."public/new/images/dashboard/05.png" ?>" alt="Club Thumbnail">
                                                                    </div>
                                                                    <div class="information">
                                                                        <span>Size: 700 X 430 Pixels</span><br>
                                                                        <span>File Support: PNG, JPG, JPEG</span>
                                                                        <div class="input-file-type-btn">
                                                                            <input type="file" id="edit_club_photo" name="edit_club_photo" hidden />
                                                                            <button type="button" class="default__button" onclick="openFileChooser1('#edit_club_photo','#club-thumbnail-preview')" >Choisir Un Fichier</button>
                                                                            <span id="custom-text">Aucun fichier choisi</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- Club Details -->
                                                    <div class="col-xl-12">
                                                        <div class="contact__input__wraper">
                                                            <label for="edit_club_type">Type de Club :</label>
                                                            <input type="text" id="edit_club_type" name="edit_club_type" placeholder="Type de Club">
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-12">
                                                        <div class="contact__input__wraper">
                                                            <label for="edit_club_adresse">Adresse Complète :</label>
                                                            <input type="text" id="edit_club_adresse" name="edit_club_adresse" placeholder="Adresse Complète">
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-12">
                                                        <div class="contact__input__wraper">
                                                            <label for="edit_club_telephone">Téléphone :</label>
                                                            <input type="text" id="edit_club_telephone" name="edit_club_telephone" placeholder="Téléphone">
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-12">
                                                        <div class="contact__input__wraper">
                                                            <label for="edit_club_email">Email :</label>
                                                            <input type="email" id="edit_club_email" name="edit_club_email" placeholder="Email">
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-12">
                                                        <div class="contact__input__wraper">
                                                            <input type="text" id="id_club" name="id_club" hidden>
                                                        </div>
                                                    </div>
                                                    <!-- Description -->

                                                </div>
                                                <!-- Messages -->
                                                <div id="update-club-messages"></div>
                                                <!-- Submit Button -->
                                                <center><button type="submit" class="btn btn-primary">Modifier</button></center>
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary tx-11 tx-uppercase pd-y-12 pd-x-25 tx-mont tx-medium mg-b-20" data-bs-dismiss="modal">Fermer</button>
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
        'ajax': 'clubs/fetchClubData',
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
function ajouterClub(){
    let updateReferentForm
    overlayOn()
    $('#createClubContent').load('<?=base_url()?>Clubs/createClubContent',(complete)=>{
        
        setTimeout(()=>{
            

            $('.js-example-invited-multiple').select2({
              dropdownParent: $('#createClub'), // Ensure the dropdown is rendered within the modal
              placeholder: "Sélectionnez des Etudiants",
              width: '100%'
           });
           
            document.querySelectorAll('.step-changer').forEach(element=>{
                
                const elementId =element.getAttribute('id')
                    console.log(elementId)
                            $(`#${elementId}`).unbind('click').on('click',e=>{
                                
                            e.preventDefault()
                            const step =parseInt(element.dataset.step)
                            const currentStep = step+1
                            document.querySelectorAll('.formstep').forEach(formStep => {
                                const formStepCount = parseInt(formStep.dataset.step)
                                formStep.style.left = ((formStepCount-currentStep)*110)+'%'
                            });
                        })
            })  
            $('#createClub').modal('show')

            overlayOff()
            $('#submit-Club').unbind('click').on('click',function (e){
                e.preventDefault()
                const action  = $('#createClubForm').attr('action')
                const form = document.querySelector('#createClubForm')
                const formData = new FormData(form)
                overlayOn()
                fetch(action,{
                    body:formData,
                    method:'POST',

                }).then(d=>{
                    return d.json()
                }).then(data=>{
                    if(data.success){
                        Swal.fire({
                                icon:'success' ,
                                title: 'Succés',
                                text: data.message
                        });  
                        document.location.reload()
                    }
                    else{
                        Swal.fire({
                                icon:'error' ,
                                title: 'Erreur',
                                text: data.message
                        });  
                    }
                    overlayOff()
                }).catch(e=>{
                    alert(e.message)
                })

            })

            
        
        },1000)
    })
}
function openFileChooser(fileInputId,fileImageId){
            const fileInput =document.querySelector(fileInputId)
            fileInput.click()
            fileInput.addEventListener('change',e=>{
                const file =(fileInput.files && fileInput.files.length )?fileInput.files[0]:"Veiller Choisir Un Fichier"
                const fileNameTextElement = fileInput.parentElement.querySelector('.custom-text')
                fileNameTextElement.innerHTML = file.name
                const url =window.URL.createObjectURL(file)
                $(fileImageId).attr('src',url)
            })
    }
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
function removeSubject(clubId = null) {
    // Clear previous messages and show the modal
    $("#messages").html('');
    $("#removeClubModal").modal('show');

    if (clubId) {
        // Unbind any previous click events to avoid multiple bindings
        $("#removeSubjectBtn").unbind('click').bind('click', function() {
            // Use fetch to send the request
            fetch(`clubs/removeClub/${clubId}`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
            })
            .then(response => response.json()) // Parse the JSON response
            .then(response => {
                if (response.success === true) {
                    // Display success message
                    $("#messages").html(`
                        <div class="alert alert-success alert-dismissible" role="alert">
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            ${response.messages}
                        </div>
                    `);
                    // Reload the DataTable without refreshing the page
                    manageModuleTable.ajax.reload(null, false);
                } else {
                    // Display warning message
                    $("#remove-messages").html(`
                        <div class="alert alert-warning alert-dismissible" role="alert">
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
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
function editSubject(module_id = null) {
    // Show the modal
    $("#updateSubjectModal").modal('show');
    $("#add-module-messages_update").html("");

    // Fetch club data to populate the modal
    fetch(`clubs/getClubDetails/${module_id}`, {
        method: 'POST'
    })
    .then(response => response.json())
    .then(data => {
        if (data) {
            const { id,nom_du_club, activites, nombre_de_membres, adresse_complete, telephone, adresse_email, type, date_creation, logo_du_club } = data;

                // Populate modal fields with fetched data
                $("#edit_club_nom").val(nom_du_club);
                $("#edit_club_type").val(type);
                $("#edit_club_activite").val(activites);
                $("#edit_nombre_de_membres").val(nombre_de_membres);
                $("#edit_club_date_creation").val(date_creation);
                $("#edit_club_adresse").val(adresse_complete);
                $("#edit_club_telephone").val(telephone);
                $("#edit_club_email").val(adresse_email);
                $("#id_club").val(id);
                $("#club-thumbnail-preview").attr("src", logo_du_club ? "<?= base_url().'assets/assets/images/' ?>" + logo_du_club : "<?= base_url().'assets/assets/images/default-thumbnail.jpg' ?>");
        } else {
            console.error('Error:', data.message);
            // Optionally show an error message in the modal
            $("#club-nom").text('Error');
            $("#club-activites").text(data.message);
        }
    })
    .catch(error => console.error('Error loading club data:', error));

    // Handle form submission for updating club details
    $("#updateClubForm").unbind('submit').bind('submit', function(event) {
        event.preventDefault(); // Prevent default form submission

        // Create FormData from the form
        let formData = new FormData(this);

        fetch(`clubs/updateClub/${module_id}`, {
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
                        Modifié avec succès
                    </div>
                `);

                // Reload the DataTable and reset the form
                manageModuleTable.ajax.reload(null, false);
                $("#updateClubForm")[0].reset();
                $(".form-group").removeClass('has-error').removeClass('has-success');
                $(".text-danger").remove();
            } else {
                // Display error messages for form fields
                $.each(response.messages, (index, value) => {
                    const key = $(`#${index}`);
                    key.closest('.form-group')
                        .removeClass('has-error')
                        .removeClass('has-success')
                        .addClass(value.length > 0 ? 'has-error' : 'has-success')
                        .find('.text-danger').remove();
                    $("#add-module-messages_update").html(`
                        <div class="alert alert-danger alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            Une erreur s'est produite lors de la mise à jour.
                        </div>
                    `);
                    key.after(value);
                });
            }
        })
        .catch(error => console.error('Error updating club details:', error));
    });
}
function openFileChooser1(fileInputId, fileImageId) {
    const fileInput = document.querySelector(fileInputId);
    if (!fileInput) {
        console.error('File input not found:', fileInputId);
        return;
    }
    
    fileInput.click();
    fileInput.addEventListener('change', (e) => {
        const file = (fileInput.files && fileInput.files.length) ? fileInput.files[0] : "Veiller Choisir Un Fichier";
        
        // Use ID selector to target the custom-text element by its ID (#custom-text)
        const fileNameTextElement = document.querySelector('#custom-text');
        
        // Ensure the element exists before setting its innerHTML
        if (fileNameTextElement) {
            fileNameTextElement.innerHTML = file.name;
        } else {
            console.error('#custom-text element not found');
        }
        
        const url = window.URL.createObjectURL(file);
        $(fileImageId).attr('src', url);
    });
}





 </script>                       
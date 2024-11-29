<style>
    .modal{
        --bs-modal-width: 800px !important;
    }
</style>
<div class="col-xl-9 col-lg-9 col-md-12">
    <div class="dashboard__content__wraper">
        <div class="dashboard__section__title" style="display: flex;align-items:center;justify-content:space-between;">
            <h4>Liste Des Partenaires</h4>
            <button class="default__button" style="margin-bottom: 20px;" data-toggle="modal" data-target="#addPartenaire" id="addPartenaireModelBtn" > Ajouter Partenaire </button>                                </div>

        
        <hr class="mt-40">
        <div class="row">
        
        <div class="col-xl-12">
            <div class="dashboard__table table-responsive">
                <table id="manageModuleTable">
                    <thead>
                        <tr>
                            <!-- <th>#</th> -->
                            <th>Nom Établissement</th>
                            <th>Etat</th>
                            <th>Plus de fonctionnalités</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
        </div>
    </div>


</div>

        <!-- add modal start -->
        <div id="addPartenaire" class="modal fade">
            <div class="modal-dialog modal-lg login-page-form-area" role="document">
              <div class="modal-content bd-0 tx-14" style="border:none !important;">
              
                
                <div class="modal-header pd-y-20 pd-x-25" style="border-bottom:none !important;">
                  <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Ajouter Partenaire</h6>
                  
                </div>
               
                  <form method="post" id="createPartenaireForm" action="partenaire/createPartenaire" enctype="multipart/form-data" accept-charset="utf-8">
                 
                      <div class="row" style="margin:auto;">
                            <div class="col-xl-12">
                                <div class="contact__input__wraper">
                                    <label for="nom">Nom du Partenaire: </label>
                                    <input type="text" id="nom" name="nom"  placeholder="Nom">
                                </div>
                                <div class="form-error" id="nom-error"> </div>
                            </div>
                            <div class="col-xl-12">
                                <div class="contact__input__wraper">
                                    <label for="activite">Activité: </label>
                                    <input type="text" id="activite" name="activite"  placeholder="activité">
                                </div>
                                <div class="form-error" id="activite-error"> </div>
                            </div>
                            <div class="col-xl-12">
                                <div class="contact__input__wraper">
                                    <label for="url">URL: </label>
                                    <input type="text" id="url" name="url"  placeholder="url">
                                </div>
                                <div class="form-error" id="url-error"> </div>
                            </div>
                            <div class="col-xl-12">
                                <div class="contact__input__wraper">
                                    <label for="edit_titre_en">Logo du Partenaire :</label>
                                    <div style="
                                        border: 0.1px solid #dddddd;
                                        margin: 0 0 30px 0;
                                        border-radius: 5px;
                                        padding: 20px;
                                    ">
                                        <div class="course-thumbnail-upload-area">
                                            <div class="thumbnail-area" style="height:100px">
                                                <img id="user-photo" style="max-height:100%" src="<?= base_url()."public/new/images/dashboard/05.png" ?>" alt="logo">
                                            </div>
                                            <div class="information">
                                                <span>Size: 700 X 430 Pixels</span><br>
                                                <span>File Support: PNG, JPG, JPEG</span>
                                                <div class="input-file-type-btn">
                                                    <input type="file" id="real-file" name="logo_partenaire"  hidden />
                                                    <button type="button" class="btn btn-primary" id="custom-button">Choisir Un Fichier</button>
                                                    <span id="custom-text">Aucun fichier choisit</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                      </div>
                        <center><button class="btn btn-primary" style="margin:15px;">Sauvegarder</button></center>
                      
                  </form> 
                  <div id="messages_add"></div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary tx-11 tx-uppercase pd-y-12 pd-x-25 tx-mont tx-medium mg-b-20" data-bs-dismiss="modal" aria-label="Close">Fermer</button>
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
                <h5 class="modal-title" id="exampleModalLabel">Modifier Partenaire</h5>
            
                </div>
                <div class="modal-body">
                <form action="partenaire/updatePartenaireData" method="post" id="updatePartenaireForm" enctype="multipart/form-data">
                    <div class="row">
                    <div class="col-xl-12">
                        <div class="contact__input__wraper">
                        <label for="editnom">Nom :</label>
                        <input type="text" id="editnom" name="editnom" placeholder='Nom partenaire'>
                        </div>
                    </div>
                    <div class="col-xl-12">
                        <div class="contact__input__wraper">
                        <label for="editactivite">Activité :</label>
                        <input type="text" id="editactivite" name="editactivite" placeholder='activité'>
                        </div>
                    </div>
                    <div class="col-xl-12">
                        <div class="contact__input__wraper">
                        <label for="editurl">URL :</label>
                        <input type="text" id="editurl" name="editurl" placeholder='Nom établissement'>
                        </div>
                    </div>
                    <div class="col-xl-12">
                        <div class="contact__input__wraper">
                            <label for="edit_titre_en">Logo :</label>
                            <div style="
                                border: 0.1px solid #dddddd;
                                margin: 0 0 30px 0;
                                border-radius: 5px;
                                padding: 20px;
                            ">
                                <div class="course-thumbnail-upload-area">
                                    <div class="thumbnail-area" style="height:100px">
                                        <img id="partenaire-logo" style="max-height:100%" src="<?= base_url()."public/new/images/dashboard/05.png" ?>" alt="logo">
                                    </div>
                                    <div class="information">
                                        <span>Size: 700 X 430 Pixels</span><br>
                                        <span>File Support: PNG, JPG, JPEG</span>
                                        <div class="input-file-type-btn">
                                            <input type="file" id="real-file-logo" name="edit_logo_partenaire"  hidden />
                                            <button type="button" class="btn btn-primary" id="custom-button-logo">Choisir Un Fichier</button>
                                            <span id="custom-text-logo">Aucun fichier choisit</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <div id="messages"></div>
            <i class="icon icon ion-ios-close-outline tx-100 tx-danger lh-1 mg-t-20 d-inline-block"></i>
            <h4 class="tx-danger  tx-semibold mg-b-20">Supprimer Partenaire</h4>
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
        columns: [{ width: '50%' },{ width: '20%' },{ width: '30%' }],
        'ajax': 'partenaire/fetchPartenaireData',
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
$("#addPartenaireModelBtn").on('click', function() {
            $("#addPartenaire").modal('show');
            $("#createPartenaireForm")[0].reset();
        $(".form-group").removeClass('has-error').removeClass('has-success');
        $("#messages_add").html('');
        $('.text-danger').remove();
        $("#createPartenaireForm").unbind("submit").bind("submit", function (event) {
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
                            $("#createPartenaireForm")[0].reset();
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
            fetch(`partenaire/getPartenaire/${module_id}`, {
                method: 'POST'
            })
            .then(response => response.json()) // Parse the JSON response
            .then(jsonObject => {
                // Build the result HTML string
                let result = "<h6 style='color:#40a4dd; text-align: center;'>Informations du Partenaire</h6>";
                result += "<br><br>";
                result += `<table id="datatable-buttons" class="table table-striped dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">`;

                if (jsonObject.nom) {
                    result += `<tr class="sonata-ba-view-container"><th style="color:#E91E63">Nom :</th><td>${jsonObject.nom}</td></tr>`;
                }
                if (jsonObject.activite) {
                    result += `<tr class="sonata-ba-view-container"><th style="color:#E91E63">Activité :</th><td>${jsonObject.activite}</td></tr>`;
                }
                if (jsonObject.url) {
                    result += `<tr class="sonata-ba-view-container"><th style="color:#E91E63">URL :</th><td><a href="${jsonObject.url}"> ${jsonObject.url} </a></td></tr>`;
                }
                if (jsonObject.active !== undefined) {
                    result += `<tr class="sonata-ba-view-container"><th style="color:#E91E63">Etat :</th><td>`;
                    if (jsonObject.active == 1) {
                        result += "<span class='btn btn-success'>Activé</span>";
                    } else {
                        result += "<span class='btn btn-danger'>Désactivé</span>";
                    }
                    result += `</td></tr>`;
                }
                if(jsonObject.logo){
                    result += `<tr class="sonata-ba-view-container"><th style="color:#E91E63">Logo :</th><td><img src="<?= base_url('assets/assets/images/')?>${jsonObject.logo}" alt="logo" width="150" height="150"></td></tr>`;
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

        function validateSubject(id,active) {
            console.log(id,active)
            let formdata = new FormData()
            formdata.append('active',active)
            
            fetch('partenaire/validatePartenaire/'+id,{
                method:'POST',
                body:formdata
            }).then(data=>{

                return data.json()
            }).then(response=>{
                if (response.success == true) {
                    let message = active ? "Partenaire activé!" : "Partenaire désactivé!";
                    let icons = active ? "success" : "error";
                    Swal.fire({
                            icon: icons,
                            title: message,
                            showConfirmButton: false,
                            timer: 1500
                        });
                    manageModuleTable.ajax.reload(null, false);
                

                } else {
                    let message = isPublished ? "Erreur lors de l'activation du partenaire." : "Erreur lors de la désactivation du partenaire.";
                    let icons = isPublished ? "success" : "error";
                    Swal.fire({
                            icon: icons,
                            title: message,
                            showConfirmButton: false,
                            timer: 1500
                        });
                }
                
            }) 

        }



        function removeSubject(subjectId = null) {
            // Clear previous messages and show the modal
            $("#messages").html('');
            $("#removeSubjectModal").modal('show');

            if (subjectId) {
                // Unbind any previous click events to avoid multiple bindings
                $("#removeSubjectBtn").unbind('click').bind('click', function() {
                    // Use fetch instead of $.ajax to send the request
                    fetch(`partenaire/removePartenaire/${subjectId}`, {
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
    fetch(`partenaire/getPartenaire/${module_id}`, {
        method: "POST",
    })
        .then((response) => response.json()) // Parse JSON response
        .then((jsonObject) => {
            // Populate the form fields with the fetched data
            $("#editnom").val(jsonObject.nom);
            $("#editactivite").val(jsonObject.activite);
            $("#editurl").val(jsonObject.url);
            document
                .querySelector("#partenaire-logo")
                .setAttribute("src", "assets/assets/images/" + jsonObject.logo);
        })
        .catch((error) => console.error("Error fetching data:", error));

    // Handle form submission
    $("#updatePartenaireForm")
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
                        $("#updatePartenaireForm")[0].reset();
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

    document.addEventListener("DOMContentLoaded", function () {
        const realFileInput = document.getElementById("real-file-logo");
        const customButton = document.getElementById("custom-button-logo");
        const customText = document.getElementById("custom-text-logo");

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
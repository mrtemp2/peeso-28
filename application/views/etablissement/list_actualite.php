<style>
    .modal{
        --bs-modal-width: 800px !important;
    }
</style>
<div class="col-xl-9 col-lg-9 col-md-12">
                            <div class="dashboard__content__wraper">
                                <div class="dashboard__section__title" style="display: flex;align-items:center;justify-content:space-between;">
                                    <h4>Liste Des Actualités</h4>
                                    <a class="default__button" href="<?= base_url('ajout_actualite') ?>">Ajouter Une Actualité</a>
                                </div>

                                
                                <hr class="mt-40">
                              <div class="row">
                                
                                <div class="col-xl-12">
                                    <div class="dashboard__table table-responsive">
                                        <table id="manageModuleTable">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Titre</th>
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
                <h5 class="modal-title" id="exampleModalLabel">Modifier Actualité</h5>
            
                </div>
                <div class="modal-body">
                <form action="news/update_news" method="post" id="createStudentForm" enctype="multipart/form-data">
                    <div class="row">
                    <div class="col-xl-12">
                        <div class="contact__input__wraper">
                        <label for="edit_titre_fr">Titre :</label>
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
                            <label for="edit_titre_en">Image :</label>
                            <div style="
                                border: 0.1px solid #dddddd;
                                margin: 0 0 30px 0;
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
                        <label class="form-control-label" for="edit_content_fr">Contenu : </label>
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
                                    <span id="created_at"></span>
                                    
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

 <script>
             var manageModuleTable;
    
window.addEventListener('load',function() {

   
    manageModuleTable = $("#manageModuleTable").DataTable({
        columns: [{ width: '10%' },{ width: '70%' },{ width: '20%' }],
        'ajax': 'news/fetchDataNews',
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
            $("#ViewSubjectModal").modal('show');
 
            $.post("news/get_news/" + module_id).done(function(response) {
                let data = JSON.parse(response)
                           
                    const {titre,content,created_at,image} = data
                    const base_url = "<?php echo base_url('/assets/assets/images'); ?>";

                    $('#title').html(titre)
                    $('#created_at').html(created_at)
                    $('#extract').html(content)
                    $('#image').attr('src', base_url + '/' + image)
                           
                           //manageModuleTable.ajax.reload(null, false);
            });
    }
     function removeSubject(subjectId = null)
     {

     $("#messages").html('');
     $("#removeSubjectModal").modal('show');

       if (subjectId) {
         $("#removeSubjectBtn").unbind('click').bind('click', function() {
           $.ajax({
            url: 'news/removeNews/' + subjectId,
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
     function editSubject(module_id = null)
     {

       
         $("#updateSubjectModal").modal('show');
       $("#add-module-messages_update").html("")
       $.post("news/get_news/" + module_id).done(function(data) {
        var jsonObject = JSON.parse(data);
        $("#edit_titre_en").val(jsonObject['titre-en']);
        $("#edit_titre_fr").val(jsonObject['titre']);
        document.querySelector('#user-photo').setAttribute('src','assets/assets/images/'+jsonObject.image)
        $('#edit_content_en').html(jsonObject['content-en'])
        $('#edit_content_fr').html(jsonObject['content'])
    })

       $("#createStudentForm").unbind('submit').bind('submit', function(event) {
  event.preventDefault(); // Prevent the default form submission

var form = $(this);
var url = form.attr('action');
var type = form.attr('method');
var formData = new FormData($(this)[0]);

$.ajax({
  url: `${url}/${module_id}` ,
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
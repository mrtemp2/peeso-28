        
<div class="col-xl-9 col-lg-9 col-md-12">
                            <div class="dashboard__content__wraper">
                                <div class="dashboard__section__title" style="display: flex;align-items:center;justify-content:space-between;">
                                    <h4>Liste Des Comptes de Structure D'appui</h4>
                                    <button class="default__button" onclick="addStructure()" href="#">Ajouter Un Compte Structure D'appui</button>
                                </div>

                                
                                <hr class="mt-40">
                              <div class="row">
                                
                                <div class="col-xl-12">
                                    <div class="dashboard__table table-responsive">
                                        <table id="manageModuleTable">
                                            <thead>
                                                <tr>
                                                    <th>Nom</th>
                                                   
                                                    <th>email</th>
                                                    <th>Profile</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                      </table>
                                    </div>
                                </div>
                              </div>
                            </div>

                    
                        </div>
 <div id="addStructure" class="modal fade">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content bd-0 tx-14 loginarea__wraper" style="border:none !important;">
        
            <div class="modal-header login__heading">
                                <h5 class="login__title">Ajouter Un Compte Structure D'appui</h5>
            </div>
          
            <form method="post" id="createStructureForm" action="<?=base_url()?>auth/createStructure" enctype="multipart/form-data" accept-charset="utf-8">
                <div class="row">
                        <div class="col-xl-6">
                            <div class="login__form">
                                <label class="form__label">Nom</label>
                                <input class="common__login__input" type="text" name="nom" id="nom" placeholder="Nom">

                            </div>
                        </div>  
                        <div class="col-xl-6">
                            <div class="login__form">
                                <label class="form__label">Prénom</label>
                                <input class="common__login__input" type="text" name="prenom" id="prenom" placeholder="Prenom">

                            </div>
                        </div>  
                        <div class="col-xl-6">
                            <div class="login__form">
                                <label class="form__label">Raison Sociale</label>
                                <input class="common__login__input" type="text" name="raison_sociale" id="raison_sociale" placeholder="Raisin Sociale">

                            </div>
                        </div>  
                        <div class="col-xl-6">
                            <div class="login__form">
                                <label class="form__label">Adresse Email</label>
                                <input class="common__login__input" type="text" name="email" id="email" placeholder="Adresse Email">

                            </div>
                        </div>  
                        <div class="col-xl-6">
                            <div class="login__form">
                                <label class="form__label">Téléphone</label>
                                <input class="common__login__input" type="text" name="tel" id="tel" placeholder="Téléphone">

                            </div>
                        </div> 
                        <div class="col-xl-6">
                            <div class="login__form">
                                <label class="form__label">Type Établissement</label>
                                <select name="etab" id="etab" style="height: 52px;border-radius: 5px;border: 1px solid #ddd;color: #767676;width:-webkit-fill-available;font-size: 15px;padding-left: 15px;">
                                    <option value="">Sélectionnez votre type</option>
                                    <option value="etab_public">Établissement Public</option>
                                    <option value="etab_prive">Établissement Privé</option>
                                </select>

                            </div>
                        </div>  
                        
                        <div class="col-xl-6">
                            <div class="login__form">
                                <label class="form__label">Nom D'Utilisateur</label>
                                <input class="common__login__input" type="text" name="username" id="username" placeholder="Nom D'Utilisateur">

                            </div>
                        </div> 
                        <div class="col-xl-12">
                            <div class="login__form">
                                <label class="form__label">Mot De Passe</label>
                                <input class="common__login__input" type="password" name="password" id="password" placeholder="Mot De Passe">

                            </div>
                        </div>  
                        <div class="col-xl-12">
                            <div class="login__form">
                                <label class="form__label">Confirmer Mot De Passe</label>
                                <input class="common__login__input" type="password" name="confirmpassword" id="confirmpassword" placeholder="Confirmer Mot De Passe">

                            </div>
                        </div>  
                        
                </div>
                <div class="login__button">
                    <button class="default__button" href="#" id="create-account-btn">Ajouter</button>
                </div>
            
            

            
           
           </form> 

          
          



          <div class="modal-footer">
            <!-- <button type="button" class="close rts-btn btn-secondary" style="color:#fff;" data-dismiss="modal" aria-label="Close">Fermer</button> -->
            <button type="button" style="color: white;" class="btn  btn-secondary tx-11 tx-uppercase pd-y-12 pd-x-25 tx-mont tx-medium mg-b-20" data-bs-dismiss="modal" aria-label="Close">Fermer</button>
          </div>
        </div>
      </div>
    </div>
    <div id="updateStructure" class="modal fade">
      <div class="modal-dialog modal-lg" id="updateModalContent" role="document">
      </div>
    </div>
    


 <script>
             var manageModuleTable;
    
window.addEventListener('load',function() {

    manageModuleTable = $("#manageModuleTable").DataTable({
        columns: [{ width: '25%' },{ width: '25%' }, { width: '25%' },{ width: '25%' }],
        'ajax': 'auth/fetchStructureData',
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
  
            $('#createStructureForm').on('submit',function (e){
                e.preventDefault()
                const action  = $('#createStructureForm').attr('action')
               
                const formData = new FormData(this)
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
                        manageModuleTable.ajax.reload(null, false);
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

});
function validerCompte(userId){
    overlayOn()
    fetch('<?=base_url()?>admin/validateStudent/'+userId).then(data=>{
        return data.json()
    }).then(data=>{
        if(data.success){
                        Swal.fire({
                                icon:'success' ,
                                title: 'Succés',
                                text: data.message
                        });  
                        manageModuleTable.ajax.reload(null, false);
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
        overlayOff()

        alert(e.message)


    })

}

function addStructure(){
    $('#addStructure').modal('show') 

}
function updateStructure(id){
    let updateStructureForm
    overlayOn()
    $('#updateModalContent').load('<?=base_url()?>auth/getUpdateStructureForm/'+id,(complete)=>{
       
        setTimeout(()=>{
            $('#updateStructure').modal('show')
            overlayOff()

            $('#updateStructureForm').unbind('submit').on('submit',function(e){
                e.preventDefault()
                overlayOn()
                const action  = $('#updateStructureForm').attr('action')
                const formData = new FormData(this)
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
                        manageModuleTable.ajax.reload(null, false);
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
                    overlayOff()
                })

            })
        },2000)
    })
    }
    function deleteStructure(id) {
        Swal.fire({
            icon: 'info',
            title: 'Voulez-vous supprimer?',
            showCancelButton: true,
            confirmButtonText: 'Oui',
            cancelButtonText: 'Non',
        }).then((result) => {
            if (result.isConfirmed) {
                // Show overlay
                overlayOn();

                fetch('<?= base_url() ?>auth/removeStructure/' + id)
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Succès',
                                text: data.message,
                            });
                            manageModuleTable.ajax.reload(null, false);
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Erreur',
                                text: data.message,
                            });
                        }
                        // Hide overlay
                        overlayOff();
                    })
                    .catch(error => {
                        Swal.fire({
                            icon: 'error',
                            title: 'Erreur',
                            text: 'Une erreur est survenue: ' + error.message,
                        });
                        // Hide overlay
                        overlayOff();
                    });
            }
        });
    }



 </script>                       
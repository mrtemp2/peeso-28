<style>
                      .course-thumbnail-upload-area {
        display: flex;
        align-items: center;
        gap: 30px;
    }
    .course-thumbnail-upload-area .information .input-file-type-btn {
    position: relative;
    margin-top: 10px;
    }
    .course-thumbnail-upload-area .information input {
        position: absolute;
        width: 100%;
        height: 100%;
        opacity: 0;
        left: 0;
        top: 0;
        cursor: pointer;
    }
    .course-thumbnail-upload-area .information button {
        padding: 13px 25px;
    }
     
</style>
<div class="col-xl-9 col-lg-9 col-md-12">
                            <div class="dashboard__content__wraper">
                                <div class="dashboard__section__title" style="display: flex;align-items:center;justify-content:space-between;">
                                    <h4>Mes Demandes </h4>
                                </div>

                                
                                <hr class="mt-40">
                              <div class="row">
                                
                                <div class="col-xl-12">
                                    <div class="dashboard__table table-responsive">
                                        <table id="manageModuleTable">
                                            <thead>
                                                <tr>
                                                    <th>Formation</th>
                                                   
                                                    <th>Etat</th>
                                                </tr>
                                            </thead>
                                      </table>
                                    </div>
                                </div>
                              </div>
                            </div>

                    
                        </div>
    


 <script>
             var manageModuleTable;
    
window.addEventListener('load',function() {

    manageModuleTable = $("#manageModuleTable").DataTable({
        columns: [{ width: '70%' },{ width: '30%' }],
        'ajax': 'formation/getStudentDemandes',
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
})
function acceptDemande(demandeId){
    $('#acceptDemandeModal').modal('show') 

}
function updateFormation(id){
    let updateReferentForm
    overlayOn()
    $('#updateModalContent').load('<?=base_url()?>formation/getUpdateFormationForm/'+id,(complete)=>{
       
        setTimeout(()=>{
            $('.js-example-domaine-multiple').select2({
                dropdownParent: $('#updateFormation'), // Ensure the dropdown is rendered within the modal
                placeholder: "Sélectionnez des domaines",
                width: '100%'
             });
            $('#updateFormation').modal('show')
            overlayOff()

            $('#updateFormationForm').unbind('submit').on('submit',function(e){
                e.preventDefault()
                overlayOn()
                const action  = $('#updateFormationForm').attr('action')
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
        },1000)
    })
    }
    function inviteStudents(id){
  
    overlayOn()
    $('#inviteModalContent').load('<?=base_url()?>formation/getUpdateInvitationForm/'+id,(complete)=>{
       
        setTimeout(()=>{
            $('.js-example-students-multiple').select2({
                dropdownParent: $('#inviteStudentsModal'), // Ensure the dropdown is rendered within the modal
                placeholder: "Sélectionnez des domaines",
                width: '100%'
             });
            $('#inviteStudentsModal').modal('show')
            overlayOff()

            $('#inviteStudentsForm').unbind('submit').on('submit',function(e){
                e.preventDefault()
                overlayOn()
                const action  = $('#inviteStudentsForm').attr('action')
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
    


 </script>                       
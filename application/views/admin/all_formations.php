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
                                    <h4>Liste Des Formation</h4>
                                    <button class="default__button" onclick="ajouterFormation()" href="#">Ajouter Formation</button>
                                </div>

                                
                                <hr class="mt-40">
                              <div class="row">
                                
                                <div class="col-xl-12">
                                    <div class="dashboard__table table-responsive">
                                        <table id="manageModuleTable">
                                            <thead>
                                                <tr>
                                                    <th>Formation</th>
                                                    <th>Date Début</th>
                                                   
                                                    <th>Formateur</th>
                                                    <th>details</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                      </table>
                                    </div>
                                </div>
                              </div>
                            </div>

                    
                        </div>
    <div id="updateFormation" class="modal fade">
      <div class="modal-dialog modal-lg" id="updateModalContent" role="document">
      </div>
    </div>
    <div id="inviteStudentsModal" class="modal fade">
      <div class="modal-dialog modal-lg" id="inviteModalContent" role="document">
      </div>
    </div>
    <div id="inviteGroupsModal" class="modal fade">
      <div class="modal-dialog modal-lg" id="inviteGroupsContent" role="document">
      </div>
    </div>
    <div id="createFormation" class="modal fade">
      <div class="modal-dialog modal-lg" id="createFormationContent" role="document">
      </div>
    </div>
    
    


 <script>
             var manageModuleTable;
 
window.addEventListener('load',function() {
    console.log('bitch')
    
    manageModuleTable = $("#manageModuleTable").DataTable({
        columns: [{ width: '17%' },{ width: '18%' },{ width: '20%' }, { width: '20%' },{ width: '25%' }],
        'ajax': 'formation/fetchFormationData',
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

function ajouterFormation(){
    let updateReferentForm
    overlayOn()
    $('#createFormationContent').load('<?=base_url()?>formation/createFormationContent',(complete)=>{
        
        setTimeout(()=>{
            

            $('.js-example-invited-multiple').select2({
              dropdownParent: $('#createFormation'), // Ensure the dropdown is rendered within the modal
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
            $('#createFormation').modal('show')

            overlayOff()
            $('#submit-formation').unbind('click').on('click',function (e){
                e.preventDefault()
                const action  = $('#createFormationForm').attr('action')
                const form = document.querySelector('#createFormationForm')
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
    function createInputElement(inputName,label,typeInput,placeHolder){
            const parentElement = document.createElement('div')  
            parentElement.classList.add('col-xl-4') 
            const loginFormElement = document.createElement('div')  
            loginFormElement.classList.add('login__form') 
            const labelElement =  document.createElement('label')
            labelElement.classList.add('form__label') 
            labelElement.innerHTML = label
            const inputElement = document.createElement('input')
            inputElement.classList.add('common__login__input')
            inputElement.setAttribute('type',typeInput)
            inputElement.setAttribute('name',inputName)
            inputElement.setAttribute('id',inputName)
            inputElement.setAttribute('placeholder',placeHolder)
            parentElement.appendChild(loginFormElement) 
            loginFormElement.append(labelElement) 
            loginFormElement.append(inputElement)
            return parentElement

    }
    function addSeance(){
        


        const currentNbSeance = parseInt(document.querySelector('#nb_seance').value)+1
        const nomInputElement =createInputElement('nom_seance_'+currentNbSeance,'Nom De La Seance','text','Nom De La Seance')
        const dateDebutElement =createInputElement('date_debut_seance_'+currentNbSeance,'Date Début','datetime-local','Date Début')
        const dateFinElement =createInputElement('date_fin_seance_'+currentNbSeance,'Date Fin','datetime-local','Date Fin')
        const dateInputs = document.querySelector('#seance_inputs')
        dateInputs.appendChild(nomInputElement)
        dateInputs.appendChild(dateDebutElement)
        dateInputs.appendChild(dateFinElement)
        $('#nb_seance').val(currentNbSeance)
    }
    function inviteGroups(id){
  
  overlayOn()
  $('#inviteGroupsContent').load('<?=base_url()?>formation/getGroupInvitationForm/'+id,(complete)=>{
     
      setTimeout(()=>{
          $('.js-example-groups-multiple').select2({
              dropdownParent: $('#inviteGroupsModal'), // Ensure the dropdown is rendered within the modal
              placeholder: "Sélectionnez des domaines",
              width: '100%'
           });
          $('#inviteGroupsModal').modal('show')
          overlayOff()

          $('#inviteGroupeForm').unbind('submit').on('submit',function(e){
              e.preventDefault()
              overlayOn()
              const action  = $('#inviteGroupeForm').attr('action')
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
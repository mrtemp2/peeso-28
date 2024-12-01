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
                                    <h4>Liste Des Demandes <span style="font-size:17px; font-family:cursive">(Coaching)</span> </h4>
                                    <!-- <button class="default__button" onclick="ajouterFormation()" href="#">Ajouter Formation</button> -->
                                </div>

                                
                                <hr class="mt-40">
                              <div class="row">
                                
                                <div class="col-xl-12">
                                    <div class="dashboard__table table-responsive">
                                        <table id="manageModuleTable">
                                            <thead>
                                                <tr>
                                                    <th>Etudiant</th>
                                                    <th>Coaching</th>
                                                    <th>profile</th>
                                                    <th>Accepter</th>
                                                </tr>
                                            </thead>
                                      </table>
                                    </div>
                                </div>
                              </div>
                            </div>

                    
                        </div>
    

 <div id="inscriptionModal" class="modal fade">
      <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content bd-0 tx-14 loginarea__wraper" style="border:none !important;">
                <div class="modal-header login__heading">
                                    <h5 class="login__title">Accepter La Demande Pour Ce Coaching</h5>
                </div>
                <div style="display:flex;align-items: center;justify-content: space-between;">
                     <a id="demandCoaching" class="default__button" style="margin-top:15px" href="#">Accepter</a>
                                                           
                     <button onclick="closeModal('#inscriptionModal')" class="bg-danger default__button" style="margin-top:15px" href="#">Fermer</button>
                </div>
            </div>
            

      </div>
 </div>
 <script>
    

             var manageModuleTable;
    
window.addEventListener('load',function() {

    manageModuleTable = $("#manageModuleTable").DataTable({
        columns: [{ width: '25%' },{ width: '25%' }, { width: '25%' },{ width: '25%' }],
        'ajax': 'coaching/fetchNotAcceptedDemandesCoachingDept',
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
    $('#inscriptionModal').modal('show') 
    $('#demandCoaching').unbind('click').on('click',e=>{
            e.preventDefault()
            overlayOn()
            fetch('<?=base_url()?>coaching/acceptDemand/'+demandeId).then(data=>{
                return data.json()
            }).then(data=>{
                        if(data.success){
                            Swal.fire({
                                icon:'success' ,
                                title: 'Succés',
                                text: data.message
                            });  
                            overlayOff()
                            manageModuleTable.ajax.reload(null, false);
                        }
                        else{
                            Swal.fire({
                                icon:'erreur' ,
                                title: 'Erreur',
                                text: data.message
                            });  
                            overlayOff()
                        }
                        
            }).catch(e=>{
                alert('une erreur s\'etait produite')
            })


        })
}
    


 </script>                       
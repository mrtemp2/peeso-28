<style>
    .search-input{
        background-color: transparent;
        border: 1px solid var(--borderColor);
        font-size: 14px;
        font-weight: 400;
        height: 52px;
        padding: 3px 20px;
        width: 100%;
        border-radius: 5px;
        color: var(--contentColor);
    }
</style>
<div class="col-xl-9 col-lg-9 col-md-12">
                            <div class="dashboard__content__wraper">
                                <div class="dashboard__section__title">
                                    <h4>Tous Les Formations</h4>
                                </div>
                                        <div class="row">
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12" style="position: relative;">
                                                <input type="text" placeholder="Chercher Des Formations" class="search-input">
                                                <button class="default__button" style="
                                                        top: 10px;
                                                        font-weight: 700;
                                                        font-size: 14px;
                                                        /* right: 2px; */
                                                        right: 1.25rem;
                                                        position: absolute;
                                                        padding: 3px 20px;
                                                    ">
                                                            chercher
                                                            
                                                </button>
                                            </div>
                                        </div>
                                       
                                        <div id="formation_content">
                                            
                                        </div>
                            </div>
</div>        

<div id="inscriptionModal" class="modal fade">
      <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content bd-0 tx-14 loginarea__wraper" style="border:none !important;">
                <div class="modal-header login__heading">
                                    <h5 class="login__title">S'inscritre A cette Formation</h5>
                </div>
                <div style="display:flex;align-items: center;justify-content: space-between;">
                     <a id="demandFormation" class="default__button" style="margin-top:15px" href="#">S'inscrire</a>
                                                           
                     <button onclick="closeModal('#inscriptionModal')" class="bg-danger default__button" style="margin-top:15px" href="#">Fermer</button>
                </div>
            </div>
            

      </div>
 </div>
<script>
    var filter = {
        q:"",
        page:1
    }
    
    window.addEventListener('load',(whatever)=>{
        loadData()
        $('.search-input').on('change',e=>{
            filter.q = $('.search-input').val()
           

        })


    })
    function loadingOn(){

        $('#formation_content').html('<div class="spinner-border" id="loading" role="status">                 <span class="sr-only">Loading...</span></div>')
    }
    function loadData(){
        overlayOn()
        const formData = new FormData()
        Object.keys(filter).forEach(key => {
                formData.append(key,filter[key])
        });
        $('#formation_content').load('<?=base_url()?>formation/getFormationsStudent',filter,(complete)=>{
            $('#loading').css('display','none')
           
            overlayOff()

        })
        

    }
    function inscription(formationId){
        $("#inscriptionModal").modal("show")   
        $('#demandFormation').unbind('click').on('click',e=>{
            e.preventDefault()
            overlayOn()
            fetch('<?=base_url()?>formation/createDemandeFormation/'+formationId).then(data=>{
                return data.json()
            }).then(data=>{
                        if(data.success){
                            Swal.fire({
                                icon:'success' ,
                                title: 'Succés',
                                text: data.message
                            });  
                            loadData()
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
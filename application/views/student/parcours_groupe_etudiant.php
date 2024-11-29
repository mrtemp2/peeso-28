

<?php
    $formation = $info['formation'];
    $referent = $info['referent'];
    $domaines = $info['domaines'];
?>
<div class="col-xl-9 col-lg-9 col-md-12">
                            <div class="dashboard__content__wraper">
                                    <div class="dashboard__section__title">
                                        <div style="display: flex;align-items: center; justify-content:space-between;width: 100%;">
                                            <h4><?=$formation['nom']?></h4> 
                                            <div class="google-apple-wrapper" style="margin-top: 0px;">
                                                     <a href="<?=base_url('auth/google_login')?>" class="google">
                                                            <img src="<?=base_url('public/new/img/google_link.png')?>" alt="contact">
                                                        </a>  
                                            </div>
                                        </div>    
                                        
                                    </div>
                                    <div class="blogarea__2 sp_top_100 sp_bottom_100">
                                            <div class="container">
                                                <div class="row">

                                                    <div class="col-xl-12 col-lg-12">

                                                        

                                                        <div class="blog__details__content__wraper">
                                                            <div class="course__button__wraper" data-aos="fade-up">
                                                               
                                                                <div class="course__date" style="gap: 10px;align-items: center;display: flex;">
                                                                        <p>Formateur:</p>
                                                                    <div class="formateur_item">
                                                                            <?=$referent['nom']?>  <?=$referent['prenom']?>

                                                                        </div>
                                                                </div> 
                                                                
                                                            </div>
                                                            <div class="course__details__heading" data-aos="fade-up">
                                                                <h3><?= $formation['nom'] ?></h3>
                                                            </div>
                                                            <div>
                                                                <div class="detail-item">
                                                                    <div class="block-item" onclick="getElementDetails('#seance-content')">
                                                                        <div class="block-item-title"> 
                                                                            <div class="block-item-image" style="background-image: url('<?=base_url('public/new/img/icon/seance.png')?>');">

                                                                            </div> 
                                                                            <div>
                                                                                Séances
                                                                            </div>   
                                                                        </div>
                                                                        <div>
                                                                        <i class="icofont-rounded-down"></i>
                                                                        </div>
                                                                    </div>
                                                                    <div data-callback="getDetailsSeance" class="block-item-content collapse" id="seance-content">
                                                                     </div>   
                                                                </div> 
                                                               
                                                               
                                                            </div>
                                                            

                                                                        
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                    </div>
                               </div>     
                               
</div>        

<script>
    var callbacks = {
        getDetailsActivities:(targetId)=>{
            const seanceId = $(targetId).data('seance')

            return new Promise((resolve,reject)=>{
                $(targetId).load('<?=base_url('activity/getDetailsActivitiesEtudiant')?>/'+seanceId,(complete)=>{
                    resolve()
                })
            })
        },
        getDetailsModule:(targetId)=>{
            const seanceId = $(targetId).data('seance')
            return new Promise((resolve,reject)=>{
                $(targetId).load('<?=base_url('module/getDetailsModule')?>/'+seanceId,(complete)=>{
                    resolve()
                })
            })

        },
        getDetailsSeance:(targetId)=>{
            return new Promise((resolve,reject)=>{
                $(targetId).load('<?=base_url('seance/getDetailsSeanceEtudiant/'.$formation['id'])?>',(complete)=>{
                    resolve()
                })
            })
        },
        getSingleSeance:(targetId)=>{
            return new Promise((resolve,reject)=>{
                const seanceId = $(targetId).data('seance')
                $(targetId).load(`<?=base_url('seance/getSingleSeanceEtudiant')?>/${seanceId}`,(complete)=>{
                    resolve()
                })
            })

        }

    }
    
        function getElementDetails(targetId){
            const functionName =  $(targetId).data('callback')
            if(functionName){
                const callback =   callbacks[functionName]
                overlayOn()    
                callback(targetId).then(d=>{
                    overlayOff()
                    $(targetId).collapse('toggle')
                })
            }
            else{
                $(targetId).collapse('toggle')
            }
            
        }
        function reloadSeance(seanceId){
            overlayOn()
            const targetId = `details-seances-${seanceId}`
            $(targetId).load(`<?=base_url('seance/getSingleSeance')?>/${seanceId}/<?=$_GET['progression_id']?>`,(complete)=>{
                    overlayOff()    
              
            })

        }
        function startSeance(seanceId){
                overlayOn()
                fetch(`<?=base_url('seance/startSeance')?>/${seanceId}/<?=$_GET['progression_id']?>`).then(data=>{
                    return data.json()
                }).then(data=>{
                    if(data.success){
                        Swal.fire({
                                icon:'success' ,
                                title: 'Succés',
                                text: data.message
                        });  
                        reloadSeance(seanceId)
                    
                    }
                    else{
                        Swal.fire({
                                icon:'error' ,
                                title: 'Erreur',
                                text: data.message
                        });  
                        overlayOff()
                    }
                }).catch(e=>{

                    alert('une erreur s\'est produite')
                    overlayOff()
                })


        }

</script>
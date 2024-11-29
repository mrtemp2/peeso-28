

<?php
    $formation = $info['formation'];
    $referent = $info['referent'];
    $domaines = $info['domaines'];
?>
<div class="col-xl-9 col-lg-9 col-md-12">
                            <div class="dashboard__content__wraper">
                                    <div class="dashboard__section__title">
                                        <h4><?=$formation['nom']?></h4>
                                    </div>
                                    <div class="blogarea__2 sp_top_100 sp_bottom_100">
                                            <div class="container">
                                                <div class="row">

                                                    <div class="col-xl-12 col-lg-12">

                                                        <div class="blogarae__img__2 course__details__img__2" data-aos="fade-up">
                                                            <?php
                                                                if(!$formation['thumbnail']){
                                                                    $photo = base_url('public/new').'/img/blog/blog_8.png';
                                                                }
                                                                else{
                                                                    $photo = base_url('assets/assets/images/'.$formation['thumbnail']);
                                                                }
                                                            ?>    
                                                            <img loading="lazy"  src="<?=$photo?>" alt="blog">

                                                            <!-- <div class="registerarea__content course__details__video">
                                                                <div class="registerarea__video">
                                                                    <div class="video__pop__btn">
                                                                        <a class="video-btn" href="https://www.youtube.com/watch?v=vHdclsdkp28"> <img loading="lazy"  src="img/icon/video.png" alt=""></a>
                                                                    </div>


                                                                </div>
                                                            </div> -->
                                                        </div>

                                                        <div class="blog__details__content__wraper">
                                                            <div class="course__button__wraper" data-aos="fade-up">
                                                                <div class="course__button" style="display: flex;align-items:center;flex:wrap:wrap;">
                                                                    <?php
                                                                     foreach($domaines as $d){
                                                                    ?>
                                                                    <span class="domain_item_large" style="background-color:<?=$d['color']?> !important;border-color:<?=$d['color']?> !important"><?=$d['nom']?></span>
                                                                    <?php
                                                                     }
                                                                    ?>
                                                                    
                                                                </div>
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
                                                               
                                                                <div class="detail-item">
                                                                    <div class="block-item" onclick="getElementDetails('#module-content')">
                                                                        <div class="block-item-title"> 
                                                                            <div class="block-item-image" style="background-image: url('<?=base_url('public/new/img/icon/module.png')?>');">
                                                                                
                                                                            </div> 
                                                                            <div>
                                                                                 Modules
                                                                            </div>   
                                                                        </div>
                                                                        <div>
                                                                            <i class="icofont-rounded-down"></i>
                                                                        </div>
                                                                    </div>
                                                                    <div data-callback="getDetailsModule" class="block-item-content collapse" id="module-content">
                                                                    </div> 
                                                                </div>
                                                                <div class="detail-item">

                                                                    <div class="block-item" onclick="getElementDetails('#activity-content')">
                                                                        <div class="block-item-title"> 
                                                                            <div class="block-item-image" style="background-image: url('<?=base_url('public/new/img/icon/activity.png')?>');">

                                                                            </div> 
                                                                            <div>
                                                                                Activitées
                                                                            </div>   
                                                                        </div>
                                                                        <div>
                                                                            <i class="icofont-rounded-down"></i>
                                                                        </div>
                                                                    </div>
                                                                    <div data-callback="getDetailsActivity" class="block-item-content collapse" id="activity-content" >
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
<div id="createRandezVousModal" class="modal fade">
      <div class="modal-dialog modal-lg" id="createRandezVousContent" role="document">
      </div>
</div>
<script>
    var callbacks = {
        getDetailsActivity:(targetId)=>{
            return new Promise((resolve,reject)=>{
                $(targetId).load('<?=base_url('activity/getDetailsActivity/'.$_GET['progression_id'])?>',(complete)=>{
                    resolve()
                })
            })

        },
        getSingleActivity:(targetId)=>{
            const activityId = $(targetId).data('activity')
            return new Promise((resolve,reject)=>{
                $(targetId).load('<?=base_url('activity/getSingleActivityReferent')?>/'+activityId+'/<?=$_GET['progression_id']?>',(complete)=>{
                    resolve()
                })
            })

        },
        getDetailsModule:(targetId)=>{
            return new Promise((resolve,reject)=>{
                $(targetId).load('<?=base_url('module/getDetailsModule/'.$_GET['progression_id'])?>',(complete)=>{
                    resolve()
                })
            })

        },
        getDetailsSeance:(targetId)=>{
            return new Promise((resolve,reject)=>{
                $(targetId).load('<?=base_url('seance/getDetailsSeance/'.$_GET['progression_id'])?>',(complete)=>{
                    resolve()
                })
            })
        },
        getSingleSeance:(targetId)=>{
            return new Promise((resolve,reject)=>{
                const seanceId = $(targetId).data('seance')
                $(targetId).load(`<?=base_url('seance/getSingleSeance')?>/${seanceId}/<?=$_GET['progression_id']?>`,(complete)=>{
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
                       document.location.reload()
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
        function planifierSeance(groupe_seance_id){
            overlayOn()
            $('#createRandezVousContent').load('<?=base_url()?>randezvous/prepareRandezVousForm/'+groupe_seance_id,(complete)=>{
            
                setTimeout(()=>{
                    
                    $('#createRandezVousModal').modal('show')
                    overlayOff()

                    $('#createRandezVousForm').unbind('submit').on('submit',function(e){
                        e.preventDefault()
                        overlayOn()
                        const action  = $('#createRandezVousForm').attr('action')
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
                            overlayOff()
                        })

                    })
                },1000)
            })
            

        }

</script>
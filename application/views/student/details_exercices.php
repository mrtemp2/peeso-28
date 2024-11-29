<?php
    $activity = $info['activity'];
    $activity_status = $info['activity_status'];



?>
<div class="col-xl-9 col-lg-9 col-md-12">
    <div class="dashboard__content__wraper">
        <div class="dashboard__section__title">
            <h4><?=$activity['titre']?></h4>
        </div>
        <div class="activity-wrapper">
                <div class="activity-content">
                    <p>
                        Travail demandé:
                    
                    </p>
                    <?=$activity['instructions']?>
                    <?php
                        if($activity['document']){
                    ?>
                    <div class="activity-file">
                        <img style="max-width: 100%;" src="https://esen-sci-compet.com/peeso-22/public/new/img/thumbnails/document-thumbnail.png" alt="">
                        <div class="activity-file-action">
                                <a download="<?=$activity['document']?>" href="<?=base_url('assets/assets/images/'.$activity['document'])?>" style="font-size: 1rem;color: var(--greencolor2);">
                                    <i class="icofont-download"></i>
                                </a>
                        </div>
                    </div>
                    <?php
                        }
                    
                    ?>
                </div>
                <div class="devoir">
                        <div class="devoir-header">
                            Votre Devoir :
                            <?php
                                $filename = 'Choisir Un Fichier';
                                
                                if($activities_status && $activity_status['document']){
                                    $filename = $activity_status['document'];
                                
                            ?>
                            <a href="<?=base_url('assets/assets/images/'.$activity_status['document'])?>"></a>
                            <?php
                                }
                                
                            ?>

                        </div>
                        <form method="post" id="livrerDevoirForm" action="<?=base_url('activity/livrerActivity')?>" enctype="multipart/form-data" accept-charset="utf-8">
                                <div class="row">
                                        
                                        
                                        
                                        
                                </div>
                                <input type="hidden" name="activity_id" value="<?=$activity['id']?>" >
                                <input type="file" name="document" id="activity_document"  hidden>
                                <div class="login__button" style="gap: 10px;display: flex;flex-direction: column;">
                                    
                                    <span class="choose-file-button" onclick="openFileChooser('#activity_document')">
                                        <i class="icofont-cloud-upload"></i> 
                                        <?=$filename?>
                                    </span>
                                
                                
                                        
                                        <?php
                                            if($activities_status && $activity_status['document']){
                                            ?>
                                    <button disabled class="default__button"  id="livrer-devoir">
                                            
                                           Modifier Le Devoir

                                    </button>
                                    <?php
                                            }else{
                                    ?>
                                    <button disabled class="default__button"  id="livrer-devoir">
                                            
                                            Remettre Le Devoir
 
                                     </button>
                                     <?php }  ?>
                                </div>
                            
                            
                    
                            
                            
                        </form>
                        
                </div>
        </div>
    </div>
</div>
<script>
    const submitButton =document.querySelector('#livrer-devoir')
    function openFileChooser(targetId){
            const fileInput = document.querySelector(targetId)
            fileInput.click()
            fileInput.addEventListener('change',e=>{
                if(fileInput.files[0]){
                    submitButton.disabled=false
                }
                else{
                    submitButton.disabled=true
                }


            })
            
    }
    window.addEventListener('load',e=>{
        $('#livrerDevoirForm').on('submit',function(e){

            e.preventDefault()
            overlayOn()
            const formData = new FormData(this)
            const action = $('#livrerDevoirForm').attr('action')
            fetch(action,{
                body:formData,
                method:'POST'
            }).then(data=>{
                return data.json()
            }).then(data=>{
                if(data.success){
                    Swal.fire({
                        icon:'success' ,
                        title: 'Succés',
                        text: data.message
                    });  
                   
                }
                else{
                    Swal.fire({
                        icon:'erreur' ,
                        title: 'Erreur',
                        text: data.message
                    });  
                    
                }
                overlayOff()
            }).catch(e=>{
                alert('une erreur s\'est produite')
            })
       
        })
    })



</script>


<?php
    $activity = $info['activity'];
  

?>


<div class="modal-content bd-0 tx-14 loginarea__wraper" style="border:none !important;">
        
        <div class="modal-header login__heading">
                            <h5 class="login__title">Modifier L'activité</h5>
        </div>
      
        <form method="post" id="modifierActivity" action="<?=base_url()?>activity/updateActivity/<?=$activity['id']?>" enctype="multipart/form-data" accept-charset="utf-8">
            <div class="row">
                  
                    
                    
                    <div class="col-xl-12">
                        <div class="login__form">
                            <label class="form__label">Titre</label>
                            <input class="common__login__input" name="titre" id="update_titre" value="<?=$activity['titre']?>">
                               
                        
                        </div>
                    </div>
                    <div class="col-xl-12">
                        <div class="login__form">
                            <label class="form__label">Instructions</label>
                            <textarea name="instructions" class="common__login__input" id="update_instructions">

                                   <?=$activity['instructions']?>

                            </textarea>
                               
                        
                        </div>
                    </div>
                    <div class="col-xl-12">
                    <?php
                                                                $filename = "Aucun fichier choisit";
                                                                if($activity['document']){    
                                                                    $filename =  $activity['document'];

                                                                }
                                                            
                                                            ?>
                                            
                                <label class="form__label">Ajouter Un Document (Optionnel)</label>
                                <div class="course-thumbnail-upload-area" style="margin-bottom: 10px;">
                                        <?php
                                                                $photo = base_url().'public/new/img/thumbnails/document-thumbnail.png';
                                                                
                                                                
                                        ?>
                                        <div>
                                            <img style="height: 100px;" loading="lazy" src="<?=$photo?>" alt="" id="real-img">
                                        </div>
                                        <div class="information">
                                            <span style="display: block;font-weight: 700;" >File Support: PDF, Doc, Docx</span>
                                            <div class="input-file-type-btn">
                                           
                                                <input type="file" id="update_activity_file"  name="document" hidden  accept=".doc,.docx,.pdf">
                                                <button type="button" class="default__button" onclick="openFileChooser('#update_activity_file')" >Choisir Un Fichier</button>
                                                <span class="custom-text" style="font-weight: 700;">
                                                         <?=$filename?>
                                                </span>
                                            </div>
                                        </div>


                                </div>

                    </div>  
                    
                    
                    
            </div>
            <div class="login__button">
                                        <button class="default__button" href="#">Modifier</button>
             </div>
        
        

        
       
       </form> 

      
      



      <div class="modal-footer">
        <!-- <button type="button" class="close rts-btn btn-secondary" style="color:#fff;" data-dismiss="modal" aria-label="Close">Fermer</button> -->
        <button type="button"  class="rts-btn  btn-secondary" data-bs-dismiss="modal" aria-label="Close">Fermer</button>
      </div>
    </div>

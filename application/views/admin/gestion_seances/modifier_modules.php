<?php
    $module = $info['module'];
  

?>


<div class="modal-content bd-0 tx-14 loginarea__wraper" style="border:none !important;">
        
        <div class="modal-header login__heading">
                            <h5 class="login__title">Modifier Le Module</h5>
        </div>
      
        <form method="post" id="modifierModule" action="<?=base_url()?>module/updateModule/<?=$module['id']?>" enctype="multipart/form-data" accept-charset="utf-8">
            <div class="row">
                  
                    
                    
                    <div class="col-xl-12">
                        <div class="login__form">
                            <label class="form__label">Nom Du Module</label>
                            <input class="common__login__input" name="titre" id="titre_module" value="<?=$module['titre']?>">
                               
                        
                        </div>
                    </div>
                    <div class="col-xl-12">
                    <?php
                                                                $filename = "Aucun fichier choisit";
                                                                if($module['document']){    
                                                                    $filename =  $module['document'];

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
                                           
                                                <input type="file" id="update_module" name="document" hidden  accept=".doc,.docx,.pdf">
                                                <button type="button" class="default__button" onclick="openFileChooser('#update_module')" >Choisir Un Fichier</button>
                                                <span class="custom-text" style="font-weight: 700;">
                                                         <?=$filename?>
                                                </span>
                                            </div>
                                        </div>


                                </div>

                    </div>  
                    
                    
                    
            </div>
            <div class="login__button">
                                        <button class="default__button" href="#" id="create-account-btn">Modifier</button>
             </div>
        
        

        
       
       </form> 

      
      



      <div class="modal-footer">
        <!-- <button type="button" class="close rts-btn btn-secondary" style="color:#fff;" data-dismiss="modal" aria-label="Close">Fermer</button> -->
        <button type="button"  class="rts-btn  btn-secondary" data-bs-dismiss="modal" aria-label="Close">Fermer</button>
      </div>
    </div>

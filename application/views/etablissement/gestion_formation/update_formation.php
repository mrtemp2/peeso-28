<?php
    $formation = $info['formation'];
    $formation_domaines = $info['domaine_ids'];
    $all_domaines = $info['domaines'];

?>


<div class="modal-content bd-0 tx-14 loginarea__wraper" style="border:none !important;">
        
        <div class="modal-header login__heading">
                            <h5 class="login__title">Modifier Formation</h5>
        </div>
      
        <form method="post" id="updateFormationForm" action="<?=base_url()?>formation/updateFormation/<?=$formation['id']?>" enctype="multipart/form-data" accept-charset="utf-8">
            <div class="row">
                    <div class="col-xl-6">
                        <div class="login__form">
                            <label class="form__label">Nom</label>
                            <input class="common__login__input" type="text" value="<?=$formation['nom']?>" name="editnom" id="editnom" placeholder="Nom">

                        </div>
                    </div>  
                    
                    
                    <div class="col-xl-12">
                        <div class="login__form">
                            <label class="form__label">Domaines</label>
                            <select class="common__login__input js-example-domaine-multiple" name="editdomaines[]" id="editdomaines" multiple="multiple">
                                <?php foreach($all_domaines as $value){ ?>
                                    <?php if(in_array($value['id'],$formation_domaines)) {?>
                                        <option value="<?= $value['id']?>" selected><?= $value['nom']?></option>
                                        <?php
                                            }else{
                                        ?>
                                            <option value="<?= $value['id']?>"><?= $value['nom']?></option>
                                        <?php
                                            }
                                        ?>
                                <? }?>     
                            </select>
                        
                        </div>
                    </div>  
                    <div class="col-xl-12">
                                <label class="form__label">Thumbnail</label>
                                <div class="course-thumbnail-upload-area" style="margin-bottom: 10px;">
                                        <?php
                                            if(!$formation['thumbnail']){
                                                $photo = base_url().'public/new/img/blog/blog_8.png';
                                                $fileName = 'Aucun fichier choisit';
                                            }
                                            else{
                                                $photo = base_url().'assets/assets/images/'.$formation['thumbnail'];
                                                $fileName = $formation['thumbnail'];
                                            }
                                        ?>
                                        <div>
                                            <img style="height: 100px;" loading="lazy" src="<?=$photo?>" alt="" id="thumbnail_image">
                                        </div>
                                        <div class="information">
                                            <span style="display: block;font-weight: 700;" >Size: 700 X 430 Pixels</span>
                                            <span style="display: block;font-weight: 700;" >File Support: PNG, JPG, JPEG</span>
                                            <div class="input-file-type-btn">
                                                <input type="file" id="thumbnail_input" name="thumbnail" hidden accept="image/*">
                                                <button type="button" class="default__button" onclick="openFileChooser('#thumbnail_input','#thumbnail_image')" >Choisir Un Fichier</button>
                                                <span class="custom-text" style="font-weight: 700;"><?=$fileName?></span>
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
        <button type="button" style="color: white;" class="rts-btn  btn-secondary tx-11 tx-uppercase pd-y-12 pd-x-25 tx-mont tx-medium mg-b-20" data-bs-dismiss="modal" aria-label="Close">Fermer</button>
      </div>
    </div>

<?php
    $referents = $info['referents'];
    $formation = $info['formation'];

?>


<div class="modal-content bd-0 tx-14 loginarea__wraper" style="border:none !important;">
        
        <div class="modal-header login__heading">
                            <h5 class="login__title">Affecter Un Référent</h5>
        </div>
      
        <form method="post" id="affectReferent" action="<?=base_url()?>formation/affecterFormateur" enctype="multipart/form-data" accept-charset="utf-8">
            <div class="row">
                  
                    
                    
                    <div class="col-xl-12">
                        <div class="login__form">
                            <label class="form__label">Apprenants</label>
                            <select class="common__login__input" name="referent_id" id="referent_id">
                                <?php foreach($referents as $value){ ?>
                                        <option value="<?= $value['id']?>"><?= $value['nom']?> <?= $value['prenom']?></option>
                                  
                                <? }?>     
                            </select>
                        
                        </div>
                    </div>  
                    <input type="hidden" name="formation_id" value="<?=$formation['id']?>">
                    
                    
            </div>
            <div class="login__button">
                                        <button class="default__button" href="#" id="create-account-btn">Affecter</button>
             </div>
        
        

        
       
       </form> 

      
      



      <div class="modal-footer">
        <!-- <button type="button" class="close rts-btn btn-secondary" style="color:#fff;" data-dismiss="modal" aria-label="Close">Fermer</button> -->
        <button type="button"  class="rts-btn  btn-secondary" data-bs-dismiss="modal" aria-label="Close">Fermer</button>
      </div>
    </div>

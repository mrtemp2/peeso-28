<?php
    $seance = $info['seance'];
  

?>


<div class="modal-content bd-0 tx-14 loginarea__wraper" style="border:none !important;">
        
        <div class="modal-header login__heading">
                            <h5 class="login__title">Modifier La Séance</h5>
        </div>
      
        <form method="post" id="modifierSeance" action="<?=base_url()?>seance/updateSeance/<?=$seance['id']?>" enctype="multipart/form-data" accept-charset="utf-8">
            <div class="row">
                  
                    
                    
                    <div class="col-xl-12">
                        <div class="login__form">
                            <label class="form__label">Nom De La Séance</label>
                            <input class="common__login__input" name="nom" id="nom" value="<?=$seance['nom']?>">
                               
                        
                        </div>
                    </div>  
                    <input type="hidden" name="formation_id" value="<?=$seance['formation_id']?>">
                    
                    
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

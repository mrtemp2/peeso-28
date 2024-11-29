<?php
    $seance = $info['seance'];
    $google_login =$info['google_login'];

?>


<div class="modal-content bd-0 tx-14 loginarea__wraper" style="border:none !important;">
        
        <div class="modal-header login__heading">
                            <h5 class="login__title">Créer Un Rendez Vous</h5>
        </div>
      
        <form method="post" id="createRandezVousForm" action="<?=base_url()?>randezvous/createRandezVous" enctype="multipart/form-data" accept-charset="utf-8">
            <div class="row">
                    <div class="col-xl-6">
                        <div class="login__form">
                            <label class="form__label">Titre</label>
                            <input class="common__login__input" type="text"  name="titre" id="titre" placeholder="Titre">

                        </div>
                    </div>  
                    
                    <div class="col-xl-6">
                        <div class="login__form">
                            <label class="form__label">Lieu</label>
                            <input class="common__login__input" type="text"  name="lieu" id="lieu" placeholder="Lieu">

                        </div>
                    </div> 
                    <div class="col-xl-12">
                        <div class="login__form">
                            <label class="form__label">Description</label>
                            <textarea class="common__login__input" name="description" id="description"></textarea>
                        </div>
                    </div>  
                    <div class="col-xl-6">
                        <div class="login__form">
                            <label class="form__label">Date Début</label>
                            	
                            <input class="common__login__input" type="datetime-local"   name="date_debut" id="date_debut">

                        </div>
                    </div>  
                    <div class="col-xl-6">
                        <div class="login__form">
                            <label class="form__label">Date Fin</label>
                            <input class="common__login__input" type="datetime-local" name="date_fin" id="date_fin">

                        </div>
                    </div>  
                    <?php
                        if(!$google_login){
                    
                    ?>
                    <div class="google-apple-wrapper" style="margin-top: 0px;">
                                                     <a href="<?=base_url('auth/google_login')?>" class="google">
                                                            <img src="<?=base_url('public/new/img/google_link.png')?>" alt="contact">
                                                        </a>  
                     </div>
                    
                    <input type="hidden"  name="virtual_meeting" value="0">
                    <?php
                        }else{
                    ?>
                        <input type="hidden" name="virtual_meeting" value="1">
                    <?php
                        }
                    ?>
                    <input type="hidden" name="seance_id" value="<?=$seance['id']?>">
                
                                 
            </div>
            <div class="login__button">
                                        <button class="default__button" href="#" id="create-account-btn">Ajouter</button>
             </div>
        
        

        
       
       </form> 

      
      



      <div class="modal-footer">
        <!-- <button type="button" class="close rts-btn btn-secondary" style="color:#fff;" data-dismiss="modal" aria-label="Close">Fermer</button> -->
        <button type="button" style="color: white;" class="btn btn-secondary tx-11 tx-uppercase pd-y-12 pd-x-25 tx-mont tx-medium mg-b-20" data-bs-dismiss="modal" aria-label="Close">Fermer</button>
      </div>
    </div>

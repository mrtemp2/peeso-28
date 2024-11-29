<?php
    $referent = $info['referent'];
    $referent_domaines = $info['domaine_ids'];
    $all_domaines = $info['domaines'];

?>


<div class="modal-content bd-0 tx-14 loginarea__wraper" style="border:none !important;">
        
        <div class="modal-header login__heading">
                            <h5 class="login__title">Modifier Conseiller</h5>
        </div>
      
        <form method="post" id="updateTuteurForm" action="<?=base_url()?>tuteur/updateTuteurData/<?=$referent['id']?>" enctype="multipart/form-data" accept-charset="utf-8">
            <div class="row">
                    <div class="col-xl-6">
                        <div class="login__form">
                            <label class="form__label">Nom</label>
                            <input class="common__login__input" type="text" value="<?=$referent['nom']?>" name="editnom" id="editnom" placeholder="Nom">

                        </div>
                    </div>  
                    <div class="col-xl-6">
                        <div class="login__form">
                            <label class="form__label">Prénom</label>
                            <input class="common__login__input" type="text"  value="<?=$referent['prenom']?>"  name="editprenom" id="editprenom" placeholder="Prenom">

                        </div>
                    </div>  
                    <div class="col-xl-6">
                        <div class="login__form">
                            <label class="form__label">Adesse Email</label>
                            <input class="common__login__input" type="text"  value="<?=$referent['email']?>" name="editemail" id="editemail" placeholder="Adesse Email">

                        </div>
                    </div>  
                    <div class="col-xl-6">
                        <div class="login__form">
                            <label class="form__label">Affiliation</label>
                            <input class="common__login__input" type="text" value="<?=$referent['affiliation']?>" name="editaffiliation" id="editaffiliation" placeholder="Affiliation">

                        </div>
                    </div>  
                    <div class="col-xl-12">
                        <div class="login__form">
                            <label class="form__label">Domaines</label>
                            <select class="common__login__input js-example-domaine-multiple" name="editdomaine[]" id="editdomaine" multiple="multiple">
                                <?php foreach($all_domaines as $value){ ?>
                                    <?php if(in_array($value['id'],$referent_domaines)) {?>
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
                    <div class="col-xl-6">
                        <div class="login__form">
                            <label class="form__label">Nom D'Utilisateur</label>
                            <input class="common__login__input" type="text" value="<?=$referent['username']?>" name="editusername" id="editusername" placeholder="Nom D'Utilisateur">

                        </div>
                    </div> 
                    <div class="col-xl-12">
                        <div class="login__form">
                            <label class="form__label">Mot De Passe</label>
                            <input class="common__login__input" type="password" value="<?=$referent['password']?>" name="editpassword" id="editpassword" placeholder="Mot De Passe">

                        </div>
                    </div>  
                    <div class="col-xl-12">
                        <div class="login__form">
                            <label class="form__label">Confirmer Mot De Passe</label>
                            <input class="common__login__input" type="password" value="<?=$referent['password']?>" name="editconfirmpassword" id="editconfirmpassword" placeholder="Confirmer Mot De Passe">

                        </div>
                    </div>  
                    
            </div>
            <div class="login__button">
                                        <button class="default__button" href="#" id="create-account-btn">Modifier</button>
             </div>
        
        

        
       
       </form> 

      
      



      <div class="modal-footer">
        <!-- <button type="button" class="close rts-btn btn-secondary" style="color:#fff;" data-dismiss="modal" aria-label="Close">Fermer</button> -->
        <button type="button" style="color: white;" class="btn  btn-secondary tx-11 tx-uppercase pd-y-12 pd-x-25 tx-mont tx-medium mg-b-20" data-bs-dismiss="modal" aria-label="Close">Fermer</button>
      </div>
    </div>

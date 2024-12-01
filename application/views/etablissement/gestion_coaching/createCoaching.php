<?php
   
   

?>

<style>
    .formstep{
        position: absolute;
        top: 0%;
        transition: 0.5s ease-in;
    }
    #formstep-1{
        left: 0% ;
    }
    #formstep-2{
        left: 110% ;
    }
    #formstep-3{
        left: 220% ;
    }
    #formstep-4{
        left: 330% ;
    }



</style>
<?php
$referents = $info['referents'];
$students = $info['students'];

?>
<div class="modal-content bd-0 tx-14 loginarea__wraper" style="border:none !important;">
        
        <div class="modal-header login__heading" style="display: fi;">
                            <h5 class="login__title">Ajouter Coaching</h5>
                            
        </div>
      
        <form method="post" id="createCoachingForm" action="<?=base_url()?>coaching/createCoachingDept" enctype="multipart/form-data" accept-charset="utf-8">
            <div class="row" style="position:relative;min-height: 700px;overflow: hidden;">
                    <div class="row formstep" id="formstep-1" data-step="1">
                        <div class="col-xl-12">
                            <div class="login__form">
                                <label class="form__label">Titre</label>
                                <input class="common__login__input" type="text"  name="nom" id="nom" placeholder="Nom">

                            </div>
                        </div>  
                        
                        <div class="col-xl-6">
                            <div class="login__form">
                                <label class="form__label">Date Début</label>
                                <input class="common__login__input" type="date"  name="date_debut" id="date_debut" placeholder="Date Début">

                            </div>
                        </div>  
                        <div class="col-xl-6">
                            <div class="login__form">
                                <label class="form__label">Date Fin</label>
                                <input class="common__login__input" type="date"  name="date_fin" id="date_fin" placeholder="Date Fin">

                            </div>
                        </div>  
                        <div class="login__button">
                                        <a class="default__button step-changer" data-step="1" id="step-changer-1" href="#" >Suivant</a>
                        </div>
                    
                    </div>
                    <div class="formstep" id="formstep-2" data-step="2">
                        <div class="col-xl-12">
                                <label class="form__label">Thumbnail</label>
                                <div class="course-thumbnail-upload-area" style="margin-bottom: 10px;">
                                       
                                        <div>
                                            <img style="height: 100px;" loading="lazy" src="<?=base_url().'public/new/img/blog/blog_8.png';?>" alt="" id="thumbnail_image">
                                        </div>
                                        <div class="information">
                                            <span style="display: block;font-weight: 700;" >Size: 700 X 430 Pixels</span>
                                            <span style="display: block;font-weight: 700;" >File Support: PNG, JPG, JPEG</span>
                                            <div class="input-file-type-btn">
                                                <input type="file" id="thumbnail_input" name="thumbnail" hidden accept="image/*">
                                                <button type="button" class="default__button" onclick="openFileChooser('#thumbnail_input','#thumbnail_image')" >Choisir Un Fichier</button>
                                                <span class="custom-text" style="font-weight: 700;">Choisir Un Fichier</span>
                                            </div>
                                        </div>


                                </div>

                        </div>
                        <div class="login__button">
                                        <a class="default__button step-changer" id="step-changer-2" data-step="2"  href="#" >Suivant</a>
                        </div>
                    </div>    
                    <div class="formstep" id="formstep-3" data-step="3">
                        <div class="col-xl-12">
                                <label class="form__label">Inviter Des Apprenants</label>
                                <select class="common__login__input js-example-invited-multiple" name="students[]" id="students" multiple="multiple">
                                <?php foreach($students as $value){ ?>
                                    <option value="<?= $value['id']?>"><?= $value['nom']?> <?= $value['prenom']?></option>
                                
                                <?php } ?>     
                                </select>

                        </div>
                        <div class="col-xl-12">
                            <div class="login__form">
                                   
                                <label class="form__label">Affecter Un Coach </label>
                                <select class="common__login__input" name="referent_id" id="referent_id">
                                <?php foreach($referents as $value){ ?>
                                    <option value="<?= $value['id']?>"><?= $value['nom']?> <?= $value['prenom']?></option>
                                
                                <?php } ?>     
                                </select>
                            </div>        
                        </div>
                        <div class="login__button">
                                        <a class="default__button step-changer" id="step-changer-3" data-step="3"  href="#" >Suivant</a>
                        </div>
                    </div>  
                    <div class="row formstep" id="formstep-4" data-step="4">
                                <div class="col-xl-12">
                                    <span onclick="addSeance()" style="padding: 5px 7px; background-color:var(--greencolor2);font-weight:700;font-size:0.75rem;color:#fff;border:radius:6px;cursor:pointer">
                                            ajouter Seance
                                    </span>
                                    <div class="row" id="seance_inputs">
                                        <div class="col-xl-4">
                                            <div class="login__form">
                                                <label class="form__label">Nom De La Seance</label>
                                                <input class="common__login__input" type="text"  name="nom_seance_1" id="nom_seance_1" placeholder="Nom">

                                            </div>
                                        </div>  
                                        <div class="col-xl-4">
                                            <div class="login__form">
                                                <label class="form__label">Date Début</label>
                                                <input class="common__login__input" type="datetime-local"  name="date_debut_seance_1" id="date_debut_seance" placeholder="Date Début">

                                            </div>
                                        </div>  
                                        <div class="col-xl-4">
                                            <div class="login__form">
                                                <label class="form__label">Date Fin</label>
                                                <input class="common__login__input" type="datetime-local"  name="date_fin_seance_1" id="date_fin_seance" placeholder="Date Fin">

                                            </div>
                                        </div>  

                                    </div>                        
                                </div>
                                <input type="hidden" name="nb_seance" id="nb_seance" value="1"/>
                        <div class="login__button">
                                        <a class="default__button" data-step="1" id="submit-formation" href="#" >Ajouter</a>
                        </div>
                    
                    </div>
                     
                
                    
                        
                    
                    
            </div>
           
        
        

        
       
       </form> 

      
      



      <div class="modal-footer">
        <!-- <button type="button" class="close rts-btn btn-secondary" style="color:#fff;" data-dismiss="modal" aria-label="Close">Fermer</button> -->
        <button type="button" style="color: white;" class="btn btn-secondary tx-11 tx-uppercase pd-y-12 pd-x-25 tx-mont tx-medium mg-b-20" data-bs-dismiss="modal" aria-label="Close">Fermer</button>
      </div>
    </div>

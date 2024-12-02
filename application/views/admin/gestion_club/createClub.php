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

?>
<div class="modal-content bd-0 tx-14 loginarea__wraper" style="border:none !important;">
        
        <div class="modal-header login__heading" style="display: fi;">
                            <h5 class="login__title">Ajouter Club</h5>
                            
        </div>
      
        <form method="post" id="createClubForm" action="<?=base_url()?>Clubs/createClub" enctype="multipart/form-data" accept-charset="utf-8">
            <div class="row" style="position:relative;min-height: 700px;overflow: hidden;">
                    <div class="row formstep" id="formstep-1" data-step="1">
                        <div class="col-xl-12">
                            <div class="login__form">
                                <label class="form__label">Nom Club</label>
                                <input class="common__login__input" type="text"  name="nom" id="nom" placeholder="Nom">

                            </div>
                        </div>  
                        
                        <div class="col-xl-12">
                            <div class="login__form">
                                <label class="form__label">Activités</label>
                                <input class="common__login__input" type="text"  name="activites" id="activites" placeholder="activites">

                            </div>
                        </div>  
                        <div class="col-xl-12">
                            <div class="login__form">
                                <label class="form__label">Nombre de membres</label>
                                <input class="common__login__input" type="number"  name="nombre_de_membres" id="nombre_de_membres" placeholder="nombre de membres">

                            </div>
                        </div>  
                        <div class="login__button">
                                        <a class="default__button step-changer" data-step="1" id="step-changer-1" href="#" >Suivant</a>
                        </div>
                    
                    </div>
                    <div class="formstep" id="formstep-2" data-step="2">
                        <div class="col-xl-12">
                                <label class="form__label">Logo du club</label>
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
                            <div class="login__form">
                                <label class="form__label">adresse complete</label>
                                <input class="common__login__input" type="text"  name="adresse_complete" id="adresse_complete" placeholder="adresse_complete">

                            </div>
                        </div>  
                        <div class="col-xl-12">
                            <div class="login__form">
                                   
                                <label class="form__label">Téléphone </label>
                                <input class="common__login__input" type="number"  name="telephone" id="telephone" placeholder="telephone">

                            </div>        
                        </div>
                        <div class="login__button">
                                        <a class="default__button step-changer" id="step-changer-3" data-step="3"  href="#" >Suivant</a>
                        </div>
                    </div>  
                    <div class="row formstep" id="formstep-4" data-step="4">
                        <div class="col-xl-12">
                            <div class="login__form">
                                   
                                <label class="form__label">adresse email </label>
                                <input class="common__login__input" type="email"  name="adresse_email" id="adresse_email" placeholder="adresse email">

                            </div>        
                        </div>
                        <div class="col-xl-12">
                            <div class="login__form">
                                   
                                <label class="form__label">type</label>
                                <select class="common__login__input" name="type_c" id="type_c">
                                    <option value ="institutionnelle" >institutionnelle</option>
                                    <option value="Locale">Locale</option>
                                </select>
                            </div>        
                        </div>
                        
                                <input type="hidden" name="nb_seance" id="nb_seance" value="1"/>
                        <div class="login__button">
                                        <a class="default__button" data-step="1" id="submit-Club" href="#" >Ajouter</a>
                        </div>
                    
                    </div>
                     
                
                    
                        
                    
                    
            </div>
           
        
        

        
       
       </form> 

      
      



      <div class="modal-footer">
        <!-- <button type="button" class="close rts-btn btn-secondary" style="color:#fff;" data-dismiss="modal" aria-label="Close">Fermer</button> -->
        <button type="button" style="color: white;" class="btn  btn-secondary tx-11 tx-uppercase pd-y-12 pd-x-25 tx-mont tx-medium mg-b-20" data-bs-dismiss="modal" aria-label="Close">Fermer</button>
      </div>
    </div>

<?php
    $refrent = $info['referent'];
    $domaines = $info['domaines'];
    
?>

<div class="col-xl-9 col-lg-9 col-md-12">
                            <div class="dashboard__content__wraper">
                                <div class="dashboard__section__title">
                                    <h4>Profil Conseiller</h4>
                                </div>
                                <div class="row">
                                   
                                    <div class="col-lg-4 col-md-4">
                                        <div class="dashboard__form dashboard__form__margin">Nom</div>
                                    </div>
                                    <div class="col-lg-8 col-md-8">
                                        <div class="dashboard__form dashboard__form__margin"><?=$refrent['nom']?></div>
                                    </div>
                                    <div class="col-lg-4 col-md-4">
                                        <div class="dashboard__form dashboard__form__margin">Prenom</div>
                                    </div>
                                    <div class="col-lg-8 col-md-8">
                                        <div class="dashboard__form dashboard__form__margin"><?=$refrent['prenom']?></div>
                                    </div>
                                    <div class="col-lg-4 col-md-4">
                                        <div class="dashboard__form dashboard__form__margin">Affiliation</div>
                                    </div>
                                    <div class="col-lg-8 col-md-8">
                                        <div class="dashboard__form dashboard__form__margin"><?=$refrent['affiliation']?></div>
                                    </div>
                                    <div class="col-lg-4 col-md-4">
                                        <div class="dashboard__form dashboard__form__margin">Email</div>
                                    </div>
                                    <div class="col-lg-8 col-md-8">
                                        <div class="dashboard__form dashboard__form__margin"><?=$refrent['email']?></div>
                                    </div>
                                    <div class="col-lg-4 col-md-4">
                                        <div class="dashboard__form dashboard__form__margin">Domaines</div>
                                    </div>
                                    <div class="col-lg-8 col-md-8">
                                        <div class="dashboard__form dashboard__form__margin">
                                        <div style="display:flex;gap:10px;flex-wrap: wrap;">
                                        <?php
                                                    foreach($domaines as $d){
                                                     ?>       

                                                         <span class="domaine_item" style="background-color:<?=$d['color']?> !important" href="#"><?=$d['nom']?></span>
                                                       
                                                    <?php
                                                        }
                                                    ?>
                                        </div>
                                              


                                        </div>
                                    </div>
                                    
                                   
                                </div>
                            </div>
                        
</div>

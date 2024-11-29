<?php
    $student = $info['etudiant'];

?>
<div class="col-xl-9 col-lg-9 col-md-12">
                            <div class="dashboard__content__wraper">
                                <div class="dashboard__section__title">
                                    <h4>Profile étudiant/diplôlmé</h4>
                                </div>
                                <div class="row">
                                   
                                    <div class="col-lg-4 col-md-4">
                                        <div class="dashboard__form dashboard__form__margin">Nom</div>
                                    </div>
                                    <div class="col-lg-8 col-md-8">
                                        <div class="dashboard__form dashboard__form__margin"><?=$student['nom']?></div>
                                    </div>
                                    <div class="col-lg-4 col-md-4">
                                        <div class="dashboard__form dashboard__form__margin">Prenom</div>
                                    </div>
                                    <div class="col-lg-8 col-md-8">
                                        <div class="dashboard__form dashboard__form__margin"><?=$student['prenom']?></div>
                                    </div>
                                    <div class="col-lg-4 col-md-4">
                                        <div class="dashboard__form dashboard__form__margin">Cin</div>
                                    </div>
                                    <div class="col-lg-8 col-md-8">
                                        <div class="dashboard__form dashboard__form__margin"><?=$student['cin']?></div>
                                    </div>
                                    <div class="col-lg-4 col-md-4">
                                        <div class="dashboard__form dashboard__form__margin">Email</div>
                                    </div>
                                    <div class="col-lg-8 col-md-8">
                                        <div class="dashboard__form dashboard__form__margin"><?=$student['email']?></div>
                                    </div>
                                    <div class="col-lg-4 col-md-4">
                                        <div class="dashboard__form dashboard__form__margin">Phone Number</div>
                                    </div>
                                    <div class="col-lg-8 col-md-8">
                                        <div class="dashboard__form dashboard__form__margin"><?=$student['phone']?></div>
                                    </div>
                                    <div class="col-lg-4 col-md-4">
                                        <div class="dashboard__form dashboard__form__margin">Etablissement</div>
                                    </div>
                                    <div class="col-lg-8 col-md-8">
                                        <div class="dashboard__form dashboard__form__margin"><?=$student['etablissement']?></div>
                                    </div>
                                    <div class="col-lg-4 col-md-4">
                                        <div class="dashboard__form dashboard__form__margin">Niveau</div>
                                    </div>
                                    <div class="col-lg-8 col-md-8">
                                        <div class="dashboard__form dashboard__form__margin"><?=$student['niveau']?></div>
                                    </div>
                                    <div class="col-lg-4 col-md-4">
                                        <div class="dashboard__form dashboard__form__margin">Adresse</div>
                                    </div>
                                    <div class="col-lg-8 col-md-8">
                                        <div class="dashboard__form dashboard__form__margin"><?=$student['adresse']?> , <strong>code postal </strong> <?=$student['code_postal']?>   </div>
                                    </div>
                                </div>
                            </div>
                        
                        </div>

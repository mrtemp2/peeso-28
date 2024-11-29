<?php 
    $actualite = $this->model_news->news_section();

?>

<style>
    h3 {
        line-height: 64px;
        color: white;
        margin-bottom: 0;
    }
    h3 span {
        color: #5F2DED;
    }

    .selc{
        height: 60px;
        width: 100%;
        padding-left: 27px;
        border: 1px solid var(--borderColor2);
        margin-bottom: 30px;
        border-radius: var(--borderRadius);
        background: transparent;
        color: var(--contentColor);
    }
    .hov:hover{
        color: white !important;
        background-color: #5F2DED !important;
    }
    #myTab {
        display: flex;
        justify-content: center;
        gap: 20px; /* Control spacing between tabs */
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .nav-item {
        display: flex;
        align-items: center;
    }

    .single__tab__link {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        padding: 10px 15px;
        font-size: 16px;
        border: none;
        background-color: transparent;
        cursor: pointer;
        white-space: nowrap; /* Prevent wrapping */
    }

    .single__tab__link.active {
        font-weight: bold;
        border-bottom: 2px solid #000;
    }
    .about__button__wrap li button {
        padding: 15px 40px;   
    }

</style>
        <!-- breadcrumbarea__section__start -->

        <!-- breadcrumbarea__section__end-->
        <div class="contact__from__wraper sp_bottom_100">
            <div class="container">
            <div class="abouttabarea sp_bottom_70">
            <div class="container">
                <div class="row">
                <div class="col-xl-12" data-aos="fade-up">
                    <ul class="nav about__button__wrap justify-content-center" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="single__tab__link active" data-bs-toggle="tab" data-bs-target="#projects__one" type="button">
                                Compte Étudiant/Diplômés
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="single__tab__link" data-bs-toggle="tab" data-bs-target="#projects__two" type="button">
                                Compte Structure D'appui
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="single__tab__link" data-bs-toggle="tab" data-bs-target="#projects__three" type="button">
                                Compte Club & Association
                            </button>
                        </li>
                    </ul>
                </div>





                    <div class="tab-content tab__content__wrapper" id="myTabContent" data-aos="fade-up">

                        <div class="tab-pane fade active show" id="projects__one" role="tabpanel" aria-labelledby="projects__one">
                        
                            <div class="col-xl-12">
                                <div class="contact__form__inner" style="margin-top: 50px;">
                                    <div class="contact__form__heading" data-aos="fade-up">
                                        <h3>Créer Un Compte Étudiant/Diplômés👋</h3>
                                        <p>Les champs obligatoires sont marqués * </p>
                                    </div>


                                    <form action="<?= base_url() ?>auth/CreateEtudiant" method="post" id="createStudentForm" class="contact-form">
                                        <div class="row">

                                            <div class="col-xl-6" data-aos="fade-up">
                                                <div class="contact__input__wraper">
                                                    <input type="text" name="nom" id="nom" placeholder="Entrez votre nom*">
                                                    <div class="contact__icon">
                                                        <i class="icofont-businessman"></i>
                                                    </div>
                                                </div>
                                                <div class="form-error" id="nom-error"></div>
                                            </div>
                                            <div class="col-xl-6" data-aos="fade-up">
                                                <div class="contact__input__wraper">
                                                    <input type="text" name="prenom" id="prenom" placeholder="Entrez votre prénom*">
                                                    <div class="contact__icon">
                                                        <i class="icofont-businessman"></i>
                                                    </div>
                                                </div>
                                                <div class="form-error" id="prenom-error"></div>
                                            </div>
                                            <div class="col-xl-6" data-aos="fade-up">
                                                <div class="contact__input__wraper">
                                                    <input type="text" name="cin" id="cin" placeholder="Entrez votre CIN*">
                                                    <div class="contact__icon">
                                                        <i class="icofont-id-card"></i>
                                                    </div>
                                                </div>
                                                <div class="form-error" id="cin-error"></div>
                                            </div>
                                            <div class="col-xl-6" data-aos="fade-up">
                                                <div class="contact__input__wraper">
                                                    <input type="text" name="phone" placeholder="Entrez votre téléphone*">
                                                    <div class="contact__icon">
                                                        <i class="icofont-ui-call"></i>
                                                    </div>
                                                </div>
                                                <div class="form-error" id="phone-error"></div>
                                            </div>
                                            <div class="col-xl-6" data-aos="fade-up">
                                                <div class="contact__input__wraper">
                                                    <select class="selc" name="etablissement_id" id="etablissement_id">
                                                        <option value="">
                                                            Sélectionnez un établissement*
                                                        </option>
                                                        <?php
                                                        foreach($etabs as $etab){
                                                        ?>
                                                        <option value="<?= $etab['id'] ?>">
                                                            <?=$etab['nom']?>
                                                        </option>
                                                    
                                                        <?php
                                                        }
                                                        ?>   
                                                    </select>
                                                    <div class="contact__icon">
                                                        <i class="icofont-building-alt"></i>
                                                    </div>
                                                </div>
                                                <div class="form-error" id="etablissement_id-error"></div>
                                            </div>
                                            <div class="col-xl-6" data-aos="fade-up">
                                                <div class="contact__input__wraper">
                                                    <input type="text" name="ville" id="ville" placeholder="Entrez votre ville*">
                                                    <div class="contact__icon">
                                                        <i class="icofont-home"></i>
                                                    </div>
                                                </div>
                                                <div class="form-error" id="ville-error"></div>
                                            </div>
                                            <div class="col-xl-6" data-aos="fade-up">
                                                <div class="contact__input__wraper">
                                                    <input type="text" name="adresse" id="adresse" placeholder="Entrez votre adresse*">
                                                    <div class="contact__icon">
                                                        <i class="icofont-home"></i>
                                                    </div>
                                                </div>
                                                <div class="form-error" id="adresse-error"></div>
                                            </div>
                                            <div class="col-xl-6" data-aos="fade-up">
                                                <div class="contact__input__wraper">
                                                    <input type="text" name="code_postal" id="code_postal" placeholder="Entrez votre code postal*">
                                                    <div class="contact__icon">
                                                        <i class="icofont-barcode"></i>
                                                    </div>
                                                </div>
                                                <div class="form-error" id="code_postal-error"></div>
                                            </div>
                                            <div class="col-xl-6" data-aos="fade-up">
                                                <div class="contact__input__wraper">
                                                    <input type="email" name="email" id="email" placeholder="Entrez votre adresse e-mail*">
                                                    <div class="contact__icon">
                                                        <i class="icofont-envelope"></i>
                                                    </div>
                                                </div>
                                                <div class="form-error" id="email-error"></div>
                                            </div>
                                            <div class="col-xl-6" data-aos="fade-up">
                                                
                                            </div>
                                            <div class="col-xl-6" data-aos="fade-up">
                                                <div class="contact__input__wraper">
                                                    <input type="password" name="password" id="password" placeholder="Entrez votre mot de passe*">
                                                    <div class="contact__icon">
                                                        <i class="icofont-ui-password"></i>
                                                    </div>
                                                </div>
                                                <div class="form-error" id="password-error"></div>
                                            </div>
                                            <div class="col-xl-6" data-aos="fade-up">
                                                <div class="contact__input__wraper">
                                                    <input type="password" name="confirm-pass" id="confirm-pass" placeholder="Confirmez votre mot de passe*">
                                                    <div class="contact__icon">
                                                        <i class="icofont-ui-password"></i>
                                                    </div>
                                                </div>
                                                <div class="form-error" id="confirm-pass-error"></div>
                                            </div>
                                            <div class="col-xl-12" data-aos="fade-up">
                                                <div class="contact__button">

                                                    <button type="submit" value="submit" class="default__button" name="submit">S'inscrire</button>

                                                    <p class="form-messege" id="add-comptee-message"></p>
                                                    <p style="float:right;">Vous avez déjà un compte? 
                                                        <a class="hov" style="color:#5F2DED;border-radius:5px; border:1px solid #5F2DED; margin-left:25px;" href="<?php echo base_url('logged');?>">
                                                            S'identifer
                                                        </a>
                                                    </p>

                                                </div>
                                            </div>
                                        </div>
                                    </form>

                                </div>
                            </div>
                
                        </div>

                        <div class="tab-pane fade" id="projects__two" role="tabpanel" aria-labelledby="projects__two">

                        <div class="col-xl-12">
                                <div class="contact__form__inner" style="margin-top: 50px;">
                                    <div class="contact__form__heading" data-aos="fade-up">
                                        <h3>Créer Un Compte Structure D'appui👋</h3>
                                        <p>Les champs obligatoires sont marqués * </p>
                                    </div>


                                    <form action="<?= base_url() ?>auth/CreateStructure" method="post" id="createStructureForm" class="contact-form">
                                        <div class="row">

                                            <div class="col-xl-6" data-aos="fade-up">
                                                <div class="contact__input__wraper">
                                                    <input type="text" name="nom_str" id="nom_str" placeholder="Entrez votre nom*">
                                                    <div class="contact__icon">
                                                        <i class="icofont-businessman"></i>
                                                    </div>
                                                </div>
                                                <div class="form-error" id="nom-error"></div>
                                            </div>
                                            <div class="col-xl-6" data-aos="fade-up">
                                                <div class="contact__input__wraper">
                                                    <input type="text" name="prenom_str" id="prenom_str" placeholder="Entrez votre prénom*">
                                                    <div class="contact__icon">
                                                        <i class="icofont-businessman"></i>
                                                    </div>
                                                </div>
                                                <div class="form-error" id="prenom-error"></div>
                                            </div>
                                            <div class="col-xl-6" data-aos="fade-up">
                                                <div class="contact__input__wraper">
                                                    <input type="text" name="raison_sociale" id="raison_sociale" placeholder="Entrez votre raison sociale*">
                                                    <div class="contact__icon">
                                                    <i class="icofont-ui-social-link"></i>
                                                    </div>
                                                </div>
                                                <div class="form-error" id="raison-error"></div>
                                            </div>
                                            <div class="col-xl-6" data-aos="fade-up">
                                                <div class="contact__input__wraper">
                                                    <input type="email" name="email_str" id="email_str" placeholder="Entrez votre adresse e-mail*">
                                                    <div class="contact__icon">
                                                        <i class="icofont-envelope"></i>
                                                    </div>
                                                </div>
                                                <div class="form-error" id="email-error"></div>
                                            </div>
                                            <div class="col-xl-6" data-aos="fade-up">
                                                <div class="contact__input__wraper">
                                                    <input type="text" name="phone_str" id="phone_str" placeholder="Entrez votre téléphone*">
                                                    <div class="contact__icon">
                                                        <i class="icofont-ui-call"></i>
                                                    </div>
                                                </div>
                                                <div class="form-error" id="phone-error"></div>
                                            </div>
                                            <div class="col-xl-6" data-aos="fade-up">
                                                <div class="contact__input__wraper">
                                                    <select class="selc" name="etablissement_id_str" id="etablissement_id_str">
                                                        <option value="">Sélectionnez votre établissement*</option>
                                                        <option value="etab_public">Établissement Public</option>
                                                        <option value="etab_prive">Établissement Privé</option>
                                                    </select>
                                                    <div class="contact__icon">
                                                        <i class="icofont-building-alt"></i>
                                                    </div>
                                                </div>
                                                <div class="form-error" id="etablissement_id_str-error"></div>
                                            </div>
                                            
                                            <div class="col-xl-6" data-aos="fade-up">
                                                <div class="contact__input__wraper">
                                                    <input type="password" name="password_str" id="password_str" placeholder="Entrez votre mot de passe*">
                                                    <div class="contact__icon">
                                                        <i class="icofont-ui-password_str"></i>
                                                    </div>
                                                </div>
                                                <div class="form-error" id="password-error"></div>
                                            </div>
                                            <div class="col-xl-6" data-aos="fade-up">
                                                <div class="contact__input__wraper">
                                                    <input type="password" name="confirm-pass_str" id="confirm-pass_str" placeholder="Confirmez votre mot de passe*">
                                                    <div class="contact__icon">
                                                        <i class="icofont-ui-password_str"></i>
                                                    </div>
                                                </div>
                                                <div class="form-error" id="confirm-pass-error"></div>
                                            </div>
                                            <div class="col-xl-12" data-aos="fade-up">
                                                <div class="contact__button">

                                                    <button type="submit" value="submit" class="default__button" name="submit">S'inscrire</button>

                                                    <p class="form-messege" id="add-comptee-message"></p>
                                                    <p style="float:right;">Vous avez déjà un compte? 
                                                        <a class="hov" style="color:#5F2DED;border-radius:5px; border:1px solid #5F2DED; margin-left:25px;" href="<?php echo base_url('logged');?>">
                                                            S'identifer
                                                        </a>
                                                    </p>

                                                </div>
                                            </div>
                                        </div>
                                    </form>

                                </div>
                            </div>

                        </div>
                        <div class="tab-pane fade" id="projects__three" role="tabpanel" aria-labelledby="projects__three">

                            <div class="col-xl-12">
                                    <div class="contact__form__inner" style="margin-top: 50px;">
                                        <div class="contact__form__heading" data-aos="fade-up">
                                            <h3>Créer Un Compte Club & Association👋</h3>
                                            <p>Les champs obligatoires sont marqués * </p>
                                        </div>


                                        <form action="<?= base_url() ?>auth/CreateClubAssoc" method="post" id="createClubAssocForm" class="contact-form">
                                            <div class="row">

                                                <div class="col-xl-6" data-aos="fade-up">
                                                    <div class="contact__input__wraper">
                                                        <input type="text" name="nom_club" id="nom_club" placeholder="Entrez votre nom du club & association*">
                                                        <div class="contact__icon">
                                                            <i class="icofont-businessman"></i>
                                                        </div>
                                                    </div>
                                                    <div class="form-error" id="nom-error"></div>
                                                </div>
                                                <div class="col-xl-6" data-aos="fade-up">
                                                    <div class="contact__input__wraper">
                                                        <input type="text" name="nom_res_club" id="nom_res_club" placeholder="Entrez le nom du responsable*">
                                                        <div class="contact__icon">
                                                            <i class="icofont-businessman"></i>
                                                        </div>
                                                    </div>
                                                    <div class="form-error" id="nom_res_club-error"></div>
                                                </div>
                                                <!-- <div class="col-xl-6" data-aos="fade-up">
                                                    <div class="contact__input__wraper">
                                                        <input type="text" name="raison_sociale" id="raison_sociale" placeholder="Entrez votre raison sociale*">
                                                        <div class="contact__icon">
                                                        <i class="icofont-ui-social-link"></i>
                                                        </div>
                                                    </div>
                                                    <div class="form-error" id="raison-error"></div>
                                                </div> -->
                                                <div class="col-xl-6" data-aos="fade-up">
                                                    <div class="contact__input__wraper">
                                                        <input type="email" name="email_str" id="email_str" placeholder="Entrez l'adresse e-mail du votre club & association*">
                                                        <div class="contact__icon">
                                                            <i class="icofont-envelope"></i>
                                                        </div>
                                                    </div>
                                                    <div class="form-error" id="email-error"></div>
                                                </div>
                                                <div class="col-xl-6" data-aos="fade-up">
                                                    <div class="contact__input__wraper">
                                                        <input type="text" name="phone_str" id="phone_str" placeholder="Entrez le téléphone du votre club & association*">
                                                        <div class="contact__icon">
                                                            <i class="icofont-ui-call"></i>
                                                        </div>
                                                    </div>
                                                    <div class="form-error" id="phone-error"></div>
                                                </div>
                                                <!-- <div class="col-xl-6" data-aos="fade-up">
                                                    <div class="contact__input__wraper">
                                                        <select class="selc" name="etablissement_id_str" id="etablissement_id_str">
                                                            <option value="">Sélectionnez votre établissement*</option>
                                                            <option value="etab_public">Établissement Public</option>
                                                            <option value="etab_prive">Établissement Privé</option>
                                                        </select>
                                                        <div class="contact__icon">
                                                            <i class="icofont-building-alt"></i>
                                                        </div>
                                                    </div>
                                                    <div class="form-error" id="etablissement_id_str-error"></div>
                                                </div> -->
                                                
                                                <div class="col-xl-6" data-aos="fade-up">
                                                    <div class="contact__input__wraper">
                                                        <input type="password" name="password_str" id="password_str" placeholder="Entrez votre mot de passe*">
                                                        <div class="contact__icon">
                                                            <i class="icofont-ui-password_str"></i>
                                                        </div>
                                                    </div>
                                                    <div class="form-error" id="password-error"></div>
                                                </div>
                                                <div class="col-xl-6" data-aos="fade-up">
                                                    <div class="contact__input__wraper">
                                                        <input type="password" name="confirm-pass_str" id="confirm-pass_str" placeholder="Confirmez votre mot de passe*">
                                                        <div class="contact__icon">
                                                            <i class="icofont-ui-password_str"></i>
                                                        </div>
                                                    </div>
                                                    <div class="form-error" id="confirm-pass-error"></div>
                                                </div>
                                                <div class="col-xl-12" data-aos="fade-up">
                                                    <div class="contact__button">

                                                        <button type="submit" value="submit" class="default__button" name="submit">S'inscrire</button>

                                                        <p class="form-messege" id="add-comptee-message"></p>
                                                        <p style="float:right;">Vous avez déjà un compte? 
                                                            <a class="hov" style="color:#5F2DED;border-radius:5px; border:1px solid #5F2DED; margin-left:25px;" href="<?php echo base_url('logged');?>">
                                                                S'identifer
                                                            </a>
                                                        </p>

                                                    </div>
                                                </div>
                                            </div>
                                        </form>

                                    </div>
                                </div>

                        </div>

                    </div>





                </div>
            </div>
        </div>
            </div>
        </div>

        <div class="footerarea">
        <div class="container">
            <div class="footerarea__newsletter__wraper">
                <div class="row">
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12" data-aos="fade-up">
                        <div>
                            <h3>Vous Avez Encore Besoin De Notre <span>Soutien</span> ?</h3>
                            <p>N'attendez plus et faites un devis intelligent et logique ici. C'est assez simple.</p>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12" data-aos="fade-up">
                        <div class="footerarea__newsletter">
                            <div class="footerarea__newsletter__input">
                                <form action="newsletter/add_subscriber" id="add_subscriber_form" method="post" >
                                    <input type="email" name="email" id="email_subscriber" placeholder="Entrez Votre Email" required>
                                    <div class="footerarea__newsletter__button">
                                        <button type="submit" class="subscribe__btn">S'abonner</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="footerarea__wrapper footerarea__wrapper__2">
                <div class="row">
                    <div class="col-xl-5 col-lg-5 col-sm-12 col-md-12" data-aos="fade-up">
                        <div class="footerarea__inner footerarea__about__us">
                            <div class="footerarea__heading">
                                <h3>À propos de nous</h3>
                            </div>
                            <div class="footerarea__content">
                                <p>La Platforme 4C de l’Université de Sousse est une structure d’accompagnement universitaire des étudiants porteurs d’idées de projets.</p>
                            </div>
                            <div class="foter__bottom__text">
                                <div class="footer__bottom__icon">
                                    <i class="icofont-clock-time"></i>
                                </div>
                                <div class="footer__bottom__content">
                                    <h6>Horaires d'ouverture</h6>
                                    <span>Toujours ouvert</span>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-sm-12 col-md-12" data-aos="fade-up"></div>

                    <div class="col-xl-4 col-lg-4 col-sm-12" data-aos="fade-up">
                        <div class="footerarea__right__wraper footerarea__inner">
                            <div class="footerarea__heading">
                                <h3>Actualités récentes</h3>
                            </div>
                            <div class="footerarea__right__list">
                                <ul>
                                <?php foreach($actualite as $a) {?>
                                    <li>
                                        <a href="<?= base_url('actualite') ?>">
                                            <div class="footerarea__right__img">
                                                <img loading="lazy"  src="<?= base_url('assets/assets/images/' . $a['image'])  ?>" width="61" height="54" alt="footerphoto">
                                            </div>
                                            <div class="footerarea__right__content">
                                                <span> <?= $a['created_at'] ?> </span>
                                                <h6> <?= $a['titre'] ?> </h6>
                                            </div>
                                        </a>
                                    </li>
                                <? }?>
                                   
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footerarea__copyright__wrapper footerarea__copyright__wrapper__2">
                <div class="row">
                    <div class="col-xl-6 col-lg-6">
                        <div class="copyright__logo">
                            <p>Copyright © <span>2024</span> by <a href="https://www.ama-business.com/">AMA BUSINESS</a>. All Rights Reserved.</p>
                            <!-- <a href="<?php echo base_url() ?>"><img loading="lazy"  src="<?php echo base_url() ?>public/new/img/logo/peeso.png" alt="logophoto" width="300"></a> -->
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3">
                        <div class="footerarea__copyright__content footerarea__copyright__content__2">
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3">
                        <div class="footerarea__icon footerarea__icon__2">
                            <ul>
                                <li><a href="https://www.facebook.com/PEESo.univ.sousse/" target="_blank"><i class="icofont-facebook"></i></a></li>
                                <li>
                                    <a href="https://x.com/Univsousse" target="_blank">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="16.8" fill="white" class="bi bi-twitter-x" viewBox="0 0 16 16">
                                            <path d="M12.6.75h2.454l-5.36 6.142L16 15.25h-4.937l-3.867-5.07-4.425 5.07H.316l5.733-6.57L0 .75h5.063l3.495 4.633L12.601.75Zm-.86 13.028h1.36L4.323 2.145H2.865z"></path>
                                        </svg>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://www.linkedin.com/company/peeso/?trk=similar-pages&amp;originalSubdomain=tn" target="_blank"><i class="icofont-linkedin"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

        </div>
</div>
        <!-- footer__section__end -->


    </main>




    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- JS here -->
    <script src="<?=base_url()?>public/new/js/vendor/modernizr-3.5.0.min.js"></script>
    <script src="<?=base_url()?>public/new/js/vendor/jquery-3.6.0.min.js"></script>
    <script src="<?=base_url()?>public/new/js/popper.min.js"></script>
    <script src="<?=base_url()?>public/new/js/bootstrap.min.js"></script>
    <script src="<?=base_url()?>public/new/js/isotope.pkgd.min.js"></script>
    <script src="<?=base_url()?>public/new/js/slick.min.js"></script>
    <script src="<?=base_url()?>public/new/js/jquery.meanmenu.min.js"></script>
    <script src="<?=base_url()?>public/new/js/ajax-form.js"></script>
    <script src="<?=base_url()?>public/new/js/wow.min.js"></script>
    <script src="<?=base_url()?>public/new/js/jquery.scrollUp.min.js"></script>
    <script src="<?=base_url()?>public/new/js/imagesloaded.pkgd.min.js"></script>
    <script src="<?=base_url()?>public/new/js/jquery.magnific-popup.min.js"></script>
    <script src="<?=base_url()?>public/new/js/waypoints.min.js"></script>
    <script src="<?=base_url()?>public/new/js/jquery.counterup.min.js"></script>
    <script src="<?=base_url()?>public/new/js/plugins.js"></script>
    <script src="<?=base_url()?>public/new/js/swiper-bundle.min.js"></script>
    <script src="<?=base_url()?>public/new/js/main.js"></script>
    <script>
         $("#createStudentForm").unbind('submit').bind('submit',

function() {


  var form = $(this);
  var url = "auth/CreateEtudiant"; // Make sure this is defined

  $("#add-comptee-message").html('');

  $("#add-comptee-messageNon").html('');
  var form = $(this);
  var type = form.attr('method');
  var formData = new FormData($(this)[0]);
  createPromise(()=>{
    return new Promise((resolve,reject)=>{
        $.ajax({
    url: url,
    type: type,
    data: formData,
    dataType: 'json',
    cache: false,
    contentType: false,
    processData: false,
    async: false,
    success: function(response) {
      if (response.success == true) {
        resolve(response)
      } else {
        Swal.fire({
                        icon: "Erreur",
                        title: "Erreur",
                        text: "Vérfiez Vos Champs"
                    });

       reject(response)
      }
         } // /.success
        }); 

    })

  },(response)=>{

    document.querySelectorAll('.form-error').forEach(s=>{
            s.innerHTML=""
        })  
        console.log(response.success)
        $("#add-comptee-message").html('<div class="alert alert-success alert-dismissible" role="alert">' +
          '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' +
          response.messages +
          '</div>');

        $("#add-comptee-messageNon").html('<div class="alert alert-success alert-dismissible" role="alert">' +
          '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' +
          response.messages +
          '</div>');
        $("#createStudentForm")[0].reset();
        $(".text-danger").remove();
  },(response)=>{

    document.querySelectorAll('.form-error').forEach(s=>{
            s.innerHTML=""
        })

        $.each(response.messages, function(index, value) {
            
          if(value.length>0){
            let key = document.querySelector(`#${index}-error`)  
          
             key.innerHTML=value;
          }
       });
  })






  return false;



});

    </script>
    <script>

           $("#add_subscriber_form").unbind('submit').bind('submit', function (event) {
                event.preventDefault();
                var form = $(this);
                var url = form.attr('action');
                var type = form.attr('method');
                var formData = new FormData($(this)[0]);
                $.ajax({
                    url: url,
                    type: type,
                    data: formData,
                    dataType: 'json',
                    cache: false,
                    contentType: false,
                    processData: false,
                    async: false,
                    success: function (response) {
                        if (response.success) {
                            document.location.reload()
                        } else {
                            alert('une erreur c\'était produite lors de l\'ajout de l\'abonné ')
                        }
                    },
                    error: function (xhr, ajaxOptions, thrownError) {
                        alert('une erreur c\'était produite lors de l\'ajout de l\'abonné  ')
                    }
                });
            })
   </script>
    <?php if ($this->session->flashdata('login_failed')){ ?>
                <script>
                    Swal.fire({

                    icon: 'warning',
                    title: 'Erreur',
                    text: '<?= $this->session->flashdata('login_failed'); ?>'
                    });
                </script>
    <?php } ?>
                          



</body>

</html>
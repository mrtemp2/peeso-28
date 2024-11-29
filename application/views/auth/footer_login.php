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
</style>
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
                                <p>Le Pôle de l’Étudiant Entrepreneur de l’Université de Sousse “PEESo” est une structure d’accompagnement universitaire des étudiants porteurs d’idées de projets.</p>
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

</main>





<!-- JS here -->
<script src="<?php echo base_url() ?>public/new/js/vendor/modernizr-3.5.0.min.js"></script>
<script src="<?php echo base_url() ?>public/new/js/vendor/jquery-3.6.0.min.js"></script>
<script src="<?php echo base_url() ?>public/new/js/popper.min.js"></script>
<script src="<?php echo base_url() ?>public/new/js/bootstrap.min.js"></script>
<script src="<?php echo base_url() ?>public/new/js/isotope.pkgd.min.js"></script>
<script src="<?php echo base_url() ?>public/new/js/slick.min.js"></script>
<script src="<?php echo base_url() ?>public/new/js/jquery.meanmenu.min.js"></script>
<script src="<?php echo base_url() ?>public/new/js/ajax-form.js"></script>
<script src="<?php echo base_url() ?>public/new/js/wow.min.js"></script>
<script src="<?php echo base_url() ?>public/new/js/jquery.scrollUp.min.js"></script>
<script src="<?php echo base_url() ?>public/new/js/imagesloaded.pkgd.min.js"></script>
<script src="<?php echo base_url() ?>public/new/js/jquery.magnific-popup.min.js"></script>
<script src="<?php echo base_url() ?>public/new/js/waypoints.min.js"></script>
<script src="<?php echo base_url() ?>public/new/js/jquery.counterup.min.js"></script>
<script src="<?php echo base_url() ?>public/new/js/plugins.js"></script>
<script src="<?php echo base_url() ?>public/new/js/swiper-bundle.min.js"></script>
<script src="<?php echo base_url() ?>public/new/js/main.js"></script>

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


</body>
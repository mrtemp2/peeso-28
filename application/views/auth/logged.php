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

<!-- Breadcrumb Section -->
<div class="breadcrumbarea" data-aos="fade-up">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="breadcrumb__content__wraper">
                    <div class="breadcrumb__title">
                        <h2 class="heading">S'identifier</h2>
                    </div>
                    <div class="breadcrumb__inner">
                        <ul>
                            <li><a href="<?= base_url() ?>">Home</a></li>
                            <li>S'identifier</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="shape__icon__2">
        <img class="shape__icon__img shape__icon__img__1" src="<?= base_url() ?>public/new/img/herobanner/herobanner__1.png" alt="photo">
        <img class="shape__icon__img shape__icon__img__2" src="<?= base_url() ?>public/new/img/herobanner/herobanner__2.png" alt="photo">
        <img class="shape__icon__img shape__icon__img__3" src="<?= base_url() ?>public/new/img/herobanner/herobanner__3.png" alt="photo">
        <img class="shape__icon__img shape__icon__img__4" src="<?= base_url() ?>public/new/img/herobanner/herobanner__5.png" alt="photo">
    </div>
</div>

<!-- Login Section -->
<div class="loginarea sp_top_100 sp_bottom_100">
    <div class="container">
        <div class="row">
            <div class="col-xl-8 col-md-8 offset-md-2">
                <div class="loginarea__wraper">
                    <div class="login__heading">
                        <h5 class="login__title">Login</h5>
                    </div>
                    <form action="<?= base_url() ?>/auth/logged" id="loginForm" method="post">
                        <div class="login__form">
                            <label class="form__label">Identifiant</label>
                            <input class="common__login__input" name="username" type="text" placeholder="Identifiant">
                        </div>
                        <div class="login__form">
                            <label class="form__label">Password</label>
                            <input class="common__login__input" name="password" type="password" placeholder="Mot De Passe">
                        </div>
                        <div>
                            <div class="g-recaptcha" data-sitekey="6Lf-hx4pAAAAAJe6pmsEGBGscAW2zRwO4F60nDgG" style="transform:scale(0.8);transform-origin:0 0;"></div>
                        </div>
                        <div class="login__form d-flex justify-content-between flex-wrap gap-2">
                            <div class="form__check">
                                <input id="forgot" type="checkbox">
                                <label for="forgot">Remember me</label>
                            </div>
                            <div class="text-end login__form__link">
                                <a href="#">Forgot your password?</a>
                            </div>
                        </div>
                        <div class="login__button">
                            <button type="submit" class="default__button">Log In</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="login__shape__img educationarea__shape_image">
            <img class="hero__shape hero__shape__1" src="<?= base_url() ?>public/new/img/education/hero_shape2.png" alt="Shape">
            <img class="hero__shape hero__shape__2" src="<?= base_url() ?>public/new/img/education/hero_shape3.png" alt="Shape">
            <img class="hero__shape hero__shape__3" src="<?= base_url() ?>public/new/img/education/hero_shape4.png" alt="Shape">
            <img class="hero__shape hero__shape__4" src="<?= base_url() ?>public/new/img/education/hero_shape5.png" alt="Shape">
        </div>
    </div>
</div>

<!-- Footer Section -->
<div class="footerarea">
    <div class="container">
        <div class="footerarea__newsletter__wraper">
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-6">
                    <h3>Vous Avez Encore Besoin De Notre <span>Soutien</span> ?</h3>
                    <p>N'attendez plus et faites un devis intelligent et logique ici. C'est assez simple.</p>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6">
                    <form action="newsletter/add_subscriber" id="add_subscriber_form" method="post">
                        <input type="email" name="email" id="email_subscriber" placeholder="Entrez Votre Email" required>
                        <button type="submit" class="subscribe__btn">S'abonner</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="footerarea__wrapper footerarea__wrapper__2">
            <div class="row">
                <div class="col-xl-5">
                    <h3>À propos de nous</h3>
                    <p>La Platforme 4C de l’Université de Sousse est une structure d’accompagnement universitaire des étudiants porteurs d’idées de projets.</p>
                    <h6>Horaires d'ouverture</h6>
                    <span>Toujours ouvert</span>
                </div>
                <div class="col-xl-4">
                    <h3>Actualités récentes</h3>
                    <ul>
                        <?php foreach ($actualite as $a): ?>
                            <li>
                                <a href="<?= base_url('actualite') ?>">
                                    <img src="<?= base_url('assets/assets/images/' . $a['image']) ?>" alt="footerphoto">
                                    <span><?= $a['created_at'] ?></span>
                                    <h6><?= $a['titre'] ?></h6>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        </div>
        <div class="footerarea__copyright__wrapper">
            <p>Copyright © <span>2024</span> by <a href="https://www.ama-business.com/">AMA BUSINESS</a>. All Rights Reserved.</p>
        </div>
    </div>
</div>

<!-- Scripts -->
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<script src="<?= base_url() ?>public/new/js/vendor/jquery-3.6.0.min.js"></script>
<script src="<?= base_url() ?>public/new/js/bootstrap.min.js"></script>
<script src="<?= base_url() ?>public/new/js/main.js"></script>

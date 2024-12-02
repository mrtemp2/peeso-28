<?php 
$etabs = $this->model_etablissement->getAllActiveEtabs();
?>

<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Espace Admin | PEESo</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon" type="image/x-icon" href="<?=base_url()?>public/images/peeso.jpg" height="60">
    <!-- Place favicon.ico in the root directory -->

    <!-- CSS here -->
    <link rel="stylesheet" href="<?=base_url()?>public/new/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?=base_url()?>public/new/css/animate.min.css">
    <link rel="stylesheet" href="<?=base_url()?>public/new/css/aos.min.css">
    <link rel="stylesheet" href="<?=base_url()?>public/new/css/magnific-popup.css">
    <link rel="stylesheet" href="<?=base_url()?>public/new/css/icofont.min.css">
    <link rel="stylesheet" href="<?=base_url()?>public/new/css/slick.css">
    <link rel="stylesheet" href="<?=base_url()?>public/new/css/swiper-bundle.min.css">
    <link rel="stylesheet" href="<?=base_url()?>public/new/css/style.css">

    <link href="<?= base_url() ?>custom/css/select2.min.css" rel="stylesheet" type="text/css" />


    <script>
        // On page load or when changing themes, best to add inline in `head` to avoid FOUC
        if (localStorage.getItem("theme-color") === "dark" || (!("theme-color" in localStorage) && window.matchMedia("(prefers-color-scheme: dark)").matches)) {
            document.documentElement.classList.add("is_dark");
        }
        if (localStorage.getItem("theme-color") === "light") {
            document.documentElement.classList.remove("is_dark");
        } 
        function overlayOn(){
            document.querySelector('#overlay').style.display="flex"
        }
        function overlayOff(){
            document.querySelector('#overlay').style.display="none"
        }
        function closeModal(modalId){
            $(`${modalId}`).modal('hide')

        }

    </script>
    <script>
        window.addEventListener('load',e=>{
            document.querySelectorAll('.parent-menu-item').forEach(element => {
                console.log(element)
                element.addEventListener('click',e=>{
                    e.preventDefault()
                    const targetId = element.dataset.target
                    $(targetId).collapse('toggle')


                })
            });

            
        })
    </script>
</head>



<style>
        .activity-title{
            font-weight: 700;
            font-size: 0.9rem;

        }
        .activity-file{
            margin-top: 10px;
            padding: 5px;
            position: relative;
            width: 10%;
        }
        .activity-file .activity-file-action{
           
            height: 100%;
            width: 100%;
            position: absolute;
            left: 0;
            top: 0;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .activity-file-action a{
            display: none;
        }
        .activity-file-action:hover a{
            display: block;

        }
     
      .block-item-content{
            padding: 16px;

        }
        .detail-item{
            border: 2px solid var(--whitegrey3);
            border-radius: 6px;
            margin-bottom: 12px;
        }
        .block-item {
            font-size: 0.8rem;
            font-weight: 700;
            border-radius: 6px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 10px 12px;
            background-color: var(--lightGrey5);
            cursor: pointer;
        }
        .block-item .block-item-title{
            display: flex;
            align-items: center;
            gap: 5px;


        }
        .block-item-title .block-item-image{
            width: 30px;
            height: 30px;
            background-size: cover;
        }
    textarea{
        height: 150px !important;

    }
        .accordion-body-item .action{
            display: inline-block;
            height: 24px;
            line-height: 23px;
            color: var(--whiteColor);
            padding: 0 10px;
            border-radius: var(--borderRadius);
            background: #ffc107;
            margin-left: 20px;
            color: white;

        }
    .question{
        cursor: pointer;


    }
    .modal{
        top: 10%;
    }
    /* Modal-specific styles for dark theme */
    .is_dark .modal-content {
        background-color: #0C0E2B;
        color: #fff;
    }

    /* Modal-specific styles for light theme */
    .modal-content {
        background-color: #fff;
        color: #000;
    }
    .accordion-body-item {
        justify-content: space-between;
        border-radius: 6px;
        font-weight: 700;
        margin-bottom: 15px;
        border: 1px solid var(--borderColor);
        display: flex;
        align-items: center;
        width: 100%;
        padding: .75rem 0.75rem;
        font-size: 1rem;
        color: var(--bs-accordion-btn-color);
        text-align: left;
        background-color: var(--bs-accordion-btn-bg);
        overflow-anchor: none;
        transition: var(--bs-accordion-transition);
    }
    .formateur_item {
        background: var(--borderColor);
        padding: 6px 10px;
        line-height: 13px;
        font-size: 12px;
        border-radius: 50px;
    }


    .menu-item-children{
        gap: 10px;
        display: flex;
        flex-direction: column;
    }
    .domain_item_large{
        height: 26px;
        width: 114px;
        background: var(--primaryColor);
        color: var(--whiteColor);
        display: inline-block;
        text-align: center;
        line-height: 23px;
        font-weight: 600;
        font-size: 14px;
        margin-right: 20px;
        border-radius: var(--borderRadius);
        border: 1px solid var(--primaryColor);
    }
    .domaine_item {
        
        padding: 5px 7px;
        font-size: 12px;
        display: flex;
        height: 22px;
        align-items: center;
        border-radius: 6px;
        justify-content: center;
        width: max-content;
        color: var(--whiteColor);
    }      
    .action-button{
        color: #fff;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
       
        height: 36px;
        width: 36px;
    }
    .btn-group{
        border-bottom:none;
    }
    .dataTables_filter input{
        width: 100%;
        background-color: transparent;
        border: 2px solid var(--borderColor);
        border-radius: 6px;
        line-height: 23px;
        padding: 10px 20px;
        font-size: 14px;
        color: var(--contentColor);
       

    }
     .buttons-html5,.buttons-print{
        padding: 5px 25px;
        background-color: var(--primaryColor);
        color: var(--whiteColor);
        display: inline-block;
        text-align: center;
        border-radius: var(--borderRadius) !important;
        font-size: 15px;
        border: 1px solid var(--primaryColor);

    }
    .buttons-print:hover,.buttons-html5:hover {
        background-color: var(--whiteColor);
    color: var(--primaryColor);
    border-color: var(--primaryColor);
    border: 1px solid var(--primaryColor);
    }
    .btn-group{

        display: block;
    }
    .calender-and-tab-btn-between{
        margin-bottom: 20px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        

    }
         .lds-ripple {
        /* change color here */
        color: var(--color-primary)
    }
    .lds-ripple,
    .lds-ripple div {
        box-sizing: border-box;
    }
    .lds-ripple {
        display: inline-block;
        position: relative;
        width: 80px;
        height: 80px;
    }
    .lds-ripple div {
        position: absolute;
        border: 4px solid currentColor;
        opacity: 1;
        border-radius: 50%;
        animation: lds-ripple 1s cubic-bezier(0, 0.2, 0.8, 1) infinite;
    }
    .lds-ripple div:nth-child(2) {
        animation-delay: -0.5s;
    }
    @keyframes lds-ripple {
        0% {
            top: 36px;
            left: 36px;
            width: 8px;
            height: 8px;
            opacity: 0;
        }
        4.9% {
            top: 36px;
            left: 36px;
            width: 8px;
            height: 8px;
            opacity: 0;
        }
        5% {
            top: 36px;
            left: 36px;
            width: 8px;
            height: 8px;
            opacity: 1;
        }
        100% {
            top: 0;
            left: 0;
            width: 80px;
            height: 80px;
            opacity: 0;
        }
    }
    #overlay {
        align-items: center;
        justify-content: center;
        position: fixed;
        display: none;
        width: 100%;
        height: 100%;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: rgba(0,0,0,0.5);
        z-index: 2000;
        cursor: pointer;
    }
    .parent-menu-item{
        display: flex;
        align-items: center;
        justify-content: space-between;


    }
    
    .menu-item-children{
        margin-left: 1.5vw;


    }
    .hov:hover{
        color:#0d6efd !important;
    }
    /* Style for the main submenu */
    .headerarea__submenu--third {
        display: flex;
        flex-wrap: wrap;
        /*gap: 10px;  Adjust spacing between items */
        /* padding: 10px; */
        list-style: none;
        max-width: 800px; /* Set a maximum width for the dropdown */
        background-color: white; /* Adjust to match your theme */
        border: 1px solid #ddd;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }
    .is_dark .headerarea__submenu--third {
        display: flex;
        flex-wrap: wrap;
        list-style: none;
        max-width: 800px;
        background-color: #0C0E2B;
        color: #fff;
        border: 1px solid #0C0E2B;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }

    /* Individual columns */
    .headerarea__submenu--third li {
        width: 45%; /* Adjust width for each item */
        margin-bottom: 10px;
    }

    /* Adjust anchor links */
    .headerarea__submenu--third a {
        text-decoration: none;
        color: #333;
        font-size: 14px;
    }

    .headerarea__submenu--third a:hover {
        color: #6c63ff; /* Adjust hover color */
    }
    .headerarea__main__menu nav ul > li a {
        font-size: 14px !important;
        padding-right: 1px !important;
    }
      select{
        height: 60px;
        width: 100%;
        padding-left: 27px;
        border: 1px solid #dddddd;
        margin-bottom: 30px;
        border-radius: var(--borderRadius);
        background: transparent;
        color: #5F6C76;
      }
</style>
<body class="body__wrapper">
    <div id="overlay">
            <div class="lds-ripple"><div></div><div></div></div>
    </div>
    <!-- pre loader area start -->
    <div id="back__preloader">
        <div id="back__circle_loader"></div>
        <div class="back__loader_logo">
            <img loading="lazy"  src="<?=base_url()?>public/new/img/rocket.png" style="width:80px !important" alt="Preload">
        </div>
    </div>
    <!-- pre loader area end -->

    <!-- Dark/Light area start -->
    <div class="mode_switcher my_switcher">
        <button id="light--to-dark-button" class="light align-items-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="ionicon dark__mode" viewBox="0 0 512 512">
                <path
                    d="M160 136c0-30.62 4.51-61.61 16-88C99.57 81.27 48 159.32 48 248c0 119.29 96.71 216 216 216 88.68 0 166.73-51.57 200-128-26.39 11.49-57.38 16-88 16-119.29 0-216-96.71-216-216z"
                    fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                    stroke-width="32" />
            </svg>

            <svg xmlns="http://www.w3.org/2000/svg" class="ionicon light__mode" viewBox="0 0 512 512">
                <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-miterlimit="10" stroke-width="32"
                    d="M256 48v48M256 416v48M403.08 108.92l-33.94 33.94M142.86 369.14l-33.94 33.94M464 256h-48M96 256H48M403.08 403.08l-33.94-33.94M142.86 142.86l-33.94-33.94" />
                <circle cx="256" cy="256" r="80" fill="none" stroke="currentColor" stroke-linecap="round"
                    stroke-miterlimit="10" stroke-width="32" />
            </svg>

            <span class="light__mode">Light</span>
            <span class="dark__mode">Dark</span>
        </button>
    </div>
    <!-- Dark/Light area end -->

    <main class="main_wrapper overflow-hidden">


        <!-- topbar__section__stert -->
        <div class="topbararea">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-lg-6">
                        <div class="topbar__left">
                            <ul>
                                <li >
                                    <a class="hov" href="mailto:peeso.univ.sousse@u-sousse.tn" class="email" style="color:white">
                                        <i class="icofont-envelope"></i>
                                        peeso.univ.sousse@u-sousse.tn
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6">
                        <div class="topbar__right">
                            <div class="topbar__icon">
                                <!-- <i class="icofont-location-pin"></i> -->
                            </div>
                            <div class="topbar__text">
                                <!-- <p>684 West College St. Sun City, USA</p> -->
                            </div>
                            <div class="topbar__list">
                                <ul>
                                    <li>
                                        <a href="https://www.facebook.com/PEESo.univ.sousse/" target="_blank"><i class="icofont-facebook"></i></a>
                                    </li>
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
        <!-- topbar__section__end -->


        <!-- headar section start -->
        <header>
            <div class="headerarea headerarea__3 header__sticky header__area">
                <div class="container desktop__menu__wrapper">
                    <div class="row">
                        <div class="col-xl-1 col-lg-1 col-md-6">
                            <div class="headerarea__left">
                                <div class="headerarea__left__logo">

                                    <a href="<?php echo base_url() ?>"><img loading="lazy"  src="<?php echo base_url() ?>public/new/img/logo/peeso.png" alt="logo" width="200"></a>
                                </div>

                            </div>
                        </div> 
                        
                        <div class="col-xl-10 col-lg-10 main_menu_wrap">
                            <div class="headerarea__main__menu">
                                <nav>
                                    <ul style="white-space: nowrap;">
                                        <li>
                                            <a class="headerarea__has__dropdown" href="<?php echo base_url() ?>">
                                                Acceuil
                                                <i class="icofont-rounded-down"></i>
                                            </a>
                                            <ul class="headerarea__submenu headerarea__submenu--third--wrap">
                                                <li>
                                                    <a href="#">Réseau 4C <i class="icofont-rounded-right"></i></a>
                                                    <ul class="headerarea__submenu--third" style="width: max-content;line-height: 5px;">
                                                        <?php foreach($etabs as $etab): ?>
                                                            <li><a href="<? echo base_url().'etab_id='.$etab['id'] ?>"><?= $etab['nom'] ?></a></li>
                                                        <?php endforeach; ?>
                                                    </ul>
                                                </li>
                                                <li><a href="<?php echo base_url() ?>qui_sommes_nous">Qui Sommes Nous?</a></li>
                                                <li><a href="<?php echo base_url() ?>nos_objectifs">Nos Objectifs</a></li>
                                            </ul>
                                        </li>



                                        <li><a class="headerarea__has__dropdown" href="<? echo base_url() ?>competition">Activités
                                                <i class="icofont-rounded-down"></i>
                                            </a>
                                            <ul class="headerarea__submenu headerarea__submenu--third--wrap">
                                                <li><a href="">Certification <i class="icofont-rounded-right"></i></a>

                                                    <ul class="headerarea__submenu--third" style="white-space: normal;">
                                                        <li><a href="<? echo base_url() ?>liste_candidat_resultat">Liste Candidats/Résultat</a></li>
                                                        <li><a href="<? echo base_url() ?>certifications_disponibles">Certifications Disponibles</a></li>
                                                    
                                                    </ul>

                                                </li>
                                                <li><a href="<? echo base_url() ?>appel_a_candidature_active">Appel à Candidature</a></li>
                                                <li><a href="<? echo base_url() ?>formation">Formation</a></li>
                                                <li><a href="<? echo base_url() ?>coaching">Coaching</a></li>
                                                <li><a href="<? echo base_url() ?>profiling">Profiling</a></li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a class="headerarea__has__dropdown" href="<? echo base_url() ?>stage_emploi">Offres Stages/Emploi
 
                                                <i class="icofont-rounded-down"></i>
                                            </a>
                                            <ul class="headerarea__submenu">
                                                <li><a href="<? echo base_url() ?>journee_carriere">Journée Carrière</a></li>
                                                <li><a href="<? echo base_url() ?>salon_emploi">Salon d'Emploi</a></li>
                                                <li><a href="<? echo base_url() ?>offres_spontanee">Offres Spontanées</a></li>
                                            </ul>
                                        </li>
                                       
                                        <li>
                                            <a class="headerarea__has__dropdown" href="<?php echo base_url() ?>actualite">Actualités
                                                <i class="icofont-rounded-down"></i>
                                            </a>
                                            <ul class="headerarea__submenu">
                                                <li><a href="#">Document en ligne</a></li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a class="headerarea__has__dropdown" href="<?php echo base_url() ?>enquete_satisfaction">Enquête de Satisfaction
                                                <!-- <i class="icofont-rounded-down"></i> -->
                                            </a>
                                        </li>
                                        
                                        <li>
                                            <a class="headerarea__has__dropdown" href="<?php echo base_url() ?>reseau_4c">4C
                                                <!-- <i class="icofont-rounded-down"></i> -->
                                            </a>
                                        </li>
                                        <li>
                                            <a class="headerarea__has__dropdown" href="<?php echo base_url() ?>enquete_satisfaction">Clubs & Associations
                                                <i class="icofont-rounded-down"></i>
                                            </a>
                                            <ul class="headerarea__submenu">
                                                <li><a href="<?php echo base_url() ?>institutionnel">institutionnel</a></li>
                                                <li><a href="<?php echo base_url() ?>local">local</a></li>
                                                <li><a href="<?php echo base_url() ?>actualite_evenement">Actualités & Événements</a></li>
                           
                                            </ul>
                                        </li>
                                        <li>
                                            <a class="headerarea__has__dropdown" href="<?php echo base_url() ?>contactez_nous">Contact
                                                <!-- <i class="icofont-rounded-down"></i> -->
                                            </a>
                                            <!-- <ul class="headerarea__submenu">
                                                <li><a href="<?php echo base_url() ?>public/new/ecommerce/shop.html">Shop<span class="mega__menu__label">Online Store</span></a></li>
                                                <li><a href="<?php echo base_url() ?>public/new/ecommerce/product-details.html">Product Details</a></li>
                                                <li><a href="<?php echo base_url() ?>public/new/ecommerce/cart.html">Cart</a></li>
                                                <li><a href="<?php echo base_url() ?>public/new/ecommerce/checkout.html">Checkout</a></li>
                                                <li><a href="<?php echo base_url() ?>public/new/ecommerce/wishlist.html">Wishlist</a></li>
                                            </ul> -->
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <div class="col-xl-1 col-lg-1 col-md-6" style="justify-content: center;display: flex;justify-items: center;align-items: center;">
                            <span class="btn btn-primary"><?= $this->session->userdata('logged')['type'] ?></span>
                        </div>

                    </div>

                </div>


                <div class="container-fluid mob_menu_wrapper">
                    <div class="row align-items-center">
                        <div class="col-6">
                            <div class="mobile-logo">
                                <a class="logo__dark" href="#"><img loading="lazy"  src="<?php echo base_url() ?>public/new/img/logo/peeso.png" alt="logo" width="200"></a>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="header-right-wrap">
    
                                <div class="headerarea__right">
    
                                    
                                </div>
    
                                <div class="mobile-off-canvas">
                                    <a class="mobile-aside-button" href="#"><i class="icofont-navigation-menu"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- header section end -->

        <!-- Mobile Menu Start Here -->
        <div class="mobile-off-canvas-active">
            <a class="mobile-aside-close"><i class="icofont  icofont-close-line"></i></a>
            <div class="header-mobile-aside-wrap">
                <div class="mobile-search">
                    <form class="search-form" action="#">
                        <input type="text" placeholder="Search entire store…">
                        <button class="button-search"><i class="icofont icofont-search-2"></i></button>
                    </form>
                </div>
                <div class="mobile-menu-wrap headerarea">

                    <div class="mobile-navigation">

                        <nav>
                            <ul class="mobile-menu">
                                <li class="menu-item-has-children"><a href="index.html">Home</a>
                                    <ul class="dropdown">
                                        <li class="menu-item-has-children"><a href="index.html">Homes Light</a>
                                            <ul class="dropdown">
                                                <li><a href="index.html">Home (Default)</a></li>
                                                <li><a href="home-2.html">Elegant</a></li>
                                                <li><a href="home-3.html">Classic</a></li>
                                                <li><a href="home-4.html">Classic LMS</a></li>
                                                <li><a href="home-5.html">Online Course </a></li>
                                                <li><a href="home-6.html">Marketplace </a></li>
                                                <li><a href="home-7.html">University</a></li>
                                                <li><a href="home-8.html">eCommerce</a></li>
                                                <li><a href="home-9.html">Kindergarten</a></li>
                                                <li><a href="home-10.html">Machine Learning</a></li>
                                                <li><a href="home-11.html">Single Course</a></li>
                                            </ul>
                                        </li>

                                        <li class="menu-item-has-children">
                                            <a href="index.html">Homes Dark</a>
                                            <ul class="dropdown">
                                                <li><a href="index-dark.html">Home Default (Dark)</a></li>
                                                <li><a href="home-2-dark.html">Elegant (Dark)</a></li>
                                                <li><a href="home-3-dark.html">Classic (Dark)</a></li>
                                                <li><a href="home-4-dark.html">Classic LMS (Dark)</a></li>
                                                <li><a href="home-5-dark.html">Online Course (Dark)</a></li>
                                                <li><a href="home-6-dark.html">Marketplace (Dark)</a></li>
                                                <li><a href="home-7-dark.html">University (Dark)</a></li>
                                                <li><a href="home-8-dark.html">eCommerce (Dark)</a></li>
                                                <li><a href="home-9-dark.html">Kindergarten (Dark)</a></li>
                                                <li><a href="home-10-dark.html">Kindergarten (Dark)</a></li>
                                                <li><a href="home-11-dark.html">Single Course (Dark)</a></li>
                                            </ul>
                                        </li>

                                    </ul>
                                </li>


                                <li class="menu-item-has-children "><a href="#">Pages</a>

                                    <ul class="dropdown">
                                        <li class="menu-item-has-children">
                                            <a href="#">Get Started 1</a>

                                            <ul class="dropdown">
                                                <li><a href="about.html">About</a></li>
                                                <li><a href="about-dark.html">About (Dark)<span
                                                            class="mega__menu__label new">New</span></a></li>
                                                <li><a href="blog.html">Blog</a></li>
                                                <li><a href="blog-dark.html">Blog (Dark)</a></li>
                                                <li><a href="blog-details.html">Blog Details</a></li>
                                                <li><a href="blog-details-dark.html">Blog Details (Dark)</a></li>
                                            </ul>
                                        </li>

                                        <li class="menu-item-has-children">
                                            <a href="#">Get Started 2</a>
                                            <ul class="dropdown">
                                                <li><a href="error.html">Error 404</a></li>
                                                <li><a href="error-dark.html">Error (Dark)</a></li>
                                                <li><a href="event-details.html">Event Details</a></li>
                                                <li><a href="zoom/zoom-meetings.html">Zoom<span
                                                            class="mega__menu__label">Online Call</span></a></li>
                                                <li><a href="zoom/zoom-meetings-dark.html">Zoom Meeting (Dark)</a>
                                                </li>
                                                <li><a href="zoom/zoom-meeting-details.html">Zoom Meeting Details</a>
                                                </li>
                                            </ul>
                                        </li>

                                        <li class="menu-item-has-children">
                                            <a href="#">Get Started 3</a>
                                            <ul class="dropdown">
                                                <li><a href="zoom/zoom-meeting-details-dark.html">Meeting Details (Dark)</a>
                                                </li>
                                                <li><a href="login.html">Login</a></li>
                                                <li><a href="login-dark.html">Login (Dark)</a></li>
                                                <li><a href="maintenance.html">Maintenance</a></li>
                                                <li><a href="maintenance-dark.html">Maintenance Dark</a></li>
                                                <li><a href="#">Terms & Condition</a></li>
                                            </ul>
                                        </li>

                                        <li class="menu-item-has-children">
                                            <a href="#">Get Started 4</a>
                                            <ul class="dropdown">
                                                <li><a href="#">Terms & Condition (Dark)</a></li>
                                                <li><a href="contact.html">Contact</a></li>
                                                <li><a href="contact-dark.html">Contact (Dark)</a></li>
                                                <li><a href="#">Success Stories</a></li>
                                                <li><a href="#">Success Stories (Dark)</a></li>
                                                <li><a href="#">Work Policy</a></li>
                                            </ul>
                                        </li>

                                        <li class="menu-item-has-children">
                                            <div class="mega__menu__img">
                                                <a href="#"><img loading="lazy"  src="<?=base_url()?>public/new/img/mega/mega_menu_2.png" alt="Mega Menu"></a>
                                            </div>
                                        </li>
                                    </ul>
                                </li>



                                <li class="menu-item-has-children "><a href="course.html">Courses</a>

                                    <ul class="dropdown">
                                        <li class="menu-item-has-children">
                                            <a href="#">Get Started 1</a>

                                            <ul class="dropdown">
                                                <li><a href="course.html">Grid <span class="mega__menu__label">All
                                                            Courses</span></a></li>
                                                <li><a href="course-dark.html">Course Grid (Dark)</a></li>
                                                <li><a href="course-grid.html">Course Grid</a></li>
                                                <li><a href="course-grid-dark.html">Course Grid (Dark)</a></li>
                                                <li><a href="course-list.html">Course List</a></li>
                                                <li><a href="course-list-dark.html">Course List (Dark)</a></li>
                                            </ul>
                                        </li>

                                        <li class="menu-item-has-children">
                                            <a href="#">Get Started 2</a>
                                            <ul class="dropdown">
                                                <li><a href="course-details.html">Course Details</a></li>
                                                <li><a href="course-details-dark.html">Course Details (Dark)</a></li>
                                                <li><a href="course-details-2.html">Course Details 2</a></li>
                                                <li><a href="course-details-2-dark.html">Details 2 (Dark)</a></li>
                                                <li><a href="course-details-3.html">Course Details 3</a></li>
                                                <li><a href="course-details-3.html">Details 3 (Dark)</a></li>
                                            </ul>
                                        </li>

                                        <li class="menu-item-has-children">
                                            <a href="#">Get Started 3</a>
                                            <ul class="dropdown">
                                                <li><a href="<?=base_url()?>public/new/dashboard/become-an-instructor.html">Become An
                                                        Instructor</a>
                                                <li><a href="<?=base_url()?>public/new/dashboard/create-course.html">Create Course <span
                                                            class="mega__menu__label">Career</span></a></li>
                                                <li><a href="instructor.html">Instructor</a></li>
                                                <li><a href="instructor-dark.html">Instructor (Dark)</a></li>
                                                <li><a href="instructor-details.html">Instructor Details</a></li>
                                                <li><a href="lesson.html">Course Lesson<span
                                                            class="mega__menu__label new">New</span></a></li>
                                            </ul>
                                        </li>

                                        <li class="menu-item-has-children">
                                            <div class="mega__menu__img">
                                                <a href="#"><img loading="lazy"  src="<?=base_url()?>public/new/img/mega/mega_menu_1.png" alt="Mega Menu"></a>
                                            </div>
                                        </li>
                                    </ul>
                                </li>


                                <li class="menu-item-has-children "><a
                                        href="<?=base_url()?>public/new/dashboard/admin-dashboard.html">Dashboard</a>

                                    <ul class="dropdown">
                                        <li class="menu-item-has-children">
                                            <a href="#">Admin</a>

                                            <ul class="dropdown">
                                                <li><a href="<?=base_url()?>public/new/dashboard/admin-dashboard.html">Admin Dashboard</a></li>
                                                <li><a href="<?=base_url()?>public/new/dashboard/admin-profile.html">Admin Profile</a></li>
                                                <li><a href="<?=base_url()?>public/new/dashboard/admin-message.html">Recent
                                                        Courses</a></li>
                                                <li><a href="<?=base_url()?>public/new/dashboard/admin-course.html">Courses</a></li>
                                                <li><a href="<?=base_url()?>public/new/dashboard/admin-reviews.html">Review</a></li>
                                                <li><a href="<?=base_url()?>public/new/dashboard/admin-quiz-attempts.html">Admin Quiz</a>
                                                </li>
                                                
                                                <li><a href="<?=base_url()?>public/new/dashboard/admin-settings.html">Settings</a></li>
                                            </ul>
                                        </li>

                                        <li class="menu-item-has-children">
                                            <a href="#">Instructor</a>
                                            <ul class="dropdown">
                                                <li><a href="<?=base_url()?>public/new/dashboard/instructor-dashboard.html">Inst. Dashboard</a>
                                                </li>
                                                <li><a href="<?=base_url()?>public/new/dashboard/instructor-profile.html">Inst. Profile</a>
                                                </li>
                                                <li><a href="<?=base_url()?>public/new/dashboard/instructor-enrolled-courses.html">Enrolled
                                                        Courses</a></li>
                                                <li><a href="<?=base_url()?>public/new/dashboard/instructor-wishlist.html">Wishlist</a></li>
                                                <li><a href="<?=base_url()?>public/new/dashboard/instructor-reviews.html">Review</a></li>
                                                <li><a href="<?=base_url()?>public/new/dashboard/instructor-my-quiz-attempts.html">My Quiz</a>
                                                </li>
                                                <li><a href="<?=base_url()?>public/new/dashboard/instructor-order-history.html">Order
                                                        History</a></li>
                                                <li><a href="<?=base_url()?>public/new/dashboard/instructor-course.html">My Courses</a></li>
                                                <li><a
                                                        href="<?=base_url()?>public/new/dashboard/instructor-announcments.html">Announcements</a>
                                                </li>
                                                <li><a href="<?=base_url()?>public/new/dashboard/instructor-quiz-attempts.html">Quiz
                                                        Attempts</a></li>
                                                <li><a href="<?=base_url()?>public/new/dashboard/instructor-assignments.html">Assignment</a>
                                                </li>
                                                <li><a href="<?=base_url()?>public/new/dashboard/instructor-settings.html">Settings</a></li>
                                            </ul>
                                        </li>

                                        <li class="menu-item-has-children">
                                            <a href="#">Student</a>
                                            <ul class="dropdown">
                                                <li><a href="<?=base_url()?>public/new/dashboard/student-dashboard.html">Dashboard</a></li>
                                                <li><a href="<?=base_url()?>public/new/dashboard/student-profile.html">Profile</a></li>
<li><a href="<?=base_url()?>public/new/dashboard/student-message.html">Message</a></li>
                                                <li><a href="<?=base_url()?>public/new/dashboard/student-enrolled-courses.html">Enrolled
                                                        Courses</a></li>
                                                <li><a href="<?=base_url()?>public/new/dashboard/student-wishlist.html">Wishlist</a></li>
                                                <li><a href="<?=base_url()?>public/new/dashboard/student-reviews.html">Review</a></li>
                                                <li><a href="<?=base_url()?>public/new/dashboard/student-my-quiz-attempts.html">My Quiz</a>
                                                </li>
                                                <li><a href="<?=base_url()?>public/new/dashboard/student-assignments.html">Assignment</a></li>
                                                <li><a href="<?=base_url()?>public/new/dashboard/student-settings.html">Settings</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>

                                <li class="menu-item-has-children"><a href="ecommerce/shop.html">eCommerce</a>
                                    <ul class="dropdown">
                                        <li><a href="ecommerce/shop.html">Shop<span class="mega__menu__label">Online
                                                    Store</span></a></li>
                                        <li><a href="ecommerce/product-details.html">Product Details</a></li>
                                        <li><a href="ecommerce/cart.html">Cart</a></li>
                                        <li><a href="ecommerce/checkout.html">Checkout</a></li>
                                        <li><a href="ecommerce/wishlist.html">Wishlist</a></li>

                                    </ul>
                                </li>

                            </ul>
                        </nav>

                    </div>

                </div>
                <div class="mobile-curr-lang-wrap">
                    <div class="single-mobile-curr-lang">
                        <a class="mobile-language-active" href="#">Language <i class="icofont-thin-down"></i></a>
                        <div class="lang-curr-dropdown lang-dropdown-active">
                            <ul>
                                <li><a href="#">English (US)</a></li>
                                <li><a href="#">English (UK)</a></li>
                                <li><a href="#">Spanish</a></li>
                            </ul>
                        </div>
                    </div>

                    <!-- <div class="single-mobile-curr-lang">
                                <a class="mobile-currency-active" href="#">Currency <i class="icofont-thin-down"></i></a>
                                <div class="lang-curr-dropdown curr-dropdown-active">
                                    <ul>
                                        <li><a href="#">USD</a></li>
                                        <li><a href="#">EUR</a></li>
                                        <li><a href="#">Real</a></li>
                                        <li><a href="#">BDT</a></li>
                                    </ul>
                                </div>
                            </div> -->

                    <div class="single-mobile-curr-lang">
                        <a class="mobile-account-active" href="#">My Account <i class="icofont-thin-down"></i></a>
                        <div class="lang-curr-dropdown account-dropdown-active">
                            <ul>
                                <li><a href="login.html">Login</a></li>
                                <li><a href="login.html">/ Create Account</a></li>
                                <li><a href="login.html">My Account</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="mobile-social-wrap">
                    <a class="facebook" href="#"><i class="icofont icofont-facebook"></i></a>
                    <a class="twitter" href="#"><i class="icofont icofont-twitter"></i></a>
                    <a class="pinterest" href="#"><i class="icofont icofont-pinterest"></i></a>
                    <a class="instagram" href="#"><i class="icofont icofont-instagram"></i></a>
                    <a class="google" href="#"><i class="icofont icofont-youtube-play"></i></a>
                </div>
            </div>
        </div>
        <!-- Mobile Menu end Here -->


        <!-- theme fixed shadow -->
        <div>
            <div class="theme__shadow__circle"></div>
            <div class="theme__shadow__circle shadow__right"></div>
        </div>
        <div class="dashboardarea sp_bottom_100">
            <div class="container-fluid full__width__padding">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="dashboardarea__wraper">
                                <div class="dashboardarea__img">
                                    <div class="dashboardarea__inner admin__dashboard__inner">
                                        <div class="dashboardarea__left">
                                            <div class="dashboardarea__left__img">
                                                <?php
                                                    $photo = base_url().'public/new/img/dashbord/dashbord__2.jpg';
                                                    if($this->session->userdata('logged')['photo']){
                                                        $photo = base_url().'assets/assets/images/'.$this->session->userdata('logged')['photo'];
                                                    }
                                                ?>
                                                <img loading="lazy"  src="<?= $photo ?>" alt="admin_photo">
                                            </div>
                                            <div class="dashboardarea__left__content">
                                                <h5>Hello</h5>
                                                <h4><?=$this->session->userdata('logged')['username']?></h4>
                                            </div>
                                        </div>
                                       
                                        <div class="dashboardarea__right">
                                            <div class="dashboardarea__right__button">
                                                <a class="default__button" href="<?=base_url('auth/loggedout')?>">Logout
                                                <i class="icofont-power"></i></a>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="dashboard">
                    <div class="container-fluid full__width__padding">
                        <div class="row">
                            <div class="col-xl-3 col-lg-3 col-md-12">
                                <div class="dashboard__inner sticky-top">
                                    <div class="dashboard__nav__title">
                                        <h6>Welcome, <?=$this->session->userdata('logged')['username']?></h6>
                                    </div>
                                    <div class="dashboard__nav">
                                        <ul>
                                            <li>
                                                <a class="active" href="<?=base_url('dashboard')?>">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                        class="feather feather-home">
                                                        <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                                                        <polyline points="9 22 9 12 15 12 15 22"></polyline>
                                                    </svg>
                                                    Dashboard</a>
                                            </li>
                                           
                                            <li class="toggle-menu-item">
                                                    <a href="#" class="parent-menu-item" data-toggle="collapse" data-target="#gestion_comptes"  >
                                                        <div>
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                            class="feather feather-user">
                                                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                                            <circle cx="12" cy="7" r="4"></circle>
                                                        </svg>
                                                        Gestion Des Comptes 
                                                        </div>
                                                        <i class="icofont-rounded-down"></i>
                                                    </a>
                                                    <div class="menu-item-children collapse in" id="gestion_comptes">
                                                                <a style="font-size: 0.9rem;" href="<?=base_url('liste_etudiant')?>">
                                                                <i class="icofont-users"></i>
                                                                Compte Étudiants/diplômés </a>
                                                                <a style="font-size: 0.9rem;" href="<?=base_url('list_referents')?>">
                                                                <i class="icofont-architecture-alt"></i>
                                                                Compte Conseillers</a>
                                                                <a class="toggle-menu-item parent-menu-item" style="font-size: 0.9rem;" data-toggle="collapse" data-target="#gestion_structure">
                                                                <i class="icofont-support"></i>
                                                                Compte Structure d'appui <i class="icofont-rounded-down"></i></a>
                                                                <div class="menu-item-children collapse in" id="gestion_structure">
                                                                    <a href="<?=base_url('valid_structure_appui')?>">Valider Comptes</a>
                                                                    <a href="<?=base_url('list_structure_appui')?>">Liste Comptes</a>
                                                                </div>
                                                                <a style="font-size: 0.9rem;" href="<?=base_url('list_comp_etab')?>">
                                                                <i class="icofont-building"></i>
                                                                Compte établissement</a>
                                                                <a style="font-size: 0.9rem;" href="<?=base_url('liste_comp_club_association')?>">
                                                                <i class="icofont-star-shape"></i>
                                                                Compte Club & Association </a>

                                                    </div>    
                                            </li>
                                            <li style="white-space: nowrap;">
                                                <a href="<?=base_url('gestion_etablissement')?>">
                                                    <i class="icofont-building-alt"></i>
                                                    Gestion des établissements</a>
                                            </li>
                                            <li style="white-space: nowrap;">
                                                <a href="<?=base_url('gestion_partenaire')?>">
                                                    <i class="icofont-users-alt-5"></i>
                                                    Gestion des partenaires</a>
                                            </li>
                                            <li style="white-space: nowrap;">
                                                <a href="<?=base_url('gestion_nos_projets')?>">
                                                    <i class="icofont-folder-open"></i>
                                                    Gestion de nos projets</a>
                                            </li>
                                            <li>
                                                <a href="<?=base_url('gestion_stage_emploi')?>">
                                                    <i class="icofont-worker"></i>
                                                    Gestion des Offres d'emploi/stages</a>
                                            </li>
                                            <li>
                                                <a href="#" class="parent-menu-item" data-toggle="collapse" data-target="#gestion_club">
                                                    <i class="icofont-star-shape"></i>
                                                    Gestion des clubs & Associations <i class="icofont-rounded-down"></i></a> 
                                                    <div class="menu-item-children collapse in" id="gestion_club">
                                                    <a style="font-size: 0.9rem;" href="<?=base_url('list_club')?>">
                                                    <i class="icofont-list"></i>
                                                    Liste des clubs & Associations</a>
                                                    
                                                    <a style="font-size: 0.9rem;" href="<?=base_url('list_act_even')?>">
                                                    <i class="icofont-black-board"></i>
                                                    Actualités & Événement </a>
                                                    <a style="font-size: 0.9rem;" href="<?=base_url('rapport_activite')?>">
                                                    <i class="icofont-paperclip"></i>
                                                    Rapport D'activité </a>
                                                </div>
                                            </li>
                                            <li>
                                                <a href="<?=base_url('gestion_enquete')?>">
                                                    <i class="icofont-battery-half"></i>
                                                    Gestion des Enquêtes de Satisfaction</a>
                                            </li>
                                            <li class="toggle-menu-item">
                                                <a href="#" class="parent-menu-item" data-toggle="collapse" data-target="#gestion_demande">
                                                    <div>
                                                    <i class="icofont-list"></i>
                                                    Demandes  
                                                    </div>
                                                    <i class="icofont-rounded-down"></i>
                                                </a>
                                                <div class="menu-item-children collapse in" id="gestion_demande">
                                                    <a style="font-size: 0.9rem;" href="<?=base_url('demande_formation_en_cours')?>">
                                                    <i class="icofont-book"></i>
                                                    Formations</a>
                                                    
                                                    <a style="font-size: 0.9rem;" href="<?=base_url('demande_coaching_en_cours')?>">
                                                    <i class="icofont-black-board"></i>
                                                    Coaching</a>
                                                    <a style="font-size: 0.9rem;" href="<?=base_url('#')?>">
                                                    <i class="icofont-paper"></i>
                                                    Certification</a>
                                                    <a style="font-size: 0.9rem;" href="<?=base_url('#')?>">
                                                    <i class="icofont-user"></i>
                                                    Profiling</a>
                                                </div>
                                            </li>
                                            <li>
                                                <a href="<?=base_url('all_formations')?>">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                        class="feather feather-bookmark">
                                                        <path d="M19 21l-7-5-7 5V5a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2z"></path>
                                                    </svg>
                                                    Formations</a>
                                            </li> 
                                            <li>
                                                <a href="<?=base_url('all_coaching')?>">
                                                    <i class="icofont-hand-thunder"></i>
                                                    Coaching</a>
                                            </li>  
                                            <li>
                                                <a href="<?=base_url('all_certification')?>">
                                                    <i class="icofont-paper"></i>
                                                    Certification</a>
                                            </li> 
                                            <li>
                                                <a href="<?=base_url('all_profiling')?>">
                                                <i class="icofont-user-male"></i>
                                                    Profiling</a>
                                            </li>  
                                            <li>
                                                <a href="<?=base_url('liste_appel_candidature')?>">
                                                    <!-- https://feathericons.dev/?search=file-text&iconset=feather -->
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" class="main-grid-item-icon" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                                                    <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z" />
                                                    <polyline points="14 2 14 8 20 8" />
                                                    <line x1="16" x2="8" y1="13" y2="13" />
                                                    <line x1="16" x2="8" y1="17" y2="17" />
                                                    <polyline points="10 9 9 9 8 9" />
                                                    </svg>

                                                    Gestion des appels à candidature</a>
                                            </li>
                                            <li>
                                                <a href="#" class="parent-menu-item" data-toggle="collapse" data-target="#gestion_competition">
                                                <i class="icofont-win-trophy" style="margin-right: 15px;"></i>
                                                Gestion des compétitions <i class="icofont-rounded-down"></i></a>
                                                <div class="menu-item-children collapse in" id="gestion_competition">
                                                    <a style="font-size: 0.9rem;" href="<?=base_url('liste_competitions')?>">
                                                    <i class="icofont-list"></i>
                                                    Liste des compétitions </a>
                                                    <a style="font-size: 0.9rem;" href="<?=base_url('liste_inscrits_accepte_refuse')?>">
                                                    <i class="icofont-users-social"></i>
                                                    Liste Des Inscrits Acceptés/Refusés</a>
                                                </div>   
                                            </li>
                                            <li>
                                                <a href="#" class="parent-menu-item" data-toggle="collapse" data-target="#gestion_actualite">
                                                <i class="icofont-ui-settings"></i>
                                                Gestion des pages <i class="icofont-rounded-down"></i></a>
                                                <div class="menu-item-children collapse in" id="gestion_actualite">
                                                    <a style="font-size: 0.9rem;" href="<?=base_url('list_actualite')?>">
                                                    <i class="icofont-newspaper"></i>
                                                    Liste actualité</a>
                                                    
                                                </div>   
                                            </li>

                                        </ul>
                                    </div>

                                    <div class="dashboard__nav__title mt-40">
                                        <h6>user</h6>
                                    </div>

                                    <div class="dashboard__nav">
                                        <ul>
                                            <li>
                                                <a href="<?=base_url('mise_a_jour_profile_admin')?>">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                        class="feather feather-settings">
                                                        <circle cx="12" cy="12" r="3"></circle>
                                                        <path
                                                            d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z">
                                                        </path>
                                                    </svg>
                                                    Mise À Jour Profil</a>
                                            </li>
                                            <li>
                                                <a href="<?=base_url('auth/loggedout')?>">
                                                <i class="icofont-power"></i>
                                                    Logout</a>
                                            </li>



                                        </ul>
                                    </div>


                                </div>
                            </div>
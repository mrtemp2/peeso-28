<?php 
$etabs = $this->model_etablissement->getAllActiveEtabs();
?>
<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?> | PEESo </title>
    <link rel="shortcut icon" href="<?php echo base_url() ?>public/images/peeso.jpg" height="60">

    <!-- CSS here -->
    <link rel="stylesheet" href="<?php echo base_url() ?>public/new/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>public/new/css/animate.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>public/new/css/aos.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>public/new/css/magnific-popup.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>public/new/css/icofont.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>public/new/css/slick.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>public/new/css/swiper-bundle.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>public/new/css/style.css">
    <script>
        // On page load or when changing themes, best to add inline in `head` to avoid FOUC
        if (localStorage.getItem("theme-color") === "dark" || (!("theme-color" in localStorage) && window.matchMedia("(prefers-color-scheme: dark)").matches)) {
          document.documentElement.classList.add("is_dark");
        } 
        if (localStorage.getItem("theme-color") === "light") {
          document.documentElement.classList.remove("is_dark");
        } 
    </script>
</head>

<style>
    .hov:hover{
        color:#0d6efd !important;
    }
    .headerarea__button__white a{
        margin-right: 10px;
        padding: 8px 15px;
        background-color: white;
        color: #5F2DED;
        display: inline-block;
        text-align: center;
        border-radius: var(--borderRadius);
        font-size: 14px;
        border: 1px solid #5F2DED;
    }
    .headerarea__button__white a:hover{
        background-color: #5F2DED;
        color: white;
        border: 1px solid #5F2DED;
    }
    .headerarea__button a {
        font-size: 14px !important;
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
    .breadcrumbarea {
        padding-top: 50px;
        padding-bottom: 50px;
    }

</style>
<body class="body__wrapper">
    
    <!-- pre loader area start -->
    <div id="back__preloader">
        <div id="back__circle_loader"></div>
        <div class="back__loader_logo">
            <img loading="lazy"  src="<?php echo base_url() ?>public/new/img/rocket.png" style="width:80px !important" alt="Preload">
        </div>
    </div>
    <!-- pre loader area end -->

    <!-- Dark/Light area start -->
    <div class="mode_switcher my_switcher">
        <button id="light--to-dark-button" class="light align-items-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="ionicon dark__mode" viewBox="0 0 512 512"><path d="M160 136c0-30.62 4.51-61.61 16-88C99.57 81.27 48 159.32 48 248c0 119.29 96.71 216 216 216 88.68 0 166.73-51.57 200-128-26.39 11.49-57.38 16-88 16-119.29 0-216-96.71-216-216z" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"/></svg>

            <svg xmlns="http://www.w3.org/2000/svg" class="ionicon light__mode" viewBox="0 0 512 512"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-miterlimit="10" stroke-width="32" d="M256 48v48M256 416v48M403.08 108.92l-33.94 33.94M142.86 369.14l-33.94 33.94M464 256h-48M96 256H48M403.08 403.08l-33.94-33.94M142.86 142.86l-33.94-33.94"/><circle cx="256" cy="256" r="80" fill="none" stroke="currentColor" stroke-linecap="round" stroke-miterlimit="10" stroke-width="32"/></svg>

            <span class="light__mode">Light</span>
            <span class="dark__mode">Dark</span>
        </button>
    </div>
    <!-- Dark/Light area end -->
    <main class="main_wrapper overflow-hidden">

    <!-- header style one -->
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
            <div class="headerarea headerarea__3 header__sticky header__area" style="font-size: smaller;">
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
                                            <a class="headerarea__has__dropdown" href="<?php echo base_url() ?>club_association">Clubs & Associations
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
                        <div class="col-xl-1 col-lg-1 col-md-6">
                            <div class="headerarea__right">
                                <?php if($this->session->userdata['logged']) :?>
                                    <div class="headerarea__login">
                                        <a href="<?php echo base_url() ?>dashboard"><i class="icofont-user-alt-5"></i></a>
                                    </div>
                                    <div class="dashboardarea__right">
                                            <div class="dashboardarea__right__button">
                                                <a class="default__button" href="<?=base_url('auth/loggedout')?>">Logout
                                                <i class="icofont-power"></i></a>
                                            </div>
                                        </div>
                                <?php else :?> 
                                    <div class="headerarea__button__white">
                                        <a href="<?php echo base_url() ?>logged">S'identifier</a>
                                    </div>
                                    <div class="headerarea__button">
                                        <a href="<?php echo base_url() ?>register">S'inscrire</a>
                                    </div>   
                                <?php endif; ?>
                                
                            </div>
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
                                <li class="menu-item-has-children"><a href="<?php echo base_url() ?>public/new/index.html">Home</a>
                                    <ul class="dropdown">
                                        <li class="menu-item-has-children"><a href="<?php echo base_url() ?>public/new/index.html">Homes Light</a>
                                            <ul class="dropdown">
                                                <li><a href="<?php echo base_url() ?>public/new/index.html">Home (Default)</a></li>
                                                <li><a href="<?php echo base_url() ?>public/new/home-2.html">Elegant</a></li>
                                                <li><a href="<?php echo base_url() ?>public/new/home-3.html">Classic</a></li>
                                                <li><a href="<?php echo base_url() ?>public/new/home-4.html">Classic LMS</a></li>
                                                <li><a href="<?php echo base_url() ?>public/new/home-5.html">Online Course </a></li>
                                                <li><a href="<?php echo base_url() ?>public/new/home-6.html">Marketplace </a></li>
                                                <li><a href="<?php echo base_url() ?>public/new/home-7.html">University</a></li>
                                                <li><a href="<?php echo base_url() ?>public/new/home-8.html">eCommerce</a></li>
                                                <li><a href="<?php echo base_url() ?>public/new/home-9.html">Kindergarten</a></li>
                                                <li><a href="<?php echo base_url() ?>public/new/home-10.html">Machine Learning</a></li>
                                                <li><a href="<?php echo base_url() ?>public/new/home-11.html">Single Course</a></li>
                                            </ul>
                                        </li>
        
                                        <li class="menu-item-has-children">
                                            <a href="<?php echo base_url() ?>public/new/index.html">Homes Dark</a>
                                            <ul class="dropdown">
                                                <li><a href="<?php echo base_url() ?>public/new/index-dark.html">Home Default (Dark)</a></li>
                                                <li><a href="<?php echo base_url() ?>public/new/home-2-dark.html">Elegant (Dark)</a></li>
                                                <li><a href="<?php echo base_url() ?>public/new/home-3-dark.html">Classic (Dark)</a></li>
                                                <li><a href="<?php echo base_url() ?>public/new/home-4-dark.html">Classic LMS (Dark)</a></li>
                                                <li><a href="<?php echo base_url() ?>public/new/home-5-dark.html">Online Course (Dark)</a></li>
                                                <li><a href="<?php echo base_url() ?>public/new/home-6-dark.html">Marketplace (Dark)</a></li>
                                                <li><a href="<?php echo base_url() ?>public/new/home-7-dark.html">University (Dark)</a></li>
                                                <li><a href="<?php echo base_url() ?>public/new/home-8-dark.html">eCommerce (Dark)</a></li>
                                                <li><a href="<?php echo base_url() ?>public/new/home-9-dark.html">Kindergarten (Dark)</a></li>
                                                <li><a href="<?php echo base_url() ?>public/new/home-10-dark.html">Kindergarten (Dark)</a></li>
                                                <li><a href="<?php echo base_url() ?>public/new/home-11-dark.html">Single Course (Dark)</a></li>
                                            </ul>
                                        </li>
        
                                    </ul>
                                </li>
        
        
                                <li class="menu-item-has-children "><a href="#">Pages</a>
        
                                    <ul class="dropdown">
                                        <li class="menu-item-has-children">
                                            <a href="#">Get Started 1</a>
        
                                            <ul class="dropdown">
                                                <li><a href="<?php echo base_url() ?>public/new/about.html">About</a></li>
                                                <li><a href="<?php echo base_url() ?>public/new/about-dark.html">About (Dark)<span class="mega__menu__label new">New</span></a></li>
                                                <li><a href="<?php echo base_url() ?>public/new/blog.html">Blog</a></li>
                                                <li><a href="<?php echo base_url() ?>public/new/blog-dark.html">Blog (Dark)</a></li>
                                                <li><a href="<?php echo base_url() ?>public/new/blog-details.html">Blog Details</a></li>
                                                <li><a href="<?php echo base_url() ?>public/new/blog-details-dark.html">Blog Details (Dark)</a></li>
                                            </ul>
                                        </li>
        
                                        <li class="menu-item-has-children">
                                            <a href="#">Get Started 2</a>
                                            <ul class="dropdown">
                                                <li><a href="<?php echo base_url() ?>public/new/error.html">Error 404</a></li>
                                                <li><a href="<?php echo base_url() ?>public/new/error-dark.html">Error (Dark)</a></li>
                                                <li><a href="<?php echo base_url() ?>public/new/event-details.html">Event Details</a></li>
                                                <li><a href="<?php echo base_url() ?>public/new/zoom/zoom-meetings.html">Zoom<span class="mega__menu__label">Online Call</span></a></li>
                                                <li><a href="<?php echo base_url() ?>public/new/zoom/zoom-meetings-dark.html">Zoom Meeting (Dark)</a></li>
                                                <li><a href="<?php echo base_url() ?>public/new/zoom/zoom-meeting-details.html">Zoom Meeting Details</a></li>
                                            </ul>
                                        </li>
        
                                        <li class="menu-item-has-children">
                                            <a href="#">Get Started 3</a>
                                            <ul class="dropdown">
                                                <li><a href="<?php echo base_url() ?>public/new/zoom/zoom-meeting-details-dark.html">Meeting Details (Dark)</a>
                                                </li>
                                                <li><a href="<?php echo base_url() ?>public/new/login.html">Login</a></li>
                                                <li><a href="<?php echo base_url() ?>public/new/login-dark.html">Login (Dark)</a></li>
                                                <li><a href="<?php echo base_url() ?>public/new/maintenance.html">Maintenance</a></li>
                                                <li><a href="<?php echo base_url() ?>public/new/maintenance-dark.html">Maintenance Dark</a></li>
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
                                                <a href="#"><img loading="lazy"  src="<?php echo base_url() ?>public/new/img/mega/mega_menu_2.png" alt="Mega Menu"></a>
                                                </div>
                                        </li>
                                    </ul>
                                </li>



                                <li class="menu-item-has-children "><a href="<?php echo base_url() ?>public/new/course.html">Courses</a>
        
                                    <ul class="dropdown">
                                        <li class="menu-item-has-children">
                                            <a href="#">Get Started 1</a>
        
                                            <ul class="dropdown">
                                                <li><a href="<?php echo base_url() ?>public/new/course.html">Grid <span class="mega__menu__label">All Courses</span></a></li>
                                                <li><a href="<?php echo base_url() ?>public/new/course-dark.html">Course Grid (Dark)</a></li>
                                                <li><a href="<?php echo base_url() ?>public/new/course-grid.html">Course Grid</a></li>
                                                <li><a href="<?php echo base_url() ?>public/new/course-grid-dark.html">Course Grid (Dark)</a></li>
                                                <li><a href="<?php echo base_url() ?>public/new/course-list.html">Course List</a></li>
                                                <li><a href="<?php echo base_url() ?>public/new/course-list-dark.html">Course List (Dark)</a></li>
                                            </ul>
                                        </li>
        
                                        <li class="menu-item-has-children">
                                            <a href="#">Get Started 2</a>
                                            <ul class="dropdown">
                                                <li><a href="<?php echo base_url() ?>public/new/course-details.html">Course Details</a></li>
                                                <li><a href="<?php echo base_url() ?>public/new/course-details-dark.html">Course Details (Dark)</a></li>
                                                <li><a href="<?php echo base_url() ?>public/new/course-details-2.html">Course Details 2</a></li>
                                                <li><a href="<?php echo base_url() ?>public/new/course-details-2-dark.html">Details 2 (Dark)</a></li>
                                                <li><a href="<?php echo base_url() ?>public/new/course-details-3.html">Course Details 3</a></li>
                                                <li><a href="<?php echo base_url() ?>public/new/course-details-3.html">Details 3 (Dark)</a></li>
                                            </ul>
                                        </li>
        
                                        <li class="menu-item-has-children">
                                            <a href="#">Get Started 3</a>
                                            <ul class="dropdown">
                                                    <li><a href="<?php echo base_url() ?>public/new/dashboard/become-an-instructor.html">Become An Instructor</a>
                                                    <li><a href="<?php echo base_url() ?>public/new/dashboard/create-course.html">Create Course <span class="mega__menu__label">Career</span></a></li>
                                                    <li><a href="<?php echo base_url() ?>public/new/instructor.html">Instructor</a></li>
                                                    <li><a href="<?php echo base_url() ?>public/new/instructor-dark.html">Instructor (Dark)</a></li>
                                                    <li><a href="<?php echo base_url() ?>public/new/instructor-details.html">Instructor Details</a></li>
                                                    <li><a href="<?php echo base_url() ?>public/new/lesson.html">Course Lesson<span class="mega__menu__label new">New</span></a></li>
                                            </ul>
                                        </li>

                                        <li class="menu-item-has-children">
                                                <div class="mega__menu__img">
                                                <a href="#"><img loading="lazy"  src="<?php echo base_url() ?>public/new/img/mega/mega_menu_1.png" alt="Mega Menu"></a>
                                                </div>
                                        </li>
                                    </ul>
                                </li>

                                
                                <li class="menu-item-has-children "><a href="<?php echo base_url() ?>public/new/dashboard/admin-dashboard.html">Dashboard</a>
        
                                    <ul class="dropdown">
                                        <li class="menu-item-has-children">
                                            <a href="#">Admin</a>
        
                                            <ul class="dropdown">
                                                <li><a href="<?php echo base_url() ?>public/new/dashboard/admin-dashboard.html">Admin Dashboard</a></li>
                                                <li><a href="<?php echo base_url() ?>public/new/dashboard/admin-profile.html">Admin Profile</a></li>
                                                <li><a href="<?php echo base_url() ?>public/new/dashboard/admin-message.html">Message</a></li>
                                                <li><a href="<?php echo base_url() ?>public/new/dashboard/admin-course.html">Courses</a></li>
                                                <li><a href="<?php echo base_url() ?>public/new/dashboard/admin-reviews.html">Review</a></li>
                                                <li><a href="<?php echo base_url() ?>public/new/dashboard/admin-quiz-attempts.html">Admin Quiz</a></li>
                                                
                                                <li><a href="<?php echo base_url() ?>public/new/dashboard/admin-settings.html">Settings</a></li>
                                            </ul>
                                        </li>
        
                                        <li class="menu-item-has-children">
                                            <a href="#">Instructor</a>
                                            <ul class="dropdown">
                                                <li><a href="<?php echo base_url() ?>public/new/dashboard/instructor-dashboard.html">Inst. Dashboard</a></li>
                                                <li><a href="<?php echo base_url() ?>public/new/dashboard/instructor-profile.html">Inst. Profile</a></li>
                                                <li><a href="<?php echo base_url() ?>public/new/dashboard/instructor-message.html">Message</a></li>
                                                <li><a href="<?php echo base_url() ?>public/new/dashboard/instructor-wishlist.html">Wishlist</a></li>
                                                <li><a href="<?php echo base_url() ?>public/new/dashboard/instructor-reviews.html">Review</a></li>
                                                <li><a href="<?php echo base_url() ?>public/new/dashboard/instructor-my-quiz-attempts.html">My Quiz</a></li>
                                                <li><a href="<?php echo base_url() ?>public/new/dashboard/instructor-order-history.html">Order History</a></li>
                                                <li><a href="<?php echo base_url() ?>public/new/dashboard/instructor-course.html">My Courses</a></li>
                                                <li><a href="<?php echo base_url() ?>public/new/dashboard/instructor-announcments.html">Announcements</a></li>
                                                <li><a href="<?php echo base_url() ?>public/new/dashboard/instructor-quiz-attempts.html">Quiz Attempts</a></li>
                                                <li><a href="<?php echo base_url() ?>public/new/dashboard/instructor-assignments.html">Assignment</a></li>
                                                <li><a href="<?php echo base_url() ?>public/new/dashboard/instructor-settings.html">Settings</a></li>
                                            </ul>
                                        </li>
        
                                        <li class="menu-item-has-children">
                                            <a href="#">Student</a>
                                            <ul class="dropdown">
                                                <li><a href="<?php echo base_url() ?>public/new/dashboard/student-dashboard.html">Dashboard</a></li>
                                                <li><a href="<?php echo base_url() ?>public/new/dashboard/student-profile.html">Profile</a></li>
                                                <li><a href="<?php echo base_url() ?>public/new/dashboard/student-message.html">Message</a></li>
                                                <li><a href="<?php echo base_url() ?>public/new/dashboard/student-enrolled-courses.html">Enrolled Courses</a></li>
                                                <li><a href="<?php echo base_url() ?>public/new/dashboard/student-wishlist.html">Wishlist</a></li>
                                                <li><a href="<?php echo base_url() ?>public/new/dashboard/student-reviews.html">Review</a></li>
                                                <li><a href="<?php echo base_url() ?>public/new/dashboard/student-my-quiz-attempts.html">My Quiz</a></li>
                                                <li><a href="<?php echo base_url() ?>public/new/dashboard/student-assignments.html">Assignment</a></li>
                                                <li><a href="<?php echo base_url() ?>public/new/dashboard/student-settings.html">Settings</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>

                                <li class="menu-item-has-children"><a href="ecommerce/shop.html">eCommerce</a>
                                    <ul class="dropdown">
                                        <li><a href="<?php echo base_url() ?>public/new/ecommerce/shop.html">Shop<span class="mega__menu__label">Online Store</span></a></li>
                                        <li><a href="<?php echo base_url() ?>public/new/ecommerce/product-details.html">Product Details</a></li>
                                        <li><a href="<?php echo base_url() ?>public/new/ecommerce/cart.html">Cart</a></li>
                                        <li><a href="<?php echo base_url() ?>public/new/ecommerce/checkout.html">Checkout</a></li>
                                        <li><a href="<?php echo base_url() ?>public/new/ecommerce/wishlist.html">Wishlist</a></li>
        
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
                                <li><a href="<?php echo base_url() ?>public/new/login.html">Login</a></li>
                                <li><a href="<?php echo base_url() ?>public/new/login.html">/ Create Account</a></li>
                                <li><a href="<?php echo base_url() ?>public/new/login.html">My Account</a></li>
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
  
   
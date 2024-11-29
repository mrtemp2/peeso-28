</div>
            </div>
        </div>

        </div>
        <div class="footerarea">
        <div class="container">
            
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


    <!-- JS here -->
    <script src="<?=base_url()?>public/new/js/calender.js"></script>
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
    <script src="<?= base_url() ?>custom/css/select2.min.js"></script>
    <script src="<?=base_url()?>public/new/js/imagesloaded.pkgd.min.js"></script>
    <script src="<?=base_url()?>public/new/js/jquery.magnific-popup.min.js"></script>
    <script src="<?=base_url()?>public/new/js/waypoints.min.js"></script>
    <script src="<?=base_url()?>public/new/js/jquery.counterup.min.js"></script>
    <script src="<?=base_url()?>public/new/js/plugins.js"></script>
    <script src="<?=base_url()?>public/new/js/swiper-bundle.min.js"></script>
    <script src="<?=base_url() ?>assets/DataTable4/js/jquery.dataTables.min.js"></script>
    <script src="<?=base_url() ?>assets/DataTable4/js/dataTables.bootstrap4.min.js"></script>
    <script src="<?=base_url() ?>assets/DataTable4/js/dataTables.responsive.min.js"></script>
    <script src="<?=base_url() ?>assets/DataTable4/js/responsive.bootstrap4.min.js"></script>
    <script src="<?=base_url() ?>assets/DataTable4/js/dataTables.fixedHeader.min.js"></script>
    <script src="<?=base_url() ?>assets/DataTable4/js/dataTables.buttons.min.js"></script>
    <script src="<?=base_url() ?>assets/DataTable4/js/buttons.bootstrap4.min.js"></script>
    <script src="<?=base_url() ?>assets/DataTable4/js/jszip.min.js"></script>
    <script src="<?=base_url() ?>assets/DataTable4/js/pdfmake.min.js"></script>
    <script src="<?=base_url() ?>assets/DataTable4/js/vfs_fonts.js"></script>
    <script src="<?=base_url() ?>assets/DataTable4/js/buttons.html5.min.js"></script>
    <script src="<?=base_url() ?>assets/DataTable4/js/buttons.print.min.js"></script>
    <script src="<?=base_url() ?>assets/DataTable4/js/buttons.colVis.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.1/chart.min.js"></script>
    <script src="<?=base_url()?>public/new/js/main.js"></script>


    <script>
        // On page load or when changing themes, best to add inline in `head` to avoid FOUC
        if (localStorage.getItem("theme-color") === "dark" || (!("theme-color" in localStorage) && window.matchMedia("(prefers-color-scheme: dark)").matches)) {
            document.getElementById("light--to-dark-button")?.classList.add("dark--mode");
        }
        if (localStorage.getItem("theme-color") === "light") {
            document.getElementById("light--to-dark-button")?.classList.remove("dark--mode");
        } 
    </script>


</body>

</html>
<?php 
$etabs = $this->model_etablissement->getAllActiveEtabs();
?>
<style>
            .card {
                background: #fff;
                border-radius: 10px;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
                margin: 15px 0;
                overflow: hidden;
                transition: transform 0.2s;
            }

            .card:hover {
                transform: scale(1.05);
            }

            .card-img {
                width: 100%;
                height: 200px;
                object-fit: cover;
            }

            .card-body {
                padding: 20px;
                text-align: center;
            }

            .card-title {
                font-size: 1.5em;
                margin-bottom: 10px;
            }

            .card-text {
                color: #555;
                margin-bottom: 15px;
            }

            .btn {
                background-color: #007bff;
                color: #fff;
                border: none;
                padding: 10px 15px;
                text-decoration: none;
                border-radius: 5px;
                cursor: pointer;
            }

            .btn:hover {
                background-color: #0056b3;
            }
        </style>
        <!-- theme fixed shadow -->
        <div>
            <div class="theme__shadow__circle"></div>
            <div class="theme__shadow__circle shadow__right"></div>
        </div>
        <!-- theme fixed shadow -->
        <!-- breadcrumbarea__section__start -->

        <div class="breadcrumbarea">

            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="breadcrumb__content__wraper" data-aos="fade-up">
                            <div class="breadcrumb__title">
                                <h2 class="heading">Réseau 4C</h2>
                            </div>
                            <div class="breadcrumb__inner">
                                <ul>
                                    <li><a href="<?= base_url() ?>">Home</a></li>
                                    <li>Réseau 4C</li>
                                </ul>
                            </div>
                        </div>



                    </div>
                </div>
            </div>

            <div class="shape__icon__2">
                <img loading="lazy"  class=" shape__icon__img shape__icon__img__1" src="<?= base_url() ?>public/new/img/herobanner/herobanner__1.png" alt="photo">
                <img loading="lazy"  class=" shape__icon__img shape__icon__img__2" src="<?= base_url() ?>public/new/img/herobanner/herobanner__2.png" alt="photo">
                <img loading="lazy"  class=" shape__icon__img shape__icon__img__3" src="<?= base_url() ?>public/new/img/herobanner/herobanner__3.png" alt="photo">
                <img loading="lazy"  class=" shape__icon__img shape__icon__img__4" src="<?= base_url() ?>public/new/img/herobanner/herobanner__5.png" alt="photo">
            </div>

        </div>
        <!-- breadcrumbarea__section__end-->


        <!-- start -->
        <div class="body_card">
    <div class="container">
       
        <div class="row">

            <!-- Card -->
            <?php foreach($etabs as $etab): ?>
                <div class="col-md-4">
                    <div class="card">
                        <img src="<?= base_url('/assets/assets/images'). '/' . $etab['logo'] ?>" alt="Établissement Image" class="card-img">
                        <div class="card-body">
                            <!-- <h3 class="card-title"><?= $etab['nom'] ?></h3> -->
                            <p class="card-text"><?= $etab['nom'] ?></p>
                            <a href="javascript:void(0);" class="btn btn-primary" onclick="setEtabId(<?= $etab['id'] ?>)">Voir plus</a>

                        </div>
                    </div>
                </div>
           <?php endforeach; ?>
        </div>
    </div>
</div>
        <!-- end -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>
    function setEtabId(etabId) {
        $.ajax({
            url: "<?= base_url('common/setEtabId') ?>", // Use the new common endpoint
            method: "POST",
            data: { id: etabId },
            success: function(response) {
                const res = JSON.parse(response);
                if (res.status === 'success') {
                    // Redirect to the details page
                    window.location.href = "<?= base_url('details_page') ?>"; // Replace 'details_page' with the actual page
                } else {
                    console.error(res.message);
                }
            },
            error: function(xhr, status, error) {
                console.error("Error setting etab ID:", error);
            }
        });
    }
</script>

<script>

</script>
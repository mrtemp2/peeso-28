<?php 
    $offres = $this->model_emploi_stage->getAllOffres();
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
                                <h2 class="heading">Offres Stage & Emploi & PFE</h2>
                            </div>
                            <div class="breadcrumb__inner">
                                <ul>
                                    <li><a href="<?= base_url() ?>">Home</a></li>
                                    <li>Offres Stage & Emploi & PFE</li>
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
        <select id="offerTypeFilter" class="form-control" style="margin-top: 20px;">
            <option value="">Filtrez par types d'offre(emploi / stage / PFE)</option>
            <option value="stage">Stage</option>
            <option value="emploi">Emploi</option>
            <option value="PFE">PFE</option>
        </select>
            <!-- Card -->
            <?php foreach($offres as $offre): ?>
                <div class="col-md-4 filter" data-type="<?= $offre['type']; ?>">
                    <div class="card">
                        <p style="font-weight: bold; background-color:bisque; text-align:center;"><?= $offre['titre'] ?></p>
                        <div class="card-body">
                            <p style="font-weight: bold"><?= $offre['date_publication'] ?></p>
                            <p class="card-text"><?= $offre['description'] ?></p>
                            <a href="<? echo base_url().'offre_id='.$offre['id'] ?>" class="btn btn-primary">Voir plus</a>
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
    document.addEventListener('DOMContentLoaded', function () {

        // Listen for changes on the offer type filter
        document.getElementById('offerTypeFilter').addEventListener('change', function () {
            // Get the selected filter value
            var selectedType = this.value;

            // Get all offer cards
            var offerCards = document.querySelectorAll('.filter');

            offerCards.forEach(function (card) {
                var cardType = card.getAttribute('data-type'); // Get the type from the data-type attribute

                // If no filter is selected or the card matches the selected type, show it
                if (selectedType === "" || cardType === selectedType) {
                    card.style.display = 'block';
                } else {
                    // Hide the card if it does not match the selected type
                    card.style.display = 'none';
                }
            });
        });

    });

</script>
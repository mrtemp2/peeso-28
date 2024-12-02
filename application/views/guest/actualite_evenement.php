<?php 
$etabs = $this->model_clubs->get_clubs_by_Admin();
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
                                <h2 class="heading">Actualités et évenements</h2>
                            </div>
                            <div class="breadcrumb__inner">
                                <ul>
                                    <li><a href="<?= base_url() ?>">Home</a></li>
                                    <li>Actualités et évenements</li>
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
                        <img src="<?= base_url('/assets/assets/images'). '/' . $etab['logo_du_club'] ?>" alt="Établissement Image" class="card-img">
                        <div class="card-body">
                            <!-- <h3 class="card-title"><?= $etab['nom_du_club'] ?></h3> -->
                            <p class="card-text"><strong><?= $etab['nom_du_club'] ?></strong></p>
                            <p class="card-text"><?= $etab['type'] ?></p>
                            <a href="<?php echo base_url()."?/evenement_club?id_club=".$etab['id']; ?>" class="btn btn-primary">évenements</a>
                            <a href="<?php echo base_url()."?/actualite_club?id_club=".$etab['id']; ?>" class="btn btn-primary" >actualité</a>

                        </div>
                    </div>
                </div>
           <?php endforeach; ?>
        </div>
    </div>
</div>
<div class="modal login-pupup-modal fade" id="ViewClubModal" tabindex="-1" aria-labelledby="clubModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content" style="width: 850px;">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="clubModalLabel">Détails du Club</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <!-- Thumbnail -->
                                                <img id="club-thumbnail" src="" alt="Club Thumbnail" class="img-fluid mb-3" style="max-height: 250px; object-fit: cover;">
                                            </div>
                                            <div class="col-md-8">
                                                <table class="table table-bordered">
                                                    <tbody>
                                                        <tr>
                                                            <th>Nom du Club</th>
                                                            <td id="club-nom"></td>
                                                        </tr>
                                                        <tr>
                                                            <th>Activités</th>
                                                            <td id="club-activites"></td>
                                                        </tr>
                                                        <tr>
                                                            <th>Nombre de Membres</th>
                                                            <td id="club-membres"></td>
                                                        </tr>
                                                        <tr>
                                                            <th>Adresse Complète</th>
                                                            <td id="club-adresse"></td>
                                                        </tr>
                                                        <tr>
                                                            <th>Téléphone</th>
                                                            <td id="club-telephone"></td>
                                                        </tr>
                                                        <tr>
                                                            <th>Adresse Email</th>
                                                            <td id="club-email"></td>
                                                        </tr>
                                                        <tr>
                                                            <th>Type de Club</th>
                                                            <td id="club-type"></td>
                                                        </tr>
                                                        <tr>
                                                            <th>Date de Création</th>
                                                            <td id="club-date-creation"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary tx-11 tx-uppercase pd-y-12 pd-x-25 tx-mont tx-medium" data-bs-dismiss="modal">Fermer</button>
                                    </div>
                                </div>
                            </div>
                        </div>
        <!-- end -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>
    function ViewSubject(club_id = null) {
    if (club_id === null) {
        console.error("Club ID is required");
        return;
    }

    // Show the modal
    $("#ViewClubModal").modal('show');

    // Fetch club details using the provided ID
    fetch(`clubs/getClubDetails/${club_id}`, {
        method: 'POST', // Adjust to 'GET' if the server expects a GET request
        headers: {
            'Content-Type': 'application/json',
        },
    })
    .then(response => response.json()) // Parse the JSON response
    .then(data => {
        // Populate modal fields with data
        $("#club-thumbnail").attr("src", data.logo_du_club ? "<?= base_url().'assets/assets/images/' ?>" + data.logo_du_club : "<?= base_url().'assets/assets/images/default-thumbnail.jpg' ?>");

        $("#club-nom").text(data.nom_du_club || "N/A");
        $("#club-activites").text(data.activites || "N/A");
        $("#club-membres").text(data.nombre_de_membres || "N/A");
        $("#club-adresse").text(data.adresse_complete || "N/A");
        $("#club-telephone").text(data.telephone || "N/A");
        $("#club-email").text(data.adresse_email || "N/A");
        $("#club-type").text(data.type || "N/A");
        $("#club-date-creation").text(data.created_at || "N/A");
    })
    .catch(error => {
        console.error("Error fetching club details:", error);

        // Optionally, show an error message in the modal
        $("#clubModalLabel").text("Erreur");
        $(".modal-body").html("<p style='color:red;'>Erreur lors de la récupération des données du club.</p>");
    });
}

</script>

<script>

</script>
<?php 
    // $id = $this->input->get('id_evenement');
    // $evenements = $this->db->select('*')->where('id',$id)->get('evenement')->row_array();
    // $evenements = $evenements[0];
    $nom_event = $evenements['nom'];
    $date_debut = $evenements['date_debut'];
    $date_fin = $evenements['date_fin'];
    $photo = $evenements['photo'];
    
?>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>



<!-- bread crumb area -->
<div class="rts-bread-crumbarea-1 rts-section-gap bg_image">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-main-wrapper">
                    <h1 class="title">S'incrire à l'événement</h1>
                    <!-- breadcrumb pagination area -->
                    <div class="pagination-wrapper">
                        <a href="<?php echo base_url('acceuil')?>">Acceuil</a>
                        <i class="fa-regular fa-chevron-right"></i>
                        <a class="active" href="#">S'inscrire à l'événement</a>
                    </div>
                    <!-- breadcrumb pagination area end -->
                </div>
            </div>
        </div>
    </div>
</div>
<!-- bread crumb area end -->

<!-- rts contact area start -->
<div class="rts-contact-area rts-section-gapTop">
    <div class="container">
        <div class="row g-5">
            <div class="col-xl-5">
                <!-- contact left area start -->
                <div class="contact-left-area-start">
                    <div class="title-area-left-style">
                        <h2 class="title">Ne manquez pas nos événements
                            <br>
                            <span>Inscrivez-vous maintenant!</span>
                        </h2>
                    </div>
                    <form id="contactForm" method="post" class="contact-page-form">
                        <div class="single-input">
                            <label for="name">Nom & Prénom *</label>
                            <input id="name" name="name" type="text" placeholder="...." required>
                        </div>
                        <div class="single-input">
                            <label for="mail">Adresse Mail *</label>
                            <input id="mail" name="mail" type="email" placeholder="info@etudiant.com" required>
                        </div>
                        <div class="single-input">
                            <label for="message">Message *</label>
                            <textarea id="message" name="message" placeholder="Dites-nous pourquoi vous souhaitez participer à cet événement" required></textarea>
                        </div>
                        <button type="submit" class="rts-btn btn-primary mt--30">S'inscrire à l'événement</button>
                    </form>
                    <div id="form-messages" class="mt--20"></div>
                </div>
                <!-- contact left area end -->
            </div>
            <div class="col-xl-7 pl--50 pl_lg--15 pl_md--15 pl_sm--15 pb_md--100 pb_sm--100">
                <div class="contact-map-area-start" style="align-items: flex-start">
                    <div class="single-maptop-info">
                        <div class="icon">
                            <img src="<?php echo base_url() . 'public/images/un-evenement.png' ?>" height="39" width="39" alt="evenement">
                        </div>
                        <p class="disc">
                        <?= $nom_event ?> <br>
                        </p>
                    </div>
                    <div class="single-maptop-info">
                        <div class="icon">
                            <img src="<?php echo base_url() . 'public/images/03.png' ?>" alt="evenement">
                        </div>
                        <a href="tel:+216 73 368 000">(+216)73368000 </a></li> <br>
                        <a href="tel:+216 73 368 130">(+216)73368130 </a></li>
                    </div>
                    <div class="single-maptop-info">
                        <div class="icon">
                            <img src="<?php echo base_url() . 'public/images/04.png' ?>" alt="evenement">
                        </div>
                        <p class="disc">
                            Du <?= $date_debut ?> <br>à  <?= $date_fin ?>
                            
                        </p>
                    </div>
                </div>
                <div class="map-bottom-area mt--30">
                    <img src="<?= $photo ?>" alt="evenement">
                        
                </div>
            </div>
        </div>
    </div>
</div>
<!-- rts contact area end -->

<div class="rts-section-gap">

</div>

<script>
$(document).ready(function() {
    $('#contactForm').on('submit', function(e) {
        e.preventDefault(); // Prevent the default form submission
        console.log('Form submission intercepted'); // Debugging line
        // Extract id_evenement from the URL
        const urlParams = new URLSearchParams(window.location.search);
        const id_evenement = urlParams.get('id_evenement');
        var formData = {
            name: $('#name').val(),
            mail: $('#mail').val(),
            message: $('#message').val(),
            id_evenement: id_evenement  // Include id_evenement in the form data
        };

        console.log('Form data:', formData); // Debugging line

        $.ajax({
            url: 'news/subscribeMail',
            type: 'POST',
            data: formData,
            dataType: 'json',
            success: function(response) {
                console.log('Response:', response); // Debugging line
                if (response.success) {
                    Swal.fire({
                        icon: "success",
                        title: "Message envoyé avec succés!",
                        showConfirmButton: false,
                        timer: 1500
                    }); // Displays: "Envoyé avec succès"

                    $("#contactForm")[0].reset();
                    $(".form-group").removeClass('has-error').removeClass('has-success');
                    $(".text-danger").remove();
                } else {
                    Swal.fire({
                        icon: "error",
                        title: "Échec de l'envoi!",
                        showConfirmButton: false,
                        timer: 2000
                    }); // Displays: "Échec de l'envoi"
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.error('Error:', textStatus, errorThrown);
                alert("Une erreur s'est produite lors de l'envoi de l'e-mail.");
            }
        });
    });
});
</script>


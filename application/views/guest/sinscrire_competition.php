<?php 
    $nom_competition = $competitions['nom'];
    $date_debut = $competitions['date_debut'];
    $date_fin = $competitions['date_fin'];
    $photo = $competitions['photo'];
    
?>
       <style>
        .bg-image {
            position: relative;
            /* Ensure the container acts as a reference for the pseudo-element */
            overflow: hidden; /* Prevent content overflow */
        }

        .bg-image::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: url("<?= $photo ?>");
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            filter: blur(8px);
            -webkit-filter: blur(8px);
            z-index: -1; /* Place the blurred background behind the content */
        }

        .container {
            position: relative;
            z-index: 1; /* Ensure content appears above the background */
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
                              <h2 class="heading">S'inscrire à la Compétition</h2>
                          </div>
                          <div class="breadcrumb__inner">
                              <ul>
                                  <li><a href="<?= base_url() ?>">Home</a></li>
                                  <li>S'inscrire à la Compétition</li>
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

      <!-- .contact__section__start -->
      <div class="contact__section sp_top_100 sp_bottom_50" data-aos="fade-up">
          <div class="container">
              <div class="row">
                  <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12">
                      <div class="single__contact">
                          <div class="contact__icon">
                          <img src="<?php echo base_url() . 'public/images/trophy.png' ?>" height="39" width="39" style="color:blue" alt="evenement">
                          </div>
                          <div class="contact__text">
                              <h5>Nom Compétition</h5>
                              <div class="contact__email">
                                  <p><?= $nom_competition ?></p>
                                  
                              </div>
                          </div>
                      </div>
                  </div>

                  <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12">
                      <div class="single__contact">
                          <div class="contact__icon">
                          <img src="<?php echo base_url() . 'public/images/04.png' ?>" alt="evenement">

                          </div>
                          <div class="contact__text">
                              <h5>Date Compétition</h5>
                              <div class="contact__email">
                                  <p>Du <?= $date_debut ?> </p>
                                  <span>à  <?= $date_fin ?></span>

                              </div>
                          </div>
                      </div>
                  </div>

                  <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12">
                      <div class="single__contact">
                          <div class="contact__icon">
                              <svg width="58" height="58" viewBox="0 0 58 58" fill="none" xmlns="http://www.w3.org/2000/svg">
                                      <path d="M45.7084 35.8601C44.5233 34.6261 43.0938 33.9664 41.5788 33.9664C40.076 33.9664 38.6343 34.6139 37.4003 35.8479L33.5394 39.6965C33.2218 39.5255 32.9041 39.3667 32.5987 39.2078C32.1588 38.9879 31.7434 38.7802 31.3891 38.5603C27.7726 36.2633 24.486 33.2699 21.3338 29.3969C19.8066 27.4665 18.7803 25.8415 18.035 24.1921C19.0368 23.2757 19.9654 22.3227 20.8695 21.4064C21.2116 21.0643 21.5537 20.71 21.8958 20.3679C24.4616 17.8021 24.4616 14.4789 21.8958 11.9131L18.5603 8.57765C18.1816 8.19889 17.7906 7.80792 17.4241 7.41695C16.691 6.65944 15.9213 5.8775 15.1271 5.14443C13.942 3.97151 12.5247 3.3484 11.0341 3.3484C9.54355 3.3484 8.10184 3.97151 6.88006 5.14443C6.86784 5.15665 6.86784 5.15665 6.85562 5.16886L2.70155 9.35959C1.13766 10.9235 0.24576 12.8295 0.0502747 15.0409C-0.242954 18.6085 0.807782 21.9318 1.61416 24.1065C3.59345 29.4458 6.55018 34.394 10.9608 39.6965C16.3122 46.0865 22.7511 51.1325 30.1062 54.6878C32.9163 56.0196 36.6672 57.5957 40.8579 57.8645C41.1145 57.8767 41.3833 57.8889 41.6277 57.8889C44.45 57.8889 46.8202 56.8748 48.6774 54.8589C48.6896 54.8345 48.714 54.8222 48.7262 54.7978C49.3616 54.0281 50.0946 53.3317 50.8644 52.5864C51.3897 52.0854 51.9273 51.5601 52.4527 51.0103C53.6622 49.7518 54.2976 48.2857 54.2976 46.7829C54.2976 45.2679 53.65 43.8139 52.416 42.5922L45.7084 35.8601ZM50.0824 48.7255C50.0702 48.7255 50.0702 48.7378 50.0824 48.7255C49.6059 49.2387 49.1172 49.703 48.5918 50.2161C47.7977 50.9736 46.9913 51.7678 46.2338 52.6597C44.9998 53.9792 43.5459 54.6023 41.6399 54.6023C41.4566 54.6023 41.2611 54.6023 41.0779 54.5901C37.4491 54.358 34.077 52.9407 31.5479 51.7311C24.6326 48.3834 18.5603 43.6307 13.5144 37.6073C9.34807 32.5857 6.56239 27.943 4.7175 22.9581C3.58124 19.9158 3.16583 17.5456 3.3491 15.3097C3.47128 13.8802 4.02108 12.6951 5.03516 11.681L9.20145 7.51469C9.80013 6.95267 10.4355 6.64723 11.0586 6.64723C11.8283 6.64723 12.4514 7.1115 12.8424 7.50248C12.8546 7.51469 12.8668 7.52691 12.879 7.53913C13.6243 8.23555 14.333 8.9564 15.0782 9.72613C15.457 10.1171 15.848 10.5081 16.2389 10.9113L19.5744 14.2467C20.8695 15.5418 20.8695 16.7392 19.5744 18.0343C19.2201 18.3886 18.878 18.7429 18.5237 19.085C17.4974 20.1357 16.52 21.1132 15.457 22.0662C15.4326 22.0906 15.4081 22.1028 15.3959 22.1273C14.3452 23.178 14.5407 24.2043 14.7606 24.9007C14.7728 24.9374 14.785 24.974 14.7972 25.0107C15.6647 27.1121 16.8865 29.0914 18.7436 31.4495L18.7558 31.4617C22.1279 35.6158 25.6833 38.8535 29.6053 41.3337C30.1062 41.6514 30.6194 41.908 31.1081 42.1523C31.5479 42.3722 31.9633 42.5799 32.3176 42.7999C32.3665 42.8243 32.4154 42.861 32.4643 42.8854C32.8797 43.0931 33.2706 43.1908 33.6738 43.1908C34.6879 43.1908 35.3232 42.5555 35.5309 42.3478L39.7094 38.1693C40.1249 37.7539 40.7846 37.253 41.5543 37.253C42.3119 37.253 42.935 37.7295 43.3137 38.1449C43.3259 38.1571 43.3259 38.1571 43.3382 38.1693L50.0702 44.9013C51.3286 46.1476 51.3286 47.4304 50.0824 48.7255Z" fill="#5F2DED"/>
                                      <path d="M31.2424 13.7702C34.4435 14.3078 37.3514 15.8228 39.6728 18.1442C41.9942 20.4656 43.497 23.3735 44.0468 26.5746C44.1812 27.3809 44.8776 27.943 45.6717 27.943C45.7695 27.943 45.855 27.9307 45.9527 27.9185C46.8569 27.7719 47.4555 26.9167 47.3089 26.0125C46.6492 22.1395 44.8165 18.6085 42.0186 15.8106C39.2207 13.0127 35.6897 11.1801 31.8167 10.5203C30.9126 10.3737 30.0695 10.9724 29.9107 11.8643C29.7519 12.7562 30.3383 13.6236 31.2424 13.7702Z" fill="#5F2DED"/>
                                      <path d="M57.7793 25.536C56.6919 19.1583 53.6863 13.3548 49.0679 8.73649C44.4496 4.11814 38.6461 1.11255 32.2684 0.0251576C31.3765 -0.133675 30.5334 0.477218 30.3746 1.36912C30.228 2.27324 30.8267 3.11628 31.7308 3.27511C37.4243 4.24032 42.6169 6.94047 46.7465 11.0579C50.8762 15.1875 53.5641 20.3801 54.5293 26.0736C54.6637 26.88 55.3601 27.442 56.1543 27.442C56.252 27.442 56.3376 27.4298 56.4353 27.4176C57.3272 27.2832 57.9381 26.428 57.7793 25.536Z" fill="#5F2DED"/>
                                      </svg>
                          </div>
                          <div class="contact__text">
                              <h5>Téléphone</h5>
                              <div class="contact__email">
                                  <p><a href="tel:+216 73 368 000">(+216)73368000 </a></p>
                                  <span><a href="tel:+216 73 368 130">(+216)73368130 </a></span>

                              </div>
                          </div>
                      </div>
                  </div>


              </div>
          </div>
      </div>
      <!-- .contact__section__end -->


      <!-- contact__form__start -->
      <div class="contact__from__wraper sp_bottom_100">
          <div class="container">
              <div class="row">
                  <div class="col-xl-12">
                      <div class="contact__form__inner">
                          <div class="contact__form__heading" data-aos="fade-up">
                              <h3>Ne manquez pas nos compétitions</h3>
                              <p style="font-weight:bold">Inscrivez-vous maintenant!</p>
                          </div>


                          <form id="contactForm" class="contact-form">
                              <div class="row">

                                  <div class="col-xl-6" data-aos="fade-up">
                                      <div class="contact__input__wraper">
                                          <input type="text" name="name" id="name" placeholder="Entrez votre nom et prénom*">
                                          <div class="contact__icon">
                                              <i class="icofont-businessman"></i>
                                          </div>
                                      </div>
                                  </div>

                                  <div class="col-xl-6" data-aos="fade-up">
                                      <div class="contact__input__wraper">
                                          <input type="email" name="mail" id="mail" placeholder="Entrez votre adresse e-mail*">
                                          <div class="contact__icon">
                                              <i class="icofont-envelope"></i>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="col-xl-12" data-aos="fade-up">
                                      <div class="contact__input__wraper">
                                          <textarea name="message" id="message" cols="30" rows="10" placeholder="Rédigez un court paragraphe sur votre projet avec lequel vous serez impliqué dans cette compétition...*"></textarea>
                                          <div class="contact__icon">
                                              <i class="icofont-pen-alt-2"></i>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="col-xl-6" data-aos="fade-up">
                                        <label for="evenement-photo">Merci d'ajouter votre cv * </label>
                                            <div style="
                                                border: 0.1px solid #dddddd;
                                                margin: 0 0 30px 0;
                                                border-radius: 5px;
                                                padding: 20px;
                                            ">
                                                <div class="course-thumbnail-upload-area">
                                                    <div class="thumbnail-area" style="height:100px">
                                                        <img id="competition-photo" style="max-height:100%" src="<?= base_url()."public/new/images/dashboard/05.png" ?>" alt="appel">
                                                    </div>
                                                    <div class="information">
                                                        
                                                        <span>File Support: PDF</span>
                                                        <div class="input-file-type-btn">
                                                            <input type="file" id="real-file" name="pdf_cv"  hidden />
                                                            <button type="button" class="btn btn-primary" id="custom-button">Choisir Un Fichier</button>
                                                            <span id="custom-text">Aucun fichier choisit</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-6" data-aos="fade-up">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <label for="mail">Signature Numérique *</label>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12" style="border:1px solid #dddddd;border-radius:5px;">
                                                    <canvas id="sig-canvas" width="620" height="160">
                                                    <div class="placeholder">Merci de nous confirmer votre participation à cette compétition en signant!</div>
                                                    </canvas>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12" style="margin-top: 10px;">
                                                    <!-- <button class="btn btn-primary" id="sig-submitBtn" style="width: auto;">Submit Signature</button> -->
                                                    <button class="btn btn-danger" id="sig-clearBtn" style="width: auto;">Clear Signature</button>
                                                </div>
                                            </div>
                                            <br/>
                                            <div class="row" hidden>
                                                <div class="col-md-12">
                                                    <textarea id="sig-dataUrl" class="form-control" rows="5">Data URL for your signature will go here!</textarea>
                                                </div>
                                            </div>
                                            <br/>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <img id="sig-image" src="" alt="Your signature will go here!"/>
                                                </div>
                                            </div>
                                        </div>
                                  <div class="col-xl-12" data-aos="fade-up">
                                      <div class="contact__button">

                                          <button type="submit" value="submit" class="default__button" id="sig-submitBtn" name="submit">S'inscrire à la compétition</button>

                                          <p class="form-messege"></p>

                                      </div>
                                  </div>
                              </div>
                          </form>

                      </div>
                  </div>
              </div>
          </div>
      </div>
      <!-- contact__form__end-->
      <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
		(function() {
  window.requestAnimFrame = (function(callback) {
    return window.requestAnimationFrame ||
      window.webkitRequestAnimationFrame ||
      window.mozRequestAnimationFrame ||
      window.oRequestAnimationFrame ||
      window.msRequestAnimaitonFrame ||
      function(callback) {
        window.setTimeout(callback, 1000 / 60);
      };
  })();

  var canvas = document.getElementById("sig-canvas");
  var ctx = canvas.getContext("2d");
  ctx.strokeStyle = "#222222";
  ctx.lineWidth = 4;

  var drawing = false;
  var mousePos = {
    x: 0,
    y: 0
  };
  var lastPos = mousePos;

  canvas.addEventListener("mousedown", function(e) {
    drawing = true;
    lastPos = getMousePos(canvas, e);
  }, false);

  canvas.addEventListener("mouseup", function(e) {
    drawing = false;
  }, false);

  canvas.addEventListener("mousemove", function(e) {
    mousePos = getMousePos(canvas, e);
  }, false);

  // Add touch event support for mobile
  canvas.addEventListener("touchstart", function(e) {

  }, false);

  canvas.addEventListener("touchmove", function(e) {
    var touch = e.touches[0];
    var me = new MouseEvent("mousemove", {
      clientX: touch.clientX,
      clientY: touch.clientY
    });
    canvas.dispatchEvent(me);
  }, false);

  canvas.addEventListener("touchstart", function(e) {
    mousePos = getTouchPos(canvas, e);
    var touch = e.touches[0];
    var me = new MouseEvent("mousedown", {
      clientX: touch.clientX,
      clientY: touch.clientY
    });
    canvas.dispatchEvent(me);
  }, false);

  canvas.addEventListener("touchend", function(e) {
    var me = new MouseEvent("mouseup", {});
    canvas.dispatchEvent(me);
  }, false);

  function getMousePos(canvasDom, mouseEvent) {
    var rect = canvasDom.getBoundingClientRect();
    return {
      x: mouseEvent.clientX - rect.left,
      y: mouseEvent.clientY - rect.top
    }
  }

  function getTouchPos(canvasDom, touchEvent) {
    var rect = canvasDom.getBoundingClientRect();
    return {
      x: touchEvent.touches[0].clientX - rect.left,
      y: touchEvent.touches[0].clientY - rect.top
    }
  }

  function renderCanvas() {
    if (drawing) {
      ctx.moveTo(lastPos.x, lastPos.y);
      ctx.lineTo(mousePos.x, mousePos.y);
      ctx.stroke();
      lastPos = mousePos;
    }
  }

  // Prevent scrolling when touching the canvas
  document.body.addEventListener("touchstart", function(e) {
    if (e.target == canvas) {
      e.preventDefault();
    }
  }, false);
  document.body.addEventListener("touchend", function(e) {
    if (e.target == canvas) {
      e.preventDefault();
    }
  }, false);
  document.body.addEventListener("touchmove", function(e) {
    if (e.target == canvas) {
      e.preventDefault();
    }
  }, false);

  (function drawLoop() {
    requestAnimFrame(drawLoop);
    renderCanvas();
  })();

  function clearCanvas() {
    canvas.width = canvas.width;
  }

  // Set up the UI
  var sigText = document.getElementById("sig-dataUrl");
  var sigImage = document.getElementById("sig-image");
  var clearBtn = document.getElementById("sig-clearBtn");
  var submitBtn = document.getElementById("sig-submitBtn");
  clearBtn.addEventListener("click", function(e) {
    clearCanvas();
    sigText.innerHTML = "Data URL for your signature will go here!";
    sigImage.setAttribute("src", "");
  }, false);
  submitBtn.addEventListener("click", function(e) {
    var dataUrl = canvas.toDataURL();
    sigText.innerHTML = dataUrl;
    sigImage.setAttribute("src", dataUrl);
  }, false);

})();
// Wait for the DOM to load
document.addEventListener("DOMContentLoaded", function () {
    const realFileInput = document.getElementById("real-file");
    const customButton = document.getElementById("custom-button");
    const customText = document.getElementById("custom-text");

    // Open file input when custom button is clicked
    customButton.addEventListener("click", function () {
        realFileInput.click();
    });

    // Update the text when a file is selected
    realFileInput.addEventListener("change", function () {
        if (realFileInput.files.length > 0) {
            customText.textContent = realFileInput.files[0].name; // Show the selected file name
        } else {
            customText.textContent = "Aucun fichier choisi";
        }
    });
});

$(document).ready(function() {
    $('#contactForm').on('submit', function(e) {
        e.preventDefault(); // Prevent the default form submission

        // Extract id_competition from the URL
        const urlParams = new URLSearchParams(window.location.search);
        const id_competition = urlParams.get('id_competition');
        
        // Prepare the form data
        var formData = new FormData();
        formData.append("name", $('#name').val());
        formData.append("mail", $('#mail').val());
        formData.append("message", $('#message').val());
        formData.append("pdf_cv", $('#real-file')[0].files[0]); // Attach file
        formData.append("id_competition", id_competition); 
        
        // Convert signature canvas to image data URL
        var canvas = document.getElementById("sig-canvas");
        var signatureDataUrl = canvas.toDataURL(); 
        formData.append("signature", signatureDataUrl);

        $.ajax({
            url: 'news/subscribeCompMail',
            type: 'POST',
            data: formData,
            processData: false, // Required for FormData
            contentType: false, // Required for FormData
            dataType: 'json',
            success: function(response) {
                if (response.success) {
                    Swal.fire({
                        icon: "success",
                        title: "Message envoyé avec succès!",
                        showConfirmButton: false,
                        timer: 1500
                    });
                    $("#contactForm")[0].reset();
                } else {
                    Swal.fire({
                        icon: "error",
                        title: "Échec de l'envoi!",
                        showConfirmButton: false,
                        timer: 2000
                    });
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

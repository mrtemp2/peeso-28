<style>
    textarea{
        height: 227px;
        border-radius: 6px;
        border: 1px solid #DDD8F9;
        padding: 10px 15px;
    }
    .select2-selection--single {
    height: 56px !important;
}

span.select2.select2-container {
    width:100% !important;
    height: 56px !important;
}

span.select2-selection.select2-selection--multiple {
    height:100%;
    overflow-y: overlay;
}
.jquery-uploader * {
    box-sizing: border-box;
}

.jquery-uploader {
    display: block;
    box-sizing: border-box;
    position: relative;
}

.jquery-uploader-preview-container {
    padding: 10px;
    height: 100%;
    width: 100%;
    background-color: white;
}


.jquery-uploader-card {
    vertical-align: middle;
    width: 120px;
    height: 120px;
    border: 1px solid rgba(103, 103, 103, 0.39);
    padding: 5px;
    margin: 5px;
    display: inline-block;
}

.jquery-uploader-select-card {
    vertical-align: middle;
    width: 120px;
    height: 120px;
    border: 1px dashed rgba(103, 103, 103, 0.39);
    padding: 5px;
    margin: 5px;
    display: inline-block;
}

.jquery-uploader-select-card:hover {
    border-color: #8989f8;
    cursor: pointer;
}

.jquery-uploader-preview-main {
    position: relative;
    height: 100%;
    width: 100%;
}

.jquery-uploader-preview-main > .files_img {
    object-fit: cover;
    height: 100%;
    width: 100%;
}
.jquery-uploader-preview-main > .file_other{
    height: 100%;
    width: 100%;
    background-size: cover;
    background-image:url('data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBzdGFuZGFsb25lPSJubyI/PjwhRE9DVFlQRSBzdmcgUFVCTElDICItLy9XM0MvL0RURCBTVkcgMS4xLy9FTiIgImh0dHA6Ly93d3cudzMub3JnL0dyYXBoaWNzL1NWRy8xLjEvRFREL3N2ZzExLmR0ZCI+PHN2ZyB0PSIxNjU1NDM1NzYzMDI4IiBjbGFzcz0iaWNvbiIgdmlld0JveD0iMCAwIDEwMjQgMTAyNCIgdmVyc2lvbj0iMS4xIiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHAtaWQ9IjU5MjMiIHdpZHRoPSIzMDAiIGhlaWdodD0iMzAwIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayI+PGRlZnM+PHN0eWxlIHR5cGU9InRleHQvY3NzIj48L3N0eWxlPjwvZGVmcz48cGF0aCBkPSJNNjc3LjMxOTIyNyA4MjMuMzY2ODM2SDI3OS4xNzgwMjZWMTI4Ljc1NTIzOWg1MjAuODU0NTI3djU3Mi45Mzk5OHoiIGZpbGw9IiM3Q0IzNDIiIHAtaWQ9IjU5MjQiPjwvcGF0aD48cGF0aCBkPSJNMzY1Ljg0ODIyIDUyOC4xNDY0OUg2OTUuODYxNjQ4djM0LjU4NDc0MUgzNjUuODQ4MjJ6TTM2NS44NDgyMiAzODkuMTgyNTAzSDY5NS44NjE2NDh2MzQuNzkzMDgySDM2NS44NDgyMnpNMzY1Ljg0ODIyIDI1MC4yMTg1MTVINjk1Ljg2MTY0OHYzNC43OTMwODJIMzY1Ljg0ODIyeiIgZmlsbD0iIzlGQThEQSIgcC1pZD0iNTkyNSI+PC9wYXRoPjxwYXRoIGQ9Ik02NDIuMzE3ODAzIDg5NS4yNDQ3NjFIMjIzLjk2NzQ0N3YtNzI5LjE5NjMzOGg1NDcuMTA1NTk1djYwMS42OTExNXoiIGZpbGw9IiM5Q0NDNjUiIHAtaWQ9IjU5MjYiPjwvcGF0aD48cGF0aCBkPSJNMzE1LjIyMTE2IDU4NS40NDA0ODhoMzQ2LjI2NDA4OXYzNi40NTk4MTdIMzE1LjIyMTE2ek0zMTUuMjIxMTYgNDM5LjYwMTIyMWgzNDYuMjY0MDg5djM2LjQ1OTgxN0gzMTUuMjIxMTZ6TTMxNS4yMjExNiAyOTMuNzYxOTUzaDM0Ni4yNjQwODl2MzYuNDU5ODE3SDMxNS4yMjExNnpNNjU2LjY5MzM4OCA3NzIuMTE0NzUxaDEwOS4zNzk0NWwtMTA5LjM3OTQ1IDEwOS4zNzk0NXoiIGZpbGw9IiM3Q0IzNDIiIHAtaWQ9IjU5MjciPjwvcGF0aD48L3N2Zz4=');
}
.file_other.video{
    background-image:url('<?= base_url() ?>public/new/images/icons/video_1179120.png') !important;
}
.file_other.pdf{
    background-image:url('<?= base_url() ?>public/new/images/icons/document_16509258.png') !important;
}
.file_other.doc{
    background-image:url('<?= base_url() ?>public/new/images/icons/doc_8263192.png') !important;
}


.jquery-uploader-select {
    position: relative;
    height: 100%;
    width: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    text-align: center;
}

.jquery-uploader-select  i {
    color: black;
}

.jquery-uploader-select > .upload-button {
    height: 50px;
}

.jquery-uploader-preview-action {
    position: absolute;
    text-align: center;
    top: 0;
    left: 0;
    height: 100%;
    width: 100%;
    z-index: 2;
    opacity: 0;
    background-color: rgba(0, 0, 0, 0.36);
}

.jquery-uploader-preview-action i {
    color: white;
}

.jquery-uploader-preview-action:hover {
    opacity: 100;
}

.jquery-uploader-preview-action > ul {
    margin: 0;
    padding-left: 0;
    text-align: center;
    padding-top: 40px;
    list-style: none;
    display: inline-block;
}

.jquery-uploader-preview-action > ul > li {
    cursor: pointer;
    padding: 5px;
    float: left;
}

.jquery-uploader-preview-action > ul > li:hover {
    transform: scale(1.3);
}

.jquery-uploader-preview-progress {
    position: absolute;
    background-color: rgba(0, 0, 0, 0.2);
    z-index: 3;
    width: 100%;
    height: 100%;
}

.jquery-uploader-preview-progress > .progress-mask {
    position: absolute;
    top: 0;
    z-index: -1;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.6);

}

.jquery-uploader-preview-progress > .progress-loading {
    display: flex;
    justify-content: center;
    height: 100%;
    align-items: center;
}

.jquery-uploader-preview-progress > .progress-loading > i {
    color: white;
}
</style>

<div class="col-lg-9">
        <div class="login-page-form-area" style="max-width:100% !important; width:100% !important;" role="document">
        <div>
            <h4 class="title">Créer Un Nouveau Projet</h4>
        </div>    
        <form class="form-horizontal" action="projet/add_project" method="post" id="addProjectForm" enctype="multipart/form-data">
              
            <div class="single-input-wrapper">
                <label for="titre">Titre : </label>
				<input type="text" id="titre" name="titre" class="form-control" placeholder="Ajouter titre">
              
			</div>
                <div class="single-input-wrapper">
                    <label for="domaines" >domaines : </label>

                    <select class="js-example-basic-multiple" name="domaines[]" id="domaines" multiple="multiple">
                             <?php 
                             foreach($domaine as $d){
                                ?>
                                <option value="<?=$d['id']?>">
                                        <?=$d['nom']?>
                                </option>
                             
                             <?php

                             }
                             ?>
                    </select>
                        
                </div>
                <div class="single-input-wrapper">
                        <label for="titre">Avez-vous participé à une des promotions du Statut National de l'Etudiant Entrepreneur du PEESo? : </label>
                        <select name="old_promotion_porter" id="old_promotion_porter">
                             <option value="aucune">
                                Aucune
                             </option>
                             <option value="1ére promotion">
                                1ére Promotion
                             </option>
                             <option value="2éme Promotion">
                                2éme Promostion
                             </option>
                        </select>
                    
                </div>
                <div class="single-input-wrapper" style="display: none;">
                        <label for="titre"> quel niveau qui vous a été attribué? </label>
                        <select name="old_niveau_porter" id="old_niveau_porter">
                            <option value="">
                                Choisir Un Niveau
                             </option>
                             <option value="Initiateur">
                                Initiateur
                             </option>
                             <option value="Innovateur">
                                 Innovateur
                             </option>
                             <option value="Promoteur">
                                Promoteur
                             </option>
                        </select>
                    
                </div>
                <div class="single-input-wrapper">
                    <label for="cv_porter">Ajouter Votre Cv </label>
                    <div class="course-thumbnail-upload-area">
                        <div class="thumbnail-area" style="width:200px;height:200px">
                            <img id="user-photo" src="<?= base_url().'public/new/pdf-thumbnail.png' ?>" alt="dashboard">
                        </div>
                        <div class="information">
                            <span>File Support:</span>
                            <div class="input-file-type-btn">
                                <input type="file" id="real-file"  name="cv_porter"  hidden />
                                <button type="button" class="rts-btn btn-primary" id="custom-button">Choisir Un Fichier</button>
                                <span id="custom-text">Aucun fichier choisit</span>
                            </div>
                        </div>


                    </div>
                    <div class="form-error">

                    </div>

                </div>
                    
                <div class="single-input-wrapper">
                    <label for="besoin_project">A quel besoin votre projet répond-il ?  : </label>
                    <textarea name="besoin_project" id="besoin_project">

                    </textarea>
                    <div class="form-error">
                        
                        </div>
                </div>
                <div class="single-input-wrapper">
                    <label for="solution_project">Quelle solution apporte votre projet à ce besoin ? : </label>
                    <textarea name="solution_project" id="solution_project">

                    </textarea>
                    <div class="form-error">

                    </div>
                </div>
                <div class="single-input-wrapper">
                    <label for="clients_potentiels">Qui sont vos clients potentiels?  : </label>
                    <textarea name="clients_potentiels" id="clients_potentiels">

                    </textarea>
                    <div class="form-error">
                        
                     </div>
                </div>
                <div class="single-input-wrapper">
                    <label for="offre"> Quelle offre (produit et/ou service) proposez-vous à vos clients ?  : </label>
                    <textarea name="offre" id="offre">

                    </textarea>
                    <div class="form-error">
                        
                     </div>
                </div>
                <div class="single-input-wrapper">
                    <label for="genre_project"> Le Project est : </label>
                        <select name="genre_project" id="genre_project">
                            <option value="Une création d'activité">Une création d'activité</option>
                            <option value="Transmission d'activité familiale">Transmission d'activité familiale</option>
                           <option value="Reprise d'une activité (autre que familiale)"> Reprise d'une activité (autre que familiale)</option>
                            
                        </select>
                    
                    
                </div>
                <div class="single-input-wrapper">
                    <label for="link_vid"> Vidéo (d\'une minute au maximum) de présentation du projet (insérer lien Youtube): </label>
                    <input type="text" name="link_vid" id="link_vid">

                    
                    <div class="form-error">
                        
                     </div>
                </div>
                <div class="single-input-wrapper">
                    <label for="creation_step"> Où êtes vous dans votre projet?: </label>
                    <select  name="creation_step" id="creation_step">
                          <option value="juste une idée">Nous avons juste une idée</option>   
                          <option value="le business plan est élaboré">Nous avons élaboré le business plan</option> 
                          <option value="entreprise est déjà créée">Notre entreprise est déjà créée</option> 
                    </select>

                    
                    <div class="form-error">
                        
                     </div>
                </div>
                <div class="single-input-wrapper">
                    <label for="motivation_letter"> Quelle est votre motivation pour intégrer le PEESo (100 mots au maximum) ?  : </label>
                    <textarea name="motivation_letter" id="motivation_letter">

                    </textarea>
                    <div class="form-error">
                        
                     </div>
                </div>
                <div class="single-input-wrapper">
                <div class="rts-reviewd-area-dashed table-responsive">
                                    
                                    <a id="create-membre-button" class="rts-btn btn-primary" style="margin-bottom:20px;cursor:pointer"> Ajouter Des Membres</a>
                                    <table class="table-reviews quiz">
                                        <thead >
                                            <tr>
                                                <th style="width: 10%;">Nom</th>
                                                <th style="width: 20%;">Prenom</th>
                                                <th style="width: 30%;">Email</th>
                                                <th style="width: 20%;">Actions</th>
                                               
                                            </tr>
                                        </thead>
                                        <tbody id="membres-content">
                                            
                                        </tbody>
                                    </table>
                                    <!--<div class="pagination-full-width">
                                        <span>Page 1 of 4</span>
                                        <div class="pagination">
                                            <ul>
                                                <li><a href="#0" class="prev"><i class="fa-solid fa-chevron-left"></i></a></li>
                                                <li><a href="#0">1</a></li>
                                                <li><a href="#0">2</a></li>
                                                <li><a href="#0">3</a></li>
                                                <li><a href="#0">4</a></li>
                                                <li><a href="#0" class="next"><i class="fa-solid fa-chevron-right"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>-->
                                </div>    
                </div>    

                <input type="hidden" name="id_appel_condidature" id="id_appel_condidature" value="<?=$appel?>">
                
                <center>
                <button type="submit" style="margin-top: 20px;" class="rts-btn btn-primary">Sauvegarder</button>
                </center>
                
            </form>
            
        </div>
    </div>
</div>
<div class="modal fade" id="addMemberModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">



<div class="modal-dialog login-page-form-area" role="document">
<div class="modal-content" style="border:none !important;">
    <div class="modal-header" style="border-bottom:none !important;">
    <h5 class="modal-title" id="exampleModalLabel">Ajouter Membre</h5>
  
    </div>
    <div class="modal-body">
    <form  action="projet/addCacheUsers" method="post" id="addMember" enctype="multipart/form-data">
        
        <div class="single-input-wrapper">
        </div>
        <div class="single-input-wrapper">
            <label class="form-control-label" for="nom">Nom: </label>
            <input type="text"  name="nom" id="nom">
            <div class="form-error" ></div>
        </div>
        <div class="single-input-wrapper">
            <label class="form-control-label" for="prenom">Prénom: </label>
            <input type="text"  name="prenom" id="prenom">
            <div class="form-error" ></div>
        </div>
        <div class="single-input-wrapper">
            <label for="phone">Numéro De Téléphone</label>
            <input type="text" id="phone" name="phone"  placeholder="Numero de Téléphone" maxlength=8 required>
            <div class="form-error"></div>
        </div>
        <div class="single-input-wrapper">
            <label for="email">Adresse Email</label>
            <input type="email"  id="email" name="email" placeholder="Exp: Exp@gmail.com" required>
            <div class="form-error"></div>
        
        </div>
        
        <div class="single-input-wrapper">
            <label for="niveau">Niveau D'étude</label>
             <select name="niveau" id="niveau">
             <option value="1ère année">1ère année</option>
            <option value="2ème année"> 2ème année</option>
            <option value="3ème année">3ème année</option>
            <option value="4ème année">4ème année</option>
            <option value="5ème année">5ème année</option>
           <option value="Master1">Master1</option> 
           <option value="Master2">Master2</option> 
           <option value="Doctorat">Doctorat</option> 

                            
             </select>                
            <div class="form-error"></div>
        
        </div>
      
        <div class="single-input-wrapper">
        <label for="etablissement_id">Etablissement</label>
        <select name="etablissement_id" id="etablissement_id">
            <option value="">
                Sélectionner Un établissement
            </option>
            <?php
                foreach($etabs as $etab){
            ?>
            <option value="<?= $etab['id'] ?>">
                <?=$etab['nom']?>
            </option>
            
            <?php
            }
            ?>   
        </select>
        
        <div class="form-error" id="">

        </div>
        </div>
        <div class="single-input-wrapper">
                        <label for="old_promotion">A-t-il participé à une des promotions du Statut National de l'Etudiant Entrepreneur du PEESo? : </label>
                        <select name="old_promotion" id="old_promotion">
                             <option value="aucune">
                                Aucune
                             </option>
                             <option value="1ére promotion">
                                1ére Promotion
                             </option>
                             <option value="2éme Promotion">
                                2éme Promostion
                             </option>
                        </select>
                    
        </div>
        <div class="single-input-wrapper" style="display: none;">
                <label for="old_niveau"> quel niveau qui vous a été attribué? </label>
                <select name="old_niveau" id="old_niveau">
                    
                        <option value="Initiateur">
                        Initiateur
                        </option>
                        <option value="Innovateur">
                            Innovateur
                        </option>
                        <option value="Promoteur">
                        Promoteur
                        </option>
                </select>
            
        </div>
        <div class="single-input-wrapper">
            <label for="cv"></label>
            <div class="course-thumbnail-upload-area">
                    <div class="thumbnail-area" style="width:200px;height:200px">
                        <img id="user-photo" src="<?= base_url().'public/new/pdf-thumbnail.png' ?>" alt="dashboard">
                    </div>
                <div class="information">
                    <span>File Support:</span>
                    <div class="input-file-type-btn">
                        <input type="file" id="cv-file"  name="cv"  hidden />
                        <button type="button" onclick="openFileChooser('#cv-file','#cv-text')">Choisir Un Fichier</button>
                        <span id="cv-text">Aucun fichier choisit</span>
                    </div>
                </div>


            </div>
        </div>

            
            <input type="hidden" name="appel_id" id="appel_id" value="<?=$appel?>">
        <div id="add-module-messages_update"></div>
        <center> <button type="submit" class="rts-btn btn-primary">Sauvegarder</button></center>
    </form>
    </div>
    <div class="modal-footer">
    <!-- <button type="button" class="rts-btn btn-secondary" data-dismiss="modal" aria-label="Close">Fermer</button> -->
    <button type="button" style="color: white;" class="rts-btn  btn-secondary tx-11 tx-uppercase pd-y-12 pd-x-25 tx-mont tx-medium mg-b-20" data-bs-dismiss="modal" aria-label="Close">Fermer</button>
    </div>
</div>
</div>
</div>
<script>

    $(document).ready(function(){
        loadMemebers({message:""})
        $('#create-membre-button').on('click',e=>{

            $('#addMemberModal').modal('show')

        })
        $('#addProjectForm').on('submit',function(e){
            overlayOn()
            e.preventDefault()

            const url = $('#addProjectForm').attr('action')
            const formData = new FormData(this)
            fetch(`<?=base_url()?>${url}`,{
                method:'POST',
                body:formData
            }).then(d=>{
                return d.json()
            }).then(d=>{
                if(d.success){
                    Swal.fire({
                        icon: "success",
                        title: "Succés",
                        text: d.message,
                        timer: 2000
                    });
                     // Reset the form
                    $('#addProjectForm')[0].reset();
                    document.location.reload();
                }
                else{
                    Swal.fire({
                        icon: "error",
                        title: "Erreur",
                        text: d.message,
                        timer: 2000
                    });
                }
                overlayOff()
            }).catch(e=>{
                alert(e.message)
                overlayOff()
            })            


        })
        $('#addMember').on('submit',function(e){
            overlayOn()
            e.preventDefault()

            const url = $('#addMember').attr('action')
            const formData = new FormData(this)
            fetch(`<?=base_url()?>${url}`,{
                method:'POST',
                body:formData
            }).then(d=>{
                return d.json()
            }).then(d=>{
                if(d.success){
                    return loadMemebers(d)
                }
                else{
                    Swal.fire({
                        icon: "error",
                        title: "Erreur",
                        text: d.message,
                        timer: 2000
                    });
                    overlayOff()
                }
                if(d.messages){
                    Object.keys(d.messages).forEach(k=>{
                        formError(k,d.messages[k])

                    })
                    overlayOff()
                }
                
            }).then((d)=>{
                Swal.fire({
                        icon: "success",
                        title: "Succés",
                        text: d.message,
                        timer: 2000
                    });
                    overlayOff()
            }).catch(e=>{
                alert(e.message)
                overlayOff()
            })            


        })




    })
    function formError(key,message){
        const div = document.querySelector(`#${key}`).parentElement
        console.log(div)
        const errorDiv = div.querySelector('.form-error')
        errorDiv.innerHTML = message
    }

</script>
<script>
    $('.js-example-basic-multiple').select2();

</script>
<script>
        $('#old_promotion_porter').on('change',function (event){
            const val = $('#old_promotion_porter').val()
            if(val=='aucune'){
                $('#old_niveau_porter').parent().css('display','none')
            }
            else{
                $('#old_niveau_porter').parent().css('display','block')
        
            }
        })
        $('#old_promotion').on('change',function (event){
            const val = $('#old_promotion').val()
            if(val=='aucune'){
                $('#old_niveau').parent().css('display','none')
            }
            else{
                $('#old_niveau').parent().css('display','block')
        
            }
        })
        function openFileChooser(fileId,textId){
            const input = document.querySelector(fileId)
            const text = document.querySelector(textId)
            input.click()
            input.addEventListener('change',e=>{
                if (input.value) {
                    text.innerHTML = event.target.files[0].name
                } else {
                    text.innerHTML = "No file chosen, yet.";
                }
            })

        }
        function loadMemebers(data){
            return new Promise((resolve,reject)=>{
                $('#membres-content').load('<?=base_url()?>projet/getMembersHtml/<?=$appel?>',complete=>{
                    resolve(data)
                })
            })

        }
        function removeUser(id){
            overlayOn()
            return fetch('<?=base_url()?>projet/deleteCacheUser/'+id).then(d=>{
                return d.json()
            }).then(d=>{
                if(d.success){
                    return loadMemebers(d)
                }
                else{
                    Swal.fire({
                        icon: "error",
                        title: "Erreur",
                        text: d.message,
                        timer: 2000
                    });
                    overlayOff()
                }
            }).then((d)=>{

                Swal.fire({
                        icon: "success",
                        title: "Succés",
                        text: d.message,
                        timer: 2000
                    });
                    overlayOff()

            }).catch(e=>{
                alert(e.message)
                console.log(e)


            })
            
        }

</script>





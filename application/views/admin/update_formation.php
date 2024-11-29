<?php
    $formation = $info['formation'];
    $etudiantIds = $info['etudiantIds'];
   $students = $info['all_students'];
?>
<style>
      .course-thumbnail-upload-area {
        display: flex;
        align-items: center;
        gap: 30px;
    }
    .course-thumbnail-upload-area .information .input-file-type-btn {
    position: relative;
    margin-top: 10px;
    }
    .course-thumbnail-upload-area .information input {
        position: absolute;
        width: 100%;
        height: 100%;
        opacity: 0;
        left: 0;
        top: 0;
        cursor: pointer;
    }
    .course-thumbnail-upload-area .information button {
        padding: 13px 25px;
    }
</style>
 <div class="col-xl-9 col-lg-9 col-md-12">
                            <div class="dashboard__content__wraper loginarea__wraper">
                                <div class="dashboard__section__title" style="display: flex;align-items:center;justify-content:space-between;">
                                    <h4>Modifier La Formation</h4>
                                </div>
   
                                    <form method="post" id="updateFormationForm" action="<?=base_url()?>formation/updateFormation/<?=$formation['id']?>" enctype="multipart/form-data" accept-charset="utf-8">
                                            <div class="row">
                                                    <div class="col-xl-12">
                                                        <div class="login__form">
                                                            <label class="form__label">Titre</label>
                                                            <input class="common__login__input" type="text" value="<?=$formation['nom']?>" name="nom" id="nom" placeholder="Nom">

                                                        </div>
                                                    </div>  
                                                    <div class="col-xl-12">
                                                        <div class="login__form">
                                                            <label class="form__label">Date Début</label>
                                                            <input class="common__login__input" type="date" value="<?=$formation['date_debut']?>" name="date_debut" id="date_debut">

                                                        </div>
                                                    </div>  
                                                    <div class="col-xl-12">
                                                        <div class="login__form">
                                                            <label class="form__label">Date Fin</label>
                                                            <input class="common__login__input" type="date" value="<?=$formation['date_fin']?>" name="date_fin" id="date_fin">

                                                        </div>
                                                    </div>  
                                                    
                                                    <div class="col-xl-12">
                                                        <div class="login__form">
                                                            <label class="form__label">Apprenants</label>
                                                            <select class="common__login__input js-example-domaine-multiple" name="students[]" id="students" multiple="multiple">
                                                                <?php foreach($students as $value){ ?>
                                                                    <?php if(in_array($value['id'],$etudiantIds)) {?>
                                                                        <option value="<?= $value['id']?>" selected><?=$value['nom']?> <?=$value['prenom']?> </option>
                                                                        <?php
                                                                            }else{
                                                                        ?>
                                                                            <option value="<?= $value['id']?>"><?=$value['nom']?> <?=$value['prenom']?></option>
                                                                        <?php
                                                                            }
                                                                        ?>
                                                                <? }?>     
                                                            </select>
                                                        
                                                        </div>
                                                    </div>  
                                                    <div class="col-xl-12">
                                                                <label class="form__label">Thumbnail</label>
                                                                <div class="course-thumbnail-upload-area" style="margin-bottom: 10px;">
                                                                        <?php
                                                                            if(!$formation['thumbnail']){
                                                                                $photo = base_url().'public/new/img/blog/blog_8.png';
                                                                                $fileName = 'Aucun fichier choisit';
                                                                            }
                                                                            else{
                                                                                $photo = base_url().'assets/assets/images/'.$formation['thumbnail'];
                                                                                $fileName = $formation['thumbnail'];
                                                                            }
                                                                        ?>
                                                                        <div>
                                                                            <img style="height: 100px;" loading="lazy" src="<?=$photo?>" alt="" id="thumbnail_image">
                                                                        </div>
                                                                        <div class="information">
                                                                            <span style="display: block;font-weight: 700;" >Size: 700 X 430 Pixels</span>
                                                                            <span style="display: block;font-weight: 700;" >File Support: PNG, JPG, JPEG</span>
                                                                            <div class="input-file-type-btn">
                                                                                <input type="file" id="thumbnail_input" name="thumbnail" hidden accept="image/*">
                                                                                <button type="button" class="default__button" onclick="openFileChooser('#thumbnail_input','#thumbnail_image')" >Choisir Un Fichier</button>
                                                                                <span class="custom-text" style="font-weight: 700;"><?=$fileName?></span>
                                                                            </div>
                                                                        </div>


                                                                </div>

                                                        </div>
                                                        
                                                    
                                                    
                                            </div>
                                            <div class="login__button">
                                                                        <button class="default__button" style="width:100%" href="#" id="create-account-btn">Modifier</button>
                                            </div>
                                        
                                        

                                        
                                    
                                    </form> 
    </div>
</div>
<script>
    
    
    function openFileChooser(fileInputId,fileImageId){
            const fileInput =document.querySelector(fileInputId)
            fileInput.click()
            fileInput.addEventListener('change',e=>{
                const file =(fileInput.files && fileInput.files.length )?fileInput.files[0]:"Veiller Choisir Un Fichier"
                const fileNameTextElement = fileInput.parentElement.querySelector('.custom-text')
                fileNameTextElement.innerHTML = file.name
                const url =window.URL.createObjectURL(file)
                $(fileImageId).attr('src',url)
            })
    }
    window.addEventListener('load',e=>{
        $('.js-example-domaine-multiple').select2({
              placeholder: "Sélectionnez des Etudiants",
              width: '100%'
         });
         $('#updateFormationForm').on('submit',function(e){

            
            e.preventDefault()
                overlayOn()
                const action  = $('#updateFormationForm').attr('action')
                const formData = new FormData(this)
                fetch(action,{
                    body:formData,
                    method:'POST',

                }).then(d=>{
                    return d.json()
                }).then(data=>{
                    if(data.success){
                        Swal.fire({
                                icon:'success' ,
                                title: 'Succés',
                                text: data.message
                        });  
                        document.location = '<?=base_url('all_formations')?>'
                    }
                    else{
                        Swal.fire({
                                icon:'error' ,
                                title: 'Erreur',
                                text: data.message
                        });  
                    }
                    overlayOff()
                }).catch(e=>{
                    alert(e.message)
                    overlayOff()
                })
    })
    })
</script>
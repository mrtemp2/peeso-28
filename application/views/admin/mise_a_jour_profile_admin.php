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
    <div class="dashboard__content__wraper">
        <div class="dashboard__section__title">
            <h4>Mon Profil</h4>
        </div>
        <div class="row">
            <div class="col-xl-12 aos-init aos-animate" data-aos="fade-up">
                <ul class="nav  about__button__wrap dashboard__button__wrap" id="myTab"
                    role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="single__tab__link active" data-bs-toggle="tab"
                            data-bs-target="#projects__zero" type="button" aria-selected="true"
                            role="tab">Nom D'utilisateur</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="single__tab__link" data-bs-toggle="tab"
                            data-bs-target="#projects__one" type="button" aria-selected="false"
                            role="tab" tabindex="-1">Password</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="single__tab__link" data-bs-toggle="tab"
                            data-bs-target="#projects__two" type="button" aria-selected="false"
                            role="tab" tabindex="-1">Photo De Profil</button>
                    </li>
                    



                </ul>
            </div>


            <div class="tab-content tab__content__wrapper aos-init aos-animate"
                id="myTabContent" data-aos="fade-up">
                <div class="tab-pane fade active show" id="projects__zero" role="tabpanel"
                    aria-labelledby="projects__one">
                    <div class="row">
                        <div class="col-xl-12">

                            
                            <div class="row">
                                <form action="admin/updateProfile" method="post" class="top-form-create-course" id="updateProfileForm">
                                    <div class="col-xl-12">
                                        <div class="dashboard__form__wraper">
                                            <div class="dashboard__form__input">
                                                <label >Nom d'utilisateur : </label>
                                                <input  value="<?=$this->session->userdata['logged']['username']?>"  id="username" name="username" placeholder="Nom d'utilisateur">                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-12">
                                        <div class="dashboard__form__button">
                                            <a class="default__button" href="#" id="update-un-btn">Modifier Nom D'utilisateur</a>
                                        </div>
                                    </div>
                                </form>

                            </div>


                        </div>
                    </div>

                </div>

                <div class="tab-pane fade" id="projects__one" role="tabpanel"
                    aria-labelledby="projects__one">
                    <div class="row">
                        <div class="col-xl-12">

                            
                            <div class="row">
                                <form action="admin/changePassword" method="post" class="top-form-create-course" id="changePasswordForm">
                                    <div class="col-xl-12">
                                        <div class="dashboard__form__wraper">
                                            <div class="dashboard__form__input">
                                                <label >Mot De Passe Actuel </label>
                                                <input type="text" placeholder="Current password" value="<?=$this->session->userdata('logged')['password']?>"  id="old_password" name="old_password">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xl-12">
                                        <div class="dashboard__form__wraper">
                                            <div class="dashboard__form__input">
                                                <label >Nouveau Mot De Passe</label>
                                                <input type="text" placeholder="Nouveau Mot De Passe"   id="newPassword" name="newPassword">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xl-12">
                                        <div class="dashboard__form__wraper">
                                            <div class="dashboard__form__input">
                                                <label >Confirmer Nouveau Mot De Passe</label>
                                                <input type="text" id="confirmPassword" name="confirmPassword" placeholder="Confirmer Nouveau Mot De Passe">
                                            </div>
                                        </div>
                                    </div>
                                    <input type="hidden" id="id" name="id" value="<?= $this->session->userdata('logged')['id']?>">
                                    <div class="col-xl-12">
                                        <div class="dashboard__form__button">
                                            <a class="default__button" href="#" id="update-mdp-btn">Modifier Mot De Passe</a>
                                        </div>
                                    </div>
                                </form>

                            </div>


                        </div>
                    </div>

                </div>

                <div class="tab-pane fade" id="projects__two" role="tabpanel"
                    aria-labelledby="projects__two">

                    <div class="row">
                        <form action="auth/changePhoto" method="post" id="changePhotoForm" enctype="multipart/form-data">
                            <div class="course-thumbnail-upload-area" style="margin-bottom: 10px;">
                                <?php
                                                        $photo = base_url().'public/new/img/dashbord/dashbord__2.jpg';
                                                        if($this->session->userdata('logged')['photo']){
                                                            $photo = base_url().'assets/assets/images/'.$this->session->userdata('logged')['photo'];
                                                        }
                                                        
                                ?>
                                <div class="dashboardarea__left__img">
                                    <img loading="lazy" src="<?=$photo?>" alt="" id="real-img">
                                </div>
                                <div class="information">
                                    <span style="display: block;font-weight: 700;" >Size: 700 X 430 Pixels</span>
                                    <span style="display: block;font-weight: 700;" >File Support: PNG, JPG, JPEG</span>
                                    <div class="input-file-type-btn">
                                        <input type="file" id="real-file" name="photo" hidden accept="image/*">
                                        <button type="button" class="default__button" onclick="openFileChooser('#real-file','#real-img')" >Choisir Un Fichier</button>
                                        <span class="custom-text" style="font-weight: 700;">Aucun fichier choisit</span>
                                    </div>
                                </div>


                            </div>
                            <div class="col-xl-12">
                                <div class="dashboard__form__button">
                                    <a class="default__button" href="#" id="update-photo-btn">Changer Photo De Profile</a>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>

                
            </div>
        </div>
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
    const updateProfileForm =document.querySelector('#updateProfileForm')
    const updatePhotoForm = document.querySelector('#changePhotoForm')
    const updatePasswordForm = document.querySelector('#changePasswordForm')
          document.querySelector('#update-un-btn').addEventListener('click',e=>{
                overlayOn()
                e.preventDefault()  
                                  
                const formData = new FormData(updateProfileForm)
                    const action = updateProfileForm.getAttribute('action')
                    fetch(action,{
                        method:'POST',
                        body:formData
                    }).then(data=>{
                        return data.json()
                    }).then(data=>{
                        if(data.success){
                            Swal.fire({
                                icon: 'success',
                                title: 'Succés',
                                text: data.message
                            });
                            document.location.reload()
                        }
                        else{
                            Swal.fire({
                                icon: 'error',
                                title: 'Erreur',
                                text: data.message
                            });
                        }
                        overlayOff()
                    }).catch(e=>{
                        overlayOff()
                    })


            })    
          document.querySelector('#update-photo-btn').addEventListener('click',e=>{
                overlayOn()
                e.preventDefault()  
                                  
                const formData = new FormData(updatePhotoForm)
                    const action = updatePhotoForm.getAttribute('action')
                    fetch(action,{
                        method:'POST',
                        body:formData
                    }).then(data=>{
                        return data.json()
                    }).then(data=>{
                        if(data.success){
                            Swal.fire({
                                icon: 'success',
                                title: 'Succés',
                                text: data.message
                            });
                            document.location.reload()
                        }
                        else{
                            Swal.fire({
                                icon: 'error',
                                title: 'Erreur',
                                text: data.message
                            });
                        }
                        overlayOff()
                    }).catch(e=>{
                        overlayOff()
                    })


            })
            document.querySelector('#update-mdp-btn').addEventListener('click',e=>{
                overlayOn()
                e.preventDefault()  
                                  
                const formData = new FormData(updatePasswordForm)
                    const action = updatePasswordForm.getAttribute('action')
                    fetch(action,{
                        method:'POST',
                        body:formData
                    }).then(data=>{
                        return data.json()
                    }).then(data=>{
                        if(data.success){
                            Swal.fire({
                                icon: 'success',
                                title: 'Succés',
                                text: data.message
                            });
                            document.location.reload()
                        }
                        else{
                            Swal.fire({
                                icon: 'error',
                                title: 'Erreur',
                                text: data.message
                            });
                        }
                        overlayOff()
                    }).catch(e=>{
                        overlayOff()
                    })


            })
    


</script>
 
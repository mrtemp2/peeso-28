

<?php
    $formation = $info['formation'];
    $referent = $info['referent'];
    $domaines = $info['domaines'];
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
                            <div class="dashboard__content__wraper">
                                        <div style="display: flex;align-items: center; justify-content:space-between;width: 100%;">
                                            <h4><?=$formation['nom']?></h4> 
                                            <div class="google-apple-wrapper" style="margin-top: 0px;">
                                                     <a href="<?=base_url('auth/google_login')?>" class="google">
                                                            <img src="<?=base_url('public/new/img/google_link.png')?>" alt="contact">
                                                        </a>  
                                            </div>
                                        </div>    
                                    <div class="blogarea__2 sp_top_100 sp_bottom_100">
                                            <div class="container">
                                                <div class="row">

                                                    <div class="col-xl-12 col-lg-12">

                                                        
                                                        <div class="blog__details__content__wraper">
                                                            <div class="course__button__wraper" data-aos="fade-up">
                                                                <div class="course__button" style="display: flex;align-items:center;flex:wrap:wrap;">
                                                                    <?php
                                                                     foreach($domaines as $d){
                                                                    ?>
                                                                    <span class="domain_item_large" style="background-color:<?=$d['color']?> !important;border-color:<?=$d['color']?> !important"><?=$d['nom']?></span>
                                                                    <?php
                                                                     }
                                                                    ?>
                                                                    
                                                                </div>
                                                                <div class="course__date" style="gap: 10px;align-items: center;display: flex;">
                                                                        <p>Formateur:</p>
                                                                    <div class="formateur_item">
                                                                            <?=$referent['nom']?>  <?=$referent['prenom']?>

                                                                        </div>
                                                                </div> 
                                                                
                                                            </div>
                                                            <div class="course__details__heading" data-aos="fade-up">
                                                                <h3><?= $formation['nom'] ?></h3>
                                                            </div>
                                                            <div>
                                                                <div class="detail-item">
                                                                    <div class="block-item" onclick="getElementDetails('#seance-content')">
                                                                        <div class="block-item-title"> 
                                                                            <div class="block-item-image" style="background-image: url('<?=base_url('public/new/img/icon/seance.png')?>');">

                                                                            </div> 
                                                                            <div>
                                                                                Séances
                                                                            </div>   
                                                                        </div>
                                                                        <div>
                                                                        <i class="icofont-rounded-down"></i>
                                                                        </div>
                                                                    </div>
                                                                    <div data-callback="getDetailsSeance" class="block-item-content collapse" id="seance-content">
                                                                     </div>   
                                                                </div> 
                                                                <div class="detail-item">
                                                                    <div class="block-item" onclick="getElementDetails('#member-content')">
                                                                        <div class="block-item-title"> 
                                                                            <div class="block-item-image" style="background-image: url('<?=base_url('public/new/img/icon/seance.png')?>');">

                                                                            </div> 
                                                                            <div>
                                                                                Membres
                                                                            </div>   
                                                                        </div>
                                                                        <div>
                                                                        <i class="icofont-rounded-down"></i>
                                                                        </div>
                                                                    </div>
                                                                    <div data-callback="getDetailsMembers" class="block-item-content collapse" id="member-content">
                                                                     </div>   
                                                                </div> 
                                                               
                                                                        
                                                            </div>
                                                            

                                                                        
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                    </div>
                               </div>     
                               
</div>        
<div id="createRandezVousModal" class="modal fade">
      <div class="modal-dialog modal-lg" id="createRandezVousContent" role="document">
      </div>
</div>
<div id="createSeanceModal" class="modal fade">
      <div class="modal-dialog modal-lg"  role="document">
      <div class="modal-content bd-0 tx-14 loginarea__wraper" style="border:none !important;">
        
        <div class="modal-header login__heading" style="display: fi;">
                            <h5 class="login__title">Ajouter Formation</h5>
                            <button></button>
        </div>
      
        <form method="post" id="createFormationForm" action="<?=base_url()?>seance/createSeance" enctype="multipart/form-data" accept-charset="utf-8">
                    <div class="row">               
                                        <div class="col-xl-12">
                                            <div class="login__form">
                                                <label class="form__label">Nom De La Seance</label>
                                                <input class="common__login__input" type="text"  name="nom" id="nom_seance_1" placeholder="Nom">

                                            </div>
                                        </div>  
                                        <div class="col-xl-4">
                                            <div class="login__form">
                                                <label class="form__label">Date Début</label>
                                                <input class="common__login__input" type="datetime-local"  name="date_debut" id="date_debut_seance" placeholder="Date Début">

                                            </div>
                                        </div>  
                                        <div class="col-xl-4">
                                            <div class="login__form">
                                                <label class="form__label">Date Fin</label>
                                                <input class="common__login__input" type="datetime-local"  name="date_fin" id="date_fin_seance" placeholder="Date Fin">

                                            </div>
                                        </div> 
                                        <div class="login__button">
                                           <button class="default__button" data-step="1"  >Ajouter</button>
                                           </div>
                    </div>

            </form>    
   </div>         

      </div>
</div>
<div id="createModuleModal" class="modal fade">
      <div class="modal-dialog modal-lg"  role="document">
                           
        <div class="modal-content bd-0 tx-14 loginarea__wraper" style="border:none !important;">
                
                <div class="modal-header login__heading">
                                    <h5 class="login__title">Ajouter Le Module</h5>
                </div>
            
                <form method="post" id="ajouterModule" action="<?=base_url()?>module/createModule" enctype="multipart/form-data" accept-charset="utf-8">
                    <div class="row">
                        
                            
                            
                            <div class="col-xl-12">
                                <div class="login__form">
                                    <label class="form__label">Titre</label>
                                    <input class="common__login__input" name="titre" id="titre_module">
                                    
                                
                                </div>
                            </div>
                            <div class="col-xl-12">
                            <?php
                                                                        $filename = "Aucun fichier choisit";
                                                                    
                                                                    ?>
                                                    
                                        <label class="form__label">Ajouter Un Document (Optionnel)</label>
                                        <div class="course-thumbnail-upload-area" style="margin-bottom: 10px;">
                                                <?php
                                                                        $photo = base_url().'public/new/img/thumbnails/document-thumbnail.png';
                                                                        
                                                                        
                                                ?>
                                                <div>
                                                    <img style="height: 100px;" loading="lazy" src="<?=$photo?>" alt="" id="real-img">
                                                </div>
                                                <div class="information">
                                                    <span style="display: block;font-weight: 700;" >File Support: PDF, Doc, Docx</span>
                                                    <div class="input-file-type-btn">
                                                
                                                        <input type="file" id="update_module" name="document" hidden  accept=".doc,.docx,.pdf">
                                                        <button type="button" class="default__button" onclick="openFileChooser('#update_module')" >Choisir Un Fichier</button>
                                                        <span class="custom-text" style="font-weight: 700;">
                                                                <?=$filename?>
                                                        </span>
                                                    </div>
                                                </div>


                                        </div>

                            </div>  
                            
                            
                            
                    </div>
                    <div class="login__button">
                                                <button class="default__button">Ajouter</button>
                    </div>
                
                

                
            
            </form> 

            
            



            <div class="modal-footer">
                <!-- <button type="button" class="close rts-btn btn-secondary" style="color:#fff;" data-dismiss="modal" aria-label="Close">Fermer</button> -->
                <button type="button"  class="rts-btn  btn-secondary" data-bs-dismiss="modal" aria-label="Close">Fermer</button>
            </div>
            </div>
        </div>
</div>     
<div id="createActivityModal" class="modal fade">
      <div class="modal-dialog modal-lg"  role="document">

    <div class="modal-content bd-0 tx-14 loginarea__wraper" style="border:none !important;">
            
            <div class="modal-header login__heading">
                                <h5 class="login__title">Ajouter une activité</h5>
            </div>
        
            <form method="post" id="ajouterActivity" action="<?=base_url()?>activity/createActivity" enctype="multipart/form-data" accept-charset="utf-8">
                <div class="row">
                    
                        
                        
                        <div class="col-xl-12">
                            <div class="login__form">
                                <label class="form__label">Titre</label>
                                <input class="common__login__input" name="titre" id="update_titre">
                                
                            
                            </div>
                        </div>
                        <div class="col-xl-12">
                            <div class="login__form">
                                <label class="form__label">Instructions</label>
                                <textarea name="instructions" class="common__login__input" id="update_instructions">

                                   

                                </textarea>
                                
                            
                            </div>
                        </div>
                        <div class="col-xl-12">
                                        <?php
                                                                    $filename = "Aucun fichier choisit";
                                                                ?>
                                                
                                    <label class="form__label">Ajouter Un Document (Optionnel)</label>
                                    <div class="course-thumbnail-upload-area" style="margin-bottom: 10px;">
                                            <?php
                                                                    $photo = base_url().'public/new/img/thumbnails/document-thumbnail.png';
                                                                    
                                                                    
                                            ?>
                                            <div>
                                                <img style="height: 100px;" loading="lazy" src="<?=$photo?>" alt="" id="real-img">
                                            </div>
                                            <div class="information">
                                                <span style="display: block;font-weight: 700;" >File Support: PDF, Doc, Docx</span>
                                                <div class="input-file-type-btn">
                                            
                                                    <input type="file" id="update_activity_file"  name="document" hidden  accept=".doc,.docx,.pdf">
                                                    <button type="button" class="default__button" onclick="openFileChooser('#update_activity_file')" >Choisir Un Fichier</button>
                                                    <span class="custom-text" style="font-weight: 700;">
                                                            <?=$filename?>
                                                    </span>
                                                </div>
                                            </div>


                                    </div>

                        </div>  
                        
                        
                        
                </div>
                <div class="login__button">
                                            <button class="default__button">Modifier</button>
                </div>
            
            

            
        
        </form> 

        
        



        <div class="modal-footer">
            <!-- <button type="button" class="close rts-btn btn-secondary" style="color:#fff;" data-dismiss="modal" aria-label="Close">Fermer</button> -->
            <button type="button"  class="rts-btn  btn-secondary" data-bs-dismiss="modal" aria-label="Close">Fermer</button>
        </div>
        </div>
    </div>
</div>

                       
<script>
    var callbacks = {
        getDetailsMembers:(targetId)=>{
            return new Promise((resolve,reject)=>{
                $(targetId).load('<?=base_url('formation/getMembers/'.$formation['id'])?>',(complete)=>{
                    resolve()
                })
            })

        },
        getDetailsActivity:(targetId)=>{
            const seanceId = $(targetId).data('seance')
            return new Promise((resolve,reject)=>{
                $(targetId).load('<?=base_url('activity/getDetailsActivity')?>/'+seanceId,(complete)=>{
                    resolve()
                })
            })

        },
        getSingleActivity:(targetId)=>{
            const activityId = $(targetId).data('activity')
            return new Promise((resolve,reject)=>{
                $(targetId).load('<?=base_url('activity/getSingleActivityReferent')?>/'+activityId,(complete)=>{
                    resolve()
                })
            })

        },
        getDetailsModule:(targetId)=>{
            const seanceId = $(targetId).data('seance')
            return new Promise((resolve,reject)=>{
                $(targetId).load('<?=base_url('module/getDetailsModule')?>/'+seanceId,(complete)=>{
                    resolve()
                })
            })

        },
        getDetailsSeance:(targetId)=>{
            return new Promise((resolve,reject)=>{
                $(targetId).load('<?=base_url('seance/getDetailsSeance/'.$formation['id'])?>',(complete)=>{
                    resolve()
                })
            })
        },
        getSingleSeance:(targetId)=>{
            return new Promise((resolve,reject)=>{
                const seanceId = $(targetId).data('seance')
                $(targetId).load(`<?=base_url('seance/getSingleSeance')?>/${seanceId}`,(complete)=>{
                    resolve()
                })
            })

        }

    }
    
        function getElementDetails(targetId){
            const functionName =  $(targetId).data('callback')
            if(functionName){
                const callback =   callbacks[functionName]
                overlayOn()    
                callback(targetId).then(d=>{
                    overlayOff()
                    $(targetId).collapse('toggle')
                })
            }
            else{
                $(targetId).collapse('toggle')
            }
            
        }
        
        function reloadSeance(seanceId){
            overlayOn()
            const targetId = `details-seances-${seanceId}`
            $(targetId).load(`<?=base_url('seance/getSingleSeance')?>/${seanceId}/<?=$_GET['progression_id']?>`,(complete)=>{
                    overlayOff()    
              
            })

        }
        function startSeance(seanceId){
                overlayOn()
                fetch(`<?=base_url('seance/startSeance')?>/${seanceId}/<?=$_GET['progression_id']?>`).then(data=>{
                    return data.json()
                }).then(data=>{
                    if(data.success){
                        Swal.fire({
                                icon:'success' ,
                                title: 'Succés',
                                text: data.message
                        }); 
                       document.location.reload()
                    }
                    else{
                        Swal.fire({
                                icon:'error' ,
                                title: 'Erreur',
                                text: data.message
                        });  
                        overlayOff()
                    }
                }).catch(e=>{

                    alert('une erreur s\'est produite')
                    overlayOff()
                })


        }
        function planifierSeance(groupe_seance_id){
            overlayOn()
            $('#createRandezVousContent').load('<?=base_url()?>randezvous/prepareRandezVousForm/'+groupe_seance_id,(complete)=>{
            
                setTimeout(()=>{
                    
                    $('#createRandezVousModal').modal('show')
                    overlayOff()

                    $('#createRandezVousForm').unbind('submit').on('submit',function(e){
                        e.preventDefault()
                        overlayOn()
                        const action  = $('#createRandezVousForm').attr('action')
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
                                document.location.reload()
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
                },1000)
            })
            

        }
        function reloadMembers(){
            $('#member-content').load('<?=base_url('formation/getMembers/'.$formation['id'])?>',(complete)=>{
                    overlayOff()
            })


        }
        function eliminateStudent(etudiantId){
            overlayOn()
            fetch(`<?=base_url()?>formation/eliminateMember/<?=$formation['id']?>/${etudiantId}`).then(data=>{
                return data.json()
            }).then(data=>{ 
                if(data.success){
                                Swal.fire({
                                        icon:'success' ,
                                        title: 'Succés',
                                        text: data.message
                                });  
                                    reloadMembers()
                            }
                            else{
                                Swal.fire({
                                        icon:'error' ,
                                        title: 'Erreur',
                                        text: data.message
                                });  
                                overlayOff()
                            }
                           
            }).catch(e=>{
                alert('une erreur s\'était produite')
                overlayOff()
            })


            
        }
        function reloadSeances(){
           
            $('#seance-content').load('<?=base_url('seance/getDetailsSeance/'.$formation['id'])?>',(complete)=>{
                    overlayOff()
           })


        }
        function reloadModules(seanceId){
            
            $(`#module-content-${seanceId}`).load(`<?=base_url('module/getDetailsModule')?>/${seanceId}`,(complete)=>{
                    overlayOff()
           })

        }
        function reloadActivities(seanceId){
          
            $(`#activity-content-${seanceId}`).load('<?=base_url('activity/getDetailsActivity')?>/'+seanceId,(complete)=>{
                    overlayOff()
            })

        }
        function ajouterModule(seance_id){
                $('#createModuleModal').modal('show')
               $('#ajouterModule').unbind('submit').on('submit',function(e){
                    e.preventDefault()
                    overlayOn()
                    const action = $('#ajouterModule').attr('action')
                    const formData = new FormData(this)
                       formData.append('seance_id',seance_id) 
                    fetch(action,{
                        body:formData,
                        method:'POST'
                    }).then(data=>{
                        return data.json()
                    }).then(data=>{
                        if(data.success){
                                Swal.fire({
                                        icon:'success' ,
                                        title: 'Succés',
                                        text: data.message
                                });  
                                    reloadModules(seance_id)
                            }
                            else{
                                Swal.fire({
                                        icon:'error' ,
                                        title: 'Erreur',
                                        text: data.message
                                });  
                                overlayOff()
                            }
                           
                            }).catch(e=>{
                                alert('une erreur s\'était produite')
                                overlayOff()
                            })




               })     

        }
        function ajouterActivity(seance_id){
                $('#createActivityModal').modal('show')
               $('#ajouterActivity').unbind('submit').on('submit',function(e){
                    e.preventDefault()
                    overlayOn()
                    const action = $('#ajouterActivity').attr('action')
                    const formData = new FormData(this)
                       formData.append('seance_id',seance_id) 
                    fetch(action,{
                        body:formData,
                        method:'POST'
                    }).then(data=>{
                        return data.json()
                    }).then(data=>{
                        if(data.success){
                                Swal.fire({
                                        icon:'success' ,
                                        title: 'Succés',
                                        text: data.message
                                });  
                                    reloadActivities(seance_id)
                            }
                            else{
                                Swal.fire({
                                        icon:'error' ,
                                        title: 'Erreur',
                                        text: data.message
                                });  
                                overlayOff()
                            }
                           
                            }).catch(e=>{
                                alert('une erreur s\'était produite')
                                overlayOff()
                            })




               })     

        }
        function ajouterSeance(){
                $('#createSeanceModal').modal('show')
               $('#createFormationForm').unbind('submit').on('submit',function(e){
                    e.preventDefault()
                    overlayOn()
                    const action = $('#createFormationForm').attr('action')
                    const formData = new FormData(this)
                       formData.append('formation_id','<?=$formation['id']?>') 
                    fetch(action,{
                        body:formData,
                        method:'POST'
                    }).then(data=>{
                        return data.json()
                    }).then(data=>{
                        if(data.success){
                                Swal.fire({
                                        icon:'success' ,
                                        title: 'Succés',
                                        text: data.message
                                });  
                                    reloadSeances()
                            }
                            else{
                                Swal.fire({
                                        icon:'error' ,
                                        title: 'Erreur',
                                        text: data.message
                                });  
                                overlayOff()
                            }
                           
                            }).catch(e=>{
                                alert('une erreur s\'était produite')
                                overlayOff()
                            })




               })     

        }
        function openFileChooser(fileInputId,fileImageId){
            const fileInput =document.querySelector(fileInputId)
            fileInput.click()
            fileInput.addEventListener('change',e=>{
                const file =(fileInput.files && fileInput.files.length )?fileInput.files[0]:"Veiller Choisir Un Fichier"
                const fileNameTextElement = fileInput.parentElement.querySelector('.custom-text')
                fileNameTextElement.innerHTML = file.name
                if(fileImageId){
                    const url =window.URL.createObjectURL(file)
                    $(fileImageId).attr('src',url)
                }
            })
      }

</script>
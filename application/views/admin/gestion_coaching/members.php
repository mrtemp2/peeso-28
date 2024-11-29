<style>
        .progress-item{
        height: 55px;
        border-radius: 6px;
        padding: 10px;
        border: 1px solid var(--whitegrey3);
        gap: 15px;
        display: flex;
        align-items: center;
    }
    .users-profile-pict{
        justify-content: center;
        align-items: center;
        display: flex;
        position: relative;
        width: 15%;
    }
    .progress-item .single-profile-pict {
        position: absolute;
        border-color: var(--primaryColor);
        height: 40px;
        width: 40px;
        background-size: cover;
        border-radius: 50%;
        border: 3px solid var(--primaryColor);
        background-size: cover;
    }
    .progress-info {
        line-height: 180%;
        width: 85%;
    }
    .progress-info .usernames {
        display: flex;
        justify-content: space-between;
        align-items: center;
        font-size: 0.75rem;
        font-weight: 700;
    }
    


</style>
<?php
$etudiants = $info['etudiants'];
    foreach($etudiants as $e){
?>
    <div class="progress-item">
                                         
                                        <div class="users-profile-pict" style="width: 15% !important;">
                                            <?php
                                                $photo = base_url('assets/assets/images/'.$e['profile_picture']);
                                            
                                            ?>
                                            <div class="single-profile-pict" style="
                                                right: 0%;
                                                background-image: url('<?=$photo?>');
                                            ">
                                                
                                            </div>
        
 
                                        </div>    
                                         <div  class="progress-info">
                                                <div class="usernames">
                                                        <div>
                                                            <?=$e['nom']?> <?=$e['prenom']?>
                                                        </div>
                                                        <button onclick="eliminateStudent('<?=$e['id']?>')" class="action-button" style="background-color: #dc3545;">
                                                        <i class="icofont-trash"></i>     
                                                        </button>
                                                 </div>
                                                
                                         </div>


            </div>

<?php
    }

?>
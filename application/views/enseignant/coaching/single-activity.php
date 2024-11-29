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
        line-height: 100%;
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
    
    $student_activities = $info['student_activities'];
?>
<?php
    foreach($student_activities as $s){
        $photo= base_url('assets/assets/images/'.$s['profile_picture']);

  ?>   
  <div class="progress-item">
                                         
                    <div class="users-profile-pict" style="width: 8% !important;">
                        <div class="single-profile-pict" style="right: 0%;background-image: url('<?=$photo?>');">
                            
                        </div>
                    
                    
                    </div>    
                    <div class="progress-info">
                            <div class="usernames">
                                    <div>
                                        <?=$s['nom']?> <?=$s['prenom']?>
                                    </div>
                                    <a download="<?=$s['document']?>" href="<?=base_url('assets/assets/images/'.$s['document'])?>" class="domaine_item" style="
                                            /* margin-bottom: 10px; */
                                            background-color: var(--greencolor2);
                                        ">
                                    télécharger 
                                    </a>
                            </div>
                            <div style="font-size: 0.75rem;font-weight:700">
                                Derniére Modification  <?=$s['date_remis']?>
                            </div>
                    </div>
                                                                   
                                                                   
 </div>
  
  <?php  }

?>


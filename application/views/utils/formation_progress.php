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
     function upperCaseName($name){
        $separator = explode(" ",$name);
        $firstname = $separator[0];
        $lastname = $separator[1];
        return ucfirst($firstname)." ".ucfirst($lastname);
    }
    function getEtudiantNames($names){
        $array_names = explode(",",$names);
        if(count($array_names)>3){
            $autres = count($array_names)-2;
            return implode(",",array_map('upperCaseName',array_splice($array_names,2))).' et '.$autres.' Autres';
        }
        else{
            return implode(",",array_map('upperCaseName',$array_names)); 
        }
    }
    function getImageFullUrl($photo){
        return base_url('assets/assets/images/'.trim($photo));
    }
    function getEtudiantPhotos($photos){
        $array_photos = explode(",",$photos);
        if(count($array_photos)>3){
            return array_map('getImageFullUrl',array_splice($array_photos,3));
        }
        else{
            return array_map('getImageFullUrl',$array_photos); 
        }
    }   
    function getWidthProfilePicture($p){
        if(count(getEtudiantPhotos($p['etudiants_photos']))>2){
            return '15%';
        }
        else{
            return '10%';
        }

    }
    $progressions = $info['progressions'];
 
?>
<?php
    foreach($progressions as $p){
?>
    <div class="progress-item">
                                         
   <div class="users-profile-pict" style="width: <?=getWidthProfilePicture($p)?> !important;">
    <?php
        $photos = getEtudiantPhotos($p['etudiants_photos']);
        $widthOffset = 20;
        
        for($i=0;$i<count($photos) ;$i++){
       
    ?>
    <div class="single-profile-pict" style="
         right: <?=((count($photos)-($i+1))*$widthOffset)?>%;
          background-image: url('<?=$photos[$i]?>');
    ">
        
    </div>
    
    <?php
        }
    ?>

                                         </div>    
                                         <div class="progress-info">
                                                <div class="usernames">
                                                        <div>
                                                            <?=$p['etudiant_names']?>
                                                        </div>
                                                        <a href="<?=base_url('group_parcours')?>?progression_id=<?=$p['progression_id']?>" class="domaine_item" style="
                                                                /* margin-bottom: 10px; */
                                                                background-color: var(--greencolor2);
                                                            ">
                                                        details     
                                                        </a>
                                                 </div>
                                                <div class="progress">

                                                </div>
                                         </div>


                                    </div>

<?php
    }

?>
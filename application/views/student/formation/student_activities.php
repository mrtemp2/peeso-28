<?php

$activities = $info['activities'];
$activities_status = $info['activity_status'];
?>
<?php
   
    foreach($activities as $a){
       
     $done = false;
     if(isset($activities_status[$a['id']]) && $activities_status[$a['id']] ){
        $done = true;
        
     }
     
        
?>
<div class="detail-item">
    <div class="block-item" >
        <div class="block-item-title"> 
            <div class="block-item-image" style="background-image: url('<?=base_url('public/new/img/icon/seance.png')?>');">

            </div> 
            <div class="detail-titre-item">
                    Activité  : <?=$a['titre']?>
            </div>   
        </div>
        <?php
           if($done == true) {
        ?>
          <div>
             <a  href="<?=base_url('details_exercices')?>?activity_id=<?=$a['id']?>" class=""> Modifier</span></a>
         </div>
        <?php
           }else{
        ?>
        <div>
             <a  href="<?=base_url('details_exercices')?>?activity_id=<?=$a['id']?>" class="question"> Faire L'Exercice</span></a>
         </div>
        <?php
           }
        ?>
    </div>
       
</div> 
<?php
}
?>
<?php

$activities = $info['activities'];
$seance = $info['seance'];
?>
<div class="scc__wrap">
        <div class="scc__info">
           
            <h5> <span style="font-weight: 700;">Activités :</span></h5>
        </div>
        <div class="scc__meta">
            <button onclick="ajouterActivity(<?=$seance['id']?>)" class="question"> Ajouter Activité</span></button>
        </div>
</div>
<?php
    foreach($activities as $a){

?>
<div class="detail-item">
    <div class="block-item" onclick="getElementDetails('#details-activities-<?=$a['id']?>')">
        <div class="block-item-title"> 
            <div class="block-item-image" style="background-image: url('<?=base_url('public/new/img/icon/activity.png')?>');">

            </div> 
            <div>
                Activity  : <?=$a['titre']?>
            </div>   
        </div>
        <div>
        <i class="icofont-rounded-down"></i>
        </div>
    </div>
    <div data-callback="getSingleActivity" data-activity="<?=$a['id']?>" class="block-item-content collapse" id="details-activities-<?=$a['id']?>">
    </div>   
</div> 
<?php
}
?>
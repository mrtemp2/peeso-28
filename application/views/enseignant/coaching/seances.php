<div class="scc__wrap">
        <div class="scc__info">
           
            <h5> <span style="font-weight: 700;"> Seances :</span></h5>
        </div>
        <div class="scc__meta">
            <button onclick="ajouterSeance()" class="question"> Ajouter Séance</span></button>
        </div>
    </div>

<?php

$seances = $info['seances'];
?>
<?php
    foreach($seances as $s){

?>
<div class="detail-item">
    
    <div class="block-item" onclick="getElementDetails('#details-seances-<?=$s['id']?>')">
        <div class="block-item-title"> 
            <div class="block-item-image" style="background-image: url('<?=base_url('public/new/img/icon/seance.png')?>');">

            </div> 
            
            <div>

                <div>Seance <?=$s['ordre']?> : <?=$s['nom']?></div>
                <div>
                    <i class="icofont-clock-time"></i>  <?=$s['formatted_date_debut']?>
                                                                    
                </div>
            </div>   
        </div>
        <div>
        <i class="icofont-rounded-down"></i>
        </div>
    </div>
    <div data-callback="getSingleSeance" data-seance="<?=$s['id']?>" class="block-item-content collapse" id="details-seances-<?=$s['id']?>">
    </div>   
</div> 
<?php
}
?>
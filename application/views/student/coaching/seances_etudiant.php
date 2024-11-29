<?php

$seances = $info['seances'];

?>
<?php
    $today = date('Y-m-d');
    
    foreach($seances as $s){
     
        $disabled = true;
      
        if($today>$s['date_debut_day']){
                $disabled = false;       

        }
        
?>
<div class="detail-item <?php if($disabled){ ?> details-disabled <?php } ?>">
    <div class="block-item" <?php if(!$disabled){ ?> onclick="getElementDetails('#details-seances-<?=$s['id']?>')" <?php } ?> >
        <div class="block-item-title"> 
            <div class="block-item-image" style="background-image: url('<?=base_url('public/new/img/icon/seance.png')?>');">

            </div> 
            <div class="detail-titre-item">
                <div>Seance <?=$s['ordre']?> : <?=$s['nom']?></div>
                <div>
                    <i class="icofont-clock-time"></i>  <?=$s['formatted_date_debut']?>
                                                                    
                </div>
            </div>   
        </div>

        <div class="detail-accordion-item">
                 
            <i class="icofont-rounded-down"></i>
        </div>
    </div>
    <div data-callback="getSingleSeance" data-seance="<?=$s['id']?>" class="block-item-content collapse" id="details-seances-<?=$s['id']?>">
    </div>   
</div> 
<?php
}
?>
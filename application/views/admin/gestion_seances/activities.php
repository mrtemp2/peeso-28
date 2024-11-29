
<?php
    $activities = $info['activities'];

?>
<div class="scc__wrap">
    <div class="scc__info">
         <h5> <span>Activités </span></h5>
        
       
    </div>
    <div class="scc__meta">
        
        <span onclick="ajouterActivity()" class="question"><i class="icofont-ui-add"></i> Ajouter</span>
    </div>
    
</div>

<?php
foreach ($activities as $a) {
?>

<div class="accordion-body-item">
    <div class="scc__info">
    <h5> 
        <span style="font-weight: 700;"><?=$a['titre']?></span></h5>
        
       
    </div>
    
    <div class="scc__meta">
        
        <span  onclick="updateActivity('<?=$a['id']?>')" class="question action"><i class="icofont-ui-edit"></i> Modifier</span>
        <?php
            if($a['document']){
          ?>
          <a href="<?=base_url('assets/assets/images/'.$a['document'])?>" download="<?=$a['document']?>"  class="question action"><i class="icofont-ui-download"></i> Télecharger</a>
          <?php      
            }
        ?>
    </div>
</div>
<?php
}
?>


                 
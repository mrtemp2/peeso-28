
<?php
    $modules = $info['modules'];

?>
<div class="scc__wrap">
    <div class="scc__info">
         <h5> <span>Modules </span></h5>
        
       
    </div>
    <div class="scc__meta">
        
        <span onclick="ajouterModule()" class="question"><i class="icofont-ui-add"></i> Ajouter</span>
    </div>
    
</div>

<?php
foreach ($modules as $m) {
?>

<div class="accordion-body-item">
    <div class="scc__info">
    <h5> 
        <span style="font-weight: 700;"><?=$m['titre']?></span></h5>
        
       
    </div>
    
    <div class="scc__meta">
        
        <span  onclick="updateModule('<?=$m['id']?>')" class="question action"><i class="icofont-ui-edit"></i> Modifier</span>
        <?php
            if($m['document']){
          ?>
          <a href="<?=base_url('assets/assets/images/'.$m['document'])?>" download="<?=$m['document']?>"  class="question action"><i class="icofont-ui-download"></i> Télecharger</a>
          <?php      
            }
        ?>
    </div>
</div>
<?php
}
?>


                 

<?php
    $seances = $info['seances'];

?>
<div class="scc__wrap">
    <div class="scc__info">
         <h5> <span>Séances </span></h5>
        
       
    </div>
    <div class="scc__meta">
        
        <span onclick="ajouterSeance()" class="question"><i class="icofont-ui-add"></i> Ajouter</span>
    </div>
    
</div>

<?php
foreach ($seances as $s) {
?>

<div class="accordion-body-item">
    <div class="scc__info">
    <h5> 
        <span style="font-weight: 700;">Séance <?=$s['ordre']?>: <?=$s['nom']?></span></h5>
        
       
    </div>
    
    <div class="scc__meta action">
        
        <span onclick="updateSeance('<?=$s['id']?>')" class="question"><i class="icofont-ui-edit"></i> Modifier</span>
    </div>
</div>
<?php
}
?>


                 
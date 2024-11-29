
<?php
    $modules = $info['modules'];
    $seance = $info['seance'];

?>
<div class="scc__wrap">
        <div class="scc__info">
           
            <h5> <span style="font-weight: 700;"> Modules :</span></h5>
        </div>
        <div class="scc__meta">
            <button onclick="ajouterModule(<?=$seance['id']?>)" class="question"> Ajouter Module</span></button>
        </div>
</div>
<?php
    foreach($modules as $m){

?>
 <div>
                                            <div class="activity-title">
                                                <?=$m['titre']?>
                                            </div>  
                                            <div class="activity-file">
                                                <img style="max-width: 100%;" src="<?=base_url('public/new/img/thumbnails/document-thumbnail.png')?>" alt="">
                                                <div class="activity-file-action">
                                                        <a download="<?=$m['document']?>" href="<?=base_url('assets/assets/images/'.$m['document'])?>" style="font-size: 1rem;color: var(--greencolor2);">
                                                            <i class="icofont-download"></i>
                                                        </a>
                                                </div>
                                            </div>
                                        </div>
<?php

    }
?>
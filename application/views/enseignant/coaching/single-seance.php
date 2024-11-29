<?php
    $seance = $info['seance'];
    $randezVous = $info['randezVous'];
?>
    
    <div class="scc__wrap">
        <div class="scc__info">
           
            <h5> <span> Parcours :</span></h5>
        </div>
        <div class="scc__meta">
                <?php
                    if(!$seance['ended']){
                        
                ?>
                    <?php
                        if($randezVous){

                    ?>
                    <button  class="question"> Finaliser La Séance</span></button>
                     <?php
                        }
                        else{
                     ?>       
                       <button onclick="planifierSeance(<?=$seance['id']?>)"  class="question"> Planifier La Séance</span></button>
                     
                    <?php
                     }
                     ?>

                <?php
                    }else{
                ?>
                  <span class="domain_item_large" style="background-color:#1EC902 !important;border-color:#1EC902 !important">Séance Finalisé</span>
                <?php
                }
                ?>
        </div>

    </div>
     <?php
        if($randezVous){
     ?>  
     <div class="detail-item">
        <div class="block-item">
            <div class="block-item-title"> 
                <div class="block-item-image" style="background-image: url('<?=base_url('public/new/img/icon/seance.png')?>');">
                    
                </div> 
                <div>
                        Randez-Vous
                </div>   
            </div>
            <div>
                 <a  href="<?=base_url('details_randez_vous')?>?randez_vous_id=<?=$randezVous['id']?>" class="question"> Détails</span></a>
            </div>
        </div>
       
    </div>         
     <?php
        }
     ?>
     <div class="detail-item">
        <div class="block-item">
            <div class="block-item-title"> 
                <div class="block-item-image" style="background-image: url('<?=base_url('public/new/img/icon/chat.png')?>');">
                    
                </div> 
                <div>
                        Echanges
                </div>   
            </div>
            <div>
                 <a  href="#" class="question"> Détails</span></a>
            </div>
        </div>
       
     </div>    
     <div class="detail-item">
            <div class="block-item" onclick="getElementDetails('#module-content-<?=$seance['id']?>')">
                <div class="block-item-title"> 
                    <div class="block-item-image" style="background-image: url('<?=base_url('public/new/img/icon/module.png')?>');">
                        
                    </div> 
                    <div>
                            Modules
                    </div>   
                </div>
                <div>
                    <i class="icofont-rounded-down"></i>
                </div>
            </div>
            <div data-callback="getDetailsModule" data-seance="<?=$seance['id']?>" class="block-item-content collapse" id="module-content-<?=$seance['id']?>">
            </div> 
        </div>
        <div class="detail-item">

            <div class="block-item"  onclick="getElementDetails('#activity-content-<?=$seance['id']?>')">
                <div class="block-item-title"> 
                    <div class="block-item-image" style="background-image: url('<?=base_url('public/new/img/icon/activity.png')?>');">

                    </div> 
                    <div>
                        Activitées
                    </div>   
                </div>
                <div>
                    <i class="icofont-rounded-down"></i>
                </div>
            </div>
            <div data-callback="getDetailsActivity" data-seance="<?=$seance['id']?>" class="block-item-content collapse" id="activity-content-<?=$seance['id']?>" >
            </div> 
        </div>







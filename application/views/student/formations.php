                       
                       <?php
                        $today = date('Y-m-d');
                        $formations = $info['formations'];
                        $numberRows = $info['total'];
                        $limit = intval($info['limit']);
                        $currentPage = intval($info['currentPage']);
                        $total = intval($info['total']);
                        if(($total % $limit)==0 ){
                            $numberPages = ($total/$limit);
                        }
                        else{
                            $numberPages = ($total/$limit)+1;
                        }
                        $formationsInscrit = $info['formationInscrit'];
                        $formationsInscritIds = $formationsInscrit['formationIds'];
                        $formation_progress = $formationsInscrit['progress'];
                        $demandes = $info['demandes'];
                        $formationsDemandesIds = $demandes['formationIds'];
                        
                    
                       ?>
                       <div class="row">
                                                <?php foreach ($formations as $f) {
                                                    # code...
                                                ?>
                                                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12">
                                                    <div class="gridarea__wraper">
                                                        <div class="gridarea__img">
                                                            <?php
                                                                if($f['thumbnail']){
                                                                        $photo = base_url('assets/assets/images/'.$f['thumbnail']);
                                                                }
                                                                else{
                                                                    $photo = base_url().'public/new/img/grid/grid_2.png';
                                                                }
                                                            ?>
                                                            <img loading="lazy"  src="<?=$photo?>" alt="grid">
                                                            
                                                            <div class="gridarea__small__icon">
                                                                <a href="#"><i class="icofont-read-book-alt"></i></a>
                                                            </div>
                            
                                                        </div>
                                                        <div class="gridarea__content">
                                                            <div class="gridarea__list">
                                                                <ul>
                                                                    <li>
                                                                        <i class="icofont-book-alt"></i> <?=$f['nb_seance']?> Séance(s)
                                                                    </li>
                                                                    <li>
                                                                        <i class="icofont-clock-time"></i> <?=$f['nb_jours']?> Jours
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                            <div class="gridarea__heading">
                                                                <h3><a href="#"><?= $f['nom']?></a></h3>
                                                            </div>
                                                            
                                                            <?php
                                                                if(in_array($f['id'],$formationsInscritIds)){
                                                                    $formation_groupe = $formation_progress[$f['id']];
                                                                    $progress = $formation_groupe['progression'];
                                                             
                                                            ?>
                                                                
                                                                 <div style="margin-top: 20px;" class="progress">
                                                                                                <div class="progress-bar bg-success" role="progressbar" style="width: <?=$progress?>%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">

                                                                                                

                                                                                                </div>
                                                                                            
                                                                </div>
                                                                    <?php
                                                                        if($today<$f['date_debut']){

                                                                    
                                                                    ?>
                                                                        <button href="#" disabled class="default__button" style="margin-top:15px;width:100%" href="#">Inscrit</button>
                                                            
                                                                    <?php
                                                                        }else{

                                                                        
                                                                    ?>
                                                                        <a class="default__button" style="margin-top:15px;width:100%" href="<?=base_url('parcours_groupe_etudiant')?>?formation_id=<?=$f['id']?>">Continuer</a>
                                                            
                                                                    <?php
                                                                        }
                                                                    ?>
                                                             <?php
                                                             }else if(in_array($f['id'],$formationsDemandesIds)){
                                                                ?>  
                                                                <button disabled onclick="inscription(<?=$f['id']?>)" class="default__button" style="margin-top:15px;width:100%" href="#">Demande En Attente</button>
                                                               
                                                                <?php
                                                                }else{
                                                                ?> 
                                                              
                                                             <button onclick="inscription(<?=$f['id']?>)" class="default__button" style="margin-top:15px;width:100%" href="#">S'inscrire</button>
                                                            
                                                             <?php
                                                             }
                                                             ?> 
                                                        </div>
                                                        
                                                        


                                                    </div>
                                                </div>
                                                <?php } ?>
                                            </div>
                                            <?php
                                                if($numberPages){

                                                
                                            ?>
                                            <div class="row">
                                                <div class="col-sm-12 col-md-5"></div>
                                                <div class="col-sm-12 col-md-7">
                                                    <div class="dataTables_paginate paging_simple_numbers" id="manageModuleTable_paginate">
                                                    <ul class="pagination">
                                                        <li class="paginate_button page-item previous disabled" id="manageModuleTable_previous">
                                                        <a href="#" aria-controls="manageModuleTable" data-dt-idx="<?php $currentPage-1 ?>" data-page="<?=$currentPage-1?>"  tabindex="0" class="page-link">
                                                            <i class="icofont-rounded-left"></i>
                                                        </a>
                                                        </li>
                                                        <?php
                                                            for($i=1;$i<=$numberPages;$i++){
                                                             ?>
                                                               <li class="paginate_button page-item active">
                                                                  <a href="#" aria-controls="manageModuleTable" data-dt-idx="1" data-page="<?=$i?>" tabindex="0" class="page-link"><?=$i?></a>
                                                               </li>
                                                         <?php   
                                                         }
                                                        
                                                        ?>
                                                        <li class="paginate_button page-item next disabled" id="manageModuleTable_next">
                                                            <a href="#" aria-controls="manageModuleTable"  data-dt-idx="2" data-page="<?=$currentPage+1?>" tabindex="0" class="page-link">
                                                                    <i class="icofont-rounded-right"></i>
                                                            </a> 
                                                        </li>
                                                    </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php
                                            }
                                            ?>
                
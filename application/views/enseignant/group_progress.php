<?php
    $formation = $info['formation'];

?>
<div class="col-xl-9 col-lg-9 col-md-12">
                            <div class="dashboard__content__wraper">
                                <div class="dashboard__section__title">
                                    <h4>Progrés Des Etudiant</h4>
                                    
                                </div>

                                
                                <hr class="mt-40">
                                <div id="progress_content">

                                </div>
                            </div>

                    
</div>
<script>
        window.addEventListener('load',e=>{

            loadProgressContent()
        })
        function loadProgressContent(){
            overlayOn()
            $('#progress_content').load('<?=base_url()?>formation/getGroupProgression/<?=$formation['id']?>',complete=>{
                overlayOff()
            })


        }

    
</script>
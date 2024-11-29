<?php







class Model_bilan_competance extends CI_Model
{



    public function __construct()
    {



        parent::__construct();
    }
    public function findOrCreateBilanCompetanceInitiateur($etudiant_id,$project_id,$role){
            if($role=='Etudiant'){
                $parameters = $this->getBilanCompetanceInitiateurForStudent($etudiant_id,$project_id); 
                if(!count($parameters)){
                   $created =  $this->createBilanCompetanceInitiateurForStudent($etudiant_id,$project_id);
                    if(!$created){
                        return null;
                    }
                }      
                return $this->getBilanCompetanceInitiateurForStudent($etudiant_id,$project_id);                                 
            }
            else{
                $parameters = $this->getBilanCompetanceInitiateurForEnsignant($etudiant_id,$project_id); 
                if(!count($parameters)){
                    $created=    $this->createBilanCompetanceInitiateurForEnsignant($etudiant_id,$project_id);
                    if(!$created){
                        return null;
                    }
                }
                return $this->getBilanCompetanceInitiateurForEnsignant($etudiant_id,$project_id);
            }
    }
    
    			
		
    public function createBilanCompetanceInitiateurForStudent($studentId,$project_id){
            $parameters = $this->db->select('*')->from('parameter_bilan_competance_initiateur')->get()->result_array();
            $bilan = array();
            foreach($parameters as $p){
                    $bilan[]=[
                        'name'=>$p['name'],
                        'observation'=>null,
                        'evaluation'=>1,
                        'parameter_id'=>$p['id'],
                        'project_id'=>$project_id,
                        'etudiant_id'=>$studentId,
                        'enseignant_id'=>null,
                    ];


            }
            return $this->db->insert_batch('bilan_competance_initiateur',$bilan);
    }
    public function createBilanCompetanceInitiateurForEnsignant($ensignant_id,$project_id){
        $parameters = $this->db->select('*')->from('parameter_bilan_competance_initiateur')->get()->result_array();
        $bilan = array();
        foreach($parameters as $p){
                $bilan[]=[
                    'name'=>$p['name'],
                    'observation'=>null,
                    'evaluation'=>1,
                    'parameter_id'=>$p['id'],
                    'project_id'=>$project_id,
                    'etudiant_id'=>null,
                    'enseignant_id'=>$ensignant_id,
                    
                ];


        }
        return $this->db->insert_batch('bilan_competance_initiateur',$bilan);
    }
    public function getBilanCompetanceInitiateurForStudent($studentId,$project_id){
        return $this->db->select('*')->from('bilan_competance_initiateur')
                                                    ->where('etudiant_id',$studentId)
                                                    ->where('project_id',$project_id)
                                                    ->get()
                                                    ->result_array(); 
    }
    public function getBilanCompetanceInitiateurForEnsignant($ensignant_id,$project_id){
        return $this->db->select('*')->from('bilan_competance_initiateur')
                                    ->where('enseignant_id',$ensignant_id)
                                    ->where('project_id',$project_id)
                                    ->get()
                                    ->result_array(); 
    }
    public function updateBilanInitiateurForEnsignant($ensignant_id,$project_id){
       $deleted =  $this->db->where('enseignant_id',$ensignant_id)->where('project_id',$project_id)->delete('bilan_competance_initiateur');
       if(!$deleted){
        return false;
       }
       $bilan = array();
       $parameters = $this->db->select('*')->from('parameter_bilan_competance_initiateur')->get()->result_array();
       foreach($parameters as $p){
            $bilan[]=[
                'name'=>$p['name'],
                'observation'=>trim($_POST['observation_'.$p['id']]),
                'evaluation'=>intval($_POST['evaluation_'.$p['id']]),
                'parameter_id'=>$p['id'],
                'project_id'=>$project_id,
                'etudiant_id'=>null,
                'enseignant_id'=>$ensignant_id,
                'updated'=>true,
                'valide'=>isset($_POST['valide_'.$p['id']])?true:false
            ];
       } 
       $updatedByEnseignant = $this->db->select('etudiant_id')->from('bilan_competance_initiateur')
                                                            ->where('project_id',$project_id)
                                                            ->where('etudiant_id is not null')
                                                            ->where('updated',true)
                                                            ->get()
                                                            ->result_array();
        $studentIds= array();
        foreach($updatedByEnseignant as $updated){
            if(!in_array($updated['etudiant_id'],$studentIds)){
                $studentIds[]= $updated['etudiant_id'];
            }

        }
        if(count($studentIds)>0){
            $this->db->where('project_id',$project_id)->where_in('etudiant_id',$studentIds)->update('etudiants_projetcs',[
                'bilan_initiateur_ready'=>true
            ]);
        }
       return $this->db->insert_batch('bilan_competance_initiateur',$bilan);
    }
    public function updateBilanInitiateurForEtudiant($etudiant_id,$project_id){
        $deleted =  $this->db->where('etudiant_id',$etudiant_id)->where('project_id',$project_id)->delete('bilan_competance_initiateur');
        if(!$deleted){
         return false;
        }
        $bilan = array();
        $parameters = $this->db->select('*')->from('parameter_bilan_competance_initiateur')->get()->result_array();
        foreach($parameters as $p){
             $bilan[]=[
                 'name'=>$p['name'],
                 'observation'=>null,
                 'evaluation'=>intval($_POST['evaluation_'.$p['id']]),
                 'parameter_id'=>$p['id'],
                 'project_id'=>$project_id,
                 'etudiant_id'=>$etudiant_id,
                 'enseignant_id'=>null,
                 'updated'=>true,
                 'valide'=>isset($_POST['valide_'.$p['id']])?true:false
             ];
        }
        $updatedByEnseignant = $this->db->select('count(*) as nb')->from('bilan_competance_initiateur')
                                                            ->where('project_id',$project_id)
                                                            ->where('enseignant_id is not null')
                                                            ->where('updated',true)
                                                            ->get()
                                                            ->row_array();

        if($updatedByEnseignant['nb']>0){
            $this->db->where('project_id',$project_id)->where('etudiant_id',$etudiant_id)->update('etudiants_projetcs',[
                'bilan_initiateur_ready'=>true
            ]);
        }
        return $this->db->insert_batch('bilan_competance_initiateur',$bilan);
    } 
        public function getParameters(){
            return $this->db->select('*')->from('parameter_bilan_competance_initiateur')->get()->result_array();

        }
        public function getEnseignantsForProject($project_id){
            return $this->db
                        ->select('e.*')
                        ->from('tuteur_projet tp')
                        ->join('enseignant e','tp.id_tuteur=e.id')
                        ->where('tp.id_projet',$project_id)
                        ->get()
                        ->result_array();
        }
        public function getInformationForBilan($etudiant_id,$project_id){
                $enseignant = $this->getEnseignantsForProject($project_id)[0];
                $etudiant = $this->db->select('*')->from('etudiants')->where('id',$etudiant_id)->get()->row_array();
                $bilan =  $this->db->select('*')->from('bilan_competance_initiateur')
                                                        ->where('project_id',$project_id)
                                                        ->get()
                                                        ->result_array();
                $bilanInfo =array();
                foreach($bilan as $b){
                     if(isset($bilanInfo[$b['parameter_id']])){
                        $bilanData=$bilanInfo[$b['parameter_id']];
                        if($b['enseignant_id']){
                            $bilanData['evaluation_enseignant']=$b['evaluation'];
                            $bilanData['valide']=$b['valide'];
                            $bilanData['observation']=trim($b['observation']);
                        }
                        if($b['etudiant_id']){
                            $bilanData=$bilanInfo[$b['parameter_id']];
                            $bilanData['evaluation_etudiant']=$b['evaluation'];
                        }
                        $bilanInfo[$b['parameter_id']]=$bilanData;
                     }  
                     else{
                        $bilanData=array();
                        if($b['enseignant_id']){
                            $bilanData['evaluation_enseignant']=$b['evaluation'];
                            $bilanData['valide']=$b['valide'];
                            $bilanData['observation']=trim($b['observation']);
                        }
                        if($b['etudiant_id']){
                            $bilanData['evaluation_etudiant']=$b['evaluation'];
                        }
                        $bilanInfo[$b['parameter_id']]=$bilanData;

                     } 


                }  
                return [
                    'etudiant'=>$etudiant,
                    'referent'=>$enseignant,
                    'bilan'=>$bilanInfo
                ];                                      

        }
        public function findOrCreateBilanCompetanceInnovateur($etudiant_id,$project_id,$role){
            if($role=='Etudiant'){
                $parameters = $this->getBilanCompetanceInnovateurForStudent($etudiant_id,$project_id); 
                if(!count($parameters)){
                   $created =  $this->createBilanCompetanceInnovateurForStudent($etudiant_id,$project_id);
                    if(!$created){
                        return null;
                    }
                }      
                return $this->getBilanCompetanceInnovateurForStudent($etudiant_id,$project_id);                                 
            }
            else{
                $parameters = $this->getBilanCompetanceInnovateurForEnsignant($etudiant_id,$project_id); 
                if(!count($parameters)){
                    $created=    $this->createBilanCompetanceInnovateurForEnsignant($etudiant_id,$project_id);
                    if(!$created){
                        return null;
                    }
                }
                return $this->getBilanCompetanceInnovateurForEnsignant($etudiant_id,$project_id);
            }
        }
        public function getBilanCompetanceInnovateurForStudent($studentId,$project_id){
            return $this->db->select('*')->from('bilan_competance_innovateur')
                                                        ->where('etudiant_id',$studentId)
                                                        ->where('project_id',$project_id)
                                                        ->get()
                                                        ->result_array(); 
        }
        public function createBilanCompetanceInnovateurForStudent($studentId,$project_id){
            $parameters = $this->db->select('*')->from('parameter_bilan_competance_innovateur')->get()->result_array();
            $bilan = array();
            foreach($parameters as $p){
                    $bilan[]=[
                        'name'=>$p['name'],
                        'observation'=>null,
                        'evaluation'=>1,
                        'parameter_id'=>$p['id'],
                        'project_id'=>$project_id,
                        'etudiant_id'=>$studentId,
                        'enseignant_id'=>null,
                    ];
             }
            return $this->db->insert_batch('bilan_competance_innovateur',$bilan);
        }
        public function getBilanCompetanceInnovateurForEnsignant($ensignant_id,$project_id){
            return $this->db->select('*')->from('bilan_competance_innovateur')
                                        ->where('enseignant_id',$ensignant_id)
                                        ->where('project_id',$project_id)
                                        ->get()
                                        ->result_array(); 
        }
        public function createBilanCompetanceInnovateurForEnsignant($ensignant_id,$project_id){
            $parameters = $this->db->select('*')->from('parameter_bilan_competance_innovateur')->get()->result_array();
            $bilan = array();
            foreach($parameters as $p){
                    $bilan[]=[
                        'name'=>$p['name'],
                        'observation'=>null,
                        'evaluation'=>1,
                        'parameter_id'=>$p['id'],
                        'project_id'=>$project_id,
                        'etudiant_id'=>null,
                        'enseignant_id'=>$ensignant_id,
                        
                    ];
    
    
            }
            return $this->db->insert_batch('bilan_competance_innovateur',$bilan);
        }
        public function updateBilanInnovateurForEnsignant($ensignant_id,$project_id){
            $deleted =  $this->db->where('enseignant_id',$ensignant_id)->where('project_id',$project_id)->delete('bilan_competance_innovateur');
            if(!$deleted){
             return false;
            }
            $bilan = array();
            $parameters = $this->db->select('*')->from('parameter_bilan_competance_innovateur')->get()->result_array();
            foreach($parameters as $p){
                 $bilan[]=[
                     'name'=>$p['name'],
                     'observation'=>trim($_POST['observation_'.$p['id']]),
                     'evaluation'=>intval($_POST['evaluation_'.$p['id']]),
                     'parameter_id'=>$p['id'],
                     'project_id'=>$project_id,
                     'etudiant_id'=>null,
                     'enseignant_id'=>$ensignant_id,
                     'updated'=>true,
                     'valide'=>isset($_POST['valide_'.$p['id']])?true:false
                 ];
            } 
            $updatedByEnseignant = $this->db->select('etudiant_id')->from('bilan_competance_innovateur')
                                                                 ->where('project_id',$project_id)
                                                                 ->where('etudiant_id is not null')
                                                                 ->where('updated',true)
                                                                 ->get()
                                                                 ->result_array();
             $studentIds= array();
             foreach($updatedByEnseignant as $updated){
                 if(!in_array($updated['etudiant_id'],$studentIds)){
                     $studentIds[]= $updated['etudiant_id'];
                 }
     
             }
             if(count($studentIds)>0){
                 $this->db->where('project_id',$project_id)->where_in('etudiant_id',$studentIds)->update('etudiants_projetcs',[
                     'bilan_innovateur_ready'=>true
                 ]);
             }
            return $this->db->insert_batch('bilan_competance_innovateur',$bilan);
         }
         public function updateBilanInnovateurForEtudiant($etudiant_id,$project_id){
             $deleted =  $this->db->where('etudiant_id',$etudiant_id)->where('project_id',$project_id)->delete('bilan_competance_innovateur');
             if(!$deleted){
              return false;
             }
             $bilan = array();
             $parameters = $this->db->select('*')->from('parameter_bilan_competance_innovateur')->get()->result_array();
             foreach($parameters as $p){
                  $bilan[]=[
                      'name'=>$p['name'],
                      'observation'=>null,
                      'evaluation'=>intval($_POST['evaluation_'.$p['id']]),
                      'parameter_id'=>$p['id'],
                      'project_id'=>$project_id,
                      'etudiant_id'=>$etudiant_id,
                      'enseignant_id'=>null,
                      'updated'=>true,
                      'valide'=>isset($_POST['valide_'.$p['id']])?true:false
                  ];
             }
             $updatedByEnseignant = $this->db->select('count(*) as nb')->from('bilan_competance_innovateur')
                                                                 ->where('project_id',$project_id)
                                                                 ->where('enseignant_id is not null')
                                                                 ->where('updated',true)
                                                                 ->get()
                                                                 ->row_array();
     
             if($updatedByEnseignant['nb']>0){
                 $this->db->where('project_id',$project_id)->where('etudiant_id',$etudiant_id)->update('etudiants_projetcs',[
                     'bilan_innovateur_ready'=>true
                 ]);
             }
             return $this->db->insert_batch('bilan_competance_innovateur',$bilan);
         }
         public function getInformationForBilanInnovateur($etudiant_id,$project_id){
            $enseignant = $this->getEnseignantsForProject($project_id)[0];
            $etudiant = $this->db->select('*')->from('etudiants')->where('id',$etudiant_id)->get()->row_array();
            $bilan =  $this->db->select('*')->from('bilan_competance_innovateur')
                                                    ->where('project_id',$project_id)
                                                    ->get()
                                                    ->result_array();
            $bilanInfo =array();
            foreach($bilan as $b){
                 if(isset($bilanInfo[$b['parameter_id']])){
                    $bilanData=$bilanInfo[$b['parameter_id']];
                    if($b['enseignant_id']){
                        $bilanData['evaluation_enseignant']=$b['evaluation'];
                        $bilanData['valide']=$b['valide'];
                        $bilanData['observation']=trim($b['observation']);
                    }
                    if($b['etudiant_id']){
                        $bilanData=$bilanInfo[$b['parameter_id']];
                        $bilanData['evaluation_etudiant']=$b['evaluation'];
                    }
                    $bilanInfo[$b['parameter_id']]=$bilanData;
                 }  
                 else{
                    $bilanData=array();
                    if($b['enseignant_id']){
                        $bilanData['evaluation_enseignant']=$b['evaluation'];
                        $bilanData['valide']=$b['valide'];
                        $bilanData['observation']=trim($b['observation']);
                    }
                    if($b['etudiant_id']){
                        $bilanData['evaluation_etudiant']=$b['evaluation'];
                    }
                    $bilanInfo[$b['parameter_id']]=$bilanData;

                 } 


            }  
            return [
                'etudiant'=>$etudiant,
                'referent'=>$enseignant,
                'bilan'=>$bilanInfo
            ];                                      

    }
    public function findOrCreateBilanCompetancePromoteur($etudiant_id,$project_id,$role){
        if($role=='Etudiant'){
            $parameters = $this->getBilanCompetancePromoteurForStudent($etudiant_id,$project_id); 
            if(!count($parameters)){
               $created =  $this->createBilanCompetancePromoteurForStudent($etudiant_id,$project_id);
                if(!$created){
                    return null;
                }
            }      
            return $this->getBilanCompetancePromoteurForStudent($etudiant_id,$project_id);                                 
        }
        else{
            $parameters = $this->getBilanCompetancePromoteurForEnsignant($etudiant_id,$project_id); 
            if(!count($parameters)){
                $created=    $this->createBilanCompetancePromoteurForEnsignant($etudiant_id,$project_id);
                if(!$created){
                    return null;
                }
            }
            return $this->getBilanCompetancePromoteurForEnsignant($etudiant_id,$project_id);
        }
    }
    public function getBilanCompetancePromoteurForStudent($studentId,$project_id){
        return $this->db->select('*')->from('bilan_competance_promoteur')
                                                    ->where('etudiant_id',$studentId)
                                                    ->where('project_id',$project_id)
                                                    ->get()
                                                    ->result_array(); 
    }
    public function createBilanCompetancePromoteurForStudent($studentId,$project_id){
        $parameters = $this->db->select('*')->from('parameter_bilan_competance_promoteur')->get()->result_array();
        $bilan = array();
        foreach($parameters as $p){
                $bilan[]=[
                    'name'=>$p['name'],
                    'observation'=>null,
                    'evaluation'=>1,
                    'parameter_id'=>$p['id'],
                    'project_id'=>$project_id,
                    'etudiant_id'=>$studentId,
                    'enseignant_id'=>null,
                ];
         }
        return $this->db->insert_batch('bilan_competance_promoteur',$bilan);
    }
    public function getBilanCompetancePromoteurForEnsignant($ensignant_id,$project_id){
        return $this->db->select('*')->from('bilan_competance_promoteur')
                                    ->where('enseignant_id',$ensignant_id)
                                    ->where('project_id',$project_id)
                                    ->get()
                                    ->result_array(); 
    }
    public function createBilanCompetancePromoteurForEnsignant($ensignant_id,$project_id){
        $parameters = $this->db->select('*')->from('parameter_bilan_competance_promoteur')->get()->result_array();
        $bilan = array();
        foreach($parameters as $p){
                $bilan[]=[
                    'name'=>$p['name'],
                    'observation'=>null,
                    'evaluation'=>1,
                    'parameter_id'=>$p['id'],
                    'project_id'=>$project_id,
                    'etudiant_id'=>null,
                    'enseignant_id'=>$ensignant_id,
                    
                ];


        }
        return $this->db->insert_batch('bilan_competance_promoteur',$bilan);
    }
    public function updateBilanPromoteurForEnsignant($ensignant_id,$project_id){
        $deleted =  $this->db->where('enseignant_id',$ensignant_id)->where('project_id',$project_id)->delete('bilan_competance_promoteur');
        if(!$deleted){
         return false;
        }
        $bilan = array();
        $parameters = $this->db->select('*')->from('parameter_bilan_competance_promoteur')->get()->result_array();
        foreach($parameters as $p){
             $bilan[]=[
                 'name'=>$p['name'],
                 'observation'=>trim($_POST['observation_'.$p['id']]),
                 'evaluation'=>intval($_POST['evaluation_'.$p['id']]),
                 'parameter_id'=>$p['id'],
                 'project_id'=>$project_id,
                 'etudiant_id'=>null,
                 'enseignant_id'=>$ensignant_id,
                 'updated'=>true,
                 'valide'=>isset($_POST['valide_'.$p['id']])?true:false
             ];
        } 
        $updatedByEnseignant = $this->db->select('etudiant_id')->from('bilan_competance_promoteur')
                                                             ->where('project_id',$project_id)
                                                             ->where('etudiant_id is not null')
                                                             ->where('updated',true)
                                                             ->get()
                                                             ->result_array();
         $studentIds= array();
         foreach($updatedByEnseignant as $updated){
             if(!in_array($updated['etudiant_id'],$studentIds)){
                 $studentIds[]= $updated['etudiant_id'];
             }
 
         }
         if(count($studentIds)>0){
             $this->db->where('project_id',$project_id)->where_in('etudiant_id',$studentIds)->update('etudiants_projetcs',[
                 'bilan_promoteur_ready'=>true
             ]);
         }
        return $this->db->insert_batch('bilan_competance_promoteur',$bilan);
     }
     public function updateBilanPromoteurForEtudiant($etudiant_id,$project_id){
         $deleted =  $this->db->where('etudiant_id',$etudiant_id)->where('project_id',$project_id)->delete('bilan_competance_promoteur');
         if(!$deleted){
          return false;
         }
         $bilan = array();
         $parameters = $this->db->select('*')->from('parameter_bilan_competance_promoteur')->get()->result_array();
         foreach($parameters as $p){
              $bilan[]=[
                  'name'=>$p['name'],
                  'observation'=>null,
                  'evaluation'=>intval($_POST['evaluation_'.$p['id']]),
                  'parameter_id'=>$p['id'],
                  'project_id'=>$project_id,
                  'etudiant_id'=>$etudiant_id,
                  'enseignant_id'=>null,
                  'updated'=>true,
                  'valide'=>isset($_POST['valide_'.$p['id']])?true:false
              ];
         }
         $updatedByEnseignant = $this->db->select('count(*) as nb')->from('bilan_competance_promoteur')
                                                             ->where('project_id',$project_id)
                                                             ->where('enseignant_id is not null')
                                                             ->where('updated',true)
                                                             ->get()
                                                             ->row_array();
 
         if($updatedByEnseignant['nb']>0){
             $this->db->where('project_id',$project_id)->where('etudiant_id',$etudiant_id)->update('etudiants_projetcs',[
                 'bilan_promoteur_ready'=>true
             ]);
         }
         return $this->db->insert_batch('bilan_competance_promoteur',$bilan);
     }
     public function getInformationForBilanPromoteur($etudiant_id,$project_id){
        $enseignant = $this->getEnseignantsForProject($project_id)[0];
        $etudiant = $this->db->select('*')->from('etudiants')->where('id',$etudiant_id)->get()->row_array();
        $bilan =  $this->db->select('*')->from('bilan_competance_promoteur')
                                                ->where('project_id',$project_id)
                                                ->get()
                                                ->result_array();
        $bilanInfo =array();
        foreach($bilan as $b){
             if(isset($bilanInfo[$b['parameter_id']])){
                $bilanData=$bilanInfo[$b['parameter_id']];
                if($b['enseignant_id']){
                    $bilanData['evaluation_enseignant']=$b['evaluation'];
                    $bilanData['valide']=$b['valide'];
                    $bilanData['observation']=trim($b['observation']);
                }
                if($b['etudiant_id']){
                    $bilanData=$bilanInfo[$b['parameter_id']];
                    $bilanData['evaluation_etudiant']=$b['evaluation'];
                }
                $bilanInfo[$b['parameter_id']]=$bilanData;
             }  
             else{
                $bilanData=array();
                if($b['enseignant_id']){
                    $bilanData['evaluation_enseignant']=$b['evaluation'];
                    $bilanData['valide']=$b['valide'];
                    $bilanData['observation']=trim($b['observation']);
                }
                if($b['etudiant_id']){
                    $bilanData['evaluation_etudiant']=$b['evaluation'];
                }
                $bilanInfo[$b['parameter_id']]=$bilanData;

             } 


        }  
        return [
            'etudiant'=>$etudiant,
            'referent'=>$enseignant,
            'bilan'=>$bilanInfo
        ];                                      

        }   


}

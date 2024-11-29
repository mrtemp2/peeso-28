<?php







class Bilan_competance extends CI_Controller
{
    public function __construct()
    { 
        parent::__construct();
        $this->load->model('model_bilan_competance');
        $this->load->library('session');
        $this->load->library('excel');
        $this->load->database();
        $this->load->helper('url');

    }
    public function getUserRole(){
        return $this->session->userdata()['logged']['type'];
    }
    private function getIdEtudiant(){
        return $this->session->userdata()['logged']['etudiant_id'];


    }
    public function getIdEnseignant(){
        return $this->session->userdata()['logged']['enseignant_id'];


    }
    public function getBilanCompetance($id_project){
            if($this->getUserRole()=='Etudiant'){
                $ensignant_id = $this->getIdEtudiant();
                $parameters = $this->model_bilan_competance->findOrCreateBilanCompetanceInitiateur($ensignant_id,$id_project,$this->getUserRole());
            
                $this->load->view('student/bilan_etudiant', [
                    'info'=>['parameters'=>$parameters,'project_id'=>$id_project]
                ]);
            }
            else{
                $ensignant_id = $this->getIdEnseignant();
                $parameters = $this->model_bilan_competance->findOrCreateBilanCompetanceInitiateur($ensignant_id,$id_project,$this->getUserRole());
            
                $this->load->view('enseignant/bilan', [
                    'info'=>['parameters'=>$parameters,'project_id'=>$id_project]
                ]);
            }
    }
    public function getParameters(){
        echo json_encode($this->model_bilan_competance->getParameters());
    }
    public function updateBilan($projectId){
        $role = $this->getUserRole();
        if($role=='Etudiant'){
            $updated=    $this->model_bilan_competance->updateBilanInitiateurForEtudiant($this->getIdEtudiant(),$projectId);
        } 
        else{
            $updated= $this->model_bilan_competance->updateBilanInitiateurForEnsignant($this->getIdEnseignant(),$projectId);
        }   
        if($updated){
            echo json_encode([
                'success'=>true,
                "message"=>'le bilan est modifie avec succes'
            ]);
        }    
        else{
            echo json_encode([
                'success'=>false,
                "message"=>'Probleme de modification veuillez Reessayer'
            ]);
        }

    }
    public function updateBilanInnovateur($projectId){
        $role = $this->getUserRole();
        if($role=='Etudiant'){
            $updated=    $this->model_bilan_competance->updateBilanInnovateurForEtudiant($this->getIdEtudiant(),$projectId);
        } 
        else{
            $updated= $this->model_bilan_competance->updateBilanInnovateurForEnsignant($this->getIdEnseignant(),$projectId);
        }   
        if($updated){
            echo json_encode([
                'success'=>true,
                "message"=>'le bilan est modifie avec succes'
            ]);
        }    
        else{
            echo json_encode([
                'success'=>false,
                "message"=>'Probleme de modification veuillez Reessayer'
            ]);
        }

    }
    public function updateBilanPromoteur($projectId){
        $role = $this->getUserRole();
        if($role=='Etudiant'){
            $updated=    $this->model_bilan_competance->updateBilanPromoteurForEtudiant($this->getIdEtudiant(),$projectId);
        } 
        else{
            $updated= $this->model_bilan_competance->updateBilanPromoteurForEnsignant($this->getIdEnseignant(),$projectId);
        }   
        if($updated){
            echo json_encode([
                'success'=>true,
                "message"=>'le bilan est modifie avec succes'
            ]);
        }    
        else{
            echo json_encode([
                'success'=>false,
                "message"=>'Probleme de modification veuillez Reessayer'
            ]);
        }

    }
    public function downloadBilanInitiateurExcel($projectId,$etudiantId){
        $info = $this->model_bilan_competance->getInformationForBilan($etudiantId,$projectId);
        $etudiant = $info['etudiant'];
        $referent = $info['referent'];
        $lines = [
            1=>9,
            2=>10,
            3=>11,
            4=>12,
            5=>13,
            6=>15,
            7=>16,
            8=>17,
            9=>18,
            10=>19,
            11=>20,
            12=>24,
            13=>25
           

        ];
            try{
              $bilan = $info['bilan'];  
             $excelUtils = new Excel();
             $spreadsheet = $excelUtils->loadFile('assets/excel/Suivi_Bilan_des_competences.xlsx');
             
             $sheet = $spreadsheet->getActiveSheet();
             $sheet->setCellValue('B3',$etudiant['nom'].' '.$etudiant['prenom']);
             $sheet->setCellValue('B3',$referent['nom'].' '.$referent['prenom']);
             foreach($lines as $key=>$value){
                if(isset($bilan[$key]) || isset($bilan[''.$key.''])){
                    $infoBilan= $bilan[$key]?$bilan[$key]:$bilan[''.$key.''];
                    $sheet->setCellValue('B'.$value, $infoBilan['evaluation_etudiant']);
                    $sheet->setCellValue('D'.$value, $infoBilan['evaluation_enseignant']);
                    $sheet->setCellValue('E'.$value, $infoBilan['observation']);
                    $sheet->setCellValue('F'.$value, $infoBilan['valide']?'oui':'non');
                }
             }
             $writer =  $excelUtils->getWriter($spreadsheet);
             header('Content-Disposition: attachment; filename=Suivie_Bilan_initiateur_'.$etudiant['nom'].'_'.$etudiant['prenom'].'.xlsx');
            
             $writer->save('php://output');
     
             
            }catch(Exception $e){
                 echo json_encode([
                     'success'=>false,
                     'message'=>$e->getMessage()
                 ]);
            }
       

    }
    public function getBilanCompetanceInnovateur($id_project){
       if($this->getUserRole()=='Etudiant'){
            $ensignant_id = $this->getIdEtudiant();
            $parameters = $this->model_bilan_competance->findOrCreateBilanCompetanceInnovateur($ensignant_id,$id_project,$this->getUserRole());
            //echo json_encode($parameters);
            $this->load->view('student/innovateur/bilan_etudiant_innovateur', [
                'info'=>['parameters'=>$parameters,'project_id'=>$id_project]
            ]);
        }
        else{
            $ensignant_id = $this->getIdEnseignant();
            $parameters = $this->model_bilan_competance->findOrCreateBilanCompetanceInnovateur($ensignant_id,$id_project,$this->getUserRole());
      
            $this->load->view('enseignant/innovateur/bilan_innovateur', [
                'info'=>['parameters'=>$parameters,'project_id'=>$id_project]
            ]);
        }
    }
    public function getBilanCompetancePromoteur($id_project): void{
       if($this->getUserRole()=='Etudiant'){
            $ensignant_id =$this->getIdEtudiant();
            $parameters = $this->model_bilan_competance->findOrCreateBilanCompetancePromoteur($ensignant_id,$id_project,$this->getUserRole());
            $this->load->view('student/promoteur/bilan_etudiant_promoteur', [
                'info'=>['parameters'=>$parameters,'project_id'=>$id_project]
            ]);
        }
        else{
            $ensignant_id =$this->getIdEnseignant();
            $parameters = $this->model_bilan_competance->findOrCreateBilanCompetancePromoteur($ensignant_id,$id_project,$this->getUserRole());
           
            $this->load->view('enseignant/promoteur/bilan_promoteur', [
                'info'=>['parameters'=>$parameters,'project_id'=>$id_project]
            ]);
        }
    }
    public function downloadBilanInnovateurExcel($projectId,$etudiantId){
        $info = $this->model_bilan_competance->getInformationForBilanInnovateur($etudiantId,$projectId);
        $etudiant = $info['etudiant'];
        $referent = $info['referent'];
        $lines = [
            1=>9,
            2=>10,
            3=>11,
            4=>12,
            5=>13,
            6=>15,
            7=>16,
            8=>17,
            9=>18,
            10=>19,
            11=>20,
            12=>21,
            13=>22,
            14=>23,
            15=>25,
            16=>26,
            17=>27,
            18=>28,
            19=>29,
            20=>31,
            21=>32,
            22=>33,
            23=>35,
            24=>36,
            25=>37,
            26=>38,
            27=>39,
            28=>40,
            29=>42,
            30=>43,
            31=>44,
            32=>45,
            33=>46,

           

        ];
            try{
              $bilan = $info['bilan'];  
             $excelUtils = new Excel();
             $spreadsheet = $excelUtils->loadFile('assets/excel/Suivi_Bilan_des_competences_innovateur.xlsx');
             
             $sheet = $spreadsheet->getActiveSheet();
             foreach($lines as $key=>$value){
                if(isset($bilan[$key]) || isset($bilan[''.$key.''])){
                    $infoBilan= $bilan[$key]?$bilan[$key]:$bilan[''.$key.''];
                    $sheet->setCellValue('B'.$value, $infoBilan['evaluation_etudiant']);
                    $sheet->setCellValue('D'.$value, $infoBilan['evaluation_enseignant']);
                    $sheet->setCellValue('E'.$value, $infoBilan['observation']);
                    $sheet->setCellValue('F'.$value, $infoBilan['valide']?'oui':'non');
                }
             }
             $writer =  $excelUtils->getWriter($spreadsheet);
             header('Content-Disposition: attachment; filename=Suivie_Bilan_innovateur_'.$etudiant['nom'].'_'.$etudiant['prenom'].'.xlsx');
            
             $writer->save('php://output');
     
             
            }catch(Exception $e){
                 echo json_encode([
                     'success'=>false,
                     'message'=>$e->getMessage()
                 ]);
            }
       

    }
    public function downloadBilanPromoteurExcel($projectId,$etudiantId){
        $info = $this->model_bilan_competance->getInformationForBilanPromoteur($etudiantId,$projectId);
        $etudiant = $info['etudiant'];
        $referent = $info['referent'];
        $lines = [
            1=>9,
            2=>10,
            3=>11,
            4=>12,
            5=>13,
            6=>15,
            7=>16,
            8=>17,
            9=>18,
            10=>19,
            11=>20,
            12=>21,
            13=>22,
            14=>23,
            15=>25,
            16=>26,
            17=>27,
            18=>28,
            19=>30,
            20=>31,
            21=>32,
            22=>34,
            23=>35,
            24=>36,
            25=>38,
            26=>39,
            27=>40,
            28=>41,
            29=>43,
            30=>44,
            31=>45,
            32=>46,
            33=>47,
            34=>48

           

        ];
            try{
              $bilan = $info['bilan'];  
             $excelUtils = new Excel();
             $spreadsheet = $excelUtils->loadFile('assets/excel/Suivi_Bilan_des_competences_Promoteur.xlsx');
             
             $sheet = $spreadsheet->getActiveSheet();
             $sheet->setCellValue('B3',$etudiant['nom'].' '.$etudiant['prenom']);
             //$sheet->setCellValue('B4',$referent['nom'].' '.$referent['prenom']);
             foreach($lines as $key=>$value){
                if(isset($bilan[$key]) || isset($bilan[''.$key.''])){
                    $infoBilan= $bilan[$key]?$bilan[$key]:$bilan[''.$key.''];
                    $sheet->setCellValue('B'.$value, $infoBilan['evaluation_etudiant']);
                    $sheet->setCellValue('D'.$value, $infoBilan['evaluation_enseignant']);
                    $sheet->setCellValue('E'.$value, $infoBilan['observation']);
                    $sheet->setCellValue('F'.$value, $infoBilan['valide']?'oui':'non');
                }
             }
             $writer =  $excelUtils->getWriter($spreadsheet);
             header('Content-Disposition: attachment; filename=Suivie_Bilan_promoteur_'.$etudiant['nom'].'_'.$etudiant['prenom'].'.xlsx');
            
             $writer->save('php://output');
     
             
            }catch(Exception $e){
                 echo json_encode([
                     'success'=>false,
                     'message'=>$e->getMessage()
                 ]);
            }
       

    }
    

}
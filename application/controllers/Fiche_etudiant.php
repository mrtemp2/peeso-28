<?php







class Fiche_etudiant extends CI_Controller
{



    public function __construct()
    {



        parent::__construct();
        $this->load->helper('url');
        $this->load->library('form_validation');
        $this->load->model('model_fiche');
        $this->load->database();
        $this->load->library('session');
    }
    private function getIdEtudiant(){
        return $this->session->userdata()['logged']['etudiant_id'];


    }

    private function validateFormation($formation,$index){
        $errors = [];
        if(!$formation['nom']||$formation['nom'] =='undefined'&&$formation['nom'] =='null'){
            $errors['nom_'.$index] ='le nom de la formation est requis';

        }
        else{
            $exisitingFormation = $this->model_fiche->findFormationBy(
                [
                    'nom'=>$formation['nom'],
                    'etudiant_id'=>$this->getIdEtudiant()
                ]
            );
            if($exisitingFormation){
                $errors['nom_'.$index] ='le nom de la formation doit etre unique';
            }
        }   
       
        if(!$formation['date_debut'] || $formation['date_debut'] =='undefined' || $formation['date_debut'] =='undefined' ){
            $errors['date_debut_'.$index] ='la date début de la formation est requise';
            
        }     
        if(!$formation['date_fin'] || $formation['date_fin'] =='undefined' || $formation['date_fin'] =='undefined'){
            $errors['date_fin_'.$index] ='la date fin de la formation est requise';
           
        }    
        if(!$formation['certificat']){
            $errors['certificat_'.$index]='la certificat de la formation est requise';
        }  
        return $errors;                                
    }
    public function fetchEtablissement($id=null){
        $etablissements = $this->model_fiche->getEtablissement();
        $html = '';
        foreach($etablissements as $e){
            if($e['id']==$id){
                $html .= '<option value="'.$e['id'].'" selected>'.$e['nom'].'</option>';
            }
            else{
                $html .= '<option value="'.$e['id'].'">'.$e['nom'].'</option>';
            }
        }
        echo $html;

    }
    public function fetchFormations($withoutAction=null){
        $id_etudiant = $this->getIdEtudiant();
        $html = '';
        $formations = $this->model_fiche->getFormationsEtudiant($id_etudiant);
        foreach($formations as $f){
            $html .= '<tr>';
            $html .= '<td>'.$f['nom'].'</td>';
            $html .= '<td>'.$f['date_debut'].'</td>';
            $html .= '<td>'.$f['date_fin'].'</td>';
            
            if(!$withoutAction){
                $html .='<td>'.'<div class="actions">
                <button type="button" class="btn btn-sm btn-danger action-button"  onclick="removeFormation('.$f['id'].')"><i class="far fa-trash-alt"></i></button>
                <button type="button" class="btn btn-sm btn-warning action-button"  onclick="editFormation('.$f['id'].')"><i class="far fa-edit"></i></button>
                </div>'.'</td>';
            }
            $html .= '</tr>';
        }
        echo $html;
    }
    public function fetchCertificats($withoutAction=null){
        $id_etudiant = $this->getIdEtudiant();
        $html = '';
        $formations = $this->model_fiche->getCertificatsEtudiant($id_etudiant);
        foreach($formations as $f){
            $html .= '<tr>';
            $html .= '<td>'.$f['nom'].'</td>';
            $html .= '<td>'.$f['date_debut'].'</td>';
            $html .= '<td>'.$f['date_fin'].'</td>';
            
                if(!$withoutAction){
                    $html .='<td>'.'<div class="actions">
            <button type="button" class="btn btn-sm btn-danger action-button"  onclick="removeCertificat('.$f['id'].')"><i class="far fa-trash-alt"></i></button>
            <button type="button" class="btn btn-sm btn-warning action-button"  onclick="editCertificat('.$f['id'].')"><i class="far fa-edit"></i></button>
            </div>'.'</td>';
                }
            $html .= '</tr>';
        }
        echo $html;
    }

    public function fetchParcours($withoutAction=null){
        $id_etudiant = $this->getIdEtudiant();
        $html = '';
        $parcours = $this->model_fiche->getParcoursEtudiant($id_etudiant);
        foreach($parcours as $f){
            $html .= '<tr>';
            $html .= '<td>'.$f['etablissement'].'</td>';
            $html .= '<td>'.$f['date_debut'].'</td>';
            $html .= '<td>'.$f['date_fin'].'</td>';
            $html .= '<td>'.$f['diplome'].'</td>';
            if(!$withoutAction){
                $html .='<td>'.'<div class="actions">
                <button type="button" class="btn btn-sm btn-danger action-button"  onclick="removeParcours('.$f['id'].')"><i class="far fa-trash-alt"></i></button>
                <button type="button" class="btn btn-sm btn-warning action-button"  onclick="editParcours('.$f['id'].')"><i class="far fa-edit"></i></button>
                </div>'.'</td>';
            }
            $html .= '</tr>';
        }
        echo $html;
    }
    public function fetchLangues($withoutAction=null){
        $id_etudiant = $this->getIdEtudiant();
        $html = '';
        $langues = $this->model_fiche->getLanguesEtudiant($id_etudiant);
        foreach($langues as $f){
            $html .= '<tr>';
            $html .= '<td>'.$f['nom'].'</td>';
            $html .= '<td>'.$f['niveau'].'</td>';
            if(!$withoutAction){
                $html .='<td>'.'<div class="actions">
                <button type="button" class="btn btn-sm btn-danger action-button"  onclick="removeLangue('.$f['id'].')"><i class="far fa-trash-alt"></i></button>
                <button type="button" class="btn btn-sm btn-warning action-button"  onclick="editLangue('.$f['id'].')"><i class="far fa-edit"></i></button>
                </div>'.'</td>';
            }
            $html .= '</tr>';
        }
        
        echo $html;
    }
    public function CreateFormations()
    {
        
        $numberFormations = intval($this->input->post('numberFormations'));
        $uniqueErrors = $this->validateNames($numberFormations,'nom_');
        if(count($uniqueErrors)){
            echo json_encode([
                'success'=>false,
                'message'=>'vérifier vos champs',
                'messages'=>$uniqueErrors
            ]);
            return ;

        }
        $formations = array();
        $id_etudiant = $this->getIdEtudiant();
        
        for($i=1;$i<=$numberFormations;$i++){
            $nom_formation=$this->input->post('nom_'.$i);
            $date_debut =$this->input->post('date_debut_'.$i);   
            $date_fin =$this->input->post('date_fin_'.$i);   
           
            $formation = [
                'nom'=>$nom_formation,
                'date_debut'=>$date_debut,
                'date_fin'=>$date_fin,
                'etudiant_id'=>$id_etudiant

            ];  
        //    echo json_encode($formation);
            $errors = $this->validateFormation($formation,$i);
            if(count($errors)){
                echo json_encode([
                    'success'=>false,
                    'message'=>'vérifier vos champs',
                    'messages'=>$errors
                ]);
                return ;
            }
            else{
                $formations[]=$formation;
            }
        }
        $test = $this->model_fiche->createFormations($formations);
        if($test){
            echo json_encode(
                [
                    'success'=>true,
                    'message'=>'les formations sont crées avec succés'
                
                ]
             );
        }
        else{
            echo json_encode(
                [
                    'success'=>false,
                    'message'=>'échec de l\'opération de l\'insersion veuillez réessayer'
                ]
             );

        }
    
    }
    private function validateNames($numberOfNames,$key){
        $errors = array();
        for($i=1;$i<=$numberOfNames;$i++){
            $name = $this->input->post(''.$key.''.$i);     
            for($j=1;$j<=$numberOfNames;$j++){
                $comparaison = $this->input->post(''.$key.''.$j);
                if($name==$comparaison&&$i!=$j){
                    $errors[''.$key.''.$j] = 'cette valeur doit etre unique';

                }
            }
        }
        return $errors;
    }
    private function validateParcours($formation,$index){
        $errors = [];
        if(!$formation['etablissement_id']||$formation['etablissement_id'] =='undefined'&&$formation['etablissement_id'] =='null'){
            $errors['etablissement_id_'.$index] ='l\' etablissement est requise';
        }   
        if(!$formation['date_debut'] || $formation['date_debut'] =='undefined' || $formation['date_debut'] =='undefined' ){
            $errors['date_debut_etab_'.$index] ='la date début du parcours est requis';
        }     
        if(!$formation['date_fin'] || $formation['date_fin'] =='undefined' || $formation['date_fin'] =='undefined'){
            $errors['date_fin_etab_'.$index] ='la date fin du parcours est requis';
        }    
        if(!$formation['diplome']){
            $errors['diplome_'.$index]='le diplome est requis';
        }  
        return $errors;                                
    }
    public function CreateParcours()
    {
       try{
    
        $numberFormations = intval($this->input->post('numberParcours'));
        $formations = array();
        $id_etudiant = $this->getIdEtudiant();
        
        for($i=1;$i<=$numberFormations;$i++){
            $etablissement_id=$this->input->post('etablissement_id_'.$i);
            $date_debut =$this->input->post('date_debut_etab_'.$i);   
            $date_fin =$this->input->post('date_fin_etab_'.$i);   
            $diplome =$this->input->post('diplome_'.$i);   
            $formation = [
                'etablissement_id'=>$etablissement_id,
                'date_debut'=>$date_debut,
                'date_fin'=>$date_fin,
                'diplome'=>$diplome,
                'etudiant_id'=>$id_etudiant
            ];  
        //    echo json_encode($formation);
            $errors = $this->validateParcours($formation,$i);
            if(count($errors)){
                echo json_encode([
                    'success'=>false,
                    'message'=>'vérifier vos champs',
                    'messages'=>$errors
                ]);
                return ;
            }
            else{
                $formations[]=$formation;
            }
        }
        $test = $this->model_fiche->createParcours($formations);
        if($test){
            echo json_encode(
                [
                    'success'=>true,
                    'message'=>'les formations sont crées avec succés'
                
                ]
             );
        }
        else{
            echo json_encode(
                [
                    'success'=>false,
                    'message'=>'échec de l\'opération de l\'insersion veuillez réessayer'
                ]
             );

        }
        }
        catch(Exception $e){
            echo json_encode([
                'success'=>false,
                'message'=>$e->getMessage()
            ]);

        }
    
    }
    public function validateLangue($formation,$index){
        $errors = [];
        if(!$formation['nom']||$formation['nom'] =='undefined'&&$formation['nom'] =='null'){
            $errors['nom_langue_'.$index] ='la langue est requise';
        } 
        else{
            $existant = $this->model_fiche->findLanguesBy([
                'nom'=>$formation['nom'],
                'etudiant_id'=>$this->getIdEtudiant()
            ]);
            if($existant){
                $errors['nom_langue_'.$index] ='vous avez déja entrer cette langue';
            }
        }  
        if(!$formation['niveau'] || $formation['niveau'] =='undefined' || $formation['niveau'] =='undefined' ){
            $errors['niveau_'.$index] ='le niveau de la langue est requis';
        }     
        return $errors;      
    }
    public function createLangues(){

        $numberFormations = intval($this->input->post('numberLangues'));
        $uniqueErrors=  $this->validateNames($numberFormations,'nom_langue_');
      
        if(count($uniqueErrors)){
                    echo json_encode([
                        'success'=>false,
                        'message'=>'vérifier vos champs',
                        'messages'=>$uniqueErrors
                    ]);
                    return ;
        
         }
        $formations = array();
        $id_etudiant = $this->getIdEtudiant();
        
        for($i=1;$i<=$numberFormations;$i++){
            $nom_langue=$this->input->post('nom_langue_'.$i);
            $niveau =$this->input->post('niveau_'.$i);   
         
            $formation = [
                'nom'=>$nom_langue,
                'niveau'=>$niveau,
                'etudiant_id'=>$id_etudiant
               
            ];  
        //    echo json_encode($formation);
            $errors = $this->validateLangue($formation,$i);
            if(count($errors)){
                echo json_encode([
                    'success'=>false,
                    'message'=>'vérifier vos champs',
                    'messages'=>$errors
                ]);
                return ;
            }
            else{
                $formations[]=$formation;
            }
         
        }
        $test = $this->model_fiche->createLangues($formations);
        if($test){
            echo json_encode(
                [
                    'success'=>true,
                    'message'=>'crées avec succés'
                
                ]
             );
        }
        else{
            echo json_encode(
                [
                    'success'=>false,
                    'message'=>'échec de l\'opération de l\'insersion veuillez réessayer'
                ]
             );

        }

        
    }
    public function validateCertificat($formation,$index){
        $errors = [];
        if(!$formation['nom']||$formation['nom'] =='undefined'&&$formation['nom'] =='null'){
            $errors['nom_certficat_'.$index] ='le nom de la certificat est requis';
        } 
        else{
            $existant = $this->model_fiche->findCertificatBy([
                'nom'=>$formation['nom'],
                'etudiant_id'=>$this->getIdEtudiant()
            ]);
            if($existant){
                $errors['nom_certficat_'.$index] ='vous avez déja entrer cette certficat';
            }
        }  
        if(!$formation['date_debut'] || $formation['date_debut'] =='undefined' || $formation['date_debut'] =='undefined' ){
            $errors['date_debut_certificat_'.$index] ='la date début du certificat est requis';
        }     
        if(!$formation['date_fin'] || $formation['date_fin'] =='undefined' || $formation['date_fin'] =='undefined'){
            $errors['date_fin_certificat_'.$index] ='la date fin du certificat est requis';
        }    
        return $errors;      
    }
    public function createCertificat(){

        $numberFormations = intval($this->input->post('numberCertificat'));
        $uniqueErrors=  $this->validateNames($numberFormations,'nom_certficat_');
      
        if(count($uniqueErrors)){
                    echo json_encode([
                        'success'=>false,
                        'message'=>'vérifier vos champs',
                        'messages'=>$uniqueErrors
                    ]);
                    return ;
        
         }
        $formations = array();
        $id_etudiant = $this->getIdEtudiant();
        
        for($i=1;$i<=$numberFormations;$i++){
            $nom_formation=$this->input->post('nom_certficat_'.$i);
            $date_debut =$this->input->post('date_debut_certificat_'.$i);   
            $date_fin =$this->input->post('date_fin_certificat_'.$i);   
            
            $formation = [
                'nom'=>$nom_formation,
                'date_debut'=>$date_debut,
                'date_fin'=>$date_fin,
                
                'etudiant_id'=>$id_etudiant

            ];  
        //    echo json_encode($formation);
            $errors = $this->validateCertificat($formation,$i);
            if(count($errors)){
                echo json_encode([
                    'success'=>false,
                    'message'=>'vérifier vos champs',
                    'messages'=>$errors
                ]);
                return ;
            }
            else{
                $formations[]=$formation;
            }
         
        }
        $test = $this->model_fiche->createCertificat($formations);
        if($test){
            echo json_encode(
                [
                    'success'=>true,
                    'message'=>'crées avec succés'
                
                ]
             );
        }
        else{
            echo json_encode(
                [
                    'success'=>false,
                    'message'=>'échec de l\'opération de l\'insersion veuillez réessayer'
                ]
             );

        }

        
    }
    public function deleteFormation($id){
        $test = $this->model_fiche->deleteFormation($id,$this->getIdEtudiant());
        if($test){
            echo json_encode([
                'success'=>true,
                'message'=>'formation supprimée avec succés'
            ]);

        }
        else{
            echo json_encode([
                'success'=>false,
                'message'=>'Supprission non effectuée'
            ]);

        }
    }
    public function deleteLangue($id){
        $test = $this->model_fiche->deleteLangue($id,$this->getIdEtudiant());
        if($test){
            echo json_encode([
                'success'=>true,
                'message'=>'Langue supprimée avec succés'
            ]);

        }
        else{
            echo json_encode([
                'success'=>false,
                'message'=>'Supprission non effectuée'
            ]);

        } 

    }
    public function deleteParcours($id){
        $test = $this->model_fiche->deleteParcours($id,$this->getIdEtudiant());
        if($test){
            echo json_encode([
                'success'=>true,
                'message'=>'Parcours supprimé avec succés'
            ]);

        }
        else{
            echo json_encode([
                'success'=>false,
                'message'=>'Supprission non effectuée'
            ]);

        } 
    }
    public function deleteCertificat($id){
        $test = $this->model_fiche->deleteCertificat($id,$this->getIdEtudiant());
        if($test){
            echo json_encode([
                'success'=>true,
                'message'=>'Cerificat supprimée avec succés'
            ]);

        }
        else{
            echo json_encode([
                'success'=>false,
                'message'=>'Supprission non effectuée'
            ]);

        } 

    }
    public function findOneFormation($id){
      /*  findCertificatBy
findParcoursBy
findFormationBy
findLanguesBy*/
        $data = $this->model_fiche->findFormationBy([
            'id'=>$id,
            'etudiant_id'=>$this->getIdEtudiant()
        ]);
        echo json_encode($data);

    }
    public function updateFormation($id){
        $validate_data = array(
            array(
                'field' => 'nom',
                'label' => 'nom',
                'rules' => 'required'
            ),
            array(
                'field' => 'date_debut',
                'label' => 'Date Debut',
                'rules' => 'required'
            ),
            array(
                'field' => 'date_fin',
                'label' => 'Date Fin',
                'rules' => 'required'
            ),
        );
        $this->form_validation->set_rules($validate_data);
        $this->form_validation->set_message('required', 'Le champ %s est obligatoire');
        $validator =array();
        if ($this->form_validation->run() === true) {
                $test =  $this->model_fiche->updateFormationEtudiant($id,$this->getIdEtudiant(),[
                    'nom'=>$this->input->post('nom'),
                    'date_debut'=>$this->input->post('date_debut'),
                    'date_fin'=>$this->input->post('date_fin'),
                ]);      
                if($test){
                    $validator = [
                        'success'=>true,
                        'message'=>'les données sont mis à jours avec succés'
                    ];

                }   
                else{
                    $validator = [
                        'success'=>false,
                        'message'=>'une erreur s\'était produite veuillez réessayer'
                    ];

                }      
        
        } else {
            $validator['success'] = false;
            foreach ($_POST as $key => $value) {
                $validator['messages'][$key] = form_error($key);
            }
        }
        echo json_encode($validator);
    }
    public function findOneParcours($id){
        /*  findCertificatBy
  findParcoursBy
  findFormationBy
  findLanguesBy*/
          $data = $this->model_fiche->findParcoursBy([
              'id'=>$id,
              'etudiant_id'=>$this->getIdEtudiant()
          ]);
          echo json_encode($data);
  
      }
      public function updateParcours($id){
          $validate_data = array(
              array(
                  'field' => 'etablissement_id',
                  'label' => 'Etablissement',
                  'rules' => 'required'
              ),
              array(
                  'field' => 'date_debut_etab',
                  'label' => 'Date Debut',
                  'rules' => 'required'
              ),
              array(
                  'field' => 'date_fin_etab',
                  'label' => 'Date Fin',
                  'rules' => 'required'
              ),
              array(
                'field' => 'diplome',
                'label' => 'Diplome',
                'rules' => 'required'
              )
          );
          $this->form_validation->set_rules($validate_data);
          $this->form_validation->set_message('required', 'Le champ %s est obligatoire');
          $validator =array();
          if ($this->form_validation->run() === true) {
                  $test =  $this->model_fiche->updateParcoursEtudiant($id,$this->getIdEtudiant(),[
                      'etablissement_id'=>intval($this->input->post('etablissement_id')),
                      'date_debut'=>$this->input->post('date_debut_etab'),
                      'date_fin'=>$this->input->post('date_fin_etab'),
                      'diplome'=>$this->input->post('diplome')
                  ]);      
                  if($test){
                      $validator = [
                          'success'=>true,
                          'message'=>'les données sont mis à jours avec succés'
                      ];
  
                  }   
                  else{
                      $validator = [
                          'success'=>false,
                          'message'=>'une erreur s\'était produite veuillez réessayer'
                      ];
  
                  }      
          
          } else {
              $validator['success'] = false;
              foreach ($_POST as $key => $value) {
                  $validator['messages'][$key] = form_error($key);
              }
          }
          echo json_encode($validator);
      }
     public function findOneCertificat($id){
     
          $data = $this->model_fiche->findCertificatBy([
              'id'=>$id,
              'etudiant_id'=>$this->getIdEtudiant()
          ]);
          echo json_encode($data);
  
      }
      public function updateCertificat($id){
          $validate_data = array(
              array(
                  'field' => 'nom_cert',
                  'label' => 'Nom',
                  'rules' => 'required'
              ),
              array(
                  'field' => 'date_debut_cert',
                  'label' => 'Date Debut',
                  'rules' => 'required'
              ),
              array(
                  'field' => 'date_fin_cert',
                  'label' => 'Date Fin',
                  'rules' => 'required'
              ),
             
          );
          $this->form_validation->set_rules($validate_data);
          $this->form_validation->set_message('required', 'Le champ %s est obligatoire');
          $validator =array();
          if ($this->form_validation->run() === true) {
                  $test =  $this->model_fiche->updateCertificatEtudiant($id,$this->getIdEtudiant(),[
                      'nom'=>$this->input->post('nom_cert'),
                      'date_debut'=>$this->input->post('date_debut_cert'),
                      'date_fin'=>$this->input->post('date_fin_cert'),
                  ]);      
                  if($test){
                      $validator = [
                          'success'=>true,
                          'message'=>'les données sont mis à jours avec succés'
                      ];
  
                  }   
                  else{
                      $validator = [
                          'success'=>false,
                          'message'=>'une erreur s\'était produite veuillez réessayer'
                      ];
  
                  }      
          
          } else {
              $validator['success'] = false;
              foreach ($_POST as $key => $value) {
                  $validator['messages'][$key] = form_error($key);
              }
          }
          echo json_encode($validator);
      }
      public function findOneLangue($id){
     
        $data = $this->model_fiche->findLanguesBy([
            'id'=>$id,
            'etudiant_id'=>$this->getIdEtudiant()
        ]);
        echo json_encode($data);

    }
    public function updateLangue($id){
        $validate_data = array(
            array(
                'field' => 'nom',
                'label' => 'Nom',
                'rules' => 'required'
            ),
         
            array(
                'field' => 'niveau',
                'label' => 'Niveau',
                'rules' => 'required'
            ),
           
        );
        $this->form_validation->set_rules($validate_data);
        $this->form_validation->set_message('required', 'Le champ %s est obligatoire');
        $validator =array();
        if ($this->form_validation->run() === true) {
                $test =  $this->model_fiche->updateLangueEtudiant($id,$this->getIdEtudiant(),[
                    'nom'=>$this->input->post('nom'),
                    'niveau'=>$this->input->post('niveau'),
                ]);      
                if($test){
                    $validator = [
                        'success'=>true,
                        'message'=>'les données sont mis à jours avec succés'
                    ];

                }   
                else{
                    $validator = [
                        'success'=>false,
                        'message'=>'une erreur s\'était produite veuillez réessayer'
                    ];

                }      
        
        } else {
            $validator['success'] = false;
            foreach ($_POST as $key => $value) {
                $validator['messages'][$key] = form_error($key);
            }
        }
        echo json_encode($validator);
    }


    public function fetchEtudiantData()
    {
        $moduleData = $this->model_fiche->fetchEtudiantData();
        $result = array('data' => array());
        $x = 1;
        foreach ($moduleData as $key => $value) {
            $button = "<!-- Single button -->";
            $button .= '    
            <div class="actions">
            <button type="button" class="btn btn-sm btn-primary action-button" data-target="#ViewSubjectModal" onclick="ViewSubject(' . $value['id'] . ')" data-toggle="modal"><i class="fas fa-eye"></i></button>
                    
            <button type="button" class="btn btn-sm btn-warning action-button" data-toggle="modal" 
            data-target="#updateSubjectModal" onclick="updateSubject(' . $value['id'] . ')"> <i class="fas fa-edit"></i>
            </button>
            <button type="button" class="btn btn-sm btn-danger action-button" data-toggle="modal" data-target="#removeSubjectModal" onclick="removeSubject(' . $value['id'] . ')"><i class="far fa-trash-alt"></i>
            </button>
            
            </div>

            ';
           

            $result['data'][$key] = array(
                $value['id'],
                $value['nom'] . '  ' . $value['prenom'],
                $value['email'],
                $button
            );
            
        } // /froeach

        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($result);
    }

    public function getEtudiant($id)
    {
        $result = $this->model_fiche->getEtudiant($id);

        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($result);
    }
    
    public function updateEtudiantData($moduleId = null)
    {
        if ($moduleId) {
            $update = $this->model_fiche->updateEtudiantData($moduleId);
            if ($update === true) {
                $validator['success'] = true;
                $validator['messages'] = "Modifé avec succès";
            } else {
                $validator['success'] = false;
                $validator['messages'] = "Erreur lors de la modification des informations";
            }
        }

        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($validator);
    }

    public function removeEtudiant($moduleId = null)
    {
        if ($moduleId) {
            $remove = $this->model_fiche->removeEtudiant($moduleId);
            if ($remove === true) {
                $validator['success'] = true;
                $validator['messages'] = "Supprimé avec succès";
            } else {
                $validator['success'] = false;
                $validator['messages'] = "Erreur lors de la suppression";
            }

            header('Content-Type: application/json; charset=utf-8');
            echo json_encode($validator);
        }
    }

    public function updateProfile()
	{
		$this->load->library('session');

		$userId = $this->session->userdata['logged']['id'];
		$response = array('success' => false, 'message' => '');

        $this->form_validation->set_rules('username', 'Username *', 'trim|required|regex_match[/^[a-zA-Z0-9._@-]+$/]');

		if ($this->form_validation->run() === true) {
			// Debugging output
			error_log("Validation successful");

			$update = $this->model_fiche->updateProfile($userId);

			// Debugging output
			error_log("Update result: " . json_encode($update));
             $user_data = $this->session->userdata()['logged'];
			
                $user_data['username'] = htmlspecialchars($this->input->post('username'),ENT_QUOTES, 'UTF-8');
                $user_data['password'] = htmlspecialchars($this->session->userdata()['logged']['password'],ENT_QUOTES, 'UTF-8');
				
				
				$user_data['photo'] =htmlspecialchars($this->session->userdata()['logged']['photo'],ENT_QUOTES, 'UTF-8');

          
			$this->session->set_userdata('logged', $user_data);
			if ($update) {
			
				$response['success'] = $userId;
				$response['message'] = "Modifié avec succès";
			} else {
				$response['message'] = "Erreur lors de la mise à jour du profil.";
			}
		} else {
			$response['message'] = "Erreurs de validation.";
			$response['errors'] = array(
				'username' => form_error('username'),
			);
		}

		header('Content-Type: application/json');
		echo json_encode($response);
	}

    public function changePhoto($userId = null, $photo = null)
	{
		$userId = $_SESSION['logged']['id'];

		if ($userId) {
			if ($_FILES['photo']['name']) {
				$upload_config = array(
					'upload_path' => './assets/assets/images',
					'allowed_types' => 'png|jpg|jpeg',
					'max_size' => 4000
				);

				$this->load->library("upload", $upload_config);

				if ($this->upload->do_upload('photo')) {
					$upload_data = $this->upload->data();
					$photo = $upload_data['file_name'];

					// Resize the uploaded image to the desired dimensions
					$this->resizeImage($photo, 200, 200); // Adjust dimensions as needed

					// Now, update the user's photo in the database
					$status = $this->model_fiche->changePhoto($userId, $photo);

					if ($status) {
						$response['success'] = true;
						$response['message'] = "Modifié avec succès";
						$_SESSION['user_photo'] = base_url('assets/assets/images/' . $res[0]->photo);
						echo json_encode($response);
					} else {
						$response['success'] = false;
						$response['message'] = "Erreur lors de la mise à jour de la photo.";
						echo json_encode($response);
					}
				} else {
					$response['message'] = 'Erreur lors du téléchargement de la photo : ' . $this->upload->display_errors();
				}
			}
		}
		$_SESSION['user_photo'] = base_url('assets/assets/images/' . $photo);

		header('Content-Type: application/json');
		echo json_encode($response);
	}


    public function changePassword()
	{
		$user_id = $this->session->userdata['logged']['id'];
		

		$this->form_validation->set_rules('old_password', 'Mot de passe actuel', 'required|callback_validate_current_password');
		$this->form_validation->set_rules('newPassword', 'Nouveau mot de passe', 'required|callback_password_complexity');
		$this->form_validation->set_rules('confirmPassword', 'Confirmez le mot de passe', 'required|matches[newPassword]');

		$validator = array(); // Créez un tableau pour stocker les messages de validation

		if ($this->form_validation->run() === true) {

			$update = $this->model_fiche->changePassword($user_id);

			if ($update) {
				$this->session->userdata['logged']['password'] = $this->input->post('newPassword');
				$validator['success'] = true;
				$validator['messages'] = "Modifié avec succès";
			} else {
				$validator['success'] = false;
				$validator['messages'] = 'Erreur lors de la modification';
				
			}
		} else {
			$validator['success'] = false;
			$validator['messages'] = strip_tags(validation_errors());  // Utilisez la fonction validation_errors() pour obtenir les erreurs de validation du formulaire
		}

		echo json_encode($validator);
	}

    public function validate_current_password($password)
	{

		// Check if the password contains any disallowed characters or scripts
		if (preg_match('/[<">]/', $password) || stripos($password, 'script') !== false) {
			$this->form_validation->set_message('validate_current_password', 'Le champ Mot de passe contient des caractères non autorisés.');
			return false;
		}

		$user_id = $this->session->userdata['logged']['id'];
		$stored_password = $this->model_fiche->getStoredPassword($user_id);

		if ($password === $stored_password) {
			// Les mots de passe correspondent
			return true;
		} else {
			// Les mots de passe ne correspondent pas
			$this->form_validation->set_message('validate_current_password', 'Le champ Mot de passe actuel est incorrect');
			return false;
		}
	}

    public function password_complexity($password)
	{
		if (strlen($password) < 8) {
			$this->form_validation->set_message('password_complexity', 'Le mot de passe doit contenir au moins 8 caractères.');
			return false;
		}
		if (!preg_match('/[a-z]/', $password)) {
			$this->form_validation->set_message('password_complexity', 'Le mot de passe doit contenir au moins une lettre minuscule.');
			return false;
		}
		if (!preg_match('/[A-Z]/', $password)) {
			$this->form_validation->set_message('password_complexity', 'Le mot de passe doit contenir au moins une majuscule.');
			return false;
		}

		if (!preg_match('/[!@#$%^&*]/', $password)) {
			$this->form_validation->set_message('password_complexity', 'Le mot de passe doit contenir au moins un caractère spécial.');
			return false;
		}
		if (!preg_match('/[1-8]/', $password)) {
			$this->form_validation->set_message('password_complexity', 'Le mot de passe doit contenir au moins un chiffre.');
			return false;
		}

		return true;
	}

	private function resizeImage($filename, $width, $height)
	{
		$config['image_library'] = 'gd2';
		$config['source_image'] = './assets/assets/images/' . $filename;
		$config['maintain_ratio'] = FALSE;
		$config['width'] = $width;
		$config['height'] = $height;

		$this->load->library('image_lib', $config);
		$this->image_lib->resize();
		$this->image_lib->clear();
	}
  
}
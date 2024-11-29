<?php







class Model_projet extends CI_Model
{



    public function __construct()
    {



        parent::__construct();
        $this->load->model('model_fiche');
    }
    
  

    public function fetchProjetData(){
        return $this->db->select('p.*, concat(e.prenom," ", e.nom) as nom_ee, ac.nom as nom_appel')
                        ->from('projects p')
                        ->join('etudiants e', 'p.etudiant_id = e.id')
                        ->join('appel_a_candidature ac', 'p.id_appel_condidature = ac.id')
                        ->where('1er_validation', false)
                        ->get()
                        ->result_array();    
    }
    public function fetchProjetDataRefuse(){
        return $this->db->select('p.*, concat(e.prenom," ", e.nom) as nom_ee, ac.nom as nom_appel')
                        ->from('projects p')
                        ->join('etudiants e', 'p.etudiant_id = e.id')
                        ->join('appel_a_candidature ac', 'p.id_appel_condidature = ac.id')
                        ->where('p.niveau', 'non')
                        ->get()
                        ->result_array();    
    }
    public function fetchProjetData1erValidation(){
        return $this->db->select('p.*, concat(e.prenom," ", e.nom) as nom_ee, ac.nom as nom_appel')
                        ->from('projects p')
                        ->join('etudiants e', 'p.etudiant_id = e.id')
                        ->join('appel_a_candidature ac', 'p.id_appel_condidature = ac.id')
                        ->where('p.1er_validation', true)
                        ->where('p.niveau', 'en_attente')
                        ->get()
                        ->result_array();    
    }
    public function fetchProjetDataInitiateur(){
        return $this->db->select('p.*, concat(e.prenom," ", e.nom) as nom_ee, ac.nom as nom_appel')
                        ->from('projects p')
                        ->join('etudiants e', 'p.etudiant_id = e.id')
                        ->join('appel_a_candidature ac', 'p.id_appel_condidature = ac.id')
                        ->where('p.niveau', 'initiateur')
                        ->get()
                        ->result_array();    
    }
    public function fetchProjetDataInnovateur(){
        return $this->db->select('p.*, concat(e.prenom," ", e.nom) as nom_ee, ac.nom as nom_appel')
                        ->from('projects p')
                        ->join('etudiants e', 'p.etudiant_id = e.id')
                        ->join('appel_a_candidature ac', 'p.id_appel_condidature = ac.id')
                        ->where('p.niveau', 'innovateur')
                        ->get()
                        ->result_array();    
    }
    public function fetchProjetDataPromoteur(){
        return $this->db->select('p.*, concat(e.prenom," ", e.nom) as nom_ee, ac.nom as nom_appel')
                        ->from('projects p')
                        ->join('etudiants e', 'p.etudiant_id = e.id')
                        ->join('appel_a_candidature ac', 'p.id_appel_condidature = ac.id')
                        ->where('p.niveau', 'promoteur')
                        ->get()
                        ->result_array();    
    }
    public function fetchProjetAccepteData(){
        return $this->db->select('p.*, concat(e.prenom," ", e.nom) as nom_ee, ac.nom as nom_appel')
                        ->from('projects p')
                        ->join('etudiants e', 'p.etudiant_id = e.id')
                        ->join('appel_a_candidature ac', 'p.id_appel_condidature = ac.id')
                        ->where('is_finished = 1')
                        ->get()
                        ->result_array();    
    }
    public function fetchProjetEnCoursData(){
        return $this->db->select('p.*, concat(e.prenom," ", e.nom) as nom_ee, ac.nom as nom_appel')
                        ->from('projects p')
                        ->join('etudiants e', 'p.etudiant_id = e.id')
                        ->join('appel_a_candidature ac', 'p.id_appel_condidature = ac.id')
                        ->where('is_finished', 0)
                        ->get()
                        ->result_array();    
    }

    public function getProjet($id){
        return $this->db->select('p.*,ac.nom as nom_appel')
                        ->from('projects p')
                        ->join('appel_a_candidature ac', 'p.id_appel_condidature = ac.id')
                        ->where('p.id', $id)
                        ->get()
                        ->row_array();    
    }
    

    public function removeProjet($subjectId){
        if ($subjectId) {
            $this->db->where('id', $subjectId);
            $result = $this->db->delete('projects');
            return ($result === true ? true : false);
        }
    }
    public function createProject($project){
            $created  =$this->db->insert('projects',$project);
            if(!$created){
                return false;
            }
            else{
                return $this->db->insert_id();
            }
    }
    public function setProjectPiecesJointes($pieces_jointes){
       return $this->db->insert_batch('pieces_jointes',$pieces_jointes);
    }
    public function setProjectDomaines($domaines){
        return $this->db->insert_batch('projects_domaines',$domaines);
    }
    public function getValidAppel($id_appel){
        return $this->db->select('*')
                ->where('id',$id_appel)
                ->where('date(date_fin)>=date(CURRENT_DATE)') 
                ->from('appel_a_candidature')
                ->get()
                ->row_array();
    }
    public function getMembresProject($project_id){
        return $this->db
                    ->select('e.*,ep.cv,ep.porteur_project,ep.bilan_initiateur_ready,ep.bilan_innovateur_ready,ep.bilan_promoteur_ready')
                    ->from('etudiants_projetcs ep')
                    ->join('etudiants e','ep.etudiant_id=e.id')
                    ->order_by('ep.porteur_project','desc')
                    ->where('ep.project_id',$project_id)
                    ->get()
                    ->result_array();


    }
    public function getEndedSeanceForProject($projectId){
        return $this->db->select('s.*,as.num as numero_seance,as.nom as nom_seance')
                 ->from('seance_initiateur s') 
                 ->join('attribution_seance_initiateur as','s.id_attribution_seance=as.id')
                 ->where('s.realise',true)
                 ->where('id_projet',$projectId) 
                 ->get()
                 ->result_array() ;
    }
    public function getEndedSeanceInnovateurForProject($projectId){
        return $this->db->select('s.*,as.num as numero_seance,as.nom as nom_seance')
                 ->from('seance_innovateur s') 
                 ->join('attribution_seance_innovateur as','s.id_attribution_seance=as.id')
                 ->where('s.realise',true)
                 ->where('s.id_projet',$projectId) 
                 ->get()
                 ->result_array() ;
    }
    public function getEndedSeancePromoteurForProject($projectId){
        return $this->db->select('s.*,as.num as numero_seance,as.nom as nom_seance')
                 ->from('seance_promoteur s') 
                 ->join('attribution_seance_promoteur as','s.id_attribution_seance=as.id')
                 ->where('s.realise',true)
                 ->where('s.id_projet',$projectId) 
                 ->get()
                 ->result_array() ;
    }
    public function getDetailsProjects($project_id){
      $project = $this->db->select('p.*,group_concat(dom.nom SEPARATOR ",") as domaines_names')
                          ->from('projects p')
                          ->where('p.id',$project_id)
                          ->join('(select d.*,pd.project_id from 2024_projects_domaines pd inner join 2024_domaine d on pd.domaine_id=d.id ) as dom','p.id=dom.project_id','left')
                          ->group_by('p.id')
                          
                          ->get()
                          ->row_array(); 
        if(!$project){
            return null;
        }

        //when you come back horaire seance
        $members = $this->getMembresProject($project_id);
        $refrents = $this->getEnseignantsForProject($project_id);
        $endedSeance = $this->getEndedSeanceForProject($project_id);
        $endedSeanceInnvateur = $this->getEndedSeanceInnovateurForProject($project_id);
        $endedSeancePromoteur = $this->getEndedSeancePromoteurForProject($project_id);
        return [
            'project'=>$project,
            'members'=>$members,
            'referents'=>$refrents,
            'endedSeance'=>$endedSeance,
            'endedSeanceInnovateur'=>$endedSeanceInnvateur,
            'endedSeancePromoteur'=>$endedSeancePromoteur
        ];                          
        
       
    }
    public function getProjectsEtudiant($etudiant_id){
        return $this->db->select('p.*,ep.porteur_project')
                        ->from('etudiants_projetcs ep')
                        ->join('projects p','ep.project_id=p.id')
                        ->where('ep.etudiant_id',$etudiant_id)
                        ->get()
                        ->result_array();    
    }
    public function getProjectForUpdate($project_id){
        $project = $this->db->select('*')
                          ->from('projects p')
                          ->where('p.id',$project_id)
                          ->get()
                          ->row_array(); 
        if(!$project){
            return null;
        }
        $pieces_jointes = $this->db
                            ->select('*')
                            ->from('pieces_jointes')  
                            ->where('project_id',$project['id'])
                            ->get()
                            ->result_array(); 
        $exitant_domaines = $this->db
                                 ->select('domaine_id')
                                 ->from('projects_domaines')
                                 ->where('project_id',$project_id)
                                 ->get()
                                 ->result_array();
        $existant_domaines_ids = array();
        foreach($exitant_domaines as $e){
            $existant_domaines_ids[]=$e['domaine_id'];
        }    
        return [
            'project'=>$project,
            'existing_domaines'=>$existant_domaines_ids,
            'pieces_jointes'=>$pieces_jointes
        ];                                            
    }
    public function deletePiecesJointes($id){
        return $this->db
             ->where('id',$id)
             ->delete('pieces_jointes');
    }
    public function deleteAllProjectDomaines($project_id){
        return $this->db
                    ->where('project_id',$project_id)
                    ->delete('projects_domaines');    
    }
    public function updateProject($id_project,$id_etudiant,$update_data){
        return $this->db
                    ->where('id',$id_project)
                    ->where('etudiant_id',$id_etudiant)
                    ->update('projects',$update_data);    
    }
    public function getPiecesJointesParProject($id_project){
        return $this->db->select('*')
                        ->where('project_id',$id_project)
                        ->from('pieces_jointes')
                        ->get()
                        ->result_array();
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
    public function getEnseignantsAffectes($connectedTeacherId)
    {
        $this->db->select('enseignant.id,enseignant.nom,enseignant.email, enseignant.prenom, tuteur_projet.date_envoi,tuteur_projet.acceptation_status,tuteur_projet.status,tuteur_projet.rapport,tuteur_projet.id as id_es, group_concat(d.nom separator " | ") as domaines');
        $this->db->from('tuteur_projet');
        $this->db->join('enseignant', 'tuteur_projet.id_tuteur = enseignant.id','left');
        $this->db->join('tuteur_domaine td', 'enseignant.id=td.id_tuteur');
        $this->db->join('domaine d', 'td.id_domaine=d.id');
        $this->db->group_by('enseignant.id');
        $this->db->where('tuteur_projet.id_projet', $connectedTeacherId);

        $query = $this->db->get();
        return $query->result_array();
    }

    public function getTuteur($role = '')
    {
        // Start building the query
        $this->db->select('e.*, group_concat(d.nom separator " | ") as domaines');
        $this->db->from('enseignant e');
        $this->db->join('users u', 'u.enseignant_id = e.id');
        $this->db->join('tuteur_domaine td', 'e.id=td.id_tuteur');
        $this->db->join('domaine d', 'td.id_domaine=d.id');
        $this->db->group_by('e.id');

        // Apply the 'role' condition only if a role is specified
        if (!empty($role)) {
            $this->db->where('e.role', $role);
        }
    
        // Execute the query
        $query = $this->db->get();
    
        // Return the result as an array
        return $query->result_array();
    }
    

    public function affecterTuteur($module_id, $enseignant_id)
    {
        // Vérifier si le tuteur est déjà affecté à ce projet
       
        $project = $this->getProjet($module_id);
        
        $existingAssignment = $this->db->where('id_projet',$module_id)->where('id_tuteur', $enseignant_id)->get('tuteur_projet')->row_array();

        if (!$existingAssignment) {
            // Mettre à jour le projet avec l'ID du tuteur
            $this->db->where('id', $module_id);
            $this->db->update('projects', array('id_tuteur' => $enseignant_id , 'affecte' => 1));

            // Insérer l'affectation dans la table tuteur_projet
            $data = array(
                'id_projet' => $module_id,
                'id_tuteur' => $enseignant_id,
                'date_envoi' => date('Y-m-d H:i:s'),
                'status'=>0,
                'acceptation_status'=>0
                 // Add the current date and time

            );
            if($project['niveau']=='initiateur'){
                $this->db->where('id_projet',$module_id)->update('seance_initiateur',['id_tuteur'=>$enseignant_id]);
            }
            if($project['niveau']=='innovateur'){
                $this->db->where('id_projet',$module_id)->update('seance_innovateur',['id_tuteur'=>$enseignant_id]);
            }
           return  $this->db->insert('tuteur_projet', $data);
        }
        else{
            return false;
        }
    }

    public function getIntervenantById($intervenant_id)
    {
        $this->db->select('nom, prenom,email');
        $this->db->from('enseignant');
        $this->db->where('id', $intervenant_id);

        $query = $this->db->get();
        return $query->row_array();
    }

    public function verifierAffectation($module_id, $id_enseignant)
    {
        // Effectuez la vérification en utilisant la base de données ou d'autres méthodes
        // Retournez true si le tuteur est déjà affecté, sinon retournez false
        $estDejaAffecte = $this->db->where('id_projet', $module_id)
            ->where('id_tuteur', $id_enseignant)
            ->get('tuteur_projet')
            ->num_rows() > 0;

        return $estDejaAffecte;
    }
    public function createEchange($echange,$type){
        if($type=='initiateur'){
            return $this->db->insert('echanges',$echange);
        }
        else if($type=='innovateur'){
            return $this->db->insert('echanges_innovateur',$echange);
        }
        else if($type=='promoteur'){
            return $this->db->insert('echanges_promoteur',$echange);
        }
       
        
    }
    public function fetchExchanges($seance_id,$type='initiateur'){
        if($type=='initiateur'){
            return  $this->db->select('e.id as id_teacher,DATE_FORMAT(ech.created_at, "%W le %d, %M")  as number_of_days,e.nom as nom_teacher,e.prenom as prenom_teacher,et.id as id_studient,et.nom as nom_student,et.prenom as prenom_student,u.photo as photo_student,ech.sender,ech.comment,ech.rapport')
            ->from('echanges ech')
            ->join('enseignant e','ech.enseignant_id=e.id','left')
            ->join('etudiants et','ech.etudiant_id=et.id','left')
            ->join('users u','ech.sender=u.id')
            ->where('ech.seance_id',$seance_id)
            ->order_by('ech.created_at','ASC')
            ->get()
            ->result_array();
        }
        else if($type=='innovateur'){
            return  $this->db->select('e.id as id_teacher,DATE_FORMAT(ech.created_at, "%W le %d, %M")  as number_of_days,e.nom as nom_teacher,e.prenom as prenom_teacher,et.id as id_studient,et.nom as nom_student,et.prenom as prenom_student,u.photo as photo_student,ech.sender,ech.comment,ech.rapport')
            ->from('echanges_innovateur ech')
            ->join('enseignant e','ech.enseignant_id=e.id','left')
            ->join('etudiants et','ech.etudiant_id=et.id','left')
            ->join('users u','ech.sender=u.id')
            ->where('ech.seance_id',$seance_id)
            ->order_by('ech.created_at','ASC')
            ->get()
            ->result_array();
        }
        else if($type=='promoteur'){
            return  $this->db->select('e.id as id_teacher,DATE_FORMAT(ech.created_at, "%W le %d, %M")  as number_of_days,e.nom as nom_teacher,e.prenom as prenom_teacher,et.id as id_studient,et.nom as nom_student,et.prenom as prenom_student,u.photo as photo_student,ech.sender,ech.comment,ech.rapport')
            ->from('echanges_promoteur ech')
            ->join('enseignant e','ech.enseignant_id=e.id','left')
            ->join('etudiants et','ech.etudiant_id=et.id','left')
            ->join('users u','ech.sender=u.id')
            ->where('ech.seance_id',$seance_id)
            ->order_by('ech.created_at','ASC')
            ->get()
            ->result_array();
        }
      
    }
    public function getProjectForGrille($project_id){
        $project = $this->findProjectParId($project_id);
        if($project){
           $etudiant =  $this->db
                             ->select('*')
                             ->from('projects')
                                ->where('id',intval($project_id))
                             ->get()
                             ->row_array();
            if(!$etudiant){
                return null;
            }
            return [
                'project'=>$project,
             
            ];
        }
        else{
            return null;
        }


    }
    public function findProjectParId($project_id){
        return $this->db->select('*')
                        ->from('projects')
                        ->where('id',intval($project_id))
                        ->get()
                        ->row_array();

    }
    public function findProjectForExchange($project_id){
        return $this->db->select('*')
                        ->from('projects')
                        ->where('id',intval($project_id))
                        ->get()
                        ->row_array();
    }
    public function getProjectsAffectesEnsignants($id_enseignant){
        return $this->db->select('p.*')
                 ->from('tuteur_projet tp')
                 ->join('projects p','tp.id_projet=p.id')
                 ->where('tp.id_tuteur',$id_enseignant)
                 ->get()
                 ->result_array();
    }
    public function getTutteursAffecte($id_project){
        return $this->db->select('e.*,u.photo,datediff(date(CURRENT_DATE),date(date_envoi)) as number_of_days')
                 ->from('tuteur_projet tp')
                 ->join('enseignant e','tp.id_tuteur=e.id')
                 ->join('users u','e.id=u.enseignant_id')
                 ->where('tp.id_projet',$id_project)
                 ->get()
                 ->result_array();


    }
    

    public function remindEnseignant($id_es){
        return $this->db->select('enseignant.email')
            ->from('tuteur_projet')
            ->join('enseignant', 'tuteur_projet.id_tuteur = enseignant.id')
            ->where('tuteur_projet.id='.$id_es)
            ->get()->row_array();
    }
    
    public function removeEnseignantFromList($id_es){
        $row = $this->db->select('id,id_projet')->from('tuteur_projet')->where('id='. $id_es)->get()->row_array();
        if($row){
            $query =  $this->db->delete('tuteur_projet',array('id'=>$id_es));
            if($query){
                $submissions_affected = $this->db->select('*')->where('id_projet='.$row['id_projet'])->get('tuteur_projet')->result_array();
                if(!count($submissions_affected)){
                     $this->db->where('id='.$row['id_projet'])->update('projects',['affecte'=>false]);
                }
            }   
            else{
                return ['success'=>false,'message'=>'Échec de l\'opération, veuillez réessayer'];
            }
        }
        else{
            return ['success'=>false,'message'=>'on ne peut pas trouver cet élément'];
        }
        return ['success'=>true,'message'=>'Opération réussie'];
       
    }
    
    public function publishProjet(){
        $id_projet = $this->input->post("id");
        $publish_level = $this->input->post('publish_level');
        return $this->db->where('id',$id_projet)->update('projects',[
            'is_finished'     => $publish_level, 
            'date_finition' => date('Y-m-d')
        ]);
    }
    public function getEtudiantById($etudiant_id){
        return $this->db->select('e.*,et.nom as etablissement')
                         ->from('etudiants e')
                         ->join('etablissements et','e.etablissement_id=et.id')
                         ->where('e.id',$etudiant_id)
                         ->get()
                         ->row_array();


    }
    public function getEnseignantById($enseignant_id){
        return $this->db->select('*')
                         ->from('enseignant')
                         ->where('id',$enseignant_id)
                         ->get()
                         ->row_array();


    }
    
    public function acceptProject($projectId,$tutteurId){
        $project_tutteur = $this->db
                         ->where('id_tuteur',$tutteurId)   
            ->where('id_projet',$projectId)
            ->get('tuteur_projet')
            ->row_array();
            if(!$project_tutteur){
                $attr= $this->db
                     ->where('id',$projectId)
                     ->update('projects',[
                        'affecte'=>true
                     ]);
                 if($attr){
                    return $this->db
                    ->insert('tuteur_projet',[
                        'id_tuteur'=>$tutteurId,
                        'id_projet'=>$projectId,
                        'status'=>true,
                        'date_envoi'=>date("Y-m-d H:i:s")
                    ]);
                 }     
                 else{
                    return false;
                 }      
               
            }
            else{
                return false;
            }
    }
    public function createCacheUser($inserted_data){
        return $this->db->insert('cache_users',$inserted_data);


    }
    public function deleteCacheUser($user_id,$etudiantId){
        return $this->db
                    ->where('id',$user_id)
                    ->where('addedBy',$etudiantId)
                    ->delete('cache_users');

    }
    public function deleteAllCacheUsers($id_appel,$etudiantId){
        return $this->db
                    ->where('appel_id',$id_appel)
                    ->where('addedBy',$etudiantId)
                    ->delete('cache_users');
    }
    public function getStudentCacheUsers($appel_id,$etudiant_id){
        return $this->db
                    ->select('*')
                    ->from('cache_users')
                    ->where('appel_id',$appel_id)
                    ->where('addedBy',$etudiant_id)
                    ->get()
                    ->result_array();
    }
    private function generateRandomNumber(){
        return rand(10000000,99999999);
    }
    private function createEtudiantFromMember($member){
        $cin_etudiant = $this->generateRandomNumber();
        $password = $this->generateRandomNumber();
        $etudiant = $this->db->insert('etudiants',[
            'nom'=>$member['nom'],
            'prenom'=>$member['prenom'],
            'etablissement_id'=>$member['etablissement_id'],
            'cin'=>$cin_etudiant,
            'email'=>$member['email'],
            'phone'=>$member['phone'],
            'ville'=>'aucun',
            'adresse'=>'aucun',
            'niveau'=>$member['niveau']
        ]);
        if(!$etudiant){

            return false;
        }
        $insert_id = $this->db->insert_id();
        $user =  [
            'username'=>$cin_etudiant,
            'password'=>$password,
            'type'=>'Etudiant',
            'etudiant_id'=>$insert_id

        ];
        $this->db->insert('users',$user);
        $this->sendMailToMember($member['email'],$cin_etudiant,$password);
        return $insert_id;
    }
    public function createInscriptions($inscriptions){
        return $this->db
            ->insert_batch('inscriptions',$inscriptions);

    }
    public function createProjetMember($id_appel,$etudiant_id ,$project_id,$prime_member){
        $inscriptions = array();
        $inscriptions[]= [
            'etudiant_id'=>$etudiant_id,
            'appel_id'=>$id_appel
        ];
        $cacheMembers = $this->db
                    ->select('*')
                    ->from('cache_users')
                    ->where('appel_id',$id_appel)
                    ->where('addedBy',$etudiant_id)
                    ->get()
                    ->result_array();
       $members =array(); 
       foreach($cacheMembers as $c){
        	$etudiantId = $this->createEtudiantFromMember($c);	    
            $members[]=[
                'etudiant_id'=>$etudiantId,
                'project_id'=>$project_id,
                'cv'=>$c['cv'],
                'old_promotion'=>$c['old_promotion'],
                'old_niveau'=>$c['old_niveau'],
                'porteur_project'=>false
            ];
            $inscriptions[]=[
                'etudiant_id'=>$etudiantId,
                'appel_id'=>$id_appel
            ];

       }           
       $members[]=$prime_member; 
       $created =  $this->db->insert_batch('etudiants_projetcs',$members);
       $this->createInscriptions($inscriptions);
       if(!$created){
        return false;
       }
       else{
            $this->deleteAllCacheUsers($id_appel,$etudiant_id);
       }
       return true;

    }
    public function sendMailToMember($email,$username,$password){
                $this->load->library('email');
				$config = array(

					$config['protocol'] = 'smtp',

					$config['smtp_host'] = 'ssl://smtp.gmail.com',

					$config['smtp_port'] = '465',

					$config['smtp_user'] = 'raniay089@gmail.com',

					$config['smtp_pass'] = 'raniaismine',

					$config['mailtype'] = 'html', // or 'text'

					$config['charset'] = 'utf-8',

					//$config['wordwrap'] = TRUE, //No quotes required

					$config['newline'] = "\r\n", //Double quotes required

					$config['validation'] = TRUE,

				);
				$html_content = "<html><body style='text-align:center;font-family: Arial, sans-serif;'>
				<p style='font-weight:bold;font-size:18px;'>INSCRIPTION</p>
				<p>Bonjour  $username ,</p>
				<p>Votre compte a été créer sur la plateforme des cas.</p>
				<p> Utilisez le Nom d\'Utilisateur et le Mot de Passe ci-dessous pour vous connecter <a href='".base_url()."'> à la plateforme des cas :</a></p>
				<p style='font-weight:bold;'>Nom d\'Utilisateur :  $username </p>

				<p style='font-weight:bold;'>Mot de passe :  $password </p>

				<p><a href='".base_url()."'>Cliquez ici pour accéder à la plateforme</a></p>
				</body></html>
			";

             

				// $html_content .= "test";



				$mail_data = $html_content;

				$this->email->initialize($config);

				$this->email->set_mailtype("html");

				$this->email->set_newline("\r\n");

				$this->email->from('PEESO');

				$this->email->to($email);

				$this->email->subject('Votre compte PEESO');

				$this->email->message($mail_data);

				$this->email->attach("");

				return $this->email->send();
                


    }
    public function findCertificatBy($critere){
        $query = $this->db->select('*')
                          ->from('certificats');
        if(isset($critere['id']) &&$critere['id'] ){
            $query =$query->where('id',intval($critere['id']));
        }
        if(isset($critere['nom']) && $critere['nom']){
            $query =$query->where('nom',intval($critere['nom']));
        }
        if(isset($critere['etudiant_id']) && $critere['etudiant_id']){
            $query =$query->where('etudiant_id',intval($critere['etudiant_id']));
        }
        return $query->get()->row_array();
    }
  
    public function findParcoursBy($critere){
        $query = $this->db->select('*')
                          ->from('parcours');
        if(isset($critere['id']) &&$critere['id'] ){
            $query =$query->where('id',intval($critere['id']));
        }
        if(isset($critere['etablissement_id']) && $critere['etablissement_id']){
            $query =$query->where('etablissement_id',intval($critere['etablissement_id']));
        }
        if(isset($critere['etudiant_id']) && $critere['etudiant_id']){
            $query =$query->where('etudiant_id',intval($critere['etudiant_id']));
        }
        return $query->get()->row_array();
    }
    public function findFormationBy($critere){
        $query = $this->db->select('*')
                          ->from('formations');
        if(isset($critere['id']) &&$critere['id'] ){
            $query =$query->where('id',intval($critere['id']));
        }
        if(isset($critere['nom']) && $critere['nom']){
            $query =$query->where('nom',$critere['nom']);
        }
        if(isset($critere['etudiant_id']) && $critere['etudiant_id']){
            $query =$query->where('etudiant_id',intval($critere['etudiant_id']));
        }
        return $query->get()->row_array();
    }
    public function findLanguesBy($critere){
        $query = $this->db->select('*')
                          ->from('langues');
        if(isset($critere['id']) &&$critere['id'] ){
            $query =$query->where('id',intval($critere['id']));
        }
        if(isset($critere['nom']) && $critere['nom']){
            $query =$query->where('nom',$critere['nom']);
        }
        if(isset($critere['etudiant_id']) && $critere['etudiant_id']){
            $query =$query->where('etudiant_id',intval($critere['etudiant_id']));
        }
        return $query->get()->row_array();
    }

    public function getParcoursEtudiant($id_etudiant){
        $critere = [
            'etudiant_id'=>$id_etudiant
        ];
        $parcours = $this->findParcoursBy($critere);
        $langues = $this->findLanguesBy($critere);
        $certificats = $this->findCertificatBy($critere);
        $formations = $this->findFormationBy($critere);
        return [
            'parcours'=>$parcours,
            'langues'=>$langues,
            'certificats'=>$certificats,
            'formations'=>$formations
        ];    

    }
    public function getProjetsNonAffecte(){
        return $this->db
             ->select('p.*,group_concat(proj_dom.nom separator ",") as domaine_names')
             ->from('projects p')
             ->join('(select pd.domaine_id,pd.project_id,d.* from 2024_projects_domaines pd inner join 2024_domaine d on pd.domaine_id=d.id) proj_dom','proj_dom.project_id=p.id','left')
             ->group_by('p.id')
             ->where('p.affecte',false)
             ->get()
             ->result_array();   
        



    }
    public function getProjetsNonAffecteValide(){
        return $this->db
             ->select('p.*,group_concat(proj_dom.nom separator ",") as domaine_names')
             ->from('projects p')
             ->join('(select pd.domaine_id,pd.project_id,d.* from 2024_projects_domaines pd inner join 2024_domaine d on pd.domaine_id=d.id) proj_dom','proj_dom.project_id=p.id','left')
             ->group_by('p.id')
             ->where('p.niveau','en_attente')
             ->where('p.1er_validation', true)
             ->get()
             ->result_array();   
    }
    public function getProjectsNonEffectue($niveau,$etablissmentId){
        return $this->db
        ->select('p.*,group_concat(proj_dom.nom separator ",") as domaine_names')
        ->from('projects p')
        ->join('(select pd.domaine_id,pd.project_id,d.* from 2024_projects_domaines pd inner join 2024_domaine d on pd.domaine_id=d.id) proj_dom','proj_dom.project_id=p.id','left')
        ->join('etudiants etud','p.etudiant_id=etud.id')
        ->group_by('p.id')
        ->where('p.affecte',false)
        ->where('etud.etablissement_id',$etablissmentId)
        ->where('p.niveau',$niveau)
        ->get()
        ->result_array();  


    }

    public function getProjectsNonEffectueAdmin($niveau){
        return $this->db
        ->select('p.*,group_concat(proj_dom.nom separator ",") as domaine_names')
        ->from('projects p')
        ->join('(select pd.domaine_id,pd.project_id,d.* from 2024_projects_domaines pd inner join 2024_domaine d on pd.domaine_id=d.id) proj_dom','proj_dom.project_id=p.id','left')
        ->join('etudiants etud','p.etudiant_id=etud.id')
        ->group_by('p.id')
        ->where('p.affecte',false)
        ->where('p.niveau',$niveau)
        ->get()
        ->result_array();  


    }
    public function getProjectEffectue($niveau,$enseignantId){
        return $this->db
                    ->select('p.*')
                    ->from('tuteur_projet tp')
                    ->join('projects p','tp.id_projet=p.id')
                    ->where('tp.id_tuteur',$enseignantId)
                    ->where('p.niveau',$niveau)
                    ->get()
                    ->result_array();


    }
    
    public function getGrille($project_id,$etudiantId){
        return $this->db
                    ->select('ge.*,e.nom as nom_ref, e.prenom as prenom_ref,p.titre as nom_project,p.isGroup,et.nom as nom_etud,et.prenom as prenom_etud,etab.nom as etablissement')
                    ->from('grille_evaluation ge')
                    ->join('enseignant e','ge.id_enseignant=e.id')
                    ->join('projects p','ge.id_projet=p.id')
                    ->join('etudiants et','ge.id_etudiant=et.id')
                    ->join('etablissements etab','et.etablissement_id=etab.id')
                    ->where('ge.id_projet',$project_id)
                    ->where('ge.id_etudiant',$etudiantId)
                    ->get()
                    ->row_array();



    }
    public  function getEtudiantWithEstablishment($etudiantId){
        return $this->db->select('e.*,etab.nom as etablissement')->from('etudiants e')
                                     ->join('etablissements etab','e.etablissement_id=etab.id')   

                                      ->where('e.id',$etudiantId)->get()->row_array();

    }
    public function getSeanceForFicheAccompagnement($seance_id,$etudiant_id){
        $etudiant = $this->getEtudiantWithEstablishment($etudiant_id);
       
        if(!$etudiant){
            return null;
        }
        $seance =  $this->db->select('s.*,date(s.date) as date_seance,hour(s.date) as horaire_seance,as.num as numero_seance,p.titre as nom_project,group_concat(r.nom separator ",") as requete')->from('seance_initiateur s')
                                        ->join('attribution_seance_initiateur as','s.id_attribution_seance=as.id')
                                        ->join('projects p','s.id_projet=p.id')
                                        ->join('requetes_initiateur r','s.id_attribution_seance=r.id_attribution_seance','left')
                                        ->group_by('s.id_attribution_seance')
                                        ->where('s.id',$seance_id)
                                         ->get()->row_array();
        $livrables = $this->db->select('*')->from('livrable_initiateur')->where('seance_id',$seance_id)->get()->result_array();
        if(!$seance){
            return null;
        }
        $refrent = $this->getTutteursAffecte($seance['id_projet'])[0];
        if(!$refrent){
            return null;
        }
        $deroulement = $this->db->select('ad.nom,ad.id,d.status')->from('deroulement d')->join('attribution_deroulement_initiateur ad','d.id_attribution_deroulement=ad.id')
                                                                    ->where('d.id_projet',$seance['id_projet'])->where('ad.id_attribution_seance',$seance['id_attribution_seance'])
                                                                    ->get()
                                                                    ->result_array();
        return [
            'etudiant'=>$etudiant,
            'seance'=>$seance,
            'deroulements'=>$deroulement,
            'referent'=>$refrent,
            'livrables'=>$livrables
        ];

    }
    public function getSeanceInnovateurForFicheAccompagnement($seance_id,$etudiant_id){
        $etudiant = $this->getEtudiantWithEstablishment($etudiant_id);
       
        if(!$etudiant){
            return null;
        }
        $seance =  $this->db->select('s.*,as.num as numero_seance,p.titre as nom_project')->from('seance_innovateur s')
                                        ->join('attribution_seance_innovateur as','s.id_attribution_seance=as.id')
                                        ->join('projects p','s.id_projet=p.id')
                                        ->where('s.id',$seance_id)
                                         ->get()->row_array();
        if(!$seance){
            return null;
        }
        $refrent = $this->getTutteursAffecte($seance['id_projet'])[0];
        if(!$refrent){
            return null;
        }
        $deroulement = $this->db->select('ad.nom,ad.id,d.status')->from('deroulement_innovateur d')->join('attribution_deroulement_innovateur ad','d.id_attribution_deroulement=ad.id')
                                                                    ->where('d.id_projet',$seance['id_projet'])->where('ad.id_attribution_seance',$seance['id_attribution_seance'])
                                                                    ->get()
                                                                    ->result_array();
        return [
            'etudiant'=>$etudiant,
            'seance'=>$seance,
            'deroulements'=>$deroulement,
            'referent'=>$refrent
        ];

    }
    public function getSeancePromoteurForFicheAccompagnement($seance_id,$etudiant_id){
        $etudiant = $this->getEtudiantWithEstablishment($etudiant_id);
       
        if(!$etudiant){
            return null;
        }
        $seance =  $this->db->select('s.*,as.num as numero_seance,p.titre as nom_project')->from('seance_promoteur s')
                                        ->join('attribution_seance_promoteur as','s.id_attribution_seance=as.id')
                                        ->join('projects p','s.id_projet=p.id')
                                        ->where('s.id',$seance_id)
                                         ->get()->row_array();
        if(!$seance){
            return null;
        }
        $refrent = $this->getTutteursAffecte($seance['id_projet'])[0];
        if(!$refrent){
            return null;
        }
        $deroulement = $this->db->select('ad.nom,ad.id,d.status')->from('deroulement_promoteur d')->join('attribution_deroulement_promoteur ad','d.id_attribution_deroulement=ad.id')
                                                                    ->where('d.id_projet',$seance['id_projet'])->where('ad.id_attribution_seance',$seance['id_attribution_seance'])
                                                                    ->get()
                                                                    ->result_array();
        return [
            'etudiant'=>$etudiant,
            'seance'=>$seance,
            'deroulements'=>$deroulement,
            'referent'=>$refrent
        ];

    }
    public function getSeancesForFicheSuivie($project_id,$etudiantId){
        $etudiant = $this->getEtudiantWithEstablishment($etudiantId);
        
        if(!$etudiant){
            return null;
        }
        $seances =  $this->db->select('s.*,date(s.date) as date_seance,hour(s.date) as horaire_seance,as.num as numero_seance,p.titre as nom_project, se.signature as signature_etudiant,se.id_etudiant ')->from('seance_initiateur s')
                                        ->join('attribution_seance_initiateur as','s.id_attribution_seance=as.id')
                                        ->join('projects p','s.id_projet=p.id')
                                        ->join('signature_etudiant se', 's.id=se.id_seance')
                                        ->where('se.id_etudiant',$etudiantId)
                                        ->order_by('as.num','ASC')
                                        ->where('as.seance_parent is null')
                                        ->where('s.id_projet',$project_id)
                                         ->get()->result_array();
        $project = [
            'titre'=>$seances[0]['nom_project']
        ];
        $refrent = $this->getTutteursAffecte($project_id)[0];
        if(!$refrent){
            return null;
        }
        return [
            'etudiant'=>$etudiant,
            'seances'=>$seances,
            'project'=>$project,
            'referent'=>$refrent
        ];


    }
    public function getSeancesForFicheSuivieInnovateur($project_id,$etudiantId){
        $etudiant = $this->getEtudiantWithEstablishment($etudiantId);
        
        if(!$etudiant){
            return null;
        }
        $seances =  $this->db->select('s.*,date(s.date) as date_seance,hour(s.date) as horaire_seance,as.num as numero_seance,p.titre as nom_project, se.signature as signature_etudiant,se.id_etudiant ')
                                        ->from('seance_innovateur s')
                                        ->join('attribution_seance_innovateur as','s.id_attribution_seance=as.id')
                                        ->join('projects p','s.id_projet=p.id')
                                        ->join('signature_etudiant_innovateur se', 's.id=se.id_seance')
                                        ->where('se.id_etudiant',$etudiantId)
                                        ->order_by('as.num','ASC')
                                       
                                        ->where('s.id_projet',$project_id)
                                         ->get()->result_array();
        $project = [
            'titre'=>$seances[0]['nom_project']
        ];
        $refrent = $this->getTutteursAffecte($project_id)[0];
        if(!$refrent){
            return null;
        }
        return [
            'etudiant'=>$etudiant,
            'seances'=>$seances,
            'project'=>$project,
            'referent'=>$refrent
        ];


    }
    public function getDataForFicheSuivieExcelForEnseignant($enseignantId){
        //$projects = $this->getProjectsAffectesEnsignants();


    }
    public function getSeancesProject($projectIds){
        return $this->db->select('s.*,as.num as numero_seance')
                        ->from('seance_initiateur s')
                        ->join('attribution_seance_initiateur as','s.id_attribution_seance=as.id')
                        ->where_in('s.id_projet',$projectIds)
                        ->order_by('as.num','ASC')
                        ->get()
                        ->result_array()
                        ;


    }
    public function getDataForFicheSuivieForProject($projectId){
        $etudiants = $this->getMembresProject($projectId);
        $seancesPhases = $this->getphasesWithSeances();
        $seances = $this->getSeancesProject(array($projectId));
        $observation = array();
        foreach($seances as $s){
            $observation[$s['numero_seance']] = $s['observation'];
        }
        return [
                'etudiant'=>$etudiants,
                'oberservations'=>$observation,
                'seances'=>$seancesPhases
        ] ;
    }
    public function getphasesWithSeances(){
       $phases = $this->db
             ->select('*')
             ->from('phases_initiateur')
              ->order_by('num','ASC')  
             ->get()
             ->result_array()       ;
        $seances = $this->db->select('*')
                            ->from('attribution_seance_initiateur')
                            ->order_by('num','ASC')
                            ->get()
                            ->result_array();
       return  [
            'phases'=>$phases,
            'seances'=>$seances
        ];
    }


    
    public function validateProjet($id){
        $update_data = array(
            '1er_validation' => 1
        );

        return $this->db->where('id',$id)->update('projects',$update_data);    
    }

    public function fetchCommite(){
        return $this->db->select('p.*, etab.nom as nom_etab')
                        ->from('projects p')
                        ->join('etudiants e', 'p.etudiant_id = e.id')
                        ->join('etablissements etab', 'e.etablissement_id = etab.id')
                        
                        ->get()
                        ->result_array();    
    }
    public function fetchCommiteByDate($date){
        return $this->db->select('p.*, etab.nom as nom_etab')
                        ->from('projects p')
                        ->join('etudiants e', 'p.etudiant_id = e.id')
                        ->join('etablissements etab', 'e.etablissement_id = etab.id')
                         
                        ->get()
                        ->result_array();    
    }

    public function getAllReferents(){
        return $this->db->select('*')->from('enseignant')->get()->result_array();
    }
    public function inviteComite($batchInsertData){
        return $this->db->insert_batch('comite_rende_vous', $batchInsertData);
    }

    public function fetchComiteRendezVous(){
        return $this->db->select('crv.*, p.titre, etab.nom as nom_etab')
                        ->from('comite_rende_vous crv')
                        ->join('projects p', 'crv.id_projet = p.id')
                        ->join('etudiants e', 'p.etudiant_id = e.id')
                        ->join('etablissements etab', 'e.etablissement_id = etab.id')
                        ->get()
                        ->result_array();    
    }
    public function fetchComiteRendezVousByDate($date,$etablissement){
        if(!$etablissement){
                return $this->db->select('crv.*, p.titre, etab.nom as nom_etab')
                ->where('date(crv.date_comite)',$date)
                ->from('comite_rende_vous crv')
                ->join('projects p', 'crv.id_projet = p.id')
                ->join('etudiants e', 'p.etudiant_id = e.id')
                ->join('etablissements etab', 'e.etablissement_id = etab.id')
                ->get()
                ->result_array();      
        }
        else{
            return $this->db->select('crv.*, p.titre, etab.nom as nom_etab')
            ->where('date(crv.date_comite)',$date)
            ->from('comite_rende_vous crv')
            ->join('projects p', 'crv.id_projet = p.id')
            ->join('etudiants e', 'p.etudiant_id = e.id')
            ->join('etablissements etab', 'e.etablissement_id = etab.id')
            ->where('e.etablissement_id',intval($etablissement))
            ->get()
            ->result_array();     
        }
        
    }
    public function getProjectEffectueAdmin($niveau, $referent_id = null) {
        $this->db->select('p.*')
                 ->from('tuteur_projet tp')
                 ->join('projects p','tp.id_projet=p.id')
                 ->where('p.niveau', $niveau);
    
        // Apply referent_id filter if provided
        if ($referent_id) {
            $this->db->where('tp.id_tuteur', $referent_id); // Adjust field name if needed
        }
    
        return $this->db->get()->result_array();
    }


}
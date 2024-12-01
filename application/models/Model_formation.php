<?php







class Model_formation extends CI_Model
{



    public function __construct()
    {
        parent::__construct();
    }
    public function createFormation($formation){
        $created =  $this->db->insert('formations',$formation);
        if(!$created){
            return false;
        }

        $students = $this->input->post('students');
        $nb_seance = intval($this->input->post('nb_seance'));
       
        $insert_id = $this->db->insert_id();
        if(count($students)){
            $student_formations = array();
            foreach($students as $s){
                $student_formations[]=[
                    'formation_id'=>$insert_id,
                    'student_id'=>$s
                ];
           }
           $created =  $this->db->insert_batch('formations_students',$student_formations);
           if(!$created){
            return false;

           }
        }

        $seances = array();
        for($i=1;$i<=$nb_seance;$i++){
            $seances[] = [
                'nom'=>$this->input->post('nom_seance_'.$i),
                'date_debut'=>$this->input->post('date_debut_seance_'.$i),
                'date_fin'=>$this->input->post('date_fin_seance_'.$i),
                'formation_id'=>$insert_id,
                'ordre'=>$i
            ];

        }
        if(count($seances)){
            $created =  $this->db->insert_batch('seances',$seances);
            if(!$created){
                return false;
            }
            return $this->db->where('id',$insert_id)->update('formations',[
                'nb_seance'=>$nb_seance
            ]);
        }
        else{
            return true;
        }
        
    }
    
    public function fetchFormationData(){
        return  $this->db->select('f.*,concat(e.nom,e.prenom) as formateur')
                  ->from('formations f')
                  ->join('enseignant e','f.referent_id=e.id')
                  ->get()
                  ->result_array()  
                    ;       
    }
    public function fetchFormationDataDept($dept_id){
        return  $this->db->select('f.*,concat(e.nom,e.prenom) as formateur')
                  ->from('formations f')
                  ->join('enseignant e','f.referent_id=e.id')
                  ->where('f.etab_id', $dept_id)
                  ->get()
                  ->result_array()  
                    ;       
    }
    
    public function updateFormation($id,$formation){
        $updated = $this->db->where('id',$id)->update('formations',$formation);
        if(!$updated){
           return false;
       }
        else{
            $etudiants = $this->input->post('students');
            if(count($etudiants)){
                $deleted = $this->db->where('formation_id',$id)->delete('formations_students');
              
                $etudiants_formations=array();
                foreach($etudiants as $s){
                    $etudiants_formations[]=[
                        'formation_id'=>$id,
                        'student_id'=>$s
                    ];
                }
                return $this->db->insert_batch('formations_students',$etudiants_formations);
            }
            else{
                return true;
            }
         }
    }
    public function getAllStudents(){
       return  $this->db->select('*')
                         ->from('etudiants e')
                         ->get()  
                         ->result_array();


    }
    public function createGroup(){


    }
    public function groupeInvitation($studentIds,$formationId){
        $group_created= $this->db->insert('groupes',['nbre_membres'=>count($studentIds)]);
        $group_id = $this->db->insert_id();
        $student_groups = array();
        if(!$group_created){
            return false;
        }
        foreach($studentIds as $s){
            $student_groups[] = [
                'etudiant_id'=>$s,
                'groupe_id'=>$group_id
            ];
        }
        $created = $this->db->insert_batch('etudiants_groupes',$student_groups);
        if(!$created){
            return false;
        }
        return $this->db->insert('formations_groupes',[
            'groupe_id'=>$group_id,
            'formation_id'=>$formationId
        ]);
    }
    
    public function individualInvitation($studentIds,$formationId){
        $student_groups = array();
        $formations_groups = array();
        foreach($studentIds as $s){
                $group_created = $this->db->insert('groupes',['nbre_membres'=>1]);
                if(!$group_created){
                    return false;
                }
                $group_id = $this->db->insert_id();
                $student_groups[]=[
                    'etudiant_id'=>$s,
                    'groupe_id'=>$group_id
                ];
                $formations_groups[]=[
                    'groupe_id'=>$group_id,
                    'formation_id'=>$formationId
                ];
        }
        $created = $this->db->insert_batch('etudiants_groupes',$student_groups);
        if(!$created){
            return false;
        }
        return $this->db->insert_batch('formations_groupes',$formations_groups);
        
    }
    public function inviteStudents($formationId,$inviteType){
        $students = $this->input->post('students');
       
        $studentIds= array();
        foreach($students as $s){
           
            $studentIds[]=intval($s);
        }
        
        $updated = $this->db->where('formation_id',intval($formationId))->where_in('etudiant_id',$studentIds)->update('demandes_formation',[
            'accepted'=>true
        ]);
        if($inviteType=='indiv'){
            return $this->individualInvitation($studentIds,$formationId);
        }
        else{
            return $this->groupeInvitation($studentIds,$formationId); 
        }
        
    }
   
    public function getStudentsEmails($studentIds){
        $emails= array();
        $etudiants_emails =  $this->db->select('email')->from('etudiants')->where_in('id',$studentIds)->get()->result_array();
        foreach($etudiants_emails as $e){

            $emails[]=$e['email'];
        }
        return $emails;
    }
    public function getStudentById($studentId){
        return $this->db->select('*')->from('etudiants')->where('id',$studentId)->get()->row_array();

    }
    public function getFormationById($id){

        return $this->db->select('*')->from('formations')->where('id',$id)->get()->row_array();


    }
    public function getFormation($id)
{
    $formation = $this->getFormationById($id);
    if ($formation) {
        $domaines = $this->db->select('*')->from('28_2024_domaine')->get();
        if (!$domaines) {
            log_message('error', 'Failed to fetch domaines: ' . $this->db->last_query());
            return null;
        }
        else{
            log_message('ok no error', 'domaines: ' . $this->db->last_query());
        }
        $domaines_ids = [];
        $formationDomaines = $this->db->select('*')->from('formations_domaines')->where('formation_id', $id)->get()->result_array();
        foreach ($formationDomaines as $r) {
            $domaines_ids[] = $r['domaine_id'];
        }
        return [
            'formation' => $formation,
            'domaine_ids' => $domaines_ids,
            'domaines' => $domaines->result_array()
        ];
    } else {
        return null;
    }
}
    public function getIninvitedStudents($formationId){
        $alreadyInvited = $this->db->select('eg.etudiant_id,fg.progression')
                                    ->from('etudiants_groupes eg')
                                    ->join('formations_groupes fg','eg.groupe_id=fg.groupe_id')
                                    ->where('fg.formation_id',$formationId)
                                    ->get()
                                    ->result_array();
        $alreadyInvitedIds = array();
        if(count($alreadyInvited)){
            foreach($alreadyInvited as $a){
                $alreadyInvitedIds[]=$a['etudiant_id'];
            }
        }
        $students = $this->db->select('*')->from('etudiants');
        if(count($alreadyInvitedIds)){
            return $students->where_not_in('id',$alreadyInvitedIds)->get()->result_array();
        }
        else{
            return $students->get()->result_array();
        }
        

    }
    private function countFormations($filter){
        $formation =   $this->db->select('count(*) as num_rows')
                                ->from('formations f');

        if(isset($filter['q']) && $filter['q']){
            $formation =  $formation->like('f.nom', $filter['q'], 'both');
        }
        $numberRows =  $formation->get()->row_array();
        return $numberRows['num_rows'];
    }
    public function getFormationStudent($filter,$etudiantId){
        $filter['limit']=10;
        $formation =   $this->db->select('f.*,DATEDIFF( f.date_fin, f.date_debut) as nb_jours,concat(e.nom,e.prenom) as formateur')
                  ->from('formations f')
                  ->join('enseignant e','f.referent_id=e.id');
                
        if(isset($filter['q']) && $filter['q']){
            $formation =  $formation->like('f.nom', $filter['q'], 'both');
        }
        $formation = $formation->limit($filter['limit'],(intval($filter['page'])-1)*$filter['limit'])->get()->result_array();
        return [
            'formations'=>$formation,
            'total'=>$this->countFormations($filter),
            'limit'=>$filter['limit'],
            'currentPage'=>$filter['page'],
            'formationInscrit'=>$this->getFormationInscrit($etudiantId),
            'demandes'=>$this->getFormationDemades($etudiantId)
        ];
    }
    public function getFormationInscrit($studentId): mixed{
        $formations_students =  $this->db->select('*')->from('formations_students')
                                                      ->where('student_id',$studentId)
                                                      ->get()          
                                                      ->result_array();
                                                      
        $formationIds = array();
        $formationprogress= array();
        foreach($formations_students as $f){
            $formationIds[] = $f['formation_id'];
            $formationprogress[$f['formation_id']] = [
                'progression'=>$f['progression'],
                
            ];
        }
        return [
            'formationIds'=>$formationIds,
            'progress'=>$formationprogress,
           
        ];
    }
    public function getFormationDemades($studentId): mixed{
        $formations_students =  $this->db->select('*')->from('demandes_formation')->where('etudiant_id',$studentId)->get()->result_array();
        $formationIds = array();
        foreach($formations_students as $f){
            $formationIds[] = $f['formation_id'];
        }
        return [
            'formationIds'=>$formationIds,
            
        ];
    }
    public function createDemandeFormation($demande){
        return $this->db->insert('demandes_formation',$demande);
    }
    public function fetchNotAcceptedDemandesFormation(){
        return $this->db->select('df.id as demande_id,e.*,f.nom as formation_name')
                         ->from('demandes_formation df')
                         ->join('etudiants e','df.etudiant_id=e.id')
                         ->join('formations f','df.formation_id=f.id')
                        ->where('df.accepted',false)
                         ->get()
                         ->result_array();


    }

    public function fetchNotAcceptedDemandesFormationDept($dept_id) {
        return $this->db->select('df.id as demande_id, e.*, f.nom as formation_name')
                        ->from('demandes_formation df')
                        ->join('etudiants e', 'df.etudiant_id = e.id')
                        ->join('formations f', 'df.formation_id = f.id')
                        ->where('df.accepted', false)
                        ->where('f.etab_id', $dept_id) // Add condition for etab_id
                        ->get()
                        ->result_array();
    }
    public function getAcceptedDemandesFormation(){
        return $this->db->select('df.id as demande_id,e.*,f.nom as formation_name')
        ->from('demandes_formation df')
        ->join('etudiants e','df.etudiant_id=e.id')
        ->join('formations f','df.formation_id=f.id')
       ->where('df.accepted',true)
        ->get()
        ->result_array();

    }
    public function getDemandeFormationById($demandeId){
        return $this->db->select('*')->from('demandes_formation')->where('id',$demandeId)->get()->row_array();
    }
    public function acceptDemande($demande_id){
        $demande = $this->getDemandeFormationById($demande_id);
        if($demande){
          $deleted = $this->db->where('id',$demande_id)->update('demandes_formation',[
            'accepted'=>true
          ]);
          return $this->db->insert('formations_students',[
            'formation_id'=>$demande['formation_id'],
            'student_id'=>$demande['etudiant_id']
          ]);

        }
        else{
            return false;
        }


    }
    public function getDemandeByStudent($studentId){
        return $this->db->select('df.accepted,f.*')
                         ->from('demandes_formation df')
                         ->join('formations f','df.formation_id=f.id')
                        ->where('df.etudiant_id',$studentId)
                         ->get()
                         ->result_array();


    }
    public function getDemandeForReferent($refrentId){
        return $this->db->select('df.id as demande_id,df.accepted,e.*,f.nom as formation_name')
                         ->from('demandes_formation df')
                         ->join('etudiants e','df.etudiant_id=e.id')
                         ->join('formations f','df.formation_id=f.id')
                        ->where('f.referent_id',$refrentId)
                         ->get()
                         ->result_array();


    }
    public function publishFormation($formationId){
           return $this->db->where('id',$formationId)->update('formations',[
                'publie'=>true
            ]);


    }
    public function affecterFormaionToRefrent($refrentId,$formationId){
        return $this->db->where('id',$formationId)->update('formations',[
            'referent_id'=>$refrentId,
            
        ]);
        
    }
    public function getRefrentById($refrentId){
        return $this->db->select('*')->from('enseignant')->where('id',$refrentId)->get()->row_array();

    }
    public function getDetailFormation($formationId){
            $formation =$this->getFormationById($formationId);
            $domaines = $this->db->select('d.*')->from('formations_domaines fd')->join('domaine d','fd.domaine_id=d.id')->where('fd.formation_id',$formationId)->get()->result_array();

            if(!$formation){
                return null;
            }
            $referent = null;
            if($formation['referent_id']){
                $referent = $this->getRefrentById($formation['referent_id']);
            }
            return [
                'referent'=>$referent,
                'formation'=>$formation,
                'domaines'=>$this->getDomainesWithColors($domaines)
            ];

    }
    private function getDomainesWithColors($domaines){
        $colors = array('#1EC902','#F2277E','#44CEA9');
        $domaines_with_colors= array();
        
        foreach($domaines as $d){
            $dom = $d;
            $dom['color']=$colors[rand(0,count($colors)-1)];
            $domaines_with_colors[]=$dom;
        }
        return $domaines_with_colors;

    }
    public function getAllReferents(){
        return $this->db->select('*')->from('enseignant')->get()->result_array();
    }
    public function getFormationForEnseignant($refrentId){
        return   $this->db->select('f.*,GROUP_CONCAT(d.nom separator ", ") as domaines')
                                ->from('formations f')
                                ->join('formations_domaines fd','f.id=fd.formation_id','left')
                                ->join('domaine d','fd.domaine_id=d.id','left')
                                ->where('f.referent_id',$refrentId)
                                ->group_by('f.id')
                                ->get()
                                ->result_array();


    }
    public function getGroupProgression($formationId){
        return $this->db->select('fg.id as progression_id,fg.progression,f.nom as formation_name,group_concat(concat(e.nom," ",e.prenom) SEPARATOR ",") as etudiant_names ,group_concat(case when u.photo is null then "default.jpg" else u.photo end   SEPARATOR ",") as etudiants_photos ')
                        ->from('formations_groupes fg')
                        ->join('formations f','fg.formation_id=f.id')
                        ->join('etudiants_groupes eg','fg.groupe_id=eg.groupe_id','left')
                        ->join('etudiants e','eg.etudiant_id=e.id')
                        ->join('users u','eg.etudiant_id=u.etudiant_id')
                        ->where('fg.formation_id',$formationId)
                        ->group_by('fg.groupe_id')
                        ->get()
                        ->result_array();
    }
    public function prepareProgressPage($formationId,$userRole,$referentId=null){
            $formation = $this->db
                              ->select('*')  
                              ->from('formations')  
                              ->where('id',$formationId)
                              ;    
            if($userRole=='Administrateur'){
                return $formation->get()->row_array();
            }
            else{
                return $formation->where('referent_id',$referentId)->get()->row_array();
            }
    }
    public function prepareParcoursPage($group_formation_id){
        $group_formation = $this->db->select('*')
                                    ->from('formations_groupes')
                                    ->where('id',$group_formation_id)
                                    ->get()
                                    ->row_array();
        if($group_formation){
            $details = $this->getDetailFormation($group_formation['formation_id']);
            $details['etudiants'] = $this->db->select('e.*,case when u.photo is null then concat("default.","jpg") else u.photo end as profile_picture')
                                             ->from('etudiants_groupes eg')  
                                             ->join('etudiants e','eg.etudiant_id=e.id') 
                                             ->join('users u','e.id=u.etudiant_id')
                                             ->where('eg.groupe_id',$group_formation['groupe_id'])
                                             ->get() 
                                             ->result_array();  
            return $details;
        }   
        else{
            return null;
        }                          
    }
    public function prepareCreateFormationForm(){
            $etudiant = $this->getAllStudents();
            $referents = $this->getAllReferents();
            return [
                'students'=>$etudiant,
                'referents'=>$referents
            ];
    }
    public function prepareUpdateFormationPage($formationId){
        $formation = $this->getFormationById($formationId);
        if(!$formation){
            return null;
        }
        $formation_etudiants = $this->db->select('*')->from('formations_students')->where('formation_id',$formationId)->get()->result_array();
        $etudiantIds = array();
        foreach($formation_etudiants as $fs){
            $etudiantIds[]= $fs['student_id'];
        }
        return [
            'formation'=>$formation,
            'etudiantIds'=>$etudiantIds,
            'all_students'=>$this->getAllStudents()
        ];
    }
    public function getMembers($formationId){
        return [
            'etudiants'=>$this->db->select('e.*,case when u.photo is null then concat("default.","jpg") else u.photo end as profile_picture')
            ->from('formations_students fs')
            ->join('etudiants e','fs.student_id=e.id')
             ->join('users u','e.id=u.etudiant_id')
             ->where('fs.formation_id',$formationId)               
             ->get()
             ->result_array()
        ];


    }
    public function eliminateMember($formationId,$etudiant_id){
        return $this->db->where('student_id',$etudiant_id)
                        ->where('formation_id',$formationId)
                        ->delete('formations_students');



    }
    

    public function getAllFormations(){
        return $this->db->select('f.*, u.photo as photo_ref, concat(e.prenom, " " ,e.nom ) as nom_ref, group_concat(d.nom separator " | ") as nom_dom')
                        ->from('formations f')
                        ->join('enseignant e', 'referent_id = e.id','left')
                        ->join('users u','e.id = u.enseignant_id','left')
                        ->join('formations_domaines fd','fd.formation_id = f.id', 'left')
                        ->join('domaine d', 'fd.domaine_id = d.id', 'left')
                        ->group_by('f.id')
                        ->get()
                        ->result_array();
    }
    public function getAllFormations_etab($etab_id = null) {
        $this->db->select('f.*, u.photo as photo_ref, concat(e.prenom, " " ,e.nom ) as nom_ref, group_concat(d.nom separator " | ") as nom_dom')
                 ->from('formations f')
                 ->join('enseignant e', 'referent_id = e.id', 'left')
                 ->join('users u', 'e.id = u.enseignant_id', 'left')
                 ->join('formations_domaines fd', 'fd.formation_id = f.id', 'left')
                 ->join('domaine d', 'fd.domaine_id = d.id', 'left')
                 ->group_by('f.id');
        
        // If etab_id is provided, filter by it
        if (!empty($etab_id)) {
            $this->db->where('f.etab_id', $etab_id); // Filter by etab_id, assuming 'f.etab_id' is the correct column
        }
    
        return $this->db->get()->result_array(); // Execute the query and return the result as an array
    }


}
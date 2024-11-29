<?php


class Model_appel_candidature extends CI_Model
{
    function __construct()
    {
       parent::__construct();

    }

    
    public function createNewAppelcandidature($photo)
    {
        $this->form_validation->set_rules('nom','Nom','regex_match[/^[a-zA-ZÀ-ÖØ-öø-ÿ0-9_\.\'\- ]+$/]');
        $this->form_validation->set_rules('sujet', 'Sujet', 'regex_match[/^[a-zA-ZÀ-ÖØ-öø-ÿ0-9_\.\'\- ]+$/]');
        $this->form_validation->set_rules('description', 'Description', 'regex_match[/^[a-zA-ZÀ-ÖØ-öø-ÿ0-9_\.\'\-@:/]+$/]');
    
        if ($this->form_validation->run() === true) {
            $domaines = $this->input->post('domaine');
            if (count($domaines) == 0) {
                return ['success' => false, 'message' => 'Vous devez sélectionner au moins un domaine'];
            }
    
            $insert_data = [
                'nom'         => $this->input->post('nom'),
                'sujet'       => $this->input->post('sujet'),
                'date_debut'  => $this->input->post('date_debut'),
                'date_fin'    => $this->input->post('date_fin'),
                'domaine'     => '',
                'description' => $this->input->post('description'),
                'photo'       => $photo
            ];
    
            $query = $this->db->insert('appel_a_candidature', $insert_data);
    
            if ($query) {
                $insert_id = $this->db->insert_id();
                $appel_domaine = [];
    
                foreach ($domaines as $t) {
                    $appel_domaine[] = [
                        'id_appel' => $insert_id,
                        'id_domaine' => $t
                    ];
                }
    
                $this->db->insert_batch('appel_domaine', $appel_domaine);
                return ['success' => true];
            } else {
                return ['success' => false, 'message' => "Erreur lors d'ajout de l'appel de candidature"];
            }
        } else {
            return ['success' => false, 'message' => 'form validation'. validation_errors()];
        }
    }
    

    public function getAppelcandidature(){
        $query = $this->db->select('ac.*, GROUP_CONCAT(d.nom SEPARATOR " | ") as domaines')
                          ->from('appel_a_candidature ac')
                          ->join('appel_domaine ad', 'ac.id = ad.id_appel')
                          ->join('domaine d', 'd.id = ad.id_domaine')
                          ->group_by('ac.id') // Group by appel id to combine domaines
                          ->get();
        return $query->result_array();
    }
    

    public function getAlldomaines(){
        $query = $this->db->select('*')->from('domaine')->get();
        return $query->result_array();
    }

    public function getAppels($appel_id){
        $appel = $this->db->select('ac.*')
                          ->from('appel_a_candidature ac')
                          ->where('ac.id', $appel_id)
                          ->get()
                          ->row_array();
        if ($appel) {
        // Fetch the associated domain IDs and names
        $this->db->select('ad.id_domaine, d.nom as domaine_name');
        $this->db->from('appel_domaine ad');
        $this->db->join('domaine d', 'ad.id_domaine = d.id');
        $this->db->where('ad.id_appel', $appel_id);
        $domaines_query = $this->db->get();
        $domaines = $domaines_query->result_array();

        // Extract domain IDs
        $appel['domaines'] = array_map(function($domaine) {
            return $domaine['id_domaine'];
        }, $domaines);

        // Concatenate domain names for display (if needed)
        $appel['domaines_names'] = implode(' | ', array_map(function($domaine) {
            return $domaine['domaine_name'];
        }, $domaines));
    }
        return $appel;
    }


    public function updateAppelData($id, $photo)
    {
        // Validation rules for form inputs
        $this->form_validation->set_rules('editnom','Nom','regex_match[/^[a-zA-ZÀ-ÖØ-öø-ÿ0-9_\.\'\- ]+$/]');
        $this->form_validation->set_rules('editsujet', 'Sujet', 'regex_match[/^[a-zA-ZÀ-ÖØ-öø-ÿ0-9_\.\'\- ]+$/]');
        // Uncomment if description validation is needed
        $this->form_validation->set_rules('editdescription', 'Description', 'regex_match[/^[a-zA-ZÀ-ÖØ-öø-ÿ0-9_\.\'\-@:/]+$/]');
    
        if ($this->form_validation->run() === true) {
            // Data for updating appel
            $update_data_appel = array(
                'nom'         => $this->input->post('editnom'),
                'sujet'       => $this->input->post('editsujet'),
                'date_debut'  => $this->input->post('editdate_debut'),
                'date_fin'    => $this->input->post('editdate_fin'),
                'description' => $this->input->post('editdescription'),
                'photo'       => $photo
            );
            
            // Update the appel record
            $this->db->where('id', $id);
            $status_appel = $this->db->update('appel_a_candidature', $update_data_appel);
    
            // Update domaines in the many-to-many relationship
            $domaines = $this->input->post('editdomaine');
            $this->db->where('id_appel', $id);
            $this->db->delete('appel_domaine');
            
            // Insert new domaines if they exist
            if (!empty($domaines)) {
                foreach ($domaines as $d_id) {
                    $this->db->insert('appel_domaine', [
                        'id_appel' => $id,
                        'id_domaine' => $d_id
                    ]);
                }
            }
    
            // Return true if the update was successful
            return $status_appel;
        } else {
            // Validation failed, return false
            return false;
        }
    }
    
    



    public function getDomaines($id){
        $domaines = array();
        $domaines['results'] = array();
        $domaines['pagination'] = ["more"=>false];
        
        $query = $this->db->select('d.*')->from('appel_a_candidature ac')
                          ->join('appel_domaine ad', 'ac.id = ad.id_appel')
                          ->join('domaine d', 'd.id = ad.id_domaine')
                          ->where('ac.id', $id)
                          ->get();

        $result = $query->result_array();
        $domaine_ids = array();
        
        foreach($result  as $res){
            $domaine_ids[]=$res['id'];
            $domaines['results'][] = [
                'id'=>$res['id'],
                'nom'=>$res['nom'],
                'selected'=>true
            ];
        }
        
        if(count($domaine_ids)){
            $queryAll =$this->db->where_not_in('id', $domaine_ids)->get('domaine');
        }
        else{
            $queryAll =$this->db->get('domaine');
        }
        $resultAll = $queryAll->result_array();
        foreach($resultAll  as $res){
            $domaines['results'][] = [
                'id'=>$res['id'],
                'nom'=>$res['nom'],
                'selected'=>false
            ];

        }
        return $domaines;
    }


    public function updateDomaine($id){
        $this->db->where('id_appel', $id);
		$result = $this->db->delete('appel_domaine');
        if($result){
            $appel_domaines = array();
            $domaineIds=$this->input->post('editdomaine');
            foreach($domaineIds as $d_id){
                $appel_domaines[] = [
                    "id_domaine"=>$d_id,
                    'id_appel'=>$id
                ];
            }
            return  $this->db->insert_batch('appel_domaine', $appel_domaines);

        }
        return false;
    }



    public function getAppelcandidatureStat(){
        $query = $this->db->select('ac.*, GROUP_CONCAT(DISTINCT d.nom SEPARATOR " | ") as domaines')
                  ->from('appel_a_candidature ac')
                  ->join('appel_domaine ad', 'ac.id=ad.id_appel')
                  ->join('domaine d', 'ad.id_domaine=d.id')
                  ->group_by('ac.id') // Ensure that you're grouping by 'ac.id'
                  ->order_by('ac.date_debut desc')
                  ->get();
        return $query->row_array();
    }
    public function getAppelsDispo(){
        return $this->db
                    ->select('*')
                    ->from('appel_a_candidature')
                    
                    ->where('date(date_fin)>=date(CURRENT_DATE)')
                    ->get()
                    ->result_array();


    }
    public function getAppelsDispoForStudent($etudiant_id){
        return $this->db
                    ->select('ap.*,count(p.id) as number_inscription')
                    ->from('2024_appel_a_candidature ap')
                    ->join('(select * from 2024_inscriptions where etudiant_id='.$etudiant_id.') p','ap.id=p.appel_id','left')
                    ->where('date(date_fin)>=date(CURRENT_DATE)')
                    ->group_by('ap.id')
                    ->get()
                    ->result_array();


    }

    public function fetchAppelDispo($page,$limit){
        $query = $this->db->select('ac.id as id_appel,ac.*, GROUP_CONCAT(d.nom SEPARATOR " | ") as domaines')
                          ->from('appel_a_candidature ac')
                          ->join('appel_domaine ad', 'ac.id = ad.id_appel')
                          ->join('domaine d', 'd.id = ad.id_domaine')
                          ->where('date(date_fin)>=date(CURRENT_DATE)')
                          ->group_by('ac.id') ;    
        $result =  $query->limit($limit,($page-1)*$limit)->get()->result_array();
        $count_query= $this->db->select('count(*) as nb')->from('appel_a_candidature')->get()->row_array();
        $total = $count_query['nb'];

        $numberOfPages = floor($total/$limit);
        if($total%$limit!=0){
           $numberOfPages++; 
        }
        return ['data'=>$result,'numberOfPages'=>$numberOfPages,'page'=>$page];
    }
  

}
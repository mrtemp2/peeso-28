<?php







class Model_news extends CI_Model
{
    public function __construct()
    {
       parent::__construct();
    }
    public function add_news($insert_data){
        return $this->db->insert('news', $insert_data);
    }
    public function add_newsDept($insert_data){
        return $this->db->insert('news', $insert_data);
    }
    public function fetchDataNews(){
        return $this->db->select('titre,id')->get('news')->result_array();
    }
    public function fetchDataNewsDept($dept_id){
        return $this->db->select('titre,id')
                ->where('etab_id',$dept_id)
                ->get('news')->result_array();
    }
    public function getNews($id){
        return $this->db->select('titre,titre-en,image,id,content,content-en,date(created_at) as created_at')->where('id',$id)->get('news')->row_array();
    }
    public function update_news($id,$update_data){
        $this->db->where('id', $id);
        $status = $this->db->update('news', $update_data);
    
        if ($this->db->affected_rows() > 0) {
            return true; // Return true when the update is successful
        } else {
            $error = $this->db->error(); // Get the database error
            log_message('error', 'Database Error: ' . $error['message']);
            return false; // Return false when there's an error or no rows were affected
        }

    }

    public function removeNews($id){
        return $this->db->delete('news', array('id' => $id));
    }

    public function news_section(){
       return $this->db->order_by('created_at','desc')->get('news',3)->result_array(); 
    }


    // my code for filtering the etab_news 

    public function news_section_etab($etab_id) {
        // Ensure etab_id is passed and valid
        if (!empty($etab_id)) {
            return $this->db
                ->where('etab_id', $etab_id) // Filter by etab_id
                ->order_by('created_at', 'desc') // Order by creation date, descending
                ->limit(3) // Limit the results to 3
                ->get('news') // Fetch from the 'news' table
                ->result_array(); // Return the result as an array
        } else {
            // Handle cases where etab_id is not set or invalid
            return []; // Return an empty array or handle as needed
        }
    }

    //end of code
    public function get_others_sections($id){
        return $this->db->where('id!=',$id)->get('news',3)->result_array(); 
    }
    public function fetchDataNewsFront($page,$limit){
         $query = $this->db->select('*')->from('news');    
         $result =  $query->limit($limit,($page-1)*$limit)->get()->result_array();
         $count_query= $this->db->select('count(*) as nb')->from('news')->get()->row_array();
         $total = $count_query['nb'];

         $numberOfPages = floor($total/$limit);
         if($total%$limit!=0){
            $numberOfPages++; 
         }
         return ['data'=>$result,'numberOfPages'=>$numberOfPages,'page'=>$page];
     }
     public function getActualite($id){
        return  $this->db->where('id',$id)->get('news')->row_array();

     }

     public function getCondition($id){
        return $this->db->select('id, contenu')->where('id',$id)->get('condition_utilisation')->row_array();
    }
     
     public function updateCondition($id,$update_data){
        $this->db->where('id', $id);
        $status = $this->db->update('condition_utilisation', $update_data);
    
        if ($this->db->affected_rows() > 0) {
            return true; // Return true when the update is successful
        } else {
            $error = $this->db->error(); // Get the database error
            log_message('error', 'Database Error: ' . $error['message']);
            return false; // Return false when there's an error or no rows were affected
        }

    }

    public function getEvenement($id){
        return  $this->db->select('*')->where('id',$id)->get('evenement')->row_array();

    }
    public function news_section_evenement(){
        return $this->db->order_by('date_debut','desc')->get('evenement',3)->result_array(); 
    }

    public function fetchEvenementDispo($page,$limit){
        $query = $this->db->select('*')
                          ->from('evenement')
                          ->where('date(date_fin)>=date(CURRENT_DATE)');
        $result =  $query->limit($limit,($page-1)*$limit)->get()->result_array();
        $count_query= $this->db->select('count(*) as nb')->from('evenement')->get()->row_array();
        $total = $count_query['nb'];

        $numberOfPages = floor($total/$limit);
        if($total%$limit!=0){
           $numberOfPages++; 
        }
        return ['data'=>$result,'numberOfPages'=>$numberOfPages,'page'=>$page];
    }

    public function createEvenement($photo)
    {
        $this->form_validation->set_rules('nom', 'Nom', 'regex_match[/^[a-zA-ZÀ-ÖØ-öø-ÿ0-9_\.\'\- ]+$/]');
        $this->form_validation->set_rules('description', 'Description', 'regex_match[#^[a-zA-ZÀ-ÖØ-öø-ÿ0-9_\.\'\-@:/]+$#]');

        if ($this->form_validation->run() === true) {
            $insert_data = array(
                'nom'         => $this->input->post('nom'),
                'date_debut'  => $this->input->post('date_debut'),
                'date_fin'    => $this->input->post('date_fin'),
                'description' => $this->input->post('description'),
                'photo'       => $photo
            );

            $query = $this->db->insert('evenement', $insert_data);
            if ($query) {
                return ['success' => true, 'message' => 'Événement ajouté avec succès'];
            } else {
                return ['success' => false, 'message' => "Erreur lors d'ajout de l'événement"];
            }
        } else {
            return ['success' => false, 'message' => validation_errors()];
        }
    }


    public function getEvent(){
        $id = $this->input->get('id_evenement');
        return  $this->db->select('*')->where('id',$id)->get('evenement')->row_array();
    }

    public function fetchDataEvents(){
        return $this->db->select('*')->get('evenement')->result_array();
    }
    public function fetchSubscribers($id){
        return $this->db->select('*')->where('id_evenement',$id)->get('subscribers_evenement')->result_array();
    }

    public function update_events($id,$update_data){
        $this->db->where('id', $id);
        $status = $this->db->update('evenement', $update_data);
    
        if ($this->db->affected_rows() > 0) {
            return true; // Return true when the update is successful
        } else {
            $error = $this->db->error(); // Get the database error
            log_message('error', 'Database Error: ' . $error['message']);
            return false; // Return false when there's an error or no rows were affected
        }

    }

    public function subscribeMail($insert_data){
        return $this->db->insert('subscribers_evenement', $insert_data);
    }

    public function subscribeCompMail($insert_data){
        return $this->db->insert('subscribers_competition', $insert_data);
    }

    public function getCompetition($id){
        return  $this->db->select('*')->where('id',$id)->get('competition')->row_array();

    }

    public function getCompeti(){
        $id = $this->input->get('id_competition');
        return  $this->db->select('*')->where('id',$id)->get('competition')->row_array();
    }

    public function news_section_competition(){
        return $this->db->order_by('date_debut','desc')->get('competition',3)->result_array(); 
    }
    public function createCompetition($photo)
    {
        $this->form_validation->set_rules('nom', 'Nom', 'regex_match[/^[a-zA-ZÀ-ÖØ-öø-ÿ0-9_\.\'\- ]+$/]');
        $this->form_validation->set_rules('description', 'Description', 'regex_match[#^[a-zA-ZÀ-ÖØ-öø-ÿ0-9_\.\'\-@:/]+$#]');
        if ($this->form_validation->run() === true) {
            $insert_data = array(
                'nom'         => $this->input->post('nom'),
                'date_debut'  => $this->input->post('date_debut'),
                'date_fin'    => $this->input->post('date_fin'),
                'description' => $this->input->post('description'),
                'photo'=> $photo
            );

            $query = $this->db->insert('competition', $insert_data);
            if($query){
                return ['success' => true,'message' => "Compétition ajoutée avec succès"];
            }
            else {
                return ['success' => false,'message' => "Erreur lors d'ajout de la compétition"];
            }
        } else {
            return ['success' => false, 'message' => validation_errors()];
        }
    }
    public function createCompetitionDept($photo)
    {
        $dept_id = $this->session->userdata()['logged']['etab_id'];
    
        // Form validation rules
        $this->form_validation->set_rules('nom', 'Nom', 'regex_match[/^[a-zA-ZÀ-ÖØ-öø-ÿ0-9_\.\'\- ]+$/]');
        $this->form_validation->set_rules(
            'description', 
            'Description', 
            'trim|required|regex_match[/^[^<>]*$/]|min_length[10]|max_length[5000]'
        );
    
        if ($this->form_validation->run() === true) {
            // Ensure photo is a string (URL or file path) and not an array
            if (is_array($photo)) {
                // If $photo is an array (in case of an upload failure or incorrect handling), set it to an empty string or handle accordingly
                $photo = isset($photo['file_name']) ? $photo['file_name'] : '';  // Get the file name from the array
            }
    
            $insert_data = array(
                'nom'         => $this->input->post('nom'),
                'date_debut'  => $this->input->post('date_debut'),
                'date_fin'    => $this->input->post('date_fin'),
                'description' => $this->input->post('description'),
                'photo'       => $photo,  // Ensure photo is a string value
                'etab_id'     => $dept_id
            );
    
            $query = $this->db->insert('competition', $insert_data);
            if ($query) {
                return ['success' => true, 'message' => "Compétition ajoutée avec succès"];
            } else {
                return ['success' => false, 'message' => "Erreur lors d'ajout de la compétition"];
            }
        } else {
            return ['success' => false, 'message' => validation_errors()];
        }
    }
    
       public function fetchCompetitionDispo($page,$limit){
        $query = $this->db->select('*')
                          ->from('competition')
                          ->where('date(date_fin)>=date(CURRENT_DATE)');
        $result =  $query->limit($limit,($page-1)*$limit)->get()->result_array();
        $count_query= $this->db->select('count(*) as nb')->from('competition')->get()->row_array();
        $total = $count_query['nb'];

        $numberOfPages = floor($total/$limit);
        if($total%$limit!=0){
           $numberOfPages++; 
        }
        return ['data'=>$result,'numberOfPages'=>$numberOfPages,'page'=>$page];
    }

    public function fetchCompetitionSubscribers($id){
        return $this->db->select('*')->where('id_competition',$id)->get('subscribers_competition')->result_array();
    }
    public function fetchCompetitionSubscribersAccepted($id){
        return $this->db->select('*')->where('id_competition',$id)->where('is_accepted','oui')->get('subscribers_competition')->result_array();
    }
    public function fetchCompetitionSubscribersRefused($id){
        return $this->db->select('*')->where('id_competition',$id)->where('is_accepted','non')->get('subscribers_competition')->result_array();
    }

    public function removeEvents($id){
        return $this->db->delete('evenement', array('id' => $id));
    }

    public function removeCompetitions($id){
        return $this->db->delete('competition', array('id' => $id));
    }

    public function update_competitions($id,$update_data){
        $this->db->where('id', $id);
        $status = $this->db->update('competition', $update_data);
    
        if ($this->db->affected_rows() > 0) {
            return true; // Return true when the update is successful
        } else {
            $error = $this->db->error(); // Get the database error
            log_message('error', 'Database Error: ' . $error['message']);
            return $error['message']; // Return false when there's an error or no rows were affected
        }

    }

    public function fetchDataCompetitons(){
        return $this->db->select('*')->get('competition')->result_array();
    }
    public function fetchDataCompetitonsDept( $dept_id){
        return $this->db->select('*')
                ->where('etab_id', $dept_id)
                ->get('competition')
                ->result_array();
    }
    //my update on filtering Competitions for departements
    public function fetchDataCompetitons_etab($etab_id) {
        // Ensure etab_id is passed and valid
        if (!empty($etab_id)) {
            return $this->db
                ->where('etab_id', $etab_id) // Filter by etab_id
                ->select('*') // Select all columns
                ->get('competition') // Fetch from the 'competition' table
                ->result_array(); // Return the result as an array
        } else {
            // Handle cases where etab_id is not set or invalid
            return []; // Return an empty array or handle as needed
        }
    }
    public function getsubscriber($id){
        return  $this->db->select('*')->where('id',$id)->get('subscribers_competition')->row_array();

    }

    public function accepteSub($id,$update_data){
        $this->db->where('id', $id);
        $status = $this->db->update('subscribers_competition', $update_data);
    
        if ($this->db->affected_rows() > 0) {
            return true; // Return true when the update is successful
        } else {
            $error = $this->db->error(); // Get the database error
            log_message('error', 'Database Error: ' . $error['message']);
            return false; // Return false when there's an error or no rows were affected
        }

    }

    public function refuseSub($id,$update_data){
        $this->db->where('id', $id);
        $status = $this->db->update('subscribers_competition', $update_data);
    
        if ($this->db->affected_rows() > 0) {
            return true; // Return true when the update is successful
        } else {
            $error = $this->db->error(); // Get the database error
            log_message('error', 'Database Error: ' . $error['message']);
            return false; // Return false when there's an error or no rows were affected
        }

    }
}

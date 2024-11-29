<?php







class Livrable extends CI_Controller
{
    public function __construct()
    { 
        parent::__construct();
        $this->load->model('model_livrable');
        $this->load->library('session');
        
        $this->load->database();
        $this->load->helper('url');

    }
    public function getLivrableInitiateur($seanceId){
        $info = $this->model_livrable->getParameterLivrableInitiateur($seanceId);
        if(!$info){
            show_404();
            return ;

        }   
        $this->load->view('student/livrable_initiateur',[
            'info'=>$info
        ]);
    }
    public function getRoleUser(){
        return $this->session->userdata()['logged']['type'];
    }
    public function createLivrableInitiateur($seanceId){
        $numberOfLivrables = intval($_POST['number_livrable_initiateur']);
        $files = $_FILES;
       // echo json_encode($files);
        $livrales = array();
        for($i=0; $i<$numberOfLivrables; $i++)
        {           
            $_FILES['livrable']['name']= $files['livrable']['name'][$i];
            $_FILES['livrable']['type']= $files['livrable']['type'][$i];
            $_FILES['livrable']['tmp_name']= $files['livrable']['tmp_name'][$i];
            $_FILES['livrable']['error']= $files['livrable']['error'][$i];
            $_FILES['livrable']['size']= $files['livrable']['size'][$i];    

        
            $uploadPath = './assets/assets/images/'.$_FILES['livrable']['name'];
            move_uploaded_file($_FILES['livrable']['tmp_name'], $uploadPath);
            if($_FILES['livrable']['name']){
                
                $livrales[]=[
                    'name'=>$_POST['name_livrable_'.($i+1)],
                    'livrable'=>$_FILES['livrable']['name'],
                    'seance_id'=>intval($seanceId)
                ];
            }
        }
        if(count($livrales)){
            $inserted = $this->model_livrable->createLivrable($seanceId,$livrales);
            if($inserted){
                echo json_encode([
                    'success'=>true,
                    'message'=>'livrable soumis avec succes'
                ]);
            }
            else{
                echo json_encode([
                    'success'=>false,
                    'message'=>'probleme de soumission de livrables veuillez réessayer'
                ]);
            }
        }
        else{
            echo json_encode([
                'success'=>false,
                'message'=>'vous n\'avez pas soumis vos livrabrables'
            ]);
        }
    }
    public function getLivrableInitiateurEnseignant($seanceId){
        $info = $this->model_livrable->getCreatedLivrable($seanceId);
        if(!$info){
            show_404();
            return ;
        }  
        $role=$this->getRoleUser(); 
        if($role=='Administrateur'){
            $this->load->view('admin/initiateur/livrable_admin_initiateur',[
                'livrables'=>$info
            ]);
        }
        else{
            $this->load->view('enseignant/livrable_initiateur',[
                'livrables'=>$info
            ]);
        }
      
    }
    public function getLivrableInnovateur($seanceId){
        $info = $this->model_livrable->getParameterLivrableInnovateur($seanceId);
        if(!$info){
            show_404();
            return ;

        }   
        $this->load->view('student/innovateur/livrable_innovateur',[
            'info'=>$info
        ]);
    }
    public function createLivrableInnovateur($seanceId){
        $numberOfLivrables = intval($_POST['number_livrable_innovateur']);
        $files = $_FILES;
       // echo json_encode($files);
        $livrales = array();
        for($i=0; $i<$numberOfLivrables; $i++)
        {           
            $_FILES['livrable']['name']= $files['livrable']['name'][$i];
            $_FILES['livrable']['type']= $files['livrable']['type'][$i];
            $_FILES['livrable']['tmp_name']= $files['livrable']['tmp_name'][$i];
            $_FILES['livrable']['error']= $files['livrable']['error'][$i];
            $_FILES['livrable']['size']= $files['livrable']['size'][$i];    

        
            $uploadPath = './assets/assets/images/'.$_FILES['livrable']['name'];
            move_uploaded_file($_FILES['livrable']['tmp_name'], $uploadPath);
            if($_FILES['livrable']['name']){
                
                $livrales[]=[
                    'name'=>$_POST['name_livrable_'.($i+1)],
                    'livrable'=>$_FILES['livrable']['name'],
                    'seance_id'=>intval($seanceId)
                ];
            }
        }
        if(count($livrales)){
            $inserted = $this->model_livrable->createLivrableInnovateur($seanceId,$livrales);
            if($inserted){
                echo json_encode([
                    'success'=>true,
                    'message'=>'livrable soumis avec succes'
                ]);
            }
            else{
                echo json_encode([
                    'success'=>false,
                    'message'=>'probleme de soumission de livrables veuillez réessayer'
                ]);
            }
        }
        else{
            echo json_encode([
                'success'=>false,
                'message'=>'vous n\'avez pas soumis vos livrabrables'
            ]);
        }
    }
   
    public function getLivrableInnovateurEnseignant($seanceId){
        $info = $this->model_livrable->getCreatedLivrableInnovateur($seanceId);
        if(!$info){
            show_404();
            return ;
        }   
       $role=$this->getRoleUser();
         if($role=='Administrateur'){
            $this->load->view('admin/innovateur/livrable_admin_innovateur',[
                'livrables'=>$info
            ]);
        }else{
            $this->load->view('enseignant/innovateur/livrable_innovateur',[
                'livrables'=>$info
            ]);
    
       }
    }
    public function getLivrablePromoteur($seanceId){
        $info = $this->model_livrable->getParameterLivrablePromoteur($seanceId);
        if(!$info){
            show_404();
            return ;

        }   
        $this->load->view('student/promoteur/livrable_promoteur',[
            'info'=>$info
        ]);
    }
    public function createLivrablePromoteur($seanceId){
        $numberOfLivrables = intval($_POST['number_livrable_promoteur']);
        $files = $_FILES;
       // echo json_encode($files);
        $livrales = array();
        for($i=0; $i<$numberOfLivrables; $i++)
        {           
            $_FILES['livrable']['name']= $files['livrable']['name'][$i];
            $_FILES['livrable']['type']= $files['livrable']['type'][$i];
            $_FILES['livrable']['tmp_name']= $files['livrable']['tmp_name'][$i];
            $_FILES['livrable']['error']= $files['livrable']['error'][$i];
            $_FILES['livrable']['size']= $files['livrable']['size'][$i];    

        
            $uploadPath = './assets/assets/images/'.$_FILES['livrable']['name'];
            move_uploaded_file($_FILES['livrable']['tmp_name'], $uploadPath);
            if($_FILES['livrable']['name']){
                
                $livrales[]=[
                    'name'=>$_POST['name_livrable_'.($i+1)],
                    'livrable'=>$_FILES['livrable']['name'],
                    'seance_id'=>intval($seanceId)
                ];
            }
        }
        if(count($livrales)){
            $inserted = $this->model_livrable->createLivrablePromoteur($seanceId,$livrales);
            if($inserted){
                echo json_encode([
                    'success'=>true,
                    'message'=>'livrable soumis avec succes'
                ]);
            }
            else{
                echo json_encode([
                    'success'=>false,
                    'message'=>'probleme de soumission de livrables veuillez réessayer'
                ]);
            }
        }
        else{
            echo json_encode([
                'success'=>false,
                'message'=>'vous n\'avez pas soumis vos livrabrables'
            ]);
        }
    }
   
    public function getLivrablePromoteurEnseignant($seanceId){
        $info = $this->model_livrable->getCreatedLivrablePromoteur($seanceId);
        if(!$info){
            show_404();
            return ;
        }  
        $role = $this->getRoleUser();
        if($role=='Administrateur'){
            $this->load->view('admin/promoteur/livrable_admin_promoteur',[
                'livrables'=>$info
            ]);
        } 
        else{
            $this->load->view('enseignant/promoteur/livrable_promoteur',[
                'livrables'=>$info
            ]);
        }
    }


    
}
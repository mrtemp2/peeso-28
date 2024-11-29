<?php



defined('BASEPATH') or exit('No direct script access allowed');

error_reporting(0);

class Grille_evaluation extends CI_Controller
{

     private $domPdf;
    function __construct()
    {
       parent::__construct();
       $this->load->helper('url');
       $this->load->library('form_validation');
       $this->load->library('session');
       $this->load->model('model_grille_evaluation');
       $this->load->database();
        
        
        $this->load->library('pdf');
        $this->domPdf = new Pdf();
    }

    public function evaluation(){
        $id_projet = $this->input->post('project_id'); 
         
        $soumissionFile = $_FILES['image'];
        $image = '';
        if (!empty($soumissionFile['name'])) {
            $bind = array(
                'upload_path' => './assets/assets/images',
                'allowed_types' => 'png|jpg|jpeg',
                'max_size' => 4000
            );
            $this->load->library("upload", $bind);
            if ($this->upload->do_upload('image')) {
                $image = $this->upload->data('file_name');
            } else {
                $validator = array('success' => false, 'message' => $this->upload->display_errors());
                header('Content-Type: application/json');
                echo json_encode($validator);
                return;
            }
        }

        $evaluation = $this->model_grille_evaluation->evaluation($id_projet, $image);

        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($evaluation);
    }

    public function statut_ee_initiateur(){
        $id_etudiant = $this->input->post('etudiant_id'); 

        $evaluation = $this->model_grille_evaluation->statut_ee_initiateur($id_etudiant);

        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($evaluation);
    }

    public function statut_ee_innovateur(){
        $id_etudiant = $this->input->post('etudiant_id'); 
        
        $evaluation = $this->model_grille_evaluation->statut_ee_innovateur($id_etudiant);

        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($evaluation);
    }


    public function statut_ee_promoteur(){
        $id_etudiant = $this->input->post('etudiant_id'); 

        $evaluation = $this->model_grille_evaluation->statut_ee_promoteur($id_etudiant);

        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($evaluation);
    }

    public function getGrille($id_projet){
        $grille = $this->model_grille_evaluation->getGrille($id_projet);
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($grille);
    }

    public function updateNiveau($id){
        $update_data = array(
            'niveau' => $this->input->post('eval')
        );
        
        $update_niveau = $this->model_grille_evaluation->updateNiveau($id, $update_data);
        if($update_niveau){
            $validator['success'] = true;
            $validator['messages'] = 'Niveau mise à jour avec succès!';
        } else {
            $validator['success'] = false;
            $validator['messages'] = 'Echec lors de la mise à jour du niveau!';
        }

        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($validator);
    }
    public function getTeacherEvaluation($projectId){
        $info  = $this->model_grille_evaluation->getTeacherEvaluation($projectId);
        if(!$info){
            echo "";

        }
        $this->load->view('admin/teachersEvaluation',[
            'info'=>$info
        ]);

    }
    public function downloadGrilleEvaluation($grilleId){
        $info = $this->model_grille_evaluation->getInformationForGrille($grilleId);
        if(!$info){
            show_404();
            return ;
        }

        $this->load->view('pdf/grille-de-selection-peeso',['grille'=>$info]);
        $html = $this->output->get_output();
        $project = $info['project']; 
        
        $this->domPdf->setPdfOptions('isRemoteEnabled', value: true);
        $this->domPdf->loadHtml($html);
        $this->domPdf->setPaper('A4', 'potrait');
        $this->domPdf->render();
        $this->domPdf->stream('grille_evaluation_'.$project['titre'].'.pdf', array('Attachment'=>1));
        exit();
    }

}


















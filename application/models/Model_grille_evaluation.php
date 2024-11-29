<?php


class Model_grille_evaluation extends CI_Model
{
    function __construct()
    {
       parent::__construct();

    }

    





    public function evaluation($id_projet, $image)
    {
        $validator = array('success' => false, 'message' => array());

        $id_enseignant = $this->session->userdata()['logged']['enseignant_id'];
        $grille = $this->get_grille( $id_projet,$id_enseignant);

        if($grille){

            $this->form_validation->set_rules('commentaire_critere','commentaire','trim|required|regex_match[/^[a-zA-ZÀ-ÖØ-öø-ÿ0-9_\.\'\- ,;:!?()"\n]+$/]');
            $this->form_validation->set_rules('commentaire_motivation','commentaire','trim|required|regex_match[/^[a-zA-ZÀ-ÖØ-öø-ÿ0-9_\.\'\- ,;:!?()"\n]+$/]');
            $this->form_validation->set_rules('commentaire_avis','commentaire','trim|required|regex_match[/^[a-zA-ZÀ-ÖØ-öø-ÿ0-9_\.\'\- ,;:!?()"\n]+$/]');
            $this->form_validation->set_rules('commentaire_idee','commentaire','trim|required|regex_match[/^[a-zA-ZÀ-ÖØ-öø-ÿ0-9_\.\'\- ,;:!?()"\n]+$/]');
            
            if ($this->form_validation->run() === true) {
                
                $update_data_evaluation = array(
                
                    'solide'                    => $this->input->post('solide'),
                    'depot'                     => $this->input->post('depot'),
                    'creative'                  => $this->input->post('creative'),
                    'explore'                   => $this->input->post('creative'),
                    'communication'             => $this->input->post('communication'),
                    'travail_equipe'            => $this->input->post('travail_equipe'),
                    'commentaire_critere'       => $this->input->post('commentaire_critere'),
                    'comprehension_problem'     => $this->input->post('comprehension_problem'),
                    'offre'                     => $this->input->post('offre'),
                    'innovation'                => $this->input->post('innovation'),
                    'commentaire_idee'          => $this->input->post('commentaire_idee'),
                    'motivation'                => $this->input->post('motivation'),
                    'commentaire_motivation'    => $this->input->post('commentaire_motivation'),
                    'total'                     => $this->input->post('total'),
                    'stat_nat'                  => $this->input->post('stat_nat'),
                    'commentaire_avis'          => $this->input->post('commentaire_avis'),
                    'niveau'                    => $this->input->post('niveau'),
                    'signature_tuteur'          => $image
                );
               
                // try{
                //     $project = $this->db->select('*')->from('projects')->where('id',$id_projet)->get()->row_array();
                //     $this->setNiveauProject($update_data_evaluation,$project);
                //     if($update_data_evaluation['niveau']=='initiateur'&&$project['niveau']!='initiateur'){

                //         $this->createSeancesInitiateur($id_enseignant,$id_projet);

                //     }                 
                // }catch(Exception $e){

                //     return false;
                // }
               // $membre = $this->getMembre($id_etudiant, $id_projet);
                // if($membre){
                //     if($membre['current_niveau']!=$update_data_evaluation['niveau']){
                //         $updated =  $this->db
                //                 ->where('project_id',$id_projet)
                //                 ->where('etudiant_id',$id_etudiant)
                //                 ->update('etudiants_projetcs',[
                //                     'current_niveau'=>$update_data_evaluation['niveau']
                //                 ]);
                //         if(!$updated){
                //                 return false;
                //         }    
                //         if($update_data_evaluation['niveau']!='non' && $update_data_evaluation['niveau']!='en_attente'){
                //             $update_data_evaluation['stat_nat']='oui';
                //         }
                //     }
                    
                // }
                // else{
                //     return false;
                // }
                
                $status_grille = $this->db->where('id_projet', $id_projet)->where('id_enseignant',$id_enseignant)->update('grille_evaluation', $update_data_evaluation);

               

                if ($status_grille) {
                    $validator['success'] = true;
                    $validator['message'] = 'Grille Modifié Avec Succés';
                    return $validator;
                } else {
                    $validator['success'] = false;
                    $validator['message'] = 'Échec de la mise à jour de l\'évaluation.';
                    return $validator;
                }
            } else {
                $validator['success'] = false;
                $validator['message'] = validation_errors();
                return $validator;
            }
        } 
        
        else {
            $this->form_validation->set_rules('commentaire_critere','commentaire','trim|required|regex_match[/^[a-zA-ZÀ-ÖØ-öø-ÿ0-9_\.\'\- ,;:!?()"\n]+$/]');
            $this->form_validation->set_rules('commentaire_motivation','commentaire','trim|required|regex_match[/^[a-zA-ZÀ-ÖØ-öø-ÿ0-9_\.\'\- ,;:!?()"\n]+$/]');
            $this->form_validation->set_rules('commentaire_avis','commentaire','trim|required|regex_match[/^[a-zA-ZÀ-ÖØ-öø-ÿ0-9_\.\'\- ,;:!?()"\n]+$/]');
            $this->form_validation->set_rules('commentaire_idee','commentaire','trim|required|regex_match[/^[a-zA-ZÀ-ÖØ-öø-ÿ0-9_\.\'\- ,;:!?()"\n]+$/]');

            
            
            if ($this->form_validation->run() === true) {
            
                $insert_data_evaluation = array(
                    'solide'                    => $this->input->post('solide'),
                    'depot'                     => $this->input->post('depot'),
                    'creative'                  => $this->input->post('creative'),
                    'explore'                   => $this->input->post('creative'),
                    'communication'             => $this->input->post('communication'),
                    'travail_equipe'            => $this->input->post('travail_equipe'),
                    'commentaire_critere'       => $this->input->post('commentaire_critere'),
                    'comprehension_problem'     => $this->input->post('comprehension_problem'),
                    'offre'                     => $this->input->post('offre'),
                    'innovation'                => $this->input->post('innovation'),
                    'commentaire_idee'          => $this->input->post('commentaire_idee'),
                    'motivation'                => $this->input->post('motivation'),
                    'commentaire_motivation'    => $this->input->post('commentaire_motivation'),
                    'total'                     => $this->input->post('total'),
                    'stat_nat'                  => $this->input->post('stat_nat'),
                    'commentaire_avis'          => $this->input->post('commentaire_avis'),
                    'niveau'                    => $this->input->post('niveau'),
                    'id_enseignant'             => $id_enseignant,
                    'id_projet'                 => $id_projet,
                    'signature_tuteur'          => $image
                );
              
              
                $status_grille = $this->db->insert('grille_evaluation', $insert_data_evaluation);

                if ($status_grille) {
                    $validator['success'] = true;
                    $validator['message'] = 'Grille Crée Avec Succés';
                    return $validator;
                } else {
                    $validator['success'] = false;
                    $validator['message'] = 'Échec de la mise à jour de l\'évaluation.';
                    return $validator;
                }
            } else {
                $validator['success'] = false;
                $validator['message'] = validation_errors();
                return $validator;
            }
        }
        
        
    }


    public function statut_ee_initiateur($id_etudiant)
    {
        
        $validator = array('success' => false, 'message' => array());

        $id_enseignant = $this->session->userdata()['logged']['enseignant_id'];
        

            $insert_data_initiateur = array(
                'communication'            => $this->input->post('communication'),
                'ecoute'                   => $this->input->post('ecoute'),
                'gerer_conflits'           => $this->input->post('gerer_conflits'),
                'gestion_temps'            => $this->input->post('gestion_temps'),
                'gestion_equipe'           => $this->input->post('gestion_equipe'),
                'competences_sociales'     => $this->input->post('competences_sociales'),
                'reseau_personnel'         => $this->input->post('reseau_personnel'),
                'reseau_professionnel'     => $this->input->post('reseau_professionnel'),
                'reseau_support'           => $this->input->post('reseau_support'),
                'reseau_financement'       => $this->input->post('reseau_financement'),
                'capacite_innover'         => $this->input->post('capacite_innover'),
                'savoir_identifier'        => $this->input->post('savoir_identifier'),
                'faisabilite'              => $this->input->post('faisabilite'),
                'types_ressources'         => $this->input->post('types_ressources'),
                'valider_idee'             => $this->input->post('valider_idee'),
                'proposition_valeur'       => $this->input->post('proposition_valeur'),
                'persona'                  => $this->input->post('persona'),
                'elaborer_canaux'          => $this->input->post('elaborer_canaux'),
                'relation_clientele	'      => $this->input->post('relation_clientele'),
                'sources_revenus'          => $this->input->post('sources_revenus'),
                'differentes_ressources'   => $this->input->post('differentes_ressources'),
                'activites_cles'           => $this->input->post('activites_cles'),
                'partenaires_strategiques' => $this->input->post('partenaires_strategiques'),
                'structure_couts'          => $this->input->post('structure_couts'),
                'business_model'           => $this->input->post('business_model'),
                'etude_commerciale'        => $this->input->post('etude_commerciale'),
                'etude_technique'          => $this->input->post('etude_technique'),
                'etude_juridique'          => $this->input->post('etude_juridique'),
                'etude_financiere'         => $this->input->post('etude_financiere'),
                'id_etudiant'              => $id_etudiant,
                'id_tuteur'                => $id_enseignant,
            );
           
            $status_initiateur = $this->db->insert('statut_ee_initiateur', $insert_data_initiateur);

            if ($status_initiateur) {
                $validator['success'] = true;
                return true;
            } else {
                $validator['message'] = 'Échec de la soumission de l\'évaluation.';
                return false;
            }
       
    }

    public function statut_ee_innovateur($id_etudiant)
    {
        
        $validator = array('success' => false, 'message' => array());

        $id_enseignant = $this->session->userdata()['logged']['enseignant_id'];
        

            $insert_data_innovateur = array(
                'composantes_projet'         => $this->input->post('composantes_projet'),
                'delais_prescrits'           => $this->input->post('delais_prescrits'),
                'budget_alloue'              => $this->input->post('budget_alloue'),
                'reponde_besoins'            => $this->input->post('reponde_besoins'),
                'leadership'                 => $this->input->post('leadership'),
                'risques_associes'           => $this->input->post('risques_associes'),
                'elements_contexte'          => $this->input->post('elements_contexte'),
                'contenu_postes'             => $this->input->post('contenu_postes'),
                'groupes_cibles'             => $this->input->post('groupes_cibles'),
                'objectifs_communication'    => $this->input->post('objectifs_communication'),
                'messages_groupes'           => $this->input->post('messages_groupes'),
                'plan_actions'               => $this->input->post('plan_actions'),
                'preuve_ecoute'              => $this->input->post('preuve_ecoute'),
                'suivi'                      => $this->input->post('suivi'),
                'evaluer_debriefer'          => $this->input->post('evaluer_debriefer'),
                'decrire_activite'           => $this->input->post('decrire_activite'),
                'marche_vise'                => $this->input->post('marche_vise'),
                'compatibilite'              => $this->input->post('compatibilite'),
                'avantages_contraintes'      => $this->input->post('avantages_contraintes'),
                'tester_idee'                => $this->input->post('tester_idee'),
                'structure_juridique'        => $this->input->post('structure_juridique'),
                'forme_entreprise'           => $this->input->post('forme_entreprise'),
                'formalites_constitution'    => $this->input->post('formalites_constitution'),
                'analyse_strategique'        => $this->input->post('analyse_strategique'),
                'plan_financement'           => $this->input->post('plan_financement'),
                'chiffre_affaires'           => $this->input->post('chiffre_affaires'),
                'charges_projet'             => $this->input->post('charges_projet'),
                'resultat_previsionnel'      => $this->input->post('resultat_previsionnel'),
                'etude_financiere'           => $this->input->post('etude_financiere'),
                'design_produit'             => $this->input->post('design_produit'),
                'prototype_non_fonctionnel'  => $this->input->post('prototype_non_fonctionnel'),
                'prototype_fonctionnel'      => $this->input->post('prototype_fonctionnel'),
                'elements_projet'            => $this->input->post('elements_projet'),
                'adequation'                 => $this->input->post('adequation'),
                'id_etudiant'                => $id_etudiant,
                'id_tuteur'                  => $id_enseignant,
            );
            $this->db->where('id', $id);
            $status_innovateur = $this->db->insert('statut_ee_innovateur', $insert_data_innovateur);

            if ($status_innovateur) {
                $validator['success'] = true;
                return true;
            } else {
                $validator['message'] = 'Échec de la soumission de l\'évaluation.';
                return false;
            }
       
    }

   
    public function statut_ee_promoteur($id_etudiant)
    {

        $validator = array('success' => false, 'message' => array());

        $id_enseignant = $this->session->userdata()['logged']['enseignant_id'];
        

            $insert_data_promoteur = array(
                'partenaires_effectifs'         => $this->input->post('partenaires_effectifs'),
                'niveau_interet'                => $this->input->post('niveau_interet'),
                'classifier'                    => $this->input->post('classifier'),
                'communication'                 => $this->input->post('communication'),
                'strategie_negociation'         => $this->input->post('strategie_negociation'),
                'matrice_RACI'                  => $this->input->post('matrice_RACI'),
                'definir_contenu'               => $this->input->post('definir_contenu'),
                'entretien_recrutement'         => $this->input->post('entretien_recrutement'),
                'esprit_equipe'                 => $this->input->post('esprit_equipe'),
                'motivation_membres'            => $this->input->post('motivation_membres'),
                'politique_remuneration'        => $this->input->post('politique_remuneration'),
                'preuve_ecoute'                 => $this->input->post('preuve_ecoute'),
                'politique_communication'       => $this->input->post('politique_communication'),
                'analyse_risques'               => $this->input->post('analyse_risques'),
                'identifier_risques'            => $this->input->post('identifier_risques'),
                'classifier_risques'            => $this->input->post('classifier_risques'),
                'solutions'                     => $this->input->post('solutions'),
                'protection_intellectuelle'     => $this->input->post('protection_intellectuelle'),
                'formaliser_contrats'           => $this->input->post('formaliser_contrats'),
                'formalites_creation'           => $this->input->post('formalites_creation'),
                'ressources_financement'        => $this->input->post('ressources_financement'),
                'incitations_investissements'   => $this->input->post('incitations_investissements'),
                'structure_financement'         => $this->input->post('structure_financement'),
                'planing_projet'                => $this->input->post('planing_projet'),
                'preuve_efficacite'             => $this->input->post('preuve_efficacite'),
                'mesures_corrections'           => $this->input->post('mesures_corrections'),
                'plan_action'                   => $this->input->post('plan_action'),
                'strategie_commerciale'         => $this->input->post('strategie_commerciale'),
                'discours_commercial'           => $this->input->post('discours_commercial'),
                'lien_confiance'                => $this->input->post('lien_confiance'),
                'strategie_communication'       => $this->input->post('strategie_communication'),
                'valeurs_ajoutees'              => $this->input->post('valeurs_ajoutees'),
                'profils_en_ligne'              => $this->input->post('profils_en_ligne'),
                'id_etudiant'                   => $id_etudiant,
                'id_tuteur'                     => $id_enseignant,
            );
            $this->db->where('id', $id);
            $status_promoteur = $this->db->insert('statut_ee_promoteur', $insert_data_promoteur);

            if ($status_promoteur) {
                $validator['success'] = true;
                return true;
            } else {
                $validator['message'] = 'Échec de la soumission de l\'évaluation.';
                return false;
            }
       
    }

    public function get_grille($id_projet,$id_enseignant){
        return $this->db->select('*')->where('id_projet', $id_projet)->where('id_enseignant', $id_enseignant)->get('grille_evaluation')->row_array();
    }
    public function getMembre($id_etudiant,$id_project){
        return $this->db->select('*')
                        ->from('etudiants_projetcs')
                        ->where('project_id',$id_project)
                        ->where('etudiant_id',$id_etudiant)
                        ->get()
                        ->row_array();    


    }
    public function setNiveauProject($grilleValue,$project){
        if($grilleValue['niveau']==$project['niveau']){
                return true;
        }
        $allowed = [
            'non'=>array('promoteur','innovateur','initiateur','en_attente'),
            'en_attente'=>array('promoteur','innovateur','initiateur','non'),
            'promoteur'=>array(),
            'initiateur'=>array('promoteur','innovateur'),
            'innovateur'=>array('promoteur')
        ];
        if(!isset($allowed[$project['niveau']])){
              throw new Exception('valuer de niveau invalide');      
        }
        $allowedValues=$allowed[$project['niveau']]; 
        if(!in_array($grilleValue['niveau'],$allowedValues)){
         throw new Exception('valuer de niveau invalide');      
        }
       return $this->db->where('id',$project['id'])->update('projects',[
                                'niveau'=>$grilleValue['niveau']]);

    }

        public function createSeancesInitiateur($tutteurId,$project_id){
            $seances_attributes = $this->db
                                        ->select('*')
                                        ->from('attribution_seance_initiateur')
                                        ->get()
                                        ->result_array();
            $deroulement_attributes = $this->db
                                            ->select('*')
                                            ->from('attribution_deroulement_initiateur')
                                            ->get()
                                            ->result_array();                            
            $seances=array();
            $deroulement=array();
            foreach($seances_attributes as $s){
                    $seances[] =[
                        'id_projet'=>$project_id ,
                        'id_tuteur'=>$tutteurId,
                        'id_attribution_seance'=>$s['id']
                    ];
            }
            foreach($deroulement_attributes as $d){
                $deroulement[] =[
                    'id_attribution_deroulement'=>$d['id'] ,
                    'status'=>false,
                    'id_projet'=>$project_id
                ];
            }
            $inserted =$this->db
                    ->insert_batch('seance_initiateur',$seances);
            if(!$inserted){
                throw new Exception('les seances ne peuvent pas etre crée');
            }
            return $this->db
                        ->insert_batch('deroulement',$deroulement);       
        }


        public function getGrille($id_projet){
            return $this->db->select('ge.*, concat(en.prenom, " " , en.nom) as nom_ref, p.titre as nom_projet')->from('grille_evaluation ge')
                            ->join('enseignant en','ge.id_enseignant = en.id')
                            ->join('projects p', 'ge.id_projet = p.id')
                            ->where('ge.id_projet', $id_projet)
                            ->get()->result_array();
        }

        public function updateNiveau($id, $update_data){
            return $this->db->where('id', $id)->update('projects', $update_data);
        }
        public function getTeacherEvaluation($projectId){
            $project = $this->db->select('*')
                                ->from('projects')
                                ->where('id',$projectId)
                                ->get()
                                ->row_array();
            if(!$project){
                return null;
            }  
            $teacherEvaluation = $this->db->select('e.nom,e.prenom,ge.*')->from('grille_evaluation ge')
                                                   ->join('enseignant e','ge.id_enseignant=e.id')
                                                   ->where('ge.id_projet',$projectId) 
                                                   ->get()
                                                   ->result_array()    ;   
            return [
                'project'=>$project,
                'evaluation'=>$teacherEvaluation
            ] ;                                             


        }
        public function getMembresProject($project_id){
            return $this->db
                        ->select('e.*,ep.cv,ep.porteur_project,etab.nom as etablissement')
                        ->from('etudiants_projetcs ep')
                        ->join('etudiants e','ep.etudiant_id=e.id')
                        ->join('etablissements etab','e.etablissement_id=etab.id')
                        ->order_by('ep.porteur_project','desc')
                        ->where('ep.project_id',$project_id)
                        ->get()
                        ->result_array();
    
    
        }
        public function getGrilleById($grilleId){
            return $this->db->select('*')->where('id', $grilleId)->get('grille_evaluation')->row_array();
        }
        public function getEnseignantById($enseignantId){
            return $this->db->select('*')->from('enseignant')->where('id',$enseignantId)->get()->row_array();
        }
        public function getProjectById($projectId){
            return $this->db->select('*')->from('projects')->where('id',$projectId)->get()->row_array();
        }
        public function getInformationForGrille($grilleId){
            $grille = $this->getGrilleById($grilleId);
            if(!$grille){
                return null;
            }
            $project = $this->getProjectById($grille['id_projet']);
            $enseignant = $this->getEnseignantById($grille['id_enseignant']);
             $membres = $this->getMembresProject($grille['id_projet']);
             return [
                'project'=>$project,
                'grille'=>$grille,
                'enseignant'=>$enseignant,
                'membres'=>$membres
             ];
        }

  

}
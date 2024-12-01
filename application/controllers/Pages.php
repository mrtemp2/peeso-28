<?php



defined('BASEPATH') or exit('No direct script access allowed');

error_reporting(0);

class Pages extends CI_Controller
{
    private $data = array();
    
    private $routes = [
        'Administrateur'=>[
            'header'=>'admin/header_admin',
            'footer'=>'admin/footer_admin',
            'routes'=>array(
                'dashboard','appel_a_candidature','liste_appel_candidature','list_referents','gestion_etablissement','misejour_compte_admin','liste_capsules_videos',
                'demandes_creation_projets','details_projects_etudiant','list_actualite','ajout_actualite','liste_newsletters','ajout_newsletter','liste_subscribers',
                'liste_projets_acceptes','liste_projets_en_cours_d_etudes','ajout_evenement','liste_evenements','ajout_competition','liste_competitions','liste_inscrits_accepte_refuse','rendez_vous_calendar',
                'liste_projets_1er_validation','liste_projets_initiateurs','liste_projets_innovateurs','liste_projets_promoteurs','liste_projets_refuses','liste_etudiant',
                'commite_selection','liste_rendez_vous_comite','randez-vous','echanges_history','project_non_affecte_initiateur','project_non_affecte_innovateur','project_non_affecte_promoteur',
                'project_affecte_initiateur','project_affecte_innovateur','project_affecte_promoteur','mise_a_jour_profile_admin','profile_referent','demande_formation_en_cours','all_formations',
                'list_structure_appui','detail_formation','update_formation','profile_etudiant','details_randez_vous','gestion_stage_emploi','demande_coaching_en_cours','all_coaching',
                'detail_coaching','list_comp_etab','ajout_AdminEtab'
            ),
            'pagelocations'=>[
                'dashboard'=>'admin/dashboard',
                'appel_a_candidature'=>'admin/appel_a_candidature',
                'liste_appel_candidature'=>'admin/liste_appel_candidature',
                'list_referents'=>'admin/list_referents',
                'gestion_etablissement'=>'admin/gestion_etablissement',
                'misejour_compte_admin'=>'admin/misejour_compte_admin',
                'liste_capsules_videos'=>'admin/liste_capsules_videos',
                'demandes_creation_projets'=>'admin/demandes_creation_projets',
                'details_projects_etudiant'=>'admin/details_projects_etudiant',
                'list_actualite'=>'admin/list_actualite',
                'ajout_actualite'=>'admin/ajout_actualite',
                'liste_newsletters'=>'admin/liste_newsletters',
                'ajout_newsletter'=>'admin/ajout_newsletter',
                'liste_subscribers'=>'admin/liste_subscribers',
                'liste_projets_acceptes'=>'admin/liste_projets_acceptes',
                'liste_projets_en_cours_d_etudes'=>'admin/liste_projets_en_cours_d_etudes',
                'ajout_evenement'=>'admin/ajout_evenement',
                'liste_evenements'=>'admin/liste_evenements',
                'ajout_competition'=>'admin/ajout_competition',
                'liste_competitions' => 'admin/liste_competitions',
                'liste_inscrits_accepte_refuse'=>'admin/liste_inscrits_accepte_refuse',
                'rendez_vous_calendar'=>'admin/rendez_vous_calendar',
                'liste_projets_1er_validation'=>'admin/liste_projets_1er_validation',
                'liste_projets_initiateurs'=>'admin/liste_projets_initiateurs',
                'liste_projets_innovateurs'=>'admin/liste_projets_innovateurs',
                'liste_projets_promoteurs'=>'admin/liste_projets_promoteurs',
                'liste_projets_refuses'=>'admin/liste_projets_refuses',
                'liste_etudiant'=>'admin/liste_etudiant',
                'commite_selection'=>'admin/commite_selection',
                'liste_rendez_vous_comite'=>'admin/liste_rendez_vous_comite',
                'randez-vous'=>'admin/randez-vous',
                'echanges_history'=>'admin/echanges_history',
                'project_non_affecte_initiateur'=>'admin/project_non_affecte_initiateur',
                'project_non_affecte_innovateur'=>'admin/project_non_affecte_innovateur',
                'project_non_affecte_promoteur'=>'admin/project_non_affecte_promoteur',
                'project_affecte_initiateur'=>'admin/project_affecte_initiateur',
                'project_affecte_innovateur'=>'admin/project_affecte_innovateur',
                'project_affecte_promoteur'=>'admin/project_affecte_promoteur',
                'mise_a_jour_profile_admin'=>'admin/mise_a_jour_profile_admin',
                'profile_referent'=>'admin/profile_referent',
                'demande_formation_en_cours'=>'admin/demande_formation_en_cours',
                'all_formations'=> 'admin/all_formations',
                'list_structure_appui'=>'admin/list_structure_appui',
                'detail_formation'=>'admin/detail_formation',
                'update_formation'=>'admin/gestion_formation/update_formation',
                'profile_etudiant'=>'admin/profile_etudiant',
                'group_progress'=>'enseignant/group_progress',
                'group_parcours'=>'enseignant/group_parcours',
                'details_randez_vous'=>'utils/details_randez_vous',
                'gestion_stage_emploi'=>'admin/gestion_stage_emploi',
                'demande_coaching_en_cours'=>'admin/demande_coaching_en_cours',
                'all_coaching'=>'admin/all_coaching',
                'detail_coaching'=>'admin/detail_coaching',
                'list_comp_etab'=>'admin/list_comp_etab',
                'ajout_AdminEtab'=>'admin/ajout_AdminEtab'
            ]
        ],
        'Etudiant'=>[
            'header'=>'student/header_student',
            'footer'=>'student/footer_student',
            'routes'=>array(
                'dashboard','fiche_information','fiche_information_etudiant','appels_a_condidatures_etudiant','ajout_project','details_projects_etudiant',
                'projects_etudiants','update_project','nouveau_messages_coach','echange_etudiant','randez-vous','echange_etudiant_innovateur','echange_etudiant_promoteur',
                'misejour_compte_etudiant','demande_formation__etudiant','all_formations_student','randez_vous_etudiant','parcours_groupe_etudiant','details_randez_vous',
                'details_exercices'
            ),

            'pagelocations'=>[
                'details_projects_etudiant'=>'student/details_projects_etudiant',
                'dashboard'=>'student/dashboard',
                'fiche_information'=>'student/fiche_information',
                'fiche_information_etudiant'=>'student/fiche_information_etudiant',
                'appels_a_condidatures_etudiant'=>'student/appels_a_condidatures_etudiant',
                'ajout_project'=>'student/ajout_project',
                'projects_etudiants'=>"student/projects_etudiants",
                'update_project'=>"student/update_project",
                'nouveau_messages_coach'=>'student/nouveau_messages_coach',
                'echange_etudiant'=>'student/echange_etudiant',
                'randez-vous'=>'student/randez-vous',
                'echange_etudiant_innovateur'=>'student/innovateur/echange_etudiant_innovateur',
                'echange_etudiant_promoteur'=>'student/promoteur/echange_etudiant_promoteur',
                'misejour_compte_etudiant'=>'student/misejour_compte_etudiant',
                'demande_formation__etudiant'=>'student/demande_formation__etudiant',
                'all_formations_student'=>'student/all_formations_student',
                'randez_vous_etudiant'=>'student/randez_vous_etudiant',
                'parcours_groupe_etudiant'=>'student/parcours_groupe_etudiant',
                'details_exercices'=>'student/details_exercices',
                'details_randez_vous'=>'utils/details_randez_vous',

            ],
            

        ],
        'Enseignant'=>[
            'header'=>'enseignant/header_enseignant',
            'footer'=>'enseignant/footer_enseignant',
            'routes'=>array(
                'dashboard','details_projects_etudiant','projets_attribue','demandes_creation_projets_enseignant','echange_enseignant','grille_evaluation',
                'statut_ee_initiateur','statut_ee_innovateur','statut_ee_promoteur','seance_initiateur','misejour_compte_referent','randez-vous','echange_enseignant_innovateur',
                'liste_projets_1er_validation','echange_enseignant_promoteur','project_non_affecte_initiateur','project_non_affecte_innovateur','project_non_affecte_promoteur',
                'project_affecte_initiateur','project_affecte_innovateur','project_affecte_promoteur','demande_formation_referents','all_formations_referent',
                'randez_vous_referent','detail_formation_referent','details_randez_vous','detail_coaching_referent'
            ),
            'pagelocations'=>[
                'details_projects_etudiant'=>'enseignant/details_projects_etudiant',
                'dashboard'=>'enseignant/dashboard',
                'demandes_creation_projets_enseignant'=>'enseignant/demandes_creation_projets_enseignant',
                'echange_enseignant'=>'enseignant/echange_enseignant',
                'grille_evaluation' => 'enseignant/grille_evaluation',
                'statut_ee_initiateur'=>'enseignant/statut_ee_initiateur',
                'statut_ee_innovateur'=>'enseignant/statut_ee_innovateur',
                'statut_ee_promoteur'=>'enseignant/statut_ee_promoteur',
                'projets_attribue'=>'enseignant/projets_attribue',
                'seance_initiateur'=>'enseignant/seance_initiateur',
                'misejour_compte_referent'=>'enseignant/misejour_compte_referent',
                'randez-vous'=>'enseignant/randez-vous',
                'echange_enseignant_innovateur'=>'enseignant/innovateur/echange_enseignant_innovateur',
                'liste_projets_1er_validation'=>'enseignant/liste_projets_1er_validation',
                'project_non_affecte_initiateur'=>'enseignant/project_non_affecte_initiateur',
                'project_non_affecte_innovateur'=>'enseignant/project_non_affecte_innovateur',
                'project_non_affecte_promoteur'=>'enseignant/project_non_affecte_promoteur',
                'project_affecte_initiateur'=>'enseignant/project_affecte_initiateur',
                'project_affecte_innovateur'=>'enseignant/project_affecte_innovateur',
                'project_affecte_promoteur'=>'enseignant/project_affecte_promoteur',
                'echange_enseignant_promoteur'=>'enseignant/promoteur/echange_enseignant_promoteur',
                'demande_formation_referents'=>'enseignant/demande_formation_referents',
                'all_formations_referent'=>'enseignant/all_formations_referent',
                'randez_vous_referent'=>'enseignant/randez_vous_referent',
                'detail_formation_referent'=>'enseignant/detail_formation_referent',
                 'group_parcours'=>'enseignant/group_parcours',
                 'details_randez_vous'=>'utils/details_randez_vous',
                 'update_formation'=>'admin/update_formation',
                 'detail_coaching_referent'=>'enseignant/detail_coaching_referent',

            ],


            

        ],
        'Enseignant_Professionnel'=>[
            'header'=>'enseignant_professionnel/header_enseignant_professionnel',
            'footer'=>'enseignant_professionnel/footer_enseignant_professionnel',
            'routes'=>array(
                'dashboard','details_projects_etudiant','projets_attribue','liste_projets_1er_validation','echange_enseignant','grille_evaluation',
                'statut_ee_initiateur','statut_ee_innovateur','statut_ee_promoteur','seance_initiateur','misejour_compte_referent','randez-vous'
            ),
            'pagelocations'=>[
                'details_projects_etudiant'              => 'enseignant_professionnel/details_projects_etudiant',
                'dashboard'                              => 'enseignant_professionnel/dashboard',
                'liste_projets_1er_validation'           => 'enseignant_professionnel/liste_projets_1er_validation',
                'echange_enseignant'                     => 'enseignant_professionnel/echange_enseignant',
                'grille_evaluation'                      => 'enseignant_professionnel/grille_evaluation',
                'statut_ee_initiateur'                   => 'enseignant_professionnel/statut_ee_initiateur',
                'statut_ee_innovateur'                   => 'enseignant_professionnel/statut_ee_innovateur',
                'statut_ee_promoteur'                    => 'enseignant_professionnel/statut_ee_promoteur',
                'projets_attribue'                       => 'enseignant_professionnel/projets_attribue',
                'seance_initiateur'                      => 'enseignant_professionnel/seance_initiateur',
                'misejour_compte_referent'               => 'enseignant_professionnel/misejour_compte_referent',
                'randez-vous'                            => 'enseignant_professionnel/randez-vous',
            ],


            

        ],
        'guest'=>[
            'header'=>'guest/header_guest',
            'footer'=>'guest/footer_guest',
            'routes'=>array(
                'acceuil','capsules_videos','appel_a_candidature_active','actualite', 'contactez_nous','evenement','sinscrire_evenement','competition','sinscrire_competition',
                'qui_sommes_nous','nos_objectifs','reseau_4c','stage_emploi'
            ),
            'pagelocations'=>[
                'acceuil'=>'guest/acceuil',
                'capsules_videos'=>'guest/capsules_videos',
                'appel_a_candidature_active'=>'guest/appel_a_candidature_active',
                'actualite'=>'guest/actualite',
                'contactez_nous'=>'guest/contactez_nous',
                'evenement'=>'guest/evenement',
                'sinscrire_evenement'=>'guest/sinscrire_evenement',
                'competition'=>'guest/competition',
                'sinscrire_competition'=>'guest/sinscrire_competition',
                'qui_sommes_nous'=>'guest/qui_sommes_nous',
                'nos_objectifs'=>'guest/nos_objectifs',
                'reseau_4c' => 'guest/reseau_4c',
                'stage_emploi'=>'guest/stage_emploi'
                
            ],
        ],
        'Administrateur_etab'=>[
            'header'=>'etablissement/header_admin',
            'footer'=>'etablissement/footer_admin',
            'routes'=>array(
                'dashboard','appel_a_candidature','liste_appel_candidature','misejour_compte_admin','liste_capsules_videos',
                'demandes_creation_projets','details_projects_etudiant','list_actualite','ajout_actualite','liste_newsletters','ajout_newsletter','liste_subscribers',
                'liste_projets_acceptes','liste_projets_en_cours_d_etudes','ajout_evenement','liste_evenements','ajout_competition','liste_competitions','liste_inscrits_accepte_refuse','rendez_vous_calendar',
                'liste_projets_1er_validation','liste_projets_initiateurs','liste_projets_innovateurs','liste_projets_promoteurs','liste_projets_refuses',
                'commite_selection','liste_rendez_vous_comite','randez-vous','echanges_history','project_non_affecte_initiateur','project_non_affecte_innovateur','project_non_affecte_promoteur',
                'project_affecte_initiateur','project_affecte_innovateur','project_affecte_promoteur','mise_a_jour_profile_admin','profile_referent','demande_formation_en_cours','all_formations',
                'detail_formation','update_formation_etab','profile_etudiant','details_randez_vous','gestion_stage_emploi','demande_coaching_en_cours','all_coaching',
                'detail_coaching'
            ),
            'pagelocations'=>[
                'dashboard'=>'etablissement/dashboard',
                'appel_a_candidature'=>'etablissement/appel_a_candidature',
                'liste_appel_candidature'=>'etablissement/liste_appel_candidature',
                'misejour_compte_admin'=>'etablissement/misejour_compte_admin',
                'liste_capsules_videos'=>'etablissement/liste_capsules_videos',
                'demandes_creation_projets'=>'etablissement/demandes_creation_projets',
                'details_projects_etudiant'=>'etablissement/details_projects_etudiant',
                'list_actualite'=>'etablissement/list_actualite',
                'ajout_actualite'=>'etablissement/ajout_actualite',
                'liste_newsletters'=>'etablissement/liste_newsletters',
                'ajout_newsletter'=>'etablissement/ajout_newsletter',
                'liste_subscribers'=>'etablissement/liste_subscribers',
                'liste_projets_acceptes'=>'etablissement/liste_projets_acceptes',
                'liste_projets_en_cours_d_etudes'=>'etablissement/liste_projets_en_cours_d_etudes',
                'ajout_evenement'=>'etablissement/ajout_evenement',
                'liste_evenements'=>'etablissement/liste_evenements',
                'ajout_competition'=>'etablissement/ajout_competition',
                'liste_competitions' => 'etablissement/liste_competitions',
                'liste_inscrits_accepte_refuse'=>'etablissement/liste_inscrits_accepte_refuse',
                'rendez_vous_calendar'=>'etablissement/rendez_vous_calendar',
                'liste_projets_1er_validation'=>'etablissement/liste_projets_1er_validation',
                'liste_projets_initiateurs'=>'etablissement/liste_projets_initiateurs',
                'liste_projets_innovateurs'=>'etablissement/liste_projets_innovateurs',
                'liste_projets_promoteurs'=>'etablissement/liste_projets_promoteurs',
                'liste_projets_refuses'=>'etablissement/liste_projets_refuses',
                'commite_selection'=>'etablissement/commite_selection',
                'liste_rendez_vous_comite'=>'etablissement/liste_rendez_vous_comite',
                'randez-vous'=>'etablissement/randez-vous',
                'echanges_history'=>'etablissement/echanges_history',
                'project_non_affecte_initiateur'=>'etablissement/project_non_affecte_initiateur',
                'project_non_affecte_innovateur'=>'etablissement/project_non_affecte_innovateur',
                'project_non_affecte_promoteur'=>'etablissement/project_non_affecte_promoteur',
                'project_affecte_initiateur'=>'etablissement/project_affecte_initiateur',
                'project_affecte_innovateur'=>'etablissement/project_affecte_innovateur',
                'project_affecte_promoteur'=>'etablissement/project_affecte_promoteur',
                'mise_a_jour_profile_admin'=>'etablissement/mise_a_jour_profile_admin',
                'profile_referent'=>'etablissement/profile_referent',
                'demande_formation_en_cours'=>'etablissement/demande_formation_en_cours',
                'all_formations'=> 'etablissement/all_formations',
                
                'detail_formation'=>'etablissement/detail_formation',
                'update_formation_etab'=>'etablissement/gestion_formation/update_formation',
                'profile_etudiant'=>'etablissement/profile_etudiant',
                'group_progress'=>'enseignant/group_progress',
                'group_parcours'=>'enseignant/group_parcours',
                'details_randez_vous'=>'utils/details_randez_vous',
                'gestion_stage_emploi'=>'etablissement/gestion_stage_emploi',
                'demande_coaching_en_cours'=>'etablissement/demande_coaching_en_cours',
                'all_coaching'=>'etablissement/all_coaching',
                'detail_coaching'=>'etablissement/detail_coaching'
                
            ]
        ],

    ];
    function __construct()
    {
       parent::__construct();
       $this->load->helper('url');
       $this->load->library('session');
       $this->load->model('model_etablissement');
       $this->load->model('model_appel_candidature');
       $this->load->model('model_projet');
       $this->load->model('model_message');
       $this->load->model('model_news');
       $this->load->model('model_grille_evaluation');
       $this->load->model('Model_capsule');
       $this->load->model('model_randezvous');
       $this->load->model('model_tuteur');
       $this->load->model('model_seance');
       $this->load->model('model_formation');
       $this->load->model('model_coaching');
       $this->load->model('model_admin');
       $this->load->model('model_emploi_stage');
       $this->load->model('model_user');
       $this->load->model('model_domaine');
       $this->load->database();
    }
    public function view($page='acceuil'){
        $lastPage = $page;
        if($_SERVER['QUERY_STRING'] && $_SERVER['QUERY_STRING']!=''){
            $lastPage=$page.'?'.$_SERVER['QUERY_STRING']; 
        }
        $this->session->set_userdata('last_url',$lastPage );    
            
        $this->data['title']=$page;
        if ($page == 'logged' || $page == 'register'){
            if($page=='register'){
                $this->data['etabs'] = $this->model_etablissement->getEtablissementActive();
            }
            $this->load->view('auth/header_login', $this->data);
            $this->load->view('auth/' . $page, $this->data);                

        }

        else{
            $userType = $this->session->userdata()['logged']['type'];
         
            if (!$this->session->userdata()['logged']){
                $userType = 'guest';
            }

            if($userType=='Administrateur' || $userType=='Etudiant' || $userType=='Enseignant' || $userType=='Enseignant_Professionnel'|| $userType=='Administrateur_etab'){
                if($page == 'acceuil' || $page == 'capsules_videos' || $page == 'appel_a_candidature_active'|| $page =='actualite' || $page == 'contactez_nous' || $page == 'evenement'
                   || $page == 'sinscrire_evenement' || $page == 'competition'|| $page == 'sinscrire_competition'|| $page =='nos_objectifs' || $page == 'qui_sommes_nous'||$page =='reseau_4c'
                   || $page == 'stage_emploi'
                ){

                    $appel = $this->model_appel_candidature->getAppelcandidatureStat();
                    $this->data['nom'] = $appel['nom'];
                    $this->data['date_debut'] = $appel['date_debut'];
                    $this->data['date_fin'] = $appel['date_fin'];
                    $this->data['domaine'] =$appel['domaines'];
                    $this->data['description'] =$appel['description'];
                    $this->data['sujet'] =$appel['sujet'];

                    $this->data['appel'] = $this->model_appel_candidature->getAppelsDispo();

                    $this->data['actualite'] = $this->model_news->news_section();
                    $this->data['evenement'] = $this->model_news->news_section_evenement();
                    $this->data['evenements'] = $this->model_news->getEvent();
                    $this->data['competition'] = $this->model_news->news_section_competition();
                    $this->data['competitions'] = $this->model_news->getCompeti();
                    $this->data['capsules'] = $this->Model_capsule->capsules_section();
                    $this->load->view('guest/header_guest', $this->data);
                    
                    $this->load->view('guest'.'/'.$page, $this->data);
                    $this->load->view('guest/footer_guest', $this->data);
                }
                else{
                    $user_routes = $this->routes[$userType]['routes'];
           
                    $header = $this->routes[$userType]['header'];
                    $footer = $this->routes[$userType]['footer'];
                    $pagelocation = $this->routes[$userType]['pagelocations'][$page];
                   
                    if($page=='fiche_information'){
                        $this->data['etabs'] = $this->model_etablissement->getEtablissementActive();
                    }
                    if($page == 'project_affecte_initiateur' || $page == 'project_affecte_innovateur' || $page == 'project_affecte_promoteur'){
                        $this->data['referent'] = $this->model_projet->getAllReferents();
                    }
                    if ($page =='appel_a_candidature' || $page == 'liste_appel_candidature' || $page=='ajout_project'||$page=='update_project' || $page =='list_referents'
                        || $page =='liste_etudiant'|| $page =='commite_selection'||$page=='all_formations'||$page=='all_formations_referent'
                    ){
                       
                        if($page=='ajout_project'){
                            $appel_id = null;
                            if(isset($_GET['id_appel']) ){
                                $appel = $this->model_projet->getValidAppel(intval($_GET['id_appel']));
                                $appel_id =$appel['id'];
                                   
                                $this->data['appel']=$appel_id;
                               
                                $this->data['etabs'] = $this->model_etablissement->getEtablissementActive();
                            }
                            if(!$appel_id){
                                show_404();
                                return;
                            }
                            $this->model_projet->deleteAllCacheUsers($appel_id,$this->getIdEtudiant());
                        }
                        if($page=='update_project'){
                            if(isset($_GET['project_id']) ){
                                $info = $this->model_projet->getProjectForUpdate(intval($_GET['project_id']));
                                if(!$info){
                                    show_404();
                                    return;
                                }
                                $this->data['info']=$info;
                                
                            }
                            else{
                                
                                    show_404();
                                    return;
                                
                            }
                        }
                        $this->data['domaine'] = $this->model_appel_candidature->getAlldomaines();
                        $this->data['etablissements'] = $this->model_tuteur->getAllEtablissements();
                        $this->data['referent'] = $this->model_projet->getAllReferents();
                      
                    }
                    if($page=='details_projects_etudiant'){
                        $project_id = null;
                        if(isset($_GET['project_id']) ){
                            $info = $this->model_projet->getDetailsProjects(intval($_GET['project_id']));
                            if(!$info){
                                show_404();
                                return;
                            }
                            $this->data['info']=$info;
                            
                        }
                        else{
                            
                                show_404();
                                return;
                            
                        }
                       
                    }
                    if($page=='liste_rendez_vous_comite'){
                        $this->data['info'] = [
                            'etablissments'=>$this->model_etablissement->getEtablissementActive()
                        ];
                    }
                    //messagerie pags
                    if($page=='nouveau_messages_coach'){
                        $this->data['coachs']=$this->model_message->getUsersForMessages('Enseignant','coach');
                    }
                   
                    if($page=='echange_enseignant'){
                        $info = $this->prepareExchagePage();
                        if(!$info){
                            show_404();
                            return;
                        }
                        $this->data['info']=$info;
                    }
                    if($page=='echanges_history'){
                        $info = $this->preparePageExchangeHistory();
                        if(!$info){
                            show_404();
                            return;
                        }
                        $this->data['info']=$info;
                    }
                    if($page=='echange_etudiant'){
                        $info = $this->prepareExchagePage();
                        if(!$info){
                            show_404();
                            return;
                        }
                        $this->data['info']=$info;
                    }
                    if($page=='echange_enseignant_innovateur'){
                        $info = $this->prepareExchagePage('innovateur');
                        if(!$info){
                            show_404();
                            return;
                        }
                        $this->data['info']=$info;
                    }
                    if($page=='echange_etudiant_innovateur'){
                        $info = $this->prepareExchagePage('innovateur');
                        if(!$info){
                            show_404();
                            return;
                        }
                        $this->data['info']=$info;
                    }
                    if($page=='echange_enseignant_promoteur'){
                        $info = $this->prepareExchagePage('promoteur');
                        if(!$info){
                            show_404();
                            return;
                        }
                        $this->data['info']=$info;
                    }
                    if($page=='echange_etudiant_promoteur'){
                        $info = $this->prepareExchagePage('promoteur');
                        if(!$info){
                            show_404();
                            return;
                        }
                        $this->data['info']=$info;
                    }
                    if($page=='grille_evaluation'){
                        $info = $this->prepareGrillePage();

                        if(!$info){
                            show_404();
                            return;
                        }
                        $this->data['info']=$info;
                    }
                    if($page=='randez-vous'){
                        $info=$this->preparePageRandezVous();
                        if(!$info){
                            show_404();
                            return;
                        }
                        $this->data['info']=$info;
                    }
                    if($page=='profile_etudiant'){
                        $info=$this->prepareEtudiantProfilePage();
                        if(!$info){
                            show_404();
                            return;
                        }
                        $this->data['info']=$info;
                    }
                    if($page=='profile_referent'){
                        $info=$this->prepareReferentProfilePage();
                        if(!$info){
                            show_404();
                            return;
                        }
                        $this->data['info']=$info;
                    }
                    if($page=='detail_formation' ||$page=='detail_formation_referent'){
                        $info=$this->prepareFormationPage();
                        if(!$info){
                            show_404();
                            return;
                        }
                        $this->data['info']=$info;
                    }
                    if($page=='detail_coaching' ||$page=='detail_coaching_referent'){
                        $info=$this->prepareCoachingPage();
                        if(!$info){
                            show_404();
                            return;
                        }
                        $this->data['info']=$info;
                    }
                    if($page=='group_progress'){
                        $info=$this->prepareProgressPage();
                        if(!$info){
                            show_404();
                            return;
                        }
                        $this->data['info']=$info;
                    }
                    if($page=='group_parcours' || $page=='parcours_groupe_etudiant'){
                        $info=$this->prepareFormationPage();
                        if(!$info){
                            show_404();
                            return;
                        }
                        $this->data['info']=$info;
                    }
                    if($page=='details_exercices'){
                        $info=$this->prepareDetailsActivityPage();
                        if(!$info){
                            show_404();
                            return;
                        }
                        $this->data['info']=$info;
                    }
                    if($page=='details_randez_vous'){
                        $info=$this->prepareDetailsRandezVousPage();
                        if(!$info){
                            show_404();
                            return;
                        }
                        $this->data['info']=$info;
                    }
                    if($page=='update_formation'){
                        $info=$this->prepareUpdateFormationPage();
                        if(!$info){
                            show_404();
                            return;
                        }
                        $this->data['info']=$info;
                    }
                    if($page=='update_formation_etab'){
                        $info=$this->prepareUpdateFormationPageEtab();
                        if(!$info){
                            show_404();
                            return;
                        }
                        $this->data['info']=$info;
                    }
                    if(in_array($page,$user_routes)){
                        
                        $this->load->view($header, $this->data);
                        $this->load->view($pagelocation, $this->data);
                        $this->load->view($footer, $this->data);
                    }
                    else{
                        show_404();
                    }
                }
            }
            else{

                $user_routes = $this->routes[$userType]['routes'];
                $header = $this->routes[$userType]['header'];
                $footer = $this->routes[$userType]['footer'];
                $pagelocation = $this->routes[$userType]['pagelocations'][$page];
                
                if ($page == 'acceuil'){
                    $appel = $this->model_appel_candidature->getAppelcandidatureStat();
                    $this->data['nom'] = $appel['nom'];
                    $this->data['date_debut'] = $appel['date_debut'];
                    $this->data['date_fin'] = $appel['date_fin'];
                    $this->data['domaine'] =$appel['domaines'];
                    $this->data['description'] =$appel['description'];
                    $this->data['sujet'] =$appel['sujet'];
                    $this->data['capsules'] = $this->Model_capsule->capsules_section();
                } 
                if ($page == 'appel_a_candidature_active'){
                    $this->data['appel'] = $this->model_appel_candidature->getAppelsDispo();
                }
                if($page == 'evenement'){
                    $this->data['evenement'] = $this->model_news->news_section_evenement();
                }
                if($page == 'sinscrire_evenement'){
                    $this->data['evenements'] = $this->model_news->getEvent();
                }
                if($page == 'competition'){
                    $this->data['competition'] = $this->model_news->news_section_competition();
                }
                if($page == 'sinscrire_competition'){
                    $this->data['competitions'] = $this->model_news->getCompeti();
                }
                if($page == 'actualite'){
                    $this->data['actualite'] = $this->model_news->news_section();
                }
                
                if(in_array($page,$user_routes)){
                    
                    $this->load->view($header, $this->data);
                    $this->load->view($pagelocation, $this->data);
                    $this->load->view($footer, $this->data);
                }
                else{
                    show_404();
                }
            }

            
            
        }
        

    }
    private function prepareExchagePage($type='initiateur'){
        if(!isset($_GET['seance_id'])){
            return null;
        }
        $seance=null;
        if($type=='initiateur'){
            $seance = $this->model_seance->getSeanceById(intval($_GET['seance_id']));
        
        }
        if($type=='innovateur'){
            $seance = $this->model_seance->getSeanceInnovateurById(intval($_GET['seance_id']));
        }
        if($type=='promoteur'){
            $seance = $this->model_seance->getSeancePromoteurById(intval($_GET['seance_id']));
        }
        $members = $this->model_projet->getMembresProject($seance['id_projet']);
            $referent = $this->model_projet->getEnseignantsForProject($seance['id_projet'])[0];
        
        if(!$seance){
            return null;
        }
        return [
            'seance'=>$seance,
            'members'=>$members,
            'refrent'=>$referent
        ];
    }
    private function prepareGrillePage(){
        if(!isset($_GET['project_id'],$_GET['referent_id']) ){
            return null;
        }
        
        $info = $this->model_projet->getProjectForGrille($_GET['project_id']);
        $info['grille']= $this->model_grille_evaluation->get_grille($_GET['project_id'],$_GET['referent_id']);
        return $info;
    }
    private function prepareReferentProfilePage(){
        if(isset($_GET['referent_id'])){
            $referent_id=intval($_GET['referent_id']);
            $referent = $this->model_tuteur->getTuteurProfile($referent_id);
            
            return $referent;
            
        }
        else{
            return false;
        }


    }
    private function prepareEtudiantProfilePage(){
        if(isset($_GET['etudiant_id'])){
            $etudiant_id=intval($_GET['etudiant_id']);
            $etudiant = $this->model_admin->getEtudiantWithEstablishment($etudiant_id);
            return [
                'etudiant'=>$etudiant
            ];
        }
        else{
            return false;
        }


    }
    private function prepareProgressPage(){
        
        if(isset($_GET['formation_id'])){
           $userRole = $this->getRoleUser();
            $formation = $this->model_formation->prepareProgressPage($_GET['formation_id'],$userRole,$this->getIdEnseignant());
            return [
                'formation'=>$formation
            ];
        }
        else{
            return null;
        }


    }
    public function prepareFormationPage(){
        if(isset($_GET['formation_id'])){
            $formationId=intval($_GET['formation_id']);
           return $this->model_formation->getDetailFormation($formationId);
            
        }
        else{
            return false;
        }

    }
    public function prepareCoachingPage(){
        if(isset($_GET['coaching_id'])){
            $coachingId=intval($_GET['coaching_id']);
           return $this->model_coaching->getDetailCoaching($coachingId);
            
        }
        else{
            return false;
        }

    }
    public function prepareDetailsActivityPage(){
        if(isset($_GET['activity_id'])){
            $activity_id=intval($_GET['activity_id']);
           return $this->model_activity->prepareDetailsActivityPage($activity_id,$this->getIdEtudiant());
        }
        else{
            return null;
        }
    }
    public function prepareDetailsRandezVousPage(){
        if(isset($_GET['randez_vous_id'])){
            $randezVousId=intval($_GET['randez_vous_id']);
           return $this->model_randezvous->prepareDetailsRandezVousPage($randezVousId);
        }
        else{
            return null;
        }
    }
    public function prepareUpdateFormationPage(){
        if(isset($_GET['formation_id'])){
            $formationId=intval($_GET['formation_id']);
           return $this->model_formation->prepareUpdateFormationPage($formationId);
        }
        else{
            return null;
        }

    }
    public function prepareUpdateFormationPageEtab(){
        if(isset($_GET['formation_id'])){
            $formationId=intval($_GET['formation_id']);
           return $this->model_formation->prepareUpdateFormationPage($formationId);
        }
        else{
            return null;
        }

    }

    private function isConnectedWithGoogle(){
        $userdata =$this->session->userdata()['logged'];
        return $this->model_randezvous->getValidToken($userdata);
    }
    private function prepareExchagePageForEtudiant($type='initiateur'){
            if(!isset($_GET['seance_id'])){
                return null;
            }
            if($type=='initiateur'){
                $seance = $this->model_seance->getSeanceById(intval($_GET['seance_id']));
            }
            if($type=='innovateur'){
                $seance = $this->model_seance->getSeanceInnovateurById(intval($_GET['seance_id']));
            }
            if($type=='promoteur'){
                $seance = $this->model_seance->getSeancePromoteurById(intval($_GET['seance_id']));
            }
            $members = $this->model_projet->getMembresProject($seance['id_projet']);
            $referent = $this->model_projet->getEnseignantsForProject($seance['id_projet'])[0];
            if(!$seance){
                return null;
            }
            return [
                'seance'=>$seance,
                'members'=>$members,
                'refrent'=>$referent
            ];
    }
    public function preparePageRandezVous(){
        $seance = null;
        $key = '';
        if(isset($_GET['seance_id'])){
            $seanceId=intval($_GET['seance_id']);
            $seance = $this->model_seance->getSeanceById($seanceId);
            $key = 'seance_id';
        }
        if(isset($_GET['seance_innovateur_id'])){
            $seanceId=intval($_GET['seance_innovateur_id']);
            $seance = $this->model_seance->getSeanceInnovateurById($seanceId);
            $key = 'seance_innovateur_id';
        }
        if(isset($_GET['seance_promoteur_id'])){
            $seanceId=intval($_GET['seance_promoteur_id']);
            $seance = $this->model_seance->getSeancePromoteurById($seanceId);
            $key = 'seance_promoteur_id';
        }
        if(!$seance){
            return null;
        }
        $googleInfo = $this->model_randezvous->getValidToken($this->session->userdata()['logged']);
        return [
            'googleInfo'=>$googleInfo,
            'seance'=>$seance,
            'key'=>$key
        ];

    }
    public function preparePageExchangeHistory(){
        $seance = null;
        $key = '';
        if(isset($_GET['seance_id'])){
            $seanceId=intval($_GET['seance_id']);
            $seance = $this->model_seance->getSeanceById($seanceId);
            $key = 'seance_id';
        }
        if(isset($_GET['seance_innovateur_id'])){
            $seanceId=intval($_GET['seance_innovateur_id']);
            $seance = $this->model_seance->getSeanceInnovateurById($seanceId);
            $key = 'seance_innovateur_id';
        }
        if(isset($_GET['seance_promoteur_id'])){
            $seanceId=intval($_GET['seance_promoteur_id']);
            $seance = $this->model_seance->getSeancePromoteurById($seanceId);
            $key = 'seance_promoteur_id';
        }
        if(!$seance){
            return null;
        }
        $members = $this->model_projet->getMembresProject($seance['id_projet']);
        $referent = $this->model_projet->getEnseignantsForProject($seance['id_projet'])[0];
        if(!$seance){
            return null;
        }
        return [
            'seance'=>$seance,
            'members'=>$members,
            'refrent'=>$referent,
            'key'=>$key
        ];

    }
    private function getIdEtudiant(){
        return $this->session->userdata()['logged']['etudiant_id'];


    }





}

















?>
-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 29, 2024 at 03:36 PM
-- Server version: 8.2.0
-- PHP Version: 8.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `esenscw1`
--

-- --------------------------------------------------------

--
-- Table structure for table `28_2024_2024_appel_a_candidature`
--

DROP TABLE IF EXISTS `28_2024_2024_appel_a_candidature`;
CREATE TABLE IF NOT EXISTS `28_2024_2024_appel_a_candidature` (
  `id` int NOT NULL,
  `id1` int NOT NULL,
  `id2` int NOT NULL,
  `id3` int NOT NULL,
  `etab_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `28_2024_activities`
--

DROP TABLE IF EXISTS `28_2024_activities`;
CREATE TABLE IF NOT EXISTS `28_2024_activities` (
  `id` int NOT NULL AUTO_INCREMENT,
  `seance_id` int NOT NULL,
  `document` varchar(255) DEFAULT NULL,
  `titre` varchar(255) NOT NULL,
  `instructions` text NOT NULL,
  `etab_id` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `28_2024_activities`
--

INSERT INTO `28_2024_activities` (`id`, `seance_id`, `document`, `titre`, `instructions`, `etab_id`) VALUES
(3, 8, 'activity.pdf', 'Initiation CI/CD', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged', NULL),
(4, 10, 'docker.pdf', 'Pratiquer Docker', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book', NULL),
(5, 9, 'maintenance.pdf', 'Hands On', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged\r\n                                   \r\n\r\n                                ', NULL),
(6, 15, 'intro.pdf', 'Activité Peeso', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.                                   \r\n\r\n                                ', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `28_2024_appel_a_candidature`
--

DROP TABLE IF EXISTS `28_2024_appel_a_candidature`;
CREATE TABLE IF NOT EXISTS `28_2024_appel_a_candidature` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `sujet` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `date_debut` date NOT NULL,
  `date_fin` date NOT NULL,
  `domaine` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `photo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `etab_id` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `28_2024_appel_a_candidature`
--

INSERT INTO `28_2024_appel_a_candidature` (`id`, `nom`, `sujet`, `date_debut`, `date_fin`, `domaine`, `description`, `photo`, `etab_id`) VALUES
(1, 'Test', 'Sujett', '2024-10-02', '2024-11-21', '', 'test d\'un appel à candidature', 'https://esen-sci-compet.com/eesu/assets/assets/images/appel_a_candidature_dark7.jpg', NULL),
(2, 'test2', 'test2', '2024-10-03', '2024-10-03', '', 'test n°2', 'https://esen-sci-compet.com/eesu/assets/assets/images/projectcycle-1024x6141.jpg', NULL),
(3, 'appel à candidature', 'test', '2024-10-04', '2024-10-10', '', 'description test test', 'https://esen-sci-compet.com/eesu/assets/assets/images/projet1.jpg', NULL),
(4, 'Energie renouvelable', 'Electricité', '2024-10-08', '2024-10-31', '', 'test de la photo ', 'https://esen-sci-compet.com/eesu/assets/assets/images/projet21.jpeg', NULL),
(5, 'Intelligence artificielle', 'Application smart pour faciliter les tâches', '2024-10-14', '2024-10-21', '', 'Simplifier la tâche des étudiants entrepreneurs pour choisir un nom professionnel et adapté à leurs projets, pour corriger leurs rapports...', 'https://esen-sci-compet.com/eesu/assets/assets/images/projectcycle-1024x6143.jpg', NULL),
(6, 'testttt', 'testtttttttt', '2024-10-28', '2024-11-10', '', 'tesstttttttttt testtttttt testttttttttttttttt', 'https://esen-sci-compet.com/eesu/assets/assets/images/projectcycle-1024x6145.jpg', NULL),
(7, 'appel a candidature n2', 'appeeeeeel ', '2024-11-04', '2024-11-29', '', 'apeeeeeeellllllddd', 'https://esen-sci-compet.com/eesu/assets/assets/images/10d6ab35-8ccf-46c7-916c-8cc3943c143a.jpeg', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `28_2024_appel_domaine`
--

DROP TABLE IF EXISTS `28_2024_appel_domaine`;
CREATE TABLE IF NOT EXISTS `28_2024_appel_domaine` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_appel` int NOT NULL,
  `id_domaine` int NOT NULL,
  `etab_id` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `28_2024_appel_domaine`
--

INSERT INTO `28_2024_appel_domaine` (`id`, `id_appel`, `id_domaine`, `etab_id`) VALUES
(22, 4, 1, NULL),
(26, 3, 8, NULL),
(31, 2, 1, NULL),
(32, 2, 3, NULL),
(40, 5, 6, NULL),
(41, 5, 7, NULL),
(42, 6, 3, NULL),
(43, 6, 13, NULL),
(44, 1, 1, NULL),
(45, 1, 2, NULL),
(48, 7, 2, NULL),
(50, 8, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `28_2024_attribution_deroulement_initiateur`
--

DROP TABLE IF EXISTS `28_2024_attribution_deroulement_initiateur`;
CREATE TABLE IF NOT EXISTS `28_2024_attribution_deroulement_initiateur` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `id_attribution_seance` int NOT NULL,
  `etab_id` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=62 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `28_2024_attribution_deroulement_initiateur`
--

INSERT INTO `28_2024_attribution_deroulement_initiateur` (`id`, `nom`, `id_attribution_seance`, `etab_id`) VALUES
(1, 'Evaluation préalable des compétences\r\n', 1, NULL),
(2, 'Evaluation de la motivation de l’étudiant\r\n', 1, NULL),
(3, 'Identification du niveau d’avancement de l’idée\r\nVérification de l’adéquation entre le profil de l’étudiant et son idée de projet\r\n', 1, NULL),
(4, 'Vérification du degré de maitrise du contexte ', 1, NULL),
(5, 'économique et sociale de l’idée du\r\nprojet\r\n', 1, NULL),
(6, 'Présentation du planning d’accompagnement\r\n', 1, NULL),
(7, 'Explication de la démarche d’accompagnement', 1, NULL),
(8, ' Vérification et validation des requêtes de la séance 01', 2, NULL),
(9, 'Examen de l’étude documentaire du secteur d’activité\r\n', 2, NULL),
(10, 'Analyse de l’environnement PEST/ SWOT (facultatif)\r\n', 2, NULL),
(11, 'Identification du problème\r\n', 2, NULL),
(12, 'Présentation de la solution\r\n', 2, NULL),
(13, 'Description des segments clients (persona)\r\n', 2, NULL),
(14, 'Valider la proposition de valeur', 2, NULL),
(15, 'Vérification et validation des requêtes de la séance 02\r\n', 3, NULL),
(16, 'Elaborer las canaux de communication et de distribution\r\n', 3, NULL),
(17, 'Déterminer les relations clients\r\n', 3, NULL),
(18, 'Identifier les sources de revenus\r\n', 3, NULL),
(19, 'Préciser les différentes ressources clés\r\n', 3, NULL),
(20, 'Présenter les activités clés\r\n', 3, NULL),
(21, 'Identifier les partenaires stratégiques\r\n', 3, NULL),
(22, 'Déterminer la structure des coûts ', 3, NULL),
(23, 'Concevoir le Business Model Canvas/Business Lean Canvas (les différents blocs)', 3, NULL),
(24, 'Vérification et validation des requêtes de la séance 03\r\n', 4, NULL),
(25, 'Justifier le choix des clients cibles\r\n', 4, NULL),
(26, 'Enumérer les concurrents directs et indirects\r\n', 4, NULL),
(27, 'Choisir une technique d’étude de marché : qualitative/quantitative, focus groupe,\r\nenquête par questionnaire…', 4, NULL),
(28, 'Concevoir le questionnaire et/ou le guide d’entretien', 4, NULL),
(29, 'Vérification et validation des requêtes de la séance 04\r\n', 5, NULL),
(30, 'Justifier les hypothèses de base pour le calcul du chiffre d’affaires\r\n', 5, NULL),
(31, 'Compiler les données collectées (recherches documentaires &amp; enquête) ;\r\n', 5, NULL),
(32, 'Vérifier la cohérence de la stratégie marketing', 5, NULL),
(33, 'Valider l’étude de marché', 5, NULL),
(34, 'Vérification et validation des requêtes de la séance 05\r\n', 6, NULL),
(35, 'Examen du processus de fabrication ou de la chaine de valeur\r\n', 6, NULL),
(36, 'Identification des Besoins : Equipements, licences, brevets, ressources humaines\r\n', 6, NULL),
(37, 'Valider l’étude technique', 6, NULL),
(38, 'Vérification et validation des requêtes de la séance 06\r\n', 7, NULL),
(39, 'Examen de la liste des investissements\r\n', 7, NULL),
(40, 'Calcul du coût de l’investissement\r\n', 7, NULL),
(41, 'Choix des sources de financement adaptées aux besoins du projet\r\n', 7, NULL),
(42, 'Elaborer le schéma d’investissement et de financement\r\n', 7, NULL),
(43, 'Examiner les produits et des charges prévisionnelles', 7, NULL),
(44, 'Vérification et validation des requêtes de la séance 07\r\n', 8, NULL),
(45, 'Valider le tableau des produits et des charges prévisionnelles\r\n', 8, NULL),
(46, 'Elaborer le tableau de trésorerie prévisionnelle\r\n', 8, NULL),
(47, 'Calculer la rentabilité du projet en utilisant la VAN, le TRI et le DRCI\r\n', 8, NULL),
(48, 'Valider l’étude financière', 8, NULL),
(49, 'Vérification et validation des requêtes de la séance 08\r\n', 9, NULL),
(50, 'Justifier le choix de la forme juridique : Personne physique, SA, SUARL, SARL,\r\n', 9, NULL),
(51, 'Corriger les statuts de l’entreprise\r\n', 9, NULL),
(52, 'Valider les statuts de l’entreprise\r\n', 9, NULL),
(53, 'Préparer le dossier fiscal de l’entreprise', 9, NULL),
(54, 'Vérification et validation des requêtes de la séance 09\r\n', 10, NULL),
(55, 'Revoir toutes les parties du plan d’affaires\r\n', 10, NULL),
(56, 'Vérifier la cohérence du plan d’affaires\r\n', 10, NULL),
(57, 'Valider le plan d’affaires', 10, NULL),
(58, 'Vérification et validation des requêtes de la séance 10\r\n', 11, NULL),
(59, 'Analyse du pitch : verbale et non verbale\r\n', 11, NULL),
(60, 'Améliorer le PPT\r\n', 11, NULL),
(61, 'Présentation du projet en 3 minutes.', 11, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `28_2024_attribution_deroulement_innovateur`
--

DROP TABLE IF EXISTS `28_2024_attribution_deroulement_innovateur`;
CREATE TABLE IF NOT EXISTS `28_2024_attribution_deroulement_innovateur` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `id_attribution_seance` int NOT NULL,
  `etab_id` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=73 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `28_2024_attribution_deroulement_innovateur`
--

INSERT INTO `28_2024_attribution_deroulement_innovateur` (`id`, `nom`, `id_attribution_seance`, `etab_id`) VALUES
(1, 'Evaluation préalable des compétences\r\n', 1, NULL),
(2, 'Evaluation de la motivation de l’étudiant\r\n', 1, NULL),
(3, 'Identification du niveau d’avancement de l’idée\r\n', 1, NULL),
(4, 'Vérification de l’adéquation entre le profil de l’étudiant et son idée de projet\r\n', 1, NULL),
(5, 'Vérification du degré de maitrise du contexte économique et sociale de l’idée du projet\r\n', 1, NULL),
(6, 'Présentation du planning d’accompagnement', 1, NULL),
(7, 'Explication de la démarche d’accompagnement', 1, NULL),
(8, 'Vérification et validation des requêtes de la séance 01\r\n', 2, NULL),
(9, 'Examen de la démarche de la planification stratégique\r\n', 2, NULL),
(10, 'Diagnostic stratégique\r\n', 2, NULL),
(11, 'Identification des objectifs stratégiques et résultats clés à atteindre', 2, NULL),
(12, 'Elaboration du plan d’action et tableau de bord', 2, NULL),
(13, 'Vérification et validation des requêtes de la séance 02\r\n', 3, NULL),
(14, 'Identifier les compétences d’un bon leader\r\n', 3, NULL),
(15, 'Déterminer les relations de collaboration et de synergie des membres d’équipe', 3, NULL),
(16, 'Identifier et gérer les conflits de groupe', 3, NULL),
(17, 'Vérification et validation des requêtes de la séance 03 ', 4, NULL),
(18, 'Identification des types de risques\r\n', 4, NULL),
(19, 'Analyse des risques externes et internes\r\n', 4, NULL),
(20, 'Analyse et diagnostic des aspects des risques et problèmes', 4, NULL),
(21, 'Vérification et validation des requêtes de la séance 04\r\n', 5, NULL),
(22, 'Identifier les acteurs de l’écosystème entrepreneurial relatif au projet\r\n', 5, NULL),
(23, 'Analyser les opportunités et menaces de l’environnement externe et forces/faiblesses de\r\nl’environnement interne', 5, NULL),
(24, 'Vérification et validation des requêtes de la séance 05\r\n', 6, NULL),
(25, 'Analyse des besoins en communication des différents acteurs\r\n', 6, NULL),
(26, 'Constitution d’une base de données des différents besoins', 6, NULL),
(27, 'Formulation des objectifs de communication', 6, NULL),
(28, 'Vérification et validation des requêtes de la séance 06\r\n', 7, NULL),
(29, 'Présenter les différents types et formes de communication\r\n', 7, NULL),
(30, 'Présenter les différents canaux de communication', 7, NULL),
(31, 'Les étapes de l’elevator pitch', 7, NULL),
(32, 'Vérification et validation des requêtes de la séance 07\r\n', 8, NULL),
(33, 'Préciser les éléments du plan de communication \r\n', 8, NULL),
(34, 'Mise en œuvre des activités de communication', 8, NULL),
(35, 'Vérification et validation des requêtes de la séance 08\r\n', 9, NULL),
(36, 'Rédaction d’un questionnaire de satisfaction\r\n', 9, NULL),
(37, 'Collecter les informations\r\n', 9, NULL),
(38, 'Proposer des améliorations (au cas où il Ya une insatisfaction)', 9, NULL),
(39, 'Valider le plan de communication', 9, NULL),
(40, 'Vérification et validation des requêtes de la séance 09\r\n', 10, NULL),
(41, 'Présenter les techniques de prototypages\r\n', 10, NULL),
(42, 'Présenter des logiciels de prototypage', 10, NULL),
(43, 'Vérification et validation des requêtes de la séance 10\r\n', 11, NULL),
(44, 'Présenter les étapes du processus du test\r\n', 11, NULL),
(45, 'Présenter les techniques du test du prototype', 11, NULL),
(46, 'Vérification et validation des requêtes de la séance 11\r\n', 12, NULL),
(47, 'Déterminer l’étude qualitative de la clientèle cible\r\n', 12, NULL),
(48, 'Déterminer l’étude quantitative de la clientèle cible', 12, NULL),
(49, 'Vérification et validation des requêtes de la séance 12\r\n', 13, NULL),
(50, 'Identification des concurrents directs et indirects\r\n', 13, NULL),
(51, 'Choix des critères de comparaison entre ces concurrents\r\n', 13, NULL),
(52, 'Analyse comparative de la situation concurrentielle', 13, NULL),
(53, 'Vérification et validation des requêtes de la séance 13\r\n', 14, NULL),
(54, 'Présenter les stratégies commerciales', 14, NULL),
(55, 'Vérification et validation des requêtes de la séance 14\r\n', 15, NULL),
(56, 'Présenter le marketing Mix\r\n', 15, NULL),
(57, 'Définir les actions commerciales relatives au produit, au prix, à la promotion et à la place', 15, NULL),
(58, 'Vérification et validation des requêtes de la séance 15\r\n', 16, NULL),
(59, 'Présentation des différents types d’entreprises et statuts juridiques\r\n', 16, NULL),
(60, 'Présentation des instances nécessaires à la constitution de l’entreprise dans le contexte\r\nlocal/régional\r\n', 16, NULL),
(61, 'Présentation des opportunités et des avantages (fiscaux, accompagnements, subventions, etc.)', 16, NULL),
(62, 'Vérification et validation des requêtes de la séance 16\r\n', 17, NULL),
(63, 'Présentation des différents types d’entreprises et statuts juridiques\r\n', 17, NULL),
(64, 'Présentation des instances nécessaires à la constitution de l’entreprise dans le contexte\r\nlocal/régional\r\n', 17, NULL),
(65, 'Présentation des opportunités et des avantages (fiscaux, accompagnements, subventions, etc.)', 17, NULL),
(66, 'Vérification et validation des requêtes de la séance 17', 18, NULL),
(67, 'Présentation du schéma d’investissement et de financement\r\n', 18, NULL),
(68, 'Explication de la démarche de calcul du Chiffre d’affaires\r\n', 18, NULL),
(69, 'Présentation de l’estimation des charges d’exploitation et charges financières', 18, NULL),
(70, 'Présenter le compte d’exploitation prévisionnel\r\n', 19, NULL),
(71, 'Expliquer la démarche d’estimer la trésorerie prévisionnelle\r\n', 19, NULL),
(72, 'Exposer les différents Indicateurs de rentabilité ( Le Taux de Rentabilité Interne (TRI), la\r\nValeur Actuelle Nette (VAN), le Seuil de Rentabilité des premières années)', 19, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `28_2024_attribution_deroulement_promoteur`
--

DROP TABLE IF EXISTS `28_2024_attribution_deroulement_promoteur`;
CREATE TABLE IF NOT EXISTS `28_2024_attribution_deroulement_promoteur` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `id_attribution_seance` int NOT NULL,
  `etab_id` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `28_2024_attribution_deroulement_promoteur`
--

INSERT INTO `28_2024_attribution_deroulement_promoteur` (`id`, `nom`, `id_attribution_seance`, `etab_id`) VALUES
(1, 'Identifier les différentes parties prenantes à impliquer dans son projet,\r\n', 1, NULL),
(2, 'Mesurer le niveau d’intérêt et de pouvoir des parties prenantes sur le projet et discerner les\r\nnouvelles opportunités\r\n', 1, NULL),
(3, 'Classifier les parties prenantes', 1, NULL),
(4, 'Communiquer avec les parties prenantes afin de qualifier leurs attentes et les moyens d’action\r\nadaptés pour les influencer positivement\r\n', 2, NULL),
(5, 'Planifier une stratégie de négociation adaptée pour satisfaire les attentes communes (parties\r\nprenantes/ Entreprise)', 2, NULL),
(6, 'Vérification et validation des requêtes de la séance 2\r\n', 3, NULL),
(7, 'Définir le contenu des postes et les compétences requises\r\n', 3, NULL),
(8, 'Définir et choisir la structure organisationnelle (structure fonctionnelle, structure divisionnelle,\r\nstructure projet)', 3, NULL),
(9, 'Présentation des salaires de base, charges sociales et patronales\r\n', 4, NULL),
(10, 'définir les salaires et les autres composantes de rémunération\r\n', 4, NULL),
(11, 'Définir les étapes de recrutement', 4, NULL),
(12, 'Vérification et validation des requêtes de la séance 4\r\n', 5, NULL),
(13, 'Définir la charte de communication interne\r\n', 5, NULL),
(14, 'Présenter les différents types de motivation et structures incitatives\r\n', 5, NULL),
(15, 'Définir les types de conflits', 5, NULL),
(16, 'Vérification et validation des requêtes de la séance 5\r\n', 6, NULL),
(17, 'Présenter les outils d’identification des risques\r\n', 6, NULL),
(18, 'Définir les types de risques\r\n', 6, NULL),
(19, 'Évaluer et mesurer la criticité des risques', 6, NULL),
(20, 'Vérification et validation des requêtes de la séance 6\r\n', 7, NULL),
(21, 'Définir les approches de gestion de risques (évitement, réduction, transfert, acceptation)', 7, NULL),
(22, 'Vérification et validation des requêtes de la séance 7\r\n', 8, NULL),
(23, 'Présenter les outils de protection de la propriété intellectuelle (brevet, marque, certificat,\r\ndessins et modèles, secret)\r\n', 8, NULL),
(24, 'Présenter l’INNORPI (Institut national de la normalisation et de la propriété Intellectuelle) et\r\nses services', 8, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `28_2024_attribution_seance_initiateur`
--

DROP TABLE IF EXISTS `28_2024_attribution_seance_initiateur`;
CREATE TABLE IF NOT EXISTS `28_2024_attribution_seance_initiateur` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `num` int NOT NULL,
  `phase_id` int NOT NULL,
  `seance_parent` int DEFAULT NULL,
  `etab_id` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `28_2024_attribution_seance_initiateur`
--

INSERT INTO `28_2024_attribution_seance_initiateur` (`id`, `nom`, `num`, `phase_id`, `seance_parent`, `etab_id`) VALUES
(1, 'Prise de Contact (Brise Glace)', 1, 1, NULL, NULL),
(2, 'Bilan de Compétences', 2, 1, NULL, NULL),
(3, 'Valider l’idée du projet', 3, 2, NULL, NULL),
(6, ' Le Business Model (Exploration/Préparation)', 4, 3, NULL, NULL),
(7, 'Le Business Model (Validation/Confirmation)  ', 5, 3, NULL, NULL),
(8, 'L’étude de marché part(1)', 6, 4, NULL, NULL),
(9, 'L’étude de marché part(2)', 7, 4, NULL, NULL),
(10, 'L’étude technique', 8, 4, NULL, NULL),
(11, 'L’étude financière part(1) ', 9, 4, NULL, NULL),
(12, 'L’étude financière part(2) ', 10, 4, NULL, NULL),
(13, ' Le plan d’affaires (Validation/Confirmation)', 11, 4, NULL, NULL),
(14, 'Pitching', 12, 5, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `28_2024_attribution_seance_innovateur`
--

DROP TABLE IF EXISTS `28_2024_attribution_seance_innovateur`;
CREATE TABLE IF NOT EXISTS `28_2024_attribution_seance_innovateur` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `num` int NOT NULL,
  `phase_id` int NOT NULL,
  `etab_id` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `28_2024_attribution_seance_innovateur`
--

INSERT INTO `28_2024_attribution_seance_innovateur` (`id`, `nom`, `num`, `phase_id`, `etab_id`) VALUES
(1, 'Prise de Contact', 1, 1, NULL),
(2, 'Planifier le projet', 2, 1, NULL),
(3, 'Être un bon leader', 3, 1, NULL),
(4, 'La gestion des risques', 4, 1, NULL),
(5, 'Analyse de l’écosystème et du context du projet', 5, 2, NULL),
(6, 'Définition des objectifs de communication', 6, 2, NULL),
(7, 'La formulation du message', 7, 2, NULL),
(8, 'Le plan de communication', 8, 2, NULL),
(9, 'Le suivi et l’évaluation', 9, 2, NULL),
(10, 'La conception du prototype', 10, 3, NULL),
(11, 'Le test du prototype', 11, 3, NULL),
(12, 'L’étude de la clientèle cible', 12, 4, NULL),
(13, 'L’analyse de la concurrence', 13, 4, NULL),
(14, 'la stratégie commerciale', 14, 4, NULL),
(15, 'Le plan d’action Marketing', 15, 4, NULL),
(16, 'Conception de l’ingénierie juridique', 16, 4, NULL),
(17, 'Conception de l’ingénierie juridique', 17, 4, NULL),
(18, 'Schéma d’investissement et de financement', 18, 5, NULL),
(19, 'L’analyse de rentabilité', 19, 5, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `28_2024_attribution_seance_promoteur`
--

DROP TABLE IF EXISTS `28_2024_attribution_seance_promoteur`;
CREATE TABLE IF NOT EXISTS `28_2024_attribution_seance_promoteur` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `num` int NOT NULL,
  `phase_id` int NOT NULL,
  `etab_id` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `28_2024_attribution_seance_promoteur`
--

INSERT INTO `28_2024_attribution_seance_promoteur` (`id`, `nom`, `num`, `phase_id`, `etab_id`) VALUES
(1, 'Cartographie des parties prenantes du projet', 1, 1, NULL),
(2, 'Nouer des partenariats', 2, 1, NULL),
(3, 'Structure organisationnelle', 3, 2, NULL),
(4, 'Recrutement et rémunération', 4, 2, NULL),
(5, 'Politique de communication interne', 5, 2, NULL),
(6, 'Analyse des risques', 6, 3, NULL),
(7, 'Solutions des risques', 7, 3, NULL),
(8, 'La protection de la propriété intellectuelle et industrielle', 8, 3, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `28_2024_bilan_competance_initiateur`
--

DROP TABLE IF EXISTS `28_2024_bilan_competance_initiateur`;
CREATE TABLE IF NOT EXISTS `28_2024_bilan_competance_initiateur` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `observation` text,
  `evaluation` int DEFAULT NULL,
  `parameter_id` int NOT NULL,
  `project_id` int DEFAULT NULL,
  `etudiant_id` int DEFAULT NULL,
  `enseignant_id` int DEFAULT NULL,
  `updated` tinyint(1) NOT NULL DEFAULT '0',
  `valide` tinyint(1) DEFAULT '0',
  `etab_id` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=287 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `28_2024_bilan_competance_initiateur`
--

INSERT INTO `28_2024_bilan_competance_initiateur` (`id`, `name`, `observation`, `evaluation`, `parameter_id`, `project_id`, `etudiant_id`, `enseignant_id`, `updated`, `valide`, `etab_id`) VALUES
(105, 'Développer ses aptitudes de communication', NULL, 2, 1, 7, 1, NULL, 1, 0, NULL),
(106, 'Maîtriser les techniques de la communication verbale et non verbale', NULL, 2, 2, 7, 1, NULL, 1, 0, NULL),
(107, 'Gérer les conflits', NULL, 2, 3, 7, 1, NULL, 1, 0, NULL),
(108, 'Maîtriser la gestion du temps', NULL, 2, 4, 7, 1, NULL, 1, 0, NULL),
(109, 'Appliquer les méthodes efficaces pour la gestion d\'équipe', NULL, 2, 5, 7, 1, NULL, 1, 0, NULL),
(110, 'Acquérir les compétences sociales nécessaires pour créer et/ou renforcer son réseau : perception sociale, adaptabilité sociale, persuasion et influence,\r\nintelligence émotionnelle, marketing de soi', NULL, 2, 6, 7, 1, NULL, 1, 0, NULL),
(111, 'Mobiliser son réseau personnel (e.g. Famille, amis, membres futurs de son entreprise…)', NULL, 2, 7, 7, 1, NULL, 1, 0, NULL),
(112, 'Créer son réseau professionnel et d’affaires (Ex. clients, fournisseurs, hommes d’affaires, conseillers et experts comptables…)', NULL, 2, 8, 7, 1, NULL, 1, 0, NULL),
(113, 'Diversifier son réseau de support (e.g. ANETI, APII, Chambre de commerce, UTICA…)', NULL, 2, 9, 7, 1, NULL, 1, 0, NULL),
(114, 'Préparer son réseau de financement (e.g. Investisseurs, Banques, les société de leasing…)', NULL, 2, 10, 7, 1, NULL, 1, 0, NULL),
(115, 'Développer l’opportunité entrepreneuriale ', NULL, 2, 11, 7, 1, NULL, 1, 0, NULL),
(116, 'Avoir la capacité à innover/inventer/improviser et la capacité d’imaginer, de penser à des idées nouvelles/inédites/originales', NULL, 2, 12, 7, 1, NULL, 1, 0, NULL),
(117, 'Développer l’opportunité entrepreneuriale \r\n\r\n', NULL, 2, 13, 7, 1, NULL, 1, 0, NULL),
(118, 'Développer ses aptitudes de communication', '                        \r\n                   Je L ai maitrise                               ', 3, 1, 7, NULL, 2, 1, 1, NULL),
(119, 'Maîtriser les techniques de la communication verbale et non verbale', '                        \r\n                   Je L ai maitrise                               ', 3, 2, 7, NULL, 2, 1, 1, NULL),
(120, 'Gérer les conflits', '                        \r\n                   Je L ai maitrise                               ', 3, 3, 7, NULL, 2, 1, 1, NULL),
(121, 'Maîtriser la gestion du temps', '                        \r\n                   Je L ai maitrise                               ', 3, 4, 7, NULL, 2, 1, 1, NULL),
(122, 'Appliquer les méthodes efficaces pour la gestion d\'équipe', '                        \r\n                   Je L ai maitrise                               ', 3, 5, 7, NULL, 2, 1, 1, NULL),
(123, 'Acquérir les compétences sociales nécessaires pour créer et/ou renforcer son réseau : perception sociale, adaptabilité sociale, persuasion et influence,\r\nintelligence émotionnelle, marketing de soi', '                                ', 3, 6, 7, NULL, 2, 1, 1, NULL),
(124, 'Mobiliser son réseau personnel (e.g. Famille, amis, membres futurs de son entreprise…)', '                                ', 3, 7, 7, NULL, 2, 1, 1, NULL),
(125, 'Créer son réseau professionnel et d’affaires (Ex. clients, fournisseurs, hommes d’affaires, conseillers et experts comptables…)', '                                ', 3, 8, 7, NULL, 2, 1, 1, NULL),
(126, 'Diversifier son réseau de support (e.g. ANETI, APII, Chambre de commerce, UTICA…)', '                                ', 3, 9, 7, NULL, 2, 1, 1, NULL),
(127, 'Préparer son réseau de financement (e.g. Investisseurs, Banques, les société de leasing…)', '                                ', 3, 10, 7, NULL, 2, 1, 0, NULL),
(128, 'Développer l’opportunité entrepreneuriale ', '                                ', 3, 11, 7, NULL, 2, 1, 1, NULL),
(129, 'Avoir la capacité à innover/inventer/improviser et la capacité d’imaginer, de penser à des idées nouvelles/inédites/originales', '                                ', 3, 12, 7, NULL, 2, 1, 1, NULL),
(130, 'Développer l’opportunité entrepreneuriale \r\n\r\n', '                                ', 3, 13, 7, NULL, 2, 1, 1, NULL),
(144, 'Développer ses aptitudes de communication', 'Développer ses aptitudes de communication', 2, 1, 12, NULL, 5, 1, 1, NULL),
(145, 'Maîtriser les techniques de la communication verbale et non verbale', 'Développer ses aptitudes de communication', 2, 2, 12, NULL, 5, 1, 1, NULL),
(146, 'Gérer les conflits', 'Développer ses aptitudes de communication', 1, 3, 12, NULL, 5, 1, 0, NULL),
(147, 'Maîtriser la gestion du temps', 'Développer ses aptitudes de communication', 1, 4, 12, NULL, 5, 1, 0, NULL),
(148, 'Appliquer les méthodes efficaces pour la gestion d\'équipe', 'Développer ses aptitudes de communication', 1, 5, 12, NULL, 5, 1, 0, NULL),
(149, 'Acquérir les compétences sociales nécessaires pour créer et/ou renforcer son réseau : perception sociale, adaptabilité sociale, persuasion et influence,\r\nintelligence émotionnelle, marketing de soi', 'Développer ses aptitudes de communication', 1, 6, 12, NULL, 5, 1, 0, NULL),
(150, 'Mobiliser son réseau personnel (e.g. Famille, amis, membres futurs de son entreprise…)', 'Développer ses aptitudes de communicationDévelopper ses aptitudes de communication', 1, 7, 12, NULL, 5, 1, 0, NULL),
(151, 'Créer son réseau professionnel et d’affaires (Ex. clients, fournisseurs, hommes d’affaires, conseillers et experts comptables…)', 'Développer ses aptitudes de communication', 1, 8, 12, NULL, 5, 1, 1, NULL),
(152, 'Diversifier son réseau de support (e.g. ANETI, APII, Chambre de commerce, UTICA…)', 'Développer ses aptitudes de communication', 1, 9, 12, NULL, 5, 1, 1, NULL),
(153, 'Préparer son réseau de financement (e.g. Investisseurs, Banques, les société de leasing…)', 'Développer ses aptitudes de communication', 1, 10, 12, NULL, 5, 1, 1, NULL),
(154, 'Développer l’opportunité entrepreneuriale ', 'Développer ses aptitudes de communication', 2, 11, 12, NULL, 5, 1, 1, NULL),
(155, 'Avoir la capacité à innover/inventer/improviser et la capacité d’imaginer, de penser à des idées nouvelles/inédites/originales', 'Développer ses aptitudes de communication', 3, 12, 12, NULL, 5, 1, 0, NULL),
(156, 'Développer l’opportunité entrepreneuriale \r\n\r\n', 'Développer ses aptitudes de communication', 2, 13, 12, NULL, 5, 1, 0, NULL),
(170, 'Développer ses aptitudes de communication', NULL, 3, 1, 12, 9, NULL, 1, 0, NULL),
(171, 'Maîtriser les techniques de la communication verbale et non verbale', NULL, 3, 2, 12, 9, NULL, 1, 0, NULL),
(172, 'Gérer les conflits', NULL, 3, 3, 12, 9, NULL, 1, 0, NULL),
(173, 'Maîtriser la gestion du temps', NULL, 3, 4, 12, 9, NULL, 1, 0, NULL),
(174, 'Appliquer les méthodes efficaces pour la gestion d\'équipe', NULL, 3, 5, 12, 9, NULL, 1, 0, NULL),
(175, 'Acquérir les compétences sociales nécessaires pour créer et/ou renforcer son réseau : perception sociale, adaptabilité sociale, persuasion et influence,\r\nintelligence émotionnelle, marketing de soi', NULL, 2, 6, 12, 9, NULL, 1, 0, NULL),
(176, 'Mobiliser son réseau personnel (e.g. Famille, amis, membres futurs de son entreprise…)', NULL, 2, 7, 12, 9, NULL, 1, 0, NULL),
(177, 'Créer son réseau professionnel et d’affaires (Ex. clients, fournisseurs, hommes d’affaires, conseillers et experts comptables…)', NULL, 3, 8, 12, 9, NULL, 1, 0, NULL),
(178, 'Diversifier son réseau de support (e.g. ANETI, APII, Chambre de commerce, UTICA…)', NULL, 2, 9, 12, 9, NULL, 1, 0, NULL),
(179, 'Préparer son réseau de financement (e.g. Investisseurs, Banques, les société de leasing…)', NULL, 2, 10, 12, 9, NULL, 1, 0, NULL),
(180, 'Développer l’opportunité entrepreneuriale ', NULL, 3, 11, 12, 9, NULL, 1, 0, NULL),
(181, 'Avoir la capacité à innover/inventer/improviser et la capacité d’imaginer, de penser à des idées nouvelles/inédites/originales', NULL, 3, 12, 12, 9, NULL, 1, 0, NULL),
(182, 'Développer l’opportunité entrepreneuriale \r\n\r\n', NULL, 3, 13, 12, 9, NULL, 1, 0, NULL),
(196, 'Développer ses aptitudes de communication', 'elopper ses aptitudes de communication', 3, 1, 13, NULL, 5, 1, 1, NULL),
(197, 'Maîtriser les techniques de la communication verbale et non verbale', 'elopper ses aptitudes de communication', 3, 2, 13, NULL, 5, 1, 1, NULL),
(198, 'Gérer les conflits', 'elopper ses aptitudes de communication', 3, 3, 13, NULL, 5, 1, 1, NULL),
(199, 'Maîtriser la gestion du temps', 'elopper ses aptitudes de communication', 2, 4, 13, NULL, 5, 1, 0, NULL),
(200, 'Appliquer les méthodes efficaces pour la gestion d\'équipe', 'elopper ses aptitudes de communication', 2, 5, 13, NULL, 5, 1, 0, NULL),
(201, 'Acquérir les compétences sociales nécessaires pour créer et/ou renforcer son réseau : perception sociale, adaptabilité sociale, persuasion et influence,\r\nintelligence émotionnelle, marketing de soi', 'elopper ses aptitudes de communication', 2, 6, 13, NULL, 5, 1, 1, NULL),
(202, 'Mobiliser son réseau personnel (e.g. Famille, amis, membres futurs de son entreprise…)', '', 1, 7, 13, NULL, 5, 1, 0, NULL),
(203, 'Créer son réseau professionnel et d’affaires (Ex. clients, fournisseurs, hommes d’affaires, conseillers et experts comptables…)', '', 1, 8, 13, NULL, 5, 1, 0, NULL),
(204, 'Diversifier son réseau de support (e.g. ANETI, APII, Chambre de commerce, UTICA…)', '', 1, 9, 13, NULL, 5, 1, 0, NULL),
(205, 'Préparer son réseau de financement (e.g. Investisseurs, Banques, les société de leasing…)', '', 1, 10, 13, NULL, 5, 1, 0, NULL),
(206, 'Développer l’opportunité entrepreneuriale ', '', 1, 11, 13, NULL, 5, 1, 0, NULL),
(207, 'Avoir la capacité à innover/inventer/improviser et la capacité d’imaginer, de penser à des idées nouvelles/inédites/originales', '', 1, 12, 13, NULL, 5, 1, 0, NULL),
(208, 'Développer l’opportunité entrepreneuriale \r\n\r\n', 'elopper ses aptitudes de communication', 3, 13, 13, NULL, 5, 1, 1, NULL),
(222, 'Développer ses aptitudes de communication', NULL, 3, 1, 13, 9, NULL, 1, 0, NULL),
(223, 'Maîtriser les techniques de la communication verbale et non verbale', NULL, 2, 2, 13, 9, NULL, 1, 0, NULL),
(224, 'Gérer les conflits', NULL, 2, 3, 13, 9, NULL, 1, 0, NULL),
(225, 'Maîtriser la gestion du temps', NULL, 2, 4, 13, 9, NULL, 1, 0, NULL),
(226, 'Appliquer les méthodes efficaces pour la gestion d\'équipe', NULL, 2, 5, 13, 9, NULL, 1, 0, NULL),
(227, 'Acquérir les compétences sociales nécessaires pour créer et/ou renforcer son réseau : perception sociale, adaptabilité sociale, persuasion et influence,\r\nintelligence émotionnelle, marketing de soi', NULL, 3, 6, 13, 9, NULL, 1, 0, NULL),
(228, 'Mobiliser son réseau personnel (e.g. Famille, amis, membres futurs de son entreprise…)', NULL, 2, 7, 13, 9, NULL, 1, 0, NULL),
(229, 'Créer son réseau professionnel et d’affaires (Ex. clients, fournisseurs, hommes d’affaires, conseillers et experts comptables…)', NULL, 2, 8, 13, 9, NULL, 1, 0, NULL),
(230, 'Diversifier son réseau de support (e.g. ANETI, APII, Chambre de commerce, UTICA…)', NULL, 2, 9, 13, 9, NULL, 1, 0, NULL),
(231, 'Préparer son réseau de financement (e.g. Investisseurs, Banques, les société de leasing…)', NULL, 1, 10, 13, 9, NULL, 1, 0, NULL),
(232, 'Développer l’opportunité entrepreneuriale ', NULL, 1, 11, 13, 9, NULL, 1, 0, NULL),
(233, 'Avoir la capacité à innover/inventer/improviser et la capacité d’imaginer, de penser à des idées nouvelles/inédites/originales', NULL, 1, 12, 13, 9, NULL, 1, 0, NULL),
(234, 'Développer l’opportunité entrepreneuriale \r\n\r\n', NULL, 1, 13, 13, 9, NULL, 1, 0, NULL),
(248, 'Développer ses aptitudes de communication', NULL, 2, 1, 14, 13, NULL, 1, 0, NULL),
(249, 'Maîtriser les techniques de la communication verbale et non verbale', NULL, 2, 2, 14, 13, NULL, 1, 0, NULL),
(250, 'Gérer les conflits', NULL, 1, 3, 14, 13, NULL, 1, 0, NULL),
(251, 'Maîtriser la gestion du temps', NULL, 1, 4, 14, 13, NULL, 1, 0, NULL),
(252, 'Appliquer les méthodes efficaces pour la gestion d\'équipe', NULL, 1, 5, 14, 13, NULL, 1, 0, NULL),
(253, 'Acquérir les compétences sociales nécessaires pour créer et/ou renforcer son réseau : perception sociale, adaptabilité sociale, persuasion et influence,\r\nintelligence émotionnelle, marketing de soi', NULL, 3, 6, 14, 13, NULL, 1, 0, NULL),
(254, 'Mobiliser son réseau personnel (e.g. Famille, amis, membres futurs de son entreprise…)', NULL, 2, 7, 14, 13, NULL, 1, 0, NULL),
(255, 'Créer son réseau professionnel et d’affaires (Ex. clients, fournisseurs, hommes d’affaires, conseillers et experts comptables…)', NULL, 2, 8, 14, 13, NULL, 1, 0, NULL),
(256, 'Diversifier son réseau de support (e.g. ANETI, APII, Chambre de commerce, UTICA…)', NULL, 2, 9, 14, 13, NULL, 1, 0, NULL),
(257, 'Préparer son réseau de financement (e.g. Investisseurs, Banques, les société de leasing…)', NULL, 2, 10, 14, 13, NULL, 1, 0, NULL),
(258, 'Développer l’opportunité entrepreneuriale ', NULL, 2, 11, 14, 13, NULL, 1, 0, NULL),
(259, 'Avoir la capacité à innover/inventer/improviser et la capacité d’imaginer, de penser à des idées nouvelles/inédites/originales', NULL, 2, 12, 14, 13, NULL, 1, 0, NULL),
(260, 'Développer l’opportunité entrepreneuriale \r\n\r\n', NULL, 2, 13, 14, 13, NULL, 1, 0, NULL),
(274, 'Développer ses aptitudes de communication', 'Bien', 2, 1, 14, NULL, 5, 1, 1, NULL),
(275, 'Maîtriser les techniques de la communication verbale et non verbale', 'Bien', 3, 2, 14, NULL, 5, 1, 1, NULL),
(276, 'Gérer les conflits', 'Bie', 2, 3, 14, NULL, 5, 1, 1, NULL),
(277, 'Maîtriser la gestion du temps', 'Bien', 2, 4, 14, NULL, 5, 1, 1, NULL),
(278, 'Appliquer les méthodes efficaces pour la gestion d\'équipe', 'cc', 1, 5, 14, NULL, 5, 1, 0, NULL),
(279, 'Acquérir les compétences sociales nécessaires pour créer et/ou renforcer son réseau : perception sociale, adaptabilité sociale, persuasion et influence,\r\nintelligence émotionnelle, marketing de soi', '', 1, 6, 14, NULL, 5, 1, 0, NULL),
(280, 'Mobiliser son réseau personnel (e.g. Famille, amis, membres futurs de son entreprise…)', '', 1, 7, 14, NULL, 5, 1, 0, NULL),
(281, 'Créer son réseau professionnel et d’affaires (Ex. clients, fournisseurs, hommes d’affaires, conseillers et experts comptables…)', '', 1, 8, 14, NULL, 5, 1, 1, NULL),
(282, 'Diversifier son réseau de support (e.g. ANETI, APII, Chambre de commerce, UTICA…)', '', 3, 9, 14, NULL, 5, 1, 1, NULL),
(283, 'Préparer son réseau de financement (e.g. Investisseurs, Banques, les société de leasing…)', '', 1, 10, 14, NULL, 5, 1, 0, NULL),
(284, 'Développer l’opportunité entrepreneuriale ', '', 1, 11, 14, NULL, 5, 1, 0, NULL),
(285, 'Avoir la capacité à innover/inventer/improviser et la capacité d’imaginer, de penser à des idées nouvelles/inédites/originales', '', 1, 12, 14, NULL, 5, 1, 0, NULL),
(286, 'Développer l’opportunité entrepreneuriale \r\n\r\n', 'l’opportunité entrepreneuriale', 3, 13, 14, NULL, 5, 1, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `28_2024_bilan_competance_innovateur`
--

DROP TABLE IF EXISTS `28_2024_bilan_competance_innovateur`;
CREATE TABLE IF NOT EXISTS `28_2024_bilan_competance_innovateur` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `observation` text CHARACTER SET latin1 COLLATE latin1_swedish_ci,
  `evaluation` int DEFAULT NULL,
  `parameter_id` int NOT NULL,
  `project_id` int DEFAULT NULL,
  `etudiant_id` int DEFAULT NULL,
  `enseignant_id` int DEFAULT NULL,
  `updated` tinyint(1) NOT NULL DEFAULT '0',
  `valide` tinyint(1) NOT NULL DEFAULT '0',
  `etab_id` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=331 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `28_2024_bilan_competance_innovateur`
--

INSERT INTO `28_2024_bilan_competance_innovateur` (`id`, `name`, `observation`, `evaluation`, `parameter_id`, `project_id`, `etudiant_id`, `enseignant_id`, `updated`, `valide`, `etab_id`) VALUES
(67, 'Coordonner les diverses composantes d’un projet (les fonctions de planification et d’exécution du projet et de contrôle du changement)\r\nconformément à des normes de qualité, pour établir un juste milieu entre la durée, le coût et la qualité du projet', NULL, 2, 1, 7, 1, NULL, 1, 0, NULL),
(68, 'Veiller à ce que le projet soit réalisé dans les délais prescrits', NULL, 2, 2, 7, 1, NULL, 1, 0, NULL),
(69, 'Veiller à ce que le projet soit réalisé dans les limites du budget alloué', NULL, 2, 3, 7, 1, NULL, 1, 0, NULL),
(70, 'Veiller à ce que le produit/service réponde aux besoins', NULL, 2, 4, 7, 1, NULL, 1, 0, NULL),
(71, 'Faire preuve d’un leadership pour assurer un travail d’équipe de qualité', NULL, 2, 5, 7, 1, NULL, 1, 0, NULL),
(72, 'Identifier les éléments du contexte du projet utiles à la communication (parties prenantes, budget, temps alloué, les limitations, contraintes,\r\nopportunités...)', NULL, 3, 6, 7, 1, NULL, 1, 0, NULL),
(73, 'Définir le contenu des postes de travail en termes d’activités et de compétences et les positionner dans l’organigramme de l’entreprise', NULL, 3, 7, 7, 1, NULL, 1, 0, NULL),
(74, 'Analyser les différents groupes cibles (leurs importances, leurs implications dans le projet, leurs connaissances, leurs aptitudes, leurs attentes...)', NULL, 3, 8, 7, 1, NULL, 1, 0, NULL),
(75, 'Déterminer les objectifs de communication ( les résultats à atteindre, les objectifs formulés SMART, les indicateurs...)', NULL, 3, 9, 7, 1, NULL, 1, 0, NULL),
(76, 'Définir quels messages pour quels groupes cibles (les messages primaires, les messages secondaires adaptés en fonction des groupes cibles, Keep It\r\nShort and Simple, storytelling, elevator pitch...)', NULL, 3, 10, 7, 1, NULL, 1, 0, NULL),
(77, 'Etablir le plan d’actions (plan de communication visuel, planning de communication: tableau de bord et suivi des actions...)', NULL, 2, 11, 7, 1, NULL, 1, 0, NULL),
(78, 'Faire preuve d’écoute vis-à-vis des collaborateurs et être attentif aux problèmes et aux conflits', NULL, 2, 12, 7, 1, NULL, 1, 0, NULL),
(79, 'Faire le suivi et adapter : outil de travail qui doit évoluer en permanence basé sur un plan-do-chek-act', NULL, 2, 13, 7, 1, NULL, 1, 0, NULL),
(80, 'Evaluer et débriefer (objectifs sont atteints partiellement ou totalement, échec du plan, pistes d’amélioration, mesures d\'impact des actions, tirer des\r\nconclusions...)', NULL, 2, 14, 7, 1, NULL, 1, 0, NULL),
(81, 'Décrire l’activité avec précision (utilité des produits et/ou services, leurs caractéristiques, cible, lieu de vente...)', NULL, 2, 15, 7, 1, NULL, 1, 0, NULL),
(82, 'Etudier le marché visé (zone géographique, saisonnier ou permanent, niveau de concentration , barrières à l’entrée, types de clientèles, état actuel du\r\nmarché et ses tendances...)', NULL, 2, 16, 7, 1, NULL, 1, 0, NULL),
(83, 'Etudier la compatibilité de l\'innovateur avec le besoin du son projet (ses motivations, ses objectifs, son savoir-faire, son potentiel, s’il y a des\r\ncompétences manquantes et trouver des associés qui pourront les apporter...)', NULL, 2, 17, 7, 1, NULL, 1, 0, NULL),
(84, 'Analyser les forces et les faiblesses de l’idée (avantages par rapport à la concurrence et les contraintes du projet...)', NULL, 2, 18, 7, 1, NULL, 1, 0, NULL),
(85, 'Tester l’idée de création d’entreprise (sélectionner les testeurs, tester le produit/service, analyser les retours...)', NULL, 2, 19, 7, 1, NULL, 1, 0, NULL),
(86, 'Choisir la structure juridique selon la nature et l\'importance de l’activité (entreprise individuelle, SUARL, SARL, SA...)', NULL, 2, 20, 7, 1, NULL, 1, 0, NULL),
(87, 'Déterminer la forme de l’entreprise selon la nature de l’activité, la volonté de s’associer, l’organisation patrimoniale, l’engagement financier et la\r\ncrédibilité vis-à-vis des partenaires', NULL, 2, 21, 7, 1, NULL, 1, 0, NULL),
(88, 'Finaliser les formalités de constitution (attestations de dépôt de déclaration auprès de l\'API, déclaration d’ouverture de patente au bureau des impôts,\r\nenregistrement des statuts à la recette d’enregistrement des actes de sociétés...)', NULL, 2, 22, 7, 1, NULL, 1, 0, NULL),
(89, 'Faire une analyse stratégique du projet, recenser les opportunités de l’entreprise et les éventuelles difficultés à court, moyen ou long terme', NULL, 3, 23, 7, 1, NULL, 1, 0, NULL),
(90, 'Elaborer un plan de financement du projet : évaluer les besoins financiers pour la mise en œuvre et trouver les moyens qui couvrent les besoins', NULL, 2, 24, 7, 1, NULL, 1, 0, NULL),
(91, 'Donner une appréciation du chiffre d’affaires (hypothèse du taux d’utilisation de la capacité, production, prévision du chiffre d\'affaires...)', NULL, 3, 25, 7, 1, NULL, 1, 0, NULL),
(92, 'Estimer les charges du projet : s’acquitter de plusieurs charges, recenser toutes ces charges sans restriction aucune et d’en faire une synthèse', NULL, 2, 26, 7, 1, NULL, 1, 0, NULL),
(93, 'Etablir un compte de résultat prévisionnel : capacité à rembourser les emprunts et savoir s\'il y a suffisamment de bénéfices pour vivre du projet', NULL, 3, 27, 7, 1, NULL, 1, 0, NULL),
(94, 'Faire une étude financière qui permet de surveiller l’évolution de la trésorerie (e.g. sur 12 mois)', NULL, 2, 28, 7, 1, NULL, 1, 0, NULL),
(95, 'Créer un design du produit', NULL, 3, 29, 7, 1, NULL, 1, 0, NULL),
(96, 'Créer un prototype non fonctionnel (concevoir des plans 3D, 2D, établir le cahier des charges...)', NULL, 2, 30, 7, 1, NULL, 1, 0, NULL),
(97, 'Créer un prototype de produit fonctionnel (le chiffrage selon la quantité et les caractéristiques techniques...)', NULL, 3, 31, 7, 1, NULL, 1, 0, NULL),
(98, 'Valider des différents éléments du projet', NULL, 2, 32, 7, 1, NULL, 1, 0, NULL),
(99, 'Vérifier l’adéquation aux exigences préétablies (géométrie des prototypes, dimensions, caractéristiques visuelles/physiques /mécaniques, finition)', NULL, 3, 33, 7, 1, NULL, 1, 0, NULL),
(133, 'Coordonner les diverses composantes d’un projet (les fonctions de planification et d’exécution du projet et de contrôle du changement)\r\nconformément à des normes de qualité, pour établir un juste milieu entre la durée, le coût et la qualité du projet', 'Tres Bien', 3, 1, 7, NULL, 2, 1, 1, NULL),
(134, 'Veiller à ce que le projet soit réalisé dans les délais prescrits', 'Tres Bien', 3, 2, 7, NULL, 2, 1, 1, NULL),
(135, 'Veiller à ce que le projet soit réalisé dans les limites du budget alloué', 'Tres Bien', 3, 3, 7, NULL, 2, 1, 1, NULL),
(136, 'Veiller à ce que le produit/service réponde aux besoins', 'Tres Bien', 3, 4, 7, NULL, 2, 1, 1, NULL),
(137, 'Faire preuve d’un leadership pour assurer un travail d’équipe de qualité', 'Tres Bien', 3, 5, 7, NULL, 2, 1, 1, NULL),
(138, 'Identifier les éléments du contexte du projet utiles à la communication (parties prenantes, budget, temps alloué, les limitations, contraintes,\r\nopportunités...)', 'Tres Bien', 3, 6, 7, NULL, 2, 1, 1, NULL),
(139, 'Définir le contenu des postes de travail en termes d’activités et de compétences et les positionner dans l’organigramme de l’entreprise', 'Tres Bien', 3, 7, 7, NULL, 2, 1, 1, NULL),
(140, 'Analyser les différents groupes cibles (leurs importances, leurs implications dans le projet, leurs connaissances, leurs aptitudes, leurs attentes...)', 'Tres Bien', 3, 8, 7, NULL, 2, 1, 1, NULL),
(141, 'Déterminer les objectifs de communication ( les résultats à atteindre, les objectifs formulés SMART, les indicateurs...)', 'Tres Bien', 2, 9, 7, NULL, 2, 1, 1, NULL),
(142, 'Définir quels messages pour quels groupes cibles (les messages primaires, les messages secondaires adaptés en fonction des groupes cibles, Keep It\r\nShort and Simple, storytelling, elevator pitch...)', 'Tres Bien', 3, 10, 7, NULL, 2, 1, 1, NULL),
(143, 'Etablir le plan d’actions (plan de communication visuel, planning de communication: tableau de bord et suivi des actions...)', 'Tres Bien', 3, 11, 7, NULL, 2, 1, 1, NULL),
(144, 'Faire preuve d’écoute vis-à-vis des collaborateurs et être attentif aux problèmes et aux conflits', 'Tres Bien', 3, 12, 7, NULL, 2, 1, 1, NULL),
(145, 'Faire le suivi et adapter : outil de travail qui doit évoluer en permanence basé sur un plan-do-chek-act', 'Tres Bien', 1, 13, 7, NULL, 2, 1, 0, NULL),
(146, 'Evaluer et débriefer (objectifs sont atteints partiellement ou totalement, échec du plan, pistes d’amélioration, mesures d\'impact des actions, tirer des\r\nconclusions...)', 'Tres Bien', 1, 14, 7, NULL, 2, 1, 0, NULL),
(147, 'Décrire l’activité avec précision (utilité des produits et/ou services, leurs caractéristiques, cible, lieu de vente...)', 'Tres Bien', 1, 15, 7, NULL, 2, 1, 0, NULL),
(148, 'Etudier le marché visé (zone géographique, saisonnier ou permanent, niveau de concentration , barrières à l’entrée, types de clientèles, état actuel du\r\nmarché et ses tendances...)', 'Tres Bien', 1, 16, 7, NULL, 2, 1, 0, NULL),
(149, 'Etudier la compatibilité de l\'innovateur avec le besoin du son projet (ses motivations, ses objectifs, son savoir-faire, son potentiel, s’il y a des\r\ncompétences manquantes et trouver des associés qui pourront les apporter...)', 'Tres Bien', 1, 17, 7, NULL, 2, 1, 0, NULL),
(150, 'Analyser les forces et les faiblesses de l’idée (avantages par rapport à la concurrence et les contraintes du projet...)', 'Tres Bien', 1, 18, 7, NULL, 2, 1, 0, NULL),
(151, 'Tester l’idée de création d’entreprise (sélectionner les testeurs, tester le produit/service, analyser les retours...)', 'Tres Bien', 1, 19, 7, NULL, 2, 1, 0, NULL),
(152, 'Choisir la structure juridique selon la nature et l\'importance de l’activité (entreprise individuelle, SUARL, SARL, SA...)', 'Tres Bien', 1, 20, 7, NULL, 2, 1, 0, NULL),
(153, 'Déterminer la forme de l’entreprise selon la nature de l’activité, la volonté de s’associer, l’organisation patrimoniale, l’engagement financier et la\r\ncrédibilité vis-à-vis des partenaires', 'Tres Bien', 3, 21, 7, NULL, 2, 1, 1, NULL),
(154, 'Finaliser les formalités de constitution (attestations de dépôt de déclaration auprès de l\'API, déclaration d’ouverture de patente au bureau des impôts,\r\nenregistrement des statuts à la recette d’enregistrement des actes de sociétés...)', 'Tres Bien', 3, 22, 7, NULL, 2, 1, 1, NULL),
(155, 'Faire une analyse stratégique du projet, recenser les opportunités de l’entreprise et les éventuelles difficultés à court, moyen ou long terme', 'Tres Bien', 3, 23, 7, NULL, 2, 1, 1, NULL),
(156, 'Elaborer un plan de financement du projet : évaluer les besoins financiers pour la mise en œuvre et trouver les moyens qui couvrent les besoins', 'Tres Bien', 2, 24, 7, NULL, 2, 1, 1, NULL),
(157, 'Donner une appréciation du chiffre d’affaires (hypothèse du taux d’utilisation de la capacité, production, prévision du chiffre d\'affaires...)', 'Tres Bien', 3, 25, 7, NULL, 2, 1, 1, NULL),
(158, 'Estimer les charges du projet : s’acquitter de plusieurs charges, recenser toutes ces charges sans restriction aucune et d’en faire une synthèse', 'Tres Bien', 3, 26, 7, NULL, 2, 1, 1, NULL),
(159, 'Etablir un compte de résultat prévisionnel : capacité à rembourser les emprunts et savoir s\'il y a suffisamment de bénéfices pour vivre du projet', 'Tres Bien', 2, 27, 7, NULL, 2, 1, 1, NULL),
(160, 'Faire une étude financière qui permet de surveiller l’évolution de la trésorerie (e.g. sur 12 mois)', 'Tres Bien', 1, 28, 7, NULL, 2, 1, 1, NULL),
(161, 'Créer un design du produit', 'Tres Bien', 2, 29, 7, NULL, 2, 1, 1, NULL),
(162, 'Créer un prototype non fonctionnel (concevoir des plans 3D, 2D, établir le cahier des charges...)', 'Créer un prototyp', 2, 30, 7, NULL, 2, 1, 1, NULL),
(163, 'Créer un prototype de produit fonctionnel (le chiffrage selon la quantité et les caractéristiques techniques...)', 'Tres Bien', 3, 31, 7, NULL, 2, 1, 0, NULL),
(164, 'Valider des différents éléments du projet', 'Tres Bien', 3, 32, 7, NULL, 2, 1, 1, NULL),
(165, 'Vérifier l’adéquation aux exigences préétablies (géométrie des prototypes, dimensions, caractéristiques visuelles/physiques /mécaniques, finition)', 'Tres Bien', 3, 33, 7, NULL, 2, 1, 1, NULL),
(199, 'Coordonner les diverses composantes d’un projet (les fonctions de planification et d’exécution du projet et de contrôle du changement)\r\nconformément à des normes de qualité, pour établir un juste milieu entre la durée, le coût et la qualité du projet', NULL, 2, 1, 12, 9, NULL, 1, 0, NULL),
(200, 'Veiller à ce que le projet soit réalisé dans les délais prescrits', NULL, 2, 2, 12, 9, NULL, 1, 0, NULL),
(201, 'Veiller à ce que le projet soit réalisé dans les limites du budget alloué', NULL, 2, 3, 12, 9, NULL, 1, 0, NULL),
(202, 'Veiller à ce que le produit/service réponde aux besoins', NULL, 2, 4, 12, 9, NULL, 1, 0, NULL),
(203, 'Faire preuve d’un leadership pour assurer un travail d’équipe de qualité', NULL, 2, 5, 12, 9, NULL, 1, 0, NULL),
(204, 'Identifier les éléments du contexte du projet utiles à la communication (parties prenantes, budget, temps alloué, les limitations, contraintes,\r\nopportunités...)', NULL, 2, 6, 12, 9, NULL, 1, 0, NULL),
(205, 'Définir le contenu des postes de travail en termes d’activités et de compétences et les positionner dans l’organigramme de l’entreprise', NULL, 2, 7, 12, 9, NULL, 1, 0, NULL),
(206, 'Analyser les différents groupes cibles (leurs importances, leurs implications dans le projet, leurs connaissances, leurs aptitudes, leurs attentes...)', NULL, 2, 8, 12, 9, NULL, 1, 0, NULL),
(207, 'Déterminer les objectifs de communication ( les résultats à atteindre, les objectifs formulés SMART, les indicateurs...)', NULL, 2, 9, 12, 9, NULL, 1, 0, NULL),
(208, 'Définir quels messages pour quels groupes cibles (les messages primaires, les messages secondaires adaptés en fonction des groupes cibles, Keep It\r\nShort and Simple, storytelling, elevator pitch...)', NULL, 3, 10, 12, 9, NULL, 1, 0, NULL),
(209, 'Etablir le plan d’actions (plan de communication visuel, planning de communication: tableau de bord et suivi des actions...)', NULL, 3, 11, 12, 9, NULL, 1, 0, NULL),
(210, 'Faire preuve d’écoute vis-à-vis des collaborateurs et être attentif aux problèmes et aux conflits', NULL, 3, 12, 12, 9, NULL, 1, 0, NULL),
(211, 'Faire le suivi et adapter : outil de travail qui doit évoluer en permanence basé sur un plan-do-chek-act', NULL, 3, 13, 12, 9, NULL, 1, 0, NULL),
(212, 'Evaluer et débriefer (objectifs sont atteints partiellement ou totalement, échec du plan, pistes d’amélioration, mesures d\'impact des actions, tirer des\r\nconclusions...)', NULL, 3, 14, 12, 9, NULL, 1, 0, NULL),
(213, 'Décrire l’activité avec précision (utilité des produits et/ou services, leurs caractéristiques, cible, lieu de vente...)', NULL, 3, 15, 12, 9, NULL, 1, 0, NULL),
(214, 'Etudier le marché visé (zone géographique, saisonnier ou permanent, niveau de concentration , barrières à l’entrée, types de clientèles, état actuel du\r\nmarché et ses tendances...)', NULL, 3, 16, 12, 9, NULL, 1, 0, NULL),
(215, 'Etudier la compatibilité de l\'innovateur avec le besoin du son projet (ses motivations, ses objectifs, son savoir-faire, son potentiel, s’il y a des\r\ncompétences manquantes et trouver des associés qui pourront les apporter...)', NULL, 3, 17, 12, 9, NULL, 1, 0, NULL),
(216, 'Analyser les forces et les faiblesses de l’idée (avantages par rapport à la concurrence et les contraintes du projet...)', NULL, 3, 18, 12, 9, NULL, 1, 0, NULL),
(217, 'Tester l’idée de création d’entreprise (sélectionner les testeurs, tester le produit/service, analyser les retours...)', NULL, 3, 19, 12, 9, NULL, 1, 0, NULL),
(218, 'Choisir la structure juridique selon la nature et l\'importance de l’activité (entreprise individuelle, SUARL, SARL, SA...)', NULL, 3, 20, 12, 9, NULL, 1, 0, NULL),
(219, 'Déterminer la forme de l’entreprise selon la nature de l’activité, la volonté de s’associer, l’organisation patrimoniale, l’engagement financier et la\r\ncrédibilité vis-à-vis des partenaires', NULL, 3, 21, 12, 9, NULL, 1, 0, NULL),
(220, 'Finaliser les formalités de constitution (attestations de dépôt de déclaration auprès de l\'API, déclaration d’ouverture de patente au bureau des impôts,\r\nenregistrement des statuts à la recette d’enregistrement des actes de sociétés...)', NULL, 3, 22, 12, 9, NULL, 1, 0, NULL),
(221, 'Faire une analyse stratégique du projet, recenser les opportunités de l’entreprise et les éventuelles difficultés à court, moyen ou long terme', NULL, 1, 23, 12, 9, NULL, 1, 0, NULL),
(222, 'Elaborer un plan de financement du projet : évaluer les besoins financiers pour la mise en œuvre et trouver les moyens qui couvrent les besoins', NULL, 1, 24, 12, 9, NULL, 1, 0, NULL),
(223, 'Donner une appréciation du chiffre d’affaires (hypothèse du taux d’utilisation de la capacité, production, prévision du chiffre d\'affaires...)', NULL, 1, 25, 12, 9, NULL, 1, 0, NULL),
(224, 'Estimer les charges du projet : s’acquitter de plusieurs charges, recenser toutes ces charges sans restriction aucune et d’en faire une synthèse', NULL, 1, 26, 12, 9, NULL, 1, 0, NULL),
(225, 'Etablir un compte de résultat prévisionnel : capacité à rembourser les emprunts et savoir s\'il y a suffisamment de bénéfices pour vivre du projet', NULL, 1, 27, 12, 9, NULL, 1, 0, NULL),
(226, 'Faire une étude financière qui permet de surveiller l’évolution de la trésorerie (e.g. sur 12 mois)', NULL, 1, 28, 12, 9, NULL, 1, 0, NULL),
(227, 'Créer un design du produit', NULL, 1, 29, 12, 9, NULL, 1, 0, NULL),
(228, 'Créer un prototype non fonctionnel (concevoir des plans 3D, 2D, établir le cahier des charges...)', NULL, 1, 30, 12, 9, NULL, 1, 0, NULL),
(229, 'Créer un prototype de produit fonctionnel (le chiffrage selon la quantité et les caractéristiques techniques...)', NULL, 1, 31, 12, 9, NULL, 1, 0, NULL),
(230, 'Valider des différents éléments du projet', NULL, 1, 32, 12, 9, NULL, 1, 0, NULL),
(231, 'Vérifier l’adéquation aux exigences préétablies (géométrie des prototypes, dimensions, caractéristiques visuelles/physiques /mécaniques, finition)', NULL, 1, 33, 12, 9, NULL, 1, 0, NULL),
(265, 'Coordonner les diverses composantes d’un projet (les fonctions de planification et d’exécution du projet et de contrôle du changement)\r\nconformément à des normes de qualité, pour établir un juste milieu entre la durée, le coût et la qualité du projet', 'xsxsxsxs', 2, 1, 12, NULL, 5, 1, 1, NULL),
(266, 'Veiller à ce que le projet soit réalisé dans les délais prescrits', 'xsxsxsx', 2, 2, 12, NULL, 5, 1, 1, NULL),
(267, 'Veiller à ce que le projet soit réalisé dans les limites du budget alloué', 'xsxsx', 2, 3, 12, NULL, 5, 1, 1, NULL),
(268, 'Veiller à ce que le produit/service réponde aux besoins', 'xsxs', 1, 4, 12, NULL, 5, 1, 0, NULL),
(269, 'Faire preuve d’un leadership pour assurer un travail d’équipe de qualité', '', 1, 5, 12, NULL, 5, 1, 0, NULL),
(270, 'Identifier les éléments du contexte du projet utiles à la communication (parties prenantes, budget, temps alloué, les limitations, contraintes,\r\nopportunités...)', '', 1, 6, 12, NULL, 5, 1, 0, NULL),
(271, 'Définir le contenu des postes de travail en termes d’activités et de compétences et les positionner dans l’organigramme de l’entreprise', '', 1, 7, 12, NULL, 5, 1, 0, NULL),
(272, 'Analyser les différents groupes cibles (leurs importances, leurs implications dans le projet, leurs connaissances, leurs aptitudes, leurs attentes...)', '', 1, 8, 12, NULL, 5, 1, 0, NULL),
(273, 'Déterminer les objectifs de communication ( les résultats à atteindre, les objectifs formulés SMART, les indicateurs...)', '', 1, 9, 12, NULL, 5, 1, 0, NULL),
(274, 'Définir quels messages pour quels groupes cibles (les messages primaires, les messages secondaires adaptés en fonction des groupes cibles, Keep It\r\nShort and Simple, storytelling, elevator pitch...)', '', 1, 10, 12, NULL, 5, 1, 0, NULL),
(275, 'Etablir le plan d’actions (plan de communication visuel, planning de communication: tableau de bord et suivi des actions...)', '', 1, 11, 12, NULL, 5, 1, 0, NULL),
(276, 'Faire preuve d’écoute vis-à-vis des collaborateurs et être attentif aux problèmes et aux conflits', '', 1, 12, 12, NULL, 5, 1, 0, NULL),
(277, 'Faire le suivi et adapter : outil de travail qui doit évoluer en permanence basé sur un plan-do-chek-act', '', 1, 13, 12, NULL, 5, 1, 0, NULL),
(278, 'Evaluer et débriefer (objectifs sont atteints partiellement ou totalement, échec du plan, pistes d’amélioration, mesures d\'impact des actions, tirer des\r\nconclusions...)', '', 1, 14, 12, NULL, 5, 1, 0, NULL),
(279, 'Décrire l’activité avec précision (utilité des produits et/ou services, leurs caractéristiques, cible, lieu de vente...)', '', 3, 15, 12, NULL, 5, 1, 1, NULL),
(280, 'Etudier le marché visé (zone géographique, saisonnier ou permanent, niveau de concentration , barrières à l’entrée, types de clientèles, état actuel du\r\nmarché et ses tendances...)', '', 1, 16, 12, NULL, 5, 1, 0, NULL),
(281, 'Etudier la compatibilité de l\'innovateur avec le besoin du son projet (ses motivations, ses objectifs, son savoir-faire, son potentiel, s’il y a des\r\ncompétences manquantes et trouver des associés qui pourront les apporter...)', '', 1, 17, 12, NULL, 5, 1, 0, NULL),
(282, 'Analyser les forces et les faiblesses de l’idée (avantages par rapport à la concurrence et les contraintes du projet...)', '', 1, 18, 12, NULL, 5, 1, 0, NULL),
(283, 'Tester l’idée de création d’entreprise (sélectionner les testeurs, tester le produit/service, analyser les retours...)', '', 1, 19, 12, NULL, 5, 1, 0, NULL),
(284, 'Choisir la structure juridique selon la nature et l\'importance de l’activité (entreprise individuelle, SUARL, SARL, SA...)', '', 1, 20, 12, NULL, 5, 1, 0, NULL),
(285, 'Déterminer la forme de l’entreprise selon la nature de l’activité, la volonté de s’associer, l’organisation patrimoniale, l’engagement financier et la\r\ncrédibilité vis-à-vis des partenaires', '', 1, 21, 12, NULL, 5, 1, 0, NULL),
(286, 'Finaliser les formalités de constitution (attestations de dépôt de déclaration auprès de l\'API, déclaration d’ouverture de patente au bureau des impôts,\r\nenregistrement des statuts à la recette d’enregistrement des actes de sociétés...)', '', 1, 22, 12, NULL, 5, 1, 0, NULL),
(287, 'Faire une analyse stratégique du projet, recenser les opportunités de l’entreprise et les éventuelles difficultés à court, moyen ou long terme', '', 1, 23, 12, NULL, 5, 1, 0, NULL),
(288, 'Elaborer un plan de financement du projet : évaluer les besoins financiers pour la mise en œuvre et trouver les moyens qui couvrent les besoins', '', 1, 24, 12, NULL, 5, 1, 0, NULL),
(289, 'Donner une appréciation du chiffre d’affaires (hypothèse du taux d’utilisation de la capacité, production, prévision du chiffre d\'affaires...)', '', 1, 25, 12, NULL, 5, 1, 0, NULL),
(290, 'Estimer les charges du projet : s’acquitter de plusieurs charges, recenser toutes ces charges sans restriction aucune et d’en faire une synthèse', '', 1, 26, 12, NULL, 5, 1, 0, NULL),
(291, 'Etablir un compte de résultat prévisionnel : capacité à rembourser les emprunts et savoir s\'il y a suffisamment de bénéfices pour vivre du projet', '', 1, 27, 12, NULL, 5, 1, 0, NULL),
(292, 'Faire une étude financière qui permet de surveiller l’évolution de la trésorerie (e.g. sur 12 mois)', '', 1, 28, 12, NULL, 5, 1, 0, NULL),
(293, 'Créer un design du produit', '', 1, 29, 12, NULL, 5, 1, 0, NULL),
(294, 'Créer un prototype non fonctionnel (concevoir des plans 3D, 2D, établir le cahier des charges...)', '', 1, 30, 12, NULL, 5, 1, 0, NULL),
(295, 'Créer un prototype de produit fonctionnel (le chiffrage selon la quantité et les caractéristiques techniques...)', '', 1, 31, 12, NULL, 5, 1, 0, NULL),
(296, 'Valider des différents éléments du projet', '', 1, 32, 12, NULL, 5, 1, 0, NULL),
(297, 'Vérifier l’adéquation aux exigences préétablies (géométrie des prototypes, dimensions, caractéristiques visuelles/physiques /mécaniques, finition)', '', 1, 33, 12, NULL, 5, 1, 0, NULL),
(298, 'Coordonner les diverses composantes d’un projet (les fonctions de planification et d’exécution du projet et de contrôle du changement)\r\nconformément à des normes de qualité, pour établir un juste milieu entre la durée, le coût et la qualité du projet', NULL, 1, 1, 14, NULL, 5, 0, 0, NULL),
(299, 'Veiller à ce que le projet soit réalisé dans les délais prescrits', NULL, 1, 2, 14, NULL, 5, 0, 0, NULL),
(300, 'Veiller à ce que le projet soit réalisé dans les limites du budget alloué', NULL, 1, 3, 14, NULL, 5, 0, 0, NULL),
(301, 'Veiller à ce que le produit/service réponde aux besoins', NULL, 1, 4, 14, NULL, 5, 0, 0, NULL),
(302, 'Faire preuve d’un leadership pour assurer un travail d’équipe de qualité', NULL, 1, 5, 14, NULL, 5, 0, 0, NULL),
(303, 'Identifier les éléments du contexte du projet utiles à la communication (parties prenantes, budget, temps alloué, les limitations, contraintes,\r\nopportunités...)', NULL, 1, 6, 14, NULL, 5, 0, 0, NULL),
(304, 'Définir le contenu des postes de travail en termes d’activités et de compétences et les positionner dans l’organigramme de l’entreprise', NULL, 1, 7, 14, NULL, 5, 0, 0, NULL),
(305, 'Analyser les différents groupes cibles (leurs importances, leurs implications dans le projet, leurs connaissances, leurs aptitudes, leurs attentes...)', NULL, 1, 8, 14, NULL, 5, 0, 0, NULL),
(306, 'Déterminer les objectifs de communication ( les résultats à atteindre, les objectifs formulés SMART, les indicateurs...)', NULL, 1, 9, 14, NULL, 5, 0, 0, NULL),
(307, 'Définir quels messages pour quels groupes cibles (les messages primaires, les messages secondaires adaptés en fonction des groupes cibles, Keep It\r\nShort and Simple, storytelling, elevator pitch...)', NULL, 1, 10, 14, NULL, 5, 0, 0, NULL),
(308, 'Etablir le plan d’actions (plan de communication visuel, planning de communication: tableau de bord et suivi des actions...)', NULL, 1, 11, 14, NULL, 5, 0, 0, NULL),
(309, 'Faire preuve d’écoute vis-à-vis des collaborateurs et être attentif aux problèmes et aux conflits', NULL, 1, 12, 14, NULL, 5, 0, 0, NULL),
(310, 'Faire le suivi et adapter : outil de travail qui doit évoluer en permanence basé sur un plan-do-chek-act', NULL, 1, 13, 14, NULL, 5, 0, 0, NULL),
(311, 'Evaluer et débriefer (objectifs sont atteints partiellement ou totalement, échec du plan, pistes d’amélioration, mesures d\'impact des actions, tirer des\r\nconclusions...)', NULL, 1, 14, 14, NULL, 5, 0, 0, NULL),
(312, 'Décrire l’activité avec précision (utilité des produits et/ou services, leurs caractéristiques, cible, lieu de vente...)', NULL, 1, 15, 14, NULL, 5, 0, 0, NULL),
(313, 'Etudier le marché visé (zone géographique, saisonnier ou permanent, niveau de concentration , barrières à l’entrée, types de clientèles, état actuel du\r\nmarché et ses tendances...)', NULL, 1, 16, 14, NULL, 5, 0, 0, NULL),
(314, 'Etudier la compatibilité de l\'innovateur avec le besoin du son projet (ses motivations, ses objectifs, son savoir-faire, son potentiel, s’il y a des\r\ncompétences manquantes et trouver des associés qui pourront les apporter...)', NULL, 1, 17, 14, NULL, 5, 0, 0, NULL),
(315, 'Analyser les forces et les faiblesses de l’idée (avantages par rapport à la concurrence et les contraintes du projet...)', NULL, 1, 18, 14, NULL, 5, 0, 0, NULL),
(316, 'Tester l’idée de création d’entreprise (sélectionner les testeurs, tester le produit/service, analyser les retours...)', NULL, 1, 19, 14, NULL, 5, 0, 0, NULL),
(317, 'Choisir la structure juridique selon la nature et l\'importance de l’activité (entreprise individuelle, SUARL, SARL, SA...)', NULL, 1, 20, 14, NULL, 5, 0, 0, NULL),
(318, 'Déterminer la forme de l’entreprise selon la nature de l’activité, la volonté de s’associer, l’organisation patrimoniale, l’engagement financier et la\r\ncrédibilité vis-à-vis des partenaires', NULL, 1, 21, 14, NULL, 5, 0, 0, NULL),
(319, 'Finaliser les formalités de constitution (attestations de dépôt de déclaration auprès de l\'API, déclaration d’ouverture de patente au bureau des impôts,\r\nenregistrement des statuts à la recette d’enregistrement des actes de sociétés...)', NULL, 1, 22, 14, NULL, 5, 0, 0, NULL),
(320, 'Faire une analyse stratégique du projet, recenser les opportunités de l’entreprise et les éventuelles difficultés à court, moyen ou long terme', NULL, 1, 23, 14, NULL, 5, 0, 0, NULL),
(321, 'Elaborer un plan de financement du projet : évaluer les besoins financiers pour la mise en œuvre et trouver les moyens qui couvrent les besoins', NULL, 1, 24, 14, NULL, 5, 0, 0, NULL),
(322, 'Donner une appréciation du chiffre d’affaires (hypothèse du taux d’utilisation de la capacité, production, prévision du chiffre d\'affaires...)', NULL, 1, 25, 14, NULL, 5, 0, 0, NULL),
(323, 'Estimer les charges du projet : s’acquitter de plusieurs charges, recenser toutes ces charges sans restriction aucune et d’en faire une synthèse', NULL, 1, 26, 14, NULL, 5, 0, 0, NULL),
(324, 'Etablir un compte de résultat prévisionnel : capacité à rembourser les emprunts et savoir s\'il y a suffisamment de bénéfices pour vivre du projet', NULL, 1, 27, 14, NULL, 5, 0, 0, NULL),
(325, 'Faire une étude financière qui permet de surveiller l’évolution de la trésorerie (e.g. sur 12 mois)', NULL, 1, 28, 14, NULL, 5, 0, 0, NULL),
(326, 'Créer un design du produit', NULL, 1, 29, 14, NULL, 5, 0, 0, NULL),
(327, 'Créer un prototype non fonctionnel (concevoir des plans 3D, 2D, établir le cahier des charges...)', NULL, 1, 30, 14, NULL, 5, 0, 0, NULL),
(328, 'Créer un prototype de produit fonctionnel (le chiffrage selon la quantité et les caractéristiques techniques...)', NULL, 1, 31, 14, NULL, 5, 0, 0, NULL),
(329, 'Valider des différents éléments du projet', NULL, 1, 32, 14, NULL, 5, 0, 0, NULL),
(330, 'Vérifier l’adéquation aux exigences préétablies (géométrie des prototypes, dimensions, caractéristiques visuelles/physiques /mécaniques, finition)', NULL, 1, 33, 14, NULL, 5, 0, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `28_2024_bilan_competance_promoteur`
--

DROP TABLE IF EXISTS `28_2024_bilan_competance_promoteur`;
CREATE TABLE IF NOT EXISTS `28_2024_bilan_competance_promoteur` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `observation` text,
  `evaluation` int DEFAULT NULL,
  `parameter_id` int NOT NULL,
  `project_id` int DEFAULT NULL,
  `etudiant_id` int DEFAULT NULL,
  `enseignant_id` int DEFAULT NULL,
  `updated` tinyint(1) NOT NULL DEFAULT '0',
  `valide` tinyint(1) NOT NULL DEFAULT '0',
  `etab_id` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=307 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `28_2024_bilan_competance_promoteur`
--

INSERT INTO `28_2024_bilan_competance_promoteur` (`id`, `name`, `observation`, `evaluation`, `parameter_id`, `project_id`, `etudiant_id`, `enseignant_id`, `updated`, `valide`, `etab_id`) VALUES
(35, 'Identifier les parties prenantes : avoir une liste détaillée de tous les partenaires effectifs qui se positionnent en amont ou en aval de l’entreprise', NULL, 2, 1, 7, 1, NULL, 1, 0, NULL),
(36, 'Mesurer le niveau d’intérêt et de pouvoir sur le projet de chaque partie prenante', NULL, 2, 2, 7, 1, NULL, 1, 0, NULL),
(37, 'Classifier les parties prenantes', NULL, 2, 3, 7, 1, NULL, 1, 0, NULL),
(38, 'Communiquer avec les différentes parties prenantes et partenaires, les persuader et entretenir des relations durables avec eux', NULL, 3, 4, 7, 1, NULL, 1, 0, NULL),
(39, 'Définir une stratégie de négociation appropriée pour chaque partie prenante afin de répondre aux attentes communes', NULL, 2, 5, 7, 1, NULL, 1, 0, NULL),
(40, 'Elaborer la matrice RACI (responsible, accountable, consulted et informed) et/ou RAM (responsibility assignment matrix) : répartir les tâches, organiser\r\nles circuits d’information, de décision, de validation', NULL, 3, 6, 7, 1, NULL, 1, 0, NULL),
(41, 'Définir le contenu des postes de travail en termes d’activités et de compétences et les positionner dans l’organigramme de l’entreprise', NULL, 3, 7, 7, 1, NULL, 1, 0, NULL),
(42, 'Mener un entretien de recrutement en utilisant les techniques adéquates', NULL, 3, 8, 7, 1, NULL, 1, 0, NULL),
(43, 'Installer un esprit et une dynamique d’équipe', NULL, 3, 9, 7, 1, NULL, 1, 0, NULL),
(44, 'Mettre en œuvre une politique de motivation des membres de l\'équipe : mettre en place des structures incitatives, motiver ses collaborateurs...', NULL, 3, 10, 7, 1, NULL, 1, 0, NULL),
(45, 'Mettre en œuvre une politique de rémunération en définissant les salaires et autres composantes de rémunération', NULL, 3, 11, 7, 1, NULL, 1, 0, NULL),
(46, 'Faire preuve d’écoute vis-à-vis des collaborateurs et être attentif aux problèmes et aux conflits', NULL, 3, 12, 7, 1, NULL, 1, 0, NULL),
(47, 'Faire preuve d’écoute vis-à-vis des collaborateurs, être attentifs aux problèmes (gestion des conflits)', NULL, 3, 13, 7, 1, NULL, 1, 0, NULL),
(48, 'Mettre en œuvre une politique de communication interne efficace', NULL, 2, 14, 7, 1, NULL, 1, 0, NULL),
(49, 'Elaborer une matrice d’analyse des risques', NULL, 3, 15, 7, 1, NULL, 1, 0, NULL),
(50, 'Identifier tous les risques possibles (positifs et négatifs)', NULL, 3, 16, 7, 1, NULL, 1, 0, NULL),
(51, 'Mesurer l\'importance du risque et classifier les risques selon l’importance', NULL, 2, 17, 7, 1, NULL, 1, 0, NULL),
(52, 'Proposer les solutions pour affronter les risques (éliminer, réduire, transférer, accepter, pivoter...)', NULL, 3, 18, 7, 1, NULL, 1, 0, NULL),
(53, 'Mettre en œuvre les mesures de protection intellectuelle', NULL, 2, 19, 7, 1, NULL, 1, 0, NULL),
(54, 'Formaliser les contrats avec les partenaires d’affaire', NULL, 2, 20, 7, 1, NULL, 1, 0, NULL),
(55, 'Engager les formalités de création de l’entreprise', NULL, 1, 21, 7, 1, NULL, 1, 0, NULL),
(56, 'Identifier les différentes ressources de financement (autofinancement, dettes bancaires, fonds d’investissements, subventions, leasing...)', NULL, 1, 22, 7, 1, NULL, 1, 0, NULL),
(57, 'Identifier les incitations des investissements (code d’incitation des investissements, lois d\'investissements...)', NULL, 1, 23, 7, 1, NULL, 1, 0, NULL),
(58, 'Choisir la structure de financement optimale', NULL, 1, 24, 7, 1, NULL, 1, 0, NULL),
(59, 'Respecter le planing de projet.', NULL, 1, 25, 7, 1, NULL, 1, 0, NULL),
(60, 'Faire preuve d’efficience et d’efficacité: Définir et surveiller l’atteinte des indicateurs clés de performances du projet.', NULL, 1, 26, 7, 1, NULL, 1, 0, NULL),
(61, 'Ajuster le plan d\'action: déterminer les écarts et les mesures de corrections nécessaires.', NULL, 1, 27, 7, 1, NULL, 1, 0, NULL),
(62, 'Modifier le plan d\'action en présence de risques imprévus (covid, forces majeurs...).', NULL, 1, 28, 7, 1, NULL, 1, 0, NULL),
(63, 'Être en mesure d’identifier la stratégie commerciale convenable (en fonction du produit/service créé): domination par les coûts, différenciation,\r\nconcentration...', NULL, 1, 29, 7, 1, NULL, 1, 0, NULL),
(64, 'Savoir tenir un discours commercial efficace', NULL, 1, 30, 7, 1, NULL, 1, 0, NULL),
(65, 'Savoir créer un lien de confiance et fidéliser la clientèle...', NULL, 1, 31, 7, 1, NULL, 1, 0, NULL),
(66, 'Concevoir une stratégie de communication bien ciblée, cohérente avec des objectifs marketing clairs', NULL, 1, 32, 7, 1, NULL, 1, 0, NULL),
(67, 'Comprendre les usages et les valeurs ajoutées des réseaux sociaux pour augmenter sa visibilité', NULL, 1, 33, 7, 1, NULL, 1, 0, NULL),
(68, 'Valoriser ses profils et son activité en ligne : développer sa e-réputation; découvrir les notions d’identité numérique, d’empreinte numérique...', NULL, 3, 34, 7, 1, NULL, 1, 0, NULL),
(103, 'Identifier les parties prenantes : avoir une liste détaillée de tous les partenaires effectifs qui se positionnent en amont ou en aval de l’entreprise', 'done', 3, 1, 7, NULL, 2, 1, 1, NULL),
(104, 'Mesurer le niveau d’intérêt et de pouvoir sur le projet de chaque partie prenante', 'done', 2, 2, 7, NULL, 2, 1, 1, NULL),
(105, 'Classifier les parties prenantes', 'done', 2, 3, 7, NULL, 2, 1, 1, NULL),
(106, 'Communiquer avec les différentes parties prenantes et partenaires, les persuader et entretenir des relations durables avec eux', 'done', 2, 4, 7, NULL, 2, 1, 1, NULL),
(107, 'Définir une stratégie de négociation appropriée pour chaque partie prenante afin de répondre aux attentes communes', 'tres bien', 3, 5, 7, NULL, 2, 1, 1, NULL),
(108, 'Elaborer la matrice RACI (responsible, accountable, consulted et informed) et/ou RAM (responsibility assignment matrix) : répartir les tâches, organiser\r\nles circuits d’information, de décision, de validation', '', 1, 6, 7, NULL, 2, 1, 0, NULL),
(109, 'Définir le contenu des postes de travail en termes d’activités et de compétences et les positionner dans l’organigramme de l’entreprise', '', 1, 7, 7, NULL, 2, 1, 0, NULL),
(110, 'Mener un entretien de recrutement en utilisant les techniques adéquates', '', 1, 8, 7, NULL, 2, 1, 0, NULL),
(111, 'Installer un esprit et une dynamique d’équipe', '', 1, 9, 7, NULL, 2, 1, 0, NULL),
(112, 'Mettre en œuvre une politique de motivation des membres de l\'équipe : mettre en place des structures incitatives, motiver ses collaborateurs...', '', 1, 10, 7, NULL, 2, 1, 0, NULL),
(113, 'Mettre en œuvre une politique de rémunération en définissant les salaires et autres composantes de rémunération', '', 1, 11, 7, NULL, 2, 1, 0, NULL),
(114, 'Faire preuve d’écoute vis-à-vis des collaborateurs et être attentif aux problèmes et aux conflits', '', 1, 12, 7, NULL, 2, 1, 0, NULL),
(115, 'Faire preuve d’écoute vis-à-vis des collaborateurs, être attentifs aux problèmes (gestion des conflits)', '', 1, 13, 7, NULL, 2, 1, 0, NULL),
(116, 'Mettre en œuvre une politique de communication interne efficace', '', 1, 14, 7, NULL, 2, 1, 0, NULL),
(117, 'Elaborer une matrice d’analyse des risques', '', 1, 15, 7, NULL, 2, 1, 0, NULL),
(118, 'Identifier tous les risques possibles (positifs et négatifs)', '', 1, 16, 7, NULL, 2, 1, 0, NULL),
(119, 'Mesurer l\'importance du risque et classifier les risques selon l’importance', '', 1, 17, 7, NULL, 2, 1, 0, NULL),
(120, 'Proposer les solutions pour affronter les risques (éliminer, réduire, transférer, accepter, pivoter...)', '', 1, 18, 7, NULL, 2, 1, 0, NULL),
(121, 'Mettre en œuvre les mesures de protection intellectuelle', '', 1, 19, 7, NULL, 2, 1, 0, NULL),
(122, 'Formaliser les contrats avec les partenaires d’affaire', '', 1, 20, 7, NULL, 2, 1, 0, NULL),
(123, 'Engager les formalités de création de l’entreprise', '', 1, 21, 7, NULL, 2, 1, 0, NULL),
(124, 'Identifier les différentes ressources de financement (autofinancement, dettes bancaires, fonds d’investissements, subventions, leasing...)', '', 1, 22, 7, NULL, 2, 1, 0, NULL),
(125, 'Identifier les incitations des investissements (code d’incitation des investissements, lois d\'investissements...)', '', 1, 23, 7, NULL, 2, 1, 0, NULL),
(126, 'Choisir la structure de financement optimale', '', 1, 24, 7, NULL, 2, 1, 0, NULL),
(127, 'Respecter le planing de projet.', '', 1, 25, 7, NULL, 2, 1, 0, NULL),
(128, 'Faire preuve d’efficience et d’efficacité: Définir et surveiller l’atteinte des indicateurs clés de performances du projet.', '', 1, 26, 7, NULL, 2, 1, 0, NULL),
(129, 'Ajuster le plan d\'action: déterminer les écarts et les mesures de corrections nécessaires.', '', 1, 27, 7, NULL, 2, 1, 0, NULL),
(130, 'Modifier le plan d\'action en présence de risques imprévus (covid, forces majeurs...).', '', 1, 28, 7, NULL, 2, 1, 0, NULL),
(131, 'Être en mesure d’identifier la stratégie commerciale convenable (en fonction du produit/service créé): domination par les coûts, différenciation,\r\nconcentration...', '', 1, 29, 7, NULL, 2, 1, 0, NULL),
(132, 'Savoir tenir un discours commercial efficace', '', 1, 30, 7, NULL, 2, 1, 0, NULL),
(133, 'Savoir créer un lien de confiance et fidéliser la clientèle...', '', 1, 31, 7, NULL, 2, 1, 0, NULL),
(134, 'Concevoir une stratégie de communication bien ciblée, cohérente avec des objectifs marketing clairs', '', 1, 32, 7, NULL, 2, 1, 0, NULL),
(135, 'Comprendre les usages et les valeurs ajoutées des réseaux sociaux pour augmenter sa visibilité', '', 1, 33, 7, NULL, 2, 1, 0, NULL),
(136, 'Valoriser ses profils et son activité en ligne : développer sa e-réputation; découvrir les notions d’identité numérique, d’empreinte numérique...', 'Bien', 2, 34, 7, NULL, 2, 1, 1, NULL),
(171, 'Identifier les parties prenantes : avoir une liste détaillée de tous les partenaires effectifs qui se positionnent en amont ou en aval de l’entreprise', NULL, 2, 1, 12, 9, NULL, 1, 0, NULL),
(172, 'Mesurer le niveau d’intérêt et de pouvoir sur le projet de chaque partie prenante', NULL, 1, 2, 12, 9, NULL, 1, 0, NULL),
(173, 'Classifier les parties prenantes', NULL, 3, 3, 12, 9, NULL, 1, 0, NULL),
(174, 'Communiquer avec les différentes parties prenantes et partenaires, les persuader et entretenir des relations durables avec eux', NULL, 3, 4, 12, 9, NULL, 1, 0, NULL),
(175, 'Définir une stratégie de négociation appropriée pour chaque partie prenante afin de répondre aux attentes communes', NULL, 1, 5, 12, 9, NULL, 1, 0, NULL),
(176, 'Elaborer la matrice RACI (responsible, accountable, consulted et informed) et/ou RAM (responsibility assignment matrix) : répartir les tâches, organiser\r\nles circuits d’information, de décision, de validation', NULL, 1, 6, 12, 9, NULL, 1, 0, NULL),
(177, 'Définir le contenu des postes de travail en termes d’activités et de compétences et les positionner dans l’organigramme de l’entreprise', NULL, 1, 7, 12, 9, NULL, 1, 0, NULL),
(178, 'Mener un entretien de recrutement en utilisant les techniques adéquates', NULL, 1, 8, 12, 9, NULL, 1, 0, NULL),
(179, 'Installer un esprit et une dynamique d’équipe', NULL, 1, 9, 12, 9, NULL, 1, 0, NULL),
(180, 'Mettre en œuvre une politique de motivation des membres de l\'équipe : mettre en place des structures incitatives, motiver ses collaborateurs...', NULL, 1, 10, 12, 9, NULL, 1, 0, NULL),
(181, 'Mettre en œuvre une politique de rémunération en définissant les salaires et autres composantes de rémunération', NULL, 1, 11, 12, 9, NULL, 1, 0, NULL),
(182, 'Faire preuve d’écoute vis-à-vis des collaborateurs et être attentif aux problèmes et aux conflits', NULL, 1, 12, 12, 9, NULL, 1, 0, NULL),
(183, 'Faire preuve d’écoute vis-à-vis des collaborateurs, être attentifs aux problèmes (gestion des conflits)', NULL, 1, 13, 12, 9, NULL, 1, 0, NULL),
(184, 'Mettre en œuvre une politique de communication interne efficace', NULL, 1, 14, 12, 9, NULL, 1, 0, NULL),
(185, 'Elaborer une matrice d’analyse des risques', NULL, 1, 15, 12, 9, NULL, 1, 0, NULL),
(186, 'Identifier tous les risques possibles (positifs et négatifs)', NULL, 1, 16, 12, 9, NULL, 1, 0, NULL),
(187, 'Mesurer l\'importance du risque et classifier les risques selon l’importance', NULL, 1, 17, 12, 9, NULL, 1, 0, NULL),
(188, 'Proposer les solutions pour affronter les risques (éliminer, réduire, transférer, accepter, pivoter...)', NULL, 1, 18, 12, 9, NULL, 1, 0, NULL),
(189, 'Mettre en œuvre les mesures de protection intellectuelle', NULL, 1, 19, 12, 9, NULL, 1, 0, NULL),
(190, 'Formaliser les contrats avec les partenaires d’affaire', NULL, 1, 20, 12, 9, NULL, 1, 0, NULL),
(191, 'Engager les formalités de création de l’entreprise', NULL, 1, 21, 12, 9, NULL, 1, 0, NULL),
(192, 'Identifier les différentes ressources de financement (autofinancement, dettes bancaires, fonds d’investissements, subventions, leasing...)', NULL, 1, 22, 12, 9, NULL, 1, 0, NULL),
(193, 'Identifier les incitations des investissements (code d’incitation des investissements, lois d\'investissements...)', NULL, 1, 23, 12, 9, NULL, 1, 0, NULL),
(194, 'Choisir la structure de financement optimale', NULL, 1, 24, 12, 9, NULL, 1, 0, NULL),
(195, 'Respecter le planing de projet.', NULL, 1, 25, 12, 9, NULL, 1, 0, NULL),
(196, 'Faire preuve d’efficience et d’efficacité: Définir et surveiller l’atteinte des indicateurs clés de performances du projet.', NULL, 1, 26, 12, 9, NULL, 1, 0, NULL),
(197, 'Ajuster le plan d\'action: déterminer les écarts et les mesures de corrections nécessaires.', NULL, 1, 27, 12, 9, NULL, 1, 0, NULL),
(198, 'Modifier le plan d\'action en présence de risques imprévus (covid, forces majeurs...).', NULL, 1, 28, 12, 9, NULL, 1, 0, NULL),
(199, 'Être en mesure d’identifier la stratégie commerciale convenable (en fonction du produit/service créé): domination par les coûts, différenciation,\r\nconcentration...', NULL, 1, 29, 12, 9, NULL, 1, 0, NULL),
(200, 'Savoir tenir un discours commercial efficace', NULL, 1, 30, 12, 9, NULL, 1, 0, NULL),
(201, 'Savoir créer un lien de confiance et fidéliser la clientèle...', NULL, 1, 31, 12, 9, NULL, 1, 0, NULL),
(202, 'Concevoir une stratégie de communication bien ciblée, cohérente avec des objectifs marketing clairs', NULL, 1, 32, 12, 9, NULL, 1, 0, NULL),
(203, 'Comprendre les usages et les valeurs ajoutées des réseaux sociaux pour augmenter sa visibilité', NULL, 1, 33, 12, 9, NULL, 1, 0, NULL),
(204, 'Valoriser ses profils et son activité en ligne : développer sa e-réputation; découvrir les notions d’identité numérique, d’empreinte numérique...', NULL, 2, 34, 12, 9, NULL, 1, 0, NULL),
(239, 'Identifier les parties prenantes : avoir une liste détaillée de tous les partenaires effectifs qui se positionnent en amont ou en aval de l’entreprise', 'Identifier les parties prenantes : avoir une liste détaillée de tous les partenaires effectifs qui se positionnent en amont ou en aval de l’entreprise', 1, 1, 12, NULL, 5, 1, 1, NULL),
(240, 'Mesurer le niveau d’intérêt et de pouvoir sur le projet de chaque partie prenante', 'Identifier les parties prenantes : avoir une liste détaillée de tous les partenaires effectifs qui se positionnent en amont ou en aval de l’entreprise', 3, 2, 12, NULL, 5, 1, 1, NULL),
(241, 'Classifier les parties prenantes', 'Identifier les parties prenantes : avoir une liste détaillée de tous les partenaires effectifs qui se positionnent en amont ou en aval de l’entreprise', 1, 3, 12, NULL, 5, 1, 0, NULL),
(242, 'Communiquer avec les différentes parties prenantes et partenaires, les persuader et entretenir des relations durables avec eux', '', 1, 4, 12, NULL, 5, 1, 0, NULL),
(243, 'Définir une stratégie de négociation appropriée pour chaque partie prenante afin de répondre aux attentes communes', '', 1, 5, 12, NULL, 5, 1, 0, NULL),
(244, 'Elaborer la matrice RACI (responsible, accountable, consulted et informed) et/ou RAM (responsibility assignment matrix) : répartir les tâches, organiser\r\nles circuits d’information, de décision, de validation', '', 1, 6, 12, NULL, 5, 1, 0, NULL),
(245, 'Définir le contenu des postes de travail en termes d’activités et de compétences et les positionner dans l’organigramme de l’entreprise', '', 1, 7, 12, NULL, 5, 1, 0, NULL),
(246, 'Mener un entretien de recrutement en utilisant les techniques adéquates', '', 1, 8, 12, NULL, 5, 1, 0, NULL),
(247, 'Installer un esprit et une dynamique d’équipe', '', 1, 9, 12, NULL, 5, 1, 0, NULL),
(248, 'Mettre en œuvre une politique de motivation des membres de l\'équipe : mettre en place des structures incitatives, motiver ses collaborateurs...', '', 1, 10, 12, NULL, 5, 1, 0, NULL),
(249, 'Mettre en œuvre une politique de rémunération en définissant les salaires et autres composantes de rémunération', '', 1, 11, 12, NULL, 5, 1, 0, NULL),
(250, 'Faire preuve d’écoute vis-à-vis des collaborateurs et être attentif aux problèmes et aux conflits', '', 1, 12, 12, NULL, 5, 1, 0, NULL),
(251, 'Faire preuve d’écoute vis-à-vis des collaborateurs, être attentifs aux problèmes (gestion des conflits)', '', 1, 13, 12, NULL, 5, 1, 0, NULL),
(252, 'Mettre en œuvre une politique de communication interne efficace', '', 1, 14, 12, NULL, 5, 1, 0, NULL),
(253, 'Elaborer une matrice d’analyse des risques', '', 1, 15, 12, NULL, 5, 1, 0, NULL),
(254, 'Identifier tous les risques possibles (positifs et négatifs)', '', 1, 16, 12, NULL, 5, 1, 0, NULL),
(255, 'Mesurer l\'importance du risque et classifier les risques selon l’importance', '', 1, 17, 12, NULL, 5, 1, 0, NULL),
(256, 'Proposer les solutions pour affronter les risques (éliminer, réduire, transférer, accepter, pivoter...)', '', 1, 18, 12, NULL, 5, 1, 0, NULL),
(257, 'Mettre en œuvre les mesures de protection intellectuelle', '', 1, 19, 12, NULL, 5, 1, 0, NULL),
(258, 'Formaliser les contrats avec les partenaires d’affaire', '', 1, 20, 12, NULL, 5, 1, 0, NULL),
(259, 'Engager les formalités de création de l’entreprise', '', 1, 21, 12, NULL, 5, 1, 0, NULL),
(260, 'Identifier les différentes ressources de financement (autofinancement, dettes bancaires, fonds d’investissements, subventions, leasing...)', '', 1, 22, 12, NULL, 5, 1, 0, NULL),
(261, 'Identifier les incitations des investissements (code d’incitation des investissements, lois d\'investissements...)', 'Identifier les parties prenantes : avoir une liste détaillée de tous les partenaires effectifs qui se positionnent en amont ou en aval de l’entreprise', 2, 23, 12, NULL, 5, 1, 1, NULL),
(262, 'Choisir la structure de financement optimale', '', 1, 24, 12, NULL, 5, 1, 0, NULL),
(263, 'Respecter le planing de projet.', '', 1, 25, 12, NULL, 5, 1, 0, NULL),
(264, 'Faire preuve d’efficience et d’efficacité: Définir et surveiller l’atteinte des indicateurs clés de performances du projet.', '', 1, 26, 12, NULL, 5, 1, 0, NULL),
(265, 'Ajuster le plan d\'action: déterminer les écarts et les mesures de corrections nécessaires.', '', 1, 27, 12, NULL, 5, 1, 0, NULL),
(266, 'Modifier le plan d\'action en présence de risques imprévus (covid, forces majeurs...).', '', 1, 28, 12, NULL, 5, 1, 0, NULL),
(267, 'Être en mesure d’identifier la stratégie commerciale convenable (en fonction du produit/service créé): domination par les coûts, différenciation,\r\nconcentration...', '', 1, 29, 12, NULL, 5, 1, 0, NULL),
(268, 'Savoir tenir un discours commercial efficace', 'Identifier les parties prenantes : avoir une liste détaillée de tous les partenaires effectifs qui se positionnent en amont ou en aval de l’entreprise', 1, 30, 12, NULL, 5, 1, 0, NULL),
(269, 'Savoir créer un lien de confiance et fidéliser la clientèle...', '', 1, 31, 12, NULL, 5, 1, 0, NULL),
(270, 'Concevoir une stratégie de communication bien ciblée, cohérente avec des objectifs marketing clairs', '', 1, 32, 12, NULL, 5, 1, 0, NULL),
(271, 'Comprendre les usages et les valeurs ajoutées des réseaux sociaux pour augmenter sa visibilité', '', 1, 33, 12, NULL, 5, 1, 0, NULL),
(272, 'Valoriser ses profils et son activité en ligne : développer sa e-réputation; découvrir les notions d’identité numérique, d’empreinte numérique...', '', 1, 34, 12, NULL, 5, 1, 0, NULL),
(273, 'Identifier les parties prenantes : avoir une liste détaillée de tous les partenaires effectifs qui se positionnent en amont ou en aval de l’entreprise', NULL, 1, 1, 13, NULL, 5, 0, 0, NULL),
(274, 'Mesurer le niveau d’intérêt et de pouvoir sur le projet de chaque partie prenante', NULL, 1, 2, 13, NULL, 5, 0, 0, NULL),
(275, 'Classifier les parties prenantes', NULL, 1, 3, 13, NULL, 5, 0, 0, NULL),
(276, 'Communiquer avec les différentes parties prenantes et partenaires, les persuader et entretenir des relations durables avec eux', NULL, 1, 4, 13, NULL, 5, 0, 0, NULL),
(277, 'Définir une stratégie de négociation appropriée pour chaque partie prenante afin de répondre aux attentes communes', NULL, 1, 5, 13, NULL, 5, 0, 0, NULL),
(278, 'Elaborer la matrice RACI (responsible, accountable, consulted et informed) et/ou RAM (responsibility assignment matrix) : répartir les tâches, organiser\r\nles circuits d’information, de décision, de validation', NULL, 1, 6, 13, NULL, 5, 0, 0, NULL),
(279, 'Définir le contenu des postes de travail en termes d’activités et de compétences et les positionner dans l’organigramme de l’entreprise', NULL, 1, 7, 13, NULL, 5, 0, 0, NULL),
(280, 'Mener un entretien de recrutement en utilisant les techniques adéquates', NULL, 1, 8, 13, NULL, 5, 0, 0, NULL),
(281, 'Installer un esprit et une dynamique d’équipe', NULL, 1, 9, 13, NULL, 5, 0, 0, NULL),
(282, 'Mettre en œuvre une politique de motivation des membres de l\'équipe : mettre en place des structures incitatives, motiver ses collaborateurs...', NULL, 1, 10, 13, NULL, 5, 0, 0, NULL),
(283, 'Mettre en œuvre une politique de rémunération en définissant les salaires et autres composantes de rémunération', NULL, 1, 11, 13, NULL, 5, 0, 0, NULL),
(284, 'Faire preuve d’écoute vis-à-vis des collaborateurs et être attentif aux problèmes et aux conflits', NULL, 1, 12, 13, NULL, 5, 0, 0, NULL),
(285, 'Faire preuve d’écoute vis-à-vis des collaborateurs, être attentifs aux problèmes (gestion des conflits)', NULL, 1, 13, 13, NULL, 5, 0, 0, NULL),
(286, 'Mettre en œuvre une politique de communication interne efficace', NULL, 1, 14, 13, NULL, 5, 0, 0, NULL),
(287, 'Elaborer une matrice d’analyse des risques', NULL, 1, 15, 13, NULL, 5, 0, 0, NULL),
(288, 'Identifier tous les risques possibles (positifs et négatifs)', NULL, 1, 16, 13, NULL, 5, 0, 0, NULL),
(289, 'Mesurer l\'importance du risque et classifier les risques selon l’importance', NULL, 1, 17, 13, NULL, 5, 0, 0, NULL),
(290, 'Proposer les solutions pour affronter les risques (éliminer, réduire, transférer, accepter, pivoter...)', NULL, 1, 18, 13, NULL, 5, 0, 0, NULL),
(291, 'Mettre en œuvre les mesures de protection intellectuelle', NULL, 1, 19, 13, NULL, 5, 0, 0, NULL),
(292, 'Formaliser les contrats avec les partenaires d’affaire', NULL, 1, 20, 13, NULL, 5, 0, 0, NULL),
(293, 'Engager les formalités de création de l’entreprise', NULL, 1, 21, 13, NULL, 5, 0, 0, NULL),
(294, 'Identifier les différentes ressources de financement (autofinancement, dettes bancaires, fonds d’investissements, subventions, leasing...)', NULL, 1, 22, 13, NULL, 5, 0, 0, NULL),
(295, 'Identifier les incitations des investissements (code d’incitation des investissements, lois d\'investissements...)', NULL, 1, 23, 13, NULL, 5, 0, 0, NULL),
(296, 'Choisir la structure de financement optimale', NULL, 1, 24, 13, NULL, 5, 0, 0, NULL),
(297, 'Respecter le planing de projet.', NULL, 1, 25, 13, NULL, 5, 0, 0, NULL),
(298, 'Faire preuve d’efficience et d’efficacité: Définir et surveiller l’atteinte des indicateurs clés de performances du projet.', NULL, 1, 26, 13, NULL, 5, 0, 0, NULL),
(299, 'Ajuster le plan d\'action: déterminer les écarts et les mesures de corrections nécessaires.', NULL, 1, 27, 13, NULL, 5, 0, 0, NULL),
(300, 'Modifier le plan d\'action en présence de risques imprévus (covid, forces majeurs...).', NULL, 1, 28, 13, NULL, 5, 0, 0, NULL),
(301, 'Être en mesure d’identifier la stratégie commerciale convenable (en fonction du produit/service créé): domination par les coûts, différenciation,\r\nconcentration...', NULL, 1, 29, 13, NULL, 5, 0, 0, NULL),
(302, 'Savoir tenir un discours commercial efficace', NULL, 1, 30, 13, NULL, 5, 0, 0, NULL),
(303, 'Savoir créer un lien de confiance et fidéliser la clientèle...', NULL, 1, 31, 13, NULL, 5, 0, 0, NULL),
(304, 'Concevoir une stratégie de communication bien ciblée, cohérente avec des objectifs marketing clairs', NULL, 1, 32, 13, NULL, 5, 0, 0, NULL),
(305, 'Comprendre les usages et les valeurs ajoutées des réseaux sociaux pour augmenter sa visibilité', NULL, 1, 33, 13, NULL, 5, 0, 0, NULL),
(306, 'Valoriser ses profils et son activité en ligne : développer sa e-réputation; découvrir les notions d’identité numérique, d’empreinte numérique...', NULL, 1, 34, 13, NULL, 5, 0, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `28_2024_cache_users`
--

DROP TABLE IF EXISTS `28_2024_cache_users`;
CREATE TABLE IF NOT EXISTS `28_2024_cache_users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `etablissement_id` int NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `niveau` varchar(255) NOT NULL,
  `old_promotion` varchar(255) DEFAULT NULL,
  `old_niveau` varchar(255) DEFAULT NULL,
  `appel_id` int NOT NULL,
  `addedBy` int NOT NULL,
  `cv` varchar(255) NOT NULL,
  `etab_id` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `28_2024_capsules_videos`
--

DROP TABLE IF EXISTS `28_2024_capsules_videos`;
CREATE TABLE IF NOT EXISTS `28_2024_capsules_videos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `titre` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `titre-en` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `id_video` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` date NOT NULL,
  `published` tinyint(1) NOT NULL,
  `etab_id` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `28_2024_capsules_videos`
--

INSERT INTO `28_2024_capsules_videos` (`id`, `titre`, `titre-en`, `id_video`, `created_at`, `published`, `etab_id`) VALUES
(3, 'Inauguration du nouveau Pole e lEtudiant Entrepreneur de luniversité de Sousse', 'Inauguration of the new Student Entrepreneur Center at the University of Sousse ', '7BOKK1qBXK0', '2024-11-07', 1, NULL),
(4, '1er regroupement national des Pôles Étudiant-Entrepreneur en Tunisie', '1st national grouping of Student-Entrepreneur Poles in Tunisia', 'jvUll7xbKbs', '2024-11-07', 1, NULL),
(5, 'Appel à candidature du Pôle Étudiant Entrepreneur', 'Call for applications from the Student Entrepreneur Center', 'A6K6orBxMa8', '2024-11-07', 1, NULL),
(6, 'UNE JOURNÉE DANS MA VIE D\'ÉTUDIANTE', 'A DAY IN MY LIFE AS A STUDENT', 'EN9lEZgyymI', '2024-11-07', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `28_2024_certificats`
--

DROP TABLE IF EXISTS `28_2024_certificats`;
CREATE TABLE IF NOT EXISTS `28_2024_certificats` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `date_debut` date NOT NULL,
  `date_fin` date NOT NULL,
  `etudiant_id` int DEFAULT NULL,
  `etab_id` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `28_2024_certificats`
--

INSERT INTO `28_2024_certificats` (`id`, `nom`, `date_debut`, `date_fin`, `etudiant_id`, `etab_id`) VALUES
(1, 'certificat cybersecurity updated', '2024-10-17', '2024-12-25', 1, NULL),
(3, '3D Painting', '2022-03-05', '2022-06-04', 8, NULL),
(4, 'wordpress', '2024-03-01', '2024-09-06', 15, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `28_2024_coaching`
--

DROP TABLE IF EXISTS `28_2024_coaching`;
CREATE TABLE IF NOT EXISTS `28_2024_coaching` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `thumbnail` varchar(255) DEFAULT NULL,
  `rating` int NOT NULL DEFAULT '0',
  `created_at` date NOT NULL,
  `referent_id` int DEFAULT NULL,
  `publie` tinyint(1) NOT NULL DEFAULT '0',
  `nb_seance` int NOT NULL DEFAULT '0',
  `date_overture` date DEFAULT NULL,
  `date_debut` date DEFAULT NULL,
  `date_fin` date DEFAULT NULL,
  `etab_id` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `28_2024_coaching`
--

INSERT INTO `28_2024_coaching` (`id`, `nom`, `thumbnail`, `rating`, `created_at`, `referent_id`, `publie`, `nb_seance`, `date_overture`, `date_debut`, `date_fin`, `etab_id`) VALUES
(1, 'test coaching', NULL, 0, '2024-11-28', 1, 0, 2, NULL, '2024-11-30', '2024-12-01', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `28_2024_coaching_domaines`
--

DROP TABLE IF EXISTS `28_2024_coaching_domaines`;
CREATE TABLE IF NOT EXISTS `28_2024_coaching_domaines` (
  `id` int NOT NULL AUTO_INCREMENT,
  `coaching_id` int NOT NULL,
  `domaine_id` int NOT NULL,
  `etab_id` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `28_2024_coaching_groupes`
--

DROP TABLE IF EXISTS `28_2024_coaching_groupes`;
CREATE TABLE IF NOT EXISTS `28_2024_coaching_groupes` (
  `id` int NOT NULL AUTO_INCREMENT,
  `coaching_id` int NOT NULL,
  `groupe_id` int NOT NULL,
  `progression` int NOT NULL DEFAULT '0',
  `etab_id` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `28_2024_coaching_students`
--

DROP TABLE IF EXISTS `28_2024_coaching_students`;
CREATE TABLE IF NOT EXISTS `28_2024_coaching_students` (
  `id` int NOT NULL AUTO_INCREMENT,
  `coaching_id` int NOT NULL,
  `student_id` int NOT NULL,
  `progression` int NOT NULL DEFAULT '0',
  `fiche_chaude_ready` tinyint(1) NOT NULL DEFAULT '0',
  `etab_id` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `28_2024_coaching_students`
--

INSERT INTO `28_2024_coaching_students` (`id`, `coaching_id`, `student_id`, `progression`, `fiche_chaude_ready`, `etab_id`) VALUES
(1, 1, 8, 0, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `28_2024_comite_rende_vous`
--

DROP TABLE IF EXISTS `28_2024_comite_rende_vous`;
CREATE TABLE IF NOT EXISTS `28_2024_comite_rende_vous` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_projet` int NOT NULL,
  `date_comite` date NOT NULL,
  `heure_comite` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `lieu_comite` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `etab_id` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `28_2024_comite_rende_vous`
--

INSERT INTO `28_2024_comite_rende_vous` (`id`, `id_projet`, `date_comite`, `heure_comite`, `lieu_comite`, `etab_id`) VALUES
(1, 7, '2024-11-13', '10:00', 'Faculté des Lettres et des Sciences Humaines de Sousse', NULL),
(2, 9, '2024-11-13', '10:00', 'Faculté des Lettres et des Sciences Humaines de Sousse', NULL),
(17, 12, '2024-11-15', '09:00', 'Chott Mariem', NULL),
(18, 10, '2024-11-15', '09:00', 'Chott Mariem', NULL),
(19, 13, '2024-11-09', '09:30', 'Tunis', NULL),
(20, 8, '2024-11-20', '10:30', 'Sousse', NULL),
(21, 8, '2024-11-19', '10:30', 'Sousse', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `28_2024_competition`
--

DROP TABLE IF EXISTS `28_2024_competition`;
CREATE TABLE IF NOT EXISTS `28_2024_competition` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `date_debut` date NOT NULL,
  `date_fin` date NOT NULL,
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `photo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `etab_id` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `28_2024_competition`
--

INSERT INTO `28_2024_competition` (`id`, `nom`, `date_debut`, `date_fin`, `description`, `photo`, `etab_id`) VALUES
(1, 'testtt compétition', '2024-10-29', '2024-11-10', 'testttttttttttttttt testttttttttttttttttttt', 'https://esen-sci-compet.com/eesu/assets/assets/images/competition3.jpg', NULL),
(3, 'creation didentite visuelle', '2024-11-05', '2024-11-30', 'fjghjhgjhvjh', 'https://esen-sci-compet.com/eesu/assets/assets/images/15.png', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `28_2024_demandes_coaching`
--

DROP TABLE IF EXISTS `28_2024_demandes_coaching`;
CREATE TABLE IF NOT EXISTS `28_2024_demandes_coaching` (
  `id` int NOT NULL AUTO_INCREMENT,
  `coaching_id` int NOT NULL,
  `etudiant_id` int NOT NULL,
  `accepted` tinyint(1) NOT NULL,
  `etab_id` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `28_2024_demandes_formation`
--

DROP TABLE IF EXISTS `28_2024_demandes_formation`;
CREATE TABLE IF NOT EXISTS `28_2024_demandes_formation` (
  `id` int NOT NULL AUTO_INCREMENT,
  `formation_id` int NOT NULL,
  `etudiant_id` int NOT NULL,
  `accepted` tinyint(1) NOT NULL DEFAULT '0',
  `etab_id` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `28_2024_demandes_formation`
--

INSERT INTO `28_2024_demandes_formation` (`id`, `formation_id`, `etudiant_id`, `accepted`, `etab_id`) VALUES
(3, 2, 16, 0, NULL),
(4, 7, 16, 1, NULL),
(5, 4, 16, 0, NULL),
(6, 7, 8, 1, NULL),
(7, 8, 8, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `28_2024_deroulement`
--

DROP TABLE IF EXISTS `28_2024_deroulement`;
CREATE TABLE IF NOT EXISTS `28_2024_deroulement` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_attribution_deroulement` int NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `id_projet` int NOT NULL,
  `etab_id` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1726 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `28_2024_deroulement`
--

INSERT INTO `28_2024_deroulement` (`id`, `id_attribution_deroulement`, `status`, `id_projet`, `etab_id`) VALUES
(24, 24, 0, 7, NULL),
(25, 25, 0, 7, NULL),
(26, 26, 0, 7, NULL),
(27, 27, 0, 7, NULL),
(28, 28, 0, 7, NULL),
(29, 29, 0, 7, NULL),
(30, 30, 0, 7, NULL),
(31, 31, 0, 7, NULL),
(32, 32, 0, 7, NULL),
(33, 33, 0, 7, NULL),
(99, 17, 1, 7, NULL),
(100, 18, 1, 7, NULL),
(101, 19, 1, 7, NULL),
(102, 20, 1, 7, NULL),
(103, 21, 1, 7, NULL),
(104, 22, 1, 7, NULL),
(105, 23, 1, 7, NULL),
(106, 34, 1, 7, NULL),
(107, 35, 1, 7, NULL),
(108, 36, 1, 7, NULL),
(109, 37, 1, 7, NULL),
(110, 38, 1, 7, NULL),
(111, 39, 1, 7, NULL),
(112, 40, 1, 7, NULL),
(113, 41, 1, 7, NULL),
(114, 42, 1, 7, NULL),
(115, 43, 1, 7, NULL),
(116, 44, 1, 7, NULL),
(117, 45, 1, 7, NULL),
(118, 46, 1, 7, NULL),
(119, 47, 1, 7, NULL),
(120, 48, 1, 7, NULL),
(121, 49, 1, 7, NULL),
(122, 50, 1, 7, NULL),
(123, 51, 1, 7, NULL),
(124, 52, 1, 7, NULL),
(125, 53, 1, 7, NULL),
(126, 54, 1, 7, NULL),
(127, 55, 1, 7, NULL),
(128, 56, 0, 7, NULL),
(129, 57, 0, 7, NULL),
(130, 58, 1, 7, NULL),
(131, 59, 1, 7, NULL),
(132, 60, 0, 7, NULL),
(133, 61, 0, 7, NULL),
(134, 1, 0, 10, NULL),
(135, 2, 0, 10, NULL),
(136, 3, 0, 10, NULL),
(137, 4, 0, 10, NULL),
(138, 5, 0, 10, NULL),
(139, 6, 0, 10, NULL),
(140, 7, 0, 10, NULL),
(141, 8, 0, 10, NULL),
(142, 9, 0, 10, NULL),
(143, 10, 0, 10, NULL),
(144, 11, 0, 10, NULL),
(145, 12, 0, 10, NULL),
(146, 13, 0, 10, NULL),
(147, 14, 0, 10, NULL),
(148, 15, 0, 10, NULL),
(149, 16, 0, 10, NULL),
(150, 17, 0, 10, NULL),
(151, 18, 0, 10, NULL),
(152, 19, 0, 10, NULL),
(153, 20, 0, 10, NULL),
(154, 21, 0, 10, NULL),
(155, 22, 0, 10, NULL),
(156, 23, 0, 10, NULL),
(157, 24, 0, 10, NULL),
(158, 25, 0, 10, NULL),
(159, 26, 0, 10, NULL),
(160, 27, 0, 10, NULL),
(161, 28, 0, 10, NULL),
(162, 29, 0, 10, NULL),
(163, 30, 0, 10, NULL),
(164, 31, 0, 10, NULL),
(165, 32, 0, 10, NULL),
(166, 33, 0, 10, NULL),
(167, 34, 0, 10, NULL),
(168, 35, 0, 10, NULL),
(169, 36, 0, 10, NULL),
(170, 37, 0, 10, NULL),
(171, 38, 0, 10, NULL),
(172, 39, 0, 10, NULL),
(173, 40, 0, 10, NULL),
(174, 41, 0, 10, NULL),
(175, 42, 0, 10, NULL),
(176, 43, 0, 10, NULL),
(177, 44, 0, 10, NULL),
(178, 45, 0, 10, NULL),
(179, 46, 0, 10, NULL),
(180, 47, 0, 10, NULL),
(181, 48, 0, 10, NULL),
(182, 49, 0, 10, NULL),
(183, 50, 0, 10, NULL),
(184, 51, 0, 10, NULL),
(185, 52, 0, 10, NULL),
(186, 53, 0, 10, NULL),
(187, 54, 0, 10, NULL),
(188, 55, 0, 10, NULL),
(189, 56, 0, 10, NULL),
(190, 57, 0, 10, NULL),
(191, 58, 0, 10, NULL),
(192, 59, 0, 10, NULL),
(193, 60, 0, 10, NULL),
(194, 61, 0, 10, NULL),
(218, 24, 0, 12, NULL),
(219, 25, 0, 12, NULL),
(220, 26, 0, 12, NULL),
(221, 27, 0, 12, NULL),
(222, 28, 0, 12, NULL),
(223, 29, 0, 12, NULL),
(224, 30, 0, 12, NULL),
(225, 31, 0, 12, NULL),
(226, 32, 0, 12, NULL),
(227, 33, 0, 12, NULL),
(228, 34, 0, 12, NULL),
(229, 35, 0, 12, NULL),
(230, 36, 0, 12, NULL),
(231, 37, 0, 12, NULL),
(232, 38, 0, 12, NULL),
(233, 39, 0, 12, NULL),
(234, 40, 0, 12, NULL),
(235, 41, 0, 12, NULL),
(236, 42, 0, 12, NULL),
(237, 43, 0, 12, NULL),
(238, 44, 0, 12, NULL),
(239, 45, 0, 12, NULL),
(240, 46, 0, 12, NULL),
(241, 47, 0, 12, NULL),
(242, 48, 0, 12, NULL),
(243, 49, 0, 12, NULL),
(244, 50, 0, 12, NULL),
(245, 51, 0, 12, NULL),
(246, 52, 0, 12, NULL),
(247, 53, 0, 12, NULL),
(248, 54, 0, 12, NULL),
(249, 55, 0, 12, NULL),
(250, 56, 0, 12, NULL),
(251, 57, 0, 12, NULL),
(252, 58, 0, 12, NULL),
(253, 59, 0, 12, NULL),
(254, 60, 0, 12, NULL),
(255, 61, 0, 12, NULL),
(263, 8, 0, 11, NULL),
(264, 9, 0, 11, NULL),
(265, 10, 0, 11, NULL),
(266, 11, 0, 11, NULL),
(267, 12, 0, 11, NULL),
(268, 13, 0, 11, NULL),
(269, 14, 0, 11, NULL),
(270, 15, 0, 11, NULL),
(271, 16, 0, 11, NULL),
(272, 17, 0, 11, NULL),
(273, 18, 0, 11, NULL),
(274, 19, 0, 11, NULL),
(275, 20, 0, 11, NULL),
(276, 21, 0, 11, NULL),
(277, 22, 0, 11, NULL),
(278, 23, 0, 11, NULL),
(279, 24, 0, 11, NULL),
(280, 25, 0, 11, NULL),
(281, 26, 0, 11, NULL),
(282, 27, 0, 11, NULL),
(283, 28, 0, 11, NULL),
(284, 29, 0, 11, NULL),
(285, 30, 0, 11, NULL),
(286, 31, 0, 11, NULL),
(287, 32, 0, 11, NULL),
(288, 33, 0, 11, NULL),
(289, 34, 0, 11, NULL),
(290, 35, 0, 11, NULL),
(291, 36, 0, 11, NULL),
(292, 37, 0, 11, NULL),
(293, 38, 0, 11, NULL),
(294, 39, 0, 11, NULL),
(295, 40, 0, 11, NULL),
(296, 41, 0, 11, NULL),
(297, 42, 0, 11, NULL),
(298, 43, 0, 11, NULL),
(299, 44, 0, 11, NULL),
(300, 45, 0, 11, NULL),
(301, 46, 0, 11, NULL),
(302, 47, 0, 11, NULL),
(303, 48, 0, 11, NULL),
(304, 49, 0, 11, NULL),
(305, 50, 0, 11, NULL),
(306, 51, 0, 11, NULL),
(307, 52, 0, 11, NULL),
(308, 53, 0, 11, NULL),
(309, 54, 0, 11, NULL),
(310, 55, 0, 11, NULL),
(311, 56, 0, 11, NULL),
(312, 57, 0, 11, NULL),
(313, 58, 0, 11, NULL),
(314, 59, 0, 11, NULL),
(315, 60, 0, 11, NULL),
(316, 61, 0, 11, NULL),
(317, 1, 1, 11, NULL),
(318, 2, 1, 11, NULL),
(319, 3, 1, 11, NULL),
(320, 4, 1, 11, NULL),
(321, 5, 1, 11, NULL),
(322, 6, 1, 11, NULL),
(323, 7, 1, 11, NULL),
(324, 1, 1, 12, NULL),
(325, 2, 1, 12, NULL),
(326, 3, 1, 12, NULL),
(327, 4, 1, 12, NULL),
(328, 5, 1, 12, NULL),
(329, 6, 1, 12, NULL),
(330, 7, 1, 12, NULL),
(338, 8, 1, 12, NULL),
(339, 9, 1, 12, NULL),
(340, 10, 1, 12, NULL),
(341, 11, 1, 12, NULL),
(342, 12, 1, 12, NULL),
(343, 13, 1, 12, NULL),
(344, 14, 1, 12, NULL),
(354, 15, 1, 12, NULL),
(355, 16, 1, 12, NULL),
(356, 17, 1, 12, NULL),
(357, 18, 1, 12, NULL),
(358, 19, 1, 12, NULL),
(359, 20, 1, 12, NULL),
(360, 21, 1, 12, NULL),
(361, 22, 1, 12, NULL),
(362, 23, 1, 12, NULL),
(370, 8, 0, 13, NULL),
(371, 9, 0, 13, NULL),
(372, 10, 0, 13, NULL),
(373, 11, 0, 13, NULL),
(374, 12, 0, 13, NULL),
(375, 13, 0, 13, NULL),
(376, 14, 0, 13, NULL),
(377, 15, 0, 13, NULL),
(378, 16, 0, 13, NULL),
(379, 17, 0, 13, NULL),
(380, 18, 0, 13, NULL),
(381, 19, 0, 13, NULL),
(382, 20, 0, 13, NULL),
(383, 21, 0, 13, NULL),
(384, 22, 0, 13, NULL),
(385, 23, 0, 13, NULL),
(386, 24, 0, 13, NULL),
(387, 25, 0, 13, NULL),
(388, 26, 0, 13, NULL),
(389, 27, 0, 13, NULL),
(390, 28, 0, 13, NULL),
(391, 29, 0, 13, NULL),
(392, 30, 0, 13, NULL),
(393, 31, 0, 13, NULL),
(394, 32, 0, 13, NULL),
(395, 33, 0, 13, NULL),
(396, 34, 0, 13, NULL),
(397, 35, 0, 13, NULL),
(398, 36, 0, 13, NULL),
(399, 37, 0, 13, NULL),
(400, 38, 0, 13, NULL),
(401, 39, 0, 13, NULL),
(402, 40, 0, 13, NULL),
(403, 41, 0, 13, NULL),
(404, 42, 0, 13, NULL),
(405, 43, 0, 13, NULL),
(406, 44, 0, 13, NULL),
(407, 45, 0, 13, NULL),
(408, 46, 0, 13, NULL),
(409, 47, 0, 13, NULL),
(410, 48, 0, 13, NULL),
(411, 49, 0, 13, NULL),
(412, 50, 0, 13, NULL),
(413, 51, 0, 13, NULL),
(414, 52, 0, 13, NULL),
(415, 53, 0, 13, NULL),
(416, 54, 0, 13, NULL),
(417, 55, 0, 13, NULL),
(418, 56, 0, 13, NULL),
(419, 57, 0, 13, NULL),
(420, 58, 0, 13, NULL),
(421, 59, 0, 13, NULL),
(422, 60, 0, 13, NULL),
(423, 61, 0, 13, NULL),
(431, 1, 1, 13, NULL),
(432, 2, 1, 13, NULL),
(433, 3, 1, 13, NULL),
(434, 4, 1, 13, NULL),
(435, 5, 1, 13, NULL),
(436, 6, 1, 13, NULL),
(437, 7, 1, 13, NULL),
(445, 8, 0, 14, NULL),
(446, 9, 0, 14, NULL),
(447, 10, 0, 14, NULL),
(448, 11, 0, 14, NULL),
(449, 12, 0, 14, NULL),
(450, 13, 0, 14, NULL),
(451, 14, 0, 14, NULL),
(452, 15, 0, 14, NULL),
(453, 16, 0, 14, NULL),
(454, 17, 0, 14, NULL),
(455, 18, 0, 14, NULL),
(456, 19, 0, 14, NULL),
(457, 20, 0, 14, NULL),
(458, 21, 0, 14, NULL),
(459, 22, 0, 14, NULL),
(460, 23, 0, 14, NULL),
(461, 24, 0, 14, NULL),
(462, 25, 0, 14, NULL),
(463, 26, 0, 14, NULL),
(464, 27, 0, 14, NULL),
(465, 28, 0, 14, NULL),
(466, 29, 0, 14, NULL),
(467, 30, 0, 14, NULL),
(468, 31, 0, 14, NULL),
(469, 32, 0, 14, NULL),
(470, 33, 0, 14, NULL),
(471, 34, 0, 14, NULL),
(472, 35, 0, 14, NULL),
(473, 36, 0, 14, NULL),
(474, 37, 0, 14, NULL),
(475, 38, 0, 14, NULL),
(476, 39, 0, 14, NULL),
(477, 40, 0, 14, NULL),
(478, 41, 0, 14, NULL),
(479, 42, 0, 14, NULL),
(480, 43, 0, 14, NULL),
(481, 44, 0, 14, NULL),
(482, 45, 0, 14, NULL),
(483, 46, 0, 14, NULL),
(484, 47, 0, 14, NULL),
(485, 48, 0, 14, NULL),
(486, 49, 0, 14, NULL),
(487, 50, 0, 14, NULL),
(488, 51, 0, 14, NULL),
(489, 52, 0, 14, NULL),
(490, 53, 0, 14, NULL),
(491, 54, 0, 14, NULL),
(492, 55, 0, 14, NULL),
(493, 56, 0, 14, NULL),
(494, 57, 0, 14, NULL),
(495, 58, 0, 14, NULL),
(496, 59, 0, 14, NULL),
(497, 60, 0, 14, NULL),
(498, 61, 0, 14, NULL),
(499, 1, 1, 14, NULL),
(500, 2, 1, 14, NULL),
(501, 3, 1, 14, NULL),
(502, 4, 1, 14, NULL),
(503, 5, 1, 14, NULL),
(504, 6, 1, 14, NULL),
(505, 7, 1, 14, NULL),
(506, 1, 0, 10, NULL),
(507, 2, 0, 10, NULL),
(508, 3, 0, 10, NULL),
(509, 4, 0, 10, NULL),
(510, 5, 0, 10, NULL),
(511, 6, 0, 10, NULL),
(512, 7, 0, 10, NULL),
(513, 8, 0, 10, NULL),
(514, 9, 0, 10, NULL),
(515, 10, 0, 10, NULL),
(516, 11, 0, 10, NULL),
(517, 12, 0, 10, NULL),
(518, 13, 0, 10, NULL),
(519, 14, 0, 10, NULL),
(520, 15, 0, 10, NULL),
(521, 16, 0, 10, NULL),
(522, 17, 0, 10, NULL),
(523, 18, 0, 10, NULL),
(524, 19, 0, 10, NULL),
(525, 20, 0, 10, NULL),
(526, 21, 0, 10, NULL),
(527, 22, 0, 10, NULL),
(528, 23, 0, 10, NULL),
(529, 24, 0, 10, NULL),
(530, 25, 0, 10, NULL),
(531, 26, 0, 10, NULL),
(532, 27, 0, 10, NULL),
(533, 28, 0, 10, NULL),
(534, 29, 0, 10, NULL),
(535, 30, 0, 10, NULL),
(536, 31, 0, 10, NULL),
(537, 32, 0, 10, NULL),
(538, 33, 0, 10, NULL),
(539, 34, 0, 10, NULL),
(540, 35, 0, 10, NULL),
(541, 36, 0, 10, NULL),
(542, 37, 0, 10, NULL),
(543, 38, 0, 10, NULL),
(544, 39, 0, 10, NULL),
(545, 40, 0, 10, NULL),
(546, 41, 0, 10, NULL),
(547, 42, 0, 10, NULL),
(548, 43, 0, 10, NULL),
(549, 44, 0, 10, NULL),
(550, 45, 0, 10, NULL),
(551, 46, 0, 10, NULL),
(552, 47, 0, 10, NULL),
(553, 48, 0, 10, NULL),
(554, 49, 0, 10, NULL),
(555, 50, 0, 10, NULL),
(556, 51, 0, 10, NULL),
(557, 52, 0, 10, NULL),
(558, 53, 0, 10, NULL),
(559, 54, 0, 10, NULL),
(560, 55, 0, 10, NULL),
(561, 56, 0, 10, NULL),
(562, 57, 0, 10, NULL),
(563, 58, 0, 10, NULL),
(564, 59, 0, 10, NULL),
(565, 60, 0, 10, NULL),
(566, 61, 0, 10, NULL),
(567, 1, 0, 11, NULL),
(568, 2, 0, 11, NULL),
(569, 3, 0, 11, NULL),
(570, 4, 0, 11, NULL),
(571, 5, 0, 11, NULL),
(572, 6, 0, 11, NULL),
(573, 7, 0, 11, NULL),
(574, 8, 0, 11, NULL),
(575, 9, 0, 11, NULL),
(576, 10, 0, 11, NULL),
(577, 11, 0, 11, NULL),
(578, 12, 0, 11, NULL),
(579, 13, 0, 11, NULL),
(580, 14, 0, 11, NULL),
(581, 15, 0, 11, NULL),
(582, 16, 0, 11, NULL),
(583, 17, 0, 11, NULL),
(584, 18, 0, 11, NULL),
(585, 19, 0, 11, NULL),
(586, 20, 0, 11, NULL),
(587, 21, 0, 11, NULL),
(588, 22, 0, 11, NULL),
(589, 23, 0, 11, NULL),
(590, 24, 0, 11, NULL),
(591, 25, 0, 11, NULL),
(592, 26, 0, 11, NULL),
(593, 27, 0, 11, NULL),
(594, 28, 0, 11, NULL),
(595, 29, 0, 11, NULL),
(596, 30, 0, 11, NULL),
(597, 31, 0, 11, NULL),
(598, 32, 0, 11, NULL),
(599, 33, 0, 11, NULL),
(600, 34, 0, 11, NULL),
(601, 35, 0, 11, NULL),
(602, 36, 0, 11, NULL),
(603, 37, 0, 11, NULL),
(604, 38, 0, 11, NULL),
(605, 39, 0, 11, NULL),
(606, 40, 0, 11, NULL),
(607, 41, 0, 11, NULL),
(608, 42, 0, 11, NULL),
(609, 43, 0, 11, NULL),
(610, 44, 0, 11, NULL),
(611, 45, 0, 11, NULL),
(612, 46, 0, 11, NULL),
(613, 47, 0, 11, NULL),
(614, 48, 0, 11, NULL),
(615, 49, 0, 11, NULL),
(616, 50, 0, 11, NULL),
(617, 51, 0, 11, NULL),
(618, 52, 0, 11, NULL),
(619, 53, 0, 11, NULL),
(620, 54, 0, 11, NULL),
(621, 55, 0, 11, NULL),
(622, 56, 0, 11, NULL),
(623, 57, 0, 11, NULL),
(624, 58, 0, 11, NULL),
(625, 59, 0, 11, NULL),
(626, 60, 0, 11, NULL),
(627, 61, 0, 11, NULL),
(628, 1, 0, 11, NULL),
(629, 2, 0, 11, NULL),
(630, 3, 0, 11, NULL),
(631, 4, 0, 11, NULL),
(632, 5, 0, 11, NULL),
(633, 6, 0, 11, NULL),
(634, 7, 0, 11, NULL),
(635, 8, 0, 11, NULL),
(636, 9, 0, 11, NULL),
(637, 10, 0, 11, NULL),
(638, 11, 0, 11, NULL),
(639, 12, 0, 11, NULL),
(640, 13, 0, 11, NULL),
(641, 14, 0, 11, NULL),
(642, 15, 0, 11, NULL),
(643, 16, 0, 11, NULL),
(644, 17, 0, 11, NULL),
(645, 18, 0, 11, NULL),
(646, 19, 0, 11, NULL),
(647, 20, 0, 11, NULL),
(648, 21, 0, 11, NULL),
(649, 22, 0, 11, NULL),
(650, 23, 0, 11, NULL),
(651, 24, 0, 11, NULL),
(652, 25, 0, 11, NULL),
(653, 26, 0, 11, NULL),
(654, 27, 0, 11, NULL),
(655, 28, 0, 11, NULL),
(656, 29, 0, 11, NULL),
(657, 30, 0, 11, NULL),
(658, 31, 0, 11, NULL),
(659, 32, 0, 11, NULL),
(660, 33, 0, 11, NULL),
(661, 34, 0, 11, NULL),
(662, 35, 0, 11, NULL),
(663, 36, 0, 11, NULL),
(664, 37, 0, 11, NULL),
(665, 38, 0, 11, NULL),
(666, 39, 0, 11, NULL),
(667, 40, 0, 11, NULL),
(668, 41, 0, 11, NULL),
(669, 42, 0, 11, NULL),
(670, 43, 0, 11, NULL),
(671, 44, 0, 11, NULL),
(672, 45, 0, 11, NULL),
(673, 46, 0, 11, NULL),
(674, 47, 0, 11, NULL),
(675, 48, 0, 11, NULL),
(676, 49, 0, 11, NULL),
(677, 50, 0, 11, NULL),
(678, 51, 0, 11, NULL),
(679, 52, 0, 11, NULL),
(680, 53, 0, 11, NULL),
(681, 54, 0, 11, NULL),
(682, 55, 0, 11, NULL),
(683, 56, 0, 11, NULL),
(684, 57, 0, 11, NULL),
(685, 58, 0, 11, NULL),
(686, 59, 0, 11, NULL),
(687, 60, 0, 11, NULL),
(688, 61, 0, 11, NULL),
(689, 1, 0, 11, NULL),
(690, 2, 0, 11, NULL),
(691, 3, 0, 11, NULL),
(692, 4, 0, 11, NULL),
(693, 5, 0, 11, NULL),
(694, 6, 0, 11, NULL),
(695, 7, 0, 11, NULL),
(696, 8, 0, 11, NULL),
(697, 9, 0, 11, NULL),
(698, 10, 0, 11, NULL),
(699, 11, 0, 11, NULL),
(700, 12, 0, 11, NULL),
(701, 13, 0, 11, NULL),
(702, 14, 0, 11, NULL),
(703, 15, 0, 11, NULL),
(704, 16, 0, 11, NULL),
(705, 17, 0, 11, NULL),
(706, 18, 0, 11, NULL),
(707, 19, 0, 11, NULL),
(708, 20, 0, 11, NULL),
(709, 21, 0, 11, NULL),
(710, 22, 0, 11, NULL),
(711, 23, 0, 11, NULL),
(712, 24, 0, 11, NULL),
(713, 25, 0, 11, NULL),
(714, 26, 0, 11, NULL),
(715, 27, 0, 11, NULL),
(716, 28, 0, 11, NULL),
(717, 29, 0, 11, NULL),
(718, 30, 0, 11, NULL),
(719, 31, 0, 11, NULL),
(720, 32, 0, 11, NULL),
(721, 33, 0, 11, NULL),
(722, 34, 0, 11, NULL),
(723, 35, 0, 11, NULL),
(724, 36, 0, 11, NULL),
(725, 37, 0, 11, NULL),
(726, 38, 0, 11, NULL),
(727, 39, 0, 11, NULL),
(728, 40, 0, 11, NULL),
(729, 41, 0, 11, NULL),
(730, 42, 0, 11, NULL),
(731, 43, 0, 11, NULL),
(732, 44, 0, 11, NULL),
(733, 45, 0, 11, NULL),
(734, 46, 0, 11, NULL),
(735, 47, 0, 11, NULL),
(736, 48, 0, 11, NULL),
(737, 49, 0, 11, NULL),
(738, 50, 0, 11, NULL),
(739, 51, 0, 11, NULL),
(740, 52, 0, 11, NULL),
(741, 53, 0, 11, NULL),
(742, 54, 0, 11, NULL),
(743, 55, 0, 11, NULL),
(744, 56, 0, 11, NULL),
(745, 57, 0, 11, NULL),
(746, 58, 0, 11, NULL),
(747, 59, 0, 11, NULL),
(748, 60, 0, 11, NULL),
(749, 61, 0, 11, NULL),
(750, 1, 0, 11, NULL),
(751, 2, 0, 11, NULL),
(752, 3, 0, 11, NULL),
(753, 4, 0, 11, NULL),
(754, 5, 0, 11, NULL),
(755, 6, 0, 11, NULL),
(756, 7, 0, 11, NULL),
(757, 8, 0, 11, NULL),
(758, 9, 0, 11, NULL),
(759, 10, 0, 11, NULL),
(760, 11, 0, 11, NULL),
(761, 12, 0, 11, NULL),
(762, 13, 0, 11, NULL),
(763, 14, 0, 11, NULL),
(764, 15, 0, 11, NULL),
(765, 16, 0, 11, NULL),
(766, 17, 0, 11, NULL),
(767, 18, 0, 11, NULL),
(768, 19, 0, 11, NULL),
(769, 20, 0, 11, NULL),
(770, 21, 0, 11, NULL),
(771, 22, 0, 11, NULL),
(772, 23, 0, 11, NULL),
(773, 24, 0, 11, NULL),
(774, 25, 0, 11, NULL),
(775, 26, 0, 11, NULL),
(776, 27, 0, 11, NULL),
(777, 28, 0, 11, NULL),
(778, 29, 0, 11, NULL),
(779, 30, 0, 11, NULL),
(780, 31, 0, 11, NULL),
(781, 32, 0, 11, NULL),
(782, 33, 0, 11, NULL),
(783, 34, 0, 11, NULL),
(784, 35, 0, 11, NULL),
(785, 36, 0, 11, NULL),
(786, 37, 0, 11, NULL),
(787, 38, 0, 11, NULL),
(788, 39, 0, 11, NULL),
(789, 40, 0, 11, NULL),
(790, 41, 0, 11, NULL),
(791, 42, 0, 11, NULL),
(792, 43, 0, 11, NULL),
(793, 44, 0, 11, NULL),
(794, 45, 0, 11, NULL),
(795, 46, 0, 11, NULL),
(796, 47, 0, 11, NULL),
(797, 48, 0, 11, NULL),
(798, 49, 0, 11, NULL),
(799, 50, 0, 11, NULL),
(800, 51, 0, 11, NULL),
(801, 52, 0, 11, NULL),
(802, 53, 0, 11, NULL),
(803, 54, 0, 11, NULL),
(804, 55, 0, 11, NULL),
(805, 56, 0, 11, NULL),
(806, 57, 0, 11, NULL),
(807, 58, 0, 11, NULL),
(808, 59, 0, 11, NULL),
(809, 60, 0, 11, NULL),
(810, 61, 0, 11, NULL),
(811, 1, 0, 11, NULL),
(812, 2, 0, 11, NULL),
(813, 3, 0, 11, NULL),
(814, 4, 0, 11, NULL),
(815, 5, 0, 11, NULL),
(816, 6, 0, 11, NULL),
(817, 7, 0, 11, NULL),
(818, 8, 0, 11, NULL),
(819, 9, 0, 11, NULL),
(820, 10, 0, 11, NULL),
(821, 11, 0, 11, NULL),
(822, 12, 0, 11, NULL),
(823, 13, 0, 11, NULL),
(824, 14, 0, 11, NULL),
(825, 15, 0, 11, NULL),
(826, 16, 0, 11, NULL),
(827, 17, 0, 11, NULL),
(828, 18, 0, 11, NULL),
(829, 19, 0, 11, NULL),
(830, 20, 0, 11, NULL),
(831, 21, 0, 11, NULL),
(832, 22, 0, 11, NULL),
(833, 23, 0, 11, NULL),
(834, 24, 0, 11, NULL),
(835, 25, 0, 11, NULL),
(836, 26, 0, 11, NULL),
(837, 27, 0, 11, NULL),
(838, 28, 0, 11, NULL),
(839, 29, 0, 11, NULL),
(840, 30, 0, 11, NULL),
(841, 31, 0, 11, NULL),
(842, 32, 0, 11, NULL),
(843, 33, 0, 11, NULL),
(844, 34, 0, 11, NULL),
(845, 35, 0, 11, NULL),
(846, 36, 0, 11, NULL),
(847, 37, 0, 11, NULL),
(848, 38, 0, 11, NULL),
(849, 39, 0, 11, NULL),
(850, 40, 0, 11, NULL),
(851, 41, 0, 11, NULL),
(852, 42, 0, 11, NULL),
(853, 43, 0, 11, NULL),
(854, 44, 0, 11, NULL),
(855, 45, 0, 11, NULL),
(856, 46, 0, 11, NULL),
(857, 47, 0, 11, NULL),
(858, 48, 0, 11, NULL),
(859, 49, 0, 11, NULL),
(860, 50, 0, 11, NULL),
(861, 51, 0, 11, NULL),
(862, 52, 0, 11, NULL),
(863, 53, 0, 11, NULL),
(864, 54, 0, 11, NULL),
(865, 55, 0, 11, NULL),
(866, 56, 0, 11, NULL),
(867, 57, 0, 11, NULL),
(868, 58, 0, 11, NULL),
(869, 59, 0, 11, NULL),
(870, 60, 0, 11, NULL),
(871, 61, 0, 11, NULL),
(872, 1, 0, 11, NULL),
(873, 2, 0, 11, NULL),
(874, 3, 0, 11, NULL),
(875, 4, 0, 11, NULL),
(876, 5, 0, 11, NULL),
(877, 6, 0, 11, NULL),
(878, 7, 0, 11, NULL),
(879, 8, 0, 11, NULL),
(880, 9, 0, 11, NULL),
(881, 10, 0, 11, NULL),
(882, 11, 0, 11, NULL),
(883, 12, 0, 11, NULL),
(884, 13, 0, 11, NULL),
(885, 14, 0, 11, NULL),
(886, 15, 0, 11, NULL),
(887, 16, 0, 11, NULL),
(888, 17, 0, 11, NULL),
(889, 18, 0, 11, NULL),
(890, 19, 0, 11, NULL),
(891, 20, 0, 11, NULL),
(892, 21, 0, 11, NULL),
(893, 22, 0, 11, NULL),
(894, 23, 0, 11, NULL),
(895, 24, 0, 11, NULL),
(896, 25, 0, 11, NULL),
(897, 26, 0, 11, NULL),
(898, 27, 0, 11, NULL),
(899, 28, 0, 11, NULL),
(900, 29, 0, 11, NULL),
(901, 30, 0, 11, NULL),
(902, 31, 0, 11, NULL),
(903, 32, 0, 11, NULL),
(904, 33, 0, 11, NULL),
(905, 34, 0, 11, NULL),
(906, 35, 0, 11, NULL),
(907, 36, 0, 11, NULL),
(908, 37, 0, 11, NULL),
(909, 38, 0, 11, NULL),
(910, 39, 0, 11, NULL),
(911, 40, 0, 11, NULL),
(912, 41, 0, 11, NULL),
(913, 42, 0, 11, NULL),
(914, 43, 0, 11, NULL),
(915, 44, 0, 11, NULL),
(916, 45, 0, 11, NULL),
(917, 46, 0, 11, NULL),
(918, 47, 0, 11, NULL),
(919, 48, 0, 11, NULL),
(920, 49, 0, 11, NULL),
(921, 50, 0, 11, NULL),
(922, 51, 0, 11, NULL),
(923, 52, 0, 11, NULL),
(924, 53, 0, 11, NULL),
(925, 54, 0, 11, NULL),
(926, 55, 0, 11, NULL),
(927, 56, 0, 11, NULL),
(928, 57, 0, 11, NULL),
(929, 58, 0, 11, NULL),
(930, 59, 0, 11, NULL),
(931, 60, 0, 11, NULL),
(932, 61, 0, 11, NULL),
(933, 1, 0, 11, NULL),
(934, 2, 0, 11, NULL),
(935, 3, 0, 11, NULL),
(936, 4, 0, 11, NULL),
(937, 5, 0, 11, NULL),
(938, 6, 0, 11, NULL),
(939, 7, 0, 11, NULL),
(940, 8, 0, 11, NULL),
(941, 9, 0, 11, NULL),
(942, 10, 0, 11, NULL),
(943, 11, 0, 11, NULL),
(944, 12, 0, 11, NULL),
(945, 13, 0, 11, NULL),
(946, 14, 0, 11, NULL),
(947, 15, 0, 11, NULL),
(948, 16, 0, 11, NULL),
(949, 17, 0, 11, NULL),
(950, 18, 0, 11, NULL),
(951, 19, 0, 11, NULL),
(952, 20, 0, 11, NULL),
(953, 21, 0, 11, NULL),
(954, 22, 0, 11, NULL),
(955, 23, 0, 11, NULL),
(956, 24, 0, 11, NULL),
(957, 25, 0, 11, NULL),
(958, 26, 0, 11, NULL),
(959, 27, 0, 11, NULL),
(960, 28, 0, 11, NULL),
(961, 29, 0, 11, NULL),
(962, 30, 0, 11, NULL),
(963, 31, 0, 11, NULL),
(964, 32, 0, 11, NULL),
(965, 33, 0, 11, NULL),
(966, 34, 0, 11, NULL),
(967, 35, 0, 11, NULL),
(968, 36, 0, 11, NULL),
(969, 37, 0, 11, NULL),
(970, 38, 0, 11, NULL),
(971, 39, 0, 11, NULL),
(972, 40, 0, 11, NULL),
(973, 41, 0, 11, NULL),
(974, 42, 0, 11, NULL),
(975, 43, 0, 11, NULL),
(976, 44, 0, 11, NULL),
(977, 45, 0, 11, NULL),
(978, 46, 0, 11, NULL),
(979, 47, 0, 11, NULL),
(980, 48, 0, 11, NULL),
(981, 49, 0, 11, NULL),
(982, 50, 0, 11, NULL),
(983, 51, 0, 11, NULL),
(984, 52, 0, 11, NULL),
(985, 53, 0, 11, NULL),
(986, 54, 0, 11, NULL),
(987, 55, 0, 11, NULL),
(988, 56, 0, 11, NULL),
(989, 57, 0, 11, NULL),
(990, 58, 0, 11, NULL),
(991, 59, 0, 11, NULL),
(992, 60, 0, 11, NULL),
(993, 61, 0, 11, NULL),
(994, 1, 0, 11, NULL),
(995, 2, 0, 11, NULL),
(996, 3, 0, 11, NULL),
(997, 4, 0, 11, NULL),
(998, 5, 0, 11, NULL),
(999, 6, 0, 11, NULL),
(1000, 7, 0, 11, NULL),
(1001, 8, 0, 11, NULL),
(1002, 9, 0, 11, NULL),
(1003, 10, 0, 11, NULL),
(1004, 11, 0, 11, NULL),
(1005, 12, 0, 11, NULL),
(1006, 13, 0, 11, NULL),
(1007, 14, 0, 11, NULL),
(1008, 15, 0, 11, NULL),
(1009, 16, 0, 11, NULL),
(1010, 17, 0, 11, NULL),
(1011, 18, 0, 11, NULL),
(1012, 19, 0, 11, NULL),
(1013, 20, 0, 11, NULL),
(1014, 21, 0, 11, NULL),
(1015, 22, 0, 11, NULL),
(1016, 23, 0, 11, NULL),
(1017, 24, 0, 11, NULL),
(1018, 25, 0, 11, NULL),
(1019, 26, 0, 11, NULL),
(1020, 27, 0, 11, NULL),
(1021, 28, 0, 11, NULL),
(1022, 29, 0, 11, NULL),
(1023, 30, 0, 11, NULL),
(1024, 31, 0, 11, NULL),
(1025, 32, 0, 11, NULL),
(1026, 33, 0, 11, NULL),
(1027, 34, 0, 11, NULL),
(1028, 35, 0, 11, NULL),
(1029, 36, 0, 11, NULL),
(1030, 37, 0, 11, NULL),
(1031, 38, 0, 11, NULL),
(1032, 39, 0, 11, NULL),
(1033, 40, 0, 11, NULL),
(1034, 41, 0, 11, NULL),
(1035, 42, 0, 11, NULL),
(1036, 43, 0, 11, NULL),
(1037, 44, 0, 11, NULL),
(1038, 45, 0, 11, NULL),
(1039, 46, 0, 11, NULL),
(1040, 47, 0, 11, NULL),
(1041, 48, 0, 11, NULL),
(1042, 49, 0, 11, NULL),
(1043, 50, 0, 11, NULL),
(1044, 51, 0, 11, NULL),
(1045, 52, 0, 11, NULL),
(1046, 53, 0, 11, NULL),
(1047, 54, 0, 11, NULL),
(1048, 55, 0, 11, NULL),
(1049, 56, 0, 11, NULL),
(1050, 57, 0, 11, NULL),
(1051, 58, 0, 11, NULL),
(1052, 59, 0, 11, NULL),
(1053, 60, 0, 11, NULL),
(1054, 61, 0, 11, NULL),
(1055, 1, 0, 11, NULL),
(1056, 2, 0, 11, NULL),
(1057, 3, 0, 11, NULL),
(1058, 4, 0, 11, NULL),
(1059, 5, 0, 11, NULL),
(1060, 6, 0, 11, NULL),
(1061, 7, 0, 11, NULL),
(1062, 8, 0, 11, NULL),
(1063, 9, 0, 11, NULL),
(1064, 10, 0, 11, NULL),
(1065, 11, 0, 11, NULL),
(1066, 12, 0, 11, NULL),
(1067, 13, 0, 11, NULL),
(1068, 14, 0, 11, NULL),
(1069, 15, 0, 11, NULL),
(1070, 16, 0, 11, NULL),
(1071, 17, 0, 11, NULL),
(1072, 18, 0, 11, NULL),
(1073, 19, 0, 11, NULL),
(1074, 20, 0, 11, NULL),
(1075, 21, 0, 11, NULL),
(1076, 22, 0, 11, NULL),
(1077, 23, 0, 11, NULL),
(1078, 24, 0, 11, NULL),
(1079, 25, 0, 11, NULL),
(1080, 26, 0, 11, NULL),
(1081, 27, 0, 11, NULL),
(1082, 28, 0, 11, NULL),
(1083, 29, 0, 11, NULL),
(1084, 30, 0, 11, NULL),
(1085, 31, 0, 11, NULL),
(1086, 32, 0, 11, NULL),
(1087, 33, 0, 11, NULL),
(1088, 34, 0, 11, NULL),
(1089, 35, 0, 11, NULL),
(1090, 36, 0, 11, NULL),
(1091, 37, 0, 11, NULL),
(1092, 38, 0, 11, NULL),
(1093, 39, 0, 11, NULL),
(1094, 40, 0, 11, NULL),
(1095, 41, 0, 11, NULL),
(1096, 42, 0, 11, NULL),
(1097, 43, 0, 11, NULL),
(1098, 44, 0, 11, NULL),
(1099, 45, 0, 11, NULL),
(1100, 46, 0, 11, NULL),
(1101, 47, 0, 11, NULL),
(1102, 48, 0, 11, NULL),
(1103, 49, 0, 11, NULL),
(1104, 50, 0, 11, NULL),
(1105, 51, 0, 11, NULL),
(1106, 52, 0, 11, NULL),
(1107, 53, 0, 11, NULL),
(1108, 54, 0, 11, NULL),
(1109, 55, 0, 11, NULL),
(1110, 56, 0, 11, NULL),
(1111, 57, 0, 11, NULL),
(1112, 58, 0, 11, NULL),
(1113, 59, 0, 11, NULL),
(1114, 60, 0, 11, NULL),
(1115, 61, 0, 11, NULL),
(1116, 1, 0, 11, NULL),
(1117, 2, 0, 11, NULL),
(1118, 3, 0, 11, NULL),
(1119, 4, 0, 11, NULL),
(1120, 5, 0, 11, NULL),
(1121, 6, 0, 11, NULL),
(1122, 7, 0, 11, NULL),
(1123, 8, 0, 11, NULL),
(1124, 9, 0, 11, NULL),
(1125, 10, 0, 11, NULL),
(1126, 11, 0, 11, NULL),
(1127, 12, 0, 11, NULL),
(1128, 13, 0, 11, NULL),
(1129, 14, 0, 11, NULL),
(1130, 15, 0, 11, NULL),
(1131, 16, 0, 11, NULL),
(1132, 17, 0, 11, NULL),
(1133, 18, 0, 11, NULL),
(1134, 19, 0, 11, NULL),
(1135, 20, 0, 11, NULL),
(1136, 21, 0, 11, NULL),
(1137, 22, 0, 11, NULL),
(1138, 23, 0, 11, NULL),
(1139, 24, 0, 11, NULL),
(1140, 25, 0, 11, NULL),
(1141, 26, 0, 11, NULL),
(1142, 27, 0, 11, NULL),
(1143, 28, 0, 11, NULL),
(1144, 29, 0, 11, NULL),
(1145, 30, 0, 11, NULL),
(1146, 31, 0, 11, NULL),
(1147, 32, 0, 11, NULL),
(1148, 33, 0, 11, NULL),
(1149, 34, 0, 11, NULL),
(1150, 35, 0, 11, NULL),
(1151, 36, 0, 11, NULL),
(1152, 37, 0, 11, NULL),
(1153, 38, 0, 11, NULL),
(1154, 39, 0, 11, NULL),
(1155, 40, 0, 11, NULL),
(1156, 41, 0, 11, NULL),
(1157, 42, 0, 11, NULL),
(1158, 43, 0, 11, NULL),
(1159, 44, 0, 11, NULL),
(1160, 45, 0, 11, NULL),
(1161, 46, 0, 11, NULL),
(1162, 47, 0, 11, NULL),
(1163, 48, 0, 11, NULL),
(1164, 49, 0, 11, NULL),
(1165, 50, 0, 11, NULL),
(1166, 51, 0, 11, NULL),
(1167, 52, 0, 11, NULL),
(1168, 53, 0, 11, NULL),
(1169, 54, 0, 11, NULL),
(1170, 55, 0, 11, NULL),
(1171, 56, 0, 11, NULL),
(1172, 57, 0, 11, NULL),
(1173, 58, 0, 11, NULL),
(1174, 59, 0, 11, NULL),
(1175, 60, 0, 11, NULL),
(1176, 61, 0, 11, NULL),
(1177, 1, 0, 11, NULL),
(1178, 2, 0, 11, NULL),
(1179, 3, 0, 11, NULL),
(1180, 4, 0, 11, NULL),
(1181, 5, 0, 11, NULL),
(1182, 6, 0, 11, NULL),
(1183, 7, 0, 11, NULL),
(1184, 8, 0, 11, NULL),
(1185, 9, 0, 11, NULL),
(1186, 10, 0, 11, NULL),
(1187, 11, 0, 11, NULL),
(1188, 12, 0, 11, NULL),
(1189, 13, 0, 11, NULL),
(1190, 14, 0, 11, NULL),
(1191, 15, 0, 11, NULL),
(1192, 16, 0, 11, NULL),
(1193, 17, 0, 11, NULL),
(1194, 18, 0, 11, NULL),
(1195, 19, 0, 11, NULL),
(1196, 20, 0, 11, NULL),
(1197, 21, 0, 11, NULL),
(1198, 22, 0, 11, NULL),
(1199, 23, 0, 11, NULL),
(1200, 24, 0, 11, NULL),
(1201, 25, 0, 11, NULL),
(1202, 26, 0, 11, NULL),
(1203, 27, 0, 11, NULL),
(1204, 28, 0, 11, NULL),
(1205, 29, 0, 11, NULL),
(1206, 30, 0, 11, NULL),
(1207, 31, 0, 11, NULL),
(1208, 32, 0, 11, NULL),
(1209, 33, 0, 11, NULL),
(1210, 34, 0, 11, NULL),
(1211, 35, 0, 11, NULL),
(1212, 36, 0, 11, NULL),
(1213, 37, 0, 11, NULL),
(1214, 38, 0, 11, NULL),
(1215, 39, 0, 11, NULL),
(1216, 40, 0, 11, NULL),
(1217, 41, 0, 11, NULL),
(1218, 42, 0, 11, NULL),
(1219, 43, 0, 11, NULL),
(1220, 44, 0, 11, NULL),
(1221, 45, 0, 11, NULL),
(1222, 46, 0, 11, NULL),
(1223, 47, 0, 11, NULL),
(1224, 48, 0, 11, NULL),
(1225, 49, 0, 11, NULL),
(1226, 50, 0, 11, NULL),
(1227, 51, 0, 11, NULL),
(1228, 52, 0, 11, NULL),
(1229, 53, 0, 11, NULL),
(1230, 54, 0, 11, NULL),
(1231, 55, 0, 11, NULL),
(1232, 56, 0, 11, NULL),
(1233, 57, 0, 11, NULL),
(1234, 58, 0, 11, NULL),
(1235, 59, 0, 11, NULL),
(1236, 60, 0, 11, NULL),
(1237, 61, 0, 11, NULL),
(1238, 1, 0, 11, NULL),
(1239, 2, 0, 11, NULL),
(1240, 3, 0, 11, NULL),
(1241, 4, 0, 11, NULL),
(1242, 5, 0, 11, NULL),
(1243, 6, 0, 11, NULL),
(1244, 7, 0, 11, NULL),
(1245, 8, 0, 11, NULL),
(1246, 9, 0, 11, NULL),
(1247, 10, 0, 11, NULL),
(1248, 11, 0, 11, NULL),
(1249, 12, 0, 11, NULL),
(1250, 13, 0, 11, NULL),
(1251, 14, 0, 11, NULL),
(1252, 15, 0, 11, NULL),
(1253, 16, 0, 11, NULL),
(1254, 17, 0, 11, NULL),
(1255, 18, 0, 11, NULL),
(1256, 19, 0, 11, NULL),
(1257, 20, 0, 11, NULL),
(1258, 21, 0, 11, NULL),
(1259, 22, 0, 11, NULL),
(1260, 23, 0, 11, NULL),
(1261, 24, 0, 11, NULL),
(1262, 25, 0, 11, NULL),
(1263, 26, 0, 11, NULL),
(1264, 27, 0, 11, NULL),
(1265, 28, 0, 11, NULL),
(1266, 29, 0, 11, NULL),
(1267, 30, 0, 11, NULL),
(1268, 31, 0, 11, NULL),
(1269, 32, 0, 11, NULL),
(1270, 33, 0, 11, NULL),
(1271, 34, 0, 11, NULL),
(1272, 35, 0, 11, NULL),
(1273, 36, 0, 11, NULL),
(1274, 37, 0, 11, NULL),
(1275, 38, 0, 11, NULL),
(1276, 39, 0, 11, NULL),
(1277, 40, 0, 11, NULL),
(1278, 41, 0, 11, NULL),
(1279, 42, 0, 11, NULL),
(1280, 43, 0, 11, NULL),
(1281, 44, 0, 11, NULL),
(1282, 45, 0, 11, NULL),
(1283, 46, 0, 11, NULL),
(1284, 47, 0, 11, NULL),
(1285, 48, 0, 11, NULL),
(1286, 49, 0, 11, NULL),
(1287, 50, 0, 11, NULL),
(1288, 51, 0, 11, NULL),
(1289, 52, 0, 11, NULL),
(1290, 53, 0, 11, NULL),
(1291, 54, 0, 11, NULL),
(1292, 55, 0, 11, NULL),
(1293, 56, 0, 11, NULL),
(1294, 57, 0, 11, NULL),
(1295, 58, 0, 11, NULL),
(1296, 59, 0, 11, NULL),
(1297, 60, 0, 11, NULL),
(1298, 61, 0, 11, NULL),
(1299, 1, 0, 11, NULL),
(1300, 2, 0, 11, NULL),
(1301, 3, 0, 11, NULL),
(1302, 4, 0, 11, NULL),
(1303, 5, 0, 11, NULL),
(1304, 6, 0, 11, NULL),
(1305, 7, 0, 11, NULL),
(1306, 8, 0, 11, NULL),
(1307, 9, 0, 11, NULL),
(1308, 10, 0, 11, NULL),
(1309, 11, 0, 11, NULL),
(1310, 12, 0, 11, NULL),
(1311, 13, 0, 11, NULL),
(1312, 14, 0, 11, NULL),
(1313, 15, 0, 11, NULL),
(1314, 16, 0, 11, NULL),
(1315, 17, 0, 11, NULL),
(1316, 18, 0, 11, NULL),
(1317, 19, 0, 11, NULL),
(1318, 20, 0, 11, NULL),
(1319, 21, 0, 11, NULL),
(1320, 22, 0, 11, NULL),
(1321, 23, 0, 11, NULL),
(1322, 24, 0, 11, NULL),
(1323, 25, 0, 11, NULL),
(1324, 26, 0, 11, NULL),
(1325, 27, 0, 11, NULL),
(1326, 28, 0, 11, NULL),
(1327, 29, 0, 11, NULL),
(1328, 30, 0, 11, NULL),
(1329, 31, 0, 11, NULL),
(1330, 32, 0, 11, NULL),
(1331, 33, 0, 11, NULL),
(1332, 34, 0, 11, NULL),
(1333, 35, 0, 11, NULL),
(1334, 36, 0, 11, NULL),
(1335, 37, 0, 11, NULL),
(1336, 38, 0, 11, NULL),
(1337, 39, 0, 11, NULL),
(1338, 40, 0, 11, NULL),
(1339, 41, 0, 11, NULL),
(1340, 42, 0, 11, NULL),
(1341, 43, 0, 11, NULL),
(1342, 44, 0, 11, NULL),
(1343, 45, 0, 11, NULL),
(1344, 46, 0, 11, NULL),
(1345, 47, 0, 11, NULL),
(1346, 48, 0, 11, NULL),
(1347, 49, 0, 11, NULL),
(1348, 50, 0, 11, NULL),
(1349, 51, 0, 11, NULL),
(1350, 52, 0, 11, NULL),
(1351, 53, 0, 11, NULL),
(1352, 54, 0, 11, NULL),
(1353, 55, 0, 11, NULL),
(1354, 56, 0, 11, NULL),
(1355, 57, 0, 11, NULL),
(1356, 58, 0, 11, NULL),
(1357, 59, 0, 11, NULL),
(1358, 60, 0, 11, NULL),
(1359, 61, 0, 11, NULL),
(1360, 1, 0, 11, NULL),
(1361, 2, 0, 11, NULL),
(1362, 3, 0, 11, NULL),
(1363, 4, 0, 11, NULL),
(1364, 5, 0, 11, NULL),
(1365, 6, 0, 11, NULL),
(1366, 7, 0, 11, NULL),
(1367, 8, 0, 11, NULL),
(1368, 9, 0, 11, NULL),
(1369, 10, 0, 11, NULL),
(1370, 11, 0, 11, NULL),
(1371, 12, 0, 11, NULL),
(1372, 13, 0, 11, NULL),
(1373, 14, 0, 11, NULL),
(1374, 15, 0, 11, NULL),
(1375, 16, 0, 11, NULL),
(1376, 17, 0, 11, NULL),
(1377, 18, 0, 11, NULL),
(1378, 19, 0, 11, NULL),
(1379, 20, 0, 11, NULL),
(1380, 21, 0, 11, NULL),
(1381, 22, 0, 11, NULL),
(1382, 23, 0, 11, NULL),
(1383, 24, 0, 11, NULL),
(1384, 25, 0, 11, NULL),
(1385, 26, 0, 11, NULL),
(1386, 27, 0, 11, NULL),
(1387, 28, 0, 11, NULL),
(1388, 29, 0, 11, NULL),
(1389, 30, 0, 11, NULL),
(1390, 31, 0, 11, NULL),
(1391, 32, 0, 11, NULL),
(1392, 33, 0, 11, NULL),
(1393, 34, 0, 11, NULL),
(1394, 35, 0, 11, NULL),
(1395, 36, 0, 11, NULL),
(1396, 37, 0, 11, NULL),
(1397, 38, 0, 11, NULL),
(1398, 39, 0, 11, NULL),
(1399, 40, 0, 11, NULL),
(1400, 41, 0, 11, NULL),
(1401, 42, 0, 11, NULL),
(1402, 43, 0, 11, NULL),
(1403, 44, 0, 11, NULL),
(1404, 45, 0, 11, NULL),
(1405, 46, 0, 11, NULL),
(1406, 47, 0, 11, NULL),
(1407, 48, 0, 11, NULL),
(1408, 49, 0, 11, NULL),
(1409, 50, 0, 11, NULL),
(1410, 51, 0, 11, NULL),
(1411, 52, 0, 11, NULL),
(1412, 53, 0, 11, NULL),
(1413, 54, 0, 11, NULL),
(1414, 55, 0, 11, NULL),
(1415, 56, 0, 11, NULL),
(1416, 57, 0, 11, NULL),
(1417, 58, 0, 11, NULL),
(1418, 59, 0, 11, NULL),
(1419, 60, 0, 11, NULL),
(1420, 61, 0, 11, NULL),
(1421, 1, 0, 11, NULL),
(1422, 2, 0, 11, NULL),
(1423, 3, 0, 11, NULL),
(1424, 4, 0, 11, NULL),
(1425, 5, 0, 11, NULL),
(1426, 6, 0, 11, NULL),
(1427, 7, 0, 11, NULL),
(1428, 8, 0, 11, NULL),
(1429, 9, 0, 11, NULL),
(1430, 10, 0, 11, NULL),
(1431, 11, 0, 11, NULL),
(1432, 12, 0, 11, NULL),
(1433, 13, 0, 11, NULL),
(1434, 14, 0, 11, NULL),
(1435, 15, 0, 11, NULL),
(1436, 16, 0, 11, NULL),
(1437, 17, 0, 11, NULL),
(1438, 18, 0, 11, NULL),
(1439, 19, 0, 11, NULL),
(1440, 20, 0, 11, NULL),
(1441, 21, 0, 11, NULL),
(1442, 22, 0, 11, NULL),
(1443, 23, 0, 11, NULL),
(1444, 24, 0, 11, NULL),
(1445, 25, 0, 11, NULL),
(1446, 26, 0, 11, NULL),
(1447, 27, 0, 11, NULL),
(1448, 28, 0, 11, NULL),
(1449, 29, 0, 11, NULL),
(1450, 30, 0, 11, NULL),
(1451, 31, 0, 11, NULL),
(1452, 32, 0, 11, NULL),
(1453, 33, 0, 11, NULL),
(1454, 34, 0, 11, NULL),
(1455, 35, 0, 11, NULL),
(1456, 36, 0, 11, NULL),
(1457, 37, 0, 11, NULL),
(1458, 38, 0, 11, NULL),
(1459, 39, 0, 11, NULL),
(1460, 40, 0, 11, NULL),
(1461, 41, 0, 11, NULL),
(1462, 42, 0, 11, NULL),
(1463, 43, 0, 11, NULL),
(1464, 44, 0, 11, NULL),
(1465, 45, 0, 11, NULL),
(1466, 46, 0, 11, NULL),
(1467, 47, 0, 11, NULL),
(1468, 48, 0, 11, NULL),
(1469, 49, 0, 11, NULL),
(1470, 50, 0, 11, NULL),
(1471, 51, 0, 11, NULL),
(1472, 52, 0, 11, NULL),
(1473, 53, 0, 11, NULL),
(1474, 54, 0, 11, NULL),
(1475, 55, 0, 11, NULL),
(1476, 56, 0, 11, NULL),
(1477, 57, 0, 11, NULL),
(1478, 58, 0, 11, NULL),
(1479, 59, 0, 11, NULL),
(1480, 60, 0, 11, NULL),
(1481, 61, 0, 11, NULL),
(1482, 1, 0, 11, NULL),
(1483, 2, 0, 11, NULL),
(1484, 3, 0, 11, NULL),
(1485, 4, 0, 11, NULL),
(1486, 5, 0, 11, NULL),
(1487, 6, 0, 11, NULL),
(1488, 7, 0, 11, NULL),
(1489, 8, 0, 11, NULL),
(1490, 9, 0, 11, NULL),
(1491, 10, 0, 11, NULL),
(1492, 11, 0, 11, NULL),
(1493, 12, 0, 11, NULL),
(1494, 13, 0, 11, NULL),
(1495, 14, 0, 11, NULL),
(1496, 15, 0, 11, NULL),
(1497, 16, 0, 11, NULL),
(1498, 17, 0, 11, NULL),
(1499, 18, 0, 11, NULL),
(1500, 19, 0, 11, NULL),
(1501, 20, 0, 11, NULL),
(1502, 21, 0, 11, NULL),
(1503, 22, 0, 11, NULL),
(1504, 23, 0, 11, NULL),
(1505, 24, 0, 11, NULL),
(1506, 25, 0, 11, NULL),
(1507, 26, 0, 11, NULL),
(1508, 27, 0, 11, NULL),
(1509, 28, 0, 11, NULL),
(1510, 29, 0, 11, NULL),
(1511, 30, 0, 11, NULL),
(1512, 31, 0, 11, NULL),
(1513, 32, 0, 11, NULL),
(1514, 33, 0, 11, NULL),
(1515, 34, 0, 11, NULL),
(1516, 35, 0, 11, NULL),
(1517, 36, 0, 11, NULL),
(1518, 37, 0, 11, NULL),
(1519, 38, 0, 11, NULL),
(1520, 39, 0, 11, NULL),
(1521, 40, 0, 11, NULL),
(1522, 41, 0, 11, NULL),
(1523, 42, 0, 11, NULL),
(1524, 43, 0, 11, NULL),
(1525, 44, 0, 11, NULL),
(1526, 45, 0, 11, NULL),
(1527, 46, 0, 11, NULL),
(1528, 47, 0, 11, NULL),
(1529, 48, 0, 11, NULL),
(1530, 49, 0, 11, NULL),
(1531, 50, 0, 11, NULL),
(1532, 51, 0, 11, NULL),
(1533, 52, 0, 11, NULL),
(1534, 53, 0, 11, NULL),
(1535, 54, 0, 11, NULL),
(1536, 55, 0, 11, NULL),
(1537, 56, 0, 11, NULL),
(1538, 57, 0, 11, NULL),
(1539, 58, 0, 11, NULL),
(1540, 59, 0, 11, NULL),
(1541, 60, 0, 11, NULL),
(1542, 61, 0, 11, NULL),
(1543, 1, 0, 11, NULL),
(1544, 2, 0, 11, NULL),
(1545, 3, 0, 11, NULL),
(1546, 4, 0, 11, NULL),
(1547, 5, 0, 11, NULL),
(1548, 6, 0, 11, NULL),
(1549, 7, 0, 11, NULL),
(1550, 8, 0, 11, NULL),
(1551, 9, 0, 11, NULL),
(1552, 10, 0, 11, NULL),
(1553, 11, 0, 11, NULL),
(1554, 12, 0, 11, NULL),
(1555, 13, 0, 11, NULL),
(1556, 14, 0, 11, NULL),
(1557, 15, 0, 11, NULL),
(1558, 16, 0, 11, NULL),
(1559, 17, 0, 11, NULL),
(1560, 18, 0, 11, NULL),
(1561, 19, 0, 11, NULL),
(1562, 20, 0, 11, NULL),
(1563, 21, 0, 11, NULL),
(1564, 22, 0, 11, NULL),
(1565, 23, 0, 11, NULL),
(1566, 24, 0, 11, NULL),
(1567, 25, 0, 11, NULL),
(1568, 26, 0, 11, NULL),
(1569, 27, 0, 11, NULL),
(1570, 28, 0, 11, NULL),
(1571, 29, 0, 11, NULL),
(1572, 30, 0, 11, NULL),
(1573, 31, 0, 11, NULL),
(1574, 32, 0, 11, NULL),
(1575, 33, 0, 11, NULL),
(1576, 34, 0, 11, NULL),
(1577, 35, 0, 11, NULL),
(1578, 36, 0, 11, NULL),
(1579, 37, 0, 11, NULL),
(1580, 38, 0, 11, NULL),
(1581, 39, 0, 11, NULL),
(1582, 40, 0, 11, NULL),
(1583, 41, 0, 11, NULL),
(1584, 42, 0, 11, NULL),
(1585, 43, 0, 11, NULL),
(1586, 44, 0, 11, NULL),
(1587, 45, 0, 11, NULL),
(1588, 46, 0, 11, NULL),
(1589, 47, 0, 11, NULL),
(1590, 48, 0, 11, NULL),
(1591, 49, 0, 11, NULL),
(1592, 50, 0, 11, NULL),
(1593, 51, 0, 11, NULL),
(1594, 52, 0, 11, NULL),
(1595, 53, 0, 11, NULL),
(1596, 54, 0, 11, NULL),
(1597, 55, 0, 11, NULL),
(1598, 56, 0, 11, NULL),
(1599, 57, 0, 11, NULL),
(1600, 58, 0, 11, NULL),
(1601, 59, 0, 11, NULL),
(1602, 60, 0, 11, NULL),
(1603, 61, 0, 11, NULL),
(1604, 1, 0, 11, NULL),
(1605, 2, 0, 11, NULL),
(1606, 3, 0, 11, NULL),
(1607, 4, 0, 11, NULL),
(1608, 5, 0, 11, NULL),
(1609, 6, 0, 11, NULL),
(1610, 7, 0, 11, NULL),
(1611, 8, 0, 11, NULL),
(1612, 9, 0, 11, NULL),
(1613, 10, 0, 11, NULL),
(1614, 11, 0, 11, NULL),
(1615, 12, 0, 11, NULL),
(1616, 13, 0, 11, NULL),
(1617, 14, 0, 11, NULL),
(1618, 15, 0, 11, NULL),
(1619, 16, 0, 11, NULL),
(1620, 17, 0, 11, NULL),
(1621, 18, 0, 11, NULL),
(1622, 19, 0, 11, NULL),
(1623, 20, 0, 11, NULL),
(1624, 21, 0, 11, NULL),
(1625, 22, 0, 11, NULL),
(1626, 23, 0, 11, NULL),
(1627, 24, 0, 11, NULL),
(1628, 25, 0, 11, NULL),
(1629, 26, 0, 11, NULL),
(1630, 27, 0, 11, NULL),
(1631, 28, 0, 11, NULL),
(1632, 29, 0, 11, NULL),
(1633, 30, 0, 11, NULL),
(1634, 31, 0, 11, NULL),
(1635, 32, 0, 11, NULL),
(1636, 33, 0, 11, NULL),
(1637, 34, 0, 11, NULL),
(1638, 35, 0, 11, NULL),
(1639, 36, 0, 11, NULL),
(1640, 37, 0, 11, NULL),
(1641, 38, 0, 11, NULL),
(1642, 39, 0, 11, NULL),
(1643, 40, 0, 11, NULL),
(1644, 41, 0, 11, NULL),
(1645, 42, 0, 11, NULL),
(1646, 43, 0, 11, NULL),
(1647, 44, 0, 11, NULL),
(1648, 45, 0, 11, NULL),
(1649, 46, 0, 11, NULL),
(1650, 47, 0, 11, NULL),
(1651, 48, 0, 11, NULL),
(1652, 49, 0, 11, NULL),
(1653, 50, 0, 11, NULL),
(1654, 51, 0, 11, NULL),
(1655, 52, 0, 11, NULL),
(1656, 53, 0, 11, NULL),
(1657, 54, 0, 11, NULL),
(1658, 55, 0, 11, NULL),
(1659, 56, 0, 11, NULL),
(1660, 57, 0, 11, NULL),
(1661, 58, 0, 11, NULL),
(1662, 59, 0, 11, NULL),
(1663, 60, 0, 11, NULL),
(1664, 61, 0, 11, NULL),
(1665, 1, 0, 11, NULL),
(1666, 2, 0, 11, NULL),
(1667, 3, 0, 11, NULL),
(1668, 4, 0, 11, NULL),
(1669, 5, 0, 11, NULL),
(1670, 6, 0, 11, NULL),
(1671, 7, 0, 11, NULL),
(1672, 8, 0, 11, NULL),
(1673, 9, 0, 11, NULL),
(1674, 10, 0, 11, NULL),
(1675, 11, 0, 11, NULL),
(1676, 12, 0, 11, NULL),
(1677, 13, 0, 11, NULL),
(1678, 14, 0, 11, NULL),
(1679, 15, 0, 11, NULL),
(1680, 16, 0, 11, NULL),
(1681, 17, 0, 11, NULL),
(1682, 18, 0, 11, NULL),
(1683, 19, 0, 11, NULL),
(1684, 20, 0, 11, NULL),
(1685, 21, 0, 11, NULL),
(1686, 22, 0, 11, NULL),
(1687, 23, 0, 11, NULL),
(1688, 24, 0, 11, NULL),
(1689, 25, 0, 11, NULL),
(1690, 26, 0, 11, NULL),
(1691, 27, 0, 11, NULL),
(1692, 28, 0, 11, NULL),
(1693, 29, 0, 11, NULL),
(1694, 30, 0, 11, NULL),
(1695, 31, 0, 11, NULL),
(1696, 32, 0, 11, NULL),
(1697, 33, 0, 11, NULL),
(1698, 34, 0, 11, NULL),
(1699, 35, 0, 11, NULL),
(1700, 36, 0, 11, NULL),
(1701, 37, 0, 11, NULL),
(1702, 38, 0, 11, NULL),
(1703, 39, 0, 11, NULL),
(1704, 40, 0, 11, NULL),
(1705, 41, 0, 11, NULL),
(1706, 42, 0, 11, NULL),
(1707, 43, 0, 11, NULL),
(1708, 44, 0, 11, NULL),
(1709, 45, 0, 11, NULL),
(1710, 46, 0, 11, NULL),
(1711, 47, 0, 11, NULL),
(1712, 48, 0, 11, NULL),
(1713, 49, 0, 11, NULL),
(1714, 50, 0, 11, NULL),
(1715, 51, 0, 11, NULL),
(1716, 52, 0, 11, NULL),
(1717, 53, 0, 11, NULL),
(1718, 54, 0, 11, NULL),
(1719, 55, 0, 11, NULL),
(1720, 56, 0, 11, NULL),
(1721, 57, 0, 11, NULL),
(1722, 58, 0, 11, NULL),
(1723, 59, 0, 11, NULL),
(1724, 60, 0, 11, NULL),
(1725, 61, 0, 11, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `28_2024_deroulement_innovateur`
--

DROP TABLE IF EXISTS `28_2024_deroulement_innovateur`;
CREATE TABLE IF NOT EXISTS `28_2024_deroulement_innovateur` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_attribution_deroulement` int NOT NULL,
  `status` tinyint(1) NOT NULL,
  `id_projet` int NOT NULL,
  `etab_id` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=315 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `28_2024_deroulement_innovateur`
--

INSERT INTO `28_2024_deroulement_innovateur` (`id`, `id_attribution_deroulement`, `status`, `id_projet`, `etab_id`) VALUES
(1, 1, 0, 7, NULL),
(2, 2, 0, 7, NULL),
(3, 3, 0, 7, NULL),
(4, 4, 0, 7, NULL),
(5, 5, 0, 7, NULL),
(6, 6, 0, 7, NULL),
(7, 7, 0, 7, NULL),
(8, 8, 0, 7, NULL),
(9, 9, 0, 7, NULL),
(10, 10, 0, 7, NULL),
(11, 11, 0, 7, NULL),
(12, 12, 0, 7, NULL),
(13, 13, 0, 7, NULL),
(14, 14, 0, 7, NULL),
(15, 15, 0, 7, NULL),
(16, 16, 0, 7, NULL),
(21, 21, 0, 7, NULL),
(22, 22, 0, 7, NULL),
(23, 23, 0, 7, NULL),
(24, 24, 0, 7, NULL),
(25, 25, 0, 7, NULL),
(26, 26, 0, 7, NULL),
(27, 27, 0, 7, NULL),
(28, 28, 0, 7, NULL),
(29, 29, 0, 7, NULL),
(30, 30, 0, 7, NULL),
(31, 31, 0, 7, NULL),
(32, 32, 0, 7, NULL),
(33, 33, 0, 7, NULL),
(34, 34, 0, 7, NULL),
(35, 35, 0, 7, NULL),
(36, 36, 0, 7, NULL),
(37, 37, 0, 7, NULL),
(38, 38, 0, 7, NULL),
(39, 39, 0, 7, NULL),
(40, 40, 0, 7, NULL),
(41, 41, 0, 7, NULL),
(42, 42, 0, 7, NULL),
(43, 43, 0, 7, NULL),
(44, 44, 0, 7, NULL),
(45, 45, 0, 7, NULL),
(46, 46, 0, 7, NULL),
(47, 47, 0, 7, NULL),
(48, 48, 0, 7, NULL),
(49, 49, 0, 7, NULL),
(50, 50, 0, 7, NULL),
(51, 51, 0, 7, NULL),
(52, 52, 0, 7, NULL),
(53, 53, 0, 7, NULL),
(54, 54, 0, 7, NULL),
(55, 55, 0, 7, NULL),
(56, 56, 0, 7, NULL),
(57, 57, 0, 7, NULL),
(58, 58, 0, 7, NULL),
(59, 59, 0, 7, NULL),
(60, 60, 0, 7, NULL),
(61, 61, 0, 7, NULL),
(62, 62, 0, 7, NULL),
(63, 63, 0, 7, NULL),
(64, 64, 0, 7, NULL),
(65, 65, 0, 7, NULL),
(66, 66, 0, 7, NULL),
(67, 67, 0, 7, NULL),
(68, 68, 0, 7, NULL),
(69, 69, 0, 7, NULL),
(70, 70, 0, 7, NULL),
(71, 71, 0, 7, NULL),
(72, 72, 0, 7, NULL),
(73, 1, 1, 7, NULL),
(74, 2, 1, 7, NULL),
(75, 3, 1, 7, NULL),
(76, 4, 1, 7, NULL),
(77, 5, 1, 7, NULL),
(78, 6, 1, 7, NULL),
(79, 7, 1, 7, NULL),
(80, 8, 1, 7, NULL),
(81, 9, 1, 7, NULL),
(82, 10, 1, 7, NULL),
(83, 11, 1, 7, NULL),
(84, 12, 1, 7, NULL),
(85, 13, 1, 7, NULL),
(86, 14, 0, 7, NULL),
(87, 15, 0, 7, NULL),
(88, 16, 0, 7, NULL),
(89, 17, 1, 7, NULL),
(90, 18, 1, 7, NULL),
(91, 19, 1, 7, NULL),
(92, 20, 1, 7, NULL),
(93, 1, 1, 7, NULL),
(94, 2, 1, 7, NULL),
(95, 3, 1, 7, NULL),
(96, 1, 1, 7, NULL),
(97, 2, 1, 7, NULL),
(98, 3, 1, 7, NULL),
(106, 8, 0, 12, NULL),
(107, 9, 0, 12, NULL),
(108, 10, 0, 12, NULL),
(109, 11, 0, 12, NULL),
(110, 12, 0, 12, NULL),
(111, 13, 0, 12, NULL),
(112, 14, 0, 12, NULL),
(113, 15, 0, 12, NULL),
(114, 16, 0, 12, NULL),
(115, 17, 0, 12, NULL),
(116, 18, 0, 12, NULL),
(117, 19, 0, 12, NULL),
(118, 20, 0, 12, NULL),
(119, 21, 0, 12, NULL),
(120, 22, 0, 12, NULL),
(121, 23, 0, 12, NULL),
(122, 24, 0, 12, NULL),
(123, 25, 0, 12, NULL),
(124, 26, 0, 12, NULL),
(125, 27, 0, 12, NULL),
(126, 28, 0, 12, NULL),
(127, 29, 0, 12, NULL),
(128, 30, 0, 12, NULL),
(129, 31, 0, 12, NULL),
(130, 32, 0, 12, NULL),
(131, 33, 0, 12, NULL),
(132, 34, 0, 12, NULL),
(133, 35, 0, 12, NULL),
(134, 36, 0, 12, NULL),
(135, 37, 0, 12, NULL),
(136, 38, 0, 12, NULL),
(137, 39, 0, 12, NULL),
(138, 40, 0, 12, NULL),
(139, 41, 0, 12, NULL),
(140, 42, 0, 12, NULL),
(141, 43, 0, 12, NULL),
(142, 44, 0, 12, NULL),
(143, 45, 0, 12, NULL),
(144, 46, 0, 12, NULL),
(145, 47, 0, 12, NULL),
(146, 48, 0, 12, NULL),
(147, 49, 0, 12, NULL),
(148, 50, 0, 12, NULL),
(149, 51, 0, 12, NULL),
(150, 52, 0, 12, NULL),
(151, 53, 0, 12, NULL),
(152, 54, 0, 12, NULL),
(153, 55, 0, 12, NULL),
(154, 56, 0, 12, NULL),
(155, 57, 0, 12, NULL),
(156, 58, 0, 12, NULL),
(157, 59, 0, 12, NULL),
(158, 60, 0, 12, NULL),
(159, 61, 0, 12, NULL),
(160, 62, 0, 12, NULL),
(161, 63, 0, 12, NULL),
(162, 64, 0, 12, NULL),
(163, 65, 0, 12, NULL),
(164, 66, 0, 12, NULL),
(165, 67, 0, 12, NULL),
(166, 68, 0, 12, NULL),
(167, 69, 0, 12, NULL),
(168, 70, 0, 12, NULL),
(169, 71, 0, 12, NULL),
(170, 72, 0, 12, NULL),
(178, 8, 0, 13, NULL),
(179, 9, 0, 13, NULL),
(180, 10, 0, 13, NULL),
(181, 11, 0, 13, NULL),
(182, 12, 0, 13, NULL),
(183, 13, 0, 13, NULL),
(184, 14, 0, 13, NULL),
(185, 15, 0, 13, NULL),
(186, 16, 0, 13, NULL),
(187, 17, 0, 13, NULL),
(188, 18, 0, 13, NULL),
(189, 19, 0, 13, NULL),
(190, 20, 0, 13, NULL),
(191, 21, 0, 13, NULL),
(192, 22, 0, 13, NULL),
(193, 23, 0, 13, NULL),
(194, 24, 0, 13, NULL),
(195, 25, 0, 13, NULL),
(196, 26, 0, 13, NULL),
(197, 27, 0, 13, NULL),
(198, 28, 0, 13, NULL),
(199, 29, 0, 13, NULL),
(200, 30, 0, 13, NULL),
(201, 31, 0, 13, NULL),
(202, 32, 0, 13, NULL),
(203, 33, 0, 13, NULL),
(204, 34, 0, 13, NULL),
(205, 35, 0, 13, NULL),
(206, 36, 0, 13, NULL),
(207, 37, 0, 13, NULL),
(208, 38, 0, 13, NULL),
(209, 39, 0, 13, NULL),
(210, 40, 0, 13, NULL),
(211, 41, 0, 13, NULL),
(212, 42, 0, 13, NULL),
(213, 43, 0, 13, NULL),
(214, 44, 0, 13, NULL),
(215, 45, 0, 13, NULL),
(216, 46, 0, 13, NULL),
(217, 47, 0, 13, NULL),
(218, 48, 0, 13, NULL),
(219, 49, 0, 13, NULL),
(220, 50, 0, 13, NULL),
(221, 51, 0, 13, NULL),
(222, 52, 0, 13, NULL),
(223, 53, 0, 13, NULL),
(224, 54, 0, 13, NULL),
(225, 55, 0, 13, NULL),
(226, 56, 0, 13, NULL),
(227, 57, 0, 13, NULL),
(228, 58, 0, 13, NULL),
(229, 59, 0, 13, NULL),
(230, 60, 0, 13, NULL),
(231, 61, 0, 13, NULL),
(232, 62, 0, 13, NULL),
(233, 63, 0, 13, NULL),
(234, 64, 0, 13, NULL),
(235, 65, 0, 13, NULL),
(236, 66, 0, 13, NULL),
(237, 67, 0, 13, NULL),
(238, 68, 0, 13, NULL),
(239, 69, 0, 13, NULL),
(240, 70, 0, 13, NULL),
(241, 71, 0, 13, NULL),
(242, 72, 0, 13, NULL),
(243, 1, 0, 14, NULL),
(244, 2, 0, 14, NULL),
(245, 3, 0, 14, NULL),
(246, 4, 0, 14, NULL),
(247, 5, 0, 14, NULL),
(248, 6, 0, 14, NULL),
(249, 7, 0, 14, NULL),
(250, 8, 0, 14, NULL),
(251, 9, 0, 14, NULL),
(252, 10, 0, 14, NULL),
(253, 11, 0, 14, NULL),
(254, 12, 0, 14, NULL),
(255, 13, 0, 14, NULL),
(256, 14, 0, 14, NULL),
(257, 15, 0, 14, NULL),
(258, 16, 0, 14, NULL),
(259, 17, 0, 14, NULL),
(260, 18, 0, 14, NULL),
(261, 19, 0, 14, NULL),
(262, 20, 0, 14, NULL),
(263, 21, 0, 14, NULL),
(264, 22, 0, 14, NULL),
(265, 23, 0, 14, NULL),
(266, 24, 0, 14, NULL),
(267, 25, 0, 14, NULL),
(268, 26, 0, 14, NULL),
(269, 27, 0, 14, NULL),
(270, 28, 0, 14, NULL),
(271, 29, 0, 14, NULL),
(272, 30, 0, 14, NULL),
(273, 31, 0, 14, NULL),
(274, 32, 0, 14, NULL),
(275, 33, 0, 14, NULL),
(276, 34, 0, 14, NULL),
(277, 35, 0, 14, NULL),
(278, 36, 0, 14, NULL),
(279, 37, 0, 14, NULL),
(280, 38, 0, 14, NULL),
(281, 39, 0, 14, NULL),
(282, 40, 0, 14, NULL),
(283, 41, 0, 14, NULL),
(284, 42, 0, 14, NULL),
(285, 43, 0, 14, NULL),
(286, 44, 0, 14, NULL),
(287, 45, 0, 14, NULL),
(288, 46, 0, 14, NULL),
(289, 47, 0, 14, NULL),
(290, 48, 0, 14, NULL),
(291, 49, 0, 14, NULL),
(292, 50, 0, 14, NULL),
(293, 51, 0, 14, NULL),
(294, 52, 0, 14, NULL),
(295, 53, 0, 14, NULL),
(296, 54, 0, 14, NULL),
(297, 55, 0, 14, NULL),
(298, 56, 0, 14, NULL),
(299, 57, 0, 14, NULL),
(300, 58, 0, 14, NULL),
(301, 59, 0, 14, NULL),
(302, 60, 0, 14, NULL),
(303, 61, 0, 14, NULL),
(304, 62, 0, 14, NULL),
(305, 63, 0, 14, NULL),
(306, 64, 0, 14, NULL),
(307, 65, 0, 14, NULL),
(308, 66, 0, 14, NULL),
(309, 67, 0, 14, NULL),
(310, 68, 0, 14, NULL),
(311, 69, 0, 14, NULL),
(312, 70, 0, 14, NULL),
(313, 71, 0, 14, NULL),
(314, 72, 0, 14, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `28_2024_deroulement_promoteur`
--

DROP TABLE IF EXISTS `28_2024_deroulement_promoteur`;
CREATE TABLE IF NOT EXISTS `28_2024_deroulement_promoteur` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_attribution_deroulement` int NOT NULL,
  `id_projet` int NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `etab_id` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=194 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `28_2024_deroulement_promoteur`
--

INSERT INTO `28_2024_deroulement_promoteur` (`id`, `id_attribution_deroulement`, `id_projet`, `status`, `etab_id`) VALUES
(57, 9, 7, 0, NULL),
(58, 10, 7, 0, NULL),
(59, 11, 7, 0, NULL),
(60, 12, 7, 0, NULL),
(61, 13, 7, 0, NULL),
(62, 14, 7, 0, NULL),
(63, 15, 7, 0, NULL),
(64, 16, 7, 0, NULL),
(65, 17, 7, 0, NULL),
(66, 18, 7, 0, NULL),
(67, 19, 7, 0, NULL),
(68, 20, 7, 0, NULL),
(69, 21, 7, 0, NULL),
(70, 22, 7, 0, NULL),
(71, 23, 7, 0, NULL),
(72, 24, 7, 0, NULL),
(73, 1, 7, 1, NULL),
(74, 2, 7, 1, NULL),
(75, 3, 7, 1, NULL),
(76, 1, 12, 1, NULL),
(77, 2, 12, 1, NULL),
(78, 3, 12, 1, NULL),
(79, 4, 12, 1, NULL),
(80, 5, 12, 1, NULL),
(81, 6, 12, 1, NULL),
(82, 7, 12, 1, NULL),
(83, 1, 12, 0, NULL),
(84, 2, 12, 0, NULL),
(85, 3, 12, 0, NULL),
(86, 4, 12, 0, NULL),
(87, 5, 12, 0, NULL),
(88, 6, 12, 0, NULL),
(89, 7, 12, 0, NULL),
(90, 8, 12, 0, NULL),
(91, 9, 12, 0, NULL),
(92, 10, 12, 0, NULL),
(93, 11, 12, 0, NULL),
(94, 12, 12, 0, NULL),
(95, 13, 12, 0, NULL),
(96, 14, 12, 0, NULL),
(97, 15, 12, 0, NULL),
(98, 16, 12, 0, NULL),
(99, 17, 12, 0, NULL),
(100, 18, 12, 0, NULL),
(101, 19, 12, 0, NULL),
(102, 20, 12, 0, NULL),
(103, 21, 12, 0, NULL),
(104, 22, 12, 0, NULL),
(105, 23, 12, 0, NULL),
(106, 24, 12, 0, NULL),
(138, 4, 7, 1, NULL),
(139, 5, 7, 1, NULL),
(143, 6, 7, 1, NULL),
(144, 7, 7, 1, NULL),
(145, 8, 7, 1, NULL),
(146, 1, 13, 0, NULL),
(147, 2, 13, 0, NULL),
(148, 3, 13, 0, NULL),
(149, 4, 13, 0, NULL),
(150, 5, 13, 0, NULL),
(151, 6, 13, 0, NULL),
(152, 7, 13, 0, NULL),
(153, 8, 13, 0, NULL),
(154, 9, 13, 0, NULL),
(155, 10, 13, 0, NULL),
(156, 11, 13, 0, NULL),
(157, 12, 13, 0, NULL),
(158, 13, 13, 0, NULL),
(159, 14, 13, 0, NULL),
(160, 15, 13, 0, NULL),
(161, 16, 13, 0, NULL),
(162, 17, 13, 0, NULL),
(163, 18, 13, 0, NULL),
(164, 19, 13, 0, NULL),
(165, 20, 13, 0, NULL),
(166, 21, 13, 0, NULL),
(167, 22, 13, 0, NULL),
(168, 23, 13, 0, NULL),
(169, 24, 13, 0, NULL),
(170, 1, 14, 0, NULL),
(171, 2, 14, 0, NULL),
(172, 3, 14, 0, NULL),
(173, 4, 14, 0, NULL),
(174, 5, 14, 0, NULL),
(175, 6, 14, 0, NULL),
(176, 7, 14, 0, NULL),
(177, 8, 14, 0, NULL),
(178, 9, 14, 0, NULL),
(179, 10, 14, 0, NULL),
(180, 11, 14, 0, NULL),
(181, 12, 14, 0, NULL),
(182, 13, 14, 0, NULL),
(183, 14, 14, 0, NULL),
(184, 15, 14, 0, NULL),
(185, 16, 14, 0, NULL),
(186, 17, 14, 0, NULL),
(187, 18, 14, 0, NULL),
(188, 19, 14, 0, NULL),
(189, 20, 14, 0, NULL),
(190, 21, 14, 0, NULL),
(191, 22, 14, 0, NULL),
(192, 23, 14, 0, NULL),
(193, 24, 14, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `28_2024_domaine`
--

DROP TABLE IF EXISTS `28_2024_domaine`;
CREATE TABLE IF NOT EXISTS `28_2024_domaine` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `etab_id` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `28_2024_domaine`
--

INSERT INTO `28_2024_domaine` (`id`, `nom`, `etab_id`) VALUES
(1, 'Agriculture', NULL),
(2, 'Agroalimentaire', NULL),
(3, 'Artisanat', NULL),
(4, 'Biotechnologie', NULL),
(5, 'Culture', NULL),
(6, 'Digital (TIC)', NULL),
(7, 'Education', NULL),
(8, 'Energie', NULL),
(9, 'Média', NULL),
(10, 'Nouvelles Technologies', NULL),
(11, 'Santé', NULL),
(12, 'Société', NULL),
(13, 'Tourisme', NULL),
(14, 'Transport', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `28_2024_echanges`
--

DROP TABLE IF EXISTS `28_2024_echanges`;
CREATE TABLE IF NOT EXISTS `28_2024_echanges` (
  `id` int NOT NULL AUTO_INCREMENT,
  `etudiant_id` int DEFAULT NULL,
  `enseignant_id` int DEFAULT NULL,
  `seance_id` int NOT NULL,
  `comment` text NOT NULL,
  `rapport` varchar(255) DEFAULT NULL,
  `created_at` date NOT NULL,
  `sender` int NOT NULL,
  `etab_id` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `28_2024_echanges`
--

INSERT INTO `28_2024_echanges` (`id`, `etudiant_id`, `enseignant_id`, `seance_id`, `comment`, `rapport`, `created_at`, `sender`, `etab_id`) VALUES
(9, NULL, 2, 1, 'Hello guys i am pleased to hear from you in our first  seance               ', '', '2024-10-30', 4, NULL),
(10, 1, NULL, 1, 'hello here is my first business model                ', 'fiche_accompagnementaal_rom_seance_2.pdf', '2024-10-30', 1, NULL),
(11, 4, NULL, 1, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '', '2024-10-30', 6, NULL),
(12, 1, NULL, 1, '                hghfgvhg', '', '2024-10-31', 1, NULL),
(13, 9, NULL, 39, '  hello for our first sessioj              ', '', '2024-11-07', 14, NULL),
(14, NULL, 5, 75, '        Bonjour C\'est La SEnace Numero 1 ', 'fiche_accompagnementetudiant_detest_seance_1 (4).pdf', '2024-11-08', 13, NULL),
(15, 13, NULL, 75, 'Bonjour merci                ', '', '2024-11-08', 18, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `28_2024_echanges_innovateur`
--

DROP TABLE IF EXISTS `28_2024_echanges_innovateur`;
CREATE TABLE IF NOT EXISTS `28_2024_echanges_innovateur` (
  `id` int NOT NULL AUTO_INCREMENT,
  `etudiant_id` int DEFAULT NULL,
  `enseignant_id` int DEFAULT NULL,
  `seance_id` int NOT NULL,
  `comment` text NOT NULL,
  `rapport` varchar(255) DEFAULT NULL,
  `created_at` date NOT NULL,
  `sender` int NOT NULL,
  `etab_id` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `28_2024_echanges_innovateur`
--

INSERT INTO `28_2024_echanges_innovateur` (`id`, `etudiant_id`, `enseignant_id`, `seance_id`, `comment`, `rapport`, `created_at`, `sender`, `etab_id`) VALUES
(1, NULL, 2, 1, ' Bonjour C est la seance 1 dans le phase 2 vous pouvez me dire si vous avez des questions               ', '', '2024-11-04', 4, NULL),
(2, 1, NULL, 1, 'Merci :) :)                ', '', '2024-11-04', 1, NULL),
(3, 1, NULL, 2, 'hi we have a new seance                ', 'fiche_suivie_aal_rom (8).pdf', '2024-11-05', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `28_2024_echanges_promoteur`
--

DROP TABLE IF EXISTS `28_2024_echanges_promoteur`;
CREATE TABLE IF NOT EXISTS `28_2024_echanges_promoteur` (
  `id` int NOT NULL AUTO_INCREMENT,
  `etudiant_id` int DEFAULT NULL,
  `enseignant_id` int DEFAULT NULL,
  `seance_id` int NOT NULL,
  `comment` text NOT NULL,
  `rapport` varchar(255) DEFAULT NULL,
  `created_at` date NOT NULL,
  `sender` int NOT NULL,
  `etab_id` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `28_2024_echanges_promoteur`
--

INSERT INTO `28_2024_echanges_promoteur` (`id`, `etudiant_id`, `enseignant_id`, `seance_id`, `comment`, `rapport`, `created_at`, `sender`, `etab_id`) VALUES
(1, 1, NULL, 17, ' hello welcome to the first seance of the 3rd phase promoteur               ', '', '2024-11-05', 1, NULL),
(2, NULL, 2, 17, '   welcome i am ala             ', '', '2024-11-05', 4, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `28_2024_enseignant`
--

DROP TABLE IF EXISTS `28_2024_enseignant`;
CREATE TABLE IF NOT EXISTS `28_2024_enseignant` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `prenom` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `affiliation` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `role` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `id_etab` int NOT NULL,
  `etab_id` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `28_2024_enseignant`
--

INSERT INTO `28_2024_enseignant` (`id`, `nom`, `prenom`, `email`, `affiliation`, `role`, `id_etab`, `etab_id`) VALUES
(1, 'Nidhal', 'Nidhal', 'nidhalabbassi9@gmail.com', 'PEESo', '', 8, NULL),
(2, 'Ala', 'Ala', 'ala.rom0311@gmail.com', 'PEESo', '', 7, NULL),
(5, 'refrent', 'detest', 'ala.romdhani@esprit.tn', 'peeso-22', '', 11, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `28_2024_etablissements`
--

DROP TABLE IF EXISTS `28_2024_etablissements`;
CREATE TABLE IF NOT EXISTS `28_2024_etablissements` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `logo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `28_2024_etablissements`
--

INSERT INTO `28_2024_etablissements` (`id`, `nom`, `active`, `logo`) VALUES
(1, 'Faculté de Droit et des Sciences Economiques et Politiques de Sousse', 1, 'Capture_décran_2024-11-26_141000.png'),
(2, 'Faculté de Médecine de Sousse', 1, 'Capture_décran_2024-11-26_143024.png'),
(3, 'Faculté des Lettres et des Sciences Humaines de Sousse', 1, 'Capture_décran_2024-11-26_142842.png'),
(5, 'Institut Supérieur de Finances et de Fiscalité de Sousse', 1, 'Capture_décran_2024-11-26_144441.png'),
(6, 'Institut Supérieur du Transport et de la Logistique de Sousse', 1, 'Capture_décran_2024-11-26_144142.png'),
(7, 'Institut Supérieur des Beaux Arts de Sousse', 1, 'Capture_décran_2024-11-26_143905.png'),
(8, 'Ecole Supérieure des Sciences et Techniques de la Santé de Sousse', 1, 'Capture_décran_2024-11-26_143631.png'),
(9, 'Institut Supérieur de Gestion de Sousse', 1, 'Capture_décran_2024-11-26_143736.png'),
(10, 'Institut des Hautes Etudes Commerciales de Sousse', 1, 'Capture_décran_2024-11-26_144109.png'),
(11, 'Institut Supérieur de Musique de Sousse', 1, 'Capture_décran_2024-11-26_144031.png'),
(12, 'Institut Supérieur des Sciences Appliquées et de la Technologie de Sousse', 1, 'Capture_décran_2024-11-26_144257.png'),
(13, 'Ecole Nationale des Ingénieurs de Sousse', 1, 'Capture_décran_2024-11-26_143442.png'),
(14, 'Institut Supérieur d Agronomie de Chott Meriem', 1, 'Capture_décran_2024-11-26_144756.png'),
(15, 'Institut Supérieur des Sciences infirmières de Sousse', 1, 'Capture_décran_2024-11-26_144344.png'),
(16, 'Ecole Supérieure des Sciences et des technologies de Hammam Sousse', 1, 'Capture_décran_2024-11-26_143538.png'),
(20, 'test2', 0, 'teacher1.png'),
(21, 'Faculté des Sciences Economiques et de Gestion de  Sousse', 1, 'Capture_décran_2024-11-26_143150.png'),
(22, 'Institut Supérieur d Informatique et des Technologies de Communication de Sousse', 1, 'Capture_décran_2024-11-26_144611.png');

-- --------------------------------------------------------

--
-- Table structure for table `28_2024_etudiants`
--

DROP TABLE IF EXISTS `28_2024_etudiants`;
CREATE TABLE IF NOT EXISTS `28_2024_etudiants` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `etablissement_id` int NOT NULL,
  `cin` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `ville` varchar(255) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `code_postal` varchar(255) NOT NULL,
  `niveau` varchar(255) NOT NULL DEFAULT 'master1',
  `etab_id` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `28_2024_etudiants`
--

INSERT INTO `28_2024_etudiants` (`id`, `nom`, `prenom`, `etablissement_id`, `cin`, `email`, `phone`, `ville`, `adresse`, `code_postal`, `niveau`, `etab_id`) VALUES
(1, 'Ala', 'Romdhani', 4, '11955435', 'ala@gmail.com', '7894564', 'kairouan', 'adresse', '3100', 'master1', NULL),
(2, 'ali', 'massoudi', 13, '22446688', 'ala.romhani@esprit.tn', '29208660', 'Tunis', 'adresse', '3100', 'master1', NULL),
(4, '7ama', '7ama', 7, '64220128', '7ama@gmail.com', '77448855', 'aucun', 'aucun', '', 'Master1', NULL),
(5, 'membre1', 'test', 9, '99186482', 'ala.romdhani@esprit.tn', '55733554', 'aucun', 'aucun', '', 'Master1', NULL),
(6, 'membre2', 'test', 5, '76095142', 'alaromdh0311@gmail.com', '29208660', 'aucun', 'aucun', '', '3ème année', NULL),
(7, 'ala ', 'test', 2, '18609872', 'benromdhane.medali2013@gmail.com', '22334466', 'aucun', 'aucun', '', 'Doctorat', NULL),
(8, 'Mohammed', 'Mohammed', 14, '11111111', '1215', '20202020', 'Chott Mériem', 'adresse', '1215', 'master1', NULL),
(9, 'etudiant', 'detest', 11, '11955440', 'alaromdhani0311@gmail.co', '25202025', 'ville', 'adresse', '3100', 'master1', NULL),
(10, 'membre1', 'membre1', 10, '51115305', 'alaromdhani0311@gmail.co', '77440011', 'aucun', 'aucun', '', 'Master1', NULL),
(11, 'romdhani', 'membre', 13, '75109136', 'alaromdhani0311@gmail.co', '22955468', 'aucun', 'aucun', '', 'Doctorat', NULL),
(12, 'qssq', 'Romdhanisqsqs', 10, '11955470', 'ala.r0311@gmail.com', '29208660', 'Tunis', 'adresse', '3100', 'master1', NULL),
(13, 'ala', 'romdhani', 11, '11955480', 'ala.rom0311@gmail.com', '55733554', 'Kairouan', 'adresse', '3100', 'master1', NULL),
(14, 'ala ', 'membre', 3, '93744825', 'alaromdhani0311@gmail.tn', '29208660', 'aucun', 'aucun', '', 'Doctorat', NULL),
(15, 'Abada', 'Balkis', 1, '14329482', 'Balkisabada@gmail.com', '55722905', 'ariana', 'adresse', '2094', 'master1', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `28_2024_etudiants_activities`
--

DROP TABLE IF EXISTS `28_2024_etudiants_activities`;
CREATE TABLE IF NOT EXISTS `28_2024_etudiants_activities` (
  `id` int NOT NULL AUTO_INCREMENT,
  `etudiant_id` int NOT NULL,
  `activity_id` int NOT NULL,
  `document` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `created_at` date NOT NULL,
  `etab_id` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `28_2024_etudiants_activities`
--

INSERT INTO `28_2024_etudiants_activities` (`id`, `etudiant_id`, `activity_id`, `document`, `created_at`, `etab_id`) VALUES
(2, 16, 2, 'candidature_C1_2024_032507.pdf', '2024-11-21', NULL),
(3, 16, 5, 'devoir.pdf', '2024-11-22', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `28_2024_etudiants_projetcs`
--

DROP TABLE IF EXISTS `28_2024_etudiants_projetcs`;
CREATE TABLE IF NOT EXISTS `28_2024_etudiants_projetcs` (
  `id` int NOT NULL AUTO_INCREMENT,
  `etudiant_id` int NOT NULL,
  `project_id` int NOT NULL,
  `cv` varchar(255) NOT NULL,
  `old_promotion` varchar(255) DEFAULT NULL,
  `porteur_project` tinyint(1) NOT NULL,
  `old_niveau` varchar(255) NOT NULL,
  `current_niveau` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'en_attente',
  `bilan_initiateur_ready` tinyint(1) NOT NULL DEFAULT '0',
  `bilan_innovateur_ready` tinyint(1) NOT NULL DEFAULT '0',
  `bilan_promoteur_ready` tinyint(1) NOT NULL DEFAULT '0',
  `etab_id` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `28_2024_etudiants_projetcs`
--

INSERT INTO `28_2024_etudiants_projetcs` (`id`, `etudiant_id`, `project_id`, `cv`, `old_promotion`, `porteur_project`, `old_niveau`, `current_niveau`, `bilan_initiateur_ready`, `bilan_innovateur_ready`, `bilan_promoteur_ready`, `etab_id`) VALUES
(1, 4, 7, 'rapport-ens.pdf', '1ére promotion', 0, 'Innovateur', 'en_attente', 0, 0, 0, NULL),
(2, 1, 7, 'cv-ala.pdf', NULL, 1, '', 'initiateur', 1, 1, 1, NULL),
(3, 5, 8, 'rapport-ala (1).pdf', '1ére promotion', 0, 'Initiateur', 'en_attente', 0, 0, 0, NULL),
(4, 6, 8, 'note_ped (1).pdf', '2éme Promotion', 0, 'Innovateur', 'en_attente', 0, 0, 0, NULL),
(5, 1, 8, 'cv-ala.pdf', '1ére promotion', 1, 'Promoteur', 'en_attente', 0, 0, 0, NULL),
(6, 7, 9, '', NULL, 0, '', 'en_attente', 0, 0, 0, NULL),
(7, 1, 9, 'CCAP - Conception développement et maintenance du site de la Philharmonie de Paris.pdf', NULL, 1, '', 'non', 0, 0, 0, NULL),
(8, 8, 11, 'attestation_de_revenu.pdf', '1ére promotion', 1, 'Initiateur', 'en_attente', 0, 0, 0, NULL),
(9, 10, 12, 'cv_membre1.pdf', '1ére promotion', 0, 'Initiateur', 'en_attente', 0, 0, 0, NULL),
(10, 9, 12, 'cv_etudiant_de_test.pdf', NULL, 1, '', 'en_attente', 1, 1, 1, NULL),
(11, 11, 13, 'fiche_suivie_aal_rom (1) (1).pdf', '1ére promotion', 0, 'Initiateur', 'en_attente', 0, 0, 0, NULL),
(12, 9, 13, 'fiche_suivie_aal_rom (1) (1).pdf', '1ére promotion', 1, 'Initiateur', 'en_attente', 1, 0, 0, NULL),
(13, 14, 14, 'fiche_suivie_etudiant_detest (2) (1).pdf', '1ére promotion', 0, 'Initiateur', 'en_attente', 0, 0, 0, NULL),
(14, 13, 14, 'cv.pdf', '1ére promotion', 1, 'Initiateur', 'en_attente', 1, 0, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `28_2024_evenement`
--

DROP TABLE IF EXISTS `28_2024_evenement`;
CREATE TABLE IF NOT EXISTS `28_2024_evenement` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `date_debut` date NOT NULL,
  `date_fin` date NOT NULL,
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `photo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `etab_id` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `28_2024_evenement`
--

INSERT INTO `28_2024_evenement` (`id`, `nom`, `date_debut`, `date_fin`, `description`, `photo`, `etab_id`) VALUES
(2, 'Journée PEESo', '2024-10-28', '2024-11-05', 'Journée PEESo ', 'https://esen-sci-compet.com/eesu/assets/assets/images/event_peeso.jpg', NULL),
(6, 'evennnnt', '2024-11-25', '2024-11-27', 'évènement pendant 3 jours', 'https://esen-sci-compet.com/eesu/assets/assets/images/peeso1.jpg', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `28_2024_formations`
--

DROP TABLE IF EXISTS `28_2024_formations`;
CREATE TABLE IF NOT EXISTS `28_2024_formations` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `thumbnail` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `rating` int NOT NULL DEFAULT '0',
  `created_at` date NOT NULL,
  `referent_id` int DEFAULT NULL,
  `publie` tinyint(1) NOT NULL DEFAULT '0',
  `nb_seance` int NOT NULL DEFAULT '0',
  `date_overture` date DEFAULT NULL,
  `date_debut` date DEFAULT NULL,
  `date_fin` date DEFAULT NULL,
  `etab_id` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `28_2024_formations`
--

INSERT INTO `28_2024_formations` (`id`, `nom`, `thumbnail`, `rating`, `created_at`, `referent_id`, `publie`, `nb_seance`, `date_overture`, `date_debut`, `date_fin`, `etab_id`) VALUES
(2, 'Making Music with Other People', 'music.jfif', 0, '2024-11-14', NULL, 0, 0, NULL, '2024-11-30', '2024-12-31', NULL),
(3, 'Formation De Management', 'Project-Scope-Management-Cover.avif', 0, '2024-11-15', 11, 0, 0, NULL, NULL, NULL, NULL),
(4, 'Formation DEV', NULL, 0, '2024-11-18', 11, 0, 0, NULL, NULL, NULL, NULL),
(7, 'Formation Devops', 'devops.jfif', 0, '2024-11-18', 5, 1, 0, NULL, '2024-11-30', '2024-12-31', NULL),
(8, '3D Painting', NULL, 0, '2024-11-25', 2, 0, 0, NULL, NULL, NULL, NULL),
(9, 'painting', NULL, 0, '2024-11-25', 1, 0, 0, NULL, '2024-11-26', '2024-12-08', NULL),
(10, 'painting', NULL, 0, '2024-11-25', 1, 0, 3, NULL, '2024-11-29', '2024-12-07', NULL),
(11, 'Testing', NULL, 0, '2024-11-27', 3, 0, 0, NULL, '2024-11-28', '2024-11-30', NULL),
(12, 'Testing', NULL, 0, '2024-11-27', 3, 0, 0, NULL, '2024-11-28', '2024-11-30', NULL),
(13, 'Testing', NULL, 0, '2024-11-27', 3, 0, 3, NULL, '2024-11-28', '2024-11-30', NULL),
(14, 'Testing', NULL, 0, '2024-11-27', 3, 0, 2, NULL, '2024-11-28', '2024-11-29', NULL),
(15, 'Testing', NULL, 0, '2024-11-27', 1, 0, 2, NULL, '2024-11-28', '2024-11-29', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `28_2024_formations_domaines`
--

DROP TABLE IF EXISTS `28_2024_formations_domaines`;
CREATE TABLE IF NOT EXISTS `28_2024_formations_domaines` (
  `id` int NOT NULL AUTO_INCREMENT,
  `formation_id` int NOT NULL,
  `domaine_id` int NOT NULL,
  `etab_id` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `28_2024_formations_domaines`
--

INSERT INTO `28_2024_formations_domaines` (`id`, `formation_id`, `domaine_id`, `etab_id`) VALUES
(4, 2, 3, NULL),
(5, 3, 7, NULL),
(6, 3, 12, NULL),
(7, 4, 10, NULL),
(14, 7, 10, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `28_2024_formations_groupes`
--

DROP TABLE IF EXISTS `28_2024_formations_groupes`;
CREATE TABLE IF NOT EXISTS `28_2024_formations_groupes` (
  `id` int NOT NULL AUTO_INCREMENT,
  `formation_id` int NOT NULL,
  `groupe_id` int NOT NULL,
  `progression` int NOT NULL DEFAULT '0',
  `etab_id` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `28_2024_formations_groupes`
--

INSERT INTO `28_2024_formations_groupes` (`id`, `formation_id`, `groupe_id`, `progression`, `etab_id`) VALUES
(1, 3, 2, 0, NULL),
(2, 7, 3, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `28_2024_formations_students`
--

DROP TABLE IF EXISTS `28_2024_formations_students`;
CREATE TABLE IF NOT EXISTS `28_2024_formations_students` (
  `id` int NOT NULL AUTO_INCREMENT,
  `formation_id` int NOT NULL,
  `student_id` int NOT NULL,
  `progression` int NOT NULL DEFAULT '0',
  `fiche_chaude_ready` tinyint(1) NOT NULL DEFAULT '0',
  `etab_id` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `28_2024_formations_students`
--

INSERT INTO `28_2024_formations_students` (`id`, `formation_id`, `student_id`, `progression`, `fiche_chaude_ready`, `etab_id`) VALUES
(5, 7, 8, 0, 0, NULL),
(6, 9, 8, 0, 0, NULL),
(7, 10, 8, 0, 0, NULL),
(8, 13, 8, 0, 0, NULL),
(9, 14, 8, 0, 0, NULL),
(10, 15, 8, 0, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `28_2024_google_info`
--

DROP TABLE IF EXISTS `28_2024_google_info`;
CREATE TABLE IF NOT EXISTS `28_2024_google_info` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `access_token` text,
  `expires_in` int DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `etab_id` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `28_2024_google_info`
--

INSERT INTO `28_2024_google_info` (`id`, `name`, `lastname`, `email`, `access_token`, `expires_in`, `created_at`, `etab_id`) VALUES
(4, 'Ala ROMDHANI', 'Ala ROMDHANI', 'ala.rom0311@gmail.com', 'ya29.a0AeDClZDxT8mEoz3jZKkcOPQn1LT0R3hoHibw9gZuZYMQLRPyVW88Fo5DXgSdiaTN9iLAZLNo2Ahc0Aky9BLR_5QadpHPbeM-wyBUOpbuI_gV31rhRhPR6dV2MEyxhKZ3M1CQCiofU8WfLgnGXdh-4MViXVZ3Ec-ElxUaCgYKAcQSARISFQHGX2Miom2WYZlZSurtJfVKdRxvCQ0170', 3599, '2024-11-04 17:06:04', NULL),
(5, 'ala romdhani', 'ala romdhani', 'ala.romdhani@esprit.tn', 'ya29.a0AeDClZBzL128IteChoAYlGJjKTiC6l8cAloflTyJJsJyX_l_5sSgqwdHDFudXTNDzcpTFQAhcfSUZAVJ1mvrPpcMxi5IJ6qDvRfQiPhqMaaHr7v8hsaAkVLc1xp6wzEfRuONCUg-I23wbSxR3AS1T1lkSL7b3Gk4yDYaCgYKAbQSARASFQHGX2MicqFlz5m7rpr6yplfykEctQ0170', 3599, '2024-10-31 10:03:18', NULL),
(6, 'rom ala', 'rom ala', 'ala.rom0311@gmail.com', 'ya29.a0AeDClZDrne1oRXzwAUZtrFrRaXrbSuGO-nSHIQBDZzft-f81uJnUgq4B8vahNiq1Ro4FZ6K6-hXwy29c3EOCT1PL0f5_-OCEjvNk_UnvzEiwKme4w30z9rlsc6BoZI8kO5OblvHFinTzaicei_mLdjqPeygOyunpcMgaCgYKAaESARISFQHGX2MihVXlUm9RBl89fni3p_JSHA0170', 3599, '2024-10-31 14:34:21', NULL),
(7, 'rom ala', 'rom ala', 'ala.rom0311@gmail.com', 'ya29.a0AeDClZAAffE5ORO0_u1UI8GlTcuhoZ3p-xm7ouHzqlRURZpB-b9DnyPjhfJYewk63FM1v6BmjyOFFfy81Dcky0JwDC76gCtTjPD--5gSyTC2eNe69IKzGvVZyQ734kd7kLBR8oW87g2UE0_8AllGb-iBQe0w2AzfUgaCgYKAbkSARISFQHGX2MiemiB9psKaMHHqMf3cgzBTA0169', 3599, '2024-11-08 00:51:21', NULL),
(8, 'ala romdhani', 'ala romdhani', 'alaromdhani0311@gmail.com', 'ya29.a0AeDClZB8K2FlL2Z-lqtJqv1tn7eNJQ-VYCZW1lWRK5LD5W2Deri-V_wle6p0-R79tLDHitF0p1AHsFrvn8uZsbyiLsia8CFLRmPKDkGjJHz5wWLE1kR-Hbay4CdU2RI_AtSa_-Vh8keR7TXU1LlHwmw_iTg9jH3QOiIaCgYKAUMSARASFQHGX2MiMEwdFrNzOfA06iin_1trQg0170', 3599, '2024-11-08 17:18:38', NULL),
(9, 'rom ala', 'rom ala', 'ala.rom0311@gmail.com', 'ya29.a0AeDClZDXWlKTy7FCM4sujG00Svcc8EIU3XyxAJn82pvkXkTvPyGJ5NeSG8JyEFsOnWz4sDobQOE9rnF8oEmKJ9NGXsLi2FTe8uf9lH-vmUat7s3dZCxMHKUkSLa3BAO0ZmVMfU24JS43AjheKhyDb16Q_jFPWNYC0DUaCgYKAXYSARISFQHGX2MipvyMJvW53FMi7cKO-lWXnA0170', 3599, '2024-11-08 17:20:10', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `28_2024_grille_evaluation`
--

DROP TABLE IF EXISTS `28_2024_grille_evaluation`;
CREATE TABLE IF NOT EXISTS `28_2024_grille_evaluation` (
  `id` int NOT NULL AUTO_INCREMENT,
  `porteur` enum('oui','non') CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL DEFAULT 'oui',
  `membre` enum('oui','non') CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL DEFAULT 'oui',
  `solide` enum('oui','non') CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `depot` enum('oui','non') CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `creative` int NOT NULL,
  `explore` int NOT NULL,
  `communication` int NOT NULL,
  `travail_equipe` int NOT NULL,
  `commentaire_critere` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `comprehension_problem` int NOT NULL,
  `offre` int NOT NULL,
  `innovation` int NOT NULL,
  `commentaire_idee` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `motivation` int NOT NULL,
  `commentaire_motivation` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `total` int NOT NULL,
  `stat_nat` enum('oui','non','en_attente') CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `commentaire_avis` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `niveau` enum('en_attente','non','initiateur','innovateur','promoteur') CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `id_enseignant` int NOT NULL,
  `id_projet` int NOT NULL,
  `signature_tuteur` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `etab_id` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `28_2024_grille_evaluation`
--

INSERT INTO `28_2024_grille_evaluation` (`id`, `porteur`, `membre`, `solide`, `depot`, `creative`, `explore`, `communication`, `travail_equipe`, `commentaire_critere`, `comprehension_problem`, `offre`, `innovation`, `commentaire_idee`, `motivation`, `commentaire_motivation`, `total`, `stat_nat`, `commentaire_avis`, `niveau`, `id_enseignant`, `id_projet`, `signature_tuteur`, `etab_id`) VALUES
(2, 'oui', 'non', 'oui', 'oui', 5, 5, 5, 5, 'très bien', 5, 5, 5, 'très bien', 15, 'très bien', 50, 'oui', 'très bien', 'initiateur', 1, 8, '', NULL),
(3, 'oui', 'non', 'oui', 'oui', 5, 5, 5, 5, 'Bien', 5, 5, 5, 'Bien', 15, 'Bien', 50, 'oui', 'Bien Trés Bien', 'initiateur', 2, 7, 'signature-401203.png', NULL),
(4, 'oui', 'non', 'oui', 'oui', 3, 3, 4, 5, 'fds', 3, 4, 3, 'yteyryryryryryryr', 11, 'fyheryhryryr\'yryryryryryryryr', 35, 'non', 'u(utututututu', 'non', 2, 9, 'logo_time2022-11-23_033629.png', NULL),
(5, 'non', 'oui', 'oui', 'oui', 5, 5, 5, 5, 'wfhgshdghgfh', 5, 5, 5, 'hfgfhdgjhfdgh', 15, 'dhgfhghgdhgfh', 50, 'oui', 'hsgfjhdfghfgh', 'initiateur', 2, 8, 'signature-401382.png', NULL),
(6, 'non', 'oui', 'oui', 'oui', 4, 4, 4, 5, 'xbgdhfgshgfjhgfh', 4, 5, 4, 'hsghhjfjhjg', 15, 'gdfgshfghdjdj', 46, 'oui', 'hhgfjhjhdgjdhg', 'initiateur', 1, 11, 'signature-401385.png', NULL),
(7, 'non', 'oui', 'oui', 'oui', 4, 4, 5, 4, 'egdsfhdjhgjfg', 4, 5, 5, 'jdfjhdgjhdgjhdgjdhgj', 15, 'hsfhgfhgfhjdfgf', 47, 'oui', 'shghfhgfhsghgfh', 'initiateur', 2, 11, 'signature-401206.png', NULL),
(8, 'oui', 'oui', 'oui', 'oui', 4, 4, 4, 5, 'Observations et Commentaires', 4, 4, 4, 'Observations et Commentaires', 11, 'Observations et Commentaires', 40, 'oui', 'Observations et Commentaires', 'initiateur', 5, 12, 'signature4.png', NULL),
(9, 'oui', 'oui', 'oui', 'oui', 4, 4, 5, 5, 'Observations et Commentaires', 3, 4, 4, 'Observations et Commentaires', 6, 'Observations et Commentaires', 34, 'oui', 'Observations et Commentaires', 'innovateur', 5, 10, 'signature6.png', NULL),
(10, 'oui', 'oui', 'oui', 'oui', 4, 4, 5, 4, 'Observations et Commentaires', 3, 4, 5, 'Observations et Commentaires', 8, 'Observations et Commentaires', 38, 'oui', 'Observations et Commentaires', 'initiateur', 5, 11, 'signature8.png', NULL),
(11, 'oui', 'oui', 'oui', 'oui', 4, 4, 3, 4, 'Observations et Commentaires', 3, 4, 3, 'Observations et Commentaires', 14, 'Observations et Commentaires', 38, 'oui', 'Observations et Commentaires', 'initiateur', 5, 13, 'signature9.png', NULL),
(12, 'oui', 'oui', 'oui', 'oui', 2, 2, 4, 3, 'Observations et Commentaires', 4, 4, 3, 'Observations et Commentaires', 7, 'Observations et Commentaires', 30, 'oui', 'Observations et Commentaires', 'initiateur', 2, 14, 'signature10.png', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `28_2024_inscriptions`
--

DROP TABLE IF EXISTS `28_2024_inscriptions`;
CREATE TABLE IF NOT EXISTS `28_2024_inscriptions` (
  `id` int NOT NULL AUTO_INCREMENT,
  `etudiant_id` int NOT NULL,
  `appel_id` int NOT NULL,
  `etab_id` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `28_2024_inscriptions`
--

INSERT INTO `28_2024_inscriptions` (`id`, `etudiant_id`, `appel_id`, `etab_id`) VALUES
(1, 4, 5, NULL),
(2, 1, 5, NULL),
(3, 5, 4, NULL),
(4, 6, 4, NULL),
(5, 1, 4, NULL),
(6, 1, 1, NULL),
(7, 7, 1, NULL),
(8, 8, 7, NULL),
(9, 9, 7, NULL),
(10, 10, 7, NULL),
(11, 9, 6, NULL),
(12, 11, 6, NULL),
(13, 13, 1, NULL),
(14, 14, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `28_2024_langues`
--

DROP TABLE IF EXISTS `28_2024_langues`;
CREATE TABLE IF NOT EXISTS `28_2024_langues` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `niveau` varchar(255) NOT NULL,
  `etudiant_id` int DEFAULT NULL,
  `etab_id` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `28_2024_langues`
--

INSERT INTO `28_2024_langues` (`id`, `nom`, `niveau`, `etudiant_id`, `etab_id`) VALUES
(15, 'Français', 'Bien', 1, NULL),
(16, 'Englais', 'Trés Bien', 1, NULL),
(17, 'Allemend', 'Bien', 1, NULL),
(18, 'Français', 'Passable', 8, NULL),
(19, 'Arabic', 'Trés Bien', 8, NULL),
(20, 'Englais', 'Bien', 8, NULL),
(21, 'Englais', 'Bien', 15, NULL),
(22, 'Français', 'Trés Bien', 15, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `28_2024_livrable_initiateur`
--

DROP TABLE IF EXISTS `28_2024_livrable_initiateur`;
CREATE TABLE IF NOT EXISTS `28_2024_livrable_initiateur` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `livrable` varchar(255) DEFAULT NULL,
  `seance_id` int NOT NULL,
  `etab_id` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `28_2024_livrable_initiateur`
--

INSERT INTO `28_2024_livrable_initiateur` (`id`, `name`, `livrable`, `seance_id`, `etab_id`) VALUES
(1, 'Etude documentaire sur le secteur d’activité de son projet', 'fiche_suivie_aal_rom (7).pdf', 1, NULL),
(2, 'Description du problème, de la solution et de l’idée du projet.', 'fiche_accompagnementaal_rom_seance_1 (11).pdf', 1, NULL),
(3, 'Etude documentaire sur le secteur d’activité de son projet\r\n', 'fiche_suivie_aal_rom (1).pdf', 39, NULL),
(4, 'Description du problème, de la solution et de l’idée du projet.', 'fiche_suivie_aal_rom (4).pdf', 39, NULL),
(5, 'Le Business Model Canvas/Le Business Lean Canvas', 'fiche_suivie_aal_rom (1) (1).pdf', 41, NULL),
(6, 'Etude documentaire sur le secteur d’activité de son projet\r\n', 'fiche_suivie_etudiant_detest (2).pdf', 63, NULL),
(7, 'Description du problème, de la solution et de l’idée du projet.', 'fiche_suivie_etudiant_detest (1).pdf', 63, NULL),
(8, 'Etude documentaire sur le secteur d’activité de son projet\r\n', 'fiche_suivie_etudiant_detest (5).pdf', 75, NULL),
(9, 'Description du problème, de la solution et de l’idée du projet.', 'fiche_suivie_etudiant_detest (5).pdf', 75, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `28_2024_livrable_innovateur`
--

DROP TABLE IF EXISTS `28_2024_livrable_innovateur`;
CREATE TABLE IF NOT EXISTS `28_2024_livrable_innovateur` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `livrable` varchar(255) DEFAULT NULL,
  `seance_id` int NOT NULL,
  `etab_id` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `28_2024_livrable_innovateur`
--

INSERT INTO `28_2024_livrable_innovateur` (`id`, `name`, `livrable`, `seance_id`, `etab_id`) VALUES
(1, 'Etude documentaire sur les étapes de la planification stratégique d’un projet\r\n(Vision, Mission, Objectifs, Stratégie, Tactiques : VMOST)', 'fiche_suivie_aal_rom (1) (1) (1).pdf', 20, NULL),
(2, 'Etude documentaire sur les étapes de la planification stratégique d’un projet\r\n(Vision, Mission, Objectifs, Stratégie, Tactiques : VMOST)', 'signature.png', 39, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `28_2024_livrable_promoteur`
--

DROP TABLE IF EXISTS `28_2024_livrable_promoteur`;
CREATE TABLE IF NOT EXISTS `28_2024_livrable_promoteur` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `livrable` varchar(255) DEFAULT NULL,
  `seance_id` int NOT NULL,
  `etab_id` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `28_2024_livrable_promoteur`
--

INSERT INTO `28_2024_livrable_promoteur` (`id`, `name`, `livrable`, `seance_id`, `etab_id`) VALUES
(1, 'Faire une cartographie des parties prenantes', 'livrable_seance_1_promoteur.pdf', 17, NULL),
(2, 'Faire une cartographie des parties prenantes', 'fiche_accompagnementetudiant_detest_seance_1 (3).pdf', 25, NULL),
(3, 'Faire une cartographie des parties prenantes', 'fiche_suivie_etudiant_detest (5).pdf', 33, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `28_2024_messages_peeso`
--

DROP TABLE IF EXISTS `28_2024_messages_peeso`;
CREATE TABLE IF NOT EXISTS `28_2024_messages_peeso` (
  `id` int NOT NULL AUTO_INCREMENT,
  `sender_id` int NOT NULL,
  `content` text NOT NULL,
  `sujet` text NOT NULL,
  `created_at` date NOT NULL,
  `type_sender` varchar(255) NOT NULL,
  `type_reciever` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `etab_id` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `28_2024_messages_peeso`
--

INSERT INTO `28_2024_messages_peeso` (`id`, `sender_id`, `content`, `sujet`, `created_at`, `type_sender`, `type_reciever`, `etab_id`) VALUES
(1, 1, ' this is a test message for all coachs', 'hello', '2024-10-09', 'Etudiant', 'coach', NULL),
(2, 1, ' this is a test message for all coachs', 'hello', '2024-10-09', 'Etudiant', 'coach', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `28_2024_messages_users_peeso`
--

DROP TABLE IF EXISTS `28_2024_messages_users_peeso`;
CREATE TABLE IF NOT EXISTS `28_2024_messages_users_peeso` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `message_id` int NOT NULL,
  `seen` tinyint(1) NOT NULL DEFAULT '0',
  `type_sender` varchar(255) NOT NULL,
  `type_reciever` varchar(255) NOT NULL,
  `etab_id` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `28_2024_messages_users_peeso`
--

INSERT INTO `28_2024_messages_users_peeso` (`id`, `user_id`, `message_id`, `seen`, `type_sender`, `type_reciever`, `etab_id`) VALUES
(1, 3, 2, 0, 'Etudiant', 'coach', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `28_2024_modules`
--

DROP TABLE IF EXISTS `28_2024_modules`;
CREATE TABLE IF NOT EXISTS `28_2024_modules` (
  `id` int NOT NULL AUTO_INCREMENT,
  `seance_id` int NOT NULL,
  `document` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `titre` varchar(255) NOT NULL,
  `etab_id` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `28_2024_modules`
--

INSERT INTO `28_2024_modules` (`id`, `seance_id`, `document`, `titre`, `etab_id`) VALUES
(3, 8, 'outils-devops.pdf', 'Outils De Devops', NULL),
(4, 8, 'continuous devlivery.pdf', 'Outils D\'integration Continue', NULL),
(5, 10, 'docker.pdf', 'Docker', NULL),
(6, 10, 'docker.pdf', 'Docker-compose', NULL),
(7, 9, 'maintenance.pdf', 'Maintenance', NULL),
(8, 15, 'intro.pdf', 'Intro', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `28_2024_news`
--

DROP TABLE IF EXISTS `28_2024_news`;
CREATE TABLE IF NOT EXISTS `28_2024_news` (
  `id` int NOT NULL AUTO_INCREMENT,
  `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `titre` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `added_by` int NOT NULL,
  `publie` tinyint(1) NOT NULL,
  `created_at` date NOT NULL,
  `content-en` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `titre-en` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `etab_id` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `28_2024_news`
--

INSERT INTO `28_2024_news` (`id`, `content`, `titre`, `image`, `added_by`, `publie`, `created_at`, `content-en`, `titre-en`, `etab_id`) VALUES
(1, 'L’Université de Sousse a l’honneur d\'annoncer que dans le cadre de la compétition internationale START CUP COMPETITION 2024 “Entrepreneurship in the Mediterranean” organisée par UNIMED – ETF – AUF  et Lebanese University (Coordinator of UNIMED SubNetwork on Employability) le 21 et 22 Octobre 2024 en Turkie à l\'université d\'Aydin, l’équipe du projet « Smart Re-Rustica » composée de Khouloud BACCOUCHE étudiante en deuxième année mastère en protection des plantes et environnement à l’Institut Supérieur d’agronomie de Chott Meriem  et Mohamed OURAGINI étudiant en troisième année licence en Ingénierie des systèmes informatiques à l’Institut Supérieur d’informatique et des Technologies de Communication de Sousse qui ont représenté la Tunisie après avoir été finalistes ont eu le prix du « Projet le plus honorable \"devant une communauté diversifiée de toute la région méditerranéenne.', ' Félicitations et bravo aux étudiants entrepreneurs', '465273456_965522068941966_5645469509170765210_n.jpg', 0, 1, '2024-10-09', ' Félicitations Congratulations et bravo aux étudiants entrepreneurs du PEESo  Pôle Etudiant Entrepreneur Université de Sousse', ' Félicitations Congratulations et bravo aux étudiants entrepreneurs du PEESo  Pôle Etudiant Entrepreneur Université de Sousse', 1),
(5, '<p><span style=\"background-color: rgb(255, 255, 255); color: rgb(8, 8, 9);\">Participation de </span><a href=\"https://www.facebook.com/universityofsousse?__cft__[0]=AZXmEwfN8wTw7Z6aNQfyLlro61JdvgOBkMm0-2Mk2RarHAbrg3kkPX0sFow1qwSql9qtmhm3z5F0rBDZn4FU9rUrZGF4asFGDpjXA0lkUAMxZlPWWLlARe-F_CaMvHu9DbG5_acFV-PuQl_wA9pqmrPE42I4f7LCr4MqU1YKIbVM-_QjxXlEV38_6uSyRuqOy-4&amp;__tn__=-]K-R\" rel=\"noopener noreferrer\" target=\"_blank\" style=\"background-color: transparent; color: var(--blue-link);\">Université de Sousse</a><span style=\"background-color: rgb(255, 255, 255); color: rgb(8, 8, 9);\"> au Salon des Universités et de la formation organisé par la Foire de Sousse du 24 au 26 Mai 2024 avec la réservation d\'un espace au profit de quelques porteurs de projets de l\'Institut Supérieur d\'agronomie de Chott Meriem et de l\'Institut Supérieur des Beaux-arts de Sousse</span></p>', 'Participation au Salon des Universités', '445372715_468098882408826_4093442829963163760_n.jpg', 0, 1, '2024-11-07', '<p>Participation of the University of Sousse in the University and Training Fair organized by the Sousse Fair from May 24 to 26, 2024 with the reservation of a space for the benefit of some project leaders from the Higher Institute of Agronomy of Chott Meriem and the Higher Institute of Fine Arts of Sousse</p>', 'Participation in the University Fair', NULL),
(6, '<p><span style=\"background-color: rgb(255, 255, 255); color: rgb(8, 8, 9);\">Comité de sélection des étudiants entrepreneurs de l\'ISSAT de Sousse, l\'ISET de Sousse, l\'ISTLS de de Sousse candidats à la troisième cohorte du Statut National de l\'Etudiant Entrepreneur au siège du PEESo.</span></p><p><span style=\"background-color: rgb(255, 255, 255); color: rgb(8, 8, 9);\">Remerciement à tous les référents : M. Mounir FRIJA, Mme. Hanene Memmi , M. Mourad HADHRI, M. Ahmed Youssef El FEKIH, M. Hichem HASSINE Mme. Maissa CHAIBI et à Mme Feten Ayari présidente de l\'espace entreprendre de Sousse</span></p><p><span style=\"background-color: rgb(255, 255, 255); color: rgb(8, 8, 9);\">Bonne chance à tous les candidats</span></p><p><br></p>', 'Comité de sélection des étudiants entrepreneurs ', '433426891_424779836740731_2165581947807999109_n.jpg', 0, 1, '2024-11-07', '<p>Selection committee of student entrepreneurs of ISSAT of Sousse, ISET of Sousse, ISTLS of Sousse candidates for the third cohort of the National Status of Student Entrepreneur at the headquarters of PEESo.</p><p>Thanks to all the referents: Mr. Mounir FRIJA, Mrs. Hanene Memmi, Mr. Mourad HADHRI, Mr. Ahmed Youssef El FEKIH, Mr. Hichem HASSINE Mrs. Maissa CHAIBI and Mrs. Feten Ayari president of the Sousse entrepreneurship space</p><p>Good luck to all the candidates</p>', 'Selection committee of student entrepreneurs', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `28_2024_newsletters`
--

DROP TABLE IF EXISTS `28_2024_newsletters`;
CREATE TABLE IF NOT EXISTS `28_2024_newsletters` (
  `id` int NOT NULL AUTO_INCREMENT,
  `subject` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `titre` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `content` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `withlink` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `lien` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `etab_id` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `28_2024_newsletters`
--

INSERT INTO `28_2024_newsletters` (`id`, `subject`, `titre`, `image`, `content`, `withlink`, `lien`, `created_at`, `etab_id`) VALUES
(2, 'Test', 'Test', 'projet24.jpeg', '<p><strong>Test</strong></p><p><u>Cordiallement,</u></p><p>PEESo</p>', 'on', 'www.google.com', '2024-10-10 14:12:32', NULL),
(4, 'Test 2 ', 'test2', 'admin5.png', '<p><strong>Test2 :)</strong></p>', 'on', 'https://google.com', '2024-10-10 14:22:11', NULL),
(5, 'Test 3', 'test3', 'projet26.jpeg', '<p><strong>Test3:)</strong></p>', 'on', 'https://google.com', '2024-10-10 15:06:23', NULL),
(7, 'projet ', 'nouveau projet', 'projet28.jpeg', '<h1>Projet</h1><p><strong>Bonjour!</strong></p><h1><br></h1>', 'on', 'https://www.ama-business.com/', '2024-10-14 09:57:07', NULL),
(8, 'dfhgjhjhg', 'djhgjdhgj', '', '<p>d,jghj,gdhgfhdgfh</p>', NULL, '', '2024-11-06 11:34:49', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `28_2024_parameter_bilan_competance_initiateur`
--

DROP TABLE IF EXISTS `28_2024_parameter_bilan_competance_initiateur`;
CREATE TABLE IF NOT EXISTS `28_2024_parameter_bilan_competance_initiateur` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `etab_id` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `28_2024_parameter_bilan_competance_initiateur`
--

INSERT INTO `28_2024_parameter_bilan_competance_initiateur` (`id`, `name`, `etab_id`) VALUES
(1, 'Développer ses aptitudes de communication', NULL),
(2, 'Maîtriser les techniques de la communication verbale et non verbale', NULL),
(3, 'Gérer les conflits', NULL),
(4, 'Maîtriser la gestion du temps', NULL),
(5, 'Appliquer les méthodes efficaces pour la gestion d\'équipe', NULL),
(6, 'Acquérir les compétences sociales nécessaires pour créer et/ou renforcer son réseau : perception sociale, adaptabilité sociale, persuasion et influence,\r\nintelligence émotionnelle, marketing de soi', NULL),
(7, 'Mobiliser son réseau personnel (e.g. Famille, amis, membres futurs de son entreprise…)', NULL),
(8, 'Créer son réseau professionnel et d’affaires (Ex. clients, fournisseurs, hommes d’affaires, conseillers et experts comptables…)', NULL),
(9, 'Diversifier son réseau de support (e.g. ANETI, APII, Chambre de commerce, UTICA…)', NULL),
(10, 'Préparer son réseau de financement (e.g. Investisseurs, Banques, les société de leasing…)', NULL),
(11, 'Développer l’opportunité entrepreneuriale ', NULL),
(12, 'Avoir la capacité à innover/inventer/improviser et la capacité d’imaginer, de penser à des idées nouvelles/inédites/originales', NULL),
(13, 'Développer l’opportunité entrepreneuriale \r\n\r\n', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `28_2024_parameter_bilan_competance_innovateur`
--

DROP TABLE IF EXISTS `28_2024_parameter_bilan_competance_innovateur`;
CREATE TABLE IF NOT EXISTS `28_2024_parameter_bilan_competance_innovateur` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `etab_id` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `28_2024_parameter_bilan_competance_innovateur`
--

INSERT INTO `28_2024_parameter_bilan_competance_innovateur` (`id`, `name`, `etab_id`) VALUES
(1, 'Coordonner les diverses composantes d’un projet (les fonctions de planification et d’exécution du projet et de contrôle du changement)\r\nconformément à des normes de qualité, pour établir un juste milieu entre la durée, le coût et la qualité du projet', NULL),
(2, 'Veiller à ce que le projet soit réalisé dans les délais prescrits', NULL),
(3, 'Veiller à ce que le projet soit réalisé dans les limites du budget alloué', NULL),
(4, 'Veiller à ce que le produit/service réponde aux besoins', NULL),
(5, 'Faire preuve d’un leadership pour assurer un travail d’équipe de qualité', NULL),
(6, 'Identifier les éléments du contexte du projet utiles à la communication (parties prenantes, budget, temps alloué, les limitations, contraintes,\r\nopportunités...)', NULL),
(7, 'Définir le contenu des postes de travail en termes d’activités et de compétences et les positionner dans l’organigramme de l’entreprise', NULL),
(8, 'Analyser les différents groupes cibles (leurs importances, leurs implications dans le projet, leurs connaissances, leurs aptitudes, leurs attentes...)', NULL),
(9, 'Déterminer les objectifs de communication ( les résultats à atteindre, les objectifs formulés SMART, les indicateurs...)', NULL),
(10, 'Définir quels messages pour quels groupes cibles (les messages primaires, les messages secondaires adaptés en fonction des groupes cibles, Keep It\r\nShort and Simple, storytelling, elevator pitch...)', NULL),
(11, 'Etablir le plan d’actions (plan de communication visuel, planning de communication: tableau de bord et suivi des actions...)', NULL),
(12, 'Faire preuve d’écoute vis-à-vis des collaborateurs et être attentif aux problèmes et aux conflits', NULL),
(13, 'Faire le suivi et adapter : outil de travail qui doit évoluer en permanence basé sur un plan-do-chek-act', NULL),
(14, 'Evaluer et débriefer (objectifs sont atteints partiellement ou totalement, échec du plan, pistes d’amélioration, mesures d\'impact des actions, tirer des\r\nconclusions...)', NULL),
(15, 'Décrire l’activité avec précision (utilité des produits et/ou services, leurs caractéristiques, cible, lieu de vente...)', NULL),
(16, 'Etudier le marché visé (zone géographique, saisonnier ou permanent, niveau de concentration , barrières à l’entrée, types de clientèles, état actuel du\r\nmarché et ses tendances...)', NULL),
(17, 'Etudier la compatibilité de l\'innovateur avec le besoin du son projet (ses motivations, ses objectifs, son savoir-faire, son potentiel, s’il y a des\r\ncompétences manquantes et trouver des associés qui pourront les apporter...)', NULL),
(18, 'Analyser les forces et les faiblesses de l’idée (avantages par rapport à la concurrence et les contraintes du projet...)', NULL),
(19, 'Tester l’idée de création d’entreprise (sélectionner les testeurs, tester le produit/service, analyser les retours...)', NULL),
(20, 'Choisir la structure juridique selon la nature et l\'importance de l’activité (entreprise individuelle, SUARL, SARL, SA...)', NULL),
(21, 'Déterminer la forme de l’entreprise selon la nature de l’activité, la volonté de s’associer, l’organisation patrimoniale, l’engagement financier et la\r\ncrédibilité vis-à-vis des partenaires', NULL),
(22, 'Finaliser les formalités de constitution (attestations de dépôt de déclaration auprès de l\'API, déclaration d’ouverture de patente au bureau des impôts,\r\nenregistrement des statuts à la recette d’enregistrement des actes de sociétés...)', NULL),
(23, 'Faire une analyse stratégique du projet, recenser les opportunités de l’entreprise et les éventuelles difficultés à court, moyen ou long terme', NULL),
(24, 'Elaborer un plan de financement du projet : évaluer les besoins financiers pour la mise en œuvre et trouver les moyens qui couvrent les besoins', NULL),
(25, 'Donner une appréciation du chiffre d’affaires (hypothèse du taux d’utilisation de la capacité, production, prévision du chiffre d\'affaires...)', NULL),
(26, 'Estimer les charges du projet : s’acquitter de plusieurs charges, recenser toutes ces charges sans restriction aucune et d’en faire une synthèse', NULL),
(27, 'Etablir un compte de résultat prévisionnel : capacité à rembourser les emprunts et savoir s\'il y a suffisamment de bénéfices pour vivre du projet', NULL),
(28, 'Faire une étude financière qui permet de surveiller l’évolution de la trésorerie (e.g. sur 12 mois)', NULL),
(29, 'Créer un design du produit', NULL),
(30, 'Créer un prototype non fonctionnel (concevoir des plans 3D, 2D, établir le cahier des charges...)', NULL),
(31, 'Créer un prototype de produit fonctionnel (le chiffrage selon la quantité et les caractéristiques techniques...)', NULL),
(32, 'Valider des différents éléments du projet', NULL),
(33, 'Vérifier l’adéquation aux exigences préétablies (géométrie des prototypes, dimensions, caractéristiques visuelles/physiques /mécaniques, finition)', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `28_2024_parameter_bilan_competance_promoteur`
--

DROP TABLE IF EXISTS `28_2024_parameter_bilan_competance_promoteur`;
CREATE TABLE IF NOT EXISTS `28_2024_parameter_bilan_competance_promoteur` (
  `name` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `id` int NOT NULL AUTO_INCREMENT,
  `etab_id` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `28_2024_parameter_bilan_competance_promoteur`
--

INSERT INTO `28_2024_parameter_bilan_competance_promoteur` (`name`, `id`, `etab_id`) VALUES
('Identifier les parties prenantes : avoir une liste détaillée de tous les partenaires effectifs qui se positionnent en amont ou en aval de l’entreprise', 1, NULL),
('Mesurer le niveau d’intérêt et de pouvoir sur le projet de chaque partie prenante', 2, NULL),
('Classifier les parties prenantes', 3, NULL),
('Communiquer avec les différentes parties prenantes et partenaires, les persuader et entretenir des relations durables avec eux', 4, NULL),
('Définir une stratégie de négociation appropriée pour chaque partie prenante afin de répondre aux attentes communes', 5, NULL),
('Elaborer la matrice RACI (responsible, accountable, consulted et informed) et/ou RAM (responsibility assignment matrix) : répartir les tâches, organiser\r\nles circuits d’information, de décision, de validation', 6, NULL),
('Définir le contenu des postes de travail en termes d’activités et de compétences et les positionner dans l’organigramme de l’entreprise', 7, NULL),
('Mener un entretien de recrutement en utilisant les techniques adéquates', 8, NULL),
('Installer un esprit et une dynamique d’équipe', 9, NULL),
('Mettre en œuvre une politique de motivation des membres de l\'équipe : mettre en place des structures incitatives, motiver ses collaborateurs...', 10, NULL),
('Mettre en œuvre une politique de rémunération en définissant les salaires et autres composantes de rémunération', 11, NULL),
('Faire preuve d’écoute vis-à-vis des collaborateurs et être attentif aux problèmes et aux conflits', 12, NULL),
('Faire preuve d’écoute vis-à-vis des collaborateurs, être attentifs aux problèmes (gestion des conflits)', 13, NULL),
('Mettre en œuvre une politique de communication interne efficace', 14, NULL),
('Elaborer une matrice d’analyse des risques', 15, NULL),
('Identifier tous les risques possibles (positifs et négatifs)', 16, NULL),
('Mesurer l\'importance du risque et classifier les risques selon l’importance', 17, NULL),
('Proposer les solutions pour affronter les risques (éliminer, réduire, transférer, accepter, pivoter...)', 18, NULL),
('Mettre en œuvre les mesures de protection intellectuelle', 19, NULL),
('Formaliser les contrats avec les partenaires d’affaire', 20, NULL),
('Engager les formalités de création de l’entreprise', 21, NULL),
('Identifier les différentes ressources de financement (autofinancement, dettes bancaires, fonds d’investissements, subventions, leasing...)', 22, NULL),
('Identifier les incitations des investissements (code d’incitation des investissements, lois d\'investissements...)', 23, NULL),
('Choisir la structure de financement optimale', 24, NULL),
('Respecter le planing de projet.', 25, NULL),
('Faire preuve d’efficience et d’efficacité: Définir et surveiller l’atteinte des indicateurs clés de performances du projet.', 26, NULL),
('Ajuster le plan d\'action: déterminer les écarts et les mesures de corrections nécessaires.', 27, NULL),
('Modifier le plan d\'action en présence de risques imprévus (covid, forces majeurs...).', 28, NULL),
('Être en mesure d’identifier la stratégie commerciale convenable (en fonction du produit/service créé): domination par les coûts, différenciation,\r\nconcentration...', 29, NULL),
('Savoir tenir un discours commercial efficace', 30, NULL),
('Savoir créer un lien de confiance et fidéliser la clientèle...', 31, NULL),
('Concevoir une stratégie de communication bien ciblée, cohérente avec des objectifs marketing clairs', 32, NULL),
('Comprendre les usages et les valeurs ajoutées des réseaux sociaux pour augmenter sa visibilité', 33, NULL),
('Valoriser ses profils et son activité en ligne : développer sa e-réputation; découvrir les notions d’identité numérique, d’empreinte numérique...', 34, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `28_2024_parameter_livrables_initiateur`
--

DROP TABLE IF EXISTS `28_2024_parameter_livrables_initiateur`;
CREATE TABLE IF NOT EXISTS `28_2024_parameter_livrables_initiateur` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `id_attribution_seance` int NOT NULL,
  `etab_id` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `28_2024_parameter_livrables_initiateur`
--

INSERT INTO `28_2024_parameter_livrables_initiateur` (`id`, `name`, `id_attribution_seance`, `etab_id`) VALUES
(1, 'Etude documentaire sur le secteur d’activité de son projet\r\n', 1, NULL),
(2, 'Description du problème, de la solution et de l’idée du projet.', 1, NULL),
(3, 'Le Business Model Canvas/Le Business Lean Canvas', 3, NULL),
(4, 'L’étude de marché : recherche documentaire sur le marché,\r\n\r\n', 6, NULL),
(5, 'Les clients Cibles\r\n', 6, NULL),
(6, 'Les concurrents\r\n\r\n', 6, NULL),
(7, 'Les résultats de l’étude de marché\r\n', 8, NULL),
(8, 'Le chiffre d’affaires prévisionnel\r\n', 8, NULL),
(9, 'Les éléments de la stratégie marketing (les 4P)', 8, NULL),
(10, 'Le processus de production ou la chaine de valeur\r\n', 9, NULL),
(11, 'Les besoins en équipements / matières premières / main d’œuvre\r\n', 9, NULL),
(12, 'Les devis', 9, NULL),
(13, 'Le coût de l’investissement (Les devis)\r\n', 10, NULL),
(14, 'Les moyens de financement adaptés au projet\r\n', 10, NULL),
(15, 'Prévisions des charges et des produits', 10, NULL),
(16, 'Le tableau des produits et des charges prévisionnelles\r\n', 11, NULL),
(17, 'Le Tableau de trésorerie prévisionnelle\r\n', 11, NULL),
(18, 'Le calcul de rentabilité', 11, NULL),
(19, 'Les statuts de l’entreprise', 12, NULL),
(20, 'Capsule vidéo pour le pitching du projet (3 minutes)\r\n', 13, NULL),
(21, 'Présentation PPT du projet', 13, NULL),
(22, 'Capsule vidéo\r\n', 14, NULL),
(23, 'Présentation PPT\r\n', 14, NULL),
(24, '', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `28_2024_parameter_livrables_innovateur`
--

DROP TABLE IF EXISTS `28_2024_parameter_livrables_innovateur`;
CREATE TABLE IF NOT EXISTS `28_2024_parameter_livrables_innovateur` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `id_attribution_seance` int NOT NULL,
  `etab_id` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `28_2024_parameter_livrables_innovateur`
--

INSERT INTO `28_2024_parameter_livrables_innovateur` (`id`, `name`, `id_attribution_seance`, `etab_id`) VALUES
(1, 'Etude documentaire sur les étapes de la planification stratégique d’un projet\r\n(Vision, Mission, Objectifs, Stratégie, Tactiques : VMOST)', 1, NULL),
(2, 'Les compétences d’un bon leader\r\n', 2, NULL),
(3, 'Les compétences pour une bonne gestion d’équipe', 2, NULL),
(4, 'Les types de risques\r\n', 3, NULL),
(5, 'Les outils de résolution de problèmes', 3, NULL),
(6, 'Les acteurs de l’écosystème entrepreneurial\r\n', 4, NULL),
(7, 'Les acteurs et les partenaires relatifs à la chaîne de valeur de son projet', 4, NULL),
(8, 'Analyse et état des lieux des besoins en communication\r\n', 5, NULL),
(9, 'Une description des objectifs de communication', 5, NULL),
(10, 'Formuler les messages pour les différents cibles', 6, NULL),
(11, 'Déterminer les étapes d’un plan de communication', 7, NULL),
(12, 'une enquête de satisfaction (questionnaire)', 8, NULL),
(13, 'les différents types de prototypages', 9, NULL),
(14, 'Réaliser le prototype de l’idée du projet', 10, NULL),
(15, 'Faire une enquête auprès de 10 utilisateurs pour un feedback (satisfaction/recommandations)\r\n', 11, NULL),
(16, 'Valider du prototype V0 (MVP)', 11, NULL),
(17, 'Rédiger un guide d’entretien ou un questionnaire', 12, NULL),
(18, 'Analyse concurrentielle relative au projet', 13, NULL),
(19, 'Déterminer la stratégie commerciale pour le projet', 14, NULL),
(20, 'Élaborer le plan marketing du projet', 15, NULL),
(21, 'Choisir et justifier son statut juridique\r\n', 16, NULL),
(22, 'Constituer son carnet d’adresse utile pour la constitution de son entreprise', 16, NULL),
(23, 'Choisir et justifier son statut juridique', 17, NULL),
(24, 'Constituer son carnet d’adresse utile pour la constitution de son entreprise', 17, NULL),
(25, 'Remplir le template pour dégager le schéma d’investissement et de financement de son projet', 18, NULL),
(26, 'Remplir le template pour dégager le taux de rentabilité du projet et présenter sa décision\r\nd’investissement', 19, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `28_2024_parameter_livrables_promoteur`
--

DROP TABLE IF EXISTS `28_2024_parameter_livrables_promoteur`;
CREATE TABLE IF NOT EXISTS `28_2024_parameter_livrables_promoteur` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `id_attribution_seance` int NOT NULL,
  `etab_id` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `28_2024_parameter_livrables_promoteur`
--

INSERT INTO `28_2024_parameter_livrables_promoteur` (`id`, `name`, `id_attribution_seance`, `etab_id`) VALUES
(1, 'Faire une cartographie des parties prenantes', 1, NULL),
(2, 'Contacter les parties prenantes et concrétiser les partenariats', 2, NULL),
(3, 'Elaborer les fiches de postes et l’organigramme de l’entreprise', 3, NULL),
(4, 'Définir les tests et les techniques d’embauche\r\n', 4, NULL),
(5, 'Elaborer la grille de salaire', 4, NULL),
(6, 'Elaborer la charte de communication interne (1ère version)', 5, NULL),
(7, 'Elaborer un registre des risques relatif au projet (catégories de risques : internes ou externes,\r\nniveau d’importance)', 6, NULL),
(8, 'Choisir l’approche de gestion des risques appropriée', 7, NULL),
(9, 'Dépôt du brevet d’invention (ou certificat ou autres)', 8, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `28_2024_parcours`
--

DROP TABLE IF EXISTS `28_2024_parcours`;
CREATE TABLE IF NOT EXISTS `28_2024_parcours` (
  `id` int NOT NULL AUTO_INCREMENT,
  `etablissement_id` int DEFAULT NULL,
  `diplome` varchar(255) NOT NULL,
  `date_debut` date NOT NULL,
  `date_fin` date NOT NULL,
  `etudiant_id` int DEFAULT NULL,
  `etab_id` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `28_2024_parcours`
--

INSERT INTO `28_2024_parcours` (`id`, `etablissement_id`, `diplome`, `date_debut`, `date_fin`, `etudiant_id`, `etab_id`) VALUES
(5, 6, 'Master', '2018-06-17', '2024-10-30', 1, NULL),
(6, 6, 'BTP', '2024-10-17', '2024-10-30', 1, NULL),
(7, 7, 'LMD', '2020-01-01', '2023-06-02', 8, NULL),
(9, 1, 'BTP', '2020-09-15', '2023-06-06', 15, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `28_2024_phases_initiateur`
--

DROP TABLE IF EXISTS `28_2024_phases_initiateur`;
CREATE TABLE IF NOT EXISTS `28_2024_phases_initiateur` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `num` int NOT NULL,
  `etab_id` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `28_2024_phases_initiateur`
--

INSERT INTO `28_2024_phases_initiateur` (`id`, `nom`, `num`, `etab_id`) VALUES
(1, 'Profiling', 1, NULL),
(2, 'Validation de l’idée du projet', 2, NULL),
(3, 'Elaboration du Business Model', 3, NULL),
(4, 'Elaboration du plan d’affaires', 4, NULL),
(5, 'Pitching', 5, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `28_2024_phases_innovateur`
--

DROP TABLE IF EXISTS `28_2024_phases_innovateur`;
CREATE TABLE IF NOT EXISTS `28_2024_phases_innovateur` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `num` int NOT NULL,
  `etab_id` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `28_2024_phases_innovateur`
--

INSERT INTO `28_2024_phases_innovateur` (`id`, `nom`, `num`, `etab_id`) VALUES
(1, 'Gestion du projet', 1, NULL),
(2, 'Elaboration de plan de communication', 2, NULL),
(3, 'Validation du Prototype', 3, NULL),
(4, 'Stratégie commerciale', 4, NULL),
(5, 'Elaboration du schéma de financement et d’investissement', 5, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `28_2024_phases_promoteur`
--

DROP TABLE IF EXISTS `28_2024_phases_promoteur`;
CREATE TABLE IF NOT EXISTS `28_2024_phases_promoteur` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `num` int NOT NULL,
  `etab_id` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `28_2024_phases_promoteur`
--

INSERT INTO `28_2024_phases_promoteur` (`id`, `nom`, `num`, `etab_id`) VALUES
(1, 'Partenariat et collaboration avec les\r\nparties prenantes', 1, NULL),
(2, 'Management de l’équipe', 2, NULL),
(3, 'Gestion des risques', 3, NULL),
(4, 'Démarches juridiques', 4, NULL),
(5, 'Accompagnement à l’incubation', 5, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `28_2024_pieces_jointes`
--

DROP TABLE IF EXISTS `28_2024_pieces_jointes`;
CREATE TABLE IF NOT EXISTS `28_2024_pieces_jointes` (
  `id` int NOT NULL AUTO_INCREMENT,
  `path` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `project_id` int NOT NULL,
  `etab_id` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `28_2024_pieces_jointes`
--

INSERT INTO `28_2024_pieces_jointes` (`id`, `path`, `type`, `project_id`, `etab_id`) VALUES
(1, 'note_ped (1).pdf', 'application/pdf', 2, NULL),
(2, 'payment.PNG', 'image/png', 2, NULL),
(3, 'note_ped (1).pdf', 'application/pdf', 3, NULL),
(7, 'logoESEN.png', 'image/png', 3, NULL),
(8, 'peeso.jpg', 'image/jpeg', 4, NULL),
(9, '1esen4 (1).pdf', 'application/pdf', 4, NULL),
(10, 'cas.pdf', 'application/pdf', 4, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `28_2024_projects`
--

DROP TABLE IF EXISTS `28_2024_projects`;
CREATE TABLE IF NOT EXISTS `28_2024_projects` (
  `id` int NOT NULL AUTO_INCREMENT,
  `domaine_id` int DEFAULT NULL,
  `description` text NOT NULL,
  `business_plan` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `id_appel_condidature` int NOT NULL,
  `titre` varchar(255) NOT NULL,
  `id_tuteur` int DEFAULT NULL,
  `affecte` tinyint(1) NOT NULL,
  `date_envoi` date DEFAULT NULL,
  `isGroup` tinyint(1) NOT NULL DEFAULT '0',
  `besoin_project` text NOT NULL,
  `solution_project` text NOT NULL,
  `clients_potentiels` text NOT NULL,
  `offre` int NOT NULL,
  `genre_project` varchar(255) NOT NULL,
  `link_vid` varchar(255) NOT NULL,
  `creation_step` varchar(255) NOT NULL,
  `programme_accompagnent` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `motivation_letter` text NOT NULL,
  `etudiant_id` int NOT NULL,
  `is_finished` tinyint(1) NOT NULL DEFAULT '0',
  `date_finition` date NOT NULL,
  `niveau` varchar(255) NOT NULL DEFAULT 'en_attente',
  `1er_validation` tinyint(1) NOT NULL DEFAULT '0',
  `date_comite` datetime NOT NULL,
  `lieu_comite` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `bilan_initiateur_ready` tinyint(1) NOT NULL DEFAULT '0',
  `etab_id` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `28_2024_projects`
--

INSERT INTO `28_2024_projects` (`id`, `domaine_id`, `description`, `business_plan`, `id_appel_condidature`, `titre`, `id_tuteur`, `affecte`, `date_envoi`, `isGroup`, `besoin_project`, `solution_project`, `clients_potentiels`, `offre`, `genre_project`, `link_vid`, `creation_step`, `programme_accompagnent`, `motivation_letter`, `etudiant_id`, `is_finished`, `date_finition`, `niveau`, `1er_validation`, `date_comite`, `lieu_comite`, `bilan_initiateur_ready`, `etab_id`) VALUES
(7, NULL, '', NULL, 5, 'Mon Projet', 2, 1, NULL, 1, 'A quel besoin votre projet répond-il ? : \r\n                    ', 'Quelle solution apporte votre projet à ce besoin ? :   ', 'Qui sont vos clients potentiels? :\r\n                    ', 0, 'Transmission d\'activité familiale', 'https://www.youtube.com/watch?v=XoXA8nSKHr0&t=5s', 'le business plan est élaboré', NULL, 'Quelle est votre motivation pour intégrer le PEESo (100 mots au maximum) ? : Je suis Trés Motivé\r\n                    ', 1, 0, '2024-10-31', 'initiateur', 1, '0000-00-00 00:00:00', '', 0, NULL),
(9, NULL, '', NULL, 1, 'nouveau projetc ,ew', NULL, 1, NULL, 0, 'psum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also t\r\n                    ', 'psum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also t\r\n                    ', 'psum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also t\r\n                    ', 0, 'Transmission d\'activité familiale', 'youtub/com', 'le business plan est élaboré', NULL, 'psum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also t\r\n                    ', 1, 0, '0000-00-00', 'non', 1, '0000-00-00 00:00:00', '', 0, NULL),
(10, NULL, '', NULL, 6, 'Projet Agriculture', NULL, 0, NULL, 0, '\r\n               testtttttttttttttttttt     ', '\r\n                    testttttttttttttttttttttttttt', '\r\n                    testtttttttttttttttttttttttt', 0, 'Une création d\'activité', 'https://www.youtube.com/shorts/TBM4KBObuBg', 'le business plan est élaboré', NULL, '\r\n                    testtttttttttttt tewttttttttttttttttttt testtttttttttttttttttt testtttttttttttttt testtttttttttttttt testttttttttttttttttttttttt tetstttttttttttttt testttttttttt testttttttttttttttttt testtttttttttttttttttt testtttttttttttttttttttttttttttttttt', 8, 0, '0000-00-00', 'non', 1, '0000-00-00 00:00:00', '', 0, NULL),
(11, NULL, '', NULL, 7, 'Projet test', 5, 1, NULL, 0, '\r\n                    tesththdfjfhfhghgf', '\r\n                    testhfghfghgdhdghdgh', '\r\n                    testhfghgfjhgkjgkfjkjk', 0, 'Transmission d\'activité familiale', 'www.testryshstdh.com', 'juste une idée', NULL, '\r\n                    tfyreygvubftffg', 8, 0, '0000-00-00', 'en_attente', 1, '0000-00-00 00:00:00', '', 0, NULL),
(12, NULL, '', NULL, 7, 'Project de Musique', 5, 1, NULL, 0, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled\r\n                    ', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled\r\n                    ', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled\r\n                    ', 0, 'Une création d\'activité', 'https://www.youtube.com/watch?v=XoXA8nSKHr0&t=5s', 'le business plan est élaboré', NULL, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled\r\n                    ', 9, 0, '0000-00-00', 'innovateur', 1, '0000-00-00 00:00:00', '', 0, NULL),
(13, NULL, '', NULL, 6, 'Project De Test 1', 5, 1, NULL, 0, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It ', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It \r\n                    ', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It \r\n                    ', 0, 'Transmission d\'activité familiale', 'https://www.youtube.com/watch?v=QFaFIcGhPoM', 'le business plan est élaboré', NULL, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It \r\n                    ', 9, 0, '0000-00-00', 'promoteur', 1, '0000-00-00 00:00:00', '', 0, NULL),
(14, NULL, '', NULL, 1, 'Projet De Ala', 5, 1, NULL, 0, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essent', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essent\r\n                    ', '\r\n     Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essent               ', 0, 'Transmission d\'activité familiale', 'https://www.youtube.com/watch?v=QFaFIcGhPoM', 'le business plan est élaboré', NULL, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essent\r\n                    ', 13, 0, '0000-00-00', 'incubateur', 1, '0000-00-00 00:00:00', '', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `28_2024_projects_domaines`
--

DROP TABLE IF EXISTS `28_2024_projects_domaines`;
CREATE TABLE IF NOT EXISTS `28_2024_projects_domaines` (
  `id` int NOT NULL AUTO_INCREMENT,
  `project_id` int NOT NULL,
  `domaine_id` int NOT NULL,
  `etab_id` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `28_2024_projects_domaines`
--

INSERT INTO `28_2024_projects_domaines` (`id`, `project_id`, `domaine_id`, `etab_id`) VALUES
(16, 3, 1, NULL),
(17, 3, 2, NULL),
(18, 4, 1, NULL),
(19, 5, 1, NULL),
(20, 6, 1, NULL),
(21, 7, 1, NULL),
(22, 8, 2, NULL),
(23, 9, 2, NULL),
(24, 9, 3, NULL),
(25, 10, 1, NULL),
(26, 11, 3, NULL),
(27, 12, 3, NULL),
(28, 12, 9, NULL),
(29, 13, 2, NULL),
(30, 14, 3, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `28_2024_randez_vous`
--

DROP TABLE IF EXISTS `28_2024_randez_vous`;
CREATE TABLE IF NOT EXISTS `28_2024_randez_vous` (
  `id` int NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `date_debut` datetime NOT NULL,
  `date_fin` datetime NOT NULL,
  `created_at` date NOT NULL,
  `meet_link` varchar(255) DEFAULT NULL,
  `calender_link` varchar(255) DEFAULT NULL,
  `seance_id` int DEFAULT NULL,
  `programme_id` int DEFAULT NULL,
  `lieu` varchar(255) DEFAULT NULL,
  `added_by` int NOT NULL,
  `etab_id` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `28_2024_randez_vous`
--

INSERT INTO `28_2024_randez_vous` (`id`, `titre`, `description`, `date_debut`, `date_fin`, `created_at`, `meet_link`, `calender_link`, `seance_id`, `programme_id`, `lieu`, `added_by`, `etab_id`) VALUES
(1, 'Seance Devops', 'Introduction a CI\\CD', '2024-11-30 01:43:00', '2024-11-30 05:43:00', '0000-00-00', 'https://meet.google.com/fsu-botf-oby', 'https://www.google.com/calendar/event?eid=cmU1ZDdkM3JudjU1djEwdHQydGtiamZpZTRfMjAyNDEyMzBUMDgwMDAwWiBhbGFyb21kaGFuaTAzMTFAbQ', NULL, NULL, 'Tunis', 13, NULL),
(2, 'Seance Devops', 'Seance Devops Seance Devops', '2024-11-23 18:21:00', '2024-11-23 18:25:00', '0000-00-00', 'https://meet.google.com/hat-pubt-cvb', 'https://www.google.com/calendar/event?eid=MmJpM3UzNHEwNzd1NmJyMzc2bjgyMmdraGdfMjAyNDEyMzBUMDgwMDAwWiBhbGEucm9tMDMxMUBt', 8, NULL, 'Tunis', 13, NULL),
(3, 'Seance 1', 'Seance 1 Intro pour  test', '2024-11-23 15:27:00', '2024-11-23 21:23:00', '0000-00-00', 'https://meet.google.com/jyf-razg-yse', 'https://www.google.com/calendar/event?eid=ODlwMHBlbW1rYmp0NTJuazZpbWg4Y2txbWdfMjAyNDEyMzBUMDgwMDAwWiBhbGFyb21kaGFuaTAzMTFAbQ', 9, NULL, 'Tunis', 13, NULL),
(4, 'Séance1', '1er séance de testing', '2024-11-28 10:00:00', '2024-11-28 12:00:00', '0000-00-00', NULL, NULL, 27, NULL, 'Sousse', 2, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `28_2024_randez_vous_users`
--

DROP TABLE IF EXISTS `28_2024_randez_vous_users`;
CREATE TABLE IF NOT EXISTS `28_2024_randez_vous_users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `randez_vous_id` int NOT NULL,
  `etab_id` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `28_2024_randez_vous_users`
--

INSERT INTO `28_2024_randez_vous_users` (`id`, `user_id`, `randez_vous_id`, `etab_id`) VALUES
(1, 22, 1, NULL),
(2, 27, 1, NULL),
(3, 22, 2, NULL),
(4, 22, 3, NULL),
(5, 27, 3, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `28_2024_seances`
--

DROP TABLE IF EXISTS `28_2024_seances`;
CREATE TABLE IF NOT EXISTS `28_2024_seances` (
  `id` int NOT NULL AUTO_INCREMENT,
  `formation_id` int NOT NULL,
  `nom` varchar(255) NOT NULL,
  `ordre` int NOT NULL,
  `date_debut` datetime DEFAULT NULL,
  `date_fin` datetime DEFAULT NULL,
  `ended` tinyint(1) NOT NULL DEFAULT '0',
  `coaching_id` int NOT NULL,
  `etab_id` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `28_2024_seances`
--

INSERT INTO `28_2024_seances` (`id`, `formation_id`, `nom`, `ordre`, `date_debut`, `date_fin`, `ended`, `coaching_id`, `etab_id`) VALUES
(8, 10, 'Introduction', 1, '2024-11-30 13:21:00', '2024-11-21 15:27:00', 0, 0, NULL),
(9, 11, 'Introduction', 1, '2024-11-21 14:40:00', '2024-11-22 23:40:00', 0, 0, NULL),
(10, 10, 'Integration Continue /Livraison Contenu', 2, '2024-11-21 14:40:00', '2024-11-21 14:40:00', 0, 0, NULL),
(11, 12, 'Introduction', 1, '2024-11-21 13:41:00', '2024-11-21 18:41:00', 0, 0, NULL),
(12, 13, 'Introduction', 1, '2025-01-22 13:47:00', '2025-01-01 13:47:00', 0, 0, NULL),
(13, 13, 'Talking To A client', 2, '2024-11-01 15:48:00', '2024-11-30 17:48:00', 0, 0, NULL),
(14, 13, 'Marché Client', 3, '2024-11-30 18:48:00', '2024-11-30 19:53:00', 0, 0, NULL),
(15, 14, 'Introduction', 1, '2024-11-22 17:04:00', '2024-11-22 14:05:00', 0, 0, NULL),
(16, 14, 'Peeso C\'est Quoi', 2, '2024-11-22 15:05:00', '2024-11-22 20:05:00', 0, 0, NULL),
(17, 14, 'Seance 3', 3, '2024-11-22 18:06:00', '2024-11-22 18:06:00', 0, 0, NULL),
(18, 14, 'Seance4', 4, '2024-11-23 19:11:00', '2024-11-23 20:11:00', 0, 0, NULL),
(19, 10, '1er séance', 1, '2024-11-30 21:18:00', '2024-11-30 13:18:00', 0, 0, NULL),
(20, 10, '2eme séance', 2, '2024-12-03 22:18:00', '2024-12-03 12:19:00', 0, 0, NULL),
(21, 10, '3eme séance', 3, '2024-12-06 22:19:00', '2024-12-06 12:19:00', 0, 0, NULL),
(22, 13, 'séance1', 1, '2024-11-28 10:00:00', '2024-11-28 12:00:00', 0, 0, NULL),
(23, 13, 'séance2', 2, '2024-11-29 10:00:00', '2024-11-29 12:00:00', 0, 0, NULL),
(24, 13, 'séance3', 3, '2024-11-30 10:00:00', '2024-11-30 12:00:00', 0, 0, NULL),
(25, 14, 'séance1', 1, '2024-11-28 10:00:00', '2024-11-28 12:00:00', 0, 0, NULL),
(26, 14, 'séance2', 2, '2024-11-29 10:00:00', '2024-11-29 12:00:00', 0, 0, NULL),
(27, 15, 'séance1', 1, '2024-11-28 10:00:00', '2024-11-28 12:00:00', 0, 0, NULL),
(28, 15, 'séance2', 2, '2024-11-29 10:00:00', '2024-11-29 12:00:00', 0, 0, NULL),
(29, 0, 'séance1', 1, '2024-11-30 12:00:00', '2024-11-30 14:00:00', 0, 1, NULL),
(30, 0, 'séance2', 2, '2024-12-01 12:00:00', '2024-12-01 14:00:00', 0, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `28_2024_seance_group`
--

DROP TABLE IF EXISTS `28_2024_seance_group`;
CREATE TABLE IF NOT EXISTS `28_2024_seance_group` (
  `id` int NOT NULL AUTO_INCREMENT,
  `seance_id` int NOT NULL,
  `group_id` int NOT NULL,
  `ended` tinyint(1) NOT NULL DEFAULT '0',
  `started` tinyint(1) NOT NULL DEFAULT '0',
  `etab_id` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `28_2024_seance_group`
--

INSERT INTO `28_2024_seance_group` (`id`, `seance_id`, `group_id`, `ended`, `started`, `etab_id`) VALUES
(1, 5, 3, 0, 1, NULL),
(2, 6, 3, 0, 1, NULL),
(3, 7, 3, 0, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `28_2024_seance_initiateur`
--

DROP TABLE IF EXISTS `28_2024_seance_initiateur`;
CREATE TABLE IF NOT EXISTS `28_2024_seance_initiateur` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_attribution_seance` int NOT NULL,
  `id_projet` int NOT NULL,
  `id_tuteur` int DEFAULT NULL,
  `date` date DEFAULT NULL,
  `lieu` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `observation` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `signature` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `realise` tinyint(1) NOT NULL DEFAULT '0',
  `etab_id` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=327 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `28_2024_seance_initiateur`
--

INSERT INTO `28_2024_seance_initiateur` (`id`, `id_attribution_seance`, `id_projet`, `id_tuteur`, `date`, `lieu`, `observation`, `signature`, `realise`, `etab_id`) VALUES
(1, 1, 7, 2, '2024-10-14', 'Manzah 6', '\r\n                             \r\n                             Trés Bien\r\n                                                                                                      ', '', 1, NULL),
(2, 2, 7, 2, '2024-10-16', 'Parc mana3rech wiin', 'Vous pouver se concentrer sur l\'identification des Problémes\r\n                                                    ', 'signature.png', 1, NULL),
(3, 3, 7, 2, '2024-10-17', 'tunis', '\r\n                             mlkjhgfds                       ', 'logo time2022-11-23 033629.png', 1, NULL),
(6, 6, 7, 2, '2024-11-12', 'Tunis', 'Seance Good\r\n                                                    ', 'signature.png', 1, NULL),
(7, 7, 7, 2, '2024-11-13', 'Tunis', 'Tunis Good\r\n                                                    ', 'signature.png', 1, NULL),
(8, 8, 7, 2, '2024-10-30', 'Tunis', 'Very Good', 'signature.png', 1, NULL),
(9, 9, 7, 2, '2024-11-13', 'Tunis', 'Very good\r\n                                                    ', 'signature.png', 1, NULL),
(10, 10, 7, 2, '2024-11-13', 'Tunis', 'Very good\r\n                                                    ', 'signature.png', 1, NULL),
(11, 11, 7, 2, '2024-11-12', 'Tunis', 'Very good\r\n                                                    ', 'signature.png', 1, NULL),
(12, 12, 7, 2, NULL, NULL, NULL, NULL, 0, NULL),
(13, 13, 7, 2, NULL, NULL, NULL, NULL, 0, NULL),
(14, 14, 7, 2, NULL, NULL, NULL, NULL, 0, NULL),
(15, 1, 10, 1, NULL, NULL, NULL, NULL, 0, NULL),
(16, 2, 10, 1, NULL, NULL, NULL, NULL, 0, NULL),
(17, 3, 10, 1, NULL, NULL, NULL, NULL, 0, NULL),
(18, 6, 10, 1, NULL, NULL, NULL, NULL, 0, NULL),
(19, 7, 10, 1, NULL, NULL, NULL, NULL, 0, NULL),
(20, 8, 10, 1, NULL, NULL, NULL, NULL, 0, NULL),
(21, 9, 10, 1, NULL, NULL, NULL, NULL, 0, NULL),
(22, 10, 10, 1, NULL, NULL, NULL, NULL, 0, NULL),
(23, 11, 10, 1, NULL, NULL, NULL, NULL, 0, NULL),
(24, 12, 10, 1, NULL, NULL, NULL, NULL, 0, NULL),
(25, 13, 10, 1, NULL, NULL, NULL, NULL, 0, NULL),
(26, 14, 10, 1, NULL, NULL, NULL, NULL, 0, NULL),
(39, 1, 12, 5, '2024-11-11', 'Tunis', '\r\n    Observation et Avis :                                                ', 'signature.png', 1, NULL),
(40, 2, 12, 5, '2024-11-14', 'Date', '\r\n                             Date\r\n                                                                             ', 'signature.png', 1, NULL),
(41, 3, 12, 5, '2024-11-13', 'Date', '\r\n                             \r\n                            Date                                                 ', 'signature.png', 1, NULL),
(42, 6, 12, 5, NULL, NULL, NULL, NULL, 0, NULL),
(43, 7, 12, 5, NULL, NULL, NULL, NULL, 0, NULL),
(44, 8, 12, 5, NULL, NULL, NULL, NULL, 0, NULL),
(45, 9, 12, 5, NULL, NULL, NULL, NULL, 0, NULL),
(46, 10, 12, 5, NULL, NULL, NULL, NULL, 0, NULL),
(47, 11, 12, 5, NULL, NULL, NULL, NULL, 0, NULL),
(48, 12, 12, 5, NULL, NULL, NULL, NULL, 0, NULL),
(49, 13, 12, 5, NULL, NULL, NULL, NULL, 0, NULL),
(50, 14, 12, 5, NULL, NULL, NULL, NULL, 0, NULL),
(51, 1, 11, 5, '2024-11-05', 'Tunis', 'Observation et Avis :\r\n                                                    ', 'signature.png', 0, NULL),
(52, 2, 11, 5, NULL, NULL, NULL, NULL, 0, NULL),
(53, 3, 11, 5, NULL, NULL, NULL, NULL, 0, NULL),
(54, 6, 11, 5, NULL, NULL, NULL, NULL, 0, NULL),
(55, 7, 11, 5, NULL, NULL, NULL, NULL, 0, NULL),
(56, 8, 11, 5, NULL, NULL, NULL, NULL, 0, NULL),
(57, 9, 11, 5, NULL, NULL, NULL, NULL, 0, NULL),
(58, 10, 11, 5, NULL, NULL, NULL, NULL, 0, NULL),
(59, 11, 11, 5, NULL, NULL, NULL, NULL, 0, NULL),
(60, 12, 11, 5, NULL, NULL, NULL, NULL, 0, NULL),
(61, 13, 11, 5, NULL, NULL, NULL, NULL, 0, NULL),
(62, 14, 11, 5, NULL, NULL, NULL, NULL, 0, NULL),
(63, 1, 13, 5, '2024-11-06', 'Tunis', '\r\n                               Observation et Avis :                                                ', 'signature.png', 1, NULL),
(64, 2, 13, 5, NULL, NULL, NULL, NULL, 0, NULL),
(65, 3, 13, 5, NULL, NULL, NULL, NULL, 0, NULL),
(66, 6, 13, 5, NULL, NULL, NULL, NULL, 0, NULL),
(67, 7, 13, 5, NULL, NULL, NULL, NULL, 0, NULL),
(68, 8, 13, 5, NULL, NULL, NULL, NULL, 0, NULL),
(69, 9, 13, 5, NULL, NULL, NULL, NULL, 0, NULL),
(70, 10, 13, 5, NULL, NULL, NULL, NULL, 0, NULL),
(71, 11, 13, 5, NULL, NULL, NULL, NULL, 0, NULL),
(72, 12, 13, 5, NULL, NULL, NULL, NULL, 0, NULL),
(73, 13, 13, 5, NULL, NULL, NULL, NULL, 0, NULL),
(74, 14, 13, 5, NULL, NULL, NULL, NULL, 0, NULL),
(75, 1, 14, 5, '2024-11-21', 'Tunis', '\r\n           Observation et Avis :                                         ', 'signature.png', 1, NULL),
(76, 2, 14, 5, NULL, NULL, NULL, NULL, 0, NULL),
(77, 3, 14, 5, NULL, NULL, NULL, NULL, 0, NULL),
(78, 6, 14, 5, NULL, NULL, NULL, NULL, 0, NULL),
(79, 7, 14, 5, NULL, NULL, NULL, NULL, 0, NULL),
(80, 8, 14, 5, NULL, NULL, NULL, NULL, 0, NULL),
(81, 9, 14, 5, NULL, NULL, NULL, NULL, 0, NULL),
(82, 10, 14, 5, NULL, NULL, NULL, NULL, 0, NULL),
(83, 11, 14, 5, NULL, NULL, NULL, NULL, 0, NULL),
(84, 12, 14, 5, NULL, NULL, NULL, NULL, 0, NULL),
(85, 13, 14, 5, NULL, NULL, NULL, NULL, 0, NULL),
(86, 14, 14, 5, NULL, NULL, NULL, NULL, 0, NULL),
(87, 1, 10, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(88, 2, 10, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(89, 3, 10, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(90, 6, 10, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(91, 7, 10, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(92, 8, 10, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(93, 9, 10, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(94, 10, 10, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(95, 11, 10, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(96, 12, 10, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(97, 13, 10, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(98, 14, 10, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(99, 1, 11, 5, NULL, NULL, NULL, NULL, 0, NULL),
(100, 2, 11, 5, NULL, NULL, NULL, NULL, 0, NULL),
(101, 3, 11, 5, NULL, NULL, NULL, NULL, 0, NULL),
(102, 6, 11, 5, NULL, NULL, NULL, NULL, 0, NULL),
(103, 7, 11, 5, NULL, NULL, NULL, NULL, 0, NULL),
(104, 8, 11, 5, NULL, NULL, NULL, NULL, 0, NULL),
(105, 9, 11, 5, NULL, NULL, NULL, NULL, 0, NULL),
(106, 10, 11, 5, NULL, NULL, NULL, NULL, 0, NULL),
(107, 11, 11, 5, NULL, NULL, NULL, NULL, 0, NULL),
(108, 12, 11, 5, NULL, NULL, NULL, NULL, 0, NULL),
(109, 13, 11, 5, NULL, NULL, NULL, NULL, 0, NULL),
(110, 14, 11, 5, NULL, NULL, NULL, NULL, 0, NULL),
(111, 1, 11, 5, NULL, NULL, NULL, NULL, 0, NULL),
(112, 2, 11, 5, NULL, NULL, NULL, NULL, 0, NULL),
(113, 3, 11, 5, NULL, NULL, NULL, NULL, 0, NULL),
(114, 6, 11, 5, NULL, NULL, NULL, NULL, 0, NULL),
(115, 7, 11, 5, NULL, NULL, NULL, NULL, 0, NULL),
(116, 8, 11, 5, NULL, NULL, NULL, NULL, 0, NULL),
(117, 9, 11, 5, NULL, NULL, NULL, NULL, 0, NULL),
(118, 10, 11, 5, NULL, NULL, NULL, NULL, 0, NULL),
(119, 11, 11, 5, NULL, NULL, NULL, NULL, 0, NULL),
(120, 12, 11, 5, NULL, NULL, NULL, NULL, 0, NULL),
(121, 13, 11, 5, NULL, NULL, NULL, NULL, 0, NULL),
(122, 14, 11, 5, NULL, NULL, NULL, NULL, 0, NULL),
(123, 1, 11, 5, NULL, NULL, NULL, NULL, 0, NULL),
(124, 2, 11, 5, NULL, NULL, NULL, NULL, 0, NULL),
(125, 3, 11, 5, NULL, NULL, NULL, NULL, 0, NULL),
(126, 6, 11, 5, NULL, NULL, NULL, NULL, 0, NULL),
(127, 7, 11, 5, NULL, NULL, NULL, NULL, 0, NULL),
(128, 8, 11, 5, NULL, NULL, NULL, NULL, 0, NULL),
(129, 9, 11, 5, NULL, NULL, NULL, NULL, 0, NULL),
(130, 10, 11, 5, NULL, NULL, NULL, NULL, 0, NULL),
(131, 11, 11, 5, NULL, NULL, NULL, NULL, 0, NULL),
(132, 12, 11, 5, NULL, NULL, NULL, NULL, 0, NULL),
(133, 13, 11, 5, NULL, NULL, NULL, NULL, 0, NULL),
(134, 14, 11, 5, NULL, NULL, NULL, NULL, 0, NULL),
(135, 1, 11, 5, NULL, NULL, NULL, NULL, 0, NULL),
(136, 2, 11, 5, NULL, NULL, NULL, NULL, 0, NULL),
(137, 3, 11, 5, NULL, NULL, NULL, NULL, 0, NULL),
(138, 6, 11, 5, NULL, NULL, NULL, NULL, 0, NULL),
(139, 7, 11, 5, NULL, NULL, NULL, NULL, 0, NULL),
(140, 8, 11, 5, NULL, NULL, NULL, NULL, 0, NULL),
(141, 9, 11, 5, NULL, NULL, NULL, NULL, 0, NULL),
(142, 10, 11, 5, NULL, NULL, NULL, NULL, 0, NULL),
(143, 11, 11, 5, NULL, NULL, NULL, NULL, 0, NULL),
(144, 12, 11, 5, NULL, NULL, NULL, NULL, 0, NULL),
(145, 13, 11, 5, NULL, NULL, NULL, NULL, 0, NULL),
(146, 14, 11, 5, NULL, NULL, NULL, NULL, 0, NULL),
(147, 1, 11, 5, NULL, NULL, NULL, NULL, 0, NULL),
(148, 2, 11, 5, NULL, NULL, NULL, NULL, 0, NULL),
(149, 3, 11, 5, NULL, NULL, NULL, NULL, 0, NULL),
(150, 6, 11, 5, NULL, NULL, NULL, NULL, 0, NULL),
(151, 7, 11, 5, NULL, NULL, NULL, NULL, 0, NULL),
(152, 8, 11, 5, NULL, NULL, NULL, NULL, 0, NULL),
(153, 9, 11, 5, NULL, NULL, NULL, NULL, 0, NULL),
(154, 10, 11, 5, NULL, NULL, NULL, NULL, 0, NULL),
(155, 11, 11, 5, NULL, NULL, NULL, NULL, 0, NULL),
(156, 12, 11, 5, NULL, NULL, NULL, NULL, 0, NULL),
(157, 13, 11, 5, NULL, NULL, NULL, NULL, 0, NULL),
(158, 14, 11, 5, NULL, NULL, NULL, NULL, 0, NULL),
(159, 1, 11, 5, NULL, NULL, NULL, NULL, 0, NULL),
(160, 2, 11, 5, NULL, NULL, NULL, NULL, 0, NULL),
(161, 3, 11, 5, NULL, NULL, NULL, NULL, 0, NULL),
(162, 6, 11, 5, NULL, NULL, NULL, NULL, 0, NULL),
(163, 7, 11, 5, NULL, NULL, NULL, NULL, 0, NULL),
(164, 8, 11, 5, NULL, NULL, NULL, NULL, 0, NULL),
(165, 9, 11, 5, NULL, NULL, NULL, NULL, 0, NULL),
(166, 10, 11, 5, NULL, NULL, NULL, NULL, 0, NULL),
(167, 11, 11, 5, NULL, NULL, NULL, NULL, 0, NULL),
(168, 12, 11, 5, NULL, NULL, NULL, NULL, 0, NULL),
(169, 13, 11, 5, NULL, NULL, NULL, NULL, 0, NULL),
(170, 14, 11, 5, NULL, NULL, NULL, NULL, 0, NULL),
(171, 1, 11, 5, NULL, NULL, NULL, NULL, 0, NULL),
(172, 2, 11, 5, NULL, NULL, NULL, NULL, 0, NULL),
(173, 3, 11, 5, NULL, NULL, NULL, NULL, 0, NULL),
(174, 6, 11, 5, NULL, NULL, NULL, NULL, 0, NULL),
(175, 7, 11, 5, NULL, NULL, NULL, NULL, 0, NULL),
(176, 8, 11, 5, NULL, NULL, NULL, NULL, 0, NULL),
(177, 9, 11, 5, NULL, NULL, NULL, NULL, 0, NULL),
(178, 10, 11, 5, NULL, NULL, NULL, NULL, 0, NULL),
(179, 11, 11, 5, NULL, NULL, NULL, NULL, 0, NULL),
(180, 12, 11, 5, NULL, NULL, NULL, NULL, 0, NULL),
(181, 13, 11, 5, NULL, NULL, NULL, NULL, 0, NULL),
(182, 14, 11, 5, NULL, NULL, NULL, NULL, 0, NULL),
(183, 1, 11, 5, NULL, NULL, NULL, NULL, 0, NULL),
(184, 2, 11, 5, NULL, NULL, NULL, NULL, 0, NULL),
(185, 3, 11, 5, NULL, NULL, NULL, NULL, 0, NULL),
(186, 6, 11, 5, NULL, NULL, NULL, NULL, 0, NULL),
(187, 7, 11, 5, NULL, NULL, NULL, NULL, 0, NULL),
(188, 8, 11, 5, NULL, NULL, NULL, NULL, 0, NULL),
(189, 9, 11, 5, NULL, NULL, NULL, NULL, 0, NULL),
(190, 10, 11, 5, NULL, NULL, NULL, NULL, 0, NULL),
(191, 11, 11, 5, NULL, NULL, NULL, NULL, 0, NULL),
(192, 12, 11, 5, NULL, NULL, NULL, NULL, 0, NULL),
(193, 13, 11, 5, NULL, NULL, NULL, NULL, 0, NULL),
(194, 14, 11, 5, NULL, NULL, NULL, NULL, 0, NULL),
(195, 1, 11, 5, NULL, NULL, NULL, NULL, 0, NULL),
(196, 2, 11, 5, NULL, NULL, NULL, NULL, 0, NULL),
(197, 3, 11, 5, NULL, NULL, NULL, NULL, 0, NULL),
(198, 6, 11, 5, NULL, NULL, NULL, NULL, 0, NULL),
(199, 7, 11, 5, NULL, NULL, NULL, NULL, 0, NULL),
(200, 8, 11, 5, NULL, NULL, NULL, NULL, 0, NULL),
(201, 9, 11, 5, NULL, NULL, NULL, NULL, 0, NULL),
(202, 10, 11, 5, NULL, NULL, NULL, NULL, 0, NULL),
(203, 11, 11, 5, NULL, NULL, NULL, NULL, 0, NULL),
(204, 12, 11, 5, NULL, NULL, NULL, NULL, 0, NULL),
(205, 13, 11, 5, NULL, NULL, NULL, NULL, 0, NULL),
(206, 14, 11, 5, NULL, NULL, NULL, NULL, 0, NULL),
(207, 1, 11, 5, NULL, NULL, NULL, NULL, 0, NULL),
(208, 2, 11, 5, NULL, NULL, NULL, NULL, 0, NULL),
(209, 3, 11, 5, NULL, NULL, NULL, NULL, 0, NULL),
(210, 6, 11, 5, NULL, NULL, NULL, NULL, 0, NULL),
(211, 7, 11, 5, NULL, NULL, NULL, NULL, 0, NULL),
(212, 8, 11, 5, NULL, NULL, NULL, NULL, 0, NULL),
(213, 9, 11, 5, NULL, NULL, NULL, NULL, 0, NULL),
(214, 10, 11, 5, NULL, NULL, NULL, NULL, 0, NULL),
(215, 11, 11, 5, NULL, NULL, NULL, NULL, 0, NULL),
(216, 12, 11, 5, NULL, NULL, NULL, NULL, 0, NULL),
(217, 13, 11, 5, NULL, NULL, NULL, NULL, 0, NULL),
(218, 14, 11, 5, NULL, NULL, NULL, NULL, 0, NULL),
(219, 1, 11, 5, NULL, NULL, NULL, NULL, 0, NULL),
(220, 2, 11, 5, NULL, NULL, NULL, NULL, 0, NULL),
(221, 3, 11, 5, NULL, NULL, NULL, NULL, 0, NULL),
(222, 6, 11, 5, NULL, NULL, NULL, NULL, 0, NULL),
(223, 7, 11, 5, NULL, NULL, NULL, NULL, 0, NULL),
(224, 8, 11, 5, NULL, NULL, NULL, NULL, 0, NULL),
(225, 9, 11, 5, NULL, NULL, NULL, NULL, 0, NULL),
(226, 10, 11, 5, NULL, NULL, NULL, NULL, 0, NULL),
(227, 11, 11, 5, NULL, NULL, NULL, NULL, 0, NULL),
(228, 12, 11, 5, NULL, NULL, NULL, NULL, 0, NULL),
(229, 13, 11, 5, NULL, NULL, NULL, NULL, 0, NULL),
(230, 14, 11, 5, NULL, NULL, NULL, NULL, 0, NULL),
(231, 1, 11, 5, NULL, NULL, NULL, NULL, 0, NULL),
(232, 2, 11, 5, NULL, NULL, NULL, NULL, 0, NULL),
(233, 3, 11, 5, NULL, NULL, NULL, NULL, 0, NULL),
(234, 6, 11, 5, NULL, NULL, NULL, NULL, 0, NULL),
(235, 7, 11, 5, NULL, NULL, NULL, NULL, 0, NULL),
(236, 8, 11, 5, NULL, NULL, NULL, NULL, 0, NULL),
(237, 9, 11, 5, NULL, NULL, NULL, NULL, 0, NULL),
(238, 10, 11, 5, NULL, NULL, NULL, NULL, 0, NULL),
(239, 11, 11, 5, NULL, NULL, NULL, NULL, 0, NULL),
(240, 12, 11, 5, NULL, NULL, NULL, NULL, 0, NULL),
(241, 13, 11, 5, NULL, NULL, NULL, NULL, 0, NULL),
(242, 14, 11, 5, NULL, NULL, NULL, NULL, 0, NULL),
(243, 1, 11, 5, NULL, NULL, NULL, NULL, 0, NULL),
(244, 2, 11, 5, NULL, NULL, NULL, NULL, 0, NULL),
(245, 3, 11, 5, NULL, NULL, NULL, NULL, 0, NULL),
(246, 6, 11, 5, NULL, NULL, NULL, NULL, 0, NULL),
(247, 7, 11, 5, NULL, NULL, NULL, NULL, 0, NULL),
(248, 8, 11, 5, NULL, NULL, NULL, NULL, 0, NULL),
(249, 9, 11, 5, NULL, NULL, NULL, NULL, 0, NULL),
(250, 10, 11, 5, NULL, NULL, NULL, NULL, 0, NULL),
(251, 11, 11, 5, NULL, NULL, NULL, NULL, 0, NULL),
(252, 12, 11, 5, NULL, NULL, NULL, NULL, 0, NULL),
(253, 13, 11, 5, NULL, NULL, NULL, NULL, 0, NULL),
(254, 14, 11, 5, NULL, NULL, NULL, NULL, 0, NULL),
(255, 1, 11, 5, NULL, NULL, NULL, NULL, 0, NULL),
(256, 2, 11, 5, NULL, NULL, NULL, NULL, 0, NULL),
(257, 3, 11, 5, NULL, NULL, NULL, NULL, 0, NULL),
(258, 6, 11, 5, NULL, NULL, NULL, NULL, 0, NULL),
(259, 7, 11, 5, NULL, NULL, NULL, NULL, 0, NULL),
(260, 8, 11, 5, NULL, NULL, NULL, NULL, 0, NULL),
(261, 9, 11, 5, NULL, NULL, NULL, NULL, 0, NULL),
(262, 10, 11, 5, NULL, NULL, NULL, NULL, 0, NULL),
(263, 11, 11, 5, NULL, NULL, NULL, NULL, 0, NULL),
(264, 12, 11, 5, NULL, NULL, NULL, NULL, 0, NULL),
(265, 13, 11, 5, NULL, NULL, NULL, NULL, 0, NULL),
(266, 14, 11, 5, NULL, NULL, NULL, NULL, 0, NULL),
(267, 1, 11, 5, NULL, NULL, NULL, NULL, 0, NULL),
(268, 2, 11, 5, NULL, NULL, NULL, NULL, 0, NULL),
(269, 3, 11, 5, NULL, NULL, NULL, NULL, 0, NULL),
(270, 6, 11, 5, NULL, NULL, NULL, NULL, 0, NULL),
(271, 7, 11, 5, NULL, NULL, NULL, NULL, 0, NULL),
(272, 8, 11, 5, NULL, NULL, NULL, NULL, 0, NULL),
(273, 9, 11, 5, NULL, NULL, NULL, NULL, 0, NULL),
(274, 10, 11, 5, NULL, NULL, NULL, NULL, 0, NULL),
(275, 11, 11, 5, NULL, NULL, NULL, NULL, 0, NULL),
(276, 12, 11, 5, NULL, NULL, NULL, NULL, 0, NULL),
(277, 13, 11, 5, NULL, NULL, NULL, NULL, 0, NULL),
(278, 14, 11, 5, NULL, NULL, NULL, NULL, 0, NULL),
(279, 1, 11, 5, NULL, NULL, NULL, NULL, 0, NULL),
(280, 2, 11, 5, NULL, NULL, NULL, NULL, 0, NULL),
(281, 3, 11, 5, NULL, NULL, NULL, NULL, 0, NULL),
(282, 6, 11, 5, NULL, NULL, NULL, NULL, 0, NULL),
(283, 7, 11, 5, NULL, NULL, NULL, NULL, 0, NULL),
(284, 8, 11, 5, NULL, NULL, NULL, NULL, 0, NULL),
(285, 9, 11, 5, NULL, NULL, NULL, NULL, 0, NULL),
(286, 10, 11, 5, NULL, NULL, NULL, NULL, 0, NULL),
(287, 11, 11, 5, NULL, NULL, NULL, NULL, 0, NULL),
(288, 12, 11, 5, NULL, NULL, NULL, NULL, 0, NULL),
(289, 13, 11, 5, NULL, NULL, NULL, NULL, 0, NULL),
(290, 14, 11, 5, NULL, NULL, NULL, NULL, 0, NULL),
(291, 1, 11, 5, NULL, NULL, NULL, NULL, 0, NULL),
(292, 2, 11, 5, NULL, NULL, NULL, NULL, 0, NULL),
(293, 3, 11, 5, NULL, NULL, NULL, NULL, 0, NULL),
(294, 6, 11, 5, NULL, NULL, NULL, NULL, 0, NULL),
(295, 7, 11, 5, NULL, NULL, NULL, NULL, 0, NULL),
(296, 8, 11, 5, NULL, NULL, NULL, NULL, 0, NULL),
(297, 9, 11, 5, NULL, NULL, NULL, NULL, 0, NULL),
(298, 10, 11, 5, NULL, NULL, NULL, NULL, 0, NULL),
(299, 11, 11, 5, NULL, NULL, NULL, NULL, 0, NULL),
(300, 12, 11, 5, NULL, NULL, NULL, NULL, 0, NULL),
(301, 13, 11, 5, NULL, NULL, NULL, NULL, 0, NULL),
(302, 14, 11, 5, NULL, NULL, NULL, NULL, 0, NULL),
(303, 1, 11, 5, NULL, NULL, NULL, NULL, 0, NULL),
(304, 2, 11, 5, NULL, NULL, NULL, NULL, 0, NULL),
(305, 3, 11, 5, NULL, NULL, NULL, NULL, 0, NULL),
(306, 6, 11, 5, NULL, NULL, NULL, NULL, 0, NULL),
(307, 7, 11, 5, NULL, NULL, NULL, NULL, 0, NULL),
(308, 8, 11, 5, NULL, NULL, NULL, NULL, 0, NULL),
(309, 9, 11, 5, NULL, NULL, NULL, NULL, 0, NULL),
(310, 10, 11, 5, NULL, NULL, NULL, NULL, 0, NULL),
(311, 11, 11, 5, NULL, NULL, NULL, NULL, 0, NULL),
(312, 12, 11, 5, NULL, NULL, NULL, NULL, 0, NULL),
(313, 13, 11, 5, NULL, NULL, NULL, NULL, 0, NULL),
(314, 14, 11, 5, NULL, NULL, NULL, NULL, 0, NULL),
(315, 1, 11, 5, NULL, NULL, NULL, NULL, 0, NULL),
(316, 2, 11, 5, NULL, NULL, NULL, NULL, 0, NULL),
(317, 3, 11, 5, NULL, NULL, NULL, NULL, 0, NULL),
(318, 6, 11, 5, NULL, NULL, NULL, NULL, 0, NULL),
(319, 7, 11, 5, NULL, NULL, NULL, NULL, 0, NULL),
(320, 8, 11, 5, NULL, NULL, NULL, NULL, 0, NULL),
(321, 9, 11, 5, NULL, NULL, NULL, NULL, 0, NULL),
(322, 10, 11, 5, NULL, NULL, NULL, NULL, 0, NULL),
(323, 11, 11, 5, NULL, NULL, NULL, NULL, 0, NULL),
(324, 12, 11, 5, NULL, NULL, NULL, NULL, 0, NULL),
(325, 13, 11, 5, NULL, NULL, NULL, NULL, 0, NULL),
(326, 14, 11, 5, NULL, NULL, NULL, NULL, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `28_2024_seance_innovateur`
--

DROP TABLE IF EXISTS `28_2024_seance_innovateur`;
CREATE TABLE IF NOT EXISTS `28_2024_seance_innovateur` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_attribution_seance` int NOT NULL,
  `id_projet` int NOT NULL,
  `id_tuteur` int DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `lieu` varchar(255) DEFAULT NULL,
  `observation` text,
  `signature` varchar(255) DEFAULT NULL,
  `realise` tinyint(1) NOT NULL DEFAULT '0',
  `etab_id` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=77 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `28_2024_seance_innovateur`
--

INSERT INTO `28_2024_seance_innovateur` (`id`, `id_attribution_seance`, `id_projet`, `id_tuteur`, `date`, `lieu`, `observation`, `signature`, `realise`, `etab_id`) VALUES
(1, 1, 7, 2, '2024-11-06 00:00:00', 'Lieu', 'Rnadez Vous Seance realise\r\n                                                    ', 'signature.png', 1, NULL),
(2, 2, 7, 2, '2024-11-20 12:29:00', 'Tunis', 'Observation\r\n                                                    ', 'signature.png', 1, NULL),
(3, 3, 7, 2, '2024-11-21 12:31:00', 'Tunis', 'Observation\r\n                                                    ', 'signature.png', 1, NULL),
(4, 4, 7, 2, '2024-11-13 23:38:00', 'Tunis', 'Observation seance 4\r\n                                                    ', 'logo_meet.png', 1, NULL),
(5, 5, 7, 2, NULL, NULL, NULL, NULL, 0, NULL),
(6, 6, 7, 2, NULL, NULL, NULL, NULL, 0, NULL),
(7, 7, 7, 2, NULL, NULL, NULL, NULL, 0, NULL),
(8, 8, 7, 2, NULL, NULL, NULL, NULL, 0, NULL),
(9, 9, 7, 2, NULL, NULL, NULL, NULL, 0, NULL),
(10, 10, 7, 2, NULL, NULL, NULL, NULL, 0, NULL),
(11, 11, 7, 2, NULL, NULL, NULL, NULL, 0, NULL),
(12, 12, 7, 2, NULL, NULL, NULL, NULL, 0, NULL),
(13, 13, 7, 2, NULL, NULL, NULL, NULL, 0, NULL),
(14, 14, 7, 2, NULL, NULL, NULL, NULL, 0, NULL),
(15, 15, 7, 2, NULL, NULL, NULL, NULL, 0, NULL),
(16, 16, 7, 2, NULL, NULL, NULL, NULL, 0, NULL),
(17, 17, 7, 2, NULL, NULL, NULL, NULL, 0, NULL),
(18, 18, 7, 2, NULL, NULL, NULL, NULL, 0, NULL),
(19, 19, 7, 2, NULL, NULL, NULL, NULL, 0, NULL),
(20, 1, 12, 5, '2024-11-07 22:35:00', 'Tunis', 'Observation et Avis :\r\n                                                    ', 'signature.png', 1, NULL),
(21, 2, 12, 5, NULL, NULL, NULL, NULL, 0, NULL),
(22, 3, 12, 5, NULL, NULL, NULL, NULL, 0, NULL),
(23, 4, 12, 5, NULL, NULL, NULL, NULL, 0, NULL),
(24, 5, 12, 5, NULL, NULL, NULL, NULL, 0, NULL),
(25, 6, 12, 5, NULL, NULL, NULL, NULL, 0, NULL),
(26, 7, 12, 5, NULL, NULL, NULL, NULL, 0, NULL),
(27, 8, 12, 5, NULL, NULL, NULL, NULL, 0, NULL),
(28, 9, 12, 5, NULL, NULL, NULL, NULL, 0, NULL),
(29, 10, 12, 5, NULL, NULL, NULL, NULL, 0, NULL),
(30, 11, 12, 5, NULL, NULL, NULL, NULL, 0, NULL),
(31, 12, 12, 5, NULL, NULL, NULL, NULL, 0, NULL),
(32, 13, 12, 5, NULL, NULL, NULL, NULL, 0, NULL),
(33, 14, 12, 5, NULL, NULL, NULL, NULL, 0, NULL),
(34, 15, 12, 5, NULL, NULL, NULL, NULL, 0, NULL),
(35, 16, 12, 5, NULL, NULL, NULL, NULL, 0, NULL),
(36, 17, 12, 5, NULL, NULL, NULL, NULL, 0, NULL),
(37, 18, 12, 5, NULL, NULL, NULL, NULL, 0, NULL),
(38, 19, 12, 5, NULL, NULL, NULL, NULL, 0, NULL),
(39, 1, 13, 5, '2024-10-31 00:23:00', 'Tunis', 'Observation et Avis :Observation et Avis :\r\n                                                    ', 'signature.png', 1, NULL),
(40, 2, 13, 5, NULL, NULL, NULL, NULL, 0, NULL),
(41, 3, 13, 5, NULL, NULL, NULL, NULL, 0, NULL),
(42, 4, 13, 5, NULL, NULL, NULL, NULL, 0, NULL),
(43, 5, 13, 5, NULL, NULL, NULL, NULL, 0, NULL),
(44, 6, 13, 5, NULL, NULL, NULL, NULL, 0, NULL),
(45, 7, 13, 5, NULL, NULL, NULL, NULL, 0, NULL),
(46, 8, 13, 5, NULL, NULL, NULL, NULL, 0, NULL),
(47, 9, 13, 5, NULL, NULL, NULL, NULL, 0, NULL),
(48, 10, 13, 5, NULL, NULL, NULL, NULL, 0, NULL),
(49, 11, 13, 5, NULL, NULL, NULL, NULL, 0, NULL),
(50, 12, 13, 5, NULL, NULL, NULL, NULL, 0, NULL),
(51, 13, 13, 5, NULL, NULL, NULL, NULL, 0, NULL),
(52, 14, 13, 5, NULL, NULL, NULL, NULL, 0, NULL),
(53, 15, 13, 5, NULL, NULL, NULL, NULL, 0, NULL),
(54, 16, 13, 5, NULL, NULL, NULL, NULL, 0, NULL),
(55, 17, 13, 5, NULL, NULL, NULL, NULL, 0, NULL),
(56, 18, 13, 5, NULL, NULL, NULL, NULL, 0, NULL),
(57, 19, 13, 5, NULL, NULL, NULL, NULL, 0, NULL),
(58, 1, 14, 5, NULL, NULL, NULL, NULL, 0, NULL),
(59, 2, 14, 5, NULL, NULL, NULL, NULL, 0, NULL),
(60, 3, 14, 5, NULL, NULL, NULL, NULL, 0, NULL),
(61, 4, 14, 5, NULL, NULL, NULL, NULL, 0, NULL),
(62, 5, 14, 5, NULL, NULL, NULL, NULL, 0, NULL),
(63, 6, 14, 5, NULL, NULL, NULL, NULL, 0, NULL),
(64, 7, 14, 5, NULL, NULL, NULL, NULL, 0, NULL),
(65, 8, 14, 5, NULL, NULL, NULL, NULL, 0, NULL),
(66, 9, 14, 5, NULL, NULL, NULL, NULL, 0, NULL),
(67, 10, 14, 5, NULL, NULL, NULL, NULL, 0, NULL),
(68, 11, 14, 5, NULL, NULL, NULL, NULL, 0, NULL),
(69, 12, 14, 5, NULL, NULL, NULL, NULL, 0, NULL),
(70, 13, 14, 5, NULL, NULL, NULL, NULL, 0, NULL),
(71, 14, 14, 5, NULL, NULL, NULL, NULL, 0, NULL),
(72, 15, 14, 5, NULL, NULL, NULL, NULL, 0, NULL),
(73, 16, 14, 5, NULL, NULL, NULL, NULL, 0, NULL),
(74, 17, 14, 5, NULL, NULL, NULL, NULL, 0, NULL),
(75, 18, 14, 5, NULL, NULL, NULL, NULL, 0, NULL),
(76, 19, 14, 5, NULL, NULL, NULL, NULL, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `28_2024_seance_promoteur`
--

DROP TABLE IF EXISTS `28_2024_seance_promoteur`;
CREATE TABLE IF NOT EXISTS `28_2024_seance_promoteur` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_attribution_seance` int NOT NULL,
  `id_projet` int NOT NULL,
  `date` datetime DEFAULT NULL,
  `lieu` varchar(255) DEFAULT NULL,
  `observation` text,
  `signature` varchar(255) DEFAULT NULL,
  `realise` tinyint(1) NOT NULL DEFAULT '0',
  `etab_id` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `28_2024_seance_promoteur`
--

INSERT INTO `28_2024_seance_promoteur` (`id`, `id_attribution_seance`, `id_projet`, `date`, `lieu`, `observation`, `signature`, `realise`, `etab_id`) VALUES
(17, 1, 7, '2024-11-15 22:43:00', 'Place pasteur', 'observation\r\n                                                    ', 'signature.png', 1, NULL),
(18, 2, 7, '2024-11-11 01:58:00', 'ssxsx', '\r\n       Observation et Avis :                                             ', 'signature.png', 1, NULL),
(19, 3, 7, '2024-11-28 10:59:00', 'drggd', '\r\n                             \r\n       Observation et Avis :                                                                      ', 'signature.png', 0, NULL),
(20, 4, 7, NULL, NULL, NULL, NULL, 0, NULL),
(21, 5, 7, NULL, NULL, NULL, NULL, 0, NULL),
(22, 6, 7, NULL, NULL, NULL, NULL, 0, NULL),
(23, 7, 7, NULL, NULL, NULL, NULL, 0, NULL),
(24, 8, 7, NULL, NULL, NULL, NULL, 0, NULL),
(25, 1, 12, NULL, NULL, NULL, NULL, 0, NULL),
(26, 2, 12, NULL, NULL, NULL, NULL, 0, NULL),
(27, 3, 12, NULL, NULL, NULL, NULL, 0, NULL),
(28, 4, 12, NULL, NULL, NULL, NULL, 0, NULL),
(29, 5, 12, NULL, NULL, NULL, NULL, 0, NULL),
(30, 6, 12, NULL, NULL, NULL, NULL, 0, NULL),
(31, 7, 12, NULL, NULL, NULL, NULL, 0, NULL),
(32, 8, 12, NULL, NULL, NULL, NULL, 0, NULL),
(41, 1, 13, NULL, NULL, NULL, NULL, 0, NULL),
(42, 2, 13, NULL, NULL, NULL, NULL, 0, NULL),
(43, 3, 13, NULL, NULL, NULL, NULL, 0, NULL),
(44, 4, 13, NULL, NULL, NULL, NULL, 0, NULL),
(45, 5, 13, NULL, NULL, NULL, NULL, 0, NULL),
(46, 6, 13, NULL, NULL, NULL, NULL, 0, NULL),
(47, 7, 13, NULL, NULL, NULL, NULL, 0, NULL),
(48, 8, 13, NULL, NULL, NULL, NULL, 0, NULL),
(49, 1, 14, NULL, NULL, NULL, NULL, 0, NULL),
(50, 2, 14, NULL, NULL, NULL, NULL, 0, NULL),
(51, 3, 14, NULL, NULL, NULL, NULL, 0, NULL),
(52, 4, 14, NULL, NULL, NULL, NULL, 0, NULL),
(53, 5, 14, NULL, NULL, NULL, NULL, 0, NULL),
(54, 6, 14, NULL, NULL, NULL, NULL, 0, NULL),
(55, 7, 14, NULL, NULL, NULL, NULL, 0, NULL),
(56, 8, 14, NULL, NULL, NULL, NULL, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `28_2024_signature_etudiant`
--

DROP TABLE IF EXISTS `28_2024_signature_etudiant`;
CREATE TABLE IF NOT EXISTS `28_2024_signature_etudiant` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_seance` int NOT NULL,
  `id_etudiant` int NOT NULL,
  `signature` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `etab_id` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `28_2024_signature_etudiant`
--

INSERT INTO `28_2024_signature_etudiant` (`id`, `id_seance`, `id_etudiant`, `signature`, `etab_id`) VALUES
(1, 1, 1, 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAmwAAACgCAYAAACxIDDDAAAAAXNSR0IArs4c6QAAIABJREFUeF7tnV2M5Nh130lWdXVXj2fU3bujmZ7uriqyZzS7C8gStMDCzsIwZMubQDL8EAWBLBtIYgSIYcCwYQPOQ5AENuwHQzYMP/jB8YMNOIYRSIn1IMVwtErgj2AFJJKycTDanekmq1jV89UzU9M7H13FInnj21s1rmbfS15WkaxL8r+AYWibvPec37lV9d9z7z1HVfAPCIAACCRAoNVqeaqqaqqqckczTZP/xwRswBAgAAIgUFQC+PIsamThFwhkTEDXdV8NU2uKokCwZRwUTAcCIFAYAhBshQklHAGBxRKAYFssf8wOAiBQbAIQbMWOL7wDgcwIQLBlhhoTgQAIlJAABFsJgw6XQSANAhBsaVDFmCAAAiDwIQEINqwEEACBRAhAsCWCEYOAAAiAAJMABBsWBgiAQCIEINgSwYhBQAAEQACCDWsABEAgPQKGYfhRWXvcEk2PP0YGARAoNgFk2IodX3gHApkRQIYtM9SYCARAoIQEINhKGHS4DAJpEIgSbIQQxbIsfOekAR9jggAIFJ4AvjwLH2I4CALZEIgSbIqiENM0tWyswSwgAAIgUCwCEGzFiie8AYGFERAQbL5pmpWFGYiJQQAEQCDHBCDYchw8mA4CMhGIEmyu6w5t216RyWbYAgIgAAJ5IQDBlpdIwU4QkJxAlGA7Pj7+nTt37vyS5G7APBAAARCQkgAEm5RhgVEgkD8CUYINJT3yF1NYDAIgIA8BCDZ5YgFLQCDXBCDYch0+GA8CICA5AQg2yQME80AgLwQg2LKLlK7rw8ePHz/s9/tXspsVM4EACCySAATbIuljbhAoEAEItlSD+TONRuMPKpWKpqovvrZRJiVV5BgcBOQiAMEmVzxgDQjklkBEa6rSiYtWq+Wpqjpdd45YliVch+7SpUuDer1eUz/8h7kufN/32+02SqXk9lMDw0FAnAAEmzgrPAkCIBBCICLDVjrBxuIhcvGCbncqikKFmtB6I4TEEoJCg+IhEAAB6QiIfSNIZzYMAgEQkI1ARIbNM02zKpvNadoTV7BdvXp12fO8Y246jWMsIcS3LAtZtjSDibFBQAICEGwSBAEmgEARCIQJNk3TOnt7e60i+CnqQxzB1mq1fE3TZvo+vnTp0u++8847vyhqF54DARDIJ4GZviDy6SqsBgEQSJNA2JaoaZqvKoryXprzyza2iGDTdT14zo3lBnEcx+/1elWWsBPZZpWNDewBARCITwCCLT4zvAECIMAgECHYSvddEybYtra2nOXl5aWwheT7PqlWq2/v7e29NXnOMAwSfAeCDR9HECgHgdJ9iZYjrPASBLInwNsSJYQolmWV7ruGxWM4HI5qtdpS1IUCQohjWdZyMIpBweZ5Hul0OsI3T7NfFZgRBEAgKQKl+xJNChzGAQEQOE0g7AxbGbNAUXXpguuHCtvRaOTRrU/W2rpw4cL9l19++eL03wghzy3LOoe1CAIgUHwCEGzFjzE8BIFMCLC26+jEZc2wxRFsIqU5guOVlWsmixmTgICEBCDYJAwKTAKBPBLgCTaq2UzTLN22nYhgGwu1LymK8q+jYh7MYEKwRRHD30GgWAQg2IoVT3gDAgsjECLYXNM0Qw/YL8zoFCbe2to6Xl5eXgkbmoot3/ePO53OqqgJQb70UkK73S6dEBblhedAoGgEINiKFlH4AwKLIfBHhmH8M9bUo9Hoz7vd7mcXY1ams35J1/VfFih8G7uI8Kc+9ak/fvz48U9Pe/Ps2bPhvXv3QoVhpt5jMhAAgVQJQLCliheDg0A5CDQaDbdarTKr7ZfhwkFEl4fgIoi9RUz7kmqadiqbVgau5fj0wEsQECMAwSbGCU+BAAiEECjrDdHt7W2HlumIszhm2coUKcIbxwY8CwIgkD8CEGz5ixksBgHpCJRRsLVaLVdVVU1gC/RUvGa5LKDrOgnUboudpZNu0cAgEACBWAQg2GLhwsMgAAIsAgxB8eKxIm7d7ezsOEtLS8zMGhVkjuPQArlVnpiLy4Rx4cBrt9vMem1YoSAAAsUkAMFWzLjCKxDIlEBIDTZiWVahbjI2m83nlUqlzgHsm6Z5cpYvrKzHcDh8fnBwIFTw1jAMV1GUU+cD4wq+TBcDJgMBEEiFAARbKlgxKAiUiwBPsHme53U6ncJkgl577bXa8fHxkNVaaizU/EnkI+qwCW9psrabIdjK9fmCtyBACUCwYR2AAAjMRWBzc3NUr9eZomw0Gh11u921uSaQ5+V/aRjGH7DMcRznf/V6vTem/5agYAs2fBcWe/KggyUgAALzEoBgm5cg3geBkhMIEyau6/4r27b/QxEQhWQRmQVww7jEuXgQnNd1Xd+2bWYJlSJwhg8gAAJsAhBsWBkgAAJzEQgTJkXZuuPdgh2NRqNut1tjAYxqTSXCRtf1kaqqp7KXwa3XuYKHl0EABHJDAIItN6GCoSAgJ4GQllSKiCiR06u/t6rVavmapp35rvR9P/SmZpRgE7l4wGJbBKayxxz2gYCMBCDYZIwKbAKBHBEIuSGqWJaV6+8YnlgjhPiWZYVuS0YJNkVRQs+iXbp0aXDu3LnlwFJ4cQs1R0sEpoIACCRAINdfpgn4jyFAAATmJBCSYcv14XhWOyiKihAiVKpkXsHG4trv93v9fn9nzpDhdRAAgRwSgGDLYdBgMgjIQkDX9Weqqq6y7PF932+327k8HM/rjRqnrVSUYAu7eLC5uTmo1+vB7FquBbAsaxZ2gEBeCUCw5TVysBsEJCDAy0JR0zzPG3Y6nRUJzIxlAq9MiWhmbTJZlGCjz/HOoyG7FitkeBgESkEAgq0UYYaTIJAOgbAeoo7jfLPX630mnZnTGZWT2aLboLHP44kINtbFA87ZNWTX0gk5RgWB3BCAYMtNqGAoCMhHoEg9RDc2Ntpra2vNIOVZxBodgyXY6FhRTdyRXZNvncMiEJCBAASbDFGADSCQUwJFKunB82XWMhph2cdJuIPbrMiu5fSDALNBIAMCEGwZQMYUIFBEArque6qqMhu7xz3vtWg+PLH24MGD/gcffLAxi32cDBtRAym2aUGI7NospPEOCJSDAARbOeIML0EgcQJh26GKouSmXhjPj2fPng3v3bs386UJlmBTVfU+IeSj08HwPM/vdDoVZNcSX6IYEAQKRQCCrVDhhDMgkB2BImyH8i4GHB8fu3fu3FmahyZrbJpNYwlE+u+RXZuHNt4FgeITgGArfozhIQgkToB3m3Iy0aznvhI3NGRAXhcD13U927ZP9e+cxa4QweYHt0UJIXR7OVizDjdDZwGPd0CgoAQg2AoaWLgFAmkSCCtZkYfzazz7kyz2yxNsNC5h2clJ3NDVIM0VjLFBIH8EINjyFzNYDAILJxB2fs1xnONer8fsfrBwwz8US56iKGcuS8TpYiDiR4Rg8xVFCfv+RXZNBPICnzEM4xYh5OqUCUItyxZoMqbOOQEItpwHEOaDwCII5Pn8GqvcRhpZwel5aP012obUsqwTobi5uXlcr9e5FxqQXVvEqo43p67rbnAbOw9HAeJ5iadlIgDBJlM0YAsI5IAA64dqYnYawidJJFREEXKmskYq2aygqA0W4A0RvanYkyRHjKUou7u7I0LIqbOOQWEOTiCQJAEItiRpYiwQKAGBsPNrSR3YTwsjSySllRVhzHVKiDUaDa9arZ7ZmkV2La3oJztu2H+4pLWmkvUAo+WNAARb3iIGe0FgwQTy3I4qKKKSvGQQDEuQEyHEtyzrxU1QTt01bkP4BYcd0wcIGIbxvqIo11hnESHYsFzSIADBlgZVjAkCBSXAExkTd2X+oWKV8TBN8y1FUb6RdLgajcZ/r1arn54e13Xd/2Hb9o9M/h0r20e31C5fvvw777zzzi8lbRPGS4dA2OWSdGbEqGUlAMFW1sjDbxCYgUDYdig9VG+aJrNV1QxTJf4Kr2Bt4hN92Pj9TNuuaTEbVsdO9nOAafDK85gQbHmOXr5sh2DLV7xgLQgslEDYduhwOPzuwcHBpxZqYMjkjEsAqZVh4GTzXnzfRtVhkzlTKWt8F2VX2G3gRdmEeYtJAIKtmHGFVyCQOIE8b4fquj5SVfXUjb7hcDg4ODioJw7qwwwbvYr6YujpG6JRXSLoS8HzbmnYiDGTIZDlRZZkLMYoeSUAwZbXyMFuEMiYQJ67G2S9bRV2QzQquzYWbIplWfh+zniNzzJd1G3gWcbEOyDAIoAvBKwLEAABIQJh26Gqqrr7+/tzNUsXMmLGh7L+UQ2ymtxG5WTXiO/7iqZpp76PXdf9wLbtj8zoMl7LiEBwbbmu+9i27fWMpsc0JSIAwVaiYMNVEJiVwObm5qher3Mbost+5irLch7r6+v76+vrxjTrhw8f9o6OjnZY2bVJ3TWGjaTdbkt7iWPWtVSk93Rdf0dV1R+Y9kn2z0KR+JfNFwi2skUc/paWQKvVmtxcJJ7nubZt10RhRG3jyfwjxbsA0Gq1nmqatkrPl9GbmaPRyDs4OBBmwmMX7FU6Ob/GOQP44mZt1tu2orHHc3wCUZdLwA4EkiQAwZYkTYwFAhITCPbQpEKCNjzvdDqhWRxW781pN9MsPpsETk69M6rRiKZpXN/HbYYUVVXpo8KijvcjHpZdo37quj5UVTUoGH3TNF8U202CB8ZIjgBEdnIsMVI0AQi2aEZ4AgRyTWCSWZu+tRh0yHVd37btM8Lg9ddf3+z3+7fDAJimuaYoypGskKKyg/PYPekdSW91ttvtky1jVg/R58+fD8+dO7ccmOtM3TrcOJwnGtm/m/XZyOw9xIwyEYBgkykasAUEUiAQUez2xYzjrTsq2vzJv4zKrtHnZN4O3dnZGS0tLXHP3qWAmzUkYbUvYvUMZRXcdRxn1Ov15t6qzcjXUk0TFGye53mdTmfR661UMSiTsxBsZYo2fC0lARHRNQ1mIhCazebzSqUSVadM6u4G1K+gYKXCNCzbmMIiYQk2LjdkbVKIQEpDMm6Iftm27X+a0nQYtuQEINhKvgDgfvEJsM6u0XNZrKzPhIaoqCGEOJZlBbf6pIIap1n95ubmg+Xl5XVCiFqpVOi5tZPvyKQFXlhhXJbAljmLKVWwMzSm1Wo5mqadKmWDOGUYgBJOBcFWwqDD5XIRmLod+kJ4TH5Y4mbfguTy8AMVdoZtFvuDoo7qOVGBy9wvpapQVenlgpOttPPnz/cuXry4FXhW+kxmmT5VrVbr/2ia9ok8fh7KFKei+QrBVrSIwh8QCBBYW1s72tjYuDD9rz3P8zudzsklg93d3REhJPa5m+l2SzJD59y+PDF5FsHG81XX9SeKonzfvNk4eiVVZQySpK0yx0t22wzD+I+KovzUtJ15+SzIzhb2hROAYMMKAYESEBC5fTi1dXhqu9T3/aGmaWe2Pfv9/lG/36c3RKX/h3fxgoojy7ISK06b5o1U3/e9yU1U6YEX1MCPfexjP+e67u+x3IOgLmjQJXILgk2iYMAUEEiLAGvrkyUAaOuk5eXlJVVVNZrkGdcqcwghkSUp0rI9qXHDzrLRfuuPHj16+Pjx44vzzBcl2GjdO9qCKskt1HnsxbvxCPDiC7EWjyOeno0ABNts3PAWCOSNwKphGM+CRov80HAKvuYmuzbxudFoeNVqNTKb5rruKE4XiGmmEYLt1Dk0uoVKCDkHAZePjxIvtoPB4N/fvn371/LhBazMMwEItjxHD7aDQAwCrCwbLeh69+7dFd4wrVZrwNgOze0B+KgM2DSHuFuQrB6i0+Ox6q5N/x0CLsZizvhRXnbW87wvdzodlPHIOB5lnQ6CrayRh9+lI9BsNn+rUqn88rTjUWe4ipJdm/gcR7BN3pm+oBG2aII9RAPPxha5SV1ioNu9juP4vV4v9sWS0n1IGA7zzj+6rvs927ZfAyMQyIoABFtWpDEPCEhAgJUpeO211z73ta997b8Gzdve3h7UarXcn12b9qvRaLjVanWm3pxjcbutKAqzVRerh+hkblVVnf39/dj16nZ2dtylpaUz9s57Bo5W5Ldt+1QNMQmWp3Qm8MSa7/tH7XY7FxdupIMKg2YmAME2Mzq8CAL5I9BoNJxqtXrmh5p1lq1o2TVelo2KH9rdgV62EIkoFW79fv/MBYWk672FZAVPsnVJbKFGZVhFeBT1mZAahY5pmrHFd1E5wa/sCECwZccaM4GAFARChAUt3nqSzWk0GoNqtVqo7NoEvq7rrqqqp7JW9PZmu92mIuiZqqq0HVfod+O46buiadpJ5iwsczcajbxutzvzdmQwK8qr+TWngCOj0ajX7XYbUizSBRvBWiNjk2JvbS/YFUxfIAIQbAUKJlwBARECrVbLpYJE0zTmjUlCyHNVVVeDY+Wp7loUB8G6dD6rgG3U2MG/i9zEDRvTMAwar1MCczgcPj84ODgX9t60gItjc9zLFnHGzsOzzWZzWKlUakFbJ6I+Dz7AxmISgGArZlzhFQiEEgjJIPDeK1RmgZUR4/0g884xiSwxz/NIp9OJLCUSNVYSDeHjCriybZdeu3bt0PO8lzmxKNT6j1pv+LucBCDY5IwLrAKB1Ans7u5+kxDy6ajtP2rIkydPjg4PDwt1yFokyzYdBJrpIoRU4rSeUlX1/+7v75/pORk3uKLboqLj6rru0eLIgs+TarX6ezdv3vx5wedz9Viz2byvadrFkLhCrOUqosU1FoKtuLGFZyAgRIBukWqaFnpzct5tPSFDMn6Ik2WM/HHe3t52lpaWaDeIWBbTjNWDBw+eP3ny5PtivagoCmtb1Pf9h+12m5cREppiZ2dntLS0JHq+jnZpONrb21sXGlzyh6KE2qSnaxHXvuShgXkcAvG+cYARBECgqAR2DcO4FZZtI4S4lmUJ3aTMC6S4WbZpv0QvKHBYUD1A+5h+QVGUL4vwSmJblDfP9evX3x2NRh8XybaOx/BM0xQVeiLuZfYMFWqVSiWyBVlS29mZOYaJCk8Agq3wIYaDICBGYGtri/YRjSpXQDNQtDOCIzaq3E/FOcvG8iSs9lpMzyOL27LKTKSR/YnpU2RGMiaH1B6POKN2al7Xdb9h2/ZbqRmDgUFgBgIQbDNAwysgUEQCcboAOI7jFaVyftBvXtkMVszjMBNdM+OiuOTw8PDU9un29rZbq9WCt0WfHhwcnBcdO85ztHMDIUQT2fqV+YICFWqu674c5Qfl7nkehFqcRYJnMyUAwZYpbkwGAnIS2NzcHNTr9ajsGs94Mr5hOVMHgUUTYWXZRARIWDP56czX+IA//a6d6fuWsn348OGJeEtzW5QXhytXrji0qLCI4KHPOI4z7PV63P60WcUbGbWsSGOerAjM9AWSlXGYBwRAIBsCrEyR4zhHvV5vLeYW2YnBVGRUKpXRLO2YsvH49CycTFnodh+vITh1f1KAmOXLLGVCJgKQNWca26Isu9fX1/96fX39TVHh6bqub9t25iIeGbVFfIIwZxYEINiyoIw5QEBiApyza6fEyvnz559evHgxtFArN/1GiKKq6uSQfeY/4CLo6Y1RWpw2mEXidSlYX18319fXddbYcQQUzWyurKzUogr0jjsrEFVVfUYR3dS2RXns6Hk6Qqg5Qj8hmZxzQ0ZNZKXjmTwTEPq05dlB2A4CIBBOgJVdGg6HRwcHB2fqrl2+fHmwurpKq8DP9d1xot4Ioe2gpBFwvN6RhJCBZVm0XdWLf0KyjqHihPZypSVUNE1TfZ9qL4WKWfp/Iq2w6K1SbRHborwV1Gw2vUqlIlTPjWZdj46O/me/3/+hJD+T165d+4rneZ8XGROXCUQo4RlZCcz1pSurU7ALBEBAjACnDpdQRuTChQtPXnrppXNjrTHzd8mkLycVcIveRuVdInj69Onb9+/f/7EJ1ZDLBpPyXacCML5IIBYUxlPTWbusbovGMVbX9Q8URTkvmHGjh/vdTqczV4mYkObsZ0yHUIsTTTwrK4GZv2RldQh2gQAIiBNgCY/nz58f3b17d6auBuOD+HT/MyppFGrk5KYkHUfcm2SeFBUdycwmNsrjx4/vPnr0aJM+zektmvm2KM9y0TN6NMa+7/udTkc4y9poNG5Vq9Vd0QwvhJrY+sJT+SCQ+ZdhPrDAShAoPgFehiLOGawoSrQrQK1Wq84r4KLmKeDfyfjyArM4rUzbojz2zWbTr1QqQr8xUY3V42TTqD0QagX8RMCl+c6hgB8IgEA+CaytrT3Z2Ng40yJpZWXlMzdu3PhmWl4ltY2aln1ZjBvcHh3vodKp6e1Soe4BMm6L8tjRsikVqtwiLihMLlZ8eLSxbcTNplGOnue9jYK3WaxizLEIAkL/9bMIwzAnCIBAegRmKWORkjVao9EYVavVmeuUpWTXXMOO71ScjKFpGv2ffpJtvdLqLTqX0xEvb25u3l9ZWaEFbBP73ZlsnZumKXTxIU3/MDYIpE0gsQ9O2oZifBAAgWQI0Ar2VEcER0tyK3QeSzc3N0f1er1Cb1Em+eM+i00i2iJOZ4RZbOC9k4dt0RDb6RXZeX5/yGg0+stut/vpJJliLBCQmcA8HxiZ/YJtIAACbAIfMwzj/eCfVFV18lLkNuvARp2fGmfPhA/OJ2V/0K5FCcd5/AkpPswcVqQDxTz24F0QkJkABJvM0YFtIJAwAc4NPqEyHgmbkqvhwnqGLiozOW55dSpTuihb4gRzd3f3XULIx2fNsFHRNhgMHty5c+ejcebFsyCQdwIQbHmPIOwHAUEC4xubZ2pf5eFHXtDFVB/jibZF8gvaRMtkyFSMeDogMbsjRMZy3Kzds21b6KJG5IB4AAQkJwDBJnmAYB4IJEWAJThc18UPngDgVqvlaZrGPdi+KNEm+zk2wzAaiqK0Y2TTaPHk7966detnWq3Wd2lHCIHwnPSubbfbuHggAgvP5JaA0Icht97BcBAAgRMCvGKmixIaeQtL1FmrRTU6Z8V1ETHd2dk5rlaryzSus1wUCTubRttfUbEseAHkpH1X3tYX7AUBEQIQbCKU8AwI5JjA2tra0cbGxoWgC0+ePDk8PDzEOaCI2L755pufvXPnztejloCqqsf7+/urUc8l+XfOOTbaV/O/JDkPHevy5cu/vbq6+guEECqe5v7toFkxz/OEb3rquj5SVVVo+3Nc0+2JZVln1n3SXDAeCGRFYO4PXVaGYh4QAIHZCEhUc202Bxb8Vkij9zOWLSK7lfQ5tp2dnb+pVCo/SJNak9ZgCeizF6zmvel5/fr1dx3HObm0EGUXFW70Fq+s5/oWvLQxfc4IQLDlLGAwFwTiEGBlYPJY/iGOz0k/yxK8R0dHN8+fP3+NccYq8xu3s55j03X9ASFkYyx6IsXPPFypSHNdVzibJjjXRwzD6IuejxsLxXVFUY4Ex8djICAVAQg2qcIBY0AgUQJfMAzjT6dHpGJN0zTUXBPEPC7iG9yGeyHKWGIu67pswXNsQUF+9erVP3dd9y2qyNJUZZOuA57nkeXl5f908+bNLwpinvsxXjFo1sBUuD19+vTtw8PDt+aeGAOAQIYEINgyhI2pQCBLApyCr5lngLL0Oem5eNm1hw8fXqdzra2tvbuxsfH9wXmzPM8WJlaCfUvn5TMRZeMuFCPLsk4uGsjyz/b29qBWqy2L+j0YDEa3b9+uyWI/7ACBMAIQbFgfIFBAAjs7O4OlpaUzP6aLOGOVV7ybm5uDer0eZHhG8PJKfqTJutFoDKrV6onQoOfMos5yzRIDeimAvlepVJ7s7+9/ZJYxFvXOxYsX/9v58+c/I7pdqiiKb5pm5t0qFsUH8+aTAARbPuMGq0EglABnq86zLEvolh3wnpRCoUroFAp6dm2SXZv+A+diQuxs5vXr1//McZx/qCgKFYonk0/ZkPj39fg25Ykw8zyvY9u2XrTYR7UWm/Z3fM6N1o7rFY0D/Mk/gcS/APKPBB6AQL4JYCs0mfgFRW/UZY04t3HpuTOGIEvGcM4oNGNGa/+qqnq4v79/KdXJJBzcMAyXJgwFTSNLS0t/+/77739C8Hk8BgKpE4BgSx0xJgCB7Ai0Wi1H0zRW+6l/pCjKX2RnSb5nYm1zRrV94p1n833fabfbp7ZW42R9ZiWpqupwf39/Zdb3i/re1atX+77v0y1eod+/0WjkdrvdM5+povKBX/ISEFqw8poPy0AABKYJcLI8OJ8Tc5lQwaaq6qnq+iJn0kTPs/E6T4iYOTlQP7kAQI+x0fNXSddjE7El78/EiQMhBEcK8h7wnNsPwZbzAMJ8EJgQYGVt5i1SCrofEtjd3R3t7+8LZVlEzrPNkGEjdEtzaWnp67du3foJVlxmrceGGPNbt7HYiAh3MAWBNAhAsKVBFWOCQMYEGo2GU61WWVuhP60oyp9kbE7pp+Nc+lAsyzr5zp1k8Cag4tzy5G3NBkUgGqLHX4atVsvVNC30nFvUWcb4s+INEBAjAMEmxglPgYDUBDhboZ5pmrgVuoDI8c6zjbcxz8Sl0Wjcq1arF+OW6KAZ1L8T6r9x69atfytLI/gF4E58yp2dHXtpaWk77Jzb8fHxvTt37lxOfHIMCAIcAhBsWBogkHMC2AqVM4Csc3BTlnJLfjSbTa9SqWhJeIXtu/kphp1z833fa7fb+I+i+TFjBAECEGwCkPAICMhKIGQr9GcVRfl9We0ui12NRsOrVqtc8eW67si2bW6lfXoebp6OUhBsyay0ra2twfLyMrOrQ9Tt4WQswCggIHitGaBAAATkJIBboXLGZdqqK1euPFxZWdngWSp6MYRzmUEEAK2/9s7e3t6bIg/jGTaB69evf3c0Gn2S9VfRGIItCMxDABm2eejhXRBYIAHOVk3s6voLdKFUU0eVkHj06NH/e/z48cdFoOi67imKcqrsSNR79PzcxsZG7dvf/vYo6ln8nUvgRw3DeJvzV3z2sHBSJQDBlipeDA4C6RDglYXAFlg6vJMaVdd1KpaqrFuhVFDR7bVOpyNajf/ELMMwhoqi0BvCzO/T1tNrAAAIKUlEQVTzYCN0z/Niz5GU/0UZJ6wsCz6DRYmyfH5AsMkXE1gEAqEEQn4scCs0J2snKttGt9gqlUpvb2+P9rUU+idqzOlBqIg7Pj7+o7t37/4LocHx0BkCYaLNdV3al7UFbCCQJAEItiRpYiwQSJGAruvPVFVd5UyB7ZgU2acxNK8rQnAukYxYsFH9pKk7/f+apnG/51Grbb7Iht3odV3XtW1bqNjyfFbg7bIQgGArS6ThZ24JiNwUxDZMbsNLtzSJoPX08sDB3t7ezuR52oGBlmJjvH9KwAcFXTDb5jjOewcHB68K2oHHpghsb2+7tVqNuY1NCPEty4q1xQ24IMAjAMGGtQECkhOIaGOEzJrk8RMxb3d395gQItSoPdBLlDk869YivahA+6Py7MFNR5FIsZ/Z2trqLS8vb7H+iizm7Fzx5mkCEGxYESAgOYEQwQaxJnns4ppnGIZLj6/FaVUVnCNCILyh6/q3aG03nm2+799vt9uX4tpe9udff/31X3306NG/46DFZ7XsCyQB/yHYEoCIIUAgTQKsw+Sqqjr7+/vMQp5p2oKxsyMQ9xIBFQqO44x6vR63EO/E+kajcVytVrkZPWSFZo9z2BY3ji7MzhVvonAu1gAISE9gUjB1XPbhuFKpfNU0zS9KbzgMTIQAbUiuqurJOSgqyujWZTBDJirUggZFiULXdQe2bdcTcaREg4QVOe73+3/V7/d/uEQ44GpCBJBhSwgkhgEBEACBtAlQgWVZlka3yR3H8Xu93tx9LFut1j1VVT/K2yVFtm22qPJukNL/8HJd93m32z0328h4q6wEINjKGnn4DQIgAAJTBKJaXzmO4yUhEMsEvdlsupVK5cwt0fHFEdRNLNNiSMBXCLYEIGIIEAABECgCga2tre/VarVXeNk2KjTq9fryjRs3nCL4m4UPuq4fqap6gTUXspdZRKA4c0CwFSeW8AQEQAAEEiEQUUrmpIVWu91GfTFB2pcvX/7y6urqP+E8jhukghzL/hgEW9lXAPwHARAAAQaBy5cv/2G9Xv/nYSVGfN9/t91ufxIAhQjsGoaxx3oSt0eF+JX+IQi20i8BAAABEAABPoGoFlrY1ou3enjZS4i2eBzL+DQEWxmjDp9BAARAICaBsG1SerbN87yhbdtC3RpiTl24x1ksa7Xad957773XC+csHEqMAARbYigxEAiAAAgUm0Cj0RhUKpXlkEsJxLKsf6AoyreKTWJ+74IFdtEabH6mRR8Bgq3oEYZ/IAACIJAwAYGCu75t27iUEMJd13VaAPnUE9gWTXihFmw4CLaCBRTugAAIgEAWBLa2tm7WarVrYZcS+v3+1/v9/o9nYU/e5mCJXtM06U3S/5w3X2BvNgQg2LLhjFlAAARAoJAE6KUEVVU1nnDzPI90Oh2tkM7P59TnDcP4SmAIlPiYj2mh34ZgK3R44RwIgAAIpE9gd3f3NwkhvxI2k+d5DzqdzsX0rcnPDKxG8dgWzU/8srYUgi1r4pgPBEAABApKYHt7263Vatyza+MSIA1FUXoFRRDLLVY7MAi2WAhL9TAEW6nCDWdBAARAIH0CUZcSFEXB1p+iKK+88sr/dhznVCkPQohvWRYubKS/THM3AwRb7kIGg0EABEBAfgLb29tHtVqN2UOTWk9rt9FSFsfHx3967969n5Lfo3QsRHmPdLgWcVQItiJGFT6BAAiAgCQEBLJtJ5a6ruvZtl2VxOzMzODcFsVvc2YRyM9EWBT5iRUsBQEQAIFcElhfX//a2tra5+hNUppZCysFQrNu9Xp95caNG04unY1p9JUrVwYrKyvL068NBoPh7du30TUiJsuiPw7BVvQIwz8QAAEQkITA1atXD3zfvyJiDhV2ruuOut1uTeT5PD/DuC2KM355DmhKtkOwpQQWw4IACIAACLAJ7OzsuNVqtRKWaQu8WWgBM931gGYYHz169K2joyPa4gv/gMALAhBsWAwgAAIgAAILIXDp0qU/WV1d/UlVXLmR0Wj0pNvtfmQhBqcwafAMG80saprm7O/vn9omTWFqDJkzAhBsOQsYzAUBEACBIhJoNBpetVqN0xEh91m3N954498cHh7+elCv+r7/++12+2eLGGf4NDsBCLbZ2eFNEAABEACBhAns7u5+hxDySUVRRH+fiOM4N3u93isJm5L6cIZh+Aw/cy9EUwdX0glEPxAlxQO3QQAEQAAEFkWAChpCiPCOqe/7w3a7Lf3tSroNSoUaaycYnQ4WtdrknxeCTf4YwUIQAAEQKDWBZrP5UNO0dVHlNi4dQs+7+d1uV4rabo1G4+SiRUQgPdM0pbC31AtOUuch2CQNDMwCARAAARA4S0C0EO/0m1TA0eYKqqr6WQqiV1999VuDweCNKKFJ21HRZ0zTjHOGD8ujZAQg2EoWcLgLAiAAAkUg0Gq1jjVNe7H9GVWQl+EzPfvm93q9xDNazWbTq1QqwuKrrF0eirAOs/QBgi1L2pgLBEAABEAgcQLjs2503KhkFnfucRZuLtvEq5N8OI3rur5t21HbpHPZhJeLQwCCrTixhCcgAAIgUHoChmEc+r7/kqZp6gxZtyz4kadPn371/v37/ziLyTBHcQhAsBUnlvAEBEAABEAgQEAiAYcLBVidcxGAYJsLH14GARAAARDIE4E0Bdx0Rm9y0cGyrCVFUbw8MYKtchKAYJMzLrAKBEAABEAgAwITATc+fzbvbyJtBUpbS/VN03wpA/MxRYkIzLs4S4QKroIACIAACIAACIDAYghAsC2GO2YFARAAARAAARAAAWEC/x/TXECgR1z/3wAAAABJRU5ErkJggg==data:image/png;base64,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b0JACACIYJO3QAgIASGQQgKNnntDxCeIaOtWQyCiJa7rLm21v/QTAkKgOwREsHWHs1gRAkJACLRFoFQqHUBEvPLGW6cTCXn5XJtlWfxxbguD7wUAh46Pj39ODt23QE+6CIEuExDB1mXgYk4ICAEh0C4BrfWewbbpXETcExG3aXZMz/N271bOt2Z9k+eFgBDYlIAINnkrhIAQEAJCQAgIASGQcgIi2FI+QeKeEBACQkAICAEhIAREsMk7IASEgBAQAkJACAiBlBMQwZbyCRL3hIAQEAJCQAgIASEggk3eASEgBISAEBACQkAIpJyACLaUT5C4JwSEgBAQAkJACAgBEWzyDggBISAEhIAQEAJCIOUERLClfILEPSEgBISAEBACQkAIiGCTd0AICAEhIASEgBAQAiknIIIt5RMk7gkBISAEhIAQEAJCQASbvANCQAgIASEgBISAEEg5ARFsKZ8gcU8ICAEhIASEgBAQAiLY5B0QAkJACAgBISAEhEDKCYhgS/kEiXtCQAgIASEgBISAEBDBJu+AEBACQkAICAEhIARSTkAEW8onSNwTAkJACAgBISAEhIAINnkHhIAQEAJCQAgIASGQcgIi2FI+QeKeEBACQkAICAEhIAREsMk7IASEgBAQAkJACAiBlBMQwZbyCRL3hIAQEAJCQAgIASEggk3eASEgBISAEBACQkAIpJyACLaUT5C4JwSEgBAQAkJACAgBEWzyDggBISAEhIAQEAJCIOUERLClfILEPSEgBISAEBACQkAI/H8F+7PrQ8tezwAAAABJRU5ErkJggg==', NULL),
(2, 2, 1, 'data:image/png;base64,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', NULL);
INSERT INTO `28_2024_signature_etudiant` (`id`, `id_seance`, `id_etudiant`, `signature`, `etab_id`) VALUES
(8, 1, 4, 'data:image/png;base64,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', NULL),
(9, 2, 4, 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAmwAAACgCAYAAACxIDDDAAAAAXNSR0IArs4c6QAAIABJREFUeF7tnQmYXFWVx8951d3pIIgIioYkXe++Sic0KioKuLAoKrgCOijuuOPoiKMjzKCOyoxhJK6AMBBcGBFFXEAEQYQAjoIiCIgx6dS7r7IQRTSIgmm7U+9MneZVz0tRy6uuvep/v6+/hNRdzv3dgvw5955zmNBAAARAoAcIGGN2J6LPEtFbiegBIrqLiA6pw/R1RLSijv7Vup5BRAcT0YXW2guJKN+keTENCIAACJQlwOACAiAAAt1OwHXdVzPzZ4hocczWTUS0NKHtfxeRB5l5z4T9q3Zj5u+LyCuiTg+IyIWpVOrCbDZ7ezPmxxwgAAIgUEoAgg3fCRAAga4lUOJVK2fnRmZeJyL3EdHsj/5ef4aGhv5Q/L21Vj1ytGjRol1GR0f3CcNwkeM4+zDzPiKyj35ERPpr8WeoBpT7iWiPMn1ugteta79OMAwEepoABFtPHx+MB4H+JVDBqza7YWa+hZk/kM1mb24FAdd1906lUvvk8/miqFtUFHfMPEFES2qsC69bKw4Gc4LAABOAYBvgw8fWQaAbCSTwqn3CWvvxTto+Nja2byqVehMRvZmInljDFnjdOnlYWBsE+oQABFufHCS2AQL9QGBsbMxNpVIfJqK3le6n1V61+fLzPO/4MAzfXLDvKHjd5ksR40AABGoRgGCrRQifgwAItI2A67projdpr2BmfVdWbB33qtWCAK9bLUL4HARAoBECEGyN0MNYEACBphEwxpxIROdGE2qQwO7d6lWrtWl43WoRwucgAAL1EoBgq5cY+oMACDSdwNKlS/cYGhqaJKK9YpP/2lr7lKYv1sYJ4XVrI2wsBQJ9TgCCrc8PGNsDgV4gYIw5u5CS4z0xW8MdO3Ys27Rpk+0F+5PYCK9bEkroAwIgUIkABBu+GyAAAh0lYIx5LhH9pMSIU621p3fUsBYtXofXbS0R/dZxnFOy2azfInMwLQiAQI8QgGDrkYOCmSDQrwQ8z7tBRA6L7e8ua+3+/brf+L5qeN2uJKKXEtE0EZ1irf38IDDBHkEABMoTgGDDNwMEQKBjBEoCDWbtEJGjgyD4fseM6sDCFbxuIRE5MXOuj4TbLztgIpYEARDoMAEItg4fAJYHgUElUCHQ4GJr7esHlYnuW71uIrKqpG5qHMlp1tqPDTIj7B0EBpEABNsgnjr2DAJdQKBcoEEqlVq2YcOGvgk0aASzMeYfiegMInpU6TzM/KswDE8JguDaRtbAWBAAgd4hAMHWO2cFS0GgbwgMWqDBfA/O87wlIqKi7fhyczDzWX//+99P2bJly/b5roFxIAACvUEAgq03zglWgkBfEfA87yMiopUM3kBEuxHRwAQazOcgjTGvjbxti8uM3+g4zsnZbPZb85kbY0AABHqDAARbb5wTrASBviLguq7PzEY3JSL3O45zuu/7+m4LrQKBiYmJXaempj5FRHpVWq59fWZm5uTNmzdvBUQQAIH+IwDB1n9nih2BQFcTGBsbe2IqlYqLinwh59oCIsp3teFdYpzneUdF16RPLmPSX5j5ZN/3z+sSc2EGCIBAkwhAsDUJJKYBARBIRsB1XS3sfnmxt9YL9X3/WclGo1eRgOd5/ykiH65A5KromvQ3IAYCINAfBCDY+uMcsQsQ6BkCpUJDRM4KguB9PbOBLjI0nU4flEqlPlWSeDhuYd9WjOiiY4ApINAWAhBsbcGMRUAABIoEjDHXENGLiv8sIm8MguAiEJo/Add1P8jMGk0aT7Q7O6GI3KwJd4MgKC3/Nf8FMRIEQKDtBCDY2o4cC4LAYBMwxtxPRI+JCbYVQRCsH2wqje/eGLMsiiQ9ptxsmow3CIKTG18JM4AACHSCAARbJ6hjTRAYUAKZTGa/MAzvjm3/j9baxw0ojpZs2xjzViLSaNK9yiywTkTU2zZQpb9aAhqTgkCbCUCwtRk4lgOBQSbged4JIvKVGIOrrLVa4BytiQTGx8f32rFjh16RvqXctMx8QZRwd1sTl8VUIAACLSQAwdZCuJgaBEBgZwLGmHOI6N2xP/2Etfbj4NQaAp7nHROlANHr0tJ2LzOf4vv+ha1ZHbOCAAg0kwAEWzNpYi4QAIGqBIwxtxLRM2KdXmatvRLYWkogZYxRb9sHKqzyemvtxS21AJODAAg0TACCrWGEmAAEQCAJgUwmsyAMw6l4X8dxHp/NZu9LMh59GiOQTqcPcxxHhduBxZk0H56IHEJE51lrT21sBYwGARBoJQEItlbSHaC5Fy9e/NhUKqXZ6ikMw9nvlYhMbdmyBW9kBuh7UG2rrusewsw3xfpMWmuXA097Cbiu+2Fm/k8i+mM8MAHpVdp7DlgNBOolAMFWLzH0L0vAGKNRZ3tHH87+H7yIfJqZNav9TWEY6l/UNwVBsBEIB5OAMUav5D4T2/3XrbVa/B2tzQTGxsaePzQ09E0RiUfozjiOc3A2m729zeZgORAAgQQEINgSQEKXygSWLFmySD8dHh7+avE//sz81EiwXV0oO3RUbPSlRPQoIvqstfY6cB0sAq7r/kcqlTooDEMV9LsT0TnW2vcMFoXu2a0x5ggi+nGJRXeGYXhwLpfb6eq6e6yGJSAwuAQg2Ab37Juyc2PMj4joKZoIlZmdMAw3M7OJJt9MREtiC/2AiF4W/fMPI+FW+hdGU+zCJN1HoJDY9etE9LqiZcz8Sd/3P9J9lg6ORZ7n/ZOInFmy429Ya+fOaXBoYKcg0N0EINi6+3y63rqYYHs0EaXCMNyQSqX2EJFUwYPyeCKKf8ceJKJdSzZ1VcHb8jlrLYRb1592Ywa6rnsGM3+oOIsWLg+CYGVjs2J0owSMMecS0YnxeUTko0EQ6Ds3NBAAgS4hAMHWJQfRq2ZEb9deHvOaHOv7/mX6zxMTEyNTU1OHisihzPxGIkpX2KcKuZ9pWR1clfbqN6G23caY96s4j/XElWhtbG3pYYy5kYgOjS/GzK/0ff97bTEAi4AACNQkAMFWExE6VCOggo2ZDyiIrV1EROtDTuq1p7V2Q+m46M2MPjx/Scn/zd/AzIdHf6YeN7xx68Ovneu6xzHzt4pbE5HLgyAoW/eyD7ff1VvKZDJeGIa3lJSzekBEDkKd164+Ohg3QAQg2AbosFu1Vdd1X8jM+pat2P4gIm8IguDacmuWCDf1rkkhenC3kr4Qbq06sA7N63nes0Xkp7Hlb7XWzuUE65BZWDYi4Lruy5m5tMboz6y1zwEkEACBzhOAYOv8GfS8BeWuU3RTzPwu3/fPr7RBFW4i8pGYd61cVwi3nv+GPLwB13XHmDlX3A4zb/V9f58+2V5fbMMYcwoR/Vd8M1p31Pf9d/TFBrEJEOhhAhBsPXx43WS667oXMvObytj0X9baf6tma6Wr0tiYB5n552EYfiEIgiu6ad+wJTmBAw44YPj++++fjo+w1mpwSph8FvRsNYEK/y5/wFobf3/YajMwPwiAQAkBCDZ8JZpGwBijRbw/VjohM/82n8+/NZfL6RuZiq2KcNOku8UH0T8XkbODILioaYZjorYRMMb8PpZgWb2wS33f1/QvaN1DQGuP6r+r8ZqvWsHkqFwud033mAlLQGCwCECwDdZ5t3y3nue9WUS+WlxIRH7JzMX/8H/ZcZyV2WzWr0O4/TXywGii1XhbFwm3L7Z8U1igaQSMMbcR0dOLE4Zh+KxaQr5pi2OixASMMU8mop8T0cLiIL3CJqKDIbATY0RHEGgqAQi2puLEZEogKjL9tcIVqRURfVQ+9x/9iJAWoF5prX2glnATkZOZ+UVV+v1eRM5i5i/Wmg+n03kCpWlgiOhV1trvdt4yWFBKwPO814jIN0v+/MfW2heCFgiAQPsJQLC1n/lArGiMWRoFFFR6rHw/M5/u+/6qWkCi6ML3EtFrq/Tdrh43Zj7bWrup1pz4vDMESpO0MvP7fN8/qzPWYNVaBFzXPY2ZPxrvp5URgiA4qdZYfA4CINBcAhBszeWJ2UoIeJ53jIicSkTPrABnAzOv9H1/7hq1EsRMJrNfGIYq3HbKyl7aX0TOj4Tbr3Eg3UXA87yPishpMas+Za391+6yEtbECRhjvq2e0Pif1YoAB0EQAIHmE4Bgaz5TzFiGgOu6b2dmFW5uOUAicrMKN2ut1hut2sbHx/fZsWOHCjf9KS11NTdWk7SGYagBCj+pNSc+bw8BY8xbC/Vlv1RcjZm/5vt+ueji9hiEVWoSyGQyjxaRW0Rk35LOh1hr/7fmBOgAAiDQFAIQbE3BiEmSEjDGaIoPFW5lhZYm7szn86cneYg+MTGx69TUVFG4VcrntU1E1qt4GxoaunRycvKepLaiX/MJZDKZI8MwvDo28/XW2iOavxJmbCaBdDp9sOM4N5fMuWF6evrgLVu2bGvmWpgLBECgPAEINnwz2k5gxYoVe05PT6to0zJVlVqiiNLi4EK6CL0mVfG2X3xCZv6piMQztV+l4m379u2Xbt269W9t3/yALxhFH94Vw7DOWlvquRlwSt25/VLvqFqJ8mLdeVawqj8JQLD157n2xK5c112u3rYKCXeLe0gUURoTbhqYoMLt2UQ0JSLbmHlRGSCawPVSEflWEASl5Xh6gl8vGrl48eLHjoyM/Clm+1+ttY/uxb0Mos2e531aRD4YiTWtAfwrIrrOWnvlIPLAnkGgnQQg2NpJG2uVJWCMeS4R6VXpTkXhY50TR5QWx3ie92JmflsYhjs9lq5wBPcy86VhGKp4w3u3Fn9PjTEPEdEuxWUKFSz2yOVyf27xspi+SQSMMeuISPMiPiESbhcGQXBCk6bHNCAAAhUIQLDhq9E1BJoZURrzuGl6kVcz86urRKrGGWhC3ksdx/mW7/t3dw2cPjLEGDNJRMuKW3IcZ79sNru2j7bY11tJp9OvcRwnnp/tb0uXLt39hhtu2NHXG8fmQKDDBCDYOnwAWP6RBJoZURqf3XXd/R3HebUKOCLK1GIfRa4iWKEWqDo/d113DTPru0K9Gl0QFRc/uc5p0L2DBIwxG4loacyE11lrv9FBk7A0CPQ9AQi2vj/i3t2gMUbzc2lwwm5ldqEFw28WES0If2m9u/Q873kiclzkfdszwXgEKySAlKTL0qVLjxgaGno7ER0f9V9rrd0pWCTJPOjTOQLxt2yRFd+z1r6ycxZhZRDofwIQbP1/xj29w0oRpSXRn+uJ6PzR0dHz165d+2C9GzbG6F80xxGRet6cGuMRrFAv4JL+y5Yt2zefz+90BSoi7w2CAHVhG2TbruHpdPogx3G0QPxcm56e3hMpPtp1AlhnEAlAsA3iqffgnksiSv8gIkPM/NiSrWiajvPDMDwvl8vpw+i62vLly3ebnp4uvnerVr+0OC+CFeoi/P+dPc87S0VabPhma+2YZoqY55QY1mYCxhitJPKk4rLMfKLv++e12QwsBwIDQwCCbWCOuj82GkWUvi/yiFXb1Le1RFUQBNfOZ+dRLVQEK8wHXoIxmUxmcRiG+g4q7tE81Vp7enH4+Pj4XpOTk39MMB26dICAMebfiegTsaU1vccLOmAKlgSBgSAAwTYQx9x/m/Q874AwDN/JzO+ssbufq9fNWvvl+VJAsMJ8yVUfZ4xZGaVzKXZ8gIjGChG6E9ls9mZjzMei5MpZZs4SUVZEij8bcrnc71tjGWZNQiCdTq9wHOe38b5hGLq5XC6XZDz6gAAI1EcAgq0+XujdZQQ8z3s8Eb1TRN5FRIsrmSciW5n5vDAMz2/kL3oEKzTvC2CM0Vxe6mXTX4vtXCJ6aSEgYR0z/zmK6H3Eosy8OgzDJ2l6iTAMLwmC4N7mWYaZkhIwxmgt0blKIsx8su/7q5KORz8QAIHkBCDYkrNCzy4n4HneCZHX7VnVTNU0Enpdaq29tZEtIVihEXoPj41qy6qnrVzTN4lzCXZLOvyQiF5c/DMtkaTizff9S/AOrvFzSTqDMeYkIvp8rP+t1toDk45HPxAAgeQEINiSs0LPHiFgjDlCr0oreWdif8lf4zjOeb7vf6+RrSFYoRF6xIUalZsqeUdFhJjL/mfqPiJ6XJmV/8LMl4jIJdba6xqyDINrEli+fPmimZmZe+IdRWT/IAji9WJrzoMOIAACtQlAsNVmhB49SsAYM05EelWq79x2rbKN3xTqjZ6vV6bZbPbvjWy3gWCFy33fv62RtXt1rOu672Hms8vYf1E+nz/ZcZwMM8/+hGGovz49SeJjffMWE28a0VixaY1TZh7VDqlUalsul5vqVZ7tttsYc1Xc28nM/+n7/kfbbQfWA4F+JwDB1u8njP3RokWLdhkdHZ0NUCh4XvatguQvelUaed30kXtDrc5ghQ3MvENE1hDR9dPT02sGJaeVMUYjDTXiMN5+Z61dVOkA0ul0uvDg/TUi8hpmflqNg6p5TWeM+T4RvTyaR3/V3Hz/bK3VQAi0KgQKVQ/eUqh6EA/qWW+tXQFoIAACzSUAwdZcnpitywm4rvsPUWTpC2uY+k31uvm+rwKq4ZbJZA4Pw3C2LBYzl6us8DMienZ8IWa+pSjgrLVqR75hQ7psAmPMu4nonHJmichBQRD8opbJruseyMyvISL92ae0v4icXThLFX/fsdZeXG4+13Vvjwm//yaiEyMP3bt837++lg2D/PnExMSuU1NTKmznUrSIyKFBEPxkkLlg7yDQbAIQbM0mivl6gkCUqV2vSt9aw+CfRvnc/qdZGysXrMDMvoh4VdaYYebrVcDpTxIh0yx7WzWP53nHish3q8z/XWvtq+pZ3xjzski4qXgbLhl7m7X2GaXzua77Bmb+WqV1EPlY+wRc19X/wVHms01EzgyCQAMS0EAABJpEAIKtSSAxTW8SWLJkyaLh4eHiO7cnVNnFJhE5b3h4+PxmJXMtBisQ0RuZ+bA6Cf6xRMBpea6eacYYFU4/JaKRGka/YD7BA3oNvnDhwg+KyGnR/Leq8N6xY8dVmzdv3lpcM51OP8FxnB8Q0ZKCp09TxJRtGsTAzO/CFWl5PoWqByqsvx37tOqVds98UWEoCHQRAQi2LjoMmNJZAq7rvj26Ln1mFUu06Hyx/NUdzbJ48eLFC0dGRp7PzFqU/nlEpA/r62l+QfSp9+36MAzXNJJrrp5F59u3EBmqns3dmfnfReQx0TxvIKITiCieLf9aa22SMmFlTYkiUFWMzTYReUUQBFfEO7uu+xRm1jdYB9TYjzJ+J65Iy1PyPG9GS8YV3v/dFQncS621G+b7HcE4EACBnQlAsOEbAQIlBDKZzJFhGKrX7dgacK5Ur1upAGgG0MjzExdw1a5Lyy2pb7JmBVwUwLC9GXY1aw5jjIrd/XU+DbYIw/C/gyD4J03JQkQ/jq/DzMf6vn/ZfNYuCSYoK9h03pinbVa0ichGZtbapo9ouCJ9JJMSD9s2ETk9CIJPz+fMMAYEQKA8AQg2fDNAoAKBTCazXz6fL5a/mk35UKHdGZW/0sLXLQkMcF13OTM/n4jU+6Y/e9V5cGtUwGkEqu/7ehXZ0WaMUQE5x3RoaOhxxatmY8x3oijNoo3b8vn8kzZu3Pi7eo32PO8eEdHku1MFb14YhuGJlQR2TLQFUbWFhZXWY+ZP+77/oXrt6df+hbeDvyzxUH7PWquRtmggAAJNIgDB1iSQmKZ/CWQymUcXSlsVy19lqux0W+y6tKX1FKPISBVuRRFX+sC+2oH8RYVb5IFbU3jYXzVHWbNPNpPJeGEYxtOm3GutnXs/GO1Na8Cq982KiCEiTZR7krX2G0ntia6Zda96Tades8tTqdRp2Wz29kpzRKLtX3WtKmJtUkQ0x9951lqNJh3oVhDF79D3gSUQnmmtVRGHBgIg0CQCEGxNAolpBoOA53nHq3iLvFzVNn1RFF3ajtQGQ67rPk/fv0UC7qA6T2OzXp06jjMbgWqt1coDLWvGGK0Vqg/9Z1vB7ht93z88vqDrul8tRB1qYfH/iv+5iKyemZk5acuWLTWveI0xryWieBqPDYW0Hiq0ajbP844RkVOJqNp7RrV9pe/7H645YR93MMaoRzIdO88LfN9/Rx9vGVsDgY4QgGDrCHYs2usEPM/TgtfvEpE3VtuLihF951aPZ6hRNpq1f3h4ePb9WxTEUC1ZcLnl7i4RcE1NHuu67gf1SjG2cFlPlTHmR4VI0nL58jTJ8Em+72s90YrNGPMtIjou1uEMa+0p9fCNAlFUkM0JkjLjv2StfXs98/ZLX2OMeiNPj+8nlUp5GzZssP2yR+wDBLqFAARbt5wE7OhJAlqKStM9RF63iu/KRMRqBYVIvDVVANUCNzY25jqOExdwFSsIVJhLc9GtcRxH3781nEjY87zVIhIXOB+w1n6u3Nqu657KzJ8s95mIrAqC4ORyn0XXocp57qrYcZxnZ7PZm2vxKvd5VKRePW5lS5wx86/y+fw/5nK5W+Yzfy+OWbp06R5DQ0MbiWi3RkRxL+4dNoNAJwhAsHWCOtbsRwKOMUavSjW69KlVNjitFRT0/ZPv+3d3AkQ6nX6q4zjx92+PqsMOrbE5m8A3lUpdX+09WKU5C5Ggek383OLnzPySat6yTCbzrDAMv1DhevJWx3FOKhVijVyHVrJ7xYoVe05PT6to+0AVXl92HGdlNpv162Dak109z1slIv8SM/7P6olErrqePE4Y3QMEINh64JBgYm8RiN5oqXAr1qYsuwF9BB/VLa16tdfq3afT6cNiAu6QOte7t0TA1RQqxpg/ENHjiuvk83mzceNGfQdVtbmuewYzV4rMPNVaO3c153neL8MwHGJml4geTUR1X4dWMkYjdh3HOTfKl1ep2xmFpMAr+1W8eJ6XEZGdcqwx8ym+7+u+0UAABFpAAIKtBVAxJQgoAS3+HiXiVfGWqkLltqhuaWmkXdtBRtUX4gEMT6nTiMmYgFuTzWY1unOueZ73eBFRkVdsf7PWJvbweZ73YhFRb9uyMnZdm8/nT0qlUnrlW8zl9hdmviqVSl0wOTl5XZ17qdrdGKMCUd9wVWr3M/Ppvu+vaua63TCXMeZL8bJueuUfBEG9uQK7YSuwAQR6hgAEW88cFQztVQIaBDAyMlIsf1Xt8fof9I1bQXCcn81mt3TDfsfHx/eZmZmZff8WRcZWs7+cybcS0ZowDK/fZZdd1mzfvv1gDcSIdbzdWlurwsBO86bT6VFmPpOZy0UiarZ9rUiwIjboKmutRqY2vXmed7KIfKrGxBokodGkX226AR2YMKrDu9NbPX2TGASBijg0EACBFhGAYGsRWEwLAuUIRIXGVbzNveGqQOqrw8PDF6xfv77jSW7j9mUymYl8Ph8XcHvUcdIhM68vlC2KR61+w1r7ujrmmOsavVNTb9vc9WqFeeZVjzSpTcYYFWxlgx/ic4jIzSrcCgXo51KaJF2jm/q5rntZIcji6JhNt1prD+wmG2ELCPQjAQi2fjxV7KnrCUTvxlS4aa6wSk3fev2eiK5m5mu6sYalBgTk83m9Qi0m8HXqgc/Ma8MwPGdoaOj6DRs2aN61ulqU6PbMkvQd90dVFLRSQcu8a3FDjTEXENHbEhp/RRiGK3sxojS6kr4qvk9mfqXv+99LuHd0AwEQmCcBCLZ5gsMwEGgGgSjrfzG6dPeSvwhvEZGDY3+mQuQaZr46DMOrgyCIvwVrhjkNzZHJZBboQ/zoMb4KuGfUOaFWh5iNQB0ZGbl+/fr1W5OON8a8m4jU27a28LZqk4hcxMwTRPQTa21T365VsskYo6LlmKQ2E1HPRZSWRvgWvp/6PXxxHXtGVxAAgXkSgGCbJzgMA4FmEpiYmBjZvn271i1Vr9uTiCiMCpBrlGOl9lP1vOlfmoU3WvpWrKuaBhjou7eYgCsXKFDNZq3ROlvAfuHChWvWrl37YLXO6XRa363tzcxvJaKLgiC4tp1ADj/88KFNmzZdT0SlkbZa+uvJVWzpiYjS6Dr/a/F9FMT1YUEQ3NROzlgLBAaVAATboJ489t21BLQsUhiGry1cF766DiM3q+dNxdtDDz10zb333vtQHWPb0tXzvCeJSCN1S1UYzAq4bhUJruuqYFTRpt69uSYiZzOz1kR9SQXYGlGqgQnxChBtOZekixhjflOyr4utta9POh79QAAEGiMAwdYYP4wGgZYRSKfTj0mlUkcVHqsfSURHEdFcgfRai4rI3NVpLpdbV6t/Oz4fGxt7WiqVihdeV5F5VuSB0yjU0TrsUEGqwqgo4NQb1xVNAzM0Kla9fXGDmPktRPTnGjVKuzKi1BhzEhF9Pr4fx3GelM1mVcShgQAItIEABFsbIGMJEGgGAc/znh2G4VHMrAKunqg8fdel3rdrgiDQ+pwdaWWqD/zAWltMLsye582mDhERff/27HqMLOS726pv31TEqVjK5XL6Hq5jzXXdQyJP21DcCBF5RRAEV0Q1SrVqQtkr726KKNU0Ko7jKM85ASoiZwVB8L6OAcbCIDCABCDYBvDQseXeJ+B53pIwDI9kZvW8qYArW+OyzE71Hdjs1WkqlbqmnfnejDGfKLzN+/eiTVoA3vf9spULIu9iXMDtV8ep3cTMWt/ySma+MpvNdqS+p15ti0hp9OQUMx/h+/7PdD9R8XQVbvF6nMWthpEH8bROXgGXnhsRTefz+fTGjRt/V8eZoCsIgECDBCDYGgSI4SDQDQTS6fSRjuPMCriSPGe1zPu5Rp46jnP1fAuj11qg+HmUHX85M+tbtt1FZHUQBBohW7MZY5Zq6pAwDIspRBZXGaSeNhV7xbZJxZv+WGv117Y113Xfxsya8iPe7hGRI4IgWK9/WKVGqb7ZOzQa+O2o2P0v2mY8EWni5B07dqh3Le4p/Li1VsU3GgiAQBsJQLC1ETaWAoF2EFi2bNm++XxePW/686I61lSPyWzOtyjy9IE6xtbs6nnec0REC6e/UjuLyLogCOJJdGvOUexgjNGoy+fr+7eoCoPWCy22zUS0pMJkD6nXTcXb8PDwlevWrftT4kXn2bFCNYQhOWcOAAAaKUlEQVRfDw0NPX9ycvKPxWm1RmnBe3UqM7+JiO4TkV2YeaeyXcz8NRVu1tpGgjcS78QYc3bBlvfEBvxudHQ0vXbt2unEk6AjCIBAUwhAsDUFIyYBge4kMDExsevU1FTR86YCrppnqnQT16lwUwHXDIEQiay7ShZ5vbX24kbpGWO0coS+fXsFEdVT6kpztBW9b1oHtSWtXDUEEbmhcNWpNkt80WgvHy/kkDuikjEicr7jOKt838+2xOCHr2tVFO90Xsz8Pt/3z2rVmpgXBECgMgEINnw7QGCACLiue2Ds3Vs9D/sni5Gn1tqrNU/cfLAVrja/TEQaLVlstxVKNdWbYLfq0lq7dXh4+GVE9FJm1hqiiYrLF8ot/aqV794qVENYY61V0faI5nmeXm9ryav49e5O/UTkzFQqtaoVbxGNMd8gouNjC95tra2WT24+XwmMAQEQSEgAgi0hKHQDgX4joGWdNG1ILPL0MQn3OBVdnV6dz+evqScis5Vetkq2G2NUtBV/libcY0vevcWrITDzz0TkGSLy30EQaNqMss3zvGO1VmlJ1Yt4XxXPq0ZGRlY164rXGPO5QgqS95cY1BRvaEL+6AYCIFBCAIINXwkQAIFZAoWyQ0dozrfIA1ePJ+X2WLmsn9TC2Q4vWyUb0un0wep1cxznpSLytFq26uci8pDjOE159xarhqA1V59TXJ+ZT/Z9f1U1e4wxryMijap9aoV+mptu1dTU1KqtW7f+LcneSvu4rnscM2vU6uwauvfoHd1N1trD5jMnxoAACDSHAARbczhiFhDoKwLGmGUiUsz5pm/fUgk3eF9UceGakZGRq8t5fDrhZStnu+4x8rzp9WnF92Jlxjb07i2q+PAdDcIsmTuRByuKPFXhpkEKj2gi8qeCyNLABC15tdP7uEpn6HmeBnCoUCvloDVZf18ot3Wd7/t6FY4GAiDQIQIQbB0Cj2VBoFcIaOLUoaGhI/XqNMr5Vq2+6U7bKkRw3qiBC3p1unHjRn0jNts66WUrx32fffbZc2RkpOh5a/m7N8/zDihEuN5Y+r6untqcruu+Rz1zhSLyla55t6hw833/zErfNdd193cc51QRqVYG7cBurFXbK//+wE4QaBYBCLZmkcQ8IDAgBDKZzNM1aW+UNqSYJ6zm7gvpKqwGLqiAcxxHc5H9smRQIg9TzYWa0KEd797S6fTRjuNcVmLuPalU6tANGzbYpNtwXfdfIuH2uApjtNyVCrfVxc8zmcziMAzVo/buKuucJyKnB0GwMakt6AcCINA6AhBsrWOLmUGg7wmMj4/vNTMzE7863SvhpncQkeZ9i+dLa3rEaEJbqnbTd2+pVGo2aKHZ796MMf9IRF8sMeAXjuMcms1m/57U/kwms0AjSgtvzvSqtFzVBJ3q1yLyBSIai96pVbrm/o7jOCuz2Wy87mtSU9APBECgRQQg2FoEFtOCwCAScF330Kjagoq4RI/645yY+fuFt10X5/P5O7ulaH3cvujd22zKkGa9ezPGrCSifyv5vny3kPvuVfV+h6KSXh+K0oHsVMe01lyaF46IVgZBcG2tvvgcBECg/QQg2NrPHCuCwEAQGBsbc1Op1JFR8IK+f1tQ58a17umdRHSHiOivdy5cuPCObsmyr+/eRkdHi563xO/eRORXGnUar3Pqed6FIqIVDuaa5lirlu6jGsuxsbEnplIp9bb9cwLmv2bmlb7vfzNBX3QBARDoEAEItg6Bx7IgMGAEUsYY9bppMlh9/6YRmvNtdzHznWEY3snMdwwNDd0ZL/E030kbHdfouzci0rJdOyXRTZLuo5Ldnue9WES05uczq+0tKkWmUaUa/YoGAiDQpQQg2Lr0YGAWCPQzAU3tEYm3F0cFzpOmDamEJadeOBVwKuZmZmbu3LRpU+KH+81mPc93b39zHCcvIqVv0OoKxjDGqEDTgIJj6tzXZVFwws/qHIfuIAACbSAAwdYGyFgCBECgMoEoL1lpMfO/EFG8oPt8EG7T61S9So08cncEQaBXq21tDbx7m7MzSbqPZcuWmXw+r0LtbZU2KCKXENFooQzX0VUgfEPrlGaz2bk0LG0FhsVAAATKEoBgwxcDBECg4wSMMV8hohNihtxWEFnHhmH4VMdx9hcRzby/PxFlGjR2JnoXd6eIzIq5kZGRO9avX//XBudNNHy+796ISO3Wgu8XZbPZW+KLFcpI7R551DQnW6V2MTOf7vv+3drB8zytsqBRpa+oMuYr+Xx+1caNG3+baHPoBAIg0FICEGwtxYvJQQAEkhCo4GV7xFWgRkGqcEulUrMiTn+YWYWclnpqpK0vfRe3ffv2R1QJ2Lx589ZGFikd2+i7N2beT0Q0wrRsHVh9n5bP50/P5XKapPcRzRjzAhVuRPTCKvs6JwzDVfXUjG0mI8wFAiDwMAEINnwTQAAEuoJAOS+btfYZCYxzMpnM/uqNUzHHzCrkVMQlLWZfbolzmfk4EdHUGLP50MIwPCWXy12YwJ55dclkMgeLSL353oi57H/Gb9MUHdba7yYxxnXdlzOzRpUeUqk/M39GhVsQBPcmmRN9QAAEmksAgq25PDEbCIDAPAkk9bIlnd7zvIwKt5gXTgVdPFFvxakKou+ywpVp8dH+A0Q01WrBFjfGGKN1RlW8qYh6YtI9E9F2EbmCmT9qrZ2sY9xs16j4u3rcKgnlaQ1MYOYzstmsvjNEAwEQaBMBCLY2gcYyIAACtQk04GWrPfnDb7ceX+Zd3H6lgwsVAx4qCJNHMfMOEfkLM6tgOzEIgisSLdTETsaYm6p5viotVS7fW1KzPM97U5R89xFsojkeEJFVCxcuXNUtefGS7g39QKBXCUCw9erJwW4Q6EMCzfayJUG0ePHihaOjo3NXqkSklQwWE9Ffmfl/ReScwtXsD5LM1ew+Y2Nj+6ZSKc2ldlyDc28q5GO7Un+stfprouZ53ruicldehQF6PXqGtfaziSZEJxAAgXkTgGCbNzoMBAEQaAWBVnvZkthsjDlCvVoi4hYiUy9qd7km9QRGwQTvr2Hvx5h5uN46pyrctNrC8PDwlevWrftTLSbGmPfrGzcRWVShb46INPnuObXmwucgAALzIwDBNj9uGAUCINAiAp3wsrVoK/OZ1vE871QR0XxqC+MTiEi5AIN7HMc5LJvN+rF3b/XWOf0xEV0Ved+qvXvTahX6pk7fuO1RbnPM/Fu9KrXWapoWNBAAgSYSgGBrIkxMBQIg0BwC3eBla85Oks0SRWlqMlu9jt27wiitQKCJf99d8vkvHMc5NJvNzkazaluxYsWeMzMzTalzWmrLxMTErlNTU0XhNlrB1tujqgmoT5rsK4BeIFCTAARbTUToAAIg0G4CA+Blc4wxxxQCA46Oqg5o8tvZxsxbRETf0BWb5ojTpLezKUWMMSsLqUY099pcY+bbfd8/oNI5NZrvrdy7t/Hx8b1mZmZOjtKBVFr6Z5Fwu6zd3yGsBwL9RgCCrd9OFPsBgT4h0G9etkwms0BThahIIyL92aXcUYnI5ZGI+yMRnV7uQb/nef8jIm+Mxv9S03DouCAIatYPnU++NyJ6UESuKvfuzfM8TZWi79v+qcpX77oo+e41ffL1xDZAoO0EINjajhwLggAIJCHQD1626PpQxZkKKf1VAwRqNb1OvHrBggWnr1279sEqXrPrND8cEb2k2EdErk6lUsfEr0erLdbMd286VxSY8PYKa+qV7S+Y+Rzf93FVWutbgM9BoIQABBu+EiAAAl1LoBe9bEuXLt1jeHj46MiTVtPjpfBFZCszX15I8ntZEAQ/SnIgmUxmvzAMv1wIGDgw3l9EbkilUkfXm9h2Pu/eRORmZhZmviQMw0u0CoLruk9hZg1MeH3JPv6XiJ4b7dcy8+qRkZHVSaJUk/BAHxDodwIQbP1+wtgfCPQwgV7xsmkaDvWgRSJNH/snaRv1GtNxnMt9378+yYDSPioOh4aGLi9NrCsitziOc7Tv+3+Yz7w6JuG7tzVE9LzYGt9T8eb7/iXpdPogx3FUuL2SiO4XkZCZ9yyxR0RktYo3a61e7aKBAAhUIADBhq8GCIBAVxPoVi/b+Pj4Pjt27Ci+R3tRQohZ9aSFYajvzX6ScEzVbosWLdpldHRUH/XvVMBdKx0w8zHWWk2a21Cr9O5NRO5l5nJRrX8mokscx5m9+hSR94nIsTWM+JGKtyAIvt2QsRgMAn1KAIKtTw8W2wKBfiHQTV62dDqdVs9V9B4t7lmqiDvKTTYr0nK53C0tOheNOlXR9vL4/NHaR1trNzRr3di7tzcT0f4J5l2v4i2VSt2Vz+c1IfE7iGioyrgNzHx+Pp+/IJfLqfBDAwEQ0AhyUAABEACBbifQSS+bMWZZLP3G7BusBO2u2HXnbQn6N6WLMeZSIvqHkskCFZjW2l83ZZHYJJGAPZ6IXkNET00w/01Rcfpdieh1RLSsypgZIlodhuHqXC53R4K50QUE+poABFtfHy82BwL9QaDdXrZMJjMRhmHRk3ZQQoq3xa4770o4pundjDFfI6I3xCdm5q2aUsRae2vTF4wmjN6sFcXbExOsc6mIbGLmp5Re55YZe5W+c/N9H/ncEoBFl/4kAMHWn+eKXYFA3xFotZfNdd39o/xnKtSengQgM9+inrR8Pn/5xo0bf5tkTDv6eJ63WkRK02tsizxtGq3Z0ua67isK17HqdVMB59RYTPPNrRGRUWbWSg8V/16KrnhXj46Orq6W8qSlm8PkINAhAhBsHQKPZUEABOoj0AovmzFGE84Wqw08OaFFP4ldd2YTjml7N2PM2UT0npKF/xaJNq0f2vK2fPny3aanp4+PxJu+X6vV1hHRFmZeUVLtoXTcdg1QcBxHvW5315oUn4NAPxCAYOuHU8QeQGBACJTxst3vOM7ybDZ7X1IEmUzmWbHrzhUJx10fu+7cmHBMx7t5nvdpEflgiSF5TeRrrf1BOw30PC8ThuFrmFm9bk9KsPZvouCE5TX6XhFFl16RYE50AYGeJQDB1rNHB8NBYPAIxL1szGxFxGjSWcdx3uv7/vcqEXFd99DYdaeXkJwmsL1seHj48vXr129NOKbrunme90kRObWMYf9grf1OJwz2PO85MfH2uBo2aK62gJlNjX6/1ndu+XxegxS0AgQaCPQVAQi2vjpObAYE+p+AetmY+Tcisiq+W2b+jO/7/1L8M2PMEbHrzqUJyVyp152pVOqyerx2CefuWDfP8z4qIqeVMeAN1tqvd8ywhxP0vlKvTEXk1bXsYGataSpEtFuVvlrOa1a4ddO7wlp7w+cgUIsABFstQvgcBAacwOLFix/LzKOO40gYhmX/m1Hts1bgGx4e1oSsh5SZW3N+6ZumZxNRkkhF/ctfi61r4MBl/Zz3y/M8LdB+RikzDU4IguBLrTineuaMqjbMXpmKyGEJxj5ERI+q0U8rL+g7tx8mmA9dQKCrCUCwdfXxwDgQ6DwBY8z3o4SsvyitWxmzrtpnnd/EzhZMq0jTn9HR0csHKdrQ8zytOPCFMqLtvUEQfLFbDiqdTq9wHKcYZZr0nWE18zWP2+o99thj9W233ab53dBAoOcIQLD13JHBYBBoL4E+EWzqjdHi6nrdeXk2m/17eyl2z2qe571TRM4rY9EHrbWf7R5LH7YknU4fFok3FXCPrWGfekyr/b3251jt0qZVf+g2ZrCnPwlAsPXnuWJXINA0Ar0s2ETkb6lU6qxsNquP7sOmQenxiTzPe5OIXFjG0/bhIAhWduv2XNc9Looy1YLyjbZvR9GlGlyCBgJdTwCCreuPCAaCQGcJuK57oeM4LwjD8DeO4+xXzppqn7XL+sL7rF2iN03DpWuWBiS0y6ZuXsfzPH3oP1ucvaSdZq39WDfbnslkHpfP54spQp7ToK2/jN65rdY69Q3OheEg0DICEGwtQ4uJQQAE2k3Add3lzKwJY19QRrRp4XVN/9G22p7t3n+962UymaPDMCxX7ukMa+0p9c7Xif6ZTGa/fD5fTM5brTZpLfO04sLqVCp1wYYNG2ytzvgcBNpNAIKt3cSxHgiAQMsJGGPUQ/Txcgsx80m+75/ZciN6ZIFMJnNkJNpG4yaLyJlBEJzUI9uYNdPzvOeHYVgUb49uwPZvRl636xuYA0NBoKkEINiaihOTgQAIdAsBY4x62dTb9ohM+cz8LWZ+bz/lWmuEeyaTOTwSbbuXzHOetfbERubu0FjHGKNXpnrtq7Vh59W0VmwYhhd0Q9qTeW0Ag/qKAARbXx0nNgMCIBAnsHjx4oUjIyMq2t5ahsw9Ktp83y93JThwINPp9MGO4yiLvUs8bRcGQXBCrwJJp9NPcBxn1usmIgcn3Qcz08M5emfbvbHo0k1J50A/EGgmAQi2ZtLEXCAAAl1JwBijgk2F28JSAxGQ8P9E0un0Ux3H0Rx1pZUh7g7D8Jm9XvLJdd39oyhTTRHiJv2yqnBTARe1i9Trlsvlbkw6Hv1AoBkEINiaQRFzgAAIdD0BBCQkO6KxsbF9tTQXEY3rCL0WjDxTd4Rh+JZcLqdJaHu+ua77IvW6EZEWo9cI43rbT6N3bo9Ij1LvROgPAkkIQLAloYQ+IAACfUPAGKPBCGXTViAg4eFjHhsbc1W0MfM2ETk8dvhTzPwW3/fLpQPpye/IAQccMLxt27ZioMJL57GJezS6dGho6ILJyUn9PRoItIQABFtLsGJSEACBbiaAgITap7NkyZJFQ0NDX2fmuGArDvyEtbZsFG7tmbu3RyaTWRzL7/aMei3VZMSO42jt0p/WOxb9QaAWAQi2WoTwOQiAQF8SQEBCsmM1xpxLROUiRb8ZXZFOJZupt3p5nndAGIbF5LxL6rGemW/UIAVr7dfrGYe+IFCNAAQbvh8gAAIDTaBGQMKnfd//0EADIiJjzPuJ6HNlOPTVu7ZK52yMeYmIFMXbiPZj5u0i8ogglpI5Nuk7tzAMVwdBcO+gf4+w/8YIQLA1xg+jQQAE+oBAtYAEEbnFcZyBr5Dged5RIvIVInpCyZH33bu2Sl9p9couWLBAAxXeJyJPq/Or/6UoulQrbqCBQN0EINjqRoYBIAAC/UoAAQnVTzadTqeZ+SuD9K6tEpEomvZNRPRmInpikn8nmHmTiKxn5nOQ/y8JMfSJE4Bgw/cBBEAABGIEEJBQ++swqO/aKpHxPO/4MAzfXEiBclQ1esy8Q0SGoj53iMg5QRBo0Xk0EKhJAIKtJiJ0AAEQGDQCCEiofeKD/q6tHKH5eN2I6B4Vbvl8/txNmzbdX5s8egwqAQi2QT157BsEQKAmAQQkVEeEd22V+ST1uhVnYOYZEflioTTYudbayZpfTnQYOAIQbAN35NgwCIBAPQQQkFCdFt61VeczH6+biNysJdOstd+p57uKvv1NAIKtv88XuwMBEGgSAQQkVAeJd221v2h1et22W2vnUzKrtiHo0ZMEINh68thgNAiAQCcIICChpmgb6HxtSb+TMa/bCWXSpMxOw8yX+75/TNI50a//CUCw9f8ZY4cgAAJNJICAhOow8a6tvi+bet00KS8RHa06rTg6DMODc7ncz+ubDb37mQAEWz+fLvYGAiDQMgIISKiMFu/a6v/aTUxMjExNTR1KRG9j5kN8319c/ywY0c8EINj6+XSxNxAAgZYSQEBCdbxV3rVdZa19aUsPB5ODQJ8RgGDrswPFdkAABNpPoFpAguM4p2az2dPbb1V3rFiar01EbmTmw0TkhkLW/9fmcrnfd4elsAIEupsABFt3nw+sAwEQ6BECruu+kJnPIqLlZUx+iIjuZubJMAzXE5Hm2ZrUMkW5XG6qR7Y4bzOL79qY+T4ReXJsonUFHira7pj35BgIAgNCAIJtQA4a2wQBEGg9gQoBCSrQyom4okGBCjcVcMw896vv+5tbb3H7VshkMl4Yht8komeUrPrnwr5f6/v+1e2zBiuBQO8RgGDrvTODxSAAAl1OIBaQsJaI8kR04DxMfpCI5rxx+nv10C1YsGD92rVr9bOea4cffvjQpk2bVLS9qtR4Zj7B9/0Le25TMBgE2kQAgq1NoLEMCIDAYBHQgIRUKvXYMAx/SES7N3n36n2bE3PqmZuZmZnctGmTbfI6LZnOGHM2Eb2nzOT/aq39VEsWxaQg0OMEINh6/ABhPgiAQPcTyGQyi8Mw1GvR8eh6VH/VH6/J1ut7OH0fN+uNC8Nw9p2c/tpthcU9z/uIiPxHmf1/3lr7z03mgulAoOcJQLD1/BFiAyAAAr1KIJPJLMjn80UhNyvmHMcZFxH9/WObvK/fxYMeiu/lOllo3HXdtzPz6tJ9MvMnfd//SJP3j+lAoKcJQLD19PHBeBAAgX4lkE6nn6ACjpnHIxEX99A1c9v6xq54vToX9KDiLpvN3tfMhYpzua67PzM/XX/CMDyCmfctfsbMN05PT79O/3nz5s1bW7E+5gSBXiQAwdaLpwabQQAEBplAamxsbHxoaGhWwIlI3EP3+CaD+WNczKmIU89cNpvVa9cdSdaKizMReToR6c9o6VgRCZnZIaJtzDwVhuGJQRBckWQN9AGBQSAAwTYIp4w9ggAIDASB8fHxvfL5fFzExcXccJMhzOaSK16t5vN5fSs3NDQ0tFQ9Z9XEWQU7iulPXm6t/UGTbcV0INDzBCDYev4IsQEQAAEQqE3AGLMsHvSgnrnoqnVR7dHJeohInplTyXo/oleWmXcJw/CEIAiuneccGAYCfUsAgq1vjxYbAwEQAIHaBIwxu8euVYsiruiZW1h7hp16bCAiFYa12hZmvl1EZn9SqdSvstnsllqD8DkIDDIBCLZBPn3sHQRAAASqEEin02kNfEilUsVr1qKQW1ph2KVEdFzJZ/cw821FcTY8PHz75OTkPQAPAiBQHwEItvp4oTcIgAAIDDyBvffe+1G77bbbrIiLUpCokNPff4WZjySiWYEGcTbwXxUAaCKB/wOyu3LrQrDipwAAAABJRU5ErkJggg==', NULL);
INSERT INTO `28_2024_signature_etudiant` (`id`, `id_seance`, `id_etudiant`, `signature`, `etab_id`) VALUES
(10, 3, 1, 'data:image/png;base64,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', NULL),
(11, 6, 1, 'data:image/png;base64,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', NULL),
(12, 7, 1, 'data:image/png;base64,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', NULL);
INSERT INTO `28_2024_signature_etudiant` (`id`, `id_seance`, `id_etudiant`, `signature`, `etab_id`) VALUES
(13, 39, 9, 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAmwAAACgCAYAAACxIDDDAAAAAXNSR0IArs4c6QAAIABJREFUeF7tnQuYHVWV79eqTj8SfISHojGhT+06ISED8oiILzQzgIPiA7j3jjNXUWfu96FX0avg5fpCQGbQcS6PT8UB534zyuObwZkreBkejjhGggpCIAg0CZzadZrEjAxgIipJd/rUurXaqp7qk5P0eVT1qT7nv7+vv6b7VO299m/vJH/W3mstJjQQAAEQAAEQAAEQAIFCE+BCWwfjQAAEQAAEQAAEQAAECIINmwAEQAAEQAAEQAAECk4Agq3gCwTzQAAEQAAEQAAEQACCDXsABEAABEAABEAABApOAIKt4AsE80AABEAABEAABEAAgg17AARSBIwxF1lrLwIUEAABEAABECgSAQi2Iq0GbOk6AWOMWGvx56JOxCY/Qsx2fYvCABAAgT4lgH+Y+nThMe3ZBFzXvY6ZfSK6kIgu7ndhsmbNmqFdu3Y9xsynEtHjKcGGvzPwhwcEQAAEukAAf/l2ATqGLBYBY8xJRHSnCjYR8fpZsKlQ2717960i8iVm/hcieoKIVqZW7GL9734XtMXawbAGBECgHwhAsPXDKmOO+yXguu7tsScpee42a+1p/YjNGKPi7NZ47vrf9YJt+qNWj41d112f5hkEwbp+5Is5gwAIgEC7BCDY2iWH93qCwOjoqDswMPCYiNzDzEuJ6GgiOsVae2dPTLCFSaxdu3Zwx44df09EzxHR24joJSLyZsdxrg7DcFF0XCxEVNUuWxVcruvurBNsyhoNBEAABECgSQIQbE2CwmO9ScAYcy4RXZaa3SPW2qN6c7b7n9XKlStNrVbTe3xJmxoZGTlgbGxsUoMx0m+34WGDYOvHTYU5gwAIZEYAgi0zlOhoIRIwxtxFRCembD/PWnt5Eedy6KGHHrB06VJny5Ytv87DvnK5vC4Mwx8kfYvIT4IgeJ3+3OmRZqeCL4/5ok8QAAEQWEgEINgW0mrB1kwJlEqlEWa+g5kniOgQZj5qampq1fj4eJDpQBl05nneZ0VEvYFfzuvCv+d57xWRb6YE241BEPyx/typ4HJdV49Sh5n5QP0uImcHQfA3GaBBFyAAAiDQFwQg2PpimTHJRgTK5fJxYRhuTH1WsdamIyK7Di6J2mRmvWf3ESJScXmFfs9auLmu+1lmviQl2P4qCILz8/CwEdHOWq22Znx8/N+6DhkGgAAIgMACIADBtgAWCSbmQ8B13fcw83VJ78z8Hd/3T89ntNZ79Tzv9UT0NyKiF/SfF5FSJKgGRGRcL/+3evF/Lgtc172Gmc9O8fio7/tf6dTDZow5mYi+Vz++svd9/71z2YXPQQAEQAAEiCDYsAv6loAx5tLIU/WpFIAvWGs/XQQgxpj/RURfjG15WkR+w8wlIgqJaKuKthwE26z0Jo7jnF6pVL7TiYct9hD+XI+cG3EVkXcFQfCtIjCHDSAAAiBQZAIQbEVeHdiWKwHP824WkXcmg4jIWUEQXJ/roHN0bow5LBI3XyWit9c9+nx890tTblzPzL/M+kjUGPMoEa1JxnUc57hKpfJgu4ItFmsaxLCMiAY1fVtdgId2PT45OXnEtm3bdnWTe7+PHV8PeCMRTadbyXpv9TtfzB8EsiAAwZYFRfSxIAkYY7Tk0sydNcdx1lYqlQe6NRljzJ/EYu2gRjYw87NhGP6KmWtEdJq1VpPaZtaiFCcqBl+YdLho0aKXPP7448/oz+0EHaSS8KpY07ZHRL7FzJ9JG83MX/V9X+/noc0TgZRA0whpFWrqAf1XIvqDWLDh34Z5WgsMAwLNEsAfymZJ4bmeIqARoo7jzPLqhGG4uFqt7u7GRI0x6lX7cIOxVZwNJL/Xe3YicsDIyMhpmh8tK1sPP/zwQ6ampp5O9ffrKL3Ji5KfWxVsSS3SKAnxj1Rc6t07Inp0ZGTk9ycmJj4nIrNEWxiGp1ar1e9mNZ9e7keTPS9atOjVInJEK/OMIqJfIyJ6F/KNzHxw/bvMPCUimiC55UoWrdiBZ0EABNojAMHWHje8tcAJNIgQfcJae3i3pmWM+Sci+k/144vIb5lZhWVyB+xKa+158V22zMwtl8vHhmGY9i6OWWt/Lxmg1Txs6l3T6hHx+7c6jvP64eHhIxKRaYzZFFeVSIZ4yFp7TGYT6rGO4oocZxCRBsWcGIm1G6PI4XflNc1WEyPnZQf6BQEQ+A8CEGzYDX1JoEgRopoQ94ADDvgyEf3ZPhbjJmZeHZWMOtf3/TvyWLByufzOMAxvTvoWkTuCIHhL8nMrHjbP8y4RkQ+LyD+rd037UO9O+gi3VCr9oeM4s+bCzH/h+/5n85jfQulz3bp1i6rV6nLHcZYz83IReXeUxuXFDe7+aXqX4VbmJSLkOM6MFy39bpQy5llmvktElkR1de/BHbZWyOJZEJgfAhBs88MZoxSMQBEiRJctW7Zk8eLF54qIeswcIpo5gkzh2snMl/m+rxGtGiGaS3Nd9yPMrKJxuonI14Mg+EDy81wetiRfHBF9iIj0bqD28UstJF/vXUv69DzvKyJyTnpCYRi+plqt3pvLJAvS6ejo6MsdxznScZzTwjBkFWZElAg0DdCYaXpvUUT2Or7sYCrJPTW9m7ghurN2l+M4d3Xz7mYHc8GrINBXBCDY+mq5MdmUWOhmhKjjed6n48oFmvlfPVANPR9RCo//Zq3927xXznXdLzHz/0wJtguCIPjz5Od9edjWrFnzgt27d58QCY7/Ez+7JxXIkQRFNAyQWL58+eKhoaHHiGg0Nb+7rLVvynu+89G/CvLh4eEjmflIItL6tPpdv14Wr7kmQ57rHprWcNW7ivXetA0isouZf9LiXHZCoLVIDI+DQEEIQLAVZCFgxvwS6FaEqOd5p0aetMtFZDMR6Z2kmRaVa9rOzLM8LPGHudc3dV33H9J3opj5fb7vX5sYl3jYmPkFRHSYlvQSkeOIKLnnpsEav4if13xx2vRO4Nf2FyDhuu4fMfONaQ7MfL7v+381vzuis9Fc112loiwWZ4kw09/tr6nHVP8O3u/fwyJyCzNrmhf1iN1cq9VuKmL5tM4I4m0QAIG5CECwzUUIn/ccgXmOENWjztAYc7GIvFnvcsVANSJzJJVGYwczX6X/eNdHUMbPf8laq8l0c2mu6/6YmV+bdO44zu9XKpX1+rMx5mNRSg6N6tS7VJqiQ4vPz6T/iN/RaFbNs6afazWGbwZBcEEzxnqed63mwEs9K2EYrqlWqypqC9PK5fKLpqamzMDAgCsiGiCi98gS79niNg1VkTvtcUtaVG1iu4hsI6Jt+t1xnKenpqZugEhrkzBeA4EeIQDB1iMLiWk0T2C+IkQTb1oYhpemS2ClLP0ZEa1g5it27dp12fbt2zU5Lnme9wERubrBjL5hrf3T5mfa/JPGGBUIr0jeGBgY8J577rmnli5d6kxNTelds/elBIXeT5uVbkQ/Y+YzReRDraQcie++3UlExxKReu+S9iNr7Ruan0E2T7quO6qCLAxDw8xGRIxqViJyI2/hS1OjbNW1a3NUjfp9mIgeUdHOzLeoMAvDcFupVNq2fv36qTb7xWsgAAI9TACCrYcXF1NrTGAeIkQXGWP0SE89U9r+PfWPvXrWXhL//mvPPffcJ5955hn1WM1qnuedrklmY49V+rPbBwcH37Vly5a93ulkvV3X1WPJFzOzHnGqiHhERI4WERWVb2Le66+KLUSUHPmNEdEDIvLDIAiSu2xzmpMKVNBaowkjFSvPM/M3fd//6JydtPGA53kqkteEYahVLkRFmYqzWJQlSX7n6lnvlumXelD315STCjPlqd8fDoJAf4cGAiAAAi0RgGBrCRce7gUCeUaIpu6oaYSkFm+f1fToz3EcrVc6Z4oOz/Nep/m2NIKwrpuNzPzHvu9XslqP1B21+gv/SfoIvaOmR7gaVPArIro7DMMrlyxZsnFsbOw37diRqoQwU20iPjY+vxUv3b7GTgmzNSrQIgGsZbf0a7r8EhFpUMTM2G3MQY9sNd2KNj3anBZmKspUnE1MTDySeE3b6BuvgAAIgMAsAhBs2BB9RyDrGqIqDPTyvYhoIXkt86PtGRHRlA3TKRk0iSwz/4u19sLYK9NUio5yueyFYaiibW3dQm3TIAHf93+cxQIaYy6K+1H7kqalqpJUI37kMdypRej1wywKz+uYIqJluN4dpRQ5iJltOrluC/NyyuXyCWEYnh1H29YLs311pR4ybc3+PahiNRARq7bG9w1vCsPwkfHx8X9rwV48CgIgAAItE2j2L6qWO8YLIFBUAp1EiGpi0/Hx8dMdx/nDBh6bnSnvjU7/RypEmvGm7Y/VqlWrXrhnzx4VbTOJbOPnJ2NP201Zsa5L33ExEemx5CYRmXX0l4VgS+V20wv7KxcvXvyyZsptqUAOw/CEKPGullrSlCL6pUeZWj2h1WoJ9XfR9Gg20AAKFWUqzhzHsbVaLQiCYDwrzugHBEAABFolAMHWKjE8v6AJdBIhaozRrPOXMPMNItIoI796bDQhaXJHTctIaW6zTC6RG2P+jojeX78AzPxB3/evyWJhUp42GhwcvGznzp3hU0899dtWKh00a8dcyXjjfhLvWSLMNMo2SRtSP5QGQqiwnOvvNRXWY8w8FgWEDDmOo6kygkWLFtlKpaJeRTQQAAEQKByBuf5iK5zBMAgEOiHQToSo67pHR8XLLyEizYWlTe+nacLbRn9+Pqk5zDr1qu1rjsaYv4wu5Z/f4PMLrbWf19+r6Mq6tFDOgm1xJIJXjoyMvGxiYuLQfXjPmlr2KJo1iAIWNKJT24wwE5Exx3HG9Lvv++pVQwMBEACBBUUAgm1BLReM7ZRAKxGiBx100IuWLl2qd7rOrR9Xyy7Fx52zhEEYht8NguDbeZaRMsaoPZc1YHGVtfYcFVdZF+9u0hvW9PIsX778oMHBwS/EZZk0SlTTgjwtIjOpRZru7HcPVkXkXmYedhznagizFunhcRAAgcITgGAr/BLBwCwJNBMhOjo66i5atOiLInIKEWkk5vENbPi+1vjUqMBueGzqhWfKPvX+HaQpNph5fVaetlY9bFqyamJiohSGoes4TilKpKteLz3KTL4nkZoakKEFNedKj5FeAr38r+Ls3jAM73Uc555urEGW+xJ9gQAIgMBcBCDY5iKEz3uKwP4iRGPP1elEdCIRPRqXXdJ8Z3oHbbrmZxStqUlOtc7mQ90G47ruKXFZp8S2GZPiTPl+FsEB2mm9YDvwwAOHduzYoRn/S47jTH9XUcbMKsr069AM+STes3scx7m3UqlocfimomwztAFdgQAIgEBXCUCwdRU/Bp9vAvURoiLydcdxNDLwv0YpJr4cRXleGduk+cf0S9Na3EZEWqT7AmvtDfNt8/7Gi+/XaZRocm8reXx3GIaPVqvVV7Vrb5L1PxZjGvCQZ0sibOE9y5My+gYBEFiwBCDYFuzSwfB2CLiu+42oZqdGcb61wft6/HkYEQ3Fn/1TVHD7JGa+fMWKFV8saskgrQPqOM5hje5/aSLaIAi+14jV6OjoywcHB6ePLdOestTR5UA7jJt853kR+TUzpz1xD1lrtaA8vGdNQsRjIAAC/UMAgq1/1hozjSMoYxDpBLEJG818r4W4tbD5hii/1+2//e1vv6xpLYoKz3Xdc6LkvF/RQuFaPkpE6qsi6O8+lxJG6XtkS3Kcl6bY0Hxm1ShqNgjDUL9XHccJ9uzZU9VEs8aYu+Lj58SM86y1l+doE7oGARAAgQVLAIJtwS4dDO+EQP2drLivw4no/0aBBP/ZWvt4J/3Px7txaScthZR4BPc5rIiMM/NoxnZpegzN/D8tylSQ1Wq16f9uJsms67qa005LOx0hIqvDMFw5Pj6uIg8NBEAABECgjgAEG7ZEXxJIJ4hNAGQVUTlfQD3P+4GIrEvGi6Mt1bPVbAHzuUx9ioiG66o3/JSIzjrwwAODjRs36n2ztlurkadtD4QXQQAEQKAHCECw9cAiYgr9Q0BLY23duvXEqKbnJ+J7eFpdod0/xzvVG6YeMvWUqYcsTjxbHR4eroZhODw5OXlvVLDedxxnmYgcGRV9P9la+/0siGed2y0Lm9AHCIAACBSVQLt/0Rd1PrALBHqKwPLlyxcPDg5qmpE36H0vZtb/7jQYQAvG/4m19sn9wfI87wwR0STA001EngiCQI+NM2nwsGWCEZ2AAAj0CQEItj5ZaExzYRAol8svCsNwWpzFX69v1XIR0aoBv9LC5UT0JDOvJaL6YIQHmPldvu9rZGzDZoy5Iirv9LHUh1dYa/eq+tCqffr86tWrD56YmNAgj3HHcbSo+rjv+/+jnb7wDgiAAAj0AwEItn5YZcyxsAS0RNPIyIgeceqXCjUtct5q0+oGtzHzBma+u1ar/bU6xOJODnIc58zoUv8/REl/Vbilm0aWqmhTj9tezXXd7cz88uQDZj7T933N+dZxq/feRXVaN1pr284Z17FB6AAEQAAECk4Agq3gCwTzeouA67qad0yPNhMvmuYda7sx87/6vn9SugMNqBARz3Gc1+p3vXc2ODj40z179twYlXR6S91ge2LRNkuIpdKF+ES0WZ1iQ0NDJ2zevPnZto1NvWiM0fQdH0/96kprbfrnLIZBHyAAAiDQMwQg2HpmKTGRIhIol8vL1XOmHrT4iPOoVu2MBNVjYRjezcyHENEZqfcniehIa60eLc40Y8ytdYmBb7PWnqYPGGO0YsH7621g5g/6vn9N/MxKrZFaly7koqig/MWt2r6v540xG4loRqxm6b3Lykb0AwIgAAJFIgDBVqTVgC0LnkCpVCrFgQEnOo6jQk1LWrXaHtbEvckRZ6VS2VYqlV7mOM4mZn5QRMpEVBaRjwRB8NX6zo0xJxORVjfwReQnzOynU5YYY/6SiM5vYNSF1trPG2Oui4revyf1uZboOqpeGLY6qeT50dFRd2BgYLOIbHIc5/kwDA8bHh5+dVbeu3btwnsgAAIgUGQCEGxFXh3YVngCcfLamShOFVJtGP2ACjQRuVu/B0Gg+c9mNc/z3hsVV/9m6pc/t9buVdUg+dx1XS1OvyP5ub4IfFzo/rL6cZj5/4nIO6KjU03n8aKouLwmtT0nCIKr2phXw1cajL3BWvvGrPpHPyAAAiDQiwQg2HpxVTGn3AiUy+U1dUec7VQPuFeDA9SDtnv37g3btm3ToIH9NmPM9UT07uQhEbkkCILP7eulZlJmuK77HmZWb9r+2hPW2sxSeehAKEk112rjcxAAARDYmwAEG3YFCOyHgOu6r0xSbMSBAq9oA9iP4tqkGxzHubtSqTzXah/GmH8nIi1an7QTrbXqkWvYGgUeNEp467ruKZEXTYMRDkx1NMnM94vI67JMlKv9x8ehmm5kptVqNYOSVK3uCDwPAiDQbwQg2PptxTHffRJYtmzZkuHh4bXMrLnGtMSTHnW+tEVkNRHRwvH6dfeePXvUg7arxT5mPW6M0YhS7S9pz1hr0+Jtr+7rAw9E5L4gCF7dyA7XdY+ORdsqZv65iGjJKf36orX2bzuxvf5dHIdmSRN9gQAI9BMBCLZ+Wm3MNU1gUalUWus4juYmS76Ojh+YTmPRJK7diTjTI84VK1ZsWL9+/VST7zb1mOu6n2fmC1IP32CtTQcFNBJsSeCBRmNq0znus6xUHNRwYxiG5zuOo0e0XxsZGTltbGxMI1EzazgOzQwlOgIBEOgzAhBsfbbg/TrdUql0jGb8Z2ZNzpoINGcfPNS7polnFzX4/NfqOUuOOPd3LJkVa2OMBhDo0ex0i+p/vs/3/Wvn6t8Yo4Xaj089N5PeY6538/i8VCqNMPMdzKxRp4cw81FTU1OrcByaB230CQIg0GsEINh6bUUxH9LAgFqtpuIsEWYq0kZaRKOeKX1/h3rOwjCcjuKsVqv3tNhPR48bY9T2+0TkQcdxdorImjAMj6lWq7+Yq+O50nvM9X7Wn5fL5ePCMEw8ftp9xVqrOd/QQAAEQAAE5iAAwYYtsqAJlMtlzeS/tlarvSol0F7cwaT0OHQjMw8S0Zd8308LjA66be9VY8zVRPSB1Nvfs9a+udne5krv0Ww/WTxXH5XKzN/xff/0LPpGHyAAAiDQ6wQg2Hp9hXtofp7nrUiOM8MwTATafi/f72/6zGxFRAWZft2v3p9qtbqzKMi0zujQ0JBGhw4kNonIHwVB8I/N2thMeo9m++r0OWPMpUT0qVQ/X7DWfrrTfvE+CIAACPQDAQi2fljlBThHz/NeKiLToiwMw+TuWTspNZLZ/5yZp4WZijT9apSgtkioPM87X0S0KkHSWj5CdF13fXpO9Ql053O+nufdHB3tvjMlPs8KgkDzy6GBAAiAAAjMQQCCDVuk6wRKpdLSOFpzOiBARFSgmQ4Me1oFmeM40wJNPWi+72/toL+uvGqM0Rqh6coJn7TWpgXcnHYVzMM2az665pVKRas8oIEACIAACECwYQ8UicBhhx124ODg4DEi8t+JSFNG6MX+ZlNoNJrKr1SQJQJNE75WKhW/SHNuxxbXdf8LM38r9W5tcnLypc1URUiPVxTBFifM3UJEWif1GREZFpFTq9WqpkVBAwEQAAEQgGDDHugWgRUrViyLxZmm1DiGiI5NPEYisoWZV7Vom/7jPnOsOTAwsLFSqYy12MeCeNwYo9GoJ6SMvcZa+8FWjS/KkSgS5ra6cngeBEAABGYTwJEodkQmBDzPK2u6Ccdx1Hum4ky/9nfnLIxznc1cqK8zRD+fDgiI75zdX61WN2VibME7KZVKJziOo4LtvpiRVig43lqrx7sttaJ42JAwt6Vlw8MgAAIgsBcBCDZsipYJGGOOUlGW8pqpOEvXomy2z0eJ6PfihzU57LRAi6M19b8zrRjQrFHdfs4Y83dE9P7EDmb+se/7r2/HriIINtQPbWfl8A4IgAAIwMOGPdAkgTVr1gw9//zzxw4MDEx7zVSgxd6zVpPQ1o/4MxHZpLnOROSvJyYmNm7fvv35Js3q6cc0dYmIPJmeJDOf6fv+Te1MvAhHojgObWfl8A4IgAAIQLBhDzQgsGrVqhdOTk4ey8wf1OLfsfdsphxSm9B2M/OmWJxtqtVqm5YsWfJg1vUp27StkK95nvcXIpLOTfawtbbtdSiChw3HoYXcajAKBEBggRHAkegCW7AszF2zZs0Ldu3adRwzT3+JyHHJ0SQzj2n5ozbG2UFEesfswUSgWWs1IhCteQIDnuc9JSIHJ6+IyDlBEFzVfBezn+y2YNO9tnv3bs0FpwmJtQLFK2u12mrUD213RfEeCIBAvxKAYOvxld+fONvH1LXwue6LfRVG19d+ruJMvWdhGG5yHGeT7/uVHkeZ+/Rc1/0wM381GYiZn/V9/1Ai0jVpq3VbsLmu+0Zm/mHK+DFrbXJvsa054SUQAAEQ6EcCEGw9tOptiLOGsxeRzcyc5EZTITbjNduzZ8+mrVu3bu8hbIWZijHmZ0R0VEqwXer7/mc6MbDbgs0Y87HIs3ZFag7XW2vP6mROeBcEQAAE+pEABNsCXnWNvnMc55OO4yzW6gBE1M5RZpqA5jR7QESGHMe5WsXZk08+qUedaDkT8DzvDBH5dnoYZj6s0woN3RZsnuddKyJpgXautTYt4HImi+5BAARAoDcIQLAtsHWMUyScER1Jnk5EJxLR94jolDamMS3O4jxnDyxevPiBsbGx37TRD17JgIDneT8RkdekuvqGtfZPO+2621GixhhN3TLzPxIi8qYgCO7qdF54HwRAAAT6jQAE2wJY8QYiLW31BBEtIqJ9JaDVZ/UfzQdj79lGiLNiLXpdolw17vgwDF9TrVbv7dTSbnrY4n27mYj0qFdLiC0dGRlZh/8x6HRV8T4IgEA/EoBgK+iqzyHS6q3W2ple/MtHmVmPNR8Mw/CBJUuWbMQ/kAVd5NisBoly7/F9/7VZWN1NwYb8a1msIPoAARAAgd8RgGAr0E5Yt27doieffPKjqePOZqzbICK/FJErhoeHH9iyZcuvm3kJzxSDQNaJcutn1WXBpkefemyftPOstZcXgzysAAEQAIGFRQCCrSDrZYx5d3SseQkR/YCI/mwOszZEtTpvrtVqNyGfVUEWsE0zsk6UW29Gt+6wlUqlEWa+g5n1yP4QZj5qampqFfZrmxsFr4EACPQ9AQi2Lm8B13WPZmYVam+PTfklER1ARMN1pkGkdXmtchg+80S5RfGwlcvl47QmbMqeirV2ZQ4M0SUIgAAI9AUBCLbuLfOAMUYzwL+hgQma+6xMRBBp3Vuf3EfOI1FuUQSb67rvYebrEnuY+Tu+72tkMxoIgAAIgEAbBCDY2oCW1Sv194vS/7hNTEx8Ytu2bagekBXsAvaTR6Lc+ml260jUGHMpEX0qZc8XrLXpGqkFXBGYBAIgAALFJQDB1sW1iQWbHoEeFJtxi4hcEATBQ100C0PPA4G8EuUWxcPmed7NUaTyOxN7NHluEATXzwNaDAECIAACPUkAgq2LyxoLtg8T0SeiepEXRHd8buiiORh6HgkYY75LRG9ODZlJotwCedieiI/1p01yHGdtpVLRRM1oIAACIAACbRCAYGsDWlavGGMustZepOk81q9fP5VVv+in2ARWr1598OTkpCbFDYjoJUR0dFaJcosg2OIcgluI6GEiekZEhkXk1Gq1urvYKwPrQAAEQKC4BCDYirs2sKxHCdQfhzLzY77vd1oHtiGtbuRhQ8LcHt24mBYIgEBXCUCwdRU/Bu9HAsYYLX7+sdTcr7DWnpsHi24EHRhj1LN2ZGo+SJibx+KiTxAAgb4iAMHWV8uNyRaBgDFG85Mdl9jCzGf6vn9THrbNt2AzxpwUpaq5k4geEpGdUfLc19RqtSOQMDeP1UWfIAAC/UQAgq2fVhtz7TqB+P7aM2lDhoaGDtm8efOzeRjXBcF2KxG9NZmLiNwRBMFb8pgb+gQBEACBfiIAwdZPq425dp1Ag3QeG621r8rLsPkUbCnvWnri4SZHAAAJNUlEQVQ6p1hr1eOGBgIgAAIg0AEBCLYO4OFVEGiVQIP7a1daaz/eaj/NPj9fgs3zvLUi8n0ienHKttuttTPetmZtxnMgAAIgAAJ7E4Bgw64AgXkkYIx5nIhmamrmeX9NpzUfUaKe550tItfoeMysR7sPi8g6IjrZWqsiDg0EQAAEQKBDAhBsHQLE6yDQLIHUkeEjIrI9qrXpDQ0NnZDX/TW1K28Pm+u61zDz2XUMbgnD8KpqtarJgdFAAARAAAQyIADBlgFEdAECzRAwxtxGROkL+LdZa09r5t12n8lTsGni5zja9e1p+0Tk60EQfKBdm/EeCIAACIDA3gQg2LArQGAeCBhjTiai79UNlfuRYV5Hoq7rnsPMXyGijcw8KiKH6NyY+QO+7399HpBiCBAAARDoKwIQbH213JhstwgYY2aluyCi3L1rOtfYCzYzbS2F1ikDY4zewXuEiIaSvqJj0e1E9A7f9zXHHBoIgAAIgEDGBCDYMgaK7kCgnkC3vGt5rYQx5n4iWpvqf4KIjrLWasF3NBAAARAAgRwIQLDlABVdgkCaQLe8a3msQnTEemHUr3rpNhPRHhVqInJOEARX5TEe+gQBEAABEPgdAQg27AQQyJFAXNngXhHxHcdZJiJaYzP3u2t5TCnyrL0t8qzdUtf3P1trZwUd5DE2+gQBEACBficAwdbvOwDzz5VAfWUDEXkiCILDcx00h85XrFixbGho6L4oAnRZ0r3eW5ucnDx+69aten8NDQRAAARAIEcCEGw5wkXXINCgssEV1tpzFxqZcrn8Ic2tlrZbRN4RBEG9x22hTQ32ggAIgMCCIADBtiCWCUYuVALzXdkgD06jo6PuwMDAYyLyQ8dxyiJionEustZenMd46BMEQAAEQGBvAhBs2BUgkBOBVHTovFU2yGMqxhj1CF6W6vsX1tqX5zEW+gQBEAABEGhMAIINOwMEciLQK9Ghxpi7iOjEFKbzrLWX54QN3YIACIAACDQgAMGGbQECORHQpLUi4jmO81r9vhCjQ+PjUJtGVKvVzPj4eJATNnQLAiAAAiAAwYY9AALzRyCvslDzN4PpSgn1x6EbrLVvnE8bMBYIgAAIgADysGEPgEBuBPIsvJ6b0XUdG2N+SkTHp36N49D5go9xQAAEQCBFAEei2A4gkBOBPOp45mRqw25d130lMz9ERPcRkZafOr5Wqx2B49D5XAWMBQIgAAK/IwDBhp0AAiDQkIDnef9bRM5LffgDa+0fABcIgAAIgMD8E4Bgm3/mGBEEFgQBY8zTRHRIYqyIvDcIgusWhPEwEgRAAAR6jAAEW48tKKYDAlkQcF33LGa+NtXXM9bal2TRN/oAARAAARBonQAEW+vM8AYI9DwBY8w2InpFMlFmvsz3/U/0/MQxQRAAARAoKAEItoIuDMwCgW4RiNKRXBiNfRER+SKylZnXicjRQRD8rFs2YVwQAAEQ6HcCEGz9vgMwfxBIETDGvI2IZhV0F5HPBEFwKUCBAAiAAAh0jwAEW/fYY2QQKBSBFStWLBsaGrpPRJaljkK3T05OHr9169bthTIWxoAACIBAnxGAYOuzBcd0QWBfBDzPO1tErkl/LiLvCIJglscNBEEABEAABOafAATb/DPHiCBQOAKrV68+eHJy8l5mflREXklEpcjIi6y1FxfOWBgEAiAAAn1IAIKtDxcdUwaBegKe550RCbVvp36PNB7YJiAAAiBQIAIQbAVaDJgCAt0iYIy5nIg+nhr/Smtt+udumYZxQQAEQAAEUJoKewAEQEAJRNGh90fRoWsTGsx8pu/7N4EOCIAACIBAMQjAw1aMdYAVINA1AvH9tQeI6MnYiMOGhoaO27x587NdMwoDgwAIgAAIzCIAwYYNAQJ9TqDB/bWN1tpX9TkWTB8EQAAECkUAgq1QywFjQGD+CeD+2vwzx4ggAAIg0CoBCLZWieF5EOgxAq7rPs7MK5Np4f5ajy0wpgMCINATBCDYemIZMQkQaI+AMeYkIrqTmR8Jw3A7M3tDQ0Mn4P5aezzxFgiAAAjkRQCCLS+y6BcEFgABY8ytRPTWlKm3WWtPWwCmw0QQAAEQ6CsCEGx9tdyYLAj8B4HEu1bH5BRr7Z3gBAIgAAIgUCwCEGzFWg9YAwLzRsB13duZ+dTUgLdba9PetnmzBQOBAAiAAAjsnwAEG3YICPQhgdHRUXdgYOAxEbmHmZcS0dFEdLK19vt9iANTBgEQAIHCE4BgK/wSwUAQyJ6AMeZcIros1fMj1tqjsh8JPYIACIAACGRBAIItC4roAwQWGAFjzF1EdGLK7POstVpPFA0EQAAEQKCABCDYCrgoMAkE8ibguu4lzLyaiI4QkdVhGK4cHx8P8h4X/YMACIAACLRHAIKtPW54CwQWNAHXdavpCQRBUFrQE4LxIAACINDjBCDYenyBMT0QaETAdd31dYJtHUiBAAiAAAgUlwAEW3HXBpaBAAiAAAiAAAiAwDQBCDZsBBAAARAAARAAARAoOAEItoIvEMwDARAAARAAARAAAQg27AEQAAEQAAEQAAEQKDgBCLaCLxDMAwEQAAEQAAEQAAEINuwBEAABEAABEAABECg4AQi2gi8QzAMBEAABEAABEAABCDbsARAAARAAARAAARAoOAEItoIvEMwDARAAARAAARAAAQg27AEQAAEQAAEQAAEQKDgBCLaCLxDMAwEQAAEQAAEQAAEINuwBEAABEAABEAABECg4AQi2gi8QzAMBEAABEAABEAABCDbsARAAARAAARAAARAoOAEItoIvEMwDARAAARAAARAAAQg27AEQAAEQAAEQAAEQKDgBCLaCLxDMAwEQAAEQAAEQAAEINuwBEAABEAABEAABECg4AQi2gi8QzAMBEAABEAABEAABCDbsARAAARAAARAAARAoOAEItoIvEMwDARAAARAAARAAAQg27AEQAAEQAAEQAAEQKDgBCLaCLxDMAwEQAAEQAAEQAAEINuwBEAABEAABEAABECg4AQi2gi8QzAMBEAABEAABEAABCDbsARAAARAAARAAARAoOAEItoIvEMwDARAAARAAARAAAQg27AEQAAEQAAEQAAEQKDgBCLaCLxDMAwEQAAEQAAEQAAEINuwBEAABEAABEAABECg4gf8Prq1tc42bWO4AAAAASUVORK5CYII=', NULL),
(14, 63, 9, 'data:image/png;base64,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AiAAAiAAAr1EAIKtl7yNtYIACIAACIAACBSSAARbId0Go0EABEAABEAABHqJAARbL3kbawUBEAABEAABECgkAQi2QroNRoMACIAACIAACPQSAQi2XvI21goCIAACIAACIFBIAhBshXQbjAYBEAABEAABEOglAhBsveRtrBUEQAAEQAAEQKCQBCDYCuk2GA0CIAACIAACINBLBCDYesnbWCsIgAAIgAAIgEAhCUCwFdJtMBoEQAAEQAAEQKCXCECw9ZK3sVYQAAEQAAEQAIFCEoBgK6TbYDQIgAAIgAAIgEAvEYBg6yVvY60gAAIgAAIgAAKFJADBVki3wWgQAAEQAAEQAIFeIgDB1kvexlpBAARAAARAAAQKSQCCrZBug9EgAAIgAAIgAAK9RACCrZe8jbWCAAiAAAiAAAgUkgAEWyHdBqNBAARAAARAAAR6iQAEWy95G2sFARAAARAAARAoJAEItkK6DUaDAAiAAAiAAAj0EgEItl7yNtYKAiAAAiAAAiBQSAIQbIV0G4wGARAAARAAARDoJQIQbL3kbawVBEAABEAABECgkAQg2ArpNhgNAiAAAiAAAiDQSwQg2HrJ21grCIAACIAACIBAIQlAsBXSbTAaBEAABEAABECglwhAsPWSt7FWEAABEAABEACBQhKAYCuk22A0CIAACIAACIBALxGAYOslb2OtIAACIAACIAAChSQAwVZIt8FoEAABEAABEACBXiIAwdZL3sZaQQAEQAAEQAAECkkAgq2QboPRIAACIAACIAACvUQAgq2XvI21ggAIgAAIgAAIFJIABFsh3QajQQAEQAAEQAAEeonAfwPoIS6CHHmvrQAAAABJRU5ErkJggg==', NULL),
(15, 75, 13, 'data:image/png;base64,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', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `28_2024_signature_etudiant_innovateur`
--

DROP TABLE IF EXISTS `28_2024_signature_etudiant_innovateur`;
CREATE TABLE IF NOT EXISTS `28_2024_signature_etudiant_innovateur` (
  `id` int NOT NULL AUTO_INCREMENT,
  `signature` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `id_etudiant` int NOT NULL,
  `id_seance` int NOT NULL,
  `etab_id` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `28_2024_signature_etudiant_innovateur`
--

INSERT INTO `28_2024_signature_etudiant_innovateur` (`id`, `signature`, `id_etudiant`, `id_seance`, `etab_id`) VALUES
(1, 'data:image/png;base64,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', 1, 1, NULL),
(2, 'data:image/png;base64,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', 9, 20, NULL),
(3, 'data:image/png;base64,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AiAAAiAAAhBseAZAAARAAARAAARAIOUEINhSPkEwDwRAAARAAARAAAQg2PAMgAAIgAAIgAAIgEDKCUCwpXyCYB4IgAAIgAAIgAAIQLDhGQABEAABEAABEACBlBOAYEv5BME8EAABEAABEAABEIBgwzMAAiAAAiAAAiAAAiknAMGW8gmCeSAAAiAAAiAAAiAAwYZnAARAAARAAARAAARSTgCCLeUTBPNAAARAAARAAARAAIINzwAIgAAIgAAIgAAIpJwABFvKJwjmgQAIgAAIgAAIgAAEG54BEAABEAABEAABEEg5AQi2lE8QzAMBEAABEAABEAABCDY8AyAAAiAAAiAAAiCQcgIQbCmfIJgHAiAAAiAAAiAAAhBseAZAAARAAARAAARAIOUEINhSPkEwDwRAAARAAARAAAQg2PAMgAAIgAAIgAAIgEDKCUCwpXyCYB4IgAAIgAAIgAAIQLDhGQABEAABEAABEACBlBOAYEv5BME8EAABEAABEAABEIBgwzMAAiAAAiAAAiAAAiknAMGW8gmCeSAAAiAAAiAAAiAAwYZnAARAAARAAARAAARSTgCCLeUTBPNAAARAAARAAARA4P8AubN2kXBF8Q0AAAAASUVORK5CYII=', 9, 39, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `28_2024_stage_emploi`
--

DROP TABLE IF EXISTS `28_2024_stage_emploi`;
CREATE TABLE IF NOT EXISTS `28_2024_stage_emploi` (
  `id` int NOT NULL AUTO_INCREMENT,
  `entreprise` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `titre` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `adresse` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `date_publication` date NOT NULL,
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `etab_id` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `28_2024_stage_emploi`
--

INSERT INTO `28_2024_stage_emploi` (`id`, `entreprise`, `titre`, `adresse`, `date_publication`, `description`, `type`, `etab_id`) VALUES
(1, 'Test Entreprise', 'Test Stage', 'test adresse 123', '2024-11-27', 'Offre de stage ', 'stage', NULL),
(2, 'emploi entreprise', 'test emploi', 'adresse 123', '2024-11-27', 'c\'est une offre d\'emploi ', 'emploi', NULL),
(3, 'pfe entreprise', 'test pfe', 'adresse 456', '2024-11-27', 'c\'est une offre de pfe test description', 'PFE', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `28_2024_structure_appui`
--

DROP TABLE IF EXISTS `28_2024_structure_appui`;
CREATE TABLE IF NOT EXISTS `28_2024_structure_appui` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `prenom` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `raison_sociale` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `tel` int NOT NULL,
  `type_etab` enum('etab_public','etab_prive') NOT NULL,
  `etab_id` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `28_2024_subscribers`
--

DROP TABLE IF EXISTS `28_2024_subscribers`;
CREATE TABLE IF NOT EXISTS `28_2024_subscribers` (
  `id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `etab_id` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `28_2024_subscribers`
--

INSERT INTO `28_2024_subscribers` (`id`, `email`, `etab_id`) VALUES
(1, 'nidhalabbassi9@gmail.com', NULL),
(3, 'balkisabada@gmail.com', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `28_2024_subscribers_competition`
--

DROP TABLE IF EXISTS `28_2024_subscribers_competition`;
CREATE TABLE IF NOT EXISTS `28_2024_subscribers_competition` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_competition` int NOT NULL,
  `nom_prenom` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `message` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `cv` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `signature` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `is_accepted` enum('en_attente','oui','non') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT 'en_attente',
  `etab_id` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `28_2024_subscribers_competition`
--

INSERT INTO `28_2024_subscribers_competition` (`id`, `id_competition`, `nom_prenom`, `email`, `message`, `cv`, `signature`, `is_accepted`, `etab_id`) VALUES
(1, 1, 'Nidhal Abbassi', 'nidhalabbassi9@gmail.com', 'sdgfdgfhfghghdffhfghfgh', 'https://esen-sci-compet.com/eesu/assets/assets/images/CV_Nidhal_ABBASSI_20242.pdf', 'data:image/png;base64,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', 'non', NULL),
(2, 1, 'test', 'cherif@gmail.com', 'jg hhjgvyyvjg', 'https://esen-sci-compet.com/eesu/assets/assets/images/CV_Nidhal_ABBASSI_20243.pdf', 'data:image/png;base64,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', 'oui', NULL),
(3, 3, 'Nidhal Abbassi', 'nidhalabbassi9@gmail.com', 'qsfsdhghgfdgstrhtrhgrt', 'https://esen-sci-compet.com/peeso-28/assets/assets/images/candidature_C1_2024_032507.pdf', 'data:image/png;base64,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', 'oui', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `28_2024_subscribers_evenement`
--

DROP TABLE IF EXISTS `28_2024_subscribers_evenement`;
CREATE TABLE IF NOT EXISTS `28_2024_subscribers_evenement` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_evenement` int NOT NULL,
  `nom_prenom` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `message` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `etab_id` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `28_2024_subscribers_evenement`
--

INSERT INTO `28_2024_subscribers_evenement` (`id`, `id_evenement`, `nom_prenom`, `email`, `message`, `etab_id`) VALUES
(1, 1, 'test test', 'test@mail.com', 'test test testtest test testtest test testtest test testtest test testtest test test', NULL),
(2, 1, 'Nidhal Abbassi', 'nidhalabbassi9@gmail.com', 'pour améliorer mes compétences!', NULL),
(3, 2, 'Nidhal Abbassi', 'nidhalabbassi9@gmail.com', 'testttt testttt testttt testttt', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `28_2024_tuteur_domaine`
--

DROP TABLE IF EXISTS `28_2024_tuteur_domaine`;
CREATE TABLE IF NOT EXISTS `28_2024_tuteur_domaine` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_tuteur` int NOT NULL,
  `id_domaine` int NOT NULL,
  `etab_id` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `28_2024_tuteur_domaine`
--

INSERT INTO `28_2024_tuteur_domaine` (`id`, `id_tuteur`, `id_domaine`, `etab_id`) VALUES
(8, 3, 7, NULL),
(9, 3, 8, NULL),
(11, 2, 3, NULL),
(12, 2, 5, NULL),
(17, 1, 4, NULL),
(18, 4, 13, NULL),
(19, 5, 2, NULL),
(20, 5, 3, NULL),
(21, 6, 4, NULL),
(22, 7, 14, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `28_2024_tuteur_projet`
--

DROP TABLE IF EXISTS `28_2024_tuteur_projet`;
CREATE TABLE IF NOT EXISTS `28_2024_tuteur_projet` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_tuteur` int NOT NULL,
  `id_projet` int NOT NULL,
  `date_envoi` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `acceptation_status` int NOT NULL,
  `status` varchar(11) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `rapport` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `etab_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_tuteur` (`id_tuteur`),
  KEY `id_projet` (`id_projet`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `28_2024_tuteur_projet`
--

INSERT INTO `28_2024_tuteur_projet` (`id`, `id_tuteur`, `id_projet`, `date_envoi`, `acceptation_status`, `status`, `rapport`, `etab_id`) VALUES
(6, 1, 4, '2024-10-14 11:33:14', 0, '0', NULL, NULL),
(7, 1, 3, '2024-10-14 13:49:42', 0, '0', NULL, NULL),
(8, 2, 4, '2024-10-14 16:17:44', 0, '0', NULL, NULL),
(12, 2, 9, '2024-10-31 15:52:55', 0, '1', NULL, NULL),
(13, 3, 8, '2024-11-01 10:27:42', 0, '0', NULL, NULL),
(14, 2, 7, '2024-11-04 10:27:42', 0, '0', NULL, NULL),
(15, 5, 12, '2024-11-07 11:38:54', 0, '0', NULL, NULL),
(16, 5, 11, '2024-11-07 13:41:22', 0, '0', NULL, NULL),
(17, 5, 13, '2024-11-07 23:42:36', 0, '0', NULL, NULL),
(18, 5, 14, '2024-11-08 15:59:48', 0, '0', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `28_2024_users`
--

DROP TABLE IF EXISTS `28_2024_users`;
CREATE TABLE IF NOT EXISTS `28_2024_users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `etudiant_id` int DEFAULT NULL,
  `enseignant_id` int DEFAULT NULL,
  `structure_id` int DEFAULT NULL,
  `is_blocked` tinyint(1) NOT NULL DEFAULT '0',
  `photo` varchar(255) DEFAULT NULL,
  `google_info` int DEFAULT NULL,
  `role_referent` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `compte_incube` tinyint(1) NOT NULL DEFAULT '0',
  `etab_id` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `28_2024_users`
--

INSERT INTO `28_2024_users` (`id`, `username`, `password`, `type`, `etudiant_id`, `enseignant_id`, `structure_id`, `is_blocked`, `photo`, `google_info`, `role_referent`, `compte_incube`, `etab_id`) VALUES
(1, '11955435', 'Azerty123@@@', 'Etudiant', 1, 0, NULL, 0, 'ala.jpg', 5, '', 0, NULL),
(2, 'adminEesu', 'Eesu2024*', 'Administrateur', NULL, NULL, NULL, 0, 'admin.png', NULL, '', 1, NULL),
(3, 'nidhal', 'Azerty1@', 'Enseignant', NULL, 1, NULL, 0, NULL, NULL, 'academique', 0, NULL),
(4, 'alaaFormateur', 'alaaFormateur1@', 'Enseignant', NULL, 2, NULL, 0, 'teacher.png', 4, 'academique', 1, NULL),
(5, '22446688', 'Azerty123@@', 'Etudiant', 2, NULL, NULL, 0, NULL, NULL, '', 0, NULL),
(6, '80158240', '86326512', 'Etudiant', 4, NULL, NULL, 0, NULL, 6, '', 0, NULL),
(7, '99186482', '12395350', 'Etudiant', 5, NULL, NULL, 0, NULL, NULL, '', 0, NULL),
(8, '76095142', '28688426', 'Etudiant', 6, NULL, NULL, 0, NULL, NULL, '', 0, NULL),
(9, '18609872', '18109832', 'Etudiant', 7, NULL, NULL, 0, NULL, NULL, '', 0, NULL),
(11, '11111111', 'Azerty1@', 'Etudiant', 8, NULL, NULL, 0, 'avatar-3.jpg', NULL, '', 0, NULL),
(13, 'refrent123', 'Azerty123@@', 'Enseignant', NULL, 5, NULL, 0, 'admin.png', 8, 'academique', 1, NULL),
(14, '11955440', 'Azerty123@@', 'Etudiant', 9, NULL, NULL, 0, NULL, 7, '', 0, NULL),
(15, '51115305', '70792740', 'Etudiant', 10, NULL, NULL, 0, NULL, NULL, '', 0, NULL),
(16, '75109136', '52938434', 'Etudiant', 11, NULL, NULL, 0, NULL, NULL, '', 0, NULL),
(17, '11955470', 'Azerty123@@', 'Etudiant', 12, NULL, NULL, 0, NULL, NULL, '', 0, NULL),
(18, '11955480', 'Azerty123@@', 'Etudiant', 13, NULL, NULL, 0, NULL, 9, '', 1, NULL),
(19, '93744825', '19260871', 'Administrateur_etab', 14, NULL, NULL, 0, NULL, NULL, '', 1, NULL),
(20, 'Balkis', 'Balkis55722**', 'Etudiant', 15, NULL, NULL, 0, '151.png', NULL, '', 0, NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

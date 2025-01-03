-- phpMyAdmin SQL Dump
-- version 4.0.10deb1ubuntu0.1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Mar 10 Septembre 2019 à 07:56
-- Version du serveur: 5.5.62-0ubuntu0.14.04.1
-- Version de PHP: 7.3.4-1+ubuntu14.04.1+deb.sury.org+3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `caidp`
--

-- --------------------------------------------------------

--
-- Structure de la table `contacts`
--

CREATE TABLE IF NOT EXISTS `contacts` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `contact` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `responsable_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `contacts_responsable_id_foreign` (`responsable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `decisioncaipdps`
--

CREATE TABLE IF NOT EXISTS `decisioncaipdps` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `decison` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `decisionpredefinies`
--

CREATE TABLE IF NOT EXISTS `decisionpredefinies` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `decisonPredefinie` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `typeDecision` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=2 ;

--
-- Contenu de la table `decisionpredefinies`
--

INSERT INTO `decisionpredefinies` (`id`, `decisonPredefinie`, `typeDecision`, `created_at`, `updated_at`) VALUES
(1, 'Conformément à l’article 04 du décret n° 2014-462 du 06 août 2014 portant attributions,\r\norganisation et fonctionnement de la Commission d’Accès à l’Information d’intérêt public et aux\r\nDocuments Publics (CAIDP), les organismes publics doivent produire , au premier trimestre\r\nde chaque année, un rapport sur l’application de la loi N° 2013-867 du 23 décembre\r\n2013 relative à l’accès à l’information. Ce rapport doit contenir notamment l’indication du\r\nnombre de requêtes reçues et la suite qui leur a été donnée.\r\nLe présent document est donc proposé aux organismes publics à titre de modèle type à\r\ncharge pour eux, de le renseigner et le transmettre à la Commission d’Accès à l’Information\r\nd’intérêt public et aux Documents Publics (CAIDP).', '', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `decisions`
--

CREATE TABLE IF NOT EXISTS `decisions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `decison` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `propose_par_ri` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `valide_par_rh` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dateValidation` date NOT NULL,
  `etat` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'si 0 alors la décison n''a pas encore été validé par le responsable hiérachique ',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `demande_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `decisions_demande_id_foreign` (`demande_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `demandes`
--

CREATE TABLE IF NOT EXISTS `demandes` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `libelle` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `scane` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dateDemande` datetime NOT NULL,
  `brouillon` tinyint(1) NOT NULL DEFAULT '1',
  `requerant_id` bigint(20) unsigned NOT NULL,
  `organisme_id` bigint(20) unsigned NOT NULL,
  `direction` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `service` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dateProrogation` date DEFAULT NULL,
  `motifProrogation` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `autoEnregsitrement` tinyint(1) DEFAULT NULL,
  `favorable` int(11) DEFAULT NULL COMMENT 'Si 1 alors non satisfait, si 2 alors partiellement satisfait, si 3 totalement satisfait',
  `etat` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Si 0 alors pas encors traié, si 1 alors traité ou traiement en cours',
  `liquide` tinyint(1) DEFAULT NULL COMMENT '0=non liquide, 1=liquide',
  PRIMARY KEY (`id`),
  KEY `demandes_requerant_id_foreign` (`requerant_id`),
  KEY `demandes_organisme_id_foreign` (`organisme_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=41 ;

--
-- Contenu de la table `demandes`
--

INSERT INTO `demandes` (`id`, `libelle`, `description`, `scane`, `dateDemande`, `brouillon`, `requerant_id`, `organisme_id`, `direction`, `service`, `dateProrogation`, `motifProrogation`, `created_at`, `updated_at`, `autoEnregsitrement`, `favorable`, `etat`, `liquide`) VALUES
(30, 'Budget 2019 du tresor public', ' ', 'plan-de-circulation-du-vendredi-et-samedi_1909092710.docx', '2019-09-01 00:00:00', 0, 58, 76, '', '', NULL, NULL, '2019-09-09 11:27:10', '2019-09-09 11:27:10', NULL, NULL, 0, NULL),
(31, 'Budget 2019 du tresor public', 'bbbbbbbbbbbbbbbbbbb', NULL, '2019-09-01 00:00:00', 0, 58, 76, '', '', '2019-10-16', 'Demande', '2019-09-09 11:32:21', '2019-09-09 11:33:17', NULL, NULL, 1, NULL),
(32, 'Bilan des activités 2010', 'Aucun', NULL, '2019-08-25 00:00:00', 0, 58, 76, '', '', '2019-10-09', '??', '2019-09-09 13:37:01', '2019-09-09 13:37:49', NULL, NULL, 1, NULL),
(33, 'Libelle', ' nbbbbb', NULL, '2019-08-04 00:00:00', 0, 58, 76, '', '', '2019-09-28', 'Date', '2019-09-09 14:08:21', '2019-09-09 15:33:29', NULL, NULL, 1, NULL),
(34, 'Libelle', ' texte', NULL, '2019-09-01 00:00:00', 0, 59, 78, 'Direction', 'Service', NULL, NULL, '2019-09-09 16:20:19', '2019-09-09 16:20:19', NULL, NULL, 0, NULL),
(35, 'Libelle', 'Description ', NULL, '2019-09-01 00:00:00', 0, 58, 78, 'Direction', 'Service', NULL, NULL, '2019-09-09 16:22:47', '2019-09-09 16:22:47', NULL, NULL, 0, NULL),
(36, 'Libelle', 'Description ', NULL, '2019-09-01 00:00:00', 0, 59, 78, 'Direction', 'Service', NULL, NULL, '2019-09-09 16:25:05', '2019-09-09 16:25:05', NULL, NULL, 0, NULL),
(37, 'Libelle', 'Description ', NULL, '2019-09-01 00:00:00', 0, 58, 78, 'Direction', 'Service', '2019-10-16', 'texte', '2019-09-09 16:25:36', '2019-09-09 16:26:00', NULL, NULL, 1, NULL),
(38, 'Libelle', 'Description ', NULL, '2019-09-01 00:00:00', 0, 58, 78, 'Direction', 'Service', '2019-10-16', 'texte', '2019-09-09 16:27:00', '2019-09-09 16:27:08', NULL, NULL, 1, NULL),
(39, 'Libelle', 'Description ', NULL, '2019-09-01 00:00:00', 0, 59, 78, 'Direction', 'Service', '2019-10-16', 'texte', '2019-09-09 16:28:39', '2019-09-09 16:28:49', NULL, NULL, 1, NULL),
(40, 'Libelle', 'Description ', NULL, '2019-09-01 00:00:00', 0, 59, 78, 'Direction', 'Service', '2019-10-16', 'texte', '2019-09-09 16:29:38', '2019-09-09 16:29:47', NULL, NULL, 1, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `documents`
--

CREATE TABLE IF NOT EXISTS `documents` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `libelle` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `document` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `demande_id` bigint(20) unsigned DEFAULT NULL,
  `information_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `documents_demande_id_foreign` (`demande_id`),
  KEY `documents_information_id_foreign` (`information_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `informations`
--

CREATE TABLE IF NOT EXISTS `informations` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `libelle` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `information` text COLLATE utf8mb4_unicode_ci,
  `dateCommunication` timestamp NULL DEFAULT NULL,
  `public` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `demande_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `informations_demande_id_foreign` (`demande_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=16 ;

--
-- Contenu de la table `informations`
--

INSERT INTO `informations` (`id`, `libelle`, `information`, `dateCommunication`, `public`, `created_at`, `updated_at`, `demande_id`) VALUES
(12, 'Libelle Info demande', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.', NULL, NULL, '2019-09-09 15:37:36', '2019-09-09 15:37:36', 33),
(13, 'Libellé', 'Ajouter', NULL, NULL, '2019-09-09 16:26:39', '2019-09-09 16:26:39', 37),
(14, 'Libellé', 'Ajouter', NULL, NULL, '2019-09-09 16:28:59', '2019-09-09 16:28:59', 39),
(15, 'Libellé', 'Ajouter', NULL, NULL, '2019-09-09 16:29:51', '2019-09-09 16:29:51', 40);

-- --------------------------------------------------------

--
-- Structure de la table `mandants`
--

CREATE TABLE IF NOT EXISTS `mandants` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(191) NOT NULL,
  `prenom` varchar(191) NOT NULL,
  `sexe` varchar(1) NOT NULL,
  `profession` varchar(150) NOT NULL,
  `ville` varchar(30) DEFAULT NULL,
  `requerant_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `ville_id` (`ville`,`requerant_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `mandants`
--

INSERT INTO `mandants` (`id`, `nom`, `prenom`, `sexe`, `profession`, `ville`, `requerant_id`, `created_at`, `updated_at`) VALUES
(1, 'Gnahoré', 'Foxy', 'M', 'Dessinateur', 'Cocody', 49, '2019-09-06 09:31:10', '2019-09-06 09:31:10'),
(2, 'Gnahoré', 'Ory Xavier', 'M', 'Journaliste', 'Bouaké', 50, '2019-09-06 09:45:53', '2019-09-06 09:45:53'),
(3, 'Dobré', '', 'M', 'Sikab', 'Riviera', 58, '2019-09-09 11:26:09', '2019-09-09 11:26:09');

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=63 ;

--
-- Contenu de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_07_29_124109_add_privilege_users', 1),
(4, '2019_08_05_154947_create_usagers_table', 1),
(5, '2019_08_05_155908_create_type-personne_table', 1),
(6, '2019_08_05_160410_create_qualite_table', 1),
(7, '2019_08_05_161051_create_oraganisme_table', 1),
(8, '2019_08_05_161819_create_demandes_table', 1),
(9, '2019_08_05_165804_create_decision_table', 1),
(10, '2019_08_06_085524_create_responsables_table', 1),
(11, '2019_08_06_090011_create_contacts_table', 1),
(12, '2019_08_06_090154_create_informations_table', 1),
(13, '2019_08_06_090347_create_documents_table', 1),
(14, '2019_08_06_090631_create_decisonpredefinies_table', 1),
(15, '2019_08_06_090832_create_saisines_table', 1),
(16, '2019_08_06_091130_create_decisionscaidps_table', 1),
(17, '2019_08_06_092434_add_type-personne_in_requerants', 1),
(18, '2019_08_06_093100_add_requerants_organisme_on_demandes', 1),
(19, '2019_08_06_094038_add_demandes_on_decison', 1),
(20, '2019_08_06_094335_add_respnsables_on_contacts', 1),
(21, '2019_08_06_094653_add_demande_on_informations', 1),
(22, '2019_08_06_094803_add_documents_on_informations', 1),
(23, '2019_08_06_094942_add_demandes_on_saisines', 1),
(24, '2019_08_06_095727_drop_column_organisme_id_and_droit_on_user', 1),
(25, '2019_08_06_095944_add_organisme_and_requerant_and_caidp', 1),
(26, '2019_08_06_103425_remove_column_type_on_users', 1),
(27, '2019_08_06_120724_change_organisme_to_responsable_in_users', 1),
(28, '2019_08_08_101126_add_prorogation_table', 2),
(29, '2019_08_08_101308_remove_date_prorogation_from_demande', 2),
(31, '2019_08_08_165905_add_organisme_to_responsable', 3),
(32, '2019_08_08_171352_change_demande_description', 3),
(33, '2019_08_14_164733_add_date_proro_to_demande', 4),
(34, '2019_08_14_165045_add_motifpro_to_demande', 5),
(35, '2019_08_14_170515_add_auto_enregistrement_on_demandes', 6),
(39, '2019_08_15_123831_modify_documents', 7),
(40, '2019_08_15_124915_add__demande_id_null_on_informations', 7),
(45, '2019_08_19_104827_change_demande', 8),
(46, '2019_08_19_141012_add_refuscommnication_table', 9),
(47, '2019_08_20_090633_make_information_nullable_on_information', 10),
(48, '2019_08_20_101000_make_type_decision_nullable_on_decisionpredefinies', 11),
(49, '2019_08_20_110319_create_notifications_table', 12),
(50, '2019_08_21_114429_add_email_on_organisme_table', 13),
(56, '2019_08_25_142901_add_scane_on_documents', 14),
(57, '2019_08_30_134043_qualite_resposable_table', 14),
(61, '2019_08_30_134613_add_siege_on_organismes', 15),
(62, '2019_08_30_134812_remove_situgeo_on_responsable', 15);

-- --------------------------------------------------------

--
-- Structure de la table `notifications`
--

CREATE TABLE IF NOT EXISTS `notifications` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` bigint(20) unsigned NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `notifications`
--

INSERT INTO `notifications` (`id`, `type`, `notifiable_type`, `notifiable_id`, `data`, `read_at`, `created_at`, `updated_at`) VALUES
('00c911f8-b2fa-4714-8531-5af8d8c12401', 'App\\Notifications\\NewAccount', 'App\\User', 77, '{"message":"Bonjour Ory Franck, bienvenu(e) sur la plateforme d''acc\\u00e8s \\u00e0 l''infrmation.","etat":"success"}', NULL, '2019-09-05 11:52:49', '2019-09-05 11:52:49'),
('00de15f1-62dc-44c3-942b-9f56e69f3cf6', 'App\\Notifications\\NewAccount', 'App\\User', 100, '{"message":"Bonjour Ossey Tanguy, bienvenu(e) sur la plateforme d''acc\\u00e8s \\u00e0 l''infrmation.","etat":"success"}', NULL, '2019-09-09 16:47:12', '2019-09-09 16:47:12'),
('00e1a1ee-66eb-4abe-b6c0-7beb8ae6628e', 'App\\Notifications\\NotifierProrogation', 'App\\User', 94, '{"etat":"info","message":"Votre demande d''acc\\u00e8s \\u00e0 l''information relative \\u00e0 : Bilan des activit\\u00e9s 2010 a \\u00e9t\\u00e9 prorog\\u00e9e au 09 Octobre 2019"}', NULL, '2019-09-09 13:37:50', '2019-09-09 13:37:50'),
('02c58aa8-2f01-4959-981e-74427fc91d19', 'App\\Notifications\\NotifierProrogation', 'App\\User', 95, '{"etat":"info","message":"Votre demande d''acc\\u00e8s \\u00e0 l''information relative \\u00e0 : Libelle a \\u00e9t\\u00e9 prorog\\u00e9e au 16 Octobre 2019"}', NULL, '2019-09-09 16:27:10', '2019-09-09 16:27:10'),
('03f637e2-bfc8-4828-a63e-57b0f8a22e4a', 'App\\Notifications\\NotifierProrogation', 'App\\User', 54, '{"etat":"info","message":"Votre demande d''acc\\u00e8s \\u00e0 l''information relative \\u00e0 : hxdhdh a \\u00e9t\\u00e9 prorog\\u00e9e au 10 Septembre 2019"}', NULL, '2019-09-09 10:49:04', '2019-09-09 10:49:04'),
('0a87ac58-bddd-49fb-a548-a92035306c16', 'App\\Notifications\\NewAccount', 'App\\User', 72, '{"message":"Bonjour Ory Franck, bienvenu(e) sur la plateforme d''acc\\u00e8s \\u00e0 l''infrmation.","etat":"success"}', NULL, '2019-09-05 11:43:54', '2019-09-05 11:43:54'),
('18696a7c-0952-4b4a-8efa-805b02b8b2fb', 'App\\Notifications\\NotifierProrogation', 'App\\User', 94, '{"etat":"info","message":"Votre demande d''acc\\u00e8s \\u00e0 l''information relative \\u00e0 : Libelle a \\u00e9t\\u00e9 prorog\\u00e9e au 28 Septembre 2019"}', NULL, '2019-09-09 15:33:30', '2019-09-09 15:33:30'),
('1c095743-0ee9-4f58-881d-4ecdd3a5a10d', 'App\\Notifications\\NewAccount', 'App\\User', 88, '{"message":"Bonjour Ory , bienvenu(e) sur la plateforme d''acc\\u00e8s \\u00e0 l''infrmation.","etat":"success"}', NULL, '2019-09-06 09:56:10', '2019-09-06 09:56:10'),
('1d6f3f9c-7a76-4974-bf73-8f55dad506c3', 'App\\Notifications\\NewAccount', 'App\\User', 54, '{"message":"Bonjour Ory Franck, bienvenu(e) sur la plateforme d''acc\\u00e8s \\u00e0 l''infrmation.","etat":"success"}', NULL, '2019-09-03 15:48:43', '2019-09-03 15:48:43'),
('1fefddf5-0fea-4b14-a5c0-ebaf22d8ac5b', 'App\\Notifications\\NewAccount', 'App\\User', 65, '{"message":"Bonjour Ory Franck, bienvenu(e) sur la plateforme d''acc\\u00e8s \\u00e0 l''infrmation.","etat":"success"}', NULL, '2019-09-05 10:59:51', '2019-09-05 10:59:51'),
('2021e9de-9852-42d9-8f3d-fc2a292a8576', 'App\\Notifications\\NewAccount', 'App\\User', 80, '{"message":"Bonjour Ory Franck, bienvenu(e) sur la plateforme d''acc\\u00e8s \\u00e0 l''infrmation.","etat":"success"}', NULL, '2019-09-05 12:04:18', '2019-09-05 12:04:18'),
('2587a5c2-bd0d-40ec-8574-d7faa4ef210d', 'App\\Notifications\\NewAccount', 'App\\User', 101, '{"message":"Bonjour Ossey Tanguy, bienvenu(e) sur la plateforme d''acc\\u00e8s \\u00e0 l''infrmation.","etat":"success"}', NULL, '2019-09-09 16:57:07', '2019-09-09 16:57:07'),
('25b2d560-356c-485d-98c3-47d96aa367af', 'App\\Notifications\\NotifierProrogation', 'App\\User', 54, '{"etat":"info","message":"Votre demande d''acc\\u00e8s \\u00e0 l''information relative \\u00e0 : Bilan des activit\\u00e9s 2019 a \\u00e9t\\u00e9 prorog\\u00e9e au 02 Septembre 2019"}', NULL, '2019-09-04 09:20:45', '2019-09-04 09:20:45'),
('2a92abff-e9e1-4a06-9eba-83d5bbe1ff8a', 'App\\Notifications\\NewAccount', 'App\\User', 96, '{"message":"Bonjour Ory Franck, bienvenu(e) sur la plateforme d''acc\\u00e8s \\u00e0 l''infrmation.","etat":"success"}', NULL, '2019-09-09 15:57:46', '2019-09-09 15:57:46'),
('2d04860e-a856-4b48-b99f-9cb6fd1b8988', 'App\\Notifications\\NotifierProrogation', 'App\\User', 95, '{"etat":"info","message":"Votre demande d''acc\\u00e8s \\u00e0 l''information relative \\u00e0 : Libelle a \\u00e9t\\u00e9 prorog\\u00e9e au 16 Octobre 2019"}', NULL, '2019-09-09 16:26:03', '2019-09-09 16:26:03'),
('355120db-fe15-48b7-afc8-502f6f842141', 'App\\Notifications\\NewAccount', 'App\\User', 79, '{"message":"Bonjour Ory Franck, bienvenu(e) sur la plateforme d''acc\\u00e8s \\u00e0 l''infrmation.","etat":"success"}', NULL, '2019-09-05 11:54:48', '2019-09-05 11:54:48'),
('37e358b3-5fb8-4a36-9c53-0435a4d0f008', 'App\\Notifications\\NewAccount', 'App\\User', 57, '{"message":"Bonjour Ory Franck, bienvenu(e) sur la plateforme d''acc\\u00e8s \\u00e0 l''infrmation.","etat":"success"}', NULL, '2019-09-04 11:53:24', '2019-09-04 11:53:24'),
('3d9860c0-4244-4e77-9a5f-0b9453838457', 'App\\Notifications\\NewAccount', 'App\\User', 94, '{"message":"Bonjour Ory Franck, bienvenu(e) sur la plateforme d''acc\\u00e8s \\u00e0 l''infrmation.","etat":"success"}', NULL, '2019-09-09 11:21:53', '2019-09-09 11:21:53'),
('41b4cd3c-b18a-4934-85d9-15a28e3ea9ea', 'App\\Notifications\\NotifierProrogation', 'App\\User', 54, '{"etat":"info","message":"Votre demande d''acc\\u00e8s \\u00e0 l''information relative \\u00e0 : Bilan des activit\\u00e9s 2019 a \\u00e9t\\u00e9 prorog\\u00e9e au 26 Septembre 2019"}', NULL, '2019-09-04 10:22:24', '2019-09-04 10:22:24'),
('41f94e68-e888-44da-81d4-ccbfd1057a35', 'App\\Notifications\\NotifierProrogation', 'App\\User', 55, '{"etat":"info","message":"Votre demande d''acc\\u00e8s \\u00e0 l''information relative \\u00e0 : Bilan des activit\\u00e9s 2019 a \\u00e9t\\u00e9 prorog\\u00e9e au 26 Septembre 2019"}', NULL, '2019-09-04 10:22:21', '2019-09-04 10:22:21'),
('42059941-7159-4e9f-8f85-61ef4cd0888c', 'App\\Notifications\\NewAccount', 'App\\User', 71, '{"message":"Bonjour Ory Franck, bienvenu(e) sur la plateforme d''acc\\u00e8s \\u00e0 l''infrmation.","etat":"success"}', NULL, '2019-09-05 11:42:35', '2019-09-05 11:42:35'),
('47254b18-e4ca-44f4-b3f7-ea6cd09df89e', 'App\\Notifications\\NewAccount', 'App\\User', 62, '{"message":"Bonjour Ory Franck, bienvenu(e) sur la plateforme d''acc\\u00e8s \\u00e0 l''infrmation.","etat":"success"}', NULL, '2019-09-04 14:31:12', '2019-09-04 14:31:12'),
('491b62a2-cf40-493c-adfe-0d2a11330032', 'App\\Notifications\\NotifierProrogation', 'App\\User', 95, '{"etat":"info","message":"Votre demande d''acc\\u00e8s \\u00e0 l''information relative \\u00e0 : Libelle a \\u00e9t\\u00e9 prorog\\u00e9e au 16 Octobre 2019"}', NULL, '2019-09-09 16:27:09', '2019-09-09 16:27:09'),
('4dc5c109-e857-41ee-aa27-a83aa1b9e0f7', 'App\\Notifications\\NewAccount', 'App\\User', 98, '{"message":"Bonjour Ory , bienvenu(e) sur la plateforme d''acc\\u00e8s \\u00e0 l''infrmation.","etat":"success"}', NULL, '2019-09-09 16:16:17', '2019-09-09 16:16:17'),
('548ace5c-ac40-4415-bdd2-1fd2330e014d', 'App\\Notifications\\NewAccount', 'App\\User', 95, '{"message":"Bonjour Franck Xavier Ory, bienvenu(e) sur la plateforme d''acc\\u00e8s \\u00e0 l''infrmation.","etat":"success"}', NULL, '2019-09-09 11:26:09', '2019-09-09 11:26:09'),
('55524d8d-2223-4dee-980e-af86b6625bcd', 'App\\Notifications\\NotifierProrogation', 'App\\User', 95, '{"etat":"info","message":"Votre demande d''acc\\u00e8s \\u00e0 l''information relative \\u00e0 : Libelle a \\u00e9t\\u00e9 prorog\\u00e9e au 19 Septembre 2019"}', NULL, '2019-09-09 15:29:23', '2019-09-09 15:29:23'),
('56169508-c5f4-4d99-8e8a-cf08dc557d73', 'App\\Notifications\\NotifierProrogation', 'App\\User', 55, '{"etat":"info","message":"Votre demande d''acc\\u00e8s \\u00e0 l''information relative \\u00e0 : hxdhdh a \\u00e9t\\u00e9 prorog\\u00e9e au 10 Septembre 2019"}', NULL, '2019-09-09 10:49:11', '2019-09-09 10:49:11'),
('568b3042-d84a-4366-bbee-0d8dcfe5902a', 'App\\Notifications\\NewAccount', 'App\\User', 59, '{"message":"Bonjour Ali Patrick, bienvenu(e) sur la plateforme d''acc\\u00e8s \\u00e0 l''infrmation.","etat":"success"}', NULL, '2019-09-04 12:30:08', '2019-09-04 12:30:08'),
('571b770f-c004-4a0c-8351-f2c06f2edf78', 'App\\Notifications\\NewAccount', 'App\\User', 87, '{"message":"Bonjour Ory , bienvenu(e) sur la plateforme d''acc\\u00e8s \\u00e0 l''infrmation.","etat":"success"}', NULL, '2019-09-06 09:55:06', '2019-09-06 09:55:06'),
('5df907f4-93ad-485f-b856-9ea0be82108c', 'App\\Notifications\\NewAccount', 'App\\User', 92, '{"message":"Bonjour Gnahor\\u00e9 Ory, bienvenu(e) sur la plateforme d''acc\\u00e8s \\u00e0 l''infrmation.","etat":"success"}', NULL, '2019-09-06 10:57:54', '2019-09-06 10:57:54'),
('5ec53422-e60f-46b3-88c5-d25a8d9fa8f0', 'App\\Notifications\\NotifierProrogation', 'App\\User', 94, '{"etat":"info","message":"Votre demande d''acc\\u00e8s \\u00e0 l''information relative \\u00e0 : Libelle a \\u00e9t\\u00e9 prorog\\u00e9e au 28 Septembre 2019"}', NULL, '2019-09-09 15:33:31', '2019-09-09 15:33:31'),
('6096e4de-0514-4f5c-ace6-715797bc0116', 'App\\Notifications\\NotifierProrogation', 'App\\User', 97, '{"etat":"info","message":"Votre demande d''acc\\u00e8s \\u00e0 l''information relative \\u00e0 : Libelle a \\u00e9t\\u00e9 prorog\\u00e9e au 16 Octobre 2019"}', NULL, '2019-09-09 16:26:03', '2019-09-09 16:26:03'),
('60995551-6086-4add-9b0d-9f3325b709a8', 'App\\Notifications\\NotifierProrogation', 'App\\User', 95, '{"etat":"info","message":"Votre demande d''acc\\u00e8s \\u00e0 l''information relative \\u00e0 : Libelle a \\u00e9t\\u00e9 prorog\\u00e9e au 09 Octobre 2019"}', NULL, '2019-09-09 15:03:52', '2019-09-09 15:03:52'),
('6c512b71-7dd0-48fd-ab53-658d1a1b5515', 'App\\Notifications\\NotifierProrogation', 'App\\User', 95, '{"etat":"info","message":"Votre demande d''acc\\u00e8s \\u00e0 l''information relative \\u00e0 : Bilan des activit\\u00e9s 2010 a \\u00e9t\\u00e9 prorog\\u00e9e au 09 Octobre 2019"}', NULL, '2019-09-09 13:37:50', '2019-09-09 13:37:50'),
('6f88470e-1b98-4686-a86b-9757cfbc4704', 'App\\Notifications\\NotifierProrogation', 'App\\User', 98, '{"etat":"info","message":"Votre demande d''acc\\u00e8s \\u00e0 l''information relative \\u00e0 : Libelle a \\u00e9t\\u00e9 prorog\\u00e9e au 16 Octobre 2019"}', NULL, '2019-09-09 16:29:49', '2019-09-09 16:29:49'),
('70509108-bb19-4881-abb6-39a5f637b873', 'App\\Notifications\\NotifierProrogation', 'App\\User', 97, '{"etat":"info","message":"Votre demande d''acc\\u00e8s \\u00e0 l''information relative \\u00e0 : Libelle a \\u00e9t\\u00e9 prorog\\u00e9e au 16 Octobre 2019"}', NULL, '2019-09-09 16:26:06', '2019-09-09 16:26:06'),
('73614411-20ef-4d96-a586-4bce155a6a5a', 'App\\Notifications\\NewAccount', 'App\\User', 93, '{"message":"Bonjour Ory , bienvenu(e) sur la plateforme d''acc\\u00e8s \\u00e0 l''infrmation.","etat":"success"}', NULL, '2019-09-06 13:00:29', '2019-09-06 13:00:29'),
('76400961-e396-4520-a7b5-7359441b92b9', 'App\\Notifications\\NewAccount', 'App\\User', 83, '{"message":"Bonjour Gnahor\\u00e9 Ory Franck, bienvenu(e) sur la plateforme d''acc\\u00e8s \\u00e0 l''infrmation.","etat":"success"}', NULL, '2019-09-06 08:46:28', '2019-09-06 08:46:28'),
('78bc9efd-f6bf-483e-a818-32db0213bd9e', 'App\\Notifications\\NewAccount', 'App\\User', 55, '{"message":"Bonjour Franck Xavier Ory, bienvenu(e) sur la plateforme d''acc\\u00e8s \\u00e0 l''infrmation.","etat":"success"}', NULL, '2019-09-04 08:45:56', '2019-09-04 08:45:56'),
('79ea703c-a973-4d4c-813e-5c400393ac91', 'App\\Notifications\\NotifierProrogation', 'App\\User', 97, '{"etat":"info","message":"Votre demande d''acc\\u00e8s \\u00e0 l''information relative \\u00e0 : Libelle a \\u00e9t\\u00e9 prorog\\u00e9e au 16 Octobre 2019"}', NULL, '2019-09-09 16:27:09', '2019-09-09 16:27:09'),
('7a39039b-42da-4465-9923-67a0f2e2e52d', 'App\\Notifications\\NotifierProrogation', 'App\\User', 54, '{"etat":"info","message":"Votre demande d''acc\\u00e8s \\u00e0 l''information relative \\u00e0 : hxdhdh a \\u00e9t\\u00e9 prorog\\u00e9e au 10 Septembre 2019"}', NULL, '2019-09-09 10:49:05', '2019-09-09 10:49:05'),
('7a70ca2e-dbde-4198-a7ba-75498c435b22', 'App\\Notifications\\NewAccount', 'App\\User', 58, '{"message":"Bonjour Ossey Tanguy, bienvenu(e) sur la plateforme d''acc\\u00e8s \\u00e0 l''infrmation.","etat":"success"}', NULL, '2019-09-04 12:19:59', '2019-09-04 12:19:59'),
('7b5bc16c-3c1f-4482-b507-b5e5957cd872', 'App\\Notifications\\NotifierProrogation', 'App\\User', 98, '{"etat":"info","message":"Votre demande d''acc\\u00e8s \\u00e0 l''information relative \\u00e0 : Libelle a \\u00e9t\\u00e9 prorog\\u00e9e au 16 Octobre 2019"}', NULL, '2019-09-09 16:28:50', '2019-09-09 16:28:50'),
('7f514c6a-ef34-4b04-9f07-0247a9a70f79', 'App\\Notifications\\NotifierProrogation', 'App\\User', 95, '{"etat":"info","message":"Votre demande d''acc\\u00e8s \\u00e0 l''information relative \\u00e0 : Budget 2019 du tresor public a \\u00e9t\\u00e9 prorog\\u00e9e au 16 Octobre 2019"}', NULL, '2019-09-09 11:34:08', '2019-09-09 11:34:08'),
('80bf71c9-c181-45de-b420-2c5939e7972d', 'App\\Notifications\\NotifierProrogation', 'App\\User', 97, '{"etat":"info","message":"Votre demande d''acc\\u00e8s \\u00e0 l''information relative \\u00e0 : Libelle a \\u00e9t\\u00e9 prorog\\u00e9e au 16 Octobre 2019"}', NULL, '2019-09-09 16:28:50', '2019-09-09 16:28:50'),
('8b66d011-8606-4f7b-bcc1-96df1bf98cc8', 'App\\Notifications\\NotifierProrogation', 'App\\User', 55, '{"etat":"info","message":"Votre demande d''acc\\u00e8s \\u00e0 l''information relative \\u00e0 : hxdhdh a \\u00e9t\\u00e9 prorog\\u00e9e au 10 Septembre 2019"}', NULL, '2019-09-09 10:49:04', '2019-09-09 10:49:04'),
('8f018a85-9068-4d35-9cb2-46cb514d31ce', 'App\\Notifications\\NotifierProrogation', 'App\\User', 55, '{"etat":"info","message":"Votre demande d''acc\\u00e8s \\u00e0 l''information relative \\u00e0 : Bilan des activit\\u00e9s 2019 a \\u00e9t\\u00e9 prorog\\u00e9e au 26 Septembre 2019"}', NULL, '2019-09-04 10:22:24', '2019-09-04 10:22:24'),
('8f36703d-3d28-4267-ba11-6ca34988ff81', 'App\\Notifications\\NewAccount', 'App\\User', 91, '{"message":"Bonjour Ory , bienvenu(e) sur la plateforme d''acc\\u00e8s \\u00e0 l''infrmation.","etat":"success"}', NULL, '2019-09-06 10:46:49', '2019-09-06 10:46:49'),
('92299618-f8ba-4bcf-b9d5-df170158a71c', 'App\\Notifications\\NotifierProrogation', 'App\\User', 55, '{"etat":"info","message":"Votre demande d''acc\\u00e8s \\u00e0 l''information relative \\u00e0 : Bilan des activit\\u00e9s 2019 a \\u00e9t\\u00e9 prorog\\u00e9e au 02 Septembre 2019"}', NULL, '2019-09-04 09:20:45', '2019-09-04 09:20:45'),
('95507568-dddc-4dc5-a246-67710defedb9', 'App\\Notifications\\NewAccount', 'App\\User', 74, '{"message":"Bonjour Ory Franck, bienvenu(e) sur la plateforme d''acc\\u00e8s \\u00e0 l''infrmation.","etat":"success"}', NULL, '2019-09-05 11:49:59', '2019-09-05 11:49:59'),
('962a18fc-9a59-4de4-85a8-68b9211a10c2', 'App\\Notifications\\NewAccount', 'App\\User', 75, '{"message":"Bonjour Ory Franck, bienvenu(e) sur la plateforme d''acc\\u00e8s \\u00e0 l''infrmation.","etat":"success"}', NULL, '2019-09-05 11:51:11', '2019-09-05 11:51:11'),
('97531c5e-2e06-4ee0-b4e0-1392c41dccb7', 'App\\Notifications\\NewAccount', 'App\\User', 64, '{"message":"Bonjour Ory Franck, bienvenu(e) sur la plateforme d''acc\\u00e8s \\u00e0 l''infrmation.","etat":"success"}', NULL, '2019-09-04 16:44:10', '2019-09-04 16:44:10'),
('a661e60e-954c-4718-aecc-c21d6ae278a2', 'App\\Notifications\\NotifierProrogation', 'App\\User', 54, '{"etat":"info","message":"Votre demande d''acc\\u00e8s \\u00e0 l''information relative \\u00e0 : hxdhdh a \\u00e9t\\u00e9 prorog\\u00e9e au 10 Septembre 2019"}', NULL, '2019-09-09 10:49:11', '2019-09-09 10:49:11'),
('a9ac82ba-6f6f-4a2e-8672-7c4c54f4c9a0', 'App\\Notifications\\NotifierProrogation', 'App\\User', 97, '{"etat":"info","message":"Votre demande d''acc\\u00e8s \\u00e0 l''information relative \\u00e0 : Libelle a \\u00e9t\\u00e9 prorog\\u00e9e au 16 Octobre 2019"}', NULL, '2019-09-09 16:27:10', '2019-09-09 16:27:10'),
('aac3746e-7ded-46db-861e-5c5a26271fba', 'App\\Notifications\\NewAccount', 'App\\User', 84, '{"message":"Bonjour Ory , bienvenu(e) sur la plateforme d''acc\\u00e8s \\u00e0 l''infrmation.","etat":"success"}', NULL, '2019-09-06 09:13:26', '2019-09-06 09:13:26'),
('aef29f54-4746-416b-b386-bf228dedfe0b', 'App\\Notifications\\NewAccount', 'App\\User', 76, '{"message":"Bonjour Ory Franck, bienvenu(e) sur la plateforme d''acc\\u00e8s \\u00e0 l''infrmation.","etat":"success"}', NULL, '2019-09-05 11:51:41', '2019-09-05 11:51:41'),
('b4a7a913-910f-4416-a5c3-ea89ed8bdbf4', 'App\\Notifications\\NewAccount', 'App\\User', 90, '{"message":"Bonjour Gnaohr\\u00e9 Ory Franck, bienvenu(e) sur la plateforme d''acc\\u00e8s \\u00e0 l''infrmation.","etat":"success"}', NULL, '2019-09-06 10:06:34', '2019-09-06 10:06:34'),
('bb8de08d-007c-4276-b002-4d9f2afbc36c', 'App\\Notifications\\NotifierProrogation', 'App\\User', 98, '{"etat":"info","message":"Votre demande d''acc\\u00e8s \\u00e0 l''information relative \\u00e0 : Libelle a \\u00e9t\\u00e9 prorog\\u00e9e au 16 Octobre 2019"}', NULL, '2019-09-09 16:28:50', '2019-09-09 16:28:50'),
('bbb95f8c-3ee5-45a9-ba51-64453a33faad', 'App\\Notifications\\NotifierProrogation', 'App\\User', 55, '{"etat":"info","message":"Votre demande d''acc\\u00e8s \\u00e0 l''information relative \\u00e0 : hxdhdh a \\u00e9t\\u00e9 prorog\\u00e9e au 10 Septembre 2019"}', NULL, '2019-09-09 10:49:05', '2019-09-09 10:49:05'),
('c175168a-a59a-486a-9875-e5c881183ce5', 'App\\Notifications\\NotifierProrogation', 'App\\User', 98, '{"etat":"info","message":"Votre demande d''acc\\u00e8s \\u00e0 l''information relative \\u00e0 : Libelle a \\u00e9t\\u00e9 prorog\\u00e9e au 16 Octobre 2019"}', NULL, '2019-09-09 16:29:49', '2019-09-09 16:29:49'),
('c5adfae5-5f87-44d4-9f8e-e4c19ab156b0', 'App\\Notifications\\NewAccount', 'App\\User', 78, '{"message":"Bonjour Ory Franck, bienvenu(e) sur la plateforme d''acc\\u00e8s \\u00e0 l''infrmation.","etat":"success"}', NULL, '2019-09-05 11:53:51', '2019-09-05 11:53:51'),
('c82a30ec-56e6-47ba-9bf8-df4dde4412cc', 'App\\Notifications\\NewAccount', 'App\\User', 85, '{"message":"Bonjour Ory , bienvenu(e) sur la plateforme d''acc\\u00e8s \\u00e0 l''infrmation.","etat":"success"}', NULL, '2019-09-06 09:15:21', '2019-09-06 09:15:21'),
('cb94c3a4-5595-45bd-a7f0-ea99a493ea10', 'App\\Notifications\\NotifierProrogation', 'App\\User', 95, '{"etat":"info","message":"Votre demande d''acc\\u00e8s \\u00e0 l''information relative \\u00e0 : Budget 2019 du tresor public a \\u00e9t\\u00e9 prorog\\u00e9e au 16 Octobre 2019"}', NULL, '2019-09-09 11:38:21', '2019-09-09 11:38:21'),
('cdc1ddac-231d-46d0-b7da-22365c9b2d92', 'App\\Notifications\\NewAccount', 'App\\User', 99, '{"message":"Bonjour Ossey Tanguy, bienvenu(e) sur la plateforme d''acc\\u00e8s \\u00e0 l''infrmation.","etat":"success"}', NULL, '2019-09-09 16:43:57', '2019-09-09 16:43:57'),
('d2017c15-3fec-4560-9168-af5e026fafca', 'App\\Notifications\\NotifierProrogation', 'App\\User', 94, '{"etat":"info","message":"Votre demande d''acc\\u00e8s \\u00e0 l''information relative \\u00e0 : Budget 2019 du tresor public a \\u00e9t\\u00e9 prorog\\u00e9e au 16 Octobre 2019"}', NULL, '2019-09-09 11:34:08', '2019-09-09 11:34:08'),
('d38c363a-0527-4bb0-ab62-60a7cc744b38', 'App\\Notifications\\NotifierProrogation', 'App\\User', 94, '{"etat":"info","message":"Votre demande d''acc\\u00e8s \\u00e0 l''information relative \\u00e0 : Budget 2019 du tresor public a \\u00e9t\\u00e9 prorog\\u00e9e au 16 Octobre 2019"}', NULL, '2019-09-09 11:38:21', '2019-09-09 11:38:21'),
('d39e9d9e-3e20-4910-bf14-298148a07f39', 'App\\Notifications\\NotifierProrogation', 'App\\User', 94, '{"etat":"info","message":"Votre demande d''acc\\u00e8s \\u00e0 l''information relative \\u00e0 : Libelle a \\u00e9t\\u00e9 prorog\\u00e9e au 09 Octobre 2019"}', NULL, '2019-09-09 15:03:53', '2019-09-09 15:03:53'),
('d42da609-7427-4f7c-93ef-2010f9314eaa', 'App\\Notifications\\NotifierProrogation', 'App\\User', 97, '{"etat":"info","message":"Votre demande d''acc\\u00e8s \\u00e0 l''information relative \\u00e0 : Libelle a \\u00e9t\\u00e9 prorog\\u00e9e au 16 Octobre 2019"}', NULL, '2019-09-09 16:28:50', '2019-09-09 16:28:50'),
('d42ea6ef-4b6f-4861-a114-81ee1c926396', 'App\\Notifications\\NotifierProrogation', 'App\\User', 95, '{"etat":"info","message":"Votre demande d''acc\\u00e8s \\u00e0 l''information relative \\u00e0 : Libelle a \\u00e9t\\u00e9 prorog\\u00e9e au 28 Septembre 2019"}', NULL, '2019-09-09 15:33:31', '2019-09-09 15:33:31'),
('d993c3d7-e587-48f6-9a95-6253b584c249', 'App\\Notifications\\NewAccount', 'App\\User', 82, '{"message":"Bonjour Ory Franck, bienvenu(e) sur la plateforme d''acc\\u00e8s \\u00e0 l''infrmation.","etat":"success"}', NULL, '2019-09-05 17:14:29', '2019-09-05 17:14:29'),
('dbb5f45d-2257-42c4-81b3-204a13295f1d', 'App\\Notifications\\NewAccount', 'App\\User', 89, '{"message":"Bonjour Gnahor\\u00e9 Ory, bienvenu(e) sur la plateforme d''acc\\u00e8s \\u00e0 l''infrmation.","etat":"success"}', NULL, '2019-09-06 09:59:45', '2019-09-06 09:59:45'),
('dbf671b2-2c1d-4a6b-9446-e4969e0053ea', 'App\\Notifications\\NewAccount', 'App\\User', 81, '{"message":"Bonjour Ory Franck, bienvenu(e) sur la plateforme d''acc\\u00e8s \\u00e0 l''infrmation.","etat":"success"}', NULL, '2019-09-05 12:06:20', '2019-09-05 12:06:20'),
('df0daf44-4775-4730-adae-af489dd86141', 'App\\Notifications\\NotifierProrogation', 'App\\User', 94, '{"etat":"info","message":"Votre demande d''acc\\u00e8s \\u00e0 l''information relative \\u00e0 : Libelle a \\u00e9t\\u00e9 prorog\\u00e9e au 19 Septembre 2019"}', NULL, '2019-09-09 15:29:23', '2019-09-09 15:29:23'),
('df50ad50-3ce4-4752-bc39-7a13cf226944', 'App\\Notifications\\NotifierProrogation', 'App\\User', 95, '{"etat":"info","message":"Votre demande d''acc\\u00e8s \\u00e0 l''information relative \\u00e0 : Libelle a \\u00e9t\\u00e9 prorog\\u00e9e au 28 Septembre 2019"}', NULL, '2019-09-09 15:33:30', '2019-09-09 15:33:30'),
('e08ce6ac-47af-4206-bb4b-3b091f279ef8', 'App\\Notifications\\NotifierProrogation', 'App\\User', 97, '{"etat":"info","message":"Votre demande d''acc\\u00e8s \\u00e0 l''information relative \\u00e0 : Libelle a \\u00e9t\\u00e9 prorog\\u00e9e au 16 Octobre 2019"}', NULL, '2019-09-09 16:29:49', '2019-09-09 16:29:49'),
('e121b6cf-80c8-41a8-a5fd-2c6648e7a7ac', 'App\\Notifications\\NotifierProrogation', 'App\\User', 54, '{"etat":"info","message":"Votre demande d''acc\\u00e8s \\u00e0 l''information relative \\u00e0 : Bilan des activit\\u00e9s 2019 a \\u00e9t\\u00e9 prorog\\u00e9e au 26 Septembre 2019"}', NULL, '2019-09-04 10:22:24', '2019-09-04 10:22:24'),
('ed0c29ca-6cc6-461a-b2bf-88106ff4fe18', 'App\\Notifications\\NewAccount', 'App\\User', 97, '{"message":"Bonjour Ory Franck, bienvenu(e) sur la plateforme d''acc\\u00e8s \\u00e0 l''infrmation.","etat":"success"}', NULL, '2019-09-09 15:59:39', '2019-09-09 15:59:39'),
('f3095f61-5a1e-44ec-8136-d7d2df4cc236', 'App\\Notifications\\NewAccount', 'App\\User', 73, '{"message":"Bonjour Ory Franck, bienvenu(e) sur la plateforme d''acc\\u00e8s \\u00e0 l''infrmation.","etat":"success"}', NULL, '2019-09-05 11:49:15', '2019-09-05 11:49:15'),
('f5e9184b-4b43-4180-8217-c1879628e9ad', 'App\\Notifications\\NotifierProrogation', 'App\\User', 95, '{"etat":"info","message":"Votre demande d''acc\\u00e8s \\u00e0 l''information relative \\u00e0 : Libelle a \\u00e9t\\u00e9 prorog\\u00e9e au 16 Octobre 2019"}', NULL, '2019-09-09 16:26:03', '2019-09-09 16:26:03'),
('f8f25f72-f216-4acc-9a6f-8b706162216c', 'App\\Notifications\\NotifierProrogation', 'App\\User', 97, '{"etat":"info","message":"Votre demande d''acc\\u00e8s \\u00e0 l''information relative \\u00e0 : Libelle a \\u00e9t\\u00e9 prorog\\u00e9e au 16 Octobre 2019"}', NULL, '2019-09-09 16:29:49', '2019-09-09 16:29:49'),
('fba80532-86f8-4571-ac96-00aea5f70386', 'App\\Notifications\\NewAccount', 'App\\User', 56, '{"message":"Bonjour Gnahor\\u00e9 Franck, bienvenu(e) sur la plateforme d''acc\\u00e8s \\u00e0 l''infrmation.","etat":"success"}', NULL, '2019-09-04 11:02:58', '2019-09-04 11:02:58');

-- --------------------------------------------------------

--
-- Structure de la table `organismes`
--

CREATE TABLE IF NOT EXISTS `organismes` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `organisme` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `autrecontact` text COLLATE utf8mb4_unicode_ci,
  `logo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `siege` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=82 ;

--
-- Contenu de la table `organismes`
--

INSERT INTO `organismes` (`id`, `organisme`, `contact`, `email`, `autrecontact`, `logo`, `created_at`, `updated_at`, `siege`) VALUES
(20, 'Foxy Digital', '48872346', 'franckory2@gmail.com', '', NULL, '2019-09-03 15:48:43', '2019-09-03 15:48:43', 'Cocody Abatta'),
(21, 'Foxy', '48872346', 'email@email.com', '', NULL, '2019-09-04 11:02:57', '2019-09-04 11:02:57', 'Abatta'),
(22, 'Foxy & Bok', '48872346', 'foxyb@gmail.com', '', 'images_1909045324.png', '2019-09-04 11:53:24', '2019-09-04 11:53:24', 'Cocody Riviera'),
(23, 'CAIDP', '22501714', 'caidp.ci@gmail.com', '', 'images_1909041959.png', '2019-09-04 12:19:59', '2019-09-04 12:19:59', 'II Plateaux'),
(24, 'Foxy & Bok', '4887234 6', 'francry2@gmail.com', '', NULL, '2019-09-04 14:25:52', '2019-09-04 14:25:52', 'Cocody Riviera'),
(25, 'Foxy & Bok', '4887234 6', 'francry2@gmail.com', '', NULL, '2019-09-04 14:26:38', '2019-09-04 14:26:38', 'Cocody Riviera'),
(26, 'Foxy & Bok', '4887234 6', 'franory2@gmail.com', '', 'images_1909043109.png', '2019-09-04 14:31:09', '2019-09-04 14:31:09', 'Cocody Riviera'),
(27, 'Foxy & Bok', '48872346', 'franckory2@gmail.com', NULL, NULL, '2019-09-04 16:27:49', '2019-09-04 16:27:49', 'Cocody Riviera'),
(28, 'Foxy & Bok', '48872346', 'franckory2@gmail.com', NULL, NULL, '2019-09-04 16:36:47', '2019-09-04 16:36:47', 'Cocody Riviera'),
(29, 'Foxy & Bok', '48872346', 'franckory2@gmail.com', NULL, NULL, '2019-09-04 16:43:22', '2019-09-04 16:43:22', 'Cocody Riviera'),
(30, 'Foxy & Bok', '48872346', 'franckory2@gmail.com', NULL, NULL, '2019-09-04 16:44:10', '2019-09-04 16:44:10', 'Cocody Riviera'),
(31, 'Foxy & Bok', '48872346', 'franckory2@gmail.com', NULL, NULL, '2019-09-04 16:46:01', '2019-09-04 16:46:01', 'Cocody Riviera'),
(32, 'Foxy & Bok', '48872346', 'franckory2@gmail.com', '{"email":{"1":"xav@gmail.com","2":"Abi@dd.ss"},"contact":{"1":"32123456","2":"48872311"}}', NULL, '2019-09-04 16:47:12', '2019-09-04 16:47:12', 'Cocody Riviera'),
(33, 'hdhdc', '11111111', 'Info@gmail.com', '{"email":null,"contact":null}', 'images_1909051225.png', '2019-09-05 10:12:25', '2019-09-05 10:12:25', 'hdhdhd'),
(34, 'hdhdc', '11111111', 'Info@gmail.com', '{"email":null,"contact":null}', 'images_1909051316.png', '2019-09-05 10:13:16', '2019-09-05 10:13:16', 'hdhdhd'),
(35, 'hdhdc', '11111111', 'Info@gmail.com', '{"email":null,"contact":null}', 'images_1909051422.png', '2019-09-05 10:14:22', '2019-09-05 10:14:22', 'hdhdhd'),
(36, 'hdhdc', '11111111', 'Info@gmail.com', '{"email":null,"contact":null}', 'images_1909053119.png', '2019-09-05 10:31:19', '2019-09-05 10:31:19', 'hdhdhd'),
(37, 'hdhdc', '11111111', 'Info@gmail.com', '{"email":null,"contact":null}', 'images_1909053132.png', '2019-09-05 10:31:32', '2019-09-05 10:31:32', 'hdhdhd'),
(38, 'hdhdc', '11111111', 'Info@gmail.com', '{"email":null,"contact":null}', 'images_1909053145.png', '2019-09-05 10:31:45', '2019-09-05 10:31:45', 'hdhdhd'),
(39, 'hdhdc', '11111111', 'Info@gmail.com', '{"email":null,"contact":null}', 'images_1909053153.png', '2019-09-05 10:31:53', '2019-09-05 10:31:53', 'hdhdhd'),
(40, 'hdhdc', '11111111', 'Info@gmail.com', '{"email":null,"contact":null}', 'images_1909053200.png', '2019-09-05 10:32:00', '2019-09-05 10:32:00', 'hdhdhd'),
(41, 'hdhdc', '11111111', 'Info@gmail.com', '{"email":null,"contact":null}', 'images_1909053330.png', '2019-09-05 10:33:30', '2019-09-05 10:33:30', 'hdhdhd'),
(42, 'hdhdc', '11111111', 'Info@gmail.com', '{"email":null,"contact":null}', 'images_1909053348.png', '2019-09-05 10:33:48', '2019-09-05 10:33:48', 'hdhdhd'),
(43, 'hdhdc', '11111111', 'Info@gmail.com', '{"email":null,"contact":null}', 'images_1909053417.png', '2019-09-05 10:34:17', '2019-09-05 10:34:17', 'hdhdhd'),
(44, 'hdhdc', '11111111', 'Info@gmail.com', '{"email":null,"contact":null}', 'images_1909053507.png', '2019-09-05 10:35:07', '2019-09-05 10:35:07', 'hdhdhd'),
(45, 'hdhdc', '11111111', 'Info@gmail.com', '{"email":null,"contact":null}', 'images_1909053543.png', '2019-09-05 10:35:43', '2019-09-05 10:35:43', 'hdhdhd'),
(46, 'hdhdc', '11111111', 'Info@gmail.com', '{"email":null,"contact":null}', 'images_1909053558.png', '2019-09-05 10:35:58', '2019-09-05 10:35:58', 'hdhdhd'),
(47, 'hdhdc', '11111111', 'Info@gmail.com', '{"email":null,"contact":null}', 'images_1909053904.png', '2019-09-05 10:39:04', '2019-09-05 10:39:04', 'hdhdhd'),
(48, 'hdhdc', '11111111', 'Info@gmail.com', '{"email":null,"contact":null}', 'images_1909053913.png', '2019-09-05 10:39:13', '2019-09-05 10:39:13', 'hdhdhd'),
(49, 'hdhdc', '11111111', 'Info@gmail.com', '{"email":null,"contact":null}', 'images_1909054215.png', '2019-09-05 10:42:15', '2019-09-05 10:42:15', 'hdhdhd'),
(50, 'hdhdc', '11111111', 'Info@gmail.com', '{"email":null,"contact":null}', 'images_1909054254.png', '2019-09-05 10:42:54', '2019-09-05 10:42:54', 'hdhdhd'),
(51, 'hdhdc', '11111111', 'Info@gmail.com', '{"email":null,"contact":null}', 'images_1909055018.png', '2019-09-05 10:50:18', '2019-09-05 10:50:18', 'hdhdhd'),
(52, 'hdhdc', '11111111', 'Info@gmail.com', '{"email":null,"contact":null}', 'images_1909055105.png', '2019-09-05 10:51:05', '2019-09-05 10:51:05', 'hdhdhd'),
(53, 'hdhdc', '11111111', 'Info@gmail.com', '{"email":null,"contact":null}', 'images_1909055951.png', '2019-09-05 10:59:51', '2019-09-05 10:59:51', 'hdhdhd'),
(54, 'hdhdc', '11111111', 'Info@gmail.com', '{"email":null,"contact":null}', 'images_1909050214.png', '2019-09-05 11:02:14', '2019-09-05 11:02:14', 'hdhdhd'),
(55, 'hdhdc', '11111111', 'Info@gmail.com', '{"email":null,"contact":null}', 'images_1909050229.png', '2019-09-05 11:02:29', '2019-09-05 11:02:29', 'hdhdhd'),
(56, 'hdhdc', '11111111', 'Info@gmail.com', '{"email":null,"contact":null}', 'images_1909050305.png', '2019-09-05 11:03:05', '2019-09-05 11:03:05', 'hdhdhd'),
(57, 'hdhdc', '11111111', 'Info@gmail.com', '{"email":null,"contact":null}', 'images_1909050405.png', '2019-09-05 11:04:05', '2019-09-05 11:04:05', 'hdhdhd'),
(58, 'hdhdc', '11111111', 'Info@gmail.com', '{"email":null,"contact":null}', 'images_1909050457.png', '2019-09-05 11:04:57', '2019-09-05 11:04:57', 'hdhdhd'),
(59, 'hdhdc', '11111111', 'Info@gmail.com', '{"email":null,"contact":null}', 'images_1909051829.png', '2019-09-05 11:18:29', '2019-09-05 11:18:29', 'hdhdhd'),
(60, 'hdhdc', '11111111', 'Info@gmail.com', '{"email":null,"contact":null}', 'images_1909052134.png', '2019-09-05 11:21:34', '2019-09-05 11:21:34', 'hdhdhd'),
(61, 'hdhdc', '11111111', 'Info@gmail.com', '{"email":null,"contact":null}', 'images_1909052255.png', '2019-09-05 11:22:55', '2019-09-05 11:22:55', 'hdhdhd'),
(62, 'hdhdc', '11111111', 'Info@gmail.com', '{"email":null,"contact":null}', 'images_1909053705.png', '2019-09-05 11:37:05', '2019-09-05 11:37:05', 'hdhdhd'),
(63, 'hdhdc', '11111111', 'Info@gmail.com', '{"email":null,"contact":null}', 'images_1909054235.png', '2019-09-05 11:42:35', '2019-09-05 11:42:35', 'hdhdhd'),
(64, 'hdhdc', '11111111', 'Info@gmail.com', '{"email":null,"contact":null}', 'images_1909054350.png', '2019-09-05 11:43:50', '2019-09-05 11:43:50', 'hdhdhd'),
(65, 'hdhdc', '11111111', 'Info@gmail.com', '{"email":null,"contact":null}', 'images_1909054914.png', '2019-09-05 11:49:14', '2019-09-05 11:49:14', 'hdhdhd'),
(66, 'hdhdc', '11111111', 'Info@gmail.com', '{"email":null,"contact":null}', 'images_1909054958.png', '2019-09-05 11:49:58', '2019-09-05 11:49:58', 'hdhdhd'),
(67, 'hdhdc', '11111111', 'Info@gmail.com', '{"email":null,"contact":null}', 'images_1909055111.png', '2019-09-05 11:51:11', '2019-09-05 11:51:11', 'hdhdhd'),
(68, 'hdhdc', '11111111', 'Info@gmail.com', '{"email":null,"contact":null}', 'images_1909055137.png', '2019-09-05 11:51:37', '2019-09-05 11:51:37', 'hdhdhd'),
(69, 'hdhdc', '11111111', 'Info@gmail.com', '{"email":null,"contact":null}', 'images_1909055248.png', '2019-09-05 11:52:48', '2019-09-05 11:52:48', 'hdhdhd'),
(70, 'hdhdc', '11111111', 'Info@gmail.com', '{"email":null,"contact":null}', 'images_1909055351.png', '2019-09-05 11:53:51', '2019-09-05 11:53:51', 'hdhdhd'),
(71, 'hdhdc', '11111111', 'Info@gmail.com', '{"email":null,"contact":null}', 'images_1909055447.png', '2019-09-05 11:54:47', '2019-09-05 11:54:47', 'hdhdhd'),
(72, 'hdhdc', '11111111', 'Info@gmail.com', '{"email":{"1":"hdhdhdhdh@jdjdj.jj","2":"dev@franckory.ci"},"contact":null}', 'images_1909050418.png', '2019-09-05 12:04:18', '2019-09-05 12:04:18', 'hdhdhd'),
(73, 'hdhdc', '11111111', 'Info@gmail.com', '{"email":{"1":"dev@franckory.ci"},"contact":{"1":"499822212"}}', 'images_1909050620.png', '2019-09-05 12:06:20', '2019-09-05 12:06:20', 'hdhdhd'),
(74, 'Foxy', '48 87 23 46', 'Info@gmail.com', '{"email":{"1":"hdhdhdhdh@jdjdj.jj"},"contact":{"1":"42303192"}}', 'foxy2_1909051429.png', '2019-09-05 17:14:29', '2019-09-05 17:14:29', 'Abatta'),
(75, 'Foxy Digital', '12 12 12 1', 'dev@franckory.ci', '{"email":{"1":"Info@gmail.com"},"contact":null}', 'flooz_1909064627.png', '2019-09-06 08:46:27', '2019-09-06 08:46:27', 'Abidjan Cocody'),
(76, 'Foxy & Bok', '48 87 23 46', 'franckory2@gmail.com', '{"email":null,"contact":null}', NULL, '2019-09-09 11:21:53', '2019-09-09 11:21:53', 'Cocody Riviera'),
(77, 'Foxy', '48 87 23 46', 'dev@franckory.ci', '{"email":{"1":"Info@gmail.com"},"contact":{"1":"42 30 31 92"}}', 'flooz_1909095745.png', '2019-09-09 15:57:45', '2019-09-09 15:57:45', 'Abatta'),
(78, 'Foxy', '11 11 11 11', 'Info@gmail.com', '{"email":null,"contact":null}', 'momo_1909095939.png', '2019-09-09 15:59:39', '2019-09-09 15:59:39', 'Abatta'),
(79, 'HACA', '22 45 22 88', 'haca@gmail.com', '{"email":null,"contact":null}', 'foxy2_1909094355.png', '2019-09-09 16:43:55', '2019-09-09 16:43:55', '2 Plateaux'),
(80, 'HACA', '22 45 22 88', 'haca@gmail.com', '{"email":null,"contact":null}', 'foxy2_1909094709.png', '2019-09-09 16:47:12', '2019-09-09 16:47:12', '2 Plateaux'),
(81, 'HACA', '22 45 22 88', 'haca@gmail.com', '{"email":null,"contact":null}', 'foxy2_1909095706.png', '2019-09-09 16:57:06', '2019-09-09 16:57:06', '2 Plateaux');

-- --------------------------------------------------------

--
-- Structure de la table `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('franckory2@gmail.com', '$2y$10$.8Mf6dl3EOOgVaJ03N9FxeFxxAt7ULuFSYlcNYBrhAYlsYHKPDPuK', '2019-09-04 11:31:34');

-- --------------------------------------------------------

--
-- Structure de la table `prorogations`
--

CREATE TABLE IF NOT EXISTS `prorogations` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `dateProrogation` date NOT NULL,
  `motifProrogation` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `responsable_id` bigint(20) unsigned NOT NULL,
  `demande_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `prorogation_responsable_id_foreign` (`responsable_id`),
  KEY `prorogation_demande_id_foreign` (`demande_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `qualiteresponsable`
--

CREATE TABLE IF NOT EXISTS `qualiteresponsable` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `qualite` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `default` tinyint(1) DEFAULT '1' COMMENT 'si default != 0 alors ajouté par les organismes',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=30 ;

--
-- Contenu de la table `qualiteresponsable`
--

INSERT INTO `qualiteresponsable` (`id`, `qualite`, `default`, `created_at`, `updated_at`) VALUES
(1, 'Responsable Hiérachique', 0, NULL, NULL),
(2, 'Responsable de l''information', 0, NULL, NULL),
(3, 'AZERRTY', 1, '2019-09-03 10:33:20', '2019-09-03 10:33:20'),
(4, 'Responsable Commercial', 1, '2019-09-03 10:34:38', '2019-09-03 10:34:38'),
(5, 'Responsable Commercial', 1, '2019-09-03 10:34:49', '2019-09-03 10:34:49'),
(6, 'Responsable Commercial', 1, '2019-09-03 10:37:10', '2019-09-03 10:37:10'),
(7, 'Responsable Commercial', 1, '2019-09-03 10:38:10', '2019-09-03 10:38:10'),
(8, 'Responsable Commercial', 1, '2019-09-03 10:39:01', '2019-09-03 10:39:01'),
(9, 'Responsable Commercial', 1, '2019-09-03 10:39:34', '2019-09-03 10:39:34'),
(10, 'Responsable Commercial', 1, '2019-09-03 10:40:08', '2019-09-03 10:40:08'),
(11, 'Responsable Commercial', 1, '2019-09-03 10:41:13', '2019-09-03 10:41:13'),
(12, 'Responsable Commercial', 1, '2019-09-03 10:41:34', '2019-09-03 10:41:34'),
(13, 'Responsable Commercial', 1, '2019-09-03 10:44:16', '2019-09-03 10:44:16'),
(14, 'Responsable Commercial', 1, '2019-09-03 10:44:33', '2019-09-03 10:44:33'),
(15, 'Responsable Commercial', 1, '2019-09-03 10:44:38', '2019-09-03 10:44:38'),
(16, 'Responsable Commercial', 1, '2019-09-03 10:47:32', '2019-09-03 10:47:32'),
(17, 'Responsable Commercial', 1, '2019-09-03 10:48:26', '2019-09-03 10:48:26'),
(18, 'Responsable Commercial', 1, '2019-09-03 10:48:54', '2019-09-03 10:48:54'),
(19, 'Responsable Commercial', 1, '2019-09-03 10:49:11', '2019-09-03 10:49:11'),
(20, 'Responsable Commercial', 1, '2019-09-03 10:50:06', '2019-09-03 10:50:06'),
(21, 'Responsable Commercial', 1, '2019-09-03 10:53:36', '2019-09-03 10:53:36'),
(22, 'Responsable Commercial', 1, '2019-09-03 15:48:42', '2019-09-03 15:48:42'),
(23, 'Informaticien', 1, '2019-09-04 12:19:59', '2019-09-04 12:19:59'),
(24, 'Responsable Marketing', 1, '2019-09-06 08:46:27', '2019-09-06 08:46:27'),
(25, 'Responsable Commercial', 1, '2019-09-09 11:21:53', '2019-09-09 11:21:53'),
(26, 'Responsable Commercial', 1, '2019-09-09 15:57:45', '2019-09-09 15:57:45'),
(27, 'Informaticien', 1, '2019-09-09 16:43:55', '2019-09-09 16:43:55'),
(28, 'Informaticien', 1, '2019-09-09 16:47:10', '2019-09-09 16:47:10'),
(29, 'Informaticien', 1, '2019-09-09 16:57:06', '2019-09-09 16:57:06');

-- --------------------------------------------------------

--
-- Structure de la table `qualites`
--

CREATE TABLE IF NOT EXISTS `qualites` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `qualite` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `duree` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'durée en jours',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=4 ;

--
-- Contenu de la table `qualites`
--

INSERT INTO `qualites` (`id`, `qualite`, `duree`, `created_at`, `updated_at`) VALUES
(1, 'Journaliste / Chercheur', '15', NULL, NULL),
(3, 'Autre', '30', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `refuscommunications`
--

CREATE TABLE IF NOT EXISTS `refuscommunications` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `motif` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `demande_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `refuscommunications_demande_id_foreign` (`demande_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `requerants`
--

CREATE TABLE IF NOT EXISTS `requerants` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nom` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prenom` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sexe` varchar(1) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `titre` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `adressePostale` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ville` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dénomination` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `type_id` bigint(20) unsigned NOT NULL,
  `qualite_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `requerants_type_id_foreign` (`type_id`),
  KEY `requerants_qualite_id_foreign` (`qualite_id`),
  KEY `ville_id` (`ville`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=60 ;

--
-- Contenu de la table `requerants`
--

INSERT INTO `requerants` (`id`, `nom`, `prenom`, `contact`, `email`, `sexe`, `titre`, `adressePostale`, `ville`, `dénomination`, `created_at`, `updated_at`, `type_id`, `qualite_id`) VALUES
(58, 'Franck', 'Xavier Ory', '48 87 23 46', 'foxy@gmail.com', 'M', NULL, '48872346', 'Abidjan', NULL, '2019-09-09 11:26:09', '2019-09-09 11:26:09', 4, 1),
(59, 'Ory', '', '22 22 22 22', 'Ory@gmail.com', 'M', NULL, '17 BP 17', 'Cocody', NULL, '2019-09-09 16:16:17', '2019-09-09 16:16:17', 2, 3);

-- --------------------------------------------------------

--
-- Structure de la table `responsables`
--

CREATE TABLE IF NOT EXISTS `responsables` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nom` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `autrecontact` text COLLATE utf8mb4_unicode_ci,
  `etat` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'si true alors il est toujours en fonction',
  `dateInactif` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `organisme_id` bigint(20) unsigned NOT NULL,
  `qualiteresponsable_id` bigint(20) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=49 ;

--
-- Contenu de la table `responsables`
--

INSERT INTO `responsables` (`id`, `nom`, `prenom`, `contact`, `email`, `autrecontact`, `etat`, `dateInactif`, `created_at`, `updated_at`, `organisme_id`, `qualiteresponsable_id`) VALUES
(43, 'Ory', 'Franck', '42 30 31 92', 'franckory2@gmail.com', '{"email":null,"contact":null}', 1, NULL, '2019-09-09 11:21:53', '2019-09-09 11:21:53', 76, 25),
(44, 'Ory', 'Franck', '31 23 45 67', 'fanckory2@gmail.com', '{"email":null,"contact":null}', 1, NULL, '2019-09-09 15:57:45', '2019-09-09 15:57:45', 77, 26),
(45, 'Ory', 'Franck', '22 22 22 22', 'fox@gmail.com', '{"email":null,"contact":null}', 1, NULL, '2019-09-09 15:59:39', '2019-09-09 15:59:39', 78, 2),
(46, 'Ossey', 'Tanguy', '55 67 37 73', 'tanguy@gmail.comdd dhhdf', '{"email":null,"contact":null}', 1, NULL, '2019-09-09 16:43:57', '2019-09-09 16:43:57', 79, 27),
(47, 'Ossey', 'Tanguy', '55 67 37 73', 'tanguy@gmail.comdd  dhhdf', '{"email":null,"contact":null}', 1, NULL, '2019-09-09 16:47:12', '2019-09-09 16:47:12', 80, 28),
(48, 'Ossey', 'Tanguy', '55 67 37 73', 'tanguy@gmail.com', '{"email":null,"contact":null}', 1, NULL, '2019-09-09 16:57:07', '2019-09-09 16:57:07', 81, 29);

-- --------------------------------------------------------

--
-- Structure de la table `saisines`
--

CREATE TABLE IF NOT EXISTS `saisines` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `demande_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `saisines_demande_id_foreign` (`demande_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `types`
--

CREATE TABLE IF NOT EXISTS `types` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=5 ;

--
-- Contenu de la table `types`
--

INSERT INTO `types` (`id`, `type`, `created_at`, `updated_at`) VALUES
(1, 'Personne physique', NULL, NULL),
(2, 'Personne morale', NULL, NULL),
(3, 'Concerné(e)', NULL, NULL),
(4, 'Mandataire', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `requerant_id` bigint(20) unsigned DEFAULT NULL,
  `responsable_id` bigint(20) unsigned DEFAULT NULL,
  `caidp` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `users_requerant_id_foreign` (`requerant_id`),
  KEY `users_responsable_id_foreign` (`responsable_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=102 ;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `requerant_id`, `responsable_id`, `caidp`) VALUES
(94, 'Ory Franck', 'franckory2@gmail.com', NULL, '$2y$10$TmrxJkA/lpUIOzIenFRDAuv94LmVHqKka44Ihvy808kspAdMPA/gm', 'V0lVhmcWSS9O82CyoVpUd53SrGXJ0pCpzlFK7Kq1sDFaSKDF6xl27TpOSPwx', '2019-09-09 11:21:53', '2019-09-09 11:21:53', NULL, 43, NULL),
(95, 'Franck Xavier Ory', 'foxy@gmail.com', NULL, '$2y$10$sMtKQuZIIsNSO1trsTWtqeutpgMpUvg18sb8o390lAoSB9JxbP48a', NULL, '2019-09-09 11:26:09', '2019-09-09 11:26:09', 58, NULL, NULL),
(96, 'Ory Franck', 'fanckory2@gmail.com', NULL, '$2y$10$65gK3b5cd0ucTeW9Gb.qXu91bB8CER8NM5UFz.KPdcZRLHvRm9o.q', NULL, '2019-09-09 15:57:46', '2019-09-09 15:57:46', NULL, 44, NULL),
(97, 'Ory Franck', 'fox@gmail.com', NULL, '$2y$10$782KHWKiSrMQZ9Cx3uGSBOlQ6jyMn1ImX2fmofjqd3jEIA/lF8Vi6', NULL, '2019-09-09 15:59:39', '2019-09-09 15:59:39', NULL, 45, NULL),
(98, 'Ory ', 'Ory@gmail.com', NULL, '$2y$10$0R/A98LQo2Z90uplhQOGl.IhZCDzwlCcw6owstSkfL.RfP8SD6Ejm', NULL, '2019-09-09 16:16:17', '2019-09-09 16:16:17', 59, NULL, NULL),
(101, 'Ossey Tanguy', 'tanguy@gmail.com', NULL, '$2y$10$GS6tWZoOsITcf5vvRxIudu73wrW64/7GtnyUvddvAs1iz41oPllXm', NULL, '2019-09-09 16:57:07', '2019-09-09 16:57:07', NULL, 48, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `villes`
--

CREATE TABLE IF NOT EXISTS `villes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ville` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=53 ;

--
-- Contenu de la table `villes`
--

INSERT INTO `villes` (`id`, `ville`, `created_at`, `updated_at`) VALUES
(1, 'Abidjan', '2019-09-05 16:12:28', NULL),
(2, 'Bouaké', '2019-09-05 16:12:49', NULL),
(3, 'Daloa', '2019-09-05 16:12:49', NULL),
(4, 'Yamoussoukro', '2019-09-05 16:13:07', NULL),
(5, 'San-Pédro', '2019-09-05 16:13:07', NULL),
(6, 'Divo', '2019-09-05 16:13:21', NULL),
(7, 'Korhogo', '2019-09-05 16:13:21', NULL),
(8, 'Anyama', '2019-09-05 16:13:41', NULL),
(9, 'Abengourou', '2019-09-05 16:13:41', NULL),
(10, 'Man', '2019-09-05 16:14:00', NULL),
(11, 'Gagnoa', '2019-09-05 16:14:00', NULL),
(12, 'Soubré', '2019-09-05 16:14:14', NULL),
(13, 'Agboville', '2019-09-05 16:14:14', NULL),
(14, 'Dabou', '2019-09-05 16:14:29', NULL),
(15, 'Grand-Bassam', '2019-09-05 16:14:29', NULL),
(16, 'Bouaflé', '2019-09-05 16:14:45', NULL),
(17, 'Issia', '2019-09-05 16:14:45', NULL),
(18, 'Sinfra', '2019-09-05 16:15:05', NULL),
(19, 'Katiola', '2019-09-05 16:15:05', NULL),
(20, 'Bingerville', '2019-09-05 16:15:18', NULL),
(21, 'Adzopé', '2019-09-05 16:15:18', NULL),
(22, 'Séguéla', '2019-09-05 16:15:32', NULL),
(23, 'Bondoukou', '2019-09-05 16:15:32', NULL),
(24, 'Oumé', '2019-09-05 16:15:46', NULL),
(25, 'Ferkessedougou', '2019-09-05 16:15:46', NULL),
(26, 'Dimbokro1', '2019-09-05 16:16:03', NULL),
(27, 'Odienné', '2019-09-05 16:16:03', NULL),
(28, 'Duékoué', '2019-09-05 16:16:17', NULL),
(29, 'Danané', '2019-09-05 16:16:17', NULL),
(30, 'Tingréla', '2019-09-05 16:16:31', NULL),
(31, 'Guiglo', '2019-09-05 16:16:31', NULL),
(32, 'Boundiali', '2019-09-05 16:16:44', NULL),
(33, 'Agnibilékrou', '2019-09-05 16:16:44', NULL),
(34, 'Daoukro', '2019-09-05 16:16:57', NULL),
(35, 'Vavoua', '2019-09-05 16:16:57', NULL),
(36, 'Zuénoula', '2019-09-05 16:17:11', NULL),
(37, 'Tiassalé', '2019-09-05 16:17:11', NULL),
(38, 'Toumodi', '2019-09-05 16:17:28', NULL),
(39, 'Akoupé', '2019-09-05 16:17:28', NULL),
(40, 'Lakota', '2019-09-05 16:17:35', NULL),
(41, 'Abobo', '2019-09-05 16:19:25', NULL),
(42, 'Adjamé', '2019-09-05 16:19:25', NULL),
(43, 'Attécoubé', '2019-09-05 16:19:36', NULL),
(44, 'Cocody', '2019-09-05 16:19:36', NULL),
(45, 'Plateau', '2019-09-05 16:19:59', NULL),
(46, 'Yopugon', '2019-09-05 16:19:59', NULL),
(47, 'Treichville', '2019-09-05 16:20:15', NULL),
(48, 'Koumassi', '2019-09-05 16:20:15', NULL),
(49, 'Marcory', '2019-09-05 16:22:59', NULL),
(50, 'Port-Bouët', '2019-09-05 16:22:59', NULL),
(51, 'Songon', '2019-09-05 16:23:27', NULL),
(52, 'Bingerville', '2019-09-05 16:23:27', NULL);

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `contacts`
--
ALTER TABLE `contacts`
  ADD CONSTRAINT `contacts_responsable_id_foreign` FOREIGN KEY (`responsable_id`) REFERENCES `responsables` (`id`);

--
-- Contraintes pour la table `decisions`
--
ALTER TABLE `decisions`
  ADD CONSTRAINT `decisions_demande_id_foreign` FOREIGN KEY (`demande_id`) REFERENCES `demandes` (`id`);

--
-- Contraintes pour la table `demandes`
--
ALTER TABLE `demandes`
  ADD CONSTRAINT `demandes_organisme_id_foreign` FOREIGN KEY (`organisme_id`) REFERENCES `organismes` (`id`),
  ADD CONSTRAINT `demandes_requerant_id_foreign` FOREIGN KEY (`requerant_id`) REFERENCES `requerants` (`id`);

--
-- Contraintes pour la table `documents`
--
ALTER TABLE `documents`
  ADD CONSTRAINT `documents_demande_id_foreign` FOREIGN KEY (`demande_id`) REFERENCES `demandes` (`id`),
  ADD CONSTRAINT `documents_information_id_foreign` FOREIGN KEY (`information_id`) REFERENCES `informations` (`id`);

--
-- Contraintes pour la table `informations`
--
ALTER TABLE `informations`
  ADD CONSTRAINT `informations_demande_id_foreign` FOREIGN KEY (`demande_id`) REFERENCES `demandes` (`id`);

--
-- Contraintes pour la table `prorogations`
--
ALTER TABLE `prorogations`
  ADD CONSTRAINT `prorogation_demande_id_foreign` FOREIGN KEY (`demande_id`) REFERENCES `demandes` (`id`),
  ADD CONSTRAINT `prorogation_responsable_id_foreign` FOREIGN KEY (`responsable_id`) REFERENCES `responsables` (`id`);

--
-- Contraintes pour la table `refuscommunications`
--
ALTER TABLE `refuscommunications`
  ADD CONSTRAINT `refuscommunications_demande_id_foreign` FOREIGN KEY (`demande_id`) REFERENCES `demandes` (`id`);

--
-- Contraintes pour la table `requerants`
--
ALTER TABLE `requerants`
  ADD CONSTRAINT `requerants_qualite_id_foreign` FOREIGN KEY (`qualite_id`) REFERENCES `qualites` (`id`),
  ADD CONSTRAINT `requerants_type_id_foreign` FOREIGN KEY (`type_id`) REFERENCES `types` (`id`);

--
-- Contraintes pour la table `saisines`
--
ALTER TABLE `saisines`
  ADD CONSTRAINT `saisines_demande_id_foreign` FOREIGN KEY (`demande_id`) REFERENCES `demandes` (`id`);

--
-- Contraintes pour la table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_requerant_id_foreign` FOREIGN KEY (`requerant_id`) REFERENCES `requerants` (`id`),
  ADD CONSTRAINT `users_responsable_id_foreign` FOREIGN KEY (`responsable_id`) REFERENCES `responsables` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

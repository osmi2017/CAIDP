-- phpMyAdmin SQL Dump
-- version 4.0.10deb1ubuntu0.1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Ven 06 Septembre 2019 à 17:08
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=4 ;

--
-- Contenu de la table `decisions`
--

INSERT INTO `decisions` (`id`, `decison`, `propose_par_ri`, `valide_par_rh`, `dateValidation`, `etat`, `created_at`, `updated_at`, `demande_id`) VALUES
(1, 'Conformément à l’article 04 du décret n° 2014-462 du 06 août 2014 portant attributions,\r\norganisation et fonctionnement de la Commission d’Accès à l’Information d’intérêt public et aux\r\nDocuments Publics (CAIDP), les organismes publics doivent produire , au premier trimestre\r\nde chaque année, un rapport sur l’application de la loi N° 2013-867 du 23 décembre\r\n2013 relative à l’accès à l’information. Ce rapport doit contenir notamment l’indication du\r\nnombre de requêtes reçues et la suite qui leur a été donnée.\r\nLe présent document est donc proposé aux organismes publics à titre de modèle type à\r\ncharge pour eux, de le renseigner et le transmettre à la Commission d’Accès à l’Information\r\nd’intérêt public et aux Documents Publics (CAIDP).', 'Ory Franck', 'Ory Franck', '2019-09-04', 1, '2019-09-04 10:10:14', '2019-09-04 10:10:14', 3),
(2, 'Conformément à l’article 04 du décret n° 2014-462 du 06 août 2014 portant attributions,\r\norganisation et fonctionnement de la Commission d’Accès à l’Information d’intérêt public et aux\r\nDocuments Publics (CAIDP), les organismes publics doivent produire , au premier trimestre\r\nde chaque année, un rapport sur l’application de la loi N° 2013-867 du 23 décembre\r\n2013 relative à l’accès à l’information. Ce rapport doit contenir notamment l’indication du\r\nnombre de requêtes reçues et la suite qui leur a été donnée.\r\nLe présent document est donc proposé aux organismes publics à titre de modèle type à\r\ncharge pour eux, de le renseigner et le transmettre à la Commission d’Accès à l’Information\r\nd’intérêt public et aux Documents Publics (CAIDP).', 'Ory Franck', 'Ory Franck', '2019-09-04', 1, '2019-09-04 11:20:29', '2019-09-04 11:20:29', 2),
(3, 'Conformément à l’article 04 du décret n° 2014-462 du 06 août 2014 portant attributions,\r\norganisation et fonctionnement de la Commission d’Accès à l’Information d’intérêt public et aux\r\nDocuments Publics (CAIDP), les organismes publics doivent produire , au premier trimestre\r\nde chaque année, un rapport sur l’application de la loi N° 2013-867 du 23 décembre\r\n2013 relative à l’accès à l’information. Ce rapport doit contenir notamment l’indication du\r\nnombre de requêtes reçues et la suite qui leur a été donnée.\r\nLe présent document est donc proposé aux organismes publics à titre de modèle type à\r\ncharge pour eux, de le renseigner et le transmettre à la Commission d’Accès à l’Information\r\nd’intérêt public et aux Documents Publics (CAIDP).', 'Ossey Tanguy', 'Ossey Tanguy', '2019-09-04', 1, '2019-09-04 12:57:46', '2019-09-04 12:57:46', 6);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=13 ;

--
-- Contenu de la table `demandes`
--

INSERT INTO `demandes` (`id`, `libelle`, `description`, `scane`, `dateDemande`, `brouillon`, `requerant_id`, `organisme_id`, `direction`, `service`, `dateProrogation`, `motifProrogation`, `created_at`, `updated_at`, `autoEnregsitrement`, `favorable`, `etat`, `liquide`) VALUES
(1, 'Bilan des activités 2019', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.', NULL, '2019-05-26 00:00:00', 0, 46, 20, NULL, NULL, '2019-09-02', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.', '2019-09-04 09:20:25', '2019-09-04 09:20:44', NULL, NULL, 1, NULL),
(2, 'PV du conseils de la fin d''année 2018', ' ', NULL, '2019-09-03 00:00:00', 0, 46, 20, NULL, NULL, NULL, NULL, '2019-09-04 09:59:29', '2019-09-04 11:20:32', NULL, 2, 1, NULL),
(3, 'Bilan des activités 2019', ' ', NULL, '2019-09-16 00:00:00', 0, 46, 20, NULL, NULL, NULL, NULL, '2019-09-04 10:09:24', '2019-09-04 10:10:15', NULL, 3, 1, NULL),
(4, 'Bilan des activités 2019', ' gdgdgdgdgdgd', NULL, '2019-08-05 00:00:00', 0, 46, 20, NULL, NULL, '2019-09-26', 'azerty', '2019-09-04 10:21:50', '2019-09-04 10:22:15', NULL, NULL, 1, NULL),
(5, 'Bilan des activités 2019', 'bxcbcbcbc', NULL, '2019-09-18 00:00:00', 0, 46, 20, NULL, NULL, NULL, NULL, '2019-09-04 10:50:12', '2019-09-04 10:50:12', NULL, NULL, 0, NULL),
(6, 'Budget 2019 du tresor public', 'Budget 2019 du tresor public', NULL, '2019-07-10 00:00:00', 0, 47, 23, NULL, NULL, NULL, NULL, '2019-09-04 12:40:36', '2019-09-04 12:57:46', NULL, 1, 1, NULL),
(7, 'B', ' ', NULL, '2019-09-06 00:00:00', 0, 53, 75, NULL, NULL, NULL, NULL, '2019-09-06 13:26:21', '2019-09-06 13:26:21', NULL, NULL, 0, NULL),
(8, 'B', ' ', NULL, '2019-09-06 00:00:00', 0, 45, 75, NULL, NULL, NULL, NULL, '2019-09-06 13:53:20', '2019-09-06 13:53:20', NULL, NULL, 0, NULL),
(9, 'B', 'Texte', NULL, '2019-09-06 00:00:00', 0, 45, 75, NULL, NULL, NULL, NULL, '2019-09-06 14:11:08', '2019-09-06 14:11:08', NULL, NULL, 0, NULL),
(10, 'Bilan', '', 'resume-roland-alla_1909064940.pdf', '2019-09-06 00:00:00', 0, 50, 75, NULL, NULL, NULL, NULL, '2019-09-06 14:49:40', '2019-09-06 14:49:40', NULL, NULL, 0, NULL),
(11, 'Bilan', '', 'resume-roland-alla_1909065132.pdf', '2019-09-06 00:00:00', 0, 45, 75, 'FInances', 'Compta', NULL, NULL, '2019-09-06 14:51:32', '2019-09-06 14:51:32', NULL, NULL, 0, NULL),
(12, 'gggg', 'gggcgcg ', NULL, '2019-09-03 00:00:00', 0, 45, 75, '', '', NULL, NULL, '2019-09-06 17:03:08', '2019-09-06 17:03:08', NULL, NULL, 0, NULL);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=4 ;

--
-- Contenu de la table `documents`
--

INSERT INTO `documents` (`id`, `libelle`, `document`, `created_at`, `updated_at`, `demande_id`, `information_id`) VALUES
(1, NULL, '18-0_1909040754.jpg', '2019-09-04 10:07:54', '2019-09-04 10:07:54', NULL, 2),
(2, NULL, 'presentation-activites-de-la-semaine-journal-29-juillet-au-1-aout-2019_1909040938.pdf', '2019-09-04 10:09:38', '2019-09-04 10:09:38', NULL, 3),
(3, NULL, 'presentation-activites-de-la-semaine-journal-29-juillet-au-1-aout-2019_1909043203.pdf', '2019-09-04 10:32:03', '2019-09-04 10:32:03', NULL, 11);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=12 ;

--
-- Contenu de la table `informations`
--

INSERT INTO `informations` (`id`, `libelle`, `information`, `dateCommunication`, `public`, `created_at`, `updated_at`, `demande_id`) VALUES
(1, 'Libelle Info demande', 'lo', NULL, NULL, '2019-09-04 09:56:33', '2019-09-04 09:56:33', 1),
(2, 'Libelle Info demande', '', NULL, NULL, '2019-09-04 10:07:54', '2019-09-04 10:07:54', 2),
(3, 'Libelle Info demande', '', NULL, NULL, '2019-09-04 10:09:38', '2019-09-04 10:09:38', 3),
(4, 'Libelle Info demande', '', NULL, NULL, '2019-09-04 10:23:17', '2019-09-04 10:23:17', 4),
(5, 'Libelle Info demande', '', NULL, NULL, '2019-09-04 10:24:08', '2019-09-04 10:24:08', 4),
(6, 'Libelle Info demande', '', NULL, NULL, '2019-09-04 10:28:16', '2019-09-04 10:28:16', 4),
(7, 'Libelle Info demande', '', NULL, NULL, '2019-09-04 10:28:54', '2019-09-04 10:28:54', 4),
(8, 'Libelle Info demande', '', NULL, NULL, '2019-09-04 10:30:31', '2019-09-04 10:30:31', 4),
(9, 'Libelle Info demande', '', NULL, NULL, '2019-09-04 10:31:36', '2019-09-04 10:31:36', 4),
(10, 'Libelle Info demande', '', NULL, NULL, '2019-09-04 10:31:45', '2019-09-04 10:31:45', 4),
(11, 'Libelle Info demande', '', NULL, NULL, '2019-09-04 10:32:03', '2019-09-04 10:32:03', 4);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `mandants`
--

INSERT INTO `mandants` (`id`, `nom`, `prenom`, `sexe`, `profession`, `ville`, `requerant_id`, `created_at`, `updated_at`) VALUES
(1, 'Gnahoré', 'Foxy', 'M', 'Dessinateur', 'Cocody', 49, '2019-09-06 09:31:10', '2019-09-06 09:31:10'),
(2, 'Gnahoré', 'Ory Xavier', 'M', 'Journaliste', 'Bouaké', 50, '2019-09-06 09:45:53', '2019-09-06 09:45:53');

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
('0a87ac58-bddd-49fb-a548-a92035306c16', 'App\\Notifications\\NewAccount', 'App\\User', 72, '{"message":"Bonjour Ory Franck, bienvenu(e) sur la plateforme d''acc\\u00e8s \\u00e0 l''infrmation.","etat":"success"}', NULL, '2019-09-05 11:43:54', '2019-09-05 11:43:54'),
('1c095743-0ee9-4f58-881d-4ecdd3a5a10d', 'App\\Notifications\\NewAccount', 'App\\User', 88, '{"message":"Bonjour Ory , bienvenu(e) sur la plateforme d''acc\\u00e8s \\u00e0 l''infrmation.","etat":"success"}', NULL, '2019-09-06 09:56:10', '2019-09-06 09:56:10'),
('1d6f3f9c-7a76-4974-bf73-8f55dad506c3', 'App\\Notifications\\NewAccount', 'App\\User', 54, '{"message":"Bonjour Ory Franck, bienvenu(e) sur la plateforme d''acc\\u00e8s \\u00e0 l''infrmation.","etat":"success"}', NULL, '2019-09-03 15:48:43', '2019-09-03 15:48:43'),
('1fefddf5-0fea-4b14-a5c0-ebaf22d8ac5b', 'App\\Notifications\\NewAccount', 'App\\User', 65, '{"message":"Bonjour Ory Franck, bienvenu(e) sur la plateforme d''acc\\u00e8s \\u00e0 l''infrmation.","etat":"success"}', NULL, '2019-09-05 10:59:51', '2019-09-05 10:59:51'),
('2021e9de-9852-42d9-8f3d-fc2a292a8576', 'App\\Notifications\\NewAccount', 'App\\User', 80, '{"message":"Bonjour Ory Franck, bienvenu(e) sur la plateforme d''acc\\u00e8s \\u00e0 l''infrmation.","etat":"success"}', NULL, '2019-09-05 12:04:18', '2019-09-05 12:04:18'),
('25b2d560-356c-485d-98c3-47d96aa367af', 'App\\Notifications\\NotifierProrogation', 'App\\User', 54, '{"etat":"info","message":"Votre demande d''acc\\u00e8s \\u00e0 l''information relative \\u00e0 : Bilan des activit\\u00e9s 2019 a \\u00e9t\\u00e9 prorog\\u00e9e au 02 Septembre 2019"}', NULL, '2019-09-04 09:20:45', '2019-09-04 09:20:45'),
('355120db-fe15-48b7-afc8-502f6f842141', 'App\\Notifications\\NewAccount', 'App\\User', 79, '{"message":"Bonjour Ory Franck, bienvenu(e) sur la plateforme d''acc\\u00e8s \\u00e0 l''infrmation.","etat":"success"}', NULL, '2019-09-05 11:54:48', '2019-09-05 11:54:48'),
('37e358b3-5fb8-4a36-9c53-0435a4d0f008', 'App\\Notifications\\NewAccount', 'App\\User', 57, '{"message":"Bonjour Ory Franck, bienvenu(e) sur la plateforme d''acc\\u00e8s \\u00e0 l''infrmation.","etat":"success"}', NULL, '2019-09-04 11:53:24', '2019-09-04 11:53:24'),
('41b4cd3c-b18a-4934-85d9-15a28e3ea9ea', 'App\\Notifications\\NotifierProrogation', 'App\\User', 54, '{"etat":"info","message":"Votre demande d''acc\\u00e8s \\u00e0 l''information relative \\u00e0 : Bilan des activit\\u00e9s 2019 a \\u00e9t\\u00e9 prorog\\u00e9e au 26 Septembre 2019"}', NULL, '2019-09-04 10:22:24', '2019-09-04 10:22:24'),
('41f94e68-e888-44da-81d4-ccbfd1057a35', 'App\\Notifications\\NotifierProrogation', 'App\\User', 55, '{"etat":"info","message":"Votre demande d''acc\\u00e8s \\u00e0 l''information relative \\u00e0 : Bilan des activit\\u00e9s 2019 a \\u00e9t\\u00e9 prorog\\u00e9e au 26 Septembre 2019"}', NULL, '2019-09-04 10:22:21', '2019-09-04 10:22:21'),
('42059941-7159-4e9f-8f85-61ef4cd0888c', 'App\\Notifications\\NewAccount', 'App\\User', 71, '{"message":"Bonjour Ory Franck, bienvenu(e) sur la plateforme d''acc\\u00e8s \\u00e0 l''infrmation.","etat":"success"}', NULL, '2019-09-05 11:42:35', '2019-09-05 11:42:35'),
('47254b18-e4ca-44f4-b3f7-ea6cd09df89e', 'App\\Notifications\\NewAccount', 'App\\User', 62, '{"message":"Bonjour Ory Franck, bienvenu(e) sur la plateforme d''acc\\u00e8s \\u00e0 l''infrmation.","etat":"success"}', NULL, '2019-09-04 14:31:12', '2019-09-04 14:31:12'),
('568b3042-d84a-4366-bbee-0d8dcfe5902a', 'App\\Notifications\\NewAccount', 'App\\User', 59, '{"message":"Bonjour Ali Patrick, bienvenu(e) sur la plateforme d''acc\\u00e8s \\u00e0 l''infrmation.","etat":"success"}', NULL, '2019-09-04 12:30:08', '2019-09-04 12:30:08'),
('571b770f-c004-4a0c-8351-f2c06f2edf78', 'App\\Notifications\\NewAccount', 'App\\User', 87, '{"message":"Bonjour Ory , bienvenu(e) sur la plateforme d''acc\\u00e8s \\u00e0 l''infrmation.","etat":"success"}', NULL, '2019-09-06 09:55:06', '2019-09-06 09:55:06'),
('5df907f4-93ad-485f-b856-9ea0be82108c', 'App\\Notifications\\NewAccount', 'App\\User', 92, '{"message":"Bonjour Gnahor\\u00e9 Ory, bienvenu(e) sur la plateforme d''acc\\u00e8s \\u00e0 l''infrmation.","etat":"success"}', NULL, '2019-09-06 10:57:54', '2019-09-06 10:57:54'),
('73614411-20ef-4d96-a586-4bce155a6a5a', 'App\\Notifications\\NewAccount', 'App\\User', 93, '{"message":"Bonjour Ory , bienvenu(e) sur la plateforme d''acc\\u00e8s \\u00e0 l''infrmation.","etat":"success"}', NULL, '2019-09-06 13:00:29', '2019-09-06 13:00:29'),
('76400961-e396-4520-a7b5-7359441b92b9', 'App\\Notifications\\NewAccount', 'App\\User', 83, '{"message":"Bonjour Gnahor\\u00e9 Ory Franck, bienvenu(e) sur la plateforme d''acc\\u00e8s \\u00e0 l''infrmation.","etat":"success"}', NULL, '2019-09-06 08:46:28', '2019-09-06 08:46:28'),
('78bc9efd-f6bf-483e-a818-32db0213bd9e', 'App\\Notifications\\NewAccount', 'App\\User', 55, '{"message":"Bonjour Franck Xavier Ory, bienvenu(e) sur la plateforme d''acc\\u00e8s \\u00e0 l''infrmation.","etat":"success"}', NULL, '2019-09-04 08:45:56', '2019-09-04 08:45:56'),
('7a70ca2e-dbde-4198-a7ba-75498c435b22', 'App\\Notifications\\NewAccount', 'App\\User', 58, '{"message":"Bonjour Ossey Tanguy, bienvenu(e) sur la plateforme d''acc\\u00e8s \\u00e0 l''infrmation.","etat":"success"}', NULL, '2019-09-04 12:19:59', '2019-09-04 12:19:59'),
('8f018a85-9068-4d35-9cb2-46cb514d31ce', 'App\\Notifications\\NotifierProrogation', 'App\\User', 55, '{"etat":"info","message":"Votre demande d''acc\\u00e8s \\u00e0 l''information relative \\u00e0 : Bilan des activit\\u00e9s 2019 a \\u00e9t\\u00e9 prorog\\u00e9e au 26 Septembre 2019"}', NULL, '2019-09-04 10:22:24', '2019-09-04 10:22:24'),
('8f36703d-3d28-4267-ba11-6ca34988ff81', 'App\\Notifications\\NewAccount', 'App\\User', 91, '{"message":"Bonjour Ory , bienvenu(e) sur la plateforme d''acc\\u00e8s \\u00e0 l''infrmation.","etat":"success"}', NULL, '2019-09-06 10:46:49', '2019-09-06 10:46:49'),
('92299618-f8ba-4bcf-b9d5-df170158a71c', 'App\\Notifications\\NotifierProrogation', 'App\\User', 55, '{"etat":"info","message":"Votre demande d''acc\\u00e8s \\u00e0 l''information relative \\u00e0 : Bilan des activit\\u00e9s 2019 a \\u00e9t\\u00e9 prorog\\u00e9e au 02 Septembre 2019"}', NULL, '2019-09-04 09:20:45', '2019-09-04 09:20:45'),
('95507568-dddc-4dc5-a246-67710defedb9', 'App\\Notifications\\NewAccount', 'App\\User', 74, '{"message":"Bonjour Ory Franck, bienvenu(e) sur la plateforme d''acc\\u00e8s \\u00e0 l''infrmation.","etat":"success"}', NULL, '2019-09-05 11:49:59', '2019-09-05 11:49:59'),
('962a18fc-9a59-4de4-85a8-68b9211a10c2', 'App\\Notifications\\NewAccount', 'App\\User', 75, '{"message":"Bonjour Ory Franck, bienvenu(e) sur la plateforme d''acc\\u00e8s \\u00e0 l''infrmation.","etat":"success"}', NULL, '2019-09-05 11:51:11', '2019-09-05 11:51:11'),
('97531c5e-2e06-4ee0-b4e0-1392c41dccb7', 'App\\Notifications\\NewAccount', 'App\\User', 64, '{"message":"Bonjour Ory Franck, bienvenu(e) sur la plateforme d''acc\\u00e8s \\u00e0 l''infrmation.","etat":"success"}', NULL, '2019-09-04 16:44:10', '2019-09-04 16:44:10'),
('aac3746e-7ded-46db-861e-5c5a26271fba', 'App\\Notifications\\NewAccount', 'App\\User', 84, '{"message":"Bonjour Ory , bienvenu(e) sur la plateforme d''acc\\u00e8s \\u00e0 l''infrmation.","etat":"success"}', NULL, '2019-09-06 09:13:26', '2019-09-06 09:13:26'),
('aef29f54-4746-416b-b386-bf228dedfe0b', 'App\\Notifications\\NewAccount', 'App\\User', 76, '{"message":"Bonjour Ory Franck, bienvenu(e) sur la plateforme d''acc\\u00e8s \\u00e0 l''infrmation.","etat":"success"}', NULL, '2019-09-05 11:51:41', '2019-09-05 11:51:41'),
('b4a7a913-910f-4416-a5c3-ea89ed8bdbf4', 'App\\Notifications\\NewAccount', 'App\\User', 90, '{"message":"Bonjour Gnaohr\\u00e9 Ory Franck, bienvenu(e) sur la plateforme d''acc\\u00e8s \\u00e0 l''infrmation.","etat":"success"}', NULL, '2019-09-06 10:06:34', '2019-09-06 10:06:34'),
('c5adfae5-5f87-44d4-9f8e-e4c19ab156b0', 'App\\Notifications\\NewAccount', 'App\\User', 78, '{"message":"Bonjour Ory Franck, bienvenu(e) sur la plateforme d''acc\\u00e8s \\u00e0 l''infrmation.","etat":"success"}', NULL, '2019-09-05 11:53:51', '2019-09-05 11:53:51'),
('c82a30ec-56e6-47ba-9bf8-df4dde4412cc', 'App\\Notifications\\NewAccount', 'App\\User', 85, '{"message":"Bonjour Ory , bienvenu(e) sur la plateforme d''acc\\u00e8s \\u00e0 l''infrmation.","etat":"success"}', NULL, '2019-09-06 09:15:21', '2019-09-06 09:15:21'),
('d993c3d7-e587-48f6-9a95-6253b584c249', 'App\\Notifications\\NewAccount', 'App\\User', 82, '{"message":"Bonjour Ory Franck, bienvenu(e) sur la plateforme d''acc\\u00e8s \\u00e0 l''infrmation.","etat":"success"}', NULL, '2019-09-05 17:14:29', '2019-09-05 17:14:29'),
('dbb5f45d-2257-42c4-81b3-204a13295f1d', 'App\\Notifications\\NewAccount', 'App\\User', 89, '{"message":"Bonjour Gnahor\\u00e9 Ory, bienvenu(e) sur la plateforme d''acc\\u00e8s \\u00e0 l''infrmation.","etat":"success"}', NULL, '2019-09-06 09:59:45', '2019-09-06 09:59:45'),
('dbf671b2-2c1d-4a6b-9446-e4969e0053ea', 'App\\Notifications\\NewAccount', 'App\\User', 81, '{"message":"Bonjour Ory Franck, bienvenu(e) sur la plateforme d''acc\\u00e8s \\u00e0 l''infrmation.","etat":"success"}', NULL, '2019-09-05 12:06:20', '2019-09-05 12:06:20'),
('e121b6cf-80c8-41a8-a5fd-2c6648e7a7ac', 'App\\Notifications\\NotifierProrogation', 'App\\User', 54, '{"etat":"info","message":"Votre demande d''acc\\u00e8s \\u00e0 l''information relative \\u00e0 : Bilan des activit\\u00e9s 2019 a \\u00e9t\\u00e9 prorog\\u00e9e au 26 Septembre 2019"}', NULL, '2019-09-04 10:22:24', '2019-09-04 10:22:24'),
('f3095f61-5a1e-44ec-8136-d7d2df4cc236', 'App\\Notifications\\NewAccount', 'App\\User', 73, '{"message":"Bonjour Ory Franck, bienvenu(e) sur la plateforme d''acc\\u00e8s \\u00e0 l''infrmation.","etat":"success"}', NULL, '2019-09-05 11:49:15', '2019-09-05 11:49:15'),
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=76 ;

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
(75, 'Foxy Digital', '12 12 12 1', 'dev@franckory.ci', '{"email":{"1":"Info@gmail.com"},"contact":null}', 'flooz_1909064627.png', '2019-09-06 08:46:27', '2019-09-06 08:46:27', 'Abidjan Cocody');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=25 ;

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
(24, 'Responsable Marketing', 1, '2019-09-06 08:46:27', '2019-09-06 08:46:27');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=58 ;

--
-- Contenu de la table `requerants`
--

INSERT INTO `requerants` (`id`, `nom`, `prenom`, `contact`, `email`, `sexe`, `titre`, `adressePostale`, `ville`, `dénomination`, `created_at`, `updated_at`, `type_id`, `qualite_id`) VALUES
(45, 'Franck', 'Xavier Ory', '48872346', 'franckory2@gmail.com', NULL, NULL, NULL, '0', NULL, '2019-09-03 16:17:55', '2019-09-03 16:17:55', 1, 1),
(46, 'Franck', 'Xavier Ory', '48872346', 'info@franckory.ci', NULL, NULL, NULL, '0', NULL, '2019-09-04 08:45:56', '2019-09-04 08:45:56', 2, 3),
(47, 'Ali', 'Patrick', '22890863', 'alip@yahoo.fr', NULL, NULL, NULL, '0', NULL, '2019-09-04 12:30:08', '2019-09-04 12:30:08', 2, 3),
(48, 'Ory', '', '48872346', 'info@gmail.com', NULL, NULL, NULL, 'Abidjan', NULL, '2019-09-06 09:13:25', '2019-09-06 09:13:25', 4, 1),
(49, 'Ory', '', '48872346', 'Info@foxy.ci', NULL, NULL, NULL, 'Yopougon', NULL, '2019-09-06 09:15:21', '2019-09-06 09:15:21', 4, 1),
(50, 'Ory', '', '48872346', 'Gnahore@gmail.com', NULL, NULL, '12 BP 12', 'Grand-Bassam', NULL, '2019-09-06 09:45:06', '2019-09-06 09:45:06', 4, 1),
(51, 'Ory', '', '48872346', 'ory@gmail.com', 'M', NULL, '12 BP 12', 'Marcory', NULL, '2019-09-06 09:55:06', '2019-09-06 09:55:06', 1, 3),
(52, 'Ory', '', '48872346', 'xav@gmail.com', 'M', NULL, '12 BP 12', 'Bouaké', NULL, '2019-09-06 09:56:10', '2019-09-06 09:56:10', 1, 3),
(53, 'Gnahoré', 'Ory', '48872346', 'xavier@foxy.ci', 'M', NULL, '12 BP 12', 'Dabou', NULL, '2019-09-06 09:59:44', '2019-09-06 09:59:44', 1, 1),
(54, 'Gnaohré', 'Ory Franck', '2147483647', 'foxy@gmail.com', 'M', NULL, '12 BP 12', 'Dabou', NULL, '2019-09-06 10:06:32', '2019-09-06 10:06:32', 2, 3),
(55, 'Ory', '', '48 87 23 46', 'franckory2@gmail.coml', 'M', NULL, '17 BP 17 12', 'Bouaké', NULL, '2019-09-06 10:46:48', '2019-09-06 10:46:48', 1, 1),
(56, 'Gnahoré', 'Ory', '42 30 31 92', 'xavier@foxy.com', 'M', NULL, '12 BP 21', 'Cocody', NULL, '2019-09-06 10:57:52', '2019-09-06 10:57:52', 2, 3),
(57, 'Ory', '', '48 87 23 46', 'franckory2@gmail.ci', 'M', NULL, '17 BP ABJ 17', 'Abidjan', NULL, '2019-09-06 13:00:29', '2019-09-06 13:00:29', 1, 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=43 ;

--
-- Contenu de la table `responsables`
--

INSERT INTO `responsables` (`id`, `nom`, `prenom`, `contact`, `email`, `autrecontact`, `etat`, `dateInactif`, `created_at`, `updated_at`, `organisme_id`, `qualiteresponsable_id`) VALUES
(14, 'Ory', 'Franck', '11111111', 'franckory2@gmail.com', NULL, 1, NULL, '2019-09-03 15:48:43', '2019-09-03 15:48:43', 20, 22),
(15, 'Gnahoré', 'Franck', '48872346', 'gnahore@gmail.com', NULL, 1, NULL, '2019-09-04 11:02:57', '2019-09-04 11:02:57', 21, 2),
(16, 'Ory', 'Franck', '48872346', 'bokraf@gmail.com', NULL, 1, NULL, '2019-09-04 11:53:24', '2019-09-04 11:53:24', 22, 2),
(17, 'Ossey', 'Tanguy', '22501714', 'tanguy.ossey@gmail.com', NULL, 1, NULL, '2019-09-04 12:19:59', '2019-09-04 12:19:59', 23, 23),
(18, 'Ory', 'Franck', '4887234 6', 'franckory2@gmail.com', NULL, 1, NULL, '2019-09-04 14:25:53', '2019-09-04 14:25:53', 24, 1),
(19, 'Ory', 'Franck', '4887234 6', 'franckory2@gmail.com', NULL, 1, NULL, '2019-09-04 14:26:39', '2019-09-04 14:26:39', 25, 1),
(20, 'Ory', 'Franck', '4887234 6', 'fraory2@gmail.com', NULL, 1, NULL, '2019-09-04 14:31:12', '2019-09-04 14:31:12', 26, 2),
(21, 'Ory', 'Franck', '4887234 6', 'franckory2@gmail.com', NULL, 1, NULL, '2019-09-04 16:27:52', '2019-09-04 16:27:52', 27, 2),
(22, 'Ory', 'Franck', '4887234 6', 'franssss2@gmail.com', NULL, 1, NULL, '2019-09-04 16:44:10', '2019-09-04 16:44:10', 30, 2),
(23, 'Ory', 'Franck', '4887234 6', 'franckory2@gmail.com', NULL, 1, NULL, '2019-09-04 16:47:15', '2019-09-04 16:47:15', 32, 2),
(24, 'Ory', 'Franck', '11111111', '22222222', '{"email":null,"contact":null}', 1, NULL, '2019-09-05 10:59:51', '2019-09-05 10:59:51', 53, 1),
(25, 'Ory', 'Franck', '11111111', '22222222', '{"email":null,"contact":null}', 1, NULL, '2019-09-05 11:02:15', '2019-09-05 11:02:15', 54, 1),
(26, 'Ory', 'Franck', '11111111', '22222222', '{"email":null,"contact":null}', 1, NULL, '2019-09-05 11:02:31', '2019-09-05 11:02:31', 55, 1),
(27, 'Ory', 'Franck', '11111111', '22222222', '{"email":null,"contact":null}', 1, NULL, '2019-09-05 11:03:05', '2019-09-05 11:03:05', 56, 1),
(28, 'Ory', 'Franck', '11111111', 'franckory2@gmail.com', '{"email":null,"contact":null}', 1, NULL, '2019-09-05 11:22:57', '2019-09-05 11:22:57', 61, 1),
(29, 'Ory', 'Franck', '11111111', 'franckory2@gmail.com', '{"email":null,"contact":null}', 1, NULL, '2019-09-05 11:37:05', '2019-09-05 11:37:05', 62, 1),
(30, 'Ory', 'Franck', '11111111', 'franckory2@gmail.comwwqq', '{"email":null,"contact":null}', 1, NULL, '2019-09-05 11:42:35', '2019-09-05 11:42:35', 63, 1),
(31, 'Ory', 'Franck', '11111111', 'franckory2@gmail.comw', '{"email":null,"contact":null}', 1, NULL, '2019-09-05 11:43:54', '2019-09-05 11:43:54', 64, 1),
(32, 'Ory', 'Franck', '11111111', 'franckory2@gmail.comdd', '{"email":null,"contact":null}', 1, NULL, '2019-09-05 11:49:15', '2019-09-05 11:49:15', 65, 1),
(33, 'Ory', 'Franck', '11111111', 'franckory2@gmail.comddmlpo', '{"email":null,"contact":null}', 1, NULL, '2019-09-05 11:49:59', '2019-09-05 11:49:59', 66, 1),
(34, 'Ory', 'Franck', '11111111', 'franckory2@gmail.cwqsaze', '{"email":null,"contact":null}', 1, NULL, '2019-09-05 11:51:11', '2019-09-05 11:51:11', 67, 1),
(35, 'Ory', 'Franck', '11111111', 'franckory2@gmail.cwqsazedxdsz', '{"email":null,"contact":null}', 1, NULL, '2019-09-05 11:51:41', '2019-09-05 11:51:41', 68, 1),
(36, 'Ory', 'Franck', '11111111', 'franckory2@gmail.cwqsnbdxdsz', '{"email":null,"contact":null}', 1, NULL, '2019-09-05 11:52:49', '2019-09-05 11:52:49', 69, 1),
(37, 'Ory', 'Franck', '11111111', 'franckory2@gmail.cwqsnbdxd', '{"email":null,"contact":null}', 1, NULL, '2019-09-05 11:53:51', '2019-09-05 11:53:51', 70, 1),
(38, 'Ory', 'Franck', '11111111', 'franory2@gmail.cwqsnbdxd', '{"email":null,"contact":null}', 1, NULL, '2019-09-05 11:54:48', '2019-09-05 11:54:48', 71, 1),
(39, 'Ory', 'Franck', '11111111', 'frany2@gmail.cwqsnbdxd', '{"email":null,"contact":null}', 1, NULL, '2019-09-05 12:04:18', '2019-09-05 12:04:18', 72, 1),
(40, 'Ory', 'Franck', '11111111', 'frany2@gmail.cwqsnbdmpl', '{"email":null,"contact":null}', 1, NULL, '2019-09-05 12:06:20', '2019-09-05 12:06:20', 73, 1),
(41, 'Ory', 'Franck', '21212121', 'gt@gg.cc', '{"email":null,"contact":null}', 1, NULL, '2019-09-05 17:14:29', '2019-09-05 17:14:29', 74, 1),
(42, 'Gnahoré', 'Ory Franck', '12121212', 'respo@mark.ci', '{"email":null,"contact":null}', 1, NULL, '2019-09-06 08:46:27', '2019-09-06 08:46:27', 75, 24);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=94 ;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `requerant_id`, `responsable_id`, `caidp`) VALUES
(54, 'Ory Franck', 'franckory2@gmail.com', NULL, '$2y$10$dBOi5KguLkDCMAtNzMMBqeE0qIYsJ/YJMbMDLELT0GXVjs8JMRUty', 'n6YVtv9tfrPEN9XptuOOKCCIyjoQvQt4MVGFauKcRpXsJG0PpFW3xuklSzfj', '2019-09-03 15:48:43', '2019-09-04 08:44:28', NULL, 14, NULL),
(55, 'Franck Xavier Ory', 'info@franckory.ci', NULL, '$2y$10$Fi1xZLInC7otrg60DB/A/ubaBD/i4BvmRBOeXoNDnT6CPkPaoiBNy', NULL, '2019-09-04 08:45:56', '2019-09-04 08:45:56', 46, NULL, NULL),
(56, 'Gnahoré Franck', 'gnahore@gmail.com', NULL, '$2y$10$4vXlky5V6zzRXtlz1bguH.B/l/XBmqK3C6lyOynPy/fLOWhbVBj9u', '2GlDEgwJsmq7yU6dTYGXv9U0YhsHEeaTmJ4uA45Bto27Y6cWO7JzzGdWEL02', '2019-09-04 11:02:58', '2019-09-04 11:15:52', NULL, 15, NULL),
(57, 'Ory Franck', 'bokraf@gmail.com', NULL, '$2y$10$5EHgjWLZ77TATxT2qFrtx..ydBLP75UxbpfDcxPKbrTayKlmjyvpC', NULL, '2019-09-04 11:53:24', '2019-09-04 11:53:24', NULL, 16, NULL),
(58, 'Ossey Tanguy', 'tanguy.ossey@gmail.com', NULL, '$2y$10$pLPPzg2kmpos8zWTdpnQVO3jeFrFwi3G1BVMjAbR66FzlFzQ7.74q', NULL, '2019-09-04 12:19:59', '2019-09-04 12:19:59', NULL, 17, NULL),
(59, 'Ali Patrick', 'alip@yahoo.fr', NULL, '$2y$10$GP4AXY9w1tBa.xBRn9InReAAC2ehc8wv.4nbf1UkmYAiAzRG/Oqge', NULL, '2019-09-04 12:30:08', '2019-09-04 12:30:08', 47, NULL, NULL),
(62, 'Ory Franck', 'fraory2@gmail.com', NULL, '$2y$10$2nYNemT2y88G54IBHrzVnupJEq9rGRbLQF0T400Ww/yqt39yT/7bO', '8a55RkdqTrAO4SKQQ6EPQ3uavChvTbByPGh3PoszqdLeT6etkAwENPMmECcA', '2019-09-04 14:31:12', '2019-09-04 14:31:12', NULL, 20, NULL),
(64, 'Ory Franck', 'franssss2@gmail.com', NULL, '$2y$10$ZPW0stspodTvWekwKoMhd.rWfgaW2zMbEqeHEkteY8sJ1uoEdJ1HC', NULL, '2019-09-04 16:44:10', '2019-09-04 16:44:10', NULL, 22, NULL),
(65, 'Ory Franck', '22222222', NULL, '$2y$10$3DEsY5bW9zN79PdIsQ4ViOeQzyFXYWNNIOmNJRIpAE39vBtlAXD42', NULL, '2019-09-05 10:59:51', '2019-09-05 10:59:51', NULL, 24, NULL),
(71, 'Ory Franck', 'franckory2@gmail.comwwqq', NULL, '$2y$10$xMHeH817/cpF7gHOPw3R6OsWNeuEYV5ebAL1OTBj1tARBISy0Oeom', NULL, '2019-09-05 11:42:35', '2019-09-05 11:42:35', NULL, 30, NULL),
(72, 'Ory Franck', 'franckory2@gmail.comw', NULL, '$2y$10$beIiMdkMur2pTsqCXXfDiu.PdBz8NShMJkOhK90iqtOrRGkO.Wf2m', NULL, '2019-09-05 11:43:54', '2019-09-05 11:43:54', NULL, 31, NULL),
(73, 'Ory Franck', 'franckory2@gmail.comdd', NULL, '$2y$10$iSR4BisAwZIujTKJLVwjr.xKQ98jVuosANmrT4zcZfRR.f1znKahq', NULL, '2019-09-05 11:49:15', '2019-09-05 11:49:15', NULL, 32, NULL),
(74, 'Ory Franck', 'franckory2@gmail.comddmlpo', NULL, '$2y$10$iHDExC0J7CfWVT2t/Tx.IeEe7n1N/7xrZ.NBy8sKwnpdnP9chWDrG', NULL, '2019-09-05 11:49:59', '2019-09-05 11:49:59', NULL, 33, NULL),
(75, 'Ory Franck', 'franckory2@gmail.cwqsaze', NULL, '$2y$10$zoGZPU3jfEk4rZxsxmZFKuyPf80TdcYTrF8mfm9YtLRpgk2uaoNFe', NULL, '2019-09-05 11:51:11', '2019-09-05 11:51:11', NULL, 34, NULL),
(76, 'Ory Franck', 'franckory2@gmail.cwqsazedxdsz', NULL, '$2y$10$0KGBv1.DK/aMfATVLRwb6OAVFxYHlGdaGX8GVPZZSZGvdaIc4KYxG', NULL, '2019-09-05 11:51:41', '2019-09-05 11:51:41', NULL, 35, NULL),
(77, 'Ory Franck', 'franckory2@gmail.cwqsnbdxdsz', NULL, '$2y$10$7PIpkbhFOoB.PYMFeGrh3eTqfB4HnkzPR8fCfSbo08NcxNEf5xvre', NULL, '2019-09-05 11:52:49', '2019-09-05 11:52:49', NULL, 36, NULL),
(78, 'Ory Franck', 'franckory2@gmail.cwqsnbdxd', NULL, '$2y$10$JPvPtGfuYU3pl1.66ViU2OwvvCTA6zcQfe4T0M2ydsa8jlgAeL6je', NULL, '2019-09-05 11:53:51', '2019-09-05 11:53:51', NULL, 37, NULL),
(79, 'Ory Franck', 'franory2@gmail.cwqsnbdxd', NULL, '$2y$10$CdRadXahR5EbOssG3OeZP.r9f8cMJ7VDDGfRK7nJZcYhzRtamEFI6', NULL, '2019-09-05 11:54:48', '2019-09-05 11:54:48', NULL, 38, NULL),
(80, 'Ory Franck', 'frany2@gmail.cwqsnbdxd', NULL, '$2y$10$8r.KilA4/u4JhmyzKh/ubui4kryEWNBWV5CfSTbskH6LEPodO83Py', NULL, '2019-09-05 12:04:18', '2019-09-05 12:04:18', NULL, 39, NULL),
(81, 'Ory Franck', 'frany2@gmail.cwqsnbdmpl', NULL, '$2y$10$ycQ9lxcONP/EaaF0FJL3L.L/VEPcx/41rvH0D9JOlLWgvFsrnqWUG', 'CKTCucY8R9aGxZc9tfOpNQ3z1IYeRePygJ411GB6s5g63vWF9Y8rqZXtELOL', '2019-09-05 12:06:20', '2019-09-05 12:06:20', NULL, 40, NULL),
(82, 'Ory Franck', 'gt@gg.cc', NULL, '$2y$10$e9ORo7hxL/JySkHIoj37G.n6ywrI05AgtkWT8H9TSCBfqj4ps3EnG', NULL, '2019-09-05 17:14:29', '2019-09-05 17:14:29', NULL, 41, NULL),
(83, 'Gnahoré Ory Franck', 'respo@mark.ci', NULL, '$2y$10$or4U.xStciI5OUA/PmDzF.H0mgvv5kdyab.xVipG1YwsCtKu2DaX6', NULL, '2019-09-06 08:46:28', '2019-09-06 08:46:28', NULL, 42, NULL),
(84, 'Ory ', 'info@gmail.com', NULL, '$2y$10$8ii7P8.SULF1ZIehzgwmWe/aNzWEKgEt9xJBGdgx2f7eg87bhbsw.', NULL, '2019-09-06 09:13:26', '2019-09-06 09:13:26', 48, NULL, NULL),
(85, 'Ory ', 'Info@foxy.ci', NULL, '$2y$10$.9.HSUGHl0/FyTDpiPrBuuCLltghDObv8bmtAbwpTPwgIspCfCB7K', NULL, '2019-09-06 09:15:21', '2019-09-06 09:15:21', 49, NULL, NULL),
(87, 'Ory ', 'ory@gmail.com', NULL, '$2y$10$ytlcTielhSQhHUeTimV8BOjGuPQi5BGCaXXVq7NoqXrX74PVTbpt.', NULL, '2019-09-06 09:55:06', '2019-09-06 09:55:06', 51, NULL, NULL),
(88, 'Ory ', 'xav@gmail.com', NULL, '$2y$10$B6Qrkx937u7a1caxarLJUOlrlvLJocR9.8vHvN6diszDm.eRZQtjm', NULL, '2019-09-06 09:56:10', '2019-09-06 09:56:10', 52, NULL, NULL),
(89, 'Gnahoré Ory', 'xavier@foxy.ci', NULL, '$2y$10$Zv5IxSn3FZzhx4zxM2rA5O.t1xXIXKSqbzA.mS3OSqz6lvk23IJpu', NULL, '2019-09-06 09:59:45', '2019-09-06 09:59:45', 53, NULL, NULL),
(90, 'Gnaohré Ory Franck', 'foxy@gmail.com', NULL, '$2y$10$RB.9/lUHAVA0rId/z9/tX.s.9TlcI22.gU3T3r9eEqmm01AYjJzTe', NULL, '2019-09-06 10:06:34', '2019-09-06 10:06:34', 54, NULL, NULL),
(91, 'Ory ', 'franckory2@gmail.coml', NULL, '$2y$10$VMVyLfLr0WyOJTm.4ltgb.MshTz1PhlbQzY0ehSN2bTIIIV9gto1y', NULL, '2019-09-06 10:46:49', '2019-09-06 10:46:49', 55, NULL, NULL),
(92, 'Gnahoré Ory', 'xavier@foxy.com', NULL, '$2y$10$VaHLEpUQAK/x/LtCRyj2hexL4.NMA.3n3vgRs.l89.2Q1ppVW8qTq', NULL, '2019-09-06 10:57:53', '2019-09-06 10:57:53', 56, NULL, NULL),
(93, 'Ory ', 'franckory2@gmail.ci', NULL, '$2y$10$5GK6ik4oGxkoxsKgYhDhYO7cz.ZsGgPTOLqyaT24KWrBUb.Fj02nq', NULL, '2019-09-06 13:00:29', '2019-09-06 13:00:29', 57, NULL, NULL);

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

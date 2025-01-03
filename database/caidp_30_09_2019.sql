-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 30, 2019 at 10:32 AM
-- Server version: 8.0.17
-- PHP Version: 7.3.9-1~deb10u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `caidp`
--

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `contact` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `responsable_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `decisioncaipdps`
--

CREATE TABLE `decisioncaipdps` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `decison` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `decisionpredefinies`
--

CREATE TABLE `decisionpredefinies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `decisonPredefinie` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `typeDecision` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `decisionpredefinies`
--

INSERT INTO `decisionpredefinies` (`id`, `decisonPredefinie`, `typeDecision`, `created_at`, `updated_at`) VALUES
(1, '<div style=\"float:right\">&nbsp;24 Septembre 2019</div>\r\n\r\n<div style=\"float:left\">&nbsp;</div>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<div style=\"float:left\">&nbsp; Foxy Digitall</div>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<div style=\"float:left\">&nbsp; foxydigital@gmail.com</div>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<div style=\"float:left\">&nbsp; 11 11 11 11</div>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<div style=\"text-align:right\">&nbsp;</div>\r\n\r\n<div style=\"text-align:right\">&nbsp;</div>\r\n\r\n<div style=\"text-align:right\">A</div>\r\n\r\n<div style=\"text-align:right\">[%%nomReq%%]</div>\r\n\r\n<div style=\"text-align:right\">&nbsp;</div>\r\n\r\n<div style=\"text-align:right\">&nbsp;</div>\r\n\r\n<div style=\"text-align:left\">&nbsp;</div>\r\n\r\n<div style=\"text-align:left\"><strong><u>OBJET :</u></strong> DECISON</div>\r\n\r\n<div style=\"text-align:left\">&nbsp;</div>\r\n\r\n<div style=\"text-align:left\">&nbsp;</div>\r\n\r\n<div style=\"text-align:left\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; [%%titre%%]</div>\r\n\r\n<div style=\"text-align:left\">&nbsp;</div>\r\n\r\n<div style=\"text-align:justify\">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.<br />\r\n<br />\r\nDuis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.<br />\r\n<br />\r\nUt wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.<br />\r\n<br />\r\nNam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.</div>\r\n\r\n<div style=\"text-align:left\">&nbsp;</div>\r\n\r\n<div style=\"text-align:left\">&nbsp;</div>\r\n\r\n<div style=\"text-align:right\">Fais &agrave; Abidjan le 24 Septembre 2019</div>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n', '', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `decisions`
--

CREATE TABLE `decisions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `decison` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `propose_par_ri` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `valide_par_rh` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `dateValidation` date NOT NULL,
  `etat` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'si 0 alors la décison n''a pas encore été validé par le responsable hiérachique ',
  `envoye` tinyint(1) DEFAULT NULL COMMENT 'Si 0= Pas encore envoyé, si 1 = envoye',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `demande_id` bigint(20) UNSIGNED NOT NULL,
  `date_validation` timestamp NULL DEFAULT NULL,
  `date_envoie` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `decisions`
--

INSERT INTO `decisions` (`id`, `decison`, `propose_par_ri`, `valide_par_rh`, `dateValidation`, `etat`, `envoye`, `created_at`, `updated_at`, `demande_id`, `date_validation`, `date_envoie`) VALUES
(68, '<div style=\"float:right\">&nbsp;24 Septembre 2019</div>\n\n<div style=\"float:left\">&nbsp;</div>\n\n<p>&nbsp;</p>\n\n<div style=\"float:left\">&nbsp; Foxy Digitall</div>\n\n<p>&nbsp;</p>\n\n<div style=\"float:left\">&nbsp; foxydigital@gmail.com</div>\n\n<p>&nbsp;</p>\n\n<div style=\"float:left\">&nbsp; 11 11 11 11</div>\n\n<p>&nbsp;</p>\n\n<p>&nbsp;</p>\n\n<div style=\"text-align:right\">&nbsp;</div>\n\n<div style=\"text-align:right\">&nbsp;</div>\n\n<div style=\"text-align:right\">A</div>\n\n<div style=\"text-align:right\">[%%nomReq%%]</div>\n\n<div style=\"text-align:right\">&nbsp;</div>\n\n<div style=\"text-align:right\">&nbsp;</div>\n\n<div style=\"text-align:left\">&nbsp;</div>\n\n<div style=\"text-align:left\"><strong><u>OBJET :</u></strong> DECISON</div>\n\n<div style=\"text-align:left\">&nbsp;</div>\n\n<div style=\"text-align:left\">&nbsp;</div>\n\n<div style=\"text-align:left\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; [%%titre%%]</div>\n\n<div style=\"text-align:left\">&nbsp;</div>\n\n<div style=\"text-align:justify\">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.<br />\n<br />\nDuis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.<br />\n<br />\nUt wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.<br />\n<br />\nNam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.</div>\n\n<div style=\"text-align:left\">&nbsp;</div>\n\n<div style=\"text-align:left\">&nbsp;</div>\n\n<div style=\"text-align:right\">Fais &agrave; Abidjan le 24 Septembre 2019</div>\n\n<p>&nbsp;</p>\n\n<p>&nbsp;</p>\n\n<p>&nbsp;</p>\n\n<p>&nbsp;</p>\n\n<p>&nbsp;</p>', 'Gnahoré Ory', 'Gnahoré Ory', '2019-09-25', 1, NULL, '2019-09-25 16:59:46', '2019-09-25 16:59:46', 65, NULL, NULL),
(69, '<div style=\"float:right\">&nbsp;24 Septembre 2019</div>\n\n<div style=\"float:left\">&nbsp;</div>\n\n<p>&nbsp;</p>\n\n<div style=\"float:left\">&nbsp; Foxy Digitall</div>\n\n<p>&nbsp;</p>\n\n<div style=\"float:left\">&nbsp; foxydigital@gmail.com</div>\n\n<p>&nbsp;</p>\n\n<div style=\"float:left\">&nbsp; 11 11 11 11</div>\n\n<p>&nbsp;</p>\n\n<p>&nbsp;</p>\n\n<div style=\"text-align:right\">&nbsp;</div>\n\n<div style=\"text-align:right\">&nbsp;</div>\n\n<div style=\"text-align:right\">A</div>\n\n<div style=\"text-align:right\">[%%nomReq%%]</div>\n\n<div style=\"text-align:right\">&nbsp;</div>\n\n<div style=\"text-align:right\">&nbsp;</div>\n\n<div style=\"text-align:left\">&nbsp;</div>\n\n<div style=\"text-align:left\"><strong><u>OBJET :</u></strong> DECISON</div>\n\n<div style=\"text-align:left\">&nbsp;</div>\n\n<div style=\"text-align:left\">&nbsp;</div>\n\n<div style=\"text-align:left\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; [%%titre%%]</div>\n\n<div style=\"text-align:left\">&nbsp;</div>\n\n<div style=\"text-align:justify\">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.<br />\n<br />\nDuis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.<br />\n<br />\nUt wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.<br />\n<br />\nNam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.</div>\n\n<div style=\"text-align:left\">&nbsp;</div>\n\n<div style=\"text-align:left\">&nbsp;</div>\n\n<div style=\"text-align:right\">Fais &agrave; Abidjan le 24 Septembre 2019</div>\n\n<p>&nbsp;</p>\n\n<p>&nbsp;</p>\n\n<p>&nbsp;</p>\n\n<p>&nbsp;</p>\n\n<p>&nbsp;</p>', 'Gnahoré Ory', 'Gnahoré Ory', '2019-09-25', 1, NULL, '2019-09-25 17:00:43', '2019-09-25 17:00:43', 65, NULL, NULL),
(70, '<div style=\"float:right\">&nbsp;24 Septembre 2019</div>\n\n<div style=\"float:left\">&nbsp;</div>\n\n<p>&nbsp;</p>\n\n<div style=\"float:left\">&nbsp; Foxy Digitall</div>\n\n<p>&nbsp;</p>\n\n<div style=\"float:left\">&nbsp; foxydigital@gmail.com</div>\n\n<p>&nbsp;</p>\n\n<div style=\"float:left\">&nbsp; 11 11 11 11</div>\n\n<p>&nbsp;</p>\n\n<p>&nbsp;</p>\n\n<div style=\"text-align:right\">&nbsp;</div>\n\n<div style=\"text-align:right\">&nbsp;</div>\n\n<div style=\"text-align:right\">A</div>\n\n<div style=\"text-align:right\">[%%nomReq%%]</div>\n\n<div style=\"text-align:right\">&nbsp;</div>\n\n<div style=\"text-align:right\">&nbsp;</div>\n\n<div style=\"text-align:left\">&nbsp;</div>\n\n<div style=\"text-align:left\"><strong><u>OBJET :</u></strong> DECISON</div>\n\n<div style=\"text-align:left\">&nbsp;</div>\n\n<div style=\"text-align:left\">&nbsp;</div>\n\n<div style=\"text-align:left\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; [%%titre%%]</div>\n\n<div style=\"text-align:left\">&nbsp;</div>\n\n<div style=\"text-align:justify\">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.<br />\n<br />\nDuis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.<br />\n<br />\nUt wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.<br />\n<br />\nNam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.</div>\n\n<div style=\"text-align:left\">&nbsp;</div>\n\n<div style=\"text-align:left\">&nbsp;</div>\n\n<div style=\"text-align:right\">Fais &agrave; Abidjan le 24 Septembre 2019</div>\n\n<p>&nbsp;</p>\n\n<p>&nbsp;</p>\n\n<p>&nbsp;</p>\n\n<p>&nbsp;</p>\n\n<p>&nbsp;</p>', 'gdgdgdg gdgdgdg', 'gdgdgdg gdgdgdg', '2019-09-26', 0, NULL, '2019-09-26 08:21:29', '2019-09-26 08:21:29', 64, NULL, NULL),
(71, '<div style=\"float:right\">&nbsp;24 Septembre 2019</div>\n\n<div style=\"float:left\">&nbsp;</div>\n\n<p>&nbsp;</p>\n\n<div style=\"float:left\">&nbsp; Foxy Digitall</div>\n\n<p>&nbsp;</p>\n\n<div style=\"float:left\">&nbsp; foxydigital@gmail.com</div>\n\n<p>&nbsp;</p>\n\n<div style=\"float:left\">&nbsp; 11 11 11 11</div>\n\n<p>&nbsp;</p>\n\n<p>&nbsp;</p>\n\n<div style=\"text-align:right\">&nbsp;</div>\n\n<div style=\"text-align:right\">&nbsp;</div>\n\n<div style=\"text-align:right\">A</div>\n\n<div style=\"text-align:right\">[%%nomReq%%]</div>\n\n<div style=\"text-align:right\">&nbsp;</div>\n\n<div style=\"text-align:right\">&nbsp;</div>\n\n<div style=\"text-align:left\">&nbsp;</div>\n\n<div style=\"text-align:left\"><strong><u>OBJET :</u></strong> DECISON</div>\n\n<div style=\"text-align:left\">&nbsp;</div>\n\n<div style=\"text-align:left\">&nbsp;</div>\n\n<div style=\"text-align:left\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; [%%titre%%]</div>\n\n<div style=\"text-align:left\">&nbsp;</div>\n\n<div style=\"text-align:justify\">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.<br />\n<br />\nDuis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.<br />\n<br />\nUt wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.<br />\n<br />\nNam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.</div>\n\n<div style=\"text-align:left\">&nbsp;</div>\n\n<div style=\"text-align:left\">&nbsp;</div>\n\n<div style=\"text-align:right\">Fais &agrave; Abidjan le 24 Septembre 2019</div>\n\n<p>&nbsp;</p>\n\n<p>&nbsp;</p>\n\n<p>&nbsp;</p>\n\n<p>&nbsp;</p>\n\n<p>&nbsp;</p>', 'gdgdgdg gdgdgdg', 'gdgdgdg gdgdgdg', '2019-09-26', 1, NULL, '2019-09-26 11:12:23', '2019-09-26 11:12:23', 63, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `demandes`
--

CREATE TABLE `demandes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `libelle` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `scane` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dateDemande` datetime NOT NULL,
  `brouillon` tinyint(1) NOT NULL DEFAULT '1',
  `transmission` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'mode de transmission : email, clé, fax, etc',
  `requerant_id` bigint(20) UNSIGNED NOT NULL,
  `mandant_id` int(11) DEFAULT NULL,
  `organisme_id` bigint(20) UNSIGNED NOT NULL,
  `direction` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `service` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dateProrogation` date DEFAULT NULL,
  `motifProrogation` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `autoEnregsitrement` tinyint(1) DEFAULT NULL,
  `favorable` int(11) DEFAULT NULL COMMENT 'Si 1 alors non satisfait, si 2 alors partiellement satisfait, si 3 totalement satisfait',
  `etat` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Si 0 alors pas encors traié, si 1 alors traité ou traiement en cours',
  `liquide` tinyint(1) DEFAULT NULL COMMENT '0=non liquide, 1=liquide',
  `motifliquide` int(11) DEFAULT NULL COMMENT 'SI 1 = traité; si 2 = pas repondu',
  `dateliquide` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `demandes`
--

INSERT INTO `demandes` (`id`, `libelle`, `description`, `scane`, `dateDemande`, `brouillon`, `transmission`, `requerant_id`, `mandant_id`, `organisme_id`, `direction`, `service`, `dateProrogation`, `motifProrogation`, `created_at`, `updated_at`, `autoEnregsitrement`, `favorable`, `etat`, `liquide`, `motifliquide`, `dateliquide`) VALUES
(53, 'Libellé', 'reste ', NULL, '2019-09-01 00:00:00', 0, NULL, 72, NULL, 148, '', '', NULL, NULL, '2019-09-20 10:34:18', '2019-09-20 10:34:18', NULL, NULL, 0, NULL, NULL, NULL),
(54, 'Libellé', 'reste ', NULL, '2019-09-01 00:00:00', 0, NULL, 72, NULL, 148, '', '', NULL, NULL, '2019-09-20 10:35:18', '2019-09-20 10:35:18', NULL, NULL, 0, NULL, NULL, NULL),
(55, 'Libellé', 'reste ', NULL, '2019-09-01 00:00:00', 0, NULL, 80, NULL, 148, '', '', NULL, NULL, '2019-09-20 11:41:01', '2019-09-20 11:41:01', NULL, NULL, 0, NULL, NULL, NULL),
(56, 'Libellé', 'reste ', NULL, '2019-09-01 00:00:00', 0, NULL, 82, NULL, 148, '', '', NULL, NULL, '2019-09-20 12:01:23', '2019-09-20 12:01:23', NULL, NULL, 0, NULL, NULL, NULL),
(57, 'Libellé', 'reste ', NULL, '2019-09-01 00:00:00', 0, NULL, 83, NULL, 148, '', '', NULL, NULL, '2019-09-20 12:08:38', '2019-09-20 12:08:38', NULL, NULL, 0, NULL, NULL, NULL),
(58, 'Libellé', 'reste ', NULL, '2019-09-01 00:00:00', 0, NULL, 87, 13, 148, '', '', NULL, NULL, '2019-09-20 14:01:53', '2019-09-20 14:01:53', NULL, NULL, 0, NULL, NULL, NULL),
(59, 'Libellé', 'reste ', NULL, '2019-09-01 00:00:00', 0, NULL, 88, NULL, 148, '', '', '2019-10-12', 'OUI', '2019-09-20 14:17:58', '2019-09-20 14:37:54', NULL, NULL, 1, NULL, NULL, NULL),
(60, 'Libellé', 'reste ', NULL, '2019-09-01 00:00:00', 0, NULL, 72, NULL, 148, '', '', '2019-10-12', 'OUI', '2019-09-20 14:38:51', '2019-09-20 14:38:56', NULL, NULL, 1, NULL, NULL, NULL),
(61, 'Bilan des activité de l\'année 2012 2013', ' Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. ', NULL, '2019-07-28 00:00:00', 0, NULL, 89, NULL, 148, '', '', '2019-08-26', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.', '2019-09-23 09:03:44', '2019-09-23 13:37:08', NULL, 1, 1, NULL, NULL, NULL),
(62, 'Activés 2019-2020', ' Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.', NULL, '2019-09-01 00:00:00', 0, '[\"email\",\"numerique\"]', 75, NULL, 122, 'Direction commerciale', 'Service Juridique', '2019-09-30', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.', '2019-09-24 08:34:16', '2019-09-25 09:14:23', NULL, 1, 1, NULL, NULL, NULL),
(63, 'nvidunt ut labore et dolore magna ', ' Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.', NULL, '2019-08-05 00:00:00', 0, '[\"email\",\"faxe\",\"physique\",\"numerique\"]', 90, NULL, 122, '', '', NULL, NULL, '2019-09-25 11:42:57', '2019-09-26 11:12:24', NULL, 1, 1, NULL, NULL, NULL),
(64, 'Programme des activitéq relatives à l\'annéee 2018 - 2020', ' Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.', NULL, '2019-09-03 00:00:00', 0, '[\"email\",\"faxe\",\"physique\",\"numerique\"]', 91, NULL, 122, 'DIrection marketing et communication', 'Service marketing et Achat', NULL, NULL, '2019-09-25 14:28:15', '2019-09-26 08:21:29', NULL, 1, 1, NULL, NULL, NULL),
(65, 'sanctus est Lorem ipsum dolor sit amet', ' Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.', 'diagrammes-collaboration-seuls_1909253449.pdf', '2019-09-11 00:00:00', 0, '[\"email\",\"faxe\",\"physique\",\"numerique\"]', 91, NULL, 148, '', '', NULL, NULL, '2019-09-25 14:34:51', '2019-09-25 16:57:29', NULL, 1, 1, NULL, NULL, NULL),
(66, 'dgdgdgdgdg', 'hdhdhdhdhdhd ', NULL, '2019-09-24 00:00:00', 0, NULL, 72, NULL, 122, '', '', NULL, NULL, '2019-09-26 16:20:33', '2019-09-26 16:20:33', NULL, NULL, 0, NULL, NULL, NULL),
(67, 'Lorem 2019-2030', ' Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.', NULL, '2019-09-01 00:00:00', 0, NULL, 72, NULL, 122, '', '', '2019-09-25', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.', '2019-09-27 13:19:38', '2019-09-27 15:00:55', NULL, NULL, 1, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `documents`
--

CREATE TABLE `documents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `libelle` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `document` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `demande_id` bigint(20) UNSIGNED DEFAULT NULL,
  `information_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `documents`
--

INSERT INTO `documents` (`id`, `libelle`, `document`, `created_at`, `updated_at`, `demande_id`, `information_id`) VALUES
(2, NULL, 'opportuniste_1909254556.pdf', '2019-09-25 11:45:56', '2019-09-25 11:45:56', NULL, 21),
(3, NULL, 'diagramme-classe-brute-seul_1909253716.pdf', '2019-09-25 14:37:16', '2019-09-25 14:37:16', NULL, 22);

-- --------------------------------------------------------

--
-- Table structure for table `informations`
--

CREATE TABLE `informations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `libelle` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `information` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `dateCommunication` timestamp NULL DEFAULT NULL,
  `public` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `demande_id` bigint(20) UNSIGNED DEFAULT NULL,
  `source_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `informations`
--

INSERT INTO `informations` (`id`, `libelle`, `information`, `dateCommunication`, `public`, `created_at`, `updated_at`, `demande_id`, `source_id`) VALUES
(19, 'Bilan des activité de l\'année 2012 2013', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.', NULL, NULL, '2019-09-23 09:50:00', '2019-09-23 09:50:00', 61, 3),
(20, 'Activés 2019-2020', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.', NULL, NULL, '2019-09-24 10:14:19', '2019-09-24 10:14:19', 62, 2),
(21, 'nvidunt ut labore et dolore magna ', '', NULL, NULL, '2019-09-25 11:45:53', '2019-09-25 11:45:53', 63, 2),
(22, 'sanctus est Lorem ipsum dolor sit amet', 'xxxx nnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnn xnxjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjaaaaaaaaaaaaaaaaaaaaaassssssssssssssssssssssssssssssssss', NULL, NULL, '2019-09-25 14:37:13', '2019-09-25 14:37:13', 65, 2),
(23, 'Lorem 2019-2030', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.', NULL, NULL, '2019-09-27 15:26:54', '2019-09-27 15:26:54', 67, 2);

-- --------------------------------------------------------

--
-- Table structure for table `mandants`
--

CREATE TABLE `mandants` (
  `id` int(11) NOT NULL,
  `nom` varchar(191) NOT NULL,
  `prenom` varchar(191) NOT NULL,
  `sexe` varchar(1) NOT NULL,
  `profession` varchar(150) NOT NULL,
  `pieceMandant` varchar(225) DEFAULT NULL,
  `ville` varchar(30) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mandants`
--

INSERT INTO `mandants` (`id`, `nom`, `prenom`, `sexe`, `profession`, `pieceMandant`, `ville`, `updated_at`) VALUES
(7, 'Bokra', 'Leo', 'F', 'Assistante', 'capture-decran-de-2019-09-19-14-52-12_1909205111.png', 'RIv', '2019-09-20 12:01:22'),
(8, 'Gna', 'gfdgfgfg', 'F', 'gdgdgdg', 'capture-decran-de-2019-09-19-14-52-12_1909200808.png', 'gdgdgdgdg', '2019-09-20 12:08:37'),
(9, 'Gnahoré', 'Ory', 'F', 'FFFFFFF', 'capture-decran-de-2019-09-19-14-52-12_1909205223.png', 'FFFFFFF', '2019-09-20 13:52:34'),
(10, 'Gnahoré', 'Ory', 'F', 'FFFFFFF', 'capture-decran-de-2019-09-19-14-52-12_1909205223.png', 'FFFFFFF', '2019-09-20 13:53:16'),
(11, 'Gnahoré', 'Ory', 'F', 'FFFFFFF', 'capture-decran-de-2019-09-19-14-52-12_1909205558.png', 'FFFFFFF', '2019-09-20 13:56:36'),
(12, 'Gnahoré', 'Ory', 'F', 'FFFFFFF', 'capture-decran-de-2019-09-19-14-52-12_1909205558.png', 'FFFFFFF', '2019-09-20 13:57:21'),
(13, 'Gnahoré', 'Ory', 'F', 'FFFFFFF', 'capture-decran-de-2019-09-19-14-52-12_1909200146.png', 'FFFFFFF', '2019-09-20 14:01:52');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
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
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_type` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` bigint(20) UNSIGNED NOT NULL,
  `data` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `type`, `notifiable_type`, `notifiable_id`, `data`, `read_at`, `created_at`, `updated_at`) VALUES
('00c911f8-b2fa-4714-8531-5af8d8c12401', 'App\\Notifications\\NewAccount', 'App\\User', 77, '{\"message\":\"Bonjour Ory Franck, bienvenu(e) sur la plateforme d\'acc\\u00e8s \\u00e0 l\'infrmation.\",\"etat\":\"success\"}', NULL, '2019-09-05 11:52:49', '2019-09-05 11:52:49'),
('00de15f1-62dc-44c3-942b-9f56e69f3cf6', 'App\\Notifications\\NewAccount', 'App\\User', 100, '{\"message\":\"Bonjour Ossey Tanguy, bienvenu(e) sur la plateforme d\'acc\\u00e8s \\u00e0 l\'infrmation.\",\"etat\":\"success\"}', NULL, '2019-09-09 16:47:12', '2019-09-09 16:47:12'),
('00e1a1ee-66eb-4abe-b6c0-7beb8ae6628e', 'App\\Notifications\\NotifierProrogation', 'App\\User', 94, '{\"etat\":\"info\",\"message\":\"Votre demande d\'acc\\u00e8s \\u00e0 l\'information relative \\u00e0 : Bilan des activit\\u00e9s 2010 a \\u00e9t\\u00e9 prorog\\u00e9e au 09 Octobre 2019\"}', NULL, '2019-09-09 13:37:50', '2019-09-09 13:37:50'),
('02c58aa8-2f01-4959-981e-74427fc91d19', 'App\\Notifications\\NotifierProrogation', 'App\\User', 95, '{\"etat\":\"info\",\"message\":\"Votre demande d\'acc\\u00e8s \\u00e0 l\'information relative \\u00e0 : Libelle a \\u00e9t\\u00e9 prorog\\u00e9e au 16 Octobre 2019\"}', NULL, '2019-09-09 16:27:10', '2019-09-09 16:27:10'),
('0385425d-8910-40a6-b2be-e7cfa35b62f9', 'App\\Notifications\\NewAccount', 'App\\User', 144, '{\"message\":\"Bonjour gdgdgdg gdgdgdg, bienvenu(e) sur la plateforme d\'acc\\u00e8s \\u00e0 l\'infrmation.\",\"etat\":\"success\"}', NULL, '2019-09-19 11:46:08', '2019-09-19 11:46:08'),
('03f637e2-bfc8-4828-a63e-57b0f8a22e4a', 'App\\Notifications\\NotifierProrogation', 'App\\User', 54, '{\"etat\":\"info\",\"message\":\"Votre demande d\'acc\\u00e8s \\u00e0 l\'information relative \\u00e0 : hxdhdh a \\u00e9t\\u00e9 prorog\\u00e9e au 10 Septembre 2019\"}', NULL, '2019-09-09 10:49:04', '2019-09-09 10:49:04'),
('06c85fae-ab5f-4a8b-8c4f-f4be75264996', 'App\\Notifications\\NewAccount', 'App\\User', 150, '{\"message\":\"Bonjour Gallet Richard, bienvenu(e) sur la plateforme d\'acc\\u00e8s \\u00e0 l\'infrmation.\",\"etat\":\"success\"}', NULL, '2019-09-19 14:03:44', '2019-09-19 14:03:44'),
('099e8bef-6c30-4e68-bc15-fb203f228478', 'App\\Notifications\\NewAccount', 'App\\User', 136, '{\"message\":\"Bonjour Ory Franck, bienvenu(e) sur la plateforme d\'acc\\u00e8s \\u00e0 l\'infrmation.\",\"etat\":\"success\"}', NULL, '2019-09-17 09:35:10', '2019-09-17 09:35:10'),
('09fae2b1-978f-4cec-a53e-9e0fdef6e1ee', 'App\\Notifications\\NewAccount', 'App\\User', 132, '{\"message\":\"Bonjour Ory , bienvenu(e) sur la plateforme d\'acc\\u00e8s \\u00e0 l\'infrmation.\",\"etat\":\"success\"}', NULL, '2019-09-11 14:22:08', '2019-09-11 14:22:08'),
('0a87ac58-bddd-49fb-a548-a92035306c16', 'App\\Notifications\\NewAccount', 'App\\User', 72, '{\"message\":\"Bonjour Ory Franck, bienvenu(e) sur la plateforme d\'acc\\u00e8s \\u00e0 l\'infrmation.\",\"etat\":\"success\"}', NULL, '2019-09-05 11:43:54', '2019-09-05 11:43:54'),
('0c33d149-e7db-4a43-8488-639a3c3b6b3f', 'App\\Notifications\\NewAccount', 'App\\User', 116, '{\"message\":\"Bonjour Ory Franck, bienvenu(e) sur la plateforme d\'acc\\u00e8s \\u00e0 l\'infrmation.\",\"etat\":\"success\"}', NULL, '2019-09-11 09:52:35', '2019-09-11 09:52:35'),
('0c705fe9-9483-41c7-a1cb-142f3ba1955c', 'App\\Notifications\\NotifierProrogation', 'App\\User', 143, '{\"etat\":\"info\",\"message\":\"Votre demande d\'acc\\u00e8s \\u00e0 l\'information relative \\u00e0 : Bilan Fiancier de l\'exercice de l\'ann\\u00e9e 2012 a \\u00e9t\\u00e9 prorog\\u00e9e au 18 Septembre 2019\"}', NULL, '2019-09-19 08:14:20', '2019-09-19 08:14:20'),
('0f89b910-800b-407c-a9dd-4499038b0d27', 'App\\Notifications\\NotifierProrogation', 'App\\Requerant', 75, '[]', NULL, '2019-09-24 09:27:24', '2019-09-24 09:27:24'),
('114c2756-89f0-42b8-b49f-09403fad1b91', 'App\\Notifications\\NewAccount', 'App\\User', 125, '{\"message\":\"Bonjour Ory Franck, bienvenu(e) sur la plateforme d\'acc\\u00e8s \\u00e0 l\'infrmation.\",\"etat\":\"success\"}', NULL, '2019-09-11 10:33:25', '2019-09-11 10:33:25'),
('146f02ce-44c4-4f59-a554-c9f6d7b782be', 'App\\Notifications\\NewAccount', 'App\\User', 145, '{\"message\":\"Bonjour Gnahor\\u00e9 Ory Franck Xavier, bienvenu(e) sur la plateforme d\'acc\\u00e8s \\u00e0 l\'infrmation.\",\"etat\":\"success\"}', NULL, '2019-09-19 12:58:18', '2019-09-19 12:58:18'),
('175b9f6c-2dd6-49fa-8332-ab7a3f5e4cab', 'App\\Notifications\\NewAccount', 'App\\User', 151, '{\"message\":\"Bonjour ddhdhdh hdhdhdh, bienvenu(e) sur la plateforme d\'acc\\u00e8s \\u00e0 l\'infrmation.\",\"etat\":\"success\"}', NULL, '2019-09-19 15:21:15', '2019-09-19 15:21:15'),
('18696a7c-0952-4b4a-8efa-805b02b8b2fb', 'App\\Notifications\\NotifierProrogation', 'App\\User', 94, '{\"etat\":\"info\",\"message\":\"Votre demande d\'acc\\u00e8s \\u00e0 l\'information relative \\u00e0 : Libelle a \\u00e9t\\u00e9 prorog\\u00e9e au 28 Septembre 2019\"}', NULL, '2019-09-09 15:33:30', '2019-09-09 15:33:30'),
('18a37932-c78b-4f37-9eaa-78ef05792f46', 'App\\Notifications\\NewAccount', 'App\\User', 123, '{\"message\":\"Bonjour Ory Franck, bienvenu(e) sur la plateforme d\'acc\\u00e8s \\u00e0 l\'infrmation.\",\"etat\":\"success\"}', NULL, '2019-09-11 10:06:26', '2019-09-11 10:06:26'),
('1c095743-0ee9-4f58-881d-4ecdd3a5a10d', 'App\\Notifications\\NewAccount', 'App\\User', 88, '{\"message\":\"Bonjour Ory , bienvenu(e) sur la plateforme d\'acc\\u00e8s \\u00e0 l\'infrmation.\",\"etat\":\"success\"}', NULL, '2019-09-06 09:56:10', '2019-09-06 09:56:10'),
('1d086307-36b5-452b-8353-9f31ccda807b', 'App\\Notifications\\NewAccount', 'App\\User', 175, '{\"message\":\"Bonjour Gnahor\\u00e9 Ory Franck, bienvenu(e) sur la plateforme d\'acc\\u00e8s \\u00e0 l\'infrmation.\",\"etat\":\"success\"}', NULL, '2019-09-23 09:02:55', '2019-09-23 09:02:55'),
('1d6f3f9c-7a76-4974-bf73-8f55dad506c3', 'App\\Notifications\\NewAccount', 'App\\User', 54, '{\"message\":\"Bonjour Ory Franck, bienvenu(e) sur la plateforme d\'acc\\u00e8s \\u00e0 l\'infrmation.\",\"etat\":\"success\"}', NULL, '2019-09-03 15:48:43', '2019-09-03 15:48:43'),
('1fefddf5-0fea-4b14-a5c0-ebaf22d8ac5b', 'App\\Notifications\\NewAccount', 'App\\User', 65, '{\"message\":\"Bonjour Ory Franck, bienvenu(e) sur la plateforme d\'acc\\u00e8s \\u00e0 l\'infrmation.\",\"etat\":\"success\"}', NULL, '2019-09-05 10:59:51', '2019-09-05 10:59:51'),
('2021e9de-9852-42d9-8f3d-fc2a292a8576', 'App\\Notifications\\NewAccount', 'App\\User', 80, '{\"message\":\"Bonjour Ory Franck, bienvenu(e) sur la plateforme d\'acc\\u00e8s \\u00e0 l\'infrmation.\",\"etat\":\"success\"}', NULL, '2019-09-05 12:04:18', '2019-09-05 12:04:18'),
('20bca641-628a-4999-9fab-3d7af674892b', 'App\\Notifications\\NewAccount', 'App\\User', 131, '{\"message\":\"Bonjour Ory , bienvenu(e) sur la plateforme d\'acc\\u00e8s \\u00e0 l\'infrmation.\",\"etat\":\"success\"}', NULL, '2019-09-11 14:20:12', '2019-09-11 14:20:12'),
('218611d7-2c06-4e3d-8dd3-cca7a33f2615', 'App\\Notifications\\NotifierProrogation', 'App\\User', 130, '{\"etat\":\"info\",\"message\":\"Votre demande d\'acc\\u00e8s \\u00e0 l\'information relative \\u00e0 : Informatique a \\u00e9t\\u00e9 prorog\\u00e9e au 30 Septembre 2019\"}', NULL, '2019-09-11 14:23:24', '2019-09-11 14:23:24'),
('2587a5c2-bd0d-40ec-8574-d7faa4ef210d', 'App\\Notifications\\NewAccount', 'App\\User', 101, '{\"message\":\"Bonjour Ossey Tanguy, bienvenu(e) sur la plateforme d\'acc\\u00e8s \\u00e0 l\'infrmation.\",\"etat\":\"success\"}', NULL, '2019-09-09 16:57:07', '2019-09-09 16:57:07'),
('25b2d560-356c-485d-98c3-47d96aa367af', 'App\\Notifications\\NotifierProrogation', 'App\\User', 54, '{\"etat\":\"info\",\"message\":\"Votre demande d\'acc\\u00e8s \\u00e0 l\'information relative \\u00e0 : Bilan des activit\\u00e9s 2019 a \\u00e9t\\u00e9 prorog\\u00e9e au 02 Septembre 2019\"}', NULL, '2019-09-04 09:20:45', '2019-09-04 09:20:45'),
('26948d5c-7eda-42c2-bec3-ecb17a1fc38f', 'App\\Notifications\\NewAccount', 'App\\User', 161, '{\"message\":\"Bonjour Gnahor\\u00e9, bienvenu(e) sur la plateforme d\'acc\\u00e8s \\u00e0 l\'infrmation.\",\"etat\":\"success\"}', NULL, '2019-09-20 10:33:37', '2019-09-20 10:33:37'),
('2865afe2-99ae-4240-b750-e43d061284c8', 'App\\Notifications\\NewAccount', 'App\\User', 113, '{\"message\":\"Bonjour Ory Franck, bienvenu(e) sur la plateforme d\'acc\\u00e8s \\u00e0 l\'infrmation.\",\"etat\":\"success\"}', NULL, '2019-09-11 09:44:48', '2019-09-11 09:44:48'),
('29e943b0-cbae-42cb-b26b-c0c31fd86977', 'App\\Notifications\\NewAccount', 'App\\User', 109, '{\"message\":\"Bonjour Ory Franck, bienvenu(e) sur la plateforme d\'acc\\u00e8s \\u00e0 l\'infrmation.\",\"etat\":\"success\"}', NULL, '2019-09-11 09:35:31', '2019-09-11 09:35:31'),
('2a92abff-e9e1-4a06-9eba-83d5bbe1ff8a', 'App\\Notifications\\NewAccount', 'App\\User', 96, '{\"message\":\"Bonjour Ory Franck, bienvenu(e) sur la plateforme d\'acc\\u00e8s \\u00e0 l\'infrmation.\",\"etat\":\"success\"}', NULL, '2019-09-09 15:57:46', '2019-09-09 15:57:46'),
('2d04860e-a856-4b48-b99f-9cb6fd1b8988', 'App\\Notifications\\NotifierProrogation', 'App\\User', 95, '{\"etat\":\"info\",\"message\":\"Votre demande d\'acc\\u00e8s \\u00e0 l\'information relative \\u00e0 : Libelle a \\u00e9t\\u00e9 prorog\\u00e9e au 16 Octobre 2019\"}', NULL, '2019-09-09 16:26:03', '2019-09-09 16:26:03'),
('30fd1aec-343b-4d06-b70d-dc2572d51308', 'App\\Notifications\\NewAccount', 'App\\User', 160, '{\"message\":\"Bonjour Gnahor\\u00e9, bienvenu(e) sur la plateforme d\'acc\\u00e8s \\u00e0 l\'infrmation.\",\"etat\":\"success\"}', NULL, '2019-09-20 10:17:53', '2019-09-20 10:17:53'),
('32bb78b9-d382-412a-988a-f07fe3a4c054', 'App\\Notifications\\NewAccount', 'App\\User', 119, '{\"message\":\"Bonjour Ory Franck, bienvenu(e) sur la plateforme d\'acc\\u00e8s \\u00e0 l\'infrmation.\",\"etat\":\"success\"}', NULL, '2019-09-11 09:56:23', '2019-09-11 09:56:23'),
('3329416b-0f16-441e-8c45-6918db0ea8bb', 'App\\Notifications\\NewAccount', 'App\\User', 127, '{\"message\":\"Bonjour Ory Franck, bienvenu(e) sur la plateforme d\'acc\\u00e8s \\u00e0 l\'infrmation.\",\"etat\":\"success\"}', NULL, '2019-09-11 10:38:00', '2019-09-11 10:38:00'),
('349ad8db-a87c-4138-9a9e-3eb17b63da3f', 'App\\Notifications\\NewAccount', 'App\\User', 105, '{\"message\":\"Bonjour Ory Franck, bienvenu(e) sur la plateforme d\'acc\\u00e8s \\u00e0 l\'infrmation.\",\"etat\":\"success\"}', NULL, '2019-09-11 08:38:03', '2019-09-11 08:38:03'),
('355120db-fe15-48b7-afc8-502f6f842141', 'App\\Notifications\\NewAccount', 'App\\User', 79, '{\"message\":\"Bonjour Ory Franck, bienvenu(e) sur la plateforme d\'acc\\u00e8s \\u00e0 l\'infrmation.\",\"etat\":\"success\"}', NULL, '2019-09-05 11:54:48', '2019-09-05 11:54:48'),
('356b2729-b89e-4347-8c45-9f0d0af75f5b', 'App\\Notifications\\NewAccount', 'App\\User', 104, '{\"message\":\"Bonjour Ory Franck, bienvenu(e) sur la plateforme d\'acc\\u00e8s \\u00e0 l\'infrmation.\",\"etat\":\"success\"}', NULL, '2019-09-10 16:48:24', '2019-09-10 16:48:24'),
('37334aa2-df92-4fff-99ff-e0c56258bee3', 'App\\Notifications\\NewAccount', 'App\\User', 137, '{\"message\":\"Bonjour Gnahor\\u00e9 , bienvenu(e) sur la plateforme d\'acc\\u00e8s \\u00e0 l\'infrmation.\",\"etat\":\"success\"}', NULL, '2019-09-17 09:38:11', '2019-09-17 09:38:11'),
('37e358b3-5fb8-4a36-9c53-0435a4d0f008', 'App\\Notifications\\NewAccount', 'App\\User', 57, '{\"message\":\"Bonjour Ory Franck, bienvenu(e) sur la plateforme d\'acc\\u00e8s \\u00e0 l\'infrmation.\",\"etat\":\"success\"}', NULL, '2019-09-04 11:53:24', '2019-09-04 11:53:24'),
('38a31ca1-1fe5-4650-b97c-b823fe75d153', 'App\\Notifications\\NewAccount', 'App\\User', 163, '{\"message\":\"Bonjour Gnahor\\u00e9, bienvenu(e) sur la plateforme d\'acc\\u00e8s \\u00e0 l\'infrmation.\",\"etat\":\"success\"}', NULL, '2019-09-20 11:05:32', '2019-09-20 11:05:32'),
('3d9860c0-4244-4e77-9a5f-0b9453838457', 'App\\Notifications\\NewAccount', 'App\\User', 94, '{\"message\":\"Bonjour Ory Franck, bienvenu(e) sur la plateforme d\'acc\\u00e8s \\u00e0 l\'infrmation.\",\"etat\":\"success\"}', NULL, '2019-09-09 11:21:53', '2019-09-09 11:21:53'),
('3dc14077-c78f-45de-ad7f-3b11b5e0c4bb', 'App\\Notifications\\NewAccount', 'App\\User', 170, '{\"message\":\"Bonjour Gnahor\\u00e9 Ory, bienvenu(e) sur la plateforme d\'acc\\u00e8s \\u00e0 l\'infrmation.\",\"etat\":\"success\"}', NULL, '2019-09-20 12:14:16', '2019-09-20 12:14:16'),
('40f678dc-b319-47e1-bf3d-5f8b2eca7306', 'App\\Notifications\\NewAccount', 'App\\User', 171, '{\"message\":\"Bonjour Gnahor\\u00e9 Ory Franck Xavier, bienvenu(e) sur la plateforme d\'acc\\u00e8s \\u00e0 l\'infrmation.\",\"etat\":\"success\"}', NULL, '2019-09-20 13:52:21', '2019-09-20 13:52:21'),
('41b4cd3c-b18a-4934-85d9-15a28e3ea9ea', 'App\\Notifications\\NotifierProrogation', 'App\\User', 54, '{\"etat\":\"info\",\"message\":\"Votre demande d\'acc\\u00e8s \\u00e0 l\'information relative \\u00e0 : Bilan des activit\\u00e9s 2019 a \\u00e9t\\u00e9 prorog\\u00e9e au 26 Septembre 2019\"}', NULL, '2019-09-04 10:22:24', '2019-09-04 10:22:24'),
('41f94e68-e888-44da-81d4-ccbfd1057a35', 'App\\Notifications\\NotifierProrogation', 'App\\User', 55, '{\"etat\":\"info\",\"message\":\"Votre demande d\'acc\\u00e8s \\u00e0 l\'information relative \\u00e0 : Bilan des activit\\u00e9s 2019 a \\u00e9t\\u00e9 prorog\\u00e9e au 26 Septembre 2019\"}', NULL, '2019-09-04 10:22:21', '2019-09-04 10:22:21'),
('42059941-7159-4e9f-8f85-61ef4cd0888c', 'App\\Notifications\\NewAccount', 'App\\User', 71, '{\"message\":\"Bonjour Ory Franck, bienvenu(e) sur la plateforme d\'acc\\u00e8s \\u00e0 l\'infrmation.\",\"etat\":\"success\"}', NULL, '2019-09-05 11:42:35', '2019-09-05 11:42:35'),
('42227dfc-a4fb-467d-b6eb-ba206fc1b0aa', 'App\\Notifications\\NewAccount', 'App\\User', 156, '{\"message\":\"Bonjour Gnahor\\u00e9 Ory, bienvenu(e) sur la plateforme d\'acc\\u00e8s \\u00e0 l\'infrmation.\",\"etat\":\"success\"}', NULL, '2019-09-20 08:37:11', '2019-09-20 08:37:11'),
('42e52f2e-769e-4c28-b063-ec0c9450b84c', 'App\\Notifications\\NewAccount', 'App\\User', 155, '{\"message\":\"Bonjour Gnahor\\u00e9 Ory, bienvenu(e) sur la plateforme d\'acc\\u00e8s \\u00e0 l\'infrmation.\",\"etat\":\"success\"}', NULL, '2019-09-20 08:34:13', '2019-09-20 08:34:13'),
('47254b18-e4ca-44f4-b3f7-ea6cd09df89e', 'App\\Notifications\\NewAccount', 'App\\User', 62, '{\"message\":\"Bonjour Ory Franck, bienvenu(e) sur la plateforme d\'acc\\u00e8s \\u00e0 l\'infrmation.\",\"etat\":\"success\"}', NULL, '2019-09-04 14:31:12', '2019-09-04 14:31:12'),
('48d2eae9-24e5-4953-8202-d18bf2879ad2', 'App\\Notifications\\NewAccount', 'App\\User', 121, '{\"message\":\"Bonjour Ory Franck, bienvenu(e) sur la plateforme d\'acc\\u00e8s \\u00e0 l\'infrmation.\",\"etat\":\"success\"}', NULL, '2019-09-11 10:00:57', '2019-09-11 10:00:57'),
('491b62a2-cf40-493c-adfe-0d2a11330032', 'App\\Notifications\\NotifierProrogation', 'App\\User', 95, '{\"etat\":\"info\",\"message\":\"Votre demande d\'acc\\u00e8s \\u00e0 l\'information relative \\u00e0 : Libelle a \\u00e9t\\u00e9 prorog\\u00e9e au 16 Octobre 2019\"}', NULL, '2019-09-09 16:27:09', '2019-09-09 16:27:09'),
('49e89868-37f9-42ab-9cfe-e7b0811b447f', 'App\\Notifications\\NewAccount', 'App\\User', 173, '{\"message\":\"Bonjour Gnahor\\u00e9, bienvenu(e) sur la plateforme d\'acc\\u00e8s \\u00e0 l\'infrmation.\",\"etat\":\"success\"}', NULL, '2019-09-20 13:55:58', '2019-09-20 13:55:58'),
('4a914846-f698-491e-83a1-0bae7cde61b5', 'App\\Notifications\\NewAccount', 'App\\User', 177, '{\"message\":\"Bonjour Ory Franck Xavier, bienvenu(e) sur la plateforme d\'acc\\u00e8s \\u00e0 l\'infrmation.\",\"etat\":\"success\"}', NULL, '2019-09-25 14:26:31', '2019-09-25 14:26:31'),
('4ce651f0-2fe3-463a-ab0d-3fb640611ce9', 'App\\Notifications\\NotifierProrogation', 'App\\User', 136, '{\"etat\":\"info\",\"message\":\"Votre demande d\'acc\\u00e8s \\u00e0 l\'information relative \\u00e0 : PV de la r\\u00e9union du bilan finacier de l\'ann\\u00e9e 2009 a \\u00e9t\\u00e9 prorog\\u00e9e au 19 Septembre 2019\"}', NULL, '2019-09-18 15:16:48', '2019-09-18 15:16:48'),
('4dc5c109-e857-41ee-aa27-a83aa1b9e0f7', 'App\\Notifications\\NewAccount', 'App\\User', 98, '{\"message\":\"Bonjour Ory , bienvenu(e) sur la plateforme d\'acc\\u00e8s \\u00e0 l\'infrmation.\",\"etat\":\"success\"}', NULL, '2019-09-09 16:16:17', '2019-09-09 16:16:17'),
('514320f2-e851-46b6-9c6d-cc7d1391ee07', 'App\\Notifications\\NewAccount', 'App\\User', 107, '{\"message\":\"Bonjour Ory Franck, bienvenu(e) sur la plateforme d\'acc\\u00e8s \\u00e0 l\'infrmation.\",\"etat\":\"success\"}', NULL, '2019-09-11 09:33:52', '2019-09-11 09:33:52'),
('548ace5c-ac40-4415-bdd2-1fd2330e014d', 'App\\Notifications\\NewAccount', 'App\\User', 95, '{\"message\":\"Bonjour Franck Xavier Ory, bienvenu(e) sur la plateforme d\'acc\\u00e8s \\u00e0 l\'infrmation.\",\"etat\":\"success\"}', NULL, '2019-09-09 11:26:09', '2019-09-09 11:26:09'),
('55524d8d-2223-4dee-980e-af86b6625bcd', 'App\\Notifications\\NotifierProrogation', 'App\\User', 95, '{\"etat\":\"info\",\"message\":\"Votre demande d\'acc\\u00e8s \\u00e0 l\'information relative \\u00e0 : Libelle a \\u00e9t\\u00e9 prorog\\u00e9e au 19 Septembre 2019\"}', NULL, '2019-09-09 15:29:23', '2019-09-09 15:29:23'),
('56169508-c5f4-4d99-8e8a-cf08dc557d73', 'App\\Notifications\\NotifierProrogation', 'App\\User', 55, '{\"etat\":\"info\",\"message\":\"Votre demande d\'acc\\u00e8s \\u00e0 l\'information relative \\u00e0 : hxdhdh a \\u00e9t\\u00e9 prorog\\u00e9e au 10 Septembre 2019\"}', NULL, '2019-09-09 10:49:11', '2019-09-09 10:49:11'),
('568b3042-d84a-4366-bbee-0d8dcfe5902a', 'App\\Notifications\\NewAccount', 'App\\User', 59, '{\"message\":\"Bonjour Ali Patrick, bienvenu(e) sur la plateforme d\'acc\\u00e8s \\u00e0 l\'infrmation.\",\"etat\":\"success\"}', NULL, '2019-09-04 12:30:08', '2019-09-04 12:30:08'),
('571b770f-c004-4a0c-8351-f2c06f2edf78', 'App\\Notifications\\NewAccount', 'App\\User', 87, '{\"message\":\"Bonjour Ory , bienvenu(e) sur la plateforme d\'acc\\u00e8s \\u00e0 l\'infrmation.\",\"etat\":\"success\"}', NULL, '2019-09-06 09:55:06', '2019-09-06 09:55:06'),
('574568e8-ddba-49ae-bb41-5399c4b88de4', 'App\\Notifications\\NotifierProrogation', 'App\\User', 131, '{\"etat\":\"info\",\"message\":\"Votre demande d\'acc\\u00e8s \\u00e0 l\'information relative \\u00e0 : PV de la r\\u00e9union du bilan finacier de l\'ann\\u00e9e 2009 a \\u00e9t\\u00e9 prorog\\u00e9e au 19 Septembre 2019\"}', NULL, '2019-09-18 15:16:48', '2019-09-18 15:16:48'),
('5df907f4-93ad-485f-b856-9ea0be82108c', 'App\\Notifications\\NewAccount', 'App\\User', 92, '{\"message\":\"Bonjour Gnahor\\u00e9 Ory, bienvenu(e) sur la plateforme d\'acc\\u00e8s \\u00e0 l\'infrmation.\",\"etat\":\"success\"}', NULL, '2019-09-06 10:57:54', '2019-09-06 10:57:54'),
('5e62e3fe-d31b-4881-a985-35841d5d370e', 'App\\Notifications\\NotifierProrogation', 'App\\User', 136, '{\"etat\":\"info\",\"message\":\"Votre demande d\'acc\\u00e8s \\u00e0 l\'information relative \\u00e0 : Bilan Fiancier de l\'exercice de l\'ann\\u00e9e 2012 a \\u00e9t\\u00e9 prorog\\u00e9e au 18 Septembre 2019\"}', NULL, '2019-09-19 08:14:20', '2019-09-19 08:14:20'),
('5ec53422-e60f-46b3-88c5-d25a8d9fa8f0', 'App\\Notifications\\NotifierProrogation', 'App\\User', 94, '{\"etat\":\"info\",\"message\":\"Votre demande d\'acc\\u00e8s \\u00e0 l\'information relative \\u00e0 : Libelle a \\u00e9t\\u00e9 prorog\\u00e9e au 28 Septembre 2019\"}', NULL, '2019-09-09 15:33:31', '2019-09-09 15:33:31'),
('5fdc85c3-be24-483b-bd97-fd7f002be835', 'App\\Notifications\\NewAccount', 'App\\User', 103, '{\"message\":\"Bonjour Ory Franck, bienvenu(e) sur la plateforme d\'acc\\u00e8s \\u00e0 l\'infrmation.\",\"etat\":\"success\"}', NULL, '2019-09-10 15:58:53', '2019-09-10 15:58:53'),
('6096e4de-0514-4f5c-ace6-715797bc0116', 'App\\Notifications\\NotifierProrogation', 'App\\User', 97, '{\"etat\":\"info\",\"message\":\"Votre demande d\'acc\\u00e8s \\u00e0 l\'information relative \\u00e0 : Libelle a \\u00e9t\\u00e9 prorog\\u00e9e au 16 Octobre 2019\"}', NULL, '2019-09-09 16:26:03', '2019-09-09 16:26:03'),
('60995551-6086-4add-9b0d-9f3325b709a8', 'App\\Notifications\\NotifierProrogation', 'App\\User', 95, '{\"etat\":\"info\",\"message\":\"Votre demande d\'acc\\u00e8s \\u00e0 l\'information relative \\u00e0 : Libelle a \\u00e9t\\u00e9 prorog\\u00e9e au 09 Octobre 2019\"}', NULL, '2019-09-09 15:03:52', '2019-09-09 15:03:52'),
('631ecdb8-2159-49af-8f80-6fbdc7715425', 'App\\Notifications\\NotifierProrogation', 'App\\Requerant', 75, '[]', NULL, '2019-09-24 09:23:50', '2019-09-24 09:23:50'),
('6c512b71-7dd0-48fd-ab53-658d1a1b5515', 'App\\Notifications\\NotifierProrogation', 'App\\User', 95, '{\"etat\":\"info\",\"message\":\"Votre demande d\'acc\\u00e8s \\u00e0 l\'information relative \\u00e0 : Bilan des activit\\u00e9s 2010 a \\u00e9t\\u00e9 prorog\\u00e9e au 09 Octobre 2019\"}', NULL, '2019-09-09 13:37:50', '2019-09-09 13:37:50'),
('6c567eb0-7533-41a7-9caa-9aa4a4dda71f', 'App\\Notifications\\NewAccount', 'App\\User', 117, '{\"message\":\"Bonjour Ory Franck, bienvenu(e) sur la plateforme d\'acc\\u00e8s \\u00e0 l\'infrmation.\",\"etat\":\"success\"}', NULL, '2019-09-11 09:52:50', '2019-09-11 09:52:50'),
('6e9ea647-4a04-4865-809a-f74daa7b2f17', 'App\\Notifications\\NewAccount', 'App\\User', 133, '{\"message\":\"Bonjour Ory Franck, bienvenu(e) sur la plateforme d\'acc\\u00e8s \\u00e0 l\'infrmation.\",\"etat\":\"success\"}', NULL, '2019-09-12 08:50:35', '2019-09-12 08:50:35'),
('6ed74740-aa97-40ab-bfba-3c4ab91965ad', 'App\\Notifications\\NewAccount', 'App\\User', 158, '{\"message\":\"Bonjour Gnahor\\u00e9 Ory, bienvenu(e) sur la plateforme d\'acc\\u00e8s \\u00e0 l\'infrmation.\",\"etat\":\"success\"}', NULL, '2019-09-20 09:12:35', '2019-09-20 09:12:35'),
('6f88470e-1b98-4686-a86b-9757cfbc4704', 'App\\Notifications\\NotifierProrogation', 'App\\User', 98, '{\"etat\":\"info\",\"message\":\"Votre demande d\'acc\\u00e8s \\u00e0 l\'information relative \\u00e0 : Libelle a \\u00e9t\\u00e9 prorog\\u00e9e au 16 Octobre 2019\"}', NULL, '2019-09-09 16:29:49', '2019-09-09 16:29:49'),
('7025d4a5-5d17-410e-9d96-0ff55ee3e3eb', 'App\\Notifications\\NewAccount', 'App\\User', 154, '{\"message\":\"Bonjour Gnahor\\u00e9 Ory, bienvenu(e) sur la plateforme d\'acc\\u00e8s \\u00e0 l\'infrmation.\",\"etat\":\"success\"}', NULL, '2019-09-20 08:33:56', '2019-09-20 08:33:56'),
('70509108-bb19-4881-abb6-39a5f637b873', 'App\\Notifications\\NotifierProrogation', 'App\\User', 97, '{\"etat\":\"info\",\"message\":\"Votre demande d\'acc\\u00e8s \\u00e0 l\'information relative \\u00e0 : Libelle a \\u00e9t\\u00e9 prorog\\u00e9e au 16 Octobre 2019\"}', NULL, '2019-09-09 16:26:06', '2019-09-09 16:26:06'),
('73614411-20ef-4d96-a586-4bce155a6a5a', 'App\\Notifications\\NewAccount', 'App\\User', 93, '{\"message\":\"Bonjour Ory , bienvenu(e) sur la plateforme d\'acc\\u00e8s \\u00e0 l\'infrmation.\",\"etat\":\"success\"}', NULL, '2019-09-06 13:00:29', '2019-09-06 13:00:29'),
('746b96b3-a041-439f-9243-d7226c190b90', 'App\\Notifications\\NewAccount', 'App\\User', 130, '{\"message\":\"Bonjour Ory , bienvenu(e) sur la plateforme d\'acc\\u00e8s \\u00e0 l\'infrmation.\",\"etat\":\"success\"}', NULL, '2019-09-11 13:06:43', '2019-09-11 13:06:43'),
('76400961-e396-4520-a7b5-7359441b92b9', 'App\\Notifications\\NewAccount', 'App\\User', 83, '{\"message\":\"Bonjour Gnahor\\u00e9 Ory Franck, bienvenu(e) sur la plateforme d\'acc\\u00e8s \\u00e0 l\'infrmation.\",\"etat\":\"success\"}', NULL, '2019-09-06 08:46:28', '2019-09-06 08:46:28'),
('78bc9efd-f6bf-483e-a818-32db0213bd9e', 'App\\Notifications\\NewAccount', 'App\\User', 55, '{\"message\":\"Bonjour Franck Xavier Ory, bienvenu(e) sur la plateforme d\'acc\\u00e8s \\u00e0 l\'infrmation.\",\"etat\":\"success\"}', NULL, '2019-09-04 08:45:56', '2019-09-04 08:45:56'),
('79ea703c-a973-4d4c-813e-5c400393ac91', 'App\\Notifications\\NotifierProrogation', 'App\\User', 97, '{\"etat\":\"info\",\"message\":\"Votre demande d\'acc\\u00e8s \\u00e0 l\'information relative \\u00e0 : Libelle a \\u00e9t\\u00e9 prorog\\u00e9e au 16 Octobre 2019\"}', NULL, '2019-09-09 16:27:09', '2019-09-09 16:27:09'),
('7a39039b-42da-4465-9923-67a0f2e2e52d', 'App\\Notifications\\NotifierProrogation', 'App\\User', 54, '{\"etat\":\"info\",\"message\":\"Votre demande d\'acc\\u00e8s \\u00e0 l\'information relative \\u00e0 : hxdhdh a \\u00e9t\\u00e9 prorog\\u00e9e au 10 Septembre 2019\"}', NULL, '2019-09-09 10:49:05', '2019-09-09 10:49:05'),
('7a70ca2e-dbde-4198-a7ba-75498c435b22', 'App\\Notifications\\NewAccount', 'App\\User', 58, '{\"message\":\"Bonjour Ossey Tanguy, bienvenu(e) sur la plateforme d\'acc\\u00e8s \\u00e0 l\'infrmation.\",\"etat\":\"success\"}', NULL, '2019-09-04 12:19:59', '2019-09-04 12:19:59'),
('7b5bc16c-3c1f-4482-b507-b5e5957cd872', 'App\\Notifications\\NotifierProrogation', 'App\\User', 98, '{\"etat\":\"info\",\"message\":\"Votre demande d\'acc\\u00e8s \\u00e0 l\'information relative \\u00e0 : Libelle a \\u00e9t\\u00e9 prorog\\u00e9e au 16 Octobre 2019\"}', NULL, '2019-09-09 16:28:50', '2019-09-09 16:28:50'),
('7cc81bdb-2c09-49b6-8820-10a1f9a05a4d', 'App\\Notifications\\NewAccount', 'App\\User', 126, '{\"message\":\"Bonjour Ory Franck, bienvenu(e) sur la plateforme d\'acc\\u00e8s \\u00e0 l\'infrmation.\",\"etat\":\"success\"}', NULL, '2019-09-11 10:37:00', '2019-09-11 10:37:00'),
('7e3a61c3-45bd-4152-9cdf-0b4271fcf33d', 'App\\Notifications\\NewAccount', 'App\\User', 122, '{\"message\":\"Bonjour Ory Franck, bienvenu(e) sur la plateforme d\'acc\\u00e8s \\u00e0 l\'infrmation.\",\"etat\":\"success\"}', NULL, '2019-09-11 10:01:30', '2019-09-11 10:01:30'),
('7f514c6a-ef34-4b04-9f07-0247a9a70f79', 'App\\Notifications\\NotifierProrogation', 'App\\User', 95, '{\"etat\":\"info\",\"message\":\"Votre demande d\'acc\\u00e8s \\u00e0 l\'information relative \\u00e0 : Budget 2019 du tresor public a \\u00e9t\\u00e9 prorog\\u00e9e au 16 Octobre 2019\"}', NULL, '2019-09-09 11:34:08', '2019-09-09 11:34:08'),
('80bf71c9-c181-45de-b420-2c5939e7972d', 'App\\Notifications\\NotifierProrogation', 'App\\User', 97, '{\"etat\":\"info\",\"message\":\"Votre demande d\'acc\\u00e8s \\u00e0 l\'information relative \\u00e0 : Libelle a \\u00e9t\\u00e9 prorog\\u00e9e au 16 Octobre 2019\"}', NULL, '2019-09-09 16:28:50', '2019-09-09 16:28:50'),
('894e7079-a492-4343-8e79-59ef15a87c70', 'App\\Notifications\\NewAccount', 'App\\User', 118, '{\"message\":\"Bonjour Ory Franck, bienvenu(e) sur la plateforme d\'acc\\u00e8s \\u00e0 l\'infrmation.\",\"etat\":\"success\"}', NULL, '2019-09-11 09:53:39', '2019-09-11 09:53:39'),
('8a5fa6c1-9bc5-4af1-9f11-6e9ab2669d01', 'App\\Notifications\\NewAccount', 'App\\User', 172, '{\"message\":\"Bonjour Gnahor\\u00e9 Ory Franck Xavier, bienvenu(e) sur la plateforme d\'acc\\u00e8s \\u00e0 l\'infrmation.\",\"etat\":\"success\"}', NULL, '2019-09-20 13:55:57', '2019-09-20 13:55:57'),
('8b66d011-8606-4f7b-bcc1-96df1bf98cc8', 'App\\Notifications\\NotifierProrogation', 'App\\User', 55, '{\"etat\":\"info\",\"message\":\"Votre demande d\'acc\\u00e8s \\u00e0 l\'information relative \\u00e0 : hxdhdh a \\u00e9t\\u00e9 prorog\\u00e9e au 10 Septembre 2019\"}', NULL, '2019-09-09 10:49:04', '2019-09-09 10:49:04'),
('8baa119a-b9fa-4d61-b9a3-a1c0ff7d86b2', 'App\\Notifications\\NewAccount', 'App\\User', 174, '{\"message\":\"Bonjour Gnahor\\u00e9 Ory Franck Xavier, bienvenu(e) sur la plateforme d\'acc\\u00e8s \\u00e0 l\'infrmation.\",\"etat\":\"success\"}', NULL, '2019-09-20 14:01:43', '2019-09-20 14:01:43'),
('8bbac9fa-b49e-4331-ab3e-915d0eeca4a5', 'App\\Notifications\\NewAccount', 'App\\User', 138, '{\"message\":\"Bonjour Gnahore , bienvenu(e) sur la plateforme d\'acc\\u00e8s \\u00e0 l\'infrmation.\",\"etat\":\"success\"}', NULL, '2019-09-18 15:01:57', '2019-09-18 15:01:57'),
('8f018a85-9068-4d35-9cb2-46cb514d31ce', 'App\\Notifications\\NotifierProrogation', 'App\\User', 55, '{\"etat\":\"info\",\"message\":\"Votre demande d\'acc\\u00e8s \\u00e0 l\'information relative \\u00e0 : Bilan des activit\\u00e9s 2019 a \\u00e9t\\u00e9 prorog\\u00e9e au 26 Septembre 2019\"}', NULL, '2019-09-04 10:22:24', '2019-09-04 10:22:24'),
('8f36703d-3d28-4267-ba11-6ca34988ff81', 'App\\Notifications\\NewAccount', 'App\\User', 91, '{\"message\":\"Bonjour Ory , bienvenu(e) sur la plateforme d\'acc\\u00e8s \\u00e0 l\'infrmation.\",\"etat\":\"success\"}', NULL, '2019-09-06 10:46:49', '2019-09-06 10:46:49'),
('91a081f5-75ae-4aa7-9ddd-ca3d011efe96', 'App\\Notifications\\NotifierProrogation', 'App\\User', 129, '{\"etat\":\"info\",\"message\":\"Votre demande d\'acc\\u00e8s \\u00e0 l\'information relative \\u00e0 : Informatique a \\u00e9t\\u00e9 prorog\\u00e9e au 30 Septembre 2019\"}', NULL, '2019-09-11 14:23:24', '2019-09-11 14:23:24'),
('92299618-f8ba-4bcf-b9d5-df170158a71c', 'App\\Notifications\\NotifierProrogation', 'App\\User', 55, '{\"etat\":\"info\",\"message\":\"Votre demande d\'acc\\u00e8s \\u00e0 l\'information relative \\u00e0 : Bilan des activit\\u00e9s 2019 a \\u00e9t\\u00e9 prorog\\u00e9e au 02 Septembre 2019\"}', NULL, '2019-09-04 09:20:45', '2019-09-04 09:20:45'),
('9542f1a7-8a86-44e8-b4c0-101ebaa4596f', 'App\\Notifications\\NewAccount', 'App\\User', 135, '{\"message\":\"Bonjour Ory Franck, bienvenu(e) sur la plateforme d\'acc\\u00e8s \\u00e0 l\'infrmation.\",\"etat\":\"success\"}', NULL, '2019-09-17 09:15:39', '2019-09-17 09:15:39'),
('95507568-dddc-4dc5-a246-67710defedb9', 'App\\Notifications\\NewAccount', 'App\\User', 74, '{\"message\":\"Bonjour Ory Franck, bienvenu(e) sur la plateforme d\'acc\\u00e8s \\u00e0 l\'infrmation.\",\"etat\":\"success\"}', NULL, '2019-09-05 11:49:59', '2019-09-05 11:49:59'),
('962a18fc-9a59-4de4-85a8-68b9211a10c2', 'App\\Notifications\\NewAccount', 'App\\User', 75, '{\"message\":\"Bonjour Ory Franck, bienvenu(e) sur la plateforme d\'acc\\u00e8s \\u00e0 l\'infrmation.\",\"etat\":\"success\"}', NULL, '2019-09-05 11:51:11', '2019-09-05 11:51:11'),
('97531c5e-2e06-4ee0-b4e0-1392c41dccb7', 'App\\Notifications\\NewAccount', 'App\\User', 64, '{\"message\":\"Bonjour Ory Franck, bienvenu(e) sur la plateforme d\'acc\\u00e8s \\u00e0 l\'infrmation.\",\"etat\":\"success\"}', NULL, '2019-09-04 16:44:10', '2019-09-04 16:44:10'),
('9761844d-7a5e-44c0-99e8-6088c612dca7', 'App\\Notifications\\NewAccount', 'App\\User', 176, '{\"message\":\"Bonjour Gnahor\\u00e9 Ory Franck Xavier, bienvenu(e) sur la plateforme d\'acc\\u00e8s \\u00e0 l\'infrmation.\",\"etat\":\"success\"}', NULL, '2019-09-25 11:42:14', '2019-09-25 11:42:14'),
('98eb6480-853d-4728-bb0e-b5290b19896e', 'App\\Notifications\\NewAccount', 'App\\User', 114, '{\"message\":\"Bonjour Ory Franck, bienvenu(e) sur la plateforme d\'acc\\u00e8s \\u00e0 l\'infrmation.\",\"etat\":\"success\"}', NULL, '2019-09-11 09:46:56', '2019-09-11 09:46:56'),
('991af0d0-47ee-4a95-8e05-eafd74f96b62', 'App\\Notifications\\NewAccount', 'App\\User', 168, '{\"message\":\"Bonjour Gnahor\\u00e9 Francl, bienvenu(e) sur la plateforme d\'acc\\u00e8s \\u00e0 l\'infrmation.\",\"etat\":\"success\"}', NULL, '2019-09-20 11:51:10', '2019-09-20 11:51:10'),
('995272cc-0ee4-4500-9cfd-f01f017fa93a', 'App\\Notifications\\NewAccount', 'App\\User', 115, '{\"message\":\"Bonjour Ory Franck, bienvenu(e) sur la plateforme d\'acc\\u00e8s \\u00e0 l\'infrmation.\",\"etat\":\"success\"}', NULL, '2019-09-11 09:50:34', '2019-09-11 09:50:34'),
('9bd85f92-a0f6-4e3c-bc79-ba44e0bb108b', 'App\\Notifications\\NewAccount', 'App\\User', 167, '{\"message\":\"Bonjour Gnahore Ory Franck Xavier, bienvenu(e) sur la plateforme d\'acc\\u00e8s \\u00e0 l\'infrmation.\",\"etat\":\"success\"}', NULL, '2019-09-20 11:44:03', '2019-09-20 11:44:03'),
('a661e60e-954c-4718-aecc-c21d6ae278a2', 'App\\Notifications\\NotifierProrogation', 'App\\User', 54, '{\"etat\":\"info\",\"message\":\"Votre demande d\'acc\\u00e8s \\u00e0 l\'information relative \\u00e0 : hxdhdh a \\u00e9t\\u00e9 prorog\\u00e9e au 10 Septembre 2019\"}', NULL, '2019-09-09 10:49:11', '2019-09-09 10:49:11'),
('a6e41192-276a-4dfe-a41f-540bfb13a845', 'App\\Notifications\\NewAccount', 'App\\User', 166, '{\"message\":\"Bonjour Gnahor\\u00e9 Ory Franck Xavier, bienvenu(e) sur la plateforme d\'acc\\u00e8s \\u00e0 l\'infrmation.\",\"etat\":\"success\"}', NULL, '2019-09-20 11:38:54', '2019-09-20 11:38:54'),
('a85fff50-f4f0-4736-8438-d9c138e3e70b', 'App\\Notifications\\NewAccount', 'App\\User', 142, '{\"message\":\"Bonjour Gnahore , bienvenu(e) sur la plateforme d\'acc\\u00e8s \\u00e0 l\'infrmation.\",\"etat\":\"success\"}', NULL, '2019-09-19 07:55:33', '2019-09-19 07:55:33'),
('a9ac82ba-6f6f-4a2e-8672-7c4c54f4c9a0', 'App\\Notifications\\NotifierProrogation', 'App\\User', 97, '{\"etat\":\"info\",\"message\":\"Votre demande d\'acc\\u00e8s \\u00e0 l\'information relative \\u00e0 : Libelle a \\u00e9t\\u00e9 prorog\\u00e9e au 16 Octobre 2019\"}', NULL, '2019-09-09 16:27:10', '2019-09-09 16:27:10'),
('aac3746e-7ded-46db-861e-5c5a26271fba', 'App\\Notifications\\NewAccount', 'App\\User', 84, '{\"message\":\"Bonjour Ory , bienvenu(e) sur la plateforme d\'acc\\u00e8s \\u00e0 l\'infrmation.\",\"etat\":\"success\"}', NULL, '2019-09-06 09:13:26', '2019-09-06 09:13:26'),
('aac83ec4-ffe9-429c-b871-67ed614d0b4b', 'App\\Notifications\\NotifierProrogation', 'App\\User', 143, '{\"etat\":\"info\",\"message\":\"Votre demande d\'acc\\u00e8s \\u00e0 l\'information relative \\u00e0 : Bilan Fiancier de l\'exercice de l\'ann\\u00e9e 2012 a \\u00e9t\\u00e9 prorog\\u00e9e au 18 Septembre 2019\"}', NULL, '2019-09-19 08:14:21', '2019-09-19 08:14:21'),
('ad4f1ef4-a56b-4858-a85d-37732f80a590', 'App\\Notifications\\NewAccount', 'App\\User', 108, '{\"message\":\"Bonjour Ory Franck, bienvenu(e) sur la plateforme d\'acc\\u00e8s \\u00e0 l\'infrmation.\",\"etat\":\"success\"}', NULL, '2019-09-11 09:35:08', '2019-09-11 09:35:08'),
('aef29f54-4746-416b-b386-bf228dedfe0b', 'App\\Notifications\\NewAccount', 'App\\User', 76, '{\"message\":\"Bonjour Ory Franck, bienvenu(e) sur la plateforme d\'acc\\u00e8s \\u00e0 l\'infrmation.\",\"etat\":\"success\"}', NULL, '2019-09-05 11:51:41', '2019-09-05 11:51:41'),
('b03e64a0-31b4-4e3e-a924-195e3c04abdb', 'App\\Notifications\\NewAccount', 'App\\User', 102, '{\"message\":\"Bonjour Ory Franck, bienvenu(e) sur la plateforme d\'acc\\u00e8s \\u00e0 l\'infrmation.\",\"etat\":\"success\"}', NULL, '2019-09-10 11:22:16', '2019-09-10 11:22:16'),
('b4a7a913-910f-4416-a5c3-ea89ed8bdbf4', 'App\\Notifications\\NewAccount', 'App\\User', 90, '{\"message\":\"Bonjour Gnaohr\\u00e9 Ory Franck, bienvenu(e) sur la plateforme d\'acc\\u00e8s \\u00e0 l\'infrmation.\",\"etat\":\"success\"}', NULL, '2019-09-06 10:06:34', '2019-09-06 10:06:34'),
('b9c5b0a9-005b-4c62-9ff8-bc19faeccb26', 'App\\Notifications\\NewAccount', 'App\\User', 128, '{\"message\":\"Bonjour gdgdg , bienvenu(e) sur la plateforme d\'acc\\u00e8s \\u00e0 l\'infrmation.\",\"etat\":\"success\"}', NULL, '2019-09-11 11:45:06', '2019-09-11 11:45:06'),
('bb8de08d-007c-4276-b002-4d9f2afbc36c', 'App\\Notifications\\NotifierProrogation', 'App\\User', 98, '{\"etat\":\"info\",\"message\":\"Votre demande d\'acc\\u00e8s \\u00e0 l\'information relative \\u00e0 : Libelle a \\u00e9t\\u00e9 prorog\\u00e9e au 16 Octobre 2019\"}', NULL, '2019-09-09 16:28:50', '2019-09-09 16:28:50'),
('bbb95f8c-3ee5-45a9-ba51-64453a33faad', 'App\\Notifications\\NotifierProrogation', 'App\\User', 55, '{\"etat\":\"info\",\"message\":\"Votre demande d\'acc\\u00e8s \\u00e0 l\'information relative \\u00e0 : hxdhdh a \\u00e9t\\u00e9 prorog\\u00e9e au 10 Septembre 2019\"}', NULL, '2019-09-09 10:49:05', '2019-09-09 10:49:05'),
('c175168a-a59a-486a-9875-e5c881183ce5', 'App\\Notifications\\NotifierProrogation', 'App\\User', 98, '{\"etat\":\"info\",\"message\":\"Votre demande d\'acc\\u00e8s \\u00e0 l\'information relative \\u00e0 : Libelle a \\u00e9t\\u00e9 prorog\\u00e9e au 16 Octobre 2019\"}', NULL, '2019-09-09 16:29:49', '2019-09-09 16:29:49'),
('c27cf1c9-b968-432f-b681-792d69aacac9', 'App\\Notifications\\NewAccount', 'App\\User', 152, '{\"message\":\"Bonjour ddhdhdh hdhdhdh, bienvenu(e) sur la plateforme d\'acc\\u00e8s \\u00e0 l\'infrmation.\",\"etat\":\"success\"}', NULL, '2019-09-19 15:24:05', '2019-09-19 15:24:05'),
('c28f4246-15b3-4df9-8866-3e074b18d91d', 'App\\Notifications\\NewAccount', 'App\\User', 143, '{\"message\":\"Bonjour Gnahore Ory Franck Xavier, bienvenu(e) sur la plateforme d\'acc\\u00e8s \\u00e0 l\'infrmation.\",\"etat\":\"success\"}', NULL, '2019-09-19 08:08:08', '2019-09-19 08:08:08'),
('c2e6736d-5b57-4ce1-ad29-8c0256578cd3', 'App\\Notifications\\NewAccount', 'App\\User', 140, '{\"message\":\"Bonjour Gnahore Ory, bienvenu(e) sur la plateforme d\'acc\\u00e8s \\u00e0 l\'infrmation.\",\"etat\":\"success\"}', NULL, '2019-09-19 07:53:24', '2019-09-19 07:53:24'),
('c4a803a7-71be-48c5-97a7-4be636f918d9', 'App\\Notifications\\NewAccount', 'App\\User', 153, '{\"message\":\"Bonjour Gnahor\\u00e9 Ory, bienvenu(e) sur la plateforme d\'acc\\u00e8s \\u00e0 l\'infrmation.\",\"etat\":\"success\"}', NULL, '2019-09-20 08:17:32', '2019-09-20 08:17:32'),
('c5adfae5-5f87-44d4-9f8e-e4c19ab156b0', 'App\\Notifications\\NewAccount', 'App\\User', 78, '{\"message\":\"Bonjour Ory Franck, bienvenu(e) sur la plateforme d\'acc\\u00e8s \\u00e0 l\'infrmation.\",\"etat\":\"success\"}', NULL, '2019-09-05 11:53:51', '2019-09-05 11:53:51'),
('c82a30ec-56e6-47ba-9bf8-df4dde4412cc', 'App\\Notifications\\NewAccount', 'App\\User', 85, '{\"message\":\"Bonjour Ory , bienvenu(e) sur la plateforme d\'acc\\u00e8s \\u00e0 l\'infrmation.\",\"etat\":\"success\"}', NULL, '2019-09-06 09:15:21', '2019-09-06 09:15:21'),
('c8c0c73b-74e0-4751-a6b8-61de97bd1c61', 'App\\Notifications\\NewAccount', 'App\\User', 149, '{\"message\":\"Bonjour Gallet Richard, bienvenu(e) sur la plateforme d\'acc\\u00e8s \\u00e0 l\'infrmation.\",\"etat\":\"success\"}', NULL, '2019-09-19 13:57:47', '2019-09-19 13:57:47'),
('cb3dbc7f-c460-41a0-a25e-d95a8197d8db', 'App\\Notifications\\NewAccount', 'App\\User', 129, '{\"message\":\"Bonjour Ory Franck, bienvenu(e) sur la plateforme d\'acc\\u00e8s \\u00e0 l\'infrmation.\",\"etat\":\"success\"}', NULL, '2019-09-11 13:04:33', '2019-09-11 13:04:33'),
('cb94c3a4-5595-45bd-a7f0-ea99a493ea10', 'App\\Notifications\\NotifierProrogation', 'App\\User', 95, '{\"etat\":\"info\",\"message\":\"Votre demande d\'acc\\u00e8s \\u00e0 l\'information relative \\u00e0 : Budget 2019 du tresor public a \\u00e9t\\u00e9 prorog\\u00e9e au 16 Octobre 2019\"}', NULL, '2019-09-09 11:38:21', '2019-09-09 11:38:21'),
('cd4854d7-005f-4094-9c28-3e88dbb94ea6', 'App\\Notifications\\NewAccount', 'App\\User', 120, '{\"message\":\"Bonjour Ory Franck, bienvenu(e) sur la plateforme d\'acc\\u00e8s \\u00e0 l\'infrmation.\",\"etat\":\"success\"}', NULL, '2019-09-11 09:57:02', '2019-09-11 09:57:02'),
('cdc1ddac-231d-46d0-b7da-22365c9b2d92', 'App\\Notifications\\NewAccount', 'App\\User', 99, '{\"message\":\"Bonjour Ossey Tanguy, bienvenu(e) sur la plateforme d\'acc\\u00e8s \\u00e0 l\'infrmation.\",\"etat\":\"success\"}', NULL, '2019-09-09 16:43:57', '2019-09-09 16:43:57'),
('d0d4994d-8d60-414c-a6e2-7d83b22bc033', 'App\\Notifications\\NewAccount', 'App\\User', 162, '{\"message\":\"Bonjour Gnahor\\u00e9, bienvenu(e) sur la plateforme d\'acc\\u00e8s \\u00e0 l\'infrmation.\",\"etat\":\"success\"}', NULL, '2019-09-20 11:03:31', '2019-09-20 11:03:31'),
('d2017c15-3fec-4560-9168-af5e026fafca', 'App\\Notifications\\NotifierProrogation', 'App\\User', 94, '{\"etat\":\"info\",\"message\":\"Votre demande d\'acc\\u00e8s \\u00e0 l\'information relative \\u00e0 : Budget 2019 du tresor public a \\u00e9t\\u00e9 prorog\\u00e9e au 16 Octobre 2019\"}', NULL, '2019-09-09 11:34:08', '2019-09-09 11:34:08'),
('d38c363a-0527-4bb0-ab62-60a7cc744b38', 'App\\Notifications\\NotifierProrogation', 'App\\User', 94, '{\"etat\":\"info\",\"message\":\"Votre demande d\'acc\\u00e8s \\u00e0 l\'information relative \\u00e0 : Budget 2019 du tresor public a \\u00e9t\\u00e9 prorog\\u00e9e au 16 Octobre 2019\"}', NULL, '2019-09-09 11:38:21', '2019-09-09 11:38:21'),
('d39e9d9e-3e20-4910-bf14-298148a07f39', 'App\\Notifications\\NotifierProrogation', 'App\\User', 94, '{\"etat\":\"info\",\"message\":\"Votre demande d\'acc\\u00e8s \\u00e0 l\'information relative \\u00e0 : Libelle a \\u00e9t\\u00e9 prorog\\u00e9e au 09 Octobre 2019\"}', NULL, '2019-09-09 15:03:53', '2019-09-09 15:03:53'),
('d42da609-7427-4f7c-93ef-2010f9314eaa', 'App\\Notifications\\NotifierProrogation', 'App\\User', 97, '{\"etat\":\"info\",\"message\":\"Votre demande d\'acc\\u00e8s \\u00e0 l\'information relative \\u00e0 : Libelle a \\u00e9t\\u00e9 prorog\\u00e9e au 16 Octobre 2019\"}', NULL, '2019-09-09 16:28:50', '2019-09-09 16:28:50'),
('d42ea6ef-4b6f-4861-a114-81ee1c926396', 'App\\Notifications\\NotifierProrogation', 'App\\User', 95, '{\"etat\":\"info\",\"message\":\"Votre demande d\'acc\\u00e8s \\u00e0 l\'information relative \\u00e0 : Libelle a \\u00e9t\\u00e9 prorog\\u00e9e au 28 Septembre 2019\"}', NULL, '2019-09-09 15:33:31', '2019-09-09 15:33:31'),
('d476ae60-a2b3-49dc-b3f4-8fe68ae3e9df', 'App\\Notifications\\NewAccount', 'App\\User', 139, '{\"message\":\"Bonjour Gnahore Ory Franck, bienvenu(e) sur la plateforme d\'acc\\u00e8s \\u00e0 l\'infrmation.\",\"etat\":\"success\"}', NULL, '2019-09-18 15:05:39', '2019-09-18 15:05:39'),
('d493551f-3323-4fea-bcc8-8c9c37fe13e9', 'App\\Notifications\\NotifierProrogation', 'App\\User', 130, '{\"etat\":\"info\",\"message\":\"Votre demande d\'acc\\u00e8s \\u00e0 l\'information relative \\u00e0 : Informatique a \\u00e9t\\u00e9 prorog\\u00e9e au 30 Septembre 2019\"}', NULL, '2019-09-11 14:23:23', '2019-09-11 14:23:23'),
('d993c3d7-e587-48f6-9a95-6253b584c249', 'App\\Notifications\\NewAccount', 'App\\User', 82, '{\"message\":\"Bonjour Ory Franck, bienvenu(e) sur la plateforme d\'acc\\u00e8s \\u00e0 l\'infrmation.\",\"etat\":\"success\"}', NULL, '2019-09-05 17:14:29', '2019-09-05 17:14:29'),
('db9b8863-b896-4f12-9b90-d36ee21947bd', 'App\\Notifications\\NewAccount', 'App\\User', 169, '{\"message\":\"Bonjour Gnao gdgdgdgdg, bienvenu(e) sur la plateforme d\'acc\\u00e8s \\u00e0 l\'infrmation.\",\"etat\":\"success\"}', NULL, '2019-09-20 12:08:06', '2019-09-20 12:08:06'),
('dbb5f45d-2257-42c4-81b3-204a13295f1d', 'App\\Notifications\\NewAccount', 'App\\User', 89, '{\"message\":\"Bonjour Gnahor\\u00e9 Ory, bienvenu(e) sur la plateforme d\'acc\\u00e8s \\u00e0 l\'infrmation.\",\"etat\":\"success\"}', NULL, '2019-09-06 09:59:45', '2019-09-06 09:59:45'),
('dbf671b2-2c1d-4a6b-9446-e4969e0053ea', 'App\\Notifications\\NewAccount', 'App\\User', 81, '{\"message\":\"Bonjour Ory Franck, bienvenu(e) sur la plateforme d\'acc\\u00e8s \\u00e0 l\'infrmation.\",\"etat\":\"success\"}', NULL, '2019-09-05 12:06:20', '2019-09-05 12:06:20'),
('dc18ecb0-9168-418a-a04c-524ba8956c5c', 'App\\Notifications\\NewAccount', 'App\\User', 134, '{\"message\":\"Bonjour Ory Franck, bienvenu(e) sur la plateforme d\'acc\\u00e8s \\u00e0 l\'infrmation.\",\"etat\":\"success\"}', NULL, '2019-09-17 09:12:04', '2019-09-17 09:12:04'),
('dc45e17c-b506-4a7c-ae49-8dc2d50d3e6a', 'App\\Notifications\\NotifierProrogation', 'App\\User', 136, '{\"etat\":\"info\",\"message\":\"Votre demande d\'acc\\u00e8s \\u00e0 l\'information relative \\u00e0 : Bilan Fiancier de l\'exercice de l\'ann\\u00e9e 2012 a \\u00e9t\\u00e9 prorog\\u00e9e au 18 Septembre 2019\"}', NULL, '2019-09-19 08:14:21', '2019-09-19 08:14:21'),
('dca1f7d6-c1fa-4ccc-9130-3541c3f68206', 'App\\Notifications\\NewAccount', 'App\\User', 124, '{\"message\":\"Bonjour Ory Franck, bienvenu(e) sur la plateforme d\'acc\\u00e8s \\u00e0 l\'infrmation.\",\"etat\":\"success\"}', NULL, '2019-09-11 10:06:59', '2019-09-11 10:06:59'),
('df0daf44-4775-4730-adae-af489dd86141', 'App\\Notifications\\NotifierProrogation', 'App\\User', 94, '{\"etat\":\"info\",\"message\":\"Votre demande d\'acc\\u00e8s \\u00e0 l\'information relative \\u00e0 : Libelle a \\u00e9t\\u00e9 prorog\\u00e9e au 19 Septembre 2019\"}', NULL, '2019-09-09 15:29:23', '2019-09-09 15:29:23'),
('df50ad50-3ce4-4752-bc39-7a13cf226944', 'App\\Notifications\\NotifierProrogation', 'App\\User', 95, '{\"etat\":\"info\",\"message\":\"Votre demande d\'acc\\u00e8s \\u00e0 l\'information relative \\u00e0 : Libelle a \\u00e9t\\u00e9 prorog\\u00e9e au 28 Septembre 2019\"}', NULL, '2019-09-09 15:33:30', '2019-09-09 15:33:30'),
('e02192ab-b10c-44b0-9bba-281bb6b8747b', 'App\\Notifications\\NewAccount', 'App\\User', 106, '{\"message\":\"Bonjour Ory Franck, bienvenu(e) sur la plateforme d\'acc\\u00e8s \\u00e0 l\'infrmation.\",\"etat\":\"success\"}', NULL, '2019-09-11 09:17:29', '2019-09-11 09:17:29'),
('e08ce6ac-47af-4206-bb4b-3b091f279ef8', 'App\\Notifications\\NotifierProrogation', 'App\\User', 97, '{\"etat\":\"info\",\"message\":\"Votre demande d\'acc\\u00e8s \\u00e0 l\'information relative \\u00e0 : Libelle a \\u00e9t\\u00e9 prorog\\u00e9e au 16 Octobre 2019\"}', NULL, '2019-09-09 16:29:49', '2019-09-09 16:29:49'),
('e121b6cf-80c8-41a8-a5fd-2c6648e7a7ac', 'App\\Notifications\\NotifierProrogation', 'App\\User', 54, '{\"etat\":\"info\",\"message\":\"Votre demande d\'acc\\u00e8s \\u00e0 l\'information relative \\u00e0 : Bilan des activit\\u00e9s 2019 a \\u00e9t\\u00e9 prorog\\u00e9e au 26 Septembre 2019\"}', NULL, '2019-09-04 10:22:24', '2019-09-04 10:22:24'),
('e20b14e4-25e5-4397-8df1-62d52fb6a8d7', 'App\\Notifications\\NotifierProrogation', 'App\\User', 131, '{\"etat\":\"info\",\"message\":\"Votre demande d\'acc\\u00e8s \\u00e0 l\'information relative \\u00e0 : PV de la r\\u00e9union du bilan finacier de l\'ann\\u00e9e 2009 a \\u00e9t\\u00e9 prorog\\u00e9e au 19 Septembre 2019\"}', NULL, '2019-09-18 15:16:48', '2019-09-18 15:16:48'),
('e845f9be-247f-4442-b943-8fd1e17852da', 'App\\Notifications\\NewAccount', 'App\\User', 159, '{\"message\":\"Bonjour Gnahor\\u00e9 Ory, bienvenu(e) sur la plateforme d\'acc\\u00e8s \\u00e0 l\'infrmation.\",\"etat\":\"success\"}', NULL, '2019-09-20 09:16:43', '2019-09-20 09:16:43'),
('ed0c29ca-6cc6-461a-b2bf-88106ff4fe18', 'App\\Notifications\\NewAccount', 'App\\User', 97, '{\"message\":\"Bonjour Ory Franck, bienvenu(e) sur la plateforme d\'acc\\u00e8s \\u00e0 l\'infrmation.\",\"etat\":\"success\"}', NULL, '2019-09-09 15:59:39', '2019-09-09 15:59:39'),
('edcb4c98-a386-4a2f-be93-12ea8ffd66ea', 'App\\Notifications\\NotifierProrogation', 'App\\User', 129, '{\"etat\":\"info\",\"message\":\"Votre demande d\'acc\\u00e8s \\u00e0 l\'information relative \\u00e0 : Informatique a \\u00e9t\\u00e9 prorog\\u00e9e au 30 Septembre 2019\"}', NULL, '2019-09-11 14:23:25', '2019-09-11 14:23:25'),
('f3095f61-5a1e-44ec-8136-d7d2df4cc236', 'App\\Notifications\\NewAccount', 'App\\User', 73, '{\"message\":\"Bonjour Ory Franck, bienvenu(e) sur la plateforme d\'acc\\u00e8s \\u00e0 l\'infrmation.\",\"etat\":\"success\"}', NULL, '2019-09-05 11:49:15', '2019-09-05 11:49:15'),
('f5e9184b-4b43-4180-8217-c1879628e9ad', 'App\\Notifications\\NotifierProrogation', 'App\\User', 95, '{\"etat\":\"info\",\"message\":\"Votre demande d\'acc\\u00e8s \\u00e0 l\'information relative \\u00e0 : Libelle a \\u00e9t\\u00e9 prorog\\u00e9e au 16 Octobre 2019\"}', NULL, '2019-09-09 16:26:03', '2019-09-09 16:26:03'),
('f8f25f72-f216-4acc-9a6f-8b706162216c', 'App\\Notifications\\NotifierProrogation', 'App\\User', 97, '{\"etat\":\"info\",\"message\":\"Votre demande d\'acc\\u00e8s \\u00e0 l\'information relative \\u00e0 : Libelle a \\u00e9t\\u00e9 prorog\\u00e9e au 16 Octobre 2019\"}', NULL, '2019-09-09 16:29:49', '2019-09-09 16:29:49'),
('f9a41ae9-7aa1-4c21-99d2-c5475d4f83f1', 'App\\Notifications\\NotifierProrogation', 'App\\User', 136, '{\"etat\":\"info\",\"message\":\"Votre demande d\'acc\\u00e8s \\u00e0 l\'information relative \\u00e0 : PV de la r\\u00e9union du bilan finacier de l\'ann\\u00e9e 2009 a \\u00e9t\\u00e9 prorog\\u00e9e au 19 Septembre 2019\"}', NULL, '2019-09-18 15:16:48', '2019-09-18 15:16:48'),
('f9eb39d3-3672-46bb-9008-f4cb478ffc18', 'App\\Notifications\\NewAccount', 'App\\User', 141, '{\"message\":\"Bonjour Gnahore Ory Franck xavier, bienvenu(e) sur la plateforme d\'acc\\u00e8s \\u00e0 l\'infrmation.\",\"etat\":\"success\"}', NULL, '2019-09-19 07:54:32', '2019-09-19 07:54:32'),
('fa15b8b6-591b-4edd-9e83-2dbe7982a10a', 'App\\Notifications\\NewAccount', 'App\\User', 110, '{\"message\":\"Bonjour Ory Franck, bienvenu(e) sur la plateforme d\'acc\\u00e8s \\u00e0 l\'infrmation.\",\"etat\":\"success\"}', NULL, '2019-09-11 09:38:28', '2019-09-11 09:38:28'),
('fba80532-86f8-4571-ac96-00aea5f70386', 'App\\Notifications\\NewAccount', 'App\\User', 56, '{\"message\":\"Bonjour Gnahor\\u00e9 Franck, bienvenu(e) sur la plateforme d\'acc\\u00e8s \\u00e0 l\'infrmation.\",\"etat\":\"success\"}', NULL, '2019-09-04 11:02:58', '2019-09-04 11:02:58'),
('fbe58d8a-337c-431a-8ce4-54135074ce46', 'App\\Notifications\\NewAccount', 'App\\User', 111, '{\"message\":\"Bonjour Ory Franck, bienvenu(e) sur la plateforme d\'acc\\u00e8s \\u00e0 l\'infrmation.\",\"etat\":\"success\"}', NULL, '2019-09-11 09:39:29', '2019-09-11 09:39:29'),
('fd0b4f36-e269-4cf8-b9a7-e6e6de1d4bf3', 'App\\Notifications\\NewAccount', 'App\\User', 112, '{\"message\":\"Bonjour Ory Franck, bienvenu(e) sur la plateforme d\'acc\\u00e8s \\u00e0 l\'infrmation.\",\"etat\":\"success\"}', NULL, '2019-09-11 09:44:10', '2019-09-11 09:44:10'),
('fd8d376c-0a11-4b74-94f2-cd2580028300', 'App\\Notifications\\NewAccount', 'App\\User', 157, '{\"message\":\"Bonjour Gnahor\\u00e9 Ory, bienvenu(e) sur la plateforme d\'acc\\u00e8s \\u00e0 l\'infrmation.\",\"etat\":\"success\"}', NULL, '2019-09-20 09:08:57', '2019-09-20 09:08:57');

-- --------------------------------------------------------

--
-- Table structure for table `organismes`
--

CREATE TABLE `organismes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `organisme` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `autrecontact` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `logo` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `siege` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `organismes`
--

INSERT INTO `organismes` (`id`, `organisme`, `contact`, `email`, `autrecontact`, `logo`, `created_at`, `updated_at`, `siege`) VALUES
(113, 'Foxy Digitall', '11 11 11 11', 'foxydigital@gmail.com', '{\"email\":null,\"contact\":null}', NULL, '2019-09-19 11:35:53', '2019-09-19 11:35:53', 'Abidjan Cocody'),
(114, 'Foxy Digitall', '11 11 11 11', 'foxydigital@gmail.com', '{\"email\":null,\"contact\":null}', NULL, '2019-09-19 11:38:02', '2019-09-19 11:38:02', 'Abidjan Cocody'),
(115, 'Foxy Digitall', '11 11 11 11', 'foxydigital@gmail.com', '{\"email\":null,\"contact\":null}', NULL, '2019-09-19 11:39:04', '2019-09-19 11:39:04', 'Abidjan Cocody'),
(116, 'Foxy Digitall', '11 11 11 11', 'foxydigital@gmail.com', '{\"email\":null,\"contact\":null}', NULL, '2019-09-19 11:39:20', '2019-09-19 11:39:20', 'Abidjan Cocody'),
(117, 'Foxy Digitall', '11 11 11 11', 'foxydigital@gmail.com', '{\"email\":null,\"contact\":null}', NULL, '2019-09-19 11:41:13', '2019-09-19 11:41:13', 'Abidjan Cocody'),
(118, 'Foxy Digitall', '11 11 11 11', 'foxydigital@gmail.com', '{\"email\":null,\"contact\":null}', NULL, '2019-09-19 11:42:55', '2019-09-19 11:42:55', 'Abidjan Cocody'),
(119, 'Foxy Digitall', '11 11 11 11', 'foxydigital@gmail.com', '{\"email\":null,\"contact\":null}', NULL, '2019-09-19 11:43:30', '2019-09-19 11:43:30', 'Abidjan Cocody'),
(120, 'Foxy Digitall', '11 11 11 11', 'foxydigital@gmail.com', '{\"email\":null,\"contact\":null}', NULL, '2019-09-19 11:43:58', '2019-09-19 11:43:58', 'Abidjan Cocody'),
(121, 'Foxy Digitall', '11 11 11 11', 'foxydigital@gmail.com', '{\"email\":null,\"contact\":null}', NULL, '2019-09-19 11:45:54', '2019-09-19 11:45:54', 'Abidjan Cocody'),
(122, 'Foxy Digitall', '11 11 11 11', 'foxydigital@gmail.com', '{\"email\":null,\"contact\":null}', NULL, '2019-09-19 11:46:07', '2019-09-19 11:46:07', 'Abidjan Cocody'),
(123, 'Foxy Digital', '11 11 11 11', 'foxydigita@gmail.com', '{\"email\":null,\"contact\":null}', NULL, '2019-09-19 12:56:40', '2019-09-19 12:56:40', 'Abobo Anador'),
(124, 'Foxy Digital', '11 11 11 11', 'foxydigita@gmail.com', '{\"email\":null,\"contact\":null}', NULL, '2019-09-19 12:58:17', '2019-09-19 12:58:17', 'Abobo Anador'),
(125, 'Galbell\'o Team', '11 22 11 22', 'galello@gmail.com', '{\"email\":null,\"contact\":null}', NULL, '2019-09-19 13:26:40', '2019-09-19 13:26:40', 'Yopougon'),
(126, 'Galbell\'o Team', '11 22 11 22', 'galello@gmail.com', '{\"email\":null,\"contact\":null}', NULL, '2019-09-19 13:27:56', '2019-09-19 13:27:56', 'Yopougon'),
(127, 'Galbell\'o Team', '11 22 11 22', 'galello@gmail.com', '{\"email\":null,\"contact\":null}', NULL, '2019-09-19 13:28:54', '2019-09-19 13:28:54', 'Yopougon'),
(128, 'Galbell\'o Team', '11 22 11 22', 'galello@gmail.com', '{\"email\":null,\"contact\":null}', NULL, '2019-09-19 13:29:29', '2019-09-19 13:29:29', 'Yopougon'),
(129, 'Galbell\'o Team', '11 22 11 22', 'galello@gmail.com', '{\"email\":null,\"contact\":null}', NULL, '2019-09-19 13:30:47', '2019-09-19 13:30:47', 'Yopougon'),
(130, 'Galbell\'o Team', '11 22 11 22', 'galello@gmail.com', '{\"email\":null,\"contact\":null}', NULL, '2019-09-19 13:40:10', '2019-09-19 13:40:10', 'Yopougon'),
(131, 'Galbell\'o Team', '11 22 11 22', 'galello@gmail.com', '{\"email\":null,\"contact\":null}', NULL, '2019-09-19 13:57:47', '2019-09-19 13:57:47', 'Yopougon'),
(132, 'Galbell\'o Team', '11 22 11 22', 'galello@gmail.com', '{\"email\":null,\"contact\":null}', NULL, '2019-09-19 14:01:01', '2019-09-19 14:01:01', 'Yopougon'),
(133, 'Galbell\'o Team', '11 22 11 22', 'galello@gmail.com', '{\"email\":null,\"contact\":null}', NULL, '2019-09-19 14:02:08', '2019-09-19 14:02:08', 'Yopougon'),
(134, 'Galbell\'o Team', '11 22 11 22', 'galello@gmail.com', '{\"email\":null,\"contact\":null}', NULL, '2019-09-19 14:02:34', '2019-09-19 14:02:34', 'Yopougon'),
(135, 'Galbell\'o Team', '11 22 11 22', 'galello@gmail.com', '{\"email\":null,\"contact\":null}', NULL, '2019-09-19 14:03:03', '2019-09-19 14:03:03', 'Yopougon'),
(136, 'Galbell\'o Team', '11 22 11 22', 'galello@gmail.com', '{\"email\":null,\"contact\":null}', NULL, '2019-09-19 14:03:28', '2019-09-19 14:03:28', 'Yopougon'),
(137, 'Galbell\'o Team', '11 22 11 22', 'galello@gmail.com', '{\"email\":null,\"contact\":null}', NULL, '2019-09-19 14:03:42', '2019-09-19 14:03:42', 'Yopougon'),
(138, 'hdhdhd', '11 11 11 11', 'info@foxydigital.ci', '{\"email\":null,\"contact\":null}', NULL, '2019-09-19 15:15:51', '2019-09-19 15:15:51', 'hdhdhdh'),
(139, 'hdhdhd', '11 11 11 11', 'info@foxydigital.ci', '{\"email\":null,\"contact\":null}', NULL, '2019-09-19 15:17:56', '2019-09-19 15:17:56', 'hdhdhdh'),
(140, 'hdhdhd', '11 11 11 11', 'info@foxydigital.ci', '{\"email\":null,\"contact\":null}', NULL, '2019-09-19 15:21:14', '2019-09-19 15:21:14', 'hdhdhdh'),
(141, 'hdhdhd', '11 11 11 11', 'info@foxydigital.ci', '{\"email\":null,\"contact\":null}', NULL, '2019-09-19 15:24:03', '2019-09-19 15:24:03', 'hdhdhdh'),
(142, 'Foxy', '12 11 11 11', 'info@foxydigital.ci', '{\"email\":null,\"contact\":null}', NULL, '2019-09-20 08:17:29', '2019-09-20 08:17:29', 'Abobo'),
(143, 'Foxy', '12 11 11 11', 'info@foxydigital.ci', '{\"email\":null,\"contact\":null}', NULL, '2019-09-20 08:33:53', '2019-09-20 08:33:53', 'Abobo'),
(144, 'Foxy', '12 11 11 11', 'info@foxydigital.ci', '{\"email\":null,\"contact\":null}', NULL, '2019-09-20 08:34:11', '2019-09-20 08:34:11', 'Abobo'),
(145, 'Foxy', '12 11 11 11', 'info@foxydigital.ci', '{\"email\":null,\"contact\":null}', NULL, '2019-09-20 08:37:10', '2019-09-20 08:37:10', 'Abobo'),
(146, 'Foxy', '12 11 11 11', 'info@foxydigital.ci', '{\"email\":null,\"contact\":null}', NULL, '2019-09-20 09:08:54', '2019-09-20 09:08:54', 'Abobo'),
(147, 'Foxy', '12 11 11 11', 'info@foxydigital.ci', '{\"email\":null,\"contact\":null}', NULL, '2019-09-20 09:12:35', '2019-09-20 09:12:35', 'Abobo'),
(148, 'Foxy', '12 11 11 11', 'info@foxydigital.ci', '{\"email\":null,\"contact\":null}', NULL, '2019-09-20 09:16:41', '2019-09-20 09:16:41', 'Abobo');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('franckory2@gmail.com', '$2y$10$.8Mf6dl3EOOgVaJ03N9FxeFxxAt7ULuFSYlcNYBrhAYlsYHKPDPuK', '2019-09-04 11:31:34');

-- --------------------------------------------------------

--
-- Table structure for table `privileges`
--

CREATE TABLE `privileges` (
  `id` int(11) NOT NULL,
  `privilege` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `variable` varchar(25) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `privileges`
--

INSERT INTO `privileges` (`id`, `privilege`, `variable`, `updated_at`) VALUES
(1, 'créer d\'autre utilisateur', 'variable1', '2019-09-19 11:57:24'),
(2, 'créer une demande', 'variable2', '2019-09-19 11:57:24'),
(3, '\r\nJoindre documents/informations', 'variable3', '2019-09-19 11:57:56'),
(4, 'Rédiger une décison', 'variable4', '2019-09-19 11:57:56'),
(5, 'Valider une décision', 'variable5', '2019-09-19 11:59:04'),
(6, 'Transmettre la decison', 'variable6', '2019-09-19 11:59:04');

-- --------------------------------------------------------

--
-- Table structure for table `prorogations`
--

CREATE TABLE `prorogations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `dateProrogation` date NOT NULL,
  `motifProrogation` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `responsable_id` bigint(20) UNSIGNED NOT NULL,
  `demande_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `qualiteresponsable`
--

CREATE TABLE `qualiteresponsable` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `qualite` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `default` tinyint(1) DEFAULT '1' COMMENT 'si default != 0 alors ajouté par les organismes',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `qualiteresponsable`
--

INSERT INTO `qualiteresponsable` (`id`, `qualite`, `default`, `created_at`, `updated_at`) VALUES
(1, 'Responsable Hiérachique', 0, NULL, NULL),
(2, 'Responsable de l\'information', 0, NULL, NULL),
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
(29, 'Informaticien', 1, '2019-09-09 16:57:06', '2019-09-09 16:57:06'),
(30, 'Responsable Informatique', 1, '2019-09-11 13:04:32', '2019-09-11 13:04:32'),
(31, 'DG', 1, '2019-09-19 12:56:40', '2019-09-19 12:56:40'),
(32, 'DG', 1, '2019-09-19 12:58:17', '2019-09-19 12:58:17'),
(33, 'DG', 1, '2019-09-19 13:26:39', '2019-09-19 13:26:39'),
(34, 'DG', 1, '2019-09-19 13:27:56', '2019-09-19 13:27:56'),
(35, 'DG', 1, '2019-09-19 13:28:53', '2019-09-19 13:28:53'),
(36, 'DG', 1, '2019-09-19 13:29:29', '2019-09-19 13:29:29'),
(37, 'DG', 1, '2019-09-19 13:30:47', '2019-09-19 13:30:47'),
(38, 'DG', 1, '2019-09-19 13:40:09', '2019-09-19 13:40:09'),
(39, 'DG', 1, '2019-09-19 13:57:46', '2019-09-19 13:57:46'),
(40, 'DG', 1, '2019-09-19 14:02:08', '2019-09-19 14:02:08'),
(41, 'DG', 1, '2019-09-19 14:02:34', '2019-09-19 14:02:34'),
(42, 'DG', 1, '2019-09-19 14:03:03', '2019-09-19 14:03:03'),
(43, 'DG', 1, '2019-09-19 14:03:28', '2019-09-19 14:03:28'),
(44, 'DG', 1, '2019-09-19 14:03:42', '2019-09-19 14:03:42');

-- --------------------------------------------------------

--
-- Table structure for table `qualites`
--

CREATE TABLE `qualites` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `qualite` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `duree` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'durée en jours',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `qualites`
--

INSERT INTO `qualites` (`id`, `qualite`, `duree`, `created_at`, `updated_at`) VALUES
(1, 'Journaliste / Chercheur', '15', NULL, NULL),
(3, 'Autre', '30', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `refuscommunications`
--

CREATE TABLE `refuscommunications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `motif` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `demande_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `requerants`
--

CREATE TABLE `requerants` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prenom` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sexe` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `titre` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `adressePostale` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ville` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dénomination` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `type_id` bigint(20) UNSIGNED NOT NULL,
  `qualite_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `requerants`
--

INSERT INTO `requerants` (`id`, `nom`, `prenom`, `contact`, `email`, `sexe`, `titre`, `adressePostale`, `ville`, `dénomination`, `created_at`, `updated_at`, `type_id`, `qualite_id`) VALUES
(71, 'Gnahoré', 'Ory Franck Xavier', '11 11 11 11', 'franckory2@gmail.com', 'M', NULL, '12', 'Abobo', NULL, '2019-09-20 09:41:05', '2019-09-20 09:41:05', 1, 1),
(72, 'Gnahoré', 'Ory Franck Xavier', '11 11 11 11', 'info@gmail.com', 'M', NULL, '12', 'Abobo', NULL, '2019-09-20 10:31:22', '2019-09-20 10:31:22', 1, 1),
(73, 'Gnahoré', 'Ory Franck Xavier', '11 11 11 11', 'xav@xav.ci', 'M', NULL, '12', 'Abobo', NULL, '2019-09-20 10:59:17', '2019-09-20 10:59:17', 1, 1),
(74, 'Gnahoré', 'Ory Franck Xavier', '11 11 11 11', 'ory@gmail.com', 'M', NULL, '12', 'Abobo', NULL, '2019-09-20 11:00:21', '2019-09-20 11:00:21', 1, 1),
(75, 'Gnahoré', 'Ory Franck Xavier', '11 11 11 11', 'gnahore@gmail.com', 'M', NULL, '12', 'Abobo', NULL, '2019-09-20 11:01:07', '2019-09-20 11:01:07', 1, 1),
(76, 'Gnahoré', 'Ory Franck Xavier', '11 11 11 11', 'foxy@foxy.ci', 'M', NULL, '12', 'Abobo', NULL, '2019-09-20 11:05:02', '2019-09-20 11:05:02', 1, 1),
(77, 'Gnahoré', 'Ory Franck Xavier', '11 11 11 11', 'gsgsdd@ddd.cc', 'M', NULL, '12', 'Abobo', NULL, '2019-09-20 11:06:33', '2019-09-20 11:06:33', 1, 1),
(78, 'Gnahoré', 'Ory Franck Xavier', '11 11 11 11', 'info@gmail.comn', 'M', NULL, '12', 'Abobo', NULL, '2019-09-20 11:10:17', '2019-09-20 11:10:17', 1, 1),
(79, 'Ory', 'Gnahoré', '11 11 11 11', 'info@gmail.comdada', 'M', NULL, '112', 'Abidjan', NULL, '2019-09-20 11:16:13', '2019-09-20 11:16:13', 1, 1),
(80, 'Gnahoré', 'Ory Franck Xavier', '11 11 11 11', 'info@gmail.co', 'M', NULL, '12', 'Abobo', NULL, '2019-09-20 11:38:52', '2019-09-20 11:38:52', 1, 1),
(81, 'Gnahore', 'Ory Franck Xavier', '11 11 11 11', 'gnahore@xavier.co', 'M', NULL, '12 BP', 'Abobo', NULL, '2019-09-20 11:43:58', '2019-09-20 11:43:58', 4, 1),
(82, 'Gnahoré', 'Francl', '11 11 11 11', 'fax@fax.fax', 'M', NULL, '12', 'Ory', NULL, '2019-09-20 11:51:09', '2019-09-20 11:51:09', 4, 3),
(83, 'Gnao', 'gdgdgdgdg', '11 11 11 11', 'oryxav@gmail.com', 'M', NULL, 'ss11', 'Bouaflé', NULL, '2019-09-20 12:08:05', '2019-09-20 12:08:05', 4, 1),
(84, 'Gnahoré', 'Ory', '11 11 11 11', 'gnahore@xavier.fr', 'M', NULL, '11111', 'Abidjan', NULL, '2019-09-20 12:14:14', '2019-09-20 12:14:14', 4, 3),
(85, 'Gnahoré', 'Ory Franck Xavier', '11 11 11 11', 'info@gmail.ccc', 'M', NULL, '12', 'Abobo', NULL, '2019-09-20 13:52:20', '2019-09-20 13:52:20', 4, 3),
(86, 'Gnahoré', 'Ory Franck Xavier', '11 11 11 11', 'infoinfo@', 'M', NULL, '12', 'Abobo', NULL, '2019-09-20 13:55:57', '2019-09-20 13:55:57', 4, 3),
(87, 'Gnahoré', 'Ory Franck Xavier', '11 11 11 11', 'infooo@gmail.dd', 'M', NULL, '12', 'Abobo', NULL, '2019-09-20 14:01:41', '2019-09-20 14:01:41', 4, 3),
(88, 'Gnahoré', 'Ory Franck Xavier', '11 11 11 11', NULL, 'M', NULL, '12', 'Abobo', NULL, '2019-09-20 14:16:33', '2019-09-20 14:16:33', 3, 1),
(89, 'Gnahoré', 'Ory Franck', '11 22 11 22', 'xavierory@gmail.com', 'M', NULL, '12BP 12 12', 'Abobo', NULL, '2019-09-23 09:02:53', '2019-09-23 09:02:53', 1, 1),
(90, 'Gnahoré', 'Ory Franck Xavier', '12 12 12 12', 'franckgnahore@gmail.com', 'M', NULL, '12BP12', 'Cocody Abatta', NULL, '2019-09-25 11:42:12', '2019-09-25 11:42:12', 1, 1),
(91, 'Ory', 'Franck Xavier', '12 12 12 12', 'gnahoreory@gmail.com', 'M', NULL, '17 BP 15', 'Cocody, Abatta', NULL, '2019-09-25 14:26:30', '2019-09-25 14:26:30', 2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `responsables`
--

CREATE TABLE `responsables` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `autrecontact` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `etat` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'si true alors il est toujours en fonction',
  `dateInactif` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `organisme_id` bigint(20) UNSIGNED NOT NULL,
  `qualiteresponsable_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `responsables`
--

INSERT INTO `responsables` (`id`, `nom`, `prenom`, `contact`, `email`, `autrecontact`, `etat`, `dateInactif`, `created_at`, `updated_at`, `organisme_id`, `qualiteresponsable_id`) VALUES
(43, 'Ory', 'Franck', '42 30 31 92', 'franckory2@gmail.com', '{\"email\":null,\"contact\":null}', 1, NULL, '2019-09-09 11:21:53', '2019-09-09 11:21:53', 76, 25),
(44, 'Ory', 'Franck', '31 23 45 67', 'fanckory2@gmail.com', '{\"email\":null,\"contact\":null}', 1, NULL, '2019-09-09 15:57:45', '2019-09-09 15:57:45', 77, 26),
(45, 'Ory', 'Franck', '22 22 22 22', 'fox@gmail.com', '{\"email\":null,\"contact\":null}', 1, NULL, '2019-09-09 15:59:39', '2019-09-09 15:59:39', 78, 2),
(46, 'Ossey', 'Tanguy', '55 67 37 73', 'tanguy@gmail.comdd dhhdf', '{\"email\":null,\"contact\":null}', 1, NULL, '2019-09-09 16:43:57', '2019-09-09 16:43:57', 79, 27),
(47, 'Ossey', 'Tanguy', '55 67 37 73', 'tanguy@gmail.comdd  dhhdf', '{\"email\":null,\"contact\":null}', 1, NULL, '2019-09-09 16:47:12', '2019-09-09 16:47:12', 80, 28),
(48, 'Ossey', 'Tanguy', '55 67 37 73', 'tanguy@gmail.com', '{\"email\":null,\"contact\":null}', 1, NULL, '2019-09-09 16:57:07', '2019-09-09 16:57:07', 81, 29),
(49, 'Ory', 'Franck', '11 11 11 11', 'gggg@jdjdjdj.cc', '{\"email\":null,\"contact\":null}', 1, NULL, '2019-09-10 11:22:15', '2019-09-10 11:22:15', 82, 1),
(50, 'Ory', 'Franck', '11 11 11 11', 'ory@gmail.ci', '{\"email\":null,\"contact\":null}', 1, NULL, '2019-09-10 15:58:52', '2019-09-10 15:58:52', 83, 2),
(51, 'Ory', 'Franck', '11 11 11 11', 'ory@gmail.comm', '{\"email\":null,\"contact\":null}', 1, NULL, '2019-09-10 16:48:24', '2019-09-10 16:48:24', 84, 1),
(52, 'Ory', 'Franck', '11 11 11 11', 'foxx@gmail.com', '{\"email\":null,\"contact\":null}', 1, NULL, '2019-09-11 08:38:02', '2019-09-11 08:38:02', 85, 2),
(53, 'Ory', 'Franck', '11 11 11 11', 'dobre@gmail.com', '{\"email\":null,\"contact\":null}', 1, NULL, '2019-09-11 09:17:29', '2019-09-11 09:17:29', 86, 1),
(54, 'Ory', 'Franck', '11 11 11 11', 'xavier@gmail.com', '{\"email\":null,\"contact\":null}', 1, NULL, '2019-09-11 09:33:51', '2019-09-11 09:33:51', 87, 1),
(55, 'Ory', 'Franck', '11 11 11 11', 'xavi@gmail.com', '{\"email\":null,\"contact\":null}', 1, NULL, '2019-09-11 09:35:08', '2019-09-11 09:35:08', 88, 1),
(56, 'Ory', 'Franck', '11 11 11 11', 'xavi@gmail.ci', '{\"email\":null,\"contact\":null}', 1, NULL, '2019-09-11 09:35:31', '2019-09-11 09:35:31', 89, 1),
(57, 'Ory', 'Franck', '11 11 11 11', 'xavi@gmail.net', '{\"email\":null,\"contact\":null}', 1, NULL, '2019-09-11 09:38:28', '2019-09-11 09:38:28', 90, 1),
(58, 'Ory', 'Franck', '11 11 11 11', 'xavi@gmail.netxx', '{\"email\":null,\"contact\":null}', 1, NULL, '2019-09-11 09:39:28', '2019-09-11 09:39:28', 91, 1),
(59, 'Ory', 'Franck', '11 11 11 11', 'xavi@gmail.netx', '{\"email\":null,\"contact\":null}', 1, NULL, '2019-09-11 09:44:09', '2019-09-11 09:44:09', 92, 1),
(60, 'Ory', 'Franck', '11 11 11 11', 'xavi@gmail.nex', '{\"email\":null,\"contact\":null}', 1, NULL, '2019-09-11 09:44:48', '2019-09-11 09:44:48', 93, 1),
(61, 'Ory', 'Franck', '11 11 11 11', 'xavi@gmail.nexw', '{\"email\":null,\"contact\":null}', 1, NULL, '2019-09-11 09:46:56', '2019-09-11 09:46:56', 94, 1),
(62, 'Ory', 'Franck', '11 11 11 11', 'xavi@gmail.nen', '{\"email\":null,\"contact\":null}', 1, NULL, '2019-09-11 09:50:34', '2019-09-11 09:50:34', 95, 1),
(63, 'Ory', 'Franck', '11 11 11 11', 'xavi@gmail.nenww', '{\"email\":null,\"contact\":null}', 1, NULL, '2019-09-11 09:52:34', '2019-09-11 09:52:34', 96, 1),
(64, 'Ory', 'Franck', '11 11 11 11', 'xavi@gmail.nenwv', '{\"email\":null,\"contact\":null}', 1, NULL, '2019-09-11 09:52:50', '2019-09-11 09:52:50', 97, 1),
(65, 'Ory', 'Franck', '11 11 11 11', 'xavi@gmail.nenwvvx', '{\"email\":null,\"contact\":null}', 1, NULL, '2019-09-11 09:53:39', '2019-09-11 09:53:39', 98, 1),
(66, 'Ory', 'Franck', '11 11 11 11', 'xavi@gmail.nenwvh', '{\"email\":null,\"contact\":null}', 1, NULL, '2019-09-11 09:56:23', '2019-09-11 09:56:23', 99, 1),
(67, 'Ory', 'Franck', '11 11 11 11', 'xavi@gmail.nenwvx', '{\"email\":null,\"contact\":null}', 1, NULL, '2019-09-11 09:57:02', '2019-09-11 09:57:02', 100, 1),
(68, 'Ory', 'Franck', '11 11 11 11', 'franckory2@gmail.civ', '{\"email\":null,\"contact\":null}', 1, NULL, '2019-09-11 10:00:57', '2019-09-11 10:00:57', 101, 2),
(69, 'Ory', 'Franck', '11 11 11 11', 'xavi@gmail.nenwvxb', '{\"email\":null,\"contact\":null}', 1, NULL, '2019-09-11 10:01:30', '2019-09-11 10:01:30', 102, 1),
(70, 'Ory', 'Franck', '11 11 11 11', 'xavi@gmail.nenwvxq', '{\"email\":null,\"contact\":null}', 1, NULL, '2019-09-11 10:06:25', '2019-09-11 10:06:25', 103, 1),
(71, 'Ory', 'Franck', '11 11 11 11', 'xavi@gmail.nenwvxqw', '{\"email\":null,\"contact\":null}', 1, NULL, '2019-09-11 10:06:59', '2019-09-11 10:06:59', 104, 1),
(72, 'Ory', 'Franck', '22 22 22 22', 'franckory2@gmail.com', '{\"email\":null,\"contact\":null}', 1, NULL, '2019-09-11 10:33:25', '2019-09-11 10:33:25', 105, 2),
(73, 'Ory', 'Franck', '12 12 12 12', 'Info@gmail.com', '{\"email\":null,\"contact\":null}', 1, NULL, '2019-09-11 10:37:00', '2019-09-11 10:37:00', 106, 1),
(74, 'Ory', 'Franck', '21 21 21 21', 'dev@franckory.ci', '{\"email\":null,\"contact\":null}', 1, NULL, '2019-09-11 10:37:59', '2019-09-11 10:37:59', 107, 1),
(75, 'Ory', 'Franck', '11 11 11 11', 'francky@gmail.com', '{\"email\":null,\"contact\":null}', 1, NULL, '2019-09-11 13:04:33', '2019-09-11 13:04:33', 108, 30),
(76, 'Ory', 'Franck', '42 30 31 92', 'f_ory@gmail.com', '{\"email\":null,\"contact\":null}', 1, NULL, '2019-09-12 08:50:35', '2019-09-12 08:50:35', 109, 1),
(77, 'Ory', 'Franck', '21 21 21 21', 'franckory2@gmail.ci', '{\"email\":null,\"contact\":null}', 1, NULL, '2019-09-17 09:12:03', '2019-09-17 09:12:03', 110, 1),
(78, 'Ory', 'Franck', '21 21 21 21', 'franckory2@gmail.comm', '{\"email\":null,\"contact\":null}', 1, NULL, '2019-09-17 09:15:38', '2019-09-17 09:15:38', 111, 1),
(79, 'Ory', 'Franck', '22 22 22 22', 'franckory2@gmail.comxx', '{\"email\":null,\"contact\":null}', 1, NULL, '2019-09-17 09:35:10', '2019-09-17 09:35:10', 112, 1),
(80, 'gdgdgdg', 'gdgdgdg', '11 11 11 11', 'xavier@gmail.com', '{\"email\":null,\"contact\":null}', 1, NULL, '2019-09-19 11:35:54', '2019-09-19 11:35:54', 113, 1),
(81, 'gdgdgdg', 'gdgdgdg', '11 11 11 11', 'xavier@gmail.com', '{\"email\":null,\"contact\":null}', 1, NULL, '2019-09-19 11:38:03', '2019-09-19 11:38:03', 114, 1),
(82, 'gdgdgdg', 'gdgdgdg', '11 11 11 11', 'xavier@gmail.com', '{\"email\":null,\"contact\":null}', 1, NULL, '2019-09-19 11:39:06', '2019-09-19 11:39:06', 115, 1),
(83, 'gdgdgdg', 'gdgdgdg', '11 11 11 11', 'xavier@gmail.com', '{\"email\":null,\"contact\":null}', 1, NULL, '2019-09-19 11:39:20', '2019-09-19 11:39:20', 116, 1),
(84, 'gdgdgdg', 'gdgdgdg', '11 11 11 11', 'xavier@gmail.com', '{\"email\":null,\"contact\":null}', 1, NULL, '2019-09-19 11:42:56', '2019-09-19 11:42:56', 118, 1),
(85, 'gdgdgdg', 'gdgdgdg', '11 11 11 11', 'xavier@gmail.com', '{\"email\":null,\"contact\":null}', 1, NULL, '2019-09-19 11:43:30', '2019-09-19 11:43:30', 119, 1),
(86, 'gdgdgdg', 'gdgdgdg', '11 11 11 11', 'xavier@gmail.com', '{\"email\":null,\"contact\":null}', 1, NULL, '2019-09-19 11:43:59', '2019-09-19 11:43:59', 120, 1),
(87, 'gdgdgdg', 'gdgdgdg', '11 11 11 11', 'xavier@gmail.com', '{\"email\":null,\"contact\":null}', 1, NULL, '2019-09-19 11:45:55', '2019-09-19 11:45:55', 121, 1),
(88, 'gdgdgdg', 'gdgdgdg', '11 11 11 11', 'xavier@gmail.com', '{\"email\":null,\"contact\":null}', 1, NULL, '2019-09-19 11:46:07', '2019-09-19 11:46:07', 122, 1),
(89, 'Gnahoré', 'Ory Franck Xavier', '11 11 11 11', 'info@foxydigital.ci', '{\"email\":null,\"contact\":null}', 1, NULL, '2019-09-19 12:58:18', '2019-09-19 12:58:18', 124, 32),
(90, 'Gallet', 'Richard', '21 21 21 21', 'info@foxydigital.ci', '{\"email\":null,\"contact\":null}', 1, NULL, '2019-09-19 13:27:57', '2019-09-19 13:27:57', 126, 34),
(91, 'Gallet', 'Richard', '21 21 21 21', 'info@foxydigital.ci', '{\"email\":null,\"contact\":null}', 1, NULL, '2019-09-19 13:28:54', '2019-09-19 13:28:54', 127, 35),
(92, 'Gallet', 'Richard', '21 21 21 21', 'info@foxydigital.ci', '{\"email\":null,\"contact\":null}', 1, NULL, '2019-09-19 13:29:30', '2019-09-19 13:29:30', 128, 36),
(93, 'Gallet', 'Richard', '21 21 21 21', 'info@foxydigital.ci', '{\"email\":null,\"contact\":null}', 1, NULL, '2019-09-19 13:30:47', '2019-09-19 13:30:47', 129, 37),
(94, 'Gallet', 'Richard', '21 21 21 21', 'info@foxydigital.ci', '{\"email\":null,\"contact\":null}', 1, NULL, '2019-09-19 13:40:10', '2019-09-19 13:40:10', 130, 38),
(95, 'Gallet', 'Richard', '21 21 21 21', 'info@foxydigital.ci', '{\"email\":null,\"contact\":null}', 1, NULL, '2019-09-19 13:57:47', '2019-09-19 13:57:47', 131, 39),
(96, 'Gallet', 'Richard', '21 21 21 21', 'info@foxydigital.ci', '{\"email\":null,\"contact\":null}', 1, NULL, '2019-09-19 14:02:09', '2019-09-19 14:02:09', 133, 40),
(97, 'Gallet', 'Richard', '21 21 21 21', 'info@foxydigital.ci', '{\"email\":null,\"contact\":null}', 1, NULL, '2019-09-19 14:03:03', '2019-09-19 14:03:03', 135, 42),
(98, 'Gallet', 'Richard', '21 21 21 21', 'info@foxydigital.ci', '{\"email\":null,\"contact\":null}', 1, NULL, '2019-09-19 14:03:28', '2019-09-19 14:03:28', 136, 43),
(99, 'Gallet', 'Richard', '21 21 21 21', 'info@foxydigital.ci', '{\"email\":null,\"contact\":null}', 1, NULL, '2019-09-19 14:03:43', '2019-09-19 14:03:43', 137, 44),
(100, 'ddhdhdh', 'hdhdhdh', '11 11 11 11', 'info@foxydigital.com', '{\"email\":null,\"contact\":null}', 1, NULL, '2019-09-19 15:21:14', '2019-09-19 15:21:14', 140, 1),
(101, 'ddhdhdh', 'hdhdhdh', '11 11 11 11', 'franck@fmai.com', '{\"email\":null,\"contact\":null}', 1, NULL, '2019-09-19 15:24:04', '2019-09-19 15:24:04', 141, 1),
(102, 'Gnahoré', 'Ory', '12 12 11 11', 'info@foxydigital.com', '{\"email\":null,\"contact\":null}', 1, NULL, '2019-09-20 08:17:31', '2019-09-20 08:17:31', 142, 2),
(103, 'Gnahoré', 'Ory', '12 12 11 11', 'info@foxydigital.com', '{\"email\":null,\"contact\":null}', 1, NULL, '2019-09-20 08:33:53', '2019-09-20 08:33:53', 143, 2),
(104, 'Gnahoré', 'Ory', '12 12 11 11', 'info@foxydigital.com', '{\"email\":null,\"contact\":null}', 1, NULL, '2019-09-20 08:34:12', '2019-09-20 08:34:12', 144, 2),
(105, 'Gnahoré', 'Ory', '12 12 11 11', 'info@foxydigital.com', '{\"email\":null,\"contact\":null}', 1, NULL, '2019-09-20 08:37:10', '2019-09-20 08:37:10', 145, 2),
(106, 'Gnahoré', 'Ory', '12 12 11 11', 'info@foxydigital.com', '{\"email\":null,\"contact\":null}', 1, NULL, '2019-09-20 09:08:54', '2019-09-20 09:08:54', 146, 2),
(107, 'Gnahoré', 'Ory', '12 12 11 11', 'info@foxy.ci', '{\"email\":null,\"contact\":null}', 1, NULL, '2019-09-20 09:12:35', '2019-09-20 09:12:35', 147, 2),
(108, 'Gnahoré', 'Ory', '12 12 11 11', 'info@foxy.com', '{\"email\":null,\"contact\":null}', 1, NULL, '2019-09-20 09:16:43', '2019-09-20 09:16:43', 148, 2);

-- --------------------------------------------------------

--
-- Table structure for table `saisines`
--

CREATE TABLE `saisines` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `demande_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sources`
--

CREATE TABLE `sources` (
  `id` int(11) NOT NULL,
  `source` varchar(150) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sources`
--

INSERT INTO `sources` (`id`, `source`, `updated_at`) VALUES
(1, 'Media', '2019-09-11 15:48:34'),
(2, 'Communication', '2019-09-12 08:55:43'),
(3, 'Marketing ', '2019-09-23 09:50:00');

-- --------------------------------------------------------

--
-- Table structure for table `types`
--

CREATE TABLE `types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `types`
--

INSERT INTO `types` (`id`, `type`, `created_at`, `updated_at`) VALUES
(1, 'Personne physique', NULL, NULL),
(2, 'Personne morale', NULL, NULL),
(3, 'Concerné(e)', NULL, NULL),
(4, 'Mandataire', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `pseudo` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `requerant_id` bigint(20) UNSIGNED DEFAULT NULL,
  `responsable_id` bigint(20) UNSIGNED DEFAULT NULL,
  `caidp` tinyint(1) DEFAULT NULL,
  `privilegesOrga` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `pseudo`, `password`, `remember_token`, `created_at`, `updated_at`, `requerant_id`, `responsable_id`, `caidp`, `privilegesOrga`) VALUES
(144, 'gdgdgdg gdgdgdg', NULL, NULL, 'xavier@gmail.com', '$2y$10$ejpNs2uGTGeRJJcj53LmyOirf7WZA1Ndyoj44drQ1c//8GrEXUIq.', 'wvgu7LSmbnuvyHRK1S6XI1kV64MCqOOaMP4FM2UqZKjvcOUeJd9tVjYohWMU', '2019-09-19 11:46:07', '2019-09-19 11:46:07', NULL, 88, NULL, '{\"createUser\":null,\"createDemande\":true,\"createFile\":true,\"createDecison\":null,\"valideDecison\":null,\"sendDecison\":null}'),
(145, 'Gnahoré Ory Franck Xavier', NULL, NULL, 'info@foxydigital.ci', '$2y$10$jv9HeOQys6oRLty77QbSWecgDmaOyjXv.GbrqmUNEhmnKVWIOaQfO', NULL, '2019-09-19 12:58:18', '2019-09-19 12:58:18', NULL, 89, NULL, NULL),
(146, 'Gallet Richard', NULL, NULL, 'info@foxydigital.ci', '$2y$10$qn3e38OQpxmfBVr7VvcFeuHnpMqvEhBovSfFseqtMHplegNe.QM2e', NULL, '2019-09-19 13:29:30', '2019-09-19 13:29:30', NULL, 92, NULL, NULL),
(149, 'Gallet Richard', 'info@foxydigital.ci', NULL, 'info@foxydigital.ci', '$2y$10$K9DOmiIm7tO.AlkMBHPtpurF29bP.fc51cGRXgWyKbmNFAHElaTZO', NULL, '2019-09-19 13:57:47', '2019-09-19 13:57:47', NULL, 95, NULL, NULL),
(150, 'Gallet Richard', 'info@foxydigital.ci', NULL, 'info@foxydigital.ci', '$2y$10$dqJUlaxq8aTqGCAG/uNXVOviwca6l/3G8hjfRL/whjH4vyoBZZ0Ri', NULL, '2019-09-19 14:03:43', '2019-09-19 14:03:43', NULL, 99, NULL, '{\"createUser\":true,\"createDemande\":true,\"createFile\":true,\"createDecison\":true,\"valideDecison\":true,\"sendDecison\":true}'),
(151, 'ddhdhdh hdhdhdh', 'info@foxydigital.com', NULL, 'info@foxydigital.com', '$2y$10$XXnZqak5lYb/9QQPf7QW2eD0w1RkVZrWHND1bNAv3b0X2E9wTvX86', NULL, '2019-09-19 15:21:15', '2019-09-19 15:21:15', NULL, 100, NULL, '{\"createUser\":true,\"createDemande\":true,\"createFile\":true,\"createDecison\":true,\"valideDecison\":true,\"sendDecison\":true}'),
(152, 'ddhdhdh hdhdhdh', 'franck@fmai.com', NULL, 'franck@fmai.com', '$2y$10$fYwcZyvUU2IUbhSjwOi2JeZxoqftwdLVH610fGQmTg3Oaa8XSa5M6', NULL, '2019-09-19 15:24:04', '2019-09-19 15:24:04', NULL, 101, NULL, '{\"createUser\":true,\"createDemande\":true,\"createFile\":true,\"createDecison\":true,\"valideDecison\":true,\"sendDecison\":true}'),
(153, 'Gnahoré Ory', 'info@foxydigital.com', NULL, 'info@foxydigital.com', '$2y$10$B0U.ToIseoyYOgonXQQwfOJOr7.g/5zqONsVDiBncHznw/mee7Ige', NULL, '2019-09-20 08:17:32', '2019-09-20 08:17:32', NULL, 102, NULL, '{\"createUser\":true,\"createDemande\":true,\"createFile\":true,\"createDecison\":true,\"valideDecison\":true,\"sendDecison\":true}'),
(154, 'Gnahoré Ory', 'info@foxydigital.com', NULL, 'info@foxydigital.com', '$2y$10$Kffmjkz.0/7OKDIDaq7m8uuOG1EQwa.jeSuE6XBe3LOs1B/q18rZq', NULL, '2019-09-20 08:33:53', '2019-09-20 08:33:53', NULL, 103, NULL, '{\"createUser\":true,\"createDemande\":true,\"createFile\":true,\"createDecison\":true,\"valideDecison\":true,\"sendDecison\":true}'),
(155, 'Gnahoré Ory', 'info@foxydigital.com', NULL, 'info@foxydigital.com', '$2y$10$ThLV7zGecgHvLnvLx0wjLulWejzLqhQ4YC1ilShYKWI2eaB8M1dxq', NULL, '2019-09-20 08:34:12', '2019-09-20 08:34:12', NULL, 104, NULL, '{\"createUser\":true,\"createDemande\":true,\"createFile\":true,\"createDecison\":true,\"valideDecison\":true,\"sendDecison\":true}'),
(156, 'Gnahoré Ory', 'info@foxydigital.com', NULL, 'info@foxydigital.com', '$2y$10$M5DVQMRwQT68RTFN419YIe1D/jy6Qnm9/IKQKNjLva13YKiRvWiNm', NULL, '2019-09-20 08:37:11', '2019-09-20 08:37:11', NULL, 105, NULL, '{\"createUser\":true,\"createDemande\":true,\"createFile\":true,\"createDecison\":true,\"valideDecison\":true,\"sendDecison\":true}'),
(157, 'Gnahoré Ory', 'info@foxydigital.com', NULL, 'info@foxydigital.com', '$2y$10$Hp/ECnaTpNztBX78ioBLn.znY6CxzH2rGoK1e7tAsWa.qvCZF5hZq', NULL, '2019-09-20 09:08:55', '2019-09-20 09:08:55', NULL, 106, NULL, '{\"createUser\":true,\"createDemande\":true,\"createFile\":true,\"createDecison\":true,\"valideDecison\":true,\"sendDecison\":true}'),
(158, 'Gnahoré Ory', 'info@foxy.ci', NULL, 'info@foxy.ci', '$2y$10$xPVJJQPKy8H.TAi3/KQ4a.QaLIk9Fz.GY0IBm9ljp8cnk/LSlPmY6', NULL, '2019-09-20 09:12:35', '2019-09-20 09:12:35', NULL, 107, NULL, '{\"createUser\":true,\"createDemande\":true,\"createFile\":true,\"createDecison\":true,\"valideDecison\":true,\"sendDecison\":true}'),
(159, 'Gnahoré Ory', 'info@foxy.com', NULL, 'info@foxy.com', '$2y$10$X0StdW4Uksgb96sIY.MY..kh3XG445B9j8igCrk91KCCLHeELHfFa', 'gTjoIz6jlQsTj0iPzOOdbZ6QqN5qRpc31Oqik7T0wIT9xtL4X2KCmmczBZ9H', '2019-09-20 09:16:43', '2019-09-20 09:16:43', NULL, 108, NULL, '{\"createUser\":true,\"createDemande\":true,\"createFile\":true,\"createDecison\":true,\"valideDecison\":true,\"sendDecison\":true}'),
(160, 'Gnahoré', 'franckory2@gmail.com', NULL, 'franckory2@gmail.com', '$2y$10$y7JwzYuO8gF1JE94Jg5HiuDMV0XiDdogbn77qb8d3/PYeakhtLfT2', NULL, '2019-09-20 10:17:52', '2019-09-20 10:17:52', NULL, NULL, NULL, NULL),
(161, 'Gnahoré', 'info@gmail.com', NULL, 'info@gmail.com', '$2y$10$miTOI7Gkqn.cv54c3V.tWun9I4IyEQwhuzZ.kLoUz3nAYHGLeuDLu', NULL, '2019-09-20 10:33:37', '2019-09-20 10:33:37', NULL, NULL, NULL, NULL),
(162, 'Gnahoré', 'gnahore@gmail.com', NULL, 'gnahore@gmail.com', '$2y$10$KgAx6oerIEaWyTITUJlI9O3OupP2QqwfBii8eRZgwxWknvXIQj2dS', NULL, '2019-09-20 11:03:31', '2019-09-20 11:03:31', NULL, NULL, NULL, NULL),
(163, 'Gnahoré', 'foxy@foxy.ci', NULL, 'foxy@foxy.ci', '$2y$10$oPbKhC214yGUVMbWkvnQFexdBK03De3uHQ3u8CNZSmDxxPxnNyuSC', NULL, '2019-09-20 11:05:31', '2019-09-20 11:05:31', NULL, NULL, NULL, NULL),
(164, 'Gnahoré', 'gsgsdd@ddd.cc', NULL, 'gsgsdd@ddd.cc', '$2y$10$JtxHVka8HMOFsYYI1P2irOA4HjUj5h.Vq/.qVqggv5uj5a9ubnO5m', NULL, '2019-09-20 11:07:42', '2019-09-20 11:07:42', NULL, NULL, NULL, NULL),
(165, 'Gnahoré Ory Franck Xavier', 'info@gmail.comn', NULL, 'info@gmail.comn', '$2y$10$PSeEdGqmHcp59kDpO6pSGOeNdOlSKzacq.9lU5HWIfbETyKuTzCn6', NULL, '2019-09-20 11:10:17', '2019-09-20 11:10:17', 78, NULL, NULL, NULL),
(166, 'Gnahoré Ory Franck Xavier', 'info@gmail.co', NULL, 'info@gmail.co', '$2y$10$hLW2JbrpiiIR68l7Jp9MAuhZ87zSVEHQ74dyE0bqyiixou7br4i.a', NULL, '2019-09-20 11:38:53', '2019-09-20 11:38:53', 80, NULL, NULL, NULL),
(167, 'Gnahore Ory Franck Xavier', 'gnahore@xavier.co', NULL, 'gnahore@xavier.co', '$2y$10$rjxMvuFj4FzJSamLq9fLq.NpuFfbZYqnWlptczw.BLUI7eOdpyRXa', NULL, '2019-09-20 11:44:00', '2019-09-20 11:44:00', 81, NULL, NULL, NULL),
(168, 'Gnahoré Francl', 'fax@fax.fax', NULL, 'fax@fax.fax', '$2y$10$pj6BxmFoRcd1BW4KS6SAT.hcM/qop6WCYNi9l9J1RZhSDM0MaI4f.', NULL, '2019-09-20 11:51:10', '2019-09-20 11:51:10', 82, NULL, NULL, NULL),
(169, 'Gnao gdgdgdgdg', 'oryxav@gmail.com', NULL, 'oryxav@gmail.com', '$2y$10$eNVWj5XiV3w1HjDvasXCsO9oAQHpXDd5A74Adq00O5JlhHIOhefW2', NULL, '2019-09-20 12:08:06', '2019-09-20 12:08:06', 83, NULL, NULL, NULL),
(170, 'Gnahoré Ory', 'gnahore@xavier.fr', NULL, 'gnahore@xavier.fr', '$2y$10$pIJBSqQY4Q8uJB1pniHYyupAJon9OpazCah98Hw3RIMmmWLyMOqJO', NULL, '2019-09-20 12:14:14', '2019-09-20 12:14:14', 84, NULL, NULL, NULL),
(171, 'Gnahoré Ory Franck Xavier', 'info@gmail.ccc', NULL, 'info@gmail.ccc', '$2y$10$6dLJKcYO90R7WqmnJgcO2.v021UTZfPUXuOldAPI8NoEmKqfWmSHy', NULL, '2019-09-20 13:52:20', '2019-09-20 13:52:20', 85, NULL, NULL, NULL),
(172, 'Gnahoré Ory Franck Xavier', NULL, NULL, 'infoinfo@', '$2y$10$3UFJXKQnFRmHeX191s3/NOl5LY4sVUr/8mjFZhxAWoBECnlrC5s3e', NULL, '2019-09-20 13:55:57', '2019-09-20 13:55:57', 86, NULL, NULL, NULL),
(173, 'Gnahoré', NULL, NULL, 'infoinfo@', '$2y$10$U2v4Ny4b0ZvQHGuy/yb3RuQDQFr5kcEbfqx8uTRT7l79pUI6K6ggS', NULL, '2019-09-20 13:55:58', '2019-09-20 13:55:58', NULL, NULL, NULL, NULL),
(174, 'Gnahoré Ory Franck Xavier', 'infooo@gmail.dd', NULL, 'infooo@gmail.dd', '$2y$10$KiWniGR/wYHAge/pEEQU2epFCa9zP1SiwpXZgctwZ0vfenVlKNLcm', NULL, '2019-09-20 14:01:42', '2019-09-20 14:01:42', 87, NULL, NULL, NULL),
(175, 'Gnahoré Ory Franck', 'xavierory@gmail.com', NULL, 'xavierory@gmail.com', '$2y$10$pPnXTKzgAizL4uI1jCxc.e.6XbBJ9RAzqA1y9bdZTVXPB2xQRnSvq', NULL, '2019-09-23 09:02:54', '2019-09-23 09:02:54', 89, NULL, NULL, NULL),
(176, 'Gnahoré Ory Franck Xavier', 'franckgnahore@gmail.com', NULL, 'franckgnahore@gmail.com', '$2y$10$EAzkD.nEnTw.y.qiY8L./.OAV8u9x/mpJpp71Jl4buWeyBSyELioO', NULL, '2019-09-25 11:42:13', '2019-09-25 11:42:13', 90, NULL, NULL, NULL),
(177, 'Ory Franck Xavier', 'gnahoreory@gmail.com', NULL, 'gnahoreory@gmail.com', '$2y$10$npaW16IhNTmzADVI3U6lXu0KEcZxMENUujnItDA3YpAsVMePUML5K', NULL, '2019-09-25 14:26:31', '2019-09-25 14:26:31', 91, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `villes`
--

CREATE TABLE `villes` (
  `id` int(11) NOT NULL,
  `ville` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `villes`
--

INSERT INTO `villes` (`id`, `ville`, `updated_at`) VALUES
(1, 'Abidjan', NULL),
(2, 'Bouaké', NULL),
(3, 'Daloa', NULL),
(4, 'Yamoussoukro', NULL),
(5, 'San-Pédro', NULL),
(6, 'Divo', NULL),
(7, 'Korhogo', NULL),
(8, 'Anyama', NULL),
(9, 'Abengourou', NULL),
(10, 'Man', NULL),
(11, 'Gagnoa', NULL),
(12, 'Soubré', NULL),
(13, 'Agboville', NULL),
(14, 'Dabou', NULL),
(15, 'Grand-Bassam', NULL),
(16, 'Bouaflé', NULL),
(17, 'Issia', NULL),
(18, 'Sinfra', NULL),
(19, 'Katiola', NULL),
(20, 'Bingerville', NULL),
(21, 'Adzopé', NULL),
(22, 'Séguéla', NULL),
(23, 'Bondoukou', NULL),
(24, 'Oumé', NULL),
(25, 'Ferkessedougou', NULL),
(26, 'Dimbokro1', NULL),
(27, 'Odienné', NULL),
(28, 'Duékoué', NULL),
(29, 'Danané', NULL),
(30, 'Tingréla', NULL),
(31, 'Guiglo', NULL),
(32, 'Boundiali', NULL),
(33, 'Agnibilékrou', NULL),
(34, 'Daoukro', NULL),
(35, 'Vavoua', NULL),
(36, 'Zuénoula', NULL),
(37, 'Tiassalé', NULL),
(38, 'Toumodi', NULL),
(39, 'Akoupé', NULL),
(40, 'Lakota', NULL),
(41, 'Abobo', NULL),
(42, 'Adjamé', NULL),
(43, 'Attécoubé', NULL),
(44, 'Cocody', NULL),
(45, 'Plateau', NULL),
(46, 'Yopugon', NULL),
(47, 'Treichville', NULL),
(48, 'Koumassi', NULL),
(49, 'Marcory', NULL),
(50, 'Port-Bouët', NULL),
(51, 'Songon', NULL),
(52, 'Bingerville', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `contacts_responsable_id_foreign` (`responsable_id`);

--
-- Indexes for table `decisioncaipdps`
--
ALTER TABLE `decisioncaipdps`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `decisionpredefinies`
--
ALTER TABLE `decisionpredefinies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `decisions`
--
ALTER TABLE `decisions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `decisions_demande_id_foreign` (`demande_id`);

--
-- Indexes for table `demandes`
--
ALTER TABLE `demandes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `demandes_requerant_id_foreign` (`requerant_id`),
  ADD KEY `demandes_organisme_id_foreign` (`organisme_id`),
  ADD KEY `mandant_id` (`mandant_id`);

--
-- Indexes for table `documents`
--
ALTER TABLE `documents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `documents_demande_id_foreign` (`demande_id`),
  ADD KEY `documents_information_id_foreign` (`information_id`);

--
-- Indexes for table `informations`
--
ALTER TABLE `informations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `informations_demande_id_foreign` (`demande_id`),
  ADD KEY `source_id` (`source_id`);

--
-- Indexes for table `mandants`
--
ALTER TABLE `mandants`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ville_id` (`ville`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`);

--
-- Indexes for table `organismes`
--
ALTER TABLE `organismes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `privileges`
--
ALTER TABLE `privileges`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prorogations`
--
ALTER TABLE `prorogations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `prorogation_responsable_id_foreign` (`responsable_id`),
  ADD KEY `prorogation_demande_id_foreign` (`demande_id`);

--
-- Indexes for table `qualiteresponsable`
--
ALTER TABLE `qualiteresponsable`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `qualites`
--
ALTER TABLE `qualites`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `refuscommunications`
--
ALTER TABLE `refuscommunications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `refuscommunications_demande_id_foreign` (`demande_id`);

--
-- Indexes for table `requerants`
--
ALTER TABLE `requerants`
  ADD PRIMARY KEY (`id`),
  ADD KEY `requerants_type_id_foreign` (`type_id`),
  ADD KEY `requerants_qualite_id_foreign` (`qualite_id`),
  ADD KEY `ville_id` (`ville`);

--
-- Indexes for table `responsables`
--
ALTER TABLE `responsables`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `saisines`
--
ALTER TABLE `saisines`
  ADD PRIMARY KEY (`id`),
  ADD KEY `saisines_demande_id_foreign` (`demande_id`);

--
-- Indexes for table `sources`
--
ALTER TABLE `sources`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `types`
--
ALTER TABLE `types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users_requerant_id_foreign` (`requerant_id`),
  ADD KEY `users_responsable_id_foreign` (`responsable_id`),
  ADD KEY `pseudo` (`pseudo`);

--
-- Indexes for table `villes`
--
ALTER TABLE `villes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `decisioncaipdps`
--
ALTER TABLE `decisioncaipdps`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `decisionpredefinies`
--
ALTER TABLE `decisionpredefinies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `decisions`
--
ALTER TABLE `decisions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `demandes`
--
ALTER TABLE `demandes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `documents`
--
ALTER TABLE `documents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `informations`
--
ALTER TABLE `informations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `mandants`
--
ALTER TABLE `mandants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `organismes`
--
ALTER TABLE `organismes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=149;

--
-- AUTO_INCREMENT for table `privileges`
--
ALTER TABLE `privileges`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `prorogations`
--
ALTER TABLE `prorogations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `qualiteresponsable`
--
ALTER TABLE `qualiteresponsable`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `qualites`
--
ALTER TABLE `qualites`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `refuscommunications`
--
ALTER TABLE `refuscommunications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `requerants`
--
ALTER TABLE `requerants`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT for table `responsables`
--
ALTER TABLE `responsables`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT for table `saisines`
--
ALTER TABLE `saisines`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sources`
--
ALTER TABLE `sources`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `types`
--
ALTER TABLE `types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=178;

--
-- AUTO_INCREMENT for table `villes`
--
ALTER TABLE `villes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `contacts`
--
ALTER TABLE `contacts`
  ADD CONSTRAINT `contacts_responsable_id_foreign` FOREIGN KEY (`responsable_id`) REFERENCES `responsables` (`id`);

--
-- Constraints for table `decisions`
--
ALTER TABLE `decisions`
  ADD CONSTRAINT `decisions_demande_id_foreign` FOREIGN KEY (`demande_id`) REFERENCES `demandes` (`id`);

--
-- Constraints for table `demandes`
--
ALTER TABLE `demandes`
  ADD CONSTRAINT `demandes_organisme_id_foreign` FOREIGN KEY (`organisme_id`) REFERENCES `organismes` (`id`),
  ADD CONSTRAINT `demandes_requerant_id_foreign` FOREIGN KEY (`requerant_id`) REFERENCES `requerants` (`id`);

--
-- Constraints for table `documents`
--
ALTER TABLE `documents`
  ADD CONSTRAINT `documents_demande_id_foreign` FOREIGN KEY (`demande_id`) REFERENCES `demandes` (`id`),
  ADD CONSTRAINT `documents_information_id_foreign` FOREIGN KEY (`information_id`) REFERENCES `informations` (`id`);

--
-- Constraints for table `informations`
--
ALTER TABLE `informations`
  ADD CONSTRAINT `informations_demande_id_foreign` FOREIGN KEY (`demande_id`) REFERENCES `demandes` (`id`);

--
-- Constraints for table `prorogations`
--
ALTER TABLE `prorogations`
  ADD CONSTRAINT `prorogation_demande_id_foreign` FOREIGN KEY (`demande_id`) REFERENCES `demandes` (`id`),
  ADD CONSTRAINT `prorogation_responsable_id_foreign` FOREIGN KEY (`responsable_id`) REFERENCES `responsables` (`id`);

--
-- Constraints for table `refuscommunications`
--
ALTER TABLE `refuscommunications`
  ADD CONSTRAINT `refuscommunications_demande_id_foreign` FOREIGN KEY (`demande_id`) REFERENCES `demandes` (`id`);

--
-- Constraints for table `requerants`
--
ALTER TABLE `requerants`
  ADD CONSTRAINT `requerants_qualite_id_foreign` FOREIGN KEY (`qualite_id`) REFERENCES `qualites` (`id`),
  ADD CONSTRAINT `requerants_type_id_foreign` FOREIGN KEY (`type_id`) REFERENCES `types` (`id`);

--
-- Constraints for table `saisines`
--
ALTER TABLE `saisines`
  ADD CONSTRAINT `saisines_demande_id_foreign` FOREIGN KEY (`demande_id`) REFERENCES `demandes` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_requerant_id_foreign` FOREIGN KEY (`requerant_id`) REFERENCES `requerants` (`id`),
  ADD CONSTRAINT `users_responsable_id_foreign` FOREIGN KEY (`responsable_id`) REFERENCES `responsables` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

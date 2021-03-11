-- phpMyAdmin SQL Dump
-- version 4.6.6deb5ubuntu0.5
-- https://www.phpmyadmin.net/
--
-- Client :  localhost:3306
-- Généré le :  Jeu 11 Mars 2021 à 18:53
-- Version du serveur :  5.7.32-0ubuntu0.18.04.1
-- Version de PHP :  7.3.25-1+ubuntu18.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `FMPARC`
--

-- --------------------------------------------------------

--
-- Structure de la table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_12_23_085109_create_modeles_table', 1),
(5, '2020_12_23_085304_create_sites_table', 1),
(6, '2020_12_23_085526_create_utilisateurs_table', 1),
(7, '2020_12_23_085651_create_parcs_table', 2),
(8, '2020_12_23_085927_create_etats_table', 2),
(9, '2020_12_23_090413_add_foreign', 3),
(10, '2020_12_23_091122_add_foreign_drop', 4),
(11, '2020_12_23_091551_add_foreing_parc', 5),
(12, '2020_12_23_092944_deleteetat', 6),
(13, '2020_12_23_093902_add_serie', 7),
(14, '2020_12_24_132312_add_isactive_modele', 8);

-- --------------------------------------------------------

--
-- Structure de la table `modeles`
--

CREATE TABLE `modeles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `libModele` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `actif` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `modeles`
--

INSERT INTO `modeles` (`id`, `libModele`, `created_at`, `updated_at`, `actif`) VALUES
(1, 'DELL5400', NULL, '2021-01-11 09:32:11', 1),
(2, 'DELL5410', NULL, NULL, 1),
(3, 'DELL5490', '2020-12-24 13:33:19', '2020-12-24 13:40:55', 1),
(4, 'DELL7290', '2021-01-14 14:39:50', '2021-01-14 14:39:50', 1),
(5, 'HPG4', '2021-01-14 14:39:59', '2021-01-14 14:39:59', 1),
(6, 'DELL5490 BOOSTE', '2021-01-14 14:40:18', '2021-01-14 14:40:18', 1),
(7, 'DELL7730', '2021-01-14 14:40:28', '2021-01-14 14:40:28', 1),
(8, 'DELL7310', '2021-01-14 14:51:32', '2021-01-14 14:51:32', 1),
(9, 'HPG3', '2021-01-14 14:52:23', '2021-01-14 14:52:23', 1),
(10, 'DELL5410BOOSTE', '2021-02-08 16:13:09', '2021-02-08 16:13:09', 1),
(11, 'DELL5500', '2021-02-22 10:59:46', '2021-02-22 10:59:46', 1);

-- --------------------------------------------------------

--
-- Structure de la table `parcs`
--

CREATE TABLE `parcs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `dateAttrib` date NOT NULL,
  `dateFinGarantie` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `idSite` bigint(20) UNSIGNED NOT NULL,
  `idModele` bigint(20) UNSIGNED NOT NULL,
  `idUtilisateur` bigint(20) UNSIGNED NOT NULL,
  `numSerie` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `parcs`
--

INSERT INTO `parcs` (`id`, `dateAttrib`, `dateFinGarantie`, `created_at`, `updated_at`, `idSite`, `idModele`, `idUtilisateur`, `numSerie`) VALUES
(1, '2020-05-20', '2023-03-03', NULL, NULL, 1, 1, 1, '1QH83Z2'),
(2, '2020-05-20', '2023-03-03', NULL, NULL, 1, 1, 2, '40YF3Z2'),
(3, '2020-05-20', '2022-01-09', NULL, NULL, 1, 3, 3, '89DN7S2'),
(4, '2020-10-09', '2023-03-03', NULL, NULL, 1, 1, 4, '7X983Z2'),
(5, '2020-06-02', '2022-01-17', NULL, NULL, 1, 4, 5, 'GSH4SQ2'),
(6, '2020-06-15', '2020-10-19', NULL, NULL, 1, 5, 6, '5CG7280JKS'),
(7, '2020-06-18', '2020-10-19', NULL, NULL, 1, 5, 7, '5CG7280HPH'),
(8, '2020-07-22', '2023-01-22', NULL, NULL, 1, 1, 8, 'G90PK13'),
(9, '2020-07-22', '2022-05-20', NULL, NULL, 1, 4, 9, '6B0DQV2'),
(10, '2020-07-22', '2024-03-23', NULL, NULL, 1, 6, 10, 'GHQ38Y2'),
(11, '2020-07-22', '2023-01-29', NULL, NULL, 1, 1, 11, 'CV2G3Z2'),
(12, '2020-07-27', '2023-06-19', NULL, NULL, 1, 1, 12, 'J40PK13'),
(13, '2020-07-30', '2022-01-09', NULL, NULL, 1, 3, 13, '9MFS7S2'),
(14, '2020-08-03', '2022-12-10', NULL, NULL, 1, 3, 14, '50Y78Y2'),
(15, '2020-08-05', '2022-01-09', NULL, NULL, 1, 1, 15, '9W1P7S2'),
(16, '2020-08-10', '2022-12-25', NULL, NULL, 1, 7, 16, '8CFJMV2'),
(17, '2020-08-13', '2020-08-28', NULL, NULL, 1, 5, 17, '5CG7280HSY'),
(18, '2020-08-13', '2020-10-19', NULL, NULL, 1, 5, 18, '5CG7280J5M'),
(19, '2020-08-13', '2022-04-09', NULL, NULL, 1, 3, 19, '8L9SXT2'),
(20, '2020-08-13', '2023-09-02', NULL, NULL, 1, 3, 20, 'BC288Y2'),
(21, '2020-08-13', '2022-11-14', NULL, NULL, 1, 3, 21, '5GW18Y2'),
(22, '2020-08-13', '2021-08-09', NULL, NULL, 1, 3, 22, 'JB1NQQ2'),
(23, '2020-08-17', '2023-06-19', NULL, NULL, 1, 1, 23, 'GLSKK13'),
(24, '2020-08-17', '2022-04-08', NULL, NULL, 1, 3, 24, 'B1ZMXT2'),
(25, '2020-08-17', '2020-10-19', NULL, NULL, 1, 5, 25, '5CG7280HRJ'),
(26, '2020-08-17', '2020-08-28', NULL, NULL, 1, 5, 26, '5CG7280JK7'),
(27, '2020-08-17', '2019-10-19', NULL, NULL, 1, 9, 27, '5CG6232LKV'),
(28, '2020-09-07', '2020-08-18', NULL, NULL, 1, 5, 28, '5CG7280HKQ'),
(29, '2020-08-17', '2022-04-18', NULL, NULL, 1, 6, 29, '4W7YMV2'),
(30, '2020-08-20', '2020-10-19', NULL, NULL, 1, 5, 30, '5CG7280HJM'),
(31, '2020-08-20', '2021-10-25', NULL, NULL, 1, 6, 31, '5M14HR2'),
(32, '2020-09-07', '2023-06-19', NULL, NULL, 1, 1, 32, '7X0PK13'),
(33, '2020-09-07', '2023-06-19', NULL, NULL, 1, 1, 33, '4S0PK13'),
(34, '2020-09-07', '2023-09-07', NULL, NULL, 1, 1, 34, '5LFM163'),
(35, '2020-09-09', '2020-10-19', NULL, NULL, 1, 5, 35, '5CG7280HW2'),
(36, '2020-09-11', '2023-09-11', NULL, NULL, 1, 1, 36, '808M163'),
(37, '2020-09-11', '2023-09-11', NULL, NULL, 1, 1, 37, 'FHFM163'),
(38, '2020-09-18', '2023-09-18', NULL, NULL, 1, 1, 38, '418M136'),
(39, '2020-09-21', '2023-09-21', NULL, NULL, 1, 1, 27, 'FY2M163'),
(40, '2020-09-21', '2020-09-21', NULL, NULL, 1, 1, 39, 'GV2M163'),
(41, '2020-09-21', '2023-09-21', NULL, NULL, 1, 1, 40, '8JFM163'),
(42, '2020-09-23', '2022-04-17', NULL, NULL, 1, 4, 41, 'H26HMV2'),
(43, '2020-09-24', '2023-09-24', NULL, NULL, 1, 1, 42, 'J5MM163'),
(44, '2020-09-24', '2022-02-21', NULL, NULL, 1, 3, 43, '47TBTT2'),
(45, '2020-09-24', '2023-09-24', NULL, NULL, 1, 1, 44, 'CNFM163'),
(46, '2020-10-23', '2023-10-23', NULL, NULL, 1, 1, 45, '418M163'),
(47, '2020-11-05', '2023-10-23', NULL, NULL, 1, 1, 46, '6H9N163'),
(48, '2021-02-08', '2023-10-23', NULL, '2021-02-08 16:14:57', 1, 1, 74, 'CT7M163'),
(49, '2020-11-16', '2023-10-10', NULL, NULL, 1, 1, 48, 'Ã¨YCGZ33'),
(50, '2020-11-16', '2023-06-19', NULL, NULL, 1, 1, 49, '240PK13'),
(51, '2020-11-16', '2023-10-10', NULL, NULL, 1, 1, 50, '7FGFZ33'),
(52, '2020-11-30', '2023-10-20', NULL, NULL, 1, 4, 51, 'FFS58Y2'),
(53, '2020-11-30', '2023-10-20', NULL, NULL, 1, 2, 52, '82DCZ33'),
(54, '2020-11-30', '2023-11-30', NULL, NULL, 1, 2, 53, '7CGFZ33'),
(55, '2020-11-30', '2023-11-30', NULL, NULL, 1, 2, 54, 'C2DCZ33'),
(56, '2020-12-14', '2023-12-14', NULL, NULL, 1, 2, 55, '9WKH573'),
(57, '2020-12-21', '2023-01-29', NULL, NULL, 1, 1, 56, 'JJXF3Z2'),
(58, '2020-12-21', '2019-01-06', NULL, NULL, 1, 9, 57, '5CG55115GX'),
(59, '2021-02-08', '2023-01-06', NULL, '2021-02-08 14:42:07', 1, 2, 70, 'JBGFZ33'),
(60, '2021-01-11', '2024-01-11', NULL, NULL, 1, 2, 59, 'J2DCZ33'),
(61, '2021-02-08', '2023-02-08', '2021-02-08 08:15:43', '2021-02-08 08:15:43', 1, 2, 60, 'B743FB3'),
(62, '2021-02-08', '2023-02-08', '2021-02-08 09:29:35', '2021-02-08 09:29:35', 1, 2, 61, 'GP93FB3'),
(63, '2021-02-08', '2023-02-08', '2021-02-08 10:00:28', '2021-02-08 10:00:28', 1, 2, 62, '5443FB3'),
(64, '2021-02-08', '2023-02-08', '2021-02-08 10:02:42', '2021-02-08 10:02:42', 1, 2, 63, '5LS4FB3'),
(65, '2021-02-08', '2023-02-08', '2021-02-08 10:12:01', '2021-02-08 10:12:01', 1, 2, 64, '55F4FB3'),
(66, '2021-02-08', '2023-02-08', '2021-02-08 10:38:20', '2021-02-08 10:38:20', 1, 2, 65, '2574FB3'),
(67, '2021-02-08', '2023-02-08', '2021-02-08 10:51:29', '2021-02-08 10:51:29', 1, 2, 66, '4308GB3'),
(68, '2021-02-08', '2023-02-08', '2021-02-08 10:52:40', '2021-02-08 10:52:40', 1, 2, 67, 'F543FB3'),
(69, '2021-02-08', '2023-02-08', '2021-02-08 10:53:45', '2021-02-08 10:53:45', 1, 2, 68, '6643FB3'),
(70, '2021-02-08', '2023-02-08', '2021-02-08 12:22:21', '2021-02-08 12:22:21', 1, 2, 69, 'BK14FB3'),
(71, '2021-02-08', '2023-02-08', '2021-02-08 15:40:22', '2021-02-08 15:40:22', 1, 2, 71, 'FH74FB3'),
(72, '2021-02-08', '2023-02-08', '2021-02-08 16:13:45', '2021-02-08 16:13:45', 1, 10, 72, 'GDJY493'),
(73, '2021-02-08', '2023-02-08', '2021-02-08 16:14:14', '2021-02-08 16:14:14', 1, 2, 73, 'JL0CZ33'),
(74, '2021-02-08', '2021-02-08', '2021-02-08 16:16:38', '2021-02-08 16:16:38', 1, 9, 75, '5CG6455CLT'),
(75, '2021-02-09', '2024-02-09', '2021-02-09 14:03:11', '2021-02-09 14:03:11', 1, 2, 76, 'B3Q5FB3'),
(76, '2021-02-15', '2021-02-15', '2021-02-15 09:41:30', '2021-02-15 09:41:30', 1, 2, 77, '1774FB3'),
(77, '2021-02-17', '2023-03-17', '2021-02-17 09:34:37', '2021-02-17 09:34:37', 1, 10, 78, '2NJY493'),
(78, '2021-02-18', '2024-07-18', '2021-02-18 08:28:10', '2021-02-18 08:28:10', 1, 2, 79, 'J4Q5FB3'),
(79, '2021-02-18', '2024-02-18', '2021-02-18 13:57:23', '2021-02-18 13:57:23', 1, 2, 80, 'JL14FB3'),
(80, '2021-02-18', '2024-02-18', '2021-02-18 15:22:24', '2021-02-18 15:22:24', 1, 2, 81, 'BM14FB3'),
(81, '2021-02-18', '2024-02-18', '2021-02-18 15:53:23', '2021-02-18 15:53:23', 1, 10, 82, '19KYM53'),
(82, '2021-02-22', '2023-06-22', '2021-02-22 11:00:26', '2021-02-22 11:00:26', 1, 11, 83, 'CH172Z2'),
(83, '2021-02-22', '2023-09-02', '2021-02-22 16:18:41', '2021-02-22 16:18:41', 1, 3, 84, '4TF28Y2'),
(85, '2021-03-04', '2024-02-04', '2021-03-04 09:32:26', '2021-03-04 09:32:26', 1, 2, 85, 'CKD6DB3'),
(86, '2021-03-04', '2024-03-04', '2021-03-04 09:49:07', '2021-03-04 09:49:07', 1, 2, 86, '9FW6DB3'),
(87, '2021-03-04', '2024-03-04', '2021-03-04 15:10:54', '2021-03-04 15:10:54', 1, 2, 87, '2H09DB3'),
(88, '2021-03-08', '2023-01-08', '2021-03-08 13:43:33', '2021-03-08 13:43:33', 1, 2, 88, 'CWB9DB3');

-- --------------------------------------------------------

--
-- Structure de la table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `sites`
--

CREATE TABLE `sites` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `libSite` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `sites`
--

INSERT INTO `sites` (`id`, `libSite`, `created_at`, `updated_at`) VALUES
(1, 'PHG', NULL, NULL),
(2, 'ROI', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `login` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `nom`, `prenom`, `login`, `created_at`, `updated_at`) VALUES
(1, 'zaimeche', 'rachid', 'rzaimeche', '2021-01-14 14:56:09', '2021-01-14 14:56:09'),
(2, 'hachemi', 'ilias', 'ihachemi', '2021-01-14 14:56:43', '2021-01-14 14:56:43'),
(3, 'maguet', 'louis', 'lmaguet', '2021-01-14 14:57:39', '2021-01-14 14:57:39'),
(4, 'guillot', 'emma', 'eguillot', '2021-01-14 14:58:08', '2021-01-14 14:58:08'),
(5, 'sanchez', 'véra', 'vsanchez', '2021-01-14 14:58:27', '2021-01-14 14:58:27'),
(6, 'mikheev', 'egor', 'emikheev', '2021-01-14 14:58:55', '2021-01-14 14:58:55'),
(7, 'tchagaspanian', 'michel', 'mtchagaspanian', '2021-01-14 14:59:20', '2021-01-14 14:59:20'),
(8, 'faure', 'claude', 'cfaure', '2021-01-14 15:07:58', '2021-01-14 15:07:58'),
(9, 'mezibridskij', 'filip', 'fmezibridskij', '2021-01-14 15:08:27', '2021-01-14 15:08:27'),
(10, 'andre', 'maxime', 'mandre', '2021-01-14 15:08:47', '2021-01-14 15:08:47'),
(11, 'batzenschlager', 'min', 'mbatzenschlager', '2021-01-14 15:08:58', '2021-01-14 15:08:58'),
(12, 'pelzer', 'karine', 'kpelzer', '2021-01-14 15:09:10', '2021-01-14 15:09:10'),
(13, 'pierre', 'dominique', 'dpierre', '2021-01-14 15:09:39', '2021-01-14 15:09:39'),
(14, 'siefert', 'stéphane', 'ssiefert', '2021-01-14 15:10:09', '2021-01-14 15:10:09'),
(15, 'luce', 'kristina', 'kluce', '2021-01-14 15:10:23', '2021-01-14 15:10:23'),
(16, 'cousin', 'lucas', 'lcousin', '2021-01-14 15:10:33', '2021-01-14 15:10:33'),
(17, 'naiken', 'allan', 'anaiken', '2021-01-14 15:10:44', '2021-01-14 15:10:44'),
(18, 'abdollahzadeh', 'kasra', 'kabdollahzadeh', '2021-01-14 15:10:57', '2021-01-14 15:10:57'),
(19, 'schmidt', 'simon', 'sischmidt', '2021-01-14 15:11:22', '2021-01-14 15:11:22'),
(20, 'mcclymont', 'gauthier', 'gmcclymont', '2021-01-14 15:11:44', '2021-01-14 15:11:44'),
(21, 'ckeime', 'caroline', 'cckeime', '2021-01-14 15:12:08', '2021-01-14 15:12:08'),
(22, 'hakimi', 'mounir', 'mhakimi', '2021-01-14 15:12:29', '2021-01-14 15:12:29'),
(23, 'cherion', 'nicolas', 'ncherion', '2021-01-14 15:12:40', '2021-01-14 15:12:40'),
(24, 'grasser', 'emeline', 'egrasser', '2021-01-14 15:13:05', '2021-01-14 15:13:05'),
(25, 'grobecker', 'dominique', 'dgrobecker', '2021-01-14 15:13:30', '2021-01-14 15:13:30'),
(26, 'piaucarretero', 'julien', 'jpiaucarretero', '2021-01-14 15:13:43', '2021-01-14 15:13:43'),
(27, 'kail', 'julia', 'jkail', '2021-01-14 15:13:56', '2021-01-14 15:13:56'),
(28, 'feith', 'nicolas', 'nfeith', '2021-01-15 15:10:40', '2021-01-15 15:10:40'),
(29, 'peltier', 'caroline', 'cpeltier', NULL, NULL),
(30, 'puygrenier', 'solann', 'spuygrenier', NULL, NULL),
(31, 'cezard', 'léa', 'lcezard', NULL, NULL),
(32, 'beauvais', 'alexandre', 'abeauvais', NULL, NULL),
(33, 'treuschel', 'julien', 'jtreuschel', NULL, NULL),
(34, 'rupp', 'nathan', 'nrupp', NULL, NULL),
(35, 'roux', 'sabine', 'saroux', NULL, NULL),
(36, 'belmejdoub', 'mohammed yassine', 'mbelmejdoub', NULL, NULL),
(37, 'cordier', 'florian', 'flcordier', NULL, NULL),
(38, 'ignoto', 'thomas', 'tignoto', NULL, NULL),
(39, 'pinel', 'tristan', 'tpinel', NULL, NULL),
(40, 'lebiller', 'pauline', 'plebiller', NULL, NULL),
(41, 'galland', 'dominique', 'dgalland', NULL, NULL),
(42, 'bracigliano', 'gennaro', 'gbracigliano', NULL, NULL),
(43, 'ce', 'ce', 'ce', NULL, NULL),
(44, 'aitali', 'anas', 'aaitali', NULL, NULL),
(45, 'blot', 'jérôme', 'jblot', NULL, NULL),
(46, 'sans', 'jean-philippe', 'jsans', NULL, NULL),
(47, 'grass', 'floriane', 'fgrass', NULL, NULL),
(48, 'heller', 'mathieu', 'mheller', NULL, NULL),
(49, 'rio', 'élodie', 'erio', NULL, NULL),
(50, 'noel', 'lucy', 'lunoel', NULL, NULL),
(51, 'touati', 'noureddine', 'ntouati', NULL, NULL),
(52, 'marchal', 'frédéric', 'fmarchal', NULL, NULL),
(53, 'frey', 'audric', 'afrey', NULL, NULL),
(54, 'oboyle', 'michael', 'moboyle', NULL, NULL),
(55, 'dehongher', 'maxime', 'mdehongher', NULL, NULL),
(56, 'bastian', 'marie', 'mbastian', NULL, NULL),
(57, 'bisson', 'andréa', 'abisson', NULL, NULL),
(58, 'kern', 'louis', 'lkern', NULL, NULL),
(59, 'cesse', 'alicia', 'acesse', NULL, NULL),
(60, 'huyghe', 'chloé', 'chuyghe', '2021-02-08 08:15:43', '2021-02-08 08:15:43'),
(61, 'sarter', 'manuel', 'msarter', '2021-02-08 09:29:35', '2021-02-08 09:29:35'),
(62, 'apostolova riehl', 'nikolina', 'napostolova', '2021-02-08 10:00:28', '2021-02-08 10:00:28'),
(63, 'aarnink', 'manon', 'maarnink', '2021-02-08 10:02:42', '2021-02-08 10:02:42'),
(64, 'demanze', 'frank', 'fdemanze', '2021-02-08 10:12:01', '2021-02-08 10:12:01'),
(65, 'carbillet', 'sarah', 'scarbillet', '2021-02-08 10:38:20', '2021-02-08 10:38:20'),
(66, 'schenker', 'jean-marc', 'jschenker', '2021-02-08 10:51:29', '2021-02-08 10:51:29'),
(67, 'santos', 'jessica', 'jsantos', '2021-02-08 10:52:40', '2021-02-08 10:52:40'),
(68, 'creteur', 'benjamin', 'bcreteur', '2021-02-08 10:53:45', '2021-02-08 10:53:45'),
(69, 'boulmer', 'jezekael', 'jboulmer', '2021-02-08 12:22:21', '2021-02-08 12:22:21'),
(70, 'dillenschneider', 'laurent', 'ldillenschneider', '2021-02-08 14:42:07', '2021-02-08 14:42:07'),
(71, 'carradot', 'stéphanie', 'scarradot', '2021-02-08 15:40:22', '2021-02-08 15:40:22'),
(72, 'de bortoli', 'yannick', 'ydebortoli', '2021-02-08 16:13:45', '2021-02-08 16:13:45'),
(73, 'motte', 'olivier', 'omotte', '2021-02-08 16:14:14', '2021-02-08 16:14:14'),
(74, 'maati', 'marjany', 'mmaati', '2021-02-08 16:14:57', '2021-02-08 16:14:57'),
(75, 'schaerz', 'stéphanie', 'sschaerz', '2021-02-08 16:16:38', '2021-02-08 16:16:38'),
(76, 'etienne', 'françois', 'fraetienne', '2021-02-09 14:03:11', '2021-02-09 14:03:11'),
(77, 'dorofeev', 'alexandre', 'alexdorofeev', '2021-02-15 09:41:30', '2021-02-15 09:41:30'),
(78, 'ann', 'alexandre', 'aann', '2021-02-17 09:34:37', '2021-02-17 09:34:37'),
(79, 'janus', 'olivier', 'ojanus', '2021-02-18 08:28:10', '2021-02-18 08:28:10'),
(80, 'louche', 'jean-michel', 'jlouche', '2021-02-18 13:57:23', '2021-02-18 13:57:23'),
(81, 'helmstetter', 'thomas', 'thelmstetter', '2021-02-18 15:22:24', '2021-02-18 15:22:24'),
(82, 'maillier', 'julien', 'jmaillier', '2021-02-18 15:53:23', '2021-02-18 15:53:23'),
(83, 'beckerich', 'christophe', 'cbeckerich', '2021-02-22 11:00:26', '2021-02-22 11:00:26'),
(84, 'michal', 'karpowicz', 'kmichal', '2021-02-22 16:18:41', '2021-02-22 16:18:41'),
(85, 'schmitt', 'frederic', 'fschmitt', '2021-03-04 09:32:26', '2021-03-04 09:32:26'),
(86, 'zimmermann', 'marie', 'mzimmermann', '2021-03-04 09:49:07', '2021-03-04 09:49:07'),
(87, 'schwey', 'virgile', 'vschwey', '2021-03-04 15:10:54', '2021-03-04 15:10:54'),
(88, 'bisval', 'charles', 'chbisval', '2021-03-08 13:43:33', '2021-03-08 13:43:33');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `modeles`
--
ALTER TABLE `modeles`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `parcs`
--
ALTER TABLE `parcs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_numSerie` (`numSerie`),
  ADD KEY `parcs_idsite_foreign` (`idSite`),
  ADD KEY `parcs_idmodele_foreign` (`idModele`),
  ADD KEY `parcs_idutilisateur_foreign` (`idUtilisateur`);

--
-- Index pour la table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Index pour la table `sites`
--
ALTER TABLE `sites`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT pour la table `modeles`
--
ALTER TABLE `modeles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT pour la table `parcs`
--
ALTER TABLE `parcs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;
--
-- AUTO_INCREMENT pour la table `sites`
--
ALTER TABLE `sites`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `parcs`
--
ALTER TABLE `parcs`
  ADD CONSTRAINT `parcs_idmodele_foreign` FOREIGN KEY (`idModele`) REFERENCES `modeles` (`id`),
  ADD CONSTRAINT `parcs_idsite_foreign` FOREIGN KEY (`idSite`) REFERENCES `sites` (`id`),
  ADD CONSTRAINT `parcs_idutilisateur_foreign` FOREIGN KEY (`idUtilisateur`) REFERENCES `utilisateurs` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

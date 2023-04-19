-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 23 fév. 2023 à 15:04
-- Version du serveur : 5.7.36
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `kyc_portail_captif`
--

-- --------------------------------------------------------

--
-- Structure de la table `administrateur`
--

DROP TABLE IF EXISTS `administrateur`;
CREATE TABLE IF NOT EXISTS `administrateur` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `mot_passe` text NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`,`user_name`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `administrateur`
--

INSERT INTO `administrateur` (`id`, `email`, `user_name`, `mot_passe`) VALUES
(1, 'api_paypal@gmail.com', 'admin', '$2y$10$faSzO/3WyTJ4WxiIGHOMfewYSDWokKs6nlxvLEDDgowFHA7ce443O');

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

DROP TABLE IF EXISTS `client`;
CREATE TABLE IF NOT EXISTS `client` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) DEFAULT NULL,
  `quartier` varchar(225) NOT NULL,
  `email` varchar(255) NOT NULL,
  `tel` varchar(15) NOT NULL,
  `datenaiss` DATE,
  `ip` varchar(255) NOT NULL,
  `mac` varchar(255) NOT NULL,
  `host` varchar(255) NOT NULL,
  `port` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`id`, `nom`, `prenom`, `quartier`, `email`, `tel`,`datenaiss`, `ip`, `mac`, `host`, `port`) VALUES
(1, 'Ebiguetie yen', 'Simon pierre', 'Pariso', 'ebiguetiesimon@gmail.com', '655566264','2021-04-01', '192.168.137.1', '00-15-5D-B4-4E-5D', 'DESKTOP-FI4ACGG.mshome.net', '63267');

-- --------------------------------------------------------

--
-- Structure de la table `historique`
--

DROP TABLE IF EXISTS `historique`;
CREATE TABLE IF NOT EXISTS `historique` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `action` text NOT NULL,
  `auteur` varchar(255) NOT NULL,
  `dates` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=169 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `historique`
--

INSERT INTO `historique` (`id`, `action`, `auteur`, `dates`) VALUES
(1, 'La catégorie de boutique #6 Alimentation et boissons a été modifiée.', 'L´administrateur admin', '2023-02-11 15:41:06'),
(2, 'La catégorie d´articles #11 Boissons a été ajoutée.', 'L´administrateur admin', '2023-02-11 16:03:26'),
(3, 'La catégorie d´articles #12 Repas a été ajoutée.', 'L´administrateur admin', '2023-02-11 16:03:49'),
(4, 'La boutique #1 Tel Shopping a été ajoutée.', 'L´administrateur admin', '2023-02-11 18:22:01'),
(5, 'La boutique #2 Big Bugger a été ajoutée.', 'L´administrateur admin', '2023-02-11 18:26:13'),
(6, 'La boutique #3 Lisette Cosmetic a été ajoutée.', 'L´administrateur admin', '2023-02-11 18:27:37'),
(7, 'La boutique #4 IPHONE Store a été ajoutée.', 'L´administrateur admin', '2023-02-11 18:29:07'),
(8, 'La boutique #5 TV SMART SHOP a été ajoutée.', 'L´administrateur admin', '2023-02-11 18:34:53'),
(9, 'La boutique #1 Tel Shopping a été modifiée.', 'L´administrateur admin', '2023-02-11 18:54:31'),
(10, 'La boutique #1 Tel Shopping a été desactivée.', 'L´administrateur admin', '2023-02-11 18:54:50'),
(11, 'La boutique #1 Tel Shopping a été activée.', 'L´administrateur admin', '2023-02-11 18:55:06'),
(12, 'L´article #1 Jus Ananas a été ajouté.', 'La boutique Big Bugger', '2023-02-12 01:21:32'),
(13, 'L´article #2 Jus orange a été ajouté.', 'La boutique Big Bugger', '2023-02-12 01:22:03'),
(14, 'L´article #3 Big Bugger a été ajouté.', 'La boutique Big Bugger', '2023-02-12 01:22:42'),
(15, 'L´article #4 Jus djino a été ajouté.', 'La boutique Big Bugger', '2023-02-12 01:23:21'),
(16, 'L´article #5 Burger Soft a été ajouté.', 'La boutique Big Bugger', '2023-02-12 01:24:24'),
(17, 'L´article #6 Super Burger a été ajouté.', 'La boutique Big Bugger', '2023-02-12 01:24:58'),
(18, 'L´article #7 Jus Coca cola a été ajouté.', 'La boutique Big Bugger', '2023-02-12 01:25:32'),
(19, 'L´article #8 Jus Ananas a été ajouté.', 'La boutique Big Bugger', '2023-02-12 01:26:03'),
(20, 'L´article #9 Shawarma a été ajouté.', 'La boutique Big Bugger', '2023-02-12 01:26:46'),
(21, 'L´article #10 shawama extra a été ajouté.', 'La boutique Big Bugger', '2023-02-12 01:27:32'),
(22, 'L´article #11 Shawama big a été ajouté.', 'La boutique Big Bugger', '2023-02-12 01:28:07'),
(23, 'L´article #12 Special pamplemous a été ajouté.', 'La boutique Big Bugger', '2023-02-12 01:28:52'),
(24, 'L´article #13 Eau vitale a été ajouté.', 'La boutique Big Bugger', '2023-02-12 01:29:21'),
(25, 'L´article #14 Tecno camon 12 a été ajouté.', 'La boutique IPHONE Store', '2023-02-12 02:21:21'),
(26, 'L´article #15 Oppo note 2 a été ajouté.', 'La boutique IPHONE Store', '2023-02-12 02:21:54'),
(27, 'L´article #16 Tecno Spark 2 a été ajouté.', 'La boutique IPHONE Store', '2023-02-12 02:22:39'),
(28, 'L´article #17 Honor 70 a été ajouté.', 'La boutique IPHONE Store', '2023-02-12 02:23:18'),
(29, 'L´article #18 Infinix hot 6 a été ajouté.', 'La boutique IPHONE Store', '2023-02-12 02:23:53'),
(30, 'L´article #19 Huawei p40 pro a été ajouté.', 'La boutique IPHONE Store', '2023-02-12 02:24:27'),
(31, 'L´article #20 Redmi note 12 a été ajouté.', 'La boutique IPHONE Store', '2023-02-12 02:25:05'),
(32, 'L´article #21 Redmi 8 a été ajouté.', 'La boutique IPHONE Store', '2023-02-12 02:25:43'),
(33, 'L´article #22 Infinix hot 10 a été ajouté.', 'La boutique IPHONE Store', '2023-02-12 02:26:39'),
(34, 'L´article #23 Infinix hot 12 i a été ajouté.', 'La boutique IPHONE Store', '2023-02-12 02:27:22'),
(35, 'L´article #24 Infinix smart 5 a été ajouté.', 'La boutique IPHONE Store', '2023-02-12 02:28:07'),
(36, 'L´article #25 Infinix Zero a été ajouté.', 'La boutique IPHONE Store', '2023-02-12 02:28:41'),
(37, 'L´article #26 Itel S16 a été ajouté.', 'La boutique IPHONE Store', '2023-02-12 02:29:25'),
(38, 'L´article #27 Techno camon 19 a été ajouté.', 'La boutique IPHONE Store', '2023-02-12 02:30:12'),
(39, 'L´article #28 Hp DV30 a été ajouté.', 'La boutique IPHONE Store', '2023-02-12 02:30:51'),
(40, 'L´article #29 Lonovo B500 a été ajouté.', 'La boutique IPHONE Store', '2023-02-12 02:31:34'),
(41, 'L´article #30 TV 32 Pouce Hisence android a été ajouté.', 'La boutique IPHONE Store', '2023-02-12 02:32:34'),
(42, 'L´article #31 Frigo GT 258 a été ajouté.', 'La boutique IPHONE Store', '2023-02-12 02:33:19'),
(43, 'L´article #32 Frigo Cool Frezer a été ajouté.', 'La boutique IPHONE Store', '2023-02-12 02:34:00'),
(44, 'L´article #33 TV Smart 65 a été ajouté.', 'La boutique IPHONE Store', '2023-02-12 02:34:34'),
(45, 'L´article #34 Smart 75 a été ajouté.', 'La boutique IPHONE Store', '2023-02-12 02:35:14'),
(46, 'L´article #35 Samsung S10 a été ajouté.', 'La boutique IPHONE Store', '2023-02-12 11:37:31'),
(47, 'L´article #36 LG Smart 43 a été ajouté.', 'La boutique IPHONE Store', '2023-02-12 11:38:17'),
(48, 'L´article #37 Hisense a été ajouté.', 'La boutique IPHONE Store', '2023-02-12 11:38:54'),
(49, 'L´article #38 TV Delta a été ajouté.', 'La boutique IPHONE Store', '2023-02-12 11:39:41'),
(50, 'L´article #30 TV 32 Pouce Hisence android a été modifié.', 'La boutique IPHONE Store', '2023-02-12 12:00:41'),
(51, 'L´article #30 TV 32 Pouce Hisence android a été desactivée.', 'La boutique IPHONE Store', '2023-02-12 12:01:59'),
(52, 'L´article #39 Honor 70 a été ajouté.', 'La boutique Tel Shopping', '2023-02-12 12:09:05'),
(53, 'L´article #40 Infinix Zero a été ajouté.', 'La boutique Tel Shopping', '2023-02-12 12:09:41'),
(54, 'L´article #41 Oppo 96 a été ajouté.', 'La boutique IPHONE Store', '2023-02-12 12:11:10'),
(55, 'L´article #42 Honor 70 a été ajouté.', 'La boutique TV SMART SHOP', '2023-02-12 12:55:35'),
(56, 'L´article #43 TV Smart 32 a été ajouté.', 'La boutique TV SMART SHOP', '2023-02-12 12:56:30'),
(57, 'L´article #44 Oppo Note a été ajouté.', 'La boutique TV SMART SHOP', '2023-02-12 12:56:58'),
(58, 'L´article #45 HP Delta a été ajouté.', 'La boutique TV SMART SHOP', '2023-02-12 12:57:40'),
(59, 'L´article #46 Huawei P40 a été ajouté.', 'La boutique TV SMART SHOP', '2023-02-12 12:58:24'),
(60, 'L´article #47 Innova 32 a été ajouté.', 'La boutique TV SMART SHOP', '2023-02-12 12:59:06'),
(61, 'L´article #48 LG TV a été ajouté.', 'La boutique TV SMART SHOP', '2023-02-12 12:59:38'),
(62, 'L´article #49 LG Smart 65 a été ajouté.', 'La boutique TV SMART SHOP', '2023-02-12 13:00:19'),
(63, 'L´article #50 TV Roch a été ajouté.', 'La boutique TV SMART SHOP', '2023-02-12 13:00:54'),
(64, 'L´article #51 LG 55 a été ajouté.', 'La boutique TV SMART SHOP', '2023-02-12 13:01:43'),
(65, 'L´article #52 Roch 55 a été ajouté.', 'La boutique TV SMART SHOP', '2023-02-12 13:02:31'),
(66, 'L´article #53 TV Fold a été ajouté.', 'La boutique TV SMART SHOP', '2023-02-12 13:03:20'),
(67, 'L´article #54 Smart Delta 43 a été ajouté.', 'La boutique TV SMART SHOP', '2023-02-12 13:03:58'),
(68, 'L´article #55 Smart innova 65 a été ajouté.', 'La boutique TV SMART SHOP', '2023-02-12 13:04:38'),
(69, 'L´article #56 Hisense 43 a été ajouté.', 'La boutique TV SMART SHOP', '2023-02-12 13:05:12'),
(70, 'L´article #57 Hisense 55 a été ajouté.', 'La boutique TV SMART SHOP', '2023-02-12 13:05:54'),
(71, 'L´article #58 Hisense 58 a été ajouté.', 'La boutique TV SMART SHOP', '2023-02-12 13:06:41'),
(72, 'L´article #59 Hisense 75 a été ajouté.', 'La boutique TV SMART SHOP', '2023-02-12 13:07:10'),
(73, 'L´article #60 Innova 32 Android 12 a été ajouté.', 'La boutique TV SMART SHOP', '2023-02-12 13:07:48'),
(74, 'L´article #61 Innova 43 a a été ajouté.', 'La boutique TV SMART SHOP', '2023-02-12 13:08:22'),
(75, 'L´article #62 Innova 50 a été ajouté.', 'La boutique TV SMART SHOP', '2023-02-12 13:09:15'),
(76, 'L´article #63 Samsung a été ajouté.', 'La boutique TV SMART SHOP', '2023-02-12 13:10:08'),
(77, 'L´article #64 Roch 4K a été ajouté.', 'La boutique TV SMART SHOP', '2023-02-12 13:10:53'),
(78, 'L´article #65 Oscar 43 a été ajouté.', 'La boutique TV SMART SHOP', '2023-02-12 13:11:25'),
(79, 'L´article #66 TLC 40 a été ajouté.', 'La boutique TV SMART SHOP', '2023-02-12 13:12:03'),
(80, 'L´article #67 Toshiba 50 a été ajouté.', 'La boutique TV SMART SHOP', '2023-02-12 13:12:57'),
(81, 'L´article #68 Toshiba 43 a été ajouté.', 'La boutique TV SMART SHOP', '2023-02-12 13:13:44'),
(82, 'L´article #69 Sharp 43 a été ajouté.', 'La boutique TV SMART SHOP', '2023-02-12 13:14:20'),
(83, 'L´article #70 Smart 43 a été ajouté.', 'La boutique TV SMART SHOP', '2023-02-12 13:15:08'),
(84, 'L´article #71 Smart plus 32 a été ajouté.', 'La boutique TV SMART SHOP', '2023-02-12 13:16:35'),
(85, 'L´article #72 Innova a40 50 a été ajouté.', 'La boutique TV SMART SHOP', '2023-02-12 13:17:18'),
(86, 'L´article #73 Sony 32 a été ajouté.', 'La boutique TV SMART SHOP', '2023-02-12 13:18:06'),
(87, 'L´article #74 Oscar 65 a été ajouté.', 'La boutique TV SMART SHOP', '2023-02-12 13:18:41'),
(88, 'L´article #75 Sony 43 a été ajouté.', 'La boutique TV SMART SHOP', '2023-02-12 13:19:17'),
(89, 'L´article #76 Sony 43i a été ajouté.', 'La boutique TV SMART SHOP', '2023-02-12 13:20:11'),
(90, 'L´article #77 Sony 43 a été ajouté.', 'La boutique TV SMART SHOP', '2023-02-12 13:20:46'),
(91, 'L´article #78 Sony kd 70 a été ajouté.', 'La boutique TV SMART SHOP', '2023-02-12 13:21:58'),
(92, 'L´article #79 innova 50 a été ajouté.', 'La boutique TV SMART SHOP', '2023-02-12 13:22:38'),
(93, 'L´article #80 The ordinary Anti age a été ajouté.', 'La boutique Lisette Cosmetic', '2023-02-12 13:34:35'),
(94, 'L´article #81 Pack Pelling a été ajouté.', 'La boutique Lisette Cosmetic', '2023-02-12 13:35:12'),
(95, 'L´article #82 Acide Glycolique a été ajouté.', 'La boutique Lisette Cosmetic', '2023-02-12 13:35:44'),
(96, 'L´article #83 Acide Glucolique Tonique a été ajouté.', 'La boutique Lisette Cosmetic', '2023-02-12 13:36:23'),
(97, 'Connexion à l´espace administrateur', 'L´administrateur admin', '2023-02-13 10:38:20'),
(98, 'Connexion à l´espace boutique', 'La boutique Big Bugger', '2023-02-13 10:38:59'),
(99, 'Connexion à l´espace boutique', 'La boutique Big Bugger', '2023-02-13 11:07:40'),
(100, 'Connexion à l´espace administrateur', 'L´administrateur admin', '2023-02-13 14:58:37'),
(101, 'La boutique #4 IPHONE Store a été modifiée.', 'L´administrateur admin', '2023-02-13 15:05:40'),
(102, 'La boutique #4 IPHONE Store a été modifiée.', 'L´administrateur admin', '2023-02-13 15:05:55'),
(103, 'Connexion à l´espace boutique', 'La boutique IPHONE Store', '2023-02-13 15:06:35'),
(104, 'La boutique #4 IPHONE Store a été modifiée.', 'L´administrateur admin', '2023-02-13 15:07:06'),
(105, 'Connexion à l´espace boutique', 'La boutique IPHONE Store', '2023-02-13 15:07:40'),
(106, 'La boutique #4 IPHONE Store a été modifiée.', 'L´administrateur admin', '2023-02-13 15:07:54'),
(107, 'Connexion à l´espace boutique', 'La boutique IPHONE Store', '2023-02-13 15:08:11'),
(108, 'Connexion à l´espace administrateur', 'L´administrateur admin', '2023-02-13 16:26:28'),
(109, 'Connexion à l´espace administrateur', 'L´administrateur admin', '2023-02-13 16:35:23'),
(110, 'Connexion à l´espace administrateur', 'L´administrateur admin', '2023-02-13 16:41:33'),
(111, 'Connexion à l´espace administrateur', 'L´administrateur admin', '2023-02-13 17:21:20'),
(112, 'Connexion à l´espace administrateur', 'L´administrateur admin', '2023-02-13 17:46:11'),
(113, 'Connexion à l´espace administrateur', 'L´administrateur admin', '2023-02-13 18:00:38'),
(114, 'Connexion à l´espace administrateur', 'L´administrateur admin', '2023-02-14 08:39:04'),
(115, 'Connexion à l´espace administrateur', 'L´administrateur admin', '2023-02-14 08:40:21'),
(116, 'Connexion à l´espace boutique', 'La boutique IPHONE Store', '2023-02-14 08:42:45'),
(117, 'Connexion à l´espace administrateur', 'L´administrateur admin', '2023-02-14 12:13:52'),
(118, 'Connexion à l´espace administrateur', 'L´administrateur admin', '2023-02-14 12:14:27'),
(119, 'Connexion à l´espace administrateur', 'L´administrateur admin', '2023-02-14 16:46:43'),
(120, 'L´offre #1 Offre 1 a été ajoutée.', 'L´administrateur admin', '2023-02-14 17:02:52'),
(121, 'L´offre #1 Offre 1 update a été modifiée.', 'L´administrateur admin', '2023-02-14 17:04:30'),
(122, 'L´offre #2 Offre 2 a été ajoutée.', 'L´administrateur admin', '2023-02-14 17:04:54'),
(123, 'L´offre #2  a été supprimée.', 'L´administrateur admin', '2023-02-14 17:05:10'),
(124, 'L´offre #1  a été supprimée.', 'L´administrateur admin', '2023-02-14 17:06:07'),
(125, 'L´offre #3 Offre 1 a été ajoutée.', 'L´administrateur admin', '2023-02-14 17:06:49'),
(126, 'L´offre #4 Kakotel HOT a été ajoutée.', 'L´administrateur admin', '2023-02-14 17:08:30'),
(127, 'L´offre #4 4 a été supprimée.', 'L´administrateur admin', '2023-02-14 17:08:37'),
(128, 'Connexion à l´espace administrateur', 'L´administrateur admin', '2023-02-16 11:01:51'),
(129, 'Connexion à l´espace administrateur', 'L´administrateur admin', '2023-02-16 14:51:22'),
(130, 'Connexion à l´espace administrateur', 'L´administrateur admin', '2023-02-17 09:35:51'),
(131, 'Connexion à l´espace administrateur', 'L´administrateur admin', '2023-02-17 10:35:41'),
(132, 'Connexion à l´espace administrateur', 'L´administrateur admin', '2023-02-17 10:37:51'),
(133, 'Connexion à l´espace administrateur', 'L´administrateur admin', '2023-02-17 10:37:59'),
(134, 'Connexion à l´espace administrateur', 'L´administrateur admin', '2023-02-17 10:38:29'),
(135, 'Connexion à l´espace administrateur', 'L´administrateur admin', '2023-02-17 10:39:03'),
(136, 'Connexion à l´espace administrateur', 'L´administrateur admin', '2023-02-17 10:39:09'),
(137, 'Connexion à l´espace administrateur', 'L´administrateur admin', '2023-02-17 10:40:07'),
(138, 'Connexion à l´espace administrateur', 'L´administrateur admin', '2023-02-17 10:40:41'),
(139, 'Connexion à l´espace boutique', 'La boutique TV SMART SHOP', '2023-02-17 16:17:49'),
(140, 'L´article #56 Hisense 43 a été desactivée.', 'La boutique TV SMART SHOP', '2023-02-17 16:20:11'),
(141, 'Connexion à l´espace administrateur', 'L´administrateur admin', '2023-02-17 16:21:26'),
(142, 'Connexion à l´espace administrateur', 'L´administrateur admin', '2023-02-19 13:59:10'),
(143, 'Connexion à l´espace administrateur', 'L´administrateur admin', '2023-02-19 17:10:49'),
(144, 'La boutique #4 IPHONE Store a été modifiée.', 'L´administrateur admin', '2023-02-19 17:33:18'),
(145, 'La boutique #4 IPHONE Store a été modifiée.', 'L´administrateur admin', '2023-02-19 17:36:58'),
(146, 'La boutique #3 Lisette Cosmetic a été modifiée.', 'L´administrateur admin', '2023-02-19 17:42:16'),
(147, 'La boutique #4 IPHONE Store a été modifiée.', 'L´administrateur admin', '2023-02-19 18:59:39'),
(148, 'La boutique #1 Tel Shopping a été modifiée.', 'L´administrateur admin', '2023-02-19 19:19:45'),
(149, 'La boutique #2 Big Bugger a été modifiée.', 'L´administrateur admin', '2023-02-19 19:22:37'),
(150, 'La boutique #2 Big Bugger a été modifiée.', 'L´administrateur admin', '2023-02-19 19:32:08'),
(151, 'La boutique #2 Big Bugger a été modifiée.', 'L´administrateur admin', '2023-02-19 19:37:09'),
(152, 'La boutique #3 Lisette Cosmetic a été modifiée.', 'L´administrateur admin', '2023-02-19 19:53:20'),
(153, 'Connexion à l´espace administrateur', 'L´administrateur admin', '2023-02-19 19:55:10'),
(154, 'La boutique #3 Lisette Cosmetic a été modifiée.', 'L´administrateur admin', '2023-02-19 19:55:22'),
(155, 'La boutique #5 TV SMART SHOP a été modifiée.', 'L´administrateur admin', '2023-02-19 20:03:28'),
(156, 'Connexion à l´espace administrateur', 'L´administrateur admin', '2023-02-21 12:02:38'),
(157, 'Connexion à l´espace boutique', 'La boutique TV SMART SHOP', '2023-02-21 12:05:17'),
(158, 'La catégorie de boutique #12 c1 a été ajoutée.', 'L´administrateur admin', '2023-02-21 12:07:53'),
(159, 'La catégorie de boutique #13 c2 a été ajoutée.', 'L´administrateur admin', '2023-02-21 12:08:02'),
(160, 'La catégorie de boutique #14 cccccccccccccccccccccccccccccccccccccc88888888888888888888 a été ajoutée.', 'L´administrateur admin', '2023-02-21 12:08:19'),
(161, 'La catégorie de boutique #15 cvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvv777777 a été ajoutée.', 'L´administrateur admin', '2023-02-21 12:08:36'),
(162, 'La catégorie de boutique #7 Electronique a été supprimée.', 'L´administrateur admin', '2023-02-21 12:21:40'),
(163, 'Connexion à l´espace administrateur', 'L´administrateur admin', '2023-02-21 22:08:33'),
(164, 'Connexion à l´espace administrateur', 'L´administrateur admin', '2023-02-22 14:29:51'),
(165, 'La catégorie de boutique #12 c1 a été supprimée.', 'L´administrateur admin', '2023-02-22 14:30:01'),
(166, 'La catégorie de boutique #13 c2 a été supprimée.', 'L´administrateur admin', '2023-02-22 14:30:05'),
(167, 'La catégorie de boutique #14 cccccccccccccccccccccccccccccccccccccc88888888888888888888 a été supprimée.', 'L´administrateur admin', '2023-02-22 14:30:09'),
(168, 'La catégorie de boutique #15 cvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvv777777 a été supprimée.', 'L´administrateur admin', '2023-02-22 14:30:13');

-- -----------------------------------------------------------------------

--
-- Structure de la table `parametres`
--

DROP TABLE IF EXISTS `parametres`;
CREATE TABLE IF NOT EXISTS `parametres` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cle` varchar(255) NOT NULL,
  `valeur` text NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `cle` (`cle`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `parametres`
--

INSERT INTO `parametres` (`id`, `cle`, `valeur`) VALUES
(1, 'site_url', 'http://192.168.137.1/portail/'),
(2, 'paypal', '0'),
(3, 'orange_money', '0'),
(4, 'mtn_money', '0'),
(5, 'perfect_pay', '0'),
(6, 'paypal_client_id', 'AUC-qN97jE9DNf-FxpAJ4I2UXgK02Ue_wlT2-YXlzJKInvbuwpUL0492ajelAoQ0EJDFHMpMc8q4CtsW'),
(7, 'paypal_key_secrete', 'ELADEIJl57A9JXWfhI57QYwl9r2fesLiTVB88dQRiSgdsG1KhIXHwEEwkEmjBgjiy4ux5C3JOx4dxVTt'),
(8, 'slider1', '1676815221_a1-supermarket-local-products.jpg'),
(9, 'slider2', '1676815487_slider2.jpg'),
(10, 'counter_video', '15');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

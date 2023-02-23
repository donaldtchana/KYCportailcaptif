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
-- Base de données : `portail_captif`
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
-- Structure de la table `article`
--

DROP TABLE IF EXISTS `article`;
CREATE TABLE IF NOT EXISTS `article` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_boutique` int(11) NOT NULL,
  `cat` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prix` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `stock` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=84 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `article`
--

INSERT INTO `article` (`id`, `id_boutique`, `cat`, `nom`, `prix`, `image`, `stock`, `status`) VALUES
(1, 2, 11, 'Jus Ananas', 750, '1676161292_2019-02-07_18-25-40_16-min.jpg', 50, 1),
(2, 2, 11, 'Jus orange', 750, '1676161323_2019-02-10_19-59-30_planet_orange-min.jpg', 80, 1),
(3, 2, 12, 'Big Bugger', 2500, '1676161362_bigstock-Hamburger-And-French-Fries-263887-min.jpg', 200, 1),
(4, 2, 11, 'Jus djino', 750, '1676161401_d_jino-min.jpg', 40, 1),
(5, 2, 12, 'Burger Soft', 3000, '1676161464_DC_202006_0003_Cheeseburger_StraightBun_832x472_1-3-product-tile-desktop-min.jpg', 10, 1),
(6, 2, 12, 'Super Burger', 3500, '1676161498_image_3328_400-min.jpg', 25, 1),
(7, 2, 11, 'Jus Coca cola', 1000, '1676161532_jus_gazeux_-_cocacola_-_1l_x6_-_brasserie_-_bouteille_plastique-min.jpg', 20, 1),
(8, 2, 11, 'Jus Ananas', 1000, '1676161563_jus_gazeux_Top-Ananas_1l_x6_-_brasserie_-_bouteille_plastique-Saamea-min.jpg', 25, 1),
(9, 2, 12, 'Shawarma', 2000, '1676161605_shawarma-chichken-doner-isolé-sur-fond-blanc-le-poulet-dans-du-frit-emballé-pita-de-la-tomate-fraîche-concombre-concept-158360837-min.jpg', 15, 1),
(10, 2, 12, 'shawama extra', 2000, '1676161652_shawarma-sur-un-fond-blanc-137964782-min.jpg', 25, 1),
(11, 2, 12, 'Shawama big', 2500, '1676161687_shawarma-sur-un-fond-blanc-d-isolement-148695606-min.jpg', 25, 1),
(12, 2, 11, 'Special pamplemous', 1000, '1676161732_Special-Pamplemousse-min.jpg', 25, 1),
(13, 2, 11, 'Eau vitale', 750, '1676161761_VITALE-35-CL-min.jpg', 25, 1),
(14, 4, 3, 'Tecno camon 12', 90000, '1676164881_[CG7] TELEPHONE TECNO 128GB-min.jpg', 25, 1),
(15, 4, 3, 'Oppo note 2', 75000, '1676164914_2de88775-a9-2020__450_400-min.jpeg', 20, 1),
(16, 4, 3, 'Tecno Spark 2', 45000, '1676164959_0017641_tecno-spark-4-smartphone-652-pouces-4g-2go32-go-8-13mpx-bleu-garantie-12-mois_550-min.jpeg', 45, 1),
(17, 4, 3, 'Honor 70', 365000, '1676164998_honor-70-5g-256-go-8-go--min.jpg', 100, 1),
(18, 4, 3, 'Infinix hot 6', 55000, '1676165033_hot8-min.jpg', 45, 1),
(19, 4, 3, 'Huawei p40 pro', 400000, '1676165067_huawei-p40-pro-01-min.jpg', 48, 1),
(20, 4, 3, 'Redmi note 12', 220000, '1676165105_images (1)-min.jpg', 20, 1),
(21, 4, 3, 'Redmi 8', 60000, '1676165143_images-min.jpg', 58, 1),
(22, 4, 3, 'Infinix hot 10', 88000, '1676165199_infinix-hot-10-play-x688c-682-hd-waterdrop-32-go-de-rom-2-go-de-ram-13mp-8mp-4g-lte-6000mah-12-mois-min.jpg', 250, 1),
(23, 4, 3, 'Infinix hot 12 i', 100000, '1676165242_infinix-hot-12i-64go3go-13mp8mp-12-mois-garantie-min.jpg', 50, 1),
(24, 4, 3, 'Infinix smart 5', 56000, '1676165287_infinix-smart-5-présentation-min.jpeg', 75, 1),
(25, 4, 3, 'Infinix Zero', 150000, '1676165321_InfinixZero8-min.jpg', 15, 1),
(26, 4, 3, 'Itel S16', 50000, '1676165365_LD0005238575_2-min.jpg', 20, 1),
(27, 4, 3, 'Techno camon 19', 125000, '1676165412_tecno_camon_19_ci9_d-min.jpg', 10, 1),
(28, 4, 2, 'Hp DV30', 350000, '1676165451_61aTywrhyBS._AC_SL1000_-min.jpg', 15, 1),
(29, 4, 2, 'Lonovo B500', 450000, '1676165494_82QQ003BFR-fg-min.jpg', 20, 1),
(30, 4, 2, 'TV 32 Pouce Hisence android', 250000, '1676199641_', 55, 0),
(31, 4, 9, 'Frigo GT 258', 320000, '1676165599_whirlpool-w7921ioxaqua_001-min.jpg', 15, 1),
(32, 4, 9, 'Frigo Cool Frezer', 250000, '1676165640_whirlpool-w7931tox-min.jpg', 20, 1),
(33, 4, 2, 'TV Smart 65', 600000, '1676165674_lg_tv_smart_65_pouces_1-min.jpg', 30, 1),
(34, 4, 2, 'Smart 75', 750500, '1676165714_smart-tv-hisense-75a6hs-min.jpg', 25, 1),
(35, 4, 3, 'Samsung S10', 200000, '1676198251_samsung-s10e-double-sim-128-go-noir-dbloqu-reconditionn-min.jpg', 25, 1),
(36, 4, 2, 'LG Smart 43', 300000, '1676198297_lg_smart_tv_43_pouces_a-min.jpg', 15, 1),
(37, 4, 2, 'Hisense', 250000, '1676198334_hisense-smart-tv---32-pouces_2-min.jpg', 20, 1),
(38, 4, 2, 'TV Delta', 150000, '1676198381_smart-t_l_viseur-_-delta-min.jpg', 250000, 1),
(39, 1, 3, 'Honor 70', 365000, '1676200145_honor-70-5g-256-go-8-go--min.jpg', 15, 1),
(40, 1, 3, 'Infinix Zero', 220000, '1676200180_InfinixZero8-min.jpg', 50, 1),
(41, 4, 3, 'Oppo 96', 200000, '1676200270_MN0005942382-min.jpg', 20, 1),
(42, 5, 3, 'Honor 70', 350000, '1676202935_honor-70-5g-256-go-8-go--min.jpg', 20, 1),
(43, 5, 2, 'TV Smart 32', 320000, '1676202990_btvs_1-min.jpg', 50, 1),
(44, 5, 2, 'Oppo Note', 85000, '1676203018_2de88775-a9-2020__450_400-min.jpeg', 12, 1),
(45, 5, 2, 'HP Delta', 250000, '1676203060_61aTywrhyBS._AC_SL1000_-min.jpg', 25, 1),
(46, 5, 3, 'Huawei P40', 450000, '1676203104_huawei-p40-pro-01-min.jpg', 20, 1),
(47, 5, 2, 'Innova 32', 105000, '1676203146_innova-32sa58---smart-tv---32-pouces-_81-cm_-min.jpg', 45, 1),
(48, 5, 2, 'LG TV', 185000, '1676203178_lg_smart_tv_43_pouces_a-min.jpg', 20, 1),
(49, 5, 2, 'LG Smart 65', 365000, '1676203219_lg_tv_smart_65_pouces_1-min.jpg', 100, 1),
(50, 5, 2, 'TV Roch', 150000, '1676203254_nouveau-templete---tv--1300-x-1300-min.jpg', 20, 1),
(51, 5, 2, 'LG 55', 285000, '1676203303_smart_tv_lg_55_pouces_a-min.jpg', 25, 1),
(52, 5, 2, 'Roch 55', 550000, '1676203351_smart-led-tv-incurv_---samsung-min.jpg', 55, 1),
(53, 5, 2, 'TV Fold', 150000, '1676203400_smart-t_l_viseur-_-delta-_-32dl201s-min.jpg', 45, 1),
(54, 5, 2, 'Smart Delta 43', 350000, '1676203438_smart-t_l_viseur-_-delta-min.jpg', 25, 1),
(55, 5, 2, 'Smart innova 65', 650000, '1676203478_smart-television-65a97-innova-65-pouces_1-min.jpg', 5, 1),
(56, 5, 2, 'Hisense 43', 185000, '1676203512_smart-tv-hisense-43a4gs--43-pouces_1-min.jpg', 2, 0),
(57, 5, 2, 'Hisense 55', 290000, '1676203554_smart-tv-hisense-55-pouces_2-min.jpg', 15, 1),
(58, 5, 2, 'Hisense 58', 450000, '1676203601_smart-tv-hisense-58-pouces_1_1-min.jpg', 18, 1),
(59, 5, 2, 'Hisense 75', 1000000, '1676203630_smart-tv-hisense-75a6hs-min.jpg', 5, 1),
(60, 5, 2, 'Innova 32 Android 12', 180000, '1676203668_smart-tv-innova-32-pouces_1-min.jpg', 5, 1),
(61, 5, 2, 'Innova 43 a', 158000, '1676203702_smart-tv-innova-43an888-min.jpg', 20, 1),
(62, 5, 2, 'Innova 50', 289000, '1676203755_smart-tv-innova-55-pouces-min.jpg', 12, 1),
(63, 5, 2, 'Samsung', 250000, '1676203808_smart-tv-led---samsung---ua50au8000uxly_1-min.jpg', 25, 1),
(64, 5, 2, 'Roch 4K', 450000, '1676203853_smart-tv-lg---50-pouces---uhd-4k---50up7550pvg-min.jpg', 20, 1),
(65, 5, 2, 'Oscar 43', 350000, '1676203885_smart-tv-oscar_1-min.jpg', 20, 1),
(66, 5, 2, 'TLC 40', 199000, '1676203923_smart-tv-tcl-min.jpg', 20, 1),
(67, 5, 2, 'Toshiba 50', 249000, '1676203977_t_l_viseur_smart_-_toshiba_-_32v35kn-min.jpg', 20, 1),
(68, 5, 2, 'Toshiba 43', 250000, '1676204024_t_l_viseur_smart_toshiba_-_43_pouces_-_e-min.jpg', 10, 1),
(69, 5, 2, 'Sharp 43', 43000, '1676204060_t_l_viseur-sharp-min.jpg', 25, 1),
(70, 5, 2, 'Smart 43', 255000, '1676204108_tarhle43dsabcm-min.jpg', 20, 1),
(71, 5, 2, 'Smart plus 32', 132000, '1676204195_toshiba-tv-num_rique-32-pouces_5-min.jpg', 12, 1),
(72, 5, 2, 'Innova a40 50', 256000, '1676204238_tv_smart_innova_40sa58_-_40_pouces_2_-min.jpg', 3, 1),
(73, 5, 2, 'Sony 32', 125000, '1676204286_tv_smart_led_sony_-_32w600d_-_32_pouces-min.jpg', 12, 1),
(74, 5, 2, 'Oscar 65', 899000, '1676204321_tv_smart_oscar_-osc-65d17smt-s2_prix_bas-min.jpg', 12, 1),
(75, 5, 2, 'Sony 43', 255000, '1676204357_tv_smart-sony-kdl-43w660f-_43_inch_-_smart_-2k-min.jpg', 2, 1),
(76, 5, 2, 'Sony 43i', 250500, '1676204411_tv_smart-sony-kdl-43w660f-_43_inch_-_smart_-2k-min.jpg', 15, 1),
(77, 5, 2, 'Sony 43', 255000, '1676204446_tv_sony_-_kd-77a9g-a9g_-_77_pouces_-_c-min.jpg', 5, 1),
(78, 5, 2, 'Sony kd 70', 1000000, '1676204518_tv_sony_-_kd-77a9g-a9g_-_77_pouces_-_c-min.jpg', 10, 1),
(79, 5, 2, 'innova 50', 250000, '1676204558_tv-innova-50_-smart-min.jpg', 50, 1),
(80, 3, 8, 'The ordinary Anti age', 18000, '1676205275_1326139-The-Ordinary-Anti-Age-Kit-du-matin-anti-age.a072a0e5-min.jpg', 22, 1),
(81, 3, 8, 'Pack Pelling', 25000, '1676205312_1326171-The-Ordinary-Hautunregelmaessigkeiten-2-Ensemble-de-soins-de-nuit.b36dba4c-min.jpg', 20, 1),
(82, 3, 8, 'Acide Glycolique', 12000, '1676205344_téléchargement-min.jpg', 21, 1),
(83, 3, 8, 'Acide Glucolique Tonique', 15000, '1676205383_The-Ordinary-Glycolic-Acid-7-Toning-Solution-min.png', 15, 1);

-- --------------------------------------------------------

--
-- Structure de la table `boutique`
--

DROP TABLE IF EXISTS `boutique`;
CREATE TABLE IF NOT EXISTS `boutique` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cat` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `banniere` varchar(255) NOT NULL,
  `banniere2` varchar(255) DEFAULT NULL,
  `position` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `lat` float NOT NULL,
  `lon` float NOT NULL,
  `mot_de_passe` text NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nom` (`nom`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `boutique`
--

INSERT INTO `boutique` (`id`, `cat`, `nom`, `slug`, `logo`, `banniere`, `banniere2`, `position`, `status`, `lat`, `lon`, `mot_de_passe`) VALUES
(1, 1, 'Tel Shopping', '1676136121_tel_shopping', '1676138071_phone-logo-design-template-fe4d3ed13ba702eb7f7763664bc7f028_screen-min-min.jpg', '1676830785_cae72ce86998abcadd5051acd91a696b.jpg', '1676830785_aa0c37124151509.60fe7e3f9aad9.png', 'Deuxieme etage', 1, 12, 10, '$2y$10$n3Fq1pVsxOZVxzZtxZz18e8LzHJKEq9NtAcOx9wkG5s8DiNU8UyY2'),
(2, 6, 'Big Bugger', '1676136373_big_bugger', '1676136373_fast-food-logo-design-template-6498d2ad89f845b9346fb66034981725_screen-min.jpg', '1676831829_maxresdefault_1_jpg', '1676831829_maxresdefault8888_jpg', 'Premier etage', 1, 20, 20, '$2y$10$N/L5CbH1q78fCaAMNVN37.d1.6zLHoFvBvtGo4VYlGH8jzrsqgZa.'),
(3, 4, 'Lisette Cosmetic', '1676136457_lisette_cosmetic', '1676136457_3b0c0840965697.5793e620e076e-min.jpg', '1676832922_96ec3353a3878e090d792ea850df8663_jpg', '', 'Deuxieme etage', 1, 20, 10, '$2y$10$TIgR.DmqC17ORexhwwDUG.l6fKVU17lnAWFeAl8zahi00lVYWKZVm'),
(4, 1, 'IPHONE Store', '1676136547_iphone_store', '1676136547_phone-store-logo-template-this-design-use-mobile-symbol-suitable-for-business-free-vector-min.jpg', '1676824618_aa0c37124151509.60fe7e3f9aad9.png', '1676829579_cae72ce86998abcadd5051acd91a696b.jpg', 'Deuxieme etage', 1, 20, 10, '$2y$10$9WSg.M.UbtabS5K4UxrwwOExnphAWRFLuczaFe2mXRJw0baTpUJgq'),
(5, 1, 'TV SMART SHOP', '1676136893_tv_smart_shop', '1676136893_shoptv-min.jpg', '1676833408_c835websizerevised_jpg', NULL, 'Premier etage', 1, 15, 10, '$2y$10$N.atM0SYgbT2nXdIAfznYun40AsdYWIh5hzKCxxZyRbECdLJzRE8q');

-- --------------------------------------------------------

--
-- Structure de la table `categorie_articles`
--

DROP TABLE IF EXISTS `categorie_articles`;
CREATE TABLE IF NOT EXISTS `categorie_articles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `categorie_articles`
--

INSERT INTO `categorie_articles` (`id`, `nom`) VALUES
(1, 'Divers'),
(2, 'Electronique et ordinateurs'),
(3, 'Téléphones mobiles'),
(4, 'Vêtements et chaussures pour femmes'),
(5, 'Vêtements et chaussures pour hommes'),
(6, 'Bijoux et accessoires'),
(7, 'Sacs et bagages'),
(8, 'Santé et beauté'),
(9, 'Electroménager'),
(12, 'Repas'),
(11, 'Boissons');

-- --------------------------------------------------------

--
-- Structure de la table `categorie_boutiques`
--

DROP TABLE IF EXISTS `categorie_boutiques`;
CREATE TABLE IF NOT EXISTS `categorie_boutiques` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `categorie_boutiques`
--

INSERT INTO `categorie_boutiques` (`id`, `nom`) VALUES
(1, 'Divers'),
(4, 'Santé et beauté'),
(5, 'Electroménager'),
(6, 'Alimentation et boissons'),
(8, 'Vêtements et accessoires');

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
  `ip` varchar(255) NOT NULL,
  `mac` varchar(255) NOT NULL,
  `host` varchar(255) NOT NULL,
  `port` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`id`, `nom`, `prenom`, `quartier`, `email`, `tel`, `ip`, `mac`, `host`, `port`) VALUES
(1, 'Ebiguetie yen', 'Simon pierre', 'Pariso', 'ebiguetiesimon@gmail.com', '655566264', '192.168.137.1', '00-15-5D-B4-4E-5D', 'DESKTOP-FI4ACGG.mshome.net', '63267'),
(2, 'ebiguetie', 'Simon pierre', 'Yassa', 'test@gmail.com', '(655) 556-6222', '192.168.137.101', '00-15-5D-09-56-2D', 'HONOR-70.mshome.net', '40980'),
(3, 'Yuie', 'Jsjj', 'Idjdj', 'aksdk@gmail.com', '5555', '192.168.137.103', '00-15-5D-47-DA-DF', 'HUAWEI_Mate_10_lite-3a317.mshome.net', '33134'),
(4, 'MBANG ', 'FRANCEL ', 'Pk6', 'ntingfrancel@gmail.com', '698931602', '192.168.137.104', '00-15-5D-09-56-2D', '21061119DG.mshome.net', '44600'),
(5, 'kkll', 'popp', 'kkkp', 'joelnanmeny@yahoo.fr', 'lpkkkl', '192.168.137.50', '00-15-5D-09-56-2D', 'DESKTOP-0KJOIPE.mshome.net', '63943'),
(6, 'ebiguetie', 'Simon pierre', 'Yassa', 'ebiguesimon@yahoo.fr', '06 55 56 62 64', '192.168.137.1', '00-15-5D-09-56-2D', 'DESKTOP-FI4ACGG.mshome.net', '55969'),
(7, 'Tamdem', 'Lucas', 'Bilongue', 'arnoldnanmeny@yahoo.com', '655755958', '192.168.137.102', '00-15-5D-09-56-2D', 'M2003J15SC-RedmiNote.mshome.net', '39034'),
(8, 'Tchomba', 'Gislain ', 'Sadi', 'tchomba.gislain@gmail.com', '698356419', '192.168.137.106', '00-15-5D-47-DA-DF', '192.168.137.106', '38888'),
(9, 'DJEUKOUA ', 'Fabiola', 'Pk11', 'sabgueufabiola@gmail.com', '694700963', '192.168.137.105', '00-15-5D-47-DA-DF', 'Galaxy-S20-FE-5G.mshome.net', '60926'),
(10, 'testnom', 'Testprenom', 'Testquartier', 'www@ddf.fe', '655889977', '192.168.137.52', '00-15-5D-6D-FC-2D', 'RES11_L.mshome.net', '2129');

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

DROP TABLE IF EXISTS `commande`;
CREATE TABLE IF NOT EXISTS `commande` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_client` int(11) NOT NULL,
  `transaction_id` varchar(255) DEFAULT NULL,
  `total` float NOT NULL,
  `dates` datetime NOT NULL,
  `payer` int(11) NOT NULL DEFAULT '0',
  `cloturer` int(11) NOT NULL DEFAULT '0',
  `id_boutique` int(11) NOT NULL,
  `methode` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `commande`
--

INSERT INTO `commande` (`id`, `id_client`, `transaction_id`, `total`, `dates`, `payer`, `cloturer`, `id_boutique`, `methode`) VALUES
(1, 1, NULL, 4000, '2023-02-12 16:37:05', 0, 1, 2, 'Payer a la livraison'),
(2, 1, 'PAYID-MPUQP5Y82J09992JK954415E', 165000, '2023-02-12 16:38:31', 1, 0, 4, 'Paypal'),
(3, 1, 'PAYID-MPUS75A6R015511R0275570H', 4500, '2023-02-12 19:29:08', 1, 0, 2, 'Paypal'),
(4, 1, 'PAYID-MPUT74Y0KL793455Y3774819', 290000, '2023-02-12 20:37:24', 1, 0, 5, 'Paypal'),
(5, 1, NULL, 418000, '2023-02-12 21:03:24', 0, 0, 4, 'Payer a la livraison'),
(6, 1, NULL, 2750, '2023-02-12 21:10:13', 0, 0, 2, 'Payer a la livraison'),
(7, 1, NULL, 1200500, '2023-02-12 21:21:46', 0, 0, 4, 'Payer a la livraison'),
(8, 1, NULL, 37000, '2023-02-13 09:12:15', 0, 0, 3, 'Payer a la livraison'),
(9, 1, NULL, 1060000, '2023-02-13 09:50:04', 0, 0, 5, 'Payer a la livraison'),
(10, 1, NULL, 195000, '2023-02-13 10:24:52', 0, 0, 4, 'Payer a la livraison'),
(11, 1, NULL, 5750, '2023-02-13 10:47:37', 0, 0, 2, 'Paypal'),
(12, 1, 'PAYID-MPVAQMA3C123320GE717370P', 4000, '2023-02-13 10:51:45', 1, 0, 2, 'Paypal'),
(13, 1, NULL, 490000, '2023-02-13 10:57:11', 0, 0, 5, 'Paypal'),
(14, 1, NULL, 4000, '2023-02-13 11:00:52', 0, 0, 2, 'Paypal'),
(15, 1, NULL, 12500, '2023-02-13 11:04:53', 0, 0, 2, 'Paypal'),
(16, 1, 'PAYID-MPVAXNA76552936P8277203U', 7250, '2023-02-13 11:06:44', 1, 0, 2, 'Paypal'),
(17, 1, 'PAYID-MPVBXZY3LB14239BV9760928', 2500, '2023-02-13 12:15:51', 1, 0, 2, 'Paypal'),
(18, 1, 'PAYID-MPXZS6I5YM98089YN799180M', 12000, '2023-02-17 16:12:58', 1, 0, 3, 'Paypal'),
(19, 1, 'PAYID-MPXZUUQ93J78228WN365310Y', 1250000, '2023-02-17 16:16:34', 1, 0, 5, 'Paypal'),
(20, 1, NULL, 655000, '2023-02-21 12:04:32', 1, 1, 5, 'Payer a la livraison'),
(21, 1, NULL, 580000, '2023-02-21 12:11:38', 1, 1, 5, 'Payer a la livraison'),
(22, 1, NULL, 2500, '2023-02-21 12:37:43', 0, 0, 2, 'Payer a la livraison'),
(23, 1, NULL, 170000, '2023-02-21 12:42:13', 0, 0, 5, 'Payer a la livraison'),
(24, 1, NULL, 25000, '2023-02-22 15:27:43', 0, 0, 3, 'Payer a la livraison'),
(25, 1, NULL, 43000, '2023-02-22 16:56:26', 0, 0, 3, 'Payer a la livraison'),
(26, 1, NULL, 3250, '2023-02-22 18:05:42', 0, 0, 2, 'Payer a la livraison'),
(27, 1, NULL, 5000, '2023-02-23 15:54:50', 0, 0, 2, 'Payer a la livraison');

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

-- --------------------------------------------------------

--
-- Structure de la table `ligne_commande`
--

DROP TABLE IF EXISTS `ligne_commande`;
CREATE TABLE IF NOT EXISTS `ligne_commande` (
  `id_article` int(11) NOT NULL,
  `id_commande` int(11) NOT NULL,
  `qte_commande` int(11) NOT NULL,
  `prix` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `ligne_commande`
--

INSERT INTO `ligne_commande` (`id_article`, `id_commande`, `qte_commande`, `prix`) VALUES
(2, 1, 2, 750),
(3, 1, 1, 2500),
(15, 2, 1, 75000),
(14, 2, 1, 90000),
(6, 3, 1, 3500),
(7, 3, 1, 1000),
(57, 4, 1, 290000),
(24, 5, 3, 56000),
(23, 5, 1, 100000),
(25, 5, 1, 150000),
(10, 6, 1, 2000),
(13, 6, 1, 750),
(29, 7, 1, 450000),
(34, 7, 1, 750500),
(81, 8, 1, 25000),
(82, 8, 1, 12000),
(43, 9, 2, 320000),
(44, 9, 2, 85000),
(45, 9, 1, 250000),
(15, 10, 2, 75000),
(16, 10, 1, 45000),
(3, 11, 2, 2500),
(4, 11, 1, 750),
(2, 12, 2, 750),
(3, 12, 1, 2500),
(43, 13, 1, 320000),
(44, 13, 2, 85000),
(2, 14, 2, 750),
(3, 14, 1, 2500),
(3, 15, 2, 2500),
(4, 15, 2, 750),
(11, 15, 1, 2500),
(6, 15, 1, 3500),
(2, 16, 2, 750),
(3, 16, 2, 2500),
(4, 16, 1, 750),
(2, 17, 1, 750),
(4, 17, 1, 750),
(8, 17, 1, 1000),
(82, 18, 1, 12000),
(79, 19, 1, 250000),
(78, 19, 1, 1000000),
(43, 20, 1, 320000),
(44, 20, 1, 85000),
(45, 20, 1, 250000),
(57, 21, 2, 290000),
(3, 22, 1, 2500),
(44, 23, 2, 85000),
(81, 24, 1, 25000),
(80, 25, 1, 18000),
(81, 25, 1, 25000),
(3, 26, 1, 2500),
(4, 26, 1, 750),
(3, 27, 2, 2500);

-- --------------------------------------------------------

--
-- Structure de la table `new_offers`
--

DROP TABLE IF EXISTS `new_offers`;
CREATE TABLE IF NOT EXISTS `new_offers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `prix` int(11) DEFAULT NULL,
  `data_mo` int(11) DEFAULT NULL,
  `data_display` text NOT NULL,
  `desc1` varchar(255) NOT NULL,
  `desc2` varchar(255) NOT NULL,
  `desc3` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `new_offers`
--

INSERT INTO `new_offers` (`id`, `nom`, `prix`, `data_mo`, `data_display`, `desc1`, `desc2`, `desc3`) VALUES
(1, 'Basic', 100, 150, '150 Mo', 'Valide pour 3 Heures', 'Donwload < ou = 250 Kbs', 'Upload < ou = 20 Kbs'),
(2, 'Basic+', 250, 375, '375 Mo', 'Valide pour 6 Heures', 'Donwload < ou = 350 Kbs', 'Upload < ou = 40 Kbs'),
(3, 'Medium', 500, 700, '700 Mo', 'Valide pour 1 Jour', 'Donwload < ou = 1Mbs', 'Upload < ou = 60 Kbs'),
(4, 'Medium+', 1000, 2500, '2.5Go', 'Valide pour 1 Jour', 'Donwload < ou = 1.5Mbs', 'Upload < ou = 100 Kbs'),
(5, 'Premium', 2500, 4000, '4Go', 'Valide pour 1 Semaine', 'Donwload < ou = 2Mbs', 'Upload < ou = 200 Kbs'),
(6, 'Ultra', 5000, 12000, '12Go', 'Valide pour 1 Semaine', 'Donwload < ou = 2Mbs', 'Upload < ou = 200 Kbs');

-- --------------------------------------------------------

--
-- Structure de la table `paiement`
--

DROP TABLE IF EXISTS `paiement`;
CREATE TABLE IF NOT EXISTS `paiement` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_client` int(11) NOT NULL,
  `transaction_id` int(11) NOT NULL,
  `telephone` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `amount` varchar(255) DEFAULT NULL,
  `method` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

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

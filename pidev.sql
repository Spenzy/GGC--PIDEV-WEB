-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 17, 2022 at 02:48 PM
-- Server version: 5.7.36
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pidev`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id_admin` int(11) NOT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`) VALUES
(1);

-- --------------------------------------------------------

--
-- Table structure for table `avis`
--

DROP TABLE IF EXISTS `avis`;
CREATE TABLE IF NOT EXISTS `avis` (
  `idAvis` int(11) NOT NULL AUTO_INCREMENT,
  `referenceProduit` int(11) DEFAULT NULL,
  `idClient` int(11) DEFAULT NULL,
  `description` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`idAvis`),
  KEY `fk_avis_produit` (`referenceProduit`),
  KEY `fk_avis_client` (`idClient`)
) ENGINE=InnoDB AUTO_INCREMENT=83 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `avis`
--

INSERT INTO `avis` (`idAvis`, `referenceProduit`, `idClient`, `description`, `type`) VALUES
(24, 6663, 222, 'pas Bon!!', 'mediocre'),
(37, 121212111, 111, 'capacité moyenne ,pas mal', 'moyen'),
(39, 963325, 111, 'La qualité n\'est pas excellente mais bonne surtout par rapport au prix', 'moyen'),
(44, 9595, 6253, 'mediocre!!!!!!!!!!!!!!!!!!!!!!!!!!!!', 'mediocre'),
(47, 9595, 111, 'bonne qualité!', 'moyen'),
(58, 6663, 3, 'medocre', 'mediocre'),
(73, 8541, 6, 'mmmmmmmmmmm!!!!!!!!!!!!!!!!!!!!!!!!', 'moyen'),
(80, 66666, 6, 'zsds', 'excellent'),
(81, 123, 6, 'mon ami zied dit que ce clavier est excellent il a meme toute la collection RedDragonKumara', 'excellent'),
(82, 745, 6, 'mon ami zied dit que ce clavier est excellent il a meme toute la collection RedDragonKumara', 'excellent');

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

DROP TABLE IF EXISTS `client`;
CREATE TABLE IF NOT EXISTS `client` (
  `idClient` int(11) NOT NULL AUTO_INCREMENT,
  `nbrAvertissement` int(11) NOT NULL,
  `ban` int(1) NOT NULL,
  `dateDebutBlock` date NOT NULL,
  `dateFinBlock` date NOT NULL,
  PRIMARY KEY (`idClient`)
) ENGINE=InnoDB AUTO_INCREMENT=6254 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`idClient`, `nbrAvertissement`, `ban`, `dateDebutBlock`, `dateFinBlock`) VALUES
(1, 0, 0, '2022-02-11', '2022-02-11'),
(2, 0, 0, '2022-02-02', '2022-02-02'),
(3, 0, 0, '2022-02-09', '2022-02-01'),
(4, 0, 0, '2022-02-11', '2022-02-11'),
(5, 0, 0, '2022-02-02', '2022-02-02'),
(6, 0, 0, '2022-02-11', '2022-02-11'),
(111, 0, 0, '2022-02-08', '2022-02-15'),
(222, 0, 0, '2022-02-13', '2022-02-15'),
(6253, 0, 0, '2022-02-17', '2022-02-22');

-- --------------------------------------------------------

--
-- Table structure for table `commande`
--

DROP TABLE IF EXISTS `commande`;
CREATE TABLE IF NOT EXISTS `commande` (
  `idCommande` int(11) NOT NULL AUTO_INCREMENT,
  `idClient` int(11) NOT NULL,
  `adresse` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `prix` float NOT NULL,
  `livree` tinyint(1) NOT NULL,
  `DateCommande` date NOT NULL,
  PRIMARY KEY (`idCommande`,`idClient`) USING BTREE,
  KEY `fk_client_commande` (`idClient`)
) ENGINE=InnoDB AUTO_INCREMENT=69 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `commande`
--

INSERT INTO `commande` (`idCommande`, `idClient`, `adresse`, `prix`, `livree`, `DateCommande`) VALUES
(56, 1, 'manzel bourgiba', 4120.5, 1, '2022-04-09'),
(57, 111, 'carthage byrsa', 400, 0, '2022-04-09'),
(58, 111, 'gammarth', 3441.33, 0, '2022-04-09'),
(65, 111, 'testtest', 80, 0, '2022-04-17'),
(66, 111, 'ourourou', 190, 0, '2022-04-17'),
(68, 111, 'ya mimti', 7312.56, 0, '2022-04-17');

-- --------------------------------------------------------

--
-- Table structure for table `commentaire`
--

DROP TABLE IF EXISTS `commentaire`;
CREATE TABLE IF NOT EXISTS `commentaire` (
  `idCommentaire` int(11) NOT NULL AUTO_INCREMENT,
  `idPublication` int(11) NOT NULL,
  `description` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `idClient` int(11) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`idCommentaire`,`idPublication`),
  KEY `fk_commentaire` (`idPublication`),
  KEY `fk_commentaire_client` (`idClient`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `commentaire`
--

INSERT INTO `commentaire` (`idCommentaire`, `idPublication`, `description`, `idClient`, `date`) VALUES
(1, 1, 'Oééééééééééééééééé ça serait superbe ahla', 3, '2022-02-26'),
(2, 1, 'c\'est quoi ce truc là?', 2, '2022-02-26'),
(3, 1, 'une erreur qui n\'aurait pas due etre faite!!!!!!!! modif test', 1, '2022-02-26'),
(4, 2, 'Commentaire de test', 5, '2022-02-26'),
(8, 1, 'BEST. GAME. EVER.', 1, '2022-04-09'),
(11, 1, 'BEST. GAME. EVER. 2.0', 1, '2022-04-10'),
(17, 14, 'e', 1, '2022-04-16'),
(25, 14, '<p><img alt=\"\" src=\"/uploads/118309174_1257393187936426_5731899168835387014_n.png\" style=\"height:225px; width:226px\" /></p>', 1, '2022-04-17'),
(26, 1, '<p><img alt=\"\" src=\"/uploads/download.jpg\" style=\"height:225px; width:225px\" /></p>', 1, '2022-04-17'),
(29, 1, '<p><img alt=\"\" src=\"/uploads/472c74563067eac5468dc5936f07a549dd99c2e6a65a7a9f308d72dd6d1d61f7.jpg\" style=\"height:223px; width:228px\" /></p>', 1, '2022-04-17'),
(30, 15, '<p style=\"text-align:center\"><span style=\"color:#9b59b6\"><span style=\"font-family:Comic Sans MS,cursive\"><strong>LONG LIVE THE DAPROUM FAMILY !!! &lt;3</strong></span></span></p>', 1, '2022-04-17');

-- --------------------------------------------------------

--
-- Table structure for table `evenement`
--

DROP TABLE IF EXISTS `evenement`;
CREATE TABLE IF NOT EXISTS `evenement` (
  `reference` int(11) NOT NULL,
  `dateDebut` date NOT NULL,
  `dateFin` date NOT NULL,
  `localisation` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `nbrParticipant` int(11) NOT NULL,
  PRIMARY KEY (`reference`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `evenement`
--

INSERT INTO `evenement` (`reference`, `dateDebut`, `dateFin`, `localisation`, `description`, `nbrParticipant`) VALUES
(1, '2022-02-10', '2022-02-04', 'aaa', 'aaaaaaaaaa', 452),
(2, '2022-02-16', '2022-02-03', 'aa', 'aaaaaaaaa', 20),
(3, '2022-02-01', '2022-02-16', 'manzah4', 'entrer Une description !', 20),
(4, '2022-02-01', '2022-02-02', 'manzah3', 'entrer Une description !', 20),
(5, '2022-02-18', '2022-02-10', 'mednine', 'entrer Une description !', 5),
(6, '2022-03-02', '2022-03-04', ' selyenna', 'asasa', 20),
(7, '2022-03-01', '2022-03-02', 'aindrahem', 'asasasa', 25),
(9, '2022-03-01', '2022-03-03', ' selyenna', 'sasas', 25),
(11, '2022-03-01', '2022-03-10', 'aindrahem', 'asa', 25),
(12, '2022-03-05', '2022-03-08', 'monastir', 'azer wa7ch', 10),
(13, '2022-04-01', '2022-02-28', 'monastir', 'azer', 12);

-- --------------------------------------------------------

--
-- Table structure for table `lignecommande`
--

DROP TABLE IF EXISTS `lignecommande`;
CREATE TABLE IF NOT EXISTS `lignecommande` (
  `idLigne` int(11) NOT NULL AUTO_INCREMENT,
  `idCommande` int(11) NOT NULL,
  `idProduit` int(11) NOT NULL,
  `quantite` int(11) NOT NULL,
  `prix` float NOT NULL,
  PRIMARY KEY (`idLigne`,`idCommande`) USING BTREE,
  KEY `fk_ligne_produit` (`idProduit`),
  KEY `fk_ligne_commande` (`idCommande`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `lignecommande`
--

INSERT INTO `lignecommande` (`idLigne`, `idCommande`, `idProduit`, `quantite`, `prix`) VALUES
(8, 56, 745, 2, 3950),
(9, 56, 6663, 1, 170.5),
(10, 57, 8541, 2, 400),
(11, 58, 9595, 1, 190),
(12, 58, 963325, 1, 17.5),
(13, 58, 121212111, 1, 3233.83),
(18, 61, 121212111, 2, 6467.66),
(19, 63, 107, 1, 170),
(20, 63, 6663, 1, 170.5),
(21, 65, 123, 1, 80),
(22, 66, 9595, 1, 190),
(23, 68, 66666, 1, 7312.56);

-- --------------------------------------------------------

--
-- Table structure for table `livraison`
--

DROP TABLE IF EXISTS `livraison`;
CREATE TABLE IF NOT EXISTS `livraison` (
  `idCommande` int(11) NOT NULL,
  `idLivreur` int(11) NOT NULL,
  `DateHeure` date NOT NULL,
  PRIMARY KEY (`idCommande`),
  KEY `fk_livraison_commande` (`idCommande`),
  KEY `fk_livraison_livreur` (`idLivreur`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `livraison`
--

INSERT INTO `livraison` (`idCommande`, `idLivreur`, `DateHeure`) VALUES
(57, 3, '2026-01-01'),
(68, 3, '2026-01-01');

-- --------------------------------------------------------

--
-- Table structure for table `livreur`
--

DROP TABLE IF EXISTS `livreur`;
CREATE TABLE IF NOT EXISTS `livreur` (
  `idLivreur` int(11) NOT NULL AUTO_INCREMENT,
  `disponibilite` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`idLivreur`)
) ENGINE=InnoDB AUTO_INCREMENT=6254 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `livreur`
--

INSERT INTO `livreur` (`idLivreur`, `disponibilite`) VALUES
(3, 1),
(4, 1),
(6, 1),
(6253, 1);

-- --------------------------------------------------------

--
-- Table structure for table `moderateur`
--

DROP TABLE IF EXISTS `moderateur`;
CREATE TABLE IF NOT EXISTS `moderateur` (
  `id_moderateur` int(11) NOT NULL,
  PRIMARY KEY (`id_moderateur`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `participation`
--

DROP TABLE IF EXISTS `participation`;
CREATE TABLE IF NOT EXISTS `participation` (
  `idParticipation` int(11) NOT NULL AUTO_INCREMENT,
  `idClient` int(11) NOT NULL,
  `idEvent` int(11) NOT NULL,
  `nbrEtoile` int(11) NOT NULL,
  PRIMARY KEY (`idParticipation`),
  KEY `fk_participation_client` (`idClient`),
  KEY `fk_participation_event` (`idEvent`)
) ENGINE=InnoDB AUTO_INCREMENT=141 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `participation`
--

INSERT INTO `participation` (`idParticipation`, `idClient`, `idEvent`, `nbrEtoile`) VALUES
(140, 4, 1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `personne`
--

DROP TABLE IF EXISTS `personne`;
CREATE TABLE IF NOT EXISTS `personne` (
  `id_personne` int(11) NOT NULL,
  `nom` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `prenom` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `dateNaissance` date NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `telephone` int(11) NOT NULL,
  `password` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_personne`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `personne`
--

INSERT INTO `personne` (`id_personne`, `nom`, `prenom`, `dateNaissance`, `email`, `telephone`, `password`) VALUES
(1, 'zied', 'dridi', '2022-02-11', 'dridi.zied@esprit.tn', 52848054, 'admin'),
(2, 'marwa', 'ayari', '2001-02-02', 'maroua.ayari@esprit.tn', 54342461, 'pwd'),
(3, 'Ahmed', 'Mezni', '2022-02-09', 'ahmed.mezni@esprit.tn', 84562357, 'pwd'),
(4, 'Azer', 'Lahmer', '2022-02-01', 'azer.lahmer@esprit.tn', 78945612, 'pwd'),
(5, 'Amir', 'Ben Salah', '2022-02-11', 'amir.bensalah@esprit.tn', 52845654, 'pwd'),
(6, 'Maher', 'Gasmi', '2022-02-11', 'maher.gasmi@esprit.tn', 54123321, 'pwd'),
(111, 'marwa', 'ayari', '2001-02-02', 'maroua.ayari@esprit.tn', 54342461, 'pwd'),
(222, 'cft', 'yugy', '2022-02-09', 'maroua.ayari@esprit.tn', 84562357, 'pwd'),
(6253, 'zied', 'dridi', '2022-02-01', 'dridi.zied@esprit.tn', 78945612, 'pwd');

-- --------------------------------------------------------

--
-- Table structure for table `plan`
--

DROP TABLE IF EXISTS `plan`;
CREATE TABLE IF NOT EXISTS `plan` (
  `idPlan` int(11) NOT NULL AUTO_INCREMENT,
  `idStreamer` int(11) NOT NULL,
  `date` date NOT NULL,
  `heure` time NOT NULL,
  `duree` time NOT NULL,
  `description` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `idEvenement` int(11) NOT NULL,
  PRIMARY KEY (`idPlan`,`idStreamer`),
  KEY `fk_plan_streamer` (`idStreamer`),
  KEY `fk_plan_evenement` (`idEvenement`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `produit`
--

DROP TABLE IF EXISTS `produit`;
CREATE TABLE IF NOT EXISTS `produit` (
  `reference` int(11) NOT NULL,
  `libelle` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `categorie` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `prix` float NOT NULL,
  `note` int(11) NOT NULL,
  `img` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`reference`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `produit`
--

INSERT INTO `produit` (`reference`, `libelle`, `categorie`, `description`, `prix`, `note`, `img`) VALUES
(107, 'REDRAGON H510 ZEUS 2 USB 7.1', 'Casque gaming', 'blabla', 170, 0, 'b1b8f41f561a90194bfeffe623aaea87.png'),
(123, 'RedDragonKumara', 'clavier', 'bon', 80, 2, '111796b1b907d625fa130fa928a11854.png'),
(745, 'GAMING PC : Ryzen 5 3600', 'GamingPc', 'GTX 1650 OC GDDR6 - RAM 16GO', 1975, 2, '6789d0845fb360d04541e998bdab7c40.png'),
(6663, 'AsusMouse6', 'souris', 'Souris qui accompagne AsusGaming5', 170.5, -2, '8724117e0821057473da9a59193bed17.png'),
(8524, 'Souris MSI', 'Souris', 'dzsq', 58.1718, 0, '942c4a4916c792e7cbbdee5aa3e55b2f.png'),
(8541, 'EcranSamsung', 'ecran', 'ecran cinéma 2D', 200, 1, '6bb18149a5ed85fb832a277254250934.png'),
(9595, 'DragonBleuRGB', 'Clavier', 'souris avec lumière ...', 190, 0, '34c467f1fbda3ace79af54f29fc6f3b4.png'),
(66666, 'AsusGaming 5', 'PC', 'Tout ce qu\'il vous faut pour jouer à vos jeux préférés', 7312.56, 2, '3b1682c090313717013cebcb3b2b1fd9.png'),
(963325, 'PRO-M3', 'Souris', 'Souris gaming', 14.543, 1, '5f512bf737d7d45e404323da83dacc13.png'),
(121212111, 'AsusVivoBook8', 'PC', 'pc pour étudiants avec options...', 3233.83, 1, '6a987640b7db855cb49eb0210705d857.png');

-- --------------------------------------------------------

--
-- Table structure for table `publication`
--

DROP TABLE IF EXISTS `publication`;
CREATE TABLE IF NOT EXISTS `publication` (
  `idPublication` int(11) NOT NULL AUTO_INCREMENT,
  `object` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `archive` tinyint(1) NOT NULL,
  `idClient` int(11) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`idPublication`),
  KEY `fk_publication_client` (`idClient`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `publication`
--

INSERT INTO `publication` (`idPublication`, `object`, `description`, `archive`, `idClient`, `date`) VALUES
(1, 'Bonjour, avez vous joué Elden Ring ?', 'J\'arrive pas a le télécharger mois-meme :(', 0, 1, '2022-02-25'),
(2, 'Publication de test', 'test modification', 0, 2, '2022-02-26'),
(6, 'Pub archivé', '', 1, 1, '2022-02-26'),
(7, 'Hello', '', 1, 1, '2022-02-26'),
(8, 'esprit validation', 'it is what it is', 0, 1, '2022-02-28'),
(9, 'azyzos', 'fait beaucoup de beuses ', 1, 4, '2022-02-28'),
(10, 'serveur gtrp', 'quelle est le meilleur serveur gta rp', 1, 5, '2022-02-28'),
(11, 'QuestioN?', 'body', 0, 1, '2022-04-09'),
(13, 'Pub Test', 'test', 1, 1, '2022-04-14'),
(14, 'QuestioN?', 'test', 1, 1, '2022-04-14'),
(15, 'Une publication d\'integration', '<p>how to merge !!<br />\r\nCAN YOU MERGE A DAPROUM ?????????????????</p>\r\n\r\n<p>yes&nbsp;<img alt=\"\" src=\"/uploads/118309174_1257393187936426_5731899168835387014_n.png\" style=\"height:225px; width:226px\" />if you merge daproum with daprouma</p>', 0, 1, '2022-04-17');

-- --------------------------------------------------------

--
-- Table structure for table `streamer`
--

DROP TABLE IF EXISTS `streamer`;
CREATE TABLE IF NOT EXISTS `streamer` (
  `idStreamer` int(11) NOT NULL AUTO_INCREMENT,
  `informations` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `lienStreaming` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`idStreamer`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `vote`
--

DROP TABLE IF EXISTS `vote`;
CREATE TABLE IF NOT EXISTS `vote` (
  `idClient` int(11) NOT NULL,
  `idPublication` int(11) NOT NULL,
  `type` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`idPublication`,`idClient`) USING BTREE,
  KEY `fk_vote_publication` (`idPublication`),
  KEY `fk_vote_client` (`idClient`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `vote`
--

INSERT INTO `vote` (`idClient`, `idPublication`, `type`) VALUES
(2, 1, 'UP'),
(3, 1, 'UP'),
(4, 1, 'UP'),
(5, 1, 'UP'),
(6, 1, 'UP'),
(1, 8, 'DOWN'),
(4, 8, 'UP'),
(1, 11, 'UP'),
(3, 11, 'UP'),
(1, 14, 'DOWN');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `pk_admin` FOREIGN KEY (`id_admin`) REFERENCES `personne` (`id_personne`);

--
-- Constraints for table `client`
--
ALTER TABLE `client`
  ADD CONSTRAINT `fk_client` FOREIGN KEY (`idClient`) REFERENCES `personne` (`id_personne`);

--
-- Constraints for table `commentaire`
--
ALTER TABLE `commentaire`
  ADD CONSTRAINT `fk_client_commentaire` FOREIGN KEY (`idClient`) REFERENCES `client` (`idClient`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_commentaire_publication` FOREIGN KEY (`idPublication`) REFERENCES `publication` (`idPublication`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `livreur`
--
ALTER TABLE `livreur`
  ADD CONSTRAINT `fk-personne-livreur` FOREIGN KEY (`idLivreur`) REFERENCES `personne` (`id_personne`);

--
-- Constraints for table `moderateur`
--
ALTER TABLE `moderateur`
  ADD CONSTRAINT `fk_moderateur-client` FOREIGN KEY (`id_moderateur`) REFERENCES `personne` (`id_personne`);

--
-- Constraints for table `publication`
--
ALTER TABLE `publication`
  ADD CONSTRAINT `fk_publication_client` FOREIGN KEY (`idClient`) REFERENCES `client` (`idClient`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `vote`
--
ALTER TABLE `vote`
  ADD CONSTRAINT `fk_vote_client` FOREIGN KEY (`idClient`) REFERENCES `client` (`idClient`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_vote_publication` FOREIGN KEY (`idPublication`) REFERENCES `publication` (`idPublication`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

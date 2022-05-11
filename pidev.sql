-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 11, 2022 at 11:03 AM
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
  `idClient` int(11) NOT NULL,
  `nbrAvertissement` int(11) DEFAULT NULL,
  `ban` int(1) DEFAULT NULL,
  `dateDebutBlock` date DEFAULT NULL,
  `dateFinBlock` date DEFAULT NULL,
  PRIMARY KEY (`idClient`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`idClient`, `nbrAvertissement`, `ban`, `dateDebutBlock`, `dateFinBlock`) VALUES
(2, 1, 0, '2022-02-02', '2022-02-02'),
(3, 0, 0, '2022-02-09', '2022-02-01'),
(4, 0, 0, '2022-02-11', '2022-02-11'),
(5, 0, 0, '2022-02-02', '2022-02-02'),
(6, 0, 0, '2022-02-11', '2022-02-11'),
(111, 0, 0, '2022-02-08', '2022-02-15'),
(222, 0, 0, '2022-02-13', '2022-02-15'),
(6253, 0, 0, '2022-02-17', '2022-02-22'),
(6257, NULL, NULL, NULL, NULL),
(6258, NULL, NULL, NULL, NULL),
(6261, NULL, NULL, NULL, NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=71 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `commande`
--

INSERT INTO `commande` (`idCommande`, `idClient`, `adresse`, `prix`, `livree`, `DateCommande`) VALUES
(57, 111, 'carthage byrsa', 125, 0, '2022-04-09'),
(58, 111, 'gammarth', 3441.33, 0, '2022-04-09'),
(65, 111, 'testtest', 80, 0, '2022-04-17'),
(66, 111, 'ourourou', 190, 0, '2022-04-17'),
(69, 111, 'Darna', 1975, 0, '2022-04-17'),
(70, 6, 'test', 14.543, 0, '2022-05-10');

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
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `commentaire`
--

INSERT INTO `commentaire` (`idCommentaire`, `idPublication`, `description`, `idClient`, `date`) VALUES
(4, 2, 'Commentaire de test', 5, '2022-02-26'),
(32, 2, '<p><img alt=\"\" src=\"/uploads/download.jpg\" style=\"height:225px; width:225px\" />&nbsp;sdsa<s><em><strong>dada<span style=\"font-size:20px\"><u>AERRR</u></span></strong></em></s></p>', 2, '2022-04-28');

-- --------------------------------------------------------

--
-- Table structure for table `evenement`
--

DROP TABLE IF EXISTS `evenement`;
CREATE TABLE IF NOT EXISTS `evenement` (
  `reference` int(11) NOT NULL,
  `dateDebut` date NOT NULL,
  `dateFin` date NOT NULL,
  `localisation` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nbrParticipant` int(11) NOT NULL,
  `Titre` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`reference`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `evenement`
--

INSERT INTO `evenement` (`reference`, `dateDebut`, `dateFin`, `localisation`, `description`, `photo`, `nbrParticipant`, `Titre`) VALUES
(1, '2023-01-01', '2024-01-01', 'mahdia', 'azizos is here', 'd1ad391fc9b58cecbc5b954a23d7791e.jpeg', 0, 'fifa'),
(2, '2024-01-01', '2025-01-01', 'mounastir', 'toirnoire free fire room 4vs4 b', 'b4afa90785cbdf5b9a50b583f8688f81.png', 49, 'free fire'),
(3, '2024-01-01', '2025-01-01', 'mahdiaa', 'match amical', '247002a276ec9ceff6181685512463c8.png', 5, 'fifa');

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
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
(23, 68, 66666, 1, 7312.56),
(24, 69, 745, 1, 1975),
(25, 70, 66666, 1, 7312.56),
(26, 70, 963325, 1, 14.543);

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
(57, 3, '2022-01-01'),
(69, 6253, '2025-10-18');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `moderateur`
--

INSERT INTO `moderateur` (`id_moderateur`) VALUES
(6259);

-- --------------------------------------------------------

--
-- Table structure for table `participation`
--

DROP TABLE IF EXISTS `participation`;
CREATE TABLE IF NOT EXISTS `participation` (
  `id_participation` int(11) NOT NULL AUTO_INCREMENT,
  `idClient` int(11) NOT NULL,
  `idEvent` int(11) NOT NULL,
  PRIMARY KEY (`id_participation`),
  KEY `IDX_AB55E24FA455ACCF` (`idClient`),
  KEY `IDX_AB55E24F2C6A49BA` (`idEvent`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `participation`
--

INSERT INTO `participation` (`id_participation`, `idClient`, `idEvent`) VALUES
(29, 3, 2),
(30, 3, 1),
(31, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `personne`
--

DROP TABLE IF EXISTS `personne`;
CREATE TABLE IF NOT EXISTS `personne` (
  `id_personne` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dateNaissance` date NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telephone` int(11) NOT NULL,
  `password` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id_personne`)
) ENGINE=InnoDB AUTO_INCREMENT=6262 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `personne`
--

INSERT INTO `personne` (`id_personne`, `nom`, `prenom`, `dateNaissance`, `email`, `telephone`, `password`, `roles`) VALUES
(1, 'admin', 'admin', '2022-02-11', 'admin@gmail.com', 52848054, 'pwd', 'admin'),
(2, 'azer', 'azer', '2001-02-02', 'lahmerazer1998@gmail.com', 54342461, 'pwd', 'user'),
(3, 'Ahmed', 'ben salah', '2022-02-09', 'ahmed.mezni@esprit.tn', 84562357, 'pwd', 'user'),
(4, 'Azer', 'Lahmer', '2022-02-01', 'azer.lahmer@esprit.tn', 78945612, 'pwd', 'user'),
(5, 'Amir', 'lahmer', '2022-02-11', 'amir.bensalah@esprit.tn', 52845654, 'pwd', 'user'),
(6, 'Maher', 'Gasmi', '2022-02-11', 'maher.gasmi@esprit.tn', 54123321, 'pwd', 'user'),
(111, 'Marwa', 'Ayari', '2001-02-02', 'maroua.ayari@esprit.tn', 54342461, 'pwd', 'user'),
(222, 'cft', 'yugy', '2022-02-09', 'amir2145@gmail.com', 84562357, 'pwd', 'user'),
(6253, 'zied', 'dridi', '2022-02-01', 'dridi.zied@esprit.tn', 87654321, 'azerty', 'user'),
(6257, 'user', 'user', '2017-01-01', 'user@gmail.com', 54405584, '123456', 'user'),
(6258, 'bouha', 'bouha', '2017-01-01', 'bouha@gmail.com', 54405584, 'azerty', 'user'),
(6259, 'samir', 'satour', '2022-04-21', 'zied.zied@esprit.tn', 12345678, '123456789', 'moderateur'),
(6260, 'zrtuieazeaze', 'aeazeaze', '2022-05-19', 'zaeazeaze@gmail.com', 54405584, 'azerty', 'moderateur'),
(6261, 'azerty', 'azerty', '2022-05-18', 'azerty@azerty.com', 12345678, 'azerty', 'user');

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
  `duree` int(11) NOT NULL,
  `description` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `idEvenement` int(11) NOT NULL,
  PRIMARY KEY (`idPlan`,`idStreamer`),
  KEY `fk_plan_streamer` (`idStreamer`),
  KEY `fk_plan_evenement` (`idEvenement`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `plan`
--

INSERT INTO `plan` (`idPlan`, `idStreamer`, `date`, `heure`, `duree`, `description`, `idEvenement`) VALUES
(1, 222, '2023-01-01', '12:00:00', 12, 'azezarezr', 1);

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
(8524, 'Souris MSI', 'Souris', 'dzsq', 57.5901, 0, '942c4a4916c792e7cbbdee5aa3e55b2f.png'),
(8541, 'EcranSamsung', 'ecran', 'ecran cinéma 2D', 200, 1, '6bb18149a5ed85fb832a277254250934.png'),
(9595, 'DragonBleuRGB', 'Clavier', 'souris avec lumière ...', 190, 0, '34c467f1fbda3ace79af54f29fc6f3b4.png'),
(66666, 'AsusGaming 5', 'PC', 'Tout ce qu\'il vous faut pour jouer à vos jeux préférés', 7312.56, 2, '3b1682c090313717013cebcb3b2b1fd9.png'),
(963325, 'PRO-M3', 'Souris', 'Souris gaming', 14.3976, 1, '5f512bf737d7d45e404323da83dacc13.png'),
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
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `publication`
--

INSERT INTO `publication` (`idPublication`, `object`, `description`, `archive`, `idClient`, `date`) VALUES
(2, 'Publication de test', 'test modification', 0, 2, '2022-02-26'),
(9, 'azyzos', 'fait beaucoup de beuses ', 1, 4, '2022-02-28'),
(10, 'serveur gtrp', 'quelle est le meilleur serveur gta rp', 1, 5, '2022-02-28'),
(16, 'jkeznrze', '<p style=\"text-align:center\"><span style=\"color:#27ae60\">dsfjdsf</span></p>', 0, 2, '2022-04-28'),
(17, 'Test', '<p>test</p>', 1, 3, '2022-04-28'),
(18, 'Publication de validation', '<p style=\"text-align:center\"><span style=\"font-size:20px\"><span style=\"font-family:Comic Sans MS,cursive\"><span style=\"color:#ffffff\"><span style=\"background-color:#1abc9c\">Testing ckeditor</span></span></span></span></p>', 0, 2, '2022-04-28');

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
) ENGINE=InnoDB AUTO_INCREMENT=6259 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `streamer`
--

INSERT INTO `streamer` (`idStreamer`, `informations`, `lienStreaming`) VALUES
(222, 'kjsdkjhg', 'www.nimo.tv/wassimos'),
(6258, 'number one', 'www.nimo.tv/azizos');

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
(2, 18, 'DOWN');

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
  ADD CONSTRAINT `fk_moderateur-personne` FOREIGN KEY (`id_moderateur`) REFERENCES `personne` (`id_personne`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `participation`
--
ALTER TABLE `participation`
  ADD CONSTRAINT `FK_AB55E24F2C6A49BA` FOREIGN KEY (`idEvent`) REFERENCES `evenement` (`reference`),
  ADD CONSTRAINT `FK_AB55E24FA455ACCF` FOREIGN KEY (`idClient`) REFERENCES `client` (`idClient`);

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

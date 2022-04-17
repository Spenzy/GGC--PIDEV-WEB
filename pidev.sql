-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 08 avr. 2022 à 12:49
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
-- Base de données : `pidev`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id_admin` int(11) NOT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id_admin`) VALUES
(1);

-- --------------------------------------------------------

--
-- Structure de la table `avis`
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
) ENGINE=InnoDB AUTO_INCREMENT=81 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `avis`
--

INSERT INTO `avis` (`idAvis`, `referenceProduit`, `idClient`, `description`, `type`) VALUES
(24, 6663, 222, 'pas Bon!!', 'mediocre'),
(37, 121212111, 111, 'capacité moyenne ,pas mal', 'moyen'),
(39, 963325, 111, 'La qualité n\'est pas excellente mais bonne surtout par rapport au prix', 'moyen'),
(44, 9595, 6253, 'mediocre!!!!!!!!!!!!!!!!!!!!!!!!!!!!', 'mediocre'),
(47, 9595, 111, 'bonne qualité!', 'moyen'),
(58, 6663, 3, 'medocre', 'mediocre'),
(73, 8541, 6, 'mmmmmmmmmmm!!!!!!!!!!!!!!!!!!!!!!!!', 'moyen'),
(80, 66666, 6, 'zsds', 'excellent');

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

DROP TABLE IF EXISTS `client`;
CREATE TABLE IF NOT EXISTS `client` (
  `idClient` int(11) NOT NULL AUTO_INCREMENT,
  `nbrAvertissement` int(11) NOT NULL,
  `ban` int(1) NOT NULL,
  `dateDebutBlock` date DEFAULT NULL,
  `dateFinBlock` date DEFAULT NULL,
  PRIMARY KEY (`idClient`)
) ENGINE=InnoDB AUTO_INCREMENT=6264 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`idClient`, `nbrAvertissement`, `ban`, `dateDebutBlock`, `dateFinBlock`) VALUES
(1, 0, 0, '2022-02-11', '2022-02-11'),
(2, 1, 0, '2022-02-02', '2022-02-02'),
(3, 0, 0, '2022-02-09', '2022-02-01'),
(4, 2, 0, '2022-02-11', '2022-02-11'),
(5, 1, 0, '2022-02-02', '2022-02-02'),
(6, 1, 0, '2022-02-11', '2022-02-11'),
(111, 0, 0, '2022-02-08', '2022-02-15'),
(222, 0, 0, '2022-02-13', '2022-02-15'),
(6253, 0, 0, '2022-02-17', '2022-02-22'),
(6257, 0, 0, NULL, NULL),
(6258, 0, 0, NULL, NULL),
(6263, 0, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `commande`
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
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `commande`
--

INSERT INTO `commande` (`idCommande`, `idClient`, `adresse`, `prix`, `livree`, `DateCommande`) VALUES
(13, 111, 'Monastir', 402, 1, '2022-02-25'),
(14, 111, 'Ghazala', 402, 1, '2022-02-25'),
(15, 111, 'Ariana', 301.5, 1, '2022-02-25'),
(16, 111, 'binzert', 100.5, 0, '2022-02-25'),
(17, 111, 'charguiya', 1105.5, 0, '2022-02-25'),
(18, 111, 'souusa', 100.5, 0, '2022-02-25'),
(20, 111, 'manzah1', 105, 0, '2022-03-05'),
(21, 111, 'Ariana', 80, 0, '2022-03-07'),
(26, 1, 'Dar fathal', 370, 0, '2022-03-07'),
(27, 1, 'nasr2', 35, 0, '2022-03-07'),
(28, 1, 'gammarth', 7482.5, 0, '2022-03-07'),
(30, 3, 'marssa', 7445, 0, '2022-03-08');

-- --------------------------------------------------------

--
-- Structure de la table `commentaire`
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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `commentaire`
--

INSERT INTO `commentaire` (`idCommentaire`, `idPublication`, `description`, `idClient`, `date`) VALUES
(1, 1, 'Oééééééééééééééééé ça serait superbe ahla', 3, '2022-02-26'),
(2, 1, 'c\'est quoi ce truc là?', 2, '2022-02-26'),
(3, 1, 'une erreur qui n\'aurait pas due etre faite!!!!!!!! modif test', 1, '2022-02-26'),
(4, 2, 'Commentaire de test', 5, '2022-02-26'),
(5, 2, 'Confirmation test', 1, '2022-02-26'),
(6, 1, '!!', 1, '2022-03-03'),
(7, 1, 'Test commentaire', 3, '2022-03-08');

-- --------------------------------------------------------

--
-- Structure de la table `doctrine_migration_versions`
--

DROP TABLE IF EXISTS `doctrine_migration_versions`;
CREATE TABLE IF NOT EXISTS `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20220407213106', '2022-04-07 21:35:21', 635);

-- --------------------------------------------------------

--
-- Structure de la table `evenement`
--

DROP TABLE IF EXISTS `evenement`;
CREATE TABLE IF NOT EXISTS `evenement` (
  `reference` int(11) NOT NULL,
  `dateDebut` date NOT NULL,
  `dateFin` date NOT NULL,
  `localisation` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `nbrParticipant` int(11) NOT NULL,
  `Titre` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`reference`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `evenement`
--

INSERT INTO `evenement` (`reference`, `dateDebut`, `dateFin`, `localisation`, `description`, `nbrParticipant`, `Titre`) VALUES
(1, '2022-03-09', '2022-03-11', 'manzah1', 'Room 4 vs 4  (Heure15:00 =>18:00)', 30, 'free fire'),
(4, '2022-03-08', '2022-03-12', 'manzah3', 'Serveur LifeTrap (Heure=20:00->21:00)', 20, 'GTA'),
(7, '2022-03-17', '2022-03-18', 'aindrahem', 'en ligne sur www.nimo.tv/wassimos', 25, 'Fortinate'),
(13, '2022-04-01', '2022-04-27', 'monastir', 'lien serveur : 51.38.60.53:27015', 1, 'CC'),
(15, '2022-03-08', '2022-03-16', 'benzart', 'Room Survive at 21:00pm', 50, 'free fire'),
(107, '2022-03-16', '2022-03-18', 'gammarth', 'Tirage at 21:00pm', 30, 'Trovo ');

-- --------------------------------------------------------

--
-- Structure de la table `lignecommande`
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
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `lignecommande`
--

INSERT INTO `lignecommande` (`idLigne`, `idCommande`, `idProduit`, `quantite`, `prix`) VALUES
(2, 20, 6663, 3, 105),
(3, 21, 123, 1, 80),
(7, 0, 107, 1, 170),
(8, 0, 9595, 1, 38),
(11, 26, 107, 1, 170),
(12, 26, 8541, 1, 200),
(15, 27, 6663, 1, 35),
(16, 28, 107, 1, 170),
(17, 28, 66666, 1, 7312.5),
(20, 30, 123, 1, 80),
(21, 30, 963325, 3, 52.5),
(22, 30, 66666, 1, 7312.5);

-- --------------------------------------------------------

--
-- Structure de la table `livraison`
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
-- Déchargement des données de la table `livraison`
--

INSERT INTO `livraison` (`idCommande`, `idLivreur`, `DateHeure`) VALUES
(13, 3, '2022-03-31'),
(14, 3, '2022-04-01'),
(15, 3, '2022-01-08');

-- --------------------------------------------------------

--
-- Structure de la table `livreur`
--

DROP TABLE IF EXISTS `livreur`;
CREATE TABLE IF NOT EXISTS `livreur` (
  `idLivreur` int(11) NOT NULL AUTO_INCREMENT,
  `disponibilite` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`idLivreur`)
) ENGINE=InnoDB AUTO_INCREMENT=6254 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `livreur`
--

INSERT INTO `livreur` (`idLivreur`, `disponibilite`) VALUES
(3, 1),
(4, 1),
(6, 1),
(6253, 1);

-- --------------------------------------------------------

--
-- Structure de la table `moderateur`
--

DROP TABLE IF EXISTS `moderateur`;
CREATE TABLE IF NOT EXISTS `moderateur` (
  `id_moderateur` int(11) NOT NULL,
  PRIMARY KEY (`id_moderateur`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `moderateur`
--

INSERT INTO `moderateur` (`id_moderateur`) VALUES
(6254);

-- --------------------------------------------------------

--
-- Structure de la table `participation`
--

DROP TABLE IF EXISTS `participation`;
CREATE TABLE IF NOT EXISTS `participation` (
  `idParticipation` int(11) NOT NULL AUTO_INCREMENT,
  `idClient` int(11) NOT NULL,
  `idEvent` int(11) NOT NULL,
  `nbrEtoile` int(11) NOT NULL,
  PRIMARY KEY (`idParticipation`,`idClient`,`idEvent`),
  KEY `fk_participation_event` (`idEvent`),
  KEY `fk_client_participation` (`idClient`)
) ENGINE=InnoDB AUTO_INCREMENT=186 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `participation`
--

INSERT INTO `participation` (`idParticipation`, `idClient`, `idEvent`, `nbrEtoile`) VALUES
(140, 4, 1, 4),
(141, 1, 4, 4),
(145, 1, 6, 4),
(148, 1, 11, 4),
(174, 1, 1, 4),
(179, 4, 13, 4),
(180, 4, 15, 4),
(181, 4, 107, 4),
(183, 3, 15, 4),
(184, 4, 20, 4),
(185, 5, 20, 4);

-- --------------------------------------------------------

--
-- Structure de la table `personne`
--

DROP TABLE IF EXISTS `personne`;
CREATE TABLE IF NOT EXISTS `personne` (
  `id_personne` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `prenom` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `dateNaissance` date NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `telephone` int(11) NOT NULL,
  `password` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_personne`)
) ENGINE=InnoDB AUTO_INCREMENT=6264 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `personne`
--

INSERT INTO `personne` (`id_personne`, `nom`, `prenom`, `dateNaissance`, `email`, `telephone`, `password`) VALUES
(1, 'zied', 'dridi', '1998-02-26', 'zieddr@gmail.com', 52848053, '00596579909133128857366812370456'),
(2, 'marwa', 'ayari', '2001-02-02', 'marouamouchayari@esprit.tn', 54342461, '00596579909133128857366812370456'),
(3, 'Ahmed', 'Mezni', '2022-02-09', 'ahmed.mezni@esprit.tn', 84562357, '00596579909133128857366812370456'),
(4, 'Azer', 'Lahmer', '2022-02-01', 'azer.lahmar@esprit.tn', 78945612, '00596579909133128857366812370456'),
(5, 'Amir', 'Ben Salah', '2022-02-11', 'amir.bensalah@esprit.tn', 54405584, '00596579909133128857366812370456'),
(6, 'Maher', 'Gasmi', '2022-02-11', 'maher.gasmi@esprit.tn', 54123321, '00596579909133128857366812370456'),
(111, 'marwa', 'ayari', '2001-02-02', 'maroua.ayari@esprit.tn', 54342461, '00596579909133128857366812370456'),
(222, 'cft', 'yugy', '2022-02-09', 'ahmedcft@esprit.tn', 84562357, '00596579909133128857366812370456'),
(6253, 'zied', 'satour', '2022-02-01', 'zied.satour@esprit.tn', 78945612, '00596579909133128857366812370456'),
(6254, 'amir', 'ben salah', '1999-11-15', 'amir123456@gmail.com', 54405584, '88004154284563470631637701913168'),
(6255, 'test', 'test', '1999-11-15', 'amir12345677@gmail.com', 54405584, '88004154284563470631637701913168'),
(6257, 'test', 'test', '1995-03-24', 'ziedziedzied@gmail.com', 12345678, '66080320515123720393070106134373'),
(6258, 'wouh', 'bayalt', '1999-03-25', 'wouhyarabi@gmail.com', 12345678, '70355847977890947371579195958021'),
(6259, 'Wassim', 'Dhieb', '1999-01-01', 'wassim.dhieb@gmail.com', 25508133, '123'),
(6260, 'Syblos', 'jemel', '1997-12-09', 'syblos.jamel@gmail.com', 54405584, 'pwd'),
(6261, 'Ben Mellessa', 'Aziz', '1999-03-18', 'azizos.chafcha@gmail.com', 54405584, ''),
(6262, 'nouha', 'ben salah', '1999-03-12', 'nouha123@gmail.com', 54405588, '30332679036192635855527470248651'),
(6263, 'nouha', 'bn salah', '1999-03-04', 'amir123456789@gmail.com', 54405584, '00596579909133128857366812370456');

-- --------------------------------------------------------

--
-- Structure de la table `plan`
--

DROP TABLE IF EXISTS `plan`;
CREATE TABLE IF NOT EXISTS `plan` (
  `idPlan` int(11) NOT NULL AUTO_INCREMENT,
  `idStreamer` int(11) NOT NULL,
  `date` date NOT NULL,
  `heure` time NOT NULL,
  `duree` float NOT NULL,
  `description` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `idEvenement` int(11) NOT NULL,
  PRIMARY KEY (`idPlan`,`idStreamer`),
  KEY `fk_plan_streamer` (`idStreamer`),
  KEY `fk_plan_evenement` (`idEvenement`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `plan`
--

INSERT INTO `plan` (`idPlan`, `idStreamer`, `date`, `heure`, `duree`, `description`, `idEvenement`) VALUES
(2, 6259, '2022-01-01', '11:11:11', 5, 'GTA 5 3h et ff 2h', 1),
(3, 6259, '2022-01-10', '11:11:11', 5, 'Boutoula 15:00 ff', 1),
(5, 6259, '2022-01-01', '11:11:13', 4, 'FIFA', 1),
(6, 6259, '2022-04-14', '11:11:11', 5, 'Fortenite', 13);

-- --------------------------------------------------------

--
-- Structure de la table `produit`
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
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`reference`, `libelle`, `categorie`, `description`, `prix`, `note`, `img`) VALUES
(107, 'REDRAGON H510 ZEUS 2 USB 7.1', 'Casque gaming', 'blabla', 170, 0, 'b1b8f41f561a90194bfeffe623aaea87.png'),
(123, 'RedDragonKumara', 'clavier', 'bon', 80, 0, '111796b1b907d625fa130fa928a11854.png'),
(745, 'GAMING PC : Ryzen 5 3600', 'GamingPc', 'GTX 1650 OC GDDR6 - RAM 16GO', 1975, 0, '6789d0845fb360d04541e998bdab7c40.png'),
(6663, 'AsusMouse6', 'souris', 'Souris qui accompagne AsusGaming5', 170.5, -2, '8724117e0821057473da9a59193bed17.png'),
(8524, 'Souris MSI', 'Souris', 'dzsq', 70, 0, '942c4a4916c792e7cbbdee5aa3e55b2f.png'),
(8541, 'EcranSamsung', 'ecran', 'ecran cinéma 2D', 200, 0, '6bb18149a5ed85fb832a277254250934.png'),
(9595, 'DragonBleuRGB', 'Clavier', 'souris avec lumière ...', 190, 2, '34c467f1fbda3ace79af54f29fc6f3b4.png'),
(66666, 'AsusGaming 5', 'PC', 'Tout ce qu\'il vous faut pour jouer à vos jeux préférés', 7312.56, 0, '3b1682c090313717013cebcb3b2b1fd9.png'),
(963325, 'PRO-M3', 'Souris', 'Souris gaming', 17.5, 2, '5f512bf737d7d45e404323da83dacc13.png'),
(121212111, 'AsusVivoBook8', 'PC', 'pc pour étudiants avec options...', 3233.83, 1, '6a987640b7db855cb49eb0210705d857.png');

-- --------------------------------------------------------

--
-- Structure de la table `publication`
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
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `publication`
--

INSERT INTO `publication` (`idPublication`, `object`, `description`, `archive`, `idClient`, `date`) VALUES
(1, 'Bonjour, avez vous joué Elden Ring ?', 'J\'arrive pas a le télécharger mois-meme :(', 0, 1, '2022-02-25'),
(2, 'je cherche 4 personnes pour room 4 vs 4 contre op', '3 pc player au moins', 0, 2, '2022-02-26'),
(6, 'Pub archivé', '', 1, 1, '2022-02-26'),
(7, 'Lien azizos svp ', 'Urgent', 1, 1, '2022-02-26'),
(10, 'serveur gtrp', 'quelle est le meilleur serveur gta rp', 1, 5, '2022-02-28'),
(11, 'FIfa', 'skin sakoura failed', 1, 5, '2022-03-07'),
(12, 'On a besoin de qq qui joue a free fire ', 'contactez moi sur contact@email.com', 0, 4, '2022-03-07'),
(13, 'Minecraft en tunisie', 'Avez vous des serveur mc tunisiens ?', 0, 1, '2022-03-07'),
(14, 'Test', '', 0, 3, '2022-03-08');

-- --------------------------------------------------------

--
-- Structure de la table `streamer`
--

DROP TABLE IF EXISTS `streamer`;
CREATE TABLE IF NOT EXISTS `streamer` (
  `idStreamer` int(11) NOT NULL AUTO_INCREMENT,
  `informations` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `lienStreaming` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`idStreamer`)
) ENGINE=InnoDB AUTO_INCREMENT=6262 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `streamer`
--

INSERT INTO `streamer` (`idStreamer`, `informations`, `lienStreaming`) VALUES
(6259, 'Tunisien Streamer Born in Sfax ', 'www.nimo.tv/wassimos'),
(6260, 'Morroc Streamers Born in Casa ', 'www.nono.com/syblos'),
(6261, 'Tunisien Streamers Born in Zaghwane ', 'www.nimo.tv/azizos');

-- --------------------------------------------------------

--
-- Structure de la table `vote`
--

DROP TABLE IF EXISTS `vote`;
CREATE TABLE IF NOT EXISTS `vote` (
  `idClient` int(11) NOT NULL,
  `idPublication` int(11) NOT NULL,
  `type` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`idClient`,`idPublication`),
  KEY `fk_vote_publication` (`idPublication`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `vote`
--

INSERT INTO `vote` (`idClient`, `idPublication`, `type`) VALUES
(0, 1, 'UP'),
(0, 2, 'DOWN'),
(1, 1, 'UP'),
(1, 2, 'DOWN'),
(2, 1, 'UP'),
(3, 1, 'DOWN'),
(3, 2, 'DOWN'),
(4, 1, 'UP'),
(4, 11, 'UP'),
(5, 1, 'UP'),
(5, 8, 'DOWN'),
(5, 10, 'UP');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `fk_admin_personne` FOREIGN KEY (`id_admin`) REFERENCES `personne` (`id_personne`);

--
-- Contraintes pour la table `avis`
--
ALTER TABLE `avis`
  ADD CONSTRAINT `fk_avis_client` FOREIGN KEY (`idClient`) REFERENCES `client` (`idClient`),
  ADD CONSTRAINT `fk_avis_produit` FOREIGN KEY (`referenceProduit`) REFERENCES `produit` (`reference`);

--
-- Contraintes pour la table `client`
--
ALTER TABLE `client`
  ADD CONSTRAINT `fk_client_personne` FOREIGN KEY (`idClient`) REFERENCES `personne` (`id_personne`);

--
-- Contraintes pour la table `commande`
--
ALTER TABLE `commande`
  ADD CONSTRAINT `fk_client_commande` FOREIGN KEY (`idClient`) REFERENCES `client` (`idClient`);

--
-- Contraintes pour la table `livreur`
--
ALTER TABLE `livreur`
  ADD CONSTRAINT `fk_livreur` FOREIGN KEY (`idLivreur`) REFERENCES `personne` (`id_personne`);

--
-- Contraintes pour la table `participation`
--
ALTER TABLE `participation`
  ADD CONSTRAINT `fk_client_participation` FOREIGN KEY (`idClient`) REFERENCES `client` (`idClient`);

--
-- Contraintes pour la table `streamer`
--
ALTER TABLE `streamer`
  ADD CONSTRAINT `fk_streamer_personne` FOREIGN KEY (`idStreamer`) REFERENCES `personne` (`id_personne`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

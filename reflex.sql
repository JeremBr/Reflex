-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 03, 2020 at 08:29 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `reflex`
--

-- --------------------------------------------------------

--
-- Table structure for table `cgu`
--

DROP TABLE IF EXISTS `cgu`;
CREATE TABLE IF NOT EXISTS `cgu` (
  `numArticle` int(2) NOT NULL AUTO_INCREMENT,
  `texte` text DEFAULT NULL,
  `article` text DEFAULT NULL,
  PRIMARY KEY (`numArticle`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cgu`
--

INSERT INTO `cgu` (`numArticle`, `texte`, `article`) VALUES
(3, 'L\'accÃ¨s au Site est possible 24 heures sur 24, 7 jours sur 7, sauf en cas d\'Ã©ventuelles pannes du Site ainsi que des interventions de maintenance nÃ©cessaires au bon fonctionnement du Site. ', 'Article 1.1'),
(4, 'Le service clientÃ¨le est disponible par tÃ©lÃ©phone au 01 42 22 33 44 du lundi au vendredi de 9h00 Ã  18h00.', 'Article 1.2'),
(5, 'Le compte ouvert par lâ€™Utilisateur est personnel. Lâ€™Utilisateur est seul responsable de sa gestion et de son utilisation. Toute connexion effectuÃ©e dans le cadre de lâ€™utilisation des Services sera rÃ©putÃ©e avoir Ã©tÃ© rÃ©alisÃ©e par lâ€™Utilisateur et sous sa responsabilitÃ© exclusive.', 'Article 2.1'),
(6, 'Lâ€™Utilisateur demeure lâ€™unique responsable de la protection du mot de passe quâ€™il utilise pour accÃ©der aux Services ainsi que pour lâ€™ensemble des actions nÃ©cessitant une authentification avec mot de passe sur le Site.', 'Article 2.2'),
(7, 'Les Utilisateurs sont informÃ©s que des traceurs (Â« Cookies Â») sont utilisÃ©s lors de la consultation du Site. Les Utilisateurs sont invitÃ©s Ã  prendre connaissance de la Politique dÃ©diÃ©e liÃ©e Ã  la gestion des cookies.', 'Article 3'),
(8, 'Les CGU sont soumises Ã  la loi franÃ§aise.', 'Article 4');

-- --------------------------------------------------------

--
-- Table structure for table `faq`
--

DROP TABLE IF EXISTS `faq`;
CREATE TABLE IF NOT EXISTS `faq` (
  `numArticle` int(2) NOT NULL AUTO_INCREMENT,
  `question` text DEFAULT NULL,
  `reponse` text DEFAULT NULL,
  PRIMARY KEY (`numArticle`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faq`
--

INSERT INTO `faq` (`numArticle`, `question`, `reponse`) VALUES
(2, 'Qui Sommes-nous ?', 'Infinite Measures est un installateur de solutions Â«clÃ© en mainÂ» pour les centres dâ€™Ã©valuation psychotechniques. Nous dÃ©veloppons les tests qui prouve que vous Ãªtes capable de conduire!'),
(3, 'A quoi servent les tests ?', 'Les tests que nous produisons permettent de dÃ©terminer l\'aptitude ou non d\'un conducteur Ã  repasser le code aprÃ¨s que ce dernier le lui ait Ã©tÃ© retirÃ©.'),
(4, 'OÃ¹ puis-je consulter mes tests ?', 'Les tests sont disponible dans la rubrique Â«Mes rÃ©sultatsÂ» dans votre espace personnel.'),
(17, 'Qui peut voir mes rÃ©sultats ?', 'Les seuls personnes pouvant avoir accÃ¨s Ã  vos rÃ©sultats sont vous et les  gestionnaires des tests. Nous tenons Ã  ce que ces infos restent confidentiels pour le  bien de nos clients.');

-- --------------------------------------------------------

--
-- Table structure for table `invitation`
--

DROP TABLE IF EXISTS `invitation`;
CREATE TABLE IF NOT EXISTS `invitation` (
  `mail` varchar(50) NOT NULL,
  `token` varchar(256) NOT NULL,
  `temps` int(10) NOT NULL,
  PRIMARY KEY (`mail`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invitation`
--

INSERT INTO `invitation` (`mail`, `token`, `temps`) VALUES
('34youki@gmail.com', '833da48e3db2e7c74be94262f7c2558bdfac0f5d39e88eacc0ad999e02ee052804def7946c28c4e44c5fd366ec628974fabbc42bf2b47975cb41f388073086cf', 1591133937),
('t@t.t', '9e34082818a8c92e730373e56d186427f4a178d34eff08ada395e1367ad2c4afb2f0eb59fa37242808ad47ae59a6e6dd7f03159f36d2c920cba933fe13ceea24', 1591188966);

-- --------------------------------------------------------

--
-- Table structure for table `online`
--

DROP TABLE IF EXISTS `online`;
CREATE TABLE IF NOT EXISTS `online` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `time` int(11) NOT NULL,
  `ipUser` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `online`
--

INSERT INTO `online` (`id`, `time`, `ipUser`) VALUES
(1, 1591215671, '::1');

-- --------------------------------------------------------

--
-- Table structure for table `oublie`
--

DROP TABLE IF EXISTS `oublie`;
CREATE TABLE IF NOT EXISTS `oublie` (
  `mail` varchar(50) NOT NULL,
  `token` varchar(256) NOT NULL,
  `temps` int(10) NOT NULL,
  PRIMARY KEY (`mail`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

DROP TABLE IF EXISTS `test`;
CREATE TABLE IF NOT EXISTS `test` (
  `idTest` int(11) NOT NULL AUTO_INCREMENT,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `idUtilisateur` int(11) NOT NULL,
  `comment` text DEFAULT NULL,
  `RecoTona` int(100) DEFAULT NULL,
  `freqCard` int(100) DEFAULT NULL,
  `temperature` int(100) DEFAULT NULL,
  `refSonore` int(100) DEFAULT NULL,
  `refVisuel` int(100) DEFAULT NULL,
  PRIMARY KEY (`idTest`),
  KEY `idUtilisateur` (`idUtilisateur`)
) ENGINE=InnoDB AUTO_INCREMENT=115 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`idTest`, `date`, `idUtilisateur`, `comment`, `RecoTona`, `freqCard`, `temperature`, `refSonore`, `refVisuel`) VALUES
(111, '2020-06-03 19:56:53', 47, 'yes', 92, 94, 39, 47, 32),
(112, '2020-06-03 19:58:11', 47, 'j', 84, 84, 42, 43, 44),
(113, '2020-06-03 20:09:29', 47, 'yo', 89, 111, 40, 46, 34),
(114, '2020-06-03 20:13:57', 47, 'ah', 90, 78, 36, 46, 47);

-- --------------------------------------------------------

--
-- Table structure for table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `idUtilisateur` int(11) NOT NULL AUTO_INCREMENT,
  `permission` int(1) NOT NULL DEFAULT 0,
  `mail` varchar(50) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `genre` varchar(50) NOT NULL,
  `motDePasse` varchar(128) NOT NULL,
  `codePostale` int(5) DEFAULT NULL,
  `adresse` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idUtilisateur`),
  KEY `mail` (`mail`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `utilisateur`
--

INSERT INTO `utilisateur` (`idUtilisateur`, `permission`, `mail`, `nom`, `prenom`, `genre`, `motDePasse`, `codePostale`, `adresse`) VALUES
(1, 2, 'admin@a.a', 'admin', 'admin', 'Homme', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918', 75000, '1 rue Georges'),
(2, 1, 'gestionnaire@g.g', 'gestio', 'gestio', 'Femme', 'f340e6820faa25216612579cca03588f1578f6eab6d7c509f246bf6180600ab1', NULL, NULL),
(47, 0, 'jeremy.breton34@gmail.com', 'Breton', 'JÃ©rÃ©my', 'Femme', '85139b56e271594fce7a6ee559107152138d289129bb5dd5f84ee9bc897d5ba9', NULL, NULL);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `test`
--
ALTER TABLE `test`
  ADD CONSTRAINT `test_ibfk_1` FOREIGN KEY (`idUtilisateur`) REFERENCES `utilisateur` (`idUtilisateur`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

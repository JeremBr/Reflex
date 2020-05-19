-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 19, 2020 at 01:45 PM
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
-- Table structure for table `faq`
--

DROP TABLE IF EXISTS `faq`;
CREATE TABLE IF NOT EXISTS `faq` (
  `numArticle` int(2) NOT NULL,
  `question` text NOT NULL,
  `reponse` text NOT NULL,
  PRIMARY KEY (`numArticle`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faq`
--

INSERT INTO `faq` (`numArticle`, `question`, `reponse`) VALUES
(1, 'Qui Sommes-nous ?', 'Infinite Measures est un installateur de solutions «clé en main» pour les centres d’évaluation psychotechniques. Nous développons les tests qui prouve que vous êtes capable de conduire!'),
(2, 'A quoi servent les tests ?', 'Les tests que nous produisons permettent de déterminer l\'aptitude ou non d\'un conducteur à repasser le code après que ce dernier le lui ait été retiré.'),
(3, 'Où puis-je consulter mes tests ?', 'Les tests sont disponible dans la rubrique «Mes résultats» dans votre espace personnel.'),
(4, 'Qui peut voir mes résultats ?', 'Les seuls personnes pouvant avoir accès à vos résultats sont vous et les  gestionnaires des tests. Nous tenons à ce que ces infos restent confidentiels pour le  bien de nos clients.');

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
('ghizghiz333@gmail.com', '506901f42b5933a15fd3993ef5ffeb9f0f0c7c24594509c3955e639dfdedc8ff4fc0c5f1ff5f3e54e2a990f05a42ae38e92d006f488b279523ab1c508dffdb9d', 1588338416);

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
(1, 1589895159, '::1');

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
) ENGINE=InnoDB AUTO_INCREMENT=59 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`idTest`, `date`, `idUtilisateur`, `comment`, `RecoTona`, `freqCard`, `temperature`, `refSonore`, `refVisuel`) VALUES
(49, '2020-05-17 10:06:06', 33, NULL, 94, 95, 36, 41, 42),
(50, '2020-05-17 10:07:26', 33, NULL, 80, 97, 40, 43, 35),
(51, '2020-05-17 10:10:30', 33, NULL, 87, 121, 42, 41, 43),
(52, '2020-05-18 20:35:12', 33, NULL, 100, NULL, NULL, NULL, NULL),
(53, '2020-05-18 21:20:49', 35, NULL, 92, 89, 37, 43, 50),
(54, '2020-05-18 21:48:13', 40, NULL, 88, 127, 38, 42, 30),
(55, '2020-05-19 08:50:52', 40, NULL, 86, 120, 42, 44, 47),
(56, '2020-05-19 09:04:11', 40, NULL, 85, 102, 37, 41, 43),
(57, '2020-05-19 12:50:15', 40, NULL, 86, NULL, NULL, NULL, NULL),
(58, '2020-05-19 13:11:49', 40, NULL, 93, 108, 36, 46, NULL);

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
  `motDePasse` varchar(50) NOT NULL,
  `codePostale` int(5) DEFAULT NULL,
  `adresse` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idUtilisateur`),
  KEY `mail` (`mail`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `utilisateur`
--

INSERT INTO `utilisateur` (`idUtilisateur`, `permission`, `mail`, `nom`, `prenom`, `genre`, `motDePasse`, `codePostale`, `adresse`) VALUES
(33, 2, 'admin@a.a', 'admin', 'admin', 'Dieu', 'd033e22ae348aeb5660fc2140aec35850c4da997', 75000, '5 rue Georges-Duroy'),
(35, 1, 'gestionnaire@g.g', 'Gestio', 'nnaire', 'Femme', '893cf2f5edbc8c751c5f84db8d169a7b0db0348c', NULL, NULL),
(40, 0, 'jeremy.breton34@gmail.com', 'Breton', 'JÃ©rÃ©my', 'Homme', 'fc966032263a566c21c36a9bde2d8dec5e7b15d8', NULL, NULL),
(42, 0, '34youki@gmail.com', 'test', 'test', 'Femme', 'd009588e44424bfb9192d01316bbb7a74370a017', NULL, NULL);

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

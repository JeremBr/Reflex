-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 21, 2020 at 08:29 PM
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
(1, 1590092288, '::1');

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

--
-- Dumping data for table `oublie`
--

INSERT INTO `oublie` (`mail`, `token`, `temps`) VALUES
('jeremy.breton34@gmail.com', 'bfc8368a6fa4ef5e261a11fcb346f7cb564ea077fb2d56f722bf8f78f71204cd6457d02b3b3673cc63be2892ab3d1b81f06be5c3e611180a8c29545e51f76199', 1590085149);

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
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `utilisateur`
--

INSERT INTO `utilisateur` (`idUtilisateur`, `permission`, `mail`, `nom`, `prenom`, `genre`, `motDePasse`, `codePostale`, `adresse`) VALUES
(1, 2, 'admin@a.a', 'admin', 'admin', 'Homme', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918', 75000, '1 rue Georges-Duroy'),
(2, 1, 'gestionnaire@g.g', 'gestio', 'gestio', 'Femme', 'f340e6820faa25216612579cca03588f1578f6eab6d7c509f246bf6180600ab1', NULL, NULL),
(44, 0, 'jeremy.breton34@gmail.com', 'JÃ©rÃ©my', 'JÃ©rÃ©my', 'Homme', '85139b56e271594fce7a6ee559107152138d289129bb5dd5f84ee9bc897d5ba9', 92130, '29-31 rue Victor Hugo');

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

-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 30, 2020 at 10:50 AM
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
  `date` date NOT NULL,
  `idUtilisateur` int(11) NOT NULL,
  PRIMARY KEY (`idTest`),
  KEY `idUtilisateur` (`idUtilisateur`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `utilisateur`
--

INSERT INTO `utilisateur` (`idUtilisateur`, `permission`, `mail`, `nom`, `prenom`, `genre`, `motDePasse`, `codePostale`, `adresse`) VALUES
(33, 2, 'admin@a.a', 'admin', 'admin', 'Dieu', 'd033e22ae348aeb5660fc2140aec35850c4da997', NULL, NULL);

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

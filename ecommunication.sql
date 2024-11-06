-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : sam. 20 avr. 2024 à 16:31
-- Version du serveur : 8.0.31
-- Version de PHP : 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `ecommunication`
--

-- --------------------------------------------------------

--
-- Structure de la table `administration`
--

DROP TABLE IF EXISTS `administration`;
CREATE TABLE IF NOT EXISTS `administration` (
  `Pk` int NOT NULL AUTO_INCREMENT,
  `Nom` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_zh_0900_as_cs NOT NULL,
  `Prenom` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_zh_0900_as_cs NOT NULL,
  `Date_de_naissance` date NOT NULL,
  `Genre` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_zh_0900_as_cs NOT NULL,
  `Poste` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_zh_0900_as_cs NOT NULL,
  `Telephone` int NOT NULL,
  `Cin` int NOT NULL,
  `Mail` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_zh_0900_as_cs NOT NULL,
  PRIMARY KEY (`Pk`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Structure de la table `avances`
--

DROP TABLE IF EXISTS `avances`;
CREATE TABLE IF NOT EXISTS `avances` (
  `PK` int NOT NULL AUTO_INCREMENT,
  `AV_Valeur` varchar(20) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `User_key` varchar(15) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `AV_Date` date NOT NULL,
  PRIMARY KEY (`PK`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `avances`
--

INSERT INTO `avances` (`PK`, `AV_Valeur`, `User_key`, `AV_Date`) VALUES
(1, '200', '1238619817', '2024-03-15'),
(2, '50', '1238619817', '2024-03-31');

-- --------------------------------------------------------

--
-- Structure de la table `conge`
--

DROP TABLE IF EXISTS `conge`;
CREATE TABLE IF NOT EXISTS `conge` (
  `PK` int NOT NULL AUTO_INCREMENT,
  `NB_Jour` varchar(20) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `User_key` varchar(15) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `De_Date` date NOT NULL,
  `Vers_Date` date NOT NULL,
  PRIMARY KEY (`PK`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `conge`
--

INSERT INTO `conge` (`PK`, `NB_Jour`, `User_key`, `De_Date`, `Vers_Date`) VALUES
(4, '10', '1238619817', '2024-04-01', '2024-04-10');

-- --------------------------------------------------------

--
-- Structure de la table `employee`
--

DROP TABLE IF EXISTS `employee`;
CREATE TABLE IF NOT EXISTS `employee` (
  `PK` bigint NOT NULL AUTO_INCREMENT,
  `Nom` varchar(20) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `Prenom` varchar(20) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `date_de_naissance` date NOT NULL,
  `Genre` varchar(10) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `Telephone` int NOT NULL,
  `Cin` int NOT NULL,
  `Mail` varchar(30) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `Code` int NOT NULL,
  `Mdp` int NOT NULL,
  `Photo` longblob NOT NULL,
  `message_Sent` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `UserKey` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  PRIMARY KEY (`PK`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `employee`
--

INSERT INTO `employee` (`PK`, `Nom`, `Prenom`, `date_de_naissance`, `Genre`, `Telephone`, `Cin`, `Mail`, `Code`, `Mdp`, `Photo`, `message_Sent`, `UserKey`) VALUES
(1, '\0\0Mr', 'Houssem', '2024-03-01', 'Male', 123456, 123456, 'mail@gmail.com', 2024, 2024, '', '', '123568549'),
(3, 'Asma', 'melliti', '2003-10-01', 'femme', 56902826, 14459653, '', 2020, 12345678, '', '', '1238619817'),
(6, 'chokri', 'melliti', '2024-04-13', 'homme', 80709050, 1234, 'mail15@gmail.com', 123456, 20508070, '', 'rien', '1047464039'),
(11, 'blaaa', 'Blaa', '2024-03-14', 'femme', 60907090, 56789087, 'maoKK@gmail.com', 123455, 1234567, '', 'rien', '2135343026'),
(12, 'romdhani', 'nour', '2003-03-20', 'femme', 96292730, 143669297, 'nourroumdhani@gmail.com', 123456, 96292730, '', 'NOURRR', '1654682575');

-- --------------------------------------------------------

--
-- Structure de la table `message_contents`
--

DROP TABLE IF EXISTS `message_contents`;
CREATE TABLE IF NOT EXISTS `message_contents` (
  `PK` int NOT NULL AUTO_INCREMENT,
  `CID` varchar(20) NOT NULL,
  `M_Sender` varchar(20) NOT NULL,
  `M_Receiver` varchar(10) NOT NULL,
  `type` varchar(500) NOT NULL,
  `M_Message` varchar(5000) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `M_Subject` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `Genre` varchar(50) NOT NULL,
  `M_Date` date NOT NULL,
  `M_Time` time NOT NULL,
  PRIMARY KEY (`PK`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `message_contents`
--

INSERT INTO `message_contents` (`PK`, `CID`, `M_Sender`, `M_Receiver`, `type`, `M_Message`, `M_Subject`, `Genre`, `M_Date`, `M_Time`) VALUES
(2, '928498498928489', '1238619817', '', 'public', 'bonjour je suis la ', 'mesage 1', 'genre ', '2024-03-01', '10:52:58'),
(3, '1365644745', '', '', 'privee', 'bonjour je ne suis pas la ', 'mesage 2', 'genre ', '2024-03-01', '10:52:58'),
(4, '419842984', '', '', 'privee', 'bonjour je suis la bas ', 'mesage 3', 'genre ', '2024-03-30', '10:52:58'),
(18, '1457584499', '2000642315', '', 'public', 'iubiu', 'pobnmojnmouj', 'Genre', '2024-03-30', '01:05:47');

-- --------------------------------------------------------

--
-- Structure de la table `message_conversations`
--

DROP TABLE IF EXISTS `message_conversations`;
CREATE TABLE IF NOT EXISTS `message_conversations` (
  `PK` int NOT NULL AUTO_INCREMENT,
  `CID` varchar(20) NOT NULL,
  `C_Genre` varchar(100) NOT NULL,
  `UserKey_Start` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `UserKey_Recive` varchar(10) NOT NULL,
  `StartedAt` date NOT NULL,
  PRIMARY KEY (`PK`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `message_conversations`
--

INSERT INTO `message_conversations` (`PK`, `CID`, `C_Genre`, `UserKey_Start`, `UserKey_Recive`, `StartedAt`) VALUES
(1, '419842984', 'sent', '1238619817', '1238619817', '2024-03-14'),
(2, '91498498498498', 'sent', '1238619817', '123568549', '2024-03-22');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mar. 16 juin 2020 à 21:47
-- Version du serveur :  5.7.26
-- Version de PHP :  7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `bd_search`
--

-- --------------------------------------------------------

--
-- Structure de la table `filespdf`
--

DROP TABLE IF EXISTS `filespdf`;
CREATE TABLE IF NOT EXISTS `filespdf` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET latin1 NOT NULL,
  `name` varchar(255) CHARACTER SET latin1 NOT NULL,
  `description` varchar(255) CHARACTER SET latin1 NOT NULL,
  `type` varchar(255) CHARACTER SET latin1 NOT NULL,
  `date_up` date DEFAULT NULL,
  `path_file` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=32 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `filespdf`
--

INSERT INTO `filespdf` (`id`, `title`, `name`, `description`, `type`, `date_up`, `path_file`) VALUES
(26, 'cours7 écore', 'NETCore-partie1.pdf', '.net core écore èt', 'application/pdf', '2020-05-19', 'upload/26-NETCore-partie1.pdf'),
(25, 'cours5', 'PowerBi.pdf', 'power bi excel', 'application/pdf', '2020-05-19', 'upload/25-PowerBi.pdf'),
(24, 'cours4', 'Génielogiciel-IOC.pdf', 'génie logiciel', 'application/pdf', '2020-05-19', 'upload/24-Génielogiciel-IOC.pdf'),
(22, 'cours2', 'ASPMVC-Partie2.pdf', 'asp mvc', 'application/pdf', '2020-05-19', 'upload/22-ASPMVC-Partie2.pdf'),
(23, 'cours3', 'ASPWebForms.pdf', 'asp web form', 'application/pdf', '2020-05-19', 'upload/23-ASPWebForms.pdf'),
(21, 'cours1', 'ASPMVC-Partie1.pdf', 'asp mvc', 'application/pdf', '2020-05-19', 'upload/21-ASPMVC-Partie1.pdf'),
(27, 'tp1', 'TP- OutilsWeb.pdf', 'tp outils web', 'application/pdf', '2020-05-19', 'upload/27-TP- OutilsWeb.pdf'),
(28, 'tp01', 'TP1-ASPMVC.pdf', 'asp mvc', 'application/pdf', '2020-05-19', 'upload/28-TP1-ASPMVC.pdf'),
(29, 'tp2', 'TP2 -ASPMVC-.pdf', 'asp mvc', 'application/pdf', '2020-05-19', 'upload/29-TP2 -ASPMVC-.pdf'),
(30, 'tp1 core', 'Tp1NetCore.pdf', 'tp core .net', 'application/pdf', '2020-05-19', 'upload/30-Tp1NetCore.pdf'),
(31, 'tp4', 'TP-BIselfService.pdf', 'tp bi service', 'application/pdf', '2020-05-19', 'upload/31-TP-BIselfService.pdf');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Lun 18 Mai 2015 à 11:27
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `egypte`
--

-- --------------------------------------------------------

--
-- Structure de la table `lieu`
--

CREATE TABLE IF NOT EXISTS `lieu` (
  `NomLieu` varchar(255) NOT NULL DEFAULT '',
  `description` varchar(255) DEFAULT NULL,
  `situation` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`NomLieu`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `lieu`
--

INSERT INTO `lieu` (`NomLieu`, `description`, `situation`) VALUES
('Assouanyydaaz', 'le haut barrage y a inondé la nubie, formant le Lac Nasserazertoqsdhxghhcfg', 'située à la 1ère cataracte du nil aux portes de la  Nubie'),
('Dahchoûr', 'lieu de la 1ère pyramide réussie', 'à quelques km au sud de Saqqara'),
('Dendera', 'Le domaine d''Hathor', 'à 75 km au nord de Louxor'),
('Edfou', 'Royaume du dieu faucon', '100 km au sud de Louxor'),
('Esna', 'Ancienne Iounit', '50 km au sud de Louxor'),
('Giza', 'Plateau de Gizeh', 'surplombe Le Caire'),
('Kom Ombo', 'Ville de l''or', '170 km au sud de louxor'),
('Le Caire', 'capitale actuelle de l''Egypte', 'au pied des pyramides de Gizeh'),
('Meïdoum', 'lieu de la 1ère tentative de pyramide lisse', 'au sud de saqqara'),
('Memphis', 'capitale d''Egypte sous l''ancien empire', '30 km au sud du Caire'),
('Nubie', 'Les temples sauvés des eaux', 'au dela de la 1ère cataracte sur le lac nasser'),
('Saqqara', 'Nécropole de Memphis qui compte plus de quinze pyramides', 'à coté de memphis'),
('Tanis', 'ancienne capitale du delta , actuelle San El Hagar', '130 Km au NE du Caire, 30 km de la méditerranée'),
('Tell El Amarna', 'Capitale du pharaon hérétique', 'à mi-chemin entre Memphis et Thèbes'),
('Thèbes Est', 'Grande capitale du moyen empire: le domaine d''Amon', 'L''actuel Louxor, en moyen Egypte'),
('Thèbes Ouestezqr', 'nécropole de thèbes: le royaume d''Osirisaaaar', 'Face à Louxor sur l''autre rive du nil dans le désert et la montagne');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

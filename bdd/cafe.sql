-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : dim. 04 sep. 2022 à 18:45
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
-- Base de données : `cafe`
--

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

DROP TABLE IF EXISTS `commande`;
CREATE TABLE IF NOT EXISTS `commande` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `prenom` varchar(20) NOT NULL,
  `nom` varchar(20) NOT NULL,
  `choix` int(11) NOT NULL,
  `quantite` int(20) NOT NULL,
  `heure` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `valide` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `choix` (`choix`)
) ENGINE=MyISAM AUTO_INCREMENT=41 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `commande`
--

INSERT INTO `commande` (`id`, `prenom`, `nom`, `choix`, `quantite`, `heure`, `valide`) VALUES
(40, 'virgil ', 'prevost', 12, 2, '2022-09-04 19:41:56', 0),
(32, 'virgil', 'prevost-carpentier', 15, 10, '2022-09-04 16:33:45', 0),
(34, 'virgil', 'e', 14, 14, '2022-09-04 16:36:42', 0),
(38, 'ff', 'f', 2, 2, '2022-09-04 17:32:50', 0),
(36, 'd', 'd', 15, 5, '2022-09-04 16:48:52', 0);

-- --------------------------------------------------------

--
-- Structure de la table `produits`
--

DROP TABLE IF EXISTS `produits`;
CREATE TABLE IF NOT EXISTS `produits` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) NOT NULL,
  `prix` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `produits`
--

INSERT INTO `produits` (`id`, `nom`, `prix`) VALUES
(1, 'Coca Cola 33cl', 1),
(2, 'Orangina 33cl', 1),
(3, 'Schweppes agrumes 33cl', 1),
(4, 'Boite Granola 200g', 1.2),
(5, 'Kinder Bueno White 117g', 0.9),
(6, 'PiMs Orange 150g', 1.8),
(7, 'Salade Sodebo Poulet 320g', 2.5),
(8, 'PastaBOX Sodebo 330g', 3.5),
(15, 'Trio Chou Jambon ComtÃ© L\'Atelier Traiteur 300g', 3.2),
(10, 'Sprite 33cl', 1),
(13, 'Fanta 33cl', 1),
(12, 'Oreo 220g', 3.2),
(14, 'Coca Cola cherry 33cl', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

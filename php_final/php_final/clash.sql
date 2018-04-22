-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  Dim 22 avr. 2018 à 17:22
-- Version du serveur :  5.7.19
-- Version de PHP :  7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `clash`
--

-- --------------------------------------------------------

--
-- Structure de la table `match`
--

DROP TABLE IF EXISTS `match`;
CREATE TABLE IF NOT EXISTS `match` (
  `id_match` int(11) NOT NULL AUTO_INCREMENT,
  `id_gagnant` varchar(20) NOT NULL,
  `id_user1` varchar(20) NOT NULL,
  `id_user2` varchar(20) NOT NULL,
  PRIMARY KEY (`id_match`),
  KEY `match_ibfk_1` (`id_user1`),
  KEY `match_ibfk_2` (`id_user2`),
  KEY `id_gagnant` (`id_gagnant`)
) ENGINE=InnoDB AUTO_INCREMENT=80 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `match`
--

INSERT INTO `match` (`id_match`, `id_gagnant`, `id_user1`, `id_user2`) VALUES
(3, 'anthony', 'adam', 'anthony'),
(39, 'yassinelastreet', 'yassinelastreet', 'gianni'),
(40, 'gianni', 'gianni', 'gianni'),
(41, 'gianni', 'gianni', 'gianni'),
(42, 'gianni', 'gianni', 'gianni'),
(43, 'lol', 'lol', 'hugo'),
(44, 'lol', 'lol', 'hugo'),
(45, 'toto', 'toto', 'yassinelastreet'),
(46, 'toto', 'toto', 'yassinelastreet'),
(47, 'adam', 'adam', 'gianni'),
(48, 'adam', 'adam', 'gianni'),
(49, 'adam', 'adam', 'gianni'),
(50, 'adam', 'adam', 'gianni'),
(51, 'lol', 'lol', 'gianni'),
(52, 'lol', 'lol', 'gianni'),
(53, 'gianni', 'gianni', 'yassinelastreet'),
(54, 'gianni', 'gianni', 'yassinelastreet'),
(55, 'gianni', 'gianni', 'yassinelastreet'),
(56, 'anthony', 'anthony', 'lol'),
(57, 'yassinelastreet', 'yassinelastreet', 'lol'),
(58, 'yassinelastreet', 'lol', 'yassinelastreet'),
(59, 'yassinelastreet', 'lol', 'yassinelastreet'),
(60, 'yassinelastreet', 'lol', 'yassinelastreet'),
(61, 'yassinelastreet', 'lol', 'yassinelastreet'),
(62, 'yassinelastreet', 'lol', 'yassinelastreet'),
(63, 'yassinelastreet', 'lol', 'yassinelastreet'),
(64, 'yassinelastreet', 'lol', 'yassinelastreet'),
(65, 'gianni', 'gianni', 'adam'),
(66, 'gianni', 'gianni', 'yassinelastreet'),
(67, 'gianni', 'gianni', 'yassinelastreet'),
(68, 'gianni', 'gianni', 'yassinelastreet'),
(69, 'gianni', 'gianni', 'yassinelastreet'),
(70, 'gianni', 'gianni', 'anthony'),
(71, 'yassinelastreet', 'hugo', 'yassinelastreet'),
(72, 'yassinelastreet', 'yassinelastreet', 'anthony'),
(73, 'gianni', 'gianni', 'toto'),
(74, 'gianni', 'gianni', 'toto'),
(75, 'hugo', 'hugo', 'anthony'),
(76, 'hugo', 'hugo', 'anthony'),
(77, 'gianni', 'gianni', 'adam'),
(78, 'gianni', 'gianni', 'adam'),
(79, 'gianni', 'gianni', 'lol');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `name` varchar(20) NOT NULL,
  `win` int(11) DEFAULT NULL,
  `nb_matchs` int(11) NOT NULL,
  `id_clash` varchar(8) NOT NULL,
  PRIMARY KEY (`name`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`name`, `win`, `nb_matchs`, `id_clash`) VALUES
('adam', 4, 79, ''),
('anthony', 24, 100, '8C8QUOG8'),
('gianni', 264, 30, '8YV8PQ0R'),
('hugo', 3, 2001, ''),
('lol', 2, 7, '284uy'),
('toto', 1, 10, '2551'),
('yassinelastreet', 30, 254, '2542');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `match`
--
ALTER TABLE `match`
  ADD CONSTRAINT `match_ibfk_1` FOREIGN KEY (`id_user1`) REFERENCES `user` (`name`) ON UPDATE CASCADE,
  ADD CONSTRAINT `match_ibfk_2` FOREIGN KEY (`id_user2`) REFERENCES `user` (`name`) ON UPDATE CASCADE,
  ADD CONSTRAINT `match_ibfk_3` FOREIGN KEY (`id_gagnant`) REFERENCES `user` (`name`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

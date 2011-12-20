-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le : Mar 20 Décembre 2011 à 19:59
-- Version du serveur: 5.5.16
-- Version de PHP: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `projet_insta`
--

-- --------------------------------------------------------

--
-- Structure de la table `acteurs`
--

CREATE TABLE IF NOT EXISTS `acteurs` (
  `id_acteur` int(255) NOT NULL AUTO_INCREMENT,
  `nom_acteur` varchar(50) DEFAULT NULL,
  `prenom_acteur` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_acteur`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `acteurs`
--

INSERT INTO `acteurs` (`id_acteur`, `nom_acteur`, `prenom_acteur`) VALUES
(1, 'Khan', 'Sah Rukh'),
(2, 'Padokune', 'Deepika'),
(3, 'Hashmi', 'Emraan');

-- --------------------------------------------------------

--
-- Structure de la table `avoir_acteurs_favoris`
--

CREATE TABLE IF NOT EXISTS `avoir_acteurs_favoris` (
  `id_users` int(100) NOT NULL,
  `id_films` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `avoir_films_favoris`
--

CREATE TABLE IF NOT EXISTS `avoir_films_favoris` (
  `id_users` int(100) NOT NULL,
  `id_films` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `avoir_realisateur_favoris`
--

CREATE TABLE IF NOT EXISTS `avoir_realisateur_favoris` (
  `id_realisateur` int(100) NOT NULL,
  `id_films` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `films`
--

CREATE TABLE IF NOT EXISTS `films` (
  `id_films` int(11) NOT NULL AUTO_INCREMENT,
  `titre_films` varchar(255) DEFAULT NULL,
  `sinopsys_films` varchar(255) DEFAULT NULL,
  `jaquette_films` varchar(255) DEFAULT NULL,
  `type_films` varchar(255) DEFAULT NULL,
  `id_allocine` int(100) DEFAULT NULL,
  PRIMARY KEY (`id_films`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `films`
--

INSERT INTO `films` (`id_films`, `titre_films`, `sinopsys_films`, `jaquette_films`, `type_films`, `id_allocine`) VALUES
(1, 'Om Shanti Om', 'C''est l''histoire d''un homme qui se réincarne 20 ans plutard après avoir été tué ...', '', '', 0),
(2, 'Awarapan', 'C''est l''histoire d''un homme qui sauve la vie d''une femme esclave au péril de sa vie ....', '', '', 0);

-- --------------------------------------------------------

--
-- Structure de la table `jouer`
--

CREATE TABLE IF NOT EXISTS `jouer` (
  `id_acteur` int(100) NOT NULL,
  `id_films` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `mot_de_passe`
--

CREATE TABLE IF NOT EXISTS `mot_de_passe` (
  `id_mdp` int(100) NOT NULL AUTO_INCREMENT,
  `id_users` int(100) NOT NULL,
  `mdp` varchar(255) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id_mdp`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Contenu de la table `mot_de_passe`
--

INSERT INTO `mot_de_passe` (`id_mdp`, `id_users`, `mdp`) VALUES
(1, 0, '5a105e8b9d40e1329780'),
(2, 0, 'f6f4061a1bddc1c04d81'),
(6, 2, '4a7d1ed414474e4033ac'),
(8, 3, 'toto'),
(9, 0, 'test9'),
(10, 0, 'test9'),
(11, 3, '4a7d1ed414474e4033ac'),
(12, 3, '4a7d1ed414474e4033ac'),
(13, 3, '4a7d1ed414474e4033ac'),
(14, 19, '4dbf44c6b1be736ee92e'),
(15, 20, '9336ebf25087d91c818e'),
(16, 20, 'f7c0e071db137f5ae653'),
(17, 21, '47bce5c74f589f4867db'),
(18, 22, 'f561aaf6ef0bf14d4208'),
(19, 23, '4a7d1ed414474e4033ac'),
(20, 24, 'b53b3a3d6ab90ce02682'),
(21, 25, 'ad57484016654da87125'),
(22, 26, '6a1013d15771539dd026'),
(23, 27, 'accc9105df5383111407');

-- --------------------------------------------------------

--
-- Structure de la table `realisateurs`
--

CREATE TABLE IF NOT EXISTS `realisateurs` (
  `id_realisateur` int(100) NOT NULL AUTO_INCREMENT,
  `nom_realisateur` varchar(50) DEFAULT NULL,
  `prenom_realisateur` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_realisateur`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `realisateurs`
--

INSERT INTO `realisateurs` (`id_realisateur`, `nom_realisateur`, `prenom_realisateur`) VALUES
(1, 'Mukesh', 'Batt'),
(2, 'Khan', 'Farah');

-- --------------------------------------------------------

--
-- Structure de la table `realiser`
--

CREATE TABLE IF NOT EXISTS `realiser` (
  `id_realisateur` int(100) NOT NULL,
  `id_films` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `sortie_films`
--

CREATE TABLE IF NOT EXISTS `sortie_films` (
  `type_sortie_films` varchar(15) NOT NULL,
  PRIMARY KEY (`type_sortie_films`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `sortir`
--

CREATE TABLE IF NOT EXISTS `sortir` (
  `id_films` int(255) NOT NULL,
  `type_sortie_films` varchar(20) NOT NULL,
  `date_sortie` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `sortir`
--

INSERT INTO `sortir` (`id_films`, `type_sortie_films`, `date_sortie`) VALUES
(1, 'Cinéma', '2008-11-08'),
(2, 'Cinéma', '2007-05-11');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `id_users` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo_users` varchar(100) DEFAULT NULL,
  `email_users` varchar(100) DEFAULT NULL,
  `civilite` varchar(20) DEFAULT NULL,
  `nom_users` varchar(100) DEFAULT NULL,
  `prenom_users` varchar(100) DEFAULT NULL,
  `date_naissance` varchar(50) DEFAULT NULL,
  `ville_users` varchar(50) DEFAULT NULL,
  `newsletter` tinyint(1) DEFAULT NULL,
  `type_compte` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id_users`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Contenu de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id_users`, `pseudo_users`, `email_users`, `civilite`, `nom_users`, `prenom_users`, `date_naissance`, `ville_users`, `newsletter`, `type_compte`) VALUES
(1, 'jfrancois', 'j.francois@yopmail.fr', '', 'Francois', 'Jean', '2011-12-05', '0', 0, 0),
(2, 'jesuisbeau', 'jesuisleplusbeau@yopmail.fr', '', 'Dupont', 'Frank', '2002-03-05', '0', 0, 0),
(3, 'jean-jacques', 'jjacques@yopmail.fr', '', 'jean', 'jacques', '2011-12-06', '0', 0, 0),
(4, 'cinephile', 'mickael', 'monsieur', 'Gates', 'mickael', '1975-07-15', 'Amiens', 1, 0),
(5, 'frank', 'frank@opmail.fr', 'Monsieur', 'dupond', 'frank', '1990-12-16', 'bobigny', 1, 0),
(6, 'mich', 'mich@yopmail.fr', 'Monsieur', 'leblanc', 'michel', '1988-12-06', 'monaco', 0, 0),
(7, 'drichard', 'richard@opmail.fr', 'Monsieur', 'Dulac', 'richard', '1958-10-06', 'lille', 1, 0),
(8, 'test01', 'test01@yopmail.fr', 'M', 'test01', 'test01', '0000-00-00', 'paris', 1, 0),
(9, 'mohinder', 'mohinder@yompail.fr', 'Mr', 'mohinder', 'j', '0000-00-00', 'bobigny', 1, 0),
(10, 'pseudo', 'adressemail', '', 'nom', 'prenom', '0000-00-00', 'ville', 1, 0),
(11, 'mohinder', 'adressemail', 'Mr', 'nom', 'prenom', '0000-00-00', 'bobigny', 1, 0),
(12, 'mohinder', 'adressemail', 'Mr', 'nom', 'prenom', '0000-00-00', 'bobigny', 1, 0),
(16, 'alice', 'aliceadsl@aliceadsl.fr', 'Mme', 'adsl', 'alice', '02/05/0995', 'Tiscali', 1, 0),
(17, '17', 'Mme', '17', '17', '17', '17', '1', 1, 0),
(18, 'a', 'Mlle', 'a', 'a', '01/06/1968', 'a', '1', 1, 1),
(19, 'boris', 'b.couraud@gmail.com', 'Mr', 'couraud', 'boris', '02/05/0995', 'Paris', 1, 1),
(20, 'nnnn', 'nnnn', 'M', 'nnn', 'nnnnn', '01/06/1968', 'nnnn', 1, 0),
(21, 'aaa', 'aa', 'Mr', 'aaa', 'aaa', '02/05/0995', 'aaa', 1, 1),
(22, '222', '2222', 'Mme', '2222', '2222', '222', '22222', 1, 1),
(23, '2323', '3232', 'Mme', '2332', '3232', '07/12/1990', '3232', 1, 0),
(25, 'ww', 'ww', 'Mr', 'www', 'www', 'ww', 'ww', 0, 1),
(26, 'amez', 'sqsdqdsqsfd', 'Mr', 'amez', 'souf', '01/06/1968', 'dsffsdsd', 0, 1),
(27, '27', '27', 'Mr', '27', '27', '27', '27', 0, 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

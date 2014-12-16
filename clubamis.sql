-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Client: 127.0.0.1
-- Généré le: Mar 25 Novembre 2014 à 08:57
-- Version du serveur: 5.5.27-log
-- Version de PHP: 5.4.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `clubamis`
--

-- --------------------------------------------------------

--
-- Structure de la table `action`
--

CREATE TABLE IF NOT EXISTS `action` (
  `N_ACTION` int(11) NOT NULL AUTO_INCREMENT,
  `N_AMIS` int(11) NOT NULL,
  `DATE_DEB_ACTION` date DEFAULT NULL,
  `DUREE_ACTION` int(11) DEFAULT NULL,
  `FONDS_COLLECTES` double(5,2) DEFAULT NULL,
  PRIMARY KEY (`N_ACTION`),
  KEY `I_FK_ACTION_AMIS` (`N_AMIS`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `action`
--

INSERT INTO `action` (`N_ACTION`, `N_AMIS`, `DATE_DEB_ACTION`, `DUREE_ACTION`, `FONDS_COLLECTES`) VALUES
(2, 1, '2014-11-11', 2, 2.00);

-- --------------------------------------------------------

--
-- Structure de la table `amis`
--

CREATE TABLE IF NOT EXISTS `amis` (
  `N_AMIS` int(11) NOT NULL AUTO_INCREMENT,
  `N_FONCTION` int(11) DEFAULT NULL,
  `NOM_AMIS` char(32) DEFAULT NULL,
  `PRENOM_AMIS` char(32) DEFAULT NULL,
  `TEL_FIX_AMIS` char(12) DEFAULT NULL,
  `TEL_PORTABLE_AMIS` char(12) DEFAULT NULL,
  `EMAIL_AMIS` char(32) DEFAULT NULL,
  `RUE_AMIS` char(32) DEFAULT NULL,
  `VILLE_AMIS` char(32) DEFAULT NULL,
  `DATE_ENTREE_AMIS` date DEFAULT NULL,
  `MT_VERSE` double(5,2) DEFAULT NULL,
  `PARRAIN_1` int(11) NOT NULL,
  `PARRAIN_2` int(11) NOT NULL,
  PRIMARY KEY (`N_AMIS`),
  KEY `I_FK_AMIS_FONCTION` (`N_FONCTION`),
  KEY `I_FK_AMIS_AMIS` (`PARRAIN_1`),
  KEY `I_FK_AMIS_AMIS1` (`PARRAIN_2`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `amis`
--

INSERT INTO `amis` (`N_AMIS`, `N_FONCTION`, `NOM_AMIS`, `PRENOM_AMIS`, `TEL_FIX_AMIS`, `TEL_PORTABLE_AMIS`, `EMAIL_AMIS`, `RUE_AMIS`, `VILLE_AMIS`, `DATE_ENTREE_AMIS`, `MT_VERSE`, `PARRAIN_1`, `PARRAIN_2`) VALUES
(1, 1, '1', '1', '1', '1', '1', '1', '1', '2014-11-25', 1.00, 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `commission`
--

CREATE TABLE IF NOT EXISTS `commission` (
  `N_COMMISSION` int(11) NOT NULL AUTO_INCREMENT,
  `NOM_COMMISSION` char(32) DEFAULT NULL,
  PRIMARY KEY (`N_COMMISSION`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `diner`
--

CREATE TABLE IF NOT EXISTS `diner` (
  `N_DINER` int(11) NOT NULL AUTO_INCREMENT,
  `DATE_DINER` date DEFAULT NULL,
  `LIEU_DINER` char(32) DEFAULT NULL,
  `RUE_DINER` char(32) DEFAULT NULL,
  `VILLE_DINER` char(32) DEFAULT NULL,
  `PRIX_REPAS` double(5,2) DEFAULT NULL,
  PRIMARY KEY (`N_DINER`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `fonction`
--

CREATE TABLE IF NOT EXISTS `fonction` (
  `N_FONCTION` int(11) NOT NULL AUTO_INCREMENT,
  `NOM_FONCTION` char(32) DEFAULT NULL,
  PRIMARY KEY (`N_FONCTION`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `fonction`
--

INSERT INTO `fonction` (`N_FONCTION`, `NOM_FONCTION`) VALUES
(1, '1');

-- --------------------------------------------------------

--
-- Structure de la table `gerer`
--

CREATE TABLE IF NOT EXISTS `gerer` (
  `N_COMMISSION` int(11) NOT NULL,
  `N_AMIS` int(11) NOT NULL,
  `N_FONCTION` int(11) NOT NULL,
  PRIMARY KEY (`N_COMMISSION`,`N_AMIS`),
  KEY `I_FK_GERER_COMMISSION` (`N_COMMISSION`),
  KEY `I_FK_GERER_AMIS` (`N_AMIS`),
  KEY `I_FK_GERER_FONCTION` (`N_FONCTION`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `parametre`
--

CREATE TABLE IF NOT EXISTS `parametre` (
  `MT_COTISATION` double(5,2) DEFAULT NULL,
  `N_COTISATION` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`N_COTISATION`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `participant`
--

CREATE TABLE IF NOT EXISTS `participant` (
  `N_AMIS` int(11) NOT NULL,
  `N_ACTION` int(11) NOT NULL,
  PRIMARY KEY (`N_AMIS`,`N_ACTION`),
  KEY `I_FK_PARTICIPANT_AMIS` (`N_AMIS`),
  KEY `I_FK_PARTICIPANT_ACTION` (`N_ACTION`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `participer`
--

CREATE TABLE IF NOT EXISTS `participer` (
  `N_AMIS` int(11) NOT NULL,
  `N_DINER` int(11) NOT NULL,
  `NOMBRE_INVITE` int(11) NOT NULL,
  PRIMARY KEY (`N_AMIS`,`N_DINER`),
  KEY `I_FK_PARTICIPER_AMIS` (`N_AMIS`),
  KEY `I_FK_PARTICIPER_DINER` (`N_DINER`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `action`
--
ALTER TABLE `action`
  ADD CONSTRAINT `action_ibfk_1` FOREIGN KEY (`N_AMIS`) REFERENCES `amis` (`N_AMIS`);

--
-- Contraintes pour la table `amis`
--
ALTER TABLE `amis`
  ADD CONSTRAINT `amis_ibfk_1` FOREIGN KEY (`N_FONCTION`) REFERENCES `fonction` (`N_FONCTION`),
  ADD CONSTRAINT `amis_ibfk_2` FOREIGN KEY (`PARRAIN_1`) REFERENCES `amis` (`N_AMIS`),
  ADD CONSTRAINT `amis_ibfk_3` FOREIGN KEY (`PARRAIN_2`) REFERENCES `amis` (`N_AMIS`);

--
-- Contraintes pour la table `gerer`
--
ALTER TABLE `gerer`
  ADD CONSTRAINT `gerer_ibfk_1` FOREIGN KEY (`N_COMMISSION`) REFERENCES `commission` (`N_COMMISSION`),
  ADD CONSTRAINT `gerer_ibfk_2` FOREIGN KEY (`N_AMIS`) REFERENCES `amis` (`N_AMIS`),
  ADD CONSTRAINT `gerer_ibfk_3` FOREIGN KEY (`N_FONCTION`) REFERENCES `fonction` (`N_FONCTION`);

--
-- Contraintes pour la table `participant`
--
ALTER TABLE `participant`
  ADD CONSTRAINT `participant_ibfk_1` FOREIGN KEY (`N_AMIS`) REFERENCES `amis` (`N_AMIS`),
  ADD CONSTRAINT `participant_ibfk_2` FOREIGN KEY (`N_ACTION`) REFERENCES `action` (`N_ACTION`);

--
-- Contraintes pour la table `participer`
--
ALTER TABLE `participer`
  ADD CONSTRAINT `participer_ibfk_1` FOREIGN KEY (`N_AMIS`) REFERENCES `amis` (`N_AMIS`),
  ADD CONSTRAINT `participer_ibfk_2` FOREIGN KEY (`N_DINER`) REFERENCES `diner` (`N_DINER`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;


-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Lun 24 Octobre 2016 à 20:12
-- Version du serveur: 10.0.20-MariaDB
-- Version de PHP: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `u775182271_isepb`
--

-- --------------------------------------------------------

--
-- Structure de la table `instrument`
--

CREATE TABLE IF NOT EXISTS `instrument` (
  `i_instrument` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`i_instrument`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `instrument`
--

INSERT INTO `instrument` (`i_instrument`) VALUES
('Basse'),
('Batterie'),
('Chant'),
('Guitare'),
('Harmonica'),
('Piano'),
('Saxophone'),
('Trompette'),
('Violon');

-- --------------------------------------------------------

--
-- Structure de la table `pratique`
--

CREATE TABLE IF NOT EXISTS `pratique` (
  `p_id` int(11) NOT NULL,
  `p_instrument` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `p_niveau` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `p_annees` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`p_id`,`p_instrument`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `pratique`
--

INSERT INTO `pratique` (`p_id`, `p_instrument`, `p_niveau`, `p_annees`) VALUES
(6, 'Guitare', 'Intermédiaire', '7');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE IF NOT EXISTS `utilisateur` (
  `u_id` int(11) NOT NULL AUTO_INCREMENT,
  `u_prenom` varchar(255) NOT NULL,
  `u_nom` varchar(255) NOT NULL,
  `u_email` varchar(255) NOT NULL,
  `u_mdp` varchar(255) NOT NULL,
  `u_promo` int(11) NOT NULL,
  `u_portable` varchar(255) NOT NULL,
  `u_dateInscription` date NOT NULL,
  `u_valide` tinyint(1) NOT NULL,
  `u_photo` varchar(255) NOT NULL,
  PRIMARY KEY (`u_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Contenu de la table `utilisateur`
--

INSERT INTO `utilisateur` (`u_id`, `u_prenom`, `u_nom`, `u_email`, `u_mdp`, `u_promo`, `u_portable`, `u_dateInscription`, `u_valide`, `u_photo`) VALUES
(6, 'Romain', 'Frayssinet', 'romain.frayssinet@icloud.com', '$2y$10$.5C0adXz2n81GlrUwUFf.OMCZB3Kniqq7zxdwuCcFuZhotnL8GjtO', 2018, '0643176804', '2016-10-24', 0, 'avatar.png');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

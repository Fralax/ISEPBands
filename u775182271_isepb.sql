
-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Mer 09 Novembre 2016 à 17:08
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
-- Structure de la table `appartient`
--

CREATE TABLE IF NOT EXISTS `appartient` (
  `g_nom` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `u_id` int(11) NOT NULL,
  PRIMARY KEY (`g_nom`,`u_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `appartient`
--

INSERT INTO `appartient` (`g_nom`, `u_id`) VALUES
('Dire Straits', 6),
('Guns & Roses', 6),
('J''t''ai cassé !', 7),
('Pink Floyd', 6),
('Pink Floyd', 9),
('The Band', 8);

-- --------------------------------------------------------

--
-- Structure de la table `groupe`
--

CREATE TABLE IF NOT EXISTS `groupe` (
  `g_nom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `g_createur` int(11) NOT NULL,
  `g_photo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`g_nom`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `groupe`
--

INSERT INTO `groupe` (`g_nom`, `g_createur`, `g_photo`) VALUES
('Guns & Roses', 6, 'photosGroupes/Guns & Roses.png'),
('Dire Straits', 6, 'photosGroupes/Dire Straits.jpg'),
('Pink Floyd', 9, ''),
('J''t''ai cassé !', 7, ''),
('The Band', 8, '');

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
('Ukulele'),
('Violon');

-- --------------------------------------------------------

--
-- Structure de la table `invitation`
--

CREATE TABLE IF NOT EXISTS `invitation` (
  `u_id` int(11) NOT NULL,
  `g_createur` int(11) NOT NULL,
  `g_nom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`u_id`,`g_createur`,`g_nom`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `invitation`
--

INSERT INTO `invitation` (`u_id`, `g_createur`, `g_nom`) VALUES
(10, 6, 'Dire Straits');

-- --------------------------------------------------------

--
-- Structure de la table `pratique`
--

CREATE TABLE IF NOT EXISTS `pratique` (
  `u_id` int(11) NOT NULL,
  `p_instrument` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `p_niveau` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `p_annees` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`u_id`,`p_instrument`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `pratique`
--

INSERT INTO `pratique` (`u_id`, `p_instrument`, `p_niveau`, `p_annees`) VALUES
(6, 'Guitare', 'Intermédiaire', '7'),
(8, 'Guitare', 'Intermédiaire', '3'),
(8, 'Chant', 'Débutant', '1'),
(8, 'Harmonica', 'Intermédiaire', '0'),
(9, 'Guitare', 'Avancé', '12'),
(9, 'Batterie', 'Débutant', '1'),
(9, 'Basse', 'Intermédiaire', '4'),
(9, 'Piano', 'Débutant', '4'),
(9, 'Chant', 'Intermédiaire', '2'),
(12, 'Piano', 'Confirmé', '13'),
(12, 'Ukulele', 'Débutant', '3'),
(6, 'Piano', 'Intermédiaire', '5'),
(7, 'Guitare', 'Intermédiaire', '2'),
(8, 'Batterie', 'Débutant', '1');

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
  `u_facebook` varchar(255) NOT NULL,
  PRIMARY KEY (`u_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- Contenu de la table `utilisateur`
--

INSERT INTO `utilisateur` (`u_id`, `u_prenom`, `u_nom`, `u_email`, `u_mdp`, `u_promo`, `u_portable`, `u_dateInscription`, `u_valide`, `u_photo`, `u_facebook`) VALUES
(9, 'Louis', 'Steimberg', 'steimberg@hotmail.fr', '$2y$10$KHqVzDYN5Ni.KrxMhgNn2utVoUTq84cjg2C2RZKKsozX2koJYc8PG', 2019, '0666085916', '2016-10-25', 1, 'avatars/9.jpg', 'https://www.facebook.com/steimberg'),
(10, 'Clément', 'Magot', 'cmagot@gmail.com', '$2y$10$GqUSUaFs8lNR6BAQ45JHdO11uCXMtyDbKibAuzr2.ZHmCL6XgP/pe', 2016, '0686445211', '2016-10-25', 1, 'avatars/avatar.png', ''),
(8, 'Michael', 'Elbaz', 'mickelbaz@gmail.com', '$2y$10$DrkwkYeggd980KfYk0dLvu8owPQodUeXlrcUryFLfJqVLb3skDP5y', 2018, '0699651612', '2016-10-25', 1, 'avatars/8.jpg', 'https://www.facebook.com/MichaElbaz'),
(7, 'Jean', 'Dujardin', 'jeandujardin@gmail.com', '$2y$10$MDYbuTvmJvz1Ai1DH9FejeeVwkgs2c.IALMba2lCzlrikb9IR/TEi', 2017, '0648392884', '2016-10-24', 1, 'avatars/7.jpeg', ''),
(6, 'Romain', 'Frayssinet', 'romain.frayssinet@icloud.com', '$2y$10$.5C0adXz2n81GlrUwUFf.OMCZB3Kniqq7zxdwuCcFuZhotnL8GjtO', 2018, '0643176804', '2016-10-24', 1, 'avatars/6.jpg', 'https://www.facebook.com/frayssinetr'),
(12, 'Camille', 'Marchetti', 'camillemtti@hotmail.fr', '$2y$10$qIa7lNMIvfmRaapgjOOuXebbhBaN.gH/vBYFxqU5T2TTPs1cxsXB2', 2020, '0781833438', '2016-11-09', 0, 'avatars/avatar.png', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

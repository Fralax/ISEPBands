-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  localhost:8889
-- Généré le :  Dim 16 Octobre 2016 à 17:55
-- Version du serveur :  5.6.28
-- Version de PHP :  7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données :  `ISEPBands`
--

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `u_prenom` varchar(255) NOT NULL,
  `u_nom` varchar(255) NOT NULL,
  `u_email` varchar(255) NOT NULL,
  `u_mdp` varchar(255) NOT NULL,
  `u_promo` int(11) NOT NULL,
  `u_portable` varchar(255) NOT NULL,
  `u_dateInscription` date NOT NULL,
  `u_valide` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `utilisateur`
--

INSERT INTO `utilisateur` (`u_prenom`, `u_nom`, `u_email`, `u_mdp`, `u_promo`, `u_portable`, `u_dateInscription`, `u_valide`) VALUES
('Romain', 'Frayssinet', 'romain.frayssinet@icloud.com', '$2y$10$.y85HskL/pGcihrh4sbBdOVzm927xeEVUGkyFuIJD.R6TMFKo5JsW', 2018, '0643176804', '2016-10-16', 0);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`u_email`);

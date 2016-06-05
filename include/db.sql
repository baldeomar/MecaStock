-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Dim 05 Juin 2016 à 20:09
-- Version du serveur: 5.5.49-0ubuntu0.14.04.1
-- Version de PHP: 5.5.9-1ubuntu4.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données: `MecaStock`
--

-- --------------------------------------------------------

--
-- Structure de la table `Produit`
--

CREATE TABLE IF NOT EXISTS `Produit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `description` varchar(256) NOT NULL,
  `emplacement` varchar(50) NOT NULL,
  `prix` decimal(10,0) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `nom` (`nom`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Contenu de la table `Produit`
--

INSERT INTO `Produit` (`id`, `nom`, `description`, `emplacement`, `prix`) VALUES
(1, 'dona', 'bouchon de reservoir d''huile', 'fez', 500),
(2, 'BNALDE', 'joint', 'b65', 1000),
(4, 'jointure', 'joint', 'f75a', 650),
(5, 'jointeure', 'jointeure', 'f18d', 840),
(6, 'jointimax', 'jointimax', 'b78d', 900),
(7, 'bocar', 'diaykat', 'moed', 25),
(8, 'bocar', 'diay kat', 'massy', 28);

-- --------------------------------------------------------

--
-- Structure de la table `User`
--

CREATE TABLE IF NOT EXISTS `User` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(20) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role` varchar(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `login` (`login`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `User`
--

INSERT INTO `User` (`id`, `login`, `password`, `role`) VALUES
(1, 'jack', '$1$tR0uiDAW$m6JCeWfZAK8QwnbeGS76s1', 'ROLE_ADMIN');
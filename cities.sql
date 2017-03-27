-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Client :  localhost:8889
-- Généré le :  Lun 27 Mars 2017 à 09:52
-- Version du serveur :  5.6.35
-- Version de PHP :  7.0.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données :  `pole-job`
--

-- --------------------------------------------------------

--
-- Structure de la table `cities`
--

CREATE TABLE `cities` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `cities`
--

INSERT INTO `cities` (`id`, `name`) VALUES
(6, 'argenteuil'),
(10, 'aubervilliers'),
(9, 'aulnay-sous-bois'),
(5, 'bondy'),
(2, 'Bordeaux'),
(12, 'chelles'),
(16, 'clamart'),
(19, 'clichy'),
(13, 'épinay-sur-seine'),
(17, 'évry'),
(20, 'fontenay-sous-bois'),
(11, 'le blanc-mesnil'),
(21, 'maisons-Alfort'),
(7, 'montreuil'),
(3, 'noisy-le-sec\r\n'),
(4, 'pantin'),
(1, 'Paris'),
(8, 'saint-denis'),
(14, 'sevran'),
(18, 'startrouville'),
(15, 'villejuif');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

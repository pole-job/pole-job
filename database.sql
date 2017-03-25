-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Mer 25 Janvier 2017 à 00:09
-- Version du serveur :  5.5.42
-- Version de PHP :  7.0.0

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `cities`
--

INSERT INTO `cities` (`id`, `name`) VALUES
(2, 'Bordeaux'),
(1, 'Paris');

-- --------------------------------------------------------

--
-- Structure de la table `jobs`
--

CREATE TABLE `jobs` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `city_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `jobs`
--

INSERT INTO `jobs` (`id`, `title`, `description`, `city_id`) VALUES
(1, 'Developer Web', 'SuperSuper is seeking a back end web developer to help design, build, and maintain websites for our clients. The ideal candidate will have a solid understanding of design, interaction, and usability, while also having the front end chops to create rich new user experiences.', 1);

-- --------------------------------------------------------

--
-- Structure de la table `jobs_skills`
--

CREATE TABLE `jobs_skills` (
  `job_id` int(11) NOT NULL,
  `skill_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `jobs_skills`
--

INSERT INTO `jobs_skills` (`job_id`, `skill_id`) VALUES
(1, 1),
(1, 2);

-- --------------------------------------------------------

--
-- Structure de la table `skills`
--

CREATE TABLE `skills` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `skills`
--

INSERT INTO `skills` (`id`, `name`) VALUES
(2, 'HTML5'),
(3, 'Photoshop'),
(1, 'PHP'),
(4, 'SEO');

-- --------------------------------------------------------

--
-- Structure de la table `skills_users`
--

CREATE TABLE `skills_users` (
  `skill_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `skills_users`
--

INSERT INTO `skills_users` (`skill_id`, `user_id`) VALUES
(1, 1),
(2, 1),
(2, 2),
(4, 2);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `bio` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `city_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `full_name`, `phone`, `bio`, `email`, `password`, `token`, `city_id`) VALUES
(1, 'Bob MARTIN', '0142063243', 'Freelance Front/Back-end Web Developer.', 'bob.martin@gmail.com', 'secret', 'secret1', 1),
(2, 'Alice SMITH', '0142063245', 'Digital Marketing Consultant.', 'alice.smith@gmail.com', 'secret', 'secret2', 2);

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
-- Index pour la table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `city_id` (`city_id`);

--
-- Index pour la table `jobs_skills`
--
ALTER TABLE `jobs_skills`
  ADD PRIMARY KEY (`job_id`,`skill_id`),
  ADD KEY `job_id` (`job_id`),
  ADD KEY `skill_id` (`skill_id`);

--
-- Index pour la table `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Index pour la table `skills_users`
--
ALTER TABLE `skills_users`
  ADD PRIMARY KEY (`skill_id`,`user_id`),
  ADD KEY `skill_id` (`skill_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `token` (`token`),
  ADD KEY `location` (`city_id`),
  ADD KEY `phone` (`phone`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `skills`
--
ALTER TABLE `skills`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `jobs`
--
ALTER TABLE `jobs`
  ADD CONSTRAINT `jobs_ibfk_2` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`);

--
-- Contraintes pour la table `jobs_skills`
--
ALTER TABLE `jobs_skills`
  ADD CONSTRAINT `jobs_skills_ibfk_1` FOREIGN KEY (`job_id`) REFERENCES `jobs` (`id`),
  ADD CONSTRAINT `jobs_skills_ibfk_2` FOREIGN KEY (`skill_id`) REFERENCES `skills` (`id`);

--
-- Contraintes pour la table `skills_users`
--
ALTER TABLE `skills_users`
  ADD CONSTRAINT `skills_users_ibfk_1` FOREIGN KEY (`skill_id`) REFERENCES `skills` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `skills_users_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`);

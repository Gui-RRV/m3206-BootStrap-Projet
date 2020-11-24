-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 24 nov. 2020 à 07:54
-- Version du serveur :  10.4.14-MariaDB
-- Version de PHP : 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `projetm3206`
--

-- --------------------------------------------------------

--
-- Structure de la table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `user` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `events`
--

INSERT INTO `events` (`id`, `user`, `title`, `description`, `date`) VALUES
(4, '14', 'Test event', 'Je test pour voir si ça marche toujours ahah', '1992-12-12'),
(5, '14', 'GR', 'Test de description', '1997-11-15'),
(6, '14', 'Test event 3', '', '0000-00-00'),
(7, '14', 'test event 4', '1325468979797987987', '2000-12-15'),
(8, '14', 'L\'EVENT 5', 'OUI C\'EST UN BIEN BEAU TEST', '1998-01-14'),
(9, '15', 'GR', 'Test de description', '2450-05-04'),
(10, '15', 'Pates au poulet', 'J\'aime ça oui même si là j\'ai mal au bide ouille ouille ouille :(', '2020-11-22');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `login` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `login`, `pass`) VALUES
(14, 'Gui', '$2y$10$omV5ZPZUdrmGwDgSvR30ou4Nr7DBwzMiAviy64jwYRpFaZTlniute'),
(15, 'choucroute', '$2y$10$Xq/on5sC0YD4vRTv9rFuSeYgktkh.hJx0Lqdh6fqPTKvqxvqpryg6');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

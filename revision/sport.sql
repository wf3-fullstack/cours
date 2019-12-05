-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  jeu. 05 déc. 2019 à 17:55
-- Version du serveur :  10.1.37-MariaDB
-- Version de PHP :  7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `revision`
--

-- --------------------------------------------------------

--
-- Structure de la table `sport`
--

CREATE TABLE `sport` (
  `id` int(11) NOT NULL,
  `nom` varchar(160) NOT NULL,
  `categorie` varchar(160) NOT NULL,
  `description` text NOT NULL,
  `photo` varchar(160) NOT NULL,
  `nbJoueur` int(11) NOT NULL,
  `difficulte` int(11) NOT NULL,
  `dateCreation` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `sport`
--

INSERT INTO `sport` (`id`, `nom`, `categorie`, `description`, `photo`, `nbJoueur`, `difficulte`, `dateCreation`) VALUES
(4, 'NOM1730', 'CAT1730', 'DESC1730', 'assets/upload/beautiful-beauty-fashion-2233318.jpg', 2, 3, '2019-12-28'),
(5, 'test1749', 'cat1749', 'desc1749', 'assets/upload/adorable-animal-animal-photography-1773181.jpg', 2, 3, '2019-12-12');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `sport`
--
ALTER TABLE `sport`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `sport`
--
ALTER TABLE `sport`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

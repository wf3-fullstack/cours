-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  mer. 18 déc. 2019 à 15:54
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
-- Base de données :  `cmspoo`
--

-- --------------------------------------------------------

--
-- Structure de la table `content`
--

CREATE TABLE `content` (
  `id` int(11) NOT NULL,
  `filename` varchar(160) NOT NULL,
  `titre` varchar(160) NOT NULL,
  `contenuPage` text NOT NULL,
  `photo` varchar(160) NOT NULL,
  `datePublication` datetime NOT NULL,
  `categorie` varchar(160) NOT NULL,
  `template` varchar(160) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `content`
--

INSERT INTO `content` (`id`, `filename`, `titre`, `contenuPage`, `photo`, `datePublication`, `categorie`, `template`, `id_user`) VALUES
(1, 'index', 'Accueil', 'COUCOU BIENVENUE SUR MON SITE', '', '0000-00-00 00:00:00', '', '', 0),
(2, 'updateFilenanme', 'updateTitre', 'updateCOntenu', 'updatePhoto', '2019-12-18 14:47:31', 'updateCategorie', 'updateTemplate', 1),
(3, 'blog', 'BLOG', 'LES DERNIERS ARTICLES DE MON BLOG', 'dsfdsf', '2019-12-18 14:50:09', 'sdfqsd', 'template-blog', 0),
(5, 'admin', 'MA PAGE ADMIN', 'MA PAGE ADMIN', '', '0000-00-00 00:00:00', '', 'template-admin', 0),
(11, 'test502', 'titre1502', 'contenu1502', 'hkjhkhkj', '2019-12-18 15:03:08', 'blog', '', 3),
(12, 'test1456', 'titre1456', 'contenu1456', 'hkjhkjhkj', '2019-12-18 14:57:11', 'blog', '', 3),
(13, 'harry-potter', 'Harry Potter', 'C\'est un roman', 'sdfgds', '2019-12-18 15:05:12', 'blog', '', 4),
(14, 'matilda', 'Matilda', 'TRES BIEN COMME ROMAN', 'kjfdh', '2019-12-18 15:16:44', 'blog', '', 3);

-- --------------------------------------------------------

--
-- Structure de la table `content_user`
--

CREATE TABLE `content_user` (
  `id` int(11) NOT NULL,
  `id_content` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `content_user`
--

INSERT INTO `content_user` (`id`, `id_content`, `id_user`) VALUES
(2, 14, 4),
(3, 13, 3),
(4, 14, 3);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(160) NOT NULL,
  `login` varchar(160) NOT NULL,
  `password` varchar(160) NOT NULL,
  `level` int(11) NOT NULL,
  `dateCreation` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `email`, `login`, `password`, `level`, `dateCreation`) VALUES
(3, 'test1428@mail.me', 'rambo', '$2y$10$1aEb.U/mJDywzIy2I1.ZouKg9uSUMo3EQREZpAxdCZCz4/ublFWCW', 10, '2019-12-18 14:28:22'),
(4, 'test1504@mail.me', 'jk rowling', '$2y$10$LJbDiQEvvveFBzePnhIkCu0q8MxNMZo1NWntKNNwMrSZEEUw3Bee2', 10, '2019-12-18 15:04:38');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `content`
--
ALTER TABLE `content`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `content_user`
--
ALTER TABLE `content_user`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `content`
--
ALTER TABLE `content`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `content_user`
--
ALTER TABLE `content_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

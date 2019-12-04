-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  mer. 04 déc. 2019 à 17:22
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
-- Base de données :  `cms`
--

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `email` varchar(160) NOT NULL,
  `nom` varchar(160) NOT NULL,
  `message` text NOT NULL,
  `datePublication` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `contact`
--

INSERT INTO `contact` (`id`, `email`, `nom`, `message`, `datePublication`) VALUES
(8, 'test1047@mail.me', 'nom1047', 'message1047', '2019-12-03 10:47:20'),
(9, 'test1048@mail.me', 'nom1048', 'message1048', '2019-12-03 10:47:37');

-- --------------------------------------------------------

--
-- Structure de la table `contenu`
--

CREATE TABLE `contenu` (
  `id` int(11) NOT NULL,
  `titre` varchar(160) NOT NULL,
  `photo` varchar(160) NOT NULL,
  `description` text NOT NULL,
  `datePublication` datetime NOT NULL,
  `categorie` varchar(160) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `contenu`
--

INSERT INTO `contenu` (`id`, `titre`, `photo`, `description`, `datePublication`, `categorie`) VALUES
(11, 'titre1509', 'assets/upload/adorable-animal-animal-photography-1773181.jpg', 'description1509', '2019-12-04 15:09:45', 'cat1509'),
(12, 'accueil1', 'assets/upload/adult-alone-art-2176331.jpg', 'accueil1', '2019-12-04 15:19:33', 'accueil'),
(13, 'galerie1', 'assets/upload/bowl-chicken-cuisine-688804.jpg', 'galerie1', '2019-12-04 15:19:58', 'galerie'),
(14, 'service1', 'assets/upload/beautiful-beauty-fashion-2233318.jpg', 'service1', '2019-12-04 15:21:42', 'services'),
(15, 'accueil', 'assets/upload/cake-chocolate-chocolate-cake-373066.jpg', 'index.php', '2019-12-04 15:22:52', 'menu'),
(17, 'inscription', 'assets/upload/ancient-antique-archaeology-2225440.jpg', 'inscription.php', '2019-12-04 15:27:29', 'menu'),
(18, 'contactez-nous', 'assets/upload/cake-chocolate-chocolate-cake-373066.jpg', 'contact.php', '2019-12-04 15:29:14', 'menu');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `login` varchar(160) NOT NULL,
  `email` varchar(160) NOT NULL,
  `password` varchar(160) NOT NULL,
  `dateInscription` datetime NOT NULL,
  `level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `login`, `email`, `password`, `dateInscription`, `level`) VALUES
(6, 'modif1707', 'modif1707@mail.me', '$2y$10$4xJld9HEY/cwqT0PbiRtF.Q8gEIYiPmLHCB6rTRe6BFyGkAjDiv/S', '2019-12-03 17:07:02', 7),
(7, 'MODIF2', 'modif@mail.me', '$2y$10$Ar1sxuHkEGE.Elmt/3ywHOvFJ6EYCn6CDGAHPsuXQRL5LdciS3o32', '2019-12-04 09:56:03', 6);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `contenu`
--
ALTER TABLE `contenu`
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
-- AUTO_INCREMENT pour la table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `contenu`
--
ALTER TABLE `contenu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

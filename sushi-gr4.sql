-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : dim. 10 mars 2024 à 15:23
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `sushi-gr4`
--

-- --------------------------------------------------------

--
-- Structure de la table `aliment`
--

CREATE TABLE `aliment` (
  `id_aliment` int(11) NOT NULL,
  `nom` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `box`
--

CREATE TABLE `box` (
  `id_box` int(11) NOT NULL,
  `nom` varchar(255) DEFAULT NULL,
  `pieces` int(11) DEFAULT NULL,
  `prix` float DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `boxaliment`
--

CREATE TABLE `boxaliment` (
  `box_id` int(11) NOT NULL,
  `aliment_id` int(11) NOT NULL,
  `quantite` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `boxsaveur`
--

CREATE TABLE `boxsaveur` (
  `box_id` int(11) NOT NULL,
  `saveur_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `saveur`
--

CREATE TABLE `saveur` (
  `id_saveur` int(11) NOT NULL,
  `nom` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `aliment`
--
ALTER TABLE `aliment`
  ADD PRIMARY KEY (`id_aliment`);

--
-- Index pour la table `box`
--
ALTER TABLE `box`
  ADD PRIMARY KEY (`id_box`);

--
-- Index pour la table `boxaliment`
--
ALTER TABLE `boxaliment`
  ADD PRIMARY KEY (`box_id`,`aliment_id`),
  ADD KEY `aliment_id` (`aliment_id`);

--
-- Index pour la table `boxsaveur`
--
ALTER TABLE `boxsaveur`
  ADD PRIMARY KEY (`box_id`,`saveur_id`),
  ADD KEY `saveur_id` (`saveur_id`);

--
-- Index pour la table `saveur`
--
ALTER TABLE `saveur`
  ADD PRIMARY KEY (`id_saveur`);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `boxaliment`
--
ALTER TABLE `boxaliment`
  ADD CONSTRAINT `boxaliment_ibfk_1` FOREIGN KEY (`box_id`) REFERENCES `box` (`id_box`),
  ADD CONSTRAINT `boxaliment_ibfk_2` FOREIGN KEY (`aliment_id`) REFERENCES `aliment` (`id_aliment`);

--
-- Contraintes pour la table `boxsaveur`
--
ALTER TABLE `boxsaveur`
  ADD CONSTRAINT `boxsaveur_ibfk_1` FOREIGN KEY (`box_id`) REFERENCES `box` (`id_box`),
  ADD CONSTRAINT `boxsaveur_ibfk_2` FOREIGN KEY (`saveur_id`) REFERENCES `saveur` (`id_saveur`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

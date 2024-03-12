-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 12 mars 2024 à 23:56
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `sushi`
--

-- --------------------------------------------------------

--
-- Structure de la table `aliment`
--

CREATE TABLE `aliment` (
  `id_aliment` int(11) NOT NULL,
  `nom` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `aliment`
--

INSERT INTO `aliment` (`id_aliment`, `nom`) VALUES
(1, 'California Saumon Avocat'),
(2, 'Sushi Saumon'),
(3, 'Spring Avocat Cheese'),
(4, 'California pacific'),
(5, 'Edamame/Salade de chou'),
(6, 'Maki Salmon Roll'),
(7, 'Spring Saumon Avocat'),
(8, 'Maki Cheese Avocat'),
(9, 'California Saumon Avocat'),
(10, 'Edamame/Salade de chou'),
(11, 'California Saumon Avocat'),
(12, 'Sushi Saumon'),
(13, 'Edamame/Salade de chou'),
(14, 'California Saumon Avocat'),
(15, 'Spring Saumon Avocat'),
(16, 'Sushi Saumon'),
(17, 'Edamame/Salade de chou'),
(18, 'Sushi Saumon'),
(19, 'Edamame/Salade de chou'),
(20, 'Sushi Saumon'),
(21, 'Sushi Thon'),
(22, 'California Thon Avocat'),
(23, 'California Saumon Avocat'),
(24, 'Edamame / Salade de chou'),
(25, 'Maki Salmon Roll'),
(26, 'California Saumon Avocat'),
(27, 'California Thon Cuit Avocat'),
(28, 'Edamame / Salade de chou'),
(29, 'Sando Chicken Katsu'),
(30, 'Maki Salmon Roll'),
(31, 'California Saumon Avocat'),
(32, 'California Thon Cuit Avocat'),
(33, 'Edamame / Salade de chou'),
(34, 'Sando Salmon Aburi'),
(35, 'California Saumon Avocat'),
(36, 'California Thon Cuit Avocat'),
(37, 'Edamame / Salade de chou'),
(38, 'California Saumon Avocat'),
(39, 'Maki Salmon Roll'),
(40, 'Maki Salmon'),
(41, 'Spring Saumon Avocat'),
(42, 'Edamame / Salade de chou'),
(43, 'California Saumon Avocat'),
(44, 'California Crevette'),
(45, 'California Thon Cuit Avocat'),
(46, 'California Chicken Katsu'),
(47, 'Edamame / Salade de chou'),
(48, 'Spring tataki Saumon'),
(49, 'Signature Dragon Roll'),
(50, 'California French Touch'),
(51, 'California French salmon'),
(52, 'California Yellowtail Ponzu'),
(53, 'Edamame / Salade de chou'),
(54, 'Maki Salmon Roll'),
(55, 'California Pacific'),
(56, 'Sushi Salmon'),
(57, 'Sushi Saumon Tsukudani'),
(58, 'Edamame / Salade de chou');

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

--
-- Déchargement des données de la table `box`
--

INSERT INTO `box` (`id_box`, `nom`, `pieces`, `prix`, `image`) VALUES
(1, 'Tasty Blend', 12, 12.5, 'tasty-blend'),
(2, 'Amateur Mix', 18, 15.9, 'amateur-mix'),
(3, 'Saumon Original', 11, 12.5, 'saumon-original'),
(4, 'Salmon Lovers', 18, 15.9, 'salmon-lovers'),
(5, 'Salmon Classic', 10, 15.9, 'salmon-classic'),
(6, 'Master Mix', 12, 15.9, 'master-mix'),
(7, 'Sunrise', 18, 15.9, 'sunrise'),
(8, 'Sando Box Chicken Katsu', 13, 15.9, 'sando-box-chicken-katsu'),
(9, 'Sando Box Salmon Aburi', 13, 15.9, 'sando-box-salmon-aburi'),
(10, 'Super Salmon', 24, 19.9, 'super-salmon'),
(11, 'California Dream', 24, 19.9, 'california-dream'),
(12, 'Gourmet Mix', 22, 24.5, 'gourmet-mix'),
(13, 'Fresh Mix', 22, 24.5, 'fresh-mix');

-- --------------------------------------------------------

--
-- Structure de la table `boxaliment`
--

CREATE TABLE `boxaliment` (
  `box_id` int(11) NOT NULL,
  `aliment_id` int(11) NOT NULL,
  `quantite` int(11) DEFAULT NULL,
  `nom_box` varchar(255) DEFAULT NULL,
  `nom_aliment` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `boxaliment`
--

INSERT INTO `boxaliment` (`box_id`, `aliment_id`, `quantite`, `nom_box`, `nom_aliment`) VALUES
(1, 1, 3, 'Tasty Blend', 'California Saumon Avocat'),
(1, 2, 3, 'Tasty Blend', 'Sushi Saumon'),
(1, 3, 3, 'Tasty Blend', 'Spring Avocat Cheese'),
(1, 4, 3, 'Tasty Blend', 'California pacific'),
(1, 5, 1, 'Tasty Blend', 'Edamame/Salade de chou'),
(2, 6, 3, 'Amateur Mix', 'Maki Salmon Roll'),
(2, 7, 3, 'Amateur Mix', 'Spring Saumon Avocat'),
(2, 8, 6, 'Amateur Mix', 'Maki Cheese Avocat'),
(2, 9, 3, 'Amateur Mix', 'California Saumon Avocat'),
(2, 10, 1, 'Amateur Mix', 'Edamame/Salade de chou'),
(3, 11, 6, 'Saumon Original', 'California Saumon Avocat'),
(3, 12, 5, 'Saumon Original', 'Sushi Saumon'),
(3, 13, 1, 'Saumon Original', 'Edamame/Salade de chou'),
(4, 14, 6, 'Salmon Lovers', 'California Saumon Avocat'),
(4, 15, 6, 'Salmon Lovers', 'Spring Saumon Avocat'),
(4, 16, 6, 'Salmon Lovers', 'Sushi Saumon'),
(4, 17, 1, 'Salmon Lovers', 'Edamame/Salade de chou'),
(5, 18, 10, 'Salmon Classic', 'Sushi Saumon'),
(5, 19, 1, 'Salmon Classic', 'Edamame/Salade de chou'),
(6, 20, 4, 'Master Mix', 'Sushi Saumon'),
(6, 21, 2, 'Master Mix', 'Sushi Thon'),
(6, 22, 3, 'Master Mix', 'California Thon Avocat'),
(6, 23, 3, 'Master Mix', 'California Saumon Avocat'),
(6, 24, 1, 'Master Mix', 'Edamame / Salade de chou'),
(7, 25, 6, 'Sunrise', 'Maki Salmon Roll'),
(7, 26, 6, 'Sunrise', 'California Saumon Avocat'),
(7, 27, 6, 'Sunrise', 'California Thon Cuit Avocat'),
(7, 28, 1, 'Sunrise', 'Edamame / Salade de chou'),
(8, 29, 1, 'Sando Box Chicken Katsu', 'Sando Chicken Katsu'),
(8, 30, 6, 'Sando Box Chicken Katsu', 'Maki Salmon Roll'),
(8, 31, 6, 'Sando Box Chicken Katsu', 'California Saumon Avocat'),
(8, 32, 6, 'Sando Box Chicken Katsu', 'California Thon Cuit Avocat'),
(8, 33, 1, 'Sando Box Chicken Katsu', 'Edamame / Salade de chou'),
(9, 34, 1, 'Sando Box Salmon Aburi', 'Sando Salmon Aburi'),
(9, 35, 6, 'Sando Box Salmon Aburi', 'California Saumon Avocat'),
(9, 36, 6, 'Sando Box Salmon Aburi', 'California Thon Cuit Avocat'),
(9, 37, 1, 'Sando Box Salmon Aburi', 'Edamame / Salade de chou'),
(10, 38, 6, 'Super Salmon', 'California Saumon Avocat'),
(10, 39, 6, 'Super Salmon', 'Maki Salmon Roll'),
(10, 40, 6, 'Super Salmon', 'Maki Salmon'),
(10, 41, 6, 'Super Salmon', 'Spring Saumon Avocat'),
(10, 42, 1, 'Super Salmon', 'Edamame / Salade de chou'),
(11, 43, 6, 'California Dream', 'California Saumon Avocat'),
(11, 44, 6, 'California Dream', 'California Crevette'),
(11, 45, 6, 'California Dream', 'California Thon Cuit Avocat'),
(11, 46, 6, 'California Dream', 'California Chicken Katsu'),
(11, 47, 1, 'California Dream', 'Edamame / Salade de chou'),
(12, 48, 6, 'Gourmet Mix', 'Spring tataki Saumon'),
(12, 49, 4, 'Gourmet Mix', 'Signature Dragon Roll'),
(12, 50, 3, 'Gourmet Mix', 'California French Touch'),
(12, 51, 6, 'Gourmet Mix', 'California French salmon'),
(12, 52, 3, 'Gourmet Mix', 'California Yellowtail Ponzu'),
(12, 53, 1, 'Gourmet Mix', 'Edamame / Salade de chou'),
(13, 13, 4, 'Fresh Mix', 'Edamame/Salade de chou'),
(13, 54, 6, 'Fresh Mix', 'Maki Salmon Roll'),
(13, 55, 6, 'Fresh Mix', 'California Pacific'),
(13, 56, 4, 'Fresh Mix', 'Sushi Salmon'),
(13, 57, 2, 'Fresh Mix', 'Sushi Saumon Tsukudani'),
(13, 58, 1, 'Fresh Mix', 'Edamame / Salade de chou');

-- --------------------------------------------------------

--
-- Structure de la table `boxsaveur`
--

CREATE TABLE `boxsaveur` (
  `box_id` int(11) NOT NULL,
  `saveur_id` int(11) NOT NULL,
  `nom_box` varchar(255) DEFAULT NULL,
  `nom_saveur` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `boxsaveur`
--

INSERT INTO `boxsaveur` (`box_id`, `saveur_id`, `nom_box`, `nom_saveur`) VALUES
(1, 1, 'Tasty Blend', 'saumon'),
(1, 2, 'Tasty Blend', 'avocat'),
(1, 3, 'Tasty Blend', 'cheese'),
(2, 4, 'Amateur Mix', 'coriandre'),
(2, 5, 'Amateur Mix', 'saumon'),
(2, 6, 'Amateur Mix', 'avocat'),
(2, 7, 'Amateur Mix', 'cheese'),
(3, 8, 'Saumon Original', 'saumon'),
(3, 9, 'Saumon Original', 'avocat'),
(4, 10, 'Salmon Lovers', 'coriandre'),
(4, 11, 'Salmon Lovers', 'saumon'),
(4, 12, 'Salmon Lovers', 'avocat'),
(5, 13, 'Salmon Classic', 'saumon'),
(6, 14, 'Master Mix', 'saumon'),
(6, 15, 'Master Mix', 'thon'),
(6, 16, 'Master Mix', 'avocat'),
(7, 17, 'Sunrise', 'saumon'),
(7, 18, 'Sunrise', 'thon'),
(7, 19, 'Sunrise', 'avocat'),
(7, 20, 'Sunrise', 'cheese'),
(8, 21, 'Sando Box Chicken Katsu', 'saumon'),
(8, 22, 'Sando Box Chicken Katsu', 'viande'),
(8, 23, 'Sando Box Chicken Katsu', 'avocat'),
(8, 24, 'Sando Box Chicken Katsu', 'cheese'),
(9, 25, 'Sando Box Salmon Aburi', 'saumon'),
(9, 26, 'Sando Box Salmon Aburi', 'thon'),
(9, 27, 'Sando Box Salmon Aburi', 'avocat'),
(10, 28, 'Super Salmon', 'coriandre'),
(10, 29, 'Super Salmon', 'saumon'),
(10, 30, 'Super Salmon', 'avocat'),
(10, 31, 'Super Salmon', 'cheese'),
(11, 32, 'California Dream', 'spicy'),
(11, 33, 'California Dream', 'saumon'),
(11, 34, 'California Dream', 'thon'),
(11, 35, 'California Dream', 'crevette'),
(11, 36, 'California Dream', 'viande'),
(11, 37, 'California Dream', 'avocat'),
(12, 38, 'Gourmet Mix', 'coriande'),
(12, 39, 'Gourmet Mix', 'spicy'),
(12, 40, 'Gourmet Mix', 'saumon'),
(12, 41, 'Gourmet Mix', 'viande'),
(12, 42, 'Gourmet Mix', 'avocat'),
(12, 43, 'Gourmet Mix', 'seriole lalandi'),
(13, 44, 'Fresh Mix', 'spicy'),
(13, 45, 'Fresh Mix', 'saumon'),
(13, 46, 'Fresh Mix', 'thon'),
(13, 47, 'Fresh Mix', 'avocat'),
(13, 48, 'Fresh Mix', 'cheese');

-- --------------------------------------------------------

--
-- Structure de la table `saveur`
--

CREATE TABLE `saveur` (
  `id_saveur` int(11) NOT NULL,
  `nom` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `saveur`
--

INSERT INTO `saveur` (`id_saveur`, `nom`) VALUES
(1, 'saumon'),
(2, 'avocat'),
(3, 'cheese'),
(4, 'coriandre'),
(5, 'saumon'),
(6, 'avocat'),
(7, 'cheese'),
(8, 'saumon'),
(9, 'avocat'),
(10, 'coriandre'),
(11, 'saumon'),
(12, 'avocat'),
(13, 'saumon'),
(14, 'saumon'),
(15, 'thon'),
(16, 'avocat'),
(17, 'saumon'),
(18, 'thon'),
(19, 'avocat'),
(20, 'cheese'),
(21, 'saumon'),
(22, 'viande'),
(23, 'avocat'),
(24, 'cheese'),
(25, 'saumon'),
(26, 'thon'),
(27, 'avocat'),
(28, 'coriandre'),
(29, 'saumon'),
(30, 'avocat'),
(31, 'cheese'),
(32, 'spicy'),
(33, 'saumon'),
(34, 'thon'),
(35, 'crevette'),
(36, 'viande'),
(37, 'avocat'),
(38, 'coriande'),
(39, 'spicy'),
(40, 'saumon'),
(41, 'viande'),
(42, 'avocat'),
(43, 'seriole lalandi'),
(44, 'spicy'),
(45, 'saumon'),
(46, 'thon'),
(47, 'avocat'),
(48, 'cheese');

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
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `aliment`
--
ALTER TABLE `aliment`
  MODIFY `id_aliment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT pour la table `box`
--
ALTER TABLE `box`
  MODIFY `id_box` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `saveur`
--
ALTER TABLE `saveur`
  MODIFY `id_saveur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

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

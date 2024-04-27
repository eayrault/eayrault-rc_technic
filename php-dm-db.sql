-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 28 mars 2024 à 16:13
-- Version du serveur : 8.2.0
-- Version de PHP : 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `php-dm-db`
--

-- --------------------------------------------------------

--
-- Structure de la table `marque`
--

DROP TABLE IF EXISTS `marque`;
CREATE TABLE IF NOT EXISTS `marque` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `contact` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `marque`
--

INSERT INTO `marque` (`id`, `nom`, `contact`, `email`) VALUES
(1, 'Toshiba', 'M. Toriyama', 'akira-rip@fake.com'),
(2, 'Schneider', 'M. Wolff', 'dwolff@fake.com'),
(3, 'Legrand', 'Mme Ursula', 'ursula-legrand@fake.com'),
(4, 'Nike', 'M. Lenon', 'boblenon@youtube.com');

-- --------------------------------------------------------

--
-- Structure de la table `materiel`
--

DROP TABLE IF EXISTS `materiel`;
CREATE TABLE IF NOT EXISTS `materiel` (
  `id` int NOT NULL AUTO_INCREMENT,
  `marque` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `reference` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `quantite` int NOT NULL,
  `prix` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `materiel`
--

INSERT INTO `materiel` (`id`, `marque`, `nom`, `reference`, `quantite`, `prix`) VALUES
(1, 'Legrand', 'Interrupteur', 'RX678', 12, 4.5),
(2, 'Legrand', 'Connecteur', 'RX468', 35, 1.6),
(3, 'Schneider', 'Cable 10m', 'CB764', 2, 14.5),
(4, 'Toshiba', 'Tasse', 'XXL', 50, 15);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `prenom` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `role` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `email`, `nom`, `prenom`, `password`, `role`) VALUES
(2, 'eliot.ayrault@fake.com', 'Ayrault', 'Eliot', '58696fdf4c998f42cbe26f0065ea772d105169759fe83d4d01daa18a6e0f940f36769ea35c561c3ced857919eb1d68bdd5e357e66a1732305ad8419badc81c0f', 1),
(4, 'eliot.ayrault@gmail.com', 'Ayrault', 'Eliot', '58696fdf4c998f42cbe26f0065ea772d105169759fe83d4d01daa18a6e0f940f36769ea35c561c3ced857919eb1d68bdd5e357e66a1732305ad8419badc81c0f', 2),
(5, 'eliot.admin@fake.com', 'Ayrault', 'Eliot', '58696fdf4c998f42cbe26f0065ea772d105169759fe83d4d01daa18a6e0f940f36769ea35c561c3ced857919eb1d68bdd5e357e66a1732305ad8419badc81c0f', 3);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

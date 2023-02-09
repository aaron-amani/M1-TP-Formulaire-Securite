-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : jeu. 09 fév. 2023 à 15:23
-- Version du serveur : 10.4.27-MariaDB
-- Version de PHP : 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `sécurité`
--

-- --------------------------------------------------------

--
-- Structure de la table `login`
--

CREATE TABLE `login` (
  `identifiant` varchar(100) NOT NULL,
  `mdp` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `login`
--

INSERT INTO `login` (`identifiant`, `mdp`) VALUES
('aaron', '$2y$10$rGPlBp5.DLCUL49nvAHtkOz/Iw.dHrHCwGidcOyYM90keQIoSZQqu'),
('martin', '$2y$10$CdDghsBOprscfogNhcnHhe.NWwwIsCRiWFaaL7crsL9dtqhzXetOu'),
('marie', '$2y$10$bcybbWEsEXTdufpnwJZsc.z4L4FJPDtU16HCVSWdGG0WlFOT8WhXC'),
('paul', '$2y$10$H2nA9Ot.Z9.dKJyHVP8qQO15ICyqbFcEiil52EMwoBjZftntgSWKO');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

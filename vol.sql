-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 18 mars 2024 à 12:48
-- Version du serveur : 5.7.36
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `lprs_aeroport`
--

-- --------------------------------------------------------

--
-- Structure de la table `vol`
--

DROP TABLE IF EXISTS `vol`;
CREATE TABLE IF NOT EXISTS `vol` (
  `id_vol` int(11) NOT NULL AUTO_INCREMENT,
  `destination` int(200) NOT NULL,
  `heure_depart` int(200) NOT NULL,
  `heure_arrive` int(200) NOT NULL,
  `ville_depart` int(200) NOT NULL,
  `ville_arrive` int(200) NOT NULL,
  `prix` int(100) NOT NULL,
  `matricule` int(50) NOT NULL,
  `ref_destination` int(11) NOT NULL,
  `ref_compagnie` int(11) NOT NULL,
  PRIMARY KEY (`id_vol`),
  KEY `fk_vol_destination` (`ref_destination`),
  KEY `fk_vol_compagnie` (`ref_compagnie`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `vol`
--
ALTER TABLE `vol`
  ADD CONSTRAINT `fk_vol_compagnie` FOREIGN KEY (`ref_compagnie`) REFERENCES `compagnie` (`id_compagnie`),
  ADD CONSTRAINT `fk_vol_destination` FOREIGN KEY (`ref_destination`) REFERENCES `vol` (`id_vol`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

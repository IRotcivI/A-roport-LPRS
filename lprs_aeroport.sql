-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 18 mars 2024 à 13:15
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
-- Structure de la table `aeroport`
--

DROP TABLE IF EXISTS `aeroport`;
CREATE TABLE IF NOT EXISTS `aeroport` (
  `id_aeroport` int(11) NOT NULL AUTO_INCREMENT,
  `gate` varchar(20) NOT NULL,
  `ref_destination` int(11) NOT NULL,
  PRIMARY KEY (`id_aeroport`),
  KEY `fk_aeroport_destination` (`ref_destination`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `avion`
--

DROP TABLE IF EXISTS `avion`;
CREATE TABLE IF NOT EXISTS `avion` (
  `id_avion` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(100) NOT NULL,
  `place` int(100) NOT NULL,
  PRIMARY KEY (`id_avion`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `compagnie`
--

DROP TABLE IF EXISTS `compagnie`;
CREATE TABLE IF NOT EXISTS `compagnie` (
  `id_compagnie` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) NOT NULL,
  `ref_avion` int(11) NOT NULL,
  PRIMARY KEY (`id_compagnie`),
  KEY `fk_avion_compagnie` (`ref_avion`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `conduit`
--

DROP TABLE IF EXISTS `conduit`;
CREATE TABLE IF NOT EXISTS `conduit` (
  `ref_avion` int(11) NOT NULL,
  `ref_utilisateur` int(11) NOT NULL,
  KEY `fk_conduit_avion` (`ref_avion`),
  KEY `fk_conduit_utilisateurs` (`ref_utilisateur`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `destination`
--

DROP TABLE IF EXISTS `destination`;
CREATE TABLE IF NOT EXISTS `destination` (
  `id_destination` int(11) NOT NULL AUTO_INCREMENT,
  `heure` time NOT NULL,
  `ville` varchar(150) NOT NULL,
  PRIMARY KEY (`id_destination`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `rejeter`
--

DROP TABLE IF EXISTS `rejeter`;
CREATE TABLE IF NOT EXISTS `rejeter` (
  `ref_vol` int(11) NOT NULL,
  `ref_utilisateur` int(11) NOT NULL,
  KEY `fk_rejeter_utilisateurs` (`ref_utilisateur`),
  KEY `fk_rejeter_vol` (`ref_vol`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

DROP TABLE IF EXISTS `utilisateurs`;
CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `id_utilisateurs` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `naissance` date NOT NULL,
  `role` varchar(100) NOT NULL,
  `rue` varchar(300) NOT NULL,
  `cp` int(8) NOT NULL,
  `ville` varchar(200) NOT NULL,
  `mail` varchar(150) NOT NULL,
  PRIMARY KEY (`id_utilisateurs`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
-- Contraintes pour la table `aeroport`
--
ALTER TABLE `aeroport`
  ADD CONSTRAINT `fk_aeroport_destination` FOREIGN KEY (`ref_destination`) REFERENCES `destination` (`id_destination`);

--
-- Contraintes pour la table `compagnie`
--
ALTER TABLE `compagnie`
  ADD CONSTRAINT `fk_avion_compagnie` FOREIGN KEY (`ref_avion`) REFERENCES `avion` (`id_avion`);

--
-- Contraintes pour la table `conduit`
--
ALTER TABLE `conduit`
  ADD CONSTRAINT `fk_conduit_avion` FOREIGN KEY (`ref_avion`) REFERENCES `avion` (`id_avion`),
  ADD CONSTRAINT `fk_conduit_utilisateurs` FOREIGN KEY (`ref_utilisateur`) REFERENCES `utilisateurs` (`id_utilisateurs`);

--
-- Contraintes pour la table `destination`
--
ALTER TABLE `destination`
  ADD CONSTRAINT `fk_destination_aeroport` FOREIGN KEY (`id_destination`) REFERENCES `aeroport` (`id_aeroport`),
  ADD CONSTRAINT `fk_destination_vol` FOREIGN KEY (`id_destination`) REFERENCES `vol` (`id_vol`);

--
-- Contraintes pour la table `rejeter`
--
ALTER TABLE `rejeter`
  ADD CONSTRAINT `fk_rejeter_utilisateurs` FOREIGN KEY (`ref_utilisateur`) REFERENCES `utilisateurs` (`id_utilisateurs`),
  ADD CONSTRAINT `fk_rejeter_vol` FOREIGN KEY (`ref_vol`) REFERENCES `vol` (`id_vol`);

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

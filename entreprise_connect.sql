-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : mar. 05 oct. 2021 à 03:32
-- Version du serveur :  10.3.31-MariaDB-cll-lve
-- Version de PHP : 7.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `c1723838c_starto`
--

-- --------------------------------------------------------

--
-- Structure de la table `entreprise_connect`
--

CREATE TABLE `entreprise_connect` (
  `entreid` int(11) NOT NULL,
  `UtilNom` varchar(30) NOT NULL,
  `UtilPrenom` varchar(30) NOT NULL,
  `NomEntreprise` varchar(30) NOT NULL,
  `Portable` varchar(15) NOT NULL,
  `Whatsapp` varchar(15) NOT NULL,
  `TailleEntrepri` varchar(5) NOT NULL,
  `Email1` varchar(40) NOT NULL,
  `Email2` varchar(40) DEFAULT NULL,
  `StartoMp` varchar(50) NOT NULL,
  `Fonction` varchar(20) NOT NULL,
  `ConditionLu` int(1) NOT NULL,
  `AbonNewsl` int(1) DEFAULT NULL,
  `AleatoireMp` varchar(20) NOT NULL,
  `Rand` varchar(30) NOT NULL,
  `DateEnreg` varchar(20) NOT NULL,
  `HeureEnreg` varchar(20) NOT NULL,
  `Vente` varchar(40) NOT NULL,
  `ServiceClient` varchar(40) NOT NULL,
  `Fidelisation` varchar(40) NOT NULL,
  `Recouvrement` varchar(40) NOT NULL,
  `Statut` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `entreprise_connect`
--
ALTER TABLE `entreprise_connect`
  ADD PRIMARY KEY (`entreid`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `entreprise_connect`
--
ALTER TABLE `entreprise_connect`
  MODIFY `entreid` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

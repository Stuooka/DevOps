-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Sam 11 Mars 2017 à 10:31
-- Version du serveur :  5.7.14
-- Version de PHP :  5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `devops`
--

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `firstName` varchar(50) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `accountMoney` float NOT NULL,
  `cardNumber` varchar(16) NOT NULL,
  `expirationDate` varchar(7) NOT NULL,
  `cvv` varchar(3) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`id`, `firstName`, `lastName`, `accountMoney`, `cardNumber`, `expirationDate`, `cvv`) VALUES
(1, 'Adrien', 'EXPERT', 300, '8249278255566412', '12/2020', '757'),
(2, 'Johann', 'PONSET', 300, '8652321444569785', '03/2015', '693'),
(3, 'Guillaume', 'LE PREUX', 300, '7564141232158795', '01/2017', '999'),
(4, 'Emmanuel', 'CAHOUR', 300, '7854321658741222', '07/2023', '145'),
(5, 'Kenny', 'BRAMONTE', 300, '9855145644527855', '02/2027', '414'),
(6, 'Arthur', 'PRIE', 300, '2587963245698532', '05/2024', '788'),
(7, 'Pierre', 'GOUCHET', 300, '4445628555691881', '02/2019', '212'),
(8, 'Florian', 'REBOULET', 300, '9988776655443322', '07/2018', '195'),
(9, 'Marie', 'DUCROS', 300, '3214753666547821', '11/2018', '784'),
(10, 'Xavier', 'DANG', 300, '2254369485487521', '07/2018', '327');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

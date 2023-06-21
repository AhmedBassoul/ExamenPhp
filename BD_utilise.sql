-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : mar. 09 mai 2023 à 04:03
-- Version du serveur : 10.4.28-MariaDB
-- Version de PHP : 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `SMI2023`
--

-- --------------------------------------------------------

--
-- Structure de la table `Reservations`
--

CREATE TABLE `Reservations` (
  `id` int(11) NOT NULL,
  `Email` varchar(250) NOT NULL,
  `Motif` varchar(250) NOT NULL,
  `Salle_id` int(11) NOT NULL,
  `Date` date NOT NULL,
  `Creneau` varchar(250) NOT NULL,
  `Etat` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `Reservations`
--

INSERT INTO `Reservations` (`id`, `Email`, `Motif`, `Salle_id`, `Date`, `Creneau`, `Etat`) VALUES
(26, 'ahmedbassoul@usmba.ac.ma', 'Presentation de PFE', 10, '2023-05-10', 'Matin', 'Active'),
(27, 'mohammedBenamer@usmba.ac.ma', 'PFE', 8, '2023-05-18', 'soir', 'Active'),
(28, 'ahmedBassoul@usmba.ac.ma', 'PFE', 5, '2023-05-18', 'Matin', 'Active'),
(29, 'mohammedBenamer@usmba.ac.ma', 'PFE', 5, '2023-05-18', 'soir', 'Active'),
(30, 'mohammedBenamer@usmba.ac.ma', 'Pour Passer Le Colle De PHP', 12, '2023-05-08', 'Matin', 'Active'),
(31, 'Yassin@usmba.ac.ma', 'Server', 12, '2023-06-02', 'Matin', 'Active'),
(32, 'Yassin@usmba.ac.ma', 'Service D\'achat', 5, '2023-05-25', 'Matin', 'Active'),
(33, 'Marouan@usmba.ac.ma', 'PFE', 10, '2023-05-24', 'Matin', 'Active'),
(34, 'Marouan@usmba.ac.ma', 'Parce Que Je Veux', 4, '2023-05-26', 'soir', 'Active'),
(35, 'ahmedBassoul@usmba.ac.ma', 'Car je suis l\'admine', 18, '2023-05-07', 'Matin', 'Active'),
(36, 'Yassin@usmba.ac.ma', 'test d\'activation par l\'admine', 18, '2023-05-07', 'Matin', 'Active'),
(37, 'ahmedBassoul@usmba.ac.ma', 'Je suis l\'admin', 10, '2023-05-10', 'soir', 'Active'),
(38, 'Lufy@usmba.ac.ma', 'To be the king of pirates', 23, '2023-05-10', 'Matin', 'Active'),
(39, 'ahmedBassoul@usmba.ac.ma', 'Nice', 6, '2023-05-24', 'Matin', 'Active'),
(43, 'ahmedBassoul@usmba.ac.ma', 'juste test 2', 12, '2023-05-09', 'Matin', 'Active'),
(44, 'ahmedBassoul@usmba.ac.ma', 'sdasd', 12, '2023-05-09', 'Matin', 'Active'),
(45, 'Adam@usmba.ac.ma', 'PFE', 19, '2023-05-24', 'soir', 'Desactive');

-- --------------------------------------------------------

--
-- Structure de la table `Salle`
--

CREATE TABLE `Salle` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `disponnible` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `Salle`
--

INSERT INTO `Salle` (`id`, `name`, `disponnible`) VALUES
(4, 'salle K3', 'yes'),
(5, 'salle M2', 'yes'),
(6, 'salle N1', 'yes'),
(8, 'salle Q2', 'non'),
(10, 'salle T3', 'yes'),
(11, 'Salle A103', 'yes'),
(12, 'Salle A102', 'yes'),
(13, 'Salle J1', 'yes'),
(15, 'Amphi H1', 'yes'),
(18, 'Amphi EE', 'yes'),
(19, 'Amphi F', 'yes'),
(20, 'Salle A105', 'yes'),
(23, 'Salle De Conference', 'yes'),
(24, 'Amphi PP', 'yes'),
(25, 'Salle M2', 'yes');

-- --------------------------------------------------------

--
-- Structure de la table `Users`
--

CREATE TABLE `Users` (
  `id` int(11) NOT NULL,
  `Email` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `Users`
--

INSERT INTO `Users` (`id`, `Email`) VALUES
(3, 'ahmedBassoul@usmba.ac.ma'),
(4, 'mohammedBenamer@usmba.ac.ma'),
(5, 'Yassin@usmba.ac.ma'),
(6, 'Marouan@usmba.ac.ma'),
(7, 'Lufy@usmba.ac.ma'),
(8, 'Adam@usmba.ac.ma');

-- --------------------------------------------------------

--
-- Structure de la table `UserTokens`
--

CREATE TABLE `UserTokens` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `Token` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `UserTokens`
--

INSERT INTO `UserTokens` (`id`, `user_id`, `Token`) VALUES
(1, 3, 'a5a5f1cd220bac5a4fa04ecc0e820f55b1818a96'),
(2, 4, 'cd6137870fe22d38c9c8c9227736adfdf0821d49'),
(3, 5, '69a0dacb4b0c4f901863f4f1c264e4c05ccc6347'),
(4, 6, '186e76457e80a980a34cd5a242f8404f42a216db'),
(5, 7, '29c4036ae0a9b49ed4a636f996215b6ca10767bf'),
(6, 8, '5790950ff470f4b4b845ed1b50b69c659cb1f649');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `Reservations`
--
ALTER TABLE `Reservations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `salle_fk` (`Salle_id`);

--
-- Index pour la table `Salle`
--
ALTER TABLE `Salle`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `UserTokens`
--
ALTER TABLE `UserTokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_fk` (`user_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `Reservations`
--
ALTER TABLE `Reservations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT pour la table `Salle`
--
ALTER TABLE `Salle`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT pour la table `Users`
--
ALTER TABLE `Users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `UserTokens`
--
ALTER TABLE `UserTokens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `Reservations`
--
ALTER TABLE `Reservations`
  ADD CONSTRAINT `salle_fk` FOREIGN KEY (`Salle_id`) REFERENCES `Salle` (`id`);

--
-- Contraintes pour la table `UserTokens`
--
ALTER TABLE `UserTokens`
  ADD CONSTRAINT `user_fk` FOREIGN KEY (`user_id`) REFERENCES `Users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

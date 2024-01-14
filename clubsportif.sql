-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : dim. 14 jan. 2024 à 14:47
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
-- Base de données : `clubsportif`
--

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `code_raccourci` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `nom`, `code_raccourci`) VALUES
(1, 'Junior', 'U10'),
(2, 'Minime', 'U5'),
(3, 'Bambin', 'U2'),
(4, 'Ado', 'U16'),
(5, 'Senior', 'U21'),
(7, 'Poussin', 'U1'),
(9, 'Nani', 'U9'),
(16, 'mignon', 'U5');

-- --------------------------------------------------------

--
-- Structure de la table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `numero_tel` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `contacts`
--

INSERT INTO `contacts` (`id`, `nom`, `prenom`, `email`, `numero_tel`) VALUES
(1, 'Brye', 'Oceanne', 'brye@gmail.com', '12345678900'),
(2, 'Yeo', 'Emmanuel', 'ye@gmail.com', '12345678900'),
(3, 'Attoh', 'Syntiche', 'atto@gmail.com', '12345678'),
(4, 'Bah', 'Binta', 'bah@gmail.com', '+33753245525'),
(5, 'Medi', 'Mamy', 'medy@gmail.com', '123456'),
(7, 'Toure', 'Saliou', 'touresaliou@gmail.com', '0237900067'),
(8, 'Diagne', 'Moudou', 'modis@gmail.com', '023790087654'),
(10, 'Manon', 'Nolween', 'manon@gmail.com', '+337532455'),
(11, 'Sani', 'Amuel', 'sa@gmail.com', '+33753245523');

-- --------------------------------------------------------

--
-- Structure de la table `doctrine_migration_versions`
--

CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20240106002858', '2024-01-08 23:42:38', 370),
('DoctrineMigrations\\Version20240106002859', '2024-01-08 23:42:39', 246);

-- --------------------------------------------------------

--
-- Structure de la table `educateurs`
--

CREATE TABLE `educateurs` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mot_de_passe` varchar(255) NOT NULL,
  `est_administrateur` tinyint(1) NOT NULL,
  `licencie_id_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `educateurs`
--

INSERT INTO `educateurs` (`id`, `email`, `mot_de_passe`, `est_administrateur`, `licencie_id_id`) VALUES
(4, 'bo@gmail.com', '$2y$10$tBHWJOA5VAj/ICSJF5zVy.EYmInEQUeNc.Npu2DpX/kAuMcMTUIxS', 1, 3),
(10, 'oceanne@gmail.com', '$2y$10$pvev9nxTXYuIBIfJbiCMquBTnYQ8CBMjoP1mgjAy4U6oPbXJMczTO', 1, 6),
(11, 'ocea@gmail.com', '$2y$10$n7k3BCv2AkJl.9nTdHvtWeStl54reLwJvKyl4hi9IqRtIeTRze9dG', 1, 5),
(13, 'fatou@gmail.com', '$2y$10$1qizqRs1uyuTppIhDg3Dyujex7RPllI2ZAgALCehhXFfSpZTbN592', 0, 4),
(16, 'emmanuelYeo@gmail.com', '$2y$10$DVM4oCFiY1iuWQx26fU7u.4H/7H2Xbjh7CZyOuR5mv2YDFa4JZU8i', 1, 7),
(20, 'sm@gmail.com', '$2y$10$FrVYPrePYyWlms4g2cTtae64Axp0GPAB9KnwepmgHCdjmXESjait.', 1, 17),
(21, 'kfi@gmail.com', '$2y$10$hFoLxBSldcapjma4MKVgNOR621VAZ6d64DEntxIwHFpIDB/s9yhNu', 1, 28);

-- --------------------------------------------------------

--
-- Structure de la table `licencies`
--

CREATE TABLE `licencies` (
  `id` int(11) NOT NULL,
  `numero_licence` varchar(20) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `contact_id_id` int(11) DEFAULT NULL,
  `categorie_id_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `licencies`
--

INSERT INTO `licencies` (`id`, `numero_licence`, `nom`, `prenom`, `contact_id_id`, `categorie_id_id`) VALUES
(2, 'Bo1234', 'Bah', 'Oumou', 2, 2),
(3, 'Bo1235', 'Brye', 'Junior', 1, 1),
(4, 'AD125', 'Attoh', 'Desiree', 3, 1),
(5, 'SB683', 'Soro', 'Bryan', 2, 2),
(6, 'PK816', 'papad', 'Kedja', 1, 3),
(7, 'DM258', 'Dia', 'Marro', 4, 1),
(9, 'Bo124', 'Ba', 'Oumar', 2, 2),
(10, 'Bo135', 'Brye', 'Junior', 1, 1),
(16, 'SB806', 'Sanes', 'Boubou', 5, 4),
(17, 'SM125', 'sanogo', 'Marlene Eliora', 10, 5),
(20, 'DP090', 'Dupond', 'phillipe', 1, 4),
(21, 'Bo234', 'Bah', 'Oceanne', 2, 2),
(27, 'AD902', 'Appa', 'Damien', 10, 9),
(28, 'DP00', 'Dupond', 'Marie', 1, 4),
(29, 'Bo24', 'Bah', 'Orianne', 2, 2);

-- --------------------------------------------------------

--
-- Structure de la table `mail_contact`
--

CREATE TABLE `mail_contact` (
  `id` int(11) NOT NULL,
  `date_envoie` datetime DEFAULT NULL,
  `objet` varchar(255) DEFAULT NULL,
  `message` varchar(255) DEFAULT NULL,
  `expediteur_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `mail_contact`
--

INSERT INTO `mail_contact` (`id`, `date_envoie`, `objet`, `message`, `expediteur_id`) VALUES
(5, '2024-01-10 14:19:01', 'Recherche de stage', 'Cv', 4),
(6, '2024-01-10 14:42:55', 'ok', 'message', 11),
(7, '2024-01-12 18:45:58', 'Demande d\'emploi', 'Bojour m. le DG de l\'istic', 4),
(9, '2024-01-14 01:58:48', 'Mise a niveau', 'Le cours de mise a niveau est remis au 16 janvier prochain', 4),
(10, '2024-01-14 14:19:10', 'Cours de Sky', 'Le cours est remis au jeudi prochain.', 4);

-- --------------------------------------------------------

--
-- Structure de la table `mail_edu`
--

CREATE TABLE `mail_edu` (
  `id` int(11) NOT NULL,
  `date_envoi` datetime DEFAULT NULL,
  `objet` varchar(255) DEFAULT NULL,
  `message` varchar(255) DEFAULT NULL,
  `expediteur_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `mail_edu`
--

INSERT INTO `mail_edu` (`id`, `date_envoi`, `objet`, `message`, `expediteur_id`) VALUES
(2, '2024-01-10 14:40:06', 'obje', 'message', 11),
(3, '2024-01-10 14:40:33', 'ok', 'mmo', 11),
(5, '2024-01-10 19:13:14', 'Salutation', 'coucou ma collegue cherie', 13),
(7, '2024-01-14 02:00:02', 'Mise a niveau', 'les cours ont ete remis au 17 janvier, merci de venir tot.', 4),
(8, '2024-01-14 14:20:01', 'Cours de Sky', 'Veuillez venir a l\'heure', 4);

-- --------------------------------------------------------

--
-- Structure de la table `mail_educateur_contact`
--

CREATE TABLE `mail_educateur_contact` (
  `mail_contact_id` int(11) NOT NULL,
  `contacts_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `mail_educateur_contact`
--

INSERT INTO `mail_educateur_contact` (`mail_contact_id`, `contacts_id`) VALUES
(5, 2),
(5, 4),
(6, 1),
(6, 3),
(7, 1),
(9, 1),
(9, 3),
(9, 4),
(10, 1),
(10, 5);

-- --------------------------------------------------------

--
-- Structure de la table `mail_edu_educateur`
--

CREATE TABLE `mail_edu_educateur` (
  `mail_edu_id` int(11) NOT NULL,
  `educateurs_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `mail_edu_educateur`
--

INSERT INTO `mail_edu_educateur` (`mail_edu_id`, `educateurs_id`) VALUES
(2, 10),
(3, 4),
(5, 4),
(8, 10);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `doctrine_migration_versions`
--
ALTER TABLE `doctrine_migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Index pour la table `educateurs`
--
ALTER TABLE `educateurs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `licencie_id` (`licencie_id_id`);

--
-- Index pour la table `licencies`
--
ALTER TABLE `licencies`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `numero_licence` (`numero_licence`),
  ADD KEY `FK_97654321feedcba` (`contact_id_id`),
  ADD KEY `FK_97654322fedcba` (`categorie_id_id`);

--
-- Index pour la table `mail_contact`
--
ALTER TABLE `mail_contact`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_12346789abcdef` (`expediteur_id`);

--
-- Index pour la table `mail_edu`
--
ALTER TABLE `mail_edu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_123456891abcdef` (`expediteur_id`);

--
-- Index pour la table `mail_educateur_contact`
--
ALTER TABLE `mail_educateur_contact`
  ADD PRIMARY KEY (`mail_contact_id`,`contacts_id`),
  ADD KEY `IDX_987654321fedcba` (`mail_contact_id`),
  ADD KEY `IDX_123456789abcdef` (`contacts_id`);

--
-- Index pour la table `mail_edu_educateur`
--
ALTER TABLE `mail_edu_educateur`
  ADD PRIMARY KEY (`mail_edu_id`,`educateurs_id`),
  ADD KEY `IDX_987654321fedcba` (`mail_edu_id`),
  ADD KEY `IDX_123456789abcdef` (`educateurs_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT pour la table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `educateurs`
--
ALTER TABLE `educateurs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT pour la table `licencies`
--
ALTER TABLE `licencies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT pour la table `mail_contact`
--
ALTER TABLE `mail_contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `mail_edu`
--
ALTER TABLE `mail_edu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `educateurs`
--
ALTER TABLE `educateurs`
  ADD CONSTRAINT `FK_97654321heedcba` FOREIGN KEY (`licencie_id_id`) REFERENCES `licencies` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `educateurs_ibfk_1` FOREIGN KEY (`licencie_id_id`) REFERENCES `licencies` (`id`);

--
-- Contraintes pour la table `licencies`
--
ALTER TABLE `licencies`
  ADD CONSTRAINT `FK_97654321feedcba` FOREIGN KEY (`contact_id_id`) REFERENCES `contacts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_97654322fedcba` FOREIGN KEY (`categorie_id_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `licencies_ibfk_1` FOREIGN KEY (`contact_id_id`) REFERENCES `contacts` (`id`),
  ADD CONSTRAINT `licencies_ibfk_2` FOREIGN KEY (`categorie_id_id`) REFERENCES `categories` (`id`);

--
-- Contraintes pour la table `mail_contact`
--
ALTER TABLE `mail_contact`
  ADD CONSTRAINT `FK_12346789abcdef` FOREIGN KEY (`expediteur_id`) REFERENCES `educateurs` (`id`);

--
-- Contraintes pour la table `mail_edu`
--
ALTER TABLE `mail_edu`
  ADD CONSTRAINT `FK_123456891abcdef` FOREIGN KEY (`expediteur_id`) REFERENCES `educateurs` (`id`);

--
-- Contraintes pour la table `mail_educateur_contact`
--
ALTER TABLE `mail_educateur_contact`
  ADD CONSTRAINT `FK_13456789yabcdef` FOREIGN KEY (`contacts_id`) REFERENCES `contacts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_97654321fedcba` FOREIGN KEY (`mail_contact_id`) REFERENCES `mail_contact` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `mail_edu_educateur`
--
ALTER TABLE `mail_edu_educateur`
  ADD CONSTRAINT `FK_12345639abcdef` FOREIGN KEY (`educateurs_id`) REFERENCES `educateurs` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_98765431fedcba` FOREIGN KEY (`mail_edu_id`) REFERENCES `mail_edu` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

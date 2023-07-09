-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : dim. 09 juil. 2023 à 16:33
-- Version du serveur : 10.4.27-MariaDB
-- Version de PHP : 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `datareceiver`
--

-- --------------------------------------------------------

--
-- Structure de la table `comptes_comptables`
--

CREATE TABLE `comptes_comptables` (
  `id` int(11) NOT NULL,
  `intitule_compte` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `comptes_comptables`
--

INSERT INTO `comptes_comptables` (`id`, `intitule_compte`) VALUES
(401, 'Fournisseur'),
(445, 'TVA déductible'),
(601, 'Achats stockés de matières premières'),
(602, 'Achats stockés - Autres approvisionnements'),
(603, 'Variation des stocks'),
(604, 'Achat d’études et prestations de services'),
(605, 'Achat de matériel, équipement et travaux'),
(606, 'Achats non stockés de matières et fournitures'),
(607, 'Achats de marchandises'),
(608, 'Frais accessoires d’achat'),
(701, 'Ventes de produits finis - Marchandises'),
(702, 'Ventes de produits finis - Produits fabriqués'),
(703, 'Ventes de produits finis - Produits intermédiaires'),
(704, 'Ventes de produits finis - Travaux'),
(705, 'Prestations de services - Services vendus'),
(706, 'Prestations de services - Travaux'),
(707, 'Redevances, droits et valeurs similaires'),
(708, 'Produits annexes');

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
('DoctrineMigrations\\Version20230708150710', '2023-07-08 17:07:32', 210),
('DoctrineMigrations\\Version20230708150920', '2023-07-08 17:09:38', 153),
('DoctrineMigrations\\Version20230708152544', '2023-07-08 17:44:14', 7),
('DoctrineMigrations\\Version20230708152755', '2023-07-08 17:45:36', 7),
('DoctrineMigrations\\Version20230708155847', '2023-07-08 18:00:20', 21),
('DoctrineMigrations\\Version20230708160802', '2023-07-08 18:08:51', 16),
('DoctrineMigrations\\Version20230708160930', '2023-07-08 18:13:40', 12);

-- --------------------------------------------------------

--
-- Structure de la table `ecritures`
--

CREATE TABLE `ecritures` (
  `id` int(11) NOT NULL,
  `journal_id` int(11) NOT NULL,
  `id_piece` int(11) NOT NULL,
  `debit` double DEFAULT NULL,
  `credit` double DEFAULT NULL,
  `date_ecriture` datetime DEFAULT NULL,
  `compte_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `ecritures`
--

INSERT INTO `ecritures` (`id`, `journal_id`, `id_piece`, `debit`, `credit`, `date_ecriture`, `compte_id`) VALUES
(18, 1, 28, 135, NULL, '2023-07-09 15:32:34', 602),
(19, 1, 28, 27, NULL, '2023-07-09 15:32:34', 445),
(20, 1, 28, NULL, 162, '2023-07-09 15:32:34', 401),
(21, 1, 29, 30, NULL, '2023-07-09 15:36:05', 607),
(22, 1, 29, 6, NULL, '2023-07-09 15:36:05', 445),
(23, 1, 29, NULL, 36, '2023-07-09 15:36:05', 401);

-- --------------------------------------------------------

--
-- Structure de la table `journaux`
--

CREATE TABLE `journaux` (
  `id` int(11) NOT NULL,
  `code_journal` varchar(5) NOT NULL,
  `intitule_journal` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `journaux`
--

INSERT INTO `journaux` (`id`, `code_journal`, `intitule_journal`) VALUES
(1, 'AC', 'Journal des achats'),
(2, 'VT', 'Journal des ventes'),
(3, 'TC', 'Journaux de trésorerie'),
(4, 'OD', 'Journaux des opérations diverses');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `comptes_comptables`
--
ALTER TABLE `comptes_comptables`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `doctrine_migration_versions`
--
ALTER TABLE `doctrine_migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Index pour la table `ecritures`
--
ALTER TABLE `ecritures`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_2CD5FD76E20408D5` (`journal_id`),
  ADD KEY `IDX_2CD5FD76F2C56620` (`compte_id`);

--
-- Index pour la table `journaux`
--
ALTER TABLE `journaux`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `ecritures`
--
ALTER TABLE `ecritures`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT pour la table `journaux`
--
ALTER TABLE `journaux`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `ecritures`
--
ALTER TABLE `ecritures`
  ADD CONSTRAINT `FK_2CD5FD76E20408D5` FOREIGN KEY (`journal_id`) REFERENCES `journaux` (`id`),
  ADD CONSTRAINT `FK_2CD5FD76F2C56620` FOREIGN KEY (`compte_id`) REFERENCES `comptes_comptables` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

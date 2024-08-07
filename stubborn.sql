-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mer. 07 août 2024 à 10:46
-- Version du serveur : 8.3.0
-- Version de PHP : 8.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `stubborn`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_880E0D765E237E06` (`name`),
  UNIQUE KEY `UNIQ_880E0D76E7927C74` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`) VALUES
(1, 'Jane Doe', 'stubborn@blabla.com', 'admin');

-- --------------------------------------------------------

--
-- Structure de la table `doctrine_migration_versions`
--

DROP TABLE IF EXISTS `doctrine_migration_versions`;
CREATE TABLE IF NOT EXISTS `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8mb3_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Déchargement des données de la table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20240711192234', '2024-07-11 19:23:40', 602),
('DoctrineMigrations\\Version20240712112517', '2024-07-12 11:32:52', 206),
('DoctrineMigrations\\Version20240712113233', '2024-07-18 14:01:19', 153),
('DoctrineMigrations\\Version20240712122638', '2024-07-18 14:01:19', 302),
('DoctrineMigrations\\Version20240718134744', '2024-07-18 14:11:55', 144),
('DoctrineMigrations\\Version20240718150407', '2024-07-18 15:04:26', 221),
('DoctrineMigrations\\Version20240721104956', '2024-07-21 10:50:11', 800),
('DoctrineMigrations\\Version20240722090959', '2024-07-22 09:10:17', 545),
('DoctrineMigrations\\Version20240722092344', '2024-07-22 09:23:55', 322),
('DoctrineMigrations\\Version20240722124744', '2024-07-22 12:47:59', 315),
('DoctrineMigrations\\Version20240722202220', '2024-07-22 20:22:32', 704),
('DoctrineMigrations\\Version20240722202359', '2024-07-22 20:24:08', 135),
('DoctrineMigrations\\Version20240723131718', '2024-07-23 13:17:31', 586);

-- --------------------------------------------------------

--
-- Structure de la table `messenger_messages`
--

DROP TABLE IF EXISTS `messenger_messages`;
CREATE TABLE IF NOT EXISTS `messenger_messages` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `body` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `headers` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue_name` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `available_at` datetime NOT NULL,
  `delivered_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_75EA56E0FB7336F0` (`queue_name`),
  KEY `IDX_75EA56E0E3BD61CE` (`available_at`),
  KEY `IDX_75EA56E016BA31DB` (`delivered_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `reset_password_request`
--

DROP TABLE IF EXISTS `reset_password_request`;
CREATE TABLE IF NOT EXISTS `reset_password_request` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `selector` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hashed_token` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `requested_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `expires_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  PRIMARY KEY (`id`),
  KEY `IDX_7CE748AA76ED395` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `reset_password_request`
--

INSERT INTO `reset_password_request` (`id`, `user_id`, `selector`, `hashed_token`, `requested_at`, `expires_at`) VALUES
(1, 1, '0WbsUwsgJUosaFFs3MxH', 'CVMol6WCMMgbKObC1NUO6TZSULIfyGKzapYSRkVHrko=', '2024-07-23 17:53:29', '2024-07-23 18:53:29');

-- --------------------------------------------------------

--
-- Structure de la table `sweatshirts`
--

DROP TABLE IF EXISTS `sweatshirts`;
CREATE TABLE IF NOT EXISTS `sweatshirts` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(4,2) NOT NULL,
  `size` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stock_xs` int NOT NULL,
  `stock_s` int NOT NULL,
  `stock_m` int NOT NULL,
  `stock_l` int NOT NULL,
  `stock_xl` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `sweatshirts`
--

INSERT INTO `sweatshirts` (`id`, `name`, `price`, `size`, `stock_xs`, `stock_s`, `stock_m`, `stock_l`, `stock_xl`) VALUES
(1, 'Blackbelt', 29.90, 'XS, S, M, L, XL', 3, 2, 2, 2, 5),
(2, 'BlueBelt', 29.90, 'XS, S, M, L, XL', 2, 2, 2, 2, 2),
(3, 'Street', 34.50, 'XS, S, M, L, XL', 2, 2, 2, 2, 2),
(4, 'Pokeball', 45.00, 'XS, S, M, L, XL', 2, 2, 2, 2, 2),
(5, 'PinkLady', 29.90, 'XS, S, M, L, XL', 2, 2, 2, 2, 2),
(6, 'Snow', 32.00, 'XS, S, M, L, XL', 2, 2, 2, 2, 2),
(7, 'Greyback', 28.50, 'XS, S, M, L, XL', 2, 2, 2, 2, 2),
(8, 'BlueCloud', 45.00, 'XS, S, M, L, XL', 2, 2, 2, 2, 2),
(9, 'BornInUsa', 59.90, 'XS, S, M, L, XL', 2, 2, 2, 2, 2),
(10, 'GreenSchool', 42.20, 'XS, S, M, L, XL', 2, 2, 2, 2, 2);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` json NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `delivery_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_verified` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_8D93D649E7927C74` (`email`),
  UNIQUE KEY `UNIQ_8D93D6495E237E06` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `email`, `roles`, `password`, `name`, `delivery_address`, `is_verified`) VALUES
(1, 'amelynea91@gmail.com', '[\"ROLE_USER\"]', '$2y$13$xTB.TRitXRS6nLHhmekY1uYAJQvspi7fT5z.WQKJ4YX.bqrhxfmEK', 'Amelyne Antunes', '1 rue de Paris 75001 Paris', 0),
(2, 'stubborn@blabla.com', '[\"ROLE_ADMIN\"]', '$2y$13$uKKvsGgP80yw6v1D4x2ay.blyUd82YwX/PDU4fBI.Vi/QcaYPUucm', 'Jane Doe', 'Piccadilly Circus, London W1J 0DA, Royaume-Uni', 0);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `reset_password_request`
--
ALTER TABLE `reset_password_request`
  ADD CONSTRAINT `FK_7CE748AA76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

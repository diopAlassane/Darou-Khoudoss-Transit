-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 13 sep. 2022 à 13:27
-- Version du serveur : 10.4.24-MariaDB
-- Version de PHP : 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `darou_khoudoss_transit`
--

-- --------------------------------------------------------

--
-- Structure de la table `cotationfret`
--

CREATE TABLE `cotationfret` (
  `id` int(11) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `entreprise` varchar(255) DEFAULT NULL,
  `prestation` varchar(255) DEFAULT NULL,
  `commentaire` varchar(255) DEFAULT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `updated` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `cotationfret`
--

INSERT INTO `cotationfret` (`id`, `prenom`, `nom`, `phone`, `email`, `entreprise`, `prestation`, `commentaire`, `created`, `updated`) VALUES
(7, 'Maiores temporibus m', 'Deserunt ducimus et', '+1 (283) 324-4634', 'dopy@mailinator.com', 'Dolorum ex tenetur n', 'Nisi consectetur qua', 'Array', '2022-09-12 14:03:09', '2022-09-12 14:03:09'),
(8, 'Irure voluptate omni', 'Sed nihil voluptas a', '+1 (364) 343-8025', 'lynisixo@mailinator.com', 'Fugiat elit aute n', 'Earum nulla providen', 'Array', '2022-09-12 14:03:41', '2022-09-12 14:03:41'),
(9, 'joop', 'joop', '778596633', 'welzii@gmail.com', 'delta', 'test', 'Array', '2022-09-12 14:04:24', '2022-09-12 14:04:24'),
(10, 'Quo quis ut cupidita', 'Fugiat nihil sequi ', '+1 (957) 847-8241', 'zaxut@mailinator.com', 'Eos sint laborum L', 'Array', 'Qui ipsam vitae nobi', '2022-09-12 14:05:04', '2022-09-12 14:05:04'),
(11, 'Non et commodo eos e', 'Veniam a dolorem do', '+1 (462) 941-9066', 'torice@mailinator.com', 'Cupidatat sint id ', 'Array', 'Deserunt consectetur', '2022-09-12 14:10:21', '2022-09-12 14:10:21'),
(12, 'Autem exercitationem', 'Dolorem ex minus pra', '+1 (981) 229-2485', 'zyzi@mailinator.com', 'Aut provident id c', 'Array', 'Quo pariatur Quidem', '2022-09-12 15:00:59', '2022-09-12 15:00:59'),
(13, 'Labore delectus con', 'Beatae necessitatibu', '+1 (656) 417-9424', 'lerit@mailinator.com', 'Eveniet in itaque a', 'Array', 'Adipisicing molestia', '2022-09-12 15:46:44', '2022-09-12 15:46:44'),
(14, 'Labore inventore del', 'Fugiat asperiores s', '+1 (754) 523-2459', 'kecosygu@mailinator.com', 'Totam beatae nihil l', 'Array', 'Ullamco consequuntur', '2022-09-12 15:46:47', '2022-09-12 15:46:47'),
(15, 'Quis ducimus earum ', 'Quam nemo error saep', '+1 (518) 753-4321', 'nogahodyp@mailinator.com', 'Totam et ut aut exer', 'Array', 'Dolorem doloribus qu', '2022-09-12 15:46:51', '2022-09-12 15:46:51'),
(16, 'Nihil nostrum id rer', 'Aperiam iure excepte', '+1 (539) 518-2441', 'zewicyry@mailinator.com', 'Velit similique mini', 'Array', 'Porro aut voluptatib', '2022-09-12 15:46:54', '2022-09-12 15:46:54'),
(17, 'In et eius ipsum ex', 'Exercitation exceptu', '+1 (687) 621-7301', 'nuwufiwipu@mailinator.com', 'Incididunt accusamus', 'Array', 'Nesciunt porro ad d', '2022-09-12 15:46:58', '2022-09-12 15:46:58'),
(18, 'Libero veniam tenet', 'Aperiam minus fugit', '+1 (167) 602-2749', 'dabevih@mailinator.com', 'Modi ipsam laborum ', 'Array', 'Et in corporis quis ', '2022-09-12 15:47:02', '2022-09-12 15:47:02'),
(19, 'Et dolore in dolore ', 'In consequat Autem ', '+1 (344) 269-5178', 'jicifemyf@mailinator.com', 'Amet laudantium en', 'Array', 'Optio duis molestia', '2022-09-12 15:49:45', '2022-09-12 15:49:45'),
(20, 'Id hic excepturi seq', 'Ea nobis proident n', '+1 (383) 743-1084', 'majorom@mailinator.com', 'Id illum ut illum ', 'Array', 'Qui sit eligendi vol', '2022-09-12 15:51:59', '2022-09-12 15:51:59');

-- --------------------------------------------------------

--
-- Structure de la table `password_reset`
--

CREATE TABLE `password_reset` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `reset_token` varchar(255) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `password_reset`
--

INSERT INTO `password_reset` (`id`, `uid`, `reset_token`, `created`) VALUES
(7, 16, '4b4de8524319058f9c2552dea849bd51', '2022-09-13 09:42:51'),
(8, 16, '0be50c8183b837c584b26ba646efb5f3', '2022-09-13 09:43:20'),
(9, 16, '20df7e84e6b17c353e3138f48374ac5e', '2022-09-13 09:43:23'),
(10, 16, '3a2b979193937b658d9be2c5b0ddb38a', '2022-09-13 09:43:24'),
(11, 16, '407461671d650b63e592a79191faa0b5', '2022-09-13 09:44:52'),
(12, 17, 'c9320f0c0ee6327135073ed9d19cb53c', '2022-09-13 09:46:22'),
(13, 17, '4e5af27c32acf9ab610a447304f4a9d2', '2022-09-13 09:46:39'),
(14, 17, '5be6c2fbfdc9c75c29f463d611ceef54', '2022-09-13 10:14:42'),
(15, 17, '5af0bd692631b806f5778a4e9a19d034', '2022-09-13 10:17:03'),
(16, 16, '5feebb8b47a0aa7c7f2b8952edeb6ee0', '2022-09-13 10:19:05'),
(17, 17, '173df09f501e4a6009282fc1c8639f7d', '2022-09-13 10:37:12');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `updated` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `created`, `updated`) VALUES
(6, 'test', 'test@gmail.com', '$2y$10$j27SRq1xwMCgSueYeHm93emtmo71gUrwfZ/DIKhfk2PdmnYOtVbTO', '2019-07-22 21:08:23', '2019-07-23 12:41:36'),
(8, 'vivek', 'vivek@codingcyber.com', '$2y$10$2EMIBRVxzpPEIqUkBbi.5OMDJmlgoyRQ8wAVES/GIavSE.5dvHOve', '2019-07-22 21:11:45', '2019-07-23 13:10:21'),
(9, 'vivek1', 'vivek1@codingcyber.com', '$2y$10$s3YkycHU18UFrWfYl3.t..IL6l0ef.HpnlOVdW0TlpbXUh2ObTv/S', '2019-07-22 21:20:44', '2019-07-22 21:20:44'),
(16, 'welzii', 'welzii@gmail.com', '$2y$10$CAlqTzOE.nh0cFsL4SEzmOSvc/.S5JoA3vsKTY/E.pDTGsow7T6m2', '2022-09-12 13:36:19', '2022-09-12 13:36:19'),
(17, 'joop', 'welziiranzoh@gmail.com', '$2y$10$yRfWsT96FyeZJm2Eaj2CN.h07nmOwjCZueybAgomjOgjQiyYqFVwu', '2022-09-13 09:46:03', '2022-09-13 09:46:03');

-- --------------------------------------------------------

--
-- Structure de la table `user_info`
--

CREATE TABLE `user_info` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `updated` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `user_info`
--

INSERT INTO `user_info` (`id`, `uid`, `fname`, `lname`, `mobile`, `created`, `updated`) VALUES
(1, 12, '', '', '9876543210', '2019-07-23 15:14:53', '2019-07-23 15:14:53'),
(2, 13, '', '', 'mafyna@mailinator.com', '2022-09-12 10:52:19', '2022-09-12 10:52:19'),
(3, 14, '', '', 'lowuk@mailinator.com', '2022-09-12 10:54:27', '2022-09-12 10:54:27'),
(4, 15, '', '', '+1 (985) 143-9564', '2022-09-12 11:05:03', '2022-09-12 11:05:03'),
(5, 16, '', '', '777777777777', '2022-09-12 13:36:19', '2022-09-12 13:36:19'),
(6, 17, '', '', '777777777777', '2022-09-13 09:46:03', '2022-09-13 09:46:03');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `cotationfret`
--
ALTER TABLE `cotationfret`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `password_reset`
--
ALTER TABLE `password_reset`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Index pour la table `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `cotationfret`
--
ALTER TABLE `cotationfret`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT pour la table `password_reset`
--
ALTER TABLE `password_reset`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT pour la table `user_info`
--
ALTER TABLE `user_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

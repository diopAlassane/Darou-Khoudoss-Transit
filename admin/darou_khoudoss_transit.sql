-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 19 sep. 2022 à 13:49
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
-- Structure de la table `acaht_voiture`
--

CREATE TABLE `acaht_voiture` (
  `id` int(11) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `adresse` varchar(255) DEFAULT NULL,
  `dateAchat` varchar(255) DEFAULT NULL,
  `model` varchar(255) DEFAULT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `updated` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `acaht_voiture`
--

INSERT INTO `acaht_voiture` (`id`, `prenom`, `nom`, `phone`, `adresse`, `dateAchat`, `model`, `created`, `updated`) VALUES
(1, 'Explicabo Tempora o', 'Ratione distinctio ', '+1 (976) 256-2593', 'Ex odio ea mollit ev', '1970-03-17T09:22', 'JEEP - GRAND CHEROKEE', '2022-09-13 15:52:55', '2022-09-13 15:52:55'),
(2, 'Tempore sapiente en', 'Repellendus Non und', '+1 (207) 723-3772', 'Consequuntur deserun', '1982-06-08T02:39', 'MITSUBISHI - L200', '2022-09-13 15:55:07', '2022-09-13 15:55:07'),
(3, 'Sed irure nobis nequ', 'Eum duis sunt conseq', '+1 (493) 239-1262', 'Esse dolore quia ani', '1999-11-11T12:53', 'FORD-EXPLORER', '2022-09-13 16:18:30', '2022-09-13 16:18:30'),
(4, 'Ut est cumque quos s', 'Occaecat in ea beata', '+1 (621) 547-1628', 'Recusandae Quisquam', '1971-02-24T16:44', 'MITSUBISHI - L200', '2022-09-13 16:21:17', '2022-09-13 16:21:17'),
(5, 'Enim quo error eveni', 'Eaque facilis labori', '+1 (863) 459-3049', 'Dolor iste in molest', '1984-12-08T18:13', 'FORD-Fusion', '2022-09-13 16:21:21', '2022-09-13 16:21:21'),
(6, 'Magni omnis quia occ', 'Velit ducimus volu', '+1 (534) 539-5293', 'Culpa rerum asperior', '1980-11-18T03:46', 'FORD-Fusion', '2022-09-13 16:21:25', '2022-09-13 16:21:25');

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `affiliation` varchar(255) NOT NULL,
  `departement` varchar(255) DEFAULT NULL,
  `dateContact` varchar(255) DEFAULT NULL,
  `messages` varchar(255) DEFAULT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `updated` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `contact`
--

INSERT INTO `contact` (`id`, `nom`, `email`, `phone`, `affiliation`, `departement`, `dateContact`, `messages`, `created`, `updated`) VALUES
(1, 'In sunt officia exe', 'dupigyh@mailinator.com', '+1 (677) 562-5974', 'Accusantium omnis pe', 'Velit beatae eos qu', '2000-09-15', 'Ducimus voluptatem', '2022-09-13 15:35:05', '2022-09-13 15:35:05'),
(2, 'At doloribus cillum ', 'vucocibed@mailinator.com', '+1 (911) 915-5146', 'Dolor sed alias magn', 'In excepteur consequ', '1988-08-29', 'Praesentium nulla ma', '2022-09-13 15:39:23', '2022-09-13 15:39:23');

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
(20, 'Id hic excepturi seq', 'Ea nobis proident n', '+1 (383) 743-1084', 'majorom@mailinator.com', 'Id illum ut illum ', 'Array', 'Qui sit eligendi vol', '2022-09-12 15:51:59', '2022-09-12 15:51:59'),
(21, 'Non dolore omnis ea ', 'Eos eos reprehender', '+1 (882) 133-7843', 'zynohifer@mailinator.com', 'Quas voluptas qui vo', 'Array', 'Velit est nisi quis ', '2022-09-13 12:47:40', '2022-09-13 12:47:40'),
(22, 'Tempora ut qui ex fu', 'Laborum quos iste at', '+1 (674) 638-5592', 'puzal@mailinator.com', 'Voluptatem nostrum d', 'Array', 'Laborum accusantium ', '2022-09-13 13:13:24', '2022-09-13 13:13:24'),
(23, 'Architecto id aut m', 'Et commodo qui imped', '+1 (143) 786-4418', 'xeteli@mailinator.com', 'Odit nihil consequat', 'Array', 'Fugiat sit commodo', '2022-09-13 13:13:31', '2022-09-13 13:13:31');

-- --------------------------------------------------------

--
-- Structure de la table `location_vehicule`
--

CREATE TABLE `location_vehicule` (
  `id` int(11) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `adresse` varchar(255) DEFAULT NULL,
  `dateDebut` varchar(255) DEFAULT NULL,
  `dateFin` varchar(255) DEFAULT NULL,
  `modele` varchar(255) DEFAULT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `updated` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `location_vehicule`
--

INSERT INTO `location_vehicule` (`id`, `prenom`, `nom`, `phone`, `adresse`, `dateDebut`, `dateFin`, `modele`, `created`, `updated`) VALUES
(1, 'Vitae praesentium ul', 'Perspiciatis nulla ', '+1 (364) 291-5235', 'Quo doloremque cillu', '2018-08-01', '1971-09-29', 'FORD-Fusion', '2022-09-13 12:28:19', '2022-09-13 12:28:19'),
(2, 'Quis architecto quas', 'Consequat Consequat', '+1 (428) 894-7837', 'Rerum ratione do ut ', '1984-05-23', '1996-10-21', 'MITSUBISHI - OUTLANDER', '2022-09-13 12:28:47', '2022-09-13 12:28:47'),
(3, 'Consectetur nisi inc', 'Cumque quam enim lau', '+1 (477) 504-8823', 'Facere quis excepteu', '2019-03-21', '1973-07-11', 'HYUNDAI - SANTA FE', '2022-09-13 12:29:03', '2022-09-13 12:29:03'),
(4, 'Dolore voluptas et o', 'Assumenda tempore m', '+1 (188) 747-8513', 'Sint debitis digniss', '1999-01-01', '2019-02-01', 'HYUNDAI - SANTA FE', '2022-09-13 12:32:36', '2022-09-13 12:32:36'),
(5, 'Quis quaerat beatae ', 'Ut ipsam aut in id ', '+1 (787) 718-8063', 'Et facere excepturi ', '2000-01-06', '1984-10-29', 'FORD-EXPLORER', '2022-09-13 12:36:30', '2022-09-13 12:36:30'),
(6, 'Illo sint architecto', 'Necessitatibus volup', '+1 (598) 287-7678', 'Aut voluptate minima', '1975-05-22', '2007-07-22', 'MITSUBISHI - OUTLANDER', '2022-09-13 12:38:41', '2022-09-13 12:38:41'),
(7, 'Id laborum voluptat', 'Ad debitis ut repell', '+1 (396) 912-3608', 'Accusantium eum opti', '1982-01-04', '2010-09-19', 'FORD-Fusion', '2022-09-13 12:41:11', '2022-09-13 12:41:11'),
(8, 'Quo est sint maiore', 'Dolore laudantium m', '+1 (613) 227-4096', 'Nostrud commodi culp', '1974-01-08', '1975-10-21', 'FORD-Fusion', '2022-09-13 12:42:28', '2022-09-13 12:42:28'),
(9, 'Magna omnis laborum ', 'Perspiciatis sunt ', '+1 (168) 735-7724', 'Eum sed fuga Et lab', '1994-07-15', '1970-06-21', 'FORD-EXPLORER', '2022-09-13 12:43:22', '2022-09-13 12:43:22'),
(10, 'Pariatur Sed laudan', 'Nihil veniam molest', '+1 (306) 526-1953', 'Eius aut sed eaque d', '1999-01-16', '1974-06-20', 'MITSUBISHI - L200', '2022-09-13 12:45:34', '2022-09-13 12:45:34'),
(11, 'Omnis vel fugit har', 'Odio temporibus faci', '+1 (833) 608-4141', 'Anim eaque ea ipsum ', '2006-04-25', '1976-04-10', 'FORD-Fusion', '2022-09-13 12:46:09', '2022-09-13 12:46:09'),
(12, 'Harum iusto dolor of', 'Tempora ut molestiae', '+1 (109) 931-9782', 'Assumenda quo atque ', '1977-06-16', '1989-01-24', 'JEEP - GRAND CHEROKEE', '2022-09-13 12:48:00', '2022-09-13 12:48:00'),
(13, 'Vel consequuntur nob', 'Sed sit est qui ita', '+1 (805) 931-2775', 'Aut qui illo volupta', '2005-09-09T06:15', '2007-07-05T22:36', 'FORD-EXPLORER', '2022-09-13 12:59:37', '2022-09-13 12:59:37'),
(14, 'Veniam elit eos e', 'Suscipit maiores qua', '+1 (982) 889-4944', 'Ullam sapiente unde ', '1989-07-10T13:50', '1992-08-13T14:48', 'MITSUBISHI - L200', '2022-09-13 13:04:57', '2022-09-13 13:04:57'),
(15, 'Consectetur veritati', 'Molestiae neque adip', '+1 (648) 198-8354', 'Occaecat vel quia au', '2005-01-16T07:14', '1985-01-03T15:54', 'HYUNDAI - SANTA FE', '2022-09-13 13:11:17', '2022-09-13 13:11:17'),
(16, 'Enim non rerum cupid', 'Nostrud et nemo id s', '+1 (715) 242-7501', 'Ullam odio sit aperi', '1981-12-14T07:18', '2011-08-21T12:21', 'HYUNDAI - SANTA FE', '2022-09-13 15:45:10', '2022-09-13 15:45:10');

-- --------------------------------------------------------

--
-- Structure de la table `members`
--

CREATE TABLE `members` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL DEFAULT '0',
  `last_name` varchar(255) NOT NULL DEFAULT '0',
  `email` varchar(255) NOT NULL DEFAULT '0',
  `phone` varchar(255) NOT NULL DEFAULT '0',
  `password` varchar(255) NOT NULL DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `members`
--

INSERT INTO `members` (`id`, `first_name`, `last_name`, `email`, `phone`, `password`, `created_at`, `updated_at`) VALUES
(7, 'test', 'test', 'test@gmail.com', '+1 (239) 529-6217', '$2y$04$UhibYKoAbXxPLxcW/ztz1./HU0BbkR3yff2tLlqNOGY/WN72muV2i', '2022-09-19 12:25:18', '2022-09-19 12:25:18');

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
(17, 17, '173df09f501e4a6009282fc1c8639f7d', '2022-09-13 10:37:12'),
(18, 16, 'da0e65d91afdc850457870736557bdfa', '2022-09-13 11:38:27');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `acaht_voiture`
--
ALTER TABLE `acaht_voiture`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `cotationfret`
--
ALTER TABLE `cotationfret`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `location_vehicule`
--
ALTER TABLE `location_vehicule`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `password_reset`
--
ALTER TABLE `password_reset`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `acaht_voiture`
--
ALTER TABLE `acaht_voiture`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `cotationfret`
--
ALTER TABLE `cotationfret`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT pour la table `location_vehicule`
--
ALTER TABLE `location_vehicule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT pour la table `members`
--
ALTER TABLE `members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `password_reset`
--
ALTER TABLE `password_reset`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

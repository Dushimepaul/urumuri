-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 29 jan. 2026 à 19:08
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `urumuri`
--

-- --------------------------------------------------------

--
-- Structure de la table `about_us`
--

CREATE TABLE `about_us` (
  `id_about_us` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `details` text DEFAULT NULL,
  `date_insertion` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `about_us`
--

INSERT INTO `about_us` (`id_about_us`, `title`, `details`, `date_insertion`) VALUES
(8, 'À propos de URUMURI_ICSD : Éclairer l\'avenir du Burundi', '<p>L&rsquo;association sans but lucratif <strong>URUMURI Initiative for Change and Sustainable Development (URUMURI_ICSD)</strong> est une organisation d&eacute;di&eacute;e au progr&egrave;s social, &eacute;tablie au c&oelig;ur de Bujumbura, &agrave; Rohero I. Notre nom, &quot;URUMURI&quot; (Lumi&egrave;re), incarne notre ambition : &ecirc;tre un phare qui inspire et guide la jeunesse burundaise vers un avenir caract&eacute;ris&eacute; par l&#39;unit&eacute;, la prosp&eacute;rit&eacute; et l&#39;int&eacute;grit&eacute;.</p>\r\n\r\n<h3><strong>Notre Mission et notre Engagement</strong></h3>\r\n\r\n<p>Notre action s&#39;articule autour d&#39;une mission fondamentale : contribuer activement &agrave; l&#39;&eacute;ducation, au soutien de la jeunesse et au d&eacute;veloppement global pour b&acirc;tir un Burundi uni et responsable. Nous sommes port&eacute;s par une conviction forte, inscrite dans notre devise : <strong>&laquo; Une jeunesse &eacute;clair&eacute;e pour un Burundi qui avance &raquo;</strong>.</p>\r\n\r\n<h3><strong>Nos Axes de D&eacute;veloppement</strong></h3>\r\n\r\n<p>Pour transformer cette vision en r&eacute;alit&eacute;, nous concentrons nos efforts sur cinq objectifs strat&eacute;giques :</p>\r\n\r\n<ul>\r\n  <li>\r\n  <p><strong>Entrepreneuriat :</strong> Stimuler l&#39;innovation et l&#39;entrepreneuriat durable.</p>\r\n </li>\r\n <li>\r\n  <p><strong>&Eacute;ducation :</strong> Renforcer le parcours acad&eacute;mique et promouvoir la citoyennet&eacute; responsable.</p>\r\n </li>\r\n <li>\r\n  <p><strong>Environnement :</strong> Prot&eacute;ger nos ressources naturelles pour un d&eacute;veloppement durable.</p>\r\n </li>\r\n <li>\r\n  <p><strong>Talents :</strong> Valoriser les comp&eacute;tences uniques de chaque jeune.</p>\r\n </li>\r\n <li>\r\n  <p><strong>Gouvernance :</strong> Professionnaliser les capacit&eacute;s organisationnelles de la jeunesse.</p>\r\n </li>\r\n</ul>\r\n\r\n<p>URUMURI_ICSD n&#39;est pas seulement une structure, c&#39;est un engagement envers le changement. En pla&ccedil;ant l&#39;&eacute;ducation et l&#39;innovation au centre de nos priorit&eacute;s, nous &oelig;uvrons chaque jour pour que chaque jeune burundais devienne un acteur cl&eacute; du d&eacute;veloppement de notre nation.</p>\r\n', '2026-01-14 15:11:02');

-- --------------------------------------------------------

--
-- Structure de la table `carousels`
--

CREATE TABLE `carousels` (
  `IdCarousel` int(11) NOT NULL,
  `Image` varchar(250) NOT NULL,
  `Description` text NOT NULL,
  `Detail` text NOT NULL,
  `IsActive` tinyint(1) NOT NULL,
  `Title` varchar(200) NOT NULL,
  `IdProductType` int(11) DEFAULT NULL,
  `date_insertion` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `carousels`
--

INSERT INTO `carousels` (`IdCarousel`, `Image`, `Description`, `Detail`, `IsActive`, `Title`, `IdProductType`, `date_insertion`) VALUES
(13, '20260129083011697b0c83d80ec.jpeg', '<p><font dir=\"auto\" style=\"vertical-align:inherit\"><font dir=\"auto\" style=\"vertical-align:inherit\">Plus qu&#39;une association, une v&eacute;ritable famille engag&eacute;e pour le bien-&ecirc;tre de tous. </font></font></p>\r\n\r\n<p><font dir=\"auto\" style=\"vertical-align:inherit\"><font dir=\"auto\" style=\"vertical-align:inherit\">C&#39;est gr&acirc;ce &agrave; cette synergie que nous faisons briller l&#39;espoir au Burundi.</font></font></p>\r\n', 'Analysez les données pour prendre de meilleures décisions', 1, 'Ensemble, nous sommes Urumuri', NULL, '2025-12-18 10:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `categories_membre`
--

CREATE TABLE `categories_membre` (
  `id` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `description` text DEFAULT NULL,
  `droit_vote` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `categories_membre`
--

INSERT INTO `categories_membre` (`id`, `nom`, `description`, `droit_vote`) VALUES
(1, 'Membres fondateurs', 'Signataires des statuts', 1),
(2, 'Membres adhérents', 'Membres actifs', 1),
(3, 'Membres d’honneur', 'Reconnaissance spéciale', 0),
(4, 'Membres sympathisants', 'Soutiens de l’association', 0);

-- --------------------------------------------------------

--
-- Structure de la table `contact_us`
--

CREATE TABLE `contact_us` (
  `IdContact` int(11) NOT NULL,
  `FullName` varchar(250) NOT NULL,
  `Email` varchar(250) NOT NULL,
  `Subject` varchar(250) NOT NULL,
  `Message` text NOT NULL,
  `PhoneNumber` varchar(12) NOT NULL,
  `Date_creation` datetime NOT NULL DEFAULT current_timestamp(),
  `Location` varchar(200) NOT NULL,
  `is_readed` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `devise`
--

CREATE TABLE `devise` (
  `id_devise` int(11) NOT NULL,
  `devise` varchar(200) NOT NULL,
  `date_creation` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `devise`
--

INSERT INTO `devise` (`id_devise`, `devise`, `date_creation`) VALUES
(2, '“Une jeunesse éclairée pour un Burundi qui avance.”', '2026-01-13');

-- --------------------------------------------------------

--
-- Structure de la table `dons`
--

CREATE TABLE `dons` (
  `id` int(11) NOT NULL,
  `type_don` enum('financier','materiel','competence') NOT NULL,
  `nom_complet` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `telephone` varchar(30) NOT NULL,
  `pays` varchar(200) NOT NULL,
  `statut` enum('en_attente','valide','annule') DEFAULT 'en_attente',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `dons_competences`
--

CREATE TABLE `dons_competences` (
  `id` int(11) NOT NULL,
  `don_id` int(11) NOT NULL,
  `description_contribution` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `dons_financiers`
--

CREATE TABLE `dons_financiers` (
  `id` int(11) NOT NULL,
  `don_id` int(11) NOT NULL,
  `montant` decimal(15,2) NOT NULL,
  `id_methode_paiement` int(11) DEFAULT NULL,
  `is_mensuel` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `dons_materiels`
--

CREATE TABLE `dons_materiels` (
  `id` int(11) NOT NULL,
  `don_id` int(11) NOT NULL,
  `description_materiel` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `faq`
--

CREATE TABLE `faq` (
  `IdFaq` int(11) NOT NULL,
  `Question` varchar(255) NOT NULL,
  `Response` text NOT NULL,
  `Status` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `gallery`
--

CREATE TABLE `gallery` (
  `IdGallery` int(11) NOT NULL,
  `TypeMedia` enum('image','video','link') NOT NULL,
  `Media` varchar(255) NOT NULL,
  `Description` text DEFAULT NULL,
  `Created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `membres`
--

CREATE TABLE `membres` (
  `id` int(11) NOT NULL,
  `nom_complet` varchar(150) NOT NULL,
  `email` varchar(150) DEFAULT NULL,
  `telephone` varchar(30) DEFAULT NULL,
  `adresse` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `profil` varchar(140) DEFAULT NULL,
  `facebook` varchar(200) DEFAULT NULL,
  `linkedln` varchar(200) DEFAULT NULL,
  `youtube` varchar(200) DEFAULT NULL,
  `instagram` varchar(200) DEFAULT NULL,
  `categories_membre_id` int(11) DEFAULT NULL,
  `date_inscription` date DEFAULT curdate(),
  `statut` enum('actif','inactif') DEFAULT 'actif',
  `ordre_affichage` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `membres`
--

INSERT INTO `membres` (`id`, `nom_complet`, `email`, `telephone`, `adresse`, `image`, `profil`, `facebook`, `linkedln`, `youtube`, `instagram`, `categories_membre_id`, `date_inscription`, `statut`, `ordre_affichage`) VALUES
(1, 'MANIRAMPAYE Alain Jupin', '', '', '', '', 'Représentant  Légal ', '', '', '', '', 1, '2026-01-12', 'actif', 1),
(2, 'NITRANDERKURA Eric', '', '', '', '', 'Représentant  Légal Suppléant ', '', '', '', '', 1, '2026-01-12', 'actif', 2),
(3, 'ISHIWE Inès Hungues Marguerite', '', '', '', '', 'Trésorière   ', '', '', '', '', 1, '2026-01-12', 'actif', 3),
(4, 'BUKURU Révérien', '', '', '', '', 'Conseiller    ', '', '', '', '', 1, '2026-01-12', 'actif', 5),
(5, 'AKIMANA Christian Noël', '', '', '', '202601250742036975bb3b8f7a2.png', '', '', '', '', '', 1, '2026-01-12', 'actif', 8),
(6, 'MUNEZERO Isaac', '', '', '', '', '', '', '', '', '', 1, '2026-01-12', 'actif', 10),
(7, 'MURERANYAMBO Belyse', '', '', '', '20260129122744697b4430cd658.jpg', 'IT manager', '', '', '', '', 1, '2026-01-12', 'actif', 6),
(8, 'NDAYISHIMIYE Thierry', '', '', '', '', '', '', '', '', '', 1, '2026-01-12', 'actif', 12),
(9, 'NDAYISHIMIYE Arnauld', '', '', '', '', '', '', '', '', '', 1, '2026-01-12', 'actif', 11),
(10, 'SABUSHIMIKE Jean Claude', '', '', '', '', '', '', '', '', '', 1, '2026-01-12', 'actif', 15),
(11, 'NDUWUMANA Joseph', '', '', '', '', '', '', '', '', '', 1, '2026-01-12', 'actif', 13),
(12, 'NTIRAMPEBA Jean de Dieu', '', '', '', '', '', '', '', '', '', 1, '2026-01-12', 'actif', 14),
(13, 'DUSABE Emery', '', '', '', '', '', '', '', '', '', 1, '2026-01-12', 'actif', 9),
(14, 'BARENGAYABO Désiré', '', '', '', '202601250743026975bb7661d73.jpg', 'Secrétaire  ', '', '', '', '', 1, '2026-01-12', 'actif', 4),
(15, 'KUMUGISHA Delie Drice', '', '', '', '', 'Project manager  ', '', '', '', '', 1, '2026-01-12', 'actif', 7);

-- --------------------------------------------------------

--
-- Structure de la table `mission`
--

CREATE TABLE `mission` (
  `id_mission` int(11) NOT NULL,
  `content` text NOT NULL,
  `date_creation` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `mission`
--

INSERT INTO `mission` (`id_mission`, `content`, `date_creation`) VALUES
(5, 'Contribuer à l\'éducation, à la jeunesse et au développement pour un Burundi uni et \r\nresponsable.', '2025-12-18 10:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `mode_payement`
--

CREATE TABLE `mode_payement` (
  `id_mode_payement` int(11) NOT NULL,
  `description` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `mode_payement`
--

INSERT INTO `mode_payement` (`id_mode_payement`, `description`) VALUES
(1, 'Bancobu Inoti'),
(3, 'Lumicash'),
(4, 'EcoCash'),
(5, 'Carte Bancaire');

-- --------------------------------------------------------

--
-- Structure de la table `newsletter`
--

CREATE TABLE `newsletter` (
  `id_newsletter` int(10) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `date_inscription` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `newsletter`
--

INSERT INTO `newsletter` (`id_newsletter`, `email`, `date_inscription`) VALUES
(9, 'dushimepaul51@gmail.com', '2026-01-18 19:31:58'),
(11, 'jeandedieuntirampeba@gmail.com', '2026-01-29 09:00:10'),
(12, 'mureranyambo@gmail.com', '2026-01-29 09:01:19'),
(13, 'niciakina1@gmail.com', '2026-01-29 15:52:49');

-- --------------------------------------------------------

--
-- Structure de la table `objectifs`
--

CREATE TABLE `objectifs` (
  `id_objectif` int(11) NOT NULL,
  `Objectif` varchar(200) NOT NULL,
  `Details` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `objectifs`
--

INSERT INTO `objectifs` (`id_objectif`, `Objectif`, `Details`) VALUES
(1, 'Innovation & Entrepreneuriat', 'Contribuer à l’innovation et l’entrepreneuriat durable.'),
(2, 'Éducation & Citoyenneté', 'Contribuer à l’éducation en général (Écoles, universités, etc.) et à la citoyenneté responsable.'),
(3, 'Protection de l’Environnement', 'Contribuer à la protection de l’environnement et le développement durable.'),
(4, 'Promotion des Talents', 'Contribuer à la promotion des talents et les compétences.'),
(5, 'Gouvernance & Capacités', 'Renforcer la gouvernance interne et les capacités organisationnelles des jeunes.');

-- --------------------------------------------------------

--
-- Structure de la table `partener`
--

CREATE TABLE `partener` (
  `id_partner` int(11) NOT NULL,
  `description` text NOT NULL,
  `logo` text DEFAULT NULL,
  `link` varchar(200) NOT NULL,
  `status` tinyint(2) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Structure de la table `pays`
--

CREATE TABLE `pays` (
  `id_country` varchar(255) NOT NULL DEFAULT '',
  `pays` varchar(255) DEFAULT NULL,
  `Formal_Name` varchar(255) DEFAULT NULL,
  `Type` varchar(255) DEFAULT NULL,
  `Sub_Type` varchar(255) DEFAULT NULL,
  `Sovereignty` varchar(255) DEFAULT NULL,
  `Capital` varchar(255) DEFAULT NULL,
  `ISO_4217_Currency_Code` varchar(255) DEFAULT NULL,
  `ISO_4217_Currency_Name` varchar(255) DEFAULT NULL,
  `ITU_T_Telephone_Code` varchar(255) DEFAULT NULL,
  `ISO_3166_1_2_Letter_Code` varchar(255) DEFAULT NULL,
  `ISO_3166_1_3_Letter_Code` varchar(255) DEFAULT NULL,
  `ISO_3166_1_Number` varchar(255) DEFAULT NULL,
  `IANA_Country_Code_TLD` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `pays`
--

INSERT INTO `pays` (`id_country`, `pays`, `Formal_Name`, `Type`, `Sub_Type`, `Sovereignty`, `Capital`, `ISO_4217_Currency_Code`, `ISO_4217_Currency_Name`, `ITU_T_Telephone_Code`, `ISO_3166_1_2_Letter_Code`, `ISO_3166_1_3_Letter_Code`, `ISO_3166_1_Number`, `IANA_Country_Code_TLD`) VALUES
('1', 'Afghanistan', 'Islamic State of Afghanistan', 'Independent State', '', '', 'Kabul', 'AFN', 'Afghani', '+93', 'AF', 'AFG', '004', '.af'),
('10', 'Austria', 'Republic of Austria', 'Independent State', '', '', 'Vienna', 'EUR', 'Euro', '+43', 'AT', 'AUT', '040', '.at'),
('100', 'Lithuania', 'Republic of Lithuania', 'Independent State', '', '', 'Vilnius', 'LTL', 'Litas', '+370', 'LT', 'LTU', '440', '.lt'),
('101', 'Luxembourg', 'Grand Duchy of Luxembourg', 'Independent State', '', '', 'Luxembourg', 'EUR', 'Euro', '+352', 'LU', 'LUX', '442', '.lu'),
('102', 'Macedonia', 'Republic of Macedonia', 'Independent State', '', '', 'Skopje', 'MKD', 'Denar', '+389', 'MK', 'MKD', '807', '.mk'),
('103', 'Madagascar', 'Republic of Madagascar', 'Independent State', '', '', 'Antananarivo', 'MGA', 'Ariary', '+261', 'MG', 'MDG', '450', '.mg'),
('104', 'Malawi', 'Republic of Malawi', 'Independent State', '', '', 'Lilongwe', 'MWK', 'Kwacha', '+265', 'MW', 'MWI', '454', '.mw'),
('105', 'Malaysia', '', 'Independent State', '', '', 'Kuala Lumpur (legislative/judical) and Putrajaya (administrative)', 'MYR', 'Ringgit', '+60', 'MY', 'MYS', '458', '.my'),
('106', 'Maldives', 'Republic of Maldives', 'Independent State', '', '', 'Male', 'MVR', 'Rufiyaa', '+960', 'MV', 'MDV', '462', '.mv'),
('107', 'Mali', 'Republic of Mali', 'Independent State', '', '', 'Bamako', 'XOF', 'Franc', '+223', 'ML', 'MLI', '466', '.ml'),
('108', 'Malta', 'Republic of Malta', 'Independent State', '', '', 'Valletta', 'MTL', 'Lira', '+356', 'MT', 'MLT', '470', '.mt'),
('109', 'Marshall Islands', 'Republic of the Marshall Islands', 'Independent State', '', '', 'Majuro', 'USD', 'Dollar', '+692', 'MH', 'MHL', '584', '.mh'),
('11', 'Azerbaijan', 'Republic of Azerbaijan', 'Independent State', '', '', 'Baku', 'AZN', 'Manat', '+994', 'AZ', 'AZE', '031', '.az'),
('110', 'Mauritania', 'Islamic Republic of Mauritania', 'Independent State', '', '', 'Nouakchott', 'MRO', 'Ouguiya', '+222', 'MR', 'MRT', '478', '.mr'),
('111', 'Mauritius', 'Republic of Mauritius', 'Independent State', '', '', 'Port Louis', 'MUR', 'Rupee', '+230', 'MU', 'MUS', '480', '.mu'),
('112', 'Mexico', 'United Mexican States', 'Independent State', '', '', 'Mexico', 'MXN', 'Peso', '+52', 'MX', 'MEX', '484', '.mx'),
('113', 'Micronesia', 'Federated States of Micronesia', 'Independent State', '', '', 'Palikir', 'USD', 'Dollar', '+691', 'FM', 'FSM', '583', '.fm'),
('114', 'Moldova', 'Republic of Moldova', 'Independent State', '', '', 'Chisinau', 'MDL', 'Leu', '+373', 'MD', 'MDA', '498', '.md'),
('115', 'Monaco', 'Principality of Monaco', 'Independent State', '', '', 'Monaco', 'EUR', 'Euro', '+377', 'MC', 'MCO', '492', '.mc'),
('116', 'Mongolia', '', 'Independent State', '', '', 'Ulaanbaatar', 'MNT', 'Tugrik', '+976', 'MN', 'MNG', '496', '.mn'),
('117', 'Montenegro', 'Republic of Montenegro', 'Independent State', '', '', 'Podgorica', 'EUR', 'Euro', '+382', 'ME', 'MNE', '499', '.me and .yu'),
('118', 'Morocco', 'Kingdom of Morocco', 'Independent State', '', '', 'Rabat', 'MAD', 'Dirham', '+212', 'MA', 'MAR', '504', '.ma'),
('119', 'Mozambique', 'Republic of Mozambique', 'Independent State', '', '', 'Maputo', 'MZM', 'Meticail', '+258', 'MZ', 'MOZ', '508', '.mz'),
('12', 'Bahamas, The', 'Commonwealth of The Bahamas', 'Independent State', '', '', 'Nassau', 'BSD', 'Dollar', '+1-242', 'BS', 'BHS', '044', '.bs'),
('120', 'Myanmar (Burma)', 'Union of Myanmar', 'Independent State', '', '', 'Naypyidaw', 'MMK', 'Kyat', '+95', 'MM', 'MMR', '104', '.mm'),
('121', 'Namibia', 'Republic of Namibia', 'Independent State', '', '', 'Windhoek', 'NAD', 'Dollar', '+264', 'NA', 'NAM', '516', '.na'),
('122', 'Nauru', 'Republic of Nauru', 'Independent State', '', '', 'Yaren', 'AUD', 'Dollar', '+674', 'NR', 'NRU', '520', '.nr'),
('123', 'Nepal', '', 'Independent State', '', '', 'Kathmandu', 'NPR', 'Rupee', '+977', 'NP', 'NPL', '524', '.np'),
('124', 'Netherlands', 'Kingdom of the Netherlands', 'Independent State', '', '', 'Amsterdam (administrative) and The Hague (legislative/judical)', 'EUR', 'Euro', '+31', 'NL', 'NLD', '528', '.nl'),
('125', 'New Zealand', '', 'Independent State', '', '', 'Wellington', 'NZD', 'Dollar', '+64', 'NZ', 'NZL', '554', '.nz'),
('126', 'Nicaragua', 'Republic of Nicaragua', 'Independent State', '', '', 'Managua', 'NIO', 'Cordoba', '+505', 'NI', 'NIC', '558', '.ni'),
('127', 'Niger', 'Republic of Niger', 'Independent State', '', '', 'Niamey', 'XOF', 'Franc', '+227', 'NE', 'NER', '562', '.ne'),
('128', 'Nigeria', 'Federal Republic of Nigeria', 'Independent State', '', '', 'Abuja', 'NGN', 'Naira', '+234', 'NG', 'NGA', '566', '.ng'),
('129', 'Norway', 'Kingdom of Norway', 'Independent State', '', '', 'Oslo', 'NOK', 'Krone', '+47', 'NO', 'NOR', '578', '.no'),
('13', 'Bahrain', 'Kingdom of Bahrain', 'Independent State', '', '', 'Manama', 'BHD', 'Dinar', '+973', 'BH', 'BHR', '048', '.bh'),
('130', 'Oman', 'Sultanate of Oman', 'Independent State', '', '', 'Muscat', 'OMR', 'Rial', '+968', 'OM', 'OMN', '512', '.om'),
('131', 'Pakistan', 'Islamic Republic of Pakistan', 'Independent State', '', '', 'Islamabad', 'PKR', 'Rupee', '+92', 'PK', 'PAK', '586', '.pk'),
('132', 'Palau', 'Republic of Palau', 'Independent State', '', '', 'Melekeok', 'USD', 'Dollar', '+680', 'PW', 'PLW', '585', '.pw'),
('133', 'Panama', 'Republic of Panama', 'Independent State', '', '', 'Panama', 'PAB', 'Balboa', '+507', 'PA', 'PAN', '591', '.pa'),
('134', 'Papua New Guinea', 'Independent State of Papua New Guinea', 'Independent State', '', '', 'Port Moresby', 'PGK', 'Kina', '+675', 'PG', 'PNG', '598', '.pg'),
('135', 'Paraguay', 'Republic of Paraguay', 'Independent State', '', '', 'Asuncion', 'PYG', 'Guarani', '+595', 'PY', 'PRY', '600', '.py'),
('136', 'Peru', 'Republic of Peru', 'Independent State', '', '', 'Lima', 'PEN', 'Sol', '+51', 'PE', 'PER', '604', '.pe'),
('137', 'Philippines', 'Republic of the Philippines', 'Independent State', '', '', 'Manila', 'PHP', 'Peso', '+63', 'PH', 'PHL', '608', '.ph'),
('138', 'Poland', 'Republic of Poland', 'Independent State', '', '', 'Warsaw', 'PLN', 'Zloty', '+48', 'PL', 'POL', '616', '.pl'),
('139', 'Portugal', 'Portuguese Republic', 'Independent State', '', '', 'Lisbon', 'EUR', 'Euro', '+351', 'PT', 'PRT', '620', '.pt'),
('14', 'Bangladesh', 'People s Republic of Bangladesh', 'Independent State', '', '', 'Dhaka', 'BDT', 'Taka', '+880', 'BD', 'BGD', '050', '.bd'),
('140', 'Qatar', 'State of Qatar', 'Independent State', '', '', 'Doha', 'QAR', 'Rial', '+974', 'QA', 'QAT', '634', '.qa'),
('141', 'Romania', '', 'Independent State', '', '', 'Bucharest', 'RON', 'Leu', '+40', 'RO', 'ROU', '642', '.ro'),
('142', 'Russia', 'Russian Federation', 'Independent State', '', '', 'Moscow', 'RUB', 'Ruble', '+7', 'RU', 'RUS', '643', '.ru and .su'),
('143', 'Rwanda', 'Republic of Rwanda', 'Independent State', '', '', 'Kigali', 'RWF', 'Franc', '+250', 'RW', 'RWA', '646', '.rw'),
('144', 'Saint Kitts and Nevis', 'Federation of Saint Kitts and Nevis', 'Independent State', '', '', 'Basseterre', 'XCD', 'Dollar', '+1-869', 'KN', 'KNA', '659', '.kn'),
('145', 'Saint Lucia', '', 'Independent State', '', '', 'Castries', 'XCD', 'Dollar', '+1-758', 'LC', 'LCA', '662', '.lc'),
('146', 'Saint Vincent and the Grenadines', '', 'Independent State', '', '', 'Kingstown', 'XCD', 'Dollar', '+1-784', 'VC', 'VCT', '670', '.vc'),
('147', 'Samoa', 'Independent State of Samoa', 'Independent State', '', '', 'Apia', 'WST', 'Tala', '+685', 'WS', 'WSM', '882', '.ws'),
('148', 'San Marino', 'Republic of San Marino', 'Independent State', '', '', 'San Marino', 'EUR', 'Euro', '+378', 'SM', 'SMR', '674', '.sm'),
('149', 'Sao Tome and Principe', 'Democratic Republic of Sao Tome and Principe', 'Independent State', '', '', 'Sao Tome', 'STD', 'Dobra', '+239', 'ST', 'STP', '678', '.st'),
('15', 'Barbados', '', 'Independent State', '', '', 'Bridgetown', 'BBD', 'Dollar', '+1-246', 'BB', 'BRB', '052', '.bb'),
('150', 'Saudi Arabia', 'Kingdom of Saudi Arabia', 'Independent State', '', '', 'Riyadh', 'SAR', 'Rial', '+966', 'SA', 'SAU', '682', '.sa'),
('151', 'Senegal', 'Republic of Senegal', 'Independent State', '', '', 'Dakar', 'XOF', 'Franc', '+221', 'SN', 'SEN', '686', '.sn'),
('152', 'Serbia', 'Republic of Serbia', 'Independent State', '', '', 'Belgrade', 'RSD', 'Dinar', '+381', 'RS', 'SRB', '688', '.rs and .yu'),
('153', 'Seychelles', 'Republic of Seychelles', 'Independent State', '', '', 'Victoria', 'SCR', 'Rupee', '+248', 'SC', 'SYC', '690', '.sc'),
('154', 'Sierra Leone', 'Republic of Sierra Leone', 'Independent State', '', '', 'Freetown', 'SLL', 'Leone', '+232', 'SL', 'SLE', '694', '.sl'),
('155', 'Singapore', 'Republic of Singapore', 'Independent State', '', '', 'Singapore', 'SGD', 'Dollar', '+65', 'SG', 'SGP', '702', '.sg'),
('156', 'Slovakia', 'Slovak Republic', 'Independent State', '', '', 'Bratislava', 'SKK', 'Koruna', '+421', 'SK', 'SVK', '703', '.sk'),
('157', 'Slovenia', 'Republic of Slovenia', 'Independent State', '', '', 'Ljubljana', 'EUR', 'Euro', '+386', 'SI', 'SVN', '705', '.si'),
('158', 'Solomon Islands', '', 'Independent State', '', '', 'Honiara', 'SBD', 'Dollar', '+677', 'SB', 'SLB', '090', '.sb'),
('159', 'Somalia', '', 'Independent State', '', '', 'Mogadishu', 'SOS', 'Shilling', '+252', 'SO', 'SOM', '706', '.so'),
('16', 'Belarus', 'Republic of Belarus', 'Independent State', '', '', 'Minsk', 'BYR', 'Ruble', '+375', 'BY', 'BLR', '112', '.by'),
('160', 'South Africa', 'Republic of South Africa', 'Independent State', '', '', 'Pretoria (administrative); Cape Town (legislative); and Bloemfontein (judical)', 'ZAR', 'Rand', '+27', 'ZA', 'ZAF', '710', '.za'),
('161', 'Spain', 'Kingdom of Spain', 'Independent State', '', '', 'Madrid', 'EUR', 'Euro', '+34', 'ES', 'ESP', '724', '.es'),
('162', 'Sri Lanka', 'Democratic Socialist Republic of Sri Lanka', 'Independent State', '', '', 'Colombo (administrative/judical) and Sri Jayewardenepura Kotte (legislative)', 'LKR', 'Rupee', '+94', 'LK', 'LKA', '144', '.lk'),
('163', 'Sudan', 'Republic of the Sudan', 'Independent State', '', '', 'Khartoum', 'SDG', 'Pound', '+249', 'SD', 'SDN', '736', '.sd'),
('164', 'Suriname', 'Republic of Suriname', 'Independent State', '', '', 'Paramaribo', 'SRD', 'Dollar', '+597', 'SR', 'SUR', '740', '.sr'),
('165', 'Swaziland', 'Kingdom of Swaziland', 'Independent State', '', '', 'Mbabane (administrative) and Lobamba (legislative)', 'SZL', 'Lilangeni', '+268', 'SZ', 'SWZ', '748', '.sz'),
('166', 'Sweden', 'Kingdom of Sweden', 'Independent State', '', '', 'Stockholm', 'SEK', 'Kronoa', '+46', 'SE', 'SWE', '752', '.se'),
('167', 'Switzerland', 'Swiss Confederation', 'Independent State', '', '', 'Bern', 'CHF', 'Franc', '+41', 'CH', 'CHE', '756', '.ch'),
('168', 'Syria', 'Syrian Arab Republic', 'Independent State', '', '', 'Damascus', 'SYP', 'Pound', '+963', 'SY', 'SYR', '760', '.sy'),
('169', 'Tajikistan', 'Republic of Tajikistan', 'Independent State', '', '', 'Dushanbe', 'TJS', 'Somoni', '+992', 'TJ', 'TJK', '762', '.tj'),
('17', 'Belgium', 'Kingdom of Belgium', 'Independent State', '', '', 'Brussels', 'EUR', 'Euro', '+32', 'BE', 'BEL', '056', '.be'),
('170', 'Tanzania', 'United Republic of Tanzania', 'Independent State', '', '', 'Dar es Salaam (administrative/judical) and Dodoma (legislative)', 'TZS', 'Shilling', '+255', 'TZ', 'TZA', '834', '.tz'),
('171', 'Thailand', 'Kingdom of Thailand', 'Independent State', '', '', 'Bangkok', 'THB', 'Baht', '+66', 'TH', 'THA', '764', '.th'),
('172', 'Timor-Leste (East Timor)', 'Democratic Republic of Timor-Leste', 'Independent State', '', '', 'Dili', 'USD', 'Dollar', '+670', 'TL', 'TLS', '626', '.tp and .tl'),
('173', 'Togo', 'Togolese Republic', 'Independent State', '', '', 'Lome', 'XOF', 'Franc', '+228', 'TG', 'TGO', '768', '.tg'),
('174', 'Tonga', 'Kingdom of Tonga', 'Independent State', '', '', 'Nuku alofa', 'TOP', 'Pa anga', '+676', 'TO', 'TON', '776', '.to'),
('175', 'Trinidad and Tobago', 'Republic of Trinidad and Tobago', 'Independent State', '', '', 'Port-of-Spain', 'TTD', 'Dollar', '+1-868', 'TT', 'TTO', '780', '.tt'),
('176', 'Tunisia', 'Tunisian Republic', 'Independent State', '', '', 'Tunis', 'TND', 'Dinar', '+216', 'TN', 'TUN', '788', '.tn'),
('177', 'Turkey', 'Republic of Turkey', 'Independent State', '', '', 'Ankara', 'TRY', 'Lira', '+90', 'TR', 'TUR', '792', '.tr'),
('178', 'Turkmenistan', '', 'Independent State', '', '', 'Ashgabat', 'TMM', 'Manat', '+993', 'TM', 'TKM', '795', '.tm'),
('179', 'Tuvalu', '', 'Independent State', '', '', 'Funafuti', 'AUD', 'Dollar', '+688', 'TV', 'TUV', '798', '.tv'),
('18', 'Belize', '', 'Independent State', '', '', 'Belmopan', 'BZD', 'Dollar', '+501', 'BZ', 'BLZ', '084', '.bz'),
('180', 'Uganda', 'Republic of Uganda', 'Independent State', '', '', 'Kampala', 'UGX', 'Shilling', '+256', 'UG', 'UGA', '800', '.ug'),
('181', 'Ukraine', '', 'Independent State', '', '', 'Kiev', 'UAH', 'Hryvnia', '+380', 'UA', 'UKR', '804', '.ua'),
('182', 'United Arab Emirates', 'United Arab Emirates', 'Independent State', '', '', 'Abu Dhabi', 'AED', 'Dirham', '+971', 'AE', 'ARE', '784', '.ae'),
('183', 'United Kingdom', 'United Kingdom of Great Britain and Northern Ireland', 'Independent State', '', '', 'London', 'GBP', 'Pound', '+44', 'GB', 'GBR', '826', '.uk'),
('184', 'United States', 'United States of America', 'Independent State', '', '', 'Washington', 'USD', 'Dollar', '+1', 'US', 'USA', '840', '.us'),
('185', 'Uruguay', 'Oriental Republic of Uruguay', 'Independent State', '', '', 'Montevideo', 'UYU', 'Peso', '+598', 'UY', 'URY', '858', '.uy'),
('186', 'Uzbekistan', 'Republic of Uzbekistan', 'Independent State', '', '', 'Tashkent', 'UZS', 'Som', '+998', 'UZ', 'UZB', '860', '.uz'),
('187', 'Vanuatu', 'Republic of Vanuatu', 'Independent State', '', '', 'Port-Vila', 'VUV', 'Vatu', '+678', 'VU', 'VUT', '548', '.vu'),
('188', 'Vatican City', 'State of the Vatican City', 'Independent State', '', '', 'Vatican City', 'EUR', 'Euro', '+379', 'VA', 'VAT', '336', '.va'),
('189', 'Venezuela', 'Bolivarian Republic of Venezuela', 'Independent State', '', '', 'Caracas', 'VEB', 'Bolivar', '+58', 'VE', 'VEN', '862', '.ve'),
('19', 'Benin', 'Republic of Benin', 'Independent State', '', '', 'Porto-Novo', 'XOF', 'Franc', '+229', 'BJ', 'BEN', '204', '.bj'),
('190', 'Vietnam', 'Socialist Republic of Vietnam', 'Independent State', '', '', 'Hanoi', 'VND', 'Dong', '+84', 'VN', 'VNM', '704', '.vn'),
('191', 'Yemen', 'Republic of Yemen', 'Independent State', '', '', 'Sanaa', 'YER', 'Rial', '+967', 'YE', 'YEM', '887', '.ye'),
('192', 'Zambia', 'Republic of Zambia', 'Independent State', '', '', 'Lusaka', 'ZMK', 'Kwacha', '+260', 'ZM', 'ZMB', '894', '.zm'),
('193', 'Zimbabwe', 'Republic of Zimbabwe', 'Independent State', '', '', 'Harare', 'ZWD', 'Dollar', '+263', 'ZW', 'ZWE', '716', '.zw'),
('194', 'Abkhazia', 'Republic of Abkhazia', 'Proto Independent State', '', '', 'Sokhumi', 'RUB', 'Ruble', '+995', 'GE', 'GEO', '268', '.ge'),
('195', 'China, Republic of (Taiwan)', 'Republic of China', 'Proto Independent State', '', '', 'Taipei', 'TWD', 'Dollar', '+886', 'TW', 'TWN', '158', '.tw'),
('196', 'Nagorno-Karabakh', 'Nagorno-Karabakh Republic', 'Proto Independent State', '', '', 'Stepanakert', 'AMD', 'Dram', '+374-97', 'AZ', 'AZE', '031', '.az'),
('197', 'Northern Cyprus', 'Turkish Republic of Northern Cyprus', 'Proto Independent State', '', '', 'Nicosia', 'TRY', 'Lira', '+90-392', 'CY', 'CYP', '196', '.nc.tr'),
('198', 'Pridnestrovie (Transnistria)', 'Pridnestrovian Moldavian Republic', 'Proto Independent State', '', '', 'Tiraspol', '', 'Ruple', '+373-533', 'MD', 'MDA', '498', '.md'),
('199', 'Somaliland', 'Republic of Somaliland', 'Proto Independent State', '', '', 'Hargeisa', '', 'Shilling', '+252', 'SO', 'SOM', '706', '.so'),
('2', 'Albania', 'Republic of Albania', 'Independent State', '', '', 'Tirana', 'ALL', 'Lek', '+355', 'AL', 'ALB', '008', '.al'),
('20', 'Bhutan', 'Kingdom of Bhutan', 'Independent State', '', '', 'Thimphu', 'BTN', 'Ngultrum', '+975', 'BT', 'BTN', '064', '.bt'),
('200', 'South Ossetia', 'Republic of South Ossetia', 'Proto Independent State', '', '', 'Tskhinvali', 'RUB and GEL', 'Ruble and Lari', '+995', 'GE', 'GEO', '268', '.ge'),
('201', 'Ashmore and Cartier Islands', 'Territory of Ashmore and Cartier Islands', 'Dependency', 'External Territory', 'Australia', '', '', '', '', 'AU', 'AUS', '036', '.au'),
('202', 'Christmas Island', 'Territory of Christmas Island', 'Dependency', 'External Territory', 'Australia', 'The Settlement (Flying Fish Cove)', 'AUD', 'Dollar', '+61', 'CX', 'CXR', '162', '.cx'),
('203', 'Cocos (Keeling) Islands', 'Territory of Cocos (Keeling) Islands', 'Dependency', 'External Territory', 'Australia', 'West Island', 'AUD', 'Dollar', '+61', 'CC', 'CCK', '166', '.cc'),
('204', 'Coral Sea Islands', 'Coral Sea Islands Territory', 'Dependency', 'External Territory', 'Australia', '', '', '', '', 'AU', 'AUS', '036', '.au'),
('205', 'Heard Island and McDonald Islands', 'Territory of Heard Island and McDonald Islands', 'Dependency', 'External Territory', 'Australia', '', '', '', '', 'HM', 'HMD', '334', '.hm'),
('206', 'Norfolk Island', 'Territory of Norfolk Island', 'Dependency', 'External Territory', 'Australia', 'Kingston', 'AUD', 'Dollar', '+672', 'NF', 'NFK', '574', '.nf'),
('207', 'New Caledonia', '', 'Dependency', 'Sui generis Collectivity', 'France', 'Noumea', 'XPF', 'Franc', '+687', 'NC', 'NCL', '540', '.nc'),
('208', 'French Polynesia', 'Overseas Country of French Polynesia', 'Dependency', 'Overseas Collectivity', 'France', 'Papeete', 'XPF', 'Franc', '+689', 'PF', 'PYF', '258', '.pf'),
('209', 'Mayotte', 'Departmental Collectivity of Mayotte', 'Dependency', 'Overseas Collectivity', 'France', 'Mamoudzou', 'EUR', 'Euro', '+262', 'YT', 'MYT', '175', '.yt'),
('21', 'Bolivia', 'Republic of Bolivia', 'Independent State', '', '', 'La Paz (administrative/legislative) and Sucre (judical)', 'BOB', 'Boliviano', '+591', 'BO', 'BOL', '068', '.bo'),
('210', 'Saint Barthelemy', 'Collectivity of Saint Barthelemy', 'Dependency', 'Overseas Collectivity', 'France', 'Gustavia', 'EUR', 'Euro', '+590', 'GP', 'GLP', '312', '.gp'),
('211', 'Saint Martin', 'Collectivity of Saint Martin', 'Dependency', 'Overseas Collectivity', 'France', 'Marigot', 'EUR', 'Euro', '+590', 'GP', 'GLP', '312', '.gp'),
('212', 'Saint Pierre and Miquelon', 'Territorial Collectivity of Saint Pierre and Miquelon', 'Dependency', 'Overseas Collectivity', 'France', 'Saint-Pierre', 'EUR', 'Euro', '+508', 'PM', 'SPM', '666', '.pm'),
('213', 'Wallis and Futuna', 'Collectivity of the Wallis and Futuna Islands', 'Dependency', 'Overseas Collectivity', 'France', 'Mata utu', 'XPF', 'Franc', '+681', 'WF', 'WLF', '876', '.wf'),
('214', 'French Southern and Antarctic Lands', 'Territory of the French Southern and Antarctic Lands', 'Dependency', 'Overseas Territory', 'France', 'Martin-de-Vivi?s', '', '', '', 'TF', 'ATF', '260', '.tf'),
('215', 'Clipperton Island', '', 'Dependency', 'Possession', 'France', '', '', '', '', 'PF', 'PYF', '258', '.pf'),
('216', 'Bouvet Island', '', 'Dependency', 'Territory', 'Norway', '', '', '', '', 'BV', 'BVT', '074', '.bv'),
('217', 'Cook Islands', '', 'Dependency', 'Self-Governing in Free Association', 'New Zealand', 'Avarua', 'NZD', 'Dollar', '+682', 'CK', 'COK', '184', '.ck'),
('218', 'Niue', '', 'Dependency', 'Self-Governing in Free Association', 'New Zealand', 'Alofi', 'NZD', 'Dollar', '+683', 'NU', 'NIU', '570', '.nu'),
('219', 'Tokelau', '', 'Dependency', 'Territory', 'New Zealand', '', 'NZD', 'Dollar', '+690', 'TK', 'TKL', '772', '.tk'),
('22', 'Bosnia and Herzegovina', '', 'Independent State', '', '', 'Sarajevo', 'BAM', 'Marka', '+387', 'BA', 'BIH', '070', '.ba'),
('220', 'Guernsey', 'Bailiwick of Guernsey', 'Dependency', 'Crown Dependency', 'United Kingdom', 'Saint Peter Port', 'GGP', 'Pound', '+44', 'GG', 'GGY', '831', '.gg'),
('221', 'Isle of Man', '', 'Dependency', 'Crown Dependency', 'United Kingdom', 'Douglas', 'IMP', 'Pound', '+44', 'IM', 'IMN', '833', '.im'),
('222', 'Jersey', 'Bailiwick of Jersey', 'Dependency', 'Crown Dependency', 'United Kingdom', 'Saint Helier', 'JEP', 'Pound', '+44', 'JE', 'JEY', '832', '.je'),
('223', 'Anguilla', '', 'Dependency', 'Overseas Territory', 'United Kingdom', 'The Valley', 'XCD', 'Dollar', '+1-264', 'AI', 'AIA', '660', '.ai'),
('224', 'Bermuda', '', 'Dependency', 'Overseas Territory', 'United Kingdom', 'Hamilton', 'BMD', 'Dollar', '+1-441', 'BM', 'BMU', '060', '.bm'),
('225', 'British Indian Ocean Territory', '', 'Dependency', 'Overseas Territory', 'United Kingdom', '', '', '', '+246', 'IO', 'IOT', '086', '.io'),
('226', 'British Sovereign Base Areas', '', 'Dependency', 'Overseas Territory', 'United Kingdom', 'Episkopi', 'CYP', 'Pound', '+357', '', '', '', ''),
('227', 'British Virgin Islands', '', 'Dependency', 'Overseas Territory', 'United Kingdom', 'Road Town', 'USD', 'Dollar', '+1-284', 'VG', 'VGB', '092', '.vg'),
('228', 'Cayman Islands', '', 'Dependency', 'Overseas Territory', 'United Kingdom', 'George Town', 'KYD', 'Dollar', '+1-345', 'KY', 'CYM', '136', '.ky'),
('229', 'Falkland Islands (Islas Malvinas)', '', 'Dependency', 'Overseas Territory', 'United Kingdom', 'Stanley', 'FKP', 'Pound', '+500', 'FK', 'FLK', '238', '.fk'),
('23', 'Botswana', 'Republic of Botswana', 'Independent State', '', '', 'Gaborone', 'BWP', 'Pula', '+267', 'BW', 'BWA', '072', '.bw'),
('230', 'Gibraltar', '', 'Dependency', 'Overseas Territory', 'United Kingdom', 'Gibraltar', 'GIP', 'Pound', '+350', 'GI', 'GIB', '292', '.gi'),
('231', 'Montserrat', '', 'Dependency', 'Overseas Territory', 'United Kingdom', 'Plymouth', 'XCD', 'Dollar', '+1-664', 'MS', 'MSR', '500', '.ms'),
('232', 'Pitcairn Islands', '', 'Dependency', 'Overseas Territory', 'United Kingdom', 'Adamstown', 'NZD', 'Dollar', '', 'PN', 'PCN', '612', '.pn'),
('233', 'Saint Helena', '', 'Dependency', 'Overseas Territory', 'United Kingdom', 'Jamestown', 'SHP', 'Pound', '+290', 'SH', 'SHN', '654', '.sh'),
('234', 'South Georgia and the South Sandwich Islands', '', 'Dependency', 'Overseas Territory', 'United Kingdom', '', '', '', '', 'GS', 'SGS', '239', '.gs'),
('235', 'Turks and Caicos Islands', '', 'Dependency', 'Overseas Territory', 'United Kingdom', 'Grand Turk', 'USD', 'Dollar', '+1-649', 'TC', 'TCA', '796', '.tc'),
('236', 'Northern Mariana Islands', 'Commonwealth of The Northern Mariana Islands', 'Dependency', 'Commonwealth', 'United States', 'Saipan', 'USD', 'Dollar', '+1-670', 'MP', 'MNP', '580', '.mp'),
('237', 'Puerto Rico', 'Commonwealth of Puerto Rico', 'Dependency', 'Commonwealth', 'United States', 'San Juan', 'USD', 'Dollar', '+1-787 and 1-939', 'PR', 'PRI', '630', '.pr'),
('238', 'American Samoa', 'Territory of American Samoa', 'Dependency', 'Territory', 'United States', 'Pago Pago', 'USD', 'Dollar', '+1-684', 'AS', 'ASM', '016', '.as'),
('239', 'Baker Island', '', 'Dependency', 'Territory', 'United States', '', '', '', '', 'UM', 'UMI', '581', ''),
('24', 'Brazil', 'Federative Republic of Brazil', 'Independent State', '', '', 'Brasilia', 'BRL', 'Real', '+55', 'BR', 'BRA', '076', '.br'),
('240', 'Guam', 'Territory of Guam', 'Dependency', 'Territory', 'United States', 'Hagatna', 'USD', 'Dollar', '+1-671', 'GU', 'GUM', '316', '.gu'),
('241', 'Howland Island', '', 'Dependency', 'Territory', 'United States', '', '', '', '', 'UM', 'UMI', '581', ''),
('242', 'Jarvis Island', '', 'Dependency', 'Territory', 'United States', '', '', '', '', 'UM', 'UMI', '581', ''),
('243', 'Johnston Atoll', '', 'Dependency', 'Territory', 'United States', '', '', '', '', 'UM', 'UMI', '581', ''),
('244', 'Kingman Reef', '', 'Dependency', 'Territory', 'United States', '', '', '', '', 'UM', 'UMI', '581', ''),
('245', 'Midway Islands', '', 'Dependency', 'Territory', 'United States', '', '', '', '', 'UM', 'UMI', '581', ''),
('246', 'Navassa Island', '', 'Dependency', 'Territory', 'United States', '', '', '', '', 'UM', 'UMI', '581', ''),
('247', 'Palmyra Atoll', '', 'Dependency', 'Territory', 'United States', '', '', '', '', 'UM', 'UMI', '581', ''),
('248', 'U.S. Virgin Islands', 'United States Virgin Islands', 'Dependency', 'Territory', 'United States', 'Charlotte Amalie', 'USD', 'Dollar', '+1-340', 'VI', 'VIR', '850', '.vi'),
('249', 'Wake Island', '', 'Dependency', 'Territory', 'United States', '', '', '', '', 'UM', 'UMI', '850', ''),
('25', 'Brunei', 'Negara Brunei Darussalam', 'Independent State', '', '', 'Bandar Seri Begawan', 'BND', 'Dollar', '+673', 'BN', 'BRN', '096', '.bn'),
('250', 'Hong Kong', 'Hong Kong Special Administrative Region', 'Proto Dependency', 'Special Administrative Region', 'China', '', 'HKD', 'Dollar', '+852', 'HK', 'HKG', '344', '.hk'),
('251', 'Macau', 'Macau Special Administrative Region', 'Proto Dependency', 'Special Administrative Region', 'China', 'Macau', 'MOP', 'Pataca', '+853', 'MO', 'MAC', '446', '.mo'),
('252', 'Faroe Islands', '', 'Proto Dependency', '', 'Denmark', 'Torshavn', 'DKK', 'Krone', '+298', 'FO', 'FRO', '234', '.fo'),
('253', 'Greenland', '', 'Proto Dependency', '', 'Denmark', 'Nuuk (Godthab)', 'DKK', 'Krone', '+299', 'GL', 'GRL', '304', '.gl'),
('254', 'French Guiana', 'Overseas Region of Guiana', 'Proto Dependency', 'Overseas Region', 'France', 'Cayenne', 'EUR', 'Euro', '+594', 'GF', 'GUF', '254', '.gf'),
('255', 'Guadeloupe', 'Overseas Region of Guadeloupe', 'Proto Dependency', 'Overseas Region', 'France', 'Basse-Terre', 'EUR', 'Euro', '+590', 'GP', 'GLP', '312', '.gp'),
('256', 'Martinique', 'Overseas Region of Martinique', 'Proto Dependency', 'Overseas Region', 'France', 'Fort-de-France', 'EUR', 'Euro', '+596', 'MQ', 'MTQ', '474', '.mq'),
('257', 'Reunion', 'Overseas Region of Reunion', 'Proto Dependency', 'Overseas Region', 'France', 'Saint-Denis', 'EUR', 'Euro', '+262', 'RE', 'REU', '638', '.re'),
('258', 'Aland', '', 'Proto Dependency', '', 'Finland', 'Mariehamn', 'EUR', 'Euro', '+358-18', 'AX', 'ALA', '248', '.ax'),
('259', 'Aruba', '', 'Proto Dependency', '', 'Netherlands', 'Oranjestad', 'AWG', 'Guilder', '+297', 'AW', 'ABW', '533', '.aw'),
('26', 'Bulgaria', 'Republic of Bulgaria', 'Independent State', '', '', 'Sofia', 'BGN', 'Lev', '+359', 'BG', 'BGR', '100', '.bg'),
('260', 'Netherlands Antilles', '', 'Proto Dependency', '', 'Netherlands', 'Willemstad', 'ANG', 'Guilder', '+599', 'AN', 'ANT', '530', '.an'),
('261', 'Svalbard', '', 'Proto Dependency', '', 'Norway', 'Longyearbyen', 'NOK', 'Krone', '+47', 'SJ', 'SJM', '744', '.sj'),
('262', 'Ascension', '', 'Proto Dependency', 'Dependency of Saint Helena', 'United Kingdom', 'Georgetown', 'SHP', 'Pound', '+247', 'AC', 'ASC', '', '.ac'),
('263', 'Tristan da Cunha', '', 'Proto Dependency', 'Dependency of Saint Helena', 'United Kingdom', 'Edinburgh', 'SHP', 'Pound', '+290', 'TA', 'TAA', '', ''),
('264', 'Antarctica', '', 'Disputed Territory', '', 'Undetermined', '', '', '', '', 'AQ', 'ATA', '010', '.aq'),
('265', 'Kosovo', '', 'Disputed Territory', '', 'Administrated by the UN', 'Pristina', 'CSD and EUR', 'Dinar and Euro', '+381', 'CS', 'SCG', '891', '.cs and .yu'),
('266', 'Palestinian Territories (Gaza Strip and West Bank)', '', 'Disputed Territory', '', 'Administrated by Israel', 'Gaza City (Gaza Strip) and Ramallah (West Bank)', 'ILS', 'Shekel', '+970', 'PS', 'PSE', '275', '.ps'),
('267', 'Western Sahara', '', 'Disputed Territory', '', 'Administrated by Morocco', 'El-Aaiun', 'MAD', 'Dirham', '+212', 'EH', 'ESH', '732', '.eh'),
('268', 'Australian Antarctic Territory', '', 'Antarctic Territory', 'External Territory', 'Australia', '', '', '', '', 'AQ', 'ATA', '010', '.aq'),
('269', 'Ross Dependency', '', 'Antarctic Territory', 'Territory', 'New Zealand', '', '', '', '', 'AQ', 'ATA', '010', '.aq'),
('27', 'Burkina Faso', '', 'Independent State', '', '', 'Ouagadougou', 'XOF', 'Franc', '+226', 'BF', 'BFA', '854', '.bf'),
('270', 'Peter I Island', '', 'Antarctic Territory', 'Territory', 'Norway', '', '', '', '', 'AQ', 'ATA', '010', '.aq'),
('271', 'Queen Maud Land', '', 'Antarctic Territory', 'Territory', 'Norway', '', '', '', '', 'AQ', 'ATA', '010', '.aq'),
('272', 'British Antarctic Territory', '', 'Antarctic Territory', 'Overseas Territory', 'United Kingdom', '', '', '', '', 'AQ', 'ATA', '010', '.aq'),
('28', 'Burundi', 'Republic of Burundi', 'Independent State', '', '', 'Bujumbura', 'BIF', 'Franc', '+257', 'BI', 'BDI', '108', '.bi'),
('29', 'Cambodia', 'Kingdom of Cambodia', 'Independent State', '', '', 'Phnom Penh', 'KHR', 'Riels', '+855', 'KH', 'KHM', '116', '.kh'),
('3', 'Algeria', 'People s Democratic Republic of Algeria', 'Independent State', '', '', 'Algiers', 'DZD', 'Dinar', '+213', 'DZ', 'DZA', '012', '.dz'),
('30', 'Cameroon', 'Republic of Cameroon', 'Independent State', '', '', 'Yaounde', 'XAF', 'Franc', '+237', 'CM', 'CMR', '120', '.cm'),
('31', 'Canada', '', 'Independent State', '', '', 'Ottawa', 'CAD', 'Dollar', '+1', 'CA', 'CAN', '124', '.ca'),
('32', 'Cape Verde', 'Republic of Cape Verde', 'Independent State', '', '', 'Praia', 'CVE', 'Escudo', '+238', 'CV', 'CPV', '132', '.cv'),
('33', 'Central African Republic', '', 'Independent State', '', '', 'Bangui', 'XAF', 'Franc', '+236', 'CF', 'CAF', '140', '.cf'),
('34', 'Chad', 'Republic of Chad', 'Independent State', '', '', 'N Djamena', 'XAF', 'Franc', '+235', 'TD', 'TCD', '148', '.td'),
('35', 'Chile', 'Republic of Chile', 'Independent State', '', '', 'Santiago (administrative/judical) and Valparaiso (legislative)', 'CLP', 'Peso', '+56', 'CL', 'CHL', '152', '.cl'),
('36', 'China, People s Republic of', 'People s Republic of China', 'Independent State', '', '', 'Beijing', 'CNY', 'Yuan Renminbi', '+86', 'CN', 'CHN', '156', '.cn'),
('37', 'Colombia', 'Republic of Colombia', 'Independent State', '', '', 'Bogota', 'COP', 'Peso', '+57', 'CO', 'COL', '170', '.co'),
('38', 'Comoros', 'Union of Comoros', 'Independent State', '', '', 'Moroni', 'KMF', 'Franc', '+269', 'KM', 'COM', '174', '.km'),
('39', 'Congo, Democratic Republic of the (Congo ? Kinshasa)', 'Democratic Republic of the Congo', 'Independent State', '', '', 'Kinshasa', 'CDF', 'Franc', '+243', 'CD', 'COD', '180', '.cd'),
('4', 'Andorra', 'Principality of Andorra', 'Independent State', '', '', 'Andorra la Vella', 'EUR', 'Euro', '+376', 'AD', 'AND', '020', '.ad'),
('40', 'Congo, Republic of the (Congo ? Brazzaville)', 'Republic of the Congo', 'Independent State', '', '', 'Brazzaville', 'XAF', 'Franc', '+242', 'CG', 'COG', '178', '.cg'),
('41', 'Costa Rica', 'Republic of Costa Rica', 'Independent State', '', '', 'San Jose', 'CRC', 'Colon', '+506', 'CR', 'CRI', '188', '.cr'),
('42', 'Cote d Ivoire (Ivory Coast)', 'Republic of Cote d Ivoire', 'Independent State', '', '', 'Yamoussoukro', 'XOF', 'Franc', '+225', 'CI', 'CIV', '384', '.ci'),
('43', 'Croatia', 'Republic of Croatia', 'Independent State', '', '', 'Zagreb', 'HRK', 'Kuna', '+385', 'HR', 'HRV', '191', '.hr'),
('44', 'Cuba', 'Republic of Cuba', 'Independent State', '', '', 'Havana', 'CUP', 'Peso', '+53', 'CU', 'CUB', '192', '.cu'),
('45', 'Cyprus', 'Republic of Cyprus', 'Independent State', '', '', 'Nicosia', 'CYP', 'Pound', '+357', 'CY', 'CYP', '196', '.cy'),
('46', 'Czech Republic', '', 'Independent State', '', '', 'Prague', 'CZK', 'Koruna', '+420', 'CZ', 'CZE', '203', '.cz'),
('47', 'Denmark', 'Kingdom of Denmark', 'Independent State', '', '', 'Copenhagen', 'DKK', 'Krone', '+45', 'DK', 'DNK', '208', '.dk'),
('48', 'Djibouti', 'Republic of Djibouti', 'Independent State', '', '', 'Djibouti', 'DJF', 'Franc', '+253', 'DJ', 'DJI', '262', '.dj'),
('49', 'Dominica', 'Commonwealth of Dominica', 'Independent State', '', '', 'Roseau', 'XCD', 'Dollar', '+1-767', 'DM', 'DMA', '212', '.dm'),
('5', 'Angola', 'Republic of Angola', 'Independent State', '', '', 'Luanda', 'AOA', 'Kwanza', '+244', 'AO', 'AGO', '024', '.ao'),
('50', 'Dominican Republic', '', 'Independent State', '', '', 'Santo Domingo', 'DOP', 'Peso', '+1-809 and 1-829', 'DO', 'DOM', '214', '.do'),
('51', 'Ecuador', 'Republic of Ecuador', 'Independent State', '', '', 'Quito', 'USD', 'Dollar', '+593', 'EC', 'ECU', '218', '.ec'),
('52', 'Egypt', 'Arab Republic of Egypt', 'Independent State', '', '', 'Cairo', 'EGP', 'Pound', '+20', 'EG', 'EGY', '818', '.eg'),
('53', 'El Salvador', 'Republic of El Salvador', 'Independent State', '', '', 'San Salvador', 'USD', 'Dollar', '+503', 'SV', 'SLV', '222', '.sv'),
('54', 'Equatorial Guinea', 'Republic of Equatorial Guinea', 'Independent State', '', '', 'Malabo', 'XAF', 'Franc', '+240', 'GQ', 'GNQ', '226', '.gq'),
('55', 'Eritrea', 'State of Eritrea', 'Independent State', '', '', 'Asmara', 'ERN', 'Nakfa', '+291', 'ER', 'ERI', '232', '.er'),
('56', 'Estonia', 'Republic of Estonia', 'Independent State', '', '', 'Tallinn', 'EEK', 'Kroon', '+372', 'EE', 'EST', '233', '.ee'),
('57', 'Ethiopia', 'Federal Democratic Republic of Ethiopia', 'Independent State', '', '', 'Addis Ababa', 'ETB', 'Birr', '+251', 'ET', 'ETH', '231', '.et'),
('58', 'Fiji', 'Republic of the Fiji Islands', 'Independent State', '', '', 'Suva', 'FJD', 'Dollar', '+679', 'FJ', 'FJI', '242', '.fj'),
('59', 'Finland', 'Republic of Finland', 'Independent State', '', '', 'Helsinki', 'EUR', 'Euro', '+358', 'FI', 'FIN', '246', '.fi'),
('6', 'Antigua and Barbuda', '', 'Independent State', '', '', 'Saint Johns', 'XCD', 'Dollar', '+1-268', 'AG', 'ATG', '028', '.ag'),
('60', 'France', 'French Republic', 'Independent State', '', '', 'Paris', 'EUR', 'Euro', '+33', 'FR', 'FRA', '250', '.fr'),
('61', 'Gabon', 'Gabonese Republic', 'Independent State', '', '', 'Libreville', 'XAF', 'Franc', '+241', 'GA', 'GAB', '266', '.ga'),
('62', 'Gambia, The', 'Republic of The Gambia', 'Independent State', '', '', 'Banjul', 'GMD', 'Dalasi', '+220', 'GM', 'GMB', '270', '.gm'),
('63', 'Georgia', 'Republic of Georgia', 'Independent State', '', '', 'Tbilisi', 'GEL', 'Lari', '+995', 'GE', 'GEO', '268', '.ge'),
('64', 'Germany', 'Federal Republic of Germany', 'Independent State', '', '', 'Berlin', 'EUR', 'Euro', '+49', 'DE', 'DEU', '276', '.de'),
('65', 'Ghana', 'Republic of Ghana', 'Independent State', '', '', 'Accra', 'GHS', 'Cedi', '+233', 'GH', 'GHA', '288', '.gh'),
('66', 'Greece', 'Hellenic Republic', 'Independent State', '', '', 'Athens', 'EUR', 'Euro', '+30', 'GR', 'GRC', '300', '.gr'),
('67', 'Grenada', '', 'Independent State', '', '', 'Saint George s', 'XCD', 'Dollar', '+1-473', 'GD', 'GRD', '308', '.gd'),
('68', 'Guatemala', 'Republic of Guatemala', 'Independent State', '', '', 'Guatemala', 'GTQ', 'Quetzal', '+502', 'GT', 'GTM', '320', '.gt'),
('69', 'Guinea', 'Republic of Guinea', 'Independent State', '', '', 'Conakry', 'GNF', 'Franc', '+224', 'GN', 'GIN', '324', '.gn'),
('7', 'Argentina', 'Argentine Republic', 'Independent State', '', '', 'Buenos Aires', 'ARS', 'Peso', '+54', 'AR', 'ARG', '032', '.ar'),
('70', 'Guinea-Bissau', 'Republic of Guinea-Bissau', 'Independent State', '', '', 'Bissau', 'XOF', 'Franc', '+245', 'GW', 'GNB', '624', '.gw'),
('71', 'Guyana', 'Co-operative Republic of Guyana', 'Independent State', '', '', 'Georgetown', 'GYD', 'Dollar', '+592', 'GY', 'GUY', '328', '.gy'),
('72', 'Haiti', 'Republic of Haiti', 'Independent State', '', '', 'Port-au-Prince', 'HTG', 'Gourde', '+509', 'HT', 'HTI', '332', '.ht'),
('73', 'Honduras', 'Republic of Honduras', 'Independent State', '', '', 'Tegucigalpa', 'HNL', 'Lempira', '+504', 'HN', 'HND', '340', '.hn'),
('74', 'Hungary', 'Republic of Hungary', 'Independent State', '', '', 'Budapest', 'HUF', 'Forint', '+36', 'HU', 'HUN', '348', '.hu'),
('75', 'Iceland', 'Republic of Iceland', 'Independent State', '', '', 'Reykjavik', 'ISK', 'Krona', '+354', 'IS', 'ISL', '352', '.is'),
('76', 'India', 'Republic of India', 'Independent State', '', '', 'New Delhi', 'INR', 'Rupee', '+91', 'IN', 'IND', '356', '.in'),
('77', 'Indonesia', 'Republic of Indonesia', 'Independent State', '', '', 'Jakarta', 'IDR', 'Rupiah', '+62', 'ID', 'IDN', '360', '.id'),
('78', 'Iran', 'Islamic Republic of Iran', 'Independent State', '', '', 'Tehran', 'IRR', 'Rial', '+98', 'IR', 'IRN', '364', '.ir'),
('79', 'Iraq', 'Republic of Iraq', 'Independent State', '', '', 'Baghdad', 'IQD', 'Dinar', '+964', 'IQ', 'IRQ', '368', '.iq'),
('8', 'Armenia', 'Republic of Armenia', 'Independent State', '', '', 'Yerevan', 'AMD', 'Dram', '+374', 'AM', 'ARM', '051', '.am'),
('80', 'Ireland', '', 'Independent State', '', '', 'Dublin', 'EUR', 'Euro', '+353', 'IE', 'IRL', '372', '.ie'),
('81', 'Israel', 'State of Israel', 'Independent State', '', '', 'Jerusalem', 'ILS', 'Shekel', '+972', 'IL', 'ISR', '376', '.il'),
('82', 'Italy', 'Italian Republic', 'Independent State', '', '', 'Rome', 'EUR', 'Euro', '+39', 'IT', 'ITA', '380', '.it'),
('83', 'Jamaica', '', 'Independent State', '', '', 'Kingston', 'JMD', 'Dollar', '+1-876', 'JM', 'JAM', '388', '.jm'),
('84', 'Japan', '', 'Independent State', '', '', 'Tokyo', 'JPY', 'Yen', '+81', 'JP', 'JPN', '392', '.jp'),
('85', 'Jordan', 'Hashemite Kingdom of Jordan', 'Independent State', '', '', 'Amman', 'JOD', 'Dinar', '+962', 'JO', 'JOR', '400', '.jo'),
('86', 'Kazakhstan', 'Republic of Kazakhstan', 'Independent State', '', '', 'Astana', 'KZT', 'Tenge', '+7', 'KZ', 'KAZ', '398', '.kz'),
('87', 'Kenya', 'Republic of Kenya', 'Independent State', '', '', 'Nairobi', 'KES', 'Shilling', '+254', 'KE', 'KEN', '404', '.ke'),
('88', 'Kiribati', 'Republic of Kiribati', 'Independent State', '', '', 'Tarawa', 'AUD', 'Dollar', '+686', 'KI', 'KIR', '296', '.ki'),
('89', 'Korea, Democratic People s Republic of (North Korea)', 'Democratic People s Republic of Korea', 'Independent State', '', '', 'Pyongyang', 'KPW', 'Won', '+850', 'KP', 'PRK', '408', '.kp'),
('9', 'Australia', 'Commonwealth of Australia', 'Independent State', '', '', 'Canberra', 'AUD', 'Dollar', '+61', 'AU', 'AUS', '036', '.au'),
('90', 'Korea, Republic of  (South Korea)', 'Republic of Korea', 'Independent State', '', '', 'Seoul', 'KRW', 'Won', '+82', 'KR', 'KOR', '410', '.kr'),
('91', 'Kuwait', 'State of Kuwait', 'Independent State', '', '', 'Kuwait', 'KWD', 'Dinar', '+965', 'KW', 'KWT', '414', '.kw'),
('92', 'Kyrgyzstan', 'Kyrgyz Republic', 'Independent State', '', '', 'Bishkek', 'KGS', 'Som', '+996', 'KG', 'KGZ', '417', '.kg'),
('93', 'Laos', 'Lao People s Democratic Republic', 'Independent State', '', '', 'Vientiane', 'LAK', 'Kip', '+856', 'LA', 'LAO', '418', '.la'),
('94', 'Latvia', 'Republic of Latvia', 'Independent State', '', '', 'Riga', 'LVL', 'Lat', '+371', 'LV', 'LVA', '428', '.lv'),
('95', 'Lebanon', 'Lebanese Republic', 'Independent State', '', '', 'Beirut', 'LBP', 'Pound', '+961', 'LB', 'LBN', '422', '.lb'),
('96', 'Lesotho', 'Kingdom of Lesotho', 'Independent State', '', '', 'Maseru', 'LSL', 'Loti', '+266', 'LS', 'LSO', '426', '.ls'),
('97', 'Liberia', 'Republic of Liberia', 'Independent State', '', '', 'Monrovia', 'LRD', 'Dollar', '+231', 'LR', 'LBR', '430', '.lr'),
('98', 'Libya', 'Great Socialist People s Libyan Arab Jamahiriya', 'Independent State', '', '', 'Tripoli', 'LYD', 'Dinar', '+218', 'LY', 'LBY', '434', '.ly'),
('99', 'Liechtenstein', 'Principality of Liechtenstein', 'Independent State', '', '', 'Vaduz', 'CHF', 'Franc', '+423', 'LI', 'LIE', '438', '.li');

-- --------------------------------------------------------

--
-- Structure de la table `projects`
--

CREATE TABLE `projects` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `description` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` enum('ongoing','completed') DEFAULT 'ongoing',
  `date_debut` date DEFAULT NULL,
  `date_fin` date DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `projects`
--

INSERT INTO `projects` (`id`, `title`, `description`, `image`, `status`, `date_debut`, `date_fin`, `created_at`) VALUES
(2, 'Campagne « Jeunesse Responsable »', '<p>La campagne « Jeunesse Responsable » est une initiative de sensibilisation de masse visant à réveiller la conscience citoyenne chez les jeunes burundais. À travers des conférences, des débats et des interventions dans les quartiers, nous promouvons des valeurs de civisme, de paix et de solidarité. L&#39;objectif est de transformer chaque jeune en un acteur de changement positif dans sa communauté. Nous abordons des thématiques telles que la lutte contre la corruption, le respect du bien public et l&#39;engagement bénévole. Cette campagne est le moteur de notre devise : éclairer la jeunesse pour que le Burundi avance vers un avenir plus uni et intègre.</p>\r\n', '20260129092424697b1938c5a8a.jpg', 'ongoing', '2026-01-08', '2026-01-30', '2026-01-16 09:56:49'),
(4, 'Formation sur la gestion associative et le leadership éthique', '<p>Ce programme est conçu pour transformer la manière dont les organisations locales sont dirigées au Burundi. Nous partons du constat que la pérennité d&#39;une association dépend de la qualité de sa gouvernance. Cette formation offre aux dirigeants associatifs des outils concrets en gestion administrative, financière et humaine. Au-delà de la technique, l&#39;accent est mis sur l&#39;éthique du leadership : l&#39;intégrité, la responsabilité et la transparence. Nous formons des dirigeants capables de placer l&#39;intérêt collectif au-dessus des intérêts personnels. En renforçant ces capacités, URUMURI_ICSD garantit que les structures de la société civile deviennent des partenaires crédibles et efficaces pour le développement national.</p>\r\n', '20260129092127697b188786f72.jpg', 'ongoing', NULL, NULL, '2026-01-25 07:44:50'),
(9, 'Lancement de 3 projets pilotes (coopératives de jeunes)', '', '20260129092548697b198c86327.jpg', 'ongoing', NULL, NULL, '2026-01-29 07:25:48'),
(10, 'Campagne de reboisement (10 000 plants)', '<p>Conformément à nos objectifs de protection de l&#39;environnement, cette campagne est une réponse directe à la déforestation et au changement climatique. Planter 10 000 arbres est un acte de foi envers l&#39;avenir. Nous impliquons activement la jeunesse dans le choix des essences, la mise en terre et, surtout, le suivi de la croissance des plants. Cette initiative ne se limite pas à l&#39;aspect écologique ; elle est aussi éducative. Chaque arbre planté symbolise la responsabilité d&#39;un jeune envers sa terre. C&#39;est une action concrète qui laisse une empreinte durable sur le paysage burundais et assure la survie des écosystèmes locaux.</p>\r\n', '20260129093033697b1aa914978.jpg', 'ongoing', NULL, NULL, '2026-01-29 07:26:02'),
(11, 'Atelier d’innovation numérique & environnementale', '<p>Cet atelier est un espace de créativité où la technologie rencontre l&#39;écologie. Nous réunissons des jeunes développeurs, des ingénieurs et des défenseurs de la nature pour concevoir des solutions innovantes aux problèmes environnementaux. Qu&#39;il s&#39;agisse d&#39;applications mobiles pour la gestion des déchets, de systèmes d&#39;irrigation intelligents ou de plateformes de sensibilisation au climat, cet atelier encourage l&#39;ingéniosité. URUMURI_ICSD croit que le numérique est un levier puissant pour accélérer le développement durable. Les participants apprennent à coder et à concevoir avec un but social, renforçant ainsi leurs compétences techniques tout en servant la planète.</p>\r\n', '20260129092825697b1a2956c55.jpg', 'ongoing', NULL, NULL, '2026-01-29 07:26:28'),
(12, 'Sensibilisation sur la gestion des déchets scolaires', '<p>L&#39;école doit être le premier lieu où l&#39;on apprend le respect de l&#39;environnement. Ce projet vise à instaurer des systèmes de tri et de gestion responsable des déchets au sein des établissements scolaires. Nous organisons des ateliers ludiques pour enseigner aux élèves les \"3R\" : Réduire, Réutiliser, Recycler. En installant des poubelles de tri et en créant des clubs environnementaux, nous transformons l&#39;enceinte scolaire en un modèle de propreté. L&#39;objectif est que les enfants et adolescents rapportent ces bonnes pratiques dans leurs familles, créant ainsi un effet boule de neige pour une ville de Bujumbura plus saine.</p>\r\n', '20260129093232697b1b20bb500.jpg', 'ongoing', NULL, NULL, '2026-01-29 07:32:32'),
(13, 'Organisation de la Journée du Mérite Jeune', '<p>La Journée du Mérite Jeune est le grand rendez-vous annuel de la reconnaissance. Dans une société qui souligne souvent les échecs, URUMURI_ICSD choisit de célébrer les victoires. Nous récompensons les jeunes qui ont initié des projets exceptionnels, qui ont fait preuve d&#39;un courage citoyen hors pair ou qui ont brillé par leur excellence académique et professionnelle. Cette journée est conçue pour créer des modèles de réussite (role models) locaux auxquels les autres jeunes peuvent s&#39;identifier. C&#39;est un puissant levier de motivation qui prouve que le travail, l&#39;innovation et l&#39;intégrité finissent toujours par porter leurs fruits.</p>\r\n', '20260129093416697b1b88e5404.jpg', 'ongoing', NULL, NULL, '2026-01-29 07:34:17'),
(14, 'Évaluation annuelle participative', '<p>La redevabilité est au cœur de notre fonctionnement. L&#39;évaluation annuelle participative n&#39;est pas un simple rapport administratif, mais un moment d&#39;échange avec nos bénéficiaires, nos membres et nos partenaires. Ensemble, nous analysons ce qui a fonctionné et ce qui doit être amélioré. Cette approche participative garantit que nos actions restent alignées avec les besoins réels de la jeunesse burundaise. C&#39;est un exercice de transparence totale qui renforce la confiance de nos donateurs et permet à URUMURI_ICSD de s&#39;adapter continuellement pour maximiser son impact social sur le terrain.</p>\r\n', '20260129094420697b1de435852.jpg', 'ongoing', NULL, NULL, '2026-01-29 07:44:20'),
(15, 'Séminaire sur la bonne gouvernance et transparence', '<p>Ce séminaire intensif s&#39;adresse aux décideurs et aux futurs cadres de l&#39;association ainsi qu&#39;à nos partenaires. Il approfondit les mécanismes de contrôle interne, la gestion des conflits d&#39;intérêts et la rédaction de rapports financiers rigoureux. Pour URUMURI_ICSD, la bonne gouvernance n&#39;est pas une option, c&#39;est une exigence. Nous voulons prouver qu&#39;une association burundaise peut opérer selon les standards internationaux les plus élevés. Ce séminaire forge une culture organisationnelle où la transparence devient une fierté, attirant ainsi plus de collaborations et de soutien pour nos projets de développement durable.</p>\r\n', '20260129094600697b1e486c7a8.jpg', 'ongoing', NULL, NULL, '2026-01-29 07:46:00'),
(16, 'Cérémonie de distinction des membres méritants', '<p>Le capital le plus précieux de notre association est l&#39;humain. Cette cérémonie annuelle est dédiée à remercier les bénévoles et les membres du personnel qui se sont surpassés. Nous célébrons l&#39;engagement, la ponctualité, l&#39;esprit d&#39;équipe et la créativité. En valorisant les efforts individuels, nous maintenons un haut niveau de motivation au sein de l&#39;équipe. C&#39;est aussi l&#39;occasion de renforcer les liens fraternels entre les membres, rappelant que nous sommes une famille unie par une vision commune. Des trophées et certificats sont remis pour marquer officiellement leur contribution à l&#39;édifice URUMURI_ICSD.</p>\r\n', '20260129094739697b1eabdcb30.jpg', 'ongoing', NULL, NULL, '2026-01-29 07:47:39'),
(17, 'Initier les activités agropastorales', '<p>Ce projet marque le lancement officiel de nos propres unités de production agricole et d&#39;élevage. En initiant ces activités, URUMURI_ICSD vise deux objectifs : l&#39;autofinancement partiel de l&#39;association et la création de centres d&#39;apprentissage pratique pour les jeunes ruraux. Nous mettons en place des fermes pilotes utilisant des techniques modernes de compostage et de rotation des cultures. Ce projet démontre que l&#39;agropastoralisme est un secteur de dignité et de richesse. En travaillant la terre de manière scientifique et passionnée, nous encourageons la jeunesse à voir l&#39;agriculture non plus comme une corvée, mais comme un business noble et vital.</p>\r\n', '20260129095003697b1f3bb88f2.jpg', 'ongoing', NULL, NULL, '2026-01-29 07:50:03'),
(18, 'Formations en entrepreneuriat durable (agro & numérique)', '<p>Ce projet fusionne les deux secteurs les plus porteurs pour l&#39;avenir économique du pays : l&#39;agriculture et les nouvelles technologies. Nous formons les jeunes à créer des entreprises qui ne sont pas seulement rentables, mais aussi respectueuses de l&#39;environnement (entrepreneuriat vert). Dans le volet agricole, nous enseignons des techniques de production durables. Pour le volet numérique, nous formons à l&#39;utilisation des outils digitaux pour la gestion et la commercialisation des produits. L&#39;idée est de moderniser le secteur primaire par l&#39;innovation technologique, permettant ainsi aux jeunes de devenir des créateurs d&#39;emplois plutôt que des demandeurs.</p>\r\n', '20260129100335697b2267c3515.jpg', 'ongoing', NULL, NULL, '2026-01-29 08:03:35');

-- --------------------------------------------------------

--
-- Structure de la table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `display_name` varchar(100) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(3, 'Admin', 'Admin', 'Administrateur', '2026-01-20 15:38:19', '2026-01-20 15:38:19');

-- --------------------------------------------------------

--
-- Structure de la table `settings`
--

CREATE TABLE `settings` (
  `IdSetting` int(11) NOT NULL,
  `KeyValue` varchar(250) NOT NULL,
  `TitlePage` varchar(200) DEFAULT NULL,
  `Value` text DEFAULT NULL,
  `IsFile` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `settings`
--

INSERT INTO `settings` (`IdSetting`, `KeyValue`, `TitlePage`, `Value`, `IsFile`) VALUES
(2, 'site_name', 'Nom du site', 'AbelaB Formation', 0),
(3, 'site_logo', 'Logo du site', '20260129125929697b4ba1a17ec.jpeg', 1),
(4, 'site_favicon', 'Favicon du site', '20260129125951697b4bb7bc2d4.jpeg', 1),
(5, 'site_email', 'Email contact', 'dushimeyesupaulin@gmail.com', 0),
(6, 'site_phone', 'Téléphone contact', '+257 68 86 39 45', 0),
(7, 'site_address', 'Adresse du siège', 'Rohero 1, Avenue Pierre Ndendandumwe Central Building No. 225 a Bujumbura,Republique du Burundi', 0),
(8, 'site_country', 'Pays du site', 'Burundi', 0),
(10, 'password_email16caractere', 'password_email16caractere', 'pmhkniuvlqnwyblm', 0),
(11, 'site_youtube', 'site_youtube', 'http://youtube.com', 0),
(12, 'site_instagram', 'site_instagram', 'http://instagram.com', 0),
(13, 'site_facebook', 'site_facebook', 'http://facebook.com', 0),
(14, 'site_linkedln', 'site_linkedln', 'http://linkedln.com', 0),
(25, 'longitude', 'longitude pour ', '29.3719', 0),
(26, 'latitude', 'latutide', '-3.3835', 0);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `membre_id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `pass_word` varchar(255) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` tinyint(1) DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `membre_id`, `email`, `pass_word`, `role_id`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 7, 'admin@gmail.com', '$2y$10$esZXsXm0fEhJo7PVT6MAfej7VNi8rmtsXtmPTxfNo/ErDocsEwAZG', 3, 1, '2026-01-20 15:45:01', '2026-01-29 10:40:56');

-- --------------------------------------------------------

--
-- Structure de la table `vision`
--

CREATE TABLE `vision` (
  `id` int(11) NOT NULL,
  `content` varchar(200) NOT NULL,
  `date_creation` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `vision`
--

INSERT INTO `vision` (`id`, `content`, `date_creation`) VALUES
(1, 'Être une lumière qui inspire et guide la jeunesse burundaise vers un avenir uni, prospère et \r\nintègre.\r\n', '2026-01-13 20:10:01');

-- --------------------------------------------------------

--
-- Structure de la table `visitors_logs`
--

CREATE TABLE `visitors_logs` (
  `id` int(11) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `user_agent` text DEFAULT NULL,
  `device` enum('Mobile','Desktop','Other') DEFAULT 'Desktop',
  `page` varchar(255) DEFAULT NULL,
  `referer` varchar(255) DEFAULT NULL,
  `visit_date` date NOT NULL,
  `visit_time` time NOT NULL,
  `country` varchar(100) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `latitude` varchar(50) DEFAULT NULL,
  `longitude` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `visitors_logs`
--

INSERT INTO `visitors_logs` (`id`, `ip_address`, `user_agent`, `device`, `page`, `referer`, `visit_date`, `visit_time`, `country`, `city`, `latitude`, `longitude`, `created_at`) VALUES
(12, '197.255.128.0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/144.0.0.0 Safari/537.36 Edg/144.0.0.0', 'Desktop', 'http://localhost/urumuri/', 'http://localhost/urumuri/', '2026-01-26', '10:30:12', 'Cabo Verde', 'Praia', '14.923', '-23.508', '2026-01-26 09:30:12'),
(13, '197.255.128.0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'Desktop', 'http://localhost/urumuri/', '', '2026-01-29', '08:14:50', 'Cabo Verde', 'Praia', '14.923', '-23.508', '2026-01-29 07:14:50'),
(14, '197.255.128.0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:147.0) Gecko/20100101 Firefox/147.0', 'Desktop', 'http://localhost/urumuri/Home', 'http://localhost/URUmuri/', '2026-01-29', '16:52:50', 'Cabo Verde', 'Praia', '14.923', '-23.508', '2026-01-29 15:52:50');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `about_us`
--
ALTER TABLE `about_us`
  ADD PRIMARY KEY (`id_about_us`);

--
-- Index pour la table `carousels`
--
ALTER TABLE `carousels`
  ADD PRIMARY KEY (`IdCarousel`);

--
-- Index pour la table `categories_membre`
--
ALTER TABLE `categories_membre`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`IdContact`);

--
-- Index pour la table `devise`
--
ALTER TABLE `devise`
  ADD PRIMARY KEY (`id_devise`);

--
-- Index pour la table `dons`
--
ALTER TABLE `dons`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `dons_competences`
--
ALTER TABLE `dons_competences`
  ADD PRIMARY KEY (`id`),
  ADD KEY `don_id` (`don_id`);

--
-- Index pour la table `dons_financiers`
--
ALTER TABLE `dons_financiers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `don_id` (`don_id`),
  ADD KEY `id_methode_paiement` (`id_methode_paiement`);

--
-- Index pour la table `dons_materiels`
--
ALTER TABLE `dons_materiels`
  ADD PRIMARY KEY (`id`),
  ADD KEY `don_id` (`don_id`);

--
-- Index pour la table `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`IdFaq`);

--
-- Index pour la table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`IdGallery`);

--
-- Index pour la table `membres`
--
ALTER TABLE `membres`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categories_membre_id` (`categories_membre_id`);

--
-- Index pour la table `mission`
--
ALTER TABLE `mission`
  ADD PRIMARY KEY (`id_mission`);

--
-- Index pour la table `mode_payement`
--
ALTER TABLE `mode_payement`
  ADD PRIMARY KEY (`id_mode_payement`);

--
-- Index pour la table `newsletter`
--
ALTER TABLE `newsletter`
  ADD PRIMARY KEY (`id_newsletter`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Index pour la table `objectifs`
--
ALTER TABLE `objectifs`
  ADD PRIMARY KEY (`id_objectif`);

--
-- Index pour la table `partener`
--
ALTER TABLE `partener`
  ADD PRIMARY KEY (`id_partner`);

--
-- Index pour la table `pays`
--
ALTER TABLE `pays`
  ADD PRIMARY KEY (`id_country`);

--
-- Index pour la table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`IdSetting`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `membre_id` (`membre_id`),
  ADD KEY `role_id` (`role_id`);

--
-- Index pour la table `vision`
--
ALTER TABLE `vision`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `visitors_logs`
--
ALTER TABLE `visitors_logs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `about_us`
--
ALTER TABLE `about_us`
  MODIFY `id_about_us` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `carousels`
--
ALTER TABLE `carousels`
  MODIFY `IdCarousel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `categories_membre`
--
ALTER TABLE `categories_membre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `IdContact` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `devise`
--
ALTER TABLE `devise`
  MODIFY `id_devise` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `dons`
--
ALTER TABLE `dons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT pour la table `dons_competences`
--
ALTER TABLE `dons_competences`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `dons_financiers`
--
ALTER TABLE `dons_financiers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `dons_materiels`
--
ALTER TABLE `dons_materiels`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `faq`
--
ALTER TABLE `faq`
  MODIFY `IdFaq` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `IdGallery` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `membres`
--
ALTER TABLE `membres`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT pour la table `mission`
--
ALTER TABLE `mission`
  MODIFY `id_mission` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `mode_payement`
--
ALTER TABLE `mode_payement`
  MODIFY `id_mode_payement` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `newsletter`
--
ALTER TABLE `newsletter`
  MODIFY `id_newsletter` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `objectifs`
--
ALTER TABLE `objectifs`
  MODIFY `id_objectif` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `partener`
--
ALTER TABLE `partener`
  MODIFY `id_partner` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT pour la table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `settings`
--
ALTER TABLE `settings`
  MODIFY `IdSetting` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `vision`
--
ALTER TABLE `vision`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `visitors_logs`
--
ALTER TABLE `visitors_logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `dons_competences`
--
ALTER TABLE `dons_competences`
  ADD CONSTRAINT `dons_competences_ibfk_1` FOREIGN KEY (`don_id`) REFERENCES `dons` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `dons_financiers`
--
ALTER TABLE `dons_financiers`
  ADD CONSTRAINT `dons_financiers_ibfk_1` FOREIGN KEY (`don_id`) REFERENCES `dons` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `dons_financiers_ibfk_2` FOREIGN KEY (`id_methode_paiement`) REFERENCES `mode_payement` (`id_mode_payement`) ON DELETE CASCADE;

--
-- Contraintes pour la table `dons_materiels`
--
ALTER TABLE `dons_materiels`
  ADD CONSTRAINT `dons_materiels_ibfk_1` FOREIGN KEY (`don_id`) REFERENCES `dons` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `membres`
--
ALTER TABLE `membres`
  ADD CONSTRAINT `fk_membres_categories` FOREIGN KEY (`categories_membre_id`) REFERENCES `categories_membre` (`id`);

--
-- Contraintes pour la table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_users_membres` FOREIGN KEY (`membre_id`) REFERENCES `membres` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_users_roles` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 23 jan. 2026 à 13:29
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
(8, 'D’une petite épicerie bio en ligne à la place de marché référente de la consommation responsable.', '<p><span style=\"color:#000000; font-family:&quot;Times New Roman&quot;; font-size:medium\">3Umwami Nebukadineza yakoze igishushanyo mw izahabu, uburebure bgaco bgar&#39; amatambge mirongwitandatu y&#39;ukuboko uciriye mu nkokora, ubgaguke bgaco bgar&#39; amatambge atandatu: agihagarika mu kiyaga c&#39;i Dura, mu ntara y&#39;i Babuloni. 2&nbsp;Nuk&#39; umwami Nebukadineza atuma gukoranya ivyegera vyiwe n&#39;abaganwa n&#39;abagabisha n&#39;abajanama bakuru, n&#39;abazezwabintu n&#39;abacamanza n&#39;abashingantahe n&#39;abatware bose bo mur&#39; ivyo bihugu, ngo baze guhezagira ico gishushanyo umwami Nebukadineza yari yahagaritse. 3&nbsp;Nukw ivyegera vy&#39;umwami n&#39;abaganwa n&#39;abagabisha n&#39;abajanama bakuru n&#39;abazezwabintu n&#39;abacamanza n&#39;abashingantahe n&#39;abatware bose bo mur&#39; izo ntara bakoranywa no guhezagira ico gishushanyo umwami Nebukadineza yari yahagaritse. Nuko bahagarara imbere y&#39;ico gishushanyo yahagaritse. 4&nbsp;Umusiguzi asemerera n&#39;ijwi rirenga, ati Yemwe moko n&#39;amahanga n&#39;abavuga indimi zitari zimwe, ngibi ivyo mugezwe: 5&nbsp;ngo Ni mwumva amajwi y&#39;inzamba n&#39;imyironge n&#39;inanga n&#39;amakembe n&#39;imiduri n&#39;ivyitwa sumponya n&#39;ibindi vy&#39;ubgoko bgose bivuzwa, muce mwikubita hasi musenge iki gishushanyo c&#39;izahabu umwami Nebukadineza yahagaritse; 6&nbsp;a arik&#39; umuntu wese atikubita hasi ngw asenge, mur&#39; ako kanya aca atererwa mw itanure ry&#39;umuriro uhinda. 7&nbsp;Maz&#39; abantu bose bumvise amajwi y&#39;inzamba n&#39;imyironge n&#39;inanga n&#39;amakembe n&#39;imiduri n&#39;ibindi vy&#39;ubgoko bgose bivuga, amoko n&#39;amahanga n&#39;abavuga indimi zitari zimwe bose, ako kanya baca bikubita hasi basenga ico gishushanyo c&#39;izahabu umwami Nebukadineza yari yahagaritse.</span><br />\r\n<span style=\"color:#000000; font-family:&quot;Times New Roman&quot;; font-size:medium\">8&nbsp;Maz&#39; uwo mwanya Abakaludaya bamwe bigira hafi barega Abayuda. 9&nbsp;b Babgira umwami Nebukadineza, bati Mugenzi nyaguhoraho: 10&nbsp;washizeh&#39; icagezwe, mugenzi, kivuga ng&#39; Umuntu wese ni yumva amajwi y&#39;inzamba n&#39;imyironge n&#39;inanga n&#39;amakembe n&#39;imiduri na sumponya n&#39;ibindi vy&#39;ubgoko bgose bivuzwa, ace yikubita hasi asenge ico gishushanyo c&#39;izahabu; 11&nbsp;kandi ng&#39; Umuntu wese atikubita hasi ngw asenge, atererwe mw itanure ry&#39;umuriro uhinda. 12&nbsp;c Nuko rero harih&#39; Abayuda bamwe wahaye gutwara mu gihugu c&#39;i Babuloni, ni Shaduraka na Meshaki na Abedunego: abo bagabo, mugenzi, ntibaruha bakubara, ntibasaba imana zawe, kandi ntibasenze ca gishushanyo c&#39;izahabu wahagaritse.</span><br />\r\n<span style=\"color:#000000; font-family:&quot;Times New Roman&quot;; font-size:medium\">&nbsp;</span><br />\r\n<span style=\"color:#000000; font-family:&quot;Times New Roman&quot;; font-size:medium\">Ba Shaduraka batererwa mw itanure, ntibagira ico baba</span></p>\r\n', '2026-01-14 15:11:02');

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
(9, '20260114140548696794acab59a.jpg', '<p>Formation en D&eacute;veloppement Web</p>\r\n', 'Apprenez à créer des sites web modernes', 1, 'Développement Web', NULL, '2025-12-18 10:00:00'),
(10, '2026011414052669679496b5252.jpg', '<p>Formation en Marketing Digital</p>\r\n', 'Maîtrisez les outils du marketing digital', 1, 'Marketing Digital', NULL, '2025-12-18 10:00:00'),
(11, '20260114140510696794863aa8c.jpg', '<p>Formation en Design Graphique</p>\r\n', 'Créez des designs percutants', 1, 'Design Graphique', NULL, '2025-12-18 10:00:00'),
(12, '202601141404466967946e44f66.jpg', '<p>Formation en Gestion de Projet</p>\r\n', 'Devenez un expert en gestion de projet', 1, 'Gestion de Projet', NULL, '2025-12-18 10:00:00'),
(13, '202601141404116967944b1e008.jpg', '<p>Formation en Data Science BBBB</p>\r\n', 'Analysez les données pour prendre de meilleures décisions', 1, 'Data Science', NULL, '2025-12-18 10:00:00');

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
  `Location` varchar(200) NOT NULL
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
  `pays` varchar(100) NOT NULL,
  `statut` enum('en_attente','valide','annule') DEFAULT 'en_attente',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `dons`
--

INSERT INTO `dons` (`id`, `type_don`, `nom_complet`, `email`, `telephone`, `pays`, `statut`, `created_at`, `updated_at`) VALUES
(17, 'financier', 'dushime paul', 'dushimepaul51@gmail.com', '5763894', 'burundi', 'en_attente', '2026-01-23 12:01:24', '2026-01-23 12:01:24');

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

--
-- Déchargement des données de la table `faq`
--

INSERT INTO `faq` (`IdFaq`, `Question`, `Response`, `Status`) VALUES
(1, 'Qui peut rejoindre Urumuri ?', 'Toute personne motivée par le développement communautaire.', 1),
(2, 'Comment devenir membre ?', 'En remplissant le formulaire d’inscription disponible sur notre site.', 1),
(3, 'Où intervient Urumuri ?', 'Principalement au Burundi avec une vision régionale.', 1),
(4, 'Les activités sont-elles payantes ?', 'La majorité de nos activités sont gratuites.', 1),
(5, 'Comment contacter Urumuri ?', 'Via la page contact ou par email officiel.', 1);

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

--
-- Déchargement des données de la table `gallery`
--

INSERT INTO `gallery` (`IdGallery`, `TypeMedia`, `Media`, `Description`, `Created_at`) VALUES
(5, 'image', 'deae043c34ac6e9ecc55fceaa7449e9c.jpg', 'dsjiiiiiiii', '2025-12-16 17:51:54'),
(6, 'link', 'https://youtu.be/7umPAcyVg1U?si=RYmnAAUrlCv_5g_F', 'aaaaaaaaaaaaaaaaaaaaa', '2025-12-16 18:08:46'),
(7, 'video', 'e08d34006303ac223a58f37fb127841e.mp4', 'WEB SITE OF ITN', '2026-01-22 13:35:57'),
(8, 'image', '20260122195648697272f0b0314.jpg', 'kjhkj', '2026-01-22 18:56:49');

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
(1, 'MANIRAMPAYE Alain Jupin', 'alain@gmail.com', '', '', '', 'Directeur', '', '', 'http://youtube.com', '', 1, '2026-01-12', 'actif', 1),
(2, 'NITRANDERKURA Eric', '', '', '', '', 'enseignants', '', '', '', '', 1, '2026-01-12', 'actif', 7),
(3, 'ISHIWE Inès Hungues Marguerite', 'hhcccccccccccccc@gmail.com', '88888888888', 'ui8yoho', '', 'directeru', 'fecebook.com', 'linkedln.com', 'youtube.com', 'instagram.com', 1, '2026-01-12', 'inactif', 0),
(4, 'BUKURU Révérien', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2026-01-12', 'actif', 0),
(5, 'AKIMANA Christian Noël', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2026-01-12', 'actif', 0),
(6, 'MUNEZERO Isaac', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2026-01-12', 'actif', 0),
(7, 'MURERANYAMBO Belyse', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2026-01-12', 'actif', 0),
(8, 'NDAYISHIMIYE Thierry', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2026-01-12', 'actif', 0),
(9, 'NDAYISHIMIYE Arnauld', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2026-01-12', 'actif', 0),
(10, 'SABUSHIMIKE Jean Claude', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2026-01-12', 'actif', 0),
(11, 'NDUWUMANA Joseph', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2026-01-12', 'actif', 0),
(12, 'NTIRAMPEBA Jean de Dieu', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2026-01-12', 'actif', 2),
(13, 'DUSABE Emery', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2026-01-12', 'actif', 0),
(14, 'BARENGAYABO Désiré', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2026-01-12', 'actif', 0),
(15, 'KUMUGISHA Delie Drice', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2026-01-12', 'actif', 0);

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
(9, 'dushimepaul51@gmail.com', '2026-01-18 19:31:58');

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

--
-- Déchargement des données de la table `partener`
--

INSERT INTO `partener` (`id_partner`, `description`, `logo`, `link`, `status`) VALUES
(2, 'hgy', '202512081106126936a3143455a.jpg', 'https://upload.wikimedia.org/wikipedia/commons/0/08/Cisco_logo_blue_2016.svg\" alt=\"Logo partenaire certification', 1),
(3, 'Partenaire Académique', 'partner1.png', 'https://universite.fr', 1),
(4, 'Partenaire Entreprise', 'partner2.png', 'https://placehold.jp/1a8c78/ffffff/200x100.png?text=LOGO+TEST', 1),
(5, 'Partenaire Technologique', 'partner3.png', 'https://techcompany.com', 1),
(6, 'Partenaire Institutionnel', 'partner4.png', 'https://dummyimage.com/200x100/1a8c78/fff.png&text=Partner+A', 1),
(7, 'Partenaire International', 'partner5.png', 'https://international.org', 1);

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
(2, 'methoucela', 'Il est créé une association sans but lucratif dénommée “ URUMURI INITIATIVE FOR CHANGE AND SUSTAINABLE DEVELOPMENT”, ayant pour sigle URUMURI_ICSD. Le nom est traduit en français comme URUMURI Initiative pour le Changement et le Développement durable.\r\nIl est créé une association sans but lucratif dénommée “ URUMURI INITIATIVE FOR CHANGE AND SUSTAINABLE DEVELOPMENT”, ayant pour sigle URUMURI_ICSD. Le nom est traduit en français comme URUMURI Initiative pour le Changement et le Développement durable.', '2026012309015169732aef7dea6.jpg', 'completed', '2026-01-08', '2026-01-30', '2026-01-16 09:56:49');

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
(3, 'site_logo', 'Logo du site', '202601142216126968079c08e2f.jpeg', 1),
(4, 'site_favicon', 'Favicon du site', '20260114221636696807b4b720b.jpeg', 1),
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
(1, 1, 'paul@gmail.com', '$2y$10$ZjEnVHpT9urbVI2jxDZT7eHo5M8bnyYYrDnxjhEZ9Pye.CG6vtI6C', 3, 1, '2026-01-20 15:45:01', '2026-01-20 14:47:17');

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
  MODIFY `IdContact` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `devise`
--
ALTER TABLE `devise`
  MODIFY `id_devise` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `dons`
--
ALTER TABLE `dons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT pour la table `dons_competences`
--
ALTER TABLE `dons_competences`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `dons_financiers`
--
ALTER TABLE `dons_financiers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `dons_materiels`
--
ALTER TABLE `dons_materiels`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `faq`
--
ALTER TABLE `faq`
  MODIFY `IdFaq` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `IdGallery` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `membres`
--
ALTER TABLE `membres`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

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
  MODIFY `id_newsletter` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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

-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 07 déc. 2023 à 02:18
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
-- Base de données : `medtun`
--

-- --------------------------------------------------------

--
-- Structure de la table `blog`
--

CREATE TABLE `blog` (
  `id_b` int(11) NOT NULL,
  `titre_blog` varchar(20) NOT NULL,
  `sujet_blog` varchar(50) NOT NULL,
  `desc_blog` varchar(100) NOT NULL,
  `date_blog` date NOT NULL,
  `id_user` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `blog`
--

INSERT INTO `blog` (`id_b`, `titre_blog`, `sujet_blog`, `desc_blog`, `date_blog`, `id_user`) VALUES
(3, 'aaaaaaaaaa', 'aaaaaaaaaaa', 'aaaaaaaaaa', '2023-11-01', 'MM12345676'),
(4, 'aaaaaaaaaa', 'aaaaaaaaaaaaaa', 'aaaaaaaaaaaa', '2023-11-15', 'MM12345676'),
(5, 'aaaaaaaaaa', 'aaaaaaaaaaaaaa', 'aaaaaaaaaaaa', '2023-11-15', 'MM12345676'),
(6, 'sssssss', 'sssssssssssss', 'ssssssssssssss', '2023-11-21', 'MM12345676');

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `id_categorie` int(11) NOT NULL,
  `categorie` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`id_categorie`, `categorie`) VALUES
(1, 'consultation_generale'),
(2, 'suivie maladie chronique'),
(3, 'examen spécifique'),
(4, 'consultation spécialisée'),
(5, 'Chirurgie');

-- --------------------------------------------------------

--
-- Structure de la table `commentaire`
--

CREATE TABLE `commentaire` (
  `id_com` int(11) NOT NULL,
  `date_commentaire` date NOT NULL,
  `desc_commentaire` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `consultation`
--

CREATE TABLE `consultation` (
  `id_c` int(11) NOT NULL,
  `date_consultation` date NOT NULL,
  `description_consultation` varchar(100) NOT NULL,
  `symptomes` varchar(100) NOT NULL,
  `prescription_consultation` varchar(100) NOT NULL,
  `examen_consultation` varchar(100) NOT NULL,
  `isdelete` int(1) NOT NULL,
  `id_rdv` int(11) NOT NULL,
  `id_med` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `consultation`
--

INSERT INTO `consultation` (`id_c`, `date_consultation`, `description_consultation`, `symptomes`, `prescription_consultation`, `examen_consultation`, `isdelete`, `id_rdv`, `id_med`) VALUES
(5, '2023-11-21', 'aaaa', 'aaaa', 'aaaa', 'aaaa', 0, 8, 'MM12345676'),
(6, '2023-11-21', 'zzzzz', 'zzzzz', 'zzzzz', 'zzzzz', 1, 10, 'MM12345676'),
(7, '2023-11-21', 'zzzz', 'zzzzzzzzz', 'zzzzzzzzz', 'zzzzzzzz', 0, 7, 'MM12345676'),
(8, '2023-11-21', 'wwxwx', 'wx', 'wxxxxxxxxxxxxxxxxxxxxxxx', 'wx', 0, 1, 'MM12345676'),
(9, '2023-11-23', 'ccc', 'ccc', 'cccxxxxxxxxxx', 'ccc', 1, 2, 'MM12345676');

-- --------------------------------------------------------

--
-- Structure de la table `evenement`
--

CREATE TABLE `evenement` (
  `id_e` int(11) NOT NULL,
  `titre_event` varchar(20) NOT NULL,
  `sujet_event` varchar(50) NOT NULL,
  `desc_event` varchar(100) NOT NULL,
  `lieu_event` varchar(20) NOT NULL,
  `date_debut_event` datetime NOT NULL,
  `date_fin_event` datetime NOT NULL,
  `capacite` int(3) NOT NULL,
  `id_user` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `evenement`
--

INSERT INTO `evenement` (`id_e`, `titre_event`, `sujet_event`, `desc_event`, `lieu_event`, `date_debut_event`, `date_fin_event`, `capacite`, `id_user`) VALUES
(1, 'aaaaa', '', '', 'aaaaaaaaaaaaaaaaaa', '2023-11-16 00:00:00', '2023-11-16 00:00:00', 12, 'MM12345676'),
(2, 'zzz', '', '', 'zzz', '2023-11-14 00:00:00', '2023-11-14 00:00:00', 10, 'MM12345676'),
(3, 'vv', '', '', 'vvvvvvvvvvvvvvvv', '2023-11-22 00:00:00', '2023-11-22 00:00:00', 250, 'MM12345676');

-- --------------------------------------------------------

--
-- Structure de la table `ordonnance`
--

CREATE TABLE `ordonnance` (
  `id_o` int(11) NOT NULL,
  `date` date NOT NULL,
  `examen` varchar(100) NOT NULL,
  `id_c` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `reclamation`
--

CREATE TABLE `reclamation` (
  `id_r` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `etat` varchar(255) NOT NULL,
  `sujet_rec` varchar(255) NOT NULL,
  `desc_rec` varchar(255) NOT NULL,
  `date_rec` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `reclamation`
--

INSERT INTO `reclamation` (`id_r`, `nom`, `prenom`, `etat`, `sujet_rec`, `desc_rec`, `date_rec`) VALUES
(6, 'asslema', 'elaa', 'Approved', 'aaazzzz', 'zzzz', '2023-11-25'),
(8, 'Elaa', 'elaa', 'Approved', 'aaazzzz', 'bbbbbb', '2023-11-25'),
(12, 'marahbee', 'elaa', 'Approved', 'aaazzzz', 'zzzz', '2023-11-25');

-- --------------------------------------------------------

--
-- Structure de la table `rendezvous`
--

CREATE TABLE `rendezvous` (
  `id_rdv` int(11) NOT NULL,
  `date_rdv` date NOT NULL,
  `deb_rdv` int(11) NOT NULL,
  `fin_rdv` int(11) NOT NULL,
  `id_categorie` int(11) NOT NULL,
  `id_user` varchar(10) NOT NULL,
  `id_med` varchar(10) NOT NULL,
  `isdelete` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `rendezvous`
--

INSERT INTO `rendezvous` (`id_rdv`, `date_rdv`, `deb_rdv`, `fin_rdv`, `id_categorie`, `id_user`, `id_med`, `isdelete`) VALUES
(1, '2023-11-13', 9, 10, 1, 'PA12345677', 'MM12345676', 0),
(2, '2023-11-13', 11, 12, 4, 'PA12345678', 'MM12345676', 0),
(7, '2023-11-13', 3, 4, 1, 'PE12345675', 'MM12345676', 0),
(8, '2023-11-14', 10, 11, 1, 'PO12345674', 'MM12345676', 0),
(10, '2023-11-14', 9, 10, 4, 'PA12345677', 'MM12345676', 0),
(13, '2023-11-15', 10, 11, 4, 'PA12345678', 'MM12345676', 0),
(14, '2023-11-15', 1, 2, 4, 'PO12345674', 'MM12345676', 0),
(15, '2023-11-16', 11, 12, 4, 'PE12345675', 'MM12345676', 0),
(16, '2023-11-16', 1, 2, 4, 'PO12345674', 'MM12345676', 0),
(17, '2023-11-17', 9, 10, 4, 'PE12345675', 'MM12345676', 0),
(18, '2023-11-17', 2, 3, 4, 'PO12345674', 'MM12345676', 0),
(19, '2023-11-22', 10, 11, 3, 'PA12345677', 'MW12345672', 0),
(21, '2023-11-23', 2, 3, 3, 'PA12345677', 'MM12345676', 0),
(22, '2023-11-27', 9, 10, 5, 'PM12345673', 'MM12345676', 0),
(23, '2023-11-27', 11, 12, 1, 'PO12345674', 'MM12345676', 0);

-- --------------------------------------------------------

--
-- Structure de la table `reponse`
--

CREATE TABLE `reponse` (
  `id_rep` int(11) NOT NULL,
  `reponse` varchar(200) NOT NULL,
  `date_reponse` date NOT NULL,
  `id_rec` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `reponse`
--

INSERT INTO `reponse` (`id_rep`, `reponse`, `date_reponse`, `id_rec`) VALUES
(11, 'hhhhhh', '2023-12-15', 8),
(12, 'xxxxx', '2023-12-15', 8),
(13, 'bbbb', '2023-12-15', 6);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id_user` varchar(20) NOT NULL,
  `cin` int(10) DEFAULT NULL,
  `nom` varchar(20) NOT NULL,
  `prenom` varchar(20) NOT NULL,
  `age` int(3) NOT NULL,
  `sexe` varchar(1) NOT NULL,
  `telephone` int(20) NOT NULL,
  `nationalite` varchar(20) NOT NULL,
  `mail` varchar(30) NOT NULL,
  `password` varchar(20) NOT NULL,
  `role` varchar(10) NOT NULL,
  `diplome` varchar(30) DEFAULT NULL,
  `specialite` varchar(30) DEFAULT NULL,
  `pays` varchar(20) DEFAULT NULL,
  `ville` varchar(20) DEFAULT NULL,
  `lieu_cabinet` varchar(70) DEFAULT NULL,
  `avis` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id_user`, `cin`, `nom`, `prenom`, `age`, `sexe`, `telephone`, `nationalite`, `mail`, `password`, `role`, `diplome`, `specialite`, `pays`, `ville`, `lieu_cabinet`, `avis`) VALUES
('MM12345676', 12345676, 'mohamed', 'ben', 45, 'M', 50000000, 'Tunisien', 'mohamed@yahoo.com', 'mohamed1234', 'medecin', 'doctorat université des médeci', 'generaliste', 'Tunisie', 'Manouba', 'manouba centre', NULL),
('MW12345672', 12345672, 'walid', 'ben', 52, 'M', 50000020, 'Tunisien', 'walid@gmail.com', 'walid1234', 'medecin', 'docteur de l\'université des me', 'cardiologe', 'Tunis', 'bizerte', '23 rue fahes centre bizerte', NULL),
('PA12345677', 12345677, 'arij', 'Talhaoui', 21, 'F', 20000010, 'Tunisienne', 'arij@esprit.tn', 'arij1234', 'patient', NULL, NULL, NULL, NULL, NULL, NULL),
('PA12345678', 12345678, 'ahmed', 'ben mansour', 20, 'M', 20000000, 'Tunisien', 'ahmed@gmail.com', 'ahmed1234', 'patient', NULL, NULL, NULL, NULL, NULL, NULL),
('PE12345675', 12345675, 'elaa', 'mahmoudi', 21, 'F', 20000020, 'Tunisienne', 'elaa@esprit.tn', 'elaa1234', 'patient', NULL, NULL, NULL, NULL, NULL, NULL),
('PM12345673', 12345673, 'mariem', 'belghith', 22, 'F', 20000040, 'Tunsienne', 'mariem@gmail.com', 'mariem1234', 'patient', NULL, NULL, NULL, NULL, NULL, NULL),
('PO12345674', 12345674, 'oussema', 'ben el haj', 22, 'M', 20000030, 'Tunisien', 'oussema@esprit.tn', 'oussema1234', 'patient', NULL, NULL, NULL, NULL, NULL, NULL);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id_b`),
  ADD KEY `id_user` (`id_user`);

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`id_categorie`);

--
-- Index pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD PRIMARY KEY (`id_com`);

--
-- Index pour la table `consultation`
--
ALTER TABLE `consultation`
  ADD PRIMARY KEY (`id_c`),
  ADD KEY `id_rdv` (`id_rdv`),
  ADD KEY `consultation_ibfk_2` (`id_med`);

--
-- Index pour la table `evenement`
--
ALTER TABLE `evenement`
  ADD PRIMARY KEY (`id_e`),
  ADD KEY `id_user` (`id_user`);

--
-- Index pour la table `ordonnance`
--
ALTER TABLE `ordonnance`
  ADD PRIMARY KEY (`id_o`),
  ADD KEY `id_c` (`id_c`);

--
-- Index pour la table `reclamation`
--
ALTER TABLE `reclamation`
  ADD PRIMARY KEY (`id_r`);

--
-- Index pour la table `rendezvous`
--
ALTER TABLE `rendezvous`
  ADD PRIMARY KEY (`id_rdv`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_med` (`id_med`),
  ADD KEY `id_categorie` (`id_categorie`);

--
-- Index pour la table `reponse`
--
ALTER TABLE `reponse`
  ADD PRIMARY KEY (`id_rep`),
  ADD KEY `fk_rec` (`id_rec`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `blog`
--
ALTER TABLE `blog`
  MODIFY `id_b` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `commentaire`
--
ALTER TABLE `commentaire`
  MODIFY `id_com` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `consultation`
--
ALTER TABLE `consultation`
  MODIFY `id_c` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `evenement`
--
ALTER TABLE `evenement`
  MODIFY `id_e` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `ordonnance`
--
ALTER TABLE `ordonnance`
  MODIFY `id_o` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `reclamation`
--
ALTER TABLE `reclamation`
  MODIFY `id_r` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `rendezvous`
--
ALTER TABLE `rendezvous`
  MODIFY `id_rdv` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT pour la table `reponse`
--
ALTER TABLE `reponse`
  MODIFY `id_rep` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `blog`
--
ALTER TABLE `blog`
  ADD CONSTRAINT `blog_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `consultation`
--
ALTER TABLE `consultation`
  ADD CONSTRAINT `consultation_ibfk_1` FOREIGN KEY (`id_rdv`) REFERENCES `rendezvous` (`id_rdv`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `consultation_ibfk_2` FOREIGN KEY (`id_med`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `evenement`
--
ALTER TABLE `evenement`
  ADD CONSTRAINT `evenement_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `ordonnance`
--
ALTER TABLE `ordonnance`
  ADD CONSTRAINT `ordonnance_ibfk_1` FOREIGN KEY (`id_c`) REFERENCES `consultation` (`id_c`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `rendezvous`
--
ALTER TABLE `rendezvous`
  ADD CONSTRAINT `rendezvous_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rendezvous_ibfk_2` FOREIGN KEY (`id_med`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rendezvous_ibfk_3` FOREIGN KEY (`id_categorie`) REFERENCES `categorie` (`id_categorie`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `reponse`
--
ALTER TABLE `reponse`
  ADD CONSTRAINT `fk_rec` FOREIGN KEY (`id_rec`) REFERENCES `reclamation` (`id_r`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.6.6deb4
-- https://www.phpmyadmin.net/
--
-- Client :  db5000239832.hosting-data.io
-- Généré le :  Mer 11 Décembre 2019 à 15:57
-- Version du serveur :  5.7.28-log
-- Version de PHP :  7.0.33-0+deb9u6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `dbs234197`
--

-- --------------------------------------------------------

--
-- Structure de la table `Billet`
--

CREATE TABLE `Billet` (
  `idBillet` int(11) NOT NULL,
  `idCommande` int(11) NOT NULL,
  `emplacement` varchar(255) NOT NULL,
  `idCategorie` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `Categorie`
--

CREATE TABLE `Categorie` (
  `idCategorie` int(11) NOT NULL,
  `libCat` varchar(255) NOT NULL,
  `nbPlace` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `Client`
--

CREATE TABLE `Client` (
  `idClient` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `Client`
--

INSERT INTO `Client` (`idClient`, `nom`, `prenom`, `mail`, `password`) VALUES
(1, 'Khettal', 'Pierre', '', ''),
(2, 'junuzovic', 'said', 'said@said', '123456');

-- --------------------------------------------------------

--
-- Structure de la table `Commande`
--

CREATE TABLE `Commande` (
  `idCommande` int(11) NOT NULL,
  `montantTotal` int(11) NOT NULL,
  `idClient` int(11) NOT NULL,
  `idPromotion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `Emplacement`
--

CREATE TABLE `Emplacement` (
  `libelléEmp` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `Joueur`
--

CREATE TABLE `Joueur` (
  `idJoueur` int(11) NOT NULL,
  `nomJ` varchar(255) NOT NULL,
  `prenomJ` varchar(255) NOT NULL,
  `nationaliteJ` varchar(255) NOT NULL,
  `libPhoto` varchar(255) NOT NULL,
  `classementATP` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `Matchs`
--

CREATE TABLE `Matchs` (
  `idMatch` int(11) NOT NULL,
  `dateMatch` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `Nationalité`
--

CREATE TABLE `Nationalité` (
  `nationalite` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `Promotion`
--

CREATE TABLE `Promotion` (
  `idPromotion` int(11) NOT NULL,
  `codePromo` varchar(255) NOT NULL,
  `pourcentage` int(11) NOT NULL,
  `nbUtilisation` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Index pour les tables exportées
--

--
-- Index pour la table `Billet`
--
ALTER TABLE `Billet`
  ADD PRIMARY KEY (`idBillet`),
  ADD KEY `fk_billet_commande` (`idCommande`),
  ADD KEY `fk_billet_place` (`emplacement`),
  ADD KEY `fk_billet_categorie` (`idCategorie`);

--
-- Index pour la table `Categorie`
--
ALTER TABLE `Categorie`
  ADD PRIMARY KEY (`idCategorie`);

--
-- Index pour la table `Client`
--
ALTER TABLE `Client`
  ADD PRIMARY KEY (`idClient`);

--
-- Index pour la table `Commande`
--
ALTER TABLE `Commande`
  ADD PRIMARY KEY (`idCommande`),
  ADD KEY `idClient` (`idClient`),
  ADD KEY `idClient_2` (`idClient`),
  ADD KEY `fk_commande_promo` (`idPromotion`);

--
-- Index pour la table `Emplacement`
--
ALTER TABLE `Emplacement`
  ADD PRIMARY KEY (`libelléEmp`);

--
-- Index pour la table `Joueur`
--
ALTER TABLE `Joueur`
  ADD PRIMARY KEY (`idJoueur`),
  ADD KEY `fk_nationalite_joueur` (`nationaliteJ`);

--
-- Index pour la table `Matchs`
--
ALTER TABLE `Matchs`
  ADD PRIMARY KEY (`idMatch`);

--
-- Index pour la table `Nationalité`
--
ALTER TABLE `Nationalité`
  ADD PRIMARY KEY (`nationalite`);

--
-- Index pour la table `Promotion`
--
ALTER TABLE `Promotion`
  ADD PRIMARY KEY (`idPromotion`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `Billet`
--
ALTER TABLE `Billet`
  MODIFY `idBillet` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `Categorie`
--
ALTER TABLE `Categorie`
  MODIFY `idCategorie` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `Client`
--
ALTER TABLE `Client`
  MODIFY `idClient` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `Commande`
--
ALTER TABLE `Commande`
  MODIFY `idCommande` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `Joueur`
--
ALTER TABLE `Joueur`
  MODIFY `idJoueur` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `Matchs`
--
ALTER TABLE `Matchs`
  MODIFY `idMatch` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `Promotion`
--
ALTER TABLE `Promotion`
  MODIFY `idPromotion` int(11) NOT NULL AUTO_INCREMENT;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `Billet`
--
ALTER TABLE `Billet`
  ADD CONSTRAINT `fk_billet_categorie` FOREIGN KEY (`idCategorie`) REFERENCES `Categorie` (`idCategorie`),
  ADD CONSTRAINT `fk_billet_commande` FOREIGN KEY (`idCommande`) REFERENCES `Commande` (`idCommande`),
  ADD CONSTRAINT `fk_billet_place` FOREIGN KEY (`emplacement`) REFERENCES `Emplacement` (`libelléEmp`);

--
-- Contraintes pour la table `Commande`
--
ALTER TABLE `Commande`
  ADD CONSTRAINT `fk_client_commande` FOREIGN KEY (`idClient`) REFERENCES `Client` (`idClient`),
  ADD CONSTRAINT `fk_commande_promo` FOREIGN KEY (`idPromotion`) REFERENCES `Promotion` (`idPromotion`);

--
-- Contraintes pour la table `Joueur`
--
ALTER TABLE `Joueur`
  ADD CONSTRAINT `fk_nationalite_joueur` FOREIGN KEY (`nationaliteJ`) REFERENCES `Nationalité` (`nationalite`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

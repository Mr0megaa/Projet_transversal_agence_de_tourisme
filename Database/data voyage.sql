-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 04 déc. 2025 à 14:50
-- Version du serveur : 9.1.0
-- Version de PHP : 8.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `voyage voyage`
--

-- --------------------------------------------------------

--
-- Structure de la table `circuit`
--

DROP TABLE IF EXISTS `circuit`;
CREATE TABLE IF NOT EXISTS `circuit` (
  `Id_Circuit` int NOT NULL AUTO_INCREMENT,
  `descriptif` text,
  `dateDepart` datetime DEFAULT NULL,
  `nbPlacesDispo` int DEFAULT NULL,
  `duree` int DEFAULT NULL,
  `prixInscription` decimal(6,2) DEFAULT NULL,
  `Ville_depart` int DEFAULT NULL,
  `Ville_arrivee` int DEFAULT NULL,
  PRIMARY KEY (`Id_Circuit`),
  KEY `Id_Ville` (`Ville_depart`),
  KEY `Id_Ville_1` (`Ville_arrivee`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `circuit`
--

INSERT INTO `circuit` (`Id_Circuit`, `descriptif`, `dateDepart`, `nbPlacesDispo`, `duree`, `prixInscription`, `Ville_depart`, `Ville_arrivee`) VALUES
(1, 'Ce voyage au Brésil t’emmène à travers les paysages les plus emblématiques du pays. Il débute à Rio de Janeiro, ville mythique nichée entre mer et montagne, où l’énergie des quartiers comme Lapa et la majesté du Corcovado donnent le ton. Tu poursuis avec une immersion spectaculaire aux chutes d’Iguaçu, côté brésilien et argentin, où la puissance de l’eau et la luxuriance de la jungle offrent un spectacle inoubliable.\r\nDirection ensuite Salvador de Bahia, berceau de la culture afro-brésilienne, où les rues colorées du Pelourinho résonnent de musique et de traditions. Puis cap sur Manaus, porte d’entrée de l’Amazonie, pour découvrir le théâtre Amazonas et le fascinant phénomène de la rencontre des eaux. Enfin, retour à Rio pour une journée libre, entre détente sur les plages d’Ipanema et derniers instants au rythme de la samba.', '2025-10-28 18:00:00', 14, 5, 599.99, 1, 1),
(2, 'Imprégnez-vous de la culture japonaise grâce à ce voyage. Découvrez les villes d\'Osaka et de Kyoto, visitez des lieux incontournables et libérez l\'Otaku qui est en vous. ', '2025-12-25 14:30:00', 32, 3, 299.00, 5, 6);

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

DROP TABLE IF EXISTS `client`;
CREATE TABLE IF NOT EXISTS `client` (
  `Id_Client` int NOT NULL AUTO_INCREMENT,
  `Nom` varchar(100) DEFAULT NULL,
  `Prenom` varchar(100) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`Id_Client`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`Id_Client`, `Nom`, `Prenom`, `email`) VALUES
(1, 'Jesépa', 'Jean', 'jesépa.j@gmail.com'),
(2, 'Toupti', 'Patrik', 'patpat.tpi@gmail.com'),
(3, 'Solaigrel', 'Miriam', 'solaigrel.m@gmail.com'),
(4, 'Tikétaque', 'Louise', 'Tictac.L@gmail.com'),
(5, 'Plumber', 'Mario', 'Plumber.m@gmail.com');

-- --------------------------------------------------------

--
-- Structure de la table `etape`
--

DROP TABLE IF EXISTS `etape`;
CREATE TABLE IF NOT EXISTS `etape` (
  `Id_Etape` int NOT NULL AUTO_INCREMENT,
  `ordre` int DEFAULT NULL,
  `dateEtape` date DEFAULT NULL,
  `Id_LieuDeVisite` int NOT NULL,
  `Id_Circuit` int NOT NULL,
  PRIMARY KEY (`Id_Etape`),
  KEY `Id_LieuDeVisite` (`Id_LieuDeVisite`),
  KEY `Id_Circuit` (`Id_Circuit`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `etape`
--

INSERT INTO `etape` (`Id_Etape`, `ordre`, `dateEtape`, `Id_LieuDeVisite`, `Id_Circuit`) VALUES
(1, 1, '2025-10-29', 1, 1),
(2, 2, '2025-10-29', 2, 1),
(3, 3, '2025-10-30', 3, 1),
(4, 4, '2025-10-31', 4, 1),
(5, 5, '2025-10-31', 5, 1),
(6, 6, '2025-11-01', 6, 1),
(7, 7, '2025-11-02', 7, 1),
(8, 8, '2025-11-03', 8, 1),
(9, 1, '2025-12-26', 9, 2),
(10, 2, '2025-12-30', 10, 2),
(11, 3, '2025-12-31', 11, 2),
(12, 4, '2026-01-01', 12, 2);

-- --------------------------------------------------------

--
-- Structure de la table `lieudevisite`
--

DROP TABLE IF EXISTS `lieudevisite`;
CREATE TABLE IF NOT EXISTS `lieudevisite` (
  `Id_LieuDeVisite` int NOT NULL AUTO_INCREMENT,
  `Nom` varchar(100) DEFAULT NULL,
  `image` varchar(250) DEFAULT NULL,
  `descriptif` text,
  `duree` int DEFAULT NULL,
  `prixVisite` decimal(6,2) DEFAULT NULL,
  `Id_Ville` int NOT NULL,
  PRIMARY KEY (`Id_LieuDeVisite`),
  UNIQUE KEY `Nom` (`Nom`),
  KEY `Id_Ville` (`Id_Ville`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `lieudevisite`
--

INSERT INTO `lieudevisite` (`Id_LieuDeVisite`, `Nom`, `image`, `descriptif`, `duree`, `prixVisite`, `Id_Ville`) VALUES
(1, 'Quartier Lapa', 'https://travel-guide.daytours4u.com/fr/wp-content/uploads/sites/5/2020/07/Lapa-Rio-de-Janeiro-Arches.png.webp', 'Quartier bohème animé, célèbre pour ses bars traditionnels, ses discothèques accueillant des concerts, ses salles de danse et ses jam-sessions de samba en plein air organisées sous l\'aqueduc de Carioca, un édifice de style roman.', 150, 69.99, 1),
(2, 'Corcovado', 'https://www.merveilles-du-monde.com/Christ-redempteur/images/Corcovado/Corcovado2.jpg', 'Le Corcovado est l\'un des nombreux reliefs de la ville de Rio de Janeiro. Il s\'élève à 704 mètres d\'altitude. Il est célèbre pour accueillir en son sommet la statue du Christ Rédempteur, l\'un des principaux symboles de la ville et du pays, et pour offrir une vue sur l\'ensemble de la zone sud de la ville.', 45, 39.99, 1),
(3, 'Chutes d\'Iguaçu', 'https://www.voyages-argentine.com/upload/auto/argentine/590x405/chutes-iguazu-gorge-du-diable_6703db878e9e79.66417758.webp', 'Les chutes d\'Iguazú, chutes d\'Iguaçu ou encore chutes d\'Iguassu, situées au milieu de la forêt tropicale, à la frontière entre l\'Argentine et le Brésil, sont des chutes d\'eau constituant un site naturel inscrit au patrimoine mondial par l\'UNESCO en 1984.', 420, 59.99, 2),
(4, 'Quartier de Pelourinho', 'https://dynamic-media-cdn.tripadvisor.com/media/photo-o/17/43/ac/a9/pelourinho.jpg?w=900&h=-1&s=1', 'Les rues pavées du quartier historique de Pelourinho serpentent entre les bars à caïpirinhas en plein air, les magasins de souvenirs afro-bahiannais et les places envahies de musiciens et de danseurs. Parmi les monuments coloniaux, se distinguent l\'église et couvent São Francisco ainsi que la cathédrale-basilique de Salvador, avec leurs faïences portugaises et leurs sculptures ouvragées plaquées or.', 180, 45.00, 3),
(5, 'Praia do Flamengo', 'https://dynamic-media-cdn.tripadvisor.com/media/photo-o/15/bf/b4/05/paisagem-da-praia-do.jpg?w=800&h=-1&s=1', 'Une plage avec un accès facile, une bonne infrastructure avec quelques bons restaurants à proximité. La plage elle-même a de petites piscines naturelles dans le récif, donc les vagues ne sont pas un problème pour les petits enfants. L\'endroit est idéal pour passer votre après-midi.', NULL, 0.00, 3),
(6, 'Théâtre Amazonas', 'https://dynamic-media-cdn.tripadvisor.com/media/photo-o/0c/20/49/13/vista-externa-do-teatro.jpg?w=1200&h=-1&s=1', 'Le Théâtre Amazonas est un opéra situé dans le centre de Manaus, dans la forêt amazonienne, et qui fut inauguré le 31 décembre 1896. Construit durant la Belle Époque au temps où les fortunes se faisaient grâce à l\'extraction du caoutchouc, période appelée la fièvre du caoutchouc. Sa construction fut proposée par Antonio José Fernandes Júnior, membre de la chambre des députés, en 1881 qui désirait faire de Manaus l\'un des hauts lieux de la culture brésilienne.', 120, 5.99, 4),
(7, 'La rencontre des Eaux', 'https://cdn.generationvoyage.fr/2015/09/rencontre-des-eaux-manaus-6.jpg', 'La rencontre des Eaux est le nom donné au confluent du rio Solimões et du rio Negro. C\'est en ce point que le fleuve prend le nom d\'Amazone.', 60, 0.00, 4),
(8, 'Plages d’Ipanema', 'https://resize.prod.femina.ladmedia.fr/rblr/1200,806/img/var/2018-07/ipanema-beach-rio.jpg', 'Outre Copacabana, Ipanema est la plage la plus importante de Rio de Janeiro. Elle est devenue célèbre grâce à la chanson \"Girl from Ipanema\". Directement adjacent à celle-ci se trouve l\'un des quartiers les plus huppés de Rio. La combinaison de la plage et d\'une zone métropolitaine agréable est unique sous cette forme.', NULL, 0.00, 1),
(9, 'Universal Studios Japan', 'https://osaka.b-cdn.net/wp-content/uploads/2021/06/IMG_1263-1-1200x675.jpg', 'Universal Studios Japan est un parc à thèmes japonais situé dans l\'arrondissement Konohana-ku d\'Osaka. Troisième des parcs d\'attractions de Universal Destinations & Experiences, il est le premier à ouvrir en dehors des États-Unis, le 31 mars 2001. Il est desservi par la gare d\'Universal City sur la ligne Sakurajima.', NULL, 50.25, 5),
(10, 'Dotombori District', 'https://onb-cdn.b-cdn.net/images-stn-osaka/118-Dotonbori-Area-Osaka1.jpg', 'Dōtonbori est l\'une des principales destinations touristiques de la ville d\'Osaka au Japon. C\'est une rue unique, longeant le canal Dōtonbori entre le pont Dōtonbori et le pont Nipponbashi, dans le quartier de Namba.', 120, 30.00, 5),
(11, 'Fushimi Inari-taisha', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQC7UgrmAU2z62ZdbYMzEuibPqtICLyakExjA&s', 'Le Fushimi Inari-taisha est le sanctuaire principal de la déesse Inari et est situé dans le district de Fushimi-ku à Kyoto au Japon.', 240, 0.00, 6),
(12, 'Arashiyama', 'https://res.klook.com/image/upload/fl_lossy.progressive,w_432,h_288,c_fill,q_85/activities/c9s5rkdaw5n1ynezsnxh.jpg', 'Arashiyama est un quartier de Kyoto qui regorge de sites célèbres et magnifiques. Les visiteurs peuvent explorer l\'imposante forêt de bambous de Sagano, admirer le pont historique Togetsukyo et le paisible temple Tenryu-ji.', 420, 100.00, 6);

-- --------------------------------------------------------

--
-- Structure de la table `pays`
--

DROP TABLE IF EXISTS `pays`;
CREATE TABLE IF NOT EXISTS `pays` (
  `Id_Pays` int NOT NULL AUTO_INCREMENT,
  `Nom` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`Id_Pays`),
  UNIQUE KEY `Nom` (`Nom`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `pays`
--

INSERT INTO `pays` (`Id_Pays`, `Nom`) VALUES
(1, 'Brésil'),
(2, 'Japon');

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

DROP TABLE IF EXISTS `reservation`;
CREATE TABLE IF NOT EXISTS `reservation` (
  `Id_Reservation` int NOT NULL AUTO_INCREMENT,
  `Statut` varchar(50) DEFAULT NULL,
  `date_` date DEFAULT NULL,
  `Heure` time DEFAULT NULL,
  `nb_resa` int DEFAULT NULL,
  `Id_Circuit` int NOT NULL,
  `Id_Client` int NOT NULL,
  PRIMARY KEY (`Id_Reservation`),
  KEY `Id_Circuit` (`Id_Circuit`),
  KEY `Id_Client` (`Id_Client`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `reservation`
--

INSERT INTO `reservation` (`Id_Reservation`, `Statut`, `date_`, `Heure`, `nb_resa`, `Id_Circuit`, `Id_Client`) VALUES
(1, 'En cours', '2025-10-17', '16:25:28', 2, 1, 1),
(2, 'Validé', '2025-09-10', '11:08:49', 8, 1, 2),
(3, 'Annulé', '2025-01-29', '07:53:12', 2, 1, 3),
(4, 'En cours', '2025-08-02', '21:15:26', 1, 2, 3),
(5, 'En cours', '2025-10-29', '15:37:25', 3, 2, 4),
(6, 'Validé', '2024-08-16', '06:02:45', 5, 2, 5),
(13, 'En Cours', '2025-11-20', '12:52:09', 4, 1, 5);

-- --------------------------------------------------------

--
-- Structure de la table `ville`
--

DROP TABLE IF EXISTS `ville`;
CREATE TABLE IF NOT EXISTS `ville` (
  `Id_Ville` int NOT NULL AUTO_INCREMENT,
  `Nom` varchar(100) DEFAULT NULL,
  `Id_Pays` int NOT NULL,
  PRIMARY KEY (`Id_Ville`),
  UNIQUE KEY `Nom` (`Nom`),
  KEY `Id_Pays` (`Id_Pays`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `ville`
--

INSERT INTO `ville` (`Id_Ville`, `Nom`, `Id_Pays`) VALUES
(1, 'Rio de Janeiro', 1),
(2, 'Iguaçu', 1),
(3, 'Salvador de Bahia', 1),
(4, 'Manaus', 1),
(5, 'Osaka', 2),
(6, 'Kyoto', 2);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `circuit`
--
ALTER TABLE `circuit`
  ADD CONSTRAINT `circuit_ibfk_1` FOREIGN KEY (`Ville_depart`) REFERENCES `ville` (`Id_Ville`),
  ADD CONSTRAINT `circuit_ibfk_2` FOREIGN KEY (`Ville_arrivee`) REFERENCES `ville` (`Id_Ville`);

--
-- Contraintes pour la table `etape`
--
ALTER TABLE `etape`
  ADD CONSTRAINT `etape_ibfk_1` FOREIGN KEY (`Id_LieuDeVisite`) REFERENCES `lieudevisite` (`Id_LieuDeVisite`),
  ADD CONSTRAINT `etape_ibfk_2` FOREIGN KEY (`Id_Circuit`) REFERENCES `circuit` (`Id_Circuit`);

--
-- Contraintes pour la table `lieudevisite`
--
ALTER TABLE `lieudevisite`
  ADD CONSTRAINT `lieudevisite_ibfk_1` FOREIGN KEY (`Id_Ville`) REFERENCES `ville` (`Id_Ville`);

--
-- Contraintes pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `reservation_ibfk_1` FOREIGN KEY (`Id_Circuit`) REFERENCES `circuit` (`Id_Circuit`),
  ADD CONSTRAINT `reservation_ibfk_2` FOREIGN KEY (`Id_Client`) REFERENCES `client` (`Id_Client`);

--
-- Contraintes pour la table `ville`
--
ALTER TABLE `ville`
  ADD CONSTRAINT `ville_ibfk_1` FOREIGN KEY (`Id_Pays`) REFERENCES `pays` (`Id_Pays`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

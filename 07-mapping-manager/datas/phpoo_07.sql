-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3307
-- Généré le : jeu. 25 mai 2023 à 11:54
-- Version du serveur : 10.6.5-MariaDB
-- Version de PHP : 8.1.0

SET FOREIGN_KEY_CHECKS=0;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Base de données : `phpoo_07`
--
DROP DATABASE IF EXISTS `phpoo_07`;
CREATE DATABASE IF NOT EXISTS `phpoo_07` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `phpoo_07`;

-- --------------------------------------------------------

--
-- Structure de la table `theuser`
--

DROP TABLE IF EXISTS `theuser`;
CREATE TABLE IF NOT EXISTS `theuser` (
    `idTheUser` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
    `loginTheUser` varchar(120) NOT NULL,
    `pwdTheUser` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
    `mailTheUser` varchar(200) NOT NULL,
    PRIMARY KEY (`idTheUser`),
    UNIQUE KEY `loginTheUser` (`loginTheUser`)
    ) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

--
-- Structure de la table `themessage`
--

DROP TABLE IF EXISTS `themessage`;
CREATE TABLE IF NOT EXISTS `themessage` (
    `idTheMessage` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
    `titleTheMessage` varchar(150) NOT NULL,
    `slugTheMessage` varchar(155) NOT NULL,
    `dateTheMessage` datetime NOT NULL DEFAULT current_timestamp(),
    `messageTheMessage` text NOT NULL,
    `TheMessageIdTheUser` int(10) UNSIGNED NOT NULL,
    PRIMARY KEY (`idTheMessage`),
    UNIQUE KEY `slugTheMessage` (`slugTheMessage`),
    KEY `TheMessageIdTheUser` (`TheMessageIdTheUser`)
    ) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;


--
-- Déchargement des données de la table `theuser`
--

INSERT INTO `theuser` (`idTheUser`, `loginTheUser`, `pwdTheUser`, `mailTheUser`) VALUES
                                                                                     (1, 'Lulu', 'LULU', 'lulu@mail.com'),
                                                                                     (2, 'Lala', 'lala', 'lala@mail.com');


--
-- Déchargement des données de la table `themessage`
--

INSERT INTO `themessage` (`idTheMessage`, `titleTheMessage`, `slugTheMessage`, `dateTheMessage`, `messageTheMessage`, `TheMessageIdTheUser`) VALUES
    (1, 'Une fusée pour Mobutu', 'une-fusee-pour-mobutu', '2023-05-25 11:48:24', 'De son envol à son crash, l\'incroyable épopée d\'une jeune entreprise spatiale privée allemande qui fut invitée par le président Mobutu à venir s\'installer au Zaïre.\r\n\r\nDans les années 1970, un jeune ingénieur allemand, Lutz Kayser, ambitionne de concevoir puis de commercialiser une fusée fabriquée en série. Destinée à lancer des satellites, elle serait fabriquée à bas prix et vendue aux pays qui en feraient la demande. Ambitieux et visionnaire, l\'entrepreneur se lance dans l\'aventure en réunissant une équipe de scientifiques et en récoltant des fonds par financement participatif. L\'Otrag, première entreprise spatiale privée au monde, est née. Mais très vite, il apparaît que l\'Allemagne, trop densément peuplée, ne pourra pas accueillir les premiers essais. La solution : un territoire de 100 000 kilomètres carrés au milieu de la jungle du Zaïre (l\'actuelle République démocratique du Congo), mis à disposition par le président Mobutu. Mais en pleine guerre froide, ces expériences exaspèrent les Américains, les Russes et les Européens, ces derniers rejetant toute concurrence au programme Ariane…\r\n\r\nAmbitions haut perchées\r\n\"Une histoire de fous\" : un ancien salarié de l\'Otrag résume ainsi cet épisode rocambolesque de la conquête spatiale. Il fallait une certaine dose d\'insouciance à Lutz Kayser pour braver la pesanteur des consortiums industriels, des autorités scientifiques et politiques de l\'époque, sans parler du défrichage dantesque de ce haut plateau zaïrois inatteignable autrement qu\'en hélicoptère. Du quotidien des chercheurs jusqu\'à la description des défis technologiques et des enjeux géopolitiques, le réalisateur dépeint avec précision, voire délectation, la trajectoire météorique de cette \"start-up\" pas comme les autres. De nombreux témoignages, mais aussi un foisonnant corpus de vidéos tournées par les employés de l\'Otrag donnent corps à cette épopée scientifique, qui s\'est achevée en crise politique.', 1),
(2, 'Les contes des 1001 nuits', 'les-contes-des-1001-nuits', '2023-05-25 11:50:39', 'Une odyssée entre Orient et Occident\r\n\r\n\r\nPeu d’oeuvres de la littérature mondiale peuvent se targuer d’exercer un aussi grand pouvoir de fascination que \"Les contes des mille et une nuits\". \r\n\r\nRetour sur l’histoire du célèbre recueil onirique aux multiples et mystérieuses origines.\r\n\r\nApparus dans l’Inde ancienne au IVe siècle, ces récits oniriques se transmettent oralement jusqu’à la Perse, puis sont traduits et enrichis par des marchands arabes, avant de subir d’autres influences. Premier Européen à traduire le mystérieux recueil, l’orientaliste français Antoine Galland (1646-1715) déclenche un véritable engouement pour ces contes, Les mille et une nuits s’imposant comme le texte le plus lu après la Bible. Le héros Aladdin, en particulier, jouit alors d’une popularité toute particulière qui perdurera. Pourtant, beaucoup ignorent que ni Aladdin ou la lampe merveilleuse ni Sinbad le marin ni Ali Baba et les quarante voleurs ne faisaient partie de la version originale. Des siècles durant, les chercheurs se sont efforcés en vain de retracer l’origine de ces histoires orphelines. La découverte fortuite d’un manuscrit dans la bibliothèque apostolique du Vatican permet cependant d’en retracer en partie la paternité : il s’agit d’extraits des Mémoires du chrétien syrien Hanna Dyâb, né à Alep en 1688, qui en 1709, lors d’un voyage à Paris, avait raconté certains contes à Antoine Galland.', 1);


--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `themessage`
--
ALTER TABLE `themessage`
  ADD CONSTRAINT `themessage_ibfk_1` FOREIGN KEY (`TheMessageIdTheUser`) REFERENCES `theuser` (`idTheUser`);
SET FOREIGN_KEY_CHECKS=1;
COMMIT;

-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 25, 2016 at 03:23 PM
-- Server version: 5.6.25
-- PHP Version: 5.6.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `camtech`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE IF NOT EXISTS `articles` (
  `id_article` int(11) NOT NULL,
  `titreArticle` varchar(45) NOT NULL,
  `description` varchar(45) NOT NULL,
  `contenue` varchar(45) CHARACTER SET utf8 NOT NULL,
  `datePublication` datetime NOT NULL,
  `categories_id_categories` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id_article`, `titreArticle`, `description`, `contenue`, `datePublication`, `categories_id_categories`) VALUES
(1, 'test', 'test', 'test', '2016-04-23 02:15:18', 1),
(2, 'test2', 'desc test2', 'content', '2016-04-25 10:31:21', 1);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id_categories` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `desc` varchar(45) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id_categories`, `name`, `desc`) VALUES
(1, 'test', 'Evaluation de technologies');

-- --------------------------------------------------------

--
-- Table structure for table `commentaire`
--

CREATE TABLE IF NOT EXISTS `commentaire` (
  `id_commentaire` int(11) NOT NULL,
  `commentaire` varchar(45) DEFAULT NULL,
  `article_id_article` int(11) NOT NULL,
  `utilisateur_id_utilisateur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `publicite`
--

CREATE TABLE IF NOT EXISTS `publicite` (
  `id_publicite` int(11) NOT NULL,
  `priorite` smallint(6) NOT NULL,
  `lien` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `utilisateurs`
--

CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `id_utilisateur` int(11) NOT NULL,
  `email_utilisateur` varchar(45) NOT NULL,
  `passe_utilisateur` varchar(32) NOT NULL,
  `photo_utilisateur` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id_article`),
  ADD KEY `fk_articles_categories1` (`categories_id_categories`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id_categories`);

--
-- Indexes for table `commentaire`
--
ALTER TABLE `commentaire`
  ADD PRIMARY KEY (`id_commentaire`),
  ADD KEY `fk_commentaire_articles` (`article_id_article`),
  ADD KEY `fk_commentaire_utilisateur1` (`utilisateur_id_utilisateur`);

--
-- Indexes for table `publicite`
--
ALTER TABLE `publicite`
  ADD PRIMARY KEY (`id_publicite`);

--
-- Indexes for table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`id_utilisateur`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id_article` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id_categories` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id_utilisateur` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `fk_articles_categories1` FOREIGN KEY (`categories_id_categories`) REFERENCES `categories` (`id_categories`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `commentaire`
--
ALTER TABLE `commentaire`
  ADD CONSTRAINT `fk_commentaire_articles` FOREIGN KEY (`article_id_article`) REFERENCES `articles` (`id_article`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_commentaire_utilisateur1` FOREIGN KEY (`utilisateur_id_utilisateur`) REFERENCES `utilisateurs` (`id_utilisateur`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

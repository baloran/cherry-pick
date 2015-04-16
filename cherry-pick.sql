-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Jeu 16 Avril 2015 à 17:23
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `cherry-pick`
--

-- --------------------------------------------------------

--
-- Structure de la table `cast`
--

CREATE TABLE IF NOT EXISTS `cast` (
  `person` varchar(255) NOT NULL,
  `id_trakt` varchar(255) NOT NULL,
  `id_slug` varchar(255) NOT NULL,
  `id_imdb` varchar(100) NOT NULL,
  `id_tmdb` varchar(255) NOT NULL,
  `id_tvrage` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `seasons`
--

CREATE TABLE IF NOT EXISTS `seasons` (
  `id_trakt` varchar(255) NOT NULL,
  `num_season` varchar(255) NOT NULL,
  `viewers` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `shows`
--

CREATE TABLE IF NOT EXISTS `shows` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `score` float NOT NULL,
  `title` varchar(255) NOT NULL,
  `overview` text NOT NULL,
  `year` int(11) NOT NULL,
  `total_episodes` varchar(255) NOT NULL,
  `poster_full` varchar(255) NOT NULL,
  `poster_medium` varchar(255) NOT NULL,
  `fanart_full` varchar(255) NOT NULL,
  `fanart_medium` varchar(255) NOT NULL,
  `id_trakt` varchar(100) NOT NULL,
  `id_slug` varchar(100) NOT NULL,
  `id_tvdb` varchar(100) NOT NULL,
  `id_imdb` varchar(100) NOT NULL,
  `id_tmdb` varchar(100) NOT NULL,
  `id_tvrage` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `shows`
--
-- --------------------------------------------------------

--
-- Structure de la table `show_cast`
--

CREATE TABLE IF NOT EXISTS `show_cast` (
  `character_name` varchar(255) NOT NULL,
  `show_id` varchar(100) NOT NULL,
  `cast_id` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `show_cast`
--

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

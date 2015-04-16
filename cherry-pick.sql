-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le : Mer 15 Avril 2015 à 17:59
-- Version du serveur: 5.5.40
-- Version de PHP: 5.4.36-1+deb.sury.org~precise+2

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `cherry-pick`
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
  `id_tvrage` varchar(100) NOT NULL
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `shows`
--

INSERT INTO `shows` (`id`, `score`, `title`, `overview`, `year`, `poster_full`, `poster_medium`, `fanart_full`, `fanart_medium`, `id_trakt`, `id_slug`, `id_tvdb`, `id_imdb`, `id_tmdb`, `id_tvrage`) VALUES
(1, 77.9489, 'Game of Thrones', 'Seven noble families fight for control of the mythical land of Westeros. Friction between the houses leads to full-scale war. All while a very ancient evil awakens in the farthest north. Amidst the war, a neglected military order of misfits, the Night''s Watch, is all that stands between the realms of men and icy horrors beyond.', 2011, 'https://walter.trakt.us/images/shows/000/001/390/posters/original/e2e8d04f11.jpg', 'https://walter.trakt.us/images/shows/000/001/390/posters/medium/e2e8d04f11.jpg', 'https://walter.trakt.us/images/shows/000/001/390/fanarts/original/39f9936d62.jpg', 'https://walter.trakt.us/images/shows/000/001/390/fanarts/medium/39f9936d62.jpg', '1390', 'game-of-thrones', '121361', 'tt0944947', '1399', '24493'),
(2, 103.83, 'The Mentalist', 'When mentalist Patrick Jane insults a vengeful serial killer, Red John, his loved ones are brutally killed.  Faced with the horrifying consequences of misusing his gift for observation and misdirection, Jane lends his skills to the California Bureau of Investigation, all the while hoping that his connections within the CBI will give him the opportunity to track down and revenge himself upon Red John.', 2008, 'https://walter.trakt.us/images/shows/000/005/882/posters/original/101e2b8ddb.jpg', 'https://walter.trakt.us/images/shows/000/005/882/posters/medium/101e2b8ddb.jpg', 'https://walter.trakt.us/images/shows/000/005/882/fanarts/original/0664bb2784.jpg', 'https://walter.trakt.us/images/shows/000/005/882/fanarts/medium/0664bb2784.jpg', '5882', 'the-mentalist', '82459', 'tt1196946', '5920', '18967');

-- --------------------------------------------------------

--
-- Structure de la table `show_cast`
--

CREATE TABLE IF NOT EXISTS `show_cast` (
  `character_name` varchar(255) NOT NULL,
  `show_id` varchar(100) NOT NULL,
  `cast_id` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

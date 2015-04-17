-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Ven 17 Avril 2015 à 12:36
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
  `id_tmdb` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `id_trakt` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `cast`
--

INSERT INTO `cast` (`person`, `id_tmdb`, `image`, `id_trakt`) VALUES
('Claire Danes', '6194', '/mIwLwf04pjpLjV01FUrpPtqiocn.jpg', '1398'),
('Mandy Patinkin', '25503', '/aiHwNtaKkUFd9kZ81wGhMANMKWC.jpg', '1398');

-- --------------------------------------------------------

--
-- Structure de la table `seasons`
--

CREATE TABLE IF NOT EXISTS `seasons` (
  `id_trakt` varchar(255) NOT NULL,
  `num_season` varchar(255) NOT NULL,
  `viewers` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `seasons`
--

INSERT INTO `seasons` (`id_trakt`, `num_season`, `viewers`) VALUES
('1398', '1', '72681'),
('1398', '2', '63810'),
('1398', '3', '54407'),
('1398', '4', '37073');

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
  `genres` varchar(255) NOT NULL,
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
  `rotten_rate` varchar(255) NOT NULL,
  `imdb_rate` varchar(255) NOT NULL,
  `tmdb_rate` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `shows`
--

INSERT INTO `shows` (`id`, `score`, `title`, `overview`, `year`, `total_episodes`, `genres`, `poster_full`, `poster_medium`, `fanart_full`, `fanart_medium`, `id_trakt`, `id_slug`, `id_tvdb`, `id_imdb`, `id_tmdb`, `id_tvrage`, `rotten_rate`, `imdb_rate`, `tmdb_rate`) VALUES
(1, 115.566, 'Homeland', 'While in Iraq, Carrie Mathison, a Central Intelligence Agency operations officer, had been warned by an asset that an American prisoner of war had been turned by al-Qaeda. After conducting an unauthorized operation in Iraq, Carrie is put on probation and reassigned to the CIA''s Counter-terrorism Center in Langley, Virginia.', 2011, '48', 'drama, mystery, thriller', 'https://walter.trakt.us/images/shows/000/001/398/posters/original/c16513fcf1.jpg', 'https://walter.trakt.us/images/shows/000/001/398/posters/medium/c16513fcf1.jpg', 'https://walter.trakt.us/images/shows/000/001/398/fanarts/original/701b0475bf.jpg', 'https://walter.trakt.us/images/shows/000/001/398/fanarts/medium/701b0475bf.jpg', '1398', 'homeland', '247897', 'tt1796960', '1407', '27811', '82 ', '', '8.1');

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

INSERT INTO `show_cast` (`character_name`, `show_id`, `cast_id`) VALUES
('Carrie Mathison', '1398', '6194'),
('Saul Berenson', '1398', '25503');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

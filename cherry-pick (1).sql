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

--
-- Contenu de la table `cast`
--

INSERT INTO `cast` (`person`, `id_trakt`, `id_slug`, `id_imdb`, `id_tmdb`, `id_tvrage`) VALUES
('Andrew Lincoln', '413156', 'andrew-lincoln', 'nm0511088', '7062', '61194'),
('Chandler Riggs', '436896', 'chandler-riggs', 'nm3385128', '215056', ''),
('Steven Yeun', '436936', 'steven-yeun', 'nm3081796', '215055', ''),
('Danai Gurira', '428014', 'danai-gurira', 'nm1775091', '82104', ''),
('Lawrence Gilliard Jr.', '296023', 'lawrence-gilliard-jr', 'nm0319142', '37947', ''),
('Norman Reedus', '5158', 'norman-reedus', 'nm0005342', '4886', '26542'),
('Lauren Cohan', '423965', 'lauren-cohan', 'nm1659348', '62220', '189339'),
('Melissa McBride', '418547', 'melissa-mcbride', 'nm0564350', '31535', '207318'),
('Sonequa Martin-Green', '436943', 'sonequa-martin-green', 'nm2792296', '1031067', '236800'),
('Emily Kinney', '434801', 'emily-kinney', 'nm2782162', '1223878', ''),
('Alanna Masterson', '436944', 'alanna-masterson', 'nm1315153', '204031', ''),
('Chad L. Coleman', '436946', 'chad-l-coleman-2f5162a4-c269-494d-9e8c-a2477751ca6a', 'nm0170968', '124645', '33500'),
('Michael Cudlitz', '421522', 'michael-cudlitz', 'nm0191044', '52415', '1194'),
('Christian Serratos', '423006', 'christian-serratos', 'nm1589312', '84224', '35837'),
('Seth Gilliam', '413361', 'seth-gilliam', 'nm0319121', '41688', '33238'),
('Josh McDermitt', '407654', 'josh-mcdermitt', 'nm3129311', '1252310', '328542');

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

INSERT INTO `shows` (`id`, `score`, `title`, `overview`, `year`, `total_episodes`, `poster_full`, `poster_medium`, `fanart_full`, `fanart_medium`, `id_trakt`, `id_slug`, `id_tvdb`, `id_imdb`, `id_tmdb`, `id_tvrage`) VALUES
(1, 78.2486, 'Game of Thrones', 'Seven noble families fight for control of the mythical land of Westeros. Friction between the houses leads to full-scale war. All while a very ancient evil awakens in the farthest north. Amidst the war, a neglected military order of misfits, the Night''s Watch, is all that stands between the realms of men and icy horrors beyond.', 2011, '41', 'https://walter.trakt.us/images/shows/000/001/390/posters/original/e2e8d04f11.jpg', 'https://walter.trakt.us/images/shows/000/001/390/posters/medium/e2e8d04f11.jpg', 'https://walter.trakt.us/images/shows/000/001/390/fanarts/original/39f9936d62.jpg', 'https://walter.trakt.us/images/shows/000/001/390/fanarts/medium/39f9936d62.jpg', '1390', 'game-of-thrones', '121361', 'tt0944947', '1399', '24493');

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
('Rick Grimes', '1393', '413156'),
('Carl Grimes', '1393', '436896'),
('Glenn', '1393', '436936'),
('Michonne', '1393', '428014'),
('Bob Stookey', '1393', '296023'),
('Daryl Dixon', '1393', '5158'),
('Maggie Greene', '1393', '423965'),
('Carol Peletier', '1393', '418547'),
('Sasha', '1393', '436943'),
('Beth Greene', '1393', '434801'),
('Tara', '1393', '436944'),
('Tyreese', '1393', '436946'),
('Abraham', '1393', '421522'),
('Rosita', '1393', '423006'),
('Father Gabriel', '1393', '413361'),
('Eugene Porter', '1393', '407654');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

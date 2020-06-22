-- phpMyAdmin SQL Dump
-- version 4.4.15.9
-- https://www.phpmyadmin.net
--
-- Host: localhost
-- Gegenereerd op: 22 jun 2020 om 08:56
-- Serverversie: 5.6.37
-- PHP-versie: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `php-todo`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `lists`
--

CREATE TABLE IF NOT EXISTS `lists` (
  `id` int(123) NOT NULL,
  `name` varchar(123) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `lists`
--

INSERT INTO `lists` (`id`, `name`) VALUES
(15, 'to-do'),
(16, 'bezig'),
(17, 'nicky'),
(20, 'ed');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `todo-items`
--

CREATE TABLE IF NOT EXISTS `todo-items` (
  `id` int(123) NOT NULL,
  `title` varchar(123) NOT NULL,
  `description` varchar(123) NOT NULL,
  `user` varchar(123) NOT NULL,
  `duur` int(123) NOT NULL,
  `list` int(123) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `todo-items`
--

INSERT INTO `todo-items` (`id`, `title`, `description`, `user`, `duur`, `list`) VALUES
(6, 'test 123', 'ewd', 'wef', 12, 16),
(7, 'test 123', 'ed', 'ed', 123, 17),
(8, 'test 2', 'ede', 'ed', 1, 15),
(9, 'test 1238r43tguyfhyetfh', 'edw', 'ewd', 15, 16),
(10, 'update getest', 'ed', 'piet', 123, 17);

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `lists`
--
ALTER TABLE `lists`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `todo-items`
--
ALTER TABLE `todo-items`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `lists`
--
ALTER TABLE `lists`
  MODIFY `id` int(123) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT voor een tabel `todo-items`
--
ALTER TABLE `todo-items`
  MODIFY `id` int(123) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

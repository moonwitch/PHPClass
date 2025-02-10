-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Serverversie: 10.4.32-MariaDB
-- PHP-versie: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `music_library`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `artists`
--
CREATE DATABASE IF NOT EXISTS `music_library`;
USE `music_library`;

CREATE TABLE `artists` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `artists`
--

INSERT INTO `artists` (`id`, `name`) VALUES
(1, 'Scorpions'),
(2, 'Adele'),
(3, 'ABBA'),
(4, 'Queen'),
(5, 'Falco'),
(6, 'U2'),
(7, 'Stevie Wonder'),
(8, 'Sabaton'),
(9, 'Mariah Carey'),
(10, 'Rammstein'),
(11, 'The Who'),
(12, 'Coldplay'),
(13, 'Katy Perry'),
(14, 'Red Hot Chili Peppers'),
(15, 'Bruce Springsteen'),
(16, 'The Weeknd'),
(17, 'Rihanna'),
(18, 'Bouwdewijn de Groot'),
(19, 'The beatles'),
(20, 'Eminem'),
(21, 'AC/DC');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `genres`
--

CREATE TABLE `genres` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `genres`
--

INSERT INTO `genres` (`id`, `name`) VALUES
(1, 'Pop'),
(2, 'Rock'),
(3, 'Chanson'),
(4, 'Punk Rock'),
(5, 'Blues'),
(6, 'Country'),
(7, 'Hip Hop'),
(8, 'Classical'),
(9, 'Funk'),
(10, 'Heavy Metal'),
(11, 'Soul'),
(12, 'Electro'),
(13, 'Hip Hop'),
(14, 'Industrial');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `songs`
--

CREATE TABLE `songs` (
  `id` int(11) NOT NULL,
  `title` varchar(45) NOT NULL,
  `artist_id` int(11) NOT NULL,
  `genre_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `songs`
--

INSERT INTO `songs` (`id`, `title`, `artist_id`, `genre_id`) VALUES
(1, 'Hey Jude', 19, 1),
(2, 'Viva la vida', 12, 1),
(3, 'No one like you', 1, 2),
(4, 'Beautiful day', 6, 2),
(5, 'Waterloo', 3, 1),
(6, 'Highway to hell', 21, 2),
(7, 'Without me', 20, 13),
(8, 'The show must go on', 4, 2),
(9, 'Thunderstruck', 21, 2),
(10, 'Primo Victoria', 8, 10),
(11, 'Avond', 18, 3),
(12, 'Isn\'t she lovely', 7, 5),
(13, 'Wind of change', 1, 2),
(14, 'Behind blue eyes', 11, 2),
(15, 'Radio ga ga', 4, 2),
(16, 'We will rock you', 4, 2),
(17, 'Sonne', 10, 14),
(18, 'A lifetime of war', 8, 10);

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `artists`
--
ALTER TABLE `artists`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `genres`
--
ALTER TABLE `genres`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `songs`
--
ALTER TABLE `songs`
  ADD PRIMARY KEY (`id`,`artist_id`,`genre_id`),
  ADD KEY `fk_songs_artists1` (`artist_id`),
  ADD KEY `fk_songs_genres1` (`genre_id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `artists`
--
ALTER TABLE `artists`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT voor een tabel `genres`
--
ALTER TABLE `genres`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT voor een tabel `songs`
--
ALTER TABLE `songs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `songs`
--
ALTER TABLE `songs`
  ADD CONSTRAINT `fk_songs_artists1` FOREIGN KEY (`artist_id`) REFERENCES `artists` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_songs_genres1` FOREIGN KEY (`genre_id`) REFERENCES `genres` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

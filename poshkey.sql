-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 23 mei 2018 om 10:00
-- Serverversie: 10.1.31-MariaDB
-- PHP-versie: 7.1.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `poshkey`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `producten`
--

CREATE TABLE `producten` (
  `id` tinyint(1) NOT NULL,
  `naam` varchar(30) NOT NULL,
  `beschrijving` longtext NOT NULL,
  `prijs` double NOT NULL,
  `afb` varchar(50) NOT NULL DEFAULT 'geen.png'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `producten`
--

INSERT INTO `producten` (`id`, `naam`, `beschrijving`, `prijs`, `afb`) VALUES
(1, 'Aardbei x Sinaasappel', 'De combinatie van aardbei en sinaasappel geeft een vertrouwde maar ook pittige smaak mee, perfect voor een avondje uit.', 4.3, 'flespink_small.png'),
(2, 'Mango x Banaan', 'De combinatie van mango en banaan geeft een tropische maar ook zachte smaak mee, perfect voor op een (buiten) terrasje.', 4.1, 'flesyello_small.png'),
(3, 'Appel x Kiwi', 'De combinatie van appel en groene kiwi geeft een zoete maar ook verfrissende smaak mee, perfect voor een hete zomeravond.', 4.2, 'flesgreen_small.png');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `naam` tinytext NOT NULL,
  `email` tinytext NOT NULL,
  `nieuwsbrief` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `producten`
--
ALTER TABLE `producten`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `producten`
--
ALTER TABLE `producten`
  MODIFY `id` tinyint(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT voor een tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

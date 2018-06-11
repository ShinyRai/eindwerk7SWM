-- phpMyAdmin SQL Dump
-- version 4.0.10.20
-- https://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 11, 2018 at 12:11 PM
-- Server version: 5.5.29-0ubuntu0.12.04.1
-- PHP Version: 5.3.10-1ubuntu3.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `vanneveln`
--

-- --------------------------------------------------------

--
-- Table structure for table `gip_newsletter`
--

CREATE TABLE IF NOT EXISTS `gip_newsletter` (
  `userid` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(32) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `isactive` tinyint(1) DEFAULT NULL,
  `newsletter` tinyint(1) DEFAULT NULL,
  `date` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `gip_newsletter`
--

INSERT INTO `gip_newsletter` (`userid`, `username`, `password`, `email`, `isactive`, `newsletter`, `date`) VALUES
(2, 'aeaeae', 'd79096188b670c2f81b7001f73801117', 'aeaezae@ezr.ae', NULL, NULL, NULL),
(3, 'vanneveln', 'f7bf567c491a8c54d75b03bc0dcf884c', 'vanneveln@visocloud.org', NULL, NULL, NULL),
(4, 'vanneveln', 'f7bf567c491a8c54d75b03bc0dcf884c', 'vanneveln@visocloud.org', NULL, NULL, NULL),
(5, 'vanneveln', 'f7bf567c491a8c54d75b03bc0dcf884c', 'vanneveln@visocloud.org', NULL, NULL, NULL),
(6, 'vanneveln', 'f7bf567c491a8c54d75b03bc0dcf884c', 'vanneveln@visocloud.org', NULL, NULL, NULL),
(7, 'vanneveln', 'f7bf567c491a8c54d75b03bc0dcf884c', 'vanneveln@visocloud.org', NULL, NULL, NULL),
(8, 'vanneveln', 'f7bf567c491a8c54d75b03bc0dcf884c', 'vanneveln@visocloud.org', NULL, NULL, NULL),
(9, 'vanneveln', 'f7bf567c491a8c54d75b03bc0dcf884c', 'vanneveln@visocloud.org', NULL, NULL, NULL),
(10, 'vanneveln', 'f7bf567c491a8c54d75b03bc0dcf884c', 'vanneveln@visocloud.org', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `producten`
--

CREATE TABLE IF NOT EXISTS `producten` (
  `id` tinyint(1) NOT NULL AUTO_INCREMENT,
  `naam` varchar(30) NOT NULL,
  `beschrijving` longtext NOT NULL,
  `prijs` double NOT NULL,
  `afb` varchar(50) NOT NULL DEFAULT 'geen.png',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `producten`
--

INSERT INTO `producten` (`id`, `naam`, `beschrijving`, `prijs`, `afb`) VALUES
(1, 'Aardbei x Sinaasappel', 'De combinatie van aardbei en sinaasappel geeft een vertrouwde maar ook pittige smaak mee, perfect voor een avondje uit.', 4.3, 'flespink_small.png'),
(2, 'Mango x Banaan', 'De combinatie van mango en banaan geeft een tropische maar ook zachte smaak mee, perfect voor op een (buiten) terrasje.', 4.1, 'flesyello_small.png'),
(3, 'Appel x Kiwi', 'De combinatie van appel en groene kiwi geeft een zoete maar ook verfrissende smaak mee, perfect voor een hete zomeravond.', 4.2, 'flesgreen_small.png');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `voornaam` tinytext NOT NULL,
  `achternaam` tinytext NOT NULL,
  `email` tinytext NOT NULL,
  `nieuwsbrief` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `voornaam`, `achternaam`, `email`, `nieuwsbrief`) VALUES
(2, 'jas', 'bar', 'nelevannevel8@gmail.com', 1),
(4, 'nele', 'van nevel', 'vanneveln@visocloud.org', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

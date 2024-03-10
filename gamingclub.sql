-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 10, 2024 at 06:38 PM
-- Server version: 8.2.0
-- PHP Version: 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gamingclub`
--
CREATE DATABASE IF NOT EXISTS `gamingclub` ;
USE `gamingclub`;

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

DROP TABLE IF EXISTS `login`;
CREATE TABLE IF NOT EXISTS `login` (
  `id_login` int NOT NULL AUTO_INCREMENT,
  `username` varchar(30) DEFAULT NULL,
  `pass` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id_login`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id_login`, `username`, `pass`) VALUES
(1, 'test', '0'),
(2, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `login_admin`
--

DROP TABLE IF EXISTS `login_admin`;
CREATE TABLE IF NOT EXISTS `login_admin` (
  `id_login_admin` int NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `pass` varchar(30) NOT NULL,
  PRIMARY KEY (`id_login_admin`),
  UNIQUE KEY `id_login_admin` (`id_login_admin`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `login_admin`
--

INSERT INTO `login_admin` (`id_login_admin`, `username`, `pass`) VALUES
(1, 'test', 'test'),
(2, 'admin', 'password');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

DROP TABLE IF EXISTS `news`;
CREATE TABLE IF NOT EXISTS `news` (
  `id_news` int NOT NULL AUTO_INCREMENT,
  `news_title` varchar(255) NOT NULL,
  `news_body` varchar(600) DEFAULT NULL,
  `news_date` date DEFAULT NULL,
  PRIMARY KEY (`id_news`),
  UNIQUE KEY `id_news` (`id_news`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id_news`, `news_title`, `news_body`, `news_date`) VALUES
(5, 'Official Game Developers and Publishers', 'Follow official social media accounts of game developers and publishers. They often share the latest news, updates, and announcements related to their games', '2024-03-09'),
(13, 'Upcoming DLC Details Revealed', 'Developers have unveiled details about the upcoming downloadable content for a popular game, introducing new characters and storylines.', '2024-03-06'),
(12, 'Gaming Industry Trends', 'Experts predict that virtual reality and augmented reality will continue to shape the future of the gaming industry.', '2024-03-07'),
(11, 'Esports Championship Results', 'Team XYZ emerged victorious in the latest esports championship, showcasing their skills and strategies.', '2024-03-08'),
(10, 'Exciting Game Announcement', 'A highly anticipated game has just been announced, promising thrilling gameplay and stunning graphics.', '2024-03-09');

-- --------------------------------------------------------

--
-- Table structure for table `tournament_img`
--

DROP TABLE IF EXISTS `tournament_img`;
CREATE TABLE IF NOT EXISTS `tournament_img` (
  `id_tournament` int NOT NULL AUTO_INCREMENT,
  `card_title` varchar(255) NOT NULL,
  `card_text` varchar(600) DEFAULT NULL,
  `link` text,
  `img_name` varchar(100) DEFAULT NULL,
  `img_path` text,
  PRIMARY KEY (`id_tournament`),
  UNIQUE KEY `id_tournament` (`id_tournament`),
  UNIQUE KEY `img_name` (`img_name`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tournament_img`
--

INSERT INTO `tournament_img` (`id_tournament`, `card_title`, `card_text`, `link`, `img_name`, `img_path`) VALUES
(16, 'Persona 5 Roya', 'Persona 5 Royal is an enhanced JRPG experience with captivating storytelling, new characters, and stylish turn-based combat.', 'https://www.google.com/search?q=persona+5+royal+4x4&tbm=isch&ved=2ahUKEwiCof-gxOiEAxUduCcCHcsqCn4Q2-cCegQIABAA&oq=persona+5+royal+4x4&gs_lp=EgNpbWciE3BlcnNvbmEgNSByb3lhbCA0eDRIpRBQhgRY-A1wAHgAkAEAmAGOAaAB9ASqAQMwLjW4AQPIAQD4AQGKAgtnd3Mtd2l6LWltZ8ICBRAAGIAEwgIGEAAYCBgewgIHEAAYgAQYGIgGAQ&sclient=img&ei=dQvtZcKSN53wnsEPy9Wo8Ac&bih=641&biw=1366#imgrc=JarVQTKhP9n8kM', 'person5.jpg', './img/upload/person5.jpg'),
(17, 'Devil May Cry 3: Dante\'s Awakening', 'Devil May Cry 3 is an action-packed hack-and-slash video game developed by Capcom, known for its intense combat, stylish combos, and the origin story of the iconic protagonist, Dante.', 'https://www.letras.com/persona-4/1581951/', 'Devil_May_Cry_3_boxshot.jpg', './img/upload/Devil_May_Cry_3_boxshot.jpg'),
(18, 'GTA VI', 'Grand Theft Auto VI is an upcoming action-adventure game in development by Rockstar Games. It is due to be the eighth main Grand Theft Auto game', 'https://www.php.net/manual/en/features.file-upload.post-method.php', 'Grand_Theft_Auto_VI.png', './img/upload/Grand_Theft_Auto_VI.png');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id_user` int NOT NULL AUTO_INCREMENT,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `pass` varchar(30) NOT NULL,
  `id_login` int NOT NULL,
  PRIMARY KEY (`id_user`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `id_login` (`id_login`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

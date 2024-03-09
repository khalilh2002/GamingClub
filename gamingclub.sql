-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 09, 2024 at 09:02 PM
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
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id_news`, `news_title`, `news_body`, `news_date`) VALUES
(1, 'alpha', 'gama', NULL),
(2, 'didi', 'dexter', '2024-03-08'),
(3, 'gigi', 'ahmed', '2025-04-08'),
(4, 'title news', 'good chronichal', '2024-03-08');

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
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tournament_img`
--

INSERT INTO `tournament_img` (`id_tournament`, `card_title`, `card_text`, `link`, `img_name`, `img_path`) VALUES
(15, 'firren', 'sqdsqsqsq', 'https://www.php.net/manual/en/features.file-upload.post-method.php', 'g.jpg', './img/upload/g.jpg'),
(5, 'FC24', 'football', 'https://www.php.net/manual/en/features.file-upload.post-method.php', 'FC24.jpg', './img/upload/FC24.jpg'),
(13, 'football', 'fgjhfjfjg', 'https://www.php.net/manual/en/features.file-upload.post-method.php', '71GZ3ZzH8PL._AC_UF1000,1000_QL80_.jpg', './img/upload/71GZ3ZzH8PL._AC_UF1000,1000_QL80_.jpg'),
(12, 'Persona 5', 'kjhvhv gv g', 'https://www.php.net/manual/en/features.file-upload.post-method.php', 'j.webp', './img/upload/j.webp'),
(11, 'Persona 4 Golden', 'Tell me why you did it Every dream falling apart\r\nTell me why you did it After the promise\r\nStill aching still aching Oh baby I need your love\r\nLooking so different Glaring street light\r\n\r\nHeartbeat Heartbeat It keeps on pounding\r\nHeartbeat Heartbreak You tell me goodbye\r\nHeartbeat Heartbeat It keeps on pounding\r\nHeartbeat Heartbreak You tell me goodbye', 'https://www.letras.com/persona-4/1581951/', 'cover.jpg', './img/upload/cover.jpg');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

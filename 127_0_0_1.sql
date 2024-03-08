-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 08, 2024 at 05:52 PM
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
CREATE DATABASE IF NOT EXISTS `gamingclub` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `gamingclub`;

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
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tournament_img`
--

INSERT INTO `tournament_img` (`id_tournament`, `card_title`, `card_text`, `link`, `img_name`, `img_path`) VALUES
(3, 'volorant', 'first test 2', 'https://www.php.net/manual/en/features.file-upload.post-method.php', 'valorant.png', './img/upload/valorant.png'),
(2, 'volorant', 'first test', 'https://www.php.net/manual/en/features.file-upload.post-method.php', 'fortnite.png', './img/upload/fortnite.png'),
(4, 'rocket league', 'first test 3', 'https://www.php.net/manual/en/features.file-upload.post-method.php', 'rocket.jfif', './img/upload/rocket.jfif'),
(5, 'FC24', 'football', 'https://www.php.net/manual/en/features.file-upload.post-method.php', 'FC24.jpg', './img/upload/FC24.jpg'),
(6, 'conter strike', 'gale mmmmmmmmmmm', 'https://www.php.net/manual/en/features.file-upload.post-method.php', 'csgo.png', './img/upload/csgo.png'),
(7, 'frieren', 'anime', 'https://www.php.net/manual/en/features.file-upload.post-method.php', 'g.jpg', './img/upload/g.jpg'),
(8, 'abdsamad', 'hdhzadkhqsdhkjsqd', 'https://www.php.net/manual/en/features.file-upload.post-method.php', 'LOL.jfif', './img/upload/LOL.jfif');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 19, 2024 at 02:00 PM
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
  `username` varchar(30) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `pass` varchar(20) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `super_user` tinyint(1) DEFAULT '0',
  `first_time` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id_login`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id_login`, `username`, `pass`, `super_user`, `first_time`) VALUES
(1, 'test', '0', 1, 0),
(2, 'admin', 'admin', 1, 0),
(3, 'user3', '00', 1, 0),
(6, 'user6', 'password6', 1, 1),
(7, 'user7', 'password7', 0, 1),
(8, 'user8', 'password8', 0, 1),
(9, 'user9', 'password9', 0, 1),
(10, 'user10', 'password10', 0, 1),
(11, 'user11', 'password11', 0, 1),
(12, 'user12', 'password12', 0, 1),
(13, 'user13', 'password13', 1, 1),
(15, 'user15', 'password15', 0, 1),
(16, 'user16', 'password16', 0, 1),
(17, 'user17', 'password17', 0, 1),
(18, 'user18', 'password18', 0, 1),
(19, 'user19', 'password19', 0, 1),
(20, 'user20', 'password20', 0, 1),
(21, 'user21', 'password21', 0, 1),
(22, 'user22', 'password22', 0, 1),
(23, 'user23', 'password23', 0, 1),
(24, 'user24', 'password24', 0, 1),
(25, 'user25', 'password25', 0, 1),
(26, 'user26', 'password26', 0, 1),
(27, 'user27', 'password27', 0, 1),
(28, 'user28', 'password28', 0, 1),
(29, 'user29', 'password29', 0, 1),
(30, 'user30', 'password30', 0, 1),
(32, 'khalil', '456', 1, 1),
(33, 'khalil2002', 'pass', 0, 1),
(34, 'testmoh', '123', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `login_admin`
--

DROP TABLE IF EXISTS `login_admin`;
CREATE TABLE IF NOT EXISTS `login_admin` (
  `id_login_admin` int NOT NULL AUTO_INCREMENT,
  `username` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `pass` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id_login_admin`),
  UNIQUE KEY `id_login_admin` (`id_login_admin`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login_admin`
--

INSERT INTO `login_admin` (`id_login_admin`, `username`, `pass`) VALUES
(3, 'test', '123'),
(2, 'admin', 'bimo'),
(4, 'user3', '123'),
(5, 'user4', '456');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

DROP TABLE IF EXISTS `news`;
CREATE TABLE IF NOT EXISTS `news` (
  `id_news` int NOT NULL AUTO_INCREMENT,
  `news_title` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `news_body` varchar(600) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `news_date` date DEFAULT NULL,
  PRIMARY KEY (`id_news`),
  UNIQUE KEY `id_news` (`id_news`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `card_title` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `card_text` varchar(600) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `link` text COLLATE utf8mb4_general_ci,
  `img_name` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `img_path` text COLLATE utf8mb4_general_ci,
  PRIMARY KEY (`id_tournament`),
  UNIQUE KEY `id_tournament` (`id_tournament`),
  UNIQUE KEY `img_name` (`img_name`)
) ENGINE=MyISAM AUTO_INCREMENT=45 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tournament_img`
--

INSERT INTO `tournament_img` (`id_tournament`, `card_title`, `card_text`, `link`, `img_name`, `img_path`) VALUES
(20, 'Persona 4 Golden', 'Persona 4 Golden is part detective novel, part teenage simulation and part asian RPG', 'https://youtu.be/7H5pYCw4ET4', 'MV5BZDRmMDVmMjktN2Q5ZC00YTZmLWEzZjctN2RhNzc1YTBhOGQyXkEyXkFqcGdeQXVyMTk2OTAzNTI@._V1_.jpg', './img/upload/MV5BZDRmMDVmMjktN2Q5ZC00YTZmLWEzZjctN2RhNzc1YTBhOGQyXkEyXkFqcGdeQXVyMTk2OTAzNTI@._V1_.jpg'),
(21, 'cyberpunk 2077 phantom liberty', 'Cyberpunk 2077: Phantom Liberty is an action role-playing video game developed by CD Projekt RED. An expansion pack for Cyberpunk 2077,', 'https://youtu.be/7H5pYCw4ET4', 'Cyberpunk_2077_Phantom_Liberty_cover_art.jpg', './img/upload/Cyberpunk_2077_Phantom_Liberty_cover_art.jpg'),
(22, 'Mario Kart 8 Deluxe', ' is an expanded version of the Wii U racing game, Mario Kart 8', 'https://youtu.be/7H5pYCw4ET4', 'MV5BNjFmODJlMDItNTRjYi00NjYxLWI3YjgtMTE5Yjg4Y2U4MDFhXkEyXkFqcGdeQXVyMTA0MTM5NjI2._V1_.jpg', './img/upload/MV5BNjFmODJlMDItNTRjYi00NjYxLWI3YjgtMTE5Yjg4Y2U4MDFhXkEyXkFqcGdeQXVyMTA0MTM5NjI2._V1_.jpg'),
(18, 'GTA VI', 'Grand Theft Auto VI is an upcoming action-adventure game in development by Rockstar Games. It is due to be the eighth main Grand Theft Auto game', 'https://www.php.net/manual/en/features.file-upload.post-method.php', 'Grand_Theft_Auto_VI.png', './img/upload/Grand_Theft_Auto_VI.png'),
(23, 'Apex Legends', 'Apex Legends is a free-to-play battle royale-hero shooter game developed by Respawn Entertainment and published by Electronic Arts', 'https://youtu.be/7H5pYCw4ET4', 'Apex_legends_cover.jpg', './img/upload/Apex_legends_cover.jpg'),
(24, 'League of Legends', ', commonly referred to as League, is a 2009 multiplayer online battle arena video game developed and published by Riot Games', 'https://youtu.be/7H5pYCw4ET4', 'EGS_LeagueofLegends_RiotGames_S2_1200x1600-905a96cea329205358868f5871393042.jpeg', './img/upload/EGS_LeagueofLegends_RiotGames_S2_1200x1600-905a96cea329205358868f5871393042.jpeg'),
(25, 'Volorant', 'Valorant is a free-to-play first-person tactical hero shooter developed and published by Riot Games, for Windows. Teased under the codename Project A in October 2019', 'https://youtu.be/7H5pYCw4ET4', 'MV5BODhkN2U1YzYtODQzZC00MTc5LTlmMmYtYjQ2ZGU2ZmM4YzJkXkEyXkFqcGdeQXVyMTE0MTc4MjU2._V1_FMjpg_UX1000_.j', './img/upload/MV5BODhkN2U1YzYtODQzZC00MTc5LTlmMmYtYjQ2ZGU2ZmM4YzJkXkEyXkFqcGdeQXVyMTE0MTc4MjU2._V1_FMjpg_UX1000_.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id_user` int NOT NULL AUTO_INCREMENT,
  `first_name` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `last_name` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `id_login` int NOT NULL,
  `profile_picture` varchar(512) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`id_user`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `id_login` (`id_login`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `first_name`, `last_name`, `email`, `id_login`, `profile_picture`) VALUES
(1, 'El Mahdi', 'Id Lahcen', 'mehdiidlehcen123@gmail.com', 1, '/profile_pictures/YmxSwavX_200x200.png'),
(6, 'Jessica', 'Martinez', 'jessica.martinez@example.com', 6, 'profile_pics/jessicamartinez.jpg'),
(7, 'Christopher', 'Lee', 'christopher.lee@example.com', 7, 'profile_pics/christopherlee.jpg'),
(8, 'Ava', 'Garcia', 'ava.garcia@example.com', 8, 'profile_pics/avagarcia.jpg'),
(9, 'Matthew', 'Lopez', 'matthew.lopez@example.com', 9, 'profile_pics/matthewlopez.jpg'),
(10, 'Olivia', 'Gonzalez', 'olivia.gonzalez@example.com', 10, 'profile_pics/oliviagonzalez.jpg'),
(11, 'Daniel', 'Rodriguez', 'daniel.rodriguez@example.com', 11, 'profile_pics/danielrodriguez.jpg'),
(12, 'Sophia', 'Wilson', 'sophia.wilson@example.com', 12, 'profile_pics/sophiawilson.jpg'),
(13, 'David', 'Anderson', 'david.anderson@example.com', 13, 'profile_pics/davidanderson.jpg'),
(15, 'James', 'Thomas', 'james.thomas@example.com', 15, 'profile_pics/jamesthomas.jpg'),
(16, 'Charlotte', 'Hernandez', 'charlotte.hernandez@example.com', 16, 'profile_pics/charlottehernandez.jpg'),
(17, 'Logan', 'Moore', 'logan.moore@example.com', 17, 'profile_pics/loganmoore.jpg'),
(18, 'Amelia', 'Martin', 'amelia.martin@example.com', 18, 'profile_pics/ameliacmartin.jpg'),
(19, 'Benjamin', 'Jackson', 'benjamin.jackson@example.com', 19, 'profile_pics/benjaminjackson.jpg'),
(20, 'Mia', 'Thompson', 'mia.thompson@example.com', 20, 'profile_pics/miathompson.jpg'),
(22, 'El Houssine', 'KHALIL', 'khalil.hessein@gmail.com', 32, '/profile_pictures/images.jpeg'),
(23, 'khalil ', 'el houssine', 'khalil.houssein2002@gmail.com', 33, NULL),
(2, 'admin', 'houssine', 'spamfake2022@gmail.com', 2, NULL),
(24, 'mohamed', 'moad', 'mouadrguibi900@gmail.com', 34, '/profile_pictures/download.jpeg');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

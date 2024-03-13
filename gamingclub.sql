-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 13, 2024 at 08:34 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

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

CREATE TABLE `login` (
  `id_login` int(11) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `pass` varchar(20) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id_login`, `username`, `pass`) VALUES
(1, 'test', '0'),
(2, 'admin', 'admin'),
(3, 'goala', 'black123');

-- --------------------------------------------------------

--
-- Table structure for table `login_admin`
--

CREATE TABLE `login_admin` (
  `id_login_admin` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `pass` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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

CREATE TABLE `news` (
  `id_news` int(11) NOT NULL,
  `news_title` varchar(255) NOT NULL,
  `news_body` varchar(600) DEFAULT NULL,
  `news_date` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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

CREATE TABLE `tournament_img` (
  `id_tournament` int(11) NOT NULL,
  `card_title` varchar(255) NOT NULL,
  `card_text` varchar(600) DEFAULT NULL,
  `link` text DEFAULT NULL,
  `img_name` varchar(100) DEFAULT NULL,
  `img_path` text DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tournament_img`
--

INSERT INTO `tournament_img` (`id_tournament`, `card_title`, `card_text`, `link`, `img_name`, `img_path`) VALUES
(16, 'Persona 5 Roya', 'Persona 5 Royal is an enhanced JRPG experience with captivating storytelling, new characters, and stylish turn-based combat.', 'https://www.google.com/search?q=persona+5+royal+4x4&tbm=isch&ved=2ahUKEwiCof-gxOiEAxUduCcCHcsqCn4Q2-cCegQIABAA&oq=persona+5+royal+4x4&gs_lp=EgNpbWciE3BlcnNvbmEgNSByb3lhbCA0eDRIpRBQhgRY-A1wAHgAkAEAmAGOAaAB9ASqAQMwLjW4AQPIAQD4AQGKAgtnd3Mtd2l6LWltZ8ICBRAAGIAEwgIGEAAYCBgewgIHEAAYgAQYGIgGAQ&sclient=img&ei=dQvtZcKSN53wnsEPy9Wo8Ac&bih=641&biw=1366#imgrc=JarVQTKhP9n8kM', 'person5.jpg', './img/upload/person5.jpg'),
(18, 'GTA VI', 'Grand Theft Auto VI is an upcoming action-adventure game in development by Rockstar Games. It is due to be the eighth main Grand Theft Auto game', 'https://www.php.net/manual/en/features.file-upload.post-method.php', 'Grand_Theft_Auto_VI.png', './img/upload/Grand_Theft_Auto_VI.png'),
(19, 'Super Smash Bros Ultimate', 'Prizepool: 1000 DH\r\n', 'https://www.start.gg/tournament/collision-2024-6/details', 'ssbu.jpg', './img/upload/ssbu.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `pass` varchar(30) NOT NULL,
  `id_login` int(11) NOT NULL,
  `profile_picture` varchar(512) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

ALTER Table users
ADD COLUMN profile_picture VARCHAR(512) DEFAULT NULL

INSERT INTO `users` (`id_user`, `first_name`, `last_name`, `email`, `pass`, `id_login`, `profile_picture`) VALUES
(1, 'El Mahdi', 'Id Lahcen', 'mehdiidlehcen123@gmail.com', '', 2, '/profile_pictures/demon slayer.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id_login`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `login_admin`
--
ALTER TABLE `login_admin`
  ADD PRIMARY KEY (`id_login_admin`),
  ADD UNIQUE KEY `id_login_admin` (`id_login_admin`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id_news`),
  ADD UNIQUE KEY `id_news` (`id_news`);

--
-- Indexes for table `tournament_img`
--
ALTER TABLE `tournament_img`
  ADD PRIMARY KEY (`id_tournament`),
  ADD UNIQUE KEY `id_tournament` (`id_tournament`),
  ADD UNIQUE KEY `img_name` (`img_name`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `id_login` (`id_login`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id_login` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `login_admin`
--
ALTER TABLE `login_admin`
  MODIFY `id_login_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id_news` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tournament_img`
--
ALTER TABLE `tournament_img`
  MODIFY `id_tournament` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

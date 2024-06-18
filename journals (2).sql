-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 17, 2024 at 11:00 AM
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
-- Database: `journals`
--
CREATE DATABASE IF NOT EXISTS `journals` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `journals`;

-- --------------------------------------------------------

--
-- Table structure for table `journals`
--

DROP TABLE IF EXISTS `journals`;
CREATE TABLE IF NOT EXISTS `journals` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `file` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `journals`
--

INSERT INTO `journals` (`id`, `title`, `author`, `description`, `file`, `created_at`) VALUES
(1, 'mybro', 'chad', 'tech company offering IT solutions', '../uploads/131243.docx', '2024-06-16 11:28:14'),
(2, 'The effects of engineering design in university', 'mr. Albert Ngonda', 'analysis of serial impact', '../uploads/input design.docx', '2024-06-17 10:47:47');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

DROP TABLE IF EXISTS `reviews`;
CREATE TABLE IF NOT EXISTS `reviews` (
  `reviewID` int NOT NULL AUTO_INCREMENT,
  `id` int NOT NULL,
  `email` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `review` varchar(10000) DEFAULT NULL,
  PRIMARY KEY (`reviewID`),
  KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`reviewID`, `id`, `email`, `review`) VALUES
(18, 15, 'Milikamsungama@gmail.com', 'Good website, Love to see it :)'),
(16, 13, 'che-101-20@must.ac.mw', 'hey'),
(15, 14, 'bert@gmail.com', 'how do i submit a journal entry for'),
(13, 13, 'che-101-20@must.ac.mw', 'having stuggle submitting journal');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `passkey` varchar(255) NOT NULL,
  `role` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT 'user',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `passkey`, `role`) VALUES
(14, 'James', 'Blake', 'bert@gmail.com', '$2y$10$6Io2L4go6XkUuPydWuTUK.Eqvc57OgVwwyH5Nuzpr4/9W7Mva3L8S', 'user'),
(12, 'Chiyembekezo', 'Sanje', 'chembesanje@yahoo.co.uk', '$2y$10$jyWyqavQhSHEquBEUAszYewI1aXaNQv1SRis8T3aQQWjWiNAlvBJi', 'user'),
(13, 'Albert', 'Ngonda', 'che-101-20@must.ac.mw', '$2y$10$7uzyjKS7A1ePt3B60ANkzOOeMBbQ7npxMvVvCPgn/GrHncJ.WtILO', 'user'),
(15, 'Mafunase', 'Msungama', 'Milikamsungama@gmail.com', '$2y$10$nURmHB53UXGGJPW6T1RNPeG9V.ZVVjQbr0szIxBh04DPG9howrRWS', 'user');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

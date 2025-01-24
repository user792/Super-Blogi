-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 24.01.2025 klo 08:20
-- Palvelimen versio: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `markoblog`
--

-- --------------------------------------------------------

--
-- Rakenne taululle `comment`
--

CREATE TABLE `comment` (
  `comment` varchar(100) NOT NULL,
  `postid` int(11) NOT NULL,
  `time` datetime(6) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Vedos taulusta `comment`
--

INSERT INTO `comment` (`comment`, `postid`, `time`, `id`) VALUES
('ai varmaan sattui', 1, '2025-01-24 09:07:57.000000', 2),
('jep', 1, '2025-01-24 09:08:33.000000', 1),
('olikos puuro hyvääkin', 2, '2025-01-24 09:10:10.000000', 2),
('oli', 2, '2025-01-24 09:10:43.000000', 1),
('jep', 3, '2025-01-24 09:13:31.000000', 1);

-- --------------------------------------------------------

--
-- Rakenne taululle `post`
--

CREATE TABLE `post` (
  `postid` int(11) NOT NULL,
  `text` varchar(300) NOT NULL,
  `time` datetime(6) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Vedos taulusta `post`
--

INSERT INTO `post` (`postid`, `text`, `time`, `id`) VALUES
(1, 'löin varpaani ja olen nyt suruinen', '2025-01-24 09:03:53.000000', 1),
(2, 'tänään söin puuroa', '2025-01-24 09:05:29.000000', 1),
(3, 'kana on maukasta', '2025-01-24 09:11:04.000000', 2);

-- --------------------------------------------------------

--
-- Rakenne taululle `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `writer` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Vedos taulusta `users`
--

INSERT INTO `users` (`id`, `name`, `pass`, `writer`) VALUES
(1, 'pena', '69420XDXD', 1),
(2, 'mäyrä', '1234', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`postid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `postid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

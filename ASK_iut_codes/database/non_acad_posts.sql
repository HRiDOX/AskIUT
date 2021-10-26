-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 26, 2021 at 10:49 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `loginpro`
--

-- --------------------------------------------------------

--
-- Table structure for table `non_acad_posts`
--

CREATE TABLE `non_acad_posts` (
  `id` bigint(19) NOT NULL,
  `postid` bigint(19) NOT NULL,
  `userid` bigint(19) NOT NULL,
  `post` text NOT NULL,
  `image` varchar(500) NOT NULL,
  `comments` int(11) NOT NULL,
  `likes` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `owner` bigint(20) NOT NULL,
  `parent` bigint(20) NOT NULL,
  `has_image` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `non_acad_posts`
--
ALTER TABLE `non_acad_posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `postid` (`postid`),
  ADD KEY `userid` (`userid`),
  ADD KEY `comments` (`comments`),
  ADD KEY `likes` (`likes`),
  ADD KEY `date` (`date`),
  ADD KEY `owner` (`owner`),
  ADD KEY `parent` (`parent`);
ALTER TABLE `non_acad_posts` ADD FULLTEXT KEY `post` (`post`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `non_acad_posts`
--
ALTER TABLE `non_acad_posts`
  MODIFY `id` bigint(19) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

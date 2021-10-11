-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 11, 2021 at 07:01 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.6

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
-- Table structure for table `repository`
--

CREATE TABLE `repository` (
  `id` bigint(19) NOT NULL,
  `userid` bigint(19) NOT NULL,
  `post` text NOT NULL,
  `postid` bigint(20) NOT NULL,
  `image` varchar(500) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `has_image` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `repository`
--

INSERT INTO `repository` (`id`, `userid`, `post`, `postid`, `image`, `date`, `has_image`) VALUES
(1, 9721, '', 5775, 'repository_uploads/9721/0QsS4bCPPmNydda.jpg', '2021-10-09 22:34:57', 1),
(2, 9721, 'hlwww', 399355, ' ', '2021-10-09 22:35:11', 0),
(3, 9721, 'hlw', 292576108547, ' ', '2021-10-09 22:44:37', 0),
(4, 9721, 'hlw', 6130600160818834, ' ', '2021-10-09 22:45:28', 0),
(5, 9721, 'hlw', 511424413, ' ', '2021-10-09 22:46:09', 0),
(6, 9721, 'hlw', 8628182, ' ', '2021-10-09 22:46:15', 0),
(7, 9721, 'hlwww', 715825408852, ' ', '2021-10-09 22:47:02', 0),
(8, 9721, 'yoooooooo', 243238585773878480, ' ', '2021-10-09 22:55:07', 0),
(9, 9721, '', 9414613667547, 'repository_uploads/9721/WJdWYlguwn3w2Mm.jpg', '2021-10-09 22:55:16', 1),
(10, 460707527520938, 'hlw', 16301, ' ', '2021-10-09 23:35:33', 0),
(11, 460707527520938, '', 79347887879320, 'repository_uploads/460707527520938/HJq1WD10cxDSVKB.jpg', '2021-10-09 23:38:42', 1),
(12, 460707527520938, 'hlw', 37141717433302, ' ', '2021-10-09 23:42:22', 0),
(13, 460707527520938, 'hlw', 525012000, ' ', '2021-10-09 23:42:45', 0),
(14, 9721, 'hlwww', 3038, ' ', '2021-10-10 18:57:32', 0),
(15, 9153638466306, 'yooo', 877394101863873127, ' ', '2021-10-10 18:58:34', 0),
(16, 9153638466306, 'post ki hoy????', 75859794279914602, ' ', '2021-10-10 18:59:23', 0),
(17, 3318, 'hlwww', 637556335102068797, ' ', '2021-10-10 19:13:23', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `repository`
--
ALTER TABLE `repository`
  ADD PRIMARY KEY (`id`),
  ADD KEY `postid` (`postid`),
  ADD KEY `date` (`date`);
ALTER TABLE `repository` ADD FULLTEXT KEY `post` (`post`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `repository`
--
ALTER TABLE `repository`
  MODIFY `id` bigint(19) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

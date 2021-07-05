-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 05, 2021 at 05:19 PM
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
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(19) NOT NULL,
  `postid` bigint(19) NOT NULL,
  `userid` bigint(19) NOT NULL,
  `post` text NOT NULL,
  `image` varchar(500) NOT NULL,
  `comments` int(11) NOT NULL,
  `likes` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `postid`, `userid`, `post`, `image`, `comments`, `likes`, `date`) VALUES
(1, 439116195304, 9469701, 'this id', '', 0, 0, '2021-07-02 22:56:12'),
(2, 85510, 9469701, 'this is suraiya & anika', '', 0, 0, '2021-07-02 22:57:41'),
(3, 3890, 9469701, 'yoo', '', 0, 0, '2021-07-02 22:59:14'),
(4, 816767593106866, 4776, 'you girls', '', 0, 0, '2021-07-02 23:01:10'),
(5, 637758123342265, 9469701, 'dekh kaaaj kortese', '', 0, 0, '2021-07-03 13:18:40'),
(6, 62646061420, 9469701, 'kichu korina', '', 0, 0, '2021-07-03 13:19:14'),
(7, 986275, 9469701, 'kichu korina', '', 0, 0, '2021-07-03 13:23:26'),
(8, 192787182935954, 9469701, 'hocche?', '', 0, 0, '2021-07-03 13:27:35'),
(9, 97099642292110, 9469701, 'hocche?', '', 0, 0, '2021-07-03 13:28:02'),
(10, 40085080, 9469701, 'hocche?', '', 0, 0, '2021-07-03 13:44:53'),
(11, 631734161, 9469701, ' ', '', 0, 0, '2021-07-03 13:46:59'),
(12, 97898186718286, 9469701, 'hlw', '', 0, 0, '2021-07-03 18:36:10'),
(13, 820489291, 9469701, 'hlw', '', 0, 0, '2021-07-03 18:36:56'),
(14, 47473, 9469701, 'hlw', '', 0, 0, '2021-07-03 18:40:57'),
(15, 8736457, 9469701, 'yo', '', 0, 0, '2021-07-03 18:45:35'),
(16, 42642259, 9469701, 'yo', '', 0, 0, '2021-07-03 18:47:03'),
(17, 7386549297048033, 9469701, 'yo', '', 0, 0, '2021-07-03 18:47:10'),
(18, 757309695, 9469701, 'error kn', '', 0, 0, '2021-07-03 18:48:34'),
(19, 22960054273, 4776, 'nbhbsdbhd', '', 0, 0, '2021-07-03 18:57:47'),
(20, 3943847509274477991, 4776, 'hlw', '', 0, 0, '2021-07-03 18:59:42'),
(21, 20635, 9469701, 'hlwww', '', 0, 0, '2021-07-03 19:00:27'),
(22, 431182085, 9469701, 'hi', '', 0, 0, '2021-07-03 19:04:17'),
(23, 650532, 9469701, 'hi', '', 0, 0, '2021-07-03 19:49:10'),
(24, 57861025484183411, 9469701, 'hi', '', 0, 0, '2021-07-03 19:49:28'),
(25, 42018, 9469701, 'hi', '', 0, 0, '2021-07-03 19:50:50'),
(26, 6652252076, 9469701, 'hi', '', 0, 0, '2021-07-03 19:51:16'),
(27, 51251144, 9469701, 'hi', '', 0, 0, '2021-07-03 20:05:15'),
(28, 63379814927795, 9469701, 'hi', '', 0, 0, '2021-07-03 20:06:52'),
(29, 8571105833387375, 9469701, 'dekh thik ache pic', '', 0, 0, '2021-07-03 20:07:54'),
(30, 51595, 9469701, 'working', '', 0, 0, '2021-07-04 23:54:18'),
(31, 11119444301458285, 4776, 'yoo', '', 0, 0, '2021-07-05 00:02:50'),
(32, 89994268, 2147483647, 'njdjbvhb', '', 0, 0, '2021-07-05 12:18:55'),
(33, 18394770347, 2147483647, 'njdjbvhb', '', 0, 0, '2021-07-05 12:22:33'),
(34, 61457, 551718, 'yo', '', 0, 0, '2021-07-05 14:25:04'),
(35, 4203982220075, 1968922783359789057, 'post', '', 0, 0, '2021-07-05 14:49:19');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `postid` (`postid`),
  ADD KEY `userid` (`userid`),
  ADD KEY `comments` (`comments`),
  ADD KEY `likes` (`likes`),
  ADD KEY `date` (`date`);
ALTER TABLE `posts` ADD FULLTEXT KEY `post` (`post`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(19) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

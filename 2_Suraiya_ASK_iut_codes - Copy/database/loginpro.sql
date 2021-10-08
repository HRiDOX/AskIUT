-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 03, 2021 at 08:57 PM
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
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `id` bigint(20) NOT NULL,
  `type` varchar(10) NOT NULL,
  `contentid` bigint(20) NOT NULL,
  `likes` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`id`, `type`, `contentid`, `likes`) VALUES
(1, 'post', 562490636500018, '[{\"userid\":\"9469701\",\"date\":\"2021-07-07 02:03:43\"}]'),
(2, 'post', 6020565041691232940, '[]'),
(3, 'post', 383410202486679359, '[]'),
(4, 'post', 287715189152055049, '[]'),
(5, 'post', 369649889, '[]'),
(6, 'post', 34861924383109, '[{\"userid\":\"646681960102934\",\"date\":\"2021-07-07 08:58:49\"}]'),
(7, 'post', 7882753312795232, '[{\"userid\":\"18779009159609\",\"date\":\"2021-07-07 09:09:34\"}]'),
(8, 'post', 705745412, '[]');

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
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `has_image` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `postid`, `userid`, `post`, `image`, `comments`, `likes`, `date`, `has_image`) VALUES
(77, 705745412, 488293949, 'can anyone help?', 'uploads/488293949/zjaLOuFIDrep9r5.jpg', 0, 0, '2021-07-07 08:13:38', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `userid` bigint(19) NOT NULL,
  `FirstName` varchar(255) NOT NULL,
  `LastName` varchar(255) NOT NULL,
  `UserName` varchar(255) NOT NULL,
  `Batch` int(4) NOT NULL,
  `Department` varchar(3) NOT NULL,
  `Email` varchar(300) NOT NULL,
  `Password` text NOT NULL,
  `Validation_Code` text NOT NULL,
  `Active` tinyint(4) NOT NULL DEFAULT 0,
  `url_address` varchar(250) NOT NULL,
  `profile_image` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `userid`, `FirstName`, `LastName`, `UserName`, `Batch`, `Department`, `Email`, `Password`, `Validation_Code`, `Active`, `url_address`, `profile_image`) VALUES
(51, 646681960102934, 'Mahmudul Hasan ', 'Hridoy', ' Hridoy', 2019, 'CSE', 'hrid@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '0', 1, 'mahmudul hasan .hridoy', 'uploads/646681960102934/OxvCDBUoI4LOIZ5.jpg'),
(52, 18779009159609, 'Mahmudul Hasan ', 'Sunika', ' Looser', 2019, 'CSE', 'rgrrf123@gmail.com', '25f9e794323b453885f5181f1b624d0b', '0', 1, 'mahmudul hasan .sunika', 'uploads/18779009159609/TImeBHiwiB1zVeA.jpg'),
(53, 488293949, 'cbjhbhha', 'cbavsvcgvgvc', ' bshvgvgv', 2019, 'CSE', 'hrdhrd308@gmail.com', '25d55ad283aa400af464c76d713c07ad', '0', 1, 'cbjhbhha.cbavsvcgvgvc', 'uploads/488293949/9NZo6Z3aiiUBwUs.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users_faculty`
--

CREATE TABLE `users_faculty` (
  `ID` int(11) NOT NULL,
  `userid` bigint(19) NOT NULL,
  `FirstName` varchar(250) NOT NULL,
  `LastName` varchar(250) NOT NULL,
  `UserName` varchar(255) NOT NULL,
  `Batch` int(11) NOT NULL,
  `Department` varchar(255) NOT NULL,
  `Faculty` varchar(255) NOT NULL,
  `Email` varchar(300) NOT NULL,
  `Password` text NOT NULL,
  `Validation_Code` text NOT NULL,
  `Active` tinyint(4) NOT NULL DEFAULT 0,
  `url_address` varchar(250) NOT NULL,
  `profile_image` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `type` (`type`),
  ADD KEY `contentid` (`contentid`);

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
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID` (`ID`),
  ADD KEY `ID_2` (`ID`),
  ADD KEY `FirstName` (`FirstName`),
  ADD KEY `LastName` (`LastName`),
  ADD KEY `UserName` (`UserName`),
  ADD KEY `Email` (`Email`),
  ADD KEY `Active` (`Active`),
  ADD KEY `url_address` (`url_address`),
  ADD KEY `url_address_2` (`url_address`),
  ADD KEY `Active_2` (`Active`),
  ADD KEY `url_address_3` (`url_address`),
  ADD KEY `profile_image` (`profile_image`(768)),
  ADD KEY `userid` (`userid`),
  ADD KEY `Department` (`Department`),
  ADD KEY `Batch` (`Batch`);

--
-- Indexes for table `users_faculty`
--
ALTER TABLE `users_faculty`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(19) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `users_faculty`
--
ALTER TABLE `users_faculty`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

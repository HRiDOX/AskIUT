-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 28, 2021 at 04:45 PM
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
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `FirstName` varchar(255) NOT NULL,
  `LastName` varchar(255) NOT NULL,
  `UserName` varchar(255) NOT NULL,
  `Email` varchar(300) NOT NULL,
  `Password` text NOT NULL,
  `Validation_Code` text NOT NULL,
  `Active` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `FirstName`, `LastName`, `UserName`, `Email`, `Password`, `Validation_Code`, `Active`) VALUES
(1, 'hridoy', 'hridoy', 'hrd', 'rgrrf123@gmail.com', '1234', '3679', 0),
(2, 'MHR', 'Hasan', 'hd', 'hridolay@gmail.com', '456', '7912', 1),
(15, 'anika', 'islam', ' anikaIslam', 'fsdf@gmail.com', 'cb3ce9b06932da6faaa7fc70d5b5d2f4', '0', 1),
(21, 'suraiya', 'Hridoy', ' anisursddr', 'xascdvc@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '0', 1),
(22, 'ruwegiu', 'ifhwifoi', ' jflhfh', 'hffdgf@gmail.com', '202cb962ac59075b964b07152d234b70', '0', 1),
(23, 'njsjvbjjb hbh ', 'jnjsnbvjbj j', ' nvnsvjjnxn', 'amxkmkks@gmail.com', 'e35cf7b66449df565f93c607d5a81d09', '0', 1),
(24, 'fkdjvvbdbv', 'jdvnnvvb', ' nvknjvnjn', 'mardala@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '0', 1),
(25, 'kdjjjsjajioja', 'alakpkvdv', ' nvnnvododods', 'mariala@gmail.com', '71b3b26aaa319e0cdf6fdb8429c112b0', '0', 1),
(26, 'chotobhau', 'borobhao', ' Looser', 'sunikaaaa@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'b5dc2a6e977939e233db9322721a2113', 0),
(27, 'nfjkndfjnvnjdv', 'nvjdsknsjd', ' nvjbdvkj', 'nvjdjv@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'b5dc2a6e977939e233db9322721a2113', 0),
(28, 'vksdvjnvj', 'ndvsdjbvsb', ' bvhbhfhbvsb', 'hfhfh@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'b5dc2a6e977939e233db9322721a2113', 0),
(29, 'vdjnvbv', 'vdijviji', ' jbvjfbid', 'dhurr@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'b5dc2a6e977939e233db9322721a2113', 0),
(30, 'vdjnvbv', 'vdijviji', ' jbvjfbid', 'dhurrrr@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '0', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users_faculty`
--

CREATE TABLE `users_faculty` (
  `ID` int(11) NOT NULL,
  `FirstName` varchar(250) NOT NULL,
  `LastName` varchar(250) NOT NULL,
  `UserName` varchar(255) NOT NULL,
  `Department` varchar(255) NOT NULL,
  `Faculty` varchar(255) NOT NULL,
  `Email` varchar(300) NOT NULL,
  `Password` text NOT NULL,
  `Validation_Code` text NOT NULL,
  `Active` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users_faculty`
--

INSERT INTO `users_faculty` (`ID`, `FirstName`, `LastName`, `UserName`, `Department`, `Faculty`, `Email`, `Password`, `Validation_Code`, `Active`) VALUES
(1, 'suraiya', 'anika', 'sunika', 'cse', 'lecturer', 'sunika@gmail.com', '2482', '', 0),
(2, 'Mahmudul Hasan ', 'Hridoy', ' Looser', 'CSE', 'Lecturer', 'aha3370@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '0', 1),
(3, 'fhuikko;k', 'gjkhjilhkgj', ' hfjgyhkuji', 'drftgyhuij', 'dyftgyhuji', 'fsdf@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '0', 1),
(4, 'nvnsjvjbsv', 'nvnnvnvn', ' vnnvndnbj', 'CSE', 'nvnkdkffk', 'mardala@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '0', 1),
(5, 'nvnjnvjnvn', 'akpskpkokvo', ' mvkmfmkfpps', 'CSE', 'Lecturer', 'mariala@gmail.com', '71b3b26aaa319e0cdf6fdb8429c112b0', '0', 1),
(6, 'bhhihijij', 'jhihuhihiii', ' bjhhijojojoo', 'hgfftf', 'bhhhugsawa', 'avs@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'b5dc2a6e977939e233db9322721a2113', 0),
(7, 'cnjdvjd', 'mnccnc', ' njvndkncn', 'CSE', 'Lecturer', 'sjnnco@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'b5dc2a6e977939e233db9322721a2113', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `users_faculty`
--
ALTER TABLE `users_faculty`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `users_faculty`
--
ALTER TABLE `users_faculty`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

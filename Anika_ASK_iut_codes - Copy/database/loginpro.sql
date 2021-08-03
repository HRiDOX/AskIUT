-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 02, 2021 at 11:11 PM
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
  `userid` int(250) NOT NULL,
  `FirstName` varchar(255) NOT NULL,
  `LastName` varchar(255) NOT NULL,
  `UserName` varchar(255) NOT NULL,
  `Email` varchar(300) NOT NULL,
  `Password` text NOT NULL,
  `Validation_Code` text NOT NULL,
  `Active` tinyint(4) NOT NULL DEFAULT 0,
  `url_address` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `userid`, `FirstName`, `LastName`, `UserName`, `Email`, `Password`, `Validation_Code`, `Active`, `url_address`) VALUES
(1, 0, 'hridoy', 'hridoy', 'hrd', 'rgrrf123@gmail.com', '1234', '3679', 0, ''),
(2, 0, 'MHR', 'Hasan', 'hd', 'hridolay@gmail.com', '456', '7912', 1, ''),
(15, 0, 'anika', 'islam', ' anikaIslam', 'fsdf@gmail.com', 'cb3ce9b06932da6faaa7fc70d5b5d2f4', '0', 1, ''),
(21, 0, 'suraiya', 'Hridoy', ' anisursddr', 'xascdvc@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '0', 1, ''),
(22, 0, 'ruwegiu', 'ifhwifoi', ' jflhfh', 'hffdgf@gmail.com', '202cb962ac59075b964b07152d234b70', '0', 1, ''),
(23, 0, 'njsjvbjjb hbh ', 'jnjsnbvjbj j', ' nvnsvjjnxn', 'amxkmkks@gmail.com', 'e35cf7b66449df565f93c607d5a81d09', '0', 1, ''),
(24, 0, 'fkdjvvbdbv', 'jdvnnvvb', ' nvknjvnjn', 'mardala@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '0', 1, ''),
(25, 0, 'kdjjjsjajioja', 'alakpkvdv', ' nvnnvododods', 'mariala@gmail.com', '71b3b26aaa319e0cdf6fdb8429c112b0', '0', 1, ''),
(26, 0, 'chotobhau', 'borobhao', ' Looser', 'sunikaaaa@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'b5dc2a6e977939e233db9322721a2113', 0, ''),
(27, 0, 'nfjkndfjnvnjdv', 'nvjdsknsjd', ' nvjbdvkj', 'nvjdjv@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'b5dc2a6e977939e233db9322721a2113', 0, ''),
(28, 0, 'vksdvjnvj', 'ndvsdjbvsb', ' bvhbhfhbvsb', 'hfhfh@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'b5dc2a6e977939e233db9322721a2113', 0, ''),
(29, 0, 'vdjnvbv', 'vdijviji', ' jbvjfbid', 'dhurr@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '0', 1, ''),
(30, 0, 'vdjnvbv', 'vdijviji', ' jbvjfbid', 'dhurrrr@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '0', 1, ''),
(31, 0, 'bchbabca', 'bvbshhba', ' bchbhbhba', 'puchi@gmail.com', '25f9e794323b453885f5181f1b624d0b', '0', 1, ''),
(32, 0, 'Mahmudul Hasan ', 'ksklkmx', ' Looser', 'csgvgv@gmail.com', '202cb962ac59075b964b07152d234b70', 'b5dc2a6e977939e233db9322721a2113', 0, ''),
(33, 88588, 'scbhss', 'anbxavgxa ', ' cdbvgsvg', 'csbv@gmail.com', '202cb962ac59075b964b07152d234b70', 'b5dc2a6e977939e233db9322721a2113', 0, 'scbhss.anbxavgxa '),
(34, 2147483647, 'hridoy', 'hgvvvgfc', ' hgfc', 'hghcsgvgv@gmail.com', '202cb962ac59075b964b07152d234b70', '0', 1, 'hridoy.hgvvvgfc'),
(35, 9469701, 'anikaSuraiya', 'IslamHasan', ' Sunika', 'hridoy@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'e0218fd86424ee799096e89f5e1a1386', 1, 'anikasuraiya.islamhasan'),
(36, 92552, 'nbvdvgdgvus', 'fbwheuuwywcv', ' hfvywvyf', 'bwgvwvy@gmail.com', '202cb962ac59075b964b07152d234b70', '0', 1, 'nbvdvgdgvus.fbwheuuwywcv');

-- --------------------------------------------------------

--
-- Table structure for table `users_faculty`
--

CREATE TABLE `users_faculty` (
  `ID` int(11) NOT NULL,
  `userid` int(250) NOT NULL,
  `FirstName` varchar(250) NOT NULL,
  `LastName` varchar(250) NOT NULL,
  `UserName` varchar(255) NOT NULL,
  `Department` varchar(255) NOT NULL,
  `Faculty` varchar(255) NOT NULL,
  `Email` varchar(300) NOT NULL,
  `Password` text NOT NULL,
  `Validation_Code` text NOT NULL,
  `Active` tinyint(4) NOT NULL DEFAULT 0,
  `url_address` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users_faculty`
--

INSERT INTO `users_faculty` (`ID`, `userid`, `FirstName`, `LastName`, `UserName`, `Department`, `Faculty`, `Email`, `Password`, `Validation_Code`, `Active`, `url_address`) VALUES
(1, 0, 'suraiya', 'anika', 'sunika', 'cse', 'lecturer', 'sunika@gmail.com', '2482', '', 0, '0'),
(2, 0, 'Mahmudul Hasan ', 'Hridoy', ' Looser', 'CSE', 'Lecturer', 'aha3370@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '0', 1, '0'),
(3, 0, 'fhuikko;k', 'gjkhjilhkgj', ' hfjgyhkuji', 'drftgyhuij', 'dyftgyhuji', 'fsdf@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '0', 1, '0'),
(4, 0, 'nvnsjvjbsv', 'nvnnvnvn', ' vnnvndnbj', 'CSE', 'nvnkdkffk', 'mardala@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '0', 1, '0'),
(5, 0, 'nvnjnvjnvn', 'akpskpkokvo', ' mvkmfmkfpps', 'CSE', 'Lecturer', 'mariala@gmail.com', '71b3b26aaa319e0cdf6fdb8429c112b0', '0', 1, '0'),
(6, 0, 'bhhihijij', 'jhihuhihiii', ' bjhhijojojoo', 'hgfftf', 'bhhhugsawa', 'avs@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'b5dc2a6e977939e233db9322721a2113', 0, '0'),
(7, 0, 'cnjdvjd', 'mnccnc', ' njvndkncn', 'CSE', 'Lecturer', 'sjnnco@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'b5dc2a6e977939e233db9322721a2113', 0, '0'),
(8, 0, 'Mahmudul Hasan ', 'ddddd', ' VJDJVDNJD', 'ASNAJJANJ', 'CHDCHDGDV', 'akaimma@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '0', 1, '0'),
(9, 0, ' cndh ahdc', 'bcsgvcgvgva', ' vnsbdhbhbv', 'ncabhcbvhhv', 'cnhdvggv', 'pipi@gmail.com', '6ebe76c9fb411be97b3b0d48b791a7c9', '0', 1, '0'),
(10, 4776, 'Mahmudul Hasan ', 'Hridoy', ' Looser', 'CSE', 'Lecturer', 'hridox@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '0', 1, 'mahmudul hasan .hridoy'),
(11, 2147483647, 'nsbuytyfstcftc', 'chvyytcyvva', ' chdbcvgvyvdgc', 'chvdvytvcy', 'cbdhgvgvch', 'bchgvcv@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '0', 1, 'nsbuytyfstcftc.chvyytcyvva');

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
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `users_faculty`
--
ALTER TABLE `users_faculty`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

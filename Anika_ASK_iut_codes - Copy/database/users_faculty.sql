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
-- Table structure for table `users_faculty`
--

CREATE TABLE `users_faculty` (
  `ID` int(11) NOT NULL,
  `userid` bigint(19) NOT NULL,
  `FirstName` varchar(250) NOT NULL,
  `LastName` varchar(250) NOT NULL,
  `UserName` varchar(255) NOT NULL,
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
-- Dumping data for table `users_faculty`
--

INSERT INTO `users_faculty` (`ID`, `userid`, `FirstName`, `LastName`, `UserName`, `Department`, `Faculty`, `Email`, `Password`, `Validation_Code`, `Active`, `url_address`, `profile_image`) VALUES
(1, 0, 'suraiya', 'anika', 'sunika', 'cse', 'lecturer', 'sunika@gmail.com', '2482', '', 0, '0', ''),
(2, 0, 'Mahmudul Hasan ', 'Hridoy', ' Looser', 'CSE', 'Lecturer', 'aha3370@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '0', 1, '0', ''),
(3, 0, 'fhuikko;k', 'gjkhjilhkgj', ' hfjgyhkuji', 'drftgyhuij', 'dyftgyhuji', 'fsdf@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '0', 1, '0', ''),
(4, 0, 'nvnsjvjbsv', 'nvnnvnvn', ' vnnvndnbj', 'CSE', 'nvnkdkffk', 'mardala@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '0', 1, '0', ''),
(5, 0, 'nvnjnvjnvn', 'akpskpkokvo', ' mvkmfmkfpps', 'CSE', 'Lecturer', 'mariala@gmail.com', '71b3b26aaa319e0cdf6fdb8429c112b0', '0', 1, '0', ''),
(6, 0, 'bhhihijij', 'jhihuhihiii', ' bjhhijojojoo', 'hgfftf', 'bhhhugsawa', 'avs@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'b5dc2a6e977939e233db9322721a2113', 0, '0', ''),
(7, 0, 'cnjdvjd', 'mnccnc', ' njvndkncn', 'CSE', 'Lecturer', 'sjnnco@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'b5dc2a6e977939e233db9322721a2113', 0, '0', ''),
(8, 0, 'Mahmudul Hasan ', 'ddddd', ' VJDJVDNJD', 'ASNAJJANJ', 'CHDCHDGDV', 'akaimma@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '0', 1, '0', ''),
(9, 0, ' cndh ahdc', 'bcsgvcgvgva', ' vnsbdhbhbv', 'ncabhcbvhhv', 'cnhdvggv', 'pipi@gmail.com', '6ebe76c9fb411be97b3b0d48b791a7c9', '0', 1, '0', ''),
(10, 4776, 'Mahmudul Hasan ', 'Hridoy', ' Looser', 'CSE', 'Lecturer', 'hridox@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '0', 1, 'mahmudul hasan .hridoy', ''),
(11, 2147483647, 'nsbuytyfstcftc', 'chvyytcyvva', ' chdbcvgvyvdgc', 'chvdvytvcy', 'cbdhgvgvch', 'bchgvcv@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '0', 1, 'nsbuytyfstcftc.chvyytcyvva', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users_faculty`
--
ALTER TABLE `users_faculty`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users_faculty`
--
ALTER TABLE `users_faculty`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

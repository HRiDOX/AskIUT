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
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `userid` bigint(19) NOT NULL,
  `FirstName` varchar(255) NOT NULL,
  `LastName` varchar(255) NOT NULL,
  `UserName` varchar(255) NOT NULL,
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

INSERT INTO `users` (`ID`, `userid`, `FirstName`, `LastName`, `UserName`, `Email`, `Password`, `Validation_Code`, `Active`, `url_address`, `profile_image`) VALUES
(1, 0, 'hridoy', 'hridoy', 'hrd', 'rgrrf123@gmail.com', '1234', '3679', 0, '', ''),
(2, 0, 'MHR', 'Hasan', 'hd', 'hridolay@gmail.com', '456', '7912', 1, '', ''),
(15, 0, 'anika', 'islam', ' anikaIslam', 'fsdf@gmail.com', 'cb3ce9b06932da6faaa7fc70d5b5d2f4', '0', 1, '', ''),
(21, 0, 'suraiya', 'Hridoy', ' anisursddr', 'xascdvc@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '0', 1, '', ''),
(22, 0, 'ruwegiu', 'ifhwifoi', ' jflhfh', 'hffdgf@gmail.com', '202cb962ac59075b964b07152d234b70', '0', 1, '', ''),
(23, 0, 'njsjvbjjb hbh ', 'jnjsnbvjbj j', ' nvnsvjjnxn', 'amxkmkks@gmail.com', 'e35cf7b66449df565f93c607d5a81d09', '0', 1, '', ''),
(24, 0, 'fkdjvvbdbv', 'jdvnnvvb', ' nvknjvnjn', 'mardala@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '0', 1, '', ''),
(25, 0, 'kdjjjsjajioja', 'alakpkvdv', ' nvnnvododods', 'mariala@gmail.com', '71b3b26aaa319e0cdf6fdb8429c112b0', '0', 1, '', ''),
(26, 0, 'chotobhau', 'borobhao', ' Looser', 'sunikaaaa@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'b5dc2a6e977939e233db9322721a2113', 0, '', ''),
(27, 0, 'nfjkndfjnvnjdv', 'nvjdsknsjd', ' nvjbdvkj', 'nvjdjv@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'b5dc2a6e977939e233db9322721a2113', 0, '', ''),
(28, 0, 'vksdvjnvj', 'ndvsdjbvsb', ' bvhbhfhbvsb', 'hfhfh@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'b5dc2a6e977939e233db9322721a2113', 0, '', ''),
(29, 0, 'vdjnvbv', 'vdijviji', ' jbvjfbid', 'dhurr@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '0', 1, '', ''),
(30, 0, 'vdjnvbv', 'vdijviji', ' jbvjfbid', 'dhurrrr@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '0', 1, '', ''),
(31, 0, 'bchbabca', 'bvbshhba', ' bchbhbhba', 'puchi@gmail.com', '25f9e794323b453885f5181f1b624d0b', '0', 1, '', ''),
(32, 0, 'Mahmudul Hasan ', 'ksklkmx', ' Looser', 'csgvgv@gmail.com', '202cb962ac59075b964b07152d234b70', 'b5dc2a6e977939e233db9322721a2113', 0, '', ''),
(33, 88588, 'scbhss', 'anbxavgxa ', ' cdbvgsvg', 'csbv@gmail.com', '202cb962ac59075b964b07152d234b70', 'b5dc2a6e977939e233db9322721a2113', 0, 'scbhss.anbxavgxa ', ''),
(34, 2147483647, 'hridoy', 'hgvvvgfc', ' hgfc', 'hghcsgvgv@gmail.com', '202cb962ac59075b964b07152d234b70', '0', 1, 'hridoy.hgvvvgfc', 'uploads/hrd.jpg'),
(35, 9469701, 'anikaSuraiya', 'IslamHasan', ' Sunika', 'hridoy@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'e0218fd86424ee799096e89f5e1a1386', 1, 'anikasuraiya.islamhasan', 'uploads/hrd.jpg'),
(36, 92552, 'nbvdvgdgvus', 'fbwheuuwywcv', ' hfvywvyf', 'bwgvwvy@gmail.com', '202cb962ac59075b964b07152d234b70', '0', 1, 'nbvdvgdgvus.fbwheuuwywcv', ''),
(41, 2147483647, 'hridoy', 'hridoyhridoy', ' hhhhhhhhh', 'hd@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'b5dc2a6e977939e233db9322721a2113', 0, 'hridoy.hridoyhridoy', ''),
(42, 2147483647, 'fgcftrt', 'gvhgccjh', ' vhgvgg', 'hgfd@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'b5dc2a6e977939e233db9322721a2113', 0, 'fgcftrt.gvhgccjh', ''),
(43, 33811832, 'hfxdxdd', 'bvcfcfcf', ' cffffxjhg', 'awar@gmail.com', '467b617fec4d9fcb63505734ee224851', 'b5dc2a6e977939e233db9322721a2113', 0, 'hfxdxdd.bvcfcfcf', ''),
(44, 551718, 'bhfcfcfxyyytc', 'ffxdduhb', ' gvghhh', 'fdrdr@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '0', 1, 'bhfcfcfxyyytc.ffxdduhb', 'uploads/user4.jpg'),
(45, 1968922783359789057, 'Mahmudul Hasan ', 'Hridoy', ' hridox', 'hrid@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '0', 1, 'mahmudul hasan .hridoy', '');

--
-- Indexes for dumped tables
--

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
  ADD KEY `userid` (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 10, 2019 at 02:32 PM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 5.6.37

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `first`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `cid` int(11) NOT NULL,
  `comm` varchar(250) NOT NULL,
  `uid` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `com_date_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`cid`, `comm`, `uid`, `pid`, `com_date_time`) VALUES
(2, 'nice mobile...\r\ngreat price...', 2, 2, '0000-00-00 00:00:00'),
(3, 'nice one', 2, 1, '0000-00-00 00:00:00'),
(4, 'great', 2, 3, '0000-00-00 00:00:00'),
(5, 'great 1..', 3, 1, '0000-00-00 00:00:00'),
(6, 'good one', 3, 2, '0000-00-00 00:00:00'),
(7, 'amazing', 3, 3, '0000-00-00 00:00:00'),
(8, 'jcjscn\r\neff\r\nef\r\nef\r\n', 2, 1, '0000-00-00 00:00:00'),
(9, 'wdsdxdx', 2, 1, '0000-00-00 00:00:00'),
(10, 'dadx', 2, 1, '0000-00-00 00:00:00'),
(11, 'whebdhebd', 2, 1, '0000-00-00 00:00:00'),
(12, 'kwebdjbxksbc', 2, 1, '0000-00-00 00:00:00'),
(13, 'Loved it', 2, 2, '0000-00-00 00:00:00'),
(14, 'nice phone', 2, 3, '2019-01-10 11:58:50'),
(15, 'ekdbj\r\nasd\r\nesafas\r\nwef', 2, 3, '2019-01-10 12:07:14'),
(16, 'Nice design', 2, 3, '2019-01-10 02:22:43'),
(17, 'ejdfnjewn', 2, 3, '2019-01-10 06:59:10'),
(18, 'ajdnajsdn', 2, 3, '2019-01-10 07:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `pid` int(11) NOT NULL,
  `pname` varchar(30) NOT NULL,
  `prod_disc` varchar(500) NOT NULL,
  `pimg` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`pid`, `pname`, `prod_disc`, `pimg`) VALUES
(1, 'm1', '3 GB RAM | 32 GB ROM | Expandable Upto 2 TB 15.9 cm (6.26 inch) HD+ Display 13MP + 2MP | 8MP Front Camera 4000 Battery Qualcomm Snapdragon 632 Octa Core Processor Pure Android 8.1 Oreo (Stock)', 'm1.jpg'),
(2, 'm2', '3 GB RAM | 32 GB ROM | Expandable Upto 2 TB 15.9 cm (6.26 inch) HD+ Display 13MP + 2MP | 8MP Front Camera 4000 Battery Qualcomm Snapdragon 632 Octa Core Processor Pure Android 8.1 Oreo (Stock)', 'm2.jpg'),
(3, 'm3', '3 GB RAM | 32 GB ROM | Expandable Upto 2 TB 15.9 cm (6.26 inch) HD+ Display 13MP + 2MP | 8MP Front Camera 4000 Battery Qualcomm Snapdragon 632 Octa Core Processor Pure Android 8.1 Oreo (Stock)', 'm3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `uid` int(11) NOT NULL,
  `first_name` char(30) NOT NULL,
  `last_name` char(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `profile_pic` varchar(50) NOT NULL,
  `pwd` varchar(20) NOT NULL,
  `date_created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`uid`, `first_name`, `last_name`, `email`, `profile_pic`, `pwd`, `date_created`) VALUES
(1, 'wdsqw', 'jhjh', 'hho@gmaik.com', '', '123', '2018-12-31'),
(2, 'Chandni', 'Soni', 'cs@gmail.com', 'sm.png', 'Chandni!11', '0000-00-00'),
(3, 'Diya', 'Sharma', 'soni.chandni.415@gmail.com', '', 'Chandni@2', '0000-00-00'),
(4, 'Maya', 'Khanna', 'maya@gmail.com', '', 'maya1', '2018-12-31');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

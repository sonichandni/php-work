-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 01, 2019 at 12:12 PM
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
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `uid` int(11) NOT NULL,
  `first_name` char(30) NOT NULL,
  `last_name` char(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `pwd` varchar(20) NOT NULL,
  `date_created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`uid`, `first_name`, `last_name`, `email`, `pwd`, `date_created`) VALUES
(1, 'wdsqw', 'jhjh', 'hho@gmaik.com', '123', '2018-12-31'),
(2, 'Chandni', 'Soni', 'chandni@gmail.cpo', 'sacs', '0000-00-00'),
(3, 'Diya', 'Soni', 'soni.chandni.415@gmail.com', 'chandni', '0000-00-00'),
(4, 'Maya', 'Khanna', 'maya@gmail.com', 'maya1', '2018-12-31'),
(10, 'wfewfweff', 'eff', 'qfqfe@gmail.wd', 'Chandni!11', '2019-01-01'),
(11, 'Chandni', 'Soni', 'aaf@gmail.com', 'Chandni@22', '2019-01-01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

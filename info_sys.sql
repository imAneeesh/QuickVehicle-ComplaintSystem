-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 06, 2022 at 11:30 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `info_sys`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `chas_no` varchar(20) NOT NULL,
  `addr` varchar(20) NOT NULL,
  `district` varchar(20) NOT NULL,
  `state` varchar(20) NOT NULL,
  `zip` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `email`, `password`) VALUES
('Chethan MB', 'admin1@gmail.com', '123'),
('Aneesha', 'admin@gmail.com', '123');

-- --------------------------------------------------------

--
-- Table structure for table `complaints`
--

CREATE TABLE `complaints` (
  `chas_no` varchar(20) NOT NULL,
  `reg_no` varchar(20) NOT NULL,
  `owner_name` varchar(20) NOT NULL,
  `veh_name` varchar(20) NOT NULL,
  `veh_color` varchar(20) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `description` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `notice`
--

CREATE TABLE `notice` (
  `chas_no` varchar(20) NOT NULL,
  `reg_no` varchar(20) NOT NULL,
  `phone` bigint(20) NOT NULL,
  `address` varchar(20) NOT NULL,
  `station` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Triggers `notice`
--
DELIMITER $$
CREATE TRIGGER `delete_complaint` AFTER INSERT ON `notice` FOR EACH ROW DELETE FROM complaints where chas_no=NEW.chas_no
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `delete_upload` AFTER INSERT ON `notice` FOR EACH ROW UPDATE upload set status='FOUND' where chas_no=NEW.chas_no
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `officer`
--

CREATE TABLE `officer` (
  `off_id` varchar(20) NOT NULL,
  `officer_name` varchar(20) NOT NULL,
  `dept` varchar(20) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `address` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `officer`
--

INSERT INTO `officer` (`off_id`, `officer_name`, `dept`, `phone`, `address`, `password`) VALUES
('off02', 'Aneesh', '', '', 'Dembala House, Manil', '123');

-- --------------------------------------------------------

--
-- Table structure for table `rto`
--

CREATE TABLE `rto` (
  `chas_no` varchar(20) NOT NULL,
  `reg_no` varchar(20) NOT NULL,
  `owner_name` varchar(20) NOT NULL,
  `veh_name` varchar(20) NOT NULL,
  `veh_color` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rto`
--

INSERT INTO `rto` (`chas_no`, `reg_no`, `owner_name`, `veh_name`, `veh_color`) VALUES
('c1', 'r1', 'aneesh', 'ford', 'black'),
('c2', 'r2', 'USER', 'ford', 'black');

-- --------------------------------------------------------

--
-- Table structure for table `upload`
--

CREATE TABLE `upload` (
  `chas_no` varchar(20) NOT NULL,
  `reg_no` varchar(20) NOT NULL,
  `veh_name` varchar(20) NOT NULL,
  `veh_color` varchar(20) NOT NULL,
  `owner_name` varchar(20) NOT NULL,
  `off_id` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `upload`
--

INSERT INTO `upload` (`chas_no`, `reg_no`, `veh_name`, `veh_color`, `owner_name`, `off_id`, `status`) VALUES
('c1', 'r1', 'ford', 'white', 'aneesh', 'off02', 'FOUND'),
('c2', 'r2', 'ford', 'white', 'aneesh', 'off02', 'FOUND');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `email`, `password`) VALUES
('Aneesh', 'user@gmail.com', '123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD KEY `chas_no` (`chas_no`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `complaints`
--
ALTER TABLE `complaints`
  ADD PRIMARY KEY (`chas_no`),
  ADD UNIQUE KEY `reg_no` (`reg_no`);

--
-- Indexes for table `notice`
--
ALTER TABLE `notice`
  ADD PRIMARY KEY (`chas_no`),
  ADD UNIQUE KEY `reg_no` (`reg_no`);

--
-- Indexes for table `officer`
--
ALTER TABLE `officer`
  ADD PRIMARY KEY (`off_id`);

--
-- Indexes for table `rto`
--
ALTER TABLE `rto`
  ADD PRIMARY KEY (`chas_no`),
  ADD UNIQUE KEY `reg_no` (`reg_no`);

--
-- Indexes for table `upload`
--
ALTER TABLE `upload`
  ADD PRIMARY KEY (`chas_no`),
  ADD UNIQUE KEY `reg_no` (`reg_no`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`email`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `address`
--
ALTER TABLE `address`
  ADD CONSTRAINT `address_ibfk_1` FOREIGN KEY (`chas_no`) REFERENCES `complaints` (`chas_no`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `complaints`
--
ALTER TABLE `complaints`
  ADD CONSTRAINT `complaints_ibfk_1` FOREIGN KEY (`chas_no`) REFERENCES `rto` (`chas_no`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `complaints_ibfk_2` FOREIGN KEY (`reg_no`) REFERENCES `rto` (`reg_no`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `notice`
--
ALTER TABLE `notice`
  ADD CONSTRAINT `notice_ibfk_1` FOREIGN KEY (`chas_no`) REFERENCES `upload` (`chas_no`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `notice_ibfk_2` FOREIGN KEY (`reg_no`) REFERENCES `upload` (`reg_no`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `upload`
--
ALTER TABLE `upload`
  ADD CONSTRAINT `upload_ibfk_1` FOREIGN KEY (`chas_no`) REFERENCES `rto` (`chas_no`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `upload_ibfk_2` FOREIGN KEY (`reg_no`) REFERENCES `rto` (`reg_no`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

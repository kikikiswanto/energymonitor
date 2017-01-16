-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 14, 2017 at 09:12 AM
-- Server version: 5.7.16-0ubuntu0.16.04.1
-- PHP Version: 7.0.8-0ubuntu0.16.04.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `emon_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `kay_electric`
--

CREATE TABLE `kay_electric` (
  `el_id` int(11) NOT NULL,
  `el_source` varchar(11) NOT NULL,
  `i` float NOT NULL DEFAULT '0',
  `v` float NOT NULL DEFAULT '0',
  `o` float NOT NULL DEFAULT '0',
  `kwh` int(11) NOT NULL DEFAULT '1000',
  `el_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kay_electric`
--

INSERT INTO `kay_electric` (`el_id`, `el_source`, `i`, `v`, `o`, `kwh`, `el_time`) VALUES
(8, 'R01', 5, 1.5, 0, 1000, '2017-01-12 18:21:37'),
(9, 'R01', 10, 3.5, 0, 1000, '2017-01-13 18:21:37'),
(10, 'R01', 4, 35, 0, 1000, '2017-01-13 19:00:06');

-- --------------------------------------------------------

--
-- Table structure for table `kay_source`
--

CREATE TABLE `kay_source` (
  `sc_id` int(11) NOT NULL,
  `sc_code` varchar(12) NOT NULL,
  `sc_name` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kay_source`
--

INSERT INTO `kay_source` (`sc_id`, `sc_code`, `sc_name`) VALUES
(1, 'R01', 'Room No 1 - Kiki Kiswanto'),
(2, 'R02', 'Room No 2 - Lela Nurlaela Sari');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kay_electric`
--
ALTER TABLE `kay_electric`
  ADD PRIMARY KEY (`el_id`),
  ADD KEY `el_source` (`el_source`);

--
-- Indexes for table `kay_source`
--
ALTER TABLE `kay_source`
  ADD PRIMARY KEY (`sc_id`),
  ADD UNIQUE KEY `sc_code` (`sc_code`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kay_electric`
--
ALTER TABLE `kay_electric`
  MODIFY `el_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `kay_source`
--
ALTER TABLE `kay_source`
  MODIFY `sc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `kay_electric`
--
ALTER TABLE `kay_electric`
  ADD CONSTRAINT `kay_electric_ibfk_1` FOREIGN KEY (`el_source`) REFERENCES `kay_source` (`sc_code`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 16, 2021 at 12:03 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `additional services`
--

CREATE TABLE `additional services` (
  `ID_service` int(255) NOT NULL,
  `Name_service` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `additional services`
--

INSERT INTO `additional services` (`ID_service`, `Name_service`) VALUES
(4, 'Money'),
(5, 'GreedIsGood'),
(6, 'Warpten');

-- --------------------------------------------------------

--
-- Table structure for table `card`
--

CREATE TABLE `card` (
  `ID` int(255) NOT NULL,
  `Valid_thru` date NOT NULL,
  `ID_service` int(255) NOT NULL,
  `ID_client` int(255) NOT NULL,
  `ID_cur` int(255) NOT NULL,
  `ID_sys` int(255) NOT NULL,
  `ID_type` int(255) NOT NULL,
  `PIN` int(255) NOT NULL,
  `Proccessing` tinyint(1) NOT NULL,
  `Given` tinyint(1) NOT NULL,
  `Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `card`
--

INSERT INTO `card` (`ID`, `Valid_thru`, `ID_service`, `ID_client`, `ID_cur`, `ID_sys`, `ID_type`, `PIN`, `Proccessing`, `Given`, `Date`) VALUES
(4311, '2021-03-29', 4, 5, 3, 7, 4, 9999, 1, 0, '2021-04-21'),
(9998421, '2025-06-11', 4, 6, 3, 7, 3, 8888, 0, 0, '2021-04-22');

-- --------------------------------------------------------

--
-- Table structure for table `card type`
--

CREATE TABLE `card type` (
  `ID_type` int(255) NOT NULL,
  `Name_type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `card type`
--

INSERT INTO `card type` (`ID_type`, `Name_type`) VALUES
(3, 'Credit'),
(4, 'Debit'),
(5, 'Charge');

-- --------------------------------------------------------

--
-- Table structure for table `citizenship`
--

CREATE TABLE `citizenship` (
  `ID_country` int(255) NOT NULL,
  `Name_country` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `citizenship`
--

INSERT INTO `citizenship` (`ID_country`, `Name_country`) VALUES
(1, 'Kyrgyz'),
(13, 'Russian'),
(14, 'Ukrainian'),
(15, 'Kazakh'),
(16, 'Korean');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `ID_client` int(255) NOT NULL,
  `Full_name` varchar(255) NOT NULL,
  `Gender` varchar(255) NOT NULL,
  `Place_birth` varchar(255) NOT NULL,
  `ID_country` int(255) NOT NULL,
  `Series` varchar(255) NOT NULL,
  `ID_pass` int(255) NOT NULL,
  `Issue_date` date NOT NULL,
  `Issued_by` varchar(255) NOT NULL,
  `Code_department` varchar(255) NOT NULL,
  `Index_post` int(255) NOT NULL,
  `Adress` varchar(255) NOT NULL,
  `Phone_home` varchar(255) NOT NULL,
  `Phone_mob` varchar(255) NOT NULL,
  `E-mail` varchar(255) NOT NULL,
  `ID_status` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`ID_client`, `Full_name`, `Gender`, `Place_birth`, `ID_country`, `Series`, `ID_pass`, `Issue_date`, `Issued_by`, `Code_department`, `Index_post`, `Adress`, `Phone_home`, `Phone_mob`, `E-mail`, `ID_status`) VALUES
(5, 'Kartanbaev_Maksat_Kubatovich', 'Male', 'Bishkek', 1, '3131', 2222, '2021-03-29', 'KGB', '999', 720021, 'Bokonbaeva 61-21', '0703987456', '0703987456', 'strikermine@gmail.com', 1),
(6, 'Kim Maksim', 'Male', 'Bishkek', 13, '9999', 1234, '2021-03-30', 'KGB', '123', 720021, 'Bokonbaeva 61-21', '0703987456', '0703987456', 'maksim@gmail.com', 7);

-- --------------------------------------------------------

--
-- Table structure for table `currency`
--

CREATE TABLE `currency` (
  `ID_cur` int(255) NOT NULL,
  `Currency` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `currency`
--

INSERT INTO `currency` (`ID_cur`, `Currency`) VALUES
(3, 'Som'),
(4, 'Rubble'),
(5, 'Dollar'),
(6, 'Euro');

-- --------------------------------------------------------

--
-- Table structure for table `payment system`
--

CREATE TABLE `payment system` (
  `ID_sys` int(255) NOT NULL,
  `Name_sys` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment system`
--

INSERT INTO `payment system` (`ID_sys`, `Name_sys`) VALUES
(7, 'Visa'),
(8, 'MasterCard');

-- --------------------------------------------------------

--
-- Table structure for table `social status`
--

CREATE TABLE `social status` (
  `ID_status` int(255) NOT NULL,
  `Name_stat` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `social status`
--

INSERT INTO `social status` (`ID_status`, `Name_stat`) VALUES
(1, 'Married'),
(7, 'Working'),
(8, 'Dead');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `additional services`
--
ALTER TABLE `additional services`
  ADD PRIMARY KEY (`ID_service`);

--
-- Indexes for table `card`
--
ALTER TABLE `card`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID_cur` (`ID_cur`),
  ADD KEY `ID_client` (`ID_client`),
  ADD KEY `ID_service` (`ID_service`),
  ADD KEY `ID_sys` (`ID_sys`),
  ADD KEY `ID_type` (`ID_type`);

--
-- Indexes for table `card type`
--
ALTER TABLE `card type`
  ADD PRIMARY KEY (`ID_type`);

--
-- Indexes for table `citizenship`
--
ALTER TABLE `citizenship`
  ADD PRIMARY KEY (`ID_country`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`ID_client`),
  ADD KEY `ID_status` (`ID_status`),
  ADD KEY `ID_country` (`ID_country`);

--
-- Indexes for table `currency`
--
ALTER TABLE `currency`
  ADD PRIMARY KEY (`ID_cur`);

--
-- Indexes for table `payment system`
--
ALTER TABLE `payment system`
  ADD PRIMARY KEY (`ID_sys`);

--
-- Indexes for table `social status`
--
ALTER TABLE `social status`
  ADD PRIMARY KEY (`ID_status`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `additional services`
--
ALTER TABLE `additional services`
  MODIFY `ID_service` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `card type`
--
ALTER TABLE `card type`
  MODIFY `ID_type` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `citizenship`
--
ALTER TABLE `citizenship`
  MODIFY `ID_country` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `ID_client` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `currency`
--
ALTER TABLE `currency`
  MODIFY `ID_cur` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `payment system`
--
ALTER TABLE `payment system`
  MODIFY `ID_sys` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `social status`
--
ALTER TABLE `social status`
  MODIFY `ID_status` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `card`
--
ALTER TABLE `card`
  ADD CONSTRAINT `card_ibfk_1` FOREIGN KEY (`ID_cur`) REFERENCES `currency` (`ID_cur`),
  ADD CONSTRAINT `card_ibfk_2` FOREIGN KEY (`ID_client`) REFERENCES `clients` (`ID_client`),
  ADD CONSTRAINT `card_ibfk_3` FOREIGN KEY (`ID_service`) REFERENCES `additional services` (`ID_service`),
  ADD CONSTRAINT `card_ibfk_4` FOREIGN KEY (`ID_sys`) REFERENCES `payment system` (`ID_sys`),
  ADD CONSTRAINT `card_ibfk_5` FOREIGN KEY (`ID_type`) REFERENCES `card type` (`ID_type`);

--
-- Constraints for table `clients`
--
ALTER TABLE `clients`
  ADD CONSTRAINT `clients_ibfk_1` FOREIGN KEY (`ID_status`) REFERENCES `social status` (`ID_status`),
  ADD CONSTRAINT `clients_ibfk_2` FOREIGN KEY (`ID_country`) REFERENCES `citizenship` (`ID_country`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

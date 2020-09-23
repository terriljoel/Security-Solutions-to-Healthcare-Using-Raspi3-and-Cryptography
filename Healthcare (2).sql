-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 24, 2020 at 12:50 AM
-- Server version: 10.3.22-MariaDB-0+deb10u1
-- PHP Version: 7.3.14-1~deb10u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Healthcare`
--

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `id` int(6) NOT NULL,
  `fname` varchar(12) NOT NULL,
  `minit` varchar(10) NOT NULL,
  `lname` varchar(12) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `address` varchar(50) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `bloodgroup` varchar(6) NOT NULL,
  `dob` varchar(10) NOT NULL,
  `medical_issues` varchar(50) DEFAULT NULL,
  `guardian` varchar(20) NOT NULL,
  `guard_relationship` varchar(20) DEFAULT NULL,
  `adhar` varchar(16) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`id`, `fname`, `minit`, `lname`, `gender`, `address`, `mobile`, `bloodgroup`, `dob`, `medical_issues`, `guardian`, `guard_relationship`, `adhar`) VALUES
(1001, 'Vishal', 'V', 'Mada', 'male', 'Mangalor', '1234567890', 'B+ve', '22', 'none', 'Geetha', 'Son', '1234567890'),
(1002, 'Naman', 'C', 'Rai', 'male', 'mangalore', '1234567890', 'B+ve', '21', 'none', 'rai', 'son', NULL),
(1004, 'Yathi', 'G', 'N', 'male', 'Yeyyadi', '1234567890', 'O+ve', '21', 'None', 'Narayan', 'Son', NULL),
(1005, 'Vipin', 'M', 'S', 'male', 'Ashoknagar', '1234567890', 'B+ve', '21', 'none', 'Sundar', 'Son', '123456789'),
(1006, 'Vipin', 'M', 'S', 'male', 'Ashoknagar', '1234567890', 'B+ve', '21', 'none', 'Sundar', 'Son', NULL),
(1007, 'Vipin', 'M', 'S', 'male', 'Ashoknagar', '1234567890', 'B+ve', '21', 'none', 'Sundar', 'Son', NULL),
(1008, 'naman', 'VV', 'rai', 'male', 'mangalore', '1234567890', 'B+ve', '21', 'kjn', 'rai', 'son', NULL),
(1009, 'Arun', 'M ', 'Rao', '', 'mangalore', '1234567890', 'B+ve', '21', 'kjn', 'dskajns', 'son', NULL),
(1010, 'Arun', 'M ', 'Rao', 'male', 'mangalore', '1234567890', 'B+ve', '21', 'kjn', 'ads', 'son', NULL),
(1011, 'Harish', 'H', 'H', 'male', 'mangalore', '1234567890', 'B-ve', '12-09-1999', 'none', 'Latha', 'Son', '888888888888'),
(1012, 'Joel', 'John', 'Nazareth', 'male', 'Karkala', '9972335538', 'B+ve', '09-09-1998', 'nthng', 'flavia', 'mother', '814530560645'),
(1013, 'Varsha', 'p', 'narayan', 'female', 'Kadri', '1653665454', 'B-ve', '09-09-1998', 'corona', 'naprray', 'mother', '467854573256'),
(1015, 'hfrg', 'dfb', 'dfg', 'male', 'dfgfg', '98989898', 'B+ve', '09-09-1997', 'Covid19', 'Vrushali Rai', 'Gf', '111155556666'),
(1016, 'Teril', 'J', 'Nazareth', 'male', 'Karkala', '1234567890', 'B+ve', '12-12-1998', 'None', 'XYZ', 'Son', '123412341234'),
(1017, 'Vipin ', 'm', 's', 'male', 'Mangaluru', '9972335538', 'B+ve', '07-05-1998', 'fever', 'xyz', 'father', '814530560645'),
(1018, 'Terril ', 'Joel ', 'Nazareth', 'male', 'Karkala', '9972335538', 'B+ve', '09-09-1998', 'NA', 'J', 'G', '814530560645'),
(1020, 'dfg', 'dfg', 'gfb', 'male', 'bjjkh', '555', 'B+ve', '08-10-2000', 'dd', 'dsds', 'sdsd', '814576550000'),
(1021, 'Yathiraj', 'G', 'N', 'male', 'Kudla', '1234567890', 'B+ve', '12-09-1999', 'none', 'Narayan', 'Son', '123412341234'),
(1022, 'Tony', 'H ', 'Stark', 'male', 'Stark tower, New York', '5555555555', 'B-ve', '01-07-2005', 'Cancer', 'Pepper Potts', 'Spouse', '888887788925'),
(1023, 'AAAA', 'B', 'CCC', 'male', 'DDDDD', '1111111111', 'B+ve', '08-10-2000', 'mmm', 'dddd', 'dddd', '123456789012'),
(1024, 'Yathiraj', 'G ', 'Salian', 'male', 'Kudla', '9877655499', 'O+ve', '05-08-1998', 'None', 'Narayan', 'Son', '123412341234');

-- --------------------------------------------------------

--
-- Table structure for table `scanned_data`
--

CREATE TABLE `scanned_data` (
  `id` int(6) NOT NULL,
  `bodytemp` varchar(25) DEFAULT NULL,
  `heartrate` varchar(25) DEFAULT NULL,
  `ecg` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `scanned_data`
--

INSERT INTO `scanned_data` (`id`, `bodytemp`, `heartrate`, `ecg`) VALUES
(1011, '7c0b686241fa', '399d3add678f3302', '3bb6b67c'),
(1012, 'c4fa9efa8da4', 'c7ad', '7073e3a6'),
(1013, '1f9296db9f89', '187bffcd', 'f88e94fa'),
(1017, 'c4fa9efa8da4', '9d5be9a39d18', '7073e3a6'),
(1018, '638ddd170b7c', '214ba568e614a949', '6ddd83ac'),
(1021, '708546d8e569', '49bb20f441988d4f', '1b715ffb'),
(1022, 'ccb5f86886b0', '42864524efb5225a', 'bb0a5ae0'),
(1023, '8db6fbb8f2c3', 'd89f62545f0173a3', '8507e710'),
(1024, 'f4b0c0d86863', 'd113d6596c60ca47', 'f14b70c2');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(6) NOT NULL,
  `username` varchar(12) NOT NULL,
  `password` varchar(15) NOT NULL,
  `designation` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `designation`) VALUES
(1, 'admin', 'admin123', '0'),
(2, 'doctor', 'doctor', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `scanned_data`
--
ALTER TABLE `scanned_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1025;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `scanned_data`
--
ALTER TABLE `scanned_data`
  ADD CONSTRAINT `patient_id` FOREIGN KEY (`id`) REFERENCES `patients` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

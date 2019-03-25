-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 22, 2019 at 03:15 PM
-- Server version: 5.7.25-0ubuntu0.18.04.2
-- PHP Version: 7.2.15-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `AWLCRwanda2019`
--

-- --------------------------------------------------------

--
-- Table structure for table `awlc2019_accreditation`
--

CREATE TABLE `awlc2019_accreditation` (
  `id` int(10) UNSIGNED NOT NULL,
  `mediaHouseName` text NOT NULL,
  `mediaHouseEmail` varchar(50) NOT NULL,
  `mediaHousePhone` varchar(15) NOT NULL,
  `contactName` text NOT NULL,
  `contactEmail` varchar(50) NOT NULL,
  `contactPhone` varchar(15) NOT NULL,
  `representatives` text NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `awlc2019_accreditation`
--
ALTER TABLE `awlc2019_accreditation`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `mediaHouseEmail` (`mediaHouseEmail`),
  ADD UNIQUE KEY `contactEmail` (`contactEmail`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `awlc2019_accreditation`
--
ALTER TABLE `awlc2019_accreditation`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

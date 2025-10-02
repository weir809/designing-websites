-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 15, 2025 at 03:50 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pdo`
--

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` int(4) NOT NULL,
  `username` varchar(65) NOT NULL,
  `password` varbinary(201) NOT NULL,
  `email` varchar(65) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `second_name` varchar(30) NOT NULL,
  `address1` varchar(30) NOT NULL,
  `address2` varchar(30) NOT NULL,
  `postcode` varchar(15) NOT NULL,
  `town_city` varchar(30) NOT NULL,
  `mobile_phone` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `username`, `password`, `email`, `first_name`, `second_name`, `address1`, `address2`, `postcode`, `town_city`, `mobile_phone`) VALUES
(2, 'johnny', 0x445bc9c69c7e302f8129aac70bf0e6fc, 'john@asd.asd', 'John', 'Jones', '7 Kelvin Road', 'Flat 2', 'ED1 6TH', 'Edinburgh', '07856123456'),
(15, 'Kevin', 0x646f3649676146666330693863, 'kevin@sdf.asd', '', '', '', '', '', '', ''),
(16, 'Peter', 0x646f3649676146666330693863, 'peter@wer.asd', '', '', '', '', '', '', ''),
(18, 'Valerie', 0x646f3649676146666330693863, 'valerie@asddd.ert', '', '', '', '', '', '', ''),
(47, 'Malkz', 0x646f3649676146666330693863, 'malkz@malcolmlevon.com', '', '', '', '', '', '', ''),
(49, 'George', 0x646f3649676146666330693863, 'george@george.com', '', '', '', '', '', '', ''),
(54, 'Don', 0x646f3649676146666330693863, 'don@don.com', '', '', '', '', '', '', ''),
(55, 'Bilybob', 0x646f4c756834412e4c766a6851, 'alsdkja@asdkljas.com', '', '', '', '', '', '', ''),
(56, 'Colin', 0x646f3649676146666330693863, 'col@col.com', '', '', '', '', '', '', ''),
(57, 'Fred', 0x646f3649676146666330693863, 'fred@fred.com', '', '', '', '', '', '', ''),
(58, 'Pete', 0x646f3649676146666330693863, '56h@h.com', 'Peter', 'Anderson', '3 Highcourt Road', '', 'iv342sd', 'Glasgow', '07865212345'),
(59, 'mike1', 0x646f3649676146666330693863, '2h@h.com', 'Michael', 'Smith', '4 Highcourt Road', '', 'iv342sd', 'Glasgow', '07865212345');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

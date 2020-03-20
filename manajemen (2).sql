-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 20, 2020 at 05:55 AM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 5.6.36

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `manajemen`
--

-- --------------------------------------------------------

--
-- Table structure for table `departemen`
--

CREATE TABLE `departemen` (
  `id_dep` int(11) NOT NULL,
  `nm_dep` varchar(20) NOT NULL,
  `created_at` datetime NOT NULL,
  `modified_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `departemen`
--

INSERT INTO `departemen` (`id_dep`, `nm_dep`, `created_at`, `modified_at`) VALUES
(46, 'Finance', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `id_staff` int(11) NOT NULL,
  `nm_staff` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` char(32) NOT NULL,
  `created_at` datetime NOT NULL,
  `modified_at` datetime NOT NULL,
  `id_dep` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id_staff`, `nm_staff`, `username`, `password`, `created_at`, `modified_at`, `id_dep`) VALUES
(16, 'Admin baru ya', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 46),
(18, 'Admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', '2020-03-19 05:20:07', '0000-00-00 00:00:00', 0),
(29, 'Franky', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 46);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `departemen`
--
ALTER TABLE `departemen`
  ADD PRIMARY KEY (`id_dep`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id_staff`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `departemen`
--
ALTER TABLE `departemen`
  MODIFY `id_dep` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `id_staff` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 01, 2022 at 09:43 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nb1`
--

-- --------------------------------------------------------

--
-- Table structure for table `poszt`
--

CREATE TABLE `poszt` (
  `id` int(10) UNSIGNED NOT NULL,
  `posztnev` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `poszt`
--

INSERT INTO `poszt` (`id`, `posztnev`) VALUES
(1, 'bal oldali védő\r\n'),
(2, 'jobb oldali középpályás\r\n'),
(3, 'bal szélső\r\n'),
(4, 'védekező középpályás\r\n'),
(5, 'bal oldali középpályás\r\n'),
(6, 'belső középpályás\r\n'),
(7, 'jobb szélső\r\n'),
(8, 'jobb oldali védő\r\n'),
(9, 'kapus\r\n'),
(10, 'középcsatár\r\n'),
(11, 'középső védő\r\n'),
(12, 'támadó középpályás\r\n'),
(13, 'hátravont csatár\r\n'),
(14, 'jobboldali védő\r\n');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `poszt`
--
ALTER TABLE `poszt`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `poszt`
--
ALTER TABLE `poszt`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

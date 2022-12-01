-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: mysql.omega:3306
-- Generation Time: Dec 02, 2022 at 12:39 AM
-- Server version: 5.7.40-log
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tesztbazis22`
--

-- --------------------------------------------------------

--
-- Table structure for table `kommentek`
--

CREATE TABLE `kommentek` (
  `id` int(10) UNSIGNED NOT NULL,
  `comment_tartalom` varchar(100) NOT NULL DEFAULT '',
  `comment_idopont` datetime NOT NULL,
  `hir_id` int(10) NOT NULL,
  `user_name` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `kommentek`
--

INSERT INTO `kommentek` (`id`, `comment_tartalom`, `comment_idopont`, `hir_id`, `user_name`) VALUES
(33, 'Teszt szöveg hogy a komment megfelelően működik-e?', '2022-11-23 20:43:29', 1, 'teszt'),
(34, 'Teszt szöveg hogy a komment megfelelően működik-e most?', '2022-11-23 20:44:02', 1, 'teszt'),
(35, 'Itt jobban működik a kommentelés.', '2022-11-23 20:44:07', 2, 'teszt'),
(36, 'Tévedtem, most se jó a komment mező.', '2022-11-23 20:46:20', 2, 'teszt');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kommentek`
--
ALTER TABLE `kommentek`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kommentek`
--
ALTER TABLE `kommentek`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

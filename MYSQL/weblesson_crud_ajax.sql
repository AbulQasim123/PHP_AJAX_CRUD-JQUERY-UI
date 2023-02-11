-- phpMyAdmin SQL Dump
-- version 5.3.0-dev+20221207.ce5ce76a8d
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 12, 2022 at 09:20 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `weblesson_crud_ajax`
--

-- --------------------------------------------------------

--
-- Table structure for table `table_sample`
--

CREATE TABLE `table_sample` (
  `id` int(11) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `table_sample`
--

INSERT INTO `table_sample` (`id`, `first_name`, `last_name`) VALUES
(1, 'AbulQasim', 'Ansari'),
(2, 'Ram', 'Kumar'),
(3, 'Deepak', 'Sahu'),
(4, 'Rohit', 'Gupta');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `table_sample`
--
ALTER TABLE `table_sample`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `table_sample`
--
ALTER TABLE `table_sample`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

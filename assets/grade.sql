-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 31, 2023 at 09:23 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `study_society`
--

-- --------------------------------------------------------

--
-- Table structure for table `grade`
--
-- Dumping data for table `grade`
--

INSERT INTO `grade` (`grade_id`, `grade_name`, `grade_count`) VALUES
(1, 'SD - Kelas 1', 2),
(2, 'SD - Kelas 2 ', 3),
(3, 'SD - Kelas 3', 4),
(4, 'SD - Kelas 4', 5),
(5, 'SD - Kelas 5', 6),
(6, 'SD - Kelas 6', 4),
(7, 'SMP - Kelas 1', 4),
(8, 'SMP - Kelas 2', 2),
(9, 'SMP - Kelas 3', 1),
(10, 'SMA - Kelas 1', 3),
(11, 'SMA - Kelas 2', 1),
(12, 'SMA - Kelas 3', 2),
(13, 'SMK - Kelas 1', 1),
(14, 'SMK - Kelas 2', 4),
(15, 'SMK - Kelas 3', 3),
(16, 'Kuliah - Semester 1', 4),
(17, 'Kuliah - Semester 2', 2),
(18, 'Kuliah - Semester 3', 4),
(19, 'Kuliah - Semester 4', 2),
(20, 'Kuliah - Semester 5', 5),
(21, 'Kuliah - Semester 6', 4),
(22, 'Kuliah - Semester 7', 3),
(23, 'Kuliah - Semester 8', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `grade`
--
ALTER TABLE `grade`
  ADD PRIMARY KEY (`grade_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `grade`
--
ALTER TABLE `grade`
  MODIFY `grade_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

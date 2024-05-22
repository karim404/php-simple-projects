-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 18, 2023 at 05:11 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `oopclinic`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `id` int(11) NOT NULL,
  `date` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `doctors_id` int(11) DEFAULT NULL,
  `booking_name` varchar(255) DEFAULT NULL,
  `booking_phone` int(11) DEFAULT NULL,
  `booking_email` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id`, `date`, `status`, `user_id`, `doctors_id`, `booking_name`, `booking_phone`, `booking_email`) VALUES
(2, NULL, 'pending', 5, 6, 'hamada', 34535486, 'hamada@gmail.com'),
(3, NULL, 'approve', 5, 6, 'tarek', 2147483647, 'tarek@gmail.com'),
(4, NULL, 'approve', 5, 6, 'nbl', 2147483647, 'admin@admin.c'),
(5, NULL, 'pending', 5, 6, 'kjhgf', 3246532, 'snbfjsf@s.com'),
(6, NULL, 'pending', 5, 13, 'elsayed', 2153262, 'elsayed@gmail.com'),
(7, NULL, 'approve', 5, 7, 'khaled', 2147483647, 'khaled@k.com'),
(8, NULL, 'approve', 5, 7, 'mohesn', 324867, 'm.m@a.com');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` int(11) DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `message` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `phone`, `subject`, `message`) VALUES
(1, 'hamada', 'hamada@gmail.com', 56435, 'lknda', 'skafklefhadnfpefnkadnad'),
(2, 'ragab', 'ragab@gmail.com', 2036589612, 'money', 'hello im ragab'),
(3, 'ragabbb', 'ragabbb@gmail.com', 2036589612, 'saflh', 'lnsklflkhf'),
(4, 'tarek', 'tarek@gmail.com', 2147483647, 'kk,bufghk', 'jkjlnk.m.'),
(5, 'ragabbb', 'ragabbb@gmail.com', 2036589612, 'mfm,', 'adfhlh');

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `bio` varchar(255) DEFAULT NULL,
  `majors_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`id`, `name`, `image`, `bio`, `majors_id`) VALUES
(5, 'james', '../assets/images/doctor-image/dr12.jpg', 'hello im doctor  james', 5),
(6, 'jessy', '../assets/images/doctor-image/dr11.jpg', '', 5),
(7, 'Ali', '../assets/images/doctor-image/admin-2.png', 'hello im doctor Ali', 9),
(8, 'mike', '../assets/images/doctor-image/dr1.png', 'hello im doctor mike', 4),
(9, 'steve', '../assets/images/doctor-image/dr2.png', 'hello im doctor steve', 4),
(10, 'Emma', '../assets/images/doctor-image/dr3.png', 'hello iam doctor Emma', 4),
(11, 'Sarah', '../assets/images/doctor-image/dr4.png', 'hello iam doctor Sarah', 4),
(12, 'Gaiya', '../assets/images/doctor-image/dr5.png', 'hello iam doctor Gaiya', 10),
(13, 'Nolla', '../assets/images/doctor-image/dr7.jpg', 'hello iam doctor Nolla', 10);

-- --------------------------------------------------------

--
-- Table structure for table `majors`
--

CREATE TABLE `majors` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `majors`
--

INSERT INTO `majors` (`id`, `name`, `image`) VALUES
(4, 'Neurosurgery', 'assets/images/major-image/neurosurgery 1.jpg'),
(5, 'ORL', 'assets/images/major-image/ORL.jpg'),
(9, 'pediatric', 'assets/images/major-image/Petri 1.jpg'),
(10, 'Cardiology', 'assets/images/major-image/Cardiology.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `phone` int(11) DEFAULT NULL,
  `role` enum('0','1','2') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `phone`, `role`) VALUES
(5, 'karim', 'karimmoawad99@gmail.com', '$2y$10$/pofnbjQn1wsMF7Er75lMeeGij8bkCP0xXVQH.f/xToUx3SrH8daS', 2147483647, '0'),
(23, 'admin', 'admin@admin.com', '$2y$10$avt0tTENTDfDz4V2ADG6eumiUtsn075WPTRDQwDiebXGmZ7r7ScDW', 2147483647, '1'),
(30, 'hamada', 'hamada@gmail.com', '$2y$10$CyDRlwLbnwdjr0kFE52GWO5nPWEJA78.GDybLnv3/TXeqSheKQJG.', 34535486, '0'),
(31, 'admin2', 'admin2@admin.com', '$2y$10$ujDTJhNCQu1oXHKtyg5qI.EFrh3IMd.pp7hUXZdrp.6/6JXGLHC7K', 2147483647, '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `doctors_id` (`doctors_id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `majors_id` (`majors_id`);

--
-- Indexes for table `majors`
--
ALTER TABLE `majors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `majors`
--
ALTER TABLE `majors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `booking_ibfk_2` FOREIGN KEY (`doctors_id`) REFERENCES `doctors` (`id`);

--
-- Constraints for table `doctors`
--
ALTER TABLE `doctors`
  ADD CONSTRAINT `doctors_ibfk_1` FOREIGN KEY (`majors_id`) REFERENCES `majors` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

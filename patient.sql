-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Dec 15, 2022 at 05:14 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `patient`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(6) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `user_sex` varchar(50) NOT NULL,
  `user_religion` varchar(50) NOT NULL,
  `user_phone` int(15) NOT NULL,
  `user_address` varchar(100) NOT NULL,
  `user_nik` bigint(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_sex`, `user_religion`, `user_phone`, `user_address`, `user_nik`) VALUES
(16, 'Rizky', 'Male', 'Muslim', 87878787, 'Ciputat', 367452514542),
(17, 'Siti', 'Female', 'Muslim', 87878787, 'BSD', 346654632654),
(18, 'Kasih', 'Female', 'Protestant', 87878787, 'Pamulang', 346654632654),
(19, 'Adi', 'Male', 'Catholic', 87878787, 'Bintaro', 346654632654),
(20, 'Burhan', 'Male', 'Hindu', 87878787, 'Parung', 346654632654),
(21, 'Dian', 'Female', 'Buddhist', 87878787, 'Pamulang', 346654632654),
(22, 'Henry', 'Male', 'Confucian', 87878787, 'BSD', 346654632654);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

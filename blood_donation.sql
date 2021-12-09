-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 04, 2021 at 02:43 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blood_donation`
--

-- --------------------------------------------------------

--
-- Table structure for table `donor`
--

CREATE TABLE `donor` (
  `name` varchar(100) NOT NULL,
  `blood_group` varchar(10) NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(15) NOT NULL,
  `ph_no` varchar(15) NOT NULL,
  `address` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `donor`
--

INSERT INTO `donor` (`name`, `blood_group`, `dob`, `gender`, `ph_no`, `address`) VALUES
('VASIREDDY GANESH', 'A-', '2002-08-03', 'Male', '9550463088', '            vizag        '),
('Satish', 'A+', '2002-02-14', 'Male', '8341559846', '                 Guntur   '),
('NAVEEN KUMAR', 'A+', '2002-08-01', 'Male', '9666602584', '           Srikakulam         '),
('FIROZE', 'B+', '2002-02-01', 'Male', '9496542194', 'Vijayawada    ');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `passwrd` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `passwrd`) VALUES
(2, 'VASIREDDY GANESH', '19131A12B9@gvpce.ac.in', 'fa1d87bc7f85769ea9dee2e4957321ae'),
(3, 'Satish', 'satish@gmail.com', 'b8377b23bb86899405d2455cc6da3556'),
(4, 'NAVEEN KUMAR', 'naveenkumarvoonna1729@gmail.com', 'e691cb702f5d25642aa87009ef1948f8'),
(5, 'FIROZE', 'firoze@gmail.com', '235be8c99a4d0be798947881a40f0be1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

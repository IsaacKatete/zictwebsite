-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 06, 2020 at 06:34 AM
-- Server version: 10.1.38-MariaDB
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
-- Database: `hsmr`
--

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `id` int(5) NOT NULL,
  `name` varchar(20) NOT NULL,
  `roll` int(6) NOT NULL,
  `age` varchar(34) NOT NULL,
  `symptoms` text NOT NULL,
  `pcontact` varchar(11) NOT NULL,
  `photo` varchar(50) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`id`, `name`, `roll`, `age`, `symptoms`, `pcontact`, `photo`, `datetime`) VALUES
(48, 'Isaac Katete', 2222224, 'Western', '', '+2609771267', '22222242020-10-17-10-08.jpg', '2020-10-17 20:16:08'),
(51, 'IsaacD', 222233, 'Luapula', '', '+2609771267', '2222332020-10-17-10-48.jpg', '2020-10-17 20:18:23'),
(52, 'Mercy', 111122, '', '', '099999999', '1111222020-11-06-11-36.png', '2020-11-06 02:33:36'),
(53, 'Mercyg phim', 67, '', '', '0999999977', '0000672020-11-06-11-59.png', '2020-11-06 03:13:59'),
(60, 'Lucy', 333312, '12', '', '999999', '3333122020-11-06-11-32.jpg', '2020-11-06 03:38:32'),
(62, 'Lucy', 2147483647, '12', 'mm', '77777777', '777777777777777777772020-11-06-11-03.png', '2020-11-06 05:08:03');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(5) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `photo` varchar(50) NOT NULL,
  `status` varchar(12) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `username`, `password`, `photo`, `status`, `datetime`) VALUES
(21, 'Isaac Katete', 'isaackatetepj@gmail.com', 'Admin12345', '771a6ca130c238e7454cfcef5a3529b659c1c382', 'Admin12345.jpg', 'active', '2020-10-17 20:06:43'),
(22, 'Florence', 'mwabatricia06@gmail.com', 'Isaac_Katete', '771a6ca130c238e7454cfcef5a3529b659c1c382', 'Isaac_Katete.jpg', 'active', '2020-11-05 09:56:22');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roll` (`roll`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

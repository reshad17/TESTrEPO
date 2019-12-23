-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 25, 2019 at 06:21 AM
-- Server version: 5.7.19
-- PHP Version: 7.1.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `9800batch`
--

-- --------------------------------------------------------

--
-- Table structure for table `add_event`
--

CREATE TABLE `add_event` (
  `id` int(10) NOT NULL,
  `event_name` varchar(255) NOT NULL,
  `event_details` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `e_time` varchar(220) DEFAULT NULL,
  `event_time` varchar(255) DEFAULT NULL,
  `status` int(10) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `add_fund`
--

CREATE TABLE `add_fund` (
  `id` int(10) NOT NULL,
  `amount` int(255) NOT NULL,
  `help_fund` int(255) NOT NULL,
  `self_fund` int(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `add_info`
--

CREATE TABLE `add_info` (
  `id` int(11) NOT NULL,
  `org` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `age` varchar(255) DEFAULT NULL,
  `residential_address` varchar(255) DEFAULT NULL,
  `blood_group` varchar(255) DEFAULT NULL,
  `dob` varchar(255) DEFAULT NULL,
  `maritial_status` varchar(255) DEFAULT NULL,
  `school` varchar(255) DEFAULT NULL,
  `ssc_roll` varchar(255) DEFAULT NULL,
  `college` varchar(255) DEFAULT NULL,
  `hsc_roll` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `admin_auth`
--

CREATE TABLE `admin_auth` (
  `id` int(10) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'Admin',
  `status` int(10) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_auth`
--

INSERT INTO `admin_auth` (`id`, `username`, `password`, `email`, `role`, `status`) VALUES
(20, 'admin', 'e10adc3949ba59abbe56e057f20f883e', 'admin@gmail.com', 'Admin', 0),
(22, 'reshad', 'e10adc3949ba59abbe56e057f20f883e', 'reshad@gmail.com', 'SuperAdmin', 0),
(23, 'Nasir', 'e10adc3949ba59abbe56e057f20f883e', 'nasir@gmail.com', 'Finance', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `mail_verify` varchar(255) DEFAULT '0',
  `otp` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `phone`, `username`, `password`, `mail_verify`, `otp`) VALUES
(1, 'reshadmollick22@gmail.com', '01738851110', 'reshad', 'e10adc3949ba59abbe56e057f20f883e', '1', 78316);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `add_event`
--
ALTER TABLE `add_event`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `add_fund`
--
ALTER TABLE `add_fund`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `add_info`
--
ALTER TABLE `add_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_auth`
--
ALTER TABLE `admin_auth`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `add_event`
--
ALTER TABLE `add_event`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `add_fund`
--
ALTER TABLE `add_fund`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `add_info`
--
ALTER TABLE `add_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `admin_auth`
--
ALTER TABLE `admin_auth`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

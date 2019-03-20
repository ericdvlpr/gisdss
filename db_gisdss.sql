-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 20, 2019 at 02:37 PM
-- Server version: 10.1.24-MariaDB
-- PHP Version: 7.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_gisdss`
--

-- --------------------------------------------------------

--
-- Table structure for table `action_plan`
--

CREATE TABLE `action_plan` (
  `ac_plan_id` int(11) NOT NULL,
  `warning_plan_id` int(11) NOT NULL,
  `criteria` varchar(255) NOT NULL,
  `evac_plan` text NOT NULL,
  `interpretation` varchar(250) NOT NULL,
  `action_required` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `action_plan`
--

INSERT INTO `action_plan` (`ac_plan_id`, `warning_plan_id`, `criteria`, `evac_plan`, `interpretation`, `action_required`) VALUES
(1, 1, '0-30', 'Monitoring Status', '', ''),
(2, 1, '31-60 ', 'Preparedness status', '', ''),
(3, 1, '61-120', 'Response Status', '', ''),
(5, 1, '121-170 ', 'Response Status', '', ''),
(6, 1, '171-220 ', 'Response Status', '', ''),
(7, 1, '221', 'Response Status', '', ''),
(8, 2, '0', 'None', '', ''),
(9, 2, '9-12', '2 meters above sea level', '', ''),
(10, 2, '18-20', '4 meters above sea level', '', ''),
(11, 2, '27-30', '6-8 meters above sea level', '', ''),
(12, 3, '0', 'Normal', '', ''),
(13, 3, '30-40', 'Alarming', '', ''),
(14, 3, '41-60', 'Critical', '', ''),
(15, 3, '61-180', 'Imminent', '', ''),
(16, 3, '180', 'Flood in progress', '', ''),
(17, 4, '0-59', 'normal', '', ''),
(18, 4, '50-60', 'Alarming', '', ''),
(19, 4, '180', 'Critical', '', ''),
(20, 4, '180', 'Imminent', '', ''),
(21, 4, '180', 'Landslide Phase', '', ''),
(22, 5, '0', 'normal', '', ''),
(23, 5, '20-30', 'Abnormal (Alert and Monitoring Status)', '', ''),
(24, 5, '31-40', 'Critical Preparedness Status', '', ''),
(25, 5, '41-55', 'Imminent (Evacuation Status)', '', ''),
(26, 5, '56-60', 'Destructive mudflow initiates', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `advisory`
--

CREATE TABLE `advisory` (
  `advisory_id` int(11) NOT NULL,
  `issue_no` int(11) NOT NULL,
  `issue_date` varchar(11) NOT NULL,
  `alrt_wind` int(11) NOT NULL,
  `alrt_wave` int(11) NOT NULL,
  `alrt_rain` int(11) NOT NULL,
  `action_required` text NOT NULL,
  `alert_type` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `advisory`
--

INSERT INTO `advisory` (`advisory_id`, `issue_no`, `issue_date`, `alrt_wind`, `alrt_wave`, `alrt_rain`, `action_required`, `alert_type`) VALUES
(1, 2147483647, '3/8/2019', 300, 30, 201, '', ''),
(2, 2147483647, '3/8/2019', 300, 30, 221, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `barangay`
--

CREATE TABLE `barangay` (
  `brgy_id` int(11) NOT NULL,
  `brgy_name` varchar(255) NOT NULL,
  `lat` text NOT NULL,
  `longi` text NOT NULL,
  `flood` int(11) NOT NULL,
  `storm_surge` int(11) NOT NULL,
  `tsunami` int(11) NOT NULL,
  `landslide` int(11) NOT NULL,
  `population` decimal(15,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barangay`
--

INSERT INTO `barangay` (`brgy_id`, `brgy_name`, `lat`, `longi`, `flood`, `storm_surge`, `tsunami`, `landslide`, `population`) VALUES
(50513001, 'Agol', '13.0838', '123.4651', 1, 0, 0, 0, '1461.00'),
(50513002, 'Alabangpuro', '13.0479', '123.4825', 0, 0, 0, 1, '1130.00'),
(50513003, 'Basicao Coastal', '13.0606', '123.4052', 1, 1, 1, 1, '2486.00'),
(50513004, 'Basicao Interior', '13.0941', '123.4861', 1, 0, 0, 1, '1320.00'),
(50513005, 'Banawan (Binawan)', '13.0447', '123.4488', 1, 0, 0, 1, '3232.00'),
(50513006, 'Binodegahan', '13.0639', '123.4665', 1, 0, 0, 1, '2940.00'),
(50513007, 'Buenavista', '13.0005', '123.4743', 1, 1, 1, 0, '1186.00'),
(50513008, 'Buyo', '13.0522', '123.5226', 1, 0, 0, 1, '484.00'),
(50513009, 'Caratagan', '13.0433', '123.4638', 1, 0, 0, 1, '4817.00'),
(50513010, 'Cuyaoyao', '13.0976', '123.4602', 0, 0, 0, 0, '1852.00'),
(50513011, 'Flores', '13.0737', '123.4440', 1, 0, 0, 1, '3015.00'),
(50513012, 'Lawinon', '13.0017', '123.4836', 1, 0, 0, 1, '1698.00'),
(50513013, 'Macasitas', '13.0522', '123.4988', 1, 0, 0, 1, '453.00'),
(50513014, 'Malapay', '13.0674', '123.5052', 1, 0, 0, 1, '1270.00'),
(50513015, 'Malidong ', '13.0226', '123.4669', 1, 1, 1, 1, '2512.00'),
(50513016, 'Mamlad ', '13.0357', '123.4984', 1, 0, 0, 1, '672.00'),
(50513017, 'Marigondon ', '13.0550', '123.4307', 1, 1, 1, 1, '1367.00'),
(50513018, 'Matanglad ', '13.0634', '123.4532', 1, 0, 0, 1, '980.00'),
(50513019, 'Nablangbulod ', '13.0669', '123.4861', 1, 0, 0, 1, '700.00'),
(50513020, 'Oringon ', '13.0210', '123.4859', 1, 0, 0, 1, '1024.00'),
(50513021, 'Palapas ', '13.1082', '123.4759', 1, 0, 0, 1, '1653.00'),
(50513022, 'Panganiran ', '13.0853', '123.4137', 1, 0, 0, 1, '985.00'),
(50513023, 'Barangay 1 (Poblacion)', '13.025909', '123.450615', 1, 1, 1, 1, '5885.00'),
(50513024, 'Barangay 2 (Poblacion)', '13.028872', '123.449623', 1, 1, 1, 0, '1643.00'),
(50513025, 'Barangay 3 (Poblacion)', '13.030323', '123.445107', 1, 1, 1, 0, '1278.00'),
(50513026, 'Barangay 4 (Poblacion)', '13.035755', '123.447937', 1, 1, 1, 0, '956.00'),
(50513027, 'Barangay 5 (Poblacion)', '13.029662', '123.44342', 1, 1, 1, 0, '2335.00'),
(50513028, 'Rawis ', '13.0394', '123.5146', 1, 0, 0, 1, '986.00'),
(50513029, 'Salvacion ', '13.0833', '123.5084', 1, 0, 0, 1, '628.00'),
(50513030, 'Sto. Cristo ', '13.0921', '123.4381', 1, 0, 0, 1, '3232.00'),
(50513031, 'Sukip', '13.0681', '123.5282', 1, 0, 0, 1, '1245.00'),
(50513032, 'Tibabo', '13.0978', '123.5053', 1, 0, 0, 1, '1080.00'),
(50513033, 'La Medalla', '13.0443', '123.4569', 1, 0, 0, 1, '1344.00');

-- --------------------------------------------------------

--
-- Table structure for table `forecast`
--

CREATE TABLE `forecast` (
  `forecast_id` int(11) NOT NULL,
  `issue_no` varchar(255) NOT NULL,
  `issue_date` varchar(15) NOT NULL,
  `valid` varchar(25) NOT NULL,
  `wind` int(11) NOT NULL,
  `rain` int(11) NOT NULL,
  `wave` int(11) NOT NULL,
  `temp` decimal(11,0) NOT NULL,
  `humid` decimal(11,0) NOT NULL,
  `sunrise` varchar(11) NOT NULL,
  `sunset` varchar(11) NOT NULL,
  `moonrise` varchar(11) NOT NULL,
  `moonset` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `forecast`
--

INSERT INTO `forecast` (`forecast_id`, `issue_no`, `issue_date`, `valid`, `wind`, `rain`, `wave`, `temp`, `humid`, `sunrise`, `sunset`, `moonrise`, `moonset`) VALUES
(1, '1549628171746', '02/08/2019', '02/09/2019', 21, 51, 31, '0', '0', '', '', '', ''),
(2, '1549628819776', '02/08/2019', '02/09/2019', 55, 3, 3, '0', '0', '', '', '', ''),
(3, '1550575014448', '02/19/2019', '02/20/2019', 300, 200, 30, '25', '25', '05:05', '17:30', '18:00', '05:00');

-- --------------------------------------------------------

--
-- Table structure for table `resident`
--

CREATE TABLE `resident` (
  `res_id` int(11) NOT NULL,
  `res_name` text NOT NULL,
  `res_brgy` int(11) NOT NULL,
  `res_username` text NOT NULL,
  `res_password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `resident`
--

INSERT INTO `resident` (`res_id`, `res_name`, `res_brgy`, `res_username`, `res_password`) VALUES
(1, 'tess tess', 50513003, 'test', '$2y$10$hnSEwqlQBFsv/urtRxs0PeFJ2ZQ8C2ZqTVjLabdkLLAhuap9RiPry'),
(2, 'Try', 50513001, 'try', '$2y$10$hrYetlwNDsb1R9c7J1ehROAF7PBZTKYJN5Z92/4hEJrkFWDLxBo9W');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `access` int(11) NOT NULL,
  `brgy` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `username`, `password`, `access`, `brgy`) VALUES
(1, 'Admin', 'admin', '$2y$10$z0P1TI0IJan/lAYqOgHbF.yxzeSacXcFmdNfh1oStHHY5/NGqJQN.', 0, 0),
(2, 'kapitan', 'kap', '$2y$10$egDYllLPESlPHE/P1.b0R.1ExOl81SOQTvcLgrcRs/htFpUA4z9L6', 2, 50513001),
(3, 'user1', 'user1', '$2y$10$J7Nky6yXzqjm3LDVkAVLGekk3aHNkPHeHCVyOlDUX93B/QtP3.JyC', 1, 0),
(4, 'user2', 'user2', '$2y$10$qvYHz8K8SyQdhoPxzSGcc.TU0RpImcubPFfgjd9T3qKUL9IUXpVPe', 1, 0),
(5, 'kagawad', 'kagawad', '$2y$10$VEWHtbm19fErGbLHULyY2.fgSqSg3RPI8xIVhGTb7VkTDl79SHYg6', 2, 50513001);

-- --------------------------------------------------------

--
-- Table structure for table `warning_signals`
--

CREATE TABLE `warning_signals` (
  `warning_id` int(11) NOT NULL,
  `warning_name` varchar(250) NOT NULL,
  `warning_description` text NOT NULL,
  `color` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `warning_signals`
--

INSERT INTO `warning_signals` (`warning_id`, `warning_name`, `warning_description`, `color`) VALUES
(2, 'Storm surge', 'Storm surge', '#00a65a'),
(3, 'Flood', 'Flood', '#dd4b39'),
(4, 'Landslide', 'Landslide', '#00a65a'),
(5, 'Tsunami', 'Tsunami', '#0074b8');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `action_plan`
--
ALTER TABLE `action_plan`
  ADD PRIMARY KEY (`ac_plan_id`);

--
-- Indexes for table `advisory`
--
ALTER TABLE `advisory`
  ADD PRIMARY KEY (`advisory_id`);

--
-- Indexes for table `barangay`
--
ALTER TABLE `barangay`
  ADD PRIMARY KEY (`brgy_id`);

--
-- Indexes for table `forecast`
--
ALTER TABLE `forecast`
  ADD PRIMARY KEY (`forecast_id`);

--
-- Indexes for table `resident`
--
ALTER TABLE `resident`
  ADD PRIMARY KEY (`res_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `warning_signals`
--
ALTER TABLE `warning_signals`
  ADD PRIMARY KEY (`warning_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `action_plan`
--
ALTER TABLE `action_plan`
  MODIFY `ac_plan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `advisory`
--
ALTER TABLE `advisory`
  MODIFY `advisory_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `forecast`
--
ALTER TABLE `forecast`
  MODIFY `forecast_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `resident`
--
ALTER TABLE `resident`
  MODIFY `res_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `warning_signals`
--
ALTER TABLE `warning_signals`
  MODIFY `warning_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

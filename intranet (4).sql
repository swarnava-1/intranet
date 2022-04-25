-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 25, 2022 at 07:04 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `intranet`
--

-- --------------------------------------------------------

--
-- Table structure for table `designation`
--

CREATE TABLE `designation` (
  `id` int(11) NOT NULL,
  `designation_name` varchar(55) NOT NULL,
  `status` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `designation`
--

INSERT INTO `designation` (`id`, `designation_name`, `status`) VALUES
(1, 'HR Manager &  business admin', '1'),
(2, 'Junior software developer', '1'),
(3, 'Senior software engineer', '1');

-- --------------------------------------------------------

--
-- Table structure for table `holiday`
--

CREATE TABLE `holiday` (
  `id` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `holiday`
--

INSERT INTO `holiday` (`id`, `start_date`, `end_date`) VALUES
(1, '2022-04-15', '2022-04-15');

-- --------------------------------------------------------

--
-- Table structure for table `leave`
--

CREATE TABLE `leave` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `leave_type` varchar(25) NOT NULL,
  `leave_purpose` varchar(25) NOT NULL,
  `leave_date_from` date NOT NULL,
  `leave_date_to` date NOT NULL,
  `approved_to` varchar(25) NOT NULL,
  `leave_status` tinyint(1) NOT NULL,
  `approved_by` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `leave`
--

INSERT INTO `leave` (`id`, `user_id`, `leave_type`, `leave_purpose`, `leave_date_from`, `leave_date_to`, `approved_to`, `leave_status`, `approved_by`) VALUES
(7, 4, 'medical', 'test', '2022-04-01', '2022-04-01', '1,6', 1, '1'),
(10, 4, 'casual', 'test121456', '2022-04-01', '2022-04-04', '1,5', 1, '1'),
(11, 4, 'casual', 'testing', '2022-04-11', '2022-04-11', '6', 1, '1'),
(12, 4, 'casual', 'test121', '2022-04-08', '2022-04-08', '1,5,6', 1, '1'),
(13, 4, 'medical', 'test', '2022-04-04', '2022-04-14', '1,5,6', 1, '5'),
(14, 4, 'medical', 'test', '2022-04-11', '2022-04-12', '1,5,6', 1, '1'),
(15, 4, 'casual', 'test', '2022-04-07', '2022-04-08', '1,5,6', 1, '5'),
(16, 0, 'medical', 'test', '2022-04-13', '2022-04-11', '1,6', 1, '1'),
(17, 0, 'medical', 'test46464', '2022-04-13', '2022-04-13', '1', 1, '5'),
(18, 0, 'medical', 'test', '2022-04-07', '2022-04-12', '1', 1, '1'),
(19, 0, 'casual', 'test121', '2022-04-07', '2022-04-08', '1,5,6', 1, '1'),
(20, 0, 'medical', 'test121', '2022-04-07', '2022-04-12', '1,5,6', 1, '1'),
(21, 0, 'medical', 'test121', '2022-04-07', '2022-04-12', '1,5', 1, '1'),
(22, 0, 'medical', 'ererer', '2022-04-08', '2022-04-08', '1,5', 1, '1');

-- --------------------------------------------------------

--
-- Table structure for table `monthly_wfh`
--

CREATE TABLE `monthly_wfh` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `wfh_count` int(11) NOT NULL,
  `month` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `monthly_wfh`
--

INSERT INTO `monthly_wfh` (`id`, `user_id`, `wfh_count`, `month`) VALUES
(1, 4, 0, 'April'),
(2, 4, 2, 'May'),
(3, 4, 2, 'June'),
(4, 4, 2, 'July'),
(5, 4, 2, 'August'),
(6, 4, 2, 'September'),
(7, 4, 2, 'October'),
(8, 4, 0, 'November'),
(9, 4, 2, 'March'),
(10, 4, 0, 'December'),
(11, 4, 0, 'January'),
(12, 4, 0, 'February');

-- --------------------------------------------------------

--
-- Table structure for table `page`
--

CREATE TABLE `page` (
  `id` int(11) NOT NULL,
  `sl_no` varchar(15) NOT NULL,
  `location` text NOT NULL,
  `created_by` varchar(15) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` varchar(25) NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `page`
--

INSERT INTO `page` (`id`, `sl_no`, `location`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(1, 'PG1', 'user/dashboard', '1', '2022-03-24 17:10:39', '1', '2022-03-31 10:07:35');

-- --------------------------------------------------------

--
-- Table structure for table `permission`
--

CREATE TABLE `permission` (
  `id` int(11) NOT NULL,
  `menu_name` varchar(20) NOT NULL,
  `submenu` varchar(25) NOT NULL,
  `page_name` varchar(25) NOT NULL,
  `link_page` tinyint(1) NOT NULL,
  `order_no` int(11) NOT NULL,
  `action` varchar(25) NOT NULL,
  `description` varchar(25) NOT NULL,
  `created_by` varchar(25) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` varchar(25) NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `permission`
--

INSERT INTO `permission` (`id`, `menu_name`, `submenu`, `page_name`, `link_page`, `order_no`, `action`, `description`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(7, 'Access Control', 'test34234', '1', 0, 12, 'edit', 'test12', '1', '2022-03-29 17:37:05', '1', '0000-00-00 00:00:00'),
(8, 'Access Control', 'test', '1', 0, 1, 'edit', 'test122', '1', '2022-03-29 17:44:56', '1', '2022-03-29 18:00:10');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `role_name` varchar(25) NOT NULL,
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `role_name`, `status`) VALUES
(1, 'Admin', 1),
(2, 'employee', 1);

-- --------------------------------------------------------

--
-- Table structure for table `role_permission`
--

CREATE TABLE `role_permission` (
  `id` int(11) NOT NULL,
  `role_id` varchar(20) NOT NULL,
  `permission_id` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `total_leave`
--

CREATE TABLE `total_leave` (
  `id` int(11) NOT NULL,
  `leave_count` int(25) NOT NULL,
  `user_id` int(25) NOT NULL,
  `leave_type` varchar(20) NOT NULL,
  `session` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `total_leave`
--

INSERT INTO `total_leave` (`id`, `leave_count`, `user_id`, `leave_type`, `session`) VALUES
(1, 12, 4, 'casual', '2022-23'),
(2, 12, 4, 'medical', '2022-23');

-- --------------------------------------------------------

--
-- Table structure for table `total_wfh`
--

CREATE TABLE `total_wfh` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `wfh_count` int(11) NOT NULL,
  `session` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `total_wfh`
--

INSERT INTO `total_wfh` (`id`, `user_id`, `wfh_count`, `session`) VALUES
(1, 4, 18, '2022-2023');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `user_name` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `first_name` varchar(55) NOT NULL,
  `middle_name` varchar(25) NOT NULL,
  `last_name` varchar(25) NOT NULL,
  `email` varchar(25) NOT NULL,
  `role_id` varchar(15) NOT NULL,
  `designation` varchar(55) NOT NULL,
  `status` int(2) NOT NULL,
  `created_by` varchar(25) NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_by` varchar(25) NOT NULL,
  `updated_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `user_name`, `password`, `first_name`, `middle_name`, `last_name`, `email`, `role_id`, `designation`, `status`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(1, 'Brinda', '123456', 'Brinda', 'test1', 'Chakraborty', 'bchakraborty@centreax.com', '1', '1', 1, '1', '2022-03-17 05:13:00', '1', '2022-03-28 18:00:22'),
(4, 'Swarnava', '1234', 'swarnava', 'test', 'Banerjee', 'swarnavabannerjee98@gmail', '2', '2', 1, '4', '2022-03-31 12:02:33', '4', '2022-04-22 16:29:08'),
(5, 'Indranil', '1234', 'Indranil', '', 'Banerjee', 'jhurleyfilm@gmail.com', '2', '2', 1, '4', '2022-04-01 16:15:41', '4', NULL),
(6, 'Abhisinchan', '1234', 'Abhisinchan', 'test', 'Ghosh', 'abhi.dcss.12@gmail.com', '2', '3', 1, '4', '2022-04-01 16:27:42', '4', '2022-04-01 16:28:35');

-- --------------------------------------------------------

--
-- Table structure for table `work_from_home`
--

CREATE TABLE `work_from_home` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `wfh_purpose` varchar(25) NOT NULL,
  `wfh_date_from` date NOT NULL,
  `wfh_date_to` date NOT NULL,
  `approved_to` varchar(25) NOT NULL,
  `wfh_status` tinyint(1) NOT NULL,
  `approved_by` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `work_from_home`
--

INSERT INTO `work_from_home` (`id`, `user_id`, `wfh_purpose`, `wfh_date_from`, `wfh_date_to`, `approved_to`, `wfh_status`, `approved_by`) VALUES
(100, 0, 'test123', '2022-04-22', '2022-04-22', '1,5', 1, '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `designation`
--
ALTER TABLE `designation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `holiday`
--
ALTER TABLE `holiday`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leave`
--
ALTER TABLE `leave`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `monthly_wfh`
--
ALTER TABLE `monthly_wfh`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `page`
--
ALTER TABLE `page`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permission`
--
ALTER TABLE `permission`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_permission`
--
ALTER TABLE `role_permission`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `total_leave`
--
ALTER TABLE `total_leave`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `total_wfh`
--
ALTER TABLE `total_wfh`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `work_from_home`
--
ALTER TABLE `work_from_home`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `designation`
--
ALTER TABLE `designation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `holiday`
--
ALTER TABLE `holiday`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `leave`
--
ALTER TABLE `leave`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `monthly_wfh`
--
ALTER TABLE `monthly_wfh`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `page`
--
ALTER TABLE `page`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `permission`
--
ALTER TABLE `permission`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `role_permission`
--
ALTER TABLE `role_permission`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `total_leave`
--
ALTER TABLE `total_leave`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `total_wfh`
--
ALTER TABLE `total_wfh`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `work_from_home`
--
ALTER TABLE `work_from_home`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

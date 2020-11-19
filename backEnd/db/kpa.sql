-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 19, 2020 at 04:58 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kpa`
--

-- --------------------------------------------------------

--
-- Table structure for table `kpa_notice`
--

CREATE TABLE `kpa_notice` (
  `id` int(6) NOT NULL,
  `notice_topic` varchar(300) NOT NULL,
  `notice_text` text NOT NULL,
  `notifier_user_id` int(6) NOT NULL,
  `notifier_email` varchar(100) NOT NULL,
  `published_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kpa_notice`
--

INSERT INTO `kpa_notice` (`id`, `notice_topic`, `notice_text`, `notifier_user_id`, `notifier_email`, `published_date`, `status`) VALUES
(1, 'defense', 'defense will to tomorrow', 0, '', '2020-02-18 09:25:00', 1),
(2, 'defense', 'defense will to tomorrow', 0, '', '2020-02-18 09:25:01', 1),
(3, 'email notification', 'this is the testing phase of email notification', 0, '', '2020-02-18 08:33:59', 1);

-- --------------------------------------------------------

--
-- Table structure for table `kpa_programming_language`
--

CREATE TABLE `kpa_programming_language` (
  `id` int(6) NOT NULL,
  `language_name` varchar(100) NOT NULL,
  `project_code` int(6) NOT NULL,
  `project_year` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kpa_programming_language`
--

INSERT INTO `kpa_programming_language` (`id`, `language_name`, `project_code`, `project_year`) VALUES
(1, 'HTML', 111111, '2074'),
(2, 'PHP', 222222, '2074'),
(3, 'HTML', 111111, '2075'),
(4, 'PHP', 222222, '2075'),
(5, 'JavaScript', 444444, '2076'),
(6, 'JavaScript', 444444, '2076'),
(7, 'HTML', 555555, '2076'),
(8, 'PHP', 0, '2076'),
(9, 'PHP', 223454, '2076'),
(10, 'PHP', 767676, '2076'),
(11, 'PHP', 656565, '2076'),
(12, 'HTML', 878787, '2073'),
(13, 'JavaScript', 546565, '2072'),
(14, 'PHP', 56565, '2071'),
(15, 'Javascript', 767676, '2074'),
(16, 'JavaScript', 89898, '2074'),
(17, 'Javascript', 767676, '2074'),
(18, 'JavaScript', 89898, '2074');

-- --------------------------------------------------------

--
-- Table structure for table `kpa_project_list`
--

CREATE TABLE `kpa_project_list` (
  `id` int(6) NOT NULL,
  `project_title` varchar(200) NOT NULL,
  `proj_descrip` text NOT NULL,
  `proj_thumb` varchar(50) NOT NULL,
  `category` enum('Management System','Commerce','Robotics','Games','ML and AI','Others') NOT NULL,
  `year` enum('1','2','3','4') NOT NULL,
  `semester` enum('First','Second','Third','Fourth','Fifth','Sixth','Seventh','Eighth') NOT NULL,
  `faculty` enum('B.E. Computer','B.E. Electronics','','') NOT NULL,
  `project_id` int(6) NOT NULL,
  `is_verified` tinyint(1) NOT NULL DEFAULT 1,
  `verified_by_id` int(6) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kpa_project_list`
--

INSERT INTO `kpa_project_list` (`id`, `project_title`, `proj_descrip`, `proj_thumb`, `category`, `year`, `semester`, `faculty`, `project_id`, `is_verified`, `verified_by_id`, `status`) VALUES
(1, 'Library Management System', 'This project manages the system of library.', 'lms1.1.png', 'Management System', '2', 'Third', 'B.E. Computer', 74, 1, 133345, 1),
(2, 'Hospital Management System', 'This project manages the system of hospital.', 'robot.jpg', 'Management System', '4', 'Seventh', 'B.E. Computer', 77, 1, 333333, 1),
(7, 'Library Management System', 'This project manages the system of library.', 'lms1.1.png', 'Management System', '3', 'Fifth', 'B.E. Computer', 74, 1, 133345, 1),
(8, 'Hospital Management System', 'This project manages the system of hospital.', 'robot.jpg', 'Management System', '4', 'Seventh', 'B.E. Computer', 77, 1, 333333, 1),
(9, 'Library Management System', 'This project manages the system of library.', 'lms1.1.png', 'Management System', '3', 'Fifth', 'B.E. Computer', 74, 1, 133345, 1),
(10, 'Hospital Management System', 'This project manages the system of hospital.', 'robot.jpg', 'Management System', '4', 'Seventh', 'B.E. Computer', 77, 1, 333333, 1),
(11, 'Library Management System', 'This project manages the system of library.', 'lms1.1.png', 'Management System', '3', 'Fifth', 'B.E. Computer', 74, 1, 133345, 1),
(12, 'Hospital Management System', 'This project manages the system of hospital.', 'lms1.1.png', 'Management System', '4', 'First', 'B.E. Computer', 77, 1, 333333, 1),
(13, 'test', 'test', 'logo.png', 'Management System', '1', 'First', 'B.E. Computer', 0, 1, 0, 1),
(32, 'wqewqe', 'dsddda', 'fb.jpg', 'Management System', '1', 'First', 'B.E. Computer', 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `kpa_pwd_reset`
--

CREATE TABLE `kpa_pwd_reset` (
  `id` int(6) NOT NULL,
  `email` varchar(100) NOT NULL,
  `reset_key` int(6) NOT NULL,
  `sent_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `sent_time` varchar(50) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kpa_pwd_reset`
--

INSERT INTO `kpa_pwd_reset` (`id`, `email`, `reset_key`, `sent_date`, `sent_time`, `status`) VALUES
(26, 'rimpahang@gmail.com', 304009, '2020-02-14 17:24:55', '1581701095', 0),
(30, 'rimpahang@gmail.com', 868306, '2020-02-16 09:41:22', '1581846082', 0),
(31, 'rimpahang@gmail.com', 705670, '2020-02-16 09:42:04', '1581846124', 0),
(32, 'nrshroka@gmail.com', 324730, '2020-11-19 10:55:54', '1605783354', 1),
(33, 'nrshroka@gmail.com', 398283, '2020-11-19 10:57:04', '1605783424', 0);

-- --------------------------------------------------------

--
-- Table structure for table `kpa_user`
--

CREATE TABLE `kpa_user` (
  `id` int(6) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_type` enum('normal_user','admin','super_admin','guest') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'normal_user',
  `address` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `semester` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `department` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `aboutme` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret_key` varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remarks` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `postby_id` int(6) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `is_verified` tinyint(1) DEFAULT 0,
  `verifiedby_id` int(6) DEFAULT 1,
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `status` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kpa_user`
--

INSERT INTO `kpa_user` (`id`, `name`, `username`, `email`, `password`, `user_type`, `address`, `semester`, `department`, `aboutme`, `secret_key`, `remarks`, `postby_id`, `created_at`, `is_verified`, `verifiedby_id`, `updated_at`, `status`) VALUES
(7, 'Dhruba Rai', 'rimpahang', 'rimpahang@gmail.com', '8d909b810b4a43cdb83c6c12a129660f', 'super_admin', '', '', '', '', NULL, NULL, 1, '2019-08-02 04:25:41', 1, 1, '2020-02-16 15:51:47', 1),
(8, 'sabin shrestha', 'sabin', 'alchinibas123@gmail.com', '5d41402abc4b2a76b9719d911017c592', 'admin', '', '', '', '', NULL, NULL, 1, '2019-08-06 17:32:50', 1, 1, '2020-02-18 14:19:56', 1),
(9, 'Naresh Roka', 'ace', 'nrshroka@gmail.com', 'ec6a6536ca304edf844d1d248a4f08dc', 'super_admin', '', '', '', '', NULL, NULL, 1, '2019-08-06 17:47:25', 1, 1, '2020-11-19 16:43:18', 1),
(12, 'Avishek Karki', 'kanxo', 'karkiavi12345@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'normal_user', '', '', '', '', NULL, NULL, 1, '2019-08-07 04:33:51', 1, 1, '2020-11-17 13:58:17', 1),
(23, 'Naresh', 'Nrsh', 'ezionaresh@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'super_admin', 'Naikap', '6th', 'Computer', 'Ok its done\r\n', NULL, NULL, 1, '2020-11-17 05:18:11', 1, 1, '2020-11-19 18:17:41', 1),
(25, 'test', 'test', 'test@gmail.com', '202cb962ac59075b964b07152d234b70', 'normal_user', '', '', '', '', NULL, NULL, 1, '2020-11-19 10:42:44', 0, 1, NULL, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kpa_notice`
--
ALTER TABLE `kpa_notice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kpa_programming_language`
--
ALTER TABLE `kpa_programming_language`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kpa_project_list`
--
ALTER TABLE `kpa_project_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kpa_pwd_reset`
--
ALTER TABLE `kpa_pwd_reset`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kpa_user`
--
ALTER TABLE `kpa_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `verifiedby_id` (`verifiedby_id`),
  ADD KEY `postby_id` (`postby_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kpa_notice`
--
ALTER TABLE `kpa_notice`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `kpa_programming_language`
--
ALTER TABLE `kpa_programming_language`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `kpa_project_list`
--
ALTER TABLE `kpa_project_list`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `kpa_pwd_reset`
--
ALTER TABLE `kpa_pwd_reset`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `kpa_user`
--
ALTER TABLE `kpa_user`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

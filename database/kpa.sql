-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 12, 2020 at 08:30 AM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
  `year` varchar(4) NOT NULL,
  `semester` enum('First','Second','Third','Fourth','Fifth','Sixth','Seventh','Eighth') NOT NULL,
  `project_code` int(6) NOT NULL,
  `is_verified` tinyint(1) NOT NULL DEFAULT 1,
  `verified_by_id` int(6) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `supervisor_id` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kpa_project_list`
--

INSERT INTO `kpa_project_list` (`id`, `project_title`, `year`, `semester`, `project_code`, `is_verified`, `verified_by_id`, `status`, `supervisor_id`) VALUES
(1, 'Khwopa Project Archive', '2076', 'Fifth', 74, 1, 133345, 1, 111111),
(2, 'Active Worker', '2076', 'Seventh', 77, 1, 333333, 1, 344455),
(3, 'The Maze', '2075', 'Third', 54, 1, 323322, 1, 444456);

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
(31, 'rimpahang@gmail.com', 705670, '2020-02-16 09:42:04', '1581846124', 0);

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

INSERT INTO `kpa_user` (`id`, `name`, `username`, `email`, `password`, `user_type`, `secret_key`, `remarks`, `postby_id`, `created_at`, `is_verified`, `verifiedby_id`, `updated_at`, `status`) VALUES
(7, 'Dhruba Rai', 'rimpahang', 'rimpahang@gmail.com', '8d909b810b4a43cdb83c6c12a129660f', 'super_admin', NULL, NULL, 1, '2019-08-02 04:25:41', 1, 1, '2020-02-16 15:51:47', 1),
(8, 'sabin shrestha', 'sabin', 'alchinibas123@gmail.com', '5d41402abc4b2a76b9719d911017c592', 'admin', NULL, NULL, 1, '2019-08-06 17:32:50', 1, 1, '2020-02-18 14:19:56', 1),
(9, 'Naresh Roka', 'ace', 'nrshroka@gmail.com', '3a2cf27458c9aa3e358f8fc0f002bff6', 'normal_user', NULL, NULL, 1, '2019-08-06 17:47:25', 0, 1, '2020-02-18 14:26:19', 1),
(12, 'Avishek Karki', 'kanxo', 'karkiavi12345@gmail.com', 'cfb70d4d263b5ae0d229ea5d4aaa7445', 'normal_user', NULL, NULL, 1, '2019-08-07 04:33:51', 0, 1, '2020-02-18 14:18:31', 1);

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
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `kpa_programming_language`
--
ALTER TABLE `kpa_programming_language`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `kpa_project_list`
--
ALTER TABLE `kpa_project_list`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `kpa_pwd_reset`
--
ALTER TABLE `kpa_pwd_reset`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `kpa_user`
--
ALTER TABLE `kpa_user`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

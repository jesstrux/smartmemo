-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 12, 2018 at 01:23 PM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.5.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smartmemo`
--

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `name`) VALUES
(1, 'Department of computing'),
(2, 'Bussiness'),
(3, 'Finance');

-- --------------------------------------------------------

--
-- Table structure for table `job`
--

CREATE TABLE `job` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `job`
--

INSERT INTO `job` (`id`, `name`) VALUES
(1, 'Librarian'),
(2, 'Lecturer'),
(3, 'Assistant Lecturer'),
(4, 'Dean'),
(5, 'Registry'),
(6, 'Admission Officer'),
(7, 'Accountant'),
(8, 'Driver');

-- --------------------------------------------------------

--
-- Table structure for table `memo`
--

CREATE TABLE `memo` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `body` text NOT NULL,
  `ref_id` varchar(30) NOT NULL,
  `from_userid` int(11) NOT NULL,
  `to_userid` int(11) NOT NULL,
  `status` int(11) NOT NULL COMMENT '1 memo saved & o memo draft',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `memo`
--

INSERT INTO `memo` (`id`, `title`, `body`, `ref_id`, `from_userid`, `to_userid`, `status`, `created_at`, `updated_at`) VALUES
(11, 'Request drive folder access', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Tenetur ad delectus aperiam ipsum Lorem ipsum, dolor sit amet consectetur adipisicing elit. Tenetur ad delectus aperiam ipsum ', '0', 8, 2, 1, '2018-06-08 12:29:28', '2018-06-08 12:29:53'),
(12, 'Testing', '<p>TestingTestingTestingTestingTestingTestingTestingTestingTesting TestingTestingTestingTestingTestingTestingTestingTestingTesting TestingTestingTestingTestingTestingTestingTestingTestingTesting TestingTestingTestingTestingTestingTestingTestingTestingTesting</p>', 'MEMO20180612020008', 8, 1, 1, '2018-06-12 11:00:41', '2018-06-12 11:00:41');

-- --------------------------------------------------------

--
-- Table structure for table `memo_attachment`
--

CREATE TABLE `memo_attachment` (
  `id` int(11) NOT NULL,
  `memo_id` int(11) NOT NULL,
  `document` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `memo_cc`
--

CREATE TABLE `memo_cc` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `memo_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `memo_response`
--

CREATE TABLE `memo_response` (
  `id` int(11) NOT NULL,
  `memo_id` int(11) NOT NULL,
  `ufs_id` int(11) NOT NULL,
  `comment` varchar(100) NOT NULL,
  `action` int(11) NOT NULL COMMENT '0 declined 1 approved'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `memo_ufs`
--

CREATE TABLE `memo_ufs` (
  `id` int(11) NOT NULL,
  `memo_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `level` int(11) NOT NULL,
  `status` int(11) NOT NULL COMMENT '1 seen 0 unseen',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fname` varchar(30) NOT NULL,
  `lname` varchar(30) NOT NULL,
  `surname` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `phoneNumber` varchar(20) NOT NULL,
  `password` text NOT NULL,
  `dept_id` int(11) NOT NULL,
  `job_id` int(11) NOT NULL,
  `user_role_id` int(11) NOT NULL,
  `status` int(11) NOT NULL COMMENT '0 active 1 Blocked',
  `activation` int(11) NOT NULL COMMENT '0 pending 1 activated 2 declined',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `surname`, `email`, `phoneNumber`, `password`, `dept_id`, `job_id`, `user_role_id`, `status`, `activation`, `created_at`, `updated_at`) VALUES
(1, 'Evance', 'Kiuruwi', 'uriosoft', 'uriosoft@icloud.com', '716359869', 'uriosoft', 1, 1, 0, 0, 0, '2018-06-10 06:16:19', '2018-06-11 10:15:50'),
(8, 'Asmara', 'Abdul', 'Sinde', 'asmara@gmail.com', '139876543', '0617382af16b92414d85ac5392c96f68', 1, 1, 0, 0, 0, '2018-06-10 10:36:37', '2018-06-11 09:49:34'),
(9, 'Walter', 'test', 'Kimaro', 'walter@gmail.com', '876543', 'f097ad686f310113f1f9c437ff612871', 1, 1, 0, 0, 0, '2018-06-12 11:10:52', '2018-06-12 11:10:52');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `name`) VALUES
(1, 'Staff');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job`
--
ALTER TABLE `job`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `memo`
--
ALTER TABLE `memo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`from_userid`);

--
-- Indexes for table `memo_attachment`
--
ALTER TABLE `memo_attachment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `memo_id` (`memo_id`);

--
-- Indexes for table `memo_cc`
--
ALTER TABLE `memo_cc`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `memo_id` (`memo_id`);

--
-- Indexes for table `memo_response`
--
ALTER TABLE `memo_response`
  ADD PRIMARY KEY (`id`),
  ADD KEY `memo_id` (`memo_id`),
  ADD KEY `ups_id` (`ufs_id`);

--
-- Indexes for table `memo_ufs`
--
ALTER TABLE `memo_ufs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `job`
--
ALTER TABLE `job`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `memo`
--
ALTER TABLE `memo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `memo_attachment`
--
ALTER TABLE `memo_attachment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `memo_cc`
--
ALTER TABLE `memo_cc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `memo_ufs`
--
ALTER TABLE `memo_ufs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `memo`
--
ALTER TABLE `memo`
  ADD CONSTRAINT `memo_ibfk_1` FOREIGN KEY (`from_userid`) REFERENCES `users` (`id`);

--
-- Constraints for table `memo_attachment`
--
ALTER TABLE `memo_attachment`
  ADD CONSTRAINT `memo_attachment_ibfk_1` FOREIGN KEY (`memo_id`) REFERENCES `memo` (`id`);

--
-- Constraints for table `memo_cc`
--
ALTER TABLE `memo_cc`
  ADD CONSTRAINT `memo_cc_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `memo_cc_ibfk_2` FOREIGN KEY (`memo_id`) REFERENCES `memo` (`id`);

--
-- Constraints for table `memo_response`
--
ALTER TABLE `memo_response`
  ADD CONSTRAINT `memo_response_ibfk_1` FOREIGN KEY (`memo_id`) REFERENCES `memo` (`id`),
  ADD CONSTRAINT `memo_response_ibfk_2` FOREIGN KEY (`ufs_id`) REFERENCES `memo_response` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

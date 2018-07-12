-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 09, 2018 at 12:05 PM
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
-- Table structure for table `activation_status`
--

CREATE TABLE `activation_status` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `activation_status`
--

INSERT INTO `activation_status` (`id`, `name`, `status`) VALUES
(1, 'Pending', 0),
(2, 'Approved', 1),
(3, 'Declined', 2);

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
(11, 'Request drive folder access', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Tenetur ad delectus aperiam ipsum Lorem ipsum, dolor sit amet consectetur adipisicing elit. Tenetur ad delectus aperiam ipsum ', '0', 8, 1, 1, '2018-06-08 12:29:28', '2018-06-08 12:29:53'),
(12, 'Testing', 'Takribani majangili wawili wa vifaru wame raruliwa na kuliwa na simba katika mbuga ya wanyama huko Afrika ya kusini, maafisa wamesema.\n\nAskari wa doria waligundua mabaki ya watu wawili, na wengine wanahisi ni mabaki ya watu wa tatu, katika mbuga ya wanyama ya Sibuya karibu na Kusini-Mashariki mji mwa mji wa Kenton\n\nBunduki yenye nguvu kubwa na shoka pia vili kutwa hapo.\n\nKwa nini huenda ndizi zikatoweka duniani\n\nMganga aliyedai kuwa na nguvu za kuzuia risasi afariki kwa kupigwa risasi\n\nKatika miaka ya hivi karibuni, Ujangili umeongezeka sana Afrika ya Kusini, ili kutokana na kuongezeka kwa hitaji la pembe za vifaru huko bara la Asia.\n\nKwa upande wa China, Vietnum na sehemu nyingine nyingi pembe za vifaru zinaaminika kuwa na sifa ya kuongeza hisia za mapenzi.\n\nMmiliki wa Hifadhi wa Sibuya, Nick Fox katika taarifa yake kwenye ukurasa wa Facebook wa mbuga hiyo amesema watu hao wanao sadikiwa kuwa ni majangiri waliingia katika mbuga hiyo jumapili usiku au mapema siku ya Jumatatu asubuhi.\n\n"Walikosea na kuingia kwenye eneo la kujidai la simba, ni eneo kubwa hivyo hawakuwa na muda mwingi, " Bwana Fox aliliambia Shirika la habari la AFP.\n\n"Hatuna hakika ni watu wangapi walikuwa - kwani kuna mabaki kidogo sana ya miili yao. "', 'MEMO20180612020008', 8, 1, 1, '2018-06-12 11:00:41', '2018-06-12 11:00:41'),
(13, 'about abdul shabani', 'testing new desings', 'MEMO20180706114432', 8, 1, 1, '2018-07-06 08:45:58', '2018-07-06 08:45:58'),
(14, 'Ndizi zinazomea porini ambazo huenda ndio suluhu katika kulinda ndizi za kawaida zinazotumiwa kama chakula cha binaadamu zimeorodheshwa miongoni mwa mimea inayoangamia', 'Mti huo hupatikana nchini Madagascar pekee ambapo kuna miti mitano iliosalia katika pori.\r\n\r\nWanasayansi wanasema kuwa mmea huo unahitaji kuhifadhiwa, kwa kuwa huenda ukabeba siri za kulinda ndizi siku zijazo.\r\n\r\nChangamoto ni kuanzisha aina mbali mbali ya ndizi ambazo ni tamu kwa matumizi ya mwanadamu na ambazo zinaweza kustahimili mashambulio yoyote kutoka kwa magonjwa ya Panama.', 'MEMO20180706022002', 8, 9, 1, '2018-07-06 11:22:00', '2018-07-06 11:22:00'),
(15, 'Mti huo hupatikana nchini Madagascar pekee ambapo kuna miti mitano iliosalia katika pori', 'Ndizi zinazomea porini ambazo huenda ndio suluhu katika kulinda ndizi za kawaida zinazotumiwa kama chakula cha binaadamu zimeorodheshwa miongoni mwa mimea inayoangamia.\r\n\r\nMti huo hupatikana nchini Madagascar pekee ambapo kuna miti mitano iliosalia katika pori.\r\n\r\nWanasayansi wanasema kuwa mmea huo unahitaji kuhifadhiwa, kwa kuwa huenda ukabeba siri za kulinda ndizi siku zijazo.\r\n\r\nChangamoto ni kuanzisha aina mbali mbali ya ndizi ambazo ni tamu kwa matumizi ya mwanadamu na ambazo zinaweza kustahimili mashambulio yoyote kutoka kwa magonjwa ya Panama.', 'MEMO20180706022451', 8, 1, 1, '2018-07-06 11:25:30', '2018-07-06 11:25:30'),
(16, 'Mti huo hupatikana nchini Madagascar pekee ambapo kuna miti mitano iliosalia katika pori', 'Mti huo hupatikana nchini Madagascar pekee ambapo kuna miti mitano iliosalia katika pori\r\n\r\nMti huo hupatikana nchini Madagascar pekee ambapo kuna miti mitano iliosalia katika pori\r\n\r\nMti huo hupatikana nchini Madagascar pekee ambapo kuna miti mitano iliosalia katika pori\r\n\r\nMti huo hupatikana nchini Madagascar pekee ambapo kuna miti mitano iliosalia katika pori\r\n\r\nMti huo hupatikana nchini Madagascar pekee ambapo kuna miti mitano iliosalia katika pori', 'MEMO20180706022746', 8, 1, 1, '2018-07-06 11:28:21', '2018-07-06 11:28:21'),
(17, 'Ndizi zinazomea porini ambazo huenda ndio suluhu katika kulinda ndizi za kawaida zinazotumiwa kama chakula cha binaadamu zimeorodheshwa miongoni mwa mimea inayoangamia.', 'Ndizi zinazomea porini ambazo huenda ndio suluhu katika kulinda ndizi za kawaida zinazotumiwa kama chakula cha binaadamu zimeorodheshwa miongoni mwa mimea inayoangamia.\r\n\r\nMti huo hupatikana nchini Madagascar pekee ambapo kuna miti mitano iliosalia katika pori.\r\n\r\nWanasayansi wanasema kuwa mmea huo unahitaji kuhifadhiwa, kwa kuwa huenda ukabeba siri za kulinda ndizi siku zijazo.\r\n\r\nChangamoto ni kuanzisha aina mbali mbali ya ndizi ambazo ni tamu kwa matumizi ya mwanadamu na ambazo zinaweza kustahimili mashambulio yoyote kutoka kwa magonjwa ya Panama.', 'MEMO20180706024939', 8, 1, 1, '2018-07-06 11:51:45', '2018-07-06 11:51:45'),
(18, 'Qwrt asdf asdf', 'Takribani majangili wawili wa vifaru wame raruliwa na kuliwa na simba katika mbuga ya wanyama huko Afrika ya kusini, maafisa wamesema.\r\n\r\nAskari wa doria waligundua mabaki ya watu wawili, na wengine wanahisi ni mabaki ya watu wa tatu, katika mbuga ya wanyama ya Sibuya karibu na Kusini-Mashariki mji mwa mji wa Kenton\r\n\r\nBunduki yenye nguvu kubwa na shoka pia vili kutwa hapo.\r\n\r\nKwa nini huenda ndizi zikatoweka duniani\r\n\r\nMganga aliyedai kuwa na nguvu za kuzuia risasi afariki kwa kupigwa risasi\r\n\r\nKatika miaka ya hivi karibuni, Ujangili umeongezeka sana Afrika ya Kusini, ili kutokana na kuongezeka kwa hitaji la pembe za vifaru huko bara la Asia.\r\n\r\nKwa upande wa China, Vietnum na sehemu nyingine nyingi pembe za vifaru zinaaminika kuwa na sifa ya kuongeza hisia za mapenzi.\r\n\r\nMmiliki wa Hifadhi wa Sibuya, Nick Fox katika taarifa yake kwenye ukurasa wa Facebook wa mbuga hiyo amesema watu hao wanao sadikiwa kuwa ni majangiri waliingia katika mbuga hiyo jumapili usiku au mapema siku ya Jumatatu asubuhi.\r\n\r\n"Walikosea na kuingia kwenye eneo la kujidai la simba, ni eneo kubwa hivyo hawakuwa na muda mwingi, " Bwana Fox aliliambia Shirika la habari la AFP.\r\n\r\n"Hatuna hakika ni watu wangapi walikuwa - kwani kuna mabaki kidogo sana ya miili yao. " ', 'MEMO20180708065034', 8, 1, 1, '2018-07-08 03:51:24', '2018-07-08 03:51:24'),
(19, 'Testing memos ', 'Testing memos  Testing memos  Testing memos  Testing memos Testing memos Testing memos Testing memos Testing memos Testing memos Testing memos Testing memos Testing memos Testing memos ', 'MEMO20180708115037', 1, 8, 1, '2018-07-08 08:51:25', '2018-07-08 08:51:25');

-- --------------------------------------------------------

--
-- Table structure for table `memo_attachment`
--

CREATE TABLE `memo_attachment` (
  `id` int(11) NOT NULL,
  `memo_id` int(11) NOT NULL,
  `document` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `memo_attachment`
--

INSERT INTO `memo_attachment` (`id`, `memo_id`, `document`) VALUES
(1, 13, 'FYP_Supervisor_Consultation_Form_1.pdf');

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

--
-- Dumping data for table `memo_response`
--

INSERT INTO `memo_response` (`id`, `memo_id`, `ufs_id`, `comment`, `action`) VALUES
(1, 11, 1, 'Testing response', 1),
(2, 11, 1, 'ssdddd fff', 0);

-- --------------------------------------------------------

--
-- Table structure for table `memo_ufs`
--

CREATE TABLE `memo_ufs` (
  `id` int(11) NOT NULL,
  `memo_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `level` int(11) NOT NULL,
  `status` int(11) NOT NULL COMMENT '1 responded 0 pending',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `memo_ufs`
--

INSERT INTO `memo_ufs` (`id`, `memo_id`, `user_id`, `level`, `status`, `created_at`, `updated_at`) VALUES
(1, 11, 8, 1, 0, '2018-07-06 07:34:34', '2018-07-06 07:34:34'),
(2, 13, 8, 1, 0, '2018-07-06 08:45:58', '2018-07-08 02:36:02'),
(3, 13, 9, 2, 0, '2018-07-06 08:45:58', '2018-07-06 08:45:58'),
(5, 14, 8, 1, 0, '2018-07-06 11:22:00', '2018-07-08 02:54:48'),
(6, 15, 1, 1, 0, '2018-07-06 11:25:30', '2018-07-06 11:25:30'),
(7, 15, 9, 2, 0, '2018-07-06 11:25:30', '2018-07-06 11:25:30'),
(8, 16, 1, 1, 0, '2018-07-06 11:28:21', '2018-07-06 11:28:21'),
(9, 16, 9, 2, 0, '2018-07-06 11:28:21', '2018-07-06 11:28:21'),
(10, 17, 1, 1, 0, '2018-07-06 11:51:45', '2018-07-06 11:51:45'),
(11, 17, 9, 2, 0, '2018-07-06 11:51:45', '2018-07-06 11:51:45');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `description`) VALUES
(1, 'Memo Management', 'Create memo , Edit memo , Update memo , Save draft memo , view sent and draft memo,respond to ufs memo, memo inbox , save memo to repository'),
(2, 'System Management', 'System Management'),
(3, 'Memo Repository Management', 'Memo Repository Management');

-- --------------------------------------------------------

--
-- Table structure for table `role_permission`
--

CREATE TABLE `role_permission` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `permission_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role_permission`
--

INSERT INTO `role_permission` (`id`, `role_id`, `permission_id`) VALUES
(15, 2, 1),
(16, 2, 2),
(17, 4, 1),
(18, 4, 2),
(19, 4, 3),
(20, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fname` varchar(30) NOT NULL,
  `mname` varchar(30) NOT NULL,
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

INSERT INTO `users` (`id`, `fname`, `mname`, `surname`, `email`, `phoneNumber`, `password`, `dept_id`, `job_id`, `user_role_id`, `status`, `activation`, `created_at`, `updated_at`) VALUES
(1, 'Evanceqqqqqq', 'Kiuruwi', 'uriosoft', 'uriosoft@icloud.com', '716359869', '0617382af16b92414d85ac5392c96f68', 1, 6, 1, 0, 0, '2018-06-10 06:16:19', '2018-07-08 03:37:09'),
(8, 'Asmara', 'Abdul', 'Sinde', 'asmara@gmail.com', '139876543', '0617382af16b92414d85ac5392c96f68', 1, 7, 4, 0, 1, '2018-06-10 10:36:37', '2018-07-09 08:50:41'),
(9, 'Walter', 'test', 'Kimaro', 'walter@gmail.com', '876543', 'f097ad686f310113f1f9c437ff612871', 1, 1, 4, 1, 2, '2018-06-12 11:10:52', '2018-07-09 08:50:17');

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
(1, 'Staff'),
(2, 'Lecturer'),
(3, 'Wrong User'),
(4, 'Administrator');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activation_status`
--
ALTER TABLE `activation_status`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_permission`
--
ALTER TABLE `role_permission`
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
-- AUTO_INCREMENT for table `activation_status`
--
ALTER TABLE `activation_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `memo_attachment`
--
ALTER TABLE `memo_attachment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `memo_cc`
--
ALTER TABLE `memo_cc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `memo_response`
--
ALTER TABLE `memo_response`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `memo_ufs`
--
ALTER TABLE `memo_ufs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `role_permission`
--
ALTER TABLE `role_permission`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

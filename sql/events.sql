-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 19, 2022 at 03:38 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `events`
--

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `dep_id` int(11) NOT NULL,
  `dep_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `dep_del` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`dep_id`, `dep_name`, `dep_del`) VALUES
(1, 'อาชีวอนามัย', 0),
(2, 'สร้างเสริมสุขภาพ', 0),
(99, 'สารสนเทศ', 0);

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `ev_id` int(11) NOT NULL,
  `ev_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ev_date_start` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `ev_date_end` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `ev_assign_to` int(11) NOT NULL,
  `ev_create_by` int(11) NOT NULL,
  `ev_del` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Triggers `events`
--
DELIMITER $$
CREATE TRIGGER `add_event_setting` AFTER INSERT ON `events` FOR EACH ROW BEGIN
	INSERT INTO event_setting SET
    ev_id = new.ev_id ,
    walk_in = "1",
    emp_id = "0",
    card_id = "0",
    prefix = "0",
    name = "0",
    `call` = "0",
    com_name = "0",
    dep = "0",
    pos = "0",
    no = "1",
    gender = "0",
    age = "0",
    birthDate = "0",
    `comment` = "1",
    `has_reg_by` = "";
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `event_member`
--

CREATE TABLE `event_member` (
  `id` int(11) NOT NULL,
  `ev_id` int(11) NOT NULL,
  `add_by` int(11) NOT NULL,
  `del` int(11) NOT NULL,
  `emp_id` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `card_id` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `prefix` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `call` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `com_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `dep` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `pos` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `no` int(100) NOT NULL,
  `gender` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `age` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `birthDate` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `reg_date` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `comment` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `event_setting`
--

CREATE TABLE `event_setting` (
  `ev_id` int(11) NOT NULL,
  `walk_in` tinyint(1) NOT NULL,
  `emp_id` tinyint(1) NOT NULL,
  `card_id` tinyint(1) NOT NULL,
  `prefix` tinyint(1) NOT NULL,
  `name` tinyint(1) NOT NULL,
  `call` tinyint(1) NOT NULL,
  `com_name` tinyint(1) NOT NULL,
  `dep` tinyint(1) NOT NULL,
  `pos` tinyint(1) NOT NULL,
  `no` tinyint(1) NOT NULL,
  `gender` tinyint(1) NOT NULL,
  `age` tinyint(1) NOT NULL,
  `birthDate` tinyint(1) NOT NULL,
  `comment` tinyint(1) NOT NULL,
  `has_reg_by` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `user_surname` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `dep_id` int(11) NOT NULL,
  `perm` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `user_del` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_id`, `password`, `user_name`, `user_surname`, `dep_id`, `perm`, `user_del`) VALUES
(1, 11, '6512bd43d9caa6e02c990b0a82652dca', 'Manager', 'Role', 99, 'manager', 1),
(2, 22, 'b6d767d2f8ed5d21a44b0e5886680cb9', 'Register', 'Role', 99, 'register', 1),
(3, 62, '44f683a84163b3523afe57c2e008bc8c', 'Chayuda', 'Sriwongsa', 99, 'register', 1),
(4, 99, 'ac627ab1ccbdb62ec96e702f07f6425b', 'ปัญญทัศน์', 'ศรีบุตรวงศ์', 99, 'admin', 0),
(5, 1234, '81dc9bdb52d04dc20036dbd8313ed055', 'test', 'test', 99, 'manager', 1),
(6, 559131, '1902852bb26c9131bdeb9ddb310ad39b', 'กัญญารัตน์', 'มหาทรัพย์ตระกูล', 2, 'register', 0),
(7, 564107, 'f6757b35875e4c302c28a762c8e7d201', 'ศรัญญา', 'อุทัยมา', 1, 'manager', 0),
(8, 6204709, '4024edaff8bd33939c7cfde4b02fd3df', 'Punnyathat', 'Sributvong', 99, 'register', 0),
(9, 9874, '39cec6d4d21b5dade7544dab6881423e', 'test', 'test', 99, 'register', 1),
(10, 62, '44f683a84163b3523afe57c2e008bc8c', 'Chayuda', 'Sriwongsa', 99, 'register', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`dep_id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`ev_id`);

--
-- Indexes for table `event_member`
--
ALTER TABLE `event_member`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event_setting`
--
ALTER TABLE `event_setting`
  ADD PRIMARY KEY (`ev_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_dep_id` (`dep_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `event_member`
--
ALTER TABLE `event_member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_dep_id` FOREIGN KEY (`dep_id`) REFERENCES `departments` (`dep_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

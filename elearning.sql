-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 27, 2024 at 03:42 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `elearning`
--

-- --------------------------------------------------------

--
-- Table structure for table `account_registration`
--

CREATE TABLE `account_registration` (
  `user_id` int(11) NOT NULL,
  `learner_name` varchar(255) NOT NULL,
  `parent_name` varchar(255) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `date_of_birth` date NOT NULL,
  `gender` enum('male','female','other') NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `education_level` enum('Kindergarten','Grade 1','Grade 2','Grade 3','Grade 4','Grade 5','Grade 6') NOT NULL,
  `billing_address` varchar(255) NOT NULL,
  `user_role` enum('admin','learner') NOT NULL,
  `profile_picture` varchar(255) DEFAULT NULL,
  `subscription` enum('Free','Basic','Standard','Premium') NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `payment_option` enum('Free','twenty_percent_dp','fifty_percent_dp','eighty_percent_dp','Full payment') NOT NULL,
  `total_amount` decimal(10,2) NOT NULL,
  `balance` decimal(10,2) NOT NULL,
  `terms_agreed` tinyint(1) NOT NULL,
  `privacy_agreed` tinyint(1) NOT NULL,
  `registration_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `payment_status` enum('paid','unpaid') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `account_registration`
--

INSERT INTO `account_registration` (`user_id`, `learner_name`, `parent_name`, `username`, `password`, `date_of_birth`, `gender`, `email`, `phone`, `education_level`, `billing_address`, `user_role`, `profile_picture`, `subscription`, `amount`, `payment_option`, `total_amount`, `balance`, `terms_agreed`, `privacy_agreed`, `registration_date`, `payment_status`) VALUES
(1, 'Joris M. Lariosa', 'Maribel M. Lariosa', 'learn_coreJoris', '$2y$10$iee9YXmQfvwVkDArEHcLgexWiGrYf78Tve4E42hsuNj1XCmg6ciuK', '2024-07-24', 'female', 'lariosajoris@gmail.com', '09770420392', 'Grade 6', 'Sta Cruz Casiguran Sorsogon', 'admin', 'joan_gantan.jpg', 'Premium', 700.00, 'Full payment', 700.00, 0.00, 1, 1, '2024-07-24 02:28:57', ''),
(3, 'Jobelle M. Lariosa', 'Maribel M. Lariosa', 'learn_coreJobelle', '$2y$10$7yJfaqRTpHrlSYnAoRVZjOHWQqVXbNnSV5Y.d3v6haOoHaaofRbyy', '2024-07-24', 'female', 'lariosajobellemercado@gmail.com', '09770420392', 'Grade 6', 'Sta Cruz Casiguran Sorsogon', 'admin', 'bel.jpg', 'Premium', 700.00, 'Full payment', 700.00, 0.00, 1, 1, '2024-07-24 02:30:37', 'paid'),
(4, 'Joyce M. Lariosa', 'Maribel M. Lariosa', 'learn_coreJoyce', '$2y$10$fdwSoXC1WPHY4p4mVm8yseYsn6FhoucN7GzFdQsdvu58r/O2Jsnqi', '2024-07-24', 'female', 'lariosajoyceperuseonly@gmail.com', '09770420392', 'Grade 6', 'Sta Cruz Casiguran Sorsogon', 'admin', 'bel.jpg', 'Standard', 350.00, 'eighty_percent_dp', 280.00, 70.00, 1, 1, '2024-07-24 02:31:48', 'unpaid'),
(6, 'Jobelle M. Lariosa', 'Maribel M. Lariosa', 'learn_coreBelle', '$2y$10$JxRPw1tcQoBB3tNoxD/zJOpRfSzC3BM0VXYiCY/fLIqvwSF9LHSn.', '2024-07-24', 'female', 'lariosabeelleperuseonly@gmail.com', '09501714500', 'Grade 6', 'Sta Cruz Casiguran Sorsogon', 'admin', 'bel.jpg', 'Premium', 700.00, 'Full payment', 700.00, 0.00, 1, 1, '2024-07-24 02:48:49', 'paid'),
(7, 'Mark Jobelle Mansion', 'Mark Angelo Mansion', 'learn_coreMarkJobelle', '$2y$10$ZOGrVaw4fIEHVyXO3ScKjOdrvXNUPLUSTawLtJRYizGdu05FDghUq', '2024-07-24', 'male', 'mansionmarkjobelle@gmail.com', '091714500', 'Grade 6', 'Sta Cruz Casiguran Sorsogon', 'admin', 'log_in.png', 'Premium', 700.00, 'Full payment', 700.00, 0.00, 1, 1, '2024-07-24 04:32:18', 'paid'),
(8, 'Mark Angelo H. Mansion', 'Mylyn T. Hayagan', 'learn_coreMak', '$2y$10$PEqn1aKuvXcelhqdFIePMeVKRN6j5rulhX3cSdyzHKCA/H8LjLOpu', '2024-07-13', 'male', 'mansionlariosamakinee@gmail.com', '09502365895', 'Grade 5', 'Sta Cruz Casiguran Sorsogon', 'admin', 'fil.png', 'Premium', 700.00, 'Full payment', 700.00, 0.00, 1, 1, '2024-07-24 04:46:33', 'paid');

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `gender` enum('male','female','other') NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `terms_accepted` tinyint(1) NOT NULL,
  `privacy_accepted` tinyint(1) NOT NULL,
  `registration_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `full_name`, `username`, `password`, `dob`, `gender`, `email`, `phone`, `terms_accepted`, `privacy_accepted`, `registration_date`) VALUES
(1, 'Jobelle M. Lariosa', 'Admin_Belle', '$2y$10$D6.X7phxbMmb3eqlULcBLeWJEDIX.7TWffyUw0OCNmPJbjLUDYOLe', '2024-07-23', 'female', 'lariosajobellemercado@gmail.com', '09770420392', 1, 1, '2024-07-23 14:31:17'),
(2, 'Mark Angelo H. Mansion', 'Admin_Angelo', '$2y$10$Tumho.8CpXInE4zIr8QVfOxW.HjuZQVHqD5srTxPDvyUD57EPl3zi', '2024-07-27', 'male', 'mansionangelleperuseonly@gmail.com', '0951256353', 1, 1, '2024-07-23 14:38:34'),
(3, 'Joyce M. Lariosa', 'Admin_Joyce', '$2y$10$HVDz5gqbggimWhl2hK1CEut4INfIJiQKlZySse7R2ki914yiPYf22', '2024-07-24', 'female', 'lariosajoyceperuseonly@gmail.com', '09502536859', 1, 1, '2024-07-24 03:19:35');

-- --------------------------------------------------------

--
-- Table structure for table `learn_coreuser`
--

CREATE TABLE `learn_coreuser` (
  `id` int(11) NOT NULL,
  `Name` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `grade` varchar(10) DEFAULT NULL,
  `score` int(11) DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `quiz_number` varchar(50) DEFAULT NULL,
  `time_take_exam` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `learn_coreuser`
--

INSERT INTO `learn_coreuser` (`id`, `Name`, `username`, `grade`, `score`, `subject`, `quiz_number`, `time_take_exam`) VALUES
(1, 'Jobelle M. Lariosa', 'learn_coreBelle', 'Grade 6', 4, 'Mathematics - Addition', '2', '2024-07-22 03:58:02'),
(2, 'Jobelle M. Lariosa', 'learn_coreBelle', 'Grade 6', 5, 'Mathematics - Addition', '3', '2024-07-22 04:12:29'),
(3, 'Jobelle M. Lariosa', 'learn_coreBelle', 'Grade 6', 4, 'Mathematics - Addition', '4', '2024-07-22 04:19:46'),
(4, 'Jobelle M. Lariosa', 'learn_coreBelle', 'Grade 6', 5, 'Mathematics - Subtraction', '2', '2024-07-22 10:24:40'),
(5, 'Jobelle M. Lariosa', 'learn_coreBelle', 'Grade 6', 5, 'Mathematics - Subtraction', '3', '2024-07-22 10:46:48'),
(6, 'Jobelle M. Lariosa', 'learn_coreBelle', 'Grade 6', 4, 'Mathematics - Subtraction', '4', '2024-07-22 10:55:26'),
(7, 'Jobelle M. Lariosa', 'learn_coreBelle', 'Grade 6', 3, 'Mathematics - Subtraction', '1', '2024-07-23 08:52:09'),
(8, 'Jobelle M. Lariosa', 'learn_coreBelle', 'Grade 6', 4, 'Mathematics - Multiplication', '2', '2024-07-23 09:10:55'),
(9, 'Jobelle M. Lariosa', 'learn_coreBelle', 'Grade 6', 3, 'Mathematics - Multiplication', '1', '2024-07-23 09:20:48'),
(10, 'Jobelle M. Lariosa', 'learn_coreBelle', 'Grade 6', 4, 'Mathematics - Multiplication', '1', '2024-07-23 09:22:27'),
(11, 'Jobelle M. Lariosa', 'learn_coreBelle', 'Grade 6', 4, 'Mathematics - Multiplication', '1', '2024-07-23 09:23:24'),
(12, 'Jobelle M. Lariosa', 'learn_coreBelle', 'Grade 6', 0, 'Mathematics - Multiplication', '3', '2024-07-23 09:31:24'),
(13, 'Jobelle M. Lariosa', 'learn_coreBelle', 'Grade 6', 0, 'Mathematics - Multiplication', '3', '2024-07-23 09:35:38'),
(14, 'Jobelle M. Lariosa', 'learn_coreBelle', 'Grade 6', 2, 'Mathematics - Multiplication', '3', '2024-07-23 09:40:51'),
(15, 'Jobelle M. Lariosa', 'learn_coreBelle', 'Grade 6', 5, 'Mathematics - Multiplication', '3', '2024-07-23 09:43:15');

-- --------------------------------------------------------

--
-- Table structure for table `official_learners`
--

CREATE TABLE `official_learners` (
  `id` int(11) NOT NULL,
  `learner_name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `gender` varchar(50) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `education_level` varchar(255) DEFAULT NULL,
  `subscription` varchar(255) DEFAULT NULL,
  `payment_status` enum('paid','unpaid') DEFAULT 'unpaid'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `official_learners_payment`
--

CREATE TABLE `official_learners_payment` (
  `id` int(11) NOT NULL,
  `learner_name` varchar(255) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `subscription` varchar(50) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `payment_option` varchar(50) NOT NULL,
  `total_amount` decimal(10,2) NOT NULL,
  `balance` decimal(10,2) NOT NULL,
  `registration_date` date NOT NULL,
  `payment_status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `official_learners_payment`
--

INSERT INTO `official_learners_payment` (`id`, `learner_name`, `username`, `email`, `subscription`, `amount`, `payment_option`, `total_amount`, `balance`, `registration_date`, `payment_status`) VALUES
(17, 'Jobelle M. Lariosa', 'learn_coreJobelle', 'lariosajobellemercado@gmail.com', 'Premium', 700.00, '0', 700.00, 0.00, '2024-07-24', 'paid'),
(18, 'Jobelle M. Lariosa', 'learn_coreBelle', 'lariosabeelleperuseonly@gmail.com', 'Premium', 700.00, '0', 700.00, 0.00, '2024-07-24', 'paid'),
(19, 'Mark Jobelle Mansion', 'learn_coreMarkJobelle', 'mansionmarkjobelle@gmail.com', 'Premium', 700.00, '0', 700.00, 0.00, '2024-07-24', 'paid'),
(20, 'Mark Angelo H. Mansion', 'learn_coreMak', 'mansionlariosamakinee@gmail.com', 'Premium', 700.00, '0', 700.00, 0.00, '2024-07-24', 'paid');

-- --------------------------------------------------------

--
-- Table structure for table `reg_account`
--

CREATE TABLE `reg_account` (
  `id` int(11) NOT NULL,
  `fn_learner` varchar(255) NOT NULL,
  `fn_parent` varchar(225) NOT NULL,
  `dob` date NOT NULL,
  `gender` enum('male','female','other') NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `education` enum('Kindergarten','Grade 1','Grade 2','Grade 3','Grade 4','Grade 5','Grade 6') NOT NULL,
  `creditCard` varchar(20) NOT NULL,
  `billingAddress` varchar(255) NOT NULL,
  `profilePicture` blob DEFAULT NULL,
  `language` enum('english','tagalog') NOT NULL,
  `terms` tinyint(1) NOT NULL,
  `privacy` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `reset_token` varchar(100) DEFAULT NULL,
  `reset_expires` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reg_account`
--

INSERT INTO `reg_account` (`id`, `fn_learner`, `fn_parent`, `dob`, `gender`, `email`, `phone`, `username`, `password`, `education`, `creditCard`, `billingAddress`, `profilePicture`, `language`, `terms`, `privacy`, `created_at`, `reset_token`, `reset_expires`) VALUES
(15, 'Mark Spencer', '', '2016-07-05', 'female', 'lariosaspencermark@gmail.com', '09157454567', 'learn_coreSpencer', '$2y$10$EfSJqBW/BEOl/pf3kepjAOeEIf3MKESsFSIT7XFLnJoFwHdg3T9u2', 'Grade 1', '', 'Casiguran Sorsogon', 0x61626f757475732e706e67, 'tagalog', 0, 0, '2024-07-04 14:14:08', NULL, NULL),
(16, 'Angelle Mansion', 'Jobelle Lariosa', '2035-08-15', 'female', 'mansionangelleperuseonly@gmail.com', '09281567655', 'learn_coreAngelle', '$2y$10$gGlQ.TCwJRyhvoKOj.LHKu2StHBljtBSVo20fhg.vINq8buxG/1xO', 'Kindergarten', '', 'Abudabi Dubai', 0x62656c2e6a7067, 'english', 0, 0, '2024-07-04 14:37:51', NULL, NULL),
(17, 'Jobelle M. Lariosa', 'Maribel M. Lariosa', '2003-04-29', 'female', 'lariosabeelleperuseonly@gmail.com', '09501452368', 'learn_coreBelle', '$2y$10$Q0BS0Yuz8HXLSO4jg4QIY.ZNmwmUV1lpo72Up.tnVTgGoRIL0o/CC', 'Grade 1', '', 'Casiguran Sorsogon', 0x64656e6e2e6a7067, 'english', 0, 0, '2024-07-04 22:16:31', NULL, NULL),
(18, 'Mark Angelo H. Mansion', 'Mylyn T. Hayagan', '2002-06-20', 'male', 'markangelo@gmail.com', '090354654135', 'learn_coreMarkAngelo', '$2y$10$5IYrJ8OYlRWyQQsZcOuABOEzmFs49qTL/gqX9JLM5T6i3mIJgdYRa', 'Grade 1', '', 'Ponong Csiguran Sorsogon', 0x6368696c642e706e67, 'english', 0, 0, '2024-07-04 22:21:17', NULL, NULL),
(19, 'Joneniene Fardo', 'Christine Jayner Fardo', '2024-07-02', 'female', 'jonenienefardo@gmail.com', '09501425638', 'learn_corejoneine', '$2y$10$fZ9nW/V9GeYDEqjmJ2Yn0O2CL5cd6it2PdI3bRpMfR9B0GvrfcQDO', 'Kindergarten', '', 'Abudabi Dubai', 0x66696c2e706e67, 'english', 0, 0, '2024-07-05 14:00:02', NULL, NULL),
(20, 'Kristy Briton', 'Jolie Kris Briton', '2031-09-17', 'female', 'britonkristy@gmail.com', '09501714500', 'learn_coreKristy', '$2y$10$y3qFmp1Eyp5rl2BxWXkZtey2cZq3MtmWoczCyqzuzyhaTySyOQDRu', 'Grade 1', '', 'Tabaco Albay', 0x61626f757475732e706e67, 'english', 0, 0, '2024-07-06 01:20:46', NULL, NULL),
(22, 'Mark Angelo H. Mansion', 'Mylyn T. Hayagan', '2024-07-26', 'male', 'markangelo_mansion@gmail.com', '09770420392', 'learn_coreMark', '$2y$10$w98xpRFYgHQjC6ySrrlYDOAlKX19TR4U6si37GvayD8G1D0RRWfVC', 'Kindergarten', '', 'Ponong Casiguran Sorsogon', 0x616c7068616265742e706e67, 'english', 0, 0, '2024-07-06 13:09:11', NULL, NULL),
(23, 'Jane Ducay', 'Mark Angelo Mansion', '2024-07-08', 'female', 'jgfyitdfgfyitgcjgr@gmail.com', '09526871687687', 'learn_coreJane', '$2y$10$ig1mwu.NRnpKvUp4kj5gvuW4MMQA6l0qY1b3tFgOD689n.w6opV/.', 'Kindergarten', '', 'jhdyxc hgdetursdxtydturwrtustu', 0x61626f757475732e706e67, 'english', 0, 0, '2024-07-06 13:26:00', NULL, NULL),
(24, 'Christoff Elsandaro', 'Benjamin Elsandaro', '2000-11-22', 'male', 'elsandaro_christoff@gmail.com', '095017154500', 'learn_coreElsandaro', '$2y$10$I5tPTB/gH3PipMnlGJVs6uMjD9NtD9USgn0d9tR96iuHNANYUXB5O', 'Grade 2', '', 'Dubai UAE', 0x64656e6e2e6a7067, 'english', 0, 0, '2024-07-08 02:18:22', NULL, NULL),
(25, 'Joyce Mercado Lariosa', 'Maribel M. Lariosa', '2019-07-10', 'female', 'lariosajoycemercado@gmail.com', '09501714500', 'learn_coreJoyce', '$2y$10$B.PExu0/c5tXOGXGJTeGNe3KRks49MU0o3crnwzoQ5M7IpLyyGQwa', 'Grade 2', '', 'Sta Cruz Casiguran Sorsogon', 0x6d792e6a7067, 'english', 0, 0, '2024-07-08 07:41:28', NULL, NULL),
(26, 'Angelle Mercado Lariosa', 'Jobelle M. Lariosa', '2024-07-11', 'female', 'lariosaangellemercado@gmail.com', '09770420392', 'learn_coreAngelleM', '$2y$10$nyO5Kh2xr0.a7SHXTjlhkuSw8uXR.5y5s0oDyYuMd8LMeNb2/2o2a', 'Grade 5', '', 'Casiguran Sorsogon', 0x62656c2e6a7067, 'english', 0, 0, '2024-07-09 03:10:15', NULL, NULL),
(27, 'Joan Gantan', 'Joan Gantan', '2024-07-09', 'female', 'gantanjoan@gmail.com', '09501714500', 'learn_coreJoan', '$2y$10$03HRHAY2UWGB2afTlvN5LucfJP1snIR5LHU0KDlbEmnoytsgqjRO2', 'Grade 4', '', 'Guinubatan Albay', 0x6a6f616e5f67616e74616e2e6a7067, 'english', 0, 0, '2024-07-09 10:16:48', NULL, NULL),
(28, 'Jobelle M. Lariosa', 'Maribel M. Lariosa', '2024-07-25', 'female', 'lariosajobelle@gmail.com', '0932688478', 'learn_coreJobelle', '$2y$10$aeg5T1aqbJBugcvbhG4kJ.naREahbM1f1Eil.3zTa47bSrY4tQTUa', 'Grade 1', '', '567894678', 0x62656c2e6a7067, 'english', 0, 0, '2024-07-09 10:20:52', NULL, NULL),
(30, 'Mark Angelo H. Mansion', 'Wilson G. Mansion', '2015-07-22', 'female', 'markangelohayagan_mansion@gmail.com', '09501714500', 'learn_coremark_angelo_hayagan', '$2y$10$wNxc804miEwgaWQrViESeOhELMqA3mMhSpAAAfhvbARsVUIYSRcBK', 'Grade 1', '', 'Ponong Casiguran Sorsogon', 0x77726974696e672e6a7067, 'english', 0, 0, '2024-07-10 11:41:23', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account_registration`
--
ALTER TABLE `account_registration`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `learn_coreuser`
--
ALTER TABLE `learn_coreuser`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `official_learners`
--
ALTER TABLE `official_learners`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `official_learners_payment`
--
ALTER TABLE `official_learners_payment`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `reg_account`
--
ALTER TABLE `reg_account`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account_registration`
--
ALTER TABLE `account_registration`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `learn_coreuser`
--
ALTER TABLE `learn_coreuser`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `official_learners`
--
ALTER TABLE `official_learners`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `official_learners_payment`
--
ALTER TABLE `official_learners_payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `reg_account`
--
ALTER TABLE `reg_account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 14, 2025 at 04:17 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_prs`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_login`
--

CREATE TABLE `tbl_login` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_patients`
--

CREATE TABLE `tbl_patients` (
  `id` int(11) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `middle_name` varchar(100) DEFAULT NULL,
  `suffix` varchar(10) DEFAULT NULL,
  `sex` enum('Male','Female','Other') NOT NULL,
  `birth_date` date NOT NULL,
  `region` varchar(100) DEFAULT NULL,
  `province` varchar(100) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `barangay` varchar(100) DEFAULT NULL,
  `contact_number` varchar(15) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` enum('Active','Inactive') DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_patients`
--

INSERT INTO `tbl_patients` (`id`, `last_name`, `first_name`, `middle_name`, `suffix`, `sex`, `birth_date`, `region`, `province`, `city`, `barangay`, `contact_number`, `created_at`, `updated_at`, `status`) VALUES
(1, 'Almeria', 'Cyril', 'Tiozon', '', 'Female', '2025-02-13', 'Region VIII', 'Leyte', 'Tacloban City', 'Brgy 3', '09999999999', '2025-02-12 15:27:25', '2025-02-14 02:41:03', 'Active'),
(2, 'awdawd', 'awdawd', 'awdawd', 'Sr.', 'Female', '2025-02-07', '', '', '', '', 'awdawd', '2025-02-12 15:28:19', '2025-02-13 08:07:01', 'Inactive'),
(3, 'Almeria', 'Meg', 'Tiozon', '', 'Female', '2025-02-25', 'Region VIII', 'Leyte', 'Tacloban City', 'Brgy 1', 'awdawd', '2025-02-12 15:35:49', '2025-02-14 01:23:05', 'Active'),
(4, 'Almeria', 'Ivan Jay', 'Tiozon', '', 'Male', '2004-06-11', 'Region VIII', 'Leyte', 'Tacloban City', 'Brgy 1', '09323233223', '2025-02-12 17:45:08', '2025-02-14 01:22:43', 'Active'),
(5, 'awdawd', 'awdawd', 'awdawd', 'Sr.', 'Male', '2025-03-04', NULL, NULL, NULL, NULL, '131231', '2025-02-12 17:58:44', '2025-02-13 08:06:58', 'Inactive'),
(6, 'Almeria', 'Lee Ann', 'Tiozon', '', 'Male', '2025-01-30', 'Region VIII', 'Southern Leyte', 'Tacloban City', 'Brgy 1', '123123', '2025-02-12 18:03:50', '2025-02-14 01:22:50', 'Active'),
(7, 'awd', 'awddw', '', '', 'Female', '2025-02-17', NULL, NULL, NULL, NULL, '09323233223', '2025-02-13 00:31:58', '2025-02-13 08:07:04', 'Inactive'),
(8, 'Almeria', 'Luanna', 'Tiozon', '', 'Female', '2025-02-21', 'Region VIII', 'Southern Leyte', 'Tacloban City', 'Brgy 2', '09323233223', '2025-02-13 07:46:43', '2025-02-14 01:22:58', 'Active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_login`
--
ALTER TABLE `tbl_login`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `tbl_patients`
--
ALTER TABLE `tbl_patients`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_login`
--
ALTER TABLE `tbl_login`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_patients`
--
ALTER TABLE `tbl_patients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

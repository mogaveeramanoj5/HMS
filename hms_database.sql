-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 25, 2026 at 02:17 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `username`, `password`) VALUES
(1, 'admin', '123');

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `appointment_id` int(11) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `Patient_ID` int(11) NOT NULL,
  `appointment_date` date NOT NULL,
  `reason` varchar(100) NOT NULL,
  `Status` varchar(100) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`appointment_id`, `doctor_id`, `Patient_ID`, `appointment_date`, `reason`, `Status`) VALUES
(1, 1, 1, '2026-04-21', 'fewer', 'Accepted'),
(2, 1, 2, '2026-04-22', 'loose motion', 'Accepted'),
(4, 1, 3, '2026-04-23', 'fewer', 'pending'),
(6, 1, 3, '2026-04-26', 'leg pain', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `doctor_id` int(11) NOT NULL,
  `docname` varchar(50) NOT NULL,
  `docpass` varchar(50) NOT NULL,
  `age` int(11) NOT NULL,
  `specialization` varchar(50) NOT NULL,
  `phone` bigint(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `experience` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`doctor_id`, `docname`, `docpass`, `age`, `specialization`, `phone`, `email`, `experience`) VALUES
(1, 'Manoj', '123', 21, 'eye', 9743049756, 'mogaveeramanoj5@gmail.com', 5),
(2, 'Sudarshan', '123', 20, 'kidney', 7890564321, 'sudarshan123@gmail.com', 3);

-- --------------------------------------------------------

--
-- Table structure for table `medicine`
--

CREATE TABLE `medicine` (
  `medicine_id` int(11) NOT NULL,
  `Medicine_name` varchar(100) NOT NULL,
  `Medicine_type` varchar(100) NOT NULL,
  `Patient_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `medicine`
--

INSERT INTO `medicine` (`medicine_id`, `Medicine_name`, `Medicine_type`, `Patient_ID`) VALUES
(1, 'cipla', 'tablet', 1),
(5, 'julabin', 'tablet', 2),
(7, 'julabin', 'tablet', 1),
(8, 'cipla', 'tablet', 1),
(9, 'cipla', 'tablet', 3);

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `Patient_ID` int(11) NOT NULL,
  `pname` varchar(50) NOT NULL,
  `ppass` varchar(50) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `age` int(11) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `disease` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `doctor_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`Patient_ID`, `pname`, `ppass`, `phone`, `email`, `age`, `gender`, `disease`, `address`, `doctor_id`) VALUES
(1, 'pavan', '123', '9743049756', 'PAVANaaaaaa@gmail.com', 21, 'Male', '', 'kumbashi', NULL),
(2, 'pravith', '123', '9743049756', 'papa@gmail.com', 20, 'Male', '', 'kundapura', NULL),
(3, 'Sharath', '123', '9743049756', 'sharath139@gmail.com', 21, 'Male', '', 'maravanthe\r\nkundapura', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`appointment_id`),
  ADD KEY `doctor_id` (`doctor_id`),
  ADD KEY `appointment_ibfk_2` (`Patient_ID`);

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`doctor_id`);

--
-- Indexes for table `medicine`
--
ALTER TABLE `medicine`
  ADD PRIMARY KEY (`medicine_id`),
  ADD KEY `fk_patient` (`Patient_ID`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`Patient_ID`),
  ADD KEY `doctor_id` (`doctor_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `appointment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `medicine`
--
ALTER TABLE `medicine`
  MODIFY `medicine_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `Patient_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointment`
--
ALTER TABLE `appointment`
  ADD CONSTRAINT `appointment_ibfk_1` FOREIGN KEY (`doctor_id`) REFERENCES `doctor` (`doctor_id`),
  ADD CONSTRAINT `appointment_ibfk_2` FOREIGN KEY (`patient_id`) REFERENCES `patient` (`patient_id`) ON DELETE CASCADE;

--
-- Constraints for table `medicine`
--
ALTER TABLE `medicine`
  ADD CONSTRAINT `fk_patient` FOREIGN KEY (`Patient_ID`) REFERENCES `patient` (`patient_id`) ON DELETE CASCADE;

--
-- Constraints for table `patient`
--
ALTER TABLE `patient`
  ADD CONSTRAINT `patient_ibfk_1` FOREIGN KEY (`doctor_id`) REFERENCES `doctor` (`doctor_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 19, 2021 at 08:01 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ctm`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_details`
--

CREATE TABLE `admin_details` (
  `a_id` int(11) NOT NULL,
  `a_name` varchar(255) DEFAULT NULL,
  `a_username` varchar(255) NOT NULL,
  `a_email_id` varchar(255) NOT NULL,
  `a_mobile_num` int(10) NOT NULL,
  `a_password` varchar(255) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_details`
--

INSERT INTO `admin_details` (`a_id`, `a_name`, `a_username`, `a_email_id`, `a_mobile_num`, `a_password`, `timestamp`) VALUES
(1, 'Sam', 'Sam007', 'sam@gmail.com', 1654987122, '$2y$10$meHbH96waZF1G4YMhz3yyunxTbJA9nuMf9ho6qeHfBqJnQ9iUtrP2', '2021-06-12 06:58:00'),
(2, 'Tom', 'tom123', 'tom@gmail.com', 1234567889, '$2y$10$gEX56tRf2vRwefCcB6LGDu94.roO7RdpjP9iiaZo/ulThyTXUHmBG', '2021-06-14 09:54:27'),
(3, 'Om', 'om55', 'om@gmail.com', 1654985321, '$2y$10$EEGvN.QDYyquXM9CujoQ1OAchr39CFrBPxTQq29.L60mmxVuLDr06', '2021-07-01 11:28:12'),
(4, 'Ram', 'ram123', 'ram@gmail.com', 1234512345, '$2y$10$vzvlolIE9Yg9s4AIN5N5MeL9gRciyqqhPNc.9RCX63JdNAspKoASC', '2021-07-01 11:31:49');

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `patient_id` int(11) NOT NULL,
  `full_name` varchar(255) DEFAULT NULL,
  `mobile_number` bigint(10) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `govt_issued_id` varchar(150) DEFAULT NULL,
  `govt_issued_id_no` varchar(150) DEFAULT NULL,
  `full_address` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `registration_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`patient_id`, `full_name`, `mobile_number`, `dob`, `govt_issued_id`, `govt_issued_id_no`, `full_address`, `state`, `registration_date`) VALUES
(1, 'tom', 1234567890, '2021-06-10', 'aadhar card', '123456', '9th street green avenue', 'Gujarat', '2021-06-29 17:44:40'),
(2, 'om', 9865327413, '2021-01-02', 'aadhar card', '465132879', 'central park', 'gujarat', '2021-07-19 02:39:15'),
(3, 'jerry', 1326457676, '2018-06-19', 'aadhar card', '876543', '5 park , mumbai', 'mahrashtra', '2021-07-19 04:26:40');

-- --------------------------------------------------------

--
-- Table structure for table `phlebotomist`
--

CREATE TABLE `phlebotomist` (
  `p_id` int(11) NOT NULL,
  `emp_id` varchar(100) DEFAULT NULL,
  `full_name` varchar(255) DEFAULT NULL,
  `mobile_num` bigint(10) DEFAULT NULL,
  `registration_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `phlebotomist`
--

INSERT INTO `phlebotomist` (`p_id`, `emp_id`, `full_name`, `mobile_num`, `registration_date`) VALUES
(3, '123456', 'dr alpha', 9856321470, '2021-07-02 07:31:08'),
(5, '123457', 'dr beta', 7412589630, '2021-07-02 07:34:45');

-- --------------------------------------------------------

--
-- Table structure for table `report_tracking`
--

CREATE TABLE `report_tracking` (
  `r_id` int(11) NOT NULL,
  `order_number` bigint(40) DEFAULT NULL,
  `remark` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `remark_by` int(5) DEFAULT NULL,
  `post_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `report_tracking`
--

INSERT INTO `report_tracking` (`r_id`, `order_number`, `remark`, `status`, `remark_by`, `post_time`) VALUES
(1, 416092549, 'On the way', 'On the Way for sample collection', 0, '2021-07-16 11:03:49'),
(2, 104683708, 'on its way', 'On the Way for sample collection', 4, '2021-07-16 11:05:31'),
(3, 104683708, 'Sample is collected ', 'Sample Collected', 4, '2021-07-16 11:49:07'),
(4, 104683708, 'Sending to lab', 'Sent to Lab', 4, '2021-07-16 11:49:49'),
(5, 768941187, 'RTCPR', 'On the way for sample collection', 4, '2021-07-16 11:55:44'),
(6, 768941187, 'Test negative', 'Sample Collected', 4, '2021-07-16 11:56:08'),
(7, 768941187, 'Send to lab for more tests', 'Sent to Lab', 4, '2021-07-16 11:57:04');

-- --------------------------------------------------------

--
-- Table structure for table `test_record`
--

CREATE TABLE `test_record` (
  `id` int(11) NOT NULL,
  `order_number` bigint(14) DEFAULT NULL,
  `patient_mobile_number` bigint(10) DEFAULT NULL,
  `test_type` varchar(100) DEFAULT NULL,
  `test_time_slot` varchar(120) DEFAULT NULL,
  `report_status` varchar(100) DEFAULT NULL,
  `final_report` varchar(150) DEFAULT NULL,
  `report_upload_time` varchar(200) DEFAULT NULL,
  `registration_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `assignedToEmpId` varchar(150) DEFAULT NULL,
  `AssignToName` varchar(180) DEFAULT NULL,
  `AssignTime` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `test_record`
--

INSERT INTO `test_record` (`id`, `order_number`, `patient_mobile_number`, `test_type`, `test_time_slot`, `report_status`, `final_report`, `report_upload_time`, `registration_date`, `assignedToEmpId`, `AssignToName`, `AssignTime`) VALUES
(1, 104683708, 1234567890, 'CB-NAAT', '2021-06-30T21:55', 'Sent to Lab', NULL, NULL, '2021-06-29 17:44:40', '123456', 'dr alpha', '15-07-2021 07:11:52 PM'),
(2, 416092549, 1234567890, 'Antigen', '2021-07-01T13:52', 'On the way for sample collection', NULL, NULL, '2021-06-30 17:22:20', '123457', 'dr beta', '16-07-2021 12:56:50 PM'),
(3, 768941187, 1234567890, 'RT-PCR', '2021-07-02T13:53', 'Sent to Lab', NULL, NULL, '2021-06-30 17:23:56', '123456', 'dr alpha', '16-07-2021 01:55:19 PM'),
(4, 574800725, 9865327413, 'Antigen', '2021-07-21T08:15', NULL, NULL, NULL, '2021-07-19 02:39:15', NULL, NULL, NULL),
(5, 925822993, 1326457676, 'Antigen', '2021-07-21T09:56', NULL, NULL, NULL, '2021-07-19 04:26:40', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_details`
--
ALTER TABLE `admin_details`
  ADD PRIMARY KEY (`a_id`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`patient_id`);

--
-- Indexes for table `phlebotomist`
--
ALTER TABLE `phlebotomist`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `report_tracking`
--
ALTER TABLE `report_tracking`
  ADD PRIMARY KEY (`r_id`);

--
-- Indexes for table `test_record`
--
ALTER TABLE `test_record`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_details`
--
ALTER TABLE `admin_details`
  MODIFY `a_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `patient_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `phlebotomist`
--
ALTER TABLE `phlebotomist`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `report_tracking`
--
ALTER TABLE `report_tracking`
  MODIFY `r_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `test_record`
--
ALTER TABLE `test_record`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

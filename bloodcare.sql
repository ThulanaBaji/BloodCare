-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 26, 2023 at 10:59 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bloodcare`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`) VALUES
(10, 'admin1', 'admin1@gmail.com', 'adminA!12');

-- --------------------------------------------------------

--
-- Table structure for table `appointmentslot`
--

CREATE TABLE `appointmentslot` (
  `id` int(11) NOT NULL,
  `hospital_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `time_slot` time NOT NULL,
  `duration` time NOT NULL,
  `status` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bloodcamp`
--

CREATE TABLE `bloodcamp` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `organizer` varchar(45) NOT NULL,
  `hospital_id` int(11) NOT NULL,
  `start_datetime` datetime NOT NULL,
  `duration` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `message` varchar(45) DEFAULT NULL,
  `status` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bloodcamp_donor`
--

CREATE TABLE `bloodcamp_donor` (
  `bloodcamp_id` int(11) NOT NULL,
  `donor_id` int(11) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bloodcamp_seats`
--

CREATE TABLE `bloodcamp_seats` (
  `bloodcamp_id` int(11) NOT NULL,
  `max_seats` int(11) NOT NULL,
  `cur_seats` int(11) NOT NULL,
  `status` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `donor`
--

CREATE TABLE `donor` (
  `id` int(11) NOT NULL,
  `firstname` varchar(16) NOT NULL,
  `lastname` varchar(45) NOT NULL,
  `dob` date NOT NULL,
  `email` varchar(255) NOT NULL,
  `street_address` varchar(45) NOT NULL,
  `city` varchar(45) NOT NULL,
  `district` varchar(45) NOT NULL,
  `province` varchar(45) NOT NULL,
  `contact` varchar(45) NOT NULL,
  `password` varchar(32) NOT NULL,
  `create_time` timestamp NULL DEFAULT current_timestamp(),
  `status` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `donor`
--

INSERT INTO `donor` (`id`, `firstname`, `lastname`, `dob`, `email`, `street_address`, `city`, `district`, `province`, `contact`, `password`, `create_time`, `status`) VALUES
(1004, 'Thulana', 'Vithanage', '2004-05-05', 'thulanabaji@gmail.com', 'Maha veediya', 'Kadugannawa', 'Matara', 'Southern province', '+94712151654', 'GKySxXSNztAH5it1!', '2023-10-18 18:30:00', 'registered');

-- --------------------------------------------------------

--
-- Table structure for table `donor_appointment`
--

CREATE TABLE `donor_appointment` (
  `id` int(11) NOT NULL,
  `donor_id` int(11) NOT NULL,
  `appointmentslot_id` int(11) NOT NULL,
  `status` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `donor_bloodtype`
--

CREATE TABLE `donor_bloodtype` (
  `id` int(11) NOT NULL,
  `donor_id` int(11) NOT NULL,
  `bloodtype` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `donor_donation`
--

CREATE TABLE `donor_donation` (
  `id` int(11) NOT NULL,
  `donor_id` int(11) NOT NULL,
  `donation_type` varchar(45) NOT NULL,
  `hospital_id` int(11) DEFAULT NULL,
  `bloodcamp_id` int(11) DEFAULT NULL,
  `report` varchar(45) NOT NULL,
  `status` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hospital`
--

CREATE TABLE `hospital` (
  `id` int(11) NOT NULL,
  `regnumber` varchar(45) NOT NULL,
  `name` varchar(16) NOT NULL,
  `email` varchar(255) NOT NULL,
  `zipcode` int(11) NOT NULL,
  `street_address` varchar(45) NOT NULL,
  `city` varchar(45) NOT NULL,
  `district` varchar(45) NOT NULL,
  `province` varchar(45) NOT NULL,
  `contact` varchar(45) NOT NULL,
  `password` varchar(32) NOT NULL,
  `verification` varchar(32) DEFAULT NULL,
  `expire` int(11) DEFAULT NULL,
  `create_time` timestamp NULL DEFAULT current_timestamp(),
  `status` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hospital`
--

INSERT INTO `hospital` (`id`, `regnumber`, `name`, `email`, `zipcode`, `street_address`, `city`, `district`, `province`, `contact`, `password`, `verification`, `expire`, `create_time`, `status`) VALUES
(102, 'PQ-11', 'Durdans', 'thulana2006@gmail.com', 10900, 'Dr. James Lane', 'Colombo 05', 'Colombo', 'Western province', '+94112425267', 'pjQswU4xwwaUE5M~!', '64983e950e6bdbfe8b6e9adbe6196e60', 0, '2023-11-25 18:30:00', 'verified');

-- --------------------------------------------------------

--
-- Table structure for table `hospital_bloodrequest`
--

CREATE TABLE `hospital_bloodrequest` (
  `id` int(11) NOT NULL,
  `hospital_id` int(11) NOT NULL,
  `bloodtype` varchar(45) NOT NULL,
  `date` date NOT NULL,
  `qty` int(11) NOT NULL,
  `status` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `appointmentslot`
--
ALTER TABLE `appointmentslot`
  ADD PRIMARY KEY (`id`),
  ADD KEY `appointmentslot_hospital_id` (`hospital_id`);

--
-- Indexes for table `bloodcamp`
--
ALTER TABLE `bloodcamp`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bloodcamp_hospital_id` (`hospital_id`);

--
-- Indexes for table `bloodcamp_donor`
--
ALTER TABLE `bloodcamp_donor`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bloodcamp_donor_bloodcamp_id` (`bloodcamp_id`),
  ADD KEY `bloodcamp_donor_donor_id` (`donor_id`);

--
-- Indexes for table `bloodcamp_seats`
--
ALTER TABLE `bloodcamp_seats`
  ADD PRIMARY KEY (`bloodcamp_id`);

--
-- Indexes for table `donor`
--
ALTER TABLE `donor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `donor_appointment`
--
ALTER TABLE `donor_appointment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `donor_appointment_donor_id` (`donor_id`),
  ADD KEY `donor_appointment_appointmentslot_id` (`appointmentslot_id`);

--
-- Indexes for table `donor_bloodtype`
--
ALTER TABLE `donor_bloodtype`
  ADD PRIMARY KEY (`id`),
  ADD KEY `donor_bloodtype_donor_id` (`donor_id`);

--
-- Indexes for table `donor_donation`
--
ALTER TABLE `donor_donation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `donor_id` (`donor_id`),
  ADD KEY `donor_donation_hospital_id` (`hospital_id`),
  ADD KEY `donor_donation_bloodcamp_id` (`bloodcamp_id`);

--
-- Indexes for table `hospital`
--
ALTER TABLE `hospital`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hospital_bloodrequest`
--
ALTER TABLE `hospital_bloodrequest`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hospital_bloodrequest_hospital_id` (`hospital_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `donor`
--
ALTER TABLE `donor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1005;

--
-- AUTO_INCREMENT for table `hospital`
--
ALTER TABLE `hospital`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointmentslot`
--
ALTER TABLE `appointmentslot`
  ADD CONSTRAINT `appointmentslot_hospital_id` FOREIGN KEY (`hospital_id`) REFERENCES `hospital` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `bloodcamp`
--
ALTER TABLE `bloodcamp`
  ADD CONSTRAINT `bloodcamp_hospital_id` FOREIGN KEY (`hospital_id`) REFERENCES `hospital` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `bloodcamp_donor`
--
ALTER TABLE `bloodcamp_donor`
  ADD CONSTRAINT `bloodcamp_donor_bloodcamp_id` FOREIGN KEY (`bloodcamp_id`) REFERENCES `bloodcamp` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `bloodcamp_donor_donor_id` FOREIGN KEY (`donor_id`) REFERENCES `donor` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `bloodcamp_seats`
--
ALTER TABLE `bloodcamp_seats`
  ADD CONSTRAINT `bloodcamp_seats_bloodcamp_id` FOREIGN KEY (`bloodcamp_id`) REFERENCES `bloodcamp` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `donor_appointment`
--
ALTER TABLE `donor_appointment`
  ADD CONSTRAINT `donor_appointment_appointmentslot_id` FOREIGN KEY (`appointmentslot_id`) REFERENCES `appointmentslot` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `donor_appointment_donor_id` FOREIGN KEY (`donor_id`) REFERENCES `donor` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `donor_bloodtype`
--
ALTER TABLE `donor_bloodtype`
  ADD CONSTRAINT `donor_bloodtype_donor_id` FOREIGN KEY (`donor_id`) REFERENCES `donor` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `donor_donation`
--
ALTER TABLE `donor_donation`
  ADD CONSTRAINT `donor_donation_bloodcamp_id` FOREIGN KEY (`bloodcamp_id`) REFERENCES `bloodcamp` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `donor_donation_hospital_id` FOREIGN KEY (`hospital_id`) REFERENCES `hospital` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `donor_id` FOREIGN KEY (`donor_id`) REFERENCES `donor` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `hospital_bloodrequest`
--
ALTER TABLE `hospital_bloodrequest`
  ADD CONSTRAINT `hospital_bloodrequest_hospital_id` FOREIGN KEY (`hospital_id`) REFERENCES `hospital` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

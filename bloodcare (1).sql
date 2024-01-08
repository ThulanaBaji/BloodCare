-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 08, 2024 at 01:47 PM
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `appointmentslot`
--

CREATE TABLE `appointmentslot` (
  `id` int(11) NOT NULL,
  `hospital_id` int(11) NOT NULL,
  `datetime` bigint(20) NOT NULL,
  `duration` bigint(20) NOT NULL,
  `status` varchar(45) NOT NULL,
  `message` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `appointmentslot`
--

INSERT INTO `appointmentslot` (`id`, `hospital_id`, `datetime`, `duration`, `status`, `message`) VALUES
(702, 101, 1704508200000, 18000000, 'vacant', NULL),
(703, 101, 1705113000000, 18000000, 'cancelled', 'Alpha Palaia cancelled the appointment'),
(704, 101, 1705717800000, 18000000, 'cancelled', 'Alpha Palaia cancelled the appointment'),
(705, 101, 1706322600000, 18000000, 'vacant', NULL),
(706, 101, 1706927400000, 18000000, 'vacant', NULL),
(707, 101, 1707532200000, 18000000, 'vacant', NULL),
(708, 101, 1708137000000, 18000000, 'vacant', NULL),
(709, 101, 1708741800000, 18000000, 'vacant', NULL),
(710, 101, 1709346600000, 18000000, 'vacant', NULL),
(711, 101, 1704526200000, 18000000, 'reserved', NULL),
(712, 101, 1705131000000, 18000000, 'cancelled', 'Alpha Palaia cancelled the appointment'),
(713, 101, 1705735800000, 18000000, 'cancelled', 'Alpha Palaia cancelled the appointment'),
(714, 101, 1706340600000, 18000000, 'cancelled', 'Alpha Palaia cancelled the appointment'),
(715, 101, 1706945400000, 18000000, 'vacant', NULL),
(716, 101, 1707550200000, 18000000, 'vacant', NULL),
(717, 101, 1708155000000, 18000000, 'vacant', NULL),
(718, 101, 1708759800000, 18000000, 'vacant', NULL),
(719, 101, 1709364600000, 18000000, 'vacant', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `bloodcamp`
--

CREATE TABLE `bloodcamp` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `profile` varchar(200) NOT NULL,
  `organizer` varchar(45) NOT NULL,
  `hospital_id` int(11) NOT NULL,
  `start_datetime` bigint(20) NOT NULL,
  `duration` bigint(20) NOT NULL DEFAULT current_timestamp(),
  `location_pin` varchar(200) NOT NULL,
  `location_district` varchar(200) NOT NULL,
  `location_city` varchar(200) NOT NULL,
  `location_address` varchar(400) NOT NULL,
  `max_seats` int(11) NOT NULL,
  `message` varchar(1000) DEFAULT NULL,
  `status` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `bloodcamp`
--

INSERT INTO `bloodcamp` (`id`, `name`, `profile`, `organizer`, `hospital_id`, `start_datetime`, `duration`, `location_pin`, `location_district`, `location_city`, `location_address`, `max_seats`, `message`, `status`) VALUES
(1, 'Vivekananda blood camp', '1704351491Blood-Donation-Camp.jpg', 'Vivekananda college of Engineering', 101, 1728100200000, 30600000, 'https://maps.app.goo.gl/XdJKfBJg5Dp9A6JS9', 'Puttur', 'Nahru Nagar', 'Sri Rama hall, Vivekananda College, Nahru Nagar, Puttur.', 1000, 'Due to an unavoidable reason, organizers had to cancel the camp. A new camp will be organized with the decided new date. We are sorry for any inconvenience occurred.', 'vacant');

-- --------------------------------------------------------

--
-- Table structure for table `bloodcamp_donor`
--

CREATE TABLE `bloodcamp_donor` (
  `bloodcamp_id` int(11) NOT NULL,
  `donor_id` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `bloodcamp_donor`
--

INSERT INTO `bloodcamp_donor` (`bloodcamp_id`, `donor_id`, `id`, `status`) VALUES
(1, 1000, 1, 'joined'),
(1, 1005, 2, 'quit'),
(1, 1002, 3, 'quit');

-- --------------------------------------------------------

--
-- Table structure for table `donor`
--

CREATE TABLE `donor` (
  `id` int(11) NOT NULL,
  `firstname` varchar(16) NOT NULL,
  `lastname` varchar(45) NOT NULL,
  `profile` varchar(400) NOT NULL,
  `dob` date NOT NULL,
  `email` varchar(255) NOT NULL,
  `zipcode` int(11) NOT NULL,
  `street_address` varchar(45) NOT NULL,
  `city` varchar(45) NOT NULL,
  `district` varchar(45) NOT NULL,
  `province` varchar(45) NOT NULL,
  `contact` varchar(45) NOT NULL,
  `password` varchar(32) NOT NULL,
  `create_time` timestamp NULL DEFAULT current_timestamp(),
  `status` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `donor`
--

INSERT INTO `donor` (`id`, `firstname`, `lastname`, `profile`, `dob`, `email`, `zipcode`, `street_address`, `city`, `district`, `province`, `contact`, `password`, `create_time`, `status`) VALUES
(1000, 'Cecilia', 'Colaizzo', '1704377577952.jpg', '2000-02-02', 'cecilia.colaizzo@gmail.com', 0, 'Norris Canal Road', 'Colombo 10', 'Kegalle', 'Sabaragamuwa province', '+94712178659', 'e69c2991405e016e9a897b340598beb1', '2023-11-29 18:30:00', 'registered'),
(1001, 'Tegan', 'Arceo', '1701350643redd-f-pzOUnvx9c1E-unsplash.jpg', '2004-04-04', 'tegan.arceo@gmail.com', 0, 'Norris Canal Road', 'Dual', 'Colombo', 'Western province', '+94778698766', '3d5c88ce740769344583c723f2efb0b3', '2023-11-29 18:30:00', 'registered'),
(1002, 'Loren', 'Asar', '1701351072charlesdeluvio-kVg2DQTAK7c-unsplash.jpg', '2001-05-05', 'loren.asar@gmail.com', 0, 'Norris Canal Road', 'Beliatta', 'Matara', 'Southern province', '+94712345678', 'bdb1ad040ee48e4b3adf6903acb0258e', '2023-11-29 18:30:00', 'registered'),
(1003, 'Roslyn', 'Chavous', '1701351157gift-habeshaw-ImFZSnfobKk-unsplash.jpg', '2000-06-06', 'roslyn.chavous@gmail.com', 0, 'Norris Canal Road', 'Beliatta', 'Matara', 'Southern province', '+94756712345', '2102c8adab8896992b733aaef02d12eb', '2023-11-29 18:30:00', 'registered'),
(1004, 'Diane', 'Devreese', '1701351240toa-heftiba-O3ymvT7Wf9U-unsplash.jpg', '2001-04-02', 'diane.devreese@gmail.com', 0, 'Norris Canal Road', 'Colombo 10', 'Colombo', 'Western province', '+94768912345', '93032a1258b3f32dc771dc7499f6666b', '2023-11-29 18:30:00', 'registered'),
(1005, 'Alpha', 'Palaia', '1701351346tyler-nix-X2YO8KFxgEM-unsplash.jpg', '2000-01-01', 'alpha.palaia@gmail.com', 0, 'Norris Canal Road', 'Beliatta', 'Matara', 'Southern province', '+94756812345', '65bd271b6cb466944f944ad1cc184995', '2023-11-29 18:30:00', 'registered'),
(1006, 'Mona', 'Delasancha', '1701351413aiony-haust-3TLl_97HNJo-unsplash.jpg', '2001-07-07', 'mona.delasancha@gmail.com', 0, 'Norris Canal Road', 'Colombo 10', 'Colombo', 'Western province', '+94765412345', '3e1e25fe36bd6ec709a5748eb864d388', '2023-11-29 18:30:00', 'registered'),
(1007, 'Jani', 'Biddy', '1701351500kimson-doan-HD8KlyWRYYM-unsplash.jpg', '2000-01-01', 'jani.biddy@gmail.com', 0, 'Norris Canal Road', 'Beliatta', 'Matara', 'Southern province', '+94756712345', '225067dfd4dec1bc07d5ec6e2b5eea25', '2023-11-29 18:30:00', 'registered');

-- --------------------------------------------------------

--
-- Table structure for table `donor_appointment`
--

CREATE TABLE `donor_appointment` (
  `id` int(11) NOT NULL,
  `donor_id` int(11) NOT NULL,
  `appointmentslot_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `donor_appointment`
--

INSERT INTO `donor_appointment` (`id`, `donor_id`, `appointmentslot_id`) VALUES
(7, 1005, 711),
(8, 1005, 712),
(9, 1005, 703),
(10, 1005, 713),
(11, 1005, 704),
(12, 1005, 714);

-- --------------------------------------------------------

--
-- Table structure for table `donor_bloodtype`
--

CREATE TABLE `donor_bloodtype` (
  `id` int(11) NOT NULL,
  `donor_id` int(11) NOT NULL,
  `bloodtype` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hospital`
--

CREATE TABLE `hospital` (
  `id` int(11) NOT NULL,
  `regnumber` varchar(45) NOT NULL,
  `name` varchar(16) NOT NULL,
  `profile` varchar(400) NOT NULL,
  `email` varchar(255) NOT NULL,
  `zipcode` int(11) NOT NULL,
  `street_address` varchar(45) NOT NULL,
  `city` varchar(45) NOT NULL,
  `district` varchar(45) NOT NULL,
  `province` varchar(45) NOT NULL,
  `contact` varchar(45) NOT NULL,
  `password` varchar(32) NOT NULL,
  `create_time` timestamp NULL DEFAULT current_timestamp(),
  `verification` varchar(32) NOT NULL,
  `expire` int(10) NOT NULL,
  `status` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `hospital`
--

INSERT INTO `hospital` (`id`, `regnumber`, `name`, `profile`, `email`, `zipcode`, `street_address`, `city`, `district`, `province`, `contact`, `password`, `create_time`, `verification`, `expire`, `status`) VALUES
(100, 'LK0010N00005', 'Asiri Hospital', '1701353336asiri.png', 'thulanabaji@gmail.com', 10600, 'Norris Canal Road', 'Colombo 10', 'Colombo', 'Western province', '+94114665500', 'd0abeba5dd236379e84d75d21a53294d', '2023-11-29 18:30:00', '939f2202fed2688e08b76372db02b752', 0, 'verified'),
(101, 'LK0338N00000', 'Durdans Hospital', '1701354726logo-small.jpg', 'thulanactf@gmail.com', 82401, 'Norris Canal Cross Road', 'Mahaunava', 'Colombo', 'Western province', '0112140001', 'b76ad8b2ed9b9c2f67202e16c76f06d2', '2023-11-29 18:30:00', '9f2baa2c76a82e5e975a5497e7d38f1a', 0, 'verified');

-- --------------------------------------------------------

--
-- Table structure for table `hospital_bloodrequest`
--

CREATE TABLE `hospital_bloodrequest` (
  `id` int(11) NOT NULL,
  `hospital_id` int(11) NOT NULL,
  `bloodtype` varchar(45) NOT NULL,
  `date` bigint(20) NOT NULL,
  `before` bigint(20) NOT NULL,
  `qty` int(11) NOT NULL,
  `status` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hospital_configure`
--

CREATE TABLE `hospital_configure` (
  `id` int(11) NOT NULL,
  `hospital_id` int(11) NOT NULL,
  `appointment` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `hospital_configure`
--

INSERT INTO `hospital_configure` (`id`, `hospital_id`, `appointment`) VALUES
(1, 100, '{\"days\":[1,2],\"dates\":[],\"start\":\"08:00\",\"end\":\"20:00\",\"duration\":\"00:30\",\"breaks\":[]}'),
(2, 101, '{\"days\":[0,1,2,3,4,5],\"dates\":[],\"start\":\"08:00\",\"end\":\"20:00\",\"duration\":\"05:00\",\"breaks\":[{\"start\":\"09:00\",\"end\":\"10:00\"}]}');

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `id` int(11) NOT NULL,
  `message` text NOT NULL,
  `sender` varchar(200) NOT NULL,
  `image` varchar(500) NOT NULL,
  `action` varchar(300) DEFAULT NULL,
  `action_name` varchar(100) DEFAULT NULL,
  `type` varchar(20) NOT NULL,
  `time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`id`, `message`, `sender`, `image`, `action`, `action_name`, `type`, `time`) VALUES
(1, 'your appointment at <b>Durdans Hospital</b> was cancelled.', 'Durdans Hospital', 'uploads/hospital/profileimages/1701354726logo-small.jpg', 'donor/appointment/ongoing/#2', 'appointment', 'success', '2024-01-03 00:00:00'),
(2, 'appointments available now at your favorite blood donation center ~ <b>Durdans Hospital</b>', 'BloodCare', 'uploads/hospital/profileimages/1701354726logo-small.jpg', 'donor/appointment/', 'lets check', 'info', '2024-01-08 15:41:13');

-- --------------------------------------------------------

--
-- Table structure for table `notification_donor`
--

CREATE TABLE `notification_donor` (
  `id` int(11) NOT NULL,
  `donor_id` int(11) NOT NULL,
  `notification_id` int(11) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notification_donor`
--

INSERT INTO `notification_donor` (`id`, `donor_id`, `notification_id`, `status`) VALUES
(1, 1000, 1, 'deleted'),
(2, 1000, 2, 'deleted');

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
-- Indexes for table `hospital_configure`
--
ALTER TABLE `hospital_configure`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notification_donor`
--
ALTER TABLE `notification_donor`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notification_donor_donorid_fk` (`donor_id`),
  ADD KEY `notification_donor_notificationid_fk` (`notification_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `appointmentslot`
--
ALTER TABLE `appointmentslot`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=720;

--
-- AUTO_INCREMENT for table `bloodcamp`
--
ALTER TABLE `bloodcamp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bloodcamp_donor`
--
ALTER TABLE `bloodcamp_donor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `donor`
--
ALTER TABLE `donor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1008;

--
-- AUTO_INCREMENT for table `donor_appointment`
--
ALTER TABLE `donor_appointment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `donor_bloodtype`
--
ALTER TABLE `donor_bloodtype`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `donor_donation`
--
ALTER TABLE `donor_donation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hospital`
--
ALTER TABLE `hospital`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT for table `hospital_bloodrequest`
--
ALTER TABLE `hospital_bloodrequest`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hospital_configure`
--
ALTER TABLE `hospital_configure`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `notification_donor`
--
ALTER TABLE `notification_donor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `donor_appointment`
--
ALTER TABLE `donor_appointment`
  ADD CONSTRAINT `donor_appointment_ibfk_1` FOREIGN KEY (`donor_id`) REFERENCES `donor` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `donor_appointment_ibfk_2` FOREIGN KEY (`appointmentslot_id`) REFERENCES `appointmentslot` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `notification_donor`
--
ALTER TABLE `notification_donor`
  ADD CONSTRAINT `notification_donor_donorid_fk` FOREIGN KEY (`donor_id`) REFERENCES `donor` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `notification_donor_notificationid_fk` FOREIGN KEY (`notification_id`) REFERENCES `notification` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

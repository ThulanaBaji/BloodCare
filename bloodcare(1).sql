-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 03, 2023 at 06:12 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

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
(1, 101, 1701570600000, 3600000, 'rejected', 'service available appointments changed, please make another appointment.'),
(308, 101, 1701691200000, 1800000, 'reserved', NULL),
(388, 101, 1702733400000, 3600000, 'rejected', 'Unfortunately, service unavailble at this time'),
(455, 101, 1706952600000, 3600000, 'rejected', 'service available appointments changed, please make another appointment.'),
(461, 101, 1702098600000, 2400000, 'vacant', NULL),
(467, 101, 1702113000000, 2400000, 'vacant', NULL),
(471, 101, 1702127400000, 2400000, 'vacant', NULL),
(475, 101, 1702703400000, 2400000, 'vacant', NULL),
(481, 101, 1702717800000, 2400000, 'vacant', NULL),
(485, 101, 1702732200000, 2400000, 'vacant', NULL),
(489, 101, 1703308200000, 2400000, 'vacant', NULL),
(495, 101, 1703322600000, 2400000, 'vacant', NULL),
(499, 101, 1703337000000, 2400000, 'vacant', NULL),
(503, 101, 1703913000000, 2400000, 'vacant', NULL),
(509, 101, 1703927400000, 2400000, 'vacant', NULL),
(513, 101, 1703941800000, 2400000, 'vacant', NULL),
(517, 101, 1704517800000, 2400000, 'vacant', NULL),
(523, 101, 1704532200000, 2400000, 'vacant', NULL),
(527, 101, 1704546600000, 2400000, 'vacant', NULL),
(531, 101, 1705122600000, 2400000, 'vacant', NULL),
(537, 101, 1705137000000, 2400000, 'vacant', NULL),
(541, 101, 1705151400000, 2400000, 'vacant', NULL),
(545, 101, 1705727400000, 2400000, 'vacant', NULL),
(551, 101, 1705741800000, 2400000, 'vacant', NULL),
(555, 101, 1705756200000, 2400000, 'vacant', NULL),
(559, 101, 1706332200000, 2400000, 'vacant', NULL),
(565, 101, 1706346600000, 2400000, 'vacant', NULL),
(569, 101, 1706361000000, 2400000, 'vacant', NULL),
(573, 101, 1706937000000, 2400000, 'vacant', NULL),
(579, 101, 1706951400000, 2400000, 'vacant', NULL),
(583, 101, 1706965800000, 2400000, 'vacant', NULL),
(668, 101, 1702117800000, 14400000, 'vacant', NULL),
(671, 101, 1702722600000, 14400000, 'vacant', NULL),
(674, 101, 1703327400000, 14400000, 'vacant', NULL),
(677, 101, 1703932200000, 14400000, 'vacant', NULL),
(680, 101, 1704537000000, 14400000, 'vacant', NULL),
(683, 101, 1705141800000, 14400000, 'vacant', NULL),
(686, 101, 1705746600000, 14400000, 'vacant', NULL),
(689, 101, 1706351400000, 14400000, 'vacant', NULL),
(692, 101, 1706956200000, 14400000, 'vacant', NULL),
(693, 101, 1702089000000, 18000000, 'vacant', NULL),
(694, 101, 1702693800000, 18000000, 'vacant', NULL),
(695, 101, 1703298600000, 18000000, 'vacant', NULL),
(696, 101, 1703903400000, 18000000, 'vacant', NULL),
(697, 101, 1704508200000, 18000000, 'vacant', NULL),
(698, 101, 1705113000000, 18000000, 'vacant', NULL),
(699, 101, 1705717800000, 18000000, 'vacant', NULL),
(700, 101, 1706322600000, 18000000, 'vacant', NULL),
(701, 101, 1706927400000, 18000000, 'vacant', NULL);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bloodcamp_donor`
--

CREATE TABLE `bloodcamp_donor` (
  `bloodcamp_id` int(11) NOT NULL,
  `donor_id` int(11) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bloodcamp_seats`
--

CREATE TABLE `bloodcamp_seats` (
  `bloodcamp_id` int(11) NOT NULL,
  `max_seats` int(11) NOT NULL,
  `cur_seats` int(11) NOT NULL,
  `status` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

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
(1000, 'Cecilia', 'Colaizzo', '1701336896icons8-team-6LZuSzSwso0-unsplash.jpg', '2000-02-02', 'cecilia.colaizzo@gmail.com', 0, 'Norris Canal Road', 'Colombo 10', 'Colombo', 'Western province', '+94712178659', 'yRKNsi7btHMDwc4!', '2023-11-29 18:30:00', 'registered'),
(1001, 'Tegan', 'Arceo', '1701350643redd-f-pzOUnvx9c1E-unsplash.jpg', '2004-04-04', 'tegan.arceo@gmail.com', 0, 'Norris Canal Road', 'Dual', 'Colombo', 'Western province', '+94778698766', 'skFGQCa238zeZjz!', '2023-11-29 18:30:00', 'registered'),
(1002, 'Loren', 'Asar', '1701351072charlesdeluvio-kVg2DQTAK7c-unsplash.jpg', '2001-05-05', 'loren.asar@gmail.com', 0, 'Norris Canal Road', 'Beliatta', 'Matara', 'Southern province', '+94712345678', 'UuWQ9LszX57iEs3!', '2023-11-29 18:30:00', 'registered'),
(1003, 'Roslyn', 'Chavous', '1701351157gift-habeshaw-ImFZSnfobKk-unsplash.jpg', '2000-06-06', 'roslyn.chavous@gmail.com', 0, 'Norris Canal Road', 'Beliatta', 'Matara', 'Southern province', '+94756712345', 'PZq2PZLbXsPB4bV!', '2023-11-29 18:30:00', 'registered'),
(1004, 'Diane', 'Devreese', '1701351240toa-heftiba-O3ymvT7Wf9U-unsplash.jpg', '2001-04-02', 'diane.devreese@gmail.com', 0, 'Norris Canal Road', 'Colombo 10', 'Colombo', 'Western province', '+94768912345', 'qdJ2vs3wTdGrfa2!', '2023-11-29 18:30:00', 'registered'),
(1005, 'Alpha', 'Palaia', '1701351346tyler-nix-X2YO8KFxgEM-unsplash.jpg', '2000-01-01', 'alpha.palaia@gmail.com', 0, 'Norris Canal Road', 'Beliatta', 'Matara', 'Southern province', '+94756812345', 'E4HBQFuUV4GJZ8w@', '2023-11-29 18:30:00', 'registered'),
(1006, 'Mona', 'Delasancha', '1701351413aiony-haust-3TLl_97HNJo-unsplash.jpg', '2001-07-07', 'mona.delasancha@gmail.com', 0, 'Norris Canal Road', 'Colombo 10', 'Colombo', 'Western province', '+94765412345', 'G3WLWUQi74gqsP9!', '2023-11-29 18:30:00', 'registered'),
(1007, 'Jani', 'Biddy', '1701351500kimson-doan-HD8KlyWRYYM-unsplash.jpg', '2000-01-01', 'jani.biddy@gmail.com', 0, 'Norris Canal Road', 'Beliatta', 'Matara', 'Southern province', '+94756712345', 'yYkg9agp3QNFvb9@', '2023-11-29 18:30:00', 'registered');

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
(3, 1000, 1),
(4, 1004, 308),
(5, 1002, 455),
(6, 1007, 388);

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
(100, 'LK0010N00005', 'Asiri Hospital', '1701353336asiri.png', 'thulanabaji@gmail.com', 10600, 'Norris Canal Road', 'Colombo 10', 'Colombo', 'Western province', '+94114665500', '2BGvSwx3iePdxcS!', '2023-11-29 18:30:00', '939f2202fed2688e08b76372db02b752', 0, 'verified'),
(101, 'LK0338N00000', 'Durdans Hospital', '1701354726logo-small.jpg', 'thulanactf@gmail.com', 82400, 'Norris Canal Road', 'Beliatta', 'Matara', 'Southern province', '0112140000', '7NqS5wD67JqCkES@', '2023-11-29 18:30:00', '9f2baa2c76a82e5e975a5497e7d38f1a', 0, 'verified');

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
(2, 101, '{\"days\":[0,1,2,3,4,5],\"dates\":[],\"start\":\"08:00\",\"end\":\"20:00\",\"duration\":\"05:00\",\"breaks\":[{\"start\":\"17:00\",\"end\":\"18:00\"},{\"start\":\"09:00\",\"end\":\"10:00\"}]}');

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
-- Indexes for table `hospital_configure`
--
ALTER TABLE `hospital_configure`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=702;

--
-- AUTO_INCREMENT for table `bloodcamp`
--
ALTER TABLE `bloodcamp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bloodcamp_donor`
--
ALTER TABLE `bloodcamp_donor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bloodcamp_seats`
--
ALTER TABLE `bloodcamp_seats`
  MODIFY `bloodcamp_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `donor`
--
ALTER TABLE `donor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1008;

--
-- AUTO_INCREMENT for table `donor_appointment`
--
ALTER TABLE `donor_appointment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
-- Constraints for dumped tables
--

--
-- Constraints for table `donor_appointment`
--
ALTER TABLE `donor_appointment`
  ADD CONSTRAINT `donor_appointment_ibfk_1` FOREIGN KEY (`donor_id`) REFERENCES `donor` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `donor_appointment_ibfk_2` FOREIGN KEY (`appointmentslot_id`) REFERENCES `appointmentslot` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

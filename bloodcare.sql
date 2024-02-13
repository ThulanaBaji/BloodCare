-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 13, 2024 at 07:21 AM
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
  `employee_id` text NOT NULL,
  `email` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `employee_id`, `email`, `password`) VALUES
(1, 'raveen senevirathne', 'UD34FG56', 'raveen@support-desk.bloodcare.com', 'd6c79f6a796d72f2ef9725a74260bed4');

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
(703, 101, 1705113000000, 18000000, 'vacant', 'Alpha Palaia cancelled the appointment'),
(704, 101, 1705717800000, 18000000, 'vacant', 'Alpha Palaia cancelled the appointment'),
(705, 101, 1706322600000, 18000000, 'vacant', 'Alpha Seorge cancelled the appointment'),
(706, 101, 1706927400000, 18000000, 'vacant', NULL),
(707, 101, 1707532200000, 18000000, 'vacant', NULL),
(708, 101, 1708137000000, 18000000, 'donated', NULL),
(709, 101, 1708741800000, 18000000, 'vacant', NULL),
(710, 101, 1709346600000, 18000000, 'vacant', NULL),
(711, 101, 1704526200000, 18000000, 'vacant', NULL),
(712, 101, 1705131000000, 18000000, 'vacant', 'Alpha Palaia cancelled the appointmentj\\\\'),
(713, 101, 1705735800000, 18000000, 'vacant', 'Alpha Palaia cancelled the appointment'),
(714, 101, 1706340600000, 18000000, 'vacant', 'Alpha Palaia cancelled the appointment'),
(715, 101, 1706945400000, 18000000, 'vacant', NULL),
(716, 101, 1707550200000, 18000000, 'vacant', NULL),
(717, 101, 1708155000000, 18000000, 'reserved', 'm'),
(718, 101, 1708759800000, 18000000, 'vacant', NULL),
(719, 101, 1709364600000, 18000000, 'vacant', NULL),
(720, 101, 1707618600000, 18000000, 'vacant', NULL),
(721, 101, 1707636600000, 18000000, 'vacant', NULL),
(722, 101, 1708223400000, 18000000, 'vacant', NULL),
(723, 101, 1708241400000, 18000000, 'vacant', NULL),
(724, 101, 1708828200000, 18000000, 'vacant', NULL),
(725, 101, 1708846200000, 18000000, 'vacant', NULL),
(726, 101, 1709433000000, 18000000, 'vacant', NULL),
(727, 101, 1709451000000, 18000000, 'vacant', NULL),
(728, 101, 1710037800000, 18000000, 'vacant', NULL),
(729, 101, 1710055800000, 18000000, 'vacant', NULL),
(730, 101, 1710642600000, 18000000, 'vacant', NULL),
(731, 101, 1710660600000, 18000000, 'vacant', NULL),
(732, 101, 1711247400000, 18000000, 'vacant', NULL),
(733, 101, 1711265400000, 18000000, 'vacant', NULL),
(734, 101, 1711852200000, 18000000, 'vacant', NULL),
(735, 101, 1711870200000, 18000000, 'vacant', NULL);

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
  `admin_id` int(11) NOT NULL,
  `status` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `bloodcamp`
--

INSERT INTO `bloodcamp` (`id`, `name`, `profile`, `organizer`, `hospital_id`, `start_datetime`, `duration`, `location_pin`, `location_district`, `location_city`, `location_address`, `max_seats`, `message`, `admin_id`, `status`) VALUES
(1, 'Vivekananda blood camp', '1704351491Blood-Donation-Camp.jpg', 'Vivekananda college of Engineering', 101, 1728100200000, 30600000, 'https://maps.app.goo.gl/XdJKfBJg5Dp9A6JS9', 'Puttur', 'Nahru Nagar', 'Sri Rama hall, Vivekananda College, Nahru Nagar, Puttur.', 1000, 'ds', 1, 'revoked'),
(2, 'Vijithayapa 23rd', 'default.svg', 'Vijijthayapa', 101, 1733398620000, 30600000, 'https://maps.app.goo.gl/XdJKfBJg5Dp9A6JS9', 'Colombo', 'Colombo 10', 'Norris Canal Road', 500, '', 0, 'vacant'),
(3, 'Gold Seas 3rd consecutive', '1707021830453.png', 'Gold sea company', 101, 1707017400000, 36000000, 'https://maps.app.goo.gl/XdJKfBJg5Dp9A6JS9', 'Colombo', 'Papiliyana', 'No 44/4, De Fonseka Rd, Bambalapitiya.', 1000, '', 0, 'vacant');

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
(1, 1000, 1, 'donated'),
(1, 1005, 2, 'quit'),
(1, 1002, 3, 'quit'),
(2, 1005, 4, 'donated'),
(1, 1004, 5, 'joined'),
(2, 1004, 6, 'joined'),
(1, 1003, 7, 'joined'),
(2, 1003, 8, 'joined'),
(1, 1001, 9, 'joined'),
(2, 1001, 10, 'joined'),
(1, 1006, 11, 'joined'),
(2, 1006, 12, 'joined');

-- --------------------------------------------------------

--
-- Table structure for table `donor`
--

CREATE TABLE `donor` (
  `id` int(11) NOT NULL,
  `membership_id` varchar(20) NOT NULL,
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

INSERT INTO `donor` (`id`, `membership_id`, `firstname`, `lastname`, `profile`, `dob`, `email`, `zipcode`, `street_address`, `city`, `district`, `province`, `contact`, `password`, `create_time`, `status`) VALUES
(1000, '2548065C24E144B', 'Cecilia', 'Colaizzo', '1704377577952.jpg', '2000-02-02', 'cecilia.colaizzo@gmail.com', 0, 'Norris Canal Road', 'Colombo 10', 'Kegalle', 'Sabaragamuwa province', '+94712178659', 'e69c2991405e016e9a897b340598beb1', '2023-11-29 18:30:00', 'registered'),
(1001, '2031065C24E7224', 'Tegan', 'Arceo', '1701350643redd-f-pzOUnvx9c1E-unsplash.jpg', '2004-04-04', 'tegan.arceo@gmail.com', 0, 'Norris Canal Road', 'Dual', 'Colombo', 'Western province', '+94778698766', '3d5c88ce740769344583c723f2efb0b3', '2023-11-29 18:30:00', 'registered'),
(1002, '2135065C24EF92D', 'Loren', 'Asar', '1701351072charlesdeluvio-kVg2DQTAK7c-unsplash.jpg', '2001-05-05', 'loren.asar@gmail.com', 0, 'Norris Canal Road', 'Beliatta', 'Matara', 'Southern province', '+94712345678', 'bdb1ad040ee48e4b3adf6903acb0258e', '2023-11-29 18:30:00', 'registered'),
(1003, '2135065C24EF109', 'Roslyn', 'Chavous', '1701351157gift-habeshaw-ImFZSnfobKk-unsplash.jpg', '2000-06-06', 'roslyn.chavous@gmail.com', 0, 'Norris Canal Road', 'Beliatta', 'Matara', 'Southern province', '+94756712345', '2102c8adab8896992b733aaef02d12eb', '2023-11-29 18:30:00', 'registered'),
(1004, '2031065C24E9B37', 'Diane', 'Devreese', '1701351240toa-heftiba-O3ymvT7Wf9U-unsplash.jpg', '2001-04-02', 'diane.devreese@gmail.com', 0, 'Norris Canal Road', 'Colombo 10', 'Colombo', 'Western province', '+94768912345', '93032a1258b3f32dc771dc7499f6666b', '2023-11-29 18:30:00', 'registered'),
(1005, '2135065C24EDEAF', 'Alpha', 'Seorge', '1705222218462.jpg', '2000-01-01', 'alpha.palaia@gmail.com', 0, 'Norris Canal Road', 'Beliatta', 'Matara', 'Southern province', '+94756812345', '65bd271b6cb466944f944ad1cc184995', '2023-11-29 18:30:00', 'registered'),
(1006, '2031065C24EA8F0', 'Mona', 'Delasancha', '1701351413aiony-haust-3TLl_97HNJo-unsplash.jpg', '2001-07-07', 'mona.delasancha@gmail.com', 0, 'Norris Canal Road', 'Colombo 10', 'Colombo', 'Western province', '+94765412345', '3e1e25fe36bd6ec709a5748eb864d388', '2023-11-29 18:30:00', 'registered'),
(1007, '2135065C24ED5F1', 'Jani', 'Biddy', '1701351500kimson-doan-HD8KlyWRYYM-unsplash.jpg', '2000-01-01', 'jani.biddy@gmail.com', 0, 'Norris Canal Road', 'Beliatta', 'Matara', 'Southern province', '+94756712345', '225067dfd4dec1bc07d5ec6e2b5eea25', '2023-11-29 18:30:00', 'registered'),
(1008, '2033065AF3ED302', 'Jaul', 'Paulze', '1705983699419.jpg', '2004-05-05', 'jaul.paulze@gmail.com', 0, 'Rodrigo Street', 'Aulassa', 'Kalutara', 'Western province', '+94112233443', 'eb1290d8a246011d214ac5a1c01c7c9c', '2024-01-22 18:30:00', 'registered');

-- --------------------------------------------------------

--
-- Table structure for table `donor_appointment`
--

CREATE TABLE `donor_appointment` (
  `id` int(11) NOT NULL,
  `donor_id` int(11) NOT NULL,
  `appointmentslot_id` int(11) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `donor_appointment`
--

INSERT INTO `donor_appointment` (`id`, `donor_id`, `appointmentslot_id`, `status`) VALUES
(18, 1005, 717, ''),
(19, 1001, 708, 'donated');

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
  `reference` varchar(50) NOT NULL,
  `donor_id` int(11) NOT NULL,
  `donation_medium` varchar(100) NOT NULL,
  `hospital_id` int(11) NOT NULL,
  `donated_datetime` bigint(20) NOT NULL,
  `processed_datetime` bigint(20) DEFAULT NULL,
  `blood_type` varchar(20) DEFAULT NULL,
  `blood_vol` int(11) DEFAULT NULL,
  `status` varchar(45) NOT NULL,
  `message` varchar(600) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `donor_donation`
--

INSERT INTO `donor_donation` (`id`, `reference`, `donor_id`, `donation_medium`, `hospital_id`, `donated_datetime`, `processed_datetime`, `blood_type`, `blood_vol`, `status`, `message`) VALUES
(3, 'SN4567NJ', 1000, 'vivekanada blood camp', 101, 1705564980000, 1705564980000, 'ap', 500, 'processing', NULL),
(5, 'SN345FGH', 1005, 'Vijithayapa 23rd', 101, 1707238648000, 1707246842000, 'bp', 470, 'rejected', 'Donor blood contains possible disfunctioning red blood cells'),
(6, 'ADF4567G', 1001, 'Through appointment', 101, 1707391830000, 1707391880000, 'bn', 500, 'processed', NULL);

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
  `status` varchar(45) NOT NULL,
  `responsed_datetime` bigint(20) NOT NULL,
  `responsed_admin` int(11) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `hospital`
--

INSERT INTO `hospital` (`id`, `regnumber`, `name`, `profile`, `email`, `zipcode`, `street_address`, `city`, `district`, `province`, `contact`, `password`, `create_time`, `verification`, `expire`, `status`, `responsed_datetime`, `responsed_admin`, `message`) VALUES
(100, 'LK0010N00005', 'Asiri Hospital', '1701353336asiri.png', 'thulanabaji@gmail.com', 10600, 'Norris Canal Road', 'Colombo 10', 'Colombo', 'Western province', '+94114665500', 'd0abeba5dd236379e84d75d21a53294d', '2023-11-29 18:30:00', '939f2202fed2688e08b76372db02b752', 0, 'accepted', 1707676101000, 1, ''),
(101, 'LK0338N00000', 'Durdans Hospital', '1705383402656.jpg', 'thulanactf@gmail.com', 82401, 'Norris Canal Cross Road', 'Mahaunava', 'Colombo', 'Western province', '0112140001', 'b76ad8b2ed9b9c2f67202e16c76f06d2', '2023-11-29 18:30:00', 'e8769ec82094a92794e497cca36a3783', 0, 'verified', 1707677229000, 0, '');

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
(2, 101, '{\"days\":[1,2,3,4,5,6],\"dates\":[],\"start\":\"08:00\",\"end\":\"20:00\",\"duration\":\"05:00\",\"breaks\":[{\"start\":\"09:00\",\"end\":\"10:00\"}]}');

-- --------------------------------------------------------

--
-- Table structure for table `hospital_request`
--

CREATE TABLE `hospital_request` (
  `id` int(11) NOT NULL,
  `hospital_id` int(11) NOT NULL,
  `request` text NOT NULL,
  `total` int(11) NOT NULL,
  `priority` varchar(30) NOT NULL,
  `request_datetime` bigint(20) NOT NULL,
  `responsed_datetime` bigint(20) DEFAULT NULL,
  `admin_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `reference` varchar(30) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hospital_request`
--

INSERT INTO `hospital_request` (`id`, `hospital_id`, `request`, `total`, `priority`, `request_datetime`, `responsed_datetime`, `admin_id`, `message`, `reference`, `status`) VALUES
(3, 101, '{\"op\":\"200\",\"on\":\"1040\"}', 1240, 'normal', 1707361721000, 1707361721000, 1, '', 'DM8SHWWMVZ', 'accepted'),
(4, 101, '{\"ap\":\"200\",\"an\":\"1040\"}', 1240, 'urgent', 1707361798000, 1707719281000, 1, 'Insufficient blood storage', 'DMBZ3AYO9V', 'pending'),
(5, 101, '{\"op\":\"1040\",\"on\":\"2080\",\"ap\":\"1040\"}', 4160, 'normal', 1707363818000, 1707364070000, 1, '', 'DMRWZ3NIS0', 'cancelled');

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `id` int(11) NOT NULL,
  `reference` varchar(30) NOT NULL,
  `type` varchar(20) NOT NULL,
  `tran_bloods` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`tran_bloods`)),
  `tran_total` int(11) NOT NULL,
  `bloods` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`bloods`)),
  `total` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `create_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`id`, `reference`, `type`, `tran_bloods`, `tran_total`, `bloods`, `total`, `admin_id`, `create_time`) VALUES
(1, 'IVY641NOF', 'inflow', '{\"op\":\"20000\"}', 20000, '{\"op\":20000,\"on\":\"0\",\"ap\":\"0\",\"an\":\"0\",\"bp\":\"0\",\"bn\":\"0\",\"abp\":\"0\",\"abn\":\"0\"}', 20000, 1, '2024-02-13 04:54:26'),
(2, 'O1DGXCRZ4', 'outflow', '{\"op\":\"10000\"}', 10000, '{\"op\":10000,\"on\":\"0\",\"ap\":\"0\",\"an\":\"0\",\"bp\":\"0\",\"bn\":\"0\",\"abp\":\"0\",\"abn\":\"0\"}', 10000, 1, '2024-02-13 05:02:46');

-- --------------------------------------------------------

--
-- Table structure for table `inventory_desired`
--

CREATE TABLE `inventory_desired` (
  `id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `create_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `bloods` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`bloods`))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `inventory_desired`
--

INSERT INTO `inventory_desired` (`id`, `admin_id`, `create_time`, `bloods`) VALUES
(1, 1, '2024-02-13 04:01:05', '{\"ap\":\"3\",\"an\":\"2\",\"bp\":\"5\",\"bn\":\"16\",\"abp\":\"10\",\"abn\":\"13\",\"op\":\"15\",\"on\":\"18\"}'),
(2, 1, '2024-02-13 04:09:31', '{\"ap\":\"3\",\"an\":\"2\",\"bp\":\"5\",\"bn\":\"3\",\"abp\":\"10\",\"abn\":\"13\",\"op\":\"15\",\"on\":\"18\"}'),
(3, 1, '2024-02-13 05:38:23', '{\"ap\":\"\",\"an\":\"\",\"bp\":\"\",\"bn\":\"\",\"abp\":\"\",\"abn\":\"\",\"op\":\"10000\",\"on\":\"\"}');

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
(2, 'appointments available now at your favorite blood donation center ~ <b>Durdans Hospital</b>', 'BloodCare', 'uploads/hospital/profileimages/1701354726logo-small.jpg', 'donor/appointment/', 'lets check', 'info', '2024-01-08 15:41:13'),
(3, 'Bloodcamp editted.', 'Durdans Hospital', 'uploads/hospital/profileimages/1701354726logo-small.jpg', 'donor/camp/joined/', 'check camp', 'warning', '2024-01-14 14:18:18');

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
(2, 1005, 2, 'seen'),
(4, 1005, 3, 'deleted');

-- --------------------------------------------------------

--
-- Table structure for table `notification_hospital`
--

CREATE TABLE `notification_hospital` (
  `id` int(11) NOT NULL,
  `hospital_id` int(11) NOT NULL,
  `notification_id` int(11) NOT NULL,
  `status` varchar(20) NOT NULL
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
  ADD KEY `donor_donation_hospital_id` (`hospital_id`);

--
-- Indexes for table `hospital`
--
ALTER TABLE `hospital`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hospital_configure`
--
ALTER TABLE `hospital_configure`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hospital_request`
--
ALTER TABLE `hospital_request`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inventory_desired`
--
ALTER TABLE `inventory_desired`
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
-- Indexes for table `notification_hospital`
--
ALTER TABLE `notification_hospital`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notification_hospital_hospitalid_fk` (`hospital_id`),
  ADD KEY `notification_hospital_notificationid_fk` (`notification_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `appointmentslot`
--
ALTER TABLE `appointmentslot`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=736;

--
-- AUTO_INCREMENT for table `bloodcamp`
--
ALTER TABLE `bloodcamp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `bloodcamp_donor`
--
ALTER TABLE `bloodcamp_donor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `donor`
--
ALTER TABLE `donor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1009;

--
-- AUTO_INCREMENT for table `donor_appointment`
--
ALTER TABLE `donor_appointment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `donor_bloodtype`
--
ALTER TABLE `donor_bloodtype`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `donor_donation`
--
ALTER TABLE `donor_donation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `hospital`
--
ALTER TABLE `hospital`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT for table `hospital_configure`
--
ALTER TABLE `hospital_configure`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `hospital_request`
--
ALTER TABLE `hospital_request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `inventory_desired`
--
ALTER TABLE `inventory_desired`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `notification_donor`
--
ALTER TABLE `notification_donor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `notification_hospital`
--
ALTER TABLE `notification_hospital`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

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
-- Constraints for table `donor_donation`
--
ALTER TABLE `donor_donation`
  ADD CONSTRAINT `donor_donation_donor_id_fk` FOREIGN KEY (`donor_id`) REFERENCES `donor` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `donor_donation_hospital_id_fk` FOREIGN KEY (`hospital_id`) REFERENCES `hospital` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `notification_donor`
--
ALTER TABLE `notification_donor`
  ADD CONSTRAINT `notification_donor_donorid_fk` FOREIGN KEY (`donor_id`) REFERENCES `donor` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `notification_donor_notificationid_fk` FOREIGN KEY (`notification_id`) REFERENCES `notification` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `notification_hospital`
--
ALTER TABLE `notification_hospital`
  ADD CONSTRAINT `notification_hospital_hospitalid_fk` FOREIGN KEY (`hospital_id`) REFERENCES `hospital` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `notification_hospital_notificationid_fk` FOREIGN KEY (`notification_id`) REFERENCES `notification` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

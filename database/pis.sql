-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 02, 2021 at 01:59 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pis`
--

-- --------------------------------------------------------

--
-- Table structure for table `admit`
--

CREATE TABLE `admit` (
  `admitdischarge_id` int(200) NOT NULL,
  `admitdischarge` varchar(200) NOT NULL,
  `comment` varchar(200) NOT NULL,
  `admitdischarge_date` date NOT NULL,
  `w_id` int(200) NOT NULL,
  `bed_number` int(200) NOT NULL,
  `p_id` int(200) NOT NULL,
  `staff_id` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admit`
--

INSERT INTO `admit` (`admitdischarge_id`, `admitdischarge`, `comment`, `admitdischarge_date`, `w_id`, `bed_number`, `p_id`, `staff_id`) VALUES
(1, 'Admit', 'good ', '2021-04-24', 6, 0, 1, 19),
(2, 'Discharge', 'to checkup    ', '2021-01-30', 5, 0, 3, 0),
(3, 'Discharge', 'urgent case   ', '2021-01-30', 4, 0, 4, 0),
(4, 'Discharge', 'get reports ', '2021-01-30', 4, 0, 5, 0),
(5, 'Admit', 'scan', '2021-01-30', 5, 0, 6, 13),
(6, 'Admit', 'good', '2021-04-24', 2, 0, 1, 13),
(7, 'Admit', 'admit', '2021-04-24', 5, 0, 4, 13),
(8, 'Admit', 'admit', '2021-04-24', 4, 0, 3, 13),
(9, 'Discharge', 'good', '2021-04-24', 2, 0, 2, 0),
(10, 'Admit', 'dfef', '2021-04-24', 1, 0, 7, 13),
(11, 'Admit', 'good', '2021-04-24', 4, 0, 2, 0),
(12, 'Admit', 'good', '2021-04-24', 9, 0, 2, 13),
(13, 'Admit', 'good', '2021-04-24', 4, 0, 1, 13),
(14, 'Admit', 'For tests', '2021-04-24', 2, 0, 2, 13),
(15, 'Admit', 'for tests', '2021-05-01', 4, 0, 1, 19);

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `booking_id` int(200) NOT NULL,
  `p_id` int(200) NOT NULL,
  `booking_date` date NOT NULL,
  `approval_time` time NOT NULL,
  `doctor` varchar(200) NOT NULL,
  `approval` varchar(200) NOT NULL,
  `reason` varchar(200) NOT NULL,
  `staff_id` int(200) NOT NULL,
  `status` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`booking_id`, `p_id`, `booking_date`, `approval_time`, `doctor`, `approval`, `reason`, `staff_id`, `status`) VALUES
(1, 1, '2021-01-25', '05:31:00', 'Dr. Densil Indika', '1', 'cough', 0, 'ok'),
(2, 2, '2021-01-24', '11:20:00', 'Dr. Prabhath Weerasiri', '1', 'Appendicitis', 0, 'approved'),
(3, 3, '2021-01-25', '11:21:00', 'Dr. Amila Isuru', '1', 'Depression', 0, 'ok'),
(4, 1, '2021-02-02', '07:28:00', 'Dr. Ayeshmantha Peris', '1', 'Eye pain', 0, 'no'),
(5, 7, '2021-02-26', '05:19:00', 'Dr. Jayajeewa Sugathapala', '1', 'Depression', 0, 'ok'),
(6, 10, '2021-04-26', '08:27:00', 'Dr. Prabhath Weerasiri', '1', 'Stomachache', 0, 'no'),
(7, 10, '2021-04-26', '07:28:00', 'Dr. Npuna Ranaweera', '1', 'Eye injury', 0, 'ok'),
(8, 10, '2021-04-25', '04:56:00', 'Dr. Nishantha D. Gamage', '1', 'Neck pain', 0, 'ok'),
(9, 15, '2021-05-20', '08:27:00', 'Dr. Hiran Hewage', '1', 'dawd', 0, '0k'),
(10, 10, '2021-05-20', '00:00:00', 'Dr. Mihira Manamperi', '0', 'Neck Pain', 0, ''),
(11, 16, '2021-05-06', '00:00:00', 'Dr. Sampath Hemachandra', '0', 'Migrane', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `checkup`
--

CREATE TABLE `checkup` (
  `checkup_id` int(200) NOT NULL,
  `checkup_name` varchar(200) NOT NULL,
  `doctor_comment` varchar(500) NOT NULL,
  `nurse_comment` varchar(500) NOT NULL,
  `checkup_date` date NOT NULL,
  `diagnosis` varchar(200) NOT NULL,
  `p_id` int(200) NOT NULL,
  `staff_id` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `checkup`
--

INSERT INTO `checkup` (`checkup_id`, `checkup_name`, `doctor_comment`, `nurse_comment`, `checkup_date`, `diagnosis`, `p_id`, `staff_id`) VALUES
(1, 'PCR Test', 'Within two weeks', 'ok', '2021-04-25', '', 1, 13),
(3, 'Scan', 'Within two days', 'checkup done', '2021-05-01', '', 2, 13),
(4, 'Blood ', 'urgent', 'Done', '2021-01-30', '', 4, 13),
(5, 'tablets', 'ok', 'done', '2021-01-30', '', 5, 13),
(6, 'Eye checkup', 'within two weeks', 'checkup should be done', '2021-01-30', '', 6, 13),
(7, 'Blood Test', 'Within a day', 'ok', '2021-04-25', '', 3, 13),
(8, 'Blood Report', 'Within a day', '', '0000-00-00', '', 1, 19);

-- --------------------------------------------------------

--
-- Table structure for table `diagnosis`
--

CREATE TABLE `diagnosis` (
  `diagnosis_id` int(200) NOT NULL,
  `diagnosis` varchar(200) NOT NULL,
  `diagnosis_date` date NOT NULL,
  `p_id` int(200) NOT NULL,
  `staff_id` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `diagnosis`
--

INSERT INTO `diagnosis` (`diagnosis_id`, `diagnosis`, `diagnosis_date`, `p_id`, `staff_id`) VALUES
(1, 'Covid', '2021-01-30', 1, 13),
(3, 'Apendicits', '2021-01-30', 2, 13),
(4, 'Dengue fever', '2021-01-30', 4, 13),
(5, 'Cold', '2021-01-30', 5, 13),
(6, 'Eye pain', '2021-01-30', 6, 13),
(7, 'Migrane', '2021-02-01', 1, 13),
(9, 'Fever', '2021-04-24', 3, 13),
(11, 'Fever', '2021-05-01', 1, 19);

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `doc_id` int(200) NOT NULL,
  `doc_fname` varchar(200) NOT NULL,
  `doc_lname` varchar(200) NOT NULL,
  `contact_no` varchar(200) NOT NULL,
  `specialist` varchar(200) NOT NULL,
  `qualifications` varchar(200) NOT NULL,
  `doc_fees` int(200) NOT NULL,
  `available_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `file`
--

CREATE TABLE `file` (
  `file_id` int(200) NOT NULL,
  `file_name` varchar(200) NOT NULL,
  `file_size` int(200) NOT NULL,
  `p_id` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `file`
--

INSERT INTO `file` (`file_id`, `file_name`, `file_size`, `p_id`) VALUES
(5, 'IMG_20210131_0002.pdf', 211139, 4),
(6, 'IMG_20210131_0003.pdf', 671277, 2),
(7, 'IMG_20210131_0005.pdf', 481040, 1),
(9, 'IMG_20210131_0002.pdf', 211139, 1),
(10, 'medical report.pdf', 226850, 1),
(11, 'IMG_20210131_0005.pdf', 481040, 2),
(12, 'IMG_20210131_0004.pdf', 430299, 0),
(13, 'IMG_20210131_0004.pdf', 430299, 2);

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `item_id` int(200) NOT NULL,
  `item_name` varchar(200) NOT NULL,
  `price` int(200) NOT NULL,
  `quantity` int(200) NOT NULL,
  `staff_id` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`item_id`, `item_name`, `price`, `quantity`, `staff_id`) VALUES
(1, 'Stethoscope', 600, 10, 8),
(2, 'Wheel chair adult', 12650, 6, 8),
(3, 'Test tubes', 600, 50, 8),
(4, 'Scissors', 500, 50, 8),
(5, 'Microscope', 33000, 10, 8),
(6, 'Blood bank refrigerator', 250000, 2, 8),
(7, 'PH meter', 150000, 2, 8),
(8, 'ECG Monitor', 742, 2, 8),
(9, 'Cyrinjers ', 50, 200, 8),
(10, 'Glouse', 20, 10000, 0),
(11, 'Binocular microscope', 33000, 9, 8),
(12, 'Blood cell counter, Electrical', 500640, 2, 8),
(13, 'ECG Monitor', 74200, 3, 8),
(14, 'Face masks ', 20, 15000, 8);

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `p_id` int(200) NOT NULL,
  `fname` varchar(500) NOT NULL,
  `lname` varchar(500) NOT NULL,
  `birth_date` date NOT NULL,
  `age` int(200) NOT NULL,
  `id_number` varchar(300) NOT NULL,
  `address_line1` varchar(500) NOT NULL,
  `address_line2` varchar(500) NOT NULL,
  `contact_no` varchar(200) NOT NULL,
  `gender` varchar(200) NOT NULL,
  `civil_status` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `discharging_patient` varchar(50) NOT NULL,
  `staff_id` int(200) NOT NULL,
  `w_id` int(200) NOT NULL,
  `bed_number` int(200) NOT NULL,
  `date` date NOT NULL,
  `time` time(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`p_id`, `fname`, `lname`, `birth_date`, `age`, `id_number`, `address_line1`, `address_line2`, `contact_no`, `gender`, `civil_status`, `password`, `discharging_patient`, `staff_id`, `w_id`, `bed_number`, `date`, `time`) VALUES
(1, 'Maneesha', 'Karunanayake', '1988-02-17', 33, '881234567', 'Detagamuwa', 'Kataragama', '0707893456', 'female', 'married', '5c67279555894478a22a969cc19e40d5', 'Admit', 0, 6, 4, '2021-01-30', '10:47:00.000000'),
(2, 'Eranga', 'Weerakoon', '1991-12-22', 29, '918573267', 'Rohanapura', 'Tissamaharama', '0710407782', 'female', 'single', '09155826ed37a4a5bfcc412a547a9641', 'Admit', 0, 2, 4, '2021-04-24', '07:20:00.000000'),
(3, 'Kapila', 'Wijesinghe', '1986-11-20', 34, '867654321', 'Mayurapura', 'Hambantota', '0719435080', 'male', 'married', '439da46832b341f615bcf60d5204cba6', 'Discharge', 0, 5, 15, '2021-01-30', '11:00:00.000000'),
(4, 'Kusuma ', 'Nanayakkara', '1953-06-07', 68, '530123456', 'Madawelana', 'Tissamaharama', '0719432080', 'female', 'married', '', 'Discharge', 10, 4, 26, '2021-01-30', '11:05:00.000000'),
(5, 'Wasantha', 'Jayathilaka', '1948-08-03', 72, '489067345', 'Magama', 'Tissamaharama', '0716176336', 'male', 'married', '', 'Discharge', 10, 4, 3, '2021-01-30', '11:08:00.000000'),
(6, 'Amila', 'Kumaranayake', '1989-02-10', 31, '897678908', 'Weerawila', 'Debarawewa', '0708000787', 'male', 'unmarried', '', 'Admit', 10, 5, 12, '2021-04-25', '01:26:00.000000'),
(7, 'Chthra ', 'Nanayakkara', '1953-07-06', 68, '531234567', 'Medawelana', 'Tissamaharama', '0709433080', 'female', 'married', 'e4dcf6688f4da800329a653b571c8b3b', 'Admit', 0, 1, 0, '2021-02-01', '05:34:00.000000'),
(10, 'Asela', 'Muhandiram', '1969-04-09', 52, '691234567', 'Kahawaththa', 'Rathnapura', '0776458906', 'male', 'married', '38f65e07431c64970ccefc9c7fe46734', '', 0, 0, 0, '2021-04-24', '09:34:00.000000'),
(11, 'Sasanthi', 'Amarathunga', '1977-04-21', 44, '771234567', 'Nugegoda', 'Colombo', '0764433456', 'female', 'married', '', '', 11, 0, 0, '2021-04-24', '09:51:00.000000'),
(12, 'D.J.', 'Weerakoon', '1948-02-29', 72, '481234567', 'Rohaapura', 'Tissamaharama', '0715176336', 'male', 'married', '', '', 11, 0, 0, '2021-04-24', '07:24:00.000000'),
(13, 'Samanthi', 'Perera', '1975-05-07', 46, '759013339', 'Dikwella', 'Matara', '07767787900', 'female', 'married', '5bb2eab526642726b44b1c8b0dd325d9', '', 0, 0, 0, '2021-05-01', '07:07:00.000000'),
(14, 'ss', 'sss', '2021-05-19', 78, '956876543', 'vdfvd', 'vfdv', '0000000000', 'female', 'married', '6512bd43d9caa6e02c990b0a82652dca', '', 0, 0, 0, '2021-05-01', '07:11:00.000000'),
(15, 'ss', 'sss', '2021-05-11', 44, '111111', 'bgfb', 'gfg', '0000000000', 'male', 'single', '6512bd43d9caa6e02c990b0a82652dca', '', 0, 0, 0, '2021-05-01', '07:12:00.000000'),
(16, 'Sarangi', 'Widanage', '1991-05-20', 29, '912345678', 'Dikwella', 'Tissa', '0759080899', 'female', 'single', '3de4f3e3688c08e76088ef7a2f6deed0', '', 0, 0, 0, '2021-05-01', '08:18:00.000000'),
(17, 'efwf', 'fsdfsdf', '2021-04-27', 56, '691234567', 'tret', 'sfsd', '0759080899', 'female', 'married', '', '', 11, 0, 0, '2021-05-01', '08:25:00.000000');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `staff_id` int(200) NOT NULL,
  `fname` varchar(500) NOT NULL,
  `lname` varchar(500) NOT NULL,
  `user_type` varchar(200) NOT NULL,
  `user_name` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`staff_id`, `fname`, `lname`, `user_type`, `user_name`, `password`, `email`) VALUES
(3, 'Ridma', 'Shanaki', 'nurse', 'nurse', '0701aa317da5a004fbf6111545678a6c', 'ridmashanakii@gmail.com'),
(8, '', '', 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin@gmail.com'),
(11, 'Sithmi', 'Dilrangi', 'receptionist', 'receptionist', '0a9b3767c8b9b69cea129110e8daeda2', 'sithmidilrangi@gmail.com'),
(14, 'Kasuni', 'Dasanayaka', 'nurse', 'nurse', '0701aa317da5a004fbf6111545678a6c', 'kasunichamika@gmail.com'),
(15, 'Prabath', 'Weerasiri', 'doctor', 'doctor', '075b3fa369bcd30706dca2b8505da02e', 'prabathweerasiri12@gmail.com'),
(17, 'Sampath', 'Hemachandra', 'doctor', 'doctor', 'c19a9475b9074c31d6e071a9f4222fe6', 'sampathhemchandra@gmail.com'),
(19, 'Nipuna', 'Ranaweera', 'doctor', 'doctor', 'f2581891633ed15a6517a1bb2f3f5c28', 'nipunaranaweera@gmail.com'),
(20, 'Chinthaka ', 'Gunarathne', 'doctor', 'doctor', '2df2d2c644b3597b56eb297e24719936', 'chinthakagunarathne1@gmail.com'),
(21, 'Nishantha', 'Gamage', 'doctor', 'doctor', '81a177dc6b65a514e8af9667508c0887', 'nishanthadgamage2@gmail.com'),
(22, 'Hiran', 'Hewage', 'doctor', 'doctor', '834c9df7553233a30b3f645850037df7', 'hiranhewage@gmail.com'),
(23, 'Mihira', 'Manamperi', 'doctor', 'doctor', '1e436494ac1fccc54fa3260bc85d44b6', 'mihiramanamperi@gmail.com'),
(24, 'Malathi', 'Adhikari', 'doctor', 'doctor', 'c44ea40ef37d38bced4bab9197565080', 'malathiliyanage@gmail.com'),
(25, 'Uditha', 'Hewavitharana', 'doctor', 'doctor', '5520d0da75a8557c30962c18bdff67a4', 'udithaihewavitharana@gmail.com'),
(26, 'Pradeep', 'Siriwardhane', 'doctor', 'doctor', 'febc8f8ac083f5fc27e032c81e7b536a', 'pradepsiriwardhane@gmail.com'),
(27, 'Rangani', 'Shalika', 'nurse', 'nurse', '78aa0dacdb9dd1a35b091c02fd104f08', 'ranganishalika@gmail.com'),
(28, 'Priyani', 'Sandamali', 'nurse', 'nurse', 'fcb83c5bf0b522d0ab67768676271d4d', 'priyanisandamali@gmail.com'),
(29, 'Malmi', 'Hettiarachchi', 'nurse', 'nurse', '67a71fede3cb269009fd896734a24309', 'malmihettiarachchi@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `ward`
--

CREATE TABLE `ward` (
  `w_id` int(200) NOT NULL,
  `p_id` int(200) NOT NULL,
  `staff_id` int(200) NOT NULL,
  `bed_number` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admit`
--
ALTER TABLE `admit`
  ADD PRIMARY KEY (`admitdischarge_id`),
  ADD KEY `p_id` (`p_id`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`booking_id`),
  ADD KEY `p_id` (`p_id`);

--
-- Indexes for table `checkup`
--
ALTER TABLE `checkup`
  ADD PRIMARY KEY (`checkup_id`),
  ADD KEY `p_id` (`p_id`);

--
-- Indexes for table `diagnosis`
--
ALTER TABLE `diagnosis`
  ADD PRIMARY KEY (`diagnosis_id`),
  ADD KEY `p_id` (`p_id`);

--
-- Indexes for table `file`
--
ALTER TABLE `file`
  ADD PRIMARY KEY (`file_id`),
  ADD KEY `p_id` (`p_id`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`item_id`),
  ADD KEY `staff_id` (`staff_id`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`staff_id`);

--
-- Indexes for table `ward`
--
ALTER TABLE `ward`
  ADD PRIMARY KEY (`w_id`),
  ADD KEY `p_id` (`p_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admit`
--
ALTER TABLE `admit`
  MODIFY `admitdischarge_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `booking_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `checkup`
--
ALTER TABLE `checkup`
  MODIFY `checkup_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `diagnosis`
--
ALTER TABLE `diagnosis`
  MODIFY `diagnosis_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `file`
--
ALTER TABLE `file`
  MODIFY `file_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `item_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `p_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `staff_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `ward`
--
ALTER TABLE `ward`
  MODIFY `w_id` int(200) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

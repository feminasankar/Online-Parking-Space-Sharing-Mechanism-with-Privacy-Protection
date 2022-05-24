-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 23, 2022 at 01:00 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `parking`
--

-- --------------------------------------------------------

--
-- Table structure for table `add_property`
--

CREATE TABLE `add_property` (
  `property_id` int(10) NOT NULL,
  `city` varchar(100) NOT NULL,
  `zone` varchar(50) NOT NULL,
  `latitude` float NOT NULL,
  `longitude` float NOT NULL,
  `contact_no` bigint(10) NOT NULL,
  `slot` int(11) NOT NULL,
  `booked` varchar(50) NOT NULL,
  `owner_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `add_property`
--

INSERT INTO `add_property` (`property_id`, `city`, `zone`, `latitude`, `longitude`, `contact_no`, `slot`, `booked`, `owner_id`) VALUES
(123, 'chennai', 'Porur', 12.9863, 80.2432, 9860462146, 1, 'No', 1),
(125, 'chennai', 'guindy', 12.9863, 80.2432, 7744885599, 2, 'No', 1),
(126, 'chennai', 'nungampakkam', 12.9863, 80.2432, 9874563210, 3, 'No', 2),
(136, 'chennai', 'tharamani', 12.9863, 80.2432, 9966887744, 0, '6', 1),
(137, 'chennai', 'solinganallur', 12.9863, 80.2432, 7410852096, 0, '10', 5),
(138, 'chennai', 'T-nagar', 12.9863, 80.2432, 9966887744, 0, '40', 6),
(139, 'chennai', 'kundarthur', 12.9863, 80.2432, 9966887744, 0, '41', 7),
(140, 'Chennai', 'avadi', 13.1067, 80.097, 8668170544, 0, '3', 9),
(141, 'Chennai', 'Poonamallee', 13.0473, 80.0945, 8668170544, 0, '5', 9),
(143, 'Chennai', 'T.Nagar', 13.0418, 80.2341, 8668170544, 0, '4', 9),
(144, 'Chennai', 'Purasawalkam', 13.0902, 80.2543, 8668170544, 0, '5', 9);

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `email` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`email`, `password`) VALUES
('admin@gmail.com', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `booking_id` int(20) NOT NULL,
  `property-id` int(20) NOT NULL,
  `user_id` int(20) NOT NULL,
  `fdate` date NOT NULL,
  `tdate` date NOT NULL,
  `stime` time NOT NULL,
  `etime` int(24) NOT NULL,
  `payment` text NOT NULL,
  `slot_d` int(11) NOT NULL,
  `owner_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`booking_id`, `property-id`, `user_id`, `fdate`, `tdate`, `stime`, `etime`, `payment`, `slot_d`, `owner_id`) VALUES
(89, 136, 18, '2021-03-26', '2021-03-26', '11:00:00', 20, 'completed', 1, 0),
(90, 136, 18, '2021-03-26', '2021-03-26', '11:00:00', 20, 'completed', 2, 1),
(91, 136, 18, '2022-04-08', '2022-04-08', '17:23:00', 40, 'completed', 3, 1),
(92, 140, 21, '2022-05-24', '2022-05-24', '06:00:00', 60, 'completed', 5, 9),
(93, 144, 21, '2021-05-23', '2021-05-23', '04:30:00', 40, 'completed', 17, 9);

-- --------------------------------------------------------

--
-- Table structure for table `owner`
--

CREATE TABLE `owner` (
  `owner_id` int(10) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `phone_no` bigint(10) NOT NULL,
  `address` varchar(200) NOT NULL,
  `id_photo` varchar(1000) NOT NULL,
  `approvel` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `owner`
--

INSERT INTO `owner` (`owner_id`, `full_name`, `email`, `password`, `phone_no`, `address`, `id_photo`, `approvel`) VALUES
(1, 'Nikesh ', 'nikesh3230@gmail.com', '12345', 9596939874, 'Kirtipur-3', 'owner-photo/nikesh.png', 'Yes'),
(2, 'yyy', 'yyy@gmail.com', '123456', 9874563210, 'kpks', 'owner-photo/img.jpg', 'Yes'),
(5, 'anbu', 'anbu@gmail.com', 'qwe', 7410852096, '251,anna nagar west', 'owner-photo/use.png', 'Yes'),
(6, 'MATHI', 'MATHI@GMAIL.COM', '123456', 8855774411, 'USMAN ROAD T NAGAR', 'owner-photo/avatar.png', 'Yes'),
(7, 'xxx', 'xxxx@gmail.com', 'qwer', 7788994455, 'kpks nagar', 'owner-photo/02.png', 'Yes'),
(8, 'sathis', 'sathis@gmail.com', '1233', 7410852096, 'USMAN ROAD T NAGAR', 'owner-photo/fp.jpg', 'no'),
(9, 'Femina.S', 'feminasankar2001@gmail.com', '@Demo12', 7894563723, 'No.20, 2nd Cross Street, Venugopal Nagar, Thirumullaivoil, Chennai-600062', 'owner-photo/IMG_20211217_105520.jpg', 'Yes'),
(10, 'kirthika', 'kirthi2607@gmail.com', '@Demo12', 9840875091, 'Kundrathur,chennai-600125', 'owner-photo/IMG_20210423_235113.jpg', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `property_photo`
--

CREATE TABLE `property_photo` (
  `property_photo_id` int(12) NOT NULL,
  `p_photo` varchar(500) NOT NULL,
  `property_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `property_photo`
--

INSERT INTO `property_photo` (`property_photo_id`, `p_photo`, `property_id`) VALUES
(24, 'product-photo/img1.jpg', 123),
(25, 'product-photo/img3.jpg', 125),
(26, 'product-photo/img.jpg', 126),
(36, 'product-photo/logo1.jpg', 136),
(37, 'product-photo/home.jpg', 137),
(38, 'product-photo/home1.jpg', 138),
(39, 'product-photo/fp.jpg', 139),
(40, 'product-photo/img.jpg', 140),
(41, 'product-photo/IMG_20211217_105520.jpg', 141),
(42, 'product-photo/logo2.png', 143),
(43, 'product-photo/purasawalkam.jpg', 144);

-- --------------------------------------------------------

--
-- Table structure for table `slot`
--

CREATE TABLE `slot` (
  `slot_d` int(50) NOT NULL,
  `property_id` int(11) NOT NULL,
  `available` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `slot`
--

INSERT INTO `slot` (`slot_d`, `property_id`, `available`) VALUES
(1, 136, 'no'),
(2, 136, 'no'),
(3, 136, 'no'),
(4, 136, 'yes'),
(5, 140, 'no'),
(6, 140, 'yes'),
(7, 140, 'yes'),
(8, 141, 'yes'),
(9, 141, 'yes'),
(10, 141, 'yes'),
(11, 141, 'yes'),
(12, 141, 'yes'),
(13, 143, 'yes'),
(14, 143, 'yes'),
(15, 143, 'yes'),
(16, 143, 'yes'),
(17, 144, 'no'),
(18, 144, 'yes'),
(19, 144, 'yes'),
(20, 144, 'yes'),
(21, 144, 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(10) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `vehicle_m` varchar(100) NOT NULL,
  `vehicle_n` varchar(100) NOT NULL,
  `id_type` varchar(100) NOT NULL,
  `id_photo` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `full_name`, `email`, `password`, `vehicle_m`, `vehicle_n`, `id_type`, `id_photo`) VALUES
(17, 'Nikesh Tiwari', 'nikeshtiwari3230@gmail.com', '1234', 'shift', 'TN09 AX 4565', 'Citizenship', 'tenant-photo/nikesh.png'),
(18, 'saini', 'saini@gmail.com', '12345', 'shift', 'TN 06 AX4565', 'Driving Licence', 'tenant-photo/img1.jpg'),
(19, 'ashik', 'ashik@gmail.com', 'QWE2', 'KTM', 'TN 06 AX4565', 'Driving Licence', 'tenant-photo/own.png'),
(20, 'gowthaman', 'gowthaman@gmail.com', '1234', 'shift', 'TN 06 AX4565', 'Driving Licence', 'tenant-photo/STR.jpg'),
(21, 'Femina.S', 'feminasankar2001@gmail.com', '@Demo12', 'swift', 'TN 13 AF 7458', 'Driving Licence', 'tenant-photo/FEMINA_PANCARD.jpeg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `add_property`
--
ALTER TABLE `add_property`
  ADD PRIMARY KEY (`property_id`),
  ADD KEY `owner_id` (`owner_id`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`booking_id`);

--
-- Indexes for table `owner`
--
ALTER TABLE `owner`
  ADD PRIMARY KEY (`owner_id`);

--
-- Indexes for table `property_photo`
--
ALTER TABLE `property_photo`
  ADD PRIMARY KEY (`property_photo_id`),
  ADD KEY `property_id` (`property_id`);

--
-- Indexes for table `slot`
--
ALTER TABLE `slot`
  ADD PRIMARY KEY (`slot_d`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `add_property`
--
ALTER TABLE `add_property`
  MODIFY `property_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=145;

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `booking_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT for table `owner`
--
ALTER TABLE `owner`
  MODIFY `owner_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `property_photo`
--
ALTER TABLE `property_photo`
  MODIFY `property_photo_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `slot`
--
ALTER TABLE `slot`
  MODIFY `slot_d` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `add_property`
--
ALTER TABLE `add_property`
  ADD CONSTRAINT `add_property_ibfk_1` FOREIGN KEY (`owner_id`) REFERENCES `owner` (`owner_id`);

--
-- Constraints for table `property_photo`
--
ALTER TABLE `property_photo`
  ADD CONSTRAINT `property_photo_ibfk_1` FOREIGN KEY (`property_id`) REFERENCES `add_property` (`property_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

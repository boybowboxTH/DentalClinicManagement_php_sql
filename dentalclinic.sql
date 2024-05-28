-- phpMyAdmin SQL Dump
-- version 5.2.2-dev+20240309.aaf7188717
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 22, 2024 at 05:55 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dentalclinic`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminmed`
--

CREATE TABLE `adminmed` (
  `ser` int(3) NOT NULL,
  `medcode` tinyint(5) NOT NULL,
  `medname` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unit` int(10) NOT NULL,
  `medtype` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `appointement`
--

CREATE TABLE `appointement` (
  `ser` tinyint(4) NOT NULL,
  `userid` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dentist` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `regdate` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `regtime` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `d` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `appointement`
--

INSERT INTO `appointement` (`ser`, `userid`, `username`, `code`, `dentist`, `regdate`, `regtime`, `status`, `d`) VALUES
(5, '', '30', '', '2-Dileep Shivani', '30 November,2015', '2 PM', 'Confirmed', 2),
(6, '', '0', '', '2-Dileep Shivani', '19 December,2015', '12 PM', 'Cancelled', 2),
(8, '', '0', '', '2-Dileep Shivani', '21 December,2015', '1 PM', 'Not Confirmed', 2),
(9, '', '0', '', '2-Dileep Shivani', '1 December,2015', '3 PM', 'Not Confirmed', 2),
(16, '', '7', '', '5-shweta narang', '24 December,2015', '9 AM', 'Not Confirmed', 5),
(20, '', '7', '', '2-Dileep Shivani', '30 November,2015', '11 AM', 'Not Confirmed', 2),
(21, '', '7', '', '1-Sumit Narang', '30 November,2015', '4 pm', 'Not Confirmed', 1),
(22, '', '7', '', '7-dentist2', '13 December,2015', '3 PM', 'Not Confirmed', 7),
(23, '', '7', '', '4-suyash', '14 December,2015', '3 PM', 'Confirmed', 0),
(27, '', '34', '', '9-dentist4', '2024-05-20', '7 PM', 'Not Confirmed', 0),
(28, '', '33', 'Rs 100-', '1-พญ.สมศรี มีสุข', '2024-05-20', '10 AM', 'Not Confirmed', 0),
(29, '', '33', 'Rs 100-', '1-พญ.สมศรี มีสุข', '2024-05-13', '9 AM', 'Not Confirmed', 0),
(30, '', '33', 'Rs 420-', '6-พญ.บาบี้ ศรีสุข', '2024-05-07', '9 AM', 'Not Confirmed', 0),
(32, '', '33', 'Rs 100-ถอนฟัน', '2-นพ.สัก ที่หลัง', '2024-05-05', '9 AM', 'Not Confirmed', 0),
(33, '', '33', 'Rs 100-ถอนฟัน', '2-นพ.สัก ที่หลัง', '2024-05-20', '9 AM', 'ยืนยัน', 0),
(41, '33', 'bwx', 'Rs 250-ดัดฟัน', '2-นพ.สัก ที่หลัง', '2024-05-20', '9 AM', 'ยังไม่ได้ยืนยัน', 0),
(42, '33', 'bwx', 'Rs 100-ถอนฟัน', '1-พญ.สมศรี มีสุข', '2024-05-25', '9 AM', 'ยังไม่ได้ยืนยัน', 0),
(43, '33', 'bwx', 'Rs 420-ถอนฟันคุด', '6-พญ.บาบี้ ศรีสุข', '2024-05-05', '6 PM', 'ยังไม่ได้ยืนยัน', 0),
(44, '', 'dileep', 'Rs 100-ถอนฟัน', '1-พญ.สมศรี มีสุข', '2024-05-05', '9 AM', 'Not Confirmed', 0),
(45, '35', 'sumit narang', 'Rs 112-ขูดหินปูน', '1-พญ.สมศรี มีสุข', '2024-05-20', '9 AM', 'ยืนยัน', 0),
(46, '35', 'ศุภณัฐ', 'Rs 112-ขูดหินปูน', '2-นพ.สัก ที่หลัง', '2024-05-12', '', 'ยังไม่ได้ยืนยัน', 0),
(48, '43', '?????? ??????', 'Rs 100-ถอนฟัน', '1-พญ.สมศรี มีสุข', '2024-05-20', '9 AM', 'ยังไม่ได้ยืนยัน', 0),
(49, '43', '?????? ??????', 'Rs 112-ขูดหินปูน', '4-พญ.สากาโมโต สังข์ทอง', '2024-05-06', '9 AM', 'ยังไม่ได้ยืนยัน', 0),
(50, '43', 'ศุภณัฐ', 'Rs 100-ถอนฟัน', '1-พญ.สมศรี มีสุข', '2024-05-05', '1 PM', 'ยังไม่ได้ยืนยัน', 0),
(51, '35', 'ศุภณัฐ', 'Rs 420-ถอนฟันคุด', '1-พญ.สมศรี มีสุข', '2024-05-20', '9 AM', 'ยืนยัน', 0),
(52, '35', 'dileep', 'Rs 100-ถอนฟัน', '1-พญ.สมศรี มีสุข', '2024-05-05', '9 AM', 'ยืนยัน', 0),
(53, '45', 'เกษมสุข', 'Rs 420-ถอนฟันคุด', '2-นพ.สัก ที่หลัง', '2024-05-23', '12 PM', 'ยืนยัน', 0),
(54, '35', 'sumit narang', 'Rs 100-ถอนฟัน', '1-พญ.สมศรี มีสุข', '', '9 AM', 'ยืนยัน', 0),
(55, '35', 'sumit narang', 'Rs 100-ถอนฟัน', '1-พญ.สมศรี มีสุข', '', '9 AM', 'ยืนยัน', 0);

-- --------------------------------------------------------

--
-- Table structure for table `clinic`
--

CREATE TABLE `clinic` (
  `cid` tinyint(1) NOT NULL,
  `cname` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `openhr` varchar(6) COLLATE utf8mb4_unicode_ci NOT NULL,
  `closehr` varchar(6) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rooms` tinyint(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `clinic`
--

INSERT INTO `clinic` (`cid`, `cname`, `location`, `openhr`, `closehr`, `rooms`) VALUES
(1, 'สามพราน', '79/22, อำเภอสามพราน นครปฐม 73110', '9 โมง', '1 ทุ่ม', 1);

-- --------------------------------------------------------

--
-- Table structure for table `dentalcode`
--

CREATE TABLE `dentalcode` (
  `id` int(3) NOT NULL,
  `code` varchar(7) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unitcost` smallint(5) NOT NULL,
  `description` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dentalcode`
--

INSERT INTO `dentalcode` (`id`, `code`, `unitcost`, `description`) VALUES
(1, 'Rs 100', 900, 'ถอนฟัน'),
(2, 'Rs 112', 800, 'ขูดหินปูน'),
(3, 'Rs 250', 23000, 'ดัดฟัน'),
(6, 'Rs 222', 32000, 'ทำรากฟันเทียม'),
(7, 'Rs 420', 1200, 'ถอนฟันคุด');

-- --------------------------------------------------------

--
-- Table structure for table `dentist`
--

CREATE TABLE `dentist` (
  `did` smallint(6) NOT NULL,
  `name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `age` tinyint(3) NOT NULL,
  `sex` char(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `dtype` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `registration_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dentist`
--

INSERT INTO `dentist` (`did`, `name`, `age`, `sex`, `phone`, `email`, `address`, `dtype`, `registration_date`) VALUES
(1, 'พญ.สมศรี มีสุข', 42, 'F', '811234567', 'somsri_@gmail.com', '101/20 บางหว้า บางเเค', 'พนักงานประจำ', '2024-07-16 13:56:20'),
(2, 'นพ.สัก ที่หลัง', 33, 'm', '1111111111', 'dileep@gmail.com', '101/20 บางหว้า บางเเค\r\n', 'พนักงานประจำ', '2024-07-16 13:56:20'),
(4, 'พญ.สากาโมโต สังข์ทอง', 35, 'm', '9035396702', 'suyash@gmail.com', '101/20 บางหว้า บางเเค\r\n', 'พนักงานประจำ', '2024-07-16 13:56:20'),
(6, 'พญ.บาบี้ ศรีสุข', 30, 'f', '0833652255', 'dentist00@gmail.com', '101/20 บางหว้า บางเเค', 'พนักงานประจำ', '2024-07-16 13:56:20');

-- --------------------------------------------------------

--
-- Table structure for table `medrecord`
--

CREATE TABLE `medrecord` (
  `id` int(10) NOT NULL,
  `userid` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dentist` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `regdate` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `regtime` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cname` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `medname` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `results` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `medrecord`
--

INSERT INTO `medrecord` (`id`, `userid`, `username`, `code`, `dentist`, `regdate`, `regtime`, `cname`, `medname`, `results`, `price`) VALUES
(1, '35', 'ศุภณัฐ', 'Rs 100-ถอนฟัน', '1-พญ.สมศรี มีสุข', '2024-05-20', '', 'สามพราน', '', '', 100),
(2, '35', 'ศุภณัฐ', 'Rs 100-ถอนฟัน', '1-พญ.สมศรี มีสุข', '2024-05-20', '', 'สามพราน', 'พารา', 'ไม่ชอบ', 100),
(3, '35', 'dileep', 'Rs 100-ถอนฟัน', '1-พญ.สมศรี มีสุข', '2024-05-20', '', 'สามพราน', 'พารา', 'fdfdfdfddfdfd', 120),
(5, '35', 'SUPPANUT', 'Rs 250-ดัดฟัน', '2-นพ.สัก ที่หลัง', '2024-05-05', '10 AM', 'สามพราน', 'พารา', 'dfdfdfddfddf', 12000),
(6, '35', 'ศุภณัฐ', 'Rs 100-ถอนฟัน', '1-พญ.สมศรี มีสุข', '2024-05-18', '3 PM', 'สามพราน', 'พารา', 'โง่', 100),
(7, '35', 'ศุภณัฐ', 'Rs 420-ถอนฟันคุด', '2-นพ.สัก ที่หลัง', '2024-05-20', '9 AM', 'สามพราน', 'พารา', 'ำดก', 100),
(8, '35', 'ศุภณัฐ', 'Rs 112-ขูดหินปูน', '2-นพ.สัก ที่หลัง', '2024-05-21', '4 PM', 'สามพราน', '', '4545', 100);

-- --------------------------------------------------------

--
-- Table structure for table `signup`
--

CREATE TABLE `signup` (
  `userid` bigint(5) NOT NULL,
  `user_level` tinyint(1) NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `age` tinyint(3) NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `registration_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `signup`
--

INSERT INTO `signup` (`userid`, `user_level`, `name`, `phone`, `age`, `address`, `email`, `password`, `registration_date`) VALUES
(6, 0, 'sumit narang', '9035396702', 21, 'mysore road,bangalore-56059', 'sumitnarang100@gmail.com', 'sum', '2015-11-13 13:00:24'),
(7, 0, 'shreyans N', '8983792929', 23, 'bangalore', 'shreyans@gmail.com', 'shreyans', '2015-11-14 09:03:02'),
(8, 0, 'saurav', '8875431907', 27, 'New delhi', 'saurav@gmail.com', 'saurav', '2015-11-14 11:58:33'),
(9, 0, 'ganesh', '7689543210', 52, 'nehru place,kota', 'ganesh@gmail.com', 'ganesh', '2015-11-14 11:59:57'),
(10, 0, 'manju', '8675431907', 44, 'patna', 'manju@gmail.com', 'manju', '2015-11-14 12:00:53'),
(11, 0, 'supreeth', '8965320054', 34, 'rr nagar,bangalore', 'supreet@gmail.com', 'supreeth', '2015-11-14 12:02:03'),
(12, 0, 'amith', '7654565890', 44, 'magestic,bangalore', 'amith@gmail.com', 'amith', '2015-11-14 12:03:24'),
(13, 0, 'suraj', '9812311212', 20, 'hebbal,bangalore', 'suraj@gmail.com', 'suraj', '2015-11-14 12:04:28'),
(19, 0, 'asas', '9999999999', 45, 'gandhinagar', 'a@gmail.com', '12', '2015-11-30 13:05:01'),
(29, 0, 'ss', '9035396702', 76, 'ff', 'sumitnarang76@gmail.com', 'k', '2016-11-09 12:44:55'),
(30, 0, 'ss', '9035396702', 23, 'ss', 'sumitnarang100@gmail.com', 'd', '2016-11-09 12:48:00'),
(33, 0, 'bwx', '0811942322', 20, '99', 'admin@gmail.com', 'admin', '2024-05-17 17:20:08'),
(35, 1, 'ศุภณัฐ', '0811255222', 23, 'ตลาด', 'admin@gmail.com', '1', '2024-05-19 16:05:20'),
(36, 0, 'bwx', '0811942322', 1, '1', 'admi1n@gmail.com', '1', '2024-05-19 17:19:59'),
(37, 0, 'bwxdd', '0811942322', 23, '99', 'adminss@gmail.com', '000', '2024-05-21 00:07:02'),
(38, 0, 'SUPPANUT', '0811942322', 23, '99', 'admlklin@gmail.com', '123', '2024-05-21 00:09:35'),
(39, 0, 'bwx', '0811942322', 23, '1', 'boyx@gmail.com', '123', '2024-05-21 00:12:53'),
(43, 0, 'ศุภณัฐ', '0811942322', 46, '99', 'admin@gmail.com', '000', '2024-05-22 15:48:41'),
(45, 0, 'เกษมสุข', '0811265222', 20, 'ตลาด', 'admin@gmail.com', '00000', '2024-05-22 22:44:52'),
(46, 0, 'ศุภณัฐ', '0811942322', 23, '99', 'admin@gmail.com', '12345', '2024-05-22 22:51:15');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `sid` smallint(3) NOT NULL,
  `name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `age` tinyint(3) NOT NULL,
  `sex` char(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `registration_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`sid`, `name`, `age`, `sex`, `phone`, `email`, `address`, `registration_date`) VALUES
(1, 'สมชาย ทองสุข', 35, 'm', '811012000', 'somchaieiei@gmail.com', '101 คลองถม อ.ประตูน้ำ จ.ปทุมธานี', '2015-11-14 00:22:16');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adminmed`
--
ALTER TABLE `adminmed`
  ADD PRIMARY KEY (`ser`);

--
-- Indexes for table `appointement`
--
ALTER TABLE `appointement`
  ADD PRIMARY KEY (`ser`);

--
-- Indexes for table `clinic`
--
ALTER TABLE `clinic`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `dentalcode`
--
ALTER TABLE `dentalcode`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dentist`
--
ALTER TABLE `dentist`
  ADD PRIMARY KEY (`did`);

--
-- Indexes for table `medrecord`
--
ALTER TABLE `medrecord`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `signup`
--
ALTER TABLE `signup`
  ADD PRIMARY KEY (`userid`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`sid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adminmed`
--
ALTER TABLE `adminmed`
  MODIFY `ser` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `appointement`
--
ALTER TABLE `appointement`
  MODIFY `ser` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `clinic`
--
ALTER TABLE `clinic`
  MODIFY `cid` tinyint(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `dentalcode`
--
ALTER TABLE `dentalcode`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `dentist`
--
ALTER TABLE `dentist`
  MODIFY `did` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `medrecord`
--
ALTER TABLE `medrecord`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `signup`
--
ALTER TABLE `signup`
  MODIFY `userid` bigint(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `sid` smallint(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

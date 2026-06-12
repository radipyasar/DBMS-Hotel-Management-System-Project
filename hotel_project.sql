-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 12, 2026 at 08:04 PM
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
-- Database: `hotel_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `booking_id` int(11) NOT NULL,
  `guest_id` int(11) DEFAULT NULL,
  `room_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`booking_id`, `guest_id`, `room_id`) VALUES
(8, 5, 2),
(13, 8, 1),
(26, 4, 12),
(27, 1, 7);

-- --------------------------------------------------------

--
-- Table structure for table `guest`
--

CREATE TABLE `guest` (
  `guest_id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `guest`
--

INSERT INTO `guest` (`guest_id`, `name`, `phone`, `email`) VALUES
(1, 'Radip', '01770189234', 'radipyasar521@gmail.com'),
(4, 'Sunny', '01710159937', 'sunny12@gmail.com'),
(5, 'Jack', '01234567898', 'jack@gmail.com'),
(6, 'Farhan', '01123434111', 'farhan67@gmail.com'),
(7, 'Zara', '01112222333', 'zara@gmail.com'),
(8, 'Mason', '01345555676', 'mason23@gmail.com'),
(9, 'Asif', '01323222121', 'asif@gmail.com'),
(10, 'Asima', '01456655343', 'asima@gmail.com'),
(11, 'Lamine', '01234556777', 'lamine304@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_id` int(11) NOT NULL,
  `booking_id` int(11) DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT NULL,
  `payment_method` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`payment_id`, `booking_id`, `amount`, `payment_method`) VALUES
(8, 8, 10000.00, 'Master'),
(13, 13, 10000.00, 'Visa'),
(26, 26, 25000.00, 'Visa'),
(27, 27, 18000.00, 'Master');

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `room_id` int(11) NOT NULL,
  `room_number` varchar(10) DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`room_id`, `room_number`, `type`, `price`) VALUES
(1, '101', 'Standard', 10000.00),
(2, '102', 'Standard', 10000.00),
(3, '103', 'Deluxe', 18000.00),
(4, '104', 'Suite', 25000.00),
(5, '201', 'Standard', 10000.00),
(6, '202', 'Standard', 10000.00),
(7, '203', 'Deluxe', 18000.00),
(8, '204', 'Suite', 25000.00),
(9, '301', 'Standard', 10000.00),
(10, '302', 'Standard', 10000.00),
(11, '303', 'Deluxe', 18000.00),
(12, '304', 'Suite', 25000.00);

-- --------------------------------------------------------

--
-- Table structure for table `roomstatus`
--

CREATE TABLE `roomstatus` (
  `status_id` int(11) NOT NULL,
  `room_id` int(11) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `roomstatus`
--

INSERT INTO `roomstatus` (`status_id`, `room_id`, `status`) VALUES
(1, 1, 'Unavailable'),
(2, 2, 'Unavailable'),
(3, 3, 'Available'),
(4, 4, 'Available'),
(5, 5, 'Available'),
(6, 6, 'Available'),
(7, 7, 'Unavailable'),
(8, 8, 'Available'),
(9, 9, 'Available'),
(10, 10, 'Available'),
(11, 11, 'Available'),
(12, 12, 'Unavailable');

-- --------------------------------------------------------

--
-- Table structure for table `room_review`
--

CREATE TABLE `room_review` (
  `review_id` int(11) NOT NULL,
  `guest_id` int(11) DEFAULT NULL,
  `room_id` int(11) DEFAULT NULL,
  `rating` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `room_review`
--

INSERT INTO `room_review` (`review_id`, `guest_id`, `room_id`, `rating`) VALUES
(1, 1, 1, 5),
(2, 1, 1, 1),
(3, 4, 2, 10),
(4, 1, 1, 10),
(5, 6, 3, 10),
(6, 7, 1, 10),
(7, 8, 1, 1),
(8, 8, 3, 5),
(9, 8, 3, 10),
(10, 1, 5, 1),
(11, 1, 4, 10),
(12, 1, 6, 5),
(13, 1, 6, 10),
(14, 1, 7, 5),
(15, 8, 8, 10),
(16, 8, 11, 10),
(17, 8, 9, 5),
(18, 1, 11, 1),
(19, 1, 10, 1),
(20, 8, 12, 10),
(21, 1, 10, 5);

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `service_id` int(11) NOT NULL,
  `service_name` varchar(100) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`service_id`, `service_name`, `price`) VALUES
(1, 'Spa', 1000.00),
(2, 'Sauna', 1500.00),
(3, 'Private Dining', 4000.00),
(4, 'Arcade', 2000.00),
(5, 'Buffet', 3000.00);

-- --------------------------------------------------------

--
-- Table structure for table `service_booking`
--

CREATE TABLE `service_booking` (
  `s_booking_id` int(11) NOT NULL,
  `guest_id` int(11) DEFAULT NULL,
  `service_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `service_booking`
--

INSERT INTO `service_booking` (`s_booking_id`, `guest_id`, `service_id`) VALUES
(18, 1, 1),
(9, 4, 4),
(15, 5, 1),
(20, 5, 2);

-- --------------------------------------------------------

--
-- Table structure for table `service_payment`
--

CREATE TABLE `service_payment` (
  `s_payment_id` int(11) NOT NULL,
  `s_booking_id` int(11) DEFAULT NULL,
  `method` varchar(50) DEFAULT NULL,
  `s_amount` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `service_payment`
--

INSERT INTO `service_payment` (`s_payment_id`, `s_booking_id`, `method`, `s_amount`) VALUES
(5, 9, 'Visa', 2000.00),
(7, 15, 'Visa', 1000.00),
(8, 18, 'Visa', 1000.00),
(9, 20, 'Master', 1500.00);

-- --------------------------------------------------------

--
-- Table structure for table `service_review`
--

CREATE TABLE `service_review` (
  `review_id` int(11) NOT NULL,
  `guest_id` int(11) DEFAULT NULL,
  `service_id` int(11) DEFAULT NULL,
  `rating` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `service_review`
--

INSERT INTO `service_review` (`review_id`, `guest_id`, `service_id`, `rating`) VALUES
(1, 1, 2, 10),
(2, 6, 4, 10),
(3, 7, 1, 10),
(4, 1, 3, 5),
(5, 1, 5, 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`booking_id`),
  ADD KEY `guest_id` (`guest_id`),
  ADD KEY `room_id` (`room_id`);

--
-- Indexes for table `guest`
--
ALTER TABLE `guest`
  ADD PRIMARY KEY (`guest_id`),
  ADD UNIQUE KEY `phone` (`phone`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`),
  ADD KEY `booking_id` (`booking_id`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`room_id`),
  ADD UNIQUE KEY `room_number` (`room_number`);

--
-- Indexes for table `roomstatus`
--
ALTER TABLE `roomstatus`
  ADD PRIMARY KEY (`status_id`),
  ADD KEY `room_id` (`room_id`);

--
-- Indexes for table `room_review`
--
ALTER TABLE `room_review`
  ADD PRIMARY KEY (`review_id`),
  ADD KEY `guest_id` (`guest_id`),
  ADD KEY `room_id` (`room_id`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`service_id`),
  ADD UNIQUE KEY `service_name` (`service_name`);

--
-- Indexes for table `service_booking`
--
ALTER TABLE `service_booking`
  ADD PRIMARY KEY (`s_booking_id`),
  ADD UNIQUE KEY `guest_id` (`guest_id`,`service_id`),
  ADD KEY `service_id` (`service_id`);

--
-- Indexes for table `service_payment`
--
ALTER TABLE `service_payment`
  ADD PRIMARY KEY (`s_payment_id`),
  ADD KEY `s_booking_id` (`s_booking_id`);

--
-- Indexes for table `service_review`
--
ALTER TABLE `service_review`
  ADD PRIMARY KEY (`review_id`),
  ADD KEY `guest_id` (`guest_id`),
  ADD KEY `service_id` (`service_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `guest`
--
ALTER TABLE `guest`
  MODIFY `guest_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `room_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `roomstatus`
--
ALTER TABLE `roomstatus`
  MODIFY `status_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `room_review`
--
ALTER TABLE `room_review`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `service_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `service_booking`
--
ALTER TABLE `service_booking`
  MODIFY `s_booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `service_payment`
--
ALTER TABLE `service_payment`
  MODIFY `s_payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `service_review`
--
ALTER TABLE `service_review`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_ibfk_1` FOREIGN KEY (`guest_id`) REFERENCES `guest` (`guest_id`),
  ADD CONSTRAINT `booking_ibfk_2` FOREIGN KEY (`room_id`) REFERENCES `room` (`room_id`);

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`booking_id`) REFERENCES `booking` (`booking_id`);

--
-- Constraints for table `roomstatus`
--
ALTER TABLE `roomstatus`
  ADD CONSTRAINT `roomstatus_ibfk_1` FOREIGN KEY (`room_id`) REFERENCES `room` (`room_id`);

--
-- Constraints for table `room_review`
--
ALTER TABLE `room_review`
  ADD CONSTRAINT `room_review_ibfk_1` FOREIGN KEY (`guest_id`) REFERENCES `guest` (`guest_id`),
  ADD CONSTRAINT `room_review_ibfk_2` FOREIGN KEY (`room_id`) REFERENCES `room` (`room_id`);

--
-- Constraints for table `service_booking`
--
ALTER TABLE `service_booking`
  ADD CONSTRAINT `service_booking_ibfk_1` FOREIGN KEY (`guest_id`) REFERENCES `guest` (`guest_id`),
  ADD CONSTRAINT `service_booking_ibfk_2` FOREIGN KEY (`service_id`) REFERENCES `service` (`service_id`);

--
-- Constraints for table `service_payment`
--
ALTER TABLE `service_payment`
  ADD CONSTRAINT `service_payment_ibfk_1` FOREIGN KEY (`s_booking_id`) REFERENCES `service_booking` (`s_booking_id`);

--
-- Constraints for table `service_review`
--
ALTER TABLE `service_review`
  ADD CONSTRAINT `service_review_ibfk_1` FOREIGN KEY (`guest_id`) REFERENCES `guest` (`guest_id`),
  ADD CONSTRAINT `service_review_ibfk_2` FOREIGN KEY (`service_id`) REFERENCES `service` (`service_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

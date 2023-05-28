-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 28, 2023 at 08:06 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lostfound`
--

-- --------------------------------------------------------

--
-- Table structure for table `newissue`
--

CREATE TABLE `newissue` (
  `item_id` int(11) NOT NULL,
  `reporter_id` varchar(9) DEFAULT NULL,
  `item_name` varchar(255) DEFAULT NULL,
  `lost_found` enum('Lost','Found') DEFAULT NULL,
  `image` text DEFAULT NULL,
  `issue_date` date DEFAULT NULL,
  `place` varchar(100) DEFAULT NULL,
  `issue_status` enum('Resolved','Not Resolved') DEFAULT NULL,
  `other_details` varchar(255) DEFAULT NULL,
  `Uploading_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `newissue`
--

INSERT INTO `newissue` (`item_id`, `reporter_id`, `item_name`, `lost_found`, `image`, `issue_date`, `place`, `issue_status`, `other_details`, `Uploading_time`) VALUES
(54, 'B190435CS', 'Calculator   ', 'Lost', 'headphone1.jpg', '2022-11-24', 'Main Building 305', 'Not Resolved', 'scientific calculator,rmx-28 ,looks like a new one', '2022-12-12 15:26:59'),
(55, 'B190435CS', 'Headphone', 'Found', 'headphone3.jpg', '2022-11-05', 'Main Building 903', 'Not Resolved', 'white in colour, old', '2022-11-19 11:37:57'),
(57, 'B190457CS', 'Student ID   ', 'Lost', 'id.jpeg', '2022-11-18', 'Main building 103', 'Not Resolved', 'Notify me as soon as possible', '2022-11-22 06:03:02'),
(58, 'B190475CS', 'Phone', 'Lost', 'mobile3.jpg', '2022-11-18', 'Main building 103', 'Resolved', 'U can contact me directly in 9978680979', '2023-05-28 15:13:54'),
(60, 'B190015CS', 'Airpod ', 'Found', 'watch1.jpg', '2022-11-04', 'Main Building 209', 'Not Resolved', 'New one', '2022-11-22 11:10:23');

-- --------------------------------------------------------

--
-- Table structure for table `registered`
--

CREATE TABLE `registered` (
  `user_id` varchar(9) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `registered`
--

INSERT INTO `registered` (`user_id`, `name`, `email`, `password`) VALUES
('B190015CS', 'Niyazz', 'niyaz@gmail.com', 'Silla@28'),
('B190435CS', 'Silla K ', 'silla_b190435cs@nitc.ac.in', 'Silla@28'),
('B190457CS', 'Saranya K P', 'saranya_b190435cs@nitc.ac.in', 'Sarany3*'),
('B190475CS', 'Anagha Suresh', 'anagha_b190475cs@nitc.ac.in', 'Anagha@3');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `newissue`
--
ALTER TABLE `newissue`
  ADD PRIMARY KEY (`item_id`),
  ADD KEY `reporter_id` (`reporter_id`);

--
-- Indexes for table `registered`
--
ALTER TABLE `registered`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `newissue`
--
ALTER TABLE `newissue`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `newissue`
--
ALTER TABLE `newissue`
  ADD CONSTRAINT `newissue_ibfk_1` FOREIGN KEY (`reporter_id`) REFERENCES `registered` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

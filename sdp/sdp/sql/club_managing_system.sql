-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 06, 2022 at 03:44 PM
-- Server version: 8.0.27
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `club_managing_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `admin_ID` int NOT NULL AUTO_INCREMENT,
  `admin_username` varchar(20) NOT NULL,
  `admin_password` varchar(20) NOT NULL,
  PRIMARY KEY (`admin_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_ID`, `admin_username`, `admin_password`) VALUES
(1, 'admin', '123');

-- --------------------------------------------------------

--
-- Table structure for table `announcement`
--

DROP TABLE IF EXISTS `announcement`;
CREATE TABLE IF NOT EXISTS `announcement` (
  `announcement_ID` int NOT NULL AUTO_INCREMENT,
  `club_ID` int NOT NULL,
  `club_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `announcement_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `announcement_details` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`announcement_ID`),
  KEY `club_ID` (`club_ID`),
  KEY `club_name` (`club_name`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `announcement`
--

INSERT INTO `announcement` (`announcement_ID`, `club_ID`, `club_name`, `announcement_name`, `announcement_details`) VALUES
(1, 1, 'Swimming Club', 'The swimming pool is closed for renovation!', 'To further expand our swimming pool, we have decided to close our pool for about 3 weeks. Sorry for the inconvenience!'),
(2, 2, 'Ping-Pong Club', 'Ping Pong Friendly Match', 'We are organizing a ping-pong friendly match tomorrow!'),
(3, 2, 'Ping-Pong Club', 'Ping Pong room is closed', 'Ping Pong room is closed for renovation. Sorry.');

-- --------------------------------------------------------

--
-- Table structure for table `available_room`
--

DROP TABLE IF EXISTS `available_room`;
CREATE TABLE IF NOT EXISTS `available_room` (
  `classroom_name` varchar(255) NOT NULL,
  `classroom_location` varchar(255) NOT NULL,
  `pending` tinyint(1) NOT NULL,
  PRIMARY KEY (`classroom_name`),
  UNIQUE KEY `classroom_location` (`classroom_location`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `available_room`
--

INSERT INTO `available_room` (`classroom_name`, `classroom_location`, `pending`) VALUES
('Audit 1', 'Audit 1.1', 1),
('Audit 2', 'Audit 2.2', 0),
('Audit 3', '3rd Floor', 0),
('Audit 4', '4th Floor', 0),
('Audit 5', '5th Floor', 0),
('Ping-Pong Room', 'Second Floor', 0),
('Swimming Pool', 'Outside', 0);

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

DROP TABLE IF EXISTS `booking`;
CREATE TABLE IF NOT EXISTS `booking` (
  `booking_id` int NOT NULL AUTO_INCREMENT,
  `classroom_name` varchar(255) NOT NULL,
  `classroom_location` varchar(255) NOT NULL,
  `committee_id` int NOT NULL,
  `club_id` int NOT NULL,
  `club_name` varchar(255) NOT NULL,
  `approval` tinyint(1) NOT NULL,
  PRIMARY KEY (`booking_id`),
  KEY `classroom_name` (`classroom_name`),
  KEY `classroom_location` (`classroom_location`),
  KEY `club_id` (`club_id`) USING BTREE,
  KEY `committee_id` (`committee_id`) USING BTREE,
  KEY `club_name` (`club_name`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`booking_id`, `classroom_name`, `classroom_location`, `committee_id`, `club_id`, `club_name`, `approval`) VALUES
(1, 'Audit 1', 'Audit 1.1', 1, 1, 'Swimming Club', 1);

-- --------------------------------------------------------

--
-- Table structure for table `club`
--

DROP TABLE IF EXISTS `club`;
CREATE TABLE IF NOT EXISTS `club` (
  `club_ID` int NOT NULL AUTO_INCREMENT,
  `club_name` varchar(255) NOT NULL,
  `club_desc` varchar(255) NOT NULL,
  `club_member_count` int NOT NULL,
  PRIMARY KEY (`club_ID`),
  UNIQUE KEY `club_name` (`club_name`),
  KEY `club_ID` (`club_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `club`
--

INSERT INTO `club` (`club_ID`, `club_name`, `club_desc`, `club_member_count`) VALUES
(1, 'Swimming Club', 'Human beings have been swimming for millennia. So Join us now!', 0),
(2, 'Ping-Pong Club', 'Our mission is to develop world-class table tennis players by identifying, nurturing & motivating aspiring table tennis talents to become the best that they can be. So join us now!', 0),
(3, 'E-Sport Club', 'Managed by a qualified and experienced team, EPC organizes the world’s most popular sports simulators competitions, all the while continuing to find creative ways to grow the tournaments and make our events and broadcasts more fun, attractive and get-at-a', 0),
(4, 'Taekwondo Club', 'Our Taekwondo Club serves the Greater Rochester area with traditional Taekwondo using the modern tools of the Olympic Taekwondo movement. So join us now to train yourself!', 0);

-- --------------------------------------------------------

--
-- Table structure for table `committee`
--

DROP TABLE IF EXISTS `committee`;
CREATE TABLE IF NOT EXISTS `committee` (
  `committee_ID` int NOT NULL AUTO_INCREMENT,
  `committee_username` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `committee_password` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `club_ID` int NOT NULL,
  `club_name` varchar(255) NOT NULL,
  PRIMARY KEY (`committee_ID`),
  KEY `club_ID` (`club_ID`),
  KEY `club_name` (`club_name`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `committee`
--

INSERT INTO `committee` (`committee_ID`, `committee_username`, `committee_password`, `club_ID`, `club_name`) VALUES
(1, 'com1', '111', 1, 'Swimming Club'),
(2, 'com2', '222', 2, 'Ping-Pong Club'),
(3, 'com3', '333', 3, 'E-Sport Club'),
(4, 'com4', '444', 4, 'Taekwondo Club');

-- --------------------------------------------------------

--
-- Table structure for table `discussion_board`
--

DROP TABLE IF EXISTS `discussion_board`;
CREATE TABLE IF NOT EXISTS `discussion_board` (
  `board_ID` int NOT NULL AUTO_INCREMENT,
  `board_title` varchar(255) NOT NULL,
  `club_name` varchar(255) NOT NULL,
  PRIMARY KEY (`board_ID`),
  KEY `club_id` (`club_name`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `discussion_board`
--

INSERT INTO `discussion_board` (`board_ID`, `board_title`, `club_name`) VALUES
(1, 'On 25th of June, who would like to join our camping program in Hutan Jungle?', 'Swimming Club'),
(2, 'We need more ping pong balls', 'Ping-Pong Club');

-- --------------------------------------------------------

--
-- Table structure for table `discussion_replies`
--

DROP TABLE IF EXISTS `discussion_replies`;
CREATE TABLE IF NOT EXISTS `discussion_replies` (
  `discussion_replies_id` int NOT NULL AUTO_INCREMENT,
  `board_id` int NOT NULL,
  `student_id` varchar(8) NOT NULL,
  `student_name` varchar(255) NOT NULL,
  `text` varchar(255) NOT NULL,
  PRIMARY KEY (`discussion_replies_id`),
  KEY `board_id` (`board_id`) USING BTREE,
  KEY `student_id` (`student_id`) USING BTREE,
  KEY `student_name` (`student_name`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `discussion_replies`
--

INSERT INTO `discussion_replies` (`discussion_replies_id`, `board_id`, `student_id`, `student_name`, `text`) VALUES
(1, 1, 'TP059118', 'Chooong Yuen Haow', 'ME ME ME');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

DROP TABLE IF EXISTS `events`;
CREATE TABLE IF NOT EXISTS `events` (
  `event_ID` int NOT NULL AUTO_INCREMENT,
  `club_ID` int NOT NULL,
  `club_name` varchar(20) NOT NULL,
  `event_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `event_details` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `time` time NOT NULL,
  `approval` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`event_ID`),
  KEY `club_ID` (`club_ID`),
  KEY `club_name` (`club_name`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`event_ID`, `club_ID`, `club_name`, `event_name`, `event_details`, `start_date`, `end_date`, `time`, `approval`) VALUES
(1, 1, 'Swimming Club', 'Swimming Contest', 'RM 100 for first place, RM 40 for first runner up,', '2022-06-06', '2022-06-06', '09:30:00', 1),
(2, 2, 'Ping-Pong Club', 'Ping Pong Friendly Match', 'Just a friendly match. Enjoy!', '2022-06-07', '2022-06-07', '09:30:00', 1),
(3, 2, 'Ping-Pong Club', 'Ping Pong camping', 'lets camp yes', '2022-06-08', '2022-06-09', '12:38:00', 0),
(4, 2, 'Ping-Pong Club', 'Ping Pong Event', 'PingPongEvent', '2022-06-23', '2022-06-24', '14:40:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

DROP TABLE IF EXISTS `feedback`;
CREATE TABLE IF NOT EXISTS `feedback` (
  `feedback_ID` int NOT NULL AUTO_INCREMENT,
  `club_name` varchar(255) NOT NULL,
  `student_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `feedback_text` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `admin_replies` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `committee_replies` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  PRIMARY KEY (`feedback_ID`),
  KEY `club_id` (`club_name`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`feedback_ID`, `club_name`, `student_name`, `feedback_text`, `admin_replies`, `committee_replies`) VALUES
(1, 'Swimming Club', 'Chooong Yuen Haow', 'Hi, I would like to propose a solution to our club. We should start selling goggles to the public so', 'ok', 'sure'),
(7, 'Swimming Club', 'Chooong Yuen Haow', 'I would like to say hi', 'bruh', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

DROP TABLE IF EXISTS `student`;
CREATE TABLE IF NOT EXISTS `student` (
  `student_ID` varchar(8) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `student_username` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `student_password` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `student_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `student_email` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `enrolled_club` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  PRIMARY KEY (`student_ID`),
  UNIQUE KEY `student_username` (`student_username`),
  UNIQUE KEY `student_email` (`student_email`),
  KEY `student_name` (`student_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`student_ID`, `student_username`, `student_password`, `student_name`, `student_email`, `enrolled_club`) VALUES
('TP059118', 'cyh', '123', 'Chooong Yuen Haow', 'esilvercool@gmail.com', 'Swimming Club');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `announcement`
--
ALTER TABLE `announcement`
  ADD CONSTRAINT `announcement_ibfk_1` FOREIGN KEY (`club_ID`) REFERENCES `club` (`club_ID`),
  ADD CONSTRAINT `announcement_ibfk_2` FOREIGN KEY (`club_name`) REFERENCES `club` (`club_name`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_ibfk_1` FOREIGN KEY (`classroom_location`) REFERENCES `available_room` (`classroom_location`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `booking_ibfk_2` FOREIGN KEY (`classroom_name`) REFERENCES `available_room` (`classroom_name`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `booking_ibfk_3` FOREIGN KEY (`club_id`) REFERENCES `club` (`club_ID`),
  ADD CONSTRAINT `booking_ibfk_4` FOREIGN KEY (`club_name`) REFERENCES `club` (`club_name`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `booking_ibfk_5` FOREIGN KEY (`committee_id`) REFERENCES `committee` (`committee_ID`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `committee`
--
ALTER TABLE `committee`
  ADD CONSTRAINT `committee_ibfk_1` FOREIGN KEY (`club_ID`) REFERENCES `club` (`club_ID`),
  ADD CONSTRAINT `committee_ibfk_2` FOREIGN KEY (`club_name`) REFERENCES `club` (`club_name`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `discussion_board`
--
ALTER TABLE `discussion_board`
  ADD CONSTRAINT `discussion_board_ibfk_1` FOREIGN KEY (`club_name`) REFERENCES `club` (`club_name`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `discussion_replies`
--
ALTER TABLE `discussion_replies`
  ADD CONSTRAINT `discussion_replies_ibfk_1` FOREIGN KEY (`board_id`) REFERENCES `discussion_board` (`board_ID`),
  ADD CONSTRAINT `discussion_replies_ibfk_2` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_ID`),
  ADD CONSTRAINT `discussion_replies_ibfk_3` FOREIGN KEY (`student_name`) REFERENCES `student` (`student_name`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `events_ibfk_1` FOREIGN KEY (`club_ID`) REFERENCES `club` (`club_ID`),
  ADD CONSTRAINT `events_ibfk_2` FOREIGN KEY (`club_name`) REFERENCES `club` (`club_name`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `feedback_ibfk_1` FOREIGN KEY (`club_name`) REFERENCES `club` (`club_name`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

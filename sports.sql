-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 29, 2015 at 08:45 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sports`
--

-- --------------------------------------------------------

--
-- Table structure for table `assign_kit`
--

CREATE TABLE IF NOT EXISTS `assign_kit` (
`id` int(10) unsigned NOT NULL,
  `batch_students_id` int(10) unsigned NOT NULL,
  `kit_item_id` int(10) unsigned NOT NULL,
  `brand` varchar(30) DEFAULT NULL,
  `color` varchar(30) DEFAULT NULL,
  `size` float DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assign_kit`
--

INSERT INTO `assign_kit` (`id`, `batch_students_id`, `kit_item_id`, `brand`, `color`, `size`) VALUES
(1, 1, 1, '', '', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE IF NOT EXISTS `attendance` (
`id` int(10) unsigned NOT NULL,
  `student_batch_id` int(10) unsigned NOT NULL,
  `date` date DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `batch` varchar(30) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`id`, `student_batch_id`, `date`, `status`, `batch`) VALUES
(1, 27, '2015-01-13', 'Present', 'two'),
(2, 1, '2015-01-13', 'Present', 'two'),
(3, 26, '2015-01-13', 'Present', 'two'),
(6, 33, '2015-01-13', 'Present', '4'),
(7, 34, '2015-01-14', 'Present', '4'),
(8, 27, '2015-01-13', 'Present', '5'),
(9, 1, '2015-01-14', 'Absent', '3'),
(10, 26, '2015-01-14', 'Absent', '3'),
(11, 35, '2015-01-14', 'Absent', '3'),
(12, 1, '2015-01-16', 'Present', '3'),
(13, 26, '2015-01-16', 'Present', '3'),
(14, 35, '2015-01-16', 'Absent', '3'),
(15, 41, '2015-01-16', 'Absent', '3');

-- --------------------------------------------------------

--
-- Table structure for table `batch`
--

CREATE TABLE IF NOT EXISTS `batch` (
`batch_id` int(10) unsigned NOT NULL,
  `batch_name` varchar(60) DEFAULT NULL,
  `batch_location` varchar(240) DEFAULT NULL,
  `batch_timing` varchar(20) DEFAULT NULL,
  `coach_id` int(10) unsigned NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `batch`
--

INSERT INTO `batch` (`batch_id`, `batch_name`, `batch_location`, `batch_timing`, `coach_id`) VALUES
(3, 'batch3', '', '', 1),
(4, 'batch5', '', '', 1),
(5, 'batch7', '', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `batch_students`
--

CREATE TABLE IF NOT EXISTS `batch_students` (
`id` int(10) unsigned NOT NULL,
  `student_id` int(10) unsigned NOT NULL,
  `student_name` varchar(120) DEFAULT NULL,
  `batch_id` int(10) unsigned NOT NULL,
  `cycle_of_fee` varchar(200) NOT NULL,
  `total_fee` varchar(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `batch_students`
--

INSERT INTO `batch_students` (`id`, `student_id`, `student_name`, `batch_id`, `cycle_of_fee`, `total_fee`) VALUES
(1, 4, 'xyz', 3, '', ''),
(26, 1, 'xyz', 3, '', ''),
(27, 12, '', 5, '', ''),
(33, 13, 'sada1', 4, '', ''),
(34, 15, 'sada23', 4, '', ''),
(35, 14, 'sada12', 3, '', ''),
(41, 18, 'test', 3, '', ''),
(51, 16, 'deedsdsad', 4, '2', '1000'),
(52, 17, 'sadanan', 4, '2', '2000'),
(53, 19, 'sada', 5, '1', '2000');

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE IF NOT EXISTS `brand` (
`brand_id` int(10) unsigned NOT NULL,
  `brand_name` varchar(60) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`brand_id`, `brand_name`) VALUES
(1, 'Nike'),
(2, 'Puma');

-- --------------------------------------------------------

--
-- Table structure for table `center`
--

CREATE TABLE IF NOT EXISTS `center` (
`id` int(11) NOT NULL,
  `center_name` varchar(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `center`
--

INSERT INTO `center` (`id`, `center_name`) VALUES
(1, 'Vasanth Nagar'),
(2, 'Koramangal');

-- --------------------------------------------------------

--
-- Table structure for table `coach`
--

CREATE TABLE IF NOT EXISTS `coach` (
`coach_id` int(10) unsigned NOT NULL,
  `coach_name` varchar(60) DEFAULT NULL,
  `address` text,
  `phone` varchar(20) DEFAULT NULL,
  `email` varchar(40) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `coach`
--

INSERT INTO `coach` (`coach_id`, `coach_name`, `address`, `phone`, `email`) VALUES
(1, 'xyz', 'xyz', '123', 'xyz@mail.com');

-- --------------------------------------------------------

--
-- Table structure for table `color`
--

CREATE TABLE IF NOT EXISTS `color` (
`color_id` int(10) unsigned NOT NULL,
  `color_name` varchar(60) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `color`
--

INSERT INTO `color` (`color_id`, `color_name`) VALUES
(1, 'Red'),
(2, 'Blue');

-- --------------------------------------------------------

--
-- Table structure for table `enquiry`
--

CREATE TABLE IF NOT EXISTS `enquiry` (
`enquiry_id` int(10) unsigned NOT NULL,
  `enquiry_name` varchar(120) DEFAULT NULL,
  `enquiry_location` varchar(120) DEFAULT NULL,
  `enquiry_date` date DEFAULT NULL,
  `enquiry_type` varchar(80) DEFAULT NULL,
  `how_did_they_know_about_us` varchar(60) DEFAULT NULL,
  `trainee_name` varchar(120) DEFAULT NULL,
  `trainee_age` varchar(40) DEFAULT NULL,
  `trainee_school` varchar(240) DEFAULT NULL,
  `status` varchar(60) DEFAULT NULL,
  `relation_between_enquirer_joinee` varchar(40) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `email` varchar(60) DEFAULT NULL,
  `preferred_center` varchar(40) DEFAULT NULL,
  `preferred_batch` varchar(40) DEFAULT NULL,
  `additional_comments` text,
  `follow_up` date DEFAULT NULL,
  `follow_up_comment` varchar(240) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `enquiry`
--

INSERT INTO `enquiry` (`enquiry_id`, `enquiry_name`, `enquiry_location`, `enquiry_date`, `enquiry_type`, `how_did_they_know_about_us`, `trainee_name`, `trainee_age`, `trainee_school`, `status`, `relation_between_enquirer_joinee`, `phone`, `email`, `preferred_center`, `preferred_batch`, `additional_comments`, `follow_up`, `follow_up_comment`) VALUES
(1, 'xyz', 'koramangal', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', ''),
(2, 'test1', 'bangalore', '0000-00-00', 'asdad', 'dfsdf', 'test', '21', 'test', 'test', 'test', '99999999999', 'test', 'test', 'test', 'test', '0000-00-00', 'test'),
(21, 'sadanand', 'bangalore', '2014-12-31', 'website', 'online_search', 'sadanand', '23', 'sce', 'will_mostly_register', 'self', '08867730858', 'sadananda2010@gmail.com', '1', 'Weekend', 'test', '2015-01-10', 'next sat'),
(22, 'sada', 'sada', '2015-01-03', 'office_phone', 'walk_in', 'sada', '21', 'sce', 'will_mostly_register', 'mother', '123456789012', 'sadananda2010@gmal.com', '1', 'Weekend', 'fsdfsdfsd  ddva d d', '2015-01-02', 'dlsflsdfs'),
(23, 'test1', 'bangalore', '2015-01-05', 'website', 'online_search', 'sada', '23', 'sce', 'will_mostly_register', 'sibling', '123456789012', 'sadananda2010@gma.com', '1', 'Weekend', 'safdsfadf', '2015-01-21', 'asdasfadf'),
(24, 'test123', 'test', '2015-01-14', 'personal_phone', 'advertisement', 'test', '25', 'sce', 'will_mostly_register', 'sibling', '8867730858', 'sadananda2010@gma.com', '1', 'Weekend', 'dfa gsdg dfgdf gdfgdfg', '2015-01-21', 'sdf sdf ds fsd fdsfdsff ds fsdfd fds fsdfdsf  sdfsdds dsf ds f '),
(25, 'test', 'bangalore', '2015-01-19', 'personal_phone', 'walk_in', 'test', '23', 'sce', 'will_not', 'sibling', '8867730858', 'sadananda2010@gmal.com', '1', 'Summer Camp', 'sdfas dsdfsd fsdf sd', '2015-01-24', 'sdf sdf ds fsd fdsfdsff ds fsdfd fds fsdfdsf  sdfsdds dsf ds f');

-- --------------------------------------------------------

--
-- Table structure for table `fee`
--

CREATE TABLE IF NOT EXISTS `fee` (
`id` int(10) unsigned NOT NULL,
  `duration` varchar(60) DEFAULT NULL,
  `total_fee` float DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fee`
--

INSERT INTO `fee` (`id`, `duration`, `total_fee`) VALUES
(1, '3 months', 2000);

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE IF NOT EXISTS `inventory` (
`inventory_id` int(10) unsigned NOT NULL,
  `item_id` int(10) unsigned NOT NULL,
  `brand_id` int(10) unsigned NOT NULL,
  `color_id` int(10) unsigned NOT NULL,
  `size_id` int(10) unsigned NOT NULL,
  `quantity` varchar(30) DEFAULT NULL,
  `available_qty` varchar(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`inventory_id`, `item_id`, `brand_id`, `color_id`, `size_id`, `quantity`, `available_qty`) VALUES
(32, 2, 2, 2, 2, '2100', '2100'),
(45, 1, 1, 1, 1, '3040', '3032'),
(49, 2, 2, 2, 3, '100', '100'),
(50, 1, 2, 2, 6, '1510', '1509');

-- --------------------------------------------------------

--
-- Table structure for table `inventory_history`
--

CREATE TABLE IF NOT EXISTS `inventory_history` (
`id` int(10) unsigned NOT NULL,
  `item_id` int(10) unsigned NOT NULL,
  `brand_id` int(10) unsigned NOT NULL,
  `color_id` int(10) unsigned NOT NULL,
  `size_id` int(10) unsigned NOT NULL,
  `quantity` varchar(30) DEFAULT NULL,
  `date` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=72 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inventory_history`
--

INSERT INTO `inventory_history` (`id`, `item_id`, `brand_id`, `color_id`, `size_id`, `quantity`, `date`) VALUES
(1, 1, 2, 2, 6, '600', NULL),
(2, 1, 1, 1, 1, '100', '0000-00-00 00:00:00'),
(3, 1, 1, 1, 1, '10', '0000-00-00 00:00:00'),
(4, 1, 2, 2, 2, '200', '0000-00-00 00:00:00'),
(5, 1, 2, 2, 2, '200', '0000-00-00 00:00:00'),
(6, 1, 2, 2, 2, '12', '0000-00-00 00:00:00'),
(7, 1, 2, 2, 6, '900', '0000-00-00 00:00:00'),
(8, 1, 1, 2, 2, '100', '0000-00-00 00:00:00'),
(9, 1, 2, 1, 2, '100', '0000-00-00 00:00:00'),
(10, 1, 1, 2, 1, '200', '0000-00-00 00:00:00'),
(11, 1, 2, 1, 1, '200', '0000-00-00 00:00:00'),
(12, 1, 1, 1, 2, '200', '0000-00-00 00:00:00'),
(13, 1, 1, 1, 2, '200', '0000-00-00 00:00:00'),
(15, 1, 1, 1, 1, '45', '0000-00-00 00:00:00'),
(16, 1, 1, 1, 1, '45', '0000-00-00 00:00:00'),
(27, 1, 1, 1, 1, '100', '0000-00-00 00:00:00'),
(28, 1, 1, 1, 1, '10', '0000-00-00 00:00:00'),
(29, 1, 1, 1, 1, '200', '0000-00-00 00:00:00'),
(30, 1, 1, 1, 1, '10', '0000-00-00 00:00:00'),
(31, 1, 2, 2, 2, '10', '0000-00-00 00:00:00'),
(32, 1, 2, 2, 2, '100', '0000-00-00 00:00:00'),
(33, 1, 1, 1, 1, '100', '0000-00-00 00:00:00'),
(34, 1, 1, 1, 1, '100', '0000-00-00 00:00:00'),
(35, 1, 1, 1, 1, '100', '0000-00-00 00:00:00'),
(36, 1, 1, 1, 1, '100', '0000-00-00 00:00:00'),
(37, 1, 1, 1, 1, '100', '0000-00-00 00:00:00'),
(38, 1, 1, 1, 1, '100', '0000-00-00 00:00:00'),
(39, 1, 1, 1, 1, '100', '0000-00-00 00:00:00'),
(40, 1, 1, 1, 1, '100', '0000-00-00 00:00:00'),
(41, 1, 1, 1, 1, '100', '0000-00-00 00:00:00'),
(42, 1, 1, 1, 1, '100', '0000-00-00 00:00:00'),
(43, 1, 1, 1, 1, '100', '0000-00-00 00:00:00'),
(44, 1, 1, 1, 1, '100', '0000-00-00 00:00:00'),
(45, 1, 1, 1, 1, '100', '0000-00-00 00:00:00'),
(46, 1, 1, 1, 1, '100', '0000-00-00 00:00:00'),
(47, 1, 1, 1, 1, '100', '0000-00-00 00:00:00'),
(48, 1, 1, 1, 1, '100', '0000-00-00 00:00:00'),
(49, 1, 1, 1, 1, '100', '0000-00-00 00:00:00'),
(50, 1, 1, 1, 1, '100', '0000-00-00 00:00:00'),
(51, 1, 1, 1, 1, '10', '0000-00-00 00:00:00'),
(52, 1, 1, 1, 1, '10', '0000-00-00 00:00:00'),
(53, 1, 2, 2, 6, '10', '0000-00-00 00:00:00'),
(54, 1, 1, 1, 1, '100', '0000-00-00 00:00:00'),
(55, 1, 1, 1, 1, '200', '0000-00-00 00:00:00'),
(56, 1, 1, 1, 1, '200', '0000-00-00 00:00:00'),
(57, 1, 1, 1, 1, '10', '0000-00-00 00:00:00'),
(58, 1, 1, 1, 1, '10', '0000-00-00 00:00:00'),
(59, 1, 1, 1, 1, '10', '0000-00-00 00:00:00'),
(60, 1, 1, 1, 1, '10', '0000-00-00 00:00:00'),
(61, 1, 1, 1, 1, '10', '0000-00-00 00:00:00'),
(62, 1, 1, 1, 1, '10', '0000-00-00 00:00:00'),
(63, 1, 1, 1, 1, '10', '0000-00-00 00:00:00'),
(64, 1, 1, 1, 1, '10', '0000-00-00 00:00:00'),
(65, 1, 1, 1, 1, '100', '0000-00-00 00:00:00'),
(66, 2, 2, 2, 2, '100', '0000-00-00 00:00:00'),
(67, 2, 2, 2, 2, '1000', '0000-00-00 00:00:00'),
(68, 2, 2, 2, 2, '1000', '0000-00-00 00:00:00'),
(69, 1, 1, 1, 1, '10', '0000-00-00 00:00:00'),
(70, 1, 1, 1, 1, '10', '0000-00-00 00:00:00'),
(71, 2, 2, 2, 3, '100', '2015-01-27 18:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE IF NOT EXISTS `item` (
`item_id` int(10) unsigned NOT NULL,
  `item_name` varchar(60) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`item_id`, `item_name`) VALUES
(1, 'Foot Ball'),
(2, 'ShinGuards'),
(3, 'Stockings');

-- --------------------------------------------------------

--
-- Table structure for table `jersy`
--

CREATE TABLE IF NOT EXISTS `jersy` (
`jersy_id` int(10) unsigned NOT NULL,
  `brand_id` int(10) unsigned NOT NULL,
  `color_id` int(10) unsigned NOT NULL,
  `size_id` int(10) unsigned NOT NULL,
  `quantity` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kit_items`
--

CREATE TABLE IF NOT EXISTS `kit_items` (
`item_id` int(10) unsigned NOT NULL,
  `item_name` varchar(120) DEFAULT NULL,
  `qauntity` int(11) DEFAULT NULL,
  `status` varchar(60) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kit_items`
--

INSERT INTO `kit_items` (`item_id`, `item_name`, `qauntity`, `status`) VALUES
(1, 'football', 100, 'ava');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE IF NOT EXISTS `payment` (
`payment_id` int(10) unsigned NOT NULL,
  `student_id` int(10) unsigned NOT NULL,
  `payment_date` date DEFAULT NULL,
  `joined_date` date DEFAULT NULL,
  `course_id` int(10) unsigned NOT NULL,
  `total_fee` float DEFAULT NULL,
  `pay_now` float DEFAULT NULL,
  `balnce` float DEFAULT NULL,
  `reciept_no` varchar(60) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `mode_of_payment` varchar(200) NOT NULL,
  `payment_due_date` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`payment_id`, `student_id`, `payment_date`, `joined_date`, `course_id`, `total_fee`, `pay_now`, `balnce`, `reciept_no`, `status`, `mode_of_payment`, `payment_due_date`) VALUES
(1, 1, '0000-00-00', '0000-00-00', 1, NULL, NULL, NULL, '', '', '', '0000-00-00'),
(3, 14, '2015-01-14', '2015-01-14', 1, 2000, 1000, 1000, '', 'pending', 'cash', '0000-00-00'),
(4, 14, '2015-01-16', '2015-01-14', 1, 2000, 200, 1800, '', 'pending', 'demand_draft', '0000-00-00'),
(5, 14, '2015-01-16', '2015-01-14', 1, 2000, 200, 1800, '', 'pending', 'cash', '0000-00-00'),
(6, 19, '2015-01-19', '2015-01-19', 1, 2000, 2000, 0, '', 'paid', 'cash', '0000-00-00'),
(7, 4, '2015-01-19', '2015-01-14', 1, 2000, 2000, 0, '', 'paid', 'cash', '2015-03-19'),
(8, 1, '2015-01-19', '0000-00-00', 1, 2000, 2000, 0, '1', 'paid', 'demand_draft', '2015-04-19'),
(9, 15, '2015-01-19', '2015-01-14', 1, 2000, 500, 1500, '', 'pending', 'cash', '2015-06-19');

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE IF NOT EXISTS `registration` (
`register_id` int(10) unsigned NOT NULL,
  `enquiry_id` int(10) unsigned NOT NULL,
  `name` varchar(120) DEFAULT NULL,
  `dob` varchar(30) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `age` varchar(20) DEFAULT NULL,
  `class` varchar(20) DEFAULT NULL,
  `weight` float DEFAULT NULL,
  `height` float DEFAULT NULL,
  `blood_group` varchar(20) DEFAULT NULL,
  `uniform_size` varchar(20) DEFAULT NULL,
  `past_training_experience` text,
  `represented_team` varchar(120) DEFAULT NULL,
  `school` varchar(240) DEFAULT NULL,
  `medical_conditions` varchar(240) DEFAULT NULL,
  `image` varchar(240) DEFAULT NULL,
  `full_address` text,
  `pincode` varchar(20) DEFAULT NULL,
  `trainee_phone` varchar(20) DEFAULT NULL,
  `trainee_email` varchar(60) DEFAULT NULL,
  `residence_phone` varchar(20) DEFAULT NULL,
  `primary_contact_person` varchar(120) DEFAULT NULL,
  `emergency_contact` text,
  `fathers_name` varchar(120) DEFAULT NULL,
  `fathers_phone` varchar(20) DEFAULT NULL,
  `fathers_email` varchar(60) DEFAULT NULL,
  `mothers_name` varchar(120) DEFAULT NULL,
  `mothers_phone` varchar(20) DEFAULT NULL,
  `mothers_email` varchar(60) DEFAULT NULL,
  `joined_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`register_id`, `enquiry_id`, `name`, `dob`, `gender`, `age`, `class`, `weight`, `height`, `blood_group`, `uniform_size`, `past_training_experience`, `represented_team`, `school`, `medical_conditions`, `image`, `full_address`, `pincode`, `trainee_phone`, `trainee_email`, `residence_phone`, `primary_contact_person`, `emergency_contact`, `fathers_name`, `fathers_phone`, `fathers_email`, `mothers_name`, `mothers_phone`, `mothers_email`, `joined_date`) VALUES
(1, 1, 'xyz', '', '', '', '', NULL, NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2015-01-14 10:31:53'),
(4, 2, 'fdssfs', '', '', '', '', NULL, NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2015-01-14 10:31:53'),
(12, 21, '', '', NULL, '', '', NULL, NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2015-01-14 10:31:53'),
(13, 2, 'sada1', '', '', '', '', NULL, NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2015-01-14 10:31:53'),
(14, 2, 'sada12', '', '', '', '', NULL, NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2015-01-14 10:31:53'),
(15, 2, 'sada23', '', '', '', '', NULL, NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2015-01-14 10:31:53'),
(16, 22, 'deedsdsad', '', NULL, '', '', NULL, NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2015-01-14 10:31:53'),
(17, 23, 'sadanan', '', NULL, '', '', NULL, NULL, '', '', '', '', '', '', '6768-Tulips.jpg', '', '', '', '', '', '', '', '', '', '', '', '', '', '2015-01-14 10:31:53'),
(18, 24, 'test', '2015-01-14', 'female', '43', '', NULL, NULL, '', '', '', '', '', '', '', '', '', '', '', '', 'self', '', '', '', '', '', '', '', '2015-01-14 10:40:43'),
(19, 25, 'sada', '', NULL, '', '', NULL, NULL, '', '', '', '', '', '', '1975-Penguins.jpg', '', '', '', '', '', '', '', '', '', '', '', '', '', '2015-01-19 05:31:58');

-- --------------------------------------------------------

--
-- Table structure for table `size`
--

CREATE TABLE IF NOT EXISTS `size` (
`size_id` int(10) unsigned NOT NULL,
  `size` varchar(60) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `size`
--

INSERT INTO `size` (`size_id`, `size`) VALUES
(1, 'S'),
(2, 'M'),
(3, 'L'),
(4, 'XL'),
(5, '5'),
(6, '4'),
(7, '3'),
(8, 'XS'),
(9, '2XS');

-- --------------------------------------------------------

--
-- Table structure for table `student_jersy`
--

CREATE TABLE IF NOT EXISTS `student_jersy` (
`id` int(10) unsigned NOT NULL,
  `student_id` int(10) unsigned NOT NULL,
  `brand_id` int(10) unsigned NOT NULL,
  `color_id` int(10) unsigned NOT NULL,
  `size_id` int(10) unsigned NOT NULL,
  `jersy_id` int(10) unsigned DEFAULT NULL,
  `date_assigned` varchar(30) DEFAULT NULL,
  `date_delivery` varchar(30) DEFAULT NULL,
  `status` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `student_kit`
--

CREATE TABLE IF NOT EXISTS `student_kit` (
`id` int(10) unsigned NOT NULL,
  `student_id` int(10) unsigned NOT NULL,
  `item_id` int(10) unsigned NOT NULL,
  `brand_id` int(10) unsigned NOT NULL,
  `color_id` int(10) unsigned NOT NULL,
  `size_id` int(10) unsigned NOT NULL,
  `inventory_id` int(10) unsigned DEFAULT NULL,
  `date` varchar(30) DEFAULT NULL,
  `status` varchar(30) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_kit`
--

INSERT INTO `student_kit` (`id`, `student_id`, `item_id`, `brand_id`, `color_id`, `size_id`, `inventory_id`, `date`, `status`) VALUES
(1, 1, 1, 1, 1, 1, NULL, NULL, NULL),
(2, 1, 1, 1, 1, 1, NULL, NULL, NULL),
(4, 34, 1, 1, 2, 6, NULL, NULL, 'Pending'),
(5, 34, 1, 2, 2, 6, NULL, NULL, 'Pending'),
(6, 34, 2, 2, 1, 7, NULL, NULL, 'Pending'),
(7, 34, 3, 1, 2, 6, NULL, NULL, 'Pending'),
(9, 34, 1, 1, 1, 6, NULL, NULL, 'Pending'),
(11, 51, 1, 2, 2, 6, NULL, NULL, 'Delivery'),
(12, 51, 2, 1, 2, 7, NULL, NULL, 'Delivery'),
(13, 51, 3, 2, 2, 6, NULL, NULL, 'Delivery'),
(15, 53, 1, 1, 1, 6, NULL, NULL, 'Pending'),
(18, 35, 1, 1, 1, 1, 0, '', 'Delivery'),
(19, 52, 1, 1, 1, 1, NULL, NULL, 'Pending'),
(20, 33, 1, 1, 1, 1, NULL, NULL, 'Delivery'),
(21, 33, 2, 1, 1, 5, NULL, NULL, 'Pending'),
(22, 33, 3, 1, 2, 2, NULL, NULL, 'Pending'),
(23, 52, 1, 1, 1, 1, NULL, NULL, 'Delivery'),
(24, 52, 2, 1, 1, 1, NULL, NULL, 'Pending'),
(25, 52, 3, 1, 1, 1, NULL, NULL, 'Pending'),
(26, 51, 1, 1, 1, 1, NULL, NULL, 'Delivery'),
(27, 51, 2, 1, 1, 1, NULL, NULL, 'Pending'),
(28, 51, 3, 1, 1, 1, NULL, NULL, 'Pending'),
(29, 1, 1, 1, 1, 5, NULL, NULL, 'Pending'),
(30, 1, 2, 1, 1, 5, NULL, NULL, 'Pending'),
(31, 1, 3, 1, 1, 7, NULL, NULL, 'Pending'),
(32, 1, 1, 1, 1, 1, NULL, NULL, 'Delivery'),
(33, 1, 1, 1, 1, 1, NULL, NULL, 'Delivery'),
(34, 26, 1, 1, 1, 1, NULL, NULL, 'Delivery'),
(35, 41, 1, 1, 1, 1, NULL, NULL, 'Delivery');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assign_kit`
--
ALTER TABLE `assign_kit`
 ADD PRIMARY KEY (`id`), ADD KEY `batch_students_id` (`batch_students_id`), ADD KEY `kit_item_id` (`kit_item_id`);

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
 ADD PRIMARY KEY (`id`), ADD KEY `student_batch_id` (`student_batch_id`);

--
-- Indexes for table `batch`
--
ALTER TABLE `batch`
 ADD PRIMARY KEY (`batch_id`), ADD KEY `coach_id` (`coach_id`);

--
-- Indexes for table `batch_students`
--
ALTER TABLE `batch_students`
 ADD PRIMARY KEY (`id`), ADD KEY `student_id` (`student_id`), ADD KEY `batch_id` (`batch_id`);

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
 ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `center`
--
ALTER TABLE `center`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coach`
--
ALTER TABLE `coach`
 ADD PRIMARY KEY (`coach_id`);

--
-- Indexes for table `color`
--
ALTER TABLE `color`
 ADD PRIMARY KEY (`color_id`);

--
-- Indexes for table `enquiry`
--
ALTER TABLE `enquiry`
 ADD PRIMARY KEY (`enquiry_id`);

--
-- Indexes for table `fee`
--
ALTER TABLE `fee`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
 ADD PRIMARY KEY (`inventory_id`), ADD KEY `item_id` (`item_id`), ADD KEY `brand_id` (`brand_id`), ADD KEY `color_id` (`color_id`), ADD KEY `size_id` (`size_id`);

--
-- Indexes for table `inventory_history`
--
ALTER TABLE `inventory_history`
 ADD PRIMARY KEY (`id`), ADD KEY `item_id` (`item_id`), ADD KEY `brand_id` (`brand_id`), ADD KEY `color_id` (`color_id`), ADD KEY `size_id` (`size_id`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
 ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `jersy`
--
ALTER TABLE `jersy`
 ADD PRIMARY KEY (`jersy_id`), ADD KEY `brand_id` (`brand_id`), ADD KEY `color_id` (`color_id`), ADD KEY `size_id` (`size_id`);

--
-- Indexes for table `kit_items`
--
ALTER TABLE `kit_items`
 ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
 ADD PRIMARY KEY (`payment_id`), ADD KEY `student_id` (`student_id`), ADD KEY `course_id` (`course_id`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
 ADD PRIMARY KEY (`register_id`), ADD KEY `enquiry_id` (`enquiry_id`);

--
-- Indexes for table `size`
--
ALTER TABLE `size`
 ADD PRIMARY KEY (`size_id`);

--
-- Indexes for table `student_jersy`
--
ALTER TABLE `student_jersy`
 ADD PRIMARY KEY (`id`), ADD KEY `student_id` (`student_id`), ADD KEY `brand_id` (`brand_id`), ADD KEY `color_id` (`color_id`), ADD KEY `size_id` (`size_id`);

--
-- Indexes for table `student_kit`
--
ALTER TABLE `student_kit`
 ADD PRIMARY KEY (`id`), ADD KEY `student_id` (`student_id`), ADD KEY `item_id` (`item_id`), ADD KEY `brand_id` (`brand_id`), ADD KEY `color_id` (`color_id`), ADD KEY `size_id` (`size_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assign_kit`
--
ALTER TABLE `assign_kit`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `batch`
--
ALTER TABLE `batch`
MODIFY `batch_id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `batch_students`
--
ALTER TABLE `batch_students`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=54;
--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
MODIFY `brand_id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `center`
--
ALTER TABLE `center`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `coach`
--
ALTER TABLE `coach`
MODIFY `coach_id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `color`
--
ALTER TABLE `color`
MODIFY `color_id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `enquiry`
--
ALTER TABLE `enquiry`
MODIFY `enquiry_id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `fee`
--
ALTER TABLE `fee`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
MODIFY `inventory_id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=51;
--
-- AUTO_INCREMENT for table `inventory_history`
--
ALTER TABLE `inventory_history`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=72;
--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
MODIFY `item_id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `jersy`
--
ALTER TABLE `jersy`
MODIFY `jersy_id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `kit_items`
--
ALTER TABLE `kit_items`
MODIFY `item_id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
MODIFY `payment_id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
MODIFY `register_id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `size`
--
ALTER TABLE `size`
MODIFY `size_id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `student_jersy`
--
ALTER TABLE `student_jersy`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `student_kit`
--
ALTER TABLE `student_kit`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=36;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `assign_kit`
--
ALTER TABLE `assign_kit`
ADD CONSTRAINT `assign_kit_ibfk_1` FOREIGN KEY (`batch_students_id`) REFERENCES `batch_students` (`id`),
ADD CONSTRAINT `assign_kit_ibfk_2` FOREIGN KEY (`kit_item_id`) REFERENCES `kit_items` (`item_id`);

--
-- Constraints for table `attendance`
--
ALTER TABLE `attendance`
ADD CONSTRAINT `attendance_ibfk_1` FOREIGN KEY (`student_batch_id`) REFERENCES `batch_students` (`id`);

--
-- Constraints for table `batch`
--
ALTER TABLE `batch`
ADD CONSTRAINT `batch_ibfk_1` FOREIGN KEY (`coach_id`) REFERENCES `coach` (`coach_id`);

--
-- Constraints for table `batch_students`
--
ALTER TABLE `batch_students`
ADD CONSTRAINT `batch_students_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `registration` (`register_id`),
ADD CONSTRAINT `batch_students_ibfk_2` FOREIGN KEY (`batch_id`) REFERENCES `batch` (`batch_id`);

--
-- Constraints for table `inventory`
--
ALTER TABLE `inventory`
ADD CONSTRAINT `inventory_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `item` (`item_id`),
ADD CONSTRAINT `inventory_ibfk_2` FOREIGN KEY (`brand_id`) REFERENCES `brand` (`brand_id`),
ADD CONSTRAINT `inventory_ibfk_3` FOREIGN KEY (`color_id`) REFERENCES `color` (`color_id`),
ADD CONSTRAINT `inventory_ibfk_4` FOREIGN KEY (`size_id`) REFERENCES `size` (`size_id`);

--
-- Constraints for table `inventory_history`
--
ALTER TABLE `inventory_history`
ADD CONSTRAINT `inventory_history_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `item` (`item_id`),
ADD CONSTRAINT `inventory_history_ibfk_2` FOREIGN KEY (`brand_id`) REFERENCES `brand` (`brand_id`),
ADD CONSTRAINT `inventory_history_ibfk_3` FOREIGN KEY (`color_id`) REFERENCES `color` (`color_id`),
ADD CONSTRAINT `inventory_history_ibfk_4` FOREIGN KEY (`size_id`) REFERENCES `size` (`size_id`);

--
-- Constraints for table `jersy`
--
ALTER TABLE `jersy`
ADD CONSTRAINT `jersy_ibfk_1` FOREIGN KEY (`brand_id`) REFERENCES `brand` (`brand_id`),
ADD CONSTRAINT `jersy_ibfk_2` FOREIGN KEY (`color_id`) REFERENCES `color` (`color_id`),
ADD CONSTRAINT `jersy_ibfk_3` FOREIGN KEY (`size_id`) REFERENCES `size` (`size_id`);

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `registration` (`register_id`),
ADD CONSTRAINT `payment_ibfk_2` FOREIGN KEY (`course_id`) REFERENCES `fee` (`id`);

--
-- Constraints for table `registration`
--
ALTER TABLE `registration`
ADD CONSTRAINT `registration_ibfk_1` FOREIGN KEY (`enquiry_id`) REFERENCES `enquiry` (`enquiry_id`);

--
-- Constraints for table `student_jersy`
--
ALTER TABLE `student_jersy`
ADD CONSTRAINT `student_jersy_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `batch_students` (`id`),
ADD CONSTRAINT `student_jersy_ibfk_2` FOREIGN KEY (`brand_id`) REFERENCES `brand` (`brand_id`),
ADD CONSTRAINT `student_jersy_ibfk_3` FOREIGN KEY (`color_id`) REFERENCES `color` (`color_id`),
ADD CONSTRAINT `student_jersy_ibfk_4` FOREIGN KEY (`size_id`) REFERENCES `size` (`size_id`);

--
-- Constraints for table `student_kit`
--
ALTER TABLE `student_kit`
ADD CONSTRAINT `student_kit_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `batch_students` (`id`),
ADD CONSTRAINT `student_kit_ibfk_2` FOREIGN KEY (`item_id`) REFERENCES `item` (`item_id`),
ADD CONSTRAINT `student_kit_ibfk_3` FOREIGN KEY (`brand_id`) REFERENCES `brand` (`brand_id`),
ADD CONSTRAINT `student_kit_ibfk_4` FOREIGN KEY (`color_id`) REFERENCES `color` (`color_id`),
ADD CONSTRAINT `student_kit_ibfk_5` FOREIGN KEY (`size_id`) REFERENCES `size` (`size_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

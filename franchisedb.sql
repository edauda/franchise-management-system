-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 12, 2019 at 01:46 AM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `franchisedb`
--
CREATE DATABASE IF NOT EXISTS `franchisedb` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `franchisedb`;

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `id` int(6) NOT NULL,
  `user_id` int(6) NOT NULL,
  `quantity` int(6) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `branch`
--

CREATE TABLE `branch` (
  `id` int(11) NOT NULL,
  `branch_name` varchar(100) NOT NULL,
  `location` varchar(200) NOT NULL,
  `manager` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `branch`
--

INSERT INTO `branch` (`id`, `branch_name`, `location`, `manager`) VALUES
(1, 'wunti1', 'Wunti Street Bauchi', 0),
(2, 'Gwallameji', 'No 6 dass road, gwallameji opposite Federal Polytechnic Bauchi', 0);

-- --------------------------------------------------------

--
-- Table structure for table `franchises`
--

CREATE TABLE `franchises` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `franchise_name` varchar(50) NOT NULL,
  `franchise_location` varchar(200) NOT NULL,
  `owner_name` varchar(50) NOT NULL,
  `owner_number` varchar(15) NOT NULL,
  `owner_address` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `franchises`
--

INSERT INTO `franchises` (`id`, `user_id`, `franchise_name`, `franchise_location`, `owner_name`, `owner_number`, `owner_address`) VALUES
(3, 1, 'AMD Limited', 'Bank Road', 'Balla Mohammed', '813658740', 'New GRA'),
(13, 0, 'AMD Franchise', 'Wunti Dada', 'Madalla Inusa', '0813625722', 'bauchi, bauchi, nigeria'),
(14, 1, 'Kobi Cinemas', 'Ahmadu Bello Way, Bauchi', 'Gideon James', '07023606699', 'No 2 obasanjo close, rafin zurfi');

-- --------------------------------------------------------

--
-- Table structure for table `manager`
--

CREATE TABLE `manager` (
  `id` int(11) NOT NULL,
  `manager_id` varchar(50) NOT NULL,
  `branch_id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `movie`
--

CREATE TABLE `movie` (
  `movie_id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `genre` varchar(100) NOT NULL,
  `rating` varchar(50) NOT NULL,
  `price` int(6) NOT NULL,
  `description` varchar(200) NOT NULL,
  `image` varchar(50) NOT NULL,
  `main_character` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `movie`
--

INSERT INTO `movie` (`movie_id`, `title`, `genre`, `rating`, `price`, `description`, `image`, `main_character`) VALUES
(1, 'Bull Teaser', 'Action,Fantasy,Romance,Comedy', 'PG', 200, 'This is a description about the movie', 'Bull-teaser.jpg', 'Tom Cruise, Jack Matthews'),
(2, 'Beauty and the Beast', 'Adventure,Fantasy,Romance,Mystery,Saga,', 'PG 13', 0, 'The Beauty and the Beast', 'Beauty-and-the-Beast-teaser.jpg', 'Beauty, Beast'),
(3, 'Criminal Minds', 'Action,Drama,Mystery,Thriller,', 'SNVL', 300, 'Criminal Minds', 'Criminal-Minds-teaser.jpg', 'Bella Jane, John Doe'),
(4, 'American Gods', 'Adventure,Fantasy,Horror,', 'SNVL', 600, 'The American Gods Story', 'American-Gods-teaser.jpg', 'John Walker, Bruce Willis '),
(5, 'Chicago PD', 'Action,Drama,Sci-Fi,Mystery,Thriller,Tv Series,', 'SNVL', 800, 'Chicago Police Department is tested.', 'Chicago-P.D-teaser.jpg', 'Bella Jones, Luke Cage, Danny Rand');

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `id` int(11) NOT NULL,
  `movie_id` int(11) NOT NULL,
  `schedule_date` date NOT NULL,
  `schedule_time` datetime NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `staff_profile`
--

CREATE TABLE `staff_profile` (
  `id` int(6) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `oname` varchar(50) NOT NULL,
  `phone_no` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(200) NOT NULL,
  `position` varchar(200) NOT NULL,
  `location` varchar(200) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff_profile`
--

INSERT INTO `staff_profile` (`id`, `fname`, `lname`, `oname`, `phone_no`, `email`, `address`, `position`, `location`, `user_id`) VALUES
(1, 'Jonathan', 'Gideon', 'Bravo', '08096321475', 'jbgideon@gmail.com', 'New Amsterdam, United States', 'ICT Tech Assistant', 'New York', 3);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `profile_id` int(5) NOT NULL,
  `account_type` int(1) NOT NULL,
  `status` int(1) NOT NULL,
  `reset_link` varchar(50) NOT NULL,
  `creator` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `profile_id`, `account_type`, `status`, `reset_link`, `creator`) VALUES
(1, 'jbrown', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 1, 3, 1, '', 'self'),
(2, 'bsimeon', 'bdbdcd9441c0b36cf0c21754c8b017c05b5cf85e', 2, 3, 1, '', 'self'),
(3, 'superadmin', '77be4fc97f77f5f48308942bb6e32aacabed9cef', 1, 1, 1, '', 'self');

-- --------------------------------------------------------

--
-- Table structure for table `user_profile`
--

CREATE TABLE `user_profile` (
  `id` int(6) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `oname` varchar(50) NOT NULL,
  `phone_no` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(200) NOT NULL,
  `watchlist` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_profile`
--

INSERT INTO `user_profile` (`id`, `fname`, `lname`, `oname`, `phone_no`, `email`, `address`, `watchlist`) VALUES
(1, 'Jake', 'brown', 'Micheals', '0702154836', 'chub51@yahoo.com', 'Gwallameji', 0),
(2, 'Blessing', 'Simeon', 'Deji', '08132548563', 'bsimeon@yahoo.com', 'Damaturu', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `branch`
--
ALTER TABLE `branch`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `franchises`
--
ALTER TABLE `franchises`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `manager`
--
ALTER TABLE `manager`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `movie`
--
ALTER TABLE `movie`
  ADD PRIMARY KEY (`movie_id`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff_profile`
--
ALTER TABLE `staff_profile`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user_profile`
--
ALTER TABLE `user_profile`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `branch`
--
ALTER TABLE `branch`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `franchises`
--
ALTER TABLE `franchises`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `manager`
--
ALTER TABLE `manager`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `movie`
--
ALTER TABLE `movie`
  MODIFY `movie_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `staff_profile`
--
ALTER TABLE `staff_profile`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `user_profile`
--
ALTER TABLE `user_profile`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

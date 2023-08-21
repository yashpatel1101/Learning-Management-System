-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 03, 2023 at 07:51 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lms_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admission`
--

CREATE TABLE `admission` (
  `id` int(11) NOT NULL,
  `name` varchar(30) DEFAULT NULL,
  `email` varchar(40) DEFAULT NULL,
  `phone` bigint(20) DEFAULT NULL,
  `message` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admission`
--

INSERT INTO `admission` (`id`, `name`, `email`, `phone`, `message`) VALUES
(8, 'jay', 'jay@gmail.com', 7894612312, 'admission'),
(9, 'Yash', 'yash@gmail.com', 9876543211, 'Hello Sir, I need admission'),
(10, 'Mukund Tapaniya', 'mdtapaniya@gmail.com', 7984561231, 'i want admission');

-- --------------------------------------------------------

--
-- Table structure for table `announcement`
--

CREATE TABLE `announcement` (
  `id` int(11) NOT NULL,
  `title` varchar(100) DEFAULT NULL,
  `description` varchar(500) DEFAULT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `announcement`
--

INSERT INTO `announcement` (`id`, `title`, `description`, `date`) VALUES
(5, 'Viva', 'Viva next week', '2023-05-07'),
(6, 'Annual Function ', 'UVPCE Annual Function \r\nVenue: Open Air Theater\r\n\r\n\r\n', '2023-04-21');

-- --------------------------------------------------------

--
-- Table structure for table `assignment`
--

CREATE TABLE `assignment` (
  `id` int(11) NOT NULL,
  `subject` varchar(30) DEFAULT NULL,
  `title` varchar(100) DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `assignment`
--

INSERT INTO `assignment` (`id`, `subject`, `title`, `file`) VALUES
(1, 'TOC', 'Assignment', 'Sample1.pdf'),
(2, 'CC', 'Assignment2', 'Sample2.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `id` int(11) NOT NULL,
  `subject` varchar(30) DEFAULT NULL,
  `title` varchar(100) DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `files`
--

INSERT INTO `files` (`id`, `subject`, `title`, `file`) VALUES
(11, 'TOC', 'NFA to DFA', 'Sample1.pdf'),
(12, 'AI', 'DFA', 'Sample2.pdf'),
(19, 'CC', 'hadoop', 'Sample3.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `grade`
--

CREATE TABLE `grade` (
  `id` int(10) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `subject` varchar(30) DEFAULT NULL,
  `gain_marks` int(10) DEFAULT NULL,
  `out_of_marks` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `grade`
--

INSERT INTO `grade` (`id`, `username`, `subject`, `gain_marks`, `out_of_marks`) VALUES
(1, '20012011136', 'TOC', 10, 20),
(2, '20012011137', 'TOC', 11, 20),
(33, '20012011136', 'UI', 11, 20);

-- --------------------------------------------------------

--
-- Table structure for table `leaves`
--

CREATE TABLE `leaves` (
  `lid` int(11) NOT NULL,
  `username` varchar(20) DEFAULT NULL,
  `subject` varchar(500) DEFAULT NULL,
  `message` varchar(500) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `leaves`
--

INSERT INTO `leaves` (`lid`, `username`, `subject`, `message`, `date`, `status`) VALUES
(14, '20012011136', 'Apply leave for marrige', 'I have brother marrige on 20/4/23', '2023-04-16', 'Approve'),
(15, '20012011136', 'Apply leave for illness', 'i am suffering from fever. So i need 2 days leave', '2023-04-15', 'Approve'),
(16, '20012011137', 'Apply leave for trip', 'Apply leave for trip for week', '2023-04-29', 'Reject'),
(19, '20012011136', 'Apply leave for illness', 'maleria', '2023-04-14', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `tid` int(11) NOT NULL,
  `uid` int(12) DEFAULT NULL,
  `subject` varchar(50) DEFAULT NULL,
  `description` varchar(500) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`tid`, `uid`, `subject`, `description`, `start_date`, `end_date`, `status`) VALUES
(20, 16, 'Cloud Computing', 'Assignment-3', '2023-04-18', '2023-04-30', 'Incomplete'),
(21, 17, 'TOC', 'Calculate sum of NFA', '2023-04-14', '2023-04-27', 'Incomplete'),
(22, 17, 'DAA', 'Prepare selection sort', '2023-04-17', '2023-05-27', 'Incomplete');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `phone` bigint(20) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `usertype` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `description` varchar(100) DEFAULT NULL,
  `image` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `phone`, `email`, `usertype`, `password`, `description`, `image`) VALUES
(1, 'admin', 9865432112, 'yash136@gmail.com', 'admin', '123', NULL, NULL),
(6, '20012011136', 9865432112, 'yash136@gmail.com', 'student', '123', NULL, NULL),
(7, '20012011137', 9876543211, 'yashs@gmail.com', 'student', '123', NULL, NULL),
(16, 'Hetal', 9876543211, 'Hetal@gmail.com', 'teacher', '123', 'Maths                                                        ', 'image/t2.jpg'),
(17, 'Bhargav', 8894561331, 'Bhargav123@gmail.com', 'teacher', '123', 'Physics', 'image/t3.jpg'),
(171, 'Dhaval', 7894561231, 'dhaval@gmail.com', 'teacher', '123', 'Chemistry', 'image/t4.jpg'),
(173, '20012011098', 789461231, 'jay@gmail.com', 'student', '123', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admission`
--
ALTER TABLE `admission`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `announcement`
--
ALTER TABLE `announcement`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assignment`
--
ALTER TABLE `assignment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `grade`
--
ALTER TABLE `grade`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leaves`
--
ALTER TABLE `leaves`
  ADD PRIMARY KEY (`lid`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`tid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admission`
--
ALTER TABLE `admission`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `announcement`
--
ALTER TABLE `announcement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `assignment`
--
ALTER TABLE `assignment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `grade`
--
ALTER TABLE `grade`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `leaves`
--
ALTER TABLE `leaves`
  MODIFY `lid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `tid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=174;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

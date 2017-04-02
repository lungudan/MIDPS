-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 24, 2017 at 10:52 PM
-- Server version: 5.7.16
-- PHP Version: 5.6.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `se`
--

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `user_id` int(5) NOT NULL,
  `first_name` varchar(25) NOT NULL,
  `last_name` varchar(25) NOT NULL,
  `email` varchar(50) NOT NULL,
  `position` varchar(25) NOT NULL,
  `office` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`user_id`, `first_name`, `last_name`, `email`, `position`, `office`) VALUES
(1, 'Ashton', 'Bradshaw', 'ashtonbrad@mail.com', 'Software Engineer', 'Florida'),
(2, 'Garrett', 'Winters', 'garrettwin@mail.com', 'Sales Assistant', 'Singapore'),
(3, 'Jackson', 'Silva', 'jacksilva@mail.com', 'Support Engineer', 'New York'),
(4, 'Jenette', 'Caldwell', 'jenettewell@mail.com', 'Director', 'London'),
(5, 'Rhona', 'Walton', 'rhonawalt@mail.com', 'System Architect', 'San Francisco'),
(6, 'Aleona', 'Hu', 'aleona.hu@mail.ru', 'System Architect', 'New York');

-- --------------------------------------------------------

--
-- Table structure for table `signup_and_login_users_table`
--

CREATE TABLE `signup_and_login_users_table` (
  `id` int(100) NOT NULL,
  `fullname` varchar(200) NOT NULL,
  `username` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `user_levels` varchar(200) NOT NULL,
  `date` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(15) NOT NULL,
  `user_email` varchar(40) NOT NULL,
  `user_pass` varchar(255) NOT NULL,
  `joining_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_email`, `user_pass`, `joining_date`) VALUES
(1, 'wideru', 'unreal961@gmail.com', '$2y$10$Kh.tRwfWI1OW2w610WEcsuVR/NqFhWd2wTOHXesT2UFBU0/.YHjSq', '2017-03-24 22:19:51'),
(2, 'adsafa', 'udafs@mail.md', '$2y$10$NyOD3FdWqynhjb.0t1WJjeQSWPv51WtccdWajE3TCc37PzqYu9/IK', '2017-03-24 22:47:57');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `signup_and_login_users_table`
--
ALTER TABLE `signup_and_login_users_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `signup_and_login_users_table`
--
ALTER TABLE `signup_and_login_users_table`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

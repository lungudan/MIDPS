--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `user_id` int(5) NOT NULL,
  `first_name` varchar(25) NOT NULL,
  `last_name` varchar(25) NOT NULL,
  `email` varchar(50) NOT NULL,
  `position` varchar(25) NOT NULL,
  `grupa` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`user_id`, `first_name`, `last_name`, `email`, `position`, `grupa`) VALUES
(8, 'Lungu', 'Dan', 'l.dan@gmail.com', 'Tehnologii Informationale', 'TI-151'),
(9, 'Ivan', 'Ivasisin', 'ivan.ivasisin@mail.com', 'Tehnologii Informationale', 'TI-151'),
(10, 'Moraru', 'Dumitru', 'moraru@mail.com', 'Tehnologii Informationale', 'TI-151');

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
(1, 'wideru', 'unreal961@gmail.com', '$2y$10$Kh.tRwfWI1OW2w610WEcsuVR/NqFhWd2wTOHXesT2UFBU0/.YHjSq', '2017-03-24 20:19:51'),
(2, 'adsafa', 'udafs@mail.md', '$2y$10$NyOD3FdWqynhjb.0t1WJjeQSWPv51WtccdWajE3TCc37PzqYu9/IK', '2017-03-24 20:47:57');



-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 22, 2017 at 01:15 AM
-- Server version: 5.7.16
-- PHP Version: 5.6.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laborator5`
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
  `grupa` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`user_id`, `first_name`, `last_name`, `email`, `position`, `grupa`) VALUES
(8, 'Lungu', 'Dan', 'l.dan@gmail.com', 'Tehnologii Informationale', 'TI-151'),
(10, 'Moraru', 'Dumitru', 'moraru@mail.com', 'Tehnologii Informationale', 'TI-151');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `news_id` int(5) NOT NULL,
  `title` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `author` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `short` varchar(555) CHARACTER SET utf8 DEFAULT NULL,
  `full` text CHARACTER SET utf8,
  `date` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`news_id`, `title`, `author`, `short`, `full`, `date`) VALUES
(10, 'Ce este Lorem Ipsum?', 'testare', 'Lorem Ipsum este pur ÅŸi simplu o machetÄƒ pentru text a industriei tipografice. Lorem Ipsum a fost macheta standard a industriei Ã®ncÄƒ din secolul al XVI-lea, cÃ¢nd un tipograf anonim a luat o planÅŸetÄƒ de litere ÅŸi le-a amestecat pentru a crea o carte demonstrativÄƒ pentru literele respective.', 'Lorem Ipsum este pur ÅŸi simplu o machetÄƒ pentru text a industriei tipografice. Lorem Ipsum a fost macheta standard a industriei Ã®ncÄƒ din secolul al XVI-lea, cÃ¢nd un tipograf anonim a luat o planÅŸetÄƒ de litere ÅŸi le-a amestecat pentru a crea o carte demonstrativÄƒ pentru literele respective. Nu doar cÄƒ a supravieÅ£uit timp de cinci secole, dar ÅŸi a facut saltul Ã®n tipografia electronicÄƒ practic neschimbatÄƒ. A fost popularizatÄƒ Ã®n anii \'60 odatÄƒ cu ieÅŸirea colilor Letraset care conÅ£ineau pasaje Lorem Ipsum, iar mai recent, prin programele de publicare pentru calculator, ca Aldus PageMaker care includeau versiuni de Lorem Ipsum.', '2017-05-21 20:57:21'),
(11, 'De ce Ã®l folosim?', 'wideru', 'E un fapt bine stabilit cÄƒ cititorul va fi sustras de conÅ£inutul citibil al unei pagini atunci cÃ¢nd se uitÄƒ la aÅŸezarea Ã®n paginÄƒ. Scopul utilizÄƒrii a Lorem Ipsum', 'E un fapt bine stabilit cÄƒ cititorul va fi sustras de conÅ£inutul citibil al unei pagini atunci cÃ¢nd se uitÄƒ la aÅŸezarea Ã®n paginÄƒ. Scopul utilizÄƒrii a Lorem Ipsum, este acela cÄƒ are o distribuÅ£ie a literelor mai mult sau mai puÅ£in normale, faÅ£Äƒ de utilizarea a ceva de genul "ConÅ£inut aici, conÅ£inut acolo", fÄƒcÃ¢ndu-l sÄƒ arate ca o englezÄƒ citibilÄƒ. Multe pachete de publicare pentru calculator ÅŸi editoare de pagini web folosesc acum Lorem Ipsum ca model standard de text, iar o cautare de "lorem ipsum" va rezulta Ã®n o mulÅ£ime de site-uri web Ã®n dezvoltare. Pe parcursul anilor, diferite versiuni au evoluat, uneori din intÃ¢mplare,', '2017-05-21 21:09:05'),
(12, 'De unde pot sa-l iau ÅŸi eu?', 'test', 'ExistÄƒ o mulÅ£ime de variaÅ£ii disponibile ale pasajelor Lorem Ipsum, dar majoritatea lor au suferit alterÄƒri Ã®ntr-o oarecare mÄƒsurÄƒ prin infiltrare de elemente de umor, sau de cuvinte luate aleator, care nu sunt cÃ¢tuÅŸi de puÅ£in credibile.', 'ExistÄƒ o mulÅ£ime de variaÅ£ii disponibile ale pasajelor Lorem Ipsum, dar majoritatea lor au suferit alterÄƒri Ã®ntr-o oarecare mÄƒsurÄƒ prin infiltrare de elemente de umor, sau de cuvinte luate aleator, care nu sunt cÃ¢tuÅŸi de puÅ£in credibile. Daca vreÅ£i sÄƒ folosiÅ£i un pasaj de Lorem Ipsum, trebuie sÄƒ vÄƒ asiguraÅ£i cÄƒ nu conÅ£ine nimic stÃ¢njenitor ascuns printre randuri. Toate generatoarele de Lorem Ipsum de pe Internet tind sÄƒ repete bucÄƒÅ£i de text Ã®n funcÅ£ie de necesitate, astfel fÄƒcÃ¢ndu-l pe acesta primul generator adevarat de pe Internet. El utilizeazÄƒ un dicÅ£ionar de peste 200 cuvinte din latina, combinate cu o cantitate considerabilÄƒ de modele de structuri de propoziÅ£ii, pentru a genera Lorem Ipsum care aratÄƒ decent. Astfel, Lorem Ipsum-ul generat nu conÅ£ine repetiÅ£ii, infiltrÄƒri de elemente', '2017-05-21 22:08:21');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(15) NOT NULL,
  `user_email` varchar(40) NOT NULL,
  `user_pass` varchar(255) NOT NULL,
  `name` varchar(32) CHARACTER SET utf8 DEFAULT NULL,
  `prename` varchar(32) CHARACTER SET utf8 DEFAULT NULL,
  `avatar` varchar(255) CHARACTER SET utf8 DEFAULT 'default.jpg',
  `user_profession` varchar(255) DEFAULT NULL,
  `user_dob` date DEFAULT NULL,
  `user_address` varchar(255) DEFAULT NULL,
  `user_gender` varchar(255) DEFAULT NULL,
  `user_country` varchar(255) DEFAULT NULL,
  `level` int(1) NOT NULL DEFAULT '1',
  `joining_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_email`, `user_pass`, `name`, `prename`, `avatar`, `user_profession`, `user_dob`, `user_address`, `user_gender`, `user_country`, `level`, `joining_date`) VALUES
(6, 'wideru', 'unreal961@gmail.com', '$2y$10$sJa3IWTXc.hxCj4D1ENqfux.8HdoEurh2HAWhX8.Qgd4v4ygQmNxC', 'Lungu', 'Dan', 'john-small-300533960.jpg', 'Inginer', '1996-08-11', 'str.Zelinski 37/5', 'Male', 'Moldova', 2, '2017-05-21 18:28:05'),
(7, 'testare', 'testare@test.com', '$2y$10$ka8QgsaCznRFpOlJ1DFtoO0VMIFb2HmXHLgotnONlHak2xNuYHsyO', 'Testare', 'Test', 'army-war-click-on-picture-to-en-large-and-2155963-681666446.jpg', 'Aviator', '1995-05-12', 'Bucuresti', 'Male', 'Romania', 1, '2017-05-21 19:53:58'),
(8, 'test', 'test@mail.ru', '$2y$10$awbVPOzz4qNkXnWIggbJeukGAzI1XO9sDtsFP42TelAoT.n9oYq5m', 'test', 'test', 'john-small-288442029.jpg', 'Inginer', '1996-08-11', 'Chisinau', 'ÐœÑƒÐ¶ÑÐºÐ¾Ð¹', 'Moldova', 1, '2017-05-21 22:05:22');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD UNIQUE KEY `user_id` (`user_id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD UNIQUE KEY `news_id` (`news_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD UNIQUE KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `user_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `news_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

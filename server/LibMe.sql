-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 30, 2021 at 05:39 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lms_test`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(250) NOT NULL,
  `mobile` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `mobile`) VALUES
(1, 'Bennett', 'kev@mail.com', '$2y$10$MeS3sK/uxs62Q.dWwkla5u5C5Q.rbzWWMoQqfih6SQ5kRtU9Owike', 1231231234),
(2, 'Muhammad Ali', 'bacon_guy1412@protonmail.com', '$2y$10$BF3Y6jjhyyC.GnDYJLxu7OkHIIMG//elWsPEphM.rFbpU65OIe5Z.', 1231231234);

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `B_NO` int(11) NOT NULL,
  `ISBN` int(13) DEFAULT NULL,
  `BOOK_NAME` varchar(100) DEFAULT NULL,
  `AUTHOR` varchar(100) DEFAULT NULL,
  `PUBLISHER_NAME` varchar(50) DEFAULT NULL,
  `CATEGORY_NAME` varchar(30) DEFAULT NULL,
  `COPIES` int(12) DEFAULT NULL,
  `AVAILABLE_COPIES` int(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`B_NO`, `ISBN`, `BOOK_NAME`, `AUTHOR`, `PUBLISHER_NAME`, `CATEGORY_NAME`, `COPIES`, `AVAILABLE_COPIES`) VALUES
(33, 123123, 'book42', 'Jane Doe', 'Doe Publications', 'computer science', 3, 3),
(37, 123123, 'book5', 'Jane Doe', 'Doe Publications', 'computer science', 2, NULL),
(43, 123131, 'book7', 'Jane Doe', 'Doe publications', 'cs', 4, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `issues`
--

CREATE TABLE `issues` (
  `issue_id` int(11) NOT NULL,
  `b_no` int(11) NOT NULL,
  `borrower` int(10) UNSIGNED NOT NULL,
  `issuer` int(11) NOT NULL,
  `date_of_issue` date NOT NULL,
  `date_of_return` date NOT NULL,
  `fine` int(11) NOT NULL DEFAULT 0,
  `returned` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `issues`
--

INSERT INTO `issues` (`issue_id`, `b_no`, `borrower`, `issuer`, `date_of_issue`, `date_of_return`, `fine`, `returned`) VALUES
(1, 33, 5, 1, '2021-05-28', '2021-06-11', 0, 1),
(5, 37, 6, 1, '2021-05-28', '2021-06-11', 9, 0);

-- --------------------------------------------------------

--
-- Table structure for table `pwdreset`
--

CREATE TABLE `pwdreset` (
  `pwdResetId` int(11) NOT NULL,
  `pwdResetEmail` text NOT NULL,
  `pwdResetSelector` text NOT NULL,
  `pwdResetToken` longtext NOT NULL,
  `pwdResetExpires` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pwdreset`
--

INSERT INTO `pwdreset` (`pwdResetId`, `pwdResetEmail`, `pwdResetSelector`, `pwdResetToken`, `pwdResetExpires`) VALUES
(25, 'benq@mail.com', '3083f26ca5ba13c1', '$2y$10$a1ORINTkrJ/rOLVq3BUq9ebtjuXyk4P7qb3ELazDf8IJNFNW78TEy', '1620497698');

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE `requests` (
  `Name` varchar(100) NOT NULL,
  `Book` varchar(100) NOT NULL,
  `Author` varchar(100) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` mediumtext NOT NULL,
  `mobile` varchar(10) DEFAULT NULL,
  `staff` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `mobile`, `staff`) VALUES
(5, 'jake ', 'jake@gmail.com', '$2y$10$KxXop3gPdAkEWxaDCkHKyOufVE.OzljoQ5kmxfkJ6SLXyrDuvHv7m', '9999223222', 0),
(6, 'robin james', 'robin@mail.com', '$2y$10$z4R9b43evGv3EX8KnSJl/uZg56mlz/VRia/6MkJZOgiWEIKlxbzJK', '1231231234', 1),
(7, 'james', 'james@mail.com', '$2y$10$rnfRdW6sTo5U3S1aEW5NBe8Mwd72PR3GP12CsBelJ.MN/TVmC7dhW', '1234123123', 0),
(8, 'benn', 'bacon_guy1412@protonmail.com', '$2y$10$jKTcadsUeED7CBhCJkfjF.El36uG9qqs4yrU/.ldmrXtw3wve44bC', '9999223222', 0),
(10, 'shithead', 'shit@mail.com', '$2y$10$sAFUMtej8pjDniQJL1DHU.KryV1o8WZlGbrYVgfyHbGkhqVUEKO3a', '1231231234', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`B_NO`);

--
-- Indexes for table `issues`
--
ALTER TABLE `issues`
  ADD PRIMARY KEY (`issue_id`),
  ADD KEY `b_no` (`b_no`),
  ADD KEY `borrower` (`borrower`),
  ADD KEY `issuer` (`issuer`);

--
-- Indexes for table `pwdreset`
--
ALTER TABLE `pwdreset`
  ADD PRIMARY KEY (`pwdResetId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `B_NO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `issues`
--
ALTER TABLE `issues`
  MODIFY `issue_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pwdreset`
--
ALTER TABLE `pwdreset`
  MODIFY `pwdResetId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `issues`
--
ALTER TABLE `issues`
  ADD CONSTRAINT `issues_ibfk_1` FOREIGN KEY (`b_no`) REFERENCES `books` (`B_NO`),
  ADD CONSTRAINT `issues_ibfk_2` FOREIGN KEY (`borrower`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `issues_ibfk_3` FOREIGN KEY (`issuer`) REFERENCES `admins` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

--event to update the fine 
CREATE EVENT test_fine
on SCHEDULE EVERY 5 MINUTE 
STARTS CURRENT_TIMESTAMP
DO
UPDATE issues i 
Inner JOIN users u 
on i.borrower = u.id set i.fine = i.fine + 10
where i.returned = 0 AND u.staff = 0;

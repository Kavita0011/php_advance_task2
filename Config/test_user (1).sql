-- phpMyAdmin SQL Dump
-- version 4.6.6deb5ubuntu0.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 13, 2023 at 06:28 PM
-- Server version: 5.7.42-0ubuntu0.18.04.1
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test_user`
--

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_email_id` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `user_email_id`, `password`) VALUES
(1, 'Aditi', 'Aditi@gmail.com', '423edcd'),
(2, 'Aditya', 'Aditya@gmail.com', 'de3w43dfe'),
(3, 'Amishika', 'Amishika@gmail.com', 'dsr456'),
(4, 'Anisha', 'Anisha@gmail.com', '45rfedf'),
(5, 'Ajay', 'Ajay@gmail.com', 'rey56'),
(6, 'Amita', 'amita12@gmail.com', '54efre4'),
(7, 'Aakash', 'Aakash@gmail.com', 'er45rf'),
(8, 'Arpita', 'Arpita@gmail.com', '34rnfr'),
(9, 'Arijit', 'Arijit@gmail.com', 'g5tgf'),
(10, 'Bhawana', 'Bhawana@gmail.com', 'd34rdedf');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

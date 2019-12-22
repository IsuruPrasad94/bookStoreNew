-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 22, 2019 at 02:53 AM
-- Server version: 10.1.39-MariaDB
-- PHP Version: 7.1.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bookstore`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `Name` varchar(150) NOT NULL,
  `Category` varchar(50) NOT NULL,
  `Author` varchar(100) NOT NULL,
  `Year` varchar(10) NOT NULL,
  `Price` int(11) NOT NULL,
  `ISBN` varchar(100) NOT NULL,
  `Medium` varchar(20) NOT NULL,
  `Image` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`Name`, `Category`, `Author`, `Year`, `Price`, `ISBN`, `Medium`, `Image`) VALUES
('Test1', 'Science', 'Martin', '2019', 1500, '12112-erty-1234-rtsw', 'Tamil', '1576869821_home_img.jpg'),
('Sapekshawadaya', 'Psychology', 'Dennis', '2005', 300, '1223-dfdf-2342-sfsa', 'Sinhala', '1576845271_1576839845_SB 0016259.jpg'),
('Annual Trade Marks', 'Accounting', 'Dencil', '2010', 1030, '1232-sjsd-4342-3734', 'English', '1576845223_bk173965.jpg'),
('Madol Duwa', 'Short Stories', 'Martin Wickramasinghe', '1947', 100, '1234-qwert-1256-ajsh', 'Sinhala', 'madol.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `u_id` int(11) NOT NULL,
  `u_name` varchar(100) NOT NULL,
  `u_email` varchar(100) NOT NULL,
  `u_pwrd` varchar(100) NOT NULL,
  `u_status` varchar(100) NOT NULL DEFAULT 'Out'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`u_id`, `u_name`, `u_email`, `u_pwrd`, `u_status`) VALUES
(1, 'Test', 'test@gmail.com', '123456', 'Out');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD UNIQUE KEY `ISBN` (`ISBN`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`u_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

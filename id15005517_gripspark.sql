-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 08, 2020 at 09:00 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id15005517_gripspark`
--

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `ID` int(20) NOT NULL,
  `Sender` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Receiver` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Credits` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`ID`, `Sender`, `Receiver`, `Credits`) VALUES
(15, 'Rekha', 'Sudha', 1500),
(16, 'Himani', 'Bansi', 200),
(17, 'Rekha', 'Purvi', 300),
(18, 'mishti', 'Priya', 1000);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `Name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Credits` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`Name`, `Email`, `Credits`) VALUES
('Himani', 'Himani.@gmail.com', 1300),
('Rekha', 'rekha.@gmail.com', 800),
('Bansi', 'bansi@gmail.com', 6200),
('Sudha', 'suda@gmail.com', 2700),
('Kiki', 'kiki@gmail.com', 9000),
('Priya', 'priya@gmail.com', 2500),
('Purvi', 'purvi@gmail.com', 2900),
('Rahul', 'rahul@gmail.com', 1200),
('Mehul', 'mehul@gmail.com', 9000),
('Rinku', 'rinku@gmail.com', 8500),
('Sahil', 'sahil@gmail.com', 3000),
('Sawan', 'sawan@gmail.com', 4000),
('Vipul', 'vipul@gmail.com', 8000),
('Rohan', 'rohan@gmail.com', 10000),
('mishti', 'mishti@gmail.com', 19000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `ID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

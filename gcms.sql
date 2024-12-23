-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3310
-- Generation Time: Feb 26, 2024 at 06:13 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gcms`
--
CREATE DATABASE IF NOT EXISTS `gcms` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `gcms`;

-- --------------------------------------------------------

--
-- Table structure for table `computer`
--
-- Creation: Feb 22, 2024 at 09:42 PM
--

DROP TABLE IF EXISTS `computer`;
CREATE TABLE `computer` (
  `computer_id` int(5) NOT NULL,
  `computer_name` varchar(50) NOT NULL,
  `computer_type` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- RELATIONSHIPS FOR TABLE `computer`:
--

--
-- Dumping data for table `computer`
--

INSERT INTO `computer` (`computer_id`, `computer_name`, `computer_type`, `status`) VALUES
(1, 'PC', 'Esports Level PC', 'Available'),
(2, 'RPC1', 'Regular PC', 'Available'),
(3, 'GPC1', 'Gaming PC', 'Available'),
(4, 'PS1', 'Playstation 5', 'Available'),
(5, 'HEG1', 'High End Gaming PC', 'Available');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--
-- Creation: Feb 22, 2024 at 08:39 PM
--

DROP TABLE IF EXISTS `customer`;
CREATE TABLE `customer` (
  `customer_id` int(5) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `email` varchar(150) NOT NULL,
  `phone` bigint(10) NOT NULL,
  `membership_id` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- RELATIONSHIPS FOR TABLE `customer`:
--

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `fullname`, `username`, `gender`, `email`, `phone`, `membership_id`) VALUES
(1, 'Chirag Pandit', 'CapttainChirag2511', 'Male', 'ck251101@gmail.com', 9664626735, NULL),
(2, 'Zeny Patel', 'Mitsuri3112', 'Female', 'zenpnp2113@gmail.com', 7226885883, NULL),
(7, 'Dev Makwana', 'dev1_618', 'Male', 'devmakwana@gmail.com', 7574922638, NULL),
(8, 'Shaunak', 'mr_shnk', 'Male', 'shaunakkariya@gmail.com', 7394055555, NULL),
(11, 'Vishwajeet Biradar', 'vb_noob69', 'Male', 'vishwajeet@gmail.com', 9999988888, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `games`
--
-- Creation: Feb 25, 2024 at 04:43 PM
--

DROP TABLE IF EXISTS `games`;
CREATE TABLE `games` (
  `game_id` int(5) NOT NULL,
  `title` varchar(200) NOT NULL,
  `genre` varchar(200) NOT NULL,
  `platform` varchar(200) NOT NULL,
  `price_per_hour` float NOT NULL,
  `computer_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- RELATIONSHIPS FOR TABLE `games`:
--   `computer_id`
--       `computer` -> `computer_id`
--   `computer_id`
--       `computer` -> `computer_id`
--

--
-- Dumping data for table `games`
--

INSERT INTO `games` (`game_id`, `title`, `genre`, `platform`, `price_per_hour`, `computer_id`) VALUES
(1, 'Valorant', 'FPS', 'PC', 100, 3),
(35, 'Overwatch', 'FPS', 'PC', 100, 2),
(36, 'Call of Duty Warzone', 'Battle Royale', 'PC', 120, 5),
(37, 'Call of Duty Warzone', 'Battle Royale', 'PC', 120, 5);

-- --------------------------------------------------------

--
-- Table structure for table `session`
--
-- Creation: Feb 22, 2024 at 09:53 PM
--

DROP TABLE IF EXISTS `session`;
CREATE TABLE `session` (
  `session_id` int(5) NOT NULL,
  `customer_id` int(5) NOT NULL,
  `computer_id` int(5) NOT NULL,
  `start_time` datetime NOT NULL,
  `end_time` datetime NOT NULL,
  `amount_paid` float NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- RELATIONSHIPS FOR TABLE `session`:
--   `computer_id`
--       `computer` -> `computer_id`
--   `customer_id`
--       `customer` -> `customer_id`
--   `customer_id`
--       `customer` -> `customer_id`
--   `computer_id`
--       `computer` -> `computer_id`
--

--
-- Dumping data for table `session`
--

INSERT INTO `session` (`session_id`, `customer_id`, `computer_id`, `start_time`, `end_time`, `amount_paid`, `status`) VALUES
(1, 1, 1, '2024-02-26 22:00:00', '2024-02-26 00:00:00', 1000, 'Paid');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--
-- Creation: Feb 22, 2024 at 10:11 PM
--

DROP TABLE IF EXISTS `transactions`;
CREATE TABLE `transactions` (
  `transaction_id` int(5) NOT NULL,
  `customer_id` int(5) NOT NULL,
  `game_id` int(5) NOT NULL,
  `session_id` int(5) NOT NULL,
  `quantity` int(10) NOT NULL,
  `total_amount` float NOT NULL,
  `transaction_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- RELATIONSHIPS FOR TABLE `transactions`:
--   `customer_id`
--       `customer` -> `customer_id`
--   `game_id`
--       `games` -> `game_id`
--   `session_id`
--       `session` -> `session_id`
--

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`transaction_id`, `customer_id`, `game_id`, `session_id`, `quantity`, `total_amount`, `transaction_date`) VALUES
(1, 1, 35, 1, 1, 1000, '2024-02-26'),
(2, 1, 35, 1, 1, 1000, '2024-02-26');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `computer`
--
ALTER TABLE `computer`
  ADD PRIMARY KEY (`computer_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `games`
--
ALTER TABLE `games`
  ADD PRIMARY KEY (`game_id`),
  ADD KEY `games_ibfk_1` (`computer_id`);

--
-- Indexes for table `session`
--
ALTER TABLE `session`
  ADD PRIMARY KEY (`session_id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `computer_id` (`computer_id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`transaction_id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `game_id` (`game_id`),
  ADD KEY `session_id` (`session_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `computer`
--
ALTER TABLE `computer`
  MODIFY `computer_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `games`
--
ALTER TABLE `games`
  MODIFY `game_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `session`
--
ALTER TABLE `session`
  MODIFY `session_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `transaction_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `games`
--
ALTER TABLE `games`
  ADD CONSTRAINT `games_ibfk_1` FOREIGN KEY (`computer_id`) REFERENCES `computer` (`computer_id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `session`
--
ALTER TABLE `session`
  ADD CONSTRAINT `session_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `session_ibfk_2` FOREIGN KEY (`computer_id`) REFERENCES `computer` (`computer_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`),
  ADD CONSTRAINT `transactions_ibfk_2` FOREIGN KEY (`game_id`) REFERENCES `games` (`game_id`),
  ADD CONSTRAINT `transactions_ibfk_3` FOREIGN KEY (`session_id`) REFERENCES `session` (`session_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

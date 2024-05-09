-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 17, 2024 at 07:50 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pharmacy`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`, `image`) VALUES
(1, 'admin', 'admin@gmail.com', '123', 'th.jpg? v=1654778');

-- --------------------------------------------------------

--
-- Table structure for table `corder`
--

CREATE TABLE `corder` (
  `id` int(11) NOT NULL,
  `email` varchar(20) NOT NULL,
  `p_id` int(11) NOT NULL,
  `name` varchar(25) NOT NULL,
  `price` int(11) NOT NULL,
  `date` date NOT NULL,
  `image` text NOT NULL,
  `orderId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `corder`
--

INSERT INTO `corder` (`id`, `email`, `p_id`, `name`, `price`, `date`, `image`, `orderId`) VALUES
(1, 'kavya@gmail.com', 6, 'Medicine 6', 25, '2024-04-10', '11.jpg? v=165788', 1),
(2, 'kavya@gmail.com', 7, 'Medicine 7', 40, '2024-04-11', 'WhatsApp Image 2024-03-18 at 16.27.33_eceb08c1.jpg? v=1657787', 2);

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `email` varchar(20) NOT NULL,
  `name` varchar(25) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `time` time(3) DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id`, `p_id`, `price`, `quantity`, `email`, `name`, `date`, `time`) VALUES
(1, 6, 25, 2, 'kavya@gmail.com', 'Medicine 6', '2024-04-10', '10:44:36.000'),
(2, 7, 40, 2, 'kavya@gmail.com', 'Medicine 7', '2024-04-11', '10:44:36.000'),
(3, 1, 10, 1, 'kavya@gmail.com', 'Medicine 1', '2024-04-11', '10:44:36.000'),
(4, 2, 15, 1, 'kavya@gmail.com', 'Medicine 2', '2024-04-10', '10:44:36.000'),
(6, 3, 20, 1, 'kavya@gmail.com', 'Medicine 3', '2024-04-11', '10:44:36.000'),
(7, 2, 15, 1, 'kavya@gmail.com', 'Medicine 2', '2024-04-12', '10:44:36.000'),
(8, 1, 10, 1, 'admin@gmail.com', 'Medicine 1', '2024-04-12', '10:44:36.000'),
(9, 4, 25, 1, 'kavya@gmail.com', 'Medicine 4', '2024-04-12', '10:44:36.000'),
(10, 3, 20, 1, 'kavya@gmail.com', 'Psychotil 5', '2024-04-12', '10:44:36.000'),
(11, 1, 10, 0, 'kavya@gmail.com', 'Paracetamol IP650 mg', '2024-04-13', '10:44:36.000'),
(12, 4, 25, 2, 'kavya@gmail.com', 'Wellpar-125', '2024-04-13', '10:44:36.000'),
(13, 8, 45, 10, 'kavya@gmail.com', 'Saridon', '2024-04-14', '10:44:36.000'),
(14, 7, 40, 1, 'kavya@gmail.com', 'Insulin', '2024-04-14', '10:44:36.000'),
(15, 9, 50, 1, 'kavya@gmail.com', 'Benzoyl Peroxide', '2024-04-14', '10:44:36.000'),
(16, 10, 55, 1, 'kavya@gmail.com', 'Okacet Cold', '2024-04-14', '10:44:36.000'),
(17, 1, 10, 10, 'kavya@gmail.com', 'Paracetamol IP650 mg', '2024-04-14', '10:44:36.000'),
(18, 2, 15, 1, 'kavya@gmail.com', 'Band aid', '2024-04-14', '10:44:36.000'),
(19, 2, 15, 1, 'kavya@gmail.com', 'Band aid', '2024-04-14', '10:44:36.000'),
(20, 11, 25, 1, 'kavya@gmail.com', 'Paxlovid', '2024-04-14', '10:44:36.000'),
(21, 3, 20, 1, 'kavya@gmail.com', 'Psychotil 5', '2024-04-14', '10:44:36.000'),
(22, 2, 15, 1, 'kavya@gmail.com', 'Band aid', '2024-04-14', '10:44:36.000'),
(23, 2, 15, 1, 'kavya@gmail.com', 'Band aid', '2024-04-15', '10:44:36.000'),
(24, 5, 30, 0, 'kavya@gmail.com', 'Vitamin E', '2024-04-15', '10:44:36.000'),
(25, 14, 20, 1, 'kavya@gmail.com', 'Zapiz 0.25', '2024-04-15', '10:44:36.000'),
(26, 3, 20, 8, 'kavya@gmail.com', 'Psychotil 5', '2024-04-15', '10:44:36.069'),
(27, 10, 55, 13, 'kavya@gmail.com', 'Okacet Cold', '2024-04-15', '10:44:36.000'),
(28, 2, 15, 1, 'kavya@gmail.com', 'Band aid', '2024-04-16', '10:44:36.000'),
(29, 6, 25, 0, 'kavya@gmail.com', 'Pantagra-40', '2024-04-16', '10:44:36.000'),
(30, 11, 25, 1, 'kavya@gmail.com', 'Paxlovid', '2024-04-17', '10:47:24.000'),
(31, 9, 50, 2, 'kavya@gmail.com', 'Benzoyl Peroxide', '2024-04-17', '10:47:50.000'),
(32, 2, 15, 1, 'kavya@gmail.com', 'Band aid', '2024-04-17', '10:58:15.079'),
(33, 4, 25, 1, 'kavya@gmail.com', 'Wellpar-125', '2024-04-17', '10:59:05.049'),
(34, 2, 15, 1, 'kavya@gmail.com', 'Band aid', '2024-04-17', '10:59:12.059'),
(35, 5, 30, 1, 'kavya@gmail.com', 'Vitamin E', '2024-04-17', '10:58:52.000'),
(36, 1, 10, 1, 'kavya@gmail.com', 'Paracetamol IP650 mg', '2024-04-17', '11:03:37.119'),
(37, 7, 40, 1, 'kavya@gmail.com', 'Insulin', '2024-04-17', '11:04:18.000'),
(38, 3, 20, 1, 'kavya@gmail.com', 'Psychotil 5', '2024-04-17', '11:16:28.000'),
(39, 4, 25, 1, 'kavya@gmail.com', 'Wellpar-125', '2024-04-17', '11:17:27.000'),
(40, 5, 30, 1, 'kavya@gmail.com', 'Vitamin E', '2024-04-17', '11:19:41.000');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `p_id` int(11) NOT NULL,
  `name` varchar(25) NOT NULL,
  `price` int(5) NOT NULL,
  `Manufacture_date` date DEFAULT NULL,
  `Expiry_date` date NOT NULL,
  `image` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`p_id`, `name`, `price`, `Manufacture_date`, `Expiry_date`, `image`) VALUES
(1, 'Paracetamol IP650 mg', 10, '2024-06-13', '2026-04-10', '11.jpg? v=1655654'),
(2, 'Band aid', 15, '2024-04-12', '2026-04-10', '1.7_trustayclearcomfort_45en_0.jpg'),
(3, 'Psychotil 5', 20, '2026-05-08', '2028-07-13', 'images.jpeg? v=1654377'),
(4, 'Wellpar-125', 25, '2024-04-12', '2025-06-13', 'WhatsApp Image 2024-03-18 at 16.27.33_208909d5.jpg? v=1567843'),
(5, 'Vitamin E', 30, '2024-04-08', '2026-05-21', 'image1.jpg'),
(6, 'Pantagra-40', 25, '2024-05-10', '2025-07-17', 'Pantoprazole-40mg-Tablet-PANTAGRA-40.jpg'),
(7, 'Insulin', 40, '2024-06-06', '2025-05-07', 'WhatsApp Image 2024-03-18 at 16.27.33_eceb08c1.jpg? v=1657787'),
(8, 'Saridon', 45, '2024-04-19', '2026-04-15', 'new-saridon-strip-of-10-tablets-2-1688127341.webp? v=126577'),
(9, 'Benzoyl Peroxide', 50, '2024-05-11', '2026-04-01', 'images2.jpg'),
(10, 'Okacet Cold', 55, '2024-07-19', '2026-10-20', 'oka0003.webp? v=1577864'),
(11, 'Paxlovid', 25, '2024-05-22', '2026-07-23', 'M11.jpeg? v=15674'),
(12, 'Pedialyte', 20, '2024-06-13', '2027-05-20', 'M12.png? v=154678'),
(13, 'Zoryl M4', 30, '2024-07-16', '2026-06-09', 'M13.webp'),
(14, 'Zapiz 0.25', 20, '2024-07-18', '2026-04-13', 'M14.webp'),
(15, 'Stresan', 25, '2024-06-17', '2025-04-15', 'M-15.webp');

-- --------------------------------------------------------

--
-- Table structure for table `quantity`
--

CREATE TABLE `quantity` (
  `id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `name` text NOT NULL,
  `email` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `quantity`
--

INSERT INTO `quantity` (`id`, `p_id`, `price`, `quantity`, `name`, `email`) VALUES
(4, 5, 30, 2, 'Medicine 5', 'vijayadharanesh2000@'),
(5, 3, 20, 1, 'Medicine 3', 'kaka@gmail.com'),
(6, 3, 20, 1, 'Medicine 3', 'hasvi@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` int(25) NOT NULL,
  `First_Name` varchar(255) DEFAULT NULL,
  `Last_Name` varchar(255) DEFAULT NULL,
  `address` varchar(225) NOT NULL,
  `image` text NOT NULL,
  `pincode` int(11) NOT NULL,
  `phone_number` int(12) NOT NULL,
  `username` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `First_Name`, `Last_Name`, `address`, `image`, `pincode`, `phone_number`, `username`) VALUES
(1, 'kavya@gmail.com', 111, 'kavya', 'M', 'bvp ', 'OIP.jpeg', 520012, 956743210, 'kavya'),
(2, 'vijayadharanesh2000@gmail.com', 123, 'dharaneesh', 'P', '', '', 0, 0, ''),
(3, 'kaka@gmail.com', 123, 'kk', 'g', '', '', 0, 0, ''),
(4, 'dharaneeshp56@gmail.com', 123, 'shiyam', 'rs', '', '', 0, 0, ''),
(5, 'hasvi@gmail.com', 123, 'hasvi', 'p', '', '', 0, 0, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `corder`
--
ALTER TABLE `corder`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `quantity`
--
ALTER TABLE `quantity`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `corder`
--
ALTER TABLE `corder`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `quantity`
--
ALTER TABLE `quantity`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

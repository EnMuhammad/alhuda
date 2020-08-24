-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 24, 2020 at 07:23 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `alhuda`
--

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int(11) NOT NULL,
  `name` varchar(120) NOT NULL,
  `price` int(11) NOT NULL,
  `item_type` enum('breakfast','lunch','dinner','desserts','wine_card','drinks') NOT NULL,
  `about` text NOT NULL,
  `photo` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `name`, `price`, `item_type`, `about`, `photo`) VALUES
(1, 'Grilled Beef with potatoes', 29, 'breakfast', 'Meat, Potatoes, Rice, Tomatoe', 'left.png'),
(2, 'Grilled Beef with potatoes', 29, 'breakfast', 'Meat, Potatoes, Rice, Tomatoe', 'left.png'),
(3, 'Fruits', 50, 'drinks', 'Banana, apple, Orange.', 'drink-6.jpg'),
(4, 'Grilled Crab with Onion', 29, 'dinner', 'Meat, Potatoes, Rice, Tomatoe', 'dinner-3.jpg'),
(5, 'Grilled Crab with Onion', 29, 'lunch', 'Meat, Potatoes, Rice, Tomatoe', 'lunch-3.jpg'),
(6, 'strawberry shortcake', 30, 'desserts', 'An old-fashioned, tender shortcake with two layers of strawberries topped with whipped cream.', 'dessert-5.jpg'),
(7, 'Age and Glasses of Wine should Never be Counted, Funny Birthday Card for Mum Wife Friend, Wine Card', 70, 'wine_card', 'Age and Glasses of Wine should Never be Counted, Funny Birthday Card for Mum Wife Friend, Wine Card, Funny 30th 40th 50th Birthday Card', 'wine-8.jpg'),
(8, 'Grilled Beef with potatoes', 29, 'lunch', 'Meat, Potatoes, Rice, Tomatoe', 'lunch-7.jpg'),
(9, 'Grilled Beef with potatoes', 29, 'dinner', 'Meat, Potatoes, Rice, Tomatoe', 'lunch-7.jpg'),
(10, 'strawberry shortcake', 30, 'desserts', 'An old-fashioned, tender shortcake with two layers of strawberries topped with whipped cream.', 'dessert-3.jpg'),
(11, 'Fruits', 30, 'drinks', 'Banana, apple, Orange.', 'drink-2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `full_name` varchar(120) NOT NULL,
  `address` varchar(120) NOT NULL,
  `country` varchar(100) NOT NULL,
  `zip` varchar(50) NOT NULL,
  `notes` text NOT NULL,
  `products` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`products`)),
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(120) NOT NULL,
  `password` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 02, 2025 at 01:21 AM
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
-- Database: `inventory`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `category_name` text NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `status`) VALUES
(1, 'electronics', '1'),
(2, 'Food', '1'),
(3, 'clothes', '1');

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `id` int(11) NOT NULL,
  `invoice_id` varchar(255) NOT NULL,
  `product` text NOT NULL,
  `pro_id` varchar(11) NOT NULL,
  `company` text NOT NULL,
  `payment_due` varchar(255) NOT NULL,
  `issue_date` varchar(255) NOT NULL,
  `bill_from` text NOT NULL,
  `bill_to` text NOT NULL,
  `qty` int(11) NOT NULL,
  `total` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `invoices`
--

INSERT INTO `invoices` (`id`, `invoice_id`, `product`, `pro_id`, `company`, `payment_due`, `issue_date`, `bill_from`, `bill_to`, `qty`, `total`, `status`) VALUES
(14, 'INV#682847', 'Chocolate', '4', '[company name]', '2025-03-03', '2025/03/02', 'dreamer suppliyer inc\r\naddress : 123 street , karachi ,pakistan\r\n123@gmail..com\r\n                    ', 'dreamer suppliyer inc\r\naddress : 123 street , karachi ,pakistan\r\n123@gmail..com', 0, '', 'success'),
(15, 'INV#818535', 'Chocolate', '4', '[company name]', '2025-03-03', '2025/03/02', 'dreamer suppliyer inc\r\naddress : 123 street , karachi ,pakistan\r\n123@gmail..com\r\n                    ', 'dreamer suppliyer inc\r\naddress : 123 street , karachi ,pakistan\r\n123@gmail..com', 2, '520', 'success');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `product_name` text NOT NULL,
  `product_desc` text NOT NULL,
  `retail_price` varchar(255) NOT NULL,
  `whole_s_price` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `date_added` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `cat_id`, `product_name`, `product_desc`, `retail_price`, `whole_s_price`, `quantity`, `image`, `status`, `date_added`) VALUES
(3, 1, 'Laptop', 'laptop core i5 3rd gen with aurdino uno', '120000', '80000', 100, 'images/products/aed11d6975231b91c8e992c02b8376da.gif', '1', '2022-02-14'),
(4, 2, 'Chocolate', 'chocolate - dairy milk', '300', '260', 498, 'images/products/download.jpeg', '1', '2022-02-14'),
(5, 3, 'T-Shirt', 'shirt =- polo - multi color', '500', '400', 800, 'images/products/download (1).jpeg', '1', '2022-02-14');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` int(11) NOT NULL,
  `sales` varchar(355) NOT NULL,
  `earning` varchar(355) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `sales`, `earning`) VALUES
(1, '2', '520');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullname`, `email`, `password`, `role`, `status`) VALUES
(1, 'Muhammad Taha', 'admin@admin.com', '$2y$10$AGdG.RKeevgByISekO7laevNztwq3RlAKg69f9kX/GdXs3CvWKrHy', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `website`
--

CREATE TABLE `website` (
  `id` int(11) NOT NULL,
  `website_name` text NOT NULL,
  `website_mode` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `website`
--

INSERT INTO `website` (`id`, `website_name`, `website_mode`) VALUES
(1, 'dreamer', 'production');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `website`
--
ALTER TABLE `website`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `website`
--
ALTER TABLE `website`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

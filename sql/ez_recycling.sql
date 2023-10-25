-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 24, 2022 at 06:49 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ez_recycling`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contact` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `picture` varchar(255) DEFAULT 'defaultpic.jpg',
  `Role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`username`, `password`, `firstname`, `lastname`, `email`, `contact`, `address`, `picture`, `Role`) VALUES
('AKZ', '123', 'Ang ', 'Kai Zhe', 'angkaizhe@gmail.com', '', '', '1.jpg', 'Event Manager'),
('CJC', '123', 'Chua', 'Jing Cheng', 'cjc@gmail.com', '', '', '1.jpg', 'Admin'),
('Eeashann', '123', 'Eeashann', 'Sivasankar', 's.eeashann@gmail.com', '', '', '1.jpg', 'Member'),
('John', '123', 'John', 'Lewis', 'john@gmail.com', '0183215634', 'Puchong', '657.jpg', 'Member'),
('Liam', '11111', 'John', 'Doe', 'liam@gmail.com', '0122', 'sq', 'T B3.jfif', 'Environmentalist'),
('Shann', '123', 'Eeasshann', 'Sivasankar', 'eeashann@gmail.com', '', '', '1.jpg', 'Member'),
('va', '123', 'Kesha', 'Wong', 'keshawong@gmail.com', '01992865', 'Taman Klang Utama', 'cn-305-banner-1140x640.jpg', 'Environmentalist');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `product_price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `product_name`, `quantity`, `product_image`, `product_price`) VALUES
(12, 'shoe', 1, 'shoe.jpg', 100);

-- --------------------------------------------------------

--
-- Table structure for table `delivery`
--

CREATE TABLE `delivery` (
  `delivery_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `order_id` int(11) NOT NULL,
  `total_products` varchar(255) NOT NULL,
  `deliveryAddress` varchar(50) NOT NULL,
  `description` varchar(255) NOT NULL,
  `status` varchar(255) DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `delivery`
--

INSERT INTO `delivery` (`delivery_id`, `username`, `order_id`, `total_products`, `deliveryAddress`, `description`, `status`) VALUES
(18, 'Andy', 1, 'wallet (1) , shoe (1) , bag (1) ', 'Batu P', '', 'Pending'),
(19, 'John', 2, 'wallet (1) , shoe (1) , bag (2) ', 'Puchong', '', 'Pending'),
(20, 'John', 3, 'wallet (1) , shoe (1) , bag (2) ', 'Puchong', '', 'Pending'),
(24, 'John', 37, 'shoe (1) ', 'Batu', '', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `Event_ID` int(11) NOT NULL,
  `Event_Name` varchar(255) NOT NULL,
  `Venue` varchar(255) NOT NULL,
  `Date` date NOT NULL,
  `Time` varchar(255) NOT NULL,
  `capacity` int(11) NOT NULL,
  `descriptions` varchar(255) NOT NULL,
  `event_pic` varchar(255) NOT NULL,
  `Username` varchar(255) NOT NULL,
  `status` int(11) NOT NULL COMMENT '0=Pending, 1=Approved, 2=Rejected,\r\n3 = Event Finished\r\n'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`Event_ID`, `Event_Name`, `Venue`, `Date`, `Time`, `capacity`, `descriptions`, `event_pic`, `Username`, `status`) VALUES
(1, 'Hop On', 'APU', '2022-07-12', '9pm -10pm', 100, 'meet u there', 'logo.png', 'Liam', 1),
(6, 'THE CONQUEST ', 'ASIA PACIFIC UNIVERSITY', '2022-08-16', '8AM - 12AM', 500, '<p>FIND THE LOST TREASURE</p>\r\n', 'TB.png', 'Liam', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `total_product` varchar(255) NOT NULL,
  `payment_method` varchar(50) NOT NULL,
  `price_total` int(11) NOT NULL,
  `address` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `total_product`, `payment_method`, `price_total`, `address`, `username`, `email`, `phone`) VALUES
(1, 'wallet (1) , shoe (1) , bag (1) ', 'cash on delivery', 600, 'Batu P', 'Andy', 'andy@gmail.com', '192838723'),
(2, 'wallet (1) , shoe (1) , bag (2) ', 'cash on delivery', 800, 'Puchong', 'John', 'john@gmail.com', '0183134512'),
(3, 'wallet (1) , shoe (1) , bag (2) ', 'cash on delivery', 800, 'Puchong', 'John', 'john@gmail.com', '0183134512'),
(37, 'shoe (1) ', 'cash on delivery', 100, 'Batu', 'John', 'john@gmail.com', '999');

-- --------------------------------------------------------

--
-- Table structure for table `participant`
--

CREATE TABLE `participant` (
  `Event_Name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `participant`
--

INSERT INTO `participant` (`Event_Name`, `username`, `email`, `contact`) VALUES
('THE CONQUEST ', 'va', 'keshawong@gamil.com', '01992865');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` varchar(255) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `description` varchar(50) NOT NULL,
  `product_price` int(11) NOT NULL,
  `product_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `description`, `product_price`, `product_image`) VALUES
('1', 'bag', 'Im a Bag', 200, 'black-widow-movie-2020-uhdpaper.com-4K-7.523.jpg'),
('2', 'shoe', 'Im a Shoe', 100, 'shoe.jpg'),
('3', 'wallet', 'Im a Wallet', 100, 'wallet.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `queries`
--

CREATE TABLE `queries` (
  `query_id` int(11) NOT NULL,
  `query_type` varchar(50) NOT NULL,
  `username` varchar(255) NOT NULL,
  `description` varchar(50) NOT NULL,
  `feedback` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `recyclable_items_stock`
--

CREATE TABLE `recyclable_items_stock` (
  `Recycle_stockID` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `material_type` varchar(50) NOT NULL,
  `amount` int(11) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `recyclable_items_stock`
--

INSERT INTO `recyclable_items_stock` (`Recycle_stockID`, `username`, `date`, `material_type`, `amount`, `description`) VALUES
(2, 'Liam', '2022-07-31', 'Glass', 30, ' At Taman Klang Jaya Utama Selangor'),
(3, 'Liam', '2022-07-18', 'Plastic', 15, 'in House'),
(56, 'va', '2022-08-18', 'Glass', 10, 'Taman Guchil Jaya');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `delivery`
--
ALTER TABLE `delivery`
  ADD PRIMARY KEY (`delivery_id`),
  ADD UNIQUE KEY `order_id` (`order_id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`Event_ID`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `participant`
--
ALTER TABLE `participant`
  ADD PRIMARY KEY (`Event_Name`,`username`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `queries`
--
ALTER TABLE `queries`
  ADD PRIMARY KEY (`query_id`),
  ADD UNIQUE KEY `username` (`username`) USING BTREE;

--
-- Indexes for table `recyclable_items_stock`
--
ALTER TABLE `recyclable_items_stock`
  ADD PRIMARY KEY (`Recycle_stockID`),
  ADD KEY `Username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `delivery`
--
ALTER TABLE `delivery`
  MODIFY `delivery_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `Event_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `recyclable_items_stock`
--
ALTER TABLE `recyclable_items_stock`
  MODIFY `Recycle_stockID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

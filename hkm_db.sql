-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 08, 2023 at 03:51 PM
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
-- Database: `hkm_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `invoice_id` int(11) NOT NULL,
  `invoice_date` datetime NOT NULL DEFAULT current_timestamp(),
  `cname` varchar(255) NOT NULL,
  `caddress` text NOT NULL,
  `cphone` varchar(255) NOT NULL,
  `total_cost` double NOT NULL,
  `amt_paid` double NOT NULL,
  `balance` double NOT NULL,
  `pay_balance` double NOT NULL,
  `payment` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `paymentupdate_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`invoice_id`, `invoice_date`, `cname`, `caddress`, `cphone`, `total_cost`, `amt_paid`, `balance`, `pay_balance`, `payment`, `status`, `paymentupdate_date`) VALUES
(1, '2023-05-04 00:00:00', 'Suman', 'Talawakelle', '0778844224', 1350, 1500, -150, 0, '0', '3', '2023-05-04'),
(2, '2023-05-04 00:00:00', 'Manohar', 'watagoda', '0512236014', 1100, 1000, 0, 0, '0', '3', '2023-05-08'),
(5, '2023-05-04 00:00:00', 'sambar', 'paniyakanaku', '2352542545', 700, 700, 0, 0, '0', '3', '2023-05-04'),
(7, '2023-05-08 00:00:00', 'sasi tharan', 'no. 17', '0778720065', 3250, 3250, 0, 0, '0', '3', '2023-05-08');

-- --------------------------------------------------------

--
-- Table structure for table `invoice_products`
--

CREATE TABLE `invoice_products` (
  `ID` int(11) NOT NULL,
  `invoice_id` int(11) NOT NULL,
  `repair_invoice_id` int(11) NOT NULL,
  `PNAME` varchar(255) NOT NULL,
  `PRICE` double NOT NULL,
  `QTY` int(55) NOT NULL,
  `TOTAL` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `invoice_products`
--

INSERT INTO `invoice_products` (`ID`, `invoice_id`, `repair_invoice_id`, `PNAME`, `PRICE`, `QTY`, `TOTAL`) VALUES
(1, 1, 0, '1', 250, 1, 250),
(2, 1, 0, '3', 450, 1, 450),
(3, 1, 0, '4', 650, 1, 650),
(4, 2, 0, '5', 650, 1, 650),
(5, 2, 0, '3', 450, 1, 450),
(6, 3, 0, '5', 650, 1, 650),
(7, 3, 0, '3', 450, 1, 450),
(8, 4, 0, '4', 650, 3, 1950),
(9, 4, 0, '1', 250, 1, 250),
(10, 5, 0, '1', 250, 1, 250),
(11, 5, 0, '3', 450, 1, 450),
(12, 6, 0, '1', 250, 1, 250),
(13, 6, 0, '3', 450, 1, 450),
(14, 1, 0, '6', 6500, 1, 6500),
(15, 2, 0, '6', 6500, 1, 6500),
(16, 2, 0, '3', 450, 1, 450),
(17, 7, 0, '4', 650, 5, 3250),
(18, 3, 0, '7', 450, 1, 450),
(19, 3, 0, '8', 850, 1, 850),
(20, 4, 0, '7', 450, 1, 450),
(21, 4, 0, '8', 850, 1, 850),
(22, 5, 0, '6', 6500, 1, 6500),
(23, 5, 0, '7', 450, 1, 450),
(24, 5, 0, '8', 850, 1, 850),
(25, 6, 0, '7', 450, 1, 450),
(26, 6, 0, '8', 850, 1, 850),
(27, 0, 7, '9', 1250, 1, 1250),
(28, 0, 7, '4', 650, 1, 650),
(29, 0, 8, '9', 1250, 1, 1250),
(30, 0, 8, '4', 650, 1, 650),
(31, 0, 9, '3', 450, 2, 900),
(32, 0, 9, '5', 650, 1, 650);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `product_code` varchar(255) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `qty` int(55) NOT NULL,
  `unit_price` double NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_code`, `product_name`, `qty`, `unit_price`, `status`) VALUES
(1, 'Item_001', 'Toys', 12, 250, '1'),
(3, 'item_002', 'Tempered', 120, 450, '1'),
(4, 'item_003', 'Backcover Huwaei', 85, 650, '1'),
(5, 'item_004', 'Handsfree normal', 25, 650, '1'),
(6, 'Item_005', 'Samsung a30 Display', 3, 6500, '1'),
(7, 'item_006', 'nokia 106 charger pin', 12, 450, '1'),
(8, 'item_007', 'Nokia Battery b4', 24, 850, '1'),
(9, 'Item_008', 'huwaei sim tray', 6, 1250, '1');

-- --------------------------------------------------------

--
-- Table structure for table `repairs`
--

CREATE TABLE `repairs` (
  `id` int(11) NOT NULL,
  `repair_code` varchar(255) NOT NULL,
  `repair_date` date NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `imei` varchar(255) NOT NULL,
  `issues` varchar(255) NOT NULL,
  `accessories` varchar(255) NOT NULL,
  `advance_amt` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `repairs`
--

INSERT INTO `repairs` (`id`, `repair_code`, `repair_date`, `customer_name`, `mobile`, `imei`, `issues`, `accessories`, `advance_amt`, `status`) VALUES
(1, 'rep-001', '2023-05-08', 'kabilan', '0770514626', '1111999111', 'j5 display', 'phone,backcover,battery', '2500', '0'),
(2, 'rep-002', '2023-05-07', 'sasi', '0778720065', '1122255511111', 'samsung a30 display', 'phone,backcover,battery', '5000', '0'),
(4, 'rep-004', '2023-05-08', 'kumar', 'nokia 106', '1122255511111', 'nokia charger pin', 'phone,backcover,battery', '0', '0'),
(5, 'rep-0012', '2023-05-08', 'ram', 'nokia 106', '1122255511111', 'nokia charger pin', 'phone only', '0', '0'),
(6, 'rep-0015', '2023-05-08', 'arjun', '0770514626', '1111999111', 'huwaei sim tray', 'phone only', '0', '0'),
(7, 'rep-0025', '2023-05-08', 'sam', '0778720065', '1111999111', 'huwaie no power', 'phone only', '0', '0');

-- --------------------------------------------------------

--
-- Table structure for table `repair_invoice`
--

CREATE TABLE `repair_invoice` (
  `repair_invoice_id` int(11) NOT NULL,
  `invoice_date` date NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `repair_code` varchar(255) NOT NULL,
  `repair_date` date NOT NULL,
  `advance_amt` double NOT NULL,
  `sub_total` double NOT NULL,
  `total_cost` double NOT NULL,
  `serv_charge` double NOT NULL,
  `amt_paid` double NOT NULL,
  `balance` double NOT NULL,
  `due_balance` double NOT NULL,
  `pay_balance` double NOT NULL,
  `payment` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `paymentupdate_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `repair_invoice`
--

INSERT INTO `repair_invoice` (`repair_invoice_id`, `invoice_date`, `customer_name`, `repair_code`, `repair_date`, `advance_amt`, `sub_total`, `total_cost`, `serv_charge`, `amt_paid`, `balance`, `due_balance`, `pay_balance`, `payment`, `status`, `paymentupdate_date`) VALUES
(1, '2023-05-08', 'sasi', 'rep-002', '2023-05-07', 5000, 6500, 7500, 1000, 2000, 2500, 500, 0, '0', '3', '2023-05-08'),
(2, '2023-05-09', 'kabilan', 'rep-001', '2023-05-08', 2500, 6950, 7950, 1000, 5450, 5450, 0, 0, '0', '3', '2023-05-08'),
(3, '2023-05-08', 'kumar', 'rep-004', '2023-05-08', 0, 1300, 1600, 300, 1500, 1600, 100, 0, '0', '3', '2023-05-08'),
(5, '2023-05-08', 'sasi', 'rep-002', '2023-05-07', 5000, 7800, 8800, 1000, 3500, 3800, 200, 100, '0', '0', '2023-05-09'),
(6, '2023-05-08', 'ram', 'rep-0012', '2023-05-08', 0, 1300, 1550, 250, 1500, 1550, 50, 0, '0', '3', '2023-05-08'),
(7, '2023-05-08', 'arjun', 'rep-0015', '2023-05-08', 0, 1900, 2000, 100, 2000, 2000, 0, 0, '0', '3', '2023-05-08'),
(8, '2023-05-08', 'sam', 'rep-0025', '2023-05-08', 0, 1900, 2150, 250, 1800, 2150, 150, 50, '0', '3', '2023-05-08'),
(9, '2023-05-08', 'sam', 'rep-0025', '2023-05-08', 0, 1550, 2050, 500, 2000, 2050, 0, 50, '0', '3', '2023-05-08');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`invoice_id`);

--
-- Indexes for table `invoice_products`
--
ALTER TABLE `invoice_products`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `invoice_id` (`invoice_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `repairs`
--
ALTER TABLE `repairs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `repair_invoice`
--
ALTER TABLE `repair_invoice`
  ADD PRIMARY KEY (`repair_invoice_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `invoice_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `invoice_products`
--
ALTER TABLE `invoice_products`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `repairs`
--
ALTER TABLE `repairs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `repair_invoice`
--
ALTER TABLE `repair_invoice`
  MODIFY `repair_invoice_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

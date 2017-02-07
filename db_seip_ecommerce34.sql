-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 07, 2017 at 10:02 AM
-- Server version: 10.1.8-MariaDB
-- PHP Version: 5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_seip_ecommerce34`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `admin_id` int(3) NOT NULL,
  `admin_name` varchar(100) NOT NULL,
  `email_address` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `admin_name`, `email_address`, `password`) VALUES
(1, 'Seip Ecommerce 34', 'admin@gmail.com', 'e10adc3949ba59abbe56e057f20f883e');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `category_id` int(3) NOT NULL,
  `category_name` varchar(100) NOT NULL,
  `category_description` text NOT NULL,
  `publication_status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`category_id`, `category_name`, `category_description`, `publication_status`) VALUES
(5, 'Mans Fashion', 'well', 1),
(6, 'Woman Fashion', 'well', 1),
(11, 'Beauty Product', 'Well', 1),
(15, 'Accessoris', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer`
--

CREATE TABLE `tbl_customer` (
  `customer_id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email_address` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `phone_number` varchar(30) NOT NULL,
  `address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_customer`
--

INSERT INTO `tbl_customer` (`customer_id`, `first_name`, `last_name`, `email_address`, `password`, `phone_number`, `address`) VALUES
(1, 'Sobuj', 'Khan', 'khan@gmail.com', '202cb962ac59075b964b07152d234b70', '01714151214', 'Savar'),
(2, 'Adnan', 'Ahammed', 'addnan@hotail.com', 'e10adc3949ba59abbe56e057f20f883e', '01199123156', 'Farmgate');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_image`
--

CREATE TABLE `tbl_image` (
  `image_id` int(2) NOT NULL,
  `image_file` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_image`
--

INSERT INTO `tbl_image` (`image_id`, `image_file`) VALUES
(1, 'images/author.jpg'),
(2, 'images/Pilgrims-Hospice-Duck.jpg'),
(3, 'images/10398697_1543603572619376_779336614453531375_n.jpg'),
(4, 'images/Toyota_Rumion_2012_b9aae2070ff42730401c8b98890666e3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_manufacturer`
--

CREATE TABLE `tbl_manufacturer` (
  `manufacturer_id` int(3) NOT NULL,
  `manufacturer_name` varchar(100) NOT NULL,
  `manufacturer_description` text NOT NULL,
  `publication_status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_manufacturer`
--

INSERT INTO `tbl_manufacturer` (`manufacturer_id`, `manufacturer_name`, `manufacturer_description`, `publication_status`) VALUES
(11, 'Sony', 'cxasxcas', 1),
(12, 'walton', 'asasxc', 1),
(13, 'Arong', 'well', 1),
(14, 'Haque Group', 'well', 1),
(15, 'Akiz Group', 'abc', 1),
(16, 'Mohona Retailer', 'abc', 1),
(17, 'ACI', 'abc', 1),
(18, 'Square', 'abc', 1),
(19, 'Mizan Group', 'abc', 1),
(20, 'Keya ', 'abc', 1),
(21, 'Dinash Kapuria and Brothers ', 'ABC', 1),
(22, 'Dell', 'abc', 1),
(23, 'HP', 'abcdd', 1),
(24, 'RFL', 'Well', 1),
(25, 'Sonakshi Sinha  Furniture ', 'Well', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `order_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `shipping_id` int(11) NOT NULL,
  `order_total` float(10,2) NOT NULL,
  `order_status` varchar(50) NOT NULL DEFAULT 'pending',
  `order_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`order_id`, `customer_id`, `shipping_id`, `order_total`, `order_status`, `order_date`) VALUES
(2, 1, 1, 6450.35, 'pending', '2016-12-04 13:36:14'),
(3, 2, 2, 1460.50, 'pending', '2016-12-04 14:04:45');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order_details`
--

CREATE TABLE `tbl_order_details` (
  `order_details_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_price` float(10,2) NOT NULL,
  `product_quantity` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_order_details`
--

INSERT INTO `tbl_order_details` (`order_details_id`, `order_id`, `product_id`, `product_name`, `product_price`, `product_quantity`) VALUES
(4, 2, 1, 'demo product', 123.00, 1),
(5, 2, 8, 'Lady Cap', 234.00, 4),
(6, 2, 14, 'Wad-drop ', 4550.00, 1),
(7, 3, 7, 'Bulb', 134.00, 5),
(8, 3, 25, 'Katlly ', 600.00, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_payment`
--

CREATE TABLE `tbl_payment` (
  `payment_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `payment_type` varchar(50) NOT NULL,
  `payment_status` varchar(50) NOT NULL DEFAULT 'pending',
  `payment_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_payment`
--

INSERT INTO `tbl_payment` (`payment_id`, `order_id`, `payment_type`, `payment_status`, `payment_date`) VALUES
(3, 2, 'cash_on_delivery', 'pending', '2016-12-04 13:36:14'),
(4, 3, 'cash_on_delivery', 'pending', '2016-12-04 14:04:45');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `category_id` int(3) NOT NULL,
  `manufacturer_id` int(3) NOT NULL,
  `product_price` float(10,2) NOT NULL,
  `product_quantity` int(5) NOT NULL,
  `product_short_description` text NOT NULL,
  `product_long_description` text NOT NULL,
  `product_image` text NOT NULL,
  `publication_status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`product_id`, `product_name`, `category_id`, `manufacturer_id`, `product_price`, `product_quantity`, `product_short_description`, `product_long_description`, `product_image`, `publication_status`) VALUES
(1, 'demo product', 5, 13, 123.00, 213, 'xczxczxc', 'zxczxc', '../assets/product_images/author.jpg', 1),
(2, 'Shirt', 5, 12, 1234123.00, 123412, 'fsadvsdvsd', 'sdsdvsdv', '../assets/product_images/Pilgrims-Hospice-Duck.jpg', 1),
(3, 'Galesy S7', 8, 12, 1234.00, 100, 'asdasdasd', ' xz zxc zx zx', '../assets/product_images/34.jpg', 1),
(4, 'Mr. Cookie', 4, 14, 200.00, 100, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborumLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborumLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum', '../assets/product_images/5.jpg', 1),
(5, 'New Bisket', 4, 14, 100.00, 300, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborumLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum', '../assets/product_images/7.jpg', 1),
(6, 'Air Cooler', 8, 12, 1200.00, 63, 'fd', 'fda', '../assets/product_images/air_cooler2_thumb-200x200.jpg', 1),
(7, 'Bulb', 8, 12, 134.00, 433, 'abcd abcd abcdeabcd abcd abcdeabcd abcd abcde', 'abcd abcd abcdeabcd abcd abcdeabcd abcd abcdeabcd abcd abcde', '../assets/product_images/click_cf8_thumb-200x2f00.jpg', 1),
(8, 'Lady Cap', 6, 13, 234.00, 21, 'abcd abcd abcdeabcd abcd abcdeabcd abcd abcdeabcd abcd abcde', 'abcd abcd abcdeabcd abcd abcdeabcd abcd abcdeabcd abcd abcdeabcd abcd abcdeabcd abcd abcdeabcd abcd abcdeabcd abcd abcde', '../assets/product_images/dd.jpg', 1),
(9, 'Dressing Table', 13, 25, 45440.00, 32, 'abcd abcd abcdeabcd abcd abcdeabcd abcd abcdeabcd abcd abcde', 'abcd abcd abcdeabcd abcd abcdeabcd abcd abcdeabcd abcd abcdeabcd abcd abcdeabcd abcd abcdeabcd abcd abcdeabcd abcd abcde', '../assets/product_images/ddd.jpg', 1),
(10, 'MRI Machine', 8, 11, 5660000.00, 3, 'abcd abcd abcdeabcd abcd abcdeabcd abcd abcdeabcd abcd abcde', 'abcd abcd abcdeabcd abcd abcdeabcd abcd abcdeabcd abcd abcdeabcd abcd abcdeabcd abcd abcdeabcd abcd abcdeabcd abcd abcde', '../assets/product_images/downldfdoad.jpg', 1),
(11, 'Ti fin Bati ', 13, 24, 543.00, 444, 'abcd abcd abcdeabcd abcd abcdeabcd abcd abcdeabcd abcd abcde', 'abcd abcd abcdeabcd abcd abcdeabcd abcd abcdeabcd abcd abcdeabcd abcd abcdeabcd abcd abcdeabcd abcd abcdeabcd abcd abcde', '../assets/product_images/download (1).jpg', 1),
(12, 'Heater', 8, 24, 1409.00, 122, 'abcd abcd abcdeabcd abcd abcdeabcd abcd abcdeabcd abcd abcde', 'abcd abcd abcdeabcd abcd abcdeabcd abcd abcdeabcd abcd abcdeabcd abcd abcdeabcd abcd abcdeabcd abcd abcdeabcd abcd abcde', '../assets/product_images/download (2).jpg', 1),
(13, 'Face Wash', 11, 25, 233.00, 21, 'abcd abcd abcdeabcd abcd abcdeabcd abcd abcdeabcd abcd abcde', 'abcd abcd abcdeabcd abcd abcdeabcd abcd abcdeabcd abcd abcdeabcd abcd abcdeabcd abcd abcdeabcd abcd abcdeabcd abcd abcde', '../assets/product_images/download (3).jpg', 1),
(14, 'Wad-drop ', 13, 25, 4550.00, 23, 'abcd abcd abcdeabcd abcd abcdeabcd abcd abcdeabcd abcd abcde', 'abcd abcd abcdeabcd abcd abcdeabcd abcd abcdeabcd abcd abcde', '../assets/product_images/download.jpg', 1),
(15, 'Cable Pipe', 8, 24, 450.00, 5000, 'abcd abcd abcdeabcd abcd abcdeabcd abcd abcdeabcd abcd abcde', 'abcd abcd abcdeabcd abcd abcdeabcd abcd abcdeabcd abcd abcde', '../assets/product_images/iddmages.jpg', 1),
(16, 'Fiber Cable', 8, 11, 20000.00, 455, 'abcd abcd abcdeabcd abcd abcdeabcd abcd abcdeabcd abcd abcde', 'abcd abcd abcdeabcd abcd abcdeabcd abcd abcdeabcd abcd abcde', '../assets/product_images/IM_product_KSG_200_sender_with_receiver_persp_RGB_72dpi.jpg', 1),
(17, 'AMP Meter ', 8, 11, 122000.00, 2, 'abcd abcd abcdeabcd abcd abcdeabcd abcd abcdeabcd abcd abcde', 'abcd abcd abcdeabcd abcd abcdeabcd abcd abcdeabcd abcd abcde', '../assets/product_images/IM_product_KSG_200_TA_case_open_persp_RGB_72dpi.jpg', 1),
(18, 'Rak', 13, 24, 3400.00, 33, 'abcd abcd abcdeabcd abcd abcdeabcd abcd abcdeabcd abcd abcde', 'abcd abcd abcdeabcd abcd abcdeabcd abcd abcdeabcd abcd abcde', '../assets/product_images/imafdages.jpg', 1),
(19, 'Pc Power', 10, 23, 650.00, 33, 'abcd abcd abcdeabcd abcd abcdeabcd abcd abcdeabcd abcd abcde', 'abcd abcd abcdeabcd abcd abcdeabcd abcd abcdeabcd abcd abcdeabcd abcd abcdeabcd abcd abcdeabcd abcd abcdeabcd abcd abcde', '../assets/product_images/imagdddes.jpg', 1),
(20, 'Room Freshner', 11, 16, 120.00, 330, 'abcd abcd abcdeabcd abcd abcdeabcd abcd abcdeabcd abcd abcdeabcd abcd abcdeabcd abcd abcdeabcd abcd abcdeabcd abcd abcde', 'abcd abcd abcdeabcd abcd abcdeabcd abcd abcdeabcd abcd abcde', '../assets/product_images/images (1).jpg', 1),
(21, 'Rice Cooker', 8, 17, 35000.00, 12, 'abcd abcd abcdeabcd abcd abcdeabcd abcd abcdeabcd abcd abcde', 'abcd abcd abcdeabcd abcd abcdeabcd abcd abcdeabcd abcd abcdeabcd abcd abcdeabcd abcd abcdeabcd abcd abcdeabcd abcd abcde', '../assets/product_images/images (2).jpg', 1),
(22, 'Shoe Rak', 13, 21, 1200.00, 32, 'abcd abcd abcdeabcd abcd abcdeabcd abcd abcdeabcd abcd abcde', 'abcd abcd abcdeabcd abcd abcdeabcd abcd abcdeabcd abcd abcdeabcd abcd abcdeabcd abcd abcdeabcd abcd abcdeabcd abcd abcde', '../assets/product_images/imagesdd.jpg', 1),
(23, 'Wheel', 10, 18, 800.00, 8000, 'abcd abcd abcdeabcd abcd abcdeabcd abcd abcdeabcd abcd abcdeabcd abcd abcdeabcd abcd abcdeabcd abcd abcdeabcd abcd abcde', 'abcd abcd abcdeabcd abcd abcdeabcd abcd abcdeabcd abcd abcdeabcd abcd abcdeabcd abcd abcdeabcd abcd abcdeabcd abcd abcdeabcd abcd abcdeabcd abcd abcdeabcd abcd abcdeabcd abcd abcdeabcd abcd abcdeabcd abcd abcdeabcd abcd abcdeabcd abcd abcde', '../assets/product_images/product_57d729_200.jpg', 1),
(24, 'Bin', 12, 12, 1200.00, 50, 'abcd abcd abcdeabcd abcd abcdeabcd abcd abcdeabcd abcd abcde', 'abcd abcd abcdeabcd abcd abcdeabcd abcd abcdeabcd abcd abcdeabcd abcd abcdeabcd abcd abcdeabcd abcd abcdeabcd abcd abcdeabcd abcd abcdeabcd abcd abcdeabcd abcd abcdeabcd abcd abcde', '../assets/product_images/rfl-double-paddle-bin-20-ltr-1-pcs_s.jpg', 1),
(25, 'Katlly ', 8, 23, 600.00, 600, 'abcd abcd abcdeabcd abcd abcdeabcd abcd abcdeabcd abcd abcdeabcd abcd abcdeabcd abcd abcdeabcd abcd abcdeabcd abcd abcde', 'abcd abcd abcdeabcd abcd abcdeabcd abcd abcdeabcd abcd abcdeabcd abcd abcdeabcd abcd abcdeabcd abcd abcdeabcd abcd abcdeabcd abcd abcdeabcd abcd abcdeabcd abcd abcdeabcd abcd abcde', '../assets/product_images/VSN-18142_thumb-200x200.jpg', 1),
(26, 'Chair', 13, 20, 6000.00, 300, 'abcd abcd abcdeabcd abcd abcdeabcd abcd abcdeabcd abcd abcde', 'abcd abcd abcdeabcd abcd abcdeabcd abcd abcdeabcd abcd abcdeabcd abcd abcdeabcd abcd abcdeabcd abcd abcdeabcd abcd abcdeabcd abcd abcdeabcd abcd abcdeabcd abcd abcdeabcd abcd abcde', '../assets/product_images/imfdsfaages.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_shipping`
--

CREATE TABLE `tbl_shipping` (
  `shipping_id` int(11) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `email_address` varchar(100) NOT NULL,
  `phone_number` varchar(30) NOT NULL,
  `address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_shipping`
--

INSERT INTO `tbl_shipping` (`shipping_id`, `full_name`, `email_address`, `phone_number`, `address`) VALUES
(1, 'Haydar Ali', 'ali@gmail.com', '01714121314', 'Dhaka'),
(2, 'Sakib AL HAsan', 'hasab@yahoo.com', '01715121212', 'Mirpur-21');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_temp_cart`
--

CREATE TABLE `tbl_temp_cart` (
  `temp_cart_id` int(11) NOT NULL,
  `session_id` varchar(100) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_price` float(10,2) NOT NULL,
  `product_quantity` int(5) NOT NULL,
  `product_image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `tbl_image`
--
ALTER TABLE `tbl_image`
  ADD PRIMARY KEY (`image_id`);

--
-- Indexes for table `tbl_manufacturer`
--
ALTER TABLE `tbl_manufacturer`
  ADD PRIMARY KEY (`manufacturer_id`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `tbl_order_details`
--
ALTER TABLE `tbl_order_details`
  ADD PRIMARY KEY (`order_details_id`);

--
-- Indexes for table `tbl_payment`
--
ALTER TABLE `tbl_payment`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `tbl_shipping`
--
ALTER TABLE `tbl_shipping`
  ADD PRIMARY KEY (`shipping_id`);

--
-- Indexes for table `tbl_temp_cart`
--
ALTER TABLE `tbl_temp_cart`
  ADD PRIMARY KEY (`temp_cart_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `admin_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `category_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_image`
--
ALTER TABLE `tbl_image`
  MODIFY `image_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_manufacturer`
--
ALTER TABLE `tbl_manufacturer`
  MODIFY `manufacturer_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_order_details`
--
ALTER TABLE `tbl_order_details`
  MODIFY `order_details_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tbl_payment`
--
ALTER TABLE `tbl_payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `tbl_shipping`
--
ALTER TABLE `tbl_shipping`
  MODIFY `shipping_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_temp_cart`
--
ALTER TABLE `tbl_temp_cart`
  MODIFY `temp_cart_id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

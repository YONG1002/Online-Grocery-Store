-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 15, 2022 at 06:52 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `online_grocery_store`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(15) NOT NULL,
  `Name` varchar(200) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `admin_img` varchar(255) NOT NULL,
  `admin_delete` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `Name`, `Password`, `email`, `admin_img`, `admin_delete`) VALUES
(38, 'valina', 'valina1234', 'valina@gmail.com', '1646966426_valina.jpg', 0),
(39, 'janiee', 'janie12345', 'janiee@gmail.com', '1646975237_janie.jpg', 0),
(40, 'namada', 'namada1234', 'namada@gmail.com', '1646967589_namada.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `cart_items`
--

CREATE TABLE `cart_items` (
  `Cart_Id` int(50) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Quantity` int(100) NOT NULL,
  `Product_price` varchar(50) NOT NULL,
  `Total_Price` varchar(50) NOT NULL,
  `Product_img` varchar(255) NOT NULL,
  `Customer_Id` int(50) NOT NULL,
  `Product_code` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `Category_Id` int(20) NOT NULL,
  `Name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`Category_Id`, `Name`) VALUES
(1, 'Fresh'),
(2, 'Groceries'),
(3, 'Household'),
(4, 'Drinks');

-- --------------------------------------------------------

--
-- Table structure for table `category_type`
--

CREATE TABLE `category_type` (
  `category_type_id` int(20) NOT NULL,
  `type_name` varchar(50) NOT NULL,
  `Category_Id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category_type`
--

INSERT INTO `category_type` (`category_type_id`, `type_name`, `Category_Id`) VALUES
(1, 'rice', 2),
(3, 'sugar', 2),
(4, 'milk', 4),
(5, 'mee', 2);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `Customer_Id` int(20) NOT NULL,
  `cust_name` varchar(50) NOT NULL,
  `cust_password` varchar(100) NOT NULL,
  `cust_email` varchar(100) NOT NULL,
  `cust_address` varchar(400) NOT NULL,
  `City` varchar(20) NOT NULL,
  `Country` varchar(20) NOT NULL,
  `Postal_code` int(20) NOT NULL,
  `cust_phone` int(20) NOT NULL,
  `confirm_password` varchar(100) NOT NULL,
  `Cus_img` varchar(255) NOT NULL,
  `cus_isDelete` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`Customer_Id`, `cust_name`, `cust_password`, `cust_email`, `cust_address`, `City`, `Country`, `Postal_code`, `cust_phone`, `confirm_password`, `Cus_img`, `cus_isDelete`) VALUES
(1, 'niama', 'Ade2e2#@', 'niama@gmail.com', 'Jalan Ayer Keroh Lama, 75450 Bukit Beruang, Melaka', 'Penang', 'Malaysia', 78000, 136306455, 'Ade2e2#@', '1647156465_niama.jpg', 0),
(2, 'walaoweii', 'Zxc123%$%$', 'walao@gmail.com', '', '', '', 0, 987654321, 'Zxc123%$%$', 'walaoweii.png', 0),
(3, 'bananaman', 'GBF123abc', 'bananaman@gmail.com', '', '', '', 0, 123459876, 'GBF123abc', 'bananaman.jpg', 1),
(4, 'ndqnduwqndqwu', 'Acxz123*&*&', 'bybdeybde2ya@nwbqdjdb', '', '', '', 0, 0, 'Acxz123*&*&', '', 1),
(6, 'test', 'Acd567*&*&', 'test@gmail.com', '', '', '', 0, 0, 'Acd567*&*&', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `favourite`
--

CREATE TABLE `favourite` (
  `Favorite_Id` int(20) NOT NULL,
  `Customer_Id` int(20) NOT NULL,
  `Product_Id` int(20) NOT NULL,
  `time` datetime NOT NULL DEFAULT current_timestamp(),
  `Product_img` varchar(255) NOT NULL,
  `Product_name` varchar(50) NOT NULL,
  `Product_price` varchar(50) NOT NULL,
  `Brand` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `favourite`
--

INSERT INTO `favourite` (`Favorite_Id`, `Customer_Id`, `Product_Id`, `time`, `Product_img`, `Product_name`, `Product_price`, `Brand`) VALUES
(48, 1, 2, '2022-03-11 11:24:30', '1645836440_D00002.jpg', 'Nestlé Milo Activ-Go Softpack 2kg', '28.99', 'Nestlé'),
(49, 5, 1, '2022-03-11 12:15:14', '1645836373_D00001.jpg', 'Nescafé Blend & Brew Original 3 in 1', '10.99', 'Nescafé'),
(50, 5, 2, '2022-03-11 12:15:20', '1645836440_D00002.jpg', 'Nestlé Milo Activ-Go Softpack 2kg', '28.99', 'Nestlé'),
(69, 1, 4, '2022-03-13 16:47:26', '1645844986_G00002.jpg', 'Maggi 2 Minute Curry Flavour Noodles 5 x 79g', '4.35', 'Maggi');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `item_Id` int(20) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Quantity` int(40) NOT NULL,
  `Price` varchar(50) NOT NULL,
  `all_total` varchar(50) NOT NULL,
  `shipingPrice` varchar(50) NOT NULL,
  `Product_img` varchar(255) NOT NULL,
  `Product_code` varchar(20) NOT NULL,
  `Customer_Id` int(30) NOT NULL,
  `Order_Id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`item_Id`, `Name`, `Quantity`, `Price`, `all_total`, `shipingPrice`, `Product_img`, `Product_code`, `Customer_Id`, `Order_Id`) VALUES
(92, 'Nestlé Milo Activ-Go Softpack 2kg', 1, '28.99', '28.99', '10', '1645836440_D00002.jpg', 'D00002', 1, 89),
(93, 'Maggi 2 Minute Curry Flavour Noodles 5 x 79g', 1, '4.35', '4.35', '10', '1645844986_G00002.jpg', 'G00002', 1, 90),
(94, 'Maggi 2 Minute Curry Flavour Noodles 5 x 79g', 2, '4.35', '8.7', '10', '1645844986_G00002.jpg', 'G00002', 1, 91);

-- --------------------------------------------------------

--
-- Table structure for table `order_item`
--

CREATE TABLE `order_item` (
  `item_Id` int(20) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Quantity` int(40) NOT NULL,
  `Price` varchar(50) NOT NULL,
  `all_total` varchar(50) NOT NULL,
  `Product_img` varchar(255) NOT NULL,
  `Product_code` varchar(50) NOT NULL,
  `Customer_Id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `order_process`
--

CREATE TABLE `order_process` (
  `Order_Id` int(20) NOT NULL,
  `Order_date` datetime NOT NULL DEFAULT current_timestamp(),
  `subtotal` varchar(30) NOT NULL,
  `Customer_Id` int(20) NOT NULL,
  `Admin_Id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_process`
--

INSERT INTO `order_process` (`Order_Id`, `Order_date`, `subtotal`, `Customer_Id`, `Admin_Id`) VALUES
(89, '2022-03-13 17:12:50', '28.99', 1, 0),
(90, '2022-03-13 17:15:31', '4.35', 1, 0),
(91, '2022-03-13 17:19:36', '8.7', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `Payment_Id` int(20) NOT NULL,
  `Payment_Amount` varchar(50) NOT NULL,
  `Payment_Method` varchar(50) NOT NULL,
  `cardnum` varchar(50) NOT NULL,
  `shipping_price` varchar(50) NOT NULL,
  `Subtotal` varchar(50) NOT NULL,
  `cus_name` varchar(50) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `card_expdate` date DEFAULT NULL,
  `cvv` int(10) NOT NULL,
  `Address` varchar(200) NOT NULL,
  `Order_Id` int(20) NOT NULL,
  `Shipping_Id` int(20) NOT NULL,
  `Customer_Id` int(20) NOT NULL,
  `Payment_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`Payment_Id`, `Payment_Amount`, `Payment_Method`, `cardnum`, `shipping_price`, `Subtotal`, `cus_name`, `phone`, `email`, `card_expdate`, `cvv`, `Address`, `Order_Id`, `Shipping_Id`, `Customer_Id`, `Payment_time`) VALUES
(65, '38.99', 'Visacard', '4848484848484848', '10', '28.99', 'niama', '0136306455', 'niama@gmail.com', '2022-03-29', 485, 'Jalan Ayer Keroh Lama, 75450 Bukit Beruang, Melaka', 89, 37, 1, '2022-03-13 17:12:50'),
(66, '14.35', 'Visacard', '4848484848484848', '10', '4.35', 'niama', '0136306455', 'niama@gmail.com', '2022-03-31', 485, 'Jalan Ayer Keroh Lama, 75450 Bukit Beruang, Melaka', 90, 38, 1, '2022-03-13 17:15:31'),
(67, '18.7', 'Visacard', '4848484848484848', '10', '8.7', 'niama', '0136306455', 'niama@gmail.com', '2022-03-23', 485, 'Jalan Ayer Keroh Lama, 75450 Bukit Beruang, Melaka', 91, 39, 1, '2022-03-13 17:19:36');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `Product_id` int(20) NOT NULL,
  `Product_code` varchar(100) NOT NULL,
  `Product_name` varchar(200) NOT NULL,
  `Price` varchar(100) NOT NULL,
  `Product_Quantity` varchar(400) NOT NULL,
  `Brand` varchar(50) NOT NULL,
  `Description` varchar(400) NOT NULL,
  `Category_Id` int(30) NOT NULL,
  `Admin_Id` int(30) NOT NULL,
  `Status` varchar(20) NOT NULL,
  `category_type_id` int(20) NOT NULL,
  `Product_img` varchar(255) NOT NULL,
  `product_isDelete` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`Product_id`, `Product_code`, `Product_name`, `Price`, `Product_Quantity`, `Brand`, `Description`, `Category_Id`, `Admin_Id`, `Status`, `category_type_id`, `Product_img`, `product_isDelete`) VALUES
(1, 'D00001', 'Nescafé Blend & Brew Original 3 in 1', '10.99', '642', 'Nescafé', 'This product is certified halal by Jakim. Suppliers’ halal certification for local chicken/beef are from JAKIM/JAIN whilst imported beef/buffalo/lamb/mutton from Islamic bodies recognized by JAKIM in Australia, New Zealand, India', 4, 1, 'in_stock ', 0, '1645836373_D00001.jpg', 0),
(2, 'D00002', 'Nestlé Milo Activ-Go Softpack 2kg', '28.99', '94', 'Nestlé', 'Nestlé® Good Food, Good Life  Nutritious chocolate malt drink  Serving Size: 33g, Servings Per Pack: 18', 4, 1, 'in_stock ', 0, '1645836440_D00002.jpg', 0),
(3, 'G00001', 'Gula Prai Caster Sugar 500g', '2.39', '40', 'Caster Sugar', 'This product is certified halal by Jakim. Suppliers’ halal certification for local chicken/beef are from JAKIM/JAIN whilst imported beef/buffalo/lamb/mutton from Islamic bodies recognized by JAKIM in Australia, New Zealand, India', 2, 1, 'in_stock', 3, '1646973738_G00001.jpg', 0),
(4, 'G00002', 'Maggi 2 Minute Curry Flavour Noodles 5 x 79g', '4.35', '5', 'Maggi', 'Noodle Cake: Wheat Flour, Palm Oil, Salt, Mineral (Potassium Chloride). Contains Stabilisers as Permitted Food Conditioner. All Additives are of Plant or Synthetic Origin, Soup Mix: Salt, Tapioca Starch, Palm Fat and Olein, Wheat Flour, Chilli, Sugar, Mineral (Potassium Chloride), Spices, Garlic, Coriander, Onion, Cumin. Contains Monosodium Glutamate, Yeast Extract, Sodium Inosinate and Sodium Gua', 2, 1, 'in_stock ', 5, '1645844986_G00002.jpg', 0),
(8, 'D00003', 'Dutch Lady Pure Farm Full Cream Milk 1L', '6.80', '100', 'Dutch Lady', 'Building a strong family takes time\r\nSo does producing quality milk. With generations of expertise and farming passion, we know what it takes to make delicious and nutritious milk\r\n\r\nMilk is full of essential nutrients that are indispensable for daily life. 2 serving a day provide all the goodness to nourish you and your family\r\n\r\nThis Milk is High in Vitamin D3, 2 servings provide 16g of protein ', 4, 1, 'in_stock ', 4, '1646024158_D00003.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `shipping`
--

CREATE TABLE `shipping` (
  `Shipping_Id` int(20) NOT NULL,
  `Shipping_Address` varchar(300) NOT NULL,
  `Date` datetime NOT NULL DEFAULT current_timestamp(),
  `Order_Id` int(20) NOT NULL,
  `Customer_Id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `shipping`
--

INSERT INTO `shipping` (`Shipping_Id`, `Shipping_Address`, `Date`, `Order_Id`, `Customer_Id`) VALUES
(37, 'Jalan Ayer Keroh Lama, 75450 Bukit Beruang, Melaka', '2022-03-13 17:12:50', 89, 1),
(38, 'Jalan Ayer Keroh Lama, 75450 Bukit Beruang, Melaka', '2022-03-13 17:15:31', 90, 1),
(39, 'Jalan Ayer Keroh Lama, 75450 Bukit Beruang, Melaka', '2022-03-13 17:19:36', 91, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `cart_items`
--
ALTER TABLE `cart_items`
  ADD PRIMARY KEY (`Cart_Id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`Category_Id`);

--
-- Indexes for table `category_type`
--
ALTER TABLE `category_type`
  ADD PRIMARY KEY (`category_type_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`Customer_Id`);

--
-- Indexes for table `favourite`
--
ALTER TABLE `favourite`
  ADD PRIMARY KEY (`Favorite_Id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`item_Id`);

--
-- Indexes for table `order_item`
--
ALTER TABLE `order_item`
  ADD PRIMARY KEY (`item_Id`);

--
-- Indexes for table `order_process`
--
ALTER TABLE `order_process`
  ADD PRIMARY KEY (`Order_Id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`Payment_Id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`Product_id`);

--
-- Indexes for table `shipping`
--
ALTER TABLE `shipping`
  ADD PRIMARY KEY (`Shipping_Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `cart_items`
--
ALTER TABLE `cart_items`
  MODIFY `Cart_Id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=325;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `Category_Id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `category_type`
--
ALTER TABLE `category_type`
  MODIFY `category_type_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `Customer_Id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `favourite`
--
ALTER TABLE `favourite`
  MODIFY `Favorite_Id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `item_Id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT for table `order_item`
--
ALTER TABLE `order_item`
  MODIFY `item_Id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=177;

--
-- AUTO_INCREMENT for table `order_process`
--
ALTER TABLE `order_process`
  MODIFY `Order_Id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `Payment_Id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `Product_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `shipping`
--
ALTER TABLE `shipping`
  MODIFY `Shipping_Id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

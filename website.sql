-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 18, 2024 at 10:07 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `website`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_accounts`
--

CREATE TABLE `admin_accounts` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_accounts`
--

INSERT INTO `admin_accounts` (`id`, `name`, `username`, `password`) VALUES
(15, 'Roy Francis B. Castro', 'adminRoy', 'bf5cea53924bcdfed7201ba25f1f0961'),
(16, 'Christia Anna Q. Sarguet', 'adminAnna', '25d55ad283aa400af464c76d713c07ad'),
(17, 'Adrian Carl Artugue', 'AdminCarl', '25f9e794323b453885f5181f1b624d0b');

-- --------------------------------------------------------

--
-- Table structure for table `admin_log`
--

CREATE TABLE `admin_log` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `timein` timestamp NOT NULL DEFAULT current_timestamp(),
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_log`
--

INSERT INTO `admin_log` (`id`, `username`, `timein`, `date`) VALUES
(73, 'adminAnna', '2024-01-11 13:39:15', '2024-01-10'),
(74, 'adminRoy', '2024-01-11 13:41:01', '2024-01-10'),
(75, 'adminRoy', '2024-02-24 15:17:49', '2024-02-24'),
(76, 'adminAnna', '2024-02-24 15:18:07', '2024-02-24'),
(77, 'adminRoy', '2024-02-25 15:21:52', '2024-02-25'),
(78, 'adminRoy', '2024-02-26 10:46:07', '2024-02-26'),
(79, 'adminRoy', '2024-02-28 00:59:29', '2024-02-28'),
(80, 'adminAnna', '2024-02-29 01:43:40', '2024-02-29'),
(81, 'adminAnna', '2024-02-29 07:52:06', '2024-02-29'),
(82, 'adminRoy', '2024-02-29 07:52:13', '2024-02-29'),
(83, 'adminAnna', '2024-02-29 07:59:34', '2024-02-29'),
(84, 'adminAnna', '2024-03-01 07:28:06', '2024-03-01'),
(85, 'adminRoy', '2024-03-04 01:07:41', '2024-03-04'),
(86, 'adminRoy', '2024-03-05 01:38:58', '2024-03-05'),
(87, 'adminRoy', '2024-03-05 02:42:06', '2024-03-05'),
(88, 'adminAnna', '2024-03-05 02:45:55', '2024-03-05'),
(89, 'adminRoy', '2024-03-05 02:48:19', '2024-03-05'),
(90, 'adminAnna', '2024-03-06 00:21:15', '2024-03-06'),
(91, 'AdminCarl', '2024-03-08 00:29:13', '2024-03-08'),
(92, 'adminAnna', '2024-03-08 00:38:16', '2024-03-08'),
(93, 'adminAnna', '2024-03-08 08:38:44', '2024-03-08'),
(94, 'adminRoy', '2024-03-11 01:32:39', '2024-03-11'),
(95, 'adminRoy', '2024-03-11 06:10:46', '2024-03-11'),
(96, 'adminAnna', '2024-03-12 01:12:16', '2024-03-12'),
(97, 'adminAnna', '2024-03-12 07:44:02', '2024-03-12'),
(98, 'adminAnna', '2024-03-13 02:44:49', '2024-03-13'),
(99, 'adminRoy', '2024-03-14 02:35:59', '2024-03-14'),
(100, 'adminAnna', '2024-03-14 07:11:59', '2024-03-14'),
(101, 'adminAnna', '2024-03-15 00:26:43', '2024-03-15'),
(102, 'adminAnna', '2024-03-15 07:03:49', '2024-03-15');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `image` varchar(255) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` varchar(100) NOT NULL,
  `unit` varchar(255) NOT NULL,
  `quantity` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `image`, `name`, `price`, `unit`, `quantity`) VALUES
(152, 122, 'admin/uploaded_img/Screenshot 2024-01-10 214633.png', 'Slingback Carlson', '449', '{\"size\":\"9\",\"color\":\"Green\"}', 1),
(178, 124, 'admin/uploaded_img/Screenshot 2024-01-10 214833.png', 'Carly', '749', ' ', 1);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(255) NOT NULL,
  `category` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `category`) VALUES
(33, 'Flats'),
(34, 'Sandals'),
(37, 'Heels'),
(45, 'Slip-ons'),
(46, 'asdasdasd'),
(47, 'vvdvd'),
(48, 'asdasd'),
(49, 'zadasd'),
(50, 'iiyuiyui'),
(51, 'bhghfgh'),
(52, 'bcvnvb');

-- --------------------------------------------------------

--
-- Table structure for table `color`
--

CREATE TABLE `color` (
  `id` int(11) NOT NULL,
  `color_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `color`
--

INSERT INTO `color` (`id`, `color_name`) VALUES
(5, 'White'),
(6, 'Black'),
(7, 'Pink'),
(8, 'Beige'),
(9, 'Olive'),
(10, 'Cyan'),
(11, 'Rose Gold'),
(12, 'Brown'),
(13, 'Maroon'),
(14, 'Cream'),
(15, 'Green'),
(16, 'Gold'),
(17, 'Gray');

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `id` int(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `timein` timestamp NOT NULL DEFAULT current_timestamp(),
  `date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`id`, `email`, `timein`, `date`) VALUES
(55, 'lagegad669@ricorit.com', '2024-02-19 13:17:11', '2024-02-19'),
(56, 'castroroyfrancis@gmail.com', '2024-02-20 04:54:03', '2024-02-20'),
(57, 'castroroyfrancis@gmail.com', '2024-02-20 04:57:01', '2024-02-20'),
(58, 'castroroyfrancis@gmail.com', '2024-02-20 13:37:44', '2024-02-20'),
(59, 'castroroyfrancis@gmail.com', '2024-02-20 13:56:39', '2024-02-20'),
(60, 'castroroyfrancis@gmail.com', '2024-02-21 14:06:16', '2024-02-21'),
(61, 'castroroyfrancis@gmail.com', '2024-02-21 14:56:17', '2024-02-21'),
(62, 'castroroyfrancis@gmail.com', '2024-02-23 15:17:03', '2024-02-23'),
(63, 'castroroyfrancis@gmail.com', '2024-02-23 15:27:06', '2024-02-23'),
(64, 'castroroyfrancis@gmail.com', '2024-02-23 15:47:38', '2024-02-23'),
(65, 'castroroyfrancis@gmail.com', '2024-02-23 15:54:19', '2024-02-23'),
(66, 'castroroyfrancis@gmail.com', '2024-02-23 16:16:39', '2024-02-24'),
(67, 'castroroyfrancis@gmail.com', '2024-02-24 04:09:42', '2024-02-24'),
(68, 'castroroyfrancis@gmail.com', '2024-02-24 04:15:57', '2024-02-24'),
(69, 'castroroyfrancis@gmail.com', '2024-02-24 04:35:10', '2024-02-24'),
(70, 'papisss05@gmail.com', '2024-02-24 05:22:39', '2024-02-24'),
(71, 'castroroyfrancis@gmail.com', '2024-02-24 05:44:44', '2024-02-24'),
(72, 'castroroyfrancis@gmail.com', '2024-02-24 13:10:36', '2024-02-24'),
(73, 'castroroyfrancis@gmail.com', '2024-02-24 13:50:29', '2024-02-24'),
(74, 'castroroyfrancis@gmail.com', '2024-02-24 15:04:25', '2024-02-24'),
(75, 'castroroyfrancis@gmail.com', '2024-02-24 15:11:00', '2024-02-24'),
(76, 'castroroyfrancis@gmail.com', '2024-02-24 15:30:35', '2024-02-24'),
(77, 'papisss05@gmail.com', '2024-02-25 14:49:28', '2024-02-25'),
(78, 'castroroyfrancis@gmail.com', '2024-02-28 00:58:35', '2024-02-28'),
(79, 'castroroyfrancis@gmail.com', '2024-02-28 05:36:30', '2024-02-28'),
(80, 'castroroyfrancis@gmail.com', '2024-02-29 00:37:11', '2024-02-29'),
(81, 'mnlbusy@gmail.com', '2024-02-29 01:01:25', '2024-02-29'),
(82, 'castroroyfrancis@gmail.com', '2024-02-29 06:48:48', '2024-02-29'),
(83, 'castroroyfrancis@gmail.com', '2024-02-29 07:11:40', '2024-02-29'),
(84, 'castroroyfrancis@gmail.com', '2024-03-01 04:52:24', '2024-03-01'),
(85, 'castroroyfrancis@gmail.com', '2024-03-01 04:56:12', '2024-03-01'),
(86, 'papisss05@gmail.com', '2024-03-01 06:52:34', '2024-03-01'),
(87, 'castroroyfrancis@gmail.com', '2024-03-01 06:53:44', '2024-03-01'),
(88, 'castroroyfrancis@gmail.com', '2024-03-01 06:55:09', '2024-03-01'),
(89, 'castroroyfrancis@gmail.com', '2024-03-04 05:55:57', '2024-03-04'),
(90, 'castroroyfrancis@gmail.com', '2024-03-08 08:41:20', '2024-03-08'),
(91, 'castroroyfrancis@gmail.com', '2024-03-11 01:33:13', '2024-03-11'),
(92, 'castroroyfrancis@gmail.com', '2024-03-11 05:25:29', '2024-03-11'),
(93, 'jojonathanpeol3001@gmail.com', '2024-03-12 07:43:22', '2024-03-12'),
(94, 'castroroyfrancis@gmail.com', '2024-03-13 05:12:56', '2024-03-13'),
(95, 'castroroyfrancis@gmail.com', '2024-03-14 01:45:27', '2024-03-14'),
(96, 'castroroyfrancis@gmail.com', '2024-03-14 04:36:44', '2024-03-14'),
(97, 'castroroyfrancis@gmail.com', '2024-03-15 03:06:26', '2024-03-15'),
(98, 'castroroyfrancis@gmail.com', '2024-03-15 06:34:13', '2024-03-15');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `number` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `method` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `total_products` varchar(255) NOT NULL,
  `total_price` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` text NOT NULL,
  `date_created` date NOT NULL,
  `time_created` timestamp NOT NULL DEFAULT current_timestamp(),
  `reference_number` int(11) NOT NULL,
  `gcash_number` int(11) NOT NULL,
  `screenshot` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `name`, `number`, `email`, `method`, `address`, `total_products`, `total_price`, `user_id`, `status`, `date_created`, `time_created`, `reference_number`, `gcash_number`, `screenshot`) VALUES
(62, 'Papisss Castro', '09705162818', 'papisss05@gmail.com', 'cash on delivery', '5014 General Ricarte St. South Cembo, Taguig CIty', 'Carly sandals{\"size\":\"8\",\"color\":\"Gold\"}\n   (3) , Slingback Carlson{\"size\":\"5.5\",\"color\":\"Green\"}\n   (2) ', '3145', 119, 'order completed', '2024-02-26', '2024-02-26 11:30:22', 0, 0, ''),
(69, 'Paul Nateman Bustillo', '09557315312', 'mnlbusy@gmail.com', 'gcash', 'Kalbayog st. mandaluyong ', 'Slingback Carlson[SIZE{\"size\":\"9\",\"color\":\"Gold\"}]   (1) ', '449', 122, 'order completed', '2024-02-29', '2024-02-29 01:07:34', 1234556, 2147483647, '379659642_1406933606523189_1992127541307170051_n.jpg'),
(70, 'Roy Francis B. Castro', '09750162818', 'castroroyfrancis@gmail.com', 'cash on delivery', '5014 General Ricarte South Cembo, Taguig City', 'Slingback Carlson[SIZE{\"size\":\"5.5\",\"color\":\"White\"}]   (1) , Carly sandals[SIZE{\"size\":\"8\",\"color\":\"Gold\"}]   (2) , Slingback Carlson[SIZE{\"size\":\"9\",\"color\":\"Gold\"}]   (2) , Slingback Carlson[SIZE{\"size\":\"5.5\",\"color\":\"Brown\"}]   (1) ', '3294', 118, 'to ship', '2024-03-01', '2024-03-01 04:52:52', 0, 0, ''),
(71, 'Roy Francis B. Castro', '09750162818', 'castroroyfrancis@gmail.com', 'cash on delivery', '5014 General Ricarte South Cembo, Taguig City', 'Slingback Carlson[SIZE{\"size\":\"5.5\",\"color\":\"White\"}]   (1) , Carly sandals[SIZE{\"size\":\"8\",\"color\":\"Gold\"}]   (2) , Slingback Carlson[SIZE{\"size\":\"9\",\"color\":\"Gold\"}]   (2) , Slingback Carlson[SIZE{\"size\":\"5.5\",\"color\":\"Brown\"}]   (1) ', '3294', 118, 'to ship', '2024-03-01', '2024-03-01 04:53:38', 0, 0, ''),
(72, 'Roy Francis B. Castro', '09750162818', 'castroroyfrancis@gmail.com', 'cash on delivery', '5014 General Ricarte South Cembo, Taguig City', 'Slingback Carlson[SIZE{\"size\":\"5.5\",\"color\":\"White\"}]   (1) , Carly sandals[SIZE{\"size\":\"8\",\"color\":\"Gold\"}]   (2) , Slingback Carlson[SIZE{\"size\":\"9\",\"color\":\"Gold\"}]   (2) , Slingback Carlson[SIZE{\"size\":\"5.5\",\"color\":\"Brown\"}]   (1) ', '3294', 118, 'to ship', '2024-03-01', '2024-03-01 04:54:21', 0, 0, ''),
(73, 'Roy Francis B. Castro', '09750162818', 'castroroyfrancis@gmail.com', 'cash on delivery', '5014 General Ricarte South Cembo, Taguig City', 'Carly sandals[SIZE{\"size\":\"8\",\"color\":\"Gold\"}]   (2) <br>Slingback Carlson[SIZE{\"size\":\"9\",\"color\":\"Gold\"}]   (2) <br>Slingback Carlson[SIZE{\"size\":\"5.5\",\"color\":\"Brown\"}]   (1) ', '2845', 118, 'to ship', '2024-03-01', '2024-03-01 06:48:37', 0, 0, ''),
(74, 'Lebron James', '09750162818', 'castroroyfrancis@gmail.com', 'cash on delivery', '5014 General Ricarte South Cembo, Taguig City', 'Slingback Carlson[SIZE{\"size\":\"9\",\"color\":\"Gray\"}]   (1) \\nSlingback Carlson[SIZE{\"size\":\"5.5\",\"color\":\"Brown\"}]   (1) ', '898', 118, 'to ship', '2024-03-01', '2024-03-01 06:50:26', 0, 0, ''),
(75, 'Papisss Castro', '09557315312', 'papisss05@gmail.com', 'cash on delivery', 'Kalbayog st. mandaluyong', 'Carly[SIZE{\"size\":\"8\",\"color\":\"Gold\"}]   (1) /vSlingback Carlson[SIZE{\"size\":\"5.5\",\"color\":\"Brown\"}]   (1) ', '1198', 119, 'to ship', '2024-03-01', '2024-03-01 06:53:02', 0, 0, ''),
(76, 'Roy Francis B. Castro', '09750162818', 'castroroyfrancis@gmail.com', 'cash on delivery', '5014 General Ricarte South Cembo, Taguig City', 'Carly[SIZE{\"size\":\"8\",\"color\":\"Pink\"}]   (1) ,Slingback Carlson[SIZE{\"size\":\"5.5\",\"color\":\"Gray\"}]   (1) ', '1198', 118, 'to ship', '2024-03-01', '2024-03-01 06:55:31', 0, 0, ''),
(85, 'Jonathan', '09452051108', 'jojonathanpeol3001@gmail.com', 'cash on delivery', 'Marikina', 'Carly\n8 Black\n2', '1498', 124, 'to ship', '2024-03-12', '2024-03-12 07:41:44', 0, 0, ''),
(87, 'Roy Francis B. Castro', '09750162818', 'castroroyfrancis@gmail.com', 'cash on delivery', '5014 General Ricarte South Cembo, Taguig City', 'Presly\n8.5 Cyan\n1', '2400', 118, 'to ship', '2024-03-15', '2024-03-15 07:48:30', 0, 0, ''),
(88, 'Roy Francis B. Castro', '09750162818', 'castroroyfrancis@gmail.com', 'cash on delivery', '5014 General Ricarte South Cembo, Taguig City', 'Presly8 Black1', '2400', 118, 'to ship', '2024-03-15', '2024-03-15 08:22:18', 0, 0, ''),
(89, 'Roy Francis B. Castro', '09750162818', 'castroroyfrancis@gmail.com', 'cash on delivery', '5014 General Ricarte South Cembo, Taguig City', 'Presly[SIZE6.5 Black]   (3) \nPresly[SIZE11.5 Olive]   (1) ', '4800', 118, 'to ship', '2024-03-15', '2024-03-15 08:27:40', 0, 0, ''),
(90, 'Roy Francis B. Castro', '09750162818', 'castroroyfrancis@gmail.com', 'cash on delivery', '5014 General Ricarte South Cembo, Taguig City', '\\n Item:Presly SIZE & COLOR5 White] Quantity: (1) \n\\n Item:Presly SIZE & COLOR4.5 Olive] Quantity: (1) \n\\n Item:Presly SIZE & COLOR7 Black] Quantity: (1) \n\\n Item:Presly SIZE & COLOR5 Cyan] Quantity: (1) ', '4800', 118, 'order completed', '2024-03-15', '2024-03-15 08:41:39', 0, 0, ''),
(91, 'Roy Francis B. Castro', '09750162818', 'castroroyfrancis@gmail.com', 'cash on delivery', '5014 General Ricarte South Cembo, Taguig City', 'Item:Presly SIZE & COLOR [5.5 Pink] Quantity: (1) \nItem:Presly SIZE & COLOR [5 Beige] Quantity: (1) \nItem:Presly SIZE & COLOR [6.5 Black] Quantity: (1) ', '3600', 118, 'to receive', '2024-03-15', '2024-03-15 08:46:32', 0, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `category` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` int(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `date_created` date NOT NULL,
  `time_created` timestamp NOT NULL DEFAULT current_timestamp(),
  `date_edited` date NOT NULL,
  `time_edited` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category`, `name`, `price`, `image`, `description`, `date_created`, `time_created`, `date_edited`, `time_edited`) VALUES
(34, 'Slip-ons', 'Presly', 1200, 'admin/uploaded_img/431780365_18423152689013011_7830608783600598095_n.jpg', 'Your wardrobe\'s must-have. Presley slip-ons! Back in stock and ready to elevate your style game. Slip into comfort, class, and versatility - get yours now!', '2024-03-13', '2024-03-13 02:46:42', '2024-03-18', '2024-03-18 00:19:05'),
(35, 'Flats', 'Maggie', 649, 'admin/uploaded_img/428703023_18418024639013011_2462875183673748442_n.jpg', 'Twirl in style with Maggie ballerina shoes, exclusively at Nifty Shoes! Hurry, before they pirouette out of stock! ✨🥿 #NiftyShoes #BalletBeauty #staycomfywearnifty #niftyshoesprestigecollection', '2024-03-13', '2024-03-13 02:49:08', '0000-00-00', '2024-03-13 02:49:08');

-- --------------------------------------------------------

--
-- Table structure for table `product_log`
--

CREATE TABLE `product_log` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `date_log` date NOT NULL,
  `time_log` time NOT NULL DEFAULT current_timestamp(),
  `edit_create` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_log`
--

INSERT INTO `product_log` (`id`, `username`, `date_log`, `time_log`, `edit_create`) VALUES
(86, 'adminRoy', '2024-01-10', '21:41:37', 'created a category : Flats'),
(87, 'adminRoy', '2024-01-10', '21:41:41', 'created a category : Sandals'),
(88, 'adminRoy', '2024-01-10', '21:41:44', 'created a category : Pumps'),
(89, 'adminRoy', '2024-01-10', '21:41:48', 'created a category : Wedges'),
(90, 'adminRoy', '2024-01-10', '21:46:53', 'createa a product : Slingback Carlson'),
(91, 'adminRoy', '2024-01-10', '21:49:34', 'createa a product : Carly sandals'),
(92, 'adminRoy', '2024-01-10', '21:53:13', 'createa a product : Ferdie Fishermans Sandals'),
(93, 'adminRoy', '2024-01-10', '21:53:16', 'createa a product : Ferdie Fishermans Sandals'),
(94, 'adminRoy', '2024-01-10', '21:53:37', 'createa a product : Ferdie Fishermans Sandals'),
(95, 'adminRoy', '2024-01-10', '21:56:32', 'created a category : Heels'),
(96, 'adminRoy', '2024-01-10', '21:57:15', 'createa a product : Mathilda'),
(97, 'adminRoy', '2024-01-10', '22:00:31', 'createa a product : FERRY'),
(98, 'adminRoy', '2024-01-10', '22:01:59', 'createa a product : Presley'),
(99, 'adminRoy', '2024-01-10', '22:03:30', 'createa a product : Gretel Mule'),
(100, 'adminRoy', '2024-01-10', '22:05:47', 'createa a product : Samantha'),
(101, 'adminRoy', '2024-01-10', '22:13:25', 'add a stock of product id : 19'),
(102, 'adminRoy', '2024-01-10', '22:13:39', 'add a stock of product id : 19'),
(103, 'adminRoy', '2024-01-10', '22:14:15', 'add a stock of product id : 19'),
(104, 'adminRoy', '2024-01-10', '22:14:25', 'add a stock of product id : 19'),
(105, 'adminRoy', '2024-01-10', '22:14:32', 'add a stock of product id : 19'),
(106, 'adminRoy', '2024-01-10', '22:15:16', 'add a stock of product id : 19'),
(107, 'adminRoy', '2024-01-10', '22:15:22', 'add a stock of product id : 19'),
(108, 'adminRoy', '2024-01-10', '22:16:30', 'add a stock of product id : 19'),
(109, 'adminAnna', '2024-02-24', '23:34:06', 'updated order status (to receive) : order number 59'),
(110, 'adminAnna', '2024-02-24', '23:34:11', 'updated order status (completed) : order number 59'),
(111, 'adminRoy', '2024-02-26', '18:46:19', 'add a stock of product id : 20'),
(112, 'adminRoy', '2024-02-26', '19:13:57', 'add a stock of product id : 20'),
(113, 'adminRoy', '2024-02-27', '21:04:49', 'add a stock of product id : 19'),
(114, 'adminAnna', '2024-02-29', '09:44:52', 'updated order status (to receive) : order number 62'),
(115, 'adminAnna', '2024-02-29', '09:47:40', 'updated order status (completed) : order number 62'),
(116, 'adminAnna', '2024-02-29', '09:48:52', 'updated order status (to receive) : order number 69'),
(117, 'adminAnna', '2024-02-29', '09:50:17', 'updated order status (completed) : order number 69'),
(118, 'adminRoy', '2024-02-29', '15:52:38', 'edit product name'),
(119, 'adminRoy', '2024-02-29', '15:52:51', 'edit product name'),
(120, 'adminRoy', '2024-03-04', '09:07:49', 'created a category : Rubber Shoes'),
(121, 'adminRoy', '2024-03-05', '13:24:55', 'createa a product : CArl'),
(122, '', '2024-03-05', '13:25:46', 'deleted a product : '),
(123, 'adminRoy', '2024-03-05', '14:36:26', 'createa a product : yes'),
(124, '', '2024-03-05', '14:36:37', 'deleted a product : '),
(125, 'adminRoy', '2024-03-05', '15:17:11', 'edit product name'),
(126, 'adminRoy', '2024-03-05', '15:17:19', 'edit product name'),
(127, 'adminRoy', '2024-03-05', '15:17:37', 'change product image'),
(128, 'adminRoy', '2024-03-05', '15:17:45', 'change product image'),
(129, 'adminRoy', '2024-03-05', '15:18:33', 'change product image'),
(130, 'adminRoy', '2024-03-05', '15:18:40', 'change product image'),
(131, 'adminRoy', '2024-03-05', '15:19:25', 'change product image'),
(132, 'adminRoy', '2024-03-05', '15:19:30', 'change product image'),
(133, 'adminRoy', '2024-03-05', '15:19:34', 'change product image'),
(134, 'adminRoy', '2024-03-05', '15:36:28', 'edit product description'),
(135, 'adminRoy', '2024-03-05', '15:36:34', 'edit product description'),
(136, 'adminRoy', '2024-03-05', '15:42:48', 'edit product name'),
(137, 'adminRoy', '2024-03-05', '15:42:53', 'edit product name'),
(138, 'adminAnna', '2024-03-06', '13:06:24', 'add a stock of product id : 26'),
(139, 'adminAnna', '2024-03-06', '13:06:56', 'add a stock of product id : 26'),
(140, 'adminAnna', '2024-03-06', '13:07:15', 'add a stock of product id : 26'),
(141, 'adminAnna', '2024-03-06', '13:07:21', 'add a stock of product id : 26'),
(142, 'adminAnna', '2024-03-06', '13:07:37', 'add a stock of product id : 26'),
(143, 'adminAnna', '2024-03-06', '13:07:51', 'add a stock of product id : 26'),
(144, 'adminAnna', '2024-03-08', '09:18:23', 'created a category : 123'),
(145, 'adminAnna', '2024-03-08', '09:32:06', 'created a category : check'),
(146, 'adminAnna', '2024-03-08', '09:44:09', 'created a category : Rubber Shoes'),
(147, 'adminAnna', '2024-03-08', '09:44:15', 'deleted a product : '),
(148, 'adminAnna', '2024-03-08', '10:33:38', 'deleted a product : '),
(149, 'adminAnna', '2024-03-08', '10:38:20', 'deleted a product : '),
(150, 'adminAnna', '2024-03-08', '10:38:26', 'created a category : Rubber Shoes'),
(151, 'adminAnna', '2024-03-08', '10:38:31', 'deleted a product : '),
(152, 'adminAnna', '2024-03-08', '10:43:32', 'created a category : Rubber Shoes'),
(153, 'adminAnna', '2024-03-08', '10:50:21', 'created a category : Rubber Shoes'),
(154, 'adminAnna', '2024-03-08', '10:50:24', 'deleted category : '),
(155, 'adminAnna', '2024-03-08', '10:52:22', 'deleted a color : '),
(156, 'adminAnna', '2024-03-08', '10:53:56', 'deleted a color'),
(157, 'adminAnna', '2024-03-08', '10:54:16', 'deleted a color'),
(158, 'adminRoy', '2024-03-11', '14:14:05', 'create a product : asdasd'),
(159, 'adminRoy', '2024-03-11', '14:15:26', 'deleted a product'),
(160, 'adminRoy', '2024-03-11', '14:19:19', 'deleted a product'),
(161, 'adminRoy', '2024-03-11', '16:18:16', 'deleted a product'),
(162, 'adminRoy', '2024-03-11', '16:18:30', 'add a stock of product id : 20'),
(163, 'adminRoy', '2024-03-11', '16:18:34', 'add a stock of product id : 20'),
(164, 'adminRoy', '2024-03-11', '16:18:37', 'add a stock of product id : 20'),
(165, 'adminRoy', '2024-03-11', '16:18:41', 'add a stock of product id : 20'),
(166, 'adminAnna', '2024-03-12', '10:10:13', 'create a product : Test Product'),
(167, 'adminAnna', '2024-03-12', '10:10:23', 'deleted a product'),
(168, 'adminAnna', '2024-03-12', '10:10:34', 'create a product : Test Product'),
(169, 'adminAnna', '2024-03-12', '10:10:34', 'deleted a product'),
(170, 'adminAnna', '2024-03-12', '10:10:49', 'deleted a product'),
(171, 'adminAnna', '2024-03-12', '10:11:00', 'create a product : Test Product'),
(172, 'adminAnna', '2024-03-12', '10:19:36', 'add a stock of product id : 32'),
(173, 'adminAnna', '2024-03-12', '10:19:38', 'add a stock of product id : 32'),
(174, 'adminAnna', '2024-03-12', '10:19:41', 'add a stock of product id : 32'),
(175, 'adminAnna', '2024-03-12', '10:19:49', 'add a stock of product id : 32'),
(176, 'adminAnna', '2024-03-12', '10:19:53', 'add a stock of product id : 32'),
(177, 'adminAnna', '2024-03-12', '10:20:03', 'add a stock of product id : 32'),
(178, 'adminAnna', '2024-03-12', '10:59:30', 'create a product : PRODUCT TEST'),
(179, 'adminAnna', '2024-03-13', '10:45:13', 'deleted a product'),
(180, 'adminAnna', '2024-03-13', '10:45:16', 'deleted a product'),
(181, 'adminAnna', '2024-03-13', '10:45:20', 'deleted a product'),
(182, 'adminAnna', '2024-03-13', '10:45:22', 'deleted a product'),
(183, 'adminAnna', '2024-03-13', '10:45:24', 'deleted a product'),
(184, 'adminAnna', '2024-03-13', '10:45:26', 'deleted a product'),
(185, 'adminAnna', '2024-03-13', '10:45:29', 'deleted a product'),
(186, 'adminAnna', '2024-03-13', '10:45:31', 'deleted a product'),
(187, 'adminAnna', '2024-03-13', '10:45:33', 'deleted a product'),
(188, 'adminAnna', '2024-03-13', '10:46:12', 'deleted a product'),
(189, 'adminAnna', '2024-03-13', '10:46:12', 'created a category : Slip-ons'),
(190, 'adminAnna', '2024-03-13', '10:46:42', 'create a product : Presly'),
(191, 'adminAnna', '2024-03-13', '10:49:08', 'create a product : Maggie'),
(192, 'adminAnna', '2024-03-13', '13:16:00', 'add a stock of product id : 35'),
(193, 'adminAnna', '2024-03-13', '13:16:04', 'add a stock of product id : 35'),
(194, 'adminAnna', '2024-03-13', '13:16:08', 'add a stock of product id : 35'),
(195, 'adminAnna', '2024-03-13', '13:16:25', 'add a stock of product id : 34'),
(196, 'adminAnna', '2024-03-13', '13:16:28', 'add a stock of product id : 34'),
(197, 'adminRoy', '2024-03-14', '10:36:06', 'updated order status (to receive) : order number 84'),
(198, 'adminRoy', '2024-03-14', '10:36:08', 'updated order status (to receive) : order number 84'),
(199, 'adminRoy', '2024-03-14', '10:36:15', 'updated order status (to receive) : order number 83'),
(200, 'adminRoy', '2024-03-14', '10:36:31', 'updated order status (completed) : order number 83'),
(201, 'adminAnna', '2024-03-14', '15:12:15', 'create a product : asdasda'),
(202, 'adminAnna', '2024-03-14', '15:12:31', 'create a product : asdasdasd'),
(203, 'adminAnna', '2024-03-14', '15:12:43', 'create a product : asdasdas'),
(204, 'adminAnna', '2024-03-14', '15:12:53', 'create a product : asdasd'),
(205, 'adminAnna', '2024-03-14', '15:13:17', 'create a product : asdasd'),
(206, 'adminAnna', '2024-03-15', '10:09:08', 'create a product : asdasd'),
(207, 'adminAnna', '2024-03-15', '10:09:21', 'create a product : qeqweqwe'),
(208, 'adminAnna', '2024-03-15', '10:09:35', 'create a product : 3213213213'),
(209, 'adminAnna', '2024-03-15', '10:19:15', 'created a category : asdasdasd'),
(210, 'adminAnna', '2024-03-15', '10:19:20', 'created a category : vvdvd'),
(211, 'adminAnna', '2024-03-15', '10:19:24', 'created a category : asdasd'),
(212, 'adminAnna', '2024-03-15', '10:19:28', 'created a category : zadasd'),
(213, 'adminAnna', '2024-03-15', '10:19:32', 'created a category : iiyuiyui'),
(214, 'adminAnna', '2024-03-15', '10:19:37', 'created a category : bhghfgh'),
(215, 'adminAnna', '2024-03-15', '10:19:41', 'created a category : bcvnvb'),
(216, 'adminAnna', '2024-03-15', '10:19:49', 'created a category : ,nm,nm,'),
(217, 'adminAnna', '2024-03-15', '10:19:53', 'created a category : bnmbnm'),
(218, 'adminAnna', '2024-03-15', '10:19:58', 'created a category : dfgdfg'),
(219, 'adminAnna', '2024-03-15', '10:20:02', 'created a category : ertetert'),
(220, 'adminAnna', '2024-03-15', '10:21:17', 'deleted category'),
(221, 'adminAnna', '2024-03-15', '10:21:20', 'deleted category'),
(222, 'adminAnna', '2024-03-15', '10:21:22', 'deleted category'),
(223, 'adminAnna', '2024-03-15', '10:21:25', 'deleted category'),
(224, 'adminAnna', '2024-03-15', '10:21:28', 'created a category : zxczxc'),
(225, 'adminAnna', '2024-03-15', '10:21:29', 'deleted category'),
(226, 'adminAnna', '2024-03-15', '10:21:35', 'created a category : nvbnv'),
(227, 'adminAnna', '2024-03-15', '10:21:38', 'created a category : gdfgdf'),
(228, 'adminAnna', '2024-03-15', '10:21:42', 'created a category : poiuuio'),
(229, 'adminAnna', '2024-03-15', '12:51:25', 'edit product name'),
(230, 'adminAnna', '2024-03-15', '12:51:49', 'edit product name'),
(231, 'adminAnna', '2024-03-15', '12:52:15', 'edit product name'),
(232, 'adminAnna', '2024-03-15', '12:53:25', 'deleted category'),
(233, 'adminAnna', '2024-03-15', '12:53:28', 'deleted category'),
(234, 'adminAnna', '2024-03-15', '12:53:31', 'deleted category'),
(235, 'adminAnna', '2024-03-15', '12:53:34', 'deleted category'),
(236, '', '2024-03-15', '15:03:41', 'deleted category'),
(237, 'adminAnna', '2024-03-15', '15:04:00', 'add a stock of product id : 34'),
(238, 'adminAnna', '2024-03-15', '15:04:06', 'add a stock of product id : 34'),
(239, 'adminAnna', '2024-03-15', '15:04:10', 'add a stock of product id : 34'),
(240, 'adminAnna', '2024-03-15', '15:04:16', 'add a stock of product id : 34'),
(241, 'adminAnna', '2024-03-15', '15:04:21', 'add a stock of product id : 34'),
(242, 'adminAnna', '2024-03-15', '15:04:24', 'add a stock of product id : 34'),
(243, 'adminAnna', '2024-03-15', '15:04:27', 'add a stock of product id : 34'),
(244, 'adminAnna', '2024-03-15', '15:04:30', 'add a stock of product id : 34'),
(245, 'adminAnna', '2024-03-15', '15:04:34', 'add a stock of product id : 34'),
(246, 'adminAnna', '2024-03-15', '15:05:26', 'add a stock of product id : 34'),
(247, 'adminAnna', '2024-03-15', '15:05:30', 'add a stock of product id : 34'),
(248, 'adminAnna', '2024-03-15', '15:05:33', 'add a stock of product id : 34'),
(249, 'adminAnna', '2024-03-15', '15:05:37', 'add a stock of product id : 34'),
(250, 'adminAnna', '2024-03-15', '15:14:19', 'edit product description'),
(251, 'adminAnna', '2024-03-15', '15:14:38', 'edit product description'),
(252, 'adminAnna', '2024-03-18', '08:19:05', 'edit product description'),
(253, 'adminAnna', '2024-03-18', '10:32:26', 'updated order status (to receive) : order number 91'),
(254, 'adminAnna', '2024-03-18', '10:32:42', 'updated order status (completed) : order number 90'),
(255, 'adminAnna', '2024-03-18', '16:39:42', 'deleted a product'),
(256, 'adminAnna', '2024-03-18', '16:39:45', 'deleted a product'),
(257, 'adminAnna', '2024-03-18', '16:39:47', 'deleted a product'),
(258, 'adminAnna', '2024-03-18', '16:39:49', 'deleted a product'),
(259, 'adminAnna', '2024-03-18', '16:39:50', 'deleted a product'),
(260, 'adminAnna', '2024-03-18', '16:39:52', 'deleted a product'),
(261, 'adminAnna', '2024-03-18', '16:39:55', 'deleted a product'),
(262, 'adminAnna', '2024-03-18', '16:39:57', 'deleted a product'),
(263, 'adminAnna', '2024-03-18', '17:06:46', 'deleted a product');

-- --------------------------------------------------------

--
-- Table structure for table `product_units`
--

CREATE TABLE `product_units` (
  `id` int(11) NOT NULL,
  `unit_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_units`
--

INSERT INTO `product_units` (`id`, `unit_name`) VALUES
(18, '5'),
(19, '5.5'),
(20, '6'),
(21, '6.5'),
(22, '7'),
(23, '7.5'),
(24, '8'),
(25, '8.5'),
(26, '9'),
(27, '10'),
(29, '4'),
(30, '4.5'),
(31, '11'),
(32, '11.5');

-- --------------------------------------------------------

--
-- Table structure for table `review_table`
--

CREATE TABLE `review_table` (
  `review_id` int(11) NOT NULL,
  `user_name` varchar(200) NOT NULL,
  `user_rating` int(1) NOT NULL,
  `user_review` text NOT NULL,
  `datetime` int(11) NOT NULL,
  `product_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `review_table`
--

INSERT INTO `review_table` (`review_id`, `user_name`, `user_rating`, `user_review`, `datetime`, `product_id`) VALUES
(23, 'Roy Francis B. Castro', 1, 'ANG PANGET NG PRODUCT NYO ', 1710488765, 34);

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `sales_id` int(11) NOT NULL,
  `orders_id` int(11) NOT NULL,
  `total_price` int(11) NOT NULL,
  `date_created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`sales_id`, `orders_id`, `total_price`, `date_created`) VALUES
(22, 59, 1347, '2024-02-24'),
(23, 60, 449, '2024-02-24'),
(24, 61, 7633, '2024-02-26'),
(25, 62, 3145, '2024-02-26'),
(32, 69, 449, '2024-02-29'),
(33, 70, 3294, '2024-03-01'),
(34, 71, 3294, '2024-03-01'),
(35, 72, 3294, '2024-03-01'),
(36, 73, 2845, '2024-03-01'),
(37, 74, 898, '2024-03-01'),
(38, 75, 1198, '2024-03-01'),
(39, 76, 1198, '2024-03-01'),
(40, 77, 898, '2024-03-01'),
(41, 78, 449, '2024-03-01'),
(42, 79, 749, '2024-03-01'),
(43, 80, 449, '2024-03-01'),
(44, 81, 449, '2024-03-01'),
(45, 82, 2247, '2024-03-11'),
(46, 83, 1498, '2024-03-11'),
(47, 84, 1498, '2024-03-11'),
(48, 85, 1498, '2024-03-12'),
(49, 86, 3600, '2024-03-15'),
(50, 87, 2400, '2024-03-15'),
(51, 88, 2400, '2024-03-15'),
(52, 89, 4800, '2024-03-15'),
(53, 90, 4800, '2024-03-15'),
(54, 91, 3600, '2024-03-15');

-- --------------------------------------------------------

--
-- Table structure for table `stocks`
--

CREATE TABLE `stocks` (
  `id` int(11) NOT NULL,
  `product_id` int(255) NOT NULL,
  `unit_name` varchar(255) NOT NULL,
  `color_name` varchar(255) NOT NULL,
  `date_created` date NOT NULL,
  `time_created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `stocks`
--

INSERT INTO `stocks` (`id`, `product_id`, `unit_name`, `color_name`, `date_created`, `time_created`) VALUES
(60, 35, '5', 'Pink', '2024-03-13', '2024-03-13 05:16:00'),
(61, 35, '5.5', 'White', '2024-03-13', '2024-03-13 05:16:05'),
(62, 35, '7', 'Pink', '2024-03-13', '2024-03-13 05:16:08'),
(63, 34, '5.5', 'Pink', '2024-03-13', '2024-03-13 05:16:25'),
(64, 34, '7.5', 'Beige', '2024-03-13', '2024-03-13 05:16:29'),
(65, 34, '5', 'White', '2024-03-15', '2024-03-15 07:04:01'),
(66, 34, '6', 'Black', '2024-03-15', '2024-03-15 07:04:06'),
(67, 34, '6.5', 'Black', '2024-03-15', '2024-03-15 07:04:10'),
(68, 34, '7', 'Pink', '2024-03-15', '2024-03-15 07:04:16'),
(69, 34, '7.5', 'Pink', '2024-03-15', '2024-03-15 07:04:21'),
(70, 34, '8', 'Black', '2024-03-15', '2024-03-15 07:04:24'),
(71, 34, '8.5', 'Pink', '2024-03-15', '2024-03-15 07:04:27'),
(72, 34, '9', 'Black', '2024-03-15', '2024-03-15 07:04:30'),
(73, 34, '10', 'White', '2024-03-15', '2024-03-15 07:04:34'),
(74, 34, '11', 'White', '2024-03-15', '2024-03-15 07:05:27'),
(75, 34, '4', 'Cyan', '2024-03-15', '2024-03-15 07:05:30'),
(76, 34, '11.5', 'Rose Gold', '2024-03-15', '2024-03-15 07:05:34'),
(77, 34, '4.5', 'Olive', '2024-03-15', '2024-03-15 07:05:37');

-- --------------------------------------------------------

--
-- Table structure for table `upload`
--

CREATE TABLE `upload` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `homepage_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `upload`
--

INSERT INTO `upload` (`id`, `title`, `description`, `address`, `contact`, `email`, `logo`, `homepage_image`) VALUES
(1, 'NIFTY SHOES', 'FLATS, SANDALS, PUMPS, WEDGES, AND OTHER NIFTY SHOES FOR WOMEN.', '121 Malaya St. Malanday, Marikina City, Marikina City, Philippines	', '09064997545', 'niftyshoesph@gmail.com', 'homelogo.png', 'homepic.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `usertable`
--

CREATE TABLE `usertable` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `code` mediumint(50) NOT NULL,
  `status` text NOT NULL,
  `contact` varchar(11) NOT NULL,
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `usertable`
--

INSERT INTO `usertable` (`id`, `name`, `email`, `password`, `code`, `status`, `contact`, `address`) VALUES
(118, 'Roy Francis B. Castro', 'castroroyfrancis@gmail.com', '$2y$10$noVYO71Nkj8Wzfu0eHZYn..XkDz85Uhmjks/wgPvjn/bTS7ZNXYCe', 0, 'verified', '09750162818', '5014 General Ricarte South Cembo, Taguig City'),
(119, 'Papisss Castro', 'papisss05@gmail.com', '$2y$10$xfEw/WgMFH/OP11ZqEDVt.hHvk.aktmSPlvah26TGgRYtPB5uHpaq', 0, 'verified', '', ''),
(120, 'Roy Francis B. Castro', 'castroroyfrancis05@gmail.com', '$2y$10$tPgyFiePl9yiKHwsESA9m.fpQ5bKiv6h79elluF7akFN8WVC3xLia', 0, 'verified', '', ''),
(121, 'Roy Francis B. Castro', 'lagegad669@ricorit.com', '$2y$10$.xIrcRSCxQ6B1ap.7W6zg.pj03JbnuLrNpdGz1c0hEGU7jjLvYV4G', 0, 'verified', '', ''),
(122, 'Paul Nateman Bustillo', 'mnlbusy@gmail.com', '$2y$10$Gq78J21qoOqHbuT6bczGsu9mh0bX.//Z2pGeR7YrIHGG14gO616QO', 0, 'verified', '09557315312', 'Kalbayog st. mandaluyong'),
(123, 'd', 'd@d.d', '$2y$10$uEP.mKAeEn2tcyfHRQQ/g..PX7vCgSwoiqe4dLwiHgR6wuKGaZcI6', 848376, 'notverified', '', 'd'),
(124, 'Jonathan', 'jojonathanpeol3001@gmail.com', '$2y$10$MUJS6SPOq5UIWcEAiGsSqe0vR5nJOo7UGoztWZjGn71WGRyI5x3je', 0, 'verified', '09452051108', 'Marikina');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_accounts`
--
ALTER TABLE `admin_accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_log`
--
ALTER TABLE `admin_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `color`
--
ALTER TABLE `color`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_log`
--
ALTER TABLE `product_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_units`
--
ALTER TABLE `product_units`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `review_table`
--
ALTER TABLE `review_table`
  ADD PRIMARY KEY (`review_id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`sales_id`);

--
-- Indexes for table `stocks`
--
ALTER TABLE `stocks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `upload`
--
ALTER TABLE `upload`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usertable`
--
ALTER TABLE `usertable`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_accounts`
--
ALTER TABLE `admin_accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `admin_log`
--
ALTER TABLE `admin_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=207;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `color`
--
ALTER TABLE `color`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `product_log`
--
ALTER TABLE `product_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=264;

--
-- AUTO_INCREMENT for table `product_units`
--
ALTER TABLE `product_units`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `review_table`
--
ALTER TABLE `review_table`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `sales_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `stocks`
--
ALTER TABLE `stocks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `upload`
--
ALTER TABLE `upload`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `usertable`
--
ALTER TABLE `usertable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=125;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

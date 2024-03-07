-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 07, 2024 at 11:57 PM
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
(16, 'Christia Anna Q. Sarguet', 'adminAnna', '25d55ad283aa400af464c76d713c07ad');

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
(90, 'adminAnna', '2024-03-06 00:21:15', '2024-03-06');

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
(152, 122, 'admin/uploaded_img/Screenshot 2024-01-10 214633.png', 'Slingback Carlson', '449', '{\"size\":\"9\",\"color\":\"Green\"}', 1);

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
(37, 'Heels');

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
(89, 'castroroyfrancis@gmail.com', '2024-03-04 05:55:57', '2024-03-04');

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
(77, 'Roy Francis B. Castro', '09557315312', 'castroroyfrancis@gmail.com', 'gcash', 'Kalbayog st. mandaluyong ', 'Slingback Carlson[SIZE{\"size\":\"5\",\"color\":\"Black\"}]   (1) ,Slingback Carlson[SIZE{\"size\":\"5\",\"color\":\"White\"}]   (1) ', '898', 118, 'to ship', '2024-03-01', '2024-03-01 06:57:25', 1231231123, 2147483647, 'gcashQR.jpg'),
(78, 'Roy Francis B. Castro', '09750162818', 'castroroyfrancis@gmail.com', 'cash on delivery', '5014 General Ricarte South Cembo, Taguig City', 'Slingback Carlson[SIZE{\"size\":\"5.5\",\"color\":\"White\"}]   (1) ', '449', 118, 'to ship', '2024-03-01', '2024-03-01 07:21:16', 0, 0, ''),
(79, 'Roy Francis B. Castro', '09750162818', 'castroroyfrancis@gmail.com', 'cash on delivery', '5014 General Ricarte South Cembo, Taguig City', 'Carly[SIZE{\"size\":\"8\",\"color\":\"Pink\"}]   (1) ', '749', 118, 'to ship', '2024-03-01', '2024-03-01 07:22:14', 0, 0, ''),
(80, 'Roy Francis B. Castro', '09750162818', 'castroroyfrancis@gmail.com', 'cash on delivery', '5014 General Ricarte South Cembo, Taguig City', 'Slingback Carlson[SIZE{\"size\":\"9\",\"color\":\"Green\"}]   (1) ', '449', 118, 'to ship', '2024-03-01', '2024-03-01 07:24:03', 0, 0, ''),
(81, 'Roy Francis B. Castro', '09750162818', 'castroroyfrancis@gmail.com', 'cash on delivery', '5014 General Ricarte South Cembo, Taguig City', 'Slingback Carlson[SIZE{\"size\":\"9\",\"color\":\"White\"}]   (1) ', '449', 118, 'to ship', '2024-03-01', '2024-03-01 07:26:09', 0, 0, '');

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
(19, 'Flats', 'Slingback Carlson', 449, 'admin/uploaded_img/Screenshot 2024-01-10 214633.png', 'Chic Meets Comfort: Flaunt Your Stride in Our Criss-Cross Garterized Slingback Carlson!  #niftyshoesprestigecollection #staycomfywearnifty #marikinamadeshoes', '2024-01-10', '2024-01-11 13:46:53', '0000-00-00', '2024-01-11 13:46:53'),
(20, 'Sandals', 'Carly', 749, 'admin/uploaded_img/Screenshot 2024-01-10 214833.png', 'Step into versatile style with our changeable bows for Carly sandals – customize your look with a subtle tone-on-tone design or add a touch of elegance with a chic rose gold accent bow.', '2024-01-10', '2024-01-11 13:49:34', '2024-02-29', '2024-02-29 07:52:38'),
(21, 'Sandals', 'Ferdie Fishermans', 999, 'admin/uploaded_img/Screenshot 2024-01-10 215008.png', 'Cast a Stylish and Comfortable Net with Ferdie Fishermans Sandals #niftyshoesprestigecollection #staycomfywearnifty #marikinamade', '2024-01-10', '2024-01-11 13:53:37', '2024-02-29', '2024-02-29 07:52:51'),
(22, 'Heels', 'Mathilda', 899, 'admin/uploaded_img/Screenshot 2024-01-10 215559.png', 'These heels were made for strutting! Say hello to Mathilda! #niftyshoesprestigecollection #staycomfywearnifty #marikinamade', '2024-01-10', '2024-01-11 13:57:15', '0000-00-00', '2024-01-11 13:57:15'),
(23, 'Heels', 'FERRY', 849, 'admin/uploaded_img/412099889_405789561784365_5093997403783878773_n.jpg', 'FERRY patent shoes are a reflection of classic style. 💘 #GlossyElegance #niftyshoesprestigecollection  #staycomfywearnifty', '2024-01-10', '2024-01-11 14:00:31', '0000-00-00', '2024-01-11 14:00:31'),
(24, 'Heels', 'Presley', 1200, 'admin/uploaded_img/409558625_401750962188225_7031822928928661290_n.jpg', 'Step into elegance with these enchanting heels – the perfect blend of style and comfort. Elevate your look with the ideal height, enjoy the bounce of a cushioned footbed, and make a statement with its unique design and classy colors. Your go-to pair for l', '2024-01-10', '2024-01-11 14:01:59', '0000-00-00', '2024-01-11 14:01:59'),
(25, 'Flats', 'Gretel Mule', 699, 'admin/uploaded_img/405521884_392401063123215_3429614730173235132_n.jpg', 'Slip into sophistication with our Gretel Mule - the perfect blend of style and comfort.✨ #niftyshoesprestigecollection  #staycomfywearnifty  #marikinashoes  #marikinamade', '2024-01-10', '2024-01-11 14:03:30', '0000-00-00', '2024-01-11 14:03:30'),
(26, 'Heels', 'SAMANTHA', 999, 'admin/uploaded_img/387170055_18391810147013011_6664341851688769203_n.jpg', 'Who is Samantha? The 2 inches blocked heel has soft patent material and hooked buckles for an easily wearable strap. #marikinashoes #patentshoes #staycomfywearnifty', '2024-01-10', '2024-01-11 14:05:47', '2024-03-05', '2024-03-05 07:42:53');

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
(143, 'adminAnna', '2024-03-06', '13:07:51', 'add a stock of product id : 26');

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
(26, '9');

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
(9, 'Roy Francis B. Castro', 5, 'TEST', 1708750554, 19),
(12, 'Papisss Castro', 3, 'eww', 1708752176, 19),
(13, 'Roy Francis B. Castro', 5, 'asdasd', 1708753571, 20),
(14, 'Papisss Castro', 5, 'NO', 1708946439, 20);

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
(44, 81, 449, '2024-03-01');

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
(33, 19, '5', 'Black', '2024-01-10', '2024-01-10 14:13:25'),
(34, 19, '5', 'White', '2024-01-10', '2024-01-10 14:13:39'),
(35, 19, '5', 'Gold', '2024-01-10', '2024-01-10 14:14:15'),
(36, 19, '5', 'Green', '2024-01-10', '2024-01-10 14:14:25'),
(37, 19, '5', 'Brown', '2024-01-10', '2024-01-10 14:14:32'),
(38, 19, '5.5', 'Black', '2024-01-10', '2024-01-10 14:15:16'),
(39, 19, '5.5', 'White', '2024-01-10', '2024-01-10 14:15:22'),
(40, 19, '5.5', 'Gold', '2024-01-10', '2024-01-10 14:16:30'),
(41, 20, '8', 'Gold', '2024-02-26', '2024-02-26 10:46:19'),
(42, 20, '8', 'Pink', '2024-02-26', '2024-02-26 11:13:57'),
(43, 19, '9', 'Gray', '2024-02-27', '2024-02-27 13:04:49'),
(44, 26, '9', 'Gray', '2024-03-06', '2024-03-06 05:06:24'),
(45, 26, '8', 'Gold', '2024-03-06', '2024-03-06 05:06:56'),
(46, 26, '9', 'Gold', '2024-03-06', '2024-03-06 05:07:15'),
(47, 26, '5.5', 'Gray', '2024-03-06', '2024-03-06 05:07:21'),
(48, 26, '5', 'Gold', '2024-03-06', '2024-03-06 05:07:37'),
(49, 26, '8.5', 'Black', '2024-03-06', '2024-03-06 05:07:51');

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
  `logo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `upload`
--

INSERT INTO `upload` (`id`, `title`, `description`, `address`, `contact`, `email`, `logo`) VALUES
(1, 'NIFTY SHOES', 'Flats, Sandals, Pumps, Wedges & other nifty shoes for Women.', '121 Malaya St. Malanday, Marikina City, Marikina City, Philippines', '09064997545', 'niftyshoesph@gmail.com', 'homelogo.png');

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
(123, 'd', 'd@d.d', '$2y$10$uEP.mKAeEn2tcyfHRQQ/g..PX7vCgSwoiqe4dLwiHgR6wuKGaZcI6', 848376, 'notverified', '', 'd');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `admin_log`
--
ALTER TABLE `admin_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=166;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `color`
--
ALTER TABLE `color`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `product_log`
--
ALTER TABLE `product_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=144;

--
-- AUTO_INCREMENT for table `product_units`
--
ALTER TABLE `product_units`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `review_table`
--
ALTER TABLE `review_table`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `sales_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `stocks`
--
ALTER TABLE `stocks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `upload`
--
ALTER TABLE `upload`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `usertable`
--
ALTER TABLE `usertable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

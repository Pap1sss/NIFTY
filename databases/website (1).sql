-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 08, 2024 at 10:49 AM
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
  `email` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `middle_initial` varchar(2) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `code` int(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_accounts`
--

INSERT INTO `admin_accounts` (`id`, `email`, `first_name`, `middle_initial`, `last_name`, `username`, `password`, `code`, `status`) VALUES
(19, 'castroroyfrancis@gmail.com', 'Roy Francis', 'B', 'Castro', 'Papisss', '$2y$10$WPAHKO9c1Kc9bijSfM1lB.JEQaDWWa7A54lFM5V4UgmvlCJEO.EIG', 0, 'verified'),
(21, 'papisss05@gmail.com', 'Lebron', 'K', 'James', 'LBJ', '$2y$10$q1RItCoRnDZ/XhuQvKQhfeKY8rJyzFPw3cCop5ZrezUQCIa/oQz4m', 0, 'verified');

-- --------------------------------------------------------

--
-- Table structure for table `admin_activity_log`
--

CREATE TABLE `admin_activity_log` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `date_log` date NOT NULL,
  `time_log` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `action` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_activity_log`
--

INSERT INTO `admin_activity_log` (`id`, `username`, `date_log`, `time_log`, `action`) VALUES
(1, 'adminRoy', '2024-03-28', '2024-03-28 13:17:43', 'create a product : (\"TESTING\")'),
(2, 'adminRoy', '2024-03-31', '2024-03-31 07:11:41', 'added a unit stock on product id : 44'),
(3, 'adminRoy', '2024-03-31', '2024-03-31 07:11:42', 'add a color stock on product id : 44'),
(4, 'adminRoy', '2024-03-31', '2024-03-31 11:52:30', 'create a product : (\"JETT NASH\")'),
(5, 'adminRoy', '2024-03-31', '2024-03-31 12:09:05', 'added a unit stock on product id : 45'),
(6, 'adminRoy', '2024-03-31', '2024-03-31 12:09:06', 'add a color stock on product id : 45'),
(7, 'LBJ', '2024-04-06', '2024-04-06 12:40:27', 'edit business name'),
(8, 'LBJ', '2024-04-06', '2024-04-06 12:40:40', 'edit business description'),
(9, 'LBJ', '2024-04-06', '2024-04-06 12:40:43', 'edit business description'),
(10, 'LBJ', '2024-04-06', '2024-04-06 12:40:50', 'edited company email'),
(11, 'LBJ', '2024-04-06', '2024-04-06 12:41:06', 'edited company email'),
(12, 'LBJ', '2024-04-06', '2024-04-06 12:41:20', 'edit business address'),
(13, 'LBJ', '2024-04-06', '2024-04-06 12:41:46', 'edit business address'),
(14, 'LBJ', '2024-04-06', '2024-04-06 12:41:48', 'edit business contact number'),
(15, 'Papisss', '2024-04-08', '2024-04-08 07:07:07', 'edit product name'),
(16, 'Papisss', '2024-04-08', '2024-04-08 07:07:15', 'edit product name'),
(17, 'Papisss', '2024-04-08', '2024-04-08 07:30:38', 'edit product description'),
(18, 'Papisss', '2024-04-08', '2024-04-08 07:30:40', 'edit product description'),
(19, 'Papisss', '2024-04-08', '2024-04-08 07:31:15', 'edit product name'),
(20, 'Papisss', '2024-04-08', '2024-04-08 07:31:25', 'edit product name'),
(21, 'Papisss', '2024-04-08', '2024-04-08 07:38:26', 'uploaded a file on product #34'),
(22, 'Papisss', '2024-04-08', '2024-04-08 07:44:46', 'uploaded a file on product #34'),
(23, 'Papisss', '2024-04-08', '2024-04-08 08:10:16', 'uploaded a file on product #34'),
(24, 'Papisss', '2024-04-08', '2024-04-08 08:10:30', 'uploaded a file on product #34'),
(25, 'Papisss', '2024-04-08', '2024-04-08 08:11:14', 'uploaded a file on product #34');

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
(73, '', '2024-01-11 13:39:15', '2024-01-10'),
(74, '', '2024-01-11 13:41:01', '2024-01-10'),
(75, '', '2024-02-24 15:17:49', '2024-02-24'),
(76, '', '2024-02-24 15:18:07', '2024-02-24'),
(77, '', '2024-02-25 15:21:52', '2024-02-25'),
(78, '', '2024-02-26 10:46:07', '2024-02-26'),
(79, '', '2024-02-28 00:59:29', '2024-02-28'),
(80, '', '2024-02-29 01:43:40', '2024-02-29'),
(81, '', '2024-02-29 07:52:06', '2024-02-29'),
(82, '', '2024-02-29 07:52:13', '2024-02-29'),
(83, '', '2024-02-29 07:59:34', '2024-02-29'),
(84, '', '2024-03-01 07:28:06', '2024-03-01'),
(85, '', '2024-03-04 01:07:41', '2024-03-04'),
(86, '', '2024-03-05 01:38:58', '2024-03-05'),
(87, '', '2024-03-05 02:42:06', '2024-03-05'),
(88, '', '2024-03-05 02:45:55', '2024-03-05'),
(89, '', '2024-03-05 02:48:19', '2024-03-05'),
(90, '', '2024-03-06 00:21:15', '2024-03-06'),
(91, '', '2024-03-08 00:29:13', '2024-03-08'),
(92, '', '2024-03-08 00:38:16', '2024-03-08'),
(93, '', '2024-03-08 08:38:44', '2024-03-08'),
(94, '', '2024-03-11 01:32:39', '2024-03-11'),
(95, '', '2024-03-11 06:10:46', '2024-03-11'),
(96, '', '2024-03-12 01:12:16', '2024-03-12'),
(97, '', '2024-03-12 07:44:02', '2024-03-12'),
(98, '', '2024-03-13 02:44:49', '2024-03-13'),
(99, '', '2024-03-14 02:35:59', '2024-03-14'),
(100, '', '2024-03-14 07:11:59', '2024-03-14'),
(101, '', '2024-03-15 00:26:43', '2024-03-15'),
(102, '', '2024-03-15 07:03:49', '2024-03-15'),
(103, '', '2024-03-27 15:19:54', '2024-03-27'),
(104, '', '2024-03-28 13:17:34', '2024-03-28'),
(105, '', '2024-03-31 07:11:06', '2024-03-31'),
(106, '', '2024-04-04 11:55:41', '2024-04-04'),
(107, 'castroroyfrancis@gmail.com', '2024-04-04 14:25:32', '2024-04-04'),
(108, 'castroroyfrancis@gmail.com', '2024-04-04 14:26:56', '2024-04-04'),
(109, 'castroroyfrancis@gmail.com', '2024-04-04 14:27:24', '2024-04-04'),
(110, 'Papisss', '2024-04-05 13:03:52', '2024-04-05'),
(111, 'Papisss', '2024-04-05 14:25:48', '2024-04-05'),
(112, 'Papisss', '2024-04-05 14:27:06', '2024-04-05'),
(113, 'Papisss', '2024-04-05 14:28:31', '2024-04-05'),
(114, 'LBJ', '2024-04-05 14:34:21', '2024-04-05'),
(115, 'LBJ', '2024-04-05 14:47:42', '2024-04-05'),
(116, 'Papisss', '2024-04-06 03:36:26', '2024-04-06'),
(117, 'LBJ', '2024-04-06 11:37:40', '2024-04-06'),
(118, 'Papisss', '2024-04-07 06:12:33', '2024-04-07'),
(119, 'Papisss', '2024-04-07 06:20:13', '2024-04-07'),
(120, 'Papisss', '2024-04-07 06:23:04', '2024-04-07'),
(121, 'Papisss', '2024-04-07 06:30:11', '2024-04-07'),
(122, 'Papisss', '2024-04-07 06:32:08', '2024-04-07'),
(123, 'Papisss', '2024-04-07 06:34:42', '2024-04-07'),
(124, 'Papisss', '2024-04-07 13:51:48', '2024-04-07'),
(125, 'LBJ', '2024-04-08 01:20:05', '2024-04-08'),
(126, 'Papisss', '2024-04-08 01:48:10', '2024-04-08'),
(127, 'Papisss', '2024-04-08 02:24:51', '2024-04-08');

-- --------------------------------------------------------

--
-- Table structure for table `archive_products`
--

CREATE TABLE `archive_products` (
  `id` int(11) NOT NULL,
  `product_id` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `date_time_archive` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `archive_products`
--

INSERT INTO `archive_products` (`id`, `product_id`, `category`, `name`, `price`, `image`, `description`, `date_time_archive`) VALUES
(1, '44', 'Flats', 'TESTING', '222', 'admin/uploaded_img/367c4418-0e6d-4d4f-8aeb-17ea1792e692.jpg', 'WASH DIS', '2024-04-08 11:21:02');

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
  `color` varchar(255) NOT NULL,
  `quantity` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `image`, `name`, `price`, `unit`, `color`, `quantity`) VALUES
(246, 118, 'admin/uploaded_img/431780365_18423152689013011_7830608783600598095_n.jpg', 'Presly', '1200', '6', 'White', 1);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `category_code` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `category`, `category_code`) VALUES
(33, 'Flats', ''),
(34, 'Sandals', ''),
(37, 'Heels', ''),
(45, 'Slip-ons', ''),
(46, 'asdasdasd', ''),
(47, 'vvdvd', ''),
(48, 'asdasd', ''),
(49, 'zadasd', ''),
(50, 'iiyuiyui', ''),
(51, 'bhghfgh', ''),
(62, 'Slides', 'SD');

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
(98, 'castroroyfrancis@gmail.com', '2024-03-15 06:34:13', '2024-03-15'),
(99, 'castroroyfrancis@gmail.com', '2024-03-18 12:00:27', '2024-03-18'),
(100, 'nevaj32595@felibg.com', '2024-04-04 12:34:58', '2024-04-04'),
(101, 'walon42636@felibg.com', '2024-04-04 12:38:09', '2024-04-04'),
(102, 'walon42636@felibg.com', '2024-04-04 12:39:06', '2024-04-04'),
(103, 'castroroyfrancis@gmail.com', '2024-04-06 05:53:50', '2024-04-06'),
(104, 'castroroyfrancis@gmail.com', '2024-04-06 12:42:10', '2024-04-06'),
(105, 'castroroyfrancis@gmail.com', '2024-04-06 12:42:31', '2024-04-06'),
(106, 'castroroyfrancis@gmail.com', '2024-04-07 05:36:11', '2024-04-07'),
(107, 'castroroyfrancis@gmail.com', '2024-04-07 06:19:10', '2024-04-07'),
(108, 'castroroyfrancis@gmail.com', '2024-04-07 06:20:47', '2024-04-07'),
(109, 'castroroyfrancis@gmail.com', '2024-04-07 06:25:41', '2024-04-07'),
(110, 'castroroyfrancis@gmail.com', '2024-04-07 06:29:59', '2024-04-07'),
(111, 'castroroyfrancis@gmail.com', '2024-04-07 06:30:23', '2024-04-07'),
(112, 'castroroyfrancis@gmail.com', '2024-04-07 06:32:03', '2024-04-07'),
(113, 'castroroyfrancis@gmail.com', '2024-04-07 06:32:18', '2024-04-07'),
(114, 'castroroyfrancis@gmail.com', '2024-04-07 06:34:37', '2024-04-07'),
(115, 'castroroyfrancis@gmail.com', '2024-04-07 06:34:47', '2024-04-07'),
(116, 'castroroyfrancis@gmail.com', '2024-04-07 13:54:06', '2024-04-07'),
(117, 'castroroyfrancis@gmail.com', '2024-04-08 02:59:03', '2024-04-08');

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
  `reference_number` varchar(255) NOT NULL,
  `gcash_number` varchar(255) NOT NULL,
  `screenshot` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `name`, `number`, `email`, `method`, `address`, `total_products`, `total_price`, `user_id`, `status`, `date_created`, `time_created`, `reference_number`, `gcash_number`, `screenshot`) VALUES
(62, 'Papisss Castro', '09705162818', 'papisss05@gmail.com', 'cash on delivery', '5014 General Ricarte St. South Cembo, Taguig CIty', 'Carly sandals{\"size\":\"8\",\"color\":\"Gold\"}\n   (3) , Slingback Carlson{\"size\":\"5.5\",\"color\":\"Green\"}\n   (2) ', '3145', 119, 'order completed', '2024-02-26', '2024-02-26 11:30:22', '0', '0', ''),
(69, 'Paul Nateman Bustillo', '09557315312', 'mnlbusy@gmail.com', 'gcash', 'Kalbayog st. mandaluyong ', 'Slingback Carlson[SIZE{\"size\":\"9\",\"color\":\"Gold\"}]   (1) ', '449', 122, 'order completed', '2024-02-29', '2024-02-29 01:07:34', '1234556', '2147483647', '379659642_1406933606523189_1992127541307170051_n.jpg'),
(70, 'Roy Francis B. Castro', '09750162818', 'castroroyfrancis@gmail.com', 'cash on delivery', '5014 General Ricarte South Cembo, Taguig City', 'Slingback Carlson[SIZE{\"size\":\"5.5\",\"color\":\"White\"}]   (1) , Carly sandals[SIZE{\"size\":\"8\",\"color\":\"Gold\"}]   (2) , Slingback Carlson[SIZE{\"size\":\"9\",\"color\":\"Gold\"}]   (2) , Slingback Carlson[SIZE{\"size\":\"5.5\",\"color\":\"Brown\"}]   (1) ', '3294', 118, 'to ship', '2024-03-01', '2024-03-01 04:52:52', '0', '0', ''),
(71, 'Roy Francis B. Castro', '09750162818', 'castroroyfrancis@gmail.com', 'cash on delivery', '5014 General Ricarte South Cembo, Taguig City', 'Slingback Carlson[SIZE{\"size\":\"5.5\",\"color\":\"White\"}]   (1) , Carly sandals[SIZE{\"size\":\"8\",\"color\":\"Gold\"}]   (2) , Slingback Carlson[SIZE{\"size\":\"9\",\"color\":\"Gold\"}]   (2) , Slingback Carlson[SIZE{\"size\":\"5.5\",\"color\":\"Brown\"}]   (1) ', '3294', 118, 'to ship', '2024-03-01', '2024-03-01 04:53:38', '0', '0', ''),
(72, 'Roy Francis B. Castro', '09750162818', 'castroroyfrancis@gmail.com', 'cash on delivery', '5014 General Ricarte South Cembo, Taguig City', 'Slingback Carlson[SIZE{\"size\":\"5.5\",\"color\":\"White\"}]   (1) , Carly sandals[SIZE{\"size\":\"8\",\"color\":\"Gold\"}]   (2) , Slingback Carlson[SIZE{\"size\":\"9\",\"color\":\"Gold\"}]   (2) , Slingback Carlson[SIZE{\"size\":\"5.5\",\"color\":\"Brown\"}]   (1) ', '3294', 118, 'to ship', '2024-03-01', '2024-03-01 04:54:21', '0', '0', ''),
(73, 'Roy Francis B. Castro', '09750162818', 'castroroyfrancis@gmail.com', 'cash on delivery', '5014 General Ricarte South Cembo, Taguig City', 'Carly sandals[SIZE{\"size\":\"8\",\"color\":\"Gold\"}]   (2) <br>Slingback Carlson[SIZE{\"size\":\"9\",\"color\":\"Gold\"}]   (2) <br>Slingback Carlson[SIZE{\"size\":\"5.5\",\"color\":\"Brown\"}]   (1) ', '2845', 118, 'to ship', '2024-03-01', '2024-03-01 06:48:37', '0', '0', ''),
(74, 'Lebron James', '09750162818', 'castroroyfrancis@gmail.com', 'cash on delivery', '5014 General Ricarte South Cembo, Taguig City', 'Slingback Carlson[SIZE{\"size\":\"9\",\"color\":\"Gray\"}]   (1) \\nSlingback Carlson[SIZE{\"size\":\"5.5\",\"color\":\"Brown\"}]   (1) ', '898', 118, 'to ship', '2024-03-01', '2024-03-01 06:50:26', '0', '0', ''),
(75, 'Papisss Castro', '09557315312', 'papisss05@gmail.com', 'cash on delivery', 'Kalbayog st. mandaluyong', 'Carly[SIZE{\"size\":\"8\",\"color\":\"Gold\"}]   (1) /vSlingback Carlson[SIZE{\"size\":\"5.5\",\"color\":\"Brown\"}]   (1) ', '1198', 119, 'to ship', '2024-03-01', '2024-03-01 06:53:02', '0', '0', ''),
(76, 'Roy Francis B. Castro', '09750162818', 'castroroyfrancis@gmail.com', 'cash on delivery', '5014 General Ricarte South Cembo, Taguig City', 'Carly[SIZE{\"size\":\"8\",\"color\":\"Pink\"}]   (1) ,Slingback Carlson[SIZE{\"size\":\"5.5\",\"color\":\"Gray\"}]   (1) ', '1198', 118, 'to ship', '2024-03-01', '2024-03-01 06:55:31', '0', '0', ''),
(85, 'Jonathan', '09452051108', 'jojonathanpeol3001@gmail.com', 'cash on delivery', 'Marikina', 'Carly\n8 Black\n2', '1498', 124, 'to ship', '2024-03-12', '2024-03-12 07:41:44', '0', '0', ''),
(87, 'Roy Francis B. Castro', '09750162818', 'castroroyfrancis@gmail.com', 'cash on delivery', '5014 General Ricarte South Cembo, Taguig City', 'Presly\n8.5 Cyan\n1', '2400', 118, 'to ship', '2024-03-15', '2024-03-15 07:48:30', '0', '0', ''),
(88, 'Roy Francis B. Castro', '09750162818', 'castroroyfrancis@gmail.com', 'cash on delivery', '5014 General Ricarte South Cembo, Taguig City', 'Presly8 Black1', '2400', 118, 'to ship', '2024-03-15', '2024-03-15 08:22:18', '0', '0', ''),
(89, 'Roy Francis B. Castro', '09750162818', 'castroroyfrancis@gmail.com', 'cash on delivery', '5014 General Ricarte South Cembo, Taguig City', 'Presly[SIZE6.5 Black]   (3) \nPresly[SIZE11.5 Olive]   (1) ', '4800', 118, 'to ship', '2024-03-15', '2024-03-15 08:27:40', '0', '0', ''),
(90, 'Roy Francis B. Castro', '09750162818', 'castroroyfrancis@gmail.com', 'cash on delivery', '5014 General Ricarte South Cembo, Taguig City', '\\n Item:Presly SIZE & COLOR5 White] Quantity: (1) \n\\n Item:Presly SIZE & COLOR4.5 Olive] Quantity: (1) \n\\n Item:Presly SIZE & COLOR7 Black] Quantity: (1) \n\\n Item:Presly SIZE & COLOR5 Cyan] Quantity: (1) ', '4800', 118, 'order completed', '2024-03-15', '2024-03-15 08:41:39', '0', '0', ''),
(91, 'Roy Francis B. Castro', '09750162818', 'castroroyfrancis@gmail.com', 'cash on delivery', '5014 General Ricarte South Cembo, Taguig City', 'Item:Presly SIZE & COLOR [5.5 Pink] Quantity: (1) \nItem:Presly SIZE & COLOR [5 Beige] Quantity: (1) \nItem:Presly SIZE & COLOR [6.5 Black] Quantity: (1) ', '3600', 118, 'to receive', '2024-03-15', '2024-03-15 08:46:32', '0', '0', ''),
(92, 'Roy Francis B. Castro', '09750162818', 'castroroyfrancis@gmail.com', 'gcash', '5014 General Ricarte South Cembo, Taguig City', 'Item: [TESTING] SIZE & COLOR [5 Black] Quantity: [1] ', '222', 118, 'cancelled', '2024-03-31', '2024-03-31 07:12:28', '123123123', '2147483647', 'ph-11134207-7r98z-ltaiah69nsck1d.jpg'),
(93, 'Roy Francis B. Castro', '09750162818', 'castroroyfrancis@gmail.com', 'cash on delivery', '5014 General Ricarte South Cembo, Taguig City', 'Item: [TESTING] SIZE & COLOR [5 Black] Quantity: [4] ', '888', 118, 'order completed', '2024-03-31', '2024-03-31 07:54:00', '0', '0', ''),
(94, 'Roy Francis B. Castro', '09750162818', 'castroroyfrancis@gmail.com', 'gcash', '5014 General Ricarte South Cembo, Taguig City', 'Item: [TESTING] SIZE & COLOR [5 Black] Quantity: [3] ', '666', 118, 'pending', '2024-03-31', '2024-03-31 08:18:34', '12345678', '2147483647', 'ph-11134207-7r98u-ltaiah6aiouc51.jpg'),
(95, 'Roy Francis B. Castro', '09750162818', 'castroroyfrancis@gmail.com', 'gcash', '5014 General Ricarte South Cembo, Taguig City', 'Item: [TESTING] SIZE & COLOR [5 Black] Quantity: [7] ', '1554', 118, 'pending', '2024-03-31', '2024-03-31 08:28:01', '12345678', '2147483647', 'ph-11134207-7r98q-lt7nmtiezm105c.jpg'),
(96, 'Roy Francis B. Castro', '09750162818', 'castroroyfrancis@gmail.com', 'gcash', '5014 General Ricarte South Cembo, Taguig City', 'Item: [TESTING] SIZE & COLOR [5 Black] Quantity: [1] ', '222', 118, 'pending', '2024-03-31', '2024-03-31 08:32:40', '12345678', '2147483647', 'ph-11134207-7r98q-lt7nmtiezm105c.jpg'),
(97, 'Roy Francis B. Castro', '09750162818', 'castroroyfrancis@gmail.com', 'gcash', '5014 General Ricarte South Cembo, Taguig City', 'Item: [TESTING] SIZE & COLOR [5 Black] Quantity: [1] ', '222', 118, 'pending', '2024-03-31', '2024-03-31 08:42:49', '12345678', '2147483647', 'ph-11134207-7r98z-ltaiah69nsck1d.jpg'),
(98, 'Roy Francis B. Castro', '09750162818', 'castroroyfrancis@gmail.com', 'gcash', '5014 General Ricarte South Cembo, Taguig City', 'Item: [TESTING] SIZE & COLOR [5 Black] Quantity: [1] ', '222', 118, 'pending', '2024-03-31', '2024-03-31 08:46:32', '12345678', '2147483647', '9e905526-2f03-4bdd-a585-3890728bdb13.jpg'),
(99, 'Roy Francis B. Castro', '09750162818', 'castroroyfrancis@gmail.com', 'gcash', '5014 General Ricarte South Cembo, Taguig City', 'Item: [TESTING] SIZE & COLOR [5 Black] Quantity: [1] ', '222', 118, 'pending', '2024-03-31', '2024-03-31 09:05:06', '12345678', '2147483647', '434588545_434662875902915_281598681155492503_n.jpg'),
(100, 'Roy Francis B. Castro', '09750162818', 'castroroyfrancis@gmail.com', 'gcash', '5014 General Ricarte South Cembo, Taguig City', 'Item: [TESTING] SIZE & COLOR [5 Black] Quantity: [100] ', '22200', 118, 'pending', '2024-03-31', '2024-03-31 09:06:43', '12345678', '2147483647', '04fafe2c-3dcd-4986-9dd2-043c3d13af1c.jpg'),
(101, 'Roy Francis B. Castro', '09750162818', 'castroroyfrancis@gmail.com', 'gcash', '5014 General Ricarte South Cembo, Taguig City', 'Item: [TESTING] SIZE & COLOR [5 Black] Quantity: [1] ', '222', 118, 'pending', '2024-03-31', '2024-03-31 11:51:49', '12345678', '2147483647', '433531762_2775933562570491_7036045258634907021_n.jpg'),
(102, 'Roy Francis B. Castro', '09750162818', 'castroroyfrancis@gmail.com', 'gcash', '5014 General Ricarte South Cembo, Taguig City', 'Item: [TESTING] SIZE & COLOR [5 Black] Quantity: [1] ', '222', 118, 'pending', '2024-03-31', '2024-03-31 12:03:56', '12345678', '2147483647', '434588545_434662875902915_281598681155492503_n.jpg'),
(103, 'Roy Francis B. Castro', '09750162818', 'castroroyfrancis@gmail.com', 'gcash', '5014 General Ricarte South Cembo, Taguig City', 'Item: [TESTING] SIZE & COLOR [5 Black] Quantity: [1] ', '222', 118, 'pending', '2024-03-31', '2024-03-31 12:08:49', '12345678', '2147483647', 'ph-11134207-7r98q-lt7nmtiezm105c.jpg'),
(104, 'Roy Francis B. Castro', '09750162818', 'castroroyfrancis@gmail.com', 'gcash', '5014 General Ricarte South Cembo, Taguig City', 'Item: [TESTING] SIZE & COLOR [5 Black] Quantity: [1] \n \n Item: [JETT NASH] SIZE & COLOR [6 Beige] Quantity: [1] ', '1221', 118, 'pending', '2024-03-31', '2024-03-31 12:09:33', '12345678', '2147483647', 'shinobi-jett-valorant-thumb.jpg'),
(105, 'Roy Francis B. Castro', '09750162818', 'castroroyfrancis@gmail.com', 'gcash', '5014 General Ricarte South Cembo, Taguig City', 'Item: [TESTING] SIZE & COLOR [5 Black] Quantity: [3] \n\n \nItem: [JETT NASH] SIZE & COLOR [6 Beige] Quantity: [3] \n', '3663', 118, 'pending', '2024-03-31', '2024-03-31 12:12:49', '12345678', '2147483647', '425690933_365471533011706_5165155626105471690_n.jpg'),
(106, 'Roy Francis B. Castro', '09750162818', 'castroroyfrancis@gmail.com', 'gcash', '5014 General Ricarte South Cembo, Taguig City', 'Item: [JETT NASH] SIZE & COLOR [6 Beige] Quantity: [1] \n', '999', 118, 'pending', '2024-04-06', '2024-04-06 05:54:21', '25437534', '2147483647', 'ghahha.png'),
(107, 'Roy Francis B. Castro', '09750162818', 'castroroyfrancis@gmail.com', 'gcash', '5014 General Ricarte South Cembo, Taguig City', 'Item: [JETT NASH] SIZE & COLOR [6 Beige] Quantity: [5] \n', '4995', 118, 'pending', '2024-04-06', '2024-04-06 05:57:59', '987654321', '2147483647', '0243860f-9cbc-4e54-b9b9-caa97b535935.jpg'),
(108, 'Roy Francis B. Castro', '09750162818', 'castroroyfrancis@gmail.com', 'gcash', '5014 General Ricarte South Cembo, Taguig City', 'Item: [JETT NASH] SIZE & COLOR [6 Beige] Quantity: [1] \n', '999', 118, 'pending', '2024-04-06', '2024-04-06 06:00:37', '12345678', '2147483647', '0243860f-9cbc-4e54-b9b9-caa97b535935.jpg'),
(109, 'Roy Francis B. Castro', '09750162818', 'castroroyfrancis@gmail.com', 'gcash', '5014 General Ricarte South Cembo, Taguig City', 'Item: [JETT NASH] SIZE & COLOR [6 Beige] Quantity: [100] \n', '99900', 118, 'pending', '2024-04-06', '2024-04-06 06:03:22', '714040502', '2147483647', '0243860f-9cbc-4e54-b9b9-caa97b535935.jpg'),
(110, 'Roy Francis B. Castro', '09750162818', 'castroroyfrancis@gmail.com', 'gcash', '5014 General Ricarte South Cembo, Taguig City', 'Item: [JETT NASH] SIZE & COLOR [6 Beige] Quantity: [1] \n', '999', 118, 'cancelled', '2024-04-06', '2024-04-06 06:04:48', '0714040502', '09557315312', '434598376_445109048023717_602466012649471822_n.jpg'),
(111, 'Roy Francis B. Castro', '09750162818', 'castroroyfrancis@gmail.com', 'cash on delivery', '5014 General Ricarte South Cembo, Taguig City', 'Item: [Presly] SIZE & COLOR [6] Quantity: [1] \n\n \nItem: [Maggie] SIZE & COLOR [8] Quantity: [1] \n\n \nItem: [Maggie] SIZE & COLOR [8] Quantity: [1] \n\n \nItem: [Maggie] SIZE & COLOR [6] Quantity: [1] \n', '3147', 118, 'pending', '2024-04-07', '2024-04-07 13:16:10', '0', '0', 'none'),
(112, 'Roy Francis B. Castro', '09750162818', 'castroroyfrancis@gmail.com', 'cash on delivery', '5014 General Ricarte South Cembo, Taguig City', 'Item: [Presly] SIZE & COLOR [6] Quantity: [1] \n\n \nItem: [Maggie] SIZE & COLOR [8] Quantity: [1] \n\n \nItem: [Maggie] SIZE & COLOR [8] Quantity: [1] \n\n \nItem: [Maggie] SIZE & COLOR [6] Quantity: [1] \n', '3147', 118, 'pending', '2024-04-07', '2024-04-07 13:16:32', '0', '0', 'none'),
(113, 'Roy Francis B. Castro', '09750162818', 'castroroyfrancis@gmail.com', 'cash on delivery', '5014 General Ricarte South Cembo, Taguig City', 'Item: [Presly] SIZE & COLOR [6] Quantity: [1] \n', '1200', 118, 'pending', '2024-04-07', '2024-04-07 13:17:39', '0', '0', 'none'),
(114, 'Roy Francis B. Castro', '09750162818', 'castroroyfrancis@gmail.com', 'cash on delivery', '5014 General Ricarte South Cembo, Taguig City', 'Item: [Presly] SIZE & COLOR [6] Quantity: [5] \n', '6000', 118, 'pending', '2024-04-07', '2024-04-07 13:18:57', '0', '0', 'none'),
(115, 'Roy Francis B. Castro', '09750162818', 'castroroyfrancis@gmail.com', 'cash on delivery', '5014 General Ricarte South Cembo, Taguig City', 'Item: [Presly] SIZE & COLOR [6] Quantity: [2] \n\n \nItem: [Maggie] SIZE & COLOR [8] Quantity: [5] \n', '5645', 118, 'pending', '2024-04-07', '2024-04-07 13:20:29', '0', '0', 'none'),
(116, 'Roy Francis B. Castro', '09750162818', 'castroroyfrancis@gmail.com', 'cash on delivery', '5014 General Ricarte South Cembo, Taguig City', 'Item: [Presly] SIZE & COLOR [5] Quantity: [1] \n\n \nItem: [Maggie] SIZE & COLOR [8] Quantity: [1] \n', '1849', 118, 'pending', '2024-04-07', '2024-04-07 13:21:08', '0', '0', 'none'),
(117, 'Roy Francis B. Castro', '09750162818', 'castroroyfrancis@gmail.com', 'cash on delivery', '5014 General Ricarte South Cembo, Taguig City', 'Item: [Presly] SIZE & COLOR [6White] Quantity: [4] \n\n \nItem: [Maggie] SIZE & COLOR [8Mocha] Quantity: [2] \n', '6098', 118, 'pending', '2024-04-07', '2024-04-07 13:27:36', '0', '0', 'none'),
(118, 'Roy Francis B. Castro', '09750162818', 'castroroyfrancis@gmail.com', 'cash on delivery', '5014 General Ricarte South Cembo, Taguig City', 'Item: [Presly] SIZE & COLOR [6White] Quantity: [4] \n\n \nItem: [Maggie] SIZE & COLOR [8Mocha] Quantity: [2] \n', '6098', 118, 'pending', '2024-04-07', '2024-04-07 13:28:56', '0', '0', 'none'),
(119, 'Roy Francis B. Castro', '09750162818', 'castroroyfrancis@gmail.com', 'cash on delivery', '5014 General Ricarte South Cembo, Taguig City', 'Item: [Presly] SIZE & COLOR [6White] Quantity: [4] \n\n \nItem: [Maggie] SIZE & COLOR [8Mocha] Quantity: [2] \n', '6098', 118, 'pending', '2024-04-07', '2024-04-07 13:29:44', '0', '0', 'none'),
(120, 'Roy Francis B. Castro', '09750162818', 'castroroyfrancis@gmail.com', 'cash on delivery', '5014 General Ricarte South Cembo, Taguig City', 'Item: [Presly] SIZE & COLOR [6White] Quantity: [4] \n\n \nItem: [Maggie] SIZE & COLOR [8Mocha] Quantity: [2] \n', '6098', 118, 'pending', '2024-04-07', '2024-04-07 13:30:17', '0', '0', 'none'),
(121, 'Roy Francis B. Castro', '09750162818', 'castroroyfrancis@gmail.com', 'gcash', '5014 General Ricarte South Cembo, Taguig City', 'Item: [Presly] SIZE & COLOR [6White] Quantity: [3] \n\nItem: [Presly] SIZE & COLOR [5Gold] Quantity: [10] \n', '15600', 118, 'to pay', '2024-04-07', '2024-04-07 13:55:45', '12345678', '9750162818', 'random.png'),
(122, 'Roy Francis B. Castro', '09750162818', 'castroroyfrancis@gmail.com', 'gcash', '5014 General Ricarte South Cembo, Taguig City', 'Item: [Presly] SIZE & COLOR [6White] Quantity: [3] \n\nItem: [Presly] SIZE & COLOR [5Gold] Quantity: [10] \n', '15600', 118, 'to pay', '2024-04-07', '2024-04-07 13:57:58', '12345678', '9750162818', 'niftyfront.jpg'),
(123, 'Roy Francis B. Castro', '09750162818', 'castroroyfrancis@gmail.com', 'cash on delivery', '5014 General Ricarte South Cembo, Taguig City', 'Item: [Presly] SIZE & COLOR [6White] Quantity: [3] \n\nItem: [Presly] SIZE & COLOR [5Gold] Quantity: [10] \n', '15600', 118, 'pending', '2024-04-07', '2024-04-07 13:58:15', '0', '0', 'none'),
(124, 'Roy Francis B. Castro', '09750162818', 'castroroyfrancis@gmail.com', 'cash on delivery', '5014 General Ricarte South Cembo, Taguig City', 'Item: [Maggie] SIZE & COLOR [8Gold] Quantity: [4] \n', '2596', 118, 'pending', '2024-04-08', '2024-04-08 02:59:34', '0', '0', 'none'),
(125, 'Roy Francis B. Castro', '09750162818', 'castroroyfrancis@gmail.com', 'cash on delivery', '5014 General Ricarte South Cembo, Taguig City', 'Item: [Maggie] SIZE & COLOR [8Gold] Quantity: [40] \n', '25960', 118, 'pending', '2024-04-08', '2024-04-08 03:01:21', '0', '0', 'none');

-- --------------------------------------------------------

--
-- Table structure for table `order_archive`
--

CREATE TABLE `order_archive` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `number` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `method` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `total_products` varchar(255) NOT NULL,
  `total_price` varchar(255) NOT NULL,
  `datetime_of_order` varchar(255) NOT NULL,
  `datetime_of_archive` datetime NOT NULL DEFAULT current_timestamp(),
  `reference_number` varchar(255) NOT NULL,
  `gcash_number` varchar(255) NOT NULL,
  `screenshot` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_log`
--

CREATE TABLE `order_log` (
  `id` int(11) NOT NULL,
  `order_id` int(255) NOT NULL,
  `action` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_log`
--

INSERT INTO `order_log` (`id`, `order_id`, `action`, `username`, `datetime`) VALUES
(1, 93, 'updated order status (to ship)', 'Papisss', '2024-04-06 12:57:41'),
(2, 93, 'updated order status (to receive)', 'Papisss', '2024-04-06 13:08:05'),
(3, 93, 'updated order status (order completed)', 'Papisss', '2024-04-06 13:08:10');

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
(34, 'Slip-ons', 'Presly', 1200, 'admin/uploaded_img/431780365_18423152689013011_7830608783600598095_n.jpg', 'Your wardrobe\'s must-have. Presley slip-ons! Back in stock and ready to elevate your style game. Slip into comfort, class, and versatility - get yours now!', '2024-03-13', '2024-03-13 02:46:42', '2024-04-08', '2024-04-08 07:31:25'),
(35, 'Flats', 'Maggie', 649, 'admin/uploaded_img/428703023_18418024639013011_2462875183673748442_n.jpg', 'Twirl in style with Maggie ballerina shoes, exclusively at Nifty Shoes! Hurry, before they pirouette out of stock! ✨🥿 #NiftyShoes #BalletBeauty #staycomfywearnifty #niftyshoesprestigecollection', '2024-03-13', '2024-03-13 02:49:08', '0000-00-00', '2024-03-13 02:49:08'),
(47, 'Flats', 'FOLDABLE BALLERINA', 599, 'admin/uploaded_img/ph-11134207-7r98p-lsdufaivyjwka6 (1).jpg', 'Effortless elegance meets ultimate comfort with these foldable ballet-inspired shoes that feel like a dream on your feet! 💃👣 #ComfortMeetsStyle #staycomfywearnifty', '2024-04-06', '2024-04-05 16:47:06', '0000-00-00', '2024-04-05 16:47:06');

-- --------------------------------------------------------

--
-- Table structure for table `product_gallery`
--

CREATE TABLE `product_gallery` (
  `gallery_id` int(255) NOT NULL,
  `product_id` int(255) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `date_uploaded` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_gallery`
--

INSERT INTO `product_gallery` (`gallery_id`, `product_id`, `product_image`, `date_uploaded`) VALUES
(1, 44, '367c4418-0e6d-4d4f-8aeb-17ea1792e692.jpg', '2024-03-28 21:17:43'),
(2, 45, '427800912_246012861891625_4022607893347354658_n.png', '2024-03-31 19:52:30'),
(3, 46, 'ph-11134207-7r98p-lsdufaivyjwka6 (1).jpg', '2024-04-06 00:45:19'),
(4, 47, 'ph-11134207-7r98p-lsdufaivyjwka6 (1).jpg', '2024-04-06 00:47:06');

-- --------------------------------------------------------

--
-- Table structure for table `product_operation`
--

CREATE TABLE `product_operation` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `action` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `date_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_operation`
--

INSERT INTO `product_operation` (`id`, `username`, `action`, `name`, `date_time`) VALUES
(3, 'LBJ', 'created a category', 'SD', '2024-04-06 01:18:45');

-- --------------------------------------------------------

--
-- Table structure for table `product_sales`
--

CREATE TABLE `product_sales` (
  `id` int(255) NOT NULL,
  `order_id` varchar(255) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `quantity` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_sales`
--

INSERT INTO `product_sales` (`id`, `order_id`, `product_name`, `quantity`) VALUES
(13, '121', 'Presly', 3),
(14, '121', 'Presly', 10),
(15, '122', 'Presly', 3),
(16, '122', 'Presly', 10),
(17, '123', 'Presly', 3),
(18, '123', 'Presly', 10),
(19, '124', 'Maggie', 4),
(20, '125', 'Maggie', 40);

-- --------------------------------------------------------

--
-- Table structure for table `product_stocks`
--

CREATE TABLE `product_stocks` (
  `id` int(255) NOT NULL,
  `product_id` varchar(255) NOT NULL,
  `unit` varchar(255) NOT NULL,
  `color` varchar(255) NOT NULL,
  `quantity` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_stocks`
--

INSERT INTO `product_stocks` (`id`, `product_id`, `unit`, `color`, `quantity`) VALUES
(3, '34', '5', 'White', '0'),
(4, '34', '5', 'Gold', '1'),
(5, '34', '6', 'White', '100'),
(6, '35', '6', 'Yellow', '4'),
(7, '35', '5', 'Gold', '100'),
(8, '35', '7', 'Gold', '10'),
(9, '35', '6', 'Mocha', '100'),
(10, '35', '8', 'Gold', '100'),
(11, '35', '8', 'Mocha', '10');

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
(54, 91, 3600, '2024-03-15'),
(55, 92, 222, '2024-03-31'),
(56, 93, 888, '2024-03-31'),
(57, 94, 666, '2024-03-31'),
(58, 95, 1554, '2024-03-31'),
(59, 96, 222, '2024-03-31'),
(60, 97, 222, '2024-03-31'),
(61, 98, 222, '2024-03-31'),
(62, 99, 222, '2024-03-31'),
(63, 100, 22200, '2024-03-31'),
(64, 101, 222, '2024-03-31'),
(65, 102, 222, '2024-03-31'),
(66, 103, 222, '2024-03-31'),
(67, 104, 1221, '2024-03-31'),
(68, 105, 3663, '2024-03-31'),
(69, 106, 999, '2024-04-06'),
(70, 107, 4995, '2024-04-06'),
(71, 108, 999, '2024-04-06'),
(72, 109, 99900, '2024-04-06'),
(73, 110, 999, '2024-04-06'),
(74, 111, 3147, '2024-04-07'),
(75, 112, 3147, '2024-04-07'),
(76, 113, 1200, '2024-04-07'),
(77, 114, 6000, '2024-04-07'),
(78, 115, 5645, '2024-04-07'),
(79, 116, 1849, '2024-04-07'),
(80, 117, 6098, '2024-04-07'),
(81, 118, 6098, '2024-04-07'),
(82, 119, 6098, '2024-04-07'),
(83, 120, 6098, '2024-04-07'),
(84, 121, 15600, '2024-04-07'),
(85, 122, 15600, '2024-04-07'),
(86, 123, 15600, '2024-04-07'),
(87, 124, 2596, '2024-04-08'),
(88, 125, 25960, '2024-04-08');

-- --------------------------------------------------------

--
-- Table structure for table `stocks_log`
--

CREATE TABLE `stocks_log` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `action` varchar(255) NOT NULL,
  `product_id` varchar(255) NOT NULL,
  `quantity` varchar(255) NOT NULL,
  `date_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `stocks_log`
--

INSERT INTO `stocks_log` (`id`, `username`, `action`, `product_id`, `quantity`, `date_time`) VALUES
(1, 'LBJ', 'added a stock', '34', '2', '2024-04-07 00:41:21'),
(2, 'LBJ', 'added a stock', '34', '1', '2024-04-07 00:41:36'),
(3, 'LBJ', 'added a stock', '34', '20', '2024-04-07 00:41:44'),
(4, 'LBJ', 'added a stock', '34', '100', '2024-04-07 00:43:14'),
(5, 'Papisss', 'added a stock', '35', '4', '2024-04-07 14:12:54'),
(6, '', 'added a stock', '35', '100', '2024-04-07 14:20:05'),
(7, 'Papisss', 'added a stock', '35', '10', '2024-04-07 14:22:15'),
(8, '', 'added a stock', '35', '100', '2024-04-07 14:22:37'),
(9, 'Papisss', 'added a stock', '35', '100', '2024-04-07 14:37:34'),
(10, 'Papisss', 'added a stock', '35', '10', '2024-04-07 14:37:57');

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
  `homepage_image` varchar(255) NOT NULL,
  `gcash_ss` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `upload`
--

INSERT INTO `upload` (`id`, `title`, `description`, `address`, `contact`, `email`, `logo`, `homepage_image`, `gcash_ss`) VALUES
(1, 'Nifty Shoes', 'FLATS, SANDALS, PUMPS, WEDGES, AND OTHER NIFTY SHOES FOR WOMEN.	', '121 Malaya St. Malanday, Marikina City, Marikina City, Philippines', '9064997545', 'niftyshoesph@gmail.com', 'homelogo.png', 'homepic.jpg', 'University_of_Makati_logo.png');

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
(118, 'Roy Francis B. Castro', 'castroroyfrancis@gmail.com', '$2y$10$o0h4pXezW0dzCVdjRUOtT.6xzIvm4C85qNmwN/BENTpvUDogzTQt6', 0, 'verified', '09750162818', '5014 General Ricarte South Cembo, Taguig City'),
(119, 'Papisss Castro', 'papisss05@gmail.com', '$2y$10$xfEw/WgMFH/OP11ZqEDVt.hHvk.aktmSPlvah26TGgRYtPB5uHpaq', 0, 'verified', '', ''),
(120, 'Roy Francis B. Castro', 'castroroyfrancis05@gmail.com', '$2y$10$tPgyFiePl9yiKHwsESA9m.fpQ5bKiv6h79elluF7akFN8WVC3xLia', 0, 'verified', '', ''),
(121, 'Roy Francis B. Castro', 'lagegad669@ricorit.com', '$2y$10$.xIrcRSCxQ6B1ap.7W6zg.pj03JbnuLrNpdGz1c0hEGU7jjLvYV4G', 0, 'verified', '', ''),
(122, 'Paul Nateman Bustillo', 'mnlbusy@gmail.com', '$2y$10$Gq78J21qoOqHbuT6bczGsu9mh0bX.//Z2pGeR7YrIHGG14gO616QO', 0, 'verified', '09557315312', 'Kalbayog st. mandaluyong'),
(123, 'd', 'd@d.d', '$2y$10$uEP.mKAeEn2tcyfHRQQ/g..PX7vCgSwoiqe4dLwiHgR6wuKGaZcI6', 848376, 'notverified', '', 'd'),
(124, 'Jonathan', 'jojonathanpeol3001@gmail.com', '$2y$10$MUJS6SPOq5UIWcEAiGsSqe0vR5nJOo7UGoztWZjGn71WGRyI5x3je', 0, 'verified', '09452051108', 'Marikina'),
(125, '', 'hagicef919@dacgu.com', '', 656786, 'notverified', '', ''),
(126, '', 'vomepop723@dacgu.com', '', 230411, 'notverified', '', ''),
(127, '', 'nevaj32595@felibg.com', '$2y$10$Mm9GVYHGBGd6JzanULrs8ubm/vzyX/Zb4fe9IT7Qe7pVVEB1fpiye', 0, 'verified', '', ''),
(128, '', 'walon42636@felibg.com', '$2y$10$qIV466grJaSM0yHtGIMpmePqUUtvCdot6RDF/n4hX3zG/Q4Wh1W9i', 0, 'verified', '', ''),
(129, '', 'ganeh73813@ekposta.com', '', 0, 'verified', '', ''),
(130, '', 'cigice8999@dacgu.com', '', 665113, 'notverified', '', ''),
(131, '', 'bigotap366@felibg.com', '', 188333, 'notverified', '', ''),
(132, '', 'pogij90767@felibg.com', '', 0, 'verified', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_accounts`
--
ALTER TABLE `admin_accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_activity_log`
--
ALTER TABLE `admin_activity_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_log`
--
ALTER TABLE `admin_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `archive_products`
--
ALTER TABLE `archive_products`
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
-- Indexes for table `order_archive`
--
ALTER TABLE `order_archive`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_log`
--
ALTER TABLE `order_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_gallery`
--
ALTER TABLE `product_gallery`
  ADD PRIMARY KEY (`gallery_id`);

--
-- Indexes for table `product_operation`
--
ALTER TABLE `product_operation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_sales`
--
ALTER TABLE `product_sales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_stocks`
--
ALTER TABLE `product_stocks`
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
-- Indexes for table `stocks_log`
--
ALTER TABLE `stocks_log`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `admin_activity_log`
--
ALTER TABLE `admin_activity_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `admin_log`
--
ALTER TABLE `admin_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=128;

--
-- AUTO_INCREMENT for table `archive_products`
--
ALTER TABLE `archive_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=247;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=118;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=126;

--
-- AUTO_INCREMENT for table `order_archive`
--
ALTER TABLE `order_archive`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_log`
--
ALTER TABLE `order_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `product_gallery`
--
ALTER TABLE `product_gallery`
  MODIFY `gallery_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `product_operation`
--
ALTER TABLE `product_operation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `product_sales`
--
ALTER TABLE `product_sales`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `product_stocks`
--
ALTER TABLE `product_stocks`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `review_table`
--
ALTER TABLE `review_table`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `sales_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT for table `stocks_log`
--
ALTER TABLE `stocks_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `upload`
--
ALTER TABLE `upload`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `usertable`
--
ALTER TABLE `usertable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=133;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

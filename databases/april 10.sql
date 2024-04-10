-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 09, 2024 at 07:32 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

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
(25, 'Papisss', '2024-04-08', '2024-04-08 08:11:14', 'uploaded a file on product #34'),
(26, 'LBJ', '2024-04-08', '2024-04-08 11:57:12', 'deleted category (\"bhghfgh\")'),
(27, 'LBJ', '2024-04-08', '2024-04-08 12:10:55', 'deleted category with ID 50'),
(28, 'LBJ', '2024-04-08', '2024-04-08 12:10:55', 'deleted category with ID '),
(29, 'LBJ', '2024-04-08', '2024-04-08 12:10:55', 'deleted category with ID '),
(30, 'LBJ', '2024-04-08', '2024-04-08 12:10:55', 'deleted category with ID '),
(31, 'LBJ', '2024-04-08', '2024-04-08 12:10:55', 'deleted category with ID '),
(32, 'LBJ', '2024-04-08', '2024-04-08 12:10:55', 'deleted category with ID '),
(33, 'LBJ', '2024-04-08', '2024-04-08 12:10:55', 'deleted category with ID '),
(34, 'LBJ', '2024-04-08', '2024-04-08 12:10:55', 'deleted category with ID '),
(35, 'LBJ', '2024-04-08', '2024-04-08 12:10:55', 'deleted category with ID '),
(36, 'LBJ', '2024-04-08', '2024-04-08 12:10:55', 'deleted category with ID '),
(37, 'LBJ', '2024-04-08', '2024-04-08 12:10:55', 'deleted category with ID '),
(38, 'LBJ', '2024-04-08', '2024-04-08 12:10:55', 'deleted category with ID '),
(39, 'LBJ', '2024-04-08', '2024-04-08 12:10:55', 'deleted category with ID '),
(40, 'LBJ', '2024-04-08', '2024-04-08 12:10:55', 'deleted category with ID '),
(41, 'LBJ', '2024-04-08', '2024-04-08 12:10:55', 'deleted category with ID '),
(42, 'LBJ', '2024-04-08', '2024-04-08 12:10:55', 'deleted category with ID '),
(43, 'LBJ', '2024-04-08', '2024-04-08 12:10:55', 'deleted category with ID '),
(44, 'LBJ', '2024-04-08', '2024-04-08 12:10:55', 'deleted category with ID '),
(45, 'LBJ', '2024-04-08', '2024-04-08 12:10:55', 'deleted category with ID '),
(46, 'LBJ', '2024-04-08', '2024-04-08 12:10:56', 'deleted category with ID '),
(47, 'LBJ', '2024-04-08', '2024-04-08 12:10:57', 'deleted category with ID '),
(48, 'LBJ', '2024-04-08', '2024-04-08 12:10:57', 'deleted category with ID '),
(49, 'LBJ', '2024-04-08', '2024-04-08 12:10:57', 'deleted category with ID '),
(50, 'LBJ', '2024-04-08', '2024-04-08 12:10:57', 'deleted category with ID '),
(51, 'LBJ', '2024-04-08', '2024-04-08 12:10:57', 'deleted category with ID '),
(52, 'LBJ', '2024-04-08', '2024-04-08 12:10:57', 'deleted category with ID '),
(53, 'LBJ', '2024-04-08', '2024-04-08 12:10:57', 'deleted category with ID '),
(54, 'LBJ', '2024-04-08', '2024-04-08 12:10:57', 'deleted category with ID '),
(55, 'LBJ', '2024-04-08', '2024-04-08 12:10:57', 'deleted category with ID '),
(56, 'LBJ', '2024-04-08', '2024-04-08 12:10:57', 'deleted category with ID '),
(57, 'LBJ', '2024-04-08', '2024-04-08 12:10:57', 'deleted category with ID '),
(58, 'LBJ', '2024-04-08', '2024-04-08 12:10:57', 'deleted category with ID '),
(59, 'LBJ', '2024-04-08', '2024-04-08 12:10:57', 'deleted category with ID '),
(60, 'LBJ', '2024-04-08', '2024-04-08 12:10:57', 'deleted category with ID '),
(61, 'LBJ', '2024-04-08', '2024-04-08 12:10:57', 'deleted category with ID '),
(62, 'LBJ', '2024-04-08', '2024-04-08 12:10:57', 'deleted category with ID '),
(63, 'LBJ', '2024-04-08', '2024-04-08 12:10:57', 'deleted category with ID '),
(64, 'LBJ', '2024-04-08', '2024-04-08 12:10:57', 'deleted category with ID '),
(65, 'LBJ', '2024-04-08', '2024-04-08 12:10:57', 'deleted category with ID '),
(66, 'LBJ', '2024-04-08', '2024-04-08 12:10:57', 'deleted category with ID '),
(67, 'LBJ', '2024-04-08', '2024-04-08 12:10:59', 'deleted category with ID 62'),
(68, 'LBJ', '2024-04-08', '2024-04-08 12:10:59', 'deleted category with ID '),
(69, 'LBJ', '2024-04-08', '2024-04-08 12:10:59', 'deleted category with ID '),
(70, 'LBJ', '2024-04-08', '2024-04-08 12:10:59', 'deleted category with ID '),
(71, 'LBJ', '2024-04-08', '2024-04-08 12:10:59', 'deleted category with ID '),
(72, 'LBJ', '2024-04-08', '2024-04-08 12:10:59', 'deleted category with ID '),
(73, 'LBJ', '2024-04-08', '2024-04-08 12:10:59', 'deleted category with ID '),
(74, 'LBJ', '2024-04-08', '2024-04-08 12:10:59', 'deleted category with ID '),
(75, 'LBJ', '2024-04-08', '2024-04-08 12:10:59', 'deleted category with ID '),
(76, 'LBJ', '2024-04-08', '2024-04-08 12:10:59', 'deleted category with ID '),
(77, 'LBJ', '2024-04-08', '2024-04-08 12:10:59', 'deleted category with ID '),
(78, 'LBJ', '2024-04-08', '2024-04-08 12:10:59', 'deleted category with ID '),
(79, 'LBJ', '2024-04-08', '2024-04-08 12:10:59', 'deleted category with ID '),
(80, 'LBJ', '2024-04-08', '2024-04-08 12:10:59', 'deleted category with ID '),
(81, 'LBJ', '2024-04-08', '2024-04-08 12:10:59', 'deleted category with ID '),
(82, 'LBJ', '2024-04-08', '2024-04-08 12:10:59', 'deleted category with ID '),
(83, 'LBJ', '2024-04-08', '2024-04-08 12:10:59', 'deleted category with ID '),
(84, 'LBJ', '2024-04-08', '2024-04-08 12:10:59', 'deleted category with ID '),
(85, 'LBJ', '2024-04-08', '2024-04-08 12:11:00', 'deleted category with ID '),
(86, 'LBJ', '2024-04-08', '2024-04-08 12:11:00', 'deleted category with ID '),
(87, 'LBJ', '2024-04-08', '2024-04-08 12:11:01', 'deleted category with ID 62'),
(88, 'LBJ', '2024-04-08', '2024-04-08 12:11:01', 'deleted category with ID '),
(89, 'LBJ', '2024-04-08', '2024-04-08 12:11:01', 'deleted category with ID '),
(90, 'LBJ', '2024-04-08', '2024-04-08 12:11:01', 'deleted category with ID '),
(91, 'LBJ', '2024-04-08', '2024-04-08 12:11:01', 'deleted category with ID '),
(92, 'LBJ', '2024-04-08', '2024-04-08 12:11:01', 'deleted category with ID '),
(93, 'LBJ', '2024-04-08', '2024-04-08 12:11:01', 'deleted category with ID '),
(94, 'LBJ', '2024-04-08', '2024-04-08 12:11:01', 'deleted category with ID '),
(95, 'LBJ', '2024-04-08', '2024-04-08 12:11:01', 'deleted category with ID '),
(96, 'LBJ', '2024-04-08', '2024-04-08 12:11:01', 'deleted category with ID '),
(97, 'LBJ', '2024-04-08', '2024-04-08 12:11:01', 'deleted category with ID '),
(98, 'LBJ', '2024-04-08', '2024-04-08 12:11:01', 'deleted category with ID '),
(99, 'LBJ', '2024-04-08', '2024-04-08 12:11:01', 'deleted category with ID '),
(100, 'LBJ', '2024-04-08', '2024-04-08 12:11:01', 'deleted category with ID '),
(101, 'LBJ', '2024-04-08', '2024-04-08 12:11:01', 'deleted category with ID '),
(102, 'LBJ', '2024-04-08', '2024-04-08 12:11:01', 'deleted category with ID '),
(103, 'LBJ', '2024-04-08', '2024-04-08 12:11:01', 'deleted category with ID '),
(104, 'LBJ', '2024-04-08', '2024-04-08 12:11:01', 'deleted category with ID '),
(105, 'LBJ', '2024-04-08', '2024-04-08 12:11:01', 'deleted category with ID '),
(106, 'LBJ', '2024-04-08', '2024-04-08 12:11:01', 'deleted category with ID '),
(107, 'LBJ', '2024-04-08', '2024-04-08 12:11:02', 'deleted category with ID 62'),
(108, 'LBJ', '2024-04-08', '2024-04-08 12:11:02', 'deleted category with ID '),
(109, 'LBJ', '2024-04-08', '2024-04-08 12:11:02', 'deleted category with ID '),
(110, 'LBJ', '2024-04-08', '2024-04-08 12:11:02', 'deleted category with ID '),
(111, 'LBJ', '2024-04-08', '2024-04-08 12:11:02', 'deleted category with ID '),
(112, 'LBJ', '2024-04-08', '2024-04-08 12:11:02', 'deleted category with ID '),
(113, 'LBJ', '2024-04-08', '2024-04-08 12:11:02', 'deleted category with ID '),
(114, 'LBJ', '2024-04-08', '2024-04-08 12:11:02', 'deleted category with ID '),
(115, 'LBJ', '2024-04-08', '2024-04-08 12:11:02', 'deleted category with ID '),
(116, 'LBJ', '2024-04-08', '2024-04-08 12:11:02', 'deleted category with ID '),
(117, 'LBJ', '2024-04-08', '2024-04-08 12:11:02', 'deleted category with ID '),
(118, 'LBJ', '2024-04-08', '2024-04-08 12:11:02', 'deleted category with ID '),
(119, 'LBJ', '2024-04-08', '2024-04-08 12:11:02', 'deleted category with ID '),
(120, 'LBJ', '2024-04-08', '2024-04-08 12:11:02', 'deleted category with ID '),
(121, 'LBJ', '2024-04-08', '2024-04-08 12:11:02', 'deleted category with ID '),
(122, 'LBJ', '2024-04-08', '2024-04-08 12:11:02', 'deleted category with ID '),
(123, 'LBJ', '2024-04-08', '2024-04-08 12:11:02', 'deleted category with ID '),
(124, 'LBJ', '2024-04-08', '2024-04-08 12:11:02', 'deleted category with ID '),
(125, 'LBJ', '2024-04-08', '2024-04-08 12:11:02', 'deleted category with ID '),
(126, 'LBJ', '2024-04-08', '2024-04-08 12:11:02', 'deleted category with ID '),
(127, 'LBJ', '2024-04-08', '2024-04-08 12:11:03', 'deleted category with ID 62'),
(128, 'LBJ', '2024-04-08', '2024-04-08 12:11:03', 'deleted category with ID '),
(129, 'LBJ', '2024-04-08', '2024-04-08 12:11:03', 'deleted category with ID '),
(130, 'LBJ', '2024-04-08', '2024-04-08 12:11:03', 'deleted category with ID '),
(131, 'LBJ', '2024-04-08', '2024-04-08 12:11:03', 'deleted category with ID '),
(132, 'LBJ', '2024-04-08', '2024-04-08 12:11:03', 'deleted category with ID '),
(133, 'LBJ', '2024-04-08', '2024-04-08 12:11:03', 'deleted category with ID '),
(134, 'LBJ', '2024-04-08', '2024-04-08 12:11:03', 'deleted category with ID '),
(135, 'LBJ', '2024-04-08', '2024-04-08 12:11:03', 'deleted category with ID '),
(136, 'LBJ', '2024-04-08', '2024-04-08 12:11:03', 'deleted category with ID '),
(137, 'LBJ', '2024-04-08', '2024-04-08 12:11:03', 'deleted category with ID '),
(138, 'LBJ', '2024-04-08', '2024-04-08 12:11:03', 'deleted category with ID '),
(139, 'LBJ', '2024-04-08', '2024-04-08 12:11:03', 'deleted category with ID '),
(140, 'LBJ', '2024-04-08', '2024-04-08 12:11:03', 'deleted category with ID '),
(141, 'LBJ', '2024-04-08', '2024-04-08 12:11:03', 'deleted category with ID '),
(142, 'LBJ', '2024-04-08', '2024-04-08 12:11:03', 'deleted category with ID '),
(143, 'LBJ', '2024-04-08', '2024-04-08 12:11:03', 'deleted category with ID '),
(144, 'LBJ', '2024-04-08', '2024-04-08 12:11:03', 'deleted category with ID '),
(145, 'LBJ', '2024-04-08', '2024-04-08 12:11:03', 'deleted category with ID '),
(146, 'LBJ', '2024-04-08', '2024-04-08 12:11:04', 'deleted category with ID '),
(147, 'LBJ', '2024-04-08', '2024-04-08 12:11:04', 'deleted category with ID '),
(148, 'LBJ', '2024-04-08', '2024-04-08 12:11:04', 'deleted category with ID '),
(149, 'LBJ', '2024-04-08', '2024-04-08 12:11:04', 'deleted category with ID '),
(150, 'LBJ', '2024-04-08', '2024-04-08 12:11:04', 'deleted category with ID '),
(151, 'LBJ', '2024-04-08', '2024-04-08 12:11:04', 'deleted category with ID '),
(152, 'LBJ', '2024-04-08', '2024-04-08 12:11:04', 'deleted category with ID 62'),
(153, 'LBJ', '2024-04-08', '2024-04-08 12:11:04', 'deleted category with ID '),
(154, 'LBJ', '2024-04-08', '2024-04-08 12:11:04', 'deleted category with ID '),
(155, 'LBJ', '2024-04-08', '2024-04-08 12:11:04', 'deleted category with ID '),
(156, 'LBJ', '2024-04-08', '2024-04-08 12:11:04', 'deleted category with ID '),
(157, 'LBJ', '2024-04-08', '2024-04-08 12:11:04', 'deleted category with ID '),
(158, 'LBJ', '2024-04-08', '2024-04-08 12:11:04', 'deleted category with ID '),
(159, 'LBJ', '2024-04-08', '2024-04-08 12:11:04', 'deleted category with ID '),
(160, 'LBJ', '2024-04-08', '2024-04-08 12:11:04', 'deleted category with ID '),
(161, 'LBJ', '2024-04-08', '2024-04-08 12:11:04', 'deleted category with ID '),
(162, 'LBJ', '2024-04-08', '2024-04-08 12:11:06', 'deleted category with ID '),
(163, 'LBJ', '2024-04-08', '2024-04-08 12:11:06', 'deleted category with ID '),
(164, 'LBJ', '2024-04-08', '2024-04-08 12:11:07', 'deleted category with ID '),
(165, 'LBJ', '2024-04-08', '2024-04-08 12:11:07', 'deleted category with ID '),
(166, 'LBJ', '2024-04-08', '2024-04-08 12:11:07', 'deleted category with ID '),
(167, 'LBJ', '2024-04-08', '2024-04-08 12:11:07', 'deleted category with ID '),
(168, 'LBJ', '2024-04-08', '2024-04-08 12:11:07', 'deleted category with ID '),
(169, 'LBJ', '2024-04-08', '2024-04-08 12:11:07', 'deleted category with ID '),
(170, 'LBJ', '2024-04-08', '2024-04-08 12:11:07', 'deleted category with ID '),
(171, 'LBJ', '2024-04-08', '2024-04-08 12:11:07', 'deleted category with ID '),
(172, 'LBJ', '2024-04-08', '2024-04-08 12:11:07', 'deleted category with ID '),
(173, 'LBJ', '2024-04-08', '2024-04-08 12:11:07', 'deleted category with ID '),
(174, 'LBJ', '2024-04-08', '2024-04-08 12:11:07', 'deleted category with ID '),
(175, 'LBJ', '2024-04-08', '2024-04-08 12:11:07', 'deleted category with ID '),
(176, 'LBJ', '2024-04-08', '2024-04-08 12:11:07', 'deleted category with ID '),
(177, 'LBJ', '2024-04-08', '2024-04-08 12:11:07', 'deleted category with ID '),
(178, 'LBJ', '2024-04-08', '2024-04-08 12:11:07', 'deleted category with ID '),
(179, 'LBJ', '2024-04-08', '2024-04-08 12:11:07', 'deleted category with ID '),
(180, 'LBJ', '2024-04-08', '2024-04-08 12:11:07', 'deleted category with ID '),
(181, 'LBJ', '2024-04-08', '2024-04-08 12:11:07', 'deleted category with ID '),
(182, 'LBJ', '2024-04-08', '2024-04-08 12:11:08', 'deleted category with ID '),
(183, 'LBJ', '2024-04-08', '2024-04-08 12:11:08', 'deleted category with ID '),
(184, 'LBJ', '2024-04-08', '2024-04-08 12:11:08', 'deleted category with ID '),
(185, 'LBJ', '2024-04-08', '2024-04-08 12:11:08', 'deleted category with ID '),
(186, 'LBJ', '2024-04-08', '2024-04-08 12:11:08', 'deleted category with ID '),
(187, 'LBJ', '2024-04-08', '2024-04-08 12:11:08', 'deleted category with ID '),
(188, 'LBJ', '2024-04-08', '2024-04-08 12:11:08', 'deleted category with ID '),
(189, 'LBJ', '2024-04-08', '2024-04-08 12:11:08', 'deleted category with ID '),
(190, 'LBJ', '2024-04-08', '2024-04-08 12:11:08', 'deleted category with ID '),
(191, 'LBJ', '2024-04-08', '2024-04-08 12:11:08', 'deleted category with ID '),
(192, 'LBJ', '2024-04-08', '2024-04-08 12:11:08', 'deleted category with ID '),
(193, 'LBJ', '2024-04-08', '2024-04-08 12:11:08', 'deleted category with ID '),
(194, 'LBJ', '2024-04-08', '2024-04-08 12:11:09', 'deleted category with ID '),
(195, 'LBJ', '2024-04-08', '2024-04-08 12:11:09', 'deleted category with ID '),
(196, 'LBJ', '2024-04-08', '2024-04-08 12:11:09', 'deleted category with ID '),
(197, 'LBJ', '2024-04-08', '2024-04-08 12:11:09', 'deleted category with ID '),
(198, 'LBJ', '2024-04-08', '2024-04-08 12:11:09', 'deleted category with ID '),
(199, 'LBJ', '2024-04-08', '2024-04-08 12:11:09', 'deleted category with ID '),
(200, 'LBJ', '2024-04-08', '2024-04-08 12:11:09', 'deleted category with ID '),
(201, 'LBJ', '2024-04-08', '2024-04-08 12:11:09', 'deleted category with ID '),
(202, 'LBJ', '2024-04-08', '2024-04-08 12:11:14', 'deleted category with ID '),
(203, 'LBJ', '2024-04-08', '2024-04-08 12:11:14', 'deleted category with ID '),
(204, 'LBJ', '2024-04-08', '2024-04-08 12:11:14', 'deleted category with ID '),
(205, 'LBJ', '2024-04-08', '2024-04-08 12:11:14', 'deleted category with ID '),
(206, 'LBJ', '2024-04-08', '2024-04-08 12:11:14', 'deleted category with ID '),
(207, 'LBJ', '2024-04-08', '2024-04-08 12:11:14', 'deleted category with ID '),
(208, 'LBJ', '2024-04-08', '2024-04-08 12:11:14', 'deleted category with ID '),
(209, 'LBJ', '2024-04-08', '2024-04-08 12:11:14', 'deleted category with ID '),
(210, 'LBJ', '2024-04-08', '2024-04-08 12:11:14', 'deleted category with ID '),
(211, 'LBJ', '2024-04-08', '2024-04-08 12:11:14', 'deleted category with ID '),
(212, 'LBJ', '2024-04-08', '2024-04-08 12:11:14', 'deleted category with ID '),
(213, 'LBJ', '2024-04-08', '2024-04-08 12:11:14', 'deleted category with ID '),
(214, 'LBJ', '2024-04-08', '2024-04-08 12:11:14', 'deleted category with ID '),
(215, 'LBJ', '2024-04-08', '2024-04-08 12:11:14', 'deleted category with ID '),
(216, 'LBJ', '2024-04-08', '2024-04-08 12:11:14', 'deleted category with ID '),
(217, 'LBJ', '2024-04-08', '2024-04-08 12:11:14', 'deleted category with ID '),
(218, 'LBJ', '2024-04-08', '2024-04-08 12:11:14', 'deleted category with ID '),
(219, 'LBJ', '2024-04-08', '2024-04-08 12:11:14', 'deleted category with ID '),
(220, 'LBJ', '2024-04-08', '2024-04-08 12:11:14', 'deleted category with ID '),
(221, 'LBJ', '2024-04-08', '2024-04-08 12:11:14', 'deleted category with ID '),
(222, 'LBJ', '2024-04-08', '2024-04-08 12:29:11', 'deleted category (\"zadasd\")'),
(223, 'LBJ', '2024-04-08', '2024-04-08 12:29:13', 'deleted category (\"asdasd\")'),
(224, 'LBJ', '2024-04-08', '2024-04-08 12:29:15', 'deleted category (\"vvdvd\")'),
(225, 'LBJ', '2024-04-08', '2024-04-08 12:29:18', 'deleted category (\"asdasdasd\")'),
(226, 'LBJ', '2024-04-08', '2024-04-08 13:39:56', 'added a category:test'),
(227, 'LBJ', '2024-04-08', '2024-04-08 13:59:37', 'added a category:test2'),
(228, 'LBJ', '2024-04-09', '2024-04-09 03:38:18', 'uploaded a file on product #47'),
(229, 'LBJ', '2024-04-09', '2024-04-09 03:38:28', 'uploaded a file on product #47'),
(230, 'LBJ', '2024-04-09', '2024-04-09 15:22:40', 'Archive a user account'),
(231, 'LBJ', '2024-04-09', '2024-04-09 15:25:47', 'edit product name id number: 21toElvis'),
(232, 'LBJ', '2024-04-09', '2024-04-09 15:26:04', 'edit product name id number: 34toElvis'),
(233, 'LBJ', '2024-04-09', '2024-04-09 15:26:29', 'edit product name id number: 34toPresly'),
(234, 'LBJ', '2024-04-09', '2024-04-09 15:44:01', 'added a category:Test3'),
(235, 'LBJ', '2024-04-09', '2024-04-09 15:49:34', 'deleted category test2'),
(236, 'LBJ', '2024-04-10', '2024-04-09 17:25:44', 'Archive a user account'),
(237, 'LBJ', '2024-04-10', '2024-04-09 17:26:01', 'Archive a user account'),
(238, 'Roy Francis B. Castro', '2024-04-10', '2024-04-09 17:27:45', 'Archive a user review');

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
(127, 'Papisss', '2024-04-08 02:24:51', '2024-04-08'),
(128, 'LBJ', '2024-04-08 11:49:05', '2024-04-08'),
(129, 'LBJ', '2024-04-09 07:33:15', '2024-04-09');

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
(1, '44', 'Flats', 'TESTING', '222', 'admin/uploaded_img/367c4418-0e6d-4d4f-8aeb-17ea1792e692.jpg', 'WASH DIS', '2024-04-08 11:21:02'),
(2, '50', 'test', 'TESTING', '999', 'admin/uploaded_img/shinobi-jett-valorant-thumb.jpg', 'Effortless elegance meets ultimate comfort with these foldable ballet-inspired shoes that feel like a dream on your feet! 💃👣 #ComfortMeetsStyle #staycomfywearnifty	', '2024-04-09 23:48:19');

-- --------------------------------------------------------

--
-- Table structure for table `archive_review`
--

CREATE TABLE `archive_review` (
  `id` int(11) NOT NULL,
  `review_id` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `user_rating` varchar(255) NOT NULL,
  `user_review` varchar(255) NOT NULL,
  `date_time_archive` datetime NOT NULL DEFAULT current_timestamp(),
  `product_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `archive_review`
--

INSERT INTO `archive_review` (`id`, `review_id`, `username`, `user_rating`, `user_review`, `date_time_archive`, `product_id`) VALUES
(1, '23', 'Roy Francis B. Castro', '1', 'ANG PANGET NG PRODUCT NYO ', '2024-04-10 01:27:45', '34');

-- --------------------------------------------------------

--
-- Table structure for table `archive_user`
--

CREATE TABLE `archive_user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `date_time_archive` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `archive_user`
--

INSERT INTO `archive_user` (`id`, `name`, `email`, `contact`, `address`, `status`, `date_time_archive`) VALUES
(1, '', 'bigotap366@felibg.com', '', '', '', '2024-04-08 23:08:49'),
(2, '', 'cigice8999@dacgu.com', '', '', '', '2024-04-08 23:09:11'),
(3, '', 'vomepop723@dacgu.com', '', '', '', '2024-04-08 23:10:07'),
(4, 'd', 'd@d.d', '', 'd', '', '2024-04-09 23:20:07'),
(5, '', 'hagicef919@dacgu.com', '', '', '', '2024-04-09 23:22:40'),
(6, '', '', '', '', '', '2024-04-10 01:25:44'),
(7, '', '', '', '', '', '2024-04-10 01:26:01');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(100) NOT NULL,
  `product_id` varchar(255) NOT NULL,
  `user_id` int(100) NOT NULL,
  `image` varchar(255) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` varchar(100) NOT NULL,
  `unit` varchar(255) NOT NULL,
  `color` varchar(255) NOT NULL,
  `quantity` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(63, 'test');

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
(117, 'castroroyfrancis@gmail.com', '2024-04-08 02:59:03', '2024-04-08'),
(118, 'castroroyfrancis@gmail.com', '2024-04-08 16:18:11', '2024-04-09'),
(119, 'castroroyfrancis@gmail.com', '2024-04-09 11:33:47', '2024-04-09');

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
(128, 'Roy Francis B. Castro', '09750162818', 'castroroyfrancis@gmail.com', 'gcash', '5014 General Ricarte South Cembo, Taguig City', 'Item: [FOLDABLE BALLERINA] SIZE & COLOR [6Brown] Quantity: [3] \n', '1797', 118, 'cancelled', '2024-04-09', '2024-04-09 11:36:01', '714040502', '9750162818', 'mq2.jpg'),
(129, 'Roy Francis B. Castro', '09750162818', 'castroroyfrancis@gmail.com', 'cash on delivery', '5014 General Ricarte South Cembo, Taguig City', 'Maggie 8Gold 1\n\nFOLDABLE BALLERINA 7Brown 1\n', '1248', 118, 'pending', '2024-04-09', '2024-04-09 11:38:38', '0', '0', 'none'),
(130, 'Roy Francis B. Castro', '09750162818', 'castroroyfrancis@gmail.com', 'gcash', '5014 General Ricarte South Cembo, Taguig City', 'FOLDABLE BALLERINA 6Brown 1\n\nFOLDABLE BALLERINA 7Brown 1\n', '1198', 118, 'pending', '2024-04-09', '2024-04-09 14:41:48', '12345678', '9557315312', 'hunter-x-hunter-4k-y9lfr2ipvrb9ggr8.jpg');

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
(3, 93, 'updated order status (order completed)', 'Papisss', '2024-04-06 13:08:10'),
(4, 130, 'Accepted Payment for GCASH - ORDER #: 130', 'LBJ', '2024-04-09 23:12:23');

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
(34, 'Slip-ons', 'Presly', 1200, 'admin/uploaded_img/431780365_18423152689013011_7830608783600598095_n.jpg', 'Your wardrobe\'s must-have. Presley slip-ons! Back in stock and ready to elevate your style game. Slip into comfort, class, and versatility - get yours now!', '2024-03-13', '2024-03-13 02:46:42', '2024-04-09', '2024-04-09 15:26:29'),
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
(4, 47, 'ph-11134207-7r98p-lsdufaivyjwka6 (1).jpg', '2024-04-06 00:47:06'),
(10, 47, 'ph-11134207-7r98r-lsduuv67pqt1d5.jpg', '2024-04-09 11:38:18'),
(11, 47, 'ph-11134207-7r98w-lsduuv67k404f2.jpg', '2024-04-09 11:38:28'),
(12, 48, '427800912_246012861891625_4022607893347354658_n.png', '2024-04-09 23:43:47'),
(13, 49, 'shinobi-jett-valorant-thumb.jpg', '2024-04-09 23:46:43'),
(14, 50, 'shinobi-jett-valorant-thumb.jpg', '2024-04-09 23:48:15');

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
(3, 'LBJ', 'created a category', 'SD', '2024-04-06 01:18:45'),
(6, 'LBJ', 'created a product', 'TESTING', '2024-04-09 23:43:47'),
(7, 'LBJ', 'created a product', 'TESTING', '2024-04-09 23:46:43'),
(8, 'LBJ', 'created a product', 'TESTING', '2024-04-09 23:48:15');

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
(20, '125', 'Maggie', 40),
(21, '126', 'Presly', 3),
(22, '127', 'Presly', 3),
(23, '128', 'FOLDABLE BALLERINA', 3),
(24, '129', 'Maggie', 1),
(25, '129', 'FOLDABLE BALLERINA', 1),
(26, '130', 'FOLDABLE BALLERINA', 1),
(27, '130', 'FOLDABLE BALLERINA', 1);

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
(5, '34', '6', 'White', '97'),
(6, '35', '6', 'Yellow', '4'),
(7, '35', '5', 'Gold', '100'),
(8, '35', '7', 'Gold', '10'),
(9, '35', '6', 'Mocha', '100'),
(10, '35', '8', 'Gold', '99'),
(11, '35', '8', 'Mocha', '10'),
(12, '47', '5', 'Brown', '50'),
(13, '47', '6', 'Brown', '46'),
(14, '47', '7', 'Brown', '48'),
(15, '47', '8', 'Brown', '50');

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
(88, 125, 25960, '2024-04-08'),
(89, 126, 3600, '2024-04-09'),
(90, 127, 3600, '2024-04-09'),
(91, 128, 1797, '2024-04-09'),
(92, 129, 1248, '2024-04-09'),
(93, 130, 1198, '2024-04-09');

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
(10, 'Papisss', 'added a stock', '35', '10', '2024-04-07 14:37:57'),
(11, 'LBJ', 'added a stock', '47', '50', '2024-04-09 11:41:53'),
(12, 'LBJ', 'added a stock', '47', '50', '2024-04-09 11:42:17'),
(13, 'LBJ', 'added a stock', '47', '50', '2024-04-09 11:42:26'),
(14, 'LBJ', 'added a stock', '47', '1', '2024-04-09 11:42:32'),
(15, 'LBJ', 'added a stock', '47', '49', '2024-04-09 11:42:40'),
(16, 'LBJ', 'added a stock', '35', '5', '2024-04-09 23:56:50'),
(17, 'LBJ', 'added a stock', '35', '1', '2024-04-10 00:02:01');

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
(124, 'Jonathan', 'jojonathanpeol3001@gmail.com', '$2y$10$MUJS6SPOq5UIWcEAiGsSqe0vR5nJOo7UGoztWZjGn71WGRyI5x3je', 0, 'verified', '09452051108', 'Marikina'),
(127, '', 'nevaj32595@felibg.com', '$2y$10$Mm9GVYHGBGd6JzanULrs8ubm/vzyX/Zb4fe9IT7Qe7pVVEB1fpiye', 0, 'verified', '', ''),
(128, '', 'walon42636@felibg.com', '$2y$10$qIV466grJaSM0yHtGIMpmePqUUtvCdot6RDF/n4hX3zG/Q4Wh1W9i', 0, 'verified', '', ''),
(129, '', 'ganeh73813@ekposta.com', '', 0, 'verified', '', ''),
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
-- Indexes for table `archive_review`
--
ALTER TABLE `archive_review`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `archive_user`
--
ALTER TABLE `archive_user`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=239;

--
-- AUTO_INCREMENT for table `admin_log`
--
ALTER TABLE `admin_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=130;

--
-- AUTO_INCREMENT for table `archive_products`
--
ALTER TABLE `archive_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `archive_review`
--
ALTER TABLE `archive_review`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `archive_user`
--
ALTER TABLE `archive_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=253;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=131;

--
-- AUTO_INCREMENT for table `order_archive`
--
ALTER TABLE `order_archive`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_log`
--
ALTER TABLE `order_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `product_gallery`
--
ALTER TABLE `product_gallery`
  MODIFY `gallery_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `product_operation`
--
ALTER TABLE `product_operation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `product_sales`
--
ALTER TABLE `product_sales`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `product_stocks`
--
ALTER TABLE `product_stocks`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `review_table`
--
ALTER TABLE `review_table`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `sales_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT for table `stocks_log`
--
ALTER TABLE `stocks_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

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

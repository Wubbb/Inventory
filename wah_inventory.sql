-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 09, 2019 at 02:13 AM
-- Server version: 10.1.22-MariaDB
-- PHP Version: 7.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wah_inventory`
--

-- --------------------------------------------------------

--
-- Table structure for table `assigns`
--

CREATE TABLE `assigns` (
  `id` int(10) UNSIGNED NOT NULL,
  `item_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `date_assigned` date NOT NULL,
  `date_returned` date DEFAULT NULL,
  `remarks` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int(10) UNSIGNED NOT NULL,
  `prop_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `org` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `item_name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `serial_no` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `source` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_procured` date NOT NULL,
  `date_acquired` date NOT NULL,
  `cost` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `salvage_value` int(11) DEFAULT NULL,
  `life_span` int(11) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `disposed_date` date DEFAULT NULL,
  `disposed_method` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remarks` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `prop_no`, `org`, `type`, `item_name`, `serial_no`, `source`, `date_procured`, `date_acquired`, `cost`, `salvage_value`, `life_span`, `age`, `disposed_date`, `disposed_method`, `remarks`, `location`, `created_at`, `updated_at`) VALUES
(1, 'WAH-OT-EXT001', 'WAH-Techbag', '6 Socket Extensions Universal', 'Omni', NULL, 'WAH', '2013-08-06', '2013-08-06', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Tech Bag1', '2019-05-02 06:10:10', '2019-05-02 06:10:56'),
(2, 'WAH-OT-EXT002', 'WAH-Techbag', '6 Socket Extensions Universal', 'Panter', NULL, 'WAH', '2013-08-06', '2013-08-06', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Tech Bag1', '2019-05-02 06:12:00', '2019-05-02 06:12:21'),
(3, 'WAH-OT-EXT003', 'WAH-Techbag', '6 Socket Extensions Universal', 'Omni', NULL, 'WAH', '2013-08-06', '2013-08-06', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-02 06:13:05', '2019-05-02 06:13:05'),
(4, 'WAH-OT-EXT004', 'WAH-Techbag', '6 Socket Extensions Universal', 'Cybertech', NULL, 'WAH', '2013-08-06', '2013-08-06', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-02 06:13:41', '2019-05-02 06:13:41'),
(5, 'WAH-OT-EXT005', 'WAH-Techbag', '6 Socket Extensions Universal', 'Cybertech', NULL, 'WAH', '2013-08-06', '2013-08-06', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-02 06:14:13', '2019-05-02 06:14:13'),
(6, 'WAH-OT-EXT006', 'WAH-Techbag', '6 Socket Extensions Universal', 'Akari', NULL, 'WAH', '2013-08-06', '2013-08-06', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Tech Bag3', '2019-05-02 06:14:43', '2019-05-02 06:15:00'),
(7, 'WAH-OT-EXT007', 'WAH-Techbag', '6 Socket Extensions Universal', 'Omni', NULL, 'WAH', '2016-02-02', '2016-02-02', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Tech Bag4', '2019-05-02 06:15:37', '2019-05-02 06:15:53'),
(8, 'WAH-OT-EXT008', 'WAH-Techbag', '6 Socket Extensions Universal', 'Omni', NULL, 'WAH', '2016-02-02', '2016-02-02', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Tech Bag4', '2019-05-02 06:16:37', '2019-05-02 06:16:55'),
(9, 'WAH-OT-EXT009', 'WAH-Techbag', '6 Socket Extensions Universal', 'Akari', NULL, 'WAH', '2019-02-12', '2019-02-12', '420', NULL, NULL, NULL, NULL, NULL, NULL, 'Tech Bag2', '2019-05-02 06:34:27', '2019-05-02 06:37:38'),
(10, 'WAH-OT-EXT010', 'WAH-Techbag', '6 Socket Extensions Universal', 'Akari', NULL, 'WAH', '2019-02-12', '2019-02-12', '420', NULL, NULL, NULL, NULL, NULL, NULL, 'Tech Bag2', '2019-05-02 06:35:30', '2019-05-02 06:37:24'),
(11, 'WAH-OT-EXT011', 'WAH-Techbag', '6 Socket Extensions Universal', 'Akari', NULL, 'WAH', '2019-02-12', '2019-02-12', '420', NULL, NULL, NULL, NULL, NULL, NULL, 'Tech Bag3', '2019-05-02 06:36:24', '2019-05-02 06:37:11'),
(12, 'WAH-OT-RTR001', 'WAH-Techbag', 'Router', 'Tp-Link TL-WR941ND', NULL, 'WAH', '2012-01-01', '2012-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Tech Bag1', '2019-05-02 06:39:13', '2019-05-02 06:39:13'),
(13, 'WAH-OT-RTR002', 'WAH-Techbag', 'Router', 'Tp-Link TL-WR941ND', NULL, 'WAH', '2012-01-01', '2012-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Tech Bag2', '2019-05-02 06:39:46', '2019-05-02 06:39:46'),
(14, 'WAH-OT-RTR003', 'WAH-Techbag', 'Router', 'Tp-Link TL-WR1043ND', NULL, 'WAH', '2012-01-01', '2012-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-02 06:41:42', '2019-05-02 06:41:42'),
(16, 'WAH-OT-RTR005', 'WAH-Techbag', 'Router', 'Tp-Link TL-WR940N', NULL, 'WAH', '2018-09-07', '2018-09-07', '1044', NULL, NULL, NULL, NULL, NULL, NULL, 'Tech Bag1', '2019-05-02 06:43:01', '2019-05-02 06:44:20'),
(17, 'WAH-OT-RTR006', 'WAH-Techbag', 'Router', 'Tp-Link TL-WR940N', NULL, 'WAH', '2018-09-07', '2018-09-07', '1044', NULL, NULL, NULL, NULL, NULL, NULL, 'Tech Bag2', '2019-05-02 06:44:03', '2019-05-02 06:44:03'),
(18, 'WAH-OT-RTR007', 'WAH-Techbag', 'Router', 'Tp-Link TL-WR940N', NULL, 'WAH', '2018-09-07', '2018-09-07', '1044', NULL, NULL, NULL, NULL, NULL, NULL, 'Tech Bag3', '2019-05-02 06:44:56', '2019-05-02 06:44:56'),
(19, 'WAH-OT-RTR008', 'WAH-Techbag', 'Router', 'Tp-Link TL-WR940N', NULL, 'WAH', '2018-09-07', '2018-09-07', '1044', NULL, NULL, NULL, NULL, NULL, NULL, 'Tech Bag4', '2019-05-02 06:45:36', '2019-05-02 06:45:36'),
(20, 'WAH-OT-USB004', 'WAH-Techbag', 'USB Flash Drive 8GB', 'Sandisk 16 Gb', NULL, 'WAH', '2019-01-29', '2019-02-01', '229', NULL, NULL, NULL, NULL, NULL, NULL, 'Tech Bag1', '2019-05-02 06:49:13', '2019-05-02 06:49:13'),
(21, 'WAH-OT-USB005', 'WAH-Techbag', 'USB Flash Drive 8GB', 'Sandisk 16 Gb', NULL, 'WAH', '2019-01-29', '2019-02-01', '229', NULL, NULL, NULL, NULL, NULL, NULL, 'Tech Bag2', '2019-05-02 06:49:47', '2019-05-02 06:49:47'),
(22, 'WAH-OT-USB006', 'WAH-Techbag', 'USB Flash Drive 8GB', 'Sandisk 16 Gb', NULL, 'WAH', '2019-01-29', '2019-02-01', '229', NULL, NULL, NULL, NULL, NULL, NULL, 'Tech Bag4', '2019-05-02 06:50:23', '2019-05-02 06:50:23'),
(23, 'WAH-OT-USB007', 'WAH-Techbag', 'USB Flash Drive 8GB', 'Sandisk 16 Gb', NULL, 'WAH', '2019-01-29', '2019-02-01', '229', NULL, NULL, NULL, NULL, NULL, NULL, 'Tech Bag3', '2019-05-02 06:50:53', '2019-05-02 06:50:53'),
(24, 'WAH-OT-MU010', 'WAH-Techbag', 'USB Mouse', 'A4TECH', NULL, 'WAH', '2016-02-02', '2016-02-02', '200', NULL, NULL, NULL, NULL, NULL, NULL, 'Tech Bag1', '2019-05-02 06:52:53', '2019-05-02 06:52:53'),
(25, 'WAH-OT-MU011', 'WAH-Techbag', 'USB Mouse', 'A4TECH', NULL, 'WAH', '2016-02-02', '2016-02-02', '200', NULL, NULL, NULL, NULL, NULL, NULL, 'Tech Bag1', '2019-05-02 06:53:31', '2019-05-02 06:53:31'),
(26, 'WAH-OT-MU012', 'WAH-Techbag', 'USB Mouse', 'A4TECH', NULL, 'WAH', '2016-02-02', '2016-02-02', '200', NULL, NULL, NULL, NULL, NULL, NULL, 'Tech Bag2', '2019-05-02 06:57:07', '2019-05-02 06:57:07'),
(27, 'WAH-OT-MU013', 'WAH-Techbag', 'USB Mouse', 'A4TECH', NULL, 'WAH', '2016-02-02', '2016-02-02', '200', NULL, NULL, NULL, NULL, NULL, NULL, 'Tech Bag2', '2019-05-02 06:57:39', '2019-05-02 06:57:39'),
(28, 'WAH-OT-MU014', 'WAH-Techbag', 'USB Mouse', 'A4TECH', NULL, 'WAH', '2016-02-02', '2016-02-02', '200', NULL, NULL, NULL, NULL, NULL, NULL, 'Tech Bag3', '2019-05-02 06:58:15', '2019-05-02 06:58:15'),
(29, 'WAH-OT-MU015', 'WAH-Techbag', 'USB Mouse', 'A4TECH', NULL, 'WAH', '2016-02-02', '2016-02-02', '200', NULL, NULL, NULL, NULL, NULL, NULL, 'Tech Bag3', '2019-05-02 06:59:27', '2019-05-02 06:59:27'),
(30, 'WAH-OT-MU016', 'WAH-Techbag', 'USB Mouse', 'A4TECH', NULL, 'WAH', '2016-02-02', '2016-02-02', '200', NULL, NULL, NULL, NULL, NULL, NULL, 'Tech Bag4', '2019-05-02 07:00:03', '2019-05-02 07:00:03'),
(31, 'WAH-OT-MU017', 'WAH-Techbag', 'USB Mouse', 'A4TECH', NULL, 'WAH', '2016-02-02', '2016-02-02', '200', NULL, NULL, NULL, NULL, NULL, NULL, 'Tech Bag4', '2019-05-02 07:00:34', '2019-05-02 07:00:34'),
(32, 'WAH-OT-5M001', 'WAH-Techbag', '5 Meters (Lan Cable)', 'CD-R KING', NULL, 'WAH', '2013-08-06', '2013-08-06', '60', NULL, NULL, NULL, NULL, NULL, NULL, 'Tech Bag1', '2019-05-02 07:04:34', '2019-05-02 07:04:34'),
(33, 'WAH-OT-5M002', 'WAH-Techbag', '5 Meters (Lan Cable)', 'CD-R KING', NULL, 'WAH', '2013-08-06', '2013-08-06', '60', NULL, NULL, NULL, NULL, NULL, NULL, 'Tech Bag2', '2019-05-02 07:05:08', '2019-05-02 07:05:08'),
(34, 'WAH-OT-5M003', 'WAH-Techbag', '5 Meters (Lan Cable)', 'CD-R KING', NULL, 'WAH', '2013-08-06', '2013-08-06', '60', NULL, NULL, NULL, NULL, NULL, NULL, 'Tech Bag3', '2019-05-02 07:05:44', '2019-05-02 07:05:44'),
(35, 'WAH-OT-5M004', 'WAH-Techbag', '5 Meters (Lan Cable)', 'CD-R KING', NULL, 'WAH', '2016-02-02', '2016-02-02', '60', NULL, NULL, NULL, NULL, NULL, NULL, 'Tech Bag4', '2019-05-02 07:06:23', '2019-05-02 07:06:23'),
(36, 'WAH-OT-1M001', 'WAH-Techbag', '1 Meter (Lan Cable)', 'CD-R KING', NULL, 'WAH', '2013-08-06', '2013-08-06', '30', NULL, NULL, NULL, NULL, NULL, NULL, 'Tech Bag1', '2019-05-02 07:11:20', '2019-05-02 07:11:20'),
(37, 'WAH-OT-1M002', 'WAH-Techbag', '1 Meter (Lan Cable)', 'CD-R KING', NULL, 'WAH', '2013-08-06', '2013-08-06', '30', NULL, NULL, NULL, NULL, NULL, NULL, 'Tech Bag1', '2019-05-02 07:11:57', '2019-05-02 07:11:57'),
(38, 'WAH-OT-1M003', 'WAH-Techbag', '1 Meter (Lan Cable)', 'CD-R KING', NULL, 'WAH', '2013-08-06', '2013-08-06', '30', NULL, NULL, NULL, NULL, NULL, NULL, 'Tech Bag2', '2019-05-02 07:13:22', '2019-05-02 07:13:22'),
(39, 'WAH-OT-1M004', 'WAH-Techbag', '1 Meter (Lan Cable)', 'CD-R KING', NULL, 'WAH', '2013-08-06', '2013-08-06', '30', NULL, NULL, NULL, NULL, NULL, NULL, 'Tech Bag2', '2019-05-02 07:13:53', '2019-05-02 07:13:53'),
(40, 'WAH-OT-1M005', 'WAH-Techbag', '1 Meter (Lan Cable)', 'CD-R KING', NULL, 'WAH', '2013-08-06', '2013-08-06', '30', NULL, NULL, NULL, NULL, NULL, NULL, 'Tech Bag3', '2019-05-02 07:14:19', '2019-05-02 07:14:19'),
(41, 'WAH-OT-1M006', 'WAH-Techbag', '1 Meter (Lan Cable)', 'CD-R KING', NULL, 'WAH', '2013-08-06', '2013-08-06', '30', NULL, NULL, NULL, NULL, NULL, NULL, 'Tech Bag3', '2019-05-02 07:14:51', '2019-05-02 07:14:51'),
(42, 'WAH-OT-1M007', 'WAH-Techbag', '1 Meter (Lan Cable)', 'CD-R KING', NULL, 'WAH', '2016-02-02', '2016-02-02', '30', NULL, NULL, NULL, NULL, NULL, NULL, 'Tech Bag4', '2019-05-02 07:15:52', '2019-05-02 07:15:52'),
(43, 'WAH-OT-1M008', 'WAH-Techbag', '1 Meter (Lan Cable)', 'CD-R KING', NULL, 'WAH', '2016-02-02', '2016-02-02', '30', NULL, NULL, NULL, NULL, NULL, NULL, 'Tech Bag4', '2019-05-02 07:16:28', '2019-05-02 07:16:28'),
(44, 'WAH-OT-TT001', 'WAH-Techbag', 'Twist Tie', 'Star Gardenma', NULL, 'WAH', '2019-01-25', '2019-02-13', '70', NULL, NULL, NULL, NULL, NULL, NULL, 'Tech Bag1', '2019-05-02 07:17:18', '2019-05-02 07:17:18'),
(45, 'WAH-OT-TT002', 'WAH-Techbag', 'Twist Tie', 'Star Gardenma', NULL, 'WAH', '2019-01-25', '2019-02-13', '70', NULL, NULL, NULL, NULL, NULL, NULL, 'Tech Bag2', '2019-05-02 07:17:54', '2019-05-02 07:17:54'),
(46, 'WAH-OT-TT003', 'WAH-Techbag', 'Twist Tie', 'Star Gardenma', NULL, 'WAH', '2019-01-25', '2019-02-13', '70', NULL, NULL, NULL, NULL, NULL, NULL, 'Tech Bag3', '2019-05-02 07:18:30', '2019-05-02 07:18:30'),
(47, 'WAH-OT-TT004', 'WAH-Techbag', 'Twist Tie', 'Modern Lifestyle', NULL, 'WAH', '2019-01-25', '2019-02-13', '70', NULL, NULL, NULL, NULL, NULL, NULL, 'Tech Bag4', '2019-05-02 07:19:04', '2019-05-02 07:19:04'),
(48, 'WAH-OT-SDS001', 'WAH-Techbag', 'Screw Driver Set', 'Creston', NULL, 'WAH', '2013-08-06', '2013-08-06', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Tech Bag1', '2019-05-02 07:20:56', '2019-05-02 07:20:56'),
(49, 'WAH-OT-SDS002', 'WAH-Techbag', 'Screw Driver Set', 'Creston', NULL, 'WAH', '2013-08-06', '2013-08-06', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Tech Bag2', '2019-05-02 07:21:27', '2019-05-02 07:21:27'),
(50, 'WAH-OT-SDS003', 'WAH-Techbag', 'Screw Driver Set', 'Creston', NULL, 'WAH', '2013-08-06', '2013-08-06', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Tech Bag3', '2019-05-02 07:21:58', '2019-05-02 07:21:58'),
(51, 'WAH-OT-SDS004', 'WAH-Techbag', 'Screw Driver Set', 'Stanley', NULL, 'WAH', '2016-02-02', '2016-02-02', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Tech Bag4', '2019-05-02 07:23:20', '2019-05-02 07:23:20'),
(52, 'WAH-OT-WCA001', 'WAH-Techbag', 'Wireless Card Adapter (USB)', 'CD-R KING', NULL, 'WAH', '2013-08-06', '2013-08-06', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-02 07:23:57', '2019-05-02 07:23:57'),
(53, 'WAH-OT-WCA003', 'WAH-Techbag', 'Wireless Card Adapter (USB)', 'CD-R KING', NULL, 'WAH', '2013-08-06', '2013-08-06', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-02 07:24:25', '2019-05-02 07:24:25'),
(54, 'WAH-OT-WCA004', 'WAH-Techbag', 'Wireless Card Adapter (USB)', 'LB-Link', NULL, 'WAH', '2019-01-30', '2019-02-13', '188', NULL, NULL, NULL, NULL, NULL, NULL, 'Tech Bag1', '2019-05-02 07:25:25', '2019-05-02 07:25:25'),
(55, 'WAH-OT-WCA005', 'WAH-Techbag', 'Wireless Card Adapter (USB)', 'LB-Link', NULL, 'WAH', '2019-01-30', '2019-02-13', '188', NULL, NULL, NULL, NULL, NULL, NULL, 'Tech Bag2', '2019-05-02 07:25:59', '2019-05-02 07:25:59'),
(56, 'WAH-OT-WCA006', 'WAH-Techbag', 'Wireless Card Adapter (USB)', 'LB-Link', NULL, 'WAH', '2019-01-30', '2019-02-13', '188', NULL, NULL, NULL, NULL, NULL, NULL, 'Tech Bag3', '2019-05-02 07:26:27', '2019-05-02 07:26:27'),
(57, 'WAH-OT-WCA007', 'WAH-Techbag', 'Wireless Card Adapter (USB)', 'LB-Link', NULL, 'WAH', '2019-01-30', '2019-02-13', '188', NULL, NULL, NULL, NULL, NULL, NULL, 'Tech Bag4', '2019-05-02 07:26:55', '2019-05-02 07:26:55'),
(58, 'WAH-OT-TB001', 'WAH-Techbag', 'Traveling Bag', 'Color Black', NULL, 'WAH', '2013-08-06', '2013-08-06', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Tech Bag1', '2019-05-02 07:29:11', '2019-05-02 07:29:11'),
(59, 'WAH-OT-TB002', 'WAH-Techbag', 'Traveling Bag', 'Color Blue', NULL, 'WAH', '2013-08-06', '2013-08-06', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Tech Bag2', '2019-05-02 07:29:37', '2019-05-02 07:29:37'),
(60, 'WAH-OT-TB003', 'WAH-Techbag', 'Traveling Bag', 'Color Blue', NULL, 'WAH', '2013-08-06', '2013-08-06', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Tech Bag3', '2019-05-02 07:30:04', '2019-05-02 07:30:04'),
(61, 'WAH-OT-TB004', 'WAH-Techbag', 'Traveling Bag', 'Color Pink', NULL, 'WAH', '2016-02-02', '2016-02-02', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Tech Bag4', '2019-05-02 07:30:29', '2019-05-02 07:30:29'),
(62, 'WAH-OT-TB005', 'WAH-Techbag', 'Traveling Bag', 'Color Blue', NULL, 'WAH', '2018-10-01', '2018-10-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Tech Bag1', '2019-05-02 07:31:01', '2019-05-02 07:31:01'),
(63, 'WAH-OT-TB006', 'WAH-Techbag', 'Traveling Bag', 'Color Blue', NULL, 'WAH', '2018-10-02', '2018-10-02', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Tech Bag2', '2019-05-02 07:32:57', '2019-05-02 07:32:57'),
(64, 'WAH-OT-TB007', 'WAH-Techbag', 'Traveling Bag', 'Color Blue', NULL, 'WAH', '2018-10-03', '2018-10-03', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-02 07:33:41', '2019-05-02 07:33:41'),
(65, 'WAH-OT-DT001', 'WAH-Techbag', 'Duct Tape', 'Armak', NULL, 'WAH', '2019-01-25', '2019-02-13', '37.75', NULL, NULL, NULL, NULL, NULL, NULL, 'Tech Bag1', '2019-05-02 07:34:39', '2019-05-02 07:34:39'),
(66, 'WAH-OT-DT002', 'WAH-Techbag', 'Duct Tape', 'Hannstape', NULL, 'WAH', '2019-01-25', '2019-02-13', '37.75', NULL, NULL, NULL, NULL, NULL, NULL, 'Tech Bag2', '2019-05-02 07:35:17', '2019-05-02 07:35:17'),
(67, 'WAH-OT-DT003', 'WAH-Techbag', 'Duct Tape', 'Hannstape', NULL, 'WAH', '2019-01-25', '2019-02-13', '37.75', NULL, NULL, NULL, NULL, NULL, NULL, 'Tech Bag3', '2019-05-02 07:35:49', '2019-05-02 07:35:49'),
(68, 'WAH-OT-DT004', 'WAH-Techbag', 'Duct Tape', 'Armak', NULL, 'WAH', '2019-01-25', '2019-02-13', '37.75', NULL, NULL, NULL, NULL, NULL, NULL, 'Tech Bag4', '2019-05-02 07:36:17', '2019-05-02 07:36:17'),
(69, 'WAH-OT-KB001', 'WAH-Techbag', 'USB Keyboard', 'CD-R KING', NULL, 'WAH', '2013-08-06', '2013-08-06', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-02 07:37:45', '2019-05-02 07:37:45'),
(70, 'WAH-OT-KB002', 'WAH-Techbag', 'USB Keyboard', 'CD-R KING', NULL, 'WAH', '2013-08-06', '2013-08-06', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-02 07:38:09', '2019-05-02 07:38:09'),
(71, 'WAH-OT-KB003', 'WAH-Techbag', 'USB Keyboard', 'CD-R KING', NULL, 'WAH', '2013-08-06', '2013-08-06', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-02 07:38:32', '2019-05-02 07:38:32'),
(72, 'WAH-OT-PRC001', 'WAH-Techbag', 'Power Cable', 'CD-R KING', NULL, 'WAH', '2013-08-06', '2013-08-06', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Tech Bag1', '2019-05-02 07:39:07', '2019-05-02 07:39:07'),
(73, 'WAH-OT-PRC002', 'WAH-Techbag', 'Power Cable', 'CD-R KING', NULL, 'WAH', '2013-08-06', '2013-08-06', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Tech Bag2', '2019-05-02 07:39:32', '2019-05-02 07:39:32'),
(74, 'WAH-OT-PRC003', 'WAH-Techbag', 'Power Cable', 'CD-R KING', NULL, 'WAH', '2013-08-06', '2013-08-06', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Tech Bag3', '2019-05-02 07:39:56', '2019-05-02 07:39:56'),
(75, 'WAH-OT-PRC004', 'WAH-Techbag', 'Power Cable', 'CD-R KING', NULL, 'WAH', '2016-02-02', '2016-02-02', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Tech Bag4', '2019-05-02 07:40:21', '2019-05-02 07:40:21'),
(76, 'WAH-OT-VGA001', 'WAH-Techbag', 'VGA Cable', 'CD-R KING', NULL, 'WAH', '2013-08-06', '2013-08-06', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Tech Bag1', '2019-05-02 07:48:38', '2019-05-02 07:48:38'),
(77, 'WAH-OT-VGA002', 'WAH-Techbag', 'VGA Cable', 'CD-R KING', NULL, 'WAH', '2013-08-06', '2013-08-06', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Tech Bag2', '2019-05-02 07:49:40', '2019-05-02 07:49:40'),
(78, 'WAH-OT-VGA003', 'WAH-Techbag', 'VGA Cable', 'CD-R KING', NULL, 'WAH', '2013-08-06', '2013-08-06', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Tech Bag3', '2019-05-02 07:51:15', '2019-05-02 07:51:15'),
(79, 'WAH-OT-VGA004', 'WAH-Techbag', 'VGA Cable', 'CD-R KING', NULL, 'WAH', '2016-01-01', '2016-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Tech Bag4', '2019-05-02 07:51:42', '2019-05-02 07:51:42'),
(80, 'WAH-OT-CRMPT005', 'WAH-Techbag', 'Crimping Tool', 'Creston', NULL, 'WAH', '2017-01-13', '2017-01-03', '200', NULL, NULL, NULL, NULL, NULL, NULL, 'Tech Bag1', '2019-05-02 07:57:02', '2019-05-02 07:57:02'),
(81, 'WAH-OT-CRMPT006', 'WAH-Techbag', 'Crimping Tool', 'Creston', NULL, 'WAH', '2017-01-13', '2017-01-13', '200', NULL, NULL, NULL, NULL, NULL, NULL, 'Tech Bag2', '2019-05-02 07:57:41', '2019-05-02 07:57:41'),
(82, 'WAH-OT-CRMPT007', 'WAH-Techbag', 'Crimping Tool', 'Creston', NULL, 'WAH', '2017-01-13', '2017-01-13', '200', NULL, NULL, NULL, NULL, NULL, NULL, 'Tech Bag3', '2019-05-02 07:58:08', '2019-05-02 07:58:08'),
(83, 'WAH-OT-CRMPT008', 'WAH-Techbag', 'Crimping Tool', 'Creston', NULL, 'WAH', '2017-01-13', '2017-01-13', '200', NULL, NULL, NULL, NULL, NULL, NULL, 'Tech Bag4', '2019-05-02 07:58:40', '2019-05-02 07:58:40'),
(84, 'WAH-OT-TSTR002', 'WAH-Techbag', 'LAN Tester', 'NENGSHL', NULL, 'WAH', '2013-08-06', '2013-08-06', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Tech Bag1', '2019-05-02 08:02:31', '2019-05-02 08:02:31'),
(85, 'WAH-OT-TSTR001', 'WAH-Techbag', 'LAN Tester', 'CD-R KING', NULL, 'WAH', '2013-08-06', '2013-08-06', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Tech Bag2', '2019-05-02 08:03:07', '2019-05-02 08:03:07'),
(86, 'WAH-OT-TSTR003', 'WAH-Techbag', 'LAN Tester', 'NENGSHL', NULL, 'WAH', '2013-08-06', '2013-08-06', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Tech Bag3', '2019-05-02 08:03:32', '2019-05-02 08:03:32'),
(87, 'WAH-OT-TSTR004', 'WAH-Techbag', 'LAN Tester', 'NENGSHL', NULL, 'WAH', '2016-02-02', '2016-02-02', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Tech Bag4', '2019-05-02 08:03:57', '2019-05-02 08:03:57'),
(88, 'WAH-OT-DPS001', 'WAH-Techbag', 'Diagonal Pliers', 'Eagle', NULL, 'WAH', '2013-08-06', '2013-08-06', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Tech Bag1', '2019-05-02 08:04:35', '2019-05-02 08:04:35'),
(89, 'WAH-OT-DPS002', 'WAH-Techbag', 'Diagonal Pliers', 'Eagle', NULL, 'WAH', '2013-08-06', '2013-08-06', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Tech Bag2', '2019-05-02 08:05:02', '2019-05-02 08:05:02'),
(90, 'WAH-OT-DPS003', 'WAH-Techbag', 'Diagonal Pliers', 'Eagle', NULL, 'WAH', '2013-08-06', '2013-08-06', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Tech Bag3', '2019-05-02 08:05:26', '2019-05-02 08:05:26'),
(91, 'WAH-OT-DPS004', 'WAH-Techbag', 'Diagonal Pliers', 'Eagle', NULL, 'WAH', '2016-02-02', '2016-02-02', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Tech Bag4', '2019-05-02 08:05:53', '2019-05-02 08:05:53'),
(92, 'WAH-OT-CPS001', 'WAH-Techbag', 'Combination Pliers', 'Eagle', NULL, 'WAH', '2013-08-06', '2013-08-06', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Tech Bag1', '2019-05-02 08:06:23', '2019-05-02 08:06:23'),
(93, 'WAH-OT-CPS002', 'WAH-Techbag', 'Combination Pliers', 'Eagle', NULL, 'WAH', '2013-08-06', '2013-08-06', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Tech Bag2', '2019-05-02 08:06:46', '2019-05-02 08:06:46'),
(94, 'WAH-OT-CPS003', 'WAH-Techbag', 'Combination Pliers', 'Eagle', NULL, 'WAH', '2013-08-06', '2013-08-06', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Tech Bag3', '2019-05-02 08:07:18', '2019-05-02 08:07:18'),
(95, 'WAH-OT-CPS004', 'WAH-Techbag', 'Combination Pliers', 'Eagle', NULL, 'WAH', '2016-02-02', '2016-02-02', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Tech Bag4', '2019-05-02 08:07:42', '2019-05-02 08:07:42'),
(96, 'WAH-OT-RJ001', 'WAH-Techbag', 'RJ-45', 'None', NULL, 'WAH', '2019-01-25', '2019-02-13', '4', NULL, NULL, NULL, NULL, NULL, NULL, 'Tech Bag1', '2019-05-02 08:12:11', '2019-05-02 08:13:37'),
(97, 'WAH-OT-RJ002', 'WAH-Techbag', 'RJ-45', 'None', NULL, 'WAH', '2019-01-25', '2019-02-13', '4', NULL, NULL, NULL, NULL, NULL, NULL, 'Tech Bag2', '2019-05-02 08:13:10', '2019-05-02 08:13:54'),
(98, 'WAH-OT-RJ003', 'WAH-Techbag', 'RJ-45', 'None', NULL, 'WAH', '2019-01-25', '2019-02-13', '4', NULL, NULL, NULL, NULL, NULL, NULL, 'Tech Bag3', '2019-05-02 08:16:18', '2019-05-02 08:16:18'),
(99, 'WAH-OT-RJ004', 'WAH-Techbag', 'RJ-45', 'None', NULL, 'WAH', '2019-01-25', '2019-02-13', '4', NULL, NULL, NULL, NULL, NULL, NULL, 'Tech Bag4', '2019-05-02 08:16:50', '2019-05-02 08:16:50'),
(100, 'WAH-OT-TM001', 'WAH-Techbag', 'Tape Measure', 'Creston', NULL, 'WAH', '2013-08-06', '2013-08-06', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Tech Bag1', '2019-05-02 08:18:09', '2019-05-02 08:18:09'),
(101, 'WAH-OT-TM002', 'WAH-Techbag', 'Tape Measure', 'Creston', NULL, 'WAH', '2013-08-06', '2013-08-06', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Tech Bag2', '2019-05-02 08:18:58', '2019-05-02 08:18:58'),
(102, 'WAH-OT-TM003', 'WAH-Techbag', 'Tape Measure', 'Creston', NULL, 'WAH', '2013-08-06', '2013-08-06', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Tech Bag3', '2019-05-02 08:19:26', '2019-05-02 08:19:26'),
(103, 'WAH-OT-TM004', 'WAH-Techbag', 'Tape Measure', 'Eagle', NULL, 'WAH', '2016-02-02', '2016-02-02', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Tech Bag4', '2019-05-02 08:20:02', '2019-05-02 08:20:02'),
(104, 'WAH-OT-IS001', 'WAH-Techbag', 'Insulator Holder', 'KAI SHIN SHU', NULL, 'WAH', '2019-01-25', '2019-02-13', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'Tech Bag1', '2019-05-02 08:22:45', '2019-05-02 08:22:45'),
(105, 'WAH-OT-IS002', 'WAH-Techbag', 'Insulator Holder', 'KAI SHIN SHU', NULL, 'WAH', '2019-01-25', '2019-02-13', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'Tech Bag2', '2019-05-02 08:23:14', '2019-05-02 08:23:14'),
(106, 'WAH-OT-IS003', 'WAH-Techbag', 'Insulator Holder', 'KAI SHIN SHU', NULL, 'WAH', '2019-01-25', '2019-02-13', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'Tech Bag3', '2019-05-02 08:23:39', '2019-05-02 08:23:39'),
(107, 'WAH-OT-IS004', 'WAH-Techbag', 'Insulator Holder', 'KAI SHIN SHU', NULL, 'WAH', '2019-01-25', '2019-02-13', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'Tech Bag4', '2019-05-02 08:24:07', '2019-05-02 08:24:07'),
(108, 'WAH-OT-BT001', 'WAH-Techbag', '9V Battery', 'GP Battery', NULL, 'WAH', '2016-02-02', '2016-02-02', '70', NULL, NULL, NULL, NULL, NULL, NULL, 'Tech Bag1', '2019-05-02 08:24:34', '2019-05-02 08:24:34'),
(109, 'WAH-OT-BT002', 'WAH-Techbag', '9V Battery', 'GP Battery', NULL, 'WAH', '2016-02-02', '2016-02-02', '70', NULL, NULL, NULL, NULL, NULL, NULL, 'Tech Bag2', '2019-05-02 08:24:59', '2019-05-02 08:24:59'),
(110, 'WAH-OT-BT003', 'WAH-Techbag', '9V Battery', 'GP Battery', NULL, 'WAH', '2016-02-02', '2016-02-02', '70', NULL, NULL, NULL, NULL, NULL, NULL, 'Tech Bag3', '2019-05-02 08:25:26', '2019-05-02 08:25:26'),
(111, 'WAH-OT-BT004', 'WAH-Techbag', '9V Battery', 'GP Battery', NULL, 'WAH', '2016-02-02', '2016-02-02', '70', NULL, NULL, NULL, NULL, NULL, NULL, 'Tech Bag4', '2019-05-02 08:25:52', '2019-05-02 08:25:52'),
(112, 'WAH-OFC-PC001', 'WAH', 'System Unit', 'Intel Dual core', NULL, 'RTI', '2011-01-01', '2011-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Server Camera', '2019-05-07 02:26:43', '2019-05-07 02:36:41'),
(113, 'WAH-OFC-PC003', 'WAH', 'System Unit', 'Intel Dual core', NULL, 'PGT', '2011-01-01', '2016-05-20', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Bamban RHU2 /Change unit', '2019-05-07 02:27:24', '2019-05-07 02:36:56'),
(114, 'WAH-OFC-PC004', 'WAH', 'System Unit', 'Intel Dual core', NULL, 'RTI', '2011-01-01', '2011-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Rose Ann Biag / Backup Server', '2019-05-07 02:28:36', '2019-05-07 02:37:18'),
(115, 'WAH-OFC-PC005', 'WAH', 'System Unit', 'Intel Dual core', NULL, 'RTI', '2011-01-01', '2017-09-18', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'PHO SERVER', '2019-05-07 02:29:43', '2019-05-07 02:37:30'),
(116, 'WAH-OFC-PC006', 'WAH', 'System Unit', 'Intel Dual core', NULL, 'RTI', '2011-01-01', '2011-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Spare Unit', '2019-05-07 02:33:19', '2019-05-07 02:37:42'),
(117, 'WAH-OFC-PC007', 'WAH', 'System Unit', 'Dell Optiplex 320, Pentium D', NULL, 'RTI', '2014-11-20', '2014-11-20', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'WAH-Server Printer 202', '2019-05-07 02:34:38', '2019-05-07 02:37:54'),
(118, 'WAH-OFC-PC008', 'WAH', 'System Unit', 'Clone PC, Intel I3', NULL, 'RTI', '2012-06-01', '2012-06-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'EHR / SERVER', '2019-05-07 02:35:59', '2019-05-07 02:38:06'),
(119, 'WAH-OFC-PC009', 'WAH', 'System Unit', 'Dell Optiplex 745, Pentium D', NULL, 'PGT', '2012-01-01', '2012-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Spare Unit', '2019-05-07 02:39:00', '2019-05-07 02:39:19'),
(120, 'WAH-OFC-PC010', 'WAH', 'System Unit', 'Dell Optiplex 745, Pentium D', NULL, 'PGT', '2012-01-01', '2012-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Spare Unit', '2019-05-07 02:39:42', '2019-05-07 02:39:42'),
(121, 'WAH-OFC-PC012', 'WAH', 'System Unit', 'Dell Optiplex 745, Pentium D', NULL, 'PGT', '2012-01-01', '2017-03-13', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Concepcion RHU1', '2019-05-07 02:40:14', '2019-05-07 02:41:17'),
(122, 'WAH-OFC-PC014', 'WAH', 'System Unit', 'Intel Atom 1.6 Ghz', NULL, 'PGT', '2011-10-01', '2011-10-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Spare', '2019-05-07 02:40:57', '2019-05-07 02:40:57'),
(123, 'WAH-OFC-PC015', 'WAH', 'System Unit', 'DELL Server Desktop', NULL, 'RTI', '2011-10-01', '2011-10-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'SERVER PHIE', '2019-05-07 02:41:56', '2019-05-07 02:41:56'),
(124, 'WAH-OFC-PC016', 'WAH', 'System Unit', 'Server Desktop', NULL, 'RTI', '2018-02-01', '2018-02-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'SERVER PHIE', '2019-05-07 02:43:59', '2019-05-07 02:43:59'),
(125, 'WAH-TRG-PC001', 'WAH', 'System Unit', 'Clone PC', NULL, 'RTI', '2011-01-01', '2013-03-06', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'CHC3', '2019-05-07 02:44:49', '2019-05-07 02:44:49'),
(126, 'WAH-TRG-PC002', 'WAH', 'System Unit', 'Dell Optiplex 745, Pentium D', NULL, 'PGT', '2012-02-14', '2013-06-24', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Concepcion 2', '2019-05-07 02:45:26', '2019-05-07 02:45:26'),
(127, 'WAH-TRG-PC003', 'WAH', 'System Unit', 'TomMade Slim Type CPU', NULL, 'PGT', '2012-12-01', '2012-12-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Spare', '2019-05-07 02:46:04', '2019-05-07 02:46:04'),
(128, 'WAH-OFC-LCD001', 'WAH', 'Monitor', 'AOC LCD MONITOR', NULL, 'RTI', '2011-01-01', '2011-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'CCTV Cam Server', '2019-05-07 02:47:54', '2019-05-07 02:47:54'),
(129, 'WAH-OFC-LCD003', 'WAH', 'Monitor', 'AOC LCD MONITOR', NULL, 'PGT', '2012-03-12', '2012-03-12', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Anna Yturralde', '2019-05-07 02:58:54', '2019-05-07 02:58:54'),
(130, 'WAH-OFC-LCD004', 'WAH', 'Monitor', 'AOC LCD MONITOR', NULL, 'PGT', '2012-03-12', '2012-03-12', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Jhuvy Dizon', '2019-05-07 03:12:38', '2019-05-07 03:12:38'),
(131, 'WAH-OFC-LCD005', 'WAH', 'Monitor', 'AOC LCD MONITOR', NULL, 'RTI', '2011-01-01', '2011-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Server Proxmox', '2019-05-07 05:19:16', '2019-05-07 05:19:16'),
(132, 'WAH-OFC-LCD006', 'WAH', 'Monitor', 'AOC LCD MONITOR', NULL, 'RTI', '2011-01-01', '2011-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-07 05:19:42', '2019-05-07 05:19:42'),
(133, 'WAH-OFC-LCD007', 'WAH', 'Monitor', 'AOC LCD MONITOR', NULL, 'RTI', '2011-01-01', '2011-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Shiela Madera', '2019-05-07 05:20:13', '2019-05-07 05:20:13'),
(134, 'WAH-OFC-LCD008', 'WAH', 'Monitor', 'AOC 14\" LCD MONITOR', NULL, 'Others', '2014-11-20', '2014-11-20', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'SQL Server', '2019-05-07 05:20:56', '2019-05-07 05:20:56'),
(135, 'WAH-OFC-LCD009', 'WAH', 'Monitor', 'LED 18.5” ACER MONITOR', NULL, 'PGT', '2012-07-01', '2012-07-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Noriel Ramos', '2019-05-07 05:21:33', '2019-05-07 05:21:33'),
(136, 'WAH-OFC-LCD010', 'WAH', 'Monitor', 'LED 18.5” ACER MONITOR', NULL, 'PGT', '2012-07-01', '2012-07-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Emanuel Perez', '2019-05-07 05:22:02', '2019-05-07 05:22:02'),
(137, 'WAH-OFC-LCD011', 'WAH', 'Monitor', 'LED 18.5” ACER MONITOR', NULL, 'PGT', '2012-07-01', '2012-07-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'John Cabansag', '2019-05-07 05:22:36', '2019-05-07 05:22:36'),
(138, 'WAH-OFC-LCD012', 'WAH', 'Monitor', 'LED 18.5” ACER MONITOR', NULL, 'PGT', '2012-07-01', '2012-07-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Francis Gamboa', '2019-05-07 05:33:29', '2019-05-07 05:33:29'),
(139, 'WAH-OFC-LCD013', 'WAH', 'Monitor', 'LED 18.5” ACER MONITOR', NULL, 'PGT', '2012-07-01', '2012-07-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Robert Martinez', '2019-05-07 05:35:42', '2019-05-07 05:35:42'),
(140, 'WAH-OFC-LCD014', 'WAH', 'Monitor', 'LED 18.5” ACER MONITOR', NULL, 'PGT', '2012-07-01', '2012-07-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Kevin Greg Alvarado', '2019-05-07 05:42:36', '2019-05-07 05:42:36'),
(141, 'WAH-OFC-LCD015', 'WAH', 'Monitor', 'CHIMEI', NULL, 'PGT', '2011-12-01', '2016-12-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'CHC1 /Change unit', '2019-05-07 05:43:15', '2019-05-07 05:43:15'),
(142, 'WAH-OFC-LCD016', 'WAH', 'Monitor', 'AOC LCD MONITOR', NULL, 'PGT', '2012-07-01', '2017-09-18', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'PHO Server', '2019-05-07 05:44:00', '2019-05-07 05:44:00'),
(143, 'WAH-OFC-LCD017', 'WAH', 'Monitor', 'Samsung E1720', NULL, 'Others', '2014-11-20', '2014-11-20', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Spare', '2019-05-07 05:48:16', '2019-05-07 05:48:16'),
(144, 'WAH-OFC-LCD018', 'WAH', 'Monitor', 'AOC 14\" LCD MONITOR', NULL, 'RTI', '2012-07-01', '2012-07-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Tech Repair', '2019-05-07 05:48:50', '2019-05-07 05:48:50'),
(145, 'WAH-OFC-LCD019', 'WAH', 'Monitor', 'Dell', NULL, 'RTI', '2014-11-20', '2014-11-20', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Romeo David', '2019-05-07 05:50:12', '2019-05-07 05:50:12'),
(146, 'WAH-OFC-LCD020', 'WAH', 'Monitor', 'AOC LCD MONITOR', NULL, 'PGT', '2013-02-06', '2013-02-06', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Diana Magno', '2019-05-07 05:50:42', '2019-05-07 05:50:42'),
(147, 'WAH-TRG-LCD001', 'WAH', 'Monitor', 'Monitor	AOC LCD MONITOR', NULL, 'WAH', '2012-06-12', '2013-06-24', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Concepcion 2', '2019-05-07 05:51:32', '2019-05-07 05:51:32'),
(148, 'WAH-TRG-LCD002', 'WAH', 'Monitor', 'Focus 15\"6 LED Monitor', NULL, 'PGT', '2012-02-14', '2013-03-06', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'CHC3', '2019-05-07 05:52:10', '2019-05-07 05:52:10'),
(149, 'WAH-OFC-KB001', 'WAH', 'Keyboard', 'A4-Tech', NULL, 'WAH', '2011-01-01', '2011-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Spare', '2019-05-07 05:52:49', '2019-05-07 05:52:49'),
(150, 'WAH-OFC-KB002', 'WAH', 'Keyboard', 'A4-Tech', NULL, 'RTI', '2011-01-01', '2011-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Spare', '2019-05-07 05:54:22', '2019-05-07 05:54:22'),
(151, 'WAH-OFC-KB003', 'WAH', 'Keyboard', 'A4-Tech', NULL, 'RTI', '2011-01-01', '2011-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Spare', '2019-05-07 05:54:54', '2019-05-07 05:54:54'),
(152, 'WAH-OFC-KB004', 'WAH', 'Keyboard', 'A4-Tech', NULL, 'RTI', '2011-01-01', '2011-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Intenet server', '2019-05-07 05:55:23', '2019-05-07 05:55:23'),
(153, 'WAH-OFC-KB005', 'WAH', 'Keyboard', 'A4-Tech', NULL, 'RTI', '2011-01-01', '2017-09-18', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'PHO Server', '2019-05-07 05:57:19', '2019-05-07 05:57:19'),
(154, 'WAH-OFC-KB006', 'WAH', 'Keyboard', 'A4-Tech', NULL, 'RTI', '2011-01-01', '2011-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Rose Ann Biag / Backup Server', '2019-05-07 05:57:48', '2019-05-07 05:57:48'),
(155, 'WAH-OFC-KB007', 'WAH', 'Keyboard', 'Techware', NULL, 'RTI', '2011-01-01', '2011-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'WAH-Server Printer 202', '2019-05-07 05:58:18', '2019-05-07 05:58:18'),
(156, 'WAH-OFC-KB008', 'WAH', 'Keyboard', 'A4-Tech', NULL, 'PGT', '2012-01-01', '2012-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'EHR / SERVER', '2019-05-07 05:59:09', '2019-05-07 05:59:09'),
(157, 'WAH-OFC-KB009', 'WAH', 'Keyboard', 'A4-Tech', NULL, 'PGT', '2012-01-01', '2012-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Spare', '2019-05-07 05:59:42', '2019-05-07 05:59:42'),
(158, 'WAH-OFC-KB010', 'WAH', 'Keyboard', 'A4-Tech', NULL, 'PGT', '2012-01-01', '2012-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Kevin Greg Alvarado', '2019-05-07 06:00:13', '2019-05-07 06:00:13'),
(159, 'WAH-OFC-KB011', 'WAH', 'Keyboard', 'HP', NULL, 'RTI', '2011-01-01', '2011-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'SERVER Camera', '2019-05-07 06:00:48', '2019-05-07 06:00:48'),
(160, 'WAH-OFC-KB012', 'WAH', 'Keyboard', 'Dell', NULL, 'PGT', '2011-01-01', '2011-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'SERVER PHIE', '2019-05-07 06:01:18', '2019-05-07 06:01:18'),
(161, 'WAH-OFC-KB013', 'WAH', 'Keyboard', 'A4-Tech', NULL, 'PGT', '2012-01-01', '2012-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Spare', '2019-05-07 06:01:49', '2019-05-07 06:01:49'),
(162, 'WAH-OFC-KB014', 'WAH', 'Keyboard', 'A4-Tech', NULL, 'PGT', '2012-01-01', '2012-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Spare', '2019-05-07 06:02:20', '2019-05-07 06:02:20'),
(163, 'WAH-TRG-KB001', 'WAH', 'Keyboard', 'A4-Tech', NULL, 'PGT', '2012-01-01', '2013-06-24', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Concepcion 2', '2019-05-07 06:02:56', '2019-05-07 06:02:56'),
(164, 'WAH-TRG-KB002', 'WAH', 'Keyboard', 'A4-Tech', NULL, 'PGT', '2012-01-01', '2013-03-06', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'CHC3', '2019-05-07 06:03:31', '2019-05-07 06:03:31'),
(165, 'WAH-OFC-MU001', 'WAH', 'Mouse', 'A4-Tech', NULL, 'RTI', '2011-01-01', '2011-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Rose Ann Biag / Printer', '2019-05-07 06:04:03', '2019-05-07 06:04:03'),
(166, 'WAH-OFC-MU002', 'WAH', 'Mouse', 'A4-Tech', NULL, 'RTI', '2011-01-01', '2011-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'EHR-LITE', '2019-05-07 06:10:51', '2019-05-07 06:10:51'),
(167, 'WAH-OFC-MU003', 'WAH', 'Mouse', 'A4-Tech', NULL, 'WAH', '2011-01-01', '2011-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Spare', '2019-05-07 06:11:19', '2019-05-07 06:11:19'),
(168, 'WAH-OFC-MU004', 'WAH', 'Mouse', 'A4-Tech', NULL, 'RTI', '2011-01-01', '2011-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Spare', '2019-05-07 06:16:51', '2019-05-07 06:16:51'),
(169, 'WAH-OFC-MU005', 'WAH', 'Mouse', 'A4-Tech', NULL, 'RTI', '2011-01-01', '2011-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Spare', '2019-05-07 06:17:24', '2019-05-07 06:17:24'),
(170, 'WAH-OFC-MU006', 'WAH', 'Mouse', 'A4-Tech', NULL, 'RTI', '2011-01-01', '2011-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Rose Ann Biag / Backup Server', '2019-05-07 06:17:52', '2019-05-07 06:17:52'),
(171, 'WAH-OFC-MU007', 'WAH', 'Mouse', 'A4-Tech', NULL, 'RTI', '2011-01-01', '2011-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'WAH-Server Printer 202', '2019-05-07 06:18:30', '2019-05-07 06:18:30'),
(172, 'WAH-OFC-MU008', 'WAH', 'Mouse', 'A4-Tech', NULL, 'PGT', '2012-01-01', '2012-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'EHR / SERVER', '2019-05-07 06:21:08', '2019-05-07 06:21:08'),
(174, 'WAH-OFC-MU014', 'WAH', 'Mouse', 'A4-Tech', NULL, 'PGT', '2012-01-01', '2012-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'SERVER Camera', '2019-05-07 06:29:41', '2019-05-07 06:29:41'),
(175, 'WAH-OFC-MU015', 'WAH', 'Mouse', 'Dell', NULL, 'RTI', '2012-01-01', '2012-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'SERVER PHIE', '2019-05-07 06:30:10', '2019-05-07 06:30:10'),
(176, 'WAH-TRG-MU001', 'WAH', 'Mouse', 'A4-Tech', NULL, 'PGT', '2012-01-01', '2013-06-24', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Concepcion 2', '2019-05-07 06:31:31', '2019-05-07 06:31:31'),
(177, 'WAH-TRG-MU002', 'WAH', 'Mouse', 'A4-Tech', NULL, 'PGT', '2012-01-01', '2013-03-06', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'CHC3', '2019-05-07 06:32:08', '2019-05-07 06:32:08'),
(178, 'WAH-OFC-AVR001', 'WAH', 'AVR', 'ECO-POWER', NULL, 'PGT', '2012-01-01', '2012-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'SERVER PHIE', '2019-05-07 06:39:33', '2019-05-07 06:39:33'),
(179, 'WAH-OFC-AVR002', 'WAH', 'AVR', 'ECO-POWER', NULL, 'PGT', '2012-01-01', '2012-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Spare', '2019-05-07 06:40:09', '2019-05-07 06:40:09'),
(180, 'WAH-OFC-AVR003', 'WAH', 'AVR', 'ECO-POWER', NULL, 'PGT', '2012-01-01', '2012-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Server 2 cam', '2019-05-07 06:43:01', '2019-05-07 06:43:01'),
(181, 'WAH-OFC-AVR004', 'WAH', 'AVR', 'ECO-POWER', NULL, 'PGT', '2012-01-01', '0012-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Intenet server', '2019-05-07 06:43:33', '2019-05-07 06:43:33'),
(182, 'WAH-OFC-AVR005', 'WAH', 'AVR', 'ECO-POWER', NULL, 'PGT', '2012-01-01', '2017-09-18', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'PHO Server', '2019-05-07 06:48:27', '2019-05-07 06:55:19'),
(183, 'WAH-OFC-AVR006', 'WAH', 'AVR', 'ECO-POWER', NULL, 'PGT', '2012-01-01', '2012-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Rose Ann Biag / Backup Server', '2019-05-07 07:05:28', '2019-05-07 07:05:28'),
(184, 'WAH-OFC-AVR008', 'WAH', 'AVR', 'ECO-POWER', NULL, 'PGT', '2012-01-01', '2012-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'EHR / SERVER', '2019-05-07 07:05:59', '2019-05-07 07:05:59'),
(185, 'WAH-OFC-AVR009', 'WAH', 'AVR', 'ECO-POWER', NULL, 'PGT', '2012-01-01', '2012-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Spare', '2019-05-07 07:06:32', '2019-05-07 07:06:32'),
(186, 'WAH-OFC-AVR010', 'WAH', 'AVR', 'ECO-POWER', NULL, 'PGT', '2012-01-01', '2012-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Spare', '2019-05-07 07:07:04', '2019-05-07 07:07:04'),
(187, 'WAH-OFC-NTB001', 'WAH', 'Netbook', 'ACER ASPIRE ONE D270-26Cbb	, Intel Atom, 2GB DDR3, 250MB HDD', 'S/N:NUSGDSP00924116C6C7600', 'PGT', '2012-01-01', '2016-02-02', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-08 02:13:38', '2019-05-08 02:30:44'),
(188, 'WAH-OFC-NTB002', 'WAH', 'Netbook', 'ACER ASPIRE ONE D270-26Cbb	, Intel Atom, 2GB DDR3, 250MB HDD', 'S/N:NUSGDSP00924116C817600', 'PGT', '2012-01-01', '2014-05-19', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-08 02:14:34', '2019-05-08 02:31:06'),
(189, 'WAH-OFC-NTB003', 'WAH', 'Netbook', 'ACER ASPIRE ONE D270-26Cbb	, Intel Atom, 2GB DDR3, 250MB HDD', 'S/N:NUSGDSP00924116C7D7600', 'PGT', '2012-01-01', '2016-02-02', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-08 02:15:08', '2019-05-08 02:31:26'),
(190, 'WAH-OFC-NTB004', 'WAH', 'NetBook', 'Samsung (Netbook) , Intel Celeron, 1GB DDR3, 500MB HDD', 'S/N:HJDA93KB800746W', 'WAH', '2012-01-01', '2015-02-02', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-08 02:16:45', '2019-05-08 02:35:20'),
(191, 'WAH-OFC-NTB005', 'WAH', 'NetBook', 'Lenove IdeaPad S210	, Intel Dual Core, 2GB DDR3, 500MB HDD', 'S/N:UB02047125', 'WAH', '2013-01-01', '2015-09-29', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-08 02:17:37', '2019-05-08 02:35:37'),
(192, 'WAH-OFC-NTB006', 'WAH', 'NetBook', 'Lenove IdeaPad S210 , Intel Dual Core, 2GB DDR3, 500MB HDD', 'S/N:UB02047227', 'WAH', '2013-01-01', '2017-03-30', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-08 02:18:27', '2019-05-08 02:35:58'),
(193, 'WAH-OFC-NTB007', 'WAH', 'NetBook', 'Lenove IdeaPad S210	, Intel Dual Core, 2GB DDR3, 500MB HDD', 'S/N:UB02047217', 'WAH', '2013-01-01', '2017-01-13', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-08 02:19:42', '2019-05-08 02:36:21'),
(194, 'WAH-OFC-NTB008', 'WAH', 'NetBook', 'Acer ASPIRE ONE , Intel Core 2 Duo, 2GB DDR3, 500MB HDD', 'S/N:LUSEY080381126C261601', 'WAH', '2012-01-01', '2014-05-19', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-08 02:20:21', '2019-05-08 02:36:39'),
(195, 'WAH-OFC-NTB009', 'WAH', 'NetBook', 'Asus X200M	, Intel Celeron, 2GB DDR3, 500MB HDD', 'S/N: E8N0CX29576733E', 'WAH', '2014-11-01', '2017-11-19', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-08 02:20:56', '2019-05-08 02:36:53'),
(196, 'WAH-TRG-LPT001', 'WAH', 'Laptop', 'HP Laptop, Dual Core', NULL, 'WAH', '2012-01-01', '2012-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-08 02:21:31', '2019-05-08 02:21:31'),
(197, 'WAH-TRG-LPT002', 'WAH', 'Laptop', 'Lenovo T61, Intel Core 2 Duo T7500, 2GB DDR3, 500MB HDD', 'S/N:L3-H6866 07/09', 'Others', '2012-12-17', '2012-12-17', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-08 02:22:35', '2019-05-08 02:37:07'),
(198, 'WAH-TRG-LPT003', 'WAH', 'Laptop', 'ACER ASPIRE 4752 SERIES	, Intel Core i3, 2GB DDR2, 500MB HDD', 'S/N:NXRTHSP00721906BD16600', 'PGT', '2012-07-12', '2019-03-19', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-08 02:23:25', '2019-05-08 02:37:28'),
(199, 'WAH-TRG-LPT004', 'WAH', 'Laptop', 'ACER ASPIRE 4752 SERIES	, Intel Core i3, 2GB DDR2, 500MB HDD', 'S/N:NXRTHSP007219069786600', 'PGT', '2012-07-12', '2016-02-02', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-08 02:24:06', '2019-05-08 02:37:42'),
(200, 'WAH-TRG-LPT005', 'WAH', 'Laptop', 'Lenovo G405 , AMD E1-2100 1.0G, 2GB DDR3, 1TB HDD', 'S/N: CB29624388', 'PGT', '2014-05-08', '2015-09-29', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-08 02:24:53', '2019-05-08 02:38:41'),
(201, 'WAH-TRG-LPT006', 'WAH', 'Laptop', 'Lenovo G405 , AMD E1-2100 1.0G, 2GB DDR3, 1TB HDD', 'S/N:CB29623860', 'PGT', '2014-05-08', '2015-09-29', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-08 02:25:34', '2019-05-08 02:38:27'),
(202, 'WAH-TRG-LPT007', 'WAH', 'Laptop', 'Lenovo G405 , AMD E1-2100 1.0G, 2GB DDR3, 1TB HDD', 'S/N:CB29624481', 'PGT', '2014-05-08', '2014-09-29', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-08 02:26:20', '2019-05-08 02:38:55'),
(203, 'WAH-TRG-LPT008', 'WAH', 'Laptop', 'Lenovo G405 , AMD E1-2100 1.0G, 2GB DDR3, 1TB HDD', 'S/N:CB29624437', 'PGT', '2014-05-08', '2014-05-19', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-08 02:27:25', '2019-05-08 02:39:09'),
(204, 'WAH-TRG-LPT009', 'WAH', 'Laptop', 'Lenovo G405 , AMD E1-2100 1.0G, 2GB DDR3, 1TB HDD', 'S/N:CB29624358', 'PGT', '2014-05-08', '2014-05-08', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-08 02:30:11', '2019-05-08 02:30:11'),
(205, 'WAH-TRG-LPT010', 'WAH', 'Laptop', 'Lenovo T61	 , Intel Core 2 Duo T7500, 2GB DDR3, 500MB HDD', 'S/N:L3-A0691 07/05', 'Others', '2014-11-20', '2014-11-20', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-08 02:40:05', '2019-05-08 02:40:05'),
(206, 'WAH-TRG-LPT011', 'WAH', 'Laptop', 'Asus X202E	 , Intel Core i3-3217U, 4GB DDR3, 500MB HDD', 'S/N:CCNOBC415211529', 'WAH', '2013-01-01', '2015-09-29', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-08 02:40:43', '2019-05-08 02:40:43'),
(207, 'WAH-TRG-LPT012', 'WAH', 'Laptop', 'ACER E 14 E5-473-32W , Intel Core i3-5005U, 4GB DDR3, 1TB HDD', 'S/N:NXMXNSP00253701D7D3400 / 53700754934', 'PGT', '2015-11-01', '2016-01-12', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-08 02:41:29', '2019-05-08 02:41:29'),
(208, 'WAH-TRG-LPT013', 'WAH', 'Laptop', 'ACER E 14 E5-473-32W , Intel Core i3-5005U, 4GB DDR3, 1TB HDD', 'S/N:NXMXNSP00253701D7B3400 / 53700754734', 'PGT', '2015-11-01', '2017-10-05', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-08 02:42:10', '2019-05-08 02:42:10'),
(209, 'WAH-TRG-LPT014', 'WAH', 'Laptop', 'ACER E 14 E5-473-32W , Intel Core i3-5005U, 4GB DDR3, 1TB HDD', 'S/N:NXMXNSP002537026DE3400 / 53700995034', 'PGT', '2015-11-01', '2018-05-03', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-08 02:42:48', '2019-05-08 02:42:48'),
(210, 'WAH-TRG-LPT015', 'WAH', 'Laptop', 'ACER E 14 E5-473-32W,  Intel Core i3-5005U, 4GB DDR3, 1TB HDD', 'S/N:NXMXNSP002537026D23400 / 53700993834', 'PGT', '2015-11-01', '2016-01-15', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-08 02:43:33', '2019-05-08 02:43:33'),
(211, 'WAH-TRG-LPT016', 'WAH', 'Laptop', 'ACER E 14 E5-473-32W , Intel Core i3-5005U, 4GB DDR3, 1TB HDD', 'NXMXNSP002537021B43400', 'PGT', '2015-11-01', '2018-02-15', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-08 02:44:09', '2019-05-08 02:44:09'),
(212, 'WAH-TRG-LPT013', 'WAH', 'Laptop', 'ACER E 14 E5-473-32W , Intel Core i3-5005U, 4GB DDR3, 1TB HDD', 'NXMXNSP002537025B33400', 'PGT', '2015-11-01', '2018-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-08 02:44:50', '2019-05-08 02:44:50'),
(213, 'WAH-TRG-LPT014', 'WAH', 'Laptop', 'Lenovo Thinkpad X230 , Intel Core i5, 8GB DDR3, 1TB HDD', NULL, 'Others', '2018-12-18', '2018-12-20', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-08 02:45:30', '2019-05-08 02:46:19'),
(214, 'WAH-TRG-LPT015', 'WAH', 'Laptop', 'Lenovo Thinkpad X230 , Intel Core i5, 8GB DDR3, 1TB HDD', NULL, 'Others', '2018-12-18', '2018-12-20', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-08 02:46:05', '2019-05-08 02:46:05'),
(215, 'WAH-TRG-LPT016', 'WAH', 'Laptop', 'Lenovo Thinkpad X230,  Intel Core i5, 8GB DDR3, 1TB HDD', NULL, 'Others', '2018-12-18', '2018-12-20', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-08 02:46:55', '2019-05-08 02:46:55'),
(216, 'WAH-OFC-LPT001', 'WAH', 'Laptop', 'Asus X550L Series , Intel Core i7, 4GB DDR3, 1TB HD', 'S/N:D8N0CV02086731B', 'Others', '2014-05-19', '2014-05-19', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-08 02:47:49', '2019-05-08 02:47:49'),
(217, 'WAH-OFC-LPT002', 'WAH', 'Laptop', 'Lenovo Z500 , Intel Core i7, 4GB DDR3, 1TB HD', 'S/N:CB24910625', 'Others', '2014-05-19', '2014-05-19', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-08 02:48:26', '2019-05-08 02:48:26'),
(218, 'WAH-OFC-LPT003', 'WAH', 'Laptop', 'Asus X550L Series , Intel Core i7, 4GB DDR3, 1TB HD', 'S/N:E1NOCV10129401A', 'Others', '2014-05-19', '2014-05-19', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-08 02:49:00', '2019-05-08 02:49:00'),
(219, 'WAH-OFC-LPT004', 'WAH', 'Laptop', 'Asus X550L Series, Intel Core i7, 4GB DDR3, 1TB HD', 'S/N:EAN0CV048481411', 'Others', '2015-09-29', '2015-09-29', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-08 02:50:19', '2019-05-08 02:50:19'),
(220, 'WAH-OFC-LPT005', 'WAH', 'Laptop', 'Asus X550L Series , Intel Core i7, 4GB DDR3, 1TB HD', 'S/N:EAN0CV048059416', 'Others', '0005-09-29', '2015-09-29', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-08 02:51:00', '2019-05-08 02:51:00'),
(221, 'WAH-OFC-LPT006', 'WAH', 'Laptop', 'Asus X550L Series , Intel Core i7, 4GB DDR3, 1TB HD', 'S/N:EAN0CV047766419', 'Others', '2015-09-29', '2015-09-29', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-08 02:51:39', '2019-05-08 02:51:39'),
(222, 'WAH-OFC-LPT007', 'WAH', 'Laptop', 'Asus X550L Series , Intel Core i7, 4GB DDR3, 1TB HD', 'S/N:EAN0CV048030411', 'Others', '2015-09-29', '2015-09-29', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-08 02:52:15', '2019-05-08 02:52:15'),
(223, 'WAH-OFC-LPT008', 'WAH', 'Laptop', 'Aspire Switch 11	, Intel Core i3, 128GB DDR3, 1TB HD', 'S/N:NTL68SPOO1526815357200', 'WAH', '2015-09-29', '2018-05-09', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-08 02:53:02', '2019-05-08 02:53:02'),
(224, 'WAH-OFC-LPT009', 'WAH', 'Laptop', 'Asus TP300L , Intel Core i3-4210U, 6GB DDR3, 500MB HD', 'S/N:E9N0CJ04291837B', 'WAH', '2014-05-19', '2016-01-15', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-08 02:53:43', '2019-05-08 02:53:59'),
(225, 'WAH-OFC-LPT010', 'WAH', 'Laptop', 'MSI GP02 Leopard Pro , Intel Core i5, 4GB DDR3, 1TB HD', 'S/N:GP62 6QE-294PHK1511000083', 'WAH', '2016-01-31', '2016-01-31', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-08 02:54:41', '2019-05-08 02:54:41'),
(226, 'WAH-OFC-LPT011', 'WAH', 'Laptop', 'MSI GP02 Leopard Pro , Intel Core i5, 4GB DDR3, 1TB HD', 'S/N:GP62 6QE-294PHK1511000073', 'WAH', '2016-01-31', '2016-09-02', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-08 02:55:19', '2019-05-08 02:55:19'),
(227, 'WAH-OFC-LPT012', 'WAH', 'Laptop', 'Apple MacBook Air , Intel Dual Core i5, 8GB DDR3, 1TB HD', NULL, 'WAH', '2017-01-01', '2017-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-08 02:56:00', '2019-05-08 02:56:00'),
(228, 'WAH-OFC-LPT013', 'WAH', 'Laptop', 'Acer S 13 , Intel Core i7, 4GB DDR3, 1TB HD', 'S/N: NXGCHSP002616028053400', 'WAH', '2017-01-16', '2017-01-16', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-08 02:56:31', '2019-05-08 02:56:31'),
(229, 'WAH-OFC-LPT014', 'WAH', 'Laptop', 'MSI GL62m 7RD  , Intel Core i5, 4GB DDR3, 1TB HD', 'S/N:GL62M 7RD-092PH-BB5730H4G1T0H4G1T0X10S K1611N0027250', 'WAH', '2018-02-12', '2018-02-15', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-08 02:57:04', '2019-05-08 02:58:02'),
(230, 'WAH-OFC-LPT015', 'WAH', 'Laptop', 'MSI GL62m 7RD  , Intel Core i5, 4GB DDR3, 1TB HD', 'S/N:GL62M 7RD-092PH-BB5730H4G1T0H4G1T0X10S K1611N0027250', 'WAH', '2018-03-01', '2018-03-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-08 02:57:44', '2019-05-08 02:57:44'),
(231, 'WAH-OFC-BOX001', 'WAH', 'Plastic Box', 'Plastic Box', NULL, 'WAH', '2012-01-01', '2012-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-08 08:15:28', '2019-05-08 08:15:28'),
(232, 'WAH-OFC-BOX002', 'WAH', 'Plastic Box', 'Plastic Box', NULL, 'WAH', '2012-01-01', '2012-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-08 08:15:52', '2019-05-08 08:15:52'),
(233, 'WAH-OFC-BOX003', 'WAH', 'Plastic Box', 'Plastic Box', NULL, 'WAH', '2012-01-01', '2012-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-08 08:16:21', '2019-05-08 08:16:21');
INSERT INTO `items` (`id`, `prop_no`, `org`, `type`, `item_name`, `serial_no`, `source`, `date_procured`, `date_acquired`, `cost`, `salvage_value`, `life_span`, `age`, `disposed_date`, `disposed_method`, `remarks`, `location`, `created_at`, `updated_at`) VALUES
(234, 'WAH-OFC-BOX004', 'WAH', 'Plastic Box', 'Plastic Box', NULL, 'WAH', '2012-01-01', '2012-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-08 08:16:48', '2019-05-08 08:16:48'),
(235, 'WAH-OFC-BOX005', 'WAH', 'Plastic Box', 'Plastic Box', NULL, 'WAH', '2012-01-01', '2012-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-08 08:17:12', '2019-05-08 08:17:12'),
(236, 'WAH-OFC-BOX006', 'WAH', 'Plastic Box', 'Plastic Box', NULL, 'WAH', '2012-01-01', '2012-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-08 08:17:29', '2019-05-08 08:17:29'),
(237, 'WAH-OFC-BOX007', 'WAH', 'Plastic Box', 'Plastic Box', NULL, 'WAH', '2012-01-01', '2012-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-08 08:40:05', '2019-05-08 08:40:05'),
(238, 'WAH-OFC-BOX008', 'WAH', 'Plastic Box', 'Plastic Box', NULL, 'WAH', '2012-01-01', '2012-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-08 08:40:29', '2019-05-08 08:40:29'),
(239, 'WAH-OFC-BOX009', 'WAH', 'Plastic Box', 'Plastic Box', NULL, 'WAH', '2012-01-01', '2012-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-08 08:40:50', '2019-05-08 08:40:50'),
(240, 'WAH-OFC-BOX010', 'WAH', 'Plastic Box', 'Plastic Box', NULL, 'WAH', '2012-01-01', '2012-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-08 08:41:09', '2019-05-08 08:41:09'),
(241, 'WAH-OFC-FTBL001', 'WAH', 'Folding Tables (72.5 x 18.5 in)', 'Folding Tables (72.5 x 18.5 in)', NULL, 'WAH', '2012-01-01', '2012-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-08 08:41:31', '2019-05-08 08:41:31'),
(242, 'WAH-OFC-FTBL002', 'WAH', 'Folding Tables (72.5 x 18.5 in)', 'Folding Tables (72.5 x 18.5 in)', NULL, 'WAH', '2012-01-01', '2012-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-08 08:41:50', '2019-05-08 08:41:50'),
(243, 'WAH-OFC-FTBL003', 'WAH', 'Folding Tables (72.5 x 18.5 in)', 'Folding Tables (72.5 x 18.5 in)', NULL, 'WAH', '2012-01-01', '2012-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-08 08:42:11', '2019-05-08 08:42:11'),
(244, 'WAH-OFC-CT001', 'WAH', 'Computer Table', 'Computer Table', NULL, 'WAH', '2011-01-01', '2011-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-08 08:42:36', '2019-05-08 08:42:36'),
(245, 'WAH-OFC-CT002', 'WAH', 'Computer Table', 'Computer Table', NULL, 'WAH', '2011-01-01', '2011-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-08 08:43:07', '2019-05-08 08:43:07'),
(246, 'WAH-OFC-TBL001', 'WAH', 'L-Table', 'L-Table', NULL, 'WAH', '2011-01-01', '2011-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-08 08:43:31', '2019-05-08 08:43:31'),
(247, 'WAH-OFC-TBL002', 'WAH', 'Long Table', 'Long Table', NULL, 'WAH', '2011-01-01', '2011-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-08 08:43:50', '2019-05-08 08:43:50'),
(248, 'WAH-OFC-TBL003', 'WAH', 'Long Table', 'Long Table', NULL, 'WAH', '2011-01-01', '2011-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-08 08:44:11', '2019-05-08 08:44:11'),
(249, 'WAH-OFC-TBL004', 'WAH', '(43 x 23.5 in) Table', '(43 x 23.5 in) Table', NULL, 'WAH', '2011-01-01', '2011-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-08 08:44:32', '2019-05-08 08:44:32'),
(250, 'WAH-OFC-TBL005', 'WAH', '(79 x 40) in Table', '(79 x 40) in Table', NULL, 'WAH', '2011-01-01', '2011-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-08 08:45:04', '2019-05-08 08:45:04'),
(251, 'WAH-OFC-TBL006', 'WAH', '(71 x 23.5 in) Long Table', '(71 x 23.5 in) Long Table', NULL, 'WAH', '2011-01-01', '2012-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-08 08:45:44', '2019-05-08 08:45:44');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_02_12_155217_create_items_table', 1),
(4, '2019_04_03_014800_create_assigns_table', 1),
(5, '2019_04_24_190920_create_techbag_iteneraries_table', 1),
(6, '2019_05_02_090950_create_rhu_computers_table', 1),
(7, '2019_05_08_100751_add_serial_to_items', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rhu_computers`
--

CREATE TABLE `rhu_computers` (
  `id` int(10) UNSIGNED NOT NULL,
  `municipality` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rhu` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owned_by` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `property_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `spec` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ram` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hdd` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `os` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `wah_adoption` date NOT NULL,
  `date_acquired` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `techbag_itenerary`
--

CREATE TABLE `techbag_itenerary` (
  `id` int(10) UNSIGNED NOT NULL,
  `location` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `training` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `purpose` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_out` date DEFAULT NULL,
  `date_in` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `employee_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `designation` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `employee_no`, `name`, `username`, `password`, `designation`, `active`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'emp-111', 'Kevin Greg Alvarado', 'admin', '$2y$10$db3qsQyVI7UEuo5gy.IY0uf1jeZDJzmwab1IC0MpzXcUtrOXKt8Tu', 'tech', 'Yes', NULL, '2019-05-02 05:54:54', '2019-05-02 05:54:54');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assigns`
--
ALTER TABLE `assigns`
  ADD PRIMARY KEY (`id`),
  ADD KEY `assigns_user_id_foreign` (`user_id`),
  ADD KEY `assigns_item_id_foreign` (`item_id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `rhu_computers`
--
ALTER TABLE `rhu_computers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `techbag_itenerary`
--
ALTER TABLE `techbag_itenerary`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assigns`
--
ALTER TABLE `assigns`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=252;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `rhu_computers`
--
ALTER TABLE `rhu_computers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `techbag_itenerary`
--
ALTER TABLE `techbag_itenerary`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `assigns`
--
ALTER TABLE `assigns`
  ADD CONSTRAINT `assigns_item_id_foreign` FOREIGN KEY (`item_id`) REFERENCES `items` (`id`),
  ADD CONSTRAINT `assigns_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

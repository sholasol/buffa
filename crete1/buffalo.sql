-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 26, 2021 at 10:15 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `buffalo`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity`
--

CREATE TABLE `activity` (
  `id` int(11) NOT NULL,
  `user` varchar(200) DEFAULT NULL,
  `activity` text DEFAULT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `activity`
--

INSERT INTO `activity` (`id`, `user`, `activity`, `created`) VALUES
(53, 'admin@admin.com', 'User logout', '2020-06-01 09:30:00'),
(54, 'admin@admin.com', 'User login', '2020-06-01 09:30:08'),
(55, 'admin@admin.com', 'User login', '2020-06-01 15:52:14'),
(56, 'admin@admin.com', 'User login', '2020-06-02 11:42:19'),
(57, 'admin@admin.com', 'User login', '2020-06-02 16:57:19'),
(58, 'admin@admin.com', 'User logout', '2020-06-02 16:58:14'),
(59, 'admin@admin.com', 'User login', '2020-06-02 16:58:23'),
(60, 'admin@admin.com', 'User logout', '2020-06-02 17:44:50'),
(61, 'admin@admin.com', 'User login', '2020-06-03 12:13:16'),
(62, 'admin@admin.com', 'User login', '2020-06-03 15:45:17'),
(63, 'admin@admin.com', 'User login', '2020-06-03 16:59:32'),
(64, 'admin@admin.com', 'User login', '2020-06-03 17:03:15'),
(65, 'admin@admin.com', 'User login', '2020-06-03 17:03:40'),
(66, 'admin@admin.com', 'User logout', '2020-06-03 17:57:51'),
(67, 'admin@admin.com', 'User logout', '2020-06-03 17:58:02'),
(68, 'admin@admin.com', 'User login', '2020-06-04 12:59:09'),
(69, 'admin@admin.com', 'User login', '2020-06-05 13:12:54'),
(70, 'admin@admin.com', 'User login', '2020-06-05 15:41:34'),
(71, 'admin@admin.com', 'User login', '2020-06-05 15:42:21'),
(72, 'admin@admin.com', 'User login', '2021-02-13 21:21:47'),
(73, 'admin@admin.com', 'User logout', '2021-02-13 21:40:41'),
(74, 'admin@admin.com', 'User login', '2021-02-13 21:41:06'),
(75, 'admin@admin.com', 'User logout', '2021-02-13 21:43:14'),
(76, 'admin@admin.com', 'User login', '2021-02-14 20:20:15'),
(77, 'admin@admin.com', 'User login', '2021-02-15 14:52:12'),
(78, 'admin@admin.com', 'User logout', '2021-02-15 15:13:27'),
(79, 'admin@admin.com', 'User login', '2021-02-15 15:16:34'),
(80, 'admin@admin.com', 'User login', '2021-02-15 21:24:15'),
(81, 'admin@admin.com', 'User login', '2020-01-01 00:26:29'),
(82, 'admin@admin.com', 'User login', '2021-02-17 09:18:43'),
(83, 'admin@admin.com', 'User login', '2021-02-17 15:34:23'),
(84, 'admin@admin.com', 'Create new product', '2021-02-17 16:28:15'),
(85, 'admin@admin.com', 'User login', '2021-02-17 20:53:58'),
(86, 'admin@admin.com', 'Create new product', '2021-02-17 21:41:36'),
(87, 'admin@admin.com', 'User login', '2021-02-17 22:07:41'),
(88, 'admin@admin.com', 'User login', '2021-02-18 09:58:12'),
(89, 'admin@admin.com', 'Create new product', '2021-02-18 10:18:35'),
(90, 'admin@admin.com', 'User login', '2021-02-18 18:04:23'),
(91, 'admin@admin.com', 'Create new product', '2021-02-18 18:05:40'),
(92, 'admin@admin.com', 'User login', '2021-02-19 10:31:25'),
(93, 'admin@admin.com', 'User login', '2021-02-19 22:29:45'),
(94, 'admin@admin.com', 'User login', '2021-02-20 20:56:41'),
(95, 'admin@admin.com', 'Create new product', '2021-02-20 21:58:42'),
(96, 'admin@admin.com', 'Create new product', '2021-02-20 21:59:26'),
(97, 'admin@admin.com', 'User login', '2021-02-22 00:12:32'),
(98, 'admin@admin.com', 'User login', '2021-02-22 10:56:58'),
(99, 'admin@admin.com', 'Created new project', '2021-02-22 18:45:29'),
(100, 'admin@admin.com', 'User login', '2021-02-23 09:10:59'),
(101, 'admin@admin.com', 'User login', '2021-02-24 13:41:43'),
(102, 'admin@admin.com', 'User logout', '2021-02-24 13:43:09'),
(103, 'admin@admin.com', 'User login', '2021-02-24 13:43:13'),
(104, 'admin@admin.com', 'User login', '2021-02-25 10:40:52'),
(105, 'admin@admin.com', 'User login', '2021-02-26 20:35:54'),
(106, 'admin@admin.com', 'User login', '2021-02-27 09:46:16'),
(107, 'admin@admin.com', 'User login', '2021-02-27 11:24:24'),
(108, 'admin@admin.com', 'User login', '2021-03-02 09:27:45'),
(109, 'admin@admin.com', 'User login', '2021-03-02 10:27:48'),
(110, 'admin@admin.com', 'User login', '2021-03-03 08:03:56'),
(111, 'admin@admin.com', 'User login', '2021-03-05 09:40:34'),
(112, 'admin@admin.com', 'User login', '2021-03-10 11:41:32'),
(113, 'admin@admin.com', 'User login', '2021-03-10 15:05:48'),
(114, 'admin@admin.com', 'User login', '2021-03-11 18:41:24'),
(115, 'admin@admin.com', 'User login', '2021-03-11 21:21:45'),
(116, 'admin@admin.com', 'User login', '2021-03-19 08:27:57'),
(117, 'admin@admin.com', 'User login', '2021-03-22 22:33:48'),
(118, 'admin@admin.com', 'User login', '2021-03-23 00:30:12'),
(119, 'admin@admin.com', 'User login', '2021-03-23 00:43:47'),
(120, 'admin@admin.com', 'User login', '2021-03-23 06:59:29'),
(121, 'admin@admin.com', 'User logout', '2021-03-24 10:15:50'),
(122, 'admin@admin.com', 'User login', '2021-03-24 10:16:00'),
(123, 'admin@admin.com', 'User login', '2021-03-24 21:41:49'),
(124, 'admin@admin.com', 'User login', '2021-03-25 00:04:24'),
(125, 'admin@admin.com', 'User logout', '2021-03-25 00:04:49'),
(126, 'admin@admin.com', 'User login', '2021-03-25 00:53:08'),
(127, 'admin@admin.com', 'User login', '2021-03-31 17:33:45'),
(128, 'admin@admin.com', 'User login', '2021-04-01 05:51:20'),
(129, 'admin@admin.com', 'User login', '2021-04-02 02:33:44'),
(130, 'admin@admin.com', 'User login', '2021-04-02 09:28:34'),
(131, 'admin@admin.com', 'User login', '2021-04-02 22:39:00'),
(132, 'admin@admin.com', 'User login', '2021-04-04 23:11:42'),
(133, 'admin@admin.com', 'User logout', '2021-04-05 08:05:55'),
(134, 'drive@driver.com', 'User login', '2021-04-05 08:06:22'),
(135, 'drive@driver.com', 'User login', '2021-04-05 08:08:29'),
(136, 'admin@admin.com', 'User login', '2021-04-06 02:22:50'),
(137, 'admin@admin.com', 'User logout', '2021-04-06 02:53:49'),
(138, 'market@market.com', 'User login', '2021-04-06 02:54:01'),
(139, 'market@market.com', 'User logout', '2021-04-06 02:56:08'),
(140, 'admin@prod.com', 'User login', '2021-04-06 02:57:13'),
(141, 'admin@admin.com', 'User login', '2021-04-08 01:50:49'),
(142, 'admin@admin.com', 'User login', '2021-04-08 23:19:25'),
(143, 'admin@admin.com', 'User login', '2021-04-14 12:31:17'),
(144, 'admin@admin.com', 'User login', '2021-04-14 13:52:11'),
(145, 'admin@admin.com', 'User login', '2021-04-28 06:43:59'),
(146, 'admin@admin.com', 'User logout', '2021-04-28 06:48:35'),
(147, 'admin@admin.com', 'User login', '2021-04-28 06:49:15'),
(148, 'admin@admin.com', 'User logout', '2021-04-28 06:50:28'),
(149, 'admin@admin.com', 'User login', '2021-04-28 10:44:59'),
(150, 'admin@admin.com', 'User login', '2021-04-29 11:21:23'),
(151, 'admin@admin.com', 'User login', '2021-05-03 11:45:49'),
(152, 'admin@admin.com', 'User logout', '2021-05-03 13:16:06'),
(153, 't@test.com', 'User login', '2021-05-03 13:16:20'),
(154, 'admin@admin.com', 'User login', '2021-05-03 13:18:58'),
(155, 'admin@admin.com', 'User login', '2021-05-05 10:53:30'),
(156, 'admin@admin.com', 'User login', '2021-05-06 03:07:57');

-- --------------------------------------------------------

--
-- Table structure for table `assetcategories`
--

CREATE TABLE `assetcategories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `color` varchar(7) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `assetcategories`
--

INSERT INTO `assetcategories` (`id`, `name`, `color`) VALUES
(1, 'Vehicle', 'Red'),
(2, 'Vibrated Machine', 'Blue');

-- --------------------------------------------------------

--
-- Table structure for table `assets`
--

CREATE TABLE `assets` (
  `id` int(11) NOT NULL,
  `categoryid` int(11) DEFAULT NULL,
  `adminid` int(11) DEFAULT NULL,
  `date_added` varchar(30) DEFAULT NULL,
  `purchase_date` varchar(255) DEFAULT NULL,
  `value` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `serial_no` varchar(255) DEFAULT NULL,
  `notes` text DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `assets`
--

INSERT INTO `assets` (`id`, `categoryid`, `adminid`, `date_added`, `purchase_date`, `value`, `name`, `serial_no`, `notes`) VALUES
(1, 1, 1, '2021-03-25', '2021-03-11', NULL, 'Nissan 504', 'IKJ-98-009', 'new vehicl'),
(2, 1, 1, '2021-06-03', '2021-12-31', NULL, 'Vehicle', '123456', 'Toyato'),
(3, 1, 1, '2021-06-04', '2021-06-04', NULL, 'Vehicle', '123456ff', 'Nissan 6 tyre'),
(4, 1, 1, '2021-07-23', '2021-07-22', 3000, 'Testing', '000912', 'Some notes');

-- --------------------------------------------------------

--
-- Table structure for table `branch`
--

CREATE TABLE `branch` (
  `id` int(11) NOT NULL,
  `code` varchar(35) DEFAULT NULL,
  `name` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `chairman` varchar(56) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `created` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `branch`
--

INSERT INTO `branch` (`id`, `code`, `name`, `email`, `phone`, `chairman`, `address`, `status`, `created`) VALUES
(12, 'sh0soffq', 'Mutolib sodiq Akinpelumi', 'younghallajinoni@gmail.com', '07068581708', 'Young Hallaji', 'sunmola estate, itekun road', 1, NULL),
(13, '4zaut568', 'Mutolib sodiq Akinpelumi', 'younghallajinoni@gmail.com', '07068581708', 'Young Hallaji', 'sunmola estate, itekun road', 0, '2021-06-02 11:06:55'),
(14, '7xrrcgyr', 'Kingdom Hall', 'kingdomhall@gmail.com', '07068581708', 'Young Hallaji', 'sunmola estate, itekun road', 1, '2021-06-02 11:06:37'),
(15, 'qhagqnk0', 'abijo', 'abijo@buffalo.com', '0909989878', 'Abijo Chairman', 'Abijo, lagos state', 1, '2021-06-03 20:06:18'),
(16, 'ivei7qev', 'Test', 'test@branch.com', '09087654321', 'Mr David', 'Ajah', 1, '2021-06-08 16:06:20');

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `id` int(11) NOT NULL,
  `sender` int(11) NOT NULL,
  `receiver` int(11) NOT NULL,
  `message` text NOT NULL,
  `datetime` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`id`, `sender`, `receiver`, `message`, `datetime`) VALUES
(1, 1, 10, 'hello', ''),
(2, 1, 10, 'test working', '2021-05-06 05:07:31'),
(3, 10, 1, '00', '2021-05-06 06:32:40'),
(4, 1, 10, 'test working', '2021-05-06 07:09:44'),
(5, 1, 10, 'Hello', '2021-05-06 07:10:14'),
(6, 1, 10, 'Hello success', '2021-05-06 07:11:00'),
(7, 1, 10, '00', '2021-05-06 07:11:08'),
(8, 1, 10, 'Hello', '2021-05-06 07:11:41'),
(9, 1, 10, 'Hello Sodiq', '2021-05-06 07:12:06'),
(10, 1, 10, 'ajax sent', '2021-05-06 07:17:28'),
(11, 1, 4, 'This is a new chat with kenor', '2021-05-06 07:19:19'),
(12, 1, 4, 'hello', '2021-05-06 07:22:09'),
(13, 1, 4, 'test working', '2021-05-06 07:22:58'),
(14, 1, 4, 'Hello', '2021-05-06 07:23:04'),
(15, 5, 3, 'helo', '2021-05-18 08:51:34'),
(16, 5, 3, 'hi', '2021-05-18 08:52:01'),
(17, 5, 3, 'Hello', '2021-05-19 07:47:03'),
(18, 5, 1, 'hello', '2021-05-19 07:47:11'),
(19, 5, 1, 'hi', '2021-05-19 07:47:46'),
(20, 5, 2, 'hello', '2021-05-19 07:48:03'),
(21, 1, 3, 'hello', '2021-05-20 09:04:40'),
(22, 1, 3, 'Hello', '2021-05-20 09:04:46'),
(23, 1, 3, 'test working', '2021-05-20 09:04:50'),
(24, 1, 8, 'test working', '2021-05-20 09:05:35'),
(25, 1, 2, 'hi', '2021-05-26 10:22:40'),
(26, 1, 14, 'hello', '2021-06-02 05:43:32'),
(27, 42, 1, 'hello', '2021-06-04 11:01:14'),
(28, 1, 42, 'hi', '2021-06-04 11:01:38'),
(29, 42, 1, 'how are you', '2021-06-04 11:02:08'),
(30, 1, 42, 'Am fine', '2021-06-04 11:02:16'),
(31, 1, 42, 'Hello Ayinde', '2021-06-04 06:58:25'),
(32, 1, 42, 'Hello', '2021-06-08 03:51:49'),
(33, 1, 49, 'Hi Test', '2021-07-20 12:15:29'),
(34, 1, 49, 'How are you today', '2021-07-20 12:15:35');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `ftname` varchar(191) NOT NULL,
  `lname` varchar(191) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `title` varchar(100) DEFAULT NULL,
  `datecreated` datetime NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `new_pass_key` varchar(32) DEFAULT NULL,
  `new_pass_key_requested` datetime DEFAULT NULL,
  `email_verified_at` datetime DEFAULT NULL,
  `email_verification_key` varchar(32) DEFAULT NULL,
  `email_verification_sent_at` datetime DEFAULT NULL,
  `last_ip` varchar(40) DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  `last_password_change` datetime DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 1,
  `profile_image` varchar(191) DEFAULT NULL,
  `direction` varchar(3) DEFAULT NULL,
  `invoice_emails` tinyint(1) NOT NULL DEFAULT 1,
  `estimate_emails` tinyint(1) NOT NULL DEFAULT 1,
  `credit_note_emails` tinyint(1) NOT NULL DEFAULT 1,
  `contract_emails` tinyint(1) NOT NULL DEFAULT 1,
  `task_emails` tinyint(1) NOT NULL DEFAULT 1,
  `project_emails` tinyint(1) NOT NULL DEFAULT 1,
  `ticket_emails` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `contracts`
--

CREATE TABLE `contracts` (
  `id` int(11) NOT NULL,
  `content` longtext DEFAULT NULL,
  `description` text DEFAULT NULL,
  `subject` varchar(191) DEFAULT NULL,
  `client` int(11) NOT NULL,
  `datestart` date DEFAULT NULL,
  `dateend` date DEFAULT NULL,
  `contract_type` int(11) DEFAULT NULL,
  `addedfrom` int(11) NOT NULL,
  `dateadded` datetime NOT NULL,
  `isexpirynotified` int(11) NOT NULL DEFAULT 0,
  `contract_value` decimal(15,2) DEFAULT NULL,
  `trash` tinyint(1) DEFAULT 0,
  `not_visible_to_client` tinyint(1) NOT NULL DEFAULT 0,
  `hash` varchar(32) DEFAULT NULL,
  `signed` tinyint(1) NOT NULL DEFAULT 0,
  `signature` varchar(40) DEFAULT NULL,
  `marked_as_signed` tinyint(1) NOT NULL DEFAULT 0,
  `acceptance_firstname` varchar(50) DEFAULT NULL,
  `acceptance_lastname` varchar(50) DEFAULT NULL,
  `acceptance_email` varchar(100) DEFAULT NULL,
  `acceptance_date` datetime DEFAULT NULL,
  `acceptance_ip` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `contracts_types`
--

CREATE TABLE `contracts_types` (
  `id` int(11) NOT NULL,
  `name` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `contract_comments`
--

CREATE TABLE `contract_comments` (
  `id` int(11) NOT NULL,
  `content` mediumtext DEFAULT NULL,
  `contract_id` int(11) NOT NULL,
  `staffid` int(11) NOT NULL,
  `dateadded` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `departmentid` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `imap_username` varchar(191) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `email_from_header` tinyint(1) NOT NULL DEFAULT 0,
  `host` varchar(150) DEFAULT NULL,
  `password` mediumtext DEFAULT NULL,
  `encryption` varchar(3) DEFAULT NULL,
  `delete_after_import` int(11) NOT NULL DEFAULT 0,
  `calendar_id` mediumtext DEFAULT NULL,
  `hidefromclient` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `estimates`
--

CREATE TABLE `estimates` (
  `id` int(11) NOT NULL,
  `sent` tinyint(1) NOT NULL DEFAULT 0,
  `datesend` datetime DEFAULT NULL,
  `clientid` int(11) NOT NULL,
  `deleted_customer_name` varchar(100) DEFAULT NULL,
  `project_id` int(11) NOT NULL DEFAULT 0,
  `number` int(11) NOT NULL,
  `prefix` varchar(50) DEFAULT NULL,
  `number_format` int(11) NOT NULL DEFAULT 0,
  `hash` varchar(32) DEFAULT NULL,
  `datecreated` datetime NOT NULL,
  `date` date NOT NULL,
  `expirydate` date DEFAULT NULL,
  `currency` int(11) NOT NULL,
  `subtotal` decimal(15,2) NOT NULL,
  `total_tax` decimal(15,2) NOT NULL DEFAULT 0.00,
  `total` decimal(15,2) NOT NULL,
  `adjustment` decimal(15,2) DEFAULT NULL,
  `addedfrom` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `clientnote` text DEFAULT NULL,
  `adminnote` text DEFAULT NULL,
  `discount_percent` decimal(15,2) DEFAULT 0.00,
  `discount_total` decimal(15,2) DEFAULT 0.00,
  `discount_type` varchar(30) DEFAULT NULL,
  `invoiceid` int(11) DEFAULT NULL,
  `invoiced_date` datetime DEFAULT NULL,
  `terms` text DEFAULT NULL,
  `reference_no` varchar(100) DEFAULT NULL,
  `sale_agent` int(11) NOT NULL DEFAULT 0,
  `billing_street` varchar(200) DEFAULT NULL,
  `billing_city` varchar(100) DEFAULT NULL,
  `billing_state` varchar(100) DEFAULT NULL,
  `billing_zip` varchar(100) DEFAULT NULL,
  `billing_country` int(11) DEFAULT NULL,
  `shipping_street` varchar(200) DEFAULT NULL,
  `shipping_city` varchar(100) DEFAULT NULL,
  `shipping_state` varchar(100) DEFAULT NULL,
  `shipping_zip` varchar(100) DEFAULT NULL,
  `shipping_country` int(11) DEFAULT NULL,
  `include_shipping` tinyint(1) NOT NULL,
  `show_shipping_on_estimate` tinyint(1) NOT NULL DEFAULT 1,
  `show_quantity_as` int(11) NOT NULL DEFAULT 1,
  `pipeline_order` int(11) NOT NULL DEFAULT 0,
  `is_expiry_notified` int(11) NOT NULL DEFAULT 0,
  `acceptance_firstname` varchar(50) DEFAULT NULL,
  `acceptance_lastname` varchar(50) DEFAULT NULL,
  `acceptance_email` varchar(100) DEFAULT NULL,
  `acceptance_date` datetime DEFAULT NULL,
  `acceptance_ip` varchar(40) DEFAULT NULL,
  `signature` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `id` int(11) NOT NULL,
  `category` int(11) DEFAULT NULL,
  `currency` int(11) DEFAULT NULL,
  `amount` decimal(15,2) DEFAULT NULL,
  `tax` int(11) DEFAULT NULL,
  `tax2` int(11) NOT NULL DEFAULT 0,
  `reference_no` varchar(100) DEFAULT NULL,
  `note` text DEFAULT NULL,
  `expense_name` varchar(191) DEFAULT NULL,
  `clientid` int(11) DEFAULT NULL,
  `project_id` int(11) NOT NULL DEFAULT 0,
  `billable` int(11) DEFAULT 0,
  `invoiceid` int(11) DEFAULT NULL,
  `paymentmode` varchar(50) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `recurring_type` varchar(10) DEFAULT NULL,
  `repeat_every` int(11) DEFAULT NULL,
  `recurring` int(11) NOT NULL DEFAULT 0,
  `cycles` int(11) NOT NULL DEFAULT 0,
  `total_cycles` int(11) NOT NULL DEFAULT 0,
  `custom_recurring` int(11) NOT NULL DEFAULT 0,
  `last_recurring_date` date DEFAULT NULL,
  `create_invoice_billable` tinyint(1) DEFAULT NULL,
  `send_invoice_to_customer` tinyint(1) DEFAULT NULL,
  `recurring_from` int(11) DEFAULT NULL,
  `dateadded` datetime DEFAULT NULL,
  `addedfrom` int(11) DEFAULT NULL,
  `month` int(11) DEFAULT NULL,
  `year` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `expenses`
--

INSERT INTO `expenses` (`id`, `category`, `currency`, `amount`, `tax`, `tax2`, `reference_no`, `note`, `expense_name`, `clientid`, `project_id`, `billable`, `invoiceid`, `paymentmode`, `date`, `recurring_type`, `repeat_every`, `recurring`, `cycles`, `total_cycles`, `custom_recurring`, `last_recurring_date`, `create_invoice_billable`, `send_invoice_to_customer`, `recurring_from`, `dateadded`, `addedfrom`, `month`, `year`) VALUES
(1, 1, NULL, '2000.00', NULL, 0, NULL, 'Some notes', 'Expense', 42, 0, 0, NULL, 'Cash', '2021-07-21', NULL, NULL, 0, 0, 0, 0, NULL, NULL, NULL, NULL, '2021-04-09 00:00:00', NULL, 1, 2019),
(2, 2, NULL, '3000.00', NULL, 0, NULL, 'Description', 'Maintenance', 1, 0, 0, NULL, 'Cash', '2021-03-05', NULL, NULL, 0, 0, 0, 0, NULL, NULL, NULL, NULL, '2021-04-09 00:00:00', NULL, 2, 2021),
(3, 1, NULL, '30000.00', NULL, 0, NULL, 'Note', 'Car Repair', 2, 0, 0, NULL, 'Cash', '2021-04-09', NULL, NULL, 0, 0, 0, 0, NULL, NULL, NULL, NULL, '2021-04-09 00:00:00', NULL, 4, 2020),
(7, 4, NULL, '10000.00', NULL, 0, NULL, 'I am buying things', 'today expenses', 42, 0, 0, NULL, 'Bank Deposit', '2021-06-04', NULL, NULL, 0, 0, 0, 0, NULL, NULL, NULL, NULL, '2021-06-04 00:00:00', NULL, 6, 2021);

-- --------------------------------------------------------

--
-- Table structure for table `expenses_categories`
--

CREATE TABLE `expenses_categories` (
  `id` int(11) NOT NULL,
  `name` varchar(191) NOT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `expenses_categories`
--

INSERT INTO `expenses_categories` (`id`, `name`, `description`) VALUES
(1, 'Raw Material', NULL),
(2, 'Cement', NULL),
(3, 'Transportation', NULL),
(4, 'Maintainance', NULL),
(5, 'new Category', NULL),
(6, 'Update Expense', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `id` int(11) NOT NULL,
  `rel_id` int(11) NOT NULL,
  `rel_type` varchar(20) NOT NULL,
  `file_name` varchar(191) NOT NULL,
  `filetype` varchar(40) DEFAULT NULL,
  `visible_to_customer` int(11) NOT NULL DEFAULT 0,
  `attachment_key` varchar(32) DEFAULT NULL,
  `external` varchar(40) DEFAULT NULL,
  `external_link` text DEFAULT NULL,
  `thumbnail_link` text DEFAULT NULL COMMENT 'For external usage',
  `staffid` int(11) NOT NULL,
  `contact_id` int(11) DEFAULT 0,
  `task_comment_id` int(11) NOT NULL DEFAULT 0,
  `dateadded` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `friends`
--

CREATE TABLE `friends` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `friend` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `permission` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `permission`) VALUES
(1, 'Standard User', ''),
(2, 'Administrator', '{\"admin\": 1, \"moderator\": 1}');

-- --------------------------------------------------------

--
-- Table structure for table `input`
--

CREATE TABLE `input` (
  `id` int(11) NOT NULL,
  `code` varchar(20) DEFAULT NULL,
  `product` varchar(200) DEFAULT NULL,
  `input` varchar(255) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `cost` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `input`
--

INSERT INTO `input` (`id`, `code`, `product`, `input`, `qty`, `price`, `cost`) VALUES
(30, 'UC45WM1', '1', '1', 2, 40000, 80000),
(32, '9CK7HY3', '2', '2', 10, 2800, 28000),
(33, 'S6E3ZCF', '6', '1', 3, 40000, 120000),
(34, '9CK7HY3', '2', '11', 2, 7000, 14000);

-- --------------------------------------------------------

--
-- Table structure for table `invoicepayment`
--

CREATE TABLE `invoicepayment` (
  `id` int(11) NOT NULL,
  `invoiceid` int(11) NOT NULL,
  `amount` decimal(15,2) NOT NULL,
  `paymentmode` varchar(40) DEFAULT NULL,
  `paymentmethod` varchar(191) DEFAULT NULL,
  `date` date NOT NULL,
  `daterecorded` datetime NOT NULL,
  `note` text NOT NULL,
  `transactionid` mediumtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `id` int(11) NOT NULL,
  `sent` tinyint(1) NOT NULL DEFAULT 0,
  `datesend` datetime DEFAULT NULL,
  `clientid` int(11) NOT NULL,
  `deleted_customer_name` varchar(100) DEFAULT NULL,
  `number` int(11) NOT NULL,
  `prefix` varchar(50) DEFAULT NULL,
  `number_format` int(11) NOT NULL DEFAULT 0,
  `datecreated` datetime NOT NULL,
  `date` date NOT NULL,
  `duedate` date DEFAULT NULL,
  `currency` int(11) NOT NULL,
  `subtotal` decimal(15,2) NOT NULL,
  `total_tax` decimal(15,2) NOT NULL DEFAULT 0.00,
  `total` decimal(15,2) NOT NULL,
  `adjustment` decimal(15,2) DEFAULT NULL,
  `addedfrom` int(11) DEFAULT NULL,
  `hash` varchar(32) NOT NULL,
  `status` int(11) DEFAULT 1,
  `clientnote` text DEFAULT NULL,
  `adminnote` text DEFAULT NULL,
  `last_overdue_reminder` date DEFAULT NULL,
  `cancel_overdue_reminders` int(11) NOT NULL DEFAULT 0,
  `allowed_payment_modes` mediumtext DEFAULT NULL,
  `token` mediumtext DEFAULT NULL,
  `discount_percent` decimal(15,2) DEFAULT 0.00,
  `discount_total` decimal(15,2) DEFAULT 0.00,
  `discount_type` varchar(30) NOT NULL,
  `recurring` int(11) NOT NULL DEFAULT 0,
  `recurring_type` varchar(10) DEFAULT NULL,
  `custom_recurring` tinyint(1) NOT NULL DEFAULT 0,
  `cycles` int(11) NOT NULL DEFAULT 0,
  `total_cycles` int(11) NOT NULL DEFAULT 0,
  `is_recurring_from` int(11) DEFAULT NULL,
  `last_recurring_date` date DEFAULT NULL,
  `terms` text DEFAULT NULL,
  `sale_agent` int(11) NOT NULL DEFAULT 0,
  `billing_street` varchar(200) DEFAULT NULL,
  `billing_city` varchar(100) DEFAULT NULL,
  `billing_state` varchar(100) DEFAULT NULL,
  `billing_zip` varchar(100) DEFAULT NULL,
  `billing_country` int(11) DEFAULT NULL,
  `shipping_street` varchar(200) DEFAULT NULL,
  `shipping_city` varchar(100) DEFAULT NULL,
  `shipping_state` varchar(100) DEFAULT NULL,
  `shipping_zip` varchar(100) DEFAULT NULL,
  `shipping_country` int(11) DEFAULT NULL,
  `include_shipping` tinyint(1) NOT NULL,
  `show_shipping_on_invoice` tinyint(1) NOT NULL DEFAULT 1,
  `show_quantity_as` int(11) NOT NULL DEFAULT 1,
  `project_id` int(11) DEFAULT 0,
  `subscription_id` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int(11) NOT NULL,
  `description` mediumtext NOT NULL,
  `long_description` text DEFAULT NULL,
  `rate` decimal(15,2) NOT NULL,
  `tax` int(11) DEFAULT NULL,
  `tax2` int(11) DEFAULT NULL,
  `unit` varchar(40) DEFAULT NULL,
  `group_id` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `items_groups`
--

CREATE TABLE `items_groups` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `item_tax`
--

CREATE TABLE `item_tax` (
  `id` int(11) NOT NULL,
  `itemid` int(11) NOT NULL,
  `rel_id` int(11) NOT NULL,
  `rel_type` varchar(20) NOT NULL,
  `taxrate` decimal(15,2) NOT NULL,
  `taxname` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `knowedge_base_article_feedback`
--

CREATE TABLE `knowedge_base_article_feedback` (
  `articleanswerid` int(11) NOT NULL,
  `articleid` int(11) NOT NULL,
  `answer` int(11) NOT NULL,
  `ip` varchar(40) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `knowledge_base`
--

CREATE TABLE `knowledge_base` (
  `articleid` int(11) NOT NULL,
  `articlegroup` int(11) NOT NULL,
  `subject` mediumtext NOT NULL,
  `description` text NOT NULL,
  `slug` mediumtext NOT NULL,
  `active` tinyint(4) NOT NULL,
  `datecreated` datetime NOT NULL,
  `article_order` int(11) NOT NULL DEFAULT 0,
  `staff_article` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `knowledge_base_groups`
--

CREATE TABLE `knowledge_base_groups` (
  `groupid` int(11) NOT NULL,
  `name` varchar(191) NOT NULL,
  `group_slug` text DEFAULT NULL,
  `description` mediumtext DEFAULT NULL,
  `active` tinyint(4) NOT NULL,
  `color` varchar(10) DEFAULT '#28B8DA',
  `group_order` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `leads`
--

CREATE TABLE `leads` (
  `id` int(11) NOT NULL,
  `name` varchar(191) DEFAULT NULL,
  `gender` varchar(100) DEFAULT NULL,
  `company` varchar(191) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `country` int(11) DEFAULT 0,
  `branches` varchar(100) DEFAULT NULL,
  `assigned` int(11) DEFAULT 0,
  `dateadded` varchar(30) DEFAULT NULL,
  `ranks` varchar(11) DEFAULT NULL,
  `addedby` int(11) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phonenumber` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `leads`
--

INSERT INTO `leads` (`id`, `name`, `gender`, `company`, `description`, `country`, `branches`, `assigned`, `dateadded`, `ranks`, `addedby`, `email`, `phonenumber`) VALUES
(1, 'Young Alhaji Asafe', 'Male', NULL, 'testing new lead', 0, 'Test', 0, '2021-06-10', 'Lead', 1, 'younghallajinoni@gmail.com', '08056789012');

-- --------------------------------------------------------

--
-- Table structure for table `leads_sources`
--

CREATE TABLE `leads_sources` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `lead_activity_log`
--

CREATE TABLE `lead_activity_log` (
  `id` int(11) NOT NULL,
  `leadid` int(11) NOT NULL,
  `description` mediumtext NOT NULL,
  `additional_data` text DEFAULT NULL,
  `date` datetime NOT NULL,
  `staffid` int(11) NOT NULL,
  `full_name` varchar(100) DEFAULT NULL,
  `custom_activity` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `marketing_items`
--

CREATE TABLE `marketing_items` (
  `id` int(9) NOT NULL,
  `product` int(9) NOT NULL,
  `quantity` int(9) NOT NULL,
  `sales_id` varchar(15) DEFAULT NULL,
  `unitPrice` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `marketing_items`
--

INSERT INTO `marketing_items` (`id`, `product`, `quantity`, `sales_id`, `unitPrice`) VALUES
(1, 2, 1, 'BUF-CRE-4834', '1000.00'),
(2, 2, 2, 'BUF-CRE-3239', '1000.00'),
(3, 4, 1, 'BUF-CRE-3239', '9000.00'),
(4, 3, 1, 'BUF-CRE-994C', '500.00'),
(5, 2, 1000, 'BUF-CRE-7330', '1000.00'),
(6, 1, 2, 'BUF-CRE-7330', '8000.00'),
(7, 2, 2, 'BUF-CRE-8504', '400'),
(8, 4, 3, 'BUF-CRE-8504', '300'),
(9, 4, 1, 'BUF-CRE-03BF', '400'),
(10, 2, 4, 'BUF-CRE-03BF', '330');

-- --------------------------------------------------------

--
-- Table structure for table `material`
--

CREATE TABLE `material` (
  `id` int(11) NOT NULL,
  `material` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `cost` int(11) DEFAULT NULL,
  `created` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `material`
--

INSERT INTO `material` (`id`, `material`, `type`, `cost`, `created`) VALUES
(1, 'Stone Dust', 'Stone', 200000, '2021-02-17');

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` int(11) NOT NULL,
  `menu` varchar(50) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `link` varchar(50) DEFAULT NULL,
  `icon` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `menu`, `parent_id`, `link`, `icon`) VALUES
(1, 'Dashboard', 0, 'dashboard', 'icon-speedometer'),
(2, 'Human Resources', 0, NULL, 'ti-user'),
(3, 'Products', 0, NULL, 'ti-layout-grid2'),
(4, 'Production', 0, NULL, 'icon icon-briefcase'),
(5, 'Chat', 0, 'chat', 'ti-email'),
(6, 'Project', 0, NULL, 'ti-palette'),
(7, 'Inventory', 0, NULL, 'ti-palette'),
(8, 'Expenses', 0, NULL, 'icon-speedometer'),
(9, 'Task', 0, NULL, 'ti-layout-media-right-alt'),
(10, 'Assets', 0, NULL, 'ti-layout-grid2'),
(11, 'Sales Management', 0, NULL, 'ti-shopping-cart-full'),
(12, 'Marketing', 0, NULL, 'ti-briefcase'),
(13, 'Logistics', 0, NULL, 'ti-gallery'),
(14, 'Support & Ticket', 0, NULL, 'ti-files'),
(15, 'Account', 0, NULL, 'ti-pie-chart'),
(16, 'Staff', 2, 'staff', ''),
(17, 'Customer', 2, 'customer', ''),
(18, 'Supplier', 2, 'supplier', ''),
(21, 'Branch', 2, 'branch', ''),
(23, 'Product', 3, 'product', ''),
(24, 'Material', 3, 'material', ''),
(25, 'Material Unit', 3, 'materialUnit', ''),
(27, 'New Product', 4, 'production', ''),
(28, 'Manage Production', 4, 'manageProduction', ''),
(29, 'Raw Materials', 4, 'rawMaterial', ''),
(31, 'All Project', 6, 'project', ''),
(32, 'Completed Project', 6, 'cproject', ''),
(33, 'Ongoing Project', 6, 'onproject', ''),
(34, 'Sold Product', 7, 'sold-product', ''),
(35, 'Produced Product', 7, 'produced-product', ''),
(36, 'Used Material', 7, 'used-material', ''),
(37, 'View Expenses', 8, 'expenses', ''),
(39, 'Expenses-category', 8, 'ecategory', ''),
(40, 'All task', 9, 'task', ''),
(41, 'Pending Tasks', 9, 'ptask', ''),
(42, 'Completed Task', 9, 'ctask', ''),
(43, 'Create Assets', 10, 'create-assets', ''),
(44, 'Manage Assets', 10, 'manageAssets', ''),
(45, 'Create Sales', 11, 'sales', ''),
(46, 'manage Sales', 11, 'manage-sales', ''),
(48, 'Manage Activities', 12, 'Mactivity', ''),
(49, 'Create Activity', 12, 'marketing', ''),
(50, 'All Ticket', 14, 'ticket', ''),
(51, 'Open Ticket', 14, 'open', ''),
(52, 'Close Ticket', 14, 'close', ''),
(53, 'Delivery Report', 13, 'transportLog', ''),
(54, 'Transporting', 13, 'manage-sales', ''),
(55, 'Driver Report', 13, 'driverR', ''),
(56, 'Roles & Menu', 2, 'group', ''),
(57, 'Sales Report', 15, 'sales-report', ''),
(58, 'Purchase & Sales Report', 15, 'sales-purchase', ''),
(59, 'Income Report', 15, 'incomeR', ''),
(60, 'Vehicle Revenue', 15, 'vRevenue', ''),
(61, 'Expenses', 15, 'expensesR', ''),
(62, 'Wages', 15, 'wages', ''),
(63, 'Paid Wages', 15, 'paid_wages', ''),
(64, 'Leads', 11, 'lead', ''),
(65, 'Product Category', 4, 'prd_category', ''),
(66, 'General Ledger', 15, 'general_ledger', '');

-- --------------------------------------------------------

--
-- Table structure for table `menu_permission`
--

CREATE TABLE `menu_permission` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu_permission`
--

INSERT INTO `menu_permission` (`id`, `menu_id`, `status`, `role_id`) VALUES
(1, 1, 1, 1),
(2, 2, 1, 1),
(3, 16, 1, 1),
(4, 17, 1, 1),
(5, 18, 1, 1),
(8, 21, 1, 1),
(9, 30, 1, 1),
(10, 56, 1, 1),
(11, 3, 1, 1),
(12, 23, 1, 1),
(13, 24, 1, 1),
(14, 25, 1, 1),
(15, 4, 1, 1),
(16, 27, 1, 1),
(17, 28, 1, 1),
(18, 29, 1, 1),
(19, 5, 1, 1),
(20, 6, 1, 1),
(21, 31, 1, 1),
(22, 32, 1, 1),
(23, 33, 1, 1),
(24, 7, 1, 1),
(25, 34, 1, 1),
(26, 35, 1, 1),
(27, 36, 1, 1),
(28, 8, 1, 1),
(29, 37, 1, 1),
(31, 39, 1, 1),
(32, 9, 1, 1),
(33, 40, 1, 1),
(34, 41, 1, 1),
(35, 42, 1, 1),
(36, 10, 1, 1),
(37, 43, 1, 1),
(38, 44, 1, 1),
(39, 11, 1, 1),
(40, 45, 1, 1),
(41, 46, 1, 1),
(42, 12, 1, 1),
(43, 48, 1, 1),
(44, 49, 1, 1),
(45, 13, 1, 1),
(46, 53, 1, 1),
(47, 54, 1, 1),
(48, 55, 1, 1),
(49, 14, 1, 1),
(50, 50, 1, 1),
(51, 51, 1, 1),
(52, 52, 1, 1),
(53, 15, 1, 1),
(54, 57, 1, 1),
(55, 58, 1, 1),
(56, 59, 1, 1),
(57, 60, 1, 1),
(58, 61, 1, 1),
(59, 1, 1, 2),
(60, 2, 1, 2),
(61, 16, 1, 2),
(62, 17, 1, 2),
(63, 18, 1, 2),
(66, 21, 1, 2),
(67, 30, 1, 2),
(68, 56, 1, 2),
(69, 3, 1, 2),
(70, 23, 1, 2),
(71, 24, 1, 2),
(72, 25, 1, 2),
(73, 4, 1, 2),
(74, 27, 1, 2),
(75, 28, 1, 2),
(76, 1, 1, 3),
(77, 11, 1, 3),
(78, 45, 1, 3),
(79, 46, 1, 3),
(80, 5, 1, 3),
(81, 1, 1, 4),
(82, 2, 1, 4),
(83, 16, 1, 4),
(84, 17, 1, 4),
(85, 18, 1, 4),
(88, 21, 1, 4),
(89, 30, 1, 4),
(90, 56, 1, 4),
(91, 3, 1, 4),
(92, 23, 1, 4),
(93, 24, 1, 4),
(94, 1, 1, 5),
(95, 2, 1, 5),
(96, 16, 1, 5),
(97, 17, 1, 5),
(98, 18, 1, 5),
(99, 21, 1, 5),
(100, 56, 1, 5),
(101, 3, 1, 5),
(102, 23, 1, 5),
(103, 24, 1, 5),
(104, 25, 1, 5),
(105, 4, 1, 5),
(106, 27, 1, 5),
(107, 28, 1, 5),
(108, 29, 1, 5),
(109, 1, 1, 6),
(110, 2, 1, 6),
(111, 16, 1, 6),
(112, 17, 1, 6),
(113, 18, 1, 6),
(114, 21, 1, 6),
(115, 56, 1, 6),
(116, 3, 1, 6),
(117, 23, 1, 6),
(118, 24, 1, 6),
(119, 62, 1, 1),
(120, 63, 1, 1),
(121, 64, 1, 1),
(122, 65, 1, 1),
(123, 66, 1, 1),
(124, 1, 1, 0),
(125, 2, 1, 0),
(126, 16, 1, 0),
(127, 17, 1, 0),
(128, 18, 1, 0),
(129, 21, 1, 0),
(130, 56, 1, 0),
(131, 3, 1, 0),
(132, 23, 1, 0),
(133, 24, 1, 0),
(134, 25, 1, 0),
(135, 4, 1, 0),
(136, 27, 1, 0),
(137, 28, 1, 0),
(138, 29, 1, 0),
(139, 65, 1, 0),
(140, 5, 1, 0),
(141, 6, 1, 0),
(142, 31, 1, 0),
(143, 32, 1, 0),
(144, 33, 1, 0),
(145, 1, 1, 0),
(146, 2, 1, 0),
(147, 16, 1, 0),
(148, 17, 1, 0),
(149, 18, 1, 0),
(150, 21, 1, 0),
(151, 56, 1, 0),
(152, 3, 1, 0),
(153, 23, 1, 0),
(154, 24, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `message` text COLLATE utf8_unicode_ci NOT NULL,
  `time` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `receiver` int(11) NOT NULL,
  `storage_a` int(11) NOT NULL,
  `storage_b` int(11) NOT NULL,
  `Project_id` int(255) NOT NULL,
  `status` varchar(6) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `milestones`
--

CREATE TABLE `milestones` (
  `id` int(255) NOT NULL,
  `p_id` int(255) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `deadline` date NOT NULL,
  `releaseDate` date DEFAULT NULL,
  `budget` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `m_activity`
--

CREATE TABLE `m_activity` (
  `id` int(11) NOT NULL,
  `sales_id` varchar(20) DEFAULT NULL,
  `cust_name` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `staffid` varchar(11) DEFAULT NULL,
  `total` varchar(100) DEFAULT NULL,
  `date` varchar(255) DEFAULT NULL,
  `marketer` int(11) DEFAULT NULL,
  `sales_status` tinyint(1) DEFAULT NULL COMMENT '1=sold,0=Not sold',
  `note` text DEFAULT NULL,
  `discount` varchar(50) DEFAULT NULL,
  `net_amount` varchar(50) DEFAULT NULL,
  `engr` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `m_activity`
--

INSERT INTO `m_activity` (`id`, `sales_id`, `cust_name`, `address`, `phone`, `staffid`, `total`, `date`, `marketer`, `sales_status`, `note`, `discount`, `net_amount`, `engr`) VALUES
(1, 'BUF-CRE-4834', 'Tade Engr Tunde', 'Abraham Adesanya, Ajah Lagos', '09088890900', '1', NULL, '1617581977', NULL, 1, NULL, NULL, NULL, NULL),
(2, 'BUF-CRE-3239', 'Grace', 'Ajah Lagos', '09076544400', '1', NULL, '1617600467', NULL, 1, 'This is a small note<br>', NULL, NULL, 'John Doe'),
(3, 'BUF-CRE-994C', 'Mutolib', 'Igbesa, Ogun state', '09023234321', '1', NULL, '1622828964', NULL, 1, 'I am buying things', NULL, NULL, 'sodiq'),
(4, 'BUF-CRE-7330', 'David', 'Ajah', '09087654321', '1', NULL, '1623163083', NULL, 1, 'The customer is interested in the following:<br><ul><li>Block</li><li>Cement</li></ul><br>', NULL, NULL, 'John'),
(5, 'BUF-CRE-8504', 'sodi', 'gibes, Ogun state', '9099999999', '1', NULL, '1623321771', NULL, 1, 'hello', NULL, NULL, 'soda'),
(6, 'BUF-CRE-03BF', 'hello', 'jjj', '9999', '1', NULL, '1623321869', NULL, 1, 'jjjjj', NULL, NULL, 'llll');

-- --------------------------------------------------------

--
-- Table structure for table `notes`
--

CREATE TABLE `notes` (
  `id` int(11) NOT NULL,
  `rel_id` int(11) NOT NULL,
  `rel_type` varchar(20) NOT NULL,
  `description` text DEFAULT NULL,
  `date_contacted` datetime DEFAULT NULL,
  `addedfrom` int(11) NOT NULL,
  `dateadded` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(11) NOT NULL,
  `isread` int(11) NOT NULL DEFAULT 0,
  `isread_inline` tinyint(1) NOT NULL DEFAULT 0,
  `date` datetime NOT NULL,
  `description` text NOT NULL,
  `fromuserid` int(11) NOT NULL,
  `fromclientid` int(11) NOT NULL DEFAULT 0,
  `from_fullname` varchar(100) NOT NULL,
  `touserid` int(11) NOT NULL,
  `fromcompany` int(11) DEFAULT NULL,
  `link` mediumtext DEFAULT NULL,
  `additional_data` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `payment_modes`
--

CREATE TABLE `payment_modes` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text DEFAULT NULL,
  `show_on_pdf` int(11) NOT NULL DEFAULT 0,
  `invoices_only` int(11) NOT NULL DEFAULT 0,
  `expenses_only` int(11) NOT NULL DEFAULT 0,
  `selected_by_default` int(11) NOT NULL DEFAULT 1,
  `active` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `product` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `standard` varchar(255) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `cost` int(11) DEFAULT NULL,
  `created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `product`, `type`, `standard`, `price`, `cost`, `created`) VALUES
(1, 'Sand', 'High', 'High', 35000, 40000, '2021-02-20'),
(2, 'Stone Dust', 'Medium', 'High', 120000, 180000, '2021-02-20');

-- --------------------------------------------------------

--
-- Table structure for table `production`
--

CREATE TABLE `production` (
  `id` int(11) NOT NULL,
  `code` varchar(20) DEFAULT NULL,
  `product` varchar(255) DEFAULT NULL,
  `operator` int(11) DEFAULT NULL,
  `produced` int(11) DEFAULT NULL,
  `unitPrice` int(11) DEFAULT NULL,
  `inputcost` bigint(20) DEFAULT NULL,
  `outputprice` bigint(20) DEFAULT NULL,
  `user` int(11) DEFAULT NULL,
  `created` date DEFAULT NULL,
  `outputqty` int(11) DEFAULT NULL,
  `available_prd` int(9) DEFAULT NULL,
  `inputqty` int(11) DEFAULT NULL,
  `status` tinyint(1) DEFAULT 0 COMMENT '1=''finished'', 0=''Unfinished''',
  `payment` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `production`
--

INSERT INTO `production` (`id`, `code`, `product`, `operator`, `produced`, `unitPrice`, `inputcost`, `outputprice`, `user`, `created`, `outputqty`, `available_prd`, `inputqty`, `status`, `payment`) VALUES
(1, '9CK7HY3', '2', 48, 80, 4000, 42000, NULL, 1, '2021-06-09', 400, 400, NULL, 1, 0),
(2, 'KRJNXY0', '4', 48, 3, 3000, NULL, NULL, 1, '2021-06-10', 3, -1001, NULL, 1, 0),
(3, 'KRJNXY6', '4', 43, 40, 1000, 3000, 30000, 1, '2021-07-14', 30, 30, 4, 1, 1),
(4, 'S6E3ZCF', '6', 42, 6000, NULL, 120000, NULL, 1, '2021-07-15', 6000, -10, NULL, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `product_category`
--

CREATE TABLE `product_category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `payment_mode` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_category`
--

INSERT INTO `product_category` (`id`, `name`, `payment_mode`, `amount`) VALUES
(3, 'Lock n Align', 'Per Product', '120'),
(4, 'Wheel Barrow', 'Per Product', '200'),
(5, 'Block', 'Per Product', '140'),
(6, 'Test', 'Per Product', '100');

-- --------------------------------------------------------

--
-- Table structure for table `profile_pics`
--

CREATE TABLE `profile_pics` (
  `id` int(11) NOT NULL,
  `fkUserId` int(11) NOT NULL,
  `filename` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `size` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `createdDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `p_id` int(11) NOT NULL,
  `customer` int(11) DEFAULT NULL,
  `createdby` int(11) DEFAULT NULL,
  `s_ids` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `project_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `project_desc` varchar(1200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `budget` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '0=pending,1=ongoing,=completed',
  `start` date DEFAULT NULL,
  `end` date DEFAULT NULL,
  `cost` int(11) DEFAULT NULL,
  `created` date DEFAULT NULL,
  `descr` text COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`p_id`, `customer`, `createdby`, `s_ids`, `project_title`, `project_desc`, `budget`, `status`, `start`, `end`, `cost`, `created`, `descr`) VALUES
(1, 3, 1, NULL, 'Test', NULL, NULL, '1', '2021-02-23', '2021-02-27', NULL, '2021-02-22', 'This is the project description'),
(2, 2, 1, NULL, 'new project', NULL, NULL, '2', '2021-03-29', '2021-04-04', NULL, '2021-03-25', 'tt'),
(3, NULL, 5, NULL, NULL, NULL, NULL, '1', NULL, '2021-05-29', NULL, '2021-05-19', 'hh'),
(4, 14, 1, NULL, 'today', NULL, NULL, '0', '2021-06-19', '2021-07-11', NULL, '2021-06-02', 'n'),
(5, 18, 1, NULL, 'Sodiq Review project', NULL, NULL, '1', '2021-06-03', '2021-07-10', NULL, '2021-06-03', 'dkdjkdj');

-- --------------------------------------------------------

--
-- Table structure for table `project_activity`
--

CREATE TABLE `project_activity` (
  `id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `staff_id` int(11) NOT NULL DEFAULT 0,
  `contact_id` int(11) NOT NULL DEFAULT 0,
  `fullname` varchar(100) DEFAULT NULL,
  `visible_to_customer` int(11) NOT NULL DEFAULT 0,
  `description_key` varchar(191) NOT NULL COMMENT 'Language file key',
  `additional_data` text DEFAULT NULL,
  `dateadded` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `project_files`
--

CREATE TABLE `project_files` (
  `id` int(11) NOT NULL,
  `file_name` varchar(191) NOT NULL,
  `subject` varchar(191) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `filetype` varchar(50) DEFAULT NULL,
  `dateadded` datetime NOT NULL,
  `last_activity` datetime DEFAULT NULL,
  `project_id` int(11) NOT NULL,
  `visible_to_customer` tinyint(1) DEFAULT 0,
  `staffid` int(11) NOT NULL,
  `contact_id` int(11) NOT NULL DEFAULT 0,
  `external` varchar(40) DEFAULT NULL,
  `external_link` text DEFAULT NULL,
  `thumbnail_link` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `project_members`
--

CREATE TABLE `project_members` (
  `id` int(11) NOT NULL,
  `p_id` int(11) DEFAULT NULL,
  `staff` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `project_members`
--

INSERT INTO `project_members` (`id`, `p_id`, `staff`) VALUES
(1, 1, 2),
(2, 1, 3),
(3, 1, 4),
(4, 1, 2),
(5, 2, 2),
(6, 2, 1),
(7, 1, 14),
(8, 1, 42),
(9, 2, 42),
(10, 2, 49);

-- --------------------------------------------------------

--
-- Table structure for table `project_notes`
--

CREATE TABLE `project_notes` (
  `id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `staff_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `proposals`
--

CREATE TABLE `proposals` (
  `id` int(11) NOT NULL,
  `subject` varchar(191) DEFAULT NULL,
  `content` longtext DEFAULT NULL,
  `addedfrom` int(11) NOT NULL,
  `datecreated` datetime NOT NULL,
  `total` decimal(15,2) DEFAULT NULL,
  `subtotal` decimal(15,2) NOT NULL,
  `total_tax` decimal(15,2) NOT NULL DEFAULT 0.00,
  `adjustment` decimal(15,2) DEFAULT NULL,
  `discount_percent` decimal(15,2) NOT NULL,
  `discount_total` decimal(15,2) NOT NULL,
  `discount_type` varchar(30) DEFAULT NULL,
  `show_quantity_as` int(11) NOT NULL DEFAULT 1,
  `currency` int(11) NOT NULL,
  `open_till` date DEFAULT NULL,
  `date` date NOT NULL,
  `rel_id` int(11) DEFAULT NULL,
  `rel_type` varchar(40) DEFAULT NULL,
  `assigned` int(11) DEFAULT NULL,
  `hash` varchar(32) NOT NULL,
  `proposal_to` varchar(191) DEFAULT NULL,
  `country` int(11) NOT NULL DEFAULT 0,
  `zip` varchar(50) DEFAULT NULL,
  `state` varchar(100) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `allow_comments` tinyint(1) NOT NULL DEFAULT 1,
  `status` int(11) NOT NULL,
  `estimate_id` int(11) DEFAULT NULL,
  `invoice_id` int(11) DEFAULT NULL,
  `date_converted` datetime DEFAULT NULL,
  `pipeline_order` int(11) NOT NULL DEFAULT 0,
  `is_expiry_notified` int(11) NOT NULL DEFAULT 0,
  `acceptance_firstname` varchar(50) DEFAULT NULL,
  `acceptance_lastname` varchar(50) DEFAULT NULL,
  `acceptance_email` varchar(100) DEFAULT NULL,
  `acceptance_date` datetime DEFAULT NULL,
  `acceptance_ip` varchar(40) DEFAULT NULL,
  `signature` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `proposal_comments`
--

CREATE TABLE `proposal_comments` (
  `id` int(11) NOT NULL,
  `content` mediumtext DEFAULT NULL,
  `proposalid` int(11) NOT NULL,
  `staffid` int(11) NOT NULL,
  `dateadded` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `rawmaterial`
--

CREATE TABLE `rawmaterial` (
  `id` int(11) NOT NULL,
  `material` varchar(255) DEFAULT NULL,
  `cost` int(11) DEFAULT NULL,
  `unit` varchar(50) DEFAULT NULL,
  `created` date DEFAULT NULL,
  `qty` int(11) NOT NULL,
  `costprice` varchar(255) DEFAULT NULL,
  `branch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rawmaterial`
--

INSERT INTO `rawmaterial` (`id`, `material`, `cost`, `unit`, `created`, `qty`, `costprice`, `branch`) VALUES
(1, 'Sand', 40000, '2', '2021-02-18', 33, '400000', 0),
(2, 'Cement', 2800, '3', '2021-02-22', 8, '28000', 0),
(3, 'Iron Plate', 50000, '1', '2021-03-05', 47, '500000', 0),
(5, 'Bricks', 200, '1', '2021-03-05', 10, '2000', 0),
(6, 'Tyre', 1000, '1', '2021-03-25', 199, '100000', 0),
(7, 'Tyre', 20000, '1', '2021-03-31', 100, '2000000', 0),
(8, 'sharp sand', 50000, '2', '2021-04-16', 2, '100000', 0),
(9, 'to branch', 4000, '1', '2021-04-28', 20, '80000', 0),
(10, 'to branch', 1000, '1', '2021-04-28', 2, '2000', 1),
(11, 'sharp sand', 7000, '2', '2021-06-01', 498, '3500000', 1),
(12, 'sharp sand', 45, NULL, '2021-06-02', 1, '4000', 1),
(13, 'stone dust', 4000, '3', '2021-06-03', 20, '80000', 15),
(14, 'Steel', 300, '4', '2021-06-04', 30, '9000', 14);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `role` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `role`) VALUES
(1, 'Admin'),
(2, 'Human Resources Manager'),
(3, 'Sales Person'),
(4, 'Production Manager'),
(5, 'Accountant'),
(6, 'Test'),
(7, 'driver'),
(8, 'Testing');

-- --------------------------------------------------------

--
-- Table structure for table `sales_activity`
--

CREATE TABLE `sales_activity` (
  `id` int(11) NOT NULL,
  `sales_id` varchar(20) DEFAULT NULL,
  `cust_name` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `staffid` varchar(11) DEFAULT NULL,
  `total` varchar(100) DEFAULT NULL,
  `date` varchar(255) DEFAULT NULL,
  `marketer` int(11) DEFAULT NULL,
  `sales_status` tinyint(1) DEFAULT NULL COMMENT '1=sold,0=Not sold',
  `note` text DEFAULT NULL,
  `discount` varchar(50) DEFAULT NULL,
  `net_amount` varchar(50) DEFAULT NULL,
  `month` int(11) DEFAULT NULL,
  `year` int(11) DEFAULT NULL,
  `day` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sales_activity`
--

INSERT INTO `sales_activity` (`id`, `sales_id`, `cust_name`, `address`, `phone`, `staffid`, `total`, `date`, `marketer`, `sales_status`, `note`, `discount`, `net_amount`, `month`, `year`, `day`) VALUES
(1, 'BUF-CRE-07FF', 'Mutolib Akinpelumi', 'sunmola estate, itekun road', '07068581708', '1', '9000', '1615460412', NULL, NULL, NULL, '0', '9000', 1, 2019, 10),
(2, 'BUF-CRE-D3FA', 'Test test', 'Ajah', '09087634525', '1', '38000', '1615498078', NULL, NULL, NULL, '500', '37500', 1, 2020, 5),
(3, 'BUF-CRE-2A20', 'Sodiq Akin', 'Ajah  Lagos', '09090988998', '1', '10500', '1615513196', NULL, NULL, NULL, '1000', '9500', 2, 2020, 6),
(4, 'BUF-CRE-1D53', 'Sodiq Akin', 'Ajah  Lagos', '09090988998', '1', '10500', '1615513275', NULL, NULL, NULL, '0', '10500', 2, 2020, 7),
(5, 'BUF-CRE-454C', 'Mary Ojo', 'Abijo, Ajah Lagos State', '00123456789', '1', '19500', '1615514916', NULL, NULL, NULL, '500', '19000', 3, 2021, 10),
(6, 'BUF-CRE-E037', 'Hannah Ojo', 'Abijo Ajah Lagos', '0901234567', '1', '9000', '1615515165', NULL, NULL, NULL, NULL, '9000', 3, 2021, 5),
(7, 'BUF-CRE-2184', 'test test', 'Ajah', '09099999999', '1', '900', '1615515256', NULL, NULL, NULL, NULL, '900', 3, 2021, 6),
(18, 'BUF-CRE-000C', 'Sodiq Sodiq', 'kkk', '09098765432', '1', '5800.00', '1617254715', 1, 1, 'kkk', '800', '5000', 4, 2021, 5),
(21, 'BUF-CRE-C701', 'Mutolibs today', 'sunmola estate, itekun road', '07068581708', '1', '59000', '1618554241', NULL, 1, NULL, '500', '58500', 4, 2021, 6),
(22, 'BUF-CRE-027D', 'Mutolib Akinpelumi', 'sunmola estate, itekun road', '07068581708', '1', '200', '1618586639', NULL, 1, NULL, NULL, NULL, 4, 2021, 16),
(23, 'BUF-CRE-CAAF', 'Mutolib Akinpelumi', 'sunmola estate, itekun road', '07068581708', '1', '1500', '1618650151', NULL, 1, NULL, '50', '1450', 4, 2021, 17),
(24, 'BUF-CRE-C5B0', 'Mutolib Akinpelumi', 'sunmola estate, itekun road', '07068581708', '1', '56000', '1622732631', NULL, 1, NULL, '1000', '55000', 6, 2021, 3),
(25, 'BUF-CRE-978C', 'Sodiq Akinpelumi', 'sunmola estate, itekun road', '07068581708', '42', '16000', '1622792876', NULL, 1, NULL, '200', '15800', 6, 2021, 4),
(26, 'BUF-CRE-40F6', 'Mutolib Akinpelumi', 'sunmola estate, itekun road', '07068581708', '1', '9000', '1622808119', NULL, 1, NULL, '', '9000', 6, 2021, 4),
(27, 'BUF-CRE-5B23', 'Solomon Ojo', 'Abijo', '07098765432', '1', '10000000', '1623162762', NULL, 1, NULL, '10000', '10080000', 6, 2021, 8),
(28, 'BUF-CRE-4474', 'Mutolib Akinpelumi', 'sunmola estate, itekun road', '07068581708', '1', '1280', '1625123962', NULL, 1, NULL, '', '1280', 7, 2021, 1),
(29, 'BUF-CRE-ACC6', 'Mutolib Akinpelumi', 'sunmola estate, itekun road', '07068581708', '1', '11000', '1626264191', NULL, 1, NULL, '', '11000', 7, 2021, 14),
(30, 'BUF-CRE-1087', 'Mutolib Akinpelumi', 'sunmola estate, itekun road', '07068581708', '1', '17000', '1626264280', NULL, 1, NULL, '', '17000', 7, 2021, 14),
(31, 'BUF-CRE-0F05', 'David David', 'Abijo Lagos', '09099900090', '1', '4030000', '1626777074', NULL, 1, NULL, '2', '4029998', 7, 2021, 20);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(10) NOT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `company_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `syatem_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `login_page_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `copy_rights` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `system_currency` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `time_zone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `favicon_image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `login_page_logo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `logo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mobile_logo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `stripe_sk` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `stripe_pk` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `paypal_email` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `checkout_id` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `checkout_pk` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `system_email` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `forget_email` text COLLATE utf8_unicode_ci NOT NULL,
  `create_account_email` text COLLATE utf8_unicode_ci NOT NULL,
  `project_assign_email` text COLLATE utf8_unicode_ci NOT NULL,
  `assign_staff_email` text COLLATE utf8_unicode_ci NOT NULL,
  `project_update_email` text COLLATE utf8_unicode_ci NOT NULL,
  `system_language` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `version` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `purchase_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `url`, `company_name`, `syatem_title`, `login_page_title`, `copy_rights`, `system_currency`, `time_zone`, `favicon_image`, `login_page_logo`, `logo`, `mobile_logo`, `stripe_sk`, `stripe_pk`, `paypal_email`, `checkout_id`, `checkout_pk`, `system_email`, `forget_email`, `create_account_email`, `project_assign_email`, `assign_staff_email`, `project_update_email`, `system_language`, `version`, `purchase_code`) VALUES
(1, 'localhost/project', 'Hybridsoft', 'Hybrid Project', 'Login', '@hybridsoft', '₦', 'Africa/Lagos', '', '', '', '', '', '', '', '', '', 'admin@admin.com', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `sold_items`
--

CREATE TABLE `sold_items` (
  `id` int(9) NOT NULL,
  `product` int(9) NOT NULL,
  `quantity` int(9) NOT NULL,
  `sales_id` varchar(15) DEFAULT NULL,
  `unitPrice` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sold_items`
--

INSERT INTO `sold_items` (`id`, `product`, `quantity`, `sales_id`, `unitPrice`) VALUES
(1, 4, 1, 'BUF-CRE-07FF', '9000.00'),
(2, 2, 20, 'BUF-CRE-D3FA', '1000.00'),
(3, 4, 2, 'BUF-CRE-D3FA', '9000.00'),
(4, 4, 1, 'BUF-CRE-2A20', '9000.00'),
(5, 3, 3, 'BUF-CRE-2A20', '500.00'),
(6, 4, 1, 'BUF-CRE-1D53', '9000.00'),
(7, 3, 3, 'BUF-CRE-1D53', '500.00'),
(8, 4, 2, 'BUF-CRE-454C', '9000.00'),
(9, 3, 3, 'BUF-CRE-454C', '500.00'),
(10, 5, 10, 'BUF-CRE-E037', '900.00'),
(11, 5, 1, 'BUF-CRE-2184', '900.00'),
(12, 3, 1, 'BUF-CRE-4260', '500.00'),
(13, 3, 1, 'BUF-CRE-7024', '500.00'),
(14, 3, 1, 'BUF-CRE-2814', '500.00'),
(15, 5, 1, 'BUF-CRE-471F', '900.00'),
(16, 4, 1, 'BUF-CRE-F7A8', '9000.00'),
(17, 5, 1, 'BUF-CRE-C8DD', '900.00'),
(18, 3, 1, 'BUF-CRE-0DB0', '500.00'),
(19, 3, 1, 'BUF-CRE-766C', '500.00'),
(20, 3, 1, 'BUF-CRE-2C8D', '500.00'),
(21, 3, 4, 'BUF-CRE-000c', '500.00'),
(22, 5, 2, 'BUF-CRE-000C', '900.00'),
(23, 2, 2, 'BUF-CRE-000C', '1000.00'),
(24, 4, 2, 'BUF-CRE-B838', '9000.00'),
(25, 4, 1, 'BUF-CRE-A5B3', '9000.00'),
(26, 4, 3, 'BUF-CRE-C701', '9000.00'),
(27, 1, 4, 'BUF-CRE-C701', '8000.00'),
(28, 7, 1, 'BUF-CRE-027D', '200.00'),
(29, 3, 3, 'BUF-CRE-CAAF', '500.00'),
(30, 4, 6, 'BUF-CRE-C5B0', '9000.00'),
(31, 2, 2, 'BUF-CRE-C5B0', '1000.00'),
(32, 6, 3, 'BUF-CRE-978C', '4000.00'),
(33, 2, 4, 'BUF-CRE-978C', '1000.00'),
(34, 4, 1, 'BUF-CRE-40F6', '9000.00'),
(35, 2, 10000, 'BUF-CRE-5B23', '1000.00'),
(36, 3, 5, 'BUF-CRE-4474', '160.00'),
(37, 3, 3, 'BUF-CRE-4474', '160.00'),
(38, 4, 1, 'BUF-CRE-ACC6', '3000.00'),
(39, 2, 2, 'BUF-CRE-ACC6', '4000.00'),
(40, 2, 2, 'BUF-CRE-1087', '4000.00'),
(41, 4, 3, 'BUF-CRE-1087', '3000.00'),
(42, 4, 10, 'BUF-CRE-0F05', '3000.00'),
(43, 2, 1000, 'BUF-CRE-0F05', '4000.00');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `staffid` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `facebook` mediumtext DEFAULT NULL,
  `linkedin` mediumtext DEFAULT NULL,
  `phonenumber` varchar(30) DEFAULT NULL,
  `skype` varchar(50) DEFAULT NULL,
  `password` varchar(250) NOT NULL,
  `datecreated` datetime NOT NULL,
  `profile_image` varchar(191) DEFAULT NULL,
  `last_ip` varchar(40) DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  `last_activity` datetime DEFAULT NULL,
  `last_password_change` datetime DEFAULT NULL,
  `new_pass_key` varchar(32) DEFAULT NULL,
  `new_pass_key_requested` datetime DEFAULT NULL,
  `admin` int(11) NOT NULL DEFAULT 0,
  `role` int(11) DEFAULT NULL,
  `active` int(11) NOT NULL DEFAULT 1,
  `default_language` varchar(40) DEFAULT NULL,
  `direction` varchar(3) DEFAULT NULL,
  `media_path_slug` varchar(191) DEFAULT NULL,
  `is_not_staff` int(11) NOT NULL DEFAULT 0,
  `hourly_rate` decimal(15,2) NOT NULL DEFAULT 0.00,
  `two_factor_auth_enabled` tinyint(1) DEFAULT 0,
  `two_factor_auth_code` varchar(100) DEFAULT NULL,
  `two_factor_auth_code_requested` datetime DEFAULT NULL,
  `email_signature` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sub_menu`
--

CREATE TABLE `sub_menu` (
  `id` int(11) NOT NULL,
  `menuid` varchar(255) NOT NULL,
  `submenu` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sub_menu`
--

INSERT INTO `sub_menu` (`id`, `menuid`, `submenu`, `link`) VALUES
(1, '2', 'Staff', 'staff'),
(2, '2', 'Customer', 'customer'),
(3, '3', 'Products', 'product'),
(4, '3', 'Material', 'material'),
(5, '3', 'Materials Unit', 'materialUnit'),
(6, '2', 'Suppliers', 'supplier'),
(7, '2', 'Drivers', 'driver'),
(8, '2', 'Marketer', 'marketer'),
(9, '2', 'Other Staffs', 'staff'),
(10, '2', 'Branch', 'branch'),
(11, '4', 'New Products', 'production'),
(12, '4', 'Manage Production', 'manageProduction'),
(13, '4', 'Raw Materials', 'rawMaterial'),
(14, '6', 'All Project', 'project'),
(15, '6', 'Completed Project', 'cproject'),
(16, '6', 'Ongoing Project', 'onproject'),
(17, '7', 'Sold Products', 'sold-product'),
(18, '7', 'Produced Products', 'produced-product'),
(19, '7', 'Used Materials', 'used-material'),
(20, '8', 'View Expenses', 'expenses'),
(21, '8', 'Create Expenses', 'create-expenses'),
(22, '8', 'Expenses Category', 'ecategory'),
(23, '9', 'All Tasks', 'task'),
(24, '9', 'Completed Tasks', 'ctask'),
(25, '9', 'Pending Tasks', 'ptask'),
(26, '10', 'Create Assets', 'create-assets'),
(27, '10', 'Manage Assets', 'manageAssets'),
(28, '11', 'Create Sales', 'sales'),
(29, '11', 'Manage Sales', 'manage-sales'),
(30, '12', 'Manage Activities', 'Mactivity'),
(31, '12', 'Create Activity', 'marketing'),
(32, '13', 'Delivery Reports', 'transportLog'),
(33, '13', 'Transporting', 'transporting'),
(34, '13', 'Driver Report', 'driverR'),
(35, '14', 'All Ticket', 'ticket'),
(36, '14', 'Open Ticket', 'open'),
(37, '14', 'Closed', 'close'),
(38, '15', 'Sales Report', 'sales-report'),
(39, '15', 'Purchase & Sales Report', 'sales-purchase'),
(40, '15', 'Income Report', 'incomeR'),
(41, '15', 'Vehicle Revenue', 'vRevenue'),
(42, '15', 'Expense Report', 'expenseR'),
(43, '15', 'P/L', 'profitR');

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `contactname` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `web` varchar(255) NOT NULL,
  `notes` longtext CHARACTER SET utf8mb4 NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` int(11) NOT NULL,
  `p_id` varchar(11) DEFAULT NULL,
  `name` mediumtext DEFAULT NULL,
  `assign` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `priority` varchar(50) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `start` date DEFAULT NULL,
  `end` date DEFAULT NULL,
  `finished` datetime DEFAULT NULL,
  `addedfrom` int(11) DEFAULT NULL,
  `is_added_from_contact` tinyint(1) NOT NULL DEFAULT 0,
  `status` int(11) NOT NULL DEFAULT 0 COMMENT '0=pending,1=ongoing,=completed',
  `recurring_type` varchar(10) DEFAULT NULL,
  `repeat_every` int(11) DEFAULT NULL,
  `invoice_id` int(11) NOT NULL DEFAULT 0,
  `milestone` int(11) NOT NULL DEFAULT 0,
  `milestone_order` int(11) NOT NULL DEFAULT 0,
  `visible_to_client` tinyint(1) NOT NULL DEFAULT 0,
  `deadline_notified` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `p_id`, `name`, `assign`, `description`, `priority`, `created`, `start`, `end`, `finished`, `addedfrom`, `is_added_from_contact`, `status`, `recurring_type`, `repeat_every`, `invoice_id`, `milestone`, `milestone_order`, `visible_to_client`, `deadline_notified`) VALUES
(2, 'BUF-TSK-0E7', 'Project Task', NULL, 'Description', 'High', '2021-02-22 00:00:00', '2021-02-23', '2021-02-24', NULL, NULL, 0, 2, NULL, NULL, 0, 0, 0, 0, 0),
(3, 'BUF-TSK-CD0', 'Test Task', NULL, '', 'High', '2021-02-24 00:00:00', '2021-02-24', '2021-02-27', NULL, NULL, 0, 0, NULL, NULL, 0, 0, 0, 0, 0),
(6, 'BUF-TSK-98A', 'Window Construction', NULL, '20 Pieces of Aluminum windows are to be completed on or before deadline', 'High', '2021-04-17 00:00:00', '2021-04-17', '2021-05-08', NULL, NULL, 0, 1, NULL, NULL, 0, 0, 0, 0, 0),
(7, '1', 'Task with Progress', NULL, 'd', 'Medium', '2021-06-03 00:00:00', '2021-06-03', '2021-06-06', NULL, NULL, 0, 0, NULL, NULL, 0, 0, 0, 0, 0),
(8, '1', 'Update now working', 'Mutolib Akinpelumi', 'n', 'Medium', '2021-06-03 00:00:00', '2021-06-26', '2021-06-03', NULL, NULL, 0, 0, NULL, NULL, 0, 0, 0, 0, 0),
(9, '1', 'Update now working', 'Mutolib Akinpelumi', 'd', 'Medium', '2021-06-03 00:00:00', '2021-06-03', '2021-07-10', NULL, NULL, 0, 0, NULL, NULL, 0, 0, 0, 0, 0),
(10, '2', 'new task', 'Ayinde Asafe', 'Mould 2 bags block', 'Medium', '2021-06-04 00:00:00', '2021-06-04', '2021-06-12', NULL, NULL, 0, 0, NULL, NULL, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `task_assigned`
--

CREATE TABLE `task_assigned` (
  `id` int(11) NOT NULL,
  `staffid` varchar(11) NOT NULL,
  `taskid` varchar(11) NOT NULL,
  `assigned_from` int(11) NOT NULL DEFAULT 0,
  `is_assigned_from_contact` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `task_assigned`
--

INSERT INTO `task_assigned` (`id`, `staffid`, `taskid`, `assigned_from`, `is_assigned_from_contact`) VALUES
(3, '2', 'BUF-TSK-98A', 0, 0),
(4, '2', 'BUF-TSK-98A', 0, 0),
(5, '4', 'BUF-TSK-CD0', 0, 0),
(6, '2', 'BUF-TSK-CD0', 0, 0),
(7, '4', 'BUF-TSK-0E7', 0, 0),
(8, '8', 'BUF-TSK-0E7', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `task_comments`
--

CREATE TABLE `task_comments` (
  `id` int(11) NOT NULL,
  `content` text NOT NULL,
  `taskid` int(11) NOT NULL,
  `staffid` int(11) NOT NULL,
  `contact_id` int(11) NOT NULL DEFAULT 0,
  `file_id` int(11) NOT NULL DEFAULT 0,
  `dateadded` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `taxes`
--

CREATE TABLE `taxes` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `taxrate` decimal(15,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ticket`
--

CREATE TABLE `ticket` (
  `id` int(11) NOT NULL,
  `user_id` varchar(25) DEFAULT NULL,
  `subject` varchar(35) DEFAULT NULL,
  `customer` varchar(45) DEFAULT NULL,
  `department` varchar(35) DEFAULT NULL,
  `email` varchar(35) DEFAULT NULL,
  `branch` varchar(25) DEFAULT NULL,
  `note` text DEFAULT NULL,
  `file` varchar(100) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ticket`
--

INSERT INTO `ticket` (`id`, `user_id`, `subject`, `customer`, `department`, `email`, `branch`, `note`, `file`, `status`, `created`) VALUES
(5, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(6, '1', 'new subject', 'Mutolib sodiq Akinpelumi', NULL, NULL, NULL, NULL, NULL, 0, NULL),
(7, '1', 'Agricultural Science', 'Mutolib sodiq Akinpelumi', 'Sales Person', 'younghallajinoni@gmail.com', NULL, NULL, NULL, 0, NULL),
(8, '1', 'Agricultural Science', 'Mutolib sodiq Akinpelumi', 'Human Resources Manager', 'younghallajinoni@gmail.com', NULL, '&lt;p&gt;ss&lt;/p&gt;', NULL, 0, NULL),
(9, '1', 'Agricultural Science', 'Mutolib sodiq Akinpelumi', 'Human Resources Manager', 'younghallajinoni@gmail.com', NULL, '&lt;p&gt;ss&lt;/p&gt;', NULL, 0, '2021-06-04 20:06:09'),
(10, '1', 'Hello', 'Sodiq', 'HRM', 'y@m.com', '1', 'Hello', NULL, 1, '2020-11-09 00:00:00'),
(11, '1', 'Agricultural Science', 'Mutolib sodiq Akinpelumi', 'Human Resources Manager', 'younghallajinoni@gmail.com', '7xrrcgyr', '&lt;p&gt;ss&lt;/p&gt;', NULL, 0, '2021-06-04 20:06:47'),
(12, '1', 'Agricultural Science', 'Mutolib sodiq Akinpelumi', 'Human Resources Manager', 'younghallajinoni@gmail.com', '7xrrcgyr', '&lt;p&gt;djkdjkdjssl&lt;/p&gt;', NULL, 0, '2021-06-04 20:06:53');

-- --------------------------------------------------------

--
-- Table structure for table `tickets_status`
--

CREATE TABLE `tickets_status` (
  `ticketstatusid` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `isdefault` int(11) NOT NULL DEFAULT 0,
  `statuscolor` varchar(7) DEFAULT NULL,
  `statusorder` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tickets_status`
--

INSERT INTO `tickets_status` (`ticketstatusid`, `name`, `isdefault`, `statuscolor`, `statusorder`) VALUES
(1, 'Open', 1, '#ff2d42', 1),
(2, 'In progress', 1, '#84c529', 2),
(3, 'Answered', 1, '#0000ff', 3),
(4, 'On Hold', 1, '#c0c0c0', 4),
(5, 'Closed', 1, '#03a9f4', 5);

-- --------------------------------------------------------

--
-- Table structure for table `ticket_replies`
--

CREATE TABLE `ticket_replies` (
  `id` int(11) NOT NULL,
  `ticketid` int(11) NOT NULL,
  `userid` int(11) DEFAULT NULL,
  `contactid` int(11) NOT NULL DEFAULT 0,
  `name` text DEFAULT NULL,
  `email` text DEFAULT NULL,
  `date` datetime NOT NULL,
  `message` text DEFAULT NULL,
  `attachment` int(11) DEFAULT NULL,
  `admin` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `todos`
--

CREATE TABLE `todos` (
  `todoid` int(11) NOT NULL,
  `description` text NOT NULL,
  `staffid` int(11) NOT NULL,
  `dateadded` datetime NOT NULL,
  `finished` tinyint(1) NOT NULL,
  `datefinished` datetime DEFAULT NULL,
  `item_order` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `transport`
--

CREATE TABLE `transport` (
  `id` int(11) NOT NULL,
  `sales_id` varchar(50) DEFAULT NULL,
  `cust_name` varchar(255) DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `driver_id` int(11) DEFAULT NULL,
  `driver` varchar(255) DEFAULT NULL,
  `destination` text DEFAULT NULL,
  `created` date DEFAULT NULL,
  `status` varchar(20) DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transport`
--

INSERT INTO `transport` (`id`, `sales_id`, `cust_name`, `amount`, `driver_id`, `driver`, `destination`, `created`, `status`) VALUES
(1, 'BUF-CRE-000C', 'Sodiq Sodiq', 20000, 9, 'AbdulHammed Ridwan Sodiq', 'Ajah', '2021-04-03', 'Pending'),
(2, 'BUF-CRE-2184', 'test test', 30000, 9, 'AbdulHammed Ridwan Sodiq', 'Ajah', '2021-04-03', 'Pending'),
(3, 'BUF-CRE-2C8D', 'AbdulHammed Ridwan Sodiq', 30000, 8, 'Sodiq Sodiq', 'Abijo', '2021-04-03', 'Pending'),
(4, 'BUF-CRE-E037', 'Hannah Ojo', 10000, 8, 'Sodiq Sodiq', 'Abijo', '2021-04-03', 'Pending'),
(5, 'BUF-CRE-000C', 'Sodiq Sodiq', 5000, 9, 'AbdulHammed Ridwan Sodiq', 'awoyaya', '2021-04-14', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

CREATE TABLE `units` (
  `id` int(11) NOT NULL,
  `unit` varchar(50) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `created` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`id`, `unit`, `name`, `created`) VALUES
(3, 'Bag', 'Bags', '2021-03-31'),
(4, 'plate', 'plates', '2021-06-01'),
(5, 'mm', 'Millimeter', '2021-06-04'),
(6, 'Tons', 'Sand', '2021-07-15');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fname` varchar(100) DEFAULT NULL,
  `lname` varchar(100) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `password` varchar(150) DEFAULT NULL,
  `salt` varchar(100) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `role` varchar(30) DEFAULT NULL,
  `status` tinyint(1) DEFAULT 0,
  `group` int(11) DEFAULT NULL,
  `joined` datetime DEFAULT NULL,
  `gender` varchar(100) DEFAULT NULL,
  `department` varchar(100) DEFAULT NULL,
  `salary` double(20,2) DEFAULT NULL,
  `dob` varchar(15) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `branch` varchar(87) DEFAULT NULL,
  `qualification` varchar(100) DEFAULT NULL,
  `assets` varchar(11) DEFAULT NULL,
  `vehicle` varchar(50) DEFAULT NULL,
  `rank` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `email`, `password`, `salt`, `phone`, `role`, `status`, `group`, `joined`, `gender`, `department`, `salary`, `dob`, `image`, `branch`, `qualification`, `assets`, `vehicle`, `rank`) VALUES
(1, 'User', 'Admin', 'admin@admin.com', '$2y$12$Tnvj9JmdWwVlCTrpy1TIVuHRNTRlm5px/c9SsDisimZ0zZSX8C3YS', 'ªœÖ!Há¿H”$’=Í®¹ü.JÕS&ÍrÓ ‘', '08170000000', '1', 1, 1, '2020-04-02 15:59:02', NULL, '1', NULL, NULL, '458388.jpg', 'abijo', NULL, NULL, NULL, NULL),
(42, 'Ayinde', 'Asafe', 'akin@gmail.com', '$2y$10$wiTbjUFsrEj9O/ZGObU22eNiOXGmU9n7I3N9ZZJBnrsX1.4MGLooi', NULL, '09090909090', '3', 0, 3, '2021-06-04 08:06:10', 'Male', '3', 10000.00, '09/02/2000', NULL, 'abijo', 'HND', NULL, NULL, NULL),
(43, 'Mutolib', 'younghallaji', 'younghallajinoni@gmail.com', '$2y$10$VKzGZnUu6y6XUzxiHwiZ7eCBHA1n.pxnD3.u4fYGy50aKfMmPnDYa', NULL, '07068581708', '4', 0, 4, '2021-06-04 13:06:37', 'Male', '4', 40000.00, '2021-06-04', NULL, 'Mutolib sodiq Akinpelumi', 'SSCE', NULL, NULL, NULL),
(48, 'Mutolib', 'Akinpelumi', 'young@gmail.com', '2a599c065ceafc882f842c29e9a43e44e7605f08ddc6b05f2f0e9df2c50752b7', 'ªœÖ!Há¿H”$’=Í®¹ü.JÕS&ÍrÓ ‘', '07068581708', 'customer', 0, NULL, '2021-06-04 18:06:19', 'Male', NULL, NULL, '2021-06-04', '973609.jpeg', 'abijo', NULL, NULL, NULL, NULL),
(49, 'Test', 'Test', 'test@test.com', '$2y$10$XK7ER.N50I.CTwh75TWlneOFTdFVa.2tQQhyBINDh4ea865UTBpd6', NULL, '08099989800', '6', 0, NULL, '2021-06-08 16:06:14', 'Male', '6', 40000.00, '2019-09-05', NULL, 'abijo', 'OND', NULL, NULL, NULL),
(50, 'Mutolib', 'sodiq', 'sodiq2015@gmail.com', '2a599c065ceafc882f842c29e9a43e44e7605f08ddc6b05f2f0e9df2c50752b7', 'ªœÖ!Há¿H”$’=Í®¹ü.JÕS&ÍrÓ ‘', '09090909009', 'customer', 0, NULL, '2021-06-09 07:06:18', 'Male', NULL, NULL, '', '487737.jpeg', 'Test', NULL, NULL, NULL, NULL),
(51, 'r', 'r', 'r@gmail.com', '2a599c065ceafc882f842c29e9a43e44e7605f08ddc6b05f2f0e9df2c50752b7', 'ªœÖ!Há¿H”$’=Í®¹ü.JÕS&ÍrÓ ‘', '9', 'customer', 0, NULL, '2021-06-09 08:06:09', 'Female', NULL, NULL, '', '455430.jpeg', 'Test', NULL, NULL, NULL, 'Key Customer'),
(52, 'Mutolib', 'Sodiq', 'sodiq@hybridsoft.com.ng', NULL, NULL, '07068581708', 'Customer', 0, NULL, '2021-06-10 15:51:17', 'Male', NULL, NULL, NULL, NULL, 'abijo', NULL, NULL, NULL, 'Regular'),
(53, 'Ridwan', 'Adio', 'ode.ridwan@gmail.com', '2a599c065ceafc882f842c29e9a43e44e7605f08ddc6b05f2f0e9df2c50752b7', 'ªœÖ!Há¿H”$’=Í®¹ü.JÕS&ÍrÓ ‘', '0909900990', 'customer', 0, NULL, '2021-06-10 17:06:26', 'Male', NULL, NULL, '', NULL, 'abijo', NULL, NULL, NULL, 'Key Customer');

-- --------------------------------------------------------

--
-- Table structure for table `user_session`
--

CREATE TABLE `user_session` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `hash` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_session`
--

INSERT INTO `user_session` (`id`, `user_id`, `hash`) VALUES
(1, 1, 'bfb363df7c91c0726e015ed0b49740b7615b66ec68caa28f5a9c917ffccaf292');

-- --------------------------------------------------------

--
-- Table structure for table `wages`
--

CREATE TABLE `wages` (
  `id` int(11) NOT NULL,
  `amount` varchar(255) DEFAULT NULL,
  `operator` int(11) DEFAULT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `paidby` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `wages`
--

INSERT INTO `wages` (`id`, `amount`, `operator`, `date`, `paidby`) VALUES
(1, '8000', 43, '2021-07-14 11:17:05', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity`
--
ALTER TABLE `activity`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assetcategories`
--
ALTER TABLE `assetcategories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assets`
--
ALTER TABLE `assets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `branch`
--
ALTER TABLE `branch`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contract_comments`
--
ALTER TABLE `contract_comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`departmentid`);

--
-- Indexes for table `estimates`
--
ALTER TABLE `estimates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expenses_categories`
--
ALTER TABLE `expenses_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `friends`
--
ALTER TABLE `friends`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `input`
--
ALTER TABLE `input`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoicepayment`
--
ALTER TABLE `invoicepayment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `items_groups`
--
ALTER TABLE `items_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `item_tax`
--
ALTER TABLE `item_tax`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leads`
--
ALTER TABLE `leads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `marketing_items`
--
ALTER TABLE `marketing_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `material`
--
ALTER TABLE `material`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu_permission`
--
ALTER TABLE `menu_permission`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `milestones`
--
ALTER TABLE `milestones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `p_id` (`p_id`);

--
-- Indexes for table `m_activity`
--
ALTER TABLE `m_activity`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment_modes`
--
ALTER TABLE `payment_modes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `production`
--
ALTER TABLE `production`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_category`
--
ALTER TABLE `product_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profile_pics`
--
ALTER TABLE `profile_pics`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fkUserId` (`fkUserId`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `project_activity`
--
ALTER TABLE `project_activity`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_files`
--
ALTER TABLE `project_files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_members`
--
ALTER TABLE `project_members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_notes`
--
ALTER TABLE `project_notes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `proposals`
--
ALTER TABLE `proposals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `proposal_comments`
--
ALTER TABLE `proposal_comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rawmaterial`
--
ALTER TABLE `rawmaterial`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales_activity`
--
ALTER TABLE `sales_activity`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sold_items`
--
ALTER TABLE `sold_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_menu`
--
ALTER TABLE `sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `task_assigned`
--
ALTER TABLE `task_assigned`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `taxes`
--
ALTER TABLE `taxes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ticket_replies`
--
ALTER TABLE `ticket_replies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transport`
--
ALTER TABLE `transport`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `units`
--
ALTER TABLE `units`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `user_session`
--
ALTER TABLE `user_session`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wages`
--
ALTER TABLE `wages`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity`
--
ALTER TABLE `activity`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=157;

--
-- AUTO_INCREMENT for table `assetcategories`
--
ALTER TABLE `assetcategories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `assets`
--
ALTER TABLE `assets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `branch`
--
ALTER TABLE `branch`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contract_comments`
--
ALTER TABLE `contract_comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `departmentid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `estimates`
--
ALTER TABLE `estimates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `expenses_categories`
--
ALTER TABLE `expenses_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `friends`
--
ALTER TABLE `friends`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `input`
--
ALTER TABLE `input`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `invoicepayment`
--
ALTER TABLE `invoicepayment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `items_groups`
--
ALTER TABLE `items_groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `item_tax`
--
ALTER TABLE `item_tax`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `leads`
--
ALTER TABLE `leads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `marketing_items`
--
ALTER TABLE `marketing_items`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `material`
--
ALTER TABLE `material`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `menu_permission`
--
ALTER TABLE `menu_permission`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=155;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `milestones`
--
ALTER TABLE `milestones`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `m_activity`
--
ALTER TABLE `m_activity`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `notes`
--
ALTER TABLE `notes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payment_modes`
--
ALTER TABLE `payment_modes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `production`
--
ALTER TABLE `production`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `product_category`
--
ALTER TABLE `product_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `profile_pics`
--
ALTER TABLE `profile_pics`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `project_activity`
--
ALTER TABLE `project_activity`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `project_files`
--
ALTER TABLE `project_files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `project_members`
--
ALTER TABLE `project_members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `project_notes`
--
ALTER TABLE `project_notes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `proposals`
--
ALTER TABLE `proposals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `proposal_comments`
--
ALTER TABLE `proposal_comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rawmaterial`
--
ALTER TABLE `rawmaterial`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `sales_activity`
--
ALTER TABLE `sales_activity`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sold_items`
--
ALTER TABLE `sold_items`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `sub_menu`
--
ALTER TABLE `sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `task_assigned`
--
ALTER TABLE `task_assigned`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `taxes`
--
ALTER TABLE `taxes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ticket`
--
ALTER TABLE `ticket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `ticket_replies`
--
ALTER TABLE `ticket_replies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transport`
--
ALTER TABLE `transport`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `user_session`
--
ALTER TABLE `user_session`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `wages`
--
ALTER TABLE `wages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

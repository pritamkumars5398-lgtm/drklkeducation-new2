-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 18, 2026 at 07:08 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `drlkeducation`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_users`
--

CREATE TABLE `admin_users` (
  `id` int(11) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `email` varchar(120) DEFAULT NULL,
  `mobile` varchar(20) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('manager','coordinator') NOT NULL,
  `status` tinyint(4) DEFAULT 1,
  `last_login` datetime DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_users`
--

INSERT INTO `admin_users` (`id`, `full_name`, `email`, `mobile`, `username`, `password`, `role`, `status`, `last_login`, `created_at`, `updated_at`) VALUES
(1, 'Main Manager', 'manager@gmail.com', NULL, 'manager', '$2y$10$Hd6rVnkzzGkT3Emm/v1YEe8OzVslTfQKB0muK2Sz7vBdThbt8IsQu', 'manager', 1, NULL, '2026-04-18 15:55:30', '2026-04-18 15:55:30'),
(2, 'Rohit Coordinator', 'drlk@gmail.com', NULL, 'rohit', '$2y$10$Hd6rVnkzzGkT3Emm/v1YEe8OzVslTfQKB0muK2Sz7vBdThbt8IsQu', 'coordinator', 1, NULL, '2026-04-18 15:55:30', '2026-04-18 15:55:30'),
(3, 'Manager Admin', 'manager@admin.com', NULL, NULL, '$2y$10$dkztOBqAqpubtxsXYrM6JOD4ggdJycmgfCW8CeINpBxB3gRbImNkm', 'manager', 1, NULL, '2026-04-27 07:29:17', '2026-04-27 07:29:17'),
(4, 'Coordinator Admin', 'coordinator@admin.com', NULL, NULL, '$2y$10$dkztOBqAqpubtxsXYrM6JOD4ggdJycmgfCW8CeINpBxB3gRbImNkm', 'coordinator', 1, NULL, '2026-04-27 07:29:17', '2026-04-27 07:29:17'),
(5, 'chandradshekhar yadav', 'chandrashekhartyadav@gmail.com', '8108671632', 'coordinator', '$2y$10$DoeWqhe.i6/LoWM8dXqW4OycbVHornZXTRak/jLwn/897TGJdVXa6', 'coordinator', 0, NULL, '2026-04-27 13:29:39', '2026-04-27 13:29:39');

-- --------------------------------------------------------

--
-- Table structure for table `campaigns`
--

CREATE TABLE `campaigns` (
  `id` int(11) NOT NULL,
  `title` varchar(150) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `goal_amount` decimal(10,2) DEFAULT NULL,
  `raised_amount` decimal(10,2) DEFAULT 0.00,
  `status` enum('active','inactive') DEFAULT 'active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `campaigns`
--

INSERT INTO `campaigns` (`id`, `title`, `description`, `image`, `goal_amount`, `raised_amount`, `status`, `created_at`) VALUES
(1, 'Education Project', 'Support underprivileged children with books and education resources.', 'imgs/campaigns/1777348115_e059f90f17480666a5dc.webp', 50000.00, 30000.00, 'active', '2026-04-27 18:30:06'),
(2, 'Food Distribution', 'Help us provide nutritious meals to starving families in need across rural areas.', 'imgs/campaigns/1777348065_64aae884e5e99149b416.webp', 50000.00, 25000.00, 'active', '2026-04-27 18:30:06'),
(3, 'Healthcare Support', 'Provide essential medical care, medicines and resources to vulnerable communities.', 'imgs/campaigns/1777348044_570b2ff20ca885ee72d3.webp', 100000.00, 40000.00, 'active', '2026-04-27 18:30:06'),
(4, 'Women Empowerment', 'Empower women in rural areas through skill development and self-reliance programs.', 'imgs/campaigns/1777348022_5d670aac2b66d86bd6a6.webp', 100000.00, 60000.00, 'active', '2026-04-27 18:30:06'),
(5, 'Environment / Tree Plantation', 'Join our green initiative to plant trees and restore ecological balance in affected areas.', 'imgs/campaigns/1777348005_35f1cf33be262af9999e.webp', 50000.00, 15000.00, 'active', '2026-04-27 18:30:06'),
(6, 'Child Support / Orphan Help', 'Provide shelter, care, and a bright future to orphaned and vulnerable children.', 'imgs/campaigns/1777347970_3929afc5f6616667f262.webp', 150000.00, 80000.00, 'active', '2026-04-27 18:30:06');

-- --------------------------------------------------------

--
-- Table structure for table `certificates`
--

CREATE TABLE `certificates` (
  `id` int(11) NOT NULL,
  `title` varchar(150) DEFAULT NULL,
  `issued_by` varchar(150) DEFAULT NULL,
  `certificate_file` varchar(255) DEFAULT NULL,
  `thumbnail` varchar(255) DEFAULT NULL,
  `issue_date` date DEFAULT NULL,
  `status` enum('active','inactive') DEFAULT 'active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cms_pages`
--

CREATE TABLE `cms_pages` (
  `id` int(11) NOT NULL,
  `title` varchar(150) NOT NULL,
  `slug` varchar(150) NOT NULL,
  `content` longtext NOT NULL,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_description` text DEFAULT NULL,
  `meta_keywords` text DEFAULT NULL,
  `status` enum('draft','published') DEFAULT 'published',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cms_pages`
--

INSERT INTO `cms_pages` (`id`, `title`, `slug`, `content`, `meta_title`, `meta_description`, `meta_keywords`, `status`, `created_at`, `updated_at`) VALUES
(1, 'About Us', 'about-us', '<p><strong>DRLK Education Foundation</strong> is a dedicated organization committed to creating positive social impact through education, empowerment, and community development. Since our inception, we have been driven by a strong mission to uplift underprivileged communities and provide equal opportunities for growth and success.</p>\r\n\r\n<p><strong>Our Values</strong><br />\r\nAt DRLK Education Foundation, our core values are compassion, integrity, and inclusivity. We believe in the power of collective effort and work closely with communities to bring meaningful and sustainable change.</p>\r\n\r\n<p><strong>Our Mission</strong><br />\r\nOur mission is to empower individuals through quality education, skill development, and social awareness programs. We strive to build a society where every individual has access to opportunities and resources for a better future.</p>\r\n\r\n<p><strong>Our Impact</strong><br />\r\nThrough various initiatives, workshops, and community programs, DRLK Education Foundation has positively impacted many lives. We continue to expand our reach and work towards creating long-lasting social change.</p>\r\n\r\n<p><strong>Join Us</strong><br />\r\nBe a part of our journey to make a difference. Together, we can build a brighter and more equitable future for all.</p>\r\n', NULL, NULL, NULL, 'published', '2026-04-27 14:08:04', '2026-04-27 08:59:30'),
(2, 'President Message', 'president-message', '<h3>President Message</h3>\n        <p>Dear Friends,</p>\n        <p>It is with great pride and humility that I address you as the President of DRLK Education Foundation. Since our founding 2022, our organization has been driven by a simple yet profound belief: that every individual, regardless of circumstance, deserves the opportunity to thrive.</p>\n        <p>At DRLK Education Foundation, we are not just dreamers; we are doers. We roll up our sleeves and work tirelessly to turn our vision of a better world into reality. From providing access to education and healthcare to championing environmental sustainability and social justice, our efforts are guided by a deep commitment to making a meaningful difference in the lives of others.</p>\n        <p>But we cannot do it alone. Our success is built on the support of passionate individuals like you—individuals who share our values and our vision for a brighter future. Together, we can amplify our impact and create lasting change that reverberates far beyond our borders.</p>\n        <p>As we look to the future, I am filled with hope and optimism. The challenges we face are great, but too is our resolve to overcome them. With your continued support, I am confident that we can build a world where every person has the opportunity to flourish and thrive.</p>\n        <p>Thank you for your unwavering commitment to our cause. Together, we are truly making a difference.</p>\n        <p>Warm regards,</p>\n        <p>DRLK Education Foundation</p>', NULL, NULL, NULL, 'published', '2026-04-27 11:25:13', '2026-04-27 11:25:13');

-- --------------------------------------------------------

--
-- Table structure for table `contact_enquiries`
--

CREATE TABLE `contact_enquiries` (
  `id` int(11) NOT NULL,
  `name` varchar(120) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `email` varchar(120) DEFAULT NULL,
  `topic` varchar(150) DEFAULT NULL,
  `message` text NOT NULL,
  `status` enum('new','in_progress','resolved') DEFAULT 'new',
  `admin_reply` text DEFAULT NULL,
  `replied_at` datetime DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact_enquiries`
--

INSERT INTO `contact_enquiries` (`id`, `name`, `mobile`, `email`, `topic`, `message`, `status`, `admin_reply`, `replied_at`, `created_at`) VALUES
(1, 'chandradshekhar yadav', '8108671632', 'chandrashekhartyadav@gmail.com', 'test contact form ', '<p>test messages</p>\r\n', 'in_progress', NULL, NULL, '2026-04-27 13:22:32');

-- --------------------------------------------------------

--
-- Table structure for table `donations`
--

CREATE TABLE `donations` (
  `id` int(11) NOT NULL,
  `full_name` varchar(150) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `email` varchar(150) DEFAULT NULL,
  `pancard_no` varchar(30) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `amount` decimal(10,2) NOT NULL,
  `custom_amount` decimal(10,2) DEFAULT NULL,
  `payment_mode` varchar(50) DEFAULT 'UPI',
  `transaction_id` varchar(100) DEFAULT NULL,
  `payment_receipt` varchar(255) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `status` enum('pending','verified','rejected') DEFAULT 'pending',
  `verified_by` int(11) DEFAULT NULL,
  `verified_at` datetime DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `campaign_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `donations`
--

INSERT INTO `donations` (`id`, `full_name`, `mobile`, `email`, `pancard_no`, `address`, `photo`, `amount`, `custom_amount`, `payment_mode`, `transaction_id`, `payment_receipt`, `message`, `status`, `verified_by`, `verified_at`, `created_at`, `updated_at`, `campaign_id`) VALUES
(1, 'Rahul Sharma', '9876543210', 'rahul@gmail.com', 'ABCDE1234F', 'Raipur, Chhattisgarh', NULL, 1000.00, NULL, 'PhonePe', 'TXN10001', NULL, NULL, 'verified', NULL, NULL, '2026-04-20 08:44:24', NULL, NULL),
(2, 'Priya Patel', '9876543211', 'priya@gmail.com', 'PQRSX4567L', 'Bilaspur, Chhattisgarh', NULL, 5000.00, NULL, 'Google Pay', 'TXN10002', NULL, NULL, 'verified', NULL, NULL, '2026-04-20 08:44:24', NULL, NULL),
(3, 'Amit Kumar', '9876543212', 'amit@gmail.com', 'LMNOP7890Q', 'Durg, Chhattisgarh', NULL, 2000.00, NULL, 'Paytm', 'TXN10003', NULL, NULL, 'verified', NULL, NULL, '2026-04-20 08:44:24', NULL, NULL),
(4, 'Sneha Gupta', '9876543213', 'sneha@gmail.com', 'ZXCVB1234T', 'Korba, Chhattisgarh', NULL, 1500.00, NULL, 'UPI', 'TXN10004', NULL, NULL, 'verified', NULL, NULL, '2026-04-20 08:44:24', NULL, NULL),
(5, 'Vikram Singh', '9876543214', 'vikram@gmail.com', 'QWERT5678Y', 'Jagdalpur, Chhattisgarh', NULL, 10000.00, NULL, 'Bank Transfer', 'TXN10005', NULL, NULL, 'verified', NULL, NULL, '2026-04-20 08:44:24', NULL, NULL),
(6, 'Anjali Joshi', '9876543215', 'anjali@gmail.com', 'ASDFG9876H', 'Ambikapur, Chhattisgarh', NULL, 500.00, NULL, 'Cash', 'TXN10006', NULL, NULL, 'verified', NULL, NULL, '2026-04-20 08:44:24', NULL, NULL),
(7, 'Rajeev Verma', '9876543216', 'rajeev@gmail.com', 'HJKLO1122P', 'Raigarh, Chhattisgarh', NULL, 2500.00, NULL, 'PhonePe', 'TXN10007', NULL, NULL, 'verified', NULL, NULL, '2026-04-20 08:44:24', NULL, NULL),
(8, 'Neha Desai', '9876543217', 'neha@gmail.com', 'BNMKO3344R', 'Rajnandgaon, Chhattisgarh', NULL, 3000.00, NULL, 'Google Pay', 'TXN10008', NULL, NULL, 'verified', NULL, NULL, '2026-04-20 08:44:24', NULL, NULL),
(9, 'Suresh Yadav', '9876543218', 'suresh@gmail.com', 'POIUY4455K', 'Mahasamund, Chhattisgarh', NULL, 7000.00, NULL, 'Paytm', 'TXN10009', NULL, NULL, 'verified', NULL, NULL, '2026-04-20 08:44:24', NULL, NULL),
(10, 'Kavita Sahu', '9876543219', 'kavita@gmail.com', 'LKJHG7788M', 'Kanker, Chhattisgarh', NULL, 1200.00, NULL, 'UPI', 'TXN10010', NULL, NULL, 'verified', NULL, NULL, '2026-04-20 08:44:24', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `event_date` date NOT NULL,
  `event_time` time DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `total_seats` int(11) DEFAULT 0,
  `available_seats` int(11) DEFAULT 0,
  `status` enum('active','inactive') DEFAULT 'active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `title`, `description`, `event_date`, `event_time`, `location`, `image`, `total_seats`, `available_seats`, `status`, `created_at`, `updated_at`) VALUES
(1, 'test event ', 'test desction', '2026-04-27', '16:03:00', 'Mumbai', 'imgs/events/1777286003_f39c073a35d42658eeec.png', 10, 9, 'active', '2026-04-27 10:33:23', '2026-04-27 10:34:01');

-- --------------------------------------------------------

--
-- Table structure for table `event_bookings`
--

CREATE TABLE `event_bookings` (
  `id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `full_name` varchar(120) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `email` varchar(120) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `is_member` enum('yes','no') DEFAULT 'no',
  `member_id` varchar(50) DEFAULT NULL,
  `seats` int(11) DEFAULT 1,
  `status` enum('pending','confirmed','cancelled') DEFAULT 'pending',
  `remarks` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `approved_by` int(11) DEFAULT NULL,
  `approved_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `event_bookings`
--

INSERT INTO `event_bookings` (`id`, `event_id`, `full_name`, `mobile`, `email`, `city`, `is_member`, `member_id`, `seats`, `status`, `remarks`, `created_at`, `approved_by`, `approved_at`) VALUES
(1, 1, 'chandradshekhar yadav', '8108671632', NULL, 'mumbai', 'no', NULL, 1, 'confirmed', NULL, '2026-04-27 10:33:45', NULL, '2026-04-27 10:34:01');

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `type` enum('photo','media') DEFAULT 'photo',
  `description` text DEFAULT NULL,
  `publish_date` date DEFAULT NULL,
  `status` enum('active','inactive') DEFAULT 'active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `video_url` varchar(255) DEFAULT NULL,
  `category` varchar(100) DEFAULT NULL,
  `is_featured` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `title`, `image`, `type`, `description`, `publish_date`, `status`, `created_at`, `video_url`, `category`, `is_featured`) VALUES
(3, 'Image1', 'imgs/gallery/1777311096_25940a10d14481a388a2.webp', 'photo', '', '2026-04-27', 'active', '2026-04-27 17:31:36', '', '', 0),
(4, 'Image2', 'imgs/gallery/1777311111_e482b95168581c12abbc.webp', 'photo', '', '2026-04-27', 'active', '2026-04-27 17:31:51', '', '', 0),
(5, 'image3', 'imgs/gallery/1777311124_2039315afd04598214a8.webp', 'photo', '', '2026-04-27', 'active', '2026-04-27 17:32:04', '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `latest_news`
--

CREATE TABLE `latest_news` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `link` varchar(255) DEFAULT NULL,
  `display_order` int(11) DEFAULT 0,
  `status` enum('active','inactive') DEFAULT 'active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `latest_news`
--

INSERT INTO `latest_news` (`id`, `title`, `link`, `display_order`, `status`, `created_at`) VALUES
(1, 'DRLK वृक्षारोपण कार्यक्रम के तहत वृक्षारोपण किया गया', '', 0, 'active', '2026-04-27 15:23:27'),
(2, 'कर्म धैर्य संचार सेवा समिति की बैठक संपन्न', '', 0, 'active', '2026-04-27 15:23:44');

-- --------------------------------------------------------

--
-- Table structure for table `management_team`
--

CREATE TABLE `management_team` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `designation` varchar(150) NOT NULL,
  `department` varchar(150) DEFAULT NULL,
  `mobile` varchar(20) DEFAULT NULL,
  `email` varchar(120) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `sort_order` int(11) DEFAULT 0,
  `status` enum('active','inactive') DEFAULT 'active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `management_team`
--

INSERT INTO `management_team` (`id`, `name`, `designation`, `department`, `mobile`, `email`, `photo`, `description`, `sort_order`, `status`, `created_at`, `updated_at`) VALUES
(1, 'केशर चन्द्र मंहत', 'दुर्ग संभाग प्रभारी', NULL, NULL, NULL, NULL, NULL, 1, 'active', '2026-04-20 06:18:40', NULL),
(2, 'प्रदीप साहू', 'बिलासपुर संभाग प्रभारी', NULL, NULL, NULL, NULL, NULL, 2, 'active', '2026-04-20 06:18:40', NULL),
(3, 'यू के पटेल', 'संरक्षण सदस्य', NULL, NULL, NULL, NULL, NULL, 3, 'active', '2026-04-20 06:18:40', NULL),
(4, 'खेमन जायसवाल', 'सरगुजा संभाग प्रभारी', NULL, NULL, NULL, NULL, NULL, 4, 'active', '2026-04-20 06:18:40', NULL),
(5, 'मनोज कुमार वर्मा', 'मीडिया प्रभारी', NULL, NULL, NULL, NULL, NULL, 5, 'active', '2026-04-20 06:18:40', NULL),
(6, 'सत्यनारायण सांड़े', 'संरक्षण सदस्य', NULL, NULL, NULL, NULL, NULL, 6, 'active', '2026-04-20 06:18:40', NULL),
(7, 'अखिलेश जायसवाल', 'संरक्षण सदस्य', NULL, NULL, NULL, NULL, NULL, 7, 'active', '2026-04-20 06:18:40', NULL),
(8, 'संजय कुमार बरेठ', 'संरक्षण सदस्य', NULL, NULL, NULL, NULL, NULL, 8, 'active', '2026-04-20 06:18:40', NULL),
(9, 'रमेश साहू', 'रायपुर जिला अध्यक्ष', NULL, NULL, NULL, NULL, NULL, 9, 'active', '2026-04-20 06:18:40', NULL),
(10, 'राजेश यादव', 'कोरबा जिला प्रभारी', NULL, NULL, NULL, NULL, NULL, 10, 'active', '2026-04-20 06:18:40', NULL),
(11, 'दिलीप पटेल', 'जांजगीर प्रभारी', NULL, NULL, NULL, NULL, NULL, 11, 'active', '2026-04-20 06:18:40', NULL),
(12, 'अजय वर्मा', 'धमतरी प्रभारी', NULL, NULL, NULL, NULL, NULL, 12, 'active', '2026-04-20 06:18:40', NULL),
(13, 'महेश गुप्ता', 'बालोद प्रभारी', NULL, NULL, NULL, NULL, NULL, 13, 'active', '2026-04-20 06:18:40', NULL),
(14, 'लोकेश देवांगन', 'राजनांदगांव प्रभारी', NULL, NULL, NULL, NULL, NULL, 14, 'active', '2026-04-20 06:18:40', NULL),
(15, 'पवन ठाकुर', 'महासमुंद प्रभारी', NULL, NULL, NULL, NULL, NULL, 15, 'active', '2026-04-20 06:18:40', NULL),
(16, 'विकास तिवारी', 'कवर्धा प्रभारी', NULL, NULL, NULL, NULL, NULL, 16, 'active', '2026-04-20 06:18:40', NULL),
(17, 'दीपक साहू', 'युवा मोर्चा अध्यक्ष', NULL, NULL, NULL, NULL, NULL, 17, 'active', '2026-04-20 06:18:40', NULL),
(18, 'अनिल पटेल', 'संगठन मंत्री', NULL, NULL, NULL, NULL, NULL, 18, 'active', '2026-04-20 06:18:40', NULL),
(19, 'गोपाल वर्मा', 'प्रदेश सचिव', '', '', '', NULL, '', 20, 'active', '2026-04-20 06:18:40', NULL),
(20, 'नरेश यादव', 'प्रदेश उपाध्यक्ष', '', '', '', NULL, '', 19, 'active', '2026-04-20 06:18:40', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` int(11) NOT NULL,
  `full_name` varchar(120) NOT NULL,
  `father_name` varchar(120) DEFAULT NULL,
  `mobile` varchar(20) NOT NULL,
  `aadhar_no` varchar(20) DEFAULT NULL,
  `email` varchar(120) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `gender` varchar(20) DEFAULT NULL,
  `blood_group` varchar(10) DEFAULT NULL,
  `occupation` varchar(100) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `state` varchar(100) DEFAULT NULL,
  `district` varchar(100) DEFAULT NULL,
  `pincode` varchar(20) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `id_type` varchar(50) DEFAULT NULL,
  `id_document` varchar(255) DEFAULT NULL,
  `other_document` varchar(255) DEFAULT NULL,
  `payment_amount` decimal(10,2) DEFAULT 0.00,
  `payment_status` enum('pending','paid','failed') DEFAULT 'pending',
  `payment_mode` varchar(50) DEFAULT NULL,
  `payment_id` varchar(100) DEFAULT NULL,
  `payment_receipt` varchar(255) DEFAULT NULL,
  `payment_date` datetime DEFAULT NULL,
  `member_code` varchar(30) DEFAULT NULL,
  `membership_type` varchar(50) DEFAULT NULL,
  `qr_code` varchar(255) DEFAULT NULL,
  `id_card_generated` tinyint(1) DEFAULT 0,
  `approved_by` int(11) DEFAULT NULL,
  `approved_at` datetime DEFAULT NULL,
  `expiry_date` date DEFAULT NULL,
  `remarks` text DEFAULT NULL,
  `status` enum('pending','approved','rejected') DEFAULT 'pending',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `full_name`, `father_name`, `mobile`, `aadhar_no`, `email`, `dob`, `gender`, `blood_group`, `occupation`, `address`, `city`, `state`, `district`, `pincode`, `photo`, `id_type`, `id_document`, `other_document`, `payment_amount`, `payment_status`, `payment_mode`, `payment_id`, `payment_receipt`, `payment_date`, `member_code`, `membership_type`, `qr_code`, `id_card_generated`, `approved_by`, `approved_at`, `expiry_date`, `remarks`, `status`, `created_at`) VALUES
(1, 'Rohit Kumar', 'Mahesh Kumar', '9876543210', NULL, 'rohit@gmail.com', '1998-05-12', 'Male', NULL, 'Student', 'Shankar Nagar', 'Raipur', 'Chhattisgarh', NULL, '492001', 'rohit.jpg', NULL, NULL, NULL, 0.00, 'pending', 'UPI', NULL, 'imgs/member/1777288856_3dd6c1e32e798843baba.png', NULL, 'DRLK-001', NULL, NULL, 0, NULL, NULL, NULL, NULL, 'approved', '2026-04-18 18:11:34'),
(2, 'Suman Devi', 'Ramesh Prasad', '9988776655', NULL, 'suman@gmail.com', '1995-08-20', 'Female', NULL, 'Teacher', 'Civil Lines', 'Bilaspur', 'Chhattisgarh', NULL, '495001', 'suman.jpg', NULL, NULL, NULL, 0.00, 'pending', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, 'pending', '2026-04-18 18:11:34'),
(3, 'Amit Verma', 'Rajendra Verma', '9123456780', NULL, 'amit@gmail.com', '1992-11-15', 'Male', NULL, 'Business', 'MG Road', 'Durg', 'Chhattisgarh', NULL, '491001', 'amit.jpg', NULL, NULL, NULL, 0.00, 'pending', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, 'approved', '2026-04-18 18:11:34'),
(4, 'Pooja Sharma', 'Suresh Sharma', '9012345678', NULL, 'pooja@gmail.com', '1999-03-10', 'Female', NULL, 'Student', 'Tatibandh', 'Raipur', 'Chhattisgarh', NULL, '492099', 'pooja.jpg', NULL, NULL, NULL, 0.00, 'pending', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, 'pending', '2026-04-18 18:11:34'),
(5, 'Rahul Singh', 'Vijay Singh', '9345678901', NULL, 'rahul@gmail.com', '1990-07-25', 'Male', NULL, 'Engineer', 'Nehru Nagar', 'Bhilai', 'Chhattisgarh', NULL, '490020', 'rahul.jpg', NULL, NULL, NULL, 0.00, 'pending', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, 'approved', '2026-04-18 18:11:34'),
(6, 'Neha Patel', 'Kailash Patel', '9456789012', NULL, 'neha@gmail.com', '1997-01-05', 'Female', NULL, 'Nurse', 'Supela', 'Bhilai', 'Chhattisgarh', NULL, '490023', 'neha.jpg', NULL, NULL, NULL, 0.00, 'pending', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, 'rejected', '2026-04-18 18:11:34'),
(7, 'Vikas Yadav', 'Dinesh Yadav', '9567890123', NULL, 'vikas@gmail.com', '1993-09-18', 'Male', NULL, 'Farmer', 'Korba Road', 'Korba', 'Chhattisgarh', NULL, '495677', 'vikas.jpg', NULL, NULL, NULL, 0.00, 'pending', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, 'approved', '2026-04-18 18:11:34'),
(8, 'Anjali Gupta', 'Prakash Gupta', '9678901234', NULL, 'anjali@gmail.com', '2000-02-28', 'Female', NULL, 'Student', 'Old Bus Stand', 'Ambikapur', 'Chhattisgarh', NULL, '497001', 'anjali.jpg', NULL, NULL, NULL, 0.00, 'pending', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, 'approved', '2026-04-18 18:11:34'),
(9, 'Deepak Sahu', 'Narayan Sahu', '9789012345', NULL, 'deepak@gmail.com', '1991-06-14', 'Male', NULL, 'Driver', 'Station Road', 'Jagdalpur', 'Chhattisgarh', NULL, '494001', 'deepak.jpg', NULL, NULL, NULL, 0.00, 'pending', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, 'approved', '2026-04-18 18:11:34'),
(11, 'chandradshekhar yadav', 'S/O tejuram', '8108671632', '9876543210', 'chandrashekhartyadav@gmail.com', '1989-03-02', 'Male', 'A+', '', 'kandivali', '', 'Maharashtra', ' Mumbai ', '400101', 'imgs/member/1776663025_55b5106b55be4bea92eb.png', 'Aadhar Card', 'imgs/member/1776663025_557edd66796f9408d5b5.png', 'imgs/member/1776663025_9b639ec89085bc2114c1.png', 0.00, 'pending', 'Phonepe', NULL, 'imgs/member/1776663025_cddf55dba9fe59a14a72.jpeg', NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, 'approved', '2026-04-20 05:30:25');

-- --------------------------------------------------------

--
-- Table structure for table `member_renewals`
--

CREATE TABLE `member_renewals` (
  `id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `membership_id` varchar(50) DEFAULT NULL,
  `full_name` varchar(120) DEFAULT NULL,
  `payment_mode` varchar(50) DEFAULT NULL,
  `payment_receipt` varchar(255) DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT NULL,
  `status` enum('pending','approved','rejected') DEFAULT 'pending',
  `approved_by` int(11) DEFAULT NULL,
  `approved_at` datetime DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `member_renewals`
--

INSERT INTO `member_renewals` (`id`, `member_id`, `membership_id`, `full_name`, `payment_mode`, `payment_receipt`, `amount`, `status`, `approved_by`, `approved_at`, `created_at`) VALUES
(1, 1, 'DRLK-001', 'Rohit Kumar', 'UPI', 'imgs/member/1777290588_8550783cf9c31fd9d878.png', NULL, 'approved', 1, '2026-04-27 11:50:00', '2026-04-27 11:49:48');

-- --------------------------------------------------------

--
-- Table structure for table `motives`
--

CREATE TABLE `motives` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `short_title` varchar(100) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` enum('active','inactive') DEFAULT 'active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `motives`
--

INSERT INTO `motives` (`id`, `title`, `short_title`, `description`, `image`, `status`, `created_at`) VALUES
(1, 'Social Welfare', 'SOCIAL\nWELFARE', 'To create awareness and prevention of malpractice like child labour, beggary, dowry system, prostitution, discrimination, death-feast and exploitation of children, women and elderly etc. in the society.', 'imgs/objective/objective-img01.png', 'active', '2026-04-27 17:11:07'),
(2, 'Health & Research', 'HEALTH &\nRESEARCH', 'To promote health awareness and research initiatives...', 'imgs/objective/objective-img02.png', 'active', '2026-04-27 17:11:07'),
(3, 'Education & Training', 'EDUCATION &\nTRAINING', 'To provide education and training for empowerment...', 'imgs/objective/objective-img03.png', 'active', '2026-04-27 17:11:07'),
(4, 'Human Rights', 'HUMAN\nRIGHTS', 'To protect and promote human rights for all...', 'imgs/objective/objective-img04.png', 'active', '2026-04-27 17:11:07'),
(5, 'Anti Crime', 'ANTI\nCRIME', 'To work towards a crime-free society...', 'imgs/objective/objective-img05.png', 'active', '2026-04-27 17:11:07');

-- --------------------------------------------------------

--
-- Table structure for table `news_updates`
--

CREATE TABLE `news_updates` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `link` varchar(255) DEFAULT NULL,
  `is_breaking` tinyint(1) DEFAULT 0,
  `status` enum('active','inactive') DEFAULT 'active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `news_updates`
--

INSERT INTO `news_updates` (`id`, `title`, `link`, `is_breaking`, `status`, `created_at`) VALUES
(1, 'DRLK वार्षिक उत्सव एवं सम्मान समारोह का आयोजन जल्द किया जा रहा है |', '', 1, 'active', '2026-04-27 15:09:44');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `subtitle` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `button_text` varchar(100) DEFAULT NULL,
  `button_link` varchar(255) DEFAULT NULL,
  `sort_order` int(11) DEFAULT 0,
  `status` enum('active','inactive') DEFAULT 'active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `title`, `subtitle`, `image`, `button_text`, `button_link`, `sort_order`, `status`, `created_at`) VALUES
(1, '', '', 'imgs/slider/1777306489_3d37abba9c386ae0dee5.png', '', '', 0, 'inactive', '2026-04-27 16:14:49'),
(3, '', '', 'imgs/slider/1777306519_1b9c34ab6ec2ad4b0bfb.png', '', '', 0, 'active', '2026-04-27 16:15:19'),
(4, '', '', 'imgs/slider/1777306782_39bcd6ac4684711ae394.png', '', '', 0, 'active', '2026-04-27 16:19:42');

-- --------------------------------------------------------

--
-- Table structure for table `student_enquiries`
--

CREATE TABLE `student_enquiries` (
  `id` int(11) NOT NULL,
  `name` varchar(120) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `email` varchar(120) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `course` varchar(100) NOT NULL,
  `percentage` varchar(20) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `status` tinyint(4) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student_enquiries`
--

INSERT INTO `student_enquiries` (`id`, `name`, `mobile`, `email`, `city`, `course`, `percentage`, `message`, `status`, `created_at`) VALUES
(1, 'chandradshekhar yadav', '8108671632', 'chandrashekhartyadav@gmail.com', 'mumbai', 'MBBS', '56', 'test', 0, '2026-04-18 15:32:45');

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `designation` varchar(100) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `status` enum('active','inactive') DEFAULT 'active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `name`, `designation`, `message`, `photo`, `status`, `created_at`) VALUES
(1, 'Anirudh', 'Member', 'Through your compassionate initiatives and remarkable leadership, you have demonstrated a steadfast commitment to your organization\'s selfless contributions have not only inspired others but have also set a shining example of humanitarianism and solidarity.', 'imgs/testimonials/avatar_11112022054206.jpg', 'active', '2026-04-27 17:59:08'),
(2, 'Priya S.', 'Volunteer', 'Volunteering here has been the most fulfilling experience. The dedication to the community and the real, measurable impacts we make every single day is truly inspiring to be a part of.', 'imgs/testimonials/download_11112022054308.png', 'active', '2026-04-27 17:59:08'),
(3, 'Rajesh K.', 'Community Leader', 'I\'ve personally witnessed how these initiatives change lives. From providing essential education resources to building stronger support networks, the work speaks volumes about their core values.', 'imgs/testimonials/avatar_11112022054206.jpg', 'active', '2026-04-27 17:59:08');

-- --------------------------------------------------------

--
-- Table structure for table `whatsapp_settings`
--

CREATE TABLE `whatsapp_settings` (
  `id` int(11) NOT NULL,
  `number` varchar(20) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `status` enum('active','inactive') DEFAULT 'active',
  `position` enum('left','right') DEFAULT 'right'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `whatsapp_settings`
--

INSERT INTO `whatsapp_settings` (`id`, `number`, `message`, `status`, `position`) VALUES
(1, '919876543210', 'Hello! I would like to know more about DRLK Education Foundation.', 'active', 'left');

-- --------------------------------------------------------

--
-- Table structure for table `youtube_videos`
--

CREATE TABLE `youtube_videos` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `youtube_link` varchar(255) DEFAULT NULL,
  `status` enum('active','inactive') DEFAULT 'active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `youtube_videos`
--

INSERT INTO `youtube_videos` (`id`, `title`, `youtube_link`, `status`, `created_at`) VALUES
(1, 'Placeholder Video 1', 'https://www.youtube.com/watch?v=ScMzIvxBSi4', 'active', '2026-04-27 17:22:49'),
(2, 'Placeholder Video 2', 'https://www.youtube.com/watch?v=ScMzIvxBSi4', 'active', '2026-04-27 17:22:49');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_users`
--
ALTER TABLE `admin_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `campaigns`
--
ALTER TABLE `campaigns`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `certificates`
--
ALTER TABLE `certificates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms_pages`
--
ALTER TABLE `cms_pages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`);

--
-- Indexes for table `contact_enquiries`
--
ALTER TABLE `contact_enquiries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `donations`
--
ALTER TABLE `donations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event_bookings`
--
ALTER TABLE `event_bookings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `event_id` (`event_id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `latest_news`
--
ALTER TABLE `latest_news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `management_team`
--
ALTER TABLE `management_team`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_mobile` (`mobile`),
  ADD KEY `idx_status` (`status`),
  ADD KEY `idx_member_code` (`member_code`);

--
-- Indexes for table `member_renewals`
--
ALTER TABLE `member_renewals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `motives`
--
ALTER TABLE `motives`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news_updates`
--
ALTER TABLE `news_updates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_enquiries`
--
ALTER TABLE `student_enquiries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `whatsapp_settings`
--
ALTER TABLE `whatsapp_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `youtube_videos`
--
ALTER TABLE `youtube_videos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_users`
--
ALTER TABLE `admin_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `campaigns`
--
ALTER TABLE `campaigns`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `certificates`
--
ALTER TABLE `certificates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cms_pages`
--
ALTER TABLE `cms_pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `contact_enquiries`
--
ALTER TABLE `contact_enquiries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `donations`
--
ALTER TABLE `donations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `event_bookings`
--
ALTER TABLE `event_bookings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `latest_news`
--
ALTER TABLE `latest_news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `management_team`
--
ALTER TABLE `management_team`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `member_renewals`
--
ALTER TABLE `member_renewals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `motives`
--
ALTER TABLE `motives`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `news_updates`
--
ALTER TABLE `news_updates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `student_enquiries`
--
ALTER TABLE `student_enquiries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `whatsapp_settings`
--
ALTER TABLE `whatsapp_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `youtube_videos`
--
ALTER TABLE `youtube_videos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `event_bookings`
--
ALTER TABLE `event_bookings`
  ADD CONSTRAINT `event_bookings_ibfk_1` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

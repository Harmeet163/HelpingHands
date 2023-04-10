-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 08, 2023 at 03:29 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `helpinghands`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE `admin_login` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `updationDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`id`, `username`, `password`, `updationDate`) VALUES
(1, 'st@admin.com', '9EHGM73ZbSacwhY', '2022-11-05 13:45:59');

-- --------------------------------------------------------

--
-- Table structure for table `contact_forms`
--

CREATE TABLE `contact_forms` (
  `id` int(100) NOT NULL,
  `first_name` varchar(150) DEFAULT NULL,
  `last_name` varchar(150) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `phone_no` bigint(10) UNSIGNED DEFAULT NULL,
  `message` text NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact_forms`
--

INSERT INTO `contact_forms` (`id`, `first_name`, `last_name`, `email`, `phone_no`, `message`, `created_on`) VALUES
(1, 'test`', 'test', 'test@test.com', 217986381, 'test', '2022-11-29 07:07:29');

-- --------------------------------------------------------

--
-- Table structure for table `customers_info`
--

CREATE TABLE `customers_info` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `type` varchar(20) NOT NULL DEFAULT 'new',
  `email` varchar(100) DEFAULT NULL,
  `current_orders` varchar(200) DEFAULT NULL,
  `shipping_address` varchar(300) NOT NULL,
  `avatar` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `sellerid` int(20) NOT NULL,
  `cno` int(30) NOT NULL,
  `email` varchar(150) NOT NULL,
  `productname` varchar(150) NOT NULL DEFAULT '0',
  `sold` int(11) NOT NULL DEFAULT 0,
  `image1` varchar(300) NOT NULL,
  `image2` varchar(300) NOT NULL,
  `image3` varchar(300) NOT NULL,
  `image4` varchar(300) NOT NULL,
  `address` text NOT NULL,
  `city` varchar(150) NOT NULL,
  `state` varchar(150) NOT NULL,
  `pincode` int(100) NOT NULL,
  `productdes` text NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `sellerid`, `cno`, `email`, `productname`, `sold`, `image1`, `image2`, `image3`, `image4`, `address`, `city`, `state`, `pincode`, `productdes`, `updated_at`, `created_at`) VALUES
(1, 'Jay Patel', 1, 2147483647, 'jaypatel@gmail.com', 'Google Ads for Beginners', 200, 'c1-1.jpg', 'c1-2.png', 'c1-3.png', 'c1-4.png', '2, 1, Atmavallabh Bldg, Achole Rd, Nalasopara(e), Mumbai', 'Maharashtra', 'Mumbai', 400701, '\"This course was exactly what I needed. I will watch it several times and would suggest it for anyone looking to start with AdWords.\" -Brad Fach, Founder, PatentFile\r\n\r\nIn just over 3 hours you will learn how to create Google AdWords campaigns that boost traffic, increase sales and build your business online – or your money back! \r\n\r\nThroughout this comprehensive course you will learn all of the elements that go into creating campaigns that deliver a high return on every dollar you spend – from targeting, to research, to writing compelling ads, to campaign optimization. \r\n\r\nYou will also get a firm grasp on the basics of AdWords and how it works, which is necessary to create successful campaigns. And, on top of lifetime access to the course, you\'ll also get a FREE copy of my Google AdWords for Beginners eBook', '2023-02-08 19:35:33', '2023-02-08 19:35:33'),
(2, 'Monica Varghese', 3, 2147483647, 'monica@gmail.com', 'The Ultimate Drawing Course - Beginner to Advanced', 150, 'c-2-1.jpg', 'c2-2.png', 'c2-3.png', 'c2-4.png', 'Wz 6, Kailash Park, Opp Kalra Hospital, Kirti Nagar, Delhi', 'Delhi', 'Delhi', 110015, 'Join over 450,000 learning student and start gaining the drawing skills you\'ve always wanted.\r\n\r\nThe Ultimate Drawing Course will show you how to create advanced art that will stand up as professional work. This course will enhance or give you skills in the world of drawing - or your money back\r\n\r\nThe course is your track to obtaining drawing skills like you always knew you should have! Whether for your own projects or to draw for other people.\r\n\r\nThis course will take you from having little knowledge in drawing to creating advanced art and having a deep understanding of drawing fundamentals.', '2023-02-08 19:38:40', '2023-02-08 19:38:40'),
(3, 'Monica Varghese', 3, 2147483647, 'monica@gmail.com', 'Building Confidence Through Drawing: Art for Beginners', 50, 'c3-1.jpg', 'c3-2.png', 'c3-3.png', 'c3-4.png', 'Wz 6, Kailash Park, Opp Kalra Hospital, Kirti Nagar, Delhi', 'Delhi', 'Delhi', 110015, 'Do you know a budding artist who is interested in learning how to draw?\r\n\r\nAre you looking for an experienced art teacher to guide them throughout the creative process?\r\n\r\nAre you seeking a healthy activity that will encourage creativity and boost self-confidence? \r\n\r\nThis Beginner\'s Drawing Course may be just what you are looking for! Designed with young artists in mind, this drawing course is suitable for ALL AGES. The teaching process used is a step-by-step method that will inspire and delight students into drawing action! The process involves organizing shapes and lines together until a recognizable outcome is achieved. Beginner artists may then apply the knowledge they gain through each lesson to create unique masterpieces of their own. This Beginner\'s Drawing Course is designed to give new artists the tools they need to begin their artistic journey into self-expression, reflection, and creative thinking.\r\n\r\nPlease Note: This course is intended to be purchased by a parent or guardian for use by a beginner artist or novice art student. Adult supervision is recommended. Per Udemy’s Policy: Those under 18 may use the services only if a parent or guardian opens their account, handles any enrollments, and manages their account usage.', '2023-02-08 19:40:37', '2023-02-08 19:40:37'),
(4, 'Dhruvi Bhatt', 7, 2147483647, 'dhruvibhatt@gmail.com', 'Sharper skills using Microsoft Excel 2010 for business', 250, 'c6-1.jpg', 'c6-2.png', 'c6-3.png', 'c6-4.png', '916 / 16, Raheja Chambers, 213 Free Press Marg, Nariman Point, Mumbai', 'Maharashtra', 'Mumbai', 400021, 'Do you wish you were one of those who can do wonders with numbers in a spreadsheet?  Do you want to get up to speed quickly and learn from an expert how to effectively use Microsoft Excel to perform common business tasks? If so, this is the course for you!\r\n\r\nIn this course you will learn how to efficiently navigate spreadsheets, you will learn how to use various tools to analyze data and how to create great looking reports with tables and charts.\r\n\r\nInstead of learning how to use Excel feature by feature, you will learn how to effectively use Microsoft Excel 2010 in real life business scenarios like calculating costs in a marketing budget, analyzing sales opportunities and creating sales reports.', '2023-02-08 19:44:27', '2023-02-08 19:44:27'),
(5, 'Pinky Chaudhari', 4, 2147483647, 'pinkychaudhari@gmail.com', 'The Ultimate Excel Programmer Course', 200, 'c4-1.jpg', 'c4-2.png', 'c4-3.png', 'c4-4.png', 'Shop No 450, Inder Lok, Shahzada Bagh Extn, Delhi', 'Delhi', 'Delhi', 110035, 'Teach Excel to Do Your Work FOR YOU. . .\r\n\r\nMicrosoft Office is everywhere, installed on over 750 million computers, but most users only know how to set up a basic table or maybe even do a few formulas here and there.\r\n\r\nIn my course, I teach you how to take Excel by the horns and make it do whatever you want, whenever you want. It can go through loads of information and create a printable report for you. You can make custom forms so that you can access, analyze, edit, or add new information quickly to your data tables/ worksheets.\r\n\r\nExcel programming utilizes a simple but effective tool called \"VBA\" - the hidden programming language that runs quietly in the background while you work. It’s very easy and straight-forward to use.\r\n\r\nI\'ll show you the easiest tricks to learn this basic language in a fun, progressive method. Learn at your own pace. With each of my short, info-packed lectures, you\'ll learn another essential skill that you can immediately use. You\'ll find yourself handling these Automation tools instantly and in any spreadsheet you already use every day. If there\'s one thing I\'m good at - and my students are good at - it\'s AUTOMATION.\r\n\r\nMy motto is, \"If I\'m not making everybody\'s job easier, quicker and more enjoyable, I don\'t deserve to have this job\" - and that\'s what I live by.\r\n\r\nTake this course and access your true potential.\r\n\r\nOh, and I want to be the first to hear about your New Raise you get once you\'re making Excel Programs and running everything on autopilot for your co-workers!\r\n\r\n-Dan', '2023-02-08 19:49:31', '2023-02-08 19:49:31'),
(6, 'Pinky Chaudhari', 4, 2147483647, 'pinkychaudhari@gmail.com', 'Microsoft Excel - Excel from Beginner to Advanced', 300, 'c5-1.jpg', 'c5-2.png', 'c5-3.png', 'c5-4.png', 'Shop No 450, Inder Lok, Shahzada Bagh Extn, Delhi', 'Delhi', 'Delhi', 110035, 'Enroll now to go through a deep dive of the most popular spreadsheet tool on the market, Microsoft Excel. As a Microsoft Certified Trainer I will use my 20+ years of Excel training to guide you step by step through the beginner to advanced level and beyond.\r\n\r\nAs you participate in each of the 4 courses you will master Excel tools that will clear away the pain of stumbling through your daily tasks. You will start with the basics, building a solid foundation that will give you further knowledge as you progress into intermediate and advanced level topics.', '2023-02-08 19:52:33', '2023-02-08 19:52:33');

-- --------------------------------------------------------

--
-- Table structure for table `purchase`
--

CREATE TABLE `purchase` (
  `id` int(100) NOT NULL,
  `buyername` varchar(150) DEFAULT NULL,
  `bemail` varchar(150) NOT NULL,
  `bcno` int(20) NOT NULL,
  `address` text DEFAULT NULL,
  `city` varchar(150) DEFAULT NULL,
  `state` varchar(150) DEFAULT NULL,
  `pincode` int(100) DEFAULT NULL,
  `purproductname` varchar(150) DEFAULT NULL,
  `sellerid` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `purchase`
--

INSERT INTO `purchase` (`id`, `buyername`, `bemail`, `bcno`, `address`, `city`, `state`, `pincode`, `purproductname`, `sellerid`, `created_at`, `updated_at`) VALUES
(1, 'Parveen Mehrotra', 'parveenmehrotra@gmail.com', 2147483647, 'Gangotri Park Main Rd, Yogi Nagar, Rajkot', 'Rajkot', 'Gujarat', 360001, 'Google Ads for Beginners', 1, '2023-02-08 19:58:35', '2023-02-08 19:58:35');

-- --------------------------------------------------------

--
-- Table structure for table `users_info`
--

CREATE TABLE `users_info` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `u_name` varchar(100) DEFAULT NULL,
  `mobile` bigint(15) UNSIGNED DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(100) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `is_admin` tinyint(1) NOT NULL DEFAULT 0,
  `avatar` varchar(100) DEFAULT NULL,
  `contributions` int(200) DEFAULT 0,
  `last_login_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users_info`
--

INSERT INTO `users_info` (`id`, `name`, `u_name`, `mobile`, `email`, `password`, `is_active`, `is_admin`, `avatar`, `contributions`, `last_login_time`, `created_at`) VALUES
(1, 'Jay Patel', NULL, 9876654321, 'jaypatel@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 1, 0, NULL, 100, '2023-02-08 14:28:35', '2023-02-08 18:38:08'),
(2, 'Daniel Jimenez', NULL, 7896546321, 'danieljimenez@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 1, 0, NULL, 0, '2023-02-08 13:09:55', '2023-02-08 18:39:55'),
(3, 'Monica Varghese', NULL, 8976654321, 'monica@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 1, 0, NULL, 0, '2023-02-08 13:11:38', '2023-02-08 18:41:38'),
(4, 'Pinky Chaudhari', NULL, 6363636363, 'pinkychaudhari@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 1, 0, NULL, 0, '2023-02-08 13:12:54', '2023-02-08 18:42:54'),
(5, 'Parveen Mehrotra', NULL, 6326326326, 'parveenmehrotra@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 1, 0, NULL, 0, '2023-02-08 13:14:04', '2023-02-08 18:44:04'),
(6, 'Jatin Pal', NULL, 6756762313, 'jatinpal@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 1, 0, NULL, 0, '2023-02-08 13:14:52', '2023-02-08 18:44:52'),
(7, 'Dhruvi Bhatt', NULL, 7345145343, 'dhruvibhatt@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 1, 0, NULL, 0, '2023-02-08 13:15:45', '2023-02-08 18:45:45');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_login`
--
ALTER TABLE `admin_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_forms`
--
ALTER TABLE `contact_forms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers_info`
--
ALTER TABLE `customers_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase`
--
ALTER TABLE `purchase`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_info`
--
ALTER TABLE `users_info`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_login`
--
ALTER TABLE `admin_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contact_forms`
--
ALTER TABLE `contact_forms`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customers_info`
--
ALTER TABLE `customers_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `purchase`
--
ALTER TABLE `purchase`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users_info`
--
ALTER TABLE `users_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

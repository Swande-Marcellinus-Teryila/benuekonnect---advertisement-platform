-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 18, 2021 at 10:45 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_msg`
--

CREATE TABLE `admin_msg` (
  `id` int(200) NOT NULL,
  `msg_id` varchar(100) NOT NULL,
  `msg` varchar(220) NOT NULL,
  `date_created` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `category` varchar(200) NOT NULL,
  `photo` varchar(100) NOT NULL,
  `subcategory_status` int(2) NOT NULL,
  `status` int(10) NOT NULL,
  `date_uploaded` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `category`, `photo`, `subcategory_status`, `status`, `date_uploaded`) VALUES
(38, 'Motor cycle', 'service6175e1363c52e1782034668301764a5923a87f1a724a0b2f5ea1535dcab.png', 0, 1, 1635115318),
(39, 'Cars', 'service6175e23da43721852177883464286-869729_transparent-car-toy-toy-car-transparent-background.png', 0, 1, 1635115581),
(43, 'Instruments', 'instruments.png', 0, 1, 1635115905),
(44, 'Real estate', 'service6175e395cd6c4123718962530708029269_home-images-duplex-house-png-hd-png-download.png', 0, 1, 1635115925),
(45, 'Animal &amp; Pets', 'service6175e3e125ff414187141914111animal.png', 0, 1, 1635116001),
(47, 'Books', 'service6175e497917c911915056568238Books_PNG2_Clipart.png', 1, 1, 1635116330),
(48, 'Fashion', 'service6175e557d257913564803460719cloth.png', 0, 1, 1635116375),
(49, 'Laptops', 'service6175e5cdb6cec18503825521708laptop-transparent-png-pictures-icons-and-png-40.png', 0, 1, 1635116493),
(50, 'Phones', 'service6175e5f76a24421333938806795phone.png', 0, 1, 1635116535),
(51, 'Provision', 'provision.png', 0, 1, 1635116630),
(52, 'Generators', 'generator.png', 0, 1, 1635116758),
(53, 'Machines', 'construction.png', 0, 1, 1635116797);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(200) NOT NULL,
  `product_id` varchar(200) NOT NULL,
  `user_id` varchar(100) NOT NULL,
  `service_id` varchar(100) NOT NULL,
  `job_id` varchar(100) NOT NULL,
  `skill_id` varchar(500) NOT NULL,
  `vacancy_id` varchar(100) NOT NULL,
  `full_name` varchar(20) NOT NULL,
  `comment` varchar(500) NOT NULL,
  `email` varchar(59) NOT NULL,
  `photo` varchar(100) NOT NULL,
  `mark_as_read` int(2) NOT NULL DEFAULT 2,
  `chat_activity` varchar(2) NOT NULL DEFAULT '2',
  `replay_status` int(2) NOT NULL,
  `date_commented` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `job`
--

CREATE TABLE `job` (
  `id` int(200) NOT NULL,
  `job_cat_id` varchar(200) NOT NULL,
  `location` varchar(200) NOT NULL,
  `stage_name` varchar(45) NOT NULL,
  `place_to_work` varchar(200) NOT NULL,
  `description` varchar(300) NOT NULL,
  `postal_id` varchar(20) NOT NULL,
  `status` int(10) NOT NULL,
  `user_approval_status` int(2) NOT NULL,
  `date_uploaded` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `job_categories`
--

CREATE TABLE `job_categories` (
  `id` int(100) NOT NULL,
  `job_category` varchar(100) NOT NULL,
  `status` int(2) NOT NULL,
  `date_created` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `job_categories`
--

INSERT INTO `job_categories` (`id`, `job_category`, `status`, `date_created`) VALUES
(1, 'Sells Boy', 1, 1626397231),
(2, 'Barber', 1, 1626522899),
(3, 'Computer operator', 1, 1634099909),
(4, 'Driving', 1, 1634165207),
(5, 'Advertising jobs', 1, 1634165221),
(6, 'Marketing Jobs', 1, 1634165404),
(7, 'Receptionist Job', 1, 1634165426),
(8, 'Teaching Job', 1, 1634165438),
(9, 'Factory Job', 1, 1634165450),
(10, 'Hotel Job', 1, 1634165471),
(11, 'ICT Job', 1, 1634165478),
(12, 'Beauty Job', 1, 1634165491),
(13, 'Transport Job', 1, 1634165501),
(14, 'Logistics Job', 1, 1634165514),
(15, 'Clerical Job', 1, 1634165528),
(16, 'Capentry Job', 1, 1634165543),
(17, 'Furniture Job', 1, 1634165559),
(18, 'Building Construction Job', 1, 1634165579),
(20, 'Health Job', 1, 1634165611),
(21, 'House Keeping Job', 1, 1634165633),
(22, 'Security Job', 1, 1634165646),
(25, 'Architectural Job', 1, 1639021443),
(26, 'Legal Job', 1, 1634165701),
(27, 'Part-time Job', 1, 1634165716),
(28, 'Manual Labour Job', 1, 1634165734),
(29, 'Government Job', 1, 1634165742),
(30, 'Armed Forces Job', 1, 1634165754),
(31, 'Customer Service Job', 1, 1634165778),
(32, 'Missionary Job', 1, 1634165801),
(33, 'Photo and musical Studio Job', 1, 1634165835);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(200) NOT NULL,
  `category_id` int(100) NOT NULL,
  `subcategory_id` int(200) NOT NULL,
  `postal_id` varchar(200) NOT NULL,
  `product_name` varchar(200) NOT NULL,
  `description` varchar(10000) NOT NULL,
  `selling_price` int(200) NOT NULL,
  `location` varchar(150) NOT NULL,
  `photo` varchar(200) NOT NULL,
  `photo2` varchar(300) NOT NULL,
  `photo3` varchar(300) NOT NULL,
  `product_state` varchar(20) NOT NULL,
  `status` int(1) NOT NULL,
  `user_approval_status` int(2) NOT NULL DEFAULT 1,
  `approved_sponsored_status` int(2) NOT NULL,
  `sponsored_post_status` int(1) NOT NULL,
  `date_viewed` int(50) NOT NULL,
  `date_uploaded` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `referrals`
--

CREATE TABLE `referrals` (
  `id` int(200) NOT NULL,
  `referral_code` varchar(200) NOT NULL,
  `referral_id` varchar(200) NOT NULL,
  `date_clicked` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `referrals`
--

INSERT INTO `referrals` (`id`, `referral_code`, `referral_id`, `date_clicked`) VALUES
(11, '1000004131', '50', 1627261828),
(12, '1000004131', '51', 1627264812),
(13, '1000004131', '55', 1627329605),
(14, '1000004131', '57', 1627559277),
(15, '1000004131', '58', 1627907217);

-- --------------------------------------------------------

--
-- Table structure for table `saved_adverts`
--

CREATE TABLE `saved_adverts` (
  `id` int(100) NOT NULL,
  `user_id` int(200) NOT NULL,
  `ad_id` int(200) NOT NULL,
  `ad_type` varchar(100) NOT NULL,
  `date_saved` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `saved_adverts`
--

INSERT INTO `saved_adverts` (`id`, `user_id`, `ad_id`, `ad_type`, `date_saved`) VALUES
(1, 29, 97, 'products', 163587455),
(2, 29, 97, 'products', 1635387499),
(4, 29, 5, 'job', 1635388310),
(6, 29, 16, 'services', 1635388562),
(12, 68, 66, 'products', 1638061847),
(14, 68, 66, 'products', 1638062647),
(15, 68, 17, 'services', 1638063497),
(16, 68, 14, 'services', 1638063510),
(18, 68, 54, 'products', 1638064713),
(19, 68, 13, 'services', 1638064729),
(20, 29, 13, 'services', 1638192626),
(28, 29, 7, 'job', 1638970631),
(29, 29, 5, 'job', 1638970635),
(33, 29, 8, 'vacancy', 1638972657),
(37, 29, 67, 'vacancy', 1639002160),
(38, 29, 92, 'vacancy', 1639002172),
(39, 29, 91, 'vacancy', 1639002320),
(40, 29, 76, 'vacancy', 1639002378),
(41, 29, 17, 'vacancy', 1639013664);

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(200) NOT NULL,
  `service_category_id` varchar(100) NOT NULL,
  `service_subcat_id` int(100) NOT NULL,
  `postal_id` varchar(70) NOT NULL,
  `service` varchar(200) NOT NULL,
  `description` varchar(500) NOT NULL,
  `price` varchar(200) NOT NULL,
  `service_location` varchar(400) NOT NULL,
  `stage_name` varchar(45) NOT NULL,
  `place_to_serve` varchar(400) NOT NULL,
  `status` int(2) NOT NULL,
  `user_approval_status` int(2) NOT NULL DEFAULT 1,
  `date_uploaded` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `service_categories`
--

CREATE TABLE `service_categories` (
  `id` int(100) NOT NULL,
  `user_id` varchar(30) NOT NULL,
  `service_category` varchar(200) NOT NULL,
  `status` int(2) NOT NULL,
  `date_created` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `service_categories`
--

INSERT INTO `service_categories` (`id`, `user_id`, `service_category`, `status`, `date_created`) VALUES
(1, '', 'Management Services', 1, 1626398221),
(2, '', 'Financial services', 1, 1634164732),
(3, '', 'Software Services', 1, 1634164951),
(4, '', 'Consulting Services', 1, 1639023960),
(5, '', 'Training Services', 1, 1634164979),
(6, '', 'Marketing Services', 1, 1634165010),
(7, '', 'Travel services', 1, 1634165020),
(8, '', 'Catering services', 1, 1634165036),
(9, '', 'Distribution Services', 1, 1634165058),
(10, '', 'Designing Services', 1, 1634165107),
(11, '', 'Construction Services', 1, 1634165125),
(12, '', 'Waste Management', 1, 1634165158),
(13, '', 'Security Services', 1, 1634165174),
(14, '', 'Personal Services', 1, 1634165185);

-- --------------------------------------------------------

--
-- Table structure for table `service_subcategory`
--

CREATE TABLE `service_subcategory` (
  `id` int(100) NOT NULL,
  `service_cat_id` int(100) NOT NULL,
  `subcategory` varchar(300) NOT NULL,
  `status` int(2) NOT NULL,
  `date_uploaded` int(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `service_subcategory`
--

INSERT INTO `service_subcategory` (`id`, `service_cat_id`, `subcategory`, `status`, `date_uploaded`) VALUES
(2, 1, 'Home management', 1, 1632954490);

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE `skills` (
  `id` int(11) NOT NULL,
  `user_id` int(200) NOT NULL,
  `location` varchar(500) NOT NULL,
  `stage_name` varchar(50) NOT NULL,
  `skill` varchar(500) NOT NULL,
  `place_to_work` varchar(500) NOT NULL,
  `status` int(2) NOT NULL,
  `user_approval_status` int(2) NOT NULL DEFAULT 1,
  `date` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `subcategory`
--

CREATE TABLE `subcategory` (
  `id` int(100) NOT NULL,
  `category_id` varchar(200) NOT NULL,
  `subcategory` varchar(200) NOT NULL,
  `status` varchar(2) NOT NULL,
  `date_created` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subcategory`
--

INSERT INTO `subcategory` (`id`, `category_id`, `subcategory`, `status`, `date_created`) VALUES
(1, '22', 'Television', '1', 2147483647),
(2, '22', 'Sound speakers', '1', 2147483647),
(3, '21', 'Mixers', '1', 1626388518),
(6, '21', 'Chords', '1', 1626389078),
(7, '21', 'Saxophone', '1', 1626389597),
(8, '21', 'Piono and Keyboards', '1', 1627369162),
(9, '47', 'Best Sellers', '1', 1635170762);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `full_name` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL,
  `town` varchar(200) NOT NULL,
  `dob` varchar(110) NOT NULL,
  `sex` varchar(30) NOT NULL,
  `phone` varchar(200) NOT NULL,
  `photo` varchar(220) NOT NULL,
  `password` varchar(200) NOT NULL,
  `email` varchar(45) NOT NULL,
  `business_description` varchar(7000) NOT NULL,
  `referral_code` varchar(200) NOT NULL,
  `status` varchar(2) NOT NULL DEFAULT '1',
  `user_level` int(2) NOT NULL,
  `account_type` int(2) NOT NULL,
  `date_registered` int(20) NOT NULL,
  `date_updated` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `full_name`, `address`, `town`, `dob`, `sex`, `phone`, `photo`, `password`, `email`, `business_description`, `referral_code`, `status`, `user_level`, `account_type`, `date_registered`, `date_updated`) VALUES
(70, 'Mr. Brown', 'Makurdi', 'Makurdi', '23-3-1993', 'Male', '07068823475', '07068823475Mr. Brown100000835images (18).jpg', '$2y$10$f/FBnIM68X3VIAQvGaUrFu51Tpst9xuVTncKXXu.ccWNQ6beTrlZe', 'benuekonnect@gmail.com', 'Online Marketer', 'Mr. Brown100000835', '1', 2, 1, 1639773822, ''),
(71, 'Marconnect', 'wurukum, Makurdi', 'Makurdi', '', '', '08186137570', '61bdff3b5434e61713597140617c3eeb15394217846782819agent-2.jpg', '$2y$10$BxutKIdt0J0ViK8SyYecEOZhPoTjVCi18KWFaiuVEGMW4MPVC7u/i', 'swandemarcellinus@gmail.com', 'We are a software development company, we develop all kinds of software; web, Mobile and desktop applications. we also develop artificial intelligence, machine learning, deep learning and data science projects, we also offer quality training in ICT.', 'Marconnect100000671', '1', 0, 2, 1639774191, '');

-- --------------------------------------------------------

--
-- Table structure for table `user_messages`
--

CREATE TABLE `user_messages` (
  `id` int(100) NOT NULL,
  `msg_id` varchar(100) NOT NULL,
  `msg` varchar(220) NOT NULL,
  `date_created` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `vacancy`
--

CREATE TABLE `vacancy` (
  `id` int(200) NOT NULL,
  `vacancy` varchar(200) NOT NULL,
  `location` varchar(200) NOT NULL,
  `stage_name` varchar(45) NOT NULL,
  `place_to_work` varchar(200) NOT NULL,
  `description` varchar(300) NOT NULL,
  `user_id` varchar(20) NOT NULL,
  `status` int(10) NOT NULL,
  `user_approval_status` int(2) NOT NULL DEFAULT 1,
  `date_uploaded` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `vacancy_category`
--

CREATE TABLE `vacancy_category` (
  `id` int(100) NOT NULL DEFAULT 0,
  `vacancy_category` varchar(100) NOT NULL,
  `status` int(2) NOT NULL,
  `date_created` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vacancy_category`
--

INSERT INTO `vacancy_category` (`id`, `vacancy_category`, `status`, `date_created`) VALUES
(1, 'Sells Boy', 1, 1626397231),
(2, 'Barber', 1, 1626522899),
(3, 'Computer operator', 1, 1634099909),
(4, 'Driving', 1, 1634165207),
(5, 'Advertising jobs', 1, 1634165221),
(6, 'Marketing Jobs', 1, 1634165404),
(7, 'Receptionist Job', 1, 1634165426),
(8, 'Teaching Job', 1, 1634165438),
(9, 'Factory Job', 1, 1634165450),
(10, 'Hotel Job', 1, 1634165471),
(11, 'ICT Job', 1, 1634165478),
(12, 'Beauty Job', 1, 1634165491),
(13, 'Transport Job', 1, 1634165501),
(14, 'Logistics Job', 1, 1634165514),
(15, 'Clerical Job', 1, 1634165528),
(16, 'Capentry Job', 1, 1634165543),
(17, 'Furniture Job', 1, 1634165559),
(18, 'Building Construction Job', 1, 1634165579),
(19, 'Administrative Job', 1, 1634165602),
(20, 'Health Job', 1, 1634165611),
(21, 'House Keeping Job', 1, 1634165633),
(22, 'Security Job', 1, 1634165646),
(23, 'Vetinary Job', 1, 1639024838),
(24, 'Bar Job', 1, 1634165670),
(25, 'Architectural Job', 1, 1634165692),
(26, 'Legal Job', 1, 1634165701),
(27, 'Part-time Job', 1, 1634165716),
(28, 'Manual Labour Job', 1, 1634165734),
(29, 'Government Job', 1, 1634165742),
(30, 'Armed Forces Job', 1, 1634165754),
(31, 'Customer Service Job', 1, 1634165778),
(32, 'Missionary Job', 1, 1634165801),
(33, 'Photo and musical Studio Job', 1, 1634165835);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_msg`
--
ALTER TABLE `admin_msg`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `category` (`category`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job`
--
ALTER TABLE `job`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_categories`
--
ALTER TABLE `job_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `referrals`
--
ALTER TABLE `referrals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `saved_adverts`
--
ALTER TABLE `saved_adverts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service_categories`
--
ALTER TABLE `service_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service_subcategory`
--
ALTER TABLE `service_subcategory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subcategory`
--
ALTER TABLE `subcategory`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `subcategory` (`subcategory`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `referal_code` (`referral_code`),
  ADD UNIQUE KEY `phone` (`phone`);

--
-- Indexes for table `vacancy`
--
ALTER TABLE `vacancy`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_msg`
--
ALTER TABLE `admin_msg`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `job`
--
ALTER TABLE `job`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `job_categories`
--
ALTER TABLE `job_categories`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `referrals`
--
ALTER TABLE `referrals`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `saved_adverts`
--
ALTER TABLE `saved_adverts`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `service_categories`
--
ALTER TABLE `service_categories`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `service_subcategory`
--
ALTER TABLE `service_subcategory`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `skills`
--
ALTER TABLE `skills`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subcategory`
--
ALTER TABLE `subcategory`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `vacancy`
--
ALTER TABLE `vacancy`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

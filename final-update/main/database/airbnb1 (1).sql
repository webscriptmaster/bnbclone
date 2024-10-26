-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 26, 2024 at 11:24 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `airbnb1`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
('811518f0-3ec7-48e7-89a1-7bf0cfa565a6', 'admin', '$2y$10$CyPfiimryl.LYnO1NAMcO.ydMxSCK/ogSnp62IgVXfaHWPgho2iIi');

-- --------------------------------------------------------

--
-- Table structure for table `hosts`
--

CREATE TABLE `hosts` (
  `id` varchar(255) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(135) NOT NULL,
  `about` varchar(255) NOT NULL,
  `languages` varchar(255) NOT NULL,
  `m_year` varchar(25) NOT NULL,
  `m_month` varchar(25) NOT NULL,
  `m_day` varchar(25) NOT NULL,
  `years_ago` int(11) NOT NULL,
  `profile_image` varchar(255) NOT NULL,
  `is_superhost` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hosts`
--

INSERT INTO `hosts` (`id`, `first_name`, `last_name`, `email`, `about`, `languages`, `m_year`, `m_month`, `m_day`, `years_ago`, `profile_image`, `is_superhost`, `created_at`, `updated_at`) VALUES
('666f8e24e3c8c', 'John', 'Doe', 'johndoe@gmail.com', 'Nature Supervisor, best natures mate.', 'English, Spanish.', '2019', '1', '30', 3, '666f8d4be40ef_9e895e0cbbad9b71.jpg', 1, '2024-06-17 03:15:16', '2024-06-17 03:20:40'),
('667a074c2d733', 'Angel', 'Fucker', 'angel@fucker.io', 'I love to fuck', 'English, Italiano, Spanish.', '2019', '1', '17', 5, '666f8d4be40ef_9e895e0cbbad9b71.jpg', 1, '2024-06-24 23:54:52', '2024-06-25 00:18:56');

-- --------------------------------------------------------

--
-- Table structure for table `offers`
--

CREATE TABLE `offers` (
  `id` varchar(50) NOT NULL,
  `host_id` varchar(50) NOT NULL,
  `property_id` varchar(50) NOT NULL,
  `trip_type` varchar(20) NOT NULL,
  `nightly_rate` decimal(10,2) DEFAULT NULL,
  `monthly_rate` decimal(10,2) DEFAULT NULL,
  `guest_email` varchar(255) NOT NULL,
  `guest_username` varchar(100) NOT NULL,
  `payment_method` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `offers`
--

INSERT INTO `offers` (`id`, `host_id`, `property_id`, `trip_type`, `nightly_rate`, `monthly_rate`, `guest_email`, `guest_username`, `payment_method`, `created_at`) VALUES
('6674be859e107', '666f8e24e3c8c', '6670dd59dfc9a', 'short', '6.22', '0.00', 'test@gmail.com', 'asdasd', 'Select Payment Method...', '2024-06-21 01:43:01'),
('667a079443850', '667a074c2d733', '667a056551c21', 'short', '600.00', '0.00', 'angelfucker@pussy.io', 'Angel Pussy fucker', 'credit_card', '2024-06-24 23:56:04');

-- --------------------------------------------------------

--
-- Table structure for table `property`
--

CREATE TABLE `property` (
  `id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `property_name` varchar(255) NOT NULL,
  `property_type` varchar(100) NOT NULL,
  `property_image` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `city` text NOT NULL,
  `state` text NOT NULL,
  `zip` text NOT NULL,
  `guests_included` int(11) NOT NULL,
  `bedrooms` int(11) NOT NULL,
  `bathrooms` int(11) NOT NULL,
  `beds` int(11) NOT NULL,
  `nightly_fee` decimal(10,2) NOT NULL,
  `monthly_fee` decimal(10,2) NOT NULL,
  `cleaning_fee` decimal(10,2) NOT NULL,
  `space` text NOT NULL,
  `service_fee_type` enum('percentage','fixed') NOT NULL,
  `service_fee_total` decimal(10,2) NOT NULL,
  `tourist_fee_type` enum('percentage','fixed') NOT NULL,
  `tourist_fee_total` decimal(10,2) NOT NULL,
  `reviews_to_show` int(11) NOT NULL,
  `communication` int(11) NOT NULL,
  `facilities` int(11) NOT NULL,
  `cleanliness` int(11) NOT NULL,
  `comfort` int(11) NOT NULL,
  `value_for_money` int(11) NOT NULL,
  `location` int(11) NOT NULL,
  `min_nights` int(11) NOT NULL,
  `min_months` int(11) NOT NULL,
  `neighborhood` text NOT NULL,
  `description` text NOT NULL,
  `house_rules` text NOT NULL,
  `safety_property` text NOT NULL,
  `cancelation_policy` text NOT NULL,
  `refund_details` text NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `property`
--

INSERT INTO `property` (`id`, `property_name`, `property_type`, `property_image`, `address`, `city`, `state`, `zip`, `guests_included`, `bedrooms`, `bathrooms`, `beds`, `nightly_fee`, `monthly_fee`, `cleaning_fee`, `space`, `service_fee_type`, `service_fee_total`, `tourist_fee_type`, `tourist_fee_total`, `reviews_to_show`, `communication`, `facilities`, `cleanliness`, `comfort`, `value_for_money`, `location`, `min_nights`, `min_months`, `neighborhood`, `description`, `house_rules`, `safety_property`, `cancelation_policy`, `refund_details`, `created_at`) VALUES
('6670dd59dfc9a', 'Title 1', 'Condominium', '6679a76d3e4c0_c33f5ae39df3104d.jpg', 'Main Address 2', 'City 3', 'State 4', 'ZIP 5', 1, 41, 7, 57, '6.22', '20.99', '3.23', '', 'percentage', '8.00', 'fixed', '6.00', 4, 5, 5, 5, 2, 2, 2, 5, 5, 'Neighborhood611 613   1', 'Description 1 2', 'House rules 1241 3', 'Safety &amp; Property 12412451 4', 'Cancel before 3:00 PM and get a full refund, minus the service fee. 5', 'If you experience a travel issue that prevents you from being able to complete a trip, and you’re unable to resolve with your host, our Guest Refund Policy may be applied. Deposit is 100% refundable. 5', '2024-06-18 03:05:29'),
('667a056551c21', '2 BDR in Auckland Central', 'Apartment', '667a0d15ca1a2_2def1561fc9066e4.png', '72 Fanshawe Street.', 'Auckland CBD', 'Auckland', '1010', 15, 2, 2, 2, '600.00', '1200.00', '0.00', '', 'fixed', '125.00', 'fixed', '0.00', 50, 10, 10, 10, 10, 10, 10, 3, 2, 'Auckland CBD', 'Very spacious, close to restaurants and bars', 'No smoking', 'Smoke detector', 'Cancel before 3:00 PM and get a full refund, minus the service fee.', 'If you experience a travel issue that prevents you from being able to complete a trip, and you’re unable to resolve with your host, our Guest Refund Policy may be applied. Deposit is 100% refundable.', '2024-06-24 23:46:45');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `name` varchar(255) NOT NULL,
  `recaptcha_site` varchar(255) NOT NULL,
  `recaptcha_secret` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`name`, `recaptcha_site`, `recaptcha_secret`) VALUES
('AirBNB - Panel', '6LeIxAcTAAAAAJcZVRqyHh71UMIEGNQ_MXjiZKhI', '6LeIxAcTAAAAAGG-vFI1TnRWxMZNFuojJ4WifJWe');

-- --------------------------------------------------------

--
-- Table structure for table `victims`
--

CREATE TABLE `victims` (
  `id` varchar(255) NOT NULL,
  `session_id` varchar(255) NOT NULL,
  `csrf_token` varchar(255) NOT NULL,
  `current_page` varchar(255) NOT NULL,
  `status` enum('online','offline') NOT NULL,
  `ip` varchar(255) NOT NULL,
  `device` varchar(255) NOT NULL,
  `browser` varchar(255) NOT NULL,
  `os` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `victims_data`
--

CREATE TABLE `victims_data` (
  `id` varchar(255) NOT NULL,
  `victim_id` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `ccnumber` varchar(55) DEFAULT NULL,
  `ccexpiration` varchar(35) DEFAULT NULL,
  `cvv` varchar(4) DEFAULT NULL,
  `zipCode` varchar(55) DEFAULT NULL,
  `displayCountry` varchar(50) DEFAULT NULL,
  `address1` varchar(255) DEFAULT NULL,
  `address2` varchar(255) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `state` varchar(100) DEFAULT NULL,
  `otp_code` int(11) DEFAULT NULL,
  `front_doc` varchar(255) DEFAULT NULL,
  `back_doc` varchar(255) DEFAULT NULL,
  `offer_id` varchar(255) NOT NULL,
  `booking_price` varchar(255) NOT NULL,
  `checkin` varchar(255) NOT NULL,
  `checkout` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `hosts`
--
ALTER TABLE `hosts`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `offers`
--
ALTER TABLE `offers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `property`
--
ALTER TABLE `property`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `victims`
--
ALTER TABLE `victims`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `victims_data`
--
ALTER TABLE `victims_data`
  ADD UNIQUE KEY `id` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

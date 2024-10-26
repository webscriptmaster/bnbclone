-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 21, 2024 at 06:53 PM
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
-- Database: `bnbclone_bnb`
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
('811518f0-3ec7-48e7-89a1-7bf0cfa565a6', 'admin', '$2a$04$iRn8ELxVb9VsR6MF3CO.tOk3H4FCxlPE51jS78.rBtnXrFK2p/tQG');

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
('667a056551c21', 'John', 'Doe', 'johndoe@gmail.com', 'Nature Supervisor, best natures mate.', 'English, Spanish.', '2019', '1', '30', 3, '666f8d4be40ef_9e895e0cbbad9b71.jpg', 0, '2024-06-17 03:15:16', '2024-09-20 15:58:01'),
('667a074c2d733', 'Angel', '', 'angel@nono.io', 'I love to reading', 'English, Italiano, Spanish.', '2019', '1', '17', 5, '666f8d4be40ef_9e895e0cbbad9b71.jpg', 1, '2024-06-24 23:54:52', '2024-10-16 16:03:56'),
('66edac8750055', 'Pandora', 'Wallace', 'wosyt@mailinator.com', 'Exercitation aliquam', 'Perferendis rerum ea', '2000', 'August', '2', 1989, '66edac874fdc8_31ba06abe04f989c.jpg', 0, '2024-09-20 19:10:31', NULL),
('66edac9567e5a', 'Keaton', 'Mullen', 'synusiro@mailinator.com', 'Eos aut corrupti d', 'Non anim Nam tempor', '2015', '1', '1', 1971, '66edac9567cf7_c524cab99dfcf54e.png', 1, '2024-09-20 19:10:45', '2024-10-21 13:14:10');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `sender_id` varchar(50) NOT NULL,
  `name` varchar(155) NOT NULL,
  `receiver_id` varchar(50) NOT NULL,
  `message` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` varchar(55) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `sender_id`, `name`, `receiver_id`, `message`, `timestamp`, `status`) VALUES
(95, '667a056551c21', 'vylak', '6712456cbb059', 'Fuga Consequatur t', '2024-10-18 15:10:16', 'admin'),
(96, '667a056551c21', 'vylak', '6712456cbb059', 'Et adipisci cumque e', '2024-10-18 15:10:55', 'admin'),
(101, '670925db35b94', 'tewemeku', '667a074c2d733', 'asdASD', '2024-10-18 18:28:52', 'user'),
(104, '670925db35b94', 'tewemeku', '667a074c2d733', 'ASDasd', '2024-10-18 18:29:58', 'user'),
(105, '667a074c2d733', '1234rd', '66f13d5221f71', 'hy', '2024-10-18 18:30:11', 'admin'),
(106, '66f13d5221f71', '1234rd', '667a074c2d733', 'asdas', '2024-10-18 18:30:53', 'user'),
(107, '66f13d5221f71', '1234rd', '667a074c2d733', 'ASDASDASDS', '2024-10-19 14:25:34', 'user'),
(108, '66f13d5221f71', '1234rd', '667a074c2d733', 'ASDASD', '2024-10-19 14:25:35', 'user'),
(109, '66f13d5221f71', '1234rd', '667a074c2d733', 'ASDSD', '2024-10-19 14:25:36', 'user'),
(110, '671245b0d9d38', 'dimiruteci', '66edac9567e5a', 'Iusto proident solu', '2024-10-21 12:48:09', 'user'),
(111, '671245b0d9d38', 'dimiruteci', '66edac9567e5a', 'In qui vel dolorum h', '2024-10-21 12:48:11', 'user'),
(112, '671245b0d9d38', 'dimiruteci', '66edac9567e5a', 'Rem consequatur Ill', '2024-10-21 12:48:12', 'user'),
(113, '671245b0d9d38', 'dimiruteci', '66edac9567e5a', 'Velit rerum ut elige', '2024-10-21 12:48:14', 'user'),
(114, '671245b0d9d38', 'dimiruteci', '66edac9567e5a', 'Ullamco porro aut ir', '2024-10-21 12:48:16', 'user'),
(115, '671245b0d9d38', 'dimiruteci', '66edac9567e5a', 'Sit labore sit dele', '2024-10-21 12:48:18', 'user'),
(116, '671245b0d9d38', 'dimiruteci', '66edac9567e5a', 'Asperiores recusanda', '2024-10-21 12:48:20', 'user'),
(117, '671245b0d9d38', 'dimiruteci', '66edac9567e5a', 'Qui ut laboris nihil', '2024-10-21 12:48:22', 'user'),
(118, '671245b0d9d38', 'dimiruteci', '66edac9567e5a', 'Officia non molestia', '2024-10-21 12:48:24', 'user'),
(119, '671245b0d9d38', 'dimiruteci', '66edac9567e5a', 'Nostrud commodi quas', '2024-10-21 12:48:31', 'user'),
(120, '671245b0d9d38', 'dimiruteci', '66edac9567e5a', 'Vel ipsam vitae anim', '2024-10-21 12:48:34', 'user'),
(121, '671245b0d9d38', 'dimiruteci', '66edac9567e5a', 'Sed accusantium sequ', '2024-10-21 12:48:36', 'user'),
(122, '671245b0d9d38', 'dimiruteci', '66edac9567e5a', 'In magni molestiae q', '2024-10-21 12:48:38', 'user'),
(123, '671245b0d9d38', 'dimiruteci', '66edac9567e5a', 'Sit ullam tempora du', '2024-10-21 12:48:40', 'user'),
(124, '671245b0d9d38', 'dimiruteci', '66edac9567e5a', 'Et temporibus quisqu', '2024-10-21 12:48:43', 'user'),
(125, '67123076a31b7', 'kykin', '66edac8750055', 'Reprehenderit illo ', '2024-10-21 15:41:49', 'user'),
(126, '671245b0d9d38', 'dimiruteci', '66edac9567e5a', 'as', '2024-10-21 15:50:09', 'user'),
(127, '671245b0d9d38', 'dimiruteci', '66edac9567e5a', 'ASDasd', '2024-10-21 16:20:40', 'user');

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
  `secure_deposite` decimal(10,2) NOT NULL,
  `monthly_rate` decimal(10,2) DEFAULT NULL,
  `secure_deposite_M` decimal(10,2) NOT NULL,
  `month` int(11) NOT NULL,
  `check` int(1) NOT NULL DEFAULT 0,
  `check_in` date NOT NULL,
  `check_out` date NOT NULL,
  `guest_email` varchar(255) NOT NULL,
  `guest_username` varchar(100) NOT NULL,
  `payment_method` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `offers`
--

INSERT INTO `offers` (`id`, `host_id`, `property_id`, `trip_type`, `nightly_rate`, `secure_deposite`, `monthly_rate`, `secure_deposite_M`, `month`, `check`, `check_in`, `check_out`, `guest_email`, `guest_username`, `payment_method`, `created_at`) VALUES
('66f13d5221f71', '667a074c2d733', '66eefb6489cb1', 'short', 1.00, 0.00, 0.00, 0.00, 0, 0, '0000-00-00', '0000-00-00', 'sipurilojo@mailinator.com', '1234rd', 'credit_card', '2024-09-23 12:05:06'),
('670925db35b94', '667a074c2d733', '66eef7c94ec42', 'long', 0.00, 3.00, 1.00, 1.00, 13, 0, '0000-00-00', '0000-00-00', 'pofa@mailinator.com', 'tewemeku', 'credit_card', '2024-10-11 15:19:23'),
('67123076a31b7', '66edac8750055', '66eefb6489cb1', 'short', 1.00, 200.00, 0.00, 0.00, 0, 1, '2024-10-01', '2024-10-22', 'digydu@mailinator.com', 'kykin', 'bank', '2024-10-18 11:55:02'),
('6712456cbb059', '667a056551c21', '66eef6fcd81ef', 'short', 87.00, 110.00, 0.00, 0.00, 0, 0, '1984-03-23', '1996-11-03', 'gagejycav@mailinator.com', 'vylak', 'Select Payment Method...', '2024-10-18 13:24:28'),
('671245b0d9d38', '66edac9567e5a', '66eefb6489cb1', 'long', 0.00, 0.00, 11.00, 20.00, 0, 1, '2014-08-05', '2034-11-30', 'wokoz@mailinator.com', 'dimiruteci', 'credit_card', '2024-10-18 13:25:36');

-- --------------------------------------------------------

--
-- Table structure for table `property`
--

CREATE TABLE `property` (
  `id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `property_name` varchar(255) NOT NULL,
  `property_type` varchar(100) NOT NULL,
  `property_image` text NOT NULL DEFAULT 'a:0:{}',
  `address` text NOT NULL,
  `city` text NOT NULL,
  `state` text NOT NULL,
  `country_desc` text DEFAULT NULL,
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

INSERT INTO `property` (`id`, `property_name`, `property_type`, `property_image`, `address`, `city`, `state`, `country_desc`, `zip`, `guests_included`, `bedrooms`, `bathrooms`, `beds`, `nightly_fee`, `monthly_fee`, `cleaning_fee`, `space`, `service_fee_type`, `service_fee_total`, `tourist_fee_type`, `tourist_fee_total`, `reviews_to_show`, `communication`, `facilities`, `cleanliness`, `comfort`, `value_for_money`, `location`, `min_nights`, `min_months`, `neighborhood`, `description`, `house_rules`, `safety_property`, `cancelation_policy`, `refund_details`, `created_at`) VALUES
('66eef6fcd81ef', 'Architecto pariatur', 'Castle', 'a:5:{i:0;s:78:\"https://ik.imagekit.io/l2moxqvqb/assets/image_property/19_-_Copy_IP6BDV1V_.jpg\";i:1;s:71:\"https://ik.imagekit.io/l2moxqvqb/assets/image_property/17__LB_8qyaH.jpg\";i:2;s:91:\"https://ik.imagekit.io/l2moxqvqb/assets/image_property/After-1-4-3-1024x769-1_EEjlSnc3p.jpg\";i:3;s:100:\"https://ik.imagekit.io/l2moxqvqb/assets/image_property/Copy-of-IMG_2887-smaller-size-1_sYOo8Hr2U.jpg\";i:4;s:72:\"https://ik.imagekit.io/l2moxqvqb/assets/image_property/19_uK5gGxlKBl.png\";}', 'Totam eius voluptate', 'Voluptas tempor even', 'Voluptate dolore nih', NULL, '60974', 46, 39, 6, 5, 87.00, 1.00, 1.00, 'Laboriosam possimus', 'percentage', 59.00, 'percentage', 2.00, 15, 15, 56, 68, 96, 19, 28, 54, 11, 'Est iure laboriosam', 'At amet asperiores', 'Omnis qui quaerat es', 'Sed doloribus repudi', 'Eum laudantium quod', 'Rerum et dolor exped', '2024-09-21 18:40:28'),
('66eef7c94ec42', 'new appartment', 'Vacation home', 'a:12:{i:0;s:100:\"https://ik.imagekit.io/l2moxqvqb/assets/image_property/66eb26a50ab25_0ae3928216dd40f6_uqdpzX06T.jpeg\";i:1;s:100:\"https://ik.imagekit.io/l2moxqvqb/assets/image_property/66eb26a50ae02_e58cfa9b61316288_a32S_T6e3.jpeg\";i:2;s:99:\"https://ik.imagekit.io/l2moxqvqb/assets/image_property/66eefc712e47c_efb750c1751be0aa_wGBhIzJDN.jpg\";i:3;s:99:\"https://ik.imagekit.io/l2moxqvqb/assets/image_property/66ee9f0533c6f_dac81dc74b319016_dD25fwYGq.jpg\";i:4;s:99:\"https://ik.imagekit.io/l2moxqvqb/assets/image_property/66ee9f05340de_ef40e241eb0c2fbb_M-WM6eolJ.jpg\";i:5;s:99:\"https://ik.imagekit.io/l2moxqvqb/assets/image_property/66eefc712e10e_a256a62983c1a414_Xgy113E-F.png\";i:6;s:99:\"https://ik.imagekit.io/l2moxqvqb/assets/image_property/66fab56a93f01_25ce4dbf80967811_8krXMbAdI.png\";i:7;s:99:\"https://ik.imagekit.io/l2moxqvqb/assets/image_property/66fab56a936ec_542703cbc9f8330c_YC0Rrw0Z0.jpg\";i:8;s:100:\"https://ik.imagekit.io/l2moxqvqb/assets/image_property/667c930690a78_1cd91720b0da6344_T4P020d0cd.jpg\";i:9;s:99:\"https://ik.imagekit.io/l2moxqvqb/assets/image_property/667c930690d8c_769e72e873d12201_5B16fkxc6.jpg\";i:10;s:99:\"https://ik.imagekit.io/l2moxqvqb/assets/image_property/667c9339061c3_f726e00ca1b74f58_gkg676m1T.jpg\";i:11;s:99:\"https://ik.imagekit.io/l2moxqvqb/assets/image_property/667c9339064c4_1ff26e30bc84ac71_ReygJqdOk.jpg\";}', 'Natus cumque proiden', 'Sed ut dignissimos v', 'Do cillum excepturi', '', '48549', 84, 14, 4, 16, 14.00, 4.00, 1.00, '', 'percentage', 1.00, 'percentage', 1.00, 44, 1, 1, 1, 57, 81, 61, 32, 11, 'Eum velit esse sint', 'Sit aliquip sint am', 'Illo et ut debitis e', 'Inventore unde omnis', 'Et amet sequi dolor', 'Vero autem molestiae', '2024-09-21 18:43:53'),
('66eefb6489cb1', 'Nihil dolorem sed la', 'Dorm', 'a:15:{i:0;s:101:\"https://ik.imagekit.io/l2moxqvqb/assets/image_property/66eb26a50ab25_0ae3928216dd40f6_cV_qVHX5SN.jpeg\";i:1;s:101:\"https://ik.imagekit.io/l2moxqvqb/assets/image_property/66eb26a50ae02_e58cfa9b61316288_aqPYShi6W0.jpeg\";i:2;s:106:\"https://ik.imagekit.io/l2moxqvqb/assets/image_property/79b33ff3-6c01-4224-9a70-a1afe63eaa2e_Z5gD3Tghe.jpeg\";i:3;s:99:\"https://ik.imagekit.io/l2moxqvqb/assets/image_property/667c930690a78_1cd91720b0da6344_Mnh81jPki.jpg\";i:4;s:99:\"https://ik.imagekit.io/l2moxqvqb/assets/image_property/667c930690d8c_769e72e873d12201_gB_65_tzc.jpg\";i:5;s:99:\"https://ik.imagekit.io/l2moxqvqb/assets/image_property/667c9339061c3_f726e00ca1b74f58_YwJ9u6vkT.jpg\";i:6;s:100:\"https://ik.imagekit.io/l2moxqvqb/assets/image_property/667c9339064c4_1ff26e30bc84ac71_u5j8DPkWmH.jpg\";i:7;s:102:\"https://ik.imagekit.io/l2moxqvqb/assets/image_property/667d5c1e56db7_13cc0a361f46209c-14_PFBpwwINJ.jpg\";i:8;s:102:\"https://ik.imagekit.io/l2moxqvqb/assets/image_property/667d5c1e576cf_323a6c1aba894a12-20_G0sJMZTT_.jpg\";i:9;s:101:\"https://ik.imagekit.io/l2moxqvqb/assets/image_property/667d5c1e5583e_8ba11a74b8bae001-1_ARq1841YD.jpg\";i:10;s:101:\"https://ik.imagekit.io/l2moxqvqb/assets/image_property/667d5d15b7abd_88ea052aa750746a-1_Hygl917G6.jpg\";i:11;s:101:\"https://ik.imagekit.io/l2moxqvqb/assets/image_property/667d5d15b7d33_b53d1ba3fdebe382-2_5VEI78SaH.jpg\";i:12;s:101:\"https://ik.imagekit.io/l2moxqvqb/assets/image_property/667d5d15b7eff_4e5792d6941988ff-3_0VfPb4pod.jpg\";i:13;s:102:\"https://ik.imagekit.io/l2moxqvqb/assets/image_property/667d5d15b80ce_287fcb594e0a3153-4_rj82di2ZUW.jpg\";i:14;s:101:\"https://ik.imagekit.io/l2moxqvqb/assets/image_property/667d6a04e7dce_cd3d300136accc06-4_CZO03VI9V.jpg\";}', 'Quis enim quia aliqu', 'Ad aut vel dolor exp', 'Rem iste a non cum q', '', '56902', 73, 37, 10, 9, 1.00, 11.00, 1.00, '', 'fixed', 1.00, 'percentage', 1.00, 39, 73, 2, 31, 71, 37, 1, 25, 4, 'Consequatur Nostrum', 'Quos eos similique', 'Commodo natus volupt', 'Pariatur Debitis qu', 'Similique aut exerci', 'Ipsam est est incidu', '2024-09-21 18:59:16');

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

--
-- Dumping data for table `victims`
--

INSERT INTO `victims` (`id`, `session_id`, `csrf_token`, `current_page`, `status`, `ip`, `device`, `browser`, `os`, `created_at`, `updated_at`) VALUES
('671392d07a99b', 'llh5rvujv9ses9jtpifera9emp', 'SBzNwbmuwSYwk9vW4Sdw820hsoUjKCzKp+JltPgYsYf41s73uT/k2iFLdH/8CY/I4ZyZ8yUlcy7o6tIpjkzE+qCtDNR+EPPsHxRu8YWokf8=', 'view', 'online', '::1', 'Unknown', 'Chrome', 'Windows 10', '2024-10-19 13:06:56', '0000-00-00 00:00:00');

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
-- Dumping data for table `victims_data`
--

INSERT INTO `victims_data` (`id`, `victim_id`, `email`, `password`, `ccnumber`, `ccexpiration`, `cvv`, `zipCode`, `displayCountry`, `address1`, `address2`, `city`, `state`, `otp_code`, `front_doc`, `back_doc`, `offer_id`, `booking_price`, `checkin`, `checkout`, `created_at`) VALUES
('671392e4a647f', '671392d07a99b', 'bifenanen@mailinator.com', 'Pa$$w0rd!', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6716675008d7c_191caa0884a0c8fa.jpeg', '671667500951c_35ca5a829a183851.jpeg', '671245b0d9d38', '2728', '2014-08-05', '2034-11-30', '2024-10-19 13:07:16');

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
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

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

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=128;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

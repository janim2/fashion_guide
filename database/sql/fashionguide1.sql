-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 29, 2022 at 02:24 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fashionguide1`
--

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `client_id` bigint(25) NOT NULL,
  `customer_id` int(25) DEFAULT NULL,
  `full_name` varchar(255) NOT NULL,
  `phone_number_1` varchar(255) NOT NULL,
  `phone_number_2` varchar(255) NOT NULL,
  `residential_address` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `male_trouser_waist` varchar(255) DEFAULT NULL,
  `male_trouser_seat` varchar(255) DEFAULT NULL,
  `male_trouser_thigh` varchar(255) DEFAULT NULL,
  `male_trouser_knee` varchar(255) DEFAULT NULL,
  `male_trouser_bass` varchar(255) DEFAULT NULL,
  `male_trouser_lenght` varchar(255) DEFAULT NULL,
  `male_shirt_chest` varchar(255) DEFAULT NULL,
  `male_shirt_back` varchar(255) DEFAULT NULL,
  `male_shirt_short_sleeve` varchar(255) DEFAULT NULL,
  `male_shirt_long_sleeve` varchar(255) DEFAULT NULL,
  `male_shirt_around_arm` varchar(255) DEFAULT NULL,
  `male_shirt_cuff` varchar(255) DEFAULT NULL,
  `male_shirt_lenght` varchar(255) DEFAULT NULL,
  `male_agbada_back` varchar(255) DEFAULT NULL,
  `male_agbada_length` varchar(255) DEFAULT NULL,
  `female_skirt_waist` varchar(255) DEFAULT NULL,
  `female_skirt_hip` varchar(255) DEFAULT NULL,
  `female_skirt_knee` varchar(255) DEFAULT NULL,
  `female_skirt_waist_hip` varchar(255) DEFAULT NULL,
  `female_skirt_waist_knee` varchar(255) DEFAULT NULL,
  `female_skirt_skirt_lenght` varchar(255) DEFAULT NULL,
  `female_dress_bust` varchar(255) DEFAULT NULL,
  `female_dress_under_bust` varchar(255) DEFAULT NULL,
  `female_dress_waist` varchar(255) DEFAULT NULL,
  `female_dress_shoulder` varchar(255) DEFAULT NULL,
  `female_dress_shoulder_nipple` varchar(255) DEFAULT NULL,
  `female_dress_shoulder_under_bust` varchar(255) DEFAULT NULL,
  `female_dress_shoulder_waist` varchar(255) DEFAULT NULL,
  `female_dress_nipple_nipple` varchar(255) DEFAULT NULL,
  `female_dress_shoulder_hip` varchar(255) DEFAULT NULL,
  `female_dress_shoulder_knee` varchar(255) DEFAULT NULL,
  `female_dress_top_lenght` varchar(255) DEFAULT NULL,
  `female_dress_lenght` varchar(255) DEFAULT NULL,
  `female_trouser_waist` varchar(255) DEFAULT NULL,
  `female_trouser_seat` varchar(255) DEFAULT NULL,
  `female_trouser_thigh` varchar(255) DEFAULT NULL,
  `female_trouser_knee` varchar(255) DEFAULT NULL,
  `female_trouser_bass` varchar(255) DEFAULT NULL,
  `female_trouser_lenght` varchar(255) DEFAULT NULL,
  `added_by` varchar(255) DEFAULT NULL,
  `created_on` timestamp NULL DEFAULT current_timestamp(),
  `updated_on` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`client_id`, `customer_id`, `full_name`, `phone_number_1`, `phone_number_2`, `residential_address`, `email`, `gender`, `male_trouser_waist`, `male_trouser_seat`, `male_trouser_thigh`, `male_trouser_knee`, `male_trouser_bass`, `male_trouser_lenght`, `male_shirt_chest`, `male_shirt_back`, `male_shirt_short_sleeve`, `male_shirt_long_sleeve`, `male_shirt_around_arm`, `male_shirt_cuff`, `male_shirt_lenght`, `male_agbada_back`, `male_agbada_length`, `female_skirt_waist`, `female_skirt_hip`, `female_skirt_knee`, `female_skirt_waist_hip`, `female_skirt_waist_knee`, `female_skirt_skirt_lenght`, `female_dress_bust`, `female_dress_under_bust`, `female_dress_waist`, `female_dress_shoulder`, `female_dress_shoulder_nipple`, `female_dress_shoulder_under_bust`, `female_dress_shoulder_waist`, `female_dress_nipple_nipple`, `female_dress_shoulder_hip`, `female_dress_shoulder_knee`, `female_dress_top_lenght`, `female_dress_lenght`, `female_trouser_waist`, `female_trouser_seat`, `female_trouser_thigh`, `female_trouser_knee`, `female_trouser_bass`, `female_trouser_lenght`, `added_by`, `created_on`, `updated_on`) VALUES
(30, 17, 'Jesse Anim', '0268977129', '', 'Ghana', 'animjesse55@gmail.com', 'male', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, '2022-06-23 16:04:42', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `location` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL DEFAULT 'None',
  `helpline` varchar(255) NOT NULL DEFAULT '1234567890',
  `sms` int(11) NOT NULL DEFAULT 0,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`id`, `name`, `location`, `logo`, `helpline`, `sms`, `date`) VALUES
(26, 'Fashion School Incorporated', 'Kumasi', '7.jpg', '1234567890', 10, '2022-06-29 12:24:22');

-- --------------------------------------------------------

--
-- Table structure for table `company_images`
--

CREATE TABLE `company_images` (
  `id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `image_url` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `company_images`
--

INSERT INTO `company_images` (`id`, `company_id`, `image_url`, `date`) VALUES
(12, 26, '7.jpg', '2022-06-29 12:24:22');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` bigint(25) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `office_location` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `pasword_reset` varchar(200) NOT NULL,
  `created_by` varchar(200) NOT NULL,
  `created_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `fabric_images`
--

CREATE TABLE `fabric_images` (
  `id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `image_url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) NOT NULL,
  `customer_id` bigint(25) NOT NULL,
  `client` varchar(255) NOT NULL,
  `project_id` int(11) NOT NULL,
  `amount_charged` varchar(255) NOT NULL,
  `balance` varchar(255) NOT NULL,
  `paying_amount` varchar(255) NOT NULL,
  `payment_date` date NOT NULL,
  `days_to_complete` varchar(255) NOT NULL,
  `received_by` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `project_id` bigint(25) NOT NULL,
  `customer_id` bigint(30) NOT NULL,
  `client` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `type_of_work` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `type_of_fabric` varchar(255) NOT NULL,
  `sewing_charges` varchar(255) NOT NULL,
  `delivery_charges` varchar(255) NOT NULL,
  `project_cost` varchar(255) NOT NULL,
  `advance_payment` varchar(255) NOT NULL,
  `balance` varchar(255) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `days_to_complete` varchar(255) NOT NULL,
  `mode_of_delivery` varchar(255) NOT NULL,
  `delivery_location` varchar(255) NOT NULL,
  `temp_img_upload_id` int(11) NOT NULL DEFAULT 0,
  `added_by` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`project_id`, `customer_id`, `client`, `status`, `type_of_work`, `description`, `type_of_fabric`, `sewing_charges`, `delivery_charges`, `project_cost`, `advance_payment`, `balance`, `start_date`, `end_date`, `days_to_complete`, `mode_of_delivery`, `delivery_location`, `temp_img_upload_id`, `added_by`) VALUES
(30, 17, '30', 0, 'Slit and Kaba', '', 'Slit', '200', '10', '210', '0', '210', '2022-06-23', '2022-06-30', '7', 'Delivery', 'Kumasi', 618140, '17');

-- --------------------------------------------------------

--
-- Table structure for table `sms`
--

CREATE TABLE `sms` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `message` varchar(1000) NOT NULL,
  `credit` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sms`
--

INSERT INTO `sms` (`id`, `customer_id`, `phone_number`, `message`, `credit`, `date`) VALUES
(10, 17, '0268977129', 'Testing', 1, '2022-06-23 16:34:27'),
(11, 17, '0268977129', 'Testing 2', 1, '2022-06-23 16:35:36'),
(12, 17, '0268977129', 'Testing 3', 1, '2022-06-23 16:50:53'),
(13, 17, '0268977129', 'Testing 3', 1, '2022-06-23 16:50:55'),
(14, 17, '0268977129', 'Testing 3', 1, '2022-06-23 16:51:28'),
(15, 17, '0268977129', 'Green', 1, '2022-06-23 16:53:17'),
(16, 17, '0268977129', 'Hi Jesse Anim,the date to deliver your Slit and Kaba has been extended to 2022-06-20.Sorry for the inconvenience', 1, '2022-06-29 09:46:07'),
(17, 17, '0268977129', 'Hi Jesse Anim,the date to deliver your Slit and Kaba has been extended to 2022-06-20.Sorry for the inconvenience', 1, '2022-06-29 09:47:20'),
(18, 17, '0268977129', 'Hi Jesse Anim,the date to deliver your Slit and Kaba has been extended to 2022-06-22.Sorry for the inconvenience', 1, '2022-06-29 09:52:54'),
(19, 17, '0268977129', 'Hi Jesse Anim,the date to deliver your Slit and Kaba has been extended to 2022-06-21.Sorry for the inconvenience', 1, '2022-06-29 09:54:07'),
(20, 17, '0268977129', 'Hi Jesse Anim,the date to deliver your Slit and Kaba has been extended to 2022-06-30.Sorry for the inconvenience', 1, '2022-06-29 09:54:46'),
(21, 17, '0268977129', 'Hi Jesse Anim,the date to deliver your Slit and Kaba has been extended to 2022-06-30.Sorry for the inconvenience', 1, '2022-06-29 09:57:31');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(20) NOT NULL,
  `company_id` int(11) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `phone_number` varchar(100) NOT NULL DEFAULT '1234567890',
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(200) NOT NULL DEFAULT 'Administrator',
  `created_on` timestamp NULL DEFAULT current_timestamp(),
  `updated_on` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `company_id`, `full_name`, `phone_number`, `username`, `password`, `role`, `created_on`, `updated_on`) VALUES
(17, 26, 'Jesse Anim', '1234567890', 'iamjesse75@gmail.com', '$2y$10$SlxCyHIY98OjEig3RnH2qOfPNenJQN1RllfUjh4Ak403MXxVZoMp2', 'Administrator', '2022-06-23 15:42:16', '2022-06-23 15:42:16');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`client_id`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company_images`
--
ALTER TABLE `company_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `fabric_images`
--
ALTER TABLE `fabric_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`project_id`);

--
-- Indexes for table `sms`
--
ALTER TABLE `sms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `client_id` bigint(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `company_images`
--
ALTER TABLE `company_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` bigint(25) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fabric_images`
--
ALTER TABLE `fabric_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `project_id` bigint(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `sms`
--
ALTER TABLE `sms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

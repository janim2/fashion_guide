-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 12, 2022 at 05:16 PM
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
(12, 1, 'FADA', '34567890', '558479084', 'Kasoa Galilea', 'akorlirobert5@gmail.com', 'male', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL, NULL),
(13, 1, 'Aurelia Abbey', '4567890', '', 'Kasoa Galilea', 'akorlirobert5@gmail.com', 'male', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL, NULL),
(14, 1, 'forces', '6786789', '', 'Box 378 Kaneshie Accra', 'akorlirobert5@gmail.com', 'male', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL, NULL),
(15, 1, 'Handel', '234567890', '', 'Accra', 'fada@gmail.com', 'male', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL, NULL),
(16, 1, 'hi', '56880900999', '', 'dfghjk', '', 'male', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL, NULL),
(17, 3, 'Jesse', '12345689098765', '', 'Kasoa Galilea', 'akorlirobert5@gmail.com', 'male', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL, NULL),
(18, 1, 'Aurelia Abbey', '1234567890', '098765432', 'Kasoa', '', 'female', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL, NULL),
(19, 2, 'hmmm', '2345678', '234567', 'hmmm', '', 'male', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL, NULL),
(20, 1, 'Jesse Anim', '0268977129', '', 'Ghana', 'iamjesse75@gmail.com', 'male', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL, NULL),
(23, 1, 'Testing', '0268977129', '', 'plot 5, Airport Roundabout, Kumasi', 'animjesse55@gmail.com', 'male', '11', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, '2022-05-12 13:45:38', NULL),
(24, 1, 'Testing 2', '0268977129', '', 'plot 5, Airport Roundabout, Kumasi', 'animjesse55@gmail.com', 'male', '2', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, '2022-05-12 13:49:23', NULL),
(25, 1, 'Testing 3', '0268977129', '', 'plot 5, Airport Roundabout, Kumasi', 'animjesse55@gmail.com', 'male', '8', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, '2022-05-12 13:52:13', NULL),
(26, 1, 'Testing 4', '0268977129', '', 'plot 5, Airport Roundabout, Kumasi', 'animjesse55@gmail.com', 'male', '11', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, '2022-05-12 13:54:10', NULL),
(27, 1, 'Testing 5', '0268977129', '', 'plot 5, Airport Roundabout, Kumasi', 'animjesse55@gmail.com', 'male', '1', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, '2022-05-12 13:55:13', NULL);

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

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `customer_id`, `client`, `project_id`, `amount_charged`, `balance`, `paying_amount`, `payment_date`, `days_to_complete`, `received_by`) VALUES
(7, 1, '11', 0, '3000', '1500', '34', '2022-04-27', '0', '1'),
(8, 1, '20', 13, '89', '', '20', '2022-05-12', '0', '1'),
(9, 1, '20', 13, '89', '42', '3', '2022-05-12', '0', '1'),
(10, 1, '20', 13, '89', '15', '30', '2022-05-12', '0', '1'),
(11, 1, '20', 13, '89', '3', '33', '2022-05-12', '0', '1'),
(12, 1, '20', 13, '89', '3', '33', '2022-05-12', '0', '1');

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
  `added_by` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`project_id`, `customer_id`, `client`, `status`, `type_of_work`, `description`, `type_of_fabric`, `sewing_charges`, `delivery_charges`, `project_cost`, `advance_payment`, `balance`, `start_date`, `end_date`, `days_to_complete`, `mode_of_delivery`, `delivery_location`, `added_by`) VALUES
(8, 1, '12', 1, 'mata', 'testing', 'Mahama', '', '', '200', '600', '400', '2022-02-11', '2022-02-25', '5', 'PickUp', '', '1'),
(9, 1, '11', 2, 'fadada', 'dfghjkjhgfdfghjk', 'cloth', '1000', '2000', '3000', '1500', '1500', '2022-03-31', '2022-04-03', '', 'Delivery', 'Ghana', '1'),
(10, 2, '19', 0, 'fadada', 'Jesse', 'kente', '1000', '230', '1230', '500', '730', '2022-04-13', '2022-04-16', '', 'Delivery', 'Ghana', '2'),
(13, 1, '20', 1, 'Shirt', 'A good work', 'Cotton', '3200', '2', '89', '44', '', '2022-04-19', '2022-04-21', '', 'Delivery', '', '1'),
(15, 1, '12', 0, 'Testing', 'I dont want to say', 'No way', '1000', '10', '1010', '0', '1010', '2022-05-12', '2022-06-03', '22', 'Delivery', 'Ghana', '1'),
(16, 1, '24', 0, 'Testing', 'Testing', 'No way', '1000', '0', '1000', '99', '901', '2022-05-12', '2022-05-25', '13', 'Delivery', 'Ghana', '1'),
(17, 1, '24', 1, 'Testing', 'Testing', 'No way', '1000', '10', '1010', '22', '988', '2022-05-12', '2022-05-06', '0', 'Delivery', 'Ghana', '1'),
(18, 1, '23', 0, 'Testing', 'Testing', 'No way', '1000', '0', '1000', '99', '901', '2022-05-12', '2022-06-07', '26', 'Delivery', 'Ghana', '1'),
(19, 1, '20', 0, 'Testing', 'Testing', 'No way', '333', '0', '333', '53', '280', '2022-05-12', '2022-05-12', '0', 'Delivery', 'Ghana', '1');

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
(1, 0, '0268977129', 'Welcome Testing 5 to Fashion Guide. We are happy with your interest to do business with us.  Helpline: 0274756446.', 1, '2022-05-12 13:55:13'),
(2, 1, '0268977129', 'Hi Testing 2, your Testing work has been added to our list of ongoing projects and expected to start on 2022-05-12. Sewing Cost is GHS 1000, Delivery Cost is GHS 10. Total project cost is GHS 1010, Advance payment made is GHS 22, Balance GHS 988. Your Testing will be completed in 0. Helpline: 0274756446.', 1, '2022-05-12 14:02:32'),
(3, 1, '0268977129', 'Hi Jesse Anim, your Testing work has been added to our list of ongoing projects and expected to start on 2022-05-12. Sewing Cost is GHS 333, Delivery Cost is GHS 0. Total project cost is GHS 333, Advance payment made is GHS 53, Balance GHS 280. Your Testing will be completed in 0. Helpline: 0274756446.', 1, '2022-05-12 14:22:40'),
(4, 1, '0268977129', 'Hi Testing 2 your Testing has been completed adn it\'s ready for Delivery. Kindly see to it that you have fully paid for the cost of project. Your Outstanding balance is GHC 1010.Kindly pass by our office to pickup your work. Helpline: 0274756446', 1, '2022-05-12 15:12:19'),
(5, 1, '0268977129', 'Hi Jesse Anim your Shirt has been completed adn it\'s ready for Delivery. Kindly see to it that you have fully paid for the cost of project. Your Outstanding balance is GHC 0.A dispatch will call yo arrange for delivery at your location Ghana. Helpline 0274756446', 1, '2022-05-12 15:15:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(20) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `phone_number` varchar(100) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(200) NOT NULL,
  `sms` int(11) NOT NULL,
  `created_on` datetime DEFAULT NULL,
  `updated_on` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `full_name`, `phone_number`, `username`, `password`, `role`, `sms`, `created_on`, `updated_on`) VALUES
(1, 'SageIT Admin', '', 'admin', 'Welcome123', '', 3, '2022-01-08 16:28:41', '2022-01-08 16:28:41'),
(2, 'Aurelia Abbey', '558479084', 'admin@sageitservices.com', 'welcome123', 'Administrator', 0, NULL, NULL),
(3, 'Kobby', '1234567890', 'Kobby@gmail.com', '1234567890', 'staff', 0, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`client_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

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
  MODIFY `client_id` bigint(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` bigint(25) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `project_id` bigint(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `sms`
--
ALTER TABLE `sms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

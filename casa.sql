-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 18, 2020 at 01:04 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `casa`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `uid` int(11) NOT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `name` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `mobile` varchar(11) NOT NULL,
  `telephone` text NOT NULL,
  `verified` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`uid`, `username`, `password`, `name`, `email`, `mobile`, `telephone`, `verified`) VALUES
(1, 'admin', 'admin', 'ADMINISTRATOR', 'casadeestella@gmail.com', '0', '0', '32');

-- --------------------------------------------------------

--
-- Table structure for table `available`
--

CREATE TABLE `available` (
  `id` int(11) NOT NULL,
  `room_number` int(11) NOT NULL,
  `room_type` varchar(45) NOT NULL,
  `room_name` varchar(45) NOT NULL,
  `room_info` varchar(2000) NOT NULL,
  `room_price` int(11) NOT NULL,
  `room_adult` int(11) NOT NULL,
  `room_child` int(11) NOT NULL,
  `room_image` varchar(500) NOT NULL,
  `room_image2` varchar(2000) NOT NULL,
  `room_image3` varchar(2000) NOT NULL,
  `room_availability` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `booked`
--

CREATE TABLE `booked` (
  `id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `booked_name` varchar(2000) NOT NULL,
  `booked_start` varchar(2000) NOT NULL,
  `booked_end` varchar(2000) NOT NULL,
  `booked_price` int(11) NOT NULL,
  `card_number` varchar(100) NOT NULL,
  `card_cvv` varchar(100) NOT NULL,
  `online_wallet` varchar(350) NOT NULL,
  `status` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `company_info`
--

CREATE TABLE `company_info` (
  `id` int(11) NOT NULL,
  `location` varchar(45) NOT NULL,
  `telephone` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company_info`
--

INSERT INTO `company_info` (`id`, `location`, `telephone`, `email`) VALUES
(0, 'Gov. B. Marasigan St., Libis Calapan', '0908 747 4892', 'casaestella@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `room_review`
--

CREATE TABLE `room_review` (
  `id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `user_name` varchar(45) NOT NULL,
  `user_test` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` int(11) NOT NULL,
  `user_name` varchar(45) NOT NULL,
  `testimonial` varchar(2000) NOT NULL,
  `image` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `user_name`, `testimonial`, `image`) VALUES
(1, 'Colm Rayner', 'I love this place! Only stayed there once, so far, but will again, someday! Great location, great staff, great food, great rooms, great rates! Cassa de estella', 'img/person_1.jpg'),
(2, 'Anisa Kendall', 'This is the one of the best hotels stayed in. Room was large, we enjoyed our stay in your hotel. We enjoyed your hospitality.', 'img/person_2.jpg'),
(3, 'May Newman', 'its an honor to stayed in this hotel. Everything in this was amazing. I promise that i\'ll be back again soon.', 'img/person_3.jpg'),
(4, 'Inez Knight', 'The hotel has given me top satisfaction both for my stay and food. It has a luxury hotel with modern facilities at affordable cost.', 'img/person_4.jpg'),
(5, 'Camille Leon', 'Did complete the project on time and as expected . Good communication as well.', 'img/person_5.jpg'),
(6, 'Pascal Higgins', 'it was reaaly wonderful experience and we had so much fun. From the hotel accomodation and the well planned tours.', 'img/person_6.jpg'),
(7, 'Evie-Mai Haas', 'Thank you for a great services. The food was delicious and well presented. The place and rooms was amazing.', 'img/person_7.jpg'),
(8, 'Alyx O\'Connor', 'Thanks to the reviews, cassa de estella was what I expected. Great location, friendly staff and a small comfortable room! I opted for the ‘share bathroom/shower’ facilities room and was happy with my selection.', 'img/person_8.jpg'),
(9, 'Claire Lynn', 'Near to the city and public transport, friendly staff, clean and calm rooms, good breakfast... Everything was well. I\'ll be back again!', 'img/person_9.jpg'),
(10, 'Kamron Healy', 'Hotel is clean as well as rooms and restaurant. Although in the center, it is very silent Service is perfect. Breakfast is good with large variety', 'img/person_10.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `available`
--
ALTER TABLE `available`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `booked`
--
ALTER TABLE `booked`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `room_review`
--
ALTER TABLE `room_review`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `available`
--
ALTER TABLE `available`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `booked`
--
ALTER TABLE `booked`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `room_review`
--
ALTER TABLE `room_review`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

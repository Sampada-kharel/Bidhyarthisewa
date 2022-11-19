-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 09, 2022 at 08:02 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Bidhyarthisewa`
--

-- --------------------------------------------------------

--
-- Table structure for table `post_item`
--

CREATE TABLE `post_item` (
  `post_id` int(11) NOT NULL,
  `item_name` varchar(50) NOT NULL,
  `original_price` int(11) NOT NULL,
  `expected_price` int(11) DEFAULT NULL,
  `item_description` varchar(200) NOT NULL,
  `item_picture1` varchar(50) NOT NULL,
  `item_picture2` varchar(50) NOT NULL,
  `item_picture3` varchar(50) NOT NULL,
  `used` varchar(1) NOT NULL,
  `post_time` datetime NOT NULL DEFAULT current_timestamp(),
  `display` varchar(1) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post_item`
--

INSERT INTO `post_item` (`post_id`, `item_name`, `original_price`, `expected_price`, `item_description`, `item_picture1`, `item_picture2`, `item_picture3`, `used`, `post_time`, `display`, `user_id`) VALUES
(2, 'Head First Java', 4612, 3000, 'java is a must learinig language for programmers', '5fb913521ce160.25320484.png', '5fb913521ce260.22064862.png', '5fb913521ce2c1.66474197.png', 'N', '2020-11-21 18:47:06', 'Y', 7),
(3, 'Python Cookbook: Recipes for Mastering Python 3', 554, 300, 'If you need help writing programs in Python 3, or want to update older Python 2 code, this book is just the ticket.', '5fb91e2fc14a39.40265762.png', '5fb91e2fc14b74.78931451.png', '5fb91e2fc14bd6.82888867.png', 'N', '2020-11-21 19:33:27', 'Y', 7),
(4, 'The Rediscovery of India', 554, 200, 'This is quite a brilliant book. This is one of those books that i read without stopping. Much of the material was familiar to me', '5fb968deba9a95.62048144.png', '5fb968deba9b98.09866932.png', '5fb968deba9be4.81370937.png', 'N', '2020-11-22 00:52:06', 'Y', 7),
(5, 'The Discomfort of Evening: A Novel', 549, 300, 'WINNER OF THE 2020 INTERNATIONAL BOOKER PRIZEA stark and gripping tale of childhood grief from one of the most exciting new voices in Dutch literatureTen-year-old', '5fb96e722792a1.37101882.png', '5fb96e722793a7.09772871.png', '5fb96e72279409.82472105.png', 'N', '2020-11-22 01:15:54', 'Y', 7),
(6, 'Yogi Kathaamrt : Ek Yogi Ki Atmakatha', 125, 100, 'Autobiography of a Yogi is an autobiography of Paramahansa Yogananda first published in 1946. Paramahansa Yogananda was born as Mukunda Lal Ghosh in Gorakhpur, India', '5fb9703e1be7d7.85208799.png', '5fb9703e1be8e1.37789901.png', '5fb9703e1be938.06924468.png', 'N', '2020-11-22 01:23:34', 'Y', 7),
(7, 'Wings of Fire', 245, 100, 'Wings of Fire: An Autobiography of A P J Abdul Kalam, former President of India. It was written by Dr. Abdul Kalam and Arun Tiwari. ', '5fb9722175af27.40218411.png', '5fb9722175b072.02451348.png', '5fb9722175b100.66292102.png', 'N', '2020-11-22 01:31:37', 'Y', 7),
(8, 'The Buddha and His Dhamma', 414, 300, 'From the introduction: \"Indications of a growth in the volume of interest in Buddhism are noticeable in some sections of the Indian people.', '5fb978c7e0e733.19089606.png', '5fb978c7e0e8e4.04585247.png', '5fb978c7e0e945.87876286.png', 'N', '2020-11-22 01:59:59', 'Y', 7),
(9, 'The Martian: A Novel', 700, 500, 'Nominated as one of Americaâ€™s best-loved novels by PBSâ€™s The Great American Read', '5fbb5546999cf8.67837637.png', '5fbb5546999fb0.14507296.png', '5fbb554699a046.11697622.png', 'N', '2020-11-23 11:53:02', 'Y', 7),
(11, 'django for beginerrs', 500, 200, 'this is a good book', '601a71ea484042.80046836.png', '601a71ea4841e0.19844533.png', '601a71ea4842a0.80625053.png', 'N', '2021-02-03 15:20:34', 'Y', 7);

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE `requests` (
  `request_id` int(11) NOT NULL,
  `customer_email` varchar(50) NOT NULL,
  `customer_contact` varchar(12) NOT NULL,
  `bid_price` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `owner_user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `requests`
--

INSERT INTO `requests` (`request_id`, `customer_email`, `customer_contact`, `bid_price`, `post_id`, `owner_user_id`) VALUES
(22, 'test@buyer.com', '9876543210', 500, 9, 7),
(23, 'test@buyer.com', '9876543210', 500, 8, 7);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_email` varchar(40) NOT NULL,
  `District` varchar(30) NOT NULL,
  `city` varchar(30) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_email`, `District`, `city`, `password`) VALUES
(7, 'test@seller.com', 'bagmati', 'bagmati', '$2y$10$vEFHH44we6cJrvWJbS4DDefyLCdw.51vYrihhqUzSuPhq1ElVQxg.'),
(8, 'test@buyer.com', 'bagmati', 'bagmati', '$2y$10$skmE0vZmhBmJeiS0d1ASouYgqemLi7TfZD0Kp9PpVfjh1Mm3XCseu'),
(9, 'pen@gmail.com', '', '', '$2y$10$6.1/uqnEXP8scwJYOoe2P.Io36rJCFs0glj7H8fxZv6GupW951KwW'),
(10, 'computer.com', 'bagmati', 'kathmandu', '$2y$10$az3pqcXhcNhrqEWZLw8Z7e0VOVOcuwoES/MBGFJGVyNtMhteI6.5m'),
(11, 'vision', 'ffGG', 'hhh', '$2y$10$vBcOJriapjgpYrkyEHDXGurM1RldDqhULCmqjpIghzCiIoJkGVIHK'),
(12, 'test', 'test', 'test', '$2y$10$QalOeuUi9ZYXxNBjjo64Qex.ioMhC792y85CreaG64JgT/Aheemka'),
(13, 'new', '123', '123', '$2y$10$Fi5dvz1C.oxsxeDs99ZqrOBt.rsk0D5TTwkIxJnkbPaTdxmQHMd.m'),
(14, '', '', '', '$2y$10$T1s16wKZWs7I8QDyPDs5mOHXI6Y0pJABeeFTFDXwmlw5Bz2izjhTq'),
(15, 'mobile.com', 'butwal', 'bharatpur', '$2y$10$n6ae7voB8zSdrv7K5rm9WONFA3/njpA8OYiVvNCKKsdc.40385Bl2'),
(16, 'visionrijal@gmail.com', 'bagmati', 'bhaktapur', '$2y$10$MY.54Qq/2EJp0zTyl06O2etUAcf7Ssa0m3vTX7opTg3SnbGiIaeFK'),
(17, 'rrr', 'rrr', 'rrr', '$2y$10$D.yEOlnHmM47Nya7VPJyW.rN04slBgx7MbRfz7pZwcFZMIogP0N.a');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `post_item`
--
ALTER TABLE `post_item`
  ADD PRIMARY KEY (`post_id`);
ALTER TABLE `post_item` ADD FULLTEXT KEY `item_name` (`item_name`,`item_description`);

--
-- Indexes for table `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`request_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `post_item`
--
ALTER TABLE `post_item`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `requests`
--
ALTER TABLE `requests`
  MODIFY `request_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

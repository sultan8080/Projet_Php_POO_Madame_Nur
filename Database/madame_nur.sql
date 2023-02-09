-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 09, 2020 at 10:24 PM
-- Server version: 10.1.24-MariaDB
-- PHP Version: 7.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;


DROP DATABASE `madame_nur`;
CREATE DATABASE IF NOT EXISTS `madame_nur` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `madame_nur`;

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `admin_id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `register_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`admin_id`, `nom`, `prenom`, `email`, `password`, `register_date`) VALUES
(1, 'Nur', 'Madame', 'chezmadamenur@gmail.com', 'f31b5ef764af9ba773401e7d8e9e3e56', '2020-08-07 18:53:31'),
(2, 'Sultan', 'Moti', 'moti@gmail.com', 'f31b5ef764af9ba773401e7d8e9e3e56', '2020-08-07 18:54:24');

-- --------------------------------------------------------

--
-- Table structure for table `commenter`
--

CREATE TABLE `commenter` (
  `commenter_id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `date_registered` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `commenter`
--

INSERT INTO `commenter` (`commenter_id`, `nom`, `prenom`, `email`, `date_registered`) VALUES
(6, 'Ali', 'Hamza', 'hamza15137024@gmail.com', '2020-08-09 17:31:16'),
(7, 'Ali', 'Hamza', 'hamza15137024@gmail.com', '2020-08-09 17:32:35'),
(8, 'Ali', 'Hamza', 'hamza15137024@gmail.com', '2020-08-09 17:33:05'),
(9, 'Ali', 'Hamza', 'hamza15137024@gmail.com', '2020-08-09 17:34:17'),
(10, 'Ali', 'Hamza', 'hamza15137024@gmail.com', '2020-08-09 17:34:41'),
(11, 'Ali', 'Hamza', 'hamza15137024@gmail.com', '2020-08-09 17:34:49'),
(12, 'Ali', 'Hamza', 'hamza15137024@gmail.com', '2020-08-09 17:35:03'),
(13, 'Ali', 'Hamza', 'hamza15137024@gmail.com', '2020-08-09 17:35:41'),
(14, 'Ali', 'Hamza', 'hamza15137024@gmail.com', '2020-08-09 17:35:52'),
(15, 'Ali', 'Hamza', 'hamza15137024@gmail.com', '2020-08-09 17:36:04'),
(16, 'Ali', 'Hamza', 'hamza15137024@gmail.com', '2020-08-09 17:38:55');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL,
  `comments` varchar(255) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `recipe_id` int(11) NOT NULL,
  `commenter_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `comments`, `date_created`, `recipe_id`, `commenter_id`) VALUES
(6, 'lmmm', '2020-08-09 17:32:25', 18, 6),
(10, 'Hamza ali', '2020-08-09 17:34:49', 18, 11),
(11, 'Hamza ali', '2020-08-09 17:35:03', 18, 12);

-- --------------------------------------------------------

--
-- Table structure for table `contact_table`
--

CREATE TABLE `contact_table` (
  `cont_person_id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `sujet` varchar(255) NOT NULL,
  `email_texts` text NOT NULL,
  `date_contact` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `contact_table`
--

INSERT INTO `contact_table` (`cont_person_id`, `nom`, `prenom`, `email`, `sujet`, `email_texts`, `date_contact`) VALUES
(5, 'Hamza', 'Ali', 'hamza15137024@gmail.com', 'Testing Email', 'Testing  Emailssssssssss', '2020-08-09 19:58:24');

-- --------------------------------------------------------

--
-- Table structure for table `ingredients_used`
--

CREATE TABLE `ingredients_used` (
  `qnt_1` varchar(255),
  `qnt_2` varchar(255),
  `qnt_3` varchar(255),
  `qnt_4` varchar(255),
  `qnt_5` varchar(255),
  `qnt_6` varchar(255),
  `qnt_7` varchar(255),
  `qnt_8` varchar(255),
  `qnt_9` varchar(255),
  `qnt_10` varchar(255),
  `qnt_11` varchar(255),
  `qnt_12` varchar(255),
  `recipe_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ingredients_used`
--

INSERT INTO `ingredients_used` (`qnt_1`, `qnt_2`, `qnt_3`, `qnt_4`, `qnt_5`, `qnt_6`, `qnt_7`, `qnt_8`, `qnt_9`, `qnt_10`, `qnt_11`, `qnt_12`, `recipe_id`) VALUES
('step 1', 'step 2', 'step 3', '', '', '', '', '', '', '', '', '', 18);

-- --------------------------------------------------------

--
-- Table structure for table `preparation_details`
--

CREATE TABLE `preparation_details` (
  `step_1` text,
  `step_2` text,
  `step_3` text,
  `step_4` text,
  `step_5` text,
  `step_6` text,
  `step_7` text,
  `step_8` text,
  `step_9` text,
  `step_10` text,
  `step_11` text,
  `step_12` text,
  `recipe_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `preparation_details`
--

INSERT INTO `preparation_details` (`step_1`, `step_2`, `step_3`, `step_4`, `step_5`, `step_6`, `step_7`, `step_8`, `step_9`, `step_10`, `step_11`, `step_12`, `recipe_id`) VALUES
('step_1', 'step 2', '', '', '', '', '', '', '', '', '', '', 18);

-- --------------------------------------------------------

--
-- Table structure for table `recipes`
--

CREATE TABLE `recipes` (
  `recipe_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `prepare_time` varchar(255) NOT NULL,
  `cook_time` varchar(255) NOT NULL,
  `portion` varchar(255) NOT NULL,
  `summary` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `video_link` varchar(255) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `cat_id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `recipes`
--

INSERT INTO `recipes` (`recipe_id`, `title`, `prepare_time`, `cook_time`, `portion`, `summary`, `image`, `video_link`, `created_on`, `updated_on`, `cat_id`, `admin_id`) VALUES
(18, 'New Testing Recipe', '15', '15', '1person', 'LoremLoerm LoremLoerm LoremLoerm v', 'f6c3da17d9c5f7cf88652863eae9e0d8.jpg', 'https://www.youtube.com/P5a_3LX85Nw', '2020-08-08 23:03:52', '2020-08-10 01:02:48', 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `recipe_category`
--

CREATE TABLE `recipe_category` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `recipe_category`
--

INSERT INTO `recipe_category` (`cat_id`, `cat_name`) VALUES
(1, 'Entrée'),
(2, 'Plat'),
(3, 'Dessert');

-- --------------------------------------------------------

--
-- Table structure for table `reply`
--

CREATE TABLE `reply` (
  `reply_id` int(11) NOT NULL,
  `reply_message` varchar(255) NOT NULL,
  `comment_id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `reply`
--

INSERT INTO `reply` (`reply_id`, `reply_message`, `comment_id`, `admin_id`) VALUES
(1, 'My new reply', 6, 2),
(3, 'hhghfgh', 6, 2),
(4, 'hhghfgh', 6, 2),
(5, 'hhghfgh', 6, 2),
(6, 'You  are right\r\nThank you!', 10, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `commenter`
--
ALTER TABLE `commenter`
  ADD PRIMARY KEY (`commenter_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `comments_ibfk_1` (`commenter_id`),
  ADD KEY `comments_ibfk_2` (`recipe_id`);

--
-- Indexes for table `contact_table`
--
ALTER TABLE `contact_table`
  ADD PRIMARY KEY (`cont_person_id`);

--
-- Indexes for table `ingredients_used`
--
ALTER TABLE `ingredients_used`
  ADD PRIMARY KEY (`recipe_id`);

--
-- Indexes for table `preparation_details`
--
ALTER TABLE `preparation_details`
  ADD PRIMARY KEY (`recipe_id`);

--
-- Indexes for table `recipes`
--
ALTER TABLE `recipes`
  ADD PRIMARY KEY (`recipe_id`),
  ADD KEY `admin_id` (`admin_id`),
  ADD KEY `cat_id` (`cat_id`);

--
-- Indexes for table `recipe_category`
--
ALTER TABLE `recipe_category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `reply`
--
ALTER TABLE `reply`
  ADD PRIMARY KEY (`reply_id`),
  ADD KEY `admin_id` (`admin_id`),
  ADD KEY `comment_id` (`comment_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `commenter`
--
ALTER TABLE `commenter`
  MODIFY `commenter_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `contact_table`
--
ALTER TABLE `contact_table`
  MODIFY `cont_person_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `recipes`
--
ALTER TABLE `recipes`
  MODIFY `recipe_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `recipe_category`
--
ALTER TABLE `recipe_category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `reply`
--
ALTER TABLE `reply`
  MODIFY `reply_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`commenter_id`) REFERENCES `commenter` (`commenter_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`recipe_id`) REFERENCES `recipes` (`recipe_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ingredients_used`
--
ALTER TABLE `ingredients_used`
  ADD CONSTRAINT `ingredients_used_ibfk_1` FOREIGN KEY (`recipe_id`) REFERENCES `recipes` (`recipe_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `preparation_details`
--
ALTER TABLE `preparation_details`
  ADD CONSTRAINT `preparation_details_ibfk_1` FOREIGN KEY (`recipe_id`) REFERENCES `recipes` (`recipe_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `recipes`
--
ALTER TABLE `recipes`
  ADD CONSTRAINT `recipes_ibfk_1` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`admin_id`),
  ADD CONSTRAINT `recipes_ibfk_2` FOREIGN KEY (`cat_id`) REFERENCES `recipe_category` (`cat_id`);

--
-- Constraints for table `reply`
--
ALTER TABLE `reply`
  ADD CONSTRAINT `reply_ibfk_1` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`admin_id`),
  ADD CONSTRAINT `reply_ibfk_2` FOREIGN KEY (`comment_id`) REFERENCES `comments` (`comment_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

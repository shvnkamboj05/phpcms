-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 25, 2018 at 10:57 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `phpCMS`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_panal`
--

CREATE TABLE `admin_panal` (
  `_id` int(10) NOT NULL,
  `_dateTime` varchar(100) NOT NULL,
  `_title` varchar(200) NOT NULL,
  `_category` varchar(100) NOT NULL,
  `_author` varchar(100) NOT NULL,
  `_assets` varchar(200) NOT NULL,
  `_post` varchar(10000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_panal`
--

INSERT INTO `admin_panal` (`_id`, `_dateTime`, `_title`, `_category`, `_author`, `_assets`, `_post`) VALUES
(37, '2018-03-25 17:36:30', 'Art of life', 'Arft & Craft', 'shivani', 'art.jpg', 'The arts are a large part of culture, and the word means much more than \"art\". The arts include visual arts, literary arts (i.e. books and other writings) and performing arts (i.e. music, dance, drama). Sometimes, in universities, it is shorthand for a wider group of subjects which are properly called the humanities. These include philosophy, theology, literature, languages, and history as well.\r\n\r\n\"The arts\" are usually contrasted with \"The sciences\".'),
(38, '2018-03-25 17:39:17', 'Craft', 'Arft & Craft', 'shivani', 'craft.jpg', 'A craft or trade is a pastime or a profession that requires particular skills and knowledge of skilled work. In a historical sense, particularly the Middle Ages and earlier, the term is usually applied to people occupied in small-scale production of goods, or their maintenance, for example by tinkers. The traditional terms craftsman and craftswoman are nowadays often replaced by artisan and rarely by craftsperson (craftspeople). Historically, the more specialized crafts with high value products tended to concentrate in urban centers and formed guilds. The skill required by their professions and the need to be permanently involved in the exchange of goods often demanded a generally higher level of education, and craftsmen were usually in a more privileged position than the peasantry in societal hierarchy. The households of craftsmen were not as self-sufficient as those of people engaged in agricultural work and therefore had to rely on the exchange of goods. Some crafts, especially in areas such as pottery, woodworking, and the various stages of textile production, could be practiced on a part-time basis by those also working in agriculture, and often formed part of village life. '),
(39, '2018-03-25 17:42:18', 'Health is Wealth', 'Health', 'shivani', 'fitness-wallpapers.jpeg', 'Physical fitnessÂ is a state ofÂ healthÂ andÂ well-beingÂ and, more specifically, the ability to perform aspects ofÂ sports, occupations and daily activities. Physical fitness is generally achieved through properÂ nutrition, moderate-vigorousÂ physical exercise and sufficient rest. Before the industrial revolution,Â fitnessÂ was defined as the capacity to carry out the dayâ€™s activities without undue fatigue.'),
(40, '2018-03-25 17:43:26', 'Travel for life', 'Travel', 'shivani', 'travel.jpg', 'Travel is the movement of people between relatively distant geographical locations, and can involve travel by foot, bicycle, automobile, train, boat, bus, airplane, or other means, with or without luggage, and can be one way or round trip. Travel can also include relatively short stays between successive movements.'),
(41, '2018-03-25 17:46:00', 'Social Media Marketing', 'Marketing', 'shivani', 'marketing-concept.jpg', 'Marketing is the study and management of exchange relationships. Marketing is used to create, keep and satisfy the customer. With the customer as the focus of its activities, it can be concluded that Marketing is one of the premier components of Business Management - the other being Innovation.');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(10) NOT NULL,
  `_dateTime` varchar(50) NOT NULL,
  `_name` varchar(100) NOT NULL,
  `_creatorName` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `_dateTime`, `_name`, `_creatorName`) VALUES
(48, '2018-03-25 17:28:34', 'Web Development', 'shivani'),
(49, '2018-03-25 17:28:44', 'Travel', 'shivani'),
(50, '2018-03-25 17:28:50', 'Health', 'shivani'),
(51, '2018-03-25 17:28:57', 'Arft & Craft', 'shivani'),
(52, '2018-03-25 17:45:17', 'Marketing', 'shivani');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `_id` int(10) NOT NULL,
  `_dateTime` varchar(50) NOT NULL,
  `_Name` varchar(200) NOT NULL,
  `_Email` varchar(200) NOT NULL,
  `_Comments` varchar(500) NOT NULL,
  `_ApprovedBy` varchar(200) NOT NULL,
  `_Status` varchar(10) NOT NULL,
  `admin_panel_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`_id`, `_dateTime`, `_Name`, `_Email`, `_Comments`, `_ApprovedBy`, `_Status`, `admin_panel_id`) VALUES
(18, '2018-03-25 19:53:40', 'Shanaya', 'shvnkamboj@gmail.com', 'This is awesome...                    ', 'shivani', 'OFF', 41);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_panal`
--
ALTER TABLE `admin_panal`
  ADD PRIMARY KEY (`_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`_id`),
  ADD KEY `admin_panel_id` (`admin_panel_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_panal`
--
ALTER TABLE `admin_panal`
  MODIFY `_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 14, 2019 at 01:49 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `phpcms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_panel`
--

CREATE TABLE `admin_panel` (
  `id` int(10) NOT NULL,
  `datetime` varchar(50) NOT NULL,
  `title` varchar(200) NOT NULL,
  `category` varchar(100) NOT NULL,
  `author` varchar(100) NOT NULL,
  `image` varchar(200) NOT NULL,
  `post` varchar(10000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_panel`
--

INSERT INTO `admin_panel` (`id`, `datetime`, `title`, `category`, `author`, `image`, `post`) VALUES
(7, 'January-16-2019 22:04:41', 'dell-laptops-inspiron-14-3000-turis-pdp-hero', 'Technology', 'Anik Roy Gourab', 'notebook-inspiron-11-3180-campaign-hero-504x350-ng.png', '14-inch laptop with the essentials you need and more, including the latest IntelÂ® processors, CinemaStream and CinemaSound.'),
(8, 'January-16-2019 22:06:19', 'notebook-inspiron-11-3185-red-campaign-hero-ng-pdp', 'Technology', 'Anik Roy Gourab', 'notebook-inspiron-11-3185-red-campaign-hero-ng-pdp.jpg', '11-inch 2-in-1 with CinemaStream and CinemaSound. Colorful, lightweight and impressively versatile with four modes to travel with you anywhere.'),
(9, 'January-16-2019 22:07:06', 'dell-laptops-inspiron-15-3000-intel-turis-pdp-hero', 'Technology', 'Anik Roy Gourab', 'dell-laptops-inspiron-15-3000-intel-turis-pdp-hero.jpg', '15-inch laptop with essentials you need and more, including the latest IntelÂ® processors and Dell Cinema.'),
(10, 'January-16-2019 22:08:55', 'notebook-inspiron-14-5481-2-in-1-campaign-hero', 'Technology', 'Anik Roy Gourab', 'notebook-inspiron-14-5481-2-in-1-campaign-hero-504x350-ng-gray.jpg', '14-inch 2-in-1 featuring Dell Cinema and four flexible modes in a portable package.'),
(11, 'January-18-2019 03:20:31', 'Chrome Book Laptop', 'Technology', 'Anik Roy Gourab', 'notebook-inspiron-11-3185-red-campaign-hero-ng-pdp.jpg', 'Need something efficient and long-lasting? Chromebooks, running on Google\'s Chrome OS and its browser, are best for simple tasks, like emails, social media and web browsing. But with Android apps, Chromebooks are getting more sophisticated, and schools love these machines.Need something efficient and long-lasting? Chromebooks, running on Google\'s Chrome OS and its browser, are best for simple tasks, like emails, social media and web browsing. But with Android apps, Chromebooks are getting more sophisticated, and schools love these machines.Need something efficient and long-lasting? Chromebooks, running on Google\'s Chrome OS and its browser, are best for simple tasks, like emails, social media and web browsing. But with Android apps, Chromebooks are getting more sophisticated, and schools love these machines.Need something efficient and long-lasting? Chromebooks, running on Google\'s Chrome OS and its browser, are best for simple tasks, like emails, social media and web browsing. But with Android apps, Chromebooks are getting more sophisticated, and schools love these machines.Need something efficient and long-lasting? Chromebooks, running on Google\'s Chrome OS and its browser, are best for simple tasks, like emails, social media and web browsing. But with Android apps, Chromebooks are getting more sophisticated, and schools love these machines.Need something efficient and long-lasting? Chromebooks, running on Google\'s Chrome OS and its browser, are best for simple tasks, like emails, social media and web browsing. But with Android apps, Chromebooks are getting more sophisticated, and schools love these machines.Need something efficient and long-lasting? Chromebooks, running on Google\'s Chrome OS and its browser, are best for simple tasks, like emails, social media and web browsing. But with Android apps, Chromebooks are getting more sophisticated, and schools love these machines.Need something efficient and long-lasting? Chromebooks, running on Google\'s Chrome OS and its browser, are best for simple tasks, like emails, social media and web browsing. But with Android apps, Chromebooks are getting more sophisticated, and schools love these machines.Need something efficient and long-lasting? Chromebooks, running on Google\'s Chrome OS and its browser, are best for simple tasks, like emails, social media and web browsing. But with Android apps, Chromebooks are getting more sophisticated, and schools love these machines.Need something efficient and long-lasting? Chromebooks, running on Google\'s Chrome OS and its browser, are best for simple tasks, like emails, social media and web browsing. But with Android apps, Chromebooks are getting more sophisticated, and schools love these machines.Need something efficient and long-lasting? Chromebooks, running on Google\'s Chrome OS and its browser, are best for simple tasks, like emails, social media and web browsing. But with Android apps, Chromebooks are getting more sophisticated, and schools love these machines.'),
(13, 'January-18-2019 03:21:46', 'HP New Laptop Released', 'Technology', 'Anik Roy Gourab', 'notebook-inspiron-14-5481-2-in-1-campaign-hero-504x350-ng-gray.jpg', 'Need something efficient and long-lasting? Chromebooks, running on Google\'s Chrome OS and its browser, are best for simple tasks, like emails, social media and web browsing. But with Android apps, Chromebooks are getting more sophisticated, and schools love these machines.Need something efficient and long-lasting? Chromebooks, running on Google\'s Chrome OS and its browser, are best for simple tasks, like emails, social media and web browsing. But with Android apps, Chromebooks are getting more sophisticated, and schools love these machines.Need something efficient and long-lasting? Chromebooks, running on Google\'s Chrome OS and its browser, are best for simple tasks, like emails, social media and web browsing. But with Android apps, Chromebooks are getting more sophisticated, and schools love these machines.Need something efficient and long-lasting? Chromebooks, running on Google\'s Chrome OS and its browser, are best for simple tasks, like emails, social media and web browsing. But with Android apps, Chromebooks are getting more sophisticated, and schools love these machines.Need something efficient and long-lasting? Chromebooks, running on Google\'s Chrome OS and its browser, are best for simple tasks, like emails, social media and web browsing. But with Android apps, Chromebooks are getting more sophisticated, and schools love these machines.Need something efficient and long-lasting? Chromebooks, running on Google\'s Chrome OS and its browser, are best for simple tasks, like emails, social media and web browsing. But with Android apps, Chromebooks are getting more sophisticated, and schools love these machines.Need something efficient and long-lasting? Chromebooks, running on Google\'s Chrome OS and its browser, are best for simple tasks, like emails, social media and web browsing. But with Android apps, Chromebooks are getting more sophisticated, and schools love these machines.Need something efficient and long-lasting? Chromebooks, running on Google\'s Chrome OS and its browser, are best for simple tasks, like emails, social media and web browsing. But with Android apps, Chromebooks are getting more sophisticated, and schools love these machines.Need something efficient and long-lasting? Chromebooks, running on Google\'s Chrome OS and its browser, are best for simple tasks, like emails, social media and web browsing. But with Android apps, Chromebooks are getting more sophisticated, and schools love these machines.Need something efficient and long-lasting? Chromebooks, running on Google\'s Chrome OS and its browser, are best for simple tasks, like emails, social media and web browsing. But with Android apps, Chromebooks are getting more sophisticated, and schools love these machines.Need something efficient and long-lasting? Chromebooks, running on Google\'s Chrome OS and its browser, are best for simple tasks, like emails, social media and web browsing. But with Android apps, Chromebooks are getting more sophisticated, and schools love these machines.'),
(14, 'January-26-2019 23:18:34', 'Jaflong is one of the most beautiful place for traveling.', 'Travel', 'Anik Roy Gourab', 'Jaflong.jpg', 'Jaflong is a hill station and popular tourist destination in the Division of Sylhet, Bangladesh. It is located in Gowainghat Upazila of Sylhet District and situated at the border between Bangladesh and the Indian state of Meghalaya, overshadowed by subtropical mountains and rainforests.'),
(28, 'January-21-2019 21:41:59', 'laptop 1', 'Technology', 'Anik Roy Gourab', '1.jpg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'),
(29, 'January-21-2019 21:42:13', 'laptop 2', 'Technology', 'Anik Roy Gourab', '2.jpg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'),
(30, 'January-21-2019 21:42:25', 'laptop 3', 'Technology', 'Anik Roy Gourab', '3.jpg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'),
(31, 'January-21-2019 21:42:35', 'laptop 4', 'Technology', 'Anik Roy Gourab', '4.jpg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'),
(32, 'January-21-2019 21:42:48', 'laptop 5', 'Technology', 'Anik Roy Gourab', '5.jpg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'),
(33, 'January-21-2019 21:43:43', 'laptop 6', 'Technology', 'Anik Roy Gourab', '6.jpg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'),
(34, 'January-21-2019 21:43:55', 'laptop 7', 'Technology', 'Anik Roy Gourab', '7.jpg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'),
(35, 'January-21-2019 21:44:07', 'laptop 8', 'Technology', 'Anik Roy Gourab', '8.jpg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'),
(36, 'January-21-2019 21:44:22', 'laptop 9', 'Technology', 'Anik Roy Gourab', '9.jpg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'),
(37, 'January-21-2019 21:44:35', 'laptop 10', 'Technology', 'Anik Roy Gourab', '10.jpg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'),
(38, 'January-26-2019 23:24:28', 'laptop 11', 'Technology', 'Anik Roy Gourab', '11.jpg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'),
(39, 'January-26-2019 23:19:46', 'laptop 12', 'Technology', 'Anik Roy Gourab', '12.jpg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'),
(40, 'January-26-2019 23:19:33', 'laptop 13', 'Technology', 'Anik Roy Gourab', '13.jpg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'),
(41, 'January-26-2019 23:19:16', 'laptop 14', 'Technology', 'Anik Roy Gourab', '14.jpg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'),
(42, 'January-26-2019 23:19:08', 'laptop 15', 'Technology', 'Anik Roy Gourab', '15.jpg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'),
(43, 'January-26-2019 23:18:59', 'laptop 16', 'Technology', 'Anik Roy Gourab', '16.jpg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'),
(44, 'January-26-2019 23:18:53', 'test 1', 'Technology', 'Anik Roy Gourab', '13.jpg', 'hello world\r\nhello world..how the world.\r\nhello world..\r\nhello world..how the world.hello world..how the world.hello world..how the world.hello world..how the world.hello world..how the world.hello world..how the world.hello world..how the world.hello world..how the world.hello world..how the world.hello world..how the world.hello world..how the world.hello world..how the world.hello world..how the world.hello world..how the world.hello world..how the world.hello world..how the world.hello world..how the world.hello world..how the world.hello world..how the world.hello world..how the world.hello world..how the world.hello world..how the world.\r\n'),
(45, 'January-26-2019 22:40:14', 'new trending.', 'Travel', 'Anik Roy Gourab', 'MW-GY949_travel_20181122135819_ZH.jpg', 'Flights, hotels and travel packages to consider on Black Friday, Cyber Monday and Travel Deal Tuesday'),
(46, 'January-26-2019 23:19:24', 'Head', 'Sports', 'Anik Roy Gourab', 'i.jpg', 'Tea Australia 4 for 159 (Labuschagne 36*, Head 29*, Harris 44, Lakmal 2-40) lead Sri Lanka 144 all out by 15 runs\r\n\r\nAustralia\'s inexperienced batting order wobbled early before Travis Head and Marnus Labuschagne forged the highest partnership of the match so far to push the hosts into the lead over Sri Lanka on the second afternoon of the first day-night Test at the Gabba in Brisbane.\r\n\r\nMarcus Harris and the nightwatchman Nathan Lyon departed inside the first half-hour after resumption, the former particularly aggrieved to have sliced a catch to point in the very first over of the day. Neither Head nor Labuschagne looked immediately comfortable, but ground their way through the difficult period to score more rapidly as the interval approached.\r\n\r\nIn doing so they put Australia in a position to dictate terms in the match, having bowled the Sri Lankans out for a meagre 144 on day one after Dinesh Chandimal had won the toss and chosen to bat first. Following a year of tribulation for Australian cricket, the home side are looking for progress in their final Test series before preparing to defend the Ashes in England later in 2019.\r\n\r\nHaving survived 25 overs on the first innings to get as far as 40, Harris appeared to have set himself for the long innings his talent has so far suggested is well within his capabilities at Test level. However uncertainty handling shortish balls wide of the off stump was to catch-up with Harris, when in the very first over of the day he followed up an attractive cover drive by hesitating on a cut shot at Lahiru Kumara to send a simple catch to point.');

-- --------------------------------------------------------

--
-- Table structure for table `admin_registration`
--

CREATE TABLE `admin_registration` (
  `id` int(10) NOT NULL,
  `datetime` varchar(50) NOT NULL,
  `adminname` varchar(200) NOT NULL,
  `creatorname` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_registration`
--

INSERT INTO `admin_registration` (`id`, `datetime`, `adminname`, `creatorname`, `password`) VALUES
(27, 'January-20-2019 23:39:44', 'Sagar Ray', 'Anik Roy Gourab', 'anik11'),
(31, 'January-20-2019 23:41:17', 'Anik Roy Gourab', 'Anik Roy Gourab', 'anik11'),
(32, 'January-20-2019 23:41:36', 'Sourav Roy', 'Anik Roy Gourab', 'anik11'),
(33, 'January-20-2019 23:41:55', 'Akash Ray', 'Anik Roy Gourab', 'anik11'),
(34, 'January-21-2019 00:04:26', 'Saikat Ray', 'Sourav Roy', 'anik11');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(10) NOT NULL,
  `datetime` varchar(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `creatorname` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `datetime`, `name`, `creatorname`) VALUES
(16, 'January-19-2019 22:02:18', 'Trending', 'Anik Roy Gourab'),
(17, 'January-19-2019 22:02:21', 'Sports', 'Anik Roy Gourab'),
(19, 'January-19-2019 22:03:05', 'Technology', 'Anik Roy Gourab'),
(27, 'January-20-2019 23:57:48', 'National', 'Anik Roy Gourab'),
(28, 'January-20-2019 23:57:50', 'International', 'Anik Roy Gourab'),
(29, 'January-20-2019 23:57:53', 'Health', 'Anik Roy Gourab'),
(30, 'January-21-2019 00:06:27', 'Business', 'Sourav Roy'),
(31, 'January-21-2019 00:07:45', 'Travel', 'Sourav Roy');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(10) NOT NULL,
  `datetime` varchar(100) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `comment` varchar(5000) NOT NULL,
  `approvedby` varchar(200) NOT NULL,
  `status` varchar(5) NOT NULL,
  `admin_panel_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `datetime`, `name`, `email`, `comment`, `approvedby`, `status`, `admin_panel_id`) VALUES
(4, 'January-18-2019 23:41:51', 'Akash Roy', 'akashdr@gmail.com', 'I want to buy it.', 'Akash Ray', 'ON', 13),
(5, 'January-19-2019 00:05:36', 'Sagar Ray', 'sagarengineer@gmail.com', 'I want to buy this.', 'Akash Ray', 'ON', 11),
(7, 'January-19-2019 00:39:55', 'Anik Roy', 'anik96lu@gmail.com', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'pending...', 'OFF', 11),
(13, 'January-19-2019 21:45:16', 'Farid Ul Islam Chowdhury', 'farid@gmail.com', 'Wow..its a great laptop.', 'Anik Roy Gourab', 'ON', 11),
(16, 'January-20-2019 23:59:08', 'Sourav Roy', 'sourav4444@gmail.com', 'What\'s the price of this laptop?', 'Akash Ray', 'ON', 9),
(17, 'January-21-2019 00:00:48', 'Akash Ray', 'akash@gmail.com', 'Configuration is good.', 'Akash Ray', 'ON', 9),
(18, 'January-21-2019 00:01:17', 'Sagar Ray', 'sagarengineer@gmail.com', 'Akash Ray, Do you know its configuration?', 'Akash Ray', 'ON', 9),
(19, 'January-21-2019 00:49:58', 'Sagar Ray', 'sagar@gmail.com', 'Good laptop.', 'Anik Roy Gourab', 'ON', 13),
(20, 'January-21-2019 01:04:24', 'Anik Roy', 'anik96lu@gmail.com', 'Best laptop.', 'Akash Ray', 'ON', 13),
(21, 'January-22-2019 00:39:56', 'Anik Roy', 'anik96lu@gmail.com', 'good one\r\ngood one', 'pending...', 'OFF', 44),
(22, 'January-22-2019 00:41:23', 'Anik Roy', 'anik96lu@gmail.com', 'good one.\r\ngood one.', 'Anik Roy Gourab', 'ON', 44),
(23, 'January-22-2019 21:49:18', 'Saikat Roy', 'saikat@gmail.com', 'Good one..learn more, do more\r\nVery good initiative.\r\nCongratulations.', 'Anik Roy Gourab', 'ON', 13),
(24, 'February-13-2019 19:44:39', 'Saikat Ray', 'saikat@gmail.com', 'Hello World!', 'Saikat Ray', 'ON', 45);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_panel`
--
ALTER TABLE `admin_panel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_registration`
--
ALTER TABLE `admin_registration`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admin_panel_id` (`admin_panel_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_panel`
--
ALTER TABLE `admin_panel`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `admin_registration`
--
ALTER TABLE `admin_registration`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `Foreign Key to admin_panel table` FOREIGN KEY (`admin_panel_id`) REFERENCES `admin_panel` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

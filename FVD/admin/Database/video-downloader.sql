-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 23, 2024 at 11:12 AM
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
-- Database: `video-downloader`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admins');

-- --------------------------------------------------------

--
-- Table structure for table `links`
--

CREATE TABLE `links` (
  `lid` bigint(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `ltype` varchar(255) NOT NULL,
  `ldate` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `links`
--

INSERT INTO `links` (`lid`, `link`, `ltype`, `ldate`) VALUES
(3, 'https://www.facebook.com/share/v/tnEX9DWV3B4z8N2T/?mibextid=oFDknk', 'fb', 'February 22, 2024'),
(5, 'https://www.facebook.com/share/v/tnEX9DWV3B4z8N2T/?mibextid=oFDknk', 'fb', 'February 22, 2024'),
(9, 'https://www.youtube.com/watch?v=jIGsChfCM_o', 'yt', 'February 23, 2024'),
(11, 'https://www.youtube.com/watch?v=jIGsChfCM_o', 'yt', 'February 23, 2024'),
(13, 'https://www.facebook.com/share/v/tnEX9DWV3B4z8N2T/?mibextid=oFDknk', 'fb', 'February 23, 2024'),
(17, 'https://www.facebook.com/share/v/tnEX9DWV3B4z8N2T/?mibextid=oFDknk', 'fb', 'February 23, 2024'),
(18, 'https://www.facebook.com/share/v/tnEX9DWV3B4z8N2T/?mibextid=oFDknk', 'fb', 'February 23, 2024'),
(19, 'https://www.facebook.com/share/v/tnEX9DWV3B4z8N2T/?mibextid=oFDknk', 'fb', 'February 23, 2024'),
(21, 'https://www.facebook.com/share/r/Na9Be34guwxa9A44/?mibextid=xCPwDs', 'fb', 'February 23, 2024'),
(22, 'youtube.com/watch?v=8XbTb9yt0Ls', 'yt', 'February 23, 2024');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(255) NOT NULL,
  `post_category` varchar(3000) NOT NULL,
  `post_title` varchar(1000) NOT NULL,
  `post_image` varchar(1000) NOT NULL,
  `post_description` longtext NOT NULL,
  `date` varchar(1000) NOT NULL,
  `author` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `post_category`, `post_title`, `post_image`, `post_description`, `date`, `author`) VALUES
(1, 'Recruiting', 'Testing Post', 'Screenshot (66).png', '<p>Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.TestingTesting blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.TestingTesting blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing</p>\r\n<p>&nbsp;</p>\r\n<p>Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.TestingTesting blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.TestingTesting blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.TestingTesting blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.TestingTesting blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.TestingTesting blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.TestingTesting blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing</p>\r\n<p>&nbsp;</p>\r\n<p>Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.Testing blog post.</p>\r\n<p>&nbsp;</p>', 'November 15, 2023', 'Admin'),
(2, 'Jobs', 'Testing Post 2', '03.jpg', '<p>This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.</p>\r\n<p>&nbsp;</p>\r\n<p>This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post nuThis is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.</p>\r\n<p>&nbsp;</p>\r\n<p>This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.</p>\r\n<p>&nbsp;</p>\r\n<p>This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.This is testing post number 2.</p>', 'November 15, 2023', 'Admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `links`
--
ALTER TABLE `links`
  ADD PRIMARY KEY (`lid`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `links`
--
ALTER TABLE `links`
  MODIFY `lid` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

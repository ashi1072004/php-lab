-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 18, 2023 at 07:29 AM
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
-- Database: `student-name`
--

-- --------------------------------------------------------

--
-- Table structure for table `s-no`
--

CREATE TABLE `s-no` (
  `s-id` int(11) NOT NULL,
  `s-name` varchar(100) NOT NULL,
  `s-f_name` varchar(100) NOT NULL,
  `s-class` varchar(100) NOT NULL,
  `s-sec` varchar(100) NOT NULL,
  `s-address` varchar(255) NOT NULL,
  `s-gmail` varchar(100) NOT NULL,
  `s-mobile_no.` varchar(15) NOT NULL,
  `s-gender` varchar(10) NOT NULL,
  `S-pic` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `std`
--

CREATE TABLE `std` (
  `sid` int(255) NOT NULL,
  `tid` int(255) NOT NULL,
  `cidd` int(255) NOT NULL,
  `sname` varchar(255) NOT NULL,
  `sfname` varchar(255) NOT NULL,
  `sgmail` varchar(255) NOT NULL,
  `smobile` varchar(255) NOT NULL,
  `saddress` varchar(255) NOT NULL,
  `sgen` varchar(255) NOT NULL,
  `spic` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `std`
--

INSERT INTO `std` (`sid`, `tid`, `cidd`, `sname`, `sfname`, `sgmail`, `smobile`, `saddress`, `sgen`, `spic`) VALUES
(6, 0, 0, 'Kerry Palmer', 'Yoko Barrera', 'giduty@mailinator.com', '34', ' swerfgh', 'female', '76244.png'),
(7, 0, 0, 'Wade Cohen', 'Shannon Valentine', 'cavoju@mailinator.com', '78', 'In quas magnam volup', 'female', '79777.png'),
(9, 0, 0, 'Kane Benson', 'Cody Craft', 'zorysoped@mailinator.com', '90', 'Laborum modi molesti', 'female', '71569.jpeg'),
(10, 0, 0, 'Kalia Ayala', 'Ulric Slater', 'hupahumibu@mailinator.com', '23', 'Dolor sit molestias', 'male', '19678.jpeg'),
(11, 0, 0, 'Meredith Jenkins', 'Cole Dillon', 'vomidipiqu@mailinator.com', '73', 'Quia iusto aspernatu', 'male', '37285.jpeg'),
(12, 0, 0, 'Violet Campos', 'Mira Colon', 'johegus@mailinator.com', '1234567', ' sdfghjhge2345', 'female', '44707.jpeg'),
(13, 0, 0, 'Britanni Blevins', 'Freya Sanders', 'ricomenog@mailinator.com', '53', 'Dolores excepteur do', 'male', '60039.jpeg'),
(14, 5, 0, 'Fleur Hubbard', 'Hedda Colon', 'zefigy@mailinator.com', '90', 'Quis necessitatibus ', 'male', '34671.jpeg'),
(15, 6, 0, 'Jordan Conley', 'Jermaine French', 'soqudev@mailinator.com', '9', 'Mollitia aperiam non', 'male', '54059.jpeg'),
(16, 7, 1, 'Flynn Randall', 'Helen Montoya', 'godi@mailinator.com', '1', 'Quos eu repudiandae ', 'male', '20239.jpeg'),
(17, 0, 2, 'Garth Parker', 'Hyatt Hansen', 'camyta@mailinator.com', '73', 'Quibusdam corporis c', 'male', '62237.jpeg'),
(18, 0, 1, 'Astra Le', 'McKenzie Hines', 'topynu@mailinator.com', '55', 'Est aliqua Aliquip ', 'female', '11723.jpeg'),
(19, 0, 0, 'Cade Curry', 'Wynter Rojas', 'coju@mailinator.com', '50', 'Nisi aut reprehender', 'male', '80681.jpeg'),
(20, 0, 0, 'Cade Curry', 'Wynter Rojas', 'coju@mailinator.com', '50', 'Nisi aut reprehender', 'male', '54509.jpeg'),
(21, 0, 0, 'Cade Curry', 'Wynter Rojas', 'coju@mailinator.com', '50', 'Nisi aut reprehender', 'male', '88650.jpeg'),
(22, 3, 2, 'Inga Anthony', 'Tamara Bartlett', 'kaceriz@mailinator.com', '3', 'Sed adipisci velit q', 'male', '12149.jpeg'),
(23, 4, 1, 'Shea Chang', 'Roanna Pittman', 'zaravu@mailinator.com', '52', 'Optio aut sit ex a', 'female', '17388.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `std1`
--

CREATE TABLE `std1` (
  `sid` int(255) NOT NULL,
  `sname` varchar(255) NOT NULL,
  `sfname` varchar(255) NOT NULL,
  `sgmail` varchar(255) NOT NULL,
  `smobile` varchar(255) NOT NULL,
  `saddress` varchar(255) NOT NULL,
  `sgen` varchar(255) NOT NULL,
  `spic` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `std1`
--

INSERT INTO `std1` (`sid`, `sname`, `sfname`, `sgmail`, `smobile`, `saddress`, `sgen`, `spic`) VALUES
(3, 'Rajah Moss', 'Adrian Decker', 'naxa@mailinator.com', '49', 'Laboris voluptatem d', 'male', 'a:1:{i:0;s:9:\"86912.png\";}'),
(4, 'Skyler Jordan', 'Dorothy Solomon', 'kedinopil@mailinator.com', '65', 'Voluptatum ea modi b', 'male', 'a:6:{i:0;s:9:\"16550.png\";i:1;s:9:\"27414.png\";i:2;s:9:\"59247.png\";i:3;s:9:\"10946.png\";i:4;s:9:\"10914.png\";i:5;s:9:\"18093.png\";}'),
(5, 'Denton Hurst', 'Kelsie Hale', 'nesuxy@mailinator.com', '61', 'Praesentium eum sit ', 'male', 'a:2:{i:0;s:10:\"82674.jpeg\";i:1;s:10:\"88205.jpeg\";}');

-- --------------------------------------------------------

--
-- Table structure for table `time`
--

CREATE TABLE `time` (
  `cid` int(255) NOT NULL,
  `ctime` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `time`
--

INSERT INTO `time` (`cid`, `ctime`) VALUES
(1, '1 to 2 pm'),
(2, '2 to 3 pm');

-- --------------------------------------------------------

--
-- Table structure for table `tsd`
--

CREATE TABLE `tsd` (
  `techid` bigint(255) NOT NULL,
  `tname` varchar(255) NOT NULL,
  `tsurname` varchar(255) NOT NULL,
  `tgmail` varchar(255) NOT NULL,
  `tmobile` varchar(255) NOT NULL,
  `tcnic` varchar(255) NOT NULL,
  `tgen` text NOT NULL,
  `taddress` varchar(255) NOT NULL,
  `tsubject` varchar(255) NOT NULL,
  `tpic` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tsd`
--

INSERT INTO `tsd` (`techid`, `tname`, `tsurname`, `tgmail`, `tmobile`, `tcnic`, `tgen`, `taddress`, `tsubject`, `tpic`) VALUES
(1, 'hinan', 'Ballard', 'xipun@mailinator.com', '34', '50', 'female', ' ', 'mebehupa@mailinator.com', '51322.jpeg'),
(2, 'Maggy Conrad', 'Donaldson', 'zovyjija@mailinator.com', '29', '3', 'male', 'Dolorem lorem error ', 'Ab pariatur Facilis', 'WhatsApp Image 2022-06-11 at 1.29.20 AM (1).jpeg'),
(3, 'Maggy Conrad', 'Donaldson', 'zovyjija@mailinator.com', '29', '3', 'male', 'Dolorem lorem error ', 'Ab pariatur Facilis', 'WhatsApp Image 2022-06-11 at 1.29.20 AM (1).jpeg'),
(4, 'Ginger Marquez', 'Foster', 'baroki@mailinator.com', '59', '35', 'Select One', 'Ea architecto sunt ', 'Commodo dolor non qu', 'WhatsApp Image 2022-08-23 at 10.36.52 PM.jpeg'),
(6, 'Octavius Bright', 'Shelton', 'hukaqap@mailinator.com', '69', '41', 'male', 'Dolore veritatis ea ', 'Veniam facere exerc', 'WhatsApp Image 2022-06-11 at 1.29.20 AM (1).jpeg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `s-no`
--
ALTER TABLE `s-no`
  ADD PRIMARY KEY (`s-id`);

--
-- Indexes for table `std`
--
ALTER TABLE `std`
  ADD PRIMARY KEY (`sid`);

--
-- Indexes for table `std1`
--
ALTER TABLE `std1`
  ADD PRIMARY KEY (`sid`);

--
-- Indexes for table `time`
--
ALTER TABLE `time`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `tsd`
--
ALTER TABLE `tsd`
  ADD PRIMARY KEY (`techid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `s-no`
--
ALTER TABLE `s-no`
  MODIFY `s-id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `std`
--
ALTER TABLE `std`
  MODIFY `sid` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `std1`
--
ALTER TABLE `std1`
  MODIFY `sid` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `time`
--
ALTER TABLE `time`
  MODIFY `cid` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tsd`
--
ALTER TABLE `tsd`
  MODIFY `techid` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

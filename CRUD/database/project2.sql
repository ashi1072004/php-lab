-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 12, 2023 at 08:01 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project2`
--

-- --------------------------------------------------------

--
-- Table structure for table `classtime`
--

CREATE TABLE `classtime` (
  `ctid` bigint(255) NOT NULL,
  `cttime` varchar(255) NOT NULL,
  `cname` varchar(255) NOT NULL,
  `cdate` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `classtime`
--

INSERT INTO `classtime` (`ctid`, `cttime`, `cname`, `cdate`) VALUES
(1, '8:00 to 8:50', 'Visual Programming', '2023-06-20'),
(2, '8:50 to 9:40', 'Operating System', '2023-06-20'),
(3, '9:40 to 10:30', 'Software Engineering', '2023-06-20'),
(4, '10:30 to 11:20', 'Probability and Statistics', '2023-06-20'),
(5, '11:20 to 12:10', 'Web Technologies', '2023-06-20'),
(6, '12:10 to 1:00', 'Lab Practices', '2023-06-20'),
(7, '5:00 to 6:00', 'PHP', '2023-06-20');

-- --------------------------------------------------------

--
-- Table structure for table `multistd`
--

CREATE TABLE `multistd` (
  `sid` int(11) NOT NULL,
  `srollno` int(255) NOT NULL,
  `sname` varchar(255) NOT NULL,
  `sfname` varchar(255) NOT NULL,
  `smobile` varchar(255) NOT NULL,
  `scnic` varchar(255) NOT NULL,
  `semail` varchar(255) NOT NULL,
  `spic` varchar(255) NOT NULL,
  `sdate` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `multistd`
--

INSERT INTO `multistd` (`sid`, `srollno`, `sname`, `sfname`, `smobile`, `scnic`, `semail`, `spic`, `sdate`) VALUES
(1, 48, 'Gloria Gill', 'Colorado Rodriguez', '+1 (241) 306-3895', '61329879835', 'tasa@mailinator.com', 'a:2:{i:0;s:9:\"54700.jpg\";i:1;s:9:\"13751.jpg\";}', '2023-06-15'),
(2, 91, 'Joshua Lamb', 'Denton Bonner', '+1 (742) 195-3478', '822981364375', 'topij@mailinator.com', 'a:2:{i:0;s:9:\"32247.png\";i:1;s:9:\"72117.jpg\";}', '2023-06-15'),
(3, 78, 'Heidi Melendez', 'Hiram Brooks', '+1 (171) 571-4813', '718729684364', 'vubop@mailinator.com', 'a:2:{i:0;s:9:\"18563.jpg\";i:1;s:9:\"26418.jpg\";}', '2023-06-15'),
(4, 60, 'Alika Mccarty', 'Iola Bowen', '+1 (512) 952-1688', '88843956823', 'pekewakax@mailinator.com', 'a:2:{i:0;s:9:\"32328.jpg\";i:1;s:9:\"24468.jpg\";}', '2023-06-15'),
(5, 54, 'Signe Fox', 'Dana Brooks', '+1 (918) 609-1484', '42984375983', 'konadamyh@mailinator.com', 'a:2:{i:0;s:9:\"61230.jpg\";i:1;s:9:\"94318.jpg\";}', '2023-06-15'),
(6, 97, 'Avye Dillard', 'Alan Valencia', '+1 (118) 659-8914', '899837987394', 'bawumabaf@mailinator.com', 'a:2:{i:0;s:9:\"53635.jpg\";i:1;s:9:\"45512.jpg\";}', '2023-06-15'),
(7, 25, 'Roary Mcguire', 'Lana Goodwin', '+1 (492) 126-8595', '77845987439', 'guhefy@mailinator.com', 'a:2:{i:0;s:9:\"12285.jpg\";i:1;s:9:\"62820.jpg\";}', '2023-06-15'),
(8, 56, 'Myra Barker', 'Hermione Soto', '+1 (953) 875-2605', '40873298476', 'kitypuhu@mailinator.com', 'a:2:{i:0;s:9:\"72917.jpg\";i:1;s:9:\"64423.jpg\";}', '2023-06-15'),
(9, 61, 'Luke Burgess', 'Octavius Meyers', '+1 (194) 334-9823', '143499827583', 'zisivaj@mailinator.com', 'a:4:{i:0;s:9:\"47332.jpg\";i:1;s:9:\"39882.png\";i:2;s:9:\"67459.jpg\";i:3;s:9:\"88273.jpg\";}', '2023-06-15'),
(10, 4, 'Joshua Holman', 'Wynne Webster', '+1 (404) 133-2266', '787346587683', 'pebaqimiq@mailinator.com', 'a:3:{i:0;s:9:\"48319.jpg\";i:1;s:9:\"25477.jpg\";i:2;s:9:\"90258.jpg\";}', '2023-06-15'),
(11, 1, 'Scott Steele', 'Barry Porter', '+1 (908) 425-7617', '307365874326', 'saqy@mailinator.com', 'a:3:{i:0;s:9:\"98064.jpg\";i:1;s:9:\"55009.jpg\";i:2;s:9:\"97288.jpg\";}', '2023-06-15'),
(12, 62, 'Kiayada Moon', 'Eden Rollins', '+1 (776) 203-2844', '726384762859', 'wahizu@mailinator.com', 'a:1:{i:0;s:9:\"54598.jpg\";}', '2023-06-15'),
(13, 3, 'Cole Thompson', 'Eaton Figueroa', '+1 (541) 906-2446', '20364375743', 'zelob@mailinator.com', 'a:2:{i:0;s:9:\"33554.jpg\";i:1;s:9:\"50075.jpg\";}', '2023-07-08'),
(14, 90, 'Azalia Anthony', 'Destiny Rosales', '+1 (179) 931-7073', '48743658750', 'rabu@mailinator.com', 'a:2:{i:0;s:9:\"82011.jpg\";i:1;s:9:\"17838.jpg\";}', '2023-06-15'),
(15, 88, 'Claire Olson', 'Simone Waller', '+1 (635) 534-6006', '319348925901', 'xudu@mailinator.com', 'a:2:{i:0;s:9:\"26950.jpg\";i:1;s:9:\"45033.jpg\";}', '2023-06-15'),
(16, 38, 'Mercedes Hoover', 'Benedict Roberson', '+1 (467) 418-2027', '87789437545', 'mulali@mailinator.com', 'a:2:{i:0;s:9:\"20222.png\";i:1;s:9:\"95586.jpg\";}', '2023-06-15'),
(17, 73, 'Richard Arnold', 'August Wolfe', '+1 (461) 767-4656', '78897857943', 'zahivyxa@mailinator.com', 'a:2:{i:0;s:9:\"11666.jpg\";i:1;s:9:\"23983.jpg\";}', '2023-06-15'),
(18, 29, 'Xena Boyd', 'Ginger Kirby', '+1 (894) 285-2729', '37348976534', 'simoxixox@mailinator.com', 'a:2:{i:0;s:9:\"11786.jpg\";i:1;s:9:\"49819.jpg\";}', '2023-06-15'),
(19, 92, 'Germane Sutton', 'Aladdin Cleveland', '+1 (689) 754-2979', '608971368120', 'novenuc@mailinator.com', 'a:2:{i:0;s:9:\"97553.jpg\";i:1;s:9:\"38905.jpg\";}', '2023-06-15'),
(20, 5, 'Madeline Mcdowell', 'Kristen Rivers', '+1 (535) 716-8063', '37872168445', 'dadyfiv@mailinator.com', 'a:2:{i:0;s:9:\"23924.jpg\";i:1;s:9:\"27211.jpg\";}', '2023-06-15'),
(21, 83, 'Sierra Mccall', 'Kaitlin Butler', '+1 (276) 754-9319', '48962472639', 'kejedamy@mailinator.com', 'a:2:{i:0;s:9:\"16009.jpg\";i:1;s:9:\"93664.jpg\";}', '2023-06-15'),
(22, 57, 'Yuri Chaney', 'Barbara Bryant', '+1 (265) 685-2029', '30965962347', 'hecavyrib@mailinator.com', 'a:2:{i:0;s:9:\"16863.jpg\";i:1;s:9:\"76850.jpg\";}', '2023-06-15');

-- --------------------------------------------------------

--
-- Table structure for table `std`
--

CREATE TABLE `std` (
  `sid` bigint(255) NOT NULL,
  `teachid` bigint(255) NOT NULL,
  `classtime` bigint(255) NOT NULL,
  `srollno` int(255) NOT NULL,
  `sname` varchar(255) NOT NULL,
  `sfname` varchar(255) NOT NULL,
  `smobile` varchar(255) NOT NULL,
  `scnic` varchar(255) NOT NULL,
  `semail` varchar(255) NOT NULL,
  `spic` varchar(255) NOT NULL,
  `sdate` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `std`
--

INSERT INTO `std` (`sid`, `teachid`, `classtime`, `srollno`, `sname`, `sfname`, `smobile`, `scnic`, `semail`, `spic`, `sdate`) VALUES
(1, 0, 0, 32, 'Jemima Bartlett', 'Carson Wallace', '+1 (213) 685-4457', '34456547657', 'jifiz@mailinator.com', '39222.jpg', '2023-06-15'),
(2, 3, 0, 57, 'Sandra Mcconnell', 'Alma Case', '+1 (228) 687-3173', '7176346856287', 'gigyqoxix@mailinator.com', '33975.png', '2023-06-15'),
(3, 4, 0, 61, 'Josephine Haney', 'Paul Duke', '+1 (749) 246-7994', '438732634534', 'lywolycyl@mailinator.com', '99524.jpg', '2023-06-15'),
(4, 1, 0, 31, 'Sophia Head', 'Kalia Dillon', '+1 (406) 569-7718', '618756983425', 'vumu@mailinator.com', '62707.jpg', '2023-06-15'),
(5, 3, 6, 40, 'Carly Velasquez', 'Chase Nichols', '+1 (169) 774-5889', '83743657843598', 'hetobyfe@mailinator.com', '62516.jpg', '2023-06-20'),
(6, 2, 0, 59, 'Melyssa Owen', 'Kylan Alford', '+1 (301) 724-6887', '528347658793', 'novugire@mailinator.com', '45531.jpg', '2023-06-15'),
(8, 3, 0, 49, 'Sean Elliott', 'Daniel Boyer', '+1 (191) 124-4211', '1008359834525', 'pyholivu@mailinator.com', '92807.jpg', '2023-06-20'),
(9, 4, 5, 30, 'Karen Rivers', 'Price Walton', '+1 (535) 603-6921', '248746583285', 'qakigedufi@mailinator.com', '33455.jpg', '2023-06-20'),
(10, 0, 0, 41, 'Juliet Tyler', 'Daryl Hess', '+1 (657) 287-9267', '3173582435456', 'jiget@mailinator.com', '72645.jpg', '2023-06-15'),
(11, 1, 1, 3, 'Illiana Faulkner', 'Hope Stuart', '+1 (408) 672-3446', '453342335606', 'qoruxucef@mailinator.com', '15547.jpg', '2023-06-20'),
(12, 0, 0, 64, 'Shelley Hancock', 'Tamara Bolton', '+1 (669) 178-3246', '509876334687', 'qefaqy@mailinator.com', '78878.jpg', '2023-06-15'),
(13, 0, 0, 53, 'Emmanuel Henry', 'Burke Frost', '+1 (849) 413-3726', '1289375092843', 'tawecajim@mailinator.com', '69896.jpg', '2023-06-15'),
(14, 0, 0, 17, 'Hashim Walter', 'Jerry Mcgee', '+1 (706) 961-3067', '4073829648754', 'rybezy@mailinator.com', '12220.jpg', '2023-06-15'),
(15, 0, 0, 65, 'Tara Estes', 'Maia Hess', '+1 (481) 585-8053', '5489365843752', 'masex@mailinator.com', '73854.jpg', '2023-06-15'),
(16, 0, 0, 70, 'Brett Mckee', 'Maxwell Serrano', '+1 (541) 319-9977', '787462398794', 'tomuf@mailinator.com', '68285.jpg', '2023-06-15'),
(17, 0, 0, 37, 'Dieter Kirkland', 'Jessica Howard', '+1 (893) 747-3721', '81923675643985', 'zuletidebi@mailinator.com', '67683.jpg', '2023-06-15'),
(18, 0, 0, 11, 'Aimee Cochran', 'Igor Bryant', '+1 (445) 432-9248', '2432687439843', 'geruvaqu@mailinator.com', '79690.png', '2023-06-15'),
(19, 0, 0, 100, 'Eden Miranda', 'Ruby French', '+1 (439) 435-2345', '1002396487368', 'tijaquk@mailinator.com', '10423.jpg', '2023-06-20'),
(20, 5, 4, 10, 'Yardley Dennis', 'Jamal Floyd', '+1 (554) 113-8204', '483689743682', 'zomu@mailinator.com', '15707.jpg', '2023-06-20'),
(21, 0, 0, 50, 'Adara Duffy', 'Donna Berry', '+1 (463) 453-2237', '429823174389', 'muxac@mailinator.com', '19408.jpg', '2023-06-15'),
(22, 1, 2, 7, 'Wilma Eaton', 'Susan Boyle', '+1 (161) 542-7708', '5092387583953', 'dityba@mailinator.com', '97040.jpg', '2023-06-20'),
(23, 0, 0, 35, 'Raven Thompson', 'Vivien Vega', '+1 (375) 307-4765', '2056874754367', 'lanybu@mailinator.com', '58297.jpg', '2023-06-15'),
(24, 0, 0, 63, 'Maxwell Mack', 'Harlan Andrews', '+1 (542) 155-6143', '96978653565876', 'jyjoqywyq@mailinator.com', '39051.jpg', '2023-06-15'),
(25, 0, 0, 18, 'Ryder Keith', 'Hanae Mccoy', '+1 (399) 213-3058', '737867564348', 'fylom@mailinator.com', '45882.jpg', '2023-06-15'),
(26, 3, 3, 12, 'Roary Henry', 'Blossom Horn', '+1 (774) 751-9063', '53765756486689', 'domejopu@mailinator.com', '83921.jpg', '2023-06-20'),
(27, 5, 0, 95, 'Olympia Diaz', 'Desiree Wall', '+1 (481) 573-1679', '607396043583', 'gukyqo@mailinator.com', '45391.jpg', '2023-06-20'),
(28, 0, 0, 6, 'Priscilla Cooper', 'Danielle Mcdowell', '+1 (123) 122-8091', '5832659876438', 'bobenutuz@mailinator.com', '59900.jpg', '2023-06-15'),
(29, 0, 0, 22, 'Eliana West', 'Shafira Sullivan', '+1 (717) 776-5579', '739326756734', 'bocujyz@mailinator.com', '45287.jpg', '2023-06-15'),
(30, 0, 0, 51, 'Fulton Weber', 'Chelsea Mcdaniel', '+1 (418) 135-4953', '58793264876', 'sijy@mailinator.com', '99511.jpg', '2023-06-15'),
(31, 0, 0, 36, 'Desiree Waller', 'Porter Mccoy', '+1 (561) 577-4144', '216348796832', 'musi@mailinator.com', '27951.jpg', '2023-06-15'),
(32, 0, 0, 8, 'Erich Cote', 'Jillian Clemons', '+1 (212) 337-8654', '36832174987385', 'nimes@mailinator.com', '71500.jpg', '2023-06-15'),
(33, 0, 0, 48, 'Eden Welch', 'Hanna Norton', '+1 (921) 694-6033', '7673298466357', 'byqufu@mailinator.com', '55523.jpg', '2023-06-15'),
(34, 0, 0, 79, 'Gail Holt', 'Shana Guerrero', '+1 (544) 479-4549', '757365897643', 'dorytot@mailinator.com', '65853.jpg', '2023-06-15'),
(35, 0, 0, 54, 'Jane Francis', 'Yeo Hart', '+1 (936) 312-4464', '849659874235', 'ceba@mailinator.com', '25974.jpg', '2023-06-15'),
(36, 0, 0, 9, 'Keegan Mcdowell', 'Raphael Patel', '+1 (723) 166-7795', '1723687436523', 'mykixage@mailinator.com', '26689.jpg', '2023-06-15'),
(37, 2, 7, 89, 'Tanek Perez', 'Reece Ferguson', '+1 (445) 699-5755', '999821648768', 'kuwekomum@mailinator.com', '80560.png', '2023-06-20');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `tid` bigint(255) NOT NULL,
  `tname` varchar(255) NOT NULL,
  `tfname` varchar(255) NOT NULL,
  `tmobile` varchar(255) NOT NULL,
  `tcnic` varchar(255) NOT NULL,
  `temail` varchar(255) NOT NULL,
  `tpic` varchar(255) NOT NULL,
  `tdate` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`tid`, `tname`, `tfname`, `tmobile`, `tcnic`, `temail`, `tpic`, `tdate`) VALUES
(1, 'Micah Calhoun', 'Basia Walker', '+1 (982) 159-6904', '990625765457', 'hirufesyk@mailinator.com', '19007.jpg', '2023-06-20'),
(2, 'Jeanette Hicks', 'Isabella Rowland', '+1 (225) 606-2652', '707396474355', 'wugixidame@mailinator.com', '86523.jpg', '2023-06-20'),
(3, 'Delilah Chen', 'Germane Fox', '+1 (904) 676-4999', '339683526834', 'sitalor@mailinator.com', '50095.jpg', '2023-06-20'),
(4, 'Pascale Brooks', 'Hedwig Wise', '+1 (693) 991-5242', '317098872365', 'wozylez@mailinator.com', '41676.jpg', '2023-06-20'),
(5, 'Freya Palmer', 'Preston Riddle', '+1 (225) 814-8319', '238914388453', 'sywygef@mailinator.com', '86449.jpg', '2023-06-20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `classtime`
--
ALTER TABLE `classtime`
  ADD PRIMARY KEY (`ctid`);

--
-- Indexes for table `multistd`
--
ALTER TABLE `multistd`
  ADD PRIMARY KEY (`sid`);

--
-- Indexes for table `std`
--
ALTER TABLE `std`
  ADD PRIMARY KEY (`sid`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`tid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `classtime`
--
ALTER TABLE `classtime`
  MODIFY `ctid` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `multistd`
--
ALTER TABLE `multistd`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `std`
--
ALTER TABLE `std`
  MODIFY `sid` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `tid` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

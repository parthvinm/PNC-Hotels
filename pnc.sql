-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 15, 2018 at 09:51 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pnc`
--

-- --------------------------------------------------------

--
-- Table structure for table `bill`
--

CREATE TABLE `bill` (
  `Bill_no` varchar(10) NOT NULL,
  `Cust_id` varchar(10) NOT NULL,
  `Room_no` int(4) NOT NULL,
  `Pay_Amt` int(10) NOT NULL,
  `Pay_Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `CheckIn` datetime NOT NULL,
  `CheckOut` datetime NOT NULL,
  `Book_id` varchar(10) NOT NULL,
  `People_no` int(10) NOT NULL,
  `Bill_no` varchar(10) NOT NULL,
  `Room_no` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `clean`
--

CREATE TABLE `clean` (
  `Staff_id` varchar(10) NOT NULL,
  `Floor` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `guest`
--

CREATE TABLE `guest` (
  `Cust_id` varchar(10) NOT NULL,
  `First Name` varchar(10) NOT NULL,
  `Last Name` varchar(10) NOT NULL,
  `Mem_Type` varchar(10) DEFAULT NULL,
  `Address` varchar(50) NOT NULL,
  `Age` int(3) NOT NULL,
  `Contact_no` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `guest`
--

INSERT INTO `guest` (`Cust_id`, `First Name`, `Last Name`, `Mem_Type`, `Address`, `Age`, `Contact_no`) VALUES
('0001', 'Jughead', 'Jones', 'Platinum', ' South Side Trailer Park, Riverdale', 16, 5550001),
('0002', 'Elizabeth', 'Cooper', 'Gold', '111 Elm Street, Riverdale', 16, 5550002),
('0003', 'Archie', 'Andrews', 'Gold', '110 Elm Street, Riverdale', 16, 5550003),
('0004', 'Veronica', 'Lodge', 'Silver', 'The Pembrooke, Riverdale', 16, 5550004),
('0005', 'Frank', 'Jones', 'NULL', 'South Side Trailer Park, Riverdale', 48, 5550005),
('0006', 'Hermione', 'Lodge', 'Platinum', 'The Pembrooke, Riverdale', 47, 5550006),
('0007', 'Fred', 'Andrews', 'NULL', '110 Elm Street, Riverdale', 47, 5550006);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `email` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `age` varchar(3) NOT NULL,
  `contact` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`username`, `password`, `email`, `firstname`, `lastname`, `age`, `contact`) VALUES
('abcq', 'qwer', 'abcgd@ad.com', 'abc', 'qew', '26', '152786'),
('admin', 'admin', 'admin@ad.com', 'Admin', 'istrator', '19', '123456'),
('kuyoin', 'poiu', 'juio@om.com', 'kuy', 'ion', '18', '175362'),
('nehark', 'nehark', 'nehark@mail.com', 'Neha', 'Rk', '19', '555124');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `Cust_id` varchar(10) NOT NULL,
  `Room_no` int(4) NOT NULL,
  `Food_type` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`Cust_id`, `Room_no`, `Food_type`) VALUES
('0004', 501, 52),
('0003', 302, 61),
('0004', 501, 61),
('0002', 301, 79);

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `Room_no` int(4) NOT NULL,
  `Floor` int(3) NOT NULL,
  `Room_Type` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`Room_no`, `Floor`, `Room_Type`) VALUES
(300, 3, 1),
(301, 3, 1),
(302, 3, 2),
(303, 3, 2),
(401, 4, 3),
(501, 5, 4),
(601, 6, 5);

-- --------------------------------------------------------

--
-- Table structure for table `roomdetail`
--

CREATE TABLE `roomdetail` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `checkin_date` date NOT NULL,
  `checkout_date` date NOT NULL,
  `room_type` varchar(50) NOT NULL,
  `no_of_room` varchar(50) NOT NULL,
  `amount` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `roomdetail`
--

INSERT INTO `roomdetail` (`id`, `username`, `checkin_date`, `checkout_date`, `room_type`, `no_of_room`, `amount`) VALUES
(2, 'joy@mendis.com', '2014-06-16', '2014-06-20', '250', '5', '1250'),
(3, '', '2018-10-14', '2018-10-20', '250', '1', '250'),
(4, 'nehark', '0000-00-00', '0000-00-00', '00', '', ''),
(5, 'nehark', '2018-10-18', '2018-10-19', '100', '1', '100');

-- --------------------------------------------------------

--
-- Table structure for table `roomtype`
--

CREATE TABLE `roomtype` (
  `room_id` int(11) NOT NULL,
  `room_type` varchar(50) NOT NULL,
  `room_price` varchar(50) NOT NULL,
  `room_seson` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `roomtype`
--

INSERT INTO `roomtype` (`room_id`, `room_type`, `room_price`, `room_seson`) VALUES
(1, 'Garden view', '100', 'low season'),
(2, 'Garden view', '200', 'high season'),
(3, 'Street view', '45', 'low season'),
(4, 'Street view', '90', 'high season'),
(5, 'Ocean view', '250', 'low season'),
(6, 'Ocean view', '500', 'high season');

-- --------------------------------------------------------

--
-- Table structure for table `signup`
--

CREATE TABLE `signup` (
  `username` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `signup`
--

INSERT INTO `signup` (`username`, `email`, `password`) VALUES
('nehark', 'nehark@mail.com', 'nehark'),
('parthvim', 'parthvim@mail.com', 'parthvim'),
('chaim', 'chaim@mail.com', 'chaim'),
('noahc', 'noahc@mail.com', 'noahcen');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `Staff_id` varchar(10) NOT NULL,
  `First Name` varchar(10) NOT NULL,
  `Last Name` varchar(10) NOT NULL,
  `Job_Type` varchar(10) NOT NULL,
  `Salary` int(10) NOT NULL,
  `Address` varchar(50) NOT NULL,
  `Age` int(3) NOT NULL,
  `Contact_no` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`Staff_id`, `First Name`, `Last Name`, `Job_Type`, `Salary`, `Address`, `Age`, `Contact_no`) VALUES
('0100', 'Parthvi', 'Mehta', 'Housekeepi', 50000, 'Ghatkopar, Mumbai', 19, 2147483647),
('0101', 'Neha', 'Ramakumar', 'Receptioni', 50000, 'Kharghar, Navi Mumbai', 19, 2147483647),
('0102', 'Chaitravi', 'More', 'Room Servi', 50000, 'Mulund, Mumbai', 20, 2147483647);

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `Room_no` int(10) NOT NULL,
  `Floor` int(10) NOT NULL,
  `Room_Type` int(10) NOT NULL,
  `Cust_id` int(10) NOT NULL,
  `Food_Type` int(10) NOT NULL,
  `First Name` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`Room_no`, `Floor`, `Room_Type`, `Cust_id`, `Food_Type`, `First Name`) VALUES
(301, 3, 1, 2, 79, 'Elizabeth'),
(501, 5, 4, 4, 52, 'Veronica'),
(302, 3, 2, 3, 61, 'Archie'),
(501, 5, 4, 4, 61, 'Veronica');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`Bill_no`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`Book_id`),
  ADD KEY `Book_id` (`Book_id`);

--
-- Indexes for table `guest`
--
ALTER TABLE `guest`
  ADD PRIMARY KEY (`Cust_id`),
  ADD KEY `Cust_id` (`Cust_id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`Room_no`),
  ADD KEY `Room_Type` (`Room_Type`);

--
-- Indexes for table `roomdetail`
--
ALTER TABLE `roomdetail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roomtype`
--
ALTER TABLE `roomtype`
  ADD PRIMARY KEY (`room_id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`Staff_id`),
  ADD KEY `Staff_id` (`Staff_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `roomdetail`
--
ALTER TABLE `roomdetail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `roomtype`
--
ALTER TABLE `roomtype`
  MODIFY `room_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

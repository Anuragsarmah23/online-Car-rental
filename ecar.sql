-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 21, 2019 at 10:01 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecar`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` varchar(20) NOT NULL,
  `password` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `password`) VALUES
('admin123', 'admin123');

-- --------------------------------------------------------

--
-- Table structure for table `bill`
--

CREATE TABLE `bill` (
  `id` smallint(6) NOT NULL,
  `totalAmt` smallint(6) NOT NULL,
  `bookID` varchar(50) NOT NULL,
  `customerID` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bill`
--

INSERT INTO `bill` (`id`, `totalAmt`, `bookID`, `customerID`) VALUES
(10, 1500, 'saurav86175955', 'saurav8617'),
(11, 8400, 'saurav86179401', 'saurav8617'),
(12, 32000, 'saurav86179243', 'saurav8617'),
(13, 7200, 'dummy68837114', 'dummy6883');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `id` varchar(55) NOT NULL,
  `fromDate` date NOT NULL,
  `toDate` date NOT NULL,
  `carID` varchar(50) NOT NULL,
  `customerID` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id`, `fromDate`, `toDate`, `carID`, `customerID`) VALUES
('dummy68837114', '2019-04-22', '2019-04-25', 'swift dzireas01 ax 2345', 'dummy6883'),
('saurav86175955', '2019-04-22', '2019-04-22', 'swift dzireas01 ax 2345', 'saurav8617'),
('saurav86179243', '2019-04-22', '2019-05-06', 'hyundai i20as01 bx 9090', 'saurav8617'),
('saurav86179401', '2019-04-22', '2019-04-25', 'balenoas01 bb 7878', 'saurav8617');

-- --------------------------------------------------------

--
-- Table structure for table `car`
--

CREATE TABLE `car` (
  `id` varchar(50) NOT NULL,
  `name` varchar(40) NOT NULL,
  `carno` varchar(20) NOT NULL,
  `seats` tinyint(4) NOT NULL,
  `rate` smallint(6) NOT NULL,
  `pic` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `car`
--

INSERT INTO `car` (`id`, `name`, `carno`, `seats`, `rate`, `pic`) VALUES
('alto 800as01 bs 8989', 'alto 800', 'as01 bs 8989', 4, 300, 'alto 800as01 bs 8989.png'),
('balenoas01 bb 7878', 'baleno', 'as01 bb 7878', 4, 350, 'balenoas01 bb 7878.png'),
('ford figoas01 ax 4544', 'ford figo', 'as01 ax 4544', 4, 300, 'ford figoas01 ax 4544.png'),
('hyundai cretaas01 ba 9898', 'hyundai creta', 'as01 ba 9898', 4, 350, 'hyundai cretaas01 ba 9898.png'),
('hyundai i10as01 ay 5656', 'hyundai i10', 'as01 ay 5656', 4, 300, 'hyundai i10as01 ay 5656.png'),
('hyundai i20as01 bx 9090', 'hyundai i20', 'as01 bx 9090', 4, 400, 'hyundai i20as01 bx 9090.png'),
('mahindra scorpioas01 ay2989', 'mahindra scorpio', 'as01 ay2989', 4, 250, 'mahindra scorpioas01 ay2989.png'),
('swift dzireas01 ax 2345', 'swift dzire', 'as01 ax 2345', 4, 300, 'swift dzireas01 ax 2345.png');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` varchar(50) NOT NULL,
  `name` varchar(40) NOT NULL,
  `email` varchar(191) NOT NULL,
  `address` varchar(255) NOT NULL,
  `aadhaar` bigint(20) NOT NULL,
  `contact` bigint(20) NOT NULL,
  `password` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `name`, `email`, `address`, `aadhaar`, `contact`, `password`) VALUES
('dummy6883', 'dummy', 'dummy@gmail.com', 'paltan', 123487659012, 9089786535, 'dummy123'),
('saurav8617', 'saurav chy', 'saurav1@gmail.com', 'Paltan Bazar', 121234345611, 9085324601, 'saurav123');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` varchar(55) NOT NULL,
  `totalAmt` smallint(6) NOT NULL,
  `bookID` varchar(55) NOT NULL,
  `customerID` varchar(50) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `totalAmt`, `bookID`, `customerID`, `status`) VALUES
('dummy6883711440', 7200, 'dummy68837114', 'dummy6883', 'pending'),
('saurav8617595581', 1500, 'saurav86175955', 'saurav8617', 'pending'),
('saurav8617924347', 32000, 'saurav86179243', 'saurav8617', 'pending'),
('saurav8617940142', 8400, 'saurav86179401', 'saurav8617', 'pending');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bookID` (`bookID`),
  ADD KEY `customerID` (`customerID`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customerID` (`customerID`),
  ADD KEY `carID` (`carID`);

--
-- Indexes for table `car`
--
ALTER TABLE `car`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bookID` (`bookID`),
  ADD KEY `customerID` (`customerID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bill`
--
ALTER TABLE `bill`
  MODIFY `id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bill`
--
ALTER TABLE `bill`
  ADD CONSTRAINT `bill_ibfk_1` FOREIGN KEY (`bookID`) REFERENCES `booking` (`id`),
  ADD CONSTRAINT `bill_ibfk_2` FOREIGN KEY (`customerID`) REFERENCES `customer` (`id`);

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_ibfk_1` FOREIGN KEY (`carID`) REFERENCES `car` (`id`),
  ADD CONSTRAINT `booking_ibfk_2` FOREIGN KEY (`customerID`) REFERENCES `customer` (`id`);

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`bookID`) REFERENCES `booking` (`id`),
  ADD CONSTRAINT `payment_ibfk_2` FOREIGN KEY (`customerID`) REFERENCES `customer` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

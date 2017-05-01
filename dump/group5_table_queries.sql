-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 27, 2017 at 04:20 PM
-- Server version: 5.7.17-0ubuntu0.16.04.2
-- PHP Version: 7.0.15-0ubuntu0.16.04.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `group5`
--

-- --------------------------------------------------------

--
-- Table structure for table `bill`
--

CREATE TABLE `bill` (
  `c_id` int(11) NOT NULL,
  `e_id` int(11) NOT NULL,
  `billing_date` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `contract`
--

CREATE TABLE `contract` (
  `ID` int(11) NOT NULL,
  `date` varchar(10) NOT NULL,
  `c_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `ID` int(11) NOT NULL,
  `username` varchar(10) NOT NULL,
  `password` varchar(10) NOT NULL,
  `email` varchar(10) NOT NULL,
  `phone_number` int(11) NOT NULL,
  `customer_type` varchar(10) NOT NULL,
  `registered_store_id` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `customer_address`
--

CREATE TABLE `customer_address` (
  `ID` int(11) NOT NULL,
  `street_name` varchar(10) NOT NULL,
  `district` varchar(10) NOT NULL,
  `city` varchar(10) NOT NULL,
  `country` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `customer_name`
--

CREATE TABLE `customer_name` (
  `ID` int(11) NOT NULL,
  `first_name` varchar(10) NOT NULL,
  `mid_name` varchar(10) NOT NULL,
  `last_name` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `ID` int(11) NOT NULL,
  `password` varchar(10) NOT NULL,
  `username` varchar(10) NOT NULL,
  `email` varchar(10) NOT NULL,
  `phone_number` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `employee_address`
--

CREATE TABLE `employee_address` (
  `ID` int(11) NOT NULL,
  `street_name` varchar(10) NOT NULL,
  `district` varchar(10) NOT NULL,
  `city` varchar(10) NOT NULL,
  `country` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `employee_name`
--

CREATE TABLE `employee_name` (
  `ID` int(11) NOT NULL,
  `first_name` varchar(10) NOT NULL,
  `middle_name` varchar(10) NOT NULL,
  `last_name` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `package`
--

CREATE TABLE `package` (
  `ID` int(11) NOT NULL,
  `date` varchar(10) NOT NULL,
  `size` varchar(10) NOT NULL,
  `shipment_id` varchar(10) NOT NULL,
  `pack_type` varchar(10) NOT NULL,
  `statue` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `package_price`
--

CREATE TABLE `package_price` (
  `p_type` varchar(10) NOT NULL,
  `price` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `package_size_price`
--

CREATE TABLE `package_size_price` (
  `p_size` varchar(10) NOT NULL,
  `price` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `receiver`
--

CREATE TABLE `receiver` (
  `ID` int(11) NOT NULL,
  `name` varchar(10) NOT NULL,
  `address` varchar(10) NOT NULL,
  `email` varchar(10) NOT NULL,
  `phone_number` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `receiver_address`
--

CREATE TABLE `receiver_address` (
  `ID` int(11) NOT NULL,
  `street_name` varchar(10) NOT NULL,
  `district` varchar(10) NOT NULL,
  `city` varchar(10) NOT NULL,
  `country` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `receiver_name`
--

CREATE TABLE `receiver_name` (
  `ID` int(11) NOT NULL,
  `first_name` varchar(10) NOT NULL,
  `middle_name` varchar(10) NOT NULL,
  `last_name` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `shipment`
--

CREATE TABLE `shipment` (
  `ID` int(11) NOT NULL,
  `from_s_id` int(11) NOT NULL,
  `to_s_id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `r_id` int(11) NOT NULL,
  `c_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `shipment_price`
--

CREATE TABLE `shipment_price` (
  `shipment` varchar(10) NOT NULL,
  `price` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `store`
--

CREATE TABLE `store` (
  `ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `store_address`
--

CREATE TABLE `store_address` (
  `ID` int(11) NOT NULL,
  `street_name` varchar(10) NOT NULL,
  `district` varchar(10) NOT NULL,
  `city` varchar(10) NOT NULL,
  `country` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `store_phone`
--

CREATE TABLE `store_phone` (
  `ID` int(11) NOT NULL,
  `phone_number` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `work`
--

CREATE TABLE `work` (
  `s_id` int(11) NOT NULL,
  `e_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`c_id`,`e_id`),
  ADD UNIQUE KEY `c_id` (`c_id`),
  ADD UNIQUE KEY `e_id` (`e_id`);

--
-- Indexes for table `contract`
--
ALTER TABLE `contract`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `c_id` (`c_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `ID` (`ID`);

--
-- Indexes for table `customer_address`
--
ALTER TABLE `customer_address`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `ID` (`ID`);

--
-- Indexes for table `customer_name`
--
ALTER TABLE `customer_name`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `username` (`username`,`email`),
  ADD UNIQUE KEY `ID` (`ID`);

--
-- Indexes for table `employee_address`
--
ALTER TABLE `employee_address`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `ID` (`ID`),
  ADD KEY `ID_2` (`ID`);

--
-- Indexes for table `employee_name`
--
ALTER TABLE `employee_name`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `ID` (`ID`),
  ADD KEY `ID_2` (`ID`);

--
-- Indexes for table `package`
--
ALTER TABLE `package`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `ID` (`ID`),
  ADD KEY `ID_2` (`ID`);

--
-- Indexes for table `receiver`
--
ALTER TABLE `receiver`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `ID` (`ID`);

--
-- Indexes for table `receiver_address`
--
ALTER TABLE `receiver_address`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `ID` (`ID`);

--
-- Indexes for table `receiver_name`
--
ALTER TABLE `receiver_name`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `ID` (`ID`);

--
-- Indexes for table `shipment`
--
ALTER TABLE `shipment`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `from_s_id` (`from_s_id`,`to_s_id`,`p_id`,`r_id`,`c_id`),
  ADD KEY `to_s_id` (`to_s_id`),
  ADD KEY `p_id` (`p_id`),
  ADD KEY `r_id` (`r_id`),
  ADD KEY `c_id` (`c_id`);

--
-- Indexes for table `store`
--
ALTER TABLE `store`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `ID` (`ID`),
  ADD KEY `ID_2` (`ID`);

--
-- Indexes for table `store_address`
--
ALTER TABLE `store_address`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `ID` (`ID`),
  ADD KEY `ID_2` (`ID`);

--
-- Indexes for table `work`
--
ALTER TABLE `work`
  ADD UNIQUE KEY `s_id` (`s_id`),
  ADD UNIQUE KEY `e_id` (`e_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `bill`
--
ALTER TABLE `bill`
  ADD CONSTRAINT `bill_ibfk_1` FOREIGN KEY (`c_id`) REFERENCES `customer` (`ID`),
  ADD CONSTRAINT `bill_ibfk_2` FOREIGN KEY (`e_id`) REFERENCES `employee` (`ID`);

--
-- Constraints for table `contract`
--
ALTER TABLE `contract`
  ADD CONSTRAINT `contract_ibfk_1` FOREIGN KEY (`c_id`) REFERENCES `customer` (`ID`);

--
-- Constraints for table `customer_address`
--
ALTER TABLE `customer_address`
  ADD CONSTRAINT `c_id` FOREIGN KEY (`ID`) REFERENCES `customer` (`ID`);

--
-- Constraints for table `customer_name`
--
ALTER TABLE `customer_name`
  ADD CONSTRAINT `customer_name_ibfk_1` FOREIGN KEY (`ID`) REFERENCES `customer` (`ID`);

--
-- Constraints for table `employee_address`
--
ALTER TABLE `employee_address`
  ADD CONSTRAINT `employee_address_ibfk_1` FOREIGN KEY (`ID`) REFERENCES `employee` (`ID`);

--
-- Constraints for table `employee_name`
--
ALTER TABLE `employee_name`
  ADD CONSTRAINT `employee_name_ibfk_1` FOREIGN KEY (`ID`) REFERENCES `employee` (`ID`);

--
-- Constraints for table `receiver_address`
--
ALTER TABLE `receiver_address`
  ADD CONSTRAINT `receiver_address_ibfk_1` FOREIGN KEY (`ID`) REFERENCES `receiver` (`ID`);

--
-- Constraints for table `receiver_name`
--
ALTER TABLE `receiver_name`
  ADD CONSTRAINT `receiver_name_ibfk_1` FOREIGN KEY (`ID`) REFERENCES `receiver` (`ID`);

--
-- Constraints for table `shipment`
--
ALTER TABLE `shipment`
  ADD CONSTRAINT `shipment_ibfk_1` FOREIGN KEY (`from_s_id`) REFERENCES `store` (`ID`),
  ADD CONSTRAINT `shipment_ibfk_2` FOREIGN KEY (`to_s_id`) REFERENCES `store` (`ID`),
  ADD CONSTRAINT `shipment_ibfk_3` FOREIGN KEY (`p_id`) REFERENCES `package` (`ID`),
  ADD CONSTRAINT `shipment_ibfk_4` FOREIGN KEY (`r_id`) REFERENCES `receiver` (`ID`),
  ADD CONSTRAINT `shipment_ibfk_5` FOREIGN KEY (`c_id`) REFERENCES `customer` (`ID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

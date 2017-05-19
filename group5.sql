-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 19, 2017 at 09:05 PM
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

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`group5`@`%` PROCEDURE `calculate_price` (IN `size` VARCHAR(2), IN `shipment` VARCHAR(10), IN `type` VARCHAR(10), OUT `price` NUMERIC(10))  BEGIN
  IF size<=1 THEN
    SET price:=1;
  ELSEIF size<=5 THEN
    SET price:=5;
  ELSEIF size<=7 THEN
    SET price:=10;
  ELSEIF size<=10 THEN
    SET price:=20;
  ELSE
    SET price:=20+(size-10)*1;
  END IF;
  IF shipment LIKE 'Overnight' THEN
    SET price:=price+25;
  ELSEIF shipment LIKE 'Two-day' THEN
    SET price:=price+10;
  ELSE
    SET price:=price+0;
  END IF;
  IF type LIKE 'Hazardous' THEN
    SET price:=price+10;
  ELSEIF type LIKE 'International' THEN
    SET price:=price+(price*0.1);
  ELSE
    SET price:=price+0;
  END IF;
END$$

CREATE DEFINER=`group5`@`%` PROCEDURE `check_customer_exists` (IN `myID` INT(11), OUT `decision` VARCHAR(1))  BEGIN
  IF NOT EXISTS (SELECT ID FROM customer WHERE ID=myID) THEN
    SET decision := 'F';
  ELSE
    SET decision := 'T';
  END IF;
END$$

CREATE DEFINER=`group5`@`%` PROCEDURE `check_password` (IN `password` VARCHAR(100), OUT `decision` VARCHAR(1))  BEGIN
  IF CHAR_LENGTH(password) < 6 THEN
    SET decision := 'F';
  ELSE
    SET decision := 'T';
  END IF;
END$$

CREATE DEFINER=`group5`@`%` PROCEDURE `estimate_delivery_date` (IN `p_date` DATE, IN `shipment` VARCHAR(10), OUT `e_delivery_date` DATE)  BEGIN
  IF shipment LIKE 'Overnight' THEN
    SET e_delivery_date:= DATE_ADD(p_date, INTERVAL 1 DAY);
  ELSEIF shipment LIKE 'Regular' THEN
    SET e_delivery_date:= DATE_ADD(p_date, INTERVAL 7 DAY);
  ELSE
    SET e_delivery_date:= DATE_ADD(p_date, INTERVAL 2 DAY);
  END IF;
END$$

CREATE DEFINER=`group5`@`%` PROCEDURE `find_size` (IN `weight` DECIMAL(8), OUT `size` VARCHAR(1))  BEGIN
  IF weight<= 1 THEN
    SET size:= 'E';
  ELSEIF weight<= 5 THEN
    SET size:= 'S'; 
  ELSEIF weight<= 7 THEN
    SET size:= 'M';  
  ELSE
    SET size:= 'L';
  END IF;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Stand-in structure for view `A`
--
CREATE TABLE `A` (
`city` varchar(100)
,`total_pack` decimal(42,0)
);

-- --------------------------------------------------------

--
-- Table structure for table `bill`
--

CREATE TABLE `bill` (
  `billing_date` varchar(10) NOT NULL,
  `ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bill`
--

INSERT INTO `bill` (`billing_date`, `ID`) VALUES
('2017-05-19', 15),
('2017-05-19', 16),
('2017-05-19', 17),
('2017-05-19', 18),
('2017-05-19', 19),
('2017-05-19', 20);

-- --------------------------------------------------------

--
-- Table structure for table `bill_shipment`
--

CREATE TABLE `bill_shipment` (
  `b_id` int(100) DEFAULT NULL,
  `s_id` int(11) DEFAULT NULL,
  `ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bill_shipment`
--

INSERT INTO `bill_shipment` (`b_id`, `s_id`, `ID`) VALUES
(15, 100000033, 21),
(16, 100000034, 22),
(17, 100000035, 23),
(18, 100000036, 24),
(19, 100000037, 25),
(20, 100000038, 26);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `password` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone_number` int(100) NOT NULL,
  `ID` int(11) NOT NULL,
  `customer_type` varchar(100) NOT NULL,
  `registered_store_id` varchar(100) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `middle_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `street_name` varchar(100) NOT NULL,
  `district` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `country` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`password`, `username`, `email`, `phone_number`, `ID`, `customer_type`, `registered_store_id`, `first_name`, `middle_name`, `last_name`, `street_name`, `district`, `city`, `country`) VALUES
('123456', 'dtoprak', 'dtoprak@gmail.com', 4567, 18, 'on', '1', 'Deniz ', '-', 'Toprak', 'Street 33', 'District 4', 'Paris', 'France'),
('123456', 'cancapraz', 'cancapraz@zoho.com', 1234, 19, 'off', '5', 'Taylan', 'Can', 'Capraz', 'Longbutton', 'Groorshooc', 'Stockholm', 'Sweden'),
('123456', 'cadas', 'cerdogan@cerrrahpasa.com', 5678, 20, 'on', '6', 'Cagdas', 'Can', 'Erdogan', 'Abungan', 'Robubu', 'Addis Ababa', 'Endonasia'),
('123456', 'scemilci', 'scemilci@kia.com', 1256, 21, 'off', '4', 'Semih', '-', 'Cemilci', 'Kawaniska', 'Center', 'Tokio', 'Japan'),
('123456', 'ceteke', 'ceteke@ai.com', 5678, 22, 'on', '2', 'Cem', '-', 'Eteke', 'Flunkheslahs', 'East', 'Helsinki', 'Finland'),
('12345678', 'kanken', 'kanky@datenbank.com', 3777, 23, 'on', '5', 'FjÃ¤lrÃ¤ven', '-', 'Kanken', 'Blue st.', 'Dot 1', 'Stockholm', 'Sweden');

--
-- Triggers `customer`
--
DELIMITER $$
CREATE TRIGGER `check_password_length` BEFORE INSERT ON `customer` FOR EACH ROW BEGIN
  DECLARE decision varchar(1);
  CALL check_password(new.password,decision);
  
  IF decision = 'F' THEN
    SIGNAL sqlstate '45000' SET message_text = 'Password must have at least 6 characters!';
    END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `password` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone_number` varchar(50) NOT NULL,
  `ID` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `middle_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `street_name` varchar(100) NOT NULL,
  `district` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `country` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`password`, `username`, `email`, `phone_number`, `ID`, `first_name`, `middle_name`, `last_name`, `street_name`, `district`, `city`, `country`) VALUES
('123456', 'aturgut', 'aturgut@datenbank.com', '23423423433', 3, 'Ahmet', 'Can', 'Turgut', 'Black st.', 'Line 120', 'Paris', 'France'),
('123456', 'dovek', 'dovek@datenbank.com', '2900316269', 4, 'Damla', '-', 'Ovek', 'White st.', 'Line 49', 'Stockholm', 'Sweden'),
('123456', 'mdokumcu', 'mdokumcu@datenbank.com', '5472727737', 7, 'Cevat', 'Mert', 'Dokumcu', 'Red st.', 'Line 56', 'Berlin', 'Germany'),
('123456', 'mertucuk', 'mertucuk@datenbank.com', '12341231213', 9, 'Mert', '-', 'Ucuk', 'Jump Street', '22', 'Tokyo', 'Japan'),
('123456', 'ububuga', 'ububuga@datenbank.com', '293829291231', 10, 'Ububu', 'Gamnda', 'Gumue', '22 Srikua', 'Center Zota', 'Addis Ababa', 'Ethiopia'),
('123456', 'simohayha', 'simohayha@datenbank.com', '1232341230', 11, 'Simo', '-', 'Häyhä', 'Blue St.', 'Square 420', 'Helsinki', 'Finland'),
('123456', 'wakabayashi', 'genes@datenbank.com', '343434251231', 12, 'Genzo', '-', 'Wakabayashi', 'Blue st.', 'Dot 1', 'Osaka', 'Japan'),
('123456', 'yoo', 'gong@datenbank.com', '6786789', 13, 'Gong', '-', 'Yoo', 'Red st.', 'Pentagon 550', 'Seoul', 'South Korea'),
('123456', 'franz', 'franz@datenbank.com', '4343434346', 14, 'Franz', '-', 'Beckenbauer', 'White st.', 'Square 360', 'Hamburg', 'Germany'),
('123456', 'cr7', 'cr7@datenbank.com', '777777777', 777, 'Cristiano', '-', 'Ronaldo dos Santos Aveiro', 'Blue st.', 'Triangle 180', 'Lisbon', 'Portugal');

-- --------------------------------------------------------

--
-- Table structure for table `package`
--

CREATE TABLE `package` (
  `ID` int(11) NOT NULL,
  `p_date` date NOT NULL,
  `size` varchar(10) NOT NULL,
  `shipment_id` varchar(10) NOT NULL,
  `pack_type` varchar(100) NOT NULL,
  `statue` varchar(100) NOT NULL,
  `weight` int(10) DEFAULT NULL,
  `shipment` varchar(100) DEFAULT NULL,
  `e_delivery_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `package`
--

INSERT INTO `package` (`ID`, `p_date`, `size`, `shipment_id`, `pack_type`, `statue`, `weight`, `shipment`, `e_delivery_date`) VALUES
(36, '2014-10-12', 'S', '100000033', 'Hazardous', 'Delivered', 5, 'Regular', '2014-10-19'),
(37, '2014-10-12', 'L', '100000033', 'Hazardous', 'Delivered', 10, 'Regular', '2014-10-19'),
(38, '2014-11-09', 'L', '100000034', 'International', 'Not Delivered', 65, 'Regular', '2014-11-16'),
(39, '2016-08-05', 'L', '100000035', 'International', 'Delivered', 40, 'Regular', '2016-08-12'),
(40, '2016-10-11', 'L', '100000036', 'International', 'Not Delivered', 40, 'Regular', '2016-10-18'),
(41, '2016-05-10', 'L', '100000036', 'Hazardous', 'Not Delivered', 20, 'Regular', '2016-05-17'),
(42, '2013-04-25', 'L', '100000037', 'Hazardous', 'Not Delivered', 10, 'Overnight', '2013-04-26'),
(43, '2013-05-13', 'S', '100000037', 'Normal', 'Not Delivered', 3, 'Overnight', '2013-05-14'),
(44, '2013-05-05', 'S', '100000038', 'Normal', 'Delivered', 2, 'Regular', '2013-05-12');

--
-- Triggers `package`
--
DELIMITER $$
CREATE TRIGGER `set_estimated_delivery_date` BEFORE INSERT ON `package` FOR EACH ROW BEGIN
  DECLARE my_e_delivery_date date;
  CALL estimate_delivery_Date(new.p_date,new.shipment,my_e_delivery_date);
  SET new.e_delivery_date=my_e_delivery_date; 
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update_price` BEFORE INSERT ON `package` FOR EACH ROW BEGIN
  DECLARE myPrice int(10);
  CALL calculate_price(new.weight,new.shipment,new.size,myPrice);
  UPDATE shipment SET price=myPrice where s_time=new.shipment;  
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update_size` BEFORE INSERT ON `package` FOR EACH ROW BEGIN
  DECLARE p_size varchar(1);
  CALL find_size(new.weight,p_size);
  SET new.size=p_size;  
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `shipment`
--

CREATE TABLE `shipment` (
  `ID` int(11) NOT NULL,
  `from_s_id` int(11) NOT NULL,
  `to_s_id` int(11) NOT NULL,
  `c_id` int(11) NOT NULL,
  `s_time` varchar(100) DEFAULT NULL,
  `r_first_name` varchar(100) DEFAULT NULL,
  `r_last_name` varchar(100) DEFAULT NULL,
  `r_middle_name` varchar(100) DEFAULT NULL,
  `r_street` varchar(100) DEFAULT NULL,
  `r_district` varchar(100) DEFAULT NULL,
  `r_city` varchar(100) DEFAULT NULL,
  `r_country` varchar(100) DEFAULT NULL,
  `r_email` varchar(100) DEFAULT NULL,
  `r_phone_number` varchar(100) DEFAULT NULL,
  `price` int(10) DEFAULT NULL,
  `bill` varchar(2) DEFAULT 'F'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shipment`
--

INSERT INTO `shipment` (`ID`, `from_s_id`, `to_s_id`, `c_id`, `s_time`, `r_first_name`, `r_last_name`, `r_middle_name`, `r_street`, `r_district`, `r_city`, `r_country`, `r_email`, `r_phone_number`, `price`, `bill`) VALUES
(100000033, 1, 1, 18, 'Regular', 'Kaan', 'Usamis', 'Tekin', 'Borisan', 'East', 'Tokyo', 'Japan', 'katek@fill.com', '4523', 5, 'T'),
(100000034, 1, 4, 18, 'Regular', 'Can', 'Orhan', '-', '32 funta', 'funtar', 'Yoyoma', 'Korea', 'corhan@tele.co', '17283', 5, 'T'),
(100000035, 5, 3, 19, 'Regular', 'Yunki', 'Olderman', 'Kohenda', 'Tostama', '234 purotron', 'Berlin', 'Germany', 'yunki@toyota.com', '89738', 5, 'F'),
(100000036, 1, 7, 18, 'Regular', 'Melek', 'Subasi', '-', 'Hundai', 'Sony', 'Osaka', 'Japan', 'msubasi@flash.tv', '12345', 5, 'T'),
(100000037, 2, 1, 22, 'Overnight', 'Deniz', 'Toprak', '-', 'black street', '43', 'Paris', 'France', 'doprak@bmw.com', '1212', 30, 'T'),
(100000038, 6, 1, 20, 'Regular', 'Orhan', 'Atakan', 'Kemal', '22 Jump', '3', 'Paris', 'France', 'okemal@oko.com', '12344', 5, 'T');

--
-- Triggers `shipment`
--
DELIMITER $$
CREATE TRIGGER `check_customer` BEFORE INSERT ON `shipment` FOR EACH ROW BEGIN
  DECLARE decision varchar(1);
  CALL check_customer_exists(new.c_id,decision);
  
  IF decision = 'F' THEN
    SIGNAL sqlstate '45000' SET message_text = 'Sender must be a customer!';
    END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `store`
--

CREATE TABLE `store` (
  `ID` int(11) NOT NULL,
  `street_name` varchar(100) NOT NULL,
  `district` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `country` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `store`
--

INSERT INTO `store` (`ID`, `street_name`, `district`, `city`, `country`) VALUES
(1, 'Red St.', 'Triangle 420', 'Paris', 'France'),
(2, 'Blue st.', 'Square 420', 'Helsinki', 'Finland'),
(3, 'Green st.', 'Hexagon 919', 'Berlin', 'Germany'),
(4, 'Pink st.', 'Line 100', 'Tokyo', 'Japan'),
(5, 'Cyan st.', 'Dot 1', 'Stockholm', 'Sweden'),
(6, 'Black st.', 'Triangle 420', 'Addis Ababa', 'Ethiopia'),
(7, 'Blue st.', 'Dot 1', 'Osaka', 'Japan'),
(8, 'Red st.', 'Pentagon 550', 'Seoul', 'South Korea'),
(9, 'White st.', 'Square 360', 'Hamburg', 'Germany'),
(10, 'Blue st.', 'Triangle 180', 'Lisbon', 'Portugal');

-- --------------------------------------------------------

--
-- Table structure for table `store_phone`
--

CREATE TABLE `store_phone` (
  `ID` int(11) NOT NULL,
  `phone_number` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `store_phone`
--

INSERT INTO `store_phone` (`ID`, `phone_number`) VALUES
(1, 1122),
(2, 4466),
(3, 1122),
(4, 2233),
(5, 6677),
(6, 7755),
(7, 2233),
(8, 12312),
(9, 123123),
(1, 23020),
(10, 123123);

-- --------------------------------------------------------

--
-- Stand-in structure for view `V`
--
CREATE TABLE `V` (
`ID` int(11)
,`sum_price` decimal(32,0)
);

-- --------------------------------------------------------

--
-- Table structure for table `work`
--

CREATE TABLE `work` (
  `s_id` int(11) NOT NULL,
  `e_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `work`
--

INSERT INTO `work` (`s_id`, `e_id`) VALUES
(1, 3),
(5, 4),
(3, 7),
(4, 9),
(6, 10),
(2, 11),
(7, 12),
(8, 13),
(9, 14),
(10, 777);

-- --------------------------------------------------------

--
-- Structure for view `A`
--
DROP TABLE IF EXISTS `A`;
-- in use(#1046 - No database selected)

-- --------------------------------------------------------

--
-- Structure for view `V`
--
DROP TABLE IF EXISTS `V`;

CREATE ALGORITHM=UNDEFINED DEFINER=`group5`@`%` SQL SECURITY DEFINER VIEW `V`  AS  (select `shipment`.`c_id` AS `ID`,sum(`shipment`.`price`) AS `sum_price` from `shipment` group by `shipment`.`c_id`) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `bill_shipment`
--
ALTER TABLE `bill_shipment`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `ID` (`ID`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `username` (`username`,`email`),
  ADD UNIQUE KEY `ID` (`ID`);

--
-- Indexes for table `package`
--
ALTER TABLE `package`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `ID` (`ID`),
  ADD KEY `ID_2` (`ID`);

--
-- Indexes for table `shipment`
--
ALTER TABLE `shipment`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `from_s_id` (`from_s_id`,`to_s_id`,`c_id`),
  ADD KEY `to_s_id` (`to_s_id`),
  ADD KEY `c_id` (`c_id`);

--
-- Indexes for table `store`
--
ALTER TABLE `store`
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
-- AUTO_INCREMENT for table `bill`
--
ALTER TABLE `bill`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `bill_shipment`
--
ALTER TABLE `bill_shipment`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=778;
--
-- AUTO_INCREMENT for table `package`
--
ALTER TABLE `package`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
--
-- AUTO_INCREMENT for table `shipment`
--
ALTER TABLE `shipment`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100000039;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `shipment`
--
ALTER TABLE `shipment`
  ADD CONSTRAINT `shipment_ibfk_1` FOREIGN KEY (`from_s_id`) REFERENCES `store` (`ID`),
  ADD CONSTRAINT `shipment_ibfk_2` FOREIGN KEY (`to_s_id`) REFERENCES `store` (`ID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

create database service;


SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


CREATE TABLE `adminlogin_tb` (
  `a_login_id` int(11) NOT NULL,
  `a_name` varchar(60) COLLATE utf8_bin NOT NULL,
  `a_email` varchar(60) COLLATE utf8_bin NOT NULL,
  `a_password` varchar(60) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;


 TRUNCATE TABLE adminlogin_tb;
 
INSERT INTO `adminlogin_tb` (`a_login_id`, `a_name`, `a_email`, `a_password`) VALUES
(1, 'admin1', 'admin1@gmail.com', '1234'),
(2, 'admin2', 'admin2@gmail.com', '1234'),
(3, 'admin3', 'admin3@gmail.com', '1234'),
(4, 'admin4', 'admin4@gmail.com', '1234'),
(5, 'admin5', 'admin5@gmail.com', '1234'),
(6, 'admin6', 'admin6@gmail.com', '1234'),
(7, 'admin7', 'admin7@gmail.com', '1234'),
(8, 'admin8', 'admin8@gmail.com', '1234'),
(9, 'admin9', 'admin9@gmail.com', '1234'),
(10, 'admin10', 'admin10@gmail.com','1234');



CREATE TABLE `assets_tb` (
  `pid` int(11) NOT NULL,
  `pname` varchar(60) COLLATE utf8_bin NOT NULL,
  `pdop` date NOT NULL,
  `pava` int(11) NOT NULL,
  `ptotal` int(11) NOT NULL,
  `poriginalcost` int(11) NOT NULL,
  `psellingcost` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

 TRUNCATE TABLE assets_tb;
 
INSERT INTO `assets_tb` (`pid`, `pname`, `pdop`, `pava`, `ptotal`, `poriginalcost`, `psellingcost`) VALUES
(1, 'Keyboard dell', '2024-10-01', 10, 10, 400, 500),
(2, 'Mouse hp', '2024-10-02', 10, 10, 500, 600),
(3, 'Hammer', '2024-10-03', 10, 10, 1000, 1200),
(4, 'Flashlight', '2024-10-04', 10, 10, 1100, 1300),
(5, 'Measuring tape', '2024-10-05', 10, 10, 1000, 1200),
(6, 'Vacuum cleaner', '2024-10-06', 10, 10, 10000, 12000),
(7, 'Power bank', '2024-10-07', 10, 10, 10000, 12000),
(8, 'Camera', '2024-10-08', 10, 10, 100000, 120000),
(9, 'Ladder', '2024-10-09', 10, 10, 10000, 12000),
(10, 'Screwdriver', '2024-10-10', 10, 10, 1000, 1200);



CREATE TABLE `assignwork_tb` (
  `rno` int(11) NOT NULL,
  `request_id` int(11) NOT NULL,
  `request_info` text COLLATE utf8_bin NOT NULL,
  `request_desc` text COLLATE utf8_bin NOT NULL,
  `requester_name` varchar(60) COLLATE utf8_bin NOT NULL,
  `requester_add1` text COLLATE utf8_bin NOT NULL,
  `requester_add2` text COLLATE utf8_bin NOT NULL,
  `requester_city` varchar(60) COLLATE utf8_bin NOT NULL,
  `requester_state` varchar(60) COLLATE utf8_bin NOT NULL,
  `requester_zip` int(11) NOT NULL,
  `requester_email` varchar(60) COLLATE utf8_bin NOT NULL,
  `requester_mobile` bigint(11) NOT NULL,
  `assign_tech` varchar(60) COLLATE utf8_bin NOT NULL,
  `assign_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;


TRUNCATE TABLE assignwork_tb;

INSERT INTO `assignwork_tb` (`rno`, `request_id`, `request_info`, `request_desc`, `requester_name`, `requester_add1`, `requester_add2`, `requester_city`, `requester_state`, `requester_zip`, `requester_email`, `requester_mobile`, `assign_tech`, `assign_date`) VALUES
(1, 1, 'i want plumber', 'in my water tank the water is leaking all over the floor i want to fix it', 'requester1', '1/10, gandhi street,kovai', 'Dmart', 'abc city', 'Tamilnadu', 635874, 'requester1@gmail.com', 9876507654, 'tech1', '2024-10-14'),
(2, 2, 'i want electrician', 'my ups setup is not working after the heavy rain i want to fix it', 'requester2', '2/11, abc street, namakkal', 'I-MAX theater', 'high city', 'Tamilnadu', 637505, 'requester2@gmail.com', 8976534754, 'tech2', '2024-10-11'),
(3, 3, 'i want carpenter', 'my door is not locking properly i  think the problem is in locking system', 'requester3', '3/14, nehru street, hosur', 'water tank', 'light house city', 'karnataka', 634875, 'requester3@gmail.com', 9687576548, 'tech3', '2024-10-9'),
(4, 4, 'i want to repair my bike', 'after flood my bike could not start i want to fix it', 'requester4', '4/29 ,rainbow street, chennai', 'ragavendra stationary shop', 'xyz city', 'Tamilnadu', 632164, 'requester4@gmail.com', 6789545678, 'tech4', '2024-10-17'),
(5, 5, 'i want taxi driver', 'i want to go to college by using taxi from my place to kce college,kovai', 'requester5', '14/60, kalam street, Goa', 'abc bus stop', 'salem city', 'kerala', 634893, 'requester5@gmail.com', 9685784433, 'tech5', '2024-10-19'),
(6, 6, 'i want plumber', 'in my water tank the water is leaking all over the floor i want to fix it', 'requester1', '1/10, gandhi street,kovai', 'Dmart', 'abc city', 'Tamilnadu', 635874, 'requester1@gmail.com', 9876507654, 'tech1', '2024-10-14'),
(7, 7, 'i want electrician', 'my ups setup is not working after the heavy rain i want to fix it', 'requester2', '2/11, abc street, namakkal', 'I-MAX theater', 'high city', 'Tamilnadu', 637505, 'requester2@gmail.com', 8976534754, 'tech2', '2024-10-11'),
(8, 8, 'i want carpenter', 'my door is not locking properly i  think the problem is in locking system', 'requester3', '3/14, nehru street, hosur', 'water tank', 'light house city', 'karnataka', 634875, 'requester3@gmail.com', 9687576548, 'tech3', '2024-10-9'),
(9, 9, 'i want to repair my bike', 'after flood my bike could not start i want to fix it', 'requester4', '4/29 ,rainbow street, chennai', 'ragavendra stationary shop', 'xyz city', 'Tamilnadu', 632164, 'requester4@gmail.com', 6789545678, 'tech4', '2024-10-17'),
(10, 10, 'i want taxi driver', 'i want to go to college by using taxi from my place to kce college,kovai', 'requester5', '14/60, kalam street, Goa', 'abc bus stop', 'salem city', 'kerala', 634893, 'requester5@gmail.com', 9685784433, 'tech5', '2024-10-19');


CREATE TABLE `customer_tb` (
  `custid` int(11) NOT NULL,
  `custname` varchar(60) COLLATE utf8_bin NOT NULL,
  `custadd` varchar(60) COLLATE utf8_bin NOT NULL,
  `cpname` varchar(60) COLLATE utf8_bin NOT NULL,
  `cpquantity` int(11) NOT NULL,
  `cpeach` int(11) NOT NULL,
  `cptotal` int(11) NOT NULL,
  `cpdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;


 TRUNCATE TABLE customer_tb;
 
INSERT INTO `customer_tb` (`custid`, `custname`, `custadd`, `cpname`, `cpquantity`, `cpeach`, `cptotal`, `cpdate`) VALUES
(1, 'clint1', 'city1', 'Mouse hp', 1, 600, 600, '2018-10-13'),
(2, 'clint2', 'city2', 'Vacuum cleaner', 2, 600, 600, '2018-10-13'),
(3, 'clint3', 'city3', 'Screwdriver', 1, 600, 3000, '2018-10-13'),
(4, 'clint4', 'city4', 'Mouse hp', 2, 600, 1200, '2018-10-13'),
(5, 'clint5', 'city5', 'Vacuum cleaner', 1, 600, 600, '2018-10-13'),
(6, 'clint6', 'city6', 'Screwdriver', 2, 500, 500, '2018-10-13'),
(7, 'clint7', 'city7', 'Power bank', 1, 500, 500, '2018-10-09'),
(8, 'clint8', 'city8', 'Mouse hp', 2, 500, 1000, '2018-10-21'),
(9, 'clint9', 'city9', 'Vacuum cleaner', 1, 500, 500, '2018-10-20'),
(10, 'clint10', 'city10', 'Power bank', 2, 500, 500, '2018-10-20'),
(11, 'clint11', 'city11', 'Screwdriver', 1, 12000, 12000, '2018-10-20'),
(12, 'clint12', 'city12', 'Ladder', 2, 500, 500, '2018-10-20'),
(13, 'clint13', 'city13', 'Measuring tape', 1, 500, 500, '2018-10-20'),
(14, 'clint14', 'city14', 'Measuring tape', 2, 12000, 12000, '2018-10-20'),
(15, 'clint15', 'city15', 'Ladder', 1, 12000, 12000, '2018-10-20');



CREATE TABLE `requesterlogin_tb` (
  `r_login_id` int(11) NOT NULL,
  `r_name` varchar(60) COLLATE utf8_bin NOT NULL,
  `r_email` varchar(60) COLLATE utf8_bin NOT NULL,
  `r_password` varchar(60) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;


 TRUNCATE TABLE requesterlogin_tb;
 
INSERT INTO `requesterlogin_tb` (`r_login_id`, `r_name`, `r_email`, `r_password`) VALUES
(1, 'requester1', 'requester1@gmail.com', '1234'),
(2, 'requester2', 'requester2@gmail.com', '1234'),
(3, 'requester3', 'requester3@gmail.com', '1234'),
(4, 'requester4', 'requester4@gmail.com', '1234'),
(5, 'requester5', 'requester5@gmail.com', '1234'),
(6, 'requester6', 'requester6@gmail.com', '1234'),
(7, 'requester7', 'requester7@gmail.com', '1234'),
(8, 'requester8', 'requester8@gmail.com', '1234'),
(9, 'requester9', 'requester9@gmail.com', '1234'),
(10, 'requester10', 'requester10@gmail.com', '1234');



CREATE TABLE `submitrequest_tb` (
  `request_id` int(11) NOT NULL,
  `request_info` text COLLATE utf8_bin NOT NULL,
  `request_desc` text COLLATE utf8_bin NOT NULL,
  `requester_name` varchar(60) COLLATE utf8_bin NOT NULL,
  `requester_add1` text COLLATE utf8_bin NOT NULL,
  `requester_add2` text COLLATE utf8_bin NOT NULL,
  `requester_city` varchar(60) COLLATE utf8_bin NOT NULL,
  `requester_state` varchar(60) COLLATE utf8_bin NOT NULL,
  `requester_zip` int(11) NOT NULL,
  `requester_email` varchar(60) COLLATE utf8_bin NOT NULL,
  `requester_mobile` bigint(11) NOT NULL,
  `request_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;


TRUNCATE TABLE submitrequest_tb;

INSERT INTO `submitrequest_tb` (`request_id`, `request_info`, `request_desc`, `requester_name`, `requester_add1`, `requester_add2`, `requester_city`, `requester_state`, `requester_zip`, `requester_email`, `requester_mobile`, `request_date`) VALUES
(1, 'i want plumber', 'in my water tank the water is leaking all over the floor i want to fix it', 'requester1', '1/10, gandhi street,kovai', 'Dmart', 'abc city', 'Tamilnadu', 635874, 'requester1@gmail.com', 9876507654, '2024-10-10'),
(2, 'i want electrician', 'my ups setup is not working after the heavy rain i want to fix it', 'requester2', '2/11, abc street, namakkal', 'I-MAX theater', 'high city', 'Tamilnadu', 637505, 'requester2@gmail.com', 8976534754, '2024-9-11'),
(3, 'i want carpenter', 'my door is not locking properly i  think the problem is in locking system', 'requester3', '3/14, nehru street, hosur', 'water tank', 'light house city', 'karnataka', 634875, 'requester3@gmail.com', 9687576548, '2024-9-9'),
(4, 'i want to repair my bike', 'after flood my bike could not start i want to fix it', 'requester4', '4/29 ,rainbow street, chennai', 'ragavendra stationary shop', 'xyz city', 'Tamilnadu', 632164, 'requester4@gmail.com', 6789545678,  '2024-9-17'),
(5, 'i want taxi driver', 'i want to go to college by using taxi from my place to kce college,kovai', 'requester5', '14/60, kalam street, Goa', 'abc bus stop', 'salem city', 'kerala', 634893, 'requester5@gmail.com', 9685784433, '2024-9-19'),
(6, 'i want plumber', 'in my water tank the water is leaking all over the floor i want to fix it', 'requester1', '1/10, gandhi street,kovai', 'Dmart', 'abc city', 'Tamilnadu', 635874, 'requester1@gmail.com', 9876507654, '2024-9-14'),
(7, 'i want electrician', 'my ups setup is not working after the heavy rain i want to fix it', 'requester2', '2/11, abc street, namakkal', 'I-MAX theater', 'high city', 'Tamilnadu', 637505, 'requester2@gmail.com', 8976534754, '2024-9-11'),
(8, 'i want carpenter', 'my door is not locking properly i  think the problem is in locking system', 'requester3', '3/14, nehru street, hosur', 'water tank', 'light house city', 'karnataka', 634875, 'requester3@gmail.com', 9687576548, '2024-9-9'),
(9, 'i want to repair my bike', 'after flood my bike could not start i want to fix it', 'requester4', '4/29 ,rainbow street, chennai', 'ragavendra stationary shop', 'xyz city', 'Tamilnadu', 632164, 'requester4@gmail.com', 6789545678, '2024-9-17'),
(10, 'i want taxi driver', 'i want to go to college by using taxi from my place to kce college,kovai', 'requester5', '14/60, kalam street, Goa', 'abc bus stop', 'salem city', 'kerala', 634893, 'requester5@gmail.com', 9685784433, '2024-9-19');



CREATE TABLE `technician_tb` (
  `empid` int(11) NOT NULL,
  `empName` varchar(60) COLLATE utf8_bin NOT NULL,
  `empCity` varchar(60) COLLATE utf8_bin NOT NULL,
  `empMobile` bigint(11) NOT NULL,
  `empEmail` varchar(60) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;


TRUNCATE TABLE technician_tb;

INSERT INTO `technician_tb` (`empid`, `empName`, `empCity`, `empMobile`, `empEmail`) VALUES
(1, 'tech1', 'city1', 1234567890, 'tech1@gmail.com'),
(2, 'tech2', 'city2', 1234467890, 'tech2@gmail.com'),
(3, 'tech3', 'city3', 1234557890, 'tech3@gmail.com'),
(4, 'tech4', 'city4', 1234566890, 'tech4@gmail.com'),
(5, 'tech5', 'city5', 1234567790, 'tech5@gmail.com'),
(6, 'tech6', 'city6', 1234567880, 'tech6@gmail.com'),
(7, 'tech7', 'city7', 1234567899, 'tech7@gmail.com'),
(8, 'tech8', 'city8', 1134567890, 'tech8@gmail.com'),
(9, 'tech9', 'city9', 1224567890, 'tech9@gmail.com'),
(10, 'tech10', 'city10', 1233567890, 'tech10@gmail.com');



ALTER TABLE `adminlogin_tb`
  ADD PRIMARY KEY (`a_login_id`);


ALTER TABLE `assets_tb`
  ADD PRIMARY KEY (`pid`);


ALTER TABLE `assignwork_tb`
  ADD PRIMARY KEY (`rno`);


ALTER TABLE `customer_tb`
  ADD PRIMARY KEY (`custid`);


ALTER TABLE `requesterlogin_tb`
  ADD PRIMARY KEY (`r_login_id`);


ALTER TABLE `submitrequest_tb`
  ADD PRIMARY KEY (`request_id`);


ALTER TABLE `technician_tb`
  ADD PRIMARY KEY (`empid`);


ALTER TABLE `adminlogin_tb`
  MODIFY `a_login_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;


ALTER TABLE `assets_tb`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;


ALTER TABLE `assignwork_tb`
  MODIFY `rno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;


ALTER TABLE `customer_tb`
  MODIFY `custid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;


ALTER TABLE `requesterlogin_tb`
  MODIFY `r_login_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;


ALTER TABLE `submitrequest_tb`
  MODIFY `request_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;


ALTER TABLE `technician_tb`
  MODIFY `empid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
COMMIT;

ALTER TABLE requesterlogin_tb
ADD COLUMN r_fullname VARCHAR(255) NULL,
ADD COLUMN r_phoneno VARCHAR(15) NULL,
ADD COLUMN r_dateofbirth DATE NULL,
ADD COLUMN r_address VARCHAR(255) NULL,
ADD COLUMN r_zipcode VARCHAR(10) NULL,
ADD COLUMN r_country VARCHAR(100) NULL,
ADD COLUMN r_preferedlanguage VARCHAR(50) NULL,
ADD COLUMN r_recoveryemail VARCHAR(255) NULL;




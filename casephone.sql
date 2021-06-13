-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 26, 2020 at 09:00 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `casephone`
--

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `empID` int(10) NOT NULL,
  `empName` varchar(30) NOT NULL,
  `empLName` varchar(30) NOT NULL,
  `empEmail` varchar(30) NOT NULL,
  `empPassword` varchar(10) NOT NULL,
  `empTel` varchar(10) NOT NULL,
  `empDepart` varchar(20) NOT NULL,
  `empLicense` varchar(20) NOT NULL COMMENT 'สิทธิ์การเข้าถึง'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`empID`, `empName`, `empLName`, `empEmail`, `empPassword`, `empTel`, `empDepart`, `empLicense`) VALUES
(1, 'ผู้ดูแลระบบ', 'ใหญ่ที่สุด', 'admin@gmail.com', '123456', '0879965328', 'Admin', 'a'),
(2, 'ณวัฒน์', 'สิริธนากร', 'kokojung@gmail.com', '123456', '0853698741', 'sale', 'a'),
(3, 'ชัยปอม', 'หวลบุดตา', 'jamezaza@gmail.com', '123456', '0968745201', 'warehouse', 'a'),
(5, 'สาโรจน์', 'วิจิตชัย', 'saroj@gmail.com', '123456', '026587493', 'IT', 'a'),
(6, 'เฌอปราง', 'อารีย์กุล', 'cherprangbnk48@gmail.com', '02050205', '0896654273', 'sale manager', 'a'),
(7, 'ณัฐรุจา', 'ชุติวรรณโสภณ', 'kaewbnk48@gmail.com', '31033103', '096321475', 'marketing manager', 'a'),
(8, 'แพรวา', 'สุธรรมพงษ์', 'mucisbnk48@gmail.com', '123456', '0987563210', 'warehouse', 'a'),
(9, 'พิมรภัส', 'ผดุงวัฒนะโชค', 'mobilebnk48@gmail.com', '123456', '0658745230', 'IT', 'a');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `memberID` int(10) NOT NULL,
  `memName` varchar(30) NOT NULL,
  `memLName` varchar(30) NOT NULL,
  `memEmail` varchar(30) NOT NULL,
  `memPassword` varchar(10) NOT NULL,
  `memTel` varchar(10) NOT NULL,
  `memAddress` varchar(70) NOT NULL,
  `memLicense` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`memberID`, `memName`, `memLName`, `memEmail`, `memPassword`, `memTel`, `memAddress`, `memLicense`) VALUES
(1, 'วันชนะ', 'เหลือล้น', 'one@email.com', '123456', '024546603', '3522 ถ. ลาดพร้าว แขวง คลองจั่น เขตบางกะปิ กรุงเทพมหานคร 10240', 'm'),
(2, 'กรกฎ', 'ไกรศรีโกศล', 'name.jj@hotmail.com', '123456', '0863369874', '607 ถนนเพชรเกษม แขวง บางหว้า เขตภาษีเจริญ กรุงเทพมหานคร 10160', 'm'),
(3, 'สุภิรดา ', 'คำนาโฮม', 'fernfinnnnn@hotmail.com', '36703670', '0998632140', '311 หมู่ที่ 7 ถนน เลี่ยงเมืองอุบลราชธานี ตำบล แจระแม อำเภอเมืองอุบลราช', 'm'),
(4, 'สราวุฒิ', 'จำนงค์นอก', 'teelnwza007@gmail.com', '123456', '0874523690', '99 หมู่ที่ 8 ถนน พหลโยธิน ตำบลคูคต อำเภอลำลูกกา ปทุมธานี 12130', 'a');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `orderID` int(10) NOT NULL,
  `orderUnit` varchar(10) NOT NULL,
  `orderPrice` varchar(10) NOT NULL,
  `orderpay` varchar(200) NOT NULL,
  `ordertran` varchar(30) NOT NULL,
  `orderdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`orderID`, `orderUnit`, `orderPrice`, `orderpay`, `ordertran`, `orderdate`) VALUES
(26, '28', '6000', 'True Wallet', 'พัสดุเร่งด่วน EMS', '2020-03-19'),
(28, '1', '799', 'SCB', 'พัสดุธรรมดา', '2020-03-19'),
(29, '20', '3060', 'Paypal', 'Kerry Express', '2020-03-21'),
(30, '3', '2550', 'True Wallet', 'Kerry Express', '2020-03-21'),
(32, '3', '910', 'Paypal', 'Kerry Express', '2020-03-22'),
(34, '10', '1030', 'True Wallet', 'พัสดุธรรมดา', '2020-03-22'),
(35, '2', '659', 'SCB', 'Kerry Express', '2020-03-22'),
(36, '20', '2050', 'True Wallet', 'พัสดุเร่งด่วน EMS', '2020-03-22'),
(37, '2', '5260', 'SCB', 'Kerry Express', '2020-03-23'),
(38, '21', '3260', 'True Wallet', 'Kerry Express', '2020-03-23'),
(39, '2', '960', 'True Wallet', 'Kerry Express', '2020-03-23'),
(40, '3', '660', 'SCB', 'Kerry Express', '2020-03-23'),
(41, '1', '360', 'True Wallet', 'Kerry Express', '2020-03-26'),
(42, '3', '1199', 'SCB', 'พัสดุธรรมดา', '2020-03-27'),
(43, '3', '1279', 'Paypal', 'Kerry Express', '2020-03-27'),
(44, '1', '260', 'True Wallet', 'Kerry Express', '2020-03-27'),
(45, '1', '350', 'SCB', 'พัสดุเร่งด่วน EMS', '2020-03-27'),
(50, '3', '1760', 'True Wallet', 'Kerry Express', '2020-03-27'),
(51, '156', '23260', 'SCB', 'Kerry Express', '2020-03-27'),
(53, '4', '5670', 'SCB', 'พัสดุเร่งด่วน EMS', '2020-03-27');

-- --------------------------------------------------------

--
-- Table structure for table `paynotify`
--

CREATE TABLE `paynotify` (
  `payId` int(10) NOT NULL,
  `payName` varchar(50) NOT NULL,
  `payImg` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `paynotify`
--

INSERT INTO `paynotify` (`payId`, `payName`, `payImg`) VALUES
(3, 'สุภิรดา คำนาโฮม', 'payment005.jpg'),
(4, 'สุภิรดา คำนาโฮม', 'payment001.jpg'),
(5, 'สุภิรดา คำนาโฮม', 'payment008.jpg'),
(6, 'สุภิรดา คำนาโฮม', 'payment0013jpg.png'),
(7, 'กรกฎ ไกรศรีโกศล', 'payment0006.png');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `ProductID` int(10) NOT NULL,
  `ProductName` varchar(50) NOT NULL,
  `ProductPrice` varchar(20) NOT NULL,
  `ProductImg` varchar(200) NOT NULL,
  `ProductType` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`ProductID`, `ProductName`, `ProductPrice`, `ProductImg`, `ProductType`) VALUES
(1, 'case OPPO ', '100', 'case1.jpg', 'case'),
(7, 'case ROV ลาย Nakroth', '200', 'case2.jpg', 'case'),
(8, 'case ลิงน้อยน่ารัก', '300', 'case3.jpg', 'case'),
(9, 'case น้องหมา', '350', 'case4.jpg', 'case'),
(10, 'Film Nano Glass Sumsung Galaxzy S10', '350', 'f1.jpg', 'film'),
(11, 'Film 9H+ Glass IPhoneXS/X', '600', 'f2.jpg', 'film'),
(12, 'กระจกกันรอย Focus Tempered glass', '200', 'f3.jpg', 'film'),
(13, 'Philips MC-0423 สีดำ 8000mah', '769', 'p1.jpg', 'powerbank'),
(14, 'Floureon F-478 20000mah', '1500', 'p2.jpg', 'powerbank'),
(15, 'Notolola NA-98 Limited 50000mah', '3500', 'p3.jpg', 'powerbank'),
(16, 'สายชาร์จ Iphone สีส้มอ่อน', '190', 'b1.jpg', 'cable'),
(17, 'Micro USB Data Cable ', '100', 'b2.jpg', 'cable'),
(18, 'สายชาร์จ HUAWEI ของแท้100%', '300', 'b3.jpg', 'cable'),
(19, 'SONY Enjoy music and talk wiressly', '550', 'b4.jpg', 'cable'),
(20, 'AirPods Pro', '5000', 'h1.jpg', 'headphone'),
(21, 'หูฟัง QCY Q-201 ', '320', 'h2.jpg', 'headphone'),
(22, 'Baseus S06 สีดำ', '199', 'h3.jpg', 'headphone'),
(23, 'case ลาย สติช OPPO y91', '140', 'case05.jpg', 'case'),
(24, 'Focus UC for Iphone 6/6s/6s plus', '360', 'f4.jpg', 'film'),
(25, 'Focus Super Film for Iphone X/XS', '700', 'f5.jpg', 'film'),
(26, 'Nillkin for HUAWEI P30 Pro', '260', 'f6.jpg', 'film'),
(27, 'AirPods ', '3200', 'h4.jpg', 'headphone'),
(28, 'VEGER Slim Digi Power Bank 13000mah', '762', 'p4.jpg', 'powerbank'),
(29, 'Mi Wireless power bank ', '1250', 'p5.jpg', 'powerbank'),
(30, 'Sony 780-1 32000mah', '740', 'p6.jpg', 'powerbank'),
(31, 'UGREEN USB C for HUAWEI', '400', 'b5.jpg', 'cable'),
(32, 'case หูกระต่ายสีแดง', '200', 'case06.jpg', 'case'),
(33, 'case LINE Brown', '1470', 'case07.jpg', 'case'),
(34, 'Razer HAMMERHEAD PRO', '1990', 'h5.jpg', 'headphone'),
(35, 'XTRA FLASH 2.4A Cable Lenght', ' 399', 'b6.jpg', 'cable'),
(36, 'หูฟัง POLY 91 สีดำ', '120', 'h6.jpg', 'headphone');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`empID`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`memberID`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orderID`);

--
-- Indexes for table `paynotify`
--
ALTER TABLE `paynotify`
  ADD PRIMARY KEY (`payId`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`ProductID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `empID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `memberID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `orderID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `paynotify`
--
ALTER TABLE `paynotify`
  MODIFY `payId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `ProductID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

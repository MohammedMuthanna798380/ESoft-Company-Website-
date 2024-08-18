-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 28, 2022 at 03:29 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `company`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `cust_id` int(12) NOT NULL,
  `cust_username` varchar(30) NOT NULL,
  `cust_password` varchar(30) NOT NULL,
  `E_mail` varchar(30) NOT NULL,
  `Bdate` date NOT NULL,
  `image` binary(100) DEFAULT NULL,
  `address` varchar(15) NOT NULL,
  `FName` varchar(60) NOT NULL,
  `LName` varchar(60) NOT NULL,
  `cust_phon` varchar(15) NOT NULL,
  `cust_type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`cust_id`, `cust_username`, `cust_password`, `E_mail`, `Bdate`, `image`, `address`, `FName`, `LName`, `cust_phon`, `cust_type`) VALUES
(5, 'MOHAMED', '12345', 'mha5677@gmail.com', '1999-05-19', NULL, 'شارع الروضة', 'محمد عبدالعزيز', 'عزوز', '77353541', 'شركة'),
(6, 'Azoz', '5678', 'abood@gmail.com', '2018-07-10', NULL, 'شارع التحرير', 'عبدالرحمن', 'المخلافي', '77353541', 'محل تجاري'),
(9, 'osama', '1234', 'osama@gmail.com', '2009-06-16', NULL, 'شارع التحرير', 'اسامه', 'الاثوري', '77353541', 'محل تجاري'),
(21, 'Adries', '666', 'adriess@gmail.com', '2001-12-11', NULL, 'إب', 'إدريس', 'الحداد', '777112233', 'مؤسسة'),
(22, 'MONEER', '555', 'moneer@gmail.com', '2021-11-22', NULL, 'شارع الروضة', 'منير', 'السامعي', '733321114', 'محل تجاري');

-- --------------------------------------------------------

--
-- Table structure for table `cust_serv`
--

CREATE TABLE `cust_serv` (
  `id` int(11) NOT NULL,
  `cust_id` int(12) NOT NULL,
  `serv_id` int(8) NOT NULL,
  `requst_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cust_serv`
--

INSERT INTO `cust_serv` (`id`, `cust_id`, `serv_id`, `requst_date`) VALUES
(1, 5, 1, '0000-00-00 00:00:00'),
(2, 5, 2, '0000-00-00 00:00:00'),
(3, 5, 2, '0000-00-00 00:00:00'),
(4, 5, 2, '0000-00-00 00:00:00'),
(5, 5, 2, '0000-00-00 00:00:00'),
(6, 5, 2, '0000-00-00 00:00:00'),
(7, 5, 2, '0000-00-00 00:00:00'),
(8, 5, 2, '0000-00-00 00:00:00'),
(9, 5, 2, '0000-00-00 00:00:00'),
(10, 5, 2, '0000-00-00 00:00:00'),
(11, 5, 2, '0000-00-00 00:00:00'),
(12, 5, 2, '0000-00-00 00:00:00'),
(13, 5, 2, '0000-00-00 00:00:00'),
(14, 5, 2, '0000-00-00 00:00:00'),
(15, 5, 2, '0000-00-00 00:00:00'),
(16, 5, 8, '0000-00-00 00:00:00'),
(17, 5, 8, '0000-00-00 00:00:00'),
(18, 5, 6, '0000-00-00 00:00:00'),
(19, 5, 6, '0000-00-00 00:00:00'),
(20, 5, 3, '0000-00-00 00:00:00'),
(21, 5, 3, '0000-00-00 00:00:00'),
(22, 5, 8, '0000-00-00 00:00:00'),
(23, 5, 7, '0000-00-00 00:00:00'),
(24, 5, 4, '0000-00-00 00:00:00'),
(25, 5, 5, '0000-00-00 00:00:00'),
(26, 5, 5, '0000-00-00 00:00:00'),
(27, 5, 4, '0000-00-00 00:00:00'),
(28, 5, 4, '0000-00-00 00:00:00'),
(29, 5, 4, '0000-00-00 00:00:00'),
(30, 5, 4, '0000-00-00 00:00:00'),
(31, 5, 4, '0000-00-00 00:00:00'),
(32, 5, 4, '0000-00-00 00:00:00'),
(33, 5, 4, '0000-00-00 00:00:00'),
(34, 5, 4, '0000-00-00 00:00:00'),
(35, 5, 4, '0000-00-00 00:00:00'),
(36, 5, 8, '0000-00-00 00:00:00'),
(37, 5, 8, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `dept_id` int(8) NOT NULL,
  `dept_name` varchar(60) NOT NULL,
  `ssn` varchar(20) DEFAULT NULL,
  `start_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`dept_id`, `dept_name`, `ssn`, `start_date`) VALUES
(4, 'قسم الأنظمة', '1111', '2022-06-10'),
(5, ' قسم الويب', '2222', '2004-04-12'),
(6, ' قسم الاندرويد', '3333', '2013-02-02'),
(8, ' برامج الحاسوب', '3333', '2018-12-04'),
(10, ' قسم الالعاب', '4444', '2021-12-04'),
(11, ' برامج الايفون', '1111', '2019-12-23'),
(12, ' قسم الشبكات', '2222', '2021-04-21'),
(13, ' قسم التطبيقات', '4444', '2019-05-04');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `SSN` varchar(20) NOT NULL,
  `FName` varchar(20) NOT NULL,
  `LName` varchar(20) NOT NULL,
  `address` varchar(50) NOT NULL,
  `Bdate` date NOT NULL,
  `image` varchar(160) NOT NULL,
  `sex` varchar(15) NOT NULL,
  `E_mail` varchar(60) NOT NULL,
  `dept_id` int(8) NOT NULL,
  `phon_emp` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`SSN`, `FName`, `LName`, `address`, `Bdate`, `image`, `sex`, `E_mail`, `dept_id`, `phon_emp`) VALUES
('1111', 'محمد', 'مثنى', 'شارع جمال', '2012-06-18', '1656359726IMG_0088.JPG', 'ذكر', 'mohmd798380@gmail.com', 4, '777223311'),
('2222', 'عبدالرحمن', 'القاسمي', 'شارع الحصب', '2013-06-05', '1656357481IMG_0087.JPG', 'ذكر', 'abood87675@gmail.com', 5, '733225544'),
('3333', 'محمدعبدالعزيز', 'عزوز', 'شارع التحرير', '1999-07-12', '1656357335IMG_0094.JPG', 'ذكر', 'mha5677@gmail.com', 6, '712345671'),
('4444', 'عبدالرحمن', 'المخلافي', 'شارع الروضة', '2000-12-12', '1656357506IMG_0078.JPG', 'ذكر', 'abood@gmail.com', 10, '772255669');

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `proj_id` int(8) NOT NULL,
  `proj_name` varchar(20) NOT NULL,
  `proj_desc` varchar(1000) NOT NULL,
  `dept_id` int(8) NOT NULL,
  `cust_id` int(12) NOT NULL,
  `date_deliver` datetime NOT NULL,
  `image1` varchar(200) NOT NULL,
  `image2` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`proj_id`, `proj_name`, `proj_desc`, `dept_id`, `cust_id`, `date_deliver`, `image1`, `image2`) VALUES
(6, ' موقع تويتر', 'تم تصميم الموقع باستخدام ثلاث لغات html و css و php وتم عمله ليكون مناسبا مع مختلف الشاشات', 4, 21, '2022-11-11 00:00:00', '1656352070tw.png', '1656352070twitter.png'),
(7, ' موقع يمن كافي', 'انه موقع لكافيه يعرض كل اصناف الاكلات المتوفره للكافية ويمكنك من خلال الموقع طلب الاكلات التي تريد ويمكنك تسجيل حساب كونك عميل لديهم', 5, 22, '2011-02-11 00:00:00', '1656353022WEB3.jpg', '1656353022webe.jpg'),
(8, ' مشروع موقع شركة', 'هي عبارة عن شركة برمجية تتكون من عدة اقسام وتوفر عدة خدمات ولديها الكثير من المشاريع في هذا الموقع تم عرض كل الامور المتعلقة بالشركة', 6, 6, '2022-12-22 00:00:00', '1656353233bot.png', '1656353233bot2.png');

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `serv_id` int(8) NOT NULL,
  `serv_name` varchar(50) NOT NULL,
  `serv_desc` varchar(1000) NOT NULL,
  `dept_id` int(8) NOT NULL,
  `color` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`serv_id`, `serv_name`, `serv_desc`, `dept_id`, `color`) VALUES
(1, ' الأنظمة الأدارية', 'سنجعلك علامة تجارية جذابة وتترك أثرا ربما أن مجموعتك المستهدفة لن تنساك أبدا', 5, 'blue'),
(2, ' الأنظمة المحاسبية', 'سنجعلك علامة تجارية جذابة وتترك أثرا ربما أن مجموعتك المستهدفة لن تنساك أبدا', 4, 'orange'),
(3, ' تطبيقات الأندرويد', 'سنجعلك علامة تجارية جذابة وتترك أثرا ربما أن مجموعتك المستهدفة لن تنساك أبدا', 6, 'green'),
(4, ' تصميم مواقع ويب', 'سنجعلك علامة تجارية جذابة وتترك أثرا ربما أن مجموعتك المستهدفة لن تنساك أبدا', 8, 'red'),
(5, ' تصميم متاجر إلكترونية', 'سنجعلك علامة تجارية جذابة وتترك أثرا ربما أن مجموعتك المستهدفة لن تنساك أبدا', 10, 'purple'),
(6, ' تطوير ويب', 'سنجعلك علامة تجارية جذابة وتترك أثرا ربما أن مجموعتك المستهدفة لن تنساك أبدا', 11, 'pink'),
(7, ' برامج الحاسوب', 'برامج تعمل بكفاءة تجعلك اكثر شهرة واكثر إنطلاقة', 12, 'blue'),
(8, ' تطبيقات ايفون', 'متعة في الاستخدام وقوة في العمل وسرعة في الانجاز', 11, 'red');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(6) NOT NULL,
  `UName` varchar(12) NOT NULL,
  `UPass` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `UName`, `UPass`) VALUES
(1, 'admain', '1234');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`cust_id`),
  ADD UNIQUE KEY `cust_username` (`cust_username`),
  ADD UNIQUE KEY `E_mail` (`E_mail`);

--
-- Indexes for table `cust_serv`
--
ALTER TABLE `cust_serv`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cust_serv_ibfk_1` (`serv_id`),
  ADD KEY `cust_serv_ibfk_2` (`cust_id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`dept_id`),
  ADD KEY `ssn` (`ssn`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`SSN`),
  ADD UNIQUE KEY `E_mail` (`E_mail`),
  ADD KEY `dept_id` (`dept_id`) USING BTREE;

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`proj_id`),
  ADD UNIQUE KEY `dept_id` (`dept_id`),
  ADD KEY `project_ibfk_2` (`cust_id`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`serv_id`),
  ADD KEY `dept_id` (`dept_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UName` (`UName`),
  ADD UNIQUE KEY `UPass` (`UPass`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `cust_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `cust_serv`
--
ALTER TABLE `cust_serv`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `dept_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `proj_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `serv_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cust_serv`
--
ALTER TABLE `cust_serv`
  ADD CONSTRAINT `cust_serv_ibfk_2` FOREIGN KEY (`cust_id`) REFERENCES `customer` (`cust_id`) ON UPDATE CASCADE;

--
-- Constraints for table `department`
--
ALTER TABLE `department`
  ADD CONSTRAINT `department_ibfk_1` FOREIGN KEY (`ssn`) REFERENCES `employee` (`SSN`) ON UPDATE CASCADE;

--
-- Constraints for table `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `employee_ibfk_1` FOREIGN KEY (`dept_id`) REFERENCES `department` (`dept_id`) ON UPDATE CASCADE;

--
-- Constraints for table `project`
--
ALTER TABLE `project`
  ADD CONSTRAINT `project_ibfk_2` FOREIGN KEY (`cust_id`) REFERENCES `customer` (`cust_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `project_ibfk_3` FOREIGN KEY (`dept_id`) REFERENCES `department` (`dept_id`) ON UPDATE CASCADE;

--
-- Constraints for table `service`
--
ALTER TABLE `service`
  ADD CONSTRAINT `service_ibfk_1` FOREIGN KEY (`dept_id`) REFERENCES `department` (`dept_id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

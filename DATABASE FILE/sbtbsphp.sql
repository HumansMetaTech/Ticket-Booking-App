SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+05:30";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sbtbsphp`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` int(100) NOT NULL,
  `booking_id` varchar(255) NOT NULL,
  `customer_id` varchar(255) NOT NULL,
  `route_id` varchar(255) NOT NULL,
  `customer_route` varchar(200) NOT NULL,
  `booked_amount` int(100) NOT NULL,
  `booked_seat` varchar(100) NOT NULL,
  `admin_name` varchar(30) NOT NULL,
  `booking_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `booking_id`, `customer_id`, `route_id`, `customer_route`, `booked_amount`, `booked_seat`,`admin_name`, `booking_created`) VALUES
(60, 'TBZJ360', 'CUST-2114034', 'RT-1908653', 'MUMBAI &rarr; PUNE', 373, '3', 'patilpranav2003', '2023-06-12 12:15:13'),
(61, 'QK0MT61', 'CUST-2017936', 'RT-3835555', 'NASHIK &rarr; SAMBHAJINAGAR', 500, '15', 'patilpranav2003', '2023-06-12 12:36:10'),
(62, 'A8L5662', 'CUST-5585037', 'RT-9941457', 'KOLHAPUR &rarr; SOLAPUR', 505, '2', 'patilpranav2003', '2023-06-12 12:08:51'),
(63, 'QDNGC63', 'CUST-8996235', 'RT-9069559', 'NAGPUT &rarr; AKOLA', 620, '15', 'patilpranav2003', '2023-06-12 09:31:30'),
(64, 'X34RW64', 'CUST-9474738', 'RT-6028761', 'KOLHAPUR &rarr; PUNE', 583, '6', 'patilpranav2003', '2023-06-12 09:32:21'),
(65, 'JKZVT65', 'CUST-4031139', 'RT-6028761', 'KOLHAPUR &rarr; PUNE', 583, '18', 'patilpranav2003', '2023-06-12 09:33:36'),
(66, 'HIIAN66', 'CUST-9997540', 'RT-6342564', 'SATARA &rarr; KOLHAPUR', 303, '16', 'patilpranav2003', '2023-06-12 09:40:16'),
(67, 'QLOE167', 'CUST-9997540', 'RT-6342564', 'SATARA &rarr; KOLHAPUR', 303, '12', 'patilpranav2003', '2023-06-12 09:41:01');

-- --------------------------------------------------------

--
-- Table structure for table `buses`
--

CREATE TABLE `buses` (
  `id` int(100) NOT NULL,
  `bus_no` varchar(255) NOT NULL,
  `bus_assigned` tinyint(1) NOT NULL DEFAULT '0',
  `bus_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `buses`
--

INSERT INTO `buses` (`id`, `bus_no`, `bus_assigned`, `bus_created`) VALUES
(55, 'MPM1000', 1, '2023-06-14 11:58:22'),
(56, 'MPM1001', 1, '2023-06-14 11:58:24'),
(57, 'NSN9969', 1, '2023-06-14 11:58:26'),
(58, 'NSN9970', 1, '2023-06-14 11:58:28'),
(59, 'KSK4255', 1, '2023-06-14 11:58:30'),
(60, 'KSK4256', 1, '2023-06-14 11:58:32'),
(61, 'NAN7890', 1, '2023-06-14 11:58:34'),
(62, 'NAN7891', 1, '2023-06-14 11:58:36'),
(63, 'KPK0010', 1, '2023-06-14 11:58:38'),
(64, 'KPK0011', 1, '2023-06-14 11:58:40'),
(65, 'KSK8888', 1, '2023-06-14 11:58:42'),
(66, 'KSK8889', 1, '2023-06-14 11:58:44'),
(67, 'SPS7699', 1, '2023-06-14 11:58:46'),
(68, 'SPS7700', 1, '2023-06-14 11:58:48'),
(69, 'SSS3300', 1, '2023-06-14 11:58:50'),
(70, 'SSS3301', 1, '2023-06-14 11:58:52');


-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(100) NOT NULL,
  `customer_id` varchar(255) NOT NULL,
  `customer_name` varchar(30) NOT NULL,
  `customer_phone` varchar(10) NOT NULL,
  `customer_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--


INSERT INTO `customers` (`id`, `customer_id`, `customer_name`, `customer_phone`, `customer_created`) VALUES
(34, 'CUST-2114034', 'Richhariya Shubh', '7002001200', '2023-10-16 22:09:12'),
(35, 'CUST-8996235', 'Divyansh Bhandari', '4012222222', '2023-10-17 22:30:23'),
(36, 'CUST-2017936', 'Vidit Sharma', '7011111111', '2023-10-17 22:30:53'),
(37, 'CUST-5585037', 'Arvind Lohar', '1111111110', '2023-10-17 22:31:20'),
(38, 'CUST-9474738', 'Ayush Bhandari', '7900000000', '2023-10-18 09:32:02'),
(39, 'CUST-4031139', 'Omkar Borate', '1003000010', '2023-10-18 09:33:08'),
(40, 'CUST-9997540', 'Sanket Patil', '7777777700', '2023-10-18 09:39:10');

-- --------------------------------------------------------

--
-- Table structure for table `routes`
--

CREATE TABLE `routes` (
  `id` int(100) NOT NULL,
  `route_id` varchar(255) NOT NULL,
  `bus_no` varchar(155) NOT NULL,
  `route_cities` varchar(255) NOT NULL,
  `route_dep_date` date NOT NULL,
  `route_dep_time` time NOT NULL,
  `route_step_cost` int(100) NOT NULL,
  `route_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `routes`
--

INSERT INTO `routes` (`id`, `route_id`, `bus_no`, `route_cities`, `route_dep_date`, `route_dep_time`, `route_step_cost`, `route_created`) VALUES
(53, 'RT-1908653', 'MPM1000', 'MUMBAI,PUNE', '2023-10-17', '22:05:00', 373, '2023-10-16 22:05:42'),
(54, 'RT-1908654', 'MPM1001', 'PUNE,MUMBAI', '2023-10-17', '22:05:00', 373, '2023-10-16 22:05:42'),
(55, 'RT-3835555', 'NSN9969', 'NASHIK,SAMBHAJINAGAR', '2023-10-19', '23:13:00', 500, '2023-10-16 22:12:32'),
(56, 'RT-3835556', 'NSN9970', 'SAMBHAJINAGAR,NASHIK', '2023-10-19', '23:13:00', 500, '2023-10-16 22:12:32'),
(57, 'RT-9941457', 'KSK4255', 'KOLHAPUR,SOLAPUR', '2023-10-18', '10:00:00', 505, '2023-10-17 22:34:47'),
(58, 'RT-9941458', 'KSK4256', 'SOLAPUR,KOLHAPUR', '2023-10-18', '10:00:00', 505, '2023-10-17 22:34:47'),
(59, 'RT-9069559', 'NAN7890', 'NAGPUR,AKOLA', '2023-10-19', '11:40:00', 620, '2023-10-17 23:39:57'),
(60, 'RT-9069560', 'NAN7891', 'AKOLA,NAGPUR', '2023-10-19', '11:40:00', 620, '2023-10-17 23:39:57'),
(61, 'RT-6028761', 'KPK0010', 'KOLHAPUR,PUNE', '2023-10-19', '13:30:00', 583, '2023-10-17 23:42:12'),
(62, 'RT-6028762', 'KPK0011', 'PUNE,KOLHAPUR', '2023-10-19', '13:30:00', 583, '2023-10-17 23:42:12'),
(63, 'RT-6342563', 'KSK8888', 'KOLHAPUR,SATARA', '2023-10-20', '12:04:00', 303, '2023-10-18 00:04:42'),
(64, 'RT-6342564', 'KSK8889', 'SATARA,KOLHAPUR', '2023-10-20', '12:04:00', 303, '2023-10-18 00:04:42'),
(65, 'RT-4323765', 'SPS7699', 'SATARA,PUNE', '2023-10-20', '13:50:00', 283, '2023-10-18 00:07:50'),
(66, 'RT-4323766', 'SPS7700', 'PUNE,SATARA', '2023-10-20', '13:50:00', 283, '2023-10-18 00:07:50'),
(67, 'RT-5887167', 'SSS3300', 'SANGALI,SATARA', '2023-10-19', '10:30:00', 290, '2023-10-18 09:38:30'),
(68, 'RT-5887168', 'SSS3301', 'SATARA,SANGALI', '2023-10-19', '10:30:00', 290, '2023-10-18 09:38:30');

-- --------------------------------------------------------

--
-- Table structure for table `seats`
--

CREATE TABLE `seats` (
  `bus_no` varchar(155) NOT NULL,
  `seat_booked` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `seats`
--

INSERT INTO `seats` (`bus_no`, `seat_booked`) VALUES
('MPM1000', '3'),
('MPM1001', NULL),
('NSN9969', '15'),
('NSN9970', NULL),
('KSK4255', '2'),
('KSK4256', NULL),
('NAN7890', '15'),
('NAN7891', NULL),
('KPK0010', '6,18'),
('KPK0011', NULL),
('KSK8888', NULL),
('KSK8889', '12,16'),
('SPS7699', NULL),
('SPS7700', NULL),
('SSS3300', NULL),
('SSS3301', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `admin_id` int(11) NOT NULL,
  `admin_fullname` varchar(100) NOT NULL,
  `admin_name` varchar(30) NOT NULL,
  `admin_password` varchar(255) NOT NULL,
  `pp` varchar(255) NOT NULL DEFAULT 'default-pp.png',
  `admin_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`admin_id`, `admin_fullname`, `admin_name`, `admin_password`, `admin_created`) VALUES
(1, 'Pranav Patil', 'patilpranav2003', '$2y$10$7rLSvRVyTQORapkDOqmkhetjF6H9lJHngr4hJMSM2lHObJbW5EQh6', '2023-06-02 13:55:21');

-- --------------------------------------------------------

--
-- Table structure for table `queries`
--

CREATE TABLE `queries` (
  `id` int(100) NOT NULL,
  `query_id` varchar(255) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `mail` varchar(100) NOT NULL,
  `msg` varchar(500) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `msg_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `queries`
--

INSERT INTO `queries` (`id`,`query_id`,`fullname`, `mail`, `subject`, `msg`, `msg_created`) VALUES
(1, 'Q-1749241', 'Pranav Pratap Patil', 'patil.pranav2003@gmail.com', 'Sample Query', "Hey There! This is a sample msg someone left you for you to reply, there mail is provided in there don't forget to check it out and sort the query they have", '2023-06-27 09:41:31');


--
-- Indexes for dumped tables
--
--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `buses`
--
ALTER TABLE `buses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `routes`
--
ALTER TABLE `routes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seats`
--
ALTER TABLE `seats`
  ADD PRIMARY KEY (`bus_no`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`);

-- Indexes for table `queries`
--
ALTER TABLE `queries`
  ADD PRIMARY KEY (`id`);


--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;
--
-- AUTO_INCREMENT for table `buses`
--
ALTER TABLE `buses`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;
--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT for table `routes`
--
ALTER TABLE `routes`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;
--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `queries`
--
ALTER TABLE `queries`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

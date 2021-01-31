-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 31, 2017 at 06:46 AM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tinu_truebus`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `id` int(250) NOT NULL,
  `username` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `profile_picture` varchar(250) NOT NULL,
  `status` varchar(250) NOT NULL,
  `user_type` int(25) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `profile_picture`, `status`, `user_type`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'http://192.168.138.31/sayooj/15-05-2017-true/19-05-2017/truebus/admin/assets/uploads/profile_pic/admin/1495437354_download_(4).jpg', '1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `agent`
--

DROP TABLE IF EXISTS `agent`;
CREATE TABLE `agent` (
  `id` int(250) NOT NULL,
  `username` varchar(250) NOT NULL,
  `first_name` varchar(250) NOT NULL,
  `last_name` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `company_name` varchar(250) NOT NULL,
  `address` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `phone_number` varchar(250) NOT NULL,
  `city` varchar(250) NOT NULL,
  `country` varchar(250) NOT NULL,
  `profile_picture` varchar(250) NOT NULL,
  `status` varchar(250) NOT NULL DEFAULT '1',
  `created_by` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `amenities`
--

DROP TABLE IF EXISTS `amenities`;
CREATE TABLE `amenities` (
  `id` int(250) NOT NULL,
  `amenities` varchar(250) NOT NULL,
  `status` int(250) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `amenities`
--

INSERT INTO `amenities` (`id`, `amenities`, `status`) VALUES
(1, 'WIFI', 1),
(2, 'Water Bottle', 1),
(3, 'Blankets', 1),
(4, 'Snacks', 1),
(5, 'Charging Point', 1),
(6, 'Movie', 1),
(7, 'Reading Light', 1),
(8, 'Pillow', 1),
(9, 'Personal TV', 1),
(10, 'Track My Bus', 1),
(11, 'Emergency exit', 1),
(12, 'Fire Extinguisher', 1),
(13, 'Hammer (to break glass)', 1),
(14, 'Emergency Contact Number', 1);

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

DROP TABLE IF EXISTS `blogs`;
CREATE TABLE `blogs` (
  `id` int(40) NOT NULL,
  `block_name` text NOT NULL,
  `blog_content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `block_name`, `blog_content`) VALUES
(1, 'Routs&Operators&TicketsSold ', '<div class="clm-1">\r\n<div class="container">\r\n<div class="secssion3">\r\n<div class="row">\r\n<div class="col-md-3"><br class="head-ourcities1" />\r\n<h3 class="head-sec3"><img src="#s#/assets/images/quality.png" alt="" /> <span class="tb_operator1">67000 <small class="smalls">ROUTES<br /></small></span></h3>\r\n<div class="tb_list_offer">\r\n<div class="ofer_list">UPTO RS.100 OFF</div>\r\n<div class="ofer_list_bold">TRAVEL SMART</div>\r\n<div class="ofer_list_normal">Code:RBM120</div>\r\n<div class="ofer_list_normal">Book Using Pay Money</div>\r\n</div>\r\n</div>\r\n<div class="col-md-3">\r\n<h3 class="head-sec3"><img src="#s#/assets/images/reliability.png" alt="" /> <span class="tb_operator2">1800<small class="smalls"> BUS OPERATORS</small></span></h3>\r\n<div class="ofer_list">UPTO 70% OFF</div>\r\n<div class="ofer_list_bold">ON HOTELS ACROSS INDIA</div>\r\n<div class="ofer_list_normal">Offer Code:RBRTM120</div>\r\n<div class="ofer_list_normal">&nbsp;</div>\r\n<div class="ofer_list_normal">\r\n<div class="col-md-3">\r\n<h3 class="head-sec3"><img src="#s#/assets/images/quality.png" alt="" /> <span class="tb_operator3">6,00,000 + <small class="smalls">TICKETS SOLD</small></span></h3>\r\n<div class="tb_list_offer">&nbsp;&nbsp; FLAT Rs.100 OFF\r\n<div class="ofer_list_bold left">&nbsp;&nbsp; red Bus APP OFFER</div>\r\n<div class="ofer_list_normal">&nbsp;&nbsp; book via the redBUS APP</div>\r\n<div class="ofer_list_normal">&nbsp;&nbsp; Code:ERHH54</div>\r\n</div>\r\n</div>\r\n</div>\r\n<div class="right-section">&nbsp;</div>\r\n<div class="right-section">\r\n<h4 class="tb_head">Top Bus Routers</h4>\r\n<ul class="clm4-list">\r\n<li>\r\n<p class="headlist-para"><a href="/shibila/true-bus/CI-admin-structure-adminLTE/">Hyderabad to Bangalore</a></p>\r\n</li>\r\n<li><a href="/shibila/true-bus/CI-admin-structure-adminLTE/">Pune to Bangalore </a></li>\r\n<li><a href="/shibila/true-bus/CI-admin-structure-adminLTE/">Hyderabad to Chennai</a></li>\r\n<li><a href="/shibila/true-bus/CI-admin-structure-adminLTE/">Coimbatore to Bangalore </a></li>\r\n<li><a href="/shibila/true-bus/CI-admin-structure-adminLTE/">Chennai to Madurai</a></li>\r\n</ul>\r\n<div class="right-section">\r\n<h4 class="tb_head">Top Cities</h4>\r\n<ul class="clm4-list">\r\n<li>\r\n<p class="headlist-para"><a href="/shibila/true-bus/CI-admin-structure-adminLTE/">Hyderabad to Bangalore</a></p>\r\n</li>\r\n<li><a href="/shibila/true-bus/CI-admin-structure-adminLTE/">Pune to Bangalore </a></li>\r\n<li><a href="/shibila/true-bus/CI-admin-structure-adminLTE/">Hyderabad to Chennai</a></li>\r\n<li><a href="/shibila/true-bus/CI-admin-structure-adminLTE/">Coimbatore to Bangalore </a></li>\r\n<li><a href="/shibila/true-bus/CI-admin-structure-adminLTE/">Chennai to Madurai</a></li>\r\n</ul>\r\n<h4 class="tb_head">Top Bus Operators</h4>\r\n<ul class="clm4-list">\r\n<li>\r\n<p class="headlist-para"><a href="/shibila/true-bus/CI-admin-structure-adminLTE/">Hyderabad to Bangalore</a></p>\r\n</li>\r\n<li><a href="/shibila/true-bus/CI-admin-structure-adminLTE/">Pune to Bangalore </a></li>\r\n<li><a href="/shibila/true-bus/CI-admin-structure-adminLTE/">Hyderabad to Chennai</a></li>\r\n<li><a href="/shibila/true-bus/CI-admin-structure-adminLTE/">Coimbatore to Bangalore </a></li>\r\n<li><a href="/shibila/true-bus/CI-admin-structure-adminLTE/">Chennai to Madurai</a></li>\r\n</ul>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>'),
(2, 'footer ', '<div class="clm-4">\r\n<div class="container">\r\n<div class="secssion6">\r\n<div class="row">\r\n<div class="col-md-9">\r\n<h3 class="head-ourcities2">Follow Us</h3>\r\n<ul class="clm4-list">\r\n<li>\r\n<p class="headlist-para"><a href="/shibila/true-bus/CI-admin-structure-adminLTE/">About TrueBus</a></p>\r\n</li>\r\n<li>FAQ</li>\r\n<li>Careers</li>\r\n<li><a href="/shibila/true-bus/CI-admin-structure-adminLTE/">TrueBus Coupons</a></li>\r\n<li><a href="/shibila/true-bus/CI-admin-structure-adminLTE/">Contact Us </a></li>\r\n<li><a href="/shibila/true-bus/CI-admin-structure-adminLTE/">Terms of Use</a></li>\r\n<li><a href="/shibila/true-bus/CI-admin-structure-adminLTE/">Privacy Policy &nbsp;</a></li>\r\n<li><a href="/shibila/true-bus/CI-admin-structure-adminLTE/">TrueBus on Mobilenew</a></li>\r\n</ul>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>'),
(3, 'Banner Image', '<p>assets/images/images/banner-inner.png</p>');

-- --------------------------------------------------------

--
-- Table structure for table `board_points`
--

DROP TABLE IF EXISTS `board_points`;
CREATE TABLE `board_points` (
  `id` int(11) NOT NULL,
  `bus_id` int(11) NOT NULL,
  `board_point` int(11) NOT NULL,
  `pickup_point` varchar(20) NOT NULL,
  `pickup_time` varchar(20) NOT NULL,
  `landmark` varchar(250) NOT NULL,
  `address` varchar(250) NOT NULL,
  `status` int(200) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `booking_details`
--

DROP TABLE IF EXISTS `booking_details`;
CREATE TABLE `booking_details` (
  `id` int(11) NOT NULL,
  `booking_id` varchar(250) NOT NULL,
  `amount` varchar(250) NOT NULL,
  `bus_id` varchar(250) NOT NULL,
  `rout_id` varchar(250) NOT NULL,
  `boarding_point_id` varchar(250) NOT NULL,
  `user_id` varchar(250) NOT NULL,
  `seat_no` varchar(250) NOT NULL,
  `payment_status` varchar(250) NOT NULL,
  `payment_option` varchar(251) NOT NULL,
  `promo_code` varchar(255) DEFAULT NULL,
  `booking_date` varchar(250) NOT NULL,
  `status` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `book_bus`
--

DROP TABLE IF EXISTS `book_bus`;
CREATE TABLE `book_bus` (
  `id` int(11) NOT NULL,
  `bus_id` int(11) NOT NULL,
  `user_id` varchar(20) NOT NULL,
  `book_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `amount` decimal(10,2) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `bus`
--

DROP TABLE IF EXISTS `bus`;
CREATE TABLE `bus` (
  `id` int(11) NOT NULL,
  `bus_name` varchar(20) NOT NULL,
  `bus_type_id` int(11) NOT NULL,
  `amenities_id` varchar(250) NOT NULL,
  `bus_reg_no` varchar(20) NOT NULL,
  `max_seats` int(11) NOT NULL,
  `board_point` varchar(250) NOT NULL,
  `board_time` varchar(20) NOT NULL,
  `drop_point` varchar(20) NOT NULL,
  `drop_time` varchar(20) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `bus_status` int(200) NOT NULL DEFAULT '1',
  `created_by` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `bus_gallery`
--

DROP TABLE IF EXISTS `bus_gallery`;
CREATE TABLE `bus_gallery` (
  `id` int(11) NOT NULL,
  `image` varchar(750) NOT NULL,
  `user_id` int(250) NOT NULL,
  `bus_id` int(250) NOT NULL,
  `created_by` int(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `bus_type`
--

DROP TABLE IF EXISTS `bus_type`;
CREATE TABLE `bus_type` (
  `id` int(11) NOT NULL,
  `bus_type` varchar(20) NOT NULL,
  `status` varchar(250) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bus_type`
--

INSERT INTO `bus_type` (`id`, `bus_type`, `status`) VALUES
(1, 'AC', '1'),
(2, 'Non AC', '1'),
(3, 'sleeper', '1');

-- --------------------------------------------------------

--
-- Table structure for table `cancellation`
--

DROP TABLE IF EXISTS `cancellation`;
CREATE TABLE `cancellation` (
  `id` int(11) NOT NULL,
  `bus_id` varchar(11) NOT NULL,
  `advertisement_status` int(250) NOT NULL,
  `cancel_time` varchar(250) NOT NULL,
  `percentage` varchar(11) NOT NULL,
  `flat` varchar(250) NOT NULL,
  `type` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `customer_details`
--

DROP TABLE IF EXISTS `customer_details`;
CREATE TABLE `customer_details` (
  `id` int(11) NOT NULL,
  `customer_name` varchar(250) NOT NULL,
  `age` varchar(250) NOT NULL,
  `mobile` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `gender` varchar(250) NOT NULL,
  `booking_id` varchar(250) NOT NULL,
  `order_id` varchar(250) NOT NULL,
  `seat_no` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `drop_points`
--

DROP TABLE IF EXISTS `drop_points`;
CREATE TABLE `drop_points` (
  `id` int(11) NOT NULL,
  `bus_id` varchar(250) NOT NULL,
  `drop_point` varchar(250) NOT NULL,
  `stoping_point` varchar(250) NOT NULL,
  `drop_time` varchar(250) NOT NULL,
  `landmark` varchar(250) NOT NULL,
  `address` varchar(250) NOT NULL,
  `status` int(200) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `promo_details`
--

DROP TABLE IF EXISTS `promo_details`;
CREATE TABLE `promo_details` (
  `id` int(100) NOT NULL,
  `code` varchar(100) NOT NULL,
  `type` varchar(100) DEFAULT NULL,
  `amount` int(100) DEFAULT NULL,
  `expire_date` date NOT NULL,
  `status` int(100) NOT NULL DEFAULT '0',
  `created_by` int(10) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

DROP TABLE IF EXISTS `rating`;
CREATE TABLE `rating` (
  `id` int(11) NOT NULL,
  `user_id` varchar(250) NOT NULL,
  `bus_id` varchar(250) NOT NULL,
  `bus_quality` varchar(250) NOT NULL,
  `punctuality` varchar(250) NOT NULL,
  `Staff_behaviour` varchar(250) NOT NULL,
  `average` varchar(250) NOT NULL,
  `comments` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `route`
--

DROP TABLE IF EXISTS `route`;
CREATE TABLE `route` (
  `id` int(11) NOT NULL,
  `bus_id` int(11) NOT NULL,
  `board_point` varchar(20) NOT NULL,
  `board_time` varchar(20) NOT NULL,
  `drop_point` varchar(20) NOT NULL,
  `drop_time` varchar(20) NOT NULL,
  `fare` int(11) NOT NULL,
  `status` int(200) NOT NULL DEFAULT '1',
  `created_by` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `seat_layout`
--

DROP TABLE IF EXISTS `seat_layout`;
CREATE TABLE `seat_layout` (
  `id` int(11) NOT NULL,
  `bus_id` varchar(250) NOT NULL,
  `bus_type` varchar(250) NOT NULL,
  `totel_seat` varchar(250) NOT NULL,
  `layout` longtext NOT NULL,
  `layout_type` varchar(250) NOT NULL,
  `last_seat` varchar(250) NOT NULL,
  `no_sleeper` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

DROP TABLE IF EXISTS `setting`;
CREATE TABLE `setting` (
  `id` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  `logo` varchar(250) NOT NULL,
  `favicon` varchar(250) NOT NULL,
  `smtp_username` varchar(250) NOT NULL,
  `smtp_host` varchar(250) NOT NULL,
  `smtp_password` varchar(250) NOT NULL,
  `sender_id` varchar(250) NOT NULL,
  `sms_username` varchar(250) NOT NULL,
  `sms_password` varchar(250) NOT NULL,
  `payment_option` varchar(255) DEFAULT NULL,
  `paypal` varchar(250) NOT NULL,
  `paypalid` varchar(251) NOT NULL,
  `app_key` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`id`, `title`, `logo`, `favicon`, `smtp_username`, `smtp_host`, `smtp_password`, `sender_id`, `sms_username`, `sms_password`, `payment_option`, `paypal`, `paypalid`, `app_key`) VALUES
(1, 'True Bus', 'assets/uploads/logo/1495099426_bed.png', 'assets/uploads/favicons/1495099426_bus1.jpg', 'no-reply@techlabz.in', 'smtp.techlabz.in', 'baAEanx7', '101', 'manu', '676', 'PayPal,Cash', 'https://www.sandbox.paypal.com/cgi-bin/webscr', 'shajeermhmmd@gmail.com', 'my_key');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `user_id` varchar(20) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(250) NOT NULL,
  `name` varchar(20) NOT NULL,
  `dob` varchar(20) NOT NULL,
  `image` varchar(80) NOT NULL,
  `gender` varchar(16) NOT NULL,
  `mob` bigint(20) NOT NULL,
  `reset_key` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `agent`
--
ALTER TABLE `agent`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `amenities`
--
ALTER TABLE `amenities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `board_points`
--
ALTER TABLE `board_points`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `booking_details`
--
ALTER TABLE `booking_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `book_bus`
--
ALTER TABLE `book_bus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bus`
--
ALTER TABLE `bus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bus_gallery`
--
ALTER TABLE `bus_gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bus_type`
--
ALTER TABLE `bus_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cancellation`
--
ALTER TABLE `cancellation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_details`
--
ALTER TABLE `customer_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `drop_points`
--
ALTER TABLE `drop_points`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `promo_details`
--
ALTER TABLE `promo_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `route`
--
ALTER TABLE `route`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seat_layout`
--
ALTER TABLE `seat_layout`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `agent`
--
ALTER TABLE `agent`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `amenities`
--
ALTER TABLE `amenities`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `board_points`
--
ALTER TABLE `board_points`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `booking_details`
--
ALTER TABLE `booking_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `book_bus`
--
ALTER TABLE `book_bus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `bus`
--
ALTER TABLE `bus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `bus_gallery`
--
ALTER TABLE `bus_gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `bus_type`
--
ALTER TABLE `bus_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `cancellation`
--
ALTER TABLE `cancellation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `customer_details`
--
ALTER TABLE `customer_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `drop_points`
--
ALTER TABLE `drop_points`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `promo_details`
--
ALTER TABLE `promo_details`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `rating`
--
ALTER TABLE `rating`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `route`
--
ALTER TABLE `route`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `seat_layout`
--
ALTER TABLE `seat_layout`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `setting`
--
ALTER TABLE `setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

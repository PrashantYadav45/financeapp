-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 05, 2017 at 04:13 AM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `financeapp2`
--

-- --------------------------------------------------------

--
-- Table structure for table `ads_mgmt`
--

CREATE TABLE IF NOT EXISTS `ads_mgmt` (
`id` int(11) NOT NULL,
  `ads_image` varchar(255) NOT NULL,
  `ads_url` varchar(255) NOT NULL,
  `ads_startdate` date NOT NULL,
  `ads_enddate` date NOT NULL,
  `status` int(11) NOT NULL COMMENT '1=active, 2=inactive',
  `created_date` datetime NOT NULL,
  `modify_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `expense_amount`
--

CREATE TABLE IF NOT EXISTS `expense_amount` (
`id` bigint(20) NOT NULL,
  `user_id` int(11) NOT NULL,
  `expense_category_id` int(11) NOT NULL,
  `payment_detail` varchar(255) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `note` varchar(255) NOT NULL,
  `bill_image` varchar(255) NOT NULL,
  `repeat` int(11) NOT NULL COMMENT '0=no, 1=yes',
  `created_date` datetime NOT NULL,
  `modify_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `expense_category`
--

CREATE TABLE IF NOT EXISTS `expense_category` (
`id` int(11) NOT NULL,
  `parent_category_id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `category_slug` varchar(255) NOT NULL,
  `category_icon` varchar(255) NOT NULL,
  `category_type` int(11) NOT NULL COMMENT '1=budget, 2=expense',
  `applied_for` varchar(255) NOT NULL COMMENT '1 for individual, 2 for family and 3 for group',
  `status` int(11) NOT NULL COMMENT '1=active, 0=inactive',
  `created_date` datetime NOT NULL,
  `modify_date` datetime NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `expense_category`
--

INSERT INTO `expense_category` (`id`, `parent_category_id`, `category_name`, `category_slug`, `category_icon`, `category_type`, `applied_for`, `status`, `created_date`, `modify_date`) VALUES
(2, 0, 'Expense', 'expense', '_e', 1, '1', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE IF NOT EXISTS `feedback` (
`id` bigint(20) NOT NULL,
  `user_id` int(11) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `comment` text NOT NULL,
  `status` int(11) NOT NULL COMMENT '1=active, 2=inactive',
  `created_date` datetime NOT NULL,
  `modify_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `group`
--

CREATE TABLE IF NOT EXISTS `group` (
`id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `group_name` varchar(255) NOT NULL,
  `group_slug` varchar(255) NOT NULL,
  `group_icon` varchar(255) NOT NULL,
  `group_type` int(11) NOT NULL COMMENT '1=family, 2=company',
  `status` int(11) NOT NULL COMMENT '1=active, 2=inactive',
  `created_date` datetime NOT NULL,
  `modify_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `group_member`
--

CREATE TABLE IF NOT EXISTS `group_member` (
`id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `status` int(11) NOT NULL COMMENT '1=active, 2=inactive',
  `created_date` datetime NOT NULL,
  `modify_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `income_amount`
--

CREATE TABLE IF NOT EXISTS `income_amount` (
`id` bigint(20) NOT NULL,
  `user_id` int(11) NOT NULL,
  `income_category_id` int(11) NOT NULL,
  `payment_detail` varchar(255) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `note` varchar(255) NOT NULL,
  `bill_image` varchar(255) NOT NULL,
  `repeat` int(11) NOT NULL COMMENT '0=no, 1=yes',
  `created_date` datetime NOT NULL,
  `modify_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `income_category`
--

CREATE TABLE IF NOT EXISTS `income_category` (
`id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `category_slug` varchar(255) NOT NULL,
  `category_icon` varchar(255) NOT NULL,
  `category_type` int(11) NOT NULL,
  `status` int(11) NOT NULL COMMENT '1=active, 2=inactive',
  `created_date` datetime NOT NULL,
  `modify_date` datetime NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `income_category`
--

INSERT INTO `income_category` (`id`, `category_name`, `category_slug`, `category_icon`, `category_type`, `status`, `created_date`, `modify_date`) VALUES
(1, 'Income', 'income', '_i', 2, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `notice`
--

CREATE TABLE IF NOT EXISTS `notice` (
`id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `status` int(11) NOT NULL COMMENT '1=active, 2=inactive',
  `created_date` datetime NOT NULL,
  `modify_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `notice_comment`
--

CREATE TABLE IF NOT EXISTS `notice_comment` (
`id` bigint(20) NOT NULL,
  `user_id` int(11) NOT NULL,
  `notice_id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `status` int(11) NOT NULL COMMENT '1=active, 2=inactive',
  `created_date` datetime NOT NULL,
  `modify_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE IF NOT EXISTS `pages` (
`id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `status` int(11) NOT NULL,
  `created_date` datetime NOT NULL COMMENT '1=active, 2=inactive',
  `modify_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `target_amount`
--

CREATE TABLE IF NOT EXISTS `target_amount` (
`id` bigint(20) NOT NULL,
  `user_id` int(11) NOT NULL,
  `target_amount` decimal(10,2) NOT NULL,
  `average_monthly_income` decimal(10,2) NOT NULL,
  `no_family` int(11) NOT NULL,
  `no_children` int(11) NOT NULL,
  `no_earning_member` int(11) NOT NULL,
  `housing_type` varchar(255) NOT NULL,
  `maintenance` varchar(255) NOT NULL,
  `investment_habit` varchar(255) NOT NULL,
  `status` int(11) NOT NULL COMMENT '1=active, 2=inactive',
  `created_date` datetime NOT NULL,
  `modify_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
`id` bigint(20) NOT NULL,
  `registration_id` varchar(100) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(225) NOT NULL,
  `forget_key` varchar(255) NOT NULL,
  `facebook_id` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `mobile_no` varchar(100) NOT NULL,
  `alternate_no` varchar(100) NOT NULL,
  `otp_code` varchar(12) NOT NULL,
  `device_id` varchar(255) NOT NULL,
  `nick_name` varchar(255) NOT NULL,
  `occupation` varchar(255) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `age` int(11) NOT NULL,
  `status` int(11) NOT NULL COMMENT '1=active, 2=inactive',
  `token` int(11) NOT NULL,
  `role` varchar(250) NOT NULL,
  `register_by` int(11) NOT NULL COMMENT '1=normal, 2=facebook',
  `opening_balance` varchar(50) NOT NULL,
  `created_date` datetime NOT NULL,
  `last_update_date` datetime NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `registration_id`, `username`, `password`, `email`, `forget_key`, `facebook_id`, `image`, `mobile_no`, `alternate_no`, `otp_code`, `device_id`, `nick_name`, `occupation`, `gender`, `age`, `status`, `token`, `role`, `register_by`, `opening_balance`, `created_date`, `last_update_date`) VALUES
(8, '1', 'admin', 'e6e061838856bf47e1de730719fb2609', 'admin@gmail.com', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', 1, 1, 1, '1', 1, '1', '2017-06-07 00:00:00', '2017-06-23 00:00:00'),
(9, '', 'mohit@gmail.com', 'd8052f9e09a17e6907629e76bbd261cc', '', '', '', '', '123654789', '', '', '', '', '', '', 1, 1, 0, '2', 1, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, '', 'mohit12@gmail.com', 'cf3b27ef58e8421ad18556857077d39f', '', '', '', '', '', '', '456523', 'agdjgajdgjagjsgdjgajgd', '', '', '', 0, 1, 0, '', 1, '', '2017-06-02 03:27:32', '2017-06-02 03:27:32'),
(11, '', 'mohit123@gmail.com', 'cf3b27ef58e8421ad18556857077d39f', '', '', '', '', '', '', '456523', 'agdjgajdgjagjsgdjgajgd', '', '', '', 0, 1, 0, '2', 1, '', '2017-06-02 03:28:22', '2017-06-02 03:28:22');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ads_mgmt`
--
ALTER TABLE `ads_mgmt`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expense_amount`
--
ALTER TABLE `expense_amount`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expense_category`
--
ALTER TABLE `expense_category`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `group`
--
ALTER TABLE `group`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `group_member`
--
ALTER TABLE `group_member`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `income_amount`
--
ALTER TABLE `income_amount`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `income_category`
--
ALTER TABLE `income_category`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notice`
--
ALTER TABLE `notice`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notice_comment`
--
ALTER TABLE `notice_comment`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `target_amount`
--
ALTER TABLE `target_amount`
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
-- AUTO_INCREMENT for table `ads_mgmt`
--
ALTER TABLE `ads_mgmt`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `expense_amount`
--
ALTER TABLE `expense_amount`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `expense_category`
--
ALTER TABLE `expense_category`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `group`
--
ALTER TABLE `group`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `group_member`
--
ALTER TABLE `group_member`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `income_amount`
--
ALTER TABLE `income_amount`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `income_category`
--
ALTER TABLE `income_category`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `notice`
--
ALTER TABLE `notice`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `notice_comment`
--
ALTER TABLE `notice_comment`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `target_amount`
--
ALTER TABLE `target_amount`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

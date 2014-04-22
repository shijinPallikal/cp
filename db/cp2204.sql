-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 22, 2014 at 09:03 PM
-- Server version: 5.5.35
-- PHP Version: 5.4.27-1+deb.sury.org~precise+1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cp`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `categoryStatusOff`(IN cid INT)
begin
update tbl_category set status='0' where id= cid;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `categoryStatusOn`(IN cid INT)
begin
update tbl_category set status='1' where id= cid;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `editCategory`(IN cat_id INT)
begin
select * from tbl_category where id= cat_id;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `editProduct`(IN pid INT)
begin 
select * from tbl_product where id= pid;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `editPurchase`(IN eid INT)
begin
select tbl_purchase.*,tbl_row_material.item from tbl_purchase inner join tbl_row_material on tbl_purchase.item=tbl_row_material.id where tbl_purchase.id= eid;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `editRowmaterialData`(IN rid INT)
begin
select * from tbl_row_material where id= rid;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `editUom`(IN u_id INT)
begin
select * from tbl_uom where id= u_id;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `employeeStatusOff`(IN eid INT)
begin
update tbl_employee set status='0' where id=rid;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `employeeStatusOn`(IN eid INT)
begin
update tbl_employee set status='1' where id=rid;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `fetchAllCategoryStatusOn`()
begin
select * from tbl_category where status=1 order by id desc;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `fetchAllRowmaterial`()
begin
select * from tbl_row_material order by id desc;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `fetchAllUom`()
begin
select * from tbl_uom order by id desc;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `fetchAllUomStatusOn`()
begin
select * from tbl_uom where status=1 order by id desc;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `productStatusOff`(IN pid INT)
begin
update tbl_product set status='0' where id= pid;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `productStatusOn`(IN pid INT)
begin
update tbl_product set status='1' where id= pid;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `rowmaterialStatusOff`(IN rid INT)
begin
update tbl_row_material set status='0' where id= rid;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `rowmaterialStatusOn`(IN rid INT)
begin
update tbl_row_material set status=1 where id=rid;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_tbl_families_get`(
   IN TYPE VARCHAR(250),
   IN var_family_id INT,
   IN var_family_code VARCHAR(300)
)
BEGIN
   CASE
       WHEN (TYPE = "SP_GET_ALL_FAMILIES") THEN                
           SELECT * FROM  tbl_families;
       WHEN (TYPE = "SP_GET_FAMILY_DETAILS") THEN                
           SELECT * FROM  tbl_families WHERE id = var_family_id;
       WHEN (TYPE = "SP_GET_CODEWISE_FAMILY_DETAILS") THEN                
           SELECT * FROM  tbl_families WHERE family_code = var_family_code;
   END CASE;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `test`()
begin
select * from tbl_uom;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `uomStatusOff`(IN uid INT)
begin
update tbl_uom set status='0' where id= uid;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `uomStatusOn`(IN uid INT)
begin
update tbl_uom set status='1' where id= uid;
end$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL DEFAULT '0',
  `ip_address` varchar(100) NOT NULL,
  `last_login` varchar(100) NOT NULL,
  `created_on` varchar(100) NOT NULL,
  `updated_on` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `username`, `password`, `status`, `ip_address`, `last_login`, `created_on`, `updated_on`) VALUES
(1, 'coool', '202cb962ac59075b964b07152d234b70', '1', '127.0.0.1', '2014-04-22 18:46:07', '', ''),
(2, 'agent', 'b33aed8f3134996703dc39f9a7c95783', '2', '122.174.192.32', '2014-03-07 10:19:45', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE IF NOT EXISTS `tbl_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(100) NOT NULL,
  `category` varchar(100) NOT NULL,
  `created_on` varchar(100) NOT NULL,
  `updated_on` varchar(100) NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`id`, `code`, `category`, `created_on`, `updated_on`, `created_by`, `updated_by`, `status`) VALUES
(13, 'Ari', 'Ari', '2014-04-19 10:10:26', '2014-04-19 10:10:26', 1, 0, 1),
(14, 'payar', 'payarvargam', '2014-04-19 10:10:53', '2014-04-19 10:10:53', 1, 0, 1),
(15, 'vegi', 'vegitables', '2014-04-19 10:11:19', '2014-04-19 10:11:19', 1, 0, 1),
(16, 'neyyu', 'neyyu', '2014-04-19 16:08:43', '2014-04-19 16:16:45', 1, 0, 1),
(17, 'oil', 'oil', '2014-04-19 16:09:36', '2014-04-19 16:09:36', 1, 0, 1),
(18, 'tastebuds', 'tastebuds', '2014-04-19 16:10:14', '2014-04-19 16:10:14', 1, 0, 1),
(19, 'power', 'power', '2014-04-19 16:17:30', '2014-04-19 16:17:30', 1, 0, 1),
(20, 'anadhi', 'anadhi', '2014-04-19 16:17:40', '2014-04-19 16:17:40', 1, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_employee`
--

CREATE TABLE IF NOT EXISTS `tbl_employee` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `designation` varchar(100) DEFAULT NULL,
  `salary` varchar(100) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_on` varchar(100) DEFAULT NULL,
  `updated_on` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbl_employee`
--

INSERT INTO `tbl_employee` (`id`, `name`, `designation`, `salary`, `status`, `created_by`, `updated_by`, `created_on`, `updated_on`) VALUES
(1, 'shijin', 'watcher', '50000', 0, 1, NULL, '2014-04-08 19:43:18', '2014-04-08 20:19:11'),
(2, 'Shijin', 'Owner', '1000000', 1, 1, NULL, '2014-04-08 19:46:49', '2014-04-08 20:18:57');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_leave`
--

CREATE TABLE IF NOT EXISTS `tbl_leave` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `emp_id` int(11) DEFAULT NULL,
  `leave_type` int(11) DEFAULT NULL,
  `leave_date` date DEFAULT NULL,
  `leave_description` text,
  `created_on` varchar(100) NOT NULL,
  `updated_on` varchar(100) NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE IF NOT EXISTS `tbl_product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(100) NOT NULL,
  `product` varchar(100) NOT NULL,
  `created_on` varchar(100) NOT NULL,
  `updated_on` varchar(100) NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`id`, `code`, `product`, `created_on`, `updated_on`, `created_by`, `updated_by`, `status`) VALUES
(3, 'uzhuvada', 'uzhunnu vada', '2014-04-19 10:19:18', '2014-04-19 10:19:18', 1, 0, 1),
(4, 'Fried Rice', 'Fried Rice', '2014-04-19 16:06:59', '2014-04-19 16:06:59', 1, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product_row_material`
--

CREATE TABLE IF NOT EXISTS `tbl_product_row_material` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product` int(11) DEFAULT NULL,
  `row_material` int(11) DEFAULT NULL,
  `uom` int(11) DEFAULT NULL,
  `quantity` varchar(100) DEFAULT NULL,
  `rate` varchar(100) DEFAULT NULL,
  `created_on` varchar(100) NOT NULL,
  `updated_on` varchar(100) NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_purchase`
--

CREATE TABLE IF NOT EXISTS `tbl_purchase` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item` int(11) NOT NULL,
  `quantity` varchar(100) NOT NULL,
  `purchase_rate` varchar(100) DEFAULT NULL,
  `purchase_date` date DEFAULT NULL,
  `exp_date` date DEFAULT NULL,
  `meashure` int(11) DEFAULT NULL,
  `unit_rate` varchar(100) DEFAULT NULL,
  `created_on` varchar(100) NOT NULL,
  `updated_on` varchar(100) NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=71 ;

--
-- Dumping data for table `tbl_purchase`
--

INSERT INTO `tbl_purchase` (`id`, `item`, `quantity`, `purchase_rate`, `purchase_date`, `exp_date`, `meashure`, `unit_rate`, `created_on`, `updated_on`, `created_by`, `updated_by`, `status`) VALUES
(69, 7, '25', '500', '2014-04-21', '2015-04-21', 11, '20', '2014-04-19 13:33:48', '2014-04-19 13:33:48', 1, 0, 1),
(70, 8, '50', '3000', '2014-04-20', '2015-01-01', 11, '60', '2014-04-19 13:51:29', '2014-04-19 13:51:29', 1, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_purchase_stock`
--

CREATE TABLE IF NOT EXISTS `tbl_purchase_stock` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item_id` int(11) DEFAULT NULL,
  `purchase_date` date DEFAULT NULL,
  `purchase_rate` varchar(100) DEFAULT NULL,
  `unit_rate` varchar(100) DEFAULT NULL,
  `purchase_stock` varchar(100) DEFAULT NULL,
  `cumilative_stock` varchar(100) DEFAULT NULL,
  `sale` varchar(100) DEFAULT NULL,
  `sustain_stock` varchar(100) NOT NULL,
  `expiry_date` date DEFAULT NULL,
  `created_on` varchar(100) NOT NULL,
  `updated_on` varchar(100) NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `tbl_purchase_stock`
--

INSERT INTO `tbl_purchase_stock` (`id`, `item_id`, `purchase_date`, `purchase_rate`, `unit_rate`, `purchase_stock`, `cumilative_stock`, `sale`, `sustain_stock`, `expiry_date`, `created_on`, `updated_on`, `created_by`, `updated_by`, `status`) VALUES
(18, 8, '2015-04-20', '4000', '80', '50', '50', NULL, '', '2015-01-01', '2014-04-19 11:12:14', '2014-04-19 11:12:14', 1, 0, 1),
(19, 8, '2015-04-20', '4000', '80', '50', '100', NULL, '', '2015-01-01', '2014-04-19 11:12:45', '2014-04-19 11:12:45', 1, 0, 1),
(21, 7, '2014-01-01', '54', '0.54', '100', '280', NULL, '', '2015-11-20', '2014-04-19 13:20:50', '2014-04-19 13:20:50', 1, 0, 1),
(22, 7, '2014-01-01', '54', '0.54', '100', '380', NULL, '', '2015-11-20', '2014-04-19 13:23:02', '2014-04-19 13:23:02', 1, 0, 1),
(24, 8, '2014-04-20', '3000', '60', '50', '150', NULL, '', '2015-01-01', '2014-04-19 13:51:30', '2014-04-19 13:51:30', 1, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_row_material`
--

CREATE TABLE IF NOT EXISTS `tbl_row_material` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item_code` varchar(100) NOT NULL,
  `category_id` varchar(100) NOT NULL,
  `item` varchar(100) NOT NULL,
  `uom` int(11) NOT NULL,
  `created_on` varchar(100) NOT NULL,
  `updated_on` varchar(100) NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `tbl_row_material`
--

INSERT INTO `tbl_row_material` (`id`, `item_code`, `category_id`, `item`, `uom`, `created_on`, `updated_on`, `created_by`, `updated_by`, `status`) VALUES
(7, 'Ponni', '14', 'ponni Ari', 11, '2014-04-19 10:17:43', '2014-04-19 10:17:43', 1, 0, 1),
(8, 'uzhunnu', '14', 'uzhunnu', 11, '2014-04-19 10:18:38', '2014-04-19 10:18:38', 1, 0, 1),
(9, 'Basumathi Rice', '13', 'Basumathi Rice', 11, '2014-04-19 16:07:44', '2014-04-19 16:07:44', 1, 0, 1),
(10, 'pp', '19', 'PepperPower', 11, '2014-04-19 16:18:20', '2014-04-19 16:18:20', 1, 0, 1),
(11, 'neyyu', '16', 'neyyu', 11, '2014-04-19 16:19:00', '2014-04-19 16:19:00', 1, 0, 1),
(12, 'oil', '17', 'Sunflower oil', 11, '2014-04-19 16:19:24', '2014-04-19 16:19:24', 1, 0, 1),
(13, 'cashunuts', '18', 'cashunuts', 11, '2014-04-19 16:19:43', '2014-04-19 16:19:43', 1, 0, 1),
(14, 'kissmiss', '18', 'kissmiss', 11, '2014-04-19 16:20:12', '2014-04-19 16:20:12', 1, 0, 1),
(15, 'grambu', '18', 'grambu', 11, '2014-04-19 16:20:33', '2014-04-19 16:20:33', 1, 0, 1),
(16, 'patta', '18', 'patta', 11, '2014-04-19 16:20:52', '2014-04-19 16:20:52', 1, 0, 1),
(17, 'alem', '18', 'alem', 11, '2014-04-19 16:21:04', '2014-04-19 16:21:04', 1, 0, 1),
(18, 'thakkolam', '18', 'thakkolam', 11, '2014-04-19 16:21:19', '2014-04-19 16:21:19', 1, 0, 1),
(19, 'salt', '20', 'salt', 11, '2014-04-19 16:21:29', '2014-04-19 16:21:29', 1, 0, 1),
(20, 'beans', '15', 'beans', 11, '2014-04-19 16:21:55', '2014-04-19 16:21:55', 1, 0, 1),
(21, 'carrot', '15', 'carrot', 11, '2014-04-19 16:22:14', '2014-04-19 16:22:14', 1, 0, 1),
(22, 'capsicum', '15', 'capsicum', 11, '2014-04-19 16:22:28', '2014-04-19 16:22:28', 1, 0, 1),
(23, 'savola', '15', 'savola', 11, '2014-04-19 16:23:06', '2014-04-19 16:23:06', 1, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_uom`
--

CREATE TABLE IF NOT EXISTS `tbl_uom` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(100) NOT NULL,
  `uom` varchar(100) NOT NULL,
  `created_on` varchar(100) NOT NULL,
  `updated_on` varchar(100) NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `tbl_uom`
--

INSERT INTO `tbl_uom` (`id`, `code`, `uom`, `created_on`, `updated_on`, `created_by`, `updated_by`, `status`) VALUES
(11, 'Kg', 'Kilogram', '2014-03-27 12:26:40', '2014-03-27 12:26:40', 1, 0, 1),
(12, 'Li', 'Liter', '2014-03-27 12:26:49', '2014-03-27 12:26:49', 1, 0, 1),
(13, 'unit', 'uni', '2014-03-28 18:07:30', '2014-03-28 18:08:47', 1, 0, 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

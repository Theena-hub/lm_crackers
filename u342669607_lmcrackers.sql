-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 05, 2024 at 08:44 AM
-- Server version: 10.11.7-MariaDB-cll-lve
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u342669607_lmcrackers`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_banner`
--

CREATE TABLE `tbl_banner` (
  `id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_on` timestamp NULL DEFAULT current_timestamp(),
  `status` int(2) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_banner`
--

INSERT INTO `tbl_banner` (`id`, `image`, `created_on`, `status`) VALUES
(1, 'EZxVbEWVAAAsSp6.jpg', '2024-01-31 07:16:21', 0),
(2, 'multiethnic-group-young-cheerful-students-walking.jpg', '2024-01-31 07:19:24', 0),
(3, 'certificate_65a959723537a_1.png', '2024-01-31 07:22:43', 0),
(4, 'certificate_65a959723537a_1.png', '2024-01-31 07:23:55', 0),
(5, 'overview_65a959723a075.png', '2024-02-16 07:15:31', 0),
(6, 'images.jpeg', '2024-02-16 07:15:33', 0),
(7, 'certificate 65a959723537a1.png', '2024-02-16 07:48:44', 0),
(8, 'certificate_65a959723902a_2.png', '2024-02-16 07:50:09', 0),
(9, 'Image_created_with_a_mobile_phone.png', '2024-02-16 07:51:07', 0),
(10, 'heroback.jpeg', '2024-02-16 07:55:29', 0),
(11, 'banner_01.jpg', '2024-02-24 12:37:53', 1),
(12, 'banner_02.jpg', '2024-02-24 12:38:05', 1),
(13, 'banner_03.jpg', '2024-02-24 12:38:15', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_billing`
--

CREATE TABLE `tbl_billing` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `bid` varchar(255) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `whatsapp` varchar(15) NOT NULL,
  `id_proof` varchar(25) NOT NULL,
  `date` varchar(10) NOT NULL,
  `address` text NOT NULL,
  `payment` varchar(255) NOT NULL,
  `product_list` text NOT NULL,
  `amount` int(10) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_billing`
--

INSERT INTO `tbl_billing` (`id`, `name`, `bid`, `mobile`, `whatsapp`, `id_proof`, `date`, `address`, `payment`, `product_list`, `amount`, `created_on`, `status`) VALUES
(1, 'Jagadeesh', 'LM2024BILL1', '', '', '', '', '84`POOSARI THOTTAM,BOMMANALLUR', '', '[{\"p_id\":\"83\",\"p_name\":\"new Bomb\",\"p_mrp\":\"145\",\"p_qty\":\"18\",\"p_dis\":\"78\",\"p_disprice\":\"31.90\",\"p_total\":\"574.20\"}]', 574, '2024-02-21 13:30:15', 0),
(2, 'Jagadeesh', 'LM2024BILL2', '9316543213', '9876543210', '32468987fgfdg', '2024-02-22', '84,POOSARI THOTTAM,BOMMANALLUR', 'Cheque', '[{\"p_id\":\"85\",\"p_name\":\"T23\",\"p_mrp\":\"250\",\"p_qty\":\"19\",\"p_dis\":\"76\",\"p_disprice\":\"60.00\",\"p_total\":\"1140.00\"},{\"p_id\":\"83\",\"p_name\":\"new Bomb\",\"p_mrp\":\"145\",\"p_qty\":\"14\",\"p_dis\":\"80\",\"p_disprice\":\"29.00\",\"p_total\":\"406.00\"},{\"p_id\":\"82\",\"p_name\":\"Treat1\",\"p_mrp\":\"250\",\"p_qty\":\"9\",\"p_dis\":\"80\",\"p_disprice\":\"50.00\",\"p_total\":\"450.00\"}]', 1996, '2024-02-21 13:32:33', 2),
(3, 'Jagadeesh', 'LM2024BILL3', '', '', '', '', '84,POOSARI THOTTAM,BOMMANALLUR', '', '[{\"p_id\":\"81\",\"p_name\":\"Bomb01\",\"p_mrp\":\"165\",\"p_qty\":\"8\",\"p_dis\":\"80\",\"p_disprice\":\"33.00\",\"p_total\":\"264.00\"},{\"p_id\":\"80\",\"p_name\":\"Vignesh r\",\"p_mrp\":\"77\",\"p_qty\":\"125\",\"p_dis\":\"80\",\"p_disprice\":\"15.40\",\"p_total\":\"1925.00\"},{\"p_id\":\"85\",\"p_name\":\"T23\",\"p_mrp\":\"250\",\"p_qty\":\"14\",\"p_dis\":\"8\",\"p_disprice\":\"230.00\",\"p_total\":\"3220.00\"}]', 5409, '2024-02-21 13:47:52', 1),
(4, 'Jagadeesh', 'LM2024BILL4', '', '', '', '', '84,POOSARI THOTTAM,BOMMANALLUR', '', '[{\"p_id\":\"85\",\"p_name\":\"T23\",\"p_mrp\":\"250\",\"p_qty\":\"15\",\"p_dis\":\"75\",\"p_disprice\":\"62.50\",\"p_total\":\"937.50\"},{\"p_id\":\"84\",\"p_name\":\"Treat2\",\"p_mrp\":\"250\",\"p_qty\":\"10\",\"p_dis\":\"80\",\"p_disprice\":\"50.00\",\"p_total\":\"500.00\"}]', 1438, '2024-02-21 14:14:22', 0),
(5, 'karhti', 'LM2024BILL5', '', '', '', '', 'salem', '', '[{\"p_id\":\"47\",\"p_name\":\"Two Sound ROCKET\",\"p_mrp\":\"650\",\"p_qty\":\"10\",\"p_dis\":\"80\",\"p_disprice\":\"130.00\",\"p_total\":\"1300.00\"},{\"p_id\":\"78\",\"p_name\":\"2`` Fancy\",\"p_mrp\":\"625\",\"p_qty\":\"15\",\"p_dis\":\"74\",\"p_disprice\":\"162.50\",\"p_total\":\"2437.50\"},{\"p_id\":\"74\",\"p_name\":\"Chotta Fancy\",\"p_mrp\":\"280\",\"p_qty\":\"54\",\"p_dis\":\"26\",\"p_disprice\":\"207.20\",\"p_total\":\"11188.80\"}]', 14926, '2024-02-22 05:38:34', 1),
(6, 'karhti', 'LM2024BILL6', '', '', '', '', 'salem', '', '[{\"p_id\":\"79\",\"p_name\":\"first\",\"p_mrp\":\"1000\",\"p_qty\":\"10\",\"p_dis\":\"80\",\"p_disprice\":\"200.00\",\"p_total\":\"2000.00\"}]', 2000, '2024-02-23 10:09:27', 1),
(7, 'ram', 'LM2024BILL7', '', '', '', '', 'covai', '', '[{\"p_id\":\"80\",\"p_name\":\"Vignesh r\",\"p_mrp\":\"1200\",\"p_qty\":\"10\",\"p_dis\":\"75\",\"p_disprice\":\"300.00\",\"p_total\":\"3000.00\"}]', 3000, '2024-02-23 10:12:47', 2),
(8, 'sasi', 'LM2024BILL8', '', '', '', '', 'covai', '', '[{\"p_id\":\"84\",\"p_name\":\"Treat2\",\"p_mrp\":\"250\",\"p_qty\":\"14\",\"p_dis\":\"80\",\"p_disprice\":\"50.00\",\"p_total\":\"700.00\"}]', 700, '2024-02-23 10:14:40', 3),
(9, 'vignesh', 'LM2024BILL9', '9444975083', '9444975083', 'er', '275760-05-', '3/804, PILLAIYAR KOVIL STREET, PARAI PATTI\nVirudhunagar', 'Cash', '[{\"p_id\":\"79\",\"p_name\":\"first\",\"p_mrp\":\"1000\",\"p_qty\":\"4\",\"p_dis\":\"80\",\"p_disprice\":\"200.00\",\"p_total\":\"800.00\"}]', 800, '2024-02-23 11:10:25', 1),
(10, 'fg', 'LM2024BILL10', '7550025568', '9444975083', '56565', '', '3/804, PILLAIYAR KOVIL STREET, PARAI PATTI\nVirudhunagar', '', '[{\"p_id\":\"81\",\"p_name\":\"Bomb01\",\"p_mrp\":\"165\",\"p_qty\":\"6\",\"p_dis\":\"80\",\"p_disprice\":\"33.00\",\"p_total\":\"198.00\"},{\"p_id\":\"80\",\"p_name\":\"Vignesh r\",\"p_mrp\":\"1200\",\"p_qty\":\"5\",\"p_dis\":\"80\",\"p_disprice\":\"240.00\",\"p_total\":\"1200.00\"},{\"p_id\":\"84\",\"p_name\":\"Treat2\",\"p_mrp\":\"250\",\"p_qty\":\"6\",\"p_dis\":\"80\",\"p_disprice\":\"50.00\",\"p_total\":\"300.00\"},{\"p_id\":\"83\",\"p_name\":\"new Bomb\",\"p_mrp\":\"145\",\"p_qty\":\"999\",\"p_dis\":\"80\",\"p_disprice\":\"29.00\",\"p_total\":\"28971.00\"}]', 30669, '2024-02-23 11:35:27', 1),
(11, 'vignesh', 'LM2024BILL11', '7550025567', '9444975083', '', '222322-05-', '3/804, PILLAIYAR KOVIL STREET, PARAI PATTI\nVirudhunagar\n\n\n', '', '[{\"p_id\":\"84\",\"p_name\":\"Treat2\",\"p_mrp\":\"250\",\"p_qty\":\"56\",\"p_dis\":\"80\",\"p_disprice\":\"50.00\",\"p_total\":\"2800.00\"},{\"p_id\":\"84\",\"p_name\":\"Treat2\",\"p_mrp\":\"250\",\"p_qty\":\"25\",\"p_dis\":\"80\",\"p_disprice\":\"50.00\",\"p_total\":\"1250.00\"},{\"p_id\":\"79\",\"p_name\":\"first\",\"p_mrp\":\"1000\",\"p_qty\":\"60\",\"p_dis\":\"80\",\"p_disprice\":\"200.00\",\"p_total\":\"12000.00\"}]', 16050, '2024-02-23 12:42:55', 2),
(12, 'mr x y', 'LM2024BILL12', '9099909909', '9999999999', 'jj0i0', '2024-02-03', 'india street', 'Cash', '[{\"p_id\":\"81\",\"p_name\":\"Bomb01\",\"p_mrp\":\"165\",\"p_qty\":\"2\",\"p_dis\":\"80\",\"p_disprice\":\"33.00\",\"p_total\":\"66.00\"}]', 66, '2024-02-24 06:18:59', 2),
(13, 'vignesh', 'LM2024BILL13', '9444975083', '9444975083', '5990+909+6+2', '22555-01-0', '3/804, PILLAIYAR KOVIL STREET, PARAI PATTI\nVirudhunagar', 'Cash', '[{\"p_id\":\"86\",\"p_name\":\"Kuravi\",\"p_mrp\":\"500\",\"p_qty\":\"5\",\"p_dis\":\"80\",\"p_disprice\":\"100.00\",\"p_total\":\"500.00\"}]', 500, '2024-02-24 12:33:07', 2),
(14, 'Quynn Mcdonald', 'LM2024BILL14', '', '', 'Consequuntur officia', '2024-02-24', 'Dolore laudantium a', 'Net Banking', '[{\"p_id\":\"87\",\"p_name\":\"LAKSHMI\",\"p_mrp\":\"50\",\"p_qty\":\"10\",\"p_dis\":\"80\",\"p_disprice\":\"10.00\",\"p_total\":\"100.00\"},{\"p_id\":\"86\",\"p_name\":\"Kuravi\",\"p_mrp\":\"500\",\"p_qty\":\"14\",\"p_dis\":\"80\",\"p_disprice\":\"100.00\",\"p_total\":\"1400.00\"}]', 1500, '2024-02-24 13:27:40', 1),
(15, 'test', 'LM2024BILL15', '9009909090', '9090900000', 'dkfja', '2024-02-28', 'sivakasi', 'Cash', '[{\"p_id\":\"87\",\"p_name\":\"LAKSHMI\",\"p_mrp\":\"50\",\"p_qty\":\"2\",\"p_dis\":\"80\",\"p_disprice\":\"10.00\",\"p_total\":\"20.00\"}]', 20, '2024-02-25 06:03:41', 1),
(16, 'Vignesh ', 'LM2024BILL16', '9444975083', '7550025568', '', '2024-02-29', 'https://forestgreen.in/lm_crackers/admin/dashboard/billing.php', 'Cash', '[{\"p_id\":\"86\",\"p_name\":\"Kuravi\",\"p_mrp\":\"500\",\"p_qty\":\"3\",\"p_dis\":\"80\",\"p_disprice\":\"100.00\",\"p_total\":\"300.00\"},{\"p_id\":\"87\",\"p_name\":\"LAKSHMI\",\"p_mrp\":\"50\",\"p_qty\":\"2\",\"p_dis\":\"80\",\"p_disprice\":\"10.00\",\"p_total\":\"20.00\"}]', 320, '2024-02-25 16:29:29', 1),
(17, 'vignesh', 'LM2024BILL17', '9444975083', '7550025568', 'Number', '2024-03-06', 'dj', 'Cheque', '[{\"p_id\":\"86\",\"p_name\":\"Kuravi\",\"p_mrp\":\"500\",\"p_qty\":\"56\",\"p_dis\":\"80\",\"p_disprice\":\"100.00\",\"p_total\":\"5600.00\"},{\"p_id\":\"87\",\"p_name\":\"LAKSHMI\",\"p_mrp\":\"50\",\"p_qty\":\"6\",\"p_dis\":\"0\",\"p_disprice\":\"50.00\",\"p_total\":\"300.00\"}]', 5900, '2024-03-05 04:40:08', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `discount` varchar(255) DEFAULT NULL,
  `alignment` int(11) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`id`, `name`, `discount`, `alignment`, `created_on`) VALUES
(97, 'SINGLE SHOT\n', '80', 0, '2024-02-24 11:44:40'),
(99, '7  CM SPARKLERS', '80', 0, '2024-02-24 11:51:00'),
(100, '10  CM SPARKLERS', '80', 0, '2024-02-24 11:51:15'),
(101, '12  CM SPARKLERS', '80', 0, '2024-02-24 11:51:34'),
(102, '15 CM SPARKLERS ', '80', 0, '2024-02-24 11:51:50'),
(103, '30 cm SPARKLER', '80', 0, '2024-02-24 11:52:12'),
(104, '55 CM SPARKLER\n', '80', 0, '2024-02-24 11:52:28'),
(105, 'TWINKLING STAR \n', '80', 0, '2024-02-24 11:52:48'),
(107, 'GROUNT CHAKKARS\n', '80', 0, '2024-02-24 11:53:23'),
(108, 'FLOWER POT\n', '80', 0, '2024-02-24 11:53:35'),
(109, 'SPECIAL BOOM\n', '80', 0, '2024-02-24 11:53:44'),
(110, 'BIJILI CRACKERS\n', '80', 0, '2024-02-24 11:53:55'),
(111, ' ROCKET\n', '80', 0, '2024-02-24 11:54:06'),
(112, 'CARTOON\n', '80', 0, '2024-02-24 11:54:16'),
(113, 'DELUXE\n', '80', 0, '2024-02-24 11:54:27'),
(114, 'SARAVEDI\n', '80', 0, '2024-02-24 11:54:40'),
(115, 'HALF COUNTING\n', '80', 0, '2024-02-24 11:54:54'),
(116, 'FANCY SHOT\n', '80', 0, '2024-02-24 11:55:04'),
(117, 'REPEATING SHOTS\n', '80', 0, '2024-02-24 11:55:25'),
(119, 'SERIEL NOVELTIES AND COMETS', '80', 0, '2024-03-05 07:10:43'),
(120, 'FOUNTAINS', '80', 0, '2024-03-05 07:10:52'),
(121, 'PEACOCK', '80', 0, '2024-03-05 07:11:03'),
(122, 'NOVELTIES CRACKERS', '80', 0, '2024-03-05 07:11:13'),
(123, 'ADIYAL', '80', 0, '2024-03-05 07:11:22'),
(124, 'PAPER SHOT', '80', 0, '2024-03-05 07:11:31'),
(125, 'TEST FANCY ITEMS', '80', 0, '2024-03-05 07:11:39'),
(126, 'GIFT BOX', '0', 0, '2024-03-05 07:11:48');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_orders`
--

CREATE TABLE `tbl_orders` (
  `id` bigint(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` int(10) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `order_id` varchar(255) NOT NULL,
  `order_status` varchar(255) NOT NULL DEFAULT 'Ordered',
  `p_name` varchar(255) NOT NULL,
  `p_quantity` int(11) NOT NULL,
  `p_price` int(11) NOT NULL,
  `p_total` int(11) NOT NULL,
  `p_mrp` int(11) NOT NULL,
  `p_mrp_total` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `p_discount` int(11) NOT NULL,
  `overall_total` int(11) NOT NULL,
  `overall_mrp_total` int(11) NOT NULL,
  `date` text NOT NULL,
  `packing_charge` int(11) NOT NULL,
  `promotion_discount` int(11) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` int(2) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_orders`
--

INSERT INTO `tbl_orders` (`id`, `name`, `phone`, `email`, `address`, `order_id`, `order_status`, `p_name`, `p_quantity`, `p_price`, `p_total`, `p_mrp`, `p_mrp_total`, `p_id`, `p_discount`, `overall_total`, `overall_mrp_total`, `date`, `packing_charge`, `promotion_discount`, `created_on`, `status`) VALUES
(29, 'aerewr', 654945, 'sedfef@sdfrf', 'sdfsdfgsg', 'LM2024EST28', 'Ordered', 'first', 21, 250, 5250, 1000, 21000, 79, 75, 6250, 21000, '05-02-2024', 1000, 0, '2024-02-24 12:33:34', 0),
(30, 'aerewr', 654945, 'sedfef@sdfrf', 'sdfsdfgsg', 'LM2024EST28', 'Ordered', 'first', 21, 250, 5250, 1000, 21000, 79, 75, 6250, 21000, '05-02-2024', 1000, 0, '2024-02-24 12:33:34', 0),
(31, 'aerewr', 654945, 'sedfef@sdfrf', 'sdfsdfgsg', 'LM2024EST28', 'Ordered', 'first', 21, 250, 5250, 1000, 21000, 79, 75, 6250, 21000, '05-02-2024', 1000, 0, '2024-02-24 12:33:34', 0),
(32, 'aerewr', 654945, 'sedfef@sdfrf', 'sdfsdfgsg', 'LM2024EST28', 'Ordered', 'first', 21, 250, 5250, 1000, 21000, 79, 75, 6250, 21000, '05-02-2024', 1000, 0, '2024-02-24 12:33:34', 0),
(33, 'aerewr', 654945, 'sedfef@sdfrf', 'sdfsdfgsg', 'LM2024EST28', 'Ordered', 'first', 21, 250, 5250, 1000, 21000, 79, 75, 6250, 21000, '05-02-2024', 1000, 0, '2024-02-24 12:33:34', 0),
(34, 'xfghgfth', 987546321, 'xdfgh@sfs', 'szdfrgrfg', 'LM2024EST33', 'Ordered', 'first', 21, 250, 5250, 1000, 21000, 79, 75, 5750, 21000, '05-02-2024', 500, 0, '2024-02-24 12:33:40', 0),
(35, 'awdefedfd', 321674, 'asdaf@erfe', 'sdfrfrfr', 'LM2024EST34', 'Ordered', 'first', 21, 250, 5250, 1000, 21000, 79, 75, 5750, 21000, '05-02-2024', 500, 0, '2024-02-24 12:33:47', 0),
(36, 'afefrf', 48679, 'sdfd@dgfdsf', 'dfdsfgsrfg', 'LM2024EST35', 'Ordered', 'Vignesh r', 20, 300, 6000, 1200, 24000, 80, 75, 6400, 24000, '05-02-2024', 1000, 600, '2024-02-24 12:33:50', 0),
(37, 'j', 99900, 'jj@gmail.com', 'dfkdjf', 'LM2024EST36', 'Ordered', 'first', 99, 250, 24750, 1000, 99000, 79, 75, 25250, 99000, '20-02-2024', 500, 0, '2024-02-24 12:33:53', 0),
(38, 'mr x y', 2147483647, 'sdk@gmail.com', 'india street', 'LM2024EST37', 'Ordered', 'first', 20, 250, 5000, 1000, 20000, 79, 75, 5500, 20000, '21-02-2024', 500, 0, '2024-02-24 12:33:56', 0),
(39, 'Jagadeesh', 9875456, 'jagadeeshau032@gmail.com', '84,POOSARI THOTTAM,BOMMANALLUR', 'LM2024EST38', 'Ordered', 'first', 10, 250, 2500, 1000, 10000, 79, 75, 6000, 22000, '21-02-2024', 500, 0, '2024-02-24 12:33:59', 0),
(40, 'Jagadeesh', 9875456, 'jagadeeshau032@gmail.com', '84,POOSARI THOTTAM,BOMMANALLUR', 'LM2024EST38', 'Ordered', 'Vignesh r', 10, 300, 3000, 1200, 12000, 80, 75, 6000, 22000, '21-02-2024', 500, 0, '2024-02-24 12:33:59', 0),
(41, 'Jagadeesh', 1231564679, 'jagadeeshau032@gmail.com', '84,POOSARI THOTTAM,BOMMANALLUR', 'LM2024EST39', 'Ordered', 'Vignesh r', 100, 300, 30000, 1200, 120000, 80, 75, 30500, 120000, '22-02-2024', 500, 0, '2024-02-24 12:34:03', 0),
(42, 'jack', 2147483647, 'fdef@SDF.IN', 'aerfwerwerw', 'LM2024EST42', 'Ordered', 'first', 15, 250, 3750, 1000, 15000, 79, 75, 4250, 15000, '22-02-2024', 500, 0, '2024-02-24 12:34:07', 0),
(43, 'mr x y', 2147483647, 'sdk@gmail.com', 'india street', 'LM2024EST43', 'Ordered', 'first', 10, 250, 2500, 1000, 10000, 79, 75, 6500, 22000, '22-02-2024', 1000, 0, '2024-02-24 12:34:12', 0),
(44, 'mr x y', 2147483647, 'sdk@gmail.com', 'india street', 'LM2024EST43', 'Ordered', 'Vignesh r', 10, 300, 3000, 1200, 12000, 80, 75, 6500, 22000, '22-02-2024', 1000, 0, '2024-02-24 12:34:12', 0),
(45, 'mr x y', 2147483647, 'sdk@gmail.com', 'india street', 'LM2024EST44', 'Ordered', 'first', 10, 250, 2500, 1000, 10000, 79, 75, 6000, 22000, '23-02-2024', 500, 0, '2024-02-24 07:41:44', 0),
(46, 'mr x y', 2147483647, 'sdk@gmail.com', 'india street', 'LM2024EST44', 'Ordered', 'Vignesh r', 10, 300, 3000, 1200, 12000, 80, 75, 6000, 22000, '23-02-2024', 500, 0, '2024-02-24 07:41:44', 0),
(47, 'mr x y', 2147483647, 'sdk@gmail.com', 'india street', 'LM2024EST46', 'Pending', 'first', 10, 250, 2500, 1000, 10000, 79, 75, 6000, 22000, '23-02-2024', 500, 0, '2024-02-24 07:41:54', 0),
(48, 'mr x y', 2147483647, 'sdk@gmail.com', 'india street', 'LM2024EST46', 'Pending', 'Vignesh r', 10, 300, 3000, 1200, 12000, 80, 75, 6000, 22000, '23-02-2024', 500, 0, '2024-02-24 07:41:54', 0),
(49, 'vignesh', 2147483647, 'vigneshrengaraj.mca@gmail.com', '3/804, PILLAIYAR KOVIL STREET, PARAI PATTI\r\nVirudhunagar', 'LM2024EST48', 'Ordered', 'Bomb01', 45, 165, 7425, 165, 7425, 81, 0, 7925, 7425, '24-02-2024', 500, 0, '2024-02-24 12:34:22', 0),
(50, 'Family Gift Box(21 Items)', 2147483647, 'kickvytechnology@gmail.com', '3/804, PILLAIYAR KOVIL STREET, PARAI PATTI\r\nVirudhunagar', 'LM2024EST50', 'Ordered', 'Bomb01', 566, 165, 93390, 165, 93390, 81, 0, 93890, 93390, '24-02-2024', 500, 0, '2024-02-24 12:34:25', 0),
(51, 'vignesh', 2147483647, 'vigneshrengaraj.mca@gmail.com', '9354878', 'LM2024EST51', 'Ordered', 'LAKSHMI', 400, 10, 4000, 50, 20000, 87, 80, 5200, 23500, '24-02-2024', 500, 0, '2024-02-24 12:34:29', 0),
(52, 'vignesh', 2147483647, 'vigneshrengaraj.mca@gmail.com', '9354878', 'LM2024EST51', 'Ordered', 'Kuravi', 7, 100, 700, 500, 3500, 86, 80, 5200, 23500, '24-02-2024', 500, 0, '2024-02-24 12:34:29', 0),
(53, 'vignesh', 2147483647, 'kickvytechnology@gmail.com', '3/804, PILLAIYAR KOVIL STREET, PARAI PATTI\r\nVirudhunagar', 'LM2024EST52', 'Completed', 'Kuravi', 4, 100, 400, 500, 2000, 86, 80, 9100, 43000, '24-02-2024', 500, 0, '2024-02-24 12:35:52', 1),
(54, 'vignesh', 2147483647, 'kickvytechnology@gmail.com', '3/804, PILLAIYAR KOVIL STREET, PARAI PATTI\r\nVirudhunagar', 'LM2024EST52', 'Completed', 'LAKSHMI', 820, 10, 8200, 50, 41000, 87, 80, 9100, 43000, '24-02-2024', 500, 0, '2024-02-24 12:35:52', 1),
(55, 'Janna Best', 2147483647, 'kosadi@mailinator.com', 'Voluptas temporibus ', 'LM2024EST55', 'Ordered', 'Kuravi', 100, 100, 10000, 500, 50000, 86, 80, 10500, 50000, '24-02-2024', 500, 0, '2024-02-24 12:46:44', 1),
(56, 'testing', 2147483647, 'test@gmail.com', 'srivi', 'LM2024EST56', 'Completed', 'Kuravi', 10, 100, 1000, 500, 5000, 86, 80, 3500, 15000, '25-02-2024', 500, 0, '2024-02-25 05:57:17', 1),
(57, 'testing', 2147483647, 'test@gmail.com', 'srivi', 'LM2024EST56', 'Completed', 'LAKSHMI', 200, 10, 2000, 50, 10000, 87, 80, 3500, 15000, '25-02-2024', 500, 0, '2024-02-25 05:57:17', 1),
(58, 'vignesh', 2147483647, 'vigneshrengaraj.mca@gmail.com', '3 804 pillayer kovil street, paraipatti,sivakasi', 'LM2024EST58', 'Ordered', 'BUTTER FLY', 56, 40, 2240, 200, 11200, 114, 80, 4580, 13060, '05-03-2024', 500, 0, '2024-03-05 08:08:18', 1),
(59, 'vignesh', 2147483647, 'vigneshrengaraj.mca@gmail.com', '3 804 pillayer kovil street, paraipatti,sivakasi', 'LM2024EST58', 'Ordered', 'STONE', 1, 5, 5, 25, 25, 116, 80, 4580, 13060, '05-03-2024', 500, 0, '2024-03-05 08:08:18', 1),
(60, 'vignesh', 2147483647, 'vigneshrengaraj.mca@gmail.com', '3 804 pillayer kovil street, paraipatti,sivakasi', 'LM2024EST58', 'Ordered', '21 ITEMS', 1, 235, 235, 235, 235, 118, 0, 4580, 13060, '05-03-2024', 500, 0, '2024-03-05 08:08:18', 1),
(61, 'vignesh', 2147483647, 'vigneshrengaraj.mca@gmail.com', '3 804 pillayer kovil street, paraipatti,sivakasi', 'LM2024EST58', 'Ordered', '31 ITEMS', 5, 320, 1600, 320, 1600, 119, 0, 4580, 13060, '05-03-2024', 500, 0, '2024-03-05 08:08:18', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `id` int(11) NOT NULL,
  `category` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `mrp` int(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  `url` varchar(255) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` int(2) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`id`, `category`, `name`, `image`, `mrp`, `type`, `url`, `created_on`, `status`) VALUES
(1, 'SINGLE SHOT', '2 3/4\" KURUVI', '', 22, 'PKT', '', '0000-00-00 00:00:00', 1),
(2, 'SINGLE SHOT', '3 1/2\" KURUVI', '', 30, 'PKT', '', '0000-00-00 00:00:00', 1),
(3, 'SINGLE SHOT', '4\" LAKSHMI', '', 45, 'PKT', '', '0000-00-00 00:00:00', 1),
(4, 'SINGLE SHOT', '4\" ELEPHANT', '', 75, 'PKT', '', '0000-00-00 00:00:00', 1),
(5, 'SINGLE SHOT', '4\" GOLD LAKSHMI', '', 75, 'PKT', '', '0000-00-00 00:00:00', 1),
(6, 'SINGLE SHOT', '4\" DELUX LAKSHMI', '', 70, 'PKT', '', '0000-00-00 00:00:00', 1),
(7, 'SINGLE SHOT', '4\" CHOTA BHEEM', '', 75, 'PKT', '', '0000-00-00 00:00:00', 1),
(8, 'SINGLE SHOT', '5 1/2\" JALLIKATTU', '', 150, 'PKT', '', '0000-00-00 00:00:00', 1),
(9, '7  CM SPARKLERS', 'ELECTRIC', '', 28, 'BOX', '', '0000-00-00 00:00:00', 1),
(10, '7  CM SPARKLERS', 'COLOUR', '', 35, 'BOX', '', '0000-00-00 00:00:00', 1),
(11, '7  CM SPARKLERS', 'GREEN', '', 40, 'BOX', '', '0000-00-00 00:00:00', 1),
(12, '7  CM SPARKLERS', 'RED', '', 50, 'BOX', '', '0000-00-00 00:00:00', 1),
(13, '7  CM SPARKLERS', 'SILVER', '', 55, 'BOX', '', '0000-00-00 00:00:00', 1),
(14, '7  CM SPARKLERS', 'BLUE', '', 60, 'BOX', '', '0000-00-00 00:00:00', 1),
(15, '10  CM SPARKLERS', 'ELECTRIC', '', 50, 'BOX', '', '0000-00-00 00:00:00', 1),
(16, '10  CM SPARKLERS', 'COLOUR', '', 55, 'BOX', '', '0000-00-00 00:00:00', 1),
(17, '10  CM SPARKLERS', 'GREEN', '', 65, 'BOX', '', '0000-00-00 00:00:00', 1),
(18, '10  CM SPARKLERS', 'RED', '', 75, 'BOX', '', '0000-00-00 00:00:00', 1),
(19, '10  CM SPARKLERS', 'SILVER', '', 80, 'BOX', '', '0000-00-00 00:00:00', 1),
(20, '10  CM SPARKLERS', 'BLUE', '', 90, 'BOX', '', '0000-00-00 00:00:00', 1),
(21, '12  CM SPARKLERS', 'ELECTRIC', '', 70, 'BOX', '', '0000-00-00 00:00:00', 1),
(22, '12  CM SPARKLERS', 'COLOUR', '', 80, 'BOX', '', '0000-00-00 00:00:00', 1),
(23, '12  CM SPARKLERS', 'GREEN', '', 85, 'BOX', '', '0000-00-00 00:00:00', 1),
(24, '12  CM SPARKLERS', 'RED', '', 100, 'BOX', '', '0000-00-00 00:00:00', 1),
(25, '12  CM SPARKLERS', 'SILVER', '', 105, 'BOX', '', '0000-00-00 00:00:00', 1),
(26, '12  CM SPARKLERS', 'BLUE', '', 115, 'BOX', '', '0000-00-00 00:00:00', 1),
(27, '15 CM SPARKLERS ', 'ELECTRIC', '', 110, 'BOX', '', '0000-00-00 00:00:00', 1),
(28, '15 CM SPARKLERS ', 'COLOUR', '', 120, 'BOX', '', '0000-00-00 00:00:00', 1),
(29, '15 CM SPARKLERS ', 'GREEN', '', 80, 'BOX', '', '0000-00-00 00:00:00', 1),
(30, '15 CM SPARKLERS ', 'RED', '', 150, 'BOX', '', '0000-00-00 00:00:00', 1),
(31, '15 CM SPARKLERS ', 'SILVER', '', 160, 'BOX', '', '0000-00-00 00:00:00', 1),
(32, '15 CM SPARKLERS ', 'BLUE', '', 170, 'BOX', '', '0000-00-00 00:00:00', 1),
(33, '30 cm SPARKLER', 'ELECTRIC', '', 110, 'BOX', '', '0000-00-00 00:00:00', 1),
(34, '30 cm SPARKLER', 'COLOUR', '', 120, 'BOX', '', '0000-00-00 00:00:00', 1),
(35, '30 cm SPARKLER', 'GREEN', '', 130, 'BOX', '', '0000-00-00 00:00:00', 1),
(36, '30 cm SPARKLER', 'RED', '', 150, 'BOX', '', '0000-00-00 00:00:00', 1),
(37, '30 cm SPARKLER', 'SILVER', '', 160, 'BOX', '', '0000-00-00 00:00:00', 1),
(38, '30 cm SPARKLER', 'BLUE', '', 170, 'BOX', '', '0000-00-00 00:00:00', 1),
(39, '55 CM SPARKLER', 'ELECTRIC', '', 600, 'BOX', '', '0000-00-00 00:00:00', 1),
(40, '55 CM SPARKLER', 'COLOUR', '', 700, 'BOX', '', '0000-00-00 00:00:00', 1),
(41, 'TWINKLING STAR ', '1 1/2\"  SATTAI', '', 60, 'BOX', '', '0000-00-00 00:00:00', 1),
(42, 'TWINKLING STAR ', '4 1/2\" SATTAI', '', 180, 'BOX', '', '0000-00-00 00:00:00', 1),
(43, 'GROUNT CHAKKARS', 'BIG', '', 9, 'BOX', '', '0000-00-00 00:00:00', 1),
(44, 'GROUNT CHAKKARS', 'SPECIAL', '', 185, 'BOX', '', '0000-00-00 00:00:00', 1),
(45, 'GROUNT CHAKKARS', 'DELUXE', '', 300, 'BOX', '', '0000-00-00 00:00:00', 1),
(46, 'FLOWER POT', 'TREE COLOR', '', 750, 'BOX', '', '0000-00-00 00:00:00', 1),
(47, 'FLOWER POT', 'BIG', '', 165, 'BOX', '', '0000-00-00 00:00:00', 1),
(48, 'FLOWER POT', 'SPECIAL', '', 190, 'BOX', '', '0000-00-00 00:00:00', 1),
(49, 'FLOWER POT', 'ASOKA', '', 245, 'BOX', '', '0000-00-00 00:00:00', 1),
(50, 'FLOWER POT', 'COLOUR KOTTI', '', 550, 'BOX', '', '0000-00-00 00:00:00', 1),
(51, 'FLOWER POT', 'DELUXE', '', 455, 'BOX', '', '0000-00-00 00:00:00', 1),
(52, 'FLOWER POT', 'SUPER DELUXE', '', 325, 'BOX', '', '0000-00-00 00:00:00', 1),
(53, 'SPECIAL BOOM', 'DIGITAL BOOM', '', 750, 'BOX', '', '0000-00-00 00:00:00', 1),
(54, 'SPECIAL BOOM', 'DIGITAL BOOM', '', 650, 'BOX', '', '0000-00-00 00:00:00', 1),
(55, 'SPECIAL BOOM', 'CLASSIC BOOM', '', 300, 'BOX', '', '0000-00-00 00:00:00', 1),
(56, 'SPECIAL BOOM', 'TREACER BOOM', '', 450, 'BOX', '', '0000-00-00 00:00:00', 1),
(57, 'SPECIAL BOOM', 'BULLET BOOM', '', 60, 'BOX', '', '0000-00-00 00:00:00', 1),
(58, 'BIJILI CRACKERS', 'RED', '', 100, 'PKT', '', '0000-00-00 00:00:00', 1),
(59, 'BIJILI CRACKERS', 'STRIPPED', '', 100, 'PKT', '', '0000-00-00 00:00:00', 1),
(60, 'BIJILI CRACKERS', 'STRIPPED', '', 70, 'PKT', '', '0000-00-00 00:00:00', 1),
(61, ' ROCKET', 'BIJILI ROCKET', '', 400, 'PKT', '', '0000-00-00 00:00:00', 1),
(62, ' ROCKET', 'LUNIC ROCKET', '', 205, 'PKT', '', '0000-00-00 00:00:00', 1),
(63, 'CARTOON', 'ASARTED CARTOON', '', 40, 'PKT', '', '0000-00-00 00:00:00', 1),
(64, 'DELUXE', '24 DELUXE', '', 120, 'PKT', '', '0000-00-00 00:00:00', 1),
(65, 'DELUXE', '52 DELUXE', '', 250, 'PKT', '', '0000-00-00 00:00:00', 1),
(66, 'DELUXE', '100 DELUXE', '', 500, 'PKT', '', '0000-00-00 00:00:00', 1),
(67, 'SARAVEDI', '1K ', '', 900, 'BOX', '', '0000-00-00 00:00:00', 1),
(68, 'SARAVEDI', '2K', '', 1750, 'BOX', '', '0000-00-00 00:00:00', 1),
(69, 'SARAVEDI', '5K', '', 4300, 'BOX', '', '0000-00-00 00:00:00', 1),
(70, 'SARAVEDI', '10K', '', 8800, 'BOX', '', '0000-00-00 00:00:00', 1),
(71, 'HALF COUNTING', '1K ', '', 525, 'BOX', '', '0000-00-00 00:00:00', 1),
(72, 'HALF COUNTING', '2K', '', 1000, 'BOX', '', '0000-00-00 00:00:00', 1),
(73, 'HALF COUNTING', '5K', '', 2425, 'BOX', '', '0000-00-00 00:00:00', 1),
(74, 'HALF COUNTING', '10K', '', 4825, 'BOX', '', '0000-00-00 00:00:00', 1),
(75, 'FANCY SHOT', 'PHOTO PLUS', '', 200, 'BOX', '', '0000-00-00 00:00:00', 1),
(76, 'FANCY SHOT', 'SIREN BIG', '', 500, 'BOX', '', '0000-00-00 00:00:00', 1),
(77, 'FANCY SHOT', 'SIREN SMALL', '', 400, 'BOX', '', '0000-00-00 00:00:00', 1),
(78, 'REPEATING SHOTS', '7 SHOT ( 5pcs)', '', 275, 'BOX', '', '0000-00-00 00:00:00', 1),
(79, 'REPEATING SHOTS', '12 SHOT', '', 500, 'BOX', '', '0000-00-00 00:00:00', 1),
(80, 'REPEATING SHOTS', '30 SHOT', '', 1150, 'BOX', '', '0000-00-00 00:00:00', 1),
(81, 'REPEATING SHOTS', '60 SHOT Disco', '', 2200, 'BOX', '', '0000-00-00 00:00:00', 1),
(82, 'REPEATING SHOTS', '60 SHOT Boomerang', '', 2450, 'BOX', '', '0000-00-00 00:00:00', 1),
(83, 'REPEATING SHOTS', '120 SHOT', '', 4900, 'BOX', '', '0000-00-00 00:00:00', 1),
(84, 'REPEATING SHOTS', '240 SHOT', '', 9800, 'BOX', '', '0000-00-00 00:00:00', 1),
(85, 'SERIEL NOVELTIES AND COMETS', 'CHOTA FANCY  1pcs', '', 115, 'BOX', '', '0000-00-00 00:00:00', 1),
(86, 'SERIEL NOVELTIES AND COMETS', '1 3/4\" PIPE', '', 575, 'BOX', '', '0000-00-00 00:00:00', 1),
(87, 'SERIEL NOVELTIES AND COMETS', '3 \" PIPE', '', 725, 'BOX', '', '0000-00-00 00:00:00', 1),
(88, 'SERIEL NOVELTIES AND COMETS', '2\" PIPE', '', 300, 'BOX', '', '0000-00-00 00:00:00', 1),
(89, 'SERIEL NOVELTIES AND COMETS', '3 1/2\" PIPE', '', 800, 'BOX', '', '0000-00-00 00:00:00', 1),
(90, 'SERIEL NOVELTIES AND COMETS', '4 \" PIPE ', '', 1100, 'BOX', '', '0000-00-00 00:00:00', 1),
(91, 'SERIEL NOVELTIES AND COMETS', '4 \" PIPE (2 ball shot)', '', 900, 'BOX', '', '0000-00-00 00:00:00', 1),
(92, 'FOUNTAINS', 'WORLD WONDER', '', 1250, 'BOX', '', '0000-00-00 00:00:00', 1),
(93, 'FOUNTAINS', 'SINGING POP', '', 315, 'BOX', '', '0000-00-00 00:00:00', 1),
(94, 'FOUNTAINS', 'CHOTA FANCY', '', 115, 'BOX', '', '0000-00-00 00:00:00', 1),
(95, 'FOUNTAINS', 'GOLDEN RISE', '', 240, 'BOX', '', '0000-00-00 00:00:00', 1),
(96, 'FOUNTAINS', 'TOUCH & TOUCH', '', 240, 'BOX', '', '0000-00-00 00:00:00', 1),
(97, 'FOUNTAINS', 'COLOUR RAIN', '', 240, 'BOX', '', '0000-00-00 00:00:00', 1),
(98, 'FOUNTAINS', 'MINION', '', 450, 'BOX', '', '0000-00-00 00:00:00', 1),
(99, 'FOUNTAINS', 'KINDER JOY', '', 500, 'BOX', '', '0000-00-00 00:00:00', 1),
(100, 'PEACOCK', 'PEACOCK - MINI', '', 390, 'BOX', '', '0000-00-00 00:00:00', 1),
(101, 'PEACOCK', 'BADA PEACOCK', '', 1000, 'BOX', '', '0000-00-00 00:00:00', 1),
(102, 'PEACOCK', 'SMALL PEACOCK', '', 390, 'BOX', '', '0000-00-00 00:00:00', 1),
(103, 'NOVELTIES CRACKERS', 'MONEY IN THE BUNK', '', 750, 'BOX', '', '0000-00-00 00:00:00', 1),
(104, 'NOVELTIES CRACKERS', 'PAPER SHOT', '', 575, 'BOX', '', '0000-00-00 00:00:00', 1),
(105, 'ADIYAL', '1/4 KG', '', 135, 'BOX', '', '0000-00-00 00:00:00', 1),
(106, 'ADIYAL', '1/2 KG', '', 275, 'BOX', '', '0000-00-00 00:00:00', 1),
(107, 'ADIYAL', '1 KG', '', 550, 'BOX', '', '0000-00-00 00:00:00', 1),
(108, 'ADIYAL', 'SMOCK', '', 550, 'BOX', '', '0000-00-00 00:00:00', 1),
(109, 'ADIYAL', 'SMOCK POWDER', '', 550, 'BOX', '', '0000-00-00 00:00:00', 1),
(110, 'ADIYAL', 'COCK', '', 550, 'BOX', '', '0000-00-00 00:00:00', 1),
(111, 'PAPER SHOT', '4 SHOT', '', 750, 'BOX', '', '0000-00-00 00:00:00', 1),
(112, 'PAPER SHOT', '8 SHOT', '', 1300, 'BOX', '', '0000-00-00 00:00:00', 1),
(113, 'TEST FANCY ITEMS', 'PHOTO FLASH', '', 200, 'BOX', '', '0000-00-00 00:00:00', 1),
(114, 'TEST FANCY ITEMS', 'BUTTER FLY', '', 200, 'BOX', '', '0000-00-00 00:00:00', 1),
(115, 'TEST FANCY ITEMS', 'PENCIL', '', 60, 'BOX', '', '0000-00-00 00:00:00', 1),
(116, 'TEST FANCY ITEMS', 'STONE', '', 25, 'BOX', '', '0000-00-00 00:00:00', 1),
(117, 'GIFT BOX', '16 ITEMS', '', 200, 'BOX', '', '0000-00-00 00:00:00', 1),
(118, 'GIFT BOX', '21 ITEMS', '', 235, 'BOX', '', '0000-00-00 00:00:00', 1),
(119, 'GIFT BOX', '31 ITEMS', '', 320, 'BOX', '', '0000-00-00 00:00:00', 1),
(120, 'GIFT BOX', '41 ITEMS', '', 465, 'BOX', '', '0000-00-00 00:00:00', 1),
(121, 'GIFT BOX', '51 ITEMS', '', 580, 'BOX', '', '0000-00-00 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_promocode`
--

CREATE TABLE `tbl_promocode` (
  `id` int(11) NOT NULL,
  `promocode` varchar(10) NOT NULL,
  `discount` int(2) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_promocode`
--

INSERT INTO `tbl_promocode` (`id`, `promocode`, `discount`, `status`) VALUES
(1, 'PROMO100', 10, 1),
(2, 'PROMO150', 15, 1),
(3, 'PROMO50', 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sitesettings`
--

CREATE TABLE `tbl_sitesettings` (
  `id` int(11) NOT NULL,
  `site_data` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_sitesettings`
--

INSERT INTO `tbl_sitesettings` (`id`, `site_data`, `created_on`) VALUES
(1, '{\"site_name\":\"LM Crackers\",\"site_minimum_order\":\"2500\",\"site_discount\":\"70\",\"billing_discount\":\"80%\",\"whatsapp_number\":\"99099090909\",\"mobile_number\":\"07550025568\",\"googlepay_number\":\"889898989\",\"phonepay_number\":\"82382938928\",\"email\":\"kickvytechnology@gmail.com\",\"googlemap_location_url\":\"https://maps.app.goo.gl/yeDo5Z5LNguJhxwh7\",\"address\":\"3/804, PILLAIYAR KOVIL STREET, PARAI PATTI\",\"bank_name_one\":\"AXIS Bank\",\"account_holder_name_one\":\"Crackers One\",\"account_number_one\":\"1234567890123456\",\"ifsc_code_one\":\"CO10000232\",\"branch_one\":\"Sivakasi\",\"bank_name_two\":\"TMB\",\"account_holder_name_two\":\"Crackers Two\",\"account_number_two\":\"1234567890123456\",\"ifsc_code_two\":\"CT10000232\",\"branch_two\":\"Sivakasi\",\"req_type\":\"update\",\"editId\":\"1\"}', '2024-02-25 03:19:57');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_state`
--

CREATE TABLE `tbl_state` (
  `id` int(11) NOT NULL,
  `state` varchar(255) NOT NULL,
  `minimum_order_value` int(10) NOT NULL,
  `packing_charge` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_state`
--

INSERT INTO `tbl_state` (`id`, `state`, `minimum_order_value`, `packing_charge`, `status`, `created_on`) VALUES
(1, 'Tamil Nadu', 2500, 500, 1, '2024-01-13 10:43:10'),
(2, 'Kerala', 5000, 1000, 1, '2024-01-13 10:42:28'),
(3, 'Kerala', 6000, 3, 1, '2024-02-24 16:33:43');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_banner`
--
ALTER TABLE `tbl_banner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_billing`
--
ALTER TABLE `tbl_billing`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_orders`
--
ALTER TABLE `tbl_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_promocode`
--
ALTER TABLE `tbl_promocode`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_sitesettings`
--
ALTER TABLE `tbl_sitesettings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_state`
--
ALTER TABLE `tbl_state`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_banner`
--
ALTER TABLE `tbl_banner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_billing`
--
ALTER TABLE `tbl_billing`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;

--
-- AUTO_INCREMENT for table `tbl_orders`
--
ALTER TABLE `tbl_orders`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123;

--
-- AUTO_INCREMENT for table `tbl_promocode`
--
ALTER TABLE `tbl_promocode`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_sitesettings`
--
ALTER TABLE `tbl_sitesettings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_state`
--
ALTER TABLE `tbl_state`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

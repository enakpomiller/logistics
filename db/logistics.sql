-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 27, 2021 at 10:21 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `logistics`
--

-- --------------------------------------------------------

--
-- Table structure for table `tagslist`
--

CREATE TABLE `tagslist` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tagslist`
--

INSERT INTO `tagslist` (`id`, `name`) VALUES
(24, 'one'),
(25, 'two'),
(26, 'three'),
(27, 'four'),
(28, 'five'),
(29, 'six'),
(30, 'four'),
(31, 'one'),
(32, 'four'),
(33, 'one'),
(34, 'four');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cart`
--

CREATE TABLE `tbl_cart` (
  `id` int(11) NOT NULL,
  `user_id` varchar(20) NOT NULL,
  `product_id` int(11) NOT NULL,
  `prod_name` varchar(20) NOT NULL,
  `prod_price` varchar(15) NOT NULL,
  `prod_brand` varchar(15) NOT NULL,
  `prod_quantity` int(5) NOT NULL,
  `userfile` varchar(20) NOT NULL,
  `created_at` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_cart`
--

INSERT INTO `tbl_cart` (`id`, `user_id`, `product_id`, `prod_name`, `prod_price`, `prod_brand`, `prod_quantity`, `userfile`, `created_at`) VALUES
(233, '49', 5, 'bus truck', '4', 'old ', 4, 'serv-img1.jpg', 'Sep-Th'),
(234, '54', 6, 'vesel', '7000', 'new stock', 2, 'work8.jpg', 'Sep-Fr'),
(236, '54', 5, 'bus', '3000', 'new stock', 2, 'serv-img1.jpg', 'Sep-Fr'),
(237, '54', 11, 'cargo plane', '7000', 'new stock', 2, 'work12.jpg', 'Sep-Fr'),
(238, '55', 6, 'vesel', '7000', 'new stock', 2, 'work8.jpg', 'Sep-Fr'),
(239, '55', 5, 'bus', '3000', 'new stock', 1, 'serv-img1.jpg', 'Sep-Fr'),
(240, '55', 9, 'articulated veh', '3000', 'new stock', 1, 'banner1-1.jpg', 'Sep-Fr'),
(241, '49', 6, 'vesel', '7000', 'new stock', 1, 'work8.jpg', 'Sep-Sa'),
(242, '57', 5, 'bus', '3000', 'new brand', 11, 'serv-img1.jpg', 'Sep-Tu'),
(243, '57', 6, 'vesel', '7000', 'new stock', 11, 'work8.jpg', 'Sep-Tu'),
(244, '58', 5, 'bus', '3000', 'new stock', 3, 'serv-img1.jpg', 'Sep-Tu'),
(245, '58', 6, 'vesel', '7000', 'new stock', 1, 'work8.jpg', 'Sep-Tu'),
(247, '59', 5, 'bus', '3000', 'new stock', 5, 'serv-img1.jpg', 'Sep-Th'),
(248, '59', 6, 'vesel', '7000', 'new stock', 2, 'work8.jpg', 'Sep-Th'),
(252, '53', 12, 'cargo plane', '7000', 'new stock', 11, 'banner1-3.jpg', 'Oct-We'),
(253, '49', 5, 'bus', '3000', 'new stock', 5, 'serv-img1.jpg', 'Oct-We'),
(254, '53', 10, 'jet plane', '3000', 'new stock', 1, 'work5.jpg', 'Oct-Fr'),
(255, '61', 9, 'articulated veh', '3000', 'new stock', 5, 'banner1-1.jpg', 'Oct-Sa'),
(256, '61', 11, 'cargo plane', '7000', 'new stock', -2, 'work12.jpg', 'Oct-Sa'),
(257, '60', 5, 'bus', '3000', 'new stock', 3, 'serv-img1.jpg', 'Oct-Sa'),
(258, '60', 6, 'vesel new one in tow', '7000', 'new stock', 2, 'work8.jpg', 'Oct-Mo'),
(259, '60', 8, 'containers', '3000', 'new stock', 2, 'serv-img2.jpg', 'Oct-Mo'),
(262, '60', 5, 'bus', '3000', 'new stock', 1, 'serv-img1.jpg', 'Oct-Mo'),
(263, '60', 6, 'vesel', '7000', 'new stock', 1, 'work8.jpg', 'Oct-Mo'),
(265, '53', 5, 'bus', '3000', 'new stock', 1, 'serv-img1.jpg', 'Oct-We'),
(266, '53', 6, 'vesel', '7000', 'new stock', 1, 'work8.jpg', 'Oct-We'),
(267, '53', 6, 'vesel', '7000', 'new stock', 1, 'work8.jpg', 'Oct-We'),
(279, '60', 5, 'bus', '3000', 'new stock', 1, 'serv-img1.jpg', 'Oct-Fr'),
(280, '60', 12, 'cargo plane', '7000', 'new stock', 1, 'banner1-3.jpg', 'Oct-Fr'),
(281, '60', 5, 'bus', '3000', 'new stock', 2, 'serv-img1.jpg', 'Oct-Mo'),
(283, '60', 5, 'bus', '3000', 'new stock', 1, 'serv-img1.jpg', 'Oct-Mo'),
(285, '60', 6, 'vesel', '7000', 'new stock', 1, 'work8.jpg', 'Oct-Mo'),
(286, '60', 7, 'cargo train', '3009890', 'old stco', 2, 'banner1-4.jpg', 'Oct-Mo'),
(287, '53', 8, 'containers', '3000', 'new stock', 2, 'serv-img2.jpg', 'Oct-Tu'),
(288, '53', 6, 'vesel', '7000', 'new stock', 2, 'work8.jpg', 'Oct-Tu'),
(289, '53', 12, 'cargo plane', '7000', 'new stock', 1, 'banner1-3.jpg', 'Oct-Tu'),
(290, '53', 11, 'cargo plane', '7000', 'new stock', 2, 'work12.jpg', 'Oct-Tu'),
(292, '60', 5, 'bus', '3000', 'new stock', 1, 'serv-img1.jpg', 'Oct-Tu'),
(293, '53', 8, 'containers', '3000', 'new stock', -2, 'serv-img2.jpg', 'Oct-Tu'),
(294, '53', 6, 'vesel', '7000', 'new stock', -3, 'work8.jpg', 'Oct-Tu'),
(295, '53', 8, 'containers', '3000', 'new stock', -5, 'serv-img2.jpg', 'Oct-Tu'),
(296, '53', 6, 'vesel', '7000', 'new stock', -5, 'work8.jpg', 'Oct-Tu'),
(297, '53', 6, 'vesel', '7000', 'new stock', -5, 'work8.jpg', 'Oct-Tu'),
(298, '53', 12, 'cargo plane', '7000', 'new stock', 1, 'banner1-3.jpg', 'Oct-Tu'),
(299, '60', 11, 'cargo plane', '7000', 'new stock', 2, 'work12.jpg', 'Oct-We'),
(300, '60', 9, 'articulated veh', '3000', 'new stock', 0, 'banner1-1.jpg', 'Oct-We'),
(301, '53', 11, 'cargo plane', '7000', 'new stock', 2, 'work12.jpg', 'Oct-We'),
(302, '53', 6, 'vesel', '7000', 'new stock', 2, 'work8.jpg', 'Oct-We'),
(303, '62', 5, 'bus', '3000', 'new stock', 3, 'serv-img1.jpg', 'Oct-We'),
(304, '62', 6, 'vesel', '7000', 'new stock', 2, 'work8.jpg', 'Oct-We'),
(305, '62', 12, 'cargo plane', '7000', 'new stock', 3, 'banner1-3.jpg', 'Oct-We'),
(306, '62', 11, 'cargo plane', '7000', 'new stock', 2, 'work12.jpg', 'Oct-We'),
(307, '53', 12, 'cargo plane', '7000', 'new stock', 1, 'banner1-3.jpg', 'Oct-We'),
(308, '60', 10, 'jet plane', '3000', 'new stock', 1, 'work5.jpg', 'Oct-Mo'),
(309, '60', 10, 'jet plane', '3000', 'new stock', 11, 'work5.jpg', 'Oct-Mo'),
(310, '60', 5, 'bus', '3000', 'new stock', 5, 'serv-img1.jpg', 'Oct-Mo'),
(311, '53', 9, 'articulated veh', '3000', 'new stock', 2, 'banner1-1.jpg', 'Oct-Mo'),
(312, '53', 12, 'cargo plane', '7000', 'new stock', 2, 'banner1-3.jpg', 'Oct-Mo'),
(313, '53', 12, 'cargo plane', '7000', 'new stock', 11, 'banner1-3.jpg', 'Oct-Mo'),
(314, '53', 9, 'articulated veh', '3000', 'new stock', 2, 'banner1-1.jpg', 'Oct-Mo'),
(315, '53', 9, 'articulated veh', '3000', 'new stock', 2, 'banner1-1.jpg', 'Oct-Mo'),
(316, '53', 6, 'vesel', '7000', 'new stock', 2, 'work8.jpg', 'Oct-Mo'),
(317, '53', 6, 'vesel', '7000', 'new stock', 1, 'work8.jpg', 'Oct-Mo'),
(318, '53', 5, 'bus', '3000', 'new stock', 2, 'serv-img1.jpg', 'Oct-Mo'),
(319, '53', 6, 'vesel', '7000', 'new stock', 1, 'work8.jpg', 'Oct-Mo'),
(320, '53', 9, 'articulated veh', '3000', 'new stock', 1, 'banner1-1.jpg', 'Oct-Mo'),
(321, '53', 9, 'articulated veh', '3000', 'new stock', 1, 'banner1-1.jpg', 'Oct-Mo'),
(322, '49', 5, 'bus', '3000', 'new stock', 2, 'serv-img1.jpg', 'Oct-We'),
(323, '49', 6, 'vesel', '7000', 'new stock', 1, 'work8.jpg', 'Oct-We'),
(324, '49', 6, 'vesel', '7000', 'new stock', 1, 'work8.jpg', 'Oct-We'),
(325, '49', 9, 'articulated veh', '3000', 'new stock', 1, 'banner1-1.jpg', 'Oct-We'),
(326, '49', 6, 'vesel', '7000', 'new stock', 1, 'work8.jpg', 'Oct-We'),
(327, '49', 6, 'vesel', '7000', 'new stock', 1, 'work8.jpg', 'Oct-We'),
(328, '49', 5, 'bus', '3000', 'new stock', 1, 'serv-img1.jpg', 'Oct-We'),
(329, '49', 9, 'articulated veh', '3000', 'new stock', 2, 'banner1-1.jpg', 'Oct-We'),
(330, '49', 4, 'truck', '7000', 'new stock', 1, 'service1.jpg', 'Oct-We'),
(331, '49', 5, 'bus', '3000', 'new stock', 2, 'serv-img1.jpg', 'Oct-We'),
(332, '60', 8, 'containers', '3000', 'new stock', 1, 'serv-img2.jpg', 'Oct-We'),
(333, '49', 4, 'truck', '7000', 'new stock', 1, 'service1.jpg', 'Oct-We'),
(334, '49', 12, 'cargo plane', '7000', 'new stock', 1, 'banner1-3.jpg', 'Oct-We'),
(335, '49', 9, 'articulated veh', '3000', 'new stock', 1, 'banner1-1.jpg', 'Oct-We'),
(336, '49', 6, 'vesel', '7000', 'new stock', 1, 'work8.jpg', 'Oct-We'),
(337, '49', 5, 'bus', '3000', 'new stock', 1, 'serv-img1.jpg', 'Oct-We'),
(338, '49', 6, 'vesel', '7000', 'new stock', 1, 'work8.jpg', 'Oct-We'),
(339, '49', 8, 'containers', '3000', 'new stock', 4, 'serv-img2.jpg', 'Oct-We'),
(340, '49', 6, 'vesel', '7000', 'new stock', 11, 'work8.jpg', 'Oct-We'),
(341, '49', 5, 'bus', '3000', 'new stock', 2, 'serv-img1.jpg', 'Oct-We'),
(342, '49', 6, 'vesel', '7000', 'new stock', 1, 'work8.jpg', 'Oct-We'),
(343, '49', 6, 'vesel', '7000', 'new stock', 1, 'work8.jpg', 'Oct-We'),
(344, '60', 5, 'bus', '3000', 'new stock', 1, 'serv-img1.jpg', 'Oct-We'),
(345, '60', 9, 'articulated veh', '3000', 'new stock', 1, 'banner1-1.jpg', 'Oct-We'),
(346, '60', 8, 'containers', '3000', 'new stock', 1, 'serv-img2.jpg', 'Oct-We'),
(347, '60', 8, 'containers', '3000', 'new stock', 1, 'serv-img2.jpg', 'Oct-We'),
(348, '60', 11, 'cargo plane', '7000', 'new stock', 11, 'work12.jpg', 'Oct-We'),
(349, '60', 5, 'bus', '3000', 'new stock', 1, 'serv-img1.jpg', 'Oct-We'),
(350, '60', 5, 'bus', '3000', 'new stock', 1, 'serv-img1.jpg', 'Oct-We'),
(351, '60', 5, 'bus', '3000', 'new stock', 1, 'serv-img1.jpg', 'Oct-We'),
(352, '60', 5, 'bus', '3000', 'new stock', 1, 'serv-img1.jpg', 'Oct-We'),
(353, '60', 5, 'bus', '3000', 'new stock', 1, 'serv-img1.jpg', 'Oct-We'),
(354, '60', 8, 'containers', '3000', 'new stock', 1, 'serv-img2.jpg', 'Oct-We'),
(355, '60', 8, 'containers', '3000', 'new stock', 11, 'serv-img2.jpg', 'Oct-We'),
(356, '60', 12, 'cargo plane', '7000', 'new stock', 134, 'banner1-3.jpg', 'Oct-We'),
(357, '60', 11, 'cargo plane', '7000', 'new stock', 1, 'work12.jpg', 'Oct-We'),
(358, '60', 8, 'containers', '3000', 'new stock', 1, 'serv-img2.jpg', 'Oct-We'),
(359, '60', 8, 'containers', '3000', 'new stock', 1, 'serv-img2.jpg', 'Oct-We'),
(360, '60', 8, 'containers', '3000', 'new stock', -1, 'serv-img2.jpg', 'Oct-We'),
(361, '49', 5, 'bus', '3000', 'new stock', 1, 'serv-img1.jpg', 'Oct-We'),
(362, '49', 8, 'containers', '3000', 'new stock', 11, 'serv-img2.jpg', 'Oct-We'),
(363, '49', 5, 'bus', '3000', 'new stock', 11, 'serv-img1.jpg', 'Oct-We'),
(364, '49', 5, 'bus', '3000', 'new stock', 2, 'serv-img1.jpg', 'Oct-We'),
(365, '49', 7, 'cargo train', '3009890', 'old stco', 5, 'banner1-4.jpg', 'Oct-We'),
(366, '49', 6, 'vesel', '7000', 'new stock', 4, 'work8.jpg', 'Oct-We'),
(367, '49', 8, 'containers', '3000', 'new stock', 11, 'serv-img2.jpg', 'Oct-We'),
(368, '49', 12, 'cargo plane', '7000', 'new stock', 4, 'banner1-3.jpg', 'Oct-We'),
(369, '53', 8, 'containers', '3000', 'new stock', 3, 'serv-img2.jpg', 'Oct-We'),
(370, '49', 8, 'containers', '3000', 'new stock', 3, 'serv-img2.jpg', 'Oct-We'),
(371, '49', 9, 'articulated veh', '3000', 'new stock', 3, 'banner1-1.jpg', 'Oct-We'),
(372, '49', 12, 'cargo plane', '7000', 'new stock', 11, 'banner1-3.jpg', 'Oct-We'),
(373, '60', 5, 'bus', '3000', 'new stock', 4, 'serv-img1.jpg', 'Oct-We');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_codes`
--

CREATE TABLE `tbl_codes` (
  `id` int(11) NOT NULL,
  `user_id` int(20) NOT NULL,
  `email` varchar(10) NOT NULL,
  `code` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_codes`
--

INSERT INTO `tbl_codes` (`id`, `user_id`, `email`, `code`) VALUES
(9, 48, 'miller@gma', '8355'),
(10, 1, 'enakpomill', '4590'),
(11, 1, 'enakpomill', '939'),
(12, 1, 'enakpomill', '943'),
(13, 1, 'enakpomill', '252'),
(14, 1, 'enakpomill', '2918'),
(15, 1, 'brown@yaho', '3689'),
(16, 1, 'mike@examp', '3147'),
(17, 1, 'jerry@gmai', '1102'),
(18, 1, 'duff@gmail', '119'),
(19, 1, 'ribbeca@gm', '6204');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_comment`
--

CREATE TABLE `tbl_comment` (
  `id` int(11) NOT NULL,
  `prod_id` int(20) NOT NULL,
  `prod_title` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `body` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_comment`
--

INSERT INTO `tbl_comment` (`id`, `prod_id`, `prod_title`, `name`, `body`) VALUES
(4, 5, 'bus', 'okon simon', '<p>this product did not last for me</p>\r\n'),
(5, 12, 'cargo plane', 'miller', '<p>like like flying first class</p>\r\n'),
(6, 12, 'cargo plane', 'miller daniel ', '<p>the one i like has finished</p>\r\n'),
(7, 12, 'cargo plane', 'emedion okon silas', '<p>the new product is in town</p>\r\n'),
(9, 9, 'articulated veh', 'miller daniel ', '<p>the comment is very bad on that product</p>\r\n'),
(10, 9, 'articulated veh', 'philips jacobs', '<p>the game is on</p>\r\n'),
(12, 11, 'cargo plane', 'miller', '<p>the long train</p>\r\n'),
(13, 11, 'cargo plane', 'philips jacobs', '<p>the new product</p>\r\n'),
(14, 11, 'cargo plane', 'philips jacobs', '<p>the new product</p>\r\n'),
(17, 6, 'vesel', 'emedion okon silas', '<p>the new style is here</p>\r\n'),
(18, 7, 'cargo train', 'francisca', '<p>the train is very long</p>\r\n'),
(19, 9, 'articulated veh', 'miller daniel ', '<p>the long vehicle</p>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_country`
--

CREATE TABLE `tbl_country` (
  `id` int(11) NOT NULL,
  `country` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_country`
--

INSERT INTO `tbl_country` (`id`, `country`) VALUES
(1, 'nigeria'),
(2, 'ghana'),
(3, 'cameroon'),
(4, 'uganda'),
(5, 'United State Of Amer'),
(6, 'England'),
(7, 'UAE'),
(8, 'SENIGAL'),
(9, 'SAUDI ARABIA'),
(10, 'BENIN REPUBLIC'),
(11, 'IVORY COAST'),
(12, 'SOUTH AFRICA'),
(13, 'MALAWI'),
(14, 'SCOT LAND'),
(15, 'ICE LAND'),
(16, 'FIN LAND'),
(17, 'EGYPT'),
(18, 'ISREAL'),
(20, 'MEXICO'),
(26, 'ALGERIA'),
(32, 'ghana'),
(33, 'MEXICO'),
(38, 'RUSIA'),
(40, 'RUSIA'),
(45, 'UKRAIN'),
(54, 'CONGO'),
(56, 'BRAZIL'),
(68, 'ZIMBABWE'),
(72, 'RWANDA'),
(73, 'VENIZUELLA'),
(74, 'DENMARK'),
(75, 'SWEEDEN'),
(76, 'INDIA'),
(77, 'SOMALIA'),
(78, 'COLOMBIA'),
(79, 'KENYA'),
(80, 'SUDAN'),
(81, 'CHINA'),
(82, 'JAPAN'),
(83, 'ETHIOPIA'),
(84, 'IRAQ'),
(85, 'MORROCO'),
(86, 'AUSTRAILIA'),
(87, 'GERMANY'),
(88, 'BELGIUM'),
(89, 'ZAMBIA'),
(90, 'THAILAND'),
(91, 'KATALONIA'),
(92, 'TANZANIA'),
(98, 'CYPRUS'),
(99, 'HO;;AND'),
(101, 'JAMAICA'),
(103, 'CYPRUS'),
(104, 'LIBERIA'),
(105, 'EGYPT'),
(106, 'NORTH KOREA'),
(107, 'SOUTH KOREA'),
(108, 'EQUADO'),
(109, 'CUBAN'),
(110, 'MADAGASCA'),
(111, 'BIAFRA'),
(112, 'PERU'),
(113, 'ANGOLA'),
(114, 'ROMANIA'),
(115, 'ANGOLA'),
(116, 'NAMEBIA'),
(117, 'SOUTH SUDAN');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `id` int(11) NOT NULL,
  `userfile` varchar(100) NOT NULL,
  `prod_name` varchar(15) NOT NULL,
  `prod_price` varchar(15) NOT NULL,
  `prod_brand` varchar(15) NOT NULL,
  `created_at` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`id`, `userfile`, `prod_name`, `prod_price`, `prod_brand`, `created_at`) VALUES
(4, 'service1.jpg', 'truck', '7000', 'new stock', 'Sep-Sun-20'),
(5, 'serv-img1.jpg', 'bus', '3000', 'new stock', 'Sep-Sun-20'),
(6, 'work8.jpg', 'vesel', '7000', 'new stock', 'Sep-Sun-20'),
(7, 'banner1-4.jpg', 'cargo train', '3009890', 'old stco', 'Sep-Sun-20'),
(8, 'serv-img2.jpg', 'containers', '3000', 'new stock', 'Sep-Sun-20'),
(9, 'banner1-1.jpg', 'articulated veh', '3000', 'new stock', 'Sep-Sun-20'),
(10, 'work5.jpg', 'jet plane', '3000', 'new stock', 'Sep-Sun-20'),
(11, 'work12.jpg', 'cargo plane', '7000', 'new stock', 'Sep-Mon-20'),
(12, 'banner1-3.jpg', 'cargo plane', '7000', 'new stock', 'Sep-Tue-20');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_shipping`
--

CREATE TABLE `tbl_shipping` (
  `id` int(11) NOT NULL,
  `user_id` int(10) NOT NULL,
  `s_name` varchar(20) NOT NULL,
  `s_email` varchar(50) NOT NULL,
  `s_country` varchar(15) NOT NULL,
  `s_state` varchar(15) NOT NULL,
  `s_land_mass` varchar(50) NOT NULL,
  `current_location` varchar(100) NOT NULL,
  `created_at` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_shipping`
--

INSERT INTO `tbl_shipping` (`id`, `user_id`, `s_name`, `s_email`, `s_country`, `s_state`, `s_land_mass`, `current_location`, `created_at`) VALUES
(93, 53, 'simon anthony', 'enakpomiller8899@gmail.com', 'ICE LAND', 'new york', 'west side', 'Senigal border', '29:02am'),
(103, 53, 'simon anthony', 'miller@nugitech.com', 'SOUTH AFRICA', 'new york', 'west side', 'Senigal border', '32:16pm'),
(104, 60, 'simon anthony', 'miller@nugitech.com', 'cameroon', 'new york', 'west side', 'CARIBEAN SEA', '34:11pm'),
(105, 60, 'joshua denis', 'enakpomiller@gmail.com', 'ICE LAND', 'new york', 'Kumasi', 'CARIBEAN SEA', '49:32pm'),
(106, 60, 'simon anthony', 'miller@nugitech.com', 'FIN LAND', 'new york', 'west side', 'CARIBEAN SEA', '57:00pm'),
(107, 60, 'simon anthony', 'enakpomiller8899@gmail.com', 'ICE LAND', 'new york', 'west side', 'CARIBEAN SEA', '47:44pm'),
(108, 60, 'simon anthony', 'enakpomiller8899@gmail.com', 'SAUDI ARABIA', 'new york', 'Kumasi', 'CARIBEAN SEA', '50:59pm'),
(109, 60, 'simon anthony', 'enakpomiller8899@gmail.com', 'ICE LAND', 'new york', 'Kumasi', 'CARIBEAN SEA', '54:14pm'),
(110, 60, 'simon anthony', 'enakpomiller8899@gmail.com', 'SCOT LAND', 'benin', 'west side', 'CARIBEAN SEA', '02:00pm'),
(111, 60, 'simon anthony', 'enakpomiller8899@gmail.com', 'SCOT LAND', 'new york', 'west side', 'CARIBEAN SEA', '12:16pm'),
(112, 60, 'simon anthony', 'enakpomiller8899@gmail.com', 'England', 'new york', 'west side', 'CARIBEAN SEA', '15:30pm'),
(113, 53, 'simon anthony', 'adarikumicheal@mail.com', 'EGYPT', 'new york', 'west side', 'Senigal border', '01:13pm'),
(114, 60, 'simon anthony', 'enakpomiller8899@gmail.com', 'ICE LAND', 'new york', 'west side', 'CARIBEAN SEA', '44:21pm'),
(115, 49, 'joshua denis', 'enakpomiller8899@gmail.com', 'ICE LAND', 'benin', 'west side', 'UGANDA', '42:58am'),
(116, 49, 'simon anthony', 'enakpomiller8899@gmail.com', 'MEXICO', 'new york', 'west side', 'UGANDA', '43:33am'),
(117, 53, 'tammy golden', 'enakpomiller8899@gmail.com', 'ICE LAND', 'new york', 'west side', 'Senigal border', '29:38am'),
(118, 62, 'tammy golden', 'enakpomiller8899@gmail.com', 'SCOT LAND', 'mogadushu', 'west side', '', '04:26pm');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `country` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `verify_code` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `userfile` varchar(100) NOT NULL,
  `date` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `name`, `country`, `email`, `verify_code`, `password`, `userfile`, `date`) VALUES
(48, 'philips jacobs', 'Nigeria', 'miller@gmail.com', '3142', 'admin', '', '2021-08-15'),
(49, 'francisca', '', 'enakpomiller@gmail.com', '44268', 'c93ccd78b2076528346216b3b2f701e6', 'IMG-20190911-WA0000.jpg', NULL),
(53, 'emedion okon silas', '', 'enakpomiller8899@gmail.com', '7695', '21232f297a57a5a743894a0e4a801fc3', 'IMG-20190806-WA0001.jpg', '2021-08-15'),
(54, 'emedion okon silas', '', 'brown@yahoo.com', '', 'admin', 'cust-img4.jpg', '2021-08-30'),
(55, 'joshua uzor', '', 'mike@example.com', '', 'admin', 'team1.jpg', '2021-08-24'),
(56, 'jerry agbama', '', 'jerry@gmail.com', '', 'admin', 'IMG-20190806-WA0002.jpg', '2021-09-28'),
(57, 'mr duff isreal', 'MALAWI', 'duff@gmail.com', '', 'admin', 'IMG-20190806-WA0002.jpg', '2021-09-28'),
(58, 'ribbeca', 'nigeria', 'ribbeca@gmail.com', '', 'admin', 'IMG-20190726-WA0000.jpg', ''),
(59, 'ekon hope', 'FIN LAND', 'ekong@gmail.com', '', 'admin', 'IMG-20190726-WA0000.jpg', '2021-09-30'),
(60, 'samuel thompson', 'uganda', 'sam@gmail.com', '', 'c93ccd78b2076528346216b3b2f701e6', 'IMG-20190806-WA0002.jpg', '2021-10-09'),
(61, 'julius anagwana', 'BENIN REPUBLIC', 'julius@gmai.com', '', 'c93ccd78b2076528346216b3b2f701e6', 'IMG-20190726-WA0000.jpg', '2021-10-09'),
(62, 'chiburo okafor', 'United State Of Amer', 'buzor@gmail.com', '', 'c93ccd78b2076528346216b3b2f701e6', 'IMG-20190726-WA0000.jpg', '2021-10-20');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users_shipment`
--

CREATE TABLE `tbl_users_shipment` (
  `id` int(11) NOT NULL,
  `user_id` int(100) NOT NULL,
  `tracking_code` varchar(100) NOT NULL,
  `current_country` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_users_shipment`
--

INSERT INTO `tbl_users_shipment` (`id`, `user_id`, `tracking_code`, `current_country`) VALUES
(3, 2, '0', ''),
(4, 60, '0', ''),
(5, 60, 'SkJCFkd8yh', ''),
(6, 60, 'aL5rGFZ000', ''),
(7, 53, 'tnjAVIKXgi', ''),
(8, 49, 'aZmYJzrlZj', ''),
(9, 53, '8raFlPhDzV', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tagslist`
--
ALTER TABLE `tagslist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_codes`
--
ALTER TABLE `tbl_codes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_comment`
--
ALTER TABLE `tbl_comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_country`
--
ALTER TABLE `tbl_country`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_shipping`
--
ALTER TABLE `tbl_shipping`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_users_shipment`
--
ALTER TABLE `tbl_users_shipment`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tagslist`
--
ALTER TABLE `tagslist`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=374;
--
-- AUTO_INCREMENT for table `tbl_codes`
--
ALTER TABLE `tbl_codes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `tbl_comment`
--
ALTER TABLE `tbl_comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `tbl_country`
--
ALTER TABLE `tbl_country`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=118;
--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `tbl_shipping`
--
ALTER TABLE `tbl_shipping`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=119;
--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;
--
-- AUTO_INCREMENT for table `tbl_users_shipment`
--
ALTER TABLE `tbl_users_shipment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

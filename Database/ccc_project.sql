-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 18, 2021 at 06:37 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ccc_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adminId` int(5) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `createdDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminId`, `username`, `password`, `status`, `createdDate`) VALUES
(3, 'RenilSoni123', 'd41d8cd98f00b204e9800998ecf8427e', 1, '2021-02-25 05:38:07'),
(8, 'Vaibhav', '202cb962ac59075b964b07152d234b70', 1, '2021-03-07 05:16:34'),
(13, '258', 'd41d8cd98f00b204e9800998ecf8427e', 1, '2021-03-15 13:29:24'),
(14, '1111', 'd41d8cd98f00b204e9800998ecf8427e', 1, '2021-03-15 13:35:42'),
(18, '2212', 'd41d8cd98f00b204e9800998ecf8427e', 0, '2021-03-16 04:48:49');

-- --------------------------------------------------------

--
-- Table structure for table `attribute`
--

CREATE TABLE `attribute` (
  `attributeId` int(11) NOT NULL,
  `entityTypeId` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `code` varchar(50) NOT NULL,
  `inputType` varchar(50) NOT NULL,
  `backendType` varchar(50) NOT NULL,
  `sortOrder` tinyint(1) NOT NULL,
  `backendModel` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `attribute`
--

INSERT INTO `attribute` (`attributeId`, `entityTypeId`, `name`, `code`, `inputType`, `backendType`, `sortOrder`, `backendModel`) VALUES
(18, 'Product', 'COLOR', 'color', 'select', 'varchar', 1, ''),
(19, 'Product', 'Brand', 'brand', 'checkbox', 'varchar', 3, ''),
(20, 'Product', 'SDD', 'sdd', 'text', 'varchar', 4, ''),
(21, 'Product', 'EEE', 'eee', 'radio', 'int', 5, '');

-- --------------------------------------------------------

--
-- Table structure for table `attribute_option`
--

CREATE TABLE `attribute_option` (
  `optionId` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `sortOrder` tinyint(1) NOT NULL,
  `attributeId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `attribute_option`
--

INSERT INTO `attribute_option` (`optionId`, `name`, `sortOrder`, `attributeId`) VALUES
(17, '8', 8, 1),
(18, '1', 1, 3),
(19, '2', 2, 3),
(20, '3', 3, 3),
(21, '4', 4, 3),
(22, '5', 5, 3),
(23, '1', 1, 4),
(24, '2', 2, 4),
(25, '3', 3, 4),
(26, '4', 4, 4),
(27, '6', 6, 1),
(28, '1', 1, 5),
(29, '2', 2, 5),
(30, '3', 3, 5),
(31, '4', 4, 5),
(32, '9', 9, 1),
(33, '1', 1, 9),
(35, '18 Inch', 1, 16),
(36, '19 Inch', 2, 16),
(37, '20 Inch', 3, 16),
(38, '21 Inch', 4, 16),
(39, '22 Inch', 5, 16),
(40, 'Red', 1, 18),
(41, 'Blue', 2, 18),
(42, 'Black', 3, 18),
(43, 'Brown', 4, 18),
(44, 'White', 5, 18),
(45, 'Puma', 1, 19),
(46, 'Addidas', 2, 19),
(47, 'Nike', 3, 19),
(48, 'A', 1, 21),
(49, 'B', 2, 21),
(50, 'C', 3, 21),
(51, 'D', 4, 21);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `categoryId` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `description` text NOT NULL,
  `parentId` int(5) NOT NULL,
  `path` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`categoryId`, `name`, `status`, `description`, `parentId`, `path`) VALUES
(1, 'Bedroom', 1, 'Bedroom            ', 0, '1'),
(2, 'Living Room', 1, 'Living Room            ', 0, '2'),
(3, 'Dining & Kitchen', 1, 'Dining & Kitchen            ', 0, '3'),
(4, 'Office', 1, 'Office            ', 0, '4'),
(5, 'Bar & Game Room', 1, 'Bar & Game Room            ', 0, '5'),
(6, 'Accessories', 1, 'Accessories            ', 0, '6'),
(7, 'Outdoor', 1, 'Outdoor            ', 0, '7'),
(8, 'Entry & Mudroom', 1, 'Entry & Mudroom            ', 0, '8'),
(9, 'Bedroom Sets', 1, 'Bedroom Sets            ', 1, '1-9'),
(10, 'Beds', 1, 'Beds            ', 1, '1-10'),
(11, 'Nightstands', 1, '        Nightstands\r\n                ', 1, '1-11'),
(12, 'Dressers', 1, 'Dressers\r\n            ', 1, '1-12'),
(13, 'Dresser Mirrors', 1, 'Dresser Mirrors\r\n            ', 1, '1-13'),
(14, 'Chests', 1, 'Chests\r\n            ', 1, '1-14'),
(15, 'Bedroom Benches', 1, 'Bedroom Benches\r\n            ', 1, '1-15'),
(16, 'Bed Frames & Headboards', 1, 'Bed Frames & Headboards\r\n            ', 1, '1-16'),
(17, 'Armoires and Wardrobes', 1, 'Armoires and Wardrobes\r\n            ', 1, '1-17'),
(18, 'Bedroom Vanities', 1, 'Bedroom Vanities\r\n            ', 1, '1-18'),
(19, 'Media Chests', 1, 'Media Chests\r\n', 1, '1-19'),
(20, 'Jewelry Armoires', 1, 'Jewelry Armoires\r\n         ', 1, '1-20'),
(21, 'Day Beds and Futons', 1, 'Day Beds and Futons\r\n            ', 1, '1-21'),
(22, 'Kids Room', 1, 'Kids Room\r\n            ', 1, '1-22'),
(23, 'Kids and Youth Furniture', 1, 'Kids and Youth Furniture\r\n            ', 1, '1-23'),
(24, 'Baby Furniture', 1, 'Baby Furniture\r\n            ', 1, '1-24'),
(25, 'Mattresses', 1, 'Mattresses\r\n            ', 1, '1-25'),
(26, 'Box Springs & Foundations', 1, 'Box Springs & Foundations\r\n            ', 1, '1-26'),
(27, 'Adjustable Beds', 1, 'Adjustable Beds\r\n            ', 1, '1-27'),
(28, 'Pillows', 1, 'Pillows\r\n            ', 1, '1-28'),
(29, 'Bedding and Comforter Sets', 1, 'Bedding and Comforter Sets\r\n            ', 1, '1-29'),
(30, 'Living Room Sets', 1, 'Living Room Sets\r\n            ', 2, '2-30'),
(31, 'Sectionals', 1, 'Sectionals\r\n            ', 2, '2-31'),
(32, 'Sofas', 1, 'Sofas\r\n            ', 2, '2-32'),
(33, 'Loveseats', 1, 'Loveseats\r\n            ', 2, '2-33'),
(34, 'Reclining Loveseats', 1, 'Reclining Loveseats\r\n            ', 2, '2-34'),
(35, 'Sleeper Sofas', 1, 'Sleeper Sofas\r\n            ', 2, '2-35'),
(36, 'Recliners and Rockers', 1, 'Recliners and Rockers\r\n            ', 2, '2-36'),
(37, 'Theater Seating', 1, 'Theater Seating\r\n            ', 2, '2-37'),
(38, 'Chairs', 1, 'Chairs\r\n            ', 2, '2-38'),
(39, 'Accent Chairs', 1, 'Accent Chairs\r\n            ', 2, '2-39'),
(40, 'Chaises', 1, ' Chaises\r\n           ', 2, '2-40'),
(41, 'Ottomans', 1, 'Ottomans\r\n           ', 2, '2-41'),
(42, 'Futons', 1, 'Futons\r\n', 2, '2-42'),
(43, 'Leather Furniture', 1, 'Leather Furniture\r\n            ', 2, '2-43'),
(44, 'Occasional Table Sets', 1, 'Occasional Table Sets\r\n            ', 2, '2-44'),
(45, 'Sofa Tables', 1, ' Sofa Tables\r\n           ', 2, '2-45'),
(46, 'Accent Chests and Cabinets', 1, 'Accent Chests and Cabinets\r\n            ', 2, '2-46'),
(47, 'Console Tables', 1, 'Console Tables\r\n            ', 2, '2-47'),
(48, 'Coffee and Cocktail Tables', 1, 'Coffee and Cocktail Tables\r\n            ', 2, '2-48'),
(49, 'End Tables', 1, 'End Tables\r\n           ', 2, '2-49'),
(50, 'Accent Tables', 1, 'Accent Tables\r\n            ', 2, '2-50'),
(51, 'Side Tables', 1, 'Side Tables\r\n            ', 2, '2-51'),
(52, 'Rugs and Accessories', 1, 'Rugs and Accessories\r\n            ', 2, '2-52'),
(53, 'Entertainment Centers and Walls', 1, 'Entertainment Centers and Walls\r\n            ', 2, '2-53'),
(54, 'TV Stands and TV Consoles', 1, 'TV Stands and TV Consoles\r\n            ', 2, '2-54'),
(55, 'CD and DVD Media Storage', 1, 'CD and DVD Media Storage\r\n            ', 2, '2-55'),
(56, 'Dining Sets', 1, 'Dining Sets\r\n            ', 3, '3-56'),
(57, 'Dinette Sets', 1, 'Dinette Sets\r\n            ', 3, '3-57'),
(58, 'Dining Chairs', 1, 'Dining Chairs\r\n            ', 3, '3-58'),
(59, 'Dining Tables', 1, 'Dining Tables\r\n            ', 3, '3-59'),
(60, 'Dining Benches', 1, 'Dining Benches\r\n            ', 3, '3-60'),
(61, 'China Cabinets', 1, 'China Cabinets\r\n            ', 3, '3-61'),
(62, 'Curios & Displays', 1, 'Curios & Displays\r\n            ', 3, '3-62'),
(63, 'Kitchen Island, Kitchen Cart', 1, 'Kitchen Island, Kitchen Cart\r\n           ', 3, '3-63'),
(64, 'Servers, Sideboards & Buffets', 1, 'Servers, Sideboards & Buffets\r\n            ', 3, '3-64'),
(65, 'Home Office Sets', 1, 'Home Office Sets\r\n            ', 4, '4-65'),
(66, 'Office Chairs', 1, 'Office Chairs\r\n            ', 4, '4-66'),
(67, 'Desks & Hutches', 1, 'Desks & Hutches\r\n            ', 4, '4-67'),
(68, 'Modular Office Furniture', 1, 'Modular Office Furniture\r\n            ', 4, '4-68'),
(69, 'Conference Room', 1, 'Conference Room\r\n', 4, '4-69'),
(70, 'Filing Cabinets and Storage', 1, 'Filing Cabinets and Storage\r\n            ', 4, '4-70'),
(71, 'Bookcases, Book Shelves', 1, 'Bookcases, Book Shelves\r\n            ', 4, '4-71'),
(72, 'Office Accessories', 1, 'Office Accessories\r\n            ', 4, '4-72'),
(73, 'Miscellaneous', 1, 'Miscellaneous\r\n            ', 4, '4-73'),
(74, 'Home Bar Sets', 1, 'Home Bar Sets\r\n            ', 5, '5-74'),
(75, 'Bistro and Bar Table Sets', 1, 'Bistro and Bar Table Sets\r\n            ', 5, '5-75'),
(76, 'Game Table Sets', 1, 'Game Table Sets\r\n            ', 5, '5-76'),
(77, 'Bar Tables and Pub Tables', 1, 'Bar Tables and Pub Tables\r\n            ', 5, '5-77'),
(78, 'Barstools', 1, 'Barstools\r\n            ', 5, '5-78'),
(79, 'Wine Racks', 1, 'Wine Racks\r\n            ', 5, '5-79'),
(80, 'Game Tables', 1, ' Game Tables\r\n           ', 5, '5-80'),
(81, 'Game Room Chairs', 1, 'Game Room Chairs\r\n           ', 5, '5-81'),
(82, 'Bar and Wine Cabinets', 1, 'Bar and Wine Cabinets\r\n            ', 5, '5-82'),
(83, 'Rugs', 1, 'Rugs\r\n            ', 6, '6-83'),
(84, 'Wall Art', 1, 'Wall Art\r\n            ', 6, '6-84'),
(85, 'Accent and Storage Benches', 1, 'Accent and Storage Benches\r\n            ', 6, '6-85'),
(86, 'Accent Mirrors', 1, 'Accent Mirrors\r\n            ', 6, '6-86'),
(87, 'Curios', 1, 'Curios\r\n            ', 6, '6-87'),
(88, 'Pillows and Throws', 1, 'Pillows and Throws\r\n            ', 6, '6-88'),
(89, 'Decorative Accessories', 1, 'Decorative Accessories\r\n            ', 6, '6-89'),
(90, 'Entryway Furniture', 1, 'Entryway Furniture\r\n            ', 6, '6-90'),
(91, 'Storage and Organization', 1, 'Storage and Organization\r\n            ', 6, '6-91'),
(92, 'Etageres', 1, 'Etageres\r\n            ', 6, '6-92'),
(93, 'Clocks', 1, 'Clocks\r\n            ', 6, '6-93'),
(94, 'Artificial Plants', 1, 'Artificial Plants\r\n            ', 6, '6-94'),
(95, 'Picture Frames', 1, 'Picture Frames\r\n            ', 6, '6-95'),
(96, 'Lighting', 1, 'Lighting\r\n            ', 6, '6-96'),
(97, 'Desk and Buffet Lamps', 1, 'Desk and Buffet Lamps\r\n            ', 6, '6-97'),
(98, 'Lamp Sets', 1, 'Lamp Sets\r\n            ', 6, '6-98'),
(99, 'Floor Lamps', 1, 'Floor Lamps\r\n            ', 6, '6-99'),
(100, 'Pendant Lighting', 1, 'Pendant Lighting\r\n            ', 6, '6-100'),
(101, 'Wall Sconces', 1, 'Wall Sconces\r\n            ', 6, '6-101'),
(102, 'Bathroom Furniture', 1, 'Bathroom Furniture\r\n            ', 6, '6-102'),
(103, 'Outdoor Conversation Sets', 1, 'Outdoor Conversation Sets\r\n            ', 7, '7-103'),
(104, 'Outdoor Dining Furniture', 1, 'Outdoor Dining Furniture\r\n            ', 7, '7-104'),
(105, 'Outdoor Tables', 1, 'Outdoor Tables\r\n            ', 7, '7-105'),
(106, 'Outdoor Chairs', 1, 'Outdoor Chairs\r\n            ', 7, '7-106'),
(107, 'Outdoor Sofas & Loveseats', 1, 'Outdoor Sofas & Loveseats            ', 7, '7-107'),
(108, 'Outdoor Chaise Loungers', 1, 'Outdoor Chaise Loungers\r\n            ', 7, '7-108'),
(109, 'Outdoor Bar Furniture', 1, 'Outdoor Bar Furniture\r\n            ', 7, '7-109'),
(110, 'Outdoor Accessories', 1, 'Outdoor Accessories\r\n            ', 7, '7-110'),
(111, 'Outdoor Fireplaces', 1, 'Outdoor Fireplaces\r\n            ', 7, '7-111'),
(112, 'Outdoor Benches', 1, 'Outdoor Benches\r\n            ', 7, '7-112'),
(113, 'Outdoor Ottomans', 1, 'Outdoor Ottomans\r\n            ', 7, '7-113'),
(114, 'Console Tables', 1, 'Console Tables\r\n            ', 8, '8-114'),
(115, 'Storage Benches', 1, 'Storage Benches\r\n            ', 8, '8-115'),
(116, 'Hall Trees', 1, 'Hall Trees\r\n            ', 8, '8-116'),
(117, 'Coat Racks', 1, 'Coat Racks\r\n            ', 8, '8-117');

-- --------------------------------------------------------

--
-- Table structure for table `cms_page`
--

CREATE TABLE `cms_page` (
  `pageId` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `identifier` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `createdDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cms_page`
--

INSERT INTO `cms_page` (`pageId`, `title`, `identifier`, `content`, `status`, `createdDate`) VALUES
(1, 'AAA', '123', '<p><b>123</b></p>', 1, '2021-03-07 13:55:58'),
(4, 'QQQQ', '234', '<p><u>245678</u></p>', 0, '2021-03-09 04:38:03'),
(7, '45', '545', '<p>4545</p>', 0, '2021-03-16 06:24:41');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customerId` int(11) NOT NULL,
  `firstName` varchar(50) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `password` varchar(40) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `createdDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `updatedDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `groupId` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customerId`, `firstName`, `lastName`, `email`, `mobile`, `password`, `status`, `createdDate`, `updatedDate`, `groupId`) VALUES
(1, 'Shraddha', 'Thakka', 'shraddha@gmail.com', '123', 'd41d8cd98f00b204e9800998ecf8427e', 1, '2021-02-16 05:48:27', '2021-03-07 07:22:59', 1),
(24, '5454545', '123', '1234', '123', 'd41d8cd98f00b204e9800998ecf8427e', 1, '2021-03-12 10:06:50', '2021-03-16 05:13:58', 11),
(26, '1', '33333', '1', '1', 'd41d8cd98f00b204e9800998ecf8427e', 1, '2021-03-14 17:44:07', '2021-03-16 05:05:41', 11),
(30, '12345', '', '', '', 'd41d8cd98f00b204e9800998ecf8427e', 0, '2021-03-16 05:13:30', '2021-03-16 05:13:50', 1);

-- --------------------------------------------------------

--
-- Table structure for table `customer_address`
--

CREATE TABLE `customer_address` (
  `addressId` int(5) NOT NULL,
  `address` text NOT NULL,
  `city` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `zipcode` varchar(10) NOT NULL,
  `country` varchar(100) NOT NULL,
  `addressType` tinyint(1) NOT NULL,
  `customerId` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer_address`
--

INSERT INTO `customer_address` (`addressId`, `address`, `city`, `state`, `zipcode`, `country`, `addressType`, `customerId`) VALUES
(1, '                                        Dunavada   123                      ', 'patan', 'gujarat123', '385340', 'india', 1, 1),
(2, '                        SG highway   123         ', 'ahmedabad1', 'rj123', '380009', 'ind', 2, 1),
(8, '        radhanpur123                    ', 'ptn', 'Gujarat123', '385340', 'India', 1, 2),
(9, '        Deesa            1313    ', 'bk', 'Gujarat', '385340', 'India', 2, 2),
(10, 'Rajka vado           ', 'Patan', 'GJ', '258965', 'IND', 1, 19),
(11, 'PG', 'AHM', 'GJ', '741258', 'IND', 2, 19),
(12, '', '', '', '', '', 1, 19),
(13, '', '', '', '', '', 2, 19),
(14, 'Rajka vado', 'Patan', 'GJ', '258965', 'India', 1, 20),
(15, 'PG', 'AHM', 'GJ', '741258', 'India', 2, 20),
(16, '', '', '', '', '', 1, 21),
(17, '', '', '', '', '', 2, 21),
(18, 'radhanpur', 'radhanpur', 'Gujarat', '385340', 'India', 1, 22),
(19, 'Ahmedabad', 'AHM', 'GJ', '741258', 'India', 2, 22),
(20, 'radhanpur', 'radhanpur', 'Gujarat', '385340', 'India', 1, 23),
(21, 'PG', 'AHM', 'GJ', '741258', 'India', 2, 23),
(22, '1            ', '1', '1', '1', '1', 1, 24),
(23, '2            ', '2', '2', '2', '2', 2, 24),
(24, '', '', '', '', '', 1, 25),
(25, '', '', '', '', '', 2, 25),
(26, '      1      ', '1', '1', '1', '1', 1, 26),
(27, '    1        ', '1', '1', '1', '1', 2, 26),
(28, '            ', '', '', '', '', 1, 27),
(29, '            ', '', '', '', '', 2, 27),
(30, '', '', '', '', '', 1, 27),
(31, '', '', '', '', '', 2, 27),
(32, '', '', '', '', '', 1, 27),
(33, '', '', '', '', '', 2, 27),
(34, 'Deesa', 'Deesa', 'Gujarat', '385340', 'India', 1, 28),
(35, 'Ahmedabad', 'AHM', 'GJ', '741258', 'India', 2, 28),
(36, 'radhanpur', 'radhanpur', 'Gujarat', '385340', 'India', 1, 29),
(37, 'Deesa', 'Deesa', 'Gujarat', '385340', 'India', 2, 29),
(38, '', '', '', '', '', 1, 2),
(39, '', '', '', '', '', 2, 2),
(40, '', '', '', '', '', 1, 2),
(41, '', '', '', '', '', 2, 2),
(42, '', '', '', '', '', 1, 2),
(43, '', '', '', '', '', 2, 2),
(44, '', '', '', '', '', 1, 2),
(45, '', '', '', '', '', 2, 2),
(46, '            ', '', '', '3333', '', 1, 30),
(47, '            ', '', '', '333', '', 2, 30);

-- --------------------------------------------------------

--
-- Table structure for table `customer_group`
--

CREATE TABLE `customer_group` (
  `groupId` int(5) NOT NULL,
  `name` varchar(100) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `createdDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer_group`
--

INSERT INTO `customer_group` (`groupId`, `name`, `status`, `createdDate`) VALUES
(1, 'Wholeshaller', 1, '2021-03-02 10:44:21'),
(3, 'Retailer', 1, '2021-03-02 10:49:11'),
(11, 'ABC', 0, '2021-03-10 10:12:05');

-- --------------------------------------------------------

--
-- Table structure for table `customer_group_price`
--

CREATE TABLE `customer_group_price` (
  `entityId` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `customerGroupId` int(11) NOT NULL,
  `groupPrice` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer_group_price`
--

INSERT INTO `customer_group_price` (`entityId`, `productId`, `customerGroupId`, `groupPrice`) VALUES
(1, 49, 1, 222),
(2, 49, 3, 222),
(3, 49, 11, 222),
(4, 44, 1, 100),
(5, 44, 3, 200),
(6, 44, 11, 300),
(7, 57, 1, 333),
(8, 57, 3, 222),
(9, 57, 11, 111),
(10, 57, 1, 333),
(11, 57, 3, 222),
(12, 57, 11, 111),
(13, 58, 1, 333),
(14, 58, 3, 222),
(15, 58, 11, 111);

-- --------------------------------------------------------

--
-- Table structure for table `payment_method`
--

CREATE TABLE `payment_method` (
  `methodId` int(5) NOT NULL,
  `name` varchar(50) NOT NULL,
  `code` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `createdDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment_method`
--

INSERT INTO `payment_method` (`methodId`, `name`, `code`, `description`, `status`, `createdDate`) VALUES
(1, 'Renil', 'RENIL', 'Patan', 0, '2021-02-17 06:44:12'),
(2, 'Vaibhav', 'VAI', 'DEESA', 0, '2021-02-17 06:44:27'),
(4, 'SED', 'WER$', 'ABADSDF', 1, '2021-02-18 06:13:41'),
(20, '64646', '4554', '', 0, '2021-03-16 05:15:45');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `productId` int(11) NOT NULL,
  `sku` varchar(15) NOT NULL,
  `name` varchar(50) NOT NULL,
  `price` double NOT NULL,
  `discount` float NOT NULL,
  `quantity` int(11) NOT NULL,
  `description` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `createdDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `updatedDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `color` varchar(255) DEFAULT NULL,
  `brand` varchar(255) DEFAULT NULL,
  `sdd` varchar(255) DEFAULT NULL,
  `eee` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`productId`, `sku`, `name`, `price`, `discount`, `quantity`, `description`, `status`, `createdDate`, `updatedDate`, `color`, `brand`, `sdd`, `eee`) VALUES
(44, 's', 'sfsdf', 582, 12, 123, '        sfd        ', 1, '2021-03-03 05:32:33', '2021-03-17 07:40:00', '41', '45,46', 'ABC', 50),
(49, '555', 'fdsfsfs', 0, 258, 85, '2222        ', 0, '2021-03-03 07:05:21', '2021-03-14 17:42:31', NULL, NULL, NULL, NULL),
(58, 'SSSS', '', 345, 0, 0, '                        ', 0, '2021-03-16 05:55:47', '2021-03-16 05:57:02', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_category`
--

CREATE TABLE `product_category` (
  `entityId` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `categoryId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `product_media`
--

CREATE TABLE `product_media` (
  `mediaId` int(5) NOT NULL,
  `path` varchar(255) NOT NULL,
  `label` varchar(255) DEFAULT NULL,
  `small` tinyint(1) DEFAULT NULL,
  `thumb` tinyint(1) DEFAULT NULL,
  `base` tinyint(1) DEFAULT NULL,
  `gallery` tinyint(1) DEFAULT NULL,
  `productId` int(5) DEFAULT NULL,
  `createdDate` timestamp NULL DEFAULT NULL,
  `updatedDate` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_media`
--

INSERT INTO `product_media` (`mediaId`, `path`, `label`, `small`, `thumb`, `base`, `gallery`, `productId`, `createdDate`, `updatedDate`) VALUES
(1, '5 DAYS MASTER  (1).png', '', 0, 1, 0, 1, 44, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, '5 DAYS MASTER  (1).png', '', 1, 0, 1, 1, 44, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `shipping_method`
--

CREATE TABLE `shipping_method` (
  `methodId` int(5) NOT NULL,
  `name` varchar(50) NOT NULL,
  `code` varchar(50) NOT NULL,
  `amount` float NOT NULL,
  `description` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `createdDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `shipping_method`
--

INSERT INTO `shipping_method` (`methodId`, `name`, `code`, `amount`, `description`, `status`, `createdDate`) VALUES
(2, 'qwe', 'SDFF345', 50.25, 'qwe12333333', 0, '2021-02-17 06:35:03'),
(7, '222', 'ffgh', 25000, 'Hello123', 1, '2021-02-18 18:16:52'),
(8, 'SSS', 'SSSS', 354435, 'SSSS', 0, '2021-02-18 18:17:34');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminId`);

--
-- Indexes for table `attribute`
--
ALTER TABLE `attribute`
  ADD PRIMARY KEY (`attributeId`);

--
-- Indexes for table `attribute_option`
--
ALTER TABLE `attribute_option`
  ADD PRIMARY KEY (`optionId`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`categoryId`);

--
-- Indexes for table `cms_page`
--
ALTER TABLE `cms_page`
  ADD PRIMARY KEY (`pageId`),
  ADD UNIQUE KEY `identifier` (`identifier`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customerId`);

--
-- Indexes for table `customer_address`
--
ALTER TABLE `customer_address`
  ADD PRIMARY KEY (`addressId`);

--
-- Indexes for table `customer_group`
--
ALTER TABLE `customer_group`
  ADD PRIMARY KEY (`groupId`);

--
-- Indexes for table `customer_group_price`
--
ALTER TABLE `customer_group_price`
  ADD PRIMARY KEY (`entityId`);

--
-- Indexes for table `payment_method`
--
ALTER TABLE `payment_method`
  ADD PRIMARY KEY (`methodId`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`productId`),
  ADD UNIQUE KEY `sku` (`sku`);

--
-- Indexes for table `product_category`
--
ALTER TABLE `product_category`
  ADD PRIMARY KEY (`entityId`),
  ADD KEY `productId` (`productId`),
  ADD KEY `categoryId` (`categoryId`);

--
-- Indexes for table `product_media`
--
ALTER TABLE `product_media`
  ADD PRIMARY KEY (`mediaId`);

--
-- Indexes for table `shipping_method`
--
ALTER TABLE `shipping_method`
  ADD PRIMARY KEY (`methodId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `adminId` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `attribute`
--
ALTER TABLE `attribute`
  MODIFY `attributeId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `attribute_option`
--
ALTER TABLE `attribute_option`
  MODIFY `optionId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `categoryId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=118;

--
-- AUTO_INCREMENT for table `cms_page`
--
ALTER TABLE `cms_page`
  MODIFY `pageId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customerId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `customer_address`
--
ALTER TABLE `customer_address`
  MODIFY `addressId` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `customer_group`
--
ALTER TABLE `customer_group`
  MODIFY `groupId` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `customer_group_price`
--
ALTER TABLE `customer_group_price`
  MODIFY `entityId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `payment_method`
--
ALTER TABLE `payment_method`
  MODIFY `methodId` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `productId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `product_category`
--
ALTER TABLE `product_category`
  MODIFY `entityId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_media`
--
ALTER TABLE `product_media`
  MODIFY `mediaId` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `shipping_method`
--
ALTER TABLE `shipping_method`
  MODIFY `methodId` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `product_category`
--
ALTER TABLE `product_category`
  ADD CONSTRAINT `product_category_ibfk_1` FOREIGN KEY (`productId`) REFERENCES `product` (`productId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `product_category_ibfk_2` FOREIGN KEY (`categoryId`) REFERENCES `category` (`categoryId`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

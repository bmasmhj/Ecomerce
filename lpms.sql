-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 03, 2022 at 02:06 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lpms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `username`, `password`, `status`) VALUES
(1, 'Dhami', 'admin', '$2y$10$R4OetWodMhH2rK3AwOj2Z.acKqN.EfIHam4RfY6H6/mapsGttNtSW', 'changed'),
(4, 'accnt', 'YWNjbnQ2QHJlY2VwdGlvbg==', '$2y$10$HDkll9K8TichyfmiGo4URuFN09aZcbQa43vx0O3.kJfOI14NrY0X2', 'new'),
(5, 'cashier', 'Y2FzaGllcjIwQHJlY2VwdGlvbg==', '$2y$10$HDkll9K8TichyfmiGo4URuFN09aZcbQa43vx0O3.kJfOI14NrY0X2', 'new');

-- --------------------------------------------------------

--
-- Table structure for table `analytic`
--

CREATE TABLE `analytic` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL COMMENT 'Date',
  `utv` int(11) NOT NULL COMMENT 'unique total view',
  `unv` int(11) NOT NULL COMMENT 'unique new view',
  `ptv` int(11) NOT NULL COMMENT 'page total view',
  `pnv` int(11) NOT NULL COMMENT 'page new view'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `analytic`
--

INSERT INTO `analytic` (`id`, `date`, `utv`, `unv`, `ptv`, `pnv`) VALUES
(1, '2021-11-08', 0, 12, 0, 19),
(2, '2021-11-12', 12, 5, 19, 82),
(7, '2021-11-13', 5, 12, 2, 18),
(10, '2021-11-14', 12, 0, 18, 12),
(11, '2021-11-17', 0, 0, 12, 56),
(13, '2021-11-19', 0, 0, 1, 156),
(14, '2021-11-22', 0, 8, 156, 146),
(15, '2021-11-24', 8, 0, 146, 30),
(16, '2021-11-25', 0, 0, 30, 86),
(17, '2021-11-26', 0, 0, 86, 132),
(18, '2021-11-27', 0, 0, 132, 75),
(19, '2021-12-04', 0, 0, 7, 64),
(20, '2021-12-05', 0, 0, 2, 86),
(21, '2021-12-06', 0, 0, 3, 103),
(22, '2021-12-07', 0, 14, 103, 391),
(23, '2021-12-08', 0, 7, 336, 132),
(24, '2021-12-10', 7, 2, 132, 86),
(25, '2021-12-11', 2, 2, 2, 34),
(26, '2021-12-13', 2, 1, 2, 68),
(27, '2021-12-20', 1, 0, 2, 45),
(28, '2022-01-26', 0, 1, 1, 65),
(29, '2022-02-23', 1, 2, 1, 64),
(30, '2022-02-26', 2, 1, 2, 81),
(31, '2022-02-27', 1, 0, 12, 67),
(32, '2022-02-28', 0, 0, 6, 52),
(33, '2022-03-01', 0, 0, 20, 23),
(34, '2022-03-02', 0, 0, 2, 63),
(35, '2022-03-03', 0, 1, 3, 55),
(36, '2022-03-04', 1, 1, 4, 95),
(37, '2022-03-05', 1, 0, 1, 72),
(38, '2022-03-08', 0, 2, 33, 98),
(39, '2022-03-09', 2, 0, 98, 22),
(40, '2022-03-10', 0, 0, 22, 39),
(41, '2022-03-11', 0, 0, 39, 63),
(42, '2022-03-13', 0, 0, 4, 64),
(43, '2022-03-22', 0, 0, 2, 53),
(44, '2022-03-24', 0, 0, 4, 78),
(45, '2022-03-30', 0, 0, 1, 52),
(46, '2022-03-31', 0, 0, 1, 48),
(47, '2022-04-01', 0, 1, 2, 69),
(48, '2022-04-12', 1, 1, 69, 18),
(49, '2022-04-16', 1, 1, 18, 7),
(50, '2022-04-19', 1, 0, 7, 16),
(51, '2022-04-22', 0, 4, 16, 51),
(52, '2022-04-25', 4, 1, 51, 3),
(53, '2022-05-14', 1, 1, 3, 1),
(54, '2022-05-22', 1, 1, 1, 46),
(55, '2022-07-03', 1, 1, 46, 18),
(56, '2022-08-09', 1, 3, 18, 36),
(57, '2022-08-10', 3, 0, 36, 5),
(58, '2022-08-11', 0, 0, 5, 151),
(59, '2022-08-12', 0, 0, 151, 1),
(60, '2022-08-13', 0, 0, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `item_quantity` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `item_price` int(11) NOT NULL,
  `equal` varchar(100) NOT NULL,
  `item_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `userID`, `item_name`, `item_quantity`, `email`, `item_price`, `equal`, `item_id`) VALUES
(24, 1, 'dsfds', 1, 'ramesh@user.com', 4324, '4,324.00', 12),
(26, 1, 'Potato', 1, 'ramesh@user.com', 250, '250.00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `catcode` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `catcode`, `image`, `status`) VALUES
(1, 'Vegetables', 'vegetables', 'http://localhost/Ecomerce/assets/images/image_5.jpg', 0),
(2, 'Fruits', 'fruits', 'http://localhost/Ecomerce/assets/images/image_8.jpg', 0),
(3, 'Handi Crafts', 'handi_crafts', 'http://localhost/Ecomerce/assets/images/image_7.jpg', 0),
(4, 'Crops', 'crops', 'http://localhost/Ecomerce/assets/images/category-4.jpg', 0),
(5, 'Drinks', 'drinks', 'http://localhost/Ecomerce/assets/images/category-3.jpg', 0),
(11, 'midi', 'midi', 'http://localhost/Ecomerce/assets/images/products/628d9727a0990281123070_2511212799013802_4927084302583718652_n.jpg', 0),
(14, 'midi 2 ', 'midi_2_', 'http://localhost/Ecomerce/assets/images/products/62f25f4d0607dthis.png', 0);

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` longtext NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `fullname`, `email`, `subject`, `message`, `status`, `time`) VALUES
(8, 'Bimash Maharjan', 'bmasmhj@user.com', 'hello', 'sdsa', 1, '2022-04-12 18:02:07');

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

CREATE TABLE `districts` (
  `did` int(11) NOT NULL,
  `dname` varchar(255) DEFAULT NULL,
  `p_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `districts`
--

INSERT INTO `districts` (`did`, `dname`, `p_id`) VALUES
(1, 'Taplejung', 1),
(2, 'Sankhuwasabha', 1),
(3, 'Solukhumbu', 1),
(4, 'Okhaldhunga', 1),
(5, 'Khotang', 1),
(6, 'Bhojpur', 1),
(7, 'Dhankuta', 1),
(8, 'Terhathum', 1),
(9, 'Panchthar', 1),
(10, 'Ilam', 1),
(11, 'Jhapa', 1),
(12, 'Morang', 1),
(13, 'Sunsari', 1),
(14, 'Udayapur', 1),
(15, 'Saptari', 2),
(16, 'Siraha', 2),
(17, 'Dhanusa', 2),
(18, 'Mahottari', 2),
(19, 'Sarlahi', 2),
(20, 'Rautahat', 2),
(21, 'Bara', 2),
(22, 'Parsa', 2),
(23, 'Dolakha', 3),
(24, 'Sindhupalchok', 3),
(25, 'Rasuwa', 3),
(26, 'Dhading', 3),
(27, 'Nuwakot', 3),
(28, 'Kathmandu', 3),
(29, 'Bhaktapur', 3),
(30, 'Lalitpur', 3),
(31, 'Kavrepalanchok', 3),
(32, 'Ramechhap', 3),
(33, 'Sindhuli', 3),
(34, 'Makawanpur', 3),
(35, 'Chitawan', 3),
(36, 'Gorkha', 4),
(37, 'Manang', 4),
(38, 'Mustang', 4),
(39, 'Myagdi', 4),
(40, 'Kaski', 4),
(41, 'Lamjung', 4),
(42, 'Tanahu', 4),
(43, 'Nawalparasi East', 4),
(44, 'Syangja', 4),
(45, 'Parbat', 4),
(46, 'Baglung', 4),
(47, 'Rukum East', 5),
(48, 'Rolpa', 5),
(49, 'Pyuthan', 5),
(50, 'Gulmi', 5),
(51, 'Arghakhanchi', 5),
(52, 'Palpa', 5),
(53, 'Nawalparasi West', 5),
(54, 'Rupandehi', 5),
(55, 'Kapilbastu', 5),
(56, 'Dang', 5),
(57, 'Banke', 5),
(58, 'Bardiya', 5),
(59, 'Dolpa', 6),
(60, 'Mugu', 6),
(61, 'Humla', 6),
(62, 'Jumla', 6),
(63, 'Kalikot', 6),
(64, 'Dailekh', 6),
(65, 'Jajarkot', 6),
(66, 'Rukum West', 6),
(67, 'Salyan', 6),
(68, 'Surkhet', 6),
(69, 'Bajura', 7),
(70, 'Bajhang', 7),
(71, 'Darchula', 7),
(72, 'Baitadi', 7),
(73, 'Dadeldhura', 7),
(74, 'Doti', 7),
(75, 'Achham', 7),
(76, 'Kailali', 7),
(77, 'Kanchanpur', 7),
(78, 'NULL', 8);

-- --------------------------------------------------------

--
-- Table structure for table `newsletter`
--

CREATE TABLE `newsletter` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `newsletter`
--

INSERT INTO `newsletter` (`id`, `email`) VALUES
(5, 'bmasmhj@user.com'),
(4, 'hello@user.com'),
(6, 'sds2@sff.csa'),
(3, 'user@user.com');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `productcode` varchar(255) NOT NULL,
  `category` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `quantityname` varchar(50) NOT NULL,
  `location` varchar(255) NOT NULL,
  `lng` float NOT NULL,
  `lat` float NOT NULL,
  `pid` int(11) NOT NULL,
  `did` int(11) NOT NULL,
  `street` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `productcode`, `category`, `image`, `price`, `description`, `quantity`, `quantityname`, `location`, `lng`, `lat`, `pid`, `did`, `street`, `status`) VALUES
(1, 'Potato', 'white_potato', 1, 'https://www.macmillandictionary.com/external/slideshow/full/141151_full.jpg', 250, 'Brought from Ilam', 5000, 'Kg', 'lalitpur', 0, 0, 2, 6, '', 'active'),
(2, 'Tomato', 'tomato', 1, 'https://frontiersinblog.files.wordpress.com/2021/07/frontiers-in-sustainalble-food-systems-tomato-fruits-send-electrical-warnings-to-the-rest-of-the-plant-when-attacked-by-insects.jpg', 150, '', 890, 'Kg', 'patan', 0, 0, 1, 3, '', 'active'),
(3, 'Pumpkin', 'big_pumpkin', 1, 'https://images.immediate.co.uk/production/volatile/sites/30/2020/02/pumpkin-3f3d894.jpg?quality=90&resize=661%2C600', 540, '', 200, 'Peice', 'tangal', 0, 0, 2, 9, '', 'active'),
(4, 'Garlic', 'white_garlic', 1, 'https://solidstarts.com/wp-content/uploads/garlic_edited-scaled.jpg', 60, '', 890, 'Kg', 'lagankhel', 0, 0, 4, 5, 'Home', 'featured'),
(10, 'dfs', 'dfs462c1a0b6ac8ba', 4, 'http://localhost/Ecomerce/assets/images/products/62c1a0b6acbdfScreenshot from 2022-06-30 19-17-44.png', 34, 'sdsa', 23, 'Kg', 'PROVINCE 3, Dhading - sadas', 0, 0, 3, 26, 'sadas', 'featured'),
(12, 'dsfds', 'dsfds262f2673324dad', 2, 'http://localhost/Ecomerce/assets/images/products/62f2673324f57this.png', 4324, 'efd', 23423, 'Piece', 'PROVINCE 1, Okhaldhunga - dfg', 0, 0, 1, 4, 'dfg', 'featured'),
(13, 'dsadasd', 'dsadasd162f5060985b94', 1, 'http://localhost/Ecomerce/assets/images/products/62f5060985d5cmusic-logo-creative-icon-vector-29591237.jpg', 342, 'fdgsdfsdfs', 42342, 'Kg', 'PROVINCE 1, Solukhumbu - Dhobighat', 27.7172, 85.324, 1, 3, 'Dhobighat', '0');

-- --------------------------------------------------------

--
-- Table structure for table `province`
--

CREATE TABLE `province` (
  `pid` int(11) NOT NULL,
  `pname` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `province`
--

INSERT INTO `province` (`pid`, `pname`) VALUES
(1, 'PROVINCE 1'),
(2, 'PROVINCE 2'),
(3, 'PROVINCE 3'),
(4, 'PROVINCE 4'),
(5, 'PROVINCE 5'),
(6, 'PROVINCE 6'),
(7, 'PROVINCE 7'),
(8, 'NULL');

-- --------------------------------------------------------

--
-- Table structure for table `socialmedia`
--

CREATE TABLE `socialmedia` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `url` varchar(255) NOT NULL,
  `icon` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `id` int(11) NOT NULL,
  `invoice` varchar(255) NOT NULL,
  `productname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `location` varchar(255) NOT NULL,
  `status` varchar(100) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `productid` int(11) NOT NULL,
  `userrid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`id`, `invoice`, `productname`, `email`, `quantity`, `price`, `total`, `location`, `status`, `date`, `productid`, `userrid`) VALUES
(18, 'ZWU2MDg3MW', 'Tomato', 'bmasmhj@user.com', 1, 150, 300, 'PROVINCE 3, Lalitpur - Sunakothi', 'delivered', '2022-08-11 09:18:22', 2, 1),
(19, 'ZWU2MDg3MW', 'Pumpkin', 'bmasmhj@user.com', 1, 540, 1080, 'PROVINCE 3, Lalitpur - Sunakothi', 'cancelled', '2022-08-11 09:18:27', 2, 1),
(20, 'MDQ4OWM5NT', 'Tomato', 'bmasmhj@user.com', 1, 150, 300, 'PROVINCE 3, Lalitpur - Sunakothi', 'cancelled', '2022-08-11 09:18:23', 2, 1),
(21, 'YzM2YThlOT', 'Garlic', 'bmasmhj@user.com', 1, 60, 120, 'PROVINCE 3, Lalitpur - Sunakothi', 'ordered', '2022-08-11 09:18:20', 2, 1),
(22, 'ZWZiMTNiNG', 'Pumpkin', 'ramesh@user.com', 1, 540, 1080, 'PROVINCE 3, Lalitpur - Sunakothi', 'delivered', '2022-08-11 09:18:28', 2, 1),
(23, 'ZWZiMTNiNG', 'Tomato', 'ramesh@user.com', 1, 150, 300, 'PROVINCE 3, Lalitpur - Sunakothi', 'delivered', '2022-08-11 09:18:25', 2, 1),
(32, 'Yjk0NmYwMT', 'Potato', 'ramesh@user.com', 1, 250, 500, 'PROVINCE 3, Lalitpur - Sunakothi', 'Ordered', '2022-08-11 21:13:58', 1, 1),
(33, 'Yjk0NmYwMT', 'Pumpkin', 'ramesh@user.com', 1, 540, 1080, 'PROVINCE 3, Lalitpur - Sunakothi', 'Ordered', '2022-08-11 21:15:10', 3, 1),
(34, 'Yjk0NmYwMT', 'dsfds', 'ramesh@user.com', 1, 4324, 4324, 'PROVINCE 3, Lalitpur - Sunakothi', 'Ordered', '2022-08-11 21:16:47', 12, 1),
(35, 'Yjk0NmYwMT', 'dfs', 'ramesh@user.com', 1, 34, 34, 'PROVINCE 3, Lalitpur - Sunakothi', 'Ordered', '2022-08-11 21:17:16', 10, 1),
(36, 'Yjk0NmYwMT', 'Garlic', 'ramesh@user.com', 1, 60, 60, 'PROVINCE 3, Lalitpur - Sunakothi', 'Ordered', '2022-08-11 21:21:29', 4, 1),
(37, 'Yjk0NmYwMT', 'Tomato', 'ramesh@user.com', 1, 150, 150, 'PROVINCE 3, Lalitpur - Sunakothi', 'Ordered', '2022-08-11 21:21:29', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `usertable`
--

CREATE TABLE `usertable` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `code` mediumint(50) NOT NULL,
  `status` text NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `provience` int(11) DEFAULT NULL,
  `district` int(11) DEFAULT NULL,
  `num` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `usertable`
--

INSERT INTO `usertable` (`id`, `name`, `email`, `password`, `code`, `status`, `address`, `provience`, `district`, `num`) VALUES
(1, 'Bimash Maharjan', 'ramesh@user.com', '$2y$10$2sLs2j8k3c9kn0TTGDpWFe3aG2K3OVPg5tRLqennIy9icRnibs9zm', 0, 'verified', 'Sunakothi', 3, 30, 984545455);

-- --------------------------------------------------------

--
-- Table structure for table `websitedetail`
--

CREATE TABLE `websitedetail` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `num` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `locaation` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `websitedetail`
--

INSERT INTO `websitedetail` (`id`, `name`, `num`, `email`, `locaation`) VALUES
(1, 'LPMS', '+977 9845 454545', 'demo@demo.com', 'Patan Lalitpur , 44700 - Nepal');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `analytic`
--
ALTER TABLE `analytic`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userID` (`userID`),
  ADD KEY `item_id` (`item_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `districts`
--
ALTER TABLE `districts`
  ADD PRIMARY KEY (`did`),
  ADD KEY `p_id` (`p_id`);

--
-- Indexes for table `newsletter`
--
ALTER TABLE `newsletter`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pid` (`pid`),
  ADD KEY `did` (`did`),
  ADD KEY `category` (`category`);

--
-- Indexes for table `province`
--
ALTER TABLE `province`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `socialmedia`
--
ALTER TABLE `socialmedia`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `productid` (`productid`),
  ADD KEY `userrid` (`userrid`);

--
-- Indexes for table `usertable`
--
ALTER TABLE `usertable`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `websitedetail`
--
ALTER TABLE `websitedetail`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `analytic`
--
ALTER TABLE `analytic`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `districts`
--
ALTER TABLE `districts`
  MODIFY `did` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `newsletter`
--
ALTER TABLE `newsletter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `province`
--
ALTER TABLE `province`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `socialmedia`
--
ALTER TABLE `socialmedia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `usertable`
--
ALTER TABLE `usertable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `websitedetail`
--
ALTER TABLE `websitedetail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `usertable` (`id`),
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`item_id`) REFERENCES `product` (`id`);

--
-- Constraints for table `districts`
--
ALTER TABLE `districts`
  ADD CONSTRAINT `districts_ibfk_1` FOREIGN KEY (`p_id`) REFERENCES `province` (`pid`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`pid`) REFERENCES `province` (`pid`),
  ADD CONSTRAINT `product_ibfk_2` FOREIGN KEY (`did`) REFERENCES `districts` (`did`),
  ADD CONSTRAINT `product_ibfk_3` FOREIGN KEY (`category`) REFERENCES `category` (`id`);

--
-- Constraints for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD CONSTRAINT `tbl_order_ibfk_1` FOREIGN KEY (`productid`) REFERENCES `product` (`id`),
  ADD CONSTRAINT `tbl_order_ibfk_2` FOREIGN KEY (`userrid`) REFERENCES `usertable` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

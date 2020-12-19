-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: 19 ธ.ค. 2020 เมื่อ 01:08 PM
-- เวอร์ชันของเซิร์ฟเวอร์: 8.0.22-0ubuntu0.20.04.3
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_secure`
--

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `product`
--

CREATE TABLE `product` (
  `id` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `price` float NOT NULL,
  `count` int NOT NULL,
  `img` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- dump ตาราง `product`
--

INSERT INTO `product` (`id`, `name`, `price`, `count`, `img`) VALUES
(30, 'ทรอส โคโลญน้ำหอมสำหรับผู้ชาย', 290, 15, 'https://static.bigc.co.th/media/catalog/product/8/8/8851989020914.jpg'),
(31, 'Bvlgari Aqva Pour Homme แท้', 2500, 2, 'https://img.youtube.com/vi/7n-aGNdIozQ/hqdefault.jpg'),
(32, ' Chanel Bleu De Chanel แท้', 5000, 4, 'https://thomasthailand.co/wp-content/uploads/2019/10/PerfumeForMen03.jpg\r\n'),
(33, 'Armani Code Profumo ของแท้!', 500, 15, 'https://thomasthailand.co/wp-content/uploads/2019/10/PerfumeForMen04.jpg'),
(34, 'Valentino ‘Uomo’ Fragrance แท้แน่นอน', 1500, 5, 'https://thomasthailand.co/wp-content/uploads/2019/10/PerfumeForMen05.jpg'),
(35, 'Creed Aventus', 4500, 9, 'https://thomasthailand.co/wp-content/uploads/2019/10/PerfumeForMen07-01.jpg'),
(36, 'Dior Sauvage', 2888, 10, 'https://backend.central.co.th/media/catalog/product/C/D/CDS10163030.jpg?impolicy=resize&width=553\r\n'),
(37, 'Mr. Burberry Indigo', 5600, 48, 'https://thomasthailand.co/wp-content/uploads/2019/10/PerfumeForMen06-01.jpg\r\n'),
(38, 'Chloé Eau de Parfum (รุ่นโบว์ครีม)', 6400, 6, 'https://content.shopback.com/th/wp-content/uploads/2018/09/27145038/%E0%B8%81%E0%B8%A5%E0%B8%B4%E0%B9%88%E0%B8%99%E0%B8%99%E0%B9%89%E0%B8%B3%E0%B8%AB%E0%B8%AD%E0%B8%A1_1.jpg'),
(39, 'Chanel Coco Mademoiselle Eau de Toilette', 9000, 4, 'https://content.shopback.com/th/wp-content/uploads/2018/09/27145046/22.jpg'),
(40, 'Miss Dior Blooming Bouquet', 2750, 1, 'https://content.shopback.com/th/wp-content/uploads/2018/09/27145044/32.jpg'),
(41, 'Aventus Cologne By CREED', 10699, 3, 'https://i2.wp.com/royal-perfumes.bg/wp-content/uploads/2019/08/Creed-Aventus-for-Him-EDP-100.jpg?fit=1024%2C1024&ssl=1'),
(42, 'Maison Francis Kurkdjian Baccarat Rouge 540 EDP 70ml', 6890, 12, 'https://cf.shopee.co.th/file/9188fe3d01614727a26f7576b7baa05e'),
(43, 'CALVIN KLEIN FRAGRANCE\r\nน้ำหอม Ck Be EDT Spray ขนาด 200 มล.', 3645, 40, 'https://cf.shopee.co.th/file/0f962c8dba24a61983e3f063f218a9b4'),
(45, 'yves saint laurent black perfume', 5400, 13, 'https://l.lnwfile.com/320qy3.jpg'),
(46, 'La Nuit De L\'homme by Yves Saint Laurent Oil Perfumes', 2699, 40, 'https://www.slickzoilperfumes.com/wp-content/uploads/2019/09/la-nuit.jpg'),
(47, 'bleu de chanel edp', 2189, 23, 'https://cf.shopee.co.th/file/04a62a2caf6156735345bfb56b2afb6b'),
(48, 'tom ford venetian bergamot', 7890, 5, 'https://cf.shopee.co.th/file/9bb2da0c0f7e13d6d3234a60a3d76925'),
(49, 'calvin klein  CK one', 980, 18, 'https://f.ptcdn.info/705/039/000/o1stki1em0mPBwC1DnM-o.jpg'),
(50, 'bvlgari aqva pour homme', 2079, 9, 'https://gc.lnwfile.com/rvq3aw.jpg');

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `user`
--

CREATE TABLE `user` (
  `id` int NOT NULL,
  `username` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `role` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- dump ตาราง `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `role`) VALUES
(6, 'admin', 'e10adc3949ba59abbe56e057f20f883e', 999),
(19, 'ongsuwannoo', '81dc9bdb52d04dc20036dbd8313ed055', 0),
(20, 'member', 'caf1a3dfb505ffed0d024130f58c5cfa', 0),
(21, 'chanlao', '81dc9bdb52d04dc20036dbd8313ed055', 0),
(22, 'tinto', '3fa6b1ff29aa0b4f9b9c59c676846829', 0);

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `user_email`
--

CREATE TABLE `user_email` (
  `id` int NOT NULL,
  `userId` int NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- dump ตาราง `user_email`
--

INSERT INTO `user_email` (`id`, `userId`, `email`) VALUES
(28, 6, 'admin@gmail.com'),
(58, 19, 'test@gmail.com'),
(59, 20, 'chanlaor321@gmail.com'),
(60, 21, 'tinto543@gmail.com1'),
(61, 22, 'chanlaor3212@gmail.com');

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `user_forgetpass`
--

CREATE TABLE `user_forgetpass` (
  `id` int NOT NULL,
  `email` varchar(255) NOT NULL,
  `code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `lastEdit` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_email`
--
ALTER TABLE `user_email`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_forgetpass`
--
ALTER TABLE `user_forgetpass`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `user_email`
--
ALTER TABLE `user_email`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `user_forgetpass`
--
ALTER TABLE `user_forgetpass`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

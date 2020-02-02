-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 15, 2020 at 05:37 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

create database bookstore;
use bookstore;
--
-- Database: `bookstore`
--
-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `idPro` int(11) NOT NULL,
  `quantity` int(11) DEFAULT NULL,
  `idUser` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--


-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `title` varchar(50) DEFAULT NULL,
  `author` varchar(50) DEFAULT NULL,
  `publishing` varchar(255) DEFAULT NULL,
  `numberOfPages` int(11) DEFAULT NULL,
  `publishingYear` int(11) DEFAULT NULL,
  `price` float DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  `image` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `author`, `publishing`, `numberOfPages`, `publishingYear`, `price`, `type`, `image`) VALUES
(1, 'Tôi thấy hoa vàng trên cỏ xanh', 'Nguyễn Nhật Ánh', 'NXB Thanh niên', 450, 2017, 65000, 'Truyện, Tiểu thuyết', 'hoavang.png'),
(2, 'Mỗi lần vấp ngã là mỗi lần trưởng thành', 'Liêu Trí Phong', 'NXB Thanh niên', 380, 2019, 120000, 'Truyện, Tiểu thuyết', 'truong.png'),
(3, 'Thi nhân Việt Nam', 'Hoài Thanh - Hoài Chân', 'NXB Văn học', 255, 1942, 90000, 'Văn hóa xã hội, lịch sử', 'thinhan.png'),
(4, 'Kinh nghiệm thành công của ông chủ nhỏ', 'Lão Mạc', 'NXB Thanh niên', 240, 2006, 75000, 'Khoa học công nghệ, kinh tế', 'kinhnghiem.png'),
(5, 'Vi sinh vật vi tính', 'Nick Arnold - Tony De Saulles', 'NXB trẻ', 254, 2012, 65000, 'Khoa học công nghệ, kinh tế', 'visinh.png'),
(6, 'Mỹ thuật vẽ chân dung', 'Gia Bảo', 'NXB Mỹ thuật', 235, 2016, 45000, 'Văn hóa nghệ thuật', 'chandung.png');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fistName` varchar(50) DEFAULT NULL,
  `lastName` varchar(50) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `position` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fistName`, `lastName`, `address`, `phone`, `email`, `position`, `username`, `password`) VALUES
(1, 'Nguyet', 'Nguyen', '101B Le Huu Trac', '0359405417', 'nguyetnguyen@gmail.com', 'admin', 'admin', 'admin'),
(2, 'Nga', 'Mai', '101B Le Huu Trac', '0358748145', 'ngamai@gmail.com', 'user', 'nga', '123'),
(3, 'Lan', 'Hồ', 'Quảng Trị', '0398748515', 'lanho@gmail.com', 'user', 'lan', '123'),
(4, 'Quân', 'Hồ', 'Quảng Trị', '0357148249', 'quanho@gmail.com', 'user', 'quan', '123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`idPro`);

--
-- Indexes for table `order

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `idPro` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
  
  CREATE TABLE `orders` (
  `id` int(11) NOT NULL primary key auto_increment,
  `idUser` int  DEFAULT NULL,
  `idPro` int DEFAULT NULL,
  `price` float DEFAULT NULL,
  `dateOrder` datetime DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  foreign key (idPro) references products(id),
  foreign key (idUser) references users(id)
);

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

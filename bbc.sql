-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 20, 2017 at 01:25 PM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bbc`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(3) NOT NULL,
  `name` varchar(256) DEFAULT NULL,
  `sef_url` varchar(256) NOT NULL,
  `description` varchar(256) DEFAULT NULL,
  `keywords` varchar(128) DEFAULT NULL,
  `order` int(3) DEFAULT NULL,
  `visible` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `sef_url`, `description`, `keywords`, `order`, `visible`) VALUES
(1, 'Zaštita na radu', 'zastita-na-radu', 'Zaštita na radu - HTZ, Zastita na radu, rukavice, odeca...', 'HTZ, Zastita na radu, rukavice', 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `options`
--

CREATE TABLE `options` (
  `id` int(11) NOT NULL,
  `id_product` int(12) DEFAULT NULL,
  `name_option` varchar(128) DEFAULT NULL,
  `type` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `opt_fields`
--

CREATE TABLE `opt_fields` (
  `id` int(11) NOT NULL,
  `id_opt` int(11) DEFAULT NULL,
  `name_field` varchar(45) DEFAULT NULL,
  `price` decimal(12,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` int(5) NOT NULL,
  `sef_title` varchar(256) NOT NULL,
  `title` varchar(256) DEFAULT NULL,
  `contetnt` text,
  `description` varchar(256) DEFAULT NULL,
  `keywords` varchar(256) DEFAULT NULL,
  `image_main` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(256) DEFAULT NULL,
  `description` text,
  `meta_desc` varchar(256) DEFAULT NULL,
  `keywords` varchar(128) DEFAULT NULL,
  `category` int(3) DEFAULT NULL,
  `sef_url` varchar(256) NOT NULL,
  `price` decimal(12,2) DEFAULT NULL,
  `order` int(6) DEFAULT NULL,
  `visible` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `p_gallery`
--

CREATE TABLE `p_gallery` (
  `id` int(11) NOT NULL,
  `id_products` int(11) DEFAULT NULL,
  `image` varchar(256) DEFAULT NULL,
  `name` varchar(256) DEFAULT NULL,
  `position` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(6) NOT NULL,
  `name` varchar(45) NOT NULL,
  `password` varchar(256) DEFAULT NULL,
  `email` varchar(128) DEFAULT NULL,
  `level` tinyint(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `password`, `email`, `level`) VALUES
(1, 'luka', '$2y$10$22gGD3mxl6oQH7xkZ3JDwO1updR61UUG.cp.AThzGybA4ENOn7y82', 'lukastojanovicbg@gmail.com', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`,`sef_url`);

--
-- Indexes for table `options`
--
ALTER TABLE `options`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_prod_idx` (`id_product`);

--
-- Indexes for table `opt_fields`
--
ALTER TABLE `opt_fields`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_opt_idx` (`id_opt`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`,`sef_title`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`,`sef_url`),
  ADD KEY `category_idx` (`category`);

--
-- Indexes for table `p_gallery`
--
ALTER TABLE `p_gallery`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_products_idx` (`id_products`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`,`name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `options`
--
ALTER TABLE `options`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `p_gallery`
--
ALTER TABLE `p_gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `options`
--
ALTER TABLE `options`
  ADD CONSTRAINT `id_prod` FOREIGN KEY (`id_product`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `opt_fields`
--
ALTER TABLE `opt_fields`
  ADD CONSTRAINT `id_opt` FOREIGN KEY (`id_opt`) REFERENCES `options` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `category` FOREIGN KEY (`category`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `p_gallery`
--
ALTER TABLE `p_gallery`
  ADD CONSTRAINT `id_products` FOREIGN KEY (`id_products`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

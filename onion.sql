-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 01, 2018 at 09:45 PM
-- Server version: 5.7.14
-- PHP Version: 7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `onion`
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
  `c_order` int(3) DEFAULT NULL,
  `visible` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `sef_url`, `description`, `keywords`, `c_order`, `visible`) VALUES
(4, 'Electronics', 'electronics', 'Electronics', 'Electronics', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `options`
--

CREATE TABLE `options` (
  `id` int(11) NOT NULL,
  `id_product` int(12) DEFAULT NULL,
  `name_option` varchar(128) DEFAULT NULL,
  `type` varchar(45) DEFAULT NULL,
  `position` int(3) DEFAULT NULL
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
  `sef_url` varchar(256) NOT NULL,
  `title` varchar(256) DEFAULT NULL,
  `content` text,
  `description` varchar(256) DEFAULT NULL,
  `keywords` varchar(256) DEFAULT NULL,
  `image_main` varchar(256) DEFAULT NULL,
  `visible` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `sef_url`, `title`, `content`, `description`, `keywords`, `image_main`, `visible`) VALUES
(1, 'pocetna', 'Početna', '<div class="content">\r\n<div class="breadcrumbs">\r\n<ol class="breadcrumb">\r\n<li class="active">Početna</li>\r\n</ol>\r\n</div>\r\n<div id="slider"><img src="http://bbcnovi.local/v_front/img/slider1.jpg" alt="baner" /> <img src="http://bbcnovi.local/v_front/img/slider2.jpg" alt="baner" /> <img src="http://bbcnovi.local/v_front/img/slider3.jpg" alt="baner" /></div>\r\n<div class="heading">\r\n<h2>Vesti</h2>\r\n<hr /></div>\r\n<div class="teaserboxstart">\r\n<article><img class="img-responsive" src="http://bbcnovi.local/v_front/img/slider1.jpg" alt="" /> <a class="tittle" href="#.">GEZE front door pack</a>\r\n<p>The GEZE front door pack is the barrier-free solution for private entrance doors for houses and apartment buildings.</p>\r\n<a href="#.">Detaljnije</a></article>\r\n<article><img class="img-responsive" src="http://bbcnovi.local/v_front/img/slider1.jpg" alt="" /> <a class="tittle" href="#.">GEZE front door pack</a>\r\n<p>The GEZE front door pack is the barrier-free solution for private entrance doors for houses and apartment buildings.</p>\r\n<a href="#.">Detaljnije</a></article>\r\n<article><img class="img-responsive" src="http://bbcnovi.local/v_front/img/slider1.jpg" alt="" /> <a class="tittle" href="#.">GEZE front door pack</a>\r\n<p>The GEZE front door pack is the barrier-free solution for private entrance doors for houses and apartment buildings.</p>\r\n<a href="#.">Detaljnije</a></article>\r\n</div>\r\n</div>', 'Geze Srbija', 'Geze Srbija', 'http://bbcnovi.local/uploads/garazna-vrata/garazna-vrata-hormann-renomatic-darkoak_2.jpg', 1);

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
  `image` varchar(256) DEFAULT NULL,
  `p_order` int(6) DEFAULT NULL,
  `visible` tinyint(1) DEFAULT NULL,
  `onhome` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `meta_desc`, `keywords`, `category`, `sef_url`, `price`, `image`, `p_order`, `visible`, `onhome`) VALUES
(6, 'Floral Print Buttoned', '<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo.</p>', 'Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.', 'Pellentesque', 4, 'floral-print-buttoned', '1200.00', 'http://onion.local/uploads/products/alcatel.jpeg', 1, 1, 1);

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
(1, 'admin', '$2y$10$KYzWHUxYnPaylLEcPK2TaOthx34cy.X5rbr.MOd86isM.HwafR0lG', 'test@mail.com', 1);

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
  ADD PRIMARY KEY (`id`,`sef_url`);

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
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `options`
--
ALTER TABLE `options`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `opt_fields`
--
ALTER TABLE `opt_fields`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `p_gallery`
--
ALTER TABLE `p_gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
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

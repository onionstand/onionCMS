-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 30, 2014 at 04:15 PM
-- Server version: 5.6.17-log
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `lukacms`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(256) NOT NULL,
  `sef_title` varchar(256) NOT NULL,
  `description` varchar(256) NOT NULL,
  `published` tinyint(1) NOT NULL DEFAULT '1',
  `order` int(10) NOT NULL,
  `subcat` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `sef_title`, `description`, `published`, `order`, `subcat`) VALUES
(1, 'Vesti', 'vesti', 'vesti', 1, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `menu_pages` varchar(256) NOT NULL,
  `menu_url` varchar(256) NOT NULL,
  `menu_group` varchar(64) NOT NULL,
  `menu_order` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sef_title` varchar(128) NOT NULL,
  `title` varchar(128) NOT NULL,
  `content` text NOT NULL,
  `description` varchar(256) NOT NULL,
  `keywords` varchar(256) NOT NULL,
  `author` varchar(64) NOT NULL,
  `date` date NOT NULL,
  `cat_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `sef_title`, `title`, `content`, `description`, `keywords`, `author`, `date`, `cat_id`) VALUES
(1, 'dobrodosli-na-nas-sajt', 'Dobrodošli na naš sajt', 'We make it Firefox. You make it your own. Meet our most customizable Android browser yet. Fast, smart and safe, the official Firefox for Android browser from Mozilla offers more ways than ever to make your mobile browsing experience uniquely yours.', 'We make it Firefox.', 'Firefox', 'Luka,Gojko', '2014-11-16', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE IF NOT EXISTS `pages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sef_title` varchar(128) NOT NULL,
  `title` varchar(128) NOT NULL,
  `content` text NOT NULL,
  `description` varchar(256) NOT NULL,
  `keywords` varchar(256) NOT NULL,
  `author` varchar(64) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `sef_title`, `title`, `content`, `description`, `keywords`, `author`, `date`) VALUES
(1, 'Želimo vam dobrodošlicu, đoke', 'zelimo-vam-dobrodoslicu', '<p>State of Decay is a software program developed by Microsoft Game Studios. A scheduled task is added to Windows Task Scheduler in order to launch the program at various scheduled times (the schedule varies depending on the version). The setup package generally installs about 16 files and is usually about 1.85 GB (1,987,114,534 bytes). The installed file update.exe is the auto-update component of the program which is designed to check for software updates and notify and apply them when new versions are discovered. Relative to the overall usage of users who have this installed on their PCs, most are running Windows 7 (SP1) and Windows 7. While about 24% of users of State of Decay come from France, it is also popular in the United States and Brazil.\r\n</p>', 'State of Decay is a software program developed by Microsoft Game Studios.', 'State of Decay', 'luka', '2014-10-12'),
(2, 'Želimo vam dobrodošlicu, đoke', 'zelimo-vam-dobrodoslicu', '<p>State of Decay is a software program developed by Microsoft Game Studios. A scheduled task is added to Windows Task Scheduler in order to launch the program at various scheduled times (the schedule varies depending on the version). The setup package generally installs about 16 files and is usually about 1.85 GB (1,987,114,534 bytes). The installed file update.exe is the auto-update component of the program which is designed to check for software updates and notify and apply them when new versions are discovered. Relative to the overall usage of users who have this installed on their PCs, most are running Windows 7 (SP1) and Windows 7. While about 24% of users of State of Decay come from France, it is also popular in the United States and Brazil.\r\n</p>', 'State of Decay is a software program developed by Microsoft Game Studios.', 'State of Decay', 'luka', '2014-10-12');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `email` varchar(256) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `password`, `email`) VALUES
(1, 'luka', '$2y$10$Tjzl303sOAtBJDMXr8iPvOmjkM/ZpV/eufLWBddLI15h/VuB9Xty6', 'lukastojanovicbg@gmail.com');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

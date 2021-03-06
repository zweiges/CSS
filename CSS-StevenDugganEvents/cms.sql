-- phpMyAdmin SQL Dump
-- version 3.5.8
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 22, 2014 at 06:07 PM
-- Server version: 5.5.32
-- PHP Version: 5.4.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `908387`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE IF NOT EXISTS `admins` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `hashed_password` varchar(120) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `hashed_password`) VALUES
(1, 'admin', '$2a$10$qweasdzxcqweasdzxc123e0JvqhWhofKBo7tClV2fWVLuJisuGC0q');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE IF NOT EXISTS `contact` (
  `nama` varchar(30) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `event` varchar(30) DEFAULT NULL,
  `desk` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`nama`, `email`, `event`, `desk`) VALUES
('asd', 'asd', 'Tahun Baru', '<p>asd</p>'),
('asd', 'asd', 'Tahun Baru', '<p>asd</p>'),
('asd', 'asd', 'Tahun Baru', '<p>asd</p>'),
('test', 'test', 'Tahun Baru', '<p>asdasd</p>'),
('qwenwqejn', 'asndasdn', 'Tahun Baru', '<p>kasndkasd</p>');

-- --------------------------------------------------------

--
-- Table structure for table `logo`
--

CREATE TABLE IF NOT EXISTS `logo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(20) NOT NULL,
  `body` text NOT NULL,
  `gambar` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `logo`
--

INSERT INTO `logo` (`id`, `title`, `body`, `gambar`) VALUES
(1, 'test', '', 'images/images.jpg'),
(2, 'weblogo', '', 'images/logo.jpg'),
(3, 'artis', '', 'images/images.jpg'),
(4, 'UBM', '', 'images/ubm.png');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE IF NOT EXISTS `pages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `subject_id` int(11) NOT NULL,
  `menu_name` varchar(20) NOT NULL,
  `position` int(11) NOT NULL,
  `visible` tinyint(1) DEFAULT NULL,
  `descon` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `subject_id`, `menu_name`, `position`, `visible`, `descon`) VALUES
(1, 1, 'OUR CLIENTS', 1, 1, '<p>Universitas Bunda Mulia</p>\r\n<p>SMA Kristen Yusuf</p>\r\n<p>SMK ANANDA</p>'),
(2, 1, 'DIRECTOR', 2, 1, '<p>Charlie Sandewo</p>\r\n<p>Steven</p>\r\n<p>Suhendrie Darmawan</p>'),
(4, 3, 'Contact Us', 1, 1, '<form action="contact.php" method="post">\r\nKirimkan permintaan Anda untuk membuat event bersama kami.<br>\r\nNAMA<input name="nama" type="text" value="" style="margin-left:10px;"><br>\r\nEMAIL<input name="email" type="text" value="" style="margin-left:8px;"><br>\r\nEVENT<select name="event" style="margin-left:5px;">\r\n<option value="Tahun Baru">Tahun Baru</option>\r\n<option value="Tahun Baru Imlek">Tahun Baru Imlek</option>\r\n<option value="Valentine">Valentine</option>\r\n<option value="White Day">White Day</option>\r\n<option value="Idul Fitri">Idul Fitri</option>\r\n<option value="Hari Kemerdekaan Indonesia">Hari Kemerdekaan Indonesia</option>\r\n<option value="Halloween">Halloween</option>\r\n<option value="Natal">Natal</option>\r\n<option value="Ulang Tahun">Ulang Tahun</option>\r\n</select><br>\r\nDESKRIPSI<br>\r\n<textarea cols="40" name="desk" rows="10" id="desk" ></textarea><br>\r\n<input name="submit" type="submit" value="KIRIM"><br>\r\n</form>');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE IF NOT EXISTS `subjects` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `menu_name` varchar(20) NOT NULL,
  `position` int(11) NOT NULL,
  `visible` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `menu_name`, `position`, `visible`) VALUES
(1, 'ABOUT US', 2, 1),
(3, 'CONTACT', 3, 1),
(5, 'HOME', 1, 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 11, 2018 at 08:55 PM
-- Server version: 5.7.23
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_exam`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

DROP TABLE IF EXISTS `tbl_admin`;
CREATE TABLE IF NOT EXISTS `tbl_admin` (
  `adminId` int(11) NOT NULL AUTO_INCREMENT,
  `adminUser` varchar(100) NOT NULL,
  `adminPass` varchar(100) NOT NULL,
  PRIMARY KEY (`adminId`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`adminId`, `adminUser`, `adminPass`) VALUES
(1, 'admin', '81dc9bdb52d04dc20036dbd8313ed055'),
(2, 'local', 'local');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ans`
--

DROP TABLE IF EXISTS `tbl_ans`;
CREATE TABLE IF NOT EXISTS `tbl_ans` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `quesNo` int(11) NOT NULL,
  `rightAns` int(11) NOT NULL DEFAULT '0',
  `ans` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=71 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_ans`
--

INSERT INTO `tbl_ans` (`id`, `quesNo`, `rightAns`, `ans`) VALUES
(70, 3, 0, 'NBM'),
(69, 3, 1, 'Saef Sir'),
(68, 3, 0, 'XYZ'),
(67, 2, 0, 'Javascript'),
(66, 2, 1, 'Cascading Style Sheet'),
(65, 2, 0, 'Cascading Style'),
(64, 2, 0, 'Cascade'),
(63, 1, 0, 'Zebra'),
(62, 1, 0, 'Elephant'),
(61, 1, 0, 'Deer'),
(60, 1, 1, 'Tiger');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ques`
--

DROP TABLE IF EXISTS `tbl_ques`;
CREATE TABLE IF NOT EXISTS `tbl_ques` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `quesNo` int(11) NOT NULL,
  `ques` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_ques`
--

INSERT INTO `tbl_ques` (`id`, `quesNo`, `ques`) VALUES
(17, 1, 'What is the national animal of Bangladesh'),
(18, 2, 'What does CSS mean?'),
(19, 3, 'Who\'s the best?');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

DROP TABLE IF EXISTS `tbl_user`;
CREATE TABLE IF NOT EXISTS `tbl_user` (
  `userId` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `userName` varchar(32) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(32) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`userId`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`userId`, `name`, `userName`, `password`, `email`, `status`) VALUES
(21, 'Hassan', 'hasan', '81dc9bdb52d04dc20036dbd8313ed055', 'hasan1@hasan.com', 0),
(4, 'Delowar', 'delowar', '202cb962ac59075b964b07152d234b70', 'delowar@gmail.com', 0),
(5, 'Imran Hosen', 'imran', '202cb962ac59075b964b07152d234b70', 'imran@gmail.com', 0),
(8, 'Md. Imran Hosen', 'imranhosen', '202cb962ac59075b964b07152d234b70', 'imh@gmail.com', 0),
(19, 'XYZ', 'XYZ', 'fcea920f7412b5da7be0cf42b8c93759', 'xyz@gmail.com', 0),
(10, 'imran', 'admin', 'md5(34)', 'imy@gmail.com', 0),
(11, 'im@gmail.com', 'username', 'md5(123)', 'im@gmail.com', 0),
(12, 'aaaa', 'aaaaaaaaaa', 'md5(aaa)', 'aaa@aaa.aa', 0),
(13, 'Saif', 'saiftheboss7', 'md5(123456)', 'saiftheboss7@gmail.com', 0),
(14, 'hi', 'hi', 'md5(123456)', 'hi@gmail.com', 0),
(20, 'Hassan', 'hasan', '81dc9bdb52d04dc20036dbd8313ed055', 'hasan@hasan.com', 0),
(16, 'Saif', 'Saif', '123456', 'saif@wphive.com', 0),
(17, 'hello', 'hiya', '123456', 'hiya@outlook.com', 0),
(18, 'saif', 'saifdboss', '123456', 'saifdboss@gmail.com', 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 26, 2018 at 02:42 PM
-- Server version: 5.5.59-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `spms`
--

-- --------------------------------------------------------

--
-- Table structure for table `adm_c`
--

CREATE TABLE IF NOT EXISTS `adm_c` (
  `s_id` varchar(10) NOT NULL,
  `p_id` varchar(10) NOT NULL,
  `cancel_date` date NOT NULL,
  `reason` varchar(30) NOT NULL,
  PRIMARY KEY (`s_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `adm_c`
--

INSERT INTO `adm_c` (`s_id`, `p_id`, `cancel_date`, `reason`) VALUES
('S01', 'P01', '2017-11-28', 'wert'),
('S02', 'P02', '2017-11-22', 'no reason'),
('S11', 'P11', '2017-11-21', 'no'),
('S99', 'P99', '2017-12-27', '-');

-- --------------------------------------------------------

--
-- Table structure for table `a_leave`
--

CREATE TABLE IF NOT EXISTS `a_leave` (
  `le_id` int(11) NOT NULL AUTO_INCREMENT,
  `s_id` varchar(10) NOT NULL,
  `l_id` varchar(10) NOT NULL,
  `reason` varchar(20) NOT NULL,
  `from_date` date NOT NULL,
  `to_date` date NOT NULL,
  `granted?` tinyint(1) NOT NULL,
  PRIMARY KEY (`le_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `a_leave`
--

INSERT INTO `a_leave` (`le_id`, `s_id`, `l_id`, `reason`, `from_date`, `to_date`, `granted?`) VALUES
(5, 'S02', 'L01', 'asdfghj', '2017-12-19', '2017-12-20', 0),
(6, 'S02', 'L01', 'qwe', '2017-12-20', '2017-12-21', 0),
(10, 'S01', 'L01', 'No', '2017-12-19', '2017-12-21', 1),
(11, 'S01', 'L99', 'no', '2017-12-19', '2017-12-22', 0),
(12, 'S01', 'L99', 'no', '2017-12-26', '2017-12-30', 0),
(14, 'S01', 'L01', 'NoReAsoN', '2019-08-14', '2020-11-12', 1),
(15, 'S01', 'L01', 'No', '2017-12-20', '2017-12-24', 1),
(16, 'S01', 'L01', 'srj', '2017-12-22', '2017-12-24', 0),
(17, 'S01', 'L01', 'no', '2017-12-26', '2017-12-29', 1),
(18, 'S01', 'L01', 'no', '2018-01-02', '2018-01-31', 1),
(19, 'S01', 'L01', 'asf', '2018-01-11', '2018-01-12', 1);

-- --------------------------------------------------------

--
-- Table structure for table `a_leave_l`
--

CREATE TABLE IF NOT EXISTS `a_leave_l` (
  `le_id` int(11) NOT NULL AUTO_INCREMENT,
  `l_id` varchar(10) NOT NULL,
  `reason` varchar(100) NOT NULL,
  `from_date` date NOT NULL,
  `to_date` date NOT NULL,
  `granted?` tinyint(1) NOT NULL,
  PRIMARY KEY (`le_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `a_leave_l`
--

INSERT INTO `a_leave_l` (`le_id`, `l_id`, `reason`, `from_date`, `to_date`, `granted?`) VALUES
(2, 'L01', 'no', '2017-12-03', '2017-12-20', 0),
(3, 'L01', 'no', '2017-12-19', '2017-12-23', 0),
(4, 'L01', 'no', '2017-12-22', '2018-01-20', 1),
(5, 'L01', 'sadf', '2017-12-28', '2017-12-31', 1),
(6, 'L01', 'asd', '2017-12-29', '2017-12-31', 1);

-- --------------------------------------------------------

--
-- Table structure for table `complaints`
--

CREATE TABLE IF NOT EXISTS `complaints` (
  `cid` int(11) NOT NULL AUTO_INCREMENT,
  `sid` varchar(10) NOT NULL,
  `lid` varchar(10) NOT NULL,
  `date` date NOT NULL,
  `details` varchar(100) NOT NULL,
  `r_flag` varchar(1) NOT NULL,
  PRIMARY KEY (`cid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `complaints`
--

INSERT INTO `complaints` (`cid`, `sid`, `lid`, `date`, `details`, `r_flag`) VALUES
(1, 'S01', 'L01', '2017-11-03', 'pneumonoultramicroscopicsilicovolcanoconiosis', 'd'),
(3, 'S01', 'L01', '2017-11-01', 'qwe', 'd'),
(4, 'S01', 'L01', '2017-11-13', 'Details', 'd'),
(5, 'S01', 'L01', '2017-11-01', '', ''),
(6, 'S01', 'L01', '2017-11-13', 'Details', 'd'),
(7, 'S01', 'L01', '2017-11-03', 'Details', 'd'),
(9, 'S01', 'L01', '2017-11-18', 'det', 'd'),
(10, 'S01', 'L01', '2017-12-18', 'comp17', 'd'),
(11, 'S01', 'L01', '2017-12-19', 'asdg', 'd'),
(14, 'S44', 'L01', '2017-12-20', 'arswgh', 'p'),
(15, 'S01', 'L01', '2017-12-27', 'qwe', 'p'),
(16, 's01', 'L01', '2018-01-01', 'suresh is not good', 'p');

-- --------------------------------------------------------

--
-- Table structure for table `dailysturec`
--

CREATE TABLE IF NOT EXISTS `dailysturec` (
  `s_id` varchar(10) NOT NULL,
  `present?` varchar(100) NOT NULL DEFAULT ' ',
  `date` date NOT NULL,
  `home-work` varchar(100) NOT NULL DEFAULT ' ',
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=163 ;

--
-- Dumping data for table `dailysturec`
--

INSERT INTO `dailysturec` (`s_id`, `present?`, `date`, `home-work`, `uid`) VALUES
('s02', 'TRUE', '2017-12-17', 'TRUE', 1),
('S99', 'TRU', '2017-12-17', 'TRU', 2),
('S01', 'DWD,JAVA', '2017-12-18', 'CMT,AJAVA', 3),
('S44', 'TRUE', '2017-12-19', 'TRUE', 4),
('S01', 'TRUE', '2017-12-27', 'TRUE', 5),
('S01', ' ,AJAVA', '2018-01-04', ' ', 6),
('S44', ' ', '2018-01-04', ' ,AJAVA', 7),
('S01', ' ', '2018-01-05', ' ', 8),
('S44', ' ,AJAVA', '2018-01-05', ' ', 9),
('S01', ' ,AJAVA', '2018-01-06', ' ,AJAVA', 155),
('S44', ' ,AJAVA', '2018-01-06', ' ,AJAVA', 156),
('S45', ' ,DBMS', '2018-01-06', ' ', 157),
('S99', ' ,ADBMS', '2018-01-06', ' ,ADBMS', 158),
('S01', ' ', '2018-01-21', ' ', 159),
('S44', ' ', '2018-01-21', ' ', 160),
('S01', ' ,AJAVA', '2018-01-26', ' ,AJAVA', 161),
('S44', ' ', '2018-01-26', ' ', 162);

-- --------------------------------------------------------

--
-- Table structure for table `enroll`
--

CREATE TABLE IF NOT EXISTS `enroll` (
  `s_id` varchar(10) NOT NULL,
  `enr_no` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`s_id`),
  UNIQUE KEY `s_id` (`s_id`,`enr_no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `enroll`
--

INSERT INTO `enroll` (`s_id`, `enr_no`) VALUES
('S01', 156630307017),
('s98', 156630307000),
('S99', 156630307003);

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE IF NOT EXISTS `event` (
  `e_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `e_name` varchar(30) NOT NULL,
  `date` date NOT NULL,
  `detail` varchar(100) NOT NULL,
  PRIMARY KEY (`e_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`e_id`, `e_name`, `date`, `detail`) VALUES
(2, 'fest13', '2017-09-04', 'Festival2'),
(3, 'fest14', '2017-09-05', 'Festival3'),
(4, 'event1', '2017-11-30', 'college event'),
(5, 'event1', '2017-12-01', 'event');

-- --------------------------------------------------------

--
-- Table structure for table `examtimetable`
--

CREATE TABLE IF NOT EXISTS `examtimetable` (
  `uid` int(10) NOT NULL AUTO_INCREMENT,
  `subject` varchar(20) NOT NULL,
  `sem` int(10) unsigned NOT NULL,
  `dept` varchar(20) NOT NULL,
  `time` varchar(7) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `examtimetable`
--

INSERT INTO `examtimetable` (`uid`, `subject`, `sem`, `dept`, `time`, `date`) VALUES
(2, 'JAVA', 6, 'Computer', '10:50', '2017-09-09'),
(3, 'CNS', 6, 'Mechanical', '10:10', '2017-09-05'),
(4, 'DWD', 4, 'Computer', '11:15', '2017-09-10'),
(13, 'wserty', 6, 'Electrical', '10:30', '2017-12-08'),
(14, 'cmt', 6, 'computer', '10:30', '2017-09-11'),
(15, 'dwd', 6, 'computer', '10:30', '2017-09-12'),
(16, 'ajava', 6, 'computer', '10:30', '2017-09-08');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE IF NOT EXISTS `feedback` (
  `f_id` int(11) NOT NULL AUTO_INCREMENT,
  `p_id` varchar(10) NOT NULL,
  `subject` varchar(20) NOT NULL,
  `details` varchar(200) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`f_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`f_id`, `p_id`, `subject`, `details`, `date`) VALUES
(1, 'P01', 'subj', 'det\r\n', '2017-12-18'),
(2, 'P02', 'subj2', 'det2', '2017-12-24'),
(3, 'P03', 'subj3', 'det3', '2017-12-22'),
(5, 'P01', 'qqqqqqqqqqqqqqqqqqqq', 'pneumonoultramicroscopicsilicovolcanoconiosis pneumonoultramicroscopicsilicovolcanoconiosis pneumonoultramicroscopicsilicovolcanoconiosis pneumonoultramicroscopicsilicovolcanoconiosis', '2017-12-19'),
(6, 'P01', 'asd', 'asd', '2017-12-21'),
(7, 'P01', 'asd', 'asd', '2017-12-27');

-- --------------------------------------------------------

--
-- Table structure for table `HOD`
--

CREATE TABLE IF NOT EXISTS `HOD` (
  `l_id` varchar(10) NOT NULL,
  `department` varchar(20) NOT NULL,
  PRIMARY KEY (`l_id`),
  UNIQUE KEY `department` (`department`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `HOD`
--

INSERT INTO `HOD` (`l_id`, `department`) VALUES
('L01', 'Computer'),
('L03', 'Electrical'),
('L02', 'Mechanical');

-- --------------------------------------------------------

--
-- Table structure for table `holiday`
--

CREATE TABLE IF NOT EXISTS `holiday` (
  `hid` int(11) NOT NULL AUTO_INCREMENT,
  `days` int(3) NOT NULL,
  `occ` varchar(20) NOT NULL,
  `date` date NOT NULL,
  UNIQUE KEY `hid_2` (`hid`),
  KEY `hid` (`hid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `holiday`
--

INSERT INTO `holiday` (`hid`, `days`, `occ`, `date`) VALUES
(2, 1, 'Heavy rain', '2017-12-24');

-- --------------------------------------------------------

--
-- Table structure for table `lecturer`
--

CREATE TABLE IF NOT EXISTS `lecturer` (
  `l_id` varchar(10) NOT NULL,
  `l_name` varchar(30) NOT NULL,
  `dept` varchar(20) NOT NULL,
  `subj` varchar(30) DEFAULT NULL,
  `subj2` varchar(30) DEFAULT NULL,
  `subj3` varchar(30) DEFAULT NULL,
  `subj4` varchar(30) DEFAULT NULL,
  `subj5` varchar(30) DEFAULT NULL,
  `subj6` varchar(30) DEFAULT NULL,
  `exp` float unsigned NOT NULL,
  `salary` int(11) NOT NULL,
  PRIMARY KEY (`l_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lecturer`
--

INSERT INTO `lecturer` (`l_id`, `l_name`, `dept`, `subj`, `subj2`, `subj3`, `subj4`, `subj5`, `subj6`, `exp`, `salary`) VALUES
('L01', 'QW', 'Computer', 'CP', 'ACP', 'DBMS', 'ADBMS', 'JAVA', 'AJAVA', 5, 50000),
('L02', 'ABCD', 'Computer', 'Maths1', 'Maths-II', 'DS', '.Net', 'DWPD', 'PPUD', 2, 60000),
('L03', 'ABCE', 'Computer', 'FOCA', 'SWPD', 'C++', 'CN', 'CMT', 'NMA', 1, 40000),
('L04', 'ABC', 'Computer', NULL, 'CPD', 'OS', 'COA', NULL, NULL, 2.5, 50000),
('L05', 'asd', 'Computer', 'FODE', 'Physics', 'MALP', 'WDT', 'CNS', 'MCAD', 7, 50000),
('L99', 'abc', 'Computer', 'ECHM', 'BE', NULL, 'FOSD', NULL, NULL, 5, 3000);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `ID` varchar(10) NOT NULL,
  `Pwd` varchar(200) NOT NULL,
  `Type` varchar(10) NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `ID` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`ID`, `Pwd`, `Type`) VALUES
('A01', '1a1dc91c907325c69271ddf0c944bc72', 'admin'),
('L01', '1a1dc91c907325c69271ddf0c944bc72', 'lecturer'),
('L02', '1a1dc91c907325c69271ddf0c944bc72', 'lecturer'),
('L99', '1a1dc91c907325c69271ddf0c944bc72', 'lecturer'),
('P01', '1a1dc91c907325c69271ddf0c944bc72', 'parent'),
('P03', '5f4dcc3b5aa765d61d8327deb882cf99', 'parent'),
('P04', '1a1dc91c907325c69271ddf0c944bc72', 'parent'),
('P44', '1a1dc91c907325c69271ddf0c944bc72', 'parent'),
('P45', '1a1dc91c907325c69271ddf0c944bc72', 'parent'),
('p98', '1a1dc91c907325c69271ddf0c944bc72', 'parent'),
('P99', '1a1dc91c907325c69271ddf0c944bc72', 'parent'),
('S01', '1a1dc91c907325c69271ddf0c944bc72', 'student'),
('S03', '5f4dcc3b5aa765d61d8327deb882cf99', 'student'),
('S04', '1a1dc91c907325c69271ddf0c944bc72', 'student'),
('S44', '1a1dc91c907325c69271ddf0c944bc72', 'student'),
('S45', '1a1dc91c907325c69271ddf0c944bc72', 'student'),
('s98', '1a1dc91c907325c69271ddf0c944bc72', 'student'),
('S99', '1a1dc91c907325c69271ddf0c944bc72', 'student');

-- --------------------------------------------------------

--
-- Table structure for table `midmarks`
--

CREATE TABLE IF NOT EXISTS `midmarks` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `s_id` varchar(10) NOT NULL,
  `subject` varchar(20) NOT NULL,
  `marks` int(3) NOT NULL,
  `dept` varchar(20) NOT NULL,
  `sem` int(11) NOT NULL,
  `submit_date` date NOT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=33 ;

--
-- Dumping data for table `midmarks`
--

INSERT INTO `midmarks` (`uid`, `s_id`, `subject`, `marks`, `dept`, `sem`, `submit_date`) VALUES
(31, 'S01', 'AJAVA', 23, 'Computer', 6, '2018-01-26'),
(32, 'S44', 'AJAVA', 24, 'Computer', 6, '2018-01-26');

-- --------------------------------------------------------

--
-- Table structure for table `notice`
--

CREATE TABLE IF NOT EXISTS `notice` (
  `nid` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(20) NOT NULL,
  `date` date NOT NULL,
  `details` varchar(100) NOT NULL,
  PRIMARY KEY (`nid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `notice`
--

INSERT INTO `notice` (`nid`, `title`, `date`, `details`) VALUES
(1, 'About CollegeUniform', '2019-09-03', 'Students Must Wear Proper CollegeUniform'),
(2, 'Notice2', '2017-09-04', 'notice_det2'),
(3, 'Notice3', '2017-09-05', 'notice_det3'),
(5, 'title99', '2017-12-01', 'details99'),
(6, 'title99', '2017-12-01', 'details99'),
(7, 'title99', '2017-12-01', 'details99'),
(8, 'title99', '2017-12-01', 'details99'),
(9, 'About: THIS', '2017-12-14', 'DETAILS'),
(10, 'Notice77', '2017-12-19', 'details77');

-- --------------------------------------------------------

--
-- Table structure for table `parents`
--

CREATE TABLE IF NOT EXISTS `parents` (
  `p_id` varchar(10) NOT NULL,
  `p_name` varchar(20) NOT NULL,
  `cont_no` int(10) NOT NULL,
  PRIMARY KEY (`p_id`),
  UNIQUE KEY `s_id` (`cont_no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `parents`
--

INSERT INTO `parents` (`p_id`, `p_name`, `cont_no`) VALUES
('P01', 'JKL', 456789123),
('P02', 'abc', 123456),
('P03', 'ABCde', 1234567899),
('P04', 'qwertyu', 987653),
('P44', 'abcd', 214748364),
('P45', 'abc', 12358),
('p98', 'lalubhai', 1472583695),
('P99', 'abc', 1234567895);

-- --------------------------------------------------------

--
-- Table structure for table `pma_column_info`
--

CREATE TABLE IF NOT EXISTS `pma_column_info` (
  `id` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `column_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `comment` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `mimetype` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `transformation` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `transformation_options` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `db_name` (`db_name`,`table_name`,`column_name`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Column information for phpMyAdmin' AUTO_INCREMENT=70 ;

--
-- Dumping data for table `pma_column_info`
--

INSERT INTO `pma_column_info` (`id`, `db_name`, `table_name`, `column_name`, `comment`, `mimetype`, `transformation`, `transformation_options`) VALUES
(1, 'spms', 'login', 'ID', '', '', '_', ''),
(2, 'spms', 'student', 'fees_p', '', '', '_', ''),
(3, 'spms', 'event', 'e_id', '', '', '_', ''),
(4, 'spms', 'event', 'detail', '', '', '_', ''),
(5, 'spms', 'dailysturec', 'uid', '', '', '_', ''),
(6, 'spms', 'dailysturec', 'home-work', '', '', '_', ''),
(7, 'spms', 'dailysturec', 'present?', '', '', '_', ''),
(8, 'spms', 'semwisesturec', 'sem', '', '', '_', ''),
(9, 'spms', 'semwisesturec', 'uid', '', '', '_', ''),
(10, 'spms', 'weeklytimetable', 'index', '', '', '_', ''),
(11, 'spms', 'weeklytimetable', 'uid', '', '', '_', ''),
(12, 'spms', 'lecturer', 'l_id', '', '', '_', ''),
(13, 'spms', 'lecturer', 'l_name', '', '', '_', ''),
(14, 'spms', 'lecturer', 'subjects', '', '', '_', ''),
(15, 'spms', 'lecturer', 'experience', '', '', '_', ''),
(16, 'spms', 'login', 'Pwd', '', '', '_', ''),
(17, 'spms', 'examtimetable', 'uid', '', '', '_', ''),
(19, 'spms', 'randomtest', 't_id', '', '', '_', ''),
(21, 'spms', 'student', 'total-att', '', '', '_', ''),
(22, 'spms', 'midmarks', 'dept', '', '', '_', ''),
(23, 'spms', 'Feedback', 'f_id', '', '', '_', ''),
(24, 'spms', 'Feedback', 'p_id', '', '', '_', ''),
(25, 'spms', 'Feedback', 'details', '', '', '_', ''),
(26, 'spms', 'Feedback', 'date', '', '', '_', ''),
(27, 'spms', 'Feedback', 'subject', '', '', '_', ''),
(28, 'spms', 'a_leave', 'le_id', '', '', '_', ''),
(29, 'spms', 'a_leave', 'from_date', '', '', '_', ''),
(30, 'spms', 'a_leave', 'to_date', '', '', '_', ''),
(31, 'spms', 'complaints', 'cid', '', '', '_', ''),
(32, 'spms', 'complaints', 'r_flag(p/r)', '', '', '_', ''),
(33, 'spms', 'complaints', 'r_flag', '', '', '_', ''),
(34, 'spms', 'Feedback', 'r_flag', '', '', '_', ''),
(35, 'spms', 'lecturer', 'exp', '', '', '_', ''),
(36, 'spms', 'lecturer', 'subj', '', '', '_', ''),
(37, 'spms', 'student', 's_id', '', '', '_', ''),
(38, 'spms', 'dailysturec', 's_id', '', '', '_', ''),
(39, 'spms', 'a_leave', 's_id', '', '', '_', ''),
(40, 'spms', 'complaints', 'sid', '', '', '_', ''),
(41, 'spms', 'complaints', 'lid', '', '', '_', ''),
(42, 'spms', 'enroll', 's_id', '', '', '_', ''),
(43, 'spms', 'fees', 's_id', '', '', '_', ''),
(44, 'spms', 'holiday', 'hid', '', '', '_', ''),
(45, 'spms', 'midmarks', 's_id', '', '', '_', ''),
(46, 'spms', 'notice', 'nid', '', '', '_', ''),
(47, 'spms', 'parents', 'p_id', '', '', '_', ''),
(48, 'spms', 'parents', 's_id', '', '', '_', ''),
(49, 'spms', 'randomtest', 's_id', '', '', '_', ''),
(50, 'spms', 'r_complaints', 'cid', '', '', '_', ''),
(51, 'spms', 'r_leave', 'uid', '', '', '_', ''),
(52, 'spms', 'r_leave', 'sid', '', '', '_', ''),
(53, 'spms', 'semwisesturec', 's_id', '', '', '_', ''),
(54, 'spms', 'student', 'p_id', '', '', '_', ''),
(55, 'spms', 'student', 'sem', '', '', '_', ''),
(56, 'spms', 'enroll', 'enr_no', '', '', '_', ''),
(57, 'spms', 'adm_c', 's_id', '', '', '_', ''),
(58, 'spms', 'adm_c', 'cancel_date', '', '', '_', ''),
(59, 'spms', 'adm_c', 'reason', '', '', '_', ''),
(60, 'spms', 'midmarks', 'uid', '', '', '_', ''),
(61, 'spms', 'adm_c', 'p_id', '', '', '_', ''),
(62, 'spms', 'event', 'e_name', '', '', '_', ''),
(63, 'spms', 'holiday', 'occ', '', '', '_', ''),
(64, 'spms', 'examtimetable', 'time', '', '', '_', ''),
(65, 'spms', 'examtimetable', 'sem', '', '', '_', ''),
(66, 'spms', 'lecturer', 'salary', '', '', '_', ''),
(67, 'spms', 'weeklytimetable', 'sem', '', '', '_', ''),
(68, 'spms', 'a_leave', 'l_id', '', '', '_', ''),
(69, 'spms', 'lecturer', 'dept', '', '', '_', '');

-- --------------------------------------------------------

--
-- Table structure for table `randomtest`
--

CREATE TABLE IF NOT EXISTS `randomtest` (
  `t_id` int(11) NOT NULL,
  `l_id` varchar(10) NOT NULL,
  `s_id` varchar(10) NOT NULL,
  `subject` varchar(20) NOT NULL,
  `marks` int(3) NOT NULL,
  `t_marks` int(11) NOT NULL,
  `date` date NOT NULL,
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

--
-- Dumping data for table `randomtest`
--

INSERT INTO `randomtest` (`t_id`, `l_id`, `s_id`, `subject`, `marks`, `t_marks`, `date`, `uid`) VALUES
(2, 'L01', 'S01', 'CMT', 67, 100, '2017-09-11', 1),
(3, 'L01', 'S01', 'JAVA', 0, 100, '2017-12-17', 2),
(4, 'L01', 'S44', 'JAVA ', 100, 100, '2017-12-15', 3),
(5, 'L01', 'S44', 'DWD', 99, 100, '2017-12-19', 4),
(6, 'L01', 'S01', 'JAVA2', 0, 100, '2017-12-27', 5),
(7, 'L01', 'S01', 'JAVA', 100, 100, '2018-01-07', 6),
(8, 'L01', 'S01', 'JAVA', 100, 100, '2018-01-07', 7),
(10, 'L01', 'S01', 'AJAVA', 21, 22, '2018-01-21', 13),
(10, 'L01', 'S44', 'AJAVA', 21, 22, '2018-01-21', 14),
(11, 'L01', 'S01', 'AJAVA', 1, 12, '2018-01-21', 15),
(11, 'L01', 'S44', 'AJAVA', 1, 12, '2018-01-21', 16),
(12, 'L01', 'S99', 'ADBMS', 10, 100, '2018-01-21', 17),
(13, 'L01', 'S45', 'DBMS', 0, 12, '2018-01-21', 18),
(17, 'L01', 'S01', 'AJAVA', 90, 100, '2018-01-24', 24),
(17, 'L01', 'S44', 'AJAVA', 70, 100, '2018-01-24', 26),
(18, 'L01', 'S01', 'AJAVA', 99, 100, '2018-01-24', 27),
(18, 'L01', 'S44', 'AJAVA', 99, 100, '2018-01-24', 28);

-- --------------------------------------------------------

--
-- Table structure for table `r_complaints`
--

CREATE TABLE IF NOT EXISTS `r_complaints` (
  `cid` int(11) NOT NULL AUTO_INCREMENT,
  `r_details` varchar(100) NOT NULL,
  `r_date` date NOT NULL,
  PRIMARY KEY (`cid`),
  UNIQUE KEY `cid` (`cid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `r_complaints`
--

INSERT INTO `r_complaints` (`cid`, `r_details`, `r_date`) VALUES
(1, 'qwe qwe e qwe qwe e qwe qwe e qwe qwe e qwe qwe e qwe qwe e qwe qwe e qwe qwe e qwe qwe e qwe qwe e ', '2017-12-19'),
(4, 'details2\r\n', '2017-12-19'),
(6, 'details2\r\n', '2017-11-01'),
(7, 'Details3', '2017-12-17'),
(9, 'Details3det4', '2017-12-19'),
(10, ' comp18', '2017-12-20'),
(11, ' dzj', '2017-12-21'),
(14, 'qwe qwe e qwe qwe e qwe qwe e qwe qwe e qwe qwe e qwe qwe e qwe qwe e qwe qwe e qwe qwe e qwe qwe e ', '2017-12-18');

-- --------------------------------------------------------

--
-- Table structure for table `semwisesturec`
--

CREATE TABLE IF NOT EXISTS `semwisesturec` (
  `s_id` varchar(10) NOT NULL,
  `sem` int(11) NOT NULL,
  `total-attend` int(5) NOT NULL,
  `spi` float NOT NULL,
  `performance-status` varchar(20) NOT NULL,
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  UNIQUE KEY `uid` (`uid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=116 ;

--
-- Dumping data for table `semwisesturec`
--

INSERT INTO `semwisesturec` (`s_id`, `sem`, `total-attend`, `spi`, `performance-status`, `uid`) VALUES
('S02', 5, 0, 9.3, 'great', 5),
('S01', 1, 17, 9.9, '2''', 7),
('S99', 1, 0, 9.9, 'good', 9),
('S99', 4, 0, 10, 'qwertyuiopasdfghjkl', 12),
('S99', 5, 0, 9.8, 'good', 13),
('S45', 1, 3, 10, 'good', 115);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE IF NOT EXISTS `student` (
  `s_id` varchar(10) NOT NULL,
  `s_name` varchar(20) NOT NULL,
  `total-att` int(11) NOT NULL,
  `p_id` varchar(10) NOT NULL,
  `c_sem` int(1) NOT NULL,
  `dept` varchar(20) NOT NULL,
  `fees_p` varchar(6) NOT NULL DEFAULT 'false',
  PRIMARY KEY (`s_id`),
  UNIQUE KEY `p_id` (`p_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`s_id`, `s_name`, `total-att`, `p_id`, `c_sem`, `dept`, `fees_p`) VALUES
('S01', 'Dev1', 31, 'P01', 6, 'Computer', 'true'),
('S02', 'Dev2', 2, 'P02', 5, 'Mechanical', 'false'),
('S44', 'Dev3', 4, 'P44', 6, 'Computer', 'false'),
('S45', 'Dev4', 14, 'P45', 3, 'Computer', 'false'),
('s98', 'raju', 2, 'p98', 4, 'Civil', 'false'),
('S99', 'adil', 2, 'P99', 4, 'Computer', 'false');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE IF NOT EXISTS `subjects` (
  `sub_id` int(11) NOT NULL AUTO_INCREMENT,
  `sub_name` varchar(30) NOT NULL,
  `l_id` varchar(10) NOT NULL,
  `sem` int(11) NOT NULL,
  `dept` varchar(20) NOT NULL,
  PRIMARY KEY (`sub_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=35 ;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`sub_id`, `sub_name`, `l_id`, `sem`, `dept`) VALUES
(3, 'ADBMS', 'L01', 4, 'Computer'),
(4, 'DBMS', 'L01', 3, 'Computer'),
(5, 'ACP', 'L01', 2, 'Computer'),
(6, 'CP', 'L01', 1, 'Computer'),
(9, 'JAVA', 'L01', 5, 'Computer'),
(10, 'AJAVA', 'L01', 6, 'computer'),
(11, 'Maths1', 'L02', 1, 'Computer'),
(12, 'DS', 'L02', 3, 'Computer'),
(13, '.NET', 'L02', 4, 'Computer'),
(14, 'DWPD', 'L02', 5, 'Computer'),
(15, 'PPUD', 'L02', 6, 'Computer'),
(16, 'FOCA', 'L03', 1, 'Computer'),
(17, 'SWPD', 'L03', 2, 'Computer'),
(18, 'C++', 'L03', 3, 'Computer'),
(19, 'CN', 'L03', 4, 'Computer'),
(20, 'CMT', 'L03', 5, 'Computer'),
(21, 'NMA', 'L03', 6, 'Computer'),
(22, 'CPD', 'L04', 2, 'Computer'),
(23, 'OS', 'L04', 3, 'Computer'),
(24, 'COA', 'L04', 4, 'Computer'),
(25, 'FODE', 'L05', 1, 'Computer'),
(26, 'PHYSICS', 'L05', 2, 'Computer'),
(27, 'MALP', 'L05', 3, 'Computer'),
(28, 'WDT', 'L05', 4, 'Computer'),
(29, 'CNS', 'L05', 5, 'Computer'),
(30, 'MCAD', 'L05', 6, 'Computer'),
(31, 'ECHM', 'L99', 1, 'Computer'),
(32, 'BE', 'L99', 2, 'Computer'),
(33, 'FOSD', 'L99', 4, 'Computer'),
(34, 'Maths2', 'L02', 2, 'Computer');

-- --------------------------------------------------------

--
-- Table structure for table `weeklytimetable`
--

CREATE TABLE IF NOT EXISTS `weeklytimetable` (
  `index` int(10) NOT NULL,
  `sem` int(10) unsigned NOT NULL,
  `monday` varchar(30) NOT NULL,
  `tuesday` varchar(30) NOT NULL,
  `wednesday` varchar(30) NOT NULL,
  `thursday` varchar(30) NOT NULL,
  `friday` varchar(30) NOT NULL,
  `saturday` varchar(30) NOT NULL,
  `dept` varchar(20) NOT NULL,
  `uid` int(10) NOT NULL AUTO_INCREMENT,
  UNIQUE KEY `uid` (`uid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `weeklytimetable`
--

INSERT INTO `weeklytimetable` (`index`, `sem`, `monday`, `tuesday`, `wednesday`, `thursday`, `friday`, `saturday`, `dept`, `uid`) VALUES
(2, 5, 'CN', 'CN', 'CN', 'CN', 'CN', 'CN', 'Computer', 1),
(1, 5, 'CMT', 'JAVA', 'CNS', 'CNS', 'CMT', 'JAVA', 'Computer', 2),
(3, 5, 'CMT', 'JAVA', 'CNS', 'CNS', 'CMT', 'JAVA', 'Computer', 3),
(4, 5, 'CMT', 'JAVA', 'CNS', 'CNS', 'CMT', 'JAVA', 'Computer', 4),
(5, 5, 'CMT', 'JAVA', 'CNS', 'CNS', 'CMT', 'JAVA', 'Computer', 5),
(6, 5, 'CMT', 'JAVA', 'CNS', 'CNS', 'CMT', 'JAVA', 'Computer', 6),
(1, 3, 'ME', 'ME', 'ME', 'ME', 'ME', 'ME', 'Mechanical', 7),
(2, 3, 'ME', 'ME', 'ME', 'ME', 'ME', 'ME', 'Mechanical', 8),
(3, 3, 'ME', 'ME', 'ME', 'ME', 'ME', 'ME', 'Mechanical', 9),
(4, 3, 'ME', 'ME', 'ME', 'ME', 'ME', 'ME', 'Mechanical', 10),
(5, 3, 'ME', 'ME', 'ME', 'ME', 'ME', 'ME', 'Mechanical', 11),
(6, 3, 'ME', 'ME', 'ME', 'ME', 'ME', 'ME', 'Mechanical', 12),
(1, 2, 'EE', 'EE', 'EE', 'EE', 'EE', 'EE', 'Electrical', 13),
(2, 2, 'EE', 'EE', 'EE', 'EE', 'EE', 'EE', 'Electrical', 14),
(3, 2, 'EE', 'EE', 'EE', 'EE', 'EE', 'EE', 'Electrical', 15),
(4, 2, 'EE', 'EE', 'EE', 'EE', 'EE', 'EE', 'Electrical', 16),
(5, 2, 'EE', 'EE', 'EE', 'EE', 'EE', 'EE', 'Electrical', 17),
(6, 2, 'EE', 'EE', 'EE', 'EE', 'EE', 'EE', 'Electrical', 18);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

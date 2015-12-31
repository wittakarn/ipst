-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 31, 2015 at 12:53 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ipst`
--

-- --------------------------------------------------------

--
-- Table structure for table `auth_tokens`
--

CREATE TABLE IF NOT EXISTS `auth_tokens` (
`id` int(11) NOT NULL,
  `token` char(64) DEFAULT NULL,
  `user_id` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auth_tokens`
--

INSERT INTO `auth_tokens` (`id`, `token`, `user_id`) VALUES
(2, 'f71c3438b214d1ab2ff7758b626645a8acf966ae7716e77174e74b5f8224e254', 'expert11');

-- --------------------------------------------------------

--
-- Table structure for table `book_category`
--

CREATE TABLE IF NOT EXISTS `book_category` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `book_category`
--

INSERT INTO `book_category` (`id`, `name`) VALUES
(1, 'หนังสือเรียนรู้เพิ่มเติมเพื่อเสริมศักยภาพวิชาวิทยาศาสตร์ ชั้นประถมศึกษาปีที่ 1'),
(2, 'หนังสือเรียนรู้เพิ่มเติมเพื่อเสริมศักยภาพวิชาวิทยาศาสตร์ ชั้นประถมศึกษาปีที่ 2'),
(3, 'หนังสือเรียนรู้เพิ่มเติมเพื่อเสริมศักยภาพวิชาวิทยาศาสตร์ ชั้นประถมศึกษาปีที่ 3'),
(4, 'หนังสือเรียนรู้เพิ่มเติมเพื่อเสริมศักยภาพวิชาวิทยาศาสตร์ ชั้นประถมศึกษาปีที่ 4'),
(5, 'หนังสือเรียนรู้เพิ่มเติมเพื่อเสริมศักยภาพวิชาวิทยาศาสตร์ ชั้นประถมศึกษาปีที่ 5'),
(6, 'วีดิทัศน์ (DVD) ประกอบการเรียนรู้วิชาวิทยาศาสตร์ ชั้นประถมศึกษาปีที่ 1'),
(7, 'วีดิทัศน์ (DVD) ประกอบการเรียนรู้วิชาวิทยาศาสตร์ ชั้นประถมศึกษาปีที่ 2'),
(8, 'วีดิทัศน์ (DVD) ประกอบการเรียนรู้วิชาวิทยาศาสตร์ ชั้นประถมศึกษาปีที่ 3'),
(9, 'วีดิทัศน์ (DVD) ประกอบการเรียนรู้วิชาวิทยาศาสตร์ ชั้นประถมศึกษาปีที่ 4'),
(10, 'วีดิทัศน์ (DVD) ประกอบการเรียนรู้วิชาวิทยาศาสตร์ ชั้นประถมศึกษาปีที่ 5'),
(11, 'วีดิทัศน์ (DVD) ประกอบการเรียนรู้วิชาวิทยาศาสตร์ ชั้นประถมศึกษาปีที่ 6'),
(12, 'หนังสือเรียนรู้เพิ่มเติมเพื่อเสริมศักยภาพวิชาคณิตศาสตร์ ชั้นประถมศึกษาปีที่ 1'),
(13, 'หนังสือเรียนรู้เพิ่มเติมเพื่อเสริมศักยภาพวิชาคณิตศาสตร์ ชั้นประถมศึกษาปีที่ 2'),
(14, 'หนังสือเรียนรู้เพิ่มเติมเพื่อเสริมศักยภาพวิชาคณิตศาสตร์ ชั้นประถมศึกษาปีที่ 3'),
(15, 'หนังสือเรียนรู้เพิ่มเติมเพื่อเสริมศักยภาพวิชาคณิตศาสตร์ ชั้นประถมศึกษาปีที่ 4'),
(16, 'หนังสือเรียนรู้เพิ่มเติมเพื่อเสริมศักยภาพวิชาคณิตศาสตร์ ชั้นประถมศึกษาปีที่ 5'),
(17, 'หนังสือเรียนรู้เพิ่มเติมเพื่อเสริมศักยภาพวิชาคณิตศาสตร์ ชั้นประถมศึกษาปีที่ 6'),
(18, 'หนังสือเรียนรู้เพิ่มเติมเพื่อเสริมศักยภาพวิชาคณิตศาสตร์ ชั้นมัธยมศึกษาปีที่ 1 เล่ม 1'),
(19, 'หนังสือเรียนรู้เพิ่มเติมเพื่อเสริมศักยภาพวิชาคณิตศาสตร์ ชั้นมัธยมศึกษาปีที่ 1 เล่ม 2'),
(20, 'หนังสือเรียนรู้เพิ่มเติมเพื่อเสริมศักยภาพวิชาคณิตศาสตร์ ชั้นมัธยมศึกษาปีที่ 2 เล่ม 1'),
(21, 'หนังสือเรียนรู้เพิ่มเติมเพื่อเสริมศักยภาพวิชาคณิตศาสตร์ ชั้นมัธยมศึกษาปีที่ 2 เล่ม 2'),
(22, 'หนังสือเรียนรู้เพิ่มเติมเพื่อเสริมศักยภาพวิชาคณิตศาสตร์ ชั้นมัธยมศึกษาปีที่ 3 เล่ม 1'),
(23, 'หนังสือเรียนรู้เพิ่มเติมเพื่อเสริมศักยภาพวิชาคณิตศาสตร์ ชั้นมัธยมศึกษาปีที่ 3 เล่ม 2'),
(24, 'หนังสือเรียนรู้เพิ่มเติมเพื่อเสริมศักยภาพ ฟิสิกส์ เล่ม 1'),
(25, 'หนังสือเรียนรู้เพิ่มเติมเพื่อเสริมศักยภาพ ฟิสิกส์ เล่ม 2'),
(26, 'หนังสือเรียนรู้เพิ่มเติมเพื่อเสริมศักยภาพ ฟิสิกส์ เล่ม 3'),
(27, 'หนังสือเรียนรู้เพิ่มเติมเพื่อเสริมศักยภาพ ฟิสิกส์ เล่ม 4'),
(28, 'หนังสือเรียนรู้เพิ่มเติมเพื่อเสริมศักยภาพ ฟิสิกส์ เล่ม 5'),
(29, 'หนังสือเรียนรู้เพิ่มเติมเพื่อเสริมศักยภาพ เคมี เล่ม 1'),
(30, 'หนังสือเรียนรู้เพิ่มเติมเพื่อเสริมศักยภาพ เคมี เล่ม 2'),
(31, 'หนังสือเรียนรู้เพิ่มเติมเพื่อเสริมศักยภาพ เคมี เล่ม 3'),
(32, 'หนังสือเรียนรู้เพิ่มเติมเพื่อเสริมศักยภาพ พื้นฐานชีววิทยา'),
(33, 'หนังสือเรียนรู้เพิ่มเติมเพื่อเสริมศักยภาพ ชีววิทยา เล่ม 1'),
(34, 'หนังสือเรียนรู้เพิ่มเติมเพื่อเสริมศักยภาพ ชีววิทยา เล่ม 2'),
(35, 'หนังสือเรียนรู้เพิ่มเติมเพื่อเสริมศักยภาพ ชีววิทยา เล่ม 3'),
(36, 'หนังสือเรียนรู้เพิ่มเติมเพื่อเสริมศักยภาพ ชีววิทยา เล่ม 4'),
(37, 'หนังสือเรียนรู้เพิ่มเติมเพื่อเสริมศักยภาพ ชีววิทยา เล่ม 5'),
(38, 'หนังสือเรียนรู้เพิ่มเติมเพื่อเสริมศักยภาพ วิชาโลก ดาราศาสตร์ และอวกาศ เล่ม 1'),
(39, 'หนังสือเรียนรู้เพิ่มเติมเพื่อเสริมศักยภาพ วิชาโลก ดาราศาสตร์ และอวกาศ เล่ม 2'),
(40, 'หนังสือเรียนรู้เพิ่มเติมเพื่อเสริมศักยภาพ วิชาโลก ดาราศาสตร์ และอวกาศ เล่ม 3'),
(41, 'หนังสือเรียนรู้เพิ่มเติมเพื่อเสริมศักยภาพ ความน่าจะเป็น'),
(42, 'หนังสือเรียนรู้เพิ่มเติมเพื่อเสริมศักยภาพ แคลคูลัสเบื้องต้น'),
(43, 'หนังสือเรียนรู้เพิ่มเติมเพื่อเสริมศักยภาพ จำนวนเชิงซ้อน'),
(44, 'หนังสือเรียนรู้เพิ่มเติมเพื่อเสริมศักยภาพ ตรรกศาสตร์และการพิสูจน์'),
(45, 'หนังสือเรียนรู้เพิ่มเติมเพื่อเสริมศักยภาพ ฟังก์ชันตรีโกณมิติ'),
(46, 'หนังสือเรียนรู้เพิ่มเติมเพื่อเสริมศักยภาพ ระบบจำนวนจริง'),
(47, 'หนังสือเรียนรู้เพิ่มเติมเพื่อเสริมศักยภาพ ระบบสมการเชิงเส้นและเมทริกซ์'),
(48, 'หนังสือเรียนรู้เพิ่มเติมเพื่อเสริมศักยภาพ เรขาคณิตวิเคราะห์'),
(49, 'หนังสือเรียนรู้เพิ่มเติมเพื่อเสริมศักยภาพ ลำดับและอนุกรม'),
(50, 'หนังสือเรียนรู้เพิ่มเติมเพื่อเสริมศักยภาพ เวกเตอร์ในสามมิติ');

-- --------------------------------------------------------

--
-- Table structure for table `contribute`
--

CREATE TABLE IF NOT EXISTS `contribute` (
  `id` int(11) NOT NULL COMMENT 'รหัสผู้ประเมิน',
  `i_receiver_fullname` varchar(100) NOT NULL COMMENT 'ชื่อ-สกุล',
  `t_receiver_address` varchar(300) NOT NULL COMMENT 'ที่อยู่',
  `i_receiver_postcode` varchar(10) NOT NULL COMMENT 'รหัสไปรษณีย์',
  `r_contribute_book_category_selected` int(2) NOT NULL COMMENT 'ชนิดของสื่อเสริมการเรียนรู้ของ สสวท.',
  `r_contribute_book_selected` int(2) NOT NULL COMMENT 'สือการเรียนรู้ที่เลือก'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `contribute`
--

INSERT INTO `contribute` (`id`, `i_receiver_fullname`, `t_receiver_address`, `i_receiver_postcode`, `r_contribute_book_category_selected`, `r_contribute_book_selected`) VALUES
(1, 'หม่อง เร่งอี้', 'ไม่มี', '110140', 2, 17),
(4, 'มานี มีหม้อ', 'ร้านมานี มีหม้อ', '10210', 4, 25);

-- --------------------------------------------------------

--
-- Table structure for table `design_book`
--

CREATE TABLE IF NOT EXISTS `design_book` (
  `id` int(11) NOT NULL COMMENT 'รหัสผู้ประเมิน',
  `r_d_2_1_1` char(1) DEFAULT NULL,
  `r_d_2_1_2` char(1) DEFAULT NULL,
  `t_d_2_1_3` varchar(200) DEFAULT NULL,
  `h_d_2_1_4` varchar(30) DEFAULT NULL,
  `r_d_3_1_1` char(1) DEFAULT NULL,
  `r_d_3_1_2` char(1) DEFAULT NULL,
  `t_d_3_1_3` varchar(200) DEFAULT NULL,
  `h_d_3_1_4` varchar(30) DEFAULT NULL,
  `r_d_5_1_1` char(1) DEFAULT NULL,
  `r_d_5_1_2` char(1) DEFAULT NULL,
  `t_d_5_1_3` varchar(200) DEFAULT NULL,
  `h_d_5_1_4` varchar(30) DEFAULT NULL,
  `r_d_6_1_1` char(1) DEFAULT NULL,
  `r_d_6_1_2` char(1) DEFAULT NULL,
  `t_d_6_1_3` varchar(200) DEFAULT NULL,
  `h_d_6_1_4` varchar(30) DEFAULT NULL,
  `r_d_8_1_1` char(1) DEFAULT NULL,
  `r_d_8_1_2` char(1) DEFAULT NULL,
  `t_d_8_1_3` varchar(200) DEFAULT NULL,
  `h_d_8_1_4` varchar(30) DEFAULT NULL,
  `r_d_9_1_1` char(1) DEFAULT NULL,
  `r_d_9_1_2` char(1) DEFAULT NULL,
  `t_d_9_1_3` varchar(200) DEFAULT NULL,
  `h_d_9_1_4` varchar(30) DEFAULT NULL,
  `r_d_89_1_1` char(1) DEFAULT NULL,
  `r_d_89_1_2` char(1) DEFAULT NULL,
  `t_d_89_1_3` varchar(200) DEFAULT NULL,
  `h_d_89_1_4` varchar(30) DEFAULT NULL,
  `r_d_101112_1_1` char(1) DEFAULT NULL,
  `r_d_101112_1_2` char(1) DEFAULT NULL,
  `t_d_101112_1_3` varchar(200) DEFAULT NULL,
  `h_d_101112_1_4` varchar(30) DEFAULT NULL,
  `r_d_101112_2_1` char(1) DEFAULT NULL,
  `r_d_101112_2_2` char(1) DEFAULT NULL,
  `t_d_101112_2_3` varchar(200) DEFAULT NULL,
  `h_d_101112_2_4` varchar(30) DEFAULT NULL,
  `r_d_all_1_1` char(1) DEFAULT NULL,
  `r_d_all_1_2` char(1) DEFAULT NULL,
  `t_d_all_1_3` varchar(200) DEFAULT NULL,
  `h_d_all_1_4` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `design_book_instructor`
--

CREATE TABLE IF NOT EXISTS `design_book_instructor` (
  `id` int(11) NOT NULL COMMENT 'รหัสผู้ประเมิน',
  `r_d_ins_2_1_1` char(1) DEFAULT NULL,
  `r_d_ins_2_1_2` char(1) DEFAULT NULL,
  `t_d_ins_2_1_3` varchar(200) DEFAULT NULL,
  `h_d_ins_2_1_4` varchar(30) DEFAULT NULL,
  `r_d_ins_3_1_1` char(1) DEFAULT NULL,
  `r_d_ins_3_1_2` char(1) DEFAULT NULL,
  `t_d_ins_3_1_3` varchar(200) DEFAULT NULL,
  `h_d_ins_3_1_4` varchar(30) DEFAULT NULL,
  `r_d_ins_5_1_1` char(1) DEFAULT NULL,
  `r_d_ins_5_1_2` char(1) DEFAULT NULL,
  `t_d_ins_5_1_3` varchar(200) DEFAULT NULL,
  `h_d_ins_5_1_4` varchar(30) DEFAULT NULL,
  `r_d_ins_6_1_1` char(1) DEFAULT NULL,
  `r_d_ins_6_1_2` char(1) DEFAULT NULL,
  `t_d_ins_6_1_3` varchar(200) DEFAULT NULL,
  `h_d_ins_6_1_4` varchar(30) DEFAULT NULL,
  `r_d_ins_8_1_1` char(1) DEFAULT NULL,
  `r_d_ins_8_1_2` char(1) DEFAULT NULL,
  `t_d_ins_8_1_3` varchar(200) DEFAULT NULL,
  `h_d_ins_8_1_4` varchar(30) DEFAULT NULL,
  `r_d_ins_9_1_1` char(1) DEFAULT NULL,
  `r_d_ins_9_1_2` char(1) DEFAULT NULL,
  `t_d_ins_9_1_3` varchar(200) DEFAULT NULL,
  `h_d_ins_9_1_4` varchar(30) DEFAULT NULL,
  `r_d_ins_101112_1_1` char(1) DEFAULT NULL,
  `r_d_ins_101112_1_2` char(1) DEFAULT NULL,
  `t_d_ins_101112_1_3` varchar(200) DEFAULT NULL,
  `h_d_ins_101112_1_4` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `math_book`
--

CREATE TABLE IF NOT EXISTS `math_book` (
  `id` int(11) NOT NULL COMMENT 'รหัสผู้ประเมิน',
  `r_m_1_1_1` char(1) DEFAULT NULL,
  `r_m_1_1_2` char(1) DEFAULT NULL,
  `t_m_1_1_3` varchar(200) DEFAULT NULL,
  `h_m_1_1_4` varchar(30) DEFAULT NULL,
  `r_m_1_2_1` char(1) DEFAULT NULL,
  `r_m_1_2_2` char(1) DEFAULT NULL,
  `t_m_1_2_3` varchar(200) DEFAULT NULL,
  `h_m_1_2_4` varchar(30) DEFAULT NULL,
  `r_m_1_3_1` char(1) DEFAULT NULL,
  `r_m_1_3_2` char(1) DEFAULT NULL,
  `t_m_1_3_3` varchar(200) DEFAULT NULL,
  `h_m_1_3_4` varchar(30) DEFAULT NULL,
  `r_m_1_4_1` char(1) DEFAULT NULL,
  `r_m_1_4_2` char(1) DEFAULT NULL,
  `t_m_1_4_3` varchar(200) DEFAULT NULL,
  `h_m_1_4_4` varchar(30) DEFAULT NULL,
  `r_m_2_1_1` char(1) DEFAULT NULL,
  `r_m_2_1_2` char(1) DEFAULT NULL,
  `t_m_2_1_3` varchar(200) DEFAULT NULL,
  `h_m_2_1_4` varchar(30) DEFAULT NULL,
  `r_m_2_2_1` char(1) DEFAULT NULL,
  `r_m_2_2_2` char(1) DEFAULT NULL,
  `t_m_2_2_3` varchar(200) DEFAULT NULL,
  `h_m_2_2_4` varchar(30) DEFAULT NULL,
  `r_m_2_3_1` char(1) DEFAULT NULL,
  `r_m_2_3_2` char(1) DEFAULT NULL,
  `t_m_2_3_3` varchar(200) DEFAULT NULL,
  `h_m_2_3_4` varchar(30) DEFAULT NULL,
  `r_m_3_1_1` char(1) DEFAULT NULL,
  `r_m_3_1_2` char(1) DEFAULT NULL,
  `t_m_3_1_3` varchar(200) DEFAULT NULL,
  `h_m_3_1_4` varchar(30) DEFAULT NULL,
  `r_m_3_2_1` char(1) DEFAULT NULL,
  `r_m_3_2_2` char(1) DEFAULT NULL,
  `t_m_3_2_3` varchar(200) DEFAULT NULL,
  `h_m_3_2_4` varchar(30) DEFAULT NULL,
  `r_m_3_3_1` char(1) DEFAULT NULL,
  `r_m_3_3_2` char(1) DEFAULT NULL,
  `t_m_3_3_3` varchar(200) DEFAULT NULL,
  `h_m_3_3_4` varchar(30) DEFAULT NULL,
  `r_m_4_1_1` char(1) DEFAULT NULL,
  `r_m_4_1_2` char(1) DEFAULT NULL,
  `t_m_4_1_3` varchar(200) DEFAULT NULL,
  `h_m_4_1_4` varchar(30) DEFAULT NULL,
  `r_m_4_2_1` char(1) DEFAULT NULL,
  `r_m_4_2_2` char(1) DEFAULT NULL,
  `t_m_4_2_3` varchar(200) DEFAULT NULL,
  `h_m_4_2_4` varchar(30) DEFAULT NULL,
  `r_m_4_3_1` char(1) DEFAULT NULL,
  `r_m_4_3_2` char(1) DEFAULT NULL,
  `t_m_4_3_3` varchar(200) DEFAULT NULL,
  `h_m_4_3_4` varchar(30) DEFAULT NULL,
  `r_m_5_1_1` char(1) DEFAULT NULL,
  `r_m_5_1_2` char(1) DEFAULT NULL,
  `t_m_5_1_3` varchar(200) DEFAULT NULL,
  `h_m_5_1_4` varchar(30) DEFAULT NULL,
  `r_m_5_2_1` char(1) DEFAULT NULL,
  `r_m_5_2_2` char(1) DEFAULT NULL,
  `t_m_5_2_3` varchar(200) DEFAULT NULL,
  `h_m_5_2_4` varchar(30) DEFAULT NULL,
  `r_m_5_3_1` char(1) DEFAULT NULL,
  `r_m_5_3_2` char(1) DEFAULT NULL,
  `t_m_5_3_3` varchar(200) DEFAULT NULL,
  `h_m_5_3_4` varchar(30) DEFAULT NULL,
  `r_m_6_1_1` char(1) DEFAULT NULL,
  `r_m_6_1_2` char(1) DEFAULT NULL,
  `t_m_6_1_3` varchar(200) DEFAULT NULL,
  `h_m_6_1_4` varchar(30) DEFAULT NULL,
  `r_m_6_2_1` char(1) DEFAULT NULL,
  `r_m_6_2_2` char(1) DEFAULT NULL,
  `t_m_6_2_3` varchar(200) DEFAULT NULL,
  `h_m_6_2_4` varchar(30) DEFAULT NULL,
  `r_m_6_3_1` char(1) DEFAULT NULL,
  `r_m_6_3_2` char(1) DEFAULT NULL,
  `t_m_6_3_3` varchar(200) DEFAULT NULL,
  `h_m_6_3_4` varchar(30) DEFAULT NULL,
  `r_m_7_1_1` char(1) DEFAULT NULL,
  `r_m_7_1_2` char(1) DEFAULT NULL,
  `t_m_7_1_3` varchar(200) DEFAULT NULL,
  `h_m_7_1_4` varchar(30) DEFAULT NULL,
  `r_m_7_2_1` char(1) DEFAULT NULL,
  `r_m_7_2_2` char(1) DEFAULT NULL,
  `t_m_7_2_3` varchar(200) DEFAULT NULL,
  `h_m_7_2_4` varchar(30) DEFAULT NULL,
  `r_m_7_3_1` char(1) DEFAULT NULL,
  `r_m_7_3_2` char(1) DEFAULT NULL,
  `t_m_7_3_3` varchar(200) DEFAULT NULL,
  `h_m_7_3_4` varchar(30) DEFAULT NULL,
  `r_m_7_4_1` char(1) DEFAULT NULL,
  `r_m_7_4_2` char(1) DEFAULT NULL,
  `t_m_7_4_3` varchar(200) DEFAULT NULL,
  `h_m_7_4_4` varchar(30) DEFAULT NULL,
  `r_m_8_1_1` char(1) DEFAULT NULL,
  `r_m_8_1_2` char(1) DEFAULT NULL,
  `t_m_8_1_3` varchar(200) DEFAULT NULL,
  `h_m_8_1_4` varchar(30) DEFAULT NULL,
  `r_m_8_2_1` char(1) DEFAULT NULL,
  `r_m_8_2_2` char(1) DEFAULT NULL,
  `t_m_8_2_3` varchar(200) DEFAULT NULL,
  `h_m_8_2_4` varchar(30) DEFAULT NULL,
  `r_m_8_3_1` char(1) DEFAULT NULL,
  `r_m_8_3_2` char(1) DEFAULT NULL,
  `t_m_8_3_3` varchar(200) DEFAULT NULL,
  `h_m_8_3_4` varchar(30) DEFAULT NULL,
  `r_m_8_4_1` char(1) DEFAULT NULL,
  `r_m_8_4_2` char(1) DEFAULT NULL,
  `t_m_8_4_3` varchar(200) DEFAULT NULL,
  `h_m_8_4_4` varchar(30) DEFAULT NULL,
  `r_m_9_1_1` char(1) DEFAULT NULL,
  `r_m_9_1_2` char(1) DEFAULT NULL,
  `t_m_9_1_3` varchar(200) DEFAULT NULL,
  `h_m_9_1_4` varchar(30) DEFAULT NULL,
  `r_m_9_2_1` char(1) DEFAULT NULL,
  `r_m_9_2_2` char(1) DEFAULT NULL,
  `t_m_9_2_3` varchar(200) DEFAULT NULL,
  `h_m_9_2_4` varchar(30) DEFAULT NULL,
  `r_m_9_3_1` char(1) DEFAULT NULL,
  `r_m_9_3_2` char(1) DEFAULT NULL,
  `t_m_9_3_3` varchar(200) DEFAULT NULL,
  `h_m_9_3_4` varchar(30) DEFAULT NULL,
  `r_m_9_4_1` char(1) DEFAULT NULL,
  `r_m_9_4_2` char(1) DEFAULT NULL,
  `t_m_9_4_3` varchar(200) DEFAULT NULL,
  `h_m_9_4_4` varchar(30) DEFAULT NULL,
  `r_m_101112_1_1` char(1) DEFAULT NULL,
  `r_m_101112_1_2` char(1) DEFAULT NULL,
  `t_m_101112_1_3` varchar(200) DEFAULT NULL,
  `h_m_101112_1_4` varchar(30) DEFAULT NULL,
  `r_m_101112_2_1` char(1) DEFAULT NULL,
  `r_m_101112_2_2` char(1) DEFAULT NULL,
  `t_m_101112_2_3` varchar(200) DEFAULT NULL,
  `h_m_101112_2_4` varchar(30) DEFAULT NULL,
  `r_m_101112_3_1` char(1) DEFAULT NULL,
  `r_m_101112_3_2` char(1) DEFAULT NULL,
  `t_m_101112_3_3` varchar(200) DEFAULT NULL,
  `h_m_101112_3_4` varchar(30) DEFAULT NULL,
  `r_m_101112_4_1` char(1) DEFAULT NULL,
  `r_m_101112_4_2` char(1) DEFAULT NULL,
  `t_m_101112_4_3` varchar(200) DEFAULT NULL,
  `h_m_101112_4_4` varchar(30) DEFAULT NULL,
  `r_m_101112_5_1` char(1) DEFAULT NULL,
  `r_m_101112_5_2` char(1) DEFAULT NULL,
  `t_m_101112_5_3` varchar(200) DEFAULT NULL,
  `h_m_101112_5_4` varchar(30) DEFAULT NULL,
  `r_m_101112_6_1` char(1) DEFAULT NULL,
  `r_m_101112_6_2` char(1) DEFAULT NULL,
  `t_m_101112_6_3` varchar(200) DEFAULT NULL,
  `h_m_101112_6_4` varchar(30) DEFAULT NULL,
  `r_m_101112_7_1` char(1) DEFAULT NULL,
  `r_m_101112_7_2` char(1) DEFAULT NULL,
  `t_m_101112_7_3` varchar(200) DEFAULT NULL,
  `h_m_101112_7_4` varchar(30) DEFAULT NULL,
  `r_m_101112_8_1` char(1) DEFAULT NULL,
  `r_m_101112_8_2` char(1) DEFAULT NULL,
  `t_m_101112_8_3` varchar(200) DEFAULT NULL,
  `h_m_101112_8_4` varchar(30) DEFAULT NULL,
  `r_m_101112_9_1` char(1) DEFAULT NULL,
  `r_m_101112_9_2` char(1) DEFAULT NULL,
  `t_m_101112_9_3` varchar(200) DEFAULT NULL,
  `h_m_101112_9_4` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `math_book_instructor`
--

CREATE TABLE IF NOT EXISTS `math_book_instructor` (
  `id` int(11) NOT NULL COMMENT 'รหัสผู้ประเมิน',
  `r_m_ins_1_1_1` char(1) DEFAULT NULL,
  `r_m_ins_1_1_2` char(1) DEFAULT NULL,
  `t_m_ins_1_1_3` varchar(200) DEFAULT NULL,
  `h_m_ins_1_1_4` varchar(30) DEFAULT NULL,
  `r_m_ins_1_2_1` char(1) DEFAULT NULL,
  `r_m_ins_1_2_2` char(1) DEFAULT NULL,
  `t_m_ins_1_2_3` varchar(200) DEFAULT NULL,
  `h_m_ins_1_2_4` varchar(30) DEFAULT NULL,
  `r_m_ins_2_1_1` char(1) DEFAULT NULL,
  `r_m_ins_2_1_2` char(1) DEFAULT NULL,
  `t_m_ins_2_1_3` varchar(200) DEFAULT NULL,
  `h_m_ins_2_1_4` varchar(30) DEFAULT NULL,
  `r_m_ins_3_1_1` char(1) DEFAULT NULL,
  `r_m_ins_3_1_2` char(1) DEFAULT NULL,
  `t_m_ins_3_1_3` varchar(200) DEFAULT NULL,
  `h_m_ins_3_1_4` varchar(30) DEFAULT NULL,
  `r_m_ins_4_1_1` char(1) DEFAULT NULL,
  `r_m_ins_4_1_2` char(1) DEFAULT NULL,
  `t_m_ins_4_1_3` varchar(200) DEFAULT NULL,
  `h_m_ins_4_1_4` varchar(30) DEFAULT NULL,
  `r_m_ins_5_1_1` char(1) DEFAULT NULL,
  `r_m_ins_5_1_2` char(1) DEFAULT NULL,
  `t_m_ins_5_1_3` varchar(200) DEFAULT NULL,
  `h_m_ins_5_1_4` varchar(30) DEFAULT NULL,
  `r_m_ins_6_1_1` char(1) DEFAULT NULL,
  `r_m_ins_6_1_2` char(1) DEFAULT NULL,
  `t_m_ins_6_1_3` varchar(200) DEFAULT NULL,
  `h_m_ins_6_1_4` varchar(30) DEFAULT NULL,
  `r_m_ins_7_1_1` char(1) DEFAULT NULL,
  `r_m_ins_7_1_2` char(1) DEFAULT NULL,
  `t_m_ins_7_1_3` varchar(200) DEFAULT NULL,
  `h_m_ins_7_1_4` varchar(30) DEFAULT NULL,
  `r_m_ins_7_2_1` char(1) DEFAULT NULL,
  `r_m_ins_7_2_2` char(1) DEFAULT NULL,
  `t_m_ins_7_2_3` varchar(200) DEFAULT NULL,
  `h_m_ins_7_2_4` varchar(30) DEFAULT NULL,
  `r_m_ins_7_3_1` char(1) DEFAULT NULL,
  `r_m_ins_7_3_2` char(1) DEFAULT NULL,
  `t_m_ins_7_3_3` varchar(200) DEFAULT NULL,
  `h_m_ins_7_3_4` varchar(30) DEFAULT NULL,
  `r_m_ins_7_4_1` char(1) DEFAULT NULL,
  `r_m_ins_7_4_2` char(1) DEFAULT NULL,
  `t_m_ins_7_4_3` varchar(200) DEFAULT NULL,
  `h_m_ins_7_4_4` varchar(30) DEFAULT NULL,
  `r_m_ins_8_1_1` char(1) DEFAULT NULL,
  `r_m_ins_8_1_2` char(1) DEFAULT NULL,
  `t_m_ins_8_1_3` varchar(200) DEFAULT NULL,
  `h_m_ins_8_1_4` varchar(30) DEFAULT NULL,
  `r_m_ins_8_2_1` char(1) DEFAULT NULL,
  `r_m_ins_8_2_2` char(1) DEFAULT NULL,
  `t_m_ins_8_2_3` varchar(200) DEFAULT NULL,
  `h_m_ins_8_2_4` varchar(30) DEFAULT NULL,
  `r_m_ins_8_3_1` char(1) DEFAULT NULL,
  `r_m_ins_8_3_2` char(1) DEFAULT NULL,
  `t_m_ins_8_3_3` varchar(200) DEFAULT NULL,
  `h_m_ins_8_3_4` varchar(30) DEFAULT NULL,
  `r_m_ins_8_4_1` char(1) DEFAULT NULL,
  `r_m_ins_8_4_2` char(1) DEFAULT NULL,
  `t_m_ins_8_4_3` varchar(200) DEFAULT NULL,
  `h_m_ins_8_4_4` varchar(30) DEFAULT NULL,
  `r_m_ins_9_1_1` char(1) DEFAULT NULL,
  `r_m_ins_9_1_2` char(1) DEFAULT NULL,
  `t_m_ins_9_1_3` varchar(200) DEFAULT NULL,
  `h_m_ins_9_1_4` varchar(30) DEFAULT NULL,
  `r_m_ins_9_2_1` char(1) DEFAULT NULL,
  `r_m_ins_9_2_2` char(1) DEFAULT NULL,
  `t_m_ins_9_2_3` varchar(200) DEFAULT NULL,
  `h_m_ins_9_2_4` varchar(30) DEFAULT NULL,
  `r_m_ins_9_3_1` char(1) DEFAULT NULL,
  `r_m_ins_9_3_2` char(1) DEFAULT NULL,
  `t_m_ins_9_3_3` varchar(200) DEFAULT NULL,
  `h_m_ins_9_3_4` varchar(30) DEFAULT NULL,
  `r_m_ins_9_4_1` char(1) DEFAULT NULL,
  `r_m_ins_9_4_2` char(1) DEFAULT NULL,
  `t_m_ins_9_4_3` varchar(200) DEFAULT NULL,
  `h_m_ins_9_4_4` varchar(30) DEFAULT NULL,
  `r_m_ins_101112_1_1` char(1) DEFAULT NULL,
  `r_m_ins_101112_1_2` char(1) DEFAULT NULL,
  `t_m_ins_101112_1_3` varchar(200) DEFAULT NULL,
  `h_m_ins_101112_1_4` varchar(30) DEFAULT NULL,
  `r_m_ins_101112_2_1` char(1) DEFAULT NULL,
  `r_m_ins_101112_2_2` char(1) DEFAULT NULL,
  `t_m_ins_101112_2_3` varchar(200) DEFAULT NULL,
  `h_m_ins_101112_2_4` varchar(30) DEFAULT NULL,
  `r_m_ins_101112_3_1` char(1) DEFAULT NULL,
  `r_m_ins_101112_3_2` char(1) DEFAULT NULL,
  `t_m_ins_101112_3_3` varchar(200) DEFAULT NULL,
  `h_m_ins_101112_3_4` varchar(30) DEFAULT NULL,
  `r_m_ins_101112_4_1` char(1) DEFAULT NULL,
  `r_m_ins_101112_4_2` char(1) DEFAULT NULL,
  `t_m_ins_101112_4_3` varchar(200) DEFAULT NULL,
  `h_m_ins_101112_4_4` varchar(30) DEFAULT NULL,
  `r_m_ins_101112_5_1` char(1) DEFAULT NULL,
  `r_m_ins_101112_5_2` char(1) DEFAULT NULL,
  `t_m_ins_101112_5_3` varchar(200) DEFAULT NULL,
  `h_m_ins_101112_5_4` varchar(30) DEFAULT NULL,
  `r_m_ins_101112_6_1` char(1) DEFAULT NULL,
  `r_m_ins_101112_6_2` char(1) DEFAULT NULL,
  `t_m_ins_101112_6_3` varchar(200) DEFAULT NULL,
  `h_m_ins_101112_6_4` varchar(30) DEFAULT NULL,
  `r_m_ins_101112_7_1` char(1) DEFAULT NULL,
  `r_m_ins_101112_7_2` char(1) DEFAULT NULL,
  `t_m_ins_101112_7_3` varchar(200) DEFAULT NULL,
  `h_m_ins_101112_7_4` varchar(30) DEFAULT NULL,
  `r_m_ins_101112_8_1` char(1) DEFAULT NULL,
  `r_m_ins_101112_8_2` char(1) DEFAULT NULL,
  `t_m_ins_101112_8_3` varchar(200) DEFAULT NULL,
  `h_m_ins_101112_8_4` varchar(30) DEFAULT NULL,
  `r_m_ins_101112_9_1` char(1) DEFAULT NULL,
  `r_m_ins_101112_9_2` char(1) DEFAULT NULL,
  `t_m_ins_101112_9_3` varchar(200) DEFAULT NULL,
  `h_m_ins_101112_9_4` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `participant`
--

CREATE TABLE IF NOT EXISTS `participant` (
`id` int(11) NOT NULL COMMENT 'รหัสผู้ประเมิน',
  `type` char(1) NOT NULL COMMENT 'ประเภทผู้ประเมิน (s=student, t=teacher)',
  `status` char(1) NOT NULL DEFAULT 'a' COMMENT 'สถานะของแบบประเมิน (a=active, i=inactive)',
  `create_date` date NOT NULL COMMENT 'วันที่ประเมิน',
  `r_sex` char(1) NOT NULL COMMENT 'เพศ',
  `s_degree` int(11) DEFAULT NULL COMMENT 'ระดับชั้นที่นักเรียนศึกษา',
  `i_school_name` varchar(100) DEFAULT NULL COMMENT 'โรงเรียนของนักเรียน',
  `s_province` int(11) DEFAULT NULL COMMENT 'จังหวัดที่ตั้งของโรงเรียนของนักเรียน',
  `s_age` int(11) DEFAULT NULL COMMENT 'อายุของครู',
  `r_degree` char(1) DEFAULT NULL COMMENT 'วุฒิการศึกษาสูงสุด (1-4)',
  `c_s` char(1) DEFAULT NULL COMMENT 'วิทยาศาสตร์',
  `c_s_1` char(1) DEFAULT NULL COMMENT 'วิทยาศาสตร์ ป.1',
  `c_s_2` char(1) DEFAULT NULL COMMENT 'วิทยาศาสตร์ ป.2',
  `c_s_3` char(1) DEFAULT NULL COMMENT 'วิทยาศาสตร์ ป.3',
  `c_s_4` char(1) DEFAULT NULL COMMENT 'วิทยาศาสตร์ ป.4',
  `c_s_5` char(1) DEFAULT NULL COMMENT 'วิทยาศาสตร์ ป.5',
  `c_s_6` char(1) DEFAULT NULL COMMENT 'วิทยาศาสตร์ ป.6',
  `c_s_7` char(1) DEFAULT NULL COMMENT 'วิทยาศาสตร์ ม.1',
  `c_s_8` char(1) DEFAULT NULL COMMENT 'วิทยาศาสตร์ ม.2',
  `c_s_9` char(1) DEFAULT NULL COMMENT 'วิทยาศาสตร์ ม.3',
  `c_s_10` char(1) DEFAULT NULL COMMENT 'วิทยาศาสตร์ ม.4',
  `c_s_11` char(1) DEFAULT NULL COMMENT 'วิทยาศาสตร์ ม.5',
  `c_s_12` char(1) DEFAULT NULL COMMENT 'วิทยาศาสตร์ ม.6',
  `c_m` char(1) DEFAULT NULL COMMENT 'คณิตศาสตร์',
  `c_m_1` char(1) DEFAULT NULL COMMENT 'คณิตศาสตร์ ป.1',
  `c_m_2` char(1) DEFAULT NULL COMMENT 'คณิตศาสตร์ ป.2',
  `c_m_3` char(1) DEFAULT NULL COMMENT 'คณิตศาสตร์ ป.3',
  `c_m_4` char(1) DEFAULT NULL COMMENT 'คณิตศาสตร์ ป.4',
  `c_m_5` char(1) DEFAULT NULL COMMENT 'คณิตศาสตร์ ป.5',
  `c_m_6` char(1) DEFAULT NULL COMMENT 'คณิตศาสตร์ ป.6',
  `c_m_7` char(1) DEFAULT NULL COMMENT 'คณิตศาสตร์ ม.1',
  `c_m_8` char(1) DEFAULT NULL COMMENT 'คณิตศาสตร์ ม.2',
  `c_m_9` char(1) DEFAULT NULL COMMENT 'คณิตศาสตร์ ม.3',
  `c_m_10` char(1) DEFAULT NULL COMMENT 'คณิตศาสตร์ ม.4',
  `c_m_11` char(1) DEFAULT NULL COMMENT 'คณิตศาสตร์ ม.5',
  `c_m_12` char(1) DEFAULT NULL COMMENT 'คณิตศาสตร์ ม.6',
  `c_t` char(1) DEFAULT NULL COMMENT 'เทคโนโลยีสารสนเทศและการสื่อสาร',
  `c_t_1` char(1) DEFAULT NULL COMMENT 'เทคโนโลยีสารสนเทศและการสื่อสาร ป.1',
  `c_t_2` char(1) DEFAULT NULL COMMENT 'เทคโนโลยีสารสนเทศและการสื่อสาร ป.2',
  `c_t_3` char(1) DEFAULT NULL COMMENT 'เทคโนโลยีสารสนเทศและการสื่อสาร ป.3',
  `c_t_4` char(1) DEFAULT NULL COMMENT 'เทคโนโลยีสารสนเทศและการสื่อสาร ป.4',
  `c_t_5` char(1) DEFAULT NULL COMMENT 'เทคโนโลยีสารสนเทศและการสื่อสาร ป.5',
  `c_t_6` char(1) DEFAULT NULL COMMENT 'เทคโนโลยีสารสนเทศและการสื่อสาร ป.6',
  `c_t_7` char(1) DEFAULT NULL COMMENT 'เทคโนโลยีสารสนเทศและการสื่อสาร ม.1',
  `c_t_8` char(1) DEFAULT NULL COMMENT 'เทคโนโลยีสารสนเทศและการสื่อสาร ม.2',
  `c_t_9` char(1) DEFAULT NULL COMMENT 'เทคโนโลยีสารสนเทศและการสื่อสาร ม.3',
  `c_t_10` char(1) DEFAULT NULL COMMENT 'เทคโนโลยีสารสนเทศและการสื่อสาร ม.4',
  `c_t_11` char(1) DEFAULT NULL COMMENT 'เทคโนโลยีสารสนเทศและการสื่อสาร ม.5',
  `c_t_12` char(1) DEFAULT NULL COMMENT 'เทคโนโลยีสารสนเทศและการสื่อสาร ม.6',
  `c_d` char(1) DEFAULT NULL COMMENT 'การออกแบบและเทคโนโลยี',
  `c_d_1` char(1) DEFAULT NULL COMMENT 'การออกแบบและเทคโนโลยี ป.1',
  `c_d_2` char(1) DEFAULT NULL COMMENT 'การออกแบบและเทคโนโลยี ป.2',
  `c_d_3` char(1) DEFAULT NULL COMMENT 'การออกแบบและเทคโนโลยี ป.3',
  `c_d_4` char(1) DEFAULT NULL COMMENT 'การออกแบบและเทคโนโลยี ป.4',
  `c_d_5` char(1) DEFAULT NULL COMMENT 'การออกแบบและเทคโนโลยี ป.5',
  `c_d_6` char(1) DEFAULT NULL COMMENT 'การออกแบบและเทคโนโลยี ป.6',
  `c_d_7` char(1) DEFAULT NULL COMMENT 'การออกแบบและเทคโนโลยี ม.1',
  `c_d_8` char(1) DEFAULT NULL COMMENT 'การออกแบบและเทคโนโลยี ม.2',
  `c_d_9` char(1) DEFAULT NULL COMMENT 'การออกแบบและเทคโนโลยี ม.3',
  `c_d_10` char(1) DEFAULT NULL COMMENT 'การออกแบบและเทคโนโลยี ม.4',
  `c_d_11` char(1) DEFAULT NULL COMMENT 'การออกแบบและเทคโนโลยี ม.5',
  `c_d_12` char(1) DEFAULT NULL COMMENT 'การออกแบบและเทคโนโลยี ม.6',
  `s_experience` int(11) DEFAULT NULL COMMENT 'ประสบการณ์ในการสอน',
  `c_school_under_1` char(1) DEFAULT NULL COMMENT 'สำนักงานพื้นที่การศึกษาประถมศึกษา',
  `c_school_under_2` char(1) DEFAULT NULL COMMENT 'สำนักงานพื้นที่การศึกษามัธยมศึกษา(สพม.)',
  `c_school_under_3` char(1) DEFAULT NULL COMMENT 'สำนักงานคณะกรรมการส่งเสริมการศึกษาเอกชน(สช.)',
  `c_school_under_4` char(1) DEFAULT NULL COMMENT 'สำนักงานคณะกรรมการการอุดมศึกษา(สกอ.)',
  `c_school_under_5` char(1) DEFAULT NULL COMMENT 'สำนักการศึกษา กรุงเทพมหานคร',
  `c_school_under_6` char(1) DEFAULT NULL COMMENT 'องค์การบริหารส่วนจังหวัด(อบจ.)',
  `c_school_under_7` char(1) DEFAULT NULL COMMENT 'เทศบาล',
  `c_school_under_8` char(1) DEFAULT NULL COMMENT 'อื่นๆ',
  `i_school_under_8` varchar(100) DEFAULT NULL COMMENT 'สังกัดของโรงเรีนยอื่นๆ',
  `c_satisfy_group_1` char(1) DEFAULT NULL COMMENT 'หนังสือเรียนมีคู่มือหรือคำแนะนำสำหรับครูในการจัดการเรียนรู้',
  `c_satisfy_group_2` char(1) DEFAULT NULL COMMENT 'หนังสือเรียนมีคำแนะนำสำหรับนักเรียนในการเรียนรู้ด้วยตนเอง',
  `c_satisfy_group_3` char(1) DEFAULT NULL COMMENT 'หนังสือเรียนช่วยสร้างความสนใจในการเรียนรู้ของนักเรียน',
  `c_satisfy_group_4` char(1) DEFAULT NULL COMMENT 'หนังสือเรียนมีเทคนิคและรูปแบบการนำเสนอที่น่าสนใจ',
  `c_satisfy_group_5` char(1) DEFAULT NULL COMMENT 'อื่นๆ',
  `i_satisfy_group_5` char(1) DEFAULT NULL COMMENT 'ปัจจัยอื่นๆ',
  `r_receive_contribute_book` char(1) NOT NULL COMMENT 'รับหนังสือ (1=รับ, 2=ไม่รับ)'
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `participant`
--

INSERT INTO `participant` (`id`, `type`, `status`, `create_date`, `r_sex`, `s_degree`, `i_school_name`, `s_province`, `s_age`, `r_degree`, `c_s`, `c_s_1`, `c_s_2`, `c_s_3`, `c_s_4`, `c_s_5`, `c_s_6`, `c_s_7`, `c_s_8`, `c_s_9`, `c_s_10`, `c_s_11`, `c_s_12`, `c_m`, `c_m_1`, `c_m_2`, `c_m_3`, `c_m_4`, `c_m_5`, `c_m_6`, `c_m_7`, `c_m_8`, `c_m_9`, `c_m_10`, `c_m_11`, `c_m_12`, `c_t`, `c_t_1`, `c_t_2`, `c_t_3`, `c_t_4`, `c_t_5`, `c_t_6`, `c_t_7`, `c_t_8`, `c_t_9`, `c_t_10`, `c_t_11`, `c_t_12`, `c_d`, `c_d_1`, `c_d_2`, `c_d_3`, `c_d_4`, `c_d_5`, `c_d_6`, `c_d_7`, `c_d_8`, `c_d_9`, `c_d_10`, `c_d_11`, `c_d_12`, `s_experience`, `c_school_under_1`, `c_school_under_2`, `c_school_under_3`, `c_school_under_4`, `c_school_under_5`, `c_school_under_6`, `c_school_under_7`, `c_school_under_8`, `i_school_under_8`, `c_satisfy_group_1`, `c_satisfy_group_2`, `c_satisfy_group_3`, `c_satisfy_group_4`, `c_satisfy_group_5`, `i_satisfy_group_5`, `r_receive_contribute_book`) VALUES
(1, 's', 'i', '2015-12-11', '1', 5, 'ดอนเมือง ทหารอากาศบำรุง', 10, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1'),
(4, 't', 'a', '2015-12-20', '2', NULL, NULL, NULL, 23, '2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, NULL, NULL, '1', '1', NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, '1', NULL, '', '1');

-- --------------------------------------------------------

--
-- Table structure for table `province`
--

CREATE TABLE IF NOT EXISTS `province` (
  `id` int(2) NOT NULL,
  `name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `province`
--

INSERT INTO `province` (`id`, `name`) VALUES
(10, 'กรุงเทพมหานคร'),
(11, 'สมุทรปราการ'),
(12, 'นนทบุรี'),
(13, 'ปทุมธานี'),
(14, 'พระนครศรีอยุธยา'),
(15, 'อ่างทอง'),
(16, 'ลพบุรี'),
(17, 'สิงห์บุรี'),
(18, 'ชัยนาท'),
(19, 'สระบุรี'),
(20, 'ชลบุรี'),
(21, 'ระยอง'),
(22, 'จันทบุรี'),
(23, 'ตราด'),
(24, 'ฉะเชิงเทรา'),
(25, 'ปราจีนบุรี'),
(26, 'นครนายก'),
(27, 'สระแก้ว'),
(30, 'นครราชสีมา'),
(31, 'บุรีรัมย์'),
(32, 'สุรินทร์'),
(33, 'ศรีสะเกษ'),
(34, 'อุบลราชธานี'),
(35, 'ยโสธร'),
(36, 'ชัยภูมิ'),
(37, 'อำนาจเจริญ'),
(38, 'บึงกาฬ'),
(39, 'หนองบัวลำภู'),
(40, 'ขอนแก่น'),
(41, 'อุดรธานี'),
(42, 'เลย'),
(43, 'หนองคาย'),
(44, 'มหาสารคาม'),
(45, 'ร้อยเอ็ด'),
(46, 'กาฬสินธุ์'),
(47, 'สกลนคร'),
(48, 'นครพนม'),
(49, 'มุกดาหาร'),
(50, 'เชียงใหม่'),
(51, 'ลำพูน'),
(52, 'ลำปาง'),
(53, 'อุตรดิตถ์'),
(54, 'แพร่'),
(55, 'น่าน'),
(56, 'พะเยา'),
(57, 'เชียงราย'),
(58, 'แม่ฮ่องสอน'),
(60, 'นครสวรรค์'),
(61, 'อุทัยธานี'),
(62, 'กำแพงเพชร'),
(63, 'ตาก'),
(64, 'สุโขทัย'),
(65, 'พิษณุโลก'),
(66, 'พิจิตร'),
(67, 'เพชรบูรณ์'),
(70, 'ราชบุรี'),
(71, 'กาญจนบุรี'),
(72, 'สุพรรณบุรี'),
(73, 'นครปฐม'),
(74, 'สมุทรสาคร'),
(75, 'สมุทรสงคราม'),
(76, 'เพชรบุรี'),
(77, 'ประจวบคีรีขันธ์'),
(80, 'นครศรีธรรมราช'),
(81, 'กระบี่'),
(82, 'พังงา'),
(83, 'ภูเก็ต'),
(84, 'สุราษฎร์ธานี'),
(85, 'ระนอง'),
(86, 'ชุมพร'),
(90, 'สงขลา'),
(91, 'สตูล'),
(92, 'ตรัง'),
(93, 'พัทลุง'),
(94, 'ปัตตานี'),
(95, 'ยะลา'),
(96, 'นราธิวาส');

-- --------------------------------------------------------

--
-- Table structure for table `science_book`
--

CREATE TABLE IF NOT EXISTS `science_book` (
  `id` int(11) NOT NULL COMMENT 'รหัสผู้ประเมิน',
  `r_s_1_1_1` char(1) DEFAULT NULL,
  `r_s_1_1_2` char(1) DEFAULT NULL,
  `t_s_1_1_3` varchar(200) DEFAULT NULL,
  `h_s_1_1_4` varchar(30) DEFAULT NULL,
  `r_s_1_2_1` char(1) DEFAULT NULL,
  `r_s_1_2_2` char(1) DEFAULT NULL,
  `t_s_1_2_3` varchar(200) DEFAULT NULL,
  `h_s_1_2_4` varchar(30) DEFAULT NULL,
  `r_s_1_3_1` char(1) DEFAULT NULL,
  `r_s_1_3_2` char(1) DEFAULT NULL,
  `t_s_1_3_3` varchar(200) DEFAULT NULL,
  `h_s_1_3_4` varchar(30) DEFAULT NULL,
  `r_s_1_4_1` char(1) DEFAULT NULL,
  `r_s_1_4_2` char(1) DEFAULT NULL,
  `t_s_1_4_3` varchar(200) DEFAULT NULL,
  `h_s_1_4_4` varchar(30) DEFAULT NULL,
  `r_s_2_1_1` char(1) DEFAULT NULL,
  `r_s_2_1_2` char(1) DEFAULT NULL,
  `t_s_2_1_3` varchar(200) DEFAULT NULL,
  `h_s_2_1_4` varchar(30) DEFAULT NULL,
  `r_s_2_2_1` char(1) DEFAULT NULL,
  `r_s_2_2_2` char(1) DEFAULT NULL,
  `t_s_2_2_3` varchar(200) DEFAULT NULL,
  `h_s_2_2_4` varchar(30) DEFAULT NULL,
  `r_s_3_1_1` char(1) DEFAULT NULL,
  `r_s_3_1_2` char(1) DEFAULT NULL,
  `t_s_3_1_3` varchar(200) DEFAULT NULL,
  `h_s_3_1_4` varchar(30) DEFAULT NULL,
  `r_s_3_2_1` char(1) DEFAULT NULL,
  `r_s_3_2_2` char(1) DEFAULT NULL,
  `t_s_3_2_3` varchar(200) DEFAULT NULL,
  `h_s_3_2_4` varchar(30) DEFAULT NULL,
  `r_s_4_1_1` char(1) DEFAULT NULL,
  `r_s_4_1_2` char(1) DEFAULT NULL,
  `t_s_4_1_3` varchar(200) DEFAULT NULL,
  `h_s_4_1_4` varchar(30) DEFAULT NULL,
  `r_s_4_2_1` char(1) DEFAULT NULL,
  `r_s_4_2_2` char(1) DEFAULT NULL,
  `t_s_4_2_3` varchar(200) DEFAULT NULL,
  `h_s_4_2_4` varchar(30) DEFAULT NULL,
  `r_s_4_3_1` char(1) DEFAULT NULL,
  `r_s_4_3_2` char(1) DEFAULT NULL,
  `t_s_4_3_3` varchar(200) DEFAULT NULL,
  `h_s_4_3_4` varchar(30) DEFAULT NULL,
  `r_s_4_4_1` char(1) DEFAULT NULL,
  `r_s_4_4_2` char(1) DEFAULT NULL,
  `t_s_4_4_3` varchar(200) DEFAULT NULL,
  `h_s_4_4_4` varchar(30) DEFAULT NULL,
  `r_s_5_1_1` char(1) DEFAULT NULL,
  `r_s_5_1_2` char(1) DEFAULT NULL,
  `t_s_5_1_3` varchar(200) DEFAULT NULL,
  `h_s_5_1_4` varchar(30) DEFAULT NULL,
  `r_s_5_2_1` char(1) DEFAULT NULL,
  `r_s_5_2_2` char(1) DEFAULT NULL,
  `t_s_5_2_3` varchar(200) DEFAULT NULL,
  `h_s_5_2_4` varchar(30) DEFAULT NULL,
  `r_s_6_1_1` char(1) DEFAULT NULL,
  `r_s_6_1_2` char(1) DEFAULT NULL,
  `t_s_6_1_3` varchar(200) DEFAULT NULL,
  `h_s_6_1_4` varchar(30) DEFAULT NULL,
  `r_s_6_2_1` char(1) DEFAULT NULL,
  `r_s_6_2_2` char(1) DEFAULT NULL,
  `t_s_6_2_3` varchar(200) DEFAULT NULL,
  `h_s_6_2_4` varchar(30) DEFAULT NULL,
  `r_s_7_1_1` char(1) DEFAULT NULL,
  `r_s_7_1_2` char(1) DEFAULT NULL,
  `t_s_7_1_3` varchar(200) DEFAULT NULL,
  `h_s_7_1_4` varchar(30) DEFAULT NULL,
  `r_s_7_2_1` char(1) DEFAULT NULL,
  `r_s_7_2_2` char(1) DEFAULT NULL,
  `t_s_7_2_3` varchar(200) DEFAULT NULL,
  `h_s_7_2_4` varchar(30) DEFAULT NULL,
  `r_s_8_1_1` char(1) DEFAULT NULL,
  `r_s_8_1_2` char(1) DEFAULT NULL,
  `t_s_8_1_3` varchar(200) DEFAULT NULL,
  `h_s_8_1_4` varchar(30) DEFAULT NULL,
  `r_s_8_2_1` char(1) DEFAULT NULL,
  `r_s_8_2_2` char(1) DEFAULT NULL,
  `t_s_8_2_3` varchar(200) DEFAULT NULL,
  `h_s_8_2_4` varchar(30) DEFAULT NULL,
  `r_s_9_1_1` char(1) DEFAULT NULL,
  `r_s_9_1_2` char(1) DEFAULT NULL,
  `t_s_9_1_3` varchar(200) DEFAULT NULL,
  `h_s_9_1_4` varchar(30) DEFAULT NULL,
  `r_s_9_2_1` char(1) DEFAULT NULL,
  `r_s_9_2_2` char(1) DEFAULT NULL,
  `t_s_9_2_3` varchar(200) DEFAULT NULL,
  `h_s_9_2_4` varchar(30) DEFAULT NULL,
  `r_s_789_additional_1_1` char(1) DEFAULT NULL,
  `r_s_789_additional_1_2` char(1) DEFAULT NULL,
  `t_s_789_additional_1_3` varchar(200) DEFAULT NULL,
  `h_s_789_additional_1_4` varchar(30) DEFAULT NULL,
  `r_s_789_additional_2_1` char(1) DEFAULT NULL,
  `r_s_789_additional_2_2` char(1) DEFAULT NULL,
  `t_s_789_additional_2_3` varchar(200) DEFAULT NULL,
  `h_s_789_additional_2_4` varchar(30) DEFAULT NULL,
  `r_s_789_additional_3_1` char(1) DEFAULT NULL,
  `r_s_789_additional_3_2` char(1) DEFAULT NULL,
  `t_s_789_additional_3_3` varchar(200) DEFAULT NULL,
  `h_s_789_additional_3_4` varchar(30) DEFAULT NULL,
  `r_s_789_additional_4_1` char(1) DEFAULT NULL,
  `r_s_789_additional_4_2` char(1) DEFAULT NULL,
  `t_s_789_additional_4_3` varchar(200) DEFAULT NULL,
  `h_s_789_additional_4_4` varchar(30) DEFAULT NULL,
  `r_s_789_additional_5_1` char(1) DEFAULT NULL,
  `r_s_789_additional_5_2` char(1) DEFAULT NULL,
  `t_s_789_additional_5_3` varchar(200) DEFAULT NULL,
  `h_s_789_additional_5_4` varchar(30) DEFAULT NULL,
  `r_s_101112n_1_1` char(1) DEFAULT NULL,
  `r_s_101112n_1_2` char(1) DEFAULT NULL,
  `t_s_101112n_1_3` varchar(200) DEFAULT NULL,
  `h_s_101112n_1_4` varchar(30) DEFAULT NULL,
  `r_s_101112n_2_1` char(1) DEFAULT NULL,
  `r_s_101112n_2_2` char(1) DEFAULT NULL,
  `t_s_101112n_2_3` varchar(200) DEFAULT NULL,
  `h_s_101112n_2_4` varchar(30) DEFAULT NULL,
  `r_s_101112n_3_1` char(1) DEFAULT NULL,
  `r_s_101112n_3_2` char(1) DEFAULT NULL,
  `t_s_101112n_3_3` varchar(200) DEFAULT NULL,
  `h_s_101112n_3_4` varchar(30) DEFAULT NULL,
  `r_s_101112n_4_1` char(1) DEFAULT NULL,
  `r_s_101112n_4_2` char(1) DEFAULT NULL,
  `t_s_101112n_4_3` varchar(200) DEFAULT NULL,
  `h_s_101112n_4_4` varchar(30) DEFAULT NULL,
  `r_s_101112n_5_1` char(1) DEFAULT NULL,
  `r_s_101112n_5_2` char(1) DEFAULT NULL,
  `t_s_101112n_5_3` varchar(200) DEFAULT NULL,
  `h_s_101112n_5_4` varchar(30) DEFAULT NULL,
  `r_s_101112n_6_1` char(1) DEFAULT NULL,
  `r_s_101112n_6_2` char(1) DEFAULT NULL,
  `t_s_101112n_6_3` varchar(200) DEFAULT NULL,
  `h_s_101112n_6_4` varchar(30) DEFAULT NULL,
  `r_s_101112p_1_1` char(1) DEFAULT NULL,
  `r_s_101112p_1_2` char(1) DEFAULT NULL,
  `t_s_101112p_1_3` varchar(200) DEFAULT NULL,
  `h_s_101112p_1_4` varchar(30) DEFAULT NULL,
  `r_s_101112p_2_1` char(1) DEFAULT NULL,
  `r_s_101112p_2_2` char(1) DEFAULT NULL,
  `t_s_101112p_2_3` varchar(200) DEFAULT NULL,
  `h_s_101112p_2_4` varchar(30) DEFAULT NULL,
  `r_s_101112p_3_1` char(1) DEFAULT NULL,
  `r_s_101112p_3_2` char(1) DEFAULT NULL,
  `t_s_101112p_3_3` varchar(200) DEFAULT NULL,
  `h_s_101112p_3_4` varchar(30) DEFAULT NULL,
  `r_s_101112p_4_1` char(1) DEFAULT NULL,
  `r_s_101112p_4_2` char(1) DEFAULT NULL,
  `t_s_101112p_4_3` varchar(200) DEFAULT NULL,
  `h_s_101112p_4_4` varchar(30) DEFAULT NULL,
  `r_s_101112p_5_1` char(1) DEFAULT NULL,
  `r_s_101112p_5_2` char(1) DEFAULT NULL,
  `t_s_101112p_5_3` varchar(200) DEFAULT NULL,
  `h_s_101112p_5_4` varchar(30) DEFAULT NULL,
  `r_s_101112p_6_1` char(1) DEFAULT NULL,
  `r_s_101112p_6_2` char(1) DEFAULT NULL,
  `t_s_101112p_6_3` varchar(200) DEFAULT NULL,
  `h_s_101112p_6_4` varchar(30) DEFAULT NULL,
  `r_s_101112c_1_1` char(1) DEFAULT NULL,
  `r_s_101112c_1_2` char(1) DEFAULT NULL,
  `t_s_101112c_1_3` varchar(200) DEFAULT NULL,
  `h_s_101112c_1_4` varchar(30) DEFAULT NULL,
  `r_s_101112c_2_1` char(1) DEFAULT NULL,
  `r_s_101112c_2_2` char(1) DEFAULT NULL,
  `t_s_101112c_2_3` varchar(200) DEFAULT NULL,
  `h_s_101112c_2_4` varchar(30) DEFAULT NULL,
  `r_s_101112c_3_1` char(1) DEFAULT NULL,
  `r_s_101112c_3_2` char(1) DEFAULT NULL,
  `t_s_101112c_3_3` varchar(200) DEFAULT NULL,
  `h_s_101112c_3_4` varchar(30) DEFAULT NULL,
  `r_s_101112c_4_1` char(1) DEFAULT NULL,
  `r_s_101112c_4_2` char(1) DEFAULT NULL,
  `t_s_101112c_4_3` varchar(200) DEFAULT NULL,
  `h_s_101112c_4_4` varchar(30) DEFAULT NULL,
  `r_s_101112c_5_1` char(1) DEFAULT NULL,
  `r_s_101112c_5_2` char(1) DEFAULT NULL,
  `t_s_101112c_5_3` varchar(200) DEFAULT NULL,
  `h_s_101112c_5_4` varchar(30) DEFAULT NULL,
  `r_s_101112c_6_1` char(1) DEFAULT NULL,
  `r_s_101112c_6_2` char(1) DEFAULT NULL,
  `t_s_101112c_6_3` varchar(200) DEFAULT NULL,
  `h_s_101112c_6_4` varchar(30) DEFAULT NULL,
  `r_s_101112b_1_1` char(1) DEFAULT NULL,
  `r_s_101112b_1_2` char(1) DEFAULT NULL,
  `t_s_101112b_1_3` varchar(200) DEFAULT NULL,
  `h_s_101112b_1_4` varchar(30) DEFAULT NULL,
  `r_s_101112b_2_1` char(1) DEFAULT NULL,
  `r_s_101112b_2_2` char(1) DEFAULT NULL,
  `t_s_101112b_2_3` varchar(200) DEFAULT NULL,
  `h_s_101112b_2_4` varchar(30) DEFAULT NULL,
  `r_s_101112b_3_1` char(1) DEFAULT NULL,
  `r_s_101112b_3_2` char(1) DEFAULT NULL,
  `t_s_101112b_3_3` varchar(200) DEFAULT NULL,
  `h_s_101112b_3_4` varchar(30) DEFAULT NULL,
  `r_s_101112b_4_1` char(1) DEFAULT NULL,
  `r_s_101112b_4_2` char(1) DEFAULT NULL,
  `t_s_101112b_4_3` varchar(200) DEFAULT NULL,
  `h_s_101112b_4_4` varchar(30) DEFAULT NULL,
  `r_s_101112b_5_1` char(1) DEFAULT NULL,
  `r_s_101112b_5_2` char(1) DEFAULT NULL,
  `t_s_101112b_5_3` varchar(200) DEFAULT NULL,
  `h_s_101112b_5_4` varchar(30) DEFAULT NULL,
  `r_s_101112b_6_1` char(1) DEFAULT NULL,
  `r_s_101112b_6_2` char(1) DEFAULT NULL,
  `t_s_101112b_6_3` varchar(200) DEFAULT NULL,
  `h_s_101112b_6_4` varchar(30) DEFAULT NULL,
  `r_s_101112e_1_1` char(1) DEFAULT NULL,
  `r_s_101112e_1_2` char(1) DEFAULT NULL,
  `t_s_101112e_1_3` varchar(200) DEFAULT NULL,
  `h_s_101112e_1_4` varchar(30) DEFAULT NULL,
  `r_s_101112e_2_1` char(1) DEFAULT NULL,
  `r_s_101112e_2_2` char(1) DEFAULT NULL,
  `t_s_101112e_2_3` varchar(200) DEFAULT NULL,
  `h_s_101112e_2_4` varchar(30) DEFAULT NULL,
  `r_s_101112e_3_1` char(1) DEFAULT NULL,
  `r_s_101112e_3_2` char(1) DEFAULT NULL,
  `t_s_101112e_3_3` varchar(200) DEFAULT NULL,
  `h_s_101112e_3_4` varchar(30) DEFAULT NULL,
  `r_s_101112e_4_1` char(1) DEFAULT NULL,
  `r_s_101112e_4_2` char(1) DEFAULT NULL,
  `t_s_101112e_4_3` varchar(200) DEFAULT NULL,
  `h_s_101112e_4_4` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `science_book_instructor`
--

CREATE TABLE IF NOT EXISTS `science_book_instructor` (
  `id` int(11) NOT NULL COMMENT 'รหัสผู้ประเมิน',
  `r_s_ins_1_1_1` char(1) DEFAULT NULL,
  `r_s_ins_1_1_2` char(1) DEFAULT NULL,
  `t_s_ins_1_1_3` varchar(200) DEFAULT NULL,
  `h_s_ins_1_1_4` varchar(30) DEFAULT NULL,
  `r_s_ins_2_1_1` char(1) DEFAULT NULL,
  `r_s_ins_2_1_2` char(1) DEFAULT NULL,
  `t_s_ins_2_1_3` varchar(200) DEFAULT NULL,
  `h_s_ins_2_1_4` varchar(30) DEFAULT NULL,
  `r_s_ins_3_1_1` char(1) DEFAULT NULL,
  `r_s_ins_3_1_2` char(1) DEFAULT NULL,
  `t_s_ins_3_1_3` varchar(200) DEFAULT NULL,
  `h_s_ins_3_1_4` varchar(30) DEFAULT NULL,
  `r_s_ins_4_1_1` char(1) DEFAULT NULL,
  `r_s_ins_4_1_2` char(1) DEFAULT NULL,
  `t_s_ins_4_1_3` varchar(200) DEFAULT NULL,
  `h_s_ins_4_1_4` varchar(30) DEFAULT NULL,
  `r_s_ins_5_1_1` char(1) DEFAULT NULL,
  `r_s_ins_5_1_2` char(1) DEFAULT NULL,
  `t_s_ins_5_1_3` varchar(200) DEFAULT NULL,
  `h_s_ins_5_1_4` varchar(30) DEFAULT NULL,
  `r_s_ins_6_1_1` char(1) DEFAULT NULL,
  `r_s_ins_6_1_2` char(1) DEFAULT NULL,
  `t_s_ins_6_1_3` varchar(200) DEFAULT NULL,
  `h_s_ins_6_1_4` varchar(30) DEFAULT NULL,
  `r_s_ins_7_1_1` char(1) DEFAULT NULL,
  `r_s_ins_7_1_2` char(1) DEFAULT NULL,
  `t_s_ins_7_1_3` varchar(200) DEFAULT NULL,
  `h_ins_s_7_1_4` varchar(30) DEFAULT NULL,
  `r_s_ins_7_2_1` char(1) DEFAULT NULL,
  `r_s_ins_7_2_2` char(1) DEFAULT NULL,
  `t_s_ins_7_2_3` varchar(200) DEFAULT NULL,
  `h_s_ins_7_2_4` varchar(30) DEFAULT NULL,
  `r_s_ins_8_1_1` char(1) DEFAULT NULL,
  `r_s_ins_8_1_2` char(1) DEFAULT NULL,
  `t_s_ins_8_1_3` varchar(200) DEFAULT NULL,
  `h_s_ins_8_1_4` varchar(30) DEFAULT NULL,
  `r_s_ins_8_2_1` char(1) DEFAULT NULL,
  `r_s_ins_8_2_2` char(1) DEFAULT NULL,
  `t_s_ins_8_2_3` varchar(200) DEFAULT NULL,
  `h_s_ins_8_2_4` varchar(30) DEFAULT NULL,
  `r_s_ins_9_1_1` char(1) DEFAULT NULL,
  `r_s_ins_9_1_2` char(1) DEFAULT NULL,
  `t_s_ins_9_1_3` varchar(200) DEFAULT NULL,
  `h_s_ins_9_1_4` varchar(30) DEFAULT NULL,
  `r_s_ins_9_2_1` char(1) DEFAULT NULL,
  `r_s_ins_9_2_2` char(1) DEFAULT NULL,
  `t_s_ins_9_2_3` varchar(200) DEFAULT NULL,
  `h_s_ins_9_2_4` varchar(30) DEFAULT NULL,
  `r_s_ins_789_additional_1_1` char(1) DEFAULT NULL,
  `r_s_ins_789_additional_1_2` char(1) DEFAULT NULL,
  `t_s_ins_789_additional_1_3` varchar(200) DEFAULT NULL,
  `h_s_ins_789_additional_1_4` varchar(30) DEFAULT NULL,
  `r_s_ins_789_additional_2_1` char(1) DEFAULT NULL,
  `r_s_ins_789_additional_2_2` char(1) DEFAULT NULL,
  `t_s_ins_789_additional_2_3` varchar(200) DEFAULT NULL,
  `h_s_ins_789_additional_2_4` varchar(30) DEFAULT NULL,
  `r_s_ins_789_additional_3_1` char(1) DEFAULT NULL,
  `r_s_ins_789_additional_3_2` char(1) DEFAULT NULL,
  `t_s_ins_789_additional_3_3` varchar(200) DEFAULT NULL,
  `h_s_ins_789_additional_3_4` varchar(30) DEFAULT NULL,
  `r_s_ins_789_additional_4_1` char(1) DEFAULT NULL,
  `r_s_ins_789_additional_4_2` char(1) DEFAULT NULL,
  `t_s_ins_789_additional_4_3` varchar(200) DEFAULT NULL,
  `h_s_ins_789_additional_4_4` varchar(30) DEFAULT NULL,
  `r_s_ins_789_additional_5_1` char(1) DEFAULT NULL,
  `r_s_ins_789_additional_5_2` char(1) DEFAULT NULL,
  `t_s_ins_789_additional_5_3` varchar(200) DEFAULT NULL,
  `h_s_ins_789_additional_5_4` varchar(30) DEFAULT NULL,
  `r_s_ins_101112n_1_1` char(1) DEFAULT NULL,
  `r_s_ins_101112n_1_2` char(1) DEFAULT NULL,
  `t_s_ins_101112n_1_3` varchar(200) DEFAULT NULL,
  `h_s_ins_101112n_1_4` varchar(30) DEFAULT NULL,
  `r_s_ins_101112n_2_1` char(1) DEFAULT NULL,
  `r_s_ins_101112n_2_2` char(1) DEFAULT NULL,
  `t_s_ins_101112n_2_3` varchar(200) DEFAULT NULL,
  `h_s_ins_101112n_2_4` varchar(30) DEFAULT NULL,
  `r_s_ins_101112n_3_1` char(1) DEFAULT NULL,
  `r_s_ins_101112n_3_2` char(1) DEFAULT NULL,
  `t_s_ins_101112n_3_3` varchar(200) DEFAULT NULL,
  `h_s_ins_101112n_3_4` varchar(30) DEFAULT NULL,
  `r_s_ins_101112n_4_1` char(1) DEFAULT NULL,
  `r_s_ins_101112n_4_2` char(1) DEFAULT NULL,
  `t_s_ins_101112n_4_3` varchar(200) DEFAULT NULL,
  `h_s_ins_101112n_4_4` varchar(30) DEFAULT NULL,
  `r_s_ins_101112n_5_1` char(1) DEFAULT NULL,
  `r_s_ins_101112n_5_2` char(1) DEFAULT NULL,
  `t_s_ins_101112n_5_3` varchar(200) DEFAULT NULL,
  `h_s_ins_101112n_5_4` varchar(30) DEFAULT NULL,
  `r_s_ins_101112n_6_1` char(1) DEFAULT NULL,
  `r_s_ins_101112n_6_2` char(1) DEFAULT NULL,
  `t_s_ins_101112n_6_3` varchar(200) DEFAULT NULL,
  `h_s_ins_101112n_6_4` varchar(30) DEFAULT NULL,
  `r_s_ins_101112p_1_1` char(1) DEFAULT NULL,
  `r_s_ins_101112p_1_2` char(1) DEFAULT NULL,
  `t_s_ins_101112p_1_3` varchar(200) DEFAULT NULL,
  `h_s_ins_101112p_1_4` varchar(30) DEFAULT NULL,
  `r_s_ins_101112p_2_1` char(1) DEFAULT NULL,
  `r_s_ins_101112p_2_2` char(1) DEFAULT NULL,
  `t_s_ins_101112p_2_3` varchar(200) DEFAULT NULL,
  `h_s_ins_101112p_2_4` varchar(30) DEFAULT NULL,
  `r_s_ins_101112p_3_1` char(1) DEFAULT NULL,
  `r_s_ins_101112p_3_2` char(1) DEFAULT NULL,
  `t_s_ins_101112p_3_3` varchar(200) DEFAULT NULL,
  `h_s_ins_101112p_3_4` varchar(30) DEFAULT NULL,
  `r_s_ins_101112p_4_1` char(1) DEFAULT NULL,
  `r_s_ins_101112p_4_2` char(1) DEFAULT NULL,
  `t_s_ins_101112p_4_3` varchar(200) DEFAULT NULL,
  `h_s_ins_101112p_4_4` varchar(30) DEFAULT NULL,
  `r_s_ins_101112p_5_1` char(1) DEFAULT NULL,
  `r_s_ins_101112p_5_2` char(1) DEFAULT NULL,
  `t_s_ins_101112p_5_3` varchar(200) DEFAULT NULL,
  `h_s_ins_101112p_5_4` varchar(30) DEFAULT NULL,
  `r_s_ins_101112p_6_1` char(1) DEFAULT NULL,
  `r_s_ins_101112p_6_2` char(1) DEFAULT NULL,
  `t_s_ins_101112p_6_3` varchar(200) DEFAULT NULL,
  `h_s_ins_101112p_6_4` varchar(30) DEFAULT NULL,
  `r_s_ins_101112c_1_1` char(1) DEFAULT NULL,
  `r_s_ins_101112c_1_2` char(1) DEFAULT NULL,
  `t_s_ins_101112c_1_3` varchar(200) DEFAULT NULL,
  `h_s_ins_101112c_1_4` varchar(30) DEFAULT NULL,
  `r_s_ins_101112c_2_1` char(1) DEFAULT NULL,
  `r_s_ins_101112c_2_2` char(1) DEFAULT NULL,
  `t_s_ins_101112c_2_3` varchar(200) DEFAULT NULL,
  `h_s_ins_101112c_2_4` varchar(30) DEFAULT NULL,
  `r_s_ins_101112c_3_1` char(1) DEFAULT NULL,
  `r_s_ins_101112c_3_2` char(1) DEFAULT NULL,
  `t_s_ins_101112c_3_3` varchar(200) DEFAULT NULL,
  `h_s_ins_101112c_3_4` varchar(30) DEFAULT NULL,
  `r_s_ins_101112c_4_1` char(1) DEFAULT NULL,
  `r_s_ins_101112c_4_2` char(1) DEFAULT NULL,
  `t_s_ins_101112c_4_3` varchar(200) DEFAULT NULL,
  `h_s_ins_101112c_4_4` varchar(30) DEFAULT NULL,
  `r_s_ins_101112c_5_1` char(1) DEFAULT NULL,
  `r_s_ins_101112c_5_2` char(1) DEFAULT NULL,
  `t_s_ins_101112c_5_3` varchar(200) DEFAULT NULL,
  `h_s_ins_101112c_5_4` varchar(30) DEFAULT NULL,
  `r_s_ins_101112c_6_1` char(1) DEFAULT NULL,
  `r_s_ins_101112c_6_2` char(1) DEFAULT NULL,
  `t_s_ins_101112c_6_3` varchar(200) DEFAULT NULL,
  `h_s_ins_101112c_6_4` varchar(30) DEFAULT NULL,
  `r_s_ins_101112b_1_1` char(1) DEFAULT NULL,
  `r_s_ins_101112b_1_2` char(1) DEFAULT NULL,
  `t_s_ins_101112b_1_3` varchar(200) DEFAULT NULL,
  `h_s_ins_101112b_1_4` varchar(30) DEFAULT NULL,
  `r_s_ins_101112b_2_1` char(1) DEFAULT NULL,
  `r_s_ins_101112b_2_2` char(1) DEFAULT NULL,
  `t_s_ins_101112b_2_3` varchar(200) DEFAULT NULL,
  `h_s_ins_101112b_2_4` varchar(30) DEFAULT NULL,
  `r_s_ins_101112b_3_1` char(1) DEFAULT NULL,
  `r_s_ins_101112b_3_2` char(1) DEFAULT NULL,
  `t_s_ins_101112b_3_3` varchar(200) DEFAULT NULL,
  `h_s_ins_101112b_3_4` varchar(30) DEFAULT NULL,
  `r_s_ins_101112b_4_1` char(1) DEFAULT NULL,
  `r_s_ins_101112b_4_2` char(1) DEFAULT NULL,
  `t_s_ins_101112b_4_3` varchar(200) DEFAULT NULL,
  `h_s_ins_101112b_4_4` varchar(30) DEFAULT NULL,
  `r_s_ins_101112b_5_1` char(1) DEFAULT NULL,
  `r_s_ins_101112b_5_2` char(1) DEFAULT NULL,
  `t_s_ins_101112b_5_3` varchar(200) DEFAULT NULL,
  `h_s_ins_101112b_5_4` varchar(30) DEFAULT NULL,
  `r_s_ins_101112b_6_1` char(1) DEFAULT NULL,
  `r_s_ins_101112b_6_2` char(1) DEFAULT NULL,
  `t_s_ins_101112b_6_3` varchar(200) DEFAULT NULL,
  `h_s_ins_101112b_6_4` varchar(30) DEFAULT NULL,
  `r_s_ins_101112e_1_1` char(1) DEFAULT NULL,
  `r_s_ins_101112e_1_2` char(1) DEFAULT NULL,
  `t_s_ins_101112e_1_3` varchar(200) DEFAULT NULL,
  `h_s_ins_101112e_1_4` varchar(30) DEFAULT NULL,
  `r_s_ins_101112e_2_1` char(1) DEFAULT NULL,
  `r_s_ins_101112e_2_2` char(1) DEFAULT NULL,
  `t_s_ins_101112e_2_3` varchar(200) DEFAULT NULL,
  `h_s_ins_101112e_2_4` varchar(30) DEFAULT NULL,
  `r_s_ins_101112e_3_1` char(1) DEFAULT NULL,
  `r_s_ins_101112e_3_2` char(1) DEFAULT NULL,
  `t_s_ins_101112e_3_3` varchar(200) DEFAULT NULL,
  `h_s_ins_101112e_3_4` varchar(30) DEFAULT NULL,
  `r_s_ins_101112e_4_1` char(1) DEFAULT NULL,
  `r_s_ins_101112e_4_2` char(1) DEFAULT NULL,
  `t_s_ins_101112e_4_3` varchar(200) DEFAULT NULL,
  `h_s_ins_101112e_4_4` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `technology_book`
--

CREATE TABLE IF NOT EXISTS `technology_book` (
  `id` int(11) NOT NULL COMMENT 'รหัสผู้ประเมิน',
  `r_t_1_1_1` char(1) DEFAULT NULL,
  `r_t_1_1_2` char(1) DEFAULT NULL,
  `t_t_1_1_3` varchar(200) DEFAULT NULL,
  `h_t_1_1_4` varchar(30) DEFAULT NULL,
  `r_t_1_2_1` char(1) DEFAULT NULL,
  `r_t_1_2_2` char(1) DEFAULT NULL,
  `t_t_1_2_3` varchar(200) DEFAULT NULL,
  `h_t_1_2_4` varchar(30) DEFAULT NULL,
  `r_t_2_1_1` char(1) DEFAULT NULL,
  `r_t_2_1_2` char(1) DEFAULT NULL,
  `t_t_2_1_3` varchar(200) DEFAULT NULL,
  `h_t_2_1_4` varchar(30) DEFAULT NULL,
  `r_t_2_2_1` char(1) DEFAULT NULL,
  `r_t_2_2_2` char(1) DEFAULT NULL,
  `t_t_2_2_3` varchar(200) DEFAULT NULL,
  `h_t_2_2_4` varchar(30) DEFAULT NULL,
  `r_t_3_1_1` char(1) DEFAULT NULL,
  `r_t_3_1_2` char(1) DEFAULT NULL,
  `t_t_3_1_3` varchar(200) DEFAULT NULL,
  `h_t_3_1_4` varchar(30) DEFAULT NULL,
  `r_t_3_2_1` char(1) DEFAULT NULL,
  `r_t_3_2_2` char(1) DEFAULT NULL,
  `t_t_3_2_3` varchar(200) DEFAULT NULL,
  `h_t_3_2_4` varchar(30) DEFAULT NULL,
  `r_t_4_1_1` char(1) DEFAULT NULL,
  `r_t_4_1_2` char(1) DEFAULT NULL,
  `t_t_4_1_3` varchar(200) DEFAULT NULL,
  `h_t_4_1_4` varchar(30) DEFAULT NULL,
  `r_t_4_2_1` char(1) DEFAULT NULL,
  `r_t_4_2_2` char(1) DEFAULT NULL,
  `t_t_4_2_3` varchar(200) DEFAULT NULL,
  `h_t_4_2_4` varchar(30) DEFAULT NULL,
  `r_t_5_1_1` char(1) DEFAULT NULL,
  `r_t_5_1_2` char(1) DEFAULT NULL,
  `t_t_5_1_3` varchar(200) DEFAULT NULL,
  `h_t_5_1_4` varchar(30) DEFAULT NULL,
  `r_t_5_2_1` char(1) DEFAULT NULL,
  `r_t_5_2_2` char(1) DEFAULT NULL,
  `t_t_5_2_3` varchar(200) DEFAULT NULL,
  `h_t_5_2_4` varchar(30) DEFAULT NULL,
  `r_t_6_1_1` char(1) DEFAULT NULL,
  `r_t_6_1_2` char(1) DEFAULT NULL,
  `t_t_6_1_3` varchar(200) DEFAULT NULL,
  `h_t_6_1_4` varchar(30) DEFAULT NULL,
  `r_t_6_2_1` char(1) DEFAULT NULL,
  `r_t_6_2_2` char(1) DEFAULT NULL,
  `t_t_6_2_3` varchar(200) DEFAULT NULL,
  `h_t_6_2_4` varchar(30) DEFAULT NULL,
  `r_t_7_1_1` char(1) DEFAULT NULL,
  `r_t_7_1_2` char(1) DEFAULT NULL,
  `t_t_7_1_3` varchar(200) DEFAULT NULL,
  `h_t_7_1_4` varchar(30) DEFAULT NULL,
  `r_t_8_1_1` char(1) DEFAULT NULL,
  `r_t_8_1_2` char(1) DEFAULT NULL,
  `t_t_8_1_3` varchar(200) DEFAULT NULL,
  `h_t_8_1_4` varchar(30) DEFAULT NULL,
  `r_t_9_1_1` char(1) DEFAULT NULL,
  `r_t_9_1_2` char(1) DEFAULT NULL,
  `t_t_9_1_3` varchar(200) DEFAULT NULL,
  `h_t_9_1_4` varchar(30) DEFAULT NULL,
  `r_t_789_additional_1_1` char(1) DEFAULT NULL,
  `r_t_789_additional_1_2` char(1) DEFAULT NULL,
  `t_t_789_additional_1_3` varchar(200) DEFAULT NULL,
  `h_t_789_additional_1_4` varchar(30) DEFAULT NULL,
  `r_t_789_additional_2_1` char(1) DEFAULT NULL,
  `r_t_789_additional_2_2` char(1) DEFAULT NULL,
  `t_t_789_additional_2_3` varchar(200) DEFAULT NULL,
  `h_t_789_additional_2_4` varchar(30) DEFAULT NULL,
  `r_t_789_additional_3_1` char(1) DEFAULT NULL,
  `r_t_789_additional_3_2` char(1) DEFAULT NULL,
  `t_t_789_additional_3_3` varchar(200) DEFAULT NULL,
  `h_t_789_additional_3_4` varchar(30) DEFAULT NULL,
  `r_t_101112_1_1` char(1) DEFAULT NULL,
  `r_t_101112_1_2` char(1) DEFAULT NULL,
  `t_t_101112_1_3` varchar(200) DEFAULT NULL,
  `h_t_101112_1_4` varchar(30) DEFAULT NULL,
  `r_t_101112_2_1` char(1) DEFAULT NULL,
  `r_t_101112_2_2` char(1) DEFAULT NULL,
  `t_t_101112_2_3` varchar(200) DEFAULT NULL,
  `h_t_101112_2_4` varchar(30) DEFAULT NULL,
  `r_t_101112_3_1` char(1) DEFAULT NULL,
  `r_t_101112_3_2` char(1) DEFAULT NULL,
  `t_t_101112_3_3` varchar(200) DEFAULT NULL,
  `h_t_101112_3_4` varchar(30) DEFAULT NULL,
  `r_t_101112_4_1` char(1) DEFAULT NULL,
  `r_t_101112_4_2` char(1) DEFAULT NULL,
  `t_t_101112_4_3` varchar(200) DEFAULT NULL,
  `h_t_101112_4_4` varchar(30) DEFAULT NULL,
  `r_t_101112_5_1` char(1) DEFAULT NULL,
  `r_t_101112_5_2` char(1) DEFAULT NULL,
  `t_t_101112_5_3` varchar(200) DEFAULT NULL,
  `h_t_101112_5_4` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `technology_book_instructor`
--

CREATE TABLE IF NOT EXISTS `technology_book_instructor` (
  `id` int(11) NOT NULL COMMENT 'รหัสผู้ประเมิน',
  `r_t_ins_1_1_1` char(1) DEFAULT NULL,
  `r_t_ins_1_1_2` char(1) DEFAULT NULL,
  `t_t_ins_1_1_3` varchar(200) DEFAULT NULL,
  `h_t_ins_1_1_4` varchar(30) DEFAULT NULL,
  `r_t_ins_2_1_1` char(1) DEFAULT NULL,
  `r_t_ins_2_1_2` char(1) DEFAULT NULL,
  `t_t_ins_2_1_3` varchar(200) DEFAULT NULL,
  `h_t_ins_2_1_4` varchar(30) DEFAULT NULL,
  `r_t_ins_3_1_1` char(1) DEFAULT NULL,
  `r_t_ins_3_1_2` char(1) DEFAULT NULL,
  `t_t_ins_3_1_3` varchar(200) DEFAULT NULL,
  `h_t_ins_3_1_4` varchar(30) DEFAULT NULL,
  `r_t_ins_4_1_1` char(1) DEFAULT NULL,
  `r_t_ins_4_1_2` char(1) DEFAULT NULL,
  `t_t_ins_4_1_3` varchar(200) DEFAULT NULL,
  `h_t_ins_4_1_4` varchar(30) DEFAULT NULL,
  `r_t_ins_5_1_1` char(1) DEFAULT NULL,
  `r_t_ins_5_1_2` char(1) DEFAULT NULL,
  `t_t_ins_5_1_3` varchar(200) DEFAULT NULL,
  `h_t_ins_5_1_4` varchar(30) DEFAULT NULL,
  `r_t_ins_6_1_1` char(1) DEFAULT NULL,
  `r_t_ins_6_1_2` char(1) DEFAULT NULL,
  `t_t_ins_6_1_3` varchar(200) DEFAULT NULL,
  `h_t_ins_6_1_4` varchar(30) DEFAULT NULL,
  `r_t_ins_7_1_1` char(1) DEFAULT NULL,
  `r_t_ins_7_1_2` char(1) DEFAULT NULL,
  `t_t_ins_7_1_3` varchar(200) DEFAULT NULL,
  `h_t_ins_7_1_4` varchar(30) DEFAULT NULL,
  `r_t_ins_8_1_1` char(1) DEFAULT NULL,
  `r_t_ins_8_1_2` char(1) DEFAULT NULL,
  `t_t_ins_8_1_3` varchar(200) DEFAULT NULL,
  `h_t_ins_8_1_4` varchar(30) DEFAULT NULL,
  `r_t_ins_9_1_1` char(1) DEFAULT NULL,
  `r_t_ins_9_1_2` char(1) DEFAULT NULL,
  `t_t_ins_9_1_3` varchar(200) DEFAULT NULL,
  `h_t_ins_9_1_4` varchar(30) DEFAULT NULL,
  `r_t_ins_789_additional_1_1` char(1) DEFAULT NULL,
  `r_t_ins_789_additional_1_2` char(1) DEFAULT NULL,
  `t_t_ins_789_additional_1_3` varchar(200) DEFAULT NULL,
  `h_t_ins_789_additional_1_4` varchar(30) DEFAULT NULL,
  `r_t_ins_789_additional_2_1` char(1) DEFAULT NULL,
  `r_t_ins_789_additional_2_2` char(1) DEFAULT NULL,
  `t_t_ins_789_additional_2_3` varchar(200) DEFAULT NULL,
  `h_t_ins_789_additional_2_4` varchar(30) DEFAULT NULL,
  `r_t_ins_789_additional_3_1` char(1) DEFAULT NULL,
  `r_t_ins_789_additional_3_2` char(1) DEFAULT NULL,
  `t_t_ins_789_additional_3_3` varchar(200) DEFAULT NULL,
  `h_t_ins_789_additional_3_4` varchar(30) DEFAULT NULL,
  `r_t_ins_101112_1_1` char(1) DEFAULT NULL,
  `r_t_ins_101112_1_2` char(1) DEFAULT NULL,
  `t_t_ins_101112_1_3` varchar(200) DEFAULT NULL,
  `h_t_ins_101112_1_4` varchar(30) DEFAULT NULL,
  `r_t_ins_101112_2_1` char(1) DEFAULT NULL,
  `r_t_ins_101112_2_2` char(1) DEFAULT NULL,
  `t_t_ins_101112_2_3` varchar(200) DEFAULT NULL,
  `h_t_ins_101112_2_4` varchar(30) DEFAULT NULL,
  `r_t_ins_101112_3_1` char(1) DEFAULT NULL,
  `r_t_ins_101112_3_2` char(1) DEFAULT NULL,
  `t_t_ins_101112_3_3` varchar(200) DEFAULT NULL,
  `h_t_ins_101112_3_4` varchar(30) DEFAULT NULL,
  `r_t_ins_101112_4_1` char(1) DEFAULT NULL,
  `r_t_ins_101112_4_2` char(1) DEFAULT NULL,
  `t_t_ins_101112_4_3` varchar(200) DEFAULT NULL,
  `h_t_ins_101112_4_4` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user_id` varchar(20) NOT NULL,
  `password` varchar(200) NOT NULL,
  `role` varchar(100) NOT NULL,
  `password_inc_count` int(11) DEFAULT NULL,
  `lasted_login_datetime` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `password`, `role`, `password_inc_count`, `lasted_login_datetime`) VALUES
('expert11', 'lonely', 'A', 0, '2015-12-20 12:31:04'),
('nuton', 'nuton', 'A', 0, '2015-12-31 14:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auth_tokens`
--
ALTER TABLE `auth_tokens`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `book_category`
--
ALTER TABLE `book_category`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contribute`
--
ALTER TABLE `contribute`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `design_book`
--
ALTER TABLE `design_book`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `design_book_instructor`
--
ALTER TABLE `design_book_instructor`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `math_book`
--
ALTER TABLE `math_book`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `math_book_instructor`
--
ALTER TABLE `math_book_instructor`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `participant`
--
ALTER TABLE `participant`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `province`
--
ALTER TABLE `province`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `science_book`
--
ALTER TABLE `science_book`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `science_book_instructor`
--
ALTER TABLE `science_book_instructor`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `technology_book`
--
ALTER TABLE `technology_book`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `technology_book_instructor`
--
ALTER TABLE `technology_book_instructor`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `auth_tokens`
--
ALTER TABLE `auth_tokens`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `participant`
--
ALTER TABLE `participant`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รหัสผู้ประเมิน',AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

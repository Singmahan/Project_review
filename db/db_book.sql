-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 06, 2018 at 08:13 AM
-- Server version: 5.7.17-log
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_book`
--

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `c_id` int(11) NOT NULL,
  `c_id_book` int(11) NOT NULL,
  `c_book` varchar(50) NOT NULL,
  `c_detail` text NOT NULL,
  `c_name` varchar(50) NOT NULL,
  `c_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`c_id`, `c_id_book`, `c_book`, `c_detail`, `c_name`, `c_date`) VALUES
(1, 1, 'MATLAB การประยุกต์ใช้งานทางวิศวกรรมไฟฟ้า', 'อ่านแล้วเข้าใจง่ายดีครับ ', 'อัศนัย แสนศิริ', '2018-10-06 04:16:03'),
(2, 1, 'MATLAB การประยุกต์ใช้งานทางวิศวกรรมไฟฟ้า', 'มีเนื้อหาที่ดี เหมาะแก่การศึกษาเป็นอย่างมาก', 'อัศนัย แสนศิริ', '2018-10-06 04:16:44');

-- --------------------------------------------------------

--
-- Table structure for table `login_member`
--

CREATE TABLE `login_member` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `status` enum('0','1','2','3') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `login_member`
--

INSERT INTO `login_member` (`id`, `username`, `password`, `name`, `email`, `status`) VALUES
(1, 'admin', 'admin', 'admin', 'admin@hotmail.com', '1'),
(2, 'member', 'member', 'member', 'member@hotmail.com', '2'),
(3, 'aaa', 'aaa', 'อัศนัย แสนศิริ', 'singmahan1.7@gmail.com', '0'),
(5, 'bbb', 'bbb', 'อัศนัย', 'bbb@gmail.com', '3');

-- --------------------------------------------------------

--
-- Table structure for table `problem`
--

CREATE TABLE `problem` (
  `p_id` int(11) NOT NULL,
  `p_name` varchar(50) NOT NULL,
  `p_email` varchar(50) NOT NULL,
  `p_detail` text NOT NULL,
  `p_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `problem`
--

INSERT INTO `problem` (`p_id`, `p_name`, `p_email`, `p_detail`, `p_date`) VALUES
(1, 'อัศนัย', 'singmahan1.7@gmail.com', 'สมัครสมาชิกไม่ได้', '2018-10-06 07:27:34');

-- --------------------------------------------------------

--
-- Table structure for table `problem_block`
--

CREATE TABLE `problem_block` (
  `pb_id` int(11) NOT NULL,
  `pb_name` varchar(50) NOT NULL,
  `pb_email` varchar(50) NOT NULL,
  `pb_detail` text NOT NULL,
  `pb_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `problem_block`
--

INSERT INTO `problem_block` (`pb_id`, `pb_name`, `pb_email`, `pb_detail`, `pb_date`) VALUES
(1, 'อัศนัย', 'bbb@gmail.com', 'เข้าสู่ระบบไม่ได้', '2018-10-06 07:40:11');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_book`
--

CREATE TABLE `tbl_book` (
  `id` int(11) NOT NULL,
  `type_id` int(11) NOT NULL COMMENT 'ประเภทหนังสือ',
  `b_name` varchar(50) NOT NULL COMMENT 'ชื่อหนังสือ',
  `b_dcall` varchar(50) NOT NULL COMMENT 'รหัสหนังสือ',
  `b_author` varchar(50) NOT NULL COMMENT 'ชื่อผู้แต่ง',
  `b_print` varchar(50) NOT NULL COMMENT 'ครั้งที่พิมพ์',
  `b_imprint` varchar(100) NOT NULL COMMENT 'พิมพลักษณ์',
  `b_physical` varchar(100) NOT NULL COMMENT 'ลักษณะทางกายภาพ',
  `b_heading` varchar(100) NOT NULL COMMENT 'หัวเรื่อง',
  `b_isbn` varchar(50) NOT NULL COMMENT 'ISBN',
  `b_briefly` text NOT NULL COMMENT 'เนื้อหาสังเขป',
  `b_img1` varchar(50) NOT NULL COMMENT 'รูปภาพที่ 1 ',
  `b_img2` varchar(50) NOT NULL COMMENT 'รูปภาพที่ 2',
  `b_img3` varchar(50) NOT NULL COMMENT 'รูปภาพที่ 3 ',
  `date` date NOT NULL COMMENT 'วันที่เพิ่ม',
  `p_view` int(30) NOT NULL COMMENT 'การดู',
  `rating` int(11) NOT NULL DEFAULT '0',
  `rating_count` int(11) NOT NULL,
  `comment_count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_book`
--

INSERT INTO `tbl_book` (`id`, `type_id`, `b_name`, `b_dcall`, `b_author`, `b_print`, `b_imprint`, `b_physical`, `b_heading`, `b_isbn`, `b_briefly`, `b_img1`, `b_img2`, `b_img3`, `date`, `p_view`, `rating`, `rating_count`, `comment_count`) VALUES
(1, 1, 'MATLAB การประยุกต์ใช้งานทางวิศวกรรมไฟฟ้า', '005.369 ร112ม 2558', 'รัชลิดา ลิปิกรณ์.', '-', '-', '-', '-', '-', 'โปรแกรม Matlab จัดว่าเป็นเครื่องมือสำคัญอย่างหนึ่งที่ช่วยให้นิสิตนักศึกษาโดยเฉพาะทางวิศวกรรมไฟฟ้าสื่อสารและโทรคมนาคมได้มีโอกาสเรียนรู้ทฤษฎี ทดสอบแนวคิด พัฒนาองค์ความรู้ใหม่ และวิจัยเชิงลึกได้อย่างมีประสิทธิภาพ หนังสือ \"การใช้งานโปรแกรม Matlab\" เล่มนี้ เป็นการอธิบายส่วนใหญ่ การยกตัวอย่างโปรแกรมง่ายๆ เป็นสื่อแทนการอธิบายวิธีการใช้งานโดยตรง การเรียนรู้ในแนวนี้ทำให้ผู้อ่านเข้าใจได้ง่ายและสามารถจับจุดสำคัญได้ จึงเหมาะสำหรับนิสิต นักศึกษา และนักวิชาการทางด้านวิทยาศาสตร์ วิศวกรรมศาสตร์ที่มีความสนใจในการใช้งานโปรแกรม Matlab ขั้นเบื้องต้น', 'img_5bb78b0201882.jpg', 'img_5bb78b020188d.jpg', 'img_5bb78b0201893.jpg', '2018-10-05', 5, 0, 0, 2),
(2, 1, 'Microsoft Office 2010', '005.369 พ53ม 2553', 'เพ็ญนภา สำเนียง.', '-', '-', '-', '-', '-', 'หนังสือที่จะช่วยให้คุณเรียนรู้การใช้งาน Microsoft Office 2010 ได้ด้วยวิธีง่ายๆ ทั้ง Word, Excel, PowerPoint, Access และ Outlook ในเล่มได้อธิบายเนื้อหาโดยละเอียดในแต่ละเครื่องมือการใช้งาน พร้อมตัวอย่างหลากหลายและภาพประกอบชัดเจน สามารถเรียนรู้ได้ด้วยตัวเอง', 'img_5bb78b966f232.jpg', 'img_5bb78b966f236.jpg', 'img_5bb78b966f239.jpg', '2018-10-05', 0, 0, 0, 0),
(3, 1, 'PHP', '005.276 ก34พ 2552', 'กิตติ ภักดีวัฒนะกุล.', '-', '-', '-', '-', '-', '-', 'img_5bb78bee8eace.jpg', 'img_5bb78bee8ead3.jpg', 'img_5bb78bee8ead6.jpg', '2018-10-03', 2, 0, 0, 0),
(4, 1, 'การเขียนโปรแกรมด้วยภาษาซี = Programming With C', '005.133 อ86ก 2559', 'โอภาส เอี่ยมสิริวงศ์.', '-', '-', '-', '-', '-', '-', 'img_5bb78ca7bea9f.jpg', 'img_5bb78ca7beaa4.jpg', 'img_5bb78ca7beaa7.jpg', '2018-10-05', 0, 0, 0, 0),
(5, 1, 'คู่มือพัฒนาโปรแกรม Android ฉบับสร้างสื่อการสอน', '005.432 จ111ค 2559', 'จักรชัย โสอินทร์.', '-', 'กรุงเทพฯ: โปรวิชั่น, 2559.', '552 หน้า:ภาพประกอบ;24 ซม.', 'สื่อการสอน.  	แอนดรอยด์(ระบบปฏิบัติการคอมพิวเตอร์).', '9786162045981', ' \"คู่มือพัฒนาโปรแกรม Android ฉบับสร้างสื่อการสอน\" นำเสนอวิธีการเขียนโปรแกรม Android เพื่อสร้างสื่อการสอนให้น่าสนใจ พร้อมฟังก์ชันเสริมต่างๆ และเกมเบื้องต้น โดยอธิบาย เป็นขั้นเป็นตอนตั้งแต่ติดตั้งจนใช้งานได้จริง ทำงานได้ทั้งส่วน Emulator ติดตั้งบนโทรศัพท์เคลื่อนที่จริง และเผยแพร่บน Google Play ทันสมัยกับการปรับปรุงใหม่บน Android Studio เหมาะกับนักเรียน นักศึกษา ครูอาจารย์ ที่ต้องเรียนรู้การเขียนโปรแกรม Android สำหรับส้างสื่อการสอนและเกมเบื้องต้น', 'img_5bb78d3a040b2.jpg', 'img_5bb78d3a040b8.jpg', 'img_5bb78d3a040bb.jpg', '2018-10-05', 3, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_book_type`
--

CREATE TABLE `tbl_book_type` (
  `type_id` int(11) NOT NULL,
  `type_name` varchar(50) NOT NULL,
  `datetime` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_book_type`
--

INSERT INTO `tbl_book_type` (`type_id`, `type_name`, `datetime`) VALUES
(1, 'หนังสือทั่วไป', '2018-08-03'),
(2, 'วิจัย / วิทยานิพนธ์', '2018-08-03'),
(3, 'หนังสืออ้างอิง', '2018-08-03'),
(4, 'วารสาร / สิ่งพิมพ์ต่อเนื่อง', '2018-08-03'),
(5, 'เยาวชน', '2018-09-25');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `login_member`
--
ALTER TABLE `login_member`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `problem`
--
ALTER TABLE `problem`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `problem_block`
--
ALTER TABLE `problem_block`
  ADD PRIMARY KEY (`pb_id`);

--
-- Indexes for table `tbl_book`
--
ALTER TABLE `tbl_book`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_book_type`
--
ALTER TABLE `tbl_book_type`
  ADD PRIMARY KEY (`type_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `login_member`
--
ALTER TABLE `login_member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `problem`
--
ALTER TABLE `problem`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `problem_block`
--
ALTER TABLE `problem_block`
  MODIFY `pb_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_book`
--
ALTER TABLE `tbl_book`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tbl_book_type`
--
ALTER TABLE `tbl_book_type`
  MODIFY `type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

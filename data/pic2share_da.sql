-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 09, 2015 at 06:37 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `pic2share_da`
--

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE IF NOT EXISTS `comment` (
  `Id_cmt` int(11) NOT NULL,
  `Id_Content` int(11) NOT NULL,
  `ID_Pcmt` int(11) NOT NULL,
  `cmt` int(11) NOT NULL,
  `time_cmt` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `content`
--

CREATE TABLE IF NOT EXISTS `content` (
`Id_content` int(11) NOT NULL,
  `Id_Powner` int(11) NOT NULL,
  `url_img` varchar(20) NOT NULL,
  `describe` text NOT NULL,
  `mode` int(11) NOT NULL,
  `time_created` datetime NOT NULL,
  `time_update` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `favorite`
--

CREATE TABLE IF NOT EXISTS `favorite` (
`Id_favorite` int(11) NOT NULL,
  `Id_Content` int(11) NOT NULL,
  `ID_Pfavorite` int(11) NOT NULL,
  `time_favorite` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `friends`
--

CREATE TABLE IF NOT EXISTS `friends` (
`stt` int(11) NOT NULL,
  `ID_P1` int(11) NOT NULL,
  `ID_P2` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE IF NOT EXISTS `gallery` (
`Id_gallery` int(11) NOT NULL,
  `Id_content` int(11) NOT NULL,
  `time_gallery` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `share`
--

CREATE TABLE IF NOT EXISTS `share` (
`stt` int(11) NOT NULL,
  `Id_content` int(11) NOT NULL,
  `ID_Pshare` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tag`
--

CREATE TABLE IF NOT EXISTS `tag` (
`Id_tag` int(11) NOT NULL,
  `Id_Content` int(11) NOT NULL,
  `tag_content` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tag`
--

INSERT INTO `tag` (`Id_tag`, `Id_Content`, `tag_content`) VALUES
(1, 1, 'flower'),
(2, 2, 'people');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`ID_user` int(11) NOT NULL,
  `fullname` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(15) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(35) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `avatar` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `cover` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `address` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `company` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `level` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID_user`, `fullname`, `username`, `password`, `email`, `avatar`, `cover`, `address`, `company`, `level`) VALUES
(1, 'Vũ Thị Ngọc Ninh', 'Ngọc Ninh', 'f73d1e7e2ff42877449fc89dbd1986cc', 'a.little.pean@gmail.com', 'NgocNinh.jpg', 'Ngoc Ninh b1', '488, tổ 7, khu 2, ấp 3, An Hòa, Biên Hòa, Đồng Nai', 'Trường ĐH Công Nghệ Thông Tin - Đại Học Quốc Gia - Tp Hồ Chí Minh', 1),
(2, 'Nguyễn Phú Sĩ', 'Phú Sĩ', '16935b33206441f638b9578deb495b66', 'fuji.eagle@gmail.com', 'PhuSi.jpg', 'Phu Si b1', 'Phú Giáo', 'UIT', 0),
(3, 'Trần Minh Tiến', 'Minh Tiến', '73c2a4fe19614ea6ecc3694f74c20d58', 'minhtien@gmail.com', 'MinhTien.jpg', 'Minh Tien b1', 'Thủ Dầu Môt', 'UIT', 0),
(4, 'Nguyen Thi Anh', 'Anh Thi', '2885aeddb5d3dc9964670047ba7dddf9', 'anhthi@gmail.com', '', '', 'Binh Duong', 'uit', 0),
(8, 'Hoài An', 'Hoài An', '0d59ea092bb63b8000ddc5fe02188f4d', 'an@gmail.com', '', '', 'Đồng Nai', 'UIT', 0),
(13, 'Ngọc Anh', 'Ngọc Anh', '892514a23c6576fe5e5ea4f39e373153', 'ngocanh@gmail.com', '', '', 'Nam Định', 'UIT', 0),
(21, 'Nguyễn Thảo Vy', 'Thảo Vy', '57fd7ebbc62f6f7d66b3dcb5dfda95cc', 'thaovy@gmail.com', '', '', 'Bình Định', 'UIT', 0),
(23, 'Phan Thanh Trúc', 'Thanh Trúc', '59800c316052a2171d5a6465e3f2710f', 'thanhtruc@gmail.com', 'avatar.png', 'cover', 'Tp.Hồ Chí Minh', 'TMA Company', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
 ADD PRIMARY KEY (`Id_cmt`);

--
-- Indexes for table `content`
--
ALTER TABLE `content`
 ADD PRIMARY KEY (`Id_content`);

--
-- Indexes for table `favorite`
--
ALTER TABLE `favorite`
 ADD PRIMARY KEY (`Id_favorite`);

--
-- Indexes for table `friends`
--
ALTER TABLE `friends`
 ADD PRIMARY KEY (`stt`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
 ADD PRIMARY KEY (`Id_gallery`);

--
-- Indexes for table `share`
--
ALTER TABLE `share`
 ADD PRIMARY KEY (`stt`);

--
-- Indexes for table `tag`
--
ALTER TABLE `tag`
 ADD PRIMARY KEY (`Id_tag`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`ID_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `content`
--
ALTER TABLE `content`
MODIFY `Id_content` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `favorite`
--
ALTER TABLE `favorite`
MODIFY `Id_favorite` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `friends`
--
ALTER TABLE `friends`
MODIFY `stt` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
MODIFY `Id_gallery` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `share`
--
ALTER TABLE `share`
MODIFY `stt` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tag`
--
ALTER TABLE `tag`
MODIFY `Id_tag` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `ID_user` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=24;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

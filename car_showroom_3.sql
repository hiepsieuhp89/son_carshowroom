-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 12, 2022 at 04:42 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `car_showroom_3`
--

-- --------------------------------------------------------

--
-- Table structure for table `binhluan`
--

CREATE TABLE `binhluan` (
  `MAXE` int(11) NOT NULL,
  `ID` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `PARENT` int(11) DEFAULT NULL,
  `CREATED` date DEFAULT NULL,
  `MODIFIED` date DEFAULT NULL,
  `CONTENT` varchar(10000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `FULLNAME` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `UPVOTE_COUNT` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `chitiethoadon`
--

CREATE TABLE `chitiethoadon` (
  `MAXE` int(11) NOT NULL,
  `MAHD` int(11) NOT NULL,
  `SOLUONG` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `danhgia`
--

CREATE TABLE `danhgia` (
  `MAXE` int(11) NOT NULL,
  `MAKH` int(11) NOT NULL,
  `DIEM` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hangxe`
--

CREATE TABLE `hangxe` (
  `MADMS` int(11) NOT NULL,
  `TENDMS` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `hangxe`
--

INSERT INTO `hangxe` (`MADMS`, `TENDMS`) VALUES
(1, 'Toyota'),
(2, 'Yamaha'),
(3, 'Lamborghini'),
(4, 'Mazda'),
(5, 'Mercedes-benz');

--
-- Triggers `hangxe`
--
DELIMITER $$
CREATE TRIGGER `xoasach_dms` BEFORE DELETE ON `hangxe` FOR EACH ROW DELETE FROM SACH WHERE MADMS = OLD.MADMS
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `hoadon`
--

CREATE TABLE `hoadon` (
  `MAHD` int(11) NOT NULL,
  `MAKH` int(11) DEFAULT NULL,
  `NGAYHD` date DEFAULT NULL,
  `TONGTIEN` bigint(20) DEFAULT NULL,
  `TENNN` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `DIACHI` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `SDT` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `EMAIL` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `TRANGTHAI` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Triggers `hoadon`
--
DELIMITER $$
CREATE TRIGGER `xoacthd` BEFORE DELETE ON `hoadon` FOR EACH ROW DELETE FROM CHITIETHOADON WHERE MAHD = OLD.MAHD
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `khachhang`
--

CREATE TABLE `khachhang` (
  `MAKH` int(11) NOT NULL,
  `TENKH` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `DIACHI` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `SDT` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `EMAIL` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `MATKHAU` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `TENTK` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `NGAYSINH` date NOT NULL,
  `GIOITINH` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Triggers `khachhang`
--
DELIMITER $$
CREATE TRIGGER `xoahd` BEFORE DELETE ON `khachhang` FOR EACH ROW DELETE FROM HOADON WHERE MAKH = OLD.MAKH
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `kho`
--

CREATE TABLE `kho` (
  `MAKHO` int(11) NOT NULL,
  `TENKHO` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `DIACHI` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `kho`
--

INSERT INTO `kho` (`MAKHO`, `TENKHO`, `DIACHI`) VALUES
(1, 'Việt Nam', ''),
(2, 'Mỹ', NULL),
(4, 'Nga', ''),
(5, 'Đức', ''),
(6, 'Anh', ''),
(7, 'Pháp', ''),
(8, 'Trung Quốc', ''),
(9, 'Nhật Bản', '');

--
-- Triggers `kho`
--
DELIMITER $$
CREATE TRIGGER `xoasach_nxb` BEFORE DELETE ON `kho` FOR EACH ROW DELETE FROM SACH WHERE MANXB = OLD.MANXB
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `loaixe`
--

CREATE TABLE `loaixe` (
  `MALOAI` int(11) NOT NULL,
  `TENLOAI` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `loaixe`
--

INSERT INTO `loaixe` (`MALOAI`, `TENLOAI`) VALUES
(1, 'Xe mui trần'),
(2, 'Xe ngắn'),
(4, 'Xe limousine'),
(5, 'Xe limousine 2'),
(6, 'Xe cao cấp'),
(7, 'Xe thương gia'),
(8, 'Xe bus du lịch'),
(9, 'Xe hành trình'),
(10, 'Xe địa hình');

--
-- Triggers `loaixe`
--
DELIMITER $$
CREATE TRIGGER `xoasach_ls` BEFORE DELETE ON `loaixe` FOR EACH ROW DELETE FROM SACH WHERE MALOAI = OLD.MALOAI
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `nhaphanphoi`
--

CREATE TABLE `nhaphanphoi` (
  `MANPP` int(11) NOT NULL,
  `TENNPP` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `GIOITHIEU` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `nhaphanphoi`
--

INSERT INTO `nhaphanphoi` (`MANPP`, `TENNPP`, `GIOITHIEU`) VALUES
(1, 'npp1', '');

--
-- Triggers `nhaphanphoi`
--
DELIMITER $$
CREATE TRIGGER `xoasach_tg` BEFORE DELETE ON `nhaphanphoi` FOR EACH ROW DELETE FROM SACH WHERE MATG = OLD.MATG
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `taikhoan`
--

CREATE TABLE `taikhoan` (
  `MATK` int(11) NOT NULL,
  `TENTK` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `MATKHAU` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `CHUCVU` varchar(40) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `taikhoan`
--

INSERT INTO `taikhoan` (`MATK`, `TENTK`, `MATKHAU`, `CHUCVU`) VALUES
(1, 'admin123', '0192023a7bbd73250516f069df18b500', 'Quản lý'),
(6, 'user123', 'user123', 'Khách hàng');

-- --------------------------------------------------------

--
-- Table structure for table `xe`
--

CREATE TABLE `xe` (
  `MAXE` int(11) NOT NULL,
  `MANPP` int(11) DEFAULT NULL,
  `MALOAI` int(11) DEFAULT NULL,
  `MADMS` int(11) DEFAULT NULL,
  `MAKHO` int(11) DEFAULT NULL,
  `TENXE` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `GIABAN` bigint(20) DEFAULT NULL,
  `BAIGIOITHIEU` mediumtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `HINH` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `KICHTHUOC` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `SOLUONG` int(11) DEFAULT NULL,
  `DUNGTICHXILANH` int(11) DEFAULT NULL,
  `CONLAI` int(11) DEFAULT NULL,
  `NGAYXX` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `xe`
--

INSERT INTO `xe` (`MAXE`, `MANPP`, `MALOAI`, `MADMS`, `MAKHO`, `TENXE`, `GIABAN`, `BAIGIOITHIEU`, `HINH`, `KICHTHUOC`, `SOLUONG`, `DUNGTICHXILANH`, `CONLAI`, `NGAYXX`) VALUES
(2, 1, 1, 1, 1, 'XE 1', 12000000, '<p>1 2 3&nbsp;</p>', '42c33407a0216f7f36303.jpg', '1234', 10, 123, 10, '2022-03-16');

--
-- Triggers `xe`
--
DELIMITER $$
CREATE TRIGGER `xoacthd_danhgia_binhluan_sach` BEFORE DELETE ON `xe` FOR EACH ROW BEGIN
DELETE FROM CHITIETHOADON WHERE MASACH = OLD.MASACH;
DELETE FROM DANHGIA WHERE MASACH = OLD.MASACH;
DELETE FROM BINHLUAN WHERE MASACH = OLD.MASACH;
END
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `binhluan`
--
ALTER TABLE `binhluan`
  ADD PRIMARY KEY (`MAXE`,`ID`);

--
-- Indexes for table `chitiethoadon`
--
ALTER TABLE `chitiethoadon`
  ADD PRIMARY KEY (`MAXE`,`MAHD`),
  ADD KEY `FK_CHITIETHOADON2` (`MAHD`);

--
-- Indexes for table `danhgia`
--
ALTER TABLE `danhgia`
  ADD PRIMARY KEY (`MAXE`,`MAKH`),
  ADD KEY `FK_MAKH_DANHGIA` (`MAKH`);

--
-- Indexes for table `hangxe`
--
ALTER TABLE `hangxe`
  ADD PRIMARY KEY (`MADMS`);

--
-- Indexes for table `hoadon`
--
ALTER TABLE `hoadon`
  ADD PRIMARY KEY (`MAHD`),
  ADD KEY `FK_QH_HOADON_KHACHHANG` (`MAKH`);

--
-- Indexes for table `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`MAKH`);

--
-- Indexes for table `kho`
--
ALTER TABLE `kho`
  ADD PRIMARY KEY (`MAKHO`);

--
-- Indexes for table `loaixe`
--
ALTER TABLE `loaixe`
  ADD PRIMARY KEY (`MALOAI`);

--
-- Indexes for table `nhaphanphoi`
--
ALTER TABLE `nhaphanphoi`
  ADD PRIMARY KEY (`MANPP`);

--
-- Indexes for table `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`MATK`);

--
-- Indexes for table `xe`
--
ALTER TABLE `xe`
  ADD PRIMARY KEY (`MAXE`),
  ADD KEY `FK_QH_NXB_SACH` (`MANPP`),
  ADD KEY `FK_QH_SACH_DANHMUC` (`MADMS`),
  ADD KEY `FK_QH_SACH_loaixe` (`MALOAI`),
  ADD KEY `FK_QH_SACH_TACGIA` (`MAKHO`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `hangxe`
--
ALTER TABLE `hangxe`
  MODIFY `MADMS` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `hoadon`
--
ALTER TABLE `hoadon`
  MODIFY `MAHD` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `MAKH` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kho`
--
ALTER TABLE `kho`
  MODIFY `MAKHO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `loaixe`
--
ALTER TABLE `loaixe`
  MODIFY `MALOAI` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `nhaphanphoi`
--
ALTER TABLE `nhaphanphoi`
  MODIFY `MANPP` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `taikhoan`
--
ALTER TABLE `taikhoan`
  MODIFY `MATK` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `xe`
--
ALTER TABLE `xe`
  MODIFY `MAXE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `binhluan`
--
ALTER TABLE `binhluan`
  ADD CONSTRAINT `FK_MASACH` FOREIGN KEY (`MAXE`) REFERENCES `xe` (`MAXE`);

--
-- Constraints for table `chitiethoadon`
--
ALTER TABLE `chitiethoadon`
  ADD CONSTRAINT `FK_CHITIETHOADON` FOREIGN KEY (`MAXE`) REFERENCES `xe` (`MAXE`),
  ADD CONSTRAINT `FK_CHITIETHOADON2` FOREIGN KEY (`MAHD`) REFERENCES `hoadon` (`MAHD`);

--
-- Constraints for table `danhgia`
--
ALTER TABLE `danhgia`
  ADD CONSTRAINT `FK_MAKH_DANHGIA` FOREIGN KEY (`MAKH`) REFERENCES `khachhang` (`MAKH`),
  ADD CONSTRAINT `FK_MASACH_DANHGIA` FOREIGN KEY (`MAXE`) REFERENCES `xe` (`MAXE`);

--
-- Constraints for table `hoadon`
--
ALTER TABLE `hoadon`
  ADD CONSTRAINT `FK_QH_HOADON_KHACHHANG` FOREIGN KEY (`MAKH`) REFERENCES `khachhang` (`MAKH`);

--
-- Constraints for table `xe`
--
ALTER TABLE `xe`
  ADD CONSTRAINT `FK_QH_NXB_SACH` FOREIGN KEY (`MANPP`) REFERENCES `kho` (`MAKHO`),
  ADD CONSTRAINT `FK_QH_SACH_DANHMUC` FOREIGN KEY (`MADMS`) REFERENCES `hangxe` (`MADMS`),
  ADD CONSTRAINT `FK_QH_SACH_TACGIA` FOREIGN KEY (`MAKHO`) REFERENCES `nhaphanphoi` (`MANPP`),
  ADD CONSTRAINT `FK_QH_SACH_loaixe` FOREIGN KEY (`MALOAI`) REFERENCES `loaixe` (`MALOAI`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

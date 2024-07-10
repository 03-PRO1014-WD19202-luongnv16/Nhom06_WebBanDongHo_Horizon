-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 10, 2024 at 06:03 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `duan1624`
--

-- --------------------------------------------------------

--
-- Table structure for table `binhluan`
--

CREATE TABLE `binhluan` (
  `id` int(11) NOT NULL,
  `noidung` varchar(255) NOT NULL,
  `iduser` int(11) NOT NULL,
  `idpro` int(11) NOT NULL,
  `ngaybinhluan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `danhmuc`
--

CREATE TABLE `danhmuc` (
  `id_dm` int(11) NOT NULL,
  `tendm` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `danhmuc`
--

INSERT INTO `danhmuc` (`id_dm`, `tendm`) VALUES
(1, 'dm-1'),
(2, 'dm-2');

-- --------------------------------------------------------

--
-- Table structure for table `donhang`
--

CREATE TABLE `donhang` (
  `id` int(11) NOT NULL,
  `id_sp` int(11) NOT NULL,
  `tensp` varchar(255) NOT NULL,
  `anhsp` varchar(255) NOT NULL,
  `trangthai` int(11) NOT NULL COMMENT '0. Đơn hàng mới 1. Đang xử lý 2. Đang giao hàng 3. Đã giao hàng	',
  `pttt` tinyint(4) NOT NULL COMMENT '1. Thanh toán trực tiếp 2. Chuyển khoản 3. Thanh toán online',
  `soluong` double NOT NULL,
  `gia` int(11) NOT NULL,
  `tonggia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `donhang`
--

INSERT INTO `donhang` (`id`, `id_sp`, `tensp`, `anhsp`, `trangthai`, `pttt`, `soluong`, `gia`, `tonggia`) VALUES
(1, 1, 'sp-mau', 'b.webp', 1, 1, 2, 70000, 140000);

-- --------------------------------------------------------

--
-- Table structure for table `hoadon`
--

CREATE TABLE `hoadon` (
  `bill_id` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `ten` text NOT NULL,
  `email` text NOT NULL,
  `tel` text NOT NULL,
  `address` text NOT NULL,
  `trangthai` text NOT NULL,
  `trangthai_tt` text NOT NULL,
  `tongtien` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hoadonhang`
--

CREATE TABLE `hoadonhang` (
  `hdh_id` int(11) NOT NULL,
  `bill_id` int(11) NOT NULL,
  `id_sp` int(11) NOT NULL,
  `soluong` int(11) NOT NULL,
  `tensp` text NOT NULL,
  `giasale` double NOT NULL,
  `anhsp` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sanpham`
--

CREATE TABLE `sanpham` (
  `id_sp` int(11) NOT NULL,
  `tensp` text NOT NULL,
  `anhsp` text NOT NULL,
  `giasp` double NOT NULL,
  `mota` text NOT NULL,
  `id_dm` int(11) NOT NULL,
  `gianhap` double NOT NULL,
  `luotxem` int(11) NOT NULL,
  `giasale` double NOT NULL,
  `giaban` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sanpham`
--

INSERT INTO `sanpham` (`id_sp`, `tensp`, `anhsp`, `giasp`, `mota`, `id_dm`, `gianhap`, `luotxem`, `giasale`, `giaban`) VALUES
(21, 'Timeless Classic', '../img/f.webp', 8446556, 'Phong cách đậm', 1, 2000, 20, 100, 1900),
(22, 'Midnight Glow', '../img/b.webp', 9164708, 'Hiện đại và thanh lịch', 1, 0, 0, 0, 0),
(23, 'Urban Navigator', '../img/c.webp', 783871, 'Thiết kế gọn nhẹ', 1, 0, 0, 0, 0),
(24, 'Rose Gold Elegance', '../img/d.webp', 15825231, 'Sang trọng với vàng hồng', 1, 0, 0, 0, 0),
(25, 'Sporty Chrono', '../img/e.webp', 17674543, 'Mạnh mẽ với chức năng Chrono', 2, 0, 0, 0, 0),
(26, 'Vintage Charm', '../img/f.webp', 1497021, 'Lôi cuốn với phong cách cổ điển', 2, 0, 0, 0, 0),
(27, 'Tech Savvy', '../img/g.webp', 13561479, 'Sành điệu với công nghệ mới', 2, 0, 0, 0, 0),
(28, 'Diamond Luxe', '../img/h.webp', 4216334, 'Lấp lánh với kim cương', 2, 0, 0, 0, 0),
(29, 'Titanium Edge', '../img/i.webp', 97231, 'Độ bền cao với chất liệu Titanium', 3, 0, 0, 0, 0),
(30, 'Retro Revival', '../img/j.webp', 7537153, 'Tinh tế và lôi cuốn', 3, 0, 0, 0, 0),
(31, 'Sea Explorer', '../img/k.webp', 17694071, 'Thần thái biển cả', 3, 0, 0, 0, 0),
(32, 'City Sleek', '../img/l.webp', 6758900, 'Phong cách đô thị', 4, 0, 0, 0, 0),
(33, 'Bold Statement', '../img/m.webp', 412288, 'Táo bạo và nổi bật', 4, 0, 0, 0, 0),
(34, 'Modern Minimalist', '../img/n.webp', 1484740, 'Đơn giản và hiện đại', 4, 0, 0, 0, 0),
(35, 'Chronograph Cruiser', '../img/o.webp', 6186838, 'Năng động với chức năng Chronograph', 4, 0, 0, 0, 0),
(36, 'Aviator Ace', '../img/p.webp', 6779967, 'Mạnh mẽ với phong cách phi công', 1, 0, 0, 0, 0),
(37, 'Crystal Cascade', '../img/q.webp', 15339325, 'Lấp lánh với pha lê', 2, 0, 0, 0, 0),
(38, 'Swiss Precision', '../img/r.webp', 16956722, 'Sự chính xác từ Thụy Sĩ', 1, 0, 0, 0, 0),
(39, 'Dapper Gent', '../img/s.webp', 19065638, 'Phong cách lịch lãm', 2, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `taikhoan`
--

CREATE TABLE `taikhoan` (
  `id` int(11) NOT NULL,
  `user` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `anh` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `tel` varchar(20) NOT NULL,
  `role` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `taikhoan`
--

INSERT INTO `taikhoan` (`id`, `user`, `pass`, `email`, `anh`, `address`, `tel`, `role`) VALUES
(2, 'admin', '1', 'linhakira96@gmail.com', '', 'Thái Bình', '0982345261', 1),
(3, '2', 'a', 'ljnhakira96@gmail.com', '', '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `voucher`
--

CREATE TABLE `voucher` (
  `id` int(11) NOT NULL,
  `ten_voucher` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `voucher`
--

INSERT INTO `voucher` (`id`, `ten_voucher`) VALUES
(1, 'Giảm giá ưu đãi 15% miễn phí ship'),
(2, 'Giảm giá đặc biệt 30% miễn phí ship');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `binhluan`
--
ALTER TABLE `binhluan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_binhluan_sanpham` (`idpro`),
  ADD KEY `fk_binhluan_taikhoan` (`iduser`);

--
-- Indexes for table `danhmuc`
--
ALTER TABLE `danhmuc`
  ADD PRIMARY KEY (`id_dm`);

--
-- Indexes for table `donhang`
--
ALTER TABLE `donhang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_sp` (`id_sp`);

--
-- Indexes for table `hoadon`
--
ALTER TABLE `hoadon`
  ADD PRIMARY KEY (`bill_id`);

--
-- Indexes for table `hoadonhang`
--
ALTER TABLE `hoadonhang`
  ADD PRIMARY KEY (`hdh_id`);

--
-- Indexes for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`id_sp`);

--
-- Indexes for table `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `voucher`
--
ALTER TABLE `voucher`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `binhluan`
--
ALTER TABLE `binhluan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `danhmuc`
--
ALTER TABLE `danhmuc`
  MODIFY `id_dm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `donhang`
--
ALTER TABLE `donhang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `hoadon`
--
ALTER TABLE `hoadon`
  MODIFY `bill_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hoadonhang`
--
ALTER TABLE `hoadonhang`
  MODIFY `hdh_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `id_sp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `taikhoan`
--
ALTER TABLE `taikhoan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `voucher`
--
ALTER TABLE `voucher`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

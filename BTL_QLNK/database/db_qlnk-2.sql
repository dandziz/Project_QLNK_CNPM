-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th3 07, 2022 lúc 03:01 PM
-- Phiên bản máy phục vụ: 10.4.21-MariaDB
-- Phiên bản PHP: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `db_qlnk`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tb_cauhoi`
--

CREATE TABLE `tb_cauhoi` (
  `ma_cauhoi` varchar(9) NOT NULL,
  `hoten` varchar(40) NOT NULL,
  `email` varchar(30) NOT NULL,
  `sdt` varchar(15) NOT NULL,
  `lydo` varchar(300) NOT NULL,
  `ngayhoi` date NOT NULL,
  `trangthai` tinyint(1) NOT NULL,
  `loaicauhoi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tb_chitietshk`
--

CREATE TABLE `tb_chitietshk` (
  `ma_shk` varchar(9) NOT NULL,
  `cccd` varchar(12) NOT NULL,
  `chuho` tinyint(1) NOT NULL,
  `quanhech` varchar(20) NOT NULL,
  `hoten` varchar(40) NOT NULL,
  `hotenkhac` varchar(40) NOT NULL,
  `ngaysinh` date NOT NULL,
  `gioitinh` varchar(5) NOT NULL,
  `nguyenquan` varchar(200) NOT NULL,
  `dantoc` varchar(15) NOT NULL,
  `tongiao` varchar(40) NOT NULL,
  `quoctich` varchar(30) NOT NULL,
  `nghenghiepnoilamviec` varchar(200) NOT NULL,
  `noithuongtrutruocday` varchar(200) NOT NULL,
  `canbodangky` int(10) UNSIGNED NOT NULL,
  `truongcongan` int(10) UNSIGNED NOT NULL,
  `tamvang` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tb_chitietshk`
--

INSERT INTO `tb_chitietshk` (`ma_shk`, `cccd`, `chuho`, `quanhech`, `hoten`, `hotenkhac`, `ngaysinh`, `gioitinh`, `nguyenquan`, `dantoc`, `tongiao`, `quoctich`, `nghenghiepnoilamviec`, `noithuongtrutruocday`, `canbodangky`, `truongcongan`, `tamvang`) VALUES
('010827325', '001201023000', 1, '', 'Đào Văn C', '', '1992-02-01', 'Nam', 'Đội 5 - Thôn A - Xã B - Huyện C - Thành Phố Hà Nội', 'Kinh', 'Không', 'Việt Nam', 'Nông dân', '', 2, 1, 0),
('010827325', '001201023002', 0, 'Vợ', 'Nguyễn Thi N', '', '1994-03-01', 'Nữ', 'Phú Yên - Phú Xuyên - HN', 'Kinh', 'Không', 'Việt Nam', 'Nông dân', '', 2, 1, 0),
('01', '02392834', 1, '', 'Nguyễn Thị F', '', '2022-03-01', 'Nữ', 'HN', 'Kinh', 'Không', 'Việt Nam', 'Nông dân', '', 2, 1, 0),
('0000001', '028398912', 1, '', 'AF', '', '2022-03-05', 'Nam', 'B', 'Kinh', 'Không', 'Việt Nam', 'Nông dân', '', 2, 1, 0),
('0000001', '111111', 0, 'Con', 'Nguyễn Hoài C', '', '2022-03-02', 'Nữ', 'HN', 'Kinh', 'Không', 'Việt Nam', 'Nông dân', '', 2, 1, 0),
('010827325', '1111112', 0, 'Con', 'Nguyễn Hoài C', '', '2022-03-03', 'Nữ', 'HN', 'Kinh', 'Không', 'Việt Nam', 'Nông dân', '', 2, 1, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tb_chucvu`
--

CREATE TABLE `tb_chucvu` (
  `ma_chucvu` int(10) UNSIGNED NOT NULL,
  `hoten` varchar(40) NOT NULL,
  `chucvu` varchar(100) NOT NULL,
  `loaichucvu` int(11) NOT NULL,
  `conlamviec` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tb_chucvu`
--

INSERT INTO `tb_chucvu` (`ma_chucvu`, `hoten`, `chucvu`, `loaichucvu`, `conlamviec`) VALUES
(1, 'Nguyễn Văn B', 'Trưởng công an xã X', 1, 1),
(2, 'Trần Hữu C', 'Công an xã', 2, 1),
(3, 'Nguyễn Thị L', 'Công an xã', 2, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tb_nguoidung`
--

CREATE TABLE `tb_nguoidung` (
  `ma_nguoidung` int(10) UNSIGNED NOT NULL,
  `taikhoan` varchar(20) NOT NULL,
  `matkhau` varchar(100) NOT NULL,
  `trangthai` tinyint(1) NOT NULL,
  `chucvu` int(10) UNSIGNED NOT NULL,
  `ngaykhoitao` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `capbac` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tb_nguoidung`
--

INSERT INTO `tb_nguoidung` (`ma_nguoidung`, `taikhoan`, `matkhau`, `trangthai`, `chucvu`, `ngaykhoitao`, `capbac`) VALUES
(1, 'nguyenvanb', '$2y$10$ZP0chrIq7NXcKcZ0RQwPC.vluWINiuR24YDiPswsNFPVMrxZ5HNHa', 1, 1, '2022-03-03 13:18:31', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tb_phanhoi`
--

CREATE TABLE `tb_phanhoi` (
  `ma_phanhoi` varchar(9) NOT NULL,
  `ma_cauhoi` varchar(9) NOT NULL,
  `phuongphapgiaiquyet` varchar(300) NOT NULL,
  `ngayphanhoi` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tb_sohokhau`
--

CREATE TABLE `tb_sohokhau` (
  `ma_shk` varchar(9) NOT NULL,
  `hotenchuho` varchar(40) NOT NULL,
  `noithuongtru` varchar(200) NOT NULL,
  `ngaycap` date NOT NULL,
  `truongcongan` int(10) UNSIGNED NOT NULL,
  `thanhpho` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tb_sohokhau`
--

INSERT INTO `tb_sohokhau` (`ma_shk`, `hotenchuho`, `noithuongtru`, `ngaycap`, `truongcongan`, `thanhpho`) VALUES
('0000001', 'A', 'B', '2022-03-04', 1, 'HN'),
('01', 'Nguyễn Thị F', 'HN', '2022-03-06', 1, 'HN'),
('010827325', 'Đào Văn A', 'Đội 5 - Thôn A - Xã B - Huyện C - Thành Phố Hà Nội', '2022-01-01', 1, 'Hà Nội');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tb_tamtru`
--

CREATE TABLE `tb_tamtru` (
  `ma_dontt` varchar(9) NOT NULL,
  `conganxa` varchar(30) NOT NULL,
  `hoten` varchar(40) NOT NULL,
  `ngaysinh` date NOT NULL,
  `cccd` varchar(12) NOT NULL,
  `cccd_noicap` varchar(100) NOT NULL,
  `cccd_capngay` date NOT NULL,
  `diachithuongtru` varchar(200) NOT NULL,
  `choohiennay` varchar(200) NOT NULL,
  `ngaybatdau` date NOT NULL,
  `lydo` varchar(300) NOT NULL,
  `email` varchar(30) NOT NULL,
  `xacnhan` tinyint(4) NOT NULL,
  `trangthai` tinyint(4) NOT NULL,
  `file` mediumblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tb_tamvang`
--

CREATE TABLE `tb_tamvang` (
  `ma_dontv` varchar(9) NOT NULL,
  `conganxa` varchar(30) NOT NULL,
  `hoten` varchar(40) NOT NULL,
  `ngaysinh` date NOT NULL,
  `cccd` varchar(12) NOT NULL,
  `cccd_noicap` varchar(100) NOT NULL,
  `cccd_capngay` date NOT NULL,
  `diachithuongtru` varchar(200) NOT NULL,
  `choohiennay` varchar(200) NOT NULL,
  `ngaybatdau` date NOT NULL,
  `lydo` varchar(300) NOT NULL,
  `email` varchar(30) NOT NULL,
  `xacnhan` tinyint(4) NOT NULL,
  `trangthai` tinyint(4) NOT NULL,
  `file` mediumblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `tb_cauhoi`
--
ALTER TABLE `tb_cauhoi`
  ADD PRIMARY KEY (`ma_cauhoi`);

--
-- Chỉ mục cho bảng `tb_chitietshk`
--
ALTER TABLE `tb_chitietshk`
  ADD PRIMARY KEY (`cccd`) USING BTREE,
  ADD KEY `canbodangky` (`canbodangky`),
  ADD KEY `truongcongan` (`truongcongan`),
  ADD KEY `tb_chitietshk_ibfk_1` (`ma_shk`);

--
-- Chỉ mục cho bảng `tb_chucvu`
--
ALTER TABLE `tb_chucvu`
  ADD PRIMARY KEY (`ma_chucvu`);

--
-- Chỉ mục cho bảng `tb_nguoidung`
--
ALTER TABLE `tb_nguoidung`
  ADD PRIMARY KEY (`ma_nguoidung`),
  ADD KEY `chucvu` (`chucvu`);

--
-- Chỉ mục cho bảng `tb_phanhoi`
--
ALTER TABLE `tb_phanhoi`
  ADD PRIMARY KEY (`ma_phanhoi`),
  ADD KEY `ma_cauhoi` (`ma_cauhoi`);

--
-- Chỉ mục cho bảng `tb_sohokhau`
--
ALTER TABLE `tb_sohokhau`
  ADD PRIMARY KEY (`ma_shk`),
  ADD KEY `truongcongan` (`truongcongan`);

--
-- Chỉ mục cho bảng `tb_tamtru`
--
ALTER TABLE `tb_tamtru`
  ADD PRIMARY KEY (`ma_dontt`);

--
-- Chỉ mục cho bảng `tb_tamvang`
--
ALTER TABLE `tb_tamvang`
  ADD PRIMARY KEY (`ma_dontv`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `tb_chucvu`
--
ALTER TABLE `tb_chucvu`
  MODIFY `ma_chucvu` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `tb_nguoidung`
--
ALTER TABLE `tb_nguoidung`
  MODIFY `ma_nguoidung` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `tb_chitietshk`
--
ALTER TABLE `tb_chitietshk`
  ADD CONSTRAINT `tb_chitietshk_ibfk_1` FOREIGN KEY (`ma_shk`) REFERENCES `tb_sohokhau` (`ma_shk`),
  ADD CONSTRAINT `tb_chitietshk_ibfk_2` FOREIGN KEY (`canbodangky`) REFERENCES `tb_chucvu` (`ma_chucvu`),
  ADD CONSTRAINT `tb_chitietshk_ibfk_3` FOREIGN KEY (`truongcongan`) REFERENCES `tb_chucvu` (`ma_chucvu`);

--
-- Các ràng buộc cho bảng `tb_nguoidung`
--
ALTER TABLE `tb_nguoidung`
  ADD CONSTRAINT `tb_nguoidung_ibfk_1` FOREIGN KEY (`chucvu`) REFERENCES `tb_chucvu` (`ma_chucvu`);

--
-- Các ràng buộc cho bảng `tb_phanhoi`
--
ALTER TABLE `tb_phanhoi`
  ADD CONSTRAINT `tb_phanhoi_ibfk_1` FOREIGN KEY (`ma_cauhoi`) REFERENCES `tb_cauhoi` (`ma_cauhoi`);

--
-- Các ràng buộc cho bảng `tb_sohokhau`
--
ALTER TABLE `tb_sohokhau`
  ADD CONSTRAINT `tb_sohokhau_ibfk_1` FOREIGN KEY (`truongcongan`) REFERENCES `tb_chucvu` (`ma_chucvu`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

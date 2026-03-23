-- 1. Tạo bảng Nhà sản xuất
CREATE TABLE `nhasanxuat` (
  `mansx` varchar(2) NOT NULL,
  `tennsx` varchar(40) DEFAULT NULL,
  `quocgia` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`mansx`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- 2. Tạo bảng Khách hàng
CREATE TABLE `khachhang` (
  `makh` varchar(4) NOT NULL,
  `tenkh` varchar(30) DEFAULT NULL,
  `namsinh` int(11) DEFAULT NULL,
  `dienthoai` varchar(10) DEFAULT NULL,
  `diachi` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`makh`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- 3. Tạo bảng Hàng hóa
CREATE TABLE `hanghoa` (
  `mahang` varchar(4) NOT NULL,
  `tenhang` varchar(40) DEFAULT NULL,
  `mansx` varchar(2) DEFAULT NULL,
  `namsx` int(11) DEFAULT NULL,
  `gia` int(11) DEFAULT NULL,
  PRIMARY KEY (`mahang`),
  CONSTRAINT `fk_hanghoa_nsx` FOREIGN KEY (`mansx`) REFERENCES `nhasanxuat` (`mansx`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- 4. Tạo bảng Hóa đơn
CREATE TABLE `hoadon` (
  `mahd` varchar(3) NOT NULL,
  `makh` varchar(4) DEFAULT NULL,
  `mahang` varchar(4) NOT NULL,
  `soluong` int(11) DEFAULT NULL,
  `thanhtien` int(11) DEFAULT NULL,
  PRIMARY KEY (`mahd`, `mahang`),
  CONSTRAINT `fk_hoadon_kh` FOREIGN KEY (`makh`) REFERENCES `khachhang` (`makh`),
  CONSTRAINT `fk_hoadon_hang` FOREIGN KEY (`mahang`) REFERENCES `hanghoa` (`mahang`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- 5. Tạo bảng Tồn kho (Quản lý hàng hóa tồn)
CREATE TABLE `tonkho` (
  `mahang` varchar(4) NOT NULL,
  `tenhang` varchar(40) DEFAULT NULL,
  `mansx` varchar(2) DEFAULT NULL,
  `namsx` int(11) DEFAULT NULL,
  `gia` int(11) DEFAULT NULL,
  `soluong` int(11) DEFAULT NULL,
  PRIMARY KEY (`mahang`),
  CONSTRAINT `fk_tonkho_nsx` FOREIGN KEY (`mansx`) REFERENCES `nhasanxuat` (`mansx`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------
-- NHẬP DỮ LIỆU MẪU
-- --------------------------------------------------------

INSERT INTO `nhasanxuat` VALUES 
('AS', 'ASUS', 'Đài Loan'),
('DE', 'DELL', 'Hoa Kỳ'),
('LE', 'LENOVO', 'Trung Quốc'),
('TO', 'TOSHIBA', 'Nhật Bản');

INSERT INTO `khachhang` VALUES 
('K01', 'Nguyễn Thị Lan', 1980, '0913123456', 'Bạc Liêu'),
('K02', 'Ngô Thanh Minh', 1985, '0913024357', 'Vĩnh Lợi'),
('K03', 'Lâm Văn Thanh', 1979, '0913123457', 'Giá Rai'),
('K04', 'Dương Thu Thủy', 1995, '0913024358', 'Hồng Dân');

INSERT INTO `hanghoa` VALUES 
('AS01', 'Asus TUF', 'AS', 2017, 520),
('AS02', 'Asus Vivobook', 'AS', 2017, 580),
('DE01', 'Dell Vostro', 'DE', 2015, 650),
('DE02', 'Dell Inspiron', 'DE', 2015, 550),
('LE01', 'Lenovo Thinkpad', 'LE', 2019, 750),
('LE02', 'Lenovo Legion', 'LE', 2020, 540),
('LE03', 'Lenovo Yoga', 'LE', 2020, 600),
('TO01', 'Toshiba Satellite', 'TO', 2014, 630);

INSERT INTO `hoadon` VALUES 
('001', 'K01', 'DE01', 2, 1300),
('001', 'K01', 'DE02', 1, 550),
('002', 'K02', 'LE01', 5, 3750),
('002', 'K02', 'LE02', 3, 1620),
('003', 'K02', 'TO01', 1, 630);

INSERT INTO `tonkho` VALUES 
('DE01', 'Dell Vostro', 'DE', 2015, 650, 20),
('DE02', 'Del Inspiron', 'DE', 2015, 550, 30);
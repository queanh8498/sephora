-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.3.16-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for sephora
CREATE DATABASE IF NOT EXISTS `sephora` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_vietnamese_ci */;
USE `sephora`;

-- Dumping structure for table sephora.dondathang
CREATE TABLE IF NOT EXISTS `dondathang` (
  `dh_ma` int(11) NOT NULL AUTO_INCREMENT,
  `dh_ngaylap` datetime NOT NULL,
  `dh_ngaygiao` datetime DEFAULT NULL,
  `dh_noigiao` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dh_trangthaithanhtoan` int(11) NOT NULL,
  `httt_ma` int(11) NOT NULL,
  `kh_tendangnhap` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`dh_ma`),
  KEY `dondathang_khachhang_idx` (`kh_tendangnhap`),
  KEY `dondathang_hinhthucthanhtoan_idx` (`httt_ma`),
  CONSTRAINT `dondathang_hinhthucthanhtoan` FOREIGN KEY (`httt_ma`) REFERENCES `hinhthucthanhtoan` (`httt_ma`),
  CONSTRAINT `dondathang_khachhang` FOREIGN KEY (`kh_tendangnhap`) REFERENCES `khachhang` (`kh_tendangnhap`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table sephora.dondathang: ~11 rows (approximately)
/*!40000 ALTER TABLE `dondathang` DISABLE KEYS */;
INSERT INTO `dondathang` (`dh_ma`, `dh_ngaylap`, `dh_ngaygiao`, `dh_noigiao`, `dh_trangthaithanhtoan`, `httt_ma`, `kh_tendangnhap`) VALUES
	(1, '2013-02-21 16:45:44', '2013-02-01 00:00:00', 'Can Tho', 0, 1, 'vdduy'),
	(2, '2013-02-21 16:46:33', '2013-02-07 00:00:00', 'Ã¡dsadsad', 0, 1, 'vdduy'),
	(3, '2013-02-21 16:47:22', '2013-02-01 00:00:00', 'sdfsdf', 0, 1, 'vdduy'),
	(4, '2013-02-21 16:48:10', '2013-02-08 00:00:00', 'Can Tho', 0, 1, 'vdduy'),
	(7, '2019-09-30 08:09:30', NULL, NULL, 0, 1, 'khue'),
	(8, '2019-09-30 08:09:38', NULL, NULL, 0, 3, 'khue'),
	(9, '2019-09-30 08:09:00', NULL, NULL, 0, 3, 'khue'),
	(10, '2019-09-30 08:09:20', NULL, NULL, 0, 3, 'khue'),
	(11, '2019-09-30 08:09:38', NULL, NULL, 0, 1, 'khue'),
	(12, '2019-09-30 08:09:03', NULL, NULL, 0, 3, 'khue'),
	(13, '2019-09-30 13:09:40', NULL, NULL, 0, 3, 'tt');
/*!40000 ALTER TABLE `dondathang` ENABLE KEYS */;

-- Dumping structure for table sephora.hinhsanpham
CREATE TABLE IF NOT EXISTS `hinhsanpham` (
  `hsp_ma` int(11) NOT NULL AUTO_INCREMENT,
  `hsp_tentaptin` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sp_ma` int(11) NOT NULL,
  PRIMARY KEY (`hsp_ma`),
  KEY `fk_hinhsanpham_sanpham1_idx` (`sp_ma`),
  CONSTRAINT `fk_hinhsanpham_sanpham1` FOREIGN KEY (`sp_ma`) REFERENCES `sanpham` (`sp_ma`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=66 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table sephora.hinhsanpham: ~14 rows (approximately)
/*!40000 ALTER TABLE `hinhsanpham` DISABLE KEYS */;
INSERT INTO `hinhsanpham` (`hsp_ma`, `hsp_tentaptin`, `sp_ma`) VALUES
	(50, 'innisfree-jeju-cherry-blossom-jelly-cream-15-644x580.jpg', 1),
	(51, 'Gel-Dưỡng-Ẩm-Innisfree-Jeju-Cherry-Blossom-Jelly-Cream-50ml.3.jpg', 1),
	(52, 'innistone_fb9ff1a9c5144a3b987241a37235d245_1024x1024 (1).jpg', 1),
	(53, '1268675.jpeg', 2),
	(54, 'img-2019_07_11_12_22_45-5333.jpeg', 2),
	(55, 'mat-na-ngu-Laneige-Water-Sleeping-Mask-mini-2018-11-07-2.jpg', 3),
	(56, 'PSLRC_VitaminC_50ml.jpg', 4),
	(58, 'GR_AVOCADO_RETINOL_FACE_PPAGE_5_800x.jpg', 5),
	(59, 'amorepacific-color-control-cushion-compact.jpg', 7),
	(61, '81rS-KsC6SL._SY355_.jpg', 8),
	(62, 'mat-na-skii-facial-treatment-mask-6-mieng-sieu-thi-nhat-ban-japana-23.jpeg', 9),
	(63, 'cbd-body-lotion-hemp-patchouli-75mg-ls.png', 11),
	(64, 'fresh_rose_1.jpg', 10),
	(65, '650x650.jpg', 6);
/*!40000 ALTER TABLE `hinhsanpham` ENABLE KEYS */;

-- Dumping structure for table sephora.hinhthucthanhtoan
CREATE TABLE IF NOT EXISTS `hinhthucthanhtoan` (
  `httt_ma` int(11) NOT NULL AUTO_INCREMENT,
  `httt_ten` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`httt_ma`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table sephora.hinhthucthanhtoan: ~3 rows (approximately)
/*!40000 ALTER TABLE `hinhthucthanhtoan` DISABLE KEYS */;
INSERT INTO `hinhthucthanhtoan` (`httt_ma`, `httt_ten`) VALUES
	(1, 'Tiền mặt'),
	(2, 'Chuyển Khoản'),
	(3, 'Paypal');
/*!40000 ALTER TABLE `hinhthucthanhtoan` ENABLE KEYS */;

-- Dumping structure for table sephora.khachhang
CREATE TABLE IF NOT EXISTS `khachhang` (
  `kh_tendangnhap` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `kh_matkhau` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `kh_ten` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `kh_gioitinh` int(11) NOT NULL,
  `kh_diachi` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `kh_dienthoai` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `kh_email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `kh_ngaysinh` int(11) DEFAULT NULL,
  `kh_thangsinh` int(11) DEFAULT NULL,
  `kh_namsinh` int(11) DEFAULT NULL,
  `kh_cmnd` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `kh_makichhoat` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `kh_trangthai` int(11) NOT NULL,
  `kh_quantri` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`kh_tendangnhap`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table sephora.khachhang: ~15 rows (approximately)
/*!40000 ALTER TABLE `khachhang` DISABLE KEYS */;
INSERT INTO `khachhang` (`kh_tendangnhap`, `kh_matkhau`, `kh_ten`, `kh_gioitinh`, `kh_diachi`, `kh_dienthoai`, `kh_email`, `kh_ngaysinh`, `kh_thangsinh`, `kh_namsinh`, `kh_cmnd`, `kh_makichhoat`, `kh_trangthai`, `kh_quantri`) VALUES
	('a', '123456', 'anh', 0, 'a', '1', 'user_queanh', 1, 1, 1998, '', '1', 1, 1),
	('aaa', '637d1f5c6e6d1be22ed907eb3d223d858ca396d8', 'anh', 0, 'a', 'q', 'user_queanh', 1, 5, 1111, '1', '1', 0, 0),
	('admin', '123', 'Quản trị', 1, 'Số 01 - Lý Tự Trọng - Cần Thơ', '0912.123.567', 'admin@sephora.vn', 2, 2, 1985, NULL, NULL, 1, 1),
	('anhne', '356a192b7913b04c54574d18c28d46e6395428ab', 'queanh', 0, 'a', 'q', 'user_queanh', 5, 1, 1998, '1', '4', 0, 0),
	('b', '1', 'e', 0, 's', '2', 'user_', 1, 1, 1, '1', '4', 0, 0),
	('dinhduyvo', 'fcea920f7412b5da7be0cf42b8c93759', 'Vo Dinh Duy', 0, 'Can Tho', '07103.273.34433', 'vdduy@ctu.edu.vn', 2, 2, 1985, '', '', 1, 0),
	('ha', 'f9fc27b9374ad1e3bf34fdbcec3a4fd632427fed', 'ha', 0, '', '', 'queanhst98@gmail.com', 0, 0, 0, '', '75ed1b162bfa83e02b56b2100f91d9da0760b4bc', 0, 0),
	('khue', 'bb0068654c78a559f53cb26e1b7688b6b51f268c', 'khue', 0, 'e', 's', '1', NULL, NULL, 0, '2', NULL, 1, 1),
	('le', '593b743b207e10ff55ec63e71a46c07909d0880a', 'queanh', 0, '', '', 'queanhst98@gmail.com', 5, 6, 7, '', 'fa79b0df442502b8d3ef0c6f9d11a614c265705f', 0, 0),
	('nhdung', 'e10adc3949ba59abbe56e057f20f883e', 'Nguyá»…n HÃ¹ng DÅ©ng', 0, 'Cáº§n ThÆ¡', '0903100550', 'hungdung@ctu.edu.vn', 18, 11, 1986, '', 'dfdae6bda1be436b13e8bc4240879355', 0, 1),
	('nta', '|J	Ê7b¯aå• ”=Âd”ø”', 'Nguyen Thi A', 1, 'Cáº§n ThÆ¡', '0903100550', 'nta@gmail.com', 17, 5, 1987, '', '', 0, 0),
	('q', '22ea1c649c82946aa6e479e1ffd321e4a318b1b0', 'q', 0, 'q', '1', '1', 1, 1, 1, '2', '1', 0, 1),
	('t', '8efd86fb78a56a5145ed7739dcb00c78581c5375', 't', 0, 't', '5', '5', 5, 5, 5, '5', '5', 1, 1),
	('tt', '8c1017982b2032cc059203e3d83dd0ee2e7a86b3', 'tt', 0, '', '', 'queanhst98@gmail.com', 1, 5, 1998, '', '671ca4ff4aa7bd0b2040a4a1837d41f8c8f16ea3', 1, 0),
	('usermoi', 'fcea920f7412b5da7be0cf42b8c93759', 'Nguoi dung moi', 0, 'Can Tho', '07103-273.344', 'vdduy@ctu.edu.vn', 2, 2, 1985, '', '44766fb4dd4e4977e75a9321cbc6413e', 0, 0),
	('vdduy', 'fcea920f7412b5da7be0cf42b8c93759', 'Vo Dinh Duy', 0, 'Can Tho', '0975107705', 'vdduy@ctu.edu.vn', 2, 2, 1985, '', 'â€zcnl82qbuj', 1, 0);
/*!40000 ALTER TABLE `khachhang` ENABLE KEYS */;

-- Dumping structure for table sephora.loaisanpham
CREATE TABLE IF NOT EXISTS `loaisanpham` (
  `lsp_ma` int(11) NOT NULL AUTO_INCREMENT,
  `lsp_ten` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `lsp_mota` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`lsp_ma`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table sephora.loaisanpham: ~6 rows (approximately)
/*!40000 ALTER TABLE `loaisanpham` DISABLE KEYS */;
INSERT INTO `loaisanpham` (`lsp_ma`, `lsp_ten`, `lsp_mota`) VALUES
	(1, 'Mask', ''),
	(2, 'Cushion', ' '),
	(3, 'Skin Cream', NULL),
	(4, 'Lipstick', NULL),
	(8, 'Serum', NULL),
	(11, 'Lotion', '');
/*!40000 ALTER TABLE `loaisanpham` ENABLE KEYS */;

-- Dumping structure for table sephora.nhasanxuat
CREATE TABLE IF NOT EXISTS `nhasanxuat` (
  `nsx_ma` int(11) NOT NULL AUTO_INCREMENT,
  `nsx_ten` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`nsx_ma`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table sephora.nhasanxuat: ~4 rows (approximately)
/*!40000 ALTER TABLE `nhasanxuat` DISABLE KEYS */;
INSERT INTO `nhasanxuat` (`nsx_ma`, `nsx_ten`) VALUES
	(1, 'Innisfree'),
	(2, 'Sephora'),
	(3, 'Kylie'),
	(4, 'Charlie');
/*!40000 ALTER TABLE `nhasanxuat` ENABLE KEYS */;

-- Dumping structure for table sephora.sanpham
CREATE TABLE IF NOT EXISTS `sanpham` (
  `sp_ma` int(11) NOT NULL AUTO_INCREMENT,
  `sp_ten` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `sp_gia` decimal(12,2) DEFAULT NULL,
  `sp_giacu` decimal(12,2) DEFAULT NULL,
  `sp_mota_ngan` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `sp_mota_chitiet` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `sp_ngaycapnhat` datetime NOT NULL,
  `sp_soluong` int(11) DEFAULT NULL,
  `lsp_ma` int(11) NOT NULL,
  `nsx_ma` int(11) NOT NULL,
  `km_ma` int(11) DEFAULT NULL,
  PRIMARY KEY (`sp_ma`),
  KEY `sanpham_loaisanpham_idx` (`lsp_ma`),
  KEY `sanpham_nhasanxuat_idx` (`nsx_ma`),
  KEY `sanpham_khuyenmai_idx` (`km_ma`),
  CONSTRAINT `sanpham_khuyenmai` FOREIGN KEY (`km_ma`) REFERENCES `khuyenmai` (`km_ma`) ON DELETE SET NULL ON UPDATE NO ACTION,
  CONSTRAINT `sanpham_loaisanpham` FOREIGN KEY (`lsp_ma`) REFERENCES `loaisanpham` (`lsp_ma`),
  CONSTRAINT `sanpham_nhasanxuat` FOREIGN KEY (`nsx_ma`) REFERENCES `nhasanxuat` (`nsx_ma`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table sephora.sanpham: ~12 rows (approximately)
/*!40000 ALTER TABLE `sanpham` DISABLE KEYS */;
INSERT INTO `sanpham` (`sp_ma`, `sp_ten`, `sp_gia`, `sp_giacu`, `sp_mota_ngan`, `sp_mota_chitiet`, `sp_ngaycapnhat`, `sp_soluong`, `lsp_ma`, `nsx_ma`, `km_ma`) VALUES
	(1, 'Jeju Blossom Cream', 420000.00, 450000.00, 'JeJu Tone-Up', '', '2012-12-22 11:20:30', 17, 3, 1, NULL),
	(2, 'Hot Lips Lipstick', 210000.00, 230000.00, 'Twinkle', '', '2013-01-12 10:04:45', 101, 4, 1, NULL),
	(3, 'Water Sleeping Mask', 230000.00, 210000.00, 'Moisturizing', '', '2013-01-16 17:13:45', 7, 1, 1, NULL),
	(4, 'CC Me Vitamin C Serum', 420000.00, 322000.00, 'Tone-Up', '', '2013-01-16 17:14:55', 10, 8, 1, NULL),
	(5, 'Avocado Sleeping Mask', 190000.00, 210000.00, 'Tone-Up', '', '2013-01-17 14:18:03', 6, 1, 2, NULL),
	(6, 'Double Wear Nude Cushion', 210000.00, 420000.00, 'Twinkle', '', '2013-01-17 14:19:10', 25, 2, 3, NULL),
	(7, 'Color Control Cushion Compact', 230000.00, 7950000.00, 'Concealing, tone-up', '', '2013-01-28 10:42:08', 13, 2, 2, NULL),
	(8, 'Resort Sun Cushion', 420000.00, 210000.00, 'Ã¡dsad', '', '2013-01-28 10:37:52', 12, 2, 1, NULL),
	(9, 'SKII Treatment Mask', 210000.00, 230000.00, 'Moisturizing', NULL, '0000-00-00 00:00:00', 100, 1, 3, NULL),
	(10, 'Sephora Collection Face Mask', 230000.00, 322000.00, 'Moisturizing, Tone-Up', NULL, '0000-00-00 00:00:00', 50, 1, 2, NULL),
	(11, 'Formula Body Lotion CBD', 322000.00, 420000.00, 'Moisturizing', NULL, '0000-00-00 00:00:00', 30, 11, 4, NULL),
	(12, 'MORO Smoothing Lotion', 420000.00, 322000.00, 'Moisturizing', NULL, '0000-00-00 00:00:00', 25, 11, 4, NULL);
/*!40000 ALTER TABLE `sanpham` ENABLE KEYS */;

-- Dumping structure for table sephora.sanpham_dondathang
CREATE TABLE IF NOT EXISTS `sanpham_dondathang` (
  `sp_ma` int(11) NOT NULL,
  `dh_ma` int(11) NOT NULL,
  `sp_dh_soluong` int(11) NOT NULL,
  `sp_dh_dongia` decimal(12,2) NOT NULL,
  PRIMARY KEY (`sp_ma`,`dh_ma`),
  KEY `sanpham_donhang_sanpham_idx` (`sp_ma`),
  KEY `sanpham_donhang_dondathang_idx` (`dh_ma`),
  CONSTRAINT `sanpham_donhang_dondathang` FOREIGN KEY (`dh_ma`) REFERENCES `dondathang` (`dh_ma`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `sanpham_donhang_sanpham` FOREIGN KEY (`sp_ma`) REFERENCES `sanpham` (`sp_ma`) ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table sephora.sanpham_dondathang: ~4 rows (approximately)
/*!40000 ALTER TABLE `sanpham_dondathang` DISABLE KEYS */;
INSERT INTO `sanpham_dondathang` (`sp_ma`, `dh_ma`, `sp_dh_soluong`, `sp_dh_dongia`) VALUES
	(1, 7, 4, 12000000.00),
	(2, 12, 1, 11800000.00),
	(5, 13, 1, 190000.00),
	(7, 4, 1, 7500000.00);
/*!40000 ALTER TABLE `sanpham_dondathang` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;

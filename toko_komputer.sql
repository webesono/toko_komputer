-- --------------------------------------------------------
-- Host:                         localhost
-- Server version:               5.7.33 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping structure for table toko_komputer.barang
CREATE TABLE IF NOT EXISTS `barang` (
  `kode_barang` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `harga_jual` bigint(20) NOT NULL,
  `harga_beli` bigint(20) NOT NULL,
  `stok` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`kode_barang`),
  KEY `FK_barang_kategori` (`id_kategori`),
  CONSTRAINT `FK_barang_kategori` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table toko_komputer.barang: ~2 rows (approximately)
REPLACE INTO `barang` (`kode_barang`, `id_kategori`, `nama_barang`, `harga_jual`, `harga_beli`, `stok`, `created_at`, `updated_at`) VALUES
	(1, 2, 'Monitor', 2000000, 1800000, 12, '2023-07-31 05:11:46', '2023-07-31 05:15:43'),
	(2, 1, 'SSD', 1000000, 900000, 9, '2023-07-31 05:13:10', '2023-07-31 05:15:42');

-- Dumping structure for table toko_komputer.kategori
CREATE TABLE IF NOT EXISTS `kategori` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kategori` varchar(255) NOT NULL,
  `background` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Dumping data for table toko_komputer.kategori: ~4 rows (approximately)
REPLACE INTO `kategori` (`id`, `nama_kategori`, `background`) VALUES
	(1, 'Laptop', 'rgb(255, 99, 132)'),
	(2, 'PC', 'rgb(54, 162, 235)'),
	(3, 'Macbook', 'rgb(255, 205, 86)'),
	(4, 'Lainnya', 'rgb(255, 105, 86)');

-- Dumping structure for table toko_komputer.menu
CREATE TABLE IF NOT EXISTS `menu` (
  `id_submenu` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `icon` varchar(100) DEFAULT NULL,
  `url` varchar(100) NOT NULL,
  `is_active` enum('0','1') NOT NULL,
  PRIMARY KEY (`id_submenu`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- Dumping data for table toko_komputer.menu: ~2 rows (approximately)
REPLACE INTO `menu` (`id_submenu`, `title`, `icon`, `url`, `is_active`) VALUES
	(1, 'Dashboard', 'fa-shop', 'dashboard', '1'),
	(2, 'Penjualan', 'fa-dollar', 'penjualan', '1');

-- Dumping structure for table toko_komputer.penjualan
CREATE TABLE IF NOT EXISTS `penjualan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_konsumen` varchar(50) NOT NULL DEFAULT '',
  `alamat` varchar(255) NOT NULL DEFAULT '',
  `tanggal_penjualan` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

-- Dumping data for table toko_komputer.penjualan: ~13 rows (approximately)
REPLACE INTO `penjualan` (`id`, `nama_konsumen`, `alamat`, `tanggal_penjualan`, `updated_at`) VALUES
	(1, 'Arif', 'Malang', '2023-07-31 05:13:36', NULL),
	(2, 'Yudha', 'Jawa Timur', '2023-07-31 05:13:48', NULL),
	(3, 'Wibisono', 'Indonesia', '2023-07-02 18:13:58', '2023-07-31 07:42:06'),
	(4, 'Arif2', 'Malang', '2023-07-31 05:13:36', '2023-07-31 09:51:24'),
	(5, 'Yudha2', 'Jawa Timur', '2023-07-31 05:13:48', '2023-07-31 09:51:31'),
	(6, 'Arif3', 'Malang', '2023-07-31 05:13:36', '2023-07-31 09:51:26'),
	(7, 'Wibisono2', 'Indonesia', '2023-07-02 18:13:58', '2023-07-31 09:51:41'),
	(8, 'Wibisono3', 'Indonesia', '2023-07-02 18:13:58', '2023-07-31 09:51:43'),
	(9, 'Yudha3', 'Jawa Timur', '2023-07-31 05:13:48', '2023-07-31 09:51:34'),
	(10, 'Wibisono4', 'Indonesia', '2023-07-02 18:13:58', '2023-07-31 09:51:46'),
	(11, 'Arif4', 'Malang', '2023-07-31 05:13:36', '2023-07-31 09:51:29'),
	(12, 'Yudha4', 'Jawa Timur', '2023-07-31 05:13:48', '2023-07-31 09:51:36'),
	(13, 'Wibisono5', 'Indonesia', '2023-07-02 18:13:58', '2023-07-31 09:51:48');

-- Dumping structure for table toko_komputer.penjualan_detail
CREATE TABLE IF NOT EXISTS `penjualan_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode_barang` int(11) NOT NULL,
  `id_penjualan` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `FK_penjualan_detail_barang` (`kode_barang`),
  KEY `FK_penjualan_detail_penjualan` (`id_penjualan`),
  CONSTRAINT `FK_penjualan_detail_barang` FOREIGN KEY (`kode_barang`) REFERENCES `barang` (`kode_barang`) ON UPDATE CASCADE,
  CONSTRAINT `FK_penjualan_detail_penjualan` FOREIGN KEY (`id_penjualan`) REFERENCES `penjualan` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

-- Dumping data for table toko_komputer.penjualan_detail: ~17 rows (approximately)
REPLACE INTO `penjualan_detail` (`id`, `kode_barang`, `id_penjualan`, `jumlah`, `created_at`, `updated_at`) VALUES
	(1, 1, 1, 1, '2023-07-31 05:14:51', NULL),
	(2, 2, 3, 2, '2023-07-31 05:16:49', '2023-07-31 06:47:28'),
	(3, 1, 2, 1, '2023-07-31 05:17:20', '2023-07-31 09:02:21'),
	(4, 1, 4, 1, '2023-07-31 05:17:20', '2023-07-31 09:53:37'),
	(5, 1, 5, 1, '2023-07-31 05:17:20', '2023-07-31 09:53:43'),
	(6, 1, 6, 1, '2023-07-31 05:17:20', '2023-07-31 09:53:47'),
	(7, 1, 7, 1, '2023-07-31 05:17:20', '2023-07-31 09:53:50'),
	(8, 1, 8, 1, '2023-07-31 05:17:20', '2023-07-31 09:53:55'),
	(9, 1, 9, 1, '2023-07-31 05:17:20', '2023-07-31 09:54:00'),
	(10, 1, 10, 1, '2023-07-31 05:17:20', '2023-07-31 09:54:02'),
	(11, 1, 11, 1, '2023-07-31 05:17:20', '2023-07-31 09:54:05'),
	(12, 1, 12, 1, '2023-07-31 05:17:20', '2023-07-31 09:54:10'),
	(13, 1, 13, 1, '2023-07-31 05:17:20', '2023-07-31 09:54:13'),
	(14, 1, 1, 1, '2023-07-31 05:17:20', '2023-07-31 09:54:16'),
	(15, 1, 2, 1, '2023-07-31 05:17:20', '2023-07-31 09:02:21'),
	(16, 1, 3, 1, '2023-07-31 05:17:20', '2023-07-31 09:54:24'),
	(17, 1, 4, 1, '2023-07-31 05:17:20', '2023-07-31 09:54:28');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;

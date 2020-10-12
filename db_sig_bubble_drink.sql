-- --------------------------------------------------------
-- Host:                         localhost
-- Server version:               5.7.24 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for db_sig_bubble_drink
CREATE DATABASE IF NOT EXISTS `db_sig_bubble_drink` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `db_sig_bubble_drink`;

-- Dumping structure for table db_sig_bubble_drink.tb_bubble_drink
CREATE TABLE IF NOT EXISTS `tb_bubble_drink` (
  `id_bubble_drink` int(11) NOT NULL DEFAULT '0',
  `id_lokasi` int(11) NOT NULL DEFAULT '0',
  `nama` varchar(50) NOT NULL DEFAULT '',
  `harga` varchar(50) NOT NULL DEFAULT '',
  `diskon` varchar(50) NOT NULL DEFAULT '',
  `nama_file` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_bubble_drink`),
  UNIQUE KEY `id_lokasi` (`id_lokasi`),
  CONSTRAINT `FK__tb_lokasi` FOREIGN KEY (`id_lokasi`) REFERENCES `tb_lokasi` (`id_lokasi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Data exporting was unselected.

-- Dumping structure for table db_sig_bubble_drink.tb_komentar_dan_rating
CREATE TABLE IF NOT EXISTS `tb_komentar_dan_rating` (
  `id_komentar` int(11) NOT NULL,
  `id_lokasi` int(11) DEFAULT NULL,
  `id_bubble_drink` int(11) DEFAULT NULL,
  `rating` int(11) DEFAULT NULL,
  `komentar_user` varchar(50) DEFAULT NULL,
  `komentar_admin` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_komentar`),
  UNIQUE KEY `id_lokasi` (`id_lokasi`),
  UNIQUE KEY `id_bubble_drink` (`id_bubble_drink`),
  CONSTRAINT `FK_tb_komentar_dan_rating_tb_bubble_drink` FOREIGN KEY (`id_bubble_drink`) REFERENCES `tb_bubble_drink` (`id_bubble_drink`),
  CONSTRAINT `FK_tb_komentar_dan_rating_tb_lokasi` FOREIGN KEY (`id_lokasi`) REFERENCES `tb_lokasi` (`id_lokasi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Data exporting was unselected.

-- Dumping structure for table db_sig_bubble_drink.tb_lokasi
CREATE TABLE IF NOT EXISTS `tb_lokasi` (
  `id_lokasi` int(11) NOT NULL,
  `nama_lokasi` varchar(50) NOT NULL DEFAULT '',
  `alamat` varchar(50) NOT NULL DEFAULT '',
  `nomor_handphone` varchar(50) NOT NULL DEFAULT '',
  `longtitude` varchar(50) NOT NULL DEFAULT '',
  `latitude` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`id_lokasi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Data exporting was unselected.

-- Dumping structure for table db_sig_bubble_drink.tb_user
CREATE TABLE IF NOT EXISTS `tb_user` (
  `id_user` varchar(50) NOT NULL DEFAULT '',
  `email` varchar(50) DEFAULT NULL,
  `nama_unik` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `blokir` varchar(50) DEFAULT NULL,
  `jenis_kelamin` varchar(50) DEFAULT NULL,
  `hobby` varchar(50) DEFAULT NULL,
  `tanggal_lahir` int(11) DEFAULT NULL,
  `bulan_lahir` int(11) DEFAULT NULL,
  `tahun_lahir` int(11) DEFAULT NULL,
  `nama_depan` varchar(50) DEFAULT NULL,
  `nama_tengah` varchar(50) DEFAULT NULL,
  `nama_belakang` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Data exporting was unselected.

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;

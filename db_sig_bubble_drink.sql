/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

CREATE DATABASE IF NOT EXISTS `db_sig_bubble_drink` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `db_sig_bubble_drink`;

CREATE TABLE IF NOT EXISTS `tb_bubble_drink` (
  `id_bubble_drink` int(11) NOT NULL DEFAULT '0',
  `id_toko` int(11) NOT NULL DEFAULT '0',
  `nama` varchar(50) NOT NULL DEFAULT '',
  `harga` varchar(50) NOT NULL DEFAULT '',
  `diskon` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`id_bubble_drink`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `tb_komentar_dan_rating` (
  `id_komentar` int(11) NOT NULL AUTO_INCREMENT,
  `id_toko` int(11) DEFAULT NULL,
  `id_bubble_drink` int(11) DEFAULT NULL,
  `rating` int(11) DEFAULT NULL,
  `komentar_user` varchar(50) DEFAULT NULL,
  `komentar_admin` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_komentar`),
  KEY `FK_tb_komentar_dan_rating_tb_bubble_drink` (`id_bubble_drink`),
  CONSTRAINT `FK_tb_komentar_dan_rating_tb_bubble_drink` FOREIGN KEY (`id_bubble_drink`) REFERENCES `tb_bubble_drink` (`id_bubble_drink`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `tb_lokasi` (
  `id_lokasi` int(11) NOT NULL,
  `nama_lokasi` varchar(50) NOT NULL DEFAULT '',
  `alamat` varchar(500) NOT NULL DEFAULT '',
  `nomor_handphone` varchar(50) NOT NULL DEFAULT '',
  `longtitude` varchar(50) NOT NULL DEFAULT '',
  `latitude` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`id_lokasi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `tb_toko` (
  `id_toko` int(11) NOT NULL AUTO_INCREMENT,
  `id_lokasi` int(11) NOT NULL,
  `nama_toko` varchar(50) DEFAULT NULL,
  `nomor_handphone` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_toko`),
  KEY `FK_tb_toko_tb_lokasi` (`id_lokasi`),
  CONSTRAINT `FK_tb_toko_tb_lokasi` FOREIGN KEY (`id_lokasi`) REFERENCES `tb_lokasi` (`id_lokasi`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `tb_user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) DEFAULT NULL,
  `user_name` varchar(50) DEFAULT NULL,
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
  `status` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;

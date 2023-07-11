-- --------------------------------------------------------
-- Host:                         localhost
-- Server version:               5.7.31 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for db_sia
CREATE DATABASE IF NOT EXISTS `db_sia` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `db_sia`;

-- Dumping structure for table db_sia.tb_akun
CREATE TABLE IF NOT EXISTS `tb_akun` (
  `no_reff` varchar(7) NOT NULL,
  `id` varchar(50) NOT NULL,
  `nama_reff` varchar(100) NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  KEY `no_reff` (`no_reff`),
  KEY `nama_reff` (`nama_reff`),
  KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table db_sia.tb_akun: ~1 rows (approximately)
/*!40000 ALTER TABLE `tb_akun` DISABLE KEYS */;
INSERT INTO `tb_akun` (`no_reff`, `id`, `nama_reff`, `keterangan`) VALUES
	('11130', '1', 'Bank', ' -');
/*!40000 ALTER TABLE `tb_akun` ENABLE KEYS */;

-- Dumping structure for table db_sia.tb_buku
CREATE TABLE IF NOT EXISTS `tb_buku` (
  `tgl_buku` varchar(50) NOT NULL DEFAULT '',
  `nama_akun` varchar(100) NOT NULL DEFAULT '0',
  `no_reff_akun` varchar(7) NOT NULL,
  `no_bukti` varchar(20) NOT NULL,
  `id` varchar(50) NOT NULL,
  `debit_buku` int(11) DEFAULT '0',
  `kredit_buku` int(11) DEFAULT '0',
  `saldo_kredit` int(11) DEFAULT '0',
  `saldo_debit` int(11) DEFAULT '0',
  `tahun` varchar(50) NOT NULL,
  `bulan` varchar(10) NOT NULL,
  KEY `saldo_kredit` (`saldo_kredit`),
  KEY `saldo_debit` (`saldo_debit`),
  KEY `FK_tb_buku_tb_jurnal` (`no_reff_akun`),
  KEY `FK_tb_buku_tb_jurnal_2` (`nama_akun`),
  KEY `FK_tb_buku_tb_jurnal_3` (`debit_buku`),
  KEY `FK_tb_buku_tb_jurnal_4` (`kredit_buku`),
  KEY `no_bukti` (`no_bukti`),
  KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table db_sia.tb_buku: ~0 rows (approximately)
/*!40000 ALTER TABLE `tb_buku` DISABLE KEYS */;
/*!40000 ALTER TABLE `tb_buku` ENABLE KEYS */;

-- Dumping structure for table db_sia.tb_jurnal
CREATE TABLE IF NOT EXISTS `tb_jurnal` (
  `tgl` varchar(50) NOT NULL DEFAULT '0',
  `nama_reff` varchar(100) NOT NULL,
  `no_reff` varchar(7) NOT NULL,
  `id` varchar(50) NOT NULL,
  `jenis` varchar(10) NOT NULL,
  `debit_jurnal` int(11) DEFAULT '0',
  `kredit_jurnal` int(11) DEFAULT '0',
  `keterangan` varchar(50) NOT NULL,
  `no_bukti` varchar(20) DEFAULT 'Tidak ada',
  `bulan` varchar(15) NOT NULL,
  `tahun` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table db_sia.tb_jurnal: ~0 rows (approximately)
/*!40000 ALTER TABLE `tb_jurnal` DISABLE KEYS */;
/*!40000 ALTER TABLE `tb_jurnal` ENABLE KEYS */;

-- Dumping structure for table db_sia.tb_neraca
CREATE TABLE IF NOT EXISTS `tb_neraca` (
  `no_reff` varchar(7) NOT NULL,
  `nama_reff` varchar(100) NOT NULL,
  `id` varchar(50) NOT NULL,
  `saldo_debit` int(11) DEFAULT '0',
  `saldo_kredit` int(11) DEFAULT '0',
  `bulan` varchar(15) NOT NULL,
  `tahun` varchar(50) NOT NULL,
  KEY `no_reff_akun` (`no_reff`),
  KEY `nama_akun` (`nama_reff`),
  KEY `saldo_debit` (`saldo_debit`),
  KEY `saldo_kredit` (`saldo_kredit`),
  KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table db_sia.tb_neraca: ~0 rows (approximately)
/*!40000 ALTER TABLE `tb_neraca` DISABLE KEYS */;
/*!40000 ALTER TABLE `tb_neraca` ENABLE KEYS */;

-- Dumping structure for table db_sia.user
CREATE TABLE IF NOT EXISTS `user` (
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table db_sia.user: ~2 rows (approximately)
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`username`, `password`, `id`) VALUES
	('admin', 'admin123', ''),
	('pegawai', 'pegawai123', '');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;

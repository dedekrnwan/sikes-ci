-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.1.37-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win32
-- HeidiSQL Version:             10.1.0.5464
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for sikes
CREATE DATABASE IF NOT EXISTS `sikes` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `sikes`;

-- Dumping structure for table sikes.config
CREATE TABLE IF NOT EXISTS `config` (
  `config_id` int(11) NOT NULL AUTO_INCREMENT,
  `balance_sms` int(11) DEFAULT NULL,
  PRIMARY KEY (`config_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table sikes.config: ~0 rows (approximately)
/*!40000 ALTER TABLE `config` DISABLE KEYS */;
INSERT INTO `config` (`config_id`, `balance_sms`) VALUES
	(1, 89247);
/*!40000 ALTER TABLE `config` ENABLE KEYS */;

-- Dumping structure for table sikes.message_sent
CREATE TABLE IF NOT EXISTS `message_sent` (
  `message_sent_id` int(11) NOT NULL AUTO_INCREMENT,
  `t_pembayaran_detail_id` int(11) DEFAULT NULL,
  `siswa_id` int(11) DEFAULT NULL,
  `no_ortu` varchar(20) DEFAULT NULL,
  `message_type` varchar(50) DEFAULT NULL,
  `message_text` varchar(255) DEFAULT NULL,
  `date_added` datetime DEFAULT NULL,
  `date_modified` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `active` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`message_sent_id`),
  KEY `t_pembayaran_id` (`t_pembayaran_detail_id`),
  KEY `siswa_id` (`siswa_id`),
  KEY `created_by` (`created_by`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

-- Dumping data for table sikes.message_sent: ~3 rows (approximately)
/*!40000 ALTER TABLE `message_sent` DISABLE KEYS */;
INSERT INTO `message_sent` (`message_sent_id`, `t_pembayaran_detail_id`, `siswa_id`, `no_ortu`, `message_type`, `message_text`, `date_added`, `date_modified`, `created_by`, `active`) VALUES
	(20, 35, 11, '6287820988075', 'pembayaran', 'Pembayaran untuk SPP Bulanan bulan ke 7 yang dilakukan oleh siswa bernama Helmi Fauzi(13115) sebesar Rp 8,000,000 telah kami terima', '2019-11-05 01:56:15', '2019-11-05 01:56:15', 1, 1),
	(21, 36, 10, '6287820988075', 'pembayaran', 'Pembayaran untuk SPP Bulanan bulan ke 8 yang dilakukan oleh siswa bernama Hanifah(12115) sebesar Rp 30,000,000 telah kami terima', '2019-11-05 20:39:21', '2019-11-05 20:39:21', 1, 1),
	(22, 37, 12, '6287820988075', 'pembayaran', 'Pembayaran untuk SPP Bulanan bulan ke 11 yang dilakukan oleh siswa bernama Rian Priyanto(12114) sebesar Rp 30,000,000 telah kami terima', '2019-11-05 21:37:21', '2019-11-05 21:37:21', 1, 1);
/*!40000 ALTER TABLE `message_sent` ENABLE KEYS */;

-- Dumping structure for table sikes.role
CREATE TABLE IF NOT EXISTS `role` (
  `role_id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(50) DEFAULT NULL,
  `role` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table sikes.role: ~0 rows (approximately)
/*!40000 ALTER TABLE `role` DISABLE KEYS */;
INSERT INTO `role` (`role_id`, `code`, `role`) VALUES
	(1, 'admin', 'Admin');
/*!40000 ALTER TABLE `role` ENABLE KEYS */;

-- Dumping structure for table sikes.siswa
CREATE TABLE IF NOT EXISTS `siswa` (
  `siswa_id` int(11) NOT NULL AUTO_INCREMENT,
  `nis` varchar(50) DEFAULT NULL,
  `ttl` date DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `jenis_kelamin` varchar(1) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `nama_ortu` varchar(50) DEFAULT NULL,
  `no_ortu` varchar(20) DEFAULT NULL,
  `email_ortu` varchar(50) DEFAULT NULL,
  `active` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`siswa_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

-- Dumping data for table sikes.siswa: ~6 rows (approximately)
/*!40000 ALTER TABLE `siswa` DISABLE KEYS */;
INSERT INTO `siswa` (`siswa_id`, `nis`, `ttl`, `nama`, `jenis_kelamin`, `alamat`, `nama_ortu`, `no_ortu`, `email_ortu`, `active`) VALUES
	(9, '13114', '1998-08-27', 'M Cholis Malik', 'L', 'Jl. Raya Bekasi rt 02/013', 'Sulistiyawati', '6287820988075', 'sulis@gmail.com', 1),
	(10, '12115', '1998-08-27', 'Hanifah', 'P', 'Jl. Deket DSLan', 'Aisyah', '6287820988075', 'aisyah@gmail.com', 1),
	(11, '13115', '1998-08-27', 'Helmi Fauzi', 'L', 'Jl. Kemayoran', 'Parjo', '6287820988075', 'parjo@gmail.com', 1),
	(12, '12114', '1998-08-27', 'Rian Priyanto', 'L', 'Jl. Cipinang Muara', 'Pardi', '6287820988075', 'pardi@gmail.com', 1),
	(13, '13119', '1998-08-27', 'Wiliam', 'L', 'Jl. Raya Bekasi', 'sadf', '6287820988075', 'sdfsdg', 1),
	(14, '1311412', '2019-11-22', 'Ariq Muammar', 'L', 'sldkaf', 'skdjnf', '129381', 'djknf', 1);
/*!40000 ALTER TABLE `siswa` ENABLE KEYS */;

-- Dumping structure for table sikes.siswa_status
CREATE TABLE IF NOT EXISTS `siswa_status` (
  `siswa_status_id` int(11) NOT NULL AUTO_INCREMENT,
  `siswa_id` int(11) DEFAULT NULL,
  `kelas` int(11) DEFAULT NULL,
  `ta_id` int(11) DEFAULT NULL,
  `active` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`siswa_status_id`),
  KEY `siswa_id` (`siswa_id`),
  KEY `ta_id` (`ta_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

-- Dumping data for table sikes.siswa_status: ~5 rows (approximately)
/*!40000 ALTER TABLE `siswa_status` DISABLE KEYS */;
INSERT INTO `siswa_status` (`siswa_status_id`, `siswa_id`, `kelas`, `ta_id`, `active`) VALUES
	(7, 9, 1, 2, 0),
	(8, 9, 2, 3, 1),
	(10, 10, 1, 3, 1),
	(11, 11, 2, 3, 1),
	(12, 12, 1, 3, 1);
/*!40000 ALTER TABLE `siswa_status` ENABLE KEYS */;

-- Dumping structure for table sikes.sync_tarif
CREATE TABLE IF NOT EXISTS `sync_tarif` (
  `sync_tarif_id` int(11) NOT NULL AUTO_INCREMENT,
  `siswa_id` int(11) NOT NULL DEFAULT '0',
  `tarif_nilai_id` int(11) DEFAULT NULL,
  `tahun` int(11) DEFAULT NULL,
  `bulan_ke` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `date_added` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`sync_tarif_id`),
  KEY `created_by` (`created_by`),
  KEY `siswa_id` (`siswa_id`),
  KEY `tarif_nilai_id` (`tarif_nilai_id`)
) ENGINE=InnoDB AUTO_INCREMENT=290 DEFAULT CHARSET=latin1;

-- Dumping data for table sikes.sync_tarif: ~56 rows (approximately)
/*!40000 ALTER TABLE `sync_tarif` DISABLE KEYS */;
INSERT INTO `sync_tarif` (`sync_tarif_id`, `siswa_id`, `tarif_nilai_id`, `tahun`, `bulan_ke`, `status`, `date_added`, `created_by`) VALUES
	(234, 10, 19, 2019, 8, 1, '2019-11-05 20:39:04', 1),
	(235, 12, 19, 2019, 8, 1, '2019-11-05 20:39:04', 1),
	(236, 10, 19, 2019, 9, 1, '2019-11-05 20:39:04', 1),
	(237, 12, 19, 2019, 9, 1, '2019-11-05 20:39:04', 1),
	(238, 10, 19, 2019, 10, 1, '2019-11-05 20:39:05', 1),
	(239, 12, 19, 2019, 10, 1, '2019-11-05 20:39:05', 1),
	(240, 10, 19, 2019, 11, 1, '2019-11-05 20:39:05', 1),
	(241, 12, 19, 2019, 11, 1, '2019-11-05 20:39:05', 1),
	(242, 10, 19, 2019, 12, 1, '2019-11-05 20:39:05', 1),
	(243, 12, 19, 2019, 12, 1, '2019-11-05 20:39:05', 1),
	(244, 9, 20, 2019, 7, 1, '2019-11-05 20:39:05', 1),
	(245, 11, 20, 2019, 7, 1, '2019-11-05 20:39:06', 1),
	(246, 9, 20, 2019, 8, 1, '2019-11-05 20:39:06', 1),
	(247, 11, 20, 2019, 8, 1, '2019-11-05 20:39:06', 1),
	(248, 9, 20, 2019, 9, 1, '2019-11-05 20:39:06', 1),
	(249, 11, 20, 2019, 9, 1, '2019-11-05 20:39:06', 1),
	(250, 9, 20, 2019, 10, 1, '2019-11-05 20:39:06', 1),
	(251, 11, 20, 2019, 10, 1, '2019-11-05 20:39:06', 1),
	(252, 9, 20, 2019, 11, 1, '2019-11-05 20:39:06', 1),
	(253, 11, 20, 2019, 11, 1, '2019-11-05 20:39:06', 1),
	(254, 10, 21, 2019, 7, 1, '2019-11-05 20:39:06', 1),
	(255, 12, 21, 2019, 7, 1, '2019-11-05 20:39:06', 1),
	(256, 10, 21, 2019, 8, 1, '2019-11-05 20:39:06', 1),
	(257, 12, 21, 2019, 8, 1, '2019-11-05 20:39:06', 1),
	(258, 10, 21, 2019, 9, 1, '2019-11-05 20:39:06', 1),
	(259, 12, 21, 2019, 9, 1, '2019-11-05 20:39:06', 1),
	(260, 10, 21, 2019, 10, 1, '2019-11-05 20:39:07', 1),
	(261, 12, 21, 2019, 10, 1, '2019-11-05 20:39:07', 1),
	(262, 10, 21, 2019, 11, 1, '2019-11-05 20:39:07', 1),
	(263, 12, 21, 2019, 11, 1, '2019-11-05 20:39:07', 1),
	(264, 10, 21, 2019, 12, 1, '2019-11-05 20:39:07', 1),
	(265, 12, 21, 2019, 12, 1, '2019-11-05 20:39:07', 1),
	(266, 9, 22, 2019, 7, 1, '2019-11-05 20:39:07', 1),
	(267, 11, 22, 2019, 7, 1, '2019-11-05 20:39:07', 1),
	(268, 9, 22, 2019, 8, 1, '2019-11-05 20:39:07', 1),
	(269, 11, 22, 2019, 8, 1, '2019-11-05 20:39:07', 1),
	(270, 9, 22, 2019, 9, 1, '2019-11-05 20:39:07', 1),
	(271, 11, 22, 2019, 9, 1, '2019-11-05 20:39:07', 1),
	(272, 9, 22, 2019, 10, 1, '2019-11-05 20:39:07', 1),
	(273, 11, 22, 2019, 10, 1, '2019-11-05 20:39:07', 1),
	(274, 9, 22, 2019, 11, 1, '2019-11-05 20:39:07', 1),
	(275, 11, 22, 2019, 11, 1, '2019-11-05 20:39:07', 1),
	(276, 9, 22, 2019, 12, 1, '2019-11-05 20:39:07', 1),
	(277, 11, 22, 2019, 12, 1, '2019-11-05 20:39:07', 1),
	(278, 9, 23, 2019, 7, 1, '2019-11-05 20:39:07', 1),
	(279, 11, 23, 2019, 7, 1, '2019-11-05 20:39:07', 1),
	(280, 9, 23, 2019, 8, 1, '2019-11-05 20:39:07', 1),
	(281, 11, 23, 2019, 8, 1, '2019-11-05 20:39:08', 1),
	(282, 9, 23, 2019, 9, 1, '2019-11-05 20:39:08', 1),
	(283, 11, 23, 2019, 9, 1, '2019-11-05 20:39:08', 1),
	(284, 9, 23, 2019, 10, 1, '2019-11-05 20:39:08', 1),
	(285, 11, 23, 2019, 10, 1, '2019-11-05 20:39:08', 1),
	(286, 9, 23, 2019, 11, 1, '2019-11-05 20:39:08', 1),
	(287, 11, 23, 2019, 11, 1, '2019-11-05 20:39:08', 1),
	(288, 9, 23, 2019, 12, 1, '2019-11-05 20:39:08', 1),
	(289, 11, 23, 2019, 12, 1, '2019-11-05 20:39:08', 1);
/*!40000 ALTER TABLE `sync_tarif` ENABLE KEYS */;

-- Dumping structure for table sikes.ta
CREATE TABLE IF NOT EXISTS `ta` (
  `ta_id` int(11) NOT NULL AUTO_INCREMENT,
  `ta` varchar(50) DEFAULT NULL,
  `active` int(1) DEFAULT '1',
  PRIMARY KEY (`ta_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Dumping data for table sikes.ta: ~4 rows (approximately)
/*!40000 ALTER TABLE `ta` DISABLE KEYS */;
INSERT INTO `ta` (`ta_id`, `ta`, `active`) VALUES
	(1, '2018', 1),
	(2, '2019', 1),
	(3, '2020', 1),
	(4, '2021', 1);
/*!40000 ALTER TABLE `ta` ENABLE KEYS */;

-- Dumping structure for table sikes.tarif_nilai
CREATE TABLE IF NOT EXISTS `tarif_nilai` (
  `tarif_nilai_id` int(11) NOT NULL AUTO_INCREMENT,
  `ta_id` int(11) DEFAULT NULL,
  `kelas` int(11) DEFAULT NULL,
  `tarif_tipe_id` int(11) DEFAULT NULL,
  `nominal` float DEFAULT NULL,
  `nominal_min` float DEFAULT NULL,
  `date_started` date DEFAULT NULL,
  `date_ended` date DEFAULT NULL,
  `active` int(1) DEFAULT '1',
  PRIMARY KEY (`tarif_nilai_id`),
  KEY `ta_id` (`ta_id`),
  KEY `tarif_tipe_id` (`tarif_tipe_id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

-- Dumping data for table sikes.tarif_nilai: ~6 rows (approximately)
/*!40000 ALTER TABLE `tarif_nilai` DISABLE KEYS */;
INSERT INTO `tarif_nilai` (`tarif_nilai_id`, `ta_id`, `kelas`, `tarif_tipe_id`, `nominal`, `nominal_min`, `date_started`, `date_ended`, `active`) VALUES
	(19, 3, 1, 1, 30000000, NULL, '2019-08-10', '2019-12-10', 1),
	(20, 3, 2, 1, 7000000, NULL, '2019-07-10', '2019-11-10', 1),
	(21, 3, 1, 1, 7000000, NULL, '2019-07-10', '2019-12-10', 1),
	(22, 3, 2, 1, 7000000, NULL, '2019-07-10', '2019-12-10', 1),
	(23, 3, 2, 1, 8000000, NULL, '2019-07-10', '2019-12-10', 1),
	(24, 3, 2, 3, 10000000, 2000000, NULL, NULL, 1);
/*!40000 ALTER TABLE `tarif_nilai` ENABLE KEYS */;

-- Dumping structure for table sikes.tarif_tipe
CREATE TABLE IF NOT EXISTS `tarif_tipe` (
  `tarif_tipe_id` int(11) NOT NULL AUTO_INCREMENT,
  `transaction_type_id` int(11) DEFAULT NULL,
  `tarif_tipe` varchar(50) DEFAULT NULL,
  `akronim` varchar(50) DEFAULT NULL,
  `active` int(1) DEFAULT '1',
  PRIMARY KEY (`tarif_tipe_id`),
  KEY `transaction_type_id` (`transaction_type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table sikes.tarif_tipe: ~3 rows (approximately)
/*!40000 ALTER TABLE `tarif_tipe` DISABLE KEYS */;
INSERT INTO `tarif_tipe` (`tarif_tipe_id`, `transaction_type_id`, `tarif_tipe`, `akronim`, `active`) VALUES
	(1, 1, 'SPP Bulanan', NULL, 1),
	(2, 1, 'OSIS', NULL, 1),
	(3, 2, 'Pendaftaran', NULL, 1);
/*!40000 ALTER TABLE `tarif_tipe` ENABLE KEYS */;

-- Dumping structure for table sikes.transaction_type
CREATE TABLE IF NOT EXISTS `transaction_type` (
  `transaction_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `transaction_type` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`transaction_type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table sikes.transaction_type: ~2 rows (approximately)
/*!40000 ALTER TABLE `transaction_type` DISABLE KEYS */;
INSERT INTO `transaction_type` (`transaction_type_id`, `transaction_type`) VALUES
	(1, 'bulanan'),
	(2, 'cicilan');
/*!40000 ALTER TABLE `transaction_type` ENABLE KEYS */;

-- Dumping structure for table sikes.t_jurnal
CREATE TABLE IF NOT EXISTS `t_jurnal` (
  `t_jurnal_id` int(11) NOT NULL AUTO_INCREMENT,
  `tarif_tipe_id` int(11) DEFAULT '0',
  `tarif_nilai_id` int(11) DEFAULT '0',
  `jurnal_type` varchar(3) DEFAULT NULL,
  `total` float DEFAULT NULL,
  `keterangan` text,
  `active` int(1) DEFAULT '1',
  `date_added` date DEFAULT NULL,
  `date_modified` date DEFAULT NULL,
  PRIMARY KEY (`t_jurnal_id`),
  KEY `tarif_tipe_id` (`tarif_tipe_id`),
  KEY `tarif_nilai_id` (`tarif_nilai_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- Dumping data for table sikes.t_jurnal: ~2 rows (approximately)
/*!40000 ALTER TABLE `t_jurnal` DISABLE KEYS */;
INSERT INTO `t_jurnal` (`t_jurnal_id`, `tarif_tipe_id`, `tarif_nilai_id`, `jurnal_type`, `total`, `keterangan`, `active`, `date_added`, `date_modified`) VALUES
	(7, 1, 19, 'in', 30000000, '(12115) Hanifah membayar SPP Bulanan untuk ta 2020 kelas 1 bulan ke 8', 1, '2019-11-05', NULL),
	(8, 1, 19, 'in', 30000000, '(12114) Rian Priyanto membayar SPP Bulanan untuk ta 2020 kelas 1 bulan ke 11', 1, '2019-11-05', NULL);
/*!40000 ALTER TABLE `t_jurnal` ENABLE KEYS */;

-- Dumping structure for table sikes.t_pembayaran
CREATE TABLE IF NOT EXISTS `t_pembayaran` (
  `t_pembayaran_id` int(11) NOT NULL AUTO_INCREMENT,
  `siswa_id` int(11) DEFAULT NULL,
  `tarif_nilai_id` int(11) DEFAULT NULL,
  `tahun` int(11) DEFAULT NULL,
  `bulan_ke` int(2) DEFAULT NULL,
  `nominal` float DEFAULT NULL,
  `nominal_min` float DEFAULT NULL,
  `nominal_bayar` float DEFAULT NULL,
  `date_added` datetime DEFAULT NULL,
  `date_modified` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`t_pembayaran_id`),
  KEY `siswa_id` (`siswa_id`),
  KEY `tarif_nilai_id` (`tarif_nilai_id`),
  KEY `created_by` (`created_by`)
) ENGINE=InnoDB AUTO_INCREMENT=325 DEFAULT CHARSET=latin1;

-- Dumping data for table sikes.t_pembayaran: ~56 rows (approximately)
/*!40000 ALTER TABLE `t_pembayaran` DISABLE KEYS */;
INSERT INTO `t_pembayaran` (`t_pembayaran_id`, `siswa_id`, `tarif_nilai_id`, `tahun`, `bulan_ke`, `nominal`, `nominal_min`, `nominal_bayar`, `date_added`, `date_modified`, `created_by`) VALUES
	(269, 10, 19, 2019, 8, 30000000, NULL, 30000000, '2019-11-05 20:39:04', '2019-11-05 20:39:04', 1),
	(270, 12, 19, 2019, 8, 30000000, NULL, 0, '2019-11-05 20:39:04', '2019-11-05 20:39:04', 1),
	(271, 10, 19, 2019, 9, 30000000, NULL, 0, '2019-11-05 20:39:04', '2019-11-05 20:39:04', 1),
	(272, 12, 19, 2019, 9, 30000000, NULL, 0, '2019-11-05 20:39:04', '2019-11-05 20:39:04', 1),
	(273, 10, 19, 2019, 10, 30000000, NULL, 0, '2019-11-05 20:39:05', '2019-11-05 20:39:05', 1),
	(274, 12, 19, 2019, 10, 30000000, NULL, 0, '2019-11-05 20:39:05', '2019-11-05 20:39:05', 1),
	(275, 10, 19, 2019, 11, 30000000, NULL, 0, '2019-11-05 20:39:05', '2019-11-05 20:39:05', 1),
	(276, 12, 19, 2019, 11, 30000000, NULL, 30000000, '2019-11-05 20:39:05', '2019-11-05 20:39:05', 1),
	(277, 10, 19, 2019, 12, 30000000, NULL, 0, '2019-11-05 20:39:05', '2019-11-05 20:39:05', 1),
	(278, 12, 19, 2019, 12, 30000000, NULL, 0, '2019-11-05 20:39:05', '2019-11-05 20:39:05', 1),
	(279, 9, 20, 2019, 7, 7000000, NULL, 0, '2019-11-05 20:39:05', '2019-11-05 20:39:05', 1),
	(280, 11, 20, 2019, 7, 7000000, NULL, 0, '2019-11-05 20:39:05', '2019-11-05 20:39:05', 1),
	(281, 9, 20, 2019, 8, 7000000, NULL, 0, '2019-11-05 20:39:06', '2019-11-05 20:39:06', 1),
	(282, 11, 20, 2019, 8, 7000000, NULL, 0, '2019-11-05 20:39:06', '2019-11-05 20:39:06', 1),
	(283, 9, 20, 2019, 9, 7000000, NULL, 0, '2019-11-05 20:39:06', '2019-11-05 20:39:06', 1),
	(284, 11, 20, 2019, 9, 7000000, NULL, 0, '2019-11-05 20:39:06', '2019-11-05 20:39:06', 1),
	(285, 9, 20, 2019, 10, 7000000, NULL, 0, '2019-11-05 20:39:06', '2019-11-05 20:39:06', 1),
	(286, 11, 20, 2019, 10, 7000000, NULL, 0, '2019-11-05 20:39:06', '2019-11-05 20:39:06', 1),
	(287, 9, 20, 2019, 11, 7000000, NULL, 0, '2019-11-05 20:39:06', '2019-11-05 20:39:06', 1),
	(288, 11, 20, 2019, 11, 7000000, NULL, 0, '2019-11-05 20:39:06', '2019-11-05 20:39:06', 1),
	(289, 10, 21, 2019, 7, 7000000, NULL, 0, '2019-11-05 20:39:06', '2019-11-05 20:39:06', 1),
	(290, 12, 21, 2019, 7, 7000000, NULL, 0, '2019-11-05 20:39:06', '2019-11-05 20:39:06', 1),
	(291, 10, 21, 2019, 8, 7000000, NULL, 0, '2019-11-05 20:39:06', '2019-11-05 20:39:06', 1),
	(292, 12, 21, 2019, 8, 7000000, NULL, 0, '2019-11-05 20:39:06', '2019-11-05 20:39:06', 1),
	(293, 10, 21, 2019, 9, 7000000, NULL, 0, '2019-11-05 20:39:06', '2019-11-05 20:39:06', 1),
	(294, 12, 21, 2019, 9, 7000000, NULL, 0, '2019-11-05 20:39:06', '2019-11-05 20:39:06', 1),
	(295, 10, 21, 2019, 10, 7000000, NULL, 0, '2019-11-05 20:39:07', '2019-11-05 20:39:07', 1),
	(296, 12, 21, 2019, 10, 7000000, NULL, 0, '2019-11-05 20:39:07', '2019-11-05 20:39:07', 1),
	(297, 10, 21, 2019, 11, 7000000, NULL, 0, '2019-11-05 20:39:07', '2019-11-05 20:39:07', 1),
	(298, 12, 21, 2019, 11, 7000000, NULL, 0, '2019-11-05 20:39:07', '2019-11-05 20:39:07', 1),
	(299, 10, 21, 2019, 12, 7000000, NULL, 0, '2019-11-05 20:39:07', '2019-11-05 20:39:07', 1),
	(300, 12, 21, 2019, 12, 7000000, NULL, 0, '2019-11-05 20:39:07', '2019-11-05 20:39:07', 1),
	(301, 9, 22, 2019, 7, 7000000, NULL, 0, '2019-11-05 20:39:07', '2019-11-05 20:39:07', 1),
	(302, 11, 22, 2019, 7, 7000000, NULL, 0, '2019-11-05 20:39:07', '2019-11-05 20:39:07', 1),
	(303, 9, 22, 2019, 8, 7000000, NULL, 0, '2019-11-05 20:39:07', '2019-11-05 20:39:07', 1),
	(304, 11, 22, 2019, 8, 7000000, NULL, 0, '2019-11-05 20:39:07', '2019-11-05 20:39:07', 1),
	(305, 9, 22, 2019, 9, 7000000, NULL, 0, '2019-11-05 20:39:07', '2019-11-05 20:39:07', 1),
	(306, 11, 22, 2019, 9, 7000000, NULL, 0, '2019-11-05 20:39:07', '2019-11-05 20:39:07', 1),
	(307, 9, 22, 2019, 10, 7000000, NULL, 0, '2019-11-05 20:39:07', '2019-11-05 20:39:07', 1),
	(308, 11, 22, 2019, 10, 7000000, NULL, 0, '2019-11-05 20:39:07', '2019-11-05 20:39:07', 1),
	(309, 9, 22, 2019, 11, 7000000, NULL, 0, '2019-11-05 20:39:07', '2019-11-05 20:39:07', 1),
	(310, 11, 22, 2019, 11, 7000000, NULL, 0, '2019-11-05 20:39:07', '2019-11-05 20:39:07', 1),
	(311, 9, 22, 2019, 12, 7000000, NULL, 0, '2019-11-05 20:39:07', '2019-11-05 20:39:07', 1),
	(312, 11, 22, 2019, 12, 7000000, NULL, 0, '2019-11-05 20:39:07', '2019-11-05 20:39:07', 1),
	(313, 9, 23, 2019, 7, 8000000, NULL, 0, '2019-11-05 20:39:07', '2019-11-05 20:39:07', 1),
	(314, 11, 23, 2019, 7, 8000000, NULL, 0, '2019-11-05 20:39:07', '2019-11-05 20:39:07', 1),
	(315, 9, 23, 2019, 8, 8000000, NULL, 0, '2019-11-05 20:39:07', '2019-11-05 20:39:07', 1),
	(316, 11, 23, 2019, 8, 8000000, NULL, 0, '2019-11-05 20:39:08', '2019-11-05 20:39:08', 1),
	(317, 9, 23, 2019, 9, 8000000, NULL, 0, '2019-11-05 20:39:08', '2019-11-05 20:39:08', 1),
	(318, 11, 23, 2019, 9, 8000000, NULL, 0, '2019-11-05 20:39:08', '2019-11-05 20:39:08', 1),
	(319, 9, 23, 2019, 10, 8000000, NULL, 0, '2019-11-05 20:39:08', '2019-11-05 20:39:08', 1),
	(320, 11, 23, 2019, 10, 8000000, NULL, 0, '2019-11-05 20:39:08', '2019-11-05 20:39:08', 1),
	(321, 9, 23, 2019, 11, 8000000, NULL, 0, '2019-11-05 20:39:08', '2019-11-05 20:39:08', 1),
	(322, 11, 23, 2019, 11, 8000000, NULL, 0, '2019-11-05 20:39:08', '2019-11-05 20:39:08', 1),
	(323, 9, 23, 2019, 12, 8000000, NULL, 0, '2019-11-05 20:39:08', '2019-11-05 20:39:08', 1),
	(324, 11, 23, 2019, 12, 8000000, NULL, 0, '2019-11-05 20:39:08', '2019-11-05 20:39:08', 1);
/*!40000 ALTER TABLE `t_pembayaran` ENABLE KEYS */;

-- Dumping structure for table sikes.t_pembayaran_detail
CREATE TABLE IF NOT EXISTS `t_pembayaran_detail` (
  `t_pembayaran_detail_id` int(11) NOT NULL AUTO_INCREMENT,
  `t_pembayaran_id` int(11) DEFAULT NULL,
  `nominal` float DEFAULT NULL,
  `date_added` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`t_pembayaran_detail_id`),
  KEY `created_by` (`created_by`),
  KEY `pembayaran_id` (`t_pembayaran_id`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=latin1;

-- Dumping data for table sikes.t_pembayaran_detail: ~2 rows (approximately)
/*!40000 ALTER TABLE `t_pembayaran_detail` DISABLE KEYS */;
INSERT INTO `t_pembayaran_detail` (`t_pembayaran_detail_id`, `t_pembayaran_id`, `nominal`, `date_added`, `created_by`) VALUES
	(36, 269, 30000000, '2019-11-05 20:39:18', 1),
	(37, 276, 30000000, '2019-11-05 21:37:20', 1);
/*!40000 ALTER TABLE `t_pembayaran_detail` ENABLE KEYS */;

-- Dumping structure for table sikes.user
CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` int(11) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `active` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`user_id`),
  KEY `role_id` (`role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table sikes.user: ~0 rows (approximately)
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`user_id`, `role_id`, `username`, `password`, `active`) VALUES
	(1, 1, 'admin', '5ebe2294ecd0e0f08eab7690d2a6ee69', 1);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;

-- Dumping structure for view sikes.v_jurnal
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `v_jurnal` (
	`t_jurnal_id` INT(11) NOT NULL,
	`tarif_tipe_id` INT(11) NULL,
	`tarif_nilai_id` INT(11) NULL,
	`jurnal_type` VARCHAR(3) NULL COLLATE 'latin1_swedish_ci',
	`total` FLOAT NULL,
	`keterangan` TEXT NULL COLLATE 'latin1_swedish_ci',
	`active` INT(1) NULL,
	`date_added` DATE NULL,
	`date_modified` DATE NULL
) ENGINE=MyISAM;

-- Dumping structure for view sikes.v_message_sent
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `v_message_sent` (
	`message_sent_id` INT(11) NOT NULL,
	`t_pembayaran_detail_id` INT(11) NULL,
	`siswa_id` INT(11) NULL,
	`no_ortu` VARCHAR(20) NULL COLLATE 'latin1_swedish_ci',
	`message_type` VARCHAR(50) NULL COLLATE 'latin1_swedish_ci',
	`message_text` VARCHAR(255) NULL COLLATE 'latin1_swedish_ci',
	`date_added` DATETIME NULL,
	`date_modified` DATETIME NULL,
	`created_by` INT(11) NULL,
	`active` INT(1) NOT NULL,
	`date_added2` VARCHAR(10) NULL COLLATE 'utf8mb4_general_ci',
	`nama` VARCHAR(50) NULL COLLATE 'latin1_swedish_ci',
	`nis` VARCHAR(50) NULL COLLATE 'latin1_swedish_ci',
	`tarif_tipe` VARCHAR(50) NULL COLLATE 'latin1_swedish_ci',
	`nominal` FLOAT NULL
) ENGINE=MyISAM;

-- Dumping structure for view sikes.v_pembayaran
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `v_pembayaran` (
	`t_pembayaran_id` INT(11) NOT NULL,
	`siswa_id` INT(11) NULL,
	`tarif_nilai_id` INT(11) NULL,
	`tahun` INT(11) NULL,
	`bulan_ke` INT(2) NULL,
	`nominal` FLOAT NULL,
	`nominal_min` FLOAT NULL,
	`nominal_bayar` FLOAT NULL,
	`date_added` DATETIME NULL,
	`date_modified` DATETIME NULL,
	`created_by` INT(11) NULL,
	`date_added2` DATE NULL,
	`nama` VARCHAR(50) NULL COLLATE 'latin1_swedish_ci',
	`nis` VARCHAR(50) NULL COLLATE 'latin1_swedish_ci',
	`no_ortu` VARCHAR(20) NULL COLLATE 'latin1_swedish_ci',
	`ta_id` INT(11) NULL,
	`kelas` INT(11) NULL,
	`ta` VARCHAR(50) NULL COLLATE 'latin1_swedish_ci',
	`nominal_sisa` DOUBLE NULL,
	`status` VARCHAR(11) NULL COLLATE 'utf8mb4_general_ci',
	`tarif_tipe` VARCHAR(50) NULL COLLATE 'latin1_swedish_ci',
	`tarif_tipe_id` INT(11) NOT NULL,
	`transaction_type_id` INT(11) NULL,
	`transaction_type` VARCHAR(50) NULL COLLATE 'latin1_swedish_ci'
) ENGINE=MyISAM;

-- Dumping structure for view sikes.v_pembayaran_detail
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `v_pembayaran_detail` (
	`t_pembayaran_detail_id` INT(11) NOT NULL,
	`t_pembayaran_id` INT(11) NULL,
	`nominal` FLOAT NULL,
	`date_added` DATETIME NULL,
	`created_by` INT(11) NULL
) ENGINE=MyISAM;

-- Dumping structure for view sikes.v_siswa
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `v_siswa` (
	`siswa_id` INT(11) NOT NULL,
	`nis` VARCHAR(50) NULL COLLATE 'latin1_swedish_ci',
	`ttl` DATE NULL,
	`nama` VARCHAR(50) NULL COLLATE 'latin1_swedish_ci',
	`jenis_kelamin` VARCHAR(1) NULL COLLATE 'latin1_swedish_ci',
	`alamat` VARCHAR(255) NULL COLLATE 'latin1_swedish_ci',
	`nama_ortu` VARCHAR(50) NULL COLLATE 'latin1_swedish_ci',
	`no_ortu` VARCHAR(20) NULL COLLATE 'latin1_swedish_ci',
	`email_ortu` VARCHAR(50) NULL COLLATE 'latin1_swedish_ci',
	`active` INT(1) NOT NULL,
	`kelas` INT(11) NULL,
	`ta_id` INT(11) NULL,
	`ta` VARCHAR(50) NULL COLLATE 'latin1_swedish_ci'
) ENGINE=MyISAM;

-- Dumping structure for view sikes.v_siswa_status
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `v_siswa_status` (
	`siswa_status_id` INT(11) NOT NULL,
	`siswa_id` INT(11) NULL,
	`kelas` INT(11) NULL,
	`ta_id` INT(11) NULL,
	`active` INT(1) NOT NULL,
	`ta` VARCHAR(50) NULL COLLATE 'latin1_swedish_ci'
) ENGINE=MyISAM;

-- Dumping structure for view sikes.v_ta
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `v_ta` (
	`ta_id` INT(11) NOT NULL,
	`ta` VARCHAR(50) NULL COLLATE 'latin1_swedish_ci',
	`active` INT(1) NULL
) ENGINE=MyISAM;

-- Dumping structure for view sikes.v_tarif_nilai
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `v_tarif_nilai` (
	`tarif_nilai_id` INT(11) NOT NULL,
	`ta_id` INT(11) NULL,
	`kelas` INT(11) NULL,
	`tarif_tipe_id` INT(11) NULL,
	`nominal` FLOAT NULL,
	`nominal_min` FLOAT NULL,
	`date_started` DATE NULL,
	`date_ended` DATE NULL,
	`active` INT(1) NULL,
	`transaction_type_id` INT(11) NULL,
	`ta` VARCHAR(50) NULL COLLATE 'latin1_swedish_ci'
) ENGINE=MyISAM;

-- Dumping structure for view sikes.v_tarif_tipe
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `v_tarif_tipe` (
	`tarif_tipe_id` INT(11) NOT NULL,
	`transaction_type_id` INT(11) NULL,
	`tarif_tipe` VARCHAR(50) NULL COLLATE 'latin1_swedish_ci',
	`akronim` VARCHAR(50) NULL COLLATE 'latin1_swedish_ci',
	`active` INT(1) NULL,
	`transaction_type` VARCHAR(50) NULL COLLATE 'latin1_swedish_ci'
) ENGINE=MyISAM;

-- Dumping structure for view sikes.v_jurnal
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `v_jurnal`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_jurnal` AS SELECT 
	j.*
FROM t_jurnal j
JOIN tarif_nilai tn ON tn.tarif_nilai_id = j.tarif_nilai_id AND tn.active = 1
JOIN tarif_tipe tt ON tt.tarif_tipe_id = j.tarif_tipe_id AND tt.active = 1
JOIN ta ON ta.ta_id = tn.ta_id AND ta.active = 1
WHERE j.active = 1 ;

-- Dumping structure for view sikes.v_message_sent
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `v_message_sent`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_message_sent` AS SELECT 
	ms.*,
	DATE_FORMAT(ms.date_added, "%Y-%m-%d") as `date_added2`,
	sis.nama,
	sis.nis,
	tt.tarif_tipe,
	tpd.nominal
FROM message_sent ms 
JOIN siswa sis ON sis.siswa_id = ms.siswa_id AND sis.active = 1
JOIN t_pembayaran_detail tpd ON tpd.t_pembayaran_detail_id = ms.t_pembayaran_detail_id
JOIN t_pembayaran tp ON tp.t_pembayaran_id = tpd.t_pembayaran_id
JOIN tarif_nilai tn ON tn.tarif_nilai_id = tp.tarif_nilai_id AND tn.active = 1
JOIN ta ON ta.ta_id = tn.ta_id AND ta.active = 1
JOIN tarif_tipe tt ON tt.tarif_tipe_id = tn.tarif_tipe_id AND tt.active = 1
WHERE ms.active = 1 ;

-- Dumping structure for view sikes.v_pembayaran
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `v_pembayaran`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_pembayaran` AS SELECT 
	tp.*,
	date(tp.date_added) as `date_added2`,
	sis.nama,
	sis.nis,
	sis.no_ortu,
	tn.ta_id,
	tn.kelas,
	ta.ta,
	tp.nominal - tp.nominal_bayar AS `nominal_sisa`,
	if(tp.nominal - tp.nominal_bayar <= 0, 'lunas', 'belum lunas') AS `status`,
	ttp.tarif_tipe,
	ttp.tarif_tipe_id,
	ttp.transaction_type_id,
	tty.transaction_type
FROM t_pembayaran tp 
JOIN siswa sis ON sis.siswa_id = tp.siswa_id and sis.active = 1
JOIN tarif_nilai tn ON tn.tarif_nilai_id = tp.tarif_nilai_id and tn.active = 1
JOIN ta ON ta.ta_id = tn.ta_id and ta.active = 1
JOIN tarif_tipe ttp ON ttp.tarif_tipe_id = tn.tarif_tipe_id and ttp.active = 1
JOIN transaction_type tty ON tty.transaction_type_id = ttp.transaction_type_id ;

-- Dumping structure for view sikes.v_pembayaran_detail
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `v_pembayaran_detail`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_pembayaran_detail` AS SELECT
tpd.*
FROM t_pembayaran_detail tpd
INNER JOIN v_pembayaran vp ON vp.t_pembayaran_id = tpd.t_pembayaran_id ;

-- Dumping structure for view sikes.v_siswa
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `v_siswa`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_siswa` AS SELECT 
	s.*, 
	st.kelas,
	st.ta_id,
	ta.ta
FROM siswa s
LEFT JOIN siswa_status st ON s.siswa_id = st.siswa_id AND st.active = 1 
LEFT JOIN ta on ta.ta_id = st.ta_id and ta.active = 1
where s.active = 1 ;

-- Dumping structure for view sikes.v_siswa_status
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `v_siswa_status`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_siswa_status` AS SELECT 
	ss.*, 
	ta.ta
FROM siswa_status ss
LEFT JOIN ta ON ta.ta_id = ss.ta_id ;

-- Dumping structure for view sikes.v_ta
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `v_ta`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_ta` AS SELECT 
	t.*
FROM ta t
WHERE t.active = 1 ;

-- Dumping structure for view sikes.v_tarif_nilai
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `v_tarif_nilai`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_tarif_nilai` AS SELECT 
	tn.*, 
	tt.transaction_type_id,
	ta.ta
FROM tarif_nilai tn
JOIN tarif_tipe tt on tt.tarif_tipe_id = tn.tarif_tipe_id and tt.active = 1
JOIN ta on ta.ta_id = tn.ta_id and ta.active = 1
where tn.active = 1 ;

-- Dumping structure for view sikes.v_tarif_tipe
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `v_tarif_tipe`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_tarif_tipe` AS SELECT 
	tt.*, 
	typ.transaction_type
FROM tarif_tipe tt
JOIN transaction_type typ ON tt.transaction_type_id = typ.transaction_type_id 
where tt.active = 1 ;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;

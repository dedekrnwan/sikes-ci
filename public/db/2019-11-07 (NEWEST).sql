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
	(1, 71247);
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table sikes.message_sent: ~1 rows (approximately)
/*!40000 ALTER TABLE `message_sent` DISABLE KEYS */;
INSERT INTO `message_sent` (`message_sent_id`, `t_pembayaran_detail_id`, `siswa_id`, `no_ortu`, `message_type`, `message_text`, `date_added`, `date_modified`, `created_by`, `active`) VALUES
	(2, 2, 9, '6287820988075', 'pembayaran', 'Pembayaran untuk SPP Bulanan bulan ke 11 yang dilakukan oleh siswa bernama M Cholis Malik(13114) sebesar Rp 5,000,000 telah kami terima', '2019-11-07 20:41:03', '2019-11-07 20:41:03', 1, 1);
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
	(13, '13119', '1970-01-01', 'Wiliam', 'L', 'Jl. Raya Bekasi', 'Kevin', '6287820988075', 'kevin@gmail.com', 1),
	(14, '1311412', '1970-01-01', 'Ariq Muammar', 'L', 'sldkaf', 'Suminem', '129381', 'suminem@gmail.com', 1);
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
	(8, 9, 2, 2, 1),
	(10, 10, 1, 2, 1),
	(11, 11, 2, 2, 1),
	(12, 12, 1, 2, 1);
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
) ENGINE=InnoDB AUTO_INCREMENT=379 DEFAULT CHARSET=latin1;

-- Dumping data for table sikes.sync_tarif: ~8 rows (approximately)
/*!40000 ALTER TABLE `sync_tarif` DISABLE KEYS */;
INSERT INTO `sync_tarif` (`sync_tarif_id`, `siswa_id`, `tarif_nilai_id`, `tahun`, `bulan_ke`, `status`, `date_added`, `created_by`) VALUES
	(371, 9, 35, 2019, 11, 1, '2019-11-06 14:33:36', 1),
	(372, 11, 35, 2019, 11, 1, '2019-11-06 14:33:36', 1),
	(373, 9, 35, 2019, 12, 1, '2019-11-06 14:33:36', 1),
	(374, 11, 35, 2019, 12, 1, '2019-11-06 14:33:36', 1),
	(375, 9, 35, 2020, 1, 1, '2019-11-06 14:33:36', 1),
	(376, 11, 35, 2020, 1, 1, '2019-11-06 14:33:36', 1),
	(377, 9, 35, 2020, 2, 1, '2019-11-06 14:33:37', 1),
	(378, 11, 35, 2020, 2, 1, '2019-11-06 14:33:37', 1);
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
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;

-- Dumping data for table sikes.tarif_nilai: ~1 rows (approximately)
/*!40000 ALTER TABLE `tarif_nilai` DISABLE KEYS */;
INSERT INTO `tarif_nilai` (`tarif_nilai_id`, `ta_id`, `kelas`, `tarif_tipe_id`, `nominal`, `nominal_min`, `date_started`, `date_ended`, `active`) VALUES
	(35, 2, 2, 1, 5000000, NULL, '2019-11-10', '2020-02-10', 1);
/*!40000 ALTER TABLE `tarif_nilai` ENABLE KEYS */;

-- Dumping structure for table sikes.tarif_tipe
CREATE TABLE IF NOT EXISTS `tarif_tipe` (
  `tarif_tipe_id` int(11) NOT NULL AUTO_INCREMENT,
  `transaction_type_id` int(11) DEFAULT NULL,
  `spesific` int(1) NOT NULL DEFAULT '0',
  `akronim` varchar(50) DEFAULT NULL,
  `tarif_tipe` varchar(50) DEFAULT NULL,
  `active` int(1) DEFAULT '1',
  PRIMARY KEY (`tarif_tipe_id`),
  KEY `transaction_type_id` (`transaction_type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Dumping data for table sikes.tarif_tipe: ~5 rows (approximately)
/*!40000 ALTER TABLE `tarif_tipe` DISABLE KEYS */;
INSERT INTO `tarif_tipe` (`tarif_tipe_id`, `transaction_type_id`, `spesific`, `akronim`, `tarif_tipe`, `active`) VALUES
	(1, 1, 0, NULL, 'SPP Bulanan', 1),
	(2, 1, 0, NULL, 'OSIS', 1),
	(3, 2, 0, NULL, 'Pendaftaran', 1),
	(4, 1, 0, NULL, 'Almamater', 1),
	(5, 2, 1, NULL, 'Baju Bola', 1);
/*!40000 ALTER TABLE `tarif_tipe` ENABLE KEYS */;

-- Dumping structure for table sikes.tarif_tipe_spesific
CREATE TABLE IF NOT EXISTS `tarif_tipe_spesific` (
  `tarif_tipe_spesific_id` int(11) NOT NULL AUTO_INCREMENT,
  `tarif_tipe_id` int(11) NOT NULL DEFAULT '0',
  `siswa_id` int(11) DEFAULT NULL,
  `active` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`tarif_tipe_spesific_id`),
  UNIQUE KEY `siswa_id_active` (`siswa_id`,`active`,`tarif_tipe_id`),
  KEY `siswa_id` (`siswa_id`),
  KEY `tarif_tipe_id` (`tarif_tipe_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

-- Dumping data for table sikes.tarif_tipe_spesific: ~0 rows (approximately)
/*!40000 ALTER TABLE `tarif_tipe_spesific` DISABLE KEYS */;
/*!40000 ALTER TABLE `tarif_tipe_spesific` ENABLE KEYS */;

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table sikes.t_jurnal: ~2 rows (approximately)
/*!40000 ALTER TABLE `t_jurnal` DISABLE KEYS */;
INSERT INTO `t_jurnal` (`t_jurnal_id`, `tarif_tipe_id`, `tarif_nilai_id`, `jurnal_type`, `total`, `keterangan`, `active`, `date_added`, `date_modified`) VALUES
	(2, 0, 0, 'out', 900000, 'APa', 1, '2019-11-08', NULL),
	(3, 1, 35, 'in', 5000000, '(13114) M Cholis Malik membayar SPP Bulanan untuk ta 2019 kelas 2 bulan ke 11', 1, '2019-11-07', NULL);
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
) ENGINE=InnoDB AUTO_INCREMENT=90 DEFAULT CHARSET=latin1;

-- Dumping data for table sikes.t_pembayaran: ~8 rows (approximately)
/*!40000 ALTER TABLE `t_pembayaran` DISABLE KEYS */;
INSERT INTO `t_pembayaran` (`t_pembayaran_id`, `siswa_id`, `tarif_nilai_id`, `tahun`, `bulan_ke`, `nominal`, `nominal_min`, `nominal_bayar`, `date_added`, `date_modified`, `created_by`) VALUES
	(82, 9, 35, 2019, 11, 5000000, NULL, 5000000, '2019-11-06 14:33:36', '2019-11-06 14:33:36', 1),
	(83, 11, 35, 2019, 11, 5000000, NULL, 0, '2019-11-06 14:33:36', '2019-11-06 14:33:36', 1),
	(84, 9, 35, 2019, 12, 5000000, NULL, 0, '2019-11-06 14:33:36', '2019-11-06 14:33:36', 1),
	(85, 11, 35, 2019, 12, 5000000, NULL, 0, '2019-11-06 14:33:36', '2019-11-06 14:33:36', 1),
	(86, 9, 35, 2020, 1, 5000000, NULL, 0, '2019-11-06 14:33:36', '2019-11-06 14:33:36', 1),
	(87, 11, 35, 2020, 1, 5000000, NULL, 0, '2019-11-06 14:33:36', '2019-11-06 14:33:36', 1),
	(88, 9, 35, 2020, 2, 5000000, NULL, 0, '2019-11-06 14:33:36', '2019-11-06 14:33:36', 1),
	(89, 11, 35, 2020, 2, 5000000, NULL, 0, '2019-11-06 14:33:37', '2019-11-06 14:33:37', 1);
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table sikes.t_pembayaran_detail: ~1 rows (approximately)
/*!40000 ALTER TABLE `t_pembayaran_detail` DISABLE KEYS */;
INSERT INTO `t_pembayaran_detail` (`t_pembayaran_detail_id`, `t_pembayaran_id`, `nominal`, `date_added`, `created_by`) VALUES
	(2, 82, 5000000, '2019-11-07 20:41:00', 1);
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
	`date_modified` DATE NULL,
	`show` VARCHAR(5) NULL COLLATE 'utf8mb4_general_ci'
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
	`spesific` INT(1) NOT NULL,
	`akronim` VARCHAR(50) NULL COLLATE 'latin1_swedish_ci',
	`tarif_tipe` VARCHAR(50) NULL COLLATE 'latin1_swedish_ci',
	`active` INT(1) NULL,
	`transaction_type` VARCHAR(50) NULL COLLATE 'latin1_swedish_ci'
) ENGINE=MyISAM;

-- Dumping structure for view sikes.v_tarif_tipe_spesific
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `v_tarif_tipe_spesific` (
	`tarif_tipe_spesific_id` INT(11) NOT NULL,
	`tarif_tipe_id` INT(11) NOT NULL,
	`siswa_id` INT(11) NULL,
	`active` INT(1) NOT NULL,
	`nis` VARCHAR(50) NULL COLLATE 'latin1_swedish_ci',
	`nama` VARCHAR(50) NULL COLLATE 'latin1_swedish_ci'
) ENGINE=MyISAM;

-- Dumping structure for view sikes.v_jurnal
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `v_jurnal`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_jurnal` AS SELECT 
	j.*,
	(
    CASE 
        WHEN j.tarif_tipe_id = 0 && j.tarif_nilai_id = 0 THEN 'true'
        WHEN ta.active = 1 && tt.active = 1 && tn.active = 1 THEN 'true'
        ELSE 'false'
    END) AS `show`
FROM t_jurnal j 
LEFT JOIN tarif_nilai tn ON tn.tarif_nilai_id = j.tarif_nilai_id
LEFT JOIN tarif_tipe tt ON tt.tarif_tipe_id = j.tarif_tipe_id
LEFT JOIN ta ON ta.ta_id = tn.ta_id
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

-- Dumping structure for view sikes.v_tarif_tipe_spesific
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `v_tarif_tipe_spesific`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_tarif_tipe_spesific` AS SELECT 
	tts.*,
	s.nis,
	s.nama 
FROM tarif_tipe_spesific tts  
JOIN tarif_tipe tt ON tt.tarif_tipe_id = tts.tarif_tipe_id AND tt.active = 1
JOIN siswa s ON s.siswa_id = tts.siswa_id AND s.active = 1
WHERE tts.active = 1 ;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;

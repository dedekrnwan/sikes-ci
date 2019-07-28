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
  PRIMARY KEY (`message_sent_id`),
  KEY `t_pembayaran_id` (`t_pembayaran_detail_id`),
  KEY `siswa_id` (`siswa_id`),
  KEY `created_by` (`created_by`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table sikes.message_sent: ~1 rows (approximately)
/*!40000 ALTER TABLE `message_sent` DISABLE KEYS */;
INSERT INTO `message_sent` (`message_sent_id`, `t_pembayaran_detail_id`, `siswa_id`, `no_ortu`, `message_type`, `message_text`, `date_added`, `date_modified`, `created_by`) VALUES
	(1, 1, 1, '0838028301', 'pembayaran', 'Anda telah membayarankan', '2019-07-28 17:28:37', '2019-07-28 17:28:38', 1);
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
  `nama` varchar(50) DEFAULT NULL,
  `jenis_kelamin` varchar(1) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `nama_ortu` varchar(50) DEFAULT NULL,
  `no_ortu` varchar(20) DEFAULT NULL,
  `email_ortu` varchar(50) DEFAULT NULL,
  `active` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`siswa_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- Dumping data for table sikes.siswa: ~5 rows (approximately)
/*!40000 ALTER TABLE `siswa` DISABLE KEYS */;
INSERT INTO `siswa` (`siswa_id`, `nis`, `nama`, `jenis_kelamin`, `alamat`, `nama_ortu`, `no_ortu`, `email_ortu`, `active`) VALUES
	(1, '13110', 'Malikeeed', 'L', 'ssd', 'Sulis', '0838028301', 'sulis@gmail.com', 1),
	(2, 'sdf', 'oskdfkm', 'L', 'sdlfm', 'sdkfjk', '230903', 'sdkfj', 1),
	(6, '12891', 'Baba', 'L', 'Jl Poncol', 'Maliki', '00812831', 'malik@gmail.com', 1),
	(7, '123', 'PURNAMA', 'L', 'sdf', 'asdf', '2323', 'sadf', 1),
	(8, 'asdf', 'asdfasd', 'L', 'sdf', 'sdf', '234', 'sdg', 1);
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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Dumping data for table sikes.siswa_status: ~5 rows (approximately)
/*!40000 ALTER TABLE `siswa_status` DISABLE KEYS */;
INSERT INTO `siswa_status` (`siswa_status_id`, `siswa_id`, `kelas`, `ta_id`, `active`) VALUES
	(1, 1, 1, 1, 0),
	(2, 2, 2, 2, 1),
	(4, 1, 2, 1, 0),
	(5, 2, 2, 2, 0),
	(6, 6, 1, 2, 1);
/*!40000 ALTER TABLE `siswa_status` ENABLE KEYS */;

-- Dumping structure for table sikes.sync_tarif
CREATE TABLE IF NOT EXISTS `sync_tarif` (
  `sync_tarif_id` int(11) NOT NULL AUTO_INCREMENT,
  `tarif_nilai_id` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `date_added` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`sync_tarif_id`),
  KEY `created_by` (`created_by`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table sikes.sync_tarif: ~0 rows (approximately)
/*!40000 ALTER TABLE `sync_tarif` DISABLE KEYS */;
/*!40000 ALTER TABLE `sync_tarif` ENABLE KEYS */;

-- Dumping structure for table sikes.ta
CREATE TABLE IF NOT EXISTS `ta` (
  `ta_id` int(11) NOT NULL AUTO_INCREMENT,
  `ta` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`ta_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table sikes.ta: ~4 rows (approximately)
/*!40000 ALTER TABLE `ta` DISABLE KEYS */;
INSERT INTO `ta` (`ta_id`, `ta`) VALUES
	(1, '2018'),
	(2, '2019'),
	(3, '2021');
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
  `active` int(1) DEFAULT '0',
  PRIMARY KEY (`tarif_nilai_id`),
  KEY `ta_id` (`ta_id`),
  KEY `tarif_tipe_id` (`tarif_tipe_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table sikes.tarif_nilai: ~2 rows (approximately)
/*!40000 ALTER TABLE `tarif_nilai` DISABLE KEYS */;
INSERT INTO `tarif_nilai` (`tarif_nilai_id`, `ta_id`, `kelas`, `tarif_tipe_id`, `nominal`, `nominal_min`, `date_started`, `date_ended`, `active`) VALUES
	(1, 1, 1, 1, 200000, 400000, '2019-07-28', '2019-07-28', 0),
	(2, 1, 2, 1, 900000, NULL, NULL, NULL, 1);
/*!40000 ALTER TABLE `tarif_nilai` ENABLE KEYS */;

-- Dumping structure for table sikes.tarif_tipe
CREATE TABLE IF NOT EXISTS `tarif_tipe` (
  `tarif_tipe_id` int(11) NOT NULL AUTO_INCREMENT,
  `transaction_type_id` int(11) DEFAULT NULL,
  `tarif_tipe` varchar(50) DEFAULT NULL,
  `akronim` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`tarif_tipe_id`),
  KEY `transaction_type_id` (`transaction_type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Dumping data for table sikes.tarif_tipe: ~4 rows (approximately)
/*!40000 ALTER TABLE `tarif_tipe` DISABLE KEYS */;
INSERT INTO `tarif_tipe` (`tarif_tipe_id`, `transaction_type_id`, `tarif_tipe`, `akronim`) VALUES
	(1, 1, 'SPP Bulanandd', ''),
	(2, 1, 'OSISs', ''),
	(3, 2, 'PSB', NULL),
	(4, 1, 'PBEW', NULL);
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

-- Dumping structure for table sikes.t_pembayaran
CREATE TABLE IF NOT EXISTS `t_pembayaran` (
  `t_pembayaran_id` int(11) NOT NULL AUTO_INCREMENT,
  `siswa_id` int(11) DEFAULT NULL,
  `tarif_nilai_id` int(11) DEFAULT NULL,
  `bulan_ke` int(2) DEFAULT NULL,
  `nominal` float DEFAULT NULL,
  `nominal_bayar` float DEFAULT NULL,
  `date_added` datetime DEFAULT NULL,
  `date_modified` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`t_pembayaran_id`),
  KEY `siswa_id` (`siswa_id`),
  KEY `tarif_nilai_id` (`tarif_nilai_id`),
  KEY `created_by` (`created_by`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table sikes.t_pembayaran: ~2 rows (approximately)
/*!40000 ALTER TABLE `t_pembayaran` DISABLE KEYS */;
INSERT INTO `t_pembayaran` (`t_pembayaran_id`, `siswa_id`, `tarif_nilai_id`, `bulan_ke`, `nominal`, `nominal_bayar`, `date_added`, `date_modified`, `created_by`) VALUES
	(1, 1, 1, 1, 200000, 300000, '2019-07-28 15:11:03', '2019-07-28 15:11:04', NULL);
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table sikes.t_pembayaran_detail: ~3 rows (approximately)
/*!40000 ALTER TABLE `t_pembayaran_detail` DISABLE KEYS */;
INSERT INTO `t_pembayaran_detail` (`t_pembayaran_detail_id`, `t_pembayaran_id`, `nominal`, `date_added`, `created_by`) VALUES
	(1, 1, 200000, '2019-07-23 10:54:22', NULL),
	(2, NULL, 500000, '2019-07-23 10:54:22', NULL),
	(3, NULL, 900000, '2019-06-23 10:54:22', NULL);
/*!40000 ALTER TABLE `t_pembayaran_detail` ENABLE KEYS */;

-- Dumping structure for table sikes.user
CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` int(11) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `active` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`user_id`),
  KEY `role_id` (`role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table sikes.user: ~1 rows (approximately)
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`user_id`, `role_id`, `username`, `password`, `active`) VALUES
	(1, 1, 'admin', '5ebe2294ecd0e0f08eab7690d2a6ee69', 1);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;

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
	`bulan_ke` INT(2) NULL,
	`nominal` FLOAT NULL,
	`nominal_bayar` FLOAT NULL,
	`date_added` DATETIME NULL,
	`date_modified` DATETIME NULL,
	`created_by` INT(11) NULL,
	`nama` VARCHAR(50) NULL COLLATE 'latin1_swedish_ci',
	`nis` VARCHAR(50) NULL COLLATE 'latin1_swedish_ci',
	`ta_id` INT(11) NULL,
	`kelas` INT(11) NULL,
	`ta` VARCHAR(50) NULL COLLATE 'latin1_swedish_ci',
	`nominal_sisa` DOUBLE NULL,
	`status` VARCHAR(11) NULL COLLATE 'utf8mb4_general_ci',
	`tarif_tipe` VARCHAR(50) NULL COLLATE 'latin1_swedish_ci',
	`transaction_type_id` INT(11) NULL,
	`transaction_type` VARCHAR(50) NULL COLLATE 'latin1_swedish_ci'
) ENGINE=MyISAM;

-- Dumping structure for view sikes.v_siswa
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `v_siswa` (
	`siswa_id` INT(11) NOT NULL,
	`nis` VARCHAR(50) NULL COLLATE 'latin1_swedish_ci',
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
	`ta` VARCHAR(50) NULL COLLATE 'latin1_swedish_ci'
) ENGINE=MyISAM;

-- Dumping structure for view sikes.v_tarif_tipe
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `v_tarif_tipe` (
	`tarif_tipe_id` INT(11) NOT NULL,
	`transaction_type_id` INT(11) NULL,
	`tarif_tipe` VARCHAR(50) NULL COLLATE 'latin1_swedish_ci',
	`akronim` VARCHAR(50) NULL COLLATE 'latin1_swedish_ci',
	`transaction_type` VARCHAR(50) NULL COLLATE 'latin1_swedish_ci'
) ENGINE=MyISAM;

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
LEFT JOIN siswa sis ON sis.siswa_id = ms.siswa_id
LEFT JOIN t_pembayaran_detail tpd ON tpd.t_pembayaran_detail_id = ms.t_pembayaran_detail_id
LEFT JOIN t_pembayaran tp ON tp.t_pembayaran_id = tpd.t_pembayaran_id
LEFT JOIN tarif_nilai tn ON tn.tarif_nilai_id = tp.tarif_nilai_id
LEFT JOIN tarif_tipe tt ON tt.tarif_tipe_id = tn.tarif_tipe_id ;

-- Dumping structure for view sikes.v_pembayaran
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `v_pembayaran`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_pembayaran` AS SELECT 
	tp.*,
	sis.nama,
	sis.nis,
	tn.ta_id,
	tn.kelas,
	ta.ta,
	tp.nominal - tp.nominal_bayar AS `nominal_sisa`,
	if(tp.nominal - tp.nominal_bayar <= 0, 'lunas', 'belum lunas') AS `status`,
	ttp.tarif_tipe,
	ttp.transaction_type_id,
	tty.transaction_type
FROM t_pembayaran tp 
LEFT JOIN siswa sis ON sis.siswa_id = tp.siswa_id 
LEFT JOIN tarif_nilai tn ON tn.tarif_nilai_id = tp.tarif_nilai_id
LEFT JOIN ta ON ta.ta_id = tn.ta_id
LEFT JOIN tarif_tipe ttp ON ttp.tarif_tipe_id = tn.tarif_tipe_id
LEFT JOIN transaction_type tty ON tty.transaction_type_id = ttp.transaction_type_id ;

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
LEFT JOIN ta on ta.ta_id = st.ta_id ;

-- Dumping structure for view sikes.v_siswa_status
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `v_siswa_status`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_siswa_status` AS SELECT 
	ss.*, 
	ta.ta
FROM siswa_status ss
LEFT JOIN ta ON ta.ta_id = ss.ta_id ;

-- Dumping structure for view sikes.v_tarif_nilai
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `v_tarif_nilai`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_tarif_nilai` AS SELECT 
	tn.*, 
	ta.ta
FROM tarif_nilai tn
LEFT JOIN ta on ta.ta_id = tn.ta_id ;

-- Dumping structure for view sikes.v_tarif_tipe
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `v_tarif_tipe`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_tarif_tipe` AS SELECT 
	tt.*, 
	typ.transaction_type
FROM tarif_tipe tt
LEFT JOIN transaction_type typ ON tt.transaction_type_id = typ.transaction_type_id ;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;

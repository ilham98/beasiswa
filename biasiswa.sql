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


-- Dumping database structure for beasiswa
CREATE DATABASE IF NOT EXISTS `beasiswa` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `beasiswa`;

-- Dumping structure for table beasiswa.bank
CREATE TABLE IF NOT EXISTS `bank` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nim` char(8) DEFAULT NULL,
  `nama_bank` varchar(100) DEFAULT NULL,
  `nomor_rekening` varchar(20) DEFAULT NULL,
  `atas_nama` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=latin1;

-- Dumping data for table beasiswa.bank: ~30 rows (approximately)
/*!40000 ALTER TABLE `bank` DISABLE KEYS */;
INSERT INTO `bank` (`id`, `nim`, `nama_bank`, `nomor_rekening`, `atas_nama`) VALUES
	(7, '16621043', 'BRI', '44801007236507', 'AMELIA PUTRI DESTAMA SUFMA KASMO'),
	(8, '16651003', 'BRI', '457301004038507', 'NOR LINDA SEFTIANA'),
	(9, '16622042', 'BRI', '63001003542533', 'MUHAMMAD DIKI EFENDI'),
	(10, '16652019', 'BRI', '44801007095503', 'MUHAMAD AMIR ARIANDI'),
	(11, '15641028', 'BRI', '724401005422531', 'ANGGA SAPUTRA'),
	(12, '16610027', 'BRI', '44801013593507', 'SYAIFUL'),
	(13, '15642043', 'BRI', '716301005252532', 'RIDHO ABDUL ROFIQ'),
	(14, '16612027', 'BRI', '44801007566504', 'ANDHIKAWIJAYANTO'),
	(15, '17613022', 'BRI', '44801010117506', 'AHMAD NAUFAL ALFARISYI'),
	(16, '17643046', 'BRI', '44801010226509', 'TYAS YULIANING W'),
	(17, '16614038', 'BRI', '150201001583507', 'FITRI LATIFAH'),
	(18, '15644048', 'BRI', '44801007683500', 'SEKAR ISTIQOMAH'),
	(19, '16616003', 'BRI', '44801008540501', 'MUHAMMAD ADHITYA PRATAMA'),
	(20, '16619007', 'BRI', '62901003728530', 'MUHAMMAD FAJAR ILLAHI'),
	(21, '16620028', 'BRI', '718901011707533', 'LUKMAN NUL HAKIM'),
	(22, '16615038', 'BRI', '706501005464537', 'RIRIS KURNIA NINGSIH'),
	(23, '16645027', 'BRI', '44801007655507', 'FITRI AULIA BHAYANGKARI'),
	(24, '16623025', 'BRI', '456401019645536', 'YULIA CITRA PRISATANTI'),
	(25, '16623016', 'BRI', '44801007231507', 'NOVIA SRI WULANDARI'),
	(26, '16624035', 'BRI', '778801004291537', 'MUHAMMAD ASWAD'),
	(27, '16624047', 'BRI', '343501034597530', 'MEICA FRISTIKA'),
	(28, '16661020', 'BRI', '44801007309504', 'AULYA BELLA M'),
	(29, '16651039', 'BRI', '33301012177535', 'GINA SELVIANA'),
	(30, '16644024', 'BRI', '727201003359539', 'RIZKY WAHYU NUGROHO'),
	(31, '16641074', 'BRI', '323401022909539', 'MUHAMMAD ALFI BAHRUL FANANI'),
	(32, '15642017', 'BRI', '456501009738539', 'RIZQA ROHADATUL AISY'),
	(33, '16665042', 'BRI', '44801007587500', 'MUHAMMAD TRISNA ARYUNA'),
	(34, '15651055', 'BRI', '457301014088534', 'DIAN ARIFAH'),
	(35, '15644035', 'BRI', '44801006814506', 'HUSNUL KHOTIMAH'),
	(36, '16615009', 'BRI', '44801007388508', 'FIRDA AYU MELATI'),
	(37, '16615019', 'mantap', '2423423', 'Ilhams'),
	(38, '16615007', 'Endam Bank', '234723984', 'Endam');
/*!40000 ALTER TABLE `bank` ENABLE KEYS */;

-- Dumping structure for table beasiswa.beasiswa
CREATE TABLE IF NOT EXISTS `beasiswa` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) DEFAULT NULL,
  `donatur` varchar(50) DEFAULT NULL,
  `deskripsi` text,
  `tanggal_buka` date DEFAULT NULL,
  `tanggal_tutup` date DEFAULT NULL,
  `kuota` int(11) DEFAULT NULL,
  `ipk_min` float DEFAULT NULL,
  `syarat_ketentuan` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- Dumping data for table beasiswa.beasiswa: ~1 rows (approximately)
/*!40000 ALTER TABLE `beasiswa` DISABLE KEYS */;
INSERT INTO `beasiswa` (`id`, `nama`, `donatur`, `deskripsi`, `tanggal_buka`, `tanggal_tutup`, `kuota`, `ipk_min`, `syarat_ketentuan`) VALUES
	(5, 'PPA', 'Polnes', 'keren', '2019-08-25', '2019-08-30', 500, 4, 'manap'),
	(9, 'test', 'mantap', 'mantap', '2019-08-24', '2019-08-29', 500, 3, 'mantap');
/*!40000 ALTER TABLE `beasiswa` ENABLE KEYS */;

-- Dumping structure for table beasiswa.beasiswa_jurusan
CREATE TABLE IF NOT EXISTS `beasiswa_jurusan` (
  `beasiswa_id` int(11) unsigned,
  `kode_jurusan` varchar(8),
  KEY `FK_beasiswa_jurusan_beasiswa` (`beasiswa_id`),
  KEY `FK_beasiswa_jurusan_jurusan` (`kode_jurusan`),
  CONSTRAINT `FK_beasiswa_jurusan_beasiswa` FOREIGN KEY (`beasiswa_id`) REFERENCES `beasiswa` (`id`),
  CONSTRAINT `FK_beasiswa_jurusan_jurusan` FOREIGN KEY (`kode_jurusan`) REFERENCES `jurusan` (`kode`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table beasiswa.beasiswa_jurusan: ~0 rows (approximately)
/*!40000 ALTER TABLE `beasiswa_jurusan` DISABLE KEYS */;
/*!40000 ALTER TABLE `beasiswa_jurusan` ENABLE KEYS */;

-- Dumping structure for table beasiswa.beasiswa_mahasiswa
CREATE TABLE IF NOT EXISTS `beasiswa_mahasiswa` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nim` char(8) NOT NULL,
  `beasiswa_id` int(11) unsigned NOT NULL,
  `no_ktp` char(16) DEFAULT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `tempat_lahir` varchar(50) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `jenis_kelamin` enum('L','P') DEFAULT NULL,
  `no_telepon_rumah` varchar(50) DEFAULT NULL,
  `no_telepon_hp` varchar(50) DEFAULT NULL,
  `asal_kabupaten` varchar(50) DEFAULT NULL,
  `alamat_asal` text,
  `alamat_sekarang` text,
  `kode_program_studi` varchar(8) DEFAULT NULL,
  `ipk_t` float DEFAULT NULL,
  `semester` tinyint(4) DEFAULT NULL,
  `nama_bank` varchar(20) DEFAULT NULL,
  `nomor_rekening` varchar(20) DEFAULT NULL,
  `atas_nama` varchar(50) DEFAULT NULL,
  `nama_ayah` varchar(50) DEFAULT NULL,
  `nama_ibu` varchar(50) DEFAULT NULL,
  `pekerjaan_ayah` varchar(50) DEFAULT NULL,
  `pekerjaan_ibu` varchar(50) DEFAULT NULL,
  `penghasilan_orang_tua` int(11) DEFAULT NULL,
  `jumlah_tanggungan` int(11) DEFAULT NULL,
  `tahun` year(4) DEFAULT NULL,
  `tanggal_buat_berkas` date DEFAULT NULL,
  `tanggal_terima_berkas` date DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `konfirmasi` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_beasiswa_mahasiswa_program_studi` (`kode_program_studi`),
  KEY `FK_beasiswa_mahasiswa_mahasiswa` (`nim`),
  CONSTRAINT `FK_beasiswa_mahasiswa_mahasiswa` FOREIGN KEY (`nim`) REFERENCES `mahasiswa` (`nim`),
  CONSTRAINT `FK_beasiswa_mahasiswa_program_studi` FOREIGN KEY (`kode_program_studi`) REFERENCES `program_studi` (`kode`)
) ENGINE=InnoDB AUTO_INCREMENT=138 DEFAULT CHARSET=latin1;

-- Dumping data for table beasiswa.beasiswa_mahasiswa: ~30 rows (approximately)
/*!40000 ALTER TABLE `beasiswa_mahasiswa` DISABLE KEYS */;
INSERT INTO `beasiswa_mahasiswa` (`id`, `nim`, `beasiswa_id`, `no_ktp`, `nama`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `no_telepon_rumah`, `no_telepon_hp`, `asal_kabupaten`, `alamat_asal`, `alamat_sekarang`, `kode_program_studi`, `ipk_t`, `semester`, `nama_bank`, `nomor_rekening`, `atas_nama`, `nama_ayah`, `nama_ibu`, `pekerjaan_ayah`, `pekerjaan_ibu`, `penghasilan_orang_tua`, `jumlah_tanggungan`, `tahun`, `tanggal_buat_berkas`, `tanggal_terima_berkas`, `status`, `konfirmasi`) VALUES
	(107, '16621043', 5, '6472034612980000', 'Amelia Putri Destama Sufma Kasmo', 'Samarinda', '1998-12-06', 'P', NULL, '0823 5431 9982', '0823 5431 9982', 'Jl Aw Syahranie Komplek Perumahan Guru Sd No 89', 'Jl Sentosa Dalam 2a Gg 8 Rumah Paling Ujung', 'AKD3', 3.69, 3, 'BRI', '44801007236507', 'AMELIA PUTRI DESTAMA SUFMA KASMO', 'YUSUF HIDAYAT KASMO', 'NELMA', 'Lainnya', 'Lainnya', 3500000, 3, '2018', '2018-04-17', '2018-05-03', 0, 1),
	(108, '16651003', 5, '6472066507980000', 'Nor Linda Seftiana', 'Samarinda', '1998-07-25', 'P', NULL, '0853 9395 1055', '0853 9395 1055', 'Jl. P. Antasari Gg. Padat Karya Rt 30 No 74', 'Jl. P. Antasari Gg. Padat Karya Rt 30 No 74', 'AKS1', 3.74, 3, 'BRI', '457301004038507', 'NOR LINDA SEFTIANA', 'AHMADI', 'FAUZIAH AG', 'Pegawai Swasta', 'Lainnya', 1500000, 4, '2018', '2018-04-19', '2018-05-02', 0, 1),
	(109, '16622042', 5, '6471040412960000', 'Muhammad Diki Efendi', 'Madiun', '1996-12-04', 'L', NULL, '0823 5063 1475', '0823 5063 1475', 'Jl D.i. Panjaitan No.25 ', 'Jl Bung Tomo Perum Keledang Mas Baru Blok Bw', 'ABD3', 3.57, 3, 'BRI', '63001003542533', 'MUHAMMAD DIKI EFENDI', 'JUMADI', 'TITIN', 'Lainnya', 'Lainnya', 1500000, 5, '2018', '2018-04-22', '2018-05-02', 0, 1),
	(110, '16652019', 5, '6402030512970000', 'Muhamad Amir Ariandi', 'Sanga-sanga', '1997-12-05', 'L', NULL, '0812 5346 0046', '0812 5346 0046', 'Jl.sampai Hati Desa Tani Bhakti ', 'Jl.sampai Hati Desa Tani Bhakti', 'ABS1', 3.62, 3, 'BRI', '44801007095503', 'MUHAMAD AMIR ARIANDI', 'ALIANSYAH', 'SITI MARIAM', 'PNS / Pegawai Negara', 'Lainnya', 4700000, 3, '2018', '2018-04-24', '2018-04-24', 0, 1),
	(111, '15641028', 5, '6409030507960000', 'Angga Saputra', 'Rintik', '1996-07-05', 'L', NULL, '0853 3297 7022', '0853 3297 7022', 'Jalan Manggis Des.rintik Kec.babulu', 'Jalan Dr Ciptomangunkusumu Kel.gunung Panjang. Samarinda Seerang', 'MESINS1', 3.63, 5, 'BRI', '724401005422531', 'ANGGA SAPUTRA', 'ABDUL HAMID', 'ELIS ERNAWATI', 'Petani / Nelayan', 'Petani / Nelayan', 1000000, 3, '2018', '2018-04-24', '2018-04-24', 0, 1),
	(112, '16610027', 5, '6402051012970000', 'Syaiful', 'Bosang', '1997-12-10', 'L', NULL, '0821 5346 3916', '0821 5346 3916', 'Jl. Plant 13 Bosang Rt 006 Desa Tanjung Limau Kecamatan Muara Badak Kabupaten Kutai Kartanegara', 'Jl Niaga 1 No 125 Rt 09 Simpang Pasir Palaran', 'ALATBERA', 3.56, 3, 'BRI', '44801013593507', 'SYAIFUL', 'SARIFUDDIN', 'RUGAYAH', 'Wiraswasta', 'Petani / Nelayan', 2500000, 5, '2018', '2018-04-18', '2018-05-03', 0, 1),
	(113, '15642043', 5, '6474020601970000', 'Yusrijal Shalih', 'Bontang', '1997-01-06', 'L', '54823940', '0857 5283 3906', '0857 5283 3906', 'Jl.p Antasari No 48 Rt 11, Berbas Pantai, Bontang', 'Jl.wolter Monginsidi No 22 Rt 17, Dadi Mulya, Samarinda', 'ELESTROS', 3.55, 5, 'BRI', '716301005252532', 'RIDHO ABDUL ROFIQ', 'SUGENG RIYADI', 'SUPRIHATIN', 'Pegawai Swasta', 'Lainnya', 2000000, 4, '2018', '2018-04-19', '2018-04-27', 0, 1),
	(114, '16612027', 5, '6402031008970000', 'Andhika Wijayanto', 'Samarinda', '1997-08-10', 'L', NULL, '0822 4007 5396', '0822 4007 5396', 'Jl. Karet, Blok E, Rt. 28, Desa Loa Janan Ulu, Kec. Loa Janan', 'Jl. Karet, Blok E, Rt. 28, Desa Loa Janan Ulu, Kec. Loa Janan', 'ELEKTROD', 3.58, 3, 'BRI', '44801007566504', 'ANDHIKAWIJAYANTO', 'HARYANTO', 'TRI PURWANINGSIH', 'Lainnya', 'Wiraswasta', 2000000, 4, '2018', '2018-04-25', '2018-05-03', 0, 1),
	(115, '17613022', 5, '647206071099005', 'Ahmad Naufal Alfarisyi', 'Samarinda', '1999-10-07', 'L', NULL, '0823 5271 127', '0823 5271 127', 'Samarinda, Sei Kunjang, Jl.kh. Mas Mansyur', 'Samarinda, Sei Kunjang, Jl.kh. Mas Mansyur', 'ELESTROS', 3.66, 1, 'BRI', '44801010117506', 'AHMAD NAUFAL ALFARISYI', 'ABDUL KADIR', 'NURBANI', 'Pegawai Swasta', 'Lainnya', 2442180, 2, '2018', '2018-04-16', '2018-05-03', 0, 1),
	(116, '17643046', 5, '6472045107990000', 'Tyas Yulianing Wulandari', 'Samarinda', '1999-07-11', 'P', NULL, '0813 5149 4544', '0813 5149 4544', 'Jalan Sejati 2 Blok.a No.04 Rt.01 Kelurahan Sambutan, Kecamatan Sambutan', 'Jalan Sejati 2 Blok.a No.04 Rt.01 Kelurahan Sambutan, Kecamatan Sambutan', 'SIPILS1', 3.57, 1, 'BRI', '44801010226509', 'TYAS YULIANING W', 'HARIYADI', 'YULIATI', 'Lainnya', 'Lainnya', 150, 2, '2018', '2018-04-18', '2018-04-23', 0, 1),
	(117, '16614038', 5, '6474024802980000', 'Fitri Latifah', 'Bontang', '1998-02-08', 'P', NULL, '0821 5456 3585', '0821 5456 3585', 'Jl. Sutan Syahrir Rt 05 No 06 Tanjung Laut Indah Bontang Selatan, Kota Bontang', 'Jl. Ciptomangunkusumo Rt 04 No 01 Perum Telkom Samarinda Seberang', 'TEKIMD3', 3.42, 3, 'BRI', '150201001583507', 'FITRI LATIFAH', 'SAHIDE NAWING ( ALM)', 'NURISAH', 'Lainnya', 'Wiraswasta', 1500000, 11, '2018', '2018-04-18', '2018-05-03', 0, 1),
	(118, '15644048', 5, '6471015001970000', 'Sekar Istiqomah', 'Samarinda', '1997-04-10', 'P', NULL, '0821 5480 2575', '0821 5480 2575', 'Jl. A.m Parikesit No.28 Rt12 Loa Janan Ulu', 'Jl. A.m Parikesit No.28 Rt12 Loa Janan Ulu', 'TEKIMS1', 3.62, 5, 'BRI', '44801007683500', 'SEKAR ISTIQOMAH', 'SUYATMO', 'ALM. SUKOWATI', 'Wiraswasta', 'Lainnya', 1500000, 2, '2018', '2018-04-19', '2018-05-03', 0, 1),
	(119, '16616003', 5, '6472031204980000', 'Muhammad Adhitya Pratama', 'Samarinda', '1998-04-12', 'L', NULL, '0822 5588 6658', '0822 5588 6658', 'Jln. K.s Tubun Rt 09 No. 09', 'Jln. K.s Tubun Rt 09 No. 09', 'DESPRO', 3.81, 3, 'BRI', '44801008540501', 'MUHAMMAD ADHITYA PRATAMA', 'MUHAMMAD DAYS', 'PAITY HANIFAH', 'Lainnya', 'Pegawai Swasta', 2962458, 1, '2018', '2018-04-19', '2018-05-03', 0, 1),
	(120, '16619007', 5, '6472040105980000', 'Muhammad Fajar Illahi', 'Blitar Jawa Timur', '1998-05-01', 'L', NULL, '0821 2262 8725', '0821 2262 8725', 'Perum Pkl Blok D Rt 23 No 108', 'Perun Pkl Blok D Rt 23 No 90', 'ARSI', 3.48, 3, 'BRI', '62901003728530', 'MUHAMMAD FAJAR ILLAHI', 'TONY ARI SANDRI', 'SRI WAHYUNI HANDAYANI', 'Pegawai Swasta', 'Lainnya', 2000000, 1, '2018', '2018-04-23', '2018-05-03', 0, 1),
	(121, '16620028', 5, '6402072603980000', 'Lukman Nul Hakim', 'Banjarmasin', '1998-03-26', 'L', NULL, '0853 4836 1438', '0853 4836 1438', 'Jln Mulawarman Rt 16 Desa Sumber Sari Kecamatan Sebulu Kabupaten Kutai Kartanegara', 'Jln Apt. Pranoto Rt 16 Rapak Dalam, Samarinda Seberang', 'TK', 3.85, 3, 'BRI', '718901011707533', 'LUKMAN NUL HAKIM', 'YONI HADI', 'SUMIATI', 'Wiraswasta', 'Lainnya', 3000000, 3, '2018', '2018-04-23', '2018-05-02', 0, 1),
	(122, '16615038', 5, '6474015406980000', 'Riris Kurnia Ningsih', 'Bontang', '1998-07-14', 'L', NULL, '0821 5321 4588', '0821 5321 4588', 'Jl. Mulawarman Rt 06 Salebba Kelurahan Bontang Baru Kecamatan Bontang Utara', 'Jl. Dr. Ciptomangunkusumo Gg. Ikhlas Rt. 33/ Rw.07 ', 'TI', 3.85, 3, 'BRI', '706501005464537', 'RIRIS KURNIA NINGSIH', 'SYAMSUDDIN', 'YASRINI', 'Wiraswasta', 'Lainnya', 1200000, 3, '2018', '2018-05-03', '2018-05-03', 0, 1),
	(123, '16645027', 5, '3578136002970000', 'Fitri Aulia Bhayangkari', 'Bangkalan', '1997-02-20', 'P', NULL, '0857 5025 6038', '0857 5025 6038', 'Jl. Kh. Harun Nafsi Perum Gemilang Blok A/51', 'Asrama Polisi Loa Janan', 'TIM', 3.56, 3, 'BRI', '44801007655507', 'FITRI AULIA BHAYANGKARI', 'KASIYONO', 'SURYANI', 'Anggota TNI/POLRI', 'Lainnya', 6600000, 3, '2018', '2018-04-16', '2018-05-03', 0, 1),
	(124, '16623025', 5, '6472065207980000', 'Yulia Citra Prisatanti', 'Samarinda', '1998-07-12', 'L', NULL, '0812 5376 2008', '0812 5376 2008', 'Jl Cendana Gg 8 No 35 Rt 09', 'Jl Cendana Gg 8 No 35 Rt 09', 'PARIWISA', 3.49, 3, 'BRI', '456401019645536', 'YULIA CITRA PRISATANTI', 'SUGANTIYO', 'JUWARIYAH', 'Pegawai Swasta', 'Lainnya', 2000000, 3, '2018', '2018-05-02', '2018-05-02', 0, 1),
	(125, '16623016', 5, '6472035510970000', 'Novia Sri Wulandari', 'Samarinda', '1997-10-15', 'L', NULL, '0853 4694 62614', '0853 4694 62614', 'Jl.ks. Tubun Dalam Gg.wiratirta Rt.18 No.101', 'Jl.ks. Tubun Dalam Gg.wiratirta  Rt.18 No.101', 'PARIWISA', 3.86, 3, 'BRI', '44801007231507', 'NOVIA SRI WULANDARI', 'NURJALI', 'SUMRIYAH', 'Wiraswasta', 'Lainnya', 2250000, 3, '2018', '2018-05-03', '2018-05-03', 0, 1),
	(126, '16624035', 5, '6403050908980000', 'Muhammad Aswad', 'Wajo', '1998-09-07', 'L', NULL, '0812 4150 1592', '0812 4150 1592', 'Jl.gatot Subroto', 'Jl.kh Wahid Hasyim', 'KPNK', 3.67, 3, 'BRI', '778801004291537', 'MUHAMMAD ASWAD', 'USMAN CUKKE', 'SURIANTI', 'Petani / Nelayan', 'Lainnya', 1500000, 4, '2018', '2018-04-27', '2018-05-02', 0, 1),
	(127, '16624047', 5, '7324104305990000', 'Meica Pristika', 'Tator', '1999-05-03', 'P', NULL, '0851 4588 6314', '0851 4588 6314', 'Jl.trans Sulawesi, Rt.001, Desa.manunggal, Kec.tomoni Timur', 'Jl.ekonomi, Rt.12, Kel.loa Buah, Kec.sungai Kunjang', 'KPNK', 3.58, 3, 'BRI', '343501034597530', 'MEICA FRISTIKA', 'YOHANIS PONGKIDING', 'METY SELLU BUNGA', 'Petani / Nelayan', 'Lainnya', 1000000, 4, '2018', '2018-04-18', '2018-05-03', 0, 1),
	(128, '16661020', 5, '6472025905980000', 'Aulya Bella Marinda', 'Banjarmasin', '1998-05-19', 'P', NULL, '0812 5514 014', '0812 5514 014', 'Jln. Bung Tomo. Pkmb Blok Bq No 54', 'Jln. Bung Tomo. Pkmb Bq No 54', 'PERBANKA', 3.87, 3, 'BRI', '44801007309504', 'AULYA BELLA M', 'ADRIANSYAH', 'RELYA SARNITA', 'Pegawai Swasta', 'Lainnya', 5000000, 3, '2018', '2018-04-16', '2018-04-23', 0, 1),
	(129, '16651039', 5, '6474015101980000', 'Gina Selviana', 'Bontang', '1998-01-11', 'P', NULL, '0852 5234 0206', '0852 5234 0206', 'Jl. K.s. Tubun Rt. 16 Kel. Bontang Kuala Kec. Bontang Utara Kota Bontang', 'Jl. Sam Ratulangi No. 38 Rt. 05 Kel. Gunung Panjang Kec. Samarinda Seberang', 'AKS1', 3.91, 3, 'BRI', '33301012177535', 'GINA SELVIANA', 'SANGAJI', 'MARDIANA', 'Wiraswasta', 'Lainnya', 3000000, 2, '2018', '2018-04-16', '2018-04-27', 0, 1),
	(130, '16644024', 5, '6471042811970000', 'Rizky Wahyu Nugroho', 'Balikpapan', '1997-11-28', 'L', '542750294', '0813 4712 6387', '0813 4712 6387', 'Jl. Nusa Indah Rt. 36 No. 33, Kelurahan Gunung Sari Ilir, Kecamatan Balikpapan Tengah, Kota Balikpapan', 'Jl. Ciptomangunkusumo Rt. 2 No. 7, Kelurahan Harapan Baru, Kecamatan Los Janan Ilir', 'TEKIMS1', 3.62, 3, 'BRI', '727201003359539', 'RIZKY WAHYU NUGROHO', 'EDY SUMARNO', 'SUHARYANTINAH', 'Pegawai Swasta', 'Lainnya', 5000500, 4, '2018', '2018-04-16', '2018-05-02', 0, 1),
	(131, '16641074', 5, '6474021605980000', 'Muhammad Alfi Bahrul Fanani', 'Bontang', '1998-05-16', 'L', NULL, '0822 1715 0416', '0822 1715 0416', 'Jl. Kenangan Rt.30, No.38, Kec. Bontang Selatan, Kel. Tanjung Laut, Bontang.', 'Jl. Apt. Pranoto, Kel. Sei Kledang, Perum. Bukit Pinang Bahari Blok D9, No. 04 Rt.36', 'MESINS1', 3.6, 3, 'BRI', '323401022909539', 'MUHAMMAD ALFI BAHRUL FANANI', 'MOCH.SAECHONI', 'ZUMROTUL MUFIDAH', 'Lainnya', 'Lainnya', 3700000, 2, '2018', '2018-04-16', '2018-05-03', 0, 1),
	(132, '15642017', 5, '6402046909970000', 'Rizqa Rohadatul Aisy', 'Samarinda', '1997-09-29', 'P', NULL, '0857 5154 1670', '0857 5154 1670', 'Jl. Kenanga Rt 007 No. 086 Wonosari, Sidomulyo, Anggana, Kutai Kartanegara', 'Jl. Kenanga Rt 007 No. 086 Wonosari, Sidomulyo, Anggana, Kutai Kartanegara', 'ELEKTROD', 3.81, 5, 'BRI', '456501009738539', 'RIZQA ROHADATUL AISY', 'NUR WALIDAIN', 'SITI LESTARI', 'Lainnya', 'Lainnya', 2300000, 5, '2018', '2018-04-17', '2018-04-25', 0, 1),
	(133, '16665042', 5, '6472062101990000', 'Muhammad Trisna Aryuna', 'Samarinda', '1999-01-21', 'L', NULL, '0852 5070 7581', '0852 5070 7581', 'Jl. Cendana Gg. 11 Rt. 09 No. 27 Kel. Karang Anyar Kec. Sungai Kunjang', 'Jl. Cendana Gg. 11 Rt. 09 No. 27 Kel. Karang Anyar Kec. Sungai Kunjang', 'TIM', 3.82, 3, 'BRI', '44801007587500', 'MUHAMMAD TRISNA ARYUNA', 'MAHARDIAN', 'YUYUN YUNIARSIH', 'PNS / Pegawai Negara', 'Lainnya', 3800000, 2, '2018', '2018-04-17', '2018-05-03', 0, 1),
	(134, '15651055', 5, '6472055812960000', 'Arisanti Nurfadillah', 'Samarinda', '1996-12-18', 'P', NULL, '0812 5612 654', '0812 5612 654', 'Jl. Pm Noor Perum Rapak Binuang Blok Bd No. 17 Rt 28, Sempaja Selatan, Samarinda Utara', 'Jl. Pm Noor Perum Rapak Binuang Blok Bd No. 17 Rt 28, Sempaja Selatan, Samarinda Utara', 'AKS1', 3.68, 5, 'BRI', '457301014088534', 'DIAN ARIFAH', 'AGUS SANTOSO', 'DIAN ARIFAH', 'Pegawai Swasta', 'Lainnya', 5000000, 3, '2018', '2018-04-26', '2018-05-03', 0, 1),
	(135, '15644035', 5, '6472025807970000', 'Husnul Khotimah', 'Samarinda', '1997-07-18', 'P', NULL, '0852 4770 0820', '0852 4770 0820', 'Jalan Mangkupalas, Rt 14, No.60, Kelurahan Mesjid, Kecamatan Samarinda Seberang', 'Perumahan Bengkuring, Jalan Bengkuring Raya 2, Blok D, Jalan Pakis 7, No.338, Sempaja, Samarinda Utara', 'TEKIMS1', 3.69, 5, 'BRI', '44801006814506', 'HUSNUL KHOTIMAH', 'RIDUANSYAH', 'MU\'MIN', 'Lainnya', 'Lainnya', 1100000, 2, '2018', '2018-04-17', '2018-05-02', 0, 1),
	(136, '16615009', 5, '6402036208980000', 'Firda Ayu Melati', 'Tabalong', '1998-08-22', 'P', NULL, '0823 5371 5301', '0823 5371 5301', 'Jl. Karet Blok F Rt 028 Loa Janan Ulu, Kutai Kartanegara, Kalimantan Timur', 'Jl. Karet Blok F Rt 028 Loa Janan Ulu, Kutai Kartanegara, Kalimantan Timur', 'TI', 3.9, 3, 'BRI', '44801007388508', 'FIRDA AYU MELATI', 'MUHAMMAD SOBIRIN', 'AMSIAH', 'Pegawai Swasta', 'Lainnya', 3300000, 3, '2018', '2018-04-21', '2018-05-02', 0, 1),
	(137, '16615019', 5, '1234567890123456', 'Ilham', 'Bengalon', '2019-08-21', 'L', NULL, '082254773858', 'Bengalon', 'Bengalon', 'Bengalon', 'TI', 3.33333, 3, 'mantap', '2423423', 'Ilhams', 'Ilham', 'iLhamf', 'ILham', 'iLhamf', 1000000, 5, '2019', '2019-08-28', NULL, 0, 1);
/*!40000 ALTER TABLE `beasiswa_mahasiswa` ENABLE KEYS */;

-- Dumping structure for table beasiswa.berita
CREATE TABLE IF NOT EXISTS `berita` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `judul` varchar(100) NOT NULL,
  `isi` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- Dumping data for table beasiswa.berita: ~4 rows (approximately)
/*!40000 ALTER TABLE `berita` DISABLE KEYS */;
INSERT INTO `berita` (`id`, `judul`, `isi`, `created_at`, `updated_at`) VALUES
	(4, 'PENGUMUMAN BEASISWA PPA 2019', '<p>POLITEKNIK NEGERI SAMARINDA MENGINFORMASIKAN KEPADA SELURUH&nbsp; <strong>MAHASISWA </strong><strong>D3 </strong><strong>SEMESTER II</strong><strong>, I</strong><strong>V </strong><strong>UNTUK MAHASISWA D 4 SEMESTER : II, IV, VI &nbsp;MENGENAI KESEMPATAN BEASISWA PENINGKATAN PRESTASI AKADEMIK (PPA) TAHUN ANGGARAN 2019</strong></p><div class="itemFullText"><p>&nbsp;</p><p>PERSYARATAN BEASISWA PPA:</p><ol><li>MASIH AKTIF SEBAGAI MAHASISWA</li><li>DIUTAMAKAN DARI KALANGAN TIDAK MAMPU.</li><li><strong>IPK</strong> MINIMAL&nbsp; &nbsp;BIDANG&nbsp;<strong>TATA NIAGA</strong> ;&nbsp;<strong>3,50&nbsp; &nbsp; &nbsp; &nbsp; BIDANG REKAYASA : 3,20.</strong></li><li><strong>TIDAK </strong>MEMPEROLEH SURAT PERINGATAN .</li><li><strong>TIDAK </strong>SEDANG MENERIMA BEASISWA/BANTUAN DARI INSTANSI LAIN PADA WAKTU YANG BERSAMAAN.</li><li><strong>TIDAK </strong>TERLIBAT NARKOBA.</li></ol><p>BAGI YANG BERMINAT BISA MENDAFTAR WEBSITE<strong><em>&nbsp; <a href="http://beasiswa.polnes.ac.id">http://beasiswa.polnes.ac.id</a>&nbsp;&nbsp;</em>MULAI TANGGAL 12 JULI 2019 SAMPAI DENGAN 26 JULI 2019</strong></p><p>DOKUMEN PERMOHONAN BERKAS DIMASUKAN DALAM MAP DENGAN MENULISKAN JENIS BEASISWA, JURUSAN, NAMA, NIM &amp; SEMESTER DENGAN JELAS MENGGUNAKAN SPIDOL HITAM DI DEPAN MAP</p><p>DENGAN MELAMPIRKAN PERSYARATAN SEBAGAI BERIKUT:</p><ol><li>FOTO COPY KTM.</li><li>SURAT KETERANGAN PENGHASILAN ORANG TUA/SLIP GAJI YANG DIKETAHUI OLEH YANG BERWENANG BAGI PNS/KARYAWAN ATAU SURAT KETERANGAN KURANG MAMPU DARI LURAH/KEPALA DESA TEMPAT DOMISILI ORANG TUA/WALI.</li><li>PERMOHONAN TERTULIS KEPADA DIREKTUR POLITEKNIK NEGERI SAMARINDA CQ. WAKIL DIREKTUR III</li><li>SURAT PERNYATAAN TIDAK SEDANG MENERIMA BEASISWA/BANTUAN DARI INSTANSI LAIN PADA WAKTU YANG BERSAMAAN.</li><li>SURAT KETERANGAN TIDAK MENDAPAT SP DARI JURUSAN.</li><li>TRANSKRIP NILAI YANG DISAHKAN OLEH JURUSAN</li><li>FOTO COPY KARTU KELUARGA.</li><li>FOTO COPY SLIP SPP TERAKHIR</li></ol><p>PENERIMAAN BERKAS MULAI TANGGAL 15 JULI &nbsp;2019 SAMPAI DENGAN 26 JULI 2018 DI BAGIAN KEMAHASISWAAN</p><p>BERKAS YANG PERSYARATANNYA TIDAK LENGKAP <strong>TIDAK AKAN DIPROSES</strong>.</p><p>UNTUK HAL - HAL YANG KURANG JELAS DAPAT MENGHUBUNGI PUDIR III ATAU BAGIAN KEMAHASISWAAN.</p><p>ATAS PERHATIAN SAUDARA KAMI UCAPKAN TERIMA KASIH.</p><p>&nbsp;</p><p><strong>SAMARINDA, 12 JULI 2019</strong></p><p><strong>WAKIL DIREKTUR &nbsp;KEMAHASISWAAN</strong></p><p><strong>&nbsp;</strong></p><p><strong>&nbsp;</strong><strong>&nbsp;</strong></p><p><strong>SAID KELIWAR,</strong><strong> S.ST.PAR, M.SC</strong></p><p><strong>NIP 19770905 200212 1001</strong></p></div>', '2019-08-27 15:55:31', '2019-08-27 15:55:31'),
	(5, 'PENGUMUMAN BEASISWA PPA 2019', '<p>POLITEKNIK NEGERI SAMARINDA MENGINFORMASIKAN KEPADA SELURUH&nbsp; <strong>MAHASISWA </strong><strong>D3 </strong><strong>SEMESTER II</strong><strong>, I</strong><strong>V </strong><strong>UNTUK MAHASISWA D 4 SEMESTER : II, IV, VI &nbsp;MENGENAI KESEMPATAN BEASISWA PENINGKATAN PRESTASI AKADEMIK (PPA) TAHUN ANGGARAN 2019</strong></p><div class="itemFullText"><p>&nbsp;</p><p>PERSYARATAN BEASISWA PPA:</p><ol><li>MASIH AKTIF SEBAGAI MAHASISWA</li><li>DIUTAMAKAN DARI KALANGAN TIDAK MAMPU.</li><li><strong>IPK</strong> MINIMAL&nbsp; &nbsp;BIDANG&nbsp;<strong>TATA NIAGA</strong> ;&nbsp;<strong>3,50&nbsp; &nbsp; &nbsp; &nbsp; BIDANG REKAYASA : 3,20.</strong></li><li><strong>TIDAK </strong>MEMPEROLEH SURAT PERINGATAN .</li><li><strong>TIDAK </strong>SEDANG MENERIMA BEASISWA/BANTUAN DARI INSTANSI LAIN PADA WAKTU YANG BERSAMAAN.</li><li><strong>TIDAK </strong>TERLIBAT NARKOBA.</li></ol><p>BAGI YANG BERMINAT BISA MENDAFTAR WEBSITE<strong><em>&nbsp; <a href="http://beasiswa.polnes.ac.id">http://beasiswa.polnes.ac.id</a>&nbsp;&nbsp;</em>MULAI TANGGAL 12 JULI 2019 SAMPAI DENGAN 26 JULI 2019</strong></p><p>DOKUMEN PERMOHONAN BERKAS DIMASUKAN DALAM MAP DENGAN MENULISKAN JENIS BEASISWA, JURUSAN, NAMA, NIM &amp; SEMESTER DENGAN JELAS MENGGUNAKAN SPIDOL HITAM DI DEPAN MAP</p><p>DENGAN MELAMPIRKAN PERSYARATAN SEBAGAI BERIKUT:</p><ol><li>FOTO COPY KTM.</li><li>SURAT KETERANGAN PENGHASILAN ORANG TUA/SLIP GAJI YANG DIKETAHUI OLEH YANG BERWENANG BAGI PNS/KARYAWAN ATAU SURAT KETERANGAN KURANG MAMPU DARI LURAH/KEPALA DESA TEMPAT DOMISILI ORANG TUA/WALI.</li><li>PERMOHONAN TERTULIS KEPADA DIREKTUR POLITEKNIK NEGERI SAMARINDA CQ. WAKIL DIREKTUR III</li><li>SURAT PERNYATAAN TIDAK SEDANG MENERIMA BEASISWA/BANTUAN DARI INSTANSI LAIN PADA WAKTU YANG BERSAMAAN.</li><li>SURAT KETERANGAN TIDAK MENDAPAT SP DARI JURUSAN.</li><li>TRANSKRIP NILAI YANG DISAHKAN OLEH JURUSAN</li><li>FOTO COPY KARTU KELUARGA.</li><li>FOTO COPY SLIP SPP TERAKHIR</li></ol><p>PENERIMAAN BERKAS MULAI TANGGAL 15 JULI &nbsp;2019 SAMPAI DENGAN 26 JULI 2018 DI BAGIAN KEMAHASISWAAN</p><p>BERKAS YANG PERSYARATANNYA TIDAK LENGKAP <strong>TIDAK AKAN DIPROSES</strong>.</p><p>UNTUK HAL - HAL YANG KURANG JELAS DAPAT MENGHUBUNGI PUDIR III ATAU BAGIAN KEMAHASISWAAN.</p><p>ATAS PERHATIAN SAUDARA KAMI UCAPKAN TERIMA KASIH.</p><p>&nbsp;</p><p><strong>SAMARINDA, 12 JULI 2019</strong></p><p><strong>WAKIL DIREKTUR &nbsp;KEMAHASISWAAN</strong></p><p><strong>&nbsp;</strong></p><p><strong>&nbsp;</strong><strong>&nbsp;</strong></p><p><strong>SAID KELIWAR,</strong><strong> S.ST.PAR, M.SC</strong></p><p><strong>NIP 19770905 200212 1001</strong></p></div>', '2019-08-27 15:55:31', '2019-08-27 15:55:31'),
	(6, 'PENGUMUMAN BEASISWA PPA 2019', '<p>POLITEKNIK NEGERI SAMARINDA MENGINFORMASIKAN KEPADA SELURUH&nbsp; <strong>MAHASISWA </strong><strong>D3 </strong><strong>SEMESTER II</strong><strong>, I</strong><strong>V </strong><strong>UNTUK MAHASISWA D 4 SEMESTER : II, IV, VI &nbsp;MENGENAI KESEMPATAN BEASISWA PENINGKATAN PRESTASI AKADEMIK (PPA) TAHUN ANGGARAN 2019</strong></p><div class="itemFullText"><p>&nbsp;</p><p>PERSYARATAN BEASISWA PPA:</p><ol><li>MASIH AKTIF SEBAGAI MAHASISWA</li><li>DIUTAMAKAN DARI KALANGAN TIDAK MAMPU.</li><li><strong>IPK</strong> MINIMAL&nbsp; &nbsp;BIDANG&nbsp;<strong>TATA NIAGA</strong> ;&nbsp;<strong>3,50&nbsp; &nbsp; &nbsp; &nbsp; BIDANG REKAYASA : 3,20.</strong></li><li><strong>TIDAK </strong>MEMPEROLEH SURAT PERINGATAN .</li><li><strong>TIDAK </strong>SEDANG MENERIMA BEASISWA/BANTUAN DARI INSTANSI LAIN PADA WAKTU YANG BERSAMAAN.</li><li><strong>TIDAK </strong>TERLIBAT NARKOBA.</li></ol><p>BAGI YANG BERMINAT BISA MENDAFTAR WEBSITE<strong><em>&nbsp; <a href="http://beasiswa.polnes.ac.id">http://beasiswa.polnes.ac.id</a>&nbsp;&nbsp;</em>MULAI TANGGAL 12 JULI 2019 SAMPAI DENGAN 26 JULI 2019</strong></p><p>DOKUMEN PERMOHONAN BERKAS DIMASUKAN DALAM MAP DENGAN MENULISKAN JENIS BEASISWA, JURUSAN, NAMA, NIM &amp; SEMESTER DENGAN JELAS MENGGUNAKAN SPIDOL HITAM DI DEPAN MAP</p><p>DENGAN MELAMPIRKAN PERSYARATAN SEBAGAI BERIKUT:</p><ol><li>FOTO COPY KTM.</li><li>SURAT KETERANGAN PENGHASILAN ORANG TUA/SLIP GAJI YANG DIKETAHUI OLEH YANG BERWENANG BAGI PNS/KARYAWAN ATAU SURAT KETERANGAN KURANG MAMPU DARI LURAH/KEPALA DESA TEMPAT DOMISILI ORANG TUA/WALI.</li><li>PERMOHONAN TERTULIS KEPADA DIREKTUR POLITEKNIK NEGERI SAMARINDA CQ. WAKIL DIREKTUR III</li><li>SURAT PERNYATAAN TIDAK SEDANG MENERIMA BEASISWA/BANTUAN DARI INSTANSI LAIN PADA WAKTU YANG BERSAMAAN.</li><li>SURAT KETERANGAN TIDAK MENDAPAT SP DARI JURUSAN.</li><li>TRANSKRIP NILAI YANG DISAHKAN OLEH JURUSAN</li><li>FOTO COPY KARTU KELUARGA.</li><li>FOTO COPY SLIP SPP TERAKHIR</li></ol><p>PENERIMAAN BERKAS MULAI TANGGAL 15 JULI &nbsp;2019 SAMPAI DENGAN 26 JULI 2018 DI BAGIAN KEMAHASISWAAN</p><p>BERKAS YANG PERSYARATANNYA TIDAK LENGKAP <strong>TIDAK AKAN DIPROSES</strong>.</p><p>UNTUK HAL - HAL YANG KURANG JELAS DAPAT MENGHUBUNGI PUDIR III ATAU BAGIAN KEMAHASISWAAN.</p><p>ATAS PERHATIAN SAUDARA KAMI UCAPKAN TERIMA KASIH.</p><p>&nbsp;</p><p><strong>SAMARINDA, 12 JULI 2019</strong></p><p><strong>WAKIL DIREKTUR &nbsp;KEMAHASISWAAN</strong></p><p><strong>&nbsp;</strong></p><p><strong>&nbsp;</strong><strong>&nbsp;</strong></p><p><strong>SAID KELIWAR,</strong><strong> S.ST.PAR, M.SC</strong></p><p><strong>NIP 19770905 200212 1001</strong></p></div>', '2019-08-27 15:55:31', '2019-08-27 15:55:31'),
	(7, 'PENGUMUMAN BEASISWA PPA 2019', '<p>POLITEKNIK NEGERI SAMARINDA MENGINFORMASIKAN KEPADA SELURUH&nbsp; <strong>MAHASISWA </strong><strong>D3 </strong><strong>SEMESTER II</strong><strong>, I</strong><strong>V </strong><strong>UNTUK MAHASISWA D 4 SEMESTER : II, IV, VI &nbsp;MENGENAI KESEMPATAN BEASISWA PENINGKATAN PRESTASI AKADEMIK (PPA) TAHUN ANGGARAN 2019</strong></p><div class="itemFullText"><p>&nbsp;</p><p>PERSYARATAN BEASISWA PPA:</p><ol><li>MASIH AKTIF SEBAGAI MAHASISWA</li><li>DIUTAMAKAN DARI KALANGAN TIDAK MAMPU.</li><li><strong>IPK</strong> MINIMAL&nbsp; &nbsp;BIDANG&nbsp;<strong>TATA NIAGA</strong> ;&nbsp;<strong>3,50&nbsp; &nbsp; &nbsp; &nbsp; BIDANG REKAYASA : 3,20.</strong></li><li><strong>TIDAK </strong>MEMPEROLEH SURAT PERINGATAN .</li><li><strong>TIDAK </strong>SEDANG MENERIMA BEASISWA/BANTUAN DARI INSTANSI LAIN PADA WAKTU YANG BERSAMAAN.</li><li><strong>TIDAK </strong>TERLIBAT NARKOBA.</li></ol><p>BAGI YANG BERMINAT BISA MENDAFTAR WEBSITE<strong><em>&nbsp; <a href="http://beasiswa.polnes.ac.id">http://beasiswa.polnes.ac.id</a>&nbsp;&nbsp;</em>MULAI TANGGAL 12 JULI 2019 SAMPAI DENGAN 26 JULI 2019</strong></p><p>DOKUMEN PERMOHONAN BERKAS DIMASUKAN DALAM MAP DENGAN MENULISKAN JENIS BEASISWA, JURUSAN, NAMA, NIM &amp; SEMESTER DENGAN JELAS MENGGUNAKAN SPIDOL HITAM DI DEPAN MAP</p><p>DENGAN MELAMPIRKAN PERSYARATAN SEBAGAI BERIKUT:</p><ol><li>FOTO COPY KTM.</li><li>SURAT KETERANGAN PENGHASILAN ORANG TUA/SLIP GAJI YANG DIKETAHUI OLEH YANG BERWENANG BAGI PNS/KARYAWAN ATAU SURAT KETERANGAN KURANG MAMPU DARI LURAH/KEPALA DESA TEMPAT DOMISILI ORANG TUA/WALI.</li><li>PERMOHONAN TERTULIS KEPADA DIREKTUR POLITEKNIK NEGERI SAMARINDA CQ. WAKIL DIREKTUR III</li><li>SURAT PERNYATAAN TIDAK SEDANG MENERIMA BEASISWA/BANTUAN DARI INSTANSI LAIN PADA WAKTU YANG BERSAMAAN.</li><li>SURAT KETERANGAN TIDAK MENDAPAT SP DARI JURUSAN.</li><li>TRANSKRIP NILAI YANG DISAHKAN OLEH JURUSAN</li><li>FOTO COPY KARTU KELUARGA.</li><li>FOTO COPY SLIP SPP TERAKHIR</li></ol><p>PENERIMAAN BERKAS MULAI TANGGAL 15 JULI &nbsp;2019 SAMPAI DENGAN 26 JULI 2018 DI BAGIAN KEMAHASISWAAN</p><p>BERKAS YANG PERSYARATANNYA TIDAK LENGKAP <strong>TIDAK AKAN DIPROSES</strong>.</p><p>UNTUK HAL - HAL YANG KURANG JELAS DAPAT MENGHUBUNGI PUDIR III ATAU BAGIAN KEMAHASISWAAN.</p><p>ATAS PERHATIAN SAUDARA KAMI UCAPKAN TERIMA KASIH.</p><p>&nbsp;</p><p><strong>SAMARINDA, 12 JULI 2019</strong></p><p><strong>WAKIL DIREKTUR &nbsp;KEMAHASISWAAN</strong></p><p><strong>&nbsp;</strong></p><p><strong>&nbsp;</strong><strong>&nbsp;</strong></p><p><strong>SAID KELIWAR,</strong><strong> S.ST.PAR, M.SC</strong></p><p><strong>NIP 19770905 200212 1001</strong></p></div>', '2019-08-27 15:55:31', '2019-08-27 15:55:31');
/*!40000 ALTER TABLE `berita` ENABLE KEYS */;

-- Dumping structure for table beasiswa.dokumen
CREATE TABLE IF NOT EXISTS `dokumen` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `beasiswa_id` int(11) unsigned NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `url` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_dokumen_beasiswa` (`beasiswa_id`),
  CONSTRAINT `FK_dokumen_beasiswa` FOREIGN KEY (`beasiswa_id`) REFERENCES `beasiswa` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table beasiswa.dokumen: ~2 rows (approximately)
/*!40000 ALTER TABLE `dokumen` DISABLE KEYS */;
INSERT INTO `dokumen` (`id`, `beasiswa_id`, `nama`, `url`) VALUES
	(1, 5, 'mantap', NULL),
	(2, 5, 'fsfsdf', '/uploads/dokumen/5d6456bd4dc6b.pdf');
/*!40000 ALTER TABLE `dokumen` ENABLE KEYS */;

-- Dumping structure for table beasiswa.dokumen_mahasiswa
CREATE TABLE IF NOT EXISTS `dokumen_mahasiswa` (
  `beasiswa_id` int(11) unsigned DEFAULT NULL,
  `nim` char(8) DEFAULT NULL,
  `tipe` int(11) DEFAULT NULL,
  `url` varchar(50) DEFAULT NULL,
  KEY `FK_dokumen_mahasiswa_beasiswa` (`beasiswa_id`),
  KEY `FK_dokumen_mahasiswa_mahasiswa` (`nim`),
  CONSTRAINT `FK_dokumen_mahasiswa_beasiswa` FOREIGN KEY (`beasiswa_id`) REFERENCES `beasiswa` (`id`),
  CONSTRAINT `FK_dokumen_mahasiswa_mahasiswa` FOREIGN KEY (`nim`) REFERENCES `mahasiswa` (`nim`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table beasiswa.dokumen_mahasiswa: ~13 rows (approximately)
/*!40000 ALTER TABLE `dokumen_mahasiswa` DISABLE KEYS */;
INSERT INTO `dokumen_mahasiswa` (`beasiswa_id`, `nim`, `tipe`, `url`) VALUES
	(5, '16615019', 2, '/uploads/dokumen_mahasiswa/5d65afe5019f2.pdf'),
	(5, '16615019', 3, '/uploads/dokumen_mahasiswa/5d65aff39a403.pdf'),
	(5, '16615019', 4, '/uploads/dokumen_mahasiswa/5d65affc0e03a.pdf'),
	(5, '16615019', 5, '/uploads/dokumen_mahasiswa/5d65b00574108.pdf'),
	(5, '16615019', 6, '/uploads/dokumen_mahasiswa/5d65b00d5520d.pdf'),
	(5, '16615019', 7, '/uploads/dokumen_mahasiswa/5d65b01704fa7.pdf'),
	(9, '16615007', 1, '/uploads/dokumen_mahasiswa/5d65e08e7b82e.pdf'),
	(9, '16615007', 2, '/uploads/dokumen_mahasiswa/5d65e09895779.pdf'),
	(9, '16615007', 3, '/uploads/dokumen_mahasiswa/5d65e0a381c3f.pdf'),
	(9, '16615007', 4, '/uploads/dokumen_mahasiswa/5d65e0aebf828.pdf'),
	(9, '16615007', 5, '/uploads/dokumen_mahasiswa/5d65e0bbbc47e.pdf'),
	(9, '16615007', 6, '/uploads/dokumen_mahasiswa/5d65e0c8d0b3c.pdf'),
	(9, '16615007', 7, '/uploads/dokumen_mahasiswa/5d65e0d19619b.pdf'),
	(5, '16615019', 1, '/uploads/dokumen_mahasiswa/5d65f4cf0f4da.pdf');
/*!40000 ALTER TABLE `dokumen_mahasiswa` ENABLE KEYS */;

-- Dumping structure for table beasiswa.ipk
CREATE TABLE IF NOT EXISTS `ipk` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nim` char(8) DEFAULT NULL,
  `nilai` float DEFAULT NULL,
  `semester` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_ipk_mahasiswa` (`nim`),
  CONSTRAINT `FK_ipk_mahasiswa` FOREIGN KEY (`nim`) REFERENCES `mahasiswa` (`nim`)
) ENGINE=InnoDB AUTO_INCREMENT=511 DEFAULT CHARSET=latin1;

-- Dumping data for table beasiswa.ipk: ~103 rows (approximately)
/*!40000 ALTER TABLE `ipk` DISABLE KEYS */;
INSERT INTO `ipk` (`id`, `nim`, `nilai`, `semester`) VALUES
	(346, '16621043', 3.71, 1),
	(347, '16621043', 3.65, 2),
	(348, '16621043', 3.72, 3),
	(349, '16651003', 3.6, 1),
	(350, '16651003', 3.91, 2),
	(351, '16651003', 3.71, 3),
	(352, '16622042', 3.63, 1),
	(353, '16622042', 3.48, 2),
	(354, '16622042', 3.61, 3),
	(355, '16652019', 3.76, 1),
	(356, '16652019', 3.56, 2),
	(357, '16652019', 3.53, 3),
	(358, '15641028', 3.6, 1),
	(359, '15641028', 3.41, 2),
	(360, '15641028', 3.68, 3),
	(361, '15641028', 3.64, 4),
	(362, '15641028', 3.83, 5),
	(363, '16610027', 3.62, 1),
	(364, '16610027', 3.8, 2),
	(365, '16610027', 3.25, 3),
	(366, '15642043', 3.59, 1),
	(367, '15642043', 3.74, 2),
	(368, '15642043', 3.31, 3),
	(369, '15642043', 3.65, 4),
	(370, '15642043', 3.47, 5),
	(371, '16612027', 3.5, 1),
	(372, '16612027', 3.61, 2),
	(373, '16612027', 3.62, 3),
	(374, '17613022', 3.66, 1),
	(375, '17643046', 3.57, 1),
	(376, '16614038', 3.29, 1),
	(377, '16614038', 3.5, 2),
	(378, '16614038', 3.48, 3),
	(379, '15644048', 3.69, 1),
	(380, '15644048', 3.65, 2),
	(381, '15644048', 3.67, 3),
	(382, '15644048', 3.47, 4),
	(383, '15644048', 3.63, 5),
	(384, '16616003', 3.8, 1),
	(385, '16616003', 3.91, 2),
	(386, '16616003', 3.73, 3),
	(387, '16619007', 3.82, 1),
	(388, '16619007', 3.44, 2),
	(389, '16619007', 3.17, 3),
	(390, '16620028', 4, 1),
	(391, '16620028', 3.81, 2),
	(392, '16620028', 3.74, 3),
	(393, '16615038', 3.73, 1),
	(394, '16615038', 3.93, 2),
	(395, '16615038', 3.88, 3),
	(396, '16645027', 3.61, 1),
	(397, '16645027', 3.65, 2),
	(398, '16645027', 3.43, 3),
	(399, '16623025', 3.44, 1),
	(400, '16623025', 3.44, 2),
	(401, '16623025', 3.6, 3),
	(402, '16623016', 3.91, 1),
	(403, '16623016', 3.9, 2),
	(404, '16623016', 3.76, 3),
	(405, '16624035', 3.32, 1),
	(406, '16624035', 3.78, 2),
	(407, '16624035', 3.9, 3),
	(408, '16624047', 3.65, 1),
	(409, '16624047', 3.18, 2),
	(410, '16624047', 3.92, 3),
	(411, '16661020', 3.88, 1),
	(412, '16661020', 3.88, 2),
	(413, '16661020', 3.84, 3),
	(414, '16651039', 3.95, 1),
	(415, '16651039', 3.93, 2),
	(416, '16651039', 3.85, 3),
	(417, '16644024', 3.43, 1),
	(418, '16644024', 3.69, 2),
	(419, '16644024', 3.73, 3),
	(420, '16641074', 3.66, 1),
	(421, '16641074', 3.64, 2),
	(422, '16641074', 3.49, 3),
	(423, '15642017', 3.8, 1),
	(424, '15642017', 3.8, 2),
	(425, '15642017', 3.75, 3),
	(426, '15642017', 3.73, 4),
	(427, '15642017', 3.97, 5),
	(428, '16665042', 3.98, 1),
	(429, '16665042', 3.68, 2),
	(430, '16665042', 3.8, 3),
	(431, '15651055', 3.47, 1),
	(432, '15651055', 3.95, 2),
	(433, '15651055', 3.41, 3),
	(434, '15651055', 3.85, 4),
	(435, '15651055', 3.7, 5),
	(436, '15644035', 3.85, 1),
	(437, '15644035', 3.79, 2),
	(438, '15644035', 3.68, 3),
	(439, '15644035', 3.52, 4),
	(440, '15644035', 3.63, 5),
	(441, '16615009', 3.9, 1),
	(442, '16615009', 3.95, 2),
	(443, '16615009', 3.85, 3),
	(504, '16615019', 3, 1),
	(505, '16615019', 4, 2),
	(506, '16615019', 3, 3),
	(507, '16615007', 3, 1),
	(508, '16615007', 3, 2),
	(509, '16615007', 2, 3),
	(510, '16615007', NULL, 4);
/*!40000 ALTER TABLE `ipk` ENABLE KEYS */;

-- Dumping structure for table beasiswa.jurusan
CREATE TABLE IF NOT EXISTS `jurusan` (
  `kode` varchar(8) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`kode`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table beasiswa.jurusan: ~9 rows (approximately)
/*!40000 ALTER TABLE `jurusan` DISABLE KEYS */;
INSERT INTO `jurusan` (`kode`, `nama`) VALUES
	('AB', 'Administrasi'),
	('AK', 'Akuntasi'),
	('DESAIN', 'Desain'),
	('MARITIM', 'Kemaritiman'),
	('PW', 'Pariwisata'),
	('TE', 'Teknik Elektro'),
	('TEKIM', 'Teknik Kimia'),
	('TI', 'Teknologi Informasi'),
	('TM', 'Teknik Mesin'),
	('TS', 'Teknik Sipil');
/*!40000 ALTER TABLE `jurusan` ENABLE KEYS */;

-- Dumping structure for table beasiswa.kriteria
CREATE TABLE IF NOT EXISTS `kriteria` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) DEFAULT NULL,
  `bobot` float DEFAULT NULL,
  `tipe` char(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Dumping data for table beasiswa.kriteria: ~4 rows (approximately)
/*!40000 ALTER TABLE `kriteria` DISABLE KEYS */;
INSERT INTO `kriteria` (`id`, `nama`, `bobot`, `tipe`) VALUES
	(1, 'Penghasilan Orang Tua', 0.25, 'C'),
	(2, 'Semester', 0.15, 'C'),
	(3, 'Jumlah Tanggungan', 0.2, 'B'),
	(4, 'Nilai (Berdasarkan IPK)', 0.4, 'B');
/*!40000 ALTER TABLE `kriteria` ENABLE KEYS */;

-- Dumping structure for table beasiswa.mahasiswa
CREATE TABLE IF NOT EXISTS `mahasiswa` (
  `nim` char(8) NOT NULL,
  `user_id` int(11) unsigned NOT NULL,
  `no_ktp` char(16) DEFAULT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `tempat_lahir` varchar(50) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `jenis_kelamin` enum('L','P') DEFAULT NULL,
  `no_telepon_rumah` varchar(50) DEFAULT NULL,
  `no_telepon_hp` varchar(50) DEFAULT NULL,
  `asal_kabupaten` varchar(50) DEFAULT NULL,
  `alamat_asal` text,
  `alamat_sekarang` text,
  `kode_program_studi` varchar(8) DEFAULT NULL,
  `ktm_url` varchar(191) DEFAULT NULL,
  PRIMARY KEY (`nim`),
  KEY `FK_mahasiswa_program_studi` (`kode_program_studi`),
  KEY `FK_mahasiswa_users` (`user_id`),
  CONSTRAINT `FK_mahasiswa_program_studi` FOREIGN KEY (`kode_program_studi`) REFERENCES `program_studi` (`kode`),
  CONSTRAINT `FK_mahasiswa_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table beasiswa.mahasiswa: ~31 rows (approximately)
/*!40000 ALTER TABLE `mahasiswa` DISABLE KEYS */;
INSERT INTO `mahasiswa` (`nim`, `user_id`, `no_ktp`, `nama`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `no_telepon_rumah`, `no_telepon_hp`, `asal_kabupaten`, `alamat_asal`, `alamat_sekarang`, `kode_program_studi`, `ktm_url`) VALUES
	('15641028', 11, '6409030507960000', 'Angga Saputra', 'Rintik', '1996-07-05', 'L', NULL, '0853 3297 7022', 'Kabupaten Penajam Paser Utara', 'Jalan Manggis Des.rintik Kec.babulu', 'Jalan Dr Ciptomangunkusumu Kel.gunung Panjang. Samarinda Seerang', 'MESINS1', NULL),
	('15642017', 32, '6402046909970000', 'Rizqa Rohadatul Aisy', 'Samarinda', '1997-09-29', 'P', NULL, '0857 5154 1670', 'Kabupaten Kutai Kartanegara', 'Jl. Kenanga Rt 007 No. 086 Wonosari, Sidomulyo, Anggana, Kutai Kartanegara', 'Jl. Kenanga Rt 007 No. 086 Wonosari, Sidomulyo, Anggana, Kutai Kartanegara', 'ELEKTROD', NULL),
	('15642043', 13, '6474020601970000', 'Yusrijal Shalih', 'Bontang', '1997-01-06', 'L', '54823940', '0857 5283 3906', 'Kota Samarinda', 'Jl.p Antasari No 48 Rt 11, Berbas Pantai, Bontang', 'Jl.wolter Monginsidi No 22 Rt 17, Dadi Mulya, Samarinda', 'ELESTROS', NULL),
	('15644035', 35, '6472025807970000', 'Husnul Khotimah', 'Samarinda', '1997-07-18', 'P', NULL, '0852 4770 0820', 'Kota Samarinda', 'Jalan Mangkupalas, Rt 14, No.60, Kelurahan Mesjid, Kecamatan Samarinda Seberang', 'Perumahan Bengkuring, Jalan Bengkuring Raya 2, Blok D, Jalan Pakis 7, No.338, Sempaja, Samarinda Utara', 'TEKIMS1', NULL),
	('15644048', 18, '6471015001970000', 'Sekar Istiqomah', 'Samarinda', '1997-04-10', 'P', NULL, '0821 5480 2575', 'Kutai Kartanegara', 'Jl. A.m Parikesit No.28 Rt12 Loa Janan Ulu', 'Jl. A.m Parikesit No.28 Rt12 Loa Janan Ulu', 'TEKIMS1', NULL),
	('15651055', 34, '6472055812960000', 'Arisanti Nurfadillah', 'Samarinda', '1996-12-18', 'P', NULL, '0812 5612 654', 'Kota Samarinda', 'Jl. Pm Noor Perum Rapak Binuang Blok Bd No. 17 Rt 28, Sempaja Selatan, Samarinda Utara', 'Jl. Pm Noor Perum Rapak Binuang Blok Bd No. 17 Rt 28, Sempaja Selatan, Samarinda Utara', 'AKS1', NULL),
	('16610027', 12, '6402051012970000', 'Syaiful', 'Bosang', '1997-12-10', 'L', NULL, '0821 5346 3916', 'Kota Samarinda', 'Jl. Plant 13 Bosang Rt 006 Desa Tanjung Limau Kecamatan Muara Badak Kabupaten Kutai Kartanegara', 'Jl Niaga 1 No 125 Rt 09 Simpang Pasir Palaran', 'ALATBERA', NULL),
	('16612027', 14, '6402031008970000', 'Andhika Wijayanto', 'Samarinda', '1997-08-10', 'L', NULL, '0822 4007 5396', 'Kutai Kartanegara', 'Jl. Karet, Blok E, Rt. 28, Desa Loa Janan Ulu, Kec. Loa Janan', 'Jl. Karet, Blok E, Rt. 28, Desa Loa Janan Ulu, Kec. Loa Janan', 'ELEKTROD', NULL),
	('16614038', 17, '6474024802980000', 'Fitri Latifah', 'Bontang', '1998-02-08', 'P', NULL, '0821 5456 3585', 'Kota Samarinda', 'Jl. Sutan Syahrir Rt 05 No 06 Tanjung Laut Indah Bontang Selatan, Kota Bontang', 'Jl. Ciptomangunkusumo Rt 04 No 01 Perum Telkom Samarinda Seberang', 'TEKIMD3', NULL),
	('16615007', 42, '2345617282716151', 'Endam', 'Medam', '1998-02-07', 'P', NULL, '274928347234', 'Disana', 'Disana', 'Disana', 'AKS1', '/uploads/ktm/5d65e02539972.pdf'),
	('16615009', 36, '6402036208980000', 'Firda Ayu Melati', 'Tabalong', '1998-08-22', 'P', NULL, '0823 5371 5301', 'Kabupaten Kutai Kartanegara', 'Jl. Karet Blok F Rt 028 Loa Janan Ulu, Kutai Kartanegara, Kalimantan Timur', 'Jl. Karet Blok F Rt 028 Loa Janan Ulu, Kutai Kartanegara, Kalimantan Timur', 'TI', NULL),
	('16615019', 41, '1234567890123456', 'Ilham', 'Bengalon', '2019-08-21', 'L', NULL, '082254773858', 'Bengalon', 'Bengalon', 'Bengalon', 'TI', '/mantap'),
	('16615038', 22, '6474015406980000', 'Riris Kurnia Ningsih', 'Bontang', '1998-07-14', 'L', NULL, '0821 5321 4588', 'Kota Samarinda', 'Jl. Mulawarman Rt 06 Salebba Kelurahan Bontang Baru Kecamatan Bontang Utara', 'Jl. Dr. Ciptomangunkusumo Gg. Ikhlas Rt. 33/ Rw.07 ', 'TI', NULL),
	('16616003', 19, '6472031204980000', 'Muhammad Adhitya Pratama', 'Samarinda', '1998-04-12', 'L', NULL, '0822 5588 6658', 'Kota Samarinda', 'Jln. K.s Tubun Rt 09 No. 09', 'Jln. K.s Tubun Rt 09 No. 09', 'DESPRO', NULL),
	('16619007', 20, '6472040105980000', 'Muhammad Fajar Illahi', 'Blitar Jawa Timur', '1998-05-01', 'L', NULL, '0821 2262 8725', 'Kota Samarinda', 'Perum Pkl Blok D Rt 23 No 108', 'Perun Pkl Blok D Rt 23 No 90', 'ARSI', NULL),
	('16620028', 21, '6402072603980000', 'Lukman Nul Hakim', 'Banjarmasin', '1998-03-26', 'L', NULL, '0853 4836 1438', 'Kota Samarinda', 'Jln Mulawarman Rt 16 Desa Sumber Sari Kecamatan Sebulu Kabupaten Kutai Kartanegara', 'Jln Apt. Pranoto Rt 16 Rapak Dalam, Samarinda Seberang', 'TK', NULL),
	('16621043', 7, '6472034612980000', 'Amelia Putri Destama Sufma Kasmo', 'Samarinda', '1998-12-06', 'P', NULL, '0823 5431 9982', 'Samarinda', 'Jl Aw Syahranie Komplek Perumahan Guru Sd No 89', 'Jl Sentosa Dalam 2a Gg 8 Rumah Paling Ujung', 'AKD3', NULL),
	('16622042', 9, '6471040412960000', 'Muhammad Diki Efendi', 'Madiun', '1996-12-04', 'L', NULL, '0823 5063 1475', 'Kota Balikpapan', 'Jl D.i. Panjaitan No.25 ', 'Jl Bung Tomo Perum Keledang Mas Baru Blok Bw', 'ABD3', NULL),
	('16623016', 25, '6472035510970000', 'Novia Sri Wulandari', 'Samarinda', '1997-10-15', 'L', NULL, '0853 4694 62614', 'Kota Samarinda', 'Jl.ks. Tubun Dalam Gg.wiratirta Rt.18 No.101', 'Jl.ks. Tubun Dalam Gg.wiratirta  Rt.18 No.101', 'PARIWISA', NULL),
	('16623025', 24, '6472065207980000', 'Yulia Citra Prisatanti', 'Samarinda', '1998-07-12', 'L', NULL, '0812 5376 2008', 'Kota Samarinda', 'Jl Cendana Gg 8 No 35 Rt 09', 'Jl Cendana Gg 8 No 35 Rt 09', 'PARIWISA', NULL),
	('16624035', 26, '6403050908980000', 'Muhammad Aswad', 'Wajo', '1998-09-07', 'L', NULL, '0812 4150 1592', 'Kabupaten Berau', 'Jl.gatot Subroto', 'Jl.kh Wahid Hasyim', 'KPNK', NULL),
	('16624047', 27, '7324104305990000', 'Meica Pristika', 'Tator', '1999-05-03', 'P', NULL, '0851 4588 6314', 'Kota Samarinda', 'Jl.trans Sulawesi, Rt.001, Desa.manunggal, Kec.tomoni Timur', 'Jl.ekonomi, Rt.12, Kel.loa Buah, Kec.sungai Kunjang', 'KPNK', NULL),
	('16641074', 31, '6474021605980000', 'Muhammad Alfi Bahrul Fanani', 'Bontang', '1998-05-16', 'L', NULL, '0822 1715 0416', 'Kota Bontang', 'Jl. Kenangan Rt.30, No.38, Kec. Bontang Selatan, Kel. Tanjung Laut, Bontang.', 'Jl. Apt. Pranoto, Kel. Sei Kledang, Perum. Bukit Pinang Bahari Blok D9, No. 04 Rt.36', 'MESINS1', NULL),
	('16644024', 30, '6471042811970000', 'Rizky Wahyu Nugroho', 'Balikpapan', '1997-11-28', 'L', '542750294', '0813 4712 6387', 'Balikpapan', 'Jl. Nusa Indah Rt. 36 No. 33, Kelurahan Gunung Sari Ilir, Kecamatan Balikpapan Tengah, Kota Balikpapan', 'Jl. Ciptomangunkusumo Rt. 2 No. 7, Kelurahan Harapan Baru, Kecamatan Los Janan Ilir', 'TEKIMS1', NULL),
	('16645027', 23, '3578136002970000', 'Fitri Aulia Bhayangkari', 'Bangkalan', '1997-02-20', 'P', NULL, '0857 5025 6038', 'Kota Samarinda', 'Jl. Kh. Harun Nafsi Perum Gemilang Blok A/51', 'Asrama Polisi Loa Janan', 'TIM', NULL),
	('16651003', 8, '6472066507980000', 'Nor Linda Seftiana', 'Samarinda', '1998-07-25', 'P', NULL, '0853 9395 1055', 'Samarinda', 'Jl. P. Antasari Gg. Padat Karya Rt 30 No 74', 'Jl. P. Antasari Gg. Padat Karya Rt 30 No 74', 'AKS1', NULL),
	('16651039', 29, '6474015101980000', 'Gina Selviana', 'Bontang', '1998-01-11', 'P', NULL, '0852 5234 0206', 'Samarinda', 'Jl. K.s. Tubun Rt. 16 Kel. Bontang Kuala Kec. Bontang Utara Kota Bontang', 'Jl. Sam Ratulangi No. 38 Rt. 05 Kel. Gunung Panjang Kec. Samarinda Seberang', 'AKS1', NULL),
	('16652019', 10, '6402030512970000', 'Muhamad Amir Ariandi', 'Sanga-sanga', '1997-12-05', 'L', NULL, '0812 5346 0046', 'Kabupaten Kutai Kartanegara', 'Jl.sampai Hati Desa Tani Bhakti ', 'Jl.sampai Hati Desa Tani Bhakti', 'ABS1', NULL),
	('16661020', 28, '6472025905980000', 'Aulya Bella Marinda', 'Banjarmasin', '1998-05-19', 'P', NULL, '0812 5514 014', 'Kota Samarinda', 'Jln. Bung Tomo. Pkmb Blok Bq No 54', 'Jln. Bung Tomo. Pkmb Bq No 54', 'PERBANKA', NULL),
	('16665042', 33, '6472062101990000', 'Muhammad Trisna Aryuna', 'Samarinda', '1999-01-21', 'L', NULL, '0852 5070 7581', 'Kota Samarinda', 'Jl. Cendana Gg. 11 Rt. 09 No. 27 Kel. Karang Anyar Kec. Sungai Kunjang', 'Jl. Cendana Gg. 11 Rt. 09 No. 27 Kel. Karang Anyar Kec. Sungai Kunjang', 'TIM', NULL),
	('17613022', 15, '647206071099005', 'Ahmad Naufal Alfarisyi', 'Samarinda', '1999-10-07', 'L', NULL, '0823 5271 127', 'Samarinda', 'Samarinda, Sei Kunjang, Jl.kh. Mas Mansyur', 'Samarinda, Sei Kunjang, Jl.kh. Mas Mansyur', 'ELESTROS', NULL),
	('17643046', 16, '6472045107990000', 'Tyas Yulianing Wulandari', 'Samarinda', '1999-07-11', 'P', NULL, '0813 5149 4544', 'Kota Samarinda', 'Jalan Sejati 2 Blok.a No.04 Rt.01 Kelurahan Sambutan, Kecamatan Sambutan', 'Jalan Sejati 2 Blok.a No.04 Rt.01 Kelurahan Sambutan, Kecamatan Sambutan', 'SIPILS1', NULL);
/*!40000 ALTER TABLE `mahasiswa` ENABLE KEYS */;

-- Dumping structure for table beasiswa.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table beasiswa.migrations: ~2 rows (approximately)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_resets_table', 1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Dumping structure for table beasiswa.normalisasi
CREATE TABLE IF NOT EXISTS `normalisasi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kriteria_id` int(11) unsigned DEFAULT NULL,
  `nim` char(8) DEFAULT NULL,
  `beasiswa_id` char(8) DEFAULT NULL,
  `nilai` float DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_normalisasi_kriteria` (`kriteria_id`),
  CONSTRAINT `FK_normalisasi_kriteria` FOREIGN KEY (`kriteria_id`) REFERENCES `kriteria` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1997 DEFAULT CHARSET=latin1;

-- Dumping data for table beasiswa.normalisasi: ~120 rows (approximately)
/*!40000 ALTER TABLE `normalisasi` DISABLE KEYS */;
INSERT INTO `normalisasi` (`id`, `kriteria_id`, `nim`, `beasiswa_id`, `nilai`) VALUES
	(1873, 1, '16621043', '5', 0.0000428571),
	(1874, 1, '16651003', '5', 0.0001),
	(1875, 1, '16622042', '5', 0.0001),
	(1876, 1, '16652019', '5', 0.0000319149),
	(1877, 1, '15641028', '5', 0.00015),
	(1878, 1, '16610027', '5', 0.00006),
	(1879, 1, '15642043', '5', 0.000075),
	(1880, 1, '16612027', '5', 0.000075),
	(1881, 1, '17613022', '5', 0.0000614205),
	(1882, 1, '17643046', '5', 1),
	(1883, 1, '16614038', '5', 0.0001),
	(1884, 1, '15644048', '5', 0.0001),
	(1885, 1, '16616003', '5', 0.0000506336),
	(1886, 1, '16619007', '5', 0.000075),
	(1887, 1, '16620028', '5', 0.00005),
	(1888, 1, '16615038', '5', 0.000125),
	(1889, 1, '16645027', '5', 0.0000227273),
	(1890, 1, '16623025', '5', 0.000075),
	(1891, 1, '16623016', '5', 0.0000666667),
	(1892, 1, '16624035', '5', 0.0001),
	(1893, 1, '16624047', '5', 0.00015),
	(1894, 1, '16661020', '5', 0.00003),
	(1895, 1, '16651039', '5', 0.00005),
	(1896, 1, '16644024', '5', 0.000029997),
	(1897, 1, '16641074', '5', 0.0000405405),
	(1898, 1, '15642017', '5', 0.0000652174),
	(1899, 1, '16665042', '5', 0.0000394737),
	(1900, 1, '15651055', '5', 0.00003),
	(1901, 1, '15644035', '5', 0.000136364),
	(1902, 1, '16615009', '5', 0.0000454545),
	(1903, 2, '16621043', '5', 0.333333),
	(1904, 2, '16651003', '5', 0.333333),
	(1905, 2, '16622042', '5', 0.333333),
	(1906, 2, '16652019', '5', 0.333333),
	(1907, 2, '15641028', '5', 0.2),
	(1908, 2, '16610027', '5', 0.333333),
	(1909, 2, '15642043', '5', 0.2),
	(1910, 2, '16612027', '5', 0.333333),
	(1911, 2, '17613022', '5', 1),
	(1912, 2, '17643046', '5', 1),
	(1913, 2, '16614038', '5', 0.333333),
	(1914, 2, '15644048', '5', 0.2),
	(1915, 2, '16616003', '5', 0.333333),
	(1916, 2, '16619007', '5', 0.333333),
	(1917, 2, '16620028', '5', 0.333333),
	(1918, 2, '16615038', '5', 0.333333),
	(1919, 2, '16645027', '5', 0.333333),
	(1920, 2, '16623025', '5', 0.333333),
	(1921, 2, '16623016', '5', 0.333333),
	(1922, 2, '16624035', '5', 0.333333),
	(1923, 2, '16624047', '5', 0.333333),
	(1924, 2, '16661020', '5', 0.333333),
	(1925, 2, '16651039', '5', 0.333333),
	(1926, 2, '16644024', '5', 0.333333),
	(1927, 2, '16641074', '5', 0.333333),
	(1928, 2, '15642017', '5', 0.2),
	(1929, 2, '16665042', '5', 0.333333),
	(1930, 2, '15651055', '5', 0.2),
	(1931, 2, '15644035', '5', 0.2),
	(1932, 2, '16615009', '5', 0.333333),
	(1933, 3, '16621043', '5', 0.272727),
	(1934, 3, '16651003', '5', 0.363636),
	(1935, 3, '16622042', '5', 0.454545),
	(1936, 3, '16652019', '5', 0.272727),
	(1937, 3, '15641028', '5', 0.272727),
	(1938, 3, '16610027', '5', 0.454545),
	(1939, 3, '15642043', '5', 0.363636),
	(1940, 3, '16612027', '5', 0.363636),
	(1941, 3, '17613022', '5', 0.181818),
	(1942, 3, '17643046', '5', 0.181818),
	(1943, 3, '16614038', '5', 1),
	(1944, 3, '15644048', '5', 0.181818),
	(1945, 3, '16616003', '5', 0.0909091),
	(1946, 3, '16619007', '5', 0.0909091),
	(1947, 3, '16620028', '5', 0.272727),
	(1948, 3, '16615038', '5', 0.272727),
	(1949, 3, '16645027', '5', 0.272727),
	(1950, 3, '16623025', '5', 0.272727),
	(1951, 3, '16623016', '5', 0.272727),
	(1952, 3, '16624035', '5', 0.363636),
	(1953, 3, '16624047', '5', 0.363636),
	(1954, 3, '16661020', '5', 0.272727),
	(1955, 3, '16651039', '5', 0.181818),
	(1956, 3, '16644024', '5', 0.363636),
	(1957, 3, '16641074', '5', 0.181818),
	(1958, 3, '15642017', '5', 0.454545),
	(1959, 3, '16665042', '5', 0.181818),
	(1960, 3, '15651055', '5', 0.272727),
	(1961, 3, '15644035', '5', 0.181818),
	(1962, 3, '16615009', '5', 0.272727),
	(1963, 4, '16621043', '5', 0.943734),
	(1964, 4, '16651003', '5', 0.956522),
	(1965, 4, '16622042', '5', 0.913043),
	(1966, 4, '16652019', '5', 0.925831),
	(1967, 4, '15641028', '5', 0.928389),
	(1968, 4, '16610027', '5', 0.910486),
	(1969, 4, '15642043', '5', 0.907928),
	(1970, 4, '16612027', '5', 0.915601),
	(1971, 4, '17613022', '5', 0.936061),
	(1972, 4, '17643046', '5', 0.913043),
	(1973, 4, '16614038', '5', 0.87468),
	(1974, 4, '15644048', '5', 0.925831),
	(1975, 4, '16616003', '5', 0.974425),
	(1976, 4, '16619007', '5', 0.890026),
	(1977, 4, '16620028', '5', 0.984655),
	(1978, 4, '16615038', '5', 0.984655),
	(1979, 4, '16645027', '5', 0.910486),
	(1980, 4, '16623025', '5', 0.892583),
	(1981, 4, '16623016', '5', 0.987212),
	(1982, 4, '16624035', '5', 0.938619),
	(1983, 4, '16624047', '5', 0.915601),
	(1984, 4, '16661020', '5', 0.98977),
	(1985, 4, '16651039', '5', 1),
	(1986, 4, '16644024', '5', 0.925831),
	(1987, 4, '16641074', '5', 0.920716),
	(1988, 4, '15642017', '5', 0.974425),
	(1989, 4, '16665042', '5', 0.976982),
	(1990, 4, '15651055', '5', 0.941176),
	(1991, 4, '15644035', '5', 0.943734),
	(1992, 4, '16615009', '5', 0.997442),
	(1993, 1, '16615019', '9', 1),
	(1994, 2, '16615019', '9', 1),
	(1995, 3, '16615019', '9', 1),
	(1996, 4, '16615019', '9', 1);
/*!40000 ALTER TABLE `normalisasi` ENABLE KEYS */;

-- Dumping structure for table beasiswa.normalisasi_jurusan
CREATE TABLE IF NOT EXISTS `normalisasi_jurusan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kriteria_id` int(11) DEFAULT NULL,
  `nim` char(50) DEFAULT NULL,
  `beasiswa_id` int(11) DEFAULT NULL,
  `kode_jurusan` varchar(8) DEFAULT NULL,
  `nilai` float DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1289 DEFAULT CHARSET=latin1;

-- Dumping data for table beasiswa.normalisasi_jurusan: ~120 rows (approximately)
/*!40000 ALTER TABLE `normalisasi_jurusan` DISABLE KEYS */;
INSERT INTO `normalisasi_jurusan` (`id`, `kriteria_id`, `nim`, `beasiswa_id`, `kode_jurusan`, `nilai`) VALUES
	(1165, 1, '16621043', 5, 'AK', 0.428571),
	(1166, 1, '16651003', 5, 'AK', 1),
	(1167, 1, '16661020', 5, 'AK', 0.3),
	(1168, 1, '16651039', 5, 'AK', 0.5),
	(1169, 1, '15651055', 5, 'AK', 0.3),
	(1170, 2, '16621043', 5, 'AK', 1),
	(1171, 2, '16651003', 5, 'AK', 1),
	(1172, 2, '16661020', 5, 'AK', 1),
	(1173, 2, '16651039', 5, 'AK', 1),
	(1174, 2, '15651055', 5, 'AK', 0.6),
	(1175, 3, '16621043', 5, 'AK', 0.75),
	(1176, 3, '16651003', 5, 'AK', 1),
	(1177, 3, '16661020', 5, 'AK', 0.75),
	(1178, 3, '16651039', 5, 'AK', 0.5),
	(1179, 3, '15651055', 5, 'AK', 0.75),
	(1180, 4, '16621043', 5, 'AK', 0.943734),
	(1181, 4, '16651003', 5, 'AK', 0.956522),
	(1182, 4, '16661020', 5, 'AK', 0.98977),
	(1183, 4, '16651039', 5, 'AK', 1),
	(1184, 4, '15651055', 5, 'AK', 0.941176),
	(1185, 1, '16622042', 5, 'AB', 1),
	(1186, 1, '16652019', 5, 'AB', 0.319149),
	(1187, 2, '16622042', 5, 'AB', 1),
	(1188, 2, '16652019', 5, 'AB', 1),
	(1189, 3, '16622042', 5, 'AB', 1),
	(1190, 3, '16652019', 5, 'AB', 0.6),
	(1191, 4, '16622042', 5, 'AB', 0.986188),
	(1192, 4, '16652019', 5, 'AB', 1),
	(1193, 1, '15641028', 5, 'TM', 1),
	(1194, 1, '16610027', 5, 'TM', 0.4),
	(1195, 1, '16641074', 5, 'TM', 0.27027),
	(1196, 2, '15641028', 5, 'TM', 0.6),
	(1197, 2, '16610027', 5, 'TM', 1),
	(1198, 2, '16641074', 5, 'TM', 1),
	(1199, 3, '15641028', 5, 'TM', 0.6),
	(1200, 3, '16610027', 5, 'TM', 1),
	(1201, 3, '16641074', 5, 'TM', 0.4),
	(1202, 4, '15641028', 5, 'TM', 1),
	(1203, 4, '16610027', 5, 'TM', 0.980716),
	(1204, 4, '16641074', 5, 'TM', 0.991736),
	(1205, 1, '15642043', 5, 'TE', 1),
	(1206, 1, '16612027', 5, 'TE', 1),
	(1207, 1, '17613022', 5, 'TE', 0.81894),
	(1208, 1, '15642017', 5, 'TE', 0.869565),
	(1209, 2, '15642043', 5, 'TE', 0.2),
	(1210, 2, '16612027', 5, 'TE', 0.333333),
	(1211, 2, '17613022', 5, 'TE', 1),
	(1212, 2, '15642017', 5, 'TE', 0.2),
	(1213, 3, '15642043', 5, 'TE', 0.8),
	(1214, 3, '16612027', 5, 'TE', 0.8),
	(1215, 3, '17613022', 5, 'TE', 0.4),
	(1216, 3, '15642017', 5, 'TE', 1),
	(1217, 4, '15642043', 5, 'TE', 0.931759),
	(1218, 4, '16612027', 5, 'TE', 0.939633),
	(1219, 4, '17613022', 5, 'TE', 0.96063),
	(1220, 4, '15642017', 5, 'TE', 1),
	(1221, 1, '17643046', 5, 'TS', 1),
	(1222, 2, '17643046', 5, 'TS', 1),
	(1223, 3, '17643046', 5, 'TS', 1),
	(1224, 4, '17643046', 5, 'TS', 1),
	(1225, 1, '16614038', 5, 'TEKIM', 0.733333),
	(1226, 1, '15644048', 5, 'TEKIM', 0.733333),
	(1227, 1, '16644024', 5, 'TEKIM', 0.219978),
	(1228, 1, '15644035', 5, 'TEKIM', 1),
	(1229, 2, '16614038', 5, 'TEKIM', 1),
	(1230, 2, '15644048', 5, 'TEKIM', 0.6),
	(1231, 2, '16644024', 5, 'TEKIM', 1),
	(1232, 2, '15644035', 5, 'TEKIM', 0.6),
	(1233, 3, '16614038', 5, 'TEKIM', 1),
	(1234, 3, '15644048', 5, 'TEKIM', 0.181818),
	(1235, 3, '16644024', 5, 'TEKIM', 0.363636),
	(1236, 3, '15644035', 5, 'TEKIM', 0.181818),
	(1237, 4, '16614038', 5, 'TEKIM', 0.926829),
	(1238, 4, '15644048', 5, 'TEKIM', 0.98103),
	(1239, 4, '16644024', 5, 'TEKIM', 0.98103),
	(1240, 4, '15644035', 5, 'TEKIM', 1),
	(1241, 1, '16616003', 5, 'DESAIN', 0.675115),
	(1242, 1, '16619007', 5, 'DESAIN', 1),
	(1243, 2, '16616003', 5, 'DESAIN', 1),
	(1244, 2, '16619007', 5, 'DESAIN', 1),
	(1245, 3, '16616003', 5, 'DESAIN', 1),
	(1246, 3, '16619007', 5, 'DESAIN', 1),
	(1247, 4, '16616003', 5, 'DESAIN', 1),
	(1248, 4, '16619007', 5, 'DESAIN', 0.913386),
	(1249, 1, '16620028', 5, 'TI', 0.4),
	(1250, 1, '16615038', 5, 'TI', 1),
	(1251, 1, '16645027', 5, 'TI', 0.181818),
	(1252, 1, '16665042', 5, 'TI', 0.315789),
	(1253, 1, '16615009', 5, 'TI', 0.363636),
	(1254, 2, '16620028', 5, 'TI', 1),
	(1255, 2, '16615038', 5, 'TI', 1),
	(1256, 2, '16645027', 5, 'TI', 1),
	(1257, 2, '16665042', 5, 'TI', 1),
	(1258, 2, '16615009', 5, 'TI', 1),
	(1259, 3, '16620028', 5, 'TI', 1),
	(1260, 3, '16615038', 5, 'TI', 1),
	(1261, 3, '16645027', 5, 'TI', 1),
	(1262, 3, '16665042', 5, 'TI', 0.666667),
	(1263, 3, '16615009', 5, 'TI', 1),
	(1264, 4, '16620028', 5, 'TI', 0.987179),
	(1265, 4, '16615038', 5, 'TI', 0.987179),
	(1266, 4, '16645027', 5, 'TI', 0.912821),
	(1267, 4, '16665042', 5, 'TI', 0.979487),
	(1268, 4, '16615009', 5, 'TI', 1),
	(1269, 1, '16623025', 5, 'PW', 1),
	(1270, 1, '16623016', 5, 'PW', 0.888889),
	(1271, 2, '16623025', 5, 'PW', 1),
	(1272, 2, '16623016', 5, 'PW', 1),
	(1273, 3, '16623025', 5, 'PW', 1),
	(1274, 3, '16623016', 5, 'PW', 1),
	(1275, 4, '16623025', 5, 'PW', 0.904145),
	(1276, 4, '16623016', 5, 'PW', 1),
	(1277, 1, '16624035', 5, 'MARITIM', 0.666667),
	(1278, 1, '16624047', 5, 'MARITIM', 1),
	(1279, 2, '16624035', 5, 'MARITIM', 1),
	(1280, 2, '16624047', 5, 'MARITIM', 1),
	(1281, 3, '16624035', 5, 'MARITIM', 1),
	(1282, 3, '16624047', 5, 'MARITIM', 1),
	(1283, 4, '16624035', 5, 'MARITIM', 1),
	(1284, 4, '16624047', 5, 'MARITIM', 0.975477),
	(1285, 1, '16615019', 9, 'TI', 1),
	(1286, 2, '16615019', 9, 'TI', 1),
	(1287, 3, '16615019', 9, 'TI', 1),
	(1288, 4, '16615019', 9, 'TI', 1);
/*!40000 ALTER TABLE `normalisasi_jurusan` ENABLE KEYS */;

-- Dumping structure for table beasiswa.orang_tua
CREATE TABLE IF NOT EXISTS `orang_tua` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nim` char(8) DEFAULT NULL,
  `nama_ayah` varchar(50) DEFAULT NULL,
  `pekerjaan_ayah` varchar(50) DEFAULT NULL,
  `nama_ibu` varchar(50) DEFAULT NULL,
  `pekerjaan_ibu` varchar(50) DEFAULT NULL,
  `penghasilan_ayah` int(11) NOT NULL DEFAULT '0',
  `penghasilan_ibu` int(11) NOT NULL DEFAULT '0',
  `jumlah_tanggungan` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `FK_orang_tua_mahasiswa` (`nim`),
  CONSTRAINT `FK_orang_tua_mahasiswa` FOREIGN KEY (`nim`) REFERENCES `mahasiswa` (`nim`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;

-- Dumping data for table beasiswa.orang_tua: ~30 rows (approximately)
/*!40000 ALTER TABLE `orang_tua` DISABLE KEYS */;
INSERT INTO `orang_tua` (`id`, `nim`, `nama_ayah`, `pekerjaan_ayah`, `nama_ibu`, `pekerjaan_ibu`, `penghasilan_ayah`, `penghasilan_ibu`, `jumlah_tanggungan`) VALUES
	(2, '16621043', 'YUSUF HIDAYAT KASMO', 'Lainnya', 'NELMA', 'Lainnya', 3500000, 0, 3),
	(3, '16651003', 'AHMADI', 'Pegawai Swasta', 'FAUZIAH AG', 'Lainnya', 1500000, 0, 4),
	(4, '16622042', 'JUMADI', 'Lainnya', 'TITIN', 'Lainnya', 1500000, 0, 5),
	(5, '16652019', 'ALIANSYAH', 'PNS / Pegawai Negara', 'SITI MARIAM', 'Lainnya', 4700000, 0, 3),
	(6, '15641028', 'ABDUL HAMID', 'Petani / Nelayan', 'ELIS ERNAWATI', 'Petani / Nelayan', 1000000, 0, 3),
	(7, '16610027', 'SARIFUDDIN', 'Wiraswasta', 'RUGAYAH', 'Petani / Nelayan', 1500000, 1000000, 5),
	(8, '15642043', 'SUGENG RIYADI', 'Pegawai Swasta', 'SUPRIHATIN', 'Lainnya', 2000000, 0, 4),
	(9, '16612027', 'HARYANTO', 'Lainnya', 'TRI PURWANINGSIH', 'Wiraswasta', 0, 2000000, 4),
	(10, '17613022', 'ABDUL KADIR', 'Pegawai Swasta', 'NURBANI', 'Lainnya', 2442180, 0, 2),
	(11, '17643046', 'HARIYADI', 'Lainnya', 'YULIATI', 'Lainnya', 150, 0, 2),
	(12, '16614038', 'SAHIDE NAWING ( ALM)', 'Lainnya', 'NURISAH', 'Wiraswasta', 0, 1500000, 11),
	(13, '15644048', 'SUYATMO', 'Wiraswasta', 'ALM. SUKOWATI', 'Lainnya', 1500000, 0, 2),
	(14, '16616003', 'MUHAMMAD DAYS', 'Lainnya', 'PAITY HANIFAH', 'Pegawai Swasta', 0, 2962458, 1),
	(15, '16619007', 'TONY ARI SANDRI', 'Pegawai Swasta', 'SRI WAHYUNI HANDAYANI', 'Lainnya', 2000000, 0, 1),
	(16, '16620028', 'YONI HADI', 'Wiraswasta', 'SUMIATI', 'Lainnya', 3000000, 0, 3),
	(17, '16615038', 'SYAMSUDDIN', 'Wiraswasta', 'YASRINI', 'Lainnya', 1200000, 0, 3),
	(18, '16645027', 'KASIYONO', 'Anggota TNI/POLRI', 'SURYANI', 'Lainnya', 6600000, 0, 3),
	(19, '16623025', 'SUGANTIYO', 'Pegawai Swasta', 'JUWARIYAH', 'Lainnya', 2000000, 0, 3),
	(20, '16623016', 'NURJALI', 'Wiraswasta', 'SUMRIYAH', 'Lainnya', 2250000, 0, 3),
	(21, '16624035', 'USMAN CUKKE', 'Petani / Nelayan', 'SURIANTI', 'Lainnya', 1500000, 0, 4),
	(22, '16624047', 'YOHANIS PONGKIDING', 'Petani / Nelayan', 'METY SELLU BUNGA', 'Lainnya', 1000000, 0, 4),
	(23, '16661020', 'ADRIANSYAH', 'Pegawai Swasta', 'RELYA SARNITA', 'Lainnya', 5000000, 0, 3),
	(24, '16651039', 'SANGAJI', 'Wiraswasta', 'MARDIANA', 'Lainnya', 3000000, 0, 2),
	(25, '16644024', 'EDY SUMARNO', 'Pegawai Swasta', 'SUHARYANTINAH', 'Lainnya', 5000000, 500, 4),
	(26, '16641074', 'MOCH.SAECHONI', 'Lainnya', 'ZUMROTUL MUFIDAH', 'Lainnya', 3700000, 0, 2),
	(27, '15642017', 'NUR WALIDAIN', 'Lainnya', 'SITI LESTARI', 'Lainnya', 2300000, 0, 5),
	(28, '16665042', 'MAHARDIAN', 'PNS / Pegawai Negara', 'YUYUN YUNIARSIH', 'Lainnya', 3800000, 0, 2),
	(29, '15651055', 'AGUS SANTOSO', 'Pegawai Swasta', 'DIAN ARIFAH', 'Lainnya', 5000000, 0, 3),
	(30, '15644035', 'RIDUANSYAH', 'Lainnya', 'MU\'MIN', 'Lainnya', 0, 1100000, 2),
	(31, '16615009', 'MUHAMMAD SOBIRIN', 'Pegawai Swasta', 'AMSIAH', 'Lainnya', 3300000, 0, 3),
	(32, '16615019', 'Ilham', 'ILham', 'iLhamf', 'iLhamf', 500000, 500000, 5),
	(33, '16615007', 'Ayah Endam', 'Ayah Endam', 'Ayah Endam', 'Ayah Endam', 231313, 243234, 5);
/*!40000 ALTER TABLE `orang_tua` ENABLE KEYS */;

-- Dumping structure for table beasiswa.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table beasiswa.password_resets: ~0 rows (approximately)
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Dumping structure for table beasiswa.program_studi
CREATE TABLE IF NOT EXISTS `program_studi` (
  `kode` varchar(8) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `kode_jurusan` varchar(8) DEFAULT NULL,
  PRIMARY KEY (`kode`),
  KEY `FK_program_studi_jurusan` (`kode_jurusan`),
  CONSTRAINT `FK_program_studi_jurusan` FOREIGN KEY (`kode_jurusan`) REFERENCES `jurusan` (`kode`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table beasiswa.program_studi: ~21 rows (approximately)
/*!40000 ALTER TABLE `program_studi` DISABLE KEYS */;
INSERT INTO `program_studi` (`kode`, `nama`, `kode_jurusan`) VALUES
	('ABD3', 'Administrasi Bisnis', 'AB'),
	('ABS1', 'Manajemen Pemasaran', 'AB'),
	('AKD3', 'Akuntasi', 'AK'),
	('AKS1', 'Akuntasi Manajerial', 'AK'),
	('ALATBERA', 'Teknik Mesin Alat Berat', 'TM'),
	('ARSI', 'Arsitektur', 'DESAIN'),
	('DESPRO', 'Desain Produk', 'DESAIN'),
	('ELEKTROD', 'Teknik Elektro/listrik', 'TE'),
	('ELESTROS', 'Teknik Elektro', 'TE'),
	('KPNK', 'Ketatalaksanaan Pelayaran Niaga Dan Kepelabuhan', 'MARITIM'),
	('MESIND3', 'Teknik Mesin Perawatan dan Perbaikan', 'TM'),
	('MESINS1', 'Teknik Mesin Perawatan & Produksi', 'TM'),
	('NAUTIKA', 'Nautika', 'MARITIM'),
	('PARIWISA', 'Pariwisata (Usaha Perjalanan Wisata)', 'PW'),
	('PERBANKA', 'Keuangan Dan Perbankan', 'AK'),
	('PERHOTEL', 'Pariwisata', 'PW'),
	('SIPILD3', 'Teknik Sipil', 'TS'),
	('SIPILS1', 'Rekayasa Jalan & Jembatan', 'TS'),
	('TEKIMD3', 'Petro & Oleo Kimia', 'TEKIM'),
	('TEKIMS1', 'Teknologi Kimia Industri', 'TEKIM'),
	('TEKNIKA', 'Teknika', 'MARITIM'),
	('TI', 'Teknik Informatika', 'TI'),
	('TIM', 'Teknik Informatika Multimedia', 'TI'),
	('TK', 'Teknik Komputer', 'TI');
/*!40000 ALTER TABLE `program_studi` ENABLE KEYS */;

-- Dumping structure for table beasiswa.rangking
CREATE TABLE IF NOT EXISTS `rangking` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nilai` float DEFAULT NULL,
  `rangking` int(11) DEFAULT NULL,
  `nim` char(8) DEFAULT NULL,
  `beasiswa_id` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_rangking_mahasiswa` (`nim`),
  KEY `FK_rangking_beasiswa` (`beasiswa_id`),
  CONSTRAINT `FK_rangking_beasiswa` FOREIGN KEY (`beasiswa_id`) REFERENCES `beasiswa` (`id`),
  CONSTRAINT `FK_rangking_mahasiswa` FOREIGN KEY (`nim`) REFERENCES `mahasiswa` (`nim`)
) ENGINE=InnoDB AUTO_INCREMENT=349 DEFAULT CHARSET=latin1;

-- Dumping data for table beasiswa.rangking: ~30 rows (approximately)
/*!40000 ALTER TABLE `rangking` DISABLE KEYS */;
INSERT INTO `rangking` (`id`, `nilai`, `rangking`, `nim`, `beasiswa_id`) VALUES
	(318, 0.48205, 18, '16621043', 5),
	(319, 0.505361, 6, '16651003', 5),
	(320, 0.506151, 5, '16622042', 5),
	(321, 0.474886, 20, '16652019', 5),
	(322, 0.455938, 26, '15641028', 5),
	(323, 0.505118, 7, '16610027', 5),
	(324, 0.465917, 22, '15642043', 5),
	(325, 0.488986, 16, '16612027', 5),
	(326, 0.560803, 3, '17613022', 5),
	(327, 0.801581, 1, '17643046', 5),
	(328, 0.599897, 2, '16614038', 5),
	(329, 0.436721, 29, '15644048', 5),
	(330, 0.457964, 25, '16616003', 5),
	(331, 0.424211, 30, '16619007', 5),
	(332, 0.49842, 12, '16620028', 5),
	(333, 0.498439, 11, '16615038', 5),
	(334, 0.468745, 21, '16645027', 5),
	(335, 0.461597, 23, '16623025', 5),
	(336, 0.499447, 10, '16623016', 5),
	(337, 0.4982, 13, '16624035', 5),
	(338, 0.489005, 15, '16624047', 5),
	(339, 0.500461, 9, '16661020', 5),
	(340, 0.486376, 17, '16651039', 5),
	(341, 0.493067, 14, '16644024', 5),
	(342, 0.45466, 27, '16641074', 5),
	(343, 0.510695, 4, '15642017', 5),
	(344, 0.477166, 19, '16665042', 5),
	(345, 0.461023, 24, '15651055', 5),
	(346, 0.443891, 28, '15644035', 5),
	(347, 0.503534, 8, '16615009', 5),
	(348, 1, 1, '16615019', 9);
/*!40000 ALTER TABLE `rangking` ENABLE KEYS */;

-- Dumping structure for table beasiswa.rangking_jurusan
CREATE TABLE IF NOT EXISTS `rangking_jurusan` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nilai` float NOT NULL,
  `nim` char(8) NOT NULL,
  `rangking` int(11) NOT NULL,
  `beasiswa_id` int(11) unsigned NOT NULL,
  `kode_jurusan` varchar(8) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_rangking_jurusan_jurusan` (`kode_jurusan`),
  KEY `FK_rangking_jurusan_beasiswa` (`beasiswa_id`),
  KEY `FK_rangking_jurusan_mahasiswa` (`nim`),
  CONSTRAINT `FK_rangking_jurusan_beasiswa` FOREIGN KEY (`beasiswa_id`) REFERENCES `beasiswa` (`id`),
  CONSTRAINT `FK_rangking_jurusan_jurusan` FOREIGN KEY (`kode_jurusan`) REFERENCES `jurusan` (`kode`),
  CONSTRAINT `FK_rangking_jurusan_mahasiswa` FOREIGN KEY (`nim`) REFERENCES `mahasiswa` (`nim`)
) ENGINE=InnoDB AUTO_INCREMENT=204 DEFAULT CHARSET=latin1;

-- Dumping data for table beasiswa.rangking_jurusan: ~30 rows (approximately)
/*!40000 ALTER TABLE `rangking_jurusan` DISABLE KEYS */;
INSERT INTO `rangking_jurusan` (`id`, `nilai`, `nim`, `rangking`, `beasiswa_id`, `kode_jurusan`) VALUES
	(173, 0.784636, '16621043', 2, 5, 'AK'),
	(174, 0.982609, '16651003', 1, 5, 'AK'),
	(175, 0.770908, '16661020', 4, 5, 'AK'),
	(176, 0.775, '16651039', 3, 5, 'AK'),
	(177, 0.69147, '15651055', 5, 5, 'AK'),
	(178, 0.994475, '16622042', 1, 5, 'AB'),
	(179, 0.749787, '16652019', 2, 5, 'AB'),
	(180, 0.86, '15641028', 1, 5, 'TM'),
	(181, 0.842286, '16610027', 2, 5, 'TM'),
	(182, 0.694262, '16641074', 3, 5, 'TM'),
	(183, 0.812704, '15642043', 4, 5, 'TE'),
	(184, 0.835853, '16612027', 2, 5, 'TE'),
	(185, 0.818987, '17613022', 3, 5, 'TE'),
	(186, 0.847391, '15642017', 1, 5, 'TE'),
	(187, 1, '17643046', 1, 5, 'TS'),
	(188, 0.904065, '16614038', 1, 5, 'TEKIM'),
	(189, 0.702109, '15644048', 3, 5, 'TEKIM'),
	(190, 0.670134, '16644024', 4, 5, 'TEKIM'),
	(191, 0.776364, '15644035', 2, 5, 'TEKIM'),
	(192, 0.918779, '16616003', 2, 5, 'DESAIN'),
	(193, 0.965354, '16619007', 1, 5, 'DESAIN'),
	(194, 0.844872, '16620028', 2, 5, 'TI'),
	(195, 0.994872, '16615038', 1, 5, 'TI'),
	(196, 0.760583, '16645027', 4, 5, 'TI'),
	(197, 0.754075, '16665042', 5, 5, 'TI'),
	(198, 0.840909, '16615009', 3, 5, 'TI'),
	(199, 0.961658, '16623025', 2, 5, 'PW'),
	(200, 0.972222, '16623016', 1, 5, 'PW'),
	(201, 0.916667, '16624035', 2, 5, 'MARITIM'),
	(202, 0.990191, '16624047', 1, 5, 'MARITIM'),
	(203, 1, '16615019', 1, 9, 'TI');
/*!40000 ALTER TABLE `rangking_jurusan` ENABLE KEYS */;

-- Dumping structure for table beasiswa.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` char(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table beasiswa.users: ~32 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `email`, `email_verified_at`, `password`, `remember_token`, `role`, `created_at`, `updated_at`) VALUES
	(6, 'admin@gmail.com', '2019-08-28 03:50:28', '$2y$10$Rp4NezIYikRFzW4eRX.5K.Rm/Agi7uHO2ZM23mHSfxT6hPot3W8qe', NULL, '1', NULL, NULL),
	(7, 'user1@gmail.com', NULL, '$2y$10$/h2BqmV79v.tinFzdMNA/.uMDOLFWsSisofyHVA.09g1hi5tIeIJe', NULL, '2', NULL, NULL),
	(8, 'user2@gmail.com', NULL, '$2y$10$ydfaZZRJnm94Y5QY4CgOJuw9QS1bjiEDG39uPtJMDdGcGk7YYYdau', NULL, '2', NULL, NULL),
	(9, 'user3@gmail.com', NULL, '$2y$10$7czlBb2exemzREuud2IsjOaUw/.h/Jla5mfD.gv4B5.u0bj6bDS/O', NULL, '2', NULL, NULL),
	(10, 'user4@gmail.com', NULL, '$2y$10$arRSVmUsJY3q8UHRwLzCR.lIXGrnJGLZn9Jxy2LBOJpwwNc3z79fi', NULL, '2', NULL, NULL),
	(11, 'user5@gmail.com', NULL, '$2y$10$mTTePhoU8XwB/T.WpnXwpuMVozId1P75tzuinD96yKGNbKrSBNys2', NULL, '2', NULL, NULL),
	(12, 'user6@gmail.com', NULL, '$2y$10$iwIQ.C7k0AS1aql3E3tOhel4RXMfC9Z2BwI8J/S/KeY49OS1oXg0S', NULL, '2', NULL, NULL),
	(13, 'user7@gmail.com', NULL, '$2y$10$rWjXbd/Z6LbCU60PcNHZBOypGdn4z/ZrrHf64qulOnxhJiksNxmAq', NULL, '2', NULL, NULL),
	(14, 'user8@gmail.com', NULL, '$2y$10$jHiElvr8GvJwEsezNudxJu0JKYsb/iebKOGEoN0oCPBCKS0FS6eoC', NULL, '2', NULL, NULL),
	(15, 'user9@gmail.com', NULL, '$2y$10$6OMsIVNlhZ1u/nh/ReONJ.p440IFKiTgQchVppBV0JSvIT9p/CcYK', NULL, '2', NULL, NULL),
	(16, 'user10@gmail.com', NULL, '$2y$10$342vanL7dHlSZhGaaPm2su76lLB.TvGIntGAhuJxDcI/XZP4LDF8G', NULL, '2', NULL, NULL),
	(17, 'user11@gmail.com', NULL, '$2y$10$.xSDzqV8yI7Suaa.1xGgp.jedV/3dy1RFaGb/K10p3Ex5dgqESjsi', NULL, '2', NULL, NULL),
	(18, 'user12@gmail.com', NULL, '$2y$10$voCJ9p2bHAItPABPjIgzxO5Y4jZTjO4D/ecc2NSC2GA58KTx/15wi', NULL, '2', NULL, NULL),
	(19, 'user13@gmail.com', NULL, '$2y$10$LzKvCZiRBUCvYxXjpRXypuH4GJafQJx8kYiDqbWmDg9lr5skTDpbS', NULL, '2', NULL, NULL),
	(20, 'user14@gmail.com', NULL, '$2y$10$IKY29eSQBmSC7/A/YnsFu.70aGDUtFWU/Cka5AO7F7tXvVm.mWALq', NULL, '2', NULL, NULL),
	(21, 'user15@gmail.com', NULL, '$2y$10$eTZRDD6ebao26wErYDGwu.T60qfeZfFRVfaZq5GVnravy6f5YTdl6', NULL, '2', NULL, NULL),
	(22, 'user16@gmail.com', NULL, '$2y$10$kibGCn4iOdBoFsZIgMPhxOCIdAHB61I35d.Q1sAJmIF.VCSOUa0WC', NULL, '2', NULL, NULL),
	(23, 'user17@gmail.com', NULL, '$2y$10$XRLzNt6dvYK.x9MPF5VgYeprlRJSejcOjkxciyCx45dj60wLltgci', NULL, '2', NULL, NULL),
	(24, 'user18@gmail.com', NULL, '$2y$10$VGjcj5WN/rs0L6BEhAoudOm/0HnM8BtVjtmxllNbM2w9BDPFrpjJ.', NULL, '2', NULL, NULL),
	(25, 'user19@gmail.com', NULL, '$2y$10$dXGN6Nt2uFkjTQVmogRWD.3Zk/8ar1zsdcKXTPOvpOfOzcVI3dkyq', NULL, '2', NULL, NULL),
	(26, 'user20@gmail.com', NULL, '$2y$10$tnZeEhD6ggATxmx.6YuzGevPaFgMT6XaMnqOKubQBXX3L1EjQig8C', NULL, '2', NULL, NULL),
	(27, 'user21@gmail.com', NULL, '$2y$10$Be3cXdeMSM7EDpbs4U6vjeBNRA2pXuQcJbdoy2RkzrLM7e9IG9266', NULL, '2', NULL, NULL),
	(28, 'user22@gmail.com', NULL, '$2y$10$h/NRDT0oSeDGj0WXbSTp9.FWggy/fVfAvJN1uFir6ZXmRrUfVi4Q.', NULL, '2', NULL, NULL),
	(29, 'user23@gmail.com', NULL, '$2y$10$I5MS8tZhFCBlIBzmiQlL0.xK9Co5doCHc5c6v5/JiJqpelVIi8SBG', NULL, '2', NULL, NULL),
	(30, 'user24@gmail.com', NULL, '$2y$10$cbgJcC.uMvmK/aFG3oOtg.l.dkMa1qyxNJqij.5sIMaKgkpZWlZV2', NULL, '2', NULL, NULL),
	(31, 'user25@gmail.com', NULL, '$2y$10$Wkjw9FkyU3wEkZdITtXwyeBOnevWrYsgd8Zv9c932hGftsaq60ua6', NULL, '2', NULL, NULL),
	(32, 'user26@gmail.com', NULL, '$2y$10$sAd4H0.zbRGXYzx7iPFqUeOsQ9jHrg7dlQypWNZb9kLxBhZ4vb3mC', NULL, '2', NULL, NULL),
	(33, 'user27@gmail.com', NULL, '$2y$10$1.bT3ok/YkkggB868cziXu7VCJP8i1/0Hw9nyhK3TtSnFGuSSomPe', NULL, '2', NULL, NULL),
	(34, 'user28@gmail.com', NULL, '$2y$10$TT6PT2DHW5lNPidC6Muxbelbzqwvvmaz6Z27A6oS4eWaQLATSkzUe', NULL, '2', NULL, NULL),
	(35, 'user29@gmail.com', NULL, '$2y$10$bnF9c3V5w0.Cjk/8H3c2LeBxQDUaCqvhU9mKRSSAld8cUdDzgQ/cm', NULL, '2', NULL, NULL),
	(36, 'user30@gmail.com', NULL, '$2y$10$HTv2A4GU2264b4l1er0OZuf53MSig0hFZxMJalfitv3VcjVzaBgD6', NULL, '2', NULL, NULL),
	(41, 'ilhamshinohara@gmail.com', NULL, '$2y$10$Qr63WeoVhDVGh6Gxj41koeFYBPFfr9T8b6gzJoF3aX/i3q8Z6Ob7i', NULL, '2', '2019-08-27 22:07:06', '2019-08-27 22:07:06'),
	(42, 'endam@gmail.com', NULL, '$2y$10$4JHXlbvtpsn5DGbKK3AiAeGqoFXRldR3lhuqOerCc.SQwZ4NZUOCG', NULL, '2', '2019-08-28 09:57:28', '2019-08-28 09:57:28');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;

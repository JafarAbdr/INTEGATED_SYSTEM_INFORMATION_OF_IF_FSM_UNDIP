-- phpMyAdmin SQL Dump
-- version 3.1.3.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 18, 2014 at 12:56 PM
-- Server version: 5.1.33
-- PHP Version: 5.2.9

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_si_kuliah_2`
--

-- --------------------------------------------------------

--
-- Table structure for table `ci_cookies`
--

CREATE TABLE IF NOT EXISTS `ci_cookies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cookie_id` varchar(255) DEFAULT NULL,
  `netid` varchar(255) DEFAULT NULL,
  `ip_address` varchar(255) DEFAULT NULL,
  `user_agent` varchar(255) DEFAULT NULL,
  `orig_page_requested` varchar(120) DEFAULT NULL,
  `php_session_id` varchar(40) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `ci_cookies`
--


-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL,
  PRIMARY KEY (`session_id`),
  KEY `last_activity_idx` (`last_activity`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ci_sessions`
--

INSERT INTO `ci_sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('5f8f53bde45e7e5b90ce0a98a3f1bb28', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/36.0.1985.125 Safari/537.36', 1405811130, 'a:9:{s:9:"user_data";s:0:"";s:8:"username";s:11:"fachriadmin";s:5:"level";s:1:"1";s:9:"nama_user";s:9:"Fachrizal";s:7:"id_user";s:2:"17";s:8:"thn_ajar";s:9:"2014/2015";s:8:"semester";s:6:"Ganjil";s:7:"uts_uas";s:3:"UAS";s:9:"auto_date";b:1;}'),
('649d3824ce78ae60e0bf023bce5fa695', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/36.0.1985.125 Safari/537.36', 1405806462, 'a:9:{s:9:"user_data";s:0:"";s:8:"username";s:11:"fachriadmin";s:5:"level";s:1:"1";s:9:"nama_user";s:9:"Fachrizal";s:7:"id_user";s:2:"17";s:8:"thn_ajar";s:9:"2014/2015";s:8:"semester";s:6:"Ganjil";s:7:"uts_uas";s:3:"UAS";s:9:"auto_date";b:1;}'),
('02fcbdbc2071ab14e57276bb57d40ab7', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; rv:30.0) Gecko/20100101 Firefox/30.0', 1408336917, 'a:8:{s:8:"username";s:11:"fachriadmin";s:5:"level";s:1:"1";s:9:"nama_user";s:9:"Fachrizal";s:7:"id_user";s:2:"17";s:8:"thn_ajar";s:9:"2014/2015";s:8:"semester";s:6:"Ganjil";s:7:"uts_uas";s:3:"UAS";s:9:"auto_date";b:1;}'),
('65adef0a2be856de128ac5411a6e44f9', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/36.0.1985.143 Safari/537.36', 1408337544, 'a:9:{s:9:"user_data";s:0:"";s:8:"username";s:5:"admin";s:5:"level";s:1:"1";s:9:"nama_user";s:5:"admin";s:7:"id_user";s:2:"25";s:8:"thn_ajar";s:9:"2014/2015";s:8:"semester";s:6:"Ganjil";s:7:"uts_uas";s:3:"UAS";s:9:"auto_date";b:1;}');

-- --------------------------------------------------------

--
-- Table structure for table `tb_beban_non_fsm`
--

CREATE TABLE IF NOT EXISTS `tb_beban_non_fsm` (
  `id_beban_non_fsm` int(11) NOT NULL AUTO_INCREMENT,
  `thn_ajar` char(9) NOT NULL,
  `semester` enum('Ganjil','Genap','','') NOT NULL,
  `matkul` varchar(40) NOT NULL,
  `sks` int(2) NOT NULL,
  `jurusan` varchar(40) NOT NULL,
  `fakultas` varchar(40) NOT NULL,
  `jumlah_kelas` int(2) NOT NULL,
  `dosen_1` varchar(11) NOT NULL,
  `dosen_2` varchar(11) NOT NULL,
  `semesterke` varchar(11) NOT NULL,
  PRIMARY KEY (`id_beban_non_fsm`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tb_beban_non_fsm`
--

INSERT INTO `tb_beban_non_fsm` (`id_beban_non_fsm`, `thn_ajar`, `semester`, `matkul`, `sks`, `jurusan`, `fakultas`, `jumlah_kelas`, `dosen_1`, `dosen_2`, `semesterke`) VALUES
(3, '2013/2014', 'Genap', 'Teknologi Informasi', 4, 'Hukum', 'Hukum', 2, 'IF010', 'IF012', 'II'),
(4, '2013/2014', 'Genap', 'Basis Data', 3, 'Teknik Sipil', 'Teknik', 2, 'IF001', 'IF003', 'VIII');

-- --------------------------------------------------------

--
-- Table structure for table `tb_beban_non_if`
--

CREATE TABLE IF NOT EXISTS `tb_beban_non_if` (
  `id_beban_non_if` int(11) NOT NULL AUTO_INCREMENT,
  `thn_ajar` char(9) NOT NULL,
  `semester` enum('Ganjil','Genap','','') NOT NULL,
  `jurusan` varchar(30) NOT NULL,
  `matkul` varchar(40) NOT NULL,
  `sks` int(2) NOT NULL,
  `jumlah_kelas` int(2) NOT NULL,
  `dosen_1` varchar(11) NOT NULL,
  `dosen_2` varchar(11) NOT NULL,
  `semesterke` varchar(5) NOT NULL,
  PRIMARY KEY (`id_beban_non_if`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `tb_beban_non_if`
--

INSERT INTO `tb_beban_non_if` (`id_beban_non_if`, `thn_ajar`, `semester`, `jurusan`, `matkul`, `sks`, `jumlah_kelas`, `dosen_1`, `dosen_2`, `semesterke`) VALUES
(1, '2014/2015', 'Ganjil', 'Statistika', 'TIK', 3, 2, 'IF014', 'IF009', 'I'),
(3, '2013/2014', 'Ganjil', 'Matematika', 'Keamanan Jaringan', 3, 2, 'IF020', 'IF023', 'PIL'),
(4, '2013/2014', 'Ganjil', 'Statistika', 'Basis Data', 3, 2, 'IF002', 'IF010', 'III'),
(5, '2013/2014', 'Ganjil', 'D3 Insel', 'Teknologi Informasi', 3, 2, 'IF012', 'IF010', 'III'),
(6, '2014/2015', 'Ganjil', 'Fisika', 'Basis Data', 3, 2, 'IF002', 'IF010', 'III');

-- --------------------------------------------------------

--
-- Table structure for table `tb_dosen_if`
--

CREATE TABLE IF NOT EXISTS `tb_dosen_if` (
  `id_dosen` varchar(11) NOT NULL DEFAULT '',
  `nama_dosen` varchar(50) DEFAULT NULL,
  `nip` varchar(30) DEFAULT NULL,
  `nidn` varchar(30) DEFAULT NULL,
  `pangkat` varchar(40) DEFAULT NULL,
  `jabatan` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id_dosen`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_dosen_if`
--

INSERT INTO `tb_dosen_if` (`id_dosen`, `nama_dosen`, `nip`, `nidn`, `pangkat`, `jabatan`) VALUES
('IF000', 'Team Dosen', NULL, NULL, NULL, NULL),
('IF001', 'Drs. Kushartantya, MIKomp', '195003011979031003', '1035003', 'Penata Tk I / III D', 'Lektor'),
('IF002', 'Drs. Djalal Er Riyanto, MIKomp', '195412191980031003', '19125404', 'Penata / III C', 'Lektor'),
('IF003', 'Drs. Putut Sri Wasito, M.Kom', '195306281980031001', '28065302', 'Penata / III C', 'Lektor'),
('IF004', 'Drs. Suhartono, M.Kom', '195504071983031003', '7045504', 'Pembina / IV A', 'Lektor Kepala'),
('IF005', 'Dra. Indriyati, M.Kom', '195206101983032001', '10065206', 'Penata / III C', 'Lektor'),
('IF006', 'Drs. B. Bambang Yismianto ', '195905151986031003', '15055909', 'Penata / III C', 'Lektor'),
('IF007', 'Drs. Eko Adi Sarwoko, M.Kom', '196511071992031003', '7116503', 'Pembina / IV A', 'Lektor Kepala'),
('IF008', 'Aris Sugiharto, S.Si, M.Kom', '197108111997021004', '11087104', 'Penata Tk I / III D', 'Lektor'),
('IF009', 'Priyo Sidik Sasongko, S.Si, M.Kom', '197007051997021001', '5077005', 'Penata Muda Tk I / III B', 'Lektor'),
('IF010', 'Beta Noranita, S.Si, M.Kom', '197308291998022001', '29087303', 'Penata / III C', 'Lektor'),
('IF011', 'Aris Puji Widodo, S.Si, MT', '197404011999031002', '1047404', 'Penata / III C', 'Lektor'),
('IF012', 'Nurdin Bahtiar, S.Si, MT', '197907202003121002', '20077902', 'Penata Muda Tk I / III B', 'Lektor'),
('IF013', 'Helmie Arif Wibawa, S.Si, M.Cs', '197805162003121001', '16057801', 'Penata Muda Tk I / III B', 'Lektor'),
('IF014', 'Ragil Saputra, S.Si, M.Cs', '198010212005011003', '21108002', 'Penata Muda Tk I / III B', 'Lektor'),
('IF015', 'Retno Kusumaningrum, S.Si, M.Kom', '198104202005012001', '20048104', 'Penata Muda / III A', 'Asisten Ahli'),
('IF016', 'Sukmawati Nur Endah, S.Si, M.Kom', '197805022005012002', '2057811', 'Penata Muda Tk I / III B', 'Lektor'),
('IF017', 'Satriyo Adhy, S.Si, MT', '198302032006041002', '3028301', 'Penata Muda / III A', 'Asisten Ahli'),
('IF018', 'Edy Suharto, ST', '198009142006041002', '14098003', 'Penata Muda / III A', 'Asisten Ahli'),
('IF019', 'Adi Wibowo, S.Si, M.Kom', '198203092006041002', '9038204', 'Penata Muda / III A', 'Asisten Ahli'),
('IF020', 'Indra Waspada, ST, MTI', '197902122008121002', '12027907', 'Penata Muda Tk I / III B', 'Asisten Ahli'),
('IF021', 'Panji Wisnu Wirawan, ST, MT', '198104212008121002', '621048101', 'Penata Muda Tk I / III B', 'Asisten Ahli'),
('IF022', 'Dinar Mutiara ST, MInfo Tech (Comp)', '197601102009122002', '10017603', 'Penata Muda Tk I / III B', 'Asisten Ahli'),
('IF023', 'Sutikno, ST, M.Cs', '197905242009121003', '24057906', 'Penata Muda Tk I / III B', 'Asisten Ahli'),
('IF024', 'nanana', '1234567843211229952', '12345654', 'Penata Tk I / III D', 'Lektor'),
('IF025', 'ninini', '1231127843211229952', '1234321', 'Penata Tk I / III D', 'Lektor');

-- --------------------------------------------------------

--
-- Table structure for table `tb_dosen_non_if`
--

CREATE TABLE IF NOT EXISTS `tb_dosen_non_if` (
  `id_dosen` varchar(11) NOT NULL,
  `nama_dosen` varchar(50) NOT NULL,
  `nip` varchar(30) NOT NULL,
  `nidn` varchar(30) NOT NULL,
  `pangkat` varchar(40) NOT NULL,
  `jabatan` varchar(30) NOT NULL,
  PRIMARY KEY (`id_dosen`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_dosen_non_if`
--

INSERT INTO `tb_dosen_non_if` (`id_dosen`, `nama_dosen`, `nip`, `nidn`, `pangkat`, `jabatan`) VALUES
('NONIF001', 'Lucia Ratnasari, S.Si, M.Si', '197106271998022001', '12345', 'Penata / III C', 'Lektor'),
('NONIF002', 'Abdul Hoyyi, S.Si, M.Si', '197202022008011018', '67890', 'Penata Muda Tk I / III B', 'Asisten Ahli'),
('NONIF003', 'Solikhin, S.Si, M.Si', '195312191979031001', '11121', 'Penata Muda / III A', 'Asisten Ahli'),
('NONIF004', 'kakaka', '1234567898765430016', '12345654', 'Penata Tk I / III D', 'Lektor'),
('NONIF005', 'kikiki', '4565436543456540160', '12345654', 'Penata Tk I / III D', 'Lektor'),
('NONIF006', 'kukuku', '4565456765456540160', '12345654', 'Penata Tk I / III D', 'Lektor'),
('NONIF007', 'kekeke', '4565434565434560000', '12345654', 'Penata Tk I / III D', 'Lektor');

-- --------------------------------------------------------

--
-- Table structure for table `tb_jadwal_kuliah`
--

CREATE TABLE IF NOT EXISTS `tb_jadwal_kuliah` (
  `id_jadwal` int(11) NOT NULL AUTO_INCREMENT,
  `thn_ajar` char(9) NOT NULL,
  `hari` varchar(10) NOT NULL,
  `jammulai` time NOT NULL,
  `jamselesai` time NOT NULL,
  `ruang` varchar(4) NOT NULL,
  `kelas` varchar(10) NOT NULL,
  `semester` varchar(10) NOT NULL,
  `pengampu` int(11) NOT NULL,
  `matkul` int(11) NOT NULL,
  `dosen_1` varchar(11) NOT NULL,
  `dosen_2` varchar(11) NOT NULL,
  PRIMARY KEY (`id_jadwal`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=76 ;

--
-- Dumping data for table `tb_jadwal_kuliah`
--

INSERT INTO `tb_jadwal_kuliah` (`id_jadwal`, `thn_ajar`, `hari`, `jammulai`, `jamselesai`, `ruang`, `kelas`, `semester`, `pengampu`, `matkul`, `dosen_1`, `dosen_2`) VALUES
(27, '2013/2014', 'Selasa', '07:30:00', '09:30:00', '7', 'A', 'Ganjil', 18, 48, 'IF009', 'IF023'),
(28, '2013/2014', 'Rabu', '07:30:00', '09:30:00', '8', 'B', 'Ganjil', 14, 54, 'IF008', 'IF013'),
(60, '2013/2014', 'Kamis', '07:30:00', '09:30:00', '6', 'A', 'Ganjil', 7, 7, 'IF005', 'IF003'),
(69, '2013/2014', 'Senin', '07:30:00', '09:30:00', '6', 'A', 'Ganjil', 8, 55, 'IF005', 'IF003'),
(70, '2013/2014', 'Senin', '13:00:00', '14:40:00', '6', 'A', 'Ganjil', 19, 46, 'IF012', 'IF022'),
(71, '2013/2014', 'Senin', '10:00:00', '11:30:00', '6', 'A', 'Ganjil', 13, 27, 'IF007', 'IF008'),
(75, '2014/2015', 'Senin', '11:40:00', '12:10:00', '6', 'A', 'Ganjil', 5, 16, 'IF004', 'IF009');

-- --------------------------------------------------------

--
-- Table structure for table `tb_jadwal_ujian`
--

CREATE TABLE IF NOT EXISTS `tb_jadwal_ujian` (
  `id_jadwal` int(2) NOT NULL AUTO_INCREMENT,
  `thn_ajar` char(9) NOT NULL,
  `tanggal` date NOT NULL,
  `jammulai` time NOT NULL,
  `jamselesai` time NOT NULL,
  `kelas` varchar(10) NOT NULL,
  `semester` varchar(10) NOT NULL,
  `uts_uas` varchar(3) NOT NULL,
  `peserta` int(11) NOT NULL,
  `pengampu` int(11) NOT NULL,
  `matkul` int(11) NOT NULL,
  `dosen_1` varchar(11) NOT NULL,
  `dosen_2` varchar(11) NOT NULL,
  PRIMARY KEY (`id_jadwal`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=30 ;

--
-- Dumping data for table `tb_jadwal_ujian`
--

INSERT INTO `tb_jadwal_ujian` (`id_jadwal`, `thn_ajar`, `tanggal`, `jammulai`, `jamselesai`, `kelas`, `semester`, `uts_uas`, `peserta`, `pengampu`, `matkul`, `dosen_1`, `dosen_2`) VALUES
(26, '2013/2014', '2014-06-26', '07:30:00', '12:30:00', 'A, B', 'Genap', 'UTS', 50, 1, 4, 'NONIF001', 'IF001'),
(27, '2013/2014', '2014-07-01', '08:30:00', '11:30:00', 'A, B', 'Ganjil', 'UTS', 100, 4, 17, 'IF001', 'IF004'),
(28, '2013/2014', '2014-06-30', '07:30:00', '08:30:00', 'A, B', 'Genap', 'UTS', 50, 7, 7, 'IF005', 'IF003'),
(29, '2013/2014', '2014-06-25', '07:30:00', '09:30:00', 'A, B', 'Genap', 'UTS', 50, 9, 3, 'IF002', 'IF012');

-- --------------------------------------------------------

--
-- Table structure for table `tb_matkul`
--

CREATE TABLE IF NOT EXISTS `tb_matkul` (
  `id_matkul` int(11) NOT NULL AUTO_INCREMENT,
  `kode_matkul` varchar(10) DEFAULT NULL,
  `nama_matkul` varchar(50) DEFAULT NULL,
  `sks` int(2) DEFAULT NULL,
  `semester` enum('Ganjil','Genap','','') DEFAULT NULL,
  `semesterke` varchar(8) NOT NULL,
  PRIMARY KEY (`id_matkul`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=77 ;

--
-- Dumping data for table `tb_matkul`
--

INSERT INTO `tb_matkul` (`id_matkul`, `kode_matkul`, `nama_matkul`, `sks`, `semester`, `semesterke`) VALUES
(1, 'MPK101', 'PENDIDIKAN AGAMA', 2, 'Ganjil', 'I'),
(2, 'MPK103', 'BAHASA INDONESIA', 2, 'Ganjil', 'I'),
(3, 'MWU110', 'TEKNOLOGI INFORMASI', 2, 'Ganjil', 'I'),
(4, 'PAC200', 'MATEMATIKA I', 3, 'Ganjil', 'I'),
(5, 'PAC201', 'STRUKTUR DISKRIT', 4, 'Ganjil', 'I'),
(6, 'PAC210', 'DASAR PEMROGRAMAN', 3, 'Ganjil', 'I'),
(7, 'PAC260', 'LOGIKA DAN SISTEM DIGITAL', 4, 'Ganjil', 'I'),
(8, 'MPK104', 'BAHASA INGGRIS', 2, 'Genap', 'II'),
(9, 'MPK107', 'STATISTIKA', 2, 'Genap', 'II'),
(10, 'MWU108', 'OLAH RAGA', 1, 'Genap', 'II'),
(11, 'PAC202', 'ALJABAR LINIER', 3, 'Genap', 'II'),
(12, 'PAC211', 'ALGORITMA DAN PEMROGRAMAN', 4, 'Genap', 'II'),
(13, 'PAC240', 'ORGANISASI DAN ARSITEKTUR KOMPUTER', 3, 'Genap', 'II'),
(14, 'PAC300', 'MATEMATIKA II', 3, 'Genap', 'II'),
(15, 'MPK102', 'PANCASILA DAN KEWARGANEGARAAN', 3, 'Ganjil', 'III'),
(16, 'PAC203', 'METODE NUMERIK', 3, 'Ganjil', 'III'),
(17, 'PAC204', 'ALGORITMA DAN KOMPLEKSITAS', 2, 'Ganjil', 'III'),
(18, 'PAC212', 'STRUKTUR DATA', 4, 'Ganjil', 'III'),
(19, 'PAC241', 'SISTEM OPERASI', 3, 'Ganjil', 'III'),
(20, 'PAC250', 'SISTEM BERKAS', 3, 'Ganjil', 'III'),
(21, 'PAC205', 'GRAFIKA DAN KOMPUTASI VISUAL', 4, 'Genap', 'IV'),
(22, 'PAC213', 'PEMROGRAMAN BERORIENTASI OBJEK', 4, 'Genap', 'IV'),
(23, 'PAC230', 'INTERAKSI MANUSIA KOMPUTER', 3, 'Genap', 'IV'),
(24, 'PAC242', 'JARINGAN KOMPUTER', 3, 'Genap', 'IV'),
(25, 'PAC252', 'SISTEM BASIS DATA', 4, 'Genap', 'IV'),
(26, 'PAC290', 'KECAKAPAN ANTARPERSONAL', 2, 'Genap', 'IV'),
(27, 'PAC206', 'PENGOLAHAN CITRA DIGITAL', 3, 'Ganjil', 'V'),
(28, 'PAC214', 'PEMROGRAMAN WEB DAN INTERNET', 4, 'Ganjil', 'V'),
(29, 'PAC231', 'REKAYASA PERANGKAT LUNAK', 4, 'Ganjil', 'V'),
(30, 'PAC253', 'SISTEM INFORMASI', 4, 'Ganjil', 'V'),
(31, 'PAC261', 'SISTEM CERDAS', 3, 'Ganjil', 'V'),
(32, 'PAC291', 'METODE DAN PENULISAN RISET', 2, 'Ganjil', 'V'),
(33, 'MWU109', 'KEWIRAUSAHAAN', 2, 'Genap', 'VI'),
(34, 'PAC207', 'TEORI BAHASA DAN OTOMATA', 2, 'Genap', 'VI'),
(35, 'PAC232', 'PROYEK PERANGKAT LUNAK', 4, 'Genap', 'VI'),
(36, 'PAC292', 'MASYARAKAT DAN ETIKA PROFESI', 4, 'Genap', 'VI'),
(37, 'MWU411', 'KULIAH KERJA NYATA', 3, 'Ganjil', 'VII'),
(38, 'PAC297', 'KULIAH KERJA LAPANGAN', 1, 'Ganjil', 'VII'),
(39, 'PAC299', 'TUGAS AKHIR I', 2, 'Ganjil', 'VII'),
(40, 'PAC298', 'PRAKTIK KERJA LAPANGAN', 2, 'Genap', 'VIII'),
(41, 'PAC399', 'TUGAS AKHIR II', 4, 'Genap', 'VIII'),
(42, 'PAC313', 'KOMPILASI DAN BAHASA PEMROGRAMAN', 3, 'Ganjil', 'Pilihan'),
(43, 'PAC311', 'PEMROGRAMAN BERORIENTASI ASPEK', 3, 'Ganjil', 'Pilihan'),
(44, 'PAC335', 'MANAJEMEN PROYEK PERANGKAT LUNAK', 3, 'Ganjil', 'Pilihan'),
(45, 'PAC333', 'ARSITEKTUR DAN POLA PERANGKAT LUNAK', 3, 'Ganjil', 'Pilihan'),
(46, 'PAC331', 'UJI DAN MUTU PERANGKAT LUNAK', 3, 'Ganjil', 'Pilihan'),
(47, 'PAC365', 'MACHINE LEARNING', 3, 'Ganjil', 'Pilihan'),
(48, 'PAC363', 'ALGORITMA GENETIKA', 3, 'Ganjil', 'Pilihan'),
(49, 'PAC361', 'ROBOTIKA', 3, 'Ganjil', 'Pilihan'),
(50, 'PAC345', 'CLOUD COMPUTING', 3, 'Ganjil', 'Pilihan'),
(51, 'PAC343', 'SISTEM TERTANAM', 3, 'Ganjil', 'Pilihan'),
(52, 'PAC341', 'SISTEM MULTIMEDIA', 3, 'Ganjil', 'Pilihan'),
(53, 'PAC325', 'KRIPTOGRAFI', 3, 'Ganjil', 'Pilihan'),
(54, 'PAC323', 'PENGENALAN POLA', 3, 'Ganjil', 'Pilihan'),
(55, 'PAC321', 'OPERASI RISET DAN SIMULASI', 3, 'Ganjil', 'Pilihan'),
(56, 'PAC315', 'PEMROGRAMAN PARALEL', 3, 'Ganjil', 'Pilihan'),
(57, 'PAC351', 'BASIS DATA NONRELASIONAL', 3, 'Ganjil', 'Pilihan'),
(58, 'PAC353', 'AUDIT SISTEM INFORMASI', 3, 'Ganjil', 'Pilihan'),
(59, 'PAC355', 'DATA MINING', 3, 'Ganjil', 'Pilihan'),
(60, 'PAC391A', 'TOPIK KHUSUS', 3, 'Ganjil', 'Pilihan'),
(61, 'PAC391A', 'TOPIK KHUSUS', 3, 'Genap', 'Pilihan'),
(62, 'PAC322', 'SISTEM TEMU BALIK INFORMASI', 3, 'Genap', 'Pilihan'),
(63, 'PAC324', 'KOMPUTASI MUTAKHIR', 3, 'Genap', 'Pilihan'),
(64, 'PAC342', 'SISTEM TERDISTRIBUSI', 3, 'Genap', 'Pilihan'),
(65, 'PAC344', 'KEAMANAN JARINGAN', 3, 'Genap', 'Pilihan'),
(66, 'PAC362', 'LOGIKA FUZZY', 3, 'Genap', 'Pilihan'),
(67, 'PAC364', 'JARINGAN SARAF TIRUAN', 3, 'Genap', 'Pilihan'),
(68, 'PAC332', 'METODE TANGKAS PERANGKAT LUNAK', 3, 'Genap', 'Pilihan'),
(69, 'PAC334', 'REKAYASA ULANG SISTEM', 3, 'Genap', 'Pilihan'),
(70, 'PAC312', 'PEMROGRAMAN ARAS SISTEM', 3, 'Genap', 'Pilihan'),
(71, 'PAC314', 'PEMROGRAMAN KONKUREN', 3, 'Genap', 'Pilihan'),
(72, 'PAC352', 'DATA WAREHOUSE', 3, 'Genap', 'Pilihan'),
(73, 'PAC354', 'ANALISIS DAN PERANCANGAN SI', 3, 'Genap', 'Pilihan'),
(74, 'PAC392', 'STANDARDISASI', 3, 'Genap', 'Pilihan'),
(75, 'Y212', 'abitaa', 3, 'Ganjil', 'VIII'),
(76, 'y213', 'kimiki', 3, 'Ganjil', 'VIII');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengampu`
--

CREATE TABLE IF NOT EXISTS `tb_pengampu` (
  `id_pengampu` int(11) NOT NULL AUTO_INCREMENT,
  `thn_ajar` char(9) NOT NULL,
  `semester` enum('Ganjil','Genap','','') NOT NULL,
  `matkul` int(11) NOT NULL,
  `jumlah_kelas` int(11) NOT NULL,
  `dosen_1` varchar(11) NOT NULL,
  `dosen_2` varchar(11) NOT NULL,
  PRIMARY KEY (`id_pengampu`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- Dumping data for table `tb_pengampu`
--

INSERT INTO `tb_pengampu` (`id_pengampu`, `thn_ajar`, `semester`, `matkul`, `jumlah_kelas`, `dosen_1`, `dosen_2`) VALUES
(1, '2013/2014', 'Ganjil', 4, 2, 'NONIF001', 'IF001'),
(2, '2013/2014', 'Ganjil', 14, 1, 'IF001', 'NONIF001'),
(3, '2013/2014', 'Ganjil', 18, 2, 'IF001', 'IF014'),
(4, '2013/2014', 'Ganjil', 17, 2, 'IF001', 'IF004'),
(5, '2013/2014', 'Ganjil', 16, 2, 'IF004', 'IF009'),
(6, '2013/2014', 'Ganjil', 5, 2, 'IF004', 'IF005'),
(7, '2013/2014', 'Ganjil', 7, 2, 'IF005', 'IF003'),
(8, '2013/2014', 'Ganjil', 55, 1, 'IF005', 'IF003'),
(9, '2013/2014', 'Ganjil', 3, 2, 'IF002', 'IF012'),
(10, '2013/2014', 'Ganjil', 57, 2, 'IF002', 'IF017'),
(11, '2013/2014', 'Ganjil', 19, 2, 'IF007', 'IF020'),
(12, '2013/2014', 'Ganjil', 20, 2, 'IF007', 'IF016'),
(13, '2013/2014', 'Ganjil', 27, 2, 'IF007', 'IF008'),
(14, '2013/2014', 'Ganjil', 54, 2, 'IF008', 'IF013'),
(15, '2013/2014', 'Ganjil', 32, 2, 'IF008', 'NONIF002'),
(16, '2013/2014', 'Ganjil', 53, 2, 'IF008', 'IF013'),
(17, '2013/2014', 'Ganjil', 47, 1, 'IF009', 'IF012'),
(18, '2013/2014', 'Ganjil', 48, 1, 'IF009', 'IF023'),
(19, '2013/2014', 'Ganjil', 46, 1, 'IF012', 'IF022'),
(20, '2013/2014', 'Ganjil', 59, 2, 'IF012', 'IF023'),
(21, '2013/2014', 'Ganjil', 60, 2, 'IF020', 'IF021'),
(22, '2013/2014', 'Ganjil', 52, 2, 'IF020', 'IF014'),
(23, '2013/2014', 'Ganjil', 30, 2, 'IF010', 'IF017'),
(24, '2013/2014', 'Ganjil', 44, 1, 'IF010', 'IF022'),
(25, '2013/2014', 'Ganjil', 28, 1, 'IF010', 'IF014'),
(26, '2013/2014', 'Ganjil', 31, 1, 'IF016', 'IF013'),
(27, '2013/2014', 'Ganjil', 49, 1, 'IF016', 'IF023'),
(28, '2013/2014', 'Ganjil', 6, 2, 'IF013', 'IF023'),
(29, '2013/2014', 'Ganjil', 29, 2, 'IF021', 'IF017'),
(30, '2013/2014', 'Ganjil', 45, 1, 'IF021', 'IF022');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pimpinan`
--

CREATE TABLE IF NOT EXISTS `tb_pimpinan` (
  `id_pimpinan` int(11) NOT NULL AUTO_INCREMENT,
  `jabatan` varchar(20) NOT NULL,
  `nama_pimpinan` varchar(50) DEFAULT NULL,
  `nip` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id_pimpinan`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `tb_pimpinan`
--

INSERT INTO `tb_pimpinan` (`id_pimpinan`, `jabatan`, `nama_pimpinan`, `nip`) VALUES
(1, 'Dekan', 'Dr. Muhammad Nur, DEA', '195711261990011001'),
(2, ' Pembantu Dekan I', 'Dr. Agus Subagio, M.Si', '197108131995121001'),
(4, 'Pembantu Dekan II', 'Dr. Widowati, M.Si', '196902141994032002 '),
(5, 'Pembantu Dekan III', 'Ngadiwiyana, S.Si,M.Si', '196906201999031002'),
(6, 'Ketua Jurusan', 'Nurdin Bahtiar, S.Si, MT', '197907202003121002'),
(7, 'Sekretaris Jurusan', 'Ragil Saputra, S.Si, M.Cs', '198010212005011003'),
(8, 'Koordinator Prodi', 'Sukmawati Nur Endah, S.Si, M.Kom', '197805022005012002');

-- --------------------------------------------------------

--
-- Table structure for table `tb_ruang`
--

CREATE TABLE IF NOT EXISTS `tb_ruang` (
  `id_ruang` int(11) NOT NULL AUTO_INCREMENT,
  `nama_ruang` char(4) NOT NULL,
  `kapasitas_kuliah` int(3) NOT NULL,
  `kapasitas_ujian` int(3) NOT NULL,
  PRIMARY KEY (`id_ruang`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- Dumping data for table `tb_ruang`
--

INSERT INTO `tb_ruang` (`id_ruang`, `nama_ruang`, `kapasitas_kuliah`, `kapasitas_ujian`) VALUES
(6, 'A101', 75, 50),
(7, 'A102', 75, 45),
(8, 'A103', 135, 90),
(9, 'A201', 90, 75),
(10, 'A202', 90, 75),
(11, 'A203', 90, 75),
(12, 'A204', 90, 75),
(13, 'A301', 90, 75),
(14, 'A302', 90, 75),
(15, 'A303', 90, 75),
(16, 'A304', 90, 75),
(17, 'B101', 90, 75),
(18, 'B102', 90, 75),
(19, 'B103', 130, 90),
(20, 'B201', 90, 75),
(21, 'B202', 90, 75),
(22, 'B203', 130, 90),
(23, 'B301', 90, 75),
(24, 'B302', 90, 75),
(25, 'B303', 90, 75),
(27, 'E102', 100, 75),
(28, 'E101', 130, 90),
(29, 'X111', 1000, 900),
(30, 'X112', 1000, 900);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `nama_user` varchar(50) NOT NULL,
  `username` varchar(16) NOT NULL,
  `password` varchar(300) NOT NULL,
  `level` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama_user`, `username`, `password`, `level`, `email`) VALUES
(10, 'operator', 'operator', 'a4a70675825f1ed9830a7ec606421907', 2, 'operator@operator.com'),
(18, 'User', 'User', 'e51d009346f4f02ddb4b6622474c205d', 2, 'user@user.com'),
(13, 'dosen', 'dosen', '698c362365dc8a08aecca713db75a680', 3, 'dosen@dosen.com'),
(17, 'Fachrizal', 'fachriadmin', '66b65567cedbc743bda3417fb813b9ba', 1, 'fachrizallukman17@gmail.com'),
(25, 'admin', 'admin', '66b65567cedbc743bda3417fb813b9ba', 1, 'admin@admin.com');

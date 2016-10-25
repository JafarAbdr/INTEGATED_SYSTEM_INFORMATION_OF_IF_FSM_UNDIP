-- phpMyAdmin SQL Dump
-- version 3.1.3.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 18, 2014 at 12:57 PM
-- Server version: 5.1.33
-- PHP Version: 5.2.9

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sipp`
--

-- --------------------------------------------------------

--
-- Table structure for table `penelitian`
--

CREATE TABLE IF NOT EXISTS `penelitian` (
  `idpenelitian` int(11) NOT NULL AUTO_INCREMENT,
  `judul` varchar(600) DEFAULT NULL,
  `tahun` int(4) NOT NULL,
  `ketua` varchar(100) DEFAULT NULL,
  `anggota` varchar(1000) DEFAULT NULL,
  `sumber_dana` varchar(45) DEFAULT NULL,
  `jenis_dana` varchar(100) NOT NULL,
  `alokasi_dana` int(13) DEFAULT NULL,
  `status` varchar(15) DEFAULT NULL,
  `tempat` varchar(50) NOT NULL,
  `no_kontrak` varchar(35) DEFAULT NULL,
  `tgl_kontrak` varchar(10) NOT NULL,
  `batas_kontrak` varchar(10) DEFAULT NULL,
  `nama_ttd` varchar(45) DEFAULT NULL,
  `user_iduser` int(11) NOT NULL,
  PRIMARY KEY (`idpenelitian`,`user_iduser`),
  KEY `fk_penelitian_user_idx` (`user_iduser`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=106 ;

--
-- Dumping data for table `penelitian`
--

INSERT INTO `penelitian` (`idpenelitian`, `judul`, `tahun`, `ketua`, `anggota`, `sumber_dana`, `jenis_dana`, `alokasi_dana`, `status`, `tempat`, `no_kontrak`, `tgl_kontrak`, `batas_kontrak`, `nama_ttd`, `user_iduser`) VALUES
(80, 'Perancangan Model Basis Data Terdistribusi Nomor Induk Kependudukan Untuk Mendukung Sistem Informasi Administrasi Kependudukan', 2009, '', '', '', '', 5000000, 'Diterima', '', '', '', '', '', 4),
(81, 'Autentifikasi Citra Digital Menggunakan Transformasi Integer Triplet', 2009, '', '', 'DIPA FSM', '', 5000000, 'Usulan', '', '0', '0', '0', '0', 4),
(82, 'Deteksi Pola Perubahan Penggunaan Lahan dan Penutup Lahan di Indonesia Menggunakan Teknik Image Mining', 2009, '', '', 'Lainnya', 'Hibah Riset Mahasiswa Jenjang S2-S3', 10000000, 'Usulan', '', '0', '0', '0', '0', 4),
(84, 'Kajian Penggunaan Layanan Internet oleh Civitas Akademika FMIPA untuk mendukung Kebijakan Penggunaan Internet Perguruan Tinggi', 2011, 'Nurdin Bahtiar, S.Si, MT--197907202003121002', '', 'DIPA FSM', '', 7500000, 'Diterima', '', '', '', '', '', 4),
(85, 'Integrasi Sistem Informasi Berbasis Web Service (Studi Kasus :Wisuda Online)', 2011, 'Ragil Saputra, S.Si, M.Cs--198010212005011003', '', 'DIPA FSM', '', 7500000, 'Diterima', '', '', '', '', '', 4),
(95, 'Pengembangan Model Matematis Berdasarkan Mekanisme Adveksi Dispersi Kualitas Air Limbah Domestik pada Kolam  Stabilisasi Fakultatif (Proposal tahun 2012)', 2013, 'Dra.Sunarsih, M.Si', '', 'DIPA DIKTI', 'Hibah Fundamental', 55000000, 'Diterima', '', '', '', '', '', 4),
(96, 'Pengembangan Perangkat Lunak Papan Tulis Terdistribusi Dengan Memanfaatkan Teknologi Telepon Pintar Sebagai Alat Bantu Proses Pembelajaran', 2012, 'Panji Wisnu Wirawan, ST, MT--198104212008121002', 'Satriyo Adhy, S.Si, MT--198302032006041002//Helmie Arif Wibawa, S.Si, M.Cs--197805162003121001', 'DIPA FSM', 'Pembinaan', 10000000, 'Diterima', '', '', '', '', '', 4),
(97, 'Potensi  Penggunaan Media Sosial Sebagai Pendukung Sistem Informasi Dalam Manajemen Bencana Alam (Untuk Menanggulangi Rob dan Banjir) dI kota Semarang', 2012, 'Dinar Mutiara ST, MInfo Tech (Comp)--197601102009122002', 'Dra. Indriyati, M.Kom--195206101983032001', 'DIPA FSM', 'Pembinaan', 10000000, 'Diterima', '', '', '', '', '', 4),
(98, 'Penerapan Jaringan Syaraf Tiruan Backpropagation Untuk Pengendalian Sudut Arah Mobile Robot', 2012, 'Sutikno, ST, M.Cs--197905242009121003', 'Priyo Sidik Sasongko, S.Si, M.Kom--197007051997021001//Helmie Arif Wibawa, S.Si, M.Cs--197805162003121001', 'DIPA FSM', 'Pembinaan', 10000000, 'Diterima', '', '', '', '', '', 4),
(99, 'Pelatihan Aplikasi Software MAPLE dalam pembelajaran Matematika', 2010, '', '', 'DIPA FSM', '', 5000000, 'Diterima', '', '', '', '', '', 4),
(105, 'Penelitian Anggota', 2014, 'Drs. Suhartono, M.Kom--195504071983031003', 'Drs. Kushartantya, MIKomp--195003011979031003', 'DIPA UNDIP', 'Pembinaan', 200000000, 'Diterima', 'Sma 2 Semarang', '2324234', '01-07-2014', '28-06-2014', 'Prof Sudarto', 8);

-- --------------------------------------------------------

--
-- Table structure for table `pengabdian`
--

CREATE TABLE IF NOT EXISTS `pengabdian` (
  `idpengabdian` int(11) NOT NULL AUTO_INCREMENT,
  `judul` varchar(600) DEFAULT NULL,
  `tahun` int(4) NOT NULL,
  `ketua` varchar(100) DEFAULT NULL,
  `anggota` varchar(1000) DEFAULT NULL,
  `sumber_dana` varchar(45) DEFAULT NULL,
  `jenis_dana` varchar(100) NOT NULL,
  `alokasi_dana` int(13) DEFAULT NULL,
  `status` varchar(15) DEFAULT NULL,
  `tempat` varchar(50) NOT NULL,
  `no_kontrak` varchar(35) DEFAULT NULL,
  `tgl_kontrak` varchar(10) DEFAULT NULL,
  `batas_kontrak` varchar(10) DEFAULT NULL,
  `nama_ttd` varchar(45) DEFAULT NULL,
  `user_iduser` int(11) NOT NULL,
  PRIMARY KEY (`idpengabdian`,`user_iduser`),
  KEY `fk_pengabdian_user1_idx` (`user_iduser`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `pengabdian`
--

INSERT INTO `pengabdian` (`idpengabdian`, `judul`, `tahun`, `ketua`, `anggota`, `sumber_dana`, `jenis_dana`, `alokasi_dana`, `status`, `tempat`, `no_kontrak`, `tgl_kontrak`, `batas_kontrak`, `nama_ttd`, `user_iduser`) VALUES
(5, 'Pengabdian kepada Masyarakat Terprogram Pendampingan Kelas Akselerasi Matematika di SMP Negeri 2 Semarang', 2009, 'Drs. Kushartantya, MIKomp--195003011979031003', 'Priyo Sidik Sasongko, S.Si, M.Kom--197007051997021001', 'DIPA FSM', '', 22800000, 'Diterima', 'SMP Negeri 2 Semarang', '', '', '', '', 4),
(6, 'Pelatihan  Analisis Data Statistika bagi Peneliti Balitbang Departemen Agama Provinsi Jawa Tengah', 2010, '', '', 'DIPA FSM', '', 5000000, 'Diterima', '', '', '', '', '', 4),
(7, 'Pelatihan e-learning untuk Meningkatkan Kemampuan Proses Belajar Mengajar secara Elektronik Bagi Guru-guru SMP/SMA se-Jawa Tengah', 2010, '', '', 'DIPA FSM', '', 5000000, 'Diterima', '', '', '', '', '', 4),
(8, 'Pelatihan Penggunaan Media E-Learning Sebagai Sarana Pendukung Proses Belajar Mengajar Bagi Guru-Guru SMP/SMA di Kota Semarang', 2011, '', '', 'DIPA FSM', '', 7500000, 'Diterima', '', '', '', '', '', 4),
(9, 'IbM Takmir dan Lembaga Amil Zakat Online Masjid Baiturahman Semarang Sebagai Perluasan Informasi, Transaksi dan Penyaluran (Proposal tahun 2012)', 2013, '', '', 'DIPA DIKTI', '', 50000000, 'Diterima', '', '', '', '', '', 4),
(10, 'IbIKK - Pusat Pengembangan Informasi Digital (Puspital)', 2014, 'Drs. Djalal Er Riyanto, MIKomp--195412191980031003', '', 'DIPA DIKTI', '', 200000000, 'Diterima', '', '', '', '', '', 4),
(11, 'IbM - Mobile Application sebagai Media Edukasi Dan Penyebaran Informasi Takmir dan Lembaga Amil Zakat Masjid Baiturahman Semarang', 2014, 'Priyo Sidik Sasongko, S.Si, M.Kom--197007051997021001', '', 'DIPA DIKTI', '', 50000000, 'Diterima', '', '', '', '', '', 4),
(12, 'IbM - Strategi Pemasaran Berbasis Ecommerce Pada Klaster Sirup Terong Belanda', 2014, 'Indra Waspada, ST, MTI--197902122008121002', '', 'DIPA DIKTI', '', 50000000, 'Diterima', '', '', '', '', '', 4),
(13, 'IbM - E-Learning Untuk SMP Di Kabupaten Blora', 2014, 'Aris Sugiharto, S.Si, M.Kom--197108111997021004', '', 'DIPA DIKTI', '', 50000000, 'Diterima', '', '', '', '', '', 4);

-- --------------------------------------------------------

--
-- Table structure for table `upload`
--

CREATE TABLE IF NOT EXISTS `upload` (
  `no` int(11) NOT NULL AUTO_INCREMENT,
  `nama` mediumtext NOT NULL,
  `upload_user` mediumtext NOT NULL,
  `jenis_file` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL,
  PRIMARY KEY (`no`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `upload`
--


-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `iduser` int(11) NOT NULL AUTO_INCREMENT,
  `password` varchar(50) DEFAULT NULL,
  `nip` bigint(19) NOT NULL,
  `nama` varchar(45) DEFAULT NULL,
  `level` int(1) DEFAULT NULL,
  PRIMARY KEY (`iduser`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=32 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`iduser`, `password`, `nip`, `nama`, `level`) VALUES
(4, '25d55ad283aa400af464c76d713c07ad', 123456123456123456, 'Admin Jurusan', 2),
(5, '25d55ad283aa400af464c76d713c07ad', 123456789123456789, 'Jurusan', 3),
(8, '25d55ad283aa400af464c76d713c07ad', 195003011979031003, 'Drs. Kushartantya, MIKomp', 1),
(9, '25d55ad283aa400af464c76d713c07ad', 195412191980031003, 'Drs. Djalal Er Riyanto, MIKomp', 1),
(10, '25d55ad283aa400af464c76d713c07ad', 195306281980031001, 'Drs. Putut Sri Wasito, M.Kom', 1),
(11, '25d55ad283aa400af464c76d713c07ad', 195504071983031003, 'Drs. Suhartono, M.Kom', 1),
(12, '25d55ad283aa400af464c76d713c07ad', 195206101983032001, 'Dra. Indriyati, M.Kom', 1),
(13, '25d55ad283aa400af464c76d713c07ad', 195905151986031003, 'Drs. B. Bambang Yismianto', 1),
(14, '25d55ad283aa400af464c76d713c07ad', 196511071992031003, 'Drs. Eko Adi Sarwoko, M.Kom', 1),
(15, '25d55ad283aa400af464c76d713c07ad', 197108111997021004, 'Aris Sugiharto, S.Si, M.Kom', 1),
(16, '25d55ad283aa400af464c76d713c07ad', 197007051997021001, 'Priyo Sidik Sasongko, S.Si, M.Kom', 1),
(17, '25d55ad283aa400af464c76d713c07ad', 197308291998022001, 'Beta Noranita, S.Si, M.Kom', 1),
(18, '25d55ad283aa400af464c76d713c07ad', 197404011999031002, 'Aris Puji Widodo, S.Si, MT', 1),
(19, '25d55ad283aa400af464c76d713c07ad', 197907202003121002, 'Nurdin Bahtiar, S.Si, MT', 1),
(20, '25d55ad283aa400af464c76d713c07ad', 197805162003121001, 'Helmie Arif Wibawa, S.Si, M.Cs', 1),
(21, '25d55ad283aa400af464c76d713c07ad', 198010212005011003, 'Ragil Saputra, S.Si, M.Cs', 1),
(22, '25d55ad283aa400af464c76d713c07ad', 198104202005012001, 'Retno Kusumaningrum, S.Si, M.Kom', 1),
(23, '25d55ad283aa400af464c76d713c07ad', 197805022005012002, 'Sukmawati Nur Endah, S.Si, M.Kom', 1),
(24, '25d55ad283aa400af464c76d713c07ad', 198302032006041002, 'Satriyo Adhy, S.Si, MT', 1),
(25, '25d55ad283aa400af464c76d713c07ad', 198009142006041002, 'Edy Suharto, ST', 1),
(26, '25d55ad283aa400af464c76d713c07ad', 198203092006041002, 'Adi Wibowo, S.Si, M.Kom', 1),
(27, '25d55ad283aa400af464c76d713c07ad', 197902122008121002, 'Indra Waspada, ST, MTI', 1),
(28, '25d55ad283aa400af464c76d713c07ad', 198104212008121002, 'Panji Wisnu Wirawan, ST, MT', 1),
(29, '25d55ad283aa400af464c76d713c07ad', 197601102009122002, 'Dinar Mutiara ST, MInfo Tech (Comp)', 1),
(30, '25d55ad283aa400af464c76d713c07ad', 197905242009121003, 'Sutikno, ST, M.Cs', 1),
(31, '25d55ad283aa400af464c76d713c07ad', 123456789010101010, 'Nurdin B', 1);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `penelitian`
--
ALTER TABLE `penelitian`
  ADD CONSTRAINT `fk_penelitian_user` FOREIGN KEY (`user_iduser`) REFERENCES `user` (`iduser`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `pengabdian`
--
ALTER TABLE `pengabdian`
  ADD CONSTRAINT `fk_pengabdian_user1` FOREIGN KEY (`user_iduser`) REFERENCES `user` (`iduser`) ON DELETE NO ACTION ON UPDATE NO ACTION;

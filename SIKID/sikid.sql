-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 21, 2015 at 03:46 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sikid`
--

-- --------------------------------------------------------

--
-- Table structure for table `ak_jurnal`
--

CREATE TABLE IF NOT EXISTS `ak_jurnal` (
  `id_ak_jurnal` int(1) NOT NULL,
  `internasional` int(200) DEFAULT NULL,
  `nasional_terakreditasi` int(200) DEFAULT NULL,
  `nasional_tidak_terakreditasi` int(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ak_jurnal`
--

INSERT INTO `ak_jurnal` (`id_ak_jurnal`, `internasional`, `nasional_terakreditasi`, `nasional_tidak_terakreditasi`) VALUES
(5, 25, 15, 10);

-- --------------------------------------------------------

--
-- Table structure for table `ak_prosiding`
--

CREATE TABLE IF NOT EXISTS `ak_prosiding` (
  `id_ak_prosiding` int(1) NOT NULL,
  `internasional` int(200) DEFAULT NULL,
  `nasional` int(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ak_prosiding`
--

INSERT INTO `ak_prosiding` (`id_ak_prosiding`, `internasional`, `nasional`) VALUES
(5, 15, 10);

-- --------------------------------------------------------

--
-- Table structure for table `jurnal`
--

CREATE TABLE IF NOT EXISTS `jurnal` (
  `idjurnal` int(11) NOT NULL AUTO_INCREMENT,
  `judul` varchar(600) NOT NULL,
  `nama_jurnal` varchar(100) NOT NULL,
  `nomor_volume` varchar(50) DEFAULT NULL,
  `issn` varchar(50) DEFAULT NULL,
  `edisi` varchar(50) NOT NULL,
  `penerbit` varchar(50) DEFAULT NULL,
  `url` varchar(100) NOT NULL,
  `halaman` varchar(50) DEFAULT NULL,
  `tahun` int(4) NOT NULL,
  `semester` varchar(6) DEFAULT NULL,
  `ketua` varchar(100) DEFAULT NULL,
  `anggota` varchar(100) DEFAULT NULL,
  `kategori` varchar(50) DEFAULT NULL,
  `user_iduser` int(11) NOT NULL,
  PRIMARY KEY (`idjurnal`,`user_iduser`),
  KEY `fk_penelitian_user_idx` (`user_iduser`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=165 ;

--
-- Dumping data for table `jurnal`
--

INSERT INTO `jurnal` (`idjurnal`, `judul`, `nama_jurnal`, `nomor_volume`, `issn`, `edisi`, `penerbit`, `url`, `halaman`, `tahun`, `semester`, `ketua`, `anggota`, `kategori`, `user_iduser`) VALUES
(107, 'Prediksi Curah Hujan Dengan Metode GRRN (General Regression Neural Network) Untuk Menentukan Pola Tanam Padi Dan Palawija Di Jawa Tengah', 'Jurnal BALITBANG Provinsi JATENG', '', '', '', '', '', '', 2008, 'ganjil', 'Aris Sugiharto, S.Si, M.Kom--197108111997021004', '', 'Nasional Tidak Terakreditasi', 4),
(108, 'Analisa Best Practice Service Level Management (Slm) Cisco Menggunakan Kriteria Kelengkapan Dari Thomas Schaaf', 'Jurnal Masyarakat Informatika ', '2 / 1', 'ISSN 2086-4930', 'Oktober 2010', '', '', '', 2010, 'genap', 'Indra Waspada, ST, MTI--197902122008121002', '', 'Nasional Terakreditasi', 4),
(109, 'Aplikasi Diagnosis Penyakit Pada Hewan Ternak Sapi', 'Jurnal Masyarakat Informatika ', '2 / 1', '2086-4930', 'Oktober 2010', '', '', '', 2010, 'genap', 'Beta Noranita, S.Si, M.Kom--197308291998022001', 'Nurdin Bahtiar, S.Si, MT--197907202003121002', 'Nasional Terakreditasi', 4),
(110, 'Deteksi Sidik Jari Dengan Neural Network Backpropagation Dan Transformasi Wavelet Diskrit', 'Jurnal Masyarakat Informatika ', '2 / 1', '', 'Oktober 2010', '', '', '', 2010, 'genap', 'Ragil Saputra, S.Si, M.Cs--198010212005011003', 'Aris Sugiharto, S.Si, M.Kom--197108111997021004', 'Nasional Terakreditasi', 4),
(111, 'Efek Fungsi Rcc Dalam Autentikasi Citra Berwarna Berbasis Transformasi Integer', 'Jurnal Matematika', '3 / 13', '', 'Desember 2010', '', '', '', 2010, 'genap', 'Helmie Arif Wibawa, S.Si, M.Cs--197805162003121001', '', 'Nasional Terakreditasi', 4),
(112, 'Efek Parameter Quality Pada Kompresi Jpeg Terhadap Kualitas Citra Digital Dan Rasio Kompresi', 'Majalah Ilmiah Jurnal Masyarakat Informatika  ', '1 / 1', '2086-4930', 'April 2010', '', '', '10 (halaman 43-52)', 2010, 'genap', 'Helmie Arif Wibawa, S.Si, M.Cs--197805162003121001', 'Aris Sugiharto, S.Si, M.Kom--197108111997021004', 'Nasional Terakreditasi', 4),
(113, 'Human Behavior Classification Using Thinning Algorithm And Support Vector Machine', 'Majalah Ilmiah Journal of Advanced Computational Intelligence and Intelligent Informatics ', '1 / 14', '1343-0130', 'Januari 2010', '', '', '7 (halaman 28-34)', 2010, 'ganjil', 'Sukmawati Nur Endah, S.Si, M.Kom--197805022005012002', '', 'Internasional', 4),
(114, 'Pembangunan Prototype Sistem Informasi Administrasi Kependudukan Berbasis Data Terdistribusi', 'Jurnal Sistem Informasi', '1 / 6', '', '2010', '', '', '', 2010, 'ganjil', 'Beta Noranita, S.Si, M.Kom--197308291998022001', 'Drs. Djalal Er Riyanto, MIKomp--195412191980031003//Adi Wibowo, S.Si, M.Kom--198203092006041002', 'Nasional Tidak Terakreditasi', 4),
(115, 'Pengaruh Pemilihan Arah Ketetanggaan Piksel Dalam Proses Watermarking Pada Metode Transformasi Integer', 'Jurnal Matematika', '2 / 13', '', 'Agustus 2010', '', '', '', 2010, 'genap', 'Helmie Arif Wibawa, S.Si, M.Cs--197805162003121001', '', 'Nasional Tidak Terakreditasi', 4),
(116, 'Self-Organizing Urban Traffic Control Architecture With Swarm-Self Organizing Map In Jakarta: Signal Control System And Simulator', 'International Journal on Smart Sensing and Intelligent Systems', '3 / 3', '', 'September 2010', '', '', '', 2010, 'genap', 'Adi Wibowo, S.Si, M.Kom--198203092006041002', '', 'Internasional', 4),
(117, 'Sistem Inferensi  Fuzzy Untuk Menentukan Sensasi Citra Warna', 'Majalah Ilmiah Jurnal Masyarakat Informatika  ', '2 / 1', '2086-4930', 'Oktober 2010', '', '', '', 2010, 'genap', 'Sukmawati Nur Endah, S.Si, M.Kom--197805022005012002', 'Priyo Sidik Sasongko, S.Si, M.Kom--197007051997021001//Helmie Arif Wibawa, S.Si, M.Cs--1978051620031', 'Nasional Terakreditasi', 4),
(118, 'Sistem Informasi Vegetasi Mangrove (SIVM) Berbasis Web Di Taman Nasional Karimunjawa, Jepara, Jawa Tengah', 'Majalah Ilmiah Jurnal Masyarakat Informatika  ', '1 / 1', '2086-4930', 'April 2010', '', '', '10 (halaman 43-52)', 2010, 'genap', 'Sukmawati Nur Endah, S.Si, M.Kom--197805022005012002', 'Retno Kusumaningrum, S.Si, M.Kom--198104202005012001', 'Nasional Terakreditasi', 4),
(119, 'Penyelesaian Masalah Job Shop Scheduling Dengan Algoritma Genetika', 'Jurnal Masyarakat Informatika', '1 / 1', '', 'April 2010', '', '', '', 2010, 'genap', 'Drs. Kushartantya, MIKomp--195003011979031003', 'Satriyo Adhy, S.Si, MT--198302032006041002', 'Nasional Tidak Terakreditasi', 4),
(120, 'Pemilihan Dosen Berprestasi Dengan Metode Topsis', 'Jurnal Masyarakat Informatika', '2 / 1', '', 'Oktober 2010', '', '', '', 2010, 'genap', 'Dra. Indriyati, M.Kom--195206101983032001', '', 'Nasional Tidak Terakreditasi', 4),
(121, 'Color And Texture Feature For Remote Sensing - Image Retrieval System: A Comparative Study', 'International Journal of Computer Science Issues (IJCSI), ', '2 / 8', '', '2011', '', '', '', 2011, 'ganjil', 'Retno Kusumaningrum, S.Si, M.Kom--198104202005012001', '', 'Internasional', 4),
(122, 'Pengembangan Sistem Informasi Administrasi Pemeriksaan Pasien Di Instalasi Radiologi Rsud Kajen Dengan Unified Process', 'Jurnal Masyarakat Informatika', '4 / 2', '2086 – 4930', 'Oktober 2011', '', '', '', 2011, 'genap', 'Priyo Sidik Sasongko, S.Si, M.Kom--197007051997021001', 'Drs. Suhartono, M.Kom--195504071983031003', 'Nasional Terakreditasi', 4),
(123, 'Pengembangan Sistem Informasi Seleksi Beasiswa Unggulan P3swot Kemdiknas Online Menggunakan Unified Process', 'Jurnal Masyarakat Informatika', '4 / 2', '2086 – 4930', 'Oktober 2011', '', '', '', 2011, 'genap', 'Priyo Sidik Sasongko, S.Si, M.Kom--197007051997021001', 'Edy Suharto, ST--198009142006041002', 'Nasional Terakreditasi', 4),
(124, 'Perbandingan Metode Defuzzifikasi Sistem Kendali Logika Fuzzy Model Mamdani Pada Motor Dc', 'Jurnal Masyarakat Informatika', '3 / 2', '', '2011', '', '', '', 2011, 'ganjil', 'Sutikno, ST, M.Cs--197905242009121003', '', 'Nasional Tidak Terakreditasi', 4),
(125, 'Sistem Informasi Geografis Pemetaan Sekolah Tingkat Pendidikan Dasar Dan Menengah Di Kota Semarang', 'Jurnal Masyarakat Informatika ', '3 / 2', '2086-4930', 'April 2011', '', '', '', 2011, 'genap', 'Priyo Sidik Sasongko, S.Si, M.Kom--197007051997021001', '', 'Nasional Terakreditasi', 4),
(126, 'Sistem Informasi Geografis Pencarian Rute Optimum Obyek Wisata Kota Yogyakarta Dengan Algoritma Floyd-Warshall', 'Jurnal Matematika', '1 / 14', '', 'April 2011', '', '', '', 2010, 'genap', 'Ragil Saputra, S.Si, M.Cs--198010212005011003', '', 'Nasional Tidak Terakreditasi', 4),
(127, 'Sistem Informasi Tugas Akhir & Praktek Kerja Lapangan Berbasis Web Menggunakan Metode Unified Process', 'Jurnal Masyarakat Informatika', '3 / 2', '2086-4930', 'April 2011', '', '', '', 2011, 'genap', 'Drs. Eko Adi Sarwoko, M.Kom--196511071992031003', 'Dra. Indriyati, M.Kom--195206101983032001', 'Nasional Terakreditasi', 4),
(128, 'Sistem Monitoring Jaringan Pada Server Linux Dengan Menggunakan SMS Gateway', 'Jurnal Masyarakat Informatika', '3 / 2', '', 'April 2011', '', '', '', 2011, 'genap', 'Drs. Kushartantya, MIKomp--195003011979031003', 'Helmie Arif Wibawa, S.Si, M.Cs--197805162003121001', 'Nasional Tidak Terakreditasi', 4),
(129, 'Sistem Pemesanan Tiket Pada Joglosemar Executive Shuttle Bus Semarang', 'Jurnal Masyarakat Informatika', '4 / 2', '', 'Oktober 2011', '', '', '', 2011, 'genap', 'Sukmawati Nur Endah, S.Si, M.Kom--197805022005012002', 'Nurdin Bahtiar, S.Si, MT--197907202003121002', 'Nasional Tidak Terakreditasi', 4),
(130, 'Ultrasonic Computed Tomography System  For  Concrete Inspection', 'International Journal of Civil & Environmental Engineering IJCEE-IJENS ', '5 / 11', '', '2011', '', '', '', 2011, 'ganjil', 'Aris Sugiharto, S.Si, M.Kom--197108111997021004', '', 'Internasional', 4),
(131, 'Integrasi Laporan Demam Berdarah Dengue (Dbd) Menggunakan Teknologi Web Service', 'Jurnal Masyarakat Informatika ', '', '', 'April 2012', '', '', '', 2012, 'genap', 'Ragil Saputra, S.Si, M.Cs--198010212005011003', '', 'Nasional Tidak Terakreditasi', 4),
(139, 'Testing Judul Jurnal', 'Testing Nama Jurnal', '2 / 1', '2664-8527', 'Mei 2009', 'Penerbit', '', '20', 2007, 'genap', 'Ragil Saputra, S.Si, M.Cs--198010212005011003', 'Drs. Kushartantya, MIKomp--195003011979031003', 'Internasional', 4),
(140, 'Pendeteksi Tepi Citra Digital dengan Logika Fuzzy', '', 'Vol 4', '', '8', 'Jurnal Masyarakat Informatika', '', '', 2013, 'ganjil', 'Drs. Kushartantya, MIKomp--195003011979031003', 'Aris Sugiharto, S.Si, M.Kom--197108111997021004', 'Nasional Terakreditasi', 4),
(141, 'Sistem Pakar Berbasis Web dengan Metode Probabilitas Klasik Untuk Diagnosa Penyakit Tuberkulosis Pada Manusia Dewasa', '', 'Vol 4', '', '8', 'Jurnal Masyarakat Informatika', '', '', 2013, 'ganjil', 'Drs. Kushartantya, MIKomp--195003011979031003', '', 'Nasional Terakreditasi', 4),
(142, 'Sistem Pakar Berbasis Web dengan Metode Probabilitas Klasik Untuk Diagnosa Penyakit Tuberkulosis Pada Manusia Dewasa', '', 'Vol 4', '', '8', 'Jurnal Masyarakat Informatika', '', '', 2013, 'ganjil', 'Drs. Suhartono, M.Kom--195504071983031003', 'Drs. Kushartantya, MIKomp--195003011979031003', 'Nasional Terakreditasi', 4),
(143, 'Implementasi Logical Level Approach dalam Konversi Data Sebagai Rangkaian Database Reengineering', '', 'Vol 4', '', '8', 'Jurnal Masyarakat Informatika', '', '', 2013, 'ganjil', 'Helmie Arif Wibawa, S.Si, M.Cs--197805162003121001', '', 'Nasional Terakreditasi', 4),
(144, 'Perancangan dan Pembuatan Mobile Learning Interaktif  Berbasis Android dengan Metode Personal Extreme Programming', '', 'Vol 4', '', '8', 'Jurnal Masyarakat Informatika', '', '', 2013, 'ganjil', 'Panji Wisnu Wirawan, ST, MT--198104212008121002', 'Satriyo Adhy, S.Si, MT--198302032006041002', 'Nasional Terakreditasi', 4),
(145, 'Sistem Rekomendasi Artikel Ilmiah Relevan dengan Vektor Space Model dan Algoritma Rocchio', '', 'No 2 / Vol 16', '', '', 'Jurnal Matematika', '', '', 2013, 'ganjil', 'Panji Wisnu Wirawan, ST, MT--198104212008121002', 'Dra. Indriyati, M.Kom--195206101983032001', 'Nasional Terakreditasi', 4),
(146, 'Aplikasi Berbasis Web Penyelesaian Masalah Program Linier Standar Maksimal dengan Keluaran Sesuai Produk Kemasan Terkecil', '', 'Vol 4', '', '8', '', '', '', 2013, 'ganjil', 'Drs. Putut Sri Wasito, M.Kom--195306281980031001', '', 'Nasional Terakreditasi', 4),
(147, 'Sistem Akuisisi Data Komputer pada Sensor Ultrasonic Ranger untuk Pengukuran Level Muka Air', '', 'No 4 / Vol 16', '', '', 'Jurnal Berkala Fisika', '', '', 2013, 'ganjil', 'Ragil Saputra, S.Si, M.Cs--198010212005011003', '', 'Nasional Terakreditasi', 4),
(148, 'Kerangka Pemilihan Perangkat Lunak Service Desk sebagai Rekomendasi Implementasi IT Service Management (ITSM) (Studi Kasus: UP2TI Fakultas Sains dan Matematika Universitas Diponegoro)', '', 'No 2 / Vol 9', '', 'Juni', 'Jurnal Ilmiah Himsya Tech', '', '', 2013, 'ganjil', 'Nurdin Bahtiar, S.Si, MT--197907202003121002', 'Ragil Saputra, S.Si, M.Cs--198010212005011003//Indra Waspada, ST, MTI--197902122008121002', 'Nasional Terakreditasi', 4),
(149, 'Integrasi Chatbot Berbasis AIML pada Website E-commerce sebagai Virtual Assistant dalam Pencarian dan Pemesanan Produk (Studi Kaus Toko Buku Online Edu4indo.com)', '', 'No 2 / Vol 9', '', 'Juni', 'Jurnal Masyarakat Informatika', '', '', 2013, 'ganjil', 'Indra Waspada, ST, MTI--197902122008121002', 'Nurdin Bahtiar, S.Si, MT--197907202003121002', 'Nasional Terakreditasi', 4),
(150, 'Optical Character Recognition Menggunakan Algoritma Template Matching Correlation', '', '9 / 5', '', 'April', 'Jurnal Masyarakat Informatika', '', '', 2014, 'ganjil', 'Aris Sugiharto, S.Si, M.Kom--197108111997021004', 'Sukmawati Nur Endah, S.Si, M.Kom--197805022005012002', 'Nasional Terakreditasi', 4),
(151, 'Pendeteksian Tepi Citra Digital Dengan Logika Fuzzy', '', 'Vol 4', '', '8', 'Jurnal Masyarakat Informatika', '', '', 2013, 'genap', 'Aris Sugiharto, S.Si, M.Kom--197108111997021004', 'Drs. Kushartantya, MIKomp--195003011979031003', 'Nasional Terakreditasi', 4),
(152, 'Sistem Informasi Pengelolaan Arsip Statis pada Badan Arsip dan Perpustakaan Provinsi Jawa Tengah Menggunakan Vector Space Model', '', '9 / 5', '', 'April', 'Jurnal Masyarakat Informatika', '', '', 2014, 'genap', 'Ragil Saputra, S.Si, M.Cs--198010212005011003', 'Drs. Djalal Er Riyanto, MIKomp--195412191980031003', 'Nasional Terakreditasi', 4),
(153, 'Sistem Pakar Berbasis Web Dengan Metode Probabilitas Klasik Untuk Diagnosa Penyakit Tuberkulosis Pada Manusia Dewasa', '', 'Vol 4', '', '8', 'Jurnal Masyarakat Informatika', '', '', 2013, 'genap', 'Drs. Suhartono, M.Kom--195504071983031003', 'Drs. Kushartantya, MIKomp--195003011979031003', 'Nasional Terakreditasi', 4),
(154, 'Sistem Pendukung Keputusan Pemilihan Hotel Di Kota Semarang Berbasis Web dengan Metode Fuzzy Analytical Hierarchy Process (FAHP)', '', '9 / 5', '', 'April', 'Jurnal Masyarakat Informatika', '', '', 2014, 'genap', 'Priyo Sidik Sasongko, S.Si, M.Kom--197007051997021001', 'Dra. Indriyati, M.Kom--195206101983032001', 'Nasional Terakreditasi', 4),
(155, 'Aplikasi Prediksi Jumlah Pe¬nderita Penyakit Demam Berdarah Dengan di Kota Semarang Menggunakan Jaringan Syaraf iruan Backpropagation', '', '10 / 5', '', 'Oktober', 'Jurnal Masyarakat Informatika', '', '', 2014, 'genap', 'Sutikno, ST, M.Cs--197905242009121003', 'Dra. Indriyati, M.Kom--195206101983032001', 'Nasional Terakreditasi', 4),
(156, 'Sistem Penjadwalan Ujian Doktor pada Pascasarjana Universitas Diponegoro', '', '9 / 5', '', 'April', 'Jurnal Masyarakat Informatika', '', '', 2014, 'genap', 'Sukmawati Nur Endah, S.Si, M.Kom--197805022005012002', '', 'Nasional Terakreditasi', 4),
(157, 'Sistem Informasi Pelaporan Monitoring Dan Evaluasi Program Kesehatan Ibu Dan Anak Di Provinsi Jawa Tengah', '', '9 / 5', '', 'April', 'Jurnal Masyarakat Informatika', '', '', 2014, 'genap', 'Beta Noranita, S.Si, M.Kom--197308291998022001', 'Nurdin Bahtiar, S.Si, MT--197907202003121002', 'Internasional', 4),
(158, 'Mobile Application Sebagai Media Edukasi dan Penyebaran Informasi Takmir dan Lembaga Amil Zakat Masjid Baiturahman Semarang', '', '10 / 5', '', 'Oktober', 'Jurnal Masyarakat Informatika', '', '', 2014, 'genap', 'Priyo Sidik Sasongko, S.Si, M.Kom--197007051997021001', 'Helmie Arif Wibawa, S.Si, M.Cs--197805162003121001//Ragil Saputra, S.Si, M.Cs--198010212005011003', 'Nasional Terakreditasi', 4),
(159, 'Integrasi Chatbot Berbasis AIML Pada Website E-Commerce Sebagai Virtual Assistant dalam Pencarian dan Pemesanan Produk (Studi Kasus Toko Buku Online Edu4indo.com)', '', '10 / 5', '', 'Oktober', 'Jurnal Masyarakat Informatika', '', '', 2014, 'genap', 'Indra Waspada, ST, MTI--197902122008121002', 'Nurdin Bahtiar, S.Si, MT--197907202003121002', 'Nasional Terakreditasi', 4),
(160, 'Implementasi Logical Level Approach dalam Konversi Data Sebagai Rangkaian Database Reengineering', '', 'Vol 4', '', '8', 'Jurnal Masyarakat Informatika', '', '', 2013, 'genap', 'Helmie Arif Wibawa, S.Si, M.Cs--197805162003121001', '', 'Nasional Terakreditasi', 4),
(161, 'Implementasi Interpretive Transformer Approach Dalam Migrasi Data sebagai Rangkaian Database Reengineering', '', '9 / 5', '', 'April', 'Jurnal Masyarakat Informatika', '', '', 2014, 'genap', 'Helmie Arif Wibawa, S.Si, M.Cs--197805162003121001', '', 'Nasional Terakreditasi', 4),
(162, 'Aplikasi Berbasis Web Penyelesaian Masalah Program Linier Standar Maksimal dengan Keluaran Sesuai Produk Kemasan Terkecil', '', 'Vol 4', '', '8', '', '', '', 2013, 'genap', 'Drs. Putut Sri Wasito, M.Kom--195306281980031001', '', 'Nasional Terakreditasi', 4),
(163, 'Perancangan dan Pembuatan Mobile Learning Interaktif  Berbasis Android dengan Metode Personal Extreme Programming', '', 'Vol 4', '', '8', 'Jurnal Masyarakat Informatika', '', '', 2013, 'genap', 'Panji Wisnu Wirawan, ST, MT--198104212008121002', 'Satriyo Adhy, S.Si, MT--198302032006041002', 'Nasional Terakreditasi', 4),
(164, 'Perancangan dan Implementasi Jaringan Saraf Tiruan Backpropagation untuk Mendiagnosa Penyakit Kulit', '', '10 / 5', '', 'Oktober', 'Jurnal Masyarakat Informatika', '', '', 2014, 'genap', 'Panji Wisnu Wirawan, ST, MT--198104212008121002', 'Satriyo Adhy, S.Si, MT--198302032006041002', 'Nasional Terakreditasi', 4);

-- --------------------------------------------------------

--
-- Table structure for table `prosiding`
--

CREATE TABLE IF NOT EXISTS `prosiding` (
  `idprosiding` int(11) NOT NULL AUTO_INCREMENT,
  `judul` varchar(600) DEFAULT NULL,
  `nama_makalah` varchar(100) NOT NULL,
  `isbn` varchar(50) NOT NULL,
  `sertifikat` varchar(50) NOT NULL,
  `halaman` varchar(50) NOT NULL,
  `url` varchar(100) NOT NULL,
  `penerbit` varchar(50) DEFAULT NULL,
  `tahun` int(4) NOT NULL,
  `semester` varchar(6) DEFAULT NULL,
  `ketua` varchar(100) DEFAULT NULL,
  `anggota` varchar(100) DEFAULT NULL,
  `kategori` varchar(50) DEFAULT NULL,
  `user_iduser` int(11) NOT NULL,
  PRIMARY KEY (`idprosiding`,`user_iduser`),
  KEY `fk_pengabdian_user1_idx` (`user_iduser`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `prosiding`
--

INSERT INTO `prosiding` (`idprosiding`, `judul`, `nama_makalah`, `isbn`, `sertifikat`, `halaman`, `url`, `penerbit`, `tahun`, `semester`, `ketua`, `anggota`, `kategori`, `user_iduser`) VALUES
(14, 'Desain Web Service Pada Katalog Toko Buku', 'Prosiding Seminar Nasional Ilmu Komputer Undip', '', '', '', '', '', 2010, 'genap', 'Ragil Saputra, S.Si, M.Cs--198010212005011003', '', 'Nasional', 4),
(15, 'Kriptografi Citra Digital Dengan Algoritma Rijndael Dan Transformasi Wavelet Diskrit Haar', 'Prosiding Seminar Nasional Ilmu Komputer Universitas Diponegoro 2010', '978-602-97737-0-5', '', '', '', 'Program Studi Teknik Informatika, FMIPA, UNDIP', 2010, 'ganjil', 'Sukmawati Nur Endah, S.Si, M.Kom--197805022005012002', 'Aris Sugiharto, S.Si, M.Kom--197108111997021004', 'Nasional', 4),
(16, 'Solving System Of Nonlinear Equations', 'Prosiding Seminar Nasional Ilmu Komputer Universitas Diponegoro 2010', '978-602-97737-0-6', '', '', '', 'Program Studi Teknik Informatika, FMIPA, UNDIP', 2010, 'genap', 'Priyo Sidik Sasongko, S.Si, M.Kom--197007051997021001', '', 'Nasional', 4),
(17, 'Metode Sarwoko Sebagai Fungsi Kombinasi Keputusan Pada Pengklasifikasi Tunggal', 'Prosiding Seminar Nasional ILMU KOMPUTER 2010', '978-602-97737-0-5', '', '4 (halaman 204-207)', '', 'Program Studi Teknik Informatika, FMIPA, UNDIP', 2010, 'ganjil', 'Drs. Eko Adi Sarwoko, M.Kom--196511071992031003', '', 'Nasional', 4),
(18, 'Penggolongan Warna Dalam Itten-Runge Sphere Dengan Sistem Inferensi Fuzzy', 'Prosiding Seminar Nasional Ilmu Komputer Universitas Diponegoro 2010', '978-602-97737-0-5', '', '', '', 'Program Studi Teknik Informatika, FMIPA, UNDIP', 2010, 'genap', 'Sukmawati Nur Endah, S.Si, M.Kom--197805022005012002', '', 'Nasional', 4),
(19, 'Perancangan Dan Implementasi Basis Data Terdistribusi Data Kependudukan Pada Prototype Sistem Informasi Administrasi Kependudukan', 'Prosiding Seminar Nasional Ilmu Komputer Universitas Diponegoro 2010', '', '', '', '', '', 2010, 'ganjil', 'Beta Noranita, S.Si, M.Kom--197308291998022001', 'Drs. Djalal Er Riyanto, MIKomp--195412191980031003//Adi Wibowo, S.Si, M.Kom--198203092006041002', 'Nasional', 4),
(20, 'Sistem Pendukung Keputusan Metode AHP Untuk Pemilihan Siswa Dalam Mengikuti Olimpiade Sains Di Sekolah Menengah Atas', 'Seminar Nasional Ilmu Komputer UNDIP', '', '', '', '', '', 2010, 'genap', 'Sutikno, ST, M.Cs--197905242009121003', '', 'Nasional', 4),
(21, 'Sistem Pendukung Keputusan Untuk Menganalisa Kesesuaian Jenis Vegetasi Mangrove Menggunakan Analytic Hierarchy Process (AHP)', 'Prosiding Seminar Nasional Ilmu Komputer Universitas Diponegoro 2010', '978-602-97737-0-5', '', '', '', 'Program Studi Teknik Informatika, FMIPA, UNDIP', 2010, 'ganjil', 'Sukmawati Nur Endah, S.Si, M.Kom--197805022005012002', 'Retno Kusumaningrum, S.Si, M.Kom--198104202005012001', 'Nasional', 4),
(22, 'Watermarking Dengan Metode Transformasi Integer Untuk Autentikasi Citra Berwarna', 'Prosiding Seminar Nasional Ilmu Komputer 2010', '', '', '', '', '', 2010, 'genap', 'Helmie Arif Wibawa, S.Si, M.Cs--197805162003121001', '', 'Nasional', 4),
(23, 'Development Of Web-Base E-Learning With Pedagogy Concept (Case Study : AMIK JTC Semarang)', 'Proceeding The 1st International Conference On Information Systems for Business Competitiveness (ICI', ': 978-979-097-198-1', '', '7 (halaman 68-74)', '', '', 2011, 'ganjil', 'Drs. Eko Adi Sarwoko, M.Kom--196511071992031003', '', 'Internasional', 4),
(24, 'Image Security Application With DES Algorithm And Discrete Wavelet Transformation', 'Prociding of The International Seminar on New Paradigm and Innovation on Natural Sciences and Its Ap', '', '', '', '', '', 2011, 'genap', 'Drs. Eko Adi Sarwoko, M.Kom--196511071992031003', '', 'Internasional', 4),
(25, 'Model And Application Of Web-Based E-Assessment With Combination Of Rule Base Reasoning (RBR) And Case Base Reasoning (CBR) Methods', 'Proceeding The 1st International Conference On Information Systems for Business Competitiveness (ICI', '978-979-097-198-1', '', '7 (halaman 68-74)', '', '', 2011, 'ganjil', 'Drs. Eko Adi Sarwoko, M.Kom--196511071992031003', '', 'Internasional', 4),
(26, 'Sensitivity Analysis Of The AHP And TOPSIS Methods For The Selection Of The Best Lecturer Base On The Academic Achievement', 'Prociding of The International Seminar on New Paradigm and Innovation on Natural Sciences and Its Ap', '', '', '', '', '', 2011, 'genap', 'Drs. Eko Adi Sarwoko, M.Kom--196511071992031003', 'Dra. Indriyati, M.Kom--195206101983032001', 'Internasional', 4);

-- --------------------------------------------------------

--
-- Table structure for table `upload`
--

CREATE TABLE IF NOT EXISTS `upload` (
  `no` int(11) NOT NULL AUTO_INCREMENT,
  `nama` mediumtext NOT NULL,
  `upload_user` mediumtext NOT NULL,
  `jenis_file` varchar(20) NOT NULL,
  `kategori` varchar(50) NOT NULL,
  PRIMARY KEY (`no`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=38 ;

--
-- Dumping data for table `upload`
--

INSERT INTO `upload` (`no`, `nama`, `upload_user`, `jenis_file`, `kategori`) VALUES
(8, 'Laporan_13.doc', 'Admin Jurusan', 'Proposal', 'Jurnal Ilmiah Intern'),
(17, 'A2-14.pdf', 'Drs. Kushartantya, MIKomp', 'Jurnal', 'Internasional'),
(23, 'T1_672006104_Full_Tex_2.pdf', 'Drs. Kushartantya, MIKomp', 'Prosiding', 'Nasional Terakreditasi'),
(29, 'Jurnal1.pdf', 'Drs. Kushartantya, MIKomp', 'Jurnal', 'Internasional'),
(35, 'Jurnal2.pdf', 'Ragil Saputra, S.Si, M.Cs', 'Jurnal', 'Nasional Terakreditasi'),
(36, 'Jurnal3.pdf', 'Ragil Saputra, S.Si, M.Cs', 'Jurnal', 'Nasional Tidak Terakreditasi'),
(37, 'Prosiding1.pdf', 'Ragil Saputra, S.Si, M.Cs', 'Prosiding', 'Internasional');

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
(4, '2df594b9710111099edbdb7edaa43301', 123456123456123456, 'Admin Jurusan', 2),
(5, 'a74298e4a259759687e3a5acb2e7ae12', 123456789123456789, 'Jurusan', 3),
(8, '25d55ad283aa400af464c76d713c07ad', 195003011979031003, 'Drs. Kushartantya, MIKomp', 1),
(9, '25d55ad283aa400af464c76d713c07ad', 195412191980031003, 'Drs. Djalal Er Riyanto, MIKomp', 1),
(10, '25d55ad283aa400af464c76d713c07ad', 195306281980031001, 'Drs. Putut Sri Wasito, M.Kom', 1),
(11, '25d55ad283aa400af464c76d713c07ad', 195504071983031003, 'Drs. Suhartono, M.Kom', 1),
(12, '25d55ad283aa400af464c76d713c07ad', 195206101983032001, 'Dra. Indriyati, M.Kom', 1),
(13, '25d55ad283aa400af464c76d713c07ad', 195905151986031003, 'Drs. B. Bambang Yismianto', 1),
(14, '25d55ad283aa400af464c76d713c07ad', 196511071992031003, 'Drs. Eko Adi Sarwoko, M.Kom', 1),
(15, '25d55ad283aa400af464c76d713c07ad', 197108111997021004, 'Aris Sugiharto, S.Si, M.Kom', 1),
(16, '94c2d2ead884cdf789a57d8ca7826995', 197007051997021001, 'Priyo Sidik Sasongko, S.Si, M.Kom', 1),
(17, '25d55ad283aa400af464c76d713c07ad', 197308291998022001, 'Beta Noranita, S.Si, M.Kom', 1),
(18, '25d55ad283aa400af464c76d713c07ad', 197404011999031002, 'Aris Puji Widodo, S.Si, MT', 1),
(19, '25d55ad283aa400af464c76d713c07ad', 197907202003121002, 'Nurdin Bahtiar, S.Si, MT', 1),
(20, '25d55ad283aa400af464c76d713c07ad', 197805162003121001, 'Helmie Arif Wibawa, S.Si, M.Cs', 1),
(21, '239ef2192e64dc4c9f4a8a417413e74a', 198010212005011003, 'Ragil Saputra, S.Si, M.Cs', 1),
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
-- Constraints for table `jurnal`
--
ALTER TABLE `jurnal`
  ADD CONSTRAINT `fk_penelitian_user` FOREIGN KEY (`user_iduser`) REFERENCES `user` (`iduser`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `prosiding`
--
ALTER TABLE `prosiding`
  ADD CONSTRAINT `fk_pengabdian_user1` FOREIGN KEY (`user_iduser`) REFERENCES `user` (`iduser`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

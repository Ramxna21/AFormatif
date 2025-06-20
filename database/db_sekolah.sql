-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 18, 2025 at 05:40 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_sekolah`
--

-- --------------------------------------------------------

--
-- Table structure for table `akun`
--

CREATE TABLE `akun` (
  `id_akun` int NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `akun`
--

INSERT INTO `akun` (`id_akun`, `username`, `password`) VALUES
(1, 'admin', '0192023a7bbd73250516f069df18b500');

-- --------------------------------------------------------

--
-- Table structure for table `formulir_siswa`
--

CREATE TABLE `formulir_siswa` (
  `id` int NOT NULL,
  `nama_lengkap` varchar(100) DEFAULT NULL,
  `jenis_kelamin` varchar(10) DEFAULT NULL,
  `nisn` varchar(20) DEFAULT NULL,
  `nik` varchar(20) DEFAULT NULL,
  `kk` varchar(20) DEFAULT NULL,
  `tempat_lahir` varchar(50) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `no_akte` varchar(50) DEFAULT NULL,
  `agama` varchar(20) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `desa` varchar(100) DEFAULT NULL,
  `kecamatan` varchar(100) DEFAULT NULL,
  `kabupaten` varchar(100) DEFAULT NULL,
  `provinsi` varchar(100) DEFAULT NULL,
  `kode_pos` varchar(10) DEFAULT NULL,
  `tinggal_dengan` varchar(100) DEFAULT NULL,
  `transportasi` varchar(100) DEFAULT NULL,
  `anak_ke` int DEFAULT NULL,
  `kip_pkh` varchar(10) DEFAULT NULL,
  `no_hp` varchar(20) DEFAULT NULL,
  `nama_ayah` varchar(100) DEFAULT NULL,
  `nik_ayah` varchar(20) DEFAULT NULL,
  `lahir_ayah` date DEFAULT NULL,
  `pendidikan_ayah` varchar(50) DEFAULT NULL,
  `pekerjaan_ayah` varchar(50) DEFAULT NULL,
  `penghasilan_ayah` varchar(50) DEFAULT NULL,
  `nama_ibu` varchar(100) DEFAULT NULL,
  `nik_ibu` varchar(20) DEFAULT NULL,
  `lahir_ibu` date DEFAULT NULL,
  `pendidikan_ibu` varchar(50) DEFAULT NULL,
  `pekerjaan_ibu` varchar(50) DEFAULT NULL,
  `penghasilan_ibu` varchar(50) DEFAULT NULL,
  `nama_wali` varchar(100) DEFAULT NULL,
  `nik_wali` varchar(20) DEFAULT NULL,
  `lahir_wali` date DEFAULT NULL,
  `pendidikan_wali` varchar(50) DEFAULT NULL,
  `pekerjaan_wali` varchar(50) DEFAULT NULL,
  `penghasilan_wali` varchar(50) DEFAULT NULL,
  `tinggi_badan` int DEFAULT NULL,
  `berat_badan` int DEFAULT NULL,
  `lingkar_kepala` int DEFAULT NULL,
  `jarak_ke_sekolah` decimal(5,2) DEFAULT NULL,
  `waktu_tempuh` varchar(50) DEFAULT NULL,
  `jumlah_saudara` int DEFAULT NULL,
  `hobi` varchar(100) DEFAULT NULL,
  `cita_cita` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jawaban_formulir`
--

CREATE TABLE `jawaban_formulir` (
  `id` int NOT NULL,
  `id_pertanyaan` int DEFAULT NULL,
  `jawaban` text,
  `tanggal_pengisian` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jawaban_formulir`
--

INSERT INTO `jawaban_formulir` (`id`, `id_pertanyaan`, `jawaban`, `tanggal_pengisian`) VALUES
(1, 2, 'Dolores qui providen', '2025-06-15'),
(2, 3, 'Amet provident nis', '2025-06-15'),
(3, 4, '6', '2025-06-15'),
(4, 5, '7', '2025-06-15'),
(5, 6, '8', '2025-06-15'),
(6, 7, 'Esse obcaecati repr', '2025-06-15'),
(7, 8, '2023-05-17', '2025-06-15'),
(8, 9, 'Vitae omnis unde et ', '2025-06-15'),
(9, 10, 'Hic molestias quod q', '2025-06-15'),
(10, 11, 'Dolor magni repellen', '2025-06-15'),
(11, 12, 'Saepe sapiente natus', '2025-06-15'),
(12, 13, 'Magnam omnis veniam', '2025-06-15'),
(13, 14, 'Asperiores laudantiu', '2025-06-15'),
(14, 15, 'Ullam dolores ut opt', '2025-06-15'),
(15, 16, '71', '2025-06-15'),
(16, 17, 'Est eos at dicta es', '2025-06-15'),
(17, 18, 'Alias sit ut tenetur', '2025-06-15'),
(18, 19, '74', '2025-06-15'),
(19, 20, 'Ratione occaecat acc', '2025-06-15'),
(20, 21, '24', '2025-06-15'),
(21, 22, 'Amet ex tempor cons', '2025-06-15'),
(22, 23, '70', '2025-06-15'),
(23, 24, '1973-12-26', '2025-06-15'),
(24, 25, 'Deleniti reiciendis ', '2025-06-15'),
(25, 26, 'Ut excepturi perfere', '2025-06-15'),
(26, 27, '6', '2025-06-15'),
(27, 28, 'Itaque repudiandae h', '2025-06-15'),
(28, 29, '73', '2025-06-15'),
(29, 30, '2001-01-25', '2025-06-15'),
(30, 31, 'Reprehenderit sed no', '2025-06-15'),
(31, 32, 'Consequatur ipsa ve', '2025-06-15'),
(32, 33, '59', '2025-06-15'),
(33, 34, 'In dicta distinctio', '2025-06-15'),
(34, 35, '64', '2025-06-15'),
(35, 36, '2017-12-19', '2025-06-15'),
(36, 37, 'Aut qui maiores sed ', '2025-06-15'),
(37, 38, 'Aliquip dolorem aliq', '2025-06-15'),
(38, 39, '30', '2025-06-15'),
(39, 40, '58', '2025-06-15'),
(40, 41, '78', '2025-06-15'),
(41, 42, '77', '2025-06-15'),
(42, 43, 'Et anim reiciendis a', '2025-06-15'),
(43, 44, 'Unde dolor sed atque', '2025-06-15'),
(44, 45, '29', '2025-06-15'),
(45, 46, 'Dolorem ipsa sed ma', '2025-06-15'),
(46, 48, 'Laudantium mollit i', '2025-06-15');

-- --------------------------------------------------------

--
-- Table structure for table `murid`
--

CREATE TABLE `murid` (
  `id` int NOT NULL,
  `nama_lengkap` varchar(100) DEFAULT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') DEFAULT NULL,
  `nisn` varchar(20) DEFAULT NULL,
  `nik` varchar(20) DEFAULT NULL,
  `no_kk` varchar(20) DEFAULT NULL,
  `tempat_lahir` varchar(50) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `no_akte_kelahiran` varchar(30) DEFAULT NULL,
  `agama` varchar(20) DEFAULT NULL,
  `alamat_rumah` text,
  `desa_kelurahan` varchar(50) DEFAULT NULL,
  `kecamatan` varchar(50) DEFAULT NULL,
  `kabupaten` varchar(50) DEFAULT NULL,
  `provinsi` varchar(50) DEFAULT NULL,
  `kode_pos` varchar(10) DEFAULT NULL,
  `tinggal_dengan` varchar(50) DEFAULT NULL,
  `mode_transportasi` varchar(50) DEFAULT NULL,
  `anak_keberapa` int DEFAULT NULL,
  `punya_kip_pk` enum('Ya','Tidak') DEFAULT NULL,
  `no_handphone` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `murid`
--

INSERT INTO `murid` (`id`, `nama_lengkap`, `jenis_kelamin`, `nisn`, `nik`, `no_kk`, `tempat_lahir`, `tanggal_lahir`, `no_akte_kelahiran`, `agama`, `alamat_rumah`, `desa_kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `tinggal_dengan`, `mode_transportasi`, `anak_keberapa`, `punya_kip_pk`, `no_handphone`) VALUES
(1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(13, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(14, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pertanyaan`
--

CREATE TABLE `pertanyaan` (
  `id_pertanyaan` int NOT NULL,
  `isi_pertanyaan` varchar(255) NOT NULL,
  `jenis_jawaban_pertanyaan` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `id_tipe_pertanyaan` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pertanyaan`
--

INSERT INTO `pertanyaan` (`id_pertanyaan`, `isi_pertanyaan`, `jenis_jawaban_pertanyaan`, `id_tipe_pertanyaan`) VALUES
(2, 'Nama lengkap', 'text', 2),
(3, 'Jenis kelamin', 'text', 2),
(4, 'Nomor Induk Siswa Nasional (NISN)', 'number', 2),
(5, 'Nomor Induk Kependudukan (NIK)', 'number', 2),
(6, 'Nomor Kartu Keluarga (KK)', 'number', 2),
(7, 'Tempat Lahir', 'text', 2),
(8, 'Tanggal Lahir', 'date', 2),
(9, 'No. Registrasi Akte Kelahiran', 'text', 2),
(10, 'Agama', 'text', 2),
(11, 'Alamat Rumah', 'text', 2),
(12, 'Desa / Kelurahan', 'text', 2),
(13, 'Kecamatan', 'text', 2),
(14, 'Kabupaten', 'text', 2),
(15, 'Provinsi', 'text', 2),
(16, 'Kode Pos', 'number', 2),
(17, 'Tempat Tinggal / Tinggal Dengan siapa', 'text', 2),
(18, 'Mode Transportasi', 'text', 2),
(19, 'Anak Keberapa', 'number', 2),
(20, 'Apakah Punya KIP / PKH', 'text', 2),
(21, 'No. Handphone', 'number', 2),
(22, 'Nama Ayah', 'text', 3),
(23, 'Nomor Induk Kependudukan (NIK)', 'number', 3),
(24, 'Tahun Lahir', 'date', 3),
(25, 'Pendidikan', 'text', 3),
(26, 'Pekerjaan Ayah', 'text', 3),
(27, 'Penghasilan Ayah (tulis nominal)', 'number', 3),
(28, 'Nama Ibu', 'text', 4),
(29, 'Nomor Induk Kependudukan (NIK)', 'number', 4),
(30, 'Tahun Lahir', 'date', 4),
(31, 'Pendidikan', 'text', 4),
(32, 'Pekerjaan Ibu', 'text', 4),
(33, 'Penghasilan Ibu (tulis nominal)', 'number', 4),
(34, 'Nama', 'text', 1),
(35, 'Nomor Induk Kependudukan (NIK)', 'number', 1),
(36, 'Tahun Lahir', 'date', 1),
(37, 'Pendidikan', 'text', 1),
(38, 'Pekerjaan Wali', 'text', 1),
(39, 'Penghasilan Wali (tulis nominal)', 'number', 1),
(40, 'Tinggi Badan (cm)', 'number', 5),
(41, 'Berat Badan (kg)', 'number', 5),
(42, 'Lingkar Kepala (cm)', 'number', 5),
(43, 'Jarak Rumah Ke Sekolah (km)', 'text', 5),
(44, 'Waktu Tempuh Ke Sekolah', 'text', 5),
(45, 'Jumlah Saudara Kandung (lihat di KK)', 'number', 5),
(46, 'Hobi', 'text', 5),
(48, 'Cita-cita', 'text', 5);

-- --------------------------------------------------------

--
-- Table structure for table `tipe_pertanyaan`
--

CREATE TABLE `tipe_pertanyaan` (
  `id_tipe_pertanyaan` int NOT NULL,
  `nama_tipe_pertanyaan` varchar(125) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tipe_pertanyaan`
--

INSERT INTO `tipe_pertanyaan` (`id_tipe_pertanyaan`, `nama_tipe_pertanyaan`) VALUES
(1, 'DATA WALI PESERTA DIDIK'),
(2, 'DATA PRIBADI PESERTA DIDIK'),
(3, 'DATA AYAH KANDUNG'),
(4, 'DATA IBU KANDUNG'),
(5, 'DATA PERIODIK PESERTA DIDIK');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`id_akun`);

--
-- Indexes for table `formulir_siswa`
--
ALTER TABLE `formulir_siswa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jawaban_formulir`
--
ALTER TABLE `jawaban_formulir`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `murid`
--
ALTER TABLE `murid`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pertanyaan`
--
ALTER TABLE `pertanyaan`
  ADD PRIMARY KEY (`id_pertanyaan`);

--
-- Indexes for table `tipe_pertanyaan`
--
ALTER TABLE `tipe_pertanyaan`
  ADD PRIMARY KEY (`id_tipe_pertanyaan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `akun`
--
ALTER TABLE `akun`
  MODIFY `id_akun` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `formulir_siswa`
--
ALTER TABLE `formulir_siswa`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jawaban_formulir`
--
ALTER TABLE `jawaban_formulir`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `murid`
--
ALTER TABLE `murid`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `pertanyaan`
--
ALTER TABLE `pertanyaan`
  MODIFY `id_pertanyaan` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `tipe_pertanyaan`
--
ALTER TABLE `tipe_pertanyaan`
  MODIFY `id_tipe_pertanyaan` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

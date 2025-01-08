-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 08 Jan 2025 pada 05.45
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_quintessence`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_admin`
--

CREATE TABLE `t_admin` (
  `id_admin` int(11) NOT NULL,
  `usn_admin` varchar(50) NOT NULL,
  `pass_admin` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `t_admin`
--

INSERT INTO `t_admin` (`id_admin`, `usn_admin`, `pass_admin`) VALUES
(1, 'admin', '123'),
(2, 'admin2', '123'),
(3, 'admin3', '123');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_bmi`
--

CREATE TABLE `t_bmi` (
  `id_bmi` int(11) NOT NULL,
  `berat_badan` int(11) DEFAULT NULL,
  `tinggi_badan` int(11) DEFAULT NULL,
  `id_status_bmi` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `t_bmi`
--

INSERT INTO `t_bmi` (`id_bmi`, `berat_badan`, `tinggi_badan`, `id_status_bmi`, `id_user`) VALUES
(1, 55, 165, 2, 1),
(2, 48, 150, 2, 2),
(3, 63, 170, 2, 3),
(4, 60, 160, 3, 4),
(5, 45, 155, 2, 5),
(6, 50, 165, 2, 6),
(7, 62, 183, 2, 7),
(8, 58, 178, 2, 8),
(9, 48, 163, 2, 9),
(10, 53, 181, 1, 10),
(11, 65, 160, 3, 25),
(35, 66, 187, 2, 24),
(40, 65, 180, 2, 26),
(43, 65, 180, 2, 34),
(45, 72, 170, 3, 36),
(79, 70, 180, 2, 40),
(84, NULL, NULL, NULL, 42),
(86, 65, 170, 2, 43),
(87, 80, 121, 4, 44);

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_covid`
--

CREATE TABLE `t_covid` (
  `id_covid` int(11) NOT NULL,
  `id_provinsi` int(11) NOT NULL,
  `jumlah_covid` int(11) NOT NULL,
  `jumlah_kematian` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `t_covid`
--

INSERT INTO `t_covid` (`id_covid`, `id_provinsi`, `jumlah_covid`, `jumlah_kematian`) VALUES
(1, 1, 8360, 100),
(2, 2, 6709, 84),
(3, 3, 5699, 50),
(4, 4, 5465, 76),
(5, 5, 2328, 32),
(6, 6, 2106, 12),
(7, 7, 1628, 11),
(8, 8, 1276, 11),
(9, 9, 1215, 9),
(10, 10, 1057, 13),
(11, 11, 412, 2),
(12, 12, 321, 3),
(13, 13, 324, 4),
(14, 14, 234, 5),
(15, 15, 123, 6),
(16, 16, 534, 3),
(17, 17, 123, 2),
(18, 18, 553, 3),
(19, 19, 253, 4),
(20, 20, 6452, 56),
(21, 21, 232, 2),
(22, 22, 1123, 12),
(23, 23, 4123, 21),
(24, 24, 1221, 12),
(25, 25, 1134, 14),
(26, 26, 5323, 23),
(27, 27, 1232, 11),
(28, 28, 5344, 34),
(29, 29, 6332, 34),
(30, 30, 1234, 12),
(31, 31, 1231, 14),
(32, 32, 5361, 24),
(33, 33, 234, 3),
(34, 34, 232, 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_datadiri`
--

CREATE TABLE `t_datadiri` (
  `id_biodata` int(11) NOT NULL,
  `nama_lengkap` varchar(150) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` varchar(10) NOT NULL,
  `alamat` varchar(500) NOT NULL,
  `usia` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `t_datadiri`
--

INSERT INTO `t_datadiri` (`id_biodata`, `nama_lengkap`, `tanggal_lahir`, `jenis_kelamin`, `alamat`, `usia`, `id_user`) VALUES
(1, 'tantanitania', '2023-06-01', 'P', 'Cigadung', 19, 1),
(2, 'Arul', '1999-12-26', 'L', 'Jl. Dahlia', 23, 2),
(3, 'Shaka Ardelardo', '2004-07-14', 'L', 'Jl. Kenanga', 18, 4),
(4, 'Raneysha Gauri ', '2004-08-13', 'P', 'Jl. Mawar', 18, 5),
(5, 'Hazel Lazuardi', '2002-02-06', 'P', 'Jl. Melati Putih', 21, 3),
(6, 'Melaa Deandra', '2002-01-05', 'P', 'Jl. Tulip', 21, 6),
(7, 'Leyvan Damarion', '2004-03-11', 'L', 'Jl. Teratai', 18, 7),
(8, 'Kaafi Bagaskara', '2004-11-03', 'L', 'Jl. Melati', 18, 8),
(9, 'Sheryl Danielle', '2003-05-15', 'P', 'Jl. Cilimus', 19, 9),
(10, 'Geral Zavierre', '2002-04-04', 'L', 'Jl. Pondok Indah', 21, 10),
(21, 'Imam Chalish Rafidhul Haque', '2023-05-31', 'L', 'Bandung ah', 17, 24),
(22, 'a', '2021-05-31', 'L', 'wef', 17, 25),
(23, 'tes', '2023-06-01', 'L', '1', 18, 26),
(33, 'Chalish RH', '2003-05-11', 'L', 'Bandung Barat', 20, 34),
(35, 'Kashidota One', '2003-05-11', 'L', 'Bandung', 20, 36),
(36, 'Kashidota Two', '2011-05-11', 'L', 'Bandung Barat', 12, 37),
(39, 'aa', '2013-06-02', 'L', '12', 10, 40),
(41, 'Agung', '2013-06-02', 'L', 'bandung', 10, 42),
(42, 'Barbie', '2010-05-02', 'L', 'Inggris', 13, 43),
(43, 'Bayu aja', '2013-06-02', 'L', 'Bayung', 10, 44),
(47, 'Rajendra ', '2004-02-14', 'L', 'Jl. Sadboy', 19, 48),
(49, 'Rifa Sania', '2015-01-06', 'L', 'aaka', 10, 50);

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_hiv`
--

CREATE TABLE `t_hiv` (
  `id_hiv` int(11) NOT NULL,
  `id_provinsi` int(11) NOT NULL,
  `jumlah_hiv` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `t_hiv`
--

INSERT INTO `t_hiv` (`id_hiv`, `id_provinsi`, `jumlah_hiv`) VALUES
(1, 1, 967),
(2, 2, 690),
(3, 3, 655),
(4, 4, 420),
(5, 5, 371),
(6, 6, 368),
(7, 7, 336),
(8, 8, 321),
(9, 9, 299),
(10, 10, 223),
(11, 11, 3242),
(12, 12, 2132),
(13, 13, 1232),
(14, 14, 2433),
(15, 15, 532),
(16, 16, 234),
(17, 17, 6435),
(18, 18, 3242),
(19, 19, 234),
(20, 20, 6345),
(21, 21, 5634),
(22, 22, 2343),
(23, 23, 3245),
(24, 24, 657),
(25, 25, 5777),
(26, 26, 5467),
(27, 27, 7546),
(28, 28, 345),
(29, 29, 7436),
(30, 30, 5745),
(31, 31, 8688),
(32, 32, 565),
(33, 33, 345),
(34, 34, 656);

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_imunisasi`
--

CREATE TABLE `t_imunisasi` (
  `id_imunisasi` int(11) NOT NULL,
  `id_provinsi` int(11) NOT NULL,
  `persentase_imunisasi` varchar(15) NOT NULL,
  `jumlah_balita` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `t_imunisasi`
--

INSERT INTO `t_imunisasi` (`id_imunisasi`, `id_provinsi`, `persentase_imunisasi`, `jumlah_balita`) VALUES
(1, 34, '75,83', 741968),
(2, 33, '62,32', 762534),
(3, 32, '62,32', 692763),
(4, 31, '63,38', 634281),
(5, 30, '65,63', 601192),
(6, 29, '70,52', 520198),
(7, 28, '76,23', 520012),
(8, 27, '75,83', 419827),
(9, 26, '71,52', 401524),
(10, 25, '71,78', 400127),
(11, 24, '43,53', 123123),
(12, 23, '53,53', 243232),
(13, 22, '25,65', 234234),
(14, 21, '46,43', 234325),
(15, 20, '63,67', 234344),
(16, 19, '54.76', 235463),
(17, 18, '23,67', 763443),
(18, 17, '45,64', 324526),
(19, 16, '74,55', 332332),
(20, 15, '35,65', 321312),
(21, 14, '74.45', 234532),
(22, 13, '23,33', 423433),
(23, 12, '42,56', 343245),
(24, 11, '34,64', 435345),
(25, 10, '64,65', 234523),
(26, 9, '75,45', 334325),
(27, 8, '66,34', 325235),
(28, 7, '34,64', 645334),
(29, 6, '42,55', 234354),
(30, 5, '45,43', 234234),
(31, 4, '45,33', 231231),
(32, 3, '26,43', 643434),
(33, 2, '64,44', 463463),
(34, 1, '63,23', 435422);

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_nakes`
--

CREATE TABLE `t_nakes` (
  `id_nakes` int(11) NOT NULL,
  `id_provinsi` int(11) NOT NULL,
  `jumlah_nakes` int(11) NOT NULL,
  `jumlah_rs` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `t_nakes`
--

INSERT INTO `t_nakes` (`id_nakes`, `id_provinsi`, `jumlah_nakes`, `jumlah_rs`) VALUES
(1, 1, 84994, 1234),
(2, 2, 74157, 1211),
(3, 3, 68646, 1123),
(4, 4, 40902, 1022),
(5, 5, 36038, 1011),
(6, 6, 23492, 943),
(7, 7, 21179, 832),
(8, 8, 21061, 798),
(9, 9, 17846, 742),
(10, 10, 16805, 637),
(11, 11, 23435, 901),
(12, 12, 43534, 1032),
(13, 13, 23324, 855),
(14, 14, 32456, 999),
(15, 15, 64353, 1098),
(16, 16, 4325, 322),
(17, 17, 23432, 889),
(18, 18, 100, 23),
(19, 19, 645, 111),
(20, 20, 3244, 190),
(21, 21, 4643, 423),
(22, 22, 3453, 211),
(23, 23, 2343, 184),
(24, 24, 2343, 153),
(25, 25, 53232, 1058),
(26, 26, 23453, 922),
(27, 27, 32423, 953),
(28, 28, 2345, 188),
(29, 29, 234, 90),
(30, 30, 6435, 622),
(31, 31, 3434, 210),
(32, 32, 2342, 123),
(33, 33, 5453, 590),
(34, 34, 43433, 1031);

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_perokok`
--

CREATE TABLE `t_perokok` (
  `id_perokok` int(11) NOT NULL,
  `id_provinsi` int(11) NOT NULL,
  `persentase_perokok` decimal(15,0) NOT NULL,
  `jumlah_penduduk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `t_perokok`
--

INSERT INTO `t_perokok` (`id_perokok`, `id_provinsi`, `persentase_perokok`, `jumlah_penduduk`) VALUES
(1, 1, '34', 1479822),
(2, 2, '1', 1253728),
(3, 3, '33', 1426378),
(4, 4, '2', 1345678),
(5, 5, '32', 1763456),
(6, 6, '3', 1324654),
(7, 7, '31', 1652709),
(8, 8, '4', 1432567),
(9, 9, '30', 1554433),
(10, 10, '5', 1213456),
(11, 11, '29', 1238232),
(12, 12, '6', 1238392),
(13, 13, '28', 1223231),
(14, 14, '7', 1231231),
(15, 16, '27', 5323966),
(16, 15, '8', 3892922),
(17, 17, '26', 4086802),
(18, 18, '9', 6577824),
(19, 19, '25', 9889594),
(20, 20, '10', 8886715),
(21, 21, '24', 4028616),
(22, 22, '11', 8358941),
(23, 23, '23', 8837425),
(24, 24, '12', 4380450),
(25, 25, '22', 6297672),
(26, 26, '13', 9132696),
(27, 27, '21', 7835104),
(28, 28, '14', 1464726),
(29, 29, '20', 4965882),
(30, 30, '15', 4911103),
(31, 31, '19', 246664),
(32, 32, '16', 3321805),
(33, 33, '18', 9166749),
(34, 34, '17', 7661650);

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_provinsi`
--

CREATE TABLE `t_provinsi` (
  `id_provinsi` int(11) NOT NULL,
  `provinsi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `t_provinsi`
--

INSERT INTO `t_provinsi` (`id_provinsi`, `provinsi`) VALUES
(1, 'ACEH'),
(2, 'SUMATERA UTARA'),
(3, 'SUMATERA BARAT'),
(4, 'RIAU'),
(5, 'JAMBI'),
(6, 'SUMATERA SELATAN'),
(7, 'BENGKULU'),
(8, 'LAMPUNG'),
(9, 'KEPULAUAN BANGKA BELITUNG'),
(10, 'KEPULAUAN RIAU'),
(11, 'DKI JAKARTA'),
(12, 'JAWA BARAT'),
(13, 'JAWA TENGAH'),
(14, 'DI YOGYAKARTA'),
(15, 'JAWA TIMUR'),
(16, 'BANTEN'),
(17, 'BALI'),
(18, 'NUSA TENGGARA BARAT'),
(19, 'NUSA TENGGARA TIMUR'),
(20, 'KALIMANTAN BARAT'),
(21, 'KALIMANTAN TENGAH'),
(22, 'KALIMANTAN SELATAN'),
(23, 'KALIMANTAN TIMUR'),
(24, 'KALIMANTAN UTARA'),
(25, 'SULAWESI UTARA'),
(26, 'SULAWESI TENGAH'),
(27, 'SULAWESI SELATAN'),
(28, 'SULAWESI TENGGARA'),
(29, 'GORONTALO'),
(30, 'SULAWESI BARAT'),
(31, 'MALUKU'),
(32, 'MALUKU UTARA'),
(33, 'PAPUA BARAT'),
(34, 'PAPUA');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_status_bmi`
--

CREATE TABLE `t_status_bmi` (
  `id_status_bmi` int(11) NOT NULL,
  `status_bmi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `t_status_bmi`
--

INSERT INTO `t_status_bmi` (`id_status_bmi`, `status_bmi`) VALUES
(1, 'Kurus'),
(2, 'Normal'),
(3, 'Kegemukan'),
(4, 'Obesitas');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_status_tdarah`
--

CREATE TABLE `t_status_tdarah` (
  `id_status_tdarah` int(11) NOT NULL,
  `status_tdarah` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `t_status_tdarah`
--

INSERT INTO `t_status_tdarah` (`id_status_tdarah`, `status_tdarah`) VALUES
(1, 'Rendah'),
(2, 'Normal'),
(3, 'Normal Tinggi (prehypertension)'),
(4, 'Tinggi Tahap 1'),
(5, 'Tinggi Tahap 2');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_tekanan_darah`
--

CREATE TABLE `t_tekanan_darah` (
  `id_tekanan_darah` int(11) NOT NULL,
  `golongan_darah` varchar(10) DEFAULT NULL,
  `tekanan_darah` varchar(50) DEFAULT NULL,
  `id_status_tdarah` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `t_tekanan_darah`
--

INSERT INTO `t_tekanan_darah` (`id_tekanan_darah`, `golongan_darah`, `tekanan_darah`, `id_status_tdarah`, `id_user`) VALUES
(1, 'B', '106/62', 1, 1),
(2, 'O', '95/70', 2, 2),
(3, 'A', '130/80', 4, 3),
(4, 'A', '100/70', 2, 4),
(5, 'B', '85/50', 1, 5),
(6, 'AB', '90/60', 1, 6),
(7, 'O', '120/80', 2, 7),
(8, 'O', '156/93', 3, 8),
(9, 'A', '83/50', 1, 9),
(10, 'B', '140/90', 3, 10),
(16, 'O', '120/80', 2, 24),
(18, '', '', NULL, 25),
(19, '', '', NULL, 26),
(26, 'A', '120/80', 2, 34),
(28, 'A', '90/80', 2, 36),
(29, '', '', NULL, 37),
(32, 'A', '88/88', 1, 40),
(34, 'O', '120/79', 2, 42),
(35, 'O', '120/30', 1, 43),
(37, 'A', '120/70', 2, 44),
(41, NULL, NULL, NULL, 48),
(43, NULL, NULL, NULL, 50);

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_user`
--

CREATE TABLE `t_user` (
  `id_user` int(11) NOT NULL,
  `usn_user` varchar(50) NOT NULL,
  `pass_user` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `t_user`
--

INSERT INTO `t_user` (`id_user`, `usn_user`, `pass_user`) VALUES
(1, 'tantanitania', 'tantanitania123'),
(2, 'imam', '123'),
(3, 'jellyjel', 'jellyjel123'),
(4, 'shakaard', 'shakaard123'),
(5, 'eysharan', 'eysharan123'),
(6, 'melaadeandra', 'melaadeandra123'),
(7, 'damarionley', 'damarionley123'),
(8, 'kaafibgskraa', 'kaafibgskraa123'),
(9, 'daniellesher', 'daniellesher123'),
(10, 'geralzavierre', 'geralzavierre123'),
(24, 'arul', '123'),
(25, 'arul2', '123'),
(26, 'tes', '123'),
(34, 'chalish', '123'),
(36, 'kashidota', '123'),
(37, 'kashidota2', '123'),
(40, 'aa', '123'),
(42, 'agung', '123'),
(43, 'barbie', '123'),
(44, 'bayu', '123'),
(48, 'rajendra', '123'),
(50, 'lalala', '12345678');

--
-- Trigger `t_user`
--
DELIMITER $$
CREATE TRIGGER `tr_hapus_user` AFTER DELETE ON `t_user` FOR EACH ROW BEGIN
	DELETE FROM t_datadiri WHERE id_user = OLD.id_user;
    DELETE FROM t_bmi WHERE id_user = OLD.id_user;
    DELETE FROM t_tekanan_darah WHERE id_user = OLD.id_user;
 END
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `t_admin`
--
ALTER TABLE `t_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `t_bmi`
--
ALTER TABLE `t_bmi`
  ADD PRIMARY KEY (`id_bmi`),
  ADD KEY `fk_bmi_user` (`id_user`),
  ADD KEY `fk_status_bmi` (`id_status_bmi`);

--
-- Indeks untuk tabel `t_covid`
--
ALTER TABLE `t_covid`
  ADD PRIMARY KEY (`id_covid`),
  ADD KEY `fk_covid_provinsi` (`id_provinsi`);

--
-- Indeks untuk tabel `t_datadiri`
--
ALTER TABLE `t_datadiri`
  ADD PRIMARY KEY (`id_biodata`),
  ADD KEY `fk_data_user` (`id_user`);

--
-- Indeks untuk tabel `t_hiv`
--
ALTER TABLE `t_hiv`
  ADD PRIMARY KEY (`id_hiv`),
  ADD KEY `fk_hiv_provinsi` (`id_provinsi`);

--
-- Indeks untuk tabel `t_imunisasi`
--
ALTER TABLE `t_imunisasi`
  ADD PRIMARY KEY (`id_imunisasi`),
  ADD KEY `fk_imun_provinsi` (`id_provinsi`);

--
-- Indeks untuk tabel `t_nakes`
--
ALTER TABLE `t_nakes`
  ADD PRIMARY KEY (`id_nakes`),
  ADD KEY `fk_nakes_provinsi` (`id_provinsi`);

--
-- Indeks untuk tabel `t_perokok`
--
ALTER TABLE `t_perokok`
  ADD PRIMARY KEY (`id_perokok`),
  ADD KEY `fk_rokok_provinsi` (`id_provinsi`);

--
-- Indeks untuk tabel `t_provinsi`
--
ALTER TABLE `t_provinsi`
  ADD PRIMARY KEY (`id_provinsi`);

--
-- Indeks untuk tabel `t_status_bmi`
--
ALTER TABLE `t_status_bmi`
  ADD PRIMARY KEY (`id_status_bmi`);

--
-- Indeks untuk tabel `t_status_tdarah`
--
ALTER TABLE `t_status_tdarah`
  ADD PRIMARY KEY (`id_status_tdarah`);

--
-- Indeks untuk tabel `t_tekanan_darah`
--
ALTER TABLE `t_tekanan_darah`
  ADD PRIMARY KEY (`id_tekanan_darah`),
  ADD KEY `fk_tdarah_user` (`id_user`),
  ADD KEY `fk_status_tdarah` (`id_status_tdarah`);

--
-- Indeks untuk tabel `t_user`
--
ALTER TABLE `t_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `t_admin`
--
ALTER TABLE `t_admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `t_bmi`
--
ALTER TABLE `t_bmi`
  MODIFY `id_bmi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT untuk tabel `t_covid`
--
ALTER TABLE `t_covid`
  MODIFY `id_covid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT untuk tabel `t_datadiri`
--
ALTER TABLE `t_datadiri`
  MODIFY `id_biodata` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT untuk tabel `t_hiv`
--
ALTER TABLE `t_hiv`
  MODIFY `id_hiv` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT untuk tabel `t_imunisasi`
--
ALTER TABLE `t_imunisasi`
  MODIFY `id_imunisasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT untuk tabel `t_nakes`
--
ALTER TABLE `t_nakes`
  MODIFY `id_nakes` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT untuk tabel `t_perokok`
--
ALTER TABLE `t_perokok`
  MODIFY `id_perokok` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT untuk tabel `t_status_bmi`
--
ALTER TABLE `t_status_bmi`
  MODIFY `id_status_bmi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `t_status_tdarah`
--
ALTER TABLE `t_status_tdarah`
  MODIFY `id_status_tdarah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `t_tekanan_darah`
--
ALTER TABLE `t_tekanan_darah`
  MODIFY `id_tekanan_darah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT untuk tabel `t_user`
--
ALTER TABLE `t_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `t_bmi`
--
ALTER TABLE `t_bmi`
  ADD CONSTRAINT `fk_bmi_user` FOREIGN KEY (`id_user`) REFERENCES `t_user` (`id_user`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_status_bmi` FOREIGN KEY (`id_status_bmi`) REFERENCES `t_status_bmi` (`id_status_bmi`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `t_covid`
--
ALTER TABLE `t_covid`
  ADD CONSTRAINT `fk_covid_provinsi` FOREIGN KEY (`id_provinsi`) REFERENCES `t_provinsi` (`id_provinsi`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `t_datadiri`
--
ALTER TABLE `t_datadiri`
  ADD CONSTRAINT `fk_data_user` FOREIGN KEY (`id_user`) REFERENCES `t_user` (`id_user`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `t_hiv`
--
ALTER TABLE `t_hiv`
  ADD CONSTRAINT `fk_hiv_provinsi` FOREIGN KEY (`id_provinsi`) REFERENCES `t_provinsi` (`id_provinsi`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `t_imunisasi`
--
ALTER TABLE `t_imunisasi`
  ADD CONSTRAINT `fk_imun_provinsi` FOREIGN KEY (`id_provinsi`) REFERENCES `t_provinsi` (`id_provinsi`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `t_nakes`
--
ALTER TABLE `t_nakes`
  ADD CONSTRAINT `fk_nakes_provinsi` FOREIGN KEY (`id_provinsi`) REFERENCES `t_provinsi` (`id_provinsi`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `t_perokok`
--
ALTER TABLE `t_perokok`
  ADD CONSTRAINT `fk_rokok_provinsi` FOREIGN KEY (`id_provinsi`) REFERENCES `t_provinsi` (`id_provinsi`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `t_tekanan_darah`
--
ALTER TABLE `t_tekanan_darah`
  ADD CONSTRAINT `fk_tdarah_status` FOREIGN KEY (`id_status_tdarah`) REFERENCES `t_status_tdarah` (`id_status_tdarah`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tdarah_user` FOREIGN KEY (`id_user`) REFERENCES `t_user` (`id_user`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

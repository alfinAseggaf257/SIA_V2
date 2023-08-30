-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 21, 2022 at 05:05 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `5190411116`
--

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `id_guru` int(11) NOT NULL,
  `nip` varchar(10) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `alamat` text NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `tempat` varchar(20) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `telp` varchar(12) NOT NULL,
  `jabatan` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `hak_akses` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`id_guru`, `nip`, `nama`, `alamat`, `jenis_kelamin`, `tempat`, `tanggal_lahir`, `telp`, `jabatan`, `username`, `password`, `hak_akses`) VALUES
(1, '1111', 'Irfan Bachdim', 'Jalan Bandung No.9', 'Laki-laki', 'Semarang', '2022-04-13', '08812123121', 'Guru honorer', 'guru2', 'guru2', 'guru'),
(2, '3221', 'Sri', 'Jakarta', 'Perempuan', 'Semarang', '2022-03-29', '0862123123', 'Guru honorer', 'guru3', 'guru3', 'guru');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `id_jadwal` int(11) NOT NULL,
  `hari` int(20) NOT NULL,
  `id_kelas` varchar(10) NOT NULL,
  `jam` varchar(20) NOT NULL,
  `id_mapel` int(11) NOT NULL,
  `id_guru` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`id_jadwal`, `hari`, `id_kelas`, `jam`, `id_mapel`, `id_guru`) VALUES
(22, 1, '5551', '07.00 - 08.20', 12188, 1),
(23, 0, '321', '08.30 - 09.20', 43321, 2),
(24, 4, '1232', '07.00 - 08.20', 12188, 2);

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` varchar(10) NOT NULL DEFAULT '',
  `nama_kelas` varchar(10) NOT NULL,
  `kapasitas` varchar(20) NOT NULL,
  `id_guru` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `nama_kelas`, `kapasitas`, `id_guru`) VALUES
('1232', 'Kelas IV', '39 Orang', 1),
('321', 'Kelas I', '40 Org', 2),
('5551', 'Kelas II', '6 Orang', 1);

-- --------------------------------------------------------

--
-- Table structure for table `mapel`
--

CREATE TABLE `mapel` (
  `id_mapel` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `kurikulum` varchar(10) NOT NULL,
  `kkm` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mapel`
--

INSERT INTO `mapel` (`id_mapel`, `nama`, `kurikulum`, `kkm`) VALUES
(4321, 'Kalkulus', '2020', 66),
(12188, 'Bahasa Inggris', '2019', 68),
(31211, 'IPA', '2022', 67),
(43321, 'Seni Budaya', '2019', 68);

-- --------------------------------------------------------

--
-- Table structure for table `nilai`
--

CREATE TABLE `nilai` (
  `id_nilai` int(11) NOT NULL,
  `id_subKelas` int(11) NOT NULL,
  `semester_thnAjaran` char(30) NOT NULL,
  `id_guru` int(11) NOT NULL,
  `id_mapel` int(11) NOT NULL,
  `tgs1` float NOT NULL,
  `tgs2` float NOT NULL,
  `tgs3` float NOT NULL,
  `tgs4` float NOT NULL,
  `tgs5` float NOT NULL,
  `uts` float NOT NULL,
  `uas` float NOT NULL,
  `hasil` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nilai`
--

INSERT INTO `nilai` (`id_nilai`, `id_subKelas`, `semester_thnAjaran`, `id_guru`, `id_mapel`, `tgs1`, `tgs2`, `tgs3`, `tgs4`, `tgs5`, `uts`, `uas`, `hasil`) VALUES
(5, 3, 'Genap', 2, 43321, 30, 20, 10, 10, 90, 98, 67, 46.4286),
(6, 4, 'Genap', 2, 12188, 80, 90, 80, 90, 88, 90, 89, 86.7143);

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id_siswa` int(11) NOT NULL,
  `nis` varchar(10) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `alamat` text NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `tempat` varchar(30) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `nama_ibu` varchar(20) NOT NULL,
  `telp` varchar(12) NOT NULL,
  `angkatan` varchar(10) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `hak_akses` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id_siswa`, `nis`, `nama`, `alamat`, `jenis_kelamin`, `tempat`, `tanggal_lahir`, `nama_ibu`, `telp`, `angkatan`, `username`, `password`, `hak_akses`) VALUES
(1, '9978', 'Kang Muslihat', 'Bandung ', 'Laki-laki', 'Bandung', '2022-04-12', 'Endang Priyatna', '0828123123', '2022', 'siswa2', 'siswa2', 'siswa'),
(3, '6168', 'Bambang', 'Jakarta', 'Laki-laki', 'Pekalongan', '2022-03-28', 'Siska Amira', '08312131231', '2021', 'bambang', 'bambang', 'siswa'),
(5, '5621', 'Rasti', 'asa', 'Perempuan', 'Semarang', '2022-09-07', 'Ceu Mimis', '0828123123', '2019', 'siswa7', 'siswa7', 'siswa'),
(6, '2324', 'Bagir Assegaf', 'asda', 'Laki-laki', 'Bandung', '2022-09-27', 'Eka', '08612431232', '2021', 'siswa9', 'siswa9', 'siswa');

-- --------------------------------------------------------

--
-- Table structure for table `subkelas`
--

CREATE TABLE `subkelas` (
  `id_subKelas` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subkelas`
--

INSERT INTO `subkelas` (`id_subKelas`, `id_siswa`, `id_kelas`) VALUES
(2, 3, 5551),
(3, 1, 321),
(4, 6, 321),
(5, 5, 1232);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(20) NOT NULL,
  `jabatan_user` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `hak_akses` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `nama_user`, `jabatan_user`, `username`, `password`, `hak_akses`) VALUES
(1, 'Fadli', 'admin TU', 'admin', 'admin', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`id_guru`);

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id_jadwal`),
  ADD KEY `id_kelas` (`id_kelas`),
  ADD KEY `id_mapel` (`id_mapel`),
  ADD KEY `id_guru` (`id_guru`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `mapel`
--
ALTER TABLE `mapel`
  ADD PRIMARY KEY (`id_mapel`);

--
-- Indexes for table `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`id_nilai`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id_siswa`);

--
-- Indexes for table `subkelas`
--
ALTER TABLE `subkelas`
  ADD PRIMARY KEY (`id_subKelas`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `guru`
--
ALTER TABLE `guru`
  MODIFY `id_guru` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id_jadwal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `nilai`
--
ALTER TABLE `nilai`
  MODIFY `id_nilai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `subkelas`
--
ALTER TABLE `subkelas`
  MODIFY `id_subKelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=223;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

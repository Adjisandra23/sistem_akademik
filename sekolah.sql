-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 20, 2026 at 02:59 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sekolah`
--

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `nip` varchar(20) NOT NULL,
  `nama_guru` varchar(100) NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jenkel` enum('L','P') NOT NULL,
  `alamat` text NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `pend_akhir` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`nip`, `nama_guru`, `tempat_lahir`, `tgl_lahir`, `jenkel`, `alamat`, `no_hp`, `pend_akhir`) VALUES
('123', 'Guru1', 'Tangerang Selatan', '2026-09-18', 'L', 'ciputat', '08888456133', 'S1'),
('444', 'Guru2', 'JAKARTA', '2026-09-10', 'L', 'bebas', '000000000000000', 'S1'),
('555', 'Guru3', 'Tangerang Selatan', '2026-09-01', 'P', 'ciputat', '08019379138913', 'S1');

-- --------------------------------------------------------

--
-- Table structure for table `kompetensi`
--

CREATE TABLE `kompetensi` (
  `kd_kompetensi` varchar(10) NOT NULL,
  `nama_kompetensi` varchar(100) NOT NULL,
  `prog_keahlian` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kompetensi`
--

INSERT INTO `kompetensi` (`kd_kompetensi`, `nama_kompetensi`, `prog_keahlian`) VALUES
('124', 'Machine Learning', 'Pemrograman'),
('6666', 'Web Developer', 'Pemrograman'),
('7777', 'Data Analyst', 'Data');

-- --------------------------------------------------------

--
-- Table structure for table `matpel`
--

CREATE TABLE `matpel` (
  `kd_matpel` varchar(50) NOT NULL,
  `nama_matpel` varchar(100) NOT NULL,
  `jumlah_jam` int(11) NOT NULL,
  `tingkat` varchar(10) NOT NULL,
  `kd_kompetensi` varchar(10) NOT NULL,
  `nip` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `matpel`
--

INSERT INTO `matpel` (`kd_matpel`, `nama_matpel`, `jumlah_jam`, `tingkat`, `kd_kompetensi`, `nip`) VALUES
('222', 'Machine Learning', 12, 'Medium', '124', '123'),
('555', 'Pemrograman', 12, 'Medium', '6666', '444'),
('999', 'Data Analyst', 3, 'Medium', '7777', '555');

-- --------------------------------------------------------

--
-- Table structure for table `nilai`
--

CREATE TABLE `nilai` (
  `kd_nilai` int(11) NOT NULL,
  `nis` varchar(20) NOT NULL,
  `kd_matpel` varchar(10) NOT NULL,
  `nilai_p` decimal(5,2) NOT NULL,
  `nilai_k` decimal(5,2) NOT NULL,
  `semester` enum('Ganjil','Genap') NOT NULL,
  `tapel` varchar(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `nilai`
--

INSERT INTO `nilai` (`kd_nilai`, `nis`, `kd_matpel`, `nilai_p`, `nilai_k`, `semester`, `tapel`) VALUES
(0, '5555', '555', 80.00, 70.00, 'Genap', '2026'),
(0, '999', '555', 80.00, 70.00, 'Genap', '2026'),
(1, '1345', '222', 70.00, 75.00, 'Ganjil', '2026');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `nis` varchar(20) NOT NULL,
  `nama_siswa` varchar(100) NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat` text NOT NULL,
  `no_telepon` varchar(15) NOT NULL,
  `kd_kompetensi` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`nis`, `nama_siswa`, `tempat_lahir`, `tgl_lahir`, `alamat`, `no_telepon`, `kd_kompetensi`) VALUES
('1234', 'kise', 'JAKARTA', '2026-09-10', 'bebas', '08089397193', 'RPL'),
('1345', 'adji', 'Lampung', '2026-09-05', 'metro', '280420742', 'RPL'),
('5555', 'rama', 'Bogor', '2026-09-02', 'Cibodas', '1381881393', 'Website'),
('999', 'arif', 'Lampung', '2026-09-02', 'metro', '099999888777', 'RPL');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` enum('admin','guru') NOT NULL,
  `nip` varchar(20) NOT NULL,
  `status` enum('aktif','nonaktif') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `username`, `password`, `level`, `nip`, `status`) VALUES
(1, 'admin1', 'admin1', 'admin', '123', 'aktif'),
(2, 'guru1', 'guru1', 'guru', '124', 'aktif');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`kd_nilai`,`nis`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`nis`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

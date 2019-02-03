-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 03, 2019 at 10:22 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cimb`
--

-- --------------------------------------------------------

--
-- Table structure for table `payroll`
--

CREATE TABLE `payroll` (
  `id` int(11) NOT NULL,
  `nama_payroll` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payroll`
--

INSERT INTO `payroll` (`id`, `nama_payroll`, `alamat`, `status`) VALUES
(1, 'Club Med', 'Kawasan BTDC / ITDC Badung, Bali\r\n', 1),
(2, 'Bali Nusa Dua Convention Center', 'Kawasan BTDC / ITDC Badung, Bali', 1),
(3, 'Awarta Hotel', 'Kawasan BTDC / ITDC Badung, Bali', 1),
(4, 'Amarterra Villa', 'Kawasan BTDC / ITDC Badung, Bali', 1),
(5, 'The Mulia', 'Kawasan Sawangan Nusa Dua, Benoa ,Badung, Bali', 0),
(6, 'Mantra Sakala Hotel', 'jl.pratama, tanjung benoa', 1),
(7, 'potato head beach club', 'petitenget', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pengumuman`
--

CREATE TABLE `pengumuman` (
  `id` int(10) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `isi_pengumuman` varchar(100) NOT NULL,
  `status` int(10) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengumuman`
--

INSERT INTO `pengumuman` (`id`, `judul`, `isi_pengumuman`, `status`, `user_id`) VALUES
(1, 'Monthly Meeting', 'Kepada seluruh staf PL agar berkumpul Hari senin  tanggal 21 januari 2019 di kantor jam 10 wita', 1, 5);

-- --------------------------------------------------------

--
-- Table structure for table `permohonan`
--

CREATE TABLE `permohonan` (
  `id` int(11) NOT NULL,
  `nama_nasabah` varchar(50) NOT NULL,
  `alamat_nasabah` varchar(50) NOT NULL,
  `dob` date NOT NULL,
  `hp` int(15) NOT NULL,
  `agama` varchar(10) NOT NULL,
  `pendidikan` varchar(5) NOT NULL,
  `jabatan` varchar(15) NOT NULL,
  `departemen` varchar(15) NOT NULL,
  `lama_bekerja` varchar(10) NOT NULL,
  `pengajuan` int(11) NOT NULL,
  `tenor` varchar(10) NOT NULL,
  `no_rekening` int(12) NOT NULL,
  `payroll_id` int(11) DEFAULT NULL,
  `status_permohonan` int(11) NOT NULL DEFAULT '1',
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `permohonan`
--

INSERT INTO `permohonan` (`id`, `nama_nasabah`, `alamat_nasabah`, `dob`, `hp`, `agama`, `pendidikan`, `jabatan`, `departemen`, `lama_bekerja`, `pengajuan`, `tenor`, `no_rekening`, `payroll_id`, `status_permohonan`, `user_id`) VALUES
(1, 'Debby christy', 'kuta', '1996-11-21', 811866868, 'kristen', 's1', 'host', 'first impressio', '2tahun', 25000000, '12', 2147483647, 1, 1, 5),
(2, 'oka nuantara', '', '0000-00-00', 0, '', '', '', '', '', 2000000, '', 0, 1, 1, NULL),
(3, 'oka nuantara', '', '0000-00-00', 0, '', '', '', '', '', 25000000, '', 0, 2, 1, 5),
(4, 'Yoga', 'jl.wijaya kusuma', '1995-03-15', 2147483647, 'hindu', 'smk', 'accounting', 'finance', '2 tahun', 20000000, '24', 2147483647, 1, 1, 5),
(5, 'Wayan Sudiarta', 'Jl. Pratama no.90', '1996-08-27', 2147483647, 'hindu', 'SMU', 'housekeeper', 'public area', '3 tahun', 10000000, '12', 2147483647, 3, 1, 5);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama_user` varchar(50) NOT NULL,
  `alamat_user` text NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(32) NOT NULL,
  `telepon` varchar(20) NOT NULL,
  `jenis_kelamin` varchar(20) NOT NULL,
  `role` varchar(20) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama_user`, `alamat_user`, `email`, `password`, `telepon`, `jenis_kelamin`, `role`, `status`) VALUES
(5, 'Guna', 'Tabanan', 'gunasaputra.gs@gmail.com', '6e6b00b1d17718deb07a0d6c231e2271', '081237129612', 'Laki-laki', 'FA', 1),
(6, 'yoga', 'nnnnn', 'yoga@gmail.com', '807659cd883fc0a63f6ce615893b3558', '0808979', 'Laki-laki', 'Eksekutif', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `payroll`
--
ALTER TABLE `payroll`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengumuman`
--
ALTER TABLE `pengumuman`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permohonan`
--
ALTER TABLE `permohonan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `payroll`
--
ALTER TABLE `payroll`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `pengumuman`
--
ALTER TABLE `pengumuman`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `permohonan`
--
ALTER TABLE `permohonan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

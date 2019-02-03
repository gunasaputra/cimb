-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 03 Feb 2019 pada 12.17
-- Versi server: 10.1.37-MariaDB
-- Versi PHP: 7.3.0

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
-- Struktur dari tabel `payroll`
--

CREATE TABLE `payroll` (
  `id` int(11) NOT NULL,
  `nama_payroll` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `payroll`
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
-- Struktur dari tabel `pengumuman`
--

CREATE TABLE `pengumuman` (
  `id` int(10) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `isi_pengumuman` varchar(100) NOT NULL,
  `status` int(10) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pengumuman`
--

INSERT INTO `pengumuman` (`id`, `judul`, `isi_pengumuman`, `status`, `user_id`) VALUES
(1, 'Monthly Meeting', 'Kepada seluruh staf PL agar berkumpul Hari senin  tanggal 21 januari 2019 di kantor jam 10 wita', 1, 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `permohonan`
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
  `user_id` int(11) DEFAULT NULL,
  `tanggal_permohonan` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `permohonan`
--

INSERT INTO `permohonan` (`id`, `nama_nasabah`, `alamat_nasabah`, `dob`, `hp`, `agama`, `pendidikan`, `jabatan`, `departemen`, `lama_bekerja`, `pengajuan`, `tenor`, `no_rekening`, `payroll_id`, `status_permohonan`, `user_id`, `tanggal_permohonan`) VALUES
(1, 'Debby christy', 'kuta', '1996-11-21', 811866868, 'kristen', 's1', 'host', 'first impressio', '2tahun', 25000000, '12', 2147483647, 1, 1, 5, '2019-02-03 18:33:54'),
(2, 'oka nuantara', '', '0000-00-00', 0, '', '', '', '', '', 2000000, '', 0, 1, 1, NULL, '2019-02-03 18:33:54'),
(3, 'oka nuantara', '', '0000-00-00', 0, '', '', '', '', '', 25000000, '', 0, 2, 1, 5, '2019-02-03 18:33:54'),
(4, 'Yoga', 'jl.wijaya kusuma', '1995-03-15', 2147483647, 'hindu', 'smk', 'accounting', 'finance', '2 tahun', 20000000, '24', 2147483647, 1, 1, 5, '2019-02-03 18:33:54'),
(5, 'Wayan Sudiarta', 'Jl. Pratama no.90', '1996-08-27', 2147483647, 'hindu', 'SMU', 'housekeeper', 'public area', '3 tahun', 10000000, '12', 2147483647, 3, 2, 5, '2019-02-03 18:33:54'),
(6, 'dewa', 'saDSSAD', '2019-02-20', 0, 'ASDA', 'ASDAS', 'ASDASD', 'ASDASD', 'ASDASD', 0, 'SADAS', 0, 1, 1, 7, '2019-02-03 19:11:05');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
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
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `nama_user`, `alamat_user`, `email`, `password`, `telepon`, `jenis_kelamin`, `role`, `status`) VALUES
(5, 'Guna', 'Tabanan', 'gunasaputra.gs@gmail.com', '6e6b00b1d17718deb07a0d6c231e2271', '081237129612', 'Laki-laki', 'FA', 1),
(6, 'yoga', 'nnnnn', 'yoga@gmail.com', '6e6b00b1d17718deb07a0d6c231e2271', '0808979', 'Laki-laki', 'Admin', 1),
(7, 'oka', 'asdasd', 'oka@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'asdsada', 'Laki-laki', 'FA', 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `payroll`
--
ALTER TABLE `payroll`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pengumuman`
--
ALTER TABLE `pengumuman`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `permohonan`
--
ALTER TABLE `permohonan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `payroll`
--
ALTER TABLE `payroll`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `pengumuman`
--
ALTER TABLE `pengumuman`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `permohonan`
--
ALTER TABLE `permohonan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

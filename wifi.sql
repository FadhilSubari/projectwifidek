-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 19 Des 2020 pada 10.09
-- Versi server: 10.4.6-MariaDB
-- Versi PHP: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wifi`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `nama_admin` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `roles` enum('master','normal') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `nama_admin`, `email`, `password`, `no_telp`, `roles`) VALUES
(1, 'Bayu', 'bayu@gmail.com', '5dc329b902a980c8b0df951f45a9bf13', '096870780780', 'master');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori_tempat`
--

CREATE TABLE `kategori_tempat` (
  `id_tempat` int(11) NOT NULL,
  `nama_tempat` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategori_tempat`
--

INSERT INTO `kategori_tempat` (`id_tempat`, `nama_tempat`) VALUES
(1, 'Balai Warga'),
(2, 'Rumah Ibadah'),
(3, 'Posyandu'),
(4, 'Taman'),
(5, 'Komunitas');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kecamatan`
--

CREATE TABLE `kecamatan` (
  `id_kecamatan` int(12) NOT NULL,
  `nama_kecamatan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kecamatan`
--

INSERT INTO `kecamatan` (`id_kecamatan`, `nama_kecamatan`) VALUES
(1, 'Tapos'),
(2, 'Sukmajaya');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelurahan`
--

CREATE TABLE `kelurahan` (
  `id_kelurahan` int(12) NOT NULL,
  `nama_kelurahan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kelurahan`
--

INSERT INTO `kelurahan` (`id_kelurahan`, `nama_kelurahan`) VALUES
(1, 'Cilangkap'),
(2, 'Jatijajar');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengajuan`
--

CREATE TABLE `pengajuan` (
  `id_pengajuan` varchar(20) NOT NULL,
  `nik` varchar(50) NOT NULL,
  `foto_ktp` varchar(255) NOT NULL,
  `proposal` varchar(255) NOT NULL,
  `nama_pengaju` varchar(50) NOT NULL,
  `nama_pic` varchar(50) NOT NULL,
  `id_user` varchar(50) NOT NULL,
  `alamat` longtext NOT NULL,
  `id_kelurahan` int(11) NOT NULL,
  `id_kecamatan` int(11) NOT NULL,
  `id_tempat` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `no_telp_pic` varchar(15) NOT NULL,
  `nama_wifi` varchar(50) NOT NULL,
  `tanggal` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pengajuan`
--

INSERT INTO `pengajuan` (`id_pengajuan`, `nik`, `foto_ktp`, `proposal`, `nama_pengaju`, `nama_pic`, `id_user`, `alamat`, `id_kelurahan`, `id_kecamatan`, `id_tempat`, `email`, `no_telp`, `no_telp_pic`, `nama_wifi`, `tanggal`) VALUES
('10', '12412412441234', 'foto_ktp1607220079.png', 'proposal1607220079.pdf', 'Bayu', 'Ramadhan', '1', 'as', 1, 1, 1, 'asdasd@gmail.com', '01812412412', '06789679679', 'Kosong', '2020-12-06 03:01:19');

-- --------------------------------------------------------

--
-- Struktur dari tabel `status_pengajuan`
--

CREATE TABLE `status_pengajuan` (
  `id_status` int(11) NOT NULL,
  `id_pengajuan` int(11) NOT NULL,
  `id_admin` int(11) NOT NULL,
  `status` enum('Menunggu Seleksi','Ditolak','Sukses Seleksi Berkas','Sukses Seleksi Survey','Sukses Terpasang') NOT NULL,
  `keterangan` longtext DEFAULT NULL,
  `tanggal` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `status_pengajuan`
--

INSERT INTO `status_pengajuan` (`id_status`, `id_pengajuan`, `id_admin`, `status`, `keterangan`, `tanggal`) VALUES
(2, 4, 1, 'Ditolak', '                      ', '2020-12-06 03:45:23'),
(4, 10, 0, 'Menunggu Seleksi', '', '2020-12-06 03:01:19'),
(5, 11, 1, 'Ditolak', '                      ', '2020-12-19 06:16:43'),
(6, 12, 0, 'Menunggu Seleksi', '', '2020-12-19 07:00:14'),
(7, 0, 0, 'Menunggu Seleksi', '', '2020-12-19 07:02:04');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` varchar(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `id_kelurahan` int(12) NOT NULL,
  `id_kecamatan` int(12) NOT NULL,
  `kode_pos` int(12) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama`, `alamat`, `id_kelurahan`, `id_kecamatan`, `kode_pos`, `email`, `password`, `no_telp`, `foto`) VALUES
('1', 'Bayu', 'Depok', 1, 1, 125412, 'nurfadhilsubari@gmail.com', '8db7a1f69ca8689e058ce47a5a7d4fa1', '085412512', ''),
('2', 'bebe', 'Jakarta', 1, 1, 12312, 'nurfadhilsubari12@gmail.com', '5dc329b902a980c8b0df951f45a9bf13', '', 'foto1600580145.PNG'),
('US003', 'veve', 'as', 1, 1, 12312, 'skymo@gmail.com', '5dc329b902a980c8b0df951f45a9bf13', '', 'foto1608357287.jpeg');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `kategori_tempat`
--
ALTER TABLE `kategori_tempat`
  ADD PRIMARY KEY (`id_tempat`);

--
-- Indeks untuk tabel `kecamatan`
--
ALTER TABLE `kecamatan`
  ADD PRIMARY KEY (`id_kecamatan`);

--
-- Indeks untuk tabel `kelurahan`
--
ALTER TABLE `kelurahan`
  ADD PRIMARY KEY (`id_kelurahan`);

--
-- Indeks untuk tabel `pengajuan`
--
ALTER TABLE `pengajuan`
  ADD PRIMARY KEY (`id_pengajuan`);

--
-- Indeks untuk tabel `status_pengajuan`
--
ALTER TABLE `status_pengajuan`
  ADD PRIMARY KEY (`id_status`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `kategori_tempat`
--
ALTER TABLE `kategori_tempat`
  MODIFY `id_tempat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `kecamatan`
--
ALTER TABLE `kecamatan`
  MODIFY `id_kecamatan` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `kelurahan`
--
ALTER TABLE `kelurahan`
  MODIFY `id_kelurahan` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `status_pengajuan`
--
ALTER TABLE `status_pengajuan`
  MODIFY `id_status` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

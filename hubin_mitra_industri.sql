-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 06 Sep 2020 pada 16.48
-- Versi server: 10.3.15-MariaDB
-- Versi PHP: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smknsatupebayuran`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `hubin_mitra_industri`
--

CREATE TABLE `hubin_mitra_industri` (
  `id` int(11) NOT NULL,
  `gambar` varchar(150) NOT NULL,
  `nama_perusahaan` varchar(150) NOT NULL,
  `tentang_perusahaan` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `hubin_mitra_industri`
--

INSERT INTO `hubin_mitra_industri` (`id`, `gambar`, `nama_perusahaan`, `tentang_perusahaan`) VALUES
(1, 'person_1.jpg', 'PT. Kalbe Morinaga', ' PT. Kalbe Morinaga Indonesia adalah salah satu bagian dari divisi Kalbe Nutritionals atau disebut Kalbe Farma Tbk. Perusahaan yang bergerak di bidang bisnis makanan kesehatan yang memproduksi susu bayi yang berlokasi di Kawasan Industri Indotaisei sector 1A blok Q1 Kalihurip-Karawang.');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `hubin_mitra_industri`
--
ALTER TABLE `hubin_mitra_industri`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `hubin_mitra_industri`
--
ALTER TABLE `hubin_mitra_industri`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

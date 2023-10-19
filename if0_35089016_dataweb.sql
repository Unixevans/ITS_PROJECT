-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: sql203.infinityfree.com
-- Waktu pembuatan: 18 Okt 2023 pada 23.18
-- Versi server: 10.4.17-MariaDB
-- Versi PHP: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `if0_35089016_dataweb`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `blog_data`
--

CREATE TABLE `blog_data` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `deskripsi` varchar(1000) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `datepost` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `slide_data`
--

CREATE TABLE `slide_data` (
  `id` int(11) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `deskripsi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `slide_data`
--

INSERT INTO `slide_data` (`id`, `gambar`, `judul`, `deskripsi`) VALUES
(27, '6517dc75e0b29.jpeg', 'KEGIATAN SOSIALISASI PROGRAM KERJA HIMPUNAN', 'Dokumentasi kegiatan musyawarah himpunan'),
(28, '6517dca00412f.jpeg', 'KEGIATAN 2', 'Dokumentasi kegiatan musyawarah himpunan'),
(29, '6517dcc33b871.jpeg', 'KEGIATAN 3', 'Ini deskripsi kegiatan ketiga'),
(30, '6517dcef5d055.jpeg', 'KEGIATAN 4', 'Ini deskripsi kegiatan keempat');

-- --------------------------------------------------------

--
-- Struktur dari tabel `structure_data`
--

CREATE TABLE `structure_data` (
  `id` int(11) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `divisi` varchar(50) NOT NULL,
  `instagram` varchar(500) NOT NULL,
  `tiktok` varchar(500) NOT NULL,
  `facebook` varchar(500) NOT NULL,
  `linkedin` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `structure_data`
--

INSERT INTO `structure_data` (`id`, `gambar`, `nama`, `divisi`, `instagram`, `tiktok`, `facebook`, `linkedin`) VALUES
(10, '6517dd3aa04f9.jpeg', 'NASHYRA AFAF FAYYAZA', 'Sekretaris', 'https://errors.infinityfree.net/errors/404/', 'https://errors.infinityfree.net/errors/404/', 'https://errors.infinityfree.net/errors/404/', 'https://errors.infinityfree.net/errors/404/'),
(11, '6517dd517484d.jpeg', 'AURELLYA NASYWA SALSABILA', 'Wakil Ketua', 'https://www.instagram.com/urlyn_2/', 'https://errors.infinityfree.net/errors/404/', 'https://errors.infinityfree.net/errors/404/', 'https://www.linkedin.com/in/aurellya-nasywa-369155284/'),
(12, '6517dd6d071b9.jpeg', 'ARJUNA SETIAWAN JOGI', 'Ketua Himpunan', 'https://www.instagram.com/arjunajogy/', 'https://errors.infinityfree.net/errors/404/', 'https://errors.infinityfree.net/errors/404/', 'https://errors.infinityfree.net/errors/404/'),
(13, '6517dd8981cb2.jpg', 'BU NURNANING TIASTUTI S.T', 'Pembina Himpunan', 'https://www.instagram.com/aningtias48/', 'https://errors.infinityfree.net/errors/404/', 'https://errors.infinityfree.net/errors/404/', 'https://www.linkedin.com/in/nurnaning-tiastuti-001807174/');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(4, 'admin', '$2y$10$H3RtfY46wBhA5Tw2yknpGeqvzDvj2D9uV5M1U8jgk3qrfYqkW/4tq');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `blog_data`
--
ALTER TABLE `blog_data`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `slide_data`
--
ALTER TABLE `slide_data`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `structure_data`
--
ALTER TABLE `structure_data`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `blog_data`
--
ALTER TABLE `blog_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `slide_data`
--
ALTER TABLE `slide_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT untuk tabel `structure_data`
--
ALTER TABLE `structure_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

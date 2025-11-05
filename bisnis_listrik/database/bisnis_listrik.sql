-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 05 Nov 2025 pada 13.01
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bisnis_listrik`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `galeri`
--

CREATE TABLE `galeri` (
  `id` int(11) NOT NULL,
  `gambar_url` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `alt_text` varchar(255) NOT NULL,
  `urutan` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `galeri`
--

INSERT INTO `galeri` (`id`, `gambar_url`, `deskripsi`, `alt_text`, `urutan`) VALUES
(1, 'https://images.unsplash.com/photo-1621905252507-b35492cc74b4?q=80&w=2070&auto=format&fit=crop', 'Pemasangan panel listrik baru yang rapi dan sesuai standar.', 'Instalasi Panel Listrik', 1),
(2, 'https://images.unsplash.com/photo-1603792554964-63f558b2e69a?q=80&w=2070&auto=format&fit=crop', 'Perbaikan instalasi korsleting di gedung komersial.', 'Perbaikan Korsleting', 2),
(3, 'https://images.unsplash.com/photo-1581094794329-c8112a89af12?q=80&w=2070&auto=format&fit=crop', 'Upgrade sistem pencahayaan ke lampu LED yang hemat energi.', 'Pemasangan Lampu LED', 3),
(4, 'https://images.unsplash.com/photo-1504307651254-35680f356dfd?q=80&w=2070&auto=format&fit=crop', 'Pengecekan dan perawatan berkala untuk instalasi listrik industri.', 'Pengecekan Berkala', 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tentang_kami`
--

CREATE TABLE `tentang_kami` (
  `id` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `paragraf1` text NOT NULL,
  `paragraf2` text NOT NULL,
  `gambar_url` varchar(255) NOT NULL,
  `gambar_alt` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tentang_kami`
--

INSERT INTO `tentang_kami` (`id`, `judul`, `paragraf1`, `paragraf2`, `gambar_url`, `gambar_alt`) VALUES
(1, 'Tentang Jasa Tukang Listrik', 'JasaTukangListrik.com adalah tim profesional yang berdedikasi untuk menyediakan layanan kelistrikan terbaik. Dengan pengalaman bertahun-tahun, kami telah membangun reputasi sebagai solusi terpercaya untuk semua kebutuhan listrik rumah tangga dan bisnis.', 'Komitmen kami adalah pada kepuasan pelanggan, keamanan kerja, dan hasil yang rapi serta tahan lama. Teknisi kami tidak hanya ahli secara teknis, tetapi juga terlatih untuk memberikan pelayanan yang sopan dan menjaga kebersihan tempat kerja.', 'https://images.unsplash.com/photo-1581094794329-c8112a89af12?q=80&w=2070&auto=format&fit=crop', 'Teknisi Listrik Profesional');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `galeri`
--
ALTER TABLE `galeri`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tentang_kami`
--
ALTER TABLE `tentang_kami`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `galeri`
--
ALTER TABLE `galeri`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tentang_kami`
--
ALTER TABLE `tentang_kami`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

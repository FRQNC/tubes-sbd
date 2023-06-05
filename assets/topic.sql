-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 31 Bulan Mei 2023 pada 09.25
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
-- Database: `study_society`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `topic`
--

-- Dumping data untuk tabel `topic`
--

INSERT INTO `topic` (`topic_id`, `topic_name`, `topic_count`) VALUES
(1, 'Bahasa Indonesia ', 0),
(2, 'Bahasa Inggris', 0),
(3, 'Bahasa jepang', 0),
(4, 'Ilmu pengetahuan alam', 0),
(5, 'Sejarah Indonesia', 0),
(6, 'Ilmu pengetahuan sosial', 0),
(7, 'Biologi', 0),
(8, 'Kimia', 0),
(9, 'Fisika', 0),
(10, 'Matematika', 0),
(11, 'Sosiologi', 0),
(12, 'Ekonomi', 0),
(13, 'Geografi', 0),
(14, 'Bahasa Prancis', 0),
(15, 'Bahasa Korea', 0),
(16, 'Bahasa Jerman', 0),
(17, 'Bahasa Sunda', 0),
(18, 'Seni budaya', 0),
(19, 'Pendidikan Agama dan budi pekerti', 0),
(20, 'pendidikn pancasila dan Kewarganegaraan', 0);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `topic`
--
ALTER TABLE `topic`
  ADD PRIMARY KEY (`topic_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `topic`
--
ALTER TABLE `topic`
  MODIFY `topic_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

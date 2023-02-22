-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 16 Mar 2021 pada 08.57
-- Versi server: 10.4.17-MariaDB
-- Versi PHP: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sawspk1`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `alternatif`
--

CREATE TABLE `alternatif` (
  `kAlternatif` varchar(20) NOT NULL,
  `nmAlternatif` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `alternatif`
--

INSERT INTO `alternatif` (`kAlternatif`, `nmAlternatif`) VALUES
('1703090402110006', 'Sarkam'),
('1703090402110009', 'Ridwan'),
('1703090402110011', 'Samuri'),
('1703090402110013', 'Yardani'),
('1703090402110015', 'Sudarno'),
('1703090402110016', 'Bastian'),
('1703090703130003', 'Suderman'),
('1703090903150006', 'Tukijo'),
('1703090906120001', 'Widiadi'),
('1703091012110009', 'Suwarjo'),
('1703091411160001', 'Kemis'),
('1703091508160002', 'Heri Kurniawan'),
('1703091907120014', 'Kamidi'),
('1703092009190003', 'Sobirin'),
('1703092409160001', 'Supriyadi'),
('1703092506140008', 'Sukadi'),
('1703092608150007', 'Sutarjono'),
('1703092708130013', 'Susilawati'),
('1703092807110010', 'Nurman Sitikno'),
('1703093008100014', 'Kisjilah');

-- --------------------------------------------------------

--
-- Struktur dari tabel `bobot`
--

CREATE TABLE `bobot` (
  `bc1` double NOT NULL,
  `bc2` double NOT NULL,
  `bc3` double NOT NULL,
  `bc4` double NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `bobot`
--

INSERT INTO `bobot` (`bc1`, `bc2`, `bc3`, `bc4`, `id`) VALUES
(0.4, 0.3, 0.2, 0.1, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kreteria`
--

CREATE TABLE `kreteria` (
  `kAlternatif` varchar(20) NOT NULL,
  `Nama` varchar(200) DEFAULT NULL,
  `c1` int(11) NOT NULL,
  `c2` int(11) NOT NULL,
  `c3` int(11) NOT NULL,
  `c4` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kreteria`
--

INSERT INTO `kreteria` (`kAlternatif`, `Nama`, `c1`, `c2`, `c3`, `c4`) VALUES
('1703090402110006', 'Sarkam', 1, 1, 2, 2),
('1703090402110009', 'Ridwan', 1, 1, 2, 3),
('1703090402110011', 'Samuri', 2, 2, 3, 3),
('1703090402110013', 'Yardani', 2, 2, 1, 3),
('1703090402110015', 'Sudarno', 1, 2, 1, 2),
('1703090402110016', 'Bastian', 3, 2, 3, 2),
('1703090703130003', 'Suderman', 1, 1, 2, 2),
('1703090903150006', 'Tukijo', 3, 3, 3, 4),
('1703090906120001', 'Widiadi', 2, 1, 1, 3),
('1703091012110009', 'Suwarjo', 1, 2, 3, 3),
('1703091411160001', 'Kemis', 1, 1, 1, 3),
('1703091508160002', 'Heri Kurniawan', 3, 3, 3, 3),
('1703091907120014', 'Kamidi', 1, 1, 1, 3),
('1703092009190003', 'Sobirin', 1, 1, 1, 2),
('1703092409160001', 'Supriyadi', 1, 2, 1, 3),
('1703092506140008', 'Sukadi', 1, 2, 3, 2),
('1703092608150007', 'Sutarjono', 1, 1, 1, 3),
('1703092708130013', 'Susilawati', 3, 3, 3, 2),
('1703092807110010', 'Nurman Sitikno', 3, 3, 3, 3),
('1703093008100014', 'Kisjilah', 3, 3, 3, 2);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `alternatif`
--
ALTER TABLE `alternatif`
  ADD PRIMARY KEY (`kAlternatif`);

--
-- Indeks untuk tabel `bobot`
--
ALTER TABLE `bobot`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kreteria`
--
ALTER TABLE `kreteria`
  ADD PRIMARY KEY (`kAlternatif`);

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `kreteria`
--
ALTER TABLE `kreteria`
  ADD CONSTRAINT `kreteria` FOREIGN KEY (`kAlternatif`) REFERENCES `alternatif` (`kAlternatif`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 21 Jun 2023 pada 04.08
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `saung_sembako`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `ID_BARANG` int(11) NOT NULL,
  `ID_JENIS` int(11) DEFAULT NULL,
  `NAMA` varchar(256) NOT NULL,
  `HARGA` int(11) NOT NULL,
  `IMG` varchar(1024) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`ID_BARANG`, `ID_JENIS`, `NAMA`, `HARGA`, `IMG`) VALUES
(2, 2, 'Royco 1 Renceng', 14000, 'roycorenceng.png'),
(3, 1, 'Indomie Goreng', 3500, 'indomie-goreng.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_barang`
--

CREATE TABLE `jenis_barang` (
  `ID_JENIS` int(11) NOT NULL,
  `KETERANGAN` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jenis_barang`
--

INSERT INTO `jenis_barang` (`ID_JENIS`, `KETERANGAN`) VALUES
(1, 'Produk Instan'),
(2, 'Bumbu Dapur');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `ID_TRANSAKSI` int(11) NOT NULL,
  `USERNAME` varchar(64) DEFAULT NULL,
  `TANGGAL` timestamp NOT NULL DEFAULT current_timestamp(),
  `TOTAL` int(11) NOT NULL DEFAULT 0,
  `DIBAYAR` int(11) NOT NULL DEFAULT 0,
  `KEMBALI` int(11) NOT NULL DEFAULT 0,
  `STATUS` enum('DIBAYAR','PROSES','DIBATALKAN') NOT NULL DEFAULT 'PROSES'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`ID_TRANSAKSI`, `USERNAME`, `TANGGAL`, `TOTAL`, `DIBAYAR`, `KEMBALI`, `STATUS`) VALUES
(1, 'kasir', '2023-06-19 04:27:32', 77000, 80000, 3000, 'DIBAYAR'),
(2, 'kasir', '2023-06-19 05:04:53', 0, 0, 0, 'DIBATALKAN'),
(3, 'kasir', '2023-06-19 04:59:07', 82250, 0, 0, 'PROSES');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi_barang`
--

CREATE TABLE `transaksi_barang` (
  `ID_TRANSAKSI_BARANG` int(11) NOT NULL,
  `ID_TRANSAKSI` int(11) NOT NULL,
  `ID_BARANG` int(11) DEFAULT NULL,
  `KUANTITAS` int(11) NOT NULL,
  `HARGA` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `transaksi_barang`
--

INSERT INTO `transaksi_barang` (`ID_TRANSAKSI_BARANG`, `ID_TRANSAKSI`, `ID_BARANG`, `KUANTITAS`, `HARGA`) VALUES
(2, 1, 3, 10, 3500),
(3, 1, 2, 3, 14000),
(4, 3, NULL, 7, 1750),
(5, 3, 2, 5, 14000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `USERNAME` varchar(64) NOT NULL,
  `EMAIL` varchar(128) NOT NULL,
  `PASSWORD` varchar(64) NOT NULL,
  `LEVEL` enum('PEMILIK','KASIR') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`USERNAME`, `EMAIL`, `PASSWORD`, `LEVEL`) VALUES
('admin', 'admin@saungsembako.com', '1234567890', 'PEMILIK'),
('kasir', 'kasir@saungsembako.com', 'qwertyuiop', 'KASIR');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`ID_BARANG`),
  ADD KEY `RELASIJENISBARANG` (`ID_JENIS`);

--
-- Indeks untuk tabel `jenis_barang`
--
ALTER TABLE `jenis_barang`
  ADD PRIMARY KEY (`ID_JENIS`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`ID_TRANSAKSI`),
  ADD KEY `USERNAME-TRANSACTION` (`USERNAME`);

--
-- Indeks untuk tabel `transaksi_barang`
--
ALTER TABLE `transaksi_barang`
  ADD PRIMARY KEY (`ID_TRANSAKSI_BARANG`),
  ADD KEY `TRANSAKSI-TBARANG` (`ID_TRANSAKSI`),
  ADD KEY `TBARANG-BARANG` (`ID_BARANG`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`USERNAME`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `barang`
--
ALTER TABLE `barang`
  MODIFY `ID_BARANG` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `jenis_barang`
--
ALTER TABLE `jenis_barang`
  MODIFY `ID_JENIS` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `ID_TRANSAKSI` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `transaksi_barang`
--
ALTER TABLE `transaksi_barang`
  MODIFY `ID_TRANSAKSI_BARANG` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `RELASIJENISBARANG` FOREIGN KEY (`ID_JENIS`) REFERENCES `jenis_barang` (`ID_JENIS`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Ketidakleluasaan untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `USERNAME-TRANSACTION` FOREIGN KEY (`USERNAME`) REFERENCES `users` (`USERNAME`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Ketidakleluasaan untuk tabel `transaksi_barang`
--
ALTER TABLE `transaksi_barang`
  ADD CONSTRAINT `TBARANG-BARANG` FOREIGN KEY (`ID_BARANG`) REFERENCES `barang` (`ID_BARANG`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `TRANSAKSI-TBARANG` FOREIGN KEY (`ID_TRANSAKSI`) REFERENCES `transaksi` (`ID_TRANSAKSI`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

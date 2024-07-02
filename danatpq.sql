-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 02 Jul 2024 pada 15.15
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `danatpq`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `danakeluar`
--

CREATE TABLE `danakeluar` (
  `id_dana_keluar` int(20) NOT NULL,
  `tgl_transaksi` date NOT NULL,
  `ket_pengeluaran` varchar(30) NOT NULL,
  `jmlh_dana` varchar(20) NOT NULL,
  `id_dana_masuk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `danakeluar`
--

INSERT INTO `danakeluar` (`id_dana_keluar`, `tgl_transaksi`, `ket_pengeluaran`, `jmlh_dana`, `id_dana_masuk`) VALUES
(33, '2024-07-05', 'Kegiatan PHBI', '200000', 27),
(37, '0000-00-00', 'Kegiatan PHBI g', '100000', 27);

-- --------------------------------------------------------

--
-- Struktur dari tabel `danamasuk`
--

CREATE TABLE `danamasuk` (
  `id_dana_masuk` int(10) NOT NULL,
  `tgl_transaksi` date NOT NULL,
  `id_donatur` int(6) NOT NULL,
  `jmlh_dana_masuk` int(10) NOT NULL,
  `keterangan` varchar(30) NOT NULL,
  `nama_file` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `danamasuk`
--

INSERT INTO `danamasuk` (`id_dana_masuk`, `tgl_transaksi`, `id_donatur`, `jmlh_dana_masuk`, `keterangan`, `nama_file`) VALUES
(27, '2024-06-27', 9, 3000000, 'Donasi', '460-351-Tes dokumen2.pdf');

-- --------------------------------------------------------

--
-- Struktur dari tabel `donatur`
--

CREATE TABLE `donatur` (
  `id_donatur` int(6) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `alamat` varchar(35) NOT NULL,
  `no_telpon` varchar(12) NOT NULL,
  `jenis_donatur` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `donatur`
--

INSERT INTO `donatur` (`id_donatur`, `nama`, `alamat`, `no_telpon`, `jenis_donatur`) VALUES
(9, 'Muhammad', 'Kemiling Permai', '-', 'Organisasi'),
(10, 'Agus Tomi', 'Jl. Imam Bonjol, Gg. Blora', '-', 'Perorangan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `santri`
--

CREATE TABLE `santri` (
  `id_santri` int(6) NOT NULL,
  `nis` varchar(5) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat` varchar(35) NOT NULL,
  `no_telpon` varchar(12) NOT NULL,
  `jenis_kelamin` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `santri`
--

INSERT INTO `santri` (`id_santri`, `nis`, `nama`, `tgl_lahir`, `alamat`, `no_telpon`, `jenis_kelamin`) VALUES
(32, '24001', 'Ananda Dwi S.', '2011-03-27', 'Jl. Panglima Polim, Gg. Mawar Putih', '-', 'Perempuan'),
(33, '24002', 'Adam Revan ', '2013-10-29', 'Jl. Panglima Polim, Gg. Mawar Putih', '-', 'Laki-Laki'),
(34, '24003', 'Adit ', '2013-09-03', 'Jl. Panglima Polim, Gg. Mawar Putih', '-', 'Laki-Laki'),
(35, '24004', 'Aisyah', '2011-03-10', 'Jl. Panglima Polim, Gg. Mawar Putih', '-', 'Perempuan'),
(36, '24005', 'Akbar', '2011-04-01', 'Jl. Panglima Polim, Gg. Mawar Putih', '-', 'Laki-Laki'),
(37, '24006', 'Akila', '2013-07-15', 'Jl. Panglima Polim, Gg. Mawar Putih', '-', 'Perempuan'),
(38, '24007', 'Alfa', '2013-11-25', 'Jl. Panglima Polim, Gg. Haji Musa', '-', 'Laki-Laki'),
(39, '24008', 'Alya Nur Atika', '2011-03-13', 'Jl. Panglima Polim, Gg. Mawar Putih', '-', 'Perempuan'),
(40, '24009', 'Andara', '2011-04-09', 'Jl. Panglima Polim, Gg. Haji Musa', '-', 'Laki-Laki'),
(41, '24010', 'Angga Romadoni', '2015-06-19', 'Jl. Panglima Polim, Gg. Mawar Putih', '-', 'Laki-Laki'),
(42, '24011', 'Aqila', '2013-02-08', 'Jl. Panglima Polim, Gg. Mawar Putih', '-', 'Perempuan'),
(43, '24012', 'Arif', '2011-06-05', 'Jl. Panglima Polim, Gg. Mawar Putih', '-', 'Laki-Laki'),
(44, '24013', 'Aufa Dwi P.S', '2013-07-09', 'Jl. Panglima Polim, Gg. Haji Musa', '-', 'Perempuan'),
(45, '24014', 'Ayasa', '2011-11-30', 'Jl. Panglima Polim, Gg. Mawar Putih', '-', 'Perempuan'),
(46, '24015', 'Bila', '2013-07-07', 'Jl. Panglima Polim, Gg. Mawar Putih', '-', 'Perempuan'),
(47, '24016', 'Carisa Sabrina Putri', '2013-08-19', 'Jl. Panglima Polim, Gg. Mawar Putih', '-', 'Perempuan'),
(48, '24017', 'Damar Erlangga ', '2014-01-03', 'Jl. Panglima Polim, Gg. Mawar Putih', '-', 'Laki-Laki'),
(49, '24018', 'Darel', '2011-09-23', 'Jl. Panglima Polim, Gg. Mawar Putih', '-', 'Laki-Laki'),
(50, '24019', 'Devan ', '2011-02-18', 'Jl. Panglima Polim, Gg. Mawar Putih', '-', 'Laki-Laki'),
(51, '24020', 'Diana Putri Dasopang ', '2010-03-10', 'Jl. Panglima Polim, Gg. Mawar Putih', '-', 'Perempuan'),
(52, '24021', 'Dimas', '2013-09-17', 'Jl. Panglima Polim, Gg. Mawar Putih', '-', 'Laki-Laki'),
(53, '24022', 'Dinda', '2011-04-19', 'Jl. Panglima Polim, Gg. Mawar Putih', '-', 'Perempuan'),
(54, '24023', 'Dira', '2013-01-29', 'Jl. Panglima Polim, Gg. Mawar Putih', '-', 'Perempuan'),
(55, '24024', 'Dofiq', '2011-01-31', 'Jl. Panglima Polim, Gg. Mawar Putih', '-', 'Laki-Laki'),
(56, '24025', 'Dwi Oktaviani', '2011-10-19', 'Jl. Panglima Polim, Gg. Mawar Putih', '-', 'Perempuan'),
(57, '24026', 'Fahri', '2013-06-05', 'Jl. Panglima Polim, Gg. Mawar Putih', '-', 'Laki-Laki'),
(58, '24027', 'Fahri Athaya ', '2013-08-06', 'Jl. Panglima Polim, Gg. Haji Musa', '-', 'Laki-Laki'),
(59, '24028', 'Fais', '2011-07-22', 'Jl. Panglima Polim, Gg. Mawar Putih', '-', 'Laki-Laki'),
(60, '24029', 'Fani', '2011-01-11', 'Jl. Panglima Polim, Gg. Haji Musa', '-', 'Laki-Laki'),
(61, '24030', 'Farhan Mulhim', '2010-06-29', 'Jl. Panglima Polim, Gg. Mawar Putih', '-', 'Laki-Laki'),
(62, '24031', 'Fatang G.', '2010-01-05', 'Jl. Panglima Polim, Gg. Mawar Putih', '-', 'Laki-Laki'),
(63, '24032', 'Fauzan', '2013-12-30', 'Jl. Panglima Polim, Gg. Mawar Putih', '-', 'Laki-Laki'),
(64, '24033', 'Fiki ', '2011-03-27', 'Jl. Panglima Polim, Gg. Mawar Putih', '-', 'Laki-Laki'),
(65, '24034', 'Fitri', '2013-03-08', 'Jl. Panglima Polim, Gg. Mawar Putih', '-', 'Perempuan'),
(66, '24035', 'Ibra Haryo', '2012-11-18', 'Jl. Panglima Polim, Gg. Mawar Putih', '-', 'Laki-Laki'),
(67, '24036', 'Ila', '2011-12-01', 'Jl. Panglima Polim, Gg. Mawar Putih', '-', 'Perempuan'),
(68, '24037', 'Ilham', '2013-05-10', 'Jl. Panglima Polim, Gg. Mawar Putih', '-', 'Laki-Laki'),
(69, '24038', 'Julian faliphi Dasopang', '2012-01-16', 'Jl. Panglima Polim, Gg. Mawar Putih', '-', 'Laki-Laki'),
(70, '24039', 'Kayla Aisyah O.', '2009-10-30', 'Jl. Panglima Polim, Gg. Mawar Putih', '-', 'Perempuan'),
(71, '24040', 'Kinaya Azura', '2012-09-30', 'Jl. Panglima Polim, Gg. Mawar Putih', '-', 'Perempuan'),
(72, '24041', 'Kevin Sabyan Putra', '2012-03-24', 'Jl. Panglima Polim, Gg. Mawar Putih', '-', 'Laki-Laki'),
(73, '24042', 'Laura Afini', '2011-12-31', 'Jl. Panglima Polim, Gg. Mawar Putih', '-', 'Perempuan'),
(74, '24043', 'Lia', '2013-12-29', 'Jl. Panglima Polim, Gg. Mawar Putih', '-', 'Perempuan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `spp`
--

CREATE TABLE `spp` (
  `id_spp` int(6) NOT NULL,
  `tgl_bayar` date NOT NULL,
  `id_santri` int(6) NOT NULL,
  `jmlh_pembayaran` varchar(10) NOT NULL,
  `metode_pembayaran` varchar(15) NOT NULL,
  `nama_file` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `spp`
--

INSERT INTO `spp` (`id_spp`, `tgl_bayar`, `id_santri`, `jmlh_pembayaran`, `metode_pembayaran`, `nama_file`) VALUES
(27, '2024-01-05', 32, '100000', 'Transfer Bank', '578-Tes Dokumen.pdf'),
(28, '2024-02-16', 32, '100000', 'Tunai', '92-Tes Dokumen.pdf'),
(29, '2024-03-12', 32, '100000', 'Tunai', '993-Tes Dokumen.pdf'),
(30, '2024-04-24', 32, '100000', 'Transfer Bank', '596-Tes Dokumen.pdf'),
(31, '2024-05-21', 32, '100000', 'Transfer Bank', '588-Tes Dokumen.pdf'),
(32, '2024-01-21', 33, '50000', 'Transfer Bank', '688-Tes Dokumen.pdf'),
(33, '2024-02-13', 33, '50000', 'Tunai', '204-Tes Dokumen.pdf'),
(34, '2024-03-12', 33, '50000', 'Tunai', '4-Tes Dokumen.pdf'),
(35, '2024-04-13', 33, '50000', 'Transfer Bank', '136-Tes Dokumen.pdf'),
(36, '2024-05-25', 33, '50000', 'Transfer Bank', '722-Tes Dokumen.pdf'),
(37, '2024-06-15', 33, '50000', 'Transfer Bank', '668-Tes Dokumen.pdf');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(6) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(225) NOT NULL,
  `level_user` enum('admin','donatur','kepala tpq','santri') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama`, `username`, `password`, `level_user`) VALUES
(1, 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin'),
(2, 'M. Haysim', 'kepala', '870f669e4bbbfa8a6fde65549826d1c4', 'kepala tpq'),
(5, 'Muhammad', 'Muhammad', '0b25313888c462091a67dbacb78d39f3', 'donatur'),
(21, 'Ananda Dwi S.', '24001', '0091db9e2726ab840251ea69bc0faea3', 'santri'),
(22, 'Adam Revan ', '24002', '150b0da16d1f06dd3e604763da65fe87', 'santri'),
(23, 'Adit ', '24003', '397c337a4b3bba159bae4f99c9700e48', 'santri'),
(24, 'Aisyah', '24004', '6d2f4aa4306b3b13a06b9dfc3e498054', 'santri'),
(25, 'Akbar', '24005', '6690f091f4d8b3de28e157a5dc26c059', 'santri'),
(26, 'Akila', '24006', 'e982e209dbe04a35a3a0cdd444cd2a49', 'santri'),
(27, 'Alfa', '24007', '1ee9bee2c7227c35ac1ca90f2e4fb172', 'santri'),
(28, 'Alya Nur Atika', '24008', '542a24028f7e1eff6be2bbc9a257fce1', 'santri'),
(29, 'Andara', '24009', '3ce5f6d8606512ad3b1217e43072b9dc', 'santri'),
(30, 'Angga Romadoni', '24010', 'd9395b105f23926e3c4f09453e018893', 'santri'),
(31, 'Aqila', '24011', '2baec31fde8a031a2b64ca6254f8726c', 'santri'),
(32, 'Arif', '24012', '907781cf76579f09be5b3697c14733b8', 'santri'),
(33, 'Aufa Dwi P.S', '24013', 'e7758fe5b033ed143e73a3cbafa3ff2f', 'santri'),
(34, 'Ayasa', '24014', 'ff010d3f8d01254e4634b161432071c0', 'santri'),
(35, 'Bila', '24015', 'b97ea58a20d493c8c45d7f6d1fb46cbb', 'santri'),
(36, 'Carisa Sabrina Putri', '24016', '9922aa62eb4eafdcea1bf84537bd4f24', 'santri'),
(37, 'Damar Erlangga ', '24017', 'eafd3244c6ce9ed78d27d31f04c06ffc', 'santri'),
(38, 'Darel', '24018', '72e7e3fda05043527dfd3e7376ff239c', 'santri'),
(39, 'Devan ', '24019', 'fc4e60f4fcea7a3008d593ba66e46bc2', 'santri'),
(40, 'Diana Putri Dasopang ', '24020', '03b059d4abd989c7cc2d79e8fc008cea', 'santri'),
(41, 'Dimas', '24021', '82b9fe6d15e5952e1f5e597833d5fd95', 'santri'),
(42, 'Dinda', '24022', 'b2dc43f5ceef31610d294fa01c6e7399', 'santri'),
(43, 'Dira', '24023', '1ea5e6f2837d15cbe7a9989bb9ff07af', 'santri'),
(44, 'Dofiq', '24024', '5d50d910720dc8d840855109c28ad865', 'santri'),
(45, 'Dwi Oktaviani', '24025', 'd1744bbff50dd9d5ee97ae053076295b', 'santri'),
(46, 'Fahri', '24026', '803d1665f18163c7851eadf4f7ed6120', 'santri'),
(47, 'Fahri Athaya ', '24027', '544c335154f6eaf79e2dff463a852e78', 'santri'),
(48, 'Fais', '24028', 'd3edf7943d676d05300127b451a0f4ce', 'santri'),
(49, 'Fani', '24029', '383d86008edae3a3a7e68c59c0da6dbe', 'santri'),
(50, 'Farhan Mulhim', '24030', '5de6755473dc988fe6c7db81f26a53ac', 'santri'),
(51, 'Fatang G.', '24031', '8474b8609e772af467ac0fc4acad4dd4', 'santri'),
(52, 'Fauzan', '24032', '1fb425070298bc615c24b69845387662', 'santri'),
(53, 'Fiki ', '24033', 'bc06828a994e9e28952b11b1affb9ec9', 'santri'),
(54, 'Fitri', '24034', 'c618f687f58d6f25fc50970accaa8fe6', 'santri'),
(55, 'Ibra Haryo', '24035', '5ea2f0a1257f0d9c2c243d7d4047aa8f', 'santri'),
(56, 'Ila', '24036', '251713b2559f797b13ec939ab7550ac6', 'santri'),
(57, 'Ilham', '24037', '9f15dd77bfcd0d8143ce0beb217ed18a', 'santri'),
(58, 'Julian faliphi Dasopang', '24038', 'baf24e5f9fc18cf58172d1ba745f0f7a', 'santri'),
(59, 'Kayla Aisyah O.', '24039', 'f331c4fbb503a896dc1ad1614a663b9b', 'santri'),
(60, 'Kinaya Azura', '24040', 'f4d4c95a4336cebe07df62e614f602f5', 'santri'),
(61, 'Kevin Sabyan Putra', '24041', '109673a937086b08c10d3e25d277b682', 'santri'),
(62, 'Laura Afini', '24042', 'fdb6188f12524bade185eee34ddb0aaf', 'santri'),
(63, 'Lia', '24043', 'b55b1e5d638b9568d38abb426975d91c', 'santri'),
(64, 'Agus Tomi', 'Agus Tomi', '69e1904b38aac23bb7cecf88c6b23a46', 'donatur');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `danakeluar`
--
ALTER TABLE `danakeluar`
  ADD PRIMARY KEY (`id_dana_keluar`);

--
-- Indeks untuk tabel `danamasuk`
--
ALTER TABLE `danamasuk`
  ADD PRIMARY KEY (`id_dana_masuk`);

--
-- Indeks untuk tabel `donatur`
--
ALTER TABLE `donatur`
  ADD PRIMARY KEY (`id_donatur`);

--
-- Indeks untuk tabel `santri`
--
ALTER TABLE `santri`
  ADD PRIMARY KEY (`id_santri`);

--
-- Indeks untuk tabel `spp`
--
ALTER TABLE `spp`
  ADD PRIMARY KEY (`id_spp`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `danakeluar`
--
ALTER TABLE `danakeluar`
  MODIFY `id_dana_keluar` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT untuk tabel `danamasuk`
--
ALTER TABLE `danamasuk`
  MODIFY `id_dana_masuk` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT untuk tabel `donatur`
--
ALTER TABLE `donatur`
  MODIFY `id_donatur` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `santri`
--
ALTER TABLE `santri`
  MODIFY `id_santri` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT untuk tabel `spp`
--
ALTER TABLE `spp`
  MODIFY `id_spp` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

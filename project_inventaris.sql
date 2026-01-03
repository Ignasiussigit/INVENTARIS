-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 06, 2019 at 02:50 PM
-- Server version: 5.7.23
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `project_inventaris`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `barang_id` int(11) NOT NULL,
  `barang_nama` varchar(255) NOT NULL,
  `barang_spesifikasi` varchar(255) DEFAULT NULL,
  `barang_lokasi` varchar(255) DEFAULT NULL,
  `barang_kondisi` varchar(255) DEFAULT NULL,
  `barang_jumlah` int(11) NOT NULL,
  `barang_sumber_dana` varchar(255) DEFAULT NULL,
  `barang_keterangan` text,
  `barang_jenis` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`barang_id`, `barang_nama`, `barang_spesifikasi`, `barang_lokasi`, `barang_kondisi`, `barang_jumlah`, `barang_sumber_dana`, `barang_keterangan`, `barang_jenis`) VALUES
(10, 'KURSI  ', 'KAYU', 'KELAS X2', 'BARU', 94, 'HIBAH', 'DI BELI BARU', 'Sarana'),
(11, 'MEJA ', 'KAYU', 'KELAS X2', 'BARU', 11, 'BOS', '', 'Sarana'),
(12, 'WC  ', 'BETON', 'BELAKANG KANTIN', 'BAGUS', 7, 'SEKOLAH', '4 WA PRIA, 4 WC WANITA', 'Prasarana'),
(15, 'PENSIL 2B ', 'PENSIL 2B', 'GUDANG', 'BARU', 400, 'KEUANGAN KAS', 'BARU', 'Sarana');

-- --------------------------------------------------------

--
-- Table structure for table `barang_keluar`
--

CREATE TABLE `barang_keluar` (
  `bk_id` int(11) NOT NULL,
  `bk_id_barang` int(11) NOT NULL,
  `bk_nama_barang` varchar(255) NOT NULL,
  `bk_tgl_keluar` date NOT NULL,
  `bk_jumlah_keluar` int(11) NOT NULL,
  `bk_lokasi` varchar(255) NOT NULL,
  `bk_penerima` varchar(255) NOT NULL,
  `bk_keterangan` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `barang_keluar`
--

INSERT INTO `barang_keluar` (`bk_id`, `bk_id_barang`, `bk_nama_barang`, `bk_tgl_keluar`, `bk_jumlah_keluar`, `bk_lokasi`, `bk_penerima`, `bk_keterangan`) VALUES
(3, 10, 'KURSI  ', '2019-04-30', 1, 'KELAS X2', 'GUDANG', 'PATAH'),
(4, 10, 'KURSI  ', '2019-08-18', 1, 'GUDANG 2', 'SASTRA', 'RUSAK DAN DIJUAL');

-- --------------------------------------------------------

--
-- Table structure for table `barang_masuk`
--

CREATE TABLE `barang_masuk` (
  `bm_id` int(11) NOT NULL,
  `bm_id_barang` int(11) NOT NULL,
  `bm_nama_barang` varchar(255) NOT NULL,
  `bm_tgl_masuk` date NOT NULL,
  `bm_jumlah` int(11) NOT NULL,
  `bm_id_suplier` int(11) NOT NULL,
  `bm_nama_suplier` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `barang_masuk`
--

INSERT INTO `barang_masuk` (`bm_id`, `bm_id_barang`, `bm_nama_barang`, `bm_tgl_masuk`, `bm_jumlah`, `bm_id_suplier`, `bm_nama_suplier`) VALUES
(7, 11, 'MEJA ', '2019-04-06', 2, 7, 'CV. CIMITA LESTARI '),
(11, 11, 'Corporis nihil itaqu ', '2019-04-19', 4, 8, 'PT. JAYA SEJAHTERA '),
(12, 15, 'PENSIL 2B ', '2019-08-10', 200, 8, 'PT. JAYA SEJAHTERA '),
(13, 10, 'KURSI  ', '2019-08-17', 80, 7, 'CV. CIMITA LESTARI ');

-- --------------------------------------------------------

--
-- Table structure for table `pinjam`
--

CREATE TABLE `pinjam` (
  `pinjam_id` int(11) NOT NULL,
  `pinjam_peminjam` varchar(255) NOT NULL,
  `pinjam_barang` int(11) NOT NULL,
  `pinjam_jumlah` int(11) NOT NULL,
  `pinjam_tgl_pinjam` date NOT NULL,
  `pinjam_tgl_kembali` date NOT NULL,
  `pinjam_kondisi` varchar(255) DEFAULT NULL,
  `pinjam_status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pinjam`
--

INSERT INTO `pinjam` (`pinjam_id`, `pinjam_peminjam`, `pinjam_barang`, `pinjam_jumlah`, `pinjam_tgl_pinjam`, `pinjam_tgl_kembali`, `pinjam_kondisi`, `pinjam_status`) VALUES
(8, 'Natus sit unde fugi', 10, 21, '2019-04-19', '2019-04-27', 'Autem suscipit nesci', 'Dipinjam'),
(9, 'SULAIMAN', 10, 1, '2019-08-03', '2019-08-05', 'BAGUS', 'Dikembalikan');

-- --------------------------------------------------------

--
-- Table structure for table `suplier`
--

CREATE TABLE `suplier` (
  `suplier_id` int(11) NOT NULL,
  `suplier_nama` varchar(255) NOT NULL,
  `suplier_alamat` varchar(255) NOT NULL,
  `suplier_telepon` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `suplier`
--

INSERT INTO `suplier` (`suplier_id`, `suplier_nama`, `suplier_alamat`, `suplier_telepon`) VALUES
(7, 'CV. CIMITA LESTARI ', 'JL. MERPATI ALI NO.89', '09837373383'),
(8, 'PT. JAYA SEJAHTERA ', 'JL. KELELAWAR NO.98', '08766373733'),
(9, 'CV. KARYA ANAK NEGERI ', 'JL. MERDEKA no. 898', '08737363734'),
(10, 'CV. PUTIH BERSIH ', 'JL. MAWAR no.983', '08932345232'),
(11, 'Anim rerum molestiae ', 'Architecto et vel pe', '13');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_nama` varchar(100) NOT NULL,
  `user_username` varchar(100) NOT NULL,
  `user_password` varchar(100) NOT NULL,
  `user_foto` varchar(100) DEFAULT NULL,
  `user_level` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_nama`, `user_username`, `user_password`, `user_foto`, `user_level`) VALUES
(1, 'Ahmad Jhony', 'admin', '0192023a7bbd73250516f069df18b500', '705931782_mahasiswa961111255_VID-20180629-WA0001.jpg', 'administrator'),
(6, 'Maimun', 'manajemen', '7839a6a91b6a99d4c29852a0beaa18c8', '', 'manajemen'),
(7, 'ajir muhajir', 'ajir', '80a3d2ba8cda33613c9f46446c4b262c', '', 'manajemen');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`barang_id`);

--
-- Indexes for table `barang_keluar`
--
ALTER TABLE `barang_keluar`
  ADD PRIMARY KEY (`bk_id`);

--
-- Indexes for table `barang_masuk`
--
ALTER TABLE `barang_masuk`
  ADD PRIMARY KEY (`bm_id`);

--
-- Indexes for table `pinjam`
--
ALTER TABLE `pinjam`
  ADD PRIMARY KEY (`pinjam_id`);

--
-- Indexes for table `suplier`
--
ALTER TABLE `suplier`
  ADD PRIMARY KEY (`suplier_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `barang_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `barang_keluar`
--
ALTER TABLE `barang_keluar`
  MODIFY `bk_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `barang_masuk`
--
ALTER TABLE `barang_masuk`
  MODIFY `bm_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `pinjam`
--
ALTER TABLE `pinjam`
  MODIFY `pinjam_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `suplier`
--
ALTER TABLE `suplier`
  MODIFY `suplier_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

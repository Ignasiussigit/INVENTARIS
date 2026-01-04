<?php
include '../koneksi.php';

$ruangan_tujuan_nama = $_POST['nama'];    
$barang_id          = $_POST['barang'];   
$jumlah             = $_POST['jumlah'];   
$tgl_mutasi         = $_POST['tgl_pinjam']; 
$keterangan         = $_POST['kondisi'];  

// status mutasi (tetap satu nilai)
$status = "Dimutasi";

$q_ruangan = mysqli_query(
  $koneksi,
  "SELECT ruangan_id FROM ruangan WHERE ruangan_nama='$ruangan_tujuan_nama'"
);
$r_ruangan = mysqli_fetch_assoc($q_ruangan);

$ruangan_tujuan_id = $r_ruangan['ruangan_id'];

mysqli_query($koneksi,"
  INSERT INTO pinjam
  (pinjam_peminjam, pinjam_barang, pinjam_jumlah,
   pinjam_tgl_pinjam, pinjam_tgl_kembali,
   pinjam_kondisi, pinjam_status)
  VALUES
  ('$ruangan_tujuan_nama', '$barang_id', '$jumlah',
   '$tgl_mutasi', NULL,
   'Dari $ruangan_asal ke $ruangan_tujuan_nama. $keterangan',
   '$status')
");

// ambil ruangan asal
$q_asal = mysqli_query($koneksi,"
  SELECT r.ruangan_nama
  FROM barang b
  JOIN ruangan r ON b.ruangan_id = r.ruangan_id
  WHERE b.barang_id='$barang_id'
");
$d_asal = mysqli_fetch_assoc($q_asal);
$ruangan_asal = $d_asal['ruangan_nama'];

mysqli_query($koneksi,"
  UPDATE barang
  SET ruangan_id='$ruangan_tujuan_id'
  WHERE barang_id='$barang_id'
");

header("location:peminjaman.php");

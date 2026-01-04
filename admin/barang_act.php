<?php 
include '../koneksi.php';
$nama  = $_POST['nama'];
$spesifikasi = $_POST['spesifikasi'];
$lokasi = $_POST['lokasi'];
$ruangan_id = $_POST['ruangan_id'];
$kondisi = $_POST['kondisi'];
$jumlah = $_POST['jumlah'];
$sumber_dana = $_POST['sumber_dana'];
$keterangan = $_POST['keterangan'];
$jenis = $_POST['jenis'];



// mysqli_query($koneksi, "
//   INSERT INTO barang 
//   (barang_nama, barang_spesifikasi, barang_lokasi, barang_kondisi, 
//    barang_jumlah, barang_sumber_dana, barang_keterangan, barang_jenis)
//   VALUES
//   ('$nama', '$spesifikasi', '$lokasi', '$kondisi', '$jumlah', 
//    '$sumber_dana', '$keterangan', '$jenis')
// ");

mysqli_query($koneksi, "
  INSERT INTO barang 
  (ruangan_id, barang_nama, barang_spesifikasi, barang_lokasi, barang_kondisi,
   barang_jumlah, barang_sumber_dana, barang_keterangan, barang_jenis)
  VALUES
  ('$ruangan_id', '$nama', '$spesifikasi', '', '$kondisi',
   '$jumlah', '$sumber_dana', '$keterangan', '$jenis')
");


header("location:barang.php");
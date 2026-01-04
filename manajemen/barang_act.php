<?php
session_start(); 
include '../koneksi.php';


if($_SESSION['level'] != "manajemen"){
  header("location:../logout.php");
  exit;
}

$nama  = $_POST['nama'];
$spesifikasi = $_POST['spesifikasi'];
$lokasi = $_POST['lokasi'];
$kondisi = $_POST['kondisi'];
$jumlah = $_POST['jumlah'];
$sumber_dana = $_POST['sumber_dana'];
$keterangan = $_POST['keterangan'];
$jenis = $_POST['jenis'];
$ruangan_id = $_POST['ruangan_id'];

// siapa yang menginput
$user_id = $_SESSION['id']; 

mysqli_query($koneksi,"
  INSERT INTO barang
  (barang_nama, barang_spesifikasi, barang_lokasi,
   barang_kondisi, barang_jumlah, barang_sumber_dana,
   barang_keterangan, barang_jenis, ruangan_id, user_id)
  VALUES
  ('$nama', '$spesifikasi', '$lokasi',
   '$kondisi', '$jumlah', '$sumber_dana',
   '$keterangan', '$jenis', '$ruangan_id', '$user_id')
");

header("location:barang.php");

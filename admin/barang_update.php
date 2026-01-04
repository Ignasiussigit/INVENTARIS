<?php 
include '../koneksi.php';
$id  = $_POST['id'];
$ruangan_id = $_POST['ruangan_id'];
$nama  = $_POST['nama'];
$spesifikasi = $_POST['spesifikasi'];
$lokasi = $_POST['lokasi'];
$kondisi = $_POST['kondisi'];
$jumlah = $_POST['jumlah'];
$sumber_dana = $_POST['sumber_dana'];
$keterangan = $_POST['keterangan'];
$jenis = $_POST['jenis'];

// mysqli_query($koneksi, "update barang set barang_nama='$nama', barang_spesifikasi='$spesifikasi', barang_lokasi='$lokasi', barang_kondisi='$kondisi', barang_jumlah='$jumlah', barang_sumber_dana='$sumber_dana', barang_keterangan='$keterangan', barang_jenis='$jenis' where barang_id='$id'");
mysqli_query($koneksi, "
  UPDATE barang SET
    ruangan_id='$ruangan_id',
    barang_nama='$nama',
    barang_spesifikasi='$spesifikasi',
    barang_kondisi='$kondisi',
    barang_jumlah='$jumlah',
    barang_sumber_dana='$sumber_dana',
    barang_keterangan='$keterangan',
    barang_jenis='$jenis'
  WHERE barang_id='$id'
");

header("location:barang.php");
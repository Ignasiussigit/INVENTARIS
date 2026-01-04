<?php
include '../koneksi.php';

$id = $_POST['id'];
$nama = $_POST['nama'];
$jenis = $_POST['jenis'];
$keterangan = $_POST['keterangan'];

mysqli_query($koneksi, "UPDATE ruangan SET 
  ruangan_nama='$nama',
  ruangan_jenis='$jenis',
  ruangan_keterangan='$keterangan'
  WHERE ruangan_id='$id'
");

header("location:ruangan.php");

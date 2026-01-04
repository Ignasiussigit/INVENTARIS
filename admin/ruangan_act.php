<?php
include '../koneksi.php';

$nama = $_POST['nama'];
$jenis = $_POST['jenis'];
$keterangan = $_POST['keterangan'];

mysqli_query($koneksi,"INSERT INTO ruangan VALUES (NULL,'$nama','$jenis','$keterangan')");
header("location:ruangan.php");

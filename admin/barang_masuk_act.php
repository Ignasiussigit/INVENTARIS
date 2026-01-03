<?php 
include '../koneksi.php';
$barang  = $_POST['barang'];
$tanggal = $_POST['tanggal'];
$jumlah = $_POST['jumlah'];
$suplier = $_POST['suplier'];


$b = mysqli_query($koneksi,"select * from barang where barang_id='$barang'");
$bb = mysqli_fetch_assoc($b);
$nama_barang = $bb['barang_nama'];

$s = mysqli_query($koneksi,"select * from suplier where suplier_id='$suplier'");
$ss = mysqli_fetch_assoc($s);
$nama_suplier = $ss['suplier_nama'];

// tambah jumlah data barang
$jumlah_lama = $bb['barang_jumlah'];
$jumlah_baru = $jumlah_lama+$jumlah;
mysqli_query($koneksi,"update barang set barang_jumlah='$jumlah_baru' where barang_id='$barang'");

mysqli_query($koneksi, "insert into barang_masuk values (NULL,'$barang','$nama_barang','$tanggal','$jumlah','$suplier','$nama_suplier')");
header("location:barang_masuk.php");
<?php
include '../koneksi.php';
$id = $_GET['id'];

mysqli_query($koneksi, "DELETE FROM ruangan WHERE ruangan_id='$id'");

header("location:ruangan.php");

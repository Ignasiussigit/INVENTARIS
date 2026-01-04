<?php
session_start();
include '../koneksi.php';

// pastikan hanya manajemen
if($_SESSION['level'] != "manajemen"){
  header("location:../logout.php");
  exit;
}

// ambil ruangan user
$ruangan_id = $_SESSION['ruangan_id'];
$q_ruangan = mysqli_query($koneksi,"
  SELECT ruangan_nama 
  FROM ruangan 
  WHERE ruangan_id='$ruangan_id'
");
$r_ruangan = mysqli_fetch_assoc($q_ruangan);
$ruangan_nama = $r_ruangan['ruangan_nama'];
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Laporan Data Barang</title>
  <link rel="stylesheet" href="../assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
</head>
<body>

<center>
  <h4>LAPORAN DATA BARANG</h4>
  <h5>Ruangan: <?php echo $ruangan_nama; ?></h5>
  <h5>Sistem Informasi Inventaris Rumah Sakit</h5>
</center>

<br>

<table class="table table-bordered table-striped">
  <thead>
    <tr>
      <th width="1%">NO</th>
      <th>NAMA BARANG</th>
      <th>SPESIFIKASI</th>
      <th>LOKASI</th>
      <th>KONDISI</th>
      <th>JUMLAH</th>
      <th>SUMBER DANA</th>
      <th>JENIS</th>
      <th>KETERANGAN</th>
      <th>DIINPUT OLEH</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $no = 1;

    $data = mysqli_query($koneksi,"
      SELECT 
        b.*,
        r.ruangan_nama,
        u.user_nama,
        u.user_level
      FROM barang b
      LEFT JOIN ruangan r ON b.ruangan_id = r.ruangan_id
      LEFT JOIN user u ON b.user_id = u.user_id
      WHERE b.ruangan_id='$ruangan_id'
      ORDER BY b.barang_nama ASC
    ");

    while($d = mysqli_fetch_array($data)){
    ?>
    <tr>
      <td><?php echo $no++; ?></td>
      <td><?php echo $d['barang_nama']; ?></td>
      <td><?php echo $d['barang_spesifikasi']; ?></td>
      <td><?php echo $d['ruangan_nama']; ?></td>
      <td><?php echo $d['barang_kondisi']; ?></td>
      <td><?php echo $d['barang_jumlah']; ?></td>
      <td><?php echo $d['barang_sumber_dana']; ?></td>
      <td><?php echo $d['barang_jenis']; ?></td>
      <td><?php echo $d['barang_keterangan']; ?></td>
      <td>
        <?php
        if($d['user_nama']){
          echo $d['user_nama']." <small>(".$d['user_level'].")</small>";
        }else{
          echo "<i>Data lama</i>";
        }
        ?>
      </td>
    </tr>
    <?php } ?>
  </tbody>
</table>

<script>
  window.print();
</script>

</body>
</html>

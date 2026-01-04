<?php
include 'header.php';
include '../koneksi.php';

$ruangan_id = $_SESSION['ruangan_id'];

// ambil nama ruangan
$q_ruangan = mysqli_query($koneksi,"
  SELECT ruangan_nama 
  FROM ruangan 
  WHERE ruangan_id='$ruangan_id'
");
$r_ruangan = mysqli_fetch_assoc($q_ruangan);
$ruangan_nama = $r_ruangan['ruangan_nama'];
?>

<div class="content-wrapper">

  <section class="content-header">
    <h1>
      Dashboard
      <small>Ruangan <?php echo $ruangan_nama; ?></small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Dashboard</li>
    </ol>
  </section>

  <section class="content">

    <div class="row">

      <!-- TOTAL MODEL BARANG -->
      <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-green">
          <div class="inner">
            <?php
            $barang = mysqli_query($koneksi,"
              SELECT COUNT(*) AS total 
              FROM barang 
              WHERE ruangan_id='$ruangan_id'
            ");
            $b = mysqli_fetch_assoc($barang);
            ?>
            <h3><?php echo $b['total']; ?></h3>
            <p>Total Model Barang</p>
          </div>
          <div class="icon">
            <i class="ion ion-cube"></i>
          </div>
          <a href="barang.php" class="small-box-footer">
            Lihat Barang <i class="fa fa-arrow-circle-right"></i>
          </a>
        </div>
      </div>

      <!-- TOTAL JUMLAH BARANG -->
      <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-aqua">
          <div class="inner">
            <?php
            $jumlah = mysqli_query($koneksi,"
              SELECT SUM(barang_jumlah) AS total 
              FROM barang 
              WHERE ruangan_id='$ruangan_id'
            ");
            $j = mysqli_fetch_assoc($jumlah);
            ?>
            <h3><?php echo $j['total'] ?? 0; ?></h3>
            <p>Total Unit Barang</p>
          </div>
          <div class="icon">
            <i class="ion ion-stats-bars"></i>
          </div>
          <a href="barang.php" class="small-box-footer">
            Detail <i class="fa fa-arrow-circle-right"></i>
          </a>
        </div>
      </div>

      <!-- MUTASI MASUK -->
      <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-orange">
          <div class="inner">
            <?php
            $mutasi_masuk = mysqli_query($koneksi,"
              SELECT COUNT(*) AS total 
              FROM pinjam
              WHERE pinjam_peminjam='$ruangan_nama'
            ");
            $mm = mysqli_fetch_assoc($mutasi_masuk);
            ?>
            <h3><?php echo $mm['total']; ?></h3>
            <p>Mutasi Masuk</p>
          </div>
          <div class="icon">
            <i class="ion ion-log-in"></i>
          </div>
          <a href="peminjaman.php" class="small-box-footer">
            Detail <i class="fa fa-arrow-circle-right"></i>
          </a>
        </div>
      </div>

      <!-- MUTASI KELUAR -->
      <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-red">
          <div class="inner">
            <?php
            $mutasi_keluar = mysqli_query($koneksi,"
              SELECT COUNT(*) AS total
              FROM pinjam
              WHERE pinjam_kondisi LIKE '%Dari $ruangan_nama ke%'
            ");
            $mk = mysqli_fetch_assoc($mutasi_keluar);
            ?>
            <h3><?php echo $mk['total']; ?></h3>
            <p>Mutasi Keluar</p>
          </div>
          <div class="icon">
            <i class="ion ion-log-out"></i>
          </div>
          <a href="peminjaman.php" class="small-box-footer">
            Detail <i class="fa fa-arrow-circle-right"></i>
          </a>
        </div>
      </div>

    </div>

    <!-- DETAIL LOGIN -->
    <div class="row">
      <section class="col-lg-6">
        <div class="box box-info">
          <div class="box-header">
            <h3 class="box-title">Detail Login</h3>
          </div>
          <div class="box-body">
            <table class="table table-bordered">
              <tr>
                <th width="30%">Nama</th>
                <td><?php echo $_SESSION['nama']; ?></td>
              </tr>
              <tr>
                <th>Username</th>
                <td><?php echo $_SESSION['username']; ?></td>
              </tr>
              <tr>
                <th>Ruangan</th>
                <td><?php echo $ruangan_nama; ?></td>
              </tr>
              <tr>
                <th>Hak Akses</th>
                <td>
                  <span class="label label-success text-uppercase">
                    <?php echo $_SESSION['level']; ?>
                  </span>
                </td>
              </tr>
            </table>
          </div>
        </div>
      </section>
    </div>

  </section>
</div>

<?php include 'footer.php'; ?>

<?php
include 'header.php';
include '../koneksi.php';

// ambil data ruangan user
$ruangan_id = $_SESSION['ruangan_id'];
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
      Mutasi Barang
      <small>Ruangan: <?php echo $ruangan_nama; ?></small>
    </h1>
  </section>

  <section class="content">
    <div class="row">
      <section class="col-lg-12">
        <div class="box box-info">

          <div class="box-header">
            <h3 class="box-title">Riwayat Mutasi Barang</h3>

            <div class="btn-group pull-right">
              <a style="margin-right: 4px;" href="peminjaman_tambah.php" class="btn btn-info btn-sm"><i class="fa fa-plus"></i> &nbsp Peminjaman Baru</a>              
              <!-- <a href="peminjaman_pdf.php" target="_blank" class="btn btn-sm btn-success"><i class="fa fa-file-pdf-o"></i> &nbsp CETAK PDF</a> -->
              <a href="peminjaman_print.php" target="_blank" class="btn btn-sm btn-primary"><i class="fa fa-print"></i> &nbsp PRINT</a>
            </div>
          </div>

          <div class="box-body">
            <div class="table-responsive">
              <table class="table table-bordered table-striped" id="table-datatable">
                <thead>
                  <tr>
                    <th width="1%">NO</th>
                    <th>BARANG</th>
                    <th>DARI RUANGAN</th>
                    <th>KE RUANGAN</th>
                    <th>JUMLAH</th>
                    <th>TGL MUTASI</th>
                    <th>KETERANGAN</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $no = 1;

                  $data = mysqli_query($koneksi,"
                    SELECT p.*, b.barang_nama
                    FROM pinjam p
                    JOIN barang b ON p.pinjam_barang = b.barang_id
                    WHERE 
                      p.pinjam_peminjam = '$ruangan_nama'
                      OR p.pinjam_kondisi LIKE '%Dari $ruangan_nama ke%'
                    ORDER BY p.pinjam_id DESC
                  ");

                  while($d = mysqli_fetch_array($data)){
                  ?>
                  <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $d['barang_nama']; ?></td>

                    <!-- RUANGAN ASAL -->
                    <td>
                      <?php
                      $asal = explode(' ke ', str_replace('Dari ', '', explode('.', $d['pinjam_kondisi'])[0]))[0];
                      echo $asal;
                      ?>
                    </td>

                    <!-- RUANGAN TUJUAN -->
                    <td><?php echo $d['pinjam_peminjam']; ?></td>

                    <td><?php echo $d['pinjam_jumlah']; ?></td>
                    <td><?php echo $d['pinjam_tgl_pinjam']; ?></td>
                    <td><?php echo $d['pinjam_kondisi']; ?></td>
                  </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
          </div>

        </div>
      </section>
    </div>
  </section>

</div>

<?php include 'footer.php'; ?>

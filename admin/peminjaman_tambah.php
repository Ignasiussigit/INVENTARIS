<?php include 'header.php'; ?>

<div class="content-wrapper">

  <section class="content-header">
    <h1>
      Mutasi Barang
      <small>Pindah Barang Antar Ruangan</small>
    </h1>
  </section>

  <section class="content">
    <div class="row">
      <section class="col-lg-6 col-lg-offset-3">
        <div class="box box-info">

          <div class="box-header">
            <h3 class="box-title">Mutasi Barang</h3>
            <a href="peminjaman.php" class="btn btn-info btn-sm pull-right">
              <i class="fa fa-reply"></i> Kembali
            </a>
          </div>

          <div class="box-body">
            <form action="peminjaman_act.php" method="post">

              <!-- PILIH BARANG -->
              <div class="form-group">
                <label>Barang</label>
                <select class="form-control" name="barang" required>
                  <option value=""> - Pilih Barang - </option>
                  <?php
                  include '../koneksi.php';
                  $barang = mysqli_query($koneksi,"
                    SELECT barang_id, barang_nama 
                    FROM barang 
                    ORDER BY barang_nama ASC
                  ");
                  while($b = mysqli_fetch_array($barang)){
                  ?>
                    <option value="<?php echo $b['barang_id']; ?>">
                      <?php echo $b['barang_nama']; ?>
                    </option>
                  <?php } ?>
                </select>
              </div>

              <!-- RUANGAN TUJUAN -->
              <div class="form-group">
                <label>Ruangan Tujuan</label>
                <select class="form-control" name="nama" required>
                  <option value=""> - Pilih Ruangan - </option>
                  <?php
                  $ruangan = mysqli_query($koneksi,"
                    SELECT ruangan_id, ruangan_nama 
                    FROM ruangan 
                    ORDER BY ruangan_nama ASC
                  ");
                  while($r = mysqli_fetch_array($ruangan)){
                  ?>
                    <option value="<?php echo $r['ruangan_nama']; ?>">
                      <?php echo $r['ruangan_nama']; ?>
                    </option>
                  <?php } ?>
                </select>
              </div>

              <!-- JUMLAH -->
              <div class="form-group">
                <label>Jumlah</label>
                <input type="number" class="form-control" name="jumlah" required>
              </div>

              <!-- TANGGAL MUTASI -->
              <div class="form-group">
                <label>Tanggal Mutasi</label>
                <input type="text" class="form-control datepicker2" name="tgl_pinjam" required>
              </div>

              <!-- KETERANGAN -->
              <div class="form-group">
                <label>Keterangan</label>
                <input type="text" class="form-control" name="kondisi" placeholder="Contoh: dipindahkan karena kebutuhan IGD">
              </div>

              <!-- SUBMIT -->
              <div class="form-group">
                <input type="submit" class="btn btn-primary btn-sm" value="Simpan Mutasi">
              </div>

            </form>
          </div>

        </div>
      </section>
    </div>
  </section>

</div>

<?php include 'footer.php'; ?>

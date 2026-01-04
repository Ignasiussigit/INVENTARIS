<?php include 'header.php'; ?>

<div class="content-wrapper">

  <section class="content-header">
    <h1>
      Ruangan
      <small>Edit Ruangan</small>
    </h1>
  </section>

  <section class="content">
    <div class="row">
      <section class="col-lg-6 col-lg-offset-3">
        <div class="box box-info">

          <div class="box-header">
            <h3 class="box-title">Edit Ruangan</h3>
            <a href="ruangan.php" class="btn btn-info btn-sm pull-right">
              <i class="fa fa-reply"></i> Kembali
            </a>
          </div>

          <div class="box-body">
            <form action="ruangan_update.php" method="post">
              <?php
              include '../koneksi.php';
              $id = $_GET['id'];
              $data = mysqli_query($koneksi,"SELECT * FROM ruangan WHERE ruangan_id='$id'");
              while($d = mysqli_fetch_array($data)){
              ?>
              <div class="form-group">
                <label>Nama Ruangan</label>
                <input type="hidden" name="id" value="<?php echo $d['ruangan_id']; ?>">
                <input type="text" name="nama" class="form-control" required value="<?php echo $d['ruangan_nama']; ?>">
              </div>

              <div class="form-group">
                <label>Jenis Ruangan</label>
                <input type="text" name="jenis" class="form-control" value="<?php echo $d['ruangan_jenis']; ?>">
              </div>

              <div class="form-group">
                <label>Keterangan</label>
                <textarea name="keterangan" class="form-control"><?php echo $d['ruangan_keterangan']; ?></textarea>
              </div>

              <div class="form-group">
                <input type="submit" class="btn btn-primary btn-sm" value="Simpan">
              </div>
              <?php } ?>
            </form>
          </div>

        </div>
      </section>
    </div>
  </section>

</div>

<?php include 'footer.php'; ?>

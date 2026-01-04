<?php include 'header.php'; ?>

<div class="content-wrapper">

  <section class="content-header">
    <h1>
      Ruangan
      <small>Data Ruangan</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Ruangan</li>
    </ol>
  </section>

  <section class="content">
    <div class="row">
      <section class="col-lg-12">
        <div class="box box-info">

          <div class="box-header">
            <h3 class="box-title">Data Ruangan</h3>
            <div class="btn-group pull-right">
              <a href="ruangan_tambah.php" class="btn btn-info btn-sm">
                <i class="fa fa-plus"></i> Tambah Ruangan
              </a>
            </div>
          </div>

          <div class="box-body">
            <div class="table-responsive">
              <table class="table table-bordered table-striped" id="table-datatable">
                <thead>
                  <tr>
                    <th width="1%">NO</th>
                    <th>NAMA RUANGAN</th>
                    <th>JENIS</th>
                    <th>KETERANGAN</th>
                    <th width="10%">OPSI</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  include '../koneksi.php';
                  $no = 1;
                  $data = mysqli_query($koneksi, "SELECT * FROM ruangan");
                  while($d = mysqli_fetch_array($data)){
                  ?>
                  <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $d['ruangan_nama']; ?></td>
                    <td><?php echo $d['ruangan_jenis']; ?></td>
                    <td><?php echo $d['ruangan_keterangan']; ?></td>
                    <td>
                      <a class="btn btn-warning btn-sm" href="ruangan_edit.php?id=<?php echo $d['ruangan_id']; ?>">
                        <i class="fa fa-cog"></i>
                      </a>
                      <a class="btn btn-danger btn-sm" href="ruangan_hapus_konfir.php?id=<?php echo $d['ruangan_id']; ?>">
                        <i class="fa fa-trash"></i>
                      </a>
                    </td>
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

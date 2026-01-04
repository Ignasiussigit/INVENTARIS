<?php include 'header.php'; ?>

<div class="content-wrapper">

  <section class="content-header">
    <h1>
      Barang
      <small>Data Barang</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Dashboard</li>
    </ol>
  </section>

  <section class="content">
    <div class="row">
      <section class="col-lg-12">
        <div class="box box-info">

          <div class="box-header">
            <h3 class="box-title">Barang</h3>
            <div class="btn-group pull-right">
              <a href="barang_tambah.php" class="btn btn-info btn-sm"><i class="fa fa-plus"></i> &nbsp Tambah Barang</a>              
            </div>
          </div>
          <div class="box-body">


            <div class="table-responsive">
              <table class="table table-bordered table-striped" id="table-datatable">
                <thead>
                  <tr>
                    <th width="1%">NO</th>
                    <th>NAMA</th>
                    <th>SPESIFIKASI</th>
                    <th>LOKASI</th>
                    <th>KONDISI</th>
                    <th>JUMLAH</th>
                    <th>SUMBER DANA</th>
                    <th>JENIS</th>
                    <th>KETERANGAN</th>
                    <th>DIINPUT OLEH</th>
                    <th width="10%">OPSI</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                  include '../koneksi.php';
                  $no=1;
                  // $data = mysqli_query($koneksi,"SELECT * FROM barang");

                  // $data = mysqli_query($koneksi,"
                  //   SELECT barang.*, ruangan.ruangan_nama
                  //   FROM barang
                  //   LEFT JOIN ruangan ON barang.ruangan_id = ruangan.ruangan_id
                  // ");

                 $data = mysqli_query($koneksi,"
                  SELECT 
                    b.*,
                    r.ruangan_nama,
                    u.user_nama,
                    u.user_level
                  FROM barang b
                  LEFT JOIN ruangan r ON b.ruangan_id = r.ruangan_id
                  LEFT JOIN user u ON b.user_id = u.user_id
                ");

                  while($d = mysqli_fetch_array($data)){
                    ?>
                    <tr>
                      <td><?php echo $no++; ?></td>
                      <td><?php echo $d['barang_nama']; ?></td>
                      <td><?php echo $d['barang_spesifikasi']; ?></td>
                      <!-- <td><?php echo $d['barang_lokasi']; ?></td> -->
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
                        echo "<i>Admin</i>";
                      }
                      ?>
                    </td>
                      <td>                        
                        <a class="btn btn-warning btn-sm" href="barang_edit.php?id=<?php echo $d['barang_id'] ?>"><i class="fa fa-cog"></i></a>
                        <a class="btn btn-danger btn-sm" href="barang_hapus_konfir.php?id=<?php echo $d['barang_id'] ?>"><i class="fa fa-trash"></i></a>
                      </td>
                    </tr>
                    <?php 
                  }
                  ?>
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
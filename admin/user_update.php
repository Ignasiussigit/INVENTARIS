<?php 
include '../koneksi.php';

$id  = $_POST['id'];
$nama  = $_POST['nama'];
$username = $_POST['username'];
$pwd = $_POST['password'];
$password = md5($_POST['password']);
$level = $_POST['level'];
$ruangan = $_POST['ruangan_id'];

// cek gambarr
$rand = rand();
$allowed = array('gif','png','jpg','jpeg');
$filename = $_FILES['foto']['name'];
$ext = pathinfo($filename, PATHINFO_EXTENSION);


$ruangan_sql = ($ruangan == "" ? "NULL" : "'$ruangan'");

if($pwd=="" && $filename==""){
  mysqli_query($koneksi,"
    UPDATE user SET
      user_nama='$nama',
      user_username='$username',
      user_level='$level',
      ruangan_id=$ruangan_sql
    WHERE user_id='$id'
  ");
  header("location:user.php");

}elseif($pwd==""){
  if(!in_array($ext,$allowed)) {
    header("location:user.php?alert=gagal");
  }else{
    move_uploaded_file($_FILES['foto']['tmp_name'], '../gambar/user/'.$rand.'_'.$filename);
    $x = $rand.'_'.$filename;

    mysqli_query($koneksi,"
      UPDATE user SET
        user_nama='$nama',
        user_username='$username',
        user_foto='$x',
        user_level='$level',
        ruangan_id=$ruangan_sql
      WHERE user_id='$id'
    ");
    header("location:user.php?alert=berhasil");
  }

}elseif($filename==""){
  mysqli_query($koneksi,"
    UPDATE user SET
      user_nama='$nama',
      user_username='$username',
      user_password='$password',
      user_level='$level',
      ruangan_id=$ruangan_sql
    WHERE user_id='$id'
  ");
  header("location:user.php");
}

<script src="assets/sweetalert/dist/sweetalert.min.js"></script>
<?php
include "../koneksi.php";
$id_user        = $_POST['id_user'];
$nama_user      = $_POST['nama_user'];
$jabatan_user     = $_POST['jabatan_user'];
$username    = $_POST['username'];
$password    = $_POST['password'];
$hak_akses    = $_POST['hak_akses'];


$query = mysqli_query($koneksi, "INSERT INTO users(id_user, nama_user, jabatan_user, username, password, hak_akses)
  VALUES('$id_user','$nama_user','$jabatan_user','$username','$password','$hak_akses')");

if ($query) {
?>
  <script>
    swal({
      title: 'Success',
      text: "Data Berhasil ditambahkan",
      icon: 'success',
    }).then(function(result) {
      if (true) {
        window.location = "?page=tampil_user";
      }
    })
  </script>
<?php
} else {
?>
  <script>
    swal({
      title: 'Error!!',
      text: "Data gagal ditambahkan",
      icon: 'error',
    }).then(function(result) {
      if (true) {
        window.location = "?page=tampil_user";
      }
    })
  </script>
<?php } ?>
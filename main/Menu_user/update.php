<script src="assets/sweetalert/dist/sweetalert.min.js"></script>
<?php
include "../koneksi.php";
$id_user        = $_POST['id_user'];
$nama_user      = $_POST['nama_user'];
$jabatan_user     = $_POST['jabatan_user'];
$username    = $_POST['username'];
$password    = $_POST['password'];
$hak_akses    = $_POST['hak_akses'];

$query = mysqli_query($koneksi, "UPDATE users SET nama_user='$nama_user', jabatan_user='$jabatan_user', username='$username', password='$password', hak_akses='$hak_akses' WHERE id_user='$id_user'");

if ($query) {
?>
  <script>
    swal({
      title: 'Success',
      text: "Data Berhasil diedit",
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
      title: 'Gagal Edit!',
      text: "Terjadi kesalahan proses data",
      icon: 'error',
    }).then(function(result) {
      if (true) {
        window.location = "?page=tampil_user";
      }
    })
  </script>
<?php } ?>
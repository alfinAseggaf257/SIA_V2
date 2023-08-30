<script src="assets/sweetalert/dist/sweetalert.min.js"></script>
<?php
include "../koneksi.php";
$id_subKelas        = $_POST['id_subKelas'];
$id_siswa      = $_POST['id_siswa'];
$id_kelas      = $_POST['id_kelas'];

$query = mysqli_query($koneksi, "UPDATE subkelas SET id_siswa='$id_siswa', id_kelas='$id_kelas' WHERE id_subKelas='$id_subKelas'");

if ($query) {
?>
  <script>
    swal({
      title: 'Success',
      text: "Data Berhasil diedit",
      icon: 'success',
    }).then(function(result) {
      if (true) {
        window.location = "?page=tampil_subKelas";
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
        window.location = "?page=tampil_subKelas";
      }
    })
  </script>
<?php } ?>
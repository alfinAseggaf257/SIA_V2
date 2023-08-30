<script src="assets/sweetalert/dist/sweetalert.min.js"></script>
<?php
include "../koneksi.php";
$id_siswa        = $_POST['id_siswa'];
$id_kelas      = $_POST['id_kelas'];

$query = mysqli_query($koneksi, "INSERT INTO subkelas(id_siswa, id_kelas)
  VALUES('$id_siswa','$id_kelas')");

if ($query) {
?>
  <script>
    swal({
      title: 'Success',
      text: "Data Berhasil ditambahkan",
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
      title: 'Error!!',
      text: "Data gagal ditambahkan",
      icon: 'error',
    }).then(function(result) {
      if (true) {
        window.location = "?page=tampil_subKelas";
      }
    })
  </script>
<?php } ?>
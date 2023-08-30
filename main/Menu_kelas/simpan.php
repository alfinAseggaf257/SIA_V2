<script src="assets/sweetalert/dist/sweetalert.min.js"></script>
<?php
include "../koneksi.php";
$id_kelas        = $_POST['id_kelas'];
$nama_kelas      = $_POST['nama_kelas'];
$kapasitas     = $_POST['kapasitas'];
$id_guru    = $_POST['id_guru'];


$query = mysqli_query($koneksi, "INSERT INTO kelas(id_kelas, nama_kelas, kapasitas, id_guru)
  VALUES('$id_kelas','$nama_kelas','$kapasitas','$id_guru')");

if ($query) {
?>
  <script>
    swal({
      title: 'Success',
      text: "Data Berhasil ditambahkan",
      icon: 'success',
    }).then(function(result) {
      if (true) {
        window.location = "?page=tampil_kelas";
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
        window.location = "?page=tampil_kelas";
      }
    })
  </script>
<?php } ?>
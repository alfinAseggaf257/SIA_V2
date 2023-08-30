<script src="assets/sweetalert/dist/sweetalert.min.js"></script>
<?php
include "../koneksi.php";
$hari      = $_POST['hari'];
$id_kelas     = $_POST['id_kelas'];
$jam    = $_POST['jam'];
$id_mapel    = $_POST['id_mapel'];
$id_guru    = $_POST['id_guru'];

$query = mysqli_query($koneksi, "INSERT INTO jadwal(hari, id_kelas, jam, id_mapel, id_guru)
  VALUES('$hari','$id_kelas','$jam','$id_mapel','$id_guru')");
if ($query) {
?>
  <script>
    swal({
      title: 'Success',
      text: "Data Berhasil ditambahkan",
      icon: 'success',
    }).then(function(result) {
      if (true) {
        window.location = "?page=tampil_jadwal";
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
        window.location = "?page=tampil_jadwal";
      }
    })
  </script>
<?php } ?>
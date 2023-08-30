<script src="assets/sweetalert/dist/sweetalert.min.js"></script>
<?php
include "../koneksi.php";
$id_jadwal = $_POST['id_jadwal'];
$hari      = $_POST['hari'];
$id_kelas  = $_POST['id_kelas'];
$jam       = $_POST['jam'];
$id_mapel  = $_POST['id_mapel'];
$id_guru       = $_POST['id_guru'];

$query = mysqli_query($koneksi, "UPDATE jadwal SET hari='$hari', id_kelas='$id_kelas', jam='$jam', id_mapel='$id_mapel',id_guru='$id_guru'WHERE id_jadwal='$id_jadwal'");

if ($query) {
?>
  <script>
    swal({
      title: 'Success',
      text: "Data Berhasil diedit",
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
      title: 'Gagal Edit!',
      text: "Terjadi kesalahan proses data",
      icon: 'error',
    }).then(function(result) {
      if (true) {
        window.location = "?page=tampil_jadwal";
      }
    })
  </script>
<?php } ?>
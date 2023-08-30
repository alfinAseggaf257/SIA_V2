<script src="assets/sweetalert/dist/sweetalert.min.js"></script>
<?php
include "../koneksi.php";
$id_kelas        = $_POST['id_kelas'];
$nama_kelas      = $_POST['nama_kelas'];
$kapasitas     = $_POST['kapasitas'];
$id_guru    = $_POST['id_guru'];

$query = mysqli_query($koneksi, "UPDATE kelas SET nama_kelas='$nama_kelas', kapasitas='$kapasitas', id_guru='$id_guru' WHERE id_kelas='$id_kelas'");

if ($query) {
?>
  <script>
    swal({
      title: 'Success',
      text: "Data Berhasil diedit",
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
      title: 'Gagal Edit!',
      text: "Terjadi kesalahan proses data",
      icon: 'error',
    }).then(function(result) {
      if (true) {
        window.location = "?page=tampil_kelas";
      }
    })
  </script>
<?php } ?>
<script src="assets/sweetalert/dist/sweetalert.min.js"></script>
<?php
include "../koneksi.php";
$id_mapel        = $_POST['id_mapel'];
$nama      = $_POST['nama'];
$kurikulum     = $_POST['kurikulum'];
$kkm    = $_POST['kkm'];

$query = mysqli_query($koneksi, "UPDATE mapel SET nama='$nama', kurikulum='$kurikulum', kkm='$kkm' WHERE id_mapel='$id_mapel'");

if ($query) {
?>
  <script>
    swal({
      title: 'Success',
      text: "Data Berhasil diedit",
      icon: 'success',
    }).then(function(result) {
      if (true) {
        window.location = "?page=tampil_mapel";
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
        window.location = "?page=tampil_mapel";
      }
    })
  </script>
<?php } ?>
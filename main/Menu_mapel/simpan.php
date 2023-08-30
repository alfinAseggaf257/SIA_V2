<script src="assets/sweetalert/dist/sweetalert.min.js"></script>
<?php
include "../koneksi.php";
$id_mapel        = $_POST['id_mapel'];
$nama      = $_POST['nama'];
$kurikulum     = $_POST['kurikulum'];
$kkm    = $_POST['kkm'];


$query = mysqli_query($koneksi, "INSERT INTO mapel(id_mapel, nama, kurikulum, kkm)
  VALUES('$id_mapel','$nama','$kurikulum','$kkm')");

if ($query) {
?>
  <script>
    swal({
      title: 'Success',
      text: "Data Berhasil ditambahkan",
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
      title: 'Error!!',
      text: "Data gagal ditambahkan",
      icon: 'error',
    }).then(function(result) {
      if (true) {
        window.location = "?page=tampil_mapel";
      }
    })
  </script>
<?php } ?>
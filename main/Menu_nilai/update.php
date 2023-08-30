<script src="assets/sweetalert/dist/sweetalert.min.js"></script>
<?php
include "../koneksi.php";
$id_nilai      = $_POST['id_nilai'];
$id_subKelas      = $_POST['id_subKelas'];
$semester_thnAjaran     = $_POST['semester_thnAjaran'];
$id_guru    = $_POST['id_guru'];
$id_mapel    = $_POST['id_mapel'];
$tgs1    = $_POST['tgs1'];
$tgs2    = $_POST['tgs2'];
$tgs3    = $_POST['tgs3'];
$tgs4    = $_POST['tgs4'];
$tgs5    = $_POST['tgs5'];
$uts    = $_POST['uts'];
$uas    = $_POST['uas'];
$hasil    = ($tgs1 + $tgs2 + $tgs3 + $tgs4 + $tgs5 + $uas + $uts) / 7;

$query = mysqli_query($koneksi, "UPDATE nilai SET id_subKelas='$id_subKelas', semester_thnAjaran='$semester_thnAjaran', id_guru='$id_guru', id_mapel='$id_mapel',tgs1='$tgs1', tgs2='$tgs2', tgs3='$tgs3', tgs4='$tgs4', tgs5='$tgs5', uts='$uts', uas='$uas', hasil='$hasil' WHERE id_nilai='$id_nilai'");

if ($query) {
?>
  <script>
    swal({
      title: 'Success',
      text: "Data Berhasil diedit",
      icon: 'success',
    }).then(function(result) {
      if (true) {
        window.location = "?page=tampil_nilai";
      }
    })
  </script>
<?php
} else {
?>
  <script>
    swal({
      title: 'Error!!',
      text: "Data gagal diedit",
      icon: 'error',
    }).then(function(result) {
      if (true) {
        window.location = "?page=tampil_nilai";
      }
    })
  </script>
<?php } ?>
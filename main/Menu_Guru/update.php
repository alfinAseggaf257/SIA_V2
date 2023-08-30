<script src="assets/sweetalert/dist/sweetalert.min.js"></script>
<?php
include "../koneksi.php";
$id_guru        = $_POST['id_guru'];
$nip        = $_POST['nip'];
$nama       = $_POST['nama'];
$alamat     = $_POST['alamat'];
$jenis_kelamin  = $_POST['jenis_kelamin'];
$tempat         = $_POST['tempat'];
$tanggal_lahir  = $_POST['tanggal_lahir'];
$telp       = $_POST['telp'];
$jabatan    = $_POST['jabatan'];
$username   = $_POST['username'];
$password   = $_POST['password'];
$hak_akses  = $_POST['hak_akses'];

$query = mysqli_query($koneksi, "UPDATE guru SET nip='$nip', nama='$nama', alamat='$alamat', jenis_kelamin='$jenis_kelamin', tempat='$tempat', tanggal_lahir='$tanggal_lahir', telp='$telp', jabatan='$jabatan', username='$username', password='$password', hak_akses='$hak_akses' WHERE id_guru='$id_guru'");

if ($query) {
?>
  <script>
    swal({
      title: 'Success',
      text: "Data Berhasil diedit",
      icon: 'success',
    }).then(function(result) {
      if (true) {
        window.location = "?page=tampil_guru";
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
        window.location = "?page=tampil_guru";
      }
    })
  </script>
<?php } ?>
<script src="assets/sweetalert/dist/sweetalert.min.js"></script>
<?php
include "../koneksi.php";
$id_siswa        = $_POST['id_siswa'];
$nis        = $_POST['nis'];
$nama       = $_POST['nama'];
$alamat     = $_POST['alamat'];
$jenis_kelamin  = $_POST['jenis_kelamin'];
$tempat         = $_POST['tempat'];
$tanggal_lahir  = $_POST['tanggal_lahir'];
$telp       = $_POST['telp'];
$angkatan       = $_POST['angkatan'];
$nama_ibu    = $_POST['nama_ibu'];
$username   = $_POST['username'];
$password   = $_POST['password'];
$hak_akses  = $_POST['hak_akses'];

$query = mysqli_query($koneksi, "UPDATE siswa SET nis='$nis', nama='$nama', alamat='$alamat', jenis_kelamin='$jenis_kelamin', tempat='$tempat', tanggal_lahir='$tanggal_lahir', telp='$telp', angkatan='$angkatan', nama_ibu='$nama_ibu', username='$username', password='$password', hak_akses='$hak_akses' WHERE id_siswa='$id_siswa'");

if ($query) {
?>
  <script>
    swal({
      title: 'Success',
      text: "Data Berhasil diedit",
      icon: 'success',
    }).then(function(result) {
      if (true) {
        window.location = "?page=tampil_siswa";
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
        window.location = "?page=tampil_siswa";
      }
    })
  </script>
<?php } ?>
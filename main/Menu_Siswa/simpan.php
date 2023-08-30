<script src="assets/sweetalert/dist/sweetalert.min.js"></script>
<?php
include "../koneksi.php";
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

$query = mysqli_query($koneksi, "INSERT INTO siswa(nis, nama, alamat, jenis_kelamin, tempat, tanggal_lahir, telp, angkatan, nama_ibu, username, password, hak_akses)
  VALUES('$nis','$nama','$alamat','$jenis_kelamin','$tempat','$tanggal_lahir','$telp', '$angkatan' ,'$nama_ibu','$username','$password','$hak_akses')");

if ($query) {
?>
  <script>
    swal({
      title: 'Success',
      text: "Data Berhasil ditambahkan",
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
      title: 'Error!!',
      text: "Data gagal ditambahkan",
      icon: 'error',
    }).then(function(result) {
      if (true) {
        window.location = "?page=tampil_siswa";
      }
    })
  </script>
<?php } ?>
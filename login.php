<?php
include 'koneksi.php';
session_start();
$username = $_POST['username'];
$password = $_POST['password'];

$users = mysqli_query($koneksi, "SELECT*FROM users WHERE username='$username' AND password='$password'");
$guru = mysqli_query($koneksi, "SELECT*FROM guru WHERE username='$username' AND password='$password'");
$siswa = mysqli_query($koneksi, "SELECT*FROM siswa WHERE username='$username' AND password='$password'");

if (mysqli_num_rows($users) > 0) {
	$convert = mysqli_fetch_assoc($users);
	$_SESSION['nama'] = $convert['nama_user'];
	$_SESSION['username'] = $convert['username'];
	$_SESSION['password'] = $convert['password'];
	$_SESSION['hak_akses'] = $convert['hak_akses'];

?>
	<script>
		alert("Login Berhasil.. Selamat Datang <?= $_SESSION['nama']; ?>");
		document.location = "main/index.php";
	</script>
<?php

} else if (mysqli_num_rows($guru) > 0) {
	$convert = mysqli_fetch_assoc($guru);
	$_SESSION['id_guru'] = $convert['id_guru'];
	$_SESSION['nip'] = $convert['nip'];
	$_SESSION['nama'] = $convert['nama'];
	$_SESSION['username'] = $convert['username'];
	$_SESSION['password'] = $convert['password'];
	$_SESSION['hak_akses'] = $convert['hak_akses'];

?>
	<script>
		alert("Login Berhasil.. Selamat Datang <?= $_SESSION['nama']; ?>");
		document.location = "main/index.php";
	</script>
<?php

} else if (mysqli_num_rows($siswa) > 0) {
	$convert = mysqli_fetch_assoc($siswa);
	$_SESSION['id_siswa'] = $convert['id_siswa'];
	$_SESSION['nis'] = $convert['nis'];
	$_SESSION['nama'] = $convert['nama'];
	$_SESSION['username'] = $convert['username'];
	$_SESSION['password'] = $convert['password'];
	$_SESSION['hak_akses'] = $convert['hak_akses'];

?>
	<script>
		alert("Login Berhasil.. Selamat Datang <?= $_SESSION['nama']; ?>");
		document.location = "main/index.php";
	</script>
<?php

} else {

?>
	<script>
		alert("Akun tidak ditemukan");
		document.location = "index.php";
	</script>
<?php }
?>
</body>
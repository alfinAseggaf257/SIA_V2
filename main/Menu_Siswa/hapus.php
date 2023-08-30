<script src="assets/sweetalert/dist/sweetalert.min.js"></script>
<?php
include '../koneksi.php';
$id_siswa = $_GET['id_siswa'];
$hapus = mysqli_query($koneksi, "DELETE FROM siswa WHERE id_siswa='$id_siswa'");
if ($hapus) {
?>
	<script>
		swal({
			title: 'Success',
			text: "Data Berhasil dihapus",
			icon: 'success',
		}).then(function(result) {
			if (true) {
				window.location = "?page=tampil_siswa";
			}
		})
	</script>
<?php
}

?>
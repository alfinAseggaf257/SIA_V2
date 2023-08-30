<script src="assets/sweetalert/dist/sweetalert.min.js"></script>
<?php
include '../koneksi.php';
$id_kelas = $_GET['id_kelas'];
$hapus = mysqli_query($koneksi, "DELETE FROM kelas WHERE id_kelas='$id_kelas'");
if ($hapus) {
?>
	<script>
		swal({
			title: 'Success',
			text: "Data Berhasil dihapus",
			icon: 'success',
		}).then(function(result) {
			if (true) {
				window.location = "?page=tampil_kelas";
			}
		})
	</script>
<?php
}

?>
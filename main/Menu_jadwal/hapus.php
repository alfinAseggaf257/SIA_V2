<script src="assets/sweetalert/dist/sweetalert.min.js"></script>
<?php
include '../koneksi.php';
$id_jadwal = $_GET['id_jadwal'];
$hapus = mysqli_query($koneksi, "DELETE FROM jadwal WHERE id_jadwal='$id_jadwal'");
if ($hapus) {
?>
	<script>
		swal({
			title: 'Success',
			text: "Data Berhasil dihapus",
			icon: 'success',
		}).then(function(result) {
			if (true) {
				window.location = "?page=tampil_jadwal";
			}
		})
	</script>
<?php
}

?>
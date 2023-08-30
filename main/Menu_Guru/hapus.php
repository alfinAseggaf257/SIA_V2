<script src="assets/sweetalert/dist/sweetalert.min.js"></script>
<?php
require '../koneksi.php';
$id_guru = $_GET['id_guru'];
$hapus = mysqli_query($koneksi, "DELETE FROM guru WHERE id_guru='$id_guru'");
if ($hapus) {
?>
	<script>
		swal({
			title: 'Success',
			text: "Data Berhasil dihapus",
			icon: 'success',
		}).then(function(result) {
			if (true) {
				window.location = "?page=tampil_guru";
			}
		})
	</script>
<?php
}

?>
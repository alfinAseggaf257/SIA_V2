<script src="assets/sweetalert/dist/sweetalert.min.js"></script>
<?php
include '../koneksi.php';
$id_mapel = $_GET['id_mapel'];
$hapus = mysqli_query($koneksi, "DELETE FROM mapel WHERE id_mapel='$id_mapel'");
if ($hapus) {
?>
	<script>
		swal({
			title: 'Success',
			text: "Data Berhasil dihapus",
			icon: 'success',
		}).then(function(result) {
			if (true) {
				window.location = "?page=tampil_mapel";
			}
		})
	</script>
<?php
}

?>
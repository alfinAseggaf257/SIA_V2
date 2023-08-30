<script src="assets/sweetalert/dist/sweetalert.min.js"></script>
<?php
include '../koneksi.php';
$id_nilai = $_GET['id_nilai'];
$hapus = mysqli_query($koneksi, "DELETE FROM nilai WHERE id_nilai='$id_nilai'");
if ($hapus) {
?>
	<script>
		swal({
			title: 'Success',
			text: "Data Berhasil dihapus",
			icon: 'success',
		}).then(function(result) {
			if (true) {
				window.location = "?page=tampil_nilai";
			}
		})
	</script>
<?php
}

?>
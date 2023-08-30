<script src="assets/sweetalert/dist/sweetalert.min.js"></script>
<?php
include '../koneksi.php';
$id_subKelas = $_GET['id_subKelas'];
$hapus = mysqli_query($koneksi, "DELETE FROM subkelas WHERE id_subKelas='$id_subKelas'");
if ($hapus) {
?>
	<script>
		swal({
			title: 'Success',
			text: "Data Berhasil dihapus",
			icon: 'success',
		}).then(function(result) {
			if (true) {
				window.location = "?page=tampil_subKelas";
			}
		})
	</script>
<?php
}

?>
<script src="assets/sweetalert/dist/sweetalert.min.js"></script>
<?php
include '../koneksi.php';
$id_user = $_GET['id_user'];
$hapus = mysqli_query($koneksi, "DELETE FROM users WHERE id_user='$id_user'");
if ($hapus) {
?>
	<script>
		swal({
			title: 'Success',
			text: "Data Berhasil dihapus",
			icon: 'success',
		}).then(function(result) {
			if (true) {
				window.location = "?page=tampil_user";
			}
		})
	</script>
<?php
}

?>
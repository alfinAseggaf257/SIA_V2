  <?php
  include '../koneksi.php';
  $id_mapel = $_GET['id_mapel'];
  $query   = mysqli_query($koneksi, "SELECT * FROM mapel WHERE id_mapel='$id_mapel'");
  while ($edit = mysqli_fetch_array($query)) {
  ?>
    <h3>Data Mapel</h3>
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold ">Akadmik / Mapel / Edit Data</h6>
      </div>
      <br>
      <div class="container">
        <form action="?page=update_mapel" method="POST">
          <div id="mapel" class="form-text text-primary"><b>Data Mapel</b></div><br>
          <div class="mb-3 row">
            <label for="id_mapel" class=" col-sm-2 form-label">ID Mapel</label>
            <input type="text" name="id_mapel" class="col-sm-4 form-control" id="id_mapel" value="<?php echo $edit['id_mapel']; ?>" readonly aria-describedby="id_mapel">
          </div>
          <div class="mb-3 row">
            <label for="nama" class=" col-sm-2 form-label">Nama Mapel</label>
            <input type="text" name="nama" class="col-sm-4 form-control" id="nama" value="<?php echo $edit['nama']; ?>" aria-describedby="nama">
          </div>
          <div class="mb-3 row">
            <label for="kurikulum" class=" col-sm-2 form-label">Kurikulum</label>
            <input type="text" name="kurikulum" class="col-sm-4 form-control" id="kurikulum" value="<?php echo $edit['kurikulum']; ?>" aria-describedby="kurikulum">
          </div>
          <div class="mb-3 row">
            <label for="kkm" class=" col-sm-2 form-label">KKM</label>
            <input type="text" name="kkm" class="col-sm-4 form-control" id="kkm" value="<?php echo $edit['kkm']; ?>" aria-describedby="kkm">
          </div>


          <button type="submit" class="btn btn-primary">Submit</button>
          <button type="reset" class="btn btn-danger">Reset</button>
        </form>
      </div>
      <br>
    </div>
  <?php } ?>
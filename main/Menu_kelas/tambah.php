  <h3>Data Kelas</h3>
  <div class="card shadow mb-4">
     <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold ">Akadmik / Kelas / Tambah Data</h6>
     </div>
     <br>
     <div class="container">
        <form action="?page=simpan_kelas" method="POST">
           <div id="kelas" class="form-text text-primary"><b>Data Kelas</b></div><br>
           <div class="mb-3 row">
              <label for="id_kelas" class=" col-sm-2 form-label">ID Kelas</label>
              <input type="text" name="id_kelas" class="col-sm-4 form-control" id="id_kelas" aria-describedby="id_kelas">
           </div>
           <div class="mb-3 row">
              <label for="nama" class=" col-sm-2 form-label">Nama Kelas</label>
              <input type="text" name="nama_kelas" class="col-sm-4 form-control" id="nama" aria-describedby="nama">
           </div>
           <div class="mb-3 row">
              <label for="kapasitas" class=" col-sm-2 form-label">Kapasitas Kelas</label>
              <input type="text" name="kapasitas" class="col-sm-4 form-control" id="kapasitas" aria-describedby="kapasitas">
           </div>
           <div class="mb-3 row">
              <label for="id_guru" class=" col-sm-2 form-label">Wali Kelas</label>
              <select class="col-sm-4 form-control" name="id_guru" required aria-label="Default select example">
                 <option selected value="">-- Pilih Salah Satu --</option>
                 <?php
                  require "../koneksi.php";
                  $result = mysqli_query($koneksi, "SELECT * FROM guru ORDER BY nama ASC");
                  while ($data = mysqli_fetch_array($result)) {
                     echo '<option value="' . $data['id_guru'] . '">' . $data['nama'] . ' </option>';
                  }
                  ?>
              </select>
           </div>
           <button type="submit" class="btn btn-primary">Submit</button>
           <button type="reset" class="btn btn-danger">Reset</button>
        </form>
     </div>
     <br>
  </div>
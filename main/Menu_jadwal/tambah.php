  <h3>Data Jadwal</h3>
  <div class="card shadow mb-4">
     <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold ">Akadmik / Jadwal / Tambah Data</h6>
     </div>
     <br>
     <div class="container">
        <form action="?page=simpan_jadwal" method="POST">
           <div id="Jadwal" class="form-text text-primary"><b>Data Jadwal</b></div><br>
           <div class="mb-3 row">
              <label for="hari" class=" col-sm-2 form-label">Hari</label>
              <select class="col-sm-4 form-control" name="hari" aria-label="Default select example">
                 <option selected value="">----- Pilih Hari ------</option>
                 <option value="0">Senin</option>
                 <option value="1">Selasa</option>
                 <option value="2">Rabu</option>
                 <option value="3">Kamis</option>
                 <option value="4">Jumat</option>
                 <option value="5">Sabtu</option>
              </select>
           </div>
           <div class="mb-3 row">
              <label for="jam" class=" col-sm-2 form-label">Jam</label>
              <input type="text" name="jam" class="col-sm-4 form-control" id="jam" aria-describedby="jam">
           </div>
           <div class="mb-3 row">
              <label for="id_kelas" class=" col-sm-2 form-label">Kelas</label>
              <select class="col-sm-4 form-control" name="id_kelas" aria-label="Default select example">
                 <option selected value="">-- Pilih Kelas --</option>
                 <?php
                  require "../koneksi.php";
                  $result = mysqli_query($koneksi, "SELECT * FROM kelas ORDER BY nama_kelas ASC");
                  while ($data = mysqli_fetch_array($result)) {
                     echo '<option value="' . $data['id_kelas'] . '">' . $data['nama_kelas'] . ' </option>';
                  }
                  ?>
              </select>
           </div>
           <div class="mb-3 row">
              <label for="mapel" class=" col-sm-2 form-label">Mapel</label>
              <select class="col-sm-4 form-control" name="id_mapel" aria-label="Default select example">
                 <option selected value="">-- Pilih Mapel --</option>
                 <?php
                  require "../koneksi.php";
                  $result = mysqli_query($koneksi, "SELECT * FROM mapel");
                  while ($data = mysqli_fetch_array($result)) {
                     echo '<option value="' . $data['id_mapel'] . '">' . $data['nama'] . ' </option>';
                  }
                  ?>
              </select>
           </div>
           <div class="mb-3 row">
              <label for="id_guru" class=" col-sm-2 form-label">Pengajar</label>
              <select class="col-sm-4 form-control" name="id_guru" aria-label="Default select example">
                 <option selected value="">-- Pilih Guru --</option>
                 <?php
                  require "../koneksi.php";
                  $result = mysqli_query($koneksi, "SELECT * FROM guru");
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
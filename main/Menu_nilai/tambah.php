  <h3>Data Nilai</h3>
  <div class="card shadow mb-4">
     <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold ">Akadmik / Nilai / Tambah Data</h6>
     </div>
     <br>
     <div class="container">
        <form action="?page=simpan_nilai" method="POST">
           <?php if ($_SESSION['hak_akses'] == "guru") : ?>

              <div class="mb-3 row">
                 <label for="id_guru" class=" col-sm-2 form-label">Penilai</label>
                 <input type="text" class="col-sm-4 form-control" value="<?php echo $_SESSION['nama']; ?>" readonly id="id_guru" aria-describedby="id_guru">
                 <input type="hidden" name="id_guru" class="col-sm-4 form-control" value="<?php echo $_SESSION['id_guru']; ?>" readonly id="id_guru" aria-describedby="id_guru">
              </div>
           <?php endif ?>
           <div class="mb-3 row">
              <label for="id_subKelas" class=" col-sm-2 form-label">Nama Siswa</label>
              <select class="col-sm-4 form-control" name="id_subKelas" aria-label="Default select example">
                 <option selected value="">-- Pilih Siswa --</option>
                 <?php
                  require "../koneksi.php";
                  $result = mysqli_query($koneksi, "SELECT * FROM subkelas 
                  INNER JOIN siswa ON subkelas.id_siswa=siswa.id_siswa
                  INNER JOIN kelas ON subkelas.id_kelas=kelas.id_kelas
                  ");
                  while ($data = mysqli_fetch_array($result)) {
                     echo '<option value="' . $data['id_subKelas'] . '">' . $data['nama'] . ' - ' . $data['nama_kelas'] . ' </option>';
                  }
                  ?>
              </select>
           </div>
           <div class="mb-3 row">
              <label for="id_kelas" class=" col-sm-2 form-label">Semeter - Th Ajaran</label>
              <input type="text" name="semester_thnAjaran" class="col-sm-4 form-control" id="semester_thnAjaran" aria-describedby="semester_thnAjaran">
           </div>



           <?php if ($_SESSION['hak_akses'] == "admin") : ?>

              <div class="mb-3 row">
                 <label for="id_guru" class=" col-sm-2 form-label">Guru</label>
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
           <?php endif ?>
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
              <label for="tgs1" class=" col-sm-2 form-label">Nilai Tugas 1</label>
              <input type="number" name="tgs1" class="col-sm-4 form-control" id="tgs1" aria-describedby="tgs1">
           </div>
           <div class="mb-3 row">
              <label for="tgs2" class=" col-sm-2 form-label">Nilai Tugas 2</label>
              <input type="number" name="tgs2" class="col-sm-4 form-control" id="tgs2" aria-describedby="tgs2">
           </div>
           <div class="mb-3 row">
              <label for="tgs3" class=" col-sm-2 form-label">Nilai Tugas 3</label>
              <input type="number" name="tgs3" class="col-sm-4 form-control" id="tgs3" aria-describedby="tgs3">
           </div>
           <div class="mb-3 row">
              <label for="tgs4" class=" col-sm-2 form-label">Nilai Tugas 4</label>
              <input type="number" name="tgs4" class="col-sm-4 form-control" id="tgs4" aria-describedby="tgs4">
           </div>
           <div class="mb-3 row">
              <label for="tgs5" class=" col-sm-2 form-label">Nilai Tugas 5</label>
              <input type="number" name="tgs5" class="col-sm-4 form-control" id="tgs5" aria-describedby="tgs5">
           </div>
           <div class="mb-3 row">
              <label for="uts" class=" col-sm-2 form-label">Nilai UTS</label>
              <input type="number" name="uts" class="col-sm-4 form-control" id="uts" aria-describedby="uts">
           </div>
           <div class="mb-3 row">
              <label for="uas" class=" col-sm-2 form-label">Nilai UAS</label>
              <input type="number" name="uas" class="col-sm-4 form-control" id="uas" aria-describedby="uas">
           </div>
           <button type="submit" class="btn btn-primary">Submit</button>
           <button type="reset" class="btn btn-danger">Reset</button>
        </form>
     </div>
     <br>
  </div>
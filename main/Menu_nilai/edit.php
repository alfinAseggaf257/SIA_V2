  <?php
  include '../koneksi.php';
  $id_nilai = $_GET['id_nilai'];
  $query = mysqli_query($koneksi, "SELECT nilai.id_nilai, nilai.id_subKelas, guru.id_guru, mapel.id_mapel, siswa.nama AS nama_siswa, kelas.nama_kelas, semester_thnAjaran, mapel.nama AS nama_mapel, guru.nama AS nama_guru, mapel.kkm, nilai.tgs1, nilai.tgs2, nilai.tgs3, nilai.tgs4, nilai.tgs5, nilai.uts, nilai.uas, nilai.hasil FROM nilai
  INNER JOIN subkelas ON nilai.id_subKelas = subkelas.id_subKelas
  INNER JOIN siswa ON subkelas.id_siswa = siswa.id_siswa
  INNER JOIN kelas ON subkelas.id_kelas = kelas.id_kelas
  INNER JOIN guru ON nilai.id_guru = guru.id_guru
  INNER JOIN mapel ON nilai.id_mapel = mapel.id_mapel
  WHERE id_nilai='$id_nilai'
  ");
  while ($edit = mysqli_fetch_array($query)) {
  ?>
    <h3>Data Nilai</h3>
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold ">Akadmik / Nilai / Edit Data</h6>
      </div>
      <br>
      <div class="container">
        <form action="?page=update_nilai" method="POST">
          <div id="nilai" class="form-text text-primary"><b>Data Nilai</b></div><br>
          <div class="mb-3 row" hidden>
            <label for="id_nilai" class=" col-sm-2 form-label">ID nilai</label>
            <input type="text" name="id_nilai" class="col-sm-4 form-control" id="id_nilai" value="<?php echo $edit['id_nilai']; ?>" readonly aria-describedby="id_kelas">
          </div>
          <div class="mb-3 row">
            <label for="id_subKelas" class=" col-sm-2 form-label">Nama Siswa</label>
            <select class="col-sm-4 form-control" name="id_subKelas" required aria-label="Default select example">
              <option selected value="">-- Pilih Siswa --</option>
              <?php
              include '../koneksi.php';
              $result = mysqli_query($koneksi, "SELECT * FROM subkelas 
              INNER JOIN siswa ON subkelas.id_siswa=siswa.id_siswa
              INNER JOIN kelas ON subkelas.id_kelas=kelas.id_kelas
              ");
              while ($kel = mysqli_fetch_array($result)) {
                if ($edit['id_subKelas'] == $kel['id_subKelas']) {
                  echo '<option value="' . $kel['id_subKelas'] . '" selected="selected">' . $kel['nama'] . ' - ' . $kel['nama_kelas'] . '</option>';
                } else {
                  echo '<option value="' . $kel['id_subKelas'] . '">' . $kel['nama'] . '</option>';
                }
              }
              ?>
            </select>
          </div>
          <div class="mb-3 row">
            <label for="id_kelas" class=" col-sm-2 form-label">Semeter - Th Ajaran</label>
            <input type="text" name="semester_thnAjaran" value="<?php echo $edit['semester_thnAjaran']; ?>" class="col-sm-4 form-control" id="semester_thnAjaran" aria-describedby="semester_thnAjaran">
          </div>
          <?php if ($_SESSION['hak_akses'] == "guru") : ?>

            <div class="mb-3 row">
              <label for="id_guru" class=" col-sm-2 form-label">Penilai</label>
              <input type="text" class="col-sm-4 form-control" value="<?php echo $_SESSION['nama']; ?>" readonly id="id_guru" aria-describedby="id_guru">
              <input type="hidden" name="id_guru" class="col-sm-4 form-control" value="<?php echo $_SESSION['id_guru']; ?>" readonly id="id_guru" aria-describedby="id_guru">
            </div>
          <?php endif ?>

          <?php if ($_SESSION['hak_akses'] == "admin") : ?>

            <div class="mb-3 row">
              <label for="id_guru" class=" col-sm-2 form-label">Guru</label>
              <select class="col-sm-4 form-control" name="id_guru" aria-label="Default select example">
                <option selected value="">-- Pilih Guru --</option>
                <?php
                require "../koneksi.php";
                $result = mysqli_query($koneksi, "SELECT * FROM guru");
                while ($kel = mysqli_fetch_array($result)) {
                  if ($edit['id_guru'] == $kel['id_guru']) {
                    echo '<option value="' . $kel['id_guru'] . '" selected="selected">' . $kel['nama'] . '</option>';
                  } else {
                    echo '<option value="' . $kel['id_guru'] . '">' . $kel['nama'] . '</option>';
                  }
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
              while ($kel = mysqli_fetch_array($result)) {
                if ($edit['id_mapel'] == $kel['id_mapel']) {
                  echo '<option value="' . $kel['id_mapel'] . '" selected="selected">' . $kel['nama'] . '</option>';
                } else {
                  echo '<option value="' . $kel['id_mapel'] . '">' . $kel['nama'] . '</option>';
                }
              }

              ?>
            </select>
          </div>
          <div class="mb-3 row">
            <label for="tgs1" class=" col-sm-2 form-label">Nilai Tugas 1</label>
            <input type="number" name="tgs1" class="col-sm-4 form-control" value="<?= $edit['tgs1']; ?>" id="tgs1" aria-describedby="tgs1">
          </div>
          <div class="mb-3 row">
            <label for="tgs2" class=" col-sm-2 form-label">Nilai Tugas 2</label>
            <input type="number" name="tgs2" class="col-sm-4 form-control" value="<?= $edit['tgs2']; ?>" id="tgs2" aria-describedby="tgs2">
          </div>
          <div class="mb-3 row">
            <label for="tgs3" class=" col-sm-2 form-label">Nilai Tugas 3</label>
            <input type="number" name="tgs3" class="col-sm-4 form-control" value="<?= $edit['tgs3']; ?>" id="tgs3" aria-describedby="tgs3">
          </div>
          <div class="mb-3 row">
            <label for="tgs4" class=" col-sm-2 form-label">Nilai Tugas 4</label>
            <input type="number" name="tgs4" class="col-sm-4 form-control" value="<?= $edit['tgs4']; ?>" id="tgs4" aria-describedby="tgs4">
          </div>
          <div class="mb-3 row">
            <label for="tgs5" class=" col-sm-2 form-label">Nilai Tugas 5</label>
            <input type="number" name="tgs5" class="col-sm-4 form-control" value="<?= $edit['tgs5']; ?>" id="tgs5" aria-describedby="tgs5">
          </div>
          <div class="mb-3 row">
            <label for="uts" class=" col-sm-2 form-label">Nilai UTS</label>
            <input type="number" name="uts" class="col-sm-4 form-control" value="<?= $edit['uts']; ?>" id="uts" aria-describedby="uts">
          </div>
          <div class="mb-3 row">
            <label for="uas" class=" col-sm-2 form-label">Nilai UAS</label>
            <input type="number" name="uas" class="col-sm-4 form-control" value="<?= $edit['uas']; ?>" id="uas" aria-describedby="uas">
          </div>
          <button type="submit" class="btn btn-primary">Submit</button>
          <button type="reset" class="btn btn-danger">Reset</button>
        </form>
      </div>
      <br>
    </div>
  <?php } ?>
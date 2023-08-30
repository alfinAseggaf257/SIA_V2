  <?php
  include '../koneksi.php';
  $id_jadwal = $_GET['id_jadwal'];
  $query   = mysqli_query($koneksi, "SELECT * FROM jadwal WHERE id_jadwal='$id_jadwal'");
  while ($edit = mysqli_fetch_array($query)) {
  ?>
    <h3>Data Jadwal</h3>
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold ">Akadmik / Jadwal / Edit Data</h6>
      </div>
      <br>
      <div class="container">
        <form action="?page=update_jadwal" method="POST">
          <div id="Jadwal" class="form-text text-primary"><b>Data Jadwal</b></div><br>
          <div class="mb-3 row" hidden>
            <label for="id_jadwal" class=" col-sm-2 form-label">ID jadwal</label>
            <input type="text" name="id_jadwal" class="col-sm-4 form-control" id="id_jadwal" value="<?php echo $edit['id_jadwal']; ?>" readonly aria-describedby="id_kelas">
          </div>
          <div class="mb-3 row">
            <label for="nama" class=" col-sm-2 form-label">Hari</label>
            <?php


            ?>
            <?php
            $hari = array('0', '1', '2', '3', '4', '5');

            ?>
            <select class="col-sm-4 form-control" name="hari" aria-label="Default select example">
              <option selected value="">-- Pilih Salah Satu --</option>
              <?php
              foreach ($hari as $key) {
                if ($key == $edit['hari']) {
              ?>
                  <option value="<?= $key; ?>" selected="selected">&nbsp; <?php
                                                                          if ($key == 0) {
                                                                            $key = "Senin";
                                                                          } else if ($key == 1) {
                                                                            $key = "Selasa";
                                                                          } else if ($key == 2) {
                                                                            $key = "Rabu";
                                                                          } else if ($key == 3) {
                                                                            $key = "Kamis";
                                                                          } else if ($key == 4) {
                                                                            $key = "Jumat";
                                                                          } else if ($key == 5) {
                                                                            $key = "Sabtu";
                                                                          }

                                                                          echo $key; ?></option>
                <?php } else { ?>
                  <option value="<?= $key; ?>">&nbsp; <?php
                                                      if ($key == 0) {
                                                        $key = "Senin";
                                                      } else if ($key == 1) {
                                                        $key = "Selasa";
                                                      } else if ($key == 2) {
                                                        $key = "Rabu";
                                                      } else if ($key == 3) {
                                                        $key = "Kamis";
                                                      } else if ($key == 4) {
                                                        $key = "Jumat";
                                                      } else if ($key == 5) {
                                                        $key = "Sabtu";
                                                      }

                                                      echo $key;

                                                      ?></option>
              <?php }
              }
              ?>
            </select>
          </div>
          <div class="mb-3 row">
            <label for="jam" class=" col-sm-2 form-label">Jam</label>
            <input type="text" name="jam" class="col-sm-4 form-control" id="jam" value="<?php echo $edit['jam']; ?>" aria-describedby="jam">
          </div>
          <div class="mb-3 row">
            <label for="id_kelas" class=" col-sm-2 form-label">Kelas</label>
            <select class="col-sm-4 form-control" name="id_kelas" required aria-label="Default select example">
              <option selected value="">-- Pilih Kelas --</option>
              <?php
              include '../koneksi.php';
              $result  = mysqli_query($koneksi, "SELECT * FROM kelas ORDER BY nama_kelas ASC");
              while ($kel = mysqli_fetch_array($result)) {
                if ($edit['id_kelas'] == $kel['id_kelas']) {
                  echo '<option value="' . $kel['id_kelas'] . '" selected="selected">' . $kel['nama_kelas'] . '</option>';
                } else {
                  echo '<option value="' . $kel['id_kelas'] . '">' . $kel['nama_kelas'] . '</option>';
                }
              }
              ?>
            </select>
          </div>
          <div class="mb-3 row">
            <label for="id_mapel" class=" col-sm-2 form-label">Mapel</label>
            <select class="col-sm-4 form-control" name="id_mapel" required aria-label="Default select example">
              <option selected value="">-- Pilih Mapel --</option>
              <?php
              include '../koneksi.php';
              $result  = mysqli_query($koneksi, "SELECT * FROM mapel");
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
            <label for="id_guru" class=" col-sm-2 form-label">Pengajar</label>
            <select class="col-sm-4 form-control" name="id_guru" required aria-label="Default select example">
              <option selected value="">-- Pilih Guru --</option>
              <?php
              include '../koneksi.php';
              $result  = mysqli_query($koneksi, "SELECT * FROM guru");
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

          <button type="submit" class="btn btn-primary">Submit</button>
          <button type="reset" class="btn btn-danger">Reset</button>
        </form>
      </div>
      <br>
    </div>
  <?php } ?>
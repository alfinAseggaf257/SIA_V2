  <?php
   include '../koneksi.php';
   $id_subKelas = $_GET['id_subKelas'];
   $query   = mysqli_query($koneksi, "SELECT * FROM subkelas WHERE id_subKelas='$id_subKelas'");
   while ($edit = mysqli_fetch_array($query)) {
   ?>
     <h3>Data Kelas</h3>
     <div class="card shadow mb-4">
        <div class="card-header py-3">
           <h6 class="m-0 font-weight-bold ">Akadmik / Sub Kelas / Edit Data</h6>
        </div>
        <br>
        <div class="container">
           <form action="?page=update_subKelas" method="POST">
              <div id="kelas" class="form-text text-primary"><b>Data Kelas Siswa</b></div><br>
              <div class="mb-3 row" hidden>
                 <label for="id_subKelas" class=" col-sm-2 form-label">ID Kelas</label>
                 <input type="text" name="id_subKelas" class="col-sm-4 form-control" id="id_subKelas" value="<?php echo $edit['id_subKelas']; ?>" readonly aria-describedby="id_kelas">
              </div>
              <div class="mb-3 row">
                 <label for="id_siswa" class=" col-sm-2 form-label">Nama Siswa</label>
                 <select class="col-sm-4 form-control" name="id_siswa" required aria-label="Default select example">
                    <option selected value="">-- Pilih Salah Satu --</option>
                    <?php
                     include '../koneksi.php';
                     $result  = mysqli_query($koneksi, "SELECT * FROM siswa");
                     while ($kel = mysqli_fetch_array($result)) {
                        if ($edit['id_siswa'] == $kel['id_siswa']) {
                           echo '<option value="' . $kel['id_siswa'] . '" selected="selected">' . $kel['nis'] . ' - ' . $kel['nama'] . '</option>';
                        } else {
                           echo '<option value="' . $kel['id_siswa'] . '">' . $kel['nama'] . '</option>';
                        }
                     }
                     ?>
                 </select>
              </div>
              <div class="mb-3 row">
                 <label for="id_kelas" class=" col-sm-2 form-label">Kelas</label>
                 <select class="col-sm-4 form-control" name="id_kelas" required aria-label="Default select example">
                    <option selected value="">-- Pilih Salah Satu --</option>
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
              <button type="submit" class="btn btn-primary">Submit</button>
              <button type="reset" class="btn btn-danger">Reset</button>
           </form>
        </div>
        <br>
     </div>
  <?php } ?>
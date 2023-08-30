  <?php
   include '../koneksi.php';
   $id_kelas = $_GET['id_kelas'];
   $query   = mysqli_query($koneksi, "SELECT * FROM kelas WHERE id_kelas='$id_kelas'");
   while ($edit = mysqli_fetch_array($query)) {
   ?>
     <h3>Data Kelas</h3>
     <div class="card shadow mb-4">
        <div class="card-header py-3">
           <h6 class="m-0 font-weight-bold ">Akadmik / Kelas / Edit Data</h6>
        </div>
        <br>
        <div class="container">
           <form action="?page=update_kelas" method="POST">
              <div id="kelas" class="form-text text-primary"><b>Data Kelas</b></div><br>
              <div class="mb-3 row">
                 <label for="id_kelas" class=" col-sm-2 form-label">ID Kelas</label>
                 <input type="text" name="id_kelas" class="col-sm-4 form-control" id="id_kelas" value="<?php echo $edit['id_kelas']; ?>" readonly aria-describedby="id_kelas">
              </div>
              <div class="mb-3 row">
                 <label for="nama" class=" col-sm-2 form-label">Nama Kelas</label>
                 <input type="text" name="nama_kelas" class="col-sm-4 form-control" id="nama" value="<?php echo $edit['nama_kelas']; ?>" aria-describedby="nama">
              </div>
              <div class="mb-3 row">
                 <label for="kapasitas" class=" col-sm-2 form-label">Kapasitas Kelas</label>
                 <input type="text" name="kapasitas" class="col-sm-4 form-control" id="kapasitas" value="<?php echo $edit['kapasitas']; ?>" aria-describedby="kapasitas">
              </div>
              <div class="mb-3 row">
                 <label for="id_guru" class=" col-sm-2 form-label">Wali Kelas</label>
                 <select class="col-sm-4 form-control" name="id_guru" required aria-label="Default select example">
                    <option selected value="">-- Pilih Salah Satu --</option>
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
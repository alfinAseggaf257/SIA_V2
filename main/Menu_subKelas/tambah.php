  <h3>Data Kelas Siswa</h3>
  <div class="card shadow mb-4">
     <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold ">Akadmik / Sub Kelas Siswa / Tambah Data</h6>
     </div>
     <br>
     <div class="container">
        <form action="?page=simpan_subKelas" method="POST">
           <div class="mb-3 row">
              <label for="siswa" class=" col-sm-2 form-label">Nama Siswa</label>
              <select class="col-sm-4 form-control" name="id_siswa" aria-label="Default select example">
                 <option selected value="">-- Pilih siswa --</option>
                 <?php
                  require "../koneksi.php";
                  $result = mysqli_query($koneksi, "SELECT * FROM siswa");
                  while ($data = mysqli_fetch_array($result)) {
                     echo '<option value="' . $data['id_siswa'] . '">' . $data['nis'] . '-' . $data['nama'] . ' </option>';
                  }
                  ?>
              </select>
           </div>
           <div class="mb-3 row">
              <label for="id_kelas" class=" col-sm-2 form-label">Kelas</label>
              <select class="col-sm-4 form-control" name="id_kelas" required aria-label="Default select example">
                 <option selected value="">-- Pilih Salah Satu --</option>
                 <?php
                  require "../koneksi.php";
                  $result = mysqli_query($koneksi, "SELECT * FROM kelas ORDER BY nama_kelas ASC");
                  while ($data = mysqli_fetch_array($result)) {
                     echo '<option value="' . $data['id_kelas'] . '">' . $data['nama_kelas'] . ' </option>';
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
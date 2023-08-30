  <h3>Data Siswa</h3>
  <div class="card shadow mb-4">
     <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold ">Akadmik / Siswa / Tambah Data</h6>
     </div>
     <br>
     <div class="container">
        <form action="?page=simpan_siswa" method="POST">
           <div id="siswa" class="form-text text-primary"><b>Data Diri Siswa</b></div><br>
           <div class="mb-3 row">
              <label for="nis" class=" col-sm-2 form-label">NIS</label>
              <input type="number" name="nis" class="col-sm-4 form-control" id="nis" aria-describedby="nis">
           </div>
           <div class="mb-3 row">
              <label for="nama" class=" col-sm-2 form-label">Nama</label>
              <input type="text" name="nama" class="col-sm-4 form-control" id="nama" aria-describedby="nama">
           </div>
           <div class="mb-3 row">
              <label for="Alamat" class=" col-sm-2 form-label">Alamat</label>
              <textarea class="col-sm-4 form-control" name="alamat" id="alamat" name="alamat"></textarea>
           </div>
           <div class="mb-3 row">
              <label for="jenisKelamin" class=" col-sm-2 form-label">Jenis Kelamin </label>
              <div class="form-check form-check-inline">
                 <input class="form-check-input" type="radio" name="jenis_kelamin" id="jenis_kelamin" value="Laki-laki" required>
                 <label class="form-check-label" for="inlineRadio1">Laki-laki</label>
              </div>
              <div class="form-check form-check-inline">
                 <input class="form-check-input" type="radio" name="jenis_kelamin" id="jenis_kelamin" value="Perempuan">
                 <label class="form-check-label" for="inlineRadio2">Perempuan</label>
              </div>
           </div>
           <div class="mb-3 row">
              <label for="ttl" class=" col-sm-2 form-label">TTL</label>
              <input type="text" name="tempat" class="col-sm-2 form-control" id="ttl" aria-describedby="ttl">
              <input type="date" name="tanggal_lahir" class="col-sm-2 form-control" id="ttl" aria-describedby="ttl">
           </div>
           <div class="mb-3 row">
              <label for="angkatan" class="col-sm-2 form-label">Angkatan</label>
              <input type="number" name="angkatan" class="col-sm-4 form-control" id="angkatan" aria-describedby="angkatan">
           </div>
           <div class="mb-3 row">
              <label for="nama_ibu" class="col-sm-2 form-label">Nama Ortu/Wali </label>
              <input type="text" name="nama_ibu" class="col-sm-4 form-control" id="nama_ibu" aria-describedby="nama_ibu">
           </div>
           <div class="mb-3 row">
              <label for="telp" class="col-sm-2 form-label">Nomor Telepon</label>
              <input type="number" name="telp" class="col-sm-4 form-control" id="telp" aria-describedby="telp">
           </div><br>
           <div id="siswa" class="form-text text-primary"><b>Login Siswa</b></div>
           <br>
           <div class="mb-3 row">
              <label for="username" class=" col-sm-2 form-label">Username</label>
              <input type="text" name="username" class="col-sm-4 form-control" id="username" aria-describedby="username">
           </div>
           <div class="mb-3 row">
              <label for="password" class=" col-sm-2 form-label">Password</label>
              <input type="text" name="password" class="col-sm-4 form-control" id="password" aria-describedby="password">
           </div>
           <div class="mb-3 row">
              <label for="hak_akses" class=" col-sm-2 form-label">Hak Akses</label>
              <input type="text" name="hak_akses" class="col-sm-4 form-control" id="hak_akses" value="siswa" readonly aria-describedby="hak_akses">
           </div>
           <button type="submit" class="btn btn-primary">Submit</button>
           <button type="reset" class="btn btn-danger">Reset</button>
        </form>
     </div>
     <br>
  </div>
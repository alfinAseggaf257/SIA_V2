  <h3>Data Guru</h3>
  <div class="card shadow mb-4">
     <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold ">Akadmik / Guru / Tambah Data</h6>
     </div>
     <br>
     <div class="container">
        <form action="?page=simpan_guru" method="POST">
           <div id="siswa" class="form-text text-primary"><b>Data Diri Guru</b></div><br>
           <div class="mb-3 row">
              <label for="nip" class=" col-sm-2 form-label">NIP</label>
              <input type="number" name="nip" class="col-sm-4 form-control" id="nip" aria-describedby="nip">
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
              <label for="jabatan" class="col-sm-2 form-label">Jabatan</label>
              <input type="text" name="jabatan" class="col-sm-4 form-control" id="jabatan" aria-describedby="jabatan">
           </div>
           <div class="mb-3 row">
              <label for="telp" class="col-sm-2 form-label">Nomor Telepon</label>
              <input type="number" name="telp" class="col-sm-4 form-control" id="telp" aria-describedby="telp">
           </div><br>
           <div id="siswa" class="form-text text-primary"><b>Login Guru</b></div>
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
              <input type="text" name="hak_akses" class="col-sm-4 form-control" id="hak_akses" value="guru" readonly aria-describedby="hak_akses">
           </div>
           <button type="submit" class="btn btn-primary">Submit</button>
           <button type="reset" class="btn btn-danger">Reset</button>
        </form>
     </div>
     <br>
  </div>
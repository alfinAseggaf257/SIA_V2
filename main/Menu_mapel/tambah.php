  <h3>Data Mapel</h3>
  <div class="card shadow mb-4">
     <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold ">Akadmik / Mapel / Tambah Data</h6>
     </div>
     <br>
     <div class="container">
        <form action="?page=simpan_mapel" method="POST">
           <div id="Mapel" class="form-text text-primary"><b>Data Mapel</b></div><br>
           <div class="mb-3 row">
              <label for="id_mapel" class=" col-sm-2 form-label">ID Mapel</label>
              <input type="number" name="id_mapel" class="col-sm-4 form-control" id="id_mapel" aria-describedby="id_mapel">
           </div>
           <div class="mb-3 row">
              <label for="nama" class=" col-sm-2 form-label">Nama Mapel</label>
              <input type="text" name="nama" class="col-sm-4 form-control" id="nama" aria-describedby="nama">
           </div>
           <div class="mb-3 row">
              <label for="kurikulum" class=" col-sm-2 form-label">Kurikulum</label>
              <input type="text" name="kurikulum" class="col-sm-4 form-control" id="kurikulum" aria-describedby="kurikulum">
           </div>
           <div class="mb-3 row">
              <label for="kkm" class=" col-sm-2 form-label">KKM</label>
              <input type="number" name="kkm" class="col-sm-4 form-control" id="kkm" aria-describedby="kkm">
           </div>
           <button type="submit" class="btn btn-primary">Submit</button>
           <button type="reset" class="btn btn-danger">Reset</button>
        </form>
     </div>
     <br>
  </div>
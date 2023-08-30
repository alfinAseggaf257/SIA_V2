  <?php 
  include'../koneksi.php';
  $id_user =$_GET['id_user'];
  $query   =mysqli_query($koneksi,"SELECT * FROM users WHERE id_user='$id_user'");
  while ($edit=mysqli_fetch_array($query)) { 
   ?>
   <h3>Data Kelas</h3>
   <div class="card shadow mb-4">
     <div class="card-header py-3">
       <h6 class="m-0 font-weight-bold ">Akadmik / Kelas / Edit Data</h6>
    </div>
    <br>
    <div class="container">
     <form action="?page=update_user" method="POST">
      <div id="User" class="form-text text-primary"><b>Data User</b></div><br>
      <div class="mb-3 row">
       <label for="id_user" class=" col-sm-2 form-label">ID User</label>
       <input type="text" name="id_user" class="col-sm-4 form-control" id="id_user" readonly  value="<?php echo $edit['id_user']; ?>" aria-describedby="id_user">
    </div>
    <div class="mb-3 row">
       <label for="nama" class=" col-sm-2 form-label">Nama</label>
       <input type="text" name="nama_user" class="col-sm-4 form-control" id="nama_user"  value="<?php echo $edit['nama_user']; ?>" aria-describedby="nama_user">
    </div>
   <div class="mb-3 row">
       <label for="nama" class=" col-sm-2 form-label">Jabatan</label>
       <input type="text" name="jabatan_user" class="col-sm-4 form-control" id="jabatan_user"  value="<?php echo $edit['jabatan_user']; ?>" aria-describedby="jabatan_user">
    </div>
    <div class="mb-3 row">
       <label for="username" class=" col-sm-2 form-label">Username</label>
       <input type="text" name="username" class="col-sm-4 form-control" id="username"  value="<?php echo $edit['username']; ?>" aria-describedby="username">
    </div>
    <div class="mb-3 row">
       <label for="password" class=" col-sm-2 form-label">Password</label>
       <input type="text" name="password" class="col-sm-4 form-control" id="password"  value="<?php echo $edit['password']; ?>" aria-describedby="password">
    </div>
    <div class="mb-3 row">
       <label for="hak_akses" class=" col-sm-2 form-label">Hak Akses</label>
       <input type="text" name="hak_akses" class="col-sm-4 form-control" value="admin" value="<?php echo $edit['hak_akses']; ?>"  readonly id="hak_akses" aria-describedby="hak_akses">
    </div>
   
    <button type="submit" class="btn btn-primary">Submit</button>
 </form>
</div>
<br>
</div>
<?php } ?>
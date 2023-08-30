 <h3>Data User</h3>
 <!-- DataTales Example -->
 <div class="card shadow mb-4">
     <div class="card-header py-3">
         <h6 class="m-0 font-weight-bold text-primary">Akadmik / User / List Data</h6>
     </div>
     <div class="card-body">
         <div class="table-responsive">
             <a href="?page=tambah_user">
                 <button class="btn btn-primary">
                     <li class="fa fa-plus"></li> Tambah Data
                 </button>
             </a>
             <br><br>
             <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                 <thead>
                     <tr>
                         <th>No</th>
                         <th>Id User</th>
                         <th>Nama</th>
                         <th>Jabatan</th>
                         <th>Username</th>
                         <th>Password</th>
                         <th>Hak Akses</th>
                         <th>Action</th>
                     </tr>
                 </thead>
                 <?php
                    require '../koneksi.php';
                    $no = 1;
                    $query = mysqli_query($koneksi, "SELECT * FROM users");
                    while ($tampil = mysqli_fetch_array($query)) {
                    ?>
                     <tr>
                         <td><?php echo $no++; ?></td>
                         <td><?php echo $tampil['id_user']; ?></td>
                         <td><?php echo $tampil['nama_user']; ?></td>
                         <td><?php echo $tampil['jabatan_user']; ?></td>
                         <td><?php echo $tampil['username']; ?></td>
                         <td><?php echo $tampil['password']; ?></td>
                         <td><?php echo $tampil['hak_akses']; ?></td>
                         <td align="center">
                             <a href="?page=edit_user&id_user=<?php echo $tampil['id_user']; ?>" class="link">
                                 <li class="fa fa-edit text-primary mr-3"></li>
                             </a>
                             <a href="?page=hapus_user&id_user=<?php echo $tampil['id_user']; ?>" class="link" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')">
                                 <li class="fa fa-trash text-danger"></li>
                             </a>
                         </td>
                     <?php } ?>
                     </tr>
                     </tbody>
             </table>
         </div>
     </div>
 </div>
 <h3>Data Mapel</h3>
 <!-- DataTales Example -->
 <div class="card shadow mb-4">
     <div class="card-header py-3">
         <h6 class="m-0 font-weight-bold text-primary">Akadmik / Mapel / List Data</h6>
     </div>
     <div class="card-body">
         <div class="table-responsive">
             <a href="?page=tambah_mapel">
                 <button class="btn btn-primary">
                     <li class="fa fa-plus"></li> Tambah Data
                 </button>
             </a>
             <br><br>
             <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                 <thead>
                     <tr>
                         <th>No</th>
                         <th>Id Mapel</th>
                         <th>Nama</th>
                         <th>Kurikulum</th>
                         <th>KKM</th>
                         <th>Action</th>
                     </tr>
                 </thead>

                 <tbody>
                     <?php
                        require '../koneksi.php';
                        $no = 1;
                        $query = mysqli_query($koneksi, "SELECT * FROM mapel");
                        while ($tampil = mysqli_fetch_array($query)) {
                        ?>
                         <tr>
                             <td><?php echo $no++; ?></td>
                             <td><?php echo $tampil['id_mapel']; ?></td>
                             <td><?php echo $tampil['nama']; ?></td>
                             <td><?php echo $tampil['kurikulum']; ?></td>
                             <td><?php echo $tampil['kkm']; ?></td>
                             <td align="center">
                                 <a href="?page=edit_mapel&id_mapel=<?php echo $tampil['id_mapel']; ?>" class="link">
                                     <li class="fa fa-edit text-primary mr-3"></li>
                                 </a>
                                 <a href="?page=hapus_mapel&id_mapel=<?php echo $tampil['id_mapel']; ?>" class="link" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')">
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
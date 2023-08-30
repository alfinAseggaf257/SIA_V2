 <h3>Data Guru</h3>
 <!-- DataTales Example -->
 <div class="card shadow mb-4">
     <div class="card-header py-3">
         <h6 class="m-0 font-weight-bold text-primary">Akadmik / Guru / List Data</h6>
     </div>
     <div class="card-body">
         <div class="table-responsive">
             <a href="?page=tambah_guru">
                 <button class="btn btn-primary">
                     <li class="fa fa-plus"></li> Tambah Data
                 </button>
             </a>
             <br><br>
             <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                 <thead>
                     <tr>
                         <th>No</th>
                         <th>NIP</th>
                         <th>Nama</th>
                         <th>Alamat</th>
                         <th>Jenis Kelamin</th>
                         <th>Jabatan</th>
                         <th>Nomor Telepon</th>
                         <th class="text-center">Action</th>
                     </tr>
                 </thead>
                 <tbody>
                     <?php
                        require '../koneksi.php';
                        $no = 1;
                        $query = mysqli_query($koneksi, "SELECT * FROM guru ") or die(mysqli_error($koneksi));
                        while ($tampil = mysqli_fetch_array($query)) {
                        ?>
                         <tr>
                             <td><?php echo $no++; ?></td>
                             <td><?php echo $tampil['nip']; ?></td>
                             <td><?php echo $tampil['nama']; ?></td>
                             <td><?php echo $tampil['alamat']; ?></td>
                             <td><?php echo $tampil['jenis_kelamin']; ?></td>
                             <td><?php echo $tampil['jabatan']; ?></td>
                             <td><?php echo $tampil['telp']; ?></td>
                             <td align="center">
                                 <a href="?page=edit_guru&id_guru=<?php echo $tampil['id_guru']; ?>" class="link">
                                     <li class="fa fa-edit text-primary mr-3"></li>
                                 </a>
                                 <a href="?page=hapus_guru&id_guru=<?php echo $tampil['id_guru']; ?>" class="link" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')">
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
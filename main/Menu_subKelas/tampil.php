 <h3>Data Kelas</h3>
 <!-- DataTales Example -->
 <div class="card shadow mb-4">
     <div class="card-header py-3">
         <h6 class="m-0 font-weight-bold text-primary">Akadmik / Sub Kelas / List Data</h6>
     </div>
     <div class="card-body">
         <div class="table-responsive">
             <?php if ($_SESSION['hak_akses'] == "admin") { ?>
                 <a href="?page=tambah_subKelas">
                     <button class="btn btn-primary">
                         <li class="fa fa-plus"></li> Tambah Data
                     </button>
                 </a>
             <?php } ?>
             <br><br>
             <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                 <thead>
                     <tr>
                         <th>No</th>
                         <th>Nama Siswa</th>
                         <th>Kelas</th>
                         <th>Wali Kelas</th>
                         <?php if ($_SESSION['hak_akses'] == "admin") { ?>
                             <th>Action</th>
                         <?php } ?>
                     </tr>
                 </thead>

                 <tbody>
                     <?php
                        require '../koneksi.php';
                        $no = 1;
                        $query = mysqli_query($koneksi, "SELECT subkelas.id_subKelas, siswa.nama as nama_siswa, kelas.nama_kelas, guru.nama as nama_guru FROM subkelas 
                        INNER JOIN siswa ON subkelas.id_siswa = siswa.id_siswa  
                        INNER JOIN kelas ON subkelas.id_kelas = kelas.id_kelas  
                        INNER JOIN guru ON kelas.id_guru = guru.id_guru  
                        ORDER BY nama_kelas ASC ") or die(mysqli_error($koneksi));
                        while ($tampil = mysqli_fetch_array($query)) {
                        ?>
                         <tr>
                             <td><?php echo $no++; ?></td>
                             <td><?php echo $tampil['nama_siswa']; ?></td>
                             <td><?php echo $tampil['nama_kelas']; ?></td>
                             <td><?php echo $tampil['nama_guru']; ?></td>
                             <?php if ($_SESSION['hak_akses'] == "admin") { ?>
                                 <td align="center">
                                     <a href="?page=edit_subKelas&id_subKelas=<?php echo $tampil['id_subKelas']; ?>" class="link">
                                         <li class="fa fa-edit text-primary mr-3"></li>
                                     </a>
                                     <a href="?page=hapus_subKelas&id_subKelas=<?php echo $tampil['id_subKelas']; ?>" class="link" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')">
                                         <li class="fa fa-trash text-danger"></li>
                                     </a>
                                 </td>

                             <?php } ?>
                         <?php } ?>
                         </tr>
                 </tbody>
             </table>
         </div>
     </div>
 </div>
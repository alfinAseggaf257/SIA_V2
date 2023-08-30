 <h3>Data Siswa</h3>
 <!-- DataTales Example -->
 <div class="card shadow mb-4">
     <div class="card-header py-3">
         <h6 class="m-0 font-weight-bold text-primary">Akadmik / Laporan / Nilai / Daftar Siswa / List Data</h6>
     </div>
     <div class="card-body">
         <h4>Daftar Siswa Perkelas </h4>
         <div class="table-responsive">
             <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                 <thead>
                     <tr>
                         <th>No</th>
                         <th>NIS</th>
                         <th>Nama</th>
                         <th>Kelas</th>
                         <th>File PDF</th>

                     </tr>
                 </thead>

                 <tbody>
                     <?php
                        require '../koneksi.php';
                        $no = 1;
                        $query = mysqli_query($koneksi, "SELECT subkelas.id_subKelas, siswa.nama as nama_siswa,siswa.nis, siswa.id_siswa, subkelas.id_kelas, kelas.nama_kelas, guru.nama as nama_guru FROM subkelas 
                        INNER JOIN siswa ON subkelas.id_siswa = siswa.id_siswa  
                        INNER JOIN kelas ON subkelas.id_kelas = kelas.id_kelas  
                        INNER JOIN guru ON kelas.id_guru = guru.id_guru  
                        ORDER BY nama_kelas, nis, nama_siswa ASC ") or die(mysqli_error($koneksi));
                        while ($tampil = mysqli_fetch_array($query)) {
                        ?>
                         <tr>
                             <td><?php echo $no++; ?></td>
                             <td><?php echo $tampil['nis']; ?></td>
                             <td><?php echo $tampil['nama_siswa']; ?></td>
                             <td><?php echo $tampil['nama_kelas']; ?></td>
                             <td><a href="Menu_laporan/fpdf/laporan_nilai.php?id_siswa=<?php echo $tampil['id_siswa']; ?>" class="link" target="_blank"><button class=" btn btn-danger">
                                         <li class="fas fa-book"> </li> Download File
                                     </button>
                                 </a></td>
                         <?php } ?>
                         </tr>
                 </tbody>
             </table>
         </div>
     </div>
 </div>
 <h3>Nilai Kelas</h3>
 <!-- DataTales Example -->
 <div class="card shadow mb-4">
     <div class="card-header py-3">
         <h6 class="m-0 font-weight-bold text-primary">Akadmik / Laporan / Nilai Siswa / List Data</h6>
     </div>
     <div class="card-body">
         <h4>Pilih Nilai Siswa</h4>
         <br>
         <div class="table-responsive">
             <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                 <thead>
                     <tr>
                         <th>No</th>
                         <th>NIS</th>
                         <th>Nama Siswa</th>
                         <th>Kelas</th>
                         <th>File PDF</th>
                     </tr>
                 </thead>
                 <tfoot>
                     <tr>
                         <th>No</th>
                         <th>NIS</th>
                         <th>Nama Siswa</th>
                         <th>Kelas</th>
                         <th>File PDF</th>
                     </tr>
                 </tfoot>
                 <tbody>
                     <?php
                        require '../koneksi.php';
                        $no = 1;
                        $query = mysqli_query($koneksi, "SELECT * FROM siswa 
                        INNER JOIN nilai ON siswa.nis=nilai.nis 
                        INNER JOIN kelas ON nilai.id_kelas=kelas.id_kelas
                        ORDER BY nama_kelas ASC") or die(mysqli_error($koneksi));
                        while ($tampil = mysqli_fetch_array($query)) {
                        ?>
                         <tr>
                             <td><?php echo $no++; ?></td>
                             <td><?php echo $tampil['nis']; ?></td>
                             <td><?php echo $tampil['nama']; ?></td>
                             <td><?php echo $tampil['nama_kelas']; ?></td>
                             <td><a href="Menu_laporan/fpdf/laporan_nilai.php?nis=<?php echo $tampil['nis']; ?>&nama_kelas=<?php echo $tampil['nama_kelas']; ?>&id_kelas=<?php echo $tampil['id_kelas']; ?> " class="link" target="_blank"><button class=" btn btn-danger"> Download File </button></a></td>
                         <?php } ?>
                         </tr>
                 </tbody>
             </table>
         </div>
     </div>
 </div>
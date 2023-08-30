 <h3>Jadwal Kelas</h3>
 <!-- DataTales Example -->
 <div class="card shadow mb-4">
     <div class="card-header py-3">
         <h6 class="m-0 font-weight-bold text-primary">Akadmik / Laporan / Jadwal Kelas / List Data</h6>
     </div>
     <div class="card-body">
         <h4>Pilih Jadwal Kelas</h4>
         <br>
         <div class="table-responsive">
             <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                 <thead>
                     <tr>
                         <th>No</th>
                         <th>Nama Kelas</th>
                         <th>File PDF</th>
                     </tr>
                 </thead>

                 <tbody>
                     <?php
                        require '../koneksi.php';
                        $no = 1;
                        $query = mysqli_query($koneksi, "SELECT * FROM kelas ORDER BY nama_kelas ASC") or die(mysqli_error($koneksi));
                        while ($tampil = mysqli_fetch_array($query)) {
                        ?>
                         <tr>
                             <td><?php echo $no++; ?></td>
                             <td><?php echo $tampil['nama_kelas']; ?></td>
                             <td><a href="Menu_laporan/fpdf/laporan_jadwal.php?id_kelas=<?php echo $tampil['id_kelas']; ?>" class="link" target="_blank"><button class=" btn btn-danger"> Download File</button></a></td>
                         <?php } ?>
                         </tr>
                 </tbody>
             </table>
         </div>
     </div>
 </div>
 <h3>Data Jadwal</h3>
 <!-- DataTales Example -->
 <div class="card mt-4 mb-4">
     <div class="card-header bg-primary text-white">
         Filter Kelas
     </div>
     <div class="card-body">
         <form class="form-inline" method="post" action="">
             <div class="form-group mb-2">
                 <label for="staticEmail2" class="mr-2">Pilih Kelas</label>
                 <select class="form-control" id="id_kelas" name="id_kelas" aria-label="Default select example">
                     <option value="">--- Pilih Kelas ---</option>
                     <?php
                        require '../koneksi.php';
                        $querycari = mysqli_query($koneksi, "SELECT * FROM kelas ORDER BY nama_kelas ASC
											") or die(mysqli_error($koneksi));
                        while ($rows = mysqli_fetch_array($querycari)) :
                        ?>
                         <option value="<?php echo $rows["id_kelas"]; ?>"><?php echo $rows["nama_kelas"]; ?></option>
                     <?php endwhile;    ?>
                 </select>
             </div>
             <button type="submit" class="btn btn-warning mb-2 mr-3 ml-auto"><i class="fas fa-eye"></i> Tampilkan Kelas</button>
             <?php
                if ((isset($_POST['id_kelas']) && $_POST['id_kelas'] != '')) {
                    $id_kelas = $_POST['id_kelas'];
                    $querycar = 'WHERE jadwal.id_kelas=' . $id_kelas;
                } else {
                    $querycar = 'ORDER BY hari,jam ASC';
                }
                ?>
         </form>
     </div>
 </div>
 <div class="card shadow mb-4">
     <div class="card-header py-3">
         <h6 class="m-0 font-weight-bold text-primary">Akadmik / Jadwal / List Data</h6>
     </div>

     <div class="card-body">
         <div class="table-responsive">
             <?php if ($_SESSION['hak_akses'] == "admin") { ?>
                 <a href="?page=tambah_jadwal">
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
                         <th>Hari</th>
                         <th>Jam</th>
                         <th>Kelas</th>
                         <th>Mapel</th>
                         <th>Pengajar</th>
                         <?php if ($_SESSION['hak_akses'] == "admin") { ?>
                             <th>Action</th>
                         <?php } ?>
                     </tr>
                 </thead>

                 <tbody>
                     <?php
                        require '../koneksi.php';
                        $no = 1;
                        $query = mysqli_query($koneksi, "SELECT id_jadwal, hari, jam, kelas.nama_kelas, mapel.nama AS nama_mapel,guru.nama FROM jadwal
                      INNER JOIN kelas ON jadwal.id_kelas = kelas.id_kelas
                      INNER JOIN mapel ON jadwal.id_mapel = mapel.id_mapel
                      INNER JOIN guru ON jadwal.id_guru = guru.id_guru
                      $querycar

                      ") or die(mysqli_error($koneksi));
                        while ($tampil = mysqli_fetch_array($query)) {
                        ?>
                         <tr>
                             <td><?php echo $no++; ?></td>
                             <td><?php
                                    if ($tampil['hari'] == 0) {
                                        $hari = "Senin";
                                        echo $hari;
                                    } else if ($tampil['hari'] == 1) {
                                        $hari = "Selasa";
                                        echo $hari;
                                    } else if ($tampil['hari'] == 2) {
                                        $hari = "Rabu";
                                        echo $hari;
                                    } else if ($tampil['hari'] == 3) {
                                        $hari = "Kamis";
                                        echo $hari;
                                    } else if ($tampil['hari'] == 4) {
                                        $hari = "Jumat";
                                        echo $hari;
                                    } else if ($tampil['hari'] == 5) {
                                        $hari = "Sabtu";
                                        echo $hari;
                                    }

                                    ?></td>
                             <td><?php echo $tampil['jam']; ?></td>
                             <td><?php echo $tampil['nama_kelas']; ?></td>
                             <td><?php echo $tampil['nama_mapel']; ?></td>
                             <td><?php echo $tampil['nama']; ?></td>
                             <?php if ($_SESSION['hak_akses'] == "admin") { ?>
                                 <td align="center">
                                     <a href="?page=edit_jadwal&id_jadwal=<?php echo $tampil['id_jadwal']; ?>" class="link">
                                         <li class="fa fa-edit text-primary mr-3"></li>
                                     </a>
                                     <a href="?page=hapus_jadwal&id_jadwal=<?php echo $tampil['id_jadwal']; ?>" class="link" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')">
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
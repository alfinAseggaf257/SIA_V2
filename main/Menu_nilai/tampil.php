 <h3>Data Nilai</h3>
 <!-- DataTales Example -->
 <div class="card shadow mb-4">
     <div class="card-header py-3">
         <h6 class="m-0 font-weight-bold text-primary">Akadmik / Nilai / List Data</h6>
     </div>
     <div class="card-body">
         <div class="table-responsive">
             <?php if ($_SESSION['hak_akses'] == "admin" || $_SESSION['hak_akses'] == "guru") : ?>
                 <a href="?page=tambah_nilai">
                     <button class="btn btn-primary">
                         <li class="fa fa-plus"></li> Tambah Data
                     </button>
                 </a>

             <?php endif ?>
             <br><br>
             <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                 <thead>
                     <tr style="vertical-align: middle; text-align: center;">
                         <th rowspan="2" class="text-center">No</th>
                         <?php if ($_SESSION['hak_akses'] == "admin" || $_SESSION['hak_akses'] == "guru") : ?>
                             <th rowspan="2">Nama Siswa</th>
                             <th rowspan="2">Kelas</th>
                             <th rowspan="2">Semester</th>
                         <?php endif ?>
                         <th rowspan="2">Mapel</th>
                         <th rowspan="2">Pengajar</th>
                         <th colspan="7" style="text-align: center;">Nilai</th>

                         <th rowspan="2">Rata-rata Nilai</th>
                         <th rowspan="2">KKM</th>
                         <th rowspan="2">Predikat</th>
                         <?php if ($_SESSION['hak_akses'] == "admin" || $_SESSION['hak_akses'] == "guru") : ?>
                             <th rowspan="2">Aksi</th>
                         <?php endif ?>

                     </tr>
                     <tr>
                         <th>T1</th>
                         <th>T2</th>
                         <th>T3</th>
                         <th>T4</th>
                         <th>T5</th>
                         <th>UTS</th>
                         <th>UAS</th>

                     </tr>
                 </thead>
                 <tbody>
                     <?php
                        require '../koneksi.php';
                        $no = 1;
                        $nilai_siswa = $_SESSION['nama'];
                        if ($_SESSION['hak_akses'] == "admin") {
                            $cek = "";
                        }
                        if ($_SESSION['hak_akses'] == "siswa") {
                            $cek = "WHERE siswa.nama='$nilai_siswa'";
                            $plus = " ";
                        }
                        $penilai = $_SESSION['nama'];
                        if ($_SESSION['hak_akses'] == "guru") {
                            $cek = "WHERE guru.nama='$penilai'";
                            $plus = " ";
                        }
                        $query = mysqli_query($koneksi, "SELECT nilai.id_nilai, siswa.nama AS nama_siswa, kelas.nama_kelas, semester_thnAjaran, mapel.nama AS nama_mapel, guru.nama AS nama_guru, mapel.kkm, nilai.tgs1, nilai.tgs2, nilai.tgs3, nilai.tgs4, nilai.tgs5, nilai.uts, nilai.uas, nilai.hasil FROM nilai
                      INNER JOIN subkelas ON nilai.id_subKelas = subkelas.id_subKelas
                      INNER JOIN siswa ON subkelas.id_siswa = siswa.id_siswa
                      INNER JOIN kelas ON subkelas.id_kelas = kelas.id_kelas
                      INNER JOIN guru ON nilai.id_guru = guru.id_guru
                      INNER JOIN mapel ON nilai.id_mapel = mapel.id_mapel
                      $cek;
                      ") or die(mysqli_error($koneksi));
                        while ($tampil = mysqli_fetch_array($query)) :
                        ?>

                         <tr>
                             <td class=" text-center"><?= $no++; ?></td>
                             <?php if ($_SESSION['hak_akses'] == "admin" || $_SESSION['hak_akses'] == "guru") : ?>
                                 <td><?= $tampil['nama_siswa']; ?></td>
                                 <td><?= $tampil['nama_kelas']; ?></td>
                                 <td><?= $tampil['semester_thnAjaran']; ?></td>
                             <?php endif ?>
                             <td><?= $tampil['nama_mapel']; ?></td>
                             <td><?= $tampil['nama_guru']; ?></td>
                             <td><?= $tampil['tgs1']; ?></td>
                             <td><?= $tampil['tgs2']; ?></td>
                             <td><?= $tampil['tgs3']; ?></td>
                             <td><?= $tampil['tgs4']; ?></td>
                             <td><?= $tampil['tgs5']; ?></td>
                             <td><?= $tampil['uts']; ?></td>
                             <td><?= $tampil['uas']; ?></td>
                             <td><?= round($tampil['hasil'], 2); ?></td>
                             <td><?= $tampil['kkm']; ?></td>
                             <?php
                                $nilai = round($tampil['hasil'], 2);

                                if ($nilai < $tampil['kkm']) {
                                    $keterangan = "Remidial";
                                } elseif ($nilai >= $tampil['kkm']) {
                                    $keterangan = "Lulus";
                                }
                                ?>
                             <td <?php if ($keterangan == "Remidial") : ?> class="text-danger" ; <?php endif ?>><?= $keterangan; ?></td>
                             <?php if ($_SESSION['hak_akses'] == "admin" || $_SESSION['hak_akses'] == "guru") : ?>
                                 <td width="50">
                                     <a href=" ?page=edit_nilai&id_nilai=<?php echo $tampil['id_nilai']; ?>" class="link">
                                         <li class="fa fa-edit text-primary mr-3"></li>
                                     </a>
                                     <a href="?page=hapus_nilai&id_nilai=<?php echo $tampil['id_nilai']; ?>" class="link" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')">
                                         <li class="fa fa-trash text-danger"></li>
                                     </a>
                                 </td>
                             <?php endif ?>
                         </tr>

                     <?php endwhile; ?>
                 </tbody>
             </table>
             <?php
                if ($_SESSION['hak_akses'] == "siswa") { ?>
                 <a href="Menu_laporan/fpdf/laporan_nilai.php?id_siswa=<?php echo $_SESSION['id_siswa']; ?>" target="_blank"><button class=" btn btn-danger">Report PDF</button></a>
             <?php } ?>
         </div>
     </div>
 </div>
<?php
include 'session.php'
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SIAKAD SD Negeri Madusari 1</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">


</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                <div class="sidebar-brand-icon ">
                    <i class="fas fa-user-graduate"></i>
                </div>
                <div class="sidebar-brand-text mx-3">SIAKAD </div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>
            <?php if ($_SESSION['hak_akses'] == "admin") : ?>
                <li class="nav-item">
                    <a class="nav-link" href="?page=tampil_guru">
                        <i class="fas fa-user"></i>
                        <span>Guru</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="?page=tampil_siswa">
                        <i class="fas fa-graduation-cap"></i>
                        <span>Siswa</span></a>
                </li>

            <?php endif ?>
            <?php if ($_SESSION['hak_akses'] == "admin" || $_SESSION['hak_akses'] == "guru") : ?>

                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#kelas" aria-expanded="true" aria-controls="kelas">
                        <i class="fas fa-chalkboard"></i>
                        <span>Kelas</span></a>
                    </a>
                    <div id="kelas" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <a class="collapse-item" href="?page=tampil_kelas">Data Kelas</a>
                            <a class="collapse-item" href="?page=tampil_subKelas">Data Siswa</a>
                        </div>
                    </div>
                </li>

            <?php endif ?>
            <li class="nav-item">
                <a class="nav-link" href="?page=tampil_jadwal">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Jadwal</span></a>
            </li>
            <?php if ($_SESSION['hak_akses'] == "admin") : ?>

                <li class="nav-item">
                    <a class="nav-link" href="?page=tampil_mapel">
                        <i class="fas fa-book-open"></i>
                        <span>Mapel</span></a>
                </li>
            <?php endif ?>
            <li class="nav-item">
                <a class="nav-link" href="?page=tampil_nilai">
                    <i class="fas fa-clipboard-list"></i>
                    <span>Nilai</span></a>
            </li>
            <?php if ($_SESSION['hak_akses'] == "admin") : ?>
                <li class="nav-item">
                    <a class="nav-link" href="?page=tampil_user">
                        <i class="fas fa-user-plus"></i>
                        <span>Users</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="?page=tampil_laporan">
                        <i class="fas fa-book"></i>
                        <span>Laporan</span></a>
                </li>
            <?php endif ?>
            <li class="nav-item">
                <a class="nav-link" href="#" data-toggle="modal" data-target="#logoutModal">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    <span>LogOut</span>
                </a>
            </li>


        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <h5 style="margin-top:1%;">Sistem Informasi Akademik</h5>
                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                                    Selamat Datang,
                                </span><span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $_SESSION['nama']; ?></span>

                            </a>

                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <?php
                    if (isset($_GET['page'])  > 0) {
                        $hal = str_replace(".", "/", $_GET['page']) . ".php";
                    } else {
                        $hal = "dasboard.php";
                    }
                    if (file_exists($hal)) {
                        include($hal);
                    }
                    ?>
                    <?php
                    if (isset($_GET['page'])) {
                        $page = $_GET['page'];
                        switch ($page) {

                            case 'tampil_siswa':
                                include "Menu_Siswa/tampil.php";
                                break;
                            case 'tambah_siswa':
                                include "Menu_Siswa/tambah.php";
                                break;
                            case 'simpan_siswa':
                                include "Menu_Siswa/simpan.php";
                                break;
                            case 'edit_siswa':
                                include "Menu_Siswa/edit.php";
                                break;
                            case 'update_siswa':
                                include "Menu_Siswa/update.php";
                                break;
                            case 'hapus_siswa':
                                include "Menu_Siswa/hapus.php";
                                break;

                            case 'tampil_guru':
                                include "Menu_Guru/tampil.php";
                                break;
                            case 'tambah_guru':
                                include "Menu_Guru/tambah.php";
                                break;
                            case 'simpan_guru':
                                include "Menu_Guru/simpan.php";
                                break;
                            case 'edit_guru':
                                include "Menu_Guru/edit.php";
                                break;
                            case 'update_guru':
                                include "Menu_Guru/update.php";
                                break;
                            case 'hapus_guru':
                                include "Menu_Guru/hapus.php";
                                break;

                            case 'tampil_subKelas':
                                include "Menu_subKelas/tampil.php";
                                break;
                            case 'tambah_subKelas':
                                include "Menu_subKelas/tambah.php";
                                break;
                            case 'simpan_subKelas':
                                include "Menu_subKelas/simpan.php";
                                break;
                            case 'edit_subKelas':
                                include "Menu_subKelas/edit.php";
                                break;
                            case 'update_subKelas':
                                include "Menu_subKelas/update.php";
                                break;
                            case 'hapus_subKelas':
                                include "Menu_subKelas/hapus.php";
                                break;

                            case 'tampil_kelas':
                                include "Menu_kelas/tampil.php";
                                break;
                            case 'tambah_kelas':
                                include "Menu_kelas/tambah.php";
                                break;
                            case 'simpan_kelas':
                                include "Menu_kelas/simpan.php";
                                break;
                            case 'edit_kelas':
                                include "Menu_kelas/edit.php";
                                break;
                            case 'update_kelas':
                                include "Menu_kelas/update.php";
                                break;
                            case 'hapus_kelas':
                                include "Menu_kelas/hapus.php";
                                break;

                            case 'tampil_jadwal':
                                include "Menu_jadwal/tampil.php";
                                break;
                            case 'tambah_jadwal':
                                include "Menu_jadwal/tambah.php";
                                break;
                            case 'simpan_jadwal':
                                include "Menu_jadwal/simpan.php";
                                break;
                            case 'edit_jadwal':
                                include "Menu_jadwal/edit.php";
                                break;
                            case 'update_jadwal':
                                include "Menu_jadwal/update.php";
                                break;
                            case 'hapus_jadwal':
                                include "Menu_jadwal/hapus.php";
                                break;

                            case 'tampil_mapel':
                                include "Menu_mapel/tampil.php";
                                break;
                            case 'tambah_mapel':
                                include "Menu_mapel/tambah.php";
                                break;
                            case 'simpan_mapel':
                                include "Menu_mapel/simpan.php";
                                break;
                            case 'edit_mapel':
                                include "Menu_mapel/edit.php";
                                break;
                            case 'update_mapel':
                                include "Menu_mapel/update.php";
                                break;
                            case 'hapus_mapel':
                                include "Menu_mapel/hapus.php";
                                break;


                            case 'tampil_nilai':
                                include "Menu_nilai/tampil.php";
                                break;
                            case 'tambah_nilai':
                                include "Menu_nilai/tambah.php";
                                break;
                            case 'simpan_nilai':
                                include "Menu_nilai/simpan.php";
                                break;
                            case 'edit_nilai':
                                include "Menu_nilai/edit.php";
                                break;
                            case 'update_nilai':
                                include "Menu_nilai/update.php";
                                break;
                            case 'hapus_nilai':
                                include "Menu_nilai/hapus.php";
                                break;


                            case 'tampil_user':
                                include "Menu_user/tampil.php";
                                break;
                            case 'tambah_user':
                                include "Menu_user/tambah.php";
                                break;
                            case 'simpan_user':
                                include "Menu_user/simpan.php";
                                break;
                            case 'edit_user':
                                include "Menu_user/edit.php";
                                break;
                            case 'update_user':
                                include "Menu_user/update.php";
                                break;
                            case 'hapus_user':
                                include "Menu_user/hapus.php";
                                break;

                            case 'tampil_laporan':
                                include "Menu_laporan/tampil.php";
                                break;
                            case 'jadwal_kelas':
                                include "Menu_laporan/jadwalKelas.php";
                                break;
                            case 'nilai_kelas':
                                include "Menu_laporan/nilaiKelas.php";
                                break;
                            case 'nilai':
                                include "Menu_laporan/nilai.php";
                                break;
                            case 'laporan_nilaiPerkelas':
                                include "Menu_laporan/laporan_nilaiPerkelas.php";
                                break;
                        }
                    }
                    ?>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; SD Negeri Madusari 1, 2022</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Yakin akan logout?</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>
    <script>
        var el = document.getElementById("wrapper");
        var toggleButton = document.getElementById("menu-toggle");

        toggleButton.onclick = function() {
            el.classList.toggle("toggled");
        };
        jQuery(function($) {
            var path = window.location.href;
            $('div.list-group a').each(function() {
                if (this.href === path) {
                    $(this).addClass('active');

                }
            });
        });
        $(document).ready(function() {
            var table = $('#data-table').DataTable({
                select: true,
                search: {
                    caseInsensitive: false,
                    regex: true
                }
            });
            $('#namaKelas').on('change', function() {
                var val = $.fn.dataTable.util.escapeRegex($(this).val());
                table.search(val + " ", true, false).draw();
            });
        });
        $('#hapus').on('show.bs.modal', function(e) {
            $(this).find('.btn-yes').prop('href', $(e.relatedTarget).data('href'));
        });
    </script>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>
    <script type="text/javascript"></script>

</body>

</html>
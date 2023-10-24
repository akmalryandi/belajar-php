<?php
session_start();

if (!isset($_SESSION['username'])) {
    header('Location: ../login.php');
    exit();
}

include("../db/connect.php");


// Pagination
$dataHalaman = 3;
$data = mysqli_num_rows(mysqli_query($con, "SELECT * FROM vendors"));
$halaman = ceil($data / $dataHalaman);
$aktifHalaman = (isset($_GET['page'])) ? $_GET['page'] : 1;
$awalData = ($dataHalaman * $aktifHalaman) - $dataHalaman;


$sql = "SELECT * 
        FROM vendors
        ORDER BY id ASC
        LIMIT $awalData, $dataHalaman";
$read = mysqli_query($con, $sql);


// FITUR SEARCH
if (isset($_POST['cari'])) {
    $cari = $_POST['nyari'];

    $sql = "SELECT *
            FROM vendors
            where 
            code like '%$cari%' or
            name like '%$cari%' or
            phone_number like '%$cari%' or
            email like '%$cari%' or
            address like '%$cari%'
            ORDER BY p.id ASC
            LIMIT $awalData, $dataHalaman";
    $read = mysqli_query($con, $sql);
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>vendor</title>

    <!-- My CSS -->
    <link rel="stylesheet" href="../assets/css/produk.css" />
    <!-- Icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback" />
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css" />
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="../plugins/overlayScrollbars/css/OverlayScrollbars.min.css" />
    <!-- Theme style -->
    <link rel="stylesheet" href="../dist/css/adminlte.min.css" />
</head>

<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div class="wrapper">
        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__wobble" src="../dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60"
                width="60" />
        </div>

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-dark">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="../pos-shop/produk.php" class="nav-link">Product</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="../pos-shop/customers.php" class="nav-link">Customer</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="../pos-shop/vendor.php" class="nav-link active">vendors</a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Navbar Search -->
                <li class="nav-item">
                    <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                        <i class="fas fa-search"></i>
                    </a>
                    <div class="navbar-search-block">
                        <form class="form-inline">
                            <div class="input-group input-group-sm">
                                <input class="form-control form-control-navbar" type="search" placeholder="Search"
                                    aria-label="Search" />
                                <div class="input-group-append">
                                    <button class="btn btn-navbar" type="submit">
                                        <i class="fas fa-search"></i>
                                    </button>
                                    <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="../dashboard.php" class="brand-link">
                <img src="../assets/images/pp.jpeg" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
                    style="opacity: 0.8" />
                <span class="brand-text font-weight-light">Akmal Ryandi</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- SidebarSearch Form -->
                <div class="form-inline mt-2">
                    <div class="input-group" data-widget="sidebar-search">
                        <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                            aria-label="Search" />
                        <div class="input-group-append">
                            <button class="btn btn-sidebar">
                                <i class="fas fa-search fa-fw"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                        <li class="nav-item">
                            <a href="../product.php" class="nav-link">
                                <i class="nav-icon fas fa-th"></i>
                                <p>
                                    Galery
                                </p>
                            </a>
                        </li>
                        <li class="nav-header">EXAMPLES</li>
                        <li class="nav-item">
                            <a href="../pos-shop/produk.php" class="nav-link active">
                                <i class="bi bi-bag"></i>
                                <p>
                                    Pos Shop
                                    <span class="right badge badge-danger">New</span>
                                </p>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-6">
                            <h1 class="m-0">vendor</h1>
                        </div>
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <!-- ISI PRODUK -->
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <form action="produk.php" method="post">
                                    <div class="card-header">
                                        <a href="tambahproduk.php" type="button" class="btn btn-outline-light"><i
                                                class="bi bi-plus-lg"></i></a>
                                        <div class="card-tools">
                                            <div class="input-group input-group-sm" style="width: 150px;">
                                                <input type="text" name="nyari" class="form-control float-right"
                                                    placeholder="Search" autocomplete="off">

                                                <div class="input-group-append">
                                                    <button type="submit" name="cari" class="btn btn-default">
                                                        <i class="fas fa-search"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </form>
                                <!-- /.card-header -->
                                <div class="card-body table-responsive p-0">
                                    <table class="table table-hover text-nowrap">
                                        <thead>
                                            <tr class="text-center">
                                                <th scope="col">Kode</th>
                                                <th scope="col">Nama</th>
                                                <th scope="col">No HP</th>
                                                <th scope="col">Email</th>
                                                <th scope="col">Alamat</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            if (!$read) {
                                                echo "Gagal Tampil" . mysqli_error($con);
                                                die;
                                            } else {
                                                while ($data = mysqli_fetch_array($read)) {
                                                    echo '<tr class="text-center">';
                                                    echo '<td>' . $data['code'] . '</td>';
                                                    echo '<td>' . $data['name'] . '</td>';
                                                    echo '<td>' . $data['phone_number'] . '</td>';
                                                    echo '<td>' . $data['email'] . '</td>';
                                                    echo '<td>' . $data['address'] . '</td>';
                                                    echo '<td><a href="editproduk.php?updateid=' . $data['id'] . '">
                                <button class="btn btn-outline-light m-2"><i class="bi bi-pencil-square"></i></button></a>

                                <a href="deleteproduk.php?deleteid=' . $data['id'] . '">
                                <button class="btn btn-outline-danger" onclick="return confirm(\'Apakah Anda yakin ingin menghapus data ini?\')"><i class="bi bi-trash3-fill"></i></button></a></td>';
                                                    echo '</tr>';
                                                }
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                    
                                    <!-- Pagination -->
                                    <nav aria-label="Page navigation example">
                                        <ul class="p-2 pagination justify-content-end">
                                            <?php if ($aktifHalaman > 1): ?>
                                                <li class="page-item">
                                                    <a class="page-link" href="?page=<?= $aktifHalaman - 1 ?>"
                                                        aria-label="Previous">
                                                        <span aria-hidden="true">&laquo;</span>
                                                    </a>
                                                </li>
                                            <?php endif; ?>

                                            <?php for ($i = 1; $i <= $halaman; $i++): ?>
                                                <?php if ($i == $aktifHalaman): ?>
                                                    <li class="page-item active"><a class="page-link" href="?page=<?= $i; ?>">
                                                            <?= $i; ?>
                                                        </a></li>
                                                <?php else: ?>
                                                    <li class="page-item"><a class="page-link" href="?page=<?= $i; ?>">
                                                            <?= $i; ?>
                                                        </a></li>
                                                <?php endif; ?>
                                            <?php endfor; ?>

                                            <?php if ($aktifHalaman < $halaman): ?>
                                                <li class="page-item">
                                                    <a class="page-link" href="?page=<?= $aktifHalaman + 1 ?>"
                                                        aria-label="Next">
                                                        <span aria-hidden="true">&raquo;</span>
                                                    </a>
                                                </li>
                                            <?php endif; ?>

                                        </ul>
                                    </nav>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                    </div>
                    <!-- End -->
                </div>
                <!--/. container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->

        <!-- Main Footer -->
        <footer class="main-footer">
            <strong>Copyright &copy; 2023 <a href="https://adminlte.io">Akmal Ryandi</a>.</strong>
            All rights reserved.
        </footer>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->
    <!-- My JS -->
    <script src="../assets/js/productapi.js"></script>
    <!-- jQuery -->
    <script src="../plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="../plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../dist/js/adminlte.js"></script>

    <!-- PAGE PLUGINS -->
    <!-- jQuery Mapael -->
    <script src="../plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
    <script src="../plugins/raphael/raphael.min.js"></script>
    <script src="../plugins/jquery-mapael/jquery.mapael.min.js"></script>
    <script src="../plugins/jquery-mapael/maps/usa_states.min.js"></script>
    <!-- ChartJS -->
    <script src="../plugins/chart.js/Chart.min.js"></script>

    <!-- AdminLTE for demo purposes -->
    <!-- <script src="../dist/js/demo.js"></script> -->
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="../dist/js/pages/dashboard2.js"></script>
</body>

</html>
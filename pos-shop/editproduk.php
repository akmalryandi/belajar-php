<?php
session_start();

if (!isset($_SESSION['login'])) {
    header('Location: ../login.php');
    exit();
}

include("../db/connect.php");
require('crud-oop.php');
include("../tanggal-waktu/waktu.php");

$id = $_GET['updateid'];

//OBJECT
$editData = new Product($db);

//OOP Edit Data
$editData->updateProducts();

$sqll = "SELECT p.id, p.image, p.product_name, p.description, p.price, p.stock, p.product_code, c.category_name
        FROM products p
        JOIN product_categories c ON p.category_id = c.id
        WHERE p.id=$id";
$hasil = $db->query($sqll);
$baris = mysqli_fetch_assoc($hasil);

$sql_kategori = "SELECT * FROM product_categories";
$hasil_kategori = $db->query($sql_kategori);

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Product</title>

    <!-- My CSS -->
    <link rel="stylesheet" href="../assets/css/produk.css" />
    <!-- CSS Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
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
                <li class="nav-item mt-2">
                    <p class="text-center">
                        <?php echo $tanggal_waktu; ?>
                    </p>
                </li>
                <!-- <li class="nav-item d-none d-sm-inline-block">
                    <a href="../pos-shop/produk.php" class="nav-link active">Product</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="../pos-shop/customers.php" class="nav-link">Customers</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="../pos-shop/vendor.php" class="nav-link">Vendors</a>
                </li> -->
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
                            <h1 class="m-0">Edit Product</h1>
                        </div>
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container p-5">

                    <!-- ISI PRODUK -->
                    <form class="row g-3" method="post" enctype="multipart/form-data">
                        <div class="col-md-6 mb-3">
                            <label for="nama" class="form-label">Nama Produk</label>
                            <input type="text" required class="form-control" id="nama" name="nama"
                                value="<?php echo $baris['product_name']; ?>">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="harga" class="form-label">Harga</label>
                            <input type="number" required class="form-control" id="harga" name="harga"
                                value="<?php echo $baris['price']; ?>">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="stok" class="form-label">Stok</label>
                            <input type="number" required class="form-control" id="stok" name="stok"
                                value="<?php echo $baris['stock']; ?>">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="kode_produk" class="form-label">Kode Produk</label>
                            <input type="text" required class="form-control" id="kode_produk" name="kode_produk"
                                value="<?php echo $baris['product_code']; ?>">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="kategori" class="form-label">Kategori</label>
                            <select class="form-select" id="category_id" name="category_id" required>
                                <?php
                                while ($category = $hasil_kategori->fetch_assoc()) {
                                    $selected = ($category["updateid"] === $baris["category_id"]) ? "echo selected" : "";
                                    echo "<option value='" . $category["id"] . "' $selected>" . $category["category_name"] . "</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="deskripsi" class="form-label">Deskripsi</label>
                            <textarea class="form-control" required id="deskripsi" rows="3"
                                name="deskripsi"><?php echo $baris['description']; ?></textarea>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="gambar">Pilih gambar</label>
                            <input type="file" class="form-control" name="gambar[]" id="gambar" accept="image/*"
                                multiple>
                        </div>
                        <div class="col-12">
                            <button type="submit" name="submit" class="btn btn-dark">Edit</button>
                        </div>
                    </form>


                    <!-- /.row -->
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
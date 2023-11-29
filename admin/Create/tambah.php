<?php
$judul_browser = "Administrator - Aplikasi Travel Gatel";
include '../../bagian/koneksi.php';
$menu = "Perjalanan";
$submenu = "Armada";
$subzero = $_GET['subzero'];
include '../../bagian/saitel.php';
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo $judul_browser; ?></title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="../../dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="../../dist/css/sweetalert2.min.css">

    <link rel="stylesheet" href="../../dist/css/font-awesome.min.css">
    <link rel="stylesheet" href="../../dist/css/ionicons.min.css">
    <link rel="stylesheet" href="../../dist/css/_all-skins.min.css">
</head>

<body class="hold-transition skin-blue sidebar-mini">

    <?php
    if (isset($_SESSION['status'])) {
        if ($_SESSION['status'] != "login") {
    ?>
            <div class="row">
                <div class="col-md-offset-4 col-md-4">
                    <div class="panel panel-warning">
                        <div class="panel-heading">
                            Informasi
                        </div>
                        <div class="panel-body">
                            <p>Maaf, Anda tidak berhak mengakses halaman ini secara langsung. Silahkan login terlebih dahulu.</p>
                            <a class="btn btn-warning pull-right" role="button" href="../login.php">Login</a>
                        </div>
                    </div>
                </div>
            </div>

        <?php
        } else if ($_SESSION['status'] == "login") {
        ?>
            <div class="wrapper">
                <header class="main-header">
                    <a href="#" class="logo">
                        <span class="logo-lg"><img src="../../dist/img/logovertikal.png" width="175px" height="50px"></span>
                    </a>
                    <nav class="navbar navbar-static-top">
                        <div class="navbar-custom-menu">
                            <ul class="nav navbar-nav">
                                <li class="dropdown user user-menu">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                        <img src="../../dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
                                        <span class="hidden-xs"><?php echo ucwords($_SESSION['user']); ?></span>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li class="user-header">
                                            <img src="../../dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                                            <p><?php echo $_SESSION['user']; ?></p>
                                            <p><small>Admin</small></p>
                                        </li>
                                        <li class="user-footer">
                                            <div class="pull-right">
                                                <a href="logout.php" class="btn btn-default btn-flat">Keluar</a>
                                            </div>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </header>
                <?php include '../../bagian/sidebaradm.php'; ?>
                <div class="content-wrapper">
                    <section class="content-header">
                        <h1>Tambah Mode</h1>
                        <ol class="breadcrumb">
                            <li><a href="../index.php"><i class="fa fa-dashboard"></i> Beranda</a></li>
                            <li class="active">Tambah <?php if ($subzero == "Armada") {
                                echo 'Armada';
                            }?></li>
                        </ol>
                    </section>
                    <section class="content">
                        <div class="box">
                            <?php
                            if ($subzero == "Armada") {
                                include 'armada/insert.php';
                            } elseif ($subzero == "Jadwal") {
                                include 'jadwal/insert.php';
                            } elseif ($subzero == "Pelanggan") {
                                include 'pelanggan/insert.php';
                            } elseif ($subzero == "Penumpang") {
                                include 'penumpang/insert.php';
                            } elseif ($subzero == "TransaksiPelanggan") {
                                include 'transaksipelanggan/insert.php';
                            } elseif ($subzero == "Transaksi") {
                                include 'transaksi/insert.php';
                            } elseif ($subzero == "Bayar") {
                                include 'transaksi/bayar.php';
                            }?>
                        </div>
                    </section>
                </div>
        <?php
        include '../../bagian/copyright.php';
        }
    } else {
        ?>
        <div class="row">
            <div class="col-md-offset-4 col-md-4">
                <div class="panel panel-warning">
                    <div class="panel-heading">
                        Informasi
                    </div>
                    <div class="panel-body">
                        <p>Maaf, Anda tidak berhak mengakses halaman ini secara langsung. Silahkan login terlebih dahulu.</p>
                        <a class="btn btn-warning pull-right" role="button" href="../login.php">Login</a>
                    </div>
                </div>
            </div>
        </div>
    <?php
    }
    ?>

    <script src="../../dist/js/jquery.min.js"></script>
    <script src="../../dist/js/bootstrap.min.js"></script>
    <script src="../../dist/js/sweetalert2.min.js"></script>
    <script src="../../dist/js/jquery.slimscroll.min.js"></script>
    <script src="../../dist/js/fastclick.js"></script>
    <script src="../../dist/js/adminlte.min.js"></script>
    <script src="../../dist/js/demo.js"></script>
</body>

</html>
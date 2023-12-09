<?php
$judul_browser = "Travel Agent Apps";
$menu = isset($_GET['menu']) ? $_GET['menu'] : '';
$submenu = isset($_GET['submenu']) ? $_GET['submenu'] : '';
$idtrx = isset($_GET['idtrx']) ? $_GET['idtrx'] : '';

include '../bagian/koneksi.php';

?>
<style type="text/css">
    .btn-success {
        margin-left: 83%;
    }

    .panel-info {
        margin-top: 3%;
    }

    .navbar-inverse {
        background-color: green;
    }

    .navbar-brand {
        color: white;
        font-family: arial black;
    }
</style>

<?php
session_start();
include '../bagian/kepala.php';
?>

<body class="hold-transition skin-blue sidebar-mini">

    <?php
    if (isset($_SESSION['status'])) {
        if ($_SESSION['status'] != "login") {
            include '../bagian/noakses.php';
        } else if ($_SESSION['status'] == "login") {
    ?>
            <div class="wrapper">
        <?php include '../bagian/atasbar.php';
            include '../bagian/sidebarmem.php';
            if ($submenu == "Jadwal") {
                include 'perjalanan/jadwal.php';
            } elseif ($submenu == "Pencarian") {
                include 'perjalanan/carijadwal.php';
            } elseif ($submenu == "Dicarikan") {
                include 'perjalanan/jadwalfind.php';
            }  elseif ($submenu == "Transaksi") {
                include 'transaksi/transaksi.php';
            } elseif ($submenu == "Akun") {
                include 'akun/akun.php';
            } elseif ($submenu == "Pesan") {
                include 'pemesanan/setpnp.php';
            } elseif ($submenu == "Insert") {
                include 'pemesanan/insert.php';
            } elseif ($submenu == "Bayar") {
                include 'pemesanan/bayar.php';
            } elseif ($submenu == "New") {
                include '../bagian/apayangbaru.php';
            } elseif ($submenu == "Tiket") {
                include 'pemesanan/tiket.php';
            } else {
                include '../TheHandler/tabel404.php';
            }
            include '../bagian/copyright.php';
        }
    } else {
        include '../bagian/noakses.php';
    }
    include '../bagian/kaki.php';
        ?>
<?php
$judul_browser = "Administrator - Aplikasi Travel Gatel";
include '../bagian/koneksi.php';
$menu = isset($_GET['menu']) ? $_GET['menu'] : '';
$submenu = isset($_GET['submenu']) ? $_GET['submenu'] : '';
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
			include '../bagian/sidebaradm.php';
			if ($submenu == "Armada") {
				include 'Read/armada.php';
			} elseif ($submenu == "Jadwal") {
				include 'Read/jadwal.php';
			} elseif ($submenu == "Pelanggan") {
				include 'Read/pelanggan.php';
			} elseif ($submenu == "Penumpang") {
				include 'Read/penumpang.php';
			} elseif ($submenu == "Transaksi") {
				include 'Read/transaksi.php';
			} elseif ($submenu == "Laporan") {
				include 'Read/laporan.php';
			} else {
				include 'TheHandler/tabel404.php';
			}
			include '../bagian/copyright.php';
		}
	} else {
		include '../bagian/noakses.php';
	}
	include '../bagian/kaki.php';
		?>
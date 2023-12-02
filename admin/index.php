<?php
$judul_browser = "Travel Agent Apps - Alpha";
include '../bagian/koneksi.php';
$menu = isset($_GET['menu']) ? $_GET['menu'] : '';
$submenu = isset($_GET['submenu']) ? $_GET['submenu'] : '';
$idtrx = isset($_GET['idtrx']) ? $_GET['idtrx'] : '';
session_start();

include '../bagian/kepala.php';
include '../bagian/saitel.php';
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
			} elseif ($submenu == "Detail") {
				include 'Read/detail.php';
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
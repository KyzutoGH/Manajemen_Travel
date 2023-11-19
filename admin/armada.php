<?php
$judul_browser = "Administrator - Aplikasi Travel Gatel";
include '../bagian/koneksi.php';
$menu = "Perjalanan";
$submenu = "Armada";
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
				<?php include '../bagian/atasbar.php'; 
				include '../bagian/sidebaradm.php'; ?>
				<div class="content-wrapper">
					<section class="content-header">
						<h1>Data Armada</h1>
						<ol class="breadcrumb">
							<li><a href="index.php"><i class="fa fa-dashboard"></i> Beranda</a></li>
							<li class="active">Armada</li>
						</ol>
					</section>
					<section class="content">
						<div class="row">
							<div class="col-xs-12">
								<div class="box">
									<div class="box-header">
										<a href="Create/tambah.php?subzero=<?php echo $submenu;?>" class="btn btn-primary" role="button"><b>+</b> Tambah Armada</a>
									</div>
									<div class="box-body">
										<table id="example2" class="table table-bordered table-hover">
											<thead>
												<tr>
													<th>No</th>
													<th>Armada</th>
													<th>Jenis</th>
													<th>Status</th>
													<th>Aksi</th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<?php
													$no = 1;
													$data = mysqli_query($koneksi, "select * from armada");
													while ($d = mysqli_fetch_array($data)) {
													?>
												<tr>
													<td><?php echo $no++; ?></td>
													<td><?php echo $d['NamaArmada']; ?></td>
													<td><?php echo $d['Jenis']; ?></td>
													<td><?php echo $d['Status']; ?></td>
													<td>
														<a class="col-xs-offset-1 btn btn-success glyphicon glyphicon-pencil" href="editarmada.php?id_buku=<?php echo $d['IDArmada']; ?>"></a>
														<a class="btn btn-danger glyphicon glyphicon-trash" href="hapusarmada.php?id_buku=<?php echo $d['IDArmada']; ?>"></a>
													</td>
												</tr>
											<?php
													}
											?>
										</table>
									</div>
									<!-- /.box-body -->
								</div>
							</div>
						</div>
					</section>
				</div>
				<footer class="main-footer">
					<div class="pull-right hidden-xs">
						<b>Version</b> 1.0.0
					</div>
					<strong>Copyright &copy; 2018 <a href="#">Kelompok Dua</a>.</strong>
				</footer>
			</div>


		<?php
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

	<script src="../dist/js/jquery.min.js"></script>
	<script src="../dist/js/bootstrap.min.js"></script>
	<script src="../dist/js/sweetalert2.min.js"></script>
	<script src="../dist/js/validasi.js"></script>

	<script src="../dist/js/jquery.dataTables.min.js"></script>
	<script src="../dist/js/dataTables.bootstrap.min.js"></script>
	<script src="../dist/js/jquery.slimscroll.min.js"></script>
	<script src="../dist/js/fastclick.js"></script>
	<script src="../dist/js/adminlte.min.js"></script>
	<script src="../dist/js/demo.js"></script>
</body>

</html>
<?php
$judul_browser = "Tambah Buku";

include 'koneksi.php';
  
?>
<style type="text/css">
    .btn-success{
        margin-left: 83%;
    }
    .panel-info{
        margin-top: 3%;
    }
    .navbar-inverse{
	background-color: green;
    }
    .navbar-brand{
	color: white;
	font-family: arial black;
    }
</style>

<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo $judul_browser; ?></title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="dist/css/sweetalert2.min.css">
    
  <link rel="stylesheet" href="dist/css/font-awesome.min.css">
  <link rel="stylesheet" href="dist/css/ionicons.min.css">
  <link rel="stylesheet" href="dist/css/dataTables.bootstrap.min.css">
  <link rel="stylesheet" href="dist/css/_all-skins.min.css">
</head>
<body class="hold-transition skin-blue sidebar-mini">

        <?php
        if(isset($_SESSION['status'])){
        if($_SESSION['status'] != "login"){
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
        } else if($_SESSION['status'] == "login") {
        ?>
	<div class="wrapper">
	    <header class="main-header">
		<a href="#" class="logo">
		    <span class="logo-lg">Aplikasi ePerpus</span>
		</a>
		<nav class="navbar navbar-static-top">
		    <div class="navbar-custom-menu">
			<ul class="nav navbar-nav">
			    <li class="dropdown user user-menu">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown">
				    <img src="dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
				    <span class="hidden-xs"><?php echo ucwords($_SESSION['user']); ?></span>
				</a>
				<ul class="dropdown-menu">
				    <li class="user-header">
				        <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
				        <p><?php echo $_SESSION['user']; ?></p>
                <p><small><?php echo $_SESSION['hak_akses']?></small></p>
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
	
	    <aside class="main-sidebar">
		<section class="sidebar">
		<ul class="sidebar-menu" data-widget="tree">
		    <li class="header">MENU</li>
		    <li class="">
		    	<a href="user.php">
		    	<i class="fa fa-dashboard" style="color: red;"></i> <span>Administrasi Member</span>
		    </a>
		</li>
			<li class="treeview">
			    <a href="#">
				<i class="fa fa-book" style="color: skyblue;"></i> <span>Administrasi Buku</span>
				<span class="pull-right-container">
				    <i class="fa fa-angle-left pull-right"></i>
				</span>
			    </a>
			    <ul class="treeview-menu">
				<li><a href="index.php"><i class="fa fa-circle-o text-aqua"></i> Lihat Data Buku</a></li>
				<li><a href="edit.php"><i class="fa fa-circle-o text-red"></i> Edit Data Buku</a></li>
			    </ul>
			</li>
		    </ul>
		</section>
	    </aside>

  
  
  
  
  
    <div class="content-wrapper">
	<section class="content-header">
      <h1>Edit Buku</h1>
      <ol class="breadcrumb">
        <li><a href="tambahbuku.php"><i class="fa fa-dashboard"></i> Beranda</a></li>
        <li>Administrasi Buku</li>
        <li class="active">Tambah Buku</li>
      </ol>
    </section>
    <section class="content">
      <div class="box">
    <form method="post" class="form-horizontal" action="bukuadm.php">
      <h4 style="margin-left: 10px;">Masukkan Data Buku</h4>
        <div class="form-group has-feedback">
        <label for="kode" class="col-sm-2 control-label">Kode</label>
        <div class="col-sm-9" style="width: 930px;">
        <input type="text" class="form-control" placeholder="Kode Buku" name="kode">
    </div>
      </div>
      <div class="form-group has-feedback">
        <label for="judul" class="col-sm-2 control-label">Judul</label>
        <div class="col-sm-9" style="width: 930px;">
        <input type="text" class="form-control" placeholder="Judul Buku" name="judul">
    </div>
      </div>
      <div class="form-group has-feedback">
        <label for="jenis" class="col-sm-2 control-label">Jenis Buku</label>
        <div class="col-sm-9" style="width: 930px;">
        <select name="jenis" class="form-control">
          <option>Novel</option>
          <option>Pelajaran</option>
          <option>Komik</option>
        </select>
    </div>
      </div>
      <div class="form-group has-feedback">
        <label for="pengarang" class="col-sm-2 control-label">Pengarang</label>
        <div class="col-sm-9" style="width: 930px;">
        <input type="text" class="form-control" placeholder="Pengarang" name="pengarang" >
    </div>
      </div>
      <div class="form-group has-feedback">
        <label for="penerbit" class="col-sm-2 control-label">Penerbit</label>
        <div class="col-sm-9" style="width: 930px;">
        <input type="text" class="form-control" placeholder="Penerbit" name="penerbit" >
    </div>
      </div>
      <div class="form-group has-feedback">
        <label for="tahun" class="col-sm-2 control-label">Tahun</label>
        <div class="col-sm-9" style="width: 930px;">
        <input type="text" class="form-control" placeholder="Tahun" name="tahun" >
    </div>
      </div>
      <div class="form-group has-feedback">
        <div class="col-sm-10 pull-right">
      <button type="submit" class="btn btn-success" name="tambah">Simpan</button>
      <a href="index.php" class="pull-left btn btn-primary" style="margin-left: 0px;">Batal</a>
  </div>
  </div></br>
            </form>
          </div>
    </section>
      </div>
    <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 1.0.0
    </div>
    <strong>Copyright &copy; 2018 <a href="#">IksanJR</a>.</strong>
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

<script src="dist/js/jquery.min.js"></script>
<script src="dist/js/bootstrap.min.js"></script>
<script src="dist/js/sweetalert2.min.js"></script>
<script src="dist/js/validasi.js"></script>

<script src="dist/js/jquery.dataTables.min.js"></script>
<script src="dist/js/dataTables.bootstrap.min.js"></script>
<script src="dist/js/jquery.slimscroll.min.js"></script>
<script src="dist/js/fastclick.js"></script>
<script src="dist/js/adminlte.min.js"></script>
<script src="dist/js/demo.js"></script>
</body>
</html>
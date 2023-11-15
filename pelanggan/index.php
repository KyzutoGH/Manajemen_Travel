<?php
$judul_browser = "Aplikasi Travel Gatel - Utama";

include '../bagian/koneksi.php';
  
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
include '../bagian/kepala.php';
?>
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
                <a class="btn btn-warning pull-right" role="button" href="login.php">Login</a>
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
            <span class="logo-lg">Aplikasi Travel Gat#l</span>
        </a>
        <nav class="navbar navbar-static-top">
            <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <img src="../dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
                    <span class="hidden-xs"><?php echo ucwords($_SESSION['user']); ?></span>
                </a>
                <ul class="dropdown-menu">
                    <li class="user-header">
                        <img src="../dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                        <p><?php echo $_SESSION['user']; ?></p>
                        <p><small>Pelanggan</small></p>
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
            <li class="treeview">
                <a href="#">
                <i class="fa fa-dashboard"></i> <span>Administrasi Buku</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
                </a>
                <ul class="treeview-menu">
                <li><a href="indexmem.php"><i class="fa fa-circle-o text-aqua"></i> Lihat Data Buku</a></li>
                </ul>
            </li>
            </ul>
        </section>
        </aside>

  
  
  
  
  
    <div class="content-wrapper">
    <section class="content-header">
      <h1>Data Buku</h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Beranda</a></li>
        <li class="active">Data tables</li>
      </ol>
    </section>
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
        <div class="box-header">
        <button href="#" disabled="disabled" class="btn btn-primary disabled" role="button"><b>+</b> Tambah Buku</button>
        </div>
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
            <th>No</th>
            <th>Asal</th>
            <th>Tujuan</th>
            <th>Kelas</th>
            <th>Tanggal</th>
            <th>Keberangkatan</th>
            <th>Harga</th>
            <th>Diskon</th>
                </tr>
                </thead>
                <tbody>
                <tr>
            <?php
            $no = 1;
            $data = mysqli_query($koneksi, "select * from jadwal");
            while($d=mysqli_fetch_array($data)){
        ?>
        <tr>
            <td><?php echo $no++; ?></td>
            <td><?php echo $d['Asal']; ?></td>
            <td><?php echo $d['Tujuan']; ?></td>
            <td><?php echo $d['Kelas']; ?></td>
            <td><?php echo $d['TanggalBerangkat']; ?></td>
            <td><?php echo $d['JamBerangkat']; ?></td>
            <td><?php echo $d['Harga']; ?></td>
            <td><?php echo $d['Diskon']; ?></td>
            <td>
            <button disabled="disabled" class="col-xs-offset-1 btn btn-success glyphicon glyphicon-pencil" href="update.php?id_buku=<?php echo $d['id_buku']; ?>"></button>
                    <button disabled="disabled" class="btn btn-danger glyphicon glyphicon-trash" href="hapus.php?id_buku=<?php echo $d['id_buku']; ?>"></button>   
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
            <a class="btn btn-warning pull-right" role="button" href="login.php">Login</a>
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

<?php
$judul_browser = "Aplikasi ePerpus";
include 'koneksi.php';
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
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-box-body">
    <h4>Anda Yakin Mau Menghapus Data Buku :</h4>
    <form action="proseshapus.php" method="submit">
    <?php
    $id = $_GET['id_buku'];
    $data = mysqli_query($koneksi, "select * from data_buku where id_buku='$id'");
    while($d = mysqli_fetch_array($data)){
    ?>
      <div class="form-group has-feedback">
        <label for="judul">Judul</label>
        <input type="text" class="form-control" disabled="disabled" value="<?php echo $d['judul_buku'
        ];?>" name="judul">
      </div>
      <div class="form-group has-feedback">
        <label for="pengarang">Pengarang</label>
        <input type="text" class="form-control" disabled="disabled" value="<?php echo $d['pengarang'
        ];?>" name="pengarang">
      </div>
      <div class="form-group has-feedback">
        <label for="penerbit">Penerbit</label>
        <input type="text" class="form-control" disabled="disabled" value="<?php echo $d['penerbit'
        ];?>" name="penerbit">
      </div>
      <div class="alert alert-danger has-feedback">
        <p>Perhatian!</p>
        <p>Data yang sudah dihapus tidak dapat dikembalikan kembali.</p>
      </div>
      <div class="row">
        <div class="col-xs-12">
          <button type="submit" class="btn btn-danger btn-flat pull-right" name="hapus">Hapus</button>
          <a href="index.php" class="btn btn-success btn-flat pull-left" name="batal">Batal</a>
        </div>
      </div>
      <?php
      }
      ?>
    </form>
  </div>
</div>

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
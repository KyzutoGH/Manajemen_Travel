<?php
include '../bagian/koneksi.php';
$judul_browser = "Aplikasi Travel Gatel - Pendaftaran";
include '../bagian/kepala.php';
?>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <img src="../dist/img/daftar.png" style="width: 150px;"><br>
    <a href=""><b>Daftar</b> Pelanggan</a>
  </div>
  <div class="login-box-body">
    <form action="prosesdaftar.php" method="post" onsubmit="return cekLogin(this)">
      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="Masukkan Username" name="user">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Masukkan Password" name="pass">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="Masukkan Nama" name="nama">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="number" class="form-control" placeholder="Masukkan Nomor HP" name="hp">
        <span class="glyphicon glyphicon-phone form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="number" class="form-control" placeholder="Masukkan Nomor Identitas" name="nik">
        <span class="glyphicon glyphicon-folder-open form-control-feedback"></span>
      </div><br>
      <div class="row">
        <div class="col-xs-12">
          <button type="submit" class="btn btn-primary btn-flat pull-right" name="masuk">Daftar</button>
        </div>
      </div>
    </form>
  </div>
</div>
<script language="javascript">
  function cekLogin(form){
  if (form.user.value=="") {
    swal('INFORMASI','Username tidak boleh kosong','error');
    form.user.focus();
    return(false);
  }else if(form.pass.value==""){
    swal('INFORMASI','Password tidak boleh kosong','error');   
    form.pass.focus();
    return(false);
  }else{
    return(true);
  }
  }
</script>

<? include '../bagian/kaki.php';?>